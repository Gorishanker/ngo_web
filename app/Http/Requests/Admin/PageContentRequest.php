<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PageContentRequest extends FormRequest
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
        if (isset(request()->page_content)) {
            if (request()->page_content->language == 'hi') {
                return [
                    'title_h' => 'required|max:150',
                    'content_h' => 'required|min:10',
                    'is_active_h' => 'required',
                    'user_type_h' => 'required',
                ];
            } elseif (request()->page_content->language == 'en' || request()->page_content->language == null) {
                return [
                    'title' => 'required|max:150',
                    'content' => 'required|min:10',
                    'is_active' => 'required',
                    'user_type' => 'required',
                ];
            }
        } else {
            return [
                'title_h' => 'required|max:150',
                'content_h' => 'required|min:10',
                'is_active_h' => 'required',
                'user_type_h' => 'required',
                'user_type' => 'required',
                'title' => 'required|max:150',
                'content' => 'required|min:10',
                'is_active' => 'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'title_h.required' => __('validation.required', ['attribute' => 'Title']),
            'title_h.max' => __('validation.max', ['attribute' => 'Title']),
            // 'title_h.min' => __('validation.min', ['attribute' => 'Title']),
            'content_h.required' => __('validation.required', ['attribute' => 'Content']),
            'content_h.min' => __('validation.min', ['attribute' => 'Content']),
            'is_active_h.required' => __('validation.required', ['attribute' => 'Status']),
            'is_active.required' => __('validation.required', ['attribute' => 'Status']),
            'user_type_h.required' => __('validation.required', ['attribute' => 'User type']),
        ];
    }
}
