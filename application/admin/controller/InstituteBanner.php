<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/8/20
 * Time: 13:57
 */

namespace app\admin\controller;


use think\Exception;

class InstituteBanner extends App
{
    use \app\admin\traits\Common,
        \app\admin\traits\AdminTable,
        \app\admin\traits\Status,
        \app\admin\traits\ImgReset;
    public function index()
    {
        $model = new \app\admin\model\Ads();
        $positionType = request()->param('positionType',24);
        $header = [
            ['checkbox' => true, 'value' =>1],
            ['field' =>'id', 'title' => 'ID',],
            ['field' => 'adFile', 'title' => '缩略图',],
            ['field' => 'adName', 'title' => '名称',],
            ['field' => 'relevanceType', 'title' => '跳转类型',],
            ['field' => 'adURL', 'title' => '跳转地址',],
            ['field' => 'createTime', 'title' => '添加时间',],
            ['field' => 'adStatus', 'title' => '状态',],
            ['field' => 'operatorName', 'title' => '操作人',],
            ['field' => 'adSort', 'title' => '排序',],
            ['field' => 'action', 'title' => '操作',],
        ];
        $search = [
            [['options' => ['placeholder' => '名称']], 'like', 'adName'],
            [['options' => ['placeholder' => '开始时间']], 'dateMin-date', 'createTime '],
            [['options' => ['placeholder' => '结束时间']], 'dateMax-date', 'createTime'],
            [['options' => ['data' => $model->getTypeOrStatus('relevanceType')], 'name' => 'table-search-type'], 'select','relevanceType', 'intval' ],
            [['options' => ['data' => $model->getTypeOrStatus('status')], 'name' => 'table-search-status'], 'select','adStatus', 'intval' ],
        ];

        $this->setTableHeader($header)
            ->setSearch($search)
            ->setToolbarId('table-button-html')
            ->setTableSearchId('table-search-html');;
        $where = ['positionType'=>intval($positionType)];
//        var_dump($where);die();
        return $this->traitAdminTableList(function () use($where){
            //当有搜索数据时执行
            $model = new \app\admin\model\Ads();
            $field = "adId,adFile,adName,adURL,adSort,positionType,createTime,operatorName,relevanceType,adStatus";

            //生成数据表
            $data = $this->traitAdminTableQuery([], function () use ($model,$where) {
                $model->where($where);
                return $model;
            }, $field, 'adSort asc',"*",false);

            $result = [];
            foreach ($data['rows'] as $k => $datum) {

                $button = $datum['adStatus'] == 1 ? ['title'=>'禁用','value'=>-1]:['title'=>'启用','value'=>1];
                //生成操作按钮
                $action = self::showOperate([
                    '编辑' =>  [
                        'id' => $datum['adId'],
                        'src' => "javascript:_edit('{$datum['adId']}');"
                    ],
                    '移除' =>  [
                        'id' => $datum['adId'],
                        'src' => "javascript:_delete('{$datum['adId']}');"
                    ],
                    "{$button['title']}" =>  [
                        'id' => $datum['adId'],
                        'src' => "javascript:_changeStatus({$datum['adId']},{$button['value']});"
                    ],
                ]);
                $img = $model::makeImg($datum['adFile']);
                //模板数据返回
                $result[] = [
                    'id' => $datum['adId'],
                    'adFile' => $img,
                    'adName' => $datum['adName'],
                    'relevanceType' =>$model->getTypeOrStatus('relevanceType',$datum['relevanceType']),
                    'adURL' => $datum['adURL'],
                    'createTime' => $datum['createTime'],
                    'adStatus' =>$model->getTypeOrStatus('status',$datum['adStatus']),
                    'adSort' => $datum['adSort'],
                    'operatorName' => $datum['operatorName'],
                    'action' => $action,
                ];
            }
            return $this->sucJson([
                'rows' => $result,
                'total' => $data['total'],
            ]);
        }, function () {
            $this->assign('positionType',request()->param('positionType'));
        });
    }//end

