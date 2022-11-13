<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAddRequest extends FormRequest
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
            'txtUser' => 'required|unique:vnc_users,username',
            'txtPass' => 'required',
            'txtRepass' => 'required|same:txtPass',
        ];
    }
    public function messages()
    {
        return [
            'txtUsername.required' => 'Vui lòng nhập họ tên User.',
            'txtUser.required' => 'Vui lòng nhập tên User.',
            'txtUser.unique' => 'User này đã tồn tại, vui lòng chọn tên đăng nhập khác.',
            'txtPass.required' => 'Vui lòng nhập mật khẩu.',
            'txtRepass.required' => 'Vui lòng nhập xác nhận lại mật khẩu.',
            'txtRepass.same' => 'Hai mật khẩu không giống nhau.',
        ];
    }
}
