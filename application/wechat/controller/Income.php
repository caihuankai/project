<?php
namespace app\wechat\controller;

use app\common\controller\ControllerBase;
use app\common\controller\JsonResult;
use app\wechat\model\PdCash;
use app\wechat\model\RcbLog;
use app\wechat\model\Course;
use app\wechat\model\User;
use app\wechat\model\Viewpoint;
use app\wechat\model\PayOrder;

/**
 * 课程收益 分成收益 提现明细
 * @author xiaok
 * @time 2017/06/15
 */
class Income extends App{

	//总收益 可提现金
	public function userAccount($user_id=1706743){
		$userModel = new User();
		$UserInfo = $userModel->field('user_id,income_total,income')->where('user_id',$user_id)->find();
		if(empty($UserInfo)){
			return $this->errorJson(JsonResult::ERR_PARAMETER);
		}
		return $this->successJson($UserInfo);
	}
	//2.0新增type 1：课程收益 2：观点收益 3：live直播送礼收益 4：课程直播送礼收益
	public function classIncome($user_id=1706743,$type=1){
		$RcbLogModel = new RcbLog();
		$CourseModel = new Course();
		$type = (int)$type;
		$where['a.type'] = 'class_income';
		$startTime = '';
		$endTime = '正在进行';
		$class_name = '';
		$total = 0;//总收益
		if($type == 1){
			$where['p.type'] = 1;
			//该用户被购买的所有课程
			$userClass = $RcbLogModel
			->alias('a')
			->join('pay_order p','p.order_no = a.order_no','left')
			->where('a.user_id',$user_id)
			->where($where)
			->field('a.class_id')
			->order('p.pay_time','desc')
			->select();
			//去重
			$result = array();
			foreach ($userClass as $key => $value) {
				$has = false;
				foreach($result as $key => $val){
					if($val['class_id']==$value['class_id']){
					$has = true;
					break;
					}
				}
				if(!$has)
					$result[]=$value;
			}
			foreach ($result as $k => $v) {
				$v['amout'] = $RcbLogModel->alias('a')
				->join('pay_order p','p.order_no = a.order_no','left')
				->where($where)
				->where('a.class_id',$v['class_id'])
				->sum('a.available_amount');
				$v['count'] = $RcbLogModel
				->alias('a')
				->join('pay_order p','p.order_no = a.order_no','left')
				->where($where)
				->where('a.class_id',$v['class_id'])
				->count();
				$classInfo = $CourseModel->where('id',$v['class_id'])->find();
				$v['startTime'] = $startTime;
				$v['endTime'] = $endTime;
				if(!empty($classInfo)){
					$v['startTime'] = $classInfo['begin_time'];
					if($classInfo['status'] == 4){
						$v['endTime'] = $classInfo['end_time'];
					}
					$v['class_name'] = $classInfo['class_name'];
				}
				$total = $total + $v['amout'];
			}
			$returnstr = $result;
			// $returnstr['total'] = sprintf("%.2f",$total);
		}
		if($type == 2){
			$ViewpointModel = new Viewpoint();
			$where['p.type'] = 2;
			//该用户被购买的所有观点
			$userClass = $RcbLogModel
			->alias('a')
			->join('pay_order p','p.order_no = a.order_no','left')
			->where('a.user_id',$user_id)
			->where($where)
			->field('a.class_id')
			->order('p.pay_time','desc')
			->select();
			//去重
			$result = array();
			foreach ($userClass as $key => $value) {
				$has = false;
				foreach($result as $key => $val){
					if($val['class_id']==$value['class_id']){
					$has = true;
					break;
					}
				}
				if(!$has)
					$result[]=$value;
			}
			foreach ($result as $k => $v) {
				$v['amout'] = $RcbLogModel->alias('a')
				->join('pay_order p','p.order_no = a.order_no','left')
				->where($where)
				->where('a.class_id',$v['class_id'])
				->sum('a.available_amount');
				$v['count'] = $RcbLogModel
				->alias('a')
				->join('pay_order p','p.order_no = a.order_no','left')
				->where($where)
				->where('a.class_id',$v['class_id'])
				->count();
				$viewpointInfo = $ViewpointModel->where('id',$v['class_id'])->find();
				$v['startTime'] = $startTime;
				$v['endTime'] = '';
				if(!empty($viewpointInfo)){
					$v['startTime'] = $viewpointInfo['publish_time'];
					$v['class_name'] = $viewpointInfo['title'];
				}
				$total = $total + $v['amout'];
			}
			$returnstr = $result;
			// $returnstr['total'] = sprintf("%.2f",$total);
		}
		if($type == 3){
			$where['p.type'] = 3;
			$data = $RcbLogModel
			->alias('a')
			->join('pay_order p','p.order_no = a.order_no','left')
			->join('user u','u.user_id = p.user_id','left')
			->where('a.user_id',$user_id)
			->where($where)
			->field('a.id,p.total_fee,u.alias,p.pay_time')
			->order('p.pay_time','desc')
			->select();
			$result = array();
			if(!empty($data)){
				foreach ($data as $k => $v) {
					$v['title'] = $v['alias'].' 送了 '.$v['total_fee'].'元';
				}
				foreach ($data as $k => $v) {
					$v['total_fee'] = (float)$v['total_fee'];
					$result[mb_substr($v['pay_time'],0,10)][]=$v;
				}
			}
			$returnstr = array();
			$num = 0;
			foreach ($result as $k => $v) {
				$returnstr[$num]['date'] = $k;
				$returnstr[$num]['list'] = $v;
				$num = $num+1;
			}

		}
		if($type == 4){
			$where['p.type'] = 6;
			//该用户被赞赏的所有课程
			$userClass = $RcbLogModel
			->alias('a')
			->join('pay_order p','p.order_no = a.order_no','left')
			->where('a.user_id',$user_id)
			->where($where)
			->field('a.class_id')
			->order('p.pay_time','desc')
			->select();
			//去重
			$result = array();
			foreach ($userClass as $key => $value) {
				$has = false;
				foreach($result as $key => $val){
					if($val['class_id']==$value['class_id']){
					$has = true;
					break;
					}
				}
				if(!$has)
					$result[]=$value;
			}
			foreach ($result as $k => $v) {
				$v['amout'] = $RcbLogModel->alias('a')
				->join('pay_order p','p.order_no = a.order_no','left')
				->where($where)
				->where('a.class_id',$v['class_id'])
				->sum('a.available_amount');
				$v['count'] = $RcbLogModel
				->alias('a')
				->join('pay_order p','p.order_no = a.order_no','left')
				->where($where)
				->where('a.class_id',$v['class_id'])
				->count();
				$classInfo = $CourseModel->where('id',$v['class_id'])->find();
				$v['startTime'] = $startTime;
				$v['endTime'] = $endTime;
				if(!empty($classInfo)){
					$v['startTime'] = $classInfo['begin_time'];
					if($classInfo['status'] == 4){
						$v['endTime'] = $classInfo['end_time'];
					}
					$v['class_name'] = $classInfo['class_name'];
				}
				$total = $total + $v['amout'];
			}
			$returnstr = $result;
		}
		return $this->successJson($returnstr);
	}
	//分成收益 2.0新增type 1：课程分成 2：观点分成 3：live直播送礼分成 4：课程直播送礼分成
	public function income($user_id=1706761,$type=4){
		$RcbLogModel = new RcbLog();
		$total = 0;//总收益
		$where['a.user_id'] = $user_id;
		$where['a.dataFlag'] = 1;
		$where['a.type'] = 'commission';
		if($type == 1){
			$where['p.type'] = 1;
			$incomeInfo = $RcbLogModel
			->alias('a')
			->join('pay_order p','p.order_no = a.order_no','inner')
			->join('third_login t','t.user_id = p.user_id','left')
			->join('course c','c.id = p.class_id','left')
			->field('a.description,a.add_time,a.available_amount,t.alias,p.type,p.pay_time,c.class_name')
			->where($where)
			->order('p.pay_time','desc')
			->select();
		}
		if($type == 2){
			$where['p.type'] = 2;
			$incomeInfo = $RcbLogModel
			->alias('a')
			->join('pay_order p','p.order_no = a.order_no','inner')
			->join('third_login t','t.user_id = p.user_id','left')
			->join('viewpoint v','v.id = p.class_id','left')
			->field('a.description,a.add_time,a.available_amount,t.alias,p.type,p.pay_time,v.title as class_name')
			->where($where)
			->order('p.pay_time','desc')
			->select();
		}
		if($type == 3){
			$where['p.type'] = 3;
			$incomeInfo = $RcbLogModel
			->alias('a')
			->join('pay_order p','p.order_no = a.order_no','inner')
			->join('third_login t','t.user_id = p.user_id','left')
			->field('a.description,a.add_time,a.available_amount,t.alias,p.type,p.pay_time')
			->where($where)
			->order('p.pay_time','desc')
			->select();
		}
		if($type == 4){
			$where['p.type'] = 6;
			$incomeInfo = $RcbLogModel
			->alias('a')
			->join('pay_order p','p.order_no = a.order_no','inner')
			->join('third_login t','t.user_id = p.user_id','left')
			->join('course c','c.id = p.class_id','left')
			->field('a.description,a.add_time,a.available_amount,t.alias,p.type,p.pay_time,c.class_name')
			->where($where)
			->order('p.pay_time','desc')
			->select();
		}
		foreach ($incomeInfo as $k => $v) {
			$total = $total + $v['available_amount'];
		}
		$returnstr = $incomeInfo;
		if($type == 3){
			$result = array();
			if(!empty($incomeInfo)){
				foreach ($incomeInfo as $k => $v) {
					$v['available_amount'] = (float)$v['available_amount'];
					$result[mb_substr($v['pay_time'],0,10)][]=$v;
				}
			}
			$returnstr = array();
			$num = 0;
			foreach ($result as $k => $v) {
				$returnstr[$num]['date'] = $k;
				$returnstr[$num]['list'] = $v;
				$num = $num+1;
			}
		}
		// $returnstr['total'] = sprintf("%.2f",$total);
		return $this->successJson($returnstr);
	}
	//提现明细
	public function prepareInfo($user_id=1706761){
		$PdCashModel = new PdCash();
		$total = 0;//总提现
		$PdCashInfo = $PdCashModel->field('pdc_amount,pdc_add_time,pdc_payment_state')->where('pdc_user_id',$user_id)->select();
		foreach ($PdCashInfo as $k => $v) {
			$v['arrive_time'] = 
			date('Y-m-d H:i:s',strtotime($v['pdc_add_time'])+604800);
			switch ($v['pdc_payment_state']) {
				case '0':
					$v['pdc_payment_state'] = '已提交微信审批';
					break;

				case '1':
					$v['pdc_payment_state'] = '已到帐';
					break;

				case '2':
					$v['pdc_payment_state'] = '提现申请失败，提现金额已退还到您可提现金内；您可在微信公众号联系客服咨询原因。';
					break;
				
				default:
					$v['pdc_payment_state'] = '已到帐';
					break;
			}
			$total = $total + $v['pdc_amount'];
		}	
		$returnstr['data'] = $PdCashInfo;
		$returnstr['total'] = sprintf("%.2f",$total);
		return $this->successJson($returnstr);
	}

