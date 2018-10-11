<?php
namespace app\admin\model;

use app\common\model\ModelBs;

class LiveStatistics extends ModelBs
{
	const LIVE_TIME = 0;//live直播间时长
    const COURSE_LIVE_TIME = 1;//课程直播间时长
    const LIVE_SPEAK = 2;//直播间的发言次数
    const COURSE_LIVE_SPEAK = 3;//课程发言的次数

    public static $count = 0;//记录数量

    /**
     * 获取课程直播间--列表页数据
     * @param bool $pageFlag
     * @return mixed
     * @author Lizhijian
     */
    public static function sumCourseLiveTable($pageFlag = true){

        $page = input('pageNumber') ? (input('pageNumber')-1)*10: 0;
        $startTime = input('logmin') ?  : date('Y-m-d');
        $endTime = input('logmax') ?  : date('Y-m-d');

        $where = '';
        if(input('class_name')) {

            if(input('course_type') == 1) {
                $where .= 'c.class_name like \'%'.input('class_name').'%\' AND ';
            }else{
                $where .= 'pc.class_name like \'%'.input('class_name').'%\' AND ';
            }
        }
        if(input('alias')) {
            $where .= 'u.alias like \'%'.input('alias').'%\' AND ';
        }
        if(input('course_type') == 1) {
            $where .= 'c.pid = 0 AND ';
        }else if(input('course_type') == 2) {
            $where .= 'c.pid > 0 AND ';
        }
        if(true == $pageFlag) {
            $limit = " LIMIT $page,10";
        }else{
            $limit = '';
        }
        //执行SQL，并返回
        $sql = "SELECT
	c.class_name,c.uid,s.id,c.pid,c.create_time,pc.class_name p_class_name,c.type as type_old,c.id as course_id,c.study_num,u.alias,
	SUM(s.total) AS total,
	CASE WHEN c.pid > 0 THEN '系列课'
	ELSE '单节课'
	END as type
FROM
	talk_live_statistics s
LEFT JOIN talk_course c ON s.live_id = c.id
LEFT JOIN talk_user u ON c.uid = u.user_id
LEFT JOIN talk_course pc ON c.pid = pc.id

WHERE 
$where
s.live_id < 1000000000
AND 
s.statistics_time BETWEEN FROM_UNIXTIME(
			UNIX_TIMESTAMP('$startTime'),
			'%Y%m%d'
		)
AND FROM_UNIXTIME(
			UNIX_TIMESTAMP('$endTime'),
			'%Y%m%d'
		)
GROUP BY
	s.live_id
ORDER BY c.create_time DESC 
";

        $res = self::query($sql.$limit);
        self::$count = count(self::query($sql));

        //人均发言次数 + 课程计划
        $liveIds = $pIds = [];
        foreach ($res as $v){
            $liveIds[] =  $v['course_id'];
            if($v['type'] == '系列课'){
                $pIds[$v['course_id']] =  $v['pid'];
            }
        }
        $hasPlanInfo = self::getCoursePlan($pIds);//课程安排
        $liveTimeInfo = self::getCourseLiveTotalById($startTime, $endTime, $liveIds, LiveStatistics::COURSE_LIVE_TIME);//获取总停留时长,人均停留时长
        $liveSpeakInfo = self::getCourseLiveTotalById($startTime, $endTime, $liveIds, LiveStatistics::COURSE_LIVE_SPEAK);//课程直播发言次数
        $historyInfo = self::getHistory($startTime, $endTime, $liveIds);//课程历史人数

        //构造数据
        foreach ($res as $k => $v){
            if($v['p_class_name']){
                $res[$k]['class_name'] = $v['p_class_name'];
            }
            $res[$k]['total'] = $res[$k]['ave_total'] = '-';
            $res[$k]['speak_total'] = $res[$k]['ave_speak_total'] = '-';
            $res[$k]['history_total'] = '-';
            $res[$k]['plan_num'] = '-/-';
            if(isset($hasPlanInfo[$v['course_id']])){
                $plan = $hasPlanInfo[$v['course_id']]['has_num'] .'/'. $hasPlanInfo[$v['course_id']]['plan_num'];
                $res[$k]['plan_num'] =
                "<a href=\"/StatisticsData/sumCoursePlan?logmin={$startTime}&logmax={$endTime}&liveId={$v['pid']}&tabName1=课程直播间&tabName2=课程安排\">{$plan}</a>";
            }else{
                $res[$k]['plan_num'] =
                    "-/-";
            }
            if(isset($historyInfo[$v['course_id']])){
                if($historyInfo[$v['course_id']]['total']){
                    $res[$k]['history_total'] =
                        "<a href=\"/StatisticsData/sumCourseHistory?dateMin={$startTime}&dateMax={$endTime}&liveId={$v['course_id']}&tabName1=课程直播间&tabName2=历史人数\">{$historyInfo[$v['course_id']]['total']}</a>";
                }else{
                    $res[$k]['history_total'] = 0;
                }
            }
            if(isset($liveTimeInfo[$v['course_id']])){
                $ave_total = isset($historyInfo[$v['course_id']]['total'])? $historyInfo[$v['course_id']]['total']:0;
                $res[$k]['total'] = $liveTimeInfo[$v['course_id']]['total'];
                $res[$k]['ave_total'] = round($liveTimeInfo[$v['course_id']]['total']/$ave_total,2);
            }
            if(isset($liveSpeakInfo[$v['course_id']])){
                $ave_speak_total = isset($historyInfo[$v['course_id']]['total'])? $historyInfo[$v['course_id']]['total']:0;
                $res[$k]['speak_total'] = $liveSpeakInfo[$v['course_id']]['total'];
                $res[$k]['ave_speak_total'] = round($liveSpeakInfo[$v['course_id']]['total']/$ave_speak_total,2);
            }
        }
        return $res;
    }

