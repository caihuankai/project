<?php

namespace app\miniprogram\controller;

use app\wechat\model\QiniuGallerys;
use think\config;
use app\wechat\model\Course;
use app\wechat\model\LiveFocus;
use app\common\controller\JsonResult;
use app\wechat\model\PayOrder;
use app\wechat\model\User as UserMo;
use app\common\model\LiveImg;
use app\common\model\InvitationcardUser;
use app\wechat\model\ThirdLogin;
use app\admin\model\CourseUser;
use app\wechat\model\UserJoin;
use app\wechat\model\AdmireRank;
use app\wechat\model\UserAssistant;
use app\wechat\controller\Home;
use app\common\model\HitRecord;

/**
 * 学生 老师单课页面接口
 * @author xiaok
 * @time 2017/06/05
 */
class CourseDetails extends App{
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
		$CourseModel = new Course();
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
		if($currentTime < $courseInfo['begin_enroll_time']){
			$enroll_end_state = 2;
		}
		//用户行为记录
		(new \app\wechat\model\BehaviorRecord)->record($user_id=$user_id,$type=1,$target_id=$id);
		$data = array(
			"id" => $courseInfo['id'],
			"user_id" => $user_id,//用户id
			"class_name" => $courseInfo['class_name'],//课程标题
			"infoVideoArr" => $CourseModel->courseInfoVideoFormat($courseInfo['info_video_qg_id']),// 课程介绍音频链接
			"src_img" => $courseInfo['src_img'],//课程封面图
			"price" => floatval($courseInfo['price']),//课程价格（礼点）
			"level" => $courseInfo['level'],//课程类型
			"status" => $courseInfo['status'],//课程状态 0：等待审核；1：已审核；2：未发布,3：已发布,4：已结束
			"open_status" => $courseInfo['open_status'],//'屏蔽状态，1为开启，2为屏蔽',
			"detail_status"=> $courseInfo['detail_status'],//特训班详情页状态，1为开启，2为屏蔽
			"password" => $courseInfo['password'],//课程密码
			"begin_time" => substr($courseInfo['begin_time'],0,16),//课程开始时间
			"begin_time_full" => $courseInfo['begin_time'],//课程开始时间Y-M-D
			"begin_enroll_time" => $courseInfo['begin_enroll_time'],//课程开始报名时间
			"end_enroll_time" => $courseInfo['end_enroll_time'],//课程结束报名时间
			"enroll_end_state" => $enroll_end_state,//报名是否截止：1为截止，0为未截止，2为报名未开始
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
            'introductionImgUrl'=>(new \app\admin\model\QiniuGallerys())->getQiNiuUrl($courseInfo['introduction_img_id']),//(new QiniuGallerys())->getQiNiuUrl($courseInfo['introduction_img_id']),//介绍视频封面
			"push_url" => $pushUrl, //课程推流地址
            'introductionUrl' => (new \app\wechat\model\QiniuGallerys())->getVideoData($courseInfo['introduction_code_id']), // 介绍视频
            "online_num" => $courseInfo['virtual_num'] + $courseInfo['online_num'],//在线人数
            "bindPhone" => empty($ThirdLoginUserinfo['phone']) ? 1 : 0,//是否需要绑定手机 1是 0否
            "origin_price" => $courseInfo['origin_price'],//课程原价
            "app_id" => $id,
		);
		
