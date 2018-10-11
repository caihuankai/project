<?php
namespace app\admin\controller;

use app\admin\model\PayOrder as MPayOrder;

class RefundRecord extends App
{
	use \app\admin\traits\Common,
	\app\admin\traits\AdminTable;
	
	/**
	 * 线下退款记录表
	 * @return mixed|\think\Response|\think\response\Json|\think\response\View|\think\response\Xml|\think\response\Redirect|\think\response\Jsonp|string
	 * @author liujuneng
	 */
	public function index()
	{
		$this->setTableHeader([
				['field' =>'ID', 'title' => 'ID',],
				['field' =>'userID', 'title' => '用户ID',],
				['field' =>'userName', 'title' => '用户昵称',],
				['field' =>'courseId', 'title' => '课程ID',],
				['field' =>'courseName', 'title' => '课程名称',],
				['field' =>'courseType', 'title' => '课程类型',],
				['field' =>'refund', 'title' => '退款金额（元）',],
				['field' =>'refundTime', 'title' => '退款时间',],
				['field' =>'remark', 'title' => '备注',],
				['field' =>'operator', 'title' => '操作人',],
				['field' => 'action', 'title' => '操作',],
		])->setToolbarId('table-button-html')->setTableSearchId('table-search-html');
		
		$model = new MPayOrder();
		
		return $this->traitAdminTableList(function () use ($model){
			$field = 'p.id,p.user_id,p.total_fee,p.pay_time,p.remark,c.id as courseId,c.class_name,c.type,u.alias';
			
			$data = $this->traitAdminTableQuery([
					[['courseType/i', '-1'], 'zero', 'c.type'],
					[['userName', ''], 'likeAll', 'u.alias'],
					[['userID/i', 0], 'eq', 'p.user_id'],
					[['courseName', ''], 'likeAll', 'c.class_name'],
					[['dateMin', ''], 'dateMin-date', 'p.pay_time'],
					[['dateMax', ''], 'dateMax-date', 'p.pay_time '],
			], function () use ($model) {
				$model->alias('p')->where('p.state', 4)->where('p.type', 1)
				->join('course c', 'p.class_id = c.id')
				->join('user u', 'p.user_id = u.user_id');
				
				return $model;
			}, $field, 'p.pay_time desc');
			
			$result = [];
			
			if (!empty($data['rows'])) {
				foreach ($data['rows'] as $datum) {
					$remark = json_decode($datum['remark'], true);
					$actionList = [
							'备注'=>[
									'class'=>'action-remark',
									'data-id'=>$datum['id'],
							],
					];
					$action = self::showOperate($actionList);
					
					$result[] = [
							'ID'=>$datum['id'],
							'userID'=>$datum['user_id'],
							'userName'=>$datum['alias'],
							'courseId'=>$datum['courseId'],
							'courseName'=>$datum['class_name'],
							'courseType'=>$datum['type'] == 1 ? '单次课' : '系列课',
							'refund'=>$datum['total_fee'],
							'refundTime'=>$datum['pay_time'],
							'remark'=>!empty($remark['content']) ? $remark['content'] : '',
							'operator'=>!empty($remark['adminName']) ? $remark['adminName'] : '',
							'action'=>$action
					];
				}
			}
			
			return $this->sucJson([
					'rows' => $result,
					'total' => $data['total'],
			]);
		}, function () {
			$courseTypeArr = [
				'-1'=>'全部课程类型',
				'1'=>'单次课',
				'2'=>'系列课'
			];
			$this->assign('searchCourseTypeArr', $courseTypeArr);
		});
	}
	
	/**
	 * 修改备注
	 * @param unknown $id
	 * @return \think\response\Json|mixed|string
	 * @author liujuneng
	 */
	public function editRemark($id)
	{
		$model = new MPayOrder();
		$request = $this->request;
		
		if ($request->isPost()) {
			$adminID = $request->param('adminID/d');
			$adminName = $request->param('adminName');
			$content = $request->param('content');
			$remark = [
					'adminID'=>$adminID,
					'adminName'=>$adminName,
					'content'=>$content
			];
			$updateData = [
					'remark'=>json_encode($remark)
			];
			$successCount = $model->where('id', $id)->update($updateData);
			if ($successCount > 0) {
				return $this->sucSysJson("更新成功");
			}else {
				return $this->errSysJson("更新失败");
			}
		}else {
			$data = $model->where('id', $id)->field('remark')->find();
			$remark = json_decode($data['remark'], true);
			$this->assign('remark', $remark);
		}
		return $this->fetch();
	}
	