    /**
     * 获取课程直播间--课程历史数据
     * @param int $live_id
     * @return array
     * @author Lizhijian
     */
    public static function sumCourseHistorTable($live_id = 0, $pageFlag = true){
        extract(input());
        //搜索
        $liveId = $live_id? :$liveId;
        $where = [
            's.live_id' => $liveId,
            's.statistics_time' => date('Ymd',time())
        ];

        if(!empty($alias)){
            $where['alias'] = ['like', '%'.trim($alias, ' ').'%'];
        }
        if(!empty($logmin) || !empty($logmax)){
            !$logmax && $logmax = date('Ymd', time());
            $where['s.statistics_time'] = [
                'between', [date('Ymd',strtotime($logmin)), date('Ymd',strtotime($logmax))]
            ];
        }
        //查询数据
        if(false == $pageFlag){
            $pageNumber = 0;
        }
        $pageNumber = isset($pageNumber)? $pageNumber:0;
        $model = function ($countFlag = true)use($where,$pageNumber,$pageFlag){
            $fun = self::alias('s')
                ->join('talk_user u','s.user_id=u.user_id', 'left')
                ->group('s.user_id')
                ->where($where);
            if(true === $countFlag && true === $pageFlag){
                return $fun
                    ->page($pageNumber, 10)
                    ->column('s.user_id');
            }else{
                return $fun
                    ->column('s.user_id');
            }
        };
        $userIds = $model();
        self::$count = count($model(false));

        //构造数据
        $res = $resTime = $resSpeak = [];
        if($userIds){
        	$type = input('post.type');
        	if (empty($type)) {
        		$type = input('get.type');
        	}
        	$liveTimeType = $type == 0 ? self::COURSE_LIVE_TIME : self::LIVE_TIME;
        	$liveSpeakType = $type == 0 ? self::COURSE_LIVE_SPEAK : self::LIVE_SPEAK;
            $resTime = self::alias('s')
                ->join('talk_user u', 's.user_id = u.user_id', 'left')
                ->where([
                    's.live_id' => $liveId,
                    's.user_id' => ['in', $userIds],
                	's.statistics_type' => $liveTimeType,
                	's.statistics_time' => [
                        'between', [
                            date('Ymd',strtotime($logmin)),
                            date('Ymd',strtotime($logmax))
                        ]
                    ],
                ])
                ->field('s.id,s.user_id,sum(s.total) as total,u.alias,u.head_add')
                ->group('s.user_id')
                ->fetchClass('\CollectionBase')
                ->select()
                ->column(null, 'user_id');
            $resSpeak = self::alias('s')
                ->join('talk_user u', 's.user_id = u.user_id', 'left')
                ->where([
                    's.live_id' => $liveId,
                    's.user_id' => ['in', $userIds],
                	's.statistics_type' => $liveSpeakType,
                ])
                ->field('s.id,s.user_id,sum(s.total) as total,u.alias,u.head_add')
                ->group('s.user_id')
                ->fetchClass('\CollectionBase')
                ->select()
                ->column(null, 'user_id');

            $sortArr = [];
            foreach ($userIds as $k => $v){
                $res[$k]['time_total'] = $res[$k]['speak_total'] = 0;
                if(isset($resTime[$v])){
                	$res[$k]['id'] = $v;
                    $res[$k]['head_add'] = "<img style='width: 40px;height: 40px' src='{$resTime[$v]['head_add']}'>";
                    $res[$k]['alias'] = $resTime[$v]['alias'];
                    $res[$k]['time_total'] = $resTime[$v]['total'];
                }
                if(isset($resSpeak[$v])){
                	$res[$k]['id'] = $v;
                    $res[$k]['head_add'] = "<img style='width: 40px;height: 40px' src='{$resSpeak[$v]['head_add']}'>";
                    $res[$k]['alias'] = $resSpeak[$v]['alias'];
                    $res[$k]['speak_total'] = $resSpeak[$v]['total'];
                }
                $sortArr[] = $res[$k]['time_total'];
            }
            //按时长排序
            array_multisort($sortArr, SORT_DESC, $res);
        }
        return $res;
    }

