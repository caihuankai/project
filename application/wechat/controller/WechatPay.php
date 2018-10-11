<?php
namespace app\wechat\controller;

use app\common\controller\ControllerBase;
use app\common\controller\JsonResult;
use payment\wxpay\WxPay;
use payment\wxpay\JsApiPay;
use app\wechat\model\PayOrder;
use app\wechat\model\ThirdLogin;
use think\config;


/**
 * 微信支付
 * @author xiaok
 * @package app\wechat\controller
 * @date 2017/05/23
 */
class WechatPay extends ControllerBase{
    //JSAPI支付 $class_id:1：课程id 2：观点id 3：讲师id
    //$type：1：课程 2：观点 3：打赏
    //$remake 赞赏内容
	public function pay($user_id=0,$amount=0,$class_id=0,$type=1,$remark='')
    {	
        $user_id = (int)$user_id;
        $amount = $amount;
        $class_id = (int)$class_id;
        $type = (int)$type;
    	$data = $this->index($user_id,$amount,$class_id,$type,$remark);
        return $data;die;
    	$this->assign('jsApiParameters',$data);
        return $this->fetch();
    }

    public function index($user_id,$money,$class_id,$type,$remark)
    {	
        // $user_id = \think\Session::get('user_id');
        //获取用户openid
        $ThirdLoginModel = new ThirdLogin();
        $userinfo = $ThirdLoginModel->where('user_id',$user_id)->find();
        if(empty($userinfo)){
            return $this->errorJson(JsonResult::ERR_USERINFO_NULL);
        }
        $openId = $userinfo['open_id'];
    	//获取用户openid
		// $tools = new JsApiPay();
		// $openId = $tools->GetOpenid();

        // $money = 0.01;
        if ($money < 0) {
            return $this->errorJson(JsonResult::ERR_PARAMETER);
        }


        $data = array();
        $data['user_id'] = $user_id;
        $data['order_no'] = getTradeNo();
        $data['pay_type'] = 2;
        $data['client_type'] = 3;
        $data['amount'] = $money;
        $data['client_ip'] = request()->ip(0, true);
        $data['class_id'] = $class_id;
        $data['type'] = $type;
        $data['remark'] = $remark;
        $payId = $this->PayOrder->db()->insertGetId($data);

        $data['subject'] = '支付主题';
        $data['backView'] = 1;
        $data['openId'] = $openId;

        if ($payId < 0) {
            return $this->errorJson(JsonResult::ERR_PARAMETER);
        }
            return $this->wxPay($data);
    }

    private function wxPay($data)
    {
        $time_now = time();
        $wxPayData = array(
            'body' => '大策略充值',
            'attach' => '',
            'out_trade_no' => $data ["order_no"],
            'total_fee' => $data ["amount"] * 100,
            // 'total_fee' => $data ["amount"] * 1,
            'time_start' => date('YmdHis', $time_now),
            'time_expire' => date('YmdHis', $time_now + 10 * 60),
            // 'goods_tag' => '/',
            'trade_type' => 'JSAPI',
            'product_id' => "",
            'openId' => $data['openId'],
            'notify_url' => config('WX_DOMAIN')."/PayNotify/WxNotify"
        );
        $WxPay = new WxPay();
        $codeUrl = $WxPay->HandleOrder($wxPayData);
        if (!$codeUrl) {
            return $this->errorJson(JsonResult::ERR_DB);
        }
        return $codeUrl;die;
        return $this->sucJson(array(
            'code' => 0,
            "data" => array(
                'appId' => $codeUrl ["appid"],
                'partnerId' => $codeUrl ["partnerid"],
                'prepayId' => $codeUrl ["prepayid"],
                'nonceStr' => $codeUrl ["noncestr"],
                'timeStamp' => $codeUrl ["timestamp"],
                'package' => $codeUrl ["package"],
                'sign' => $codeUrl ["sign"],
                'dclOrderNo' => $data ["order_no"],
                'backView' => $data["backView"]
            )
        ));
//        exit (json_encode());
    }

    

    //NATIVE扫码支付
    public function native_pay($user_id=1706743,$amount=0.01){
        $user_id = (int)$user_id;
        $amount = $amount;
        $data = $this->index_native($user_id,$amount);
        $result['qr_url'] = 'http://paysdk.weixin.qq.com/example/qrcode.php?data='.$data['code_url'];
        $result['order_no'] = $data['order_no'];
        return $this->successJson($result);
    }

    //NATIVE扫码支付
    public function index_native($user_id,$money)
    {   
        $ThirdLoginModel = new ThirdLogin();
        $userinfo = $ThirdLoginModel->where('user_id',$user_id)->find();
        if(empty($userinfo)){
            return $this->errorJson(JsonResult::ERR_USERINFO_NULL);
        }
        $openId = $userinfo['open_id'];

        if ($money < 0) {
            return $this->errorJson(JsonResult::ERR_PARAMETER);
        }
        $data = array();
        $data['user_id'] = $user_id;
        $data['order_no'] = getTradeNo();
        $data['pay_type'] = 2;
        $data['client_type'] = 0;
        $data['amount'] = $money;
        $data['client_ip'] = request()->ip(0, true);
        $data['type'] = 4;
        $payId = $this->PayOrder->db()->insertGetId($data);
        $data['subject'] = '支付主题';
        $data['backView'] = 1;
        $data['openId'] = $openId;

        if ($payId < 0) {
            return $this->errorJson(JsonResult::ERR_PARAMETER);
        }
        return $this->wxPay_native($data);
    }
    //NATIVE扫码支付
    private function wxPay_native($data)
    {
        $time_now = time();
        $wxPayData = array(
            'body' => '大策略充值--礼点充值',
            'attach' => '',
            'out_trade_no' => $data ["order_no"],
            'total_fee' => $data ["amount"] * 100,
            'time_start' => date('YmdHis', $time_now),
            'time_expire' => date('YmdHis', $time_now + 120 * 60),
            'trade_type' => 'NATIVE',
            'product_id' => $data ["order_no"],
            'openId' => $data['openId'],
            'notify_url' => config('WX_DOMAIN')."/PayNotify/inpourWxNotify"
        );
        $WxPay = new WxPay();
        $codeUrl = $WxPay->HandleOrder_native($wxPayData);
        if (!$codeUrl) {
            return $this->errorJson(JsonResult::ERR_DB);
        }
        $codeUrl['order_no'] = $data["order_no"];
        return $codeUrl;die;
    }


