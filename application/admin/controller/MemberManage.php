<?php

namespace app\admin\controller;

use app\admin\model\UserJiahua;

/**
 * 家华课堂会员管理
 */
class MemberManage extends App{
	public function index(){
		$UserJiahuaM = new UserJiahua();
		if(request()->isPost()){
			$param = input('param.');
			$dataList = $UserJiahuaM->getList($param);
			$list = $dataList['list'];
			foreach ($list as $k => $v) {
				$v['freeze'] == 0 ? $v['freeze_name'] = '未禁用' : $v['freeze_name'] = '已禁用';
				$v['operate'] = '<a href="javascript:edit_password('.$v['user_id'].','.$v['password'].');">重置密码</a>';
				$v['head_add'] = '<img  src="'.$v['head_add'].'" style="width: 20px;">';
			}
			$data = ['rows' => $list, 'total' => $dataList['count']];
			return $this->sucJson($data);
		}
		return $this->fetch();
	}
	/**
	 * 修改密码
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function edit_password($id,$password){
		$UserJiahuaM = new UserJiahua();
		$UserJiahuaM->where('user_id',$id)->update([
			'password' => $password
		]);
	}
	/**
	 * 禁用用户
	 * @return [type] [description]
	 */
	public function disable_array(){
		$ids = input('param.id');
		$UserJiahuaM = new UserJiahua();
		$json['disable'] = date("Y-m-d H:i:s").':禁用';
		$status = $UserJiahuaM->where('user_id','in',$ids)->update([
			'freeze' => 1,
			'remark' => json_encode($json),
		]);
		if($status){
			$rtd['status'] = 1;
			$rtd['msg'] = "禁用成功";
        	return $rtd;
		}else{
			$rtd['status'] = -1;
			$rtd['msg'] = "禁用失败";
        	return $rtd;
		}
	}
	/**
	 * 启用用户
	 * @return [type] [description]
	 */
	public function enabledel_array(){
		$ids = input('param.id');
		$UserJiahuaM = new UserJiahua();
		$json['enabledel'] = date("Y-m-d H:i:s").':启用';
		$status = $UserJiahuaM->where('user_id','in',$ids)->update([
			'freeze' => 0,
			'remark' => json_encode($json),
		]);
		if($status){
			$rtd['status'] = 1;
			$rtd['msg'] = "启用成功";
        	return $rtd;
		}else{
			$rtd['status'] = -1;
			$rtd['msg'] = "启用失败";
        	return $rtd;
		}
	}
}