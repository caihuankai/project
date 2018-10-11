<?php
namespace app\web\controller;

use app\wechat\model\User as MUser;
use app\admin\model\Ads;
use app\admin\model\Honors;
use app\admin\model\Generalize;

class Home extends App{
	
	/**
	 * 获取live直播平台讲师列表
	 * @param  integer $page  页码
	 * @param  [type]  $limit 每页条数
	 * @return [arrray]
	 */
	public function liveTeacherList($page=1,$limit=5){
		$UserM = new MUser();
		$dataList = $UserM->getTeacherList($page,$limit);
		return $this->sucSysJson($dataList);
	}
	/**
	 * 获取首页焦点图
	 * @return [type] [description]
	 */
	public function getHomeBanner(){
		$AdsModel = new Ads();
		$where['dataFlag'] = 1;
		$where['adStatus'] = 1;
		$where['positionType'] = 8;
		$dataList = $AdsModel->where($where)
		->where('relevanceType','in',[3,4,5,6,7,8,9])
		->field('adId,adFile,adName,adURL,adSort,adClickNum,relevanceType,relevanceId')
		->order('adSort')
		->limit(8)
		->select();
		return $this->successJson($dataList);
	}
	/**
	 * 获取公司荣誉资质
	 * @return [arrray]
	 */
	public function getHonors(){
		$HonorsM = new Honors();
		$where['status'] = 1;
		$dataList = $HonorsM
		->field('id,name,img')
		->where($where)
		->select();
		return $this->sucSysJson($dataList);
	}
	/**
	 * 下载app
	 * @return [redirect] [description]
	 */
	public function downloadApp(){
		if(strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone')||strpos($_SERVER['HTTP_USER_AGENT'], 'iPad')){
          $this->redirect('https://itunes.apple.com/cn/app/id1339470748?mt=8');
	    }else if(strpos($_SERVER['HTTP_USER_AGENT'], 'Android')){
	        $this->redirect('http://android.myapp.com/myapp/detail.htm?apkName=cn.hctt.strategy');
	    }else{
	        $this->redirect('https://itunes.apple.com/cn/app/id1339470748?mt=8');
	    }
	}
	/**
	 * 获取微信 小程序 app下载二维码
	 * @return [array] [description]
	 */
	public function getQrcode(){
		$data['appdownload_qrcode'] = config('WEB_DOMAIN').config('appdownload_qrcode');
		$data['focus_qrcode'] = config('WEB_DOMAIN').config('focus_qrcode');
		$data['miniProgram_qrcode'] = '';
		return $this->sucSysJson($data);
	}
	/**
	 * 获取广告推广
	 * @return [array] [description]
	 */
	public function getGeneralize(){
		$GeneralizeM = new Generalize();
		$where['status'] = 1;
		$where['type'] = 1;
		$dataList = $GeneralizeM
		->field('id,title,cover_img,url')
		->where($where)
		->order('update_time','desc')
		->limit(3)
		->select();
		return $this->sucSysJson($dataList);
	}
}