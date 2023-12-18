<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
        if (!request()->is('admin/events/create')) {
            return [
                'title' => 'required|min:10|max:150',
                'meta_title' => 'required|max:150',
                'meta_description' => 'required|min:10',
                'image' => 'nullable|image',
                'category_id' => 'required',
                'author' => 'required|alpha_spaces|max:150',
                'date' => 'nullable',
                'content' => 'required|min:50',
                'address' => 'required|max:250',
                'lat' => 'nullable',
                'lng' => 'nullable',
                'is_active' => 'required',
            ];
        } else {
            return [
                'title' => 'required|min:10|max:150',
                'meta_title' => 'required|max:150',
                'meta_description' => 'nullable|min:10',
                'image' => 'required|image',
                'category_id' => 'required',
                'author' => 'required|alpha_spaces|max:150',
                'date' => 'nullable|after:yesterday',
                'content' => 'required|min:50',
                'address' => 'required|max:250',
                'lat' => 'nullable',
                'lng' => 'nullable',
                'is_active' => 'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'is_active.required' => __('validation.required', ['attribute' => 'status']),
            'category_id.required' => __('validation.required', ['attribute' => 'category']),
        ];
    }
}
