<?php

namespace app\admin\model;

class UserJiahua extends \app\common\model\User{
    /***
     * 定义类型
     * @var array
     */
    protected $dataTeam = [
        '0' => '所属团队',
        '1' => '81',
        '2' => '82',
        '3' => '91',
        '4' => '92',
        '5' => '93'
    ];
    
    protected $userLevelText = [
    		1 => '学生',
    		2 => '讲师',
    		3 => '助教'
    ];
    
    /**
     * 获取$type类型数据的状态类型
     * @param $type
     * @param $key
     * @return string
     */
    public function getDataStatus($type,$key=null)
    {
        $type = "data".$type;
        $data = $this->$type;
        return isset($data[$key])? $data[$key]:$data;
    }
    
    /**
     * 获取用户角色
     * @param unknown $level
     * @return string[]|mixed|array|\ArrayAccess
     */
    public function getUserLevelText($level)
    {
    	return !is_null($level) ? getDataByKey($this->userLevelText, $level, 0) : $this->userLevelText;
    }

	public function getList($param){
		$page = !isset($param['pageNumber']) ? 1 : $param['pageNumber'];
        $size = !isset($param['pageSize']) ? 10 : $param['pageSize'];
        $where = array();
        !empty($param['user_id']) ? $where['user_id'] = $param['user_id'] : '';
        !empty($param['alias']) ? $where['alias'] = $param['alias'] : '';
        if($param['freeze'] == 1){
        	$where['freeze'] = 0;
        }elseif($param['freeze'] == 2){
        	$where['freeze'] = 1;
        }
        $list = $this->where($where)
        ->page($page,$size)
        ->select();
        $count = $this->where($where)->count();
        $data['list'] = $list;
        $data['count'] = $count;
        return $data;
	}
	
	/**
	 * 改变直播间状态，默认屏蔽
	 *
	 * @param     $ids
	 * @param int $status
	 * @return $this
	 * @author aozhuochao<aozhuochao@99cj.com.cn>
	 */
	public function closeStatus($ids, $status = 1)
	{
		$ids = array_filter((array)$ids);
		if (empty($ids)) {
			return $this;
		}
		
		/** @var \app\admin\event\User $event */
		$event = $this->getLocalEvent();
		!is_null($event) && ($event->userIds = $ids);
		
		return $this->update(['freeze' => $status], ['user_id' => ['in', $ids]]);
	}
	
}