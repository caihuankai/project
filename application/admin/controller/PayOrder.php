<?php
namespace app\admin\controller;

use app\admin\model\PayOrder as M;
use think\Request;
use think\Session;
use think\Db;
use app\wechat\model\PayOrder as PM;
use app\admin\model\User as UserM;
use app\admin\model\Course;
use app\miniprogram\controller\CourseDetails;

class PayOrder extends App{
    
    
    use \app\admin\traits\Common,
        \app\admin\traits\AdminTable,
        \app\admin\traits\ImgReset,
        \app\admin\traits\Status,
        \app\admin\traits\userNav;
    
    
    

    public function index(){
		$list = $this->pageQuery();
		$this->assign('list',$list);
		$this->assign('count',count($list));
    	return $this->fetch("list");
    }

    public function new_index(){
        $model = new M();
        if (request()->isPost()) {
            $param = input("param.");
            $where = array();
            $start = !isset($param['pageNumber']) ? 0 : $param['pageNumber'];
            $size = !isset($param['pageSize']) ? 0 : $param['pageSize'];
            if (!empty($param['searchText'])) {
                $where['Title'] = ["like", "%" . $param['searchText'] . "%"];
            }

            $list = $model->new_pageQuery($start,$size,$param['order_number'],$param['classname'],$param['logmin'],$param['logmax'],$param['userType'],$param['teachername'],$param['username'],$param['amount'],$param['paytype'],$param['coursetype']);
            $count = $model->new_count($param['order_number'],$param['classname'],$param['logmin'],$param['logmax'],$param['userType'],$param['teachername'],$param['username'],$param['amount'],$param['paytype'],$param['coursetype']);
            foreach ($list as $k => $v) {
                if($list[$k]['user_type'] == 2){
                    $list[$k]['userState'] = '马甲';
                }
                if($list[$k]['user_type'] == 1 && $list[$k]['vip_level'] == 0){
                    $list[$k]['userState'] = '正式用户';
                }
                if($list[$k]['user_type'] == 1 && $list[$k]['vip_level'] > 0){
                    $list[$k]['userState'] = 'vip会员(VIP'.$list[$k]['vip_level'].')';
                }
                if($list[$k]['coursetype'] == 1){
                    $list[$k]['coursetype_name'] = '专题课';
                }elseif ($list[$k]['coursetype'] == 2) {
                    $list[$k]['coursetype_name'] = '系列课';
                }else{
                    $list[$k]['coursetype_name'] = '特训课';
                }
                if($list[$k]['pay_type'] == 1){
                    $list[$k]['pay_type_name'] = '微信支付';
                }elseif($list[$k]['pay_type'] == 2){
                    $list[$k]['pay_type_name'] = '支付宝支付';
                }elseif($list[$k]['pay_type'] == 3){
                    $list[$k]['pay_type_name'] = '连连支付';
                }elseif($list[$k]['pay_type'] == 6){
                    $list[$k]['pay_type_name'] = '点劵支付';
                }elseif($list[$k]['pay_type'] == 7){
                    $list[$k]['pay_type_name'] = '小程序支付';
                }else{
                    $list[$k]['pay_type_name'] = '';
                }

            }
            $data = ['rows' => $list, 'total' => $count];
            return $this->sucJson($data);
        }
        return $this->fetch();
    }
    /**
     * 获取分页
     */
    public function pageQuery(){
        $m = new M();
        return $m->pageQuery();
    }
    /**
     * 跳去编辑页面
     */
    public function toEdit(){
        $m = new M();
        $data = $m->getById(Input("id/d",0));
        return $this->fetch("edit",['data'=>$data]);
    }
	
	/**
     * 跳去新增页面
     */
    public function toAdd(){
        return $this->fetch("add");
    }
    /*
    * 获取数据
    */
    public function get(){
        $m = new M();
        return $m->getById(Input("id/d",0));
    }
    /**
     * 新增
     */
    public function add(){
        $m = new M();
		$rs = $m->add();
		if($rs==1){
			$this->success('新增成功', 'admin/Ads/index');
		}else{
			$this->error('新增失败');
		}
    }
    /**
    * 修改
    */
    public function edit(){
        $m = new M();
		$rs = $m->edit();
		if($rs==1){
			$this->success('编辑成功', 'admin/PayOrder/index');
		}else{
			$this->error('编辑失败');
		}
    }
    /**
     * 删除
     */
    public function del(){
        $m = new M();
        // return $m->del();
		
		$rs = $m->del();
		if($rs==1){
			$this->success('删除成功', 'admin/Ads/index');
		}else{
			$this->error('删除失败');
		}
    }
    /**
    * 修改广告排序
    */
    public function changeSort(){
        $m = new M();
        return $m->changeSort();
    }
    
