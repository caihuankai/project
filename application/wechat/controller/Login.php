<?php

namespace app\wechat\controller;


class Login extends App
{
    
    
    public function index()
    {
        $app = \WeChat\app::instance();
    
        $oauth = $app->oauth;
        $oauth->scopes(['snsapi_login']);
        $oauth->setRedirectUrl(url('callback', '', true, true));
    
        return $oauth->redirect();
    }
    
    
    public function callback()
    {
        echo '登录中';
    }
    
    
}