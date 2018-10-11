<?php
namespace app\wechat\model;

use app\common\model\ModelBs;

class Message extends ModelBs{
	
	/**
	 * 查询消息中心统计信息,只统计未读信息
     * ps：查询前会先删除30天前的消息
	 * @param unknown $userId
	 * @return unknown
	 * @author liujuneng
	 */
	public function getMessageStatisticsByUserId($userId){
		//删除30天前的消息记录
		$date = date('Y-m-d', strtotime('-30 days'));
		$this->where('user_id', $userId)->where('create_time', '<', $date)->delete();
		
		//执行统计
		$tmpTable = $this->where('user_id', $userId)->order('id desc')->buildSql();
		$result = $this->query("select t.type,count(1) as msgNum,t.lead from " . $tmpTable . " t where t.status=0 group by t.type");
		
		return $result;
	}
	/**
	 * 更改订阅到期消息状态
	 * @return [type] [description]
	 */
	public function changeColumnMessageState(){
		$where['type'] = 10;
		$where['unix_timestamp(create_time)'] = ['<',time()];
		$this->where($where)->update([
			'type' => 0
		]);
	}
	
	/**
	 * 更改订阅月度课/季度课到期消息状态
	 */
	public function changeCourseSeriesMessageState(){
		$where['type'] = 30;
		$where['unix_timestamp(create_time)'] = ['<',time()];
		$this->where($where)->update([
				'type' => 3
		]);
	}
	
	
}
