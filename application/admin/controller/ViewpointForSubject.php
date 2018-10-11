<?php
namespace app\admin\controller;

use app\admin\model\Viewpoint as MViewpoint;
use app\admin\model\Column as MColumn;

class ViewpointForSubject extends App
{
	use \app\admin\traits\Common,
	\app\admin\traits\AdminTable,
	\app\admin\traits\Status,
	\app\admin\traits\userNav;
	
	/**
	 * 获取专题列表
	 * @return mixed|\think\Response|\think\response\Json|\think\response\View|\think\response\Xml|\think\response\Redirect|\think\response\Jsonp|string
	 * @author liujuneng
	 */
	public function index()
	{
		$this->setTableHeader([
				['checkbox' => true, 'value' => 1,],
				['field' =>'num', 'title' => '序号',],
				['field' =>'ID', 'title' => 'ID',],
				['field' =>'userName', 'title' => '作者',],
				['field' =>'publishTime', 'title' => '发布时间',],
				['field' =>'columnName', 'title' => '栏目',],
				['field' =>'title', 'title' => '主题名称',],
				['field' =>'lead', 'title' => '相关事件',],
				['field' =>'effectiveTime', 'title' => '举办时间',],
				['field' =>'status', 'title' => '状态',],
				['field' => 'action', 'title' => '操作',],
		])->setToolbarId('table-button-html')->setTableSearchId('table-search-html');
		
		$model = new MViewpoint();
		
		return $this->traitAdminTableList(function () use ($model){
			$field = 'v.id, v.author, v.publish_time, v.title, v.lead, v.status, v.start_time, v.end_time, c.name';
			
			$data = $this->traitAdminTableQuery([
					[['userName', ''], 'likeAll', 'v.author'],
					[['title', ''], 'likeAll', 'v.title'],
					[['dateMin', ''], 'dateMin-date', 'v.publish_time'],
					[['dateMax', ''], 'dateMax-date', 'v.publish_time '],
			], function () use($model) {
				$model->alias('v')
				->join('talk_column_viewpoint cv', 'cv.viewpoint_id = v.id')
				->join('talk_column c', 'cv.column_id = c.id', 'left')
				->where('v.type', 1)->where('v.status', '<>', 2);
				
				return $model;
			}, $field, 'v.publish_time desc, v.id desc');
			
			$result = [];
			
			if (!empty($data['rows'])) {
				$i = 1;
				foreach ($data['rows'] as $datum) {
					$actionList = [
							'编辑'=>[
									'class'=>'action-edit',
									'data-id'=>$datum['id'],
							],
					];
					if ($datum['status'] == 0 || $datum['status'] == 1) {
                        $actionList['删除'] = [
                            'class'=>'action-delete',
                            'data-id'=>$datum['id'],
                        ];
                    }
                    if ($datum['status'] == 0) {
                        $actionList['发布'] = [
                            'class'=>'action-change',
                            'data-id'=>$datum['id'],
                            'data-status'=>1,
                            'style'=>'color:red;'
                        ];
                    }elseif ($datum['status'] == 1){
                        $actionList['禁用'] = [
                            'class'=>'action-change',
                            'data-status'=>0,
                            'data-id'=>$datum['id'],
                        ];
                    }
					$action = self::showOperate($actionList);
					
					$result[] = [
							'num'=>$i,
							'ID'=>$datum['id'],
							'userName'=>$datum['author'],
							'publishTime'=>$datum['publish_time'],
							'columnName'=>$datum['name'],
							'title'=>$datum['title'],
							'lead'=>$datum['lead'],
							'effectiveTime'=>!empty($datum['start_time']) && !empty($datum['end_time']) ? date('Y-m-d', strtotime($datum['start_time'])) . '至' . date('Y-m-d', strtotime($datum['end_time'])) : '',
							'status'=>$model->getStatusText($datum['status']),
							'action'=>$action,
					];
					
					$i++;
				}
			}
			
			return $this->sucJson([
					'rows' => $result,
					'total' => $data['total'],
			]);
		},function () use ($model){
			
		});
	}
	
