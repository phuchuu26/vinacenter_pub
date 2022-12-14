<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\VoucherAddRequest;
use App\Http\Requests\VoucherEditRequest;
use App\Models\Voucher;
use App\Models\Product;
use App\Models\ProductOption;
use DateTime;

class VoucherController extends Controller
{
    

    public function getVoucherAdd(){
        $producOption = ProductOption::select('id', 'name')->orderBy('name', 'ASC')->get()->toArray();
		// $producOption[] = ['id' => '', 'name' => '------ Chọn sản phẩm khuyến mãi ------'];
		// dd($producOption);
    	return view('admin.module.voucher.add',['producOption' => $producOption]);
    }

    public function postVoucherAdd(VoucherAddRequest $request){
    	$cate = new Voucher;
    	$cate->code = $request->code;
    	$cate->amount_discount = $request->amount_discount;
    	$cate->id_product_option = $request->id_product_option;
    	$cate->created_by = \Auth::user()->id;
    	$cate->save();
    	return redirect()->route('getListVoucher')->with(['flash_level' => 'alert-success','flash_message' => 'Thêm thành công']);
    }
    public function getListVoucher(){
    	$data = Voucher::select('*')->paginate(20);
    	return view('admin.module.voucher.list',['data' => $data]);
    }
    public function getVoucherDelete($id){
    	if(Auth::user()->role==0)
        return redirect()->route('getListVoucher');

		$parent = Voucher::where('id_voucher', $id)->delete();
		return redirect()->route('getListVoucher')->with(['flash_level' => 'alert-danger','flash_message' => 'Xóa thành công']);
    }
    public function getVoucherEdit($id_voucher){
    	if(Auth::user()->role==0)
        return redirect()->route('getListVoucher');
        $data = Voucher::find($id_voucher)->first();
		$producOption = ProductOption::select('id', 'name')->orderBy('name', 'ASC')->get()->toArray();
    	return view('admin.module.voucher.edit',['data' =>$data,'producOption' => $producOption]);
    }
    public function postVoucherEdit(VoucherEditRequest $request){
    	$cate = Voucher::find($request->id_voucher);
		$cate->code = $request->code;
    	$cate->amount_discount = $request->amount_discount;
    	$cate->id_product_option = $request->id_product_option;
    	$cate->created_by = \Auth::user()->id;
    	$cate->updated_at = new DateTime();
    	$cate->save();
    	return redirect()->route('getListVoucher')->with(['flash_level' => 'alert-success','flash_message' => 'Cập nhật thành công']);
    }
}
