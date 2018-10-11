<?php

namespace app\wechat\hook;


class UserControllerHook
{
    
    
    /**
     * @param \app\wechat\controller\User $class
     * @author aozhuochao
     */
    public function local_apiSucJson_getPhoneVerifyCode($class)
    {
        $key = $this->common_apiSucJson_getPhoneVerifyCode($class);
        if ($key) {
            $redis = \CacheBase::redis();
            $redis->incr($key);
            $redis->setTimeout($key, strtotime('tomorrow'));
        }
        
    }
    
    /**
     * @param \app\wechat\controller\User $class
     * @author aozhuochao
     */
    public function check_apiSucJson_getPhoneVerifyCode($class)
    {
        $key = $this->common_apiSucJson_getPhoneVerifyCode($class);
        if ($key && \CacheBase::get($key) > 5) { // 获取验证码的次数大于5次
            \helper\ReflectionUtils::instance()->callClassMethodArray(
                [$class, 'abortError'], [\app\common\controller\JsonResult::ERR_PHONE_VERIFY_CODE_OFTEN]
            );
        }
    }
    
    /**
     * @param \app\wechat\controller\User $class
     * @author aozhuochao
     */
    protected function common_apiSucJson_getPhoneVerifyCode($class)
    {
        /** @var \think\Request $request */
        $request = request();
        $type = $request->param('type/i', 0);
    
        if ($type != 4){ // 目前只有4才用到
            return false;
        }
        
//        $class = is_array($class) ? current($class) : $class;
        $userId = \helper\ReflectionUtils::instance()->callClassMethodArray([$class, 'getUserId']);
        if (empty($userId)) {
            return false;
        }

        
        return \CacheBase::getCacheName(\app\common\helper\KeyList::REDIS_PHONE_VERIFY_CODE, $userId, $type);
    }

}