    /**
     * 观点购买列表
     */
    public function viewpoint_list(){
        $model = new M();
        if(request()->isPost()){
            $param = input("param.");
            $where = array();
            $start = !isset($param['pageNumber']) ? 0 : $param['pageNumber'];
            $size = !isset($param['pageSize']) ? 0 : $param['pageSize'];
            $list = $model->viewpointList($start,$size,$param['order_number'],$param['classname'],$param['logmin'],$param['logmax'],$param['usermane']);
            $data = ['rows' => $list, 'total' => $model->viewpointCount($start,$size,$param['order_number'],$param['classname'],$param['logmin'],$param['logmax'],$param['usermane'])];
            return $this->sucJson($data);
        }
        return $this->fetch();
    }

    /**
     * 直播赞赏列表
     */
    public function admire_list($user_id=0){
        $model = new M();
        $this->assign('uid',$user_id);
        if(request()->isPost()){
            $param = input("param.");
            $where = array();
            $start = !isset($param['pageNumber']) ? 0 : $param['pageNumber'];
            $size = !isset($param['pageSize']) ? 0 : $param['pageSize'];
            $user_id = $param['uid'];
            $list = $model->admireList($start,$size,$param['order_number'],$param['remark'],$param['logmin'],$param['logmax'],$param['username'],$user_id,$param['send_username'],$param['live_name'],$param['course_name']);
            foreach ($list as $k => $v) {
                $v['remark'] = $this->decodeRemark($v['remark']);
                if($v['type'] == 6){
                    $v['viewpoint_user'] = $v['course_user'];
                    $v['live_name'] = '-';
                }else{
                    $v['live_name'] = $v['viewpoint_user'].'的直播间';
                }
            }
            $data = ['rows' => $list, 'total' => $model->admireCount($start,$size,$param['order_number'],$param['remark'],$param['logmin'],$param['logmax'],$param['username'],$user_id,$param['send_username'],$param['live_name'],$param['course_name'])];
            return $this->sucJson($data);
        }
        return $this->fetch();
    }
    /**
     * 用户直播赞赏列表
     */
    public function user_admire_list($user_id=0){
        $model = new M();
        $this->assign('uid',$user_id);
        if(request()->isPost()){
            $param = input("param.");
            $where = array();
            $start = !isset($param['pageNumber']) ? 0 : $param['pageNumber'];
            $size = !isset($param['pageSize']) ? 0 : $param['pageSize'];
            $user_id = $param['uid'];
            $list = $model->AdmireList($start,$size,$param['order_number'],$param['remark'],$param['logmin'],$param['logmax'],$param['username'],$user_id,$param['send_username'],$param['live_name'],$param['course_name']);
            foreach ($list as $k => $v) {
                $v['remark'] = $this->decodeRemark($v['remark']);
                if($v['type'] == 6){
                    $v['viewpoint_user'] = $v['course_user'];
                    $v['live_name'] = '-';
                }else{
                    $v['live_name'] = $v['viewpoint_user'].'的直播间';
                }
                if($v['state'] == 1){
                    $v['operate'] = '<a href="javascript:action_refund(\''.$v['order_no'].'\');">退款屏蔽</a>';
                }else{
                    $v['operate'] = '已退款屏蔽';
                }

            }
            $data = ['rows' => $list, 'total' => $model->admireCount($start,$size,$param['order_number'],$param['remark'],$param['logmin'],$param['logmax'],$param['username'],$user_id,$param['send_username'],$param['live_name'],$param['course_name'])];
            return $this->sucJson($data);
        }
        return $this->fetch();
    }

