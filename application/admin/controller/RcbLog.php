<?php
namespace app\admin\controller;

use app\admin\model\RcbLog as M;
use think\Request;
use think\Session;
use think\Db;
use app\wechat\model\Course;
use app\admin\model\Viewpoint;
use app\admin\controller\PayOrder;
use app\wechat\model\RcbLog as WM;

class RcbLog extends App{
    use \app\admin\traits\Common,
        \app\admin\traits\AdminTable,
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
            $user_id = $param['user_id'];

            $list = $model->new_pageQuery($start,$size,$param['username'],$param['data_type'],$param['logmin'],$param['logmax'],$user_id);
            $i_count = count($list);
            for ($i=0; $i < $i_count; $i++) { 
                if($list[$i]['type'] == "commission" || $list[$i]['type'] == "class_income"){
                    $list[$i]['class_amount'] = $list[$i]['available_amount'];
                    $list[$i]['class_withdraw'] = '';
                }
                else if($list[$i]['type'] == "withdraw"){
                    $list[$i]['class_amount'] = '';
                    $list[$i]['class_withdraw'] = $list[$i]['available_amount'];
                }else if($list[$i]['type'] == "order_pay"){
                    $list[$i]['class_amount'] = '';
                    $list[$i]['class_withdraw'] = $list[$i]['available_amount'];
                }
                else{
                    $list[$i]['class_amount'] = '';
                    $list[$i]['class_withdraw'] = ''; 
                }
                if($list[$i]['pay_type'] == 3 || $list[$i]['pay_type'] == 6){
                    $PayOrderC = new PayOrder();
                    $list[$i]['op_name'] = $PayOrderC->decodeRemark($list[$i]['remark']);
                }else{
                    $list[$i]['op_name'] = $this->getOpName($list[$i]['class_id'],$list[$i]['type'],$list[$i]['pay_type'],$list[$i]['viewpointServiceTname']);    
                }
                $list[$i]['alias'] = "<a href=/ForegroundUser/details/userId/{$list[$i]['user_id']}>{$list[$i]['alias']}</a>";
                $list[$i]['username'] = "<a href=/ForegroundUser/details/userId/{$list[$i]['admire_userid']}>{$list[$i]['username']}</a>";
                $list[$i]['opType'] = $this->getOpType($list[$i]['type'],$list[$i]['pay_type'],$list[$i]['remark']);
                //2.7增加操作
                $list[$i]['operate'] = '<a href="javascript:remark('.$list[$i]['id'].');">备注</a>';

            }
            $count = $model->new_count($param['username'],$param['data_type'],$param['logmin'],$param['logmax'],$user_id);
            $data = ['rows' => $list, 'total' => $count];
            return $this->sucJson($data);
        }
        
        $user_id = $this->request->param('user_id/i', 0);
        $this->assign('userNav', $this->userNav($user_id, '收益明细数据', 3));
        $this->assign('user_id', $user_id);
        
        return $this->fetch();
    }
    /**
     * 业务名称
     */
    public function getOpName($class_id,$type,$pay_type,$viewpointServiceTname){
        $str = '';
        if($type == 'withdraw'){
            return $str = '提现';
        }
        //课程信息
        if($pay_type == 1){
            $CourseModel = new Course();
            $CourseInfo = $CourseModel->where('id',$class_id)->field('class_name')->find();
            if(empty($CourseInfo)){
                return $str = '';
            }
            if($type == 'commission'){
                $str = '单次课程分销：'.$CourseInfo['class_name'];
            }
            if($type == 'class_income'){
                $str = '单次课程售出：'.$CourseInfo['class_name'];
            }
            if($type == 'order_pay'){
                $str = '购买单次课程：'.$CourseInfo['class_name'];
            }
        }
        if($pay_type == 2){
            $ViewpointModel = new Viewpoint();
            $ViewpointInfo = $ViewpointModel->field('title')->where('id',$class_id)->find();
            if(empty($ViewpointInfo)){
                $str = '';
            }else{
                $str = $ViewpointInfo['title'];
            }
            if($type == 'commission'){
                $str = '单次观点分销：'.$str;
            }
            if($type == 'class_income'){
                $str = '单次观点售出：'.$str;
            }
            if($type == 'order_pay'){
                $str = '购买单次观点：'.$str;
            }
        }
        if($pay_type == 7){
            if($type == 'commission'){
                $str = '观点包周分销：'.$viewpointServiceTname;
            }
            if($type == 'class_income'){
                $str = '观点包周售出：'.$viewpointServiceTname;
            }
            if($type == 'order_pay'){
                $str = '购买观点包周：'.$viewpointServiceTname;
            }
        }
        
        return $str;
    }
    //获取业务类别
    public function getOpType($type,$pay_type,$remark){
        $str = "";
        if($type == 'withdraw'){
            return $str = '提现';
        }
        if($pay_type == 1){
            if ($type == 'order_pay') {$str =  "下单使用";}
            else if($type == 'commission') {$str =  "课程分销";}
            else if($type == 'withdraw') {$str =  "资金提现";}
            else if($type == 'class_income') {$str =  "课程收益";}
            else {$str =  "其他";}
        }
        if($pay_type == 2){
            if ($type == 'order_pay') {$str =  "购买观点";}
            else if($type == 'commission') {$str =  "观点分销";}
            else if($type == 'withdraw') {$str =  "资金提现";}
            else if($type == 'class_income') {$str =  "观点售出";}
            else {$str =  "其他";}
        }
        if($pay_type == 3 || $pay_type == 6){
            $remark = json_decode($remark,true);
            if(isset($remark['giftType'])){
                if($remark['giftType'] == 3){
                    if ($type == 'order_pay') {$str =  "礼物支出";}
                    else if($type == 'commission') {$str =  "礼物分销";}
                    else if($type == 'withdraw') {$str =  "资金提现";}
                    else if($type == 'class_income') {$str =  "礼物收入";}
                    else {$str =  "其他";}
                }else{
                    if ($type == 'order_pay') {$str =  "礼物支出";}
                    else if($type == 'commission') {$str =  "礼物分销";}
                    else if($type == 'withdraw') {$str =  "资金提现";}
                    else if($type == 'class_income') {$str =  "礼物收入";}
                    else {$str =  "其他";}
                }
            }else{
                if ($type == 'order_pay') {$str =  "礼物支出";}
                else if($type == 'commission') {$str =  "礼物分销";}
                else if($type == 'withdraw') {$str =  "资金提现";}
                else if($type == 'class_income') {$str =  "礼物收入";}
                else {$str =  "其他";}
            }
            
        }
        if($pay_type == 7){
            if ($type == 'order_pay') {$str =  "下单使用";}
            else if($type == 'commission') {$str =  "观点包周分销";}
            else if($type == 'class_income') {$str =  "观点包周";}
            else {$str =  "其他";}
        }
        return $str;
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
			$this->success('编辑成功', 'admin/Ads/index');
		}else{
			$this->error('编辑失败');
		}
    }
    /**
     * 删除
     */
    public function del(){
        $m = new M();
		
		$rs = $m->del();
		if($rs==1){
			$this->success('删除成功', 'admin/Ads/index');
		}else{
			$this->error('删除失败');
		}
    }   
    /**
     * 修改用户备注
     * @return [type] [description]
     */
    public function edit_remark(){
        $m = new WM();
        $id = (int)input('id');
        $data = $m->where('id',$id)->find();
        if(request()->isPost()){
            $content = input('content');
            $id = input('id');
            $status = $m->where('id',$id)->update([
                'admin_description' => $content,
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
}
