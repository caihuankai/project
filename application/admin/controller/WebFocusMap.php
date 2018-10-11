<?php
namespace app\admin\controller;

use app\admin\model\Ads as M;

class WebFocusMap extends App{
	/**
     * 焦点图列表
     * 首页焦点图：positionType=1
     * 课程tab焦点图：positionType=7
     * @return [type] [description]
     */
    public function recommentList($positionType = 8){
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
    public function addRecomment($positionType = 8){
        if(request()->isPost()){
            $adsModel = new M();
            $param = input('post.');
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
                $data['adFile'] = $param['baseFile'];
                $data['adName'] = $param['adName'];
            	$data['relevanceType'] = $param['data_type'];
            	$getInsertInfo = $this->handleUrl($param['data_type'],$param['adURL']);
                $data['adURL'] = $getInsertInfo['url'];
                $data['relevanceId'] = $getInsertInfo['id'];
                
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
        return $this->fetch();
    }

    //编辑素材
    public function editRecomment(){
        $adsModel = new M();
        $id = (int)input('id');
        $data = $adsModel->where('adId',$id)->find();
        if(request()->isPost()){
            $param = input('post.');
            if(empty($param['adName'])){
                return $this->error('请填写名称');
            }
            if(empty($param['adURL'])){
                return $this->error('请填写链接');
            }
            if (empty($param['baseFile'])) {
                return $this->error('请选择图片');
            }
            if(empty($param['adSort'])){
                return $this->error('请填写排序');
            }
            if(empty($param['adStatus'])){
                return $this->error('请选择状态');
            }
            $getInsertInfo = $this->handleUrl($param['data_type'],$param['adURL']);
            $param['adURL'] = $getInsertInfo['url'];
            $param['relevanceId'] = $getInsertInfo['id'];
            $param['adFile'] = $param['baseFile'];
            $status = $adsModel->where('adId',$param['id'])->update([
                    'adName' => $param['adName'],
                    'adURL' => $param['adURL'],
                    'adSort' => $param['adSort'],
                    'adStatus' => $param['adStatus'],
                    'adFile' => $param['adFile'],
                    'relevanceId' => $param['relevanceId'],
                    'relevanceType' => $param['data_type'],
                    'updateTime' => date('Y-m-d H:i:s'),
                    'operatorId' => $_SESSION['adminSess']['admin']['id'],
                    'operatorName' => $_SESSION['adminSess']['admin']['username'],
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
    public function handleUrl($data_type,$type_id){
		switch ($data_type) {
			case 3:
				$data['id'] = $type_id;
				$data['url'] = config('WEB_DOMAIN').'/#/live/'.$type_id;
				break;
			case 4:
				$model = new \app\admin\model\Course();
				$courseInfo = $model->getCourseInfo($type_id, 'type,pid');
				$data['id'] = $type_id;
				if ($courseInfo['type'] == 3) {//特训班
					$data['url'] = config('WEB_DOMAIN').'/#/trainingPrevue/'.$type_id;
				}elseif ($courseInfo['type'] == 2 || $courseInfo['pid'] > 0) {//系列课
					$data['url'] = config('WEB_DOMAIN').'/#/seriesCourseDetail/'.$type_id;
				}else{//专题课
					$data['url'] = config('WEB_DOMAIN').'/#/specialCourseDetail/'.$type_id;
				}
				break;
			case 5:
				$data['id'] = $type_id;
				$data['url'] = config('WEB_DOMAIN').'/#/pointDetail/'.$type_id;
				break;
			case 6:
				$data['id'] = $type_id;
				$data['url'] = config('WEB_DOMAIN').'/#/teacherIntroduction/'.$type_id;;
				break;
			case 7:
				$data['id'] = $type_id;
				$data['url'] = $type_id;
				break;
			default:
				$data['id'] = '';
				$data['url'] = '';
				break;
		}
		return $data;
	}
}