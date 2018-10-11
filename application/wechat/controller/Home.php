<?php

namespace app\wechat\controller;

use think\config;
use app\common\controller\ControllerBase;
use app\wechat\model\HomeRecord;
use app\wechat\controller\LiveDetails;
use app\common\model\Course;
use app\common\model\Live;
use app\wechat\model\LiveFocus;
use app\admin\model\Ads;
use app\common\model\HitRecord;
use app\wechat\model\User as UserM;

/**
 * 首页相关接口
 */
class Home extends App{
	/**
	 * 记录用户是否进入首页
	 * @param  [type] $user_id 用户id
	 * @return [type]          [description]
	 */
	public function honeRecord($user_id=1706743){
		$user_id = (int)$user_id;
		$HomeRecordModel = new HomeRecord();
		$status = $HomeRecordModel->record($user_id);
		return json($status);
	}
	/**
	 * 首页公告推荐
	 * @return [type] [description]
	 */
	public function notice(){
		$LiveDetailsC = new LiveDetails();
		return $LiveDetailsC->liveNotice();
	}
	/**
	 * 首页摇一摇获取随机私密课接口
	 * @return [type] [description]
	 */
	public function randomPrivateCourse(){
		$CourseModel = new Course();
		//获取所有私密课id
		$CourseList = $CourseModel->alias('c')
		->join('live l','l.user_id = c.uid','left')
		->join('user u','u.user_id = c.uid','left')
		->field('c.id')
		->where('c.level',1)
		->where('c.status','in',[1,4])
		->where('c.open_status=1')
		->where('l.open_status=1')
		->where('u.freeze=0')
		->select();
		if(empty($CourseList)){
			return null;
		}
		//获取随机课程
		$key = rand(0,count($CourseList)-1);
		$id = $CourseList[$key]['id'];
		$CourseInfo = $CourseModel->alias('c')
		->join('user u','u.user_id = c.uid','left')
		->where('c.id',$id)
		->field('c.id,c.uid as teacherId,c.class_name,c.teacher_name,c.brief,c.src_img,u.alias,c.form')
		->find();
		if(empty($CourseInfo['teacher_name'])){
			$CourseInfo['teacher_name'] = $CourseInfo['alias'];
		}
		$CourseInfo['src_img'] = \helper\UrlSys::handleIndexImg($CourseInfo['src_img']);
		return $this->successJson($CourseInfo);
	}
	/**
	 * 讲师大咖Tab
	 * @param  [type] $type 排序方式 1:粉丝最多  2:在线人数
	 * @return [type]       [description]
	 */
	public function teacherList($user_id=1706743,$type=1,$page=2){
		$LiveModel = new Live();
		$user_id = (int)$user_id;
		$page = (int)$page;
		$type = (int)$type;
		$limit = ($page-1)*10;
		if($type == 1){
			$dataList = $LiveModel->alias('l')
			->join('user u','u.user_id = l.user_id')
			->where('l.open_status = 1')
			->where('u.user_level = 2')
			->where('u.freeze = 0')
			->where('u.is_assistant = 2')
			->field('u.user_id,u.head_add,u.alias,l.id as live_id,l.focus_num,l.popular,u.intro,l.theme,u.user_text')
			->order('l.focus_num','desc')
			->limit($limit,10)
			->select();
		}else{
			$dataList = $LiveModel->alias('l')
			->join('user u','u.user_id = l.user_id')
			->where('l.open_status = 1')
			->where('u.user_level = 2')
			->where('u.freeze = 0')
			->where('u.is_assistant = 2')
			->field('u.user_id,u.head_add,u.alias,l.id as live_id,l.focus_num,l.popular,u.intro,l.theme,(l.online_num + l.virtual_num) as online_num,u.user_text')
			->order('l.online_num + l.virtual_num','desc')
			->limit($limit,10)
			->select();
		}
		//用户是否关注直播间
		if(!empty($dataList)){
			$LiveFocusModel = new LiveFocus();
			foreach ($dataList as $k => $v) {
				$v['is_focus'] = $LiveFocusModel->isFocus($v['live_id'],$user_id);
				$v['head_add'] = $this->userHead($v['head_add']);
				$v['theme'] = empty($v['theme']) ? $v['alias'].'的直播间' : $v['theme'];
				$specialty = '';
				if(!empty($v['user_text'])){
					$specialty = json_decode($v['user_text'],true);
				}
				// $specialty = $this->getSpecialty($v['user_id']);
				$v['specialty'] = isset($specialty['forte']) ? $specialty['forte'] : '';
				$v['brief'] = isset($specialty['brief']) ? $specialty['brief'] : '';
				// $v['specialty'] = $specialty['specialty'];
				// $v['brief'] = $specialty['brief'];

			}
		}
		return $this->successJson($dataList);
	}
	/**
	 * 人气直播tab
	 * @param  integer $type 排序方式 1：人气值 2：赞赏次数 3：在线人数
	 * @return [type]        [description]
	 */
	public function popularLive($user_id=1706743,$type=1,$page=1){
		$LiveModel = new Live();
		$user_id = (int)$user_id;
		$page = (int)$page;
		$type = (int)$type;
		$limit = ($page-1)*10;
		if($type == 1){
			$order = 'l.popular';
		}
		if($type == 2){
			$order = 'l.admire_num';
		}
		if($type == 3){
			$order = 'l.online_num + l.virtual_num';
		}
		$dataList = $LiveModel->alias('l')
		->join('user u','u.user_id = l.user_id')
		->where('l.open_status = 1')
		->where('u.user_level = 2 AND u.is_assistant = 2')
		->field('u.user_id,u.head_add,u.alias,l.id as live_id,l.focus_num,l.popular,l.online_num,l.admire_num,u.intro,l.virtual_num,l.theme,u.is_assistant')
		->order($order,'desc')
		->limit($limit,10)
		->select();

		//用户是否关注直播间
		if(!empty($dataList)){
			$LiveFocusModel = new LiveFocus();
            $userIds = [];
			foreach ($dataList as $k => $v) {
				$v['is_focus'] = $LiveFocusModel->isFocus($v['live_id'],$user_id);
				$v['head_add'] = $this->userHead($v['head_add']);
				$v['online_num'] = $v['online_num'] + $v['virtual_num'];
                $userIds[] = $v['user_id'];
			}

			//v3.3新数据来源
			switch ($type){
	            case 2:
	                //收到礼物(赞赏)
	                $pModel = new \app\wechat\model\User();
	                $giftInfo = $pModel->getGiftInfo($userIds);

	                foreach ($dataList as $k => $v){
	                    $dataList[$k]['latest_gift_name'] = isset($giftInfo[$v['user_id']]['giftName'])? $giftInfo[$v['user_id']]['giftName']:'';
	                }
	                break;
	            case 1:
	                //今日发布数量（发布观点 + (发布文字+红包+图片) + 发布课程）
	                $uModel = new \app\wechat\model\User();
	                $sendNum = $uModel->getSendContentNum($userIds);

	                foreach ($dataList as $k => $v){
	                    $dataList[$k]['publish_num'] = isset($sendNum[$v['user_id']])? $sendNum[$v['user_id']]:0;
	                }
	                break;
	            default:
	                break;
	        }
		}

		return $this->successJson($dataList);
	}
	/**
	 * 获取首页焦点图
	 * @return [type] [description]
	 */
	public function getHomeBanner(){
		$AdsModel = new Ads();
		$where['dataFlag'] = 1;
		$where['adStatus'] = 1;
		$where['positionType'] = 1;
		$dataList = $AdsModel->where($where)
		->where('relevanceType','in',[3,4,5,6,7,8,9,10,11,12])
		->field('adId,adFile,adName,adURL,adSort,adClickNum,relevanceType,relevanceId,remark as appImgUrl')
		->order('adSort')
		->limit(8)
		->select();
		return $this->successJson($dataList);
	}
	/**
	 * 记录首页焦点图点击次数
	 * @param  [type] $id 焦点图id
	 * @return [type]     [description]
	 */
	public function homeBannerRecord($id=195,$user_id=1706743){
		$id = (int)$id;
		$user_id = (int)$user_id;
		$status = '';
		$AdsModel = new Ads();
		$data = $AdsModel->where('adId',$id)->find();
		if($data['relevanceType'] == 4 || $data['relevanceType'] == 5 || $data['relevanceType'] == 6 || $data['relevanceType'] == 7 || $data['relevanceType'] == 8){
			$status = $AdsModel->where('adId',$id)->setInc('adClickNum');
		}
		if($data['relevanceType'] == 3){
			$status = $AdsModel->where('adId',$id)->setInc('adClickNum');
			$HitRecordModel = new HitRecord();
			$insertData['hitRecordType'] = 5;
			$insertData['userId'] = $user_id;
			$insertData['targetId'] = $data['relevanceId'];
			$status = $HitRecordModel->insert($insertData);
		}
		return $status;
	}
	//获取用户头像
	public function userHead($head){
		if(empty($head)){
			return config('WX_DOMAIN').config('USER_HEAD_ADD');
		}else{
			return $head;
		}
	}	
	//获取讲师大咖tab擅长简介
	public function getSpecialty($user_id){
		switch ($user_id) {
			case 1707299:
				$data['specialty'] = '10倍牛股挖掘、热点板块追踪';
				$data['brief'] = '趋势拐点创始人，善于捕捉市场主流热点。';
				break;

			case 1707332:
				$data['specialty'] = '政策解读、策略分析、主题投资';
				$data['brief'] = '主题投资达人，善于捕捉核心主题机会，把握波段交易时机。';
				break;

			case 1707302:
				$data['specialty'] = 'A股、黄金、外汇';
				$data['brief'] = '牛股基因线发起人、 投资价值发现者。';
				break;

			case 1707284:
				$data['specialty'] = 'A股、期货、外汇';
				$data['brief'] = '解析牛股基因、提前布局大牛股、裸K研判趋势、精准捕捉买卖点。';
				break;

			case 1707329:
				$data['specialty'] = 'A股、黄金外汇、TD';
				$data['brief'] = '教你如何抓到涨停板，牛股常伴你左右。';
				break;

			case 1707308:
				$data['specialty'] = '尾盘交易法';
				$data['brief'] = '辩证法为道，人工智能为术，开创短线新境界。';
				break;

			case 1707305:
				$data['specialty'] = '股票、股指、期货';
				$data['brief'] = '牛股很多、抓住不难，被套不怕，解套不烦。';
				break;

			case 1707326:
				$data['specialty'] = '短线、波段、价值投资';
				$data['brief'] = '教你识别机构操盘手法，轻松选牛股，准确把握买卖点。';
				break;
			
			default:
				$data['specialty'] = '短线、波段、价值投资';
				$data['brief'] = '你识别机构操盘手法，轻松选牛股，准确把握买卖点。';
				break;
		}
		return $data;
	}
	/**
	 * 获取live直播平台讲师列表
	 * @param  integer $page  页码
	 * @param  [type]  $limit 每页条数
	 * @return [arrray]         
	 */
	public function liveTeacherList($page=1,$limit=5){
		$UserM = new UserM();
		$dataList = $UserM->getTeacherList($page,$limit);
		return $this->sucSysJson($dataList);
	}
	/**
	 * 获取Live直播直播列表
	 * @param  integer $page  页码
	 * @param  integer $limit 每页条数
	 * @return [array]         
	 */
	public function liveList($page=1,$limit=5){
		$UserM = new UserM();
		$dataList = $UserM->getLiveList($page,$limit);
		if(!empty($dataList)){
			foreach ($dataList as $k => $v) {
				$v['isLiving'] = !empty($v['ua_user_level']) ? 1 : 0;
			}
		}
		return $this->sucSysJson($dataList);
	}
	/**
	 * 获取公众号二维码
	 * @return [type] [description]
	 */
	public function getQrCode(){
		return $this->sucSysJson(config('WX_DOMAIN').config('qrcode'));
	}
	