	/**
	 * 收到的礼物
	 * @param  [type] $type 1：课程直播间 2：live直播间
	 * @param  [type] $page 页码
	 * @return [type]       [description]
	 */
	public function receivingGift($type=1,$page=1){
		$user_id = $this->getUserId();
		// $user_id = 1706743;
		$PayOrderModel = new PayOrder();
		$where['p.state'] = 1;
		$where['p.vip_id'] = 0;
		if($type == 1){
			$where['p.type'] = 6;
			$where['c.uid'] = $user_id;
			$dataList = $PayOrderModel->alias('p')
			->field('p.class_id,c.class_name,c.begin_time,c.type,c.pid,c.form,(select count(*) from talk_pay_order where class_id = p.class_id and type = 6 and vip_id = 0) as count,(select ca.class_name from talk_course ca where ca.id = c.pid) as p_classname,c.src_img')
			->join('course c','c.id = p.class_id')
			->where($where)
			->group('p.class_id')
			->order('p.create_time','desc')
			->page($page,10)
			->select();	
			if(!empty($dataList)){
				foreach ($dataList as $k => $v) {
					if(empty($v['p_classname'])){
						$v['p_classname'] = '单节课';
					}
					$v['src_img'] = \helper\UrlSys::handleIndexImg($v['src_img']);
				}
			}
			
			$returnstr = $dataList;
		}
		if($type == 2){
			$where['p.type'] = 3;
			$where['p.class_id'] = $user_id;
			$dataList = $PayOrderModel->alias('p')
			->where($where)
			->field('p.create_time,p.remark,p.total_fee,u.alias')
			->join('user u','u.user_id = p.user_id')
			->order('p.create_time','desc')
			->page($page,10)
			->select();

			foreach ($dataList as $k => $v) {
				if(!empty($v['remark'])){
					$remarkArray = json_decode($v['remark'],true);
					$giftName = isset($remarkArray['giftName']) ? $remarkArray['giftName'] : "";
				}else{
					$giftName = "";
				}
				$v['giftName'] = $giftName;
				$v['total_fee'] = floatval($v['total_fee']);
				$v['content'] = $v['alias']." 赠与了 我 ".$giftName." ".floatval($v['total_fee'])."礼点";
				
			}

			$result = array();
			if(!empty($dataList)){
				foreach ($dataList as $k => $v) {
					$result[mb_substr($v['create_time'],0,10)][]=$v;
				}
			}
			$returnstr = array();
			$num = 0;
			foreach ($result as $k => $v) {
				$returnstr[$num]['date'] = $k;
				$returnstr[$num]['list'] = $v;
				$num = $num+1;
			}
		}
		return $this->sucSysJson($returnstr);
	}

