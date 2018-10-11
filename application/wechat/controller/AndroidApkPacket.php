<?php
namespace app\wechat\controller;

use app\admin\model\AndroidApkPacket as MAndroidApkPacket;

class AndroidApkPacket extends App
{
	
	public function getAndroidApkPacket()
	{
		$version = $this->request->header('version', '');
		$model = new MAndroidApkPacket();
		
		$data = $model->order('id desc')->find();
		if (!empty($data) && $data['version'] > $version) {
			$data['isUpdate'] = true;
		}else {
			$data['isUpdate'] = false;
		}
		
		return $this->sucSysJson($data);
	}
	
	
}