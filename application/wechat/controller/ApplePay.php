<?php
namespace app\wechat\controller;

class ApplePay extends App
{
	protected $applePayList = [
		"cn.hctt.strategy2"=>4.1,
		"cn.hctt.strategy3"=>8.2,
		"cn.hctt.strategy4"=>12.3,
		"cn.hctt.strategy5"=>128.9,
		"cn.hctt.strategy6"=>684.7,
		"cn.hctt.strategy7"=>478.8,
	];
	
	/**
	 * applePay验证是否支付成功
	 * @param unknown $receipt
	 * @return \think\response\Json
	 */
	public function pay($receipt)
	{
		$url = "https://buy.itunes.apple.com/verifyReceipt";
		$sandboxUrl = "https://sandbox.itunes.apple.com/verifyReceipt";
		$data = json_encode(['receipt-data'=>$receipt]);
		while (true) {
			$resultJson = https_post($url, $data);
			$result = json_decode($resultJson, true);
			if (isset($result['status'])) {
				if ($result['status'] == 0) {//支付成功
					if ($url != $sandboxUrl) {//正式环境
						$model = new \app\wechat\model\User();
						$productId = $result['receipt']['in_app'][0]['product_id'];
						$updateResult = $model->db()->where('user_id', $this->getUserId())->setInc('account_balance', $this->applePayList[$productId]);
					}else {//sandbox环境
						$updateResult = 1;
					}
					if ($updateResult > 0) {
						return $this->sucSysJson("支付成功");
					}else {
						return $this->errSysJson("增加礼点失败，请重试");
					}
				}elseif ($result['status'] == 21007) {//转查询sandbox路由
					$url = $sandboxUrl;
				}else {//查询失败
					return $this->errSysJson("查询失败");
				}
			}else {
				return $this->errSysJson("查询失败");
			}
		}
	}
	
	
	
	
	
	
}