<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ItemAddRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MaintenanceCustomerAddRequest;
use App\Http\Requests\MaintenanceCustomerEditRequest;
use App\Models\ServiceCustomer;
use App\Models\Product;
use App\Models\ProductOption;
use App\Models\MaintenanceCustomerDetail;
use App\Models\OrderDetail;
use DateTime;

class MaintenanceCustomerController extends Controller
{
    

    public function getMaintenanceCustomerAdd($id){
        // $producOption = ProductOption::select('id', 'name')->orderBy('name', 'ASC')->get()->toArray();
		// $phone_customers = ServiceCustomer::orderBy('created_at', 'ASC')->get()->pluck('phone_customer')->toArray();
		// $producOption[] = ['id' => '', 'name' => '------ Chọn sản phẩm khuyến mãi ------'];
		// dd($producOption);

		$orderDetail = OrderDetail::where('id', $id)->first();
		$order = $orderDetail->order;
		$customer = $order->customer;
		$productOption = $orderDetail->productOption;
		// dd($orderDetail, $order, $productOption);

    	return view('admin.module.maintenance_customer.add',[
			'data' => $data ?? [],
			'orderDetail' => $orderDetail ?? [],
			'order' => $order ?? [],
			'productOption' => $productOption ?? [],
			'customer' => $customer ?? []
		]);
    }

    public function postMaintenanceCustomerAdd(MaintenanceCustomerAddRequest $request, $id){
		$params = $request->all();
		// dd($params);
    	// $cate = new ServiceCustomer;
    	// $cate->code = $request->code;
    	// $cate->amount_discount = $request->amount_discount;
    	// $cate->id_product_option = $request->id_product_option;
    	// $cate->created_by = \Auth::user()->id;
    	// $cate->save();


		$orderDetail = OrderDetail::where('id', $id)->first();
		$order = $orderDetail->order;
		// $customer = $order->customer;
		// $productOption = $orderDetail->productOption;
		

		$serviceCustomer = new ServiceCustomer;

		$serviceCustomer->name_customer = data_get($params, 'name_customer');
		$serviceCustomer->phone_customer = data_get($params, 'phone_customer');
		$serviceCustomer->product_name = data_get($params, 'product_name');
		$serviceCustomer->condition = data_get($params, 'condition');
		// $serviceCustomer->service_type = data_get($params, 'service_type');
		$serviceCustomer->method = 2; //bao hanh
		
		$serviceCustomer->customer_id = $order->customer_id ?? ''; //bao hanh
		$serviceCustomer->order_id = $order->id ?? ''; //bao hanh
		$serviceCustomer->order_detail_id = $orderDetail->id ?? ''; //bao hanh
		// dd($serviceCustomer);
		$serviceCustomer->save();


		// if($params['add_item'] == 1){
		// 	return redirect()->route('addItem', ['id_service_customer' => $serviceCustomer->id_service_customer ?? ''] );
		// 	// $producOption = ProductOption::select('id', 'name')->orderBy('name', 'ASC')->get()->toArray();
		// 	// return view('admin.module.maintenance_customer.add_item', [	'serviceCustomer' => $serviceCustomer ?? []]);
		// }

    	return redirect()->route('getListMaintenanceCustomer')->with(['flash_level' => 'alert-success','flash_message' => 'Thêm thành công']);
    }
    public function getListMaintenanceCustomer(){
    	$data = ServiceCustomer::select('*')->where('method', 2)->orderBy('created_at','DESC')->paginate(20);
    	return view('admin.module.maintenance_customer.list',['data' => $data]);
    }
    public function getMaintenanceCustomerDelete($id){
    	if(Auth::user()->role==0)
        return redirect()->route('getListMaintenanceCustomer');

		// dd( $id);
		$parent = ServiceCustomer::where('id_service_customer', $id)->delete();
		return redirect()->route('getListMaintenanceCustomer')->with(['flash_level' => 'alert-danger','flash_message' => 'Xóa thành công']);
    }
    public function getMaintenanceCustomerEdit($id_service_customer){
    	if(Auth::user()->role != 1)
        return redirect()->route('getListMaintenanceCustomer');

		$phone_customers = ServiceCustomer::orderBy('created_at', 'ASC')->get()->pluck('phone_customer')->toArray();
        $data = ServiceCustomer::where('id_service_customer', $id_service_customer)->first();
		$producOption = ProductOption::select('id', 'name')->orderBy('name', 'ASC')->get()->toArray();
    	return view('admin.module.maintenance_customer.edit',[
			'data' =>$data,
			'producOption' => $producOption,
			'phone_customers' => $phone_customers
		]);
    }
    public function postMaintenanceCustomerEdit(MaintenanceCustomerAddRequest $request, $id){
		$params = $request->all();

		$serviceCustomer = ServiceCustomer::where('id_service_customer', $id)->first();
		if(empty($serviceCustomer)){
			return redirect()->route('getListMaintenanceCustomer');
		}
    	$serviceCustomer->name_customer = data_get($params, 'name_customer');
		$serviceCustomer->phone_customer = data_get($params, 'phone_customer');
		$serviceCustomer->product_name = data_get($params, 'product_name');
		$serviceCustomer->condition = data_get($params, 'condition');

		$serviceCustomer->save();

    	return redirect()->route('getListMaintenanceCustomer')->with(['flash_level' => 'alert-success','flash_message' => 'Cập nhật thành công']);
    }

