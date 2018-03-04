<?php

namespace App\Http\Common;

class Request
{
    public $host;
    public $header;

    public function __construct(string $host,array $header = [])
    {
        $this->host = $host ?? 'http://127.0.0.1/';
        $this->header = $header ?? ['Cache-Control:no-cache'];
    }

    /**
     * @param string $path
     * @param array $data
     * @return mixed
     */
    public function post(string $path = '', array $data = [])
    {
        $url = $this->host.$path;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        $api_data = curl_exec($ch);
        curl_close($ch);

        return json_decode($api_data,true);
    }

    /**
     * @param string $path
     * @return mixed
     */
    public function get(string $path = '')
    {
        $url = $this->host.$path;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $api_data = curl_exec($ch);
        curl_close($ch);

        return json_decode($api_data,true);
    }
}