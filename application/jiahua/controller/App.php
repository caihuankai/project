<?php
namespace app\jiahua\controller;

use app\common\controller\ControllerBase;
use app\common\controller\JsonResult;

/**
 * 单页应用
 *
 * @property \app\jiahua\model\UserJiahua userJiahua
 * @author scan<232832288@qq.com>
 *
 */
class App extends ControllerBase
{
    
    use \app\wechat\traits\Common;
    
    /**
     * APP过期时间
     */
    const APP_EXPIRE_TIME = '-30day';
    

    protected $defaultErrFuncTrait = 'errSysJson';
    
    
    /**
     * 不用登录的方法
     */
    protected $noLoginAction = [];
    
    
    /**
     * 直接显示页面（需要登录）
     * 登录操作中不需要返回ajax的请求
     *
     * @var array
     */
    protected $loginNoAjaxAction = [];
    
    
    /**
     * 不需要检测用户是否禁用的方法
     *
     * @var array
     */
    protected $noCheckUserDisStatusAction = [];
    
    
    
    
    
    protected function _initialize()
    {
        // sudo tail -f /www/talk/runtime/log/2017`date +%m/%d`_request.log \r
        \think\Log::record([$this->request->post()], 'request');
    
        $this->initAppRequest();
        
        $action = $this->request->action();
        
        if ( ( empty($this->noLoginAction) || !in_array($action, $this->noLoginAction) ) && !isAllowNoLogin()){ // 需要登录		//isAllowNoLogin:app游客不登录访问接口
            $app = $this->getWeChatClass();
    
            if ($this->loginNoAjaxAction && in_array($action, $this->loginNoAjaxAction)) {
                $app->setAjaxBool(false); // 不是ajax请求
            }
            
            $this->loginCheckAppToken();
            $this->checkUserLoginStatus();
            $this->updateCodeTime();
        }
        
        $this->autoHook();
    }
    
    
    protected function autoHook()
    {
        $class = '\\' . str_replace('\\controller\\', '\\hook\\', static::class) . 'ControllerHook';
        \helper\ReflectionUtils::instance()->getPublicMethodByClass($class, function (\ReflectionMethod $reflectionMethod, $class){
    
            \think\Hook::add($reflectionMethod->getName(), $reflectionMethod->getClosure($class));
        });
    }
    
    
    
    /**
     * 检测用户是否被禁用
     *
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function checkUserLoginStatus()
    {
    	$currentUserId = $this->userJiahua->getCurrentSessionUserId();
    	$sessionJiahuaKeyMap = $this->handleSessionJiahuaKeyMap($currentUserId);
    	if ($sessionJiahuaKeyMap['sessionID'] == session_id()) {
    		//刷新账号有效登录时间
    		$this->handleSessionJiahuaKeyMap($currentUserId, true);
    	}else {
	    	//登录已被覆盖则销毁session
    		\think\Session::destroy();
    	}
    	
        $userData = $this->getSessionUserData();
    
        $action = $this->request->action();
        if (in_array($action, $this->noCheckUserDisStatusAction)) {
            return;
        }
        
        // freeze=1同时redis=1
        $redisData = \CacheBase::get($this->userJiahua->getWeChatCheckUserStatusKey($userData['user_id']));
        if ($redisData === 0){ // 通过
            \think\Session::set($this->userJiahua->getSessionUserDataKey() . '.freeze', $redisData);
        }else if ($redisData === 1){
            \think\Session::set($this->userJiahua->getSessionUserDataKey() . '.freeze', $redisData);
            // 目前只有ajax返回
            abort($this->errSysJson(JsonResult::ERR_USER_DIS));
        }else if (!empty($userData['freeze'])){
            // 目前只有ajax返回
            abort($this->errSysJson(JsonResult::ERR_USER_DIS));
        }
    }
    
    
    /**
     * 是否app请求
     *
     * @return bool
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function ifAppRequest()
    {
        $request = request();
        $mobile = intval($request->header('mobile', 0));
        
        return in_array($mobile, [1, 2]);
    }
    
    /**
     * 检测是否微信浏览器访问
     *
     * @return bool
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function ifWeChatBrowser()
    {
        return stripos($this->request->server('HTTP_USER_AGENT', ''), 'micromessenger') !== false;
    }
    
    
    /**
     * 获取app版本
     *
     * @return bool
     * @author aozhuochao
     */
    protected function getAppVersion()
    {
        $request = request();
        $version = intval($request->header('version', 0));
    
        return $version;
    }
    
    
    /**
     * app检测
     *
     * @author aozhuochao
     */
    protected function initAppRequest()
    {
        if (!$this->ifAppRequest()){
            return;
        }
    
        \think\Log::record([
            'app请求',
            $this->request->header('mobile', ''),
            $this->request->header('token', ''),
            $this->request->header('version', ''),
        ], 'request');
        
        $this->initAppSessionId($this->getAppRequestToken());
        
        
    }
    
    
    protected function loginCheckAppToken()
    {
        if (!$this->ifAppRequest()){
            return;
        }
        
        if (!\app\wechat\controller\User::checkAppToken($this->getAppRequestToken())){ // 检测token
            $app = $this->getWeChatClass();
            $app->setAjaxBool();
            $app->getOauthData(true); // 抛出未登录错误
        }
    }
    
    
    protected function initAppSessionId($token, $copy = true)
    {
        if (empty($token)) {
            return;
        }
        
        \think\Config::set('session.id', $token);
        \think\Config::set('session.expire', time() - strtotime(self::APP_EXPIRE_TIME));
        \think\Config::set('session.prefix', 'app');
        \think\Session::boot();
        $sessionId = session_id();
        if (!empty($sessionId) && $sessionId !== $token){ // 已经初始化
            $session = \think\Session::get();
//            \think\Session::pause();
            \think\Session::destroy();
            session_register_shutdown();
            session_id($token);
            
            if ($copy){
                foreach ($session as $key => $item) {
                    \think\Session::set($key, $item);
                }
            }
            
        }
    }
    
    
    
