<?php
namespace app\wechat\controller;

use app\common\controller\ControllerBase;
use app\common\controller\JsonResult;

/**
 * 单页应用
 *
 * @property \app\wechat\model\User user
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
        $userData = $this->getSessionUserData();
    
        $action = $this->request->action();
        if (in_array($action, $this->noCheckUserDisStatusAction)) {
            return;
        }
        
        // freeze=1同时redis=1
        $redisData = \CacheBase::get($this->user->getWeChatCheckUserStatusKey($userData['user_id']));
        if ($redisData === 0){ // 通过
            \think\Session::set($this->user->getSessionUserDataKey() . '.freeze', $redisData);
        }else if ($redisData === 1){
            \think\Session::set($this->user->getSessionUserDataKey() . '.freeze', $redisData);
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
            return \WeChat\app::appInstance();
        }else if ($this->ifWeChatBrowser()){
            return \WeChat\app::weChatInstance();
        }else{
            return \WeChat\app::instance(2);
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
    	//app游客不登录访问接口
    	if (isAllowNoLogin()) {
    		//部分代码调用本方法后直接读取以下元素
    		return [
    				'user_id'=>2,
    				'open_id'=>0,
    				'alias'=>'',
    				'head_add'=>'',
    				'user_level'=>1,
    				'is_assistant'=>2,
    				'user_type'=>1,
    		];
    	}
    	
        $whereFunc = function (){
            $app = $this->getWeChatClass();
            $currentUserId = $this->user->getCurrentSessionUserId();
            if (!empty($currentUserId)) {
                $where = ['u.user_id' => ['eq', $currentUserId]];
            }else{
                $unionId = $app->getOauthUnionId();
                if (!empty($unionId)) {
                    $where = ['tl.union_id' => $unionId];
                }else{
                    \think\log::error('存在没有unionId的情况');
                    $openId = $app->getOauthOpenId();
                    if (empty($openId)){
                        \think\log::error('存在没有openId的情况');
                        $this->abortError(400);
                    }
                    $where = ['tl.open_id' => ['eq', $openId]];
                }
            }
    
            return $where;
        };

        return $this->user->getSessionUserData($whereFunc, $flush);
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
     * 判断当前用户是否是助教，true为是助教
     *
     * @param int $teacherId 判断当前用户是否是这个老师的助教
     * @return bool
     * @author aozhuochao
     */
    protected function ifAssistant($teacherId = 0)
    {
        $userData = $this->getSessionUserData();
    
        $bool = isset($userData['is_assistant']) && $userData['is_assistant'] == 1 ? true : false;
    
        $teacherId = intval($teacherId);
        $userId = $this->getUserId();
        
        if ($bool && !empty($teacherId) && $userId != $teacherId) {
            /** @var \app\wechat\model\UserAssistant $userAssistantModel */
            $userAssistantModel = model('UserAssistant');
            $bool = $userAssistantModel->checkUserManageTeacher($userId, $teacherId);
        }else if ($userId == $teacherId){ // 不能是自己的助教
            $bool = false;
        }
    
        return $bool;
    }
    
    
    
    /**
     * 获取用户的微信open_id
     *
     * @return int|mixed
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function getUserWeChatOpenId()
    {
        $userData = $this->getSessionUserData();
    
        return !empty($userData['open_id']) ? $userData['open_id'] : 0;
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
            $this->user->update(['invite_user_id' => $shareUserId], ['user_id' => $data['user_id']]);
        }
    }
    
    
}
