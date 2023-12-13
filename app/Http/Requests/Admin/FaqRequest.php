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
            if (request()->faq->language == 'hi') {
                return [
                    'question_h' => 'required|min:10|max:150',
                    'answer_h' => 'required|min:10|max:500',
                    'is_active_h' => 'required',
                ];
            } elseif (request()->faq->language == 'en' || request()->faq->language == null) {
                return [
                    'question' => 'required|min:10|max:150',
                    'answer' => 'required|min:10|max:500',
                    'is_active' => 'required',
                ];
            }
        } else {
            return [
                'question_h' => 'required|min:10|max:150',
                'answer_h' => 'required|min:10|max:500',
                'is_active_h' => 'required',
                'question' => 'required|min:10|max:150',
                'answer' => 'required|min:10|max:500',
                'is_active' => 'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'question_h.required' => __('validation.required', ['attribute' => 'Question']),
            'question_h.min' => __('validation.min', ['attribute' => 'Question']),
            'question_h.max' => __('validation.max', ['attribute' => 'Question']),
            'answer_h.required' => __('validation.required', ['attribute' => 'Answer']),
            'answer_h.min' => __('validation.min', ['attribute' => 'Answer']),
            'answer_h.max' => __('validation.max', ['attribute' => 'Answer']),
            'is_active_h.required' => __('validation.required', ['attribute' => 'Status']),
            'is_active.required' => __('validation.required', ['attribute' => 'Status']),
        ];
    }
}
