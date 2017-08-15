<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreReferral extends FormRequest
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
            'name' => 'required|min:3|max:50',
            'category_id' => [
                'required',
                'integer',
                'exists:categories,id'
            ],
            'email' => 'required|email|max:254',
            'code' => 'max:50',
            'needed_at' => 'required|date',
            'contact_time' => 'required|in:ANY,AM,PM',
            'phone' => 'required|max:21',
            'city' => 'required|max:128',
            'state' => 'required|max:2',
            'description' => 'max:255',
            'urgent' => 'in:0,1',
        ];
    }
}
