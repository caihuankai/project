<?php
namespace app\wechat\controller;

use app\wechat\model\Ads;
use app\common\controller\ControllerBase;
use app\wechat\model\Course;
use app\admin\model\SetTop;

/**
 * 99学院相关接口
 */
class College extends App{
    protected $noLoginAction = [
        'getCourseList',
    ];
	/**
	 * 99学院各列表页banner
	 * @param  [type]  $type  9：99学院banner,14：专题课列表-banner_controller，17：系列课列表-banner_controller，20：特训班列表-banner_controller，
	 * @param  integer $page  页码（不用传）
	 * @param  integer $limit 每页条数（不用传）
	 * @return [array]         [description]
	 */
	public function getBanner($type,$page=1,$limit=100){
		$AdsM = new Ads();
		$where['adStatus'] = 1;
		$where['dataFlag'] = 1;
		$where['type'] = 1;
		$where['positionType'] = $type;
		$dataList = $AdsM->field('adId as id,adFile as imgUrl,adName as title,adURL as jumpUrl,relevanceType,relevanceId,remark as appImgUrl')
		->order('adSort asc,updateTime desc')
		->where($where)
		->limit($limit)
		->select();
		return $this->sucSysJson($dataList);
	}
	/**
	 * 99学院各种课程列表页
	 * @param  [type]  $type  10：99学院首页-最新，11：99学院首页-五分钟解盘，12：99学院首页-热门学习，13：99学院首页-本周热销，15：专题课列表-专题研究，16：专题课列表-回顾，18：系列课列表-推荐，21：特训班列表-最新，22：特训班列表-回顾，32:公众号H5-月度课推荐，33:公众号H5-季度课推荐',
	 * @param  integer $page  页码（不用分页的不用传）
	 * @param  integer $limit 每页条数（不用分页的不用传）
	 * @return [array]         [description]
	 */
	public function getCourseList($type,$page=1,$limit=1000,$fineType=0){
		//redis储存key
		$key = 'courseList';
		$hashKey = $key.'_'.$type.'_'.$page.'_'.$limit.'_'.$fineType;
		//缓存数据
		$cacheData = getRedis($key,$hashKey);
		if(!empty($cacheData)){
			return $this->sucSysJson(json_decode($cacheData,true));
		}
		//业务流程
		$AdsM = new Ads();
		$CourseM = new Course();
		$where['a.adStatus'] = 1;
		$where['a.dataFlag'] = 1;
		$where['a.positionType'] = $type;
		$where['a.type'] = in_array($type, [32,33]) ? 3 : 1;
		if($fineType != 0){
			$where['a.remark'] = $fineType;
		}
		$dataList = $AdsM->alias('a')
		->join('talk.talk_course c','c.id = a.relevanceId','left')
		->join('talk.talk_user u','u.user_id = c.uid','left')
		->field('a.adId as id,a.adFile as imgUrl,a.adName as title,a.adURL as jumpUrl,a.relevanceType,a.relevanceId,c.type,c.form,c.level,c.class_name,c.goal as brief,(c.virtual_study_num + c.study_num) as study_total,c.price,c.origin_price,c.plan_num,(c.enroll_num + c.virtual_enroll_num) as enroll_total,c.begin_time,c.enroll_max_num,u.alias,c.begin_enroll_time,c.end_enroll_time')
		->order('a.adSort asc,a.updateTime desc')
		->where($where)
		->page($page,$limit)
		->select();

		foreach ($dataList as $k => $v) {
			$v['enroll_end_state'] = 0;//特训班报名是否已截止 1是 0否
			if($v['type'] == 3 && date('Y-m-d H:i:s') > $v['end_enroll_time']){
				$v['enroll_end_state'] = 1;
			}
			//系列课已更新课程数
			$v['update_total'] = 0;
			if($v['type'] == 2){
				$v['update_total'] = $CourseM->where('pid',$v['relevanceId'])->where('status', '<>', 5)->where('open_status', 1)->count();
			}
			//时间格式转换
			$v['begin_time_ymd'] = date('Y.m.d',strtotime($v['begin_time']));
			$v['end_enroll_time_ymd'] = date('Y.m.d',strtotime($v['end_enroll_time']));
			//处理价格
			if(!empty($v['price'])){
				$v['price'] = floatval($v['price']);
			}
			if(!empty($v['origin_price'])){
				$v['origin_price'] = floatval($v['origin_price']);
			}
			$v['enroll_percent'] = 0;
			//返回报名人数百分比
			if(!empty($v['enroll_total']) && $v['enroll_total'] != 0 && $v['enroll_max_num'] != 0 && !empty($v['enroll_max_num'])){
				$v['enroll_percent'] = (int)(100-($v['enroll_max_num']-$v['enroll_total'])/$v['enroll_max_num']*100);
				if($v['enroll_percent'] > 100){
					$v['enroll_percent'] = 100;
				}
			}

		}
		setRedis($key,$hashKey,json_encode($dataList));
		return $this->sucSysJson($dataList);
	}
	/**
	 * 99学院首页-精品课程
	 * @param  [type] $page  页码
	 * @param  [type] $limit 每页条数
	 * @return [array]        [description]
	 */
	public function getCollegeFineCourse($page=1,$limit=10,$type=1){
		//redis储存key
		$key = 'collegeFineCourse';
		$hashKey = $key.'_'.$type.'_'.$page.'_'.$limit;
		//缓存数据
		$cacheData = getRedis($key,$hashKey);
		if(!empty($cacheData)){
			return $this->sucSysJson(json_decode($cacheData,true));
		}
		//业务流程
		$CourseM = new Course();
		$where['c.status'] = ['in',[1,4]];
		$where['c.open_status'] = 1;
		$where['c.type'] = ['in',[1,2]];
		$where['c.pid'] = 0;
		$where['c.seriesType'] = 0;
		$dataList = $CourseM->alias('c')
		->field('c.id,c.id as relevanceId,c.type,c.form,c.level,c.class_name,c.src_img,c.goal as brief,(c.virtual_study_num + c.study_num) as study_total,c.price,c.origin_price,c.plan_num,(c.enroll_num + c.virtual_enroll_num) as enroll_total,c.begin_time,c.enroll_max_num,u.alias,c.begin_enroll_time,c.end_enroll_time,s.id as isTop')
		->join('talk_set_top s','c.id = s.target_id and s.type = 1','left')
		->join('talk_user u','u.user_id = c.uid','left')
		->join('talk_set_top ta','ta.target_id = c.id and ta.type = 4','left')
		->page($page,$limit)
		->where($where)
		->order('IF(ISNULL(s.sort),1,0),s.sort,IF(ISNULL(ta.sort),1,0),ta.sort,c.create_time desc')
		->select();
		foreach ($dataList as $k => $v) {
			//系列课已更新课程数
			$v['update_total'] = 0;
			if($v['type'] == 2){
				$v['update_total'] = $CourseM->where('pid',$v['relevanceId'])->where('status', '<>', 5)->where('open_status', 1)->count();
			}
			$v['jumpUrl'] = config('WX_DOMAIN').'/#/personalCenter/course/'.$v['relevanceId'];
			//是否置顶 1：是 0：否
			$v['isTop'] = !empty($v['isTop']) ? 1 : 0;
			//处理价格
			if(!empty($v['price'])){
				$v['price'] = floatval($v['price']);
			}
			if(!empty($v['origin_price'])){
				$v['origin_price'] = floatval($v['origin_price']);
			}
		}
		setRedis($key,$hashKey,json_encode($dataList));
		return $this->sucSysJson($dataList);
	}
	/**
	 * 系列课列表页-精品课程
	 * @param  integer $type  1：精品课 2：基础课 3：高级课
	 * @param  [type] $page  页码
	 * @param  [type] $limit 每页条数
	 * @return [array]         [description]
	 */
	public function getFineSeriesCourse($type=1,$page=1,$limit=10){
		//业务流程
		return $this->getCourseList(19,$page,$limit,$type);
	}
}