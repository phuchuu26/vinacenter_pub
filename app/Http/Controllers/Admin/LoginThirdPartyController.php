<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ImageEditRequest;
use App\Models\Image;
use App\Models\User;
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
        dd(23);
        return view('admin.blocks.notfind');
    }
}
