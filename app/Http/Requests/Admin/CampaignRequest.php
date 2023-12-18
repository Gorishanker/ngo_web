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
                'title' => 'required|alpha_spaces|min:10|max:150',
                'image' => 'nullable|image',
                'tags' => 'nullable',
                'target_amount' => 'required|integer|max:15000000',
                'content' => 'required|min:50',
                'is_active' => 'required',
            ];
        } else {
            return [
                'title' => 'required|alpha_spaces|min:10|max:150',
                'image' => 'required|image',
                'tags' => 'nullable',
                'target_amount' => 'required|integer|max:15000000',
                'content' => 'required|min:50',
                'is_active' => 'required',
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