    /**
     * 用户充值列表
     * @param  [type] $remark [description]
     * @return [type]         [description]
     */
    public function inpour_list($user_id=0){
        $model = new M();
        $this->assign('uid',$user_id);
        if(request()->isPost()){
            $param = input("param.");
            $start = !isset($param['pageNumber']) ? 0 : $param['pageNumber'];
            $size = !isset($param['pageSize']) ? 0 : $param['pageSize'];
            $list = $model->inpourList($start,$size,$param['order_number'],$param['logmin'],$param['logmax'],$param['usermane']);
            $data = ['rows' => $list, 'total' => $model->inpourCount($start,$size,$param['order_number'],$param['logmin'],$param['logmax'],$param['usermane'])];
            return $this->sucJson($data);
        }
        return $this->fetch();
    }

    /**
     * 用户送礼列表
     * @param  integer $user_id [description]
     * @return [type]           [description]
     */
    public function gifts_list($user_id=0){
        $model = new M();
        $this->assign('uid',$user_id);
        if(request()->isPost()){
            $param = input('param.');
            $start = !isset($param['pageNumber']) ? 0 : $param['pageNumber'];
            $size = !isset($param['pageSize']) ? 0 : $param['pageSize'];
            $list = $model->giftsList($start,$size,$param['giftName'],$param['studentname'],$param['teachername'],$param['giftType'],$param['logmin'],$param['logmax']);
            foreach ($list as $k => $v) {
                if($v['type'] == 6){
                    $v['teacher_alias'] = $v['course_user'];
                    $v['user_id'] = $v['uid'];
                    $v['live_name'] = '-';
                    $v['position'] = '课程直播间-赠送礼物';
                }else{
                    $v['live_name'] = $v['teacher_alias'].'的直播间';
                    $v['position'] = 'Live直播间-赠送礼物';
                    $v['class_name'] = '-';
                }
                $v['student'] = "<a href=/ForegroundUser/details/userId/{$v['user_id']}>{$v['alias']}</a>";
                $v['teacher'] = "<a href=/ForegroundUser/details/userId/{$v['class_id']}>{$v['teacher_alias']}</a>";
                $v['remark'] = json_decode($v['remark'],true);
                isset($v['remark']['giftId']) ? $v['giftId']=$v['remark']['giftId'] : '';
                isset($v['remark']['giftPrice']) ? $v['giftPrice']=$v['remark']['giftPrice'] : '';
                isset($v['remark']['giftName']) ? $v['giftName']=$v['remark']['giftName'] : '';
                isset($v['remark']['giftImg']) ? $v['giftImg']='<img class="'.$v['id'].'" id="'.$v['id'].'" onclick=enlargeImg("'.$v['remark']['giftImg'].'") src="'.$v['remark']['giftImg'].'" style="width: 60px;">' : '';
                if(isset($v['remark']['giftType'])){
                    if($v['remark']['giftType'] == 3){
                        // $v['giftTypeName']='VIP会员礼物';
                        $v['giftTypeName']='常规礼物';
                    }else{
                        $v['giftTypeName']='常规礼物';
                    }
                }else{
                    $v['giftTypeName']='常规礼物';
                }
            }
            $data = ['rows' => $list, 'total' => $model->giftsCount($start,$size,$param['giftName'],$param['studentname'],$param['teachername'],$param['giftType'],$param['logmin'],$param['logmax'])];
            return $this->sucJson($data);
        }
        return $this->fetch();
    }

    /**
     * 购买观点包周列表
     * @param  [type] $user_id [description]
     * @return [type]          [description]
     */
    public function viewpointService($user_id=null){
        $model = new M();
        $this->assign('uid',$user_id);
        if(request()->isPost()){
            $param = input("param.");
            $where = array();
            $start = !isset($param['pageNumber']) ? 0 : $param['pageNumber'];
            $size = !isset($param['pageSize']) ? 0 : $param['pageSize'];
            $list = $model->viewpointServiceList($start,$size,$param['order_number'],$param['teachername'],$param['logmin'],$param['logmax'],$param['username'],$param['uid']);
            if(!empty($list)){
                foreach ($list as $k => $v) {
                    $v['student_name'] = "<a href=/ForegroundUser/details/userId/{$v['user_id']}>{$v['student_name']}</a>";
                    $v['teacher_name'] = "<a href=/ForegroundUser/details/userId/{$v['class_id']}>{$v['teacher_name']}</a>";
                }
            }
            $data = ['rows' => $list,'total' => $model->viewpointServiceCount($start,$size,$param['order_number'],$param['teachername'],$param['logmin'],$param['logmax'],$param['username'],$param['uid'])];
            return $this->sucJson($data);
        }
        return $this->fetch();
    }

