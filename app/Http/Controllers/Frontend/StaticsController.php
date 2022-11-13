<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Statics;

class StaticsController extends Controller
{
    public function getIntroIndex(){
    	$id = 1;
    	$data = Statics::findOrFail($id)->toArray();
    	return view('frontend.pages.statics.intro',['data' => $data]);
    }    
    public function getBuyIndex(){
    	$id = 3;
    	$data = Statics::findOrFail($id)->toArray();
    	return view('frontend.pages.statics.buy',['data' => $data]);
    }
    public function getOrderIndex(){
    	$id = 4;
    	$data = Statics::findOrFail($id)->toArray();
    	return view('frontend.pages.statics.order',['data' => $data]);
    }
}
