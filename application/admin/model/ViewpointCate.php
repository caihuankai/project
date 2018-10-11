<?php
namespace app\admin\model;

use app\common\model\ModelBs;

class ViewpointCate extends ModelBs
{
	/**
	 * 获取观点对应的标签
	 * @param unknown $viewpointId
	 * @return \think\Collection|\think\db\false|PDOStatement|string
	 */
	public function getViewpointCateInfoByViewpointId($viewpointId, $grade = '')
	{
		$query = $this->where(['vc.viewpoint_id'=>$viewpointId, 'grade'=>['<', 3]])
		->alias('vc')
		->field('vc.cate_id, vc.grade, lc.name')
		->join('talk_live_cate lc', 'lc.id = vc.cate_id');
		
		if ($grade != '') {
			$query = $query->where('vc.grade', $grade);
		}
		
		$selectCateList = $query->select();
		
		return $selectCateList;
	}
	
	/**
	 * 根据viewpointId获取观点标签
	 * @param unknown $viewpointId
	 * @return \think\Collection|\think\db\false|PDOStatement|string
	 * @author liujuneng
	 */
	public function getViewpointCateByViewpointId($viewpointId)
	{
		$data = $this->where('viewpoint_id', $viewpointId)->select();
		
		return $data;
	}
	
}