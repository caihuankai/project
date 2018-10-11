<?php
namespace app\admin\controller;

use app\admin\model\ExtensionQrcode;

class ExQrcode extends App{
	public function index(){
		$ExtensionQrcode = new ExtensionQrcode();
		if(request()->isPost()){
			$page = !isset($param['pageNumber']) ? 1 : $param['pageNumber'];
            $size = !isset($param['pageSize']) ? 10 : $param['pageSize'];
			$data = $ExtensionQrcode->getList($page,$size);
			if(!empty($data['list'])){
				foreach ($data['list'] as $k => $v) {
					$v['qrcodeUrl'] = '<img src="'.$v['qrcodeUrl'].'" style="width: 60px;">';
					$v['operate'] = '<a href="javascript:honor_edit('.$v['id'].');">编辑</a>';
                    $v['operate'] .= ' | <a href="javascript:honor_del('.$v['id'].');">删除</a>';
                    switch ($v['type']) {
                    	case 1:
                    		$v['type_name'] = 360;
                    		break;
                		case 2:
                    		$v['type_name'] = '搜狗';
                    		break;
                		case 3:
                    		$v['type_name'] = '百度';
                    		break;
                    	
                    	default:
                    		$v['type_name'] = '';
                    		break;
                    }
				}
			}
			$list = ['rows' => $data['list'], 'total' => $data['count']];
            return $this->sucJson($list);
		}
		return $this->fetch();
	}
	public function addEx(){
		if(request()->isPost()){
			$param = input('post.');
			if(empty($param['wechatId'])){
				return $this->error('请填写微信账号');
			}
			if(empty($param['qrcodeUrl'])){
				return $this->error('请上传二维码');
			}
			$ExtensionQrcode = new ExtensionQrcode();
			$where['type'] = $param['type'];
			$where['dataFlag'] = 1;
			//每种类型只能存在一条数据
			$findData = $ExtensionQrcode->where($where)->find();
			if(!empty($findData)){
				return $this->error('每种类型只能存在一条数据');
			}
			$insertData['wechatId'] = $param['wechatId'];
			$insertData['qrcodeUrl'] = $param['qrcodeUrl'];
			$insertData['type'] = $param['type'];
			$state = $ExtensionQrcode->insert($insertData);
			if($state){
				$rtd['status'] = 1;
                $rtd['msg'] = "新增成功";
                return $rtd;
			}else{
				$rtd['status'] = -1;
                $rtd['msg'] = "新增失败";
                return $rtd;
			}
		}
		return $this->fetch();
	}
	public function editEx(){
		$ExtensionQrcode = new ExtensionQrcode();
		$id = (int)input('id');
		$data = $ExtensionQrcode->where('id',$id)->find();
		if(request()->isPost()){
			$param = input('post.');
			if(empty($param['wechatId'])){
				return $this->error('请填写微信账号');
			}
			if(empty($param['qrcodeUrl'])){
				return $this->error('请上传二维码');
			}
			$ExtensionQrcode = new ExtensionQrcode();
			$where['type'] = $param['type'];
			$where['dataFlag'] = 1;
			$where['id'] = ['<>',$id];
			//每种类型只能存在一条数据
			$findData = $ExtensionQrcode->where($where)->find();
			if(!empty($findData)){
				return $this->error('每种类型只能存在一条数据');
			}
			$updateData['wechatId'] = $param['wechatId'];
			$updateData['qrcodeUrl'] = $param['qrcodeUrl'];
			$updateData['update_time'] = date('Y-m-d H:i:s');
			$state = $ExtensionQrcode->where('id',$id)->update($updateData);
			if($state){
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
	public function delEx(){
		$id = (int)input('id');
        $ExtensionQrcode = new ExtensionQrcode();
        $status = $ExtensionQrcode->where('id',$id)->update([
            'dataFlag' => 0,
            'update_time' => date('Y-m-d H:i:s'),
        ]);
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