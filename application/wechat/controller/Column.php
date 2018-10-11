<?php
namespace app\wechat\controller;

use app\wechat\model\Column as MColumn;
use app\wechat\model\PayOrder as MPayOrder;

class Column extends App
{
	/**
	 * 获取栏目信息
	 * @return \think\response\Json
	 * @
	 */
	public function getColumnList()
	{
		//支持的可选条件
		$conditionList = ['id','level'];
		$request = $this->request;
		$status = $request->param('status/i', 1);
		$recommendStatus = $request->param('recommendStatus/i', 1);
		$excludeColumnId = $request->param('excludeColumnId');
		$orderBy = $request->param('orderBy', 'sort asc, id asc');
		
		//拼接可选条件
		$condition = [
				'c.status'=>$status,
		];
		if ($recommendStatus > 0) {
			$condition['c.recommend_status'] = $recommendStatus;
		}
		if (!empty($excludeColumnId)) {
			$condition['c.id'] = ['not in', $excludeColumnId];
		}
		foreach ($conditionList as $param){
			if ($request->has($param)) {
				$condition['c.' . $param] = trim($request->param($param));
			}
		}
		
		$model = new MColumn();
		
		$dataList = $model->alias('c')
					->join('talk_qiniu_gallerys qg', 'c.qiniu_id = qg.id', 'left')
					->join('talk_live_focus lf', 'c.id = lf.live_id and lf.target = 2 and lf.user_id = ' . $this->getUserId(), 'left')
					->field('c.id,c.name,c.read_num,c.focus_num,c.virtual_read_num,c.virtual_focus_num,qg.qiniuImg,lf.id as focusId')
					->where($condition)
					->order($orderBy)
					->select();
		
		$result = [];
		
		foreach ($dataList as $data) {
			$result[] = [
					'columnId'=>$data['id'],
					'name'=>$data['name'],
					'readNum'=>$data['read_num'] + $data['virtual_read_num'],
					'focusNum'=>$data['focus_num'] + $data['virtual_focus_num'],
					'pic'=>$data['qiniuImg'],
					'isFocus'=>!is_null($data['focusId'])
			];
		}
		
		return $this->sucSysJson($result);
	}
	
	/**
	 * 根据栏目id获取栏目信息
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function getColumnById()
	{
		$request = $this->request;
		$columnId = $request->param('columnId/i');
		
		$model = new MColumn();
		
		$columnData = $model->alias('c')
					  ->join('talk_qiniu_gallerys qg','c.qiniu_id = qg.id','left')
					  ->join('talk_live_focus lf', 'c.id = lf.live_id and lf.target = 2 and lf.user_id = ' . $this->getUserId(), 'left')
					  ->field('c.*,qg.qiniuImg,lf.id as focusId')
					  ->where('c.id', $columnId)->find();
		$columnInfo = [];
		if (!empty($columnData)) {
			$payOrderModel = new MPayOrder();
			$isBuy = $payOrderModel->columnValidity($this->getUserId(),$columnId);
			$columnInfo = [
					'name'=>$columnData['name'],
					'lead'=>$columnData['lead'],
					'level'=>$columnData['level'],
					'pic'=>$columnData['qiniuImg'],
					'readNum'=>$columnData['read_num'] + $columnData['virtual_read_num'],
					'focusNum'=>$columnData['focus_num'] + $columnData['virtual_focus_num'],
					'isFocus'=>!is_null($columnData['focusId']),
					'isBuy'=>$isBuy,
					'cyclePriceInfo'=>json_decode($columnData['cycle_price_info'], true),
			];
		}

		//用户行为记录
		(new \app\wechat\model\BehaviorRecord)->record($user_id=$this->getUserId(),$type=7,$target_id=$columnId);

		return $this->sucSysJson($columnInfo);
	}
	
	/**
	 * 根据columnId对阅读数加1
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function setReadNumIncById()
	{
		$request = $this->request;
		$columnId = $request->param('columnId/i');
		
		$model = new MColumn();
		$result = $model->where('id', $columnId)->setInc('read_num');
		if ($result) {
			return $this->sucSysJson("'阅读'加1成功");
		}else {
			return $this->errSysJson("'阅读'加1失败");
		}
		
	}
	
	
	
	
}