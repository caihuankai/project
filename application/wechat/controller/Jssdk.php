<?php

namespace app\wechat\controller;

use think\config;
use app\wechat\model\User;
use app\wechat\model\AccessToken;
use app\common\controller\ControllerBase;
use app\common\controller\JsonResult;

/**
 * 微信JSSDK config配置参数/获取保存jsapi_ticket and access_token
 * @author xiaok
 * @time 2017/06/03
 */
class Jssdk extends ControllerBase{

	public function test(){
		// $openid = \think\Session::get('weChat_user['protected']');
		// $user_id = \think\Session::get('user_id');
		// $scope = \think\Session::get('scope');
		// var_dump($openid);
		// var_dump($user_id);
		// var_dump($scope);
		// var_dump($_SESSION);
	}

	public function getSignPackage($user_id=1706743,$url='') {
		$appId = config('wechat.app_id');
		$appSecret = config('wechat.secret');
		$url = config('WX_DOMAIN')."/";
		// return "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";die;
		// $user_id = \think\Session::get('user_id');
		// $user_id = 1706743;
		$user_id = (int)$user_id;
		$userModel = new User();
		$userInfo = $userModel->where('user_id',$user_id)->find();
		$code = '';
		if($user_id != 0){
			if(empty($userInfo)){
				return $this->errorJson(JsonResult::ERR_USERINFO_NULL);
			}
			$code = $userInfo['code'];
		}

		$AccessTokenModel = new AccessToken();
	    $jsapiTicket = $this->getJsApiTicket($appId,$appSecret);
	    // 注意 URL 一定要动态获取，不能 hardcode.
	    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
	    // $url = "$protocol".$url;
	    $timestamp = time();
	    $nonceStr = $this->createNonceStr();

    	// 这里参数的顺序要按照 key 值 ASCII 码升序排序
    	$string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";

   		$signature = sha1($string);
   		$AccessToken = $this->getAccessToken($appId,$appSecret);
	    $signPackage = array(
	      "appId"     => $appId,
	      "nonceStr"  => $nonceStr,
	      "timestamp" => $timestamp,
	      "signature" => $signature,
	      "jsapiTicket" => $jsapiTicket,
	      "url" => $url,
	      "string" => $string,
	      "accessToken" => $AccessToken,
	      "user_id" => $user_id,
	      "code" => $code
	    );
	    return $this->successJson($signPackage);die;
	    $this->assign('signPackage',$signPackage);
	    return $this->fetch();
	}

	public function getYYSignPackage() {
		$appId = config('wechat.app_id');
		$appSecret = config('wechat.secret');
		$url = "http://yunying.lexinamc.cn/view/AShare/index.html";
	    $jsapiTicket = $this->getJsApiTicket($appId,$appSecret);
	    $timestamp = time();
	    $nonceStr = $this->createNonceStr();

    	// 这里参数的顺序要按照 key 值 ASCII 码升序排序
    	$string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";

   		$signature = sha1($string);
	    $signPackage = array(
	      "appId"     => $appId,
	      "nonceStr"  => $nonceStr,
	      "timestamp" => $timestamp,
	      "signature" => $signature,
	      "jsapiTicket" => $jsapiTicket,
	      "url" => $url,
	      "string" => $string
	    );
	    return $this->successJson($signPackage);
	}

	public function getGGSignPackage($localurl='') {
		$appId = config('wechat.app_id');
		$appSecret = config('wechat.secret');
		$url = "http://yunying.lexinamc.cn/view/618/index.html";
	    $jsapiTicket = $this->getJsApiTicket($appId,$appSecret);
	    $timestamp = time();
	    $nonceStr = $this->createNonceStr();
	    if(!empty($localurl)){
	    	$url = $localurl;
	    }
    	// 这里参数的顺序要按照 key 值 ASCII 码升序排序
    	$string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";

   		$signature = sha1($string);
	    $signPackage = array(
	      "appId"     => $appId,
	      "nonceStr"  => $nonceStr,
	      "timestamp" => $timestamp,
	      "signature" => $signature,
	      "jsapiTicket" => $jsapiTicket,
	      "url" => $url,
	      "string" => $string,
	      "localurl" => $localurl,
	    );
	    return $this->successJson($signPackage);
	}

  	private function createNonceStr($length = 16) {
	   	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	    $str = "";
	    for ($i = 0; $i < $length; $i++) {
	      $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
	    }
	    return $str;
  	}

