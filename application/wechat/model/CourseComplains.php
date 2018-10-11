<?php

namespace app\wechat\model;

use app\wechat\model\User as MUser;
use app\common\model\ModelBs;
use think\Db;

class CourseComplains extends ModelBs
{
    /**
	 * 保存课程投诉信息
	 */
	public function saveComplain(){
		$m =new MUser();
		$userData = $m->getSessionUserData();
		$userId = $userData['user_id'];
		//$userId = 706743;
		
		//$data['liveId'] = (int)input('liveId');
		//$data['courseId'] = (int)input('courseId');
		$data['courseId'] = (int)input('courseId');
		
        //判断课程是否该用户的
		//$course = Db::connect('bs_db_config')->table('talk_course')->field('live_id,id,uid')->where("uid=$userId")->find($data['courseId']);
		$course = Db::connect('bs_db_config')->table('talk_course')->field('live_id,id,uid')->find($data['courseId']);
		
		if(!$course){
			return WReturn('无效的课程信息',-1);
		}
		
		$courseOwn = Db::connect('bs_db_config')->table('talk_course')->field('live_id,id,uid')->where("uid=$userId")->find($data['courseId']);
		if($courseOwn){
			return WReturn('不能投诉自己的课程',-1,$courseOwn);
		}
		
		//判断是否提交过投诉
		$rs = $this->alreadyComplain($data['courseId'],$userId);

		//if((int)$rs['complainId']>0){
		if((int)$rs['id']>0){
			return WReturn("该课程已进行了投诉,请勿重提提交投诉信息",-1);
		}
		
		$complainContent = [];
		$complainContent[1] = "欺诈（未开课、内容虚假等）";
		$complainContent[2] = "色情";
		$complainContent[3] = "诱导行为";
		$complainContent[4] = "不实信息";
		$complainContent[5] = "违法犯罪";
		$complainContent[6] = "骚扰";
		$complainContent[7] = "侵犯（冒充他人，盗版课程，侵犯名誉等）";
		$complainContent[8] = "其他";
		
		Db::startTrans();
		try{
			/* $data['complainTargetId'] = $userId;
			$data['respondTargetId'] = $course['uid'];
			$data['complainStatus'] = 0;
			$data['complainType'] = (int)input('complainType');
			$data['complainTime'] = date('Y-m-d H:i:s');
			//$data['complainAnnex'] = input('complainAnnex');//上传投诉附件
			//$data['complainContent'] = input('complainContent');
			$data['complainContent'] = "投诉你";			
			//$rs = $this->validate('CourseComplains.add')->save($data); //验证
			$rs = Db::connect('bs_db_config')->table('talk_course_complains')->insert($data); */
			
			$datax['informer_id'] = $userId;
			//$data['defendant_id'] = $course['uid'];
			$datax['defendant_id'] = $data['courseId'];
			$datax['defendant_type'] = 1;
			//$datax['content'] = (int)input('complainType');
			$complainTypex = (int)input('complainType'); 
			if($complainTypex != 8){
				$datax['content'] = $complainContent[(int)input('complainType')];
			}else{
				$datax['content'] = input('complainContent');
			}
			
			$datax['status'] = 1;
			$datax['create_time'] = date('Y-m-d H:i:s');
			$rs = Db::connect('bs_db_config')->table('talk_report')->insert($datax);
			
			if($rs !==false){
				//QiNiu(0, $this->complainId, $data['complainAnnex']);//上传附件至七牛
				Db::commit();
				return WReturn('成功',1);
			}
		}catch (\Exception $e) {
		    Db::rollback();
			return WReturn('投诉失败',-1);
	    }
	    
	}
	
	// 判断是否已经投诉过
	public function alreadyComplain($courseId,$userId){
		//$course = Db::connect('bs_db_config')->table('talk_course_complains')->field('complainId')->where("courseId=$courseId and complainTargetId=$userId")->find();
		//$course = Db::connect('bs_db_config')->table('talk_report')->field('id')->where("courseId=$courseId and informer_id=$userId")->find();
		$course = Db::connect('bs_db_config')->table('talk_report')->field('id')->where("defendant_id=$courseId and informer_id=$userId")->find();
		return $course;
	}
}