<?php
namespace app\admin\controller;

use app\admin\model\IndexRecommend as MIndexRecommend;
use app\admin\model\User as MUser;
use app\admin\model\Column as MColumn;

use app\admin\model\Viewpoint as MViewpoint;
use app\admin\model\ViewpointCate as MViewpointCate;
use app\admin\model\LiveCate as MLiveCate;
use app\common\model\PayOrder as MPayOrder;
use app\admin\model\Course as MCourse;
use app\common\controller\JsonResult;

/**
 * 官网每日精选
 * @author liujuneng
 */
class IndexRecommendForChoice extends App
{
	use \app\admin\traits\Common,
	\app\admin\traits\AdminTable,
	\app\admin\traits\Status,
	\app\admin\traits\userNav;
	
	/**
	 * 官网首页-每日精选文章列表
	 * @author liujuneng
	 */
	public function index()
	{
		$this->setTableHeader([
				['checkbox' => true, 'value' => 1,],
				['field' =>'num', 'title' => '序号',],
				['field' =>'ID', 'title' => 'ID',],
				['field' =>'title', 'title' => '观点标题',],
				['field' =>'userName', 'title' => '作者',],
				['field' =>'columnName', 'title' => '所属',],
				['field' =>'studyNum', 'title' => '阅读(真实/虚拟/总)',],
				['field' =>'createTime', 'title' => '添加时间',],
				['field' =>'adminName', 'title' => '操作人',],
				['field' => 'action', 'title' => '操作',],
		])->setToolbarId('table-button-html')->setTableSearchId('table-search-html');
		
		$model = new MIndexRecommend();
		
		return $this->traitAdminTableList(function () use ($model){
			$field = 'id, type, type_id, create_time, admin_id';
			
			$data = $this->traitAdminTableQuery([], function () use ($model) {
				$model->where('type', 'in', '12,13');
				return $model;
			}, $field, 'id desc');
			
				$result = [];
				if (!empty($data['rows'])) {
					$viewpointIdList = $viewpointInfoList = $courseIdList = $courseInfoList = $adminIdList = $adminNameList = $userIdList = [];
					foreach ($data['rows'] as $datum) {
						$adminIdList[] = $datum['admin_id'];
						if ($datum['type'] == 12) {
							$viewpointIdList[] = $datum['type_id'];
						}elseif ($datum['type'] == 13) {
							$courseIdList[] = $datum['type_id'];
						}
					}
					
					//查询观点
					if (!empty($viewpointIdList)) {
						$model = new MViewpoint();
						$viewpointInfoList = $model->alias('v')
						->join('talk_column_viewpoint cv', 'cv.viewpoint_id = v.id')
						->join('talk_column c', 'c.id = cv.column_id')
						->where('v.id', 'in', $viewpointIdList)
						->group('v.id')
						->column('v.id as viewpointId, c.name as columnName, v.uid, v.title, v.author, v.study_num, v.virtual_study_num');
					}
					foreach ($viewpointInfoList as $datum) {
						$userIdList[] = $datum['uid'];
					}
					
					//查询课程
					if (!empty($courseIdList)) {
						$courseModel = new MCourse();
						$courseInfoList = $courseModel->where('id', 'in', $courseIdList)->column('id,uid,class_name,study_num,virtual_study_num,type');
					}
					foreach ($courseInfoList as $datum) {
						$userIdList[] = $datum['uid'];
					}
					
					$adminModel = new \app\admin\model\Admin();
					$adminNameList = $adminModel->getAdminName($adminIdList);
					
					$userModel = new MUser();
					$userAliasList = $userModel->getUserColumn($userIdList);
					
					$i = 1;
					foreach ($data['rows'] as $datum) {
						$actionList = [
								'观点'=>[
										'class'=>'action-edit-for-viewpoint',
										'data-id'=>$datum['id'],
										'data-viewpoint-id'=> $datum['type'] == 12 ? $datum['type_id'] : 0,
								],
								'课程'=>[
										'class'=>'action-edit-for-course',
										'data-id'=>$datum['id'],
										'data-course-id'=> $datum['type'] == 13 ? $datum['type_id'] : 0,
								]
						];
						$action = self::showOperate($actionList);
						
						$title = $columnName = $studyNum = $userNameTmp = $userId = '';
						if ($datum['type'] == 12) {
							if (isset($viewpointInfoList[$datum['type_id']])) {
								$title = $viewpointInfoList[$datum['type_id']]['title'];
								$columnName = $viewpointInfoList[$datum['type_id']]['columnName'];
								$studyNum = $this->blueSpan($viewpointInfoList[$datum['type_id']]['study_num'] . '/' . $viewpointInfoList[$datum['type_id']]['virtual_study_num'] . '/' . ($viewpointInfoList[$datum['type_id']]['study_num'] + $viewpointInfoList[$datum['type_id']]['virtual_study_num']) );
								$userNameTmp = $viewpointInfoList[$datum['type_id']]['author'];
								$userId = $viewpointInfoList[$datum['type_id']]['uid'];
							}
						}elseif ($datum['type'] == 13) {
							if (isset($courseInfoList[$datum['type_id']])) {
								$title = $courseInfoList[$datum['type_id']]['class_name'];
								$columnName = $courseModel->getTypeText($courseInfoList[$datum['type_id']]['type']);
								$studyNum = $this->blueSpan($courseInfoList[$datum['type_id']]['study_num'] . '/' . $courseInfoList[$datum['type_id']]['virtual_study_num'] . '/' . ($courseInfoList[$datum['type_id']]['study_num'] + $courseInfoList[$datum['type_id']]['virtual_study_num']) );
								$userId = $courseInfoList[$datum['type_id']]['uid'];
							}
						}
						
						$result[] = [
								'num'=>$i,
								'ID'=>$datum['id'],
								'title'=>$title,
								'userName'=>isset($userAliasList[$userId]) ? $userAliasList[$userId] : $userNameTmp,
								'columnName'=>$columnName,
								'studyNum'=>$studyNum,
								'createTime'=>$datum['create_time'],
								'adminName'=>$adminNameList[$datum['admin_id']],
								'action'=>$action
						];
						
						$i++;
					}
				}
				
				$lackNum = 4 - count($result);
				if ($lackNum > 0) {
					$actionList = [
							'观点'=>[
									'class'=>'action-edit-for-viewpoint',
									'data-id'=>0,
							],
							'课程'=>[
									'class'=>'action-edit-for-course',
									'data-id'=>0,
							]
					];
					$action = self::showOperate($actionList);
					for ($i = 0; $i < $lackNum; $i++) {
						$result[] = ['action'=>$action];
					}
				}
			
			
			return $this->sucJson([
					'rows' => $result,
					'total' => $data['total'],
			]);
		}, function () use ($model){
			
		});
		
	}
	
