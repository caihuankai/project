<?php

namespace app\admin\controller;


use app\admin\model\LiveImg;
use app\wechat\controller\AdmireRpc;
use think\Db;

class Live extends App
{
    use \app\admin\traits\Common,
        \app\admin\traits\AdminTable,
        \app\admin\traits\Status,
        \app\admin\traits\ImgReset;


    public function index()
    {

        $this->setTableHeader([
            ['checkbox' => true, 'value' => 1,],
            ['field' => 'num', 'title' => '序号',],
            ['field' => 'id', 'title' => 'ID',],
            ['field' => 'createUsername', 'title' => '创建人',],
            ['field' => 'theme', 'title' => '主题',],
            ['field' => 'create_time', 'title' => '创建时间',],

//            ['field' => 'focusNum', 'title' => '关注人数',],
//            ['field' => 'inviteNum', 'title' => '邀请人数',],
//            ['field' => 'cName', 'title' => '分类',],
//            ['field' => 'course', 'title' => '单次课程',],
            'dayCount' => '日均在线用户',
            'maxCount' => '最高在线用户',
            'onlineCount' => '真实在线/虚拟在线/总在线',
            'avgTime' => '人均在线时长（单位：分钟）',
            'likedCount' => '点赞（人气值）',
            ['field' => 'money', 'title' => '礼点',],

            'statusText' => '直播间状态',
            ['field' => 'action', 'title' => '操作',],
        ])->setToolbarId('table-button-html')->setTableSearchId('table-search-html');

//        $allCate = (new \app\admin\model\LiveCate())->getFloorCate();

        return $this->traitAdminTableList(function () {

            $model = new \app\admin\model\Live();
            $field = 'l.id, l.cid, l.user_id, l.open_status, l.focus_num, l.create_time, u.alias, l.online_num, l.virtual_num, l.theme';


            $data = $this->traitAdminTableQuery([
                [['username', ''], 'like', 'u.alias'],
                [['dateMin', ''], 'dateMin-date', 'l.create_day'],
                [['dateMax', ''], 'dateMax-date', 'l.create_day'],
                [['openStatus/i', ''], 'eq', 'l.open_status'],
            ], function () use ($model) {
                $model->alias('l');
                $model->join('user u', 'u.user_id = l.user_id');

                return $model;
            }, $field, 'l.id desc');


            // 处理数据
            $userIds = $liveIds = [];
            foreach ($data['rows'] as $item) {
                $userIds[] = $item['user_id'];
                $liveIds[] = $item['id'];
            }

            // 课程数
//            $groupData = $model->getLiveGroupCourse($liveIds, 'count(c.id) num, l.id', 'id');

            // 邀请人数
//            $inviteCount = (new \app\common\model\Fans())->getFansNumByUserId($userIds);
            // 点赞数
            $likedData = (new \app\admin\model\Liked())->countByLiveIds($liveIds);
            // 礼点
            $admireData = (new \app\admin\model\PayOrder())->sumMoney($liveIds, 3);

            $result = [];
            $i = 1;

            $recommendModel = new \app\admin\model\IndexRecommend();
            $onlineRoomInfoStatModel = new \app\admin\model\OnlineRoomInfoStat();
            //获取正确的统计日期，默认前一天，排除法定假期和周末
            $statisticsDate = $onlineRoomInfoStatModel->getStatisticsDate();

            foreach ($data['rows'] as $datum) {
                $action = self::showOperate([
                    '详情' => $this->urlTab('Live直播管理', 'Live直播间列表', 'details', ['id' => $datum['id']]),
                    $this->statusActionHtml($datum['open_status']) => [
                        'class' => 'open-status',
                        'data-ids' => $datum['id'],
                        'data-status' => $this->getStatusHtmlDataAttr($datum['open_status']),
                    ],
                    '推荐' => [
                        'class' => 'recommend-html',
                        'data-id' => $datum['id'],
                        'data-id-type' => 'liveList',
                        'data-disabled-list' => $recommendModel->getTypeSelectMap('liveList'),
                    ],
                    '评论列表' => $this->urlTab('Live直播管理', 'Live直播间列表', '/Live/commentList', ['liveId' => $datum['id'],'liveName' => $datum['alias'].'的直播间'])
                ]);

                //获取 日均在线用户、最高在线用户、人均在线时长
                $onlineRoomInfo = $onlineRoomInfoStatModel->getOnlineRoomInfoByLiveIdAndDate($datum['id'], $statisticsDate);

                $result[] = [
                    'num' => $i,
                    'id' => $datum['id'],
                    'createUsername' => \app\admin\model\UrlHtml::goUserDetailsUrl($datum['user_id'], $datum['alias']),
//                    'focusNum'       => \app\admin\model\UrlHtml::goUserFansList($datum['id'], 1, $datum['focus_num']), // 关注人数
                    // 邀请人数
//                    'inviteNum'      => \app\admin\model\UrlHtml::goUserFansList(
//                        $datum['id'], 2, !empty($inviteCount[$datum['user_id']]) ? $inviteCount[$datum['user_id']] : 0
//                    ),
//                    'cName'          => !empty($allCate[$datum['cid']]) ? $allCate[$datum['cid']] : '',
                    'create_time' => $datum['create_time'],
//                    'course'         => !empty($groupData[$datum['id']]) ?
//                        \app\admin\model\UrlHtml::goUserCourseList($datum['user_id'], $groupData[$datum['id']]['num']) :
//                        0, // 单次课程，统计直播间有多少课程

                    'theme' => isset($datum['theme'])? $datum['theme']:'',
                    'dayCount' => $onlineRoomInfo['onlineCountAvg'],
                    'maxCount' => $onlineRoomInfo['maxVisitorCount'],
                    'onlineCount' => \app\admin\model\UrlHtml::goTruthUserList($datum['id'], 'live', $datum['online_num']).
                        "/".$datum['virtual_num']."/".($datum['online_num']+$datum['virtual_num']),
                    'avgTime' => $onlineRoomInfo['onlineMinutesAvg'],
                    'likedCount' => getDataByKey($likedData, $datum['id'], 0),
                    'money' => $this->redSpan(number_format(
                        !empty($admireData[$datum['id']]) ? $admireData[$datum['id']] : '0.00', 2, '.', ''
                    )), // 直播间总收益


                    'statusText' => $this->statusColumnHtml($datum['open_status']),
                    'action' => $action,
                    'status' => $datum['open_status'],
                ];

                ++$i;
            }

            return $this->sucJson([
                'rows' => $result,
                'total' => $data['total'],
            ]);
        }, function () {

//            $this->assign('liveCate', ['全部'] + $allCate);

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
     * 修改直播间状态
     *
     * @param $ids
     * @param $status
     * @return \think\response\Json
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function changeStatus($ids, $status)
    {
        $this->validateByName();

        $model = new \app\admin\model\Live();
        $model->closeStatus($ids, (int)$status);
        return $this->sucSysJson(1);
    }


    /**
     * 直播间详情
     *
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function details($id)
    {
        $this->setTabNameThirdly('Live直播间详情');
        $this->validateByName('common.id');
        $model = new \app\admin\model\Live();
        $field = 'l.id, l.user_id,l.password,l.adapt,l.cid, l.name, l.content, l.img, l.background_img, l.create_time, l.focus_num, l.virtual_num, l.theme';
        $data = $model->where(['id' => $id])->alias('l')->field($field)->find();

        if (empty($data)) {
            $this->error('Live直播间不存在');
        }
        //适用平台
        if (!empty($data['adapt'])){
            $data['adaptData'] = json_decode($data['adapt'],true);
        }else{
            $data['adaptData'] = ['weixin'=>false,'applet'=>false,'mobile'=>false];
        }
        // 空间用户数据
        $userModel = new \app\admin\model\User();
        $data['username'] = getDataByKey($userModel->getUserColumn((array)$data['user_id']), $data['user_id'], '');

        // 课程数
        $inviteNum = $model->getLiveCourseNum($data['id'], 'count(c.id) courseNum');
        $data['courseNum'] = !empty($inviteNum) ? \app\admin\model\UrlHtml::goUserCourseList($data['user_id'], $inviteNum['courseNum'], 1) : 0; // 单词课数


        $data['liveUrl'] = \app\common\model\RedirectUrl::getMyInfoUrl($data['user_id']);
        $data['focus_num'] = \app\admin\model\UrlHtml::goUserFansList($data['id'], 1, $data['focus_num']);


        // 点赞数
        $data['likedNum'] = getDataByKey((new \app\admin\model\Liked())->countByLiveIds((array)$data['id']), $data['id'], 0);

        // 礼点
        $data['admireMoney'] = $this->redSpan(number_format(
            getDataByKey((new \app\admin\model\PayOrder())->sumMoney((array)$data['id'], 3), $data['id'], 0), 2, '.', ''
        ));


        $recommendLogModel = new \app\admin\model\RecommendLog();
        // 推荐总数，在课程删除后依然保留
        // 课程
        $data['courseRecommendNum'] = \app\admin\model\UrlHtml::goUserCourseList(
            $data['user_id'], $recommendLogModel->countNumByUserId($data['user_id'], 1), 4
        );
        $data['courseRecommendInNum'] = $recommendLogModel->countInNumByUserId($data['user_id'], 1);
        $data['courseRecommendBuyNum'] = $recommendLogModel->countBuyNumByUserId($data['user_id'], 1);
        $data['courseRecommendMoneyNum'] = $this->redSpan(number_format(
            $recommendLogModel->countBuyNumByUserId($data['user_id'], 1, 'sum(amount) num'), 2, '.', ''
        ));


        // 观点
        $data['viewpointRecommendNum'] = \app\admin\model\UrlHtml::goViewpointListHtml(
            $data['user_id'], $recommendLogModel->countNumByUserId($data['user_id'], 2), 3
        );
        $data['viewpointRecommendInNum'] = $recommendLogModel->countInNumByUserId($data['user_id'], 4);
        $data['viewpointRecommendBuyNum'] = $recommendLogModel->countBuyNumByUserId($data['user_id'], 2);
        $data['viewpointRecommendMoneyNum'] = $this->redSpan(number_format(
            $recommendLogModel->countBuyNumByUserId($data['user_id'], 2, 'sum(amount) num'), 2, '.', ''
        ));
        
        //统计 日均在线用户、最高在线用户、人均在线时长
        $onlineRoomInfoStatModel = new \app\admin\model\OnlineRoomInfoStat();
        //获取正确的统计日期，默认前一天，排除法定假期和周末
        $statisticsDate = $onlineRoomInfoStatModel->getStatisticsDate();
        //获取 日均在线用户、最高在线用户、人均在线时长
        $onlineRoomInfo = $onlineRoomInfoStatModel->getOnlineRoomInfoByLiveIdAndDate($id, $statisticsDate);
        $data['dayCount'] = $onlineRoomInfo['onlineCountAvg'];
        $data['maxCount'] = $onlineRoomInfo['maxVisitorCount'];
        $data['avgTime'] = $onlineRoomInfo['onlineMinutesAvg'];

        $this->assign('data', $data);

        return $this->fetch();
    }


    /**
     * 保存数据
     *
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function saveData()
    {
        $this->validateByName('common.id');
        $model = new \app\admin\model\Live();
        $request = $this->request;
        $id = $request->post('id/i');
        $virtualNum = $request->post('virtualNum/i', 0);
        $theme = $request->post('theme', 0);
        if (request()->param('passstatus',1) == 1){
            $save = [
                'virtual_num' => $virtualNum,
                'theme' => $theme,
                'password'=>'',
                'adapt' =>'',
            ];
        }else{
           $pass = trim(request()->param('pass',null));
           $adapt = trim(request()->param('adapt',null));
           $adaptArr = explode(",",$adapt);
           $adaptData=['weixin'=>false,'applet'=>false,'mobile'=>false];
           if (count($adaptArr)<1){
               $adaptData='';
           }else{
               foreach ($adaptArr as $val){
                   switch($val){
                       case 1:
                           $adaptData['weixin'] = true;
                           break;
                       case 2:
                           $adaptData['applet'] = true;
                           break;
                       case 3:
                           $adaptData['mobile'] = true;
                           break;
//                   default:
//                       $adaptData=$adaptData;
                   }
               }
           }

           if (empty($pass)||empty($adapt)) return $this->errSysJson('输入密码格式不正确或未选择适用平台！');
            $save = [
                'virtual_num' => $virtualNum,
                'theme' => $theme,
                'password'=>$pass,
                'adapt' =>json_encode($adaptData),
            ];
        }

        $save && $model->update($save, ['id' => $id]);

        $AdmireRpcC = new AdmireRpc();
        $AdmireRpcC->sendVirtualNum($id + 1000000000, $virtualNum);


        return $this->sucSysJson(1);
    }


    /**
     * 直播间邀请人数列表 | 直播间关注人数列表
     * （没用了）
     *
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function liveUserList()
    {
        $type = $this->request->param('type/i', 1);
        $this->setTableHeader([
            ['checkbox' => true, 'value' => 1,],
            ['field' => 'num', 'title' => '序号',],
            ['field' => 'id', 'title' => 'ID',],
            ['field' => 'pic', 'title' => '图标',],
            ['field' => 'createUsername', 'title' => '创建人',],
            ['field' => 'liveName', 'title' => '直播间名称',],
            ['field' => 'cName', 'title' => '分类',],
            ['field' => 'otherName', 'title' => $type == 2 ? '被邀请人' : '关注人',],
            ['field' => 'create_time', 'title' => $type == 2 ? '邀请时间' : '关注时间',],
            ['field' => 'course', 'title' => '单次课程',],
            ['field' => 'money', 'title' => '直播间收益（单位：元）',],
            ['field' => 'action', 'title' => '操作',],
        ])->setTableSearchId('table-search-html');


        return $this->traitAdminTableList(function () use ($type) {
            $this->validateByName('common.id');
            $liveId = $this->request->param('id/i', 0);
            $result = [];
            $total = 0;

            $liveModel = new \app\admin\model\Live();
            $liveData = $liveModel->where(['l.id' => $liveId])->field('l.id, l.name, l.user_id, lc.name cateName, count(l.id) num')->alias('l')
                ->join('live_cate lc', 'lc.id = l.cid')
                ->join('course c', 'c.live_id = l.id')
                ->find();

            if (empty($liveData['id'])) {
                goto noData;
            }


            // 获取列表数据
            if ($type == 2) { // 直播间邀请人数列表
                $model = function () use ($liveId) {
                    $model = new \app\admin\model\Fans();
                    $model->where(['l.id' => $liveId])->alias('f')
                        ->join('user u', 'u.user_id = f.invita_userid')
                        ->join('live l', 'l.user_id = u.user_id')
                        ->join('third_login tl', 'tl.open_id = f.open_id')
                        ->join('user tlu', 'tlu.user_id = tl.user_id');

                    return $model;
                };
                $field = 'f.id, tl.user_id, f.create_time';
                $order = 'f.id desc';
                $query = [
                    [['name', ''], 'like', 'tlu.alias'],
                    [['dateMin', ''], 'dateMin', 'f.create_time'],
                    [['dateMax', ''], 'dateMax', 'f.create_time'],
                ];
            } else { // 直播间关注人数列表
                $model = function () use ($liveId) {
                    $model = new \app\admin\model\LiveFocus();
                    $model->where(['lf.live_id' => $liveId])->alias('lf')->join('user u', 'u.user_id = lf.user_id', 'left');

                    return $model;
                };
                $field = 'lf.id, lf.user_id, lf.create_time, lf.robot, lf.name robotName';
                $order = 'lf.id desc';
                $query = [
                    [['name', ''], 'like', 'u.alias'],
                    [['dateMin', ''], 'dateMin', 'lf.create_time'],
                    [['dateMax', ''], 'dateMax', 'lf.create_time'],
                ];
            }
            $listData = $this->traitAdminTableQuery($query, $model, $field, $order);


            if (!empty($listData['rows'])) { // 处理数据
                $total = $listData['total'];

                $getUserIds = [];
                foreach ($listData['rows'] as $row) {
                    $getUserIds[] = $row['user_id'];
                }


                $userId = $liveData['user_id'];
                // 用户数据
                $userModel = new \app\admin\model\User();
                $userData = $userModel->getUserColumn(array_merge($getUserIds, [$userId]), 'user_id, alias, head_add');
                $userName = !empty($userData[$userId]) ? \app\admin\model\UrlHtml::goUserDetailsUrl($userId, $userData[$userId]['alias']) : '';

                // 直播间收益
                $moneyData = $liveModel->sumLiveIncome([$liveData['id']]);
                $moneyData = '<span class="c-red">' . (!empty($moneyData[$liveData['id']]) ? $moneyData[$liveData['id']]['money'] : '0.00') . '</span>';

                $i = 1;
                foreach ($listData['rows'] as $item) {
                    if (!empty($userData[$item['user_id']])) {
                        $otherName = \app\admin\model\UrlHtml::goUserDetailsUrl($item['user_id'], $userData[$item['user_id']]['alias']);
                    } else if (isset($item['robot']) && $item['robot'] == 1) {
                        $otherName = $item['robotName'];
                    } else {
                        $otherName = '';
                    }
                    $result[] = [
                        'num' => $i,
                        'id' => $item['id'],
                        'pic' => !empty($userData[$userId]) ?
                            '<img style="width:50px;height:50px" src="' . $userModel->disUserHead($userData[$userId]['head_add']) . '">' : '',
                        'createUsername' => $userName,
                        'liveName' => $liveData['name'],
                        'cName' => $liveData['cateName'],
                        'otherName' => $otherName,
                        'create_time' => $item['create_time'],
                        'course' => $liveData['num'],
                        'money' => $moneyData,
                        'action' => self::showOperate(['详情' => \app\admin\model\UrlHtml::goLiveDetailsUrl($liveData['id'])])
                    ];

                    ++$i;
                }
            }


            noData:;
            return $this->sucJson([
                'rows' => $result,
                'total' => $total,
            ]);
        });


    }


    /**
     * 直播间评论列表
     * @name  commentList
     * @param $liveId
     * @return mixed
     * @author Lizhijian
     */
    public function commentList($liveId)
    {

        //构造集合(数据表名)
        $oldId = $liveId;
        $liveId += 1000000000;
        $liveId = (string)$liveId;//mongodb的集合名必须为字符串
        $reply = input('reply');

        //构造表头信息
        $this->setTableHeader([
            ['checkbox' => true, 'value' => 1,],
            ['field' => 'num', 'title' => '序号',],
            ['field' => 'ID', 'title' => 'ID',],
            ['field' => 'liveName', 'title' => 'live直播间名称',],
            ['field' => 'comment', 'title' => '讨论内容',],
            ['field' => 'reply', 'title' => '回复内容',],
            ['field' => 'commentUser', 'title' => '讨论人'],
            ['field' => 'liveName', 'title' => '所属直播间',],
            ['field' => 'createTime', 'title' => '发表时间',],
            ['field' => 'action', 'title' => '操作',],
        ])->setToolbarId('table-button-html')->setTableSearchId('table-search-html');
        $this->setTabNameThirdly('评论列表');

        /** @var \think\mongo\Query $model */
        //获取数据并格式化
        $model = new \app\admin\model\CourseComment();
        return $this->traitAdminTableList(function () use ($liveId, $oldId, $model,$reply) {

            $field = '_id, srcuid, msgtime, content, msgtype, master_msgid';

            //回复内容搜索
            if($reply) $this->tableWhere['content'] = ['like', $reply];

            $data = $this->traitAdminTableQuery([
                [['content', ''], 'likeSingle', 'content'],
                [['dateMin', ''], 'dateMin', 'msgtime'],
                [['dateMax', ''], 'dateMax', 'msgtime'],
            ], function () use ($model, $liveId) {
                return $model->table($liveId);
            }, $field, ['_id', 'desc']);


            $result = $userIds = $liveData = $master_msgid = $userData1 = [];
            if (!empty($data['rows'])) {

                foreach ($data['rows'] as $row) {
                    $userIds[] = $row['srcuid'];
                    if(isset($row['master_msgid']) && $row['master_msgid']){
                        $master_msgid[] = $row['master_msgid'];

                    }
                }

                $liveData = \app\admin\model\Live::where(['id' => $oldId])->field('id, name')->find();
                $userData = (new \app\admin\model\User())->getUserColumn($userIds, 'alias,user_level,is_assistant');

                //B的信息
                $masterData = $master_msgid? Db::connect('mongo_course_msg')->table($liveId)->where('_id', 'in', $master_msgid)->select():[];
                $userIds1 = array_unique(array_column($masterData, 'srcuid'));//回复者ID
                $userDataTem1 = (new \app\admin\model\User())->getUserColumn($userIds1, 'alias,user_level,is_assistant');//回复者信息

                foreach ($masterData as $k=>$v){
                    $userData1[$v['_id']] = $v;

                    $srcuid = $v['srcuid'];
                    $tem = array_filter($userDataTem1, function($t) use ($srcuid) {//闭包
                        return $t['user_id'] == $srcuid;
                    });
                    if($tem && $v['srcuid']){
                        sort($tem);
                        $userData1[$v['_id']]['userInfo'] = [];
                        $userData1[$v['_id']]['userInfo'] = $tem[0];
                    }
                }

                $i = 1;

                //直播间名称
                $liveName = input('liveName','--');
                $temIds = array_unique(array_column($userData1, 'srcuid'));
                $temUser = (new \app\admin\model\User())->getUserColumn($temIds);

                foreach ($data['rows'] as $datum) {

                    //讲师和助教master_msgid 获取回复讨论的内容
                    if(isset($datum['master_msgid']) && $datum['master_msgid'] && $userData1){//A回复B
                        //B讨论人
                        $name = $userData1[$datum['master_msgid']]['userInfo']['is_assistant'] ==1? '(助教)':($userData1[$datum['master_msgid']]['userInfo']['user_level']==2? '(讲师)':'');
                        $commentUser = !empty($userData1[$datum['master_msgid']]['srcuid']) ?
                            \app\admin\model\UrlHtml::goUserDetailsUrl($userData1[$datum['master_msgid']]['srcuid'], $temUser[$userData1[$datum['master_msgid']]['srcuid']]).$name : '';
                        $content = $userData1[$datum['master_msgid']]['content'];//B内容
                        $reply = $commentUser.'：'.$datum['content'];//A回复
                    }else{//A无回复
                        //A讨论人
//                        $name = $userData[$datum['srcuid']]['is_assistant']==1? '(助教)':($userData[$datum['srcuid']]['user_level']==2? '(讲师)':'(用户)');//判断身份
                        $commentUser = !empty($userData[$datum['srcuid']]['alias']) ? \app\admin\model\UrlHtml::goUserDetailsUrl($datum['srcuid'], $userData[$datum['srcuid']]['alias']) : '';
                        $reply = '--';
                        $content = $datum['content'];
                    }

                    $result[] = [
                        'num' => $i,
                        'ID' => $datum['_id'],
                        'liveName' => $liveData['name'] ?: $liveName,
                        'comment' => $content,
                        'reply' => $reply,
                        'commentUser' => $commentUser,
                        'createTime' => date('Y-m-d H:i:s', $datum['msgtime']),
                        'action' => self::showOperate([
                            '删除' => [
                                'class' => 'comment-del',
                                'data-id' => $datum['_id'],
                            ],
                        ]),
                    ];

                    ++$i;
                }
            }

            return $this->sucJson([
                'rows' => $result,
                'total' => $data['total'],
            ]);
        }, function () use ($liveId) {
            $this->assign('LiveId', $liveId);
        });
    }


    /**
     * 删除评论
     * @name  commentDel
     * @param $ids
     * @param $id
     * @return \think\response\Json
     * @author Lizhijian
     */
    public function commentDel($ids, $id)
    {

        $this->validateByName('common.ids');
        $this->validateByName('common.id');

        config('mongo_course_msg.pk_type', ''); // 不转ObjectID
        $model = new \app\admin\model\CourseComment();


        switch (is_array($ids)) {
            case 1:
                foreach ($ids as $idItem) { // 转整
                    $model->where(['_id' => (int)$idItem])->table($id)->delete();
                }
                break;
            default:
                $model->where(['_id' => (int)$ids])->table($id)->delete();
                break;
        }

        return $this->sucSysJson(1);
    }


}

