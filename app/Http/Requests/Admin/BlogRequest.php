<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
        if (!request()->is('admin/blogs/create')) {
            return [
                'title' => 'required|alpha_spaces|min:10|max:150',
                'meta_title' => 'required|max:150',
                'meta_description' => 'required|min:10',
                'image' => 'nullable|image',
                'author' => 'required|alpha_spaces|max:150',
                'schedule_datetime' => 'nullable',
                'content' => 'required|min:50',
                'is_active' => 'required',
            ];
        } else {
            return [
                'title' => 'required|alpha_spaces|min:10|max:150',
                'meta_title' => 'required|max:150',
                'meta_description' => 'required|min:10',
                'image' => 'required|image',
                'author' => 'required|alpha_spaces|max:150',
                'schedule_datetime' => 'nullable|after_or_equal:' . date('Y-m-d H:i:s'),
                'content' => 'required|min:50',
                'is_active' => 'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'is_active.required' => __('validation.required', ['attribute' => 'status']),
        ];
    }
}
