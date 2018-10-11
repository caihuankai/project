<?php
namespace app\admin\controller;

class LiveCateForViewpoint extends App
{
	use \app\admin\traits\Common,
		\app\admin\traits\AdminTable;
	
	/**
	 * 列表页
	 * @return mixed
	 * @author liujuneng
	 */
	public function index()
	{
		$this->setTableHeader([
				['checkbox' => true, 'value' => 1,],
				['field' =>'num', 'title' => '序号',],
				['field' =>'id', 'title' => 'ID',],
				['field' =>'firstCate', 'title' => '类别',],
				['field' => 'secondCate', 'title' => '相关标签',],
				['field' => 'action', 'title' => '操作', 'class' => 'action-action'],
		])->setToolbarId('table-button-html')->setTableSearchId('table-search-html')->setNoPage();
		
		$model = new \app\admin\model\LiveCate();
		
		return $this->traitAdminTableList(function () use ($model){
			$field = 'id, name, brief';
			
			$data = $this->traitAdminTableQuery([
					[['name', ''], 'likeAll', 'brief'],
					[['floorCate', 0], 'eq', 'id']
			], function () use ($model) {
				$model->where('type', 2)->where('pid', 0);
				return $model;
			}, $field, 'sort asc, id asc');
			
			$result = [];
			if (!empty($data['rows'])) {
				$i = 1;
				foreach ($data['rows'] as $datum) {
					$actionList = [
							'编辑'=>[
									'class'=>'edit-cate',
									'data-id'=>$datum['id'],
							],
							'删除'=>[
									'class'=>'del-cate',
									'data-id'=>$datum['id'],
							],
							'添加标签'=>[
									'class'=>'add-second-cate',
									'data-id'=>$datum['id'],
									'data-first-cate'=>$datum['name']
							],
							'删除标签'=>[
									'class'=>'del-second-cate',
									'data-id'=>$datum['id'],
									'data-first-cate'=>$datum['name']
							],
					];
					$action = self::showOperate($actionList);
					
					$secondCateList = $model->where('pid', $datum['id'])->fetchClass('\CollectionBase')->select()->column('name');
					$secondCateStr = empty($secondCateList) ? "" : implode(',', $secondCateList);
					
					$result[] = [
							'num'=>$i,
							'id'=>$datum['id'],
							'firstCate'=>$datum['name'],
							'secondCate'=>$secondCateStr,
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
			$this->assign('floorCate', $model->getFloorCate(1, 2));
		});
		
	}
	
	/**
	 * 新增分类
	 *
	 * @param int $id
	 * @return mixed
	 * @author liujuneng
	 */
	public function saveCate($id = 0)
	{
		$id = (int)$id;
		$request = $this->request;
		$model = new \app\admin\model\LiveCate();
		
		if (empty($id)) { // 新增
			$data = [];
			$second = false;
			$func = 'insert';
		}else { // 编辑
			$data = [];
			$assign = $model->where(['id' => $id])->find();
			
			if (empty($assign)) {
				return $this->errSysJson('不存在的分类');
			}
			
			$this->assign('data', $assign);
			$func = 'update';
			$second = ['id' => $id];
		}
		
		if ($request->isPost()) { // 保存
			$data['name'] = $request->post('cateName', '');
			$data['type'] = 2;
			
			if (empty($data['name'])) {
				return $this->errSysJson(\app\common\controller\JsonResult::ERR_CATE_NAME_NOT_EMPTY);
			}
			
			$model->$func($data, $second);
			
			return $this->sucSysJson(1);
		}
		
		return $this->fetch();
	}
	
	/**
	 * 新增子分类
	 * @param number $id
	 * @return \think\response\Json|mixed|string
	 */
	public function addSecondCate($id = 0)
	{
		$id = (int)$id;
		$request = $this->request;
		$model = new \app\admin\model\LiveCate();
		$firstCate = $request->param('firstCate', '');
		
		if ($request->isPost()) {
			$data['pid'] = $id;
			$data['name'] = $request->post('secondCateName', '');
			$data['type'] = 2;
			
			if (empty($data['name'])) {
				return $this->errSysJson(\app\common\controller\JsonResult::ERR_CATE_NAME_NOT_EMPTY);
			}
			
			$model->insert($data);
			
			return $this->sucSysJson(1);
		}
		
		$this->assign('firstCate', $firstCate);
		return $this->fetch();
	}
	
	/**
	 * 删除子分类
	 * @param number $id
	 * @return \think\response\Json|mixed|string
	 */
	public function delSecondCate($id = 0)
	{
		$id = (int)$id;
		$request = $this->request;
		$model = new \app\admin\model\LiveCate();
		$firstCate = $request->param('firstCate', '');
		
		
		if ($request->isPost()) {
			$cateList = $request->post('cateList/a', []);
			if (empty($cateList)) {
				$model->where('pid', $id)->delete();
			}else {
				$model->where('pid', $id)->where('id', 'not in', $cateList)->delete();
			}
			return $this->sucSysJson(1);
		}
		
		$secondCateList = $model->where('pid', $id)->field('id,name')->select();
		
		$this->assign('firstCate', $firstCate);
		$this->assign('secondCateList', $secondCateList);
		return $this->fetch();
	}
		
	/**
	 * 删除分类
	 *
	 * @param $ids
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function delCate($ids)
	{
		$validate = "LiveCate.delCate";
		$this->validateByName($validate);
		$model = new \app\admin\model\LiveCate();
		$ids = array_filter((array)$ids);
		if (empty($ids)) {
			return $this->sucSysJson(1);
		}
		$deleteFunc = function ($id) use ($model) {
			!empty($id) && $model->where(['id' => ['in', $id]])->delete();
		};
		
		$data = $model->where(['id' => ['in', $ids]])->field('pid, id')->select();
		
		$floorId = $deleteId = [];
		foreach ($data as $datum) {
			if (empty($datum['pid'])){ // 一级
				$floorId[] = $datum['id'];
			}else{
				$deleteId[] = $datum['id'];
			}
		}
		
		// 检测一级
		$deleteFloorId = $model->checkFloorCate($floorId);
		
		$deleteFunc($deleteId);
		$deleteFunc($deleteFloorId);
		
		return $this->sucSysJson(1);
	}
		
		
		
}