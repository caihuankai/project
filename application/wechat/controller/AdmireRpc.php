<?php

namespace app\wechat\controller;

use app\common\controller\ControllerBase;
use think\config;
use Thrift\Protocol\TBinaryProtocol;
use \TRoomSvrClient;
use Thrift\Transport\THttpClient;
use app\common\controller\JsonResult;
use app\common\model\Live;
use app\wechat\model\User as UserM;
use app\common\model\Course;
use app\wechat\model\CoursePptImg as CoursePptImgM;
use Thrift\Type\TType;
use app\common\model\GlobalLive as GlobalLiveM;

require_once ROOT_PATH . 'extend/Thrift/ThriftStub/RPC_Admire_Push/TRoomSvr.php';

class AdmireRpc extends ControllerBase{
	/**
	 * [admire description]
	 * @param  [type] $srcid   		赞赏人
	 * @param  [type] $srcname   	赞赏人名称
	 * @param  [type] $toid    		被赞赏人
	 * @param  [type] $toidname    	被赞赏人名称
	 * @param  [type] $groupid 		live直播间id
	 * @param  [type] $amount  		赞赏金额
	 * @param  [type] $tiptype 		0
	 * @param  [type] $pushsite 	推送位置 0：live直播间 1：课程直播间
	 * @return [type]          		[description]
	 */
	public function admire($srcid=1706743, $toid=1706761, $gifname="", $giftImg="", $tiptype=0, $pushsite=0, $num=1){
		//获取直播间id
		$LiveModel = new Live();
		$UserModel = new UserM();
		$CourseModel = new Course();
		if($pushsite == 0){
			$LiveBeUser = $LiveModel
			->alias('a')
			->join('user u','u.user_id = a.user_id')
			->where('a.user_id',$toid)
			->field('a.id,u.alias')
			->find();
			if(!empty($LiveBeUser)){
				$groupid = 1000000000 + (int)$LiveBeUser['id'];	
			}else{
				return;
			}
		}elseif($pushsite == 1){
			$LiveBeUser = $CourseModel
			->alias('a')
			->join('user u','u.user_id = a.uid')
			->where('a.id',$toid)
			->field('a.id,a.uid,u.alias')
			->find();
			if(!empty($LiveBeUser)){
				$groupid = (int)$LiveBeUser['id'];
				$toid = (int)$LiveBeUser['uid'];
			}else{
				return;
			}
		}else{
			if($toid == 0){
				$groupid = 1000009999;
				$toid = 0;
				$LiveBeUser['alias'] = '大策略直播间';
			}else{
				$GlobalLiveM = new GlobalLiveM();
				$LiveBeUser = $GlobalLiveM
				->alias('a')
				->join('user u','u.user_id = a.user_id')
				->field('a.id,u.user_id,u.alias,a.pid')
				->where('a.id',$toid)
				->find();
				if(!empty($LiveBeUser)){
					$groupid = 1000000000 + (int)$LiveBeUser['pid'];
					$toid = (int)$LiveBeUser['user_id'];
				}else{
					return;
				}
			}
		}
		
		//获取赞赏人名称
		$srcname = $UserModel->field('alias')->where('user_id',$srcid)->find();
		if(empty($srcname)){
			return;
		}
		//赞赏RCP推送
	    //调用RPC通知c++     -开始
	    try {
	        $transport = new THttpClient(config('RPC_IP'), config('ADMIRE_RPC_PORT'));
	        $transport->setTimeoutSecs(30);
	        $protocol = new TBinaryProtocol($transport);
	        $client = new TRoomSvrClient($protocol);

	        $transport->open();//建立连接
	        $client->proc_give_tip($srcid, $toid, $groupid, $gifname, $tiptype,$srcname['alias'],$LiveBeUser['alias'], $giftImg, $num); //调用通知

	        $transport->close();
	    } catch (\Exception $e) {
	        \think\Log::write('调用RPC失败:' . $e->getMessage(),'rpc');
	        // return $this->errorJson(JsonResult::ERR_RPC_ERROR);
	    }
	    //调用RPC通知c++     -结束
	}
	
