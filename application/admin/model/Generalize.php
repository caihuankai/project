<?php
namespace app\admin\model;

use app\common\model\ModelBs;

class Generalize extends ModelBs{
	public function getList($page,$limit){
		$where['status'] = ['in',[1,2]];
		$where['type'] = 1;
		$data['list'] = $this->where($where)
		->page($page,$limit)
		->order('update_time','desc')
		->select();
		$data['count'] = $this->where($where)->count();
		return $data;
	}
}