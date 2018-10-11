<?php
namespace app\wechat\controller;

use app\common\controller\ControllerBase;
use app\common\controller\JsonResult;
use payment\wxpay\JsApiPay;
use payment\wxpay\WxCashout;
use app\wechat\model\CashoutOrder;
use app\wechat\model\WechatCashoutOrder;
use app\wechat\model\ThirdLogin;
use app\wechat\model\User;
use app\wechat\model\PdCash;
use app\wechat\model\RcbLog;
use app\wechat\controller\SendChatMessage;

/**
 * 微信提现（企业付款）
 * @author xiaok
 * @package app\wechat\controller
 * @data 2017/05/25
 */

class WechatCashout extends ControllerBase{
	//前端发起提现处理接口
	public function prepare($user_id = 0,$amount = 0){
		$user_id = (int)$user_id;
		$amount = $amount;
		if($user_id == 0 || $amount == 0){
			return $this->errorJson(JsonResult::ERR_PARAMETER);
		}
		//获取用户帐户余额 冻结金额
		$UserModel = new User();
		$UserInfo = $UserModel->where('user_id',$user_id)->find();
		if(empty($UserInfo)){
			return $this->errorJson(JsonResult::ERR_NOT_LOGIN);
		}
		$Info_income = $UserInfo['income'];//账户余额
		$Info_freeze_income = $UserInfo['freeze_income'];//冻结收益
		//如果提现金额大于账户余额 返回错误
		if($amount > $Info_income){
			return $this->errorJson(JsonResult::ERR_INSUFFICIENT_FUNDS);
		}
		//扣除提现金额
		$income = $Info_income - $amount;
		$freeze_income = $Info_freeze_income + $amount;
		//更新用户帐户
		$account_status = $UserModel->where('user_id',$user_id)
		->update([
			'income' => $income,
			'freeze_income' => $freeze_income,
		]);
		if(!$account_status){
			return $this->errorJson(JsonResult::ERR_WECHAT_CASHOUT);
		}
		//保存到后台订单审核库
		$PdCashModel = new PdCash();
		$data['pdc_sn'] = getCashoutNo();
		$data['pdc_user_id'] = $user_id;
		$data['pdc_amount'] = $amount;
		$data['pdc_payment_state'] = 0;
		$PdCash_status = $PdCashModel->insert($data);
		$SendChatMessageModel = new SendChatMessage();
		$SendChatTemplate = $SendChatMessageModel->sendMessage($user_id,1,$amount,'');
		return $this->sucSysJson('','申请成功',0);
	}

