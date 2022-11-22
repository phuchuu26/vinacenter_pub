<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductOptionAddRequest;
use App\Http\Requests\ProductOptionEditRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\ProductCollection;
use App\Models\ProductType;
use App\Models\ProductOption;
use App\Models\ProductImage;
use DateTime;

class ProductOptionController extends Controller
{    
    public function getProductOptionAdd($id){
    	try{
    		$data = Product::findOrFail($id)->toArray();
            $productImg = ProductImage::where('product_id',$id)->get()->toArray();
            $productType = ProductType::get()->toArray();
            $productCollection = ProductCollection::get()->toArray();
    		return view('admin.module.productoptions.add',[
                'product'               => $data,
                'productImg'            => $productImg,
                'productType'           => $productType,
                'productCollection'     => $productCollection,
            ]);
    	}catch(ModelNotFoundException $e) {
             return redirect()->back();
        }
    	
    }
    public function postProductOptionAdd(ProductOptionAddRequest $request,$id){
    	try{
	    	$productoption =  new ProductOption;
	    	$productoption->name              = $request->txtName;
            $productoption->alias             = str_slug($request->txtName).'.html';
            $productoption->category_alias    = $request->category_alias;
            $productoption->image             = $request->sltImg;
	    	$productoption->value             = $request->txtValue;
            $productoption->dealer            = $request->txtdealer;
            $productoption->amount            = $request->txtamount;
            $productoption->warranty          = $request->txtwarranty;
            $productoption->sumary            = $request->txtIntro;
	    	$productoption->product_id        = $id;
            $productoption->saleoff           = $request->txtsaleoff;
            $productoption->salestop_salesoff = $request->sltSales;
            $productoption->collection_at     = $request->sltCollect;
	    	$productoption->user_id           = Auth::user()->username;
	    	$productoption->created_at        = new DateTime;            
            $productoption->indextop          = $request->txtindextop;

            $productoption->is_approved = '0';
            if(\Auth::user()->role == 1){
                $productoption->is_approved = '1';
            }

	    	$productoption->save();
	    	try{
	    		$productOption = ProductOption::where('product_id',$id)->orderBy('id','DESC')->paginate(15);
	    		$productName = Product::findOrFail($id);    	
	    		return view('admin.module.productoptions.list',['productOption' => $productOption, 'productName' => $productName])->with(['flash_level' => 'result_msg','flash_message' => 'Thêm thành công']);
	    	}catch(ModelNotFoundException $e) {
	             return redirect()->back();
	        }
    	}catch(ModelNotFoundException $e) {
             return redirect()->back();
        }
    }
    public function getProductOptionList($id){
    	try{
    		$productOption = ProductOption::where('product_id',$id)->orderBy('id','DESC')->paginate(15);
    		$productName = Product::findOrFail($id);    	
    		return view('admin.module.productoptions.list',['productOption' => $productOption, 'productName' => $productName]);
    	}catch(ModelNotFoundException $e) {
             return redirect()->back();
        }
    }
    public function getProductOptionDelete($id){
    	try{
            $productoption = ProductOption::findOrFail($id);
            $product_id = $productoption['product_id'];         
            $productoption->delete();
        }catch(ModelNotFoundException $e) {
             return view('admin.blocks.notfind');
        }
       
        try{
            $productOption = ProductOption::where('product_id',$product_id)->orderBy('id','DESC')->paginate(15);
            $productName = Product::findOrFail($product_id);        
            return view('admin.module.productoptions.list',['productOption' => $productOption, 'productName' => $productName]);
        }catch(ModelNotFoundException $e) {
             return view('admin.blocks.notfind');
        }
               
    }
    public function getProductOptionEdit($id,$pro_id){
        try{
            $productType = ProductType::get()->toArray();
            $productCollection = ProductCollection::get()->toArray();
            $data = ProductOption::findOrFail($id)->toArray();
            $productImg = ProductImage::where('product_id',$pro_id)->get()->toArray();
            return view('admin.module.productoptions.edit',[
                'productoption'     => $data,
                'productImg'        => $productImg,
                'productType'       => $productType,
                'productCollection' => $productCollection,
            ]);
        }catch(ModelNotFoundException $e) {
             return redirect()->back();
        }     
    }
    public function postProductOptionEdit(ProductOptionEditRequest $request,$id){
        $product_id = $request->product_id;
        $productoption = ProductOption::find($id);
        $productoption->name = $request->txtName;
        $productoption->alias = str_slug($request->txtName).'.html';
        $productoption->image = $request->sltImg;
        $productoption->dealer = $request->txtdealer;
        $productoption->value = $request->txtValue;
        $productoption->warranty = $request->txtwarranty;
        $productoption->amount = $request->txtamount;
        $productoption->saleoff = $request->txtsaleoff;
        $productoption->sumary = $request->txtIntro;
        $productoption->salestop_salesoff = $request->sltSales; 
        $productoption->collection_at = $request->sltCollect;          
        $productoption->updated_at = new DateTime();
        $productoption->indextop = $request->txtindextop;

        $productoption->save();

        try{
            $productOption = ProductOption::where('product_id',$product_id)->orderBy('id','DESC')->paginate(15);
            $productName = Product::findOrFail($product_id);        
            return view('admin.module.productoptions.list',[
                'productOption' => $productOption, 
                'productName' => $productName
                ])->with(['flash_level' => 'result_msg','flash_message' => 'Cập nhật thành công']);
        }catch(ModelNotFoundException $e) {
             return view('admin.blocks.notfind');
        }
    }
}
