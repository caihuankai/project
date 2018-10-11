<?php

namespace app\wechat\controller;

use think\config;
use app\wechat\model\AccessToken;
use app\common\controller\ControllerBase;

/**
 * 更新access_token jsapi_ticket类
 */
class UpdateAccessToken extends ControllerBase{
	public function update(){
		$appId = config('wechat.app_id');
		$appSecret = config('wechat.secret');
		$jsapiTicket = $this->getJsApiTicket($appId,$appSecret);
		//不返回参数 防止token泄露
		if(!empty($jsapiTicket)){
			
		}else{
			return 'false';
		}
	}
	private function getJsApiTicket($appId,$appSecret) {
  		$AccessTokenModel = new AccessToken();
	    // jsapi_ticket应该全局存储与更新
	    $ModelInfo = $AccessTokenModel->find();
	    if(!empty($ModelInfo)){
	    	if($ModelInfo['ticket_expires_time'] > time()){
	    		$accessToken = $this->getAccessToken($appId,$appSecret);
	    		$ticket = $ModelInfo['jsapi_ticket'];
	    	}else{
	    		$accessToken = $this->getAccessToken($appId,$appSecret);
			    $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=$accessToken";
			    $res = json_decode($this->httpGet($url));
			    if($res->errcode != 0){
			    	return null;
			    }
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
		    if($res->errcode != 0){
		    	return null;
		    }
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

  	//清除token有效期 防止token被过期
  	public function expire(){
  		$AccessTokenModel = new AccessToken();
  		$ModelInfo = $AccessTokenModel->find();
  		if(!empty($ModelInfo)){
  			$updateData = $AccessTokenModel
      		->where('id',$ModelInfo['id'])
      		->update([
      			'access_expires_time' => 0,
  			]);
  		}
  	}
}