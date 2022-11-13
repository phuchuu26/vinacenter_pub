<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductEditRequest extends FormRequest
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
            'sltCate' => 'required',
            'txtName' => 'required',
            'txtFull' => 'required',
        ];
    }
    public function messages(){
        return [
            'sltCate.required' => 'Vui lòng chọn loại sản phẩm',
            'txtName.required' => 'Vui lòng nhập tên sản phẩm',
            'txtFull.required' => 'Vui lòng nhập mô tả sản phẩm',
        ];
    }
}
