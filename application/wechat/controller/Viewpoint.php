<?php
namespace app\wechat\controller;

use app\wechat\model\LiveCate;
use app\wechat\model\User as MUser;
use app\wechat\model\Viewpoint as MViewpoint;
use app\wechat\model\ViewpointCate as MViewpointCate;
use app\wechat\model\RecommendLog as MRecommendLog;
use app\wechat\model\HitRecord as MHitRecord;
use app\wechat\model\PayOrder as MPayOrder;
use app\wechat\model\IndexRecommend as MIndexRecommend;
use app\common\controller\JsonResult;
use app\wechat\controller\AdmireRpc;
use app\wechat\model\Course;
use app\wechat\model\Live;
use app\wechat\model\UserAssistant;
use app\wechat\model\Column as MColumn;

class Viewpoint extends App
{
	use \app\wechat\traits\Live;
	
	/**
	 * 创建观点
	 * 1.验证参数格式
	 * 2.校验是否收费及价格关系；0：免费，1：收费
	 * 	2.1 免费时，价格不填或为0
	 * 	2.2 收费时，价格不能小于1元
	 * 3.验证标签列表是否合法，必须为正整数的数组
	 * 4.执行创建操作（事务）
	 * 	4.1 创建观点记录并返回观点ID
	 * 	4.2 创建观点与标签的关联表
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function create()
	{
		$request = $this->request;
		$title = $request->post('title', '');
        $titleCate = $request->post('titleCate', '');
		$lead = $request->post('lead', '');
		$content = $request->post('content', '');
		$level = $request->post('level/i', 0);
		$price = $this->disPrice($request->post('price', 0), 0);
		$originalPrice = $this->disPrice($request->post('originalPrice', 0), 0);
		$cateList = $request->post('cateList/a', []);
		$status = $request->post('status/i', 0);
		$teacherId = $request->post('teacherId/i', 0);
		$columnId = $request->post('columnId/i', 0);
		$coverUrl = $request->post('coverUrl');
		$payContent = $request->post('payContent', '');
		$this->validateByName();

		if ($level == 0 && !empty($price)){
			return $this->errSysJson('', '免费时金额不能填写');
		}elseif ($level == 1 && $price < 1){
			return $this->errSysJson('', '最小金额不能低于1元');
		}elseif ($originalPrice > 0 && $originalPrice <= $price){
			return $this->errSysJson('', '原价不能比优惠价低');
		}elseif (empty($teacherId) && $this->ifAssistant()){
			return $this->errSysJson('', '你的身份为助教，请选择对应的讲师');
		}

		//验证标签列表是否合法，必须为正整数的数组
		if (!empty($cateList)) {
			$cateIdList = array_keys($cateList);
			if (\app\common\validate\ValidateBase::intsValidate($cateIdList) != '') {
				return $this->errSysJson(JsonResult::ERR_COURSE_ERROR);
			}
		}
		
		$model = new MViewpoint();
		
		$liveId = 0;
		$assistantId = 0;
		
		//获取当前用户信息
		$userId = $this->getUserId();
		
		if (empty($teacherId)) {
			// 检测当前用户权限
			$this->checkTeacherPermissions($userId, 2);
			
			$this->liveFieldTrait = 'id';
			$liveData = $this->getLiveDataTrait();
			$liveId = $liveData['id'];
		}else {
			//检查用户是否为讲师的助理,检查讲师禁用情况
			if (!(new \app\wechat\model\UserAssistant())->checkUserManageTeacher($userId, $teacherId) || 
					(new \app\wechat\model\User())->checkUserFreeze($teacherId) ){
				return $this->errSysJson(\app\common\controller\JsonResult::ERR_ASSISTANT_NO_PERMISSIONS_VIEWPOINT);
			}
			
			// 检测老师的观点权限是否被关闭
			$this->checkTeacherPermissions($teacherId, 2, \app\common\controller\JsonResult::ERR_ASSISTANT_NO_PERMISSIONS_VIEWPOINT);
			
			$assistantId = $userId;
			$userId = $teacherId;
			
			$liveModel = new Live();
			$liveData = $liveModel->getDataByLiveIdAndUser('id', $teacherId);
			$liveId = $liveData['id'];
		}
		
		//保存封面到七牛信息表
		$qiniuId = saveQiniuGallerys($coverUrl);
		if (!empty($coverUrl) && intval($qiniuId) == 0) {
			return $this->errSysJson('封面图保存失败');
		}

		$viewpointData = [
				'cover_qiniu_id'=>$qiniuId,
				'uid'=>$userId,
				'assistant_id'=>$assistantId,
				'live_id'=>$liveId,
				'title'=>$title,
				'title_cate'=>$titleCate,
				'lead'=>$lead,
				'content'=>$content,
				'pay_content'=>$payContent,
				'level'=>$level,
				'price'=>(float)$price,
				'original_price'=>(float)$originalPrice,
				'status'=>$status,
		];
		$result = $model->createViewpoint($viewpointData, $cateList, [$columnId]);
		
		if ($result) {
			//创建消息中心记录
			if ($status == 1) {
				$userIdList = [];
				//成功发布观点(讲师/助教)
				if (empty($teacherId)) {
					$userIdList = [$userId];
				}else {
					$userIdList = [$userId,$assistantId];
				}
				$this->createMessageRecordWithViewpoint($userIdList, $userId, $liveId, $result, $title);
			}
			
			return $this->sucSysJson("创建观点成功");
		}else {
			return $this->errSysJson("创建观点失败");
		}
		
	}
	
	/**
	 * 发布观点后创建消息中心记录
	 * @param unknown $teacherIdList	讲师id+助教id
	 * @param unknown $teacherId		讲师id
	 * @param unknown $liveId			直播间id
	 * @param unknown $viewpointId		观点id
	 * @param unknown $viewpointTitle	观点标题
	 */
	protected function createMessageRecordWithViewpoint($teacherIdList, $teacherId, $liveId, $viewpointId, $viewpointTitle)
	{
		if ($teacherId == 1) {//非讲师（编辑）创建，用户id就是1
			return;
		}
		
		$replaceArray = [
				'lead'=>[$viewpointTitle],
				'content'=>[$viewpointTitle]
		];
		\MessageCenter::instance()->createMessageRecords('VIEWPOINT_CREATE', ['viewpointId'=>$viewpointId], $replaceArray, $teacherIdList);
		//已关注的讲师发布新观点
		$userIdList = (new \app\wechat\model\LiveFocus())->getFocusList($liveId, 'user_id');
		$userIdList = \MessageCenter::instance()->getArrayValueByKey($userIdList, 'user_id');
		$teacherName = (new \app\wechat\model\User())->getInfoById($teacherId, 'alias')['alias'];
		$replaceArray = [
				'lead'=>[$teacherName,$viewpointTitle],
				'content'=>[
						date('m月d日'),
						$teacherName,
						$viewpointTitle
				]
		];
		\MessageCenter::instance()->createMessageRecords('VIEWPOINT_CREATE_TO_LIVE_FOCUS', ['viewpointId'=>$viewpointId], $replaceArray, $userIdList);
		
	}
	
