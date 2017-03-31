<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017-03-29
 * Time: 10:47
 */

namespace App\Exceptions;


class HttpStatus
{
    const HTTP_OK = 200;
    const HTTP_CREATED = 201;
    const HTTP_NO_CONTENT = 204;
    const HTTP_BAD_REQUEST = 400;
    const HTTP_UNAUTHORIZED = 401;
    const HTTP_FORBIDDEN = 403;
    const HTTP_NOT_FOUND = 404;
    const HTTP_SERVER_ERROR = 500;
    const HTTP_SERVER_UNAVAILABLE = 503;

    public static function getCode(string $msg){
        $errorCode = constant('App\Exceptions\ErrorCode::'.$msg);

        switch ($errorCode){
            case 0:
                return self::HTTP_OK;
                break;
            case 7:
                return self::HTTP_NO_CONTENT;
                break;
            case 1001:
                return self::HTTP_SERVER_ERROR;
                break;
            case 1008:
                return self::HTTP_FORBIDDEN;
                break;
            default:
                if(in_array($errorCode,[8,9,10,20])) return self::HTTP_CREATED;
                if(in_array($errorCode,[5,6,1007,1010])) return self::HTTP_UNAUTHORIZED;
                if(in_array($errorCode,[2,98,1012,1014])) return self::HTTP_NOT_FOUND;
                if(in_array($errorCode, [1002,1003,1004,1005])) return self::HTTP_SERVER_UNAVAILABLE;
        }

        return self::HTTP_BAD_REQUEST;
    }
}