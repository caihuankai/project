<?php
namespace app\admin\controller;

use app\admin\model\PayOrder as MPayOrder;
use app\admin\model\ReturnVisitLog as MReturnVisitLog;
use app\admin\model\Course as MCourse;
use app\admin\model\User as MUser;
use app\admin\model\CourseUser as MCourseUser;
use app\admin\model\LiveStatistics as MLiveStatistics;
use app\admin\model\ReturnVisitSchedule as MReturnVisitSchedule;

class ReturnVisit extends App
{
	use \app\admin\traits\Common,
	\app\admin\traits\AdminTable,
	\app\admin\traits\Status,
	\app\admin\traits\userNav;
	
	/**
	 * 系列课回访/单次课回访
	 * @return mixed|\think\Response|\think\response\Json|\think\response\View|\think\response\Xml|\think\response\Redirect|\think\response\Jsonp|string
	 * @author liujuneng
	 */
	public function index()
	{
		$type = $this->request->param('type/i', 0);
		
		$tableHeader = [
				['checkbox' => true, 'value' => 1,],
				['field' =>'num', 'title' => '序号',],
				['field' =>'headAdd', 'title' => '头像',],
				['field' =>'userName', 'title' => '昵称',],
				['field' =>'userType', 'title' => '属性',],
				['field' =>'tel', 'title' => '手机',],
				'bugCourse' => '购买系列课',
				['field' =>'bugTime', 'title' => '购买时间',],
				['field' =>'returnVisitLog', 'title' => '客服回访日志',],
				['field' =>'returnVisitTime', 'title' => '回访时间',],
				['field' => 'action', 'title' => '操作',],
		];
		if ($type == 1) {
			$tableHeader['bugCourse'] = '购买单次课';
		}
		$this->setTableHeader($tableHeader)->setTableSearchId('table-search-html');
		
		$payOrderModel = new MPayOrder();
		
		return $this->traitAdminTableList(function () use ($payOrderModel, $type) {
			$field = 'u.user_id, u.head_add, u.alias, u.tel, u.user_type, u.vip_level, count(1) as bugCourse, max(p.pay_time) as pay_time';
			
			$tableTmp = $this->traitAdminTableQueryBuildSql([
					[['userName', ''], 'likeAll', 'u.alias'],
					[['tel', ''], 'eq', 'u.tel'],
			], function () use ($payOrderModel, $type) {
				if ($type == 0) {//系列课
					$payOrderModel->where('c.type', 2)->where('c.pid', 0);
				}elseif ($type == 1) {//单次课
					$payOrderModel->where('c.type', 1)->where('c.pid', 0);
				}
				
				$userTypeSelect = $this->request->param('userType', '');
				if ($userTypeSelect == 'vip') {
					$payOrderModel->where('u.vip_level', '>', 0)->where('u.user_type', 1);
				}elseif ($userTypeSelect == 'vest') {
					$payOrderModel->where('u.user_type', 2);
				}elseif ($userTypeSelect == 'normal') {
					$payOrderModel->where('u.vip_level', 0)->where('u.user_type', 1);
				}
				
				$payOrderModel->where('p.type', 1)->where('p.state', 'in', '1,3')
				->alias('p')
				->join('user u', 'u.user_id = p.user_id')
				->join('course c', 'c.id = p.class_id')
				->group('p.user_id');
				
				return $payOrderModel;
			}, $field, 'p.pay_time desc, p.id desc');

			$this->tableWhere = [];
			$data = $this->traitAdminTableQuery([
					[['dateMin', ''], 'dateMin-date', 'tmp.pay_time'],
					[['dateMax', ''], 'dateMax-date', 'tmp.pay_time '],
			], function () use ($payOrderModel, $tableTmp) {
				$payOrderModel->table($tableTmp)->alias('tmp');
				return $payOrderModel;
			}, '*', 'tmp.pay_time desc');

			$result = [];
			
			if (!empty($data['rows'])) {
				//查询回访日志
				$returnVisitLogModel = new MReturnVisitLog();
				$returnVisitLogType = 0;
				$tabName2 = '';
				if ($type == 0) {//系列课
					$returnVisitLogType = 0;
					$tabName2 = '系列课回访';
				}elseif ($type == 1) {//单次课
					$returnVisitLogType = 2;
					$tabName2 = '单次课回访';
				}
				
				$i = 1;
				foreach ($data['rows'] as $datum){
					$actionList = [
							'写回访'=>[
								'class'=>'action-log',
								'data-user-id'=>$datum['user_id'],
								'data-type'=> $returnVisitLogType
							],
							'查看日志'=>[
								'class'=>'action-query-log',
								'data-user-id'=>$datum['user_id'],
								'data-type'=> $type
							],
							'消息推送'=>[
								'class'=>'action-send-message',
								'data-user-id'=>$datum['user_id'],
							]
					];
					
					$action = self::showOperate($actionList);
					
					//批量查询要用group by，但只能取分组第一条记录；采用子查询能解决，但当前tp版本存在bug，子查询报错。只能逐条查询。
					if ($type == 0) {//系列课
						$returnVisitLogModel->where('type', 'in', '0,1');
					}elseif ($type == 1) {//单次课
						$returnVisitLogModel->where('type', 'in', '2,3');
					}
					$returnVisitLog = $returnVisitLogModel->where('user_id', $datum['user_id'])->field('content,create_time')->order('id desc')->limit(1)->select();
					
					$telPhone = '';
					if (!empty($datum['tel'])) {
						$telPhone = $datum['tel'];
					}else {
						$liveModel = new \app\admin\model\Live();
						$telPhone = $liveModel->getLiveDataByUserId($datum['user_id'], 'mobile_phone')['mobile_phone'];
					}
					
					$userType = '';
					if ($datum['user_type'] == 2) {
						$userType = '马甲';
					}elseif ($datum['vip_level'] > 0) {
						$userType = "VIP会员(VIP{$datum['vip_level']})";
					}else {
						$userType = '正式用户';
					}
					
					$result[] = [
							'num'=>$i,
							'headAdd'=>$this->getTableColumnImgHtml($datum['head_add']),
							'userName'=>\app\admin\model\UrlHtml::goUserDetailsUrl($datum['user_id'], $datum['alias']),
							'userType'=>$userType,
							'tel'=>$telPhone,
							'bugCourse'=>\app\admin\model\UrlHtml::goReturnVisitCourseIndexUrl($datum['user_id'], $type, $datum['bugCourse'], $tabName2),
							'bugTime'=>$datum['pay_time'],
							'returnVisitLog'=> isset($returnVisitLog[0]) ? $returnVisitLog[0]['content'] : '',
							'returnVisitTime'=> isset($returnVisitLog[0]) ? $returnVisitLog[0]['create_time'] : '',
							'action'=>$action,
					];
					
					$i++;
				}
			}
			
			return $this->sucJson([
					'rows' => $result,
					'total' => $data['total'],
			]);
		}, function () {
			$searchUserTypeArr = [
					'all'=>'全部属性',
					'vip'=>'VIP会员',
					'vest'=>'马甲',
					'normal'=>'正式用户'
			];
			$this->assign('searchUserTypeArr', $searchUserTypeArr);
		});
		
	}
	
