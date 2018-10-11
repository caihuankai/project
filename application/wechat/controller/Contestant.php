<?php
namespace app\wechat\controller;

use app\wechat\model\Contestant as MContestant;
use app\wechat\model\ContestantVote as MContestantVote;
use app\wechat\model\ContestantLog as MContestantLog;

class Contestant extends App
{
	protected $noLoginAction = [
			'index',
			'exportExcel',
			'addVote'
	];
	
	/**
	 * 同步登陆状态临时方法
	 * 
	 * @return string
	 */
	public function index(){
		$redirectUrl = $this->request->param('redirectUrl');
		if (!empty($redirectUrl)) {
			$sessionId = $this->request->param('sessionId');
			if (!empty($sessionId)) {
				cookie('PHPSESSID', base64_decode($sessionId));
			}
			$redirectUrl = urldecode($redirectUrl);
			$this->redirect($redirectUrl);
		}
		return 'error';
	}
	
	/**
	 * 获取投票页面信息
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function getContestantList()
	{
		$model = new MContestant();
		$contestantList = $model->order('vote desc')->select();
		$viewTotal = cache('contestantViewTotal');
		if (empty($viewTotal)) {
			$viewTotal = 130099;//初始值
		}
		$expire = strtotime('2018-12-01 00:00:00') - time();
		cache('contestantViewTotal', ++$viewTotal, $expire);
		
		//记录巅峰对决活动页PV
		$this->addLog(0);
		
		$result = [
				'contestantList'=>$contestantList,
				'viewTotal'=>$viewTotal
		];
		
		return $this->sucSysJson($result);
	}
	
	/**
	 * 执行投票操作
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function vote()
	{
		$contestantId = $this->request->param('contestantId');
		if (empty($contestantId)) {
			return $this->errSysJson('参赛者不存在');
		}
		
		$model = new MContestantVote();
		$contestantVoteList = $model->where('contestant_id', $contestantId)
					->where('user_id', $this->getUserId())
					->where('create_time', '>=', date('Y-m-d'))
					->order('id asc')
					->select();
		$contestantVoteCount = count($contestantVoteList);
		if ($contestantVoteCount < 3) {
			if ($contestantVoteCount > 0) {
				$lastVoteTime = $contestantVoteList[$contestantVoteCount -1]['create_time'];
				$timeLimit = 3600 - time() + strtotime($lastVoteTime);
				if ($timeLimit > 0) {
					$minLimit = ceil($timeLimit / 60);
					return $this->errSysJson("{$minLimit}分钟后可再来投票哦");
				}
			}
			//执行投票
			$model->startTrans();
			try {
				$data = [
						'contestant_id'=>$contestantId,
						'user_id'=>$this->getUserId()
				];
				$model->insert($data);
				$model->db()->table('talk_contestant')->where('id', $contestantId)->setInc('vote');
				$model->commit();
				return $this->sucSysJson('投票成功');
			} catch (\Exception $e) {
				return $this->errSysJson($e->getMessage());
// 				return $this->errSysJson('投票失败');
				$model->rollback();
			}
			
		}else {
			return $this->errSysJson('投票次数已达当日上限，明天再来吧');
		}
	}
	
	/**
	 * 记录日志
	 * @param unknown $type
	 * @return \think\response\Json
	 */
	public function addLog($type)
	{
		$model = new MContestantLog();
		$data = [
				'type'=>$type,
				'user_id'=>$this->getUserId()
		];
		$model->insert($data);
		return $this->sucSysJson('sucess');
	}
	
	/**
	 * 我要PK直播间地址
	 * @return \think\response\Json
	 */
	public function getPkUrl()
	{
		$url = "http://m.99live.me/livePage3.html";
		return $this->sucSysJson($url);
	}
	
