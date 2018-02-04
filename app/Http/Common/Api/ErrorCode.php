<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017-03-29
 * Time: 10:05
 */

namespace App\Http\Common\Api;

class ErrorCode
{
    //项目通用
    const SUCCESS = 0;
    const DATA_EXISTS = 1;
    const DATA_NOT_EXISTS = 2;
    const DATA_TYPE_ERROR = 3;
    const DATA_ASSOCIATED_LOSS = 4;
    const TOKEN_ERROR = 5;
    const TOKEN_EXPIRE = 6;
    const DELETE_SUCCESS = 7;
    const ADD_SUCCESS = 8;
    const UPDATA_SUCCESS = 9;

    //用户相关 10-19
    const USER_PASS_SUCCESS = 10;
    const PASSWORD_ERROR = 11;
    const VERIFY_CODE_ERROE = 12;

    //报名相关
    const INFO_MODIFY_SUCCESS = 20;
    const INFO_MODIFY_FAILED = 21;
    
    const REQUEST_NOT_FOUND = 98;
    const UNKNOWN = 99;

    //通用
    const INTERNAL_ERROR = 1001;
    const OUT_OF_SERVICE = 1002;
    const UNDEFINED_SERVICE = 1003;
    const SERVER_BUSY = 1004;
    const SERVER_COMMUNICATION_ERROR = 1005;
    const PARAMETER_ERROR = 1006;
    const VALIDATE_ERROR = 1007;
    const NO_PRIVILEGE = 1008;
    const RESERVED = 1009;
    const APPKEY_VERIFY_ERROR = 1010;
    const VIOLATE_POLICY = 1011;
    const USER_NOT_EXISTS = 1012;
    const USER_ALREADY_EXISTS = 1013;
    const BP_NOT_EXISTS = 1014;
    const BP_ALREADY_EXISTS = 1015;
}