<?php

namespace App\Http\Common;


use App\Http\Common\Api\HttpStatus;

class Api
{
    public static $httpCode = 200;

    /**
     * @param string $msg
     * @param array $data
     * @return array
     */
    public static function toApiData(string $msg = 'UNKNOWN', array $data = []):array {
        self::$httpCode = HttpStatus::getCode($msg);
        return [
            'code' => constant('App\Http\Common\Api\ErrorCode::'.$msg),
            'data' => $data,
            'msg' => constant('App\Http\Common\Api\Message::'.$msg)
        ];
    }

    /**
     * @param string $msg
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public static function output(string $msg = 'UNKNOWN', array $data = []){
        return response()->json(self::toApiData($msg,$data), self::$httpCode);
    }
}