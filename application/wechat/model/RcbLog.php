<?php
namespace app\wechat\model;

use app\common\model\ModelBs;
use app\wechat\model\User;
use app\common\model\Course;
use app\wechat\model\PayOrder;
use app\common\model\Fans;
use app\wechat\model\ThirdLogin;
use app\common\model\Brokerage;
use app\wechat\model\AdmireRank;
use app\common\model\Live as LiveR;
use app\wechat\model\InvitationcardRep;
use app\wechat\model\RedpacketInfo;
use app\common\model\GlobalLive;

/**
 * 支付回调
 * 余额变更日志
 * @author xiaok
 * @time 2017/06/15
 */
class RcbLog extends ModelBs{
	//用户购买回调时更新对应信息
	public function updateInfo($data,$orderNo,$result,$third_ip){
		//获取分成比例
		$BrokerageModel = new Brokerage();
		$BrokerageModelData = $BrokerageModel->find();
		if(empty($BrokerageModelData)){
			$platform_brokerage = 10;//平台自卖佣金
			$divide_brokerage = 30;//课程分销佣金
		}else{
			$platform_brokerage = (int)$BrokerageModelData['platform_brokerage'];//平台自卖佣金
			$divide_brokerage = (int)$BrokerageModelData['divide_brokerage'];//课程分销佣金
		}
		$insert_common_status = 0;
		$this->db()->startTrans();
        try {	
			$PayOrderModel = new PayOrder();
			//更新订单状态
			$resultPayOrder = $PayOrderModel->db()->where('order_no',$orderNo)
	        ->update([
	            'third_order_no'  => $result['transaction_id'],
	            'total_fee' => $result['total_fee']/100,
	            'pay_time' => date('Y-m-d H:i:s'),
	            'state' => 1,
	            'third_ip' => $third_ip,

	        ]);
	        $amount_total = $data['amount'];
	        //扣除百分之零点六手续费
	        $data['amount'] = $data['amount'] - $data['amount']*0.006;
	        //要先减去平台分成
	        // $data['amount'] = $data['amount'] - $data['amount']*$platform_brokerage/100;
	        // $data['amount'] = $data['amount']*10000;//测试1分等于100元
	        if($resultPayOrder){
	        	//用户帐户 订单日志表操作
				$UserModel = new User();
				//获取订单类型
				$noInfoType = $PayOrderModel->where('order_no',$data['order_no'])->field('type')->find();
				//购买课程
				if($noInfoType['type'] == 1){
					//获取订单详细信息
					$noInfo = $PayOrderModel->alias('p')
					->field('p.user_id,u.alias,c.id as course_id,c.class_name,c.uid')
					->where('p.order_no',$data['order_no'])
					->join('course c','c.id = p.class_id','left')
					->join('user u','u.user_id = p.user_id','left')
					->find();
				}
				//购买观点
				if($noInfoType['type'] == 2){
					//获取订单详细信息
					$noInfo = $PayOrderModel->alias('p')
					->field('p.user_id,u.alias,c.id as course_id,c.title as class_name,c.uid')
					->where('p.order_no',$data['order_no'])
					->join('viewpoint c','c.id = p.class_id','left')
					->join('user u','u.user_id = p.user_id','left')
					->find();
				}
				//live直播赞赏
				if($noInfoType['type'] == 3){
					//获取订单详细信息
					$noInfo = $PayOrderModel->alias('p')
					->field('p.user_id,u.alias,p.class_id as course_id')
					->where('p.order_no',$data['order_no'])
					->join('user u','u.user_id = p.user_id','left')
					->find();
					$noInfo['class_name'] = '';
					$noInfo['uid'] = $noInfo['course_id'];
				}
				

				//判断用户是否已为某人粉丝
				$FansModel = new Fans();
				$FansInfo = $FansModel->where('open_id',$data['openid'])->find();

				//课程所属人账号余额
				$class_user_account = $UserModel->field('income_total,income')->where('user_id',$noInfo['uid'])->find();

				//如果用户不为任何人粉丝
				if(empty($FansInfo)){
					//分钱时刻 课程所属人获得百分之百
					$class_user_income_total = $class_user_account['income_total'] + substr(sprintf("%.3f",$data['amount']*0.9),0,-1);//账户历史收益总金额
					$class_user_income = $class_user_account['income'] + substr(sprintf("%.3f",$data['amount']*0.9),0,-1);//账户收益总金额
					$update_class_user_account = $UserModel->db()->where('user_id',$noInfo['uid'])->update([
							'income_total'  => $class_user_income_total,
		                    'income' => $class_user_income,
						]);

					//插入余额变更日志表
					$insert_class_user_log['user_id'] = $noInfo['uid'];
					$insert_class_user_log['order_no'] = $orderNo;
					$insert_class_user_log['fans_id'] = $noInfo['user_id'];
					$insert_class_user_log['class_id'] = $noInfo['course_id'];
					$insert_class_user_log['type'] = 'class_income';
					$insert_class_user_log['available_amount'] = substr(sprintf("%.3f",$data['amount']*0.9),0,-1);
					$insert_class_user_log['add_time'] = date('Y-m-d H:i:s');
					$insert_common_status = $insert_class_user_log_status = $this->db()->insertGetId($insert_class_user_log);
				}else{
					//购买用户的偶像和课程所属者为同一人 则课程所属者获得百分之九十
					if($FansInfo['invita_userid'] == $noInfo['uid']){
						//分钱时刻 课程所属人获得百分之百
						// 账户历史收益总金额
						$class_user_income_total = $class_user_account['income_total'] + substr(sprintf("%.3f",$data['amount']*0.9),0,-1);//账户历史收益总金额
						$class_user_income = $class_user_account['income'] + substr(sprintf("%.3f",$data['amount']*0.9),0,-1);//账户收益总金额
						$update_class_user_account = $UserModel->db()->where('user_id',$noInfo['uid'])->update([
							'income_total'  => $class_user_income_total,
		                    'income' => $class_user_income,
						]);
						//插入余额变更日志表
						$insert_class_user_log['user_id'] = $noInfo['uid'];
						$insert_class_user_log['order_no'] = $orderNo;
						$insert_class_user_log['fans_id'] = $noInfo['user_id'];
						$insert_class_user_log['class_id'] = $noInfo['course_id'];
						$insert_class_user_log['type'] = 'class_income';
						$insert_class_user_log['available_amount'] = substr(sprintf("%.3f",$data['amount']*0.9),0,-1);
						$insert_class_user_log['add_time'] = date('Y-m-d H:i:s');
						$insert_common_status = $insert_class_user_log_status = $this->db()->insertGetId($insert_class_user_log);
					}else{
						//分钱时刻 课程所属人获得百分之九十八 
						//邀请人获得百分之二
						$class_user_income_total = $class_user_account['income_total'] + substr(sprintf("%.3f",$data['amount']*(100-$divide_brokerage-$platform_brokerage)/100),0,-1);//账户历史收益总金额
						$class_user_income = $class_user_account['income'] + substr(sprintf("%.3f",$data['amount']*(100-$divide_brokerage-$platform_brokerage)/100),0,-1);//账户收益总金额
						$update_class_user_account = $UserModel->db()->where('user_id',$noInfo['uid'])->update([
								'income_total'  => $class_user_income_total,
			                    'income' => $class_user_income,
							]);

						//用户偶像id
						$user_master_id = $FansInfo['invita_userid'];
						//用户偶像账号余额
						$master_user_account = $UserModel->field('income_total,income')->where('user_id',$user_master_id)->find();

						$master_user_income_total = $master_user_account['income_total'] + substr(sprintf("%.3f",$data['amount']*$divide_brokerage/100),0,-1);//账户历史收益总金额
						$master_user_income = $master_user_account['income'] + substr(sprintf("%.3f",$data['amount']*$divide_brokerage/100),0,-1);//账户收益总金额
						$update_master_user_account = $UserModel->db()->where('user_id',$FansInfo['invita_userid'])->update([
								'income_total'  => $master_user_income_total,
			                    'income' => $master_user_income,
							]);

						//插入余额变更日志表
						$insert_class_user_log['user_id'] = $noInfo['uid'];
						$insert_class_user_log['order_no'] = $orderNo;
						$insert_class_user_log['fans_id'] = $noInfo['user_id'];
						$insert_class_user_log['class_id'] = $noInfo['course_id'];
						$insert_class_user_log['type'] = 'class_income';
						$insert_class_user_log['available_amount'] = substr(sprintf("%.3f",$data['amount']*(100-$divide_brokerage-$platform_brokerage)/100),0,-1);
						$insert_class_user_log['add_time'] = date('Y-m-d H:i:s');
						$insert_class_user_log_status = $this->db()->insert($insert_class_user_log);

						//插入余额变更日志表
						$insert_master_user_log['user_id'] = $user_master_id;
						$insert_master_user_log['order_no'] = $orderNo;
						$insert_master_user_log['fans_id'] = $noInfo['user_id'];
						$insert_master_user_log['class_id'] = $noInfo['course_id'];
						$insert_master_user_log['type'] = 'commission';
						$insert_master_user_log['available_amount'] = substr(sprintf("%.3f",$data['amount']*$divide_brokerage/100),0,-1);
						$insert_master_user_log['add_time'] = date('Y-m-d H:i:s');
						//购买课程 观点
						if($noInfoType['type'] == 1 || $noInfoType['type'] == 2){
							$insert_master_user_log['description'] = $noInfo['alias'].'购买《'.$noInfo['class_name'].'》';
						}
						//赞赏
						if($noInfoType['type'] == 3){
							$insert_master_user_log['description'] = $noInfo['alias'].'送礼，获'.substr(sprintf("%.3f",$data['amount']*$divide_brokerage/100),0,-1).'元';
						}
						
						$insert_common_status = $this->db()->insertGetId($insert_master_user_log);
					}
				}
		        //储存订单原始状态
		        $ThirdLoginModel = new ThirdLogin();//获取用户user_id;
		        $original_user_info = $ThirdLoginModel->where('open_id',$data['openid'])->field('user_id')->find();
		        $original_user_info_userid = $original_user_info['user_id'];
		        $original_data['order_no'] = $orderNo;
		        $original_data['user_id'] = $original_user_info_userid;
		        $original_data['class_id'] = $noInfo['course_id'];
		        $original_data['type'] = 'order_pay';
		        $original_data['add_time'] = date('Y-m-d H:i:s');
		        $original_data['available_amount'] = $amount_total;
		        //插入余额日志变更表
		        $original_data_status = $this->db()->insertGetId($original_data);        
	        }
	        $this->db()->commit();
        } catch (Exception $e) {
            $this->db()->rollback();
        }
        if($original_data_status>0){
        	return true;
        }
        return false;
	}

