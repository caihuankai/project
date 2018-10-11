<?php
namespace app\admin\model;

use app\common\model\ModelBs;

class Navigation extends ModelBs
{
	protected $navigationTypeText = [
			0 => '公众号',
			1 => '官网',
	];
	
	/**
	 * 获取导航栏类型的文案
	 *
	 * @return array
	 * @author liujuneng
	 */
	public function getNavigationTypeText($navigationType)
	{
		return !is_null($navigationType) ? getDataByKey($this->navigationTypeText, $navigationType, 0) : $this->navigationTypeText;
	}
	
}