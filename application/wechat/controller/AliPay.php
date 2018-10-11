<?php
namespace app\wechat\controller;

use app\common\controller\ControllerBase;
use app\common\controller\JsonResult;
use app\wechat\model\PayOrder;
use pay\alipay_app\aop\AopClient;
use pay\alipay_app\aop\request\AlipayTradeAppPayRequest;

/**
 * 支付宝支付
 * @author xiaokai
 * @date 2017/11/29
 */
class AliPay extends App{
	/**
	 * 用户充值
	 * @param  [type] $user_id 	用户id
	 * @param  [type] $amount 	充值金额
	 * @param  integer $type    客户端类型 1：安卓 2：ios 3：web
	 * @return [type]         [description]
	 */
	public function inpour($user_id,$amount,$type){
		// $user_id = $this->getUserId();
		$user_id = (int)$user_id;
		$type = (int)$type;
		if ($amount <= 0) {
            return $this->errorJson(JsonResult::ERR_PARAMETER);
        }
        //创建 保存订单信息
        $PayOrderModel = new PayOrder();
        $data = array();
        $data['user_id'] = $user_id;
        $data['order_no'] = getTradeNo();
        $data['pay_type'] = 1;
        $data['client_type'] = $type;
        $data['amount'] = $amount;
        $data['client_ip'] = request()->ip(0, true);
        $data['class_id'] = 0;
        $data['type'] = 4;
        $poId = $PayOrderModel->insertGetId($data);
     	if ($poId < 0) {
            return $this->errorJson(JsonResult::ERR_PARAMETER);
        }
        return $this->inpourPay($data); 
	}

	private function inpourPay($data){
		$alipay_config = config('pay.alipay');
        $aop = new AopClient();
        $aop->gatewayUrl = "https://openapi.alipay.com/gateway.do";
        $aop->appId = $alipay_config['app_id'];
        $aop->rsaPrivateKey = $alipay_config['rsaPrivateKey'];
        $aop->apiVersion = $alipay_config['apiVersion'];
        $aop->format = 'json';
        $aop->postCharset = 'UTF-8';
        $aop->signType = 'RSA2';
        $aop->alipayrsaPublicKey = $alipay_config['alipayrsaPublicKey'];

        $request = new AlipayTradeAppPayRequest();

        $bizcontent = "{\"body\":\"大策略充值\"," 
                . "\"subject\": \"大策略充值\","
                . "\"out_trade_no\": \"".$data['order_no']."\","
                . "\"timeout_express\": \"30m\"," 
                . "\"total_amount\": \"".$data['amount']."\","
                . "\"product_code\":\"QUICK_MSECURITY_PAY\""
                . "}";

        $request->setNotifyUrl(config('WX_DOMAIN')."/PayNotify/aliPayNotify");
        $request->setBizContent($bizcontent);
        $response = $aop->sdkExecute($request);
        return $this->sucSysJson($response);
	}
}