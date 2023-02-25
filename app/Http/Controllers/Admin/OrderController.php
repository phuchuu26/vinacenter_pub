<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Accessory;
use App\Models\AccessoryDetail;
use App\Models\Color;
use App\Models\ColorDetail;
use App\Models\Customer;
use App\Models\District;
use App\Models\OrderDetail;
use App\Models\OrderProduct;
use App\Models\ProductOption;
use App\Models\Province;
use App\Models\ServiceCustomer;
use App\Models\User;
use App\Models\Ward;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Dompdf\Dompdf;


class OrderController extends Controller
{
    protected $keyword;

    public function getOrderList()
    {

        $users = DB::table('vnc_users')
            ->select('vnc_users.*')
            ->get();

        $data = '';
        $total = 0;
        if (Auth::user()->role != 1) {
            $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : null;
            $from = isset($_GET['from']) ? $_GET['from'] : null;
            $to = isset($_GET['to']) ? $_GET['to'] : null;
            if ($keyword != null) {
                $data = DB::table('order_product')
                    ->select('order_product.*', 'customer.fullname', 'customer.phone', 'customer.email', 'customer.address')
                    ->join('customer', 'customer.id', '=', 'order_product.customer_id')
                    ->where('user_id', Auth::user()->username)
                    ->where('is_draft', 0)
                    ->where(function ($queryChild) use ($keyword) {
                        $queryChild->where('customer.phone', 'LIKE', '%' . $_GET['keyword'] . '%');
                        $queryChild->orWhere('customer.email', 'LIKE', '%' . $_GET['keyword'] . '%');
                        $queryChild->orWhere('order_product.user_id', 'LIKE', '%' . $_GET['keyword'] . '%');
                    })
                    ->orderBy('order_product.created_at', 'DESC')
                    ->paginate(20);
                $data->appends(['keyword' => $keyword]);
            } elseif ($from != null && $to != null) {
                $data = DB::table('order_product')
                    ->select('order_product.*', 'customer.fullname', 'customer.phone', 'customer.email', 'customer.address')
                    ->join('customer', 'customer.id', '=', 'order_product.customer_id')
                    ->where('order_product.user_id', Auth::user()->username)
                    ->where('is_draft', 0)
                    ->where(function ($queryChild) use ($from, $to) {
                        $queryChild->whereBetween('order_product.created_at', [$from . " 00:00:00", $to . " 23:59:59"]);
                    })
                    ->orderBy('order_product.created_at', 'DESC')
                    ->paginate(20);
                $data->appends(['from' => $from, 'to' => $to]);
            } else {
                $data = DB::table('order_product')
                    ->select('order_product.*', 'customer.fullname', 'customer.phone', 'customer.email', 'customer.address')
                    ->join('customer', 'customer.id', '=', 'order_product.customer_id')
                    ->where('is_draft', 0)
                    ->where('user_id', Auth::user()->username)
                    ->orderBy('order_product.created_at', 'DESC')
                    ->paginate(20);
            }
        } else {
            $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : null;
            $from = isset($_GET['from']) ? $_GET['from'] : null;
            $to = isset($_GET['to']) ? $_GET['to'] : null;
            $username = isset($_GET['username']) ? $_GET['username'] : null;
            if ($keyword != null) {
                $data = DB::table('order_product')
                    ->select('order_product.*', 'customer.fullname', 'customer.phone', 'customer.email', 'customer.address')
                    ->join('customer', 'customer.id', '=', 'order_product.customer_id')
                    ->where(function ($queryChild) use ($keyword) {
                        $queryChild->where('customer.phone', 'LIKE', '%' . $keyword . '%');
                        $queryChild->orWhere('customer.email', 'LIKE', '%' . $keyword . '%');
                        $queryChild->orWhere('order_product.user_id', 'LIKE', '%' . $keyword . '%');
                    })
                    ->where('is_draft', 0)
                    ->orderBy('order_product.created_at', 'DESC')
                    ->paginate(20);
                $data->appends(['keyword' => $keyword]);

            } elseif ($from != null && $to != null && $username != null) {
                $data = DB::table('order_product')
                    ->select('order_product.*', 'customer.fullname', 'customer.phone', 'customer.email', 'customer.address')
                    ->join('customer', 'customer.id', '=', 'order_product.customer_id')
                    ->where('order_product.user_id', $username)
                    ->where('is_draft', 0)
                    ->where(function ($queryChild) use ($from, $to) {
                        $queryChild->whereBetween('order_product.created_at', [$from . " 00:00:00", $to . " 23:59:59"]);
                    })
                    ->orderBy('order_product.created_at', 'DESC')
                    ->paginate(20);
                $data->appends(['from' => $from, 'to' => $to, 'username' => $username]);

                $data1 = DB::table('order_product')
                    ->select('order_product.*', 'customer.fullname', 'customer.phone', 'customer.email', 'customer.address')
                    ->join('customer', 'customer.id', '=', 'order_product.customer_id')
                    ->where('order_product.user_id', $username)
                    ->where('is_draft', 0)
                    ->where(function ($queryChild) use ($from, $to) {
                        $queryChild->whereBetween('order_product.created_at', [$from . " 00:00:00", $to . " 23:59:59"]);
                    })
                    ->orderBy('order_product.created_at', 'DESC')
                    ->get();
                foreach ($data1 as $key => $item) {

                    $detail = $this->getArrayOrderById($item->id);
                    foreach ($detail as $dt) {
                        $price = 0;
                        $fee = 0;
                        if ($dt->real_price > 0) {
                            $price = $dt->real_price;
                        } else {
                            $price = $dt->price;
                        }
                        if ($item->express_human == 2) {
                            $fee = $item->fee;
                        } else {
                            $fee = 0;
                        }

                        // $total = ($total + $dt->qty * ($price - $dt->dealer)) - $fee;
                        $total = $total + $dt->qty * ($price - $dt->dealer ) + $dt->discount - $fee;
                    }
                    // dd( $total,123);
                }
            } else {
                $data = DB::table('order_product')
                    ->select('order_product.*', 'customer.fullname', 'customer.phone', 'customer.email', 'customer.address')
                    ->join('customer', 'customer.id', '=', 'order_product.customer_id')
                    ->where('is_draft', 0)
                    ->orderBy('order_product.created_at', 'DESC')
                    ->paginate(20);
            }
        }

        $result = [];
        $arrLv1['detail'] = [];
        foreach ($data as $key => $item) {
            $prices = 0;
            $bon = 0;
            $arrLv1 = (array)$item;

            $detail = $this->getArrayOrderById($arrLv1['id']);
            $depo = $this->getCountDeposit($arrLv1['id'])->toArray();

            $item->details = $detail->toArray();
            $item->depo = $depo[0]->depo;

            foreach ($detail as $de) {
                if ($de->real_price > 0) {
                    $price_ = $de->real_price;
                } else {
                    $price_ = $de->price;
                }
                $bon = $bon + $de->qty * ($price_ - $de->dealer) + $de->discount;
                $prices = $prices + ($price_ * $de->qty);
            }
            $item->total = $prices;
            $item->bon = $bon;

        }
        return view('admin.module.orders.list', ['data' => $data, 'users' => $users->toArray(), 'total' => $total]);
    }

