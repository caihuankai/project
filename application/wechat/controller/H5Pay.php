<?php
namespace app\wechat\controller;

use app\common\controller\ControllerBase;
use app\wechat\model\PayOrder;
use app\wechat\model\LianlianPayOrder;
use app\wechat\model\User;
use app\common\controller\JsonResult;
use app\wechat\model\Course;
use payment\wxpay\WxPay;
use payment\wxpay\JsApiPay;
use app\wechat\model\ThirdLogin;

require_once ROOT_PATH ."extend/payment/authllpay_php/authllpay/lib/llpay_submit.class.php";

/**
 * h5支付
 * @author xiaok
 */
class H5Pay extends App{
	/**
	 * 连连支付
	 * @param $client_type 客户端类型 \n1-安卓；\n2-IOS；\n3-WEB
	 * @param $no_agree 银行卡协议号
	 * @param $card_no 银行卡号
	 * @param $acct_name 姓名
	 * @param $id_no 身份证号
	 * @param $class_id 课程id
	 */
	public function LLpay(){
		if(empty($_POST['card_no']) || empty($_POST['acct_name']) || empty($_POST['id_no'])|| empty($_POST['class_id'])){
			return $this->errSysJson('参数错误');
		}
        //商户用户唯一编号
        // $user_id = 1706887;
        $user_id = $this->getUserId();
		//判断用户是否重复购买
		if($this->isBuy($user_id,$_POST['class_id']) == 1){
			return $this->errSysJson('重复购买');
		}
		//获取课程价格和过期时间
		$courseInfo = $this->courseInfo($_POST['class_id']);
		if(empty($courseInfo)){
			return $this->errSysJson('课程不存在');
		}
		//获取连连支付配置
		$llpay_config = $this->getllConfig();
		//客户端类型 \n1-安卓；\n2-IOS；\n3-WEB
		$client_type = 3;
		if(isset($_POST['client_type'])){
			$client_type = $_POST['client_type'];
		}
        //协议号
        // $no_agree = $_POST['no_agree'];
        $no_agree = '';
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
	        $card_no = $_POST['card_no'];
	        //姓名
	        $acct_name = $_POST['acct_name'];
	        //身份证号
	        $id_no = $_POST['id_no'];
        }
        //支付类型 虚拟商品：101001 实物商品：109001
        $busi_partner = 101001;
        //商户订单号
        $no_order = getTradeNo();
        //商户网站订单系统中唯一订单号，必填
        //付款金额
        $money_order = $courseInfo['price'];
        //商品名称
        $name_goods = '课程购买';
        //订单描述
        $info_order = '月度(季度)课程购买';
        //用户注册时间和手机号码
        $UserModel = new User();
        $userInfo = $UserModel->getUserPhoneAndRegister($user_id);
        //风险控制参数
        $risk_item = '{\"frms_ware_category\":\"1008\",\"user_info_mercht_userno\":\"'.$user_id.'\",\"user_info_bind_phone\":\"'.$userInfo['phone'].'\",\"user_info_dt_register\":\"'.$userInfo['register_date'].'\",\"user_info_full_name\":\"'.$acct_name.'\",\"user_info_id_no\":\"'.$id_no.'\",\"user_info_identify_type\":\"1\",\"user_info_identify_state\":\"1\"}';
        //订单有效期
        $valid_order = 10080;
        //服务器异步通知地址
        $notify_url = config('WX_DOMAIN')."/H5PayNotify/llNotify";
        //页面跳转同步通知页面路径 不能加?id=123这类自定义参数
        $return_url = config('WX_DOMAIN')."/#/dacelueMini/courseDetail/".$_POST['class_id'];
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
        $data['total_fee'] = $money_order;
        $data['overdue_time'] = $courseInfo['overdue_time'];
        $data['client_ip'] = request()->ip(0, true);
        $data['type'] = $courseInfo['pay_type'];
        $data['class_id'] = $_POST['class_id'];
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
	 * 微信支付
	 * @param  [type] $class_id 课程id
	 * @return [type]           [description]
	 */
	public function wechatPay(){
		if(empty($_POST['class_id'])){
			return $this->errSysJson('参数错误');
		}
		//用户唯一编号
        // $user_id = 1706743;
        $user_id = $this->getUserId();
        //获取用户openid
        $ThirdLoginM = new ThirdLogin();
        $userinfo = $ThirdLoginM->where('user_id',$user_id)->find();
        if(empty($userinfo)){
            return $this->errSysJson('用户不存在');
        }
        $openId = $userinfo['open_id'];
		//判断用户是否重复购买
		if($this->isBuy($user_id,$_POST['class_id']) == 1){
			return $this->errSysJson('重复购买');
		}
		//获取课程价格和过期时间
		$courseInfo = $this->courseInfo($_POST['class_id']);
		if(empty($courseInfo)){
			return $this->errSysJson('课程不存在');
		}
		//唯一订单号
        $no_order = getTradeNo();
		//创建 保存订单信息
        $PayOrderModel = new PayOrder();
        $data = array();
        $data['user_id'] = $user_id;
        $data['order_no'] = $no_order;
        $data['pay_type'] = 2;
        $data['client_type'] = 3;
        $data['amount'] = $courseInfo['price'];
        $data['total_fee'] = $courseInfo['price'];
        $data['overdue_time'] = $courseInfo['overdue_time'];
        $data['client_ip'] = request()->ip(0, true);
        $data['type'] = $courseInfo['pay_type'];
        $data['class_id'] = $_POST['class_id'];
        $pId = $PayOrderModel->insertGetId($data);
        //微信支付提交数据
        $wxPayData = array(
            'body' => '大策略充值',
            'attach' => '',
            'out_trade_no' => $data["order_no"],
            'total_fee' => $data["amount"] * 100,
            'time_start' => date('YmdHis', time()),
            'time_expire' => date('YmdHis', time() + 10 * 60),
            // 'goods_tag' => '/',
            'trade_type' => 'JSAPI',
            'product_id' => "",
            'openId' => $openId,
            'notify_url' => config('WX_DOMAIN')."/H5PayNotify/WxNotify"
        );
        $WxPay = new WxPay();
        $codeUrl = $WxPay->HandleOrder($wxPayData);
        if (!$codeUrl) {
            return $this->errSysJson('调用支付失败');
        }
        return $codeUrl;
	}
	//判断用户是否购买该课程
	public function isBuy($user_id,$class_id){
		$PayOrderM = new PayOrder();
		$where['user_id'] = $user_id;
		$where['state'] = ['in',[1,3]];
		$where['class_id'] = $class_id;
		$where['overdue_time'] = ['>',date('Y-m-d H:i:s')];
		$isbuy = 0;
		$data = $PayOrderM
        ->order('id','desc')
        ->where($where)->find();
		if(!empty($data)){
			$isbuy = 1;	
		}
		return $isbuy;
	}
	//获取课程信息
	public function courseInfo($class_id){
		$CourseM = new Course();
		$where['id'] = $class_id;
		$where['level'] = 2;
		$where['seriesType'] = ['in',[1,2]];
		$where['open_status'] = 1;
		$courseInfo = $CourseM->where($where)->find();
		if(!empty($courseInfo)){
			//获取购买月度、季度课过期时间
			if($courseInfo['seriesType'] == 1){
				$courseInfo['overdue_time'] = date("Y-m-d H:i:00",strtotime("+1 month"));
				$courseInfo['pay_type'] = 10;
			}else{
				$courseInfo['overdue_time'] = date("Y-m-d H:i:00",strtotime("+3 month"));
				$courseInfo['pay_type'] = 11;
			}
		}
		return $courseInfo;
	}
	//获取连连支付配置
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