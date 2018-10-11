<?php
namespace app\web\controller;

use app\web\model\Video as MVideo;

class Video extends App
{
	/**
	 * 根据videoId获取视频明细
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function getVideoById()
	{
		$request = $this->request;
		$videoId = $request->param('videoId/i');
		
		$model = new MVideo();
		$result = $model->getVideoById($videoId);
		
		if (empty($result)) {
			return $this->errSysJson('视频记录不存在');
		}else {
			return $this->sucSysJson($result);
		}
	}
	
	/**
	 * 根据条件获取视频记录
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function getVideoList()
	{
		//支持的可选条件
		$conditionList = ['uid', 'status', 'open_status'];
		$request = $this->request;
		//查询的字段，默认全部
		$field = $request->param('field', null);
		$pageNo = $request->param('pageNo/i', 1);
		$perPage = $request->param('perPage/i', 20);
		$orderBy = $request->param('orderBy', 'id asc');
		
		$model = new MVideo();
		
		//拼接可选条件
		$condition = ['status'=>1, 'open_status'=>1];
		foreach ($conditionList as $param){
			if ($request->has($param)) {
				$condition[$param] = trim($request->param($param));
			}
		}
		
		$result = $model->getVideoListByCondition($field, $condition, $pageNo, $perPage, $orderBy);
		
		return $this->sucSysJson($result);
	}
	
	
}