<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductOptionAddRequest;
use App\Http\Requests\ProductOptionEditRequest;
use App\Models\Accessory;
use App\Models\AccessoryDetail;
use App\Models\Color;
use App\Models\ColorDetail;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\ProductCollection;
use App\Models\ProductType;
use App\Models\ProductOption;
use App\Models\ProductImage;
use App\Models\Voucher;
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
        // dd($id, $request->all());
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
            $productoption->collection_at     = $request->sltCollect ?? null;
	    	$productoption->user_id           = Auth::user()->username;
	    	$productoption->created_at        = new DateTime;            
            $productoption->indextop          = $request->txtindextop;

            $productoption->is_approved = '0';
            if(\Auth::user()->role == 1){
                $productoption->is_approved = '1';
            }

	    	$productoption->save();

            if( !empty($request->code) ){
                $voucher =  new Voucher();
                $voucher->code = $request->code;
                $voucher->amount_discount = $request->amount_discount;
                $voucher->id_product_option = $productoption->id;
                $voucher->save();
            }

        
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
            $color_details =  ColorDetail::where('id_product_option', $id)->get();
            $accessory_details =  AccessoryDetail::where('id_product_option', $id)->get();
            $voucher = ProductOption::findOrFail($id)->voucher;
            $productImg = ProductImage::where('product_id',$pro_id)->get()->toArray();
            return view('admin.module.productoptions.edit',[
                'productoption'     => $data,
                'productImg'        => $productImg,
                'productType'       => $productType,
                'productCollection' => $productCollection,
                'voucher' => $voucher,
                'color_details' => $color_details,
                'accessory_details' => $accessory_details,
                'id_product' => $pro_id,
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
        $productoption->collection_at = $request->sltCollect ?? null;          
        $productoption->updated_at = new DateTime();
        $productoption->indextop = $request->txtindextop;

        $productoption->save();
        
        $voucher = Voucher::where('id_product_option', $id)->first();
        if( !empty($request->code) ){
            if(empty($voucher)){
                $voucher =  new Voucher();
            }
            $voucher->code = $request->code;
            $voucher->amount_discount = $request->amount_discount;
            $voucher->id_product_option = $productoption->id;
            // dd($voucher);
            $voucher->save();
        }else{
            if(!empty($voucher)){
                $voucher->delete();
            }
        }

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
    public function searchProductOption(Request $request)
    {
        $term = $request->term;
        $keyword = data_get($term, 'term');
        $keyword = '%'.$keyword.'%';
		$data = ProductOption::where('name', 'LIKE', $keyword)->limit(20)->orderBy('id','DESC')->select('name', 'value', 'id', 'amount')->get()->toArray();
        foreach ($data as &$value){
            $value['name'] = $value['name'] . ' | Giá bán : ' . number_format($value['value']) .' đ | Số lượng : ' . (int)$value['amount'];
            unset($value['value']);
            unset($value['amount']);
        } 
        try {
            return response()->json($data, 200);
        } catch (ModelNotFoundException $e) {
            return redirect()->back();
        }
    }

     public function getPriceProductOption(Request $request, $id_product_option)
    {
        // $id_product_option = $request->id_product_option;
        $price = ProductOption::where('id', $id_product_option)->select( 'value')->first();

        //  dd(    $price['value']);
        try {
            return response()->json($price['value'], 200);
        } catch (ModelNotFoundException $e) {
            return redirect()->back();
        }
    }

    public function getAddColorDetail($id_product_option){
        try{
            $productoption = ProductOption::where('id', $id_product_option)->first();
            // dd(  $productoption );
            $product = $productoption->product;
            $color = Color::select('name_color', 'id_color')->get()->toArray();
            // dd($productoption);
            return view('admin.module.productoptions.add_color',[
                'productoption'     => $productoption,
                'product'     => $product,
                'color'     => $color,
            ]);
        }catch(ModelNotFoundException $e) {
             return redirect()->back();
        }     
    }
 
    public function postAddColorDetail(Request $request,$id_product_option){
		
        $productOption = ProductOption::where('id', $id_product_option)->first();
        $product = $productOption->product;
        // dd($productOption, $product);

		if(empty($id_product_option)){
			return redirect()->back();
		}

        $is_exist = ColorDetail::where('id_color', $request->id_color)
        ->where('id_product_option', $request->id_product_option)
        ->first();
        if(!empty( $is_exist)){
            return redirect()->back()->with('message_error', 'Option màu đã tồn tại.');;
        }

        $ColorDetail = new ColorDetail();
    	$ColorDetail->id_color =  $request->id_color;
    	$ColorDetail->id_product_option = $id_product_option;
    	$ColorDetail->value =  $request->value;
        $ColorDetail->save();

		return redirect()->route('getProductOptionEdit', ['id' => $productOption->id, 'pro_id' => $product->id])->with(['flash_level' => 'alert-success','flash_message' => 'Thêm thành công']);
    }
   
    public function getEditColorDetail($id_product_option, $id_color_detail){
        try{
            $productoption = ProductOption::where('id', $id_product_option)->first();
            $product = $productoption->product;
            $colorDetail = ColorDetail::where('id_color_detail', $id_color_detail)->first();


            $color = Color::select('name_color', 'id_color')->get()->toArray();
            // dd($productoption, $color, $colorDetail);

            return view('admin.module.productoptions.edit_color',[
                'productoption'     => $productoption,
                'color'     => $color,
                'product'     => $product,
                'colorDetail'     => $colorDetail,
            ]);
        }catch(ModelNotFoundException $e) {
             return redirect()->back();
        }     
    }

    public function postEditColorDetail(Request $request, $id_product_option, $id_color_detail){
        try{
            $productOption = ProductOption::where('id', $id_product_option)->first();
            $product = $productOption->product;

            $colorDetail = ColorDetail::where('id_color_detail', $id_color_detail)->first();
            
            // $colorDetail->value = $$request->id_color;
            $colorDetail->value = $request->value;
            $colorDetail->save();

            return redirect()->route('getProductOptionEdit', ['id' => $productOption->id, 'pro_id' => $product->id])
            ->with(['flash_level' => 'alert-success','flash_message' => 'Cập nhật thành công']);

        }catch(ModelNotFoundException $e) {
             return redirect()->back();
        }     
    }

    public function getDeleteColorDetail($id_product_option, $id_color_detail){
    	try{
            $ProductOption = ProductOption::where('id', $id_product_option)->first();
            $product = $ProductOption->product;
            
            $ColorDetail = ColorDetail::where('id_color_detail', $id_color_detail)->first();
                // dd( $product);
            $ColorDetail->delete();
            return redirect()->route('getProductOptionEdit', ['id' => $ProductOption->id, 'pro_id' => $product->id])->with(['flash_level' => 'alert-success','flash_message' => 'Xóa option màu sắc thành công']);

        }catch(ModelNotFoundException $e) {
            return redirect()->route('getProductOptionEdit', ['id' => $ProductOption->id, 'pro_id' => $product->id])->with(['flash_level' => 'alert-success','flash_message' => 'Xóa option màu sắc thất bại']);
        }
    }




    // phu kien

    public function getAddAccessoryDetail($id_product_option){
        try{
            $productoption = ProductOption::where('id', $id_product_option)->first();
            // dd(  $productoption );
            $product = $productoption->product;

            $accessory = Accessory::select('name_accessory', 'id_accessory')->get()->toArray();
            return view('admin.module.productoptions.add_accessory',[
                'productoption'     => $productoption,
                'product'     => $product,
                'color'     => $accessory,
            ]);
        }catch(ModelNotFoundException $e) {
             return redirect()->back();
        }     
    }
 
    public function postAddAccessoryDetail(Request $request,$id_product_option){
        $productOption = ProductOption::where('id', $id_product_option)->first();
        $product = $productOption->product;
        // dd($productOption, $product);

		if(empty($id_product_option)){
			return redirect()->back();
		}

        $is_exist = AccessoryDetail::where('id_accessory', $request->id_accessory)
        ->where('id_product_option', $request->id_product_option)
        ->first();
        if(!empty( $is_exist)){
            return redirect()->back()->with('message_error', 'Option màu đã tồn tại.');;
        }

        $ColorDetail = new AccessoryDetail();
    	$ColorDetail->id_accessory =  $request->id_accessory;
    	$ColorDetail->id_product_option = $id_product_option;
    	$ColorDetail->value =  $request->value;
        $ColorDetail->save();

		return redirect()->route('getProductOptionEdit', ['id' => $productOption->id, 'pro_id' => $product->id])->with(['flash_level' => 'alert-success','flash_message' => 'Thêm thành công']);
    }
   
    public function getEditAccessoryDetail($id_product_option, $id_accessory_detail){
        try{
            $productoption = ProductOption::where('id', $id_product_option)->first();
            $product = $productoption->product;
            $accessoryDetail = AccessoryDetail::where('id_accessory_detail', $id_accessory_detail)->first();


            $accessory = Accessory::select('name_accessory', 'id_accessory')->get()->toArray();
            // dd($productoption, $color, $colorDetail);

            return view('admin.module.productoptions.edit_accessory',[
                'productoption'     => $productoption,
                'accessory'     => $accessory,
                'product'     => $product,
                'accessoryDetail'     => $accessoryDetail,
            ]);
        }catch(ModelNotFoundException $e) {
             return redirect()->back();
        }     
    }

    public function postEditAccessoryDetail(Request $request, $id_product_option, $id_accessory_detail){
        try{
            $productOption = ProductOption::where('id', $id_product_option)->first();
            $product = $productOption->product;

            $accessoryDetail = AccessoryDetail::where('id_accessory_detail', $id_accessory_detail)->first();
            
            // $colorDetail->value = $$request->id_color;
            $accessoryDetail->value = $request->value;
            $accessoryDetail->save();

            return redirect()->route('getProductOptionEdit', ['id' => $productOption->id, 'pro_id' => $product->id])
            ->with(['flash_level' => 'alert-success','flash_message' => 'Cập nhật thành công']);

        }catch(ModelNotFoundException $e) {
             return redirect()->back();
        }     
    }

    public function getDeleteAccessoryDetail($id_product_option, $id_accessory_detail){
    	try{
            $ProductOption = ProductOption::where('id', $id_product_option)->first();
            $product = $ProductOption->product;
            
            $AccessoryDetail = AccessoryDetail::where('id_accessory_detail', $id_accessory_detail)->first();
                // dd( $product);
            $AccessoryDetail->delete();
            return redirect()->route('getProductOptionEdit', ['id' => $ProductOption->id, 'pro_id' => $product->id])->with(['flash_level' => 'alert-success','flash_message' => 'Xóa option màu sắc thành công']);

        }catch(ModelNotFoundException $e) {
            return redirect()->route('getProductOptionEdit', ['id' => $ProductOption->id, 'pro_id' => $product->id])->with(['flash_level' => 'alert-success','flash_message' => 'Xóa option màu sắc thất bại']);
        }
    }
}
