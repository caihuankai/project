<?php
namespace app\admin\controller;

use app\admin\model\LiveStatistics as MLiveStatistics;
use app\admin\model\User as MUser;
use think\db\Query;


class SumLive extends App
{
	use \app\admin\traits\Common,
	\app\admin\traits\AdminTable;
	
	public function index()
	{
		$this->setTableHeader([
				['field' =>'ID', 'title' => 'ID',],
				['field' =>'teacherName', 'title' => '创建人',],
				['field' =>'historyNum', 'title' => '历史人数',],
				['field' =>'totalOnlineMin', 'title' => '总停留时长（分）',],
				['field' =>'totalMessageNum', 'title' => '总发言次数',],
				['field' =>'averageOnlineMin', 'title' => '人均在线时长（分）',],
				['field' =>'averageMessageNum', 'title' => '人均发言次数',],
		])->setToolbarId('table-button-html')->setTableSearchId('table-search-html');
		
		$model = new MLiveStatistics();
		
		return $this->traitAdminTableList(function () use ($model){
			$field = 'l.id,sum(ls.total) as totalOnlineMin,count(distinct ls.user_id) as historyNum';
			
			$modelFunc = function () use ($model) {
				$teacherName = $this->request->param('teacherName', '');
				if (!empty($teacherName)) {
					$userModel = new MUser();
					$liveIds = $userModel->alias('u')->where('u.alias', 'like', "%{$teacherName}%")
					->join('live l', 'u.user_id = l.user_id')->column('l.id');
					$liveIdList = [1000000000];
					foreach ($liveIds as $liveId) {
						$liveIdList[] = $liveId + 1000000000;
					}
					$model->where('ls.live_id', 'in', $liveIdList);
				}
				$dateMin = $this->request->param('dateMin', '');
				$dateMin = !empty($dateMin) ? $dateMin : date('Y-m-d');
				if (!empty($dateMin)) {
					$dateWhere = ['ls.statistics_time'=>['>=', date('Ymd', strtotime($dateMin))]];
					$dateMax = $this->request->param('dateMax', '');
					$dateMax = !empty($dateMax) ? $dateMax : date('Y-m-d');
					if (!empty($dateMax)) {
						$dateWhere['ls.statistics_time '] = ['<=', date('Ymd', strtotime($dateMax))];
					}
					$model->where($dateWhere);
				}
				
				$model->alias('ls')->where('ls.statistics_type', 0)
				->join('live l', 'ls.live_id - 1000000000 = l.id')
				->group('ls.live_id');
				
				return $model;
			};
			
			$data = $this->traitAdminTableQuery([
// 					[['dateMin', ''], 'dateMin-date-abbreviation', 'ls.statistics_time'],
// 					[['dateMax', ''], 'dateMax-date-abbreviation', 'ls.statistics_time '],
			], $modelFunc, $field, 'totalOnlineMin desc,id asc', false);
			
			//额外计算总记录数
			$tableTmp = $modelFunc()->where($this->tableWhere)->field('ls.id')->buildSql();
			$countArr = $model->db()->query("select count(1) as total from {$tableTmp} tmp");
			$data['total'] = $countArr[0]['total'];
			
			$result = $liveIds =  $liveIdList = [];
			
			if (!empty($data['rows'])) {
				foreach ($data['rows'] as $datum) {
					$liveIds[] = $datum['id'];
					$liveIdList[] = $datum['id'] + 1000000000;
				}
				
				//额外查询直播间创建人
				$userModel = new MUser();
				$teacherNameList = $userModel->alias('u')->where('l.id', 'in', $liveIds)
				->join('live l', 'u.user_id = l.user_id')->column('u.alias', 'id');
				
				//额外统计发言次数
				$dateMin = $this->request->param('dateMin', '');
				$dateMin = !empty($dateMin) ? $dateMin : date('Y-m-d');
				$params = [];
				if (!empty($dateMin)) {
					$params['dateMin'] = $dateMin;
					$dateWhere = ['ls.statistics_time'=>['>=', date('Ymd', strtotime($dateMin))]];
					$dateMax = $this->request->param('dateMax', '');
					$dateMax = !empty($dateMax) ? $dateMax : date('Y-m-d');
					if (!empty($dateMax)) {
						$params['dateMax'] = $dateMax;
						$dateWhere['ls.statistics_time '] = ['<=', date('Ymd', strtotime($dateMax))];
					}
					$model->where($dateWhere);
				}
				$field = 'sum(ls.total) as totalMessageNum';
				$totalMessageNumList = $model->alias('ls')->where('ls.statistics_type', 2)->where('ls.live_id', 'in', $liveIdList)
				->group('live_id')
				->column($field, 'live_id');
				
				foreach ($data['rows'] as $datum) {
					$totalMessageNum = isset($totalMessageNumList[$datum['id'] + 1000000000]) ? $totalMessageNumList[$datum['id'] + 1000000000] : 0;
					$teacherName = isset($teacherNameList[$datum['id']]) ? $teacherNameList[$datum['id']] : '';
					$result[] = [
							'ID'=>$datum['id'],
							'teacherName'=>$teacherName,
							'historyNum'=>\app\admin\model\UrlHtml::goSumHistory($datum['id'] + 1000000000, 1, $datum['historyNum'], '历史人数', $params),
							'totalOnlineMin'=>$datum['totalOnlineMin'],
							'totalMessageNum'=>$totalMessageNum,
							'averageOnlineMin'=>round($datum['totalOnlineMin']/$datum['historyNum'], 2),
							'averageMessageNum'=>round($totalMessageNum/$datum['historyNum'], 2),
					];
				}
			}
			
			return $this->sucJson([
					'rows' => $result,
					'total' => $data['total'],
			]);
		});
	}
	
