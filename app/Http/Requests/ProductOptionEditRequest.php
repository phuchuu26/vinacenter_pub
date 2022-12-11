<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductOptionEditRequest extends FormRequest
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
            'txtValue' => 'required|integer',
            'txtIntro' => 'required',
            'amount_discount' => 'required_with:code|integer'
        ];
    }
    public function messages()
    {
        return [
            'txtName.required' => 'Vui lòng nhập tên option.',
            'txtValue.required' => 'Vui lòng nhập giá trị.',
            'txtValue.integer' => 'Giá trị chỉ được nhập số nguyên.',
            'txtIntro.required' => 'Vui lòng nhập mô tả.',
            'amount_discount.required_with' => 'Vui lòng nhập số tiền giảm giá.',      
        ];
    }
}
