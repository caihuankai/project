<?php
namespace app\web\model;

use app\wechat\model\ViewpointCate as MViewpointCate;
use think\Db;

/**
 * 观点表
 * @author liujuneng
 * 
 */
class Viewpoint extends \app\common\model\Viewpoint
{
	
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
		$orderBy = 'v.' . $orderBy;
		$fieldList = [];
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
		//获取用户头像和昵称
		if ($isUserInfo) {
			$fieldList[] = 'tu.head_add';
			$fieldList[] = 'tu.alias';
		}
		//封面图获取
		if (in_array('v.*', $fieldList) || in_array('v.cover_qiniu_id', $fieldList)) {
			$fieldList[] = 'qg.qiniuImg as coverPic';
			$query->join('talk_qiniu_gallerys qg','v.cover_qiniu_id = qg.id','left');
		}
		$field = implode(',', $fieldList);
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
		
		//查询标签一级分类
		if ($isCate && !empty($data)) {
			$model = new MViewpointCate();
			$viewpointIds = [];
			foreach ($data as $info){
				$viewpointIds[] = $info['id'];
			}
			$cateList = $model->alias('vc')
						->join('talk_live_cate lc', 'vc.cate_id = lc.id')
						->where('vc.grade', 1)
						->where('vc.viewpoint_id', 'in', $viewpointIds)
						->column('lc.name', 'viewpoint_id');
			foreach ($data as $key=>$info) {
				$viewpointId = $info['id'];
				if (isset($cateList[$viewpointId])) {
					$data[$key]['cateName'] = $cateList[$viewpointId];
				}else {
					$data[$key]['cateName'] = null;
				}
			}
		}
		
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
	
	
}