	/**
	 * 编辑-观点
	 * @param number $indexRecommendId
	 * @param number $viewpointId
	 * @return mixed|\think\Response|\think\response\Json|\think\response\View|\think\response\Xml|\think\response\Redirect|\think\response\Jsonp|string
	 * @author liujuneng
	 */
	public function editForViewpoint($indexRecommendId = 0, $viewpointId = 0)
	{
		$this->setTableHeader([
				['field' =>'num', 'title' => '序号',],
				['field' =>'ID', 'title' => 'ID',],
				['field' =>'userName', 'title' => '作者',],
				['field' =>'publishTime', 'title' => '发布时间',],
				['field' =>'title', 'title' => '标题',],
				['field' =>'cate', 'title' => '标签类别',],
				['field' =>'level', 'title' => '类型',],
				['field' =>'studyNum', 'title' => '阅读量',],
				['field' =>'payNum', 'title' => '购买量',],
				['field' =>'likeNum', 'title' => '有用',],
				['field' =>'price', 'title' => '观点价格（单位：元）',],
				['field' => 'action', 'title' => '操作',],
		])->setToolbarId('table-button-html')->setTableSearchId('table-search-html');
		
		$model = new MViewpoint();
		
		return $this->traitAdminTableList(function () use ($model, $viewpointId){
			
			$field = 'v.id, v.uid, u.alias, v.publish_time, v.title, v.level, v.study_num, v.like_num, v.price, v.status';
			
			$modelFunc = function () use ($model){
				$model->where('v.status', 1)
				->alias('v')
				->join('user u', 'u.user_id = v.uid', 'left')
				->join('talk_column_viewpoint cv', 'cv.viewpoint_id = v.id')
				->group('v.id');
				return $model;
			};
			$data = $this->traitAdminTableQuery([
					[['userName', ''], 'likeAll', 'u.alias'],
					[['title', ''], 'likeAll', 'v.title'],
					[['column/i', -1], 'zero', 'cv.column_id'],
					[['dateMin', ''], 'dateMin-date', 'v.publish_time'],
					[['dateMax', ''], 'dateMax-date', 'v.publish_time '],
					[['level/i', -1], 'zero', 'v.level'],
			], $modelFunc, $field, 'v.publish_time desc, v.id desc');
			//额外计算总记录数
			$tableTmp = $modelFunc()->where($this->tableWhere)->field('v.id')->buildSql();
			$countArr = $model->db()->query("select count(1) as total from {$tableTmp} tmp");
			$data['total'] = $countArr[0]['total'];
			
			$result = $viewpointIds = [];
			
			if (!empty($data['rows'])) {
				foreach ($data['rows'] as $row){
					$viewpointIds[] = $row['id'];
				}
				
				//获取观点对应的分类（取第一个分类）
				$viewpointCateModel = new MViewpointCate();
				$viewpointCateList = $viewpointCateModel->where('vc.viewpoint_id', 'in', $viewpointIds)
				->alias('vc')
				->field('vc.viewpoint_id, lc.name, lc.pid')
				->join('talk_live_cate lc', 'vc.cate_id = lc.id')
				->group('vc.viewpoint_id')
				->fetchClass('\CollectionBase')
				->select()
				->column(null, 'viewpoint_id');
				
				$payOrderModel = new MPayOrder();
				$payNumList = $payOrderModel->countCourseBuy($viewpointIds);
				
				$i = 1;
				foreach ($data['rows'] as $datum){
					$actionList = null;
					if ($datum['id'] != $viewpointId) {
						$actionList = [
								'选择'=>[
										'class'=>'action-select-choice-viewpoint',
										'data-id'=>$datum['id'],
								],
						];
					}
					
					$action = self::showOperate($actionList);
					
					$payNum = !empty($payNumList[$datum['id']]) ? $payNumList[$datum['id']] : 0;
					$cate = '';
					if (!empty($viewpointCateList[$datum['id']])) {
						if ($viewpointCateList[$datum['id']]['pid'] !== 0) {
							$liveCateModel= new MLiveCate();
							$cate = $liveCateModel->where('id', $viewpointCateList[$datum['id']]['pid'])->value('name');
						}else {
							$cate = $viewpointCateList[$datum['id']]['name'];
						}
					}
					
					$result[] = [
							'num'=>$i,
							'ID'=>$datum['id'],
							'userName'=>\app\admin\model\UrlHtml::goUserDetailsUrl($datum['uid'], $datum['alias']),
							'publishTime'=>$datum['publish_time'],
							'title'=>$datum['title'],
							'cate'=>$cate,
							'level'=>$model->getLevelText($datum['level']),
							'studyNum'=>$this->blueSpan($datum['study_num']),
							'payNum'=>$this->blueSpan($payNum),
							'likeNum'=>$this->blueSpan($datum['like_num']),
							'price'=>$this->redSpan($datum['price']),
							'action'=>$action,
					];
					
					$i++;
					
				}
				
			}
			
			return $this->sucJson([
					'rows' => $result,
					'total' => $data['total'],
			]);
		}, function () use ($model, $indexRecommendId, $viewpointId){
			$this->assign('tableOtherHtml', $this->tableOtherHtml);
			$this->assign('isShowNav', 'hide');
			$columnModel = new MColumn();
			$columnList = $columnModel->where('status', 1)->column('name', 'id');
			$this->assign('searchColumnArr', [-1=>'全部栏目'] + $columnList);
			$this->assign('searchLevelArr', [-1=>'全部类型'] + $model->getLevelText(null));
			$this->assign('indexRecommendId', $indexRecommendId);
			$this->assign('viewpointId', $viewpointId);
		});
		
	}
	