	/**
	 * 创建回访记录
	 * @param unknown $userId
	 * @param unknown $type
	 * @return \think\response\Json|mixed|string
	 * @author liujuneng
	 */
	public function createReturnVisitLog($userId, $type)
	{
		$request = $this->request;
		
		if ($request->isPost()) {
			$content = trim($request->post('content', ''));
			$courseId = $request->param('courseId', 0);
// 			if ($content == "") {
// 				return $this->errSysJson('记录内容不能为空');
// 			}
			
			$returnVisitLogModel = new MReturnVisitLog();
			
			$data = [
					'user_id'=>$userId,
					'target_id'=>$courseId,
					'type'=>$type,
					'content'=>$content,
					'admin_id'=>$this->getAdminId()
			];
			$resultId = $returnVisitLogModel->insertGetId($data);
			if ($resultId > 0) {
				if ($request->has('isSchedule')) {
					$returnVisitScheduleModel = new MReturnVisitSchedule();
					$updateDate = [
							'log_id'=>$resultId,
							'visit_time'=>date('Y-m-d H:i:s'),
							'status'=>1
					];
					$returnVisitScheduleModel->where('user_id', $userId)->where('target_id', $courseId)->update($updateDate);
				}
				return $this->sucSysJson('记录成功');
			}else {
				return $this->errSysJson('记录失败');
			}
		}
		
		return $this->fetch();
	}
	
