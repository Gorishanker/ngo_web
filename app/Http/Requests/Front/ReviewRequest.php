<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'campaign_id' => 'nullable',
            'product_id' => 'nullable',
            'email' => 'required|email|max:70',
            'rating' => 'required|integer|max:5',
            'review' => 'required|min:10|max:250',
        ];
    }

    public function messages()
    {
        return [
            // 'is_active.required' => __('validation.required', ['attribute' => 'Status']),

        ];
    }
}