    /**
     * 获取课程直播间--课程安排数据
     * @name
     * @Description
     * @remark
     * @author Lizhijian
     * @param bool $pageFlag
     * @return mixed
     * @example
     */
    public static function sumCoursePlanTable($pageFlag = true){

        $page = input('pageNumber');
        $startTime = input('logmin') ?  : '2011-01-01';
        $endTime = input('logmax') ?  : date('Y-m-d');
        $pageSize = input('pageSize') ?  : 10;
        $offset = ($page-1) * $pageSize;

        //子课程
        $liveId = input('liveId');
        $courseM = new Course();
        $whereChild = 's.live_id = 0 AND ';
        $childInfo = $courseM
            ->alias('c')
            ->where('pid', $liveId)
            ->join('talk_user u','c.uid=u.user_id', 'left')
            ->column('c.class_name,u.alias,u.head_add,c.id', 'id');
        if($childInfo) {
            $whereChild = 's.live_id in ('.implode(',', array_column($childInfo, 'id')).') AND ';
        }

        $where = '';
        if(input('class_name')) {
            $where .= 'c.class_name like \'%'.input('class_name').'%\' AND ';
        }
        if(input('alias')) {
            $where .= 'u.alias like \'%'.input('alias').'%\' AND ';
        }

        if(true === $pageFlag) {
            $limit = " LIMIT $offset,$pageSize";
        }else{
            $limit = '';
        }
        //执行SQL，并返回
        $sql = "SELECT
	c.class_name,c.uid,s.id,c.id as course_id,c.study_num,u.alias,
	SUM(s.total) AS total,
	CASE WHEN c.plan_num > 0 THEN c.plan_num
	ELSE '-'
	END as plan_num,
	CASE WHEN c.pid > 0 THEN '系列课'
	ELSE '单节课'
	END as type
FROM
	talk_live_statistics s
LEFT JOIN talk_course c ON s.live_id = c.id
LEFT JOIN talk_user u ON c.uid = u.user_id

WHERE 
$whereChild
$where 
s.live_id < 1000000000
AND
s.statistics_time BETWEEN FROM_UNIXTIME(
			UNIX_TIMESTAMP('$startTime'),
			'%Y%m%d'
		)
AND FROM_UNIXTIME(
			UNIX_TIMESTAMP('$endTime'),
			'%Y%m%d'
		)

GROUP BY
	s.live_id
ORDER BY 
    c.create_time DESC 
	";

        $res = self::query($sql.$limit);
        self::$count = count(self::query($sql));

        //人均发言次数
        $liveIds = $sinpleIds = [];
        foreach ($res as $v){
            $liveIds[] =  $v['course_id'];
            if($v['type'] == '系列课'){
                $sinpleIds[] =  $v['course_id'];
            }
        }
        $liveTimeInfo = self::getCourseLiveTotalById($startTime, $endTime, $liveIds, LiveStatistics::COURSE_LIVE_TIME);//获取总停留时长,人均停留时长
        $liveSpeakInfo = self::getCourseLiveTotalById($startTime, $endTime, $liveIds, LiveStatistics::COURSE_LIVE_SPEAK);//课程直播发言次数,人均发言次数
        $historyInfo = self::getHistory($startTime, $endTime, $liveIds);//课程历史人数

        //构造数据
        foreach ($res as $k => $v){

            $res[$k]['total'] = $res[$k]['ave_total'] = '-';
            $res[$k]['speak_total'] = $res[$k]['ave_speak_total'] = '-';
            $res[$k]['history_total'] = '-';

            if(isset($liveTimeInfo[$v['course_id']])){
                $res[$k]['total'] = $liveTimeInfo[$v['course_id']]['total'];
                $res[$k]['ave_total'] = $liveTimeInfo[$v['course_id']]['ave_total'];
            }
            if(isset($liveSpeakInfo[$v['course_id']])){
                $res[$k]['speak_total'] = $liveSpeakInfo[$v['course_id']]['total'];
                $res[$k]['ave_speak_total'] = $liveSpeakInfo[$v['course_id']]['ave_total'];
            }
            if(isset($historyInfo[$v['course_id']])){
                if($historyInfo[$v['course_id']]['total']){
                    $res[$k]['history_total'] =
                        "<a href=\"/StatisticsData/sumCourseHistory?liveId={$v['course_id']}&tabName1=课程直播间&tabName2=历史人数\">{$historyInfo[$v['course_id']]['total']}</a>";
                }else{
                    $res[$k]['history_total'] = 0;
                }
            }
        }
        return $res;
    }

