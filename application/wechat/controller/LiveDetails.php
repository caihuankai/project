<?php

namespace app\wechat\controller;

use app\common\controller\ControllerBase;
use app\wechat\model\AdmireRank;
use app\wechat\model\Course;
use app\common\controller\JsonResult;
use app\wechat\controller\AdmireRpc;
use app\admin\model\Notice;
use app\common\model\HitRecord;
use app\wechat\model\RecommendLog;
use app\wechat\controller\Home;
use app\wechat\model\UserAssistant;

/**
 * live直播间所需接口
 * @author xiaok
 * @time 2017/08/10
 */
class LiveDetails extends App{
	/**
	 * 获取赞赏排行版
	 * @param  [type] $user_id 主讲人id
	 * @param  [type] $page 页数
	 * @return [type] array
	 */
	public function admireRank($user_id=1706743,$page=1){
		$user_id = (int)$user_id;
		$page = (int)$page;
		$AdmireRankModel = new AdmireRank();
		$data = $AdmireRankModel->admireList($user_id,$page,1);
		if(!empty($data)){
			$HomeC = new Home();
			foreach ($data as $k => $v) {
				$v['head_add'] = $HomeC->userHead($v['head_add']);
			}
		}
		return $this->successJson($data);
	}
	/**
	 * 获取发送课程列表
	 * @param [type] $user_id 主讲人id
	 */
	public function SendCourseList($user_id=1706743){
		$user_id = (int)$user_id;
		$CourseModel = new Course();
		$where['uid'] = $user_id;
		$CourseList = $CourseModel->field('id,class_name,src_img,study_num,begin_time,level,price')->where($where)->where('status <> 5')->select();
		return $this->successJson($CourseList);
	}
	/**
	 * 发送课程到live直播间
	 * @param  [type] $courseId 课程id
	 * @param  [type] $user_id  推送人id
	 * @return [type]           [description]
	 */
	public function sendCourse($courseId=1, $senderId=0, $receiverType=0, $receiverId=0){
		if (empty($senderId)) {
			return $this->errSysJson('senderId不能为空');
		}elseif (empty($receiverType)) {
			return $this->errSysJson('receiverType不能为空');
		}elseif (!in_array($receiverType, [1,2])) {
			return $this->errSysJson('receiverType必须在 1,2 范围内');
		}elseif ($receiverType == 2 && empty($receiverId)) {
			return $this->errSysJson('receiverType=2时，receiverId不能为空');
		}
		$courseId = (int)$courseId;
		$senderId = (int)$senderId;
		$where['a.id'] = $courseId;
		$CourseModel = new Course();
		$AdmireRpcC = new AdmireRpc();
		$CourseInfo = $CourseModel
		->alias('a')
		->join('user u','u.user_id = a.uid','left')
		->field('a.id,a.live_id,a.uid,a.class_name,a.teacher_name,a.brief,a.level,a.price,a.src_img,u.alias,u.head_add')
		->where($where)
		->where('a.status <> 5')->find();
		if(empty($CourseInfo)){
			return $this->errorJson(JsonResult::ERR_CLASS_NULL);
		}
		
		$user_id = $CourseInfo['uid'];
		if (empty($senderId)) {
			$senderId = $user_id;
		}
		
		if ($user_id != $senderId) {
			$userAssistantModel = new UserAssistant();
			$isAssistant = $userAssistantModel->checkUserManageTeacher($senderId, $user_id);
			if (!$isAssistant) {
				return $this->errSysJson('发送人不为讲师的助教，无法发送');
			}
		}
		
		$groupId = null;
		if ($receiverType == 1) {
			$receiverId = (int)$CourseInfo['live_id'];
			$groupId = $receiverId + 1000000000;
		}elseif ($receiverType == 2){
			$courseInfo = $CourseModel->get($receiverId);
			if (empty($courseInfo)) {
				return $this->errSysJson('课程直播间不存在');
			}else {
				$groupId = $receiverId;
			}
		}
		$RecommendLogModel = new RecommendLog();
		$data['target_id'] = $courseId;
		$data['create_time'] = date('Y-m-d H:i:s');
		$data['user_id'] = $user_id;
		$data['type'] = 1;
		$data['sender_id'] = $senderId;
		$data['receiver_type'] = $receiverType;
		$data['receiver_id'] = $receiverId;
		$insertStatus = $RecommendLogModel->insertGetId($data);
		if($insertStatus <= 0){
			return $this->errorJson(JsonResult::ERR_SAVE_ERROR);
		}
		$bTip = 1;
		if($CourseInfo['level'] == 0 || $CourseInfo['level'] == 1){
			$bTip = 0;
		}
		$status = $AdmireRpcC->course($groupId,$CourseInfo['class_name'],$CourseInfo['alias'],$CourseInfo['brief'],$bTip,$CourseInfo['price'],(int)$CourseInfo['id'],$CourseInfo['head_add'],$CourseInfo['teacher_name'],$CourseInfo['src_img'],$insertStatus,$senderId);
		if($status){
			$rtd = "发送成功";
		}else{
			$rtd = "发送失败";
		}
		return $this->successJson($rtd);
	}
	/**
	 * 获取直播间公告
	 * @return [type] [description]
	 */
	public function liveNotice(){
		$NoticeModel = new Notice();
		$date = time();
		$data = $NoticeModel->where('status=1')->where('UNIX_TIMESTAMP(endtime)>'.$date)->select();
		if(!empty($data)){
			foreach ($data as $k => $v) {
				$v['title'] = $v['content'];
			}
		}
		return $this->successJson($data);
	}
	/**
	 * 记录当日进入live直播用户
	 * @param [type] $user_id 用户id
	 * @param [type] $id      直播间id
	 */
	public function RecordJoinUser($user_id,$id){
		$user_id = (int)$user_id;
		$id = (int)$id;
		$HitRecordModel = new HitRecord();
		$status = $HitRecordModel->recordJoinLive($user_id,$id);
		if($status){
			return $this->successJson('记录成功');
		}else{
			return $this->errorJson(JsonResult::ERR_SAVE_ERROR);
		}
	}
}