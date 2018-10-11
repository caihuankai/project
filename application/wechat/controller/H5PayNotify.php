<?php

namespace app\wechat\controller;

use app\wechat\model\PayOrder;
use payment\wxpay\WxPay;
use app\wechat\model\WechatPayOrder;
use app\wechat\model\RcbLog;
use app\common\controller\ControllerBase;
use app\wechat\model\AdmireRank;
use app\wechat\controller\AdmireRpc;
use app\common\model\Live;
use app\wechat\model\AliPayOrder;
use app\wechat\model\LianlianPayOrder;

/**
 * h5支付回调
 * @author xiaok
 */
class H5PayNotify extends ControllerBase{
	/**
     * 连连支付回调
     * @return [type] [description]
     */
    public function llNotify(){
        $responseJson = file_get_contents('php://input');
        if(empty($responseJson)){
            \think\Log::write('LLPay  json没有数据', 'pay');
            return 'false';
        }
        \think\Log::write('LLPay  requery => ' . $responseJson, 'pay');
        //解析json
        $responseJson = json_decode($responseJson,true);
        if($responseJson['result_pay'] != 'SUCCESS'){
            \think\Log::write('LLPay  支付失败', 'pay');
            return 'false';
        }
        //获取订单
        $payOrder = new PayOrder();
        $model = $payOrder->where('order_no', $responseJson['no_order'])->find();
        if (!$model) {
            \think\Log::write('LLPay  支付结果中连连支付订单号不存在', 'pay');
            return 'false';
        }
        if ($model ['state'] != 0) {
            \think\Log::write('LLPay  订单重复通知', 'pay');
            return 'false';
        }
        if($model ['order_no'] != $responseJson['no_order']){
            \think\Log::write('LLPay 订单错误', 'pay');
            return 'false';
        }
        if($model['amount'] != $responseJson['money_order']){
            \think\Log::write('LLPay 支付金额错误', 'pay');
            return 'false';
        }
        $remark = json_decode($model['remark'],true);
        //订单处理
        //支付结果 result_code
        $data = array();
        $data['user_id'] = $model['user_id'];
        $data['acct_name'] = $responseJson['acct_name'];
        $data['id_no'] = $remark['id_no'];
        $data['card_no'] = $remark['card_no'];
        $data['no_order'] = $responseJson['no_order'];
        $data['oid_paybill'] = $responseJson['oid_paybill'];
        $data['oid_partner'] = $responseJson['oid_partner'];
        $data['dt_order'] = $responseJson['dt_order'];
        $data['settle_date'] = $responseJson['settle_date'];
        $data['pay_type'] = $responseJson['pay_type'];
        $data['money_order'] = $responseJson['money_order'];
        $data['no_agree'] = $responseJson['no_agree'];
        $data['bank_code'] = $responseJson['bank_code'];
        $data['create_time'] = date('Y-m-d H:i:s');

        try {
            $LianlianPayOrderModel = new LianlianPayOrder();
            $payorderStatus = $LianlianPayOrderModel->where('no_order',$responseJson['no_order'])->find();
            if(empty($payorderStatus)){
                $resultWechat = $LianlianPayOrderModel->insert($data);
            }else{
                $resultWechat = true;
            }
            if ($resultWechat) {
                //更新用户订单
                $updateStatus = $payOrder->where('order_no', $responseJson['no_order'])->update([
                	'state' => 1,
                	'third_order_no' => $responseJson['oid_paybill']
                ]);
                if($updateStatus){
                    $retrun_msg['ret_code'] = "0000";
                    $retrun_msg['ret_msg'] = "交易成功";
                    return json_encode($retrun_msg);
                }
            }
        } catch (Exception $e) {
            $msg = $e->errorMessage();
            \think\Log::write('LLPay  error => ' . $msg, 'pay');
        }
    }
    /**
     * 微信支付回调
     */
    public function WxNotify(){
        $xml = file_get_contents('php://input');

        if (!$xml) {
            \think\Log::write('WxPay  xml没有数据', 'pay');
            return 'false';
        }
        \think\Log::write('WxPay  requery => ' . $xml, 'pay');
        // 如果返回成功则验证签名
        $wx = new WxPay ();
        $result = $wx->PayResults($xml);
        if (!$result) {
            return 'false';
        }

        $orderNo = $result ['out_trade_no'];
        $third_order_no = $result ['transaction_id'];

        $payOrder = new PayOrder();
        $model = $payOrder->db()->where('order_no', $orderNo)->find();
        if (!$model) {
            \think\Log::write('WxPay  支付结果中微信订单号不存在', 'pay');
            return 'false';
        }
        if ($model ['state'] != 0) {
            \think\Log::write('WxPay  订单重复通知', 'pay');
            return 'false';
        }
        if($model ['order_no'] != $orderNo){
            \think\Log::write('WxPay 订单错误', 'pay');
            return 'false';
        }
        if($model['amount']*100 != $result['total_fee']){
            \think\Log::write('WxPay 支付金额错误', 'pay');
            return 'false';
        }
        //支付结果 result_code
        if ($result ['result_code'] == 'SUCCESS') {
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

            try {
                $WechatPayOrder = new WechatPayOrder();
                $wechatModel = $WechatPayOrder->where('order_no',$orderNo)->find();
                if(empty($wechatModel)){
                    $resultWechat = $WechatPayOrder->insert($data);
                }else{
                    $resultWechat = true;
                }
                if ($resultWechat) {
                    //更新用户订单
	                $updateStatus = $payOrder->where('order_no', $orderNo)->update([
	                	'state' => 1,
	                	'third_order_no' => $result['transaction_id']
	                ]);
                    if($updateStatus){
                        \think\Log::write('WxPay 写入成功', 'pay');
                        return "<xml><return_code><![CDATA[SUCCESS]]></return_code><return_msg><![CDATA[OK]]></return_msg></xml>";
                    }
                }
            } catch (Exception $e) {
                $msg = $e->errorMessage();
                \think\Log::write('WxPay  error => ' . $msg, 'pay');
            }
        }
    }
}