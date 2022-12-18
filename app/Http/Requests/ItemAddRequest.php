<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemAddRequest  extends FormRequest
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
            'item' => 'required',
            'unit_price' => 'required',
            'qty' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'item.required' => 'Vui lòng cập nhật tên sản phẩm',
            'unit_price.required' => 'Vui lòng cập nhật đơn giá',
            'qty.required' => 'Vui lòng cập nhật số lượng',
        ];
    }
}
