<?php
namespace app\admin\controller;

use app\admin\model\PdCash as M;
use think\Request;
use think\Session;
use think\Db;
use think\controller\Rest;

class PdCash extends App{
//class PdCash extends Rest{

    public function index(){
		$list = $this->pageQuery();
        $i_count = count($list);
        // for ($i=0; $i < $i_count; $i++) {
        //     $list[$i]['alias'] = "<a href=/ForegroundUser/details/userId/{$list[$i]['user_id']}>{$list[$i]['alias']}</a>";
        // }
		$this->assign('list',$list);
		$this->assign('count',count($list));
		$PdcPaymentState = session('pdc_payment_state');
		$this->assign('pdc_payment_state',$PdcPaymentState);
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
            $list = $model->new_pageQuery($start,$size,$param['order_number'],$param['username'],$param['data_type'],$param['logmin'],$param['logmax']);
            $i_count = count($list);
            for ($i=0; $i < $i_count; $i++) {
                $list[$i]['alias'] = "<a href=/ForegroundUser/details/userId/{$list[$i]['user_id']}>{$list[$i]['alias']}</a>";
                //提现状态
                if($list[$i]['pdc_payment_state'] == 0){
                    $list[$i]['cash_status'] = '<span class="label label-success radius">待审批</span>';
                    $list[$i]['operate'] = '<a href="javascript:req_pass('.$list[$i]['pdc_id'].');">通过</a>';
                    $list[$i]['operate'] .= ' | <a href="javascript:req_refuse('.$list[$i]['pdc_id'].');">驳回</a>';
                }
                else if($list[$i]['pdc_payment_state'] == 1){
                   $list[$i]['cash_status'] = '<span class="label label-success radius">已通过</span>';
                    $list[$i]['operate'] = '通过';
                    $list[$i]['operate'] .= ' | 驳回';
                }
                else if($list[$i]['pdc_payment_state'] == 2){
                    $list[$i]['cash_status'] = '<span class="label label-success radius">已驳回</span>';
                    $list[$i]['operate'] = '通过';
                    $list[$i]['operate'] .= ' | 驳回';
                }
            }
            $count = $model->count($param['order_number'],$param['username'],$param['data_type'],$param['logmin'],$param['logmax']);
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
     * test
     */
    public function test(){
        $m = new M();
        $return = $m->changePaymentState();
		return json_encode($return);
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
        return $m->del();
    }
    /**
    * 修改提现状态
    */
    public function changePaymentState(){		
        $m = new M();
        return $m->changePaymentState();
    }
    /**
     * 驳回申请
     */
    public function req_refuse(){
        $m = new M();
        $id = (int)input('id');
        if(request()->isPost()){
            $remark = input('remark');
            if(empty($remark)){
                return $this->error('驳回理由不能为空');
            }
            return $m->req_refuse($id,$remark);
            // return $this->sucJson(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
        $this->assign('id',   $id);
        return $this->fetch();
    }
    /**
     * 批量审核
     */
    public function batch_examine(){
        $id = input('param.id');
        $idArray = explode(',',$id);
        foreach ($idArray as $k) {
            $model = new M();
            $model->batch_examine_no($k);
        }
        $rtd['status'] = 1;
        $rtd['msg'] = "操作成功";
        return $rtd;
    }
}
