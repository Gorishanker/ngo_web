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
            'data.free_questation_limit' => 'required|integer|min:1|max:99',
            'data.reward_point_value' => 'required|numeric|min:1|max:999',
            'data.chat_session_time' => 'required|integer|min:1|max:99',
            'data.logo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'data.favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'data.email' => 'required|email:rfc|max:150',
            'data.contact_number' => 'required|phone:IN,mobile|min:10|max:10',
            'data.about_company' => 'required|max:300',
            'data.app-android-link' => 'nullable|active_url|max:255',
            'data.app-ios-link' => 'nullable|active_url|max:255',
            'data.faq-link' => 'nullable|active_url|max:255',
            'data.how-its-work' => 'nullable|active_url|max:255',
            'data.min_version_required' => 'required|numeric|min:1|max:100',
            'data.points_buy_us' => 'required|numeric|min:1|max:100',
            'data.points_buy_in' => 'required|numeric|min:1|max:100',
            'data.points_withdrawal_in' => 'required|numeric|min:1|max:100',
            'data.points_withdrawal_us' => 'required|numeric|min:1|max:100',
            'data.referral_points' => 'required|numeric|min:1|max:100',
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

            'data.free_questation_limit.required' => __('validation.required', ['attribute' => 'Free question limit']),
            'data.free_questation_limit.integer' => __('validation.integer', ['attribute' => 'Free question limit']),
            'data.free_questation_limit.min' => __('validation.min', ['attribute' => 'Free question limit']),
            'data.free_questation_limit.max' => __('validation.max', ['attribute' => 'Free question limit']),

            'data.reward_point_value.required' => __('validation.required', ['attribute' => 'Reward point value']),
            'data.reward_point_value.numeric' => __('validation.numeric', ['attribute' => 'Reward point value']),
            'data.reward_point_value.min' => __('validation.min', ['attribute' => 'Reward point value']),
            'data.reward_point_value.max' => __('validation.max', ['attribute' => 'Reward point value']),

            'data.chat_session_time.required' => __('validation.required', ['attribute' => 'Chat session time']),
            'data.chat_session_time.integer' => __('validation.integer', ['attribute' => 'Chat session time']),
            'data.chat_session_time.min' => __('validation.min', ['attribute' => 'Chat session time']),
            'data.chat_session_time.max' => __('validation.max', ['attribute' => 'Chat session time']),

            'data.logo.image' => __('validation.image', ['attribute' => 'Logo']),
            'data.logo.image' => __('validation.image', ['attribute' => 'Logo']),

            'data.favicon.image' => __('validation.image', ['attribute' => 'Favicon']),
            'data.favicon.image' => __('validation.image', ['attribute' => 'Favicon']),

            'data.app-android-link.active_url' => __('validation.active_url', ['attribute' => 'Android app url']),
            'data.app-android-link.max' => __('validation.max', ['attribute' => 'Android app url']),

            'data.app-ios-link.active_url' => __('validation.active_url', ['attribute' => 'IOS app url']),
            'data.app-ios-link.max' => __('validation.max', ['attribute' => 'IOS app url']),

            'data.faq-link.active_url' => __('validation.active_url', ['attribute' => 'Faq Link']),
            'data.faq-link.max' => __('validation.max', ['attribute' => 'Faq Link']),

            'data.how-its-work.active_url' => __('validation.active_url', ['attribute' => "How it's work video link"]),
            'data.how-its-work.max' => __('validation.max', ['attribute' => "How it's work video link"]),

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

            'data.min_version_required.required' => __('validation.required', ['attribute' => 'Minimum version required']),
            'data.min_version_required.numeric' => __('validation.numeric', ['attribute' => 'Minimum version required']),
            'data.min_version_required.min' => __('validation.min', ['attribute' => 'Minimum version required']),
            'data.min_version_required.max' => __('validation.max', ['attribute' => 'Minimum version required']),

            'data.points_buy_in.required' => __('validation.required', ['attribute' => 'Points buy in India']),
            'data.points_buy_in.numeric' => __('validation.numeric', ['attribute' => 'Points buy in India']),
            'data.points_buy_in.min' => __('validation.min', ['attribute' => 'Points buy in India']),
            'data.points_buy_in.max' => __('validation.max', ['attribute' => 'Points buy in India']),
            
            'data.points_buy_us.required' => __('validation.required', ['attribute' => 'Points buy in USA']),
            'data.points_buy_us.numeric' => __('validation.numeric', ['attribute' => 'Points buy in USA']),
            'data.points_buy_us.min' => __('validation.min', ['attribute' => 'Points buy in USA']),
            'data.points_buy_us.max' => __('validation.max', ['attribute' => 'Points buy in USA']),

            'data.points_withdrawal_in.required' => __('validation.required', ['attribute' => 'Points withdraw in India']),
            'data.points_withdrawal_in.numeric' => __('validation.numeric', ['attribute' => 'Points withdraw in India']),
            'data.points_withdrawal_in.min' => __('validation.min', ['attribute' => 'Points withdraw in India']),
            'data.points_withdrawal_in.max' => __('validation.max', ['attribute' => 'Points withdraw in India']),

            'data.points_withdrawal_us.required' => __('validation.required', ['attribute' => 'Points withdraw in USA']),
            'data.points_withdrawal_us.numeric' => __('validation.numeric', ['attribute' => 'Points withdraw in USA']),
            'data.points_withdrawal_us.min' => __('validation.min', ['attribute' => 'Points withdraw in USA']),
            'data.points_withdrawal_us.max' => __('validation.max', ['attribute' => 'Points withdraw in USA']),

            'data.referral_points.required' => __('validation.required', ['attribute' => 'Referral points']),
            'data.referral_points.numeric' => __('validation.numeric', ['attribute' => 'Referral points']),
            'data.referral_points.min' => __('validation.min', ['attribute' => 'Referral points']),
            'data.referral_points.max' => __('validation.max', ['attribute' => 'Referral points']),
        ];
    }
}
