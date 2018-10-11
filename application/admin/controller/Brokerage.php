<?php
namespace app\admin\controller;

use app\common\model\Brokerage as BrokerageM;

class Brokerage extends App{
	public function index(){
		$BrokerageModel = new BrokerageM();
		$data = $BrokerageModel->find();
		if(empty($data)){
			$data['id'] = 0;
			$data['platform_brokerage'] = 10;
			$data['divide_brokerage'] = 30;
		}
		if (request()->isPost()) {
            $param = input("param.");
            if(empty($param)){
            	return $this->error('请输入正确数值');
            }
            $param['platform_brokerage'] = (int)$param['platform_brokerage'];
            $param['divide_brokerage'] = (int)$param['divide_brokerage'];

            if(empty($param['platform_brokerage']) || empty($param['divide_brokerage']) || $param['platform_brokerage'] < 0 || $param['platform_brokerage'] > 100 || $param['divide_brokerage'] < 0 || $param['divide_brokerage']>100 || $param['platform_brokerage']+$param['divide_brokerage'] > 100 || $param['platform_brokerage']+$param['divide_brokerage'] < 0){
            	return $this->error('请输入正确数值');
            }
            $status = $BrokerageModel->upInfo($param);
            return $this->sucJson(['code' => $status['code'], 'data' => $status['data'], 'msg' => $status['msg']]);
        }
        $this->assign('data',$data);
        return $this->fetch();
	}
    public function reset(){
        $BrokerageModel = new BrokerageM();
        $data = $BrokerageModel->find();
        if(empty($data)){
            $data['platform_brokerage'] = 10;
            $data['divide_brokerage'] = 30;
            $BrokerageModel->insert($data);
        }else{
            $BrokerageModel->where("id",$data['id'])->update([
                'platform_brokerage'=>10, 
                'divide_brokerage'=>30,
                'update_time'=>date('Y-m-d H:i:s') 
            ]);
        }
    }
}