    /**
     * 根据统计表live_id获取统计数据
     * @param $startTime
     * @param $endTime
     * @param $liveIds
     * @param $type
     * @return array
     * @author Lizhijian
     */
    protected static function getCourseLiveTotalById($startTime, $endTime, $liveIds, $type){

        if(empty($liveIds)){
            return [];
        }
        //总停留时间
        $res = self::where([
            's.statistics_time' => ['between', [
                date('Ymd', strtotime($startTime)),
                date('Ymd', strtotime($endTime))
            ]],
            's.statistics_type' => $type,
            's.live_id' => ['in', $liveIds],
        ])
            ->alias('s')
            ->join('talk_course c', 's.live_id = c.id', 'left')
            ->join('talk_user u', 'c.uid = u.user_id', 'left')
            ->group('s.live_id')
            ->column('SUM(s.total) as total, COUNT(s.id) as num, round(SUM(s.total)/COUNT(s.id),2) ave_total, c.class_name, s.live_id')
        ;
        $back = [];
        foreach ($res as $k => $v){
            $back[$v['live_id']] = $v;
        }
        return $back;
    }

    /**
     * 获取课程计划安排
     * @param $pIds
     * @return array
     * @author Lizhijian
     */
    protected static function getCoursePlan($pIds){
        if(empty($pIds)){
            return [];
        }
        //系列课有多少节子课
        $newPids = $pIds;
        sort($newPids);
        $has = self::table('talk_course')
        ->where('pid', 'in', $newPids)
            ->group('pid')
            ->column('count(id) has_num', 'pid');
        //系列课计划有多少节子课
        $plan = self::table('talk_course')
            ->where('id', 'in', $pIds)
            ->group('id')
            ->column('plan_num', 'id');
        $back = [];
        //构造返回数组
        foreach ($pIds as $k => $v){
            $back[$k] = [
                'has_num' => isset($has[$v])? $has[$v]:'-',
                'plan_num' => isset($plan[$v])? $plan[$v]:'-',
            ];
        }
        return $back;
    }

