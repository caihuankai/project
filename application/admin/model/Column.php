<?php
namespace app\admin\model;

use app\common\model\ModelBs;
use think\Db;

use Qiniu\Auth;
use Qiniu\Storage\BucketManager;
use Qiniu\Storage\UploadManager;

class Column extends ModelBs
{
	protected $levelText = [
			0 => '免费',
			1 => '付费',
	];
	
	protected $cyclePriceInfo = [
		[
				'days'=>7,
				'total'=>0,
				'discount'=>9.5,
				'cost'=>0,
				'save'=>0,
				'status'=>1
		],
		[
				'days'=>30,
				'total'=>0,
				'discount'=>9.0,
				'cost'=>0,
				'save'=>0,
				'status'=>1
		],
		[
				'days'=>180,
				'total'=>0,
				'discount'=>8.8,
				'cost'=>0,
				'save'=>0,
				'status'=>1
		],
		[
				'days'=>365,
				'total'=>0,
				'discount'=>8.5,
				'cost'=>0,
				'save'=>0,
				'status'=>1
		]
	];
	
	/**
	 * 获取栏目等级的文案
	 *
	 * @return array
	 * @author liujuneng
	 */
	public function getLevelText($level)
	{
		return !is_null($level) ? getDataByKey($this->levelText, $level, 0) : $this->levelText;
	}
	
	/**
	 * 获取栏目的周期价格
	 * @param unknown $key
	 * @return number[][]|mixed|array|\ArrayAccess
	 */
	public function getCyclePriceInfo($key = null)
	{
		return !is_null($key) ? getDataByKey($this->cyclePriceInfo, $key, 0) : $this->cyclePriceInfo;
	}
	
	/**
	 * 根据栏目id获取栏目信息
	 * @param unknown $columnIdList
	 * @return \think\Collection|\think\db\false|PDOStatement|string
	 */
	public function getColumnByIdList($columnIdList)
	{
		if (empty($columnIdList)) {
			return [];
		}
		
		$data = $this->where('id', 'in', $columnIdList)->select();
		
		return $data;
	}
	
	/**
	 * 根据栏目id获取栏目字段
	 * @param unknown $columnIdList
	 * @param string $field
	 * @return array|array
	 */
	public function getColumn($columnIdList, $field = 'name')
	{
		if (empty($columnIdList)) {
			return [];
		}
		
		$data = $this->where('id', 'in', $columnIdList)->column($field, 'id');
		
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
					
					$dataQiniu = ['qiniuKey' => $qiniuKey, 'qiniuImg' => $qiniuImg, 'userId' => $userId];
					$qiniu_id = Db::connect('bs_db_config')->name('qiniu_gallerys')->insertGetId($dataQiniu);
					
					// $qiniu_id = Db::connect('bs_db_config')->name('qiniu_gallerys')->getLastInsID();
					
					$insertData = [];
					$insertData['name'] = $data['columnName'];
					$insertData['lead'] = $data['lead'];
					$insertData['qiniu_id'] = $qiniu_id;
					$insertData['level'] = $data['level'];
					$insertData['price'] = $data['price'];
					$insertData['cycle_price_info'] = json_encode($data['cyclePriceInfo']);
					$insertData['virtual_read_num'] = $data['virtualReadNum'];
					$insertData['virtual_focus_num'] = $data['virtualFocusNum'];
					$insertData['status'] = $data['status'];
					$insertData['sort'] = $data['sort'];
					
					$result = $this->allowField(true)->save($insertData);
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
		$updateData = [];
		$updateData['name'] = $data['columnName'];
		$updateData['lead'] = $data['lead'];
		$updateData['level'] = $data['level'];
		$updateData['price'] = $data['price'];
		$updateData['cycle_price_info'] = json_encode($data['cyclePriceInfo']);
		$updateData['virtual_read_num'] = $data['virtualReadNum'];
		$updateData['virtual_focus_num'] = $data['virtualFocusNum'];
		$updateData['status'] = $data['status'];
		$updateData['sort'] = $data['sort'];
		
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
					$dataQiniu = ['qiniuKey' => $qiniuKey, 'qiniuImg' => $qiniuImg, 'userId' => $userId];
					$qiniu_id = Db::connect('bs_db_config')->name('qiniu_gallerys')->insertGetId($dataQiniu);
					// $qiniu_id = Db::connect('bs_db_config')->name('qiniu_gallerys')->getLastInsID();
					
					$rs = $this->where('id', (int)$id)->find();
					$qiniu_id_delete = $rs['qiniu_id'];
					
					//更新当前信息
					$updateData['qiniu_id'] = $qiniu_id;
					$this->allowField(true)->save($updateData, ['id'=>(int)$id]);
					
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
			//更新当前信息
			$result = $this->allowField(true)->save($updateData, ['id'=>(int)$id]);
		}
		if($result == 1){
			return 1;
		}else{
			return -1;
		}
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