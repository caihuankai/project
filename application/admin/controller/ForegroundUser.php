<?php

namespace app\admin\controller;


class ForegroundUser extends App
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
            'fansNum' => '邀请粉丝',
            'liveBool' => '个人空间',
            'courseNum' => '直播课程',
            'viewpointNum' => '发布观点',
            ['field' => 'sum', 'title' => '礼点',],
            ['field' => 'statusText', 'title' => '状态',],
            ['field' => 'action', 'title' => '操作',],
        ];
        $search = [
            [['options' => ['placeholder' => '昵称']], 'like', 'u.alias'],
            [['options' => ['placeholder' => '用户ID']], 'eq', 'u.user_id'],
            [['options' => ['placeholder' => '手机']], 'eq', 'up.phone|l.mobile_phone'],
            [['options' => ['placeholder' => '邀请人']], 'like', 'uu.alias'],
            [['options' => ['placeholder' => '开始时间']], 'dateMin-date', 'tl.register_time '],
            [['options' => ['placeholder' => '结束时间']], 'dateMax-date', 'tl.register_time'],
            [['options' => ['data' => ['角色', '老师', '助教', '学生', '流量主']], 'name' => 'table-search-role'], 'select', ],
            [['options' => ['data' => ['个人空间', '已开通', '未开通']], 'name' => 'table-search-exists-live'], 'select', ],
            [['options' => [
                'data' => ['全部用户'] +
                    $model->getMysqlTinyint('user_type')->getList(\helper\Tinyint::TITLE, 'search-attr'),
//                    $model->getMysqlTinyint('vip_level')->getList(\helper\Tinyint::TITLE, 'search-attr'),
                'label' => '属性', 'name' => 'table-search-user',
            ]], 'select', ],
            [['options' => ['data' => ['-1' => '状态'] + $this->searchStatusArr()]], 'select-zero', 'u.freeze', 'intval'],
        ];
        if ($type == 2){ // 流量主
            $header['subscribe_time'] = '邀请时间';
            unset($header['liveBool'], $header['courseNum'], $header['viewpointNum'], $header['popular'], $header['create_card_name'],
                $search[2], $search[5]);
        }else{
            unset($header['fansNum']);
        }
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
            tl.register_time, uu.user_id inviteUserId, uu.alias inviteUserName, up.phone';
            $order = 'tl.register_time desc, u.user_id desc';
            
            if ($type == 2){
                $field .= ', a.update_time register_time';
                $order = 'a.update_time desc, a.id desc, u.user_id desc';
            }
            
            $data = $this->traitAdminTableQuery([], function ()use($model, $type){
                $bool = $this->request->param('table-search-exists-live');
                $role = $this->request->param('table-search-role');
                $searchUser = $this->request->param('table-search-user/i', 0);
                if ($bool == 1){
                    $model->where(['l.id' => ['>', 0]]);
                }else if ($bool == 2){ // is null 可能会慢
                    $model->where('l.id is null');
                }
                
                // 用户（属性）搜索
                if (empty($searchUser)){ // 空
                
                }else if ($model->getMysqlTinyint('user_type')->existsActionValue($searchUser, 'search-attr')){
                    $model->where(['u.user_type' => $model->getMysqlTinyint('user_type')->getValueByActionValue($searchUser, 'search-attr')]);
                }else if ($model->getMysqlTinyint('vip_level')->existsActionValue($searchUser, 'search-attr')){
                    $model->where('u.vip_level','>=',1);
                }
                
                // 角色搜索
                switch ($role){
                    case 1: // 老师
                        $model->where(['u.user_level' => 2]);break;
                    case 2: // 助教
                        $model->where(['u.is_assistant' => 1]);break;
                    case 3: // 学生
                        $model->where(['u.user_level' => 1]);break;
                    case 4: // 流量主
                        $model->where(['u.user_level' => 3]);break;
                }
                
                if ($type == 2){ // 流量主
                    $model->where(['u.user_level' => 3]);
                    // 方便，不需要审核表有数据
                    $model->join('apply a', 'a.type = 1 and a.type_id = u.user_id and a.status = 2', 'left');
                }
                
                return $model->where(['u.user_id' => ['>', 0]])->alias('u')
                    ->join('third_login tl', 'tl.user_id = u.user_id')
                    ->join('user_phone up', 'up.user_id = u.user_id and up.type = 1', 'left')
                    ->join('live l', 'u.user_id = l.user_id', 'left')
                    ->join('user uu', 'uu.user_id = u.invite_user_id', 'left');
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
                        $actionHtml = [
                            '详情' => $this->urlTab('details', ['userId' => $datum['user_id']]),
                            $this->statusActionHtml($datum['freeze']) => [
                                'class' => 'changeFreeze',
                                'data-ids' => $datum['user_id'],
                                'data-status' => intval(!$datum['freeze'])
                            ],
                            '推荐' => [
                                'class' => 'recommend-user-flow',
                                'data-id' => $datum['user_id'],
                                'data-id-type' => $idType,
                                'data-disabled-list' => $recommendModel->getTypeSelectMap($idType),
                            ],
                        ];
                        
                        if ($datum['user_level'] == 2){ // 只有老师才能有助教功能
                            $actionHtml['助教'] = $this->urlTab('UserAssistant/index', ['userId' => $datum['user_id']]);
                        }
                    }
                    $actionHtml = self::showOperate($actionHtml);
                    
                    $userHead = $model->disUserHead($datum['head_add']);
                    $result[] = [
                        'num' => $i,
                        'id' => $datum['user_id'],
                        'head_add' => "<img src='{$userHead}' title='{$datum['alias']}头像' style='width: 50px;' />",
                        'alias' => \app\admin\model\UrlHtml::goUserDetailsUrl($datum['user_id'], $datum['alias']),
                        'user_type' => $model->getUserTypeText($datum['user_type']),
                        'tel' => !empty($datum['phone']) ? $datum['phone'] : $datum['liveTel'],
                        'create_card_name' => \app\admin\model\UrlHtml::goUserDetailsUrl($datum['inviteUserId'], (string)$datum['inviteUserName']), // 邀请人
                        'popular' => $datum['popular'], // 人气值
                        'subscribe_time' => $datum['register_time'], // 关注时间
                        'fansNum' => getDataByKey($fansData, $datum['user_id'], 0), // 邀请粉丝数 （目前只在流量主中显示）
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
     * 修改用户状态
     *
     * @param $ids
     * @param $status
     * @return \think\response\Json
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function changeFreeze($ids, $status)
    {
        $this->validateByName();
    
        if (!empty($ids)) {
            $status = (int)$status;
            $ids = (array)$ids;
            $model = new \app\admin\model\User();
            $model->closeStatus($ids, $status);
            
            // 处理前台的用户登录状态
            foreach ($ids as $id) {
                $model->handleWeChatCheckUserStatus($id, $status);
            }
        }
        
        return $this->sucSysJson(1);
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
        $field = 'u.user_id, u.head_add, u.alias, u.user_level, u.user_type, u.register_date, u.invite_user_id,u.lobby_img,u.live_head_add, u.income_total, u.intro, u.password,
        u.account_balance, u.consume_total, u.assistant_code_id, u.introduction_code_id,u.introduction_img_id, u.viewpoint_week_price, u.user_text, u.vip_level, tl.login_tel,
        l.name liveName, l.id liveId, l.focus_num, l.virtual_focus_num, l.img liveImg, l.background_img liveBackImg, l.popular,
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
        //介绍视频封面
        $qiNiuModel = new \app\wechat\model\QiniuGallerys();
        $data['introduction_img_url'] = $qiNiuModel->getQiNiuUrl($data['introduction_img_id']);

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
        $model = new \app\admin\model\LiveFocus();
        $realFocusNum = $model->where('live_id', $data['liveId'])->where('target', 1)->where('robot', 2)->count();
        $data['real_focus_num'] = \app\admin\model\UrlHtml::goUserFansList($data['user_id'], 1, $realFocusNum);
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
        $data['courseBuySpecialNum'] = \app\admin\model\UrlHtml::goUserCourseList(
            $data['user_id'],
            (new \app\admin\model\PayOrder())->courseSpecialCount($data['user_id']),
            2,3
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
    
    
    /**
     * 修改用户的邀请人
     *
     * @param int $id 当前详情的用户
     * @param int $userId 邀请人id
     * @return \think\response\Json
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function changeInviteUserId($id, $userId)
    {
        $this->validateByName('common.id');
        $this->validateByName('common.userId');
        
        $model = new \app\admin\model\User();
        $userData = $model->where(['u.user_id' => $id])->alias('u')
            ->join('third_login tl', 'tl.user_id = u.user_id')->field('u.invite_user_id, tl.open_id')->find();
        
        $inviteUserData = getDataByKey($model->getUserColumn((array)$userId, 'user_id, user_level'), $userId, 0);
        
        if (empty($userData) || empty($inviteUserData)) {
            return $this->errSysJson(\app\common\controller\JsonResult::ERR_USERINFO_NULL);
        }
    
        \think\Db::transaction(function ()use($model, $userData, $id, $userId, $inviteUserData){
            $model->update([
                'invite_user_id' => $userId,
            ], ['user_id' => $id]);
    
            if (!empty($userData['open_id'])) { // 处理fans表，删除原有fans逻辑，重新创建
                $fansModel = new \app\admin\model\Fans();
                $fansModel->where(['open_id' => $userData['open_id'], 'invita_userid' => $userData['invite_user_id']])->delete();
                
                if ($inviteUserData['user_level'] != 1){
                    // 设置的邀请人是学生就不新增fans关系
                    $fansModel->insert([
                        'open_id' => $userData['open_id'],
                        'invita_userid' => $userId,
                    ]);
                }
            }
        });

        
        return $this->sucSysJson(1);
    }
    /**
     * 上传介绍页图片
     * @param $userId
     * @return \think\response\Json
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function uploadUserImg()
    {
        if (request()->isPost()){
            $usermodel = new \app\admin\model\User();
            $img = trim(request()->param('img',null));
            $id = trim(request()->param('id',null));
            $param =trim(request()->param('param',null));
            if (empty($id)||empty($img))  return $this->errSysJson('缺少必填参数！');
            $AdsC = new Ads();
            $imgs = $AdsC->uploadImg($img);
            $imgs = json_decode($imgs,true);
            $pathimg = "http://oqt46pvmm.bkt.clouddn.com/".$imgs['key'];
            $result = $usermodel->save([$param=>$pathimg],['user_id'=>$id]);
            if ($result){
                return $this->sucSysJson($result,'提交成功');
            }else{
                return $this->errSysJson('提交失败，请重新提交！');
            }
        }else{
            return $this->errSysJson('提交方式出错！');
        }
    }
    
    /**
     * 保存数据
     *
     * @param $userId
     * @return \think\response\Json
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function saveData($userId)
    {
        $this->validateByName('common.userId');
        $userId = intval($userId);
    
        $model = new \app\admin\model\User();
        $userData = $model->where(['user_id' => $userId])->field('user_id, tel, user_level, vip_level, user_type, is_assistant, assistant_code_id')->find();
        $password = $this->request->post('password', '');
        $assistantWeChatImg = $this->request->post('assistantWeChatImg', '');
        $tel = $this->request->post('tel');
        $vipLevel = $this->request->post('vipLevel/i', -1);
        $virtualFocusNum = $this->request->post('virtualFocusNum', 0);
        $result = 1;
        
        if (empty($userData)){
            return $this->errSysJson(\app\common\controller\JsonResult::ERR_USERINFO_NULL);
        }
        
        $userId = $userData['user_id'];
        $userType = $this->request->post('userType'); // 用户类型 1：正式用户,2：马甲
        $save = [
            'intro' => (string)$this->request->post('intro'),
        	'user_type' => $userType,
        ];
        if ($userType == 1 && $userData['user_type'] == 2) {
        	$save['account_balance'] = 0;
        	$result = 2;
        }elseif ($userType == 2) {
        	if (
        	    $userData['user_level'] != 1 || $userData['is_assistant'] == 1 ||
                (new \app\admin\model\InvitationcardUser())->ifHonoredGuest($userId)
            ) {
                return $this->errSysJson('只有学生才能设置马甲'); // 产品觉得用户其他权限都叫身份，但又可并列，然后其中一个叫学生
            }
        }
        
        // 马甲的vip等级
        if (($userData['user_type'] == 2 || $userType == 2) && $vipLevel >= 0){
            $save['vip_level'] = $vipLevel;
        }
        
        if (!empty($password) && $password !== '***'){
            $save['password'] = $model->encryptPassword($password);
        }
        
        // 手机号
        $checkTelBool = $model->checkUserTel($tel, $userId);
        if ($checkTelBool === 3){
            return $this->errSysJson(\app\common\controller\JsonResult::ERR_TEL_IS_REGISTER);
        }else if ($checkTelBool === 4){
            return $this->errSysJson(\app\common\controller\JsonResult::ERR_PHONE);
        }else if ($checkTelBool <= 1){ // 可写入
            (new \app\admin\model\UserPhone())->savePhone($userId, 1, $tel);
        }
        
        //虚拟关注数
        (new \app\admin\model\Live())->update(['virtual_focus_num'=>$virtualFocusNum], ['user_id' => $userId]);
        
        // 个人介绍视频及封面
        $save['introduction_code_id'] = $this->request->post('introductionCodeId/i', 0);
        $save['introduction_img_id'] = $this->request->post('introductionImgId/i', 0);
        $save['viewpoint_week_price'] = number_format($this->request->post('viewpointWeekPrice', 0), 2, '.', '');
        // 保存微信图片
        if (empty($assistantWeChatImg) && $userData['assistant_code_id']) { // 删除
            $save['assistant_code_id'] = 0;
            (new \app\admin\model\QiniuGallerys())->where(['id' => $userData['assistant_code_id']])->delete();
        }else if (!empty($assistantWeChatImg)){
            $save['assistant_code_id'] = (new \app\admin\model\QiniuGallerys())->saveQiNiuUrl(
                $assistantWeChatImg, 5, $userData['assistant_code_id'], $this->getAdminId()
            );
        }
        
        // user_text字段
        $userText = $this->request->post('userText/a', []);
        $xss = new \voku\helper\AntiXSS();
        $save['user_text'] = json_encode($xss->xss_clean($userText));
    
        $model->update($save, ['user_id' => $userId]);
        
        (new \app\admin\model\LiveImg())->saveImg($userId, $this->request->post('imgList/a', []), 3);
        
        return $this->sucSysJson($result);
    }
    
    
    
    
    
    /**
     * 流量主列表
     *
     * @return mixed
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function flowUserList()
    {
        $model = new \app\admin\model\User();
    
        $this->setTableHeader([
            ['checkbox' => true, 'value' => 1,],
            'num' => '序号',
            'id' => 'ID',
            'pic' => '头像',
            'alias' => '昵称',
            'phone' => '手机',
            'updateTime' => '申请时间',
            'fansNum' => '邀请粉丝',
            'income' => '礼点（单位：元）',
            'status' => '状态',
            'action' => '操作',
        ])
            ->setToolbarId('table-button-html')
            ->setStatusValue(0, 1)
            ->setSearch([
                [['options' => ['placeholder' => '昵称']], 'like', 'u.alias'],
                [['options' => ['placeholder' => '手机']], 'eq', 'u.tel'],
                [['options' => ['placeholder' => '开始时间']], 'dateMin', 'a.update_time'],
                [['options' => ['placeholder' => '结束时间']], 'dateMax', 'a.update_time'],
                [['options' => ['data' => ['-1' => '状态'] + $this->searchStatusArr()]], 'select-zero', 'u.freeze', 'intval'],
            ]);
    
    
        return $this->traitAdminTableList(function ()use($model){
        
            $field = 'a.update_time, u.user_id, u.alias, u.head_add, u.freeze, u.tel, u.income_total';
        
            $data = $this->traitAdminTableQuery([], function ()use ($model){
                $model->alias('u')->join('apply a', 'a.type_id = u.user_id and a.type = 1 and a.status = 2');
            
                return $model;
            }, $field, 'a.update_time desc');
        
            $result = $userIds = [];
            $i = 1;
    
    
            foreach ($data['rows'] as $item) {
                $userIds[] = $item['user_id'];
            }
            
    
            // 邀请粉丝数
            $inviteCount = (new \app\admin\model\Fans())->getFansNumByUserId($userIds);
        
            foreach ($data['rows'] as $datum) {
                $action = self::showOperate([
                    '详情' => $this->urlTab('details', ['userId' => $datum['user_id']]),
                    $this->statusActionHtml($datum['freeze']) => [
                        'class' => 'changeFreeze',
                        'data-ids' => $datum['user_id'],
                        'data-status' => $this->getStatusHtmlDataAttr($datum['freeze'])
                    ],
                ]);
    
                $userHead = $model->disUserHead($datum['head_add']);
                $result[] = [
                    'num'        => $i,
                    'id'         => $datum['user_id'],
                    'pic'        => "<img src='{$userHead}' title='{$datum['alias']}头像' style='width: 50px;' />",
                    'alias'      => \app\admin\model\UrlHtml::goUserDetailsUrl($datum['user_id'], $datum['alias']),
                    'phone'      => $datum['tel'],
                    'updateTime' => $datum['update_time'],
                    'fansNum'    => \app\admin\model\UrlHtml::goUserFansList( // 邀请粉丝
                        $datum['user_id'], 2,
                        !empty($inviteCount[$datum['user_id']]) ? $inviteCount[$datum['user_id']] : 0
                    ),
                    'income'     => $this->redSpan($datum['income_total']),
                    'status'     => $this->statusColumnHtml($datum['freeze']),
                    'action'     => $action,
                ];
            
                ++$i;
            }
        
            return $this->sucJson([
                'rows' => $result,
                'total' => $data['total'],
            ]);
        });
        
    }
    
    
    /**
     * 粉丝列表|关注列表
     *
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function userFansList($userId = 0, $type = 1)
    {
        $userId = intval($userId);
        $type = intval($type);
        $tabName = $type == 2 ? '邀请粉丝' : '关注';
        $this->setTabNameThirdly($tabName);
        $model = new \app\admin\model\User();
    
        $this->setTableHeader([
            ['checkbox' => true, 'value' => 1,],
            'num' => '序号',
            'id' => 'ID',
            'pic' => '头像',
            'alias' => '昵称',
            'phone' => '手机',
            
            'popularity' => '人气值',
            'fansTime' => '邀请时间',
            'liveBool' => '个人空间',
            'courseNum' => '直播课程',
            'viewpointNum' => '发布观点',
            
            'income' => '礼点（单位：元）',
            'status' => '状态',
            'action' => '操作',
        ])
            ->setToolbarId('table-button-html')
            ->setStatusValue(0, 1);
        $userData = $this->userNav($userId, $tabName . '数据');
    
        return $this->traitAdminTableList(function ()use($model, $userData, $type){
            $result = $userIds = [];
            $total = 0;
            if (empty($userData['user_id'])) {
                goto noData;
            }
            
        
            
            
            if ($type == 2){ // 邀请粉丝
                $field = 'u.user_id, u.alias, u.head_add, u.freeze, u.tel, u.income_total, l.id liveId, l.popular, f.create_time';
                $order = 'f.create_time desc';
                $func = function ()use ($userData){
                    $fansModel = new \app\admin\model\Fans();
                    $fansModel->alias('f');
    
                    $fansModel->join('third_login tl', 'tl.open_id = f.open_id')
                        ->join('user u', 'u.user_id = tl.user_id')
                        ->join('live l', 'l.user_id = u.user_id', 'left')
                        ->where(['f.invita_userid' => $userData['user_id']]);
    
                    if ($userData['user_level'] == 3){ // 流量主关联申请表
                        $fansModel->join('apply a', 'a.type_id = u.user_id and a.type = 1 and a.status = 2');
                    }
    
                    return $fansModel;
                };
            }else{ // 关注
                $field = 'uu.user_id, uu.alias, uu.head_add, uu.freeze, uu.tel, uu.income_total, ll.id liveId, ll.popular, lf.create_time';
                $order = 'lf.create_time desc';
                $func = function ()use ($userData){
                    $model = new \app\admin\model\LiveFocus();
                    $model->alias('lf');
                    
                    $model->join('live l', 'l.id = lf.live_id and lf.robot = 2') // 不包含僵尸粉
                        ->join('user u', 'u.user_id = l.user_id')
                        ->join('user uu', 'uu.user_id = lf.user_id')
                        ->join('live ll', 'll.user_id = uu.user_id','left')
                    ->where(['u.user_id' => $userData['user_id']]);
                    
                    return $model;
                };
            }
            
            
        
            $data = $this->traitAdminTableQuery([], $func, $field, $order);
        
            $i = 1;
        
        
            foreach ($data['rows'] as $item) {
                $userIds[] = $item['user_id'];
            }

            // 个人空间是否开通
            $liveBoolText = ['未开通', '已开通'];
            // 用户课程数
            $countUserBeCourseData = $model->countUserBeCourseNum($userIds);
            // 用户观点数
            $viewpointData = (new \app\common\model\Viewpoint())->countByUserIds($userIds);
        
            foreach ($data['rows'] as $datum) {
                $action = self::showOperate([
                    '详情' => $this->urlTab('details', ['userId' => $datum['user_id']]),
                    $this->statusActionHtml($datum['freeze']) => [
                        'class' => 'changeFreeze',
                        'data-ids' => $datum['user_id'],
                        'data-status' => $this->getStatusHtmlDataAttr($datum['freeze'])
                    ],
                ]);
            
                $userHead = $model->disUserHead($datum['head_add']);
                $result[] = [
                    'num'        => $i,
                    'id'         => $datum['user_id'],
                    'pic'        => "<img src='{$userHead}' title='{$datum['alias']}头像' style='width: 50px;' />",
                    'alias'      => \app\admin\model\UrlHtml::goUserDetailsUrl($datum['user_id'], $datum['alias']),
                    'phone'      => $datum['tel'],
                    
                    
                    'popularity' => intval($datum['popular']),
                    
                    'fansTime' => $datum['create_time'],
                    'liveBool' => $liveBoolText[intval(!empty($datum['liveId']))],
                    'courseNum' => \app\admin\model\UrlHtml::goUserCourseList(
                        $datum['user_id'],
                        !empty($countUserBeCourseData[$datum['user_id']]) ? $countUserBeCourseData[$datum['user_id']] : 0
                    ), // 直播课程
                    'viewpointNum' => \app\admin\model\UrlHtml::goViewpointListHtml(
                        $datum['user_id'],
                        !empty($viewpointData[$datum['user_id']]) ? $viewpointData[$datum['user_id']] : 0
                    ),
                    
                    
                    'income'     => $this->redSpan($datum['income_total']), // 显示粉丝的所有收益
                    'status'     => $this->statusColumnHtml($datum['freeze']),
                    'action'     => $action,
                ];
            
                ++$i;
            }
            $total = $data['total'];
        
            noData:;
    
            return $this->sucJson([
                'rows' => $result,
                'total' => $total,
            ]);
        }, function ()use ($model, $userData){
            
            $this->assign('userData', $userData);
        });
        
        
    }
    
    /**
     * 设置虚拟礼点
     * @param unknown $userId
     * @return \think\response\Json|mixed|string
     */
    public function setVirtualAccountBalance($userId)
    {
    	$userModel = new \app\admin\model\User();
    	$request = $this->request;
    	if ($request->isPost()) {
    		$virtualAccountBalance= $request->post('virtualAccountBalance/i', 0);
    		$userInfo = $userModel->where('user_id', $userId)->find();
    		if (empty($userInfo)) {
    			return $this->errSysJson('用户信息不存在');
    		}elseif ($userInfo['user_type'] != 2) {
    			return $this->errSysJson('用户不为马甲，不能设置虚拟礼点');
    		}elseif ($virtualAccountBalance <= 0) {
    			return $this->errSysJson('虚拟礼点必须填写且大于0');
    		}
    		
    		$result = $userModel->where('user_id', $userId)->update(['account_balance'=>$virtualAccountBalance]);
    		if ($result > 0) {
    			return $this->sucSysJson("设置虚拟礼点成功");
    		}else {
    			return $this->errSysJson("设置虚拟礼点失败");
    		}
    	}
    	
    	$this->assign('userId', $userId);
    	return $this->fetch();
    }
    
    
    
    
    
    
    
    protected function urlTab($a, $b, ...$args)
    {
        $args = [$a, $b] + $args;
        return parent::urlTab('用户管理', '用户列表', ...$args);
    }
    
    
    /**
     * 直播间和课程的真实用户列表
     *
     * @param $id
     * @param $type
     * @return mixed
     * @author aozhuochao
     */
    public function truthUserList($id, $type)
    {
        $id = intval($id);
    
        $model = new \app\admin\model\User();
        $typeTinyint = $model->getMysqlTinyint('user_type');
    
        $this->setTableHeader([
            'id' => 'ID',
            'pic' => '头像',
            'alias' => '昵称',
            'userType' => '属性',
        ])
            ->setSearch([
                [['options' => ['placeholder' => '昵称']], 'like', 'u.alias'],
                [['options' => [
                    'data' => [0 => '属性', -1 => 'VIP会员'] + $typeTinyint->getList()], 'name' => 'user-attr',
                ], 'select'],
            ])
            ->setExport(true);
    
    
        return $this->traitAdminTableList(function ()use($model, $id, $type, $typeTinyint){
            
            // 1000000000
            // redis拿数据
            $liveModel = new \app\admin\model\Live();
            $redisKey = $liveModel->getRoomRedisKey($liveModel->getRoomIdByType($id, $type));
            $redisData = \CacheBase::redis()->SMEMBERS($redisKey);
            $redisData = empty($redisData) ? [] : $redisData;
        
            $field = 'u.user_id, u.alias, u.head_add, u.user_type, u.vip_level';
        
            $data = $this->traitAdminTableQuery([], function ()use ($model, $redisData, $typeTinyint){
                $userAttr = intval($this->request->param('user-attr', 0));
                
                if ($userAttr === -1){ // 搜vip
                    $model->where(['u.vip_level' => ['>', 0]]);
                }else if ($typeTinyint->existsValue($userAttr)){ // 搜索user_type
                    $model->where(['u.user_type' => $userAttr, 'u.vip_level' => ['eq', 0]]);
                }
    
                $model->alias('u')->where(['u.user_id' => ['in', !empty($redisData) ? $redisData : [-1]]]);
            
                return $model;
            }, $field, '');
        
            $result = [];
            $i = 1;

        
            foreach ($data['rows'] as $datum) {
                $userHead = $model->disUserHead($datum['head_add']);
                $result[] = [
                    'id' => $datum['user_id'],
                    'pic' => $this->htmlHackExport("<img src='%s' title='{$datum['alias']}头像' style='width: 50px;' />", $userHead),
                    'alias' => $this->htmlHackExport(\app\admin\model\UrlHtml::goUserDetailsUrl($datum['user_id'], '%s'), $datum['alias']),
                    'userType' => $datum['vip_level'] > 0 ? 'VIP会员' : $typeTinyint->get($datum['user_type']),
                ];
            
                ++$i;
            }
        
            return $this->sucJson([
                'rows' => $result,
                'total' => $data['total'],
            ]);
        });
    }
    
    
}