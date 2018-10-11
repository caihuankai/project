<?php
namespace app\admin\controller;

use app\admin\model\PayOrder as M;
use app\admin\model\User as UserM;
use app\admin\model\Course;

class H5PayOrder extends App{
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

            $list = $model->h5_new_pageQuery($start,$size,$param['order_number'],$param['classname'],$param['logmin'],$param['logmax'],$param['userType'],$param['teachername'],$param['username'],$param['amount'],$param['paytype'],$param['coursetype']);
            $count = $model->h5_new_count($param['order_number'],$param['classname'],$param['logmin'],$param['logmax'],$param['userType'],$param['teachername'],$param['username'],$param['amount'],$param['paytype'],$param['coursetype']);
            foreach ($list as $k => $v) {
                if($list[$k]['seriesType'] == 1){
                    $list[$k]['coursetype_name'] = '月度课';
                }elseif ($list[$k]['seriesType'] == 2) {
                    $list[$k]['coursetype_name'] = '季度课';
                }else{
                    $list[$k]['coursetype_name'] = '';
                }
                if($list[$k]['pay_type'] == 1){
                    $list[$k]['pay_type_name'] = '支付宝支付';
                }elseif($list[$k]['pay_type'] == 2){
                    $list[$k]['pay_type_name'] = '微信支付';
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
     * 人工充值、购买列表
     * @return [type] [description]
     */
    public function artificialPay(){
        if(request()->isPost()){
            $model = new M();
            $param = input("param.");
            $list = $model->h5ArtificialPayList($param);
            foreach ($list as $k => $v) {
                $remark = json_decode($v['remark'],true);
                $v['remark'] = isset($remark['content']) ? $remark['content'] : "";
                $v['adminName'] = isset($remark['adminName']) ? $remark['adminName'] : "";
                $v['classTypeName'] = '月度课';
                if($v['seriesType'] == 2){
                    $v['classTypeName'] = '季度课';
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
                'total' => $model->h5ArtificialPayCount($param),
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
            if(empty(input('overdue_time'))){
                return $this->error('请填写购买时间');
            }
            if(empty(input('amount'))){
                return $this->error('请填写金额');
            }
            if(empty(input('pay_type'))){
                return $this->error('请填写支付方式');
            }
            $model = new M();
            $data['user_id'] = input('user_id');
            $data['order_no'] = getTradeNo();
            $data['third_order_no'] = input('third_order_no');
            $data['pay_type'] = input('pay_type');
            $data['client_type'] = 3;
            $data['amount'] = input('amount');
            $data['total_fee'] = input('amount');
            $data['create_time'] = input('create_time');
            $data['overdue_time'] = input('overdue_time');
            $data['pay_time'] = input('create_time');
            $data['state'] = 3;
            $data['client_ip'] = request()->ip(0, true);
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
            if($courseInfo['seriesType'] == 1){
            	$data['type'] = 10;
            }elseif($courseInfo['seriesType'] == 2){
            	$data['type'] = 11;
            }
            //判断用户是否已购买该课程
            $where['user_id'] = $data['user_id'];
            $where['type'] = ['in',[10,11]];
            $where['class_id'] = $data['class_id'];
            $where['state'] = ['in',[1,3]];
            $where['overdue_time'] = ['>',date('Y-m-d H:i:s')];
            $payorderInfo = $model
            ->order('id','desc')
            ->where($where)
            ->find();
            if(!empty($payorderInfo)){
                return $this->error('重复购买，用户已购买该课程');
            }
            $state = $model->insertGetId($data);
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
}