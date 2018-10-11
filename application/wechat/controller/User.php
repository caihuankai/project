<?php

namespace app\wechat\controller;

use app\admin\model\AdminLive;
use app\admin\model\QiniuGallerys;
use app\admin\service\Redis;
use app\wechat\model\User as MUser;
use app\wechat\model\LiveCate as LiveCate;
use app\wechat\model\HitRecord;
use app\wechat\model\RcbLog;
use app\common\controller\JsonResult;

use Qiniu\Auth;
use Qiniu\Storage\BucketManager;
use Qiniu\Storage\UploadManager;
use think\Log;

class User extends App
{
    use \app\wechat\app\Token,
        \app\wechat\app\App,
        \app\wechat\app\SmallProgram,
        \app\wechat\traits\User,
        \app\wechat\traits\contentsData,
        \app\wechat\traits\Verify;
    
    protected $noLoginAction = [
        'registerUser',
        'registerUserApp',
        'registerUserByPhone', // 注册手机号
        'getRegisterUserVerifyCode', // 获取手机验证码
        'appPhoneLogin', // 手机登录
        'getUserPermissions',//获取权限
        'setGossip',//单独禁言
        'getGossip',//单独禁言
        'getUserLiveInfoByUserId',
    ];
    
    
    protected $noCheckUserDisStatusAction = [
        'appQuit', // 退出操作不需要检测用户是否被禁用
    ];
    
    
    protected $loginNoAjaxAction = [
    ];
    
    
    protected $filterKey = 'userId';
    
    
    /**
     * 个人中心
     *
     * @return \think\response\Json
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function index($flush = false)
    {

    	$userData = $this->getSessionUserData($flush);

        if (empty($userData) || empty($userData['user_id'])) {
            return $this->errSysJson(JsonResult::ERR_USER_NOT_EXISTS);
        }
        $check = AdminLive::where('user_id',$userData['user_id'])->find();
        $data = [
            'username' => $userData['alias'],
        	'isHasKeyWord' => !checkKeyWord($userData['alias']),//昵称是否含敏感词
            'img' => $userData['head_add'],
            'type' => $userData['user_level'],// 2为已创建直播间（老师），1为没有（学生）， 3为流量主
            'status' => 1,
            'liveId' => isset($userData['liveData']['id']) ? $userData['liveData']['id'] : 0,
            'user_id' => $userData['user_id'],
            'isAdmin' => !empty($check)?true:false,
            'isAssistant' => $userData['is_assistant'], // 是否是助教
        	'isVest' => $userData['user_type'] == 2 ? true : false,//是否是马甲
            'teacherPermissions' => isset($userData['teacherPermissions']) ? $userData['teacherPermissions'] : [], // 老师权限
            'isSubscribe' => isset($userData['register_time']) && $userData['register_time'] !== '0000-00-00 00:00:00', // 是否关注，没有保存是否关注的字段
            'vipLevel' => isset($userData['vip_level']) ? $userData['vip_level'] : 0,
            'flowUrl' => $userData['user_level'] == 3 ? \app\wechat\model\RedirectUrl::getFlowUserUrl($userData['user_id']) : '', // 流量主链接
        ];
        
        // status 1为正常， 2为直播间关闭， 3为直播间申请， 4为流量主申请
        if ($userData['user_level'] == 1){ // 学生身份，就查询是否审核
            $statusMap = [1, 4, 3];
            $data['status'] = getDataByKey($statusMap, (new \app\wechat\model\Apply())->checkUserApplyStatus($userData['user_id']), 1);
        }else if ($userData['user_level'] == 2 && isset($userData['liveData']['open_status']) && $userData['liveData']['open_status'] == 2){ // 直播间关闭
            $data['status'] =  2;
        }
        
        return $this->sucSysJson($data);
    }
    
    
    /**
     * 个人中心页做用户状态监测
     *
     * @return \think\response\Json
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function checkUserStatus()
    {
        $userId = $this->getUserId();
        $bool = $this->user->checkSessionUserStatus($userId, $this->ifAppRequest() ? 'app' : 'default');

        
        return $this->sucSysJson([
            'userStatus' => $bool,
        ]);
    }
    
    
    
    /**
     * 获用户数据统计
     *
     * @return mixed|\think\response\Json
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function getUserCount()
    {
        $userData = $this->getSessionUserData();
        $resultFunc = function ($data){
            if (\helper\TempData::instance()->get([__CLASS__, 'getUserCount'])) {
                return $data;
            }else{
                return $this->sucSysJson($data);
            }
        };
    
        
        if (empty($userData)) {
            return $this->errSysJson(JsonResult::ERR_USER_NOT_EXISTS);
        }
        if ($userData['user_level'] != 2){
            return $resultFunc([]);
        }
    
    
        $userId = $this->getUserId();
        $userIdArr = [$userId];
        
        
        // 课程数
        $courseNum = getDataByKey((new \app\wechat\model\Course())->getCourseNumByUserIds($userIdArr, 1, 0), $userId, 0);
        
        // 观点数
        $viewpointNum = getDataByKey((new \app\wechat\model\Viewpoint())->countByUserIds($userIdArr), $userId, 0);
        
        // 关注数
        // $fansNum = getDataByKey((new \app\common\model\Fans())->getFansNumByUserId($userIdArr), $userId, 0);
        $fansNum = (new \app\wechat\model\LiveFocus())->userFocusNum($userId);
        
        // 粉丝数
        $liveData = \helper\TempData::instance()->get([__CLASS__, 'liveData'], function ()use($userId){
            return (new \app\wechat\model\Live())->getLiveDataByUserId($userId, 'id, focus_num');
        });

        $liveId = isset($liveData['id']) ? $liveData['id'] : 0;
        $focus = (new \app\wechat\model\LiveFocus())->where('live_id', $liveId)->where('target', 1)->where('robot', 2)->count();

        return $resultFunc([
            'course' => $courseNum,
        	'viewpoint' => $viewpointNum,
            'focus' => $focus,
            'fans' => $fansNum,
        ]);
    }
    
    
    
    
    
    /**
     * 自动注册用户，微信code登录
     *
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function registerUser()
    {
        $returnAjax = $this->ifAppRequest();
        if (empty($this->request->get('code'))) {
            $msg = var_export([$this->request->get(), $this->request->post(), $this->request->server()], true);
            \think\Log::error(__METHOD__ . '出现缺少code情况' . $msg);
            
            if ($returnAjax){
                return $this->errSysJson('缺少code');
            }else{
                $this->redirect(\app\wechat\model\RedirectUrl::getIndexUrl());
            }
        }
    
        /**
            array(2) {
                ["code"] => string(32) "081Itk9g2mqIWC09a19g2iDf9g2Itk9K"
                ["state"] => string(32) "1a3c259f1843c11014fea3ed06110874"
            }
         */
//        dump($this->request->get());
    
