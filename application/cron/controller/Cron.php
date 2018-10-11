<?php
namespace app\cron\controller;

use \app\common\model\User;
use \app\common\model\LiveStatistics;
use \app\common\model\DataStatistics;
use \app\common\model\GlobalLive;
use \app\common\model\Live;
use \app\common\model\BehaviorStatistics;
use \app\common\model\BehaviorRecord;
use \app\common\model\PayOrder;
use \app\wechat\model\LiveFocus;


/**
 *
 * 定时任务
 *
 */
class Cron extends App{
	/**
	 * 用户行为统计表 每天22：00统计
     * php public/cron/index.php Cron/behaviorStatistics
	 * @return [type] [description]
	 */
	public function behaviorStatistics(){
		$BehaviorStatisticsModel = new BehaviorStatistics();
		$BehaviorRecordModel = new BehaviorRecord();
		$LiveStatisticsModel = new LiveStatistics();
		$PayOrderModel = new PayOrder();
		//获取所有直播间id
		$LiveModel = new Live();
		$liveIdList = $LiveModel->alias('l')
        ->field('l.id,u.user_id')
        ->join('talk_user u','l.user_id = u.user_id')
        ->where([
        	'u.user_level' => 2,
        	'u.freeze' => 0,
        	'l.open_status' => 1
        ])
        ->select();
        foreach ($liveIdList as $k => $v) {
        	$liveInsertData['type'] = 2;
        	$liveInsertData['target_id'] = $v['id'];
        	$liveInsertData['date'] = date('Y-m-d');
        	//获取live直播间当天访客数
        	$liveInsertData['visitors_nun'] = $BehaviorRecordModel
        	->where([
        		'target_id' => $v['id'],
        		'type' => 14,
        		'create_time' => ['between time',[date('Y-m-d 00:00:00'),date('Y-m-d 23:59:59')]]
    		])
    		->count();
    		//获取live直播间当天浏览量
    		$liveInsertData['browse_nun'] = $BehaviorRecordModel
        	->where([
        		'target_id' => $v['id'],
        		'type' => 13,
        		'create_time' => ['between time',[date('Y-m-d 00:00:00'),date('Y-m-d 23:59:59')]]
    		])
    		->count();
    		//获取live直播间当天停留总时长(秒)
    		$liveInsertData['total_time_len'] = ($LiveStatisticsModel
    		->where([
    			'statistics_type' => 0,
    			'live_id' => $v['id'] + 1000000000,
    			'statistics_time' => date('Ymd')
			])
			->sum('total')) * 60;
			//获取live直播间当天人均停留时长(秒)
			if($liveInsertData['visitors_nun'] != 0){
				$liveInsertData['percapita_time_len'] = round($liveInsertData['total_time_len']/$liveInsertData['visitors_nun'],1);
			}else{
				$liveInsertData['percapita_time_len'] = 0;
			}
			//获取live直播间当天总送礼金额
			$liveInsertData['gift_amount_nun'] = $PayOrderModel
			->where([
				'vip_id' => 0,
				'state' => 1,
				'type' => 3,
				'class_id' => $v['user_id'],
				'pay_time' => ['between time',[date('Y-m-d 00:00:00'),date('Y-m-d 23:59:59')]]
			])
			->sum('amount');
			//获取live直播间当天总在线人数(UV)
			$liveInsertData['online_nun'] = $liveInsertData['visitors_nun'];
        	$BehaviorStatisticsModel->insert($liveInsertData);
        }
        $GlobalLiveModel = new GlobalLive();
        //获取公共直播间当天所有课程
        $GlobalLiveList = $GlobalLiveModel
        ->field('id,set_start_time,set_end_time')
        ->where([
        	'open_status' => 1,
        	'pid' => 9999,
        	'set_start_time' => ['between time',[date('Y-m-d 00:00:00'),date('Y-m-d 23:59:59')]]
    	])
    	->select();
    	foreach ($GlobalLiveList as $k => $v) {
	        $GlobalLiveInsertData['type'] = 1;
	    	$GlobalLiveInsertData['target_id'] = $v['id'];
	    	$GlobalLiveInsertData['date'] = date('Y-m-d');
	    	//获取公共直播间课程当天访客数
        	$GlobalLiveInsertData['visitors_nun'] = $BehaviorRecordModel
        	->where([
        		'target_id' => 9999,
        		'type' => 12,
        		'create_time' => ['between time',[$v['set_start_time'],$v['set_end_time']]]
    		])
    		// ->group('user_id')
    		->count();
    		//获取公共直播间课程当天浏览量
    		$GlobalLiveInsertData['browse_nun'] = $BehaviorRecordModel
        	->where([
        		'target_id' => 9999,
        		'type' => 11,
        		'create_time' => ['between time',[$v['set_start_time'],$v['set_end_time']]]
    		])
    		->count();
    		//获取公共直播间课程当天停留总时长(秒)
    		$GlobalLiveInsertData['total_time_len'] = ($LiveStatisticsModel
    		->where([
    			'statistics_type' => 1,
    			'live_id' => 1000009999,
    			'statistics_time' => date('Ymd'),
    			'global_id' => $v['id']
			])
			->sum('total')) * 60;
			//获取公共直播间课程当天人均停留时长(秒)
			if($GlobalLiveInsertData['visitors_nun'] != 0){
				$GlobalLiveInsertData['percapita_time_len'] = round($GlobalLiveInsertData['total_time_len']/$GlobalLiveInsertData['visitors_nun'],1);
			}else{
				$GlobalLiveInsertData['percapita_time_len'] = 0;
			}
			//获取公共直播间课程当天总送礼金额
			$GlobalLiveInsertData['gift_amount_nun'] = $PayOrderModel
			->where([
				'vip_id' => 0,
				'state' => 1,
				'type' => 8,
				'class_id' => $v['id'],
				'pay_time' => ['between time',[date('Y-m-d 00:00:00'),date('Y-m-d 23:59:59')]]
			])
			->sum('amount');
			//获取公共直播间课程当天跳转至老师个人Live直播间次数(PV)
			$GlobalLiveInsertData['jump_live_nun'] = $BehaviorRecordModel
        	->where([
        		'target_id' => 9999,
        		'type' => 15,
        		'create_time' => ['between time',[$v['set_start_time'],$v['set_end_time']]]
    		])
    		->count();
			//获取公共直播间课程当天总在线人数(UV)
			$GlobalLiveInsertData['online_nun'] = $GlobalLiveInsertData['visitors_nun'];
    		$BehaviorStatisticsModel->insert($GlobalLiveInsertData);
    	}
    	echo 'success';
	}
    /**
     * 同步直播间关注数
     * @return [type] [description]
     */
    public function updateRootFocus(){
        //获取所有直播间id
        $LiveModel = new Live();
        $LiveFocusModel = new LiveFocus();
        $liveIdList = $LiveModel->alias('l')
        ->field('l.id,u.user_id,l.focus_num')
        ->join('talk_user u','l.user_id = u.user_id')
        ->where([
            'u.user_level' => 2,
            'u.freeze' => 0,
            'l.open_status' => 1
        ])
        ->select();
        foreach ($liveIdList as $k => $v) {
            //获取直播间关注人数
            $LiveFocusNum = $LiveFocusModel
            ->where([
                'live_id' => $v['id'],
                'robot' => 2,
                'target' => 1
            ])
            ->count();
            if($LiveFocusNum != $v['focus_num']){
                $LiveModel->where('id',$v['id'])->update([
                    'focus_num' => $LiveFocusNum
                ]);
            }
        }
    }
}
