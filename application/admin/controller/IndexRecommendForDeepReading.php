<?php
namespace app\admin\controller;

use app\admin\model\IndexRecommend as MIndexRecommend;
use app\admin\model\Viewpoint as MViewpoint;
use app\admin\model\ViewpointCate as MViewpointCate;
use app\admin\model\LiveCate as MLiveCate;
use app\common\model\PayOrder as MPayOrder;
use app\common\controller\JsonResult;

class IndexRecommendForDeepReading extends App
{
	use \app\admin\traits\Common,
	\app\admin\traits\AdminTable,
	\app\admin\traits\Status,
	\app\admin\traits\userNav;
	
	/**
	 * 深度阅读列表
	 * @return mixed|\think\Response|\think\response\Json|\think\response\View|\think\response\Xml|\think\response\Redirect|\think\response\Jsonp|string
	 * @author liujuneng
	 */
	public function index()
	{
		$this->setTableHeader([
				['checkbox' => true, 'value' => 1,],
				['field' =>'num', 'title' => '序号',],
				['field' =>'ID', 'title' => 'ID',],
				['field' =>'viewpointTitle', 'title' => '观点标题',],
				['field' =>'clickNum', 'title' => '（推荐／总） 点击量',],
				['field' =>'createTime', 'title' => '添加时间',],
				['field' =>'status', 'title' => '状态',],
				['field' =>'adminName', 'title' => '操作人',],
				['field' =>'sort', 'title' => '排序',],
				['field' => 'action', 'title' => '操作',],
		])->setToolbarId('table-button-html')->setTableSearchId('table-search-html')->setStatusTitle('启用', '停用');
		
		$model = new MIndexRecommend();
		
		return $this->traitAdminTableList(function () use ($model){
			$field = 'ir.id, v.title, ir.click_num, v.study_num, ir.create_time, ir.status, ir.top_status, ir.admin_id, ir.sort';
			
			$data = $this->traitAdminTableQuery([
					[['title', ''], 'likeAll', 'v.title'],
					[['dateMin', ''], 'dateMin-date', 'ir.create_time'],
					[['dateMax', ''], 'dateMax-date', 'ir.create_time '],
					[['status/i', '-1'], 'zero', 'ir.status'],
			], function () use ($model) {
				$model->where('ir.type', 4)
				->alias('ir')
				->join('viewpoint v', 'ir.type_id = v.id', 'left');
				
				return $model;
			}, $field, 'ir.id desc');
			
			$result = [];
			//置顶操作文案
			$actionTopStatus = [
				0=>['actionName'=>"<span>置顶</span>", 'targetTopStatus'=>1],//原来为非置顶
				1=>['actionName'=>"<span class='c-red'>取消置顶</span>", 'targetTopStatus'=>0]//原来为置顶
			];
			
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
							'移除'=>[
									'class'=>'action-delete',
									'data-id'=>$datum['id'],
							],
							$this->statusActionHtml($datum['status'])=>[
									'class' => 'open-status',
									'data-id' => $datum['id'],
									'data-status' => $this->getStatusHtmlDataAttr($datum['status']),
							],
							$actionTopStatus[$datum['top_status']]['actionName']=>[
									'class' => 'open-top-status',
									'data-id' => $datum['id'],
									'data-top-status' => $actionTopStatus[$datum['top_status']]['targetTopStatus']
							]
					];
					$action = self::showOperate($actionList);
					
					$result[] = [
							'num'=>$i,
							'ID'=>$datum['id'],
							'viewpointTitle'=>$datum['title'],
							'clickNum'=>$datum['click_num'] . "/" . $datum['study_num'],
							'createTime'=>$datum['create_time'],
							'status'=>$this->statusColumnHtml($datum['status']),
							'adminName'=>$adminNameList[$datum['admin_id']],
							'sort'=>$datum['sort'],
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
			$this->assign('searchStatusArr', [-1=>'状态'] + $this->searchStatusArr());
		});
		
	}
	
