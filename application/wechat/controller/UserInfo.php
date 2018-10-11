<?php
namespace app\wechat\controller;

use think\config;
use app\wechat\model\PayOrder;
use app\wechat\model\User as MUser;
use app\wechat\model\UserPhone;
use app\common\controller\ControllerBase;
use app\wechat\model\ThirdLogin as MThirdLogin;

/**
 * 用户信息
 * @author xiaok
 * @time 2017/06/06
 */
class UserInfo extends App{
	//购买记录
	public function buyRecord(){
        /*
		$user_id = \think\Session::get('user_id');
		if(empty($user_id)){
			$user_id = 1706743;
		}
        */
		$userData = $this->getSessionUserData();
		$user_id = $userData['user_id'];
        
		$PayOrderModel = new PayOrder();
		$data = $PayOrderModel->buyRecord($user_id);
		return $this->successJson($data);
	}
	/**
	 * 用户是否需要绑定手机
	 * @return boolean [description]
	 */
	public function isBinding(){
		$user_id = $this->getUserId();
		$UserPhoneModel = new UserPhone();
		$info = $UserPhoneModel->where('user_id',$user_id)->find();
		$state = 0;
		if(empty($info)){
			$state = 1;
		}
		return $this->sucSysJson($state);
	}
	
	/**
	 * 用户是否绑定微信
	 * @return \think\response\Json
	 */
	public function isBindingWechat(){
		$userId = $this->getUserId();
		$thirdLoginModel = new MThirdLogin();
		$info = $thirdLoginModel->where('user_id', $userId)->find();
		$isBinding = false;
		if (isset($info['open_id']) && !empty($info['open_id'])) {
			$isBinding = true;
		}
		return $this->sucSysJson($isBinding);
	}

	/**
	 * 用户是否需要绑定手机---app登录时用
	 * @return boolean [description]
	 */
	public function appIsBinding(){
		$user_id = $this->getUserId();
		$thirdLoginModel = new MThirdLogin();
		$info = $thirdLoginModel->where('user_id', $user_id)->find();
		$state = 0;
		if(empty($info['login_tel'])){
			$state = 1;
		}
		return $this->sucSysJson($state);
	}
	
}