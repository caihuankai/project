<?php
namespace app\admin\model;

use think\Model;
use app\common\model\ModelBase;

class OnlineRoomInfoStat extends ModelBase
{
	protected $connection = 'mongo_online_room_info_stat';
	
	//法定节假日
	protected $holidays = [
			'20180405',
			'20180406',
			'20180407',
			'20180429',
			'20180430',
			'20180501',
			'20180616',
			'20180617',
			'20180618',
	];
	
	//节假日原因调动的工作日
	protected $workDays = [
			'20180408',
			'20180428',
	];
	
	/**
	 * 获取直播间ID和日期获取统计信息
	 * @param unknown $liveId
	 * @param mixed $date
	 * @return number[]|unknown[]
	 * @author liujuneng
	 */
	public function getOnlineRoomInfoByLiveIdAndDate($liveId, $date)
	{
		$result = [
			'onlineCountAvg'=>0,
			'maxVisitorCount'=>0,
			'onlineMinutesAvg'=>0
		];
		
		$liveId += 1000000000;
		$liveId = strval($liveId);
		
		$onlineRoomInfoList = $this->db()->table($liveId)->where('date', $date)->select();
		foreach ($onlineRoomInfoList as $onlineRoomInfo) {
			$type = $onlineRoomInfo['type'];
			if ($type == 0) {//历史日均最高在线人数
				$result['maxVisitorCount'] = $this->db()->table($liveId)->where('type', 0)->max('value');
			}elseif ($type == 1) {//日均在线时间
				$result['onlineMinutesAvg'] = $onlineRoomInfo['value'];
			}elseif ($type == 2) {//日均在线人数
				$result['onlineCountAvg'] = $onlineRoomInfo['value'];
			}
		}
		return $result;
	}
	
	/**
	 * 获取正确的统计日期，排除法定节假日和周末
	 * @return string
	 * @author liujuneng
	 */
	public function getStatisticsDate()
	{
		$statisticsDate = "";
		//获取统计日期，排除法定节假日和周末
		$reduceDays = 0;
		do {
			$reduceDays -= 1;
			$weekDay = date("w", strtotime($reduceDays . "days"));
			$statisticsDate = date('Ymd', strtotime($reduceDays . 'days'));
		}while( !in_array($statisticsDate, $this->workDays) && (in_array($statisticsDate, $this->holidays) || in_array($weekDay, [0,6])) );//0为周日，6为周六
		return $statisticsDate;
		
	}
	
	
	
	
}