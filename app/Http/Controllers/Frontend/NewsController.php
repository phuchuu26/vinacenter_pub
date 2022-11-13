<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\News;

class NewsController extends Controller
{
    public function getNewsIndex(){
    	$news = News::where('is_active',1)->where('type',0)->orderBy('id','DESC')->paginate(5);    	   	
    	return view('frontend.pages.news.news',['news' => $news]);
    }
    public function getNewsDetail($id){
    	try{
	    	$news = News::where('is_active',1)->where('type',0)->limit(3)->get()->toArray();
	    	$data = News::findOrFail($id)->toArray();
	    	return view('frontend.pages.news.detail',['data' => $data,'news' => $news]);
    	}catch(ModelNotFoundException $e) {
             return redirect()->back();
        }
    }
}
