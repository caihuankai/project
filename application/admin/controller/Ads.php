<?php
namespace app\admin\controller;

use app\admin\model\Ads as M;
use think\Request;
use think\Session;
use think\Db;
use think\controller\Rest;
use app\common\controller\JsonResult;
use Qiniu\Auth;
use Qiniu\Storage\BucketManager;
use Qiniu\Storage\UploadManager;

class Ads extends App{
//class Ads extends Rest{

    public function index(){
		$list = $this->pageQuery();
		$this->assign('list', $list);
		$this->assign('count',count($list));
		
    	return $this->fetch("list");
    }
    /**
     * 获取分页
     */
    public function pageQuery(){
        $m = new M();
        return $m->pageQuery();
    }
    /**
     * 跳去编辑页面
     */
    public function toEdit(){
        $m = new M();
        $data = $m->getById(Input("id/d",0));
        return $this->fetch("edit",['data'=>$data]);
    }
	
	/**
     * 跳去新增页面
     */
    public function toAdd(){
        return $this->fetch("add");
    }
    /*
    * 获取数据
    */
    public function get(){
        $m = new M();
        return $m->getById(Input("id/d",0));
    }
    /**
     * 新增
     */
    public function add(){
        $m = new M();
		$rs = $m->add();
		if($rs==1){
			$this->success('新增成功', 'admin/Ads/index');
		}else{
			$this->error('新增失败');
		}
    }
    /**
    * 修改
    */
    public function edit(){
        $m = new M();
		$rs = $m->edit();
		if($rs==1){
			$this->success('编辑成功', 'admin/Ads/index');
		}else{
			$this->error('编辑失败');
		}
    }
    /**
     * 删除
     */
    public function del(){
        $m = new M();
		$rs = $m->del();
		if($rs==1){
			$this->success('删除成功', 'admin/Ads/index');
		}else{
			$this->error('删除失败');
		}
    }
	
	/**
     * 删除
     */
    public function deleteBatch(){
        $m = new M();
		$rs = $m->deleteBatch();
		if($rs==1){
			return "删除成功";
			//$this->success('删除成功', 'admin/Ads/index');
		}else{
			return "删除失败";
			//$this->error('删除失败');
		}
    }
	
	/**
     * 停用
     */
    public function adStop(){
        $m = new M();
		$rs = $m->adStop();
		if($rs==1){
			$this->success('停用成功', 'admin/Ads/index');
		}else{
			$this->error('停用失败');
		}
    }
	
	/**
     * 起用
     */
    public function adStart(){
        $m = new M();
		$rs = $m->adStart();
		if($rs==1){
			$this->success('启用成功', 'admin/Ads/index');
		}else{
			$this->error('启用失败');
		}
    }
	
    /**
    * 修改排序
    */
    public function changeSort(){
        $m = new M();
        return $m->changeSort();
    }

    /**
     * [saveToAds description]
     * @param  [type] $type 类型：3：首页焦点-Live直播；4：首页焦点-课程；5：首页焦点-观点；6：首页焦点-用户；7：公众号文章；8：活动方案
     * @param  [type] $id   类型对应id
     * @param  [type] $sort 排序
     * @return [type]       [description]
     */
    public function saveToAds($type=1,$id=1,$sort=2){
        $type = (int)$type;
        $id = (int)$id;
        $sort = (int)$sort;
        if(empty($type) || empty($id) || empty($sort)){
            return $this->errorJson(JsonResult::ERR_PARAMETER);
        }
        $AdsModel = new M();
        return $AdsModel->insertInfo($type,$id,$sort);
    }

