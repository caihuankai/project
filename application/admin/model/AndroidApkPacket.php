<?php
namespace app\admin\model;

use app\common\model\ModelBs;
use think\Db;

use Qiniu\Auth;
use Qiniu\Storage\BucketManager;
use Qiniu\Storage\UploadManager;

class AndroidApkPacket extends ModelBs
{
	/**
	 * 上传安卓apk包到七牛服务器并创建对应记录到数据库
	 * @author liujuneng
	 */
	//php上传文件有大小限制，上传大文件报错，此上传方式废弃
	public function uploadAndroidApkPacket()
	{
		$file = $_FILES['file'];
		$result = -1;
		if(!empty($file['name'])){
			Db::startTrans();
			try {
				//上传至七牛
				$qiniuKey = $this->uploadFile();
				if ($qiniuKey != -1) {
					//存储上传信息至数据库
					$qiniuUrl = \Qiniu::instance()->handleQiNiuResultUrl($qiniuKey);
					$version = input('post.version', '');
					$compulsion = input('post.compulsion', 0);
					$adminId = $_SESSION['adminSess']['admin']['id'];
					
					$data = [
							'qiniu_key'=>$qiniuKey,
							'qiniu_url'=>$qiniuUrl,
							'version'=>$version,
							'compulsion'=>$compulsion,
							'admin_id'=>$adminId
					];
					$result = $this->insert($data);
					Db::commit();
				}
			} catch (\Exception $e) {
				Db::rollback();
			}
		}
		
		if($result == 1){
			return 1;
		}else{
			return -1;
		}
	}
	
	/**
	 * 处理上传的主方法
	 * @author liujuneng
	 */
	//php上传文件有大小限制，上传大文件报错，此上传方式废弃
	protected function uploadFile()
	{
		//$file = request()->file('fileList');
		$file = request()->file('file');
		
		//require_once APP_PATH . '/../vendor/autoload.php';
		
		
		// 构建鉴权对象
		$auth = \Qiniu::instance()->getAuth();
		
		// 要上传的空间
		$bucket = \Qiniu::instance()->getBucket();
		
		// 生成上传 Token
		$token = $auth->uploadToken($bucket);
		
		// 要上传文件的本地路径
		$filePath = $file->getRealPath();
		
		$ext = pathinfo($file->getInfo('name'), PATHINFO_EXTENSION);  //后缀
		$fileName = basename($file->getInfo('name'), '.' . $ext);//文件名不带后缀
		
		// 上传到七牛后保存的文件名
		$key = $fileName . '_' . date('YmdHis') . rand(0, 9999) . '.' . $ext;
		
		// 初始化 UploadManager 对象并进行文件的上传
		$uploadMgr = new UploadManager();
		
		// 调用 UploadManager 的 putFile 方法进行文件的上传
		list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
		if ($err !== null) {
			// var_dump($err);
			//return WReturn("图片上传失败", -1 , $err);
			return -1;
		} else {
			// echo $bucket . '/' . $key;
			//return WReturn("图片上传成功", 1 , $bucket . '/' . $key);
			return $key;
		}
	}
	
}