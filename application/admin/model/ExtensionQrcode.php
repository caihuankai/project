<?php
namespace app\admin\model;

use app\common\model\ModelBs;

class ExtensionQrcode extends ModelBs{
	public function getList($page,$limit){
		$where['dataFlag'] = 1;
		$data['list'] = $this
		->where($where)
		->page($page,$limit)
		->select();
		$data['count'] = $this->where($where)->count();
		return $data;
	}
}