<?php
namespace app\admin\model;

use think\Db;
use app\common\model\ModelBs;

class PayOrder extends ModelBs{
    
    
    /**
     * 统计金额
     *
     * @param array $classId
     * @param       $type
     * @return array
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function sumMoney(array $classId, $type)
    {
        if (empty($classId)) {
            return [];
        }
        
        return $this->where(['class_id' => ['in', $classId], 'type' => $type])->field('sum(amount) num, class_id')->group('class_id')
            ->fetchClass('\CollectionBase')->select()->column('num', 'class_id');
    }
    
    
	/**
	 * 分页
	 */
	public function pageQuery(){
		$where = [];
		// $where['p.dataFlag'] = 1;
		$orderNo = input('order_no');
		if(!empty($orderNo))$where['p.order_no'] = $orderNo;
		$courseName = input('course_name');
		if(!empty($courseName))$where['c.class_name'] = $courseName;
		$CreateTimeMin = input('create_time_min');
		$CreateTimeMax = input('create_time_max');
		if(!empty($CreateTimeMax) && !empty($CreateTimeMin))$where['p.create_time'] = ['between time',array($CreateTimeMin,$CreateTimeMax)];

		$where['p.state'] = 1;
		
		return Db::connect('bs_db_config')->name('pay_order')->alias('p')->join('__COURSE__ c','p.class_id = c.id')->join('__USER__ u','p.user_id = u.user_id')
					->field('p.id,p.user_id,p.vip_id,order_no,p.third_order_no,p.pay_type,p.client_type,p.amount,p.total_fee,p.create_time,p.pay_time,p.state,p.client_ip,p.third_ip,p.subscribe_id,c.class_name,p.remark,u.alias')
		            ->where($where)->order('p.id', 'desc')
					->paginate(input('DataTables_Table_0_length/d'));
	}

	public function new_pageQuery($start,$limit,$order_number,$classname,$CreateTimeMin,$CreateTimeMax,$userType,$teachername='',$username='',$amount='',$paytype='',$coursetype=''){
		$offset = ($start - 1) * $limit;
		$where = [];
		$where['u.dataFlag'] = 1;
		$where['p.type'] = 1;
		if(!empty($CreateTimeMax)){
			$CreateTimeMax = date("Y-m-d",strtotime($CreateTimeMax."+ 1 day"));
		}
        if (!empty($order_number)) {
            $where['order_no'] = ['like', '%'.$order_number.'%'];
        }
        if (!empty($classname)) {
            $where['class_name'] = ['like', '%'.$classname.'%'];
        }
        if (!empty($data_type)) {
            $where['type'] = $data_type;
        }
		if(!empty($CreateTimeMax) && !empty($CreateTimeMin))$where['p.create_time'] = ['between time',array($CreateTimeMin,$CreateTimeMax)];

		if(!empty($CreateTimeMax) && empty($CreateTimeMin))$where['p.create_time'] = ['<',$CreateTimeMax];

		if(empty($CreateTimeMax) && !empty($CreateTimeMin))$where['p.create_time'] = ['>',$CreateTimeMin,$CreateTimeMax];

		$where['p.state'] = 1;

		if(!empty($userType)){
			if($userType == 1){
				$where['u.user_type'] = 1;
				$where['u.vip_level'] = 0;
			}
			if($userType == 2){
				$where['u.user_type'] = 1;
				$where['u.vip_level'] = ['>',0];
			}
			if($userType == 3){
				$where['u.user_type'] = 2;
			}
		}

		!empty($teachername) ? $where['ua.alias'] = ['like', '%'.$teachername.'%'] : '';
		!empty($username) ? $where['u.alias'] = ['like', '%'.$username.'%'] : '';
		!empty($amount) ? $where['p.amount'] = $amount : '';
		!empty($paytype) ? $where['p.pay_type'] = $paytype : '';
		!empty($coursetype) ? $where['c.type'] = $coursetype : '';
		
		return Db::connect('bs_db_config')->name('pay_order')->alias('p')->join('__COURSE__ c','p.class_id = c.id')->join('__USER__ u','p.user_id = u.user_id')
			->join('talk_user ua','ua.user_id = c.uid')
			->field('p.id,p.user_id,p.vip_id,order_no,p.third_order_no,p.pay_type,p.client_type,p.amount,p.total_fee,p.create_time,p.pay_time,p.state,p.client_ip,p.third_ip,p.type,c.class_name,p.remark,u.alias,u.vip_level,u.user_type,ua.alias as teachername,c.type as coursetype')
            ->where($where)->order('p.id', 'desc')->limit($offset, $limit)
			->select();
	}

	public function new_count($order_number,$classname,$CreateTimeMin,$CreateTimeMax,$userType,$teachername='',$username='',$amount='',$paytype='',$coursetype=''){
		$where = [];
		$where['u.dataFlag'] = 1;
		$where['p.type'] = 1;
		if(!empty($CreateTimeMax)){
			$CreateTimeMax = date("Y-m-d",strtotime($CreateTimeMax."+ 1 day"));
		}
        if (!empty($order_number)) {
            $where['order_no'] = ['like', '%'.$order_number.'%'];
        }
        if (!empty($classname)) {
            $where['class_name'] = ['like', '%'.$classname.'%'];
        }
		if(!empty($CreateTimeMax) && !empty($CreateTimeMin))$where['p.create_time'] = ['between time',array($CreateTimeMin,$CreateTimeMax)];

		if(!empty($CreateTimeMax) && empty($CreateTimeMin))$where['p.create_time'] = ['<',$CreateTimeMax];

		if(empty($CreateTimeMax) && !empty($CreateTimeMin))$where['p.create_time'] = ['>',$CreateTimeMin,$CreateTimeMax];
		// $where['p.dataFlag'] = 1;

		$where['p.state'] = 1;

		if(!empty($userType)){
			if($userType == 1){
				$where['u.user_type'] = 1;
				$where['u.vip_level'] = 0;
			}
			if($userType == 2){
				$where['u.user_type'] = 1;
				$where['u.vip_level'] = ['>',0];
			}
			if($userType == 3){
				$where['u.user_type'] = 2;
			}
		}

		!empty($teachername) ? $where['ua.alias'] = ['like', '%'.$teachername.'%'] : '';
		!empty($username) ? $where['u.alias'] = ['like', '%'.$username.'%'] : '';
		!empty($amount) ? $where['p.amount'] = $amount : '';
		!empty($paytype) ? $where['p.pay_type'] = $paytype : '';
		!empty($coursetype) ? $where['c.type'] = $coursetype : '';
		
		return Db::connect('bs_db_config')->name('pay_order')->alias('p')->join('__COURSE__ c','p.class_id = c.id')->join('__USER__ u','p.user_id = u.user_id')
			->join('talk_user ua','ua.user_id = c.uid')
			->field('p.id')
            ->where($where)->order('p.id', 'desc')
			->count();
	}
	