    public function getArrayOrderById($id)
    {
        return DB::table('order_detail')
            ->select('order_detail.*', 'product_option.warranty', 'order_detail.voucher_code',  'order_detail.discount', 'voucher.code', 'voucher.amount_discount')
            ->join('product_option', 'product_option.id', '=', 'order_detail.product_id')
            ->leftJoin('voucher', 'voucher.id_voucher', '=', 'order_detail.voucher_code')
            ->where('order_detail.order_id', $id)
            ->get();
    }

    public function getCountDeposit($id)
    {
        return DB::table('order_detail')
            ->select(DB::raw('SUM(deposit) as depo'))
            ->where('order_detail.order_id', $id)
            ->get();
    }

    public function getOrderDelete($id)
    {
        if (Auth::user()->role == 0)
            return redirect()->route('getOrderList');
        try {
            $customer = OrderProduct::findOrFail($id);
            $detail = OrderDetail::where('order_id', $id)->get()->toArray();
            foreach ($detail as $item) {
                $det = OrderDetail::findOrFail($item['id']);
                $det->delete();
            }
            $customer->delete();
            return redirect()->route('getOrderList')->with(['flash_level' => 'result_msg', 'flash_message' => 'Đã xóa đơn hàng !']);
        } catch (ModelNotFoundException $e) {
            return redirect()->back();
        }
    }

