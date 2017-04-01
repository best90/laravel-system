<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017-03-29
 * Time: 11:01
 */

namespace App\Http;

use App\Exceptions\HttpStatus;

class Api
{
    public static $httpCode = 200;

    public static function toApiData(string $msg = 'UNKNOWN', array $data = []):array {
        self::$httpCode = HttpStatus::getCode($msg);
        return [
            'code' => constant('App\Exceptions\ErrorCode::'.$msg),
            'data' => $data,
            'msg' => constant('App\Exceptions\Message::'.$msg)
        ];
    }

    public static function output(string $msg = 'UNKNOWN', array $data = []){
        return response()->json(self::toApiData($msg,$data), self::$httpCode);
    }
}