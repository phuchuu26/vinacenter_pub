<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaintenanceEditRequest extends FormRequest
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
        return [          
            'txtFull' => 'required',
            
        ];
    }
    public function messages()
    {
        return [           
            'txtFull.required' => 'Vui lòng nhập nội dung.',            
        ];
    }
}
