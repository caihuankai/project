<?php
namespace app\wechat\model;

use app\common\model\ModelBs;

/**
 * 用户行为记录
 */
class BehaviorRecord extends ModelBs{
	/**
	 * 增加记录
	 * @param  [type] $type  
	 * 1:访问课程详情页(PV) 
	  2:访问课程详情页(UV) 
	  5:访问观点详情(PV) 
	  6:访问观点详情(UV) 
	  7:访问栏目(PV) 
	  8:访问栏目(UV) 
	  9:访问课程直播间(PV) 
	  10:访问课程直播间(UV)
	  11:访问公共直播间(PV)
	  12:访问公共直播间(UV)
	  13:访问live直播间(PV)
	  14:访问live直播间(UV)   
	 * @param  [type] $targetId 对象ID
	 * PV一天多条，UV一天一条
	 * @return [type]           [description]
	 */
	public function record($user_id,$type,$target_id){
		$insertData['user_id'] = $user_id;
		$insertData['type'] = $type;
		$insertData['target_id'] = $target_id;
		$insertData['date'] = date('Y-m-d');
		$this->insert($insertData);
		//UV一天一条 判断当天是否已存在记录
		$insertData['type'] = $insertData['type']+1;
		$state = $this->where($insertData)->find();
		if(empty($state)){
			$this->insert($insertData);
		}
	}
}