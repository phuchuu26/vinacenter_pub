<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductAddRequest;
use App\Http\Requests\ProductEditRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Cate;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductOption;
use DateTime,File;

class ProductController extends Controller
{
    public function getProductAdd(){
    	$data = Cate::select('id','name','parent_id')->get()-> toArray();
    	return view('admin.module.products.add',['dataCate' => $data]);
    }
    public function postProductAdd(ProductAddRequest $request){  
        $product_id ="";
    	$product = new Product;    	

    	$product->category_id = $request->sltCate;
        $cate = Cate::findOrFail($request->sltCate); 
        $product->category_alias = $cate['alias'];
    	$product->title = $request->txtName;
        $product->alias = str_slug($request->txtName);
    	$product->description = $request->txtFull;
    	$product->is_hot = $request->rdoHot;
    	$product->is_active = $request->rdoPublic;
    	$product->created_at = new DateTime;
    	$product->user_id = Auth::user()->username;

    	$save_success = $product->save();

    	if($save_success){
    		$product_id = $product->id;
    	}else{
    		return redirect()->route('getProductList')->with(['flash_level' => 'alert-danger','flash_message' => 'Thêm thất bại. Xin thử lại']);
    	}
    	
    	//upload multi image    	
    	
    	if($product_id != ""){
    		$files = $request->file('file');
			foreach($files as $file) {
		        //$rules = array('file' => 'required|mimes:png,gif,jpeg,jpg,bmp');	           
		        $validator = Validator::make(
		        	['file'=>$file],
		        	[
		        		'file' =>'required|mimes:png,gif,jpeg,jpg,bmp'	        		
		        	],
		        	[
		        		'file.required' => 'Mục hình ảnh không được để trống',	        	
		        		'file.mimes' => 'Hình ảnh chỉ thuộc các định dạng sau : png,gif,jpeg,jpg,bmp',
		        	]       	
		        	);
		        if($validator->passes()){
			        $destinationPath = public_path('uploads/products');
			        $filename = time().'.'.$file->getClientOriginalName();
                    //$file->storeAs('uploads\products',$filename,'public');
			        $upload_success = $file->move($destinationPath, $filename);
			        $product_img = new ProductImage;

			        $product_img->product_id = $product_id;
			        $product_img->path =  $filename;
			        $product_img->created_at = new DateTime;
			        $product_img->save(); 

		        }else{
		        	return redirect()->back()->withInput()->withErrors($validator->messages());
		        }          	    
			}
    	}    	
		//end upload multi image		
		return redirect()->route('getProductList')->with(['flash_level' => 'alert-success','flash_message' => 'Thêm thành công']);
    }
    public function getProductList(Request $request){
        $keyword = $request->only('keyword')['keyword'];
        if(isset($keyword) && $keyword != null){
            $product = Product::select('id','title','created_at','user_id','is_hot')
            ->where('title', 'LIKE', '%'.$keyword.'%')
			->where( function($query){
				if(\Auth::user()->role != 1){
					$query->where('user_id', \Auth::user()->username);
				}
			 })
            ->orderBy('id','DESC')->paginate(25);
        }
        else{
            $product = Product::select('id','title','created_at','user_id','is_hot')->orderBy('id','DESC')
			->where( function($query){
				if(\Auth::user()->role != 1){
					$query->where('user_id', \Auth::user()->username);
				}
			 })
			->paginate(25);
        }
    	
        $productoption = ProductOption::select('id' ,'product_id')->get()-> toArray();
    	return view('admin.module.products.list',['product' => $product,'productoption' => $productoption]);
    }
    public function getProductDelete($id){
        
    	$product = Product::findOrFail($id);
        $productImgs = ProductImage::where('product_id',$product->id)->get()-> toArray();
        $productOpt = ProductOption::where('product_id',$product->id)->get()-> toArray();

        foreach ($productImgs as $productImg) {
        	$productDel = ProductImage::findOrFail($productImg['id']);
        	$productDel->delete();
        	if (file_exists(public_path().'/uploads/products/'.$productImg['path'])) {
            	File::delete(public_path().'/uploads/products/'.$productImg['path']);
        	}
        }
        foreach ($productOpt as $item) {
            $proOpt = ProductOption::findOrFail($item['id']);
            $proOpt->delete();            
        }
        $product->delete();
        return redirect()->route('getProductList')->with(['flash_level' => 'alert-danger','flash_message' => 'Xóa sản phẩm thành công']);
    }
    public function getProductEdit($id){
    	$product = Product::findOrFail($id);
    	$productImgs = ProductImage::where('product_id',$product->id)->get()-> toArray();
    	$parent = Cate::select('id','name','parent_id')->get()-> toArray();
    	return view('admin.module.products.edit',['product' => $product,'productImgs' => $productImgs,'parent' => $parent]);
    }
    public function postProductEdit(ProductEditRequest $request,$id){
    	$product_id = "";
    	$product = Product::find($id);
    	$product->category_id = $request->sltCate;
        $cate = Cate::findOrFail($request->sltCate); 
        $product->category_alias = $cate['alias'];
    	$product->title = $request->txtName;
        $product->alias = str_slug($request->txtName);
    	$product->description = $request->txtFull;
    	$product->is_hot = $request->rdoHot;
    	$product->is_active = $request->rdoPublic;
    	$product->updated_at = new DateTime;
    	$product->user_id = Auth::user()->username;
    	$save_success = $product->save();

    	if($save_success){
    		$product_id = $id;
    	}else{
    		return redirect()->route('getProductList')->with(['flash_level' => 'alert-danger','flash_message' => 'Cập nhật thất bại. Xin thử lại']);
    	}
    	
    	//upload multi image    	
    	
    	if($product_id != ""){
    		$files = $request->file('file');
            if(isset($files) && $files != ""){
    			foreach($files as $file) {
    		        //$rules = array('file' => 'required|mimes:png,gif,jpeg,jpg,bmp');	           
    		        $validator = Validator::make(
    		        	['file'=>$file],
    		        	[
    		        		'file' =>'mimes:png,gif,jpeg,jpg,bmp'	        		
    		        	],
    		        	[		        		       	
    		        		'file.mimes' => 'Hình ảnh chỉ thuộc các định dạng sau : png,gif,jpeg,jpg,bmp',
    		        	]       	
    		        	);
    		        if($validator->passes()){
                        $destinationPath = public_path('uploads\products');
    			        $filename = time().'.'.$file->getClientOriginalName();
    			        $upload_success = $file->move($destinationPath, $filename);

    			        $product_img = new ProductImage;

    			        $product_img->product_id = $product_id;
    			        $product_img->path =  $filename;
    			        $product_img->created_at = new DateTime;
    			        $product_img->save(); 

    		        }else{
    		        	return redirect()->back()->withInput()->withErrors($validator->messages());
    		        }          	    
    			}
            }
    	}
    	return redirect()->route('getProductList')->with(['flash_level' => 'alert-success','flash_message' => 'Cập nhật thành công']);
    }

