<?php
namespace app\admin\model;

use app\common\model\ModelBs;

class ColumnViewpoint extends ModelBs
{
	/**
	 * 根据观点id获取栏目观点关系信息
	 * @param unknown $viewpointId
	 * @return array|\think\Collection|\think\db\false|PDOStatement|string
	 */
	public function getColumnViewpointByViewpointId($viewpointId)
	{
		if (empty($viewpointId)) {
			return [];
		}
		
		$data = $this->where('viewpoint_id', $viewpointId)->select();
		
		return $data;
	}
	
	/**
	 * 根据栏目id获取栏目观点关系信息
	 * @param unknown $columnId
	 * @return array|\think\Collection|\think\db\false|PDOStatement|string
	 */
	public function getColumnViewpointByColumnId($columnId)
	{
		if (empty($columnId)) {
			return [];
		}
		
		$data = $this->where('column_id', $columnId)->select();
		
		return $data;
	}
	
}