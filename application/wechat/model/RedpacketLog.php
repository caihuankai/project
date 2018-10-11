<?php
namespace app\wechat\model;

use app\common\model\ModelBs;
use app\wechat\model\RedpacketInfo;
use app\wechat\model\User;

class RedpacketLog extends ModelBs
{
	/**
	 * 获取红包基本信息及领取记录
	 * @param unknown $packetId
	 * @author liujuneng
	 */
	public function getRedpacketLogAndInfoByPacketId($packetId)
	{
		$redpacketLogs = $this->field('id,packet_id,take_user,take_money,time')
		->where('packet_id', $packetId)
		->select();
		
		$redpacketInfoModel = new RedpacketInfo();
		$redpacketInfo = $redpacketInfoModel->where('id', $packetId)->field('src_user,type,packet_num,take_num')->find();
		
		//获取用户头像和昵称
		if (!empty($redpacketInfo)) {
			$srcUserId = $redpacketInfo['src_user'];
			$userIdList = [$srcUserId];
			foreach ($redpacketLogs as $redpacketLog) {
				$userIdList[] = $redpacketLog['take_user'];
			}
			
			$userModel = new User();
			$userInfos = $userModel->where('user_id', 'in', $userIdList)->column('head_add,alias', 'user_id');
			if (isset($userInfos[$srcUserId])) {
				$redpacketInfo['userInfo'] = $userInfos[$srcUserId];
			}
			foreach ($redpacketLogs as $redpacketLog) {
				$takeUserId = $redpacketLog['take_user'];
				if (isset($userInfos[$takeUserId])) {
					$redpacketLog['userInfo'] = $userInfos[$takeUserId];
				}
			}
		}
		
		$result = [
				'redpacketInfo'=>$redpacketInfo,
				'redpacketLogs'=>$redpacketLogs
		];
		
		return $result;
	}
	
	
}