<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class OccasionRequest extends FormRequest
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
        if (isset(request()->occasion)) {
            
                return [
                    'name' => 'required|alpha_spaces|max:100|unique:occasions,name'.$id,
                    'is_active' => 'required',
                ];
        } else {
            return [
                'name' => 'required|alpha_spaces|max:100|unique:occasions,name',
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
