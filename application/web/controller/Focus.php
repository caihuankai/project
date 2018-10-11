<?php
namespace app\web\controller;

use think\config;
use app\wechat\model\LiveFocus;
use app\common\controller\ControllerBase;

/**
 * 关注 取消关注接口
 * @author xiaok
 * @time 2017/06/06
 */
class Focus extends ControllerBase{
	/**
	 * 关注 取消关注接口
	 * @param integer $user_id 用户id
	 * @param integer $live_id 根据target:   1-live直播间id  2-栏目id
	 * @param integer $type    关注或取关 1关注 0取消关注
	 * @param integer $target  关注目标 1-live直播间  2-栏目
	 */
	public function addFocus($user_id = 1706743,$live_id = 1,$type = 0,$target=1){
		$user_id = (int)$user_id;
		$live_id = (int)$live_id;
		$type = (int)$type;
		$LiveFocusModel = new LiveFocus();
		$status = $LiveFocusModel->focus($live_id,$user_id,$type,$target);
		return $this->sucSysJson($status['data'],$status['msg'],$status['code']);
	}
}