    public function getOrderDetail($id)
    {
        $prices = 0;
        $bon = 0;
        try {
            $user = User::select('id', 'name', 'username')->get()->toArray();

            $detail = DB::table('order_detail')
                ->select('order_detail.*','product_option.warranty', 'voucher.code')
                ->join('product_option', 'product_option.id', '=', 'order_detail.product_id')
                ->leftJoin('voucher', 'voucher.id_voucher', '=', 'order_detail.voucher_code')
                ->where('order_detail.order_id', $id)  
                ->orderBy('id', 'DESC')
                ->get();

            $customer = DB::table('order_product')
                ->select('order_product.*', 'customer.fullname', 'customer.phone', 'customer.email', 'customer.address')
                ->join('customer', 'customer.id', '=', 'order_product.customer_id')
                ->where('order_product.id', $id)
                ->first();

            $depo = $this->getCountDeposit($customer->id)->toArray();

            foreach ($detail as $de) {
                $count_maintaince = ServiceCustomer::where('order_detail_id', $de->id)->where('method', '=',2)->count();
                $de->count_maintaince = $count_maintaince;
                if ($de->real_price > 0) {
                    $price_ = $de->real_price;
                } else {
                    $price_ = $de->price;
                }
                // $bon = $bon + $de->qty * ($price_ - $de->dealer + $de->bonus);
                $bon = $bon + $de->qty * ($price_ - $de->dealer ) + $de->discount;
                // {{number_format($detail->qty*($price_ - $detail->dealer ) + $detail->discount )}}

                $prices = $prices + ($price_ * $de->qty);

                if(!empty(data_get($de, 'id_color'))){
                    $colors = ColorDetail::where('id_color_detail' , data_get($de, 'id_color'))->first();
                    $de->colorDetail = $colors; 
                    $colors = $colors->color;
                    $de->colors = $colors ; 
                    
                  
                }


                if(!empty(data_get($de, 'id_accessory'))){
                    $accessories = AccessoryDetail::where('id_accessory_detail' , data_get($de, 'id_accessory'))->first();
                    $de->accessoryDetail = $accessories; 
                    $accessories = $accessories->accessory;
                    $de->accessories = $accessories; 
                }
            }
            $customer->bon = $bon;
            $customer->prices = $prices;
            $customer->depo = $depo[0]->depo;
            

            return view('admin.module.orders.detail', [
                'customer' => $customer,
                'data' => $detail->toArray(),
                'user' => $user,
                'order_id' => $id,
                'colors' => $colors ?? '',
                'accessories' => $accessories ?? ''
            ]);
        } catch (ModelNotFoundException $e) {
            return redirect()->back();
        }
    }

    public function postOrderDetail($id)
    {
        try {
            $customer = OrderProduct::findOrFail($id);
            $customer->user_id = $_POST['txtUser'];
            $customer->updated_at = new DateTime();
            $customer->save();


            $user = User::select('id', 'username')->get()->toArray();
            $customer = DB::table('order_product')
                ->select('order_product.*', 'customer.fullname', 'customer.phone', 'customer.email', 'customer.address')
                ->join('customer', 'customer.id', '=', 'order_product.customer_id')
                ->where('order_product.id', $id)
                ->first();
            $detail = OrderDetail::where('order_id', $id)->orderBy('id', 'DESC')->paginate(20);
            return view('admin.module.orders.detail', [
                'customer' => $customer,
                'detail' => $detail,
                'user' => $user
            ]);
        } catch (ModelNotFoundException $e) {
            return redirect()->back();
        }
    }