	/**
	 * 查询回访日志
	 * @return mixed|\think\Response|\think\response\Json|\think\response\View|\think\response\Xml|\think\response\Redirect|\think\response\Jsonp|string
	 * @author liujuneng
	 */
	public function queryReturnVisitLog()
	{
		$request = $this->request;
		$userId = $request->param('userId');
		$type = $request->param('type');
		$this->setTableHeader([
				['field' =>'courseName', 'title' => '课程名称',],
				['field' =>'content', 'title' => '回访日志内容',],
				['field' =>'adminName', 'title' => '回访人',],
				['field' =>'createTime', 'title' => '回访时间',],
		]);
		
		$returnVisitLogModel = new MReturnVisitLog();
		
		return $this->traitAdminTableList(function () use ($returnVisitLogModel, $userId, $type){
			$field = 'c.class_name, r.content, r.create_time, r.admin_id';
			
			$data = $this->traitAdminTableQuery([], function () use ($returnVisitLogModel, $userId, $type){
				if ($type == 0) {//系列课
					$returnVisitLogModel->where('r.type', 'in', '0,1');
				}elseif ($type == 1) {//单次课
					$returnVisitLogModel->where('r.type', 'in', '2,3');
				}
				
				$returnVisitLogModel->where('r.user_id', $userId)
				->alias('r')
				->join('course c', 'c.id = r.target_id', 'left');
				
				return $returnVisitLogModel;
			}, $field, 'r.id desc');
			
			$result = $adminIds = [];
			foreach ($data['rows'] as $datum){
				$adminIds[] = $datum['admin_id'];
			}
			
			$adminModel = new \app\admin\model\Admin();
			$adminInfo = $adminModel->getAdminName($adminIds);
			
			foreach ($data['rows'] as $datum){
				$result[] = [
						'courseName'=>$datum['class_name'],
						'content'=>$datum['content'],
						'adminName'=>isset($adminInfo[$datum['admin_id']]) ? $adminInfo[$datum['admin_id']] : '',
						'createTime'=>$datum['create_time'],
				];
			}
			
			return $this->sucJson([
					'rows' => $result,
					'total' => $data['total'],
			]);
			
		}, function () use ($userId, $type) {
			$this->assign('tableOtherHtml', $this->tableOtherHtml);
			$this->assign('isShowNav', 'hide');
			$this->assign('userId', $userId);
			$this->assign('type', $type);
		});
	}
	
	/**
	 * 发送消息
	 * @param unknown $userId
	 * @return \think\response\Json|mixed|string
	 * @author liujuneng
	 */
	public function sendMessage($userId)
	{
		$request = $this->request;
		
		if ($request->isPost()) {
			$content = trim($request->post('content'));
			if ($content == "") {
				return $this->errSysJson('请输入推送内容');
			}
			
			$loginModel = model('ThirdLogin');
			$userOpenId = getDataByKey($loginModel->getUserOpenId((array)$userId), $userId, '');
			$sendBool = \WeChat\app::staffMsg($content, $userOpenId);

// 			$model = new \app\common\model\QrCode();
// 			$sendBool = $model->pushMsg($userOpenId, $content);
			
			if ($sendBool) {
				return $this->sucSysJson('消息已经提交微信推送');
			}else {
				return $this->errSysJson('消息推送失败');
			}
		}
		
		return $this->fetch();
	}
	
