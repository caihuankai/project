<?php

namespace app\wechat\app;


/**
 * Trait App
 *
 * @property \app\wechat\model\User user
 * @package app\wechat\app
 */
trait App
{
    
    
    /**
     * 检测手机号和密码的公共代码
     *
     * @return array
     * @author aozhuochao
     */
    protected function checkPhoneRequest()
    {
        /** @var \think\Request $request */
        $request = $this->request;
        $phone = (string)trim($request->post('phone', ''));
        $password = (string)$request->post('password', '123456');
    
        if (empty(trim($password))) {
            abort($this->errSysJson(\app\common\controller\JsonResult::ERR_PASSWORD));
        }
    
        if (!WIsPhone($phone)){
            abort($this->errSysJson('手机号错误'));
        }
    
        /** @var \app\wechat\model\ThirdLogin $loginModel */
        $loginModel = model('wechat/ThirdLogin');
        $loginData = $loginModel->where(['login_tel' => $phone])->field('id, user_id')->find();
        
        return [$phone, $password, $loginData];
    }
    
    
    
    /**
     * 创建手机号用户
     *
     * @return int
     * @author aozhuochao
     */
    public function registerUserByPhone()
    {
    	//TODO IOS验证，暂不做验证码校验
        $this->checkVerifyByType(3);
        list($phone, $password, $loginData) = $this->checkPhoneRequest();
        
        if (!empty($loginData)){
//             abort($this->errSysJson('手机号已存在'));
            $this->appPhoneLogin();
        }

        
        $userId = $this->user->insertInWeChat([
            'loginTel' => $phone,
            'password' => $this->user->encryptPassword($password),
        ]);
        
        
        $this->registerUserAppLoginSuccess($this->getAppToken($phone, 2), $userId);
        
        // 不会走到这
        return 1;
    }
    
    
    /**
     * app退出接口
     *
     * @return mixed
     * @author aozhuochao
     */
    public function appQuit()
    {
        /** @var \app\wechat\model\ThirdLogin $loginModel */
        $loginModel = model('wechat/ThirdLogin');
        $loginModel->update(['token' => ''], ['user_id' => $this->getUserId()]);
        
        return $this->sucSysJson(1);
    }
    
    
    /**
     * app手机登录
     *
     * @return int
     * @author aozhuochao
     */
    public function appPhoneLogin()
    {
        list($phone, $password, $loginData) = $this->checkPhoneRequest();
    
        if (empty($loginData)) {
            return $this->errSysJson('手机号未注册');
        }
    
        /** @var \app\wechat\model\User $userModel */
        $userModel = $this->user;
        $userData = $userModel->getInfoById($loginData['user_id'], 'password');
    
        if (empty($userData['password']) || $userData['password'] !== $this->user->encryptPassword($password)) {
            return $this->errSysJson(\app\common\controller\JsonResult::ERR_PASSWORD);
        }
    
    
        $this->registerUserAppLoginSuccess($this->getAppToken($phone, 2), $loginData['user_id']);
        
        return 1;
    }
    
    
    
    /**
     * 手机号注册获取验证码
     *
     * @return mixed
     * @author aozhuochao
     */
    public function getRegisterUserVerifyCode()
    {
        \think\Session::boot();
        $this->filterKey = session_id(); // 让cookie作为时间过滤的条件
        return $this->getPhoneVerifyCode(3);
    }
    
    
}