    /**
     * 获取历史人数
     * @param $startTime
     * @param $endTime
     * @param $liveIds
     * @return array
     * @author Lizhijian
     */
    protected static function getHistory($startTime, $endTime, $liveIds){
        if(empty($liveIds)){
            return [];
        }
        $res = self::where('live_id', 'in', $liveIds)
            ->where('statistics_time', 'BETWEEN', [
                date('Ymd', strtotime($startTime)),
                date('Ymd', strtotime($endTime))
            ])
            ->group('live_id')
            ->field('count(distinct user_id) as total, live_id')->select();
        $back = [];
        foreach ($res as $v){
            $back[$v['live_id']] = $v;
        }
        return $back;
    }
    /**
     * 获取公共直播间指定课程人均在线时长
     * @param  [type] $course_id [description]
     * @return [type]            [description]
     */
    public function getPublicRoomPerCapitaOnline($course_id){
        $where['global_id'] = $course_id;
        $numTotal = $this->where($where)->sum('total');
        $peopleNum = $this->where($where)->count();
        if($numTotal == 0 || $peopleNum == 0){
            return 0;
        }
        return $numTotal/$peopleNum;
    }
    /**
     * 家华课堂人数统计
     * @param  [type] $page      [description]
     * @param  [type] $limit     [description]
     * @param  [type] $startTime [description]
     * @param  [type] $endTime   [description]
     * @param  [type] $groupid   [description]
     * @return [type]            [description]
     */
    public function jhStatistics($page,$limit,$startTime,$endTime,$groupid){
        $where = array();
        $where['global_id'] = ['in',[1,2,3,4,5,6,7]];
        $where['statistics_type'] = 1;
        $page = !isset($page) ? 0 : $page;
        $size = !isset($limit) ? 10 : $limit;
        !empty($startTime) ? $where['statistics_time'] = ['>=',date('Ymd',strtotime($startTime))] : ''; 
        !empty($endTime) ? $where['statistics_time'] = ['<=',date('Ymd',strtotime($endTime))] : ''; 
        !empty($startTime) && !empty($endTime) ? $where['statistics_time'] = ['between',[date('Ymd',strtotime($startTime)),date('Ymd',strtotime($endTime))]] : '';
        !empty($groupid) ? $where['global_id'] = $groupid : '';
        $where['live_id'] = 1000010029;
        $data['list'] = $this
        ->field('*,sum(total) as timeTotal,count(user_id) as userTotal')
        ->where($where)
        ->group('statistics_time,global_id')
        ->page($page,$size)
        ->select();
        $data['count'] = $this
        ->field('*,sum(total),count(user_id)')
        ->where($where)
        ->group('statistics_time,global_id')
        ->select();
        $data['count'] = count($data['count']);
        return $data;
    }
    /**
     * 获取家华在线人数列表
     * @param  [type] $page    [description]
     * @param  [type] $limit   [description]
     * @param  [type] $groupid [description]
     * @return [type]          [description]
     */
    public function jsOnlineList($page,$limit,$statistics_time,$global_id,$groupid){
        $where = array();
        $where['l.global_id'] = $global_id;
        $where['l.statistics_type'] = 1;
        $where['l.live_id'] = 1000010029;
        $where['l.statistics_time'] = $statistics_time;
        $page = !isset($page) ? 0 : $page;
        $size = !isset($limit) ? 10 : $limit;
        !empty($groupid) ? $where['u.groupid'] = $groupid : '';
        $data['list'] = $this
        ->alias('l')
        ->field('l.*,u.groupid as userGroup')
        ->join('talk_user_jiahua u','u.user_id = l.user_id')
        ->where($where)
        ->page($page,$size)
        ->select();
        $data['count'] = $this
        ->alias('l')
        ->field('l.*,u.groupid as userGroup')
        ->join('talk_user_jiahua u','u.user_id = l.user_id')
        ->where($where)
        ->count();
        return $data;
    }
}