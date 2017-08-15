<?php

namespace App\Http\Requests;

use Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateVendor extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => [
                'string',
                'email',
                'max:255',
                Rule::unique('users')->where(function ($query) {
                    $query->where('id', '!=', Auth::user()->id);
                }),
            ],
        ];
    }
}
