<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|alpha_spaces|max:50',
            'email' => 'required|email|max:50',
            'mobile_no' => 'required|digits_between:10,12',
            'message' => 'required|min:15',
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
            'name.required' => __('validation.required', ['attribute' => 'Name']),
            'name.alpha_spaces' => __('validation.alpha_spaces', ['attribute' => 'Name']),
            'name.max' => __('validation.max', ['attribute' => 'Name']),

            'email.required' => __('validation.required', ['attribute' => 'Email']),
            'email.email' => __('validation.email', ['attribute' => 'Email']),
            'email.max' => __('validation.max', ['attribute' => 'Email']),

            'mobile_no.required' => __('validation.required', ['attribute' => 'Mobile number']),
            'mobile_no.digits_between' => __('validation.digits_between', ['attribute' => 'Mobile number']),

            'message.required' => __('validation.required', ['attribute' => 'Message']),
            'message.min' => __('validation.min', ['attribute' => 'Message']),
        ];
    }
}
