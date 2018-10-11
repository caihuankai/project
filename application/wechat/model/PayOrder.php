<?php
namespace app\wechat\model;

use app\common\model\ModelBs;
use think\Exception;
use app\wechat\model\RcbLog;
use app\wechat\model\User;
use app\wechat\model\AdmireRank;
use app\common\model\Live as LiveM;
use app\wechat\controller\AdmireRpc;
use app\common\model\Course as M;
use app\admin\model\ReturnVisitSchedule;

/**
 * @author xiaok
 * @date 2017/05/24
 */
class PayOrder extends ModelBs{

	//微信支付成功更新数据
	public function paySuccess($data){
		return true;
	}
    
    
    /**
     * 根据课程id获取购买的用户
     *
     * @param $courseId
     * @return array
     * @author aozhuochao
     */
    public function getUserIdsByCourse($courseId)
    {
        if (empty($courseId)) {
            return [];
        }
        
        return $this->where(['state' => 1, 'type' => ['in', '1,10,11'], 'class_id' => $courseId])->field('user_id')
            ->fetchClass('\CollectionBase')->select()->column('user_id', 'user_id');
	}
	
	
	//获取用户购买记录  新增type=10,获取小程序购买记录
	//大策略h5新增 type=11,h5购买记录
	public function buyRecord($user_id,$page,$type){
		$user_id = (int)$user_id;
		$page = (int)$page;
		$limit = ($page-1)*10;
		$data = array();
		if($type == 1){
			$data = $this->alias('a')
			->field('c.id,c.class_name,a.total_fee,a.pay_time,c.src_img,c.type as courseType,c.form as courseForm,c.status as courseStatus,c.begin_time as courseBeginTime')
			->join('course c','c.id = a.class_id')
			->where('a.user_id',$user_id)
			->where('a.state','in',[1,3])
			->where('a.type',1)
			->limit($limit,10)
			->order('a.pay_time','desc')
			->select();
			if($data){
				foreach ($data as $k => $v) {
					$v['pay_time'] = substr($v['pay_time'],0,-3);
					$v['src_img'] = \helper\UrlSys::handleIndexImg($v['src_img']);
					$v['total_fee'] = (float)$v['total_fee'];
				}
			}
		}
		if($type == 2){
			$data = $this->alias('a')
			->field('c.id,c.title,a.total_fee,a.pay_time,a.order_no,a.type,u.alias,a.class_id as jump_id')
			->join('viewpoint c','c.id = a.class_id','left')
			->join('user u','u.user_id = a.class_id','left')
			->where('a.user_id',$user_id)
			->where('a.state',1)
			->where('a.type','in',[2,7])
			->limit($limit,10)
			->order('a.pay_time','desc')
			->select();
			if(!empty($data)){
				foreach ($data as $k => $v) {
					if($v['type'] == 7){
						$v['title'] = '观点包周 - '.$v['alias'];
						$v['deadline'] = date('Y-m-d H:i',strtotime("+1week",strtotime($v['pay_time'])));
					}else{
						$v['deadline'] = null;
					}
					$v['total_fee'] = (float)$v['total_fee'];
					$v['pay_time'] = date('Y-m-d H:i',strtotime($v['pay_time']));
				}
			}
		}
		if($type == 3){
			$dataArray = $this->alias('a')
			->field('a.id,a.total_fee,a.pay_time,a.order_no,a.type,a.class_id')
			// ->join('user u','u.user_id = a.class_id')
			->where('a.user_id',$user_id)
			->where('a.state',1)
			->where('a.type','in',[3,6])
			->limit($limit,10)
			->order('a.pay_time','desc')
			->select();	
			foreach ($dataArray as $k => $v) {
				if($v['type'] == 3){
					$UserModel = new User();
					$v['alias'] = $UserModel->where('user_id',$v['class_id'])->value('alias');
				}
				if($v['type'] == 6){
					$CourseModel = new M();
					$v['alias'] = $CourseModel->alias('c')
					->join('user u','u.user_id = c.uid')
					->where('c.id',$v['class_id'])->value('u.alias');
				}
			}
			$data = $dataArray;
			$result = array();
			if(!empty($data)){
				foreach ($data as $k => $v) {
					$v['title'] = '赠予了 '.$v['alias'].$v['total_fee'].'元';
					$v['total_fee'] = (float)$v['total_fee'];
				}
				foreach ($data as $k => $v) {
					$result[mb_substr($v['pay_time'],0,10)][]=$v;
				}
			}
			$resultData = array();
			$num = 0;
			foreach ($result as $k => $v) {
				$resultData[$num]['date'] = $k;
				$resultData[$num]['list'] = $v;
				$num = $num+1;
			}
			$data = $resultData;
		}
		if($type == 5){
			$where['r.user_id'] = $user_id;
			$where['r.type'] = ['in',['readpacket_send','readpacket_get','readpacket_back']];
			$where['red.type'] = ['in',[5,6,9,10]];
			$RcbLogModel = new RcbLog();
			$result = $RcbLogModel->alias('r')
			->field('r.add_time,r.available_amount,r.type as rtype,red.type')
			->join('talk_redpacket_info red','red.id = r.class_id')
			->where($where)
			->limit($limit,10)
			->order('r.add_time','desc')
			->select();
			$data = array();
			foreach ($result as $k => $v) {
				if($v['rtype'] == 'readpacket_send'){
					$sendGet = '发';
					$v['available_amount'] = '-'.$v['available_amount'];
				}
				if($v['rtype'] == 'readpacket_get'){
					$sendGet = '收';
					$v['available_amount'] = '+'.$v['available_amount'];
				}
				if($v['rtype'] == 'readpacket_back'){
					$sendGet = '退';
					$v['available_amount'] = '+'.$v['available_amount'];
				}
				if($v['type'] == 5 || $v['type'] == 9){
					$data[$k]['title'] = $sendGet." 口令红包-随机金额";
				}
				if($v['type'] == 6 || $v['type'] == 10){
					$data[$k]['title'] = $sendGet." 口令红包-固定金额";
				}
				$data[$k]['pay_time'] = $v['add_time'];
				$data[$k]['total_fee'] = $v['available_amount'];
			}
		}
		if ($type == 9) {
			$data = $this->alias('po')
			->join('talk_column c','po.class_id = c.id')
			->field('c.name,po.class_id,po.total_fee,po.num,po.pay_time')
			->where('po.user_id',$user_id)
			->select();
		}
		if($type == 10){
			$where['a.user_id'] = $user_id;
			$where['a.state'] = ['in',[1,3]];
			$where['a.type'] = 1;
			$where['c.form'] = ['in',[1,2]];
			$data = $this->alias('a')
			->field('c.id,c.class_name,a.total_fee,c.src_img,c.type,c.form,c.status')
			->join('course c','c.id = a.class_id')
			->limit($limit,10)
			->where($where)
			->order('a.pay_time','desc')
			->select();
			if($data){
				foreach ($data as $k => $v) {
					// $v['pay_time'] = substr($v['pay_time'],0,-3);
					$v['src_img'] = \helper\UrlSys::handleIndexImg($v['src_img']);
					$v['total_fee'] = (float)$v['total_fee'];
				}
			}
		}
		if($type == 11){
			$data = $this->alias('a')
			->field('c.id,c.class_name,c.price,c.origin_price,c.src_img,(c.virtual_study_num + c.study_num) as study_num,c.seriesType,u.alias as teacher_alias')
			->join('course c','c.id = a.class_id')
			->join('user u','c.uid = u.user_id')
			->where('a.user_id',$user_id)
			->where('a.state','in',[1,3])
			->where('a.type','in',[10,11])
			->page($page,10)
			->order('a.pay_time','desc')
			->select();
			if($data){
				foreach ($data as $k => $v) {
					$v['src_img'] = \helper\UrlSys::handleIndexImg($v['src_img']);
					if($v['seriesType'] == 1){
						$v['seriesType_name'] = '月度课';
					}elseif($v['seriesType'] == 2){
						$v['seriesType_name'] = '季度课';
					}else{
						$v['seriesType_name'] = '';
					}
					$v['price'] = (float)$v['price'];
					$v['origin_price'] = (float)$v['origin_price'];
				}
			}
		}
		return $data;
	}
	//判断用户是否已经购买该课程 $id:课程/观点/赞赏id；  $type：1-课程，2-观点，3-赞赏；$user_id:用户id
	public function isBuy($user_id, $type, $id, $teacherId = 0){
		//H5月度课季度课判断
		if(in_array($type, [10,11])){
			$where['user_id'] = $user_id;
			$where['state'] = ['in',[1,3]];
			$where['class_id'] = $id;
			$where['overdue_time'] = ['>',date('Y-m-d H:i:s')];
			$status = 0;
			$data = $this->where($where)->find();
			if(!empty($data)){
				$status = 1;	
			}
			return [$status, $data['overdue_time']];
		}
		//大策略版本
		$id = (int)$id;
		$where['class_id'] = $id;
		$where['user_id'] = $user_id;
		$where['state'] = ['in',[1,3]];
		$where['type'] = $type;
		$data = $this->where($where)->find();
		$status = 0;//0未购买 1已购买
		if(!empty($data)){
			$status = 1;
		}elseif ($teacherId > 0) {//验证观点包周
			$data = $this->where('user_id', $user_id)->where('type', 7)->where('class_id', $teacherId)->where('state', 1)->field('pay_time')->order('id desc')->find();
			$currentDate = date('c');
			if (!empty($data) && $currentDate >= date('c', strtotime($data['pay_time'])) && $currentDate <= date('c', strtotime($data['pay_time'] . '+7days'))) {
				$status = 1;
			}
		}
		return $status;
	}
	//马甲用户消费订单
	public function buyToVirtual($user_id,$orderNo,$amount,$class_id,$type,$remark,$ip,$num){
		$data['user_id'] = $user_id;
		$data['order_no'] = $orderNo;
		$data['third_order_no'] = $orderNo;
		$data['pay_type'] = 6;
		$data['client_type'] = 3;
		$data['amount'] = $amount;
		$data['num'] = $num;
		$data['total_fee'] = $amount;
		$data['client_ip'] = $ip;
		$data['class_id'] = $class_id;
		$data['type'] = $type;
		$data['remark'] = $remark;
		$data['vip_id'] = 1;
		$data['state'] = 1;
		//开启事务
		$this->db()->startTrans();
		try{
			$this->db()->insert($data);
	        //增加用户消费金额 扣除用户帐户金额
	        $UserModel = new User();
	        $userInfo = $UserModel->where('user_id',$user_id)->find();
	        if(empty($userInfo)){
	        	return $this->errorJson(JsonResult::ERR_USERINFO_NULL);
	        }
	        //用户帐户余额不足
	        if($userInfo['account_balance'] < $amount){
	        	return false;
	        }
	        $UserModel->db()->where('user_id',$user_id)->update([
	        	'consume_total'	=> $userInfo['consume_total'] + $amount,
	        	'account_balance'	=> $userInfo['account_balance'] - $amount,
	    	]);

			if($type == 3 || $type == 6){

	        	$remarkData = json_decode($data['remark'],true);
	        	$giftName = isset($remarkData['giftName']) ? $remarkData['giftName'] : "";
                $giftImg = isset($remarkData['giftImg']) ? $remarkData['giftImg'] : "";
                //推送房间id
                $pushRoomId = isset($remarkData['courseId']) ? $remarkData['courseId'] : $data['class_id'];
                $pushsite = isset($remarkData['courseId']) ? 1 : 0;
                $rankType = isset($remarkData['courseId']) ? 2 : 1;

	            $AdmireRankModel = new AdmireRank();
	            $AdmireRankWhere['master_userid'] = $pushRoomId;
				$AdmireRankWhere['user_id'] = $user_id;
				$AdmireRankWhere['type'] = $rankType;
				$userRecord = $AdmireRankModel->where($AdmireRankWhere)->find();
				//如果用户不存在记录 则插入记录
				if(empty($userRecord)){
					$AdmireRankdata = $AdmireRankWhere;
					$AdmireRankdata['total'] = $amount;
					$AdmireRankModel->db()->insert($AdmireRankdata);
				}else{
					$AdmireRankModel->db()->where($AdmireRankWhere)->update([
						'total' => $userRecord['total'] + $amount,
					]);
				}
				if($pushsite == 0){
					//更新房间被赞赏次数和赞赏总额
		            $LiveModel = new LiveM();
		            $LiveModel->db()->where('user_id',$pushRoomId)->setInc('admire_num');
		        	$LiveModel->db()->where('user_id',$pushRoomId)->setInc('admire_amount',$amount);
				}else{
					$CourseModel = new M();
					$CourseModel->db()->where('id',$pushRoomId)->setInc('admire_num');
		        	$CourseModel->db()->where('id',$pushRoomId)->setInc('admire_amount',$amount);
				}
	            

	        	//送礼推送至C++
                $AdmireRpcC = new AdmireRpc();
                $AdmireRpcC->admire($data['user_id'],$pushRoomId,$giftName,$giftImg,0,$pushsite,$num);
	        }if($type == 8){
	        	$remarkData = json_decode($data['remark'],true);
	        	$giftName = isset($remarkData['giftName']) ? $remarkData['giftName'] : "";
                $giftImg = isset($remarkData['giftImg']) ? $remarkData['giftImg'] : "";
	        	$pushsite = 2;
                $pushRoomId = $data['class_id'];
                //送礼推送至C++
                $AdmireRpcC = new AdmireRpc();
                $AdmireRpcC->admire($data['user_id'],$pushRoomId,$giftName,$giftImg,0,$pushsite,$num);
	        }
	        //购买特训课时调用joinCourse
            if($type == 1){
                $CourseModel = new \app\wechat\model\Course();
                $courseType = $CourseModel->where('id',$class_id)->value('type');
                if($courseType == 3){
                    $CourseDetailsC = new \app\wechat\controller\CourseDetails();
                    $CourseDetailsC->joinCourse($user_id,$class_id,true);
                }
            }
	    	$this->db()->commit();
		}catch (Exception $e) {
            $this->db()->rollback();
        }
        $resultData['account_balance'] = $userInfo['account_balance'];
    	$resultData['amount_total'] = $amount;
    	return $resultData;
	}



	
	/**
	 * 退款操作
	 * @param  [type] $order_no 订单号
	 * @return [type]           [description]
	 */
	public function refundOperate($order_no){
		$this->db()->startTrans();
		try{
			//查询订单是否有效
			$orderInfo = $this->where('order_no',$order_no)->find();
			if(empty($orderInfo)){
				return false;
			}
			if($orderInfo['state'] != 1){
				return false;
			}
			//删除回访计划表相关记录
			if($orderInfo['type'] == 1){
				$courseModel = new M();
				$courseType = $courseModel->where('id',$orderInfo['class_id'])->value('type');
				$ReturnVisitScheduleModel = new ReturnVisitSchedule();
				//单节课删除单条记录 系列课删除系列课子课程记录
				if($courseType == 1){
					$ReturnVisitScheduleModel->db()->where('target_id',$orderInfo['class_id'])->where('user_id',$orderInfo['user_id'])->delete();
				}
				if($courseType == 2){
					//获取系列课的子课程id
					$courseChildId = $courseModel->field('id')->where('pid',$orderInfo['class_id'])->select();
					if(!empty($courseChildId)){
						foreach ($courseChildId as $k => $v) {
							$ReturnVisitScheduleModel->db()->where('target_id',$v['id'])->where('user_id',$orderInfo['user_id'])->delete();
						}
					}
				}
			}

			//修改订单为退款状态
			$this->db()->where('order_no',$order_no)->update([
				'state' => 5,
				'refundtime' => date('Y-m-d H:i:s'),
			]);
			//查询退款影响用户
			$rcbList = $this->alias('p')
			->field('r.user_id,r.fans_id,r.type,r.available_amount')
			->join('talk_rcb_log r','r.order_no = p.order_no','left')
			->where('p.order_no',$order_no)
			->select();
			if(!empty($rcbList)){
				$UserModel = new User();
				foreach ($rcbList as $k => $v) {
					$where['user_id'] = $v['user_id'];
					//获取用户帐户信息
					$userInfo = $UserModel->where($where)->find();
					switch($v['type']){
						//用户下单所花费金额，需全额退，退至账户余额
						case 'order_pay':
						//增加账户余额 减少消费金额
						$UserModel->db()->where($where)->update([
							'account_balance' => $userInfo['account_balance'] + $v['available_amount'],
							'consume_total' => $userInfo['consume_total'] - $v['available_amount'],
						]);
						break;
						//粉丝购买提成，需扣除账户收益金额及历史收益总金额
						case 'commission':
						$UserModel->db()->where($where)->update([
							'income_total' => $userInfo['income_total'] - $v['available_amount'],
							'income' => $userInfo['income'] - $v['available_amount'],
						]);
						break;
						//被购买者收益，需扣除账户收益金额及历史收益总金额
						case 'class_income':
						$UserModel->db()->where($where)->update([
							'income_total' => $userInfo['income_total'] - $v['available_amount'],
							'income' => $userInfo['income'] - $v['available_amount'],
						]);
						break;
					}				
				}	
			}
			$this->db()->commit();
		}catch(Exception $e){
			$this->db()->rollback();
		}
		return true;
	}
	/**
	 * 观点包周服务是否过期
	 * @param  [type] $user_id    用户id
	 * @param  [type] $teacher_id 被购买讲师id
	 * @return [type]             [description]
	 */
	public function serviceValidity($user_id,$teacher_id){
		//购买记录
		$where['user_id'] = $user_id;
		$where['class_id'] = $teacher_id;
		$where['type'] = 7;
		$where['state'] = 1;
		$record = $this->where($where)->order('pay_time','desc')->limit(1)->find();
		if(empty($record)){
			return false;
		}else{
			return strtotime("+1week",strtotime($record['pay_time'])) > time() ? true : false;
		}
	}
	/**
	 * 栏目订阅是否过期
	 * @param  [type] $user_id   [description]
	 * @param  [type] $column_id [description]
	 * @return [type]            [description]
	 */
	public function columnValidity($user_id,$column_id){
		$where['user_id'] = $user_id;
		$where['type'] = 9;
		$where['state'] = 1;
		$where['class_id'] = $column_id;
		$data = $this->where($where)->order('pay_time','desc')->find();
		if(empty($data)){
			return false;
		}else{
			return (strtotime($data['pay_time']) + 60*60*24*$data['num']) > strtotime(date('Y-m-d H:i:s')) ? true : false;
		}
	}
	/**
	 * 获取即将到期的用户订阅栏目
	 * @return [type] [description]
	 */
	public function willExpiryColumnList(){
		$where['p.state'] = 1;
		$where['p.type'] = 9;
		$where['(unix_timestamp(p.create_time) + p.num*60*60*24 - 4*60*60*24)'] = ['<',time()];
		$where['unix_timestamp(p.create_time)  + p.num*60*60*24'] = ['>',time()];
		$data = $this->alias('p')
		->field('p.*,c.name,(unix_timestamp(p.create_time) + p.num*60*60*24) as expire_time')
		->join('talk_column c','c.id = p.class_id')
		->where($where)
		->select();
		return $data;
	}
	
	/**
	 * 获取即将到期的月度课/季度课订阅
	 * @return \think\Collection|\think\db\false|PDOStatement|string
	 */
	public function willExpiryCourseSeriesList(){
		$where['p.state'] = 1;
		$where['p.type'] = ['in', '10,11'];
		$where['overdue_time'] = ['<',date('Y-m-d H:i:s', strtotime('+6days'))];
		$where['overdue_time '] = ['>',date('Y-m-d H:i:s')];
		$data = $this->alias('p')
		->field('p.*,c.class_name,overdue_time')
		->join('talk_course c','c.id = p.class_id')
		->where($where)
		->select();
		return $data;
	}
	
}