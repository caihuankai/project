<?php
namespace app\web\controller;

use app\wechat\model\Course as MCourse;
use app\wechat\model\LiveFocus;
use app\wechat\model\ThirdLogin;
use app\wechat\model\PayOrder;
use app\wechat\model\UserAssistant;
use app\wechat\model\UserJoin;

use app\common\model\LiveImg;
use app\common\model\InvitationcardUser;
use app\common\controller\JsonResult;

class Course extends App
{
	/**
	 * 课程或系列课的详情
	 *
	 * @param  integer $user_id 用户id
	 * @param  integer $id      课程id
	 * @return mixed           [description]
	 */
	public function details($user_id,$id){
		$user_id = (int)$user_id;
		$identity = 0;//用户身份 0学生 1讲师
		// $countFouce = 0;//直播间关注人数
		$popupWindow = 0;//是否弹出倒计时框 1弹 0不弹
		$windowTime = 0;//弹窗倒计时间
		$code = '';//用户token
		$joinCourse = 0;//是否报名课程 1已报名 0未报名
		$RelevantCourse = array();//直播间其他课程
		$img_brief = array();//图片介绍
		$RelevantCourse_count = 0;//直播间其他课程数量
		$class_type = 1;//课程类型 1：单课程 2：系列课  3：系列课子课程
		$update_num = 0;//系列课已更新课程数
		$pushUrl = '';//推流地址
		$CourseModel = new MCourse();
		$LiveFocusModel = new LiveFocus();
		
		$courseInfo = $CourseModel->getCourseInfo($id,$user_id);
		if(empty($courseInfo)){
			return $this->errorJson(JsonResult::ERR_CLASS_NULL);
		}
		//判断课程为单课程或系列课
		if($courseInfo['pid'] == 0 && $courseInfo['type'] == 1){//单课程
			$RelevantCourse = $CourseModel->RelevantCourse($courseInfo['live_id'],$id);
			//直播间其他课程数量
			$RelevantCourse_count = $CourseModel->relevantCourseCount($courseInfo['live_id'],-1);
			$class_type = 1;
		}
		if($courseInfo['type'] == 2){//系列课
			$RelevantCourse = $CourseModel->getChildCourse($courseInfo['id'],0);
			$RelevantCourse_count = count($RelevantCourse);
			$class_type = 2;
			$update_num = $RelevantCourse_count;
			foreach ($RelevantCourse as $k => $v) {
				$v['price'] = floatval($courseInfo['price']);
			}
		}
		if($courseInfo['pid'] != 0){
			$RelevantCourse = $CourseModel->getChildCourse($courseInfo['pid'],$courseInfo['id']);
			$RelevantCourse_count = count($RelevantCourse);
			$class_type = 3;
			//获取系列课价格
			$courseInfo['price'] = $CourseModel->where('id',$courseInfo['pid'])->value('price');
			foreach ($RelevantCourse as $k => $v) {
				$v['price'] = floatval($courseInfo['price']);
			}
		}
		
		
		//更新课程浏览人数
		$updateStudyNum = $CourseModel->where('id',$id)->update([
				'study_num' => $courseInfo['study_num'] + 1,
		]);
		
		if($user_id == $courseInfo['uid']){
			$identity = 1;
		}
		$LiveFocus = $LiveFocusModel->isFocus($courseInfo['live_id'],$user_id);
		
		//判断用户是否存在
		$ThirdLoginModel = new ThirdLogin();
		$ThirdLoginUserinfo = $ThirdLoginModel->alias('t')
		->join('user_phone up','up.user_id = t.user_id and up.type = 1','left')
		->field('t.open_id,up.phone')
		->where('t.user_id',$user_id)->find();
		if(empty($ThirdLoginUserinfo)){
			return $this->errorJson(JsonResult::ERR_USERINFO_NULL);
		}
		
		//判断课程是否已经开始
		if(strtotime($courseInfo['begin_time']) > time()){
			$popupWindow = 1;
			$windowTime = strtotime($courseInfo['begin_time']) - time();
		}
		
		//判断用户是否已购买该课程
		$userBuyStatus = 0;//0未购买 1已购买
		if($courseInfo['level'] == 2){
			$PayOrderModel = new PayOrder();
			$type = 1;
			if($courseInfo['pid'] != 0){
				$class_id = $courseInfo['pid'];
			}else{
				$class_id = $id;
			}
			$userBuyStatus = $PayOrderModel->isBuy($user_id, $type, $class_id);
		}
		
		//判断用户是否该课程为嘉宾
		if($identity == 0){
			$InvitationcardUserModel = new InvitationcardUser();
			$InvitationcardUserInfo = $InvitationcardUserModel->where('get_user_id',$ThirdLoginUserinfo['open_id'])->where('type=2')->where('create_card_class',$id)->find();
			if(!empty($InvitationcardUserInfo)){
				$identity = 2;
			}
		}
		
		//获取图片介绍
		$LiveImgModel = new LiveImg();
		$LiveImgCondition['type'] = 2;
		$LiveImgCondition['type_id'] = $id;
		$img_brief = $LiveImgModel->field('src,explain')->where($LiveImgCondition)->select();
		
		//特训班取PC专用封面图
		if ($courseInfo['type'] == 3 && !empty($courseInfo['src_pc_img'])) {
			$courseInfo['src_img'] = $courseInfo['src_pc_img'];
		}
		// 如果课程图片为空 设置默认图片
		if(empty($courseInfo['src_img'])){
			$courseInfo['src_img'] = \helper\UrlSys::handleCourseBackImg($courseInfo['src_img']);
		}
		
		//判读用户是否已参加该课程
		$UserJoinModel = new UserJoin();
		$join_status = $UserJoinModel->where('user_id',$user_id)->where('course_id',$id)->find();
		if(!empty($join_status)){
			$joinCourse = 1;
		}
		//用户是否为该课程助教
		$UserAssistantModel = new UserAssistant();
		$is_assistant = $UserAssistantModel->checkUserManageTeacher($user_id,$courseInfo['uid']);
		$isAssistant = $is_assistant ? 1 : 2;
		//返回推流地址
		if($courseInfo['form'] == 2){
			$pushUrlDetail = config('push_url')."%u_%u?user=99cj&passwd=hc992017win";
			$pushUrl = sprintf($pushUrlDetail,$user_id,$id);
		}
		//用户是否收藏该课程
		$collection = !empty($courseInfo['collection'])	? 1 : 0;
		//判断报名是否截止
		$currentTime = date('Y-m-d H:i:s');
		$enroll_end_state = ($currentTime < $courseInfo['begin_enroll_time'] || $currentTime > $courseInfo['end_enroll_time']) ? 1 : 0;
		$data = array(
				"id" => $courseInfo['id'],
				"user_id" => $user_id,//用户id
				"class_name" => $courseInfo['class_name'],//课程标题
				"infoVideoArr" => $CourseModel->courseInfoVideoFormat($courseInfo['info_video_qg_id']),// 课程介绍音频链接
				"src_pc_img" => $courseInfo['src_img'],//课程封面图
				"price" => floatval($courseInfo['price']),//课程价格（礼点）
				"level" => $courseInfo['level'],//课程类型
				"status" => $courseInfo['status'],//课程状态 0：等待审核；1：已审核；2：未发布,3：已发布,4：已结束
				"open_status" => $courseInfo['open_status'],//'屏蔽状态，1为开启，2为屏蔽',
				"detail_status"=> $courseInfo['detail_status'],//特训班详情页状态，1为开启，2为屏蔽
				"password" => $courseInfo['password'],//课程密码
				"begin_time" => substr($courseInfo['begin_time'],0,16),//课程开始时间
				"begin_time_full" => $courseInfo['begin_time'],//课程开始时间Y-M-D
				"end_time" => substr($courseInfo['end_time'],0,16),//课程结束时间
				"end_time_full" => $courseInfo['end_time'],//课程结束时间Y-M-D
				"begin_enroll_time" => $courseInfo['begin_enroll_time'],//课程开始报名时间
				"end_enroll_time" => $courseInfo['end_enroll_time'],//课程结束报名时间
				"enroll_end_state" => $enroll_end_state,//报名是否截止：1为截止，0为未截止
				"enroll_max_num" => $courseInfo['enroll_max_num'],//计划招收人数
				"enroll_num" => $courseInfo['enroll_num'] + $courseInfo['virtual_enroll_num'],//招收人数：实际招收人数+虚拟招收人数
				"study_num" => $courseInfo['study_num'] + $courseInfo['virtual_study_num'],//课程观看人数
				"teacher_name" => $courseInfo['teacher_name'],//主讲人
				"lecturers" => $courseInfo['lecturers'],//主讲人介绍
				"brief" => $courseInfo['brief'],//直播介绍
				"preview" => $courseInfo['preview'],//预告
				"review" => $courseInfo['review'],//回顾
				// "img_brief" => ,//课程图片、图片说明
				"img_brief" => $img_brief,//图片介绍
				"live_id" => $courseInfo['live_id'],//直播间id
				"live_user_id" => $courseInfo['live_user_id'],//直播间所属人id
				"live_name" => $courseInfo['alias']."的个人主页",//直播间名字
				"popular" => $courseInfo['popular'],//直播间人气
				"LiveFocus" => $LiveFocus,//是否已关注该直播间 1已关注 0未关注
				"live_open_status" => $courseInfo['live_open_status'],//直播间是否被禁用 1为开启，2为关闭
				"RelevantCourse" => $RelevantCourse,//直播间其他课程
				"countFouce" => $courseInfo['focus_num'],//直播间关注人数
				"identity" => $identity,//用户身份 1讲师or0学生or2嘉宾
				"popupWindow" => $popupWindow,//是否弹出倒计时框 1弹 0不弹
				"windowTime" => $windowTime,//弹窗倒计时间
				"userBuyStatus" => $userBuyStatus,//用户是否已购买该课程 0未购买 1已购买
				"tag" => $courseInfo['cate_name'],//课程分类标签
				"RelevantCourse_count" => $RelevantCourse_count,//直播间课程数量
				"freeze" => $courseInfo['freeze'],//课程主讲人是否被禁用
				// "code" => $code
				"live_img" => $courseInfo['live_img'],//直播间图标
				"join_course" => $joinCourse,//是否报名课程 1已报名 0未报名
				"isAssistant" => $isAssistant,//是否为助教 1是 2否
				"class_type" => $class_type,//课程类型 1：单课程 2：系列课 3:系列课子课程
				"plan_num" => $courseInfo['plan_num'],//计划更新课程数
				"update_num" => $update_num,//系列课已更新课程数
				"form" => $courseInfo['form'],//'课程形式，1为图文语音（普通），2为视频直播，3为ppt直播'
				"head_add" => $courseInfo['head_add'],//用户id
				"collection" => $collection,//是否收藏该课程 1：是 0：否
				"pid" => $courseInfo['pid'],//上级id(系列课id)
				"player_img" => !empty($courseInfo['video_pic']) ? "http://oqt46pvmm.bkt.clouddn.com/".$courseInfo['video_pic'] : "",//播放器默认图片
				"push_url" => $pushUrl, //课程推流地址
				'introductionUrl' => (new \app\wechat\model\QiniuGallerys())->getVideoData($courseInfo['introduction_code_id']), // 介绍视频
				"online_num" => $courseInfo['virtual_num'] + $courseInfo['online_num'],//在线人数
				"bindPhone" => empty($ThirdLoginUserinfo['phone']) ? 1 : 0,//是否需要绑定手机 1是 0否
				"origin_price" => $courseInfo['origin_price'],//课程原价
				"app_id" => $id,
		);
		
		return $this->successJson($data);
	}
	
