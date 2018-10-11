<?php
/************************************************************
 * Copyright (C), 1993-~, Dacelve. Tech., Ltd.
 * FileName : GlobalLive.php
 * Author   : Lizhijian
 * Version  : 1.0
 * Date     : 2018/3/15 17:56
 * Description   : 公共直播间
 * Main Function :
 * History  :
 * <author>    <time>    <version >    <desc>
 * Lizhijian   2018/3/15   1.0          init
 ***********************************************************/
namespace app\admin\controller;

use app\admin\controller\Ads;
use app\admin\model\AdminLive;
use app\admin\model\Live;
use app\admin\model\LiveStatistics;
use app\admin\model\OnlineRoomStat;

/**
 * Class GlobalLive 公共直播间
 * @package app\admin\controller
 * Fashion:
 */
class GlobalLive extends App
{
    use \app\admin\traits\Common,
        \app\admin\traits\AdminTable,
        \app\admin\traits\Status,
        \app\admin\traits\ImgReset;

    /**
     * @name 列表页
     * @Description
     * @author Lizhijian
     * @return mixed
     * @example
     * @remark
     */
    public function index(){
        $this->setTableHeader([
            ['checkbox' => true, 'value' => 1,],
            ['field' => 'id', 'title' => 'ID',],
            ['field' => 'day_ave_num', 'title' => '日均在线用户',],
            ['field' => 'max_num', 'title' => '最高在线用户',],
            ['field' => 'number', 'title' => '真实在线/虚拟在线/总在线',],
            ['field' => 'ave_num', 'title' => '人均在线时长（单位：分钟）',],
            ['field' => 'status_tip', 'title' => '直播间状态',],
            ['field' => 'action', 'title' => '操作',],
        ])->setToolbarId('table-button-html')->setTableSearchId('table-search-html');

        return $this->traitAdminTableList(function () {

            $model = new \app\admin\model\GlobalLive();
            $field = '*';

            $data = $this->traitAdminTableQuery([], function () use ($model) {
                $model->where('pid', 0);
                return $model;
            }, $field, 'id desc');

            // 处理数据
            $userIds = $liveIds = [];
            foreach ($data['rows'] as $item) {
                $userIds[] = $item['user_id'];
                $liveIds[] = $item['id'];
            }

            $result = [];

            //获取正确的统计日期，默认前一天，排除法定假期和周末
            $onlineRoomInfoStatModel = new \app\admin\model\OnlineRoomInfoStat();
            $statisticsDate = $onlineRoomInfoStatModel->getStatisticsDate();

            $liveModel = new \app\admin\model\Live();

            foreach ($data['rows'] as $datum) {

                //获取 日均在线用户、最高在线用户、人均在线时长
                $onlineRoomInfo = $onlineRoomInfoStatModel->getOnlineRoomInfoByLiveIdAndDate($datum['id'], $statisticsDate);
                $liveNumber = $liveModel->where('id', $datum['id'])->field('online_num, virtual_num')->find();

                $action = self::showOperate([
                    '详情' => $this->urlTab('Live直播间管理', '公共直播间详情', 'details', [
                        'id' => $datum['id'],
                        'day_ave' => $onlineRoomInfo['onlineCountAvg'],//日均
                        'max' => $onlineRoomInfo['maxVisitorCount']?:$liveNumber['online_num'],//最高
                        'ave' => $onlineRoomInfo['onlineMinutesAvg'],//人均
                        'vir' => $liveNumber['virtual_num']
                    ]),
                    $this->statusActionHtml($datum['open_status']) => [
                        'class' => 'open-status',
                        'data-ids' => $datum['id'],
                        'data-status' => $this->getStatusHtmlDataAttr($datum['open_status']),
                    ]
                ]);

                $result[] = [
                    'id' => $datum['id'],
                    'day_ave_num' => $onlineRoomInfo['onlineCountAvg'],//日均在线用户
                    'max_num' => $onlineRoomInfo['maxVisitorCount']?:$liveNumber['online_num'],//最高在线用户
                    'number' => \app\admin\model\UrlHtml::goTruthUserList($datum['id'], 'live', $liveNumber['online_num']).
                        "/".$liveNumber['virtual_num']."/".($liveNumber['online_num']+$liveNumber['virtual_num']),
                    'ave_num' => $onlineRoomInfo['onlineMinutesAvg'],//人均在线时长

                    'statusText' => $this->statusColumnHtml($datum['open_status']),
                    'action' => $action,
                    'status_tip' => $datum['open_status']==1?'开启':'关闭',
                    'status' => $datum['open_status'],
                ];
            }

            return $this->sucJson([
                'rows' => $result,
                'total' => $data['total'],
            ]);
        }, function () {

            $openStatus = [
                0=>'全部',
                1=>'启用',
                2=>'禁用'
            ];
            $this->assign('openStatus', $openStatus);
            $this->assign('statusHtml', $this->statusActionHtml(null));
        });
    }
    /**
     * 删除单条数据
     * @return \think\response\Json
     */
    public function delData(){
        // 启动事务
        $model = new \app\admin\model\GlobalLive();
        $model->db()->startTrans();
        try{
            if (request()->isPost()) {
                $id = trim(request()->param('id'));
                if (empty($id)) return $this->errSysJson('','缺少必要参数！');
                $result = $model::destroy($id);
                // 提交事务
                $model->db()->commit();
                if ($result){
                    return $this->sucSysJson($result,'删除成功！');
                }else{
                    return $this->errSysJson('删除成功!');
                }
            }else{
                return $this->errSysJson(['code'=>400,'msg'=>'提交方式错误']);
            }

        } catch (\Exception $e) {
            // 回滚事务
            $model->db()->rollback();
        }
    }
    public function checktime($checkday = null){

        $Gl = new \app\wechat\controller\GlobalLive();
         $currentDate =empty($checkday) ? date('Y-m-d'):date('Y-m-d',strtotime($checkday));
        return $Gl->checktime($currentDate);
    }

