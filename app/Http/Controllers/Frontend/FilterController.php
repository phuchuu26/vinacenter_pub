<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\ProductOption;
use App\Models\ProductImage;
use App\Models\Product;
use App\Models\Cate;
use App\Models\Statics;

class FilterController extends Controller
{
    public function get1Filter(){        
        $price = 3000000;
        $cl = 1 ;   
        $data = ProductOption::where('value','<=', $price)->limit(16)->get();      
        return view('frontend.pages.filter.index',['data' => $data,'color' =>$cl]);
    }
    public function get2Filter(){        
        $min_price = 3000000;
        $max_price = 5000000;
        $cl = 2 ; 
        $data = ProductOption::whereBetween('value', [$min_price, $max_price])->limit(16)->get();
        return view('frontend.pages.filter.index',['data' => $data,'color' =>$cl]);
    }
    public function get3Filter(){        
        $price = 5000000; 
        $cl = 3;     
        $data = ProductOption::where('value','>', $price)->limit(16)->get();      
        return view('frontend.pages.filter.index',['data' => $data,'color' =>$cl]);
    }
}
