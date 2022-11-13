<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Service;

class ServiceController extends Controller
{
    public function getServiceIndex(){
    	$data = Service::first();        
    	return view('frontend.pages.services.service',['data' => $data]);
    }    
}