	/**
	 * 用户充值回调
	 * @param  [type] $data     [description]
	 * @param  [type] $orderNo  [description]
	 * @param  [type] $result   [description]
	 * @param  [type] $third_ip [description]
	 * @return [type]           [description]
	 */
	public function inpourUpdateInfo($data,$orderNo,$result,$third_ip,$orderuser_id){
		$insert_common_status = 0;
		$this->db()->startTrans();
        try {	
			$PayOrderModel = new PayOrder();
			//更新订单状态
			$resultPayOrder = $PayOrderModel->db()->where('order_no',$orderNo)
	        ->update([
	            'third_order_no'  => $result['transaction_id'],
	            'total_fee' => $result['total_fee']/100,
	            'pay_time' => date('Y-m-d H:i:s'),
	            'state' => 1,
	            'third_ip' => $third_ip,

	        ]);


	        //储存订单原始状态
	        $ThirdLoginModel = new ThirdLogin();//获取用户user_id;
	        $original_user_info = $ThirdLoginModel->where('user_id',$orderuser_id)->field('user_id')->find();
	        $original_user_info_userid = $original_user_info['user_id'];
	        $original_data['order_no'] = $orderNo;
	        $original_data['user_id'] = $original_user_info_userid;
	        $original_data['class_id'] = 0;
	        $original_data['type'] = 'order_pay';
	        $original_data['add_time'] = date('Y-m-d H:i:s');
	        $original_data['available_amount'] = $data['amount'];
	        //插入余额日志变更表  下单记录
	        $this->db()->insert($original_data);
	        //点劵进账记录
	        $original_data['type'] = 'inpour';
	        $insert_common_status = $this->db()->insertGetId($original_data);

	        //更新用户帐户
	        $UserModel = new User();
	        $UserModel->db()->where('user_id',$original_user_info['user_id'])->setInc('inpour_total',$data['amount']);
	        $UserModel->db()->where('user_id',$original_user_info['user_id'])->setInc('account_balance',$data['amount']);
	        
	        //获取用户成长等级
	        $userInfo = $UserModel->where('user_id',$original_user_info['user_id'])->field('vip_level,inpour_total')->find();
	        $level = $userInfo['vip_level'];
	        $new_level = $this->getLevel($userInfo['inpour_total']+$data['amount']);
	        if($new_level > $level){
	        	$UserModel->db()->where('user_id',$original_user_info['user_id'])->update([
	        		'vip_level' => $new_level,
        		]);
	        }

	        $this->db()->commit();
        } catch (Exception $e) {
            $this->db()->rollback();
        }
        if($insert_common_status>0){
        	return true;
        }
        return false;
	}
	//用户购买回调时更新对应信息
	public function saveInfo($data,$orderNo,$result,$third_ip,$user_id){
		//获取分成比例
		$BrokerageModel = new Brokerage();
		$BrokerageModelData = $BrokerageModel->find();
		if(empty($BrokerageModelData)){
			$platform_brokerage = 10;//平台自卖佣金
			$divide_brokerage = 30;//课程分销佣金
		}else{
			$platform_brokerage = (int)$BrokerageModelData['platform_brokerage'];//平台自卖佣金
			$divide_brokerage = (int)$BrokerageModelData['divide_brokerage'];//课程分销佣金
		}
    	$CourseModel = new Course();
		if($data['type'] == 6){
			$userInfoToCourse = $CourseModel->where('id',$data['class_id'])->field('uid')->find();
			if(empty($userInfoToCourse)){
				return false;
			}
			$data['class_id'] = $userInfoToCourse['uid'];
		}
		if($data['type'] == 8){
			$GlobalLiveModel = new GlobalLive();
			$GlobalLiveInfo = $GlobalLiveModel->field('user_id')->where('id',$data['class_id'])->find();
			$data['class_id'] = !empty($GlobalLiveInfo) ? $GlobalLiveInfo['user_id'] : 0;
		}
		$insert_common_status = 0;
		$this->db()->startTrans();
        try {

			$PayOrderModel = new PayOrder(); 
			//更新订单状态
			$resultPayOrder = $PayOrderModel->db()->where('order_no',$orderNo)
	        ->update([
	            'third_order_no'  => $result['transaction_id'],
	            'total_fee' => $result['total_fee']/100,
	            'pay_time' => date('Y-m-d H:i:s'),
	            'state' => 1,
	            'third_ip' => $third_ip,

	        ]);

        	$InvitationcardRepModel = new InvitationcardRep();
			$InvitationcardRepData['open_id'] = $user_id;
			$InvitationcardRepData['create_time'] = time();
			$InvitationcardRepModel->db()->insert($InvitationcardRepData);

        	//如果支付类型为赞赏 则记录用户赞赏对应房间总额 且更新房间被赞赏次数和赞赏总额
            if($data['type'] == 3 || $data['type'] == 6){
                $AdmireRankModel = new AdmireRank();
                $remarkData = json_decode($data['remark'],true);
                $rankType = isset($remarkData['courseId']) ? 2 : 1;
                $pushsite = isset($remarkData['courseId']) ? 1 : 0;
                $pushRoomId = isset($remarkData['courseId']) ? $remarkData['courseId'] : $data['class_id'];

                $AdmireRankWhere['master_userid'] = $pushRoomId;
				$AdmireRankWhere['user_id'] = $data['user_id'];
				$AdmireRankWhere['type'] = $rankType;
				$userRecord = $AdmireRankModel->where($AdmireRankWhere)->find();
				//如果用户不存在记录 则插入记录
				if(empty($userRecord)){
					$AdmireRankdata = $AdmireRankWhere;
					$AdmireRankdata['total'] = $data['amount'];
					$AdmireRankModel->db()->insert($AdmireRankdata);
				}else{
					$AdmireRankModel->db()->where($AdmireRankWhere)->update([
						'total' => $userRecord['total'] + $data['amount'],
					]);
				}
				if($pushsite == 0){
					//更新房间被赞赏次数和赞赏总额
		            $LiveModel = new LiveR();
		            $LiveModel->db()->where('user_id',$data['class_id'])->setInc('admire_num');
		        	$LiveModel->db()->where('user_id',$data['class_id'])->setInc('admire_amount',$data['amount']);
				}else{
					$CourseModel->db()->where('id',$pushRoomId)->setInc('admire_num');
		        	$CourseModel->db()->where('id',$pushRoomId)->setInc('admire_amount',$data['amount']);
				}
            }

        	//增加用户消费金额 扣除用户帐户金额
	        $UserModel = new User();
	        $userInfo = $UserModel->where('user_id',$user_id)->find();
	        if(empty($userInfo)){
	        	return $this->errorJson(JsonResult::ERR_USERINFO_NULL);
	        }
	        //用户帐户余额不足
	        if($userInfo['account_balance'] < $data['amount']){
	        	return false;
	        }
	        $UserModel->db()->where('user_id',$user_id)->update([
	        	'consume_total'	=> $userInfo['consume_total'] + $data['amount'],
	        	'account_balance'	=> $userInfo['account_balance'] - $data['amount'],
	    	]);	
	        $amount_total = $data['amount'];
	        //扣除百分之零点六手续费
	        $data['amount'] = $data['amount'] - $data['amount']*0.006;
	        if($resultPayOrder){
	        	//用户帐户 订单日志表操作
				$UserModel = new User();
				//获取订单类型
				$noInfoType = $PayOrderModel->where('order_no',$data['order_no'])->field('type')->find();
				//购买课程
				if($noInfoType['type'] == 1 || $noInfoType['type'] == 6){
					//获取订单详细信息
					$noInfo = $PayOrderModel->alias('p')
					->field('p.user_id,u.alias,c.id as course_id,c.class_name,c.uid')
					->where('p.order_no',$data['order_no'])
					->join('course c','c.id = p.class_id','left')
					->join('user u','u.user_id = p.user_id','left')
					->find();
				}
				//购买观点
				if($noInfoType['type'] == 2){
					//获取订单详细信息
					$noInfo = $PayOrderModel->alias('p')
					->field('p.user_id,u.alias,c.id as course_id,c.title as class_name,c.uid')
					->where('p.order_no',$data['order_no'])
					->join('viewpoint c','c.id = p.class_id','left')
					->join('user u','u.user_id = p.user_id','left')
					->find();
				}
				//live直播赞赏
				if($noInfoType['type'] == 3  ||  $noInfoType['type'] == 7){
					//获取订单详细信息
					$noInfo = $PayOrderModel->alias('p')
					->field('p.user_id,u.alias,p.class_id as course_id')
					->where('p.order_no',$data['order_no'])
					->join('user u','u.user_id = p.user_id','left')
					->find();
					$noInfo['class_name'] = '';
					$noInfo['uid'] = $noInfo['course_id'];
				}
				//公共直播间送礼
				if($noInfoType['type'] == 8){
					//获取订单详细信息
					$noInfo = $PayOrderModel->alias('p')
					->field('p.user_id,u.alias,p.class_id as course_id,g.user_id as uid')
					->where('p.order_no',$data['order_no'])
					->join('talk_global_live g','p.class_id = g.id','left')
					->join('user u','u.user_id = p.user_id','left')
					->find();
					$noInfo['class_name'] = '';
				}
				

				//判断用户是否已为某人粉丝
				// $FansModel = new Fans();
				// $FansInfo = $FansModel->where('open_id',$data['openid'])->find();
				// //判断用户上级是否为助教 助教不参与分成
				// if(!empty($FansInfo)){
				// 	$is_assistant = $UserModel->where('user_id',$FansInfo['invita_userid'])->value('is_assistant');
				// 	if($is_assistant == 1){
				// 		$FansInfo = array();
				// 	}
				// }
				//2.1需求 用户移除上级绑定
				$FansInfo = array();

				
				//订阅栏目不走这块
				if($data['type'] != 9){
				//课程所属人账号余额
				$class_user_account = $UserModel->field('income_total,income')->where('user_id',$noInfo['uid'])->find();
				//如果用户不为任何人粉丝
				if(empty($FansInfo)){
					//分钱时刻 课程所属人获得百分之百
					$class_user_income_total = $class_user_account['income_total'] + substr(sprintf("%.3f",$data['amount']*1),0,-1);//账户历史收益总金额
					$class_user_income = $class_user_account['income'] + substr(sprintf("%.3f",$data['amount']*1),0,-1);//账户收益总金额

					//插入余额变更日志表
					$insert_class_user_log['user_id'] = $noInfo['uid'];
					$insert_class_user_log['order_no'] = $orderNo;
					$insert_class_user_log['fans_id'] = $noInfo['user_id'];
					$insert_class_user_log['class_id'] = $noInfo['course_id'];
					$insert_class_user_log['type'] = 'class_income';
					$insert_class_user_log['available_amount'] = substr(sprintf("%.3f",$data['amount']*1),0,-1);
					$insert_class_user_log['add_time'] = date('Y-m-d H:i:s');
					

					if($data['type'] != 8){
						$update_class_user_account = $UserModel->db()->where('user_id',$noInfo['uid'])->update([
							'income_total'  => $class_user_income_total,
		                    'income' => $class_user_income,
						]);
						$insert_common_status = $insert_class_user_log_status = $this->db()->insertGetId($insert_class_user_log);
					}else{
						if($data['class_id'] != 0){
							$update_class_user_account = $UserModel->db()->where('user_id',$noInfo['uid'])->update([
							'income_total'  => $class_user_income_total,
		                    'income' => $class_user_income,
							]);
							$insert_common_status = $insert_class_user_log_status = $this->db()->insertGetId($insert_class_user_log);
						}
					}
				}else{
					//购买用户的偶像和课程所属者为同一人 则课程所属者获得百分之九十
					if($FansInfo['invita_userid'] == $noInfo['uid']){
						//分钱时刻 课程所属人获得百分之百
						// 账户历史收益总金额
						$class_user_income_total = $class_user_account['income_total'] + substr(sprintf("%.3f",$data['amount']*1),0,-1);//账户历史收益总金额
						$class_user_income = $class_user_account['income'] + substr(sprintf("%.3f",$data['amount']*1),0,-1);//账户收益总金额
						$update_class_user_account = $UserModel->db()->where('user_id',$noInfo['uid'])->update([
							'income_total'  => $class_user_income_total,
		                    'income' => $class_user_income,
						]);
						//插入余额变更日志表
						$insert_class_user_log['user_id'] = $noInfo['uid'];
						$insert_class_user_log['order_no'] = $orderNo;
						$insert_class_user_log['fans_id'] = $noInfo['user_id'];
						$insert_class_user_log['class_id'] = $noInfo['course_id'];
						$insert_class_user_log['type'] = 'class_income';
						$insert_class_user_log['available_amount'] = substr(sprintf("%.3f",$data['amount']*1),0,-1);
						$insert_class_user_log['add_time'] = date('Y-m-d H:i:s');
						$insert_common_status = $insert_class_user_log_status = $this->db()->insertGetId($insert_class_user_log);
					}else{
						//分钱时刻 课程所属人获得百分之九十八 
						//邀请人获得百分之二
						$class_user_income_total = $class_user_account['income_total'] + substr(sprintf("%.3f",$data['amount']*(100-$divide_brokerage-$platform_brokerage)/100),0,-1);//账户历史收益总金额
						$class_user_income = $class_user_account['income'] + substr(sprintf("%.3f",$data['amount']*(100-$divide_brokerage-$platform_brokerage)/100),0,-1);//账户收益总金额
						
						//插入余额变更日志表
						$insert_class_user_log['user_id'] = $noInfo['uid'];
						$insert_class_user_log['order_no'] = $orderNo;
						$insert_class_user_log['fans_id'] = $noInfo['user_id'];
						$insert_class_user_log['class_id'] = $noInfo['course_id'];
						$insert_class_user_log['type'] = 'class_income';
						$insert_class_user_log['available_amount'] = substr(sprintf("%.3f",$data['amount']*(100-$divide_brokerage-$platform_brokerage)/100),0,-1);
						$insert_class_user_log['add_time'] = date('Y-m-d H:i:s');
						if($data['type'] != 8){
							$update_class_user_account = $UserModel->db()->where('user_id',$noInfo['uid'])->update([
									'income_total'  => $class_user_income_total,
				                    'income' => $class_user_income,
								]);
							$insert_class_user_log_status = $this->db()->insert($insert_class_user_log);
						}else{
							if($data['class_id'] != 0){
								$update_class_user_account = $UserModel->db()->where('user_id',$noInfo['uid'])->update([
									'income_total'  => $class_user_income_total,
				                    'income' => $class_user_income,
								]);
								$insert_class_user_log_status = $this->db()->insert($insert_class_user_log);
							}
						}
					

						//用户偶像id
						$user_master_id = $FansInfo['invita_userid'];
						//用户偶像账号余额
						$master_user_account = $UserModel->field('income_total,income')->where('user_id',$user_master_id)->find();

						$master_user_income_total = $master_user_account['income_total'] + substr(sprintf("%.3f",$data['amount']*$divide_brokerage/100),0,-1);//账户历史收益总金额
						$master_user_income = $master_user_account['income'] + substr(sprintf("%.3f",$data['amount']*$divide_brokerage/100),0,-1);//账户收益总金额
						$update_master_user_account = $UserModel->db()->where('user_id',$FansInfo['invita_userid'])->update([
								'income_total'  => $master_user_income_total,
			                    'income' => $master_user_income,
							]);

						//插入余额变更日志表
						$insert_master_user_log['user_id'] = $user_master_id;
						$insert_master_user_log['order_no'] = $orderNo;
						$insert_master_user_log['fans_id'] = $noInfo['user_id'];
						$insert_master_user_log['class_id'] = $noInfo['course_id'];
						$insert_master_user_log['type'] = 'commission';
						$insert_master_user_log['available_amount'] = substr(sprintf("%.3f",$data['amount']*$divide_brokerage/100),0,-1);
						$insert_master_user_log['add_time'] = date('Y-m-d H:i:s');
						//购买课程 观点
						if($noInfoType['type'] == 1 || $noInfoType['type'] == 2){
							$insert_master_user_log['description'] = $noInfo['alias'].'购买《'.$noInfo['class_name'].'》';
						}
						//赞赏
						if($noInfoType['type'] == 3){
							$insert_master_user_log['description'] = $noInfo['alias'].'送礼，获'.substr(sprintf("%.3f",$data['amount']*$divide_brokerage/100),0,-1).'元';
						}
						
						$insert_common_status = $this->db()->insertGetId($insert_master_user_log);
					}
				}
				}else{
					if(!empty($FansInfo)){
						//用户偶像id
						$user_master_id = $FansInfo['invita_userid'];
						//用户偶像账号余额
						$master_user_account = $UserModel->field('income_total,income')->where('user_id',$user_master_id)->find();

						$master_user_income_total = $master_user_account['income_total'] + substr(sprintf("%.3f",$data['amount']*$divide_brokerage/100),0,-1);//账户历史收益总金额
						$master_user_income = $master_user_account['income'] + substr(sprintf("%.3f",$data['amount']*$divide_brokerage/100),0,-1);//账户收益总金额
						$update_master_user_account = $UserModel->db()->where('user_id',$FansInfo['invita_userid'])->update([
								'income_total'  => $master_user_income_total,
			                    'income' => $master_user_income,
							]);

						//插入余额变更日志表
						$insert_master_user_log['user_id'] = $user_master_id;
						$insert_master_user_log['order_no'] = $orderNo;
						$insert_master_user_log['fans_id'] = $data['user_id'];
						$insert_master_user_log['class_id'] = $data['class_id'];
						$insert_master_user_log['type'] = 'commission';
						$insert_master_user_log['available_amount'] = substr(sprintf("%.3f",$data['amount']*$divide_brokerage/100),0,-1);
						$insert_master_user_log['add_time'] = date('Y-m-d H:i:s');
						$insert_common_status = $this->db()->insertGetId($insert_master_user_log);
					}
				}
		        $original_user_info_userid = $user_id;
		        $original_data['order_no'] = $orderNo;
		        $original_data['user_id'] = $original_user_info_userid;
		        if($data['type'] != 9){
		        	$original_data['class_id'] = $noInfo['course_id'];		        	
		        }else{
		        	$original_data['class_id'] = $data['class_id'];	 
		        }
		        $original_data['type'] = 'order_pay';
		        $original_data['add_time'] = date('Y-m-d H:i:s');
		        $original_data['available_amount'] = $amount_total;
		        //插入余额日志变更表
		        $original_data_status = $this->db()->insertGetId($original_data);        
	        }
	        $this->db()->commit();
        } catch (Exception $e) {
            $this->db()->rollback();
        }
        if($original_data_status>0){
        	$resultData['account_balance'] = $userInfo['account_balance'];
        	$resultData['amount_total'] = $amount_total;
        	return $resultData;
        }
        return false;
	}

