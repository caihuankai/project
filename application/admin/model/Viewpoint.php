<?php
namespace app\admin\model;

use app\common\model\ModelBs;
use app\admin\model\ViewpointCate as MViewpointCate;
use app\admin\model\ColumnViewpoint as MColumnViewpoint;

class Viewpoint extends ModelBs
{
	protected $levelText = [
			0 => '免费',
			1 => '付费',
	];
	
	protected $typeText = [
			0=>'普通观点',
// 			1=>'专题',
			2=>'精选'
	];
	
	protected $statusText = [
			0=>'草稿',
			1=>'发布',
			2=>'删除'
	];
	
	/**
	 * 获取观点类型的文案
	 *
	 * @return array
	 * @author liujuneng
	 */
	public function getLevelText($level)
	{
		return !is_null($level) ? getDataByKey($this->levelText, $level, 0) : $this->levelText;
	}
	
	/**
	 * 获取类型的文案
	 * @param unknown $type
	 * @return string[]|mixed|array|\ArrayAccess
	 */
	public function getTypeText($type)
	{
		return !is_null($type) ? getDataByKey($this->typeText, $type, 0) : $this->typeText;
	}
	
	/**
	 * 获取状态的文案
	 * @param unknown $status
	 * @return string[]|mixed|array|\ArrayAccess
	 */
	public function getStatusText($status)
	{
		return !is_null($status) ? getDataByKey($this->statusText, $status, 0) : $this->statusText;
	}
	
	/**
	 * 根据观点id获取观点明细
	 * @param unknown $viewpointId
	 * @return \think\Collection|\think\db\false|PDOStatement|string
	 * @author liujuneng
	 */
	public function getViewpointByIdList($viewpointIdList)
	{
		$data = $this->where('id', 'in', $viewpointIdList)->select();
		
		return $data;
	}
	
	/**
	 * 根据观点id修改状态，支持批量
	 * @param unknown $ids
	 * @param unknown $status
	 * @return number|string
	 * @author liujuneng
	 */
	public function changeStatusByViewPointIds($ids, $status)
	{
		$result = $this->where('id', 'in', $ids)->update(['status' => $status, 'update_time'=>date('Y-m-d H:i:s')]);
		
		return $result;
	}
	
