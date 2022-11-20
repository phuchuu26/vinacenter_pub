<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\InfoUser;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Mail;
use Illuminate\Support\Facades\Session;
use Hash;
use Validator;

class LoginController extends Controller
{
    public function getLogin()
    {
        if (!Auth::check()) {
            return view('admin.module.login.login');
        } else {
            return redirect('vncadmin');
        }
    }

    public function postLogin(LoginRequest $request)
    {
        $login = [
            'username' => $request->txtUser,
            'password' => $request->txtPass,
        ];
        if (Auth::attempt($login)) {
            //return redirect()->route('getOrderList');
            return redirect()->route('index');
        } else {
            return redirect()->back()->with(['flash_level' => 'error_msg', 'flash_message' => 'Tên đăng nhập hoặc mật khẩu không đúng.']);
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('index');
    }


    //forget password

    public function sendMailReset(Request $request)
    {
        $email = $request->email;
        $info_user = InfoUser::where('str_email', $email)->first();
        $reset_token = str_random(30);
        $info_user->reset_token = $reset_token;
        $info_user->save();

        $user =  $info_user->user;

        $info_user = json_decode(json_encode($info_user), true);
        $user = json_decode(json_encode($user), true);
        $info_user['name'] = data_get($user, 'name');
        $info_user['username'] = data_get($user, 'username');
       
        $info_user['action_url'] = route('reset_password', ['token' => $reset_token]);
        // dd($info_user);

        
        // return view('admin.mail.reset_password');
        // dd( $info_user, $reset_token);

        Mail::send('admin.mail.reset_password',  ['user' => $info_user], function($message) use ($email) {
	        $message->to( $email, 'Vinacenter')->subject('Yêu cầu đặt lại mật khẩu Vinacenter!');
	    });

        Session::flash('flash_level', 'Yêu cầu đặt lại mật khẩu thành công!');

        return redirect()->route('getLogin')->with(['flash_level' => 'alert-success',
            'flash_message' => 'Yêu cầu đặt lại mật khẩu thành công!']);
    }

    public function resetPassword(Request $request){
        $token = $request->token;
        $info_user = InfoUser::where('reset_token', $token)->first();

        if(empty($info_user)){
            return redirect()->route('getLogin')->with(['flash_level' => 'alert-danger',
            'flash_message' => 'Đường dẫn đã hết hạn!']);
        }

        return view('admin.module.reset_password.changepw', compact(['info_user']));
        // dd($info_user);
    }


    public function postResetPassword(Request $request){
        $token = $request->token;
        $params = $request->all();
        $info_user = InfoUser::where('reset_token', $token)->first();

        if(empty($info_user)){
            return redirect()->route('getLogin')->with(['flash_level' => 'alert-danger',
            'flash_message' => 'Đường dẫn đã hết hạn!']);
        }

        $validator = $this->_resetPasswordRule($params, $info_user);
        
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->messages());
        }

        $reset_password = $this->_resetPassword($params, $info_user);

        return redirect()->route('getLogin')->with(['flash_level' => 'alert-success',
        'flash_message' => 'Đã đặt lại mật khẩu thành công!']);
    }

    public function _resetPasswordRule($form_data, $info_user)
    {
        $user = $info_user->user;
        // dd(Hash::check(data_get($form_data, 'old_password'), $user->password));
        $rules = [
            'password' => 'required|min:6',
            'repassword' => 'required|same:password',
        ];
        
        $messages = [
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min'   => 'Vui lòng nhập password ít nhất 6 ký tự.',
            'repassword.required' => 'Vui lòng nhập xác nhận lại mật khẩu.',
            'repassword.same' => 'Hai mật khẩu không giống nhau.',
        ];

        return Validator::make(
            $form_data,
            $rules,
            $messages
        );
    }
    public function _resetPassword($params, $info_user)
    {
        $user = $info_user->user;
        $user->password = bcrypt(data_get($params, 'password'));
        $user->save();
        
        $info_user->reset_token = null;
        $info_user->save();
        
        return $user;
    }

    

}
