<?php
namespace app\jiahua\controller;

class Login extends App
{
	/**
	 * 不用登录的方法
	 */
	protected $noLoginAction = [
			'login',
			'autoLogin',
			'registerUser',
			'getWXLoginUrl'
	];
	
	/**
	 * 家华直播账号登录
	 */
	public function login()
	{
		$request = $this->request;
		$loginName = trim($request->post('loginName', ''));
		$password = $request->post('password', '');
		
		$currentUserId = $this->userJiahua->getCurrentSessionUserId();
		if (!empty($currentUserId)) {
			return $this->sucSysJson('已登录');
		}
		
		if (empty($loginName)) {
			abort($this->errSysJson(\app\common\controller\JsonResult::ERR_USERINFO_NULL));
		}elseif (empty(trim($password))) {
			abort($this->errSysJson(\app\common\controller\JsonResult::ERR_PASSWORD));
		}
		
		$userModel = $this->userJiahua;
		$userInfo = $userModel->where('login_name', $loginName)->where('dataFlag', 1)->where('freeze', 0)->find();
		if (empty($userInfo)) {
			return $this->errSysJson(\app\common\controller\JsonResult::ERR_USERINFO_NULL);
		}elseif ($userInfo['password'] != $password) {
			return $this->errSysJson(\app\common\controller\JsonResult::ERR_PASSWORD);
		}
		
		$sessionJiahuaKeyMap = $this->handleSessionJiahuaKeyMap($userInfo['user_id']);
		//账号对应用户在直播间中无法重复登录。
		//已登录账户10分钟内没活动才能登录
		//($sessionJiahuaKeyMap['sessionID'] != session_id() && time() <= $sessionJiahuaKeyMap['lastTime'] + 600)
		if ( $userInfo['current_room_id'] == 1000010029 ) {
			return $this->errSysJson('该账号已登录，无法重复登录');
		}
		
		$this->registerUserSuccessFunc($userInfo['user_id'], null);
		
		return $this->sucSysJson('登录成功');
	}
	
	/**
	 * 自动登录，获取空闲账号分配给用户使用
	 * @return \think\response\Json
	 */
	public function autoLogin()
	{
		$currentUserId = $this->userJiahua->getCurrentSessionUserId();
		if (!empty($currentUserId)) {//已登录直接返回userId
			return $this->sucSysJson(['userId'=>$currentUserId]);
		}
		
		$groupArr = [
			'81', '82', '91', '92', '93'	
		];
		
		$randGroup = $groupArr[rand(0,4)] * 10000;
		$randTail = rand(0, 9900);
		
		$userModel = $this->userJiahua;
		//获取不在直播间的空闲账号
		$userInfo = $userModel->where('user_id', '>=', $randGroup + $randTail)->where('current_room_id', 0)->where('dataFlag', 1)->where('freeze', 0)->find();
		if (empty($userInfo)) {
			return $this->errSysJson('登录上限已满，请稍后重试');
		}else {
			$this->registerUserSuccessFunc($userInfo['user_id'], null);
			return $this->sucSysJson(['userId'=>$userInfo['user_id']]);
		}
	}
	
	/**
	 * 自动注册用户，微信code登录
	 */
	public function registerUser()
	{
		$app = $this->getWeChatClass();
		
		try{
			$userData = $app->weChatOAuthUser();
		}catch (\Exception $exception){
			\think\log::error('code拉取报错' . $exception->getMessage());
			return $this->errSysJson('code拉取报错');
		}
		
		$model = $this->userJiahua;
		
		/** @var \app\jiahua\model\ThirdLoginJiahua $loginModel */
		$loginModel = model('ThirdLoginJiahua');
		$unionId = $userData->getOriginal()['unionid'];
		$mysqlUser = $loginModel->checkExistByWeChatUnionId($unionId, 'user_id, pc_open_id, union_id');
		
		//正常的微信登录
		if (empty($mysqlUser)) { // 创建用户
			$mysqlUser['user_id'] = $model->insertInWeChat(
					$app->getOauthUserData(),
					'pc_open_id'
					);
			$mysqlUser['union_id'] = $unionId;
		}else if (empty($mysqlUser['pc_open_id']) && !$this->ifWeChatBrowser()){ // 更新pc_open_id
			$loginModel->update(['pc_open_id'=> $userData->getId()], ['user_id' => $mysqlUser['user_id']]);
		}
		
		//登录操作
		$this->registerUserSuccessFunc($mysqlUser['user_id'], $userData);
		
		try{
			$redirectKey = $app->redirectKey;
			$redirectUrl = request()->param($redirectKey, ''); // 指定会跳地址
			if (!empty($redirectUrl)) {
				$this->redirect($redirectUrl);
			}else {//默认主页
				$redirectUrl = $this->getRedirectUrl();
				$this->redirect($redirectUrl);
			}
		}catch (\Exception $exception){ // 访问api.weixin.qq.com偶尔会报错
			if ($exception instanceof \think\exception\HttpResponseException){ // 正确抛出 继续抛出
				throw $exception;
			}else{
				\think\log::error('访问api.weixin.qq.com偶尔会报错');
				$this->redirect($this->getRedirectUrl());
			}
		}
		
		return $this->errSysJson('未知错误');
	}
	
	/**
	 * 登录处理
	 */
	protected function registerUserSuccessFunc($userId, $oAuthData)
	{
		$model = $this->userJiahua;
		// 登录成功后更新字段
		$model->update(['last_login_time' => date('Y-m-d H:i:s')], ['user_id' => $userId]);
		
		if (!empty($oAuthData)) {
			\think\Session::set('weChat_user', $oAuthData);
		}
		
		$this->userJiahua->setCurrentSessionUserId($userId);
		//刷新账号有效登录时间
		$this->handleSessionJiahuaKeyMap($userId, true);
		
		$this->getSessionUserData(true); // 生成session的用户数据
	}
	
	protected function getRedirectUrl()
	{
		$url = \think\Session::get('registerUserRedirectUrl');
		if (empty($url)) {
			$url = '/#/';
		}
		
		return $url;
	}
	
	/**
	 * 检查是否登录，groupId=0是微信登录，1-5是临时登录
	 * @return \think\response\Json
	 */
	public function checkLogin()
	{
		$userData = $this->getSessionUserData();
		$result = [
				'userId'=>$userData['user_id'],
				'alias'=>$userData['alias'],
				'head_add'=>$userData['head_add'],
				'groupId'=>$userData['groupid']
		];
		//app\jiahua\controller\App 已验证
		return $this->sucSysJson($result);
	}
	
	/**
	 * 检查微信是否登录中
	 * @return \think\response\Json
	 */
	public function getWXLoginUrl()
	{
		$app = $this->getWeChatClass();
		$app->getOauthData();//内部检查是否登录，未登录抛出错误
		return $this->sucSysJson('微信登录中');
	}
	
	/**
	 * 退出微信登录并重新执行临时登录
	 * @return \think\response\Json
	 */
	public function exitWXLogin()
	{
		\think\Session::destroy();
		return $this->autoLogin();
	}
	
	
}