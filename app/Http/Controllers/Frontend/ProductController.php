<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\ProductOption;
use App\Models\ProductImage;
use App\Models\Product;
use App\Models\Cate;
use App\Models\Statics;
use App\Models\News;
use App\Models\OrderDetail;
use Validator;


class ProductController extends Controller
{
    public function getProductAll(Request $request){
        $title = "Trang sản phẩm";
        
        $para = $request->only('sortby');      
        $key = "id";
        $value   = "DESC";
        if($para != ""){
            $sort = explode('-',$para['sortby']);     
            foreach ($sort as $k) {
                switch ($k) {
                    case 'price':
                        $key = 'value';
                        break;
                    case 'created':
                        $key = 'created_at';
                        break;
                    case 'desc':
                        $value = 'DESC';
                        break;
                     case 'asc':
                        $value = 'ASC';
                        break;                   
                }       
               
            }           
        }
        $data = ProductOption::select('id','product_id','name','value','image','alias')->orderBy($key,$value)->paginate(16);
        return view('frontend.pages.products.all',['data' => $data,'title' => $title]); 
    }
    public function getProductNew(Request $request){
    	$title = "Sản phẩm mới";
        $para = $request->only('sortby');      
        $key = "id";
        $value   = "DESC";
        if($para != ""){
            $sort = explode('-',$para['sortby']);     
            foreach ($sort as $k) {
                switch ($k) {
                    case 'price':
                        $key = 'value';
                        break;
                    case 'created':
                        $key = 'created_at';
                        break;
                    case 'desc':
                        $value = 'DESC';
                        break;
                     case 'asc':
                        $value = 'ASC';
                        break;                   
                }       
               
            }           
        }
        $data = ProductOption::select('id','product_id','name','value','image','alias')->limit(24)->orderBy($key,$value)->paginate(16);
        return view('frontend.pages.products.all',['data' => $data,'title' => $title]);
    }
    public function getProductTop(Request $request){
        $title = "Sản phẩm nổi bật";
        $para = $request->only('sortby');      
        $key = "id";
        $value   = "DESC";
        if($para != ""){
            $sort = explode('-',$para['sortby']);     
            foreach ($sort as $k) {
                switch ($k) {
                    case 'price':
                        $key = 'value';
                        break;
                    case 'created':
                        $key = 'created_at';
                        break;
                    case 'desc':
                        $value = 'DESC';
                        break;
                     case 'asc':
                        $value = 'ASC';
                        break;                   
                }       
               
            }           
        }
        $data = ProductOption::where('salestop_salesoff',1)->orderBy($key,$value)->paginate(16);
        return view('frontend.pages.products.all',['data' => $data,'title' => $title]);
    }
    public function getProductSales(Request $request){
    	$title = "Sản phẩm khuyến mãi";        
        $para = $request->only('sortby');      
        $key = "id";
        $value   = "DESC";
        if($para != ""){
            $sort = explode('-',$para['sortby']);     
            foreach ($sort as $k) {
                switch ($k) {
                    case 'price':
                        $key = 'value';
                        break;
                    case 'created':
                        $key = 'created_at';
                        break;
                    case 'desc':
                        $value = 'DESC';
                        break;
                     case 'asc':
                        $value = 'ASC';
                        break;                   
                }       
               
            }           
        }
        $data = ProductOption::where('salestop_salesoff',2)->orderBy($key,$value)->paginate(16);
        return view('frontend.pages.products.all',['data' => $data,'title' => $title]);
    }
    public function getProductDetail($alias){
        /*$product = ProductOption::select('*')->get();
        foreach ($product->toArray() as $key => $value) {
            $detail = OrderDetail::where('product_id',$value['id'])->get()->sum('qty');
            
                $data = ProductOption::find($value['id']);
                $data->amount = $detail + 2;
                $data->save();
            
        }*/
        try{
            $data = ProductOption::where('alias',$alias)->first();

            $count_option = ProductOption::select('amount')->where('id',$data['id'])->first();


            $count_order_detail = OrderDetail::where('product_id',$data['id'])->get()->sum('qty');
            
            $total = $count_option['amount'] - $count_order_detail;

            $dataPro = Product::findOrFail($data['product_id'])->toArray();
            $dataCate = Cate::findOrFail($dataPro['category_id'])->toArray();
            
            $product = ProductOption::where('category_alias',$data['category_alias'])->get()-> toArray();
            $productImg = ProductImage::where('product_id',$data['product_id'])->limit(3)->orderBy('id','DESC')->get()->toArray();  
            
            $dataBuy = Statics::where('id',3)->first();
            $dataOrder = Statics::where('id',4)->first();
            

            return view('frontend.pages.products.detail',[
                'data' => $data,
                'total' => $total,
                'dataPro' => $dataPro,
                'dataCate' => $dataCate,                
                'product' => $product,                
                'dataBuy' => $dataBuy,
                'dataOrder' => $dataOrder,
                'productImg' => $productImg,                
                ]);
        }catch(ModelNotFoundException $e) {
             return redirect()->back();
        }
    }
    public function getProductType(Request $request,$alias){
        $title = "Sản phẩm";

        $para = $request->only('sortby');      
        $key = "id";
        $value   = "DESC";
        if($para != ""){
            $sort = explode('-',$para['sortby']);     
            foreach ($sort as $k) {
                switch ($k) {
                    case 'price':
                        $key = 'value';
                        break;
                    case 'created':
                        $key = 'created_at';
                        break;
                    case 'desc':
                        $value = 'DESC';
                        break;
                     case 'asc':
                        $value = 'ASC';
                        break;                   
                }       
               
            }           
        }
        
        $name = Cate::where('alias',$alias)->first();
        $name1 = Cate::where(['id'=>$name['id']])->first();
        $name2 = Cate::where(['id'=>$name1['parent_id']])->first();

        $cate = Cate::where('parent_id',$name['parent_id'])->get()->toArray();
        $len = count($cate)/2;
        $array1 = array_slice($cate, 0, $len);
        $array2 = array_slice($cate, $len, count($cate));
        
        $para1 = $request['p'];

        switch ($para1) {
            case '0-3tr':
                $price = 3000000;              
                $data = ProductOption::where('value','<=', $price)->where('category_alias',$alias)->limit(16)->get();  
                break;
            case '3tr-5tr':
                $min_price = 3000000;
                $max_price = 5000000;               
                $data = ProductOption::whereBetween('value', [$min_price, $max_price])->where('category_alias',$alias)->limit(16)->get();
                break;
            case '5tr-7tr':
                $min_price = 5000000;
                $max_price = 7000000;               
                $data = ProductOption::whereBetween('value', [$min_price, $max_price])->where('category_alias',$alias)->limit(16)->get();
                break;
            case '7tr-10tr':
                $min_price = 7000000;
                $max_price = 10000000;               
                $data = ProductOption::whereBetween('value', [$min_price, $max_price])->where('category_alias',$alias)->limit(16)->get();
                break;
            case '10tr-13tr':
                $min_price = 10000000;
                $max_price = 13000000;               
                $data = ProductOption::whereBetween('value', [$min_price, $max_price])->where('category_alias',$alias)->limit(16)->get();
                break;
            case '13tr-15tr':
                $min_price = 13000000;
                $max_price = 15000000;               
                $data = ProductOption::whereBetween('value', [$min_price, $max_price])->where('category_alias',$alias)->limit(16)->get();
                break;
            case '15tr-20tr':
                $min_price = 15000000;
                $max_price = 20000000;               
                $data = ProductOption::whereBetween('value', [$min_price, $max_price])->where('category_alias',$alias)->limit(16)->get();
                break;
            case 'tren-20tr':
                $price = 20000000;
                $data = ProductOption::where('value','>', $price)->where('category_alias',$alias)->limit(16)->get();
                break;
            case 'tang-dan':                
                $data = ProductOption::where('category_alias',$alias)->orderBy('value','ASC')->limit(16)->get();
                break;
            case 'giam-dan':                
                $data = ProductOption::where('category_alias',$alias)->orderBy('value','DASC')->limit(16)->get();
                break;
            case 'a-z':                
                $data = ProductOption::where('category_alias',$alias)->orderBy('name','ASC')->limit(16)->get();
                break;
            case 'z-a':                
                $data = ProductOption::where('category_alias',$alias)->orderBy('name','DASC')->limit(16)->get();
                break;
            default :
                $data = ProductOption::where('category_alias',$alias)->orderBy($key,$value)->paginate(16);                 
        }    
     

        return view('frontend.pages.products.all',[
            'data' => $data,
            'name' => $name,
            'name1' => $name1,
            'name2' => $name2,
            'cate' => $cate,
            'cate1' => $array1,
            'cate2' => $array2,
            'title' => $title
        ]);
    }

