<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\ProductOption;
use App\Models\Statics;
use Illuminate\Support\Facades\Artisan;

class MainController extends Controller
{
    public function getIndex(){
        //echo 'Trang web đang bảo trì, xin vui lòng quay lại sau.';
    	$news = News::where('is_active',1)->limit(2)->orderBy('id','DESC')->get()->toArray();

    	$productNew = ProductOption::select(
    		'id',
    		'product_id',
    		'name',    		
    		'value',
    		'sumary',
    		'image',
    		'alias')
    	->inRandomOrder()->limit(12)->get()->toArray();

        $productSaleTop = ProductOption::where('salestop_salesoff',2)->limit(12)->orderBy('indextop', 'asc')->get()->toArray();
    	$productSale = ProductOption::where('salestop_salesoff',3)->limit(12)->orderBy('indextop', 'asc')->get()->toArray();
    	
        $productRan = ProductOption::orderBy('indextop', 'asc')->take(12)->get()->toArray();
        //$productTop = ProductOption::where('salestop_salesoff',1)->limit(15)->orderBy('id','DESC')->get()->toArray();
        //$productSales = ProductOption::where('salestop_salesoff',2)->limit(6)->orderBy('id','DESC')->get()->toArray();          
        
    	return view('frontend.pages.index.index',
    		[
    			'news' => $news,
    			'productNew' => $productNew,
    			'productSaleTop' => $productSaleTop,
    			'productSale' => $productSale,
                'productRan' => $productRan,
                //'productTop' => $productTop,
                //'productSales' => $productSales,
               
    		]);
    }
}