	/**
	 * 大策略H5-获取首页金牌讲师
	 * @return \think\response\Json
	 */
	public function getH5TeacherList(){
		$adsModel = new \app\wechat\model\Ads();
		$result = $adsModel->where('type', 3)
			->where('positionType', 27)
			->where('dataFlag', 1)
			->where('adStatus', 1)
			->field('adName,adFile,adURL,relevanceType,relevanceId')
			->select();
		return $this->sucSysJson($result);
	}
	
	/**
	 * 大策略H5-获取精品课程
	 * @return \think\response\Json
	 */
	public function getH5CourseList($page, $limit){
		$model = new Course();
		$result = $model->whereShow()->alias('c')
					->field('c.id,c.class_name,c.study_num+c.virtual_study_num as study_num,c.src_img,c.seriesType,c.price,c.origin_price,u.alias')
					->join('talk_user u', 'c.uid = u.user_id')
					->where('c.type', 2)
					->where('c.seriesType', 'in', '1,2')
					->order('c.create_time desc')->page($page, $limit)->select();
		return $this->sucSysJson($result);
	}
	
	/**
	 * 大策略H5-私人定制页
	 * @return \think\response\Json
	 */
	public function getCustomPage()
	{
		$model = new \app\wechat\model\Ads();
		$result = $model->where('type', 3)->where('positionType', 28)->field('adId,adFile')->find();
		return $this->sucSysJson($result);
	}
	
}