	/**
	 * 系列课回访（购买系列课详情）/单次课回访（购买单次课详情）
	 * @return mixed|\think\Response|\think\response\Json|\think\response\View|\think\response\Xml|\think\response\Redirect|\think\response\Jsonp|string
	 * @author liujuneng
	 */
	public function courseIndex()
	{
		$request = $this->request;
		$userId = $request->param('userId');
		$type = $request->param('type');
		
		$tableHeader = [
				['checkbox' => true, 'value' => 1,],
				['field' =>'num', 'title' => '序号',],
				['field' =>'headAdd', 'title' => '头像',],
				['field' =>'userName', 'title' => '昵称',],
				['field' =>'tel', 'title' => '手机',],
				'courseName' => '系列课',
				'childCourseName' => '子课程名称',
				['field' =>'status', 'title' => '状态',],
				['field' =>'beginTime', 'title' => '开课时间',],
				['field' =>'accessTime', 'title' => '听课时间',],
				['field' =>'duration', 'title' => '听课时长（分钟）',],
				['field' => 'action', 'title' => '操作',],
		];
		if ($type == 1) {
			$tableHeader['courseName'] = '课程名称';
			unset($tableHeader['childCourseName']);
		}
		$this->setTableHeader($tableHeader)->setTableSearchId('table-search-html');
		
		$payOrderModel = new MPayOrder();
		$bugCourseList = [];
		$courseType = 1;
		$orderStr = 'p.pay_time desc, c.begin_time desc';
		if ($type == 0) {
			$courseType = 2;
			$orderStr = 'c.pid desc, c.begin_time desc';
			//系列课名称查询
			$seriesCourseName = $request->param('seriesCourseName', '');
			if ($seriesCourseName != '') {
				$payOrderModel->where('c.class_name', 'like', "%{$seriesCourseName}%");
			}
		}
		$bugCourseList = $payOrderModel->where('p.user_id', $userId)
		->where('c.type', $courseType)
		->where('c.pid', 0)
		->where('p.type', 1)
		->where('p.state', 'in', '1,3')
		->alias('p')
		->join('course c', 'c.id = p.class_id')
		->order('p.pay_time desc, c.id desc')
		->column('c.class_name', 'class_id');
		
		$courseModel = new MCourse();
		return $this->traitAdminTableList(function () use ($courseModel, $userId, $type, $bugCourseList, $orderStr) {
			$field = 'c.id, c.class_name, c.pid, c.begin_time';
			
			$bugCourseIds = [];
			$isContinue = true;
			$bugCourseIds = array_keys($bugCourseList);
			if (empty($bugCourseIds)) {
				$isContinue = false;
			}
			
			if ($isContinue) {
				$data = $this->traitAdminTableQuery([
						[['courseName', ''], 'likeAll', 'c.class_name'],
				], function () use ($courseModel, $userId, $type, $bugCourseIds) {
					if ($type == 0) {//系列课
						$courseModel->where('c.type', 1)
						->where('c.pid', 'in', $bugCourseIds);
					}elseif ($type == 1) {//单次课
						$courseModel->where('c.type', 1)
						->where('c.pid', 0)
						->where('c.id', 'in', $bugCourseIds);
					}
					
					//状态查询
					$status = $this->request->param('status', '');
					//听课时间查询
					$dateMin = $this->request->param('dateMin', '');
					$dateMax = $this->request->param('dateMax', '');
					if ($dateMax != '') {
						$dateMax = date('Y-m-d', strtotime($dateMax . "+1days"));
					}
					if ($status != -1) {
						if ($status == 0) {//未听课
							$courseModel->where("not exists (select * from talk_course_user cu where c.id = cu.course_id and cu.user_id = {$userId})");
						}elseif ($status == 1) {//已听课
							$sqlTmp = "select * from talk_course_user cu where c.id = cu.course_id and cu.user_id = {$userId} ";
							if ($dateMin != '' || $dateMax != '') {
								if ($dateMin != '') {
									$sqlTmp .= "and cu.create_time >= '{$dateMin}'";
								}
								if ($dateMax!= '') {
									$sqlTmp .= "and cu.create_time <= '{$dateMax}'";
								}
							}
							$courseModel->where("exists ({$sqlTmp})");
						}
					}else {
						$sqlTmp = "select * from talk_course_user cu where c.id = cu.course_id and cu.user_id = {$userId} ";
						if ($dateMin != '' || $dateMax != '') {
							if ($dateMin != '') {
								$sqlTmp .= " and cu.create_time >= '{$dateMin}'";
							}
							if ($dateMax!= '') {
								$sqlTmp .= " and cu.create_time <= '{$dateMax}'";
							}
							$courseModel->where("exists ({$sqlTmp})");
						}
					}
					
					$courseModel->alias('c')
					->join('pay_order p', "c.id = p.class_id and p.user_id = {$userId} and p.type = 1 and p.state in (1,3)", 'left');
					
					return $courseModel;
				}, $field, $orderStr);
			}else {
				return $this->sucJson([
						'rows' => [],
						'total' => 0,
				]);
			}
			
			
			$result = $courseIds = [];
			
			if (!empty($data['rows'])) {
				$userModel = new MUser();
				$userInfo = $userModel->where('user_id', $userId)
				->column('user_id, head_add, alias, tel', 'user_id');
				
				foreach ($data['rows'] as $row){
					$courseIds[] = $row['id'];
				}
				
				//听课时间（第一次进入直播间的时间）
				$courseUserModel = new MCourseUser();
				$courseUserList = $courseUserModel->where('user_id', $userId)
					->where('course_id', 'in', $courseIds)
					->group('course_id')
					->column('create_time', 'course_id');
				
				//听课时长（第一次，按天统计）
				$liveStatisticsModel = new MLiveStatistics();
				$liveStatisticsList = $liveStatisticsModel->where('user_id', $userId)
					->where('statistics_type', 1)
					->where('live_id', 'in', $courseIds)
					->group('live_id')
					->column('total', 'live_id');
				
				$returnVisitLogType = 1;
				if ($type == 0) {//系列课
					$returnVisitLogType = 1;
				}elseif ($type == 1) {//单次课
					$returnVisitLogType = 3;
				}
				
				$i = 1;
				$returnVisitScheduleModel = new MReturnVisitSchedule();
				foreach ($data['rows'] as $datum){
					$returnVisitSchedule = $returnVisitScheduleModel->where('user_id', $userId)->where('target_id', $datum['id'])->where('type', $type)->where('status', 0)->find();
					$actionList = [
							'写回访'=>[
									'class'=>'action-log',
									'data-user-id'=>$userId,
									'data-type'=> $returnVisitLogType,
									'data-course-id'=>$datum['id']
							],
							'消息推送'=>[
									'class'=>'action-send-message',
									'data-user-id'=>$userId,
							],
					];
					if (empty($returnVisitSchedule)) {
						$actionList['预设回访'] = [
								'class'=>'action-set-visit_schedule',
								'data-user-id'=>$userId,
								'data-course-id'=>$datum['id'],
								'data-type'=> $type
						];
					}else {
						$actionList[$this->redSpan('取消预设')] = [
								'class'=>'action-del-visit_schedule',
								'data-user-id'=>$userId,
								'data-course-id'=>$datum['id'],
								'data-type'=> $type
						];
					}
					
					$action = self::showOperate($actionList);
					
					$telPhone = isset($userInfo[$userId]) ? $userInfo[$userId]['tel'] : '';
					if (empty($datum['tel'])) {
						$liveModel = new \app\admin\model\Live();
						$telPhone = $liveModel->getLiveDataByUserId($userId, 'mobile_phone')['mobile_phone'];
					}
					
					$tmp = [
							'num'=>$i,
							'headAdd'=>isset($userInfo[$userId]) ? $this->getTableColumnImgHtml($userInfo[$userId]['head_add']) : '',
							'userName'=>isset($userInfo[$userId]) ? \app\admin\model\UrlHtml::goUserDetailsUrl($userId, $userInfo[$userId]['alias']) : '',
							'tel'=>$telPhone,
							'status'=>isset($courseUserList[$datum['id']]) ? '已听课' : $this->redSpan('未听课'),
							'beginTime'=> $datum['begin_time'],
							'accessTime'=> isset($courseUserList[$datum['id']]) ? $courseUserList[$datum['id']] : null,
							'duration'=> isset($liveStatisticsList[$datum['id']]) ? $liveStatisticsList[$datum['id']] : 0,
							'action'=>$action,
					];
					if ($type == 0) {
						$tmp['courseName'] = $bugCourseList[$datum['pid']];
						$tmp['childCourseName'] = $datum['class_name'];
					}elseif ($type == 1) {
						$tmp['courseName'] = $datum['class_name'];
					}
					$result[] = $tmp;
					
					$i++;
				}
			}
			
			return $this->sucJson([
					'rows' => $result,
					'total' => $data['total'],
			]);
		}, function () use ($type) {
			$this->assign('type', $type);
			$searchStatusArr = [
					-1 => '全部类型',
					0 => '未听课',
					1 => '已听课'
			];
			$this->assign('searchStatusArr', $searchStatusArr);
		});
	}
	
