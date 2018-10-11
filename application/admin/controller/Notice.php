<?php
namespace app\admin\controller;

use app\admin\model\Notice as NoticeM;
use app\wechat\controller\AdmireRpc;

class Notice extends App{
	//公告列表
	public function index(){
		$NoticeModel = new NoticeM();
		if(request()->isPost()){
			$data = input('param.');
			$page = !isset($param['pageNumber']) ? 0 : $param['pageNumber'];
            $size = !isset($param['pageSize']) ? 0 : $param['pageSize'];
            $content = $data['content'];
            $list = $NoticeModel->dataList($page,$size,$content);
            foreach ($list as $k => $v) {
            	if($v['endtime'] >= date("Y-m-d H:i:s")){
            		$v['status'] = '生效';
            	}else{
            		$v['status'] = '已失效';
            	}
            	$v['operate'] = '<a href="javascript:notice_edit('.$v['id'].');">编辑</a>';
            	$v['operate'] .= ' | <a href="javascript:notice_del('.$v['id'].');">删除</a>';
            }
            $data = ['rows' => $list, 'total' => $NoticeModel->count($content)];
            return $this->sucJson($data);
		}
		return $this->fetch();
	}
	//删除数据
	public function notice_del($id){
		$id = (int)$id;
		$NoticeModel = new NoticeM();
		$status = $NoticeModel->where('id',$id)->update([
			'status' => 0,
		]);
		if($status){
			return 1;
		}
	}
	//编辑
	public function notice_edit(){
		$NoticeModel = new NoticeM();
		$id = (int)input('id');
		$data = $NoticeModel->where('id',$id)->find();
		if(request()->isPost()){
			$title = input('title');
			$content = input('content');
			$endtime = input('endtime');
			if(empty($title)){
				return $this->error('公告标题不能为空');
			}
			if(empty($content)){
				return $this->error('公告内容不能为空');
			}
			if(empty($endtime)){
				return $this->error('失效时间不能为空');	
			}
			if($endtime < date("Y-m-d H:i:s")){
				return $this->error('失效时间不能小于当前时间');
			}
			$status = $NoticeModel->where('id',$id)->update([
				'title' => $title,
				'content' => $content,
				'endtime' => $endtime,
				'update_time' => date("Y-m-d H:i:s"),
			]);
			if($status){
				$AdmireRpcC = new AdmireRpc();
				$AdmireRpcC->notice($content);
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
	//新增公告
	public function add(){
		if(request()->isPost()){
			$data['title'] = input('title');
			$data['content'] = input('content');
			$data['endtime'] = input('endtime');
			if(empty($data['title'])){
				return $this->error('公告标题不能为空');
			}
			if(empty($data['content'])){
				return $this->error('公告内容不能为空');
			}
			if(empty($data['endtime'])){
				return $this->error('失效时间不能为空');	
			}
			if($data['endtime'] < date("Y-m-d H:i:s")){
				return $this->error('失效时间不能小于当前时间');
			}
			$NoticeModel = new NoticeM();
			$status = $NoticeModel->insertGetId($data);
			if($status > 0){
				$AdmireRpcC = new AdmireRpc();
				$AdmireRpcC->notice($data['content']);
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
	//批量删除数据
	public function del_array(){
		$ids = input('param.id');
		$NoticeModel = new NoticeM();
		$status = $NoticeModel->where('id','in',$ids)->update([
			'status' => 0,
			'update_time' => date("Y-m-d H:i:s"),
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