	// public function addItem($id_service_customer){

	// 	$serviceCustomer = ServiceCustomer::where('id_service_customer', $id_service_customer)->first();
	// 	if(empty($serviceCustomer)){
	// 		return redirect()->route('getListMaintenanceCustomer');
	// 	}

    //     // $producOption = ProductOption::select('id', 'name')->orderBy('name', 'ASC')->get()->toArray();
	// 	// $phone_customers = ServiceCustomer::orderBy('created_at', 'ASC')->get()->pluck('phone_customer')->toArray();
	// 	// $producOption[] = ['id' => '', 'name' => '------ Chọn sản phẩm khuyến mãi ------'];
	// 	// dd($producOption);
    // 	return view('admin.module.maintenance_customer.add_item',['data' => $data ?? [],
	// 		// 'phone_customers' => $phone_customers ?? [],
	// 		'serviceCustomer' => $serviceCustomer ?? [],
	// 	]);
    // }

	// public function postAddItem(ItemAddRequest $request, $id_service_customer){
		
	// 	$serviceCustomer = ServiceCustomer::where('id_service_customer', $id_service_customer)->first();

	// 	if(empty($serviceCustomer)){
	// 		return redirect()->route('getListMaintenanceCustomer');
	// 	}

	// 	$serviceCustomerDetail = new MaintenanceCustomerDetail();
    // 	$serviceCustomerDetail->id_service_customer = $id_service_customer;
    // 	$serviceCustomerDetail->item =  $request->item;
    // 	$serviceCustomerDetail->unit_price = $request->unit_price;
    // 	$serviceCustomerDetail->qty = $request->qty;
    // 	$serviceCustomerDetail->total = ($request->qty * $request->unit_price);
    // 	$serviceCustomerDetail->save();
		
	// 	$serviceCustomer = $serviceCustomerDetail->serviceCustomer;
	// 	$total = $this->getTotalMaintenanceCustomer($serviceCustomer);
	// 	$serviceCustomer->total = $total; 
    // 	$serviceCustomer->save();

	// 	return redirect()->route('getMaintenanceCustomerEdit', ['id' => $id_service_customer])->with(['flash_level' => 'alert-success','flash_message' => 'Thêm thành công']);
    // }

	public function getTotalMaintenanceCustomer($serviceCustomer)
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

	// public function getMaintenanceCustomerDetailDelete($id_service_customer_detail){
    // 	if(Auth::user()->role==0)
    //     return redirect()->route('getListMaintenanceCustomer');

	// 	$MaintenanceCustomerDetail = MaintenanceCustomerDetail::where('id_service_customer', $id_service_customer_detail)->first();
	// 	$id_service_customer = $MaintenanceCustomerDetail->id_service_customer; 
	// 	$MaintenanceCustomerDetail->delete();
	// 	return redirect()->route('getMaintenanceCustomerEdit', ['id_service_customer' => $id_service_customer])->with(['flash_level' => 'alert-danger','flash_message' => 'Xóa thành công']);
    // }

	public function exportPdf($id)
    {
		$maintenance = ServiceCustomer::where('id_service_customer', $id)->first();
		$orderDetail = OrderDetail::where('id', $maintenance->order_detail_id)->first();
		$order = $orderDetail->order;
		$customer = $order->customer;
		$productOption = $orderDetail->productOption;
		$order_id = $order->id;
		$data = [];
		$user = $customer;
        $current_time = 'Ngày '. date("d",time()).' Tháng ' .date("m",time()). ' Năm ' . date("Y",time());
        
        $pdf = \PDF::loadView('admin.module.maintenance_customer.pdf',   compact('customer', 'maintenance', 'user', 'order_id', 'current_time'));
   
		$fileName = 'Phieu_bao_hanh_' . date('dmY', time()) . '.pdf';

        return $pdf->download($fileName);
    }
}