    public function getOrderComplete(Request $request, $id)
    {
        if (Auth::user()->role == 0)
            return redirect()->route('getOrderList');
        $customer = OrderProduct::findOrFail($id);

        $customer->status = 1;
        $customer->updated_at = new DateTime();

        $customer->save();

        return redirect()->route('getOrderDetail', $id)->with(['flash_level' => 'result_msg', 'flash_message' => 'Cập nhật đơn hàng thành công !']);
    }

    public function getOrderUpdate(Request $request, $id)
    {
        if (Auth::user()->role == 0)
            return redirect()->route('getOrderList');
        $product = OrderProduct::findOrFail($id);

        $product->pay_type = $request->input('pay_type')  ?? '';
        $product->fee = $request->input('fee');
        $product->express_human = $request->input('express_human');
        $product->note_by = trim($request->input('note_by'));
        $product->lading_code = trim($request->input('lading_code'));
        $product->shipping_unit = trim($request->input('shipping_unit')) ?? '';
        $product->updated_at = new DateTime();

        $product->save();

        return redirect()->route('getOrderDetail', $id)->with(['flash_level' => 'result_msg', 'flash_message' => 'Cập nhật đơn hàng thành công !']);
    }

    public function viewOrder($id)
    {
        $product = "";
        $product = OrderDetail::select('product_name', 'price')->where('order_id', $id)->get()->toArray();
        return response()->json($product);
    }

    public function postUpdateOrderDetail(Request $request, $id)
    {
        $detail = OrderDetail::findOrFail($id);
        $detail->real_price = $request->input('real_price');
        $detail->bonus = $request->input('bonus');
        $detail->deposit = $request->input('deposit');
        $detail->save();
        return redirect()->route('getOrderDetail', $request->input('order_id'))->with(['flash_level' => 'result_msg', 'flash_message' => 'Cập nhật đơn hàng thành công !']);
    }

    public function UpdateUser(Request $request, $id)
    {

        try {
            $customer = OrderProduct::findOrFail($id);
            $customer->user_id = $request->input('txtUser');
            $customer->updated_at = new DateTime();
            $customer->save();
            return redirect()->route('getOrderDetail', $id)
                ->with(['flash_level' => 'result_msg', 'flash_message' => 'Cập nhật đơn hàng thành công !']);


        } catch (ModelNotFoundException $e) {
            return redirect()->back();
        }
    }

    public function getBonusOrder(Request $request)
    {
        $role = auth()->user()->role;
        $data = [];

        $total_bonus = 0;
        $total_fee = 0;

        $username = '';

        $users = DB::table('vnc_users')
            ->select('vnc_users.*')
            ->get();

        $from = $request->only('from')['from'];
        $to = $request->only('to')['to'];

        if ($role > 0) {
            $username = $request->only('username')['username'];
        } else {
            $username = auth()->user()->username;
        }


        $data = DB::table('order_product')
            ->select('order_product.*', 'customer.fullname', 'customer.phone', 'customer.email', 'customer.address')
            ->join('customer', 'customer.id', '=', 'order_product.customer_id')
            ->orderBy('order_product.created_at', 'DESC')
            ->where(function ($queryChild) use ($from, $to) {
                $queryChild->whereBetween('order_product.created_at', [$from . " 00:00:00", $to . " 23:59:59"]);
            })
            ->where('order_product.user_id', $username)
            ->where('order_product.bonus_flag', 0)
            ->get();

        foreach ($data as $key => $item) {
            $prices = 0;
            $bon = 0;
            $id = (array)$item;

            $detail = DB::table('order_detail')
                ->select('order_detail.*','product_option.warranty')
                ->join('product_option', 'product_option.id', '=', 'order_detail.product_id')
                ->where('order_detail.order_id', $id)
                ->orderBy('id', 'DESC')
                ->get();


            $item->details = $detail->toArray();


            foreach ($detail as $de) {
                if ($de->real_price > 0) {
                    $price_ = $de->real_price;
                } else {
                    $price_ = $de->price;
                }
                $bon = $bon + $de->qty * ($price_ - $de->dealer ) + $de->discount;
                // $bon = $bon + $de->qty * ($price_ - $de->dealer);
                $prices = $prices + ($price_ * $de->qty);
            }
            $item->totals = $prices;
            $item->bonus = $bon;

            $total_bonus = $total_bonus + $bon;

            if($item->express_human  == 2){
                $total_fee = $total_fee + $item->fee;
            }

        }


        return view('admin.module.orders.bonus')
            ->with('users', $users->toArray())
            ->with('data1', $data)
            ->with('total_bonus', $total_bonus)
            ->with('total_fee', $total_fee);
    }

