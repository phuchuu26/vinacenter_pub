<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\UserAddRequest;
use App\Http\Requests\UserEditRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DateTime;

class UserController extends Controller
{
    
    public function getUserAdd(){
    	if(Auth::user()->role==0)
        return redirect()->route('getUserList');
        return view('admin.module.user.add');
    }
    public function postUserAdd(UserAddRequest $request){
    	$user = new User;
    	$user->name = $request->txtUsername;
    	$user->username = $request->txtUser;
    	$user->password = bcrypt($request->txtPass);
        $user->role     = $request->txtRole;
    	$user->created_at = new DateTime();
    	$user->save();
    	return redirect()->route('getUserList')->with(['flash_level' => 'result_msg','flash_message' => 'Thêm thành công']);
    }
    public function getUserList(){
    	$data = User::select('id','name','username','role','created_at')->get()->toArray();
    	return view('admin.module.user.list',['data' => $data]);
    }
    public function getUserDelete($id){
    	if(Auth::user()->role==0)
        return redirect()->route('getUserList');
        $user_curent_login = Auth::user()->id;
    	$user_delete = User::find($id);
    	if($user_curent_login != 1 || $user_delete['id'] == 1){
    		return redirect()->route('getUserList')->with(['flash_level' => 'error_msg','flash_message' => 'Bạn không được phép xóa User này.']);
    	}    	
    	else{
    		$user_delete->delete($id);
    		return redirect()->route('getUserList')->with(['flash_level' => 'result_msg','flash_message' => 'Xóa User thành công']);
    	}    	
    }
    public function getUserEdit($id){
    	if(Auth::user()->role==0)
        return redirect()->route('getUserList');
        $data= User::findOrFail($id)->toArray();
    	return view('admin.module.user.edit',['data' => $data]);
    }
    public function postUserEdit(UserEditRequest $request,$id){
    	$user_curent_login = Auth::user()->id;
    	if($user_curent_login == 1 || $user_curent_login == $id){
    		$user = User::find($id);
    		$user->name = $request->txtUsername;
    		$user->role = $request->txtRole;
            $user->password = bcrypt($request->txtPass);   
    		$user->updated_at = new DateTime();
    		$user->save();
    		return redirect()->route('getUserList')->with(['flash_level' => 'result_msg','flash_message' => 'Cập nhật User thành công']);	
    	}else{
    		return redirect()->route('getUserList')->with(['flash_level' => 'error_msg','flash_message' => 'Bạn không được phép cập nhật User này.']);
    	}   	
    }
}