        $app = $this->getWeChatClass();
    
        try{
            $userData = $app->weChatOAuthUser();
        }catch (\Exception $exception){
            \think\log::error('code拉取报错' . $exception->getMessage());
            return $this->errSysJson('code拉取报错');
        }
        
        $model = $this->user;
    
        /** @var \app\wechat\model\ThirdLogin $loginModel */
        $loginModel = model('ThirdLogin');
        $unionId = $userData->getOriginal()['unionid'];
        $mysqlUser = $loginModel->checkExistByWeChatUnionId($unionId, 'user_id, open_id, pc_open_id, union_id, login_tel');
        
        $userId = input('userId', 0);
        if (!empty($userId)) {
        	//app手机登录后绑定微信（跳转微信登录）
        	if (empty($mysqlUser)) {//为手机账号关联上微信账号信息
        		$userDetails = $app->getOauthUserData();
        		// 更新third_login表数据
        		$registerTime = isset($userDetails['subscribe_time']) ? $userDetails['subscribe_time'] : '';//可能没有关注过公众号
        		$loginModel->update([
        				'union_id'=> $userDetails['unionid'], 'open_id' => $userData->getId(), 'register_time' => $registerTime, 'alias' => $userDetails['nickname'],
        		], ['user_id' => $userId]);
        	}elseif ($userId != $mysqlUser['user_id']) {
        		return $this->errSysJson('微信账号已存在，无法绑定');
        	}
        }else {
     		//正常的微信登录
        	if (empty($mysqlUser)) { // 创建用户
        		$mysqlUser['user_id'] = $model->insertInWeChat(
        				$app->getOauthUserData(),
        				$this->ifWeChatBrowser() ? 'open_id' : 'pc_open_id'
        				);
        		$mysqlUser['union_id'] = $unionId;
        	}else if (empty($mysqlUser['open_id']) && $this->ifWeChatBrowser()){ // 更新open_id
        		$userDetails = $app->getOauthUserData();
        		
        		// 更新third_login表数据
        		$loginModel->update([
        				'open_id' => $userData->getId(), 'register_time' => $userDetails['subscribe_time'], 'alias' => $userDetails['nickname'],
        		], ['user_id' => $mysqlUser['user_id']]);
        	}else if (empty($mysqlUser['pc_open_id']) && !$this->ifWeChatBrowser()){ // 更新pc_open_id/pc_web_open_id
        		$loginModel->update(['pc_open_id'=> $userData->getId()], ['user_id' => $mysqlUser['user_id']]);
        	}
        }

        if ($returnAjax){ // 返回token
            $this->registerUserAppLoginSuccess(self::getAppToken($mysqlUser['union_id']), $mysqlUser['user_id'], $userData);
        }else{
            $this->registerUserSuccessFunc($mysqlUser['user_id'], $userData);
        }
        
        try{
        	$redirectKey = $app->redirectKey;
        	$redirectUrl = request()->param($redirectKey, ''); // 指定会跳地址
        	if (!empty($redirectUrl)) {
        		$synchroPage = request()->param('synchroPage', '');//指定登陆状态同步页面，该链接由运维配置到特定控制器
        		if (!empty($synchroPage)) {
        			$sessionId = base64_encode(session_id());
        			$redirectUrl = urlencode($redirectUrl);
        			$this->redirect($synchroPage. "?redirectUrl={$redirectUrl}&sessionId={$sessionId}");
        		}elseif ($this->ifWeChatBrowser()) {//微信浏览器访问，直接跳转
        			$this->redirect($redirectUrl);
        		}else {//跳转官网,同步登陆状态
	        		$sessionId = base64_encode(session_id());
	        		$redirectUrl = urlencode($redirectUrl);
	        		$this->redirect(config('WEB_DOMAIN') . "/index/index?redirectUrl={$redirectUrl}&sessionId={$sessionId}");
        		}
        	}else {//默认跳转公众号
        		$redirectUrl = $this->getRedirectUrl();
        		$this->redirect($redirectUrl);
        	}
        }catch (\Exception $exception){ // 访问api.weixin.qq.com偶尔会报错
            if ($exception instanceof \think\exception\HttpResponseException){ // 正确抛出 继续抛出
                throw $exception;
            }else{
                \think\log::error('访问api.weixin.qq.com偶尔会报错');
                $this->redirect($this->getRedirectUrl());
            }
        }
        
