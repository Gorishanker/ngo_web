<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
        if (!request()->is('admin/services/create')) {
            return [
                'title' => 'required|alpha_spaces|min:10|max:150',
                'content' => 'required|min:50',
                'is_active' => 'required',
                'image' => 'nullable|image',
                'brochure_pdf' => 'nullable|file|mimes:pdf',
                'brochure_doc' => 'nullable|file',
            ];
        } else {
            return [
                'title' => 'required|alpha_spaces|min:10|max:150',
                'content' => 'required|min:50',
                'is_active' => 'required',
                'image' => 'required|image',
                'brochure_pdf' => 'required|file|mimes:pdf',
                'brochure_doc' => 'required|file',
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
