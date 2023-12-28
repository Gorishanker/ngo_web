<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class GiftTreeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'campaign_id' => 'required',
            'name' => 'required|alpha_spaces|max:50',
            'email' => 'required|email|max:70',
            'from' => 'required|max:150',
            'title' => 'required|max:30',
            'message' => 'required|max:250',
            'delivery_date' => 'required|after:yesterday',
        ];
    }


    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
        ];
    }
}
