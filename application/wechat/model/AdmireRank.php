<?php
namespace app\wechat\model;

use app\common\model\ModelBs;

/**
 * 用户赞赏排行表
 * @author xiaok
 * @time 2017/08/10
 */
class AdmireRank extends ModelBs{
	//@param master_userid:被赞赏用户id,user_id:赞赏用户id,amount:赞赏金额
	public function upAdmireRank($master_userid,$user_id,$amount){
		//用户赞赏记录
		$where['master_userid'] = $master_userid;
		$where['user_id'] = $user_id;
		$userRecord = $this->where($where)->find();
		//如果用户不存在记录 则插入记录
		if(empty($userRecord)){
			$data = $where;
			$data['total'] = $amount;
			$this->insert($data);
		}else{
			$this->where($where)->update([
				'total' => $userRecord['total'] + $amount,
			]);
		}
	}
	//赞赏排行榜
	public function admireList($user_id,$page,$type){
		$limit = 30;
		if($page >= 4){
			$page = 4;
			$limit = 10;
		}
		$data = $this->alias('a')
		->where('a.master_userid',$user_id)
		->where('a.type',$type)
		->field('u.alias,u.head_add,a.total')
		->join('user u','u.user_id = a.user_id','left')
		->order('a.total','desc')
		->page($page,$limit)
		->select();
		return $data;
	}
}