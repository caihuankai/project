<?php
namespace app\wechat\controller;

use app\wechat\model\WechatPersonalUser;
use app\common\controller\ControllerBase;

/**
 * 微信个人账号用
 */
class PersonalWechat extends ControllerBase{
	/**
	 * 用户保存
	 * @param  [type] $startDate    [时间]
	 * @param  [type] $fromusername [用户名]
	 * @param  [type] $fromnickname [昵称]
	 */
	public function saveUser($startDate,$fromusername,$fromnickname){
		if(empty($startDate) || empty($fromusername) || empty($fromnickname)){
			return $this->errSysJson('参数错误');
		}
		$WechatPersonalUser = new WechatPersonalUser();
		//用户不重复
		$data['fromusername'] = $fromusername;
		$data['fromnickname'] = $fromnickname;
		$exist = $WechatPersonalUser->where($data)->find();
		if(!empty($exist)){
			return $this->errSysJson('用户已存在');
		}
		$data['startDate'] = $startDate;
		$status = $WechatPersonalUser->insert($data);
		if($status){
			return $this->sucSysJson('保存成功');
		}
	}
	/**
	 * 获取用户信息
	 * @param  [type] $fromusername [description]
	 * @return [array]               [description]
	 */
	public function getUserInfo($fromusername){
		if(empty($fromusername)){
			return $this->errSysJson('参数错误');
		}
		$WechatPersonalUser = new WechatPersonalUser();
		$data = $WechatPersonalUser->field('fromnickname,fromusername,startDate')->where('fromusername',$fromusername)->find();
		return $this->sucSysJson($data);
	}
}