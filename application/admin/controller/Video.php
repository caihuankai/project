<?php
namespace app\admin\controller;

use app\admin\model\Video as MVideo;

class Video extends App
{
	use \app\admin\traits\Common,
		\app\admin\traits\AdminTable,
		\app\admin\traits\Status,
		\app\admin\traits\userNav;
	
		
	/**
	 * 视频列表
	 * @return mixed|\think\Response|\think\response\Json|\think\response\View|\think\response\Xml|\think\response\Redirect|\think\response\Jsonp|string
	 * @author liujuneng
	 */
	public function index()
	{
		$this->setTableHeader([
				['checkbox' => true, 'value' => 1,],
				['field' =>'num', 'title' => '序号',],
				['field' =>'id', 'title' => 'ID',],
				['field' =>'title', 'title' => '视频标题',],
				['field' => 'userName', 'title' => '所属老师',],
				['field' => 'status', 'title' => '状态',],
				['field' => 'createTime', 'title' => '上传时间',],
				['field' => 'action', 'title' => '操作', 'class' => 'action-action'],
		])->setToolbarId('table-button-html')->setTableSearchId('table-search-html');
		
		$model = new MVideo();
		
		return $this->traitAdminTableList(function () use ($model){
			$field = 'v.id, v.title, u.alias, v.open_status, v.create_time';
			
			$data = $this->traitAdminTableQuery([
					[['title', ''], 'likeAll', 'v.title'],
					[['userName', ''], 'likeAll', 'u.alias'],
					[['dateMin', ''], 'dateMin-date', 'v.create_time'],
					[['dateMax', ''], 'dateMax-date', 'v.create_time '],
					[['status/i', -1], 'zero', 'v.open_status'],
			], function () use ($model) {
				$model->alias('v')
				->join('user u', 'u.user_id = v.uid', 'left')
				->where('v.status', 1);
				return $model;
			}, $field, 'id desc');
			
			$result = [];
			if (!empty($data['rows'])) {
				$i = 1;
				foreach ($data['rows'] as $datum) {
					$actionList = [
							$this->statusActionHtml($datum['open_status'])=>[
									'class' => 'open-status',
									'data-id' => $datum['id'],
									'data-status' => $this->getStatusHtmlDataAttr($datum['open_status']),
							],
							'编辑'=>[
									'class'=>'action-edit',
									'data-id'=>$datum['id'],
							],
							'删除'=>[
									'class'=>'action-delete',
									'data-id'=>$datum['id'],
							],
					];
					$action = self::showOperate($actionList);
					
					$result[] = [
							'num'=>$i,
							'id'=>$datum['id'],
							'title'=>$datum['title'],
							'userName'=>$datum['alias'],
							'status'=>$this->statusColumnHtml($datum['open_status']),
							'createTime'=>$datum['create_time'],
							'action' => $action
					];
					$i++;
				}
			}
			
			return $this->sucJson([
					'rows'=>$result,
					'total'=>$data['total'],
			]);
		}, function () use ($model){
			$this->assign('columnStatusHtml', $this->statusColumnHtml(null));
			$this->assign('actionStatusHtml', $this->statusActionHtml(null));
			$this->assign('searchStatusArr', [-1=>'状态'] + $this->searchStatusArr());
		});
	}
	
	/**
	 * 修改状态open_status
	 * @param unknown $ids
	 * @param unknown $status
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function changeStatus($ids, $status)
	{
		$this->validateByName();
		
		$model = new MVideo();
		$result = $model->where('id', 'in', $ids)->update(['open_status'=>$status]);
		if ($result > 0) {
			return $this->sucSysJson("修改成功");
		}else {
			return $this->errSysJson("修改失败");
		}
	}
	
	/**
	 * 删除记录，仅做逻辑删除
	 * @param unknown $ids
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function deleteVideo($ids)
	{
		$this->validateByName('common.ids');
		
		$model = new MVideo();
		
		$successCount = $model->where('id', 'in', $ids)->update(['status'=>2]);
		if ($successCount > 0) {
			return $this->sucSysJson("移除成功");
		}else {
			return $this->errSysJson("移除失败");
		}
	}
	
	/**
	 * 添加视频记录
	 * @return \think\response\Json|mixed|string
	 * @author liujuneng
	 */
	public function add()
	{
		$request = $this->request;
		if ($request->isPost()) {
			$title = $request->param('title');
			$coverPC = $request->param('coverPC');
			$userId = $request->param('userId');
			$video = $request->param('video');
			$status = $request->param('status');
			
			if (empty($coverPC)) {
				return $this->errSysJson("请选择封面图片");
			}elseif (empty($video)) {
				return $this->errSysJson("请选择视频");
			}
			
			$model = new \app\admin\model\User();
			$userInfo = $model->getUserColumn([$userId]);
			if (empty($userInfo)) {
				return $this->errSysJson("老师ID不存在");
			}
			
			$model = new MVideo();
			$data = [
					'uid'=>$userId,
					'title'=>$title,
					'cover_pc_url'=>$coverPC,
					'video_url'=>$video,
					'status'=>$status
			];
			$result = $model->insert($data);
			if ($result == 1) {
				return $this->sucSysJson("新增成功");
			}else {
				return $this->errSysJson("新增失败，请稍后重试");
			}
		}
		
		return $this->fetch();
	}
	
	public function edit($id)
	{
		$this->validateByName('common.id');
		$model = new MVideo();
		$request = $this->request;
		
		if ($request->isPost()) {
			$title = $request->param('title');
			$coverPC = $request->param('coverPC');
			$userId = $request->param('userId');
			$video = $request->param('video');
			$status = $request->param('status');
			
			if (empty($coverPC)) {
				return $this->errSysJson("请选择封面图片");
			}elseif (empty($video)) {
				return $this->errSysJson("请选择视频");
			}
			
			$model = new \app\admin\model\User();
			$userInfo = $model->getUserColumn([$userId]);
			if (empty($userInfo)) {
				return $this->errSysJson("老师ID不存在");
			}
			
			$model = new MVideo();
			$data = [
					'uid'=>$userId,
					'title'=>$title,
					'cover_pc_url'=>$coverPC,
					'video_url'=>$video,
					'status'=>$status
			];
			$result = $model->where('id', $id)->update($data);
			if ($result == 1) {
				return $this->sucSysJson("修改成功");
			}else {
				return $this->errSysJson("修改失败，请稍后重试");
			}
		}else {
			$videoInfo = $model->alias('v')->where('id', $id)->find();
			$this->assign('videoInfo', $videoInfo);
		}
		
		return $this->fetch();
	}
		
	public function uploadImg()
	{
		if (request()->isPost()){
			$usermodel = new \app\admin\model\User();
			$img = trim(request()->param('img',null));
			if (empty($img))  return $this->errSysJson('缺少必填参数！');
			$AdsC = new Ads();
			$imgs = $AdsC->uploadImg($img);
			$imgs = json_decode($imgs,true);
			$pathimg = "http://oqt46pvmm.bkt.clouddn.com/".$imgs['key'];
			return $this->sucSysJson($pathimg);
		}else{
			return $this->errSysJson('提交方式出错！');
		}
	}
		
		
}