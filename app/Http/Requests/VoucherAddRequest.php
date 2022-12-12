<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoucherAddRequest extends FormRequest
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
            'code' => 'required',
            'amount_discount' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'code.required' => 'Vui lòng nhật Code voucher',
            'amount_discount.required' => 'Vui lòng nhật số tiền giảm giá',
        ];
    }
}
