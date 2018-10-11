<?php

namespace app\wechat\event;


class AccessToken extends EventApp
{
    

    
    
    public function after_update($model)
    {
        $saveQuery = $this->getSaveFuncData($model);
    
        // 更新access_token
        if (isset($saveQuery['data']['access_token'])) {
            \think\Log::record('更新access_token：' . $saveQuery['data']['access_token'], 'debug');
            
            \app\wechat\model\AccessToken::$updateBool = false;
            
            \WeChat\app::weChatInstance()->access_token->setToken(
                $saveQuery['data']['access_token'],
                isset($saveQuery['data']['access_expires_time']) ?
                    $saveQuery['data']['access_expires_time'] + 1500 : // + 1500用于抵消- 1500
                    7200
            );
        }
    }
    
    
}