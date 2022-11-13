<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ImageEditRequest;
use App\Models\Image;
use DateTime,File;

class ImageController extends Controller
{
    
    public function getImagetList(){
    	$data = Image::select('id','name','path','size')->get()-> toArray();
    	return view('admin.module.logobanner.list',['data' => $data]);
    }
    public function getImageEdit($id){
    	if(Auth::user()->role==0)
        return redirect()->route('getImagetList');
        $data = Image::findOrFail($id)->toArray();
    	return view('admin.module.logobanner.edit',['data' => $data]);
    }
    public function postImageEdit(ImageEditRequest $request,$id){
    	$img = Image::findOrFail($id);
    	$file = $request->file('newImg');
    	$img->name = $request->txtName;

    	if (strlen($file) > 0) {
			$fImageCurrent = $request->fImageCurrent;
			if (file_exists(public_path().'/uploads/banner/'.$fImageCurrent)) {
	            File::delete(public_path().'/uploads/banner/'.$fImageCurrent);
	        }

			$filename = time().'.'.$file->getClientOriginalName();
            $destinationPath = public_path('uploads/banner/');
			$file->move($destinationPath,$filename);
			$img->path = $filename;
		}
		$img->updated_at  = 	new DateTime();
		$img->save();

    	return redirect()->route('getImagetList')->with(['flash_level' => 'result_msg','flash_message' => 'Cập nhật Thành Công']);
    }
}
