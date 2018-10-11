<?php
namespace app\admin\controller;

use app\admin\model\Honors as HonorsM;

class Honors extends App{
	public function index(){
		$HonorsM = new HonorsM();
		if(request()->isPost()){
			$page = !isset($param['pageNumber']) ? 1 : $param['pageNumber'];
            $size = !isset($param['pageSize']) ? 10 : $param['pageSize'];
			$data = $HonorsM->getList($page,$size);
			if(!empty($data['list'])){
				foreach ($data['list'] as $k => $v) {
					$v['img'] = '<img src="'.$v['img'].'" style="width: 60px;">';
					$v['operate'] = '<a href="javascript:honor_edit('.$v['id'].');">编辑</a>';
                    $v['operate'] .= ' | <a href="javascript:honor_del('.$v['id'].');">删除</a>';
				}
			}
			$list = ['rows' => $data['list'], 'total' => $data['count']];
            return $this->sucJson($list);
		}
		return $this->fetch();
	}
	public function addHonors(){
		if(request()->isPost()){
			$param = input('post.');
			if(empty($param['name'])){
				return $this->error('请填写标题');
			}
			if(empty($param['imgurl'])){
				return $this->error('请上传图片');
			}
			$HonorsM = new HonorsM();
			$insertData['name'] = $param['name'];
			$insertData['img'] = $param['imgurl'];
			$state = $HonorsM->insert($insertData);
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
	public function editHonors(){
		$HonorsM = new HonorsM();
		$id = (int)input('id');
		$data = $HonorsM->where('id',$id)->find();
		if(request()->isPost()){
			$param = input('post.');
			if(empty($param['name'])){
				return $this->error('请填写标题');
			}
			if(empty($param['imgurl'])){
				return $this->error('请上传图片');
			}
			$HonorsM = new HonorsM();
			$updateData['name'] = $param['name'];
			$updateData['img'] = $param['imgurl'];
			$updateData['update_time'] = date('Y-m-d H:i:s');
			$state = $HonorsM->where('id',$id)->update($updateData);
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
	public function delHonors(){
		$id = (int)input('id');
        $HonorsM = new HonorsM();
        $status = $HonorsM->where('id',$id)->update([
            'status' => 0,
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