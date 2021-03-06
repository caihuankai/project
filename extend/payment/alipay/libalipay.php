<?php
/**
 *	支付宝回调校验借口，仅适用RSA，调用openssl
 *	/key目录存放支付宝公钥
 * 	本目录存放证书
 */

class AlipayNotifyVerify{
	//合作商户ID
	private $partner = '2088411124265853';
	//验证签名方式
	private $sign_type = 'RSA';
	//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
	private $transport = 'http';
    // HTTPS形式消息验证地址
	private $https_verify_url = 'https://mapi.alipay.com/gateway.do?service=notify_verify&';
	// HTTP形式消息验证地址
	private $http_verify_url = 'http://notify.alipay.com/trade/notify_query.do?';
	//ca证书路径地址，用于curl中ssl校验
	//请保证cacert.pem文件在当前文件夹目录中
	private $cacert;// getcwd().'\\cacert.pem';
	//支付宝公钥（后缀是.pem）文件相对路径
	private $alipay_public_key;//dirname(__FILE__) . '/key/alipay_public_key.pem';

	public function __construct(){
		$this->cacert = getcwd().'\\cacert.pem';
		$this->alipay_public_key = dirname(__FILE__) . '/key/alipay_public_key.pem';
	}

	public function verifyNotify($params){
		$isSign = $this->getSignVeryfy($params);
		$responseTxt = 'true';
		if (! empty($params["notify_id"])) {
			$responseTxt = $this->getResponse($params["notify_id"]);
		}
        return ($responseTxt == 'true' && $isSign);
	}

	public function getSignVeryfy($params){
		if (empty($params)){
			return false;
		}

		$sign = $params['sign'];
		$para_filter = $this->paraFilter($params);
		//对待签名参数数组排序
		$para_sort = $this->argSort($para_filter);
		//把数组所有元素，按照“参数=参数值”的模式用“&”字符拼接成字符串
		$prestr = $this->createLinkstring($para_sort);

		$isSgin = false;
		switch (strtoupper(trim($this->sign_type))) {
			case "RSA" :
				$isSgin = $this->rsaVerify($prestr, trim($this->alipay_public_key), $sign);
				break;
			default :
				$isSgin = false;
		}
		
		return $isSgin;
	}

	/**
	 * RSA验签
	 * @param $data 待签名数据
	 * @param $ali_public_key_path 支付宝的公钥文件路径
	 * @param $sign 要校对的的签名结果
	 * return 验证结果
	 */
	public function rsaVerify($data, $ali_public_key_path, $sign)  {
		$pubKey = file_get_contents($ali_public_key_path);
	    $res = openssl_get_publickey($pubKey);
	    $result = (bool)openssl_verify($data, base64_decode($sign), $res);
	    openssl_free_key($res);    
	    return $result;
	}

	/**
	 * 除去数组中的空值和签名参数
	 * @param $para 签名参数组
	 * return 去掉空值与签名参数后的新签名参数组
	 */
	public function paraFilter($para) {
		$para_filter = array();
		while (list ($key, $val) = each ($para)) {
			if($key == "sign" || $key == "sign_type" || $val == "")continue;
			else	$para_filter[$key] = $para[$key];
		}
		return $para_filter;
	}

	/**
	 * 把数组所有元素，按照“参数=参数值”的模式用“&”字符拼接成字符串，并对字符串做urlencode编码
	 * @param $para 需要拼接的数组
	 * return 拼接完成以后的字符串
	 */
	public function createLinkstringUrlencode($para) {
		$arg  = "";
		while (list ($key, $val) = each ($para)) {
			$arg.=$key."=".urlencode($val)."&";
		}
		//去掉最后一个&字符
		$arg = substr($arg,0,count($arg)-2);
		
		//如果存在转义字符，那么去掉转义
		if(get_magic_quotes_gpc()){$arg = stripslashes($arg);}
		
		return $arg;
	}