	/**
	 * 获取用户礼点变动明细
	 * @param unknown $orderType
	 * @param number $pageNo
	 * @param number $perPage
	 * @param string $orderBy
	 * @return \think\Collection|\think\db\false|PDOStatement|string
	 * @author liujuneng
	 */
	public function getRcbLogInpourWithPayOrder($userId, $orderType, $pageNo = 1, $perPage = 10, $orderBy = 'rl.id desc')
	{
		$field = [
			'rl.user_id'=>$userId,
		];
		$queryStr = 'rl.*,po.type as order_type,po.num';
		
		if (!empty($orderType)) {
			$field['po.type'] = $orderType < 10 ? $orderType : floor($orderType/10);
		}else {
			$field['po.type'] = ['<>', 8];//8:公共直播间送礼,暂不显示
		}
		if (in_array($orderType, [11,12,2,3,6,7])) {
			$field['rl.type'] = 'order_pay';
			if ($orderType == 11) {
				$queryStr .= ',c.type as course_type';
				$this->join('talk_course c', 'c.id=rl.class_id')->where('c.type', 1);
			}elseif ($orderType == 12) {
				$queryStr .= ',c.type as course_type';
				$this->join('talk_course c', 'c.id=rl.class_id')->where('c.type', 2);
			}
		}elseif ($orderType == 4) {
			//充值时会生成rl.type=inpour|order_pay各一条记录，单独查询时取inpour的记录
			$field['rl.type'] = 'inpour';
		}elseif ($orderType == 51) {
			$field['rl.type'] = 'readpacket_send';
		}elseif ($orderType == 52) {
			$field['rl.type'] = 'readpacket_get';
		}elseif ($orderType == 53) {
			$field['rl.type'] = 'readpacket_back';
		}else {
			$this->join('talk_course c', 'c.id=rl.class_id', 'left');
			$queryStr .= ',c.type as course_type';
			$this->where(function ($query) {
				$query->whereOr(function ($q) {
					$q->where('po.type', 4)->where('rl.type', 'inpour');
				})->whereOr(function ($q){
					$q->where('po.type', '<>', 4)->where('rl.type', 'in', ['order_pay','readpacket_send','readpacket_get','readpacket_back']);
				});
			});
		}

		$data = $this->alias('rl')
		->field($queryStr)
		->where($field)
		->join('talk_pay_order po', 'rl.order_no = po.order_no')
		->order($orderBy)
		->page($pageNo, $perPage)
		->select();

		//如果是红包类，则需要额外查询对应红包信息
		$redpacketIdList = [];
		$redpacketTypeList = [];
		foreach ($data as $info) {
			if ($info['order_type'] == 5) {
				$redpacketIdList[] = $info['class_id'];
			}
		}
		if (!empty($redpacketIdList)) {
			$redpacketInfoModel = new RedpacketInfo();
			$redpacketTypeList = $redpacketInfoModel->where('id', 'in', $redpacketIdList)->fetchClass('\CollectionBase')->select()->column('type', 'id');
		}
		if (!empty($redpacketTypeList)) {
			foreach ($data as $info) {
				if ($info['order_type'] == 5) {
					$classId = $info['class_id'];
					$info['redpacket_type'] = $redpacketTypeList[$classId];
				}
			}
		}
		
		return $data;
	}
	
	
	/**
	 * 返回用户等级
	 * @param  [type] $total [description]
	 * @return [type]        [description]
	 */
	public function getLevel($total){
        if(100 > $total && $total >= 0.01){
			$level = 1;
		}
		elseif (1000 > $total && $total >= 100) {
			$level = 2;
		}
		elseif (3000 > $total && $total >= 1000) {
			$level = 3;
		}
		elseif (5000 > $total && $total >= 3000) {
			$level = 4;
		}
		elseif (8000 > $total && $total >= 5000) {
			$level = 5;
		}
		elseif (20000 > $total && $total >= 8000) {
			$level = 6;
		}
		elseif (60000 > $total && $total >= 20000) {
			$level = 7;
		}
		elseif ($total >= 60000) {
			$level = 8;
		}else{
			$level = 0;
		}
		return $level;
	}
    
    
    /**
     * 还差多少
     *
     * @param $num
     * @return int|string
     * @author aozhuochao
     */
    public function diffLevelNum($num)
    {
        return (new \helper\RangeData((new \app\wechat\model\User())->getVipLevelRange()))->diffNext($num);
	}
	
	
    public function getNextKey($num)
    {
        return (new \helper\RangeData((new \app\wechat\model\User())->getVipLevelRange()))->getNextKey($num);
	}
	
    public function getNextKeyByKey($key)
    {
        return (new \helper\RangeData((new \app\wechat\model\User())->getVipLevelRange()))->getNextKeyByKey($key);
	}
	
	
}