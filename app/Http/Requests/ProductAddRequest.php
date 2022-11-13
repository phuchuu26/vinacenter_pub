<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
            'sltCate'  => 'required',
            'txtName' => 'required|unique:vnc_product,title',            
            'txtFull'  => 'required',
            'file'  => 'required',         
        ];
    }
    public function messages(){
         return [
            'sltCate.required'  => 'Vui lòng chọn loại Sản phẩm.',
            'txtName.required' => 'Vui lòng nhập tên Sản phẩm.',
            'txtName.unique' => 'Tên Sản phẩm này đã tồn tại. Vui lòng chọn tên khác.',           
            'txtFull.required'  => 'Vui lòng nhập mô tả.', 
            'file.required' => 'Vui lòng chọn hình ảnh.', 
        ];
    }
}
