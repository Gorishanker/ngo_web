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
        if (!request()->is('admin/projects/create')) {
            return [
                'title' => 'required|alpha_spaces|min:10|max:70|unique:projects,title,' .request()->id,
                'image' => 'nullable|image',
                'client_id' => 'nullable',
                'category_id' => 'nullable',
                'is_active' => 'required',
                'side_images' => 'nullable|max:3',
                'brochure_pdf' => 'nullable|file|mimes:pdf',
                'brochure_doc' => 'nullable|file',
                'content' => 'required|min:50',
            ];
        } else {
            return [
                'title' => 'required|alpha_spaces|min:10|max:70|unique:projects,title,except,id',
                'image' => 'required|image',
                'client_id' => 'nullable',
                'category_id' => 'required',
                'is_active' => 'required',
                'side_images' => 'required|max:3',
                'brochure_pdf' => 'required|file|mimes:pdf',
                'brochure_doc' => 'required|file',
                'content' => 'required|min:50',
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
