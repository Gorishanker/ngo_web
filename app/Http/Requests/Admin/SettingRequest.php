<?php

namespace App\Http\Requests\Admin;

use App\Rules\ValidYouTubeURL;
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
            'data.whatsapp_number' => 'required|min:10|max:15',
            'data.letest_campaign_video_url' => 'required|url|max:150',
            'data.facebook_url' => 'nullable|url|max:150',
            'data.linkedin_url' => 'nullable|url|max:150',
            'data.instagram_url' => 'nullable|url|max:150',
            'data.twitter_url' => 'required|url|max:150',
            'data.about_company' => 'required|max:300',
            'data.address' => 'required|max:70',
            'data.available_time' => 'required|max:50',
            'data.bank_name' => 'required|max:50',
            'data.ac_number' => 'required|max:50',
            'data.ifsc_code' => 'required|max:25',
            'data.ac_name' => 'required|max:50',
            'data.branch' => 'required|max:150',
            'data.qr_scanner' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ];
    }

    public function messages()
    {
        return [
            'data.site_name.required' => __('validation.required', ['attribute' => 'Site name']),
            'data.site_name.min' => __('validation.min', ['attribute' => 'Site name']),
            'data.site_name.max' => __('validation.max', ['attribute' => 'Site name']),
            'data.site_name.alpha_spaces' => __('validation.alpha_spaces', ['attribute' => 'Site name']),

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
            'data.home_page_title.required' => __('validation.required', ['attribute' => 'Home page title']),
            'data.company_full_name.required' => __('validation.required', ['attribute' => 'Company full name']),
            'data.email.required' => __('validation.required', ['attribute' => 'Email']),
            'data.email.email' => __('validation.email', ['attribute' => 'Email']),
            'data.email.max' => __('validation.max', ['attribute' => 'Email']),
            'data.contact_number.required' => __('validation.required', ['attribute' => 'Contact no']),
            'data.contact_number.max' => __('validation.max', ['attribute' => 'Contact No']),
            'data.contact_number.min' => __('validation.min', ['attribute' => 'Contact No']),
            'data.contact_number.phone' => __('validation.phone', ['attribute' => 'Contact No']),
            'data.whatsapp_number.required' => __('validation.required', ['attribute' => 'Whatsapp no']),
            'data.whatsapp_number.max' => __('validation.max', ['attribute' => 'Whatsapp no']),
            'data.whatsapp_number.min' => __('validation.min', ['attribute' => 'Whatsapp no']),
            'data.whatsapp_number.phone' => __('validation.phone', ['attribute' => 'Whatsapp no']),
            'data.about_company.required' => __('validation.required', ['attribute' => 'About company']),
            'data.about_company.max' => __('validation.max', ['attribute' => 'About company']),

            'data.address.max' => __('validation.max', ['attribute' => 'Address']),
            'data.address.required' => __('validation.required', ['attribute' => 'Address']),

            'data.available_time.max' => __('validation.max', ['attribute' => 'Time']),
            'data.available_time.required' => __('validation.required', ['attribute' => 'Time']),

            'data.letest_campaign_video_url.required' => __('validation.required', ['attribute' => 'Letest campaign video url']),
            'data.letest_campaign_video_url.max' => __('validation.max', ['attribute' => 'Letest campaign video url']),
            'data.letest_campaign_video_url.url' => __('validation.url', ['attribute' => 'Letest campaign video url']),
            'data.facebook_url.max' => __('validation.max', ['attribute' => 'Facebook url']),
            'data.facebook_url.url' => __('validation.url', ['attribute' => 'Facebook url']),
            'data.instagram_url.max' => __('validation.max', ['attribute' => 'Instagram url']),
            'data.instagram_url.url' => __('validation.url', ['attribute' => 'Instagram url']),
            'data.linkedin_url.max' => __('validation.max', ['attribute' => 'Linkedin url']),
            'data.linkedin_url.url' => __('validation.url', ['attribute' => 'Linkedin url']),
            'data.twitter_url.max' => __('validation.max', ['attribute' => 'Twitter url']),
            'data.twitter_url.url' => __('validation.url', ['attribute' => 'Twitter url']),

            'data.qr_scanner.image' => __('validation.image', ['attribute' => 'QR/Scanner']),
            'data.qr_scanner.mimes' => __('validation.mimes', ['attribute' => 'QR/Scanner']),
            'data.branch.required' => __('validation.required', ['attribute' => 'Branch']),
            'data.branch.max' => __('validation.max', ['attribute' => 'Branch']),
            'data.ac_name.required' => __('validation.required', ['attribute' => 'A/C Name']),
            'data.ac_name.max' => __('validation.max', ['attribute' => 'A/C Name']),
            'data.ifsc_code.required' => __('validation.required', ['attribute' => 'IFSC Code']),
            'data.ifsc_code.max' => __('validation.max', ['attribute' => 'IFSC Code']),
            'data.ac_number.required' => __('validation.required', ['attribute' => 'A/C Number']),
            'data.ac_number.max' => __('validation.max', ['attribute' => 'A/C Number']),
            'data.bank_name.required' => __('validation.required', ['attribute' => 'Bank Name']),
            'data.bank_name.max' => __('validation.max', ['attribute' => 'Bank Name']),
        ];
    }
}
