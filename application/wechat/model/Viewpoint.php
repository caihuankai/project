<?php
namespace app\wechat\model;

use app\wechat\model\ViewpointCate as MViewpointCate;
use app\wechat\model\ColumnViewpoint as MColumnViewpoint;
use think\Db;

/**
 * 观点表
 * @author liujuneng
 * 
 */
class Viewpoint extends \app\common\model\Viewpoint
{
	use \traits\sysJson;
	
	/**
	 * 根据条件获取观点记录
	 * 1.$field默认为null，查询全部字段
	 * 2.$condition默认为null，查找全部
	 * 3.$pageNo默认为1
	 * 4.$perPage默认为20
	 * 5.$orderBy默认按id升序排列
	 * 6.$isUserInfo默认为false，不返回用户信息（头像和昵称）；为true时，与talk_user连表查询，返回用户信息（头像和昵称）
	 * @param unknown $field		查找字段
	 * @param unknown $condition	查询条件
	 * @param number $pageNo		页数
	 * @param number $perPage		每页记录数
	 * @param string $orderBy		排序方式
	 * @param string $isUserInfo	是否需要返回用户信息（头像和昵称）
	 * @return \think\Collection|\think\db\false|PDOStatement|string
	 * @author liujuneng
	 */
	public function getViewpointListByCondition($field = null, $condition = null, $pageNo = 1, $perPage = 20, $orderBy = 'id asc', $isUserInfo = false, $isAssistantDraft = false, $isCate = false)
	{
		$query = $this;
		//需要获取用户信息时，连表talk_user查询
		$query = $query->alias('v');
		$fieldList = [];
		$orderByList = [];
		if (!empty($field)) {
			//$field不为空，每个字段加上'v.'
			$fieldList = explode(',', $field);
			//默认查询观点id
			if (!in_array('id', $fieldList)) {
				$fieldList[] = 'id';
			}
			foreach ($fieldList as $key=>$fieldTmp){
				$fieldList[$key] = 'v.' . trim($fieldTmp);
			}
		}else {
			//$field不为空，手动加上条件'v.*'，以便获取观点表全部字段
			$fieldList[] = 'v.*';
		}
		if (!empty($orderBy)) {
			$orderByList = explode(',', $orderBy);
			foreach ($orderByList as $key=>$orderByValue){
				if (stripos($orderByValue, 'cateName') !== false) {
					//isCate为true时才能用cateName排序
					if (!$isCate) {
						abort($this->errSysJson('isCate为true时才能用cateName排序'));
					}
					$orderByValue = 
					$orderByList[$key] = str_ireplace('cateName', 'lc.name', $orderByValue);
				}else {
					$orderByList[$key] = 'v.' . $orderByValue;
				}
			}
		}
		//获取用户头像和昵称
		if ($isUserInfo) {
			$fieldList[] = 'tu.head_add';
			$fieldList[] = 'tu.alias';
		}
		//封面图获取
		if (in_array('v.*', $fieldList) || in_array('v.cover_qiniu_id', $fieldList)) {
			$fieldList[] = 'qg.qiniuImg as coverPic';
			$query->join('talk_qiniu_gallerys qg','v.cover_qiniu_id = qg.id', 'left');
		}
		//$condition也要加上'v.'
		$conditionNew = [];
		//搜索条件中包含栏目id的话需要连表talk_column_viewpoint
		if (isset($condition['column_id']) || isset($condition['column_id '])) {
			$query->join('talk_column_viewpoint cv', 'cv.viewpoint_id = v.id');
		}
		foreach ($condition as $key=>$value){
			//搜索条件中包含栏目id的话另行处理
			if (trim($key) == 'column_id') {
				$conditionNew['cv.' . $key] = $value;
			}else {
				$conditionNew['v.' . $key] = $value;
			}
		}
		$condition = $conditionNew;
		$query = $query->join('talk_user tu', 'tu.user_id = v.uid')->where('tu.freeze', 0);
		
		//查询标签一级分类
		if ($isCate) {
			$fieldList[] = 'lc.name as cateName';
			$query = $query->join('talk_viewpoint_cate vc', 'vc.viewpoint_id = v.id and vc.grade = 1', 'left')
						->join('talk_live_cate lc', 'vc.cate_id = lc.id', 'left');
		}
			
		$field = implode(',', $fieldList);
		$orderBy = implode(',', $orderByList);
		
		if ( $isAssistantDraft && ( (!isset($condition['v.status']) && !isset($condition['v.statusIn'])) || (isset($condition['v.status']) && $condition['v.status'] == 0) || (isset($condition['v.status'][1]) && stripos($condition['v.status'][1], '0') !== false) ) ) {
			//查询当前用户作为助教绑定的讲师id
			$teacherIdList = [];
			$userAssistantModel = new \app\wechat\model\UserAssistant();
			$userAssistantResult = $userAssistantModel->where('user_id', $condition['v.uid'])->field('teacher_id')->select();
			foreach ($userAssistantResult as $userAssistantinfo) {
				$teacherIdList[] = $userAssistantinfo['teacher_id'];
			}
			if (empty($teacherIdList)) {
				$query = $query->where($condition);
			}else {
				$query->where(function ($current) use ($condition, $teacherIdList) {
					$current->whereOr(function ($q) use ($condition){
						//原来的查询条件
						$q->where($condition);
					})->whereOr(function ($q) use ($condition, $teacherIdList){
						//查询当前用户作为助教发布过的观点草稿
						if (isset($condition['v.level'])) {
							$q->where('v.level', $condition['v.level']);
						}
						$q->where('v.assistant_id', $condition['v.uid'])->where('v.status', 0)->where('v.uid', 'in', $teacherIdList);
					});
				});
			}
			
		}else {
			if (!empty($condition)) {
				$query = $query->where($condition);
			}
		}
		
		//执行查询
		$data = $query->field($field)
		->order($orderBy)
		->page($pageNo, $perPage)
		->group('v.id')
		->select();
		
		//查询标签一级分类//已改为联表查询
// 		if ($isCate && !empty($data)) {
// 			$model = new MViewpointCate();
// 			$viewpointIds = [];
// 			foreach ($data as $info){
// 				$viewpointIds[] = $info['id'];
// 			}
// 			$cateList = $model->alias('vc')
// 						->join('talk_live_cate lc', 'vc.cate_id = lc.id')
// 						->where('vc.grade', 1)
// 						->where('vc.viewpoint_id', 'in', $viewpointIds)
// 						->column('lc.name', 'viewpoint_id');
// 			foreach ($data as $key=>$info) {
// 				$viewpointId = $info['id'];
// 				if (isset($cateList[$viewpointId])) {
// 					$data[$key]['cateName'] = $cateList[$viewpointId];
// 				}else {
// 					$data[$key]['cateName'] = null;
// 				}
// 			}
// 		}
		
		return $data;
	}
	
