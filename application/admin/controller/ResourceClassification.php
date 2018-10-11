<?php
namespace app\admin\controller;

use app\admin\model\ResourceClassification as M;
use think\Request;
use think\Session;
use think\Db;

class ResourceClassification extends App{

    public function index(){
		$list = $this->pageQuery();
		$this->assign('count',count($list));
		$this->assign('list',$list);
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
        $assign = ['data'=>$m->getById(Input("get.id/d",0))];
        return $this->fetch("edit",$assign);
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
			$this->success('新增成功', 'admin/ResourceClassification/index');
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
			$this->success('修改成功', 'admin/ResourceClassification/index');
		}else{
			$this->error('修改失败');
		}
    }
    /**
     * 删除
     */
    public function del($ids){
        $m = new M();
        $this->validateByName('common.ids');
        $rs = $m->del((array)$ids);
		if($rs){
			$this->success('删除成功', 'admin/ResourceClassification/index');
		}else{
			$this->error('删除失败');
		}
    }   
}