    /**
     * 焦点图列表
     * 首页焦点图：positionType=1
     * 课程tab焦点图：positionType=7
     * @return [type] [description]
     */
    public function recommentList($positionType = 1){
        $adsModel = new M();
        if(request()->isPost()){
            $param = input('param.');
            $page = !isset($param['pageNumber']) ? 0 : $param['pageNumber'];
            $size = !isset($param['pageSize']) ? 0 : $param['pageSize'];
            $name = $param['name'];
            $adStatus = $param['adStatus'];
            $list = $adsModel->dataList($page,$size,$name,$adStatus,$param['logmin'],$param['logmax'], $positionType);
            if(!empty($list)){
                foreach ($list as $k => $v) {
                    $v['adFile'] = '<img src="'.$v['adFile'].'" style="width: 60px;">';
                    $v['operate'] = '<a href="javascript:recomment_edit('.$v['adId'].');">编辑</a>';
                    $v['operate'] .= ' | <a href="javascript:recomment_del('.$v['adId'].');">移除</a>';
                    if($v['adStatus'] == 1){
                        $v['operate'] .= ' | <a href="javascript:recomment_stop('.$v['adId'].');">停用</a>';
                        $v['adStatusInfo'] = '正常';
                    }else{
                        $v['operate'] .= ' | <a href="javascript:recomment_start('.$v['adId'].');">启用</a>';
                        $v['adStatusInfo'] = '已停用';
                    }
                    //点击量
                    $v['clickNum'] = $adsModel->clickNumCount($v['adClickNum'],$v['relevanceType'],$v['relevanceId']);
                    
                }
            }
            $data = ['rows' => $list, 'total' => $adsModel->countAds($name,$adStatus,$param['logmin'],$param['logmax'],$positionType)];
            return $this->sucJson($data);
        }
        $this->assign('positionType', $positionType);
        return $this->fetch();
    }
    //新增素材
    public function addRecomment($positionType = 1){
        if(request()->isPost()){
            $adsModel = new M();
            // $file = input('post.baseFile');
            // $img = mb_substr($file,strpos($file,'base64,')+7);
            // $imgs = str_replace('+','-',$img);
            // $imgs = str_replace('/','_',$img);
            // $imgs = $this->uploadImg($file);
            // $imgs = json_decode($imgs,true);
            // $imgs['key'];
            $adsModel = new M();
            $param = input('post.');
            //banner类型需要上传APP图片
            if(in_array($positionType,[1])){
                if(empty($param['appBaseFile'])){
                    return $this->error('请选择APP图片');
                }
                $data['remark'] = $param['appBaseFile'];
            }
            // $file = request()->file('file');
            if(empty($param['baseFile'])){
                return $this->error('请选择图片');
            }
            elseif(empty($param['adName'])){
                return $this->error('请填写名称');
            }
            elseif(empty($param['adURL'])){
                return $this->error('请填写链接');
            }
            elseif(empty($param['adSort'])){
                return $this->error('请填写排序');
            }
            elseif(empty($param['adStatus'])){
                return $this->error('请选择状态');
            }else{
                // $imageUrl = $adsModel->uploadPicture();
                $imgs = $this->uploadImg($param['baseFile']);
                $imgs = json_decode($imgs,true);
                $imgs['key'];
                if(empty($imgs['key'])){
                    return $this->error('图片上传失败');
                }else{
                    $data['adFile'] = "http://oqt46pvmm.bkt.clouddn.com/".$imgs['key'];;
                    $data['adName'] = $param['adName'];
                    $data['relevanceType'] = $param['data_type'];
                    if($param['data_type'] == 7){
                        $data['adURL'] = $param['adURL'];
                    }else{
                        $getInsertInfo = $adsModel->getInsertInfo($param['data_type'],$param['adURL']);
                        $data['adURL'] = $getInsertInfo['url'];
                        $data['relevanceId'] = $param['adURL'];
                        if($param['data_type'] == 4){
                            if($getInsertInfo['type'] == 1){
                                $data['relevanceType'] = 4;
                            }else{
                                $data['relevanceType'] = 9;
                            }
                        }
                        if($param['data_type'] == 3){
                          $data['relevanceId'] = $getInsertInfo['user_id'];
                        }
                    }
                    
                    $data['adSort'] = $param['adSort'];
                    $data['adStartDate'] = date('Y-m-d');
                    $data['adEndDate'] =date('Y-m-d H:i:s');
                    $data['createTime'] =date('Y-m-d H:i:s');
                    $data['adClickNum'] = 0;
                    $data['positionType'] = $positionType;
                    $data['dataFlag'] = 1;
                    $data['operatorId'] = $_SESSION['adminSess']['admin']['id'];
                    $data['operatorName'] = $_SESSION['adminSess']['admin']['username'];
                    $data['adStatus'] = $param['adStatus'];
                    $status = $adsModel->insert($data);
                    if($status > 0){
                        $rtd['status'] = 1;
                        $rtd['msg'] = "新增成功";
                        return $rtd;
                    }else{
                        $rtd['status'] = -1;
                        $rtd['msg'] = "新增失败";
                        return $rtd;
                    }
                }
            }
        }
        $this->assign('positionType', $positionType);
        return $this->fetch();
    }

