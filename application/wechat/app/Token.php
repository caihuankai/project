<?php

namespace app\wechat\app;


trait Token
{
    
    protected static $appUserSalt = 'app';
    
    
    /**
     * @param     $key
     * @param int $type 1为unionId，2为手机号
     * @param int $time
     * @return string
     */
    protected static function getAppToken($key, $type = 1, $time = 0)
    {
        if (empty($key)) {
            return '';
        }
        
        $time = $time ?: time();
        $md5 = md5(md5(var_export([self::$appUserSalt, __CLASS__, $key, $time], true)) . $time);
        return $md5 . $time . substr($md5, -5) . $type;
    }
    
    
    /**
     * 检测token
     *
     * @param $token
     * @return bool
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected static function checkAppToken($token)
    {
        if (empty($token)) {
            return false;
        }
        
        $sessionAppTokenTimeKey = 'app-token-time';
        /** @var \app\wechat\model\ThirdLogin $model */
        $model = model('ThirdLogin');
        $data = $model->where(['token' => $token])->field('id, union_id, login_tel')->find();
        if (empty($data) || (empty($data['union_id']) && empty($data['login_tel']))) {
            return false;
        }
        
        $type = substr($token, -1);
        $end = substr($token, -6, -1);
        $subToken = substr($token, 0, -5);
        if (empty($subToken)) {
            return false;
        }
        
        $createTime = intval(substr($subToken, strpos($subToken, $end) + strlen($end), -1));
        $sessionTime = \think\Session::get($sessionAppTokenTimeKey); // 第一次可能不存在
        $expireTime = strtotime(\app\wechat\controller\App::APP_EXPIRE_TIME);
        
        if ($createTime > 0 && $createTime > $expireTime && ($sessionTime< 1 || $sessionTime > $expireTime)){ // 更新时间
            \think\Session::set($sessionAppTokenTimeKey, time());
        }else{
            return false;
        }
    
        return self::getAppToken($type == 2 ? $data['login_tel'] :
                $data['union_id'], $type, $createTime) === $token;
    }
    
}