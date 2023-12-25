<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SponsorRequest extends FormRequest
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
        if (!request()->is('admin/sponsors/create')) {
            return [
                'name' => 'required|max:150',
                'is_active' => 'required',
                'image' => 'nullable|image',
            ];
        } else {
            return [
                'name' => 'required|max:150',
                'is_active' => 'required',
                'image' => 'required|image',
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
