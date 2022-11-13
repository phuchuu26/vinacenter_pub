<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupportEditRequest extends FormRequest
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
            'txtContent' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'txtName.required' => 'Vui lòng nhập tiêu đề',
            'txtContent.required' => 'Vui lòng nhập nội dung',
        ];
    }
}
