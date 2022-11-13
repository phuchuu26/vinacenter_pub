<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
}
