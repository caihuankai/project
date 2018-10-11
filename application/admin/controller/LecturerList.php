<?php

namespace app\admin\controller;


class LecturerList extends App
{

    use \app\admin\traits\Common,
        \app\admin\traits\AdminTable,
        \app\admin\traits\ImgReset,
        \app\admin\traits\Status,
        \app\admin\traits\userNav;


    /**
     * @param int $type 1为用户列表，2为流量主列表
     * @param int $action 1为普通列表，2为新增列表（有用于首页推荐新增）
     * @return mixed
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     * @internal $actionParam 给action的get参数
     */
    public function index($type = 1, $action = 1)
    {
        if ($action == 2) $this->hideNav();
        $this->setStatusValue(0, 1);

        $model = new \app\admin\model\User();
        $header = [
            ['checkbox' => true, 'value' => 1,],
            ['field' => 'num', 'title' => '序号',],
            ['field' =>'id', 'title' => 'ID',],
            ['field' => 'head_add', 'title' => '头像',],
            ['field' => 'alias', 'title' => '昵称',],
            ['field' => 'user_type', 'title' => '属性',],
            ['field' => 'tel', 'title' => '手机',],
            'create_card_name' => '邀请人',
            'popular' => '人气值',
            'subscribe_time' => '关注时间',
            'liveBool' => '个人空间',
            'courseNum' => '直播课程',
            'viewpointNum' => '发布观点',
            ['field' => 'sum', 'title' => '礼点',],
            ['field' => 'sort', 'title' => '排序',],
            ['field' => 'statusText', 'title' => '状态',],
            ['field' => 'action', 'title' => '操作',],
        ];
        $search = [
            [['options' => ['placeholder' => '讲师ID']], 'eq', 'u.user_id'],
            [['options' => ['placeholder' => '昵称']], 'like', 'u.alias'],
            [['options' => ['placeholder' => '手机']], 'eq', 'up.phone|l.mobile_phone'],
            [['options' => ['placeholder' => '开始时间']], 'dateMin-date', 'tl.register_time '],
            [['options' => ['placeholder' => '结束时间']], 'dateMax-date', 'tl.register_time'],
        ];

        if ($action != 2) { // 新增时不显示
            $this->setToolbarId('table-button-html');
        }

        $this->setTableHeader($header)
            ->setSearch($search)
            ->addAdminTableQueryParams('type', $type);


        return $this->traitAdminTableList(function ()use($type, $action){

            $model = new \app\admin\model\User();
            // 会有一个用户存在多个直播间的数据错误
            $model->group('u.user_id'); // select时才group
            $field = 'u.user_id, u.head_add, u.alias, u.user_type, u.freeze, u.income_total, u.user_level, u.vip_level,
            l.id liveId, l.name liveName, l.mobile_phone liveTel, l.popular,
            tl.register_time, uu.user_id inviteUserId, uu.alias inviteUserName, up.phone,s.sort';
//            $order = 'tl.register_time desc, u.user_id desc';
            $order = 's.sort desc';

            if ($type == 2){
                $field .= ', a.update_time register_time';
                $order = 'a.update_time desc, a.id desc, u.user_id desc';
            }

            $data = $this->traitAdminTableQuery([], function ()use($model, $type){

                if ($type == 2){ // 流量主
                    $model->where(['u.user_level' => 3]);
                    // 方便，不需要审核表有数据
                    $model->join('apply a', 'a.type = 1 and a.type_id = u.user_id and a.status = 2', 'left');
                }
                return $model->where(['u.user_id' => ['>', 0],'u.user_level' => 2])->alias('u')
                    ->join('third_login tl', 'tl.user_id = u.user_id')
                    ->join('user_phone up', 'up.user_id = u.user_id and up.type = 1', 'left')
                    ->join('live l', 'u.user_id = l.user_id', 'left')
                    ->join('user uu', 'uu.user_id = u.invite_user_id', 'left')
                    ->join('set_top s', 'u.user_id = s.target_id', 'left');
            }, $field, $order, 'DISTINCT u.user_id');


            $result = $flowList = [];

            $i = 1;
            if (!empty($data['rows'])) {
                $userIds = $fansData = $countUserBeCourseData = $viewpointData = [];
                foreach ($data['rows'] as $row) {
                    $userIds[] = $row['user_id'];
                }

                // 用户购买数
//                $countUserBuyData = (new \app\common\model\PayOrder())->countUserBuy($userIds);
                // 参与课程数
//                $countUserInCourseData = (new \app\admin\model\CourseUser())->countUserInCourse($userIds);

                $recommendModel = new \app\admin\model\IndexRecommend();
                if ($type == 2){
                    $fansData = (new \app\admin\model\Fans())->getFansNumByUserId($userIds);
                }else{
                    // 用户课程数
                    $countUserBeCourseData = $model->countUserBeCourseNum($userIds);
                    // 用户观点数
                    $viewpointData = (new \app\common\model\Viewpoint())->countByUserIds($userIds);
                };

                // 个人空间是否开通
                $liveBoolText = ['未开通', '已开通'];

                foreach ($data['rows'] as $datum) {
                    // 可以启用的类型
                    $idType = $type == 2 ? 'flowList' : ($datum['user_level'] == 3 ? 'userListFlow' : 'userList');
                    $idType = empty($datum['liveId']) && in_array($idType, ['userListFlow', 'userList'])?$idType . 'NoLive':$idType;
                    // 操作
                    if ($action == 2){ // 选择，已用于首页推荐
                        $actionHtml = !empty($datum['liveId']) ? [
                            '选择' => \app\admin\model\UrlHtml::goIndexRecommendAddUrl($datum['user_id'], $this->request->param('actionParam')),
                        ] : [];
                    }else{
                        empty($datum['sort'])? $sort = 0:$sort=$datum['sort'];
                        $actionHtml = [
                            '详情' => $this->urlTab('details', ['userId' => $datum['user_id']]),
                            '设置排序' =>  [
                                'id'=>'editSort',
                                'data-id' => $datum['user_id'],
                                'src' => "javascript:_edit({$datum['user_id']},{$sort});",
                            ],
                        ];


                    }
                    $actionHtml = self::showOperate($actionHtml);

                    $userHead = $model->disUserHead($datum['head_add']);
                    $result[] = [
                        'num' => $i,
                        'id' => $datum['user_id'],
                        'head_add' => "<img src='{$userHead}' title='{$datum['alias']}头像' style='width: 50px;' />",
                        'alias' => $datum['alias'],//\app\admin\model\UrlHtml::goUserDetailsUrl($datum['user_id'], $datum['alias']),
                        'user_type' => $model->getUserTypeText($datum['user_type']),
                        'tel' => !empty($datum['phone']) ? $datum['phone'] : $datum['liveTel'],
                        'create_card_name' => \app\admin\model\UrlHtml::goUserDetailsUrl($datum['inviteUserId'], (string)$datum['inviteUserName']), // 邀请人
                        'popular' => $datum['popular'], // 人气值
                        'subscribe_time' => $datum['register_time'], // 关注时间
                        'liveBool' => $liveBoolText[intval(!empty($datum['liveId']))], // 个人空间
                        'courseNum' => \app\admin\model\UrlHtml::goUserCourseList(
                            $datum['user_id'],
                            !empty($countUserBeCourseData[$datum['user_id']]) ? $countUserBeCourseData[$datum['user_id']] : 0
                        ), // 直播课程
                        'viewpointNum' => \app\admin\model\UrlHtml::goViewpointListHtml(
                            $datum['user_id'],
                            !empty($viewpointData[$datum['user_id']]) ? $viewpointData[$datum['user_id']] : 0
                        ), // 发布观点
                        'sum' => $this->redSpan($datum['income_total']), // 收益
                        'statusText' => $this->statusColumnHtml($datum['freeze']),
                        'sort'=>$datum['sort'],
                        'freeze' => $datum['freeze'],
                        'action' => $actionHtml,
                    ];

                    ++$i;
                }
            }


            return $this->sucJson(['rows' => $result, 'total' => $data['total']]);
        }, function (){
            $this->assign('freezeHtml', $this->statusActionHtml(null));
        });
    }
    /**
     * 用户详情
     *
     * @param $userId
     * @return mixed
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function details($userId)
    {
        $this->setTabNameThirdly('用户详情');
        $field = 'u.user_id, u.head_add, u.alias, u.user_level, u.user_type, u.register_date, u.invite_user_id,u.lobby_img, u.income_total, u.intro, u.password,
        u.account_balance, u.consume_total, u.assistant_code_id, u.introduction_code_id, u.viewpoint_week_price, u.user_text, u.vip_level, tl.login_tel,
        l.name liveName, l.id liveId, l.focus_num, l.img liveImg, l.background_img liveBackImg, l.popular,
         a.apply_time applyTime, up.phone,
        uu.alias inviteAlias, uu.user_id inviteUserId, count(hr.userId) courseUserNum';
        $userModel = new \app\admin\model\User();
        $data = $userModel->where(['u.user_id' => (int)$userId])->alias('u')
            ->join('third_login tl', 'tl.user_id = u.user_id', 'left')
            ->join('user_phone up', 'up.user_id = u.user_id and up.type = 1', 'left')
            ->join('live l', 'l.user_id = u.user_id', 'left')
            ->join('user uu', 'u.invite_user_id = uu.user_id', 'left')
            ->join('hit_record hr', 'hr.userId = u.user_id and hr.hitRecordType = 1', 'left') // 参与课程
            ->join('apply a', 'a.type = 1 and a.type_id = u.user_id and a.status = 2', 'left')
            ->field($field)->find();

        if (empty($data)) {
            $this->error('用户不存在');
        }
        $userArr = [$data['user_id']];
        $payOrderModel = new \app\common\model\PayOrder();
        $vipLevelTinyint = $userModel->getMysqlTinyint('vip_level');

        // 邀请人
        $data['inviteAlias'] = "<span class='invite-alias'>{$data['inviteAlias']}</span>（ID：<span class='invite-user-id'>{$data['inviteUserId']}</span>）";

        // 获取微信关注时间
        $weChatDate = (new \app\admin\model\ThirdLogin())->getWeChatRegisterDate($userArr);
        $data['weChatDate'] = !empty($weChatDate[$data['user_id']]) && $weChatDate[$data['user_id']] != '0000-00-00 00:00:00' ?
            $weChatDate[$data['user_id']] : '';

        // 用户头像
        $data['head_add'] = $userModel->disUserHead($data['head_add']);
        // 用户地址
        $addrData = (new \app\common\model\UserAddr())->getUserAddr($userArr);
        $data['addr'] = !empty($addrData[$data['user_id']]) ? $addrData[$data['user_id']]['merger_name'] : '';
//        // 用户等级
//        if ($data['user_type'] == 2){ // 马甲可修改等级
//            $data['vipLevelText'] = \helper\Html::select([0 => '无'] + $vipLevelTinyint->getList(), $data['vip_level'], 'vip-level');
//        }else{ // 直接文字
//            $data['vipLevelText'] = $this->redSpan($vipLevelTinyint->get($data['vip_level']));
//        }


        // 参与课程数
//        $data['courseUserNum'] = \app\admin\model\User::adminUserCourseHtml(
//            $data['user_id'], 2, $data['courseUserNum']
//        );

        $liveModel = new \app\admin\model\Live();
        // 直播间内课程数
        $inviteNum = $liveModel->getLiveCourseNum($data['liveId'], 'count(c.id) courseNum');
        $data['courseNum'] = \app\admin\model\UrlHtml::goUserCourseList(
            $data['user_id'], !empty($inviteNum) ? $inviteNum['courseNum'] : 0
        ); // 直播间内课程数


        $data['liveMoneyText'] = \app\admin\model\UrlHtml::goRcbLogList($data['user_id']); // 收益明细链接

        // 邀请数（邀请粉丝）
        $inviteCount = (new \app\common\model\Fans())->getFansNumByUserId((array)$data['user_id']);
        $data['inviteNum'] = \app\admin\model\UrlHtml::goUserFansList(
            $data['user_id'], 2,
            !empty($inviteCount[$data['user_id']]) ? $inviteCount[$data['user_id']] : 0
        );

        // 直播间url
        $data['liveUrl'] = \app\common\model\RedirectUrl::getMyInfoUrl($data['user_id']);
        // 关注数
        $data['focus_num'] = \app\admin\model\UrlHtml::goUserFansList($data['user_id'], 1, $data['focus_num']);
        // 发布观点
        $data['viewpointNum'] = \app\admin\model\UrlHtml::goViewpointListHtml(
            $data['user_id'],
            getDataByKey((new \app\common\model\Viewpoint())->countByUserIds((array)$data['user_id']), $data['user_id'], 0)
        );


        // 助教微信图片
        $data['assistantWeChatImg'] = (new \app\admin\model\QiniuGallerys())->getImgForQR($data['assistant_code_id']);

        // 观点包周价格
        $data['userViewpointWeekPriceUrl'] = \app\admin\model\UrlHtml::goUserBuyViewpointWeekUrl($data['user_id']);

        // 购买课程
        $countUserBuy = $payOrderModel->countUserBuy([$data['user_id']], 'all');
        $data['courseBuyNum'] = \app\admin\model\UrlHtml::goUserCourseList(
            $data['user_id'],
            (new \app\admin\model\PayOrder())->courseCount($data['user_id']),
            2
        );
        // 购买观点数
        $data['viewpointBuyNum'] = \app\admin\model\UrlHtml::goViewpointListHtml(
            $data['user_id'],
            !empty($countUserBuy[$data['user_id']]) ? $countUserBuy[$data['user_id']]['viewpointNum'] : 0,
            2
        );
        // 购买系列课
        $data['seriesCourseBuyNum'] = \app\admin\model\UrlHtml::goSeriesCourseListHtml(
            $data['user_id'],
            (new \app\admin\model\PayOrder())->seriesCourseCount($data['user_id']),
            2
        );
        // 购买包周数
        $data['viewpointServiceBuyNum'] = \app\admin\model\UrlHtml::goViewpointServiceHtml(
            $data['user_id'],(new \app\admin\model\PayOrder())->viewpointServiceCount(0,0,null,null,null,null,null,$data['user_id'])
            ,
            2
        );
        // live打赏
        $data['admireBuyNum'] = \app\admin\model\UrlHtml::goAdmireList(
            $data['user_id'],
            (new \app\admin\model\PayOrder())->admireCount(0,0,null,null,null,null,null,$data['user_id'],null,null,null)
        );

        $data['imgList'] = (new \app\admin\model\LiveImg())->getImgList($data['user_id'], 3);

        // user_text字段
        $userTextData = [];
        try{
            $userTextData = !empty($data['user_text']) ? json_decode($data['user_text'], true) : '';
        }catch (\Exception $exception){

        }
        $data['userTextForte'] = isset($userTextData['forte']) ? $userTextData['forte'] : '';
        $data['userTextBrief'] = isset($userTextData['brief']) ? $userTextData['brief'] : '';


        //收藏课程
        $data['keepCourseCount'] = \think\Db::table('talk.talk_course_keep')->where('user_id',$data['user_id'])->count();
        $data['keepCourse'] = $data['keepCourseCount']? \app\admin\model\UrlHtml::goCourseKeepHtml($data['user_id'], $data['keepCourseCount'], $data['alias']):0;

        $this->assign('data', $data);

        //属性列表
        $this->assign('userTypeArr', $userModel->getUserTypeText(null));

        return $this->fetch();
    }

    /**
     * @param $a
     * @param $b
     * @param array ...$args
     * @return string
     */
    protected function urlTab($a, $b, ...$args)
    {
        $args = [$a, $b] + $args;
        return parent::urlTab('用户管理', '用户列表', ...$args);
    }

    /**
     * 设置排序
     * @param $id
     * @param $sort
     * @return \think\response\Json
     */
    public function edit($id,$sort)
    {
        if (empty($id)||empty($sort)) return $this->errSysJson(['code'=>400],'请填写排序值！');
        $model = new \app\admin\model\SetTop();
        $saveData = [
            'type'=>2,
            'target_id'=>$id,
            'sort'=>$sort,
            'create_time'=>date('Y-m-d H:i:s'),
            'operatorName'=>$_SESSION['adminSess']['admin']['username'],
            'operatorId'=>$_SESSION['adminSess']['admin']['id'],
        ];
        $validate = $model->where(['target_id'=>$id,'type'=>2])->field('id')->find();
        if (count($validate)>0){
            $saveData['update_time']=date('Y-m-d H:i:s');
            $result = $model->save($saveData,['id'=>$validate['id']]);
        }else{
            $result = $model->save($saveData);
        }
        if ($result){
            return $this->sucSysJson(['code'=>200],'设置成功！');
        }else{
            return $this->sucSysJson(['code'=>400],'设置失败！');
        }
    }//end

}