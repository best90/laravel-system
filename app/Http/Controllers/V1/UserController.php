<?php

namespace App\Http\Controllers\V1;

use App\Http\Common\Api;
use App\Http\Controllers\Controller;
use App\Http\Model\User;
use App\Sms\Sms;

class UserController extends Controller
{
    protected $sms;

    public function __construct(Sms $sms)
    {
        $this->sms = $sms;
    }

    /**
     * 用户登录
     * @param string $mobile
     * @param string $password
     * @return \Illuminate\Http\JsonResponse
     */
    public function login($mobile = '18396000000', $password = '123456')
    {
        if(!$mobile || !$password) return Api::output('PARAMETER_ERROR');

        $user = User::where('mobile', $mobile)
            ->first();
        if(empty($user)) return Api::output('USER_NOT_EXISTS');
        if($user->password == md5($password)){
            $user->last_time = $user->login_time;
            $user->login_token = md5(time());
            $user->login_time = time();
            $user->expire_time = time() + 24*60*60;
            $user->save();

            $data = [
                'user_id' => $user->id,
                'user_name' => $user->user_name,
                'mobile' => $mobile,
                'email' => $user->email,
                'last_login_time' => $user->last_time,
                'login_token' => $user->login_token,
                'login_time' => $user->login_time,
                'expire_time' => $user->expire_time,
            ];
            session($data);
            return Api::output('USER_PASS_SUCCESS', $data);
        }
        return Api::output('PASSWORD_ERROR');
    }

    public function register()
    {
    }

    public function password()
    {
    }

    public function profile()
    {
    }
}