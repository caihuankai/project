<?php
namespace app\wechat\model;

use app\common\model\ModelBs;
use think\Exception;

/**
 * @author xiaok
 * @date 2017/05/24
 */
class WechatPayOrder extends ModelBs{

	//微信支付成功信息表
	public function saveData($data){
		return true;
	}
}