	/**
	 * 获取观点标签分类，目前为talk_live_cate的一级分类，分页返回
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function getViewpointCate()
	{
		$request = $this->request;
		$pageNo = $request->param('pageNo/i', 1);
		$perPage = $request->param('perPage/i', 20);
		$field = "id, name";
		$orderBy = "id desc";
		$status = 1;
		$type = 2;
		$result = array_values((new \app\common\model\LiveCate())->getFirstCateData($pageNo, $perPage, $field, $orderBy, $status, $type));
		
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
				  ->where('cv.column_id', '<>', 2)
				  ->find();
		if (empty($result)) {
			return $this->errSysJson("查找观点记录出错");
		}
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
		
		//是否已点过赞
		$model = new MHitRecord();
		$likeCount = $model->where('userId', $this->getUserId())->where('hitRecordType', 4)->where('targetId', $viewpointId)->count();
		$result['isLike'] = $likeCount > 0;
		
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

		//用户行为记录
		(new \app\wechat\model\BehaviorRecord)->record($user_id=$this->getUserId(),$type=5,$target_id=$viewpointId);
		
		return $this->sucSysJson($result);
	}
	
	/**
	 * V2.0.0之前的观点明细接口，已由getViewPointById代替
	 * 用户浏览观点明细专用接口
	 * 根据viewpointId获取观点明细和用户最近三条观点,不包含当前观点.
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function getViewPointAndRecommendById()
	{
		$request = $this->request;
		$viewpointId = $request->param('viewpointId/i');
		$isUserInfo = $request->param('isUserInfo', false);
		$isIndexRecommend = $request->param('isIndexRecommend/i', 0);//非首页推荐进入：0，首页推荐进入：1		
		$model = new MViewpoint();
		$result = $model->where('id', $viewpointId)->find();
		$result['price'] = (float)$result['price'];
		$result['original_price'] = (float)$result['original_price'];
		
		if ($result['level'] == 1) {
			$payOrderModel = new MPayOrder();
			$userData = $this->getSessionUserData();
			$user_id = $userData['user_id'];
			$type = 2;
			$result['isBuy'] = $payOrderModel->isBuy($user_id, $type, $viewpointId, $result['uid']);
		}
		
		//用户是否为该课程助教
		$UserAssistantModel = new UserAssistant();
		$is_assistant = $UserAssistantModel->checkUserManageTeacher($this->getUserId(), $result['uid']);
		$result['isAssistant'] = $is_assistant ? 1 : 2;
		
		//获取用户最近三条观点,不包含当前观点
		$field = null;
		$condition = [
				'uid'=>$result['uid'],
				'id'=>['<>', $viewpointId],
				'status'=>1
		];
		$recommendList = $model->where($condition)->order('id desc')->limit(3)->select();
		foreach ($recommendList as $recommend) {
			$content = $recommend['content'];
			$imageList = interceptHtmlImage($content);
			$recommend['imageList'] = isset($imageList[1]) ? $imageList[1] : [];
		}
		$result['recommendList'] = $recommendList;
		
		//浏览人数加1
		$model->where('id', $viewpointId)->setInc('study_num');
		
		//首页推荐进入，对应计数器加1
		if ($isIndexRecommend == 1) {
			$indexRecommendModel = new MIndexRecommend();
			$indexRecommendModel->where(['type'=>4, 'type_id'=>$viewpointId])->setInc('click_num');
		}
		
		if ($isUserInfo) {
			$model = new MUser();
			
			$userInfo = $model->where('user_id', $result['uid'])->field('head_add,alias,viewpoint_week_price')->find();
			$result['head_add'] = $userInfo['head_add'];
			$result['alias'] = $userInfo['alias'];
			$result['viewpointWeekPrice'] = (float)$userInfo['viewpoint_week_price'];
		}
		
		return $this->sucSysJson($result);
	}
	
	/**
	 * 根据viewpointId对观点记录中的好评数/有用数加1,当天已经记录过的无法再操作
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function setlikeNumIncById()
	{
		$request = $this->request;
		$viewpointId = $request->param('viewpointId/i');
		
		$model = new MHitRecord();
		$hitRecordResult = $model->addForViewpoint($viewpointId);
		if ($hitRecordResult['code'] == -1) {
			return $this->errSysJson($hitRecordResult['msg']);
		}elseif ($hitRecordResult['code'] == 0) {
			return $this->errSysJson($hitRecordResult['msg']);
		}elseif ($hitRecordResult['code'] == 1) {
			$model = new MViewpoint();
			$result = $model->where('id', $viewpointId)->setInc('like_num');
			if ($result) {
				return $this->sucSysJson("'有用'加1成功");
			}else {
				return $this->errSysJson("'有用'加1失败");
			}
		}
		
	}
	
	/**
	 * 根据viewpointId对观点记录中的分享数加1
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function setShareNumIncById()
	{
		$request = $this->request;
		$viewpointId = $request->param('viewpointId/i');
		
		$model = new MViewpoint();
		$result = $model->where('id', $viewpointId)->setInc('share_num');
		if ($result) {
			return $this->sucSysJson("'分享'加1成功");
		}else {
			return $this->errSysJson("'分享'加1失败");
		}
		
	}
	
	/**
	 * 根据条件获取观点记录,暂定于推荐页使用，具体规则未定。以后可能开放为万能方法
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function getViewPointList()
	{
		//支持的可选条件
		$conditionList = ['status', 'top_status', 'level', 'statusIn', 'column_id', 'excludeColumnId', 'excludeId'];
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
				}elseif ($param == 'excludeId') {
					$condition['id '] = ['not in', $request->param($param)];
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
	 * 设置观点置顶
	 * 1.如果该观点需要设为置顶，则查询已置顶的观点记录，如果存在已置顶记录且不为当前传入的观点ID，则改为不置顶
	 * 2.判断当前观点记录是否已置顶，是则直接返回，否则执行置顶操作
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function updateViewPointTopStatus()
	{
		$request = $this->request;
		
		$viewpointId = $request->param('viewpointId');
		$topStatus = $request->param('topStatus');
		$this->validateByName();
		
		$model = new MViewpoint();
		
		$isUpdate = true;
		$unTopList = [];
		
		//获取当前观点信息
		$viewpointInfo = $model->getViewpointById($viewpointId);
		$uid = $viewpointInfo['uid'];
		
		//如果该观点需要设为置顶，则查询已置顶的观点记录
		if ($topStatus == 1) {
			$field = 'id,top_status';
			$condition = [
					'uid'=>$uid,
					'top_status'=>1
			];
			$pageNo = 1;
			$perPage = 100;
			while (true) {
				$result = $model->getViewpointListByCondition($field, $condition, $pageNo, $perPage);
				foreach ($result as $viewpoint){
					if ($viewpoint['id'] == $viewpointId) {
						$isUpdate = false;
					}else {
						$unTopList[] = $viewpoint['id'];
					}
				}
				if (count($result) < $perPage) {
					break;
				}
				$pageNo++;
			}
			
			//如果存在已置顶记录且不为当前传入的观点ID，则改为不置顶
			if (!empty($unTopList)){
				$successCount = $model->setUnTopStatusBatch($unTopList);
				if ($successCount <= 0) {
					return $this->errSysJson("已置顶记录修改失败，请重试");
				}
			}
		}
		
		$successCount = 0;
		if ($isUpdate) {
			//执行置顶操作
			$successCount = $model->setTopStatusByViewpointId($viewpointId, $topStatus);
			if ($successCount > 0) {
				return $this->sucSysJson("置顶成功");
			}else {
				return $this->errSysJson("置顶失败");
			}
		}else {
			//当前观点记录已置顶，直接放回成功
			return $this->sucSysJson("记录已置顶");
		}
		
	}
	
	/**
	 * 修改观点状态
	 * 1.检查观点原来的状态，状态有误则报错
	 * 	1.1改为发布状态，原状态必须为草稿
	 * 	1.2改为删除状态，原状态必须为草稿或发布
	 * 	1.3改为其他状态均视为无效
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function setViewpointStatus()
	{
		$request = $this->request;
		$viewpointId = $request->param('viewpointId');
		$status = $request->param('status');
		$this->validateByName();
		
		$model = new MViewpoint();
		
		//查询观点原来的状态
		$viewpoint = $model->getViewpointById($viewpointId);
		$statusOld = null;
		if (isset($viewpoint['status'])) {
			$statusOld = $viewpoint['status'];
		}else {
			return $this->errSysJson("输入了无效的观点ID，请检查后重试");
		}
		
		//状态改为发布
		if($status == 1) {
			if ($statusOld != 0) {
				return $this->errSysJson("观点状态不为'草稿'，无法改为发布状态");
			}
		}elseif ($status == 2) {
			if ($statusOld != 0 && $statusOld != 1) {
				return $this->errSysJson("观点状态不为'草稿'或'发布'，无法改为删除状态");
			}
		}else {
			return $this->errSysJson("输入了无效的观点状态，请检查后重试");
		}
		
		$successCount = $model->setStatusByViewpointId($viewpointId, $status);
		if ($successCount > 0) {
			if ($status == 1) {
				$liveModel = new Live();
				$liveData = $liveModel->getDataByLiveIdAndUser('id', $viewpoint['uid']);
				$liveId = $liveData['id'];
				$this->createMessageRecordWithViewpoint([$viewpoint['uid']], $viewpoint['uid'], $liveId, $viewpointId, $viewpoint['title']);
			}
			return $this->sucSysJson("修改状态成功");
		}else {
			return $this->errSysJson("修改状态失败");
		}
		
	}
	
	/**
	 * 编辑观点
	 * 1.校验状态规则，以下规则合法，否则报错；0：草稿，1：发布，2：删除
	 * 	1.1  草稿改为草稿
	 * 	1.2 草稿改为发布/删除
	 * 	1.3 发布改为删除
	 * 2.校验是否收费及价格关系；0：免费，1：收费
	 * 	2.1 免费时，价格不填或为0
	 * 	2.2 收费时，价格不能小于1元
	 * 3.验证标签列表是否合法，必须为正整数的数组
	 * 4.更新观点（事务）
	 *  4.1 更新观点
	 *  4.2 处理观点标签关联
	 * 	 4.2.1 统计标签关联：已存在的观点标签关联，不再创建；统计需要删除的观点标签关联
	 * 	 4.2.2 删除、创建观点标签关联
	 * 5.放回结果
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function update()
	{
		$request = $this->request;
		$viewpointId = $request->post('viewpointId');
		$title = $request->post('title', '');
		$titleCate = $request->post('titleCate', '');
		$lead = $request->post('lead', '');
		$content = $request->post('content', '');
		$level = $request->post('level/i', 0);
		$price = $this->disPrice($request->post('price', 0), 0);
		$originalPrice = $this->disPrice($request->post('originalPrice', 0), 0);
		$cateList = $request->post('cateList/a', []);
		$status = $request->post('status/i');
		$columnId = $request->post('columnId/i', 0);
		$coverUrl = $request->post('coverUrl');
		$payContent = $request->post('payContent', '');
		$this->validateByName();
		
		$model = new MViewpoint();
		
		//查询观点原来的状态
		$viewpoint = $model->getViewpointById($viewpointId);
		$statusOld = $viewpoint['status'];
		
		//状态验证
		$errorMessage = "";
		switch ($status){
			case 0:
				if ($statusOld != 0) {
					$errorMessage = "观点状态无法改为'草稿'";
				}
				break;
			case 1:
				if ($statusOld != 0) {
					$errorMessage = "观点状态不为'草稿'，无法改为发布状态";
				}
				break;
			case 2:
				if ($statusOld != 0 && $statusOld != 1) {
					$errorMessage = "观点状态不为'草稿'或'发布'，无法改为删除状态";
				}
				break;
			default:
				$errorMessage = "你输入了无效的观点状态，请检查后重试";
		}
		if ($errorMessage != "") {
			return $this->errSysJson($errorMessage);
		}
		
		if ($level == 0 && !empty($price)){
			return $this->errSysJson('', '免费时金额不能填写');
		}elseif ($level == 1 && $price < 1){
			return $this->errSysJson('', '最小金额不能低于1元');
		}elseif ($originalPrice > 0 && $originalPrice <= $price){
			return $this->errSysJson('', '原价不能比优惠价低');
		}
		
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
		
		//更新记录
		$currentTime = date('Y-m-d H:i:s');
		$updateData = [
				'cover_qiniu_id'=>$qiniuId,
				'title'=>$title,
				'title_cate'=>$titleCate,
				'lead'=>$lead,
				'content'=>$content,
				'pay_content'=>$payContent,
				'level'=>$level,
				'price'=>(float)$price,
				'original_price'=>(float)$originalPrice,
				'status'=>$status,
				'update_time'=>$currentTime
		];
		if ($status == 1) {
			$updateData['publish_time'] = $currentTime;
		}
		
		$result = $model->updateViewpointForEdit($viewpointId, $updateData, $cateList, [$columnId]);
		if ($result) {
			if ($status == 1) {
				$liveModel = new Live();
				$liveData = $liveModel->getDataByLiveIdAndUser('id', $viewpoint['uid']);
				$liveId = $liveData['id'];
				$this->createMessageRecordWithViewpoint([$viewpoint['uid']], $viewpoint['uid'], $liveId, $viewpointId, $title);
			}
			return $this->sucSysJson("更新观点成功");
		}else {
			return $this->errSysJson("更新观点失败");
		}
		
	}
	
	/**
	 * 根据viewpointId获取关联标签列表并为存在关联的记录标记上selected=1
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function getViewpointCateByViewpointId()
	{
		$request = $this->request;
		$viewpointId = $request->param('viewpointId/i');
		$pageNo = $request->param('pageNo/i', 1);
		$perPage = $request->param('perPage/i', 20);
		$field = "id, name";
		$orderBy = "id desc";
		$status = 1;
		$type = 2;
		$result = array_values((new \app\common\model\LiveCate())->getFirstCateData($pageNo, $perPage, $field, $orderBy, $status, $type));
		
		$model = new MViewpointCate();
		$viewpointCateList = $model->getViewpointCateByViewpointId($viewpointId);
		$selectedCate = [];
		foreach ($viewpointCateList as $viewpointCate){
			$selectedCate[] = $viewpointCate['cate_id'];
		}
		foreach ($result as $key=>$cate){
			$cateId = $cate['id'];
			if (in_array($cateId, $selectedCate)) {
				$result[$key]['selected'] = 1;
			}else {
				$result[$key]['selected'] = 0;
			}
		}
		
		return $this->sucSysJson($result);
	}
	
	/**
	 * 发送观点到直播间/课程直播间
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function sendViewpointToLive()
	{
		$request = $this->request;
		$viewpointId = $request->param('viewpointId/i');
		$senderId = $request->param('senderId/i');
		$receiverType = $request->param('receiverType/i');
		$receiverId = $request->param('receiverId/i');
		$this->validateByName();

		$model = new MViewpoint();
		$viewpoint = $model->alias('v')->field('v.*, u.alias, u.head_add')->join('talk_user u', 'u.user_id = v.uid')->where('v.id', $viewpointId)->find();
		
		if (!empty($viewpoint)) {
			$admireRpcC = new AdmireRpc();
			$title = $viewpoint['title'];
			$userId = $viewpoint['uid'];
			$userName = $viewpoint['alias'];
			$headAdd = $viewpoint['head_add'];
			$lead = $viewpoint['lead'];
			$level = $viewpoint['level'];
			$price = $viewpoint['price'];
			
			if (empty($senderId)) {
				$senderId = $userId;
			}
			if ($userId != $senderId) {
				$userAssistantModel = new UserAssistant();
				$isAssistant = $userAssistantModel->checkUserManageTeacher($senderId, $userId);
				if (!$isAssistant) {
					return $this->errSysJson('发送人不为讲师的助教，无法发送');
				}
			}
			
			$groupId = null;
			if ($receiverType == 1) {
				//获取直播间id
				$LiveModel = new Live();
				$LiveBeUser = $LiveModel->where('user_id', $userId)->field('id')->find();
				if(!empty($LiveBeUser)){
					$receiverId = (int)$LiveBeUser['id'];
					$groupId = 1000000000 + $receiverId;
				}else{
					return $this->errSysJson('直播间不存在');
				}
			}elseif ($receiverType == 2) {
				$courseModel = new Course();
				$courseInfo = $courseModel->get($receiverId);
				if (empty($courseInfo)) {
					return $this->errSysJson('课程直播间不存在');
				}else {
					$groupId = $receiverId;
				}
			}
			
			//创建推送记录
			$model = new MRecommendLog();
			$recommendId = null;
			$recommendLog = [
					'user_id'=>$userId,
					'type'=>2,
					'target_id'=>$viewpointId,
					'sender_id'=>$senderId,
					'receiver_type'=>$receiverType,
					'receiver_id'=>$receiverId,
					'create_time'=>date('Y-m-d H:i:s')
			];
			$recommendId = $model->insertGetId($recommendLog);
			
			$isSuccess = $admireRpcC->sendViewpoint($groupId, $viewpointId, $title, $userName, $headAdd, $lead, $level, $price, $recommendId, $senderId);
			if ($isSuccess) {
				return $this->sucSysJson('发送成功');
			}else {
				return $this->errSysJson('发送失败');
			}
		}else {
			return $this->errSysJson('发送失败，无效的观点id');
		}
		
	}
	
	/**
	 * 查询直播间推荐过的观点
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function getViewpointRecommend()
	{
		$request = $this->request;
		$userId = $request->param('userId/i');
		$receiverType = $request->param('receiverType/i');
		$receiverId = $request->param('receiverId/i');
		$pageNo = $request->param('pageNo/i', 1);
		$perPage = $request->param('perPage/i', 20);
		$orderBy = $request->param('orderBy', 'id desc');
		$isImageInfo = $request->param('isImageInfo/b', false);
		$this->validateByName();
		
		$model = new \app\wechat\model\RecommendLog();
		$type = 2;
		$condition = null;
		$isUserInfo = true;
		$result = $model->getRecommendLogByType($userId, $receiverType, $receiverId, $type, $condition, $pageNo, $perPage, $orderBy, $isUserInfo);
		//处理图片信息截取
		if ($isImageInfo) {
			foreach ($result as $key=>$values) {
				$content = $values['content'];
				$imageList = interceptHtmlImage($content);
				$result[$key]['imageList'] = isset($imageList[1]) ? $imageList[1] : [];
			}
		}
		
		return $this->sucSysJson($result);
	}
	
	/**
	 * 获取课程和观点的置顶记录
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function getViewpointAndCourseTop()
	{
		$request = $this->request;
		$userId = $request->param('userId/i');
		
		$model = new MViewpoint();
		$field = [
				'uid'=>$userId,
				'status'=>1,
				'top_status'=>1
		];
		$viewpointTop = $model->where($field)->order('id desc')->find();
		
		$model = new \app\wechat\model\Course();
		$field = [
				'uid'=>$userId,
				'status'=>['in','1,4'],
				'top_sort'=>['>', 0]
		];
		$courseTop = $model->where($field)->order('id desc')->find();
		
		$data = [
				'viewpointTop'=>$viewpointTop,
				'courseTop'=>$courseTop
		];
		
		return $this->sucSysJson($data);
		
	}


    /**
     * 获取观点标题分类列表接口
     * @name  getTitleCateList
     * @param int $status 类别状态 1：有效；2：无效
     * @return \think\response\Json
     * @author Lizhijian
     */
    public function getTitleCateList($status = 1){

        if(!in_array($status, [1,2])){
            return $this->errorJson(JsonResult::ERR_PARAMETER);
        }

        $model = new LiveCate();
        $result = $model->getTitleCateList('id, name, status', $status);

        return $this->sucSysJson($result);
    }
    /**
     * 获取文字分享数跟文字点赞数
     * @return \think\response\Json
     */
    public function getShareNumAndLikeNum()
    {
        $model = new \app\wechat\model\Viewpoint();
        $id = trim(request()->param('id',''));
        if (empty($id))return $this->errSysJson('ID不能为空！');
        $result = $model -> where('id',$id)
            ->field('id,column_id,uid,share_num,virtual_share_num,like_num,virtual_like_num')
            ->find();
        if ($result){
            $data=[
                'id'=>$result['id'],
                'column_id' =>$result['column_id'],
                'uid'=>$result['uid'],
                'share_num'=>$result['share_num']+$result['virtual_share_num'],
                'like_num' =>$result['like_num']+$result['virtual_like_num'],
            ];
            return $this->sucSysJson($data);
        }else{
            return $this->errSysJson('该文章已失踪！');
        }
    }
}