<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/7/25
 * Time: 15:19
 */

namespace app\admin\controller;

use app\admin\model\PayOrder;
use think\Exception;

class ArtificialPayCoin extends App
{
    use \app\admin\traits\Common,
        \app\admin\traits\AdminTable,
        \app\admin\traits\Status,
        \app\admin\traits\ImgReset;
    /**
     * 主页
     * @return mixed
     */
    public function index()
    {
//        表头
        $this->setTableHeader([
            ['field' =>'id', 'title' => 'ID',],
            ['field' =>'third_order_no', 'title' => '订单流水号',],
            ['field' =>'user_id', 'title' => '用户ID',],
            ['field' =>'alias', 'title' => '用户昵称',],
            ['field' =>'create_time', 'title' => '购买时间',],
            ['field' =>'amount', 'title' => '礼点数',],
            ['field' =>'total_fee', 'title' => '实际支付金额',],
            ['field' =>'remark', 'title' => '备注',],
            ['field' =>'action_name', 'title' => '操作人',],
//            搜索
        ])->setSearch([
            [['options' => ['placeholder' => '订单流水号']], 'like', 'p.third_order_no'],
            [['options' => ['placeholder' => '用户ID']], 'like', 'p.user_id'],
            [['options' => ['placeholder' => '用户昵称']], 'like', 'u.alias'],
            ['', 'dateMin-date', 'create_time'],
            ['', 'dateMax-date', 'create_time '],
        ])->setToolbarId('table-button-html')->setTableSearchId('table-search-html');

        $model = new PayOrder();

        return $this->traitAdminTableList(function () use ($model){
            $field = "p.id,p.third_order_no,p.user_id,u.alias,p.create_time,p.amount,p.remark,p.total_fee";
            $data = $this->traitAdminTableQuery([], function ()use ($model){
                $model->where(['state '=>3,'type'=>4])->alias('p')
                    ->join('talk_user u','p.user_id = u.user_id');
                return $model;
            }, $field, 'create_time DESC');
//            结果集展示
            $result = [];
            if (!empty($data['rows'])) {
                foreach ($data['rows'] as $datum) {
                    $remark = json_decode($datum['remark'],true);
                    $result[] = [
                        'id'=>$datum['id'],
                        'third_order_no'=>$datum['third_order_no'],
                        'user_id'=>$datum['user_id'],
                        'alias'=>$datum['alias'],
                        'create_time'=>$datum['create_time'],
                        'amount'=>$datum['amount'],
                        'total_fee'=>$datum['total_fee'],
                        'remark'=>isset($remark['content'])?$remark['content']:'',
                        'action_name'=>isset($remark['adminName'])?$remark['adminName']:'',
                    ];
                }
            }
            return $this->sucJson([
                'rows' => $result,
                'total' => $data['total'],
            ]);
        }, function () use ($model){

        });
    }//end

    public function payCoin()
    {
        if (request()->isPost()){
            $userModel = new \app\admin\model\User();
            $check = $userModel->where('user_id',input('user_id',null))->find();
            if(empty(input('third_order_no'))){
                return $this->errSysJson('请填写订单流水号');
            }
            if(empty(input('user_id'))){
                return $this->errSysJson('请填写购买用户ID');
            }
            if(empty(input('amount'))){
                return $this->errSysJson('请填写金额');
            }
            if(!is_numeric(input('amount'))){
                return $this->errSysJson('礼点数为数字');
            }
            if(count($check)< 1){
                return $this->errSysJson('该用户不存在');
            }
            $flg = false;
            $data['user_id'] = input('user_id');
            $data['order_no'] = getTradeNo();
            $data['third_order_no'] = input('third_order_no');
            $data['amount'] = input('amount');
            $data['total_fee'] = input('amount');
            $data['create_time'] = date('Y-m-d H:i:s',time());
            $data['pay_time'] = date('Y-m-d H:i:s',time());
            $data['state'] = 3;
            $data['client_ip'] = request()->ip(0, true);
            $data['type'] = 4;
            $remark['adminID'] = $_SESSION['adminSess']['admin']['id'];
            $remark['adminName'] = $_SESSION['adminSess']['admin']['username'];
            if(!empty(input('content'))){
                $remark['content'] = input('content');
            }
            $data['remark'] = json_encode($remark);
            $payModel = new PayOrder();
            // 启动事务
            $payModel->db()->startTrans();
            try{
                $result = $payModel->save($data);
                // 提交事务
                $payModel->db()->commit();
                if ($result){
                    $userModel->where('user_id', $data['user_id'])->setInc('account_balance', $data['amount']);
                    $flg = true;
                }
                $payModel->db()->commit();
                return $flg == true ?  $this->sucSysJson(['code'=>200],'充值成功'):$this->errSysJson('充值失败');

            } catch (\Exception $e) {
                // 回滚事务
                $payModel->db()->rollback();
            }
        }
        return $this->fetch();
    }
}