<?php
namespace app\wechat\controller;

use app\common\controller\ControllerBase;
use app\wechat\model\Liked as LikedM;

/**
 * 用户点赞
 * @author xiaok
 * @time 2017/08/08
 */
class Liked extends ControllerBase{
	public function index($live_id=1,$user_id=1706753){
		$live_id = (int)$live_id;
		$user_id = (int)$user_id;
		$LikedModel = new LikedM();
		$status = $LikedModel->index($live_id,$user_id);
		return $this->successJson($status);
	}
}