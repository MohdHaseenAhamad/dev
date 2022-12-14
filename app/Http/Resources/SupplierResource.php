<?php

namespace Crater\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SupplierResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'category_id' => $this->category_id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'contact_name' => $this->contact_name,
            'company_name' => $this->company_name,
            'website' => $this->website,
            'enable_portal' => $this->enable_portal,
            'currency_id' => $this->currency_id,
            'company_id' => $this->company_id,
            'estimate_prefix' => $this->estimate_prefix,
            'payment_prefix' => $this->payment_prefix,
            'invoice_prefix' => $this->invoice_prefix,
            'facebook_id' => $this->facebook_id,
            'google_id' => $this->google_id,
            'github_id' => $this->github_id,
            'created_at' => $this->created_at,
            'formatted_created_at' => $this->formattedCreatedAt,
            'updated_at' => $this->updated_at,
            'avatar' => $this->avatar,
            'due_amount' => $this->due_amount,
            'base_due_amount' => $this->base_due_amount,
            'prefix' => $this->prefix,
            "website_ar" => $this->website_ar,
              "prefix_ar" =>$this->prefix_ar,
              "name_ar" =>$this->name_ar,
              "state_ar" => $this->state_ar,
              "city_ar" => $this->city_ar,
              "address_street_1_ar" => $this->address_street_1_ar,
              "address_street_2_ar" => $this->address_street_2_ar,
              "phone_ar" => $this->phone_ar,
              "zip_ar" => $this->zip_ar,
            'billing' => $this->when($this->billingAddress()->exists(), function () {
                return new AddressResource($this->billingAddress);
            }),
            'shipping' => $this->when($this->shippingAddress()->exists(), function () {
                return new AddressResource($this->shippingAddress);
            }),
            'fields' => $this->when($this->fields()->exists(), function () {
                return CustomFieldValueResource::collection($this->fields);
            }),
            'company' => $this->when($this->company()->exists(), function () {
                return new CompanyResource($this->company);
            }),
            'currency' => $this->when($this->currency()->exists(), function () {
                return new CurrencyResource($this->currency);
            }),
            'category' => $this->when($this->category()->exists(), function () {
                return new CategoryResource($this->category);
            }),
        ];
    }
}
