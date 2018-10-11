<?php
namespace app\wechat\controller;

use think\config;
use app\wechat\model\PayOrder;
use app\common\controller\ControllerBase;
/**
 * 用户信息
 * @author xiaok
 * @time 2017/06/06
 */
class BuyInfo extends App{
	//购买记录 2.0新增购买类型 1：购买课程 2：购买观点 3：直播赞赏 5：礼点红包  9：购买栏目 10:小程序购买
	public function buyRecord($user_id = 1706743,$page=1,$type=2){
		$PayOrderModel = new PayOrder();
		$data = $PayOrderModel->buyRecord($user_id,$page,$type);
		return $this->successJson($data);
	}
	/**
	 * H5已购课程
	 * @param  integer $page  页码
	 * @return [array]         
	 */
	public function h5BuyRecord($page=1){
		$user_id = $this->getUserId();
		// $user_id = 1706743;
		$PayOrderModel = new PayOrder();
		$data = $PayOrderModel->buyRecord($user_id,$page,$type=11);
		return $this->sucSysJson($data);
	}
}