	/**
	 * 编辑-课程
	 * @param number $indexRecommendId
	 * @param number $courseId
	 * @return mixed|\think\Response|\think\response\Json|\think\response\View|\think\response\Xml|\think\response\Redirect|\think\response\Jsonp|string
	 * @author liujuneng
	 */
	public function editForCourse($indexRecommendId = 0, $courseId = 0)
	{
		$this->setTableHeader([
				['field' => 'num', 'title' => '序号',],
				['field' => 'ID', 'title' => 'ID',],
				['field' => 'className', 'title' => '课程名称',],
				['field' => 'level', 'title' => '收费类型',],
				['field' => 'price', 'title' => '礼点',],
				['field' => 'type', 'title' => '类型',],
				['field' => 'countNum', 'title' => '购买/浏览人数',],
				['field' => 'teacherName', 'title' => '创建人',],
				['field' => 'createTime', 'title' => '创建时间',],
				['field' => 'action', 'title' => '操作',],
		])->setToolbarId('table-button-html')->setTableSearchId('table-search-html');
		
		$model = new MCourse();
		
		return $this->traitAdminTableList(function () use ($model, $courseId){
			$field = 'c.id,c.class_name,c.level,c.price,c.type,c.study_num,c.create_time,u.alias';
			
			$data = $this->traitAdminTableQuery([
					[['className', ''], 'likeAll', 'c.class_name'],
					[['userName', ''], 'likeAll', 'u.alias'],
					[['type', '-1'], 'zero', 'c.type'],
					[['level/i', '-1'], 'zero', 'c.level'],
			], function () use ($model){
				$model->alias('c')
				->join('user u', 'u.user_id = c.uid', 'left')
				->join('live l', 'l.id = c.live_id and l.open_status = 1')
				->where('c.open_status', 1)->where('c.status', '<>', 5);
				return $model;
			}, $field, 'c.id desc');
			
			$result = $courseIds = [];
			
			if (!empty($data['rows'])) {
				foreach ($data['rows'] as $row) {
					$courseIds[] = $row['id'];
				}
				
				// 课程购买人数
				$coursesNum = (new \app\common\model\PayOrder())->countCourseBuy($courseIds);
				
				$i = 1;
				foreach ($data['rows'] as $datum) {
					$actionList = null;
					if ($datum['id'] != $courseId) {
						$actionList = [
								'选择'=>[
										'class'=>'action-select-choice-course',
										'data-id'=>$datum['id'],
								],
						];
					}
					
					$action = self::showOperate($actionList);
					
					$countNum = !empty($coursesNum[$datum['id']]) ? $coursesNum[$datum['id']] : 0;
					$result[] = [
							'num'         => $i,
							'ID'          => $datum['id'],
							'className'   => $datum['class_name'],
							'level'       => $model->getLevelText($datum['level']),
							'price'  	  => $datum['price'],
							'type' 		  => $model->getTypeText($datum['type']),
							'countNum'    => $countNum . '/' . $datum['study_num'],
							'teacherName' => $datum['alias'],
							'createTime'  => $datum['create_time'],
							'action'      => $action,
					];
					
					$i++;
				}
			}
			
			return $this->sucJson([
					'rows' => $result,
					'total' => $data['total'],
			]);
		}, function () use ($model, $indexRecommendId, $courseId) {
			$this->assign('tableOtherHtml', $this->tableOtherHtml);
			$this->assign('isShowNav', 'hide');
			$this->assign('searchLevelArr', [-1=>'收费类型'] + $model->getLevelText(null));
			$this->assign('searchTypeArr', [-1=>'课程类型'] + $model->getTypeText(null));
			$this->assign('indexRecommendId', $indexRecommendId);
			$this->assign('courseId', $courseId);
		});
	}
	
