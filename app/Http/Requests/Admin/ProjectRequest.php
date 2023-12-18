<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
                'image' => 'nullable|image',
                'client_id' => 'nullable',
                'category_id' => 'nullable',
                'is_active' => 'required',
                'side_images' => 'required|max:3',
                'brochure_pdf' => 'nullable|file|mimes:pdf',
                'brochure_doc' => 'nullable|file',
            ];
        } else {
            return [
                'title' => 'required|alpha_spaces|min:10|max:150',
                'image' => 'required|image',
                'client_id' => 'nullable',
                'category_id' => 'nullable',
                'is_active' => 'required',
                'side_images' => 'required|max:3',
                'brochure_pdf' => 'required|file|mimes:pdf',
                'brochure_doc' => 'required|file',
            ];
        }
    }

    public function messages()
    {
        return [
            'is_active.required' => __('validation.required', ['attribute' => 'status']),
            'client_id.required' => __('validation.required', ['attribute' => 'client']),
        ];
    }
}
