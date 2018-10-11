<?php
namespace app\admin\model;

use app\common\model\ModelBase;
use think\Request;
use think\Db;

class RcbLog extends ModelBase{
	
	/**
	 * 分页
	 */
	public function pageQuery(){
		$where = [];
		$where['a.dataFlag'] = 1;
		
		$type = input('type');
		if(!empty($type))$where['a.type'] = $type;
		$userName = input('user_name');
		if(!empty($userName))$where['a.user_name'] = $userName;
		$CreateTimeMin = input('create_time_min');
		$CreateTimeMax = input('create_time_max');
		if(!empty($CreateTimeMax) && !empty($CreateTimeMin))$where['a.add_time'] = ['between time',array($CreateTimeMin,$CreateTimeMax)];
		
		return Db::connect('bs_db_config')->name('rcb_log')->alias('a')
					->join('talk_user ap','a.user_id=ap.user_id','left')
					->field('id,a.order_no,a.user_id,user_name,type,add_time,available_amount,freeze_amount,description,ap.alias,ap.income_total,ap.income')
		            ->where($where)->order('id desc')
		            ->paginate(input('DataTables_Table_0_length/d'));
	}

	/**
	 * 分页
	 */
	public function new_pageQuery($start,$limit,$username,$data_type,$CreateTimeMin,$CreateTimeMax,$user_id){
		$offset = ($start - 1) * $limit;
		$where = [];
		if(!empty($CreateTimeMax)){
			$CreateTimeMax = date("Y-m-d",strtotime($CreateTimeMax."+ 1 day"));
		}
        if (!empty($data_type)) {
            $where = $this->whereForDataType($data_type);
        }
		$where['a.dataFlag'] = 1;
        if (!empty($username)) {
            $where['ap.alias'] = ['like', '%'.$username.'%'];
        }
		if(!empty($CreateTimeMax) && !empty($CreateTimeMin))$where['a.add_time'] = ['between time',array($CreateTimeMin,$CreateTimeMax)];

		if(!empty($CreateTimeMax) && empty($CreateTimeMin))$where['a.add_time'] = ['<',$CreateTimeMax];

		if(empty($CreateTimeMax) && !empty($CreateTimeMin))$where['a.add_time'] = ['>',$CreateTimeMin,$CreateTimeMax];
		if (!empty($user_id)) {
            $where['a.user_id'] = $user_id;
            $where['a.type'] = 'commission';
        }
		
		return Db::connect('bs_db_config')->name('rcb_log')->alias('a')
		->join('talk_user ap','a.user_id=ap.user_id','left')
		->join('talk_pay_order p','a.order_no = p.order_no','left')
		->join('talk_user u','p.user_id=u.user_id','left')
		->join('talk_user t','t.user_id = p.class_id','left')
		->where('p.type','in',[1,2,3,6,7])
		->field('a.id,a.order_no,a.user_id,a.type,add_time,available_amount,freeze_amount,description,ap.alias,ap.income_total,ap.income,a.class_id,p.type as pay_type,p.remark,u.alias as username,p.user_id as admire_userid,t.alias as viewpointServiceTname,a.admin_description')
        ->where($where)->order('a.id desc')->limit($offset, $limit)
        ->select();
	}
	/**
	 * 资金明细总条数
	 */
	public function new_count($username,$data_type,$CreateTimeMin,$CreateTimeMax,$user_id){
		$where = [];
		if(!empty($CreateTimeMax)){
			$CreateTimeMax = date("Y-m-d",strtotime($CreateTimeMax."+ 1 day"));
		}
		if (!empty($data_type)) {
            $where = $this->whereForDataType($data_type);
        }
		$where['a.dataFlag'] = 1;
		
		if (!empty($username)) {
            $where['ap.alias'] = ['like', '%'.$username.'%'];
        }
		if(!empty($CreateTimeMax) && !empty($CreateTimeMin))$where['a.add_time'] = ['between time',array($CreateTimeMin,$CreateTimeMax)];

		if(!empty($CreateTimeMax) && empty($CreateTimeMin))$where['a.add_time'] = ['<',$CreateTimeMax];

		if(empty($CreateTimeMax) && !empty($CreateTimeMin))$where['a.add_time'] = ['>',$CreateTimeMin,$CreateTimeMax];
		if (!empty($user_id)) {
            $where['a.user_id'] = $user_id;
            $where['a.type'] = 'commission';
        }
		
		return Db::connect('bs_db_config')->name('rcb_log')->alias('a')
		->join('talk_user ap','a.user_id=ap.user_id','left')
		->join('talk_pay_order p','a.order_no = p.order_no','left')
		->join('talk_user u','p.user_id=u.user_id','left')
		->join('talk_user t','t.user_id = p.class_id','left')
		->field('a.id')
        ->where('p.type','in',[1,2,3,6,7])
        ->where($where)->order('a.id desc')
        ->count();
	}
	
