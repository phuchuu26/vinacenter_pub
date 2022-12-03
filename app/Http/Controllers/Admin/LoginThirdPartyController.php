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
use App\Http\Requests\InfoUserRequest;
use App\Models\InfoUser;
use Validator;
use Input;
use Symfony\Polyfill\Intl\Idn\Info;

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
    // InfoUserRequest $request
    public function editInfoUser()
    {
        $user = User::find(\Auth::user()->id);
        $info_user = $user->infoUser; 
        $provinces = Province::all('id_province', 'str_province');
        return response()->view('admin.module.info_account.edit', compact(['user', 'info_user', 'provinces']));
        // return redirect()->route('login.edit_info_user')->with(['flash_level' => 'alert-danger','flash_message' => 'Cập nhật thất bại. Xin thử lại']);
        // return redirect()->back()->withInput()->withErrors($validator->messages());
        // \Session::flash('errors', 'This is a message!');
    }


    public function updateInfoUser(Request $request)
     {
        $params = $request->all();
        $validator = $this->_infoUserRule($params);
        
        if ($validator->fails()) {
            // return \Redirect::back()->withErrors($validator)->withInput(\Input::all());
            return redirect()->back()->withInput()->withErrors($validator->messages());
        }

        $update_info_user = $this->_updateInfoUser($params);


        return redirect()->route('login.edit_info_user')->with(['flash_level' => 'result_msg','flash_message' => 'Cập nhật thành công']);
        // return redirect()->route('login.edit_info_user')->with(['flash_level' => 'alert-danger','flash_message' => 'Cập nhật thất bại. Xin thử lại']);
        // return redirect()->back()->withInput()->withErrors($validator->messages());
        // \Session::flash('errors', 'This is a message!');
    }

    public function _updateInfoUser($params)
    {
        // dd($params);
        $user = \Auth::user();
        $user->name = data_get($params, 'name');
        // $user->email =  data_get($params, 'email');
        $user->save();

        if(empty($user->infoUser)){
            $info_user = new InfoUser();
        }else{
            $info_user = $user->infoUser;
        }

    	$info_user->id_user = $user->id;
    	$info_user->id_province = data_get($params, 'province');
    	$info_user->id_district = data_get($params, 'district');
    	$info_user->id_ward = data_get($params, 'ward');
    	$info_user->str_address = data_get($params, 'str_address');
    	$info_user->account_number = data_get($params, 'account_number');
    	$info_user->account_name = data_get($params, 'account_name');
    	$info_user->bank_name = data_get($params, 'bank_name');
    	$info_user->str_wallet_momo = data_get($params, 'str_wallet_momo');
    	$info_user->str_phone = data_get($params, 'str_phone');
        $info_user->str_email =  data_get($params, 'email');

    
    	$info_user->save();
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

    public function sendMailResetPassword()
    {
        return view('admin.mail.reset_password');
    }

    
     /**
     * Update bin validation
     * @param [array] $form_data
     * @return array
     * @author phucnh61
     */
    public function _infoUserRule($form_data, $bin = null)
    {
        // dd($form_data);
        $rules = [
            'name' => 'required',
            'str_phone' => 'required|regex:/(0)[0-9]/',
            'email' => 'required|email',
            'province' => 'required',
            'district' => 'required',
            'ward' => 'required',
            'str_address' => 'required',
            'account_number' => 'required',
            'account_name' => 'required',
            'bank_name' => 'required',
            'str_wallet_momo' => 'required',
        ];
        
        
        $check_exist_email = InfoUser::where('str_email', data_get($form_data, 'email'))->first();
        if(!empty($check_exist_email)){
            $user = \Auth::user();
            $info_user = $user->infoUser ?? null;
            if(!empty($info_user->str_email) &&  $info_user->str_email != data_get($form_data, 'email') ){
                $rules['email_exist'] = 'required';
            }
        }

        $messages = [
            'name.required' => 'Vui lòng nhập Họ tên.',
            'str_phone.required' => 'Vui lòng nhập Số điện thoại.',
            'str_phone.regex' => 'Vui lòng nhập đúng Số điện thoại.',
            'email.email' => 'Vui lòng nhập đúng email.',
            'email.required' => 'Vui lòng nhập email.',
            'email_exist.required' => 'Email không hợp lệ.',
            'province.required' => 'Vui lòng nhập Tỉnh.',
            'district.required' => 'Vui lòng nhập Quận, huyện.',
            'ward.required' => 'Vui lòng nhập Phường, xã.',
            'str_address.required' => 'Vui lòng nhập Số nhà.',
            'account_number.required' => 'Vui lòng nhập Số tài khoản.',
            'account_name.required' => 'Vui lòng nhập Tên chủ tài khoản.',
            'bank_name.required' => 'Vui lòng nhập Tên Ngân hàng.',
            'str_wallet_momo.required' => 'Vui lòng nhập số Ví điện tử Momo.',
        ];


        return Validator::make(
            $form_data,
            $rules,
            $messages
        );
    }

        // InfoUserRequest $request
        public function getInfoUser()
        {
            $user = User::find(\Auth::user()->id);
            $info_user = $user->infoUser; 
            $provinces = Province::all('id_province', 'str_province');
            return response()->view('admin.module.info_account.view', compact(['user', 'info_user', 'provinces']));
            // return redirect()->route('login.edit_info_user')->with(['flash_level' => 'alert-danger','flash_message' => 'Cập nhật thất bại. Xin thử lại']);
            // return redirect()->back()->withInput()->withErrors($validator->messages());
            // \Session::flash('errors', 'This is a message!');
        }
}
