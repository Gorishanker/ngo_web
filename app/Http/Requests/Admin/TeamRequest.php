<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
        if (!request()->is('admin/teams/create')) {
            return [
                'name' => 'required|alpha_spaces|max:40',
                'image' => 'nullable|image',
                'position' => 'required|max:70',
                'description' => 'required|min:10',
                'personal_statement' => 'nullable|min:10',
                'email' => 'nullable|email|max:70',
                'facebook_url' => 'nullable|url|max:150',
                'linkedin_url' => 'nullable|url|max:150',
                'twitter_url' => 'nullable|url|max:150',
                'instagram_url' => 'nullable|url|max:150',
                'is_active' => 'required',
            ];
        } else {
            return [
                'name' => 'required|alpha_spaces|max:40',
                'image' => 'required|image',
                'position' => 'required|max:70',
                'description' => 'required|min:10',
                'personal_statement' => 'nullable|min:10',
                'email' => 'nullable|email|max:70',
                'facebook_url' => 'nullable|url|max:150',
                'linkedin_url' => 'nullable|url|max:150',
                'twitter_url' => 'nullable|url|max:150',
                'instagram_url' => 'nullable|url|max:150',
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
