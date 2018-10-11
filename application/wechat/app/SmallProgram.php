<?php
namespace app\wechat\app;

/**
 * 小程序登录验证
 * @package app\wechat\app
 * @author liujuneng
 * 参考：https://blog.csdn.net/u014520745/article/details/54425658
 */
trait SmallProgram
{
	protected $grant_type = "authorization_code";
	protected $url = "https://api.weixin.qq.com/sns/jscode2session";
	
	public function wxLogin() {
		/**
		 * 3.小程序调用server获取token接口, 传入code, rawData, signature, encryptData.
		 */
		$code = input("code", '', 'htmlspecialchars_decode');
		$rawData = input("rawData", '', 'htmlspecialchars_decode');
		$signature = input("signature", '', 'htmlspecialchars_decode');
		$encryptedData = input("encryptedData", '', 'htmlspecialchars_decode');
		$iv = input("iv", '', 'htmlspecialchars_decode');
		
		/**
		 * 4.server调用微信提供的jsoncode2session接口获取openid, session_key, 调用失败应给予客户端反馈
		 * , 微信侧返回错误则可判断为恶意请求, 可以不返回. 微信文档链接
		 * 这是一个 HTTP 接口，开发者服务器使用登录凭证 code 获取 session_key 和 openid。其中 session_key 是对用户数据进行加密签名的密钥。
		 * 为了自身应用安全，session_key 不应该在网络上传输。
		 * 接口地址："https://api.weixin.qq.com/sns/jscode2session?appid=APPID&secret=SECRET&js_code=JSCODE&grant_type=authorization_code"
		 */
		$params = [
				'appid' => config('wechat')['mini_program_app_id'],
				'secret' => config('wechat')['mini_program_app_secret'],
				'js_code' => $code,
				'grant_type' => $this->grant_type
		];
		
		$res = $this->makeRequest($this->url, $params);
		if ($res['code'] !== 200 || !isset($res['result']) || !isset($res['result'])) {
			return $this->errSysJson('requestTokenFailed');
		}
		$reqData = json_decode($res['result'], true);
		if (!isset($reqData['session_key'])) {
			return $this->errSysJson('requestTokenFailed');
		}
		$sessionKey = $reqData['session_key'];
		$openId = $reqData['openid'];
		
		/**
		 * 5.server计算signature, 并与小程序传入的signature比较, 校验signature的合法性, 不匹配则返回signature不匹配的错误. 不匹配的场景可判断为恶意请求, 可以不返回.
		 * 通过调用接口（如 wx.getUserInfo）获取敏感数据时，接口会同时返回 rawData、signature，其中 signature = sha1( rawData + session_key )
		 *
		 * 将 signature、rawData、以及用户登录态发送给开发者服务器，开发者在数据库中找到该用户对应的 session-key
		 * ，使用相同的算法计算出签名 signature2 ，比对 signature 与 signature2 即可校验数据的可信度。
		 */
		$signature2 = sha1(htmlspecialchars_decode($rawData) . $sessionKey);
		if ($signature2 !== $signature) return $this->errSysJson('signNotMatch');
		
		/**
		 *
		 * 6.使用第4步返回的session_key解密encryptData, 将解得的信息与rawData中信息进行比较, 需要完全匹配,
		 * 解得的信息中也包括openid, 也需要与第4步返回的openid匹配. 解密失败或不匹配应该返回客户相应错误.
		 * （使用官方提供的方法即可）
		 */
		$pc = new \WXBizDataCrypt();
		$errCode = $pc->decryptData(config('wechat')['mini_program_app_id'], $sessionKey, $encryptedData, $iv, $data);
		if ($errCode !== 0) {
			return $this->errSysJson('encryptDataNotMatch');
		}
		
		
		/**
		 * 7.生成第三方3rd_session，用于第三方服务器和小程序之间做登录态校验。为了保证安全性，3rd_session应该满足：
		 * a.长度足够长。建议有2^128种组合，即长度为16B
		 * b.避免使用srand（当前时间）然后rand()的方法，而是采用操作系统提供的真正随机数机制，比如Linux下面读取/dev/urandom设备
		 * c.设置一定有效时间，对于过期的3rd_session视为不合法
		 *
		 * 以 $session3rd 为key，sessionKey+openId为value，写入memcached
		 */
		$data = json_decode($data, true);
		$session3rd = $this->randomFromDev(16);
		
		$data['session3rd'] = $session3rd;
		cache($session3rd, $data['openId'] . $sessionKey, 7200);

		//内部登录
		/** @var \app\wechat\model\ThirdLogin $model */
		$model = model('wechat/ThirdLogin');
		$unionId = '';
		if (isset($reqData['unionid'])) {
			$unionId = $reqData['unionid'];
		}elseif (isset($data['unionId'])) {
			$unionId = $data['unionId'];
		}
		$mysqlUser = $model->checkExistByWeChatUnionId($unionId, 'user_id, open_id, pc_open_id, miniprogram_open_id, union_id, login_tel');
		if (empty($mysqlUser)) {
			$insertData = [
					'openid'=>$openId,
					'unionid'=>$unionId,
					'sex'=>$data['gender'],
					'nickname'=>$data['nickName'],
					'headimgurl'=>$data['avatarUrl'],
					'country'=>$data['country'],
					'province'=>$data['province'],
					'city'=>$data['city'],
			];
			$userId = $this->user->insertInWeChat(
					$insertData,
					'miniprogram_open_id'
			);
			$mysqlUser['user_id'] = $userId;
		}else if (empty($mysqlUser['miniprogram_open_id'])){ // 更新miniprogram_open_id
			// 更新third_login表数据
			$model->update(['miniprogram_open_id' => $openId], ['user_id' => $mysqlUser['user_id']]);
		}
		
		//执行小程序登录操作，内部返回token（session3rd）
		$this->registerUserMiniprogramLoginSuccess($session3rd, $mysqlUser['user_id']);

	}
	