    /**
     * 退款记录
     * @return [type] [description]
     */
    public function refundList(){
        $model = new M();
        if(request()->isPost()){
            $param = input('param.');
            $start = !isset($param['pageNumber']) ? 0 : $param['pageNumber'];
            $size = !isset($param['pageSize']) ? 0 : $param['pageSize'];
            $list = $model->refundList($start,$size,$param['tel'],$param['username'],$param['data_type'],$param['logmin'],$param['logmax']);
            foreach ($list as $k => $v) {
                $v['opName'] = $this->getOpName($v['type'],$v['class_type']);
                $v['refundInfo'] = $this->decodeRemark($v['remark']);
                if($v['type'] == 1){
                    $v['refundInfo'] = '课程名称：'.$v['class_name'];
                }
                elseif($v['type'] == 2){
                    $v['refundInfo'] = '观点标题：'.$v['title'];
                }
                elseif($v['type'] == 3){
                    $v['refundInfo'] = $v['teacher_alias'].'的直播间：'.$v['refundInfo'];
                }
                elseif($v['type'] == 6){
                    $v['refundInfo'] = $v['class_name'].'：'.$v['refundInfo'];
                }
                elseif($v['type'] == 7){
                    $v['refundInfo'] = '观点包周-'.$v['teacher_alias'];
                }
            }
            $data = ['rows' => $list, 'total' => $model->refundCount($param['tel'],$param['username'],$param['data_type'],$param['logmin'],$param['logmax'])];
            return $this->sucJson($data);
        }
        return $this->fetch();
    }
    /**
     * 购买系列课列表
     * @param  [type] $user_id [description]
     * @return [type]          [description]
     */
    public function seriesCourse($user_id=1706743){
        $model = new M();
        $UserModel = new UserM();
        $userInfo = $UserModel->where('user_id',$user_id)->field('user_id,alias')->find();
        $this->assign('userInfo',$userInfo);
        if(request()->isPost()){
            $param = input('param.');
            $start = !isset($param['pageNumber']) ? 0 : $param['pageNumber'];
            $size = !isset($param['pageSize']) ? 0 : $param['pageSize'];
            $list = $model->seriesCourseList($start,$size,$user_id);
            if(!empty($list)){
                foreach ($list as $k => $v) {
                    $v['buyAndStudy'] = $v['buy_num'].'/'.$v['study_num'];
                    $v['operate'] = "<a href=/course/details/id/{$v['id']}?tabName1=课程管理&tabName2=系列课程列表>详情</a> | ";
                    $v['course_status'] = '屏蔽';
                    if($v['open_status'] == 1){
                        $v['course_status'] = '开启';
                        $v['operate'] .= '<a href="javascript:changeStatus('.$v['id'].','.($v['open_status']+1).');">屏蔽</a> | ';
                    }else{
                        $v['operate'] .= '<a href="javascript:changeStatus('.$v['id'].','.($v['open_status']-1).');">开启</a> | ';
                    }
                    if($v['state'] == 1){
                        $v['operate'] .= '<a href="javascript:action_refund(\''.$v['order_no'].'\');">退款屏蔽</a>';
                    }elseif ($v['state'] == 3) {
                        $v['operate'] .= '线下支付';
                    }else{
                        $v['operate'] .= '已退款屏蔽';
                    }
                }
            }
            $data = ['rows' => $list, 'total' => $model->seriesCourseCount($user_id)];
            return $this->sucJson($data);
        }
        return $this->fetch();
    }
    /**
     * 购买系列课列表
     * @param  [type] $user_id [description]
     * @return [type]          [description]
     */
    public function seriesCourseH5($user_id=1706743){
        $model = new M();
        $UserModel = new UserM();
        $userInfo = $UserModel->where('user_id',$user_id)->field('user_id,alias')->find();
        $this->assign('userInfo',$userInfo);
        if(request()->isPost()){
            $param = input('param.');
            $start = !isset($param['pageNumber']) ? 0 : $param['pageNumber'];
            $size = !isset($param['pageSize']) ? 0 : $param['pageSize'];
            $list = $model->seriesCourseListH5($start,$size,$user_id);
            if(!empty($list)){
                foreach ($list as $k => $v) {
                    $v['buyAndStudy'] = $v['buy_num'].'/'.$v['study_num'];
                    $v['operate'] = "<a href=/course/details/id/{$v['id']}?tabName1=课程管理&tabName2=系列课程列表>详情</a> ";
                    $v['course_status'] = '屏蔽';
                    if($v['open_status'] == 1){
                        $v['course_status'] = '开启';
                        $v['operate'] .= '<a href="javascript:changeStatus('.$v['id'].','.($v['open_status']+1).');">屏蔽</a> | ';
                    }else{
                        $v['operate'] .= '<a href="javascript:changeStatus('.$v['id'].','.($v['open_status']-1).');">开启</a> | ';
                    }
                    if ($v['coursetype'] == 1){
                        $v['type'] ='专题课';
                    }else{
                        $v['type'] = $v['seriesType']==0?'系列课':($v['seriesType']==1?'月度课':'季度课');
                    }
                    $v['paytype'] = $v['paytype']==1?'课程':($v['paytype']==10?'月度课':'季度课');
                }
            }
            $data = ['rows' => $list, 'total' => $model->seriesCourseCount($user_id)];
            return $this->sucJson($data);
        }
        return $this->fetch();
    }
    /**
     * 用户购买观点包周服务列表
     * @param  [type] $user_id [description]
     * @return [type]          [description]
     */
    public function user_viewpointService($user_id=null){
        $model = new M();
        $this->assign('uid',$user_id);
        if(request()->isPost()){
            $param = input("param.");
            $where = array();
            $start = !isset($param['pageNumber']) ? 0 : $param['pageNumber'];
            $size = !isset($param['pageSize']) ? 0 : $param['pageSize'];
            $list = $model->viewpointServiceList($start,$size,$param['order_number'],$param['teachername'],$param['logmin'],$param['logmax'],$param['username'],$param['uid']);
            if(!empty($list)){
                foreach ($list as $k => $v) {
                    $v['student_name'] = "<a href=/ForegroundUser/details/userId/{$v['user_id']}>{$v['student_name']}</a>";
                    $v['teacher_name'] = "<a href=/ForegroundUser/details/userId/{$v['class_id']}>{$v['teacher_name']}</a>";
                    $v['deadline'] = date('Y-m-d H:i',strtotime("+1week",strtotime($v['pay_time'])));
                    if($v['state'] == 1){
                        $v['operate'] = '<a href="javascript:action_refund(\''.$v['order_no'].'\');">退款屏蔽</a>';
                    }else{
                        $v['operate'] = '已退款屏蔽';
                    }
                }
            }
            $data = ['rows' => $list,'total' => $model->viewpointServiceCount($start,$size,$param['order_number'],$param['teachername'],$param['logmin'],$param['logmax'],$param['username'],$param['uid'])];
            return $this->sucJson($data);
        }
        return $this->fetch();
    }