    //编辑素材
    public function editRecomment($positionType=1){
        $adsModel = new M();
        $id = (int)input('id');
        $data = $adsModel->where('adId',$id)->find();
        if(request()->isPost()){
            $param = input('post.');
            //banner类型需要上传APP图片
            $remark = '';
            if(in_array($param['positionType'],[1])){
                if(empty($param['appBaseFile'])){
                    return $this->error('请选择APP图片');
                }
                $remark = $param['appBaseFile'];
            }
            // $file = request()->file('file');
            if(empty($param['adName'])){
                return $this->error('请填写名称');
            }
            if(empty($param['adURL'])){
                return $this->error('请填写链接');
            }
            if (empty($param['baseFile']) && empty($param['adFile'])) {
                return $this->error('请选择图片');
            }
            if(empty($param['adSort'])){
                return $this->error('请填写排序');
            }
            if(empty($param['adStatus'])){
                return $this->error('请选择状态');
            }
            if(!empty($param['baseFile'])){
                $imgs = $this->uploadImg($param['baseFile']);
                $imgs = json_decode($imgs,true);
                $imgs['key'];
                if(empty($imgs['key'])){
                    return $this->error('图片上传失败');
                }
                
                $param['adFile'] = "http://oqt46pvmm.bkt.clouddn.com/".$imgs['key'];
                $status = $adsModel->where('adId',$param['id'])->update([
                        'adName' => $param['adName'],
                        'adURL' => $param['adURL'],
                        'adSort' => $param['adSort'],
                        'adStatus' => $param['adStatus'],
                        'adFile' => $param['adFile'],
                        'updateTime' => date('Y-m-d H:i:s'),
                        'operatorId' => $_SESSION['adminSess']['admin']['id'],
                        'operatorName' => $_SESSION['adminSess']['admin']['username'],
                        'remark' => $remark,
                    ]);
                if($status){
                    $rtd['status'] = 1;
                    $rtd['msg'] = "编辑成功";
                    return $rtd;
                }else{
                    $rtd['status'] = -1;
                    $rtd['msg'] = "编辑失败";
                    return $rtd;
                }
                
            }else{
                $status = $adsModel->where('adId',$param['id'])->update([
                        'adName' => $param['adName'],
                        'adURL' => $param['adURL'],
                        'adSort' => $param['adSort'],
                        'adStatus' => $param['adStatus'],
                        'updateTime' => date('Y-m-d H:i:s'),
                        'operatorId' => $_SESSION['adminSess']['admin']['id'],
                        'operatorName' => $_SESSION['adminSess']['admin']['username'],
                        'remark' => $remark,
                    ]);
                if($status){
                    $rtd['status'] = 1;
                    $rtd['msg'] = "编辑成功";
                    return $rtd;
                }else{
                    $rtd['status'] = -1;
                    $rtd['msg'] = "编辑失败";
                    return $rtd;
                }
            }
        }
        $this->assign('positionType', $positionType);
        $this->assign('data',$data);
        return $this->fetch();
    }

    //删除单条数据
    public function recomment_del($id){
        $id = (int)$id;
        $AdsModel = new M();
        $status = $AdsModel->where('adId',$id)->update([
            'dataFlag' => 0,
            'updateTime' => date('Y-m-d H:i:s'),
            'operatorId' => $_SESSION['adminSess']['admin']['id'],
            'operatorName' => $_SESSION['adminSess']['admin']['username'],
        ]);
        if($status){
            $rtd['status'] = 1;
            $rtd['msg'] = "删除成功";
            return $rtd;
        }else{
            $rtd['status'] = -1;
            $rtd['msg'] = "删除失败";
            return $rtd;
        }
    }

    //停用单条数据
    public function recomment_stop($id){
        $id = (int)$id;
        $AdsModel = new M();
        $status = $AdsModel->where('adId',$id)->update([
            'adStatus' => -1,
            'updateTime' => date('Y-m-d H:i:s'),
            'operatorId' => $_SESSION['adminSess']['admin']['id'],
            'operatorName' => $_SESSION['adminSess']['admin']['username'],
        ]);
        if($status){
            $rtd['status'] = 1;
            $rtd['msg'] = "停用成功";
            return $rtd;
        }else{
            $rtd['status'] = -1;
            $rtd['msg'] = "停用失败";
            return $rtd;
        }
    }

