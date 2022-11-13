<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CateAddRequest;
use App\Http\Requests\CateEditRequest;
use App\Models\OrderProductBackup;
use App\Models\Product;
use App\Models\Customer;
use DateTime;

class BackupController extends Controller
{
    

    public function backupcustomer(){
    	$cus = OrderProductBackup::all()->unique('phone')->toArray() ;
        foreach ($cus as $key => $value) {
            $c = new Customer;
            $c->fullname = $value['customer'];
            $c->phone = $value['phone'];
            $c->email = $value['email'];
            $c->address = $value['address'];

            $c->save();
        }
    }

    public function backupcustomerID(){
        $cus = OrderProductBackup::all()->toArray() ;
        foreach ($cus as $key => $value) {
            $id = Customer::where('phone',$value['phone'])->first();
            if($id->count() > 0)
            {
                $aa = OrderProductBackup::find($value['id']);
                $aa->customer_id = $id['id'];
                $aa->save();
            }
        }
    }
    
}
