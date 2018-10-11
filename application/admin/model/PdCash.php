<?php
namespace app\admin\model;

use app\common\model\ModelBase;
use think\Request;
use think\Db;
use app\wechat\controller\WechatCashout;
use app\wechat\controller\SendChatMessage;

class PdCash extends ModelBase{	
	/**
	 * 分页
	 */
	public function pageQuery(){
		$where = [];
		$where['a.dataFlag'] = 1;
		
		session('pdc_payment_state', null);
	    $PdcPaymentState = input('pdc_payment_state');
		if(!empty($PdcPaymentState)){
			$where['a.pdc_payment_state'] = $PdcPaymentState;
			session('pdc_payment_state', $PdcPaymentState);
		}
		
		$PdcSn = input('pdc_sn');
		if(!empty($PdcSn))$where['a.pdc_sn'] = $PdcSn;
		
		$PdcUserName = input('pdc_user_name');
		if(!empty($PdcUserName))$where['a.pdc_user_name'] = $PdcUserName;
		
		
		$CreateTimeMin = input('create_time_min');
		$CreateTimeMax = input('create_time_max');
		if(!empty($CreateTimeMax) && !empty($CreateTimeMin))$where['a.pdc_add_time'] = ['between time',array($CreateTimeMin,$CreateTimeMax)];
		$count = $this->count();
		return Db::connect('bs_db_config')->name('pd_cash')->alias('a')
					->join('talk_user ap','a.pdc_user_id=ap.user_id','left')
					->field('pdc_id,pdc_sn,pdc_user_id,pdc_user_name,pdc_amount,pdc_fee_amount_ratio,pdc_fee_amount,pdc_bank_name,pdc_bank_no,pdc_bank_user,pdc_add_time,pdc_payment_time,pdc_payment_state,pdc_payment_admin_id,pdc_payment_admin,remark,ap.alias,ap.user_id')
		            ->where($where)->order('pdc_id desc')
					->paginate($count);
	}

	public function count($order_number,$username,$data_type,$CreateTimeMin,$CreateTimeMax){
		$where = [];
		$where['a.dataFlag'] = 1;
		if(!empty($CreateTimeMax)){
			$CreateTimeMax = date("Y-m-d",strtotime($CreateTimeMax."+ 1 day"));
		}
		if (!empty($order_number)) {
            $where['pdc_sn'] = ['like', '%'.$order_number.'%'];
        }
        if (!empty($username)) {
            $where['alias'] = ['like', '%'.$username.'%'];
        }
        if (!empty($data_type)) {
            $where['pdc_payment_state'] = $data_type;
        }
        if($data_type == 3){
        	$where['pdc_payment_state'] = 0;	
        }
		if(!empty($CreateTimeMax) && !empty($CreateTimeMin))$where['pdc_add_time'] = ['between time',array($CreateTimeMin,$CreateTimeMax)];

		if(!empty($CreateTimeMax) && empty($CreateTimeMin))$where['pdc_add_time'] = ['<',$CreateTimeMax];

		if(empty($CreateTimeMax) && !empty($CreateTimeMin))$where['pdc_add_time'] = ['>',$CreateTimeMin,$CreateTimeMax];
		
		
		return Db::connect('bs_db_config')->name('pd_cash')->alias('a')
		->join('talk_user ap','a.pdc_user_id=ap.user_id','left')
		->field('pdc_id')
        ->where($where)->order('pdc_id desc')
		->count();
	}

