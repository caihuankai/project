<?php

namespace app\wechat\model;

use think\Db;
use app\wechat\model\User as MUser;
use app\common\model\ModelBs;
use app\wechat\model\Course;

class HitRecord extends ModelBs
{
	/**
	 * 新增关注
	 */
	public function add(){
	    $id = input("param.id/d");
		$type = input("param.type/d");
		$m =new MUser();
		$userData = $m->getSessionUserData();
		$userId = $userData['user_id'];
		
		//判断记录是否存在
		$isFind = false;
		$isOwn = false;
		if($type==0){
			//$c = Db::connect('bs_db_config')->table('talk_live')->where(['open_status'=>1,'status'=>1,'id'=>$id])->count();
			$c = Db::connect('bs_db_config')->table('talk_live')->where(['id'=>$id])->count();
			$isFind = ($c>0);
			$d = Db::connect('bs_db_config')->table('talk_live')->where(['user_id'=>$userId,'id'=>$id])->count();
			$isOwn = ($d>0);
		}elseif ($type==1){
			//$c = Db::connect('bs_db_config')->table('talk_course')->where(['open_status'=>1,'status'=>3,'id'=>$id])->count();
			$c = Db::connect('bs_db_config')->table('talk_course')->where(['id'=>$id])->count();
			$isFind = ($c>0);
			$d = Db::connect('bs_db_config')->table('talk_course')->where(['uid'=>$userId,'id'=>$id])->count();
			$isOwn = ($d>0);
		}else {
			return WReturn("关注失败，无效的关注类型", -1);
		}
		if(!$isFind || $isOwn)return WReturn("关注失败，无效的关注对象", -1);
		$data = [];
		$data['userId'] = $userId;
		$data['hitRecordType'] = $type;
		$data['targetId'] = $id;
		//判断是否已关注
		$rc = Db::connect('bs_db_config')->table('talk_hit_record')->where($data)->count();
		if($rc>0)return WReturn("点击记录成功", 1);
		$data['createTime'] = date('Y-m-d H:i:s');
		$rs = Db::connect('bs_db_config')->table('talk_hit_record')->insert($data);
		if(false !== $rs){
			$hitRecordId = Db::connect('bs_db_config')->table('talk_hit_record')->getLastInsID();
			return WReturn("点击记录成功", 1,['hitRecordId'=>$hitRecordId]);
		}else{
			return WReturn($this->getError(),-1);
		}
	}
	
	/**
	 * 检查并记录用户操作观点‘有用/点赞’
	 * @param unknown $viewpointId
	 * @return number[]|string[]
	 * @author liujuneng
	 */
	public function addForViewpoint($viewpointId)
	{
		$m =new MUser();
		$userData = $m->getSessionUserData();
		$userId = $userData['user_id'];
		
		//判断记录是否存在
		$isFind = false;
// 		$isOwn = false;
		$c = Db::connect('bs_db_config')->table('talk_viewpoint')->where(['id'=>$viewpointId])->count();
		$isFind = ($c>0);
// 		$d = Db::connect('bs_db_config')->table('talk_viewpoint')->where(['uid'=>$userId,'id'=>$viewpointId])->count();
// 		$isOwn = ($d>0);
		
		if(!$isFind) return ['code'=>-1, 'msg'=>'记录失败，找不到对应观点'];
// 		if($isOwn) return ['code'=>-1, 'msg'=>'记录失败，作者无法操作'];
		$data = [];
		$data['userId'] = $userId;
		$data['hitRecordType'] = 4;
		$data['targetId'] = $viewpointId;
		//判断是否已记录
		$rc = Db::connect('bs_db_config')->table('talk_hit_record')->where($data)->count();
		if($rc>0) return ['code'=>0, 'msg'=>'记录失败，已记录过'];
		$data['createTime'] = date('Y-m-d H:i:s');
		$rs = Db::connect('bs_db_config')->table('talk_hit_record')->insert($data);
		if(false !== $rs){
			return ['code'=>1, 'msg'=>'记录成功'];
		}else{
			return ['code'=>-1, 'msg'=>'记录失败'];
		}
		
	}

	/**
	 * 点击的课程列表
	 */
	public function listCourseQuery(){
		$pagesize = input("param.pagesize/d");
		$m = new MUser();
		$userData = $m->getSessionUserData();
		$userId = $userData['user_id'];
		// $userId = 1706743;
		// $pagesize = 10;
		
		$map['f.userId'] = $userId;
		$map['f.hitRecordType'] = 3;
		$map['s.status']  = ['<>',5];
		$page = Db::connect('bs_db_config')->table('talk_hit_record')->alias('f')
		->join('talk_course s','s.id = f.targetId','left')
		->join('talk_live k','k.id = s.live_id','left')
		->join('talk_user u','u.user_id = s.uid','left')
		->field('f.hitRecordId,f.targetId,s.id,s.class_name,s.src_img,s.study_num watch_count,s.type,s.form,s.level,s.price,s.plan_num,s.status,u.alias as name')
		//->where(['f.userId'=> $userId,'f.hitRecordType'=> 1])
		->where($map)
		//->order('f.hitRecordId desc')
		->order('f.createTime desc')
		->paginate($pagesize)->toArray();
		
		$pidList = [];
		foreach ($page['data'] as $info) {
			if ($info['type'] == 2) {
				$pidList[] = $info['id'];
			}
		}
		
		$childCourseNumList = [];
		if (!empty($pidList)) {
			$courseModel = new Course();
			$childCourseNumList = $courseModel->getChildCourseNum($pidList);
		}
		
		foreach($page['data'] as $key=>$value){
			$page['data'][$key]['src_img'] = \helper\UrlSys::handleIndexImg($value['src_img']);
			$page['data'][$key]['price'] = floatval($value['price']);
			if ($value['type'] == 2) {
				$page['data'][$key]['childCourseNum'] = isset($childCourseNumList[$value['id']]) ? $childCourseNumList[$value['id']] : 0;
			}
		}
		return $page;
	}	
    
}