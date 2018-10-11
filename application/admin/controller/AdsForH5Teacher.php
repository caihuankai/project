<?php
namespace app\admin\controller;

use app\admin\model\Ads as MAds;

class AdsForH5Teacher extends App
{
	use \app\admin\traits\Common,
	\app\admin\traits\AdminTable,
	\app\admin\traits\Status,
	\app\admin\traits\userNav;
	
	/**
	 * 大策略公众号H5-讲师推荐
	 */
	public function index()
	{
		$this->setTableHeader([
				['checkbox' => true, 'value' => 1,],
				['field' =>'num', 'title' => '序号',],
				['field' =>'ID', 'title' => 'ID',],
				['field' =>'adName', 'title' => '标题',],
				['field' =>'picture', 'title' => '图片',],
				['field' =>'relevanceType', 'title' => '跳转类型',],
				['field' =>'linkUrl', 'title' => '跳转地址',],
				['field' =>'updateTime', 'title' => '编辑时间',],
				['field' =>'adStatus', 'title' => '状态',],
				['field' =>'action', 'title' => '操作',],
				['field' =>'operatorName', 'title' => '操作人',],
		])->setToolbarId('table-button-html')->setStatusValue(1, -1);
		
		$model = new MAds();
		
		return $this->traitAdminTableList(function () use ($model){
			$field = 'adId,adFile,adName,adURL,relevanceType,relevanceId,updateTime,adStatus,operatorName';
			
			$data = $this->traitAdminTableQuery([], function () use ($model){
				$model->where('type', 3)->where('positionType', 27)->where('dataFlag', 1);
				return $model;
			}, $field);
			
			$result = [];
				
			if (!empty($data['rows'])) {
				$qiniuModel = new \app\admin\model\QiniuGallerys();
				
				$i = 1;
				foreach ($data['rows'] as $datum) {
					$actionList = [
							'编辑'=>[
									'class'=>'action-edit',
									'data-id'=>$datum['adId'],
							],
							$this->statusActionHtml($datum['adStatus'])=>[
									'class' => 'open-status',
									'data-id' => $datum['adId'],
									'data-status' => $this->getStatusHtmlDataAttr($datum['adStatus']),
							],
							'移除'=>[
									'class'=>'action-delete',
									'data-id'=>$datum['adId'],
							],
					];
					$action = self::showOperate($actionList);
					
					$result[] = [
							'num'=>$i,
							'ID'=>$datum['adId'],
							'adName'=>$datum['adName'],
							'picture'=>$this->getTableColumnImgHtml($datum['adFile']),
							'relevanceType'=>$model->getTypeOrStatus('relevanceType', $datum['relevanceType']),
							'linkUrl'=>$datum['adURL'],
							'updateTime'=>$datum['updateTime'],
							'adStatus'=>$this->statusColumnHtml($datum['adStatus']),
							'action'=>$action,
							'operatorName'=>$datum['operatorName']
					];
					
					$i++;
				}
			}
			
			return $this->sucJson([
					'rows' => $result,
					'total' => $data['total'],
			]);
		}, function () use ($model) {
			$this->assign('columnStatusHtml', $this->statusColumnHtml(null));
			$this->assign('actionStatusHtml', $this->statusActionHtml(null));
		});
	}
	
	/**
	 * 
	 * @param unknown $relevanceType 14:讲师介绍页；15:月度课介绍页；16:季度课介绍页；17:私人订制课页面
	 * @param unknown $relevanceId
	 * @return string
	 */
	protected function getLinkUrl($relevanceType, $relevanceId)
	{
		$linkUrl = '';
		if ($relevanceType == 14) {
			$linkUrl .= config('WX_DOMAIN') . '/#/dacelueMini/teacherDetail/' . $relevanceId;
		}elseif ($relevanceType == 15 || $relevanceType == 16) {
			$linkUrl .= config('WX_DOMAIN') . '/#/dacelueMini/courseDetail/' . $relevanceId;
		}elseif ($relevanceType == 17) {
			$linkUrl .= config('WX_DOMAIN') . '/#/dacelueMini/customMade';
		}
		
		return $linkUrl;
	}
	
