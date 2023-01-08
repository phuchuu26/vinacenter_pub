<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ItemAddRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ServiceCustomerAddRequest;
use App\Http\Requests\ServiceCustomerEditRequest;
use App\Models\ServiceCustomer;
use App\Models\Product;
use App\Models\ProductOption;
use App\Models\ServiceCustomerDetail;
use DateTime;

class ServiceCustomerController extends Controller
{
    

    public function getServiceCustomerAdd(){
        // $producOption = ProductOption::select('id', 'name')->orderBy('name', 'ASC')->get()->toArray();
		$phone_customers = ServiceCustomer::orderBy('created_at', 'ASC')->get()->pluck('phone_customer')->toArray();
		// $producOption[] = ['id' => '', 'name' => '------ Chọn sản phẩm khuyến mãi ------'];
		// dd($producOption);
    	return view('admin.module.service_customer.add',['data' => $data ?? [],
			'phone_customers' => $phone_customers ?? []
		]);
    }

    public function postServiceCustomerAdd(ServiceCustomerAddRequest $request){
		$params = $request->all();
    	// $cate = new ServiceCustomer;
    	// $cate->code = $request->code;
    	// $cate->amount_discount = $request->amount_discount;
    	// $cate->id_product_option = $request->id_product_option;
    	// $cate->created_by = \Auth::user()->id;
    	// $cate->save();


		
		

		$serviceCustomer = new ServiceCustomer;

		$serviceCustomer->name_customer = data_get($params, 'name_customer');
		$serviceCustomer->phone_customer = data_get($params, 'phone_customer');
		$serviceCustomer->product_name = data_get($params, 'product_name');
		$serviceCustomer->condition = data_get($params, 'condition');
		$serviceCustomer->service_type = data_get($params, 'service_type');
		$serviceCustomer->method = 1; //tinh phi

		//cau hinh san pham
		$serviceCustomer->cpu = data_get($params, 'cpu', '');
		$serviceCustomer->ram = data_get($params, 'ram', '');
		$serviceCustomer->hdd = data_get($params, 'hdd', '');
		$serviceCustomer->pin = data_get($params, 'pin', '');
		$serviceCustomer->dvd = data_get($params, 'dvd', '');
		$serviceCustomer->adapter = data_get($params, 'adapter', '');

		$serviceCustomer->save();


		if($params['add_item'] == 1){
			return redirect()->route('addItem', ['id_service_customer' => $serviceCustomer->id_service_customer ?? ''] );
			// $producOption = ProductOption::select('id', 'name')->orderBy('name', 'ASC')->get()->toArray();
			// return view('admin.module.service_customer.add_item', [	'serviceCustomer' => $serviceCustomer ?? []]);
		}

    	return redirect()->route('getListServiceCustomer')->with(['flash_level' => 'alert-success','flash_message' => 'Thêm thành công']);
    }
    public function getListServiceCustomer(){
    	$data = ServiceCustomer::select('*')->where('method', 1)->paginate(20);
    	return view('admin.module.service_customer.list',['data' => $data]);
    }
    public function getServiceCustomerDelete($id){
    	if(Auth::user()->role==0)
        return redirect()->route('getListServiceCustomer');

		// dd( $id);
		$parent = ServiceCustomer::where('id_service_customer', $id)->delete();
		return redirect()->route('getListServiceCustomer')->with(['flash_level' => 'alert-danger','flash_message' => 'Xóa thành công']);
    }
    public function getServiceCustomerEdit($id_service_customer){
    	if(Auth::user()->role != 1)
        return redirect()->route('getListServiceCustomer');

		$phone_customers = ServiceCustomer::orderBy('created_at', 'ASC')->get()->pluck('phone_customer')->toArray();
        $data = ServiceCustomer::where('id_service_customer', $id_service_customer)->first();
		$producOption = ProductOption::select('id', 'name')->orderBy('name', 'ASC')->get()->toArray();
    	return view('admin.module.service_customer.edit',[
			'data' =>$data,
			'producOption' => $producOption,
			'phone_customers' => $phone_customers
		]);
    }
    public function postServiceCustomerEdit(ServiceCustomerAddRequest $request, $id_service_customer){
		$params = $request->all();

		$serviceCustomer = ServiceCustomer::where('id_service_customer', $id_service_customer)->first();
		if(empty($serviceCustomer)){
			return redirect()->route('getListServiceCustomer');
		}

    	$serviceCustomer->name_customer = data_get($params, 'name_customer');
		$serviceCustomer->phone_customer = data_get($params, 'phone_customer');
		$serviceCustomer->product_name = data_get($params, 'product_name');
		$serviceCustomer->condition = data_get($params, 'condition');
		$serviceCustomer->service_type = data_get($params, 'service_type');
		$serviceCustomer->method = 1; //tinh phi
		
		//cau hinh san pham
		$serviceCustomer->cpu = data_get($params, 'cpu', '');
		$serviceCustomer->ram = data_get($params, 'ram', '');
		$serviceCustomer->hdd = data_get($params, 'hdd', '');
		$serviceCustomer->pin = data_get($params, 'pin', '');
		$serviceCustomer->dvd = data_get($params, 'dvd', '');
		$serviceCustomer->adapter = data_get($params, 'adapter', '');

		$serviceCustomer->save();

    	return redirect()->route('getListServiceCustomer')->with(['flash_level' => 'alert-success','flash_message' => 'Cập nhật thành công']);
    }

