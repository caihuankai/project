<?php

namespace app\web\model;

use think\Db;
use app\wechat\model\Column as ColumnM;

class User extends \app\common\model\User
{
    
    protected $weChatGenderMap = [
        1 => 1, // 男性
        2 => 0, // 女性
        0 => 3, // 未知
    ];
    
    
    
    protected $currentSessionUserIdKey = 'currentSessionUserIdKey';
    
    
    /**
     * 在session中获取当前用户id
     * 目前只维护了app手机号登录
     *
     * @return int
     * @author aozhuochao
     */
    public function getCurrentSessionUserId()
    {
        return intval(\think\Session::get($this->currentSessionUserIdKey));
    }
    
    
    public function setCurrentSessionUserId($userId)
    {
        \think\Session::set($this->currentSessionUserIdKey, intval($userId));
    }
    

    
    
    /**
     * 获取session的用户数据
     *
     * @param int|false $flush  true为强制刷新
     * @return array|false|mixed|\PDOStatement|string|\think\Model
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function getSessionUserData(callable $whereFunc = null, $flush = false)
    {
        $key = $this->getSessionUserDataKey(0);
        $userData = \think\Session::get($key);
        $sessionCache = 1; // 是否为cache获取
        recursion:;
        
    
        if (empty($userData) || $flush) {
            $field = 'u.user_id, u.alias, u.user_level, u.user_type, u.gender, u.head_add, u.freeze, u.invite_user_id, u.is_assistant,
                u.vip_level,
                tl.alias TlAlias, tl.open_id, tl.login_tel, tl.register_time';
            
            // $whereFunc必须立刻调用，否则会出现无法写入session的情况
            $userData = $this->where(call_user_func($whereFunc))->alias('u')->join('third_login tl', "tl.user_id = u.user_id")->field($field)->find();
            if (isset($userData['head_add'])) {
                $userData['head_add'] = $this->disUserHead($userData['head_add']);
            }
            
            if (isset($userData['user_level']) && $userData['user_level'] == 2){ // 老师，获取user_permissions
                $liveCacheField = 'id, open_status';
                /** @var \app\wechat\model\Live $liveModel */
                $liveModel = model('live');
                $liveData = $liveModel->getLiveDataByUserIdOfCache($userData['user_id'], $liveCacheField);
                $userData['liveData'] = $liveData;
                
                
                /** @var \app\wechat\model\UserPermissions $permissionModel */
                $permissionModel = model('userPermissions');
                $userData['teacherPermissions'] = $permissionModel->getTeacherAllPermission($userData['user_id'], $liveCacheField);
            }else{
                $userData['liveData'] = $userData['teacherPermissions'] = [];
            }
            
            // 用户绑定手机号的类型
            /** @var \app\wechat\model\UserPhone $userPhoneModel */
            $userPhoneModel = model('userPhone');
            $userData['phoneTypeList'] = $userPhoneModel->where(['user_id' => $userData['user_id']])->column('type');
    
    
            $this->setCurrentSessionUserId($userData['user_id']);
            \think\Session::set($key, $userData);
            $sessionCache = 0;
        }else if (isset($userData['user_id']) && $this->checkSessionUserStatus($userData['user_id'])){ // 存在更新状态
            $flush = true;
            goto recursion;
        }
        
        $userData['sessionCache'] = $sessionCache;
        
        return $userData;
    }
    
    
    /**
     * 处理微信授权获取到的数据到数据库间的映射关系
     *
     * @param array|object $data
     * @return array
     * @author aozhuochao
     */
    public function handleWeChatUserData($data)
    {
        $saveData = [];
        if (empty($data)) {
            return [];
        }
        
        $saveData['gender'] = $this->weChatMap(isset($data['sex']) ? $data['sex'] : 0, $this->weChatGenderMap, 3);
    
        if (!empty($data['nickname'])) {
            $saveData['name'] = $saveData['alias'] = $data['nickname'];
        }
    
        if (!empty($data['headimgurl'])) {
            $saveData['head_add'] = $data['headimgurl'];
        }
        
        return $saveData;
    }

    
    
    
    /**
     *

    object(EasyWeChat\Support\Collection)#175 (1) {
        ["items":protected] => array(13) {
            ["subscribe"] => int(1)
            ["openid"] => string(28) "oASvRwTBpRy1hpcfKC-wfGsbuAGs"
            ["nickname"] => string(24) "名字"
            ["sex"] => int(1)
            ["language"] => string(5) "zh_CN"
            ["city"] => string(6) "广州"
            ["province"] => string(6) "广东"
            ["country"] => string(6) "中国"
            ["headimgurl"] => string(129) "http://wx.qlogo.cn/mmopen/eVKreJDXibZlFrKqu0ATrsbA3V639nzVGkPJhmpukrHDnibBO7dOOuN0WzRYniaU4wXGf7ichts6harDvVnia16PYZLgxVcedJ6rn/0"
            ["subscribe_time"] => int(1495178459)
            ["remark"] => string(0) ""
            ["groupid"] => int(0)
            ["tagid_list"] => array(0) {
            }
        }
    }

     *
     * @param array  $data
     * @param string $openKey 指定插入open_id或者pc_open_id
     * @return bool|int|string
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function insertInWeChat(array $data, $openKey = '')
    {
        $saveData = $this->handleWeChatUserData($data);
    
        if (!empty($data['password'])) {
            $saveData['password'] = $data['password'];
        }
        
        $userId = $this->insertGetId($saveData);
    
        if (empty($data['nickname'])) { // 获取不到微信用户数据，就给默认昵称和头像
            $saveData['name'] = $saveData['alias'] = "dacelue_{$userId}";
            $saveData['head_add'] = $this->disUserHead('');
            $this->update($saveData, ['user_id' => $userId]);
        }
        
    
        // talk_user_addr
        if (!empty($data['country']) || !empty($data['province']) || !empty($data['city'])) { // 地址
            $userAddrModel = new \app\common\model\UserAddr();
            $userAddrModel->insert([
                'user_id' => $userId,
                'country' => $data['country'],
                'province' => $data['province'],
                'city' => $data['city'],
                'merger_name' => join('-', [$data['country'], $data['province'], $data['city']]),
            ]);
        }
    
        // talk_third_login表
        $thirdData = [
            'user_id' => $userId,
            'type' => 3,
        ];
        if (!empty($data['openid']) && !empty($openKey)) { // 指定插入字段
            $thirdData[$openKey] = $data['openid'];
        }
        if (!empty($data['unionid'])) {
            $thirdData['union_id'] = $data['unionid'];
        }else if (!empty($data['loginTel'])) { // 需要额外的判断手机号是否存在
            $thirdData['login_tel'] = $data['loginTel'];
            $thirdData['type'] = 4;
        }else{ // 不插入
            return $userId;
        }
        
        if (!empty($data['nickname'])) {
            $thirdData['alias'] = $data['nickname'];
        }
        if (!empty($data['subscribe_time'])) {
            $thirdData['register_time'] = date('Y-m-d H:i:s', $data['subscribe_time']);
        }
        
        
    
        /** @var \app\wechat\model\ThirdLogin $model */
        $model = model('wechat/ThirdLogin');
        $model->updateInWeChat($thirdData);
        
        return $userId;
    }
    
    
    /**
     * 检测用户名
     *
     * @param $name
     * @return bool|string
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function checkUserName($name)
    {
        $validate = new \think\Validate([
            'name'  => 'chsDash',
        ]);
        if (empty($name) || mb_strlen($name) > 10) {
            return '名字不能超过10个字';
        }else if (!$validate->check(['name' => $name])){
            return '名字只能是汉字、字母、数字和下划线_及破折号-';
        }else if ($this->where(['alias' => ['eq', $name]])->field('user_id')->find()) {
            return '昵称重复，请重新输入';
        }
        
        return true;
    }
    
    
    protected function weChatMap($data, array $map, $default)
    {
        return array_key_exists($data, $map) ? $map[$data] : $default;
    }
    
    

    
    /**
     * 更新邀请人id
     *
     * @param $currentUserId
     * @param $inviteUserId
     * @return bool
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function updateInviteUserId($currentUserId, $inviteUserId)
    {
        $currentUserId = intval($currentUserId);
        $inviteUserId = intval($inviteUserId);
        $currentUserData = getDataByKey($this->getUserDataJoinOpenId((array)$currentUserId, 'u.user_id, u.user_level, u.invite_user_id, tl.open_id'), $currentUserId, []);
        $inviteUserData = getDataByKey($this->getUserColumn((array)$inviteUserId, 'user_id, user_level, invite_user_id'), $inviteUserId, []);
        
        if (!empty($currentUserData['invite_user_id']) || empty($inviteUserData) || $inviteUserData['user_level'] != 3){
            return false;
        }
        
        
        try{
            $this->startTrans();
            $result = $this->save(
                ['invite_user_id' => (int)$inviteUserId],
                ['user_id' => ['eq', (int)$currentUserId], 'invite_user_id' => 0] // 没有绑定才更新
            );
    
            if ($result){ // 更新成功
                /** @var \app\common\model\Fans $fansModel */
                $fansModel = model('common/Fans');
                if (!empty($currentUserData['open_id'])) {
                    $fansModel->where(['open_id' => $currentUserData['open_id']])->delete();
                    $fansModel->insert([
                        'open_id' => $currentUserData['open_id'],
                        'invita_userid' => $inviteUserId,
                    ]);
                }
            }
            $this->commit();
        }catch (\Exception $exception){
            \think\log::error('后台更新邀请人报错');
            $this->rollback();
        }
        
        return true;
    }
    
    
    
    /**
     *  获取用户中心我的个人信息
     */
    public function getInfoById($id, $field = true){
        $id = intval($id);
        if (empty($id)) {
            return [];
        }
        
        return $this->where(['user_id' => $id])->field($field)->find();
    }
    
    
	
   /**
    *  获取用户全部信息
    */
    public function getAllById($id){
    	$rs = $this->get(['user_id'=>(int)$id]);
		
		//我的直播间数据
		$rs['live'] = Db::connect('bs_db_config')->query('SELECT
			talk_live.cid,
			talk_live.`name`,
			talk_live.content,
			talk_live.img,
			talk_live.background_img,
			talk_live.original_img,
			talk_live.invitation_card_id,
			talk_live.mobile_phone,
			talk_live.create_time,
			talk_live.`status`,
			talk_live.open_status,
			talk_live.focus_num,
			talk_live.user_id,
			talk_live.id
			FROM
			talk_live
			WHERE
			talk_live.user_id = ?',[$id]);
			
		//我关注的直播间数据
		$rs['focusLive'] = Db::connect('bs_db_config')->query('SELECT
			talk_live_focus.live_id,
			talk_live.id,
			talk_live.cid,
			talk_live.`name`,
			talk_live.content,
			talk_live.img,
			talk_live.background_img,
			talk_live.original_img,
			talk_live.invitation_card_id,
			talk_live.mobile_phone,
			talk_live.create_time,
			talk_live.`status`,
			talk_live.open_status,
			talk_live.focus_num
			FROM
			talk_live_focus
			INNER JOIN talk_live ON talk_live_focus.live_id = talk_live.id
			WHERE
			talk_live_focus.user_id = ?',[$id]);
			
		//购买记录（包括订单信息和所购课程信息）数据
		$rs['order'] = Db::connect('bs_db_config')->query('SELECT
			talk_pay_order.vip_id,
			talk_pay_order.order_no,
			talk_pay_order.third_order_no,
			talk_pay_order.pay_type,
			talk_pay_order.client_type,
			talk_pay_order.amount,
			talk_pay_order.total_fee,
			talk_pay_order.create_time,
			talk_pay_order.pay_time,
			talk_pay_order.state,
			talk_pay_order.client_ip,
			talk_pay_order.third_ip,
			talk_pay_order.subscribe_id,
			talk_pay_order.class_id,
			talk_course.uid,
			talk_course.live_id,
			talk_course.class_name,
			talk_course.teacher_name,
			talk_course.lecturers,
			talk_course.img,
			talk_course.src_img,
			talk_course.price,
			talk_course.`level`,
			talk_course.`password`,
			talk_course.invite_code,
			talk_course.brief,
			talk_course.content,
			talk_course.tags,
			talk_course.goal,
			talk_course.intended_user,
			talk_course.requirements,
			talk_course.comment_count,
			talk_course.study_num,
			talk_course.like_num,
			talk_course.begin_time,
			talk_course.end_time,
			talk_course.`status`,
			talk_course.open_status,
			talk_course.publish_time,
			talk_course.create_time,
			talk_course.update_time
			FROM
			talk_pay_order
			INNER JOIN talk_course ON talk_pay_order.class_id = talk_course.id
			WHERE
			talk_pay_order.user_id = ?
			ORDER BY
			talk_course.publish_time DESC',[$id]);
		
		$rs['code'] = 200;
		
    	return $rs;
    }
	

	
	/**
    *  获取用户中心我的直播间信息
    */
    public function getLiveById($id){
    	// $rs = $this->get(['user_id'=>(int)$id]);
		
		//我的直播间数据
		$rs['live'] = Db::connect('bs_db_config')->query('SELECT
			talk_live.cid,
			talk_live.`name`,
			talk_live.content,
			talk_live.img,
			talk_live.background_img,
			talk_live.original_img,
			talk_live.invitation_card_id,
			talk_live.mobile_phone,
			talk_live.create_time,
			talk_live.`status`,
			talk_live.open_status,
			talk_live.focus_num,
			talk_live.user_id,
			(select count(*) from talk_invitationcard where talk_live.id=
talk_invitationcard.live_id and talk_invitationcard.type=2 limit 1) invitationCardCount,
			(select freeze from talk_user where talk_live.user_id=
talk_user.user_id and talk_user.dataFlag=1 limit 1) is_freeze,
			(select count(*) from talk_fans where talk_live.user_id=
talk_fans.invita_userid limit 1) fansCount,
			talk_live.id
			FROM
			talk_live
			WHERE
			talk_live.user_id = ?',[$id]);
			
		foreach($rs['live'] as $key=>$value){
			$rs['live'][$key]['processing_img'] = \helper\UrlSys::handleIndexImg($value['img']);
			$rs['live'][$key]['processing_background_img'] = \helper\UrlSys::handleIndexImg($value['background_img']);
		}
			
			
		$rs['code'] = 200;
		
    	return $rs;
    }
	
   /**
    *  根据liveId获取用户中心我的直播间信息
    */
    public function getLiveByLiveId($liveId, $userId){
    	// $rs = $this->get(['user_id'=>(int)$id]);
		
		//我的直播间数据
		$rs['live'] = Db::connect('bs_db_config')->query('SELECT
			talk_live.cid,
			talk_live.`name`,
			talk_live.content,
			talk_live.img,
			talk_live.background_img,
			talk_live.original_img,
			talk_live.invitation_card_id,
			talk_live.mobile_phone,
			talk_live.create_time,
			talk_live.`status`,
			talk_live.open_status,
			talk_live.focus_num,
			talk_live.user_id,
			talk_live.id,
			(select count(*) from talk_invitationcard where talk_live.id=
talk_invitationcard.live_id and talk_invitationcard.type=2 limit 1) invitationCardCount,
			(select freeze from talk_user where talk_live.user_id=
talk_user.user_id and talk_user.dataFlag=1 limit 1) is_freeze,
			(select count(*) from talk_fans where talk_live.user_id=
talk_fans.invita_userid limit 1) fansCount
			FROM
			talk_live
			WHERE
			talk_live.id = ?',[$liveId]);
			
		//我关注的直播间数据
		/* $focusLive = Db::connect('bs_db_config')->query('SELECT
			talk_live.user_id,
			talk_live_focus.live_id,
			talk_live_focus.create_time
			FROM
			talk_live
			INNER JOIN talk_live_focus ON talk_live.id = talk_live_focus.live_id AND talk_live.user_id = talk_live.user_id
			WHERE
			talk_live.user_id = ?',[$userId]); */
			
		$focusLive = Db::connect('bs_db_config')->query('SELECT
			talk_live_focus.id,
			talk_live_focus.live_id,
			talk_live_focus.user_id,
			talk_live_focus.create_time
			FROM
			talk_live_focus
			WHERE
			talk_live_focus.user_id = ?',[$userId]); 
			
		$focusLiveIds = [];
		foreach($focusLive as $key=>$value){
			$focusLiveIds[$key] = $value['live_id']; 
		}

		foreach($rs['live'] as $k=>$v){
			if (in_array($v['id'], $focusLiveIds)){
				$rs['live'][$k]['isFocus'] = 1;
			}else{
				$rs['live'][$k]['isFocus'] = -1;
			}
		}
		
		$rs['code'] = 200;
		
    	return $rs;
    }

	

	
   /**
    *  获取用户中心购买记录信息
    */
    public function getOrderById($id){
    	// $rs = $this->get(['user_id'=>(int)$id]);
		
		//购买记录（包括订单信息和所购课程信息）数据
		$rs['order'] = Db::connect('bs_db_config')->query('SELECT
			talk_pay_order.vip_id,
			talk_pay_order.order_no,
			talk_pay_order.third_order_no,
			talk_pay_order.pay_type,
			talk_pay_order.client_type,
			talk_pay_order.amount,
			talk_pay_order.total_fee,
			talk_pay_order.create_time,
			talk_pay_order.pay_time,
			talk_pay_order.state,
			talk_pay_order.client_ip,
			talk_pay_order.third_ip,
			talk_pay_order.subscribe_id,
			talk_pay_order.class_id,
			talk_course.uid,
			talk_course.live_id,
			talk_course.class_name,
			talk_course.teacher_name,
			talk_course.lecturers,
			talk_course.img,
			talk_course.src_img,
			talk_course.price,
			talk_course.`level`,
			talk_course.`password`,
			talk_course.invite_code,
			talk_course.brief,
			talk_course.content,
			talk_course.tags,
			talk_course.goal,
			talk_course.intended_user,
			talk_course.requirements,
			talk_course.comment_count,
			talk_course.study_num,
			talk_course.like_num,
			talk_course.begin_time,
			talk_course.end_time,
			talk_course.`status`,
			talk_course.open_status,
			talk_course.publish_time,
			talk_course.create_time,
			talk_course.update_time
			FROM
			talk_pay_order
			INNER JOIN talk_course ON talk_pay_order.class_id = talk_course.id
			WHERE
			talk_pay_order.user_id = ?
			ORDER BY
			talk_course.publish_time DESC',[$id]);
		$rs['code'] = 200;
		
    	return $rs;
    }
	

	
	/**
     * 查询用户手机是否存在
     * 
     */
    public function checkUserPhone($userPhone,$userId = 0){
    	$dbo = $this->where(["dataFlag"=>1, "tel"=>$userPhone]);
    	if($userId>0){
    		$dbo->where("user_id","<>",$userId);
    	}
    	$rs = $dbo->count();
    	if($rs>0){
    		return WReturn("手机号已存在!");
    	}else{
    		return WReturn("",1);
    	}
    }
	
	/**
     * 编辑资料
    */
    public function edit(){
		$Id = \think\Session::get('user_id');
    	$data = input('post.');
        $data['brithday'] = ($data['brithday']=='')?date('Y-m-d'):$data['brithday'];
    	WAllow($data,'brithday,trueName,userName,userId,userPhoto,userQQ,userSex');
    	Db::startTrans();
		try{
            if(isset($data['userPhoto']))
	    	$result = $this->allowField(true)->save($data,['userId'=>$Id]);
	    	if(false !== $result){
	    		Db::commit();
	    		return WReturn("编辑成功", 1);
	    	}
		}catch (\Exception $e) {
            Db::rollback();
            return WReturn('编辑失败',-1);
        }	
    }

    /**
     * 查询讲师助教的二维码图片地址
     * @param unknown $userId
     * @return array|\think\db\false|PDOStatement|string|\think\Model
     * @author liujuneng
     */
    public function getUserAssistantQrCode($userId) {
    	$data = $this->alias('u')
    	->field('u.assistant_code_id')
    	->where('u.user_id', $userId)
    	->where('qg.positionType', 5)
    	->join('talk_qiniu_gallerys qg', 'u.assistant_code_id = qg.id')
    	->find();
    	
    	return $data;
    }



    /**
     * 获取当天发布数量
     * @name  getSendContentNum
     * @param $userIds 用户ID数组
     * @return int
     */
    public function getSendContentNum($userIds){

        if(!$userIds) return [];
        $nowTime = date('Ymd', time());
        $nowTimeC = date('Y-m-d', time());

        //发布课程数量
        $cModel = new \app\wechat\model\Course();
        $courseData = $cModel->where([
            'uid'=> ['in', $userIds],
            'publish_time'=> ['>=', $nowTimeC]
//            'publish_time'=> ['>=', '2011-09-21']
        ])->group('uid')->column('count(id) as count', 'uid');

        //发布内容数量（文字 + 语音）
        $sendData = \think\Db::table('talk.talk_live_statistics')->where([
            'user_id' => ['in', $userIds],
            'statistics_type' => ['in', [2,3]],
            'statistics_time' => ['>=', $nowTime]
//            'statistics_time' => ['>=', '20110921']
        ])->group('user_id')->column('sum(total) as sum', 'user_id');

        //发布观点数量
        $vModel = new Viewpoint();
        $viewpointData = $vModel->where([
            'uid'=> ['in', $userIds],
            'publish_time'=> ['>=', $nowTimeC]
//            'publish_time'=> ['>=', '2011-09-21']
        ])->group('uid')->column('count(id) as count', 'uid');

        //各数据相加
        $Num = [];
        foreach ($userIds as $k => $v){
            $Num[$v] = 0;
            if(isset($courseData[$v])){
                $Num[$v] += $courseData[$v];
            }
            if(isset($sendData[$v])){
                $Num[$v] += $sendData[$v];
            }
            if(isset($viewpointData[$v])){
                $Num[$v] += $viewpointData[$v];
            }
        }
        return $Num;
    }


    /**
     * 获取最新收到的礼物信息
     * @name  getGiftInfo
     * @param $userId   用户ID
     * @return array|mixed
     */
    public function getGiftInfo($userIds){

        $where = [
            'class_id' => ['in', $userIds],
            'type' => 3,
            'state' => 1
        ];

        $data = Db::table('talk.talk_pay_order')->where($where)->order('pay_time ASC')->column('remark', 'class_id');
        if($data) {
            $data = array_map(function ($v){
                return json_decode($v, true);
            }, $data);
        }

        return $data;
    }

    /**
     * 识别用户身份
     * @name  getIdentityInfo
     * @param $userId 用户ID
     * @param $classId 课程ID
     * @param string $field 查询字段
     * @return array
     * @author Lizhijian
     */
    public function getIdentityInfo($userId, $classId, $field = 'user_type,user_level,is_assistant')
    {
        $student = $flower = $assistant = $teacher = $guest = $vest = 0;
        $userInfo = $this->where(['user_id' => $userId])->field($field)->find();
        //马甲
        if($userInfo['user_type'] == 2){
            $vest = 1;
        }
        //讲师、流量主、学生
        switch ($userInfo['user_level']){
            case 1:
                $student = 1;
                break;
            case 2:
                $teacher = 1;
                break;
            case 3:
                $flower = 1;
                break;
        }
        //助教
        if($userInfo['is_assistant'] == 1){
            $assistant = 1;
        }
        //嘉宾
        $vestInfo = $this::table('talk_invitationcard_user')->where([
            'user_id' => $userId,
            'create_card_class' => $classId
        ])->where('create_time','>=', date('Y-m-d', time()))->value('id');
        if($vestInfo){
            $guest = 1;
        }
        //返回身份信息
        return [
            'student' => $student,
            'assistant' => $assistant,
            'teacher' => $teacher,
            'guest' => $guest,
            'vest' => $vest,
            'flower' => $flower,
        ];
    }
    /**
     * 获取用户注册时间和绑定手机
     * @param  [type] $user_id [description]
     */
    public function getUserPhoneAndRegister($user_id){
        $data = $this->alias('u')
        ->join('user_phone p','u.user_id = p.user_id','left')
        ->field('u.register_date,p.phone')
        ->where('u.user_id',$user_id)
        ->find();
        $data['register_date'] = date('YmdHis',strtotime($data['register_date']));
        return $data;
    }
    /**
     * 获取讲师列表
     * @param  [type] $page  [description]
     * @param  [type] $limit [description]
     * @return [array]        [description]
     */
    public function getTeacherList($page,$limit){
        $page = (int)$page;
        $limit = (int)$limit;
        $where['u.user_level'] = 2;
        $where['u.freeze'] = 0;
        $where['u.user_id'] = ['>',1700000];
        $data = $this->alias('u')
        ->field('u.user_id,u.alias,u.head_add,u.user_level')
        ->join('talk_live l','l.user_id = u.user_id and l.open_status = 1')
        ->order('u.age','desc')
        ->where($where)
        ->page($page,$limit)
        ->select();
        return $data;
    }
    public function getLiveList($page,$limit){
        $columnModel = new ColumnM();
        $columnId = $columnModel->getColumnId('盘前内参');
        $page = (int)$page;
        $limit = (int)$limit;
        $where['u.user_level'] = 2;
        $where['u.freeze'] = 0;
        $where['u.user_id'] = ['>',1700000];
        $data = $this->alias('u')
        ->field('u.user_id,u.alias,u.head_add,u.user_level,l.theme,l.focus_num,(l.online_num + l.virtual_num) as onlineNum,ua.user_level as ua_user_level,(select v.id from talk_viewpoint v, talk_column_viewpoint cv where v.id = cv.viewpoint_id and v.uid = u.user_id and v.status = 1 and cv.column_id = '.$columnId.' order by update_time desc limit 1) as today_reference_id')
        ->join('talk_live l','l.user_id = u.user_id and l.open_status = 1')
        ->join('talk_user ua','ua.user_id = u.user_id and ua.current_room_id = 1000000000 + l.id','left')
        ->join('talk_live_state ls','ls.groupid = l.id + 1000000000','left')
        ->where($where)
        ->order('IF(ISNULL(ls.state),2,ls.state) asc,(l.focus_num + l.virtual_focus_num) desc')
        ->page($page,$limit)
        ->select();
        if(!empty($data)){
            $vModel = new Viewpoint();
            foreach ($data as $k => $v) {
                $today_reference = $vModel->where('id',$v['today_reference_id'])->value('title');
                $v['today_reference'] = $today_reference ? $today_reference : null;
            }
        }
        return $data;
    }
}