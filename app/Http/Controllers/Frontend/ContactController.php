<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests\ContactAddRequest;
use App\Http\Controllers\Controller;
use App\Models\Statics;
use App\Models\Contact;
use DateTime;

class ContactController extends Controller
{
    public function getContactIndex(){
    	$id = 2;
    	$data = Statics::findOrFail($id)->toArray();
    	return view('frontend.pages.contact.contact',['data' => $data]);
    }
    public function postContactIndex(ContactAddRequest $request){
    	$contact = new Contact;
    	$contact->name = $request->txtName;
    	$contact->email = $request->txtEmail;
    	$contact->content = $request->txtContent;
    	$contact->created_at = new DateTime();
    	$contact->save();

    	return redirect()->route('getContactIndex')->with(['flash_level' => 'error_msg','flash_message' => 'Gửi tin nhắn thành công !']);
    }
}
