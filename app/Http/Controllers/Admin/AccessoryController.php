<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AccessoryAddRequest;
use App\Models\Accessory;
use App\Models\Product;
use App\Models\ProductOption;
use DateTime;

class AccessoryController extends Controller
{
    

    public function getAccessoryAdd(){
		// $producOption[] = ['id' => '', 'name' => '------ Chọn sản phẩm khuyến mãi ------'];
		// dd($producOption);
    	return view('admin.module.accessory.add',[ ]);
    }

    public function postAccessoryAdd(Request $request){
    	$name_accessory = new Accessory;
    	$name_accessory->name_accessory = $request->name_accessory;
    	$name_accessory->save();
    	return redirect()->route('getListAccessory')->with(['flash_level' => 'alert-success','flash_message' => 'Thêm thành công']);
    }
    public function getListAccessory(){
    	$data = Accessory::select('*')->paginate(20);
    	return view('admin.module.accessory.list',['data' => $data]);
    }
    public function getAccessoryDelete($id){
    	if(Auth::user()->role==0)
        return redirect()->route('getListAccessory');

		$parent = Accessory::where('id_accessory', $id)->delete();
		return redirect()->route('getListAccessory')->with(['flash_level' => 'alert-danger','flash_message' => 'Xóa thành công']);
    }
	
}
