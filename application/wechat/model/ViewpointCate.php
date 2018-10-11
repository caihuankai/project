<?php
namespace app\wechat\model;

use app\common\model\ModelBs;


/**
 * 观点分类关联表
 * @author liujuneng
 *
 */
class ViewpointCate extends ModelBs
{
	
	public function getViewpointCateByViewpointId($viewpointId)
	{
		$data = $this->where('viewpoint_id', $viewpointId)->select();
		
		return $data;
	}
	
	
	
	
}