    public function detailsadd()
    {
        $model = new \app\admin\model\GlobalLive();
        if (request()->isGet()){
            $id = intval(trim(request()->param('id',null)));
            $type = empty($id) ? 1:2;
            if ($type == 1){
                $returnData = [
                    'type'=> $type,
                ];
            }else{//判断提交类型
                $dataInfo = $model::get($id);
                $returnData = [
                    'type'=> $type,
                    'cid'=>$id,
                    'password'=>$dataInfo['password'],
                    'user_id'=>$dataInfo['user_id'],
                    'cate_name'=>$dataInfo['cate_name'],
                    'class_name'=>$dataInfo['class_name'],
                    'classification'=>$dataInfo['classification'],
                    'teacher_name'=>$dataInfo['teacher_name'],
                    'dayTime'=>date('Y-m-d',strtotime($dataInfo['set_start_time'])),
                    'startTime'=>date('H:i',strtotime($dataInfo['set_start_time'])),
                    'endTime'=>date('H:i',strtotime($dataInfo['set_end_time'])),
                ];
            }
            //适用平台
            if (!empty($dataInfo['adapt'])){
                $returnData['adaptData'] = json_decode($dataInfo['adapt'],true);
            }else{
                $returnData['adaptData'] = ['weixin'=>false,'applet'=>false,'mobile'=>false];
            }
            $this->assign('data',$returnData);
        }else{//post
            $userModel = new \app\admin\model\User();
            $dayTime=trim(request()->param('dayTime',null));
            $setStartTime=trim(request()->param('startTime',null));
            $setEndTime=trim(request()->param('endTime',null));
            $user_id = trim(request()->param('user_id',null));
            $teacher_name=trim(request()->param('teacher_name',null));
            $param = request()->param();
            if (!is_numeric($param['user_id'])||empty($user_id))  return $this->errSysJson(['code'=>400],'用户id输入有误！');
            $userData = $userModel->where(['user_id'=>$user_id,'user_level'=>2])->field('user_id,alias')->find();
            if (empty($userData) ||count($userData)<1){
                return $this->errSysJson(['code'=>400],'该用户不是讲师或者用户ID输入有误！');
            }
            if (empty($teacher_name)){
                $teacher_name = $userData['alias'];
            }

            //处理保存数据
            $saveData = [
                'user_id'=>trim($param['user_id']),
                'cate_name'=>trim($param['cate_name']),
                'class_name'=>trim($param['class_name']),
                'classification'=>trim($param['classification']),
                'teacher_name'=>$teacher_name,
                'set_start_time'=>$dayTime.' '.$setStartTime,
                'set_end_time'=>$dayTime.' '.$setEndTime,
                'pid'=>9999,
                'open_status'=>1,
            ];
            //时间范围验证
            $startTime = $saveData['set_start_time'];
            $endTime = $saveData['set_end_time'];
            if ($startTime >= $endTime) {
                return $this->errSysJson(['code'=>400],'结束时间必须大于开始时间');
            }elseif (date('Y-m-d', strtotime($startTime)) != date('Y-m-d', strtotime($endTime))) {
                return $this->errSysJson(['code'=>400],'开始时间和结束时间必须是同一天');
            }
            $cid = intval(trim(request()->param('cid',null)));
            //验证时间可否预定
            $sql = "SELECT id,count(1) as num FROM `talk_global_live` WHERE pid = 9999 AND open_status = 1 AND ( ( `set_start_time` <= '$startTime' AND `set_end_time` > '$startTime' ) OR ( `set_start_time` < '$endTime' AND `set_end_time` >= '$endTime' ) OR ( `set_start_time` >= '$startTime' AND `set_end_time` <= '$endTime' ) )";
            $dataList = $model->db()->query($sql);
            if (!empty($dataList) && $dataList[0]['num'] > 0) {
                $flg=true;
                if ($dataList[0]['num']<2 &&!empty($cid)&&$dataList[0]['id']==$cid){
                    $flg = false;
                }
                if ($flg){
                    return $this->errSysJson(['data'=>$dataList,'id'=>$cid],'开课时间段已被预定');
                }
            }
            //验证通过即保存

            try{
                if (empty($cid)){
                    $result =$model->save($saveData);
                }else{
                    $result =$model->save($saveData,['id'=>$cid]);
                }

                // 提交事务
                $model->db()->commit();
                if ($result){
                    return $this->sucSysJson(['code'=>200],'提交成功');
                }else{
                    return $this->errSysJson(['code'=>400],'提交失败!');
                }
            } catch (\Exception $e) {
                // 回滚事务
                $model->db()->rollback();
            }
        }
        return $this->fetch();
    }

