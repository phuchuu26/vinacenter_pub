<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\ProductOption;

class SearchController extends Controller
{
    public function getSearchList(){    	
		$param = '%'.$_GET["search"].'%';
		$data = ProductOption::where('name', 'LIKE', $param)->orderBy('id','DESC')->paginate(16);
		$data->appends(['search' => $_GET["search"]]);
		return view('frontend.pages.search.list',['data' => $data,'search' => $_GET["search"]]);
    }
    public function autocomplete(Request $request){
	$term = $request->term;
	$results = array();	
	$queries =ProductOption::where('name', 'LIKE', '%'.$term.'%' )->get();
	
	foreach ($queries as $query)
	{
	    $results[] = [ 'id' => $query->id, 'value' => $query->first_name.' '.$query->last_name ];
	}
return Response::json($results);
}

}
