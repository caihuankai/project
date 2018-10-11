<?php

namespace app\admin\model;


class UrlHtml
{
    
    public static function goUserBuyViewpointWeekUrl($userId)
    {
        return url('PayOrder/userWeekViewpointList', ['userId' => $userId]);
    }
    
    
    
    /**
     * 跳转到live赞赏列表
     *
     * @param $userId
     * @param $num
     * @return int|string
     */
    public static function goAdmireList($userId, $num)
    {
        $url = url('PayOrder/user_admire_list') . '?user_id=' . $userId;
        if (empty($num) || empty($userId)) {
            return 0;
        }
    
        return "<a href='{$url}'>{$num}</a>";
    }
    
    
    /**
     * 跳转到系列课的单次课程列表
     *
     * @param $pid
     * @param $str
     * @return string
     * @author aozhuochao
     */
    public static function goCourseListBeSeries($pid, $str,$flag=false)
    {
        if (empty($str) || empty($pid)) {
            return $str;
        }
        if ($flag=false){
            $url = url('Course/index', ['pid' => $pid]);
        }else{
            $url = url('CourseManage/index', ['pid' => $pid]);
        }

    
        return "<a href='{$url}'>{$str}</a>";
    }
    
    
    
    /**
     * 跳转到指定用户的课程列表
     *
     * @param int $userId
     * @param int $num
     * @param int $type 1为用户的课程，2为用户购买课程，3为参与的课程，4为用户推荐的课程
     * @return string
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public static function goUserCourseList($userId, $num, $type = 1,$typeStatus=0)
    {
        $url = url('Course/index', ['userId' => $userId, 'type' => $type,'typeStatus' => $typeStatus]);
        if (empty($num) || empty($userId)) {
            return 0;
        }
        
        return "<a href='{$url}'>{$num}</a>";
    }
    
    
    
    /**
     * 后台直播详情页
     *
     * @param $liveId
     * @return string
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public static function goLiveDetailsUrl($liveId, $liveName = null)
    {
        $url = url('Live/details', ['id' => $liveId]);
        if ($liveName === null) {
            return $url;
        }
        
        return "<a href='{$url}'>{$liveName}</a>";
    }
    
    
    
    /**
     * 后台课程详情页
     *
     * @param $courseId
     * @return string
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public static function goCourseDetailsUrl($courseId, $courseName = null)
    {
        $url = url('Course/details', ['id' => $courseId]);
        if ($courseName === null){
            return $url;
        }
        
        return "<a href='{$url}'>{$courseName}</a>";
    }
    
    
    
    /**
     * 后台关注人数和邀请粉丝人数跳转HTML
     *
     * @param $userId
     * @param int $type 1为关注人数列表，2为邀请人数列表
     * @param int $num
     * @return string
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public static function goUserFansList($userId, $type, $num)
    {
        $url = url('ForegroundUser/userFansList', ['userId' => $userId, 'type' => $type]);
        if (empty($num) || empty($userId)) {
            return 0;
        }
        
        return "<a href='{$url}'>{$num}</a>";
    }
    
    
    
    
    /**
     * 后台用户详情页
     *
     * @param $userId
     * @return string
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public static function goUserDetailsUrl($userId, $userName = false)
    {
        $url = url('ForegroundUser/details', ['userId' => $userId]);
        if ($userName === false) {
            return $url;
        }
        
        return "<a href='{$url}'>{$userName}</a>";
    }
    
    
    /**
     * 跳转到用户收益明细
     *
     * @param $userId
     * @return string
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public static function goRcbLogList($userId)
    {
        if (empty($userId)) {
            return '';
        }
        $url = url('RcbLog/new_index', ['user_id' => $userId]);
    
        return "<a href='{$url}'>收益明细</a>";
    }
    
    
    
    /**
     * 跳转到用户观点列表的html
     * type=1-3,relevantId为userId
     * type=4,relevantId为columnId
     *
     * @param int $userId
     * @param int $num
     * @param int $type 1为发布观点，2为购买观点，3为用户推荐观点，4为栏目下的观点
     * @return string
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public static function goViewpointListHtml($relevantId, $num, $type = 1)
    {
    	if (in_array($type, [1,2,3])) {
    		$url = url('Viewpoint/index', ['relevantId' => $relevantId, 'type' => $type]);
    	}elseif ($type == 4) {
    		$url = url('Viewpoint/index', ['relevantId' => $relevantId, 'type' => $type]);
    	}
        
    	if (empty($num) || empty($relevantId)) {
            return 0;
        }
        
        return "<a href='{$url}'>{$num}</a>";
    }
    
    
    /**
     * 查看直播间真实用户列表
     *
     * @param $id
     * @param $type
     * @param $num
     * @return int|string
     * @author aozhuochao
     */
    public static function goTruthUserList($id, $type, $num)
    {
        if (empty($id) || empty($num)) {
            return 0;
        }
        $url = url('ForegroundUser/truthUserList', ['id' => $id, 'type' => $type]);
        
        return "<a href='{$url}'>$num</a>";
    }
    
    

