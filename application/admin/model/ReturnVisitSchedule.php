<?php
namespace app\admin\model;

use app\common\model\ModelBs;

class ReturnVisitSchedule extends ModelBs
{
	protected $statusText = [
			0 => '未回访',
			1 => '已回访',
	];
	/**
	 * 获取状态的文案
	 *
	 * @return array
	 * @author liujuneng
	 */
	public function getStatusText($status)
	{
		return !is_null($status) ? getDataByKey($this->statusText, $status, 0) : $this->statusText;
	}
	
}