	/**
	 * 根据条件导出excel
	 */
	public function exportExcel()
	{
		include_once ROOT_PATH . 'vendor/phpoffice/phpexcel/Classes/PHPExcel.php';
		$request = $this->request;
		$courseType = $request->param('courseType/i', -1);
		$userName = $request->param('userName');
		$userID = $request->param('userID/i');
		$courseName = $request->param('courseName');
		$dateMin = $request->param('dateMin');
		$dateMax = $request->param('dateMax');
		
		$model = new MPayOrder();
		//搜索条件拼接
		$queryString = '';
		$where = [];
		if ($courseType > 0) {
			$where['c.type'] = $courseType;
			if ($courseType == 1) {
				$queryString .= '课程类型:单次课  ';
			}elseif ($courseType == 2) {
				$queryString .= '课程类型:系列课  ';
			}
		}
		if (!empty($userName)) {
			$where['u.alias'] = ['like', "%$userName%"];
			$queryString .= "用户昵称:{$userName}  ";
		}
		if (!empty($userID)) {
			$where['p.user_id'] = $userID;
			$queryString .= "用户ID:{$userID}  ";
		}
		if (!empty($courseName)) {
			$where['c.class_name'] = ['like', "%$courseName%"];
			$queryString .= "课程名称:{$courseName}  ";
		}
		if (!empty($dateMin)) {
			$where['p.pay_time'] = ['>=', $dateMin];
			$queryString .= "退款开始时间:{$dateMin}  ";
			if (!empty($dateMax)) {
				$where['p.pay_time '] = ['<=', $dateMax];
				$queryString .= "退款结束时间:{$dateMax}  ";
			}
		}
		
		$titleList = [
			'ID','用户ID','用户昵称','课程ID','课程名称','课程类型','退款金额（元）','退款时间','备注','操作人'	
		];
		$objPHPExcel = new \PHPExcel();
		$currentSheet = $objPHPExcel->getActiveSheet();
		$excelName = '退款记录（线下）' . date('YmdHis');
		$rowIndex = 1;
		$page = 1;
		
		$field = 'p.id,p.user_id,p.total_fee,p.pay_time,p.remark,c.id as courseId,c.class_name,c.type,u.alias';
		
		while (true) {
			$datas = $model->alias('p')->where($where)->where('p.state', 4)->where('p.type', 1)->field($field)
			->join('course c', 'p.class_id = c.id')
			->join('user u', 'p.user_id = u.user_id')
			->order('pay_time desc')
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
			
			foreach ($datas as $datum) {
				$remark = json_decode($datum['remark'], true);
				$courseType = $datum['type'] == 1 ? '单次课' : '系列课';
				$remarkContent= !empty($remark['content']) ? $remark['content'] : '';
				$operator = !empty($remark['adminName']) ? $remark['adminName'] : '';
				$currentSheet->setCellValueByColumnAndRow(0, $rowIndex, $datum['id']);
				$currentSheet->setCellValueByColumnAndRow(1, $rowIndex, $datum['user_id']);
				$currentSheet->setCellValueByColumnAndRow(2, $rowIndex, $datum['alias']);
				$currentSheet->setCellValueByColumnAndRow(3, $rowIndex, $datum['courseId']);
				$currentSheet->setCellValueByColumnAndRow(4, $rowIndex, $datum['class_name']);
				$currentSheet->setCellValueByColumnAndRow(5, $rowIndex, $courseType);
				$currentSheet->setCellValueByColumnAndRow(6, $rowIndex, $datum['total_fee']);
				$currentSheet->setCellValueByColumnAndRow(7, $rowIndex, $datum['pay_time']);
				$currentSheet->setCellValueByColumnAndRow(8, $rowIndex, $remarkContent);
				$currentSheet->setCellValueByColumnAndRow(9, $rowIndex, $operator);
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