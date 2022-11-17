<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ImageEditRequest;
use App\Models\District;
use App\Models\Image;
use App\Models\User;
use App\Models\Province;
use App\Models\Ward;
use DateTime,File;
use Socialite;
use Zalo\Zalo;
use App\Services\SocialAccountService;


class LoginThirdPartyController extends Controller
{
    public function __construct()
    {
        // $config = array(
        //     'app_id' => '1234567890987654321',
        //     'app_secret' => 'AbC123456XyZ',
        //     'callback_url' => 'https://www.callback.com'
        // );
        // $this->zalo = new Zalo($config);
    }

    // google
    // public function redirectToGoogle()
    // {
    //     return Socialite::driver('google')->redirect();
    // }


    public function googleCallback()
    {
        $user = $this->createOrGetUser(Socialite::driver('google')->user());
        auth()->login($user);
        return redirect()->route('index');
    }


    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // public function callback($social)
    // {
    //     // dd(Socialite::driver($social)->user());
    //     $user = $this->createOrGetUser(Socialite::driver($social)->user(), $social);
    //     auth()->login($user);
    //     return redirect()->route('index');
    // }
 
    public function createOrGetUser($providerUser)
    {
        $user = User::where('email', $providerUser->getEmail())->first();

        if (empty($user)) {
            $user = User::create([
                'email' => $providerUser->getEmail(),
                'name' => $providerUser->getName(),
                'username' => $providerUser->getEmail(),
                'password' => '',
                'email' => $providerUser->getEmail(),
                'role' => 0,
                'created_at' => time(),
            ]);
        }

        return $user;
    }   

    
    public function faceCallback()
    {
        $user = $this->createOrGetUser(Socialite::driver('facebook')->user());
        auth()->login($user);
        return redirect()->route('index');
    }


    public function redirectToFace()
    {
        return Socialite::driver('facebook')->redirect();
    }
    
    public function updateInfoUser()
    {
        $user = User::find(\Auth::user()->id);
        $info_user = $user->infoUser; 
        $provinces = Province::all('id_province', 'str_province');
        // dump( $user, $info_user, $provinces);
        // \Session::flash('errors', 'This is a message!');
        // return view('admin.module.info_account.view')->with(compact('user'))->with(compact('info_user'));
        return view('admin.module.info_account.view', compact(['user', 'info_user', 'provinces']));
    }

    public function getDistrictByIdProvince(\Request $request, $id)
    {

        $districts = District::where('id_province', $id)->select('id_district', 'str_district')->get();
        return \Response::json(
            $districts
        ); 
    }
    
    public function getWardByIdDistrict(\Request $request, $id)
    {

        $wards = Ward::where('id_district', $id)->select('id_ward', 'str_ward')->get();
        return \Response::json(
            $wards
        ); 
    }
}
