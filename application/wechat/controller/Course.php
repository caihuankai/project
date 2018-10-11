<?php

namespace app\wechat\controller;

use app\wechat\model\User as MUser;
use think\controller\Rest;
use app\wechat\model\Course as MCourse;
use app\common\controller\JsonResult;

/**
 * Class Course
 *
 * @property \app\wechat\model\Live live
 * @package app\wechat\traits
 */
class Course extends App
{
    
    use \app\wechat\traits\Live,
        \app\wechat\traits\Course,
    
        \app\wechat\traits\QiNiu;
    
    
    protected $noLoginAction = [
        'courseCreatePushUser',
        'handleCourseInfoVideoBeQiNiuCallback',
        'addKeepCourse',
        'delKeepCourse',
        'listKeepCourse',
    ];
    
    /**
     * 创建课程
     *
     * @return \think\response\Json
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function create()
    {
        $request = $this->request;
        $formatBool = $request->post('formatBool', 0); // 成功时返回格式修改
        $type = $request->post('type', 'single'); // 课程类型，series系列课，single为单节课
        $form = $request->post('form/i', 1); // 1为图文语言（普通），2为视频直播，3为ppt直播
        $name = $request->post('name', ''); // 课程名称
        $pid = $request->post('pid/i', 0); // 指定的系列课
        $cate = $request->post('cate/i', 0);
        $level = $request->post('level/i', 0); // 1为密码，2为收费
        $password = $request->post('password', '');
        $teacherId = $request->post('teacherId/i', 0); // 指定老师
        $price = $this->disPrice($request->post('price/f', 0), 0);
        $originPrice = $this->disPrice($request->post('originPrice/f', 0), 0);
        $this->validateByName();
        $userId = $this->getUserId();
    
    
        if ($level == 1 && empty($password)){
            return $this->errSysJson('', '密码不能为空');
        }else if ($level == 2){ // 价格校验
            if ($price < 1){
                return $this->errSysJson('最小金额不能低于1元');
            }else if ($originPrice > 0 && $price > $originPrice){
                return $this->errSysJson('原价不能比优惠价低');
            }
        }
    
        if (empty($pid) && empty($cate)) { // 检测课程分类是否正确
            // 后台会存在修改直播间分类的情况，前台就不检测是否是直播间分类下的字分类
            return $this->errSysJson(JsonResult::ERR_COURSE_ERROR);
        }
        
        
        $model = new \app\wechat\model\Course();
        
        // 检测当前用户权限
        $this->checkTeacherPermissions($userId, 1);
    
        
        
        if ($type === 'single' && !empty($pid)){ // 系列课的单节课
            $pidData = $model->checkPid($pid, false, 'id, uid, open_status, cate_id, level, price, class_name');
            if ($pidData === false){
                return $this->errSysJson($model->getError());
            }
            
            // 此时不需要传递teacherId（助教帮老师创建子课程，不需要传递teacherId）
            $teacherId = $pidData['uid'] != $userId ? $pidData['uid'] : 0;
        }
        
        
        if (!empty($teacherId)) { // 助教指定老师
            // 创建老师的
            if (!(new \app\wechat\model\UserAssistant())->checkUserManageTeacher($userId, $teacherId)){
                return $this->errSysJson(\app\common\controller\JsonResult::ERR_ASSISTANT_NO_PERMISSIONS);
            }
    
            // 检测老师的课程是否被关闭
            $this->checkTeacherPermissions($teacherId, 1, \app\common\controller\JsonResult::ERR_ASSISTANT_NO_PERMISSIONS);
        }else if (empty($teacherId) && $this->ifAssistant()){ // 助教不能发布自己的课程
            return $this->errSysJson('必须选择讲师，否则无法创建');
        }
        
        $this->liveFieldTrait = 'id, cid, open_status, user_id';
        $liveData = $this->getLiveDataTrait(!empty($teacherId) ? $teacherId : 0); // 有teacherId就不能用userId，是创建teacherId的课程
        
        
        $save = [
            'uid' => $liveData['user_id'],
            'live_id' => $liveData['id'],
            'cate_id' => $cate,
            'class_name' => $name,
            'level' => $level,
            'password' => $level == 1 && !empty($password) ? $password : '',
            'price' => $level == 2 && !empty($price) ? $price : 0.00,
            'origin_price' => $level == 2 && !empty($originPrice) ? $originPrice : 0.00,
            'study_num' => mt_rand(10, 80),
        	'type' => 1,
        	'form' => 1
        ];

        
        if ($type === 'series'){ // 系列课
            $planNum = $request->post('planNum/i', '0');
            $img = $request->post('img', '');
            if (mb_strlen($name) < 4){
                return $this->errSysJson('课程名字需在4-25个汉字之间');
            }
            
            if (!in_array($level, [0, 2])){ // 没有加密课程
                $save['level'] = 0;
                $save['price'] = 0.00;
            }
            
            $save['plan_num'] = $planNum;
            $save['src_img'] = $this->getSeriesCourseImgSrc($img);
            $save['begin_time'] = '00:00:00 00.00.00';
            $save['type'] = 2;
        
        }else{ // 单节课  single
            $currentData = date('Y-m-d H:i:s', strtotime('-1 hours'));
            $date = $request->post('date', '');
            if (empty($date) || !\ThinkPHP\Validate::is($date,'date') || $date < $currentData){
                return $this->errSysJson('请选择直播开始时间');
            }
            
            // form
            if (!$model->getMysqlTinyint('form')->existsValue($form)){
                return $this->errSysJson(\app\common\controller\JsonResult::ERR_PARAMETER);
            }
            
            
            if (!empty($pidData)){ // 指定系列课
                $save['pid'] = $pidData['id'];
                // 继承系列课
                $save['price'] = $pidData['price'];
                $save['level'] = $pidData['level'];
                $save['cate_id'] = $pidData['cate_id']; // 系列课的单次课程继承系列课
            }
    
    
            $save['src_img'] = \helper\UrlSys::handleCourseBackImg();
            $save['begin_time'] = $date;
            $save['form'] = $form;

        }
        
    
        $courseId = $model->insertGetId($save);
        
        //创建消息中心记录
        $userIdList = [$userId];
        if (!empty($teacherId)) {
        	$userIdList[] = $teacherId;
        }
        if ($save['type'] == 1 && !isset($save['pid'])) {//单次课
        	//成功创建课程
        	$replaceArray = [
        			'lead'=>[$save['class_name']],
        			'content'=>[$save['class_name']]
        	];
        	\MessageCenter::instance()->createMessageRecords('COURSE_CREATE', ['courseId'=>$courseId,'level'=>$save['level'],'form'=>$save['form']], $replaceArray, $userIdList);
        	//关注直播间发布新课
        	$teacherName = (new \app\wechat\model\User())->getInfoById($save['uid'], 'alias')['alias'];
        	$replaceArray = [
        			'lead'=>[$teacherName,$save['class_name']],
        			'content'=>[
        					date('m月d日'),
        					$teacherName,
        					$save['class_name'],
        					$save['begin_time']
        			]
        	];
        	$userIdList = (new \app\wechat\model\LiveFocus())->getFocusList($save['live_id'], 'user_id');
        	$userIdList = \MessageCenter::instance()->getArrayValueByKey($userIdList, 'user_id');
        	\MessageCenter::instance()->createMessageRecords('COURSE_CREATE_TO_LIVE_FOCUS', ['courseId'=>$courseId,'level'=>$save['level'],'form'=>$save['form']], $replaceArray, $userIdList);
        }elseif ($save['type'] == 2) {
        	//成功创建系列主课课程
        	$replaceArray = [
        			'lead'=>[$save['class_name']],
        			'content'=>[$save['class_name']]
        	];
        	\MessageCenter::instance()->createMessageRecords('COURSE_SERIES_CREATE', ['courseId'=>$courseId], $replaceArray, $userIdList);
        	//已关注的老师发布新系列课主课
        	$teacherName = (new \app\wechat\model\User())->getInfoById($save['uid'], 'alias')['alias'];
        	$replaceArray = [
        			'lead'=>[$teacherName,$save['class_name']],
        			'content'=>[
        					date('m月d日'),
        					$teacherName,
        					$save['class_name'],
        					$save['plan_num']
        			]
        	];
        	$userIdList = (new \app\wechat\model\LiveFocus())->getFocusList($save['live_id'], 'user_id');
        	$userIdList = \MessageCenter::instance()->getArrayValueByKey($userIdList, 'user_id');
        	\MessageCenter::instance()->createMessageRecords('COURSE_SERIES_CREATE_TO_LIVE_FOCUS', ['courseId'=>$courseId], $replaceArray, $userIdList);
        }elseif ($save['type'] == 1 && isset($save['pid'])) {
        	//成功创建系列课子课程
        	$replaceArray = [
        			'lead'=>[$save['class_name']],
        			'content'=>[$save['class_name']]
        	];
        	\MessageCenter::instance()->createMessageRecords('COURSE_SERIES_CREATE_CHILD', ['courseId'=>$courseId,'level'=>$save['level'],'form'=>$save['form']], $replaceArray, $userIdList);
        	//已购买系列课更新子课程
        	$replaceArray = [
        			'lead'=>[$pidData['class_name']],
        			'content'=>[
        					date('m月d日'),
        					$pidData['class_name'],
        					$save['class_name'],
        					$save['begin_time']
        			]
        	];
        	$userIdList = (new \app\wechat\model\PayOrder())->getUserIdsByCourse($save['pid']);
        	\MessageCenter::instance()->createMessageRecords('COURSE_SERIES_CREATE_CHILD_TO_BUY_USER', ['courseId'=>$courseId,'level'=>$save['level'],'form'=>$save['form']], $replaceArray, $userIdList);
        }
        
        
        // 推送消息
        $this->createCoursePushMsg($courseId, $name, $teacherId);
    
        // 处理返回值，兼容版本
        if ($formatBool) {
            $formatBool = [
                'courseId'   => $courseId,
                // 视频流地址
                'videoSteam' => isset($save['form']) && $save['form'] == 2 ?
                    \app\common\model\RedirectUrl::getVideoSteam($liveData['user_id'], $courseId) :
                    '',
            ];
        } else {
            $formatBool = $courseId;
        }
        
        return $this->sucSysJson($formatBool);
    }
    
    
    /**
     * 获取课程分类列表
     *
     * @return \think\response\Json
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function courseCate()
    {
        // 显示时也显示第一个一级分类下的二级分类
//        $this->liveFieldTrait = 'id, cid, open_status';
//        $liveData = $this->getLiveDataTrait();
        $model = new \app\wechat\model\LiveCate();
        $firstData = $model->getFirstFloorCate('id');
        if (empty($firstData)) {
            return $this->sucSysJson([]);
        }
        
        $result = array_values($model->getCourseCate($firstData['id'], 'id, name'));
        
        return $this->sucSysJson($result);
    }
    
    
    /**
     * 需要操作课程时，调用此方法，自动抛出错误
     *
     * @param $courseId
     * @param $field
     * @return array|false|\PDOStatement|string|\think\Model
     * @author aozhuochao
     */
    protected function handleCourse($courseId, $field)
    {
        if (empty($courseId)) {
            $this->abortError(\app\common\controller\JsonResult::ERR_COURSE_NOT_EXIST);
        }
        
        /** @var \app\wechat\model\Course $model */
        $model = model('Course');
        $courseData = $model->where(['id' => ['eq', $courseId]])->field($field)->find();
        if (empty($courseData)) { // 不存在
            $this->abortError(\app\common\controller\JsonResult::ERR_COURSE_NOT_EXIST);
        }
        if (isset($courseData['status']) && $courseData['status'] == 5){ // 删除
            $this->abortError(\app\common\controller\JsonResult::ERR_COURSE_DELETE);
        }
        
        if (isset($courseData['uid'])){ // 检测课程权限是否关闭
            $this->checkTeacherPermissions($courseData['uid'], 1);
        }
        
        // 检测当前用户权限
        $this->checkTeacherPermissions($this->getUserId(), 1);
        
        if (!($courseData['uid'] == $this->getUserId() || $this->ifAssistant($courseData['uid']))){ // 无权限
            $this->abortError(\app\common\controller\JsonResult::ERR_NOT_PERMISSIONS);
        }
        
        
        return $courseData;
    }
    
    
    /**
     * 助教管理单个课程的开启和关闭状态
     *
     * @return \think\response\Json
     * @author aozhuochao
     */
    public function assistantHandleCourseStatus()
    {
        $courseId = $this->request->get('courseId/i', 0);
        $status = $this->request->get('status/i', 0);
        $courseModel = new \app\wechat\model\Course();
        
    
        if (empty($courseId) || empty($status) || !$courseModel->getMysqlTinyint('open_status')->existsValue($status)) {
            return $this->errSysJson(\app\common\controller\JsonResult::ERR_PARAMETER);
        }
        
        $courseData = $courseModel->where(['id' => ['eq', $courseId]])->field('id, uid, status')->find();
        if (empty($courseData)) { // 不存在
            return $this->errSysJson(\app\common\controller\JsonResult::ERR_COURSE_NOT_EXIST);
        }
        if (isset($courseData['status']) && $courseData['status'] == 5){ // 删除
            return $this->errSysJson(\app\common\controller\JsonResult::ERR_COURSE_DELETE);
        }
    
        if (!$this->ifAssistant($courseData['uid'])) { // 是否为当前助教
            return $this->errSysJson(\app\common\controller\JsonResult::ERR_NOT_PERMISSIONS);
        }
        
        $courseModel->closeStatus($courseData['id'], $status);
    
        return $this->sucSysJson(1);
    }
    
    
	
