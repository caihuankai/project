<?php
namespace app\wechat\controller;

use app\common\controller\ControllerBase;
use app\common\model\Chat;
use app\wechat\model\AccessToken;
use app\wechat\controller\UpdateAccessToken;
use think\config;
use think\Log;
use app\wechat\model\ThirdLogin;
use app\common\model\QrCode;
use app\wechat\model\Live;
use app\wechat\model\Course as CourseModel;
use app\wechat\model\UserJoin;
use app\wechat\model\Viewpoint as ViewpointModel;
use app\common\model\PushMessage as PushMessageM;
use app\wechat\model\PayOrder;
use app\wechat\model\Message as MessageM;

/**
 * 微信消息推送类
 * @author xiaok
 * @time 2017/06/12
 */

class SendChatMessage extends ControllerBase{
  
	public function sendMessage($user_id=0,$type=0,$money=0,$msg=''){
    $user_id = (int)$user_id;
    $type = (int)$type;
    $openid = '';
		$url = config('WX_DOMAIN').'/#/personalCenter/myincome/details';
    //获取用户openid
    $ThirdLoginModel = new ThirdLogin();
    $userInfo = $ThirdLoginModel->where('user_id',$user_id)->find();
    if(empty($userInfo)){
      return '';
    }else{
      $openid = $userInfo['open_id'];
    }
    $appId = config('wechat.app_id');
    $appSecret = config('wecaht.secret');
    $accessToken = $this->getAccessToken();
    $ChatModel = new Chat($accessToken,$appId,$appSecret);
    //消息类型 type: 1:apply //申请提现 2:success //成功到帐 3:fail //提现失败 
		switch ($type) {
			case 1:
				$tmp = [
                	"first" => [
                        "value" => '您申请一笔'.$money.'元的提现，已成功提交审批。审批情况我们会通过微信通知你',
                        "color" => "#173177"
                    ], "keyword1" => [
                       "value" => date('Y-m-d H:i:s'),
                       "color" => "#173177"
                    ], "keyword2" => [
                       "value" => '人民币'.$money.'元',
                       "color" => "#173177"
                    ],"keyword3" => [
                       "value" => '审核中',
                       "color" => "#173177"
                    ],"keyword4" => [
                       "value" => date('Y-m-d H:i:s',strtotime('+7 day')),
                       "color" => "#173177"
                    ], 
                ];
				$postData = [
                    'touser' => $openid,
                    'template_id' => config('wechat_template.apply_template'),
                    'url' => $url,
                    'topcolor' => '#FF0000',
                    'data' => $tmp,
                ];
				break;

			case 2:
				$tmp = [
                	"first" => [
                        "value" => '您申请的'.$money.'元提交已经到帐。',
                        "color" => "#173177"
                    ], "keyword1" => [
                       "value" => date('Y-m-d H:i:s'),
                       "color" => "#173177"
                    ], "keyword2" => [
                       "value" => '人民币'.$money.'元',
                       "color" => "#173177"
                    ],"keyword3" => [
                       "value" => '0元',
                       "color" => "#173177"
                    ],
                ];
				$postData = [
                    'touser' => $openid,
                    'template_id' => config('wechat_template.success_template'),
                    'url' => $url,
                    'topcolor' => '#FF0000',
                    'data' => $tmp,
                ];
				break;

			case 3:
				$tmp = [
                	"first" => [
                        "value" => '您申请的'.$money.'元提现审批失败。',
                        "color" => "#173177"
                    ],  "keyword1" => [
                       "value" => '人民币'.$money.'元',
                       "color" => "#173177"
                    ],"keyword2" => [
                       "value" => $msg,
                       "color" => "#173177"
                    ],"keyword3" => [
                       "value" => date('Y-m-d H:i:s'),
                       "color" => "#173177"
                    ],
                ];
				$postData = [
                    'touser' => $openid,
                    'template_id' => config('wechat_template.fail_template'),
                    'url' => $url,
                    'topcolor' => '#FF0000',
                    'data' => $tmp,
                ];
				break;
			
			default:
				# code...
				break;
		}
		
    Log::write('wx->send_template_data:' . json_encode($postData), 'message');
		$result = $ChatModel->sendTemplateMessage($postData);
		Log::write('wx->send_template_data result:' . json_encode($result), 'message');
		return $this->sucSysJson($result);
	}

