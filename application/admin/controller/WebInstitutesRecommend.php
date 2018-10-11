<?php
namespace app\admin\controller;

use app\admin\model\Ads as M;
use app\admin\model\Course;
use app\admin\model\PayOrder;

class WebInstitutesRecommend extends App{
	/**
	 * 99学院首页-banner_controller
	 * positionType = 9
	 * @return [type] [description]
	 */
	public function homeBanner($positionType = 9){
		$adsModel = new M();
        if(request()->isPost()){
            $param = input('param.');
            $page = !isset($param['pageNumber']) ? 0 : $param['pageNumber'];
            $size = !isset($param['pageSize']) ? 0 : $param['pageSize'];
            $name = $param['name'];
            $adStatus = $param['adStatus'];
            $list = $adsModel->webDataList($page,$size,$name,$adStatus,$param['logmin'],$param['logmax'], $positionType,$param['relevanceType']);
            if(!empty($list)){
                foreach ($list as $k => $v) {
                	switch ($v['relevanceType']) {
						case 7:
							$v['target_type_name'] = '外链';
							break;
						case 4:
							$v['target_type_name'] = '专题课介绍页';
							break;
						case 9:
							$v['target_type_name'] = '系列课介绍页';
							break;
						case 10:
							$v['target_type_name'] = '特训班预告页';
							break;
						case 11:
							$v['target_type_name'] = '特训班详情页';
							break;
						case 12:
							$v['target_type_name'] = '特训班回顾页';
							break;
						case 6:
							$v['target_type_name'] = '讲师介绍页';
							break;
					}
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
            $data = ['rows' => $list, 'total' => $adsModel->webCount($name,$adStatus,$param['logmin'],$param['logmax'],$positionType,$param['relevanceType'])];
            return $this->sucJson($data);
        }
        $this->assign('positionType', $positionType);
        return $this->fetch();
	}
	/**
	 * 99学院首页-最新
	 * positionType = 10
	 * @return [type] [description]
	 */
	public function homeNews($positionType = 10){
		$adsModel = new M();
        if(request()->isPost()){
            $param = input('param.');
            $page = !isset($param['pageNumber']) ? 0 : $param['pageNumber'];
            $size = !isset($param['pageSize']) ? 0 : $param['pageSize'];
            $name = $param['name'];
            $adStatus = $param['adStatus'];
            $list = $adsModel->webDataList($page,$size,$name,$adStatus,$param['logmin'],$param['logmax'], $positionType,$param['relevanceType']);
            if(!empty($list)){
                foreach ($list as $k => $v) {
                	switch ($v['relevanceType']) {
						case 7:
							$v['target_type_name'] = '外链';
							break;
						case 4:
							$v['target_type_name'] = '专题课介绍页';
							break;
						case 9:
							$v['target_type_name'] = '系列课介绍页';
							break;
						case 10:
							$v['target_type_name'] = '特训班预告页';
							break;
						case 11:
							$v['target_type_name'] = '特训班详情页';
							break;
						case 12:
							$v['target_type_name'] = '特训班回顾页';
							break;
						case 6:
							$v['target_type_name'] = '讲师介绍页';
							break;
					}
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
            $data = ['rows' => $list, 'total' => $adsModel->webCount($name,$adStatus,$param['logmin'],$param['logmax'],$positionType,$param['relevanceType'])];
            return $this->sucJson($data);
        }
        $this->assign('positionType', $positionType);
        return $this->fetch();
	}
    /**
     * 本周热销
     * positionType = 13 or 11
     * @return [type] [description]
     */
    public function positionType13($positionType = 13){
        $adsModel = new M();
        if(request()->isPost()){
            $param = input('param.');
            $page = !isset($param['pageNumber']) ? 0 : $param['pageNumber'];
            $size = !isset($param['pageSize']) ? 0 : $param['pageSize'];
            $name = $param['name'];
            $adStatus = $param['adStatus'];
            $list = $adsModel->dataList($page,$size,$name,$adStatus,$param['logmin'],$param['logmax'], $positionType,$param['relevanceType']);
            if(!empty($list)){
                foreach ($list as $k => $v) {
                    switch ($v['relevanceType']) {
                        case 7:
                            $v['target_type_name'] = '外链';
                            break;
                        case 4:
                            $v['target_type_name'] = '专题课介绍页';
                            break;
                        case 9:
                            $v['target_type_name'] = '系列课介绍页';
                            break;
                        case 10:
                            $v['target_type_name'] = '特训班预告页';
                            break;
                        case 11:
                            $v['target_type_name'] = '特训班详情页';
                            break;
                        case 12:
                            $v['target_type_name'] = '特训班回顾页';
                            break;
                        case 6:
                            $v['target_type_name'] = '讲师介绍页';
                            break;
                    }
                    $v['remark'] = '<img src="'.$v['remark'].'" style="width: 60px;">';
                    $v['operate'] = '<a href="javascript:recomment_edit('.$v['adId'].');">上传PC图片</a>';
                    if($v['adStatus'] == 1){
                        $v['adStatusInfo'] = '正常';
                    }else{
                        $v['adStatusInfo'] = '已停用';
                    }
                    //点击量
                    $v['clickNum'] = $adsModel->clickNumCount($v['adClickNum'],$v['relevanceType'],$v['relevanceId']);
                    
                }
            }
            $data = ['rows' => $list, 'total' => $adsModel->countAds($name,$adStatus,$param['logmin'],$param['logmax'],$positionType,$param['relevanceType'])];
            return $this->sucJson($data);
        }
        $this->assign('positionType', $positionType);
        return $this->fetch();
    }
    /**
     * 
     * @param  integer $positionType [description]
     * @return [type]                [description]
     */
    public function positionType11($positionType = 11){
        $adsModel = new M();
        if(request()->isPost()){
            $param = input('param.');
            $page = !isset($param['pageNumber']) ? 0 : $param['pageNumber'];
            $size = !isset($param['pageSize']) ? 0 : $param['pageSize'];
            $name = $param['name'];
            $adStatus = $param['adStatus'];
            $list = $adsModel->webDataList($page,$size,$name,$adStatus,$param['logmin'],$param['logmax'], $positionType,$param['relevanceType']);
            if(!empty($list)){
                foreach ($list as $k => $v) {
                    switch ($v['relevanceType']) {
                        case 7:
                            $v['target_type_name'] = '外链';
                            break;
                        case 4:
                            $v['target_type_name'] = '专题课介绍页';
                            break;
                        case 9:
                            $v['target_type_name'] = '系列课介绍页';
                            break;
                        case 10:
                            $v['target_type_name'] = '特训班预告页';
                            break;
                        case 11:
                            $v['target_type_name'] = '特训班详情页';
                            break;
                        case 12:
                            $v['target_type_name'] = '特训班回顾页';
                            break;
                        case 6:
                            $v['target_type_name'] = '讲师介绍页';
                            break;
                        case 13:
                            $v['target_type_name'] = '视频';
                            break;
                    }
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
            $data = ['rows' => $list, 'total' => $adsModel->webCount($name,$adStatus,$param['logmin'],$param['logmax'],$positionType,$param['relevanceType'])];
            return $this->sucJson($data);
        }
        $this->assign('positionType', $positionType);
        return $this->fetch();
    }
    /**
     * 系列课列表-精品/基础/高级
     * @param  integer $positionType = 19
     * @return [type]                [description]
     */
    public function seriesColumn($positionType = 19){
        $adsModel = new M();
        if(request()->isPost()){
            $param = input('param.');
            $page = !isset($param['pageNumber']) ? 0 : $param['pageNumber'];
            $size = !isset($param['pageSize']) ? 0 : $param['pageSize'];
            $name = $param['name'];
            $adStatus = $param['adStatus'];
            $list = $adsModel->webDataList($page,$size,$name,$adStatus,$param['logmin'],$param['logmax'], $positionType,$param['relevanceType'],$param['remark']);
            if(!empty($list)){
                foreach ($list as $k => $v) {
                    switch ($v['relevanceType']) {
                        case 7:
                            $v['target_type_name'] = '外链';
                            break;
                        case 4:
                            $v['target_type_name'] = '专题课介绍页';
                            break;
                        case 9:
                            $v['target_type_name'] = '系列课介绍页';
                            break;
                        case 10:
                            $v['target_type_name'] = '特训班预告页';
                            break;
                        case 11:
                            $v['target_type_name'] = '特训班详情页';
                            break;
                        case 12:
                            $v['target_type_name'] = '特训班回顾页';
                            break;
                    }
                    switch ($v['remark']) {
                        case '1':
                            $v['remark_name'] = '精品课';
                            break;
                        case '2':
                            $v['remark_name'] = '基础课';
                            break;
                        case '3':
                            $v['remark_name'] = '高级课';
                            break;
                        
                        default:
                            $v['remark_name'] = '';
                            break;
                    }
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
            $data = ['rows' => $list, 'total' => $adsModel->webCount($name,$adStatus,$param['logmin'],$param['logmax'],$positionType,$param['relevanceType'])];
            return $this->sucJson($data);
        }
        $this->assign('positionType', $positionType);
        return $this->fetch();
    }
	//新增素材
    public function addRecomment($positionType){
        if(request()->isPost()){
            $adsModel = new M();
            $param = input('post.');
            if($positionType == 22){
            	$param['relevanceType'] = 12;
            	$param['adURL'] = 0;
            }
            //系列课列表-精品/基础/高级需要检测remark字段
            if($positionType == 19 && $param['remark'] == 0){
            	return $this->error('请选择栏目');
            }
            if($positionType == 19 && $param['remark'] != 0){
            	$data['remark'] = $param['remark'];
            }
            if(empty($param['baseFile'])){
                return $this->error('请选择图片');
            }
            elseif(empty($param['adName'])){
                return $this->error('请填写名称');
            }
            elseif(empty($param['adURL']) && $positionType != 22){
                return $this->error('请填写链接');
            }
            elseif(empty($param['adSort'])){
                return $this->error('请填写排序');
            }
            elseif(empty($param['adStatus'])){
                return $this->error('请选择状态');
            }else{
            	$data['type'] = 2;
                $data['adFile'] = $param['baseFile'];
                $data['adName'] = $param['adName'];
            	$data['relevanceType'] = $param['relevanceType'];
            	$getInsertInfo = $this->handleUrl($param['relevanceType'],$param['adURL']);
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
                
                //官网讲师介绍页-教学课程 需要额外保存用户id，根据课程id查找
                if ($positionType == 25) {
                	$courseModel = new Course();
                	$courseInfo = $courseModel->getCourseColumn([$getInsertInfo['id']], 'uid');
                	if (empty($courseInfo)) {
                		return $this->error('请输入正确的课程ID');
                	}else {
                		$data['remark'] = json_encode(['userId'=>$courseInfo[$getInsertInfo['id']]]);
                	}
                }
                
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
        $this->assign('positionType', $positionType);
        return $this->fetch();
    }

    //编辑素材
    public function editRecomment($positionType=0){
        $adsModel = new M();
        $id = (int)input('id');
        $data = $adsModel->where('adId',$id)->find();
        if(request()->isPost()){
            $param = input('post.');
            if($param['positionType'] == 22){
            	$param['relevanceType'] = 12;
            	$param['adURL'] = 0;
            }
            //系列课列表-精品/基础/高级需要检测remark字段
            if($param['positionType'] == 19 && $param['remark'] == 0){
            	return $this->error('请选择栏目');
            }
            if($param['positionType'] == 19 && $param['remark'] != 0){
            	$updateData['remark'] = $param['remark'];
            }
            if(empty($param['adName'])){
                return $this->error('请填写名称');
            }
            if(empty($param['adURL']) && $param['positionType'] != 22){
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
            $getInsertInfo = $this->handleUrl($param['relevanceType'],$param['adURL']);
            $param['adURL'] = $getInsertInfo['url'];
            $param['relevanceId'] = $getInsertInfo['id'];
            $param['adFile'] = $param['baseFile'];
            //需要更新数据
            $updateData['adName'] = $param['adName'];
            $updateData['adURL'] = $param['adURL'];
            $updateData['adSort'] = $param['adSort'];
            $updateData['adStatus'] = $param['adStatus'];
            $updateData['adFile'] = $param['adFile'];
            $updateData['relevanceId'] = $param['relevanceId'];
            $updateData['relevanceType'] = $param['relevanceType'];
            $updateData['updateTime'] = date('Y-m-d H:i:s');
            $updateData['operatorId'] = $_SESSION['adminSess']['admin']['id'];
            $updateData['operatorName'] = $_SESSION['adminSess']['admin']['username'];
            
            //官网讲师介绍页-教学课程 需要额外保存用户id，根据课程id查找
            if ($positionType == 25) {
            	$courseModel = new Course();
            	$courseInfo = $courseModel->getCourseColumn([$getInsertInfo['id']], 'uid');
            	if (empty($courseInfo)) {
            		return $this->error('请输入正确的课程ID');
            	}else {
            		$updateData['remark'] = json_encode(['userId'=>$courseInfo[$getInsertInfo['id']]]);
            	}
            }
            
            $status = $adsModel->where('adId',$param['id'])->update($updateData);
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
        $this->assign('positionType', $positionType);
        $this->assign('data',$data);
        return $this->fetch();
    }
    /**
     * 编辑本周热销
     * @param  integer $positionType [description]
     * @return [type]                [description]
     */
    public function editPositionType13($positionType=0){
        $adsModel = new M();
        $id = (int)input('id');
        $data = $adsModel->where('adId',$id)->find();
        if(request()->isPost()){
            $param = input('post.');
            if (empty($param['baseFile'])) {
                return $this->error('请选择图片');
            }
            //需要更新数据
            $updateData['remark'] = $param['baseFile'];
            $updateData['updateTime'] = date('Y-m-d H:i:s');
            $updateData['operatorId'] = $_SESSION['adminSess']['admin']['id'];
            $updateData['operatorName'] = $_SESSION['adminSess']['admin']['username'];
            $status = $adsModel->where('adId',$param['id'])->update($updateData);
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
    /**
     * 新增五分钟解盘
     * @param [type] $positionType [description]
     */
    public function addPositionType11($positionType=11){
        if(request()->isPost()){
            $adsModel = new M();
            $param = input('post.');
            if(empty($param['baseFile'])){
                return $this->error('请选择图片');
            }
            elseif(empty($param['adName'])){
                return $this->error('请填写名称');
            }
            elseif(empty($param['adSort'])){
                return $this->error('请填写排序');
            }
            elseif(empty($param['adStatus'])){
                return $this->error('请选择状态');
            }elseif(empty($param['videoUrl'])){
                return $this->error('请上传视频');
            }else{
                $data['type'] = 2;
                $data['remark'] = $param['videoUrl'];
                $data['adURL'] = $param['videoUrl'];
                $data['adFile'] = $param['baseFile'];
                $data['adName'] = $param['adName'];
                $data['relevanceType'] = $param['relevanceType'];
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
        $this->assign('positionType', $positionType);
        return $this->fetch();
    }
    //编辑五分钟解盘
    public function ediePositionType11($positionType=11){
        $adsModel = new M();
        $id = (int)input('id');
        $data = $adsModel->where('adId',$id)->find();
        if(request()->isPost()){
            $param = input('post.');
            if(empty($param['baseFile'])){
                return $this->error('请选择图片');
            }
            elseif(empty($param['adName'])){
                return $this->error('请填写名称');
            }
            elseif(empty($param['adSort'])){
                return $this->error('请填写排序');
            }
            elseif(empty($param['adStatus'])){
                return $this->error('请选择状态');
            }elseif(empty($param['videoUrl'])){
                return $this->error('请上传视频');
            }else{
                $updateData['remark'] = $param['videoUrl'];
                $updateData['adURL'] = $param['videoUrl'];
                $updateData['adFile'] = $param['baseFile'];
                $updateData['adName'] = $param['adName'];
                $updateData['adSort'] = $param['adSort'];
                $updateData['adStartDate'] = date('Y-m-d');
                $updateData['adEndDate'] =date('Y-m-d H:i:s');
                $updateData['createTime'] =date('Y-m-d H:i:s');
                $updateData['positionType'] = $positionType;
                $updateData['operatorId'] = $_SESSION['adminSess']['admin']['id'];
                $updateData['operatorName'] = $_SESSION['adminSess']['admin']['username'];
                $updateData['adStatus'] = $param['adStatus'];
                $status = $adsModel->where('adId',$param['id'])->update($updateData);
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
            $getInsertInfo = $this->handleUrl($param['relevanceType'],$param['adURL']);
            $param['adURL'] = $getInsertInfo['url'];
            $param['relevanceId'] = $getInsertInfo['id'];
            $param['adFile'] = $param['baseFile'];
            //需要更新数据
            $updateData['adName'] = $param['adName'];
            $updateData['adURL'] = $param['adURL'];
            $updateData['adSort'] = $param['adSort'];
            $updateData['adStatus'] = $param['adStatus'];
            $updateData['adFile'] = $param['adFile'];
            $updateData['relevanceId'] = $param['relevanceId'];
            $updateData['relevanceType'] = $param['relevanceType'];
            $updateData['updateTime'] = date('Y-m-d H:i:s');
            $updateData['operatorId'] = $_SESSION['adminSess']['admin']['id'];
            $updateData['operatorName'] = $_SESSION['adminSess']['admin']['username'];
            $status = $adsModel->where('adId',$param['id'])->update($updateData);
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
        $this->assign('positionType', $positionType);
        $this->assign('data',$data);
        return $this->fetch();
    }
    /**
     * 系列课--精品/基础/高级添加列表
     */
    public function addSeriesColumn(){
        $adsModel = new M();
        $PayOrderM = new PayOrder();
        if(request()->isPost()){
            $param = input('post.');
            $page = !isset($param['pageNumber']) ? 1 : $param['pageNumber'];
            $size = !isset($param['pageSize']) ? 10 : $param['pageSize'];
            $data = $adsModel->getAddSeriseColumnList($page,$size);
            foreach ($data['list'] as $k => $v) {
                if($v['level'] == 2){
                    $v['level_name'] = '付费';
                }else{
                    $v['level_name'] = '免费';
                }
                switch ($v['remark']) {
                    case 0:
                        $v['remark_name'] = '无';
                        break;
                    case 1:
                        $v['remark_name'] = '精品课';
                        break;
                    case 2:
                        $v['remark_name'] = '基础课';
                        break;
                    case 3:
                        $v['remark_name'] = '高级课';
                        break;
                    
                    default:
                        $v['remark_name'] = '无';
                        break;
                }
                if(empty($v['remark'])){
                    $v['operate'] = '<a href="javascript:recomment_edit('.$v['id'].');">推荐</a>';
                }else{
                    $v['operate'] = '<p>已推荐</p>';
                }
                $v['bugNum'] = $PayOrderM->field('id')->where('state',1)->where('class_id',$v['id'])->where('type',1)->count();
                $v['num'] = $v['bugNum'] .'/'.$v['study_num'];
            }
            $dataList = ['rows' => $data['list'], 'total' => $data['count']];
            return $this->sucJson($dataList);
        }
        return $this->fetch();
    }
    /**
     * 系列课--精品/基础/高级添加推荐
     * @return [type] [description]
     */
    public function editSeriesColumn(){
        $adsModel = new M();
        $CourseM = new Course();
        $id = (int)input('id');
        if(request()->isPost()){
            $param = input('post.');
            if($param['remark'] == 0){
                return $this->error('请选择栏目');
            }
            elseif(empty($param['adSort'])){
                return $this->error('请填写排序');
            }else{
                $courseinfo =  $CourseM->where('id',$param['id'])->find();
                if(empty($courseinfo)){
                    return $this->error('课程不存在');
                }
                $data['type'] = 2;
                $data['adFile'] = $courseinfo['src_img'];
                $data['adName'] = $courseinfo['class_name'];
                $data['relevanceType'] = 9;
                $getInsertInfo = $this->handleUrl(9,$param['id']);
                $data['adURL'] = $getInsertInfo['url'];
                $data['relevanceId'] = $getInsertInfo['id'];
                $data['remark'] = $param['remark'];
                $data['adSort'] = $param['adSort'];
                $data['adStartDate'] = date('Y-m-d');
                $data['adEndDate'] =date('Y-m-d H:i:s');
                $data['createTime'] =date('Y-m-d H:i:s');
                $data['adClickNum'] = 0;
                $data['positionType'] = 19;
                $data['dataFlag'] = 1;
                $data['operatorId'] = $_SESSION['adminSess']['admin']['id'];
                $data['operatorName'] = $_SESSION['adminSess']['admin']['username'];
                $data['adStatus'] = 1;
                $status = $adsModel->insert($data);
                if($status > 0){
                    $rtd['status'] = 1;
                    $rtd['msg'] = "推荐成功";
                    return $rtd;
                }else{
                    $rtd['status'] = -1;
                    $rtd['msg'] = "推荐失败";
                    return $rtd;
                }
            }

        }
        $this->assign('id',$id);
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
			case 7:
				$data['id'] = $type_id;
				$data['url'] = $type_id;
				break;
			case 4:
				$data['id'] = $type_id;
				$data['url'] = config('WEB_DOMAIN').'/#/specialCourseDetail/'.$type_id;
				break;
			case 9:
				$data['id'] = $type_id;
				$data['url'] = config('WEB_DOMAIN').'/#/seriesCourseDetail/'.$type_id;
				break;
			case 10:
				$data['id'] = $type_id;
				$data['url'] = config('WEB_DOMAIN').'/#/trainingPrevue/'.$type_id;
				break;
			case 11:
				$data['id'] = $type_id;
				$data['url'] = config('WEB_DOMAIN').'/#/course/specialOnlive/'.$type_id;
				break;
			case 12:
				$data['id'] = $type_id;
				$data['url'] = config('WEB_DOMAIN').'/#/review/'.$type_id;
				break;
			case 6:
				$data['id'] = $type_id;
				$data['url'] = config('WEB_DOMAIN').'/#/teacherIntroduction/'.$type_id;;
				break;
			default:
				$data['id'] = '';
				$data['url'] = '';
				break;
		}
		return $data;
	}
	//查询课程原价 优惠价
	public function queryPrice($id=0){
		$courseM = new Course();
		$price['original_price'] = '免费';
		$price['concessional_rate'] = '免费';
		$data = $courseM->where('id',$id)->where('level',2)->find();
		if(!empty($data)){
			$price['original_price'] = $data['origin_price'];
			$price['concessional_rate'] = $data['price'];
		}
		return $this->sucJson($price);
	}
}