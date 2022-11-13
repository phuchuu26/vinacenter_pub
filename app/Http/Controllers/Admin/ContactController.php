<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;
use DateTime;

class ContactController extends Controller
{
    
    public function getContactList(){
    	$data = Contact::select('id','name','created_at','email','content','status')->orderBy('id','DESC')->paginate(20);
    	return view('admin.module.contact.list',['data' => $data]); 
    }
    public function getContactDelete($id){
    	if(Auth::user()->role==0)
        return redirect()->route('getContactList');
        try{
	    	$contact = Contact::findOrFail($id);
	    	$contact->delete();
	        return redirect()->route('getContactList')->with(['flash_level' => 'result_msg','flash_message' => 'Xóa Tin nhắn Thành Công']);
        }catch(ModelNotFoundException $e) {
             return redirect()->back();
        }
    }
    public function getContactView($id){
    	//echo $id;
    	try{
	    	$contact = Contact::findOrFail($id);
            $parent = Contact::where('id',$id)->count();
	    	if($parent > 0 ){
	    		$con = Contact::find($id);
		    	$con->status = 1;		    	    	
		    	$con->updated_at = new DateTime();
		    	$con->save();
	    		return view('admin.module.contact.detail',['contact' => $contact]);
	    	}else{
	    		return redirect()->route('getContactList');
	    	}
	    	
    	}catch(ModelNotFoundException $e) {
             return redirect()->back();
        }
    }
}
