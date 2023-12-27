<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
        if (!request()->is('admin/banners/create')) {
            return [
                'content' => 'required|min:10',
                'is_active' => 'required',
                'image' => 'nullable|image',
                'button_1_text' => 'required|max:20',
                'button_1_url' => 'required|url|max:150',
                'button_2_text' => 'required|max:20',
                'button_2_url' => 'required|url|max:150',

            ];
        } else {
            return [
                'content' => 'required|min:10',
                'is_active' => 'required',
                'image' => 'required|image',
                'button_1_text' => 'required|max:20',
                'button_1_url' => 'required|url|max:150',
                'button_2_text' => 'required|max:20',
                'button_2_url' => 'required|url|max:150',
            ];
        }
    }

    public function messages()
    {
        return [
            'is_active.required' => __('validation.required', ['attribute' => 'status']),

            'button_1_text.required' => __('validation.required', ['attribute' => 'button 1st text']),
            'button_1_text.max' => __('validation.max', ['attribute' => 'button 1st text']),
            'button_1_url.required' => __('validation.required', ['attribute' => 'button 1st url']),
            'button_1_url.max' => __('validation.required', ['attribute' => 'button 1st url']),
            'button_1_url.url' => __('validation.required', ['attribute' => 'button 1st url']),
            
            'button_2_text.required' => __('validation.required', ['attribute' => 'button 2nd text']),
            'button_2_text.max' => __('validation.max', ['attribute' => 'button 2nd text']),
            'button_2_url.required' => __('validation.required', ['attribute' => 'button 2nd url']),
            'button_2_url.max' => __('validation.required', ['attribute' => 'button 2nd url']),
            'button_2_url.url' => __('validation.required', ['attribute' => 'button 2nd url']),
        ];
    }
}
