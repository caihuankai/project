<?php
namespace app\wechat\controller;

use app\common\controller\ControllerBase;
use app\wechat\model\PayOrder;
use payment\wxpay\WxPay;
use app\wechat\model\WechatPayOrder;
use app\wechat\model\RcbLog;
use app\wechat\model\AdmireRank;
use app\wechat\controller\AdmireRpc;
use app\wechat\model\User as UserModel;
use app\wechat\model\ThirdLogin;
use app\common\controller\JsonResult;
use app\wechat\model\InvitationcardRep;
use app\common\model\Course as CourseModel;
use app\wechat\controller\CourseDetails;

/**
 * 点劵支付
 * @author xiaokai
 * @package app\wechat\controller
 * @date 2017/09/18
 */
class InpourPay extends App{
	/**
	 * 点劵购买相关业务
	 * @param  integer $user_id  用户id
	 * @param  integer $amount   金额
	 * @param  integer $type     1：课程 2：观点 3：live直播打赏 6：课程直播打赏 7：购买观点包周服务 8：公共直播间送礼 9：订阅栏目
	 * @param  integer $class_id 1：课程id 2：观点id 3：讲师id 6：课程id(根据type类型) 7：讲师id 8：课程id(没有课程是传0) 9：栏目id
	 * @param  string  $remark   赞赏内容+礼物(需要---
	 * type:1 文字，2 图片，3 语音，4 课程，5 观点 6 红包 7 回复上墙
	 * content:文字内容 图片url 语音url 课程标题 观点标题 红包 上墙内容
	 * id:课程id 观点id 红包id
     * giftId:礼物id
	 * giftPrice:礼物价格
	 * giftName:礼物名称
	 * giftImg:礼物图片url)
     * courseId:课程id(课程直播间送礼时才需要传)
     * @param  integer  $num   公共直播间送礼数量（默认为1）、订阅栏目是num为订阅天数
	 * @return [type]            [description]
	 */
	public function pay($user_id=1706743,$amount,$class_id,$type,$remark='',$num=1){
        //购买课程时验证价格验证价格
        if($type == 1){
            $CourseModel = new CourseModel();
            $course_price = $CourseModel->where('id',$class_id)->value('price');
            if($course_price != $amount){
                return $this->errorJson(JsonResult::ERR_PARAMETER);
            }
        }
		// 课程直播送礼增加courseId  live直播送礼不需要 
        //$remark = '{"type":3,"content":"http://os700oap7.bkt.clouddn.com/t0vtPT9BCH0AdkS6IDdY6qTYcBE=/FldNH-7bflymEeGpgQ9omDioq5Yf","id":0,"giftPrice":"8","courseId":1798}';
		$user_id = (int)$user_id;
        $amount = $amount;
        $class_id = (int)$class_id;
        $type = (int)$type;
        //判断用户是否已购买
        $PayOrderModel = new PayOrder();
        if($type == 1 || $type == 2){
            $bugStatus = $PayOrderModel->isBuy($user_id,$type,$class_id);
            if($bugStatus == 1){
                return $this->errorJson(JsonResult::ERR_PAY_REPEAT);
            }
        }
        //判断用户是否在观点包周服务有效期
        if($type == 7){
            if($PayOrderModel->serviceValidity($user_id,$class_id)){
                return $this->errorJson(JsonResult::ERR_PAY_REPEAT);
            }
        }
        if($num <= 0){
            return $this->errorJson(JsonResult::ERR_PARAMETER);
        }
        if($type == 8 || $type == 3 || $type == 6){
            $amount = $amount * $num;
        }
        //判断用户是否为马甲用户
        $UserModel = new UserModel();
        $userInfo = $UserModel->where('user_id',$user_id)->find();
        if(empty($userInfo)){
            return $this->errorJson(JsonResult::ERR_USERINFO_NULL);
        }
        if($userInfo['user_type'] == 2){
            $status = $PayOrderModel->buyToVirtual($user_id,getTradeNo(),$amount,$class_id,$type,$remark,request()->ip(0, true),$num);
            return $this->successJson($status['account_balance']-$status['amount_total']);
        }
    	$status = $this->index($user_id,$amount,$class_id,$type,$remark,$num);
    	return $status;
	}
	protected function index($user_id,$money,$class_id,$type,$remark,$num){
		//获取用户openid
        $ThirdLoginModel = new ThirdLogin();
        $userinfo = $ThirdLoginModel->where('user_id',$user_id)->find();
        if(empty($userinfo)){
            return $this->errorJson(JsonResult::ERR_USERINFO_NULL);
        }
        if ($money < 0) {
            return $this->errorJson(JsonResult::ERR_PARAMETER);
        }
        $data = array();
        $data['user_id'] = $user_id;
        $data['order_no'] = getTradeNo();
        $data['pay_type'] = 6;
        $data['client_type'] = 3;
        $data['amount'] = $money;
        $data['num'] = $num;
        $data['client_ip'] = request()->ip(0, true);
        $data['class_id'] = $class_id;
        $data['type'] = $type;
        $data['remark'] = $remark;
        $payId = $this->PayOrder->db()->insertGetId($data);
        $data['openid'] = $userinfo['open_id'];
        if ($payId < 0) {
            return $this->errorJson(JsonResult::ERR_PARAMETER);
        }
        $result['transaction_id'] = $data['order_no'];
        $result['total_fee'] = $money*100;

        return $this->operation($data,$data['order_no'],$result,$data['client_ip'],$user_id,$num);
	}
	protected function operation($data,$orderNo,$result,$third_ip,$user_id,$num){

        $RcbLogModel = new RcbLog();
        $updateRcbLog = $RcbLogModel->saveInfo($data,$orderNo,$result,$third_ip,$user_id);

        if($updateRcbLog != false){
            //如果支付类型为赞赏 则记录用户赞赏对应房间总额 且更新房间被赞赏次数和赞赏总额
            if($data['type'] == 3 || $data['type'] == 6 || $data['type'] == 8){
            	$remarkData = json_decode($data['remark'],true);
                //通知c++
                $giftName = isset($remarkData['giftName']) ? $remarkData['giftName'] : "";
                $giftImg = isset($remarkData['giftImg']) ? $remarkData['giftImg'] : "";
                //推送房间id
                $pushRoomId = isset($remarkData['courseId']) ? $remarkData['courseId'] : $data['class_id'];
                $pushsite = isset($remarkData['courseId']) ? 1 : 0;
                if($data['type'] == 8){
                    $pushsite = 2;
                    $pushRoomId = $data['class_id'];
                }

                $AdmireRpcC = new AdmireRpc();
                $AdmireRpcC->admire($data['user_id'],$pushRoomId,$giftName,$giftImg,0,$pushsite,$num);
            }
            //购买特训课时调用joinCourse
            if($data['type'] == 1){
                $CourseModel = new CourseModel();
                // $courseType = $CourseModel->where('id',$data['class_id'])->value('type');
                // if($courseType == 3){
                    $CourseDetailsC = new CourseDetails();
                    $CourseDetailsC->joinCourse($data['user_id'],$data['class_id'],true);
                // }
            }
            //购买成功推送消息
            (new \app\wechat\controller\SendChatMessage())->sendBuyMsg($data['type'],$data['class_id'],$data['openid']);
            return $this->successJson($updateRcbLog['account_balance']-$updateRcbLog['amount_total']);
        }else{
            return $this->errorJson(JsonResult::ERR_PAY);
        }
	}
}