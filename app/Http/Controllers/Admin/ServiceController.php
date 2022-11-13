<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ServiceEditRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use DateTime,File;

class ServiceController extends Controller
{
    

    public function getServiceEdit(){
    	$service = Service::findOrFail('1'); 
        //echo $service['content'] ;die;     
        return view('admin.module.service.edit',["service" => $service]);
    }
    public function postServiceEdit(ServiceEditRequest $request){    	
    	if(Auth::user()->role==0)
        return redirect()->route('getServiceEdit');
        $service = Service::findOrFail('1'); 
        $service->content = $request->txtFull;
		$service->user_id    =	Auth::user()->username;
		$service->updated_at  = 	new DateTime();
    	$service->save();
    	return redirect()->route('getServiceEdit')->with(['flash_level' => 'result_msg','flash_message' => 'Sửa Thành Công']);
    }
}
