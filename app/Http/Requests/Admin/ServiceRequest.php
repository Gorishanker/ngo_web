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
                'title' => 'required|alpha_spaces|max:50',
                'content' => 'required|min:50',
                'is_active' => 'required',
                'image' => 'nullable|image|max:3072',
                'icon' => 'nullable|image|max:1024',
                'brochure_pdf' => 'nullable|file|mimes:pdf|max:3072',
                'brochure_doc' => 'nullable|file|mimes:jpg,png,jpeg,txt,doc,docx|max:3072',
            ];
        } else {
            return [
                'title' => 'required|alpha_spaces|max:50',
                'content' => 'required|min:50',
                'is_active' => 'required',
                'image' => 'required|image|max:3072',
                'icon' => 'required|image|max:1024',
                'brochure_pdf' => 'required|file|mimes:pdf|max:3072',
                'brochure_doc' => 'required|file|mimes:jpg,png,jpeg,txt,doc,docx|max:3072',
            ];
        }
    }

    public function messages()
    {
        return [
            'is_active.required' => __('validation.required', ['attribute' => 'status']),
            'brochure_doc.required' => __('validation.required', ['attribute' => 'brochure document']),
            'brochure_doc.file' => __('validation.file', ['attribute' => 'brochure document']),
            'brochure_doc.mimes' => __('validation.mimes', ['attribute' => 'brochure document']),
            'brochure_doc.max' => __('validation.max', ['attribute' => 'brochure document']),
        ];
    }
}
