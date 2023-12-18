<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
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
        if (isset(request()->faq)) {
                return [
                    'question' => 'required|min:10|max:150',
                    'answer' => 'required|min:10|max:500',
                    'is_active' => 'required',
                ];
        } else {
            return [
                'question' => 'required|min:10|max:150',
                'answer' => 'required|min:10|max:500',
                'is_active' => 'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'is_active.required' => __('validation.required', ['attribute' => 'Status']),
        ];
    }
}
