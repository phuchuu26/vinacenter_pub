<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\CartAddCompleteRequest;
use App\Http\Controllers\Controller;
use App\Models\Accessory;
use App\Models\AccessoryDetail;
use App\Models\Color;
use App\Models\ColorDetail;
use App\Models\ProductOption;
use Cart;
use App\Models\OrderProduct;
use App\Models\Customer;
use App\Models\District;
use App\Models\OrderDetail;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Models\Statics;
use App\Models\User;
use App\Models\Voucher;
use App\Models\Ward;
use DateTime;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function getBuyProduct(Request $request, $id)
    {
        // dd($request->all());
        //Cart::destroy();die;
        //echo Cart::tax();die;
        $params = $request->all();
       


        $product_buy = ProductOption::where('id', $id)->first();
        $price = $product_buy->value;


        if(data_get($params, 'id_color')){
            $colorDetail = ColorDetail::where('id_color_detail', data_get($params, 'id_color'))->first();
            $price += (int) data_get($colorDetail, 'value');
        }

        if(data_get($params, 'id_accessory')){
            $AccessoryDetail = AccessoryDetail::where('id_accessory_detail', data_get($params, 'id_accessory'))->first();
            $price += (int) data_get($AccessoryDetail, 'value');
        }

        Cart::add(
            array(
                'id' => $id,
                'name' => $product_buy->name,
                'qty' => 1,
                'test' =>2,
                'price' => $price,
                'options' => array(
                    'yprice' => '',
                    'ycoc' => '',
                    'dealer' => $product_buy->dealer,
                    'img' => $product_buy->image,
                    'alias' => $product_buy->alias, 
                    'id_color' => $params['id_color'] ?? '',
                    'id_accessory' => $params['id_accessory'] ?? ''
                )));
        return redirect()->route('getCartList');
    }

    public function getCartList()
    {
        $content = Cart::content();
        // dd($content);
        $colors = Color::all()->pluck('name_color', 'id_color')->toArray();
        $accessories = Accessory::all()->pluck('name_accessory', 'id_accessory')->toArray();

        //Cart::remove('1f9c72245d8a36709a96d76a6145a164 ');
        //print_r(compact('content'));die;
        return view('frontend.pages.cart.list', compact('content', 'colors', 'accessories'));
    }

    public function getCartDel($id)
    {
        Cart::remove($id);
        return redirect()->route('getCartList');
    }

    public function getCartUpdate(Request $request)
    {
        $id = $request->id;
        $qty = $request->qty;
        Cart::update($id, $qty);
        return response()->json($id);
    }


    public function postCartUpdate(Request $request)
    {
        $id = $request->only('txtId')['txtId'];
        $qty = $request->only('txtQty')['txtQty'];
        $yprice = $request->only('yprice')['yprice'];
        $ycoc = $request->only('ycoc')['ycoc'];

        $item = Cart::get($id);
        $option = $item->options->merge(['yprice'=>$yprice,'ycoc'=>$ycoc]);

        Cart::update($id, ['qty'=>$qty,'options'=>$option]);
        return redirect()->route('getCartOrderComplete')->withInput();
    }

    public function getCartDel1($id)
    {
        Cart::remove($id);
        $content = Cart::content();
        if ($content->toArray() == null) {
            return redirect()->route('getCartList');
        }
        return redirect()->route('getCartOrderComplete')->withInput();
    }

    public function getCartOrderComplete()
    {
        $provinces = Province::all('id_province', 'str_province');

        $data = [];
        $content = Cart::content();
        foreach ($content as $item) {
            // dd($item);

            $count_option = ProductOption::select('amount','value')->where('id', $item->id)->first();
            
            $count_order_detail = OrderDetail::where('product_id', $item->id)->get()->sum('qty');
            $total = $count_option['amount'] - $count_order_detail;
            $amount = $total > 0 ? $total : 0;

            $item->amount = $amount;
            $item->summary = $item->qty *  data_get($item, 'price');
            // $item->summary = $item->qty * $count_option['value'];

            array_push($data, $item);
            $id_color_detail =  $item->options['id_color'] ?? '';
            $id_accessory_color =  $item->options['id_accessory'] ?? '';

            if(!empty($id_color_detail)){
                $color_detail = ColorDetail::where('id_color_detail' , $id_color_detail)->first();
                $color = $color_detail->color->name_color;
            }

            if(!empty($id_accessory_color)){
                $accessory_color = AccessoryDetail::where('id_accessory_detail' , $id_accessory_color)->first();
                $accessory = $accessory_color->accessory->name_accessory;
            }
          

        }
        $total = Cart::total();
        $user = User::select('id', 'name', 'username')->orderBy('id', 'ASC')->get()->toArray();
        // $colors = Color::all()->pluck('name_color', 'id_color')->toArray();
        // $accessories = Accessory::all()->pluck('name_accessory', 'id_accessory')->toArray();

        $user_admin = User::select('id', 'name', 'username')->where('role', 1)->orderBy('id', 'ASC')->first();

        return view('frontend.pages.cart.order', [
            'content' => $data,
            'total' => $total,
            'user_admin' => $user_admin,
            'user' => $user,
            'provinces' => $provinces,
            'color' => $color ?? '',
            'accessory' => $accessory ?? ''
        ]);
    }

    public function postCartOrderComplete(Request $request)
    {
        $id_province = $request->province;
        $id_district = $request->district;
        $id_ward = $request->ward;
        $str_address = $request->str_address;

        $province = Province::where('id_province', $id_province)->first();
        $district = District::where('id_district', $id_district)->first();
        $ward = Ward::where('id_ward', $id_ward)->first();

        $request['txtAddress'] = $str_address   . ', '.  data_get($ward, 'str_ward')   . ', '. data_get($district, 'str_district') . 
        ', '. data_get($province, 'str_province');
        // dd($request->all(), Cart::total());
        $flag = $request->input('btn_update');
        if ($flag == null) {
            
            $rules = array(
                'txtName' => 'required',
                // 'txtAddress' => 'required',
                'txtPhone' => 'required|regex:/[0-9]{10}/|digits:10',
                'txtUser' => 'required',
            );

            if(empty($ward) || empty($str_address)){
                $rules['txtAddress_complete'] = 'required';
            }

            $validator = Validator::make($request->all(),
                $rules,
                [
                    'txtName.required' => 'Vui lòng nhập Họ tên!',
                    'txtAddress_complete.required' => 'Vui lòng nhập địa chỉ!',
                    'txtPhone.required' => 'Vui lòng Nhập số điện thoại!',
                    'txtUser.required' => 'Vui lòng chọn người bán!',
                    'txtPhone.regex' => 'Số điện thoại không hợp lệ!',
                    'txtPhone.digits' => 'Số điện thoại không hợp lệ!'
                ]
            );


            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator)
                    ->withInput();
            }

            if(empty( (int) Cart::total()  )){
                return Redirect::back()->with(['flash_level' => 'error_msg','flash_message' => 'Đơn hàng rỗng.']);
            }

            $view_ = "";
            $atm = "";
            $data = "";
            $detail = "";
            $total = 0;

            $order = new OrderProduct;

            $validCustomer = Customer::where('phone', $request->txtPhone)->first();


            $customer = new Customer;
            $customer->fullname = $request->txtName;
            $customer->address = $request->txtAddress;
            $customer->phone = $request->txtPhone;
            $customer->email = $request->txtEmail;
            $result = $customer->save();
            $order->customer_id = $customer->id;

            //save customer
            
            $pay = $request->rdopay;
            $order->note = $request->txtNote;
            $order->sendby = $request->optradio;
            $order->user_id = $request->txtUser;
            $order->deposit = isset($request->deposit) ? str_replace(',', '', $request->deposit) : 0;

           
            $order->payment = $pay;
            

            $atm = rand(6, 1000000);
            $d_atm['atm'] = $atm;

            $order->express_human = $request->express_human;
            $order->payment_id = $atm;
            // $order->total = Cart::total();
            $total = $this->getTotalCart()->getData();
            $total =  data_get($total, 'success') == true ? data_get($total, 'summary') : Cart::total();
            $order->total = $total;

            $order->created_at = new DateTime();
            $order->status = 0;

            $save_success = $order->save();

            if ($save_success) {
                $order_id = $order->id;
                //save detail
                $detail = Cart::content();
                foreach ($detail as $item) {
                    $price = 0;
                    $cart = new OrderDetail;
                    $cart->product_name = $item->name;
                    if(data_get($item->options, 'is_apply_voucher') == true){
                        // $product_option = ProductOption::where('id', $item->id)->first();
                        // $voucher = $product_option->voucher;
                        // $voucher_code = data_get($voucher, 'code');
                        $voucher = Voucher::where('id_voucher', data_get($item->options, 'id_voucher'))->first();
                        $cart->voucher_code = data_get($item->options, 'id_voucher');
                        $cart->discount =data_get($voucher, 'amount_discount') * $item->qty;
                    }else{
                        $cart->voucher_code = null;
                    }

                    $cart->dealer = $item->options->dealer;
                    $cart->price = $item->price;
                    $cart->qty = $item->qty;
                    $cart->order_id = $order_id;
                    $cart->real_price = $item->options->yprice != ""  ? $item->options->yprice : 0;
                    $cart->deposit = $item->options->ycoc > 0 ? $item->options->ycoc : 0;
                    $cart->product_id = $item->id;
                    $cart->id_color = $item->options->id_color ?? '';
                    $cart->id_accessory = $item->options->id_accessory ?? '';
                    $cart->created_at = new DateTime();
                    $cart->save();
                    $price = $item->options->yprice != "" ? $item->options->yprice : $item->price;
                    
                    // $total =$total 
                    
                }
                if ($pay == 0) {
                    $id = 4;
                    $data = Statics::findOrFail($id)->toArray();
                    $view_ = 'frontend.pages.cart.successatm';
                } else {
                    $view_ = 'frontend.pages.cart.success';
                }

            } else {
                return redirect()->route('getProductList')->with(['flash_level' => 'error_msg', 'flash_message' => 'Hoàn tất đơn hàng thất bại. Xin thử lại']);
            }


            Cart::destroy();

            return view($view_, [
                'atm' => $d_atm['atm'],
                'data' => $data,
                'total' => $total,
                'detail' => $detail,
            ]);
        }
        else{
            $qty = $request->only($flag)[$flag];
            Cart::update($flag, $qty);
            return redirect()->route('getCartOrderComplete')->withInput();
        }
    }

    public function getBuyNow(Request $request, $id)
    {
        $params = $request->all();

        $count_option = ProductOption::select('amount')->where('id', $id)->first();
        $count_order_detail = OrderDetail::where('product_id', $id)->get()->sum('qty');

        $total = $count_option['amount'] - $count_order_detail;
        if ($total > 0) {
            $product_buy = ProductOption::where('id', $id)->first();
            Cart::add(array(
                'id' => $id,
                'name' => $product_buy->name,
                'qty' => 1,
                'price' => $product_buy->value,
                'options' => array(
                    'yprice' => '',
                    'ycoc' => '',
                    'dealer' => $product_buy->dealer,
                    'img' => $product_buy->image,
                    'alias' => $product_buy->alias,
                    'id_color' => $params['id_color'] ?? '',
                    'id_accessory' => $params['id_accessory'] ?? ''
                    )
                ));
            return redirect()->route('getCartOrderComplete');
        }
        return redirect()->route('index')->with(['flash_level' => 'error_msg', 'flash_message' => 'Sản phẩm đã hết hàng. Xin vui lòng chọn sản phẩm khác.']);
    }

    public function getUpdatePrice(Request $request)
    {
        $id = $request->only('txtId')['txtId'];
        //$qty = $request->only('txtQty')['txtQty'];

        $yprice = (float)str_replace(',', '', $request->only('yprice')['yprice']);

        $ycoc = 0;

        $item = Cart::get($id);
        $option = $item->options->merge(['yprice'=>$yprice,'ycoc'=>$ycoc]);

        // dump($item);
        Cart::update($id, ['options'=>$option]);
        $item = Cart::get($id);
        $summary = $yprice * $item->qty; 
        // dd($item);
        return response()->json(['success' => true, 'rowId' => $id, 'summary' => $summary]);
    }

    public function getUpdateQty(Request $request)
    {
        $id = $request->only('txtId')['txtId'];
        $qty = $request->only('txtQty')['txtQty'];

        $item = Cart::get($id);
        Cart::update($id, ['qty'=>$qty]);
        $item = Cart::get($id);
        $options = data_get($item, 'options'); 

        $summary = $item->qty * (!empty(data_get($options, 'yprice')) ? data_get($options, 'yprice') : $item->price);
        return response()->json(['success' => true, 'rowId' => $id, 'qty' => $item->qty, 'summary' => $summary]);
        // return response()->json(['success' => true, 'rowId' => $id, 'qty' => $item->qty, 'summary' => number_format($summary) .'đ']);
    }

    public function getTotalCart(Request $request = null)
    {
        $total = Cart::total();
        $content = Cart::content();
        $total = 0;
        foreach( $content as $key => $value ){
            $options = data_get($value, 'options');
            $yprice = data_get($options, 'yprice');
            if(empty(  $yprice)){
                $yprice = data_get($value, 'price');
            }

            $amout = $yprice * (int) data_get($value, 'qty');
            $total =  $total + $amout;
        }
        // dd($content );
        // $id = $request->only('txtId')['txtId'];

        // $item = Cart::get($id);
        // dd($item );
        // $summary = $item->qty * (!empty(data_get($options, 'yprice')) ? data_get($options, 'yprice') : $item->price);
        return response()->json(['success' => true, 'summary' => $total]);
        // return response()->json(['success' => true, 'rowId' => $id, 'qty' => $item->qty, 'summary' => number_format($summary) .'đ']);
    }

    
    public function getCartUpdateVoucher(Request $request)
    {
        $id = $request->id;
        $voucher = $request->voucher;
        $voucher = Voucher::where('code', $voucher )->first();
        if(empty($voucher)){
            return response()->json(['success' => false, 'description' => 'Mã voucher không tồn tại', 'rowId' => $id ]);
        }
        // dd($check_voucher);
        $item = Cart::get($id);
        $is_apply_voucher = data_get($item->options, 'is_apply_voucher');
        // dd( $item);
        if($is_apply_voucher == true){
            //  $option = $item->options->merge(['id_voucher' => data_get($voucher, 'id_voucher'), 'yprice' => $price_after_apply_voucher]);

            // $current_price = data_get($item->options, 'yprice') != '' ? data_get($item->options, 'yprice') : data_get($item, 'price');
            // $price_after_apply_voucher = $current_price - ($voucher->amount_discount);
            $summary = data_get($item->options, 'yprice')  * data_get($item, 'qty');
            return response()->json(['success' => true, 'description' => "Đã áp dụng mã voucher giảm ". number_format($voucher->amount_discount) .' VND', 'rowId' => $id, 'summary' => $summary]);
        }
        // dd($item );
        // dd( data_get($item, 'summary') - $voucher->amount_discount * data_get($item, 'qty'));

        $current_price = data_get($item->options, 'yprice') != '' ? data_get($item->options, 'yprice') : data_get($item, 'price');
 
        $price_after_apply_voucher = $current_price - ($voucher->amount_discount);
        $summary = $price_after_apply_voucher  * data_get($item, 'qty');
        $option = $item->options->merge(['is_apply_voucher' => true, 'id_voucher' => data_get($voucher, 'id_voucher'), 'yprice' => $price_after_apply_voucher]);
// dd( $option );
        Cart::update($id, ['options'=>$option, 'summary'=>$summary]);

        
        return response()->json(['success' => true, 'description' => "Đã áp dụng mã voucher giảm ". number_format($voucher->amount_discount) .' VND', 'rowId' => $id, 'summary' => $summary]);
    }

}