    /**
     * 添加banner
     * @return mixed|\think\response\Json
     */
    public function add()
    {
        $model = new \app\admin\model\Ads();
        $positionType = request()->param('positionType',24);
        if (request()->isGet()){
            $ids = request()->param('id',null);
            if (!empty($ids)) {
                $info = $model::get($ids);
                $this->assign('info',$info);
            }
        }
        if (request()->isPost())
        {
            $image = $this->trimdata('image');
            $adId = $this->trimdata('adId');
            $adName = $this->trimdata('adName');
            $adSort = $this->trimdata('adSort');
            $positionType = $this->trimdata('positionType');
            $relevanceId = $this->trimdata('relevanceId');
            $relevanceType = $this->trimdata('relevanceType');
            $adStatus = $this->trimdata('status');
            $operatorName = $_SESSION['adminSess']['admin']['username'];
            $updateTime = date('Y-m-d H:i:s');
            //数据校验
            if (empty($adName)||empty($adSort)
                ||empty($positionType)||empty($relevanceType)
                ||empty($relevanceId)||empty($adStatus)){
                return $this->errSysJson(['code'=>5400],'必要参数不能为空');
            }
            if ($positionType == 26){
                $check = $model->where(['positionType'=>26,'relevanceId'=>$relevanceId,'adStatus'=>1])->field('adId')->find();
                if ($check) return $this->errSysJson(['code'=>5400],'该讲师banner已存在！');
            }
            //保存的数据
            $savedata = compact('adName','adSort','relevanceType','adStatus','positionType','operatorName','updateTime');

            $getInsertInfo = $this->handleUrl($relevanceType,$relevanceId);
            $savedata['adURL'] = $getInsertInfo['url'];
            $savedata['relevanceId'] = $getInsertInfo['id'];
            //处理有图片的情况
            if (!empty($image)){
                $AdsC = new Ads();
                $imgs = $AdsC->uploadImg($image);
                $imgs = json_decode($imgs,true);
                $pathimg = "http://oqt46pvmm.bkt.clouddn.com/".$imgs['key'];
                $savedata['adFile'] = $pathimg;
            }
            //根据提交类型判断是更新还是创建
            if (empty($adId)){
                if (empty($image)) return $this->errSysJson(['code'=>5400],'请上传图片');
                $savedata['createTime'] = date('Y-m-d H:i:s');
                $result = $model->save($savedata);
            }else{
                $result = $model->save($savedata,['adId'=>$adId]);
            }
            //返回提示
            if ($result){
                return $this->sucSysJson(['code'=>200],'success');
            }else{
                $this->errSysJson(['code'=>5400],'error');
            }
        }
        $types = $model->getTypeOrStatus('relevanceType');
        $result = [];
        if ($positionType == 24){
            foreach ($types as $k =>$v){
                $result[]=[
                    'value'=>$k,
                    'name' =>$v
                ];
            }
        }else{
            $result[] = [
                'value'=>6,
                'name' =>'讲师介绍页'
            ];
        }

        $this->assign('positionType',$positionType);
        $this->assign('type',$result);
        return $this->fetch();
    }//end

    /**
     * 更加类型拼接数据
     * @param $data_type
     * @param $type_id
     * @return mixed
     */
    public function handleUrl($data_type,$type_id){
        switch ($data_type) {
            case 7:
                $data['id'] = $type_id;
                $data['url'] = $type_id;
                break;
            case 13:
                $data['id'] = $type_id;
                $data['url'] = config('WEB_DOMAIN').'/#/videoCommon/'.$type_id;
                break;
            case 6:
                $data['id'] = $type_id;
                $data['url'] = config('WEB_DOMAIN').'/#/teacherIntroduction/'.$type_id;
                break;
            default:
                $data['id'] = '';
                $data['url'] = '';
                break;
        }
        return $data;
    }

    /**
     * 批量删除
     * @return \think\response\Json
     */
    public function delArray()
    {
        if (request()->isPost()){
            $ids = trim(request()-> param('ids',null));
            if (empty($ids)) return $this ->errSysJson('参数错误！');
            $model = new \app\admin\model\Ads();
            $model->db()->startTrans();
            try {
                $result = $model::destroy($ids);
                $model->db()->commit();
                if ($result) {
                    return $this->sucSysJson($result, '批量删除成功！');
                } else {
                    return $this->errSysJson('批量删除失败');
                }
            }catch (Exception $e){
                $model->db()->rollback();
            }//catch
        }else{
            return $this->errSysJson('提交方式错误！');
        }
    }
    /**
     * 批量禁用
     * @return \think\response\Json
     */
    public function editArray()
    {
        if (request()->isPost()){
            $ids = trim(request()-> param('ids',null));
            if (empty($ids)) return $this ->errSysJson('参数错误！');
            $model = new \app\admin\model\Ads();
                $Mdata = $model::all($ids);
                $Uarr = [];
                foreach($Mdata as  $k => $v){
                    if ($v['adStatus'] == 1)
                    {
                        $Uarr[$k]['adId'] = $v['adId'];
                        $Uarr[$k]['adStatus'] = -1;
                        $Uarr[$k]['operatorName'] = $_SESSION['adminSess']['admin']['username'];
                    }
                }
                $result =$model->saveAll($Uarr);
                if ($result){
                    return $this -> sucSysJson($result,'批量修改成功');
                }else{
                    return $this -> sucSysJson($result,'批量修改失败，请重新提交');
                }
        }else{
            return $this->errSysJson('提交方式错误！');
        }
    }

    /**
     * 删除
     * @return \think\response\Json
     */
    public function delete()
    {
        $id = $this->trimdata('id');
        if (empty($id)) return $this->errSysJson(['code'=>400],'数据异常！');
        $model = new \app\admin\model\Ads();
        $model->db()->startTrans();
        try{
            $result =  $model::destroy($id);
            $model->db()->commit();
            if ($result){
                return $this->sucSysJson(['code'=>200],'delete success');
            }else{
                $this->errSysJson('delete error');
            }
        }catch (Exception $e){
            $model->db()->rollback();
        }
    }
    /**
     * 编辑用户当前状态
     */
    public function changeStatus()
    {
        if (request()->isPost()){
            $id = trim(request()->param('id',null));
            $status = trim(request() ->param('status',null));
            if (empty($id)|| $status == null) return $this -> errSysJson('参数错误！');
            $model = new \app\admin\model\Ads();
            $check = $model::get($id);
            if (empty($check) || count($check)<1) return $this -> errSysJson('该数据不存在');
            $result = $model ->save(['adStatus' => $status],['adId'=>$id]);
            if ($result){
                return $this->sucSysJson(['code'=>200],'用户状态修改完成！');
            }else{
                return $this->errSysJson('修改失败请重新提交！');
            }
        }else{
            return $this->errSysJson('提交方式错误！');
        }
    }
    //格式化数据
    private function trimdata($key)
    {
        return trim(request()->param($key,null));
    }

}