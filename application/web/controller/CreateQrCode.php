<?php

namespace app\web\controller;

use app\common\controller\ControllerBase;
use app\common\model\QrCode;
use app\wechat\model\Course as CourseM;

/**
 * 生成二维码
 * @author xiaok
 */
class CreateQrCode extends ControllerBase{
	//创建邀请卡 @param live_id:直播间id class_id：课程id type：邀请卡类型 1：课程邀请粉丝 8：栏目邀请粉丝 
	public function index($live_id=0,$class_id=0,$type=1,$user_id=0){
		$QrCodeModel = new QrCode();
		if($type == 1){
			$CourseM = new CourseM();
			$live_id = $CourseM->where('id',$class_id)->value('live_id');
		}
		$QrCode = $QrCodeModel->index($live_id,$class_id,$type,$user_id);
        return $this->sucSysJson($QrCode);
	}
}