    public function postRating(Request $request)
    {
        $params = $request->all();
        $validator = $this->_ratingRule($params);
        
        if ($validator->fails()) {
            // return \Redirect::back()->withErrors($validator)->withInput(\Input::all());
            return redirect()->back()->withInput()->withErrors($validator->messages());
        }
        // request()->validate(['rate' => 'required']);
        $product_option = ProductOption::find($request->id);

        $rating = new \willvincent\Rateable\Rating;

        $rating->rating = $request->rate;
        $rating->review = $request->review;

        if(empty(\Auth::user())){
            $rating->user_id = null;
        }else{
            $rating->user_id = auth()->user()->id;
        }


        $product_option->ratings()->save($rating);



        return redirect()->back();

    }

    public function _ratingRule($form_data, $product_option = null)
    {
        // dd($form_data);
        $rules = [
            'rate' => 'required',
            'review' => 'required',
        ];
        
        $messages = [
            'rate.required' => 'Vui lòng nhập chọn sao.',
            'review.required' => 'Vui lòng nhập đánh giá.',
        ];


        return Validator::make(
            $form_data,
            $rules,
            $messages
        );
    }

    public function deleteRating(Request $request, $id_rating)
    {
        if (empty( $id_rating)) {
            return redirect()->back()->withInput()->withErrors(['Không tồn tại đánh giá.']);
        }
        if(!\Auth::check() || \Auth::user()->role != 1 ){
            return redirect()->back()->withInput()->withErrors(['Không có quyền xóa đánh giá.']);
        }

        $rating = new \willvincent\Rateable\Rating;
        $rating =  $rating->where('id', $id_rating)->first();
        $rating->delete();

        return redirect()->back()->with(['flash_level' => 'alert-success',
        'flash_message' => 'Xóa bình luận thành công.']) ;

    }
}