	/**
	 * 把数组所有元素，按照“参数=参数值”的模式用“&”字符拼接成字符串
	 * @param $para 需要拼接的数组
	 * return 拼接完成以后的字符串
	 */
	public function createLinkstring($para) {
		$arg  = "";
		while (list ($key, $val) = each ($para)) {
			$arg.=$key."=".$val."&";
		}
		//去掉最后一个&字符
		$arg = substr($arg,0,count($arg)-2);
		
		//如果存在转义字符，那么去掉转义
		if(get_magic_quotes_gpc()){$arg = stripslashes($arg);}
		
		return $arg;
	}

	/**
	 * 对数组排序
	 * @param $para 排序前的数组
	 * return 排序后的数组
	 */
	public function argSort($para) {
		ksort($para);
		reset($para);
		return $para;
	}

	/**
     * 获取远程服务器ATN结果,验证返回URL
     * @param $notify_id 通知校验ID
     * @return 服务器ATN结果
     * 验证结果集：
     * invalid命令参数不对 出现这个错误，请检测返回处理中partner和key是否为空 
     * true 返回正确信息
     * false 请检查防火墙或者是服务器阻止端口问题以及验证时间是否超过一分钟
     */
	function getResponse($notify_id) {
		$transport = strtolower(trim($this->transport));
		$partner = trim($this->partner);
		$veryfy_url = '';
		if($transport == 'https') {
			$veryfy_url = $this->https_verify_url;
		}
		else {
			$veryfy_url = $this->http_verify_url;
		}
		$veryfy_url = $veryfy_url."partner=" . $partner . "&notify_id=" . $notify_id;
		$responseTxt = $this->getHttpResponseGET($veryfy_url, $this->cacert);
		
		return $responseTxt;
	}

	/**
	 * 远程获取数据，POST模式
	 * 注意：
	 * 1.使用Crul需要修改服务器中php.ini文件的设置，找到php_curl.dll去掉前面的";"就行了
	 * 2.文件夹中cacert.pem是SSL证书请保证其路径有效，目前默认路径是：getcwd().'\\cacert.pem'
	 * @param $url 指定URL完整路径地址
	 * @param $cacert_url 指定当前工作目录绝对路径
	 * @param $para 请求的数据
	 * @param $input_charset 编码格式。默认值：空值
	 * return 远程输出的数据
	 */
	public function getHttpResponsePOST($url, $cacert_url, $para, $input_charset = '') {

		if (trim($input_charset) != '') {
			$url = $url."_input_charset=".$input_charset;
		}
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);//SSL证书认证
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);//严格认证
		curl_setopt($curl, CURLOPT_CAINFO,$cacert_url);//证书地址
		curl_setopt($curl, CURLOPT_HEADER, 0 ); // 过滤HTTP头
		curl_setopt($curl,CURLOPT_RETURNTRANSFER, 1);// 显示输出结果
		curl_setopt($curl,CURLOPT_POST,true); // post传输数据
		curl_setopt($curl,CURLOPT_POSTFIELDS,$para);// post传输数据
		$responseText = curl_exec($curl);
		//var_dump( curl_error($curl) );//如果执行curl过程中出现异常，可打开此开关，以便查看异常内容
		curl_close($curl);
		
		return $responseText;
	}
    
    /**
    * 远程获取数据，GET模式
    * 注意：
    * 1.使用Crul需要修改服务器中php.ini文件的设置，找到php_curl.dll去掉前面的";"就行了
    * 2.文件夹中cacert.pem是SSL证书请保证其路径有效，目前默认路径是：getcwd().'\\cacert.pem'
    * @param $url 指定URL完整路径地址
    * @param $cacert_url 指定当前工作目录绝对路径
    * return 远程输出的数据
    */
   function getHttpResponseGET($url,$cacert_url) {
       $curl = curl_init($url);
       curl_setopt($curl, CURLOPT_HEADER, 0 ); // 过滤HTTP头
       curl_setopt($curl,CURLOPT_RETURNTRANSFER, 1);// 显示输出结果
       curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);//SSL证书认证
       curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);//严格认证
       curl_setopt($curl, CURLOPT_CAINFO,$cacert_url);//证书地址
       $responseText = curl_exec($curl);
       //var_dump( curl_error($curl) );//如果执行curl过程中出现异常，可打开此开关，以便查看异常内容
       curl_close($curl);

       return $responseText;
   }
}