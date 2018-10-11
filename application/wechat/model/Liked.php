<?php
namespace app\wechat\model;

use app\common\model\ModelBs;
use app\common\model\Live;

/**
 * 用户点赞记录表
 * @author xiaok
 * @time 2017/08/08
 */
class Liked extends ModelBs{
	public function index($live_id=1,$user_id=1){
		$date = date("Y-m-d");
		$where['user_id'] = $user_id;
		$where['live_id'] = $live_id;
		$where['date'] = $date;
		$LiveModel = new Live();
		$this->db()->startTrans();
		//直播间人气值加1
		$LiveInfo = $LiveModel->field('popular')->where('id',$live_id)->find();
		try{
			//判断用户当日是否存在记录 
			$todayInfo = $this->db()->where($where)->find();
			if(empty($todayInfo)){
				$data = $where;
				$data['number'] = 1;
				$this->db()->insert($data);
			}else{
				//如果大于一百 则不记录
				if($todayInfo['number']>=100){
					return ['code' => 0, 'data' => $LiveInfo['popular'], 'msg' => '今日点赞次数已达上限'];
				}else{
					$this->db()->where($where)->update([
						'number' => $todayInfo['number'] + 1,
					]);
				}
			}
			$LiveStatus = $LiveModel->db()->where('id',$live_id)->update([
				'popular' => (int)$LiveInfo['popular'] + 1,
			]);
			$this->db()->commit();
			if($LiveStatus){
				return ['code' => 0, 'data' => $LiveInfo['popular']+1, 'msg' => '点赞成功'];
			}else{
				return ['code' => 0, 'data' => $LiveInfo['popular'], 'msg' => '点赞失败'];
			}
		}catch(Exception $e){
			$this->db()->rollback();
			return ['code' => 0, 'data' => $LiveInfo['popular'], 'msg' => '点赞失败'];
		}
	}
}