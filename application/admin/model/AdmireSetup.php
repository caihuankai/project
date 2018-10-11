<?php
namespace app\admin\model;

use app\common\model\ModelBs;
use think\Request;
use think\Db;

//赞赏设置表
class AdmireSetup extends ModelBs{
	public function dataList($start,$limit,$admire_type,$open_status){
		$offset = ($start - 1) * $limit;
		$where = array();
		if(!empty($admire_type)){
			$where['admire_type'] = $admire_type;
		}
		if(!empty($open_status)){
			$where['open_status'] = $open_status;
		}
		$data = $this->where($where)->limit($offset, $limit)
		->select();
		return $data;
	}
}
