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
            'data.web_site_name' => 'required|alpha_spaces|min:5|max:70',
            'data.copyright_text' => 'required|min:5|max:30',
            'data.logo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'data.favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'data.email' => 'required|email:rfc|max:70',
            'data.contact_number' => 'required|min:10|max:15',
            'data.whatsapp_number' => 'required|min:10|max:15',
            'data.letest_campaign_video_url' => 'required|url|max:150',
            'data.facebook_url' => 'nullable|url|max:150',
            'data.linkedin_url' => 'nullable|url|max:150',
            'data.instagram_url' => 'nullable|url|max:150',
            'data.twitter_url' => 'nullable|url|max:150',
            'data.about_company' => 'required|max:300',
            'data.contact_us_text' => 'required|max:200',
            'data.address' => 'required|max:50',
            'data.available_time' => 'required|max:30',
            'data.bank_name' => 'required|max:50',
            'data.ac_number' => 'required|max:50',
            'data.ifsc_code' => 'required|max:25',
            'data.ac_name' => 'required|max:50',
            'data.branch' => 'required|max:150',
            'data.qr_scanner' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'data.site_mode' => 'required',

            'data.about_1st_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'data.about_1_btn_text' => 'required|max:30',
            'data.about_2_btn_text' => 'required|max:30',
            'data.about_1_btn_url' => 'required|url|max:150',
            'data.about_2_btn_url' => 'required|url|max:150',
            'data.total_globalization_work' => 'required|integer|max:195',
            'data.total_happy_donator' => 'required|integer|max:100000000',
            'data.total_success_mission' => 'required|integer|max:100000',
            'data.total_volunteer_reached' => 'required|integer|max:100000',
            'data.volunteer_section_heading' => 'required|max:50',
            'data.volunteer_section_description' => 'required|max:250',
            'data.blog_section_heading' => 'required|max:50',
            'data.blog_section_description' => 'required|max:250',
            'data.sponsor_section_heading' => 'required|max:50',
            'data.sponsor_section_description' => 'required|max:250',
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
            'data.contact_number.required' => __('validation.required', ['attribute' => 'Contact no.']),
            'data.contact_number.max' => __('validation.max', ['attribute' => 'Contact No.']),
            'data.contact_number.min' => __('validation.min', ['attribute' => 'Contact No.']),
            'data.contact_number.phone' => __('validation.phone', ['attribute' => 'Contact No.']),
            'data.whatsapp_number.required' => __('validation.required', ['attribute' => 'Whatsapp no.']),
            'data.whatsapp_number.max' => __('validation.max', ['attribute' => 'Whatsapp no.']),
            'data.whatsapp_number.min' => __('validation.min', ['attribute' => 'Whatsapp no.']),
            'data.whatsapp_number.phone' => __('validation.phone', ['attribute' => 'Whatsapp no.']),
            'data.about_company.required' => __('validation.required', ['attribute' => 'About company']),
            'data.about_company.max' => __('validation.max', ['attribute' => 'About company']),

            'data.contact_us_text.required' => __('validation.required', ['attribute' => 'Contact us']),
            'data.contact_us_text.max' => __('validation.max', ['attribute' => 'Contact us']),

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
            'data.twitter_url.required' => __('validation.required', ['attribute' => 'Twitter url']),

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
            'data.site_mode.required' => __('validation.required', ['attribute' => 'Site Mode']),

            'data.about_1_btn_text.required' => __('validation.required', ['attribute' => 'Button 1st text']),
            'data.about_2_btn_text.required' => __('validation.required', ['attribute' => 'Button 2nd text']),
            'data.about_1_btn_text.max' => __('validation.max', ['attribute' => 'Button 1st text']),
            'data.about_2_btn_text.max' => __('validation.max', ['attribute' => 'Button 2nd text']),

            'data.about_1_btn_url.required' => __('validation.required', ['attribute' => 'Button 1st text']),
            'data.about_2_btn_url.required' => __('validation.required', ['attribute' => 'Button 2nd text']),
            'data.about_1_btn_url.max' => __('validation.max', ['attribute' => 'Button 1st text']),
            'data.about_2_btn_url.max' => __('validation.max', ['attribute' => 'Button 2nd text']),
            'data.about_1_btn_url.url' => __('validation.url', ['attribute' => 'Button 1st text']),
            'data.about_2_btn_url.url' => __('validation.url', ['attribute' => 'Button 2nd text']),

            'data.total_globalization_work.required' => __('validation.required', ['attribute' => 'Total globalization work']),
            'data.total_globalization_work.integer' => __('validation.integer', ['attribute' => 'Total globalization work']),
            'data.total_globalization_work.max' => __('validation.max', ['attribute' => 'Total globalization work']),
            
            'data.total_happy_donator.required' => __('validation.required', ['attribute' => 'Total happy donators']),
            'data.total_happy_donator.integer' => __('validation.integer', ['attribute' => 'Total happy donators']),
            'data.total_happy_donator.max' => __('validation.max', ['attribute' => 'Total happy donators']),

            'data.total_success_mission.required' => __('validation.required', ['attribute' => 'Total success mission']),
            'data.total_success_mission.integer' => __('validation.integer', ['attribute' => 'Total success mission']),
            'data.total_success_mission.max' => __('validation.max', ['attribute' => 'Total success mission']),

            'data.total_volunteer_reached.required' => __('validation.required', ['attribute' => 'Total volunteer reached']),
            'data.total_volunteer_reached.integer' => __('validation.integer', ['attribute' => 'Total volunteer reached']),
            'data.total_volunteer_reached.max' => __('validation.max', ['attribute' => 'Total volunteer reached']),

            'data.volunteer_section_heading.required' => __('validation.required', ['attribute' => 'Volunteer section heading']),
            'data.volunteer_section_heading.alpha_spaces' => __('validation.alpha_spaces', ['attribute' => 'Volunteer section heading']),
            'data.volunteer_section_heading.max' => __('validation.max', ['attribute' => 'Volunteer section heading']),

            'data.volunteer_section_description.required' => __('validation.required', ['attribute' => 'Volunteer section description']),
            'data.volunteer_section_description.alpha_spaces' => __('validation.alpha_spaces', ['attribute' => 'Volunteer section description']),
            'data.volunteer_section_description.max' => __('validation.max', ['attribute' => 'Volunteer section description']),

            'data.blog_section_heading.required' => __('validation.required', ['attribute' => 'Blog section heading']),
            'data.blog_section_heading.alpha_spaces' => __('validation.alpha_spaces', ['attribute' => 'Blog section heading']),
            'data.blog_section_heading.max' => __('validation.max', ['attribute' => 'Blog section heading']),

            'data.blog_section_description.required' => __('validation.required', ['attribute' => 'Blog section description']),
            'data.blog_section_description.alpha_spaces' => __('validation.alpha_spaces', ['attribute' => 'Blog section description']),
            'data.blog_section_description.max' => __('validation.max', ['attribute' => 'Blog section description']),

            'data.blog_section_heading.required' => __('validation.required', ['attribute' => 'Blog section heading']),
            'data.blog_section_heading.alpha_spaces' => __('validation.alpha_spaces', ['attribute' => 'Blog section heading']),
            'data.blog_section_heading.max' => __('validation.max', ['attribute' => 'Blog section heading']),

            'data.sponsor_section_description.required' => __('validation.required', ['attribute' => 'Sponsor section description']),
            'data.sponsor_section_description.alpha_spaces' => __('validation.alpha_spaces', ['attribute' => 'Sponsor section description']),
            'data.sponsor_section_description.max' => __('validation.max', ['attribute' => 'Sponsor section description']),

            'data.sponsor_section_heading.required' => __('validation.required', ['attribute' => 'Sponsor section heading']),
            'data.sponsor_section_heading.alpha_spaces' => __('validation.alpha_spaces', ['attribute' => 'Sponsor section heading']),
            'data.sponsor_section_heading.max' => __('validation.max', ['attribute' => 'Sponsor section heading']),

            'data.about_1st_image.image' => __('validation.image', ['attribute' => '1st Section Image ']),
            'data.about_1st_image.required' => __('validation.required', ['attribute' => '1st Section Image ']),
        ];
    }
}
