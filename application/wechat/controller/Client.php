<?php
namespace app\wechat\controller;

use app\common\controller\ControllerBase;

class Client extends ControllerBase{
	public function index()
    {
        return $this->fetch('/client');
    }
    public function welcome(){
    	$domain = config('WX_DOMAIN');
    	$this->assign('domain',$domain);
    	return $this->fetch('/index/welcome');
    }
}