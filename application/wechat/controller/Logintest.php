<?php

namespace app\wechat\controller;

use app\common\controller\ControllerBase;
use app\admin\controller\ExcelAnalysis;

class Logintest extends ControllerBase{   
	public function jumpDownload(){
	    $this->redirect('http://m.99live.me/loadApp.html');
	}
	/**
	 * excel解析
	 */
	public function analtsis(){
		$ExcelAnalysisC = new ExcelAnalysis();
	// echo ROOT_PATH.'public/admin/周报-PHP+前端201807817.xlsx';die;
		$ExcelAnalysisC->analysis('C:/wamp/www/JJCJWeb/wechat/public/admin/123.xlsx');
	}
	/**
	 * 获取百度百科内容
	 * @param  [type] $content 词条
	 * @return [string]          bdbk词条解释
	 */
	public function getbdbkDiv($content){
		//过滤特殊字符
		$search = array(" ","　","\n","\r","\t");
 		$replace = array("%20","%20","","","");
 		$content = str_replace($search, $replace, $content);
		//请求链接
		$url = 'https://baike.baidu.com/item/'.$content;
		//获取网页meta内容
		$urlMeta = get_meta_tags($url);
		//词条描述
		$description = '问题超前，解答不出';
		if(!empty($urlMeta)){
			$description = $urlMeta['description'];
		}
		return $description;
	}
	//
	public function getbdbk($content){
		//过滤特殊字符
		$search = array(" ","　","\n","\r","\t","&nbsp");
 		$replace = array("","","","","","");
 		$content = str_replace($search, $replace, $content);
		//请求链接
		$url = 'https://baike.baidu.com/item/'.$content;
		//获取网页内容
		$urlContent = file_get_contents($url);
		//正则匹配需要内容
		$regex4="/<div class=\"para\".*?>.*?<\/div>/ism"; 

		if(preg_match_all($regex4, $urlContent, $matches)){  
			$contnet = '';
			//返回最大行数10行
			$count = count($matches[0]);
			if($count > 10){
				$count = 10;
			}
			for ($i=0; $i < $count; $i++) { 
				$contnet .= strip_tags($matches[0][$i]);
				$contnet .= str_replace('&nbsp','',$content);
				$contnet .= '<br/>';
			}
		   // $contnet = $matches[0][0];  
		}else{  
		   $contnet = '问题超前，解答不出'; 
		}
		// $contnet = strip_tags($contnet);
		return $contnet;
	}
}