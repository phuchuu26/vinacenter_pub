<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\MaintenanceEditRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Maintenance;
use DateTime,File;

class MaintenanceController extends Controller
{
    
    public function getMaintenanceEdit(){
    	$maintenance = Maintenance::findOrFail('1'); 
        //echo $service['content'] ;die;     
        return view('admin.module.maintenance.edit',["maintenance" => $maintenance]);
    }
    public function postMaintenanceEdit(MaintenanceEditRequest $request){    	
    	if(Auth::user()->role==0)
        return redirect()->route('getMaintenanceEdit');
        $maintenance               = Maintenance::findOrFail('1'); 
        $maintenance->content      = $request->txtFull;
		$maintenance->user_id      =	Auth::user()->username;
		$maintenance->updated_at   = 	new DateTime();
    	$maintenance->save();
    	return redirect()->route('getMaintenanceEdit')->with(['flash_level' => 'result_msg','flash_message' => 'Sửa Thành Công']);
    }
}
