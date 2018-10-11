<?php

namespace app\miniprogram\controller;

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
    	$conditionList = ['status', 'open_status', 'top_sort', 'level', 'statusIn', 'pid'];
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
    			'uid'=>$userId
    	];
        $condition['type'] = ['in',[1,2]];
    	//拼接可选条件
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
    	$condition = [];
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