	//获取access_token
	public function getAccessToken(){
		$AccessTokenModel = new AccessToken();
		$UpdateAccessTokenController = new UpdateAccessToken();
		$AccessTokenInfo = $AccessTokenModel->find();

		//判断是否更新access_token
		if(!empty($AccessTokenInfo)){
			//access_token是否过期
			if($AccessTokenInfo['access_expires_time'] < time()+60){
				$update = $UpdateAccessTokenController->update();
				$AccessTokenInfo = $AccessTokenModel->find();
			}
		}else{
			$update = $UpdateAccessTokenController->update();
			$AccessTokenInfo = $AccessTokenModel->find();
		}
		$accessToken = $AccessTokenInfo['access_token'];
		return $accessToken;
	}

//推送客服消息 v1.3 $type:1(成功创建直播间) 2(成功创建课程 关注直播间发布新课) 3(课程开始前15分钟) 4(课程禁用) 5(直播间禁用) 6(用户被禁用) 7(删除观点) 8(消息中心--会员即将过期提醒) 9(消息中心--月度课/季度课过期提醒)
  public function sendServiceMsg($id=1,$type=8){
    $id = (int)$id;
    $type = (int)$type;
    $QrCodeModel = new QrCode();
    switch ($type) {
      case 1:
        $LiveModel = new Live();
        $LiveInfo = $LiveModel->alias('l')->where('l.user_id',$id)
        ->join('third_login t','l.user_id = t.user_id')
        ->field('l.id,l.name,t.open_id')
        ->find();
        $url = config('WX_DOMAIN')."/#/personalCenter/liveroom/".$LiveInfo['id'];
        $msg = "恭喜您，成功创建直播间【".$LiveInfo['name']."】\n您可在直播间创建课程，即可开课。\n"."<a href='".$url."'>点击进入直播间</a>";
        $QrCodeModel->pushMsg($LiveInfo['open_id'],$msg);
        break;
      
      case 3:
        $CourseModel = new CourseModel();
        $CourseInfo = $CourseModel->alias('c')->where('c.id',$id)
        ->join('third_login t','c.uid = t.user_id')
        ->join('user u','u.user_id = c.uid')
        ->field('t.open_id,u.alias,c.teacher_name,c.begin_time,c.class_name,c.uid,c.pid,c.form')->find();
        $CourseInfo['begin_time'] = substr($CourseInfo['begin_time'],0,16);
        $teacher_url = config('WX_DOMAIN')."/#/onlive/".$id;
        if($CourseInfo['form'] == 3){
          $teacher_url = config('WX_DOMAIN')."/#/pptOnlive/".$id;
        }
        $studenrt_url = config('WX_DOMAIN')."/#/personalCenter/course/".$id;
        
        //父课程信息
        $parentCourseInfo = ['seriesType'=>0];
        if ($CourseInfo['pid'] > 0) {
        	$parentCourseInfo = $CourseModel->where('id', $CourseInfo['pid'])->field('seriesType')->find();
        }
        //月度课/季度课
        if ($parentCourseInfo['seriesType'] > 0) {
        	$teacher_url = $studenrt_url = config('WX_DOMAIN') . '/#/dacelueMini/courseDetail/' . $id;
        }
        $teacher_msg = "开课通知：您创建的课程准备开始啦，记得讲课哦！\n您的课程：【".$CourseInfo['class_name']."】\n开课时间：".$CourseInfo['begin_time']."\n<a href='".$teacher_url."'>点击即可进入讲课</a>";
        $student_msg = "开播通知：您报名的课程马上开课啦，记得参加哦！\n您已报名【".$CourseInfo['class_name']."】\n开播时间：".$CourseInfo['begin_time']."\n主讲人：".$CourseInfo['alias']."\n<a href='".$studenrt_url."'>点击进入即可参加</a>";
        //发送讲师开课信息
        $QrCodeModel->pushMsg($CourseInfo['open_id'],$teacher_msg);
        //发送学生开课信息
        $UserJoinModel = new UserJoin();
        $UserJoinList = $UserJoinModel->alias('u')->where('u.course_id',$id)
        ->join('third_login t','t.user_id = u.user_id')
        ->field('t.open_id,u.user_id')
        ->select();
        $userIdList = [];
        foreach ($UserJoinList as $k => $v) {
        	$userIdList[] = $v['user_id'];
        	$QrCodeModel->pushMsg($v['open_id'],$student_msg);
        }
        
        //创建消息中心记录
        if ($CourseInfo['pid'] == 0) {
        	//课程开始前15分钟(讲师、单次课)
	        $teacherIdList = [$CourseInfo['uid']];
	        $replaceArray = [
	        		'lead'=>[$CourseInfo['class_name']],
	        		'content'=>[
	        				$CourseInfo['class_name'],
	        				$CourseInfo['begin_time']
	        		]
	        ];
	        \MessageCenter::instance()->createMessageRecords('COURSE_START_TEACHER', ['courseId'=>$id], $replaceArray, $teacherIdList);
	        //课程开始前15分钟(学生、单次课)
	        $replaceArray = [
	        		'lead'=>[$CourseInfo['class_name']],
	        		'content'=>[
	        				$CourseInfo['class_name'],
	        				$CourseInfo['begin_time'],
	        				$CourseInfo['alias']
	        		]
	        ];
	        \MessageCenter::instance()->createMessageRecords('COURSE_START_STUDENT', ['courseId'=>$id], $replaceArray, $userIdList);
        }elseif ($CourseInfo['pid'] > 0) {
        	//系列课-子课程开始前15分钟(讲师)
        	$teacherIdList = [$CourseInfo['uid']];
        	$replaceArray = [
        			'lead'=>[$CourseInfo['class_name']],
        			'content'=>[
        					$CourseInfo['class_name'],
        					$CourseInfo['begin_time']
        			]
        	];
        	\MessageCenter::instance()->createMessageRecords('COURSE_SERIES_START_TEACHER', ['courseId'=>$id], $replaceArray, $teacherIdList);
        	//系列课-子课程开始前15分钟(学生)
        	$replaceArray = [
        			'lead'=>[$CourseInfo['class_name']],
        			'content'=>[
        					$CourseInfo['class_name'],
        					$CourseInfo['begin_time'],
        					$CourseInfo['alias']
        			]
        	];
        	
        	//月度课/季度课
        	if ($parentCourseInfo['seriesType'] > 0) {
        		\MessageCenter::instance()->createMessageRecords('COURSE_SERIES_H5_START_STUDENT', ['courseId'=>$id], $replaceArray, $userIdList);
        	}else {
	        	\MessageCenter::instance()->createMessageRecords('COURSE_SERIES_START_STUDENT', ['courseId'=>$id], $replaceArray, $userIdList);
        	}
        	
        }
        
      	break;
      
      case 7:
      	$viewPointModel = new ViewpointModel();
      	$viewPointInfo = $viewPointModel->alias('v')->where('v.id', $id)
      	->join('third_login t','v.uid = t.user_id')
      	->field('v.title,t.open_id')
      	->find();
      	
      	$msg = "您的观点《{$viewPointInfo['title']}》被删除\n您可在大策略公众号回复昵称+观点删除，来申请解禁以及了解原因。";
      	//发送消息
      	$QrCodeModel->pushMsg($viewPointInfo['open_id'],$msg);
      	break;

      case 8:
        set_time_limit(3600);
        $PayOrderModel = new PayOrder();
        //需要处理数据
        $dataList = $PayOrderModel->willExpiryColumnList();
        $MessageCenterC = new \MessageCenter();
        $MessageModel = new MessageM();
        // return $this->sucSysJson($dataList);
        foreach ($dataList as $k => $v) {
          $linkfos = ['columnId' => $v['class_id']];
          $const = 'COLUMN_EXPIRY_REMIND';
          $userIdList = [$v['user_id']];
          //三天后过期提醒
          if($v['expire_time'] > (strtotime(date("Y-m-d",strtotime("+3 day"))))){
            $replaceArray = [
                'type' => [0],
                'title' => [$v['name'],3],
                'lead' => [$v['name'],3],
                'content' => [$v['name'],3]
            ];
            $MessageCenterC->createMessageRecords($const, $linkfos, $replaceArray, $userIdList);
            // return '3天后过期';
          }
          //两天后过期
          elseif (strtotime(date("Y-m-d",strtotime("+3 day"))) > $v['expire_time'] && $v['expire_time'] > strtotime(date("Y-m-d",strtotime("+2 day")))) {
            $replaceArray = [
                'type' => [0],
                'title' => [$v['name'],2],
                'lead' => [$v['name'],2],
                'content' => [$v['name'],2]
            ];
            $MessageCenterC->createMessageRecords($const, $linkfos, $replaceArray, $userIdList);
            // return '2天后过期';
          }
          //一天后过期
          elseif(strtotime(date("Y-m-d",strtotime("+2 day"))) > $v['expire_time'] && $v['expire_time'] > strtotime(date("Y-m-d",strtotime("+1 day")))){
            $replaceArray = [
                'type' => [0],
                'title' => [$v['name'],1],
                'lead' => [$v['name'],1],
                'content' => [$v['name'],1]
            ];
            $MessageCenterC->createMessageRecords($const, $linkfos, $replaceArray, $userIdList);
            // return '1天后过期';
          }
          //今日过期
          else{
            $content = "您订阅的".$v['name']."栏目，已经到期，请您重新订阅";
            $insertData['user_id'] = $v['user_id'];
            $insertData['type'] = 10;
            $insertData['title'] = $content;
            $insertData['lead'] = $content;
            $insertData['content'] = $content;
            $insertData['link'] = 9;
            $insertData['link_info'] = '{"columnId":'.$v['class_id'].'}';
            $insertData['create_time'] = date('Y-m-d H:i:s',$v['expire_time']);
            $MessageModel->insert($insertData);
            // return '今日过期';
          }
        }
        break;
      case 9:
      	set_time_limit(3600);
      	$PayOrderModel = new PayOrder();
      	//需要处理数据
      	$dataList = $PayOrderModel->willExpiryCourseSeriesList();
      	$MessageCenterC = new \MessageCenter();
      	$MessageModel = new MessageM();
      	foreach ($dataList as $k => $v) {
      		$linkfos = ['courseId' => $v['class_id']];
      		$const = 'COURSE_SERIES_H5_EXPIRY_REMIND';
      		$userIdList = [$v['user_id']];
      		$overdueDate = date("Y-m-d", strtotime($v['overdue_time']));
      		//五天后过期提醒
      		if($v['overdue_time'] > date("Y-m-d",strtotime("+5 day")) ){
      			$replaceArray = [
      					'type' => [3],
      					'lead' => [$v['class_name'],$overdueDate],
      					'content' => [$v['class_name'],$overdueDate]
      			];
      			$MessageCenterC->createMessageRecords($const, $linkfos, $replaceArray, $userIdList);
      		}
      		//三天后过期
      		elseif ( date("Y-m-d",strtotime("+4 day")) > $v['overdue_time'] && $v['overdue_time'] > date("Y-m-d",strtotime("+3 day")) ) {
      			$replaceArray = [
      					'type' => [3],
      					'lead' => [$v['class_name'],$overdueDate],
      					'content' => [$v['class_name'],$overdueDate]
      			];
      			$MessageCenterC->createMessageRecords($const, $linkfos, $replaceArray, $userIdList);
      		}
      		//一天后过期
      		elseif( date("Y-m-d",strtotime("+2 day")) > $v['overdue_time'] && $v['overdue_time'] > date("Y-m-d",strtotime("+1 day")) ){
      			$replaceArray = [
      					'type' => [3],
      					'lead' => [$v['class_name'],$overdueDate],
      					'content' => [$v['class_name'],$overdueDate]
      			];
      			$MessageCenterC->createMessageRecords($const, $linkfos, $replaceArray, $userIdList);
      		}
      		//今日过期
      		else{
      			$content = "您订阅的课程【".$v['class_name']."】，已经到期，请您重新订阅";
      			$insertData['user_id'] = $v['user_id'];
      			$insertData['type'] = 30;
      			$insertData['title'] = $content;
      			$insertData['lead'] = $content;
      			$insertData['content'] = $content;
      			$insertData['link'] = 0;
      			$insertData['link_info'] = '';
      			$insertData['create_time'] = $v['overdue_time'];
      			$MessageModel->insert($insertData);
      		}
      	}
      	break;
      default:
        # code...
        break;
    }
  }
  /**
   * 后台消息推送
   * @param  [type] $id [description]
   * @return [type]     [description]
   */
  public function pushMsg($id){
    set_time_limit(0);
    $PushMessageModel = new PushMessageM();
    $where['status'] = 0;
    $where['type'] = ['in',[0,2,3]];
    $where['id'] = $id;
    // $where['push_type'] = 1;
    $data = $PushMessageModel->where($where)->find();
    if(empty($data)){
      return;
    }
    if($data['type'] == 0 ||$data['type'] == 2){
      $content = json_decode($data['content'],true);
      $data['jump_type'] = $content['jump_type'];
      $data['jump_url'] = $content['jump_url'];
      $data['title'] = $content['title'];
      $data['content'] = $content['content'];
      $data['image'] = $content['image'];
    }
    $PushMessageModel->where('id',$id)->update([
      'status' => 1,
      'update_time' => date('Y-m-d H:i:s'),
    ]);
    $QrCodeModel = new QrCode();
    return $QrCodeModel->pushMessage($data);
  }
  //
  public function pushMsgForUser($id,$user_id){
    $PushMessageModel = new PushMessageM();
    $where['status'] = 3;
    $where['type'] = ['in',[0,2,3]];
    $where['id'] = $id;
    // $where['push_type'] = 1;
    $data = $PushMessageModel->where($where)->find();
    if(empty($data)){
      return;
    }
    if($data['type'] == 0 ||$data['type'] == 2){
      $content = json_decode($data['content'],true);
      $data['jump_type'] = $content['jump_type'];
      $data['jump_url'] = $content['jump_url'];
      $data['title'] = $content['title'];
      $data['content'] = $content['content'];
      $data['image'] = $content['image'];
    }
    $data['push_target'] = 3;
    $data['user_id'] = $user_id;
    $PushMessageModel->where('id',$id)->update([
      'update_time' => date('Y-m-d H:i:s'),
    ]);
    $QrCodeModel = new QrCode();
    return $QrCodeModel->pushMessage($data);
  }
  /**
   * 更改订阅到期消息状态
   * @return [type] [description]
   */
  public function changeColumnMessageState(){
    $MessageM = new MessageM();
    $MessageM->changeColumnMessageState();
    $MessageM->changeCourseSeriesMessageState();
  }
  /**
   * 购买成功发送消息
   * @param  [type] $type    1：购买课程 2：购买观点 9：购买栏目
   * @param  [type] $id      对应type
   * @param  [type] $open_id [description]
   * @return [type]          [description]
   */
  public function sendBuyMsg($type,$id,$open_id){
    if($type == 1){
      $CourseModel = new CourseModel();
      $courseInfo = $CourseModel->where('id',$id)->field('class_name,type')->find();
      if ($courseInfo['type'] == 3) {//特训班
      	  $url = config('WX_DOMAIN')."/#/specialTrainAdvance/".$id;
      }else {//专题课、系列课
	      $url = config('WX_DOMAIN')."/#/personalCenter/course/".$id;
      }
      $msg = "您已成功报名课程【".$courseInfo['class_name']."】\n"."<a href='".$url."'>点击此处去课堂</a>";
    }elseif ($type == 2) {
      $ViewpointModel = new ViewpointModel();
      $name = $ViewpointModel->where('id',$id)->value('title');
      $url = config('WX_DOMAIN')."/#/column/detail/".$id;
      $msg = "您已成功购买【".$name."】\n"."<a href='".$url."'>点击此处去课堂</a>";
    }elseif($type == 9){
      $ColumnModel = new \app\wechat\model\Column();
      $name = $ColumnModel->where('id',$id)->value('name');
      $url = config('WX_DOMAIN')."/#/periodical/".$id;
      $msg = "您已成功订阅栏目【".$name."】\n"."<a href='".$url."'>点击此处去课堂</a>";
    }else{
      return;
    }
    $QrCodeModel = new QrCode();
    $QrCodeModel->pushMsg($open_id,$msg);
  }
}