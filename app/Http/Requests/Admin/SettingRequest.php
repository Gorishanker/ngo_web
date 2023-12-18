<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'data.site_name' => 'required|alpha_spaces|min:5|max:30',
            'data.web_site_name' => 'required|alpha_spaces|min:5|max:150',
            'data.copyright_text' => 'required|min:5|max:150',
            'data.logo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'data.favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'data.email' => 'required|email:rfc|max:150',
            'data.contact_number' => 'required|min:10|max:15',
            'data.about_company' => 'required|max:300',
            'data.address' => 'required|max:70',
            'data.available_time' => 'required|max:50',
        ];
    }

    public function messages()
    {
        return [
            'data.site_name.required' => __('validation.required', ['attribute' => 'Site Name']),
            'data.site_name.min' => __('validation.min', ['attribute' => 'Site Name']),
            'data.site_name.max' => __('validation.max', ['attribute' => 'Site Name']),
            'data.site_name.alpha_spaces' => __('validation.alpha_spaces', ['attribute' => 'Site Name']),

            'data.web_site_name.required' => __('validation.required', ['attribute' => 'Meta title']),
            'data.web_site_name.min' => __('validation.min', ['attribute' => 'Meta title']),
            'data.web_site_name.max' => __('validation.max', ['attribute' => 'Meta title']),
            'data.web_site_name.alpha_spaces' => __('validation.alpha_spaces', ['attribute' => 'Meta title']),

            'data.copyright_text.max' => __('validation.max', ['attribute' => 'Copyright text title']),
            'data.copyright_text.min' => __('validation.min', ['attribute' => 'Copyright text title']),
            'data.copyright_text.required' => __('validation.required', ['attribute' => 'Copyright text title']),

        

            'data.logo.image' => __('validation.image', ['attribute' => 'Logo']),
            'data.logo.image' => __('validation.image', ['attribute' => 'Logo']),

            'data.favicon.image' => __('validation.image', ['attribute' => 'Favicon']),
            'data.favicon.image' => __('validation.image', ['attribute' => 'Favicon']),


            'data.copyright_text.required' => __('validation.required', ['attribute' => 'Copyright text']),
            'data.contact_number.required' => __('validation.required', ['attribute' => 'Contact Number']),
            'data.home_page_title.required' => __('validation.required', ['attribute' => 'Home Page Title']),
            'data.company_full_name.required' => __('validation.required', ['attribute' => 'Company Full Name']),
            'data.email.required' => __('validation.required', ['attribute' => 'Email']),
            'data.email.email' => __('validation.email', ['attribute' => 'Email']),
            'data.email.max' => __('validation.max', ['attribute' => 'Email']),
            'data.contact_number.required' => __('validation.required', ['attribute' => 'Contact No']),
            'data.contact_number.max' => __('validation.max', ['attribute' => 'Contact No']),
            'data.contact_number.min' => __('validation.min', ['attribute' => 'Contact No']),
            'data.contact_number.phone' => __('validation.phone', ['attribute' => 'Contact No']),
            'data.about_company.required' => __('validation.required', ['attribute' => 'About Company']),
            'data.about_company.max' => __('validation.max', ['attribute' => 'About Company']),

            'data.address.max' => __('validation.max', ['attribute' => 'Address']),
            'data.address.required' => __('validation.required', ['attribute' => 'Address']),

            'data.available_time.max' => __('validation.max', ['attribute' => 'Time']),
            'data.available_time.required' => __('validation.required', ['attribute' => 'Time']),
          
        ];
    }
}
