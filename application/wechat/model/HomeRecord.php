<?php
namespace app\wechat\model;

use app\common\model\ModelBs;
use think\Db;

/**
 * 进入首页记录表
 */
class HomeRecord extends ModelBs{
	/**
	 * 检查进入首页
	 * @param unknown $user_id
	 * @return number[]|string[]
	 */
	public function record($user_id){
		//判断用户是否存在记录
		$currentDay = date('Y-m-d');
		$status = $this->where('type', 0)->where('user_id',$user_id)->where('create_time', '>', $currentDay)->find();
		if(empty($status)){
			$data = [
					'type'=>0,
					'user_id'=>$user_id
			];
			$this->insert($data);
			return ['code' => 0, 'data' => '', 'msg' => '初次进入'];
		}else{
			return ['code' => 1, 'data' => '', 'msg' => '多次进入'];
		}
	}
	
	/**
	 * 检查讲师动态
	 * @param unknown $teacherId
	 * @return number[]|string[]|array[]|\think\db\false[]|PDOStatement[]|\think\Model[]|number[]|string[]
	 */
	public function checkTeacherDynamic($teacherId, $userId){
		$currentDay = date('Y-m-d');
		$result = $this->where('type', 1)->where('user_id', $userId)->where('class_id', $teacherId)->where('create_time', '>', $currentDay)->find();
		if (empty($result)) {
			$footprintResult = DB::connect('mongo_talk')->table('user_room_footprint')->where('user_id', $teacherId)->where('room_type', 'course')->where('end_time', 0)->field(['room_id','_id'=>false])->order('_id', 'desc')->find();
			if (!empty($footprintResult)) {
				$data = [
						'type'=>1,
						'user_id'=>$userId,
						'class_id'=>$teacherId
				];
				$this->insert($data);
				return ['code' => 0, 'data' => $footprintResult, 'msg' => '初次检查'];
			}else {
				return ['code' => 0, 'data' => '', 'msg' => '初次检查'];
			}
		}else {
			return ['code' => 1, 'data' => '', 'msg' => '多次检查'];
		}
	}
	
}