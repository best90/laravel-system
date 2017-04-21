<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017-03-30
 * Time: 17:05
 */

namespace App\Sms;


class Template
{
    protected $template;

    public function __construct(array $data)
    {
        $this->template = $this->set($data);
    }

    protected function set(array $data){
        $data['type'] = $data['type'] ?? 0;

        switch ($data['type']){
            //报名
            case 1:
                $password = !empty($data['password']) ? '您的密码是'.$data['password'] : '';
                $content = '您好，'.$data['mobile'].'，'.$password.'请到xxx完成报名。以上短信由系统自动发出，请勿回复。【xx】';
                break;
            //注册
            case 2:
                $content = empty($data['password']) ? '（您的账号是'.$data['mobile'].'.）可以点击忘记密码去修改密码。【xx】' : '（您的账号是'.$data['mobile'].',密码是'.$data['password'].'.）【xx】';
                break;
            //评委邀请
            case 3:
                $accout = !empty($data['password']) ? '（您的账号是'.$data['mobile'].'.）可以点击忘记密码去修改密码。' : '（您的账号是'.$data['mobile'].',密码是'.$data['password'].'）';
                $content = $data['name'].'您好，'.$data['title'].'赛事邀请您担任比赛评委，请到'.$data['url'].' (仅限PC使用)来参与评分。'.$accout.'。以上短信由系统自动发出，请勿回复。【xx】';
                break;
            //验证码
            case 4:
                $content = '您好，感谢您注册xx，您的验证码为:'.$data['token'].'。以上短信由系统自动发出，请勿回复。【xx】';
                break;
            //重置密码
            case 5:
                $content = '您好，'.$data['mobile'].'，您的重置密码验证码是'.$data['token'].'以上短信由系统自动发出，请勿回复。【xx】';
                break;
            //自定义
            default:
                $content = $data['content'].' 【xx】';
        }

        return $this->template = $content;
    }

    public function get(){
        return $this->template;
    }
}