<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CateAddRequest;
use App\Http\Requests\CateEditRequest;
use App\Models\Cate;
use App\Models\Product;
use App\Models\ProductOption;
use DateTime;

class CateController extends Controller
{
    

    public function getCateAdd(){
        $data = Cate::select('id','name','parent_id')->get()-> toArray();
    	return view('admin.module.category.add',['dataCate' => $data]);
    }

    public function postCateAdd(CateAddRequest $request){
    	$cate = new Cate;
    	$cate->parent_id = $request->sltCate;
    	$cate->name = $request->txtCateName;
        $cate->alias = str_slug($request->txtCateName, '-');
    	$cate->is_active = $request->rdoPublic;    	
    	$cate->created_at = new DateTime();
    	$cate->save();
    	return redirect()->route('getCateList')->with(['flash_level' => 'alert-success','flash_message' => 'Thêm thành công']);
    }
    public function getCateList(){
    	$data = Cate::select('id','name','parent_id')->get()-> toArray();
    	return view('admin.module.category.list',['data' => $data]);
    }
    public function getCateDelete($id){
    	if(Auth::user()->role==0)
        return redirect()->route('getCateList');
        $parent = Cate::where('parent_id',$id)->count();
        $product = Product::where('category_id',$id)->count();       

    	if($parent == 0 ||  $product > 0){
    		$cate = Cate::find($id);
    		$cate->delete($id);
    		return redirect()->route('getCateList')->with(['flash_level' => 'alert-danger','flash_message' => 'Xóa thành công']);
    	}else{
    		echo '<script type="text/javascript">
				alert("Xin lỗi ! Bạn không được xóa danh mục này.");
				window.location = "';
				echo route('getCateList');
    		echo '"</script>';
    	}
    }
    public function getCateEdit($id){
    	if(Auth::user()->role==0)
        return redirect()->route('getCateList');
        $data = Cate::findOrFail($id)->toArray();
    	$parent = Cate::select('id','name','parent_id')->get()-> toArray();
    	return view('admin.module.category.edit',['data' =>$data,'parent' => $parent]);
    }
    public function postCateEdit(CateEditRequest $request){
    	$cate = Cate::find($request->cate_id);
    	$cate->parent_id = $request->sltCate;
    	$cate->name = $request->txtCateName;
        $cate->alias = str_slug($request->txtCateName, '-');
    	$cate->is_active = $request->rdoPublic;    	
    	$cate->updated_at = new DateTime();
    	$cate->save();
    	return redirect()->route('getCateList')->with(['flash_level' => 'alert-success','flash_message' => 'Cập nhật thành công']);
    }
}
