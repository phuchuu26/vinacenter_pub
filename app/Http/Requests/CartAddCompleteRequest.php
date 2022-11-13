<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartAddCompleteRequest extends FormRequest
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
            'txtAddress' => 'required',
            'txtPhone' => 'required|numeric',
            'txtEmail' => 'required|email',            
        ];
    }
    public function messages(){
        return [
            'txtName.required' => 'Vui lòng nhập Họ tên',
            'txtAddress.required' => 'Vui lòng địa chỉ',
            'txtPhone.required' => 'Vui lòng nhập số điện thoại',
            'txtPhone.numeric' => 'Số điện thoại không hợp lệ',
            'txtEmail.required' => 'Vui lòng Email',
            'txtEmail.email' => 'Email không hợp lệ',
        ];
    }
}
