<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            'txtUsername' => 'required',
            'txtPass' => 'required',
            'txtRepass' =>'same:txtPass',
        ];
    }
    public function messages()
    {
        return [
            'txtUsername.required' => 'Vui lòng nhập họ tên User.',
            'txtPass.required' => 'Vui lòng nhập password.',
            'txtRepass.same' =>'Hai password không giống nhau.',
        ];
    }
}
