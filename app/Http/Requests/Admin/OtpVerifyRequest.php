<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class OtpVerifyRequest extends FormRequest
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
            'email' => 'required|email:rfc|exists:users',
            'otp' => 'required|numeric|digits_between:1,4',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => __('validation.required', ['attribute' => 'Email']),
            'otp.required' => __('validation.required', ['attribute' => 'OTP']),
            'otp.numeric' => __('validation.numeric', ['attribute' => 'OTP']),
            'otp.digits_between' => __('validation.digits_between', ['attribute' => 'OTP']),
        ];
    }
}