	public function new_pageQuery($start,$limit,$order_number,$username,$data_type,$CreateTimeMin,$CreateTimeMax){
		$offset = ($start - 1) * $limit;
		$where = [];
		$where['a.dataFlag'] = 1;
		if(!empty($CreateTimeMax)){
			$CreateTimeMax = date("Y-m-d",strtotime($CreateTimeMax."+ 1 day"));
		}
		if (!empty($order_number)) {
            $where['pdc_sn'] = ['like', '%'.$order_number.'%'];
        }
        if (!empty($username)) {
            $where['alias'] = ['like', '%'.$username.'%'];
        }
        if (!empty($data_type)) {
            $where['pdc_payment_state'] = $data_type;
        }
        if($data_type == 3){
        	$where['pdc_payment_state'] = 0;	
        }
		if(!empty($CreateTimeMax) && !empty($CreateTimeMin))$where['pdc_add_time'] = ['between time',array($CreateTimeMin,$CreateTimeMax)];

		if(!empty($CreateTimeMax) && empty($CreateTimeMin))$where['pdc_add_time'] = ['<',$CreateTimeMax];

		if(empty($CreateTimeMax) && !empty($CreateTimeMin))$where['pdc_add_time'] = ['>',$CreateTimeMin,$CreateTimeMax];

		
		return Db::connect('bs_db_config')->name('pd_cash')->alias('a')
		->join('talk_user ap','a.pdc_user_id=ap.user_id','left')
		->field('pdc_id,pdc_sn,pdc_user_id,pdc_user_name,pdc_amount,pdc_fee_amount_ratio,pdc_fee_amount,pdc_bank_name,pdc_bank_no,pdc_bank_user,pdc_add_time,pdc_payment_time,pdc_payment_state,pdc_payment_admin_id,pdc_payment_admin,remark,ap.alias,ap.user_id')
        ->where($where)->order('pdc_id desc')->limit($offset, $limit)
		->select();
	}
	