	/**
	 * 根据条件查询记录总数
	 * @param unknown $field
	 * @param unknown $condition
	 * @param number $pageNo
	 * @param number $perPage
	 * @param string $orderBy
	 * @param string $isUserInfo
	 * @return number
	 */
	public function getViewpointCountByCondition($condition = null, $isAssistantDraft = false)
	{
		$query = $this;
		//需要获取用户信息时，连表talk_user查询
		$query = $query->alias('v');
		//$condition也要加上'v.'
		$conditionNew = [];
		foreach ($condition as $key=>$value){
			$conditionNew['v.' . $key] = $value;
		}
		$condition = $conditionNew;
		$query = $query->join('talk_user tu', 'tu.user_id = v.uid')->where('tu.freeze', 0);
		
		if ( $isAssistantDraft && ( (!isset($condition['v.status']) && !isset($condition['v.statusIn'])) || (isset($condition['v.status']) && $condition['v.status'] == 0) || (isset($condition['v.status'][1]) && stripos($condition['v.status'][1], '0') !== false) ) ) {
			//查询当前用户作为助教绑定的讲师id
			$teacherIdList = [];
			$userAssistantModel = new \app\wechat\model\UserAssistant();
			$userAssistantResult = $userAssistantModel->where('user_id', $condition['v.uid'])->field('teacher_id')->select();
			foreach ($userAssistantResult as $userAssistantinfo) {
				$teacherIdList[] = $userAssistantinfo['teacher_id'];
			}
			if (empty($teacherIdList)) {
				$query = $query->where($condition);
			}else {
				$query->where(function ($current) use ($condition, $teacherIdList) {
					$current->whereOr(function ($q) use ($condition){
						//原来的查询条件
						$q->where($condition);
					})->whereOr(function ($q) use ($condition, $teacherIdList){
						//查询当前用户作为助教发布过的观点草稿
						if (isset($condition['v.level'])) {
							$q->where('v.level', $condition['v.level']);
						}
						$q->where('v.assistant_id', $condition['v.uid'])->where('v.status', 0)->where('v.uid', 'in', $teacherIdList);
					});
				});
			}
			
		}else {
			if (!empty($condition)) {
				$query = $query->where($condition);
			}
		}
		//执行查询
		$data = $query->count();
		
		return $data;
	}
	
