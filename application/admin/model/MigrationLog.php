<?php
namespace app\admin\model;

use app\common\model\ModelBs;
use app\admin\model\User;
use app\admin\model\Live;
use app\admin\model\Course;
use app\admin\model\Viewpoint;
use app\admin\model\ThirdLogin;


class MigrationLog extends ModelBs{
	public function getList($pageNumber,$pageSize,$teacherId,$teacherName,$CreateTimeMin,$CreateTimeMax){

		$where = array();
		!empty($teacherId) ? $where['teacher_id'] = $teacherId : '';
		!empty($teacherName) ? $where['teacher_name'] = ['like',"%{$teacherName}%"] : '';
		!empty($CreateTimeMax) ? $CreateTimeMax = date("Y-m-d",strtotime($CreateTimeMax."+ 1 day")) : '';
		if(!empty($CreateTimeMax) && !empty($CreateTimeMin))$where['finish_time'] = ['between time',array($CreateTimeMin,$CreateTimeMax)];

		if(!empty($CreateTimeMax) && empty($CreateTimeMin))$where['finish_time'] = ['<',$CreateTimeMax];

		if(empty($CreateTimeMax) && !empty($CreateTimeMin))$where['finish_time'] = ['>',$CreateTimeMin,$CreateTimeMax];
		$data['list'] = $this->where($where)->select();
		$data['count'] = $this->where($where)->count();
		return $data;
	}
	/**
	 * 数据迁移是把讲师的身份改成学生，把他的live直播间禁用，课程和观点移到公共账号名下，聊天记录清除
	 */
	public function migration_working(){

		//每次取出迁移表一条数据进行处理
		$MigrationLogLimit = $this->where('type',0)->limit(1)->find();
		if(empty($MigrationLogLimit)){
			return;
		}

		$UserM = new User();
		//判断迁移讲师账号是否存在
		$teacher_id = $MigrationLogLimit['teacher_id'];
		$teacherInfo = $UserM->where('user_level',2)->where('user_id',$teacher_id)->find();
		if(empty($teacherInfo)){
			return;
		}

		$official_id = $MigrationLogLimit['official_id'];//迁移目标id
		//判断迁移目标id是否和配置官方id一致
		$config_official_id = config('official_id');//配置文件官方id
		if($official_id != $config_official_id){
			return;
		}
		//判断官方账号是否存在
		$officialInfo = $UserM->where('user_level',2)->where('user_id',$official_id)->find();
		if(empty($officialInfo)){
			return;
		}
		
		$LiveM = new Live();
		$CourseM = new Course();
		$ViewpointM = new Viewpoint();
		$ThridLoginM = new ThirdLogin();

		//获取官方账号live直播间id
		$official_live_info = $LiveM->where('user_id',$official_id)->find();
		if(empty($official_live_info)){
			return;
		}
		$official_live_id = $official_live_info['id'];//官方账号live直播间id

		//获取讲师被迁移课程id列表
		$teacherCourseIdList = $CourseM->where('uid',$teacher_id)->column('id');
		$teacherCourseIdList = json_encode($teacherCourseIdList);

		//获取讲师被迁移观点id列表
		$teacherViewpointIdList = $ViewpointM->where('uid',$teacher_id)->column('id');
		$teacherViewpointIdList = json_encode($teacherViewpointIdList);


		//数据迁移处理
		$this->db()->startTrans();
		try{
			//更新迁移表状态
			$this->db()->where('id',$MigrationLogLimit['id'])->update([
				'type' => 1,
				'course_list' => $teacherCourseIdList,
				'viewpoint_list' => $teacherViewpointIdList,
				'finish_time' => date('Y-m-d H:i:s')
			]);
			//把讲师身份改为学生
			$UserM->db()->where('user_id',$teacher_id)->update([
				'user_level' => 1
			]);
			//删除讲师live直播间
			$LiveM->db()->where('user_id',$teacher_id)->delete();
			//把讲师发布的所有课程迁移到公共账号
			$CourseM->db()->where('uid',$teacher_id)->update([
				'uid' => $official_id,
				'live_id' => $official_live_id
			]);
			//把讲师发布的所有观点迁移到公共账号
			$ViewpointM->db()->where('uid',$teacher_id)->update([
				'uid' => $official_id,
				'live_id' => $official_live_id
			]);
			//删除讲师账号
			$ThridLoginM->db()->where('user_id',$teacher_id)->delete();
			$this->db()->commit();
		}catch(Exception $e){
			$this->db()->rollback();
		}
	}
}