	/**
	 * 预设回访
	 * @param unknown $userId
	 * @param unknown $courseId
	 * @param unknown $type
	 * @return \think\response\Json|mixed|string
	 * @author liujuneng
	 */
	public function setVisitSchedule($userId, $courseId, $type)
	{
		$request = $this->request;
		
		if ($request->isPost()) {
			$presetTime = trim($request->post('presetTime'));
			if ($presetTime == "") {
				return $this->errSysJson('请选择预设日期');
			}
			
			$returnVisitScheduleModel = new MReturnVisitSchedule();
			
			$data = [
					'user_id'=>$userId,
					'target_id'=>$courseId,
					'type'=>$type,
					'preset_time'=>$presetTime,
					'admin_id'=>$this->getAdminId()
			];
			$result = $returnVisitScheduleModel->insert($data);
			if ($result > 0) {
				return $this->sucSysJson('预设成功');
			}else {
				return $this->errSysJson('预设失败');
			}
		}
		
		return $this->fetch();
	}
	
	/**
	 * 删除预设回访
	 * @param unknown $userId
	 * @param unknown $courseId
	 * @param unknown $type
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function delVisitSchedule($userId, $courseId, $type)
	{
		$returnVisitScheduleModel = new MReturnVisitSchedule();
		$condition = [
				'user_id'=>$userId,
				'target_id'=>$courseId,
				'type'=>$type,
				'status'=>0,
		];
		$result = $returnVisitScheduleModel->where($condition)->delete();
		if ($result > 0) {
			return $this->sucSysJson('取消预设成功');
		}else {
			return $this->errSysJson('取消预设失败');
		}
	}
	
	/**
	 * 回访列表（预设回访）
	 * @return mixed|\think\Response|\think\response\Json|\think\response\View|\think\response\Xml|\think\response\Redirect|\think\response\Jsonp|string
	 * @author liujuneng
	 */
	public function returnVisitSchedule()
	{
		$this->setTableHeader([
				['checkbox' => true, 'value' => 1,],
				['field' =>'num', 'title' => '序号',],
				['field' =>'ID', 'title' => 'ID',],
				['field' =>'headAdd', 'title' => '头像',],
				['field' =>'userName', 'title' => '昵称',],
				['field' =>'tel', 'title' => '手机',],
				['field' =>'seriesCourseName', 'title' => '系列课',],
				['field' =>'courseName', 'title' => '课程名称',],
				['field' =>'beginTime', 'title' => '开课时间',],
				['field' =>'presetTime', 'title' => '预设回访时间',],
				['field' =>'returnVisitLog', 'title' => '客服回访日志',],
				['field' =>'returnVisitTime', 'title' => '回访时间',],
				['field' => 'action', 'title' => '操作',],
		])->setTableSearchId('table-search-html');
		
		$returnVisitScheduleModel = new MReturnVisitSchedule();
		
		return $this->traitAdminTableList(function () use ($returnVisitScheduleModel) {
			$field = 'u.user_id, u.head_add, u.alias, u.tel, c.id as courseId, c.pid, c.class_name, c.begin_time, s.id, s.preset_time, s.status';
			
			$data = $this->traitAdminTableQuery([
					[['userName', ''], 'likeAll', 'u.alias'],
					[['tel', ''], 'eq', 'u.tel'],
					[['dateMin', ''], 'dateMin-date', 's.preset_time'],
					[['dateMax', ''], 'dateMax-date', 's.preset_time '],
					[['status/i', -1], 'zero', 's.status'],
			], function () use ($returnVisitScheduleModel) {
				$returnVisitScheduleModel->alias('s')
				->join('user u', 'u.user_id = s.user_id')
				->join('course c', 'c.id = s.target_id');
				
				return $returnVisitScheduleModel;
			}, $field, 's.status asc');
			
			$result = [];
			$courseModel = new MCourse();
			if (!empty($data['rows'])) {
				$pids = [];
				foreach ($data['rows'] as $datum){
					if ($datum['pid'] > 0 && !in_array($datum['pid'], $pids)) {
						$pids[] = $datum['pid'];
					}
				}
				$seriesCourseNameList = [];
				if (!empty($pids)) {
					$seriesCourseNameList = $courseModel->where(['id' => ['in', $pids]])->column('class_name', 'id');
				}
				
				$returnVisitLogModel = new MReturnVisitLog();
				$i = 1;
				foreach ($data['rows'] as $datum){
					//查询回访日志
					$returnVisitLogType = 0;
					$type = 0;
					if ($datum['pid'] > 0) {//系列课
						$type = 0;
						$returnVisitLogType = 0;
					}elseif ($datum['pid'] == 0) {//单次课
						$type = 1;
						$returnVisitLogType = 2;
					}
					
					//判断是否已回访
					$statusText = $returnVisitScheduleModel->getStatusText($datum['status']);
					if ($datum['status'] == 1) {
						$actionList = [
								$statusText=>[]
						];
					}elseif ($datum['status'] == 0) {
						$actionList = [
								$this->redSpan($statusText)=>[
										'class'=>'action-log',
										'data-user-id'=>$datum['user_id'],
										'data-type'=> $returnVisitLogType,
										'data-course-id'=>$datum['courseId'],
								],
						];
					}
					$actionList += [
							'查看日志'=>[
									'class'=>'action-query-log',
									'data-user-id'=>$datum['user_id'],
									'data-type'=> $type
							],
							'消息推送'=>[
									'class'=>'action-send-message',
									'data-user-id'=>$datum['user_id'],
							]
					];
					
					
					$action = self::showOperate($actionList);
					
					//批量查询要用group by，但只能取分组第一条记录；采用子查询能解决，但当前tp版本存在bug，子查询报错。只能逐条查询。
					if ($type == 0) {//系列课
						$returnVisitLogModel->where('type', 'in', '0,1');
					}elseif ($type == 1) {//单次课
						$returnVisitLogModel->where('type', 'in', '2,3');
					}
					$returnVisitLog = $returnVisitLogModel->where('user_id', $datum['user_id'])->field('content,create_time')->order('id desc')->limit(1)->select();
					
					$telPhone = '';
					if (!empty($datum['tel'])) {
						$telPhone = $datum['tel'];
					}else {
						$liveModel = new \app\admin\model\Live();
						$telPhone = $liveModel->getLiveDataByUserId($datum['user_id'], 'mobile_phone')['mobile_phone'];
					}
					
					$result[] = [
							'num'=>$i,
							'ID'=>$datum['id'],
							'headAdd'=>$this->getTableColumnImgHtml($datum['head_add']),
							'userName'=>\app\admin\model\UrlHtml::goUserDetailsUrl($datum['user_id'], $datum['alias']),
							'tel'=> $telPhone,
							'seriesCourseName'=>isset($seriesCourseNameList[$datum['pid']]) ? $seriesCourseNameList[$datum['pid']] : '',
							'courseName'=>$datum['class_name'],
							'beginTime'=>$datum['begin_time'],
							'presetTime'=>$datum['preset_time'],
							'returnVisitLog'=> isset($returnVisitLog[0]) ? $returnVisitLog[0]['content'] : '',
							'returnVisitTime'=> isset($returnVisitLog[0]) ? $returnVisitLog[0]['create_time'] : '',
							'action'=>$action,
					];
					
					$i++;
				}
			}
			
			return $this->sucJson([
					'rows' => $result,
					'total' => $data['total'],
			]);
		}, function () use ($returnVisitScheduleModel){
			$this->assign('searchStatusArr', [-1=>'全部类型'] + $returnVisitScheduleModel->getStatusText(null));
		});
	}
	
	
}