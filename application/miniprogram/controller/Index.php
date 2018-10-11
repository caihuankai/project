<?php
namespace app\miniprogram\controller;

use app\admin\model\Notice;
use app\wechat\model\Live as LiveM;
use app\wechat\model\LiveFocus;
use app\wechat\model\User as UserM;

class Index extends App{
        
    public function index(){
        echo 'miniprogram';
    }

    /**
     * 返回公共直播间推拉流地址，推流状态
     * @return [array] 
     */
    public function liveStream(){
        $data['push_url'] = config('push_url')."1_1000009999?user=99cj&passwd=hc992017win";
        $data['pull_url'] = config('pull_url')."1_1000009999/playlist.m3u8";
        $LiveStateModel = new \app\wechat\model\LiveState();
        $data['state'] = $LiveStateModel->getState($groupid = 1000009999);
        return $this->sucSysJson($data);
    }

    /**
	 * 获取公告
	 * @return [array] [description]
	 */
	public function getNotice(){
		$NoticeModel = new Notice();
		$date = time();
		$data = $NoticeModel
		->field('id,title,content')
		->where('status=1')
		->where('UNIX_TIMESTAMP(endtime)>'.$date)
		->select();
		if(!empty($data)){
			foreach ($data as $k => $v) {
				$v['title'] = $v['content'];
			}
		}
		return $this->sucSysJson($data);
	}

	/**
	 * 关注 取消关注接口
	 * @param integer $user_id 用户id
	 * @param integer $teacher_id 讲师id
	 * @param integer $type    关注或取关 1关注 0取消关注
	 */
	public function focus($user_id = 1706743,$teacher_id = 1,$type = 1){
		$user_id = (int)$user_id;
		$teacher_id = (int)$teacher_id;
		$type = (int)$type;
		//获取讲师直播间id
		$LiveM = new LiveM();
		$live_id = $LiveM->where('user_id',$teacher_id)->value('id');
		if(empty($live_id)){
			return $this->sucSysJson(0,'讲师不存在',-1);
		}
		$LiveFocusModel = new LiveFocus();
		$status = $LiveFocusModel->focus($live_id,$user_id,$type,$target=1);
		return $this->sucSysJson($status['data'],$status['msg'],200);
	}
	/**
	 * 讲师列表
	 * @param  integer $page  页码
	 * @param  [type]  $limit 每页条数
	 * @return [arrray]         
	 */
	public function liveTeacherList($page=1,$limit=20){
		$UserM = new UserM();
		$dataList = $UserM->getTeacherList($page,$limit);
		return $this->sucSysJson($dataList);
	}
	/**
	 * Live直播列表
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
}
