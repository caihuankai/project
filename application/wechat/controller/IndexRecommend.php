<?php

namespace app\wechat\controller;

/**
 * 首页推荐
 *
 * @package app\wechat\controller
 */
class IndexRecommend extends App
{
    
    /**
     * 获取多个数据
     *
     * @return false|\PDOStatement|string|\think\Collection
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function getData($type, $otherField = '')
    {
        $model = new \app\wechat\model\IndexRecommend();
        $model->joinSwitch($type);
    
        $data = $model->where(['ir.status' => 1, 'ir.type' => $type])->alias('ir')->order('ir.sort asc, ir.id desc')->limit(5)
            ->field('ir.id, ir.type_id, ir.link, ir.name, ir.pic, ir.type_inc, ir.text, ir.theme' . $otherField)->select();
    
        return $data;
    }
    
    
    /**
     * 获取单个数据
     *
     * @return array|false|\PDOStatement|string|\think\Model
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function getRecord()
    {
        $type = $this->request->param('type/i', 0);
        $typeId = $this->request->param('typeId/i', 0);
        $recommendId = $this->request->param('recommendId/i', 0);
        $where = [];
        /** @var \app\wechat\model\IndexRecommend $model */
        $model = $this->getCurrentModel();
        if($recommendId){
            $where = ['id' => $recommendId];
        }else if (!empty($typeId) && !empty($type)){
            $tinyint = $model->getMysqlTinyint('type');
            if ($tinyint->existsValue($type)){
                abort($this->errSysJson(\app\common\controller\JsonResult::ERR_PARAMETER));
            }
            $where = ['type' => $type, 'type_id' => $typeId];
        }else{ // 传参失败
            abort($this->errSysJson(\app\common\controller\JsonResult::ERR_PARAMETER));
        }
        
        $data = $model->where($where)->find();
        
        // 不检测空数据
        if (!empty($data['status']) && $data['status'] == 2){ // 被停用
            abort($this->errSysJson('已被停用'));
        }
        
