<?php
namespace app\wechat\controller;

use app\admin\model\Inpour as MInpour;

class Inpour extends App
{
	/**
	 * 获取充值金额设置
	 * 规则：取最新5条有效记录，并按照面额从小到大排序
	 * @return \think\response\Json
	 */
	public function getInpourActive()
	{
		$model = new MInpour();
		
		$data = $model->where('status', 1)->order('id desc')->limit(5)->select();
		$dataTmp = [];
		foreach ($data as $info) {
			//防止按字符串排序时导致的数值大小判断问题
			$denomination = 10000000000 + $info['denomination'];
			$id = $info['id'];
			//denomination字段可能重复，因此加上id再排序
			$dataTmp[$denomination . '_' . $id] = $info;
		}
		
		ksort($dataTmp);
		
		//重新获取结果，去掉排序用的key
		$result = [];
		foreach ($dataTmp as $info){
			$info['cost'] = (float)$info['cost'];
			$info['denomination'] = (float)$info['denomination'];
			$info['bonus'] = (float)$info['bonus'];
			$result[] = $info;
		}
		
		return $this->sucSysJson($result);
	}
	
	
	
}