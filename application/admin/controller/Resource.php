<?php
namespace app\admin\controller;

use app\admin\model\Resource as M;
use app\admin\model\ResourceClassification as N;
use think\Request;
use think\Session;
use think\Db;

class Resource extends App{

    public function index(){
		$list = $this->pageQuery();
		$this->assign('list',$list);
		$this->assign('count',count($list));
		
		$resourceClassification = Db::name('resource_classification')->where('dataFlag',1)->select();
		$this->assign('resourceClassification',$resourceClassification);
		
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
		$n = new N();
		$datan = $n->getResourceClassification();
        return $this->fetch("edit",['data'=>$data,'datan'=>$datan]);
    }
	/**
     * 跳去新增页面
     */
    public function toAdd(){
		$n = new N();
		$assign = ['data'=>$n->getResourceClassification()];
        return $this->fetch("add",$assign);
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
			$this->success('新增成功', 'admin/Resource/index');
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
			$this->success('编辑成功', 'admin/Resource/index');
		}else{
			$this->error('编辑失败');
		}
    }
    /**
     * 删除
     */
    public function del($ids){
        $this->validateByName('common.ids');
        $m = new M();
		$rs = $m->del((array)$ids);
		if($rs==1){
			$this->success('删除成功', 'admin/Resource/index');
		}else{
			$this->error('删除失败');
		}
    }    
}