    public function postUpdateBonus(Request $request)
    {
        $from = $request->only('from')['from'];
        $to = $request->only('to')['to'];
        $username = $request->only('username')['username'];
        $data = DB::table('order_product')
            ->select('order_product.*', 'customer.fullname', 'customer.phone', 'customer.email', 'customer.address')
            ->join('customer', 'customer.id', '=', 'order_product.customer_id')
            ->where('order_product.user_id', $username)
            ->where('order_product.bonus_flag', 0)
            ->where(function ($queryChild) use ($from, $to) {
                $queryChild->whereBetween('order_product.created_at', [$from . " 00:00:00", $to . " 23:59:59"]);
            })
            ->orderBy('order_product.created_at', 'DESC')
            ->get();
        foreach ($data as $key => $item) {
            $data = OrderProduct::findOrFail($item->id);
            $data->bonus_flag = 1;
            $data->updated_at = new DateTime();
            $data->save();
        }
        return redirect()->route('getBonusOrder');

    }

    public function update_dealer()
    {
        $data = DB::table('order_detail')
            ->whereNull('dealer', NULL)
            ->get();

        foreach ($data as $item) {
            $product = DB::table('product_option')
                ->select('product_option.*')
                ->where('product_option.id', $item->product_id)
                ->first();
            if ($product != null) {
                $dealer = isset($product->dealer) ? $product->dealer : $product->value;

                $order = OrderDetail::findOrFail($item->id);

                $order->dealer = $dealer;
                $order->save();
            }


        }
    }

    public function createOrder(Request $request)
    {
        $id_order = $request->id_order;
        $order = [];

        if(!empty($id_order)){
            $order = OrderProduct::where('id', $id_order)->first();
        }else{
            $order = OrderProduct::where('is_draft', 1)->first();
        }

        $customer = $order->customer ?? [];

        // $params = $request->all();

        // $keyword = '%'.$params['keyword'].'%';
		// $data = ProductOption::where('name', 'LIKE', $keyword)->orderBy('id','DESC')->paginate(16);
        $provinces = Province::all('id_province', 'str_province');
        $user = User::select('id', 'name', 'username')->orderBy('id', 'ASC')->get()->toArray();
        try {
            // return view('admin.module.orders.create_order', [
            return view('admin.module.orders.create_detail', [
                'data' => $data ?? [],
                'user' => $user ?? [],
                'provinces' => $provinces ?? [],
                'order' => $order ?? [],
                'customer' => $customer ?? [],
                // 'data' => $detail->toArray(),
                // 'user' => $user,
                // 'order_id' => $id
            ]);
        } catch (ModelNotFoundException $e) {
            return redirect()->back();
        }
    }

