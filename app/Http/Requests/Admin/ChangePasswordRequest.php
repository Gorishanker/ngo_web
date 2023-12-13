<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'email' => 'required|email:rfc|exists:admins',
            'password' => 'required|strong_password|min:6|max:12',
            'confirm_password' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => __('validation.required', ['attribute' => 'Email']),
            'password.required' => __('validation.required', ['attribute' => 'Password']),
            'password.strong_password' => __('validation.strong_password', ['attribute' => 'Password']),
            'password.min' => __('validation.min', ['attribute' => 'Password']),
            'password.max' => __('validation.max', ['attribute' => 'Password']),
            'confirm_password.required' => __('validation.required', ['attribute' => 'Confirm Password']),
            'confirm_password.same' => __('validation.same', ['attribute' => 'Confirm Password']),
        ];
    }
}