	/**
	 * 导出统计数据，按日统计
	 * date-统计的开始时间，默认为前一天，若为之前的日期，则统计到前一天为止
	 * @return string
	 */
	public function exportExcel()
	{
		include_once ROOT_PATH . 'vendor/phpoffice/phpexcel/Classes/PHPExcel.php';
		$request = $this->request;
		$defaultDate = date('Y-m-d', strtotime('-1 days'));
		$date = $request->param('date', $defaultDate);
		if (!$this->valid_date($date)) {
			return "date参数不为日期";
		}
		
		$titleList = [
				'日期',
				'巅峰对决活动页PV',
				'巅峰对决活动页UV',
				'老师所得票数',
				'点击“我要pk”按钮转化率(%)',
				'点击“投票”按钮转化率(%)',
				'点击“我要pk”按钮人数',
				'点击视频播放区域人数',
				'点击“投票”按钮人数',
				'点击“投票”按钮次数'
		];
		$objPHPExcel = new \PHPExcel();
		$currentSheet = $objPHPExcel->getActiveSheet();
		$excelName = '巅峰对决运营数据' . date('YmdHis');
		$rowIndex = 1;
		//打印标题
		foreach ($titleList as $columnIndex=>$title) {
			$currentSheet->setCellValueByColumnAndRow($columnIndex, $rowIndex, $title);
		}
		$rowIndex++;
		
		$contestantLogModel = new MContestantLog();
		$contestantVoteModel = new MContestantVote();
		
		while ($date <= $defaultDate) {
			//巅峰对决活动页PV
			$pagePV = $contestantLogModel->where('type', 0)->where('create_time', 'like', "{$date}%")->count('id');
			//巅峰对决活动页UV
			$pageUV = $contestantLogModel->where('type', 0)->where('create_time', 'like', "{$date}%")->count('distinct user_id');
			//老师所得票数
			$voteList = $contestantVoteModel->alias('cv')
			->join('contestant c', 'c.id = cv.contestant_id')
			->field('c.name,count(1) as voteNum')
			->where('create_time', 'like', "{$date}%")
			->group('contestant_id')
			->select();
			$voteStr = '';
			foreach ($voteList as $vote) {
				$voteStr .= "{$vote['name']}({$vote['voteNum']})";
			}
			//点击“我要pk”按钮转化率
			$pkNum = $contestantLogModel->where('type', 1)->where('create_time', 'like', "{$date}%")->count('distinct user_id');
			$pkPercent = $pageUV > 0 ? sprintf("%.4f", $pkNum/$pageUV) * 100 : 0;
			//点击“投票”按钮转化率
			$voteNum = $contestantVoteModel->where('create_time', 'like', "{$date}%")->count('distinct user_id');
			$votePercent = $pageUV > 0 ? sprintf("%.4f", $voteNum/$pageUV) * 100 : 0;
			//点击“我要pk”按钮人数 $pkNum
			//点击视频播放区域人数
			$videoNum = $contestantLogModel->where('type', 2)->where('create_time', 'like', "{$date}%")->count('distinct user_id');
			//点击“投票”按钮人数 $voteNum
			//点击“投票”按钮次数
			$voteTotal = $contestantVoteModel->where('create_time', 'like', "{$date}%")->count('id');
			
			$currentSheet->setCellValueByColumnAndRow(0, $rowIndex, $date);
			$currentSheet->setCellValueByColumnAndRow(1, $rowIndex, $pagePV);
			$currentSheet->setCellValueByColumnAndRow(2, $rowIndex, $pageUV);
			$currentSheet->setCellValueByColumnAndRow(3, $rowIndex, $voteStr);
			$currentSheet->setCellValueByColumnAndRow(4, $rowIndex, $pkPercent);
			$currentSheet->setCellValueByColumnAndRow(5, $rowIndex, $votePercent);
			$currentSheet->setCellValueByColumnAndRow(6, $rowIndex, $pkNum);
			$currentSheet->setCellValueByColumnAndRow(7, $rowIndex, $videoNum);
			$currentSheet->setCellValueByColumnAndRow(8, $rowIndex, $voteNum);
			$currentSheet->setCellValueByColumnAndRow(9, $rowIndex, $voteTotal);
			$rowIndex++;
			
			$date = date('Y-m-d', strtotime("$date +1days"));
		}
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $excelName . '.xls"');
		header('Cache-Control: max-age=0');
		//创建excel
		$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		//导出
		$objWriter->save('php://output');
	}
	
	/**
	 * 检查是否为日期
	 * @param unknown $date
	 * @return boolean
	 */
	protected function valid_date($date)
	{
		//匹配日期格式
		if (preg_match ("/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/", $date, $parts))
		{
			//检测是否为日期,checkdate为月日年
			if(checkdate($parts[2],$parts[3],$parts[1])){
				return true;
			}else {
				return false;
			}
		}else {
			return false;
		}
	}
	
	/**
	 * 增加随机虚拟投票数
	 * @return string
	 */
	public function addVote()
	{
		$model = new MContestant();
		
		$contestantIds = $model->column('id');
		$currentDate = date('Y-m-d');
		if ($currentDate < '2018-09-26'){
			foreach ($contestantIds as $contestantId) {
				$model->where('id', $contestantId)->setInc('vote', mt_rand(10, 30));
			}
		}else{
			foreach ($contestantIds as $contestantId) {
				$model->where('id', $contestantId)->setInc('vote', mt_rand(20, 50));
			}
		}
		
		return 'success';
	}
	
	
}