	/**
	 * 选择观点推荐到每日精选
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function addIndexRecommendForChoiceViewpoint()
	{
		$request = $this->request;
		$viewpointId = $request->post('viewpointId/i', 0);
		$indexRecommendId = $request->post('indexRecommendId/i', 0);
		
		$viewpointModel = new MViewpoint();
		$viewpointList = $viewpointModel->getViewpointByIdList([$viewpointId]);
		if (empty($viewpointList)) {
			return $this->errSysJson(JsonResult::ERR_VIEWPOINT_NOT_EXIST);
		}else {
			$indexRecommendModel = new MIndexRecommend();
			
			$data = [
					'type'=>12,
					'type_id'=>$viewpointId,
					'admin_id'=>$this->getAdminId(),
					'sort'=>1,
					'link'=>$viewpointModel->getViewpointUrl($viewpointId),
					'name'=>$viewpointList[0]['title'],
			];
			if (empty($indexRecommendId)) {
				$result = $indexRecommendModel->insert($data);
			}else {
				$data['create_time'] = date('c');
				$result = $indexRecommendModel->db()->where('id', $indexRecommendId)->update($data);
			}
			
			if ($result > 0) {
				return $this->sucSysJson("推荐成功");
			}else {
				return $this->errSysJson("推荐失败");
			}
		}
	}
	
	/**
	 * 选择课程推荐到每日精选
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function addIndexRecommendForChoiceCourse()
	{
		$request = $this->request;
		$courseId = $request->post('courseId/i', 0);
		$indexRecommendId = $request->post('indexRecommendId/i', 0);
		
		$courseModel = new MCourse();
		$courseList = $courseModel->getCourseInfo($courseId);
		if (empty($courseList)) {
			return $this->errSysJson(JsonResult::ERR_COURSE_NOT_EXIST);
		}else {
			$indexRecommendModel = new MIndexRecommend();
			
			$data = [
					'type'=>13,
					'type_id'=>$courseId,
					'admin_id'=>$this->getAdminId(),
					'sort'=>1,
					'link'=>$courseModel->getCourseUrl($courseId),
					'name'=>$courseList['class_name'],
			];
			if (empty($indexRecommendId)) {
				$result = $indexRecommendModel->insert($data);
			}else {
				$data['create_time'] = date('c');
				$result = $indexRecommendModel->db()->where('id', $indexRecommendId)->update($data);
			}
			
			if ($result > 0) {
				return $this->sucSysJson("推荐成功");
			}else {
				return $this->errSysJson("推荐失败");
			}
		}
	}
	
}