	public function getById($id){
		//return $this->get(['pdc_id'=>$id,'dataFlag'=>1]);
		
		$rs = Db::connect('bs_db_config')->query('SELECT
			talk_pd_cash.pdc_sn,
			talk_pd_cash.pdc_user_id,
			talk_pd_cash.pdc_user_name,
			talk_pd_cash.pdc_amount,
			talk_pd_cash.pdc_fee_amount_ratio,
			talk_pd_cash.pdc_fee_amount,
			talk_pd_cash.pdc_bank_name,
			talk_pd_cash.pdc_bank_no,
			talk_pd_cash.pdc_bank_user,
			talk_pd_cash.pdc_add_time,
			talk_pd_cash.pdc_payment_time,
			talk_pd_cash.pdc_payment_state,
			talk_pd_cash.pdc_payment_admin_id,
			talk_pd_cash.pdc_payment_admin,
			talk_pd_cash.remark
			FROM
			talk_pd_cash
			WHERE
			talk_pd_cash.pdc_id = ? AND
			talk_pd_cash.dataFlag = ?',[$id, 1]);
		return $rs[0];
	}
	
	/**
	 * 新增
	 */
	public function add(){
		$data = input('post.');
		$data['createTime'] = date('Y-m-d H:i:s');
				
		$file = $_FILES['file'];
		$name = $file['name'];
		$type = strtolower(substr($name,strrpos($name,'.')+1));
		$allow_type = array('jpg','jpeg','gif','png');
		
		if(!in_array($type, $allow_type)){
		  return -1;
		}
		if(!is_uploaded_file($file['tmp_name'])){
		  return -1;
		}
		$randname=date("Y").date("m").date("d").date("H").date("i").date("s").rand(100, 999).".".$type;
		$upload_path = ROOT_PATH . 'public' . DS . 'uploads' . DS . 'adspic'. DS;
		if(move_uploaded_file($file['tmp_name'],$upload_path.$randname)){
		  //echo "Successfully!";
		}else{
		  //echo "Failed!";
		  return -1;
		}
		
		$data['adFile'] = 'public' . DS . 'uploads' . DS . 'adspic'. DS.$randname;
		
		$data['operatorId'] = $_SESSION['adminSess']['admin']['id'];
		$data['operatorName'] = $_SESSION['adminSess']['admin']['username'];
		
		$result = $this->connect('bs_db_config')->allowField(true)->save($data);
		
		if($result){
			return 1;
		}else{
			return -1;
		}
	}
	
    /**
	 * 编辑
	 */
	public function edit(){	
		$data = input('post.');
		$data['createTime'] = date('Y-m-d H:i:s');
		
		$file = $_FILES['file'];
		if(!empty($file['name'])){
			$name = $file['name'];
			$type = strtolower(substr($name,strrpos($name,'.')+1));
			$allow_type = array('jpg','jpeg','gif','png');
			
			if(!in_array($type, $allow_type)){
			  return -1;
			}
			
			if(!is_uploaded_file($file['tmp_name'])){
			  return -1;
			}
			$randname=date("Y").date("m").date("d").date("H").date("i").date("s").rand(100, 999).".".$type;
			$upload_path = ROOT_PATH . 'public' . DS . 'uploads' . DS . 'adspic'. DS;
			if(move_uploaded_file($file['tmp_name'],$upload_path.$randname)){
			  //echo "Successfully!";
			}else{
			  //echo "Failed!";
			  return -1;
			}
			
			$data['resourceURL'] = 'public' . DS . 'uploads' . DS . 'adspic'. DS.$randname;
			$data['operatorId'] = $_SESSION['adminSess']['admin']['id'];
		    $data['operatorName'] = $_SESSION['adminSess']['admin']['username'];
		}
		$result = $this->connect('bs_db_config')->allowField(true)->save($data,['adId'=>(int)$data['Id']]);
		if($result){
			return 1;
		}else{
			return -1;
		}
	}
	
	/**
	 * 删除
	 */
    public function del(){
		$id = (int)input('get.id/d');
		$result = $this->connect('bs_db_config')->setField(['pdc_id'=>$id,'dataFlag'=>-1]);
		if(false !== $result){
			return 1;
        }else{
			return -1;
        }	
	}
	
   /**
	* 修改提现状态
	*/
	public function changePaymentState(){
		$id = (int)input('id');
		//获取提现订单详情
		$pdcInfo = $this->connect('bs_db_config')->where('pdc_id',$id)->find();
		$user_id = $pdcInfo['pdc_user_id'];
		$CashoutNo = $pdcInfo['pdc_sn'];
		$amount = $pdcInfo['pdc_amount'];
		if($pdcInfo['pdc_payment_state'] == 0){
			Db::startTrans();
			try{

				//调用微信支付接口
				$w = new WechatCashout();
				$status = $w->index($user_id, $CashoutNo, $amount);
				
				if($status == 0 || $status == -16016){
					//修改提现订单状态
					$operatorId = $_SESSION['adminSess']['admin']['id'];
					$operatorName = $_SESSION['adminSess']['admin']['username'];
					Db::connect('bs_db_config')->table('talk_pd_cash')->where('pdc_id',$id)->update([
						'pdc_payment_state'=>1, 
						'pdc_payment_time'=>date('Y-m-d H:i:s'), 
						'pdc_payment_admin_id'=>$operatorId, 
						'pdc_payment_admin'=>$operatorName
					]);
				
					//修改用户余额 扣除相应冻结资金
					Db::connect('bs_db_config')->table('talk_user')->where('user_id', $user_id)->setDec('freeze_income', $amount);
	
					//记录提现日志
					$dataRcbLog['user_id'] = $user_id;
					$dataRcbLog['fans_id'] = '';
					$dataRcbLog['class_id'] = '';
					$dataRcbLog['user_name'] = $pdcInfo['pdc_user_name'];
					$dataRcbLog['type'] = 'withdraw';//资金提现
					$dataRcbLog['add_time'] = date('Y-m-d H:i:s');
					$dataRcbLog['available_amount'] = $amount;
					$dataRcbLog['freeze_amount'] = $amount;
					$dataRcbLog['order_no'] = $CashoutNo;
					$dataRcbLog['description'] = "提现订单号为：".$CashoutNo."的".$pdcInfo['pdc_user_name']."先生/小姐提现".$amount."元，已成功汇款，现扣除账户冻结款".$amount."元";
					$dataRcbLog['dataFlag'] = 1;
					
					Db::connect('bs_db_config')->table('talk_rcb_log')->insert($dataRcbLog);
					
					//发送平台汇款信息给提款客户
					$s = new SendChatMessage();
					$msg = $dataRcbLog['description'];
					$scResult = $s->sendMessage($user_id,2,$amount,$msg);
					$result = 1;
				}
				else{
					//修改提现订单状态
					$operatorId = $_SESSION['adminSess']['admin']['id'];
					$operatorName = $_SESSION['adminSess']['admin']['username'];
					$remark = '';
					if($status == -16017){
						$remark = '商户余额不足，无法提现，请及时充值。';
					}
					Db::connect('bs_db_config')->table('talk_pd_cash')->where('pdc_id',$id)->update([
						'pdc_payment_state'=>2, 
						'pdc_payment_time'=>date('Y-m-d H:i:s'), 
						'remark'=>$remark,
						'pdc_payment_admin_id'=>$operatorId, 
						'pdc_payment_admin'=>$operatorName]
						);
					
					//退款给用户
					$UserInfo = Db::connect('bs_db_config')->table('talk_user')->where('user_id', $user_id)->find();
					$Info_income = $UserInfo['income'] + $amount;//账户余额
					$Info_freeze_income = $UserInfo['freeze_income'] -	$amount;//冻结收益
					Db::connect('bs_db_config')->table('talk_user')->where('user_id', $user_id)->update([
						'income' => $Info_income,
						'freeze_income' => $Info_freeze_income,
					]);

					//发送平台汇款信息给提款客户
					$s = new SendChatMessage();
					$msg = "您好，提现审批失败，提现金额已退还到您可提现金内；您可在微信公众号联系客服咨询原因。";
					$scResult = $s->sendMessage($user_id,3,$amount,$msg);
					$result = 0;
				}
				Db::commit();
			}catch (\Exception $e) {
				Db::rollback();
				//发送平台汇款信息给提款客户
				// $s = new SendChatMessage();
				// $msg = "提现订单号为：".$CashoutNo."的".$pdcInfo['pdc_user_name']."先生/小姐提现".$amount."元，汇款失败，我们将核查原因后给您再次汇款";
				// $scResult = $s->sendMessage($user_id,3,$amount,$msg);
				$result = 0;
			}
		}else{
			$rtd['status'] = -1;
			$rtd['msg'] = "订单有误";
        	return $rtd;
		}
		if($result != 0){
			$rtd['status'] = 1;
			$rtd['msg'] = "平台汇款成功";
        	return $rtd;
        }else{
			$rtd['status'] = -1;
			$rtd['msg'] = "平台汇款失败";
        	return $rtd;
        }
	}
	/**
	 * 驳回申请操作
	 */
	public function req_refuse($id,$remark){
		//获取提现订单详情
		$pdcInfo = $this->connect('bs_db_config')->where('pdc_id',$id)->find();
		$user_id = $pdcInfo['pdc_user_id'];
		$CashoutNo = $pdcInfo['pdc_sn'];
		$amount = $pdcInfo['pdc_amount'];
		if($pdcInfo['pdc_payment_state'] == 0){
			Db::startTrans();
			try{
				//修改提现订单状态
				$operatorId = $_SESSION['adminSess']['admin']['id'];
				$operatorName = $_SESSION['adminSess']['admin']['username'];
				Db::connect('bs_db_config')->table('talk_pd_cash')->where('pdc_id',$id)->update([
					'pdc_payment_state'=>2, 
					'pdc_payment_time'=>date('Y-m-d H:i:s'), 
					'pdc_payment_admin_id'=>$operatorId, 
					'pdc_payment_admin'=>$operatorName,
					'remark'=>$remark
				]);
				//退款给用户
				$UserInfo = Db::connect('bs_db_config')->table('talk_user')->where('user_id', $user_id)->find();
				$Info_income = $UserInfo['income'] + $amount;//账户余额
				$Info_freeze_income = $UserInfo['freeze_income'] -	$amount;//冻结收益
				Db::connect('bs_db_config')->table('talk_user')->where('user_id', $user_id)->update([
					'income' => $Info_income,
					'freeze_income' => $Info_freeze_income,
				]);

				//发送平台汇款信息给提款客户
				$s = new SendChatMessage();
				$msg = "您好，提现审批失败，提现金额已退还到您可提现金内；您可在微信公众号联系客服咨询原因。";
				$scResult = $s->sendMessage($user_id,3,$amount,$msg);
				$result = 1;
				Db::commit();
			}catch (\Exception $e) {
				Db::rollback();
				$result = 0;
			}
			if($result != 0){
				$rtd['status'] = 1;
				$rtd['msg'] = "驳回成功";
	        	return $rtd;
	        }else{
				$rtd['status'] = -1;
				$rtd['msg'] = "驳回失败";
	        	return $rtd;
	        }
		}
	}
	/**
	 * 批量审核提现
	 */
	public function batch_examine_no($id){
		$id = (int)$id;
		//获取提现订单详情
		$pdcInfo = $this->connect('bs_db_config')->where('pdc_id',$id)->find();
		$user_id = $pdcInfo['pdc_user_id'];
		$CashoutNo = $pdcInfo['pdc_sn'];
		$amount = $pdcInfo['pdc_amount'];
		if($pdcInfo['pdc_payment_state'] == 0){
			Db::startTrans();
			try{

				//调用微信支付接口
				$w = new WechatCashout();
				$status = $w->index($user_id, $CashoutNo, $amount);
				
				if($status == 0 || $status == -16016){
					//修改提现订单状态
					$operatorId = $_SESSION['adminSess']['admin']['id'];
					$operatorName = $_SESSION['adminSess']['admin']['username'];
					Db::connect('bs_db_config')->table('talk_pd_cash')->where('pdc_id',$id)->update([
						'pdc_payment_state'=>1, 
						'pdc_payment_time'=>date('Y-m-d H:i:s'), 
						'pdc_payment_admin_id'=>$operatorId, 
						'pdc_payment_admin'=>$operatorName
					]);
				
					//修改用户余额 扣除相应冻结资金
					Db::connect('bs_db_config')->table('talk_user')->where('user_id', $user_id)->setDec('freeze_income', $amount);
	
					//记录提现日志
					$dataRcbLog['user_id'] = $user_id;
					$dataRcbLog['fans_id'] = '';
					$dataRcbLog['class_id'] = '';
					$dataRcbLog['user_name'] = $pdcInfo['pdc_user_name'];
					$dataRcbLog['type'] = 'withdraw';//资金提现
					$dataRcbLog['add_time'] = date('Y-m-d H:i:s');
					$dataRcbLog['available_amount'] = $amount;
					$dataRcbLog['freeze_amount'] = $amount;
					$dataRcbLog['order_no'] = $CashoutNo;
					$dataRcbLog['description'] = "提现订单号为：".$CashoutNo."的".$pdcInfo['pdc_user_name']."先生/小姐提现".$amount."元，已成功汇款，现扣除账户冻结款".$amount."元";
					$dataRcbLog['dataFlag'] = 1;
					
					Db::connect('bs_db_config')->table('talk_rcb_log')->insert($dataRcbLog);
					
					//发送平台汇款信息给提款客户
					$s = new SendChatMessage();
					$msg = $dataRcbLog['description'];
					$scResult = $s->sendMessage($user_id,2,$amount,$msg);
					$result = 1;
				}
				else{
					//修改提现订单状态
					$operatorId = $_SESSION['adminSess']['admin']['id'];
					$operatorName = $_SESSION['adminSess']['admin']['username'];
					$remark = '';
					if($status == -16017){
						$remark = '商户余额不足，无法提现，请及时充值。';
					}
					Db::connect('bs_db_config')->table('talk_pd_cash')->where('pdc_id',$id)->update([
						'pdc_payment_state'=>2, 
						'pdc_payment_time'=>date('Y-m-d H:i:s'), 
						'remark'=>$remark,
						'pdc_payment_admin_id'=>$operatorId, 
						'pdc_payment_admin'=>$operatorName]
						);
					
					//退款给用户
					$UserInfo = Db::connect('bs_db_config')->table('talk_user')->where('user_id', $user_id)->find();
					$Info_income = $UserInfo['income'] + $amount;//账户余额
					$Info_freeze_income = $UserInfo['freeze_income'] -	$amount;//冻结收益
					Db::connect('bs_db_config')->table('talk_user')->where('user_id', $user_id)->update([
						'income' => $Info_income,
						'freeze_income' => $Info_freeze_income,
					]);

					//发送平台汇款信息给提款客户
					$s = new SendChatMessage();
					$msg = "您好，提现审批失败，提现金额已退还到您可提现金内；您可在微信公众号联系客服咨询原因。";
					$scResult = $s->sendMessage($user_id,3,$amount,$msg);
					$result = 0;
				}
				Db::commit();
			}catch (\Exception $e) {
				Db::rollback();
				$result = 0;
			}
		}
	}
    
}
