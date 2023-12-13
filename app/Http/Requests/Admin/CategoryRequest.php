<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        $id = null;
        if(isset(request()->id))
        $id = ','.request()->id;
        if (isset(request()->category)) {
            if (request()->category->language == 'hi') {
                return [
                    'category_name_h' => 'required|alpha_spaces|max:30|unique:pgsql.public.categories,category_name'.$id,
                    'is_active_h' => 'required',
                ];
            } elseif (request()->category->language == 'en' || request()->category->language == null) {
                return [
                    'category_name' => 'required|alpha_spaces|max:30|unique:pgsql.public.categories,category_name'.$id,
                    'is_active' => 'required',
                ];
            }
        } else {
            return [
                'category_name_h' => 'required|alpha_spaces|max:30|unique:pgsql.public.categories,category_name',
                'is_active_h' => 'required',
                'category_name' => 'required|alpha_spaces|max:30|unique:pgsql.public.categories,category_name',
                'is_active' => 'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'is_active.required' => __('validation.required', ['attribute' => 'Status']),
            'is_active_h.required' => __('validation.required', ['attribute' => 'Status']),
            'category_name_h.required' => __('validation.required', ['attribute' => 'Category name']),
            'category_name_h.unique' => __('validation.unique', ['attribute' => 'Category name']),
            'category_name_h.alpha_spaces' => __('validation.alpha_spaces', ['attribute' => 'Category name']),
            'category_name_h.max' => __('validation.max', ['attribute' => 'Category name']),
        ];
    }
}
