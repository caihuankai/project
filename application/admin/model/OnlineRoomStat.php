<?php
namespace app\admin\model;

use think\Model;
use app\common\model\ModelBase;

//房间在线人数库
class OnlineRoomStat extends ModelBase{

	protected $connection = 'mongo_online_room_stat';

	public function getPublicRoomOnlineNum($table,$date){
		$date = (int)date('YmdH',strtotime($date));
		$onlineRoomInfoList = $this->db()->table($table)->where('date',$date)->find();
		return !empty($onlineRoomInfoList) ? $onlineRoomInfoList['visitorcount'] : 0;
	}
}