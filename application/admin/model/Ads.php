<?php
namespace app\admin\model;

use app\common\controller\JsonResult;
use app\common\model\ModelBase;
use think\Request;
use think\Db;

use Qiniu\Auth;
use Qiniu\Storage\BucketManager;
use Qiniu\Storage\UploadManager;
use app\common\model\Live;
use app\common\model\Course;
use app\admin\model\Viewpoint;
use app\common\model\HitRecord;
use think\config;



class Ads extends ModelBase{
    protected $msg = '未定义类型';
    protected $datarelevanceType = [
        '0' => '跳转类型',
//         '6' => '讲师介绍页',
//         '7' => '外链',
        '13' =>'视频',
    	'14' => '讲师介绍页',
    	'15' => '月度课介绍页',
    	'16' => '季度课介绍页',
    	'17' => '私人订制课页面'
    ];
    protected $datastatus = [
        '0' =>'状态',
        '1' =>'正常',
        '-1' =>'禁用'
    ];

    /**
     * 获取$type类型数据的状态类型
     * @param $type
     * @param $key
     * @return string
     */
    public function getTypeOrStatus($type,$key=null)
    {
        $type = "data".$type;
        $data = $this->$type;
        if ($key === null){
            return $data;
        }
        return isset($data[$key]) ? $data[$key] : $this->msg;
    }


    /**
     * 生成IMG表情内容
     * @param $src
     * @return string
     */
    public static function makeImg($src)
    {
        return "<img src='{$src}' onclick=\"_showBig('{$src}')\" style='width: 35px;height: 35px;margin:0 35%;'>";
    }
	/**
	 * 分页
	 */
	public function pageQuery(){
		$where = [];
		$where['a.dataFlag'] = 1;
    $where['a.relevanceType'] = ['in',[0,1]];
		
		$CreateTimeMin = input('create_time_min');
		$CreateTimeMax = input('create_time_max');
		if(!empty($CreateTimeMax) && !empty($CreateTimeMin))$where['a.createTime'] = ['between time',array($CreateTimeMin,$CreateTimeMax)];
		
		return Db::name('ads')->alias('a')
					->field('adId,adName,adURL,adStartDate,adEndDate,adFile,adClickNum,a.adSort,operatorName,adStatus')
		            ->where($where)
		            ->order('adSort asc, adId desc')
		            ->paginate(input('DataTables_Table_0_length/d'));
	}
	
