<?php
namespace app\admin\controller;

use app\admin\model\Badword as M;
use think\Request;
use think\Session;
use think\Db;
use think\controller\Rest;

class Badword extends App{
//class Badword extends Rest{

    public function index(){
		$list = $this->pageQuery();
		$this->assign('list',$list);
		$this->assign('count',count($list));
    	return $this->fetch("list");
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
			$this->success('新增成功', 'admin/Badword/index');
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
			$this->success('编辑成功', 'admin/Badword/index');
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
			$this->success('删除成功', 'admin/Badword/index');
		}else{
			$this->error('删除失败');
		}
    }
	
	/**
     * 停用
     */
    public function adStop(){
        $m = new M();
		$rs = $m->adStop();
		if($rs==1){
			$this->success('停用成功', 'admin/Badword/index');
		}else{
			$this->error('停用失败');
		}
    }
	
	/**
     * 起用
     */
    public function adStart(){
        $m = new M();
		$rs = $m->adStart();
		if($rs==1){
			$this->success('启用成功', 'admin/Badword/index');
		}else{
			$this->error('启用失败');
		}
    }
	
    /**
    * 修改排序
    */
    public function changeSort(){
        $m = new M();
        return $m->changeSort();
    }
    
}
