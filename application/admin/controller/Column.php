<?php
namespace app\admin\controller;

use app\admin\model\Column as MColumn;
use app\admin\model\Viewpoint as MViewpoint;

class Column extends App
{
	use \app\admin\traits\Common,
		\app\admin\traits\AdminTable,
		\app\admin\traits\Status,
		\app\admin\traits\userNav;
	
		
	public function index()
	{
		$this->setTableHeader([
				['checkbox' => true, 'value' => 1,],
				['field' =>'num', 'title' => '序号',],
				['field' =>'ID', 'title' => '栏目ID',],
				['field' =>'name', 'title' => '栏目名',],
				['field' =>'picture', 'title' => '图片',],
				['field' =>'viewpointNum', 'title' => '文章数量',],
				['field' =>'sort', 'title' => '排序',],
				['field' =>'level', 'title' => '收费类型',],
				['field' =>'status', 'title' => '状态',],
				['field' =>'createTime', 'title' => '创建时间',],
				['field' =>'readInfo', 'title' => '阅读：真实/虚拟/总',],
				['field' =>'focusInfo', 'title' => '关注：真实/虚拟/总',],
				['field' => 'action', 'title' => '操作',],
		])->setToolbarId('table-button-html')->setTableSearchId('table-search-html')->setStatusTitle('启用', '停用');
		
		$model = new MColumn();
		
		return $this->traitAdminTableList(function () use ($model){
			$field = 'c.*,qg.qiniuImg';
			
			$data = $this->traitAdminTableQuery([
					//暂无搜索条件
			], function () use ($model) {
				$model->alias('c')
				->join('talk_qiniu_gallerys qg','c.qiniu_id = qg.id','left');
				
				return $model;
			}, $field);
			
			$result = $columnIds = $viewpointNumList = [];
			
			if (!empty($data['rows']) && !empty($data['rows'][0]['id'])) {//field中用了count(),可能会返回一条无效记录
				foreach ($data['rows'] as $datum) {
					$columnIds[] = $datum['id'];
				}
				if (!empty($columnIds)) {
					$model = new MViewpoint();
					$viewpointNumList = $model->alias('v')
										->join('talk_column_viewpoint cv', 'cv.viewpoint_id = v.id')
										->where('v.status', '<>', 2)
										->where('cv.column_id', 'in', $columnIds)
										->group('cv.column_id')
										->column('count(1) as viewpointNum', 'column_id');
				}
				
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
							]
					];
					$action = self::showOperate($actionList);
					
					$viewpointNum = isset($viewpointNumList[$datum['id']]) ? $viewpointNumList[$datum['id']] : 0;
					
					$result[] = [
							'num'=>$i,
							'ID'=>$datum['id'],
							'name'=>$datum['name'],
							'picture'=>$this->getTableColumnImgHtml($datum['qiniuImg']),
							'viewpointNum'=>\app\admin\model\UrlHtml::goViewpointListHtml($datum['id'], $viewpointNum, 4),
							'sort'=>$datum['sort'],
							'level'=>$model->getLevelText($datum['level']),
							'status'=>$this->statusColumnHtml($datum['status']),
							'createTime'=>$datum['create_time'],
							'readInfo'=>$datum['read_num'] . "/" . $datum['virtual_read_num'] . "/" . ($datum['read_num'] + $datum['virtual_read_num']),
							'focusInfo'=>$datum['focus_num'] . "/" . $datum['virtual_focus_num'] . "/" . ($datum['focus_num'] + $datum['virtual_focus_num']),
							'action'=>$action
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
	 * 新增栏目记录
	 * @return \think\response\Json|mixed|string
	 * @author liujuneng
	 */
	public function add()
	{
		$model = new MColumn();
		$request = $this->request;
		if ($request->isPost()) {
			if (!empty($request->file('file'))) {
				$result = $model->add();
				if ($result == 1) {
					return $this->sucSysJson("新增成功");
				}else {
					return $this->errSysJson("新增失败，请稍后重试");
				}
			}else {
				return $this->errSysJson("请选择封面图片");
			}
		}
		
		$this->assign('cyclePriceInfo', $model->getCyclePriceInfo());
		return $this->fetch();
	}
	
	/**
	 * 修改栏目记录
	 * @param unknown $id
	 * @return \think\response\Json|mixed|string
	 * @author liujuneng
	 */
	public function edit($id)
	{
		$this->validateByName('common.id');
		$model = new MColumn();
		$request = $this->request;
		
		if ($request->isPost()) {
			$result = $model->edit($id);
			if ($result == 1) {
				return $this->sucSysJson("修改成功");
			}else {
				return $this->errSysJson("修改失败，请稍后重试");
			}
		}else {
			$data = $model->alias('c')
			->field('c.*,qg.qiniuImg')
			->join('talk_qiniu_gallerys qg','c.qiniu_id = qg.id','left')
			->where('c.id', $id)->find();
			$data['cycle_price_info'] = json_decode($data['cycle_price_info'], true);
			$this->assign('data', $data);
		}
		return $this->fetch();
	}
	
	/**
	 * 修改栏目的状态（启用/停用）
	 * @param unknown $ids
	 * @param unknown $status
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function changeStatus($ids, $status)
	{
		$this->validateByName();
		
		$model = new MColumn();
		
		$result = $model->where('id', 'in', $ids)->update(['status'=>$status]);
		if ($result > 0) {
			return $this->sucSysJson("修改成功");
		}else {
			return $this->errSysJson("修改失败");
		}
	}
	
	
	
	
	
}