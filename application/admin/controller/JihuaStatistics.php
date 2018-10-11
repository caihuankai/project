<?php
namespace app\admin\controller;

use app\admin\model\LiveStatistics;

class JihuaStatistics extends App{
	public function index(){
		$LiveStatisticsM = new LiveStatistics();
		if(request()->isPost()){
			$param = input('param.');
			$list = $LiveStatisticsM->jhStatistics($param['pageNumber'],$param['pageSize'],$param['logmin'],$param['logmax'],$param['groupid']);
			foreach ($list['list'] as $k => $v) {
				$v['userTime'] = sprintf("%.2f",(int)$v['timeTotal']/(int)$v['userTotal']);
				switch ($v['global_id']) {
					case 1:
						$v['groupTime'] = '9:20 - 10:30';
						break;
					case 2:
						$v['groupTime'] = '10:30 - 11:30';
						break;
					case 3:
						$v['groupTime'] = '13:00 - 14:00';
						break;
					case 4:
						$v['groupTime'] = '14:00 - 15:00';
						break;
					case 5:
						$v['groupTime'] = '15:00 - 16:00';
						break;
					case 6:
						$v['groupTime'] = '19:00 - 20:00';
						break;
					case 7:
						$v['groupTime'] = '20:00 - 21:00';
						break;
					
					default:
						# code...
						break;
				}
				$v['operate'] = '<a href="javascript:detail('.$v['statistics_time'].','.$v['global_id'].');">查看</a>';
			}
			$data = ['rows' => $list['list'], 'total' => $list['count']];
			return $this->sucJson($data);
		}
		return $this->fetch();
	}
	/**
	 * 在线人数列表
	 * @param  [type] $statistics_time 日期
	 * @param  [type] $global_id       课程标识
	 * @return [type]                  [description]
	 */
	public function userList($statistics_time='',$global_id=''){
		$LiveStatisticsM = new LiveStatistics();
		if(request()->isPost()){
			$param = input('param.');
			$list = $LiveStatisticsM->jsOnlineList($param['pageNumber'],$param['pageSize'],$param['statistics_time'],$param['global_id'],$param['groupid']);
			foreach ($list['list'] as $k => $v) {
				switch ($v['userGroup']) {
					case 1:
						$v['userGroupName'] = 81;
						break;
					case 2:
						$v['userGroupName'] = 82;
						break;
					case 3:
						$v['userGroupName'] = 91;
						break;
					case 4:
						$v['userGroupName'] = 92;
						break;
					case 5:
						$v['userGroupName'] = 93;
						break;
					
					default:
						# code...
						break;
				}
			}
			$data = ['rows' => $list['list'], 'total' => $list['count']];
			return $this->sucJson($data);
		}
		$this->assign('statistics_time',$statistics_time);
		$this->assign('global_id',$global_id);
		return $this->fetch();
	}
}





