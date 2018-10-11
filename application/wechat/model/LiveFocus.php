<?php
namespace app\wechat\model;

use app\common\model\ModelBs;
use app\wechat\model\Live;
use app\wechat\model\Column;

/**
 * 直播间关注表
 * @author xiaok
 * @time 2017/06/06
 */
class LiveFocus extends ModelBs{
    
    
    /**
     * 获取直播间关注列表，排除机器人
     *
     * @param        $liveId
     * @param        $field
     * @param int    $robot
     * @param string $order
     * @return false|\PDOStatement|string|\think\Collection|array
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function getFocusList($liveId, $field, $robot = 2, $order = '')
    {
        return $this->where(['live_id' => ['eq', $liveId], 'robot' => $robot])->field($field)->order($order)->select();
    }
    
    
    /**
     * 返回当前用户userId，与多个空间的是否关注
     * 1为关注，2为未关注，3为不显示关注按钮
     *
     * @param       $userId
     * @param array $liveIds
     * @return array
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function ifFocusList($userId, array $liveIds)
    {
        if (empty($liveIds)) {
            return [];
        }
        
        // todo 可实现session缓存
        /** @var \app\wechat\model\Live $liveModel */
        $liveModel = model('wechat/Live');
        $userLiveData = $liveModel->getLiveDataByUserId($userId);
        
        $focusData = $this->where(['user_id' => $userId, 'live_id' => ['in', $liveIds]])->column('id', 'live_id');
        $result = [];
    
        foreach ($liveIds as $liveId) {
            if (!empty($userLiveData['id']) && $liveId == $userLiveData['id']){ // 当前用户的直播间
                $result[$liveId] = 3;
            }else if (!empty($focusData[$liveId])) {
                $result[$liveId] = 1;
            } else {
                $result[$liveId] = 2;
            }
        }
        
        return $result;
    }
    
    
    
    
    /**
     * 处理机器人图片
     *
     * @param $name
     * @return string
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function handleRobotPic($name)
    {
        return url('/images/robot/' . $name . '.jpg', '', false, \helper\UrlSys::getWxHost());
    }
    
    
	//判断用户是否关注该直播间
	public function isFocus($live_id,$user_id,$target=1){
		$where['live_id'] = $live_id;
		$where['user_id'] = $user_id;
		$where['target'] = $target;
		$status = $this->field('id')
		->where($where)
		->find();
		if(empty($status)){
			return 0;
		}else{
			return 1;
		}
	}
	//直播间关注人数
	public function countFouce($live_id,$target=1){
		$data = $this->where('live_id',$live_id)->where('target',$target)->count();
		return $data;
	}
	
	
	//关注直播间 $type 1关注 0取消关注
	public function focus($live_id,$user_id,$type,$target=1){
		$data['live_id'] = $live_id;
		$data['user_id'] = $user_id;
		$data['target'] = $target;
		if($target == 1){
			$LiveModel = new Live();
		}else{
			$LiveModel = new Column();
		}
		$LiveData = $LiveModel->where('id',$live_id)->find();
		$LiveData['virtual_focus_num'] = $LiveData['focus_num'] + $LiveData['virtual_focus_num'];
		
		//验证用户 防止恶意刷关注（待编写）
		if($type == 1){
			//判断是否关注
			$isFocus = $this->isFocus($live_id,$user_id,$target);
			if($isFocus == 1){
				return ['code' => 1, 'data' => $LiveData['virtual_focus_num'], 'msg' => '重复关注'];
			}
			$this->db()->startTrans();
			try{
				//擦入用户关注表
				$status = $this->db()->insert($data);
				//直播间关注人数+1
				if($status){
					$LiveAdd = $LiveModel->db()->where('id',$live_id)->update([
						'focus_num'	 => $LiveData['focus_num']+1,
					]);
				}
				$this->db()->commit();
				if($status){
					return ['code' => 0, 'data' => $LiveData['virtual_focus_num']+1, 'msg' => '关注成功'];
				}else{
					return ['code' => 1, 'data' => $LiveData['virtual_focus_num'], 'msg' => '关注失败'];
				}
			}catch(Exception $e){
				$this->db()->rollback();
				return ['code' => 1, 'data' => $LiveData['virtual_focus_num'], 'msg' => '操作失败'];
			}
		}
		if($type == 0){
			$this->db()->startTrans();
			try{
				$status = $this->db()->where($data)->delete();
				//直播间关注人数-1
				if($status){
					$LiveDel = $LiveModel->db()->where('id',$live_id)->update([
						'focus_num'	 => $LiveData['focus_num']-1,
					]);
				}
				$this->db()->commit();
				if($status){
					return ['code' => 0, 'data' => $LiveData['virtual_focus_num']-1, 'msg' => '取消关注成功'];
				}else{
					return ['code' => 1, 'data' => $LiveData['virtual_focus_num'], 'msg' => '取消关注失败'];
				}
			}catch(Exception $e){
				$this->db()->rollback();
				return ['code' => 1, 'data' => $LiveData['virtual_focus_num'], 'msg' => '操作失败'];
			}
		}
	}
	/**
	 * 返回用户关注人数
	 * @param  [type] $user_id 
	 * @return [int]          
	 */
	public function userFocusNum($user_id,$target=1){
		$where['a.user_id'] = $user_id;
		$where['a.robot'] = 2;
		// $where['a.target'] = $target;
		$data = $this
		->alias('a')
		->join('talk_live l','l.id = a.live_id')
		->where('a.target',1)
		->where($where)
		->count();

		$data1 = $this->alias('a')
		->join('talk_column c','c.id = a.live_id')
		->where('a.target',2)
		->where($where)
		->count();
		return $data + $data1;
	}
	/**
	 * 获取用户关注栏目列表
	 * @param  [type] $user_id [description]
	 * @return [type]          [description]
	 */
	public function userFocusColumnList($user_id){
		$where['a.user_id'] = $user_id;
		$where['a.target'] = 2;
		$data = $this->alias('a')
		->field('c.id,c.name,c.lead,q.qiniuImg')
		->join('talk_column c','c.id = a.live_id')
		->join('talk_qiniu_gallerys q','q.id = c.qiniu_id','left')
		->where($where)
		->select();
		return $data;
	}
}