<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsAddRequest extends FormRequest
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
            'txtIntro' => 'required|unique:news,title',
            'txtFull' => 'required',
            'newsImg' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'txtIntro.required' => 'Vui lòng nhập tiêu đề tin.',
            'txtIntro.unique' => 'Tiêu đề này đã tồn tại.',
            'txtFull.required' => 'Vui lòng nhập nội dung tin.',
            'newsImg.required' => 'Vui lòng chọn hình ảnh.',
        ];
    }
}
