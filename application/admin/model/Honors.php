<?php
namespace app\admin\model;

use app\common\model\ModelBs;

class Honors extends ModelBs{
	public function getList($page,$limit){
		$data['list'] = $this->where('status',1)
		->page($page,$limit)
		->order('update_time','desc')
		->select();
		$data['count'] = $this->where('status',1)->count();
		return $data;
	}
}