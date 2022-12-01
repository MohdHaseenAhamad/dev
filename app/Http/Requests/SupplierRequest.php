<?php

namespace Crater\Http\Requests;

use Crater\Models\Address;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

class SupplierRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => [
                'required',
            ],
            'email' => [
                'email',
                'nullable',
                Rule::unique('suppliers')->where('company_id', $this->header('company'))
            ],
            'password' => [
                'nullable',
            ],
            'phone' => [
                'nullable',
            ],
            'company_name' => [
                'nullable',
            ],
            'contact_name' => [
                'nullable',
            ],
            'website' => [
                'nullable',
            ],
            'prefix' => [
                'nullable',
            ],
            'enable_portal' => [
                'nullable',
            ],
            'currency_id' => [
                'nullable',
            ],
            'billing.name' => [
                'nullable',
            ],
            'billing.address_street_1' => [
                'nullable',
            ],
            'billing.address_street_2' => [
                'nullable',
            ],
            'billing.city' => [
                'nullable',
            ],
            'billing.state' => [
                'nullable',
            ],
            'billing.country_id' => [
                'nullable',
            ],
            'billing.zip' => [
                'nullable',
            ],
            'billing.phone' => [
                'nullable',
            ],
            'billing.fax' => [
                'nullable',
            ],
            'shipping.name' => [
                'nullable',
            ],
            'shipping.address_street_1' => [
                'nullable',
            ],
            'shipping.address_street_2' => [
                'nullable',
            ],
            'shipping.city' => [
                'nullable',
            ],
            'shipping.state' => [
                'nullable',
            ],
            'shipping.country_id' => [
                'nullable',
            ],
            'shipping.zip' => [
                'nullable',
            ],
            'shipping.phone' => [
                'nullable',
            ],
            'shipping.fax' => [
                'nullable',
            ],
            'website_ar' => [
                'nullable',
            ],
            'prefix_ar' => [
                'nullable',
            ],
            'name_ar' => [
                'nullable',
            ],
            'state_ar' => [
                'nullable',
            ],
            'city_ar' => [
                'nullable',
            ],
            'address_street_1_ar' => [
                'nullable',
            ],
            'address_street_2_ar' => [
                'nullable',
            ],
            'phone_ar' => [
                'nullable',
            ],
            'zip_ar' => [
                'nullable',
            ],
            'category_id' => [
                'nullable',
            ],
        ];

        if ($this->isMethod('PUT') && $this->email != null) {
            $rules['email'] = [
                'email',
                'nullable',
                Rule::unique('suppliers')->ignore($this->route('supplier')->id),
            ];
        };

        return $rules;
    }

    public function getSupplierPayload()
    {
        return collect($this->validated())
            ->only([
                'name',
                'email',
                'currency_id',
                'password',
                'phone',
                'prefix',
                'company_name',
                'contact_name',
                'website',
                'enable_portal',
                'estimate_prefix',
                'payment_prefix',
                'invoice_prefix',
                'website_ar',
                'prefix_ar',
                'name_ar',
                'state_ar',
                'city_ar',
                'address_street_1_ar',
                'address_street_2_ar',
                'phone_ar',
                'zip_ar',
                'category_id',
            ])
            ->merge([
                'creator_id' => $this->user()->id,
                'company_id' => $this->header('company'),
            ])
            ->toArray();
    }

    public function getShippingAddress()
    {
        return collect($this->shipping)
            ->merge([
                'type' => Address::SHIPPING_TYPE
            ])
            ->toArray();
    }

    public function getBillingAddress()
    {
        return collect($this->billing)
            ->merge([
                'type' => Address::BILLING_TYPE
            ])
            ->toArray();
    }

    public function hasAddress(array $address)
    {
        $data = Arr::where($address, function ($value, $key) {
            return isset($value);
        });

        return $data;
    }
}
