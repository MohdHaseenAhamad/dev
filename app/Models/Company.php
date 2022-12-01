<?php

namespace Crater\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Silber\Bouncer\BouncerFacade;
use Silber\Bouncer\Database\Role;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Company extends Model implements HasMedia
{
    use InteractsWithMedia;

    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $appends = ['logo', 'logo_path', 'letterhead','letterhead_path'];

    public function getRolesAttribute()
    {
        return Role::where('scope', $this->id)
            ->get();
    }

    public function getLogoPathAttribute()
    {
        $logo = $this->getMedia('logo')->first();

        $isSystem = FileDisk::whereSetAsDefault(true)->first()->isSystem();

        if ($logo) {
            if ($isSystem) {
                return $logo->getPath();
            } else {
                return $logo->getFullUrl();
            }
        }

        return null;
    }
    public function getLetterHeadPathAttribute()
    {
        $letterhead = $this->getMedia('letterhead')->first();

        $isSystem = FileDisk::whereSetAsDefault(true)->first()->isSystem();

        if ($letterhead) {
            if ($isSystem) {
                return $letterhead->getPath();
            } else {
                return $letterhead->getFullUrl();
            }
        }

        return null;
    }

    public function getLogoAttribute()
    {
        $logo = $this->getMedia('logo')->first();

        if ($logo) {
            return $logo->getFullUrl();
        }

        return null;
    }
    public function getLetterHeadAttribute()
    {
        $letterhead = $this->getMedia('letterhead')->first();

        if ($letterhead) {
            return $letterhead->getFullUrl();
        }

        return null;
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function settings()
    {
        return $this->hasMany(CompanySetting::class);
    }

    public function recurringInvoices()
    {
        return $this->hasMany(RecurringInvoice::class);
    }

    public function customFields()
    {
        return $this->hasMany(CustomField::class);
    }

    public function customFieldValues()
    {
        return $this->hasMany(CustomFieldValue::class);
    }

    public function exchangeRateLogs()
    {
        return $this->hasMany(ExchangeRateLog::class);
    }

    public function exchangeRateProviders()
    {
        return $this->hasMany(ExchangeRateProvider::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    public function units()
    {
        return $this->hasMany(Unit::class);
    }

    public function expenseCategories()
    {
        return $this->hasMany(ExpenseCategory::class);
    }

    public function taxTypes()
    {
        return $this->hasMany(TaxType::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
    public function preparedbies()
    {
        return $this->hasMany(PreparedBy::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function paymentMethods()
    {
        return $this->hasMany(PaymentMethod::class);
    }

    public function estimates()
    {
        return $this->hasMany(Estimate::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_company', 'company_id', 'user_id');
    }

    public function setupRoles()
    {
        BouncerFacade::scope()->to($this->id);

        $super_admin = BouncerFacade::role()->firstOrCreate([
            'name' => 'super admin',
            'title' => 'Super Admin',
            'scope' => $this->id
        ]);

        foreach (config('abilities.abilities') as $ability) {
            BouncerFacade::allow($super_admin)->to($ability['ability'], $ability['model']);
        }
    }

    public static function checkUpdateForNewAbilities($company_id){
        BouncerFacade::scope()->to($company_id);

        $super_admin = BouncerFacade::role()->firstOrCreate([
            'name' => 'super admin',
            'title' => 'Super Admin',
            'scope' => $company_id
        ]);

        foreach (config('abilities.abilities') as $ability) {
            BouncerFacade::allow($super_admin)->to($ability['ability'], $ability['model']);
        }   
    }

    public function setupDefaultPaymentMethods()
    {
        PaymentMethod::create(['name' => 'Cash', 'company_id' => $this->id]);
        PaymentMethod::create(['name' => 'Check', 'company_id' => $this->id]);
        PaymentMethod::create(['name' => 'Credit Card', 'company_id' => $this->id]);
        PaymentMethod::create(['name' => 'Bank Transfer', 'company_id' => $this->id]);
    }

    public function setupDefaultUnits()
    {
        Unit::create(['name' => 'box', 'company_id' => $this->id]);
        Unit::create(['name' => 'cm', 'company_id' => $this->id]);
        Unit::create(['name' => 'dz', 'company_id' => $this->id]);
        Unit::create(['name' => 'ft', 'company_id' => $this->id]);
        Unit::create(['name' => 'g', 'company_id' => $this->id]);
        Unit::create(['name' => 'in', 'company_id' => $this->id]);
        Unit::create(['name' => 'kg', 'company_id' => $this->id]);
        Unit::create(['name' => 'km', 'company_id' => $this->id]);
        Unit::create(['name' => 'lb', 'company_id' => $this->id]);
        Unit::create(['name' => 'mg', 'company_id' => $this->id]);
        Unit::create(['name' => 'pc', 'company_id' => $this->id]);
    }

    public static function defaultAddressFormats($key){
        if($key == 'shipping')
            return '<h3>{SHIPPING_ADDRESS_NAME}</h3><p>{SHIPPING_ADDRESS_STREET_1}</p><p>{SHIPPING_ADDRESS_STREET_2}</p><p>{SHIPPING_CITY}  {SHIPPING_STATE}</p><p>{SHIPPING_COUNTRY}  {SHIPPING_ZIP_CODE}</p><p>{SHIPPING_PHONE}</p>';

        if($key == 'billing')
            return '<h3>{BILLING_ADDRESS_NAME}</h3><p>{BILLING_ADDRESS_STREET_1}</p><p>{BILLING_ADDRESS_STREET_2}</p><p>{BILLING_CITY}  {BILLING_STATE}</p><p>{BILLING_COUNTRY}  {BILLING_ZIP_CODE}</p><p>{BILLING_PHONE}</p>';

        if($key == 'company') 
            return '<h3><strong>{COMPANY_NAME}</strong></h3><p>{COMPANY_ADDRESS_STREET_1}</p><p>{COMPANY_ADDRESS_STREET_2}</p><p>{COMPANY_CITY} {COMPANY_STATE}</p><p>{COMPANY_COUNTRY}  {COMPANY_ZIP_CODE}</p><p>{COMPANY_PHONE}</p>';

        if($key == 'customer')
            return '<h3>{BILLING_ADDRESS_NAME}</h3><p>{BILLING_ADDRESS_STREET_1}</p><p>{BILLING_ADDRESS_STREET_2}</p><p>{BILLING_CITY} {BILLING_STATE} {BILLING_ZIP_CODE}</p><p>{BILLING_COUNTRY}</p><p>{BILLING_PHONE}</p>';
    }

    public function setupDefaultSettings()
    {
        $defaultInvoiceEmailBody = 'You have received a new invoice from <b>{COMPANY_NAME}</b>.</br> Please download using the button below:';
        $defaultEstimateEmailBody = 'You have received a new estimate from <b>{COMPANY_NAME}</b>.</br> Please download using the button below:';
        $defaultPaymentEmailBody = 'Thank you for the payment.</b></br> Please download your payment receipt using the button below:';

        $settings_initial = [
            'save_pdf_to_disk' => 'NO',
            'invoice_mail_body' => $defaultInvoiceEmailBody,
            'estimate_mail_body' => $defaultEstimateEmailBody,
            'payment_mail_body' => $defaultPaymentEmailBody,
            'invoice_company_address_format' => self::defaultAddressFormats('company'),
            'invoice_shipping_address_format' => self::defaultAddressFormats('shipping'),
            'invoice_billing_address_format' => self::defaultAddressFormats('billing'),
            'estimate_company_address_format' => self::defaultAddressFormats('company'),
            'estimate_shipping_address_format' => self::defaultAddressFormats('shipping'),
            'estimate_billing_address_format' => self::defaultAddressFormats('billing'),
            'payment_company_address_format' => self::defaultAddressFormats('company'),
            'payment_from_customer_address_format' => self::defaultAddressFormats('customer'),
            'currency' => 45,
            'time_zone' => 'Asia/Kolkata',
            'language' => 'en',
            'fiscal_year' => '1-12',
            'carbon_date_format' => 'Y/m/d',
            'moment_date_format' => 'YYYY/MM/DD',
            'notification_email' => 'noreply@crater.in',
            'notify_invoice_viewed' => 'NO',
            'notify_estimate_viewed' => 'NO',
            'tax_per_item' => 'NO',
            'discount_per_item' => 'NO',
            'invoice_auto_generate' => 'YES',
            'invoice_email_attachment' => 'NO',
            'estimate_auto_generate' => 'YES',
            'estimate_email_attachment' => 'NO',
            'payment_auto_generate' => 'YES',
            'payment_email_attachment' => 'NO',
            'save_pdf_to_disk' => 'NO',
            'retrospective_edits' => 'allow',
            'invoice_number_format' => ',{{SERIES:INV}}{{DELIMITER:-}}{{DATE_FORMAT:Y}}{{DELIMITER:-}}{{SEQUENCE:4}}',
            'estimate_number_format' => '{{SERIES:EST}}{{DELIMITER:-}}{{DATE_FORMAT:Y}}{{DELIMITER:-}}{{SEQUENCE:4}}',
            'payment_number_format' => '{{SERIES:PAY}}{{DELIMITER:-}}{{DATE_FORMAT:Y}}{{DELIMITER:-}}{{SEQUENCE:4}}',
            'estimate_set_expiry_date_automatically' => 'YES',
            'estimate_expiry_date_days' => 7,
            'invoice_set_due_date_automatically' => 'YES',
            'invoice_due_date_days' => 7,
            'bulk_exchange_rate_configured' => 'YES',
            'estimate_convert_action' => 'no_action'
        ];

        $settings = array_merge($settings_initial, self::defaultCreditNoteSettings());

        CompanySetting::setSettings($settings, $this->id);
    }

    public static function defaultCreditNoteSettings()
    {
        return [
            'credit_mail_body' => 'You have received a new credit note from <b>{COMPANY_NAME}</b>.</br> Please download using the button below:',
            'credit_number_format' => '{{SERIES:CRN}}{{DELIMITER:-}}{{DATE_FORMAT:Y}}{{DELIMITER:-}}{{SEQUENCE:4}}',
            'credit_company_address_format' => self::defaultAddressFormats('company'),
            'credit_shipping_address_format' => self::defaultAddressFormats('shipping'),
            'credit_billing_address_format' => self::defaultAddressFormats('billing')
        ];
    }

    public static function defaultPurchaseSettings(){
        return [
            'purchase_mail_body' => 'You have generated a new purchase voucher from <b>{COMPANY_NAME}</b>.</br> Please download using the button below:',
            'purchase_number_format' => '{{SERIES:PUR}}{{DELIMITER:-}}{{DATE_FORMAT:Y}}{{DELIMITER:-}}{{SEQUENCE:4}}',
            'purchase_company_address_format' => self::defaultAddressFormats('company'),
            'purchase_shipping_address_format' => self::defaultAddressFormats('shipping'),
            'purchase_billing_address_format' => self::defaultAddressFormats('billing')
        ];   
    }

    public static function defaultDebitNoteSettings(){
        return [
            'debit_mail_body' => 'You have generated a new debit note from <b>{COMPANY_NAME}</b>.</br> Please download using the button below:',
            'debit_number_format' => '{{SERIES:DRN}}{{DELIMITER:-}}{{DATE_FORMAT:Y}}{{DELIMITER:-}}{{SEQUENCE:4}}',
            'debit_company_address_format' => self::defaultAddressFormats('company'),
            'debit_shipping_address_format' => self::defaultAddressFormats('shipping'),
            'debit_billing_address_format' => self::defaultAddressFormats('billing')
        ];   
    }

    public static function setNewModulesDefaultSettings($company_id, $key, $get = null){
        switch($key){
            case 'credit':
                $settings = self::defaultCreditNoteSettings();
                break;

            case 'purchase':
                $settings = self::defaultPurchaseSettings();
                break;

            case 'debit':
                $settings = self::defaultDebitNoteSettings();
                break;

            default:
                $settings = [];
                break;
        }

        CompanySetting::setSettings($settings, $company_id);

        // RETURN THE NEW MODULE VALUES
        return is_null($get) ? $settings : $settings[$get];
    }

    public function setupDefaultData()
    {
        $this->setupRoles();
        $this->setupDefaultPaymentMethods();
        $this->setupDefaultUnits();
        $this->setupDefaultSettings();

        return true;
    }

    public function deleteCompany($user)
    {
        if ($this->exchangeRateLogs()->exists()) {
            $this->exchangeRateLogs()->delete();
        }

        if ($this->exchangeRateProviders()->exists()) {
            $this->exchangeRateProviders()->delete();
        }

        if ($this->expenses()->exists()) {
            $this->expenses()->delete();
        }

        if ($this->expenseCategories()->exists()) {
            $this->expenseCategories()->delete();
        }

        if ($this->payments()->exists()) {
            $this->payments()->delete();
        }

        if ($this->paymentMethods()->exists()) {
            $this->paymentMethods()->delete();
        }

        if ($this->customFieldValues()->exists()) {
            $this->customFieldValues()->delete();
        }


        if ($this->customFields()->exists()) {
            $this->customFields()->delete();
        }

        if ($this->invoices()->exists()) {
            $this->invoices->map(function ($invoice) {
                $this->checkModelData($invoice);
            });

            $this->invoices()->delete();
        }

        if ($this->recurringInvoices()->exists()) {
            $this->recurringInvoices->map(function ($recurringInvoice) {
                $this->checkModelData($recurringInvoice);
            });

            $this->recurringInvoices()->delete();
        }

        if ($this->estimates()->exists()) {
            $this->estimates->map(function ($estimate) {
                $this->checkModelData($estimate);
            });

            $this->estimates()->delete();
        }

        if ($this->items()->exists()) {
            $this->items()->delete();
        }

        if ($this->taxTypes()->exists()) {
            $this->taxTypes()->delete();
        }

        if ($this->customers()->exists()) {
            $this->customers->map(function ($customer) {
                if ($customer->addresses()->exists()) {
                    $customer->addresses()->delete();
                }

                $customer->delete();
            });
        }

        $roles = Role::when($this->id, function ($query) {
            return $query->where('scope', $this->id);
        })->get();

        if ($roles) {
            $roles->map(function ($role) {
                $role->delete();
            });
        }

        if ($this->users()->exists()) {
            $user->companies()->detach($this->id);
        }

        $this->settings()->delete();

        $this->address()->delete();

        $this->delete();

        return true;
    }

    public function checkModelData($model)
    {
        $model->items->map(function ($item) {
            if ($item->taxes()->exists()) {
                $item->taxes()->delete();
            }

            $item->delete();
        });

        if ($model->taxes()->exists()) {
            $model->taxes()->delete();
        }
    }
}