    /**
     * @name 详情页
     * @Description
     * @author Lizhijian
     * @return mixed
     * @example
     * @remark
     */
    public function details(){

        $this->setTableHeader([
            ['field' => 'userId', 'title' => '讲师ID',],
            ['field' => 'teacher_name', 'title' => '讲师昵称',],
            // ['field' => 'max_num', 'title' => '最高在线用户',],
            ['field' => 'set_date_time', 'title' => '直播时间段',],
            ['field' => 'set_date', 'title' => '时间',],
        	['field' => 'classification', 'title' => '分类',],
            ['field' => 'cate_name', 'title' => '课程栏目',],
            ['field' => 'class_name', 'title' => '主题',],
            // ['field' => 'real_time', 'title' => '实际直播时间段（直播时长）',],
            ['field' => 'max_num', 'title' => '最高在线用户',],
            ['field' => 'ave_num', 'title' => '人均在线时长（分钟）',],
            ['field' => 'action', 'title' => '操作',],
        ])->setToolbarId('table-button-html')->setTableSearchId('table-search-html');

        return $this->traitAdminTableList(function () {

            $model = new \app\admin\model\GlobalLive();
            $LiveStatisticsModel = new LiveStatistics();
            $OnlineRoomStatModel = new OnlineRoomStat();
            $field = '*';

            $pid = input('id');
            if(input('dateMin')){
                $this->tableWhere['set_start_time'] = [
                    '>=',input('dateMin')
                ];
            }
            if(input('dateMax')){
                $this->tableWhere['set_end_time'] = [
                    '<=',input('dateMax')
                ];
            }
            $data = $this->traitAdminTableQuery([
                [['user_id', ''], 'eq', 'user_id'],
                [['teacher_name', ''], 'likeAll', 'teacher_name']
            ], function () use ($model, $pid) {
                $model->where('pid', $pid);
                return $model;
            }, $field, 'id desc');
//p($this->tableWhere);
            // 处理数据
            $userIds = $liveIds = [];
            foreach ($data['rows'] as $item) {
                $userIds[] = $item['user_id'];
                $liveIds[] = $item['id'];
            }

            $result = [];
            $onlineRoomInfoStatModel = new \app\admin\model\OnlineRoomInfoStat();
            //获取正确的统计日期，默认前一天，排除法定假期和周末
            $statisticsDate = $onlineRoomInfoStatModel->getStatisticsDate();


            foreach ($data['rows'] as $datum) {

                $action = self::showOperate([
                    "编辑" =>[
                        'class'    => "edit",
                        'src' =>  "javascript:add({$datum['id']});",
                    ],
                    "删除" =>[
                        'class'    => "edit",
                        'src' =>  "javascript:_del({$datum['id']});",
                    ]
                ]);
                //获取 日均在线用户、最高在线用户、人均在线时长
                $onlineRoomInfo = $onlineRoomInfoStatModel->getOnlineRoomInfoByLiveIdAndDate($datum['id'], $statisticsDate);

                $time = date('H:i', strtotime($datum['set_start_time'])).'-'.date('H:i', strtotime($datum['set_end_time']));
                $realTime = date('H:i', strtotime($datum['real_start_time'])).'-'.date('H:i', strtotime($datum['real_end_time']));
                $min = round((strtotime($datum['real_end_time'])-strtotime($datum['real_start_time']))/60) .'分钟';
                $result[] = [
                    'userId' => $datum['user_id'],
                    'teacher_name' => $datum['teacher_name'],
                    'set_date_time' => $time,//设定时间段
                    'set_date' => date('Y-m-d', strtotime($datum['set_start_time'])),//设定日期
                	'classification' => $datum['classification'],
                    'cate_name' => $datum['cate_name'],
                    'class_name' => $datum['class_name'],
                    // 'real_time' => $realTime.' ('.$min.')',
                    // 'max_num' => $onlineRoomInfo['maxVisitorCount'],//最高在线用户
                    'max_num' => $OnlineRoomStatModel->getPublicRoomOnlineNum(1000009999,$datum['set_start_time']),
                    // 'ave_num' => $onlineRoomInfo['onlineMinutesAvg']
                    'ave_num' => sprintf("%.2f",$LiveStatisticsModel->getPublicRoomPerCapitaOnline($course_id=$datum['id'])),
                    'action'=>$action,
                    //人均在线时长
                ];
            }

            return $this->sucJson([
                'rows' => $result,
                'total' => $data['total'],
            ]);
        }, function () {
            $liveModel = new \app\admin\model\Live();
            $this->assign('url', \app\common\model\RedirectUrl::getGlobalUrl());
            $this->assign('info', input());
            $imgvalue = $liveModel->where('id',9999)->value('background_img');
            $this->assign('imgvalue',$imgvalue);
            $this->assign('data',$this->makeData($liveModel));
        });
    }

