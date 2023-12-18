<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
        if (isset(request()->tag)) {
            
                return [
                    'name' => 'required|alpha_spaces|max:30|unique:tags,name'.$id,
                    'is_active' => 'required',
                ];
        } else {
            return [
                'name' => 'required|alpha_spaces|max:30|unique:tags,name',
                'is_active' => 'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'is_active.required' => __('validation.required', ['attribute' => 'Status']),
    
        ];
    }
}
