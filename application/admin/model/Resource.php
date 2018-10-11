<?php
namespace app\admin\model;

use app\common\model\ModelBase;
use think\Request;
use think\Db;

use Qiniu\Auth;
use Qiniu\Storage\BucketManager;
use Qiniu\Storage\UploadManager;

class Resource extends ModelBase{
	/**
	 * 分页
	 */
	public function pageQuery(){
		$where = [];
		$where['a.dataFlag'] = 1;
		
		$resourceClassificationId = input('resourceClassificationId');
		if(!empty($resourceClassificationId))$where['a.resourceClassificationId'] = $resourceClassificationId;
		
		$PdcSn = input('pdc_sn');
		if(!empty($PdcSn))$where['a.pdc_sn'] = $PdcSn;
		
		$resourceType = input('resourceType');
		if(!empty($resourceType))$where['a.resourceType'] = $resourceType;
		
		
		$CreateTimeMin = input('create_time_min');
		$CreateTimeMax = input('create_time_max');
		if(!empty($CreateTimeMax) && !empty($CreateTimeMin))$where['a.createTime'] = ['between time',array($CreateTimeMin,$CreateTimeMax)];
		
		return Db::name('resource')->alias('a')
		            ->join('resource_classification ap','a.resourceClassificationId=ap.resourceClassificationId AND ap.dataFlag=1','left')
					->field('a.resourceId,a.dataFlag,a.resourceClassificationId,a.resourceURL,a.resourceType,a.resourceTip,a.resourceStartDate,a.resourceEndDate,a.operatorName,ap.resourceClassificationName,a.resourceSort')
		            ->where($where)->order('a.resourceId desc')
		            ->paginate(input('DataTables_Table_0_length/d'));
	}
	
	/**
	 * 根据ID取
	 */
	public function getById($id){
		return $this->get(['resourceId'=>$id,'dataFlag'=>1]);
	}
	
