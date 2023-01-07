<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductOptionAddRequest extends FormRequest
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
            'txtName' => 'required|unique:product_option,name',
            'txtValue' => 'required|integer',
            'txtIntro' => 'required',
            'amount_discount' => 'required_with:code'
        ];
    }
    public function messages()
    {
        return [
            'txtName.required' => 'Vui lòng nhập tên option.',
            'txtName.unique' => 'Tên option này đã tồn tại.',
            'txtValue.required' => 'Vui lòng nhập giá trị option.',
            'txtValue.integer' => 'Giá trị chỉ được nhập số nguyên.',
            'txtIntro.required' => 'Vui lòng nhập mô tả.',            
            'amount_discount.required_with' => 'Vui lòng nhập số tiền giảm giá.',            
        ];
    }
}