	/**
	 * 创建专题
	 * @return \think\response\Json|mixed|string
	 * @author liujuneng
	 */
	public function add()
	{
		$model = new MViewpoint();
		$request = $this->request;
		if ($request->isPost()) {
			$title = $request->post('title', '');
			$startTime = $request->post('startTime', '');
			$endTime = $request->post('endTime', '');
			$lead = $request->post('lead', '');
			$author = $request->post('author', '');
			$content = $request->post('editorValue', '');
			$status = $request->post('status/i', 0);
			$columnId = $request->post('columnId/i', 0);
			
			//创建记录
			$insertData = [
					'title'=>$title,
					'lead'=>$lead,
					'content'=>$content,
					'author'=>$author,
					'type'=>1,//专题
					'status'=>$status,
					'start_time'=>$startTime,
					'end_time'=>$endTime
			];
			$result = $model->createViewpoint($insertData, [], [$columnId]);
			if ($result) {
				return $this->sucSysJson("创建观点成功");
			}else {
				return $this->errSysJson("创建观点失败");
			}
		}else {
			$columnModel = new MColumn();
// 			$columnList = $columnModel->where('status', 1)->column('name', 'id');
// 			$this->assign('selectColumnList', [0=>'选择栏目'] + $columnList);
			$this->assign('selectColumnList', [14=>'潜伏机会']);
		}
		
		return $this->fetch();
	}
    /**
     * 编辑当前状态
     * @return \think\response\Json
     */
    public function change(){
        if (request()->isPost()) {
            $id = trim(request()->param('id'));
            $status = trim(request()->param('status'));
            if (empty($id)||$status =="") return $this->errSysJson(['code'=>400,'msg'=>'缺少必要参数！']);
            $model = new MViewpoint();
            $data = [
                'status'=>$status,
            ];
            $result = $model->save(['status'=>$status],['id'=>$id]);
            if ($result){
                return $this->sucSysJson(['code'=>200,'msg'=>'编辑成功']);
            }else{
                return $this->sucSysJson(['code'=>400,'msg'=>'编辑失败']);
            }
        }else{
            return $this->errSysJson(['code'=>400,'msg'=>'提交方式错误']);
        }
    }
	
	/**
	 * 修改专题
	 * @param unknown $id
	 * @return \think\response\Json|void|mixed|string
	 * @author liujuneng
	 */
	public function edit($id)
	{
		$model = new MViewpoint();
		$request = $this->request;
		
		if ($request->isPost()) {
			$title = $request->post('title', '');
			$startTime = $request->post('startTime', '');
			$endTime = $request->post('endTime', '');
			$lead = $request->post('lead', '');
			$author = $request->post('author', '');
			$content = $request->post('editorValue', '');
			$status = $request->post('status/i', 0);
// 			$columnId = $request->post('columnId/i', 0);
			
			//更新记录
			$updateData = [
					'title'=>$title,
					'lead'=>$lead,
					'content'=>$content,
					'author'=>$author,
					'type'=>1,//专题
					'status'=>$status,
					'start_time'=>$startTime,
					'end_time'=>$endTime
			];
			if ($status == 1) {
				$updateData['publish_time'] = date('c');
			}
			
			$result = $model->where('id', $id)->update($updateData);
			if ($result) {
				return $this->sucSysJson("修改观点成功");
			}else {
				return $this->errSysJson("修改观点失败");
			}
		}else {
			$data = $model->where('id', $id)
			->field('title,start_time,end_time,lead,author,content,status')
			->find();
			if (empty($data)) {
				return $this->error('不存在的观点，请检查后重试');
			}
			
			$columnModel = new MColumn();
// 			$columnList = $columnModel->where('status', 1)->column('name', 'id');
// 			$this->assign('selectColumnList', [0=>'选择栏目'] + $columnList);
			$this->assign('selectColumnList', [14=>'潜伏机会']);
			$this->assign('data', $data);
		}
		
		return $this->fetch();
	}
	
}