<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/4/20
 * Time: 15:55
 */

namespace app\admin\controller;

use app\admin\model\LiveImg;
use app\wechat\controller\AdmireRpc;

class WebCourseManage extends App
{

    use \app\admin\traits\Common,
        \app\admin\traits\AdminTable,
        \app\admin\traits\Status,
        \app\admin\traits\ImgReset,
        \app\admin\traits\Course,
        \app\admin\traits\userNav;

    protected $path = "http://oqt46pvmm.bkt.clouddn.com/";
    /**
     * 课程列表
     *
     * @internal param $pid 指定系列课内的课程
     * @param int $action
     * @return mixed
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function index($type = 1, $action = 1)
    {
        if ($action == 2) $this->hideNav();
        $model = new \app\admin\model\Course();
        $userId = $this->request->param('userId/i', 0);
        $type = intval($type); // 0为系列课，1为用户的课程，2为用户购买课程，3为参与的课程，4为Live直播推荐课程数据
        $seriesSingleBool = false; // 单次课程列表
        $seriesSingleParentOpenBool = true;
        $seriesBool = false;//系列课程列表
        if ($type == 0) {
            $seriesBool = true;
        }


        if ($seriesBool) {//系列课列表的header
            $header = [
                ['checkbox' => true, 'value' => 1,],
                ['field' =>'num', 'title' => '序号',],
                ['field' =>'ID', 'title' => 'ID',],
                ['field' =>'name', 'title' => '课程名称',],
                ['field' => 'firstCate', 'title' => '一级分类',],
                ['field' => 'secondCate', 'title' => '二级分类',],
                'type' => '收费类型',
                'teacherName' => '创建人',
                ['field' => 'money', 'title' => '礼点',],
                'countNum' => '购买/浏览人数',
                ['field' => 'createTime', 'title' => '创建时间',],
                'status' => '状态',
                'coursePlan' => '课程安排',
                ['field' => 'action', 'title' => '操作',],
            ];
        }else {//单次课程
            $header = [
                ['checkbox' => true, 'value' => 1,],
                ['field' =>'num', 'title' => '序号',],
                ['field' =>'ID', 'title' => 'ID',],
                ['field' =>'name', 'title' => '课程名称',],
                ['field' => 'firstCate', 'title' => '一级分类',],
                ['field' => 'secondCate', 'title' => '二级分类',],
                'type' => '直播类型',
                'form' => '课程形式',
                'teacherName' => '创建人',
                ['field' => 'money', 'title' => '礼点',],
                ['field' => 'onlineCount', 'title' => '真实在线/虚拟在线/总在线',],
                'countNum' => '购买/浏览人数',
                ['field' => 'beginTime', 'title' => '直播时间',],
                'status' => '状态',
                ['field' => 'action', 'title' => '操作',],
            ];
        }
        if (!empty($userId)) {
            $this->setTabNameThirdly('直播课程数据');
            unset($header['teacherName']); // 指定用户时不显示用户名（创建人）
        }

        // 系列课单次课程
        $this->disWhere(['pid/i', 0], 'eq', 'c.pid', function ($val)use(&$header, &$seriesSingleBool, &$seriesSingleParentOpenBool, $model){
            $seriesSingleBool = true;
            $header['countNum'] = '浏览人数'; // 系列课的单次课程列表只显示浏览人数
            $pid = $val[1];
            $parentOpenStatus = $model->where('id', $pid)->value('open_status');
            if ($parentOpenStatus == 2) {
                $seriesSingleParentOpenBool = false;
            }
            return $val;
        });

        if ($action != 2 && $seriesSingleParentOpenBool) { // 新增时不显示，系列课屏蔽时子课程列表不显示
            $this->setToolbarId('table-button-html');
        }

        $this->setTableHeader($header)
            ->setStatusTitle('显示', '屏蔽');

        if (empty($userId)){ // 指定直播间时没有搜索框
            if ($seriesBool) {//系列课的搜索条件
                $levelText = $model->getLevelText(null);
                unset($levelText[1]);//系列课没有加密类型
                $this->setSearch([
                    [['options' => ['placeholder' => '课程名称']], 'like', 'c.class_name'],
                    [['options' => ['placeholder' => '创建人']], 'like', 'u.alias'],
                    ['', 'dateMin-date', 'c.create_time'],
                    ['', 'dateMax-date', 'c.create_time '],
                    [['options' => ['data' => [-1 => '全部类型'] + $levelText]], 'select-zero', 'c.level', 'intval'],
                    [['options' => ['data' => $this->searchStatusArr('状态')]], 'select', 'c.open_status', 'intval'],
                ]);
            }else {//单次课程的搜索条件
                $this->setSearch([
                    [['options' => ['placeholder' => '课程名称']], 'like', 'c.class_name'],
                    [['options' => ['placeholder' => '创建人']], 'like', 'u.alias'],
                    ['', 'dateMin-date', 'c.begin_time'],
                    ['', 'dateMax-date', 'c.begin_time '],
                    [['options' => ['data' => [-1 => '全部类型'] + $model->getLevelText(null)]], 'select-zero', 'c.level', 'intval'],
                    [['options' => ['data' => [0 => '课程形式'] + $model->getMysqlTinyint('form')->getList()]],
                        'select', 'c.form', 'intval'],
                    [['options' => ['data' => $this->searchStatusArr('状态')]], 'select', 'c.open_status', 'intval'],
                ]);
            }

        }



        return $this->traitAdminTableList(function ()use($model, $action, $seriesSingleBool, $seriesBool, $seriesSingleParentOpenBool,$type){

            if($type == 2){
                $field = 'c.id, c.uid, c.live_id, c.cate_id courseCate, c.class_name, c.price, c.level,
                        c.study_num, c.begin_time, c.create_time, c.open_status, c.virtual_num, c.online_num, c.form, c.plan_num,
                        u.alias, u.user_level, l.cid liveCate,po.order_no,po.state';
            }else{
                $field = 'c.id, c.uid, c.live_id, c.cate_id courseCate, c.class_name, c.price, c.level,
                c.study_num, c.begin_time, c.create_time, c.open_status, c.virtual_num, c.online_num, c.form, c.plan_num,
                u.alias, u.user_level, l.cid liveCate';
            };

            $data = $this->traitAdminTableQuery([], function ()use ($type, $model, $seriesBool){

                if ($type == 2){ // 用户购买的课程
                    $model->where('c.type = 1');
                }else if ($type == 1){ // 用户课程，todo 未知产品需求
                    $model->whereSingleCourse();
                }else if ($seriesBool) {
                    $model->whereSeriesCourse();
                }else {
                    $model->whereSingleCourse();
                }

                $model->where(['c.status' => ['<>', 5]])->alias('c')
                    ->join('user u', 'u.user_id = c.uid', 'left')
                    ->join('live l', 'l.id = c.live_id and c. STATUS <> 5');


                return $this->courseListHandleType($model);
            }, $field, 'c.begin_time desc, c.id desc');


            $result = $courseIds = $liveIds = [];
            if (!empty($data['rows'])) {

                foreach ($data['rows'] as $row) {
                    $courseIds[] = $row['id'];
                    $liveIds[] = $row['live_id'];
                }

                $recommendModel = new \app\admin\model\IndexRecommend();
                $liveCateModel = new \app\common\model\LiveCate();
                // 课程购买人数
                $coursesNum = !$seriesSingleBool ? (new \app\common\model\PayOrder())->countCourseBuy($courseIds) : [];
                //系列课的单次课程数量
                $courseChildNum = $seriesBool ? $model->getChildCourseNum($courseIds, false) : [];

                $i = 1;
                foreach ($data['rows'] as $k=>$datum) {
                    if ($action == 2){
                        $actionHtml = [
                            '选择' => \app\admin\model\UrlHtml::goIndexRecommendAddUrl($datum['id'], $this->request->param('actionParam')),
                        ];
                    }else{
                        $actionHtml = [
                            '详情' => $this->urlTab('课程管理后台', '课程列表', 'details',  ['id' => $datum['id']]),
//                            $this->statusActionHtml($datum['open_status']) => [
//                                'class'       => 'action-status',
//                                'data-ids'    => $datum['id'],
//                                'data-status' => $this->getStatusHtmlDataAttr($datum['open_status']),
//                            ],
                        ];
//                        if (!$seriesBool) {//系列课不显示评论列表和推荐按钮
//                            $actionHtml['评论列表'] = $this->urlTab('课程管理后台', '课程列表', '/CourseComment/index', ['id' => $datum['id'],'courseName' => $datum['alias']]);
//                            $actionHtml['推荐'] = [
//                                'class'    => 'action-recommend',
//                                'data-id' => $datum['id'],
//                                'data-id-type' => 'courseList',
//                                'data-disabled-list' => $recommendModel->getTypeSelectMap('courseList'),
//                            ];
//                            if ($seriesSingleBool && !$seriesSingleParentOpenBool) {//系列课被屏蔽，其单次课程不显示 屏蔽/显示按钮
//                                unset($actionHtml[$this->statusActionHtml($datum['open_status'])]);
//                            }
//                        }else {
//                            $actionHtml['推荐'] = [
//                                'class'    => 'action-recommend',
//                                'data-id' => $datum['id'],
//                                'data-id-type' => 'courseList',
//                                'data-disabled-list' => $recommendModel->getTypeSelectMap('courseList'),
//                            ];
//                        }
                    }

                    if($type == 2){
                        if($datum['state'] == 1){
                            $actionHtml['退款屏蔽'] = [
                                'class'    => 'action-refund',
                                'data-id' => $datum['order_no']
                            ];
                        }elseif($datum['state'] == 3){
                            $actionHtml['线下支付'] = [
                                'class'    => '',
                            ];
                        }else{
                            $actionHtml['已退款屏蔽'] = [
                                'class'    => '',
                            ];
                        }
                    }

                    $datum['onlineNum'] = \app\admin\model\UrlHtml::goTruthUserList($datum['id'], 'course', $datum['online_num']);


                    $actionHtml = self::showOperate($actionHtml);//屏蔽
                    $formTinyint = $model->getMysqlTinyint('form');


                    $countNum = !empty($coursesNum[$datum['id']]) ? $coursesNum[$datum['id']] : 0;
                    if ($seriesBool) {//系列课程的返回内容
                        $coursePlanLinkName = (isset($courseChildNum[$datum['id']]) ? $courseChildNum[$datum['id']] : 0) . "/" .  $datum['plan_num'];
                        $nm = $datum['class_name'];
                        $result[] = [
                            'num'         => $i,
                            'ID'          => $datum['id'],
                            'name'        => $datum['class_name'],
                            'firstCate'   => $liveCateModel->getCateName($datum['liveCate']),
                            'secondCate'  => $liveCateModel->getCateName($datum['courseCate']),
                            'type'        => $model->getLevelText($datum['level']),
                            'teacherName' => $datum['alias'],//\app\admin\model\UrlHtml::goUserDetailsUrl($datum['uid'], (string)$datum['alias']),
                            'money'       => $this->redSpan($datum['price']),
                            'countNum'    => $countNum . '/' . $datum['study_num'],
                            'createTime'   => $datum['create_time'],
                            'status'      => $this->statusColumnHtml($datum['open_status']),
                            'coursePlan' => \app\admin\model\UrlHtml::goChildCourseUrl($datum['id'], $coursePlanLinkName,true),
                            'action'      => $actionHtml,
                        ];
                    }else {//单次课程的返回内容
                        $result[] = [
                            'num'         => $i,
                            'ID'          => $datum['id'],
                            'name'        => $datum['class_name'],
                            'firstCate'   => $liveCateModel->getCateName($datum['liveCate']),
                            'secondCate'  => $liveCateModel->getCateName($datum['courseCate']),
                            'type'        => $model->getLevelText($datum['level']),
                            'form'        => $formTinyint->get($datum['form']), // 课程形式
                            'teacherName' => $datum['alias'],//\app\admin\model\UrlHtml::goUserDetailsUrl($datum['uid'], (string)$datum['alias']),
                            'money'       => $this->redSpan($datum['price']),
                            'onlineCount' => $datum['onlineNum']."/".$datum['virtual_num']."/".($datum['online_num']+$datum['virtual_num']),
                            'countNum'    => !$seriesSingleBool ? $countNum . '/' . $datum['study_num'] : $datum['study_num'],
                            'beginTime'   => $datum['begin_time'],
                            'status'      => $this->statusColumnHtml($datum['open_status']),
                            'action'      => $actionHtml,
                        ];
                        if ($seriesSingleBool==true){
                            $coursename = [
                                $datum['class_name'] => $this->urlTab('课程管理后台', '课程列表', 'details',  ['id' => $datum['id']]),
                            ];
                            $result[$k]['name'] =  self::showOperate($coursename);
                        }
                    }

                    ++$i;
                }
            }

            return $this->sucJson([
                'rows' => $result,
                'total' => $data['total'],
            ]);
        }, function () use ($model, $userId, $type){
            $str = '';
            switch ($type){
                case 1:
                    $str = '直播课程数据';
                    break;
                case 2:
                    $str = '购买的课程数据';
                    break;
                case 4:
                    $str = 'Live直播推荐课程数据';
                    break;
            }
            /**
             * 判断主页课程类型定义需要的数据返回给前端
             */
            $getpid = request()->param('pid',null);
            $gettype = request()->param('type',100);
            $check = self::checkType($model,$getpid,$gettype);
            $this->userNav($userId, $str);
            $this->assign('tableOtherHtml', $this->tableOtherHtml); // 需要更新
            $this->assign('actionStatusHtml', $this->statusActionHtml(null));
            $this->assign('check', $check);
        });
    }

    private static function checkType($model,$getpid,$gettype,$decide=100)
    {
        if (!empty($getpid) && $gettype == $decide){
            $need = $model ->where('c.id',$getpid)->alias('c')
                ->join('talk_user u','c.uid = u.user_id')
                ->field('u.user_id,u.alias')
                ->find();
            $check = [
                'type'=>1,//系列子课程
                'userid'=>$need['user_id'],
                'data'=>$need['alias'],
                'pid'=>$getpid,
            ];
        }elseif ($gettype == 0 && $gettype != $decide && empty($getpid)){
            $check = [
                'type'=>2,//系列课程
                'data'=>$gettype."系列课程",
            ];
        }else{
            $check = [
                'type'=>3,//专题课程
                'data'=>'专题课程',
            ];
        }
        return $check;
    }




    /**
     * 修改直播间状态
     * @param $ids
     * @param $status
     * @return \think\response\Json
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function changeStatus($ids, $status)
    {
        $this->validateByName();

        $model = new \app\admin\model\Course();
        $model->closeStatus($ids, (int)$status);

        return $this->sucSysJson(1);
    }

    /**
     * 添加
     * @return mixed|\think\response\Json
     */
    public function add()
    {
        $model = new \app\admin\model\Course();
        if (request()->isGet())
        {
            $data = [
                'type'=>trim(request()->param('type',3)),
                'user_id'=>trim(request()->param('user_id',null)),
                'alias'=>trim(request()->param('alias',null)),
            ];
            if ($data['type'] == 1){
                $data['pid']  = trim(request()->param('pid',0));
            }
            $this->assign('data',$data);
        }
        if (request()->isPost()){
            $UserModel = new \app\admin\model\User();
            $class_name = trim(request()->param('class_name',null));
            $uid = trim(request()->param('uid/i',null));
            $level = trim(request()->param('level/i',0));
            $begin_time = trim(request()->param('begin_time',null));
            $courseType = trim(request()->param('courseType',null));
            $src_img = trim(request()->param('src_img',null));
            $src_pc_img = trim(request()->param('src_pc_img',null));
            //获取直播间ID
            $liveId = $UserModel->alias('u')
                ->join('talk_live l','u.user_id = l.user_id')
                ->where('u.user_id',$uid)
                ->field('l.id,l.user_id')
                ->find();
            //校验用户是否讲师
            if (count($liveId)<1) return $this->errSysJson(['code'=>400,'msg'=>'该用户不是讲师！']);
            //检验封面是否上传
            if (!empty($src_img)&&!empty($src_pc_img)){
                $AdsC = new Ads();
                $imgs = $AdsC->uploadImg($src_img);
                $imgs = json_decode($imgs,true);
                $imgs2 = $AdsC->uploadImg($src_img);
                $imgs2 = json_decode($imgs2,true);
                $src_img = $this->path.$imgs['key'];
                $src_pc_img = $this->path.$imgs2['key'];
            }
            //组合保存数据
            $saveData = [
                'class_name'=> $class_name,
                'uid'=>$uid,
                'live_id'=>$liveId['id'],
                'pid'=>trim(request()->param('coursePid',0)),
                'begin_time'=>$begin_time,
                'src_img'=>$src_img,
                'src_pc_img'=>$src_pc_img,
                'status'=>1,
                'open_status'=>trim(request()->param('open_status',1)),
                'create_time'=>date("Y-m-d H:i:s"),
                'type'=>$courseType,
            ];
            //判断课程类型
            if (intval($courseType) == 3){
                $saveData['type']=1;
                $isPass = trim(request()->param('isPass',null));
                if ($isPass==100){
                    $level = 1;
                    $pass = trim(request()->param('password',null));
                    if (empty($pass))return $this->errSysJson(['code'=>400,'msg'=>'密码不能为空！']);
                    $saveData['password']=$pass;
                }
            }
            if (intval($courseType) == 2){
                $plan_num = trim(request()->param('plan_num',null));
                if (empty($plan_num) || $plan_num<=0) return $this->errSysJson(['code'=>400,'msg'=>'课程安排至少大于1！']);
                $saveData['plan_num'] = intval($plan_num);
            }
            if (intval($level) == 2)
            {
                $origin_price = trim(request()->param('origin_price',null));
                $price = trim(request()->param('price',null));
                if (empty($origin_price)||empty($price)) return $this->errSysJson(['code'=>400,'msg'=>'收费课程请设置价格！']);
                if ($origin_price<=0 || $price<=0) return $this->errSysJson(['code'=>400,'msg'=>'课程费用过低！']);
                if ($origin_price<$price) return $this->errSysJson(['code'=>400,'msg'=>'原价不能低于优惠价！']);
                $saveData['origin_price']= number_format(floatval($origin_price),2);
                $saveData['price']= number_format(floatval($price),2);
            }
            $saveData['level']=$level;
            $model->db()->startTrans();
            try{
                $result=$model->save($saveData);
                // 提交事务
                $model->db()->commit();
                if ($result){
                    return $this->sucSysJson(['code'=>200,'msg'=>'课程创建成功！']);
                }else{
                    return $this->errSysJson(['code'=>400,'msg'=>'创建课程失败！']);
                }

            } catch (\Exception $e) {
                // 回滚事务
                $model->db()->rollback();
            }
        }
        return $this->fetch();
    }


    /**
     * 单次课程资料
     *
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function details($id)
    {
        $this->validateByName('common.id');
        $this->setTabNameThirdly('课程详情');
        $model = new \app\admin\model\Course();
        $request = $this->request;
        $isPost = $request->isPost();
        if ($isPost){ // 保存
            $field = 'id, live_id, cate_id, info_video_qg_id, pid, form, type';
        }else{
            $field = 'id, uid, live_id, cate_id, class_name, teacher_name, lecturers, src_img, price, info_video_qg_id, introduction_code_id,
            begin_time, create_time, level, password, brief, study_num,goal,virtual_study_num,virtual_num, pid, type, plan_num, form, origin_price,src_pc_img';
        }

        $data = $model->where(['id' => $id])->field($field)->find();

        if (empty($data)) {
            $this->error('不存在的课程');
        }


        if ($isPost) { // 保存
            $name = $request->post('name', '');
            $virtualNum = $request->post('virtualNum/i', 0);
            if (empty($name)) {
                return $this->errSysJson('课程名称不能为空');
            }
            $firstCate = $request->post('firstCate/i', 0);
            $secondCate = $request->post('secondCate/i', 0);

            if (empty($firstCate) || empty($secondCate)) {
                return $this->errSysJson('分类不能为空');
            }
            // 检测分类是否正确，分类显示会自动改写
//            $liveCateModel = new \app\admin\model\LiveCate();
//            if ($data['cate_id'] != $secondCate && !$liveCateModel->checkCate($secondCate, $firstCate)) {
//                return $this->errSysJson('分类设置错误');
//            }

            // 保存课程介绍图
            (new LiveImg())->saveImg($id, $request->post('imgList/a', []), 2);

            $level = $request->post('liveLevel/i', 0);
            $price = number_format($request->post('price/f', 0), 2, '.', '');
            $originPrice = number_format($request->post('originPrice/f', 0), 2, '.', '');
            $password = $request->post('password', '');

            if ($level == 2 && $price == 0 && $data['pid'] <= 0){
                return $this->errSysJson('收费课程必须设置价格');
            }else if ($level == 1 && empty($password)){
                return $this->errSysJson('加密课程必须设置密码');
            }

            if ($price < 1 && $price != 0) return $this->errSysJson('价格需大于等于1');
            if ($price > 999999.99 || $originPrice > 999999.99) return $this->errSysJson('价格限制6位整数，2位小数');
            if ($originPrice > 0 && $price >= $originPrice) return $this->errSysJson('原价不能比优惠价低');

            if (!empty($password) && (strlen($password) !== 4 || !preg_match('/^\w{4}$/', $password))){
                return $this->errSysJson('密码为4位数字、字母，或字母数字');
            }
            $save = [
                'uid' => $request->post('createid/i',''),
                'virtual_study_num' => abs($request->post('virtualStudyNum/i',0)),
                'virtual_num' => $virtualNum,
                'class_name' => $name,
                'level' => $level,
                'price' => abs($price),
                'origin_price' => abs($originPrice),
                'password' => $password,
                'src_img' => \helper\UrlSys::handleCourseBackImg($request->post('srcImg', '')),
                'src_pc_img' => \helper\UrlSys::handleCourseBackImg($request->post('srcPcImg', '')),
                'lecturers' => $request->post('lecturers', ''),
                'goal' => $request->post('goal', ''),
                'brief' => $request->post('brief', ''),
                'introduction_code_id' => $request->post('introductionCodeId/i', 0),
            ];
            $betgin_time = $request->post('begin_time',null);
            if (!empty($betgin_time)) $save['begin_time'] = $betgin_time;
            // 处理音频
            $audioSrc = $request->post('audioSrc', '');
            if (!empty($data['info_video_qg_id']) && empty($audioSrc)) { // 删除
                $save['info_video_qg_id'] = '';
                \think\Hook::add('response_end', function ()use($data){
                    (new \app\common\model\QiniuGallerys())->where(['id' => ['eq', $data['info_video_qg_id']]])->delete();
                });
            }


            // 更新course
            $model->update($save, ['id' => $data['id']]);

            // 更新视频课程
            if ($data['form'] == 2){
                $videoPicId = $request->post('videoPicId/i', 0);
                $videoUrlId = $request->post('videoUrlId/i', 0);

                (new \app\admin\model\CourseVideo())->saveRecord($data['id'], $videoPicId, $videoUrlId);
            }else if ($data['form'] == 3){ // ppt课程
                $pptImgList = $request->post('pptImgList/a', []);
                (new \app\wechat\model\CoursePptImg())->saveUrl($data['id'], $pptImgList);
            }

            // 更新分类
            $secondCate && $model->update(['cate_id' => $secondCate], ['id' => $data['id']]); // 更新课程分类
            (new \app\admin\model\Live())->updateLiveCate($data['live_id'], $firstCate); // 更新直播间分类

            $AdmireRpcC = new AdmireRpc();
            $AdmireRpcC->sendVirtualNum($data['id'],$virtualNum);

            return $this->sucSysJson(1);

        }else{
            $qiNiuModel = new \app\wechat\model\QiniuGallerys();
            // 主讲人名称
            $userData = (new \app\admin\model\User())->getUserColumn((array)$data['uid']);
            $data['alias'] = !empty($userData[$data['uid']]) ? \app\admin\model\UrlHtml::goUserDetailsUrl($data['uid'], $userData[$data['uid']]) : '';

            // 直播间名称
            $liveData = (new \app\admin\model\Live())->getLiveName((array)$data['live_id'], 'name, cid');
            $data['liveName'] = !empty($liveData[$data['live_id']]) ? \app\admin\model\UrlHtml::goLiveDetailsUrl($data['live_id'], $liveData[$data['live_id']]['name']) : '';

            $liveCateModel = new \app\admin\model\LiveCate();

            // 课程分类
            $data['firstCate'] = !empty($liveData[$data['live_id']]) ? $liveData[$data['live_id']]['cid'] : 0;
            $data['secondCate'] = $data['cate_id'];

            $payOrderData = (new \app\common\model\PayOrder())->countCourseBuy([$data['id']]);
            $data['buyNum'] = !empty($payOrderData[$data['id']]) ? $payOrderData[$data['id']] : 0;

            $data['src_img'] = \helper\UrlSys::handleCourseBackImg($data['src_img']);
            $data['src_pc_img'] = \helper\UrlSys::handleCourseBackImg($data['src_pc_img']);

            // 音频地址
            $data['audioSrc'] = $qiNiuModel->getQiNiuUrl($data['info_video_qg_id']);


            // 课程介绍图
            $data['imgList'] = (new LiveImg())->getImgList($data['id'], 2);


            if ($data['type'] == 2){ // 系列课
                $data['pNum'] = getDataByKey($model->getCourseNumByPIds((array)$data['id'], 0), $data['id'], 0);
                $data['planHtml'] = \app\admin\model\UrlHtml::goCourseListBeSeries($data['id'],$data['pNum'] . '/' . $data['plan_num'],true);
            }else if ($data['form'] == 2){ // 视频课程
                $videoData = (new \app\admin\model\CourseVideo())->getRecord($data['id']);

                if (!empty($videoData['video_pic_id'])){
                    $videoData['videoPicUrl'] = $qiNiuModel->getQiNiuUrl($videoData['video_pic_id']);
                }else{
                    $videoData['video_pic_id'] = 0;
                    $videoData['videoPicUrl'] = '';
                }
                // 录屏视频地址
                if (!empty($videoData['video_url_id'])){
                    $videoData['videoUrl'] = $qiNiuModel->getQiNiuUrl($videoData['video_url_id']);
                }else{
                    $videoData['video_url_id'] = 0;
                    $videoData['videoUrl'] = '';
                }
                $videoData['pushSteam'] = \app\common\model\RedirectUrl::getVideoSteam($data['uid'], $data['id']);
                $data['videoData'] = $videoData;
            }else if ($data['form'] == 3){ // ppt课程

                /** @var array $pptImgData */
                $tempPptImgData = (new \app\admin\model\CoursePptImg())->where(['course_id' => $data['id'], 'type' => 1])
                    ->order('sort desc')->select(); // 反向排序（反向插入html）
                $pptImgData = [];
                foreach ($tempPptImgData as $item) {
                    $pptImgData[] = [
                        'src' => $qiNiuModel->getUrlByKey($item['qiniuKey'], \think\Config::get('QINIU.LIVE_BUCKET')),
                        'key' => $item['qiniuKey'],
                        'sort' => $item['sort'],
                    ];
                }

                $data['pptUploadHtml'] = \qiNiu\QiNiuHtmlMulti::instance()->getUploadMultiImg($pptImgData, 27);

            }


            $this->assign('allCate', $liveCateModel->getAllCate());
            $this->assign('data', $data);
            $this->assign('levelArr', $model->getLevelText(null));
            $this->assign('srcImgHtml', $this->imgResetHtml(
                \helper\UrlSys::handleCourseBackImg($data['src_img']),
                \helper\UrlSys::handleCourseBackImg('', true)
            ));
            $this->assign('srcPcImgHtml', $this->imgResetHtml(
                \helper\UrlSys::handleCourseBackImg($data['src_pc_img']),
                \helper\UrlSys::handleCourseBackImg('', true)
            ));
        }

        return $this->fetch();
    }



    /**
     * 课程推荐弹框
     *
     * @param $id
     * @param string $idType 启用的类型，同时也是当前id的类型
     * @return mixed
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     * @internal get array disabledList 禁用列表
     * @internal get int sort 默认sort值
     */
    public function recommend($id, $idType)
    {
        $this->validateByName('common.id');
        $request = $this->request;
        /** @var \app\admin\model\IndexRecommend $model */
        $model = model('admin/IndexRecommend');
        $tinyint = $model->getMysqlTinyint('type-select');
        $selectArr = ['请选择推荐位置'] + $tinyint->getList();
        $disabledList = $request->get('disabledList/a', []);

        if ($request->isPost()){
            $sort = $request->post('sort/i', 0);
            $type = $request->post('type/i', 0);
            $disMap = $model->getTypeSelectMap($idType);
            $data = [];
            $indexType = 0;

            if (empty($sort) || $sort < 1 || empty($type) || empty($idType) || !$tinyint->existsValue($type)
                || empty($disMap) || in_array($type, $disMap)) {
                return $this->errSysJson(\app\common\controller\JsonResult::ERR_PARAMETER);
            }
            /** @var \app\admin\model\User $userModel */
            $userModel = model('admin/User');
            $field = 'u.user_id userId, u.head_add userPic, u.alias username, 
                l.id liveId, c.id courseId, v.id viewpointId';
            $userModel->alias('u')
                ->join('live l', 'l.user_id = u.user_id', 'left')
                ->join('course c', 'c.live_id = l.id and c.status <> 5', 'left')
                ->join('viewpoint v', 'v.live_id = l.id and v.status <> 2', 'left');

            switch ($idType){ //
                case 'userList': // 用户列表
                    $field .= ', u.user_id adsId';
                    $data = $userModel->where(['u.user_id' => $id])->field($field)->find();
                    $indexType = 6;
                    break;
                case 'userListFlow': // 用户列表的流量主用户
                case 'flowList': // 流量主列表
                    $field .= ', u.user_id adsId';
                    $data = $userModel->where(['u.user_id' => $id, 'u.user_level' => 3])->field($field)->find();
                    $indexType = 6;
                    break;
                case 'liveList': // 空间列表
                    $field .= ', l.id adsId';
                    $data = $userModel->where(['l.id' => $id])->field($field)->find();
                    $indexType = 3;
                    break;
                case 'courseList': // 课程列表
                    $field .= ', c.id adsId';
                    $data = $userModel->where(['c.id' => $id])->field($field)->find();
                    $indexType = 4;
                    break;
                case 'viewpointList': //观点列表
                    $field .= ', v.id adsId';
                    $data = $userModel->where(['v.id' => $id])->field($field)->find();
                    $indexType = 5;
                    break;
            }


            $this->recommendWithType($sort, $data, $indexType);


            return $this->sucSysJson(1);
        }

        $this->assign('id', $id);
        $this->assign('selectArr', $selectArr);
        $this->assign('disabledList', $disabledList);

        return $this->fetch();
    }


    /**
     * 根据type请求参数，决定添加到哪张表
     *
     * @param     $sort
     * @param     $data
     * @param int $indexType
     * @return bool
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function recommendWithType($sort, $data, $indexType = 0)
    {
        if (empty($data)) {
            return false;
        }

        /** @var \app\admin\model\IndexRecommend $model */
        $model = model('admin/IndexRecommend');
        $type = $this->request->post('type/i', 0);
        $errorFunc = function ($bool, \app\common\model\ModelBase $model){
            if ($bool !== false){
                return;
            }

            $errorMsg = $model->getError();

            $this->abortError($errorMsg);
        };


        switch ($type){
            case 1: // 首页焦点图
                $adsModel = (new \app\admin\model\Ads());
                $json = $adsModel->insertInfo($indexType, $data['adsId'], $sort);
                $data = $json->getData();
                if (isset($data['code']) && $data['code'] != 0) { // 抛出错误
                    $this->abortError($data['msg']);
                }
                break;
            case 2: // 人气直播
                if (!empty($data['userId'])) {
                    /** @var \app\admin\model\User $userModel */
                    $userModel = model('admin/User');
                    $errorFunc($model->addData(5, $data['userId'], [
                        'link' => \app\common\model\RedirectUrl::getMyInfoUrl($data['userId']),
                        'name' => $data['username'],
                        'pic' => $userModel->disUserHead($data['userPic']),
                        'sort' =>$sort,
                    ]), $model);
                }
                break;
            case 3: // 名师推荐
                if (!empty($data['liveId'])) {
                    $errorFunc($model->addData(3, $data['liveId'], [
                        'pic' => \helper\UrlSys::handleIndexTeacherBack(),
                        'sort' =>$sort,
                    ]), $model);
                }
                break;
            case 4: // 精品课程
                if (!empty($data['courseId'])) {
                    $errorFunc($model->addData(2, $data['courseId'], [
                        'sort' =>$sort,
                    ]), $model);
                }
                break;
            case 5: // 明星流量主
                if (!empty($data['userId'])) {
                    /** @var \app\admin\model\User $userModel */
                    $userModel = model('admin/User');
                    $errorFunc($model->addData(1, $data['userId'], [
                        'pic' => $userModel->disUserHead($data['userPic']),
                        'sort' =>$sort,
                    ]), $model);
                }
                break;
            case 6: // 深度阅读
                $errorFunc($model->addData(4, $data['viewpointId'], [
                    'sort' =>$sort,
                ]), $model);
                break;
            case 7: // 课程首页-焦点图
                if (!empty($data['courseId'])) {
                    $adsModel = new \app\admin\model\Ads();
                    $errorFunc(
                        $adsModel->insertByCourseId($data['courseId'], $sort, $type, $this->getAdminId(), $this->getAdminName()) !== false,
                        $adsModel
                    );
                }
                break;
            case 8:
                if (!empty($data['courseId'])) {
                    $errorFunc($model->addData(6, $data['courseId'], [
                        'sort' =>$sort,
                    ]), $model);
                }
                break;
            case 9:
                if (!empty($data['courseId'])) {
                    $errorFunc($model->addData(7, $data['courseId'], [
                        'sort' =>$sort,
                    ]), $model);
                }
                break;
        }

        return true;
    }//
    /**
     * ajax搜索用户
     *
     * @param $search
     * @return \think\response\Json
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function ajaxSearchUser($search)
    {

        $model = new \app\admin\model\User();
        $where = [];
        if (is_numeric($search)) {
            $where['user_id'] = ['eq', $search];
        }else{
            $where['alias'] = ['like', "%{$search}%"];
        }

        return $this->sucSysJson($model->where($where)->field('user_id, alias')->fetchClass('\CollectionBase')->select()->toArray());
    }

}