    public function decodeRemark($remark){
        if(!empty($remark)){
            $remarkArray = json_decode($remark,true);
            // type:1 文字，2 图片，3 语音，4 课程，5 观点
            if($remarkArray['type'] == 1){
                return $remark = $remarkArray['content'];
            }
            if($remarkArray['type'] == 2){
                return $remark = "<a href=".$remarkArray['content'].">图片</a>";
            }
            if($remarkArray['type'] == 3){
                return $remark = "<a href=".$remarkArray['content'].">语音</a>";
            }
            if($remarkArray['type'] == 4){
                return $remark = "<a href=/Course/details/id/".$remarkArray['id'].">课程：".$remarkArray['content']."</a>";
            }
            if($remarkArray['type'] == 5){
                return $remark = "<a href=/Viewpoint/details/id/".$remarkArray['id'].">观点：".$remarkArray['content']."</a>";
            }
            if($remarkArray['type'] == 6){
                return $remark = "红包";
            }
            if($remarkArray['type'] == 7){
                return $remark = $remarkArray['content'];
            }
        }else{
            return $remark;
        }
    }
    public function enlargeImg(){
        $img = input('img');
        $this->assign('img',$img);
        return $this->fetch();
    }
    public function test(){
        return "<a href=/Viewpoint/details/id/1097>跳</a>";
        return "<a href=/Course/details/id/1>跳</a>";;
    }
    /**
     * 获取业务类别
     * @param  [type] $type [description]
     * @return [type]       [description]
     */
    public function getOpName($type,$class_type){
        switch ($type) {
            case 1:
                if($class_type == 2){
                    $str = '系列课退款';    
                }else{
                    $str = '单次课退款';
                }
                break;
            case 2:
                $str = '观点退款';
                break;
            case 3:
                $str = 'Live直播送礼退款';
                break;
            case 6:
                $str = '课程直播送礼退款';
                break;
            case 7:
                $str = '观点包周退款';
                break;
                        
            default:
                 $str = '';
                break;
        }
        return $str;
    }

