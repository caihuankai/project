<?php
namespace app\web\controller;

use app\wechat\model\Column as MColumn;
use app\wechat\model\PayOrder as MPayOrder;

class Column extends App
{
	/**
	 * 获取栏目信息
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function getColumnList()
	{
		//支持的可选条件
		$conditionList = ['id','level'];
		$request = $this->request;
		$status = $request->param('status/i', 1);
		$recommendStatus = $request->param('recommendStatus/i', 1);
		$orderBy = $request->param('orderBy', 'sort asc');
		
		//拼接可选条件
		$condition = [
				'c.status'=>$status,
		];
		if ($recommendStatus > 0) {
			$condition['c.recommend_status'] = $recommendStatus;
		}
		foreach ($conditionList as $param){
			if ($request->has($param)) {
				$condition['c.' . $param] = trim($request->param($param));
			}
		}
		
		$model = new MColumn();
		
		$dataList = $model->alias('c')
					->join('talk_qiniu_gallerys qg', 'c.qiniu_id = qg.id', 'left')
					->field('c.id,c.name,c.read_num,c.focus_num,c.virtual_read_num,c.virtual_focus_num,qg.qiniuImg')
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
			];
		}
		
		return $this->sucSysJson($result);
	}
	
}