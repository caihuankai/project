<?php

namespace app\wechat\controller;

use app\common\controller\ControllerBase;
use app\common\model\QrCode;
use app\wechat\model\Live as LiveM;
use app\wechat\model\User;
use think\config;

/**
 * 生成二维码
 * @author xiaok
 * @time 2017/06/14
 */
class CreateQrCode extends App{
	public function test(){
		$QrCodeModel = new QrCode();
		$test = $QrCodeModel->test();
		return $this->successJson($test);
	}
	//创建邀请卡 @param live_id:直播间id class_id：课程id type：邀请卡类型 1课程邀请粉丝 2直播间邀请粉丝 3邀请嘉宾 4平台邀请卡 user_id：二维码创建人 
	public function index($live_id=1,$class_id=1,$type=2,$user_id=1706743){
		$QrCodeModel = new QrCode();
		$QrCode = $QrCodeModel->index($live_id,$class_id,$type,$user_id);
		if(!is_array($QrCode)){
			return $QrCode;
		}
		//获取直播间介绍 $liveContent
		$liveContent = '';
		if($type == 2){
			$LiveModel = new LiveM();
			$LiveInfo = $LiveModel->where('id',(int)$live_id)->find();
			if(!empty($LiveInfo)){
				$liveContent = $LiveInfo['content'];
			}
		}
		//时间转化为年月日 星期 时分
		if($QrCode['begin_time'] != '0000-00-00 00:00:00'){
			$QrCode['begin_time'] = substr($QrCode['begin_time'],0,10)." ".$this->get_week(substr($QrCode['begin_time'],0,10))." ".substr($QrCode['begin_time'],11,5);
		}
		
		//图片转成base64
		$QrCode['qrcodeBase'] = chunk_split(base64_encode(file_get_contents($QrCode['qrcode'])));
		$QrCode['qrcodeBase'] = 'data:' . ';base64,' . $QrCode['qrcodeBase'];
		$QrCode['liveContent'] = $liveContent;

		//用户头像
		$UserModel = new User();
		$userInfo = $UserModel->where('user_id',$user_id)->field('head_add')->find();
		if(empty($userInfo['head_add'])){
			$userHead = config('WX_DOMAIN').config('USER_HEAD_ADD');
			$QrCode['head_add'] = chunk_split(base64_encode(file_get_contents($userHead)));
			$QrCode['head_add'] = 'data:' . ';base64,' . $QrCode['head_add'];
		}else{
			$userHead = $userInfo['head_add'];
			if(mb_substr($userHead,7,3) == '/wx' || mb_substr($userHead,7,3) == 'wx.'){
				$userHead = substr_replace($userHead,'s:',4,1);	
			}
			$QrCode['head_add'] = chunk_split(base64_encode(file_get_contents($userHead)));
			$QrCode['head_add'] = 'data:' . ';base64,' . $QrCode['head_add'];
		}
		// echo '<img src="' . $QrCode['qrcodeBase'] . '" />';
        return $this->successJsonp($QrCode);die;
	}
	/**
	 * 关注时弹出二维码
	 * @param  [type] $teacherId 被关注讲师id
	 * @return [type]            [description]
	 */
	public function focus($teacherId){
		$LiveModel = new LiveM();
		//获取直播间id
		$liveInfo = $LiveModel->where('user_id',$teacherId)->find();
		if(empty($liveInfo)){
			return null;
		}
		$QrCodeModel = new QrCode();
		$QrCode = $QrCodeModel->index($liveInfo['id'],1,5,$teacherId);
		return $this->sucSysJson($QrCode['qrcode']);die;
	}
	function get_week($date){
	    //强制转换日期格式
	    $date_str=date('Y-m-d',strtotime($date));
	    //封装成数组
	    $arr=explode("-", $date_str);
	    //参数赋值
	    //年
	    $year=$arr[0];
	    //月，输出2位整型，不够2位右对齐
	    $month=sprintf('%02d',$arr[1]);
	    //日，输出2位整型，不够2位右对齐
	    $day=sprintf('%02d',$arr[2]);
	    //时分秒默认赋值为0；
	    $hour = $minute = $second = 0;
	    //转换成时间戳
	    $strap = mktime($hour,$minute,$second,$month,$day,$year);
	    //获取数字型星期几
	    $number_wk=date("w",$strap);
	    //自定义星期数组
	    $weekArr=array("星期日","星期一","星期二","星期三","星期四","星期五","星期六");
	    //获取数字对应的星期
	    return $weekArr[$number_wk];
  	}
}