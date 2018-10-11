<?php
namespace app\wechat\model;

use app\common\model\ModelBs;

class Column extends ModelBs
{	
	/**
	 * 获取指定栏目名id
	 * @param  [type] $name [description]
	 * @return [type]       [description]
	 */
	public function getColumnId($name){
		$data = $this->where('name',$name)->value('id');
		return !empty($data) ? $data : -1;
	}
	
	
}