	public function getById($id){
		return $this->get(['adId'=>$id,'dataFlag'=>1]);
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
					$qiniuImg = \Qiniu::instance()->handleQiNiuResultUrl($qiniuKey);
					
					$dataQiniu = ['qiniuKey' => $qiniuKey, 'positionType' => 3, 'qiniuImg' => $qiniuImg, 'userId' => $userId];
					$qiniu_id = Db::connect('bs_db_config')->name('qiniu_gallerys')->insertGetId($dataQiniu);
					
					// $qiniu_id = Db::connect('bs_db_config')->name('qiniu_gallerys')->getLastInsID();
					
					$data['adFile'] = $qiniuImg;
					$data['operatorId'] = $_SESSION['adminSess']['admin']['id'];
					$data['operatorName'] = $_SESSION['adminSess']['admin']['username'];
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
	public function edit(){	
		$data = input('post.');
		$data['createTime'] = date('Y-m-d H:i:s');
        
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
					
					$rs = Db::name('ads')->where('adId',(int)$data['Id'])->find();
					$qiniu_id_delete = $rs['qiniu_id'];
					
					$data['adFile'] = $qiniuImg;
					$data['operatorId'] = $_SESSION['adminSess']['admin']['id'];
					$data['operatorName'] = $_SESSION['adminSess']['admin']['username'];
					$data['qiniu_id'] = $qiniu_id;
					//更新当前信息
					$this->allowField(true)->save($data,['adId'=>(int)$data['Id']]);
					
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
			$data['operatorId'] = $_SESSION['adminSess']['admin']['id'];
			$data['operatorName'] = $_SESSION['adminSess']['admin']['username'];
			//更新当前信息
			$result = $this->allowField(true)->save($data,['adId'=>(int)$data['Id']]);
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
    public function del(){
		$id = (int)input('get.id/d');
		$result = $this->deleteFunc($id);
		
		// if(false !== $result){
		if($result == 1){
			return 1;
        }else{
			return -1;
        }	
	}
    
    
    protected function deleteFunc($id)
    {
        $result = 1;
        try{
            $id = (int)$id;
            Db::startTrans();
            //$result = $this->setField(['adId'=>$id,'dataFlag'=>-1]);
            //$result = Db::name('ads')->setField(['adId'=>$id,'dataFlag'=>-1]);
        
            $rs = Db::name('ads')->where('adId', $id)->find();
            $qiniu_id_delete = $rs['qiniu_id'];
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
            Db::name('ads')->setField(['adId'=>$id,'dataFlag'=>-1]);
            Db::commit();
        } catch (\Exception $e) {
            $result = -1;
            Db::rollback();
        }
        
        return $result;
	}
	
	
	/**
	 * 批量删除，固定返回成功
	 */
    public function deleteBatch(){
		$data = input('get.');
		$ids = $data['Check'];
		$id_array = explode(",", $ids);
		foreach($id_array as $id){
            $this->deleteFunc($id);
		}
		
		return 1;
	}
	
	/**
	 * 停用
	 */
    public function adStop(){
		$id = (int)input('get.id/d');
		$result = Db::name('ads')->setField(['adId'=>$id,'adStatus'=>-1]);
		if(false !== $result){
			return 1;
        }else{
			return -1;
        }	
	}
	
	/**
	 *启用
	 */
    public function adStart(){
		$id = (int)input('get.id/d');
		$result = Db::name('ads')->setField(['adId'=>$id,'adStatus'=>1]);
		if(false !== $result){
			return 1;
        }else{
			return -1;
        }	
	}
	
	/**
	* 修改广告排序
	*/
	public function changeSort(){
		$id = (int)input('id');
		$adSort = (int)input('adSort');
		$result = $this->setField(['adId'=>$id,'adSort'=>$adSort]);
		if(false !== $result){
        	return 1;
        }else{
        	return -1;
        }
	}
    
    
    
    /**
     * 指定课程id和排序，直接插入首页banner
     *
     * @param     $courseId
     * @param int $sort
     * @return bool|int|string
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function insertByCourseId($courseId, $sort = 1, $type = 0, $adminId = 0, $adminName = '')
    {
        if (empty($courseId)) {
            $this->setError(JsonResult::ERR_COURSE_NOT_EXIST);
            return false;
        }
        
        /** @var \app\admin\model\Course $courseModel */
        $courseModel = model('admin/Course');
        $courseData = $courseModel->where(['id' => $courseId])->field('id, class_name, src_img, open_status, status')->find();
        
        if (empty($courseData)) { // 不存在的课程
            $this->setError(JsonResult::ERR_COURSE_NOT_EXIST);
            return false;
        }
        
        if ($courseData['open_status'] == 2) { // 课程已屏蔽
            $this->setError(JsonResult::ERR_COURSE_DISABLE);
            return false;
        }
        
        if ($courseData['status'] == 5) { // 课程已删除
            $this->setError(JsonResult::ERR_COURSE_DELETE);
            return false;
        }
        
        $data = $this->where(['relevanceId' => $courseId, 'positionType' => $type, 'dataFlag' => 1])->field('adId')->find(); // 排除删除的
        if (!empty($data)){
            $this->setError(JsonResult::ERR_COURSE_RECOMMEND);
            return false;
        }
        
        $relevanceType = 1;
        if ($type == 7) {
        	$relevanceType = 4;
        }
        
        $date = date('Y-m-d H:i:s');
        return $this->insert([
            'adName' => $courseData['class_name'],
            'adFile' => $courseData['src_img'],
            'positionType' => $type,
            'adURL' => $courseModel->getCourseUrl($courseData['id']),
            'adStartDate' => $date,
            'adEndDate' => $date,
            'adSort' => $sort,
        	'relevanceType' => $relevanceType,
            'relevanceId' => $courseId,
            'createTime' => $date,
            'operatorId' => $adminId,
            'operatorName' => $adminName,
        ]);
    }
    
    /**
     * 根据用户输入的内容新增,必须带上传的图片
     * @param unknown $data
     * @return number
     */
    public function addByData($data){
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
    				$qiniuImg = \Qiniu::instance()->handleQiNiuResultUrl($qiniuKey);
    				
    				$dataQiniu = ['qiniuKey' => $qiniuKey, 'positionType' => 3, 'qiniuImg' => $qiniuImg, 'userId' => $userId];
    				$qiniu_id = Db::connect('bs_db_config')->name('qiniu_gallerys')->insertGetId($dataQiniu);
    				
    				// $qiniu_id = Db::connect('bs_db_config')->name('qiniu_gallerys')->getLastInsID();
    				
    				$data['adFile'] = $qiniuImg;
    				$data['operatorId'] = $_SESSION['adminSess']['admin']['id'];
    				$data['operatorName'] = $_SESSION['adminSess']['admin']['username'];
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
    		return true;
    	}else{
    		return false;
    	}
    }
	
