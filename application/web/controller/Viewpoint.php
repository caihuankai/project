<?php
namespace app\web\controller;

use app\web\model\Viewpoint as MViewpoint;
use app\web\model\IndexRecommend as MIndexRecommend;
use app\wechat\model\PayOrder as MPayOrder;
use app\wechat\model\User as MUser;
use app\wechat\model\Column as MColumn;

class Viewpoint extends App
{
	/**
	 * 根据条件获取观点记录,暂定于推荐页使用，具体规则未定。以后可能开放为万能方法
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function getViewPointList()
	{
		//支持的可选条件
		$conditionList = ['status', 'top_status', 'level', 'statusIn', 'column_id', 'excludeColumnId'];
		$request = $this->request;
		//查询的字段，默认全部
		$type = $request->param('type', '0,2');//观点类型，0为普通观点，1为专题，2为精选
		$field = $request->param('field', null);
		$pageNo = $request->param('pageNo/i', 1);
		$perPage = $request->param('perPage/i', 20);
		$orderBy = $request->param('orderBy', 'id asc');
		$isUserInfo = $request->param('isUserInfo/b', false);
		$isImageInfo = $request->param('isImageInfo/b', false);
		$isCate = $request->param('isCate/b', false);
		
		$model = new MViewpoint();
		
		//拼接可选条件
		$condition = ['type'=>['in', $type]];
		foreach ($conditionList as $param){
			if ($request->has($param)) {
				if ($param == 'statusIn') {
					$condition['status'] = ['in', $request->param($param)];
				}elseif ($param == 'excludeColumnId') {
					$condition['column_id '] = ['not in', $request->param($param)];
				}else {
					$condition[$param] = trim($request->param($param));
				}
			}
		}
		
		$result = $model->getViewpointListByCondition($field, $condition, $pageNo, $perPage, $orderBy, $isUserInfo, false, $isCate);
		
		foreach ($result as $key=>$values) {
			if (isset($result[$key]['price'])) {
				$result[$key]['price'] = (float)$result[$key]['price'];
			}
			if (isset($result[$key]['original_price'])) {
				$result[$key]['original_price'] = (float)$result[$key]['original_price'];
			}
			if (isset($result[$key]['title_cate'])) {
				$result[$key]['title_cate'] = !empty($result[$key]['title_cate']) ? explode(' ', $result[$key]['title_cate']) : [];
			}
			//处理图片信息截取
			if ($isImageInfo) {
				$content = $values['content'];
				$imageList = interceptHtmlImage($content);
				$result[$key]['imageList'] = isset($imageList[1]) ? $imageList[1] : [];
			}
		}
		
		return $this->sucSysJson($result);
	}
	
	/**
	 * 根据用户ID获取观点记录，用户ID默认为当前用户
	 * 可选条件status，top_status，level
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function getViewPointListByUserId()
	{
		//支持的可选条件
		$conditionList = ['status', 'top_status', 'level', 'statusIn'];
		$request = $this->request;
		$userData = $this->getSessionUserData();
		$userId = $request->param('userId/i', $userData['user_id']);
		//查询的字段，默认全部
		$field = $request->param('field', null);
		$pageNo = $request->param('pageNo/i', 1);
		$perPage = $request->param('perPage/i', 20);
		$orderBy = $request->param('orderBy', 'id asc');
		$isUserInfo = $request->param('isUserInfo/b', false);
		$isImageInfo = $request->param('isImageInfo/b', false);
		$isAssistantDraft = $request->param('isAssistantDraft/b', false);
		
		$model = new MViewpoint();
		
		$condition = [
				'uid'=>$userId
		];
		//拼接可选条件
		foreach ($conditionList as $param){
			if ($request->has($param)) {
				if ($param == 'statusIn') {
					$condition['status'] = ['in', $request->param($param)];
				}else {
					$condition[$param] = trim($request->param($param));
				}
			}
		}
		
		$result = $model->getViewpointListByCondition($field, $condition, $pageNo, $perPage, $orderBy, $isUserInfo, $isAssistantDraft);
		$totalNum = $model->getViewpointCountByCondition($condition, $isAssistantDraft);
		
		foreach ($result as $key=>$values) {
			if (isset($result[$key]['price'])) {
				$result[$key]['price'] = (float)$result[$key]['price'];
			}
			if (isset($result[$key]['original_price'])) {
				$result[$key]['original_price'] = (float)$result[$key]['original_price'];
			}
			//处理图片信息截取
			if ($isImageInfo) {
				$content = $values['content'];
				$imageList = interceptHtmlImage($content);
				$result[$key]['imageList'] = isset($imageList[1]) ? $imageList[1] : [];
			}
		}
		
		$response = [
				'viewpointList'=>$result,
				'pagination'=>[
						'pageNo'=>$pageNo,
						'perPage'=>$perPage,
						'totalPage'=>ceil($totalNum / $perPage),
						'totalNum'=>$totalNum
				]
		];
		
		return $this->sucSysJson($response);
	}
	
	/**
	 * 官网首页-深度精选专用接口
	 * @return \think\response\Json
	 */
	public function getDeepChoiceViewpoint()
	{
		$model = new MViewpoint();
		$request = $this->request;
		$pageNo = $request->param('pageNo/i', 1);
		$perPage = $request->param('perPage/i', 20);
		$orderBy = $request->param('orderBy', 'id asc');
		
		$result = $model->alias('v')
		->field('v.*, tu.head_add, tu.alias,qg.qiniuImg as coverPic')
		->join('talk_column_viewpoint cv', 'cv.viewpoint_id = v.id')
		->join('talk_user tu', 'tu.user_id = v.uid')
		->join('talk_qiniu_gallerys qg','v.cover_qiniu_id = qg.id','left')
		->where('tu.freeze', 0)
		->where('v.status', 1)
		->where(function ($current) {
			$current->whereOr(function ($q) {
				$q->where('cv.column_id', 'in', '2,18');//深度精选,盘前内参
			})->whereOr(function ($q) {
				$q->where('v.type', 2)->where('cv.column_id', '<>', 12);
			});
		})
		->order($orderBy)
		->page($pageNo, $perPage)
		->group('v.id')
		->select();
		
		foreach ($result as $key=>$values) {
			if (isset($result[$key]['price'])) {
				$result[$key]['price'] = (float)$result[$key]['price'];
			}
			if (isset($result[$key]['original_price'])) {
				$result[$key]['original_price'] = (float)$result[$key]['original_price'];
			}
			if (isset($result[$key]['title_cate'])) {
				$result[$key]['title_cate'] = !empty($result[$key]['title_cate']) ? explode(' ', $result[$key]['title_cate']) : [];
			}
		}
		
		return $this->sucSysJson($result);
	}
	