    /**
     * 用户充值--公众号
     * @param  integer $user_id [description]
     * @param  integer $amount  充值金额
     * @return [type]           [description]
     */
    public function inpour($user_id=1706743,$amount=1){
        $user_id = (int)$user_id;
        $amount = $amount;
        $data = $this->inpourIndex($user_id,$amount,3);
        return $data;
    }
    private function inpourIndex($user_id,$money,$type){
        //获取用户openid
        $ThirdLoginModel = new ThirdLogin();
        $userinfo = $ThirdLoginModel->where('user_id',$user_id)->find();
        if(empty($userinfo)){
            return $this->errorJson(JsonResult::ERR_USERINFO_NULL);
        }
        $openId = $userinfo['open_id'];
        if ($money <= 0) {
            return $this->errorJson(JsonResult::ERR_PARAMETER);
        }
        $data = array();
        $data['user_id'] = $user_id;
        $data['order_no'] = getTradeNo();
        $data['pay_type'] = 2;
        $data['client_type'] = $type;
        $data['amount'] = $money;
        $data['client_ip'] = request()->ip(0, true);
        $data['class_id'] = 0;
        $data['type'] = 4;
        $payId = $this->PayOrder->db()->insertGetId($data);

        $data['subject'] = '账号充值';
        $data['backView'] = 1;
        $data['openId'] = $openId;

        if ($payId < 0) {
            return $this->errorJson(JsonResult::ERR_PARAMETER);
        }
        if($type == 3){
            return $this->inpourPay($data);    
        }
        if($type == 1 || $type == 2){
            return $this->wxPay_app($data);
        }
        
    }
    private function inpourPay($data){
        $time_now = time();
        $wxPayData = array(
            'body' => '大策略充值',
            'attach' => '',
            'out_trade_no' => $data ["order_no"],
            'total_fee' => $data ["amount"] * 100,
            // 'total_fee' => $data ["amount"] * 1,
            'time_start' => date('YmdHis', $time_now),
            'time_expire' => date('YmdHis', $time_now + 10 * 60),
            // 'goods_tag' => '/',
            'trade_type' => 'JSAPI',
            'product_id' => "",
            'openId' => $data['openId'],
            'notify_url' => config('WX_DOMAIN')."/PayNotify/inpourWxNotify"
        );
        $WxPay = new WxPay();
        $codeUrl = $WxPay->HandleOrder($wxPayData);
        if (!$codeUrl) {
            return $this->errorJson(JsonResult::ERR_DB);
        }
        return $codeUrl;die;
    }

    /**
     * [appInpour description]
     * @param  integer $user_id 用户id
     * @param  integer $amount  充值金额
     * @param  integer $type    客户端类型 1：安卓 2：ios
     * @return [type]           [description]
     */
    public function appInpour($user_id=1706743,$amount=0.01,$type=1){
        $user_id = (int)$user_id;
        $amount = $amount;
        $type = (int)$type;
        $data = $this->inpourIndex($user_id,$amount,$type);
        return $this->successJson($data);
    }

    private function wxPay_app($data){
        $time_now = time();
        $wxPayData = array(
            'body' => '大策略充值',
            'attach' => '',
            'out_trade_no' => $data ["order_no"],
            'total_fee' => $data ["amount"] * 100,
            // 'total_fee' => $data ["amount"] * 1,
            'time_start' => date('YmdHis', $time_now),
            'time_expire' => date('YmdHis', $time_now + 10 * 60),
            // 'goods_tag' => '/',
            'trade_type' => 'APP',
            'product_id' => "",
            'openId' => $data['openId'],
            'notify_url' => config('WX_DOMAIN')."/PayNotify/inpourWxNotify"
        );
        $WxPay = new WxPay();
        $codeUrl = $WxPay->HandleOrder_app($wxPayData);
        if (!$codeUrl) {
            return $this->errorJson(JsonResult::ERR_DB);
        }
        return $codeUrl;die;
    }


    /**
     * 订单状态查询
     * @param  [type] $order_no 订单号
     * @return [type]           [description]
     */
    public function orderStatus($order_no){
        $PayOrderModel = new PayOrder();
        $state = $PayOrderModel->where('order_no',$order_no)->value('state');
        return $this->successJson($state);
    }

    /**
     * 充值成功展示页面
     * @return mixed|string
     */
    public function paySuccess()
    {
        return $this->fetch('paySuccess');
    }

    public function payFail()
    {
        return $this->fetch('payFail');
    }
}