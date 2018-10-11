<?php
namespace app\admin\model;

use app\common\model\ModelBs;
use app\admin\model\Course;

class SetTop extends ModelBs{

	public function dataList($page,$size,$courseName,$teacherName,$type,$level,$isTop,$CreateTimeMin,$CreateTimeMax,$formtype=1){
		$CourseM = new Course();
		$where = [];
		$where['c.type'] = ['in',[1,2]];
		$where['c.pid'] = 0;
		$where['c.status'] = ['in',[1,4]];
		$where['c.seriesType'] = 0;
		$whereForm = '';
		if($formtype == 3){
			$whereForm = 'if(c.type = 1,c.form = 2,c.form = 1)';
		}
		if(!empty($CreateTimeMax)){
        	$CreateTimeMax = date('Y-m-d',strtotime("$CreateTimeMax+1 day")); 
        }
        if(!empty($CreateTimeMax) && !empty($CreateTimeMin))$where['c.create_time'] = ['between time',array($CreateTimeMin,$CreateTimeMax)];

		if(!empty($CreateTimeMax) && empty($CreateTimeMin))$where['c.create_time'] = ['<',$CreateTimeMax];

		if(empty($CreateTimeMax) && !empty($CreateTimeMin))$where['c.create_time'] = ['>',$CreateTimeMin,$CreateTimeMax];
		!empty($courseName) ? $where['c.class_name'] = ['like', "%{$courseName}%"] : '';
		!empty($teacherName) ? $where['u.alias'] = ['like', "%{$teacherName}%"] : '';
		$type != -1 ? $where['c.type'] = $type : '';
		$level != -1 ? $where['c.level'] = $level : '';
		// $isTop != -1 ? $where['t.id'] != null : '';
		$list = $CourseM->alias('c')
		->field('t.id,c.id as course_id,c.class_name,u.alias,u.user_id,c.type,c.level,c.price,c.study_num,c.create_time,t.id as isTop,t.operatorName,t.sort,ta.sort as ta_sort,ta.operatorName as ta_operatorName,ta.id as ta_id')
		->join('talk_user u','u.user_id = c.uid')
		->join('talk_set_top t','t.target_id = c.id and t.type = '.$formtype.'','left')
		->join('talk_set_top ta','ta.target_id = c.id and ta.type = 4','left')
		->where($where)
		->where($whereForm)
		->order('IF(ISNULL(t.sort),1,0),t.sort,IF(ISNULL(ta.sort),1,0),ta.sort,c.id desc')
		->page($page,$size)
		->select();
		$count = $CourseM->alias('c')
		->field('c.id')
		->join('talk_user u','u.user_id = c.uid')
		->join('talk_set_top t','t.target_id = c.id and t.type = '.$formtype.'','left')
		->where($where)
		->where($whereForm)
		->count();
		$data['list'] = $list;
		$data['count'] = $count;
		return $data;
	}
}