	/**
	 * 推送观点到直播间/课程直播间
	 * @param unknown $viewpointId 		观点id
	 * @param unknown $title			标题
	 * @param unknown $userId			用户id
	 * @param unknown $userName			用户名
	 * @param unknown $lead				导语
	 * @param unknown $level			是否收费
	 * @param unknown $price			价格
	 * @param unknown $recommendId 		推荐链接记录id
	 * @param unknown $senderId 		发送人的userId
	 * @param unknown $senderType 		发送人角色：1为讲师，2为助教
	 * @return void|boolean
	 */
	public function sendViewpoint($groupId, $viewpointId, $title, $teacherName, $headAdd, $lead, $level, $price, $recommendId, $senderId)
	{
		//观点RCP推送
		try {
			$transport = new THttpClient(config('RPC_IP'), config('ADMIRE_RPC_PORT'));
			$transport->setTimeoutSecs(30);
			$protocol = new TBinaryProtocol($transport);
			$client = new TRoomSvrClient($protocol);
			
			$transport->open();//建立连接
			$result = $client->proc_send_link($groupId, $title, $teacherName, $lead, $level, $price, $viewpointId, $headAdd, $recommendId, $senderId); //调用通知
			if ($result) {
				return true;
			}else {
				return false;
			}
			
			$transport->close();
		} catch (\Exception $e) {
			\think\Log::write('调用RPC失败:' . $e->getMessage(),'rpc');
			return false;
		}
		//调用RPC通知c++     -结束
		
	}
	/**
	 * 推送公告的直播间
	 * @param  [type] $content 公告内容
	 * @return [type]          [description]
	 */
	public function notice($content){
		//调用RPC通知c++     -开始
	    try {
	        $transport = new THttpClient(config('RPC_IP'), config('ADMIRE_RPC_PORT'));
	        $transport->setTimeoutSecs(30);
	        $protocol = new TBinaryProtocol($transport);
	        $client = new TRoomSvrClient($protocol);

	        $transport->open();//建立连接
	        $client->proc_send_notice($content); //调用通知

	        $transport->close();
	    } catch (\Exception $e) {
	        \think\Log::write('调用RPC失败:' . $e->getMessage(),'rpc');
	        // return $this->errorJson(JsonResult::ERR_RPC_ERROR);
	    }
	    //调用RPC通知c++     -结束
	}
	/**
	 * 推送课程到直播间
	 * @param  [type] $groupid  			直播间id
	 * @param  [type] $title    			课程标题
	 * @param  [type] $source   			发送人名称
	 * @param  [type] $summary  			课程摘要
	 * @param  [type] $bTip     			是否收费 1收费 0免费
	 * @param  [type] $amount   			金额
	 * @param  [type] $courseId 			课程id
	 * @param  [type] $headAdd 				发送人头像
	 * @param  [type] $teacherName 			讲课人名称
	 * @param  [type] $srcImg 				课程封面图片
	 * @param  [type] $recommendLogId 		推荐链接记录id
	 * @param  [type] $senderId 			发送人的userId
	 * @param  [type] $senderType 			发送人角色：1为讲师，2为助教
	 * @return [type]           			[description]
	 */
	public function course($groupid, $title, $source, $summary, $bTip, $amount, $courseId, $head_add, $teachername, $srcimg, $recommendLogId, $senderId){
		//课程RCP推送
		try {
			$transport = new THttpClient(config('RPC_IP'), config('ADMIRE_RPC_PORT'));
			$transport->setTimeoutSecs(30);
			$protocol = new TBinaryProtocol($transport);
			$client = new TRoomSvrClient($protocol);
			
			$transport->open();//建立连接
			$result = $client->proc_send_course($groupid, $title, $source, $summary, $bTip, $amount, $courseId, $head_add, $teachername, $srcimg, $recommendLogId, $senderId); //调用通知
			if ($result) {
				return true;
			}else {
				return false;
			}
			
			$transport->close();
		} catch (\Exception $e) {
			\think\Log::write('发送课程调用RPC失败:' . $e->getMessage(),'rpc');
			return false;
		}
		//调用RPC通知c++     -结束
	}
	/**
	 * 推送虚拟人数到直播间and课程
	 * @param  [type] $id  [description]
	 * @param  [type] $num [description]
	 * @return [type]      [description]
	 */
	public function sendVirtualNum($id,$num){
		try {
			$transport = new THttpClient(config('RPC_IP'), config('ADMIRE_RPC_PORT'));
			$transport->setTimeoutSecs(30);
			$protocol = new TBinaryProtocol($transport);
			$client = new TRoomSvrClient($protocol);
			
			$transport->open();//建立连接
			$result = $client->proc_reloadRoomVirtualNumInfo($id,$num); //调用通知
			if ($result) {
				return true;
			}else {
				return false;
			}
			
			$transport->close();
		} catch (\Exception $e) {
			\think\Log::write('发送课程调用RPC失败:' . $e->getMessage(),'rpc');
			return false;
		}
	}

