<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/3/19
 * Time: 10:08
 */

namespace app\wechat\model;


use app\common\model\ModelBs;

class LiveState extends ModelBs
{
	public function getState($groupid){
		//获取直播间推流状态
		$data = $this->field('state')->where('groupid',$groupid)->find();
		if(empty($data)){
			return 2;
		}
		return $data['state'];
	}
}