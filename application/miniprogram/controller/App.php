<?php
namespace app\miniprogram\controller;

use app\common\controller\ControllerBase;

/**
 * @property \app\miniprogram\model\User user
 */
class App extends ControllerBase
{
	/**
	 * Miniprogram过期时间
	 */
	const MINIPROGRAM_EXPIRE_TIME = '-30day';
	
    public function _initialize(){
    	$this->initMiniprogramRequest();
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
     * 小程序检测
     *
     * @author aozhuochao
     */
    protected function initMiniprogramRequest()
    {
    	\think\Log::record([
    			'小程序请求',
    			$this->request->header('mobile', ''),
    			$this->request->header('token', ''),
    			$this->request->header('version', ''),
    	], 'request');
    	
    	$this->initMiniprogramSessionId($this->getMiniprogramRequestToken());
    }
    
    /**
     * 获取请求参数里的token的值
     *
     * @return mixed
     * @author aozhuochao
     */
    protected function getMiniprogramRequestToken()
    {
    	$request = $this->request;
    	$token = $request->header('token', '');
    	if (empty($token)) {
    		$token = $request->param('token', '');
    	}
    	
    	return $token;
    }
    
    protected function initMiniprogramSessionId($token, $copy = true)
    {
    	if (empty($token)) {
    		return;
    	}
    	
    	\think\Config::set('session.id', $token);
    	\think\Config::set('session.expire', time() - strtotime(self::MINIPROGRAM_EXPIRE_TIME));
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
    
}