    /**
     * @return \WeChat\app
     * @author aozhuochao
     */
    protected function getWeChatClass()
    {
        if ($this->ifAppRequest()){ // app请求
        	return \WeChat\appJiahua::appInstance();
        }else if ($this->ifWeChatBrowser()){
        	return \WeChat\appJiahua::weChatInstance();
        }else{
        	return \WeChat\appJiahua::instance(2);
        }
    }
    
    
    /**
     * 获取请求参数里的token的值
     *
     * @return mixed
     * @author aozhuochao
     */
    protected function getAppRequestToken()
    {
        $request = $this->request;
        $token = $request->header('token', '');
        if (empty($token)) {
            $token = $request->param('token', '');
        }
        
        return $token;
    }
    
    
    
    /**
     * 更新用户的code_time
     *
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function updateCodeTime()
    {
        // 不校验code_time
        $time = time();
        $addTime = 7200;
        $userId = $this->getUserId();
        if (empty($userId)) {
            return;
        }
        
        $token = md5($userId . $time);
        $tokenTime = $time + $addTime;
        $data['code_time'] = date('Y-m-d H:i:s', $tokenTime);
    
        $codeTime = \think\Session::get('updateCodeTime');
        if ($codeTime < $time) { // session内的时间过了就更新code
            $data['code'] = $token;
        }
        
        /** @var \app\wechat\model\User $model */
        $model = model('wechat/User');
        $model->update($data, ['user_id' => ['eq', $userId]]);
    }
    
    
    protected function getSessionUserData($flush = false)
    {
        $whereFunc = function (){
        	$currentUserId = $this->userJiahua->getCurrentSessionUserId();
        	if (!empty($currentUserId)) {
                $where = ['user_id' => ['eq', $currentUserId]];
            }else{
            	abort($this->errSysJson(\app\common\controller\JsonResult::ERR_NOT_LOGIN));
            }
    
            return $where;
        };

        return $this->userJiahua->getSessionUserData($whereFunc, $flush);
    }
    
    /**
     * 用户的sessionJiahua版本时间
     *
     * @return string|bool
     */
    protected function handleSessionJiahuaKeyMap($userId, $set = null)
    {
    	$rootKey = __METHOD__;
    	$redis = \CacheBase::redis();
    	if (!is_null($set)) { // 设置
    		$redis->hSet($rootKey, $userId . '_sessionID', $set === true ? session_id() : $set);
    		$redis->hSet($rootKey, $userId . '_lastTime', $set === true ? time() : $set);
    		
    		return true;
    	}
    	
    	$result = [
    			'sessionID'=>$redis->hGet($rootKey, $userId . '_sessionID'),
    			'lastTime'=>$redis->hGet($rootKey, $userId . '_lastTime')
    	];
    	// 返回key
    	return $result;
    }
    
    
    /**
     * 获取用户id
     *
     * @return int|mixed
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function getUserId()
    {
        $userData = $this->getSessionUserData();
    
        return !empty($userData['user_id']) ? $userData['user_id'] : 0;
    }
    
    
    /**
     * 获取用户级别
     *
     * @return int|mixed
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function getUserLevel()
    {
        $userData = $this->getSessionUserData();
    
        return isset($userData['user_level']) ? $userData['user_level'] : 1;
    }
    
    
    /**
     * 检测老师权限，直接报错
     *
     * @param int $userId
     * @param int|string $type
     * @author aozhuochao
     */
    protected function checkTeacherPermissions($userId, $type, $error = JsonResult::ERR_NOT_PERMISSIONS)
    {
        static $userArr = [];
        if (isset($userArr[$userId . $type])) { // 防止重复检测
            return;
        }
        
        $userArr[$userId . $type] = $userId;
        /** @var \app\wechat\model\UserPermissions $permissionsModel */
        $permissionsModel = model('UserPermissions');
        // 检测当前用户权限
        if (!$permissionsModel->checkTeacherPermissions($userId, $type)){
            $this->abortError($error);
        }
    }
    
    
    
    
    
    
    /**
     * @inheritdoc
     */
    protected function filterRepeatPost($key = 0, $addTime = 1)
    {
        parent::filterRepeatPost(empty($key) ? $this->getUserId() : $key, $addTime);
    }
    
    
    /**
     * 处理分享盆友和分享盆友圈的邀请人
     *
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function handleShareUser()
    {
        $shareUserId = $this->request->get('shareUserId/i', '');
        if (empty($shareUserId)){
            return;
        }
        
        $data = $this->getSessionUserData();
    
        if (empty($data['invite_user_id'])) { // 更新邀请人
        	$this->userJiahua->update(['invite_user_id' => $shareUserId], ['user_id' => $data['user_id']]);
        }
    }
    
    
}
