<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\IntroEditRequest;
use App\Models\Statics;
use DateTime;

class StaticsController extends Controller
{
    

    public function getStaticsList(){
    	$data = Statics::select('id','code','value')->get()-> toArray();
    	return view('admin.module.statics.list',['data' => $data]);
    }
    public function getStaticsEdit($id){
    	if(Auth::user()->role==0)
        return redirect()->route('getStaticsList');
        $data = Statics::findOrFail($id);       
        return view('admin.module.statics.edit',["data" => $data]);
    }
    public function postStaticsEdit(IntroEditRequest $request,$id){
    	$statics = Statics::findOrFail($id);    	
    	$statics->value = $request->txtFull;       
		$statics->updated_at  = 	new DateTime();
    	$statics->save();
    	return redirect()->route('getStaticsList')->with(['flash_level' => 'result_msg','flash_message' => 'Cập nhật Statics Thành Công']);
    }
}