	/**
	 * 获取课程记录
	 * 可选条件status，open_status，top_status，level，statusIn
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function getCourseList()
	{
		//支持的可选条件
		$conditionList = ['status', 'open_status', 'top_sort', 'level', 'statusIn', 'pid', 'type', 'id', 'form'];
		$request = $this->request;
		//查询的字段，默认全部
		$field = $request->param('field', null);
		$pageNo = $request->param('pageNo/i', 1);
		$perPage = $request->param('perPage/i', 20);
		$orderBy = $request->param('orderBy', 'id asc');
		$isUserInfo = $request->param('isUserInfo/b', false);
		
		$model = new MCourse();
		
		//拼接可选条件
		$condition = [];
		foreach ($conditionList as $param){
			if ($request->has($param)) {
				if ($param == 'statusIn') {
					$condition['status'] = ['in', $request->param($param)];
				}else {
					$condition[$param] = trim($request->param($param));
				}
			}
		}
		
		$result = $model->getCourseListByCondition($field, $condition, $pageNo, $perPage, $orderBy, $isUserInfo);
		
		$pidList = [];
		foreach ($result as $key=>$values) {
			if (isset($values['price'])) {
				$result[$key]['price'] = (float)$values['price'];
			}
			if (isset($values['src_img'])) {
				$result[$key]['process_src_img'] = \helper\UrlSys::handleIndexImg($values['src_img']);
			}
			//检查是否为系列课
			if (isset($values['type']) && isset($values['id']) && $values['type'] == 2) {
				$pidList[] = $values['id'];
			}
		}
		
		//查询系列课现有子课程数量
		if (!empty($pidList)) {
			$childCourseNumList = $model->getChildCourseNum($pidList);
			foreach ($result as $key=>$values) {
				if (isset($values['type']) && isset($values['id']) && $values['type'] == 2) {
					$result[$key]['childCourseNum'] = isset($childCourseNumList[$values['id']]) ? $childCourseNumList[$values['id']] : 0;
				}
			}
		}
		
		return $this->sucSysJson($result);
	}
	
	/**
	 * 根据用户ID获取课程记录，用户ID默认为当前用户
	 * 可选条件status，open_status，top_status，level，statusIn
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function getCourseListByUserId()
	{
		//支持的可选条件
		$conditionList = ['status', 'open_status', 'top_sort', 'level', 'statusIn', 'pid', 'form'];
		$request = $this->request;
		$userData = $this->getSessionUserData();
		$userId = $request->param('userId/i', $userData['user_id']);
		//查询的字段，默认全部
		$field = $request->param('field', null);
		$pageNo = $request->param('pageNo/i', 1);
		$perPage = $request->param('perPage/i', 20);
		$orderBy = $request->param('orderBy', 'id asc');
		$isUserInfo = $request->param('isUserInfo/b', true);
		
		$model = new MCourse();
		
		$condition = [
				'uid'=>$userId
		];
		$condition['type'] = ['in',[1,2]];
		//拼接可选条件
		foreach ($conditionList as $param){
			if ($request->has($param)) {
				if ($param == 'statusIn') {
					$condition['status'] = ['in', $request->param($param)];
				}else {
					$condition[$param] = trim($request->param($param));
				}
			}
		}
		
		$result = $model->getCourseListByCondition($field, $condition, $pageNo, $perPage, $orderBy, $isUserInfo);
		
		$pidList = [];
		foreach ($result as $key=>$values) {
			if (isset($values['price'])) {
				$result[$key]['price'] = (float)$values['price'];
			}
			if (isset($values['src_img'])) {
				$result[$key]['process_src_img'] = \helper\UrlSys::handleIndexImg($values['src_img']);
			}
			//检查是否为系列课
			if (isset($values['type']) && isset($values['id']) && $values['type'] == 2) {
				$pidList[] = $values['id'];
			}
		}
		
		//查询系列课现有子课程数量
		if (!empty($pidList)) {
			$childCourseNumList = $model->getChildCourseNum($pidList);
			foreach ($result as $key=>$values) {
				if (isset($values['type']) && isset($values['id']) && $values['type'] == 2) {
					$result[$key]['childCourseNum'] = isset($childCourseNumList[$values['id']]) ? $childCourseNumList[$values['id']] : 0;
				}
			}
		}
		
		return $this->sucSysJson($result);
	}
	
}