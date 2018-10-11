<?php

namespace app\wechat\traits;


trait Verify
{
    
    /**
     * 2为直播间申请，1为流量主申请， 3为app注册，4为购买课程后
     *
     * @var array
     */
    protected $verifyTypeMap = [
        '',
        '_flowUser',
        '_liveUser',
        '_appUser',
        '_buyCourseAfter'
    ];
    
    
    /**
     * @param int $type
     * @return string
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function disVerifyTypeKey($type = 0)
    {
        return isset($this->verifyTypeMap[$type]) ? $this->verifyTypeMap[$type] : '';
    }
    
    
    
    protected function getVerifyTypeTimeKey($type = 0, $phone = '')
    {
        return 'VerifyCode_userPhone_Time' . $this->disVerifyTypeKey($type) . '_' . $phone;
    }
    
    
    protected function getVerifyTypeKey($type = 0, $phone = '')
    {
        return 'VerifyCode_userPhone' . $this->disVerifyTypeKey($type) . '_' . $phone;
    }
    
    
    /**
     * 验证码过滤
     *
     * @param int $type
     * @author aozhuochao
     */
    protected function checkVerifyByType($type)
    {
        $str = $this->disVerifyTypeKey($type);
    
        if (empty($str)) {
            $this->abortError($this->errSysJson(\app\common\controller\JsonResult::ERR_PARAMETER));
        }
        /** @var \think\Request $request */
        $request = $this->request;
        $code = $request->param('code', '');
        $phone = $request->param('phone', '');
    
        if (empty($code)) {
            $this->abortError($this->errSysJson('验证码必填'));
        }
        
        if (!WIsPhone($phone)){ // 验证手机号
            $this->abortError($this->errSysJson(\app\common\controller\JsonResult::ERR_PHONE));
        }
    
        $sessionKey = $this->getVerifyTypeKey($type, $phone);
        $sessionTimeKey = $this->getVerifyTypeTimeKey($type, $phone);
        
        $sessionCode = (string)session($sessionKey);
        
        if (empty($sessionCode)) {
            $this->abortError($this->errSysJson('验证码未获取'));
        }else if ($sessionCode !== $code){
            $this->abortError($this->errSysJson('验证码错误'));
        }
        
        if (time() > session($sessionTimeKey) + 600) {
            $this->abortError($this->errSysJson('验证码已过期'));
        }
        
        // 验证成功立即删除
        session($sessionKey, null);
        session($sessionTimeKey, null);
    }
    
    
}