        return $data;
    }
    
    
    
    
    /**
     * 首页人气直播(旧V3.0)
     *
     * @return \think\response\Json
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function liveList()
    {
    	$data = \CacheBase::cacheData([__METHOD__, $this->request->param()], function () {
    		$data = $this->getData(5);

    		if (count($data) < 5) {
    			$limitNumExtra = 5 - count($data);
    			$userIdListExist = [];
    			foreach ($data as $datum) {
    				$userIdListExist[] = $datum['type_id'];
    			}
    			$model = new \app\wechat\model\User();
    			if (!empty($userIdListExist)) {
    				$model->where('u.user_id', 'not in', $userIdListExist);
    			}
    			$dataExtra = $model->field('u.user_id as type_id,u.head_add as pic,u.alias as name, l.theme')
    			->alias('u')
    			->join('talk_live l', 'l.user_id = u.user_id')
    			->order('l.online_num desc')
    			->limit($limitNumExtra)
    			->select();
    			foreach ($dataExtra as $dataTmp){
    				$dataTmp['link'] = \app\common\model\RedirectUrl::getMyInfoUrl($dataTmp['type_id']);
    				$dataTmp['text'] = '';
    			}
    			$data = array_merge($data, $dataExtra);
    		}

    		$userIds = $result = [];
    		foreach ($data as $datum) {
    			$userIds[] = $datum['type_id'];
    		}

    		$liveData = (new \app\wechat\model\Live())->getLiveDataByUserIds($userIds, 'id, user_id, popular, online_num, virtual_num');


    		foreach ($data as $datum) {
    			$onlineNum = !empty($liveData[$datum['type_id']]) ? $liveData[$datum['type_id']]['online_num'] : 0;
    			$result[] = [
    					'recommendId' => isset($datum['id']) ? $datum['id'] : 0,
    					'userId' => $datum['type_id'],
    					'liveId' => !empty($liveData[$datum['type_id']]) ? $liveData[$datum['type_id']]['id'] : 0,
    					'pic' => $datum['pic'],
    					'name' => $datum['name'],
    					'link' => $datum['link'],
    					'text' => $datum['text'],
    					'theme' => $datum['theme'],
    					'popularNum' => !empty($liveData[$datum['type_id']]) ? $this->handlePopularityNum($liveData[$datum['type_id']]['popular']) : 0,
    					'onlineNum' => !empty($liveData[$datum['type_id']]) ? $this->handlePopularityNum(
    							$liveData[$datum['type_id']]['online_num'] + $liveData[$datum['type_id']]['virtual_num']
    							) : 0,
    			];
    		}

    		return $result;
    	});

    	return $this->sucSysJson($data);
    }
    
    
    /**
     * 精品课程
     *
     * @return \think\response\Json
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function courseList()
    {
        $data = $this->getData(2, ', c.id courseId, c.uid courseUserId, c.class_name courseName, c.study_num courseNum, c.level courseLevel, c.price coursePrice, c.type courseType, c.plan_num coursePlanNum, c.src_img');
    
        $result = $userIds = $pidList = $childCourseNumList = [];
    
        if (!empty($data)) {
        	foreach ($data as $datum) {
        		$userIds[] = $datum['courseUserId'];
        		if ($datum['courseType'] == 2) {
        			$pidList[] = $datum['courseId'];
        		}
        	}
        	
        	//查询系列课现有子课程数量
        	if (!empty($pidList)) {
        		$courseModel = new \app\admin\model\Course();
        		$childCourseNumList = $courseModel->getChildCourseNum($pidList);
        	}
        	
        	$userData = $this->user->getUserColumn($userIds, 'user_id, alias, head_add');
        	
        	//获取固定背景图
        	$resourceModel = new \app\admin\model\Resource();
        	$coursePicList = $resourceModel->alias('r')
        	->join('talk_resource_classification rc', 'rc.resourceClassificationId=r.resourceClassificationId')
        	->where('rc.resourceClassificationName', 'like', '%精品课程模块固定图%')
        	->where('r.dataFlag', 1)
        	->column('r.resourceURL');
        	
        	foreach ($data as $key=>$datum) {
        		$datumUserId = $datum['courseUserId'];
        		$result[] = [
        				'recommendId' => $datum['id'],
        				'userId' => $datumUserId,
        				'courseId' => $datum['type_id'],
        				'title' => $datum['courseName'],
        				'name' => !empty($userData[$datumUserId]) ? $userData[$datumUserId]['alias'] : '',
        				'userPic' => !empty($userData[$datumUserId]) ? $this->user->disUserHead($userData[$datumUserId]['head_add']) : '',
        				'coursePic'=>!empty($datum['src_img']) ? $datum['src_img'] : (isset($coursePicList[$key]) ? \helper\UrlSys::handleIndexImg($coursePicList[$key]) : ''),
        				'studyNum' => $this->handlePopularityNum($datum['courseNum']),
        				'inc' => !empty((float)$datum['type_inc']) ? (float)$datum['type_inc'] . '%' : rand(1000, 10000)/100 . '%',
        				'courseLevel' => $datum['courseLevel'],
        				'coursePrice' => $datum['coursePrice'],
        				'courseType' => $datum['courseType'],
        				'coursePlanNum' => $datum['coursePlanNum'],
        				'childCourse' => isset($childCourseNumList[$datum['courseId']]) ? $childCourseNumList[$datum['courseId']] : 0,
        		];
        	}
        }
        
        return $this->sucSysJson($result);
    }
    
    
    
    
    /**
     * 名师推荐(旧V3.0，V3.3已废弃)
     *
     * @return \think\response\Json
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function famousLiveList()
    {
    	$result = $liveIds = $userIds = [];
        $userId = $this->getUserId();
    	$data = \CacheBase::cacheData([__METHOD__, $this->request->param()], function () {
    		$data = $this->getData(3, ', l.id liveId, l.user_id userId, l.popular livePopular, u.alias username, u.head_add');
    		
    		if (count($data) < 5) {
    			$limitNumExtra = 5 - count($data);
    			$LiveIdListExist = [];
    			foreach ($data as $datum) {
    				$LiveIdListExist[] = $datum['type_id'];
    			}
    			$model = new \app\wechat\model\User();
    			if (!empty($LiveIdListExist)) {
    				$model->where('l.id', 'not in', $LiveIdListExist);
    			}
    			$dataExtra = $model->field('l.id as type_id,l.id as liveId,l.popular as livePopular,u.user_id as userId,u.head_add,u.alias as username')
    			->alias('u')
    			->join('talk_live l', 'l.user_id = u.user_id')
    			->order('l.online_num desc')
    			->limit($limitNumExtra)
    			->select();
    			foreach ($dataExtra as $dataTmp){
    				$dataTmp['pic'] = \helper\UrlSys::handleIndexTeacherBack();
    				$dataTmp['type_inc'] = 0;
    			}
    			$data = array_merge($data, $dataExtra);
    		}
    		return $data;
    	});
    	
    	foreach ($data as $item) {
    		$liveIds[] = $item['type_id'];
    		$userIds[] = $item['userId'];
    	}
    	
    	
    	$weekAgo = date('Y-m-d H:i:s', strtotime('-1 weeks'));
    	$cacheTime = strtotime('+10 minute');
    	
    	// 其他各种数据
    	$focusData = (new \app\wechat\model\LiveFocus())->ifFocusList($userId, $liveIds);
    	
    	$viewpointData = \CacheBase::cacheEveryData($userIds, [__METHOD__, 'viewpoint'], function ($userIds)use($weekAgo){
    		return (new \app\wechat\model\Viewpoint())->countByUserIds(
    				$userIds, 1, 'count(id) num, GROUP_CONCAT(id) viewpointIds, uid, sum(study_num) allNum', ['create_time' => ['>=', $weekAgo]]
    				);
    	}, $cacheTime);
    	$courseData = \CacheBase::cacheEveryData($liveIds, [], function ($liveIds)use($weekAgo){
    		return (new \app\wechat\model\Course())->getCourseNumByLiveIds(
    				$liveIds, 'count(id) num, GROUP_CONCAT(id) courseIds, live_id, sum(study_num) allNum', ['create_time' => ['>=', $weekAgo]]
    				);
    	}, $cacheTime);
    				
    				
    	foreach ($data as $item) {
    		$itemUserId = $item['userId'];
    		
    		$result[] = [
    				'recommendId' => isset($item['id']) ? $item['id'] : 0,
    				'userId' => $itemUserId,
    				'liveId' => $item['liveId'],
    				'userPic' => $this->user->disUserHead($item['head_add']),
    				'pic' => $item['pic'],
    				'name' => $item['username'],
//                    	'link' => '', // 让前端自己拼接
    				'ifFocus' => !empty($focusData[$item['type_id']]) ? $focusData[$item['type_id']] : 2, // 1为关注，2为未关注，3为不显示关注按钮
    				'courseNum' => !empty($courseData[$item['type_id']]) ? $courseData[$item['type_id']]['num'] : 0,
    				'courseReadNum' => !empty($courseData[$item['type_id']]) ? $this->handlePopularityNum($courseData[$item['type_id']]['allNum']) : 0,
    				
    				'viewpointNum' => !empty($viewpointData[$itemUserId]) ? $viewpointData[$itemUserId]['num'] : 0,
    				'viewpointReadNum' => !empty($viewpointData[$itemUserId]) ? $this->handlePopularityNum($viewpointData[$itemUserId]['allNum']) : 0,
    				'popular' => $item['livePopular'],
    				'inc' => (float)$item['type_inc'] . '%',
    		];
    	}
        
    	return $this->sucSysJson($result);
    }
    
    /**
     * 首页人气直播 (V3.3版)
     * @author liujuneng
     */
    public function liveListNew()
    {
    	$result = $liveIds = $userIds = [];
    	$userId = $this->getUserId();
    	
    	$data = \CacheBase::cacheData([__METHOD__, $this->request->param()], function () {
    		$data = $this->getData(5, ', l.id liveId, l.user_id userId, l.popular livePopular, l.online_num, l.virtual_num, u.alias username, u.head_add');
    		
    		if (count($data) < 5) {
    			$limitNumExtra = 5 - count($data);
    			$userIdListExist = [];
    			foreach ($data as $datum) {
    				$userIdListExist[] = $datum['type_id'];
    			}
    			$model = new \app\wechat\model\User();
    			if (!empty($userIdListExist)) {
    				$model->where('l.user_id', 'not in', $userIdListExist);
    			}
    			$dataExtra = $model->field('u.user_id as type_id,l.id as liveId,l.popular as livePopular,l.online_num,l.virtual_num,u.user_id as userId,u.head_add,u.alias as username')
    			->alias('u')
    			->join('talk_live l', 'l.user_id = u.user_id')
    			->order('l.online_num desc')
    			->limit($limitNumExtra)
    			->select();
    			foreach ($dataExtra as $dataTmp){
    				$dataTmp['pic'] = \helper\UrlSys::handleIndexTeacherBack();
    				$dataTmp['type_inc'] = 0;
    				$dataTmp['link'] = \app\common\model\RedirectUrl::getMyInfoUrl($dataTmp['type_id']);
    				$dataTmp['text'] = '';
    			}
    			$data = array_merge($data, $dataExtra);
    		}
    		return $data;
    	});
    		
    	foreach ($data as $item) {
    		$liveIds[] = $item['liveId'];
    		$userIds[] = $item['userId'];
    	}
    	
    	
    	$cacheTime = strtotime('+10 minute');
    	
    	// 其他各种数据
    	$focusData = (new \app\wechat\model\LiveFocus())->ifFocusList($userId, $liveIds);
    	
    	$viewpointData = \CacheBase::cacheEveryData($userIds, [__METHOD__, 'viewpoint'], function ($userIds){
    		return (new \app\wechat\model\Viewpoint())->countByUserIds(
    				$userIds, 1, 'count(id) num, GROUP_CONCAT(id) viewpointIds, uid, sum(study_num) allNum', ['status' => 1]
    				);
    	}, $cacheTime);
    	$courseData = \CacheBase::cacheEveryData($liveIds, [], function ($liveIds){
    		return (new \app\wechat\model\Course())->getCourseNumByLiveIds(
    				$liveIds, 'count(id) num, GROUP_CONCAT(id) courseIds, live_id, sum(study_num) allNum', ['open_status' => 1, 'status'=>['<>', 5]]
    				);
    	}, $cacheTime);
    	
    	$model = new \app\wechat\model\LiveFocus();
    	$userTotalNum = $model->where('robot', 1)->count();
    	$randNumMax = $userTotalNum - 101;
    	if ($randNumMax < 10) {
    		$randNumMax = 1;
    	}
    	foreach ($data as $item) {
    		$itemUserId = $item['userId'];
    		
    		//随机头像
    		$onlineHeadAddList = \CacheBase::cacheData([__METHOD__, ['onlineHeadAdd', $item['liveId']]], function () use ($model, $randNumMax){
    			$maxNum = 6;
    			$headAddlist = [];
    			$offset = rand(0, $randNumMax);
    			$teacherHeadAddList = $model->where('robot', 1)->field('name')->limit($offset, 100)->select();
    			$total = count($teacherHeadAddList);
    			$existRandNumArray = [];
    			if ($total > 0) {
    				while (count($existRandNumArray) < $maxNum && count($existRandNumArray) != $total){
    					$randNum = rand(0, $total-1);
    					if (!in_array($randNum, $existRandNumArray)) {
    						$existRandNumArray[] = $randNum;
    						$headAddlist[] = $model->handleRobotPic($teacherHeadAddList[$randNum]['name']);
    					}
    				}
    			}
    			
    			return $headAddlist;
    		});
    		
    		$result[] = [
    				'recommendId' => isset($item['id']) ? $item['id'] : 0,
    				'userId' => $itemUserId,
    				'liveId' => $item['liveId'],
    				'userPic' => $this->user->disUserHead($item['head_add']),
    				'pic' => $item['pic'],
    				'name' => $item['username'],
    				'link' => $item['link'],
    				'text' => $item['text'],
    				'popularNum' => $item['livePopular'],
    				'onlineNum' => $item['online_num'] + $item['virtual_num'],
    				'ifFocus' => !empty($focusData[$item['liveId']]) ? $focusData[$item['liveId']] : 2, // 1为关注，2为未关注，3为不显示关注按钮
    				'courseNum' => !empty($courseData[$item['liveId']]) ? $courseData[$item['liveId']]['num'] : 0,
    				'courseReadNum' => !empty($courseData[$item['liveId']]) ? $this->handlePopularityNum($courseData[$item['liveId']]['allNum']) : 0,
    				'viewpointNum' => !empty($viewpointData[$itemUserId]) ? $viewpointData[$itemUserId]['num'] : 0,
    				'viewpointReadNum' => !empty($viewpointData[$itemUserId]) ? $this->handlePopularityNum($viewpointData[$itemUserId]['allNum']) : 0,
    				'inc' => !empty((float)$item['type_inc']) ? (float)$item['type_inc'] . '%' : rand(1000, 10000)/100 . '%',
    				'onlineHeadAddList'=>$onlineHeadAddList
    		];
    	}
    				
    	return $this->sucSysJson($result);
    }
    
    
    /**
     * 增加点击量
     *
     * @internal get $type
     * @internal get $typeId
     * @internal get $recommendId
     * @return \think\response\Json
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function addClickNum()
    {
        $this->filterRepeatPost();
        $data = $this->getRecord();
        
        if (empty($data)) {
            return $this->sucSysJson(1);
        }
        
        $model = $this->getCurrentModel();
        $model->where(['id' => $data['id']])->setInc('click_num');
        
        return $this->sucSysJson(1);
    }
    
    
    
    
    /**
     * 获取首页明星流量主记录
     * @return \think\response\Json
     * @author liujuneng
     */
    public function getUserFlowList()
    {
    	$request = $this->request;
    	$limitNum = $request->param('limitNum/i', 5);
    	$orderBy = $request->param('orderBy', 'sort asc, id desc');
    	
    	$model = new \app\wechat\model\IndexRecommend();
    	
    	$field = 'ir.*,u.head_add,u.alias';
    	$result = $model->alias('ir')
    	->where('ir.type', 1)
    	->where('ir.status', 1)
    	->field($field)
    	->join('talk_user u', 'u.user_id = ir.type_id')
    	->order($orderBy)
    	->limit($limitNum)
    	->select();
    	
    	return $this->sucSysJson($result);
    }
    
    /**
     * 获取首页深度阅读记录
     * @return \think\response\Json
     * @author liujuneng
     */
    public function getViewpointList()
    {
    	$data = \CacheBase::cacheData([__METHOD__, $this->request->param()], function () {
    		$request = $this->request;
    		$limitNum = $request->param('limitNum/i', 5);
    		$orderBy = $request->param('orderBy', 'top_status desc, sort asc, id desc');
    		
    		$model = new \app\wechat\model\IndexRecommend();
    		
    		$field = 'ir.*,v.id as viewpointId,v.title,v.lead,v.study_num,v.like_num,v.share_num,v.uid,v.content,v.level,v.publish_time,v.title_cate,v.virtual_study_num,v.virtual_like_num,v.virtual_share_num,qg.qiniuImg as coverPic,v.author';
    		$dataList = $model->alias('ir')
    		->where('ir.type', 4)
    		->where('ir.status', 1)
    		->where('v.status', 1)
    		->field($field)
    		->join('talk_viewpoint v', 'v.id = ir.type_id')
    		->join('talk_qiniu_gallerys qg','v.cover_qiniu_id = qg.id','left')
    		->order($orderBy)
    		->limit($limitNum)
    		->select();
    		
    		if (count($dataList) < $limitNum) {
    			$viewpointIdListExist = [];
    			foreach ($dataList as $data) {
    				$viewpointIdListExist[] = $data['type_id'];
    			}
    			$limitNumExtra = $limitNum - count($dataList);
    			$model = new \app\wechat\model\Viewpoint();
    			$field = 'id as viewpointId,title,lead,study_num,like_num,share_num,uid,content,level,publish_time,title_cate,virtual_study_num,virtual_like_num,virtual_share_num,cover_qiniu_id,author';
    			$condition = [
    					'status'=>1,
    					'type'=>['<>', 1],
    					'column_id'=>['<>', 2],//排除掉深度阅读的观点
    			];
    			if (!empty($viewpointIdListExist)) {
    				$condition['id'] = ['not in', $viewpointIdListExist];
    			}
    			$orderBy = 'id desc';
    			$dataListExtra = $model->getViewpointListByCondition($field, $condition, 1, $limitNumExtra, $orderBy);
    			$dataList = array_merge($dataList, $dataListExtra);
    		}
    		
    		$result = $uidList = $userList = $viewpointIdList = [];
    		foreach ($dataList as $data) {
    			$uidList[] = $data['uid'];
    			$viewpointIdList[] = $data['viewpointId'];
    		}
    		
    		if (!empty($uidList)) {
    			$model = new \app\wechat\model\User();
    			$userList = $model->where('user_id', 'in', $uidList)->fetchClass('\CollectionBase')->select()->column(null, 'user_id');
    		}
    		
    		$viewpointCateList = [];
    		if (!empty($viewpointIdList)) {
    			$model = new \app\wechat\model\ViewpointCate();
    			$viewpointCateList = $model->alias('vc')
    			->join('talk_live_cate lc','vc.cate_id = lc.id')
    			->where('vc.viewpoint_id', 'in', $viewpointIdList)
    			->column('lc.name', 'viewpoint_id');
    		}
    		
    		foreach ($dataList as $data){
    			$uid = $data['uid'];
    			$content = $data['content'];
    			$viewpointId = $data['viewpointId'];
    			
    			$imageList = interceptHtmlImage($content);
    			
    			$result[] = [
    					'type_id'=>isset($data['type_id']) ? $data['type_id'] : $viewpointId,
    					'title'=>$data['title'],
    					'lead'=>$data['lead'],
    					'study_num'=>$data['study_num'] + $data['virtual_study_num'],
    					'like_num'=>$data['like_num'] + $data['virtual_like_num'],
    					'share_num'=>$data['share_num'] + $data['virtual_share_num'],
    					'level'=>$data['level'],
    					'publish_time'=>date('Y-m-d H:i', strtotime($data['publish_time'])),
    					'head_add'=>isset($userList[$uid]['head_add']) ? $userList[$uid]['head_add'] : '',
    					'alias'=>isset($userList[$uid]['alias']) ? $userList[$uid]['alias'] : $data['author'],
    					'title_cate'=>!empty($data['title_cate']) ? explode(' ', $data['title_cate']) : [],
    					'cateName'=>isset($viewpointCateList[$viewpointId]) ? $viewpointCateList[$viewpointId] : '',
    					'coverPic'=>$data['coverPic'],
    					'top_status'=>isset($data['top_status']) ? $data['top_status'] : 0,
    					'imageList'=> isset($imageList[1]) ? $imageList[1] : [],
    			];
    		}
    		
    		return $result;
    	},$time=600);
    	
    	return $this->sucSysJson($data);
    }
    
    
}