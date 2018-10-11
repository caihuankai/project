<?php
namespace app\jiahua\model;

class UserJiahua extends \app\common\model\User
{
	protected $weChatGenderMap = [
			1 => 1, // 男性
			2 => 0, // 女性
			0 => 3, // 未知
	];
	
	protected $currentSessionUserIdKey = 'currentSessionUserIdKey';
	
	/**
	 * 登录过期时间
	 */
	const EXPIRE_TIME = '-1day';
	
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
		\think\Config::set('session.expire', time() - strtotime(self::EXPIRE_TIME));
		\think\Session::boot();
		\think\Session::set($this->currentSessionUserIdKey, intval($userId));
		//强制设置用户浏览器的PHPSESSID有效时间（会话cookie变持久化cookie），避免关闭浏览器后登陆状态过期
		cookie("PHPSESSID", session_id(), time() - strtotime(self::EXPIRE_TIME));
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
			// $whereFunc必须立刻调用，否则会出现无法写入session的情况
			$userData = $this->where(call_user_func($whereFunc))->find();
			
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
	 * @param string $openKey 指定插入open_id或者pc_open_id或者miniprogram_open_id
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
		
		// talk_third_login表
		$thirdData = [
				'user_id' => $userId,
				'type' => 1,
		];
		if (!empty($data['openid']) && !empty($openKey)) { // 指定插入字段
			$thirdData[$openKey] = $data['openid'];
		}
		if (!empty($data['unionid'])) {
			$thirdData['union_id'] = $data['unionid'];
		}else{ // 不插入
			return $userId;
		}
		
		if (!empty($data['nickname'])) {
			$thirdData['alias'] = $data['nickname'];
		}
		
		/** @var \app\jiahua\model\ThirdLoginJiahua $model */
		$model = model('jiahua/ThirdLoginJiahua');
		$model->updateInWeChat($thirdData);
		
		return $userId;
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
	
	protected function weChatMap($data, array $map, $default)
	{
		return array_key_exists($data, $map) ? $map[$data] : $default;
	}
	
}

