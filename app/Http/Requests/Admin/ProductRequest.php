<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        if (!request()->is('admin/products/create')) {
            return [
                'title' => 'required|alpha_spaces|min:10|max:150|unique:products,title,' .request()->id,
                'amount' => 'required|integer|max:15000000',
                'image' => 'nullable|image',
                'summery' => 'required|max:250',
                'description' => 'required|min:50',
                'is_active' => 'required',
                'side_images' => 'nullable|max:3',
            ];
        } else {
            return [
                'amount' => 'required|integer|max:15000000',
                'image' => 'required|image',
                'summery' => 'required|max:250',
                'description' => 'required|min:50',
                'is_active' => 'required',
                'side_images' => 'required|max:10',
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