	/**
	 * 报错观点编辑数据
	 * 1.更新观点
	 * 2.处理观点标签关联
	 * 	2.1 统计标签关联：已存在的观点标签关联，不再创建；统计需要删除的观点标签关联
	 * 	2.2 删除、创建观点标签关联
	 * @param unknown $viewpointId
	 * @param unknown $updateViewpointData
	 * @param unknown $cateList
	 * @return boolean
	 * @author liujuneng
	 */
	public function updateViewpointForEdit($viewpointId, $updateViewpointData, $cateList, $selectColumnList)
	{
		$this->db()->startTrans();
		$isSuccess = true;
		try {
			
			$result = $this->db()->where('id', $viewpointId)->update($updateViewpointData);
			
			//处理观点标签关联
			$model = new MViewpointCate();
			$model = $model->db();
			
			$deleteViewpointCate = [];
			$viewpointCateList = $model->where('viewpoint_id', $viewpointId)->where('grade', 2)->select();
			
			foreach ($viewpointCateList as $viewpointCate){
				$cateId = $viewpointCate['cate_id'];
				$grade = $viewpointCate['grade'];
				if (key_exists($cateId, $cateList)) {
					//已存在的观点标签关联，不再创建
					unset($cateList[$cateId]);
				}else {
					//统计需要删除的观点标签关联
					$deleteViewpointCate[] = $cateId;
				}
			}
			
			//删除观点标签关联
			if (!empty($deleteViewpointCate)){
				$model->where('viewpoint_id', $viewpointId)->where('cate_id', 'in', $deleteViewpointCate)->delete();
			}
			
			//创建观点标签关联
			if (!empty($cateList)) {
				$viewpointCateListForCreate = [];
				foreach ($cateList as $cateId=>$grade){
					$viewpointCateListForCreate[] = [
							'viewpoint_id'=>$viewpointId,
							'cate_id'=>$cateId,
							'grade'=>$grade
					];
				}
				$model->insertAll($viewpointCateListForCreate);
			}
			
			//处理栏目与观点关联
			$model = new MColumnViewpoint();
			$deleteColumnIdList = [];
			$columnViewpointList = $model->where('viewpoint_id', $viewpointId)->column('column_id');
			$selectColumnListFlip = array_flip($selectColumnList);
			foreach ($columnViewpointList as $columnId) {
				if (in_array($columnId, $selectColumnList)) {
					//已存在的栏目管理，不再创建
					unset($selectColumnList[$selectColumnListFlip[$columnId]]);
				}else {
					$deleteColumnIdList[] = $columnId;
				}
			}
			
			//删除栏目与观点关联
			if (!empty($deleteColumnIdList)) {
				$model->where('viewpoint_id', $viewpointId)->where('column_id', 'in', $deleteColumnIdList)->delete();
			}
			
			//创建栏目与观点关联
			if (!empty($selectColumnList)) {
				$columnViewpointListForCreate = [];
				foreach ($selectColumnList as $columnId){
					$columnViewpointListForCreate[] = [
							'column_id'=>$columnId,
							'viewpoint_id'=>$viewpointId
					];
				}
				$model->insertAll($columnViewpointListForCreate);
			}
			
			$this->db()->commit();
		} catch (\Exception $e) {
			$this->db()->rollback();
			$isSuccess = false;
		}
		
		return $isSuccess;
	}
	
	/**
	 * 创建观点
	 * @param unknown $insertData	创建的数据
	 * @param unknown $cateList		标签信息
	 * @return number|string
	 */
	public function createViewpoint($insertData, $cateList, $selectColumnList)
	{
		$this->db()->startTrans();
		$viewpointId = 0;
		try {
			$viewpointId = $this->db()->insertGetId($insertData);
			
			//处理观点标签关联
			$model = new MViewpointCate();
			$model = $model->db();
			
			//创建观点标签
			if (!empty($cateList)) {
				$viewpointCateListForCreate = [];
				foreach ($cateList as $cateId=>$grade){
					$viewpointCateListForCreate[] = [
							'viewpoint_id'=>$viewpointId,
							'cate_id'=>$cateId,
							'grade'=>$grade
					];
				}
				$model->insertAll($viewpointCateListForCreate);
			}
			
			//创建栏目与观点关联
			$model = new MColumnViewpoint();
			if (!empty($selectColumnList)) {
				$columnViewpointListForCreate = [];
				foreach ($selectColumnList as $columnId){
					$columnViewpointListForCreate[] = [
							'column_id'=>$columnId,
							'viewpoint_id'=>$viewpointId
					];
				}
				$model->insertAll($columnViewpointListForCreate);
			}
			
			$this->db()->commit();
		} catch (\Exception $e) {
			$this->db()->rollback();
			$viewpointId = 0;
		}
		
		return $viewpointId;
	}
	
	/**
	 * 获取观点前台详情页url
	 *
	 * @param $courseId
	 * @return mixed
	 * @author liujuneng
	 */
	public function getViewpointUrl($viewpointId)
	{
		return url('/#/personalCenter/viewpointDetail/' . $viewpointId, '', false, \helper\UrlSys::getWxHost());
	}

    /**
     * 获取观点信息
     * @name  getViewPointInfo
     * @param $viewpointId
     * @param string $field
     * @return array|false|\PDOStatement|string|\think\Model
     * @author Lizhijian
     */
	public function getViewPointInfo($viewpointId, $field = '*'){
	    return $this->where('id', $viewpointId)->field($field)->find();
    }
}
