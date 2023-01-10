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
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ChartSaleController extends Controller
{
    

    public function getChartSale(){
    	$data = [];
    	$data['best_saler'] = $this->getBestSaler();
    	$data['product_sale'] = $this->getProductSale();
    	$data['sale'] = $this->getSale();
    	$data['list'] = $this->getListEmployees();
        // dd(	$data['list'] );
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

    
    public function getListEmployees()
    {
        
        $data = []; 

        $week = \DB::select(" 			select  sum(REPLACE(total, ',', '')) as sale, user_id
        FROM order_product
        WHERE created_at  between DATE_SUB(CURDATE(), INTERVAL 7 DAY) and DATE_ADD(CURDATE(), INTERVAL 1 DAY)
        GROUP BY user_id
        ORDER BY sale DESC
        ");

        

        $month = \DB::select(" 
            select  sum(REPLACE(total, ',', '')) as sale, user_id
            FROM order_product
            WHERE created_at  between DATE_SUB(CURDATE(), INTERVAL 1 MONTH) and DATE_ADD(CURDATE(), INTERVAL 1 DAY)
            GROUP BY user_id
            ORDER BY sale DESC
        ");
        
        $year = \DB::select("  		select  sum(REPLACE(total, ',', '')) as sale, user_id
        FROM order_product
        WHERE created_at  between DATE_SUB(CURDATE(), INTERVAL 1 YEAR) and DATE_ADD(CURDATE(), INTERVAL 1 DAY)
        GROUP BY user_id
				ORDER BY sale DESC
        ");

        
        foreach($year as &$val){
            $user = User::where('username', data_get($val, 'user_id'))->first();
            $val->name = data_get($user, 'name') ?? ''; 
            $val->id = data_get($user, 'id') ?? ''; 
            $val->created_at = data_get($user, 'created_at') ?? ''; 
        }

        foreach($month as &$val){
            $user = User::where('username', data_get($val, 'user_id'))->first();
            $val->name = data_get($user, 'name') ?? ''; 
            $val->id = data_get($user, 'id') ?? ''; 
            $val->created_at = data_get($user, 'created_at') ?? ''; 
        }
      
        foreach($week as &$val){
            $user = User::where('username', data_get($val, 'user_id'))->first();
            $val->name = data_get($user, 'name') ?? ''; 
            $val->id = data_get($user, 'id') ?? ''; 
   
            $val->created_at = data_get($user, 'created_at') ?? ''; 
        }
        $month = $this->paginate($month);
        $year = $this->paginate($year);
        $week = $this->paginate($week);
        
        // dd( $month );
        $data['week'] =   $week;
        $data['month'] =   $month;
        $data['year'] =   $year;
        return $data;
       
    }

    public function paginate($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        $options['path'] = route('getChartSale');
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
