<?php
namespace app\wechat\controller;

use app\wechat\model\RedpacketLog as MRedpacketLog;

class RedpacketLog extends App
{
	/**
	 * 获取红包基本信息及领取记录
	 * @author liujuneng
	 */
	public function getRedpacketLogInfoByPacketId()
	{
		$request = $this->request;
		$packetId = $request->param('packetId', 0);
		
		$redpacketLogModel = new MRedpacketLog();
		$result = $redpacketLogModel->getRedpacketLogAndInfoByPacketId($packetId);
		
		return $this->sucSysJson($result);
	}
}