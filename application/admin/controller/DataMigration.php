<?php
namespace app\admin\controller;

use app\admin\model\MigrationLog;
use app\admin\model\User;

//讲师数据迁移
class DataMigration extends App{
	public function index(){
		if(request()->isPost()){
			$param = input('param.');
			$MigrationLogM = new MigrationLog();
			$list = $MigrationLogM->getList($param['pageNumber'],$param['pageSize'],$param['teacherId'],$param['teacherName'],$param['logmin'],$param['logmax']);
			foreach ($list['list'] as $k => $v) {
				$v['sort'] = $k + 1;
				$v['migration_type'] = ($v['type'] == 1) ? '迁移完成' : '迁移中';
			}
			$data = ['rows' => $list['list'], 'total' => $list['count']];
            return $this->sucJson($data);
		}
		return $this->fetch();
	}
	public function add(){
		//官方账号id
		$official_id = config('official_id');
		$teacherId = input('teacher_id');
		$MigrationLogM = new MigrationLog();
		$UserM = new User();
		//迁移过的讲师不能再次迁移
		$ifMigration = $MigrationLogM->where('teacher_id',$teacherId)->find();
		$data['status'] = 0;
		if(!empty($ifMigration)){
			$data['msg'] = '请勿重复提交';
			return $data;
		}
		//判断官方账号是否存在
		$officialInfo = $UserM->where('user_level',2)->where('user_id',$official_id)->find();
		if(empty($officialInfo)){
			$data['msg'] = '官方账号不存在';
			return $data;
		}
		//判断讲师账号是否存在
		$teacherInfo = $UserM->where('user_level',2)->where('user_id',$teacherId)->find();
		if(empty($teacherInfo)){
			$data['msg'] = '讲师账号不存在';
			return $data;
		}
		//官方账号数据不能被迁移
		if($official_id == $teacherId){
			$data['msg'] = '官方账号数据不能被迁移';
			return $data;
		}
		$insertData['teacher_id'] = $teacherInfo['user_id'];
		$insertData['teacher_name'] = $teacherInfo['alias'];
		$insertData['official_id'] = $official_id;
		$insertData['admin_id'] = $_SESSION['adminSess']['admin']['id'];
		$insertData['admin_name'] = $_SESSION['adminSess']['admin']['username'];
		$insertState = $MigrationLogM->insert($insertData);
		if($insertState){
			$data['status'] = 1;
			$data['msg'] = '提交成功，准备迁移中，大约耗时30分钟。';
			return $data;
		}else{
			$data['msg'] = '迁移失败';
			return $data;
		}
		return $data;
	}
	public function getTeacherInfo(){
		$UserM = new User();
		$teacher_id = input('teacher_id');
		//官方账号id
		$official_id = config('official_id');
		//官方账号数据不能被迁移
		if($official_id == $teacher_id){
			return $this->error('官方账号数据不能被迁移');
		}
		//判断用户身份
		$where['user_level'] = 2;
		$where['user_id'] = $teacher_id;
		$teacherInfo = $UserM->where($where)->find();
		if(empty($teacherInfo)){
			$data['status'] = 0;
			$data['msg'] = '讲师不存在';
		}else{
			$data['status'] = 1;
			$data['msg'] = '讲师id:'.$teacherInfo['user_id'].'</br>'.'讲师昵称:'.$teacherInfo['alias'].'</br></br></br>'.'是否将此讲师历来发布的所有课程、观点都迁移到大策略官方账号下？此操作不可逆，请谨慎操作！';
		}
		return $data;
	}
}