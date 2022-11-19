<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\InfoUser;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Validator;

class RegistrationController extends Controller
{
    public function create()
    {  
        \Log::debug('create');
        return view('admin.module.registration.create');
    }

    public function store(Request $request )
    {
        $params = $request->all();
        $validator = $this->_registerRule($params);
        
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->messages());
        }

        \Log::debug('store');
        // return redirect()->route('getLogin')->with(['flash_level' => 'result_msg','flash_message' => 'Tạo tài khoản thành công']);
        // $create_user = $this->_createUser($params);

        return redirect()->route('getLogin')->with(['flash_level' => 'result_msg','flash_message' => 'Tạo tài khoản thành công']);
    }

    public function _createUser($params)
    {
      
        $user = new User();
       

    	$user->username = data_get($params, 'phone');
    	$user->password = bcrypt(data_get($params, 'password'));
    	$user->name = data_get($params, 'name');
    	$user->role = 0;
    	$user->email = data_get($params, 'email');
        
    	
    	$user->save();
        
    	$info_user = new InfoUser();
        $info_user->id_user = $user->id;
        $info_user->str_email = $user->email;

        
        $phone = str_replace(array('-', '.', ' '), '', data_get($params, 'phone'));
        if (preg_match('/^[0-9]{10}+$/', $phone)){
            $info_user->str_phone = $phone;
        }

        $info_user->save();
        return true;
    }

     /**
     * Update bin validation
     * @param [array] $form_data
     * @return array
     * @author phucnh61
     */
    public function _registerRule($form_data, $bin = null)
    {
        // dd($form_data);
        $rules = [
            'name' => 'required',
            'phone' => 'min:4|required',
            'email' => 'required|email',
            'password' => 'required',
            'password' => 'required|min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ];

        $check_exist_email = User::where('email', data_get($form_data, 'email'))->first();
        if(!empty($check_exist_email)){
            $rules['email_exist'] = 'required';
        }

        $check_exist_email = User::where('username', data_get($form_data, 'phone'))->first();
        if(!empty($check_exist_email)){
            $rules['phone_exist'] = 'required';
        }

        $messages = [
            'phone_exist.required'       => 'Username / Số điện thoại không hợp lệ.',
            'email_exist.required'       => 'Email không hợp lệ.',
            'name.required' => 'Vui lòng nhập Họ tên.',
            'phone.required' => 'Vui lòng nhập Username / Số điện thoại.',
            'phone.min' => 'Vui lòng nhập Username / Số điện thoại ít nhất 4 ký tự.',
            'email.email' => 'Vui lòng nhập đúng email.',
            'password.required' => 'Vui lòng nhập password.',
            'password_confirmation.min' => 'Vui lòng nhập password ít nhất 6 ký tự.',
            'password.min'              => 'Vui lòng nhập password ít nhất 6 ký tự.',
            'password.required_with'              => 'Vui lòng nhập password.',
            'password.same'              => 'Xác nhận password không khớp.',
        ];


        return Validator::make(
            $form_data,
            $rules,
            $messages
        );
    }
}