  	private function getJsApiTicket($appId,$appSecret) {
  		$AccessTokenModel = new AccessToken();
	    // jsapi_ticket应该全局存储与更新
	    $ModelInfo = $AccessTokenModel->find();
	    if(!empty($ModelInfo)){
	    	if($ModelInfo['ticket_expires_time'] > time()){
	    		$ticket = $ModelInfo['jsapi_ticket'];
	    	}else{
	    		$accessToken = $this->getAccessToken($appId,$appSecret);
			    $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=$accessToken";
			    $res = json_decode($this->httpGet($url));
			    $ticket = $res->ticket;
		      	if ($ticket) {
		      		$updateData = $AccessTokenModel
		      		->where('id',$ModelInfo['id'])
		      		->update([
		      			'jsapi_ticket' => $ticket,
		      			'ticket_expires_time' => time() + 5400,
	      			]);
		      	}
	    	}
	    }else{
	    	$accessToken = $this->getAccessToken($appId,$appSecret);
		    $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=$accessToken";
		    $res = json_decode($this->httpGet($url));
		    $ticket = $res->ticket;
		    $data['access_token'] = $accessToken;
		    $data['access_expires_time'] = time() + 5400;
		    $data['jsapi_ticket'] = $ticket;
		    $data['ticket_expires_time'] = time() + 5400;
	      	if ($ticket) {
	      		$saveData = $AccessTokenModel
	      		->insert($data);
	      	}
	    }

	    // $data = json_decode(file_get_contents("jsapi_ticket.json"));
	    // if ($data->expire_time < time()) {
	    //   $accessToken = $this->getAccessToken($appId,$appSecret,$AccessTokenModel);
	    //   // return $accessToken;die;
	    //   $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=$accessToken";
	    //   $res = json_decode($this->httpGet($url));
	    //   $ticket = $res->ticket;
	    //   if ($ticket) {
	    //     $data->expire_time = time() + 5400;
	    //     $data->jsapi_ticket = $ticket;
	    //     $fp = fopen("jsapi_ticket.json", "w");
	    //     fwrite($fp, json_encode($data));
	    //     fclose($fp);
	    //   }
	    // } else {
	    //   $ticket = $data->jsapi_ticket;
	    // }

	    return $ticket;
	}

  	private function getAccessToken($appId,$appSecret) {
  		$AccessTokenModel = new AccessToken();
	    // access_token应该全局存储与更新 2小时过期
	    $ModelInfo = $AccessTokenModel->find();
	    if(!empty($ModelInfo)){
	    	if($ModelInfo['access_expires_time'] > time()){
	    		$access_token = $ModelInfo['access_token'];
	    	}else{
	    		$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appId&secret=$appSecret";
			    $res = json_decode($this->httpGet($url));
			    $access_token = $res->access_token;
			    if($access_token){
			    	$updateData = $AccessTokenModel
		      		->where('id',$ModelInfo['id'])
		      		->update([
		      			'access_token' => $access_token,
		      			'access_expires_time' => time() + 5400,
	      			]);
			    }
	    	}
	    }else{
	    	$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appId&secret=$appSecret";
		    $res = json_decode($this->httpGet($url));
		    $access_token = $res->access_token;
	    }
	    
	    	    
	    // $data = json_decode(file_get_contents("access_token.json"));
	    // if ($data->expire_time < time()) {
	    //   // 如果是企业号用以下URL获取access_token
	    //   // $url = "https://qyapi.weixin.qq.com/cgi-bin/gettoken?corpid=$this->appId&corpsecret=$this->appSecret";
	    //   $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appId&secret=$appSecret";
	    //   $res = json_decode($this->httpGet($url));
	    //   // return $res;die;
	    //   $access_token = $res->access_token;
	    //   if ($access_token) {
	    //     $data->expire_time = time() + 5400;
	    //     $data->access_token = $access_token;
	    //     $fp = fopen("access_token.json", "w");
	    //     fwrite($fp, json_encode($data));
	    //     fclose($fp);
	    //   }
	    // } else {
	    //   $access_token = $data->access_token;
	    // }
	    return $access_token;
  	}

  	private function httpGet($url) {
	    $curl = curl_init();
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($curl, CURLOPT_TIMEOUT, 500);
	    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	    curl_setopt($curl, CURLOPT_URL, $url);

	    $res = curl_exec($curl);
	    curl_close($curl);

	    return $res;
  	}
}