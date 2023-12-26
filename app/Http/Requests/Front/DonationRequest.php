<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class DonationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'donation_amount' => 'required|numeric||min:1|max:5000000',
            'donation_type' => 'required',
            'first_name' => 'required|alpha_spaces|max:50',
            'last_name' => 'required|alpha_spaces|max:50',
            'address_1' => 'required|max:150',
            'address_2' => 'required|max:150',
            'city' => 'required|alpha_spaces|max:50',
            'state' => 'required|alpha_spaces|max:50',
            'country' => 'required|alpha_spaces|max:50',
            'zipcode' => 'required|digits_between:5,6',
            'email' => 'required|email|max:70',
            'mobile' => 'required|digits:10',
            'pan_number' => 'nullable|max:10',
            'name_on_pan' => 'nullable|max:150',
            'how_did_you_about_us' => 'nullable',
            'order_id' => 'nullable',
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