	/**
	 * 根据观点id获取观点明细
	 * @param unknown $viewpointId
	 * @return \think\Collection|\think\db\false|PDOStatement|string
	 * @author liujuneng
	 */
	public function getViewpointById($viewpointId)
	{
		$data = $this->where('id', $viewpointId)->find();
		
		return $data;
	}
	
	/**
	 * 根据观点id列表批量更新置顶状态为0（非置顶）
	 * @param unknown $viewpointIdList
	 * @return number|string
	 * @author liujuneng
	 */
	public function setUnTopStatusBatch($viewpointIdList)
	{
		$result = $this->where('id', 'in', $viewpointIdList)->update(['top_status'=>0, 'update_time'=>date('Y-m-d H:i:s')]);
		
		return $result;
	}
	
	/**
	 * 根据$viewpointId修改观点置顶状态
	 * @param unknown $viewpointId
	 * @param unknown $topStatus
	 * @return number|string
	 * @author liujuneng
	 */
	public function  setTopStatusByViewpointId($viewpointId, $topStatus)
	{
		$result = $this->where('id', $viewpointId)->update(['top_status'=>$topStatus, 'update_time'=>date('Y-m-d H:i:s')]);
		
		return $result;
	}
	
	/**
	 * 根据$viewpointId修改观点状态
	 * @param unknown $viewpointId
	 * @param unknown $status
	 * @return number|string
	 * @author liujuneng
	 */
	public function setStatusByViewpointId($viewpointId, $status)
	{
		$currentTime = date('Y-m-d H:i:s');
		$update = ['status'=>$status, 'update_time'=>$currentTime];
		//状态改为发布时，记录发布时间
		if ($status == 1) {
			$update['publish_time'] = $currentTime;
		}
		$result = $this->where('id', $viewpointId)->update($update);
		
		return $result;
	}
	
	/**
	 * 创建观点记录
	 * 1.创建观点记录并返回观点ID
	 * 2.创建观点与标签的关联表
	 * @param unknown $viewpointData
	 * @param unknown $cateList
	 * @return boolean
	 * @author liujuneng
	 */
	public function createViewpoint($viewpointData, $cateList, $columnIdList)
	{
		$this->db()->startTrans();
		$result = 0;
		try {
			//创建观点记录并返回观点ID
			$viewpointId = $this->db()->insertGetId($viewpointData);
			//创建观点与标签的关联表
			if ($viewpointId > 0 && !empty($cateList)) {
				$model = new MViewpointCate();
				$viewpointCateList = [];
				foreach ($cateList as $cateId=>$grade){
					$viewpointCateList[] = [
							'viewpoint_id'=>$viewpointId,
							'cate_id'=>$cateId,
							'grade'=>$grade
					];
				}
				$model->insertAll($viewpointCateList);
			}
			//创建栏目与观点关联
			if ($viewpointId > 0 && !empty($columnIdList)) {
				$model = new MColumnViewpoint();
				$columnViewpointList = [];
				foreach ($columnIdList as $columnId) {
					$columnViewpointList[] = [
							'column_id'=>$columnId,
							'viewpoint_id'=>$viewpointId
					];
				}
				$model->insertAll($columnViewpointList);
			}
			$this->db()->commit();
			$result = $viewpointId;
		} catch (\Exception $e) {
			$this->db()->rollback();
			$result = false;
		}
		
		return $result;
	}
	
	/**
	 * 编辑观点数据
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
			if (!empty($cateList)) {
				$model = new MViewpointCate();
				$model = $model->db();
				
				$deleteViewpointCate = [];
				$viewpointCateList = $model->where('viewpoint_id', $viewpointId)->select();
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
					
					$successCount = $model->insertAll($viewpointCateListForCreate);
				}
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
     * 根据userIds获取最新一条观点数据
     *
     * @param array $userIds
     * @param       $field
     * @return array
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function getNewViewpointByUserIds(array $userIds, $field)
    {
        if (empty($userIds)) {
            return [];
        }
        
        return $this->where(['v.uid' => ['in', $userIds]])->alias('v')
            ->join('(SELECT uid, max(id) m_id from talk_viewpoint where status = 1 GROUP BY uid) vv', 'v.id = vv.m_id')
            ->order('v.id desc')->field($field)
            ->fetchClass('\CollectionBase')->select()->column(null, 'uid');
	}
	
	
}