	/**
     * 云存储下的所有图片
     * @return mixed
     */
    public function pictureList()
    {
        //require_once APP_PATH . '/../vendor/autoload.php';


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
   // 保存首页焦点推荐
   public function insertInfo($type,$id,$sort){
   		//判断信息是否已存在
   		$where['relevanceType'] = $type;
   		$where['relevanceId'] = $id;
   		$where['dataFlag'] = 1;
      $where['positionType'] = 1;
   		$infoStatus = $this->where($where)->find();
   		if(!empty($infoStatus)){
   			return $this->saveErrorJson(JsonResult::ERR_REPEAT_RECOMMEND);
   		}
   		$getInsertInfo = $this->getInsertInfo($type,$id);
   		if(empty($getInsertInfo)){
   			return $this->saveErrorJson(JsonResult::ERR_ERROR_RECOMMEND);
   		}else{
   			$data['adFile'] = '';
   			$data['adName'] = $getInsertInfo['name'];
   			$data['adURL'] = $getInsertInfo['url'];
   			$data['adSort'] = $sort;
   			$data['adStartDate'] = date('Y-m-d');
   			$data['adEndDate'] =date('Y-m-d H:i:s');
   			$data['createTime'] =date('Y-m-d H:i:s');
   			$data['adClickNum'] = 0;
   			$data['positionType'] = 1;
   			$data['dataFlag'] = 1;
   			$data['operatorId'] = $_SESSION['adminSess']['admin']['id'];
   			$data['operatorName'] = $_SESSION['adminSess']['admin']['username'];
   			$data['relevanceType'] = $type;
        if($type == 3){
          $id = $getInsertInfo['user_id'];
        }
        if($type == 4){
          if($getInsertInfo['type'] == 1){
            $data['relevanceType'] = 4;
          }else{
            $data['relevanceType'] = 9;
          }
        }
   			$data['relevanceId'] = $id;
   			$data['adStatus'] = -1;
   			$status = $this->insertGetId($data);
   			if($status>0){
          $json['data'] = null;
          $json['code'] = 0;
          $json['msg'] = '推荐成功';
          return json($json, 200);
   			}else{
   				return $this->saveErrorJson(JsonResult::ERR_FAIL_RECOMMEND);
   			}
   		}
   }
   //获取需要保存信息
   public function getInsertInfo($type,$id){
   		$info = array();
   		if($type == 3){
   			$LiveModel = new Live();
   			$info = $LiveModel->alias('l')
   			->join('user u','u.user_id = l.user_id','left')
   			->where('l.id',$id)
   			->field('u.alias as name,l.name as live_name,u.user_id')
   			->find();
   			if(!empty($info)){
   				$info['url'] = config('WX_DOMAIN').'/#/live/'.$info['user_id'];
   			}
   		}
   		if($type == 4){
   			$CoursrModel = new Course();
   			$info = $CoursrModel->where('id',$id)->field('class_name as name,type')->find();
   			if(!empty($info)){
          $info['url'] = config('WX_DOMAIN').'/#/personalCenter/course/'.$id;
   			}
   		}
   		if($type == 5){
   			$ViewpointModel = new Viewpoint();
   			$info = $ViewpointModel->where('id',$id)->field('title as name')->find();
   			if(!empty($info)){
//    			$info['url'] = config('WX_DOMAIN').'/#/personalSpace/viewpointDetail/'.$id.'&0/';//旧的观点详情页
   				$info['url'] = config('WX_DOMAIN').'/#/column/detail/'.$id;//新的观点详情页
   			}
   		}
   		if($type == 6){
   			$UserModel = new \app\common\model\User();
   			$info = $UserModel->where('user_id',$id)->field('alias as name')->find();
   			if(!empty($info)){
   				$info['url'] = config('WX_DOMAIN').'/#/live/'.$id.'&0&4';
   			}
   		}
      //特训班预告
      if($type == 10){
        $info['url'] = config('WX_DOMAIN').'/#/specialTrainAdvance/'.$id;
      }
      //特训班详情
      if($type == 11){
        $info['url'] = config('WX_DOMAIN').'/#/course/specialOnlive/'.$id;
      }
      //特训班回顾
      if($type == 12){
        $info['url'] = config('WX_DOMAIN').'/#/review/'.$id;
      }
   		return $info;
   }
   /**
     * 失败返回
     * @param int $code 返回信息码
     */
    protected function saveErrorJson($code)
    {
        $json = array();
        $json['data'] = null;
        $json['code'] = $code;
        $json['msg'] = JsonResult::$jsonMsg[$code];
        return json($json, 200);
    }
    //获取焦点图列表
    public function dataList($page,$limit,$name,$adStatus,$CreateTimeMin,$CreateTimeMax,$positionType=1,$relevanceType=0,$remark=0){
		$offset = ($page - 1) * $limit;
		$where['dataFlag'] = 1;
		$where['positionType'] = $positionType;
    $where['relevanceType'] = ['in',[3,4,5,6,7,8,9,10,11,12,13]];
    $where['type'] = 1;
		if($relevanceType != 0){
      $where['relevanceType'] = $relevanceType;
    }
    if($remark != 0){
      $where['remark'] = $remark;
    }
		if (!empty($name)) {
            $where['adName'] = ['like', '%'.$name.'%'];
        }
        if (!empty($adStatus)) {
            $where['adStatus'] = $adStatus;
        }
        if(!empty($CreateTimeMax)){
        	$CreateTimeMax = date('Y-m-d',strtotime("$CreateTimeMax+1 day")); 
        }
        if(!empty($CreateTimeMax) && !empty($CreateTimeMin))$where['createTime'] = ['between time',array($CreateTimeMin,$CreateTimeMax)];

		if(!empty($CreateTimeMax) && empty($CreateTimeMin))$where['createTime'] = ['<',$CreateTimeMax];

		if(empty($CreateTimeMax) && !empty($CreateTimeMin))$where['createTime'] = ['>',$CreateTimeMin,$CreateTimeMax];
        $data = $this->where($where)
        ->order('createTime desc')->limit($offset, $limit)->select();
        return $data;
	}

	//获取焦点图总数
	public function countAds($name,$adStatus,$CreateTimeMin,$CreateTimeMax,$positionType = 1,$relevanceType=0,$remark=0){
		$where['dataFlag'] = 1;
		$where['positionType'] = $positionType;
    $where['relevanceType'] = ['in',[3,4,5,6,7,8,9,10,11,12,13]];
    $where['type'] = 1;
    if($relevanceType != 0){
      $where['relevanceType'] = $relevanceType;
    }
    if($remark != 0){
      $where['remark'] = $remark;
    }
		if (!empty($name)) {
            $where['adName'] = ['like', '%'.$name.'%'];
        }
        if (!empty($adStatus)) {
            $where['adStatus'] = $adStatus;
        }
        if(!empty($CreateTimeMax)){
        	$CreateTimeMax = date('Y-m-d',strtotime("$CreateTimeMax+1 day")); 
        }
        if(!empty($CreateTimeMax) && !empty($CreateTimeMin))$where['createTime'] = ['between time',array($CreateTimeMin,$CreateTimeMax)];

		if(!empty($CreateTimeMax) && empty($CreateTimeMin))$where['createTime'] = ['<',$CreateTimeMax];

		if(empty($CreateTimeMax) && !empty($CreateTimeMin))$where['createTime'] = ['>',$CreateTimeMin,$CreateTimeMax];
        $number = $this->where($where)
        ->count();
        return $number;
	}

    //获取轮播图列表
    public function fetchDataList($page,$limit,$name,$adStatus,$CreateTimeMin,$CreateTimeMax,$positionType=1,$relevanceType=0,$remark=0){
        $offset = ($page - 1) * $limit;
        $where['dataFlag'] = 1;
        $where['positionType'] = $positionType;
        $where['relevanceType'] = ['in',[14,15,16,17]];
        $where['type'] = 1;
        if($relevanceType != 0){
            $where['relevanceType'] = $relevanceType;
        }
        if($remark != 0){
            $where['remark'] = $remark;
        }
        if (!empty($name)) {
            $where['adName'] = ['like', '%'.$name.'%'];
        }
        if (!empty($adStatus)) {
            $where['adStatus'] = $adStatus;
        }
        if(!empty($CreateTimeMax)){
            $CreateTimeMax = date('Y-m-d',strtotime("$CreateTimeMax+1 day"));
        }
        if(!empty($CreateTimeMax) && !empty($CreateTimeMin))$where['createTime'] = ['between time',array($CreateTimeMin,$CreateTimeMax)];

        if(!empty($CreateTimeMax) && empty($CreateTimeMin))$where['createTime'] = ['<',$CreateTimeMax];

        if(empty($CreateTimeMax) && !empty($CreateTimeMin))$where['createTime'] = ['>',$CreateTimeMin,$CreateTimeMax];
        $data = $this->where($where)
            ->order('createTime desc')->limit($offset, $limit)->select();
        return $data;
    }
    //获取轮播图总数
    public function fetchCount($name,$adStatus,$CreateTimeMin,$CreateTimeMax,$positionType = 1,$relevanceType=0,$remark=0){
        $where['dataFlag'] = 1;
        $where['positionType'] = $positionType;
        $where['relevanceType'] = ['in',[14,15,16,17]];
        $where['type'] = 1;
        if($relevanceType != 0){
            $where['relevanceType'] = $relevanceType;
        }
        if($remark != 0){
            $where['remark'] = $remark;
        }
        if (!empty($name)) {
            $where['adName'] = ['like', '%'.$name.'%'];
        }
        if (!empty($adStatus)) {
            $where['adStatus'] = $adStatus;
        }
        if(!empty($CreateTimeMax)){
            $CreateTimeMax = date('Y-m-d',strtotime("$CreateTimeMax+1 day"));
        }
        if(!empty($CreateTimeMax) && !empty($CreateTimeMin))$where['createTime'] = ['between time',array($CreateTimeMin,$CreateTimeMax)];

        if(!empty($CreateTimeMax) && empty($CreateTimeMin))$where['createTime'] = ['<',$CreateTimeMax];

        if(empty($CreateTimeMax) && !empty($CreateTimeMin))$where['createTime'] = ['>',$CreateTimeMin,$CreateTimeMax];
        $number = $this->where($where)
            ->count();
        return $number;
    }
  //获取点击量统计
  public function clickNumCount($adClickNum,$type,$id){
    $total = '0/0';
    if($type == 3){
      $HitRecordModel = new HitRecord();
      $data = $HitRecordModel->where('targetId',$id)->where('hitRecordType',5)->count();
      $total = $adClickNum."/".$data;
    }
    if($type == 4 || $type == 9){
      $CourseModel = new Course();
      $data = $CourseModel->where('id',$id)->find();
      if(empty($data)){
        $data['study_num'] = 0;
        $total = $adClickNum."/".$data['study_num'];
      }else{
        $total = $adClickNum."/".$data['study_num'];
      }
    }
    if($type == 5){
      $ViewpointModel = new Viewpoint();
      $data = $ViewpointModel->where('id',$id)->find();
      if(empty($data)){
        $data['study_num'] = 0;
        $total = $adClickNum."/".$data['study_num'];
      }else{
        $total = $adClickNum."/".$data['study_num'];
      }
    }
    if($type == 6 || $type == 7 || $type == 8){
      $total = $adClickNum."/".$adClickNum;
    }
    return $total;
  }
  //官网后台接口
  //获取焦点图列表
    public function webDataList($page,$limit,$name,$adStatus,$CreateTimeMin,$CreateTimeMax,$positionType=1,$relevanceType=0,$remark=0){
    $offset = ($page - 1) * $limit;
    $where['dataFlag'] = 1;
    $where['positionType'] = $positionType;
    $where['relevanceType'] = ['in',[3,4,5,6,7,8,9,10,11,12,13]];
    $where['type'] = 2;
    if($relevanceType != 0){
      $where['relevanceType'] = $relevanceType;
    }
    if($remark != 0){
      $where['remark'] = $remark;
    }
    if (!empty($name)) {
            $where['adName'] = ['like', '%'.$name.'%'];
        }
        if (!empty($adStatus)) {
            $where['adStatus'] = $adStatus;
        }
        if(!empty($CreateTimeMax)){
          $CreateTimeMax = date('Y-m-d',strtotime("$CreateTimeMax+1 day")); 
        }
        if(!empty($CreateTimeMax) && !empty($CreateTimeMin))$where['createTime'] = ['between time',array($CreateTimeMin,$CreateTimeMax)];

    if(!empty($CreateTimeMax) && empty($CreateTimeMin))$where['createTime'] = ['<',$CreateTimeMax];

    if(empty($CreateTimeMax) && !empty($CreateTimeMin))$where['createTime'] = ['>',$CreateTimeMin,$CreateTimeMax];
        $data = $this->where($where)
        ->order('createTime desc')->limit($offset, $limit)->select();
        return $data;
  }
  //获取焦点图总数
  public function webCount($name,$adStatus,$CreateTimeMin,$CreateTimeMax,$positionType = 1,$relevanceType=0,$remark=0){
    $where['dataFlag'] = 1;
    $where['positionType'] = $positionType;
    $where['relevanceType'] = ['in',[3,4,5,6,7,8,9,10,11,12,13]];
    $where['type'] = 2;
    if($relevanceType != 0){
      $where['relevanceType'] = $relevanceType;
    }
    if($remark != 0){
      $where['remark'] = $remark;
    }
    if (!empty($name)) {
            $where['adName'] = ['like', '%'.$name.'%'];
        }
        if (!empty($adStatus)) {
            $where['adStatus'] = $adStatus;
        }
        if(!empty($CreateTimeMax)){
          $CreateTimeMax = date('Y-m-d',strtotime("$CreateTimeMax+1 day")); 
        }
        if(!empty($CreateTimeMax) && !empty($CreateTimeMin))$where['createTime'] = ['between time',array($CreateTimeMin,$CreateTimeMax)];

    if(!empty($CreateTimeMax) && empty($CreateTimeMin))$where['createTime'] = ['<',$CreateTimeMax];

    if(empty($CreateTimeMax) && !empty($CreateTimeMin))$where['createTime'] = ['>',$CreateTimeMin,$CreateTimeMax];
        $number = $this->where($where)
        ->count();
        return $number;
  }
  /**
   * 获取官网系列课-精品/基础/高级 基础课程数据
   * @param  [type] $page [description]
   * @param  [type] $size [description]
   * @return [type]       [description]
   */
  public function getAddSeriseColumnList($page,$size){
    $CourseModel = new Course();
    $where = [];
    $where['c.type'] = 2;
    $where['c.pid'] = 0;
    $where['c.status'] = ['in',[1,4]];
    $list = $CourseModel->alias('c')
    ->field('c.id,c.class_name,u.alias,u.user_id,c.type,c.level,c.price,c.study_num,c.create_time,a.remark')
    ->join('talk_user u','u.user_id = c.uid')
    ->join('talk_admin.talk_ads a','a.relevanceId = c.id and a.type = 2 and a.dataFlag = 1 and a.positionType = 19','left')
    ->where($where)
    ->order('c.id desc')
    ->page($page,$size)
    ->select();
    $count = $CourseModel->alias('c')
    ->field('c.id')
    ->join('talk_user u','u.user_id = c.uid')
    ->join('talk_admin.talk_ads a','a.relevanceId = c.id and a.type = 2 and a.dataFlag = 1 and a.positionType = 19','left')
    ->where($where)
    ->count();
    $data['list'] = $list;
    $data['count'] = $count;
    return $data;
  }
  /**
   * 获取公众号系列课-精品/基础/高级 基础课程数据
   * @param  [type] $page [description]
   * @param  [type] $size [description]
   * @return [type]       [description]
   */
  public function getWOAAddSeriseColumnList($page,$size,$course_id,$teacher_name,$course_name,$remark,$course_type){
    $CourseModel = new Course();
    $where = [];
    $where['c.type'] = 2;
    $where['c.pid'] = 0;
    $where['c.status'] = ['in',[1,4]];
    !empty($course_id) ? $where['c.id'] = $course_id : '';
    !empty($teacher_name) ? $where['u.alias'] = ['like', '%'.$teacher_name.'%'] : '';
    !empty($course_name) ? $where['c.class_name'] = ['like','%'.$course_name.'%'] : '';
    in_array($remark,[1,2,3]) ? $where['a.remark'] = $remark : '';
    if($course_type == 1){
      $where['c.level'] = 2;
    }
    if($course_type == 2){
      $where['c.level'] = ['in',[0,1]];
    }
    $list = $CourseModel->alias('c')
    ->field('c.id,c.class_name,u.alias,u.user_id,c.type,c.level,c.price,c.study_num,c.create_time,a.remark')
    ->join('talk_user u','u.user_id = c.uid')
    ->join('talk_admin.talk_ads a','a.relevanceId = c.id and a.type = 1 and a.dataFlag = 1 and a.positionType = 19','left')
    ->where($where)
    ->order('c.id desc')
    ->page($page,$size)
    ->select();
    $count = $CourseModel->alias('c')
    ->field('c.id')
    ->join('talk_user u','u.user_id = c.uid')
    ->join('talk_admin.talk_ads a','a.relevanceId = c.id and a.type = 1 and a.dataFlag = 1 and a.positionType = 19','left')
    ->where($where)
    ->count();
    $data['list'] = $list;
    $data['count'] = $count;
    return $data;
  }
}
