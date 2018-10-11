<?php
namespace app\admin\controller;

use app\admin\model\IndexRecommend as MIndexRecommend;
use app\admin\model\Course as MCourse;
use app\admin\model\LiveCate as MLiveCate;
use app\common\model\PayOrder as MPayOrder;
use app\common\controller\JsonResult;

class IndexRecommendForCourseTab extends App
{
	use \app\admin\traits\Common,
	\app\admin\traits\AdminTable,
	\app\admin\traits\Status,
	\app\admin\traits\userNav;
	
	/**
	 * 课程推荐页-免费试听/精选好课
	 * 免费试听-type=6
	 * 精选好课-type=7
	 * @return mixed|\think\Response|\think\response\Json|\think\response\View|\think\response\Xml|\think\response\Redirect|\think\response\Jsonp|string
	 * @author liujuneng
	 */
	public function index($type)
	{
		$this->setTableHeader([
				['checkbox' => true, 'value' => 1,],
				['field' =>'num', 'title' => '序号',],
				['field' =>'ID', 'title' => 'ID',],
				['field' =>'className', 'title' => '单次课/系列课标题',],
				['field' =>'clickNum', 'title' => '（推荐／总） 点击量',],
				['field' =>'createTime', 'title' => '添加时间',],
				['field' =>'status', 'title' => '状态',],
				['field' =>'adminName', 'title' => '操作人',],
				['field' =>'sort', 'title' => '排序',],
				['field' => 'action', 'title' => '操作',],
		])->setToolbarId('table-button-html')->setTableSearchId('table-search-html')->setStatusTitle('启用', '停用');
		
		$model = new MIndexRecommend();
		
		return $this->traitAdminTableList(function () use ($model, $type){
			$field = 'ir.id, c.class_name, ir.click_num, c.study_num, ir.create_time, ir.status, ir.admin_id, ir.sort';
			
			$data = $this->traitAdminTableQuery([
					[['className', ''], 'likeAll', 'c.class_name'],
					[['dateMin', ''], 'dateMin-date', 'ir.create_time'],
					[['dateMax', ''], 'dateMax-date', 'ir.create_time '],
					[['status/i', '-1'], 'zero', 'ir.status'],
			], function () use ($model, $type) {
				$model->where('ir.type', $type)
				->alias('ir')
				->join('course c', 'ir.type_id = c.id', 'left');
				
				return $model;
			}, $field, 'ir.id desc');
			
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
							'移除'=>[
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
							'className'=>$datum['class_name'],
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
		}, function () use ($model, $type) {
			$this->assign('type', $type);
			$this->assign('columnStatusHtml', $this->statusColumnHtml(null));
			$this->assign('actionStatusHtml', $this->statusActionHtml(null));
			$this->assign('searchStatusArr', [-1=>'状态'] + $this->searchStatusArr());
		});
		
	}
	
	/**
	 * 删除免费试听/精选好课记录
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
	 * 修改免费试听/精选好课记录
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
			->field('c.class_name, ir.link, ir.sort, ir.status')
			->where('ir.id', $id)
			->join('course c', 'ir.type_id = c.id', 'left')
			->find();
			$data['link'] = \app\common\model\RedirectUrl::getCourseUrl($id);
			$this->assign('data', $data);
		}
		return $this->fetch();
	}
	
	/**
	 * 修改免费试听/精选好课的状态（启用/停用）
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
	 * 新增免费试听/精选好课功能，此处仅做调用课程列表
	 * @return mixed|\think\Response|\think\response\Json|\think\response\View|\think\response\Xml|\think\response\Redirect|\think\response\Jsonp|string
	 * @author liujuneng
	 */
	public function add($type)
	{
		$this->setTableHeader([
				['field' =>'num', 'title' => '序号',],
				['field' =>'ID', 'title' => 'ID',],
				['field' =>'name', 'title' => '课程名称',],
				['field' => 'firstCate', 'title' => '一级分类',],
				['field' => 'secondCate', 'title' => '二级分类',],
				['field' => 'type', 'title' => '收费类型',],
				['field' => 'teacherName', 'title' => '创建人',],
				['field' => 'money', 'title' => '礼点',],
				['field' => 'countNum', 'title' => '购买/浏览人数',],
				['field' => 'time', 'title' => '创建时间/直播时间',],
				['field' => 'status', 'title' => '状态',],
				['field' => 'action', 'title' => '操作',],
		])->setToolbarId('table-button-html')->setTableSearchId('table-search-html')->setStatusTitle('显示', '屏蔽');
		
		$model = new MCourse();
		
		return $this->traitAdminTableList(function () use ($model, $type){
			
			$field = 'c.id, c.uid, c.live_id, c.cate_id courseCate, c.class_name, c.price, c.level,
                        c.study_num, c.begin_time, c.create_time, c.open_status, c.type,
                        u.alias, u.user_level, l.cid liveCate';
			
			$data = $this->traitAdminTableQuery([
					[['className', ''], 'likeAll', 'c.class_name'],
			], function () use ($model){
				$model->where(['c.status' => ['<>', 5]])->alias('c')
				->join('user u', 'u.user_id = c.uid', 'left')
				->join('live l', 'l.id = c.live_id and c.status <> 5');
				return $model;
			}, $field, 'c.begin_time desc, c.id desc');
			
			$result = $viewpointIds = [];
			
			if (!empty($data['rows'])) {
				foreach ($data['rows'] as $row) {
					$courseIds[] = $row['id'];
				}
				
				$recommendModel = new \app\admin\model\IndexRecommend();
				$liveCateModel = new \app\common\model\LiveCate();
				// 课程购买人数
				$coursesNum = (new \app\common\model\PayOrder())->countCourseBuy($courseIds);
				
				$recommendList = $recommendModel->where('type', $type)->where('type_id', 'in', $courseIds)->column('id', 'type_id');
				
				$i = 1;
				foreach ($data['rows'] as $datum) {
					$actionList = null;
					if (!key_exists($datum['id'], $recommendList)) {
						$actionList = [
								'选择'=>[
										'class'=>'action-select-recommend',
										'data-id'=>$datum['id'],
								],
						];
					}
					
					$actionHtml = self::showOperate($actionList);
					
					$countNum = !empty($coursesNum[$datum['id']]) ? $coursesNum[$datum['id']] : 0;
					
					$result[] = [
							'num'         => $i,
							'ID'          => $datum['id'],
							'name'        => $datum['class_name'],
							'firstCate'   => $liveCateModel->getCateName($datum['liveCate']),
							'secondCate'  => $liveCateModel->getCateName($datum['courseCate']),
							'type'        => $model->getLevelText($datum['level']),
							'teacherName' => \app\admin\model\UrlHtml::goUserDetailsUrl($datum['uid'], (string)$datum['alias']),
							'money'       => $this->redSpan($datum['price']),
							'countNum'    => $countNum . '/' . $datum['study_num'],
							'time'   => $datum['type'] == 2 ? $datum['create_time'] : $datum['begin_time'],
							'status'      => $this->statusColumnHtml($datum['open_status']),
							'action'      => $actionHtml,
					];
					
					++$i;
				}
				
			}
			
			return $this->sucJson([
					'rows' => $result,
					'total' => $data['total'],
			]);
		}, function () use ($model, $type){
			$this->assign('type', $type);
			$this->assign('tableOtherHtml', $this->tableOtherHtml);
			$this->assign('actionStatusHtml', $this->statusActionHtml(null));
			$this->assign('isShowNav', 'hide');
		});
		
	}
	
	/**
	 * 添加
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function addIndexRecommend($type)
	{
		$request = $this->request;
		$selectId = $request->post('selectId/i', 0);
		
		$courseModel = new MCourse();
		$courseList = $courseModel->getCourseColumn([$selectId]);
		if (empty($courseList)) {
			return $this->errSysJson(JsonResult::ERR_COURSE_NOT_EXIST);
		}else {
			$indexRecommendModel = new MIndexRecommend();
			$condition = [
					'type'=>$type,
					'type_id'=>$selectId,
					'status'=>1,
			];
			$count = $indexRecommendModel->where($condition)->count();
			if ($count > 0) {
				return $this->errSysJson(JsonResult::ERR_COURSE_RECOMMEND);
			}
			
			$data = [
					'type'=>$type,
					'type_id'=>$selectId,
					'admin_id'=>$this->getAdminId(),
					'sort'=>1,
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