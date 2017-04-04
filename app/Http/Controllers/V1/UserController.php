<?php

namespace App\Http\Controllers\V1;

use App\Http\Api;
use App\Http\Controllers\Controller;
use App\Http\Model\Admin;

class UserController extends Controller
{
    /**
     * 用户登录
     * @param string $mobile
     * @param string $password
     * @return \Illuminate\Http\JsonResponse
     */
    public function login($mobile = '18396008401', $password = '123456'){
        if(!$mobile || !$password) return Api::output('PARAMETER_ERROR');

        $user = Admin::where('tel', $mobile)
            ->first();
        if(empty($user)) return Api::output('USER_NOT_EXISTS');
        if($user->pwd == md5($password)){
            $user->login_count = $user->login_count+1;
            $user->last_time = $user->login_time;
            $user->login_token = md5(time());
            $user->login_time = time();
            $user->token_exptime = time()+86400;
            $user->save();

            $data = [
                'user_id' => $user->id,
                'nick_name' => $user->nick_name,
                'phone' => $mobile,
                'email' => $user->email,
                'level' => $user->level,
                'login_count' => $user->login_count,
                'last_login_time' => $user->last_time,
                'login_token' => $user->login_token,
                'login_time' => $user->login_time,
                'token_expire_time' => $user->token_exptime,
            ];
            session($data);
            return Api::output('USER_PASS_SUCCESS', $data);
        }else{
            return Api::output('PASSWORD_ERROR');
        }
    }

    public function register(){

        $data = [

        ];

    }

    public function password(){

    }

    public function profile(){

    }
}