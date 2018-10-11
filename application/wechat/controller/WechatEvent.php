<?php
namespace app\wechat\controller;

use think\config;
use app\common\controller\ControllerBase;

/**
 * 公众号事件推送请求类
 * @author xiaok
 * @time 2017/06/08
 */
class WechatEvent extends ControllerBase{
	public function index(){
		 //从GET参数中读取三个字段的值
	    $signature = $_GET["signature"];
	    $timestamp = $_GET["timestamp"];
	    $nonce = $_GET["nonce"];
	    //读取预定义的TOKEN
	    $token = 'dacelue';
	    //对数组进行排序
	    $tmpArr = array($token, $timestamp, $nonce);
	    sort($tmpArr, SORT_STRING);
	    //对三个字段进行sha1运算
	    $tmpStr = implode( $tmpArr );
	    $tmpStr = sha1( $tmpStr );
	    //判断我方计算的结果是否和微信端计算的结果相符
	    //这样利用只有微信端和我方了解的token作对比,验证访问是否来自微信官方.
	    if( $tmpStr == $signature ){
	        return true;
	    }else{
	        return false;
	    }
	
		if(checkSignature()){
		    echo $_GET["echostr"];
		}
		else{
		    echo 'error';
		}
	}
}