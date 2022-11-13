<?php 
namespace App\Helpers;

use App\Models\Support;
use App\Models\Image;
use Illumitate\Http\Request;
use Cart;
 
class LoadStatics{
   	public static function getEmail()    
    {   
    	$id = 1;
        $dataEmail = Support::findOrFail($id)->toArray();
        return $dataEmail['value'] ; 
    }
    public static function getAddress()    
    {   
    	$id = 2;
        $dataAddress = Support::findOrFail($id)->toArray();
        return $dataAddress['value'] ;  
    }
    public static function getPhone()    
    {   
    	$id = 3;
        $dataPhone = Support::findOrFail($id)->toArray(); 
        return $dataPhone['value'] ; 
    }
    public static function getMarketing()    
    {         
        $dataMarketing = Support::where('type',1)->get()->toArray(); 
        return $dataMarketing ; 
    } 
    public static function getSlider()    
    {         
        $dataSlider = Image::where('type',1)->get()->toArray(); 
        return $dataSlider ; 
    }
    public static function getIndexBannerRight()    
    {         
        $dataBanner = Image::where('type',3)->get()->toArray(); 
        return $dataBanner ; 
    }
    public static function getIndexBannerBig()    
    {         
        $id = 12;
        $dataBannerBig = Image::findOrFail($id)->toArray();
        return $dataBannerBig['path'] ; 
    }
    public static function getIndexBannerCustomer()    
    {         
        $dataBanner = Image::where('type',2)->get()->toArray(); 
        return $dataBanner ; 
    }
    public static function getProductBanner()    
    {         
        $id = 13;
        $dataBanner = Image::findOrFail($id)->toArray();
        return $dataBanner['path'] ; 
    }
    public static function getBannerProDetailMan()    
    {         
        $id = 14;
        $dataBanner = Image::findOrFail($id)->toArray();
        return $dataBanner['path'] ;
    }
    public static function getBannerProDetailWo()    
    {         
        $id = 15;
        $dataBanner = Image::findOrFail($id)->toArray();
        return $dataBanner['path'] ;
    }
    public static function getBannerNews()    
    {         
        $id = 16;
        $dataBanner = Image::findOrFail($id)->toArray();
        return $dataBanner['path'] ;
    }
    public static function getLogo()    
    {         
        $id = 17;
        $dataBanner = Image::findOrFail($id)->toArray();
        return $dataBanner['path'] ;
    }
    public static function getLogoRoll()    
    {         
        $id = 18;
        $dataBanner = Image::findOrFail($id)->toArray();
        return $dataBanner['path'] ;
    }
    public static function getFullUrl()
    {        
        return url()->current();
    }
    public static function getCart(){
        return $content = Cart::content();
    }
    public static function getCartTotal(){
        return $content = Cart::total();
    }
    public static function getCartCount(){
        return $content = Cart::count();
    }    
}