    public function cancelOrderDraft(Request $request)
    {
        $id_order = $request->id_order;
        if(!empty($id_order)){
            $order = OrderProduct::where('id', $id_order)->first();
            $customer = $order->customer ;
            $orderDetail = $order->orderDetail;
            // dd($order, $orderDetail, !empty($orderDetail)  );
            if(!empty($orderDetail) && count($orderDetail) > 0){
                foreach($orderDetail as $de){
                    $de->delete();
                }
            }
            $order->delete();
            $customer->delete();
        }else{
            return Redirect::back()->with(['flash_level' => 'error_msg','flash_message' => 'Có lỗi xảy ra.']);
        }

        $provinces = Province::all('id_province', 'str_province');
        $user = User::select('id', 'name', 'username')->orderBy('id', 'ASC')->get()->toArray();
        try {
            // return view('admin.module.orders.create_order', [
            return view('admin.module.orders.create_detail', [
                'data' => $data ?? [],
                'user' => $user ?? [],
                'provinces' => $provinces ?? [],
                // 'data' => $detail->toArray(),
                // 'user' => $user,
                // 'order_id' => $id
            ]);
        } catch (ModelNotFoundException $e) {
            return redirect()->back();
        }
    }
    
    public function deleteOrderDetail(Request $request)
    {
        $id_order_detail = $request->id_order_detail;
        if(!empty($id_order_detail)){
            $order_detail = OrderDetail::where('id', $id_order_detail)->first();
            $order_detail->delete();

            return Redirect::back()->with(['flash_level' => 'result_msg','flash_message' => 'Xóa sản phẩm khỏi đơn hàng thành công.']);
        }else{
            return Redirect::back()->with(['flash_level' => 'error_msg','flash_message' => 'Có lỗi xảy ra.']);
        }
    }

