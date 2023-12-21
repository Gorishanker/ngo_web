<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class BlogCommentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|alpha_spaces|max:30',
            'blog_id' => 'required',
            'email' => 'required|email|max:70',
            'website' => 'nullable|url|max:150',
            'comment' => 'required|min:10|max:300',
        ];
    }

    public function messages()
    {
        return [
            // 'is_active.required' => __('validation.required', ['attribute' => 'Status']),

        ];
    }
}
