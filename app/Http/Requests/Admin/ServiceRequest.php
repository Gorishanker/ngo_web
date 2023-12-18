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
                'image' => 'nullable|image|max:3072',
                'brochure_pdf' => 'nullable|file|mimes:pdf|max:3072',
                'brochure_doc' => 'nullable|file|max:3072',
            ];
        } else {
            return [
                'title' => 'required|alpha_spaces|min:10|max:150',
                'content' => 'required|min:50',
                'is_active' => 'required',
                'image' => 'required|image|max:3072',
                'brochure_pdf' => 'required|file|mimes:pdf|max:3072',
                'brochure_doc' => 'required|file|max:3072',
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