    /**
     * 从七牛获取视频或图片URL，拼接用户信息
     * @return array
     */
    private function makeData($liveModel)
    {
        $qiNiuModel = new \app\wechat\model\QiniuGallerys();
        $globalData = $liveModel->where('id',9999)->field('id,video_pic_id,video_id')->find();
        $data = [
            'picUrl'=>$qiNiuModel->getQiNiuUrl($globalData['video_pic_id']),
            'picID'=>$globalData['video_pic_id'],
            'videoID'=>$globalData['video_id'],
        ];
        return $data;
    }


    /**
     * @name 关闭状态
     * @Description
     * @author Lizhijian
     * @param $ids
     * @param int $status
     * @param int $operateId
     * @return mixed
     * @example
     * @remark
     */
    public function closeStatus($ids, $status = 2, $operateId = 0)
    {
        if (empty($operateId)) {
            $operateId = \app\admin\model\Admin::getCurrentAdminId();
        }

        return parent::closeStatus($ids, $status, $operateId);
    }

    /**
     * @name 改变直播间状态
     * @Description
     * @author Lizhijian
     * @param $ids 房间ID
     * @param $status 改变状态
     * @return \think\response\Json
     * @example
     * @remark
     */
    public function changeStatus($ids, $status)
    {

        $model = new \app\admin\model\GlobalLive();

        $model->closeStatus($ids, (int)$status);

        return $this->sucSysJson(1);
    }

    public function editVir(){
        $id = input('id');
        $vir_num = input('vir_num');
        $model = new \app\admin\model\Live();
        $model->where('id', $id)->update(['virtual_num' => $vir_num]);
    }

    public function editImg($img){
        $AdsC = new Ads();
        $LiveM = new Live();
        $imgs = $AdsC->uploadImg($img);
        $imgs = json_decode($imgs,true);
        $img = "http://oqt46pvmm.bkt.clouddn.com/".$imgs['key'];
        $LiveM->where('id',9999)->update([
            'background_img' => $img
        ]);
        return $img;                
    }

    /**
     * 编辑视频以及视频默认图
     * @return \think\response\Json
     */
    public function ajaxUploadVideo()
    {
        $saveData=[
            'video_pic_id'=>trim(request()->param('videoPicId',null)),
            'video_id'=> trim(request()->param('videoId',null)),
        ];
        $model = new \app\admin\model\Live();
        $result = $model->where('id',9999)->update($saveData);
        if ($result){
            return $this->sucSysJson($result,'编辑成功！');
        }else{
            return $this->errSysJson($result,'编辑失败！');
        }
    }