	public function exportExcel()
	{
		include_once ROOT_PATH . 'vendor/phpoffice/phpexcel/Classes/PHPExcel.php';
		$request = $this->request;
		$teacherName= $request->param('teacherName', '');
		$dateMin = $request->param('dateMin');
		$dateMax = $request->param('dateMax');
		
		$model = new MLiveStatistics();
		//搜索条件拼接
		$queryString = '';
		$where = [];
		if (!empty($teacherName)) {
			$userModel = new MUser();
			$liveIds = $userModel->alias('u')->where('u.alias', 'like', "%{$teacherName}%")
			->join('live l', 'u.user_id = l.user_id')->column('l.id');
			$liveIdList = [1000000000];
			foreach ($liveIds as $liveId) {
				$liveIdList[] = $liveId + 1000000000;
			}
			$where['ls.live_id'] = ['in', $liveIdList];
			$queryString .= "创建人:{$teacherName}  ";
		}
		if (!empty($dateMin)) {
			$where['ls.statistics_time'] = ['>=', date('Ymd', strtotime($dateMin))];
			$queryString .= "开始时间:{$dateMin}  ";
			if (!empty($dateMax)) {
				$where['ls.statistics_time '] = ['<=', date('Ymd', strtotime($dateMax))];
				$queryString .= "结束时间:{$dateMax}  ";
			}
		}
		
		$titleList = [
				'ID','创建人','历史人数','总停留时长（分）','总发言次数','人均在线时长（分）','人均发言次数'
		];
		$objPHPExcel = new \PHPExcel();
		$currentSheet = $objPHPExcel->getActiveSheet();
		$excelName = 'Live直播间运营数据' . date('YmdHis');
		$rowIndex = 1;
		$page = 1;
		
		$field = 'l.id,sum(ls.total) as totalOnlineMin,count(distinct ls.user_id) as historyNum';
		
		while (true) {
			$datas = $model->alias('ls')->field($field)->where($where)->where('ls.statistics_type', 0)
			->join('live l', 'ls.live_id - 1000000000 = l.id')
			->group('ls.live_id')
			->order('totalOnlineMin desc,id asc')
			->page($page, 100)
			->select();
			
			if ($rowIndex == 1) {
				//打印搜索条件
				$currentSheet->setCellValueByColumnAndRow(0, $rowIndex, $queryString);
				$rowIndex += 2;
				//打印标题
				foreach ($titleList as $columnIndex=>$title) {
					$currentSheet->setCellValueByColumnAndRow($columnIndex, $rowIndex, $title);
				}
				$rowIndex++;
			}
			
			$liveIds =  $liveIdArray = [];
			foreach ($datas as $datum) {
				$liveIds[] = $datum['id'];
				$liveIdArray[] = $datum['id'] + 1000000000;
			}
			
			//额外查询直播间创建人
			$userModel = new MUser();
			$teacherNameList = $userModel->alias('u')->where('l.id', 'in', $liveIds)
			->join('live l', 'u.user_id = l.user_id')->column('u.alias', 'id');
			
			//额外统计发言次数
			if (!empty($dateMin)) {
				$dateWhere = ['ls.statistics_time'=>['>=', date('Ymd', strtotime($dateMin))]];
				if (!empty($dateMax)) {
					$dateWhere['ls.statistics_time '] = ['<=', date('Ymd', strtotime($dateMax))];
				}
				$model->where($dateWhere);
			}
			$fieldTmp = 'sum(ls.total) as totalMessageNum';
			$totalMessageNumList = $model->alias('ls')->where('ls.statistics_type', 2)->where('ls.live_id', 'in', $liveIdArray)
			->join('live l', 'ls.live_id - 1000000000 = l.id')
			->join('user u', 'ls.user_id = u.user_id')
			->group('live_id')
			->column($fieldTmp, 'live_id');
			
			foreach ($datas as $datum) {
				$totalMessageNum = isset($totalMessageNumList[$datum['id'] + 1000000000]) ? $totalMessageNumList[$datum['id'] + 1000000000] : 0;
				$teacherName = isset($teacherNameList[$datum['id']]) ? replaceSpecialChar($teacherNameList[$datum['id']]) : '';
				$currentSheet->setCellValueByColumnAndRow(0, $rowIndex, $datum['id']);
				$currentSheet->setCellValueByColumnAndRow(1, $rowIndex, $teacherName);
				$currentSheet->setCellValueByColumnAndRow(2, $rowIndex, $datum['historyNum']);
				$currentSheet->setCellValueByColumnAndRow(3, $rowIndex, $datum['totalOnlineMin']);
				$currentSheet->setCellValueByColumnAndRow(4, $rowIndex, $totalMessageNum);
				$currentSheet->setCellValueByColumnAndRow(5, $rowIndex, round($datum['totalOnlineMin']/$datum['historyNum'], 2));
				$currentSheet->setCellValueByColumnAndRow(6, $rowIndex, round($totalMessageNum/$datum['historyNum'], 2));
				$rowIndex++;
			}
			
			if (count($datas) < 100) {
				break;
			}
			
			$page++;
		}
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $excelName . '.xls"');
		header('Cache-Control: max-age=0');
		//创建excel
		$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		//导出
		$objWriter->save('php://output');
	}
	
	
	
	
}