    /**
     * 推送视频流状态信息
     * @name  sendVideoStream
     * @param $ip
     * @param $id
     * @param $node
     * @param $app
     * @param $appname
     * @param $type
     * @return bool
     */
	public function sendVideoStream($id, $type){
        //调用RPC通知c++     -开始
        try {
            $transport = new THttpClient(config('RPC_IP'), config('ADMIRE_RPC_PORT'));
            $transport->setTimeoutSecs(30);
            $protocol = new TBinaryProtocol($transport);
            $client = new TRoomSvrClient($protocol);

            $transport->open();//建立连接
            if($type == 1){
                $client->proc_liveStart($id); //调用通知
            }else if($type == 2){
                $client->proc_liveStop($id); //调用通知
            }


            $transport->close();
        } catch (\Exception $e) {
            \think\Log::write('发送视频流状态调用RPC失败:' . $e->getMessage(),'rpc');
            return false;
        }
    }


    public function sendCommentAudit(array $msg){
        require_once ROOT_PATH.'/extend/Thrift/ThriftStub/RPC_Comment_Push/TChatSvr.php';

        $msg = new \TChatAuditMsg($msg);

        //调用RPC通知c++     -开始
        try {
            $transport = new THttpClient(config('RPC_IP'), config('RPC_PORT'));
            $transport->setTimeoutSecs(30);
            $protocol = new TBinaryProtocol($transport);
            $client = new \TChatSvrClient($protocol);

            $transport->open();//建立连接
            $client->proc_commentAudit($msg); //调用通知

            $transport->close();
        } catch (\Exception $e) {
            \think\Log::write('发送评论状态调用RPC失败:' . $e->getMessage(),'rpc');
            return false;
        }
    }

    /**
	 * PPT课件推送
	 * @param  [type] $courseId 课程id
	 * @param  [type] $type     推送类型 1 增加 2 删除 3 修改
	 * @param  [type] $imgId    图片id
	 * @return [type]           [description]
	 */
	public function sendPPTware($courseId,$type,$imgId){
		require_once ROOT_PATH.'/extend/Thrift/ChatSvr/TChatSvr.php';

		$CoursePptImgModel = new CoursePptImgM();
		if($type == 1){
			// $data = $CoursePptImgModel->where('qiniuKey','in',$imgId)->where('course_id',$courseId)->select();	
			$data = $CoursePptImgModel->getCourseware($courseId,1);	
		}
		if($type == 2){
			// $where['course_id'] = $courseId;
			// $where['id'] = $imgId;
			// $data = $CoursePptImgModel->where($where)->select();
			// $data = $CoursePptImgModel->getCourseware($courseId,1);	
			$data = $imgId;
		}
		if($type == 3){
			$data = $CoursePptImgModel->getCourseware($courseId,1);	
		}
		$TPPTPicInfo = array();
        foreach ($data as $k => $v) {
        	$vecPPT[$k] = new \TPPTPicInfo( 
        		array(  
				'rank' => $v['sort'],  
				'picId'=>$v['qiniuKey'],
				'groupId' => $courseId,
				'picUrl' => $v['imgUrl']
				) ); 
        	$TPPTPicInfo[$k] = $vecPPT[$k];
        }
        try {
            $transport = new THttpClient(config('RPC_IP'), config('RPC_PORT'));
            $transport->setTimeoutSecs(30);
            $protocol = new TBinaryProtocol($transport);
            $client = new \TChatSvrClient($protocol);

            $transport->open();//建立连接
            $client->proc_optPPTPic($TPPTPicInfo,$type); //调用通知

            $transport->close();
            // return 12312332;
        } catch (\Exception $e) {
            \think\Log::write('调用RPC失败:' . $e->getMessage(),'rpc');
        }
	}
}