	/**
	 * 删除深度阅读记录
	 * @param unknown $ids
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function deleteIndexRecommend($ids)
	{
		$this->validateByName('common.ids');
		
		$model = new MIndexRecommend();
		$successCount = $model->where('id', 'in', $ids)->delete();
		if ($successCount > 0) {
			return $this->sucSysJson("移除成功");
		}else {
			return $this->errSysJson("移除失败");
		}
		
	}
	
	/**
	 * 修改深度阅读记录
	 * @param unknown $id
	 * @return \think\response\Json|mixed|string
	 * @author liujuneng
	 */
	public function edit($id)
	{
		$this->validateByName('common.id');
		$model = new MIndexRecommend();
		$request = $this->request;
		
		if ($request->isPost()) {
			$sort = $request->param('sort');
			$status = $request->param('status');
			$updateData = [
				'sort'=>$sort,
				'status'=>$status
			];
			$successCount = $model->where('id', $id)->update($updateData);
			if ($successCount > 0) {
				return $this->sucSysJson("更新成功");
			}else {
				return $this->errSysJson("更新失败");
			}
		}else {
			$data = $model->alias('ir')
			->field('v.title, ir.link, ir.sort, ir.status')
			->where('ir.id', $id)
			->where('ir.type', 4)
			->join('viewpoint v', 'ir.type_id = v.id', 'left')
			->find();
			$this->assign('data', $data);
		}
		return $this->fetch();
	}
	
	/**
	 * 修改深度阅读的状态（启用/停用）
	 * @param unknown $ids
	 * @param unknown $status
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function changeStatus($ids, $status)
	{
		$this->validateByName();
		
		$model = new MIndexRecommend();
		
		$result = $model->where('id', 'in', $ids)->update(['status'=>$status]);
		if ($result > 0) {
			return $this->sucSysJson("修改成功");
		}else {
			return $this->errSysJson("修改失败");
		}
	}
	
	/**
	 * 修改深度阅读的置顶状态，最多只能有3条置顶记录
	 * @param unknown $ids
	 * @param unknown $topStatus
	 */
	public function changeTopStatus($ids, $topStatus)
	{
		$this->validateByName();
		
		if (!$this->checkAdminGroupId(1)) {
			return $this->errSysJson('只有超级管理员才能操作');
		}
		
		$model = new MIndexRecommend();
		
		if ($topStatus == 1) {
			$topNum = $model->where('type', 4)->where('top_status', 1)->count();
			if ($topNum >= 3) {
				return $this->errSysJson('置顶失败，最多只能有3条置顶记录');
			}
		}
		
		$result = $model->where('id', 'in', $ids)->update(['top_status'=>$topStatus]);
		if ($result > 0) {
			return $this->sucSysJson("修改成功");
		}else {
			return $this->errSysJson("修改失败");
		}
		
	}
	
