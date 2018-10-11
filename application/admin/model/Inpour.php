<?php
namespace app\admin\model;

use app\common\model\ModelBs;
use think\Db;

use Qiniu\Auth;
use Qiniu\Storage\BucketManager;
use Qiniu\Storage\UploadManager;

class Inpour extends ModelBs
{
	protected $typeText = [
			1=>'RMB充值礼点'
	];
	
	public function getTypeText($type)
	{
		return !is_null($type) ? getDataByKey($this->typeText, $type, 1) : $this->typeText;
	}
	
	/**
	 * 根据id获取对应记录
	 */
	public function getInpourById($id)
	{
		$data = $this->where('id', $id)->find();
		
		return $data;
	}
	
	/**
	 * 新增
	 */
	public function add(){
		$data = input('post.');
		
		$file = $_FILES['file'];
		if(!empty($file['name'])){
			Db::startTrans();
			try{
				//上传至七牛
				$qiniuKey = $this->uploadPicture();
				if($qiniuKey != -1){
					//存储上传信息至数据库
					$userId = $_SESSION['adminSess']['admin']['id'];
					$qiniuImg = \Qiniu::instance()->handleQiNiuResultUrl($qiniuKey);
					
					$dataQiniu = ['qiniuKey' => $qiniuKey, 'positionType' => 3, 'qiniuImg' => $qiniuImg, 'userId' => $userId];
					$qiniu_id = Db::connect('bs_db_config')->name('qiniu_gallerys')->insertGetId($dataQiniu);
					
					// $qiniu_id = Db::connect('bs_db_config')->name('qiniu_gallerys')->getLastInsID();
					
					$data['image'] = $qiniuImg;
					$data['admin_id'] = $_SESSION['adminSess']['admin']['id'];
					$data['qiniu_id'] = $qiniu_id;
					$result = $this->allowField(true)->save($data);
					Db::commit();
				}
			} catch (\Exception $e) {
				$result = -1;
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
	 * 编辑
	 */
	public function edit($id){
		$data = input('post.');
		$data['create_time'] = date('Y-m-d H:i:s');
		
		$file = !empty($_FILES['file']) ? $_FILES['file'] : [];
		if(!empty($file['name'])){
			try{
				Db::startTrans();
				//上传至七牛
				$qiniuKey = $this->uploadPicture();
				if($qiniuKey != -1){
					//存储上传信息至数据库
					$userId = $_SESSION['adminSess']['admin']['id'];
					$qiniuImg = \Qiniu::instance()->handleQiNiuResultUrl($qiniuKey);
					$dataQiniu = ['qiniuKey' => $qiniuKey, 'positionType' => 3, 'qiniuImg' => $qiniuImg, 'userId' => $userId];
					$qiniu_id = Db::connect('bs_db_config')->name('qiniu_gallerys')->insertGetId($dataQiniu);
					// $qiniu_id = Db::connect('bs_db_config')->name('qiniu_gallerys')->getLastInsID();
					
					$rs = $this->where('id', (int)$id)->find();
					$qiniu_id_delete = $rs['qiniu_id'];
					
					$data['image'] = $qiniuImg;
					$data['admin_id'] = $_SESSION['adminSess']['admin']['id'];
					$data['qiniu_id'] = $qiniu_id;
					//更新当前信息
					$this->allowField(true)->save($data, ['id'=>(int)$id]);
					
					//查询七牛表
					$rsx = Db::connect('bs_db_config')->name('qiniu_gallerys')->where('id',$qiniu_id_delete)->find();
					$qiniuKey = $rsx['qiniuKey'];
					//删除七牛云上的资源
					$rsq = $this->deletePicture($qiniuKey);
					if($rsq == 1){
						//删除七牛表
						Db::connect('bs_db_config')->name('qiniu_gallerys')->where('id',$qiniu_id_delete)->delete();
						$result = 1;
					}else{
						$result = -1;
					}
					Db::commit();
				}
			} catch (\Exception $e) {
				$result = -1;
				Db::rollback();
			}
		}else{
			$data['admin_id'] = $_SESSION['adminSess']['admin']['id'];
			//更新当前信息
			$result = $this->allowField(true)->save($data, ['id'=>(int)$id]);
		}
		if($result == 1){
			return 1;
		}else{
			return -1;
		}
	}
	
	/**
	 * 删除
	 */
	public function del($ids){
		$result = $this->deleteFunc($ids);
		
		// if(false !== $result){
		if($result == 1){
			return 1;
		}else{
			return -1;
		}
	}
	
	
	protected function deleteFunc($ids)
	{
		$result = 1;
		try{
			Db::startTrans();
			//$result = $this->setField(['adId'=>$id,'dataFlag'=>-1]);
			//$result = Db::name('ads')->setField(['adId'=>$id,'dataFlag'=>-1]);
			
			$rsList = $this->where('id', 'in', $ids)->select();
			foreach ($rsList as $rs) {
				$qiniu_id_delete = $rs['qiniu_id'];
				//查询七牛表
				$rsx = Db::connect('bs_db_config')->name('qiniu_gallerys')->where('id',$qiniu_id_delete)->find();
				$qiniuKey = $rsx['qiniuKey'];
				//删除七牛云上的资源
				$rsq = $this->deletePicture($qiniuKey);
				
				if($rsq == 1){
					//删除七牛表
					Db::connect('bs_db_config')->name('qiniu_gallerys')->where('id',$qiniu_id_delete)->delete();
				}else{
					$result = -1;
				}
			}
			
			if ($result == 1) {
				$this->where('id', 'in', $ids)->delete();
				Db::commit();
			}else {
				$result = -1;
				Db::rollback();
			}
		} catch (\Exception $e) {
			$result = -1;
			Db::rollback();
		}
		
		return $result;
	}
	
	//处理上传的主方法
	public function uploadPicture()
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
		
		// 上传到七牛后保存的文件名
		$key = substr(md5($file->getRealPath()) , 0, 5). date('YmdHis') . rand(0, 9999) . '.' . $ext;
		
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
	
	//删除七牛图片
	public function deletePicture($key){
		//$file = request()->file('file');
		
		//require_once APP_PATH . '/../vendor/autoload.php';
		
		
		// 构建鉴权对象
		$auth = \Qiniu::instance()->getAuth();
		// 要上传的空间
		$bucket = \Qiniu::instance()->getBucket();
		
		//初始化BucketManager
		$bucketMgr = new BucketManager($auth);
		
		//删除$bucket 中的文件 $key
		$err = $bucketMgr->delete($bucket, $key);
		// echo "\n====> delete $key : \n";
		if ($err !== null) {
			// var_dump($err);
			// WReturn("删除失败",-1,$err);
			return -1;
		} else {
			// echo "Success!";
			// WReturn("删除成功",1,$err);
			return 1;
		}
	}  
	
	
	
}