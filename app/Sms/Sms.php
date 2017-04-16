<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017-04-10
 * Time: 18:02
 */

namespace App\Sms;

use App\Http\Request;

class Sms
{
    protected $http;
    protected $config = [
        'host' => 'http://115.29.47.151:8860?',
        'username' => '600071',
        'password' => 'MJKIGWGHC7'
    ];

    public function __construct()
    {
        $this->http = new Request($this->config['host']);
    }

    public function send(array $data){
        $content = (new Template($data))->get();
        $content = mb_convert_encoding($content, 'utf-8', 'utf-8');

        $postData = [
            'cust_code' => $this->config['username'],
            'destMobiles' => $data['mobile'],
            'content' => $content,
            'sign' => md5(urlencode($content.$this->config['password'])),
        ];

        return $this->http->post('',$postData);
    }
}