    /**
     * @return mixed
     */
    public function setAdministrators(){
        $AdminModel = new AdminLive();
        if(request()->isPost()){
            $list = $AdminModel::all();
            foreach ($list as $k => $v) {
                $s = $v['status'];
                $v['action'] = '<a href="javascript:admin_del('.$v['id'].');">删除</a>';
                if ($v['status'] == 1){
                    $v['status'] = '启用';
                    $v['action'] .= ' | <a href="javascript:admin_edit('.$v['id'].','.$s.');">禁用</a>';
                }else{
                    $v['status'] = '未启用';
                    $v['action'] .= ' | <a href="javascript:admin_edit('.$v['id'].','.$s.');">启用</a>';
                }
            }
            $data = ['rows' => $list, 'total' => count($list)];
            return $this->sucJson($data);
        }
        return $this->fetch();
    }

    /**
     * 设置用户成为管理员
     * @return \think\response\Json
     * @throws \think\Exception\DbException
     */
    public function add(){
        if(request()->isPost()){
            $id = trim(request()->param('id'));
            $Model = new \app\admin\model\User();
            $data = $Model::get($id);
            if (count($data)<1){
                return $this->errSysJson("用户ID为：{$id} 是无效ID！");
            }
            $admin = new AdminLive();
            $save = [
                'user_id'=> $data['user_id'],
                'alias' => $data['alias'],
                'status' => 1,
                'actionname' => $_SESSION['adminSess']['admin']['username'],
            ];
            $check = $admin->where('user_id',$id)->find();
            if (count($check)>0)
            {
                return $this->errSysJson("用户{$data['alias']}已经是管理员！");
            }else{
                $result = $admin->data($save)->save();
                if ($result){
                    return $this->sucSysJson('',"成功设置{$data['alias']}为管理员！");
                }else{
                    return $this->errSysJson('设置失败，请尝试重新提交！');
                }
            }
        }else{
            $this->sucSysJson('提交方式错误');
        }
    }
    /**
     * 编辑用户当前状态
     */
    public function adminEdit()
    {
        if (request()->isPost()){
            $id = trim(request()->param('id',null));
            $status = trim(request() ->param('status',null));
            if (empty($id)|| $status == null) return $this -> errSysJson('参数错误！');
            $model = new AdminLive();
            $check = $model::get($id);
            if (empty($check) || count($check)<1) return $this -> errSysJson('该用户不存在！');
            $status != 1 ? $state = 1 : $state = 0 ;
            $result = $model ->save(['status' => $state],['id'=>$id]);
            if ($result){
                return $this->sucSysJson('','用户状态修改完成！');
            }else{
                return $this->errSysJson('修改失败请重新提交！');
            }
        }else{
            return $this->errSysJson('提交方式错误！');
        }
    }
    /**
     * 删除当前用户
     */
    public function delAdmin()
    {
        if (request()->isPost()){
            $id = trim(request()->param('id',null));
            if (empty($id)) return $this -> errSysJson('用户数据异常！');
            $model = new AdminLive();
            $check = $model::get($id);
            if (empty($check) || count($check)<1) return $this -> errSysJson('该用户不存在！');
            $result = $model::destroy($id);
            if ($result){
                return $this->sucSysJson('','删除成功！');
            }else{
                return $this->errSysJson('删除失败请重新提交！');
            }
        }else{
            return $this->errSysJson('提交方式错误！');
        }
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
            $model = new AdminLive();
            if ($_SESSION['adminSess']['admin']['status'] == 1){
                $result = $model::destroy($ids);
                if ($result){
                    return $this->sucSysJson($result,'批量删除成功！');
                }else{
                    return $this->errSysJson('批量删除失败');
                }
            }else{
                return $this->errSysJson('管理员身份已失效');
            }
        }else{
            return $this->errSysJson('提交方式错误！');
        }
    }
    /**
     * 批量禁用
     * @return \think\response\Json
     */
    public function deitArray()
    {
        if (request()->isPost()){
            $ids = trim(request()-> param('ids',null));
            if (empty($ids)) return $this ->errSysJson('参数错误！');
            $model = new AdminLive();
            if ($_SESSION['adminSess']['admin']['status'] == 1){
                $Mdata = $model::all($ids);
                $Uarr = [];
                foreach($Mdata as  $k => $v){
                    if ($v['status'] == 1)
                    {
                        $Uarr[$k]['id'] = $v['id'];
                        $Uarr[$k]['status'] = 0;
                    }
                }
                $result =$model->saveAll($Uarr);
                if ($result){
                    return $this -> sucSysJson($result,'批量修改成功');
                }else{
                    return $this -> sucSysJson($result,'批量修改失败，请重新提交');
                }
            }else{
                return $this->errSysJson('管理员身份已失效');
            }
        }else{
            return $this->errSysJson('提交方式错误！');
        }
    }
}