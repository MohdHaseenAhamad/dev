<?php

namespace Crater\Http\Controllers\V1\Admin\Settings;

use Crater\Http\Controllers\Controller;
use Crater\Http\Requests\CompanyRequest;
use Crater\Http\Requests\ProfileRequest;
use Crater\Http\Resources\CompanyResource;
use Crater\Http\Resources\UserResource;
use Crater\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Retrive the Admin account.
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUser(Request $request)
    {
        return new UserResource($request->user());
    }

    /**
     * Update the Admin profile.
     * Includes name, email and (or) password
     *
     * @param  \Crater\Http\Requests\ProfileRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateProfile(ProfileRequest $request)
    {
        $user = $request->user();

        $user->update($request->validated());

        return new UserResource($user);
    }

    /**
     * Update Admin Company Details
     * @param \Crater\Http\Requests\CompanyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateCompany(CompanyRequest $request)
    {
        // dd($request->all());
        $company = Company::find($request->header('company'));

        $this->authorize('manage company', $company);

        $company->update($request->only('name','cr','vat','name_ar','phone_ar','state_ar','city_ar','zip_ar','address_street_1_ar','address_street_2_ar','cr_ar','vat_ar','account_name_ar','bank_name_ar','account_no_ar','iban_ar','swift_code_ar','account_name','bank_name','account_no','iban','swift_code'));

        $company->address()->updateOrCreate(['company_id' => $company->id], $request->address);

        return new CompanyResource($company);
    }

    /**
     * Upload the company logo to storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadCompanyLogo(Request $request)
    {
        // dd($request->all());
        $company = Company::find($request->header('company'));

        $this->authorize('manage company', $company);

        $data = json_decode($request->company_logo);

        if ($data) {
            $company = Company::find($request->header('company'));

            if ($company) {
                $company->clearMediaCollection('logo');

                $company->addMediaFromBase64($data->data)
                    ->usingFileName(rand(111111,99999).md5(microtime(true)).'.'.explode('/', mime_content_type($data->data))[1])
                    ->toMediaCollection('logo');
            }
        }

        return response()->json([
            'success' => true,
        ]);
    }
    public function uploadCompanyLetterHead(Request $request)
    {
        $company = Company::find($request->header('company'));

        $this->authorize('manage company', $company);

        $data = json_decode($request->company_letterhead);

        if ($data) {
            $company = Company::find($request->header('company'));

            if ($company) {
                $company->clearMediaCollection('letterhead');

                $company->addMediaFromBase64($data->data)
                    ->usingFileName(rand(111111,99999).md5(microtime(true)).'.'.explode('/', mime_content_type($data->data))[1])
                    ->toMediaCollection('letterhead');
            }
        }

        return response()->json([
            'success' => true,
        ]);
    }

    /**
     * Upload the Admin Avatar to public storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadAvatar(Request $request)
    {
        $user = auth()->user();

        if ($user && $request->hasFile('admin_avatar')) {
            $user->clearMediaCollection('admin_avatar');

            $user->addMediaFromRequest('admin_avatar')
                ->toMediaCollection('admin_avatar');
        }

        if ($user && $request->has('avatar')) {
            $data = json_decode($request->avatar);
            $user->clearMediaCollection('admin_avatar');

            $user->addMediaFromBase64($data->data)
                ->usingFileName($data->name)
                ->toMediaCollection('admin_avatar');
        }

        return new UserResource($user);
    }
}
