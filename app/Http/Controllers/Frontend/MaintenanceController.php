<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Maintenance;

class MaintenanceController extends Controller
{
    public function getMaintenanceIndex(){
    	$data = Maintenance::first();        
    	return view('frontend.pages.maintenance.maintenance',['data' => $data]);
    }    
}
