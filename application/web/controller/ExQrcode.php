<?php
namespace app\web\controller;

use app\admin\model\ExtensionQrcode;
use app\common\controller\ControllerBase;

class ExQrcode extends ControllerBase{
	/**
	 * 获取运营推广页二维码+微信
	 * @param  [type] $type 1:360 2:搜狗 3:百度
	 * @return [type]       [description]
	 */
	public function getQrcode($type){
		$ExtensionQrcode = new ExtensionQrcode();
		$where['type'] = $type;
		$where['dataFlag'] = 1;
		$data = $ExtensionQrcode->field('qrcodeUrl,wechatId')->where($where)->find();
		return $this->sucSysJson($data);
	}
}