<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\CartAddCompleteRequest;
use App\Http\Controllers\Controller;
use App\Models\ProductOption;
use Cart;
use App\Models\OrderProduct;
use App\Models\Customer;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Models\Statics;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function getBuyProduct($id)
    {
        //Cart::destroy();die;
        //echo Cart::tax();die;
        $product_buy = ProductOption::where('id', $id)->first();
        Cart::add(
            array(
                'id' => $id,
                'name' => $product_buy->name,
                'qty' => 1,
                'test' =>2,
                'price' => $product_buy->value,
                'options' => array(
                    'yprice' => '',
                    'ycoc' => '',
                    'dealer' => $product_buy->dealer,
                    'img' => $product_buy->image,
                    'alias' => $product_buy->alias
                )));
        return redirect()->route('getCartList');
    }

    public function getCartList()
    {
        $content = Cart::content();
        //Cart::remove('1f9c72245d8a36709a96d76a6145a164 ');
        //print_r(compact('content'));die;
        return view('frontend.pages.cart.list', compact('content'));
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
        $data = [];
        $content = Cart::content();
        foreach ($content as $item) {
            $count_option = ProductOption::select('amount','value')->where('id', $item->id)->first();
            $count_order_detail = OrderDetail::where('product_id', $item->id)->get()->sum('qty');

            $total = $count_option['amount'] - $count_order_detail;
            $amount = $total > 0 ? $total : 0;

            $item->amount = $amount;
            $item->summary = $item->qty * $count_option['value'];

            array_push($data, $item);
        }
        $total = Cart::total();
        $user = User::select('id', 'name', 'username')->orderBy('id', 'ASC')->get()->toArray();
        return view('frontend.pages.cart.order', [
            'content' => $data,
            'total' => $total,
            'user' => $user
        ]);
    }

    public function postCartOrderComplete(Request $request)
    {
        $flag = $request->input('btn_update');
        if ($flag == null) {
            $validator = Validator::make($request->all(),
                array(
                    'txtName' => 'required',
                    'txtAddress' => 'required',
                    'txtPhone' => 'required|regex:/[0-9]{10}/|digits:10',
                    'txtUser' => 'required',
                ),
                [
                    'txtName.required' => 'Vui lòng nhập Họ tên!',
                    'txtAddress.required' => 'Vui lòng nhập địa chỉ!',
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
            $order->total = Cart::total();
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
                    $cart->dealer = $item->options->dealer;
                    $cart->price = $item->price;
                    $cart->qty = $item->qty;
                    $cart->order_id = $order_id;
                    $cart->real_price = $item->options->yprice != ""  ? $item->options->yprice : 0;
                    $cart->deposit = $item->options->ycoc > 0 ? $item->options->ycoc : 0;
                    $cart->product_id = $item->id;
                    $cart->created_at = new DateTime();
                    $cart->save();
                    
                    $price = $item->options->yprice != "" ? $item->options->yprice : $item->price;
                    
                    $total = $total + ($item->qty * $price);
                    
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

    public function getBuyNow($id)
    {
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
                    'alias' => $product_buy->alias)));
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

    public function getTotalCart(Request $request)
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
        // dd($total );
        // $id = $request->only('txtId')['txtId'];

        // $item = Cart::get($id);
        // dd($item );
        // $summary = $item->qty * (!empty(data_get($options, 'yprice')) ? data_get($options, 'yprice') : $item->price);
        return response()->json(['success' => true, 'summary' => $total]);
        // return response()->json(['success' => true, 'rowId' => $id, 'qty' => $item->qty, 'summary' => number_format($summary) .'đ']);
    }

}