	//page admin role
	public function getProductListApprove(Request $request){
        $keyword = $request->only('keyword')['keyword'];

        if(isset($keyword) && $keyword != null){
            $productoption = ProductOption::select('id','name','created_at','user_id')
            ->where('title', 'LIKE', '%'.$keyword.'%')
            ->where('is_approved', '0')
            ->orderBy('id','DESC')->paginate(25);
        }
        else{
            $productoption = ProductOption::select('id','name','created_at','user_id')
						->where('is_approved', '0')
						->orderBy('id','DESC')->paginate(25);
        }
    	$productName = Product::findOrFail($id);    	
        // $productoption = ProductOption::select('id' ,'product_id')->get()-> toArray();
    	return view('admin.module.productoptions.list_approve',['productOption' => $productOption, 'productName' => $productoption]);
    }


	//page user role
	public function getProductListApproveUser(Request $request){
        $keyword = $request->only('keyword')['keyword'];

        if(isset($keyword) && $keyword != null){
            $productoption = ProductOption::select('*')
						->where('title', 'LIKE', '%'.$keyword.'%')
						->where('user_id', \Auth::user()->username)
						// ->where('is_approved', '0')
						->orderBy('id','DESC')->paginate(25);
        }
        else{
            $productoption = ProductOption::select('*')
			            ->where('user_id', \Auth::user()->username)
						// ->where('is_approved', '0')
						->orderBy('id','DESC')->paginate(25);
        }
    	// $productName = Product::findOrFail($id);    	
        // $productoption = ProductOption::select('id' ,'product_id')->get()-> toArray();
    	return view('admin.module.productoptions.list_approve_user',['productOption' => $productoption]);
    }
}
