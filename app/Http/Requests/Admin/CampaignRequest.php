<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CampaignRequest extends FormRequest
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
        if (!request()->is('admin/campaigns/create')) {
            return [
                'title' => 'required|max:70',
                'image' => 'nullable|image',
                'target_amount' => 'required|integer|gt:0|max:15000000',
                'hint' => 'nullable',
                'benefit' => 'nullable',
                'short_description' => 'nullable',
                'primary_description' => 'nullable',
                'secondary_description' => 'nullable',
                'is_active' => 'required',
                'combo.*.name' => 'required_with:combo.*.file|max:70',
                'combo.*.price' => 'required_with:combo.*.name|integer|between:1,1000000',
            ];
        } else {
            return [
                'title' => 'required|max:70',
                'image' => 'required|image',
                'target_amount' => 'required|integer|gt:0|max:15000000',
                'hint' => 'nullable',
                'benefit' => 'nullable',
                'short_description' => 'nullable',
                'primary_description' => 'nullable',
                'secondary_description' => 'nullable',
                'is_active' => 'required',
                'combo.*.name' => 'required|max:70',
                'combo.*.price' => 'required|integer|between:1,1000000',
            ];
        }
    }

    public function messages()
    {
        return [
            'is_active.required' => __('validation.required', ['attribute' => 'status']),
            'combo.*.name.max' => __('validation.max', ['attribute' => 'Combo name']),
            'combo.*.name.required' => __('validation.required', ['attribute' => 'Combo name']),

            'combo.*.price.integer' => __('validation.integer', ['attribute' => 'Combo price']),
            'combo.*.price.between' => __('validation.between', ['attribute' => 'Combo price']),
            'combo.*.price.required' => __('validation.required', ['attribute' => 'Combo price']),

        ];
    }
}