    /**
     * 我的课程的   课程管理的操作
     * 助教不能置顶
     *
     * @param $courseId
     * @param int $type 1为置顶，2为删除，3取消置顶
     * @return \think\response\Json
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function changeMyCourseByType($courseId, $type)
    {
        $userId = $this->getUserId();
        $this->validateByName();
    
        /** @var \app\wechat\model\Course $model */
        $model = model('Course');
        $courseData = $this->handleCourse($courseId, 'live_id, top_sort, status, uid, type');

        
        if ($type == 1 && $courseData['top_sort'] == 0){ // 置顶
            \think\Db::transaction(function ()use($courseId, $userId, $model, $courseData){
                
                $model->update(['top_sort' => 0], ['live_id' => $courseData['live_id'], 'top_sort' => ['>', 0]]); // 空间内其他课程取消置顶
                $model->update(['top_sort' => 1], ['id' => $courseId]); // 当前课程设置为置顶
            });
        }else if ($type == 2){ // 删除
        	//删除系列课时要检查是否存在子课程，存在则不允许删除
        	if ($courseData['type'] == 2) {
        		$childCourseNumList= $model->getChildCourseNum([$courseId], false);
        		if (isset($childCourseNumList[$courseId]) && $childCourseNumList[$courseId] > 0) {
	        		return $this->errSysJson('系列课内有单节课，不可删除！');
	        	}
        	}
            $model->update(['status' => 5], ['id' => $courseId, 'uid' => $userId]);
        }else if ($type == 3){ // 取消置顶
            $model->update(['top_sort' => 0], ['id' => $courseId, 'uid' => $userId]);
        }
        
