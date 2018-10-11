<?php
namespace app\wechat\controller;

use app\common\controller\ControllerBase;
use app\wechat\model\PayOrder;
use app\wechat\model\LianlianPayOrder;
use app\wechat\model\User;
use app\common\controller\JsonResult;

require_once ROOT_PATH ."extend/payment/authllpay_php/authllpay/lib/llpay_submit.class.php";
/**
 * 第三方--连连支付
 */
class LLpay extends App{
	public function index(){
		return $this->fetch('/logintest/index');
	}
	/**
	 * 连连支付
	 * @param $client_type 客户端类型 \n1-安卓；\n2-IOS；\n3-WEB
	 * @param $no_agree 银行卡协议号
	 * @param $card_no 银行卡号
	 * @param $acct_name 姓名
	 * @param $id_no 身份证号
	 * @param $money_order 付款金额
	 */
	public function pay(){
		$llpay_config = $this->getllConfig();
		//客户端类型 \n1-安卓；\n2-IOS；\n3-WEB
		$client_type = 3;
		if(isset($_POST['client_type'])){
			$client_type = $_POST['client_type'];
		}
        //协议号
        $no_agree = $_POST['no_agree'];
        //商户用户唯一编号
        // $user_id = 1706887;
        $user_id = $this->getUserId();
        if(!empty($no_agree)){
          $LianlianPayOrderModel = new LianlianPayOrder();
          $where['user_id'] = $user_id;
          $where['no_agree'] = $no_agree;
          $userCardInfo = $LianlianPayOrderModel->where($where)->order('create_time','desc')->find();
			     $card_no = $userCardInfo['card_no'];
			     $acct_name = $userCardInfo['acct_name'];
			     $id_no = $userCardInfo['id_no'];
        }else{
	        //卡号
	        // $card_no = '6217907000023918350';
	        $card_no = $_POST['card_no'];
	        //姓名
	        // $acct_name = '蔡浩萍';
	        $acct_name = $_POST['acct_name'];
	        //身份证号
	        // $id_no = '445221199410267825';
	        $id_no = $_POST['id_no'];
        }
        //支付类型 虚拟商品：101001 实物商品：109001
        $busi_partner = 101001;
        //商户订单号
        $no_order = getTradeNo();
        //商户网站订单系统中唯一订单号，必填
        //付款金额
        $money_order = $_POST['amount'];
        //商品名称
        $name_goods = '大策略充值';
        //订单描述
        $info_order = '大策略礼点充值';
        //用户注册时间和手机号码
        $UserModel = new User();
        $userInfo = $UserModel->getUserPhoneAndRegister($user_id);
        //风险控制参数
        $risk_item = '{\"frms_ware_category\":\"1008\",\"user_info_mercht_userno\":\"'.$user_id.'\",\"user_info_bind_phone\":\"'.$userInfo['phone'].'\",\"user_info_dt_register\":\"'.$userInfo['register_date'].'\",\"user_info_full_name\":\"'.$acct_name.'\",\"user_info_id_no\":\"'.$id_no.'\",\"user_info_identify_type\":\"1\",\"user_info_identify_state\":\"1\"}';
        //订单有效期
        $valid_order = 10080;
        //服务器异步通知地址
        $notify_url = config('WX_DOMAIN')."/PayNotify/llNotify";
        //页面跳转同步通知页面路径 不能加?id=123这类自定义参数
        $return_url = config('WX_DOMAIN')."/#/giftBalance";
        if(isset($_POST['return_url'])){
          $return_url = config('WX_DOMAIN').$_POST['return_url'];
        }
        //构造要请求的参数数组，无需改动
        $parameter = array (
          "oid_partner" => trim($llpay_config['oid_partner']),
          "app_request" => trim($llpay_config['app_request']),
          "sign_type" => trim($llpay_config['sign_type']),
          "valid_order" => trim($llpay_config['valid_order']),
          "user_id" => $user_id,
          "busi_partner" => $busi_partner,
          "no_order" => $no_order,
          "dt_order" => local_date('YmdHis', time()),
          "name_goods" => $name_goods,
          "info_order" => $info_order,
          "money_order" => $money_order,
          "notify_url" => $notify_url,
          "url_return" => $return_url,
          "card_no" => $card_no,
          "acct_name" => $acct_name,
          "id_no" => $id_no,
          "no_agree" => $no_agree,
          "risk_item" => $risk_item,
          "valid_order" => $valid_order
        );
        //创建 保存订单信息
        $PayOrderModel = new PayOrder();
        $data = array();
        $data['user_id'] = $user_id;
        $data['order_no'] = $no_order;
        $data['pay_type'] = 3;
        $data['client_type'] = $client_type;
        $data['amount'] = $money_order;
        $data['client_ip'] = request()->ip(0, true);
        $data['type'] = 4;
        $data['remark'] = json_encode($parameter);
        $poId = $PayOrderModel->insertGetId($data);
        //建立请求
        $llpaySubmit = new \LLpaySubmit($llpay_config);
        if($client_type == 3){
        	$html_text = $llpaySubmit->buildRequestForm($parameter, "post", "确认");
        }else{
        	$appparameter = $parameter;
        	unset($parameter['user_id']);
        	unset($parameter['app_request']);
        	unset($parameter['id_no']);
        	unset($parameter['acct_name']);
        	unset($parameter['card_no']);
        	unset($parameter['no_agree']);
        	unset($parameter['url_return']);
        	$html_text = $llpaySubmit->buildRequestParam($parameter);
        	$html_text = json_decode($html_text,true);
        	$html_text['user_id'] = $appparameter['user_id'];
        	$html_text['id_type'] = 0;
        	$html_text['id_no'] = $appparameter['id_no'];
        	$html_text['acct_name'] = $appparameter['acct_name'];
        	$html_text['card_no'] = $appparameter['card_no'];
        	$html_text['no_agree'] = $appparameter['no_agree'];
        }
        
        return $this->sucSysJson($html_text);
	}
	/**
	 * 获取用户绑定的银行卡列表
	 * @return [type] [description]
	 */
	public function getBankList(){
		$llpay_config = $this->getllConfig();
		$user_id = $this->getUserId();
		$parameter = array (
          "oid_partner" => '201712290001333864',
          "offset" => '0',
          "user_id" => $user_id,
          "pay_type" => 'D',
          "sign_type" => 'RSA'
        );
        $llpaySubmit = new \LLpaySubmit($llpay_config);
        $html_text = $llpaySubmit->buildRequestHttpTest($parameter);
        $bankList = json_decode(post('https://queryapi.lianlianpay.com/bankcardbindlist.htm',$html_text),true);
        if($bankList['ret_code'] != 0000){
        	return $this->errorJson(JsonResult::ERR_BANK_LIST);
        }
        return $this->sucSysJson($bankList['agreement_list']);
	}
  public function getBankListTest($user_id){
    $llpay_config = $this->getllConfig();
    // $user_id = $this->getUserId();
    $parameter = array (
          "oid_partner" => '201712290001333864',
          "offset" => '0',
          "user_id" => $user_id,
          "pay_type" => 'D',
          "sign_type" => 'RSA'
        );
        $llpaySubmit = new \LLpaySubmit($llpay_config);
        $html_text = $llpaySubmit->buildRequestHttpTest($parameter);
        $bankList = json_decode(post('https://queryapi.lianlianpay.com/bankcardbindlist.htm',$html_text),true);
        if($bankList['ret_code'] != 0000){
          return $this->errorJson(JsonResult::ERR_BANK_LIST);
        }
        return $this->sucSysJson($bankList['agreement_list']);
  }
	/**
	 * 用户解绑银行卡
	 * @param no_agree	银行协议号
	 */
	public function UnbundBankCard(){
		$llpay_config = $this->getllConfig();
		//协议号
        $no_agree = $_POST['no_agree'];
        $user_id = $this->getUserId();
		$parameter = array (
          "oid_partner" => '201712290001333864',
          "user_id" => $user_id,
          "pay_type" => 'D',
          "sign_type" => 'RSA',
          "no_agree" => $no_agree
        );
        $llpaySubmit = new \LLpaySubmit($llpay_config);
        $html_text = $llpaySubmit->buildRequestHttpTest($parameter);
        $response = json_decode(post('https://traderapi.lianlianpay.com/bankcardunbind.htm',$html_text),true);
        if($response['ret_code'] != 0000){
        	return $this->errorJson(JsonResult::ERR_UNBUILD);
        }
        return $this->sucSysJson('解绑成功');
	}
	public function getllConfig(){
		$llconfig = config('pay.lianlianPay');
		$llpay_config['oid_partner'] = $llconfig['oid_partner'];
		$llpay_config['RSA_PRIVATE_KEY'] = $llconfig['RSA_PRIVATE_KEY'];
		$llpay_config['key'] = $llconfig['key'];
		$llpay_config['version'] = $llconfig['version'];
		$llpay_config['app_request'] = $llconfig['app_request'];
		$llpay_config['sign_type'] = $llconfig['sign_type'];
		$llpay_config['valid_order'] = $llconfig['valid_order'];
		$llpay_config['input_charset'] = $llconfig['input_charset'];
		$llpay_config['transport'] = $llconfig['transport'];
		return $llpay_config;
	}
}