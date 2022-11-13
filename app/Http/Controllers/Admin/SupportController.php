<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SupportEditRequest;
use App\Models\Support;
use DateTime;

class SupportController extends Controller
{
    

    public function getSupportList(){
    	$data = Support::select('id','name','value','type_name')->get()-> toArray();
    	return view('admin.module.support.list',['data' => $data]);
    }
    public function getSupportEdit($id){
    	if(Auth::user()->role==0)
        return redirect()->route('getSupportList');
        $data = Support::findOrFail($id);       
        return view('admin.module.support.edit',["data" => $data]);
    }
    public function postSupportEdit(SupportEditRequest $request,$id){
    	$support = Support::findOrFail($id);
    	$support->name = $request->txtName;  	
    	$support->value = $request->txtContent;       
		$support->updated_at  = 	new DateTime();
    	$support->save();
    	return redirect()->route('getSupportList')->with(['flash_level' => 'result_msg','flash_message' => 'Cập nhật Statics Thành Công']);
    }
}
