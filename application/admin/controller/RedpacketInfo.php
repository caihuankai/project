<?php

namespace app\admin\controller;


/**
 * Class RedpacketInfo
 * @package app\admin\controller
 * Fashion:
 * 1.获取红包列表
 * 2.获取单个红包的详情
 */
class RedpacketInfo extends App
{
    use \app\admin\traits\Common,
        \app\admin\traits\AdminTable,
        \app\admin\traits\changeTinyintController;


    /**
     * 红包列表页
     * @name  index
     * @return mixed
     * @author Lizhijian
     */
    public function index()
    {

        //1. 设置表头
        $this->setTableHeader([//设置行信息
            'num' => '序号',
            'id' => '红包ID',
            'type' => '红包类型',
            'lucky_num' => '红包标识',
            'create_time' => '发布时间',
            'src_user' => '发布者',
            'live' => 'Live直播间',
            'course' => '课程直播间',
            'status' => '状态',
            'packet_money' => '总额度（礼点)',
            'packet_num' => '个数',
            'fix_per_money' => '单价',
            'start_time' => '开抢时间',
            'finish_time' => '结束时间',
            ['field' => 'take_num', 'title' => '参与人数',],
        ])
            ->setSearch([//设置筛选
                [['options' => ['data' => [-1 => '全部类型'] + ['红包-随机类型', '红包-固定类型']], 'name' => 'type'], 'select-zero'],
                [['options' => ['data' => array_merge(['0' => '状态'], ['未开始', '进行中', '已结束'])], 'name' => 'status'], 'select'],
                [['options' => ['placeholder' => '发布者']], 'likeAll', 'u.alias'],//OK
                [['options' => ['placeholder' => 'Live直播间']], 'likeAll', 'live_name'],//要用as之前并且原生的命名
                [['options' => ['placeholder' => '课程直播间']], 'likeAll', 'c.class_name'],
                [['options' => ['placeholder' => '发布时间（开始）']], 'dateMin', 'r.create_time'],//ok
                [['options' => ['placeholder' => '发布时间（结束）']], 'dateMax', 'r.invalid_time'],//ok
            ]);
        //->addChangeTinyintToolbarBtn('status');//model要先设定$mysqlTinyintMap,这里的状态需要根据时间判断，先不用

        //2. 获取红包模型（RedpacketInfo）
        $model = new \app\admin\model\RedpacketInfo();

        //3. 获取数据并格式化为表格列表格式
        return $this->traitAdminTableList(function () use ($model) {

            //group_id值大于10亿：10亿+直播间ID，小于10亿：课程ID
            $field = '
            r.id, 
            r.src_user, 
            r.type, 
            r.packet_num,
            r.take_num,
            r.fix_per_money,
            r.take_money,
            r.create_time,
            r.fix_time,
            r.finish_time,
            r.invalid_time,
            r.fix_time,
            r.packet_money,
            r.group_id,
            r.lucky_num,
            u.alias,
            u.user_id as src_user_id,
            l.name as live_name,
            l.id as live_id,
            l.user_id,
            c.class_name,
            c.id as course_id
           ';

            //红包状态or类型
            switch (request()->param('type')) {
                case 0:
                    $this->tableWhere['r.type'] = [
                        'in',
                        [5, 9]
                    ];
                    break;
                case 1:
                    $this->tableWhere['r.type'] = [
                        'in',
                        [6, 10]
                    ];
                    break;
            }
            switch (request()->param('status')) {
                case 1:
                    $this->tableWhere['r.fix_time'] = [
                        '>',
                        time()
                    ];
                    break;
                case 2:
                    $this->tableWhere['r.fix_time'] = [
                        '<',
                        time()
                    ];
                    $this->tableWhere['r.invalid_time'] = [
                        '>',
                        time()
                    ];
                    break;
                case 3:
                    $this->tableWhere['r.invalid_time'] = [
                        '<',
                        time()
                    ];
                    break;
            }

            $where = '';
            $liveName = trim(input('table-search-3'));
            if($liveName){
                unset($this->tableWhere['live_name']);
                $uModel = model('user');
                $uModel->alias('u');
                $uModel->join('live l', 'u.user_id = l.user_id', 'left');
                $uInfo = $uModel->where("u.alias like '%{$liveName}%'")->column('u.user_id, l.id as live_id, u.alias');
                if($uInfo){
                    $liveIds = @implode(',', array_filter(array_unique(array_column($uInfo,'live_id'))));
                    if($liveIds) $where = "AND l.id in({$liveIds})";
                }
            }

            //获取总数据
            $data = $this->traitAdminTableQuery([//设置普通筛选查询
                [['c.class_name', ''], 'likeAll', 'c.class_name'],
                [['dateMin', ''], 'dateMin', 'r.create_time', '','',0],
                [['r.invalid_time', ''], 'dateMax', 'r.invalid_time'],
            ], function () use ($model, $where) {//表单查询
                $model->alias('r');
                $model->join('user u', 'r.src_user = u.user_id', 'left');
                $model->join('live l', 'r.group_id-\'1000000000\' = l.id', 'left');
                $model->join('course c', 'r.group_id = c.id', 'left');
                $model->where('r.type in (5,9,6,10) '.$where);
                return $model;
            }, $field, 'r.id desc');

            //循环构造每一行的格式数据
            $result = [];
            $i = 1;

            //获取相应红包开抢时间（talk_redpacket_log）
            foreach ($data['rows'] as $datum) {

                //红包类型
                $type = in_array($datum['type'], [5, 9]) ? '口令红包-随机额度' : '口令红包-固定额度';

                //随机即时-5，随机-定时9
                //固定即时-6，固定-定时-10
                $type = 0;//代表定时
                if($datum['type'] == 9 || $datum['type'] == 10){//定时红包
                    $startTime = date('Y-m-d H:i', $datum['fix_time']);
                    $finishTime = date('Y-m-d H:i', $datum['invalid_time']);
                    $startTimeInt = $datum['fix_time'];
                    $finishTimeInt = $datum['invalid_time'];

                }else{
                    $startTime = date('Y-m-d H:i', $datum['fix_time']);
                    $finishTime = date('Y-m-d H:i', $datum['create_time'] + 86400);
                    $startTimeInt = $datum['fix_time'];
                    $finishTimeInt = $datum['create_time'] + 86400;
                    $type = 1;
                }

                //红包状态
                if (time() < $startTimeInt) {
                    $status = $sendStatus = '未开始';
                }
                else if (time() >= $startTimeInt && time() <= $finishTimeInt) {
                    $status = $this->blueSpan('进行中');
                    $sendStatus = '进行中';
                }
                else {
                    $status = $this->redSpan('已结束');
                    $sendStatus = '已结束';
                }

                //红包所在直播间名的用户名
                $UserInfo = model('user')->field('alias, login_name')->where('user_id', $datum['user_id'])->find();

                //构造操作HTML
                $actionHtml = 0;
                if ($datum['take_num'] > 0) {//参与者大于0时
                    $actionHtml = [
                        $datum['take_num'] => $this->urlTab('财务管理 ', '礼点红包', 'RedpacketInfo/detail', [
                            'id' => $datum['id'],
                            'srcUserName' => $UserInfo['alias']?:'',
                            'srcUserId' => $datum['src_user'],
                            'status' => $sendStatus,
                            'startTimeInt' => $startTimeInt,
                            'endTimeInt' => $finishTimeInt,
                        ])
                    ];
                    $actionHtml = self::showOperate($actionHtml);
                }


                //一行数据
                $TEMP = [
                    'num' => $i,//序号
                    'id' => $datum['id'],//ID
                    'type' => $type,//类型
                    'lucky_num' => $datum['lucky_num']>0? $datum['lucky_num']:0,//标识
                    'status' => $status,//状态
                    'course' => $datum['course_id']? "<a href=\"/course/details/id/{$datum['course_id']}?tabName1=课程管理&tabName2=单次课程列表\">{$datum['class_name']}</a>" : '',//课程名称
                    'live' => $datum['alias'] && $datum['live_id']?
                        "<a href=\"/live/details/id/{$datum['live_id']}?tabName1=Live直播管理&tabName2={$UserInfo['alias']}的直播间\">{$UserInfo['alias']}的直播间</a>" : '',//直播间名称
                    'create_time' => date('Y-m-d H:i', $datum['create_time']),//发布时间
                    'src_user' => !empty($datum['alias']) ?//用户列表详情页
                        \app\admin\model\UrlHtml::goUserDetailsUrl($datum['src_user_id'], $datum['alias']) : '',
                    'packet_money' => $datum['packet_money']/100,//总额度（礼点)
                    'packet_num' => $datum['packet_num'],//个数
                    'fix_per_money' => $datum['fix_per_money']/100,//单价
                    'start_time' => $startTime,//开抢时间
                    'finish_time' => $finishTime,//结束时间
                    'take_num' => $actionHtml,
                ];

                //个别字体标色
                if ($datum['take_num'] >= 1) {
                    $TEMP['take_num'] = $this->blueSpan($TEMP['take_num']);
                }

                $result[] = $TEMP;
                ++$i;
            }

            return $this->sucJson([
                'rows' => $result,
                'total' => $data['total'],
            ]);
        });
    }