	/**
	 * 根据id获取信息
	 */
	public function getById($id){
		return $this->get(['id'=>$id]);
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
		// $data['createTime'] = date('Y-m-d H:i:s');
		
		$result = $this->allowField(true)->save($data,['id'=>(int)$data['Id']]);
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
	* 修改广告排序
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
	 * 观点购买列表
	 */
	public function viewpointList($start,$limit,$order_number,$classname,$CreateTimeMin,$CreateTimeMax,$username){
		$offset = ($start - 1) * $limit;
		$where = [];
		$where['p.type'] = 2;
		$where['p.state'] = 1;
        if (!empty($order_number)) {
            $where['order_no'] = ['like', '%'.$order_number.'%'];
        }
        if (!empty($classname)) {
            $where['title'] = ['like', '%'.$classname.'%'];
        }
        if (!empty($username)) {
            $where['t.alias'] = ['like', '%'.$username.'%'];
        }
		if(!empty($CreateTimeMax) && !empty($CreateTimeMin))$where['p.create_time'] = ['between time',array($CreateTimeMin,$CreateTimeMax)];

		if(!empty($CreateTimeMax) && empty($CreateTimeMin))$where['p.create_time'] = ['<',$CreateTimeMax];

		if(empty($CreateTimeMax) && !empty($CreateTimeMin))$where['p.create_time'] = ['>',$CreateTimeMin,$CreateTimeMax];
		$data = $this->alias('p')
		->join('viewpoint c','p.class_id = c.id','left')
		->join('user u','p.user_id = u.user_id','left')
		->join('user t','t.user_id = c.uid','left')
		->join('talk_column_viewpoint cv', 'cv.viewpoint_id = c.id','left')
		->join('talk_column co','co.id = cv.column_id','left')
		->field('p.id,p.user_id,p.vip_id,order_no,p.third_order_no,p.pay_type,p.client_type,p.amount,p.total_fee,p.create_time,p.pay_time,p.state,p.client_ip,p.third_ip,p.type,c.title,p.remark,u.alias,c.uid,t.alias as viewpoint_user,p.class_id,co.name')
        ->where($where)->order('p.id', 'desc')->limit($offset, $limit)
		->select();
		return $data;
	}
	public function viewpointCount($start,$limit,$order_number,$classname,$CreateTimeMin,$CreateTimeMax,$username){
		$offset = ($start - 1) * $limit;
		$where = [];
		$where['p.type'] = 2;
		$where['p.state'] = 1;
		if (!empty($order_number)) {
            $where['order_no'] = ['like', '%'.$order_number.'%'];
        }
        if (!empty($classname)) {
            $where['title'] = ['like', '%'.$classname.'%'];
        }
        if (!empty($username)) {
            $where['t.alias'] = ['like', '%'.$username.'%'];
        }
		if(!empty($CreateTimeMax) && !empty($CreateTimeMin))$where['p.create_time'] = ['between time',array($CreateTimeMin,$CreateTimeMax)];

		if(!empty($CreateTimeMax) && empty($CreateTimeMin))$where['p.create_time'] = ['<',$CreateTimeMax];

		if(empty($CreateTimeMax) && !empty($CreateTimeMin))$where['p.create_time'] = ['>',$CreateTimeMin,$CreateTimeMax];
		$data = $this->alias('p')
		->join('viewpoint c','p.class_id = c.id','left')
		->join('user u','p.user_id = u.user_id','left')
		->join('user t','t.user_id = c.uid','left')
		->field('p.id')
        ->where($where)->order('p.id', 'desc')
		->count();
		return $data;
	}
	/**
	 * 直播赞赏列表
	 */
	public function admireList($start,$limit,$order_number,$remark,$CreateTimeMin,$CreateTimeMax,$username,$user_id,$sendUsername,$liveName,$courseName){
		$offset = ($start - 1) * $limit;
		$where = [];
		$where['p.type'] = ['in',[3,6]];
		$where['p.state'] = 1;
		if(!empty($CreateTimeMax)){
			$CreateTimeMax = date("Y-m-d",strtotime($CreateTimeMax."+ 1 day"));
		}
        if (!empty($order_number)) {
            $where['order_no'] = ['like', '%'.$order_number.'%'];
        }
        if (!empty($remark)) {
            $where['remark'] = ['like', '%'.$remark.'%'];
        }
		if(!empty($CreateTimeMax) && !empty($CreateTimeMin))$where['p.create_time'] = ['between time',array($CreateTimeMin,$CreateTimeMax)];

		if(!empty($CreateTimeMax) && empty($CreateTimeMin))$where['p.create_time'] = ['<',$CreateTimeMax];

		if(empty($CreateTimeMax) && !empty($CreateTimeMin))$where['p.create_time'] = ['>',$CreateTimeMin,$CreateTimeMax];
		if ($user_id != 0) {
            $where['p.user_id'] = $user_id;
            $where['p.state'] = ['in',[1,5]];
        }
        if (!empty($sendUsername)) {
            $where['u.alias'] = ['like', '%'.$sendUsername.'%'];
        }
        if (!empty($courseName)) {
            $where['c.class_name'] = ['like', '%'.$courseName.'%'];
            $where['p.type'] = 6;
        }
        if (!empty($username) && empty($liveName)) {
        	$this->where(function($query)use($username){
        		$query->where('t.alias','like','%'.$username.'%')->whereOr('ua.alias','like','%'.$username.'%');
        	});
        }
        else if(empty($username) && !empty($liveName) || !empty($username) && !empty($liveName)){
        	$this->where(function($query)use($liveName){
        		$query->where('t.alias','like','%'.$liveName.'%')->whereOr('ua.alias','like','%'.$liveName.'%');
        	});
            $where['p.type'] = 3;
        }
		$data = $this->alias('p')
		->join('user u','p.user_id = u.user_id','left')
		->join('user t','t.user_id = p.class_id','left')
		->join('course c','c.id = p.class_id','left')
		->join('user ua','ua.user_id = c.uid','left')
		->field('p.id,p.user_id,p.vip_id,order_no,p.third_order_no,p.pay_type,p.client_type,p.amount,p.total_fee,p.create_time,p.pay_time,p.state,p.client_ip,p.third_ip,p.type,p.remark,u.alias,t.alias as viewpoint_user,c.class_name,ua.alias as course_user')
        ->where($where)->order('p.id', 'desc')->limit($offset, $limit)
		->select();
		return $data;
	}
	public function admireCount($start,$limit,$order_number,$remark,$CreateTimeMin,$CreateTimeMax,$username,$user_id,$sendUsername,$liveName,$courseName){
		$offset = ($start - 1) * $limit;
		$where = [];
		$where['p.type'] = ['in',[3,6]];
		$where['p.state'] = 1;
		if(!empty($CreateTimeMax)){
			$CreateTimeMax = date("Y-m-d",strtotime($CreateTimeMax."+ 1 day"));
		}
        if (!empty($order_number)) {
            $where['order_no'] = ['like', '%'.$order_number.'%'];
        }
        if (!empty($remark)) {
            $where['remark'] = ['like', '%'.$remark.'%'];
        }
		if(!empty($CreateTimeMax) && !empty($CreateTimeMin))$where['p.create_time'] = ['between time',array($CreateTimeMin,$CreateTimeMax)];

		if(!empty($CreateTimeMax) && empty($CreateTimeMin))$where['p.create_time'] = ['<',$CreateTimeMax];

		if(empty($CreateTimeMax) && !empty($CreateTimeMin))$where['p.create_time'] = ['>',$CreateTimeMin,$CreateTimeMax];
		if ($user_id != 0) {
            $where['p.user_id'] = $user_id;
            $where['p.state'] = ['in',[1,5]];
        }
        if (!empty($sendUsername)) {
            $where['u.alias'] = ['like', '%'.$sendUsername.'%'];
        }
        if (!empty($courseName)) {
            $where['c.class_name'] = ['like', '%'.$courseName.'%'];
            $where['p.type'] = 6;
        }
        if (!empty($username) && empty($liveName)) {
        	$this->where(function($query)use($username){
        		$query->where('t.alias','like','%'.$username.'%')->whereOr('ua.alias','like','%'.$username.'%');
        	});
        }
        else if(empty($username) && !empty($liveName) || !empty($username) && !empty($liveName)){
        	$this->where(function($query)use($liveName){
        		$query->where('t.alias','like','%'.$liveName.'%')->whereOr('ua.alias','like','%'.$liveName.'%');
        	});
            $where['p.type'] = 3;
        }
		$data = $this->alias('p')
		->join('user u','p.user_id = u.user_id','left')
		->join('user t','t.user_id = p.class_id','left')
		->join('course c','c.id = p.class_id','left')
		->join('user ua','ua.user_id = c.uid','left')
		->field('p.id')
        ->where($where)->order('p.id', 'desc')
		->count();
		return $data;
	}
	/**
	 * 用户充值列表
	 * @param  [type] $start         [description]
	 * @param  [type] $limit         [description]
	 * @param  [type] $order_number  [description]
	 * @param  [type] $CreateTimeMin [description]
	 * @param  [type] $CreateTimeMax [description]
	 * @param  [type] $username      [description]
	 * @return [type]                [description]
	 */
	public function inpourList($start,$limit,$order_number,$CreateTimeMin,$CreateTimeMax,$username){
		$offset = ($start - 1) * $limit;
		$where = [];
		$where['p.type'] = 4;
		$where['p.state'] = 1;
		$where['r.type'] = 'inpour';

		if(!empty($CreateTimeMax)){
			$CreateTimeMax = date("Y-m-d",strtotime($CreateTimeMax."+ 1 day"));
		}
		if (!empty($order_number)) {
            $where['p.order_no'] = ['like', '%'.$order_number.'%'];
        }
        if (!empty($username)) {
            $where['u.alias'] = ['like', '%'.$username.'%'];
        }
		if(!empty($CreateTimeMax) && !empty($CreateTimeMin))$where['p.create_time'] = ['between time',array($CreateTimeMin,$CreateTimeMax)];

		if(!empty($CreateTimeMax) && empty($CreateTimeMin))$where['p.create_time'] = ['<',$CreateTimeMax];

		if(empty($CreateTimeMax) && !empty($CreateTimeMin))$where['p.create_time'] = ['>',$CreateTimeMin,$CreateTimeMax];
		$data = $this->alias('p')
		->join('user u','p.user_id = u.user_id','left')
		->join('rcb_log r','r.order_no = p.order_no')
		->field('p.id,p.user_id,p.vip_id,p.order_no,p.third_order_no,p.pay_type,p.client_type,p.amount,p.total_fee,p.create_time,p.pay_time,p.state,p.client_ip,p.third_ip,p.type,p.remark,u.alias,r.available_amount')
        ->where($where)->order('p.id', 'desc')->limit($offset, $limit)
		->select();
		return $data;
	}
	public function inpourCount($start,$limit,$order_number,$CreateTimeMin,$CreateTimeMax,$username){
		$offset = ($start - 1) * $limit;
		$where = [];
		$where['p.type'] = 4;
		$where['p.state'] = 1;
		$where['r.type'] = 'inpour';

		if(!empty($CreateTimeMax)){
			$CreateTimeMax = date("Y-m-d",strtotime($CreateTimeMax."+ 1 day"));
		}
		if (!empty($order_number)) {
            $where['p.order_no'] = ['like', '%'.$order_number.'%'];
        }
        if (!empty($username)) {
            $where['u.alias'] = ['like', '%'.$username.'%'];
        }
		if(!empty($CreateTimeMax) && !empty($CreateTimeMin))$where['p.create_time'] = ['between time',array($CreateTimeMin,$CreateTimeMax)];

		if(!empty($CreateTimeMax) && empty($CreateTimeMin))$where['p.create_time'] = ['<',$CreateTimeMax];

		if(empty($CreateTimeMax) && !empty($CreateTimeMin))$where['p.create_time'] = ['>',$CreateTimeMin,$CreateTimeMax];
		$data = $this->alias('p')
		->join('user u','p.user_id = u.user_id','left')
		->join('rcb_log r','r.order_no = p.order_no')
		->field('p.id')
        ->where($where)
		->count();
		return $data;
	}
	/**
	 * 用户送礼列表
	 * @param  [type] $start         [description]
	 * @param  [type] $limit         [description]
	 * @param  [type] $giftName      [description]
	 * @param  [type] $studentname   [description]
	 * @param  [type] $teachername   [description]
	 * @param  [type] $giftType      [description]
	 * @param  [type] $CreateTimeMin [description]
	 * @param  [type] $CreateTimeMax [description]
	 * @return [type]                [description]
	 */
	public function giftsList($start,$limit,$giftName,$studentname,$teachername,$giftType,$CreateTimeMin,$CreateTimeMax){
		$offset = ($start - 1) * $limit;
		$where = [];
		$where['p.type'] = ['in',[3,6]];
		$where['p.state'] = 1;
		if(!empty($CreateTimeMax)){
			$CreateTimeMax = date("Y-m-d",strtotime($CreateTimeMax."+ 1 day"));
		}
		if (!empty($giftName)) {
            $where['p.remark'] = ['like', '%'.$giftName.'%'];
        }
        if (!empty($studentname)) {
            $where['u.alias'] = ['like', '%'.$studentname.'%'];
        }
        if (!empty($teachername)) {
        	$this->where(function($query)use($teachername){
        		$query->where('t.alias','like','%'.$teachername.'%')->whereOr('ua.alias','like','%'.$teachername.'%');
        	});
        }
		if(!empty($CreateTimeMax) && !empty($CreateTimeMin))$where['p.create_time'] = ['between time',array($CreateTimeMin,$CreateTimeMax)];

		if(!empty($CreateTimeMax) && empty($CreateTimeMin))$where['p.create_time'] = ['<',$CreateTimeMax];

		if(empty($CreateTimeMax) && !empty($CreateTimeMin))$where['p.create_time'] = ['>',$CreateTimeMin,$CreateTimeMax];

		// if($giftType == 1){
		// 	$remark_giftType = '"giftType":3';
		// 	$where['p.remark'] = ['NOT LIKE', '%'.$remark_giftType.'%'];
		// }
		// if($giftType == 2){
		// 	$remark_giftType = '"giftType":3';
		// 	$where['p.remark'] = ['like', '%'.$remark_giftType.'%'];
		// }

		$data = $this->alias('p')
		->join('user u','p.user_id = u.user_id','left')
		->join('user t','t.user_id = p.class_id','left')
		->join('course c','c.id = p.class_id','left')
		->join('user ua','ua.user_id = c.uid','left')
		->field('p.id,p.user_id,p.vip_id,order_no,p.third_order_no,p.pay_type,p.client_type,p.amount,p.total_fee,p.create_time,p.pay_time,p.state,p.client_ip,p.third_ip,p.type,p.remark,p.class_id,u.alias,t.alias as teacher_alias,c.class_name,c.uid,ua.alias as course_user')
        ->where($where)->order('p.id', 'desc')->limit($offset, $limit)
		->select();
		return $data;
	}
	public function giftsCount($start,$limit,$giftName,$studentname,$teachername,$giftType,$CreateTimeMin,$CreateTimeMax){
		$where = [];
		$where['p.type'] = ['in',[3,6]];
		$where['p.state'] = 1;
		if(!empty($CreateTimeMax)){
			$CreateTimeMax = date("Y-m-d",strtotime($CreateTimeMax."+ 1 day"));
		}
		if (!empty($giftName)) {
            $where['p.remark'] = ['like', '%'.$giftName.'%'];
        }
        if (!empty($studentname)) {
            $where['u.alias'] = ['like', '%'.$studentname.'%'];
        }
        if (!empty($teachername)) {
        	$this->where(function($query)use($teachername){
        		$query->where('t.alias','like','%'.$teachername.'%')->whereOr('ua.alias','like','%'.$teachername.'%');
        	});
        }
		if(!empty($CreateTimeMax) && !empty($CreateTimeMin))$where['p.create_time'] = ['between time',array($CreateTimeMin,$CreateTimeMax)];

		if(!empty($CreateTimeMax) && empty($CreateTimeMin))$where['p.create_time'] = ['<',$CreateTimeMax];

		if(empty($CreateTimeMax) && !empty($CreateTimeMin))$where['p.create_time'] = ['>',$CreateTimeMin,$CreateTimeMax];

		// if($giftType == 1){
		// 	$remark_giftType = '"giftType":3';
		// 	$where['p.remark'] = ['NOT LIKE', '%'.$remark_giftType.'%'];
		// }
		// if($giftType == 2){
		// 	$remark_giftType = '"giftType":3';
		// 	$where['p.remark'] = ['like', '%'.$remark_giftType.'%'];
		// }
		
		$data = $this->alias('p')
		->join('user u','p.user_id = u.user_id','left')
		->join('user t','t.user_id = p.class_id','left')
		->join('course c','c.id = p.class_id','left')
		->join('user ua','ua.user_id = c.uid','left')
		->field('p.id')
        ->where($where)
		->count();
		return $data;
	}

	public function viewpointServiceList($start,$limit,$order_number,$teacherName,$CreateTimeMin,$CreateTimeMax,$userName,$uid){
		$offset = ($start - 1) * $limit;
		$where = [];
		$where['p.type'] = 7;
		$where['p.state'] = 1;
		$where['p.vip_id'] = 0;
        if (!empty($order_number)) {
            $where['p.order_no'] = ['like', '%'.$order_number.'%'];
        }
        if (!empty($userName)) {
            $where['u.alias'] = ['like', '%'.$userName.'%'];
        }
        if (!empty($teacherName)) {
            $where['t.alias'] = ['like', '%'.$teacherName.'%'];
        }
        if (!empty($uid)) {
            $where['p.user_id'] = $uid;
            $where['p.state'] = ['in',[1,5]];
        }
        if(!empty($CreateTimeMax)){
			$CreateTimeMax = date("Y-m-d",strtotime($CreateTimeMax."+ 1 day"));
		}
		if(!empty($CreateTimeMax) && !empty($CreateTimeMin))$where['p.create_time'] = ['between time',array($CreateTimeMin,$CreateTimeMax)];

		if(!empty($CreateTimeMax) && empty($CreateTimeMin))$where['p.create_time'] = ['<',$CreateTimeMax];

		if(empty($CreateTimeMax) && !empty($CreateTimeMin))$where['p.create_time'] = ['>',$CreateTimeMin,$CreateTimeMax];
		$data = $this->alias('p')
		->join('user u','p.user_id = u.user_id','left')
		->join('user t','t.user_id = p.class_id','left')
		->field('p.id,p.user_id,p.order_no,p.client_type,p.total_fee,p.pay_time,p.state,p.type,p.class_id,u.alias as student_name,t.alias as teacher_name')
        ->where($where)->order('p.id', 'desc')->limit($offset, $limit)
		->select();
		return $data;
	}
	public function viewpointServiceCount($start,$limit,$order_number,$teacherName,$CreateTimeMin,$CreateTimeMax,$userName,$uid){
		$offset = ($start - 1) * $limit;
		$where = [];
		$where['p.type'] = 7;
		$where['p.state'] = 1;
		$where['p.vip_id'] = 0;
        if (!empty($order_number)) {
            $where['p.order_no'] = ['like', '%'.$order_number.'%'];
        }
        if (!empty($userName)) {
            $where['u.alias'] = ['like', '%'.$userName.'%'];
        }
        if (!empty($teacherName)) {
            $where['t.alias'] = ['like', '%'.$teacherName.'%'];
        }
        if (!empty($uid)) {
            $where['p.user_id'] = $uid;
            $where['p.state'] = ['in',[1,5]];
        }
        if(!empty($CreateTimeMax)){
			$CreateTimeMax = date("Y-m-d",strtotime($CreateTimeMax."+ 1 day"));
		}
		if(!empty($CreateTimeMax) && !empty($CreateTimeMin))$where['p.create_time'] = ['between time',array($CreateTimeMin,$CreateTimeMax)];

		if(!empty($CreateTimeMax) && empty($CreateTimeMin))$where['p.create_time'] = ['<',$CreateTimeMax];

		if(empty($CreateTimeMax) && !empty($CreateTimeMin))$where['p.create_time'] = ['>',$CreateTimeMin,$CreateTimeMax];
		$data = $this->alias('p')
		->join('user u','p.user_id = u.user_id','left')
		->join('user t','t.user_id = p.class_id','left')
		->field('p.id')
        ->where($where)->order('p.id', 'desc')
		->count();
		return $data;
	}
	/**
	 * 用户退款列表
	 * @param  [type] $start         [description]
	 * @param  [type] $limit         [description]
	 * @param  [type] $giftName      [description]
	 * @param  [type] $studentname   [description]
	 * @param  [type] $teachername   [description]
	 * @param  [type] $giftType      [description]
	 * @param  [type] $CreateTimeMin [description]
	 * @param  [type] $CreateTimeMax [description]
	 * @return [type]                [description]
	 */
	public function refundList($start,$limit,$tel,$username,$data_type,$CreateTimeMin,$CreateTimeMax){
		$offset = ($start - 1) * $limit;
		$where = [];
		if (!empty($data_type)) {
            $where = $this->whereForDataType($data_type);
        }
		$where['p.state'] = 5;
		if(!empty($CreateTimeMax)){
			$CreateTimeMax = date("Y-m-d",strtotime($CreateTimeMax."+ 1 day"));
		}
		if (!empty($tel)) {
            $where['u.tel'] = ['like', '%'.$tel.'%'];
        }
        if (!empty($username)) {
            $where['u.alias'] = ['like', '%'.$username.'%'];
        }
		if(!empty($CreateTimeMax) && !empty($CreateTimeMin))$where['p.refundtime'] = ['between time',array($CreateTimeMin,$CreateTimeMax)];

		if(!empty($CreateTimeMax) && empty($CreateTimeMin))$where['p.refundtime'] = ['<',$CreateTimeMax];

		if(empty($CreateTimeMax) && !empty($CreateTimeMin))$where['p.refundtime'] = ['>',$CreateTimeMin,$CreateTimeMax];
		$data = $this->alias('p')
		->join('user u','p.user_id = u.user_id','left')
		->join('user t','t.user_id = p.class_id','left')
		->join('course c','c.id = p.class_id','left')
		->join('viewpoint v','v.id = p.class_id','left')
		->field('p.id,p.user_id,p.order_no,p.client_type,p.amount,p.create_time,p.pay_time,p.state,p.type,p.remark,p.class_id,p.refundtime,u.alias,u.tel,t.alias as teacher_alias,c.class_name,c.type as class_type,v.title')
		->where('p.type','in',[1,2,3,6,7])
        ->where($where)->order('p.refundtime', 'desc')->limit($offset, $limit)
		->select();
		return $data;
	}
	public function refundCount($tel,$username,$data_type,$CreateTimeMin,$CreateTimeMax){
		$where = [];
		if (!empty($data_type)) {
            $where = $this->whereForDataType($data_type);
        }
		$where['p.state'] = 5;
		if(!empty($CreateTimeMax)){
			$CreateTimeMax = date("Y-m-d",strtotime($CreateTimeMax."+ 1 day"));
		}
		if (!empty($tel)) {
            $where['u.tel'] = ['like', '%'.$tel.'%'];
        }
        if (!empty($username)) {
            $where['u.alias'] = ['like', '%'.$username.'%'];
        }
		if(!empty($CreateTimeMax) && !empty($CreateTimeMin))$where['p.refundtime'] = ['between time',array($CreateTimeMin,$CreateTimeMax)];

		if(!empty($CreateTimeMax) && empty($CreateTimeMin))$where['p.refundtime'] = ['<',$CreateTimeMax];

		if(empty($CreateTimeMax) && !empty($CreateTimeMin))$where['p.refundtime'] = ['>',$CreateTimeMin,$CreateTimeMax];
		$data = $this->alias('p')
		->join('user u','p.user_id = u.user_id','left')
		->join('user t','t.user_id = p.class_id','left')
		->join('course c','c.id = p.class_id','left')
		->join('viewpoint v','v.id = p.class_id','left')
		->field('p.id')
		->where('p.type','in',[1,2,3,6,7])
        ->where($where)->order('p.refundtime', 'desc')
		->count();
		return $data;
	}
	/**
	 * 用户购买系列课列表
	 * @param  [type] $start         [description]
	 * @param  [type] $limit         [description]
	 * @return [type]                [description]
	 */
	public function seriesCourseList($start,$limit,$user_id){
		$offset = ($start - 1) * $limit;
		$where = [];
		$where['p.type'] = 1;
		$where['p.state'] = ['in',[1,3,5]];
		$where['c.type'] = 2;
		$where['p.user_id'] = $user_id;
		$data = $this->alias('p')
		->join('course c','c.id = p.class_id','left')
		->join('live_cate lc','lc.id = c.cate_id','left')
		->join('live_cate lca','lca.id = lc.pid','left')
		->field('c.id,c.class_name,lca.name as pcatename,lc.name as catename,p.amount,(select count(pa.id) from talk_pay_order pa where pa.state = 1 and type = 1 and pa.class_id = p.class_id) as buy_num,c.study_num,c.open_status,p.order_no,p.state')
        ->where($where)->order('p.id', 'desc')->limit($offset, $limit)
		->select();
		return $data;
	}
    /**
     * 用户购买课列表
     * @param  [type] $start         [description]
     * @param  [type] $limit         [description]
     * @return [type]                [description]
     */
    public function seriesCourseListH5($start,$limit,$user_id){
        $offset = ($start - 1) * $limit;
        $where = [];
        $where['p.type'] = ['in',[1,10,11]];
        $where['p.state'] = ['in',[1,3,5]];
        $where['c.type'] = ['in',[1,2]];
        $where['c.seriesType'] = ['in',[0,1,2]];
        $where['p.user_id'] = $user_id;
        $data = $this->alias('p')
            ->join('course c','c.id = p.class_id','left')
            ->join('live_cate lc','lc.id = c.cate_id','left')
            ->join('live_cate lca','lca.id = lc.pid','left')
            ->field('c.id,c.type as coursetype,c.seriesType,c.class_name,lca.name as pcatename,lc.name as catename,p.amount,(select count(pa.id) from talk_pay_order pa where pa.state = 1 and type = 1 and pa.class_id = p.class_id) as buy_num,c.study_num,c.open_status,p.order_no,p.state,p.type as paytype,p.create_time as pay_created_at,p.overdue_time')
            ->where($where)->order('p.id', 'desc')->limit($offset, $limit)
            ->select();
        return $data;
    }

    /**
     * 统计数量
     * @param $user_id
     * @return int
     */
	public function seriesCourseCount($user_id){
		$where = [];
		$where['p.type'] = 1;
		$where['p.state'] = ['in',[1,3,5]];
		$where['c.type'] = 2;
		$where['p.user_id'] = $user_id;
		$data = $this->alias('p')
		->join('course c','c.id = p.class_id','left')
		->join('live_cate lc','lc.id = c.cate_id','left')
		->join('live_cate lca','lca.id = lc.pid','left')
		->field('c.id')
        ->where($where)->order('p.id', 'desc')
		->count();
		return $data;
	}
    /**
     * 统计数量h5
     * @param $user_id
     * @return int
     */
    public function seriesCourseCountH5($user_id){
        $where = [];
        $where['p.type'] = ['in',[1,10,11]];
        $where['p.state'] = ['in',[1,3,5]];
        $where['c.type'] = ['in',[1,2]];
        $where['c.seriesType'] = ['in',[0,1,2]];
        $where['p.user_id'] = $user_id;
        $data = $this->alias('p')
            ->join('course c','c.id = p.class_id','left')
            ->join('live_cate lc','lc.id = c.cate_id','left')
            ->join('live_cate lca','lca.id = lc.pid','left')
            ->field('c.id')
            ->where($where)->order('p.id', 'desc')
            ->count();
        return $data;
    }
	public function courseCount($user_id){
		$where = [];
		$where['p.type'] = 1;
		$where['p.state'] = ['in',[1,3,5]];
		$where['c.type'] = 1;
		$where['c.status'] = ['<>',5];
		$where['p.user_id'] = $user_id;
		$data = $this->alias('p')
		->join('course c','c.id = p.class_id','left')
		->join('live_cate lc','lc.id = c.cate_id','left')
		->join('live_cate lca','lca.id = lc.pid','left')
		->field('c.id')
        ->where($where)->order('p.id', 'desc')
		->count();
		return $data;
	}
    public function courseSpecialCount($user_id){
        $where = [];
        $where['p.type'] = 1;
        $where['p.state'] = ['in',[1,3,5]];
        $where['c.type'] = 3;
        $where['c.status'] = ['<>',5];
        $where['p.user_id'] = $user_id;
        $data = $this->alias('p')
            ->join('course c','c.id = p.class_id','left')
            ->join('live_cate lc','lc.id = c.cate_id','left')
            ->join('live_cate lca','lca.id = lc.pid','left')
            ->field('c.id')
            ->where($where)->order('p.id', 'desc')
            ->count();
        return $data;
    }

	public function whereForDataType($data_type){
		$where = array();
		switch ($data_type) {
			case 1:
				$where['p.type'] = 1;
				$where['c.type'] = 1;
				break;
			case 11:
				$where['p.type'] = 1;
				$where['c.type'] = 2;
				break;
			case 2:
				$where['p.type'] = 2;
				break;
			case 7:
				$where['p.type'] = 7;
				break;
			case 3:
				$where['p.type'] = 3;
				break;
			case 6:
				$where['p.type'] = 6;
				break;
			
			default:
				# code...
				break;
		}
		return $where;
	}

	/**
	 * 用户人工购买列表
	 * @param  [type] $param [description]
	 * @return [type]        [description]
	 */
	public function artificialPayList($param){
		$where = array();
		$where['p.state'] = 3;
		$where['p.type'] = 1;
		$start = !isset($param['pageNumber']) ? 0 : $param['pageNumber'];
        $limit = !isset($param['pageSize']) ? 0 : $param['pageSize'];
        if(!empty($param['order_number'])){
        	$where['p.order_no'] = ['like', '%'.$param['order_number'].'%'];
        }
        if(!empty($param['class_id'])){
        	$where['p.class_id'] = $param['class_id'];
        }
        if(!empty($param['classname'])){
        	$where['c.class_name'] = ['like', '%'.$param['classname'].'%'];
        }
        if(!empty($param['class_type'])){
        	$where['c.type'] = $param['class_type'];
        }
        if(!empty($param['user_id'])){
        	$where['p.user_id'] = $param['user_id'];
        }
        if(!empty($param['alias'])){
        	$where['u.alias'] = ['like', '%'.$param['alias'].'%'];
        }
        if(!empty($param['logmax'])){
			$param['logmax'] = date("Y-m-d",strtotime($param['logmax']."+ 1 day"));
		}
		if(!empty($param['logmax']) && !empty($param['logmin']))$where['p.create_time'] = ['between time',array($param['logmin'],$param['logmax'])];

		if(!empty($param['logmax']) && empty($param['logmin']))$where['p.create_time'] = ['<',$param['logmax']];

		if(empty($param['logmax']) && !empty($param['logmin']))$where['p.create_time'] = ['>',$param['logmin'],$param['logmax']];
        $offset = ($start - 1) * $limit;
        $data = $this->alias('p')
        ->join('course c','c.id = p.class_id')
        ->join('user u','u.user_id = p.user_id')
        ->field('p.id,p.order_no,p.third_order_no,p.user_id,u.alias,p.class_id,c.class_name,c.type as classType,p.pay_time,p.pay_type,p.total_fee,p.remark')
        ->where($where)
        ->limit($offset, $limit)
        ->order('p.pay_time','desc')
        ->select();
        return $data;
	}
	public function artificialPayCount($param){
		$where = array();
		$where['p.state'] = 3;
		$where['p.type'] = 1;
        if(!empty($param['order_number'])){
        	$where['p.order_no'] = ['like', '%'.$param['order_number'].'%'];
        }
        if(!empty($param['class_id'])){
        	$where['p.class_id'] = $param['class_id'];
        }
        if(!empty($param['classname'])){
        	$where['c.class_name'] = ['like', '%'.$param['classname'].'%'];
        }
        if(!empty($param['class_type'])){
        	$where['c.type'] = $param['class_type'];
        }
        if(!empty($param['user_id'])){
        	$where['p.user_id'] = $param['user_id'];
        }
        if(!empty($param['alias'])){
        	$where['u.alias'] = ['like', '%'.$param['alias'].'%'];
        }
        if(!empty($param['logmax'])){
			$param['logmax'] = date("Y-m-d",strtotime($param['logmax']."+ 1 day"));
		}
		if(!empty($param['logmax']) && !empty($param['logmin']))$where['p.create_time'] = ['between time',array($param['logmin'],$param['logmax'])];

		if(!empty($param['logmax']) && empty($param['logmin']))$where['p.create_time'] = ['<',$param['logmax']];

		if(empty($param['logmax']) && !empty($param['logmin']))$where['p.create_time'] = ['>',$param['logmin'],$param['logmax']];
		$data = $this->alias('p')
        ->join('course c','c.id = p.class_id')
        ->join('user u','u.user_id = p.user_id')
        ->field('p.id,p.order_no,p.third_order_no,p.user_id,u.alias,p.class_id,c.class_name,c.type as classType,p.pay_time,p.pay_type,p.total_fee,p.remark')
        ->where($where)
        ->order('p.pay_time','desc')
        ->count();
        return $data;
	}
	/**
	 * 栏目订阅记录列表
	 * @param  [type] $page [description]
	 * @param  [type] $size  [description]
	 * @return [array]        [description]
	 */
	public function columnList($page,$size){
		$where['p.type'] = 9;
		$where['p.state'] = 1;
		$data = $this->alias('p')
		->field('p.id,p.order_no,u.alias,c.name,p.class_id,p.num,p.amount,p.create_time')
		->join('talk_column c','p.class_id = c.id','left')
		->join('talk_user u','u.user_id = p.user_id')
		->order('p.pay_time','desc')
		->page($page,$size)
		->where($where)
		->select();
		return $data;
	}
	public function columnCount(){
		$where['p.type'] = 9;
		$where['p.state'] = 1;
		$data = $this->alias('p')
		->field('p.id,p.order_no,u.alias,c.name,p.class_id,p.num,p.amount,p.create_time')
		->join('talk_column c','p.class_id = c.id','left')
		->join('talk_user u','u.user_id = p.user_id')
		->where($where)
		->count();
		return $data;
	}
    //h5购买列表
    public function h5_new_pageQuery($start,$limit,$order_number,$classname,$CreateTimeMin,$CreateTimeMax,$userType,$teachername='',$username='',$amount='',$paytype='',$coursetype=''){
		$offset = ($start - 1) * $limit;
		$where = [];
		$where['u.dataFlag'] = 1;
		$where['p.type'] = ['in',[10,11]];
		if(!empty($CreateTimeMax)){
			$CreateTimeMax = date("Y-m-d",strtotime($CreateTimeMax."+ 1 day"));
		}
        if (!empty($order_number)) {
            $where['order_no'] = ['like', '%'.$order_number.'%'];
        }
        if (!empty($classname)) {
            $where['class_name'] = ['like', '%'.$classname.'%'];
        }
		if(!empty($CreateTimeMax) && !empty($CreateTimeMin))$where['p.create_time'] = ['between time',array($CreateTimeMin,$CreateTimeMax)];

		if(!empty($CreateTimeMax) && empty($CreateTimeMin))$where['p.create_time'] = ['<',$CreateTimeMax];

		if(empty($CreateTimeMax) && !empty($CreateTimeMin))$where['p.create_time'] = ['>',$CreateTimeMin,$CreateTimeMax];

		$where['p.state'] = 1;

		if(!empty($userType)){
			if($userType == 1){
				$where['u.user_type'] = 1;
				$where['u.vip_level'] = 0;
			}
			if($userType == 2){
				$where['u.user_type'] = 1;
				$where['u.vip_level'] = ['>',0];
			}
			if($userType == 3){
				$where['u.user_type'] = 2;
			}
		}

		!empty($teachername) ? $where['ua.alias'] = ['like', '%'.$teachername.'%'] : '';
		!empty($username) ? $where['u.alias'] = ['like', '%'.$username.'%'] : '';
		!empty($amount) ? $where['p.amount'] = $amount : '';
		!empty($paytype) ? $where['p.pay_type'] = $paytype : '';
		!empty($coursetype) ? $where['c.seriesType'] = $coursetype : '';
		
		return Db::connect('bs_db_config')->name('pay_order')->alias('p')->join('__COURSE__ c','p.class_id = c.id')->join('__USER__ u','p.user_id = u.user_id')
			->join('talk_user ua','ua.user_id = c.uid')
			->field('p.id,p.user_id,p.vip_id,order_no,p.third_order_no,p.pay_type,p.client_type,p.amount,p.total_fee,p.create_time,p.pay_time,p.state,p.client_ip,p.third_ip,p.type,c.class_name,p.remark,u.alias,u.vip_level,u.user_type,ua.alias as teachername,c.type as coursetype,p.overdue_time,c.seriesType')
            ->where($where)->order('p.id', 'desc')->limit($offset, $limit)
			->select();
	}

	public function h5_new_count($order_number,$classname,$CreateTimeMin,$CreateTimeMax,$userType,$teachername='',$username='',$amount='',$paytype='',$coursetype=''){
		$where = [];
		$where['u.dataFlag'] = 1;
		$where['p.type'] = ['in',[10,11]];
		if(!empty($CreateTimeMax)){
			$CreateTimeMax = date("Y-m-d",strtotime($CreateTimeMax."+ 1 day"));
		}
        if (!empty($order_number)) {
            $where['order_no'] = ['like', '%'.$order_number.'%'];
        }
        if (!empty($classname)) {
            $where['class_name'] = ['like', '%'.$classname.'%'];
        }
		if(!empty($CreateTimeMax) && !empty($CreateTimeMin))$where['p.create_time'] = ['between time',array($CreateTimeMin,$CreateTimeMax)];

		if(!empty($CreateTimeMax) && empty($CreateTimeMin))$where['p.create_time'] = ['<',$CreateTimeMax];

		if(empty($CreateTimeMax) && !empty($CreateTimeMin))$where['p.create_time'] = ['>',$CreateTimeMin,$CreateTimeMax];
		// $where['p.dataFlag'] = 1;

		$where['p.state'] = 1;

		if(!empty($userType)){
			if($userType == 1){
				$where['u.user_type'] = 1;
				$where['u.vip_level'] = 0;
			}
			if($userType == 2){
				$where['u.user_type'] = 1;
				$where['u.vip_level'] = ['>',0];
			}
			if($userType == 3){
				$where['u.user_type'] = 2;
			}
		}

		!empty($teachername) ? $where['ua.alias'] = ['like', '%'.$teachername.'%'] : '';
		!empty($username) ? $where['u.alias'] = ['like', '%'.$username.'%'] : '';
		!empty($amount) ? $where['p.amount'] = $amount : '';
		!empty($paytype) ? $where['p.pay_type'] = $paytype : '';
		!empty($coursetype) ? $where['c.seriesType'] = $coursetype : '';
		
		return Db::connect('bs_db_config')->name('pay_order')->alias('p')->join('__COURSE__ c','p.class_id = c.id')->join('__USER__ u','p.user_id = u.user_id')
			->join('talk_user ua','ua.user_id = c.uid')
			->field('p.id')
            ->where($where)->order('p.id', 'desc')
			->count();
	}
	//h5人工创建订单
	/**
	 * 用户人工购买列表
	 * @param  [type] $param [description]
	 * @return [type]        [description]
	 */
	public function h5ArtificialPayList($param){
		$where = array();
		$where['p.state'] = 3;
		$where['p.type'] = ['in',[10,11]];
		$start = !isset($param['pageNumber']) ? 0 : $param['pageNumber'];
        $limit = !isset($param['pageSize']) ? 0 : $param['pageSize'];
        if(!empty($param['order_number'])){
        	$where['p.order_no'] = ['like', '%'.$param['order_number'].'%'];
        }
        if(!empty($param['class_id'])){
        	$where['p.class_id'] = $param['class_id'];
        }
        if(!empty($param['classname'])){
        	$where['c.class_name'] = ['like', '%'.$param['classname'].'%'];
        }
        if(!empty($param['class_type'])){
        	$where['c.seriesType'] = $param['class_type'];
        }
        if(!empty($param['user_id'])){
        	$where['p.user_id'] = $param['user_id'];
        }
        if(!empty($param['alias'])){
        	$where['u.alias'] = ['like', '%'.$param['alias'].'%'];
        }
        if(!empty($param['logmax'])){
			$param['logmax'] = date("Y-m-d",strtotime($param['logmax']."+ 1 day"));
		}
		if(!empty($param['logmax']) && !empty($param['logmin']))$where['p.create_time'] = ['between time',array($param['logmin'],$param['logmax'])];

		if(!empty($param['logmax']) && empty($param['logmin']))$where['p.create_time'] = ['<',$param['logmax']];

		if(empty($param['logmax']) && !empty($param['logmin']))$where['p.create_time'] = ['>',$param['logmin'],$param['logmax']];
        $offset = ($start - 1) * $limit;
        $data = $this->alias('p')
        ->join('course c','c.id = p.class_id')
        ->join('user u','u.user_id = p.user_id')
        ->field('p.id,p.order_no,p.third_order_no,p.user_id,u.alias,p.class_id,c.class_name,c.type as classType,p.pay_time,p.pay_type,p.total_fee,p.remark,p.overdue_time,c.seriesType')
        ->where($where)
        ->limit($offset, $limit)
        ->order('p.pay_time','desc')
        ->select();
        return $data;
	}
	public function h5ArtificialPayCount($param){
		$where = array();
		$where['p.state'] = 3;
		$where['p.type'] = ['in',[10,11]];
        if(!empty($param['order_number'])){
        	$where['p.order_no'] = ['like', '%'.$param['order_number'].'%'];
        }
        if(!empty($param['class_id'])){
        	$where['p.class_id'] = $param['class_id'];
        }
        if(!empty($param['classname'])){
        	$where['c.class_name'] = ['like', '%'.$param['classname'].'%'];
        }
        if(!empty($param['class_type'])){
        	$where['c.seriesType'] = $param['class_type'];
        }
        if(!empty($param['user_id'])){
        	$where['p.user_id'] = $param['user_id'];
        }
        if(!empty($param['alias'])){
        	$where['u.alias'] = ['like', '%'.$param['alias'].'%'];
        }
        if(!empty($param['logmax'])){
			$param['logmax'] = date("Y-m-d",strtotime($param['logmax']."+ 1 day"));
		}
		if(!empty($param['logmax']) && !empty($param['logmin']))$where['p.create_time'] = ['between time',array($param['logmin'],$param['logmax'])];

		if(!empty($param['logmax']) && empty($param['logmin']))$where['p.create_time'] = ['<',$param['logmax']];

		if(empty($param['logmax']) && !empty($param['logmin']))$where['p.create_time'] = ['>',$param['logmin'],$param['logmax']];
		$data = $this->alias('p')
        ->join('course c','c.id = p.class_id')
        ->join('user u','u.user_id = p.user_id')
        ->field('p.id,p.order_no,p.third_order_no,p.user_id,u.alias,p.class_id,c.class_name,c.type as classType,p.pay_time,p.pay_type,p.total_fee,p.remark')
        ->where($where)
        ->order('p.pay_time','desc')
        ->count();
        return $data;
	}
}
