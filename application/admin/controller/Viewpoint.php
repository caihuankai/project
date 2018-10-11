<?php

namespace app\admin\controller;

use app\admin\model\Viewpoint as MViewpoint;
use app\admin\model\ViewpointCate as MViewpointCate;
use app\admin\model\LiveCate as MLiveCate;
use app\common\model\PayOrder as MPayOrder;
use app\admin\model\IndexRecommend as MIndexRecommend;
use app\admin\model\Column as MColumn;
use app\admin\model\QiniuGallerys as MQiniuGallerys;
use app\admin\model\ColumnViewpoint as MColumnViewpoint;
use app\admin\model\User as MUser;
use app\common\controller\JsonResult;

class Viewpoint extends App
{
    use \app\admin\traits\Common,
        \app\admin\traits\AdminTable,
        \app\admin\traits\Status,
        \app\admin\traits\userNav;
	
	/**
	 * 观点查询列表
	 * @return mixed|\think\Response|\think\response\Json|\think\response\View|\think\response\Xml|\think\response\Redirect|\think\response\Jsonp|string
	 * @author liujuneng
	 */
	public function index()
	{
		$relevantId = $this->request->param('relevantId/i', 0);//type=1-3,relevantId为userId;type=4,relevantId为columnId
		$type = $this->request->param('type/i', 1);
		$this->setTableHeader([
				['checkbox' => true, 'value' => 1,],
				['field' =>'num', 'title' => '序号',],
				['field' =>'ID', 'title' => 'ID',],
				['field' =>'userName', 'title' => '作者',],
				['field' =>'publishTime', 'title' => '发布时间',],
				['field' =>'title', 'title' => '标题',],
				['field' =>'columnName', 'title' => '栏目',],
				['field' =>'cate', 'title' => '标签类别',],
				['field' =>'level', 'title' => '类型',],
				['field' =>'selected', 'title' => '是否精选',],
// 				['field' =>'payNum', 'title' => '购买量',],
				['field' =>'shareNum', 'title' => '分享(真实/虚拟/总)',],
				['field' =>'likeNum', 'title' => '点赞(真实/虚拟/总)',],
				['field' =>'studyNum', 'title' => '阅读(真实/虚拟/总)',],
				['field' =>'price', 'title' => '观点价格（单位：礼点）',],
				['field' => 'action', 'title' => '操作',],
		])->setToolbarId('table-button-html')->setTableSearchId('table-search-html');
		
		$model = new MViewpoint();
		$columnModel = new MColumn();
		
		return $this->traitAdminTableList(function () use ($model, $relevantId, $type, $columnModel){
			
			if($type == 2){
				$field = 'v.id, v.uid, u.alias, v.publish_time, v.title, v.level, v.study_num, v.like_num, v.price, v.status, po.order_no, po.state';
			}else{
				$field = 'v.id, v.uid, v.author, u.alias, v.publish_time, v.title, v.level, v.study_num, v.like_num, v.share_num, v.virtual_study_num, v.virtual_like_num, v.virtual_share_num,v.price, v.status, v.type, v.column_top_status';
			}
			
			
			$data = $this->traitAdminTableQuery([
					[['userName', ''], 'likeAll', 'u.alias'],
					[['title', ''], 'likeAll', 'v.title'],
					[['dateMin', ''], 'dateMin-date', 'v.publish_time'],
					[['dateMax', ''], 'dateMax-date', 'v.publish_time '],
					[['level/i', -1], 'zero', 'v.level'],
					[['viewpointType/i', -1], 'zero', 'v.type'],
			], function () use ($model, $relevantId, $type){
                if (!empty($relevantId)) {
                	if ($type == 1) {//用户发布的观点
                		$model->where(['v.uid' => $relevantId, 'v.status ' => 1]);
                	}elseif ($type == 2){ // 购买观点
                        $model->where(['po.user_id' => $relevantId]);
                        $model->join('pay_order po', 'po.state in (1,5) and po.type = 2 and po.class_id = v.id');
                    }else if ($type == 3){ // 用户推荐观点
                        $model->join('recommend_log r', 'r.type = 2 and r.target_id = v.id');
                        $model->where(['v.uid' => $relevantId]);
                    }elseif ($type != 4){ // 用户的所有观点
                        $model->where(['v.uid' => $relevantId]);
                    }
                }
                
                //后台账号已绑定前端账号的情况下，仅显示自己的观点
                $adminBindUserId = $this->getAdminBindUserId();
                if ($adminBindUserId > 0) {
                	$model->where('v.uid', $adminBindUserId);
                }
                
                $columnId = $this->request->param('column/i', -1);
                if ($type == 4){//栏目下的观点
                	$columnId = $relevantId;
                }
                if ($columnId > 0) {
                	$columnViewpointModel = new MColumnViewpoint();
                	$viewpointIdList = $columnViewpointModel->where('column_id', $columnId)->column('viewpoint_id');
                	$model->where('v.id', 'in', $viewpointIdList);
                }
				
				$model->where('v.status', '<>', 2)
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
				->where('lc.type', '<', 3)//3是新增的观点标题分类，不属于标签分类，所以不用在此显示
				->group('vc.viewpoint_id')
				->fetchClass('\CollectionBase')
				->select()
				->column(null, 'viewpoint_id');
				
// 				$payOrderModel = new MPayOrder();
// 				$payNumList = $payOrderModel->countCourseBuy($viewpointIds);

				$columnList = $columnModel->alias('c')
				->join('talk_column_viewpoint cv', 'cv.column_id = c.id')
				->where('cv.viewpoint_id', 'in', $viewpointIds)
				->group('cv.viewpoint_id')
				->column('group_concat(c.name)', 'viewpoint_id');
				
				if ($type == 4) {
					//栏目置顶操作文案
					$actionColumnTopStatus = [
							0=>['actionName'=>"<span>置顶</span>", 'targetColumnTopStatus'=>1],//原来为非置顶
							1=>['actionName'=>"<span class='c-red'>取消置顶</span>", 'targetColumnTopStatus'=>0]//原来为置顶
					];
				}
				
				$i = 1;
				foreach ($data['rows'] as $datum){
					$actionList = [
							'编辑'=>$this->urlTab('观点管理', '观点列表', 'details', ['id'=>$datum['id']]),
					];
					if ($datum['status'] == 0 || $datum['status'] == 1) {
						$actionList['删除'] = [
								'class'=>'action-delete',
								'data-id'=>$datum['id'],
						];
					}
					$actionList['推荐'] = [
							'class'=>'action-recommend',
							'data-id'=>$datum['id'],
					];
					if($type == 2){
						if($datum['state'] == 1){
	                        $actionList['退款屏蔽'] = [
	                                'class'    => 'action-refund',
	                                'data-id' => $datum['order_no']
	                        ];
	                    }else{
	                       $actionList['已退款屏蔽'] = [
	                                'class'    => '',
	                        ]; 
	                    }
					}elseif ($type == 4) {
						//栏目观点列表-栏目置顶操作
						$actionList[$actionColumnTopStatus[$datum['column_top_status']]['actionName']] = [
								'class' => 'open-column-top-status',
								'data-id' => $datum['id'],
								'data-column-top-status' => $actionColumnTopStatus[$datum['column_top_status']]['targetColumnTopStatus']
						];
					}
					
					$actionList['复制链接'] = [
							'class'=>'action-copy-url',
							'data-id'=>$datum['id'],
					];
					$action = self::showOperate($actionList);
					
// 					$payNum = !empty($payNumList[$datum['id']]) ? $payNumList[$datum['id']] : 0;
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
							'userName'=>$datum['uid'] > 0 ? \app\admin\model\UrlHtml::goUserDetailsUrl($datum['uid'], $datum['alias']) : $datum['author'],
							'publishTime'=>$datum['publish_time'],
							'title'=>$datum['title'],
							'columnName'=>isset($columnList[$datum['id']]) ? $columnList[$datum['id']] : '',
							'cate'=>$cate,
							'level'=>$model->getLevelText($datum['level']),
							'selected'=>$datum['type'] == 2 ? '是' : '否',
// 							'payNum'=>$this->blueSpan($payNum),
							'shareNum'=>$this->blueSpan($datum['share_num'] . '/' . $datum['virtual_share_num'] . '/' . ($datum['share_num'] + $datum['virtual_share_num']) ),
							'likeNum'=>$this->blueSpan($datum['like_num'] . '/' . $datum['virtual_like_num'] . '/' . ($datum['like_num'] + $datum['virtual_like_num']) ),
							'studyNum'=>$this->blueSpan($datum['study_num'] . '/' . $datum['virtual_study_num'] . '/' . ($datum['study_num'] + $datum['virtual_study_num']) ),
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
		}, function () use ($relevantId, $type, $model, $columnModel){
		    // 头部用户数据显示
		    switch ($type){
		    	case 1://发布观点
		    		$str = '发布观点数据';
		    		break;
                case 2: // 购买观点
                    $str = '购买的观点数据';
                    break;
                case 3: // 推荐观点
                    $str = '推荐观点数据';
                    break;
                default:
                    $str = '所有观点数据';
                    break;
            }
            $this->userNav($relevantId, $str);
            $this->assign('tableOtherHtml', $this->tableOtherHtml);
            $this->assign('relevantId', $relevantId);
            
            $columnList = $columnModel->where('status', 1)->column('name', 'id');
            $this->assign('searchColumnArr', [-1=>'全部栏目'] + $columnList);
			$this->assign('searchLevelArr', [-1=>'全部类型'] + $model->getLevelText(null));
			$this->assign('searchTypeArr', [-1=>'是否精选'] + $model->getTypeText(null));
		});
		
	}
	
	/**
	 * 修改观点状态，支持批量更新
	 * @param unknown $ids
	 * @param unknown $status
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function changeStatus($ids, $status)
	{
		$this->validateByName();
		
		//验证ids是否合法，必须为正整数或全为正整数的数组
		if (!empty($ids)) {
			if (\app\common\validate\ValidateBase::intsValidate($ids) != '') {
				return $this->errSysJson(JsonResult::ERR_COURSE_ERROR);
			}
		}
		
		$model = new MViewpoint();
		
		$deleteViewpointIdList = [];
		$viewpointList = $model->getViewpointByIdList($ids);
		foreach ($viewpointList as $viewpoint){
			$viewpointId = $viewpoint['id'];
			$statusOld = $viewpoint['status'];
			//状态改为发布
			if($status == 1) {
				if ($statusOld != 0) {
					return $this->errSysJson("(ID={$viewpointId})观点状态不为'草稿'，无法改为发布状态");
				}
			}elseif ($status == 2) {
				$deleteViewpointIdList[] = $viewpointId;
				if ($statusOld != 0 && $statusOld != 1) {
					return $this->errSysJson("(ID={$viewpointId})观点状态不为'草稿'或'发布'，无法改为删除状态");
				}
			}else {
				return $this->errSysJson("输入了无效的观点状态，请检查后重试");
			}
		}
		
		$successCount = $model->changeStatusByViewPointIds($ids, $status);
		if ($successCount > 0) {
			if (!empty($deleteViewpointIdList)) {
				$SendChatMessageController = new \app\wechat\controller\SendChatMessage();
				foreach ($deleteViewpointIdList as $deleteViewpointId) {
					$SendChatMessageController->sendServiceMsg($deleteViewpointId, 7);
				}
			}
			return $this->sucSysJson("修改状态成功");
		}else {
			return $this->errSysJson("修改状态失败");
		}
		
	}
	
	/**
	 * 修改深度阅读的置顶状态，最多只能有3条置顶记录
	 * @param unknown $ids
	 * @param unknown $columnTopStatus
	 */
	public function changeColumnTopStatus($ids, $columnTopStatus, $columnId)
	{
		$this->validateByName();
		
		if (!$this->checkAdminGroupId(1)) {
			return $this->errSysJson('只有超级管理员才能操作');
		}
		
		$model = new MViewpoint();
		
		if ($columnTopStatus == 1) {
			$topNum = $model->alias('v')
			->join('talk_column_viewpoint cv', 'cv.viewpoint_id = v.id')
			->where('cv.column_id', $columnId)->where('v.column_top_status', 1)->count();
			if ($topNum >= 3) {
				return $this->errSysJson('置顶失败，最多只能有3条置顶记录');
			}
		}
		
		$result = $model->where('id', 'in', $ids)->update(['column_top_status'=>$columnTopStatus]);
		if ($result > 0) {
			return $this->sucSysJson("修改成功");
		}else {
			return $this->errSysJson("修改失败");
		}
		
	}
	
	/**
	 * 编辑观点
	 * @param unknown $id
	 * @return \think\response\Json|mixed|string
	 * @author liujuneng
	 */
	public function details($id)
	{
		$this->validateByName('common.id');
		$this->setTabNameThirdly('观点编辑');
		
		$model = new MViewpoint();
		$request = $this->request;

		if ($request->isPost()) {
			$title = $request->post('title', '');
			$titleCate = $request->post('titleCate', '');
			$lead = $request->post('lead', '');
			$content = $request->post('content', '');
			$cateList = $request->post('selectCateList/a', []);
			$price = $request->post('price/f', 0);
			$originalPrice = $request->post('originalPrice/f', 0);
			
			$author = $request->post('author', '');
			$virtualStudyNum = $request->post('virtualStudyNum/i', 0);
			$virtualLikeNum = $request->post('virtualLikeNum/i', 0);
			$virtualShareNum = $request->post('virtualShareNum/i', 0);
			$publishTime = $request->post('publishTime');
			$coverUrl = $request->post('coverUrl');
			$pcCoverUrl = $request->post('pcCoverUrl');
			$payContent = $request->post('payContent', '');
			
			$firstCateId = $request->post('firstCateId/i', 0);
			$type = $request->post('type/i', 0);
			$status = $request->post('status/i', 0);
			$level = $request->post('level/i', 0);
			
			$selectColumnList = $request->post('selectColumnList/a', []);
			
			$this->validateByName();

			//验证标签列表是否合法，必须为正整数的数组
			if (!empty($cateList)) {
				$cateIdList = array_keys($cateList);
				if (\app\common\validate\ValidateBase::intsValidate($cateIdList) != '') {
					return $this->errSysJson(JsonResult::ERR_COURSE_ERROR);
				}
			}
			
			//保存封面到七牛信息表
			$qiniuId = saveQiniuGallerys($coverUrl);
			if (!empty($coverUrl) && intval($qiniuId) == 0) {
				return $this->errSysJson('封面图保存失败');
			}
			//保存PC封面到七牛信息表
			$qiniuIdPc = saveQiniuGallerys($pcCoverUrl);
			if (!empty($pcCoverUrl) && intval($qiniuIdPc) == 0) {
				return $this->errSysJson('PC封面图保存失败');
			}
			
			//保存标签一级分类信息
			if (!empty($firstCateId)) {
				$viewpointCateModel = new MViewpointCate();
				if ($firstCateId == -1) {//清除所有一级分类信息
					$viewpointCateModel->where('viewpoint_id', $id)->where('grade', 1)->delete();
				}else {//修改或添加一级分类信息
					$cateIdList = $viewpointCateModel->where('viewpoint_id', $id)->where('grade', 1)->column('cate_id');
					if (!empty($cateIdList)) {
						if ($firstCateId != $cateIdList[0]) {
							$viewpointCateModel->where('viewpoint_id', $id)->where('grade', 1)->update(['cate_id'=>$firstCateId]);
						}
					}else {
						$viewpointCateModel->insert(['viewpoint_id'=>$id, 'cate_id'=>$firstCateId, 'grade'=>1]);
					}
				}
			}
			
			//更新记录
			$currentTime = date('Y-m-d H:i:s');
			$updateData = [
					'title'=>$title,
					'title_cate'=>$titleCate,
					'lead'=>$lead,
					'content'=>$content,
					'update_time'=>$currentTime,
					'price'=>$price,
					'original_price'=>$originalPrice,
					
					'author'=>$author,
					'virtual_study_num'=>$virtualStudyNum,
					'virtual_like_num'=>$virtualLikeNum,
					'virtual_share_num'=>$virtualShareNum,
					'publish_time'=>$publishTime,
					'pay_content'=>$payContent,
					'type'=>$type,
					'status'=>$status,
					'level'=>$level
			];
			if ($qiniuId > 0) {
				$updateData['cover_qiniu_id'] = $qiniuId;
			}
			if ($qiniuIdPc > 0) {
				$updateData['cover_pc_qiniu_id'] = $qiniuIdPc;
			}
			
			$result = $model->updateViewpointForEdit($id, $updateData, $cateList, $selectColumnList);
			if ($result) {
				return $this->sucSysJson("更新观点成功");
			}else {
				return $this->errSysJson("更新观点失败");
			}
			
		}else {
			$data = $model->where('v.id', $id)->alias('v')
                ->field('v.*, u.*, vc.cate_id')
                ->join('user u', 'u.user_id = v.uid', 'left')
                ->join('viewpoint_cate vc', 'v.id = vc.viewpoint_id', 'left')
                ->find();
			if (empty($data)) {
				return $this->error('不存在的观点，请检查后重试');
			}
			
			//获取封面图和PC封面图
			$coverId = $data['cover_qiniu_id'];
			$pcCoverId = $data['cover_pc_qiniu_id'];
			$qiniuGallerysModel = new MQiniuGallerys();
			$data['coverPic'] = $qiniuGallerysModel->getQiNiuUrl($coverId);
			$data['pcCoverPic'] = $qiniuGallerysModel->getQiNiuUrl($pcCoverId);

			//购买量
			$payOrderModel = new MPayOrder();
			$payNumList = $payOrderModel->countCourseBuy([$id]);
			$data['payNum'] = isset($payNumList[$id]) ? $payNumList[$id] : 0;
			
			//已选标签
			$viewpointCateModel = new MViewpointCate();
			$selectCateList = $viewpointCateModel->getViewpointCateInfoByViewpointId($id);
			$selectClassificationList = [];
			$selectClassificationStr = '';
			foreach ($selectCateList as $key=>$selectCate) {
				if ($selectCate['grade'] == 1) {
					$selectClassificationList[] = $selectCate['name'];
					unset($selectCateList[$key]);
				}
			}
			$selectClassificationStr = implode(',', $selectClassificationList);

			$liveCateModel= new MLiveCate();
			$columnModel = new MColumn();
			$columnViewpointModel = new MColumnViewpoint();
			
			//已绑定后台账号与讲师信息时，创建人为讲师,栏目不可选
			$userId = $this->getAdminBindUserId();
			if (!empty($userId)) {
				$this->assign('unSelectColumn', true);
			}
			
			$columnList = $columnModel->where('status', 1)->column('name', 'id');
			$this->assign('selectColumnList', $columnList);
			
			$columnViewpointList = $columnViewpointModel->where('viewpoint_id', $id)->column('column_id');
			$this->assign('columnViewpointList', $columnViewpointList);
			
			$this->assign('selectClassificationStr', $selectClassificationStr);
			$this->assign('selectCateList', $selectCateList);
			$this->assign('allCate', $liveCateModel->getAllCate(false, 0, 1, 2));
			$this->assign('data', $data);
// 			$this->assign('levelArr', $model->getLevelText(null));
			$this->assign('selectStatusList', $model->getStatusText(null));
		}
		
		return $this->fetch();
	}
	
	/**
	 * 创建观点
	 * @return \think\response\Json|mixed|string
	 * @abstract liujuneng
	 */
	public function add()
	{
		$model = new MViewpoint();
		$request = $this->request;
		if ($request->isPost()) {
			$title = $request->post('title', '');
			$titleCate = $request->post('titleCate', '');
			$lead = $request->post('lead', '');
			$content = $request->post('content', '');
			$cateList = $request->post('selectCateList/a', []);
			$price = $request->post('price/f', 0);
			$originalPrice = $request->post('originalPrice/f', 0);
			
			$author = $request->post('author', '');
			$virtualStudyNum = $request->post('virtualStudyNum/i', 0);
			$virtualLikeNum = $request->post('virtualLikeNum/i', 0);
			$virtualShareNum = $request->post('virtualShareNum/i', 0);
			$publishTime = $request->post('publishTime');
			$coverUrl = $request->post('coverUrl');
			$pcCoverUrl = $request->post('pcCoverUrl');
			$payContent = $request->post('payContent', '');
			
			$firstCateId = $request->post('firstCateId/i', 0);
			$type = $request->post('type/i', 0);
			$status = $request->post('status/i', 0);
			$level = $request->post('level/i', 0);
			
			$selectColumnList = $request->post('selectColumnList/a', []);
			
			$this->validateByName();
			
			//验证标签列表是否合法，必须为正整数的数组
			if (!empty($cateList)) {
				$cateIdList = array_keys($cateList);
				if (\app\common\validate\ValidateBase::intsValidate($cateIdList) != '') {
					return $this->errSysJson(JsonResult::ERR_COURSE_ERROR);
				}
			}
			
			//保存封面到七牛信息表
			$qiniuId = saveQiniuGallerys($coverUrl);
			if (!empty($coverUrl) && intval($qiniuId) == 0) {
				return $this->errSysJson('封面图保存失败');
			}
			//保存PC封面到七牛信息表
			$qiniuIdPc = saveQiniuGallerys($pcCoverUrl);
			if (!empty($pcCoverUrl) && intval($qiniuIdPc) == 0) {
				return $this->errSysJson('PC封面图保存失败');
			}
			
			//标签一级分类信息
			if (!empty($firstCateId)) {
				$cateList[$firstCateId] = 1;
			}
			
			//创建记录
			$insertData = [
					'title'=>$title,
					'title_cate'=>$titleCate,
					'lead'=>$lead,
					'content'=>$content,
					'price'=>$price,
					'original_price'=>$originalPrice,
					'virtual_study_num'=>$virtualStudyNum,
					'virtual_like_num'=>$virtualLikeNum,
					'virtual_share_num'=>$virtualShareNum,
					'publish_time'=>$publishTime,
					'pay_content'=>$payContent,
					'type'=>$type,
					'status'=>$status,
					'level'=>$level
			];
			//已绑定后台账号与讲师信息时，创建人为讲师,否则为前端输入的编辑人
			$userId = $this->getAdminBindUserId();
			if (empty($userId)) {
				$insertData['author'] = $author;
			}else {
				$insertData['uid'] = $userId;
			}
			
			if ($qiniuId > 0) {
				$insertData['cover_qiniu_id'] = $qiniuId;
			}
			if ($qiniuIdPc > 0) {
				$insertData['cover_pc_qiniu_id'] = $qiniuIdPc;
			}
			
			$result = $model->createViewpoint($insertData, $cateList, $selectColumnList);
			if ($result) {
				return $this->sucSysJson("创建观点成功");
			}else {
				return $this->errSysJson("创建观点失败");
			}
		}else {
			$liveCateModel= new MLiveCate();
			$columnModel = new MColumn();
			//已绑定后台账号与讲师信息时，创建人为讲师
			$userId = $this->getAdminBindUserId();
			$alias = null;
			if (!empty($userId)) {
				$userModel = new MUser();
				$userInfo = $userModel->getUserColumn([$userId]);
				$alias = $userInfo[$userId];
				//栏目只能选“盘前内参”
				$columnList = $columnModel->where('id', 18)->where('status', 1)->column('name', 'id');
			}else {
				$columnList = $columnModel->where('status', 1)->column('name', 'id');
			}
			
			$this->assign('selectColumnList', $columnList);
			$this->assign('allCate', $liveCateModel->getAllCate(false, 0, 1, 2));
			$this->assign('selectStatusList', $model->getStatusText(null));
			$this->assign('alias', $alias);
		}
		
		return $this->fetch();
	}
	
	/**
	 * 推荐功能，推荐到首页（talk_index_recommend）
	 * @param unknown $id
	 * @return \think\response\Json|mixed|string
	 * @author liujuneng
	 */
	public function recommend($id)
	{
		$this->validateByName('common.id');
		$request = $this->request;
		$indexRecommendModel = new \app\admin\model\IndexRecommend();
		$tinyint = $indexRecommendModel->getMysqlTinyint('type-select');
		$selectArr = ['请选择推荐位置'] + $tinyint->getList();
		$disabledList = $indexRecommendModel->getTypeSelectMap('viewpointList');
		
		if ($request->isPost()) {
			$sort = $request->post('sort/i', 0);
			$type = $request->post('type/i', 0);
			
			if (empty($sort) || empty($type)) {
				return $this->errSysJson(JsonResult::ERR_PARAMETER);
			}elseif (empty($id)) {
				return $this->errSysJson(JsonResult::ERR_VIEWPOINT_NOT_EXIST);
			}
			//检查观点合法性
			$viewpointModel = new MViewpoint();
			$viewpointList = $viewpointModel->getViewpointByIdList([$id]);
			if (empty($viewpointList)) {
				return $this->errSysJson(JsonResult::ERR_VIEWPOINT_NOT_EXIST);
			}elseif ($viewpointList[0]['status'] == 2) {
				return $this->errSysJson(JsonResult::ERR_VIEWPOINT_DELETE);
			}
			
			switch ($type){
				case 6://推荐到深度阅读
					//检查已推荐记录
					$indexRecommendModel = new MIndexRecommend();
					$condition = [
						'type'=>4,
						'type_id'=>$id,
						'status'=>1,
					];
					$count = $indexRecommendModel->where($condition)->count();
					if ($count > 0) {
						return $this->errSysJson(JsonResult::ERR_VIEWPOINT_RECOMMEND);
					}
					
					$data = [
							'type'=>4,
							'type_id'=>$id,
							'admin_id'=>$this->getAdminId(),
							'sort'=>$sort,
							'link'=>$viewpointModel->getViewpointUrl($id),
							'name'=>$viewpointList[0]['title'],
					];
					$result = $indexRecommendModel->insert($data);
					if ($result > 0) {
						return $this->sucSysJson("推荐成功");
					}else {
						return $this->errSysJson("推荐失败");
					}
					break;
				default:
					return $this->errSysJson("暂不支持此推荐类型");
			}
			
		}
		
		$this->assign('id', $id);
		$this->assign('selectArr', $selectArr);
		$this->assign('disabledList', $disabledList);
		
		return $this->fetch();
	}


    /**
     * 观点标题分类列表
     * @name  titleCateIndex
     * @return mixed
     * @author Lizhijian
     */
	public function titleCateIndex(){

        //1. 设置表头
        $this->setTableHeader([
            ['checkbox' => true, 'value' => 1,],
            ['field' =>'num', 'title' => '序号',],
            ['field' =>'id', 'title' => 'ID',],
            ['field' =>'name', 'title' => '观点标题分类名称',],
            ['field' =>'type', 'title' => '类型',],
            ['field' => 'action', 'title' => '操作',],
        ])->setToolbarId('table-button-html')->setTableSearchId('table-search-html');;

        //2.从模型获取数据
        $model = new MLiveCate();
        return $this->traitAdminTableList(function () use ($model) {

            //获取总数据
            $field = 'id,name,type';
            $where = '';
            $data = $this->traitAdminTableQuery([//设置普通筛选查询
                [['name', ''], 'likeAll', 'name'],
            ], function () use ($model, $where) {//表单查询
                $model->where('type', 'in', [3,4]);//3是新增的观点标题分类
                return $model;
            }, $field, 'id desc');

            //循环构造每一行的格式数据
            $result = [];
            $i = 1;

            //获取相应红包开抢时间（talk_redpacket_log）
            foreach ($data['rows'] as $datum) {

                //构造操作HTML
                $actionHtml = [
                    '编辑' => ['class' => 'edit-cate', 'data-id' => $datum['id'], 'data-type' => $datum['type']],
                    '删除' => ['class'=>'del-cate', 'data-id'=>$datum['id']]
                ];

                //一行数据
                $TEMP = [
                    'num' => $i,//序号
                    'id' => $datum['id'],//ID
                    'name' => $datum['name'],//分类名
                    'type' => $datum['type']==3? '固定':'自定义',//分类类型
                    'action' => self::showOperate($actionHtml),
                ];

                $result[] = $TEMP;
                ++$i;
            }

            return $this->sucJson([
                'rows' => $result,
                'total' => $data['total'],
            ]);
        });

    }

    /**
     * 新增/编辑观点标题分类
     * @name  saveCate
     * @param int $id
     * @return mixed|\think\response\Json
     */
    public function saveCate($id = 0){
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
            $data['type'] = input('type')? :3 ;

            if (empty($data['name'])) {
                return $this->errSysJson(\app\common\controller\JsonResult::ERR_CATE_NAME_NOT_EMPTY);
            }

            $model->$func($data, $second);
            return $this->sucSysJson(1);
        }

        return $this->fetch();
    }

    /**
     * 删除观点标签分类
     * @name  delCate
     * @param $ids
     * @return \think\response\Json
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
        $deleteFunc($ids);

        return $this->sucSysJson(1);
    }
    
    /**
     * 复制链接
     * @return mixed|string
     * @author liujuneng
     */
    public function copy()
    {
    	$id = trim(input('viewpointId'));
    	$model = new MViewpoint();
    	$datum = $model->where('v.id',$id)->alias('v')
    	->join('user u', 'u.user_id = v.uid', 'left')
    	->join('talk_qiniu_gallerys qg', 'qg.id = v.cover_qiniu_id', 'left')
    	->field('v.id,v.title,v.lead,qg.qiniuImg,u.alias')
    	->find();
    	$copyData = [
    			'type'=>2,//区分类型：课程为1，观点为2
    			'id'=>$datum['id'],
    			'class_name'=>$datum['title'],
    			'abstract'=>$datum['lead'],
    			'alias'=>$datum['alias'],
    			'src_img'=>$datum['qiniuImg'],
    	];
    	$copyData = trim('json='.json_encode($copyData));
    	$this->assign('dataCopy',$copyData);
    	return $this->fetch('course_manage/copy');
    }
    
}