    /**
     * 红包详情页
     * @name  detail
     * @return mixed
     * @author Lizhijian
     */
    public function detail()
    {

        $srcUserName = input('srcUserName', 0);
        $this->setTabNameThirdly($srcUserName?  $srcUserName.'的直播间':'');//导航栏名称

        //1. 设置表头
        $this->setTableHeader([//设置行信息
            'num' => '序号',
            'id' => '红包ID',
            'type' => '红包类型',
            'lucky_num' => '红包标识',
            'create_time' => '发布时间',
            'src_user' => '发布者',
            'live' => 'Live直播间',
            'course' => '课程直播间',
            'status' => '状态',
            'packet_money' => '总额度（礼点)',
            'packet_num' => '个数',
            'start_time' => '开始时间',
            'invalid_time' => '结束时间',
            'take_user' => '参与者',
            'time' => '获得时间',
            'take_money' => '获得礼点'
        ])
            ->setSearch([//设置筛选
                [['options' => ['data' => [-1 => '全部类型'] + ['红包-随机类型', '红包-固定类型']], 'name' => 'type'], 'select-zero'],
                [['options' => ['data' => array_merge(['0' => '状态'], ['未开始', '进行中', '已结束'])], 'name' => 'status'], 'select'],
                [['options' => ['placeholder' => '发布者']], 'likeAll'],
//                [['options' => ['placeholder' => 'Live直播间']], 'likeAll', 'live_name'],//要用as之前并且原生的命名
                [['options' => ['placeholder' => '课程直播间']], 'likeAll', 'c.class_name'],
                [['options' => ['placeholder' => '参与者']], 'likeAll', 'u.alias'],
                [['options' => ['placeholder' => '发布时间（开始）']], 'dateMin', 'r.create_time'],
                [['options' => ['placeholder' => '发布时间（结束）']], 'dateMax', 'r.invalid_time'],
            ]);

        //2. 获取红包模型（RedpacketInfo）
        $model = new \app\admin\model\RedpacketInfo();

        //3. 获取数据并格式化为表格列表格式
        return $this->traitAdminTableList(function () use ($srcUserName, $model) {
            $srcUserId = input('srcUserId', '--');
            $startTimeInt = input('startTimeInt', 0);
            $endTimeInt = input('endTimeInt', 0);
            $status = input('status', 0);

            //group_id值大于10亿：10亿+直播间ID，小于10亿：课程ID
            $field = '
            r.id, 
            r.src_user, 
            r.type, 
            r.packet_num,
            r.take_num,
            r.fix_per_money,
            r.create_time,
            r.finish_time,
            r.invalid_time,
            r.packet_money,
            r.lucky_num,
            lo.take_money,
            lo.time,
            u.alias,
            l.name as live_name,
            l.id as live_id,
            c.class_name,
            c.id as course_id
           ';

            //获取筛选时红包状态or类型（这里的类型和状态比较特殊，所以直接修改$this->tableWhere属性）
//            5/9随机 6/10固定
            switch (request()->param('type')) {
                case 0:
                    $this->tableWhere['r.type'] = [
                        'in',
                        [5, 9]
                    ];
                    break;
                case 1:
                    $this->tableWhere['r.type'] = [
                        'in',
                        [6, 10]
                    ];
                    break;
            }
            switch (request()->param('status')) {
                case 1:
                    $this->tableWhere['r.create_time'] = [
                        '>',
                        time()
                    ];
                    break;
                case 2:
                    $this->tableWhere['r.create_time'] = [
                        '<',
                        time()
                    ];
                    $this->tableWhere['r.invalid_time'] = [
                        '>',
                        time()
                    ];
                    break;
                case 3:
                    $this->tableWhere['r.invalid_time'] = [
                        '<',
                        time()
                    ];
                    break;
            }

            //获取总数据
            $data = $this->traitAdminTableQuery([//设置普通筛选查询
                [['c.class_name', ''], 'likeAll', 'c.class_name'],
                [['dateMin', ''], 'dateMin', 'r.create_time'],
                [['dateMin', ''], 'dateMin', 'r.create_time'],
                [['r.invalid_time', ''], 'dateMax', 'r.invalid_time'],
            ], function () use ($model) {//表单查询
                $redpacket_id = input('id', 0);

                $model->alias('r');
                $model->join('redpacket_log lo', 'r.id = lo.packet_id');
                $model->join('user u', 'lo.take_user = u.user_id', 'left');
                $model->join('live l', 'r.group_id-\'1000000000\' = l.id', 'left');
                $model->join('course c', 'r.group_id = c.id', 'left');
                $model->where('r.type in (5,9,6,10) AND lo.packet_id = ' . $redpacket_id);
                return $model;
            }, $field, 'r.id desc');

            //循环构造每一行的格式数据
            $result = [];
            $i = 1;

            foreach ($data['rows'] as $datum) {

                //红包类型
                $type = in_array($datum['type'], [5, 9]) ? '口令红包-随机额度' : '口令红包-固定额度';

                //一行数据
                $TEMP = [
                    'num' => $i,
                    'id' => $datum['id'],//红包ID
                    'type' => $type,//类型
                    'lucky_num' => $datum['lucky_num']>0? $datum['lucky_num']:0,//标识
                    'status' => $status,//状态
                    'course' => $datum['course_id']? "<a href=\"/course/details/id/{$datum['course_id']}?tabName1=课程管理&tabName2=单次课程列表\">{$datum['class_name']}</a>" : '--',//课程名称
                    'live' => $srcUserName && $datum['live_id']?
                        "<a href=\"/live/details/id/{$datum['live_id']}?tabName1=Live直播管理&tabName2={$srcUserName}的直播间\">{$srcUserName}的直播间</a>" : '--',//直播间名称
                    'create_time' => $datum['create_time'] ? date('Y-m-d H:i', $datum['create_time']) : '--',//发布时间
                    'src_user' => !empty($srcUserId) ?//用户列表详情页
                        \app\admin\model\UrlHtml::goUserDetailsUrl($srcUserId, $srcUserName) : '',
                    'packet_money' => $datum['packet_money']/100,//总额度（礼点)
                    'packet_num' => $datum['packet_num'],//红包个数
                    'start_time' => date('Y-m-d H:i', $startTimeInt),//开始时间
                    'invalid_time' => date('Y-m-d H:i', $endTimeInt),//结束时间
                    'take_user' => $datum['alias'],//参与者
                    'time' => $datum['time'] ? date('Y-m-d H:i', $datum['time']) : '--',//获得时间
                    'take_money' => $datum['take_money']/100,//获得礼点
                ];

                $result[] = $TEMP;
                ++$i;
            }

            return $this->sucJson([
                'rows' => $result,
                'total' => $data['total'],
            ]);
        });
    }
}