	public function getById($id){
		return $this->get(['id'=>$id,'dataFlag'=>1]);
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
		
		$result = $this->allowField(true)->save($data);
		
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
		$result = $this->allowField(true)->save($data,['adId'=>(int)$data['Id']]);
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
		$result = $this->setField(['adId'=>$id,'dataFlag'=>-1]);
		if(false !== $result){
			return 1;
        }else{
			return -1;
        }	
	}
	
	/**
	* 修改
	*/
	public function changeSort(){
		$id = (int)input('id');
		$adSort = (int)input('adSort');
		$result = $this->setField(['adId'=>$id,'adSort'=>$adSort]);
		if(false !== $result){
			return 1;
        }else{
			return -1;
        }
	}
	/**
	 *  根据业务类别筛选
	 * 	1购买单次课程
	    2单次课程分销
	    3单次课程售出
	    4提现
	    5购买观点
	    6观点分销
	    7观点售出
	    8赞赏收入
	    9赞赏分销
	    10赞赏支出
	 */
	public function whereForDataType($type){
		$where = array();
		$remark_giftType = '"giftType":3';
		if($type == 1){
			$where['a.type'] = 'order_pay';
			$where['p.type'] = 1;
		}
		if($type == 2){
			$where['a.type'] = 'commission';
			$where['p.type'] = 1;
		}
		if($type == 3){
			$where['a.type'] = 'class_income';
			$where['p.type'] = 1;
		}
		if($type == 5){
			$where['a.type'] = 'order_pay';
			$where['p.type'] = 2;
		}
		if($type == 6){
			$where['a.type'] = 'commission';
			$where['p.type'] = 2;
		}
		if($type == 7){
			$where['a.type'] = 'class_income';
			$where['p.type'] = 2;
		}
		if($type == 10){
			$where['a.type'] = 'order_pay';
			$where['p.type'] = ['in',[3,6]];
			// $where['p.remark'] = ['NOT LIKE', '%'.$remark_giftType.'%'];
		}
		if($type == 9){
			$where['a.type'] = 'commission';
			$where['p.type'] = ['in',[3,6]];
			// $where['p.remark'] = ['NOT LIKE', '%'.$remark_giftType.'%'];
		}
		if($type == 8){
			$where['a.type'] = 'class_income';
			$where['p.type'] = ['in',[3,6]];
			// $where['p.remark'] = ['NOT LIKE', '%'.$remark_giftType.'%'];
		}
		if($type == 4){
			$where['a.type'] = 'withdraw';
		}
		if($type == 11){
			$where['a.type'] = 'order_pay';
			$where['p.type'] = 7;
		}
		if($type == 12){
			$where['a.type'] = 'commission';
			$where['p.type'] = 7;
		}
		if($type == 13){
			$where['a.type'] = 'class_income';
			$where['p.type'] = 7;
		}
		if($type == 14){
			$where['a.type'] = 'order_pay';
			$where['p.type'] = ['in',[3,6]];
			$where['p.remark'] = ['like', '%'.$remark_giftType.'%'];
		}
		if($type == 15){
			$where['a.type'] = 'commission';
			$where['p.type'] = ['in',[3,6]];
			$where['p.remark'] = ['like', '%'.$remark_giftType.'%'];
		}
		if($type == 16){
			$where['a.type'] = 'class_income';
			$where['p.type'] = ['in',[3,6]];
			$where['p.remark'] = ['like', '%'.$remark_giftType.'%'];
		}
		return $where;
	}

    
}
