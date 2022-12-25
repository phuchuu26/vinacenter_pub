<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ColorAddRequest;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductOption;
use DateTime;

class ColorController extends Controller
{
    

    public function getColorAdd(){
		// $producOption[] = ['id' => '', 'name' => '------ Chọn sản phẩm khuyến mãi ------'];
		// dd($producOption);
    	return view('admin.module.color.add',[ ]);
    }

    public function postColorAdd(Request $request){
    	$name_color = new Color;
    	$name_color->name_color = $request->name_color;
    	$name_color->save();
    	return redirect()->route('getListColor')->with(['flash_level' => 'alert-success','flash_message' => 'Thêm thành công']);
    }
    public function getListColor(){
    	$data = Color::select('*')->paginate(20);
    	return view('admin.module.color.list',['data' => $data]);
    }
    public function getColorDelete($id){
    	if(Auth::user()->role==0)
        return redirect()->route('getListColor');

		$parent = Color::where('id_color', $id)->delete();
		return redirect()->route('getListColor')->with(['flash_level' => 'alert-danger','flash_message' => 'Xóa thành công']);
    }
	
}