	/**
	 * 逻辑删除
	 * @param unknown $ids
	 * @return \think\response\Json
	 */
	public function deleteAds($ids)
	{
		$this->validateByName('common.ids');
		
		$model = new MAds();
		$successCount = $model->where('adId', 'in', $ids)->update(['dataFlag'=>2,'updateTime'=>date('Y-m-d H:i:s')]);
		if ($successCount > 0) {
			return $this->sucSysJson("移除成功");
		}else {
			return $this->errSysJson("移除失败");
		}
	}
	
	/**
	 * 修改状态
	 * @param unknown $ids
	 * @param unknown $status
	 * @return \think\response\Json
	 */
	public function changeStatus($ids, $status)
	{
		$model = new MAds();
		
		$result = $model->where('adId', 'in', $ids)->update(['adStatus'=>$status,'updateTime'=>date('Y-m-d H:i:s')]);
		if ($result > 0) {
			return $this->sucSysJson("修改成功");
		}else {
			return $this->errSysJson("修改失败");
		}
	}
	
	/**
	 * 新增
	 * @return \think\response\Json|mixed|string
	 */
	public function add()
	{
		$model = new MAds();
		$request = $this->request;
		if ($request->isPost()) {
			$adName = $request->param('adName');
			$relevanceType = $request->param('relevanceType');
			$relevanceId = $request->param('relevanceId');
			$adStatus = $request->param('adStatus');
			$coverImg = $request->param('cover_img');
			
			$data = [
					'type'=>3,
					'positionType'=>27,
					'adFile'=>$coverImg,
					'adURL'=>$this->getLinkUrl($relevanceType, $relevanceId),
					'adName'=>$adName,
					'relevanceType'=>$relevanceType,
					'relevanceId'=>$relevanceId,
					'adStatus'=>$adStatus,
					'createTime'=>date('Y-m-d H:i:s'),
					'operatorId'=>$this->getAdminId(),
					'operatorName'=>$this->getAdminName(),
			];
			$successCount = $model->insert($data);
			if ($successCount > 0) {
				return $this->sucSysJson("新增成功");
			}else {
				return $this->errSysJson("新增失败，请稍后重试");
			}
		}
		
		return $this->fetch();
	}
	
	/**
	 * 修改
	 * @param unknown $id
	 * @return \think\response\Json|mixed|string
	 */
	public function edit($id)
	{
		$model = new MAds();
		$request = $this->request;
		if ($request->isPost()) {
			$adName = $request->param('adName');
			$relevanceType = $request->param('relevanceType');
			$relevanceId = $request->param('relevanceId');
			$adStatus = $request->param('adStatus');
			$coverImg = $request->param('cover_img');
			
			$data = [
					'adFile'=>$coverImg,
					'adURL'=>$this->getLinkUrl($relevanceType, $relevanceId),
					'adName'=>$adName,
					'relevanceType'=>$relevanceType,
					'relevanceId'=>$relevanceId,
					'adStatus'=>$adStatus,
					'updateTime'=>date('Y-m-d H:i:s'),
					'operatorId'=>$this->getAdminId(),
					'operatorName'=>$this->getAdminName(),
			];
			$successCount = $model->where('adId', $id)->update($data);
			if ($successCount > 0) {
				return $this->sucSysJson("修改成功");
			}else {
				return $this->errSysJson("修改失败，请稍后重试");
			}
		}else {
			$field = 'adFile,adName,relevanceType,relevanceId,adStatus';
			$data = $model->where('adId', $id)->field($field)->find();
			$this->assign('data', $data);
		}
		return $this->fetch();
	}
	
	/**
	 * 设置大策略H5私人定制页图片
	 * @return \think\response\Json|mixed|string
	 */
	public function setCustomPage()
	{
		$model = new MAds();
		$request = $this->request;
		$data = $model->where('type', 3)->where('positionType', 28)->field('adId,adFile')->find();
		if ($request->isPost()) {
			$img = $request->param('cover_img');
			if (empty($data)) {
				$successCount = $model->insert(['type'=>3, 'positionType'=>28, 'adFile'=>$img]);
			}else {
				$successCount = $model->where('adId', $data['adId'])->update(['adFile'=>$img]);
			}
			if ($successCount > 0) {
				return $this->sucSysJson("设置成功");
			}else {
				return $this->errSysJson("设置失败，请稍后重试");
			}
		}
		$this->assign('data', $data);
		return $this->fetch();
	}
	
	
}
