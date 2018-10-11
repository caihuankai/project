<?php

namespace app\jiahua\controller;

use app\common\controller\ControllerBase;
use app\jiahua\model\UserJiahua;
use app\wechat\model\GlobalLive;

class Index extends ControllerBase{
	public function index(){
		return '家华课堂';
	}
	/**
	 * 批量生成用户
	 * @return [type] [description]
	 */
	public function buildUser(){
		// $UserJiahuaM = new UserJiahua();
		// set_time_limit(0);
		// $insertData = array();
		// $key = 0;
		// $images = array('/images/avatar_01.png','/images/avatar_02.png','/images/avatar_03.png','/images/avatar_04.png','/images/avatar_05.png','/images/avatar_06.png','/images/avatar_07.png','/images/avatar_08.png','/images/avatar_09.png','/images/avatar_10.png');
		// //$i = 910000; $i < 930001
		// $i = 930000; $i < 940001
		// for ($i = 810000; $i < 830001; $i++) { 
		// 	$insertData[$key]['user_id'] = $i;
		// 	$insertData[$key]['alias'] = $i;
		// 	$insertData[$key]['name'] = $i;
		// 	$insertData[$key]['login_name'] = $i;
		// 	$insertData[$key]['password'] = rand(1000,9999);
		// 	$insertData[$key]['head_add'] = config('JH_DOMAIN').$images[rand(0,9)];
		// 	$key = $key + 1;
		// 	if($key == 100){
		// 		$UserJiahuaM->insertAll($insertData);
		// 		$insertData = array();
		// 		$key = 0;
		// 	}
		// }
		// return $this->sucSysJson($insertData);
	}
	/**
	 * 更新家华课程时间
	 * @return [type] [description]
	 */
	public function updateCourse(){
		$GlobalLiveM = new GlobalLive();
		$GlobalLiveM->where('id',1)->update([
			'set_start_time' => date('Y-m-d 09:20:00'),
			'set_end_time' => date('Y-m-d 10:29:59'),
		]);
		$GlobalLiveM->where('id',2)->update([
			'set_start_time' => date('Y-m-d 10:30:00'),
			'set_end_time' => date('Y-m-d 11:30:00'),
		]);
		$GlobalLiveM->where('id',3)->update([
			'set_start_time' => date('Y-m-d 13:00:00'),
			'set_end_time' => date('Y-m-d 13:59:59'),
		]);
		$GlobalLiveM->where('id',4)->update([
			'set_start_time' => date('Y-m-d 14:00:00'),
			'set_end_time' => date('Y-m-d 14:59:59'),
		]);
		$GlobalLiveM->where('id',5)->update([
			'set_start_time' => date('Y-m-d 15:00:00'),
			'set_end_time' => date('Y-m-d 16:00:00'),
		]);
		$GlobalLiveM->where('id',6)->update([
			'set_start_time' => date('Y-m-d 19:00:00'),
			'set_end_time' => date('Y-m-d 19:59:59'),
		]);
		$GlobalLiveM->where('id',7)->update([
			'set_start_time' => date('Y-m-d 20:00:00'),
			'set_end_time' => date('Y-m-d 21:00:00'),
		]);
	}
}