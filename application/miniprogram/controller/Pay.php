<?php
namespace app\miniprogram\controller;

use app\wechat\model\PayOrder;
use payment\wxpay\WxPay;
use app\wechat\model\ThirdLogin;
use app\common\controller\JsonResult;
use app\common\model\Course;
use app\wechat\model\WechatPayOrder;
use app\wechat\model\RcbLog;
use app\miniprogram\controller\CourseDetails;

/**
 * 购买相关接口
 */
class Pay extends App{
	protected $noLoginAction = [
        'WxNotify',
    ];
	/**
	 * 购买记录
	 * @param  integer $user_id 用户id
	 * @param  integer $page    页码
	 * @return [array]           [description]
	 */
	public function buyRecord($user_id,$page=1){
		$PayOrderModel = new PayOrder();
		$data = $PayOrderModel->buyRecord($user_id,$page,$type=10);
		return $this->sucSysJson($data);
	}
	/**
	 * 小程序支付
	 * @param  [type]  $user_id 用户Id
	 * @param  integer $id      课程id
	 * @param  integer $type    支付类型  1：购买课程
	 * @return [array]           [description]
	 */
	public function miniPay($user_id,$id,$type=1){
		$ThirdLoginM = new ThirdLogin();
		//获取用户openid
		$openid = $ThirdLoginM->where('user_id',$user_id)->value('miniprogram_open_id');
		//获取课程价格
		$CourseM = new Course();
		$CoursePrice = $CourseM->where('id',$id)->value('price');
		if(empty($openid) || empty($CoursePrice) || $CoursePrice == 0){
			return $this->errorJson(JsonResult::ERR_PARAMETER);
		}
		//判断用户是否已购买
        $PayOrderModel = new PayOrder();
        $bugStatus = $PayOrderModel->isBuy($user_id,$type,$id);
        if($bugStatus == 1){
            return $this->errorJson(JsonResult::ERR_PAY_REPEAT);
        }
        //创建订单
        $PayOrderInsertData = array();
        $PayOrderInsertData['user_id'] = $user_id;
        $PayOrderInsertData['order_no'] = getTradeNo();
        $PayOrderInsertData['pay_type'] = 7;
        $PayOrderInsertData['client_type'] = 3;
        $PayOrderInsertData['amount'] = $CoursePrice;
        $PayOrderInsertData['num'] = 1;
        $PayOrderInsertData['client_ip'] = request()->ip(0, true);
        $PayOrderInsertData['class_id'] = $id;
        $PayOrderInsertData['type'] = $type;
        $PayOrderInsertData['remark'] = '';
        $PayOrderModel->insert($PayOrderInsertData);
        //小程序发起支付所需参数
		$time_now = time();
        $wxPayData = array(
            'body' => '大策略消费',
            'attach' => '',
            'out_trade_no' => $PayOrderInsertData['order_no'],
            'total_fee' => $CoursePrice*100,
            'time_start' => date('YmdHis', $time_now),
            'time_expire' => date('YmdHis', $time_now + 10 * 60),
            'trade_type' => 'JSAPI',
            'product_id' => "",
            'openId' => $openid,
            'notify_url' => config('MINI_PROGRAM')."/Pay/WxNotify"
        );
        $WxPay = new WxPay();
        $codeUrl = $WxPay->HandleOrder_mini($wxPayData);
        if (!$codeUrl) {
            return $this->errorJson(JsonResult::ERR_PARAMETER);
        }
        return $this->sucSysJson(json_decode($codeUrl));
	}
	/**
	 * 支付回调
	 */
	public function WxNotify(){
		$xml = file_get_contents('php://input');
		if (!$xml) {
            \think\Log::write('Mini_WxPay  xml没有数据', 'pay');
            return 'false';
        }
        \think\Log::write('Mini_WxPay  requery => ' . $xml, 'pay');
        // 验证签名
        $wx = new WxPay();
        $result = $wx->PayResults($xml);
        if (!$result) {
            return 'false';
        }
        $orderNo = $result ['out_trade_no'];
        $third_order_no = $result ['transaction_id'];
        //验证订单
        $PayOrderModel = new PayOrder();
        $payorderInfo = $PayOrderModel->where('order_no', $orderNo)->find();
        if (empty($payorderInfo)){
            \think\Log::write('Mini_WxPay  支付结果中微信订单号不存在', 'pay');
            return 'false';
        }
        if ($payorderInfo['state'] != 0) {
            \think\Log::write('Mini_WxPay  订单重复通知', 'pay');
            return 'false';
        }
        if($payorderInfo['order_no'] != $orderNo){
            \think\Log::write('Mini_WxPay 订单错误', 'pay');
            return 'false';
        }
        if($payorderInfo['amount']*100 != $result['total_fee']){
            \think\Log::write('Mini_WxPay 支付金额错误', 'pay');
            return 'false';
        }
        //保存回调信息   支付结果 result_code
        if ($result ['result_code'] == 'SUCCESS') {
        	//需要保存微信回调内容
            $data = array();
            $data['user_id'] = $result['openid'];
            $data['order_no'] = $result['out_trade_no'];
            $data['third_order_no'] = $result['transaction_id'];
            $data['mch_id'] = $result['mch_id'];
            $data['amount'] = $result['total_fee']/100;
            $data['trade_type'] = $result['trade_type'];
            $data['openid'] = $result['openid'];
            $data['create_time'] = date('Y-m-d H:i:s');
            $data['time_end'] = $result['time_end'];
            $WechatPayOrder = new WechatPayOrder();
            $wechatModel = $WechatPayOrder->where('order_no',$orderNo)->find();
            if(empty($wechatModel)){
                $resultWechat = $WechatPayOrder->insert($data);
            }else{
                $resultWechat = true;
            }
            if ($resultWechat) {
            	//用户ip
            	$third_ip = request()->ip(0, true);
            	//更新购买订单
                $updatePayOrder = $PayOrderModel->where('order_no',$orderNo)
		        ->update([
		            'third_order_no'  => $result['transaction_id'],
		            'total_fee' => $result['total_fee']/100,
		            'pay_time' => date('Y-m-d H:i:s'),
		            'state' => 1,
		            'third_ip' => $third_ip,
		        ]);
		        $RcbLogModel = new RcbLog();
		        //余额变更日志表添加记录
		        $RcbLogdata['order_no'] = $orderNo;
		        $RcbLogdata['user_id'] = $payorderInfo['user_id'];
		        $RcbLogdata['class_id'] = $payorderInfo['class_id'];
		        $RcbLogdata['type'] = 'order_pay';
		        $RcbLogdata['add_time'] = date('Y-m-d H:i:s');
		        $RcbLogdata['available_amount'] = $data['amount'];
		        $RcbLogdata_status = $RcbLogModel->insert($RcbLogdata);
                //购买课程时调用joinCourse
                $CourseDetailsC = new CourseDetails();
                $CourseDetailsC->joinCourse($payorderInfo['user_id'],$payorderInfo['class_id'],true);
		        //返回固定格式
		        if($RcbLogdata_status){
		        	return "<xml><return_code><![CDATA[SUCCESS]]></return_code><return_msg><![CDATA[OK]]></return_msg></xml>";
		        }
            }
        }
	}
}