    /**
     * 跳转到用户购买系列课的html
     *
     * @param int $userId
     * @param int $num
     * @param int $type 2为购买的系列课
     * @return string
     */
    public static function goSeriesCourseListHtml($userId, $num, $type = 1,$flag=false)
    {

        if ($flag){
            $url = url('PayOrder/seriesCourseH5', ['user_id' => $userId, 'type' => $type]);
        }else{
            $url = url('PayOrder/seriesCourse', ['user_id' => $userId, 'type' => $type]);
        }
        if (empty($num) || empty($userId)) {
            return 0;
        }
        
        return "<a href='{$url}'>{$num}</a>";
    }

    /**
     * 跳转到用户购买观点包周的html
     *
     * @param int $userId
     * @param int $num
     * @param int $type 2为购买的观点包周
     * @return string
     */
    public static function goViewpointServiceHtml($userId, $num, $type = 1)
    {
        $url = url('PayOrder/user_viewpointService', ['user_id' => $userId, 'type' => $type]);
        if (empty($num) || empty($userId)) {
            return 0;
        }
        
        return "<a href='{$url}'>{$num}</a>";
    }
    
    
    /**
     * 获取首页推荐-新增的url
     *
     * @param $id
     * @param int $type
     * @return string
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public static function goIndexRecommendAddUrl($id, $type)
    {
        return url('indexRecommend/addSelect', ['id' => $id, 'type' => $type]);
    }

    /**
     * 获取收藏列表url
     * @name  goCourseKeepHtml
     * @param int $userId
     * @param int $count
     * @param $alias
     * @return int|string
     * @author Lizhijian
     */
    public static function goCourseKeepHtml($userId = 1706775, $count = 0, $alias){
        if (empty($userId)) {
            return 0;
        }
        $url = url('User/keepList', ['userId' => $userId]);
        return "<a href='{$url}'>{$count}</a>";
    }
    
    public static function goChildCourseUrl($pid, $linkName,$domain=false)
    {
    	if (empty($linkName) || empty($pid)) {
    		return '';
    	}
    	if ($domain == false)
    	{
            $url = url('Course/index?tabName1=系列课列表&tabName2=子课程列表', ['pid'=>$pid]);
        }else{
            $controller = request()->controller();
            $url = url($controller.'/index?tabName1=系列课列表&tabName2=子课程列表', ['pid'=>$pid]);
        }

    	
    	return "<a href='{$url}'>{$linkName}</a>";
    }
    
    public static function goReturnVisitCourseIndexUrl($userId, $type, $linkName, $tabName2)
    {
    	if (empty($userId) || $type === null || $type === '' || empty($linkName)) {
    		return '';
    	}
    	$url = url("ReturnVisit/courseIndex?tabName1=客服管理&tabName2={$tabName2}", ['userId' => $userId, 'type' => $type]);
    	
    	return "<a href='{$url}'>{$linkName}</a>";
    }
    
    /**
     * 跳转 运营监控数据-历史人数
     * @param unknown $liveId 课程直播间id，live直播间id（要加1000000000）
     * @param unknown $type 课程直播间=0，live直播间=1
     * @param unknown $linkName
     * @param unknown $tabName2
     * @return string
     */
    public static function goSumHistory($liveId, $type, $linkName, $tabName2, $params = [])
    {
    	if (empty($liveId) || empty($type) || empty($linkName)) {
    		return '';
    	}
    	
    	$params += ['liveId' => $liveId, 'type' => $type];
    	$url = url("StatisticsData/sumCourseHistory?tabName1=运营监控数据&tabName2={$tabName2}", $params);
    	
    	return "<a href='{$url}'>{$linkName}</a>";
    }
    
}