        return $this->sucSysJson(1);
    }
    
    /**
     * 根据直播间获取课程列表
     * 大部分课程列表统一接口
     *
     * @param int $page
     * @param int $level -1为获取全部（默认），0：免费公开课程；1：加密课程；2：收费课程
     * @param int $type 课程类型:0全部课程，1为单节课程，2为系列课程
     * @return \think\response\Json
     * @internal param int $live_id
     */
    public function getCourseListByLiveId($page = 1, $perPage = 10, $level = -1, $type = 0)
    {
        $this->validateByName('common.page');
        $live_id = (int)input("live_id", 0); // 可以为空
        $level = intval($level);
        $type = intval($type);
        $m = new MCourse();
        
        if (!($level == -1 || $m->validateLevel($level))) {
            return $this->errSysJson(\app\common\controller\JsonResult::ERR_PARAMETER);
        }
        if ($type == 2 && $level == 1) {
        	return $this->errSysJson("系列课没有加密类型");
        }
    
        $rs = $m->getCourseListByLiveId($live_id, $level, $page, $type, $perPage);
        
        //检查是否为系列课
        $pidList = [];
        foreach ($rs as $course) {
        	if ($course['type'] == 2) {
        		$pidList[] = $course['id'];
        	}
        }
        //查询系列课现有子课程数量
        if (!empty($pidList)) {
        	$childCourseNumList = $m->getChildCourseNum($pidList);
        	foreach ($rs as $key=>$course) {
        		if ($course['type'] == 2) {
        			$rs[$key]['childCourseNum'] = isset($childCourseNumList[$course['id']]) ? $childCourseNumList[$course['id']] : 0;
        		}
        	}
        }
    
        return $this->sucSysJson($rs);
    }
    
    
    /**
     * 根据直播间id获取课程数量
     *
     * @param     $liveId
     * @param int $level -1为获取全部（默认），0：免费公开课程；1：加密课程；2：收费课程
     * @param int $type 课程类型:0全部课程，1为单节课程，2为系列课程
     * @return \think\response\Json
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function getCourseNumByLiveId($liveId, $level = -1, $type = 0)
    {
        $liveId = intval($liveId);
        $model = new \app\wechat\model\Course();
        if (empty($liveId) || !($level == -1 || $model->validateLevel($level))) {
            return $this->sucSysJson(0);
        }
        if ($type == 2 && $level == 1) {
        	return $this->errSysJson("系列课没有加密类型");
        }
        
        $num = $model->relevantCourseCount($liveId, (int)$level, (int)$type);
        
        return $this->sucSysJson($num);
    }
    
    
    
    /**
     * 发布新课，提示直播间的粉丝
     * 这是一个异步程序执行
     * 不登录检测
     *
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function courseCreatePushUser($key)
    {
        return;
        ignore_user_abort();
        fastcgi_finish_request();
        $courseId = intval(\CacheBase::get($key, ''));
    
        if (empty($courseId)) {
            \think\Log::error(__METHOD__ . '--参数错误--' . $key);
            return;
        }
        
        $model = new \app\wechat\model\Course();
        $data = $model->joinUser()->where(['c.id' => $courseId])->alias('c')
            ->field('c.id, c.class_name, c.begin_time, c.pid, c.type, c.plan_num, l.id liveId, u.alias username')
            ->join('live l', 'l.id = c.live_id')->find();
    
        if (empty($data)) {
            \think\Log::error(__METHOD__ . '--课程不存在');
            return;
        }
    
        $userList = (new \app\wechat\model\LiveFocus())->getFocusList($data['liveId'], 'user_id');
    
        if (!empty($userList)) {
            $userIds = [];
            /** @var \app\wechat\model\ThirdLogin $loginModel */
            $loginModel = model('ThirdLogin');
            
            foreach ($userList as $item) {
                $userIds[] = $item['user_id'];
            }
            
            
            if ($data['pid'] > 0){ // 系列课里的单机课程
                // 系列课里的单机课程才进行 购买通知，通知所有这个系列课的用户
                $pName = getDataByKey($model->getCourseColumn((array)$data['pid']), $data['pid'], '');
    
                if (empty($pName)) {
                    goto NOT_BUY;
                }
                
                $buyUserIds = (new \app\wechat\model\PayOrder())->getUserIdsByCourse($data['pid']);
                $userIdsOpenId = $loginModel->getUserOpenId($buyUserIds);
    
                $msg = \PushMsgTemp::instance()->getMsg(\PushMsgTemp::COURSE_SERIES_THE_CREATE_TO_COURSE_BUY_USER, [
                    date('m月d日'),
                    $pName,
                    $data['class_name'],
                    $this->disDate($data['begin_time'], 2),
                    $model->getCourseUrl($data['id']),
                ]);
    
    
                foreach ($buyUserIds as $buyUserId) {
                    // 一个一个推送
                    if (isset($userIdsOpenId[$buyUserId])){
                        \WeChat\app::staffMsg($msg, $userIdsOpenId[$buyUserId]);
                        usleep(10);
                    }
                }
    
                $userIds = array_diff($userIds, $buyUserIds);
            }

            
            NOT_BUY:;
            
            
            // 关注通知
            $openIdData = $loginModel->getUserOpenId($userIds);
            
            if ($data['type'] == 2){ // 系列课
                $msg = \PushMsgTemp::instance()->getMsg(\PushMsgTemp::COURSE_SERIES_CREATE_TO_LIVE_FOCUS, [
                    date('m月d日'),
                    $data['username'],
                    $data['class_name'],
                    $data['plan_num'],
                    $model->getCourseUrl($data['id']),
                ]);
            }else{
                $msg = \PushMsgTemp::instance()->getMsg(\PushMsgTemp::COURSE_CREATE_TO_LIVE_FOCUS, [
                    date('m月d日'),
                    $data['username'],
                    $data['class_name'],
                    $this->disDate($data['begin_time'], 2),
                    $model->getCourseUrl($data['id']),
                ]);
            }
            
            foreach ($openIdData as $userId => $openId) {
                // 一个一个推送
                \WeChat\app::staffMsg($msg, $openId);
                usleep(10);
            }
        }
        
    }
    
    
    /**
     * 修改和删除课程介绍的音频链接
     *
     * @return \think\response\Json
     * @author aozhuochao
     */
    public function handleCourseInfoVideo()
    {
        $courseId = $this->request->post('courseId/i', 0);
        $action = $this->request->post('action/i', 1); // 1为修改，2为删除
        $url = $this->request->post('url', '');
        $time = $this->request->post('time', 0);
        $userId = $this->getUserId();
    
        if (empty($courseId)) {
            return $this->errSysJson(\app\common\controller\JsonResult::ERR_PARAMETER);
        }
    
    
        /** @var \app\wechat\model\Course $courseModel */
        $courseModel = model('Course');
        $picModel = new \app\wechat\model\QiniuGallerys();
        // 检测当前课程所有者
        $courseData = $this->handleCourse($courseId, 'id, info_video_qg_id, uid');
        // 删除匿名函数
        $delFunc = function ($qiNiuId)use($picModel, $courseModel, $courseData){
            $picModel->where(['id' => $qiNiuId])->delete();
            $courseModel->update(['info_video_qg_id' => 0], ['id' => $courseData['id']]);
        };
        
        
        if ($action == 2){ // 删除
            $delFunc($courseData['info_video_qg_id']);
            
            return $this->sucSysJson(1);
        }else{ // 修改
            if (empty($url)) {
                return $this->errSysJson(\app\common\controller\JsonResult::ERR_PARAMETER);
            }
    
            $urlArr = parse_url($url);
            $picDataFunc = function (&$picData)use($urlArr, $url){
                if (!empty($urlArr['host'])){
                    $picData['qiniuKey'] = trim($urlArr['path'], '/');
                }else{
                    $picData['mediaId'] = $url;
                    $picData['qiniuKey'] = '';
                }
            };
            
    
            if (empty($courseData['info_video_qg_id'])) { // 插入
                $picData = [
                    'userId' => $userId, 'positionType' => 4, 'videoTime' => $time
                ];
                $picDataFunc($picData);
                $courseData['info_video_qg_id'] = $picModel->insertGetId($picData);
                $courseModel->update(['info_video_qg_id' => $courseData['info_video_qg_id']], ['id' => $courseData['id']]);
            }else{ // 更新
                $picData = ['videoTime' => $time];
                $picDataFunc($picData);
                $picModel->update($picData, ['id' => $courseData['info_video_qg_id']]);
            }
    
            if (!empty($urlArr['host'])){ // 处理pc直接上传url
                return $this->sucSysJson($courseModel->courseInfoVideoFormat($courseData['info_video_qg_id']));
            }
    
            // 事件执行
            \think\Hook::add('response_end',function()use($url, $courseData, $picModel, $delFunc){
                $callbackUrl = 'Course/handleCourseInfoVideoBeQiNiuCallback';
                $func = function ($data){ // 解决写入redis比处理文件速度慢的考虑
                    \CacheBase::set(\CacheBase::getCacheName(__CLASS__, $data['key']), 1, 86400);
                };
                
                
                $data = \Qiniu::instance()->upWeChatMp3($url, $callbackUrl, $func);
                if ($data === false) { // 重试
                    $data = \Qiniu::instance()->upWeChatMp3($url, $callbackUrl, $func);
                }
    
                if ($data !== false){ // 成功
                    // 写redis
                    \CacheBase::set(\CacheBase::getCacheName(__CLASS__, $data[0]['key']), [
                        'qgId' => $courseData['info_video_qg_id'],
                        'persistentId' => $data[1],
                    ], 86400);
                }else{
                    $delFunc($courseData['info_video_qg_id']);
                }
            });
            
            return $this->sucSysJson($courseModel->courseInfoVideoFormat($courseData['info_video_qg_id']));
        }
    }
    
    
    /**
     * handleCourseInfoVideo的七牛回调处理
     *
     * @author aozhuochao
     */
    public function handleCourseInfoVideoBeQiNiuCallback()
    {
        static $i = 1;
        $param = $this->request->param('key');
        $cacheKey = \CacheBase::getCacheName(__CLASS__, $param);
        $arr = \CacheBase::get($cacheKey);
        if (empty($arr)) {
            \think\Log::error(['七牛处理回调失败', $this->request->server()]);
            return;
        }
        if (!is_array($arr)) { // 解决写入redis比处理文件速度慢的考虑
            if ($i > 2){
                \think\Log::error(['出现写入redis比处理文件速度慢', $arr]);
                return;
            }
            ++$i;
            sleep(1);
            $this->handleCourseInfoVideoBeQiNiuCallback();
            return;
        }
        
        $persistentId = isset($arr['persistentId']) ? $arr['persistentId'] : 0;
        $qgId = isset($arr['qgId']) ? $arr['qgId'] : 0;
    
        if (empty($persistentId) || empty($qgId)) {
            \think\Log::error(['七牛处理回调失败', $this->request->server()]);
            return;
        }
        
        // 查询状态
        list($data, $error) = \Qiniu\Processing\PersistentFop::status($persistentId);
    
        if (!is_null($error)) {
            \think\Log::error(['七牛处理查看状态失败', $error]);
            return;
        }
        
        if (isset($data['code']) && $data['code'] == 0 && is_array($data['items'])){
            $picModel = new \app\wechat\model\QiniuGallerys();
            foreach ($data['items'] as $item) {
                if (!empty($item['error'])){
                    \think\Log::error(['七牛处理单个任务失败', $item]);
                    continue;
                }else if(isset($item['cmd']) && $item['cmd'] === 'avthumb/mp3'){ // 转mp3成功
                    $picModel->update(['qiniuKey' => $item['key'], 'hash' => $item['hash']], ['id' => $qgId]);
                    
                    // 删除缓存
                    \CacheBase::rm($cacheKey);
                    \think\Log::record($item, 'debug');
                    break;
                }
            }
        }else{
            \think\Log::error(['七牛处理查看状态失败', $data]);
            return;
        }
    }
    
    
    
    
    /**
     * 查询直播间推荐过的课程
     * @return \think\response\Json
     * @author liujuneng
     */
    public function getCourseRecommend()
    {
    	$request = $this->request;
    	$userId = $request->param('userId/i');
    	$receiverType = $request->param('receiverType/i');
    	$receiverId = $request->param('receiverId/i');
    	$pageNo = $request->param('pageNo/i', 1);
    	$perPage = $request->param('perPage/i', 20);
    	$orderBy = $request->param('orderBy', 'id desc');
    	$this->validateByName();
    	
    	$model = new \app\wechat\model\RecommendLog();
    	$type = 1;
    	$condition = null;
    	$isUserInfo = true;
    	$courseList = $model->getRecommendLogByType($userId, $receiverType, $receiverId, $type, $condition, $pageNo, $perPage, $orderBy, $isUserInfo);
    	
    	//检查是否为系列课
    	$pidList = [];
    	foreach ($courseList as $course) {
    		if ($course['type'] == 2) {
    			$pidList[] = $course['id'];
    		}
    	}
    	//查询系列课现有子课程数量
    	if (!empty($pidList)) {
    		$model = new MCourse();
    		$childCourseNumList = $model->getChildCourseNum($pidList);
    		foreach ($courseList as $key=>$course) {
    			if ($course['type'] == 2) {
    				$courseList[$key]['childCourseNum'] = isset($childCourseNumList[$course['id']]) ? $childCourseNumList[$course['id']] : 0;
    			}
    		}
    	}
    	
    	return $this->sucSysJson($courseList);
    }
    
    /**
     * 根据用户ID获取课程记录，用户ID默认为当前用户
     * 可选条件status，open_status，top_status，level，statusIn
     * @return \think\response\Json
     * @author liujuneng
     */
    public function getCourseListByUserId()
    {
    	//支持的可选条件
    	$conditionList = ['status', 'open_status', 'top_sort', 'level', 'statusIn', 'pid', 'type', 'seriesTypeIn'];
    	$request = $this->request;
    	$userData = $this->getSessionUserData();
    	$userId = $request->param('userId/i', $userData['user_id']);
    	//查询的字段，默认全部
    	$field = $request->param('field', null);
    	$pageNo = $request->param('pageNo/i', 1);
    	$perPage = $request->param('perPage/i', 20);
    	$orderBy = $request->param('orderBy', 'id asc');
    	$isUserInfo = $request->param('isUserInfo/b', true);
    	
    	$model = new MCourse();
    	
    	$condition = [
    			'uid'=>$userId,
    			'seriesType'=>['in', 0]
    	];
        $condition['type'] = ['in',[1,2]];
    	//拼接可选条件
    	foreach ($conditionList as $param){
    		if ($request->has($param)) {
    			if ($param == 'statusIn') {
    				$condition['status'] = ['in', $request->param($param)];
    			}elseif ($param == 'seriesTypeIn') {
    				$condition['seriesType'] = ['in', $request->param($param)];
    			}else {
    				$condition[$param] = trim($request->param($param));
    			}
    		}
    	}
    	
    	$result = $model->getCourseListByCondition($field, $condition, $pageNo, $perPage, $orderBy, $isUserInfo);
    	
    	$pidList = [];
    	foreach ($result as $key=>$values) {
    		if (isset($values['price'])) {
    			$result[$key]['price'] = (float)$values['price'];
    		}
    		if (isset($values['src_img'])) {
    			$result[$key]['process_src_img'] = \helper\UrlSys::handleIndexImg($values['src_img']);
    		}
    		//检查是否为系列课
    		if (isset($values['type']) && isset($values['id']) && $values['type'] == 2) {
    			$pidList[] = $values['id'];
    		}
    	}
    	
    	//查询系列课现有子课程数量
    	if (!empty($pidList)) {
    		$childCourseNumList = $model->getChildCourseNum($pidList);
    		foreach ($result as $key=>$values) {
    			if (isset($values['type']) && isset($values['id']) && $values['type'] == 2) {
    				$result[$key]['childCourseNum'] = isset($childCourseNumList[$values['id']]) ? $childCourseNumList[$values['id']] : 0;
    			}
    		}
    	}
    	
    	return $this->sucSysJson($result);
    }
    
    /**
     * 获取课程记录
     * 可选条件status，open_status，top_status，level，statusIn
     * @return \think\response\Json
     * @author liujuneng
     */
    public function getCourseList()
    {
    	//支持的可选条件
    	$conditionList = ['status', 'open_status', 'top_sort', 'level', 'statusIn', 'pid', 'type', 'id'];
    	$request = $this->request;
    	//查询的字段，默认全部
    	$field = $request->param('field', null);
    	$pageNo = $request->param('pageNo/i', 1);
    	$perPage = $request->param('perPage/i', 20);
    	$orderBy = $request->param('orderBy', 'id asc');
    	$isUserInfo = $request->param('isUserInfo/b', false);
    	
    	$model = new MCourse();
    	
    	//拼接可选条件
    	$condition = ['seriesType'=>0];
    	foreach ($conditionList as $param){
    		if ($request->has($param)) {
    			if ($param == 'statusIn') {
    				$condition['status'] = ['in', $request->param($param)];
    			}else {
    				$condition[$param] = trim($request->param($param));
    			}
    		}
    	}
    	
    	$result = $model->getCourseListByCondition($field, $condition, $pageNo, $perPage, $orderBy, $isUserInfo);
    	
    	$pidList = [];
    	foreach ($result as $key=>$values) {
    		if (isset($values['price'])) {
    			$result[$key]['price'] = (float)$values['price'];
    		}
    		if (isset($values['src_img'])) {
    			$result[$key]['process_src_img'] = \helper\UrlSys::handleIndexImg($values['src_img']);
    		}
    		//检查是否为系列课
    		if (isset($values['type']) && isset($values['id']) && $values['type'] == 2) {
    			$pidList[] = $values['id'];
    		}
    	}
    	
    	//查询系列课现有子课程数量
    	if (!empty($pidList)) {
    		$childCourseNumList = $model->getChildCourseNum($pidList);
    		foreach ($result as $key=>$values) {
    			if (isset($values['type']) && isset($values['id']) && $values['type'] == 2) {
    				$result[$key]['childCourseNum'] = isset($childCourseNumList[$values['id']]) ? $childCourseNumList[$values['id']] : 0;
    			}
    		}
    	}
    	
    	return $this->sucSysJson($result);
    }

    /**
     * 添加收藏课程
     * @name  addKeepCourse
     * @param int $userId   用户ID
     * @param array $courseId  课程ID
     * @param array $type  课程类型（1单节课，2系列课）
     * @param array $addAll  系列课是否按默认全部收藏
     * @return \think\response\Json
     */
    public function addKeepCourse($userId = 1706775, $courseId = 1, $type = 1, $addAll = true){

        $m = new MCourse();
        if($type == 2 && true == $addAll){//一起收藏该课程的子课程（pid = $courseId）、或同级课程（pid = $courseId 的 pid）
            $courseId = $m->getSeriesCourse($courseId);
        }
        $result = $m->addKeepCourse($userId, $courseId);

        return $this->sucSysJson($result);
    }

    /**
     *删除收藏课程
     * @name  delKeepCourse
     * @param int $userId 用户ID
     * @param int $courseId 课程ID
     * @param int $type 课程类型（1单节课，2系列课）
     * @param int $delAll 系列课是否按默认全部取消收藏
     * @return \think\response\Json
     */
    public function delKeepCourse($userId = 1706775, $courseId = 1, $type = 1, $delAll = true){

        $m = new MCourse();
        if($type == 2  && true == $delAll){//一起收藏该课程的子课程（pid = $courseId）、或同级课程（pid = $courseId 的 pid）
            $courseId = $m->getSeriesCourse($courseId);
        }
        $result = $m->delKeepCourse($userId, $courseId);

        return $this->sucSysJson($result);
    }

    /**
     * 收藏课程列表
     * @name  listKeepCourse
     * @param int $userId   用户ID
     * @param int $type     课程类型（1单节课，2系列课）
     * @param int $page     页数
     * @param int $zise     每页条数
     * @return \think\response\Json
     */
    public function listKeepCourse($userId = 1706775, $type = 1, $page = 1, $zise = 10){

        $m = new MCourse();
        $result = $m->listKeepCourse($userId, $type, $page, $zise);

        return $this->sucSysJson($result);
    }
    
}