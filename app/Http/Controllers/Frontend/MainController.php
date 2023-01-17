<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\ProductOption;
use App\Models\Statics;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Arr;

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

        $productSaleTop = ProductOption::where('salestop_salesoff',4)->with('user')->where('is_approved', 1)->orderBy('indextop', 'asc')->get()->toArray();
    	$productSaleTop = $this->filterProductOptionAdmin($productSaleTop);

		$productSale = ProductOption::where('salestop_salesoff',3)->with('user')->where('is_approved', 1)->orderBy('indextop', 'asc')->get()->toArray();
    	$productSale = $this->filterProductOptionAdmin($productSale);
    
        $productRan = ProductOption::orderBy('indextop', 'asc')->with('user')->where('is_approved', 1)->get()->toArray();
		$productRan = $this->filterProductOptionAdmin($productRan);
        
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

	public function filterProductOptionAdmin($array, $take = 12)
	{
		$arrayFilter = array_filter($array, function ($value) {
			return empty(data_get($value, 'user')) || (data_get($value['user'], 'role', '') == 1);
		});

		$arrayFilter = array_values($arrayFilter);
		$arrayFilter = array_slice($arrayFilter, 0, $take);

		return $arrayFilter;
	}
}
