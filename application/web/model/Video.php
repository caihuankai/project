<?php
namespace app\web\model;

use app\common\model\ModelBs;

class Video extends ModelBs
{
	/**
	 * 根据视频id获取视频明细
	 * @param unknown $videoId
	 * @return array|\think\db\false|PDOStatement|string|\think\Model
	 * @author liujuneng
	 */
	public function getVideoById($videoId)
	{
		$data = $this->where('id', $videoId)->find();
		
		return $data;
	}
	
	/**
	 * 根据条件获取视频记录
	 * @param unknown $field
	 * @param unknown $condition
	 * @param number $pageNo
	 * @param number $perPage
	 * @param string $orderBy
	 * @return unknown
	 * @author liujuneng
	 */
	public function getVideoListByCondition($field = null, $condition = null, $pageNo = 1, $perPage = 20, $orderBy = 'id asc')
	{
		//执行查询
		$data = $this->field($field)
		->where($condition)
		->order($orderBy)
		->page($pageNo, $perPage)
		->select();
		
		return $data;
	}
	
}