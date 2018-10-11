<?php

namespace app\admin\controller;



class Bug extends App
{
    
    protected $key = 'lkjdflkanwroiejglknvfd';
    
    protected function _initialize()
    {
        if ($this->request->param('key') !== $this->key) { // 需要登录并指定秘钥才能执行
            $this->redirect('/');
        }
        
        parent::_initialize();
    }
    
    
    public function liveTelUpdateUser()
    {
        
    }
    
}