        return $this->errSysJson('未知错误');
    }
    
    
    /**
     * app登录成功后处理
     *
     * @param $token
     * @param $userId
     * @author aozhuochao
     */
    protected function registerUserAppLoginSuccess($token, $userId, $oAuthData = null)
    {
        /** @var \app\wechat\model\ThirdLogin $loginModel */
        $loginModel = model('ThirdLogin');
        // 更新token
        if (!empty($token)) {
            $this->initAppSessionId($token);
            
            $loginModel->update(['token' => $token], ['user_id' =>$userId]);
        }
    
        $this->registerUserSuccessFunc($userId, $oAuthData);
    
        \think\Log::record('APP登录成功，token值：' . $token, 'debug');
        abort($this->sucSysJson([
            'token' => $token,
        ]));
    }
    
    
    protected function registerUserSuccessFunc($userId, $oAuthData)
    {
        $model = $this->user;
        // 登录成功后更新字段
        $model->update(['last_login_time' => date('Y-m-d H:i:s')], ['user_id' => $userId]);
        
        if (!empty($oAuthData)) {
            \think\Session::set('weChat_user', $oAuthData);
        }
        
        $this->user->setCurrentSessionUserId($userId);
    
        $this->getSessionUserData(true); // 生成session的用户数据
    }
    
    /**
     * 修改当前用户头像
     *
     * @return \think\response\Json
     * @internal param $url
     * @internal param $name
     * @internal param $intro
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function saveUserData()
    {
        $url = $this->request->post('url', '');
        $name = $this->request->post('name', '');
        $contentsData = $this->request->post('contentsData/a', []);
        $userModel = $this->user;
        $currentUserData = $this->getSessionUserData();
        $userId = $this->getUserId();
        $headAdd = $currentUserData['head_add'];
        
        //检查昵称是否含敏感词
        if (!checkKeyWord($name)) {
        	JsonResult::setMsgArgs(JsonResult::ERR_HAS_KEYWORK, '昵称');
        	return $this->errSysJson(JsonResult::ERR_HAS_KEYWORK);
        }
        //检查介绍是否含敏感词
        if (!empty($contentsData['content']) && !checkKeyWord($contentsData['content'])) {
        	JsonResult::setMsgArgs(JsonResult::ERR_HAS_KEYWORK, '我的介绍');
        	return $this->errSysJson(JsonResult::ERR_HAS_KEYWORK);
        }
        //检查图片说明是否含敏感词
        if (isset($contentsData['imgData'])) {
        	foreach ($contentsData['imgData'] as $imgData) {
        		if (isset($imgData['explain']) && !checkKeyWord($imgData['explain'])) {
        			JsonResult::setMsgArgs(JsonResult::ERR_HAS_KEYWORK, '图片说明');
        			return $this->errSysJson(JsonResult::ERR_HAS_KEYWORK);
        		}
        	}
        }
        
        if ($currentUserData['alias'] !== (string)$name){ // 和当前不一致
            $result = $this->user->checkUserName($name);
            if ($result !== true) {
                return $this->errSysJson($result);
            }
            $userModel->data('alias', $name);
        }
        
        if ($url && $currentUserData['head_add'] != $url){ // 和当前不一致
            $headAdd = \Qiniu::instance()->getWeChatUserImg((string)$url);
            $headAdd = $this->user->disUserHead($headAdd);
            $userModel->data('head_add', $headAdd);
        }
        
        
        if ($this->getUserLevel() != 3){
            $this->contentsData($userModel, 'intro', $userId, 3);
        }
    
        $data = $userModel->getData();
        if (!empty($data)) {
            $userModel->update($data, ['user_id' => $userId]);
            
            // 通知c++服务端
            \CPlusPlusProtocol::instance()->callFunc('proc_reloadUserInfo', $userId);
        
            $userModel->handleSessionUserDataKeyMap($userId, true); // 只要改变状态都提示更新session
        }
        
        return $this->sucSysJson([
            'pic' => $headAdd,
        ]);
    }
    
    
    /**
     * 检测用户名
     *
     * @param $name
     * @return \think\response\Json
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function checkUserName($name)
    {
        $result = $this->user->checkUserName($name);
        if ($result !== true) {
            return $this->errSysJson($result);
        }else{
            return $this->sucSysJson(1);
        }
    }
    
    
    /**
     * 获取邀请（粉丝）列表
     *
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function getFansList()
    {
        $userId = $this->getUserId();
        $model = new \app\common\model\Fans();
        
        $result = [];
        $data = $model->lastKeyPage('f.id')->where(['invita_userid' => $userId])->alias('f')
            ->field('f.id, u.alias, u.head_add')
            ->join('third_login tl', 'tl.open_id = f.open_id')
            ->join('user u', 'u.user_id = tl.user_id')
            ->select();
    
        foreach ($data as $item) {
            $result[] = [
                'id' => $item['id'],
                'name' => $item['alias'],
                'pic' => $item['head_add'],
            ];
        }
        
        return $this->sucSysJson($result);
    }
    
    
    /**
     * 获取直播间关注人数
     *
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function getFocusList($isReal = false)
    {
        $model = new \app\wechat\model\LiveFocus();
        $liveData = $this->getLiveData();
    
        $result = [];
        if ($isReal) {//仅显示真实关注的人
        	$model->where('robot', 2);
        }
        $data = $model->lastKeyPage('lf.id')->where(['lf.live_id' => $liveData['id']])->where('target', 1)->alias('lf')
            ->field('lf.id, lf.robot, lf.name, u.alias, u.head_add')
            ->join('user u', 'u.user_id = lf.user_id', 'left')
            ->select();
        $userModel = $this->user;
    
        foreach ($data as $item) {
            $result[] = [
                'id' => $item['id'],
                'name' => $item['robot'] == 1 ? $item['name'] : $item['alias'],
                'pic' => $item['robot'] == 1? $model->handleRobotPic($item['name']): $userModel->disUserHead($item['head_add']),
            ];
        }
    
        return $this->sucSysJson($result);
    }
    
    
    /**
     * 显示用户管理的人数
     *
     * @return mixed
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function getUserManageCountList()
    {
        $userId = $this->getUserId();
    
        // 邀请人数数字
        // 用户管理是实时统计，用户首页是字段保存总数的
        $fansData = (new \app\common\model\Fans())->getFansNumByUserId([$userId]);
        $fansCount = !empty($fansData[$userId]) ? $fansData[$userId] : 0;
        
        // 直播间关注人数
        $model = new \app\wechat\model\LiveFocus();
        $liveData = $this->getLiveData('id', false);
        $focusCount = !empty($liveData['id']) ? $model->countFouce($liveData['id']): 0;
        
        //直播间真实关注人数
        $realFocusCount = $model->where('live_id', $liveData['id'])->where('target', 1)->where('robot', 2)->count();
        
        return $this->sucSysJson([
            'fansCount' => $fansCount,
            'focusCount' => $focusCount,
        	'realFocusCount' => $realFocusCount,
            'manageTeacherCount' => (new \app\wechat\model\UserAssistant())->countUserManageTeacher($userId),
        ]);
    }
    
    
    /**
     * 流量主邀请链接
     * 跳转到首页
     *
     * @param $userId
     * @return mixed
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function bindingFlowUser($userId)
    {
        $this->validateByName('common.userId');
        $currentUserId = $this->getUserId();
        if ($currentUserId != $userId){
            $this->user->updateInviteUserId($currentUserId, $userId);
        }
        
        return $this->sucSysJson(1);
    }
    
    
    /**
     * 获取助教下教师列表
     *
     * @internal int $page
     * @return \think\response\Json
     * @author aozhuochao
     */
    public function getManagerTeacherList()
    {
        $page = $this->request->get('page/i', 1);
        $userId = $this->getUserId();
        $data = (new \app\wechat\model\UserAssistant())->getUserManageTeacherList($userId, $page);
    
        $userData = $this->user->getUserColumn($data, 'head_add, alias, user_id');
    
        $result = [];
        foreach ($data as $teacherId) {
            if (isset($userData[$teacherId])) {
                $result[] = [
                    'user_id' => $teacherId,
                    'pic' => $this->user->disUserHead($userData[$teacherId]['head_add']),
                    'username' => $userData[$teacherId]['alias'],
                ];
            }
        }
        
        return $this->sucSysJson($result);
    }
    
    
    /**
     * 获取管理老师的权限列表
     *
     * @param $teacherId
     * @return \think\response\Json
     * @author aozhuochao
     */
    public function getManagerTeacherPermissions($teacherId)
    {

        $teacherId = intval($teacherId);
        $userId = $this->getUserId();

        if (empty($teacherId)) {
            return $this->errSysJson(\app\common\controller\JsonResult::ERR_PARAMETER);
        }

        if (!(new \app\wechat\model\UserAssistant())->checkUserManageTeacher($userId, $teacherId)) { // 无权限
            return $this->errSysJson(\app\common\controller\JsonResult::ERR_NOT_PERMISSIONS);
        }

        // 可以解绑后台屏蔽直播间
        $liveData = (new \app\wechat\model\Live())->getLiveDataByUserId($teacherId, 'id, open_status');

        $list = (new \app\wechat\model\UserPermissions())->getTeacherPermissions($teacherId);

        return $this->sucSysJson([
            'live'      => isset($liveData['open_status']) ? $liveData['open_status'] : 1,
            'course'    => isset($list[1]) ? $list[1] : 1,
            'viewpoint' => isset($list[2]) ? $list[2] : 1,
        ]);
    }
    
    
    /**
     * 助教设置老师的权限
     *
     * @param $teacherId
     * @param $type
     * @param int $status 1为开启，2为关闭
     * @return \think\response\Json
     * @author aozhuochao
     */
    public function setManagerTeacherPermissions($teacherId , $type, $status)
    {
        $teacherId = intval($teacherId);
        $status = intval($status);
        $typeArr = ['live', 'course', 'viewpoint'];
        $userId = $this->getUserId();

        if (empty($teacherId) || empty($type) || empty($status) || !in_array($type, $typeArr) || !in_array($status, [1, 2])) {
            return $this->errSysJson(\app\common\controller\JsonResult::ERR_PARAMETER);
        }

        if (!(new \app\wechat\model\UserAssistant())->checkUserManageTeacher($userId, $teacherId)) { // 无权限
            return $this->errSysJson(\app\common\controller\JsonResult::ERR_NOT_PERMISSIONS);
        }

        switch ($type){
            case 'live':
                $liveModel = new \app\wechat\model\Live();
                $liveIds = $liveModel->getLiveDataByUserIds((array)$teacherId, 'id', 0);
                !empty($liveIds) && $liveModel->closeStatus($liveIds, $status); // 保持和后台功能一致
                break;
            case 'course':
                (new \app\wechat\model\UserPermissions())->updateStatus($teacherId, 1, $status, $userId);
    
    
                // 通知c++服务端
                \think\Hook::add('response_end', function ()use($userId, $teacherId, $status){
                    \CPlusPlusProtocol::instance()->callFunc('proc_CloseLiveAndCourse', $userId, $teacherId, $status, 2);
                });
                break;
            case 'viewpoint':
                (new \app\wechat\model\UserPermissions())->updateStatus($teacherId, 2, $status, $userId);
                break;
        }
        
        return $this->sucSysJson(1);
    }
	
	/**
     * 获取用户中心全部信息
     *
     */
    public function getUserAllInfo(){
		$userData = $this->getSessionUserData();
		$user_id = $userData['user_id'];
		
		$m = new MUser();
		$rs = $m->getAllById($user_id);
		
        return $rs;
    }
	
    /**
     * 获取用户个人信息
     *
     */
    public function getUserInfo(){
		$m = new MUser();
		
		$userData = $this->getSessionUserData();
		$user_id = $userData['user_id'];
		
		$rs = $m->getInfoById($user_id);
		
        return $rs;
    }
	
	/**
     * 获取用户中心我的直播间信息
     *
     *
     */
    public function getUserLiveInfo(){
		$m = new MUser();
		
		$userData = $this->getSessionUserData();
		$user_id = $userData['user_id'];
		//$user_id = 1706743;
		
		$rs = $m->getLiveById($user_id);
		
        return $rs;
    }
	
	/**
     * 根据liveId获取用户中心我的直播间信息
     *
     */
    public function getUserLiveInfoByLiveId(){
		$liveId = input("live_id");
		
		$m = new MUser();
		
		$userData = $this->getSessionUserData();
		$userId = $userData['user_id'];
		
		$rs = $m->getLiveByLiveId($liveId,$userId);
		
        return json_encode($rs);
    }
	
    /**
     * 获取用户关注live直播间、栏目列表
     * @param  [type] $target 1-live直播间  2-栏目
     * @return [type]         [description]
     */
    public function getUserFocusList($target=1){
        if($target == 1){
            return $this->getUserFocusLiveInfo();
        }
        if($target == 2){
            return $this->getFocusColumnList();
        }
    }
	/**
     * 获取用户中心我关注的直播间列表
     * 我的关注
     *
     */
    public function getUserFocusLiveInfo(){
		
		$user_id = $this->getUserId();
        // $user_id = 1706743;   
    
        $focusModel = new \app\wechat\model\LiveFocus();
        
        $liveIds = $focusModel->where(['user_id' => $user_id])->where('target',1)->column('live_id');
        $result = [];
        
        if (empty($liveIds)){
            goto noData;
        }
    
        $liveModel = new \app\wechat\model\Live();
        $liveData = $liveModel->where(['l.id' => ['in', $liveIds]])->where('f.user_id',$user_id)->alias('l') // 不考虑空间被禁用
                        ->field('u.user_id, u.head_add, u.alias, l.id')
                        ->join('user u', 'u.user_id = l.user_id')
                        ->join('live_focus f','l.id = f.live_id')
                        ->order('f.create_time','desc')
                        ->select();
        if (empty($liveData)) goto noData;
    
        $userIds = $liveIds = [];
        foreach ($liveData as $item) {
            $userIds[] = $item['user_id'];
            $liveIds[] = $item['id'];
        }
    
        // 课程数据
        $courseData = (new \app\wechat\model\Course())->getNewCourseByLiveIds($liveIds, 'c.live_id, c.id, c.class_name, c.create_time');
        // 观点数据
        $viewpointData = (new \app\wechat\model\Viewpoint())->getNewViewpointByUserIds($userIds, 'v.uid, v.title, v.id, v.create_time');
    
        foreach ($liveData as $liveDatum) {
            $courseTime = !empty($courseData[$liveDatum['id']])?$courseData[$liveDatum['id']]['create_time']:'00-00-00 00:00:00';
            $viewpointTime = !empty($viewpointData[$liveDatum['user_id']])?$viewpointData[$liveDatum['user_id']]['create_time']:'00-00-00 00:00:00';
            if ($courseTime < $viewpointTime){
                $title = $viewpointData[$liveDatum['user_id']]['title'];
            }else{
                $title = !empty($courseData[$liveDatum['id']]) ? $courseData[$liveDatum['id']]['class_name'] : '';
            }
            
            $result[] = [
            	'liveId'=>$liveDatum['id'],
                'pic' => $liveDatum['head_add'],
                'userId' => $liveDatum['user_id'],
                'name' => $liveDatum['alias'],
                'title' => $title,
            ];
        }
		
        
        noData:;
        return $this->sucSysJson($result);
    }

    public function getFocusColumnList(){
        $user_id = $this->getUserId();
        // $user_id = 1706743;
        $focusModel = new \app\wechat\model\LiveFocus();
        $dataList = $focusModel->userFocusColumnList($user_id);
        return $this->sucSysJson($dataList);
    }
	
	/**
     * 获取用户中心课程购买记录信息
     *
     */
    public function getUserOrderInfo(){
		$m = new MUser();
		$user_id = $this->getUserId();
		
		$rs = $m->getOrderById($user_id);
        return $rs;
    }
	
	/**
     * 添加点击
     */
    public function addHitRecord(){
		$m = new HitRecord();
		$rs = $m->add();
        return $rs;
    }
	
	/**
	 * 点击的课程列表
	 */
	public function listCourseQuery(){
		$m = new HitRecord();
		$rs = $m->listCourseQuery();
        return WReturn("成功",1,$rs);
	}
	
	/**
     * 获取直播间分类
     *
     */
    public function getLiveCate(){
		$m = new LiveCate();
		$rs = $m->getChild();
        return $rs;
    }
    
    
    /**
     * 获取用户介绍页顶部数据
     *
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function getUserLiveInfoByUserId($userId)
    {
        $userId = intval($userId);
        $userData = $this->user->getInfoById($userId, 'user_id, head_add, alias, intro, freeze, introduction_code_id,lobby_img,introduction_img_id');
        if (empty($userData)) {
            return $this->errSysJson(\app\common\controller\JsonResult::ERR_USER_NOT_EXISTS);
        }
        
        $liveData = (new \app\wechat\model\Live())->getDataByLiveIdAndUser('id,password,adapt, (focus_num + virtual_focus_num) as focus_num, popular, open_status, theme', $userData['user_id']);
        $liveData = !empty($liveData) ? $liveData : [];
        $liveId = getDataByKey($liveData, 'id', 0);
        //当前用户是否关注空间
        $ifFocus = (new \app\wechat\model\LiveFocus())->isFocus($liveId, $this->getUserId());
        //当前用户是否为助教
        $is_assistant = (new \app\wechat\model\UserAssistant())->checkUserManageTeacher($this->getUserId(),$userId);

        //判断该直播间是否设置密码以及适用平台
        $adapt = isset($liveData['adapt']) && !empty($liveData['adapt']) ? json_decode($liveData['adapt'],true):['weixin'=>false,'applet'=>false,'mobile'=>false];
        $currentID = $this->getUserId();//当前用户ID

        //判断用户是否输入过密码
        if (!empty($currentID)&&(isset($liveData['password'])&& !empty($liveData['password']))){
            $val = base64_encode($liveId.'-'.$currentID.'-'.$liveData['password']);
            $currentData = Redis::hashGet('LiveCheckPass',$val);
            //判断用户是否购买过该讲师的课程
            $courseModel = new \app\wechat\model\Course();
            $where = [
                'p.state'=>['in',[1,3]],
                'p.type'=>1,
                'c.uid'=>$userId,
                'c.type'=>2,
                'p.user_id'=>$currentID,
            ];
            $isBuy = $courseModel->where($where)->alias('c')
                ->join('talk_pay_order p','p.class_id = c.id')
                ->select();
            //用户是当前讲师或者已经购买过当前讲师课程又或者已经输入过密码的话不用再输入密码
            if (!empty($currentData) || ($currentID == $userId) || !empty($isBuy))
            {
                $adapt = ['weixin'=>false,'applet'=>false,'mobile'=>false];
            }
        }

        //用户行为记录
        (new \app\wechat\model\BehaviorRecord)->record($user_id=$this->getUserId(),$type=13,$target_id=$liveId);

        return $this->sucSysJson([
            'userId' => $userData['user_id'],
            'theme' => getDataByKey($liveData, 'theme', 0),
            'freeze' => $userData['freeze'], // 用户状态
            'liveId' => $liveId,
            'pic' => $userData['head_add'],
            'username' => $userData['alias'],
            'ifFocus' => $ifFocus,
            'adapt' =>$adapt,//需要验证的适用平台（true：需要，false：不需要）
            'focusNum' => getDataByKey($liveData, 'focus_num', 0), // 关注数
            'popular' => getDataByKey($liveData, 'popular', 0), // 人气值
            'liveStatus' => getDataByKey($liveData, 'open_status', 0), // 直播间状态
            'content' => $userData['intro'], // 用户介绍
            'imgList' => (new \app\common\model\LiveImg())->getImgList($userData['user_id'], 3),
            'isAssistant' => $is_assistant ? 1 : 2,//是否为助教 1是 2否
            'introductionUrl' => (new \app\wechat\model\QiniuGallerys())->getVideoData($userData['introduction_code_id']), // 介绍视频
            'introductionImgUrl'=>(new QiniuGallerys())->getQiNiuUrl($userData['introduction_img_id']),//介绍视频封面
            'lobby_img' => $userData['lobby_img'],//介绍页封面图
        ]);
    }
    
    

	
    /**
     * 获取验证码
     *
     * @param int $type @see \app\wechat\traits\Verify::$verifyTypeMap
     * @return mixed
     */
    public function getPhoneVerifyCode($type = 1){
        $type = intval($type);
        if (!$this->disVerifyTypeKey($type)) { // 检测type
            return $this->errSysJson(\app\common\controller\JsonResult::ERR_PARAMETER);
        }
        
        $this->filterRepeatPost([$this->filterKey === 'userId' ? $this->getUserId() : $this->filterKey, $type], 59);
        // 验证次数
        \think\Hook::listen('check_apiSucJson_getPhoneVerifyCode', $this); //保持代码统一
        
        // $userPhone = input("post.userPhone");
		$userPhone = input("userPhone");
        if(!WIsPhone($userPhone)){
            return $this->errSysJson(\app\common\controller\JsonResult::ERR_PHONE);
			// echo "手机号格式不正确!";
            // exit();
        }


        
        $phoneVerify = mt_rand(100000,999999);
        $msg = "【大策略】你的动态验证码是{$phoneVerify}.切勿告诉他人！若非本人操作请忽略。";
        
        
		$result = WSendSMS($userPhone,$msg);

        /* if($rv['status']==1){
            session('VerifyCode_userPhone',$phoneVerify);
            session('VerifyCode_userPhone_Time',time());
        }
        return $rv; */
		
		if(!is_null(json_decode($result))){
			$output=json_decode($result,true);
			if(isset($output['code'])  && $output['code']=='0'){
				session($this->getVerifyTypeKey($type, $userPhone), $phoneVerify);
                session($this->getVerifyTypeTimeKey($type, $userPhone), time());
                
				return $this->sucSysJson('短信发送成功！');
			}else{
			    return $this->errSysJson($output['errorMsg']);
			}
		}else{ // 字符串报错信息
		    \think\Log::error([__FUNCTION__, $result]);
		    
			return $this->errSysJson('发送失败');
		}
    }
    
    
	/**
     * 云存储下的所有图片
     * @return mixed
     */
    public function picList()
    {
        //require_once APP_PATH . '/../vendor/autoload.php';



        $auth = \Qiniu::instance()->getAuth();
        $bucketMgr = new BucketManager($auth);

        // 要列取的空间名称
		$bucket = \Qiniu::instance()->getBucket();
        // 要列取文件的公共前缀
        $prefix = '';
        // 上次列举返回的位置标记，作为本次列举的起点信息。
        $marker = '';
        // 本次列举的条目数
        //$limit = 3;

        // 列举文件
        $list = $bucketMgr->listFiles($bucket, $prefix, $marker);
        $list = array_filter($list);
		
		print_r($list);exit();

        // $this->assign([
            // 'list' => $list
        // ]);

        // return $this->fetch();
    }
	
	//处理上传的主方法
    public function upload()
    {
    	$file = request()->file('fileList');

        require_once APP_PATH . '/../vendor/vendor/autoload.php';


        // 构建鉴权对象
        $auth = \Qiniu::instance()->getAuth();

        // 要上传的空间
        //$bucket = config('BUCKET');
		// $bucket = 'magicyork';
		$bucket = \Qiniu::instance()->getBucket();

        // 生成上传 Token
        $token = $auth->uploadToken($bucket);

        // 要上传文件的本地路径
        $filePath = $file->getRealPath();

        $ext = pathinfo($file->getInfo('name'), PATHINFO_EXTENSION);  //后缀
     
        // 上传到七牛后保存的文件名
        $key = substr(md5($file->getRealPath()) , 0, 5). date('YmdHis') . rand(0, 9999) . '.' . $ext;

        // 初始化 UploadManager 对象并进行文件的上传
        $uploadMgr = new UploadManager();

        // 调用 UploadManager 的 putFile 方法进行文件的上传
        list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
        if ($err !== null) {
            var_dump($err);
        } else {
            echo $bucket . '/' . $key;
        }
    }
	
    protected function getRedirectUrl()
    {
        $url = \think\Session::get('registerUserRedirectUrl');
        if (empty($url)) {
            $url = '/#/index/0';
        }
        
        return $url;
    }
    
    /**
     * 获取当前用户礼点余额
     *
     * @param int $format 2为对象格式
     * @return \think\response\Json
     * @author liujuneng
     */
    public function getAccountBalance($format = 1)
    {
    	$model = new MUser();
    	$userData = $this->getSessionUserData();
    	$logModel = new \app\wechat\model\RcbLog();
    	$userId = $userData['user_id'];
    	
    	$field = 'account_balance, inpour_total, vip_level';
    	$result = $model->getInfoById($userId, $field);
        if (empty($result)) { // 不存在的用户
            return $this->errSysJson(\app\common\controller\JsonResult::ERR_USERINFO_NULL);
        }
    	
    	$accountBalance = isset($result['account_balance']) ? (float)$result['account_balance'] : 0;
    	
    	if ($format == 2){
    	    $result = [
    	        'diffNum' => $userData['user_type'] == 2 ? 0 : (float)$logModel->diffLevelNum($result['inpour_total']), // 还差多少，马甲不显示分差
                'nextVipLevel' => $logModel->getNextKeyByKey($result['vip_level']), // 下一等级，根据这个判断
    	        'currentVipLevel' => $result['vip_level'], // 当前等级
    	        'balance' => $accountBalance, // 可以消费的总金额，账户余额
            ];
        }else{
    	    $result = $accountBalance;
        }
    	
    	return $this->sucSysJson($result);
    }
    
    /**
     * 获取用户礼点变动明细
     * @return \think\response\Json
     * @author liujuneng
     */
    public function getRcbLogInpour()
    {
    	$orderTypeList = [
    			'11'=>'兑换课程',
    			'12'=>'兑换系列课',
    			'2'=>'兑换观点',
    			'3'=>'Live直播送礼',
    			'4'=>'充值',
    			'51'=>'发 口令红包',//实际没有该值，对应5：红包
    			'52'=>'收 口令红包',//实际没有该值，对应5：红包
    			'53'=>'退 口令红包',//实际没有该值，对应5：红包
    			'6'=>'课程直播打赏',
    			'7'=>'兑换观点包周',
//     			'8'=>'公共直播间送礼'//暂不显示
    	];
    	$userData = $this->getSessionUserData();
    	$userId = $userData['user_id'];
    	
    	$request = $this->request;
    	$orderType = $request->param('orderType/i', 0);
    	$pageNo = $request->param('pageNo/i', 1);
    	$perPage = $request->param('perPage/i', 10);
    	$orderBy = $request->param('orderBy', 'rl.id desc');
    	
    	$model = new RcbLog();
    	$rcbLogList = $model->getRcbLogInpourWithPayOrder($userId, $orderType, $pageNo, $perPage, $orderBy);
    	foreach ($rcbLogList as $key=>$rcbLog) {
    		//红包类型的话要加上额外信息显示
    		$showInfo = '';
    		if (isset($rcbLog['redpacket_type'])) {
    			$type = $rcbLog['type'];
    			$redpacketType = $rcbLog['redpacket_type'];
    			if ($type == 'readpacket_send') {
    				$showInfo .= '发 口令红包';
    			}elseif ($type == 'readpacket_get') {
    				$showInfo .= '收 口令红包';
    			}elseif ($type == 'readpacket_back') {
    				$showInfo .= '退 口令红包';
    			}
    			if (in_array($redpacketType, [5,9])) {
    				$showInfo .= '-随机金额';
    			}elseif (in_array($redpacketType, [6,10])) {
    				$showInfo .= '-固定金额';
    			}
    		}elseif ($rcbLog['order_type'] == 1) {
    			$showInfo = $orderTypeList['11'];
    			if (isset($rcbLog['course_type']) && $rcbLog['course_type'] == 2) {
    				$showInfo = $orderTypeList['12'];
    			}
    		}elseif (isset($orderTypeList[$rcbLog['order_type']])) {
    			$showInfo = $orderTypeList[$rcbLog['order_type']];
    		}else {
    			$showInfo = '其他';
    		}
    		$rcbLog['available_amount'] = (float)$rcbLog['available_amount'];
    		$rcbLog['freeze_amount'] = (float)$rcbLog['freeze_amount'];
    		$rcbLogList[$key]['order_type'] = $showInfo;
    	}
    	
    	return $this->sucSysJson($rcbLogList);
    }

    /**
     * 查询讲师助教的二维码图片地址
     * 上传的二维码图片保存在七牛服务器，对应talk_qiniu_gallerys.qiniuImg，如果该讲师没有助教二维码则返回默认的二维码图片
     * @param number $userId
     * @return \think\response\Json
     * @author liujuneng
     */
    public function getUserAssistantQrCode($userId = 0)
    {
    	if (empty($userId)) {
    		return $this->errSysJson(JsonResult::ERR_PARAMETER);
    	}
    	
    	$userModel = new MUser();
    	$result = $userModel->getUserAssistantQrCode($userId);
    	$assistantCodeId = $result['assistant_code_id'];
    	$assistantQrCode = null;
    	if (empty($assistantCodeId)) {
    		$assistantQrCode = config('WX_DOMAIN') . config('ASSISTANT_QRCODE');
    	}else {
    		$assistantQrCode = (new \app\admin\model\QiniuGallerys())->getQiNiuUrl($assistantCodeId);
    	}
    	
    	return $this->sucSysJson($assistantQrCode);
    }

    /**
     * 设置禁言状态接口
     * @name  setGossip
     * @param $userId
     * @param $teacherId
     * @return \think\response\Json
     * @author Lizhijian
     */
    public function setGossip($userId, $teacherId)
    {
        $res = \app\admin\service\Redis::hashGet("room_user_setting:leave:$teacherId:$userId", 'forbitchat', 0);
        if (!$res) {//禁言
            \app\admin\service\Redis::hashSet("room_user_setting:leave:$teacherId:$userId", 'forbitchat', 1, 0, 60*60*24);
            $msg = '禁言成功！';
        } else {
            \app\admin\service\Redis::hashSet("room_user_setting:leave:$teacherId:$userId", 'forbitchat', 0, 0, 60*60*24);
            $msg = '解除成功！';
        }
        \app\admin\service\Redis::hashSet("room_user_setting:leave:$teacherId:$userId", 'datetime', time(), 0);
        return $this->sucSysJson(1, $msg);
    }

    /**
     * 获取禁言状态接口
     * @name  getGossip
     * @param $userId
     * @param $teacherId
     * @return \think\response\Json
     * @author Lizhijian
     */
    public function getGossip($userId, $teacherId)
    {
        $res = \app\admin\service\Redis::hashGet("room_user_setting:leave:$teacherId:$userId", 'forbitchat', 0);
        return $this->sucSysJson(1, $res);
    }
}