	/**
	 * 新增深度阅读功能，此处仅做调用观点列表
	 * @return mixed|\think\Response|\think\response\Json|\think\response\View|\think\response\Xml|\think\response\Redirect|\think\response\Jsonp|string
	 * @author liujuneng
	 */
	public function add()
	{
		$this->setTableHeader([
				['field' =>'num', 'title' => '序号',],
				['field' =>'ID', 'title' => 'ID',],
				['field' =>'userName', 'title' => '作者',],
				['field' =>'publishTime', 'title' => '发布时间',],
				['field' =>'title', 'title' => '标题',],
				['field' =>'cate', 'title' => '标签类别',],
				['field' =>'level', 'title' => '类型',],
				['field' =>'studyNum', 'title' => '阅读量',],
				['field' =>'payNum', 'title' => '购买量',],
				['field' =>'likeNum', 'title' => '有用',],
				['field' =>'price', 'title' => '观点价格（单位：元）',],
				['field' => 'action', 'title' => '操作',],
		])->setToolbarId('table-button-html')->setTableSearchId('table-search-html');
		
		$model = new MViewpoint();
		
		return $this->traitAdminTableList(function () use ($model){
			
			$field = 'v.id, v.uid, u.alias, v.publish_time, v.title, v.level, v.study_num, v.like_num, v.price, v.status';
			
			$data = $this->traitAdminTableQuery([], function () use ($model){
				$model->where('v.status', 1)
				->alias('v')
				->join('user u', 'u.user_id = v.uid', 'left');
				return $model;
			}, $field, 'v.publish_time desc, v.id desc');
			
			$result = $viewpointIds = [];
			
			if (!empty($data['rows'])) {
				foreach ($data['rows'] as $row){
					$viewpointIds[] = $row['id'];
				}
				
				//获取观点对应的分类（取第一个分类）
				$viewpointCateModel = new MViewpointCate();
				$viewpointCateList = $viewpointCateModel->where('vc.viewpoint_id', 'in', $viewpointIds)
				->alias('vc')
				->field('vc.viewpoint_id, lc.name, lc.pid')
				->join('talk_live_cate lc', 'vc.cate_id = lc.id')
				->group('vc.viewpoint_id')
				->fetchClass('\CollectionBase')
				->select()
				->column(null, 'viewpoint_id');
				
				$payOrderModel = new MPayOrder();
				$payNumList = $payOrderModel->countCourseBuy($viewpointIds);
				
				//查询是否已经推荐过
				$indexRecommendModel = new MIndexRecommend();
				$query = [
						'type'=>4,
						'status'=>1,
						'type_id'=>['in', $viewpointIds]
				];
				$recommendedList = $indexRecommendModel->where($query)->column('type_id');
				
				
				$i = 1;
				foreach ($data['rows'] as $datum){
					$actionList = null;
					if (!in_array($datum['id'], $recommendedList)) {
						$actionList = [
								'选择'=>[
										'class'=>'action-select-deep-reading',
										'data-id'=>$datum['id'],
								],
						];
					}
					
					$action = self::showOperate($actionList);
					
					$payNum = !empty($payNumList[$datum['id']]) ? $payNumList[$datum['id']] : 0;
					$cate = '';
					if (!empty($viewpointCateList[$datum['id']])) {
						if ($viewpointCateList[$datum['id']]['pid'] !== 0) {
							$liveCateModel= new MLiveCate();
							$cate = $liveCateModel->where('id', $viewpointCateList[$datum['id']]['pid'])->value('name');
						}else {
							$cate = $viewpointCateList[$datum['id']]['name'];
						}
					}
					
					$result[] = [
							'num'=>$i,
							'ID'=>$datum['id'],
							'userName'=>\app\admin\model\UrlHtml::goUserDetailsUrl($datum['uid'], $datum['alias']),
							'publishTime'=>$datum['publish_time'],
							'title'=>$datum['title'],
							'cate'=>$cate,
							'level'=>$model->getLevelText($datum['level']),
							'studyNum'=>$this->blueSpan($datum['study_num']),
							'payNum'=>$this->blueSpan($payNum),
							'likeNum'=>$this->blueSpan($datum['like_num']),
							'price'=>$this->redSpan($datum['price']),
							'action'=>$action,
					];
					
					$i++;
					
				}
				
			}
			
			return $this->sucJson([
					'rows' => $result,
					'total' => $data['total'],
			]);
		}, function () use ($model){
			$this->assign('tableOtherHtml', $this->tableOtherHtml);
			$this->assign('isShowNav', 'hide');
		});
		
	}
	
	/**
	 * 添加深度阅读记录
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function addIndexRecommendForDeepReading()
	{
		$request = $this->request;
		$viewpointId = $request->post('viewpointId/i', 0);
		
		$viewpointModel = new MViewpoint();
		$viewpointList = $viewpointModel->getViewpointByIdList([$viewpointId]);
		if (empty($viewpointList)) {
			return $this->errSysJson(JsonResult::ERR_VIEWPOINT_NOT_EXIST);
		}else {
			$indexRecommendModel = new MIndexRecommend();
			$condition = [
					'type'=>4,
					'type_id'=>$viewpointId,
					'status'=>1,
			];
			$count = $indexRecommendModel->where($condition)->count();
			if ($count > 0) {
				return $this->errSysJson(JsonResult::ERR_VIEWPOINT_RECOMMEND);
			}
			
			$data = [
					'type'=>4,
					'type_id'=>$viewpointId,
					'admin_id'=>$this->getAdminId(),
					'sort'=>1,
					'link'=>$viewpointModel->getViewpointUrl($viewpointId),
					'name'=>$viewpointList[0]['title'],
			];
			$result = $indexRecommendModel->insert($data);
			if ($result > 0) {
				return $this->sucSysJson("推荐成功");
			}else {
				return $this->errSysJson("推荐失败");
			}
		}
	}
	
	
}