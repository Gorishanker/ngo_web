<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminChangePasswordRequest extends FormRequest
{

    private $auth_user;
    public function __construct()
    {
        $this->auth_user = Auth::user();
        // dd($this->auth_user);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'old_password' => ['required', function ($attribute, $value, $fail) {
                // dd($this->auth_user);
                if (!Hash::check($value, $this->auth_user->password)) {
                    return $fail(__('The Old Password is incorrect.'));
                }
            }],
            'password' => ['required', function ($attribute, $value, $fail) {
                if (Hash::check($value, $this->auth_user->password)) {
                    return $fail(__('Please enter different to Old Password.'));
                }
            },'strong_password'],
            'confirm_password' => 'required|same:password',
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
            'old_password.required' => __('validation.required', ['attribute' => 'Old Password']),
            'password.required' => __('validation.required', ['attribute' => 'New Password']),
            'confirm_password.required' => __('validation.required', ['attribute' => 'Confirm Password']),
            'confirm_password.same' => 'The Confirm Password and Password must match.',


        ];
    }
}