	/**
	 * 课程直播收到的礼物
	 * @param  [type] $class_id 课程id
	 * @param  [type] $page     页码
	 * @return [type]           [description]
	 */
	public function classReceivingGift($class_id=1,$page=1){
		$PayOrderModel = new PayOrder();
		$where['p.state'] = 1;
		$where['p.type'] = 6;
		$where['p.vip_id'] = 0;
		$where['p.class_id'] = $class_id;
		$dataList = $PayOrderModel->alias('p')
		->where($where)
		->field('p.create_time,p.remark,p.total_fee,u.alias')
		->join('user u','u.user_id = p.user_id')
		->order('p.create_time','desc')
		->page($page,10)
		->select();
		foreach ($dataList as $k => $v) {
			if(!empty($v['remark'])){
				$remarkArray = json_decode($v['remark'],true);
				$giftName = isset($remarkArray['giftName']) ? $remarkArray['giftName'] : "";
			}else{
				$giftName = "";
			}
			$v['giftName'] = $giftName;
			$v['total_fee'] = floatval($v['total_fee']);
			$v['content'] = $v['alias']." 赠与了 我 ".$giftName." ".floatval($v['total_fee'])."礼点";
			
		}
		return $this->sucSysJson($dataList);
	}

	/**
	 * 售出记录
	 * @param  integer $type 售出类型 1：单节课 2：系列课 3：观点
	 * @param  integer $page [description]
	 * @return [type]        [description]
	 */
	public function sellRecord($type=3,$page=1){
		$user_id = $this->getUserId();
//		 $user_id = 1706775;
		$PayOrderModel = new PayOrder();
		$where['p.state'] = 1;
		$where['p.vip_id'] = 0;
		if($type == 1 || $type == 2){
			$where['p.type'] = 1;
			$where['c.type'] = $type;
			$where['c.uid'] = $user_id;
			$dataList = $PayOrderModel->alias('p')
			->field('p.class_id,p.type,p.create_time,p.total_fee,c.class_name as title,c.src_img,c.form, c.type course_type')
			->join('course c','c.id = p.class_id')
			->where($where)
			->page($page,10)
			->order('p.create_time','desc')
			->select();
			if(!empty($dataList)){
				foreach ($dataList as $k => $v) {
					$v['src_img'] = \helper\UrlSys::handleIndexImg($v['src_img']);
				}
			}
		}
		if($type == 3){
			$where['p.type'] = ['in',[2,7]];
			$where['r.user_id'] = $user_id;
			$where['r.type'] = 'class_income';
			$dataList = $PayOrderModel->alias('p')
			->field('p.class_id,p.type,p.create_time,p.total_fee,v.title')
			->join('viewpoint v','v.id = p.class_id','left')
			->join('rcb_log r','r.order_no = p.order_no')
			->where($where)
			->page($page,10)
			->order('p.create_time','desc')
			->select();
		}
		if(!empty($dataList)){
			foreach ($dataList as $k => $v) {
				$v['total_fee'] = floatval($v['total_fee']);
				$v['create_time'] = date('Y-m-d H:i',strtotime($v['create_time']));
				if($v['type'] == 7){
					$v['title'] = '观点包周';
				}
			}
		}
		return $this->sucSysJson($dataList);
	}
}