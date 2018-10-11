<?php
namespace app\admin\controller;

use app\admin\model\Navigation as MNavigation;

class Navigation extends App
{
	use \app\admin\traits\Common,
	\app\admin\traits\AdminTable,
	\app\admin\traits\Status,
	\app\admin\traits\userNav;
	
	/**
	 * 导航栏信息列表
	 * @return mixed|\think\Response|\think\response\Json|\think\response\View|\think\response\Xml|\think\response\Redirect|\think\response\Jsonp|string
	 * @author liujuneng
	 */
	public function index()
	{
		$this->setTableHeader([
				['checkbox' => true, 'value' => 1,],
				['field' =>'num', 'title' => '序号',],
				['field' =>'ID', 'title' => 'ID',],
				['field' =>'navigationLocation', 'title' => '导航栏位置',],
				['field' =>'navigationType', 'title' => '导航栏类型',],
				['field' =>'createTime', 'title' => '添加时间',],
				['field' =>'status', 'title' => '状态',],
				['field' => 'action', 'title' => '操作',],
		])->setToolbarId('table-button-html')->setTableSearchId('table-search-html');
		
		$model = new MNavigation();
		
		return $this->traitAdminTableList(function () use ($model){
			$field = 'id,navigation_location,navigation_type,status,create_time';
			
			$data = $this->traitAdminTableQuery([
					[['navigationLocation', ''], 'likeAll', 'navigation_location'],
					[['navigationType/i', '-1'], 'zero', 'navigation_type'],
					[['dateMin', ''], 'dateMin-date', 'create_time'],
					[['dateMax', ''], 'dateMax-date', 'create_time '],
					[['status/i', '-1'], 'zero', 'status'],
			], $model, $field, 'id asc');
			
			$result = [];
			if (!empty($data['rows'])) {
				$i = 1;
				foreach ($data['rows'] as $datum) {
					$actionList = [
							'编辑'=>[
									'class'=>'action-edit',
									'data-id'=>$datum['id'],
							],
							$this->statusActionHtml($datum['status'])=>[
									'class' => 'open-status',
									'data-id' => $datum['id'],
									'data-status' => $this->getStatusHtmlDataAttr($datum['status']),
							],
							'导航列表'=>$this->urlTab('首页管理', '导航列表 ', '/Navigationlists/index',  ['navigationId' => $datum['id']]),
					];
					$action = self::showOperate($actionList);
					
					$result[] = [
							'num'=>$i,
							'ID'=>$datum['id'],
							'navigationLocation'=>$datum['navigation_location'],
							'navigationType'=>$model->getNavigationTypeText($datum['navigation_type']),
							'createTime'=>$datum['create_time'],
							'status'=>$this->statusColumnHtml($datum['status']),
							'action'=>$action
					];
					
					$i++;
				}
			}
			
			return $this->sucJson([
					'rows' => $result,
					'total' => $data['total'],
			]);
		}, function () use ($model){
			$this->assign('columnStatusHtml', $this->statusColumnHtml(null));
			$this->assign('actionStatusHtml', $this->statusActionHtml(null));
			$this->assign('searchStatusArr', [-1=>'状态'] + $this->searchStatusArr());
			$this->assign('searchNavigationTypeArr', [-1=>'导航栏类型'] + $model->getNavigationTypeText(null));
		});
	}
	
	/**
	 * 新增导航栏信息记录
	 * @return \think\response\Json|mixed|string
	 * @author liujuneng
	 */
	public function add()
	{
		$model = new MNavigation();
		$request = $this->request;
		if ($request->isPost()) {
			$navigationLocation = $request->param('navigationLocation');
			$navigationType = $request->param('navigationType/i', 0);
			$status = $request->param('status/i', 1);
			$insertData = [
					'navigation_location'=>$navigationLocation,
					'navigation_type'=>$navigationType,
					'status'=>$status
			];
			$result = $model->insert($insertData);
			if ($result == 1) {
				return $this->sucSysJson("新增成功");
			}else {
				return $this->errSysJson("新增失败，请稍后重试");
			}
		}
		
		return $this->fetch();
	}
	
	/**
	 * 修改导航栏信息记录
	 * @param unknown $id
	 * @return \think\response\Json|mixed|string
	 * @author liujuneng
	 */
	public function edit($id)
	{
		$model = new MNavigation();
		$request = $this->request;
		
		if ($request->isPost()) {
			$navigationLocation = $request->param('navigationLocation');
			$navigationType = $request->param('navigationType/i', 0);
			$status = $request->param('status/i', 1);
			$updateData = [
					'navigation_location'=>$navigationLocation,
					'navigation_type'=>$navigationType,
					'status'=>$status
			];
			$result = $model->where('id', $id)->update($updateData);
			if ($result == 1) {
				return $this->sucSysJson("修改成功");
			}else {
				return $this->errSysJson("修改失败，请稍后重试");
			}
		}else {
			$data = $model->where('id', $id)->find();
			$this->assign('data', $data);
		}
		return $this->fetch();
	}
	
	/**
	 * 修改导航栏信息的状态（启用/停用）
	 * @param unknown $ids
	 * @param unknown $status
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function changeStatus($ids, $status)
	{
		$model = new MNavigation();
		
		$result = $model->where('id', 'in', $ids)->update(['status'=>$status]);
		if ($result > 0) {
			return $this->sucSysJson("修改成功");
		}else {
			return $this->errSysJson("修改失败");
		}
	}
	
	
}