    public function postCreateOrder(Request $request)
    {
        
        // dd($params);

        $id_province = $request->province;
        $id_district = $request->district;
        $id_ward = $request->ward;
        $str_address = $request->str_address;

        $province = Province::where('id_province', $id_province)->first();
        $district = District::where('id_district', $id_district)->first();
        $ward = Ward::where('id_ward', $id_ward)->first();

        if(empty($request['txtAddress'])){
            $request['txtAddress'] = $str_address   . ', '.  data_get($ward, 'str_ward')   . ', '. data_get($district, 'str_district') . 
            ', '. data_get($province, 'str_province');
        }else{
            $str_address = 1;
            $ward = 1;
        }
        // dd($request->all(), Cart::total());
        // $flag = $request->input('btn_update');
            
            $rules = array(
                'txtName' => 'required',
                // 'txtAddress' => 'required',
                'txtPhone' => 'required|regex:/[0-9]{10}/|digits:10',
                'txtUser' => 'required',
            );

            if(empty($ward) || empty($str_address) ){
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

            // if(empty( (int) Cart::total()  )){
            //     return Redirect::back()->with(['flash_level' => 'error_msg','flash_message' => 'Đơn hàng rỗng.']);
            // }
            $params = $request->all();
         

            if(!empty($params['id_order'])){
                $order = OrderProduct::where('id', $params['id_order'])->first();
                $customer = $order->customer;
            }else{
                $order = new OrderProduct;
                $customer = new Customer;
            }

            $view_ = "";
            $atm = "";
            $data = "";
            $detail = "";
            $total = 0;


            $customer->fullname = $request->txtName;
            $customer->address = $request->txtAddress;
            $customer->phone = $request->txtPhone;
            $customer->email = $request->txtEmail;
       

            $result = $customer->save();
            $order->customer_id = $customer->id;
            $order->is_draft = 1;
           

         

            

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
            
            $total = $this->getTotalAmountDetailOrder($order->id);
            $order->total = $total;
            $order->created_at = new DateTime();
            $order->status = 0;

            $order->save();
            
            // dd($params, $customer, $order,  $order->orderDetail, count( $order->orderDetail));
            $save_success = $order->save();
            if($params['add_product'] == 1){
                $producOption = ProductOption::select('id', 'name')->orderBy('name', 'ASC')->get()->toArray();
                return view('admin.module.orders.add_product', ['producOption' => $producOption, 'order' => $order]);
            }

            if(  count( $order->orderDetail) == 0){
                return Redirect::back()->with(['flash_level' => 'error_msg','flash_message' => 'Đơn hàng rỗng.']);
            }

            $order->is_draft = 0;
            $order->save();

            return redirect()->route('getOrderList')->with(['flash_level' => 'error_msg', 'flash_message' => 'Hoàn tất đơn hàng thành công.']);


            // if ($save_success) {
            //     $order_id = $order->id;
            //     //save detail
            //     $detail = Cart::content();
            //     foreach ($detail as $item) {
            //         $price = 0;
            //         $cart = new OrderDetail;
            //         $cart->product_name = $item->name;
            //         if(data_get($item->options, 'is_apply_voucher') == true){
            //             // $product_option = ProductOption::where('id', $item->id)->first();
            //             // $voucher = $product_option->voucher;
            //             // $voucher_code = data_get($voucher, 'code');
            //             $voucher = Voucher::where('id_voucher', data_get($item->options, 'id_voucher'))->first();
            //             $cart->voucher_code = data_get($item->options, 'id_voucher');
            //             $cart->discount =data_get($voucher, 'amount_discount') * $item->qty;
            //         }else{
            //             $cart->voucher_code = null;
            //         }

            //         $cart->dealer = $item->options->dealer;
            //         $cart->price = $item->price;
            //         $cart->qty = $item->qty;
            //         $cart->order_id = $order_id;
            //         $cart->real_price = $item->options->yprice != ""  ? $item->options->yprice : 0;
            //         $cart->deposit = $item->options->ycoc > 0 ? $item->options->ycoc : 0;
            //         $cart->product_id = $item->id;
            //         $cart->created_at = new DateTime();
            //         $cart->save();
            //         $price = $item->options->yprice != "" ? $item->options->yprice : $item->price;
                    
            //         // $total =$total 
                    
            //     }
            //     if ($pay == 0) {
            //         $id = 4;
            //         $data = Statics::findOrFail($id)->toArray();
            //         $view_ = 'frontend.pages.cart.successatm';
            //     } else {
            //         $view_ = 'frontend.pages.cart.success';
            //     }

            // } else {
            //     return redirect()->route('getProductList')->with(['flash_level' => 'error_msg', 'flash_message' => 'Hoàn tất đơn hàng thất bại. Xin thử lại']);
            // }



            // return view($view_, [
            //     'atm' => $d_atm['atm'],
            //     'data' => $data,
            //     'total' => $total,
            //     'detail' => $detail,
            // ]);
        // else{
        //     $qty = $request->only($flag)[$flag];
        //     Cart::update($flag, $qty);
        //     return redirect()->route('getCartOrderComplete')->withInput();
        // }
    }

    public function getTotalAmountDetailOrder($id_order){
        if(empty($id_order)){
            return 0;
        }
        $total =0;
        $order = OrderProduct::where('id', $id_order)->first();
        $order_details = $order->orderDetail;
        foreach($order_details as $de){
            $p = !empty($de->real_price) ? $de->real_price : $de->price;
            $total += ($p * $de->qty);
        }
        return $total;
    }

    public function addProductOrder(Request $request){
        $params = $request->all();
        $id_order = $request->id_order ?? '';

        if(empty($id_order)){
            return Redirect::back()->with(['flash_level' => 'error_msg','flash_message' => 'Có lỗi xảy ra.']);
        }

        if(empty($id_order)){
            return Redirect::back()->with(['flash_level' => 'error_msg','flash_message' => 'Có lỗi xảy ra.']);
        }

        
        if(empty($params['qty']) || empty($params['id_product_option']) || empty($params['real_price']) ){
            return Redirect::back()->with(['flash_level' => 'error_msg','flash_message' => 'Nhập thiếu thông tin.']);
        }

        $order = OrderProduct::where('id', $id_order)->first();
        $product_option = ProductOption::where('id', $params['id_product_option'])->first();
        // dd(  $order, $params, $product_option);

        $order_id = $order->id;
    
        $cart = new OrderDetail;
        $cart->product_name = $product_option->name;
        $cart->dealer = $product_option->dealer;
        $cart->price = $product_option->value;
        $cart->qty = $product_option->qty;
        $cart->order_id = $order_id;
        $cart->real_price = data_get($params, 'real_price');
        $cart->qty = data_get($params, 'qty');
        // $cart->deposit = $item->options->ycoc > 0 ? $item->options->ycoc : 0;
        $cart->product_id = $product_option->id;
        $cart->created_at = new DateTime();
        $cart->save();
                
           


        return Redirect::back()->with(['flash_level' => 'result_msg','flash_message' => 'Thêm sản phẩm vào đơn hàng thành công']);
    }

    public function exportPdf(Request $request)
    {
        $order_id = $request->order_id;
        $order = OrderProduct::where('id', $order_id)->first();
        $prices = 0;
        $bon = 0;
        $user = User::select('id', 'name', 'username')->get()->toArray();

        $detail = DB::table('order_detail')
            ->select('order_detail.*','product_option.warranty', 'voucher.code')
            ->join('product_option', 'product_option.id', '=', 'order_detail.product_id')
            ->leftJoin('voucher', 'voucher.id_voucher', '=', 'order_detail.voucher_code')
            ->where('order_detail.order_id', $order_id)  
            ->orderBy('id', 'DESC')
            ->get();

        $customer = DB::table('order_product')
            ->select('order_product.*', 'customer.fullname', 'customer.phone', 'customer.email', 'customer.address')
            ->join('customer', 'customer.id', '=', 'order_product.customer_id')
            ->where('order_product.id', $order_id)
            ->first();

        $depo = $this->getCountDeposit($customer->id)->toArray();

        foreach ($detail as $de) {
            if ($de->real_price > 0) {
                $price_ = $de->real_price;
            } else {
                $price_ = $de->price;
            }
            // $bon = $bon + $de->qty * ($price_ - $de->dealer + $de->bonus);
            $bon = $bon + $de->qty * ($price_ - $de->dealer ) + $de->discount;
            // {{number_format($detail->qty*($price_ - $detail->dealer ) + $detail->discount )}}

            $prices = $prices + ($price_ * $de->qty);
        }
   
        $customer->bon = $bon;
        $customer->prices = $prices;
        $customer->depo = $depo[0]->depo;
        $data = $detail->toArray();
        $current_time = 'Ngày '. date("d",time()).' Tháng ' .date("m",time()). ' Năm ' . date("Y",time());
        // $user = \Auth::user();
        // return view('admin.mail.reset_password',compact('user'));
        // return view('admin.module.orders.pdf',  compact('customer', 'data', 'user', 'order_id', 'current_time'));
        
        // cach1
        // $pdf = \PDF::loadView('admin.module.orders.pdf',  compact('customer', 'data', 'user', 'order_id'));
        // return $pdf->download('invoice.pdf');
        
        
        // $PDFOptions = ['enable_remote' => true, 'chroot' => public_path('uploads\banner\1517199905.Vinacenter.png')];
        $pdf = \PDF::loadView('admin.module.orders.pdf',  compact('customer', 'data', 'user', 'order_id', 'current_time', 'prices'));
        // $pdf = \PDF::loadView('admin.module.orders.pdf',  compact('customer', 'data', 'user', 'order_id'));
        // $pdf->getDomPDF()->setHttpContext(
        //     stream_context_create([
        //         'ssl' => [
        //             'allow_self_signed'=> TRUE,
        //             'verify_peer' => FALSE,
        //             'verify_peer_name' => FALSE,
        //         ]
        //     ])
        // );
        $fileName = 'Phieu_don_hang_' . date('dmY', time()) . '.pdf';
        return $pdf->download($fileName);
    }


}
