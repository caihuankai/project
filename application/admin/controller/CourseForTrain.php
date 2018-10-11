<?php
namespace app\admin\controller;

use app\admin\model\Course as MCourse;
use app\admin\model\CourseSchedule as MCourseSchedule;
use app\wechat\model\UserJoin as MUserJoin;

use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\THttpClient;

class CourseForTrain extends App
{
	use \app\admin\traits\Common,
	\app\admin\traits\AdminTable,
	\app\admin\traits\Status,
	\app\admin\traits\ImgReset,
	\app\admin\traits\Course,
	\app\admin\traits\userNav;
	
	/**
	 * 特训班列表
	 * type=0	99学院-课程管理-特训班管理
	 * type=1	网站后台管理-课程管理-特训班管理
	 * @return mixed|\think\Response|\think\response\Json|\think\response\View|\think\response\Xml|\think\response\Redirect|\think\response\Jsonp|string
	 * @author liujuneng
	 */
	public function index($type = 0)
	{
		$this->setTableHeader([
				['checkbox' => true, 'value' => 1,],
				['field' => 'num', 'title' => '序号',],
				['field' => 'ID', 'title' => 'ID',],
				['field' => 'className', 'title' => '特训班名称',],
				['field' => 'level', 'title' => '收费类型',],
				['field' => 'price', 'title' => '礼点',],
				['field' => 'enrollMaxNum', 'title' => '预计招生人数',],
				['field' => 'countNum', 'title' => '购买/浏览人数',],
				['field' => 'createTime', 'title' => '创建时间',],
				['field' => 'beginEnrollTime', 'title' => '报名开始时间',],
				['field' => 'endEnrollTime', 'title' => '报名截止时间',],
				['field' => 'beginTime', 'title' => '课程开始时间',],
				['field' => 'endTime', 'title' => '课程结束时间',],
				['field' => 'status', 'title' => '状态',],
				['field' => 'action', 'title' => '操作',],
		])->setToolbarId('table-button-html')->setTableSearchId('table-search-html');
		
		$model = new MCourse();
		
		return $this->traitAdminTableList(function () use ($model, $type){
			$field = 'id,class_name,level,price,enroll_max_num,study_num,create_time,begin_enroll_time,end_enroll_time,begin_time,end_time,open_status';
			
			$data = $this->traitAdminTableQuery([
					[['className', ''], 'likeAll', 'class_name'],
					[['beginEnrollTime', ''], 'dateMin-date', 'begin_enroll_time'],
					[['endEnrollTime', ''], 'dateMax-date', 'end_enroll_time'],
					[['beginTime', ''], 'dateMin-date', 'begin_time'],
					[['endTime', ''], 'dateMax-date', 'end_time'],
					[['level/i', '-1'], 'zero', 'level'],
					[['status/i', '0'], 'eq', 'open_status'],
			], function () use ($model){
				//后台账号已绑定前端账号的情况下，仅显示自己的特训班
				$adminBindUserId = $this->getAdminBindUserId();
				if ($adminBindUserId > 0) {
					$model->where('uid', $adminBindUserId);
				}
				//只取特训课记录
				$model->where('type', 3)->where('status', '<>', 5);
				return $model;
			}, $field, 'open_status asc,id desc');
			
			$result = $courseIds = [];
			
			if (!empty($data['rows'])) {
				foreach ($data['rows'] as $row) {
					$courseIds[] = $row['id'];
				}
				
				// 课程购买人数
				$coursesNum = (new \app\common\model\PayOrder())->countCourseBuy($courseIds);
				
				$i = 1;
				foreach ($data['rows'] as $datum) {
					if ($type == 0) {
						$actionList = [
								'详情' => $this->urlTab('特训班管理', '特训班列表', 'edit',  ['id' => $datum['id']]),
								'删除'=>[
										'class'=>'action-delete',
										'data-id'=>$datum['id'],
								],
								$this->statusActionHtml($datum['open_status'])=>[
										'class' => 'open-status',
										'data-id' => $datum['id'],
										'data-status' => $this->getStatusHtmlDataAttr($datum['open_status']),
								],
								'评论列表'=>$this->urlTab('特训班管理', '特训班列表', '/CommentAudit/courseIndexForTrain', ['courseId' => $datum['id']]),
								'复制链接'=>[
										'class'    => "dataCopy",
										'src' =>  "javascript:_dataCopy({$datum['id']});",
								]
						];
					}elseif ($type == 1) {
						$actionList = [
								'详情' => $this->urlTab('特训班管理', '特训班列表', 'detail',  ['id' => $datum['id']]),
								'复制链接'=>[
										'class'    => "dataCopy",
										'src' =>  "javascript:_dataCopy({$datum['id']});",
								]
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
							'enrollMaxNum' => $datum['enroll_max_num'],
							'countNum'    => $countNum . '/' . $datum['study_num'],
							'createTime'  => $datum['create_time'],
							'beginEnrollTime' => $datum['begin_enroll_time'],
							'endEnrollTime'   => $datum['end_enroll_time'],
							'beginTime'   => $datum['begin_time'],
							'endTime' => $datum['end_time'],
							'status'      => $this->statusColumnHtml($datum['open_status']),
							'action'      => $action,
					];
					
					$i++;
				}
			}
			
			return $this->sucJson([
					'rows' => $result,
					'total' => $data['total'],
			]);
		}, function () use ($model, $type) {
			$this->assign('columnStatusHtml', $this->statusColumnHtml(null));
			$this->assign('actionStatusHtml', $this->statusActionHtml(null));
			$this->assign('searchLevelArr', [-1=>'收费类型'] + $model->getLevelText(null));
			$this->assign('searchOpenStatusArr', [0=>'状态'] + $this->statusActionHtml(null));
			$this->assign('type', $type);
		});
	}
	
	/**
	 * 修改课程屏蔽状态open_status
	 * @param $ids
	 * @param $status
	 * @return \think\response\Json
	 * @author aozhuochao<aozhuochao@99cj.com.cn>
	 * @author liujuneng
	 */
	public function changeStatus($ids, $status)
	{
		$this->validateByName('course.changeStatus');
		
		$model = new MCourse();
		$model->closeStatus($ids, (int)$status);
		
		return $this->sucSysJson(1);
	}
	
	/**
	 * 逻辑删除课程
	 * @param unknown $ids
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function deleteCourse($ids)
	{
		$this->validateByName('common.ids');
		
		$model = new MCourse();
		$successCount = $model->where('id', 'in', $ids)->update(['status'=>5]);
		if ($successCount > 0) {
			return $this->sucSysJson("移除成功");
		}else {
			return $this->errSysJson("移除失败");
		}
	}
	
	/**
	 * 添加特训课
	 * @return mixed|string
	 * @author liujuneng
	 */
	public function add()
	{
		$model = new MCourse();
		$request = $this->request;
		if ($request->isPost()) {
			$className = $request->param('className');
			$teacherId = $request->param('teacherId/i', 0);
			$beginEnrollTime = $request->param('beginEnrollTime');
			$endEnrollTime = $request->param('endEnrollTime');
			$beginTime =  $request->param('beginTime');
			$endTime =  $request->param('endTime');
			$enrollMaxNum =  $request->param('enrollMaxNum/i');
			$level =  $request->param('level/i');
			$price =  $request->param('price/f', 0);
			$originPrice =  $request->param('originPrice/f', 0);
			$coverUrl =  $request->param('coverUrl');
// 			$pcCoverUrl =  $request->param('pcCoverUrl');
			$openStatus =  $request->param('openStatus/i');
			
			$liveModel = new \app\admin\model\Live();
			$liveInfo = $liveModel->getLiveDataByUserId($teacherId);
			
			$insertData = [
					'uid'=>$teacherId,
					'live_id'=>isset($liveInfo['id']) ? $liveInfo['id'] : 0,
					'cate_id'=>0,
					'class_name'=>$className,
// 					'src_pc_img'=>$pcCoverUrl,
					'src_img'=>$coverUrl,
					'price'=>$price,
					'origin_price'=>$originPrice,
					'level'=>$level,
					'enroll_max_num'=>$enrollMaxNum,
					'begin_enroll_time'=>$beginEnrollTime,
					'end_enroll_time'=>$endEnrollTime,
					'begin_time'=>$beginTime,
					'end_time'=>$endTime,
					'open_status'=>$openStatus,
					'detail_status'=>2,
					'type'=>3,
					'form'=>2,
			];
			$courseId = $model->insertGetId($insertData);
			if (is_numeric($courseId)) {
				//直播流地址
				$pushSteam = \app\common\model\RedirectUrl::getVideoSteam($teacherId, $courseId);
				return $this->sucSysJson($pushSteam);
			}else {
				return $this->errSysJson("创建失败");
			}
		}else {
			$searchLevelArr = [
					0=>'免费公开',
					2=>'收费'
			];
			$this->assign('searchLevelArr', $searchLevelArr);
		}
		
		return $this->fetch();
	}
	
	/**
	 * 查找用户信息
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function searchUser()
	{
		$teacherInfo = $this->request->param('teacherInfo');
		$model = new \app\admin\model\User();
		$userInfo = $model->whereOr('user_id', $teacherInfo)->whereOr('alias', 'like', "%$teacherInfo%")->find();
		if (!empty($userInfo)) {
			$result = [
					'userId'=>$userInfo['user_id'],
					'alias'=>$userInfo['alias'],
			];
			return $this->sucSysJson($result);
		}else {
			return $this->errSysJson('用户不存在');
		}
	}
	
	/**
	 * 修改特训班详情
	 * @param unknown $id
	 * @return \think\response\Json|mixed|string
	 * @author liujuneng
	 */
	public function edit($id)
	{
		$this->validateByName('common.id');
		$this->setTabNameThirdly('特训班详情');
		
		$model = new MCourse();
		$request = $this->request;
		
		if ($request->isPost()) {
			$type = $request->param('type');
			if ($type == "schedule") {//修改课程表
				$deleteIdList = $request->param('deleteIdList');
				$addList = $request->param("addList/a");
				$editList = $request->param("editList/a");
				$model = new MCourseSchedule();
				$model->db()->startTrans();
				
				try {
					//删除课程安排
					if (!empty($deleteIdList)) {
						$model->where('id', 'in', $deleteIdList)->delete();
					}
					//增加课程安排
					if (!empty($addList)) {
						$insertData = [];
						foreach ($addList as $addInfo){
							$insertData[] = [
									'course_id'=>$id,
									'teacher_id'=>$addInfo['teacherId'],
									'begin_time'=>$addInfo['beginTime'],
									'end_time'=>$addInfo['endTime'],
							];
						}
						if (!empty($insertData)) {
							$model->insertAll($insertData);
						}
					}
					//修改课程安排
					if (!empty($editList)) {
						foreach ($editList as $editInfo){
							$editData = [
									'teacher_id'=>$editInfo['teacherId'],
									'begin_time'=>$editInfo['beginTime'],
									'end_time'=>$editInfo['endTime'],
							];
							$model->update($editData, ['id'=>$editInfo['id']]);
						}
					}
					
					$model->db()->commit();
					return $this->sucSysJson("保存成功");
				} catch (\Exception $e) {
					$model->db()->rollback();
					return $this->errSysJson("保存失败");
				}
			}elseif ($type == "preview") {//编辑预告
				$preview = $request->param('preview', '');
				$model = new MCourse();
				
				$result = $model->where('id', $id)->update(['preview'=>$preview]);
				if ($result > 0) {
					return $this->sucSysJson("保存成功");
				}elseif ($result == 0) {
					return $this->errSysJson("没有修改");
				}else {
					return $this->errSysJson("保存失败");
				}
			}elseif ($type == "review") {//编辑回顾
				$review = $request->param('review', '');
				$model = new MCourse();
				
				$result = $model->where('id', $id)->update(['review'=>$review]);
				if ($result > 0) {
					return $this->sucSysJson("保存成功");
				}elseif ($result == 0) {
					return $this->errSysJson("没有修改");
				}else {
					return $this->errSysJson("保存失败");
				}
			}elseif ($type == "details") {//编辑详情
				$name = $request->param('name');
				$beginEnrollTime = $request->param('beginEnrollTime');
				$endEnrollTime = $request->param('endEnrollTime');
				$beginTime = $request->param('beginTime');
				$endTime = $request->param('endTime');
				$level = $request->param('level/i', 2);//默认收费
				$price = number_format($request->param('price/f', 0), 2, '.', '');
				$virtualEnrollNum = $request->param('virtualEnrollNum/i');
				$enrollMaxNum = $request->param('enrollMaxNum/i');
				$srcImg = $request->param('srcImg', '');
				$srcImgPc = $request->param('srcImgPc', '');
				$goal = $request->param('goal', '');
				$brief = $request->param('brief', '');
				$content = $request->param('content', '');
				$videoPicId = $request->param('videoPicId/i');
				$videoUrlId = $request->param('videoUrlId/i');
				
				if (empty($name)) {
					return $this->errSysJson('课程名称不能为空');
				}
				if ($level == 2 && $price == 0){
					return $this->errSysJson('收费课程必须设置价格');
				}
				if ($price < 1 && $price != 0) return $this->errSysJson('价格需大于等于1');
				
				$save = [
						'class_name'=>$name,
						'begin_enroll_time'=>$beginEnrollTime,
						'end_enroll_time'=>$endEnrollTime,
						'begin_time'=>$beginTime,
						'end_time'=>$endTime,
						'level'=>$level,
						'price'=>abs($price),
						'virtual_enroll_num'=>$virtualEnrollNum,
						'enroll_max_num'=>$enrollMaxNum,
						'src_img'=>\helper\UrlSys::handleCourseBackImg($srcImg),
						'src_pc_img'=>\helper\UrlSys::handleCourseBackImg($srcImgPc),
						'goal'=>$goal,
						'brief'=>$brief,
						'content'=>$content
				];
				
				$model = new MCourse();
				$model->db()->startTrans();
				try {
					// 更新course
					$model->update($save, ['id' => $id]);
					
					//更新视频直播详情
					(new \app\admin\model\CourseVideo())->saveRecord($id, $videoPicId, $videoUrlId);
					
					$model->db()->commit();
					return $this->sucSysJson("保存成功");
				} catch (\Exception $e) {
					$this->db()->rollback();
					return $this->errSysJson("保存失败");
				}
			}elseif ($type == "changeDetailStatus") {//特训班详情页开关
				$detailStatus = $request->param("detailStatus");
				if (!empty($detailStatus)) {
					$model = new MCourse();
					$result = $model->where('id', $id)->update(['detail_status'=>$detailStatus]);
					if ($result > 0) {
						if ($detailStatus == 1) {
							//获取已报名的用户id
							$userJoinModel = new MUserJoin();
							$userJoinList = $userJoinModel->where('course_id', $id)->column('user_id');
							//查询课程信息
							$model = new MCourse();
							$courseInfo = $model->alias('c')
							->join('talk_course_schedule cs', 'c.id = cs.course_id')
							->field('c.class_name,cs.begin_time')
							->where('cs.course_id', $id)
							->where('cs.begin_time', '>', date('c'))
							->order("cs.begin_time asc")
							->find();
							
							//发送RCP通知C++情况特训班聊天记录
							$rcpResult = $this->sendDelGroupMsgRcp($id);
							
							if (!empty($userJoinList) && !empty($courseInfo)) {
								$replaceArray = [
										'lead'=>[$courseInfo['class_name']],
										'content'=>[$courseInfo['class_name'], $courseInfo['begin_time']]
								];
								//发送到消息中心
								\MessageCenter::instance()->createMessageRecords('TRAIN_COURSE_START_STUDENT', ['courseId'=>$id], $replaceArray, $userJoinList);
								//发送到微信
								$url = $model->getTrainCourseUrl($id);
								$msg = \PushMsgTemp::instance()->getMsg(\PushMsgTemp::COURSE_TRAIN_START, [$courseInfo['class_name'], $courseInfo['begin_time'], $url]);
								$loginModel = model('ThirdLogin');
								$userOpenIdList = $loginModel->getUserOpenId($userJoinList);
								foreach ($userOpenIdList as $userId=>$userOpenId){
									\WeChat\app::staffMsg($msg, $userOpenId);
								}
							}
						}
						return $this->sucSysJson("保存成功");
					}elseif ($result == 0) {
						return $this->errSysJson("没有修改");
					}else {
						return $this->errSysJson("保存失败");
					}
				}
			}
		}else {
			$data = $model->where('id', $id)->find();
			
			if ($data['form'] == 2){ // 视频课程
				$videoData = (new \app\admin\model\CourseVideo())->getRecord($data['id']);
				
				$qiNiuModel = new \app\wechat\model\QiniuGallerys();
				if (!empty($videoData['video_pic_id'])){
					$videoData['videoPicUrl'] = $qiNiuModel->getQiNiuUrl($videoData['video_pic_id']);
				}else{
					$videoData['video_pic_id'] = 0;
					$videoData['videoPicUrl'] = '';
				}
				// 录屏视频地址
				if (!empty($videoData['video_url_id'])){
					$videoData['videoUrl'] = $qiNiuModel->getQiNiuUrl($videoData['video_url_id']);
				}else{
					$videoData['video_url_id'] = 0;
					$videoData['videoUrl'] = '';
				}
				$videoData['pushSteam'] = \app\common\model\RedirectUrl::getVideoSteam($data['uid'], $data['id']);
				$data['videoData'] = $videoData;
			}
			
			//课程安排
			$model = new MCourseSchedule();
			$courseScheduleList = $model->alias('cs')
									->join('user u', 'u.user_id = cs.teacher_id', 'left')
									->field('cs.*,u.alias')
									->where('cs.course_id', $id)
									->select();
			
			$levelArr = [
					0=>'免费公开',
					2=>'收费'
			];
			$this->assign('levelArr', $levelArr);
			$this->assign('data', $data);
			$this->assign('courseScheduleList', $courseScheduleList);
			$this->assign('srcImgHtml', $this->imgResetHtml(
				\helper\UrlSys::handleCourseBackImg($data['src_img']),
				\helper\UrlSys::handleCourseBackImg('', true),
				112,
				200
			));
			$this->assign('srcImgHtmlPc', $this->imgResetHtml(
				\helper\UrlSys::handleCourseBackImg($data['src_pc_img']),
				\helper\UrlSys::handleCourseBackImg('', true),
				112,
				200
			));
		}
		
		return $this->fetch();
	}
	
	/**
	 * 官网后台 特训班详情，仅做展示
	 * @param unknown $id
	 * @return mixed|string
	 */
	public function detail($id)
	{
		$model = new MCourse();
		$data = $model->where('id', $id)->find();
		
		if ($data['form'] == 2){ // 视频课程
			$videoData = (new \app\admin\model\CourseVideo())->getRecord($data['id']);
			
			$qiNiuModel = new \app\wechat\model\QiniuGallerys();
			if (!empty($videoData['video_pic_id'])){
				$videoData['videoPicUrl'] = $qiNiuModel->getQiNiuUrl($videoData['video_pic_id']);
			}else{
				$videoData['video_pic_id'] = 0;
				$videoData['videoPicUrl'] = '';
			}
			// 录屏视频地址
			if (!empty($videoData['video_url_id'])){
				$videoData['videoUrl'] = $qiNiuModel->getQiNiuUrl($videoData['video_url_id']);
			}else{
				$videoData['video_url_id'] = 0;
				$videoData['videoUrl'] = '';
			}
			$videoData['pushSteam'] = \app\common\model\RedirectUrl::getVideoSteam($data['uid'], $data['id']);
			$data['videoData'] = $videoData;
		}
		
		//课程安排
		$model = new MCourseSchedule();
		$courseScheduleList = $model->alias('cs')
								->join('user u', 'u.user_id = cs.teacher_id', 'left')
								->field('cs.*,u.alias')
								->where('cs.course_id', $id)
								->select();
		
		$levelArr = [
				0=>'免费公开',
				2=>'收费'
		];
		$this->assign('levelArr', $levelArr);
		$this->assign('data', $data);
		$this->assign('courseScheduleList', $courseScheduleList);
		
		return $this->fetch();
	}
	
	/**
	 * 新增特训课后弹出复制链接框
	 * @return mixed|string
	 */
	public function copy()
	{
		$linkUrl= trim(input('linkUrl'));
		$this->assign('linkUrl',$linkUrl);
		return $this->fetch();
	}
	
	protected function sendDelGroupMsgRcp($groupId)
	{
		require_once ROOT_PATH.'/extend/Thrift/ThriftStub/RPC_Comment_Push/TChatSvr.php';
		require_once ROOT_PATH.'/extend/Thrift/ThriftStub/RPC_Comment_Push/Types.php';
		//调用RPC通知c++     -开始
		try {
			$transport = new THttpClient(config('RPC_IP'), config('RPC_PORT'));
			$transport->setTimeoutSecs(30);
			$protocol = new TBinaryProtocol($transport);
			$client = new \TChatSvrClient($protocol);
			
			$transport->open();//建立连接
			$result = $client->proc_delGroupMsg($groupId); //调用通知
			
			$transport->close();
			
			return $result;
		} catch (\Exception $e) {
			\think\Log::write('情况特训班聊天记录调用RPC失败:' . $e->getMessage(),'rpc');
			return false;
		}
	}
	
}