<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactAddRequest extends FormRequest
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
            'txtName' => 'required',
            'txtEmail' => 'required|email', 
            'txtContent' => 'required',            
        ];
    }
    public function messages(){
        return[
            'txtName.required' => 'Vui lòng nhập họ tên',
            'txtEmail.required' => 'Vui lòng nhập Email',
            'txtEmail.email' => 'Email không hợp lệ',
            'txtContent.required' => 'Vui lòng nhập nội dung',
        ];
    }
}
