<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\NewsAddRequest;
use App\Http\Requests\NewsEditRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\News;
use DateTime,File;

class NewsController extends Controller
{ 
    public function getNewsAdd(){
        if(Auth::user()->role==0)
        return redirect()->route('getOrderList');
    	return view('admin.module.news.add');
    }
    public function postNewsAdd(NewsAddRequest $request){
    	$news = new News;

    	$file = $request->file('newsImg');
    	$news->title = $request->txtIntro;
        $news->alias = str_slug($request->txtIntro, '-');
    	$news->description = $request->txtFull;
    	$news->type = $request->sltype;
    	
    	if (strlen($file) > 0) {
            $destinationPath = public_path('uploads/news/');
			$filename = time().'.'.$file->getClientOriginalName();

			$file->move($destinationPath,$filename);
			$news->image = $filename;
		}

    	$news->is_active = $request->rdoPublic;
    	$news->created_at = new DateTime;
    	$news->user_id = Auth::user()->username;

    	$news->save();
    	return redirect()->route('getNewsList')->with(['flash_level' => 'result_msg','flash_message' => 'Thêm thành công']);
    }
    public function getNewsList(){
    	$news = News::select('id','title','created_at','image','user_id')->orderBy('id','DESC')->paginate(20);     		
    	return view('admin.module.news.list',['news' => $news]);
    }
    public function getNewsDelete($id){
    	$news = News::findOrFail($id);
        if (file_exists(public_path().'/uploads/news/'.$news->image)) {
            File::delete(public_path().'/uploads/news/'.$news->image);
        }
        $news->delete();
        return redirect()->route('getNewsList')->with(['flash_level' => 'result_msg','flash_message' => 'Xóa Tin Tức Thành Công']);
    }
    public function getNewsEdit($id){
    	$news = News::findOrFail($id);       
        return view('admin.module.news.edit',["news" => $news]);
    }
    public function postNewsEdit(NewsEditRequest $request,$id){
    	$news = News::findOrFail($id);
    	$file = $request->file('newsImg');
    	$news->title = $request->txtIntro;
        $news->alias = str_slug($request->txtIntro, '-');
    	$news->description = $request->txtFull;
		if (strlen($file) > 0) {
			$fImageCurrent = $request->fImageCurrent;
			if (file_exists(public_path().'/uploads/news/'.$fImageCurrent)) {
	            File::delete(public_path().'/uploads/news/'.$fImageCurrent);
	        }

			$filename = time().'.'.$file->getClientOriginalName();
            $destinationPath = public_path('uploads/news/');
			$file->move($destinationPath,$filename);
			$news->image = $filename;
		}
		$news->is_active = $request->rdoPublic;	
		$news->user_id    =	Auth::user()->username;
		$news->updated_at  = 	new DateTime();
    	$news->save();
    	return redirect()->route('getNewsList')->with(['flash_level' => 'result_msg','flash_message' => 'Sửa Tin Tức Thành Công']);
    }
}