	/**
	 * 新增
	 */
	public function add(){
		$data = input('post.');
		$data['createTime'] = date('Y-m-d H:i:s');

		$file = $_FILES['file'];
		if(!empty($file['name'])){
			Db::startTrans();
			try{
				//上传至七牛
				$qiniuKey = $this->uploadPicture();
                if($qiniuKey != -1){
                    //存储上传信息至数据库
                    $userId = $_SESSION['adminSess']['admin']['id'];

                    switch (is_array($qiniuKey)){
                        case 1:
                            $pid = rand(1,999999);
                            foreach ($qiniuKey as $k => $v){
                                $qiniuImg = \Qiniu::instance()->handleQiNiuResultUrl($v);
                                $dataQiniu = ['qiniuKey' => $v, 'positionType' => 3, 'qiniuImg' => $qiniuImg, 'userId' => $userId];
                                $qiniu_id = Db::connect('bs_db_config')->name('qiniu_gallerys')->insertGetId($dataQiniu);
                                $inSertData['resourceClassificationId'] = $data['resourceClassificationId'];
                                $inSertData['resourceType'] = $data['resourceType'];
                                $inSertData['resourceTip'] = $data['resourceTip'];
                                $inSertData['createTime'] = $data['createTime'];
                                $inSertData['resourceURL'] = $qiniuImg;
                                $inSertData['operatorId'] = $_SESSION['adminSess']['admin']['id'];
                                $inSertData['operatorName'] = $_SESSION['adminSess']['admin']['username'];
                                $inSertData['qiniu_id'] = $qiniu_id;
                                $inSertData['remark'] = $pid;
                                $result = $this->allowField(true)->insert($inSertData);
                            }
                            break;
                        case 0:
                            $qiniuImg = \Qiniu::instance()->handleQiNiuResultUrl($qiniuKey);
                            $dataQiniu = ['qiniuKey' => $qiniuKey, 'positionType' => 3, 'qiniuImg' => $qiniuImg, 'userId' => $userId];
                            $qiniu_id = Db::connect('bs_db_config')->name('qiniu_gallerys')->insertGetId($dataQiniu);

                            $data['resourceURL'] = $qiniuImg;
                            $data['operatorId'] = $_SESSION['adminSess']['admin']['id'];
                            $data['operatorName'] = $_SESSION['adminSess']['admin']['username'];
                            $data['qiniu_id'] = $qiniu_id;
                            $result = $this->allowField(true)->save($data);
                            break;
                    }
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
	public function edit(){	
		$data = input('post.');
		$data['createTime'] = date('Y-m-d H:i:s');
		$file = $_FILES['file'];
        $result = 1;
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
					
					$rs = Db::name('resource')->where('resourceId',(int)$data['Id'])->find();
					$qiniu_id_delete = $rs['qiniu_id'];
					
					$data['resourceURL'] = $qiniuImg;
					$data['operatorId'] = $_SESSION['adminSess']['admin']['id'];
					$data['operatorName'] = $_SESSION['adminSess']['admin']['username'];
					$data['qiniu_id'] = $qiniu_id;
					$this->allowField(true)->save($data,['resourceId'=>(int)$data['Id']]);
					
					//查询七牛表
					$rsx = Db::connect('bs_db_config')->name('qiniu_gallerys')->where('id',$qiniu_id_delete)->find();
					$qiniuKey = $rsx['qiniuKey'];
					//删除七牛云上的资源
					$rsq = $this->deletePicture($qiniuKey);
					if($rsq == 1){
						//删除七牛表
						Db::connect('bs_db_config')->name('qiniu_gallerys')->where('id',$qiniu_id_delete)->delete();
						Db::commit();
						$result = 1;
					}else{
						$result = -1;
                        Db::rollback();
					}
				}
			} catch (\Exception $e) {
				$result = -1;
				Db::rollback();
			}
		}else{
			$data['operatorId'] = $_SESSION['adminSess']['admin']['id'];
			$data['operatorName'] = $_SESSION['adminSess']['admin']['username'];
			$result = $this->allowField(true)->save($data,['resourceId'=>(int)$data['Id']]);
		}
		// $result = $this->allowField(true)->save($data,['resourceId'=>(int)$data['Id']]);
		if($result == 1){
			return 1;
		}else{
			return -1;
		}	
	}
	
	/**
	 * 删除
	 */
    public function del(array $ids){
		Db::startTrans();
		try{
			//$result = $this->setField(['resourceId'=>$id,'dataFlag'=>-1]);
			$rs = $this->where(['resourceId' => ['in', $ids]])->column('qiniu_id');
			$qiniu_id_delete = $rs;
			$model = Db::connect('bs_db_config')->name('qiniu_gallerys');
			//查询七牛表
			$rsx = $model->where(['id' => ['in', $qiniu_id_delete]])->column('qiniuKey');
			//删除七牛云上的资源
            if (!empty($rsx)) {
                $rsq = $this->deletePicture($rsx);
            }else{
                $rsq = false;
            }
            
            if (is_array($rsq)) {
                // todo 删除多个的处理
                
            }
            
            
            //删除七牛表
            if ($rsq && $rsq !== -1) {
                $model->where(['id' => ['in', $qiniu_id_delete]])->delete();
            }
            
            $this->update(['dataFlag' => -1], ['resourceId' => ['in', $ids]]);
            Db::commit();
            $result = 1;
		} catch (\Exception $e) {
			$result = -1;
			Db::rollback();
		}
		
		//if(false !== $result){
		if($result == 1){
			return 1;
        }else{
			return -1;
        }
	}

	/**
     * 云存储下的所有图片
     * @return mixed
     */
    public function pictureList()
    {
        $auth = \Qiniu::instance()->getAuth();
        $bucketMgr = new BucketManager($auth);

        // 要列取的空间名称
        $bucket = \Qiniu::instance()->getBucket();
        // 要列取文件的公共前缀
        $prefix = '';
        // 上次列举返回的位置标记，作为本次列举的起点信息。
        $marker = '';
        // 本次列举的条目数
        //$limit = 3;

        // 列举文件
        $list = $bucketMgr->listFiles($bucket, $prefix, $marker);
        $list = array_filter($list);
		
		return WReturn("获取图片列表成功", 1 , $list);
    }
	
	//处理上传的主方法
    public function uploadPicture()
    {
    	//$file = request()->file('fileList');
		$file = request()->file('file');
        //require_once APP_PATH . '/../vendor/autoload.php';

        $auth = \Qiniu::instance()->getAuth();

        // 要上传的空间
        //$bucket = config('BUCKET');
        // $bucket = 'magicyork';
        $bucket = \Qiniu::instance()->getBucket();

        // 生成上传 Token
        $token = $auth->uploadToken($bucket);

        switch (is_array($file)){
            case 1:
                $res = [];
                foreach ($file as $v){
                    // 要上传文件的本地路径
                    $filePath = $v->getRealPath();

                    $ext = pathinfo($v->getInfo('name'), PATHINFO_EXTENSION);  //后缀

                    // 上传到七牛后保存的文件名
                    $key = substr(md5($v->getRealPath()) , 0, 5). date('YmdHis') . rand(0, 9999) . '.' . $ext;

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
                        $res[] = $key;
                    }
                }
                return $res;
                break;
            case 0:
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
                break;
        }
    }
	
	//删除七牛图片
    public function deletePicture($keys){
        if (empty($keys)) {
            return 1;
        }
		
        // 构建鉴权对象
        $auth = \Qiniu::instance()->getAuth();
		// 要上传的空间
        $bucket = \Qiniu::instance()->getBucket();
		
		//初始化BucketManager
		$bucketMgr = new BucketManager($auth);
		
		//删除$bucket 中的文件 $key
        if (is_array($keys)) {
            $err = BucketManager::buildBatchDelete($bucket, $keys);
        }else{
            //buildBatchDelete
            $err = $bucketMgr->delete($bucket, $keys);
        }
		
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
