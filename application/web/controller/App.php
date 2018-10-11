<?php
namespace app\web\controller;

use app\common\controller\ControllerBase;

/**
 * @property \app\wechat\model\User user
 */
class App extends ControllerBase
{
    public function _initialize(){
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
    
}
