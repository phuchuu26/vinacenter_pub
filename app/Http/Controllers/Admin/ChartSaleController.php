<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\IntroEditRequest;
use App\Models\OrderProduct;
use App\Models\Statics;
use App\Models\User;
use DateTime;

class ChartSaleController extends Controller
{
    

    public function getChartSale(){
    	$data = [];
    	$data['best_saler'] = $this->getBestSaler();
    	$data['product_sale'] = $this->getProductSale();
    	$data['sale'] = $this->getSale();
        return view('admin.module.chart_sale.view',['data' => $data]);
    }

    public function getBestSaler()
    {
        
        $data = \DB::select("select sum(REPLACE(o.total, ',', '')) as sale, o.user_id 
        FROM order_product as o
        GROUP BY user_id 
        ORDER BY sale DESC");

        foreach($data as $val){
            $user = User::where('username', data_get($val, 'user_id'))->first();
            if( $user->role != 1){
                $val->name =  $user->name;
                $val->id =  $user->id;
                return $val;
            }
        }
    }


    public function getProductSale()
    {
        
        $data = \DB::select("select sum(REPLACE(o.qty, ',', '')) as qty, o.product_id , v.name
        FROM order_detail as o
        left JOIN product_option AS v ON o.product_id = v.id
        GROUP BY product_id , v.name
        ORDER BY qty DESC");
        return $data[0];
       
    }
    
    public function getSale()
    {
        
        $data = []; 
        $month = \DB::select(" 
            select  sum(REPLACE(total, ',', '')) as sale
            FROM order_product
            WHERE created_at  between DATE_SUB(CURDATE(), INTERVAL 1 MONTH) and DATE_ADD(CURDATE(), INTERVAL 1 DAY)
        ");

        $week = \DB::select("  select  sum(REPLACE(total, ',', '')) as sale
        FROM order_product
        WHERE created_at  between DATE_SUB(CURDATE(), INTERVAL 7 DAY) and DATE_ADD(CURDATE(), INTERVAL 1 DAY)");
        
        $year = \DB::select("  select  sum(REPLACE(total, ',', '')) as sale
        FROM order_product
        WHERE created_at  between DATE_SUB(CURDATE(), INTERVAL 1 YEAR) and DATE_ADD(CURDATE(), INTERVAL 1 DAY)
        ");
      
        $data['week'] =   $week[0];
        $data['month'] =   $month[0];
        $data['year'] =   $year[0];
        return $data;
       
    }
   
}
