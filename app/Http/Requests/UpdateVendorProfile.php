<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVendorProfile extends FormRequest
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
        return [
            'description' => 'string|max:5000',
            'address' => 'string|max:250',
            'city' => 'string|max:50',
            'state' => 'string|max:2',
            'zip' => 'string|max:11',
            'phone' => 'string|max:15',
            'website' => 'string|max:128',
            'facebook' => 'string|max:255',
            'linkedin' => 'string|max:255',
            'twitter' => 'string|max:255',
            'youtube' => 'string|max:255',
        ];
    }
}
