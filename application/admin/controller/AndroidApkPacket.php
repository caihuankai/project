<?php
namespace app\admin\controller;

use app\admin\model\AndroidApkPacket as MAndroidApkPacket;

class AndroidApkPacket extends App
{
	/**
	 * 前端上传安卓apk包到七牛服务器后，创建对应记录到数据库
	 * @author liujuneng
	 */
	public function uploadAndroidApkPacket()
	{
		$request = $this->request;
		if ($request->isPost()) {
			$androidApkPacketModel = new MAndroidApkPacket();
			$qiniuKey = $request->post('key', '');
			$qiniuUrl = $request->post('link', '');
			$version = $request->post('version', '');
			$content = $request->post('content', '');
			$compulsion = $request->post('compulsion/i', 0);
			if (empty($qiniuKey) || empty($qiniuUrl)) {
				return $this->errSysJson('上传失败');
			}
			$data = [
					'qiniu_key'=>$qiniuKey,
					'qiniu_url'=>$qiniuUrl,
					'version'=>$version,
					'content'=>$content,
					'compulsion'=>$compulsion,
					'admin_id'=>$this->getAdminId()
			];
			$result = $androidApkPacketModel->insert($data);
			if ($result == 1) {
				return $this->sucSysJson("上传成功");
			}else {
				return $this->errSysJson('上传失败');
			}
		}
		
		return $this->fetch();
	}
	
	
	
}