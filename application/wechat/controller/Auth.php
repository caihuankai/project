<?php

namespace app\wechat\controller;

use app\common\controller\ControllerBase;

/**
 * 推流鉴权类
 * Class Auth
 * @package app\wechat\controller
 * Fashion:
 */
class Auth extends ControllerBase
{
    /**
     * 默认鉴权方法
     * @name  index
     * @author Lizhijian
     */
    public function index()
    {
        \think\Log::record([
            'ip' => request()->ip(),
            'url' => request()->url(),
            'params' => input(),
        ], 'request');

        $user = input('user');
        $passwd = input('passwd');

        if ($user == '99cj' && strstr($passwd, 'hc992017win')) {
            $content = 'auth ok user=' . $user . '  ' . 'passwd=' . $passwd . "\r\n";
            echo '{"code":0,"msg":"验证成功"}';
        } else {
            $content = 'auth fail user=' . $user . '  ' . 'passwd=' . $passwd . "\r\n";
            echo '{"code":1,"msg":"验证失败"}';
        }
        \think\Log::record($content, 'vauth');
    }
}