		return $this->successJson($data);
	}

	//加密课程密码验证 $id:课程id $password:课程密码
	public function verify($id=1,$password=''){
		$id = (int)$id;
		if(strlen($password) != 4){
			return $this->errorJson(JsonResult::ERR_PASSWORD);
		}
		$CourseModel = new Course();
		//获取课程密码
		$CoursePassword = $CourseModel->field('password')->where('id',$id)->find();
		if(empty($CoursePassword)){
			return $this->errorJson(JsonResult::ERR_CLASS_NULL);
		}
		if(strtolower($CoursePassword['password']) == strtolower($password)){
			return $this->sucSysJson('','验证通过',0);
		}else{
			return $this->errorJson(JsonResult::ERR_PASSWORD);
		}
	}
	
	//直播中调用接口
	public function liveing($user_id,$id){
		$user_id = (int)$user_id;
		$id = (int)$id;
		$code = '';
		$CourseModel = new Course();
		$LiveFocusModel = new LiveFocus();
		//获取用户code
		$userModel = new UserMo();
		$userInfo = $userModel->field('code,user_type,vip_level')->where('user_id',$user_id)->find();
		if(!empty($userInfo)){
			$code = $userInfo['code'];
		}
		$data = $CourseModel->LiveIntroduce($id);
		if(empty($data)){
			return $this->errorJson(JsonResult::ERR_PARAMETER);
		}
		
		//特训课时，讲师信息以talk_course_schedule为准
		if ($data['type'] == 3) {
			$model = new \app\wechat\model\CourseSchedule();
			$currentTime = date('c');
			$courseSchedule = $model->alias('cs')
			->join('user u','cs.teacher_id = u.user_id','left')
			->field('cs.teacher_id,u.head_add,u.alias,u.freeze')
			->where('cs.course_id', $id)
			->where('cs.begin_time', '<=', $currentTime)
			->where('cs.end_time', '>=', $currentTime)
			->find();
			if (!empty($courseSchedule)) {
				$data['uid'] = $courseSchedule['teacher_id'];
				$data['head_add'] = $courseSchedule['head_add'];
				$data['freeze'] = $courseSchedule['freeze'];
				$data['alias'] = $courseSchedule['alias'];
			}
		}
		
		//更新课程浏览人数
		$updateStudyNum = $CourseModel->where('id',$id)->update([
			'study_num' => $data['study_num'] + 1,
			]);	
		//用户进入课程记录
		$HitRecordModel = new HitRecord();
		$HitRecordStatus = $HitRecordModel->recordJoinCourse($user_id,$id);
		$popupWindow = 0;
		if($HitRecordStatus){
			$popupWindow = 1;
		}
		//用户是否为该课程助教
		$UserAssistantModel = new UserAssistant();
		$is_assistant = $UserAssistantModel->checkUserManageTeacher($user_id,$data['uid']);
		$isAssistant = $is_assistant ? 1 : 2;
		// $data['src_img'] = \helper\UrlSys::handleCourseBackImg($data['src_img']);
		//拉流地址
		$pull_url = "";
		if($data['form'] == 2){
			$pull_url = config('pull_url').$data['uid']."_".$id."/playlist.m3u8";
		}
		$data['code'] = $code;
		$data['isAssistant'] = $isAssistant;
		$data['user_type'] = $userInfo['user_type'];
		$data['video_pic'] = !empty($data['video_pic']) ? "http://oqt46pvmm.bkt.clouddn.com/".$data['video_pic'] : "";
		$data['video_url'] = !empty($data['video_url']) ? "http://oqt46pvmm.bkt.clouddn.com/".$data['video_url'] : "";
		$data['live_state'] = !empty($data['live_state']) ? $data['live_state'] : 2;
		$data['pull_url'] =  $pull_url;
		$data['vip_level'] = $userInfo['vip_level'];//用户VIP等级
		$data['popupWindow'] = $popupWindow;//是否弹框 1弹 0不弹
		$data['LiveFocus'] = $LiveFocusModel->isFocus($data['live_id'],$user_id);//是否已关注该直播间 1已关注 0未关注
		$data['teacher_id'] = $data['uid'];//讲师id

		//用户行为记录
		(new \app\wechat\model\BehaviorRecord)->record($user_id,$type=9,$target_id=$id);


		return $this->successJson($data);
	}
	
	//记录用户浏览记录 
	public function history($user_id,$id){
		$user_id = (int)$user_id;
		$id = (int)$id;
		$CourseUserModel = new CourseUser();
		$CourseUserModel->save_history($user_id,$id);
	}
	
	//用户报名课程
	public function joinCourse($user_id,$id,$isSendMessage = false){
		$user_id = (int)$user_id;
		$id = (int)$id;
		$UserJoinModel = new UserJoin();
		$courseModel = new Course();
		$status = $UserJoinModel->joinClass($user_id,$id);
		//course表报名人数+1
		$courseModel->where('id',$id)->setInc('enroll_num');
		
		if ($isSendMessage) {
			$field = "class_name,begin_time";
			$condition = ['id'=>$id];
			$courseInfo = $courseModel->getCourseListByCondition($field, $condition, 1, 1, 'id asc', true);
			if (!empty($courseInfo)) {
				$courseInfo = $courseInfo[0];
				$replaceArray = [
						'lead'=>[$courseInfo['class_name']],
						'content'=>[$courseInfo['class_name'], $courseInfo['begin_time'], $courseInfo['alias']]
				];
				//发送到消息中心
				\MessageCenter::instance()->createMessageRecords('TRAIN_COURSE_ENROLL_STUDENT', ['courseId'=>$id], $replaceArray, [$user_id]);
				//发送到微信
				$loginModel = model('ThirdLogin');
				$msg = \PushMsgTemp::instance()->getMsg(\PushMsgTemp::COURSE_TRAIN_CREATE, [$courseInfo['class_name'], $courseInfo['begin_time'], $courseInfo['alias']]);
				$userOpenId = getDataByKey($loginModel->getUserOpenId((array)$user_id), $user_id, '');
				\WeChat\app::staffMsg($msg, $userOpenId);
			}
		}
		
		return $this->successJson('报名成功');
	}
	
	/**
	 * [admireRank description]
	 * @param  [type] $course_id 课程Id
	 * @param  [type] $page 页数
	 * @return [type]           [description]
	 */
	public function admireRank($course_id=1706743,$page=1){
		$course_id = (int)$course_id;
		$page = (int)$page;
		$AdmireRankModel = new AdmireRank();
		$data = $AdmireRankModel->admireList($course_id,$page,2);
		if(!empty($data)){
			$HomeC = new Home();
			foreach ($data as $k => $v) {
				$v['head_add'] = $HomeC->userHead($v['head_add']);
			}
		}
		return $this->successJson($data);
	}
	
	/**
	 * 获取系列课子课程
	 * @param  [type] $id 系列课id
	 * @return [type]     [description]
	 */
	public function cildCourse($id){
		$CourseModel = new Course();
		$dataList = $CourseModel->getChildCourse($id,0);
		return $this->sucSysJson($dataList);
	}
	
	/**
	 * 是否官方账号
	 * @param  integer $teacher_id 当前直播间所属讲师id
	 * @return boolean             [description]
	 */
	public function isOfficial($teacher_id=0){
		return $this->sucSysJson($teacher_id==config('official_id') ? true : false);
	}
	
	/**
	 * 根据课程id获取课程安排，仅特训课使用
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function getCourseScheduleByCourseId()
	{
		$courseId = $this->request->param('courseId/i', 0);
		
		$model = new \app\wechat\model\CourseSchedule();
		$result = $model->alias('cs')
		->join('user u','cs.teacher_id = u.user_id','left')
		->field('cs.teacher_id,cs.begin_time,cs.end_time,u.head_add,u.alias')
		->where('cs.course_id', $courseId)->select();
		
		return $this->sucSysJson($result);
	}
	
}