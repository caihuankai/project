<?php
namespace app\admin\controller;

use app\admin\model\AdmireSetup as AdmireSetupM;
use think\Request;
use think\controller\Rest;

class AdmireSetup extends App{
	//赞赏管理
	public function index(){
		$AdmireSetupModel = new AdmireSetupM();
		$AdmireSetupList = $AdmireSetupModel->select();
		if(empty($AdmireSetupList)){
			$AdmireSetupModel->saveAll($this->initialValue());
			$AdmireSetupList = $AdmireSetupModel->select();
		}
		if(request()->isPost()){
			$data = input('param.');
			foreach ($data as $k => $v) {
				$k = (int)mb_substr($k,0,mb_strlen($k)-1);
				$stauts = $AdmireSetupModel->where('id',$k)->update([
					'open_status'=>$v
				]);
			}
			$rtd['status'] = 1;
			$rtd['msg'] = "保存成功";
        	return $rtd;
		}
		$this->assign('data',$AdmireSetupList);
		return $this->fetch();
	}
	//赞赏设置列表
	public function admire_list(){
		$AdmireSetupModel = new AdmireSetupM();
		if(request()->isPost()){
			$param = input("param.");
			$start = !isset($param['pageNumber']) ? 0 : $param['pageNumber'];
            $size = !isset($param['pageSize']) ? 0 : $param['pageSize'];
            $list = $AdmireSetupModel->dataList($start,$size,$param['admire_type'],$param['open_status']);
            if(empty($list)){
            	return null;
            }
            foreach ($list as $k => $v) {
            	if($v['open_status'] == 1){
            		$v['open_status'] = '开启';
            	}else{
            		$v['open_status'] = '关闭';
            	}
            	$v['operate'] = '<a href="javascript:admire_edit('.$v['id'].');">编辑</a>';
            	$v['operate'] .= ' | <a href="javascript:admire_del('.$v['id'].');">删除</a>';
            }

            $data = ['rows' => $list, 'total' => count($list)];
            return $this->sucJson($data);
		}
		return $this->fetch();
	}
	//重置
	public function reset(){
		$AdmireSetupModel = new AdmireSetupM();
		$AdmireSetupModel->where('id>0')->delete();
		$AdmireSetupModel->saveAll($this->initialValue());

		$rtd['status'] = 1;
		$rtd['msg'] = "重置成功";
    	return $rtd;
	}
	//设置初始状态
	public function initialValue(){
		$data[0]['admire_name'] = 'LIve直播赞赏';
		$data[0]['admire_type'] = 1;
		$data[0]['open_status'] = 1;
		$data[0]['admire_amount'] = '8，18，58，88，188';

		$data[1]['admire_name'] = '课程赞赏';
		$data[1]['admire_type'] = 2;
		$data[1]['open_status'] = 2;
		$data[1]['admire_amount'] = '5，10，25，100';

		$data[2]['admire_name'] = '观点赞赏';
		$data[2]['admire_type'] = 3;
		$data[2]['open_status'] = 2;
		$data[2]['admire_amount'] = '3，5，8，10，25';
		return $data;
	}
	//删除单条设置
	public function admire_del($id){
		$id = (int)$id;
		$AdmireSetupModel = new AdmireSetupM();
		$status = $AdmireSetupModel->where('id',$id)->delete();
		if($status){
			return 1;
		}
	}
	//编辑
	public function admire_edit(){
		$AdmireSetupModel = new AdmireSetupM();
		$id = (int)input('id');
		$data = $AdmireSetupModel->where('id',$id)->find();
		if(request()->isPost()){
			$admire_name = input('admire_name');
			$admire_amount = input('admire_amount');
			if(empty($admire_name)){
				return $this->error('分类名称不能为空');
			}
			if(empty($admire_amount)){
				return $this->error('分类金额不能为空');	
			}
			$admire_amount = str_replace(',','，',$admire_amount);
			$status = $AdmireSetupModel->where('id',$id)->update([
				'admire_name' => $admire_name,
				'admire_amount' => $admire_amount,
				'create_time' => date('Y-m-d H:i:s')
			]);
			if($status){
				$rtd['status'] = 1;
				$rtd['msg'] = "修改成功";
	        	return $rtd;
			}else{
				$rtd['status'] = -1;
				$rtd['msg'] = "修改失败";
	        	return $rtd;
			}
		}
		$this->assign('data',$data);
		return $this->fetch();
	}

	//批量删除数据
	public function del_array(){
		$ids = input('param.id');
		$AdmireSetupModel = new AdmireSetupM();
		$status = $AdmireSetupModel->where('id','in',$ids)->delete();
		if($status){
			$rtd['status'] = 1;
			$rtd['msg'] = "删除成功";
        	return $rtd;
		}else{
			$rtd['status'] = -1;
			$rtd['msg'] = "删除失败";
        	return $rtd;
		}
	}
}