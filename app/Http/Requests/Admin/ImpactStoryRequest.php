<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ImpactStoryRequest extends FormRequest
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
        if (!request()->is('admin/impact-stories/create')) {
            return [
                'title' => 'required|min:10|max:50|unique:impact_stories,title,' .request()->id,
                'image' => 'nullable|image',
                'project_id' => 'nullable',
                'is_active' => 'required',
                'content' => 'required',
                'other_images' => 'nullable|max:30',
            ];
        } else {
            return [
                'title' => 'required|min:10|max:50|unique:impact_stories,title',
                'image' => 'required|image',
                'project_id' => 'nullable',
                'content' => 'required',
                'is_active' => 'required',
                'other_images' => 'required|max:30',
            ];
        }
    }

    public function messages()
    {
        return [
            'is_active.required' => __('validation.required', ['attribute' => 'status']),
            'project_id.required' => __('validation.required', ['attribute' => 'project']),
        ];
    }
}
