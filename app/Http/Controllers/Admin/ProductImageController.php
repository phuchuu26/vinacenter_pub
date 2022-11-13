<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Requests\ProductImageRequest;
use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use App\Models\Product;
use File;

class ProductImageController extends Controller
{
    public function getProductImagetList($id){    	  		
    	try{
    		$productImgs = ProductImage::where('product_id',$id)->orderBy('id','DESC')->paginate(15);
    		$productName = Product::findOrFail($id);    	
    		return view('admin.module.productimages.list',['product' => $productImgs, 'productName' => $productName]);
    	}catch(ModelNotFoundException $e) {
             return redirect()->back();
        }    	
    }
    public function getProductImageDelete($id){
    	$product = ProductImage::findOrFail($id); 
        if (file_exists(public_path().'/uploads/products/'.$product->path)) {
            File::delete(public_path().'/uploads/products/'.$product->path);
        }
        $product->delete();
        return redirect()->back()->with(['flash_level' => 'result_msg','flash_message' => 'Xóa hình ảnh sản phẩm thành công']);       
    }   
}