	/**
	 * 根据viewpointId获取观点明细
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function getViewPointById()
	{
		$request = $this->request;
		$viewpointId = $request->param('viewpointId/i');
		$isUserInfo = $request->param('isUserInfo/b', false);
		$isColumn = $request->param('isColumn/b', false);
		$isRead = $request->param('isRead/b', false);
		$isIndexRecommend = $request->param('isIndexRecommend/b', false);//非首页推荐进入：0，首页推荐进入：1
		
		$model = new MViewpoint();
		$result = $model->alias('v')
		->field('v.*, cv.column_id, qg.qiniuImg as coverPic')
		->join('talk_qiniu_gallerys qg', 'v.cover_qiniu_id = qg.id', 'left')
		->join('talk_column_viewpoint cv', 'cv.viewpoint_id = v.id')
		->where('v.id', $viewpointId)
		->where('v.status', '<>', 2)
		->find();
		$result['price'] = (float)$result['price'];
		$result['original_price'] = (float)$result['original_price'];
		
		if ($result['level'] == 1) {
			$payOrderModel = new MPayOrder();
			$userData = $this->getSessionUserData();
			$user_id = $userData['user_id'];
			$type = 2;
			$result['isBuy'] = 0;
			if($payOrderModel->isBuy($user_id, $type, $viewpointId, $result['uid']) == 1 || $payOrderModel->columnValidity($user_id,$result['column_id'])){
				$result['isBuy'] = 1;
			}
		}
		
		//浏览人数加1
		if ($isRead) {
			$model->where('id', $viewpointId)->setInc('study_num');
		}
		
		//首页推荐进入，对应计数器加1
		if ($isIndexRecommend) {
			$indexRecommendModel = new MIndexRecommend();
			$indexRecommendModel->where(['type'=>4, 'type_id'=>$viewpointId])->setInc('click_num');
		}
		
		//获取用户信息
		if ($isUserInfo && !empty($result['uid'])) {
			$model = new MUser();
			$userInfo = $model->where('user_id', $result['uid'])->field('head_add,alias')->find();
			$result['head_add'] = $userInfo['head_add'];
			$result['alias'] = $userInfo['alias'];
		}
		
		if ($isColumn && !empty($result['column_id'])) {
			$model = new MColumn();
			$columnData = $model->alias('c')->where('c.id', $result['column_id'])
			->join('talk_live_focus lf', 'c.id = lf.live_id and lf.target = 2 and lf.user_id = ' . $this->getUserId(), 'left')
			->field('c.name,c.lead,c.level,c.cycle_price_info,c.read_num,c.focus_num,c.virtual_read_num,c.virtual_focus_num,lf.id as focusId')
			->find();
			$columnInfo = [];
			if (!empty($columnData)) {
				$columnInfo = [
						'name'=>$columnData['name'],
						'lead'=>$columnData['lead'],
						'level'=>$columnData['level'],
						'readNum'=>$columnData['read_num'] + $columnData['virtual_read_num'],
						'focusNum'=>$columnData['focus_num'] + $columnData['virtual_focus_num'],
						'isFocus'=>!is_null($columnData['focusId']),
						'cyclePriceInfo'=>json_decode($columnData['cycle_price_info'], true),
				];
			}
			$result['columnInfo'] = $columnInfo;
		}
		
		return $this->sucSysJson($result);
	}
	
}