	//提现接口（用于被调用）
	public function index($user_id=0,$CashoutNo='',$amount=0){
		//验证订单号是否存在
		$PdCashModel = new PdCash();
		$PdCashCashoutNoInfo = $PdCashModel->where('pdc_sn',$CashoutNo)->find();
		if(empty($PdCashCashoutNoInfo)){
			return JsonResult::ERR_CASHOUTNO_NULL;
		}
		//判断金额是否正确
		if($PdCashCashoutNoInfo['pdc_amount'] != $amount){
			return JsonResult::ERR_CASHOUTNO_AMOUNT;
		}
		//判断订单号是否已汇款
		if($PdCashCashoutNoInfo['pdc_payment_state'] != 0){
			return JsonResult::ERR_CASHOUTNO_NULL;
		}
		//判断用户是否正确
		if($PdCashCashoutNoInfo['pdc_user_id'] != $user_id){
			return JsonResult::ERR_CASHOUTNO_USER;
		}
		//更新订单汇款状态
		$PdCashModelUpdate = $PdCashModel->where('pdc_sn',$CashoutNo)->update([
				'pdc_payment_state' => 1,
			]);
		// $user_id = \think\Session::get('user_id');
		$user_id = (int)$user_id;
		$amount = $amount;
		//获取用户openid
		$ThirdLoginModel = new ThirdLogin();
		$userinfo = $ThirdLoginModel->where('user_id',$user_id)->find();
		if(empty($userinfo)){
			return JsonResult::ERR_USERINFO_NULL;
		}
		$openid = $userinfo['open_id'];
		$status = $this->cashout($openid,$user_id,$CashoutNo,$amount);
		return $status;
	}
	private function cashout($openId,$user_id,$CashoutNo,$amount){
		//获取用户openid
		// $tools = new JsApiPay();
		// $openId = $tools->GetOpenid();
		// $user_id = \think\Session::get('user_id');
		// $user_id = 1706743;
		// $openId = 'oASvRwcL61p9TwelNNkTHWrNRPn4';
		//提现金额（分为单位）
		$data['amount'] = $amount*100;
		//企业付款描述信息
		$data['desc'] = '大策略提现';
		//是否检查用户真实姓名
		$data['check_name'] = 'NO_CHECK';
		//商户订单
		$data['partner_trade_no'] = $CashoutNo;
		$data['spbill_create_ip'] = request()->ip(0, true);
		//用户真实名字(可选 + FORCE_CHECK：强校验真实姓名 较安全)
		//$data['re_user_name'] = 'babi';
		$wxCashoutData = array(
			'user_id' => $user_id,
			'openid' => $openId,
			'amount' => $data['amount'],
			'desc'	=> $data['desc'],
			'check_name' => $data['check_name'],
			'partner_trade_no' => $data['partner_trade_no'],
			'spbill_create_ip' => $data['spbill_create_ip']
		);
		$CashoutOrderModel = new CashoutOrder();
		$WechatCashoutOrderModel = new WechatCashoutOrder();
		//付款订单初步写入数据 (日志 数据库都写)
		$wxCashoutDataxml = $this->arraytoxml($wxCashoutData);
		// var_dump($wxCashoutData);
		\think\Log::write('WechatCashout requery =>' . $wxCashoutDataxml, 'cashout');
		$saveData = $CashoutOrderModel->insert($wxCashoutData);
		if(!$saveData){
			return JsonResult::ERR_SAVE_CASHOUT_DATA;
		}
		//移除空数据
		$wxCashoutData = array_filter($wxCashoutData);
		$WxCashout = new WxCashout();
		$result = $WxCashout->HandleOrder($wxCashoutData);
		// var_dump($result);
		$resultxml = $this->arraytoxml($result);
		\think\Log::write('WechatCashout result =>' .$resultxml,'cashout');

		//付款结果判断
        if($result['return_code'] == 'SUCCESS'){
            if($result['result_code'] == 'FAIL'){
            	$result['partner_trade_no'] = $data['partner_trade_no'];
				$WechatCashoutOrderData = $WechatCashoutOrderModel->insert($result);
            	if($result['err_code'] == 'SYSTEMERROR'){
            		return JsonResult::ERR_CASHOUTNO_SYSTEMERROR;
            	}
            	if($result['err_code'] == 'NOTENOUGH'){
            		return JsonResult::ERR_CASHOUTNO_NOTENOUGH;
            	}
				if(!$WechatCashoutOrderData){
					return JsonResult::ERR_SAVE_CASHOUT_RESULT;
				}
            	return JsonResult::ERR_WECHAT_CASHOUT;
            }else{
            	$WechatCashoutOrderData = $WechatCashoutOrderModel->insert($result);
            }
        }else{
        	$result['partner_trade_no'] = $data['partner_trade_no'];
			$WechatCashoutOrderData = $WechatCashoutOrderModel->insert($result);
			if(!$WechatCashoutOrderData){
				return JsonResult::ERR_SAVE_CASHOUT_RESULT;
			}
            return JsonResult::ERR_WECHAT_CASHOUT;
        }
		return 0;
	}

    //数组转换为xml
    public function arraytoxml($data){//移除空数据
		$data = array_filter($data);
    	ksort($data);
        $str='<xml>';
        foreach($data as $k=>$v) {
            $str.='<'.$k.'>'.$v.'</'.$k.'>';
        }
        $str.='</xml>';
        return $str;
    }
}