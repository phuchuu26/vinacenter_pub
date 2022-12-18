<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceCustomerAddRequest extends FormRequest
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
            'phone_customer' => 'required',
            'name_customer' => 'required',
            'product_name' => 'required',
            'condition' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'phone_customer.required' => 'Vui lòng cập nhật Số điện thoại Khách hàng',
            'name_customer.required' => 'Vui lòng cập nhật họ tên Khách hàng',
            'product_name.required' => 'Vui lòng cập nhật tên sản phẩm',
            'condition.required' => 'Vui lòng cập nhật tình trạng khi nhận máy',
        ];
    }
}