	/**
	 * 发起http请求
	 * @param string $url 访问路径
	 * @param array $params 参数，该数组多于1个，表示为POST
	 * @param int $expire 请求超时时间
	 * @param array $extend 请求伪造包头参数
	 * @param string $hostIp HOST的地址
	 * @return array    返回的为一个请求状态，一个内容
	 */
	function makeRequest($url, $params = array(), $expire = 0, $extend = array(), $hostIp = '')
	{
		if (empty($url)) {
			return array('code' => '100');
		}
		
		$_curl = curl_init();
		$_header = array(
				'Accept-Language: zh-CN',
				'Connection: Keep-Alive',
				'Cache-Control: no-cache'
		);
		// 方便直接访问要设置host的地址
		if (!empty($hostIp)) {
			$urlInfo = parse_url($url);
			if (empty($urlInfo['host'])) {
				$urlInfo['host'] = substr(config('WX_DOMAIN'), 7, -1);
				$url = "http://{$hostIp}{$url}";
			} else {
				$url = str_replace($urlInfo['host'], $hostIp, $url);
			}
			$_header[] = "Host: {$urlInfo['host']}";
		}
		
		// 只要第二个参数传了值之后，就是POST的
		if (!empty($params)) {
			curl_setopt($_curl, CURLOPT_POSTFIELDS, http_build_query($params));
			curl_setopt($_curl, CURLOPT_POST, true);
		}
		
		if (substr($url, 0, 8) == 'https://') {
			curl_setopt($_curl, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($_curl, CURLOPT_SSL_VERIFYHOST, FALSE);
		}
		curl_setopt($_curl, CURLOPT_URL, $url);
		curl_setopt($_curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($_curl, CURLOPT_USERAGENT, 'API PHP CURL');
		curl_setopt($_curl, CURLOPT_HTTPHEADER, $_header);
		
		if ($expire > 0) {
			curl_setopt($_curl, CURLOPT_TIMEOUT, $expire); // 处理超时时间
			curl_setopt($_curl, CURLOPT_CONNECTTIMEOUT, $expire); // 建立连接超时时间
		}
		
		// 额外的配置
		if (!empty($extend)) {
			curl_setopt_array($_curl, $extend);
		}
		
		$result['result'] = curl_exec($_curl);
		$result['code'] = curl_getinfo($_curl, CURLINFO_HTTP_CODE);
		$result['info'] = curl_getinfo($_curl);
		if ($result['result'] === false) {
			$result['result'] = curl_error($_curl);
			$result['code'] = -curl_errno($_curl);
		}
		
		curl_close($_curl);
		return $result;
	}
	
	/**
	 * 读取/dev/urandom获取随机数
	 * @param $len
	 * @return mixed|string
	 */
	function randomFromDev($len) {
		$fp = @fopen('/dev/urandom','rb');
		$result = '';
		if ($fp !== FALSE) {
			$result .= @fread($fp, $len);
			@fclose($fp);
		}
		else
		{
			trigger_error('Can not open /dev/urandom.');
		}
		// convert from binary to string
		$result = base64_encode($result);
		// remove none url chars
		$result = strtr($result, '+/', '-_');
		
		return substr($result, 0, $len);
	}
	
	
}
