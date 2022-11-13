<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CateAddRequest;
use App\Http\Requests\CateEditRequest;
use App\Models\ChangePW;
use DateTime;

class ChangePWController extends Controller
{
    public function getChange($id){    	
       
    	return view('admin.module.login.changepw');
    }
    public function postChange(Request $request,$id){
        
       $oldpw   = $request->input('password1');
       $newpw   = $request->input('password');
       $renewpw = $request->input('repassword');
       
       //$data = ChangePW::where('password',bcrypt($oldpw))->get()-> toArray();
       //dd(bcrypt($oldpw).'_____'.$oldpw);
       if (Hash::check($request->password1, Auth::user()->password) == false)
       {
        return redirect()->route('admin.changepw',$id)->with(['flash_level' => 'error_msg','flash_message' => 'Mật khẩu cũ không đúng.']);
       }
       if($newpw != $renewpw)
       {
        return redirect()->route('admin.changepw',$id)->with(['flash_level' => 'error_msg','flash_message' => 'Mật khẩu mới không giống nhau.']);
       }


        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('getLogout');
    }
    
}
