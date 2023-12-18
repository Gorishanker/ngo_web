<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EditProfileRequest extends FormRequest
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
            'name' => 'required|alpha_spaces|max:30',
            'mobile_no' => 'required|phone:IN,mobile|max:15|unique:admins,mobile_no,' . request()->id,
            'email' => 'required|email:rfc|max:30|unique:admins,email,' . request()->id,
        ];
    }
    public function messages()
    {
        return [
            'name.required' => __('validation.required', ['attribute' => 'Name']),
            'name.alpha_spaces' => __('validation.alpha_spaces', ['attribute' => 'Name']),
            'mobile_no.required' => __('validation.required', ['attribute' => 'Mobile No.']),
            'mobile_no.numeric' => __('validation.numeric', ['attribute' => 'Mobile No.']),
            'mobile_no.phone' => __('validation.phone', ['attribute' => 'Mobile No.']),
            'email.required' => __('validation.required', ['attribute' => 'Email']),
            'email.email' => __('validation.email', ['attribute' => 'Email']),
            'email.unique' => __('validation.unique', ['attribute' => 'Email']),
        ];
    }
}
