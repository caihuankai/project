<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/9/27
 * Time: 14:28
 */

namespace app\admin\controller;


class Slideshow extends App
{
    protected $path = "http://oqt46pvmm.bkt.clouddn.com/";
    //轮播图首页
    public function index()
    {
        $adsModel = new \app\admin\model\Ads();
        $positionType = input('type');
        if(request()->isPost()){
            $param = input('param.');
            $positionType = input('positionType');
            $page = !isset($param['pageNumber']) ? 0 : $param['pageNumber'];
            $size = !isset($param['pageSize']) ? 0 : $param['pageSize'];
            $name = $param['name'];
            $adStatus = $param['adStatus'];
            $list = $adsModel->fetchDataList($page,$size,$name,$adStatus,$param['logmin'],$param['logmax'], $positionType,$param['relevanceType']);
            if(!empty($list)){
                foreach ($list as $k => $v) {
                    switch ($v['relevanceType']) {
                        case 14:
                            $v['target_type_name'] = '讲师介绍页';
                            break;
                        case 15:
                            $v['target_type_name'] = '月度课介绍页';
                            break;
                        case 16:
                            $v['target_type_name'] = '季度课介绍页';
                            break;
                        case 17:
                            $v['target_type_name'] = '私人定制课页面';
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
            $data = ['rows' => $list, 'total' => $adsModel->fetchCount($name,$adStatus,$param['logmin'],$param['logmax'],$positionType,$param['relevanceType'])];
            return $this->sucJson($data);
        }
        $this->assign('positionType', $positionType);
        return $this->fetch();
    }
    /**新增素材**/
    public function add($positionType){
        if(request()->isPost()){
            $adsModel = new \app\admin\model\Ads();
            $param = input('post.');

            if(empty($param['adFile'])){
                return $this->error('请选择图片');
            }
            elseif(empty($param['adName'])){
                return $this->error('请填写名称');
            }
            elseif(empty($param['adURL'])&& $param['relevanceType']!=17){
                return $this->error('请填写链接');
            }
            elseif(empty($param['adSort'])){
                return $this->error('请填写排序');
            }
            elseif(empty($param['adStatus'])){
                return $this->error('请选择状态');
            }else{
                $positionType = $param['positionType'];
                $data['adFile'] = $this->saveimg($param['adFile']);
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
                $status = $adsModel->save($data);
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

    /**
     * 编辑素材
     * @param $positionType
     * @return mixed|void
     */
    public function edit($id,$positionType){
        $adsModel = new \app\admin\model\Ads();
        if(request()->isPost()){
            $param = input('post.');

            if(empty($param['adName'])){
                return $this->error('请填写名称');
            }
            elseif(empty($param['adURL'])&& $param['relevanceType']!=17){
                return $this->error('请填写链接');
            }
            elseif(empty($param['adSort'])){
                return $this->error('请填写排序');
            }
            elseif(empty($param['adStatus'])){
                return $this->error('请选择状态');
            }else{

                if(!empty($param['adFile'])){
                    $data['adFile'] = $this->saveimg($param['adFile']);
                }
                $positionType = $param['positionType'];
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
                $status = $adsModel->save($data,['adId'=>$param['adId']]);
                if($status > 0){
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
        $userInfo = $adsModel::get($id);
        $this->assign('positionType', $positionType);
        $this->assign('userInfo',$userInfo);
        return $this->fetch();
    }

    /**
     * 组装跳转链接
     * @param $data_type
     * @param $type_id
     * @return mixed
     */
    public function handleUrl($data_type,$type_id){
        switch ($data_type) {
            case 14:
                $data['id'] = $type_id;
                $data['url'] = config('WX_DOMAIN').'/#/dacelueMini/teacherDetail/'.$type_id;
                break;
            case 15:
                $data['id'] = $type_id;
                $data['url'] = config('WX_DOMAIN').'/#/dacelueMini/courseDetail/'.$type_id;
                break;
            case 16:
                $data['id'] = $type_id;
                $data['url'] = config('WX_DOMAIN').'/#/dacelueMini/courseDetail/'.$type_id;
                break;
            case 17:
                $data['id'] = $type_id;
                $data['url'] = config('WX_DOMAIN').'/#/dacelueMini/customMade';
                break;
            default:
                $data['id'] = '';
                $data['url'] = '';
                break;
        }
        return $data;
    }



    //批量删除推荐
    public function del_array(){
        $ids = input('param.id');
        $AdsModel = new \app\admin\model\Ads();
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
    public function stop_array(){
        $ids = input('param.id');
        $AdsModel = new \app\admin\model\Ads();
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
    public function start_array(){
        $ids = input('param.id');
        $AdsModel = new \app\admin\model\Ads();
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

    /**
     * 图片上传
     * @param $img
     * @return string
     */
    private function saveimg($img)
    {
        $AdsC = new \app\admin\controller\Ads();
        $imgs = $AdsC->uploadImg($img);
        $imgs = json_decode($imgs,true);
        return $this->path.$imgs['key'];
    }


}