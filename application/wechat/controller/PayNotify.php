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
 * 微信支付回调
 * @package app\wechat\controller
 * @author xiaok
 */
class PayNotify extends ControllerBase
{
    public function index()
    {
        return false;
    }

    public function WxNotify()
    {
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
                    $RcbLogModel = new RcbLog();
                    $third_ip = request()->ip(0, true);
                    $updateRcbLog = $RcbLogModel->updateInfo($data,$orderNo,$result,$third_ip);
                    \think\Log::write('WxPay 写入成功'.$updateRcbLog, 'pay');
                    if($updateRcbLog != false){
                        //如果支付类型为赞赏 则记录用户赞赏对应房间总额 且更新房间被赞赏次数和赞赏总额
                        if($model['type'] == 3){
                            $AdmireRankModel = new AdmireRank();
                            $AdmireRankModel->upAdmireRank($model['class_id'],$model['user_id'],$model['amount']);
                            //更新房间被赞赏次数和赞赏总额
                            $LiveModel = new Live();
                            $LiveModel->upLiveAdmire($model['class_id'],$model['amount']);
                            //通知c++
                            $AdmireRpcC = new AdmireRpc();
                            $AdmireRpcC->admire($model['user_id'],$model['class_id'],$model['amount'],0);
                        }
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
    //充值回调
    public function inpourWxNotify(){
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
        if($model['amount']*100 != $result['total_fee'] && $result['total_fee'] != 28){
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
                    $RcbLogModel = new RcbLog();
                    $third_ip = request()->ip(0, true);
                    $updateRcbLog = $RcbLogModel->inpourUpdateInfo($data,$orderNo,$result,$third_ip,$model['user_id']);
                    \think\Log::write('WxPay 写入成功'.$updateRcbLog, 'pay');
                    if($updateRcbLog != false){
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
    public function WxNotify_native()
    {
        $xml = file_get_contents('php://input');

        if (!$xml) {
            \think\Log::write('WxPayNative  xml没有数据', 'pay');
            return 'false';
        }
        \think\Log::write('WxPayNative  requery => ' . $xml, 'pay');
    }

    /**
     * 支付宝充值回调
     * @return [type] [description]
     */
    public function aliPayNotify(){
        \think\Log::write('alipay   =>  ' . json_encode($_POST), 'pay');
        if(empty($_POST)){
            \think\Log::write('alipay  POST没有数据', 'pay');
            return 'false';
        }
        //获取订单号
        $orderNo = request()->param('out_trade_no');

        $payOrder = new PayOrder();
        $model = $payOrder->where('order_no', $orderNo)->find();
        if (!$model) {
            \think\Log::write('alipay  支付结果中支付宝订单号不存在', 'pay');
            return 'false';
        }
        if ($model ['state'] != 0) {
            \think\Log::write('alipay  订单重复通知', 'pay');
            return 'false';
        }
        if($model ['order_no'] != $orderNo){
            \think\Log::write('alipay 订单错误', 'pay');
            return 'false';
        }
        if($model['amount'] != request()->param('buyer_pay_amount')){
            \think\Log::write('alipay 支付金额错误', 'pay');
            return 'false';
        }
        //订单处理
        //支付结果 result_code
        if (request()->param('trade_status') == 'TRADE_SUCCESS') {
            $data = array();
            $data['user_id'] = $model['user_id'];
            $data['order_no'] = request()->param('out_trade_no');
            $data['trade_no'] = request()->param('trade_no');
            $data['seller_email'] = request()->param('seller_email');
            $data['seller_id'] = request()->param('seller_id');
            $data['buyer_logon_id'] = request()->param('buyer_logon_id');
            $data['buyer_id'] = request()->param('buyer_id');
            $data['receipt_amount'] = request()->param('receipt_amount');
            $data['buyer_pay_amount'] = request()->param('buyer_pay_amount');
            $data['notify_type'] = request()->param('notify_type');
            $data['app_id'] = request()->param('app_id');
            $data['gmt_create'] = request()->param('gmt_create');
            $data['create_time'] = date('Y-m-d H:i:s');
            $data['gmt_payment'] = request()->param('gmt_payment');

            try {
                $AliPayOrderModel = new AliPayOrder();
                $alipayStatus = $AliPayOrderModel->where('order_no',$orderNo)->find();
                if(empty($alipayStatus)){
                    $resultWechat = $AliPayOrderModel->insert($data);
                }else{
                    $resultWechat = true;
                }
                if ($resultWechat) {
                    $RcbLogModel = new RcbLog();
                    $third_ip = request()->ip(0, true);
                    $data['amount'] = request()->param('buyer_pay_amount');
                    $result['transaction_id'] = request()->param('trade_no');
                    $result['total_fee'] = request()->param('buyer_pay_amount')*100;
                    $updateRcbLog = $RcbLogModel->inpourUpdateInfo($data,$orderNo,$result,$third_ip,$model['user_id']);
                    // \think\Log::write('alipay 写入成功'.$updateRcbLog, 'pay');
                    if($updateRcbLog != false){
                        return "success";
                    }
                }
            } catch (Exception $e) {
                $msg = $e->errorMessage();
                \think\Log::write('WxPay  error => ' . $msg, 'pay');
            }
        }
        // return 'false';
    }

    /**
     * 连连支付充值回调
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
                $RcbLogModel = new RcbLog();
                $third_ip = request()->ip(0, true);
                $data['amount'] = $responseJson['money_order'];
                $result['transaction_id'] = $responseJson['oid_paybill'];
                $result['total_fee'] = $responseJson['money_order']*100;
                $updateRcbLog = $RcbLogModel->inpourUpdateInfo($data,$responseJson['no_order'],$result,$third_ip,$model['user_id']);
                if($updateRcbLog != false){
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


    private function object2array($object)
    {
        if (is_object($object)) {
            foreach ($object as $key => $value) {
                $array[$key] = $value;
            }
        } else {
            $array = $object;
        }
        return $array;
    }
}