	public function addItem($id_service_customer){

		$serviceCustomer = ServiceCustomer::where('id_service_customer', $id_service_customer)->first();
		if(empty($serviceCustomer)){
			return redirect()->route('getListServiceCustomer');
		}

        // $producOption = ProductOption::select('id', 'name')->orderBy('name', 'ASC')->get()->toArray();
		// $phone_customers = ServiceCustomer::orderBy('created_at', 'ASC')->get()->pluck('phone_customer')->toArray();
		// $producOption[] = ['id' => '', 'name' => '------ Chọn sản phẩm khuyến mãi ------'];
		// dd($producOption);
    	return view('admin.module.service_customer.add_item',['data' => $data ?? [],
			// 'phone_customers' => $phone_customers ?? [],
			'serviceCustomer' => $serviceCustomer ?? [],
		]);
    }

	public function postAddItem(ItemAddRequest $request, $id_service_customer){
		
		$serviceCustomer = ServiceCustomer::where('id_service_customer', $id_service_customer)->first();

		if(empty($serviceCustomer)){
			return redirect()->route('getListServiceCustomer');
		}

		$serviceCustomerDetail = new ServiceCustomerDetail();
    	$serviceCustomerDetail->id_service_customer = $id_service_customer;
    	$serviceCustomerDetail->item =  $request->item;
    	$serviceCustomerDetail->unit_price = $request->unit_price;
    	$serviceCustomerDetail->qty = $request->qty;
    	$serviceCustomerDetail->total = ($request->qty * $request->unit_price);
    	$serviceCustomerDetail->save();
		
		$serviceCustomer = $serviceCustomerDetail->serviceCustomer;
		$total = $this->getTotalServiceCustomer($serviceCustomer);
		$serviceCustomer->total = $total; 
    	$serviceCustomer->save();

		return redirect()->route('getServiceCustomerEdit', ['id' => $id_service_customer])->with(['flash_level' => 'alert-success','flash_message' => 'Thêm thành công']);
    }

	public function getTotalServiceCustomer($serviceCustomer)
	{
		$total = 0;
		if(empty($serviceCustomer)){
			return $total;
		}
		$serviceCustomerDetails = $serviceCustomer->serviceCustomerDetail; 
		foreach($serviceCustomerDetails as $detail){
			$total += data_get($detail, 'total');
		}

		return $total;
	}

	public function getServiceCustomerDetailDelete($id_service_customer_detail){
    	if(Auth::user()->role==0)
        return redirect()->route('getListServiceCustomer');

		$ServiceCustomerDetail = ServiceCustomerDetail::where('id_service_customer', $id_service_customer_detail)->first();
		$id_service_customer = $ServiceCustomerDetail->id_service_customer; 
		$ServiceCustomerDetail->delete();
		return redirect()->route('getServiceCustomerEdit', ['id_service_customer' => $id_service_customer])->with(['flash_level' => 'alert-danger','flash_message' => 'Xóa thành công']);
    }
}