    //启用单条数据
    public function recomment_start($id){
        $id = (int)$id;
        $AdsModel = new M();
        $dataInfo = $AdsModel->where('adId',$id)->find();
        if(empty($dataInfo['adFile'])){
            $rtd['status'] = -1;
            $rtd['msg'] = "未上传缩略图";
            return $rtd;
        }
        if(empty($dataInfo['adFile']) || empty($dataInfo['adName']) || empty($dataInfo['adURL']) || empty($dataInfo['adSort'])){
            $rtd['status'] = -1;
            $rtd['msg'] = "启用失败";
            return $rtd;
        }
        $status = $AdsModel->where('adId',$id)->update([
            'adStatus' => 1,
            'updateTime' => date('Y-m-d H:i:s'),
            'operatorId' => $_SESSION['adminSess']['admin']['id'],
            'operatorName' => $_SESSION['adminSess']['admin']['username'],
        ]);
        if($status){
            $rtd['status'] = 1;
            $rtd['msg'] = "启用成功";
            return $rtd;
        }else{
            $rtd['status'] = -1;
            $rtd['msg'] = "启用失败";
            return $rtd;
        }
    }

    //批量删除推荐
    public function del_array(){
        $ids = input('param.id');
        $AdsModel = new M();
        $status = $AdsModel->where('adId','in',$ids)->update([
            'dataFlag' => 0,
            'updateTime' => date('Y-m-d H:i:s'),
            'operatorId' => $_SESSION['adminSess']['admin']['id'],
            'operatorName' => $_SESSION['adminSess']['admin']['username'],
        ]);
        if($status){
            $rtd['status'] = 1;
            $rtd['msg'] = "删除成功";
            return $rtd;
        }else{
            $rtd['status'] = -1;
            $rtd['msg'] = "删除失败";
            return $rtd;
        }
    }

    //批量停用推荐
    public function recomment_stop_array(){
        $ids = input('param.id');
        $AdsModel = new M();
        $status = $AdsModel->where('adId','in',$ids)->update([
            'adStatus' => -1,
            'updateTime' => date('Y-m-d H:i:s'),
            'operatorId' => $_SESSION['adminSess']['admin']['id'],
            'operatorName' => $_SESSION['adminSess']['admin']['username'],
        ]);
        if($status){
            $rtd['status'] = 1;
            $rtd['msg'] = "停用成功";
            return $rtd;
        }else{
            $rtd['status'] = -1;
            $rtd['msg'] = "停用失败";
            return $rtd;
        }
    }

    //批量启用推荐
    public function recomment_start_array(){
        $ids = input('param.id');
        $AdsModel = new M();
        $dataInfo = $AdsModel->where('adId','in',$ids)->select();
        foreach ($dataInfo as $k => $v) {
            if(empty($v['adFile']) || empty($v['adName']) || empty($v['adURL']) || empty($v['adSort'])){
                $rtd['status'] = -1;
                $rtd['msg'] = "启用失败";
                return $rtd;
            }
        }
        $status = $AdsModel->where('adId','in',$ids)->update([
            'adStatus' => 1,
            'updateTime' => date('Y-m-d H:i:s'),
            'operatorId' => $_SESSION['adminSess']['admin']['id'],
            'operatorName' => $_SESSION['adminSess']['admin']['username'],
        ]);
        if($status){
            $rtd['status'] = 1;
            $rtd['msg'] = "启用成功";
            return $rtd;
        }else{
            $rtd['status'] = -1;
            $rtd['msg'] = "启用失败";
            return $rtd;
        }
    }

    public function uploadImg($imgbase){
        $img = mb_substr($imgbase,strpos($imgbase,'base64,')+7);
        // 获取七牛的token       

        // 构建鉴权对象
        $auth = \Qiniu::instance()->getAuth();
        
        // 要上传的空间
        //$bucket = config('BUCKET');
        $bucket = \Qiniu::instance()->getBucket();
        //$bucket = 'qianliao';
        // 生成上传 Token
        $upToken = $auth->uploadToken($bucket);
        $imggg = $this->request_by_curl(\Qiniu::instance()->getPutB64Url(), $img, $upToken);
        return $imggg;die;
        $imgs = json_decode(trim($imggg),true);
        
        // 要上传文件的本地路径
        //$ext = pathinfo($imgs->getInfo('name'), PATHINFO_EXTENSION);  //后缀
        
        if (isset($imgs['error'])){ // 报错
            return WReturn($imgs['error'], -1);
        }
        
        $imgss = $imgs['hash'];
        
        $imgUrl = \Qiniu::instance()->handleQiNiuResultUrl($imgss).'?imageslim';
        return $imgss;
    }

    public function request_by_curl($remote_server,$post_string,$upToken) {
      $headers = array();
      $headers[] = 'Content-Type:image/png';
      $headers[] = 'Authorization:UpToken '.$upToken;
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$remote_server);
      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_HTTPHEADER ,$headers);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
      curl_setopt($ch, CURLOPT_TIMEOUT, 30);
      $data = curl_exec($ch);
      curl_close($ch);

      return $data;
    }
}
