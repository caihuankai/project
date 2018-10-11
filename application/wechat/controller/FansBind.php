<?php

namespace app\wechat\controller;

use app\common\controller\ControllerBase;
use app\common\model\Fans;

/**
 * 粉丝相关操作
 */
class FansBind extends ControllerBase{
	/**
	 * [bind description]
	 * @param  [type] $user_id 邀请人id
	 * @param  [type] $fans_id 粉丝id
	 * @return [type]          [description]
	 */
	public function bind($user_id=1706753,$fans_id=1706743){
		$user_id = (int)$user_id;
		$fans_id = (int)$fans_id;
		if($user_id == $fans_id){
			return;
		}
		$FansModel = new Fans();
		$FansModel->bindFans($user_id,$fans_id);
	}
}