<?php
namespace app\wechat\model;


class CoursePptImg extends \app\common\model\CoursePptImg{
	/**
	 * 获取课程课件
	 * @param  [type] $id   [description]
	 * @param  [type] $type [description]
	 * @return [type]       [description]
	 */
	public function getCourseware($id,$type){
		$where['course_id'] = $id;
		$where['type'] = $type;
		// $where['status'] = 1;
		$order = ['sort' => 'desc','create_time'];
		$dataList = $this
		->field('id,qiniuKey,imgUrl,sort')
		->where($where)
		->order($order)
		->select();
		return $dataList;
	}
}
