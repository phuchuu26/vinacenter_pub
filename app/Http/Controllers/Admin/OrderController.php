<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\OrderProduct;
use App\Models\ProductOption;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
                    ->orderBy('order_product.created_at', 'DESC')
                    ->paginate(20);
                $data->appends(['keyword' => $keyword]);

            } elseif ($from != null && $to != null && $username != null) {
                $data = DB::table('order_product')
                    ->select('order_product.*', 'customer.fullname', 'customer.phone', 'customer.email', 'customer.address')
                    ->join('customer', 'customer.id', '=', 'order_product.customer_id')
                    ->where('order_product.user_id', $username)
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

                        $total = ($total + $dt->qty * ($price - $dt->dealer)) - $fee;
                    }
                }
            } else {
                $data = DB::table('order_product')
                    ->select('order_product.*', 'customer.fullname', 'customer.phone', 'customer.email', 'customer.address')
                    ->join('customer', 'customer.id', '=', 'order_product.customer_id')
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
                $bon = $bon + $de->qty * ($price_ - $de->dealer);
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
            ->select('order_detail.*', 'product_option.warranty')
            ->join('product_option', 'product_option.id', '=', 'order_detail.product_id')
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
                ->select('order_detail.*','product_option.warranty')
                ->join('product_option', 'product_option.id', '=', 'order_detail.product_id')
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
                if ($de->real_price > 0) {
                    $price_ = $de->real_price;
                } else {
                    $price_ = $de->price;
                }
                $bon = $bon + $de->qty * ($price_ - $de->dealer);
                $prices = $prices + ($price_ * $de->qty);
            }
            $customer->bon = $bon;
            $customer->prices = $prices;
            $customer->depo = $depo[0]->depo;

            return view('admin.module.orders.detail', [
                'customer' => $customer,
                'data' => $detail->toArray(),
                'user' => $user,
                'order_id' => $id
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

        $product->pay_type = $request->input('pay_type');
        $product->fee = $request->input('fee');
        $product->express_human = $request->input('express_human');
        $product->note_by = trim($request->input('note_by'));
        $product->lading_code = trim($request->input('lading_code'));
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
                $bon = $bon + $de->qty * ($price_ - $de->dealer);
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
}