    /**
     * 用户退款
     * @param  [type] $order_no 订单号
     * @return [type]           [description]
     */
    public function refund($order_no){
        $model = new PM();
        return $model->refundOperate($order_no);

    }    
    
    
    
    /**
     * 付费观点包周记录
     *
     * @return mixed
     * @author aozhuochao
     */
    public function userWeekViewpointList($userId)
    {
        $this->setTabNameThirdly('付费观点包时记录');
        $model = new \app\admin\model\PayOrder();


        $header = [
            'num' => '序号',
            'id' => 'ID',
            'teacher' => '讲师',
            'type' => '类型',
            'price' => '价格（观点）',
            'nickname' => '用户昵称',
            'createTime' => '开通时间',
            'expireTime' => '到期时间',
            'days' => '天数',
        ];

        
        $this->setTableHeader($header)
            ->setSearch([
                [['options' => ['placeholder' => '讲师']], 'like', 'u.alias'],
                [['options' => ['placeholder' => '开始时间']], 'dateMin-date', 'po.pay_time'],
                [['options' => ['placeholder' => '结束时间']], 'dateMax-date', 'po.pay_time '],
            ]);
        
        
        return $this->traitAdminTableList(function ()use($model, $userId){
            
            $field = 'po.id, po.amount, po.pay_time, po.user_id buyUserId, po.class_id, u.alias';
            
            $data = $this->traitAdminTableQuery([], function ()use ($model, $userId){
                $model->where(['po.user_id' => $userId])->alias('po');
                $model->join('user u', 'u.user_id = po.class_id and po.type = 7 and po.state = 1');
                
                
                return $model;
            }, $field, 'po.id desc');
            
            $result = $userIds = [];
            
            foreach ($data['rows'] as $row) {
                $userIds[$row['buyUserId']] = $row['buyUserId'];
            }
    
            
            $userData = (new \app\admin\model\User())->getUserColumn($userIds);
    
    
            $i = 1;
            foreach ($data['rows'] as $datum) {
                
                $temp = [
                    'num' => $i,
                    'id' => $datum['id'],
                    'teacher' => \app\admin\model\UrlHtml::goUserDetailsUrl($datum['class_id'], $datum['alias']),
                    'type' => '包周（7天）',
                    'price' => $datum['amount'],
                    'nickname' => isset($userData[$datum['buyUserId']])?\app\admin\model\UrlHtml::goUserDetailsUrl(
                        $datum['buyUserId'], $userData[$datum['buyUserId']]):'',
                    'createTime' => $datum['pay_time'],
                    'expireTime' => date('Y-m-d H:i:s', strtotime($datum['pay_time']) + 604800),
                    'days' => '7',

                ];
                
                $result[] = $temp;
                
                ++$i;
            }
            
            return $this->sucJson([
                'rows' => $result,
                'total' => $data['total'],
            ]);
        });
    }
    /**
     * 人工充值、购买列表
     * @return [type] [description]
     */
    public function artificialPay(){
        if(request()->isPost()){
            $model = new M();
            $param = input("param.");
            $list = $model->artificialPayList($param);
            foreach ($list as $k => $v) {
                $remark = json_decode($v['remark'],true);
                $v['remark'] = isset($remark['content']) ? $remark['content'] : "";
                $v['adminName'] = isset($remark['adminName']) ? $remark['adminName'] : "";
                $v['classTypeName'] = '单节课';
                if($v['classType'] == 2){
                    $v['classTypeName'] = '系列课';
                }
                if($v['pay_type'] == 1){
                    $v['pay_type_name'] = '支付宝支付';
                }
                elseif ($v['pay_type'] == 2) {
                    $v['pay_type_name'] = '微信支付';
                }
                elseif ($v['pay_type'] == 3) {
                    $v['pay_type_name'] = '银联支付';
                }
                // $v['operate'] = '<a href="javascript:edit('.$v['id'].');">编辑</a>';
                $v['operate'] = '<a href="javascript:record_del('.$v['id'].');">删除</a>';
            }
            return $this->sucJson([
                'rows' => $list,
                'total' => $model->artificialPayCount($param),
            ]);
        }
        return $this->fetch();
    }
    /**
     * 新增人工购买订单
     */
    public function addArtificialPay(){
        if(request()->isPost()){
            if(empty(input('third_order_no'))){
                return $this->error('请填写订单流水号');
            }
            if(empty(input('user_id'))){
                return $this->error('请填写购买用户ID');
            }
            if(empty(input('class_id'))){
                return $this->error('请填写购买课程ID');
            }
            if(empty(input('create_time'))){
                return $this->error('请填写购买时间');
            }
            if(empty(input('amount'))){
                return $this->error('请填写金额');
            }
            if(empty(input('pay_type'))){
                return $this->error('请填写支付方式');
            }
            $model = new M();
            $UserModel = new UserM();
            $data['user_id'] = input('user_id');
            $data['order_no'] = getTradeNo();
            $data['third_order_no'] = input('third_order_no');
            $data['pay_type'] = input('pay_type');
            $data['client_type'] = 3;
            $data['amount'] = input('amount');
            $data['total_fee'] = input('amount');
            $data['create_time'] = input('create_time');
            $data['pay_time'] = input('create_time');
            $data['state'] = 3;
            $data['client_ip'] = request()->ip(0, true);
            $data['type'] = 1;
            $data['class_id'] = input('class_id');
            $remark['adminID'] = $_SESSION['adminSess']['admin']['id'];
            $remark['adminName'] = $_SESSION['adminSess']['admin']['username'];
            if(!empty(input('content'))){
                $remark['content'] = input('content');
            }
            $data['remark'] = json_encode($remark);
            //判断输入课程是否存在
            $courseModel = new Course();
            $courseInfo = $courseModel->where('id',$data['class_id'])->find();
            if(empty($courseInfo)){
                return $this->error('输入课程不存在');
            }
            //判断用户是否已购买该课程
            $where['user_id'] = $data['user_id'];
            $where['type'] = 1;
            $where['class_id'] = $data['class_id'];
            $where['state'] = ['in',[1,3]];
            $payorderInfo = $model
            ->where($where)
            ->find();
            if(!empty($payorderInfo)){
                return $this->error('重复购买，用户已购买该课程');
            }
            $state = $model->insertGetId($data);
            //获取用户成长等级
            $userInfo = $UserModel->where('user_id',$data['user_id'])->field('vip_level,inpour_total,consume_total')->find();
            $level = $userInfo['vip_level'];
            $new_level = $this->getLevel($userInfo['inpour_total']+$data['amount']);
            $UserModel->where('user_id',$data['user_id'])->update([
                'vip_level' => $new_level,
                'inpour_total' => $userInfo['inpour_total']+$data['amount'],
                'consume_total' => $userInfo['consume_total']+$data['amount'],
            ]);
            //特训课购买需要调用报名
            $CourseDetailsC = new CourseDetails();
            $CourseDetailsC->joinCourse($data['user_id'],$data['class_id'],true);
            if($state > 0){
                $rtd['status'] = 1;
                $rtd['msg'] = "新增成功";
                return $rtd;
            }else{
                return $this->error('新增失败');
            }

        }
        return $this->fetch();
    }
    /**
     * 删除人工购买订单
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function recordDel($id){
        $id = (int)$id;
        $model = new M();
        $info = $model->where('id',$id)->find();
        $infoRemark = $info['remark'];
        $infoRemark = json_decode($infoRemark,true);
        if(isset($infoRemark['content'])){
            $remark['content'] = $infoRemark['content'];
        }
        $remark['adminID'] = $_SESSION['adminSess']['admin']['id'];
        $remark['adminName'] = $_SESSION['adminSess']['admin']['username'];
        $remark = json_encode($remark);
        $status = $model->where('id',$id)->update([
            'state' => 4,
            'remark' => $remark,
            'refundtime' => date('Y-m-d H:i:s'),
        ]);
        if($status){
            return 1;
        }
    }
    /**
     * 修改人工购买订单
     * @return [type] [description]
     */
    public function editArtificialPay(){
        $model = new M();
        $id = (int)input('id');
        $data = $model->where('id',$id)->find();
        $remark = json_decode($data['remark'],true);
        $data['content'] = isset($remark['content']) ? $remark['content'] : "";
        if(request()->isPost()){
            if(empty(input('third_order_no'))){
                return $this->error('请填写订单流水号');
            }
            if(empty(input('user_id'))){
                return $this->error('请填写购买用户ID');
            }
            if(empty(input('class_id'))){
                return $this->error('请填写购买课程ID');
            }
            if(empty(input('create_time'))){
                return $this->error('请填写购买时间');
            }
            if(empty(input('amount'))){
                return $this->error('请填写金额');
            }
            if(empty(input('pay_type'))){
                return $this->error('请填写支付方式');
            }
            $upinfo['user_id'] = input('user_id');
            $upinfo['third_order_no'] = input('third_order_no');
            $upinfo['pay_type'] = input('pay_type');
            $upinfo['amount'] = input('amount');
            $upinfo['total_fee'] = input('amount');
            $upinfo['create_time'] = input('create_time');
            $upinfo['pay_time'] = input('create_time');
            $upinfo['client_ip'] = request()->ip(0, true);
            $upinfo['class_id'] = input('class_id');
            $remark['adminID'] = $_SESSION['adminSess']['admin']['id'];
            $remark['adminName'] = $_SESSION['adminSess']['admin']['username'];
            if(!empty(input('content'))){
                $remark['content'] = input('content');
            }
            $upinfo['remark'] = json_encode($remark);
            //判断输入课程是否存在
            $courseModel = new Course();
            $courseInfo = $courseModel->where('id',$upinfo['class_id'])->find();
            if(empty($courseInfo)){
                return $this->error('输入课程不存在');
            }
            //判断用户是否已购买该课程
            $where['user_id'] = $upinfo['user_id'];
            $where['type'] = 1;
            $where['class_id'] = $upinfo['class_id'];
            $where['state'] = ['in',[1,3]];
            $payorderInfo = $model
            ->where($where)
            ->find();
            if(!empty($payorderInfo) && input('old_class_id') != $upinfo['class_id']){
                return $this->error('重复购买，用户已购买该课程');
            }
            $status = $model->where('id',$id)->update([
                'user_id' => $upinfo['user_id'],
                'third_order_no' => $upinfo['third_order_no'],
                'pay_type' => $upinfo['pay_type'],
                'amount' => $upinfo['amount'],
                'total_fee' => $upinfo['total_fee'],
                'create_time' => $upinfo['create_time'],
                'pay_time' => $upinfo['pay_time'],
                'client_ip' => $upinfo['client_ip'],
                'class_id' => $upinfo['class_id'],
                'remark' => $upinfo['remark'],
            ]);
            if($status){
                $rtd['status'] = 1;
                $rtd['msg'] = "编辑成功";
                return $rtd;
            }else{
                $rtd['status'] = -1;
                $rtd['msg'] = "编辑失败";
                return $rtd;
            }
        }
        $this->assign('data',$data);
        return $this->fetch();
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
     * 栏目订阅列表
     */
    public function column_list(){
        $model = new M();
        if(request()->isPost()){
            $param = input("param.");
            $where = array();
            $start = !isset($param['pageNumber']) ? 0 : $param['pageNumber'];
            $size = !isset($param['pageSize']) ? 0 : $param['pageSize'];
            $list = $model->columnList($start,$size);
            $data = ['rows' => $list, 'total' => $model->columnCount()];
            return $this->sucJson($data);
        }
        return $this->fetch();
    }
    
}