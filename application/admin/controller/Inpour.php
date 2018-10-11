<?php
namespace app\admin\controller;

use app\admin\model\Inpour as MInpour;

class Inpour extends App
{
	use \app\admin\traits\Common,
	\app\admin\traits\AdminTable,
	\app\admin\traits\Status;
	
	/**
	 * 查询充值金额管理信息
	 * @return mixed|\think\Response|\think\response\Json|\think\response\View|\think\response\Xml|\think\response\Redirect|\think\response\Jsonp|string
	 * @author liujuneng
	 */
	public function index()
	{
		$this->setTableHeader([
				['checkbox' => true, 'value' => 1,],
				['field' =>'num', 'title' => '序号',],
				['field' =>'ID', 'title' => 'ID',],
				['field' =>'image', 'title' => '缩略图',],
				['field' =>'cost', 'title' => '金额（元）',],
				['field' =>'denomination', 'title' => '价值（礼点）',],
				['field' =>'type', 'title' => '类型',],
				['field' =>'bonus', 'title' => '赠送（礼点）',],
				['field' =>'status', 'title' => '状态',],
				['field' =>'createTime', 'title' => '创建时间',],
				['field' =>'adminName', 'title' => '操作人',],
				['field' => 'action', 'title' => '操作',],
		])->setToolbarId('table-button-html')->setTableSearchId('table-search-html')->setNoPage();
		
		$model = new MInpour();
		
		return $this->traitAdminTableList(function () use ($model){
			$field = 'id, image, cost, denomination, type, bonus, status, create_time, admin_id';
			
			$data = $this->traitAdminTableQuery([
					[['cost/f', 0], 'eq', 'cost'],
					[['type/i', 0], 'eq', 'type'],
					[['status/i', 0], 'zero', 'status'],
					[['dateMin', ''], 'dateMin-date', 'create_time'],
					[['dateMax', ''], 'dateMax-date', 'create_time '],
			], $model, $field);
			
			$result = [];
			if (!empty($data['rows'])) {
				$adminIdList = $adminNameList = [];
				foreach ($data['rows'] as $datum) {
					$adminIdList[] = $datum['admin_id'];
				}
				$adminModel = new \app\admin\model\Admin();
				$adminNameList = $adminModel->getAdminName($adminIdList);
				
				$i = 1;
				foreach ($data['rows'] as $datum) {
					$actionList = [
							'编辑'=>[
									'class'=>'action-edit',
									'data-id'=>$datum['id'],
							],
							'删除'=>[
									'class'=>'action-delete',
									'data-id'=>$datum['id'],
							],
							$this->statusActionHtml($datum['status'])=>[
									'class' => 'open-status',
									'data-id' => $datum['id'],
									'data-status' => $this->getStatusHtmlDataAttr($datum['status']),
							]
					];
					$action = self::showOperate($actionList);
					
					$result[] = [
							'num'=>$i,
							'ID'=>$datum['id'],
							'image'=>$this->getTableColumnImgHtml($datum['image'], '点击查看大图'),
							'cost'=>$datum['cost'],
							'denomination'=>$datum['denomination'],
							'type'=>$model->getTypeText($datum['type']),
							'bonus'=>$datum['bonus'],
							'status'=>$this->statusColumnHtml($datum['status']),
							'createTime'=>$datum['create_time'],
							'adminName'=>$adminNameList[$datum['admin_id']],
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
			$this->assign('searchTypeArr', [0=>'全部类型'] + $model->getTypeText(null));
			$this->assign('searchStatusArr', [-1=>'状态'] + $this->searchStatusArr());
		});
		
	}
	
	/**
	 * 新增充值金额管理信息
	 * @return \think\response\Json|mixed|string
	 * @author liujuneng
	 */
	public function add()
	{
		$model = new MInpour();
		$request = $this->request;
		if ($request->isPost()) {
			if (!empty($this->request->file('file'))) {
				$result = $model->add();
				if ($result == 1) {
					return $this->sucSysJson("新增成功");
				}else {
					return $this->errSysJson("新增失败，请稍后重试");
				}
			}else {
				return $this->errSysJson("请选择图片");
			}
		}
		
		$this->assign('typeArr', $model->getTypeText(null));
		return $this->fetch();
	}
	
	/**
	 * 修改充值金额管理信息
	 * @param unknown $id
	 * @return \think\response\Json|mixed|string
	 * @author liujuneng
	 */
	public function edit($id)
	{
		$model = new MInpour();
		$request = $this->request;
		if ($request->isPost()) {
			$result = $model->edit($id);
			if ($result == 1) {
				return $this->sucSysJson("修改成功");
			}else {
				return $this->errSysJson("修改失败，请稍后重试");
			}
		}else {
			$data = $model->getInpourById($id);
			$this->assign('data', $data);
		}
		$this->assign('typeArr', $model->getTypeText(null));
		return $this->fetch();
	}
	
	/**
	 * 删除充值金额管理信息
	 * @param unknown $ids
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function delete($ids)
	{
		$this->validateByName('common.ids');
		
		$model = new MInpour();
		$successCount = $model->del($ids);
		if ($successCount > 0) {
			return $this->sucSysJson("删除成功");
		}else {
			return $this->errSysJson("删除失败");
		}
		
	}
	
	/**
	 * 修改充值金额管理信息状态
	 * @param unknown $ids
	 * @param unknown $status
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function changeStatus($ids, $status)
	{
		$this->validateByName('common.ids');
		if (!in_array($status, [1,2])) {
			return $this->sucSysJson("状态参数有误");
		}
		
		$model = new MInpour();
		$result = $model->where('id', 'in', $ids)->update(['status'=>$status]);
		if ($result > 0) {
			return $this->sucSysJson("修改成功");
		}else {
			return $this->errSysJson("修改失败");
		}
	}
	
	
}