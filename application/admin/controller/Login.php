<?php
namespace app\admin\controller;

use think\Request;
use think\Session;

class Login extends App
{
    protected function _init() 
    {
        $this->assign('msg', '');
        $this->assign('username', '');
    }
    
    public function _empty($name) 
    {
        echo 'cant found method: '.$name;
    }
    
    public function doLogin() 
    {
        $post = Request::instance()->post();
        
        if (!isset($post['submitted'])) {
            return $this->_errRet('非法提交');
        }
        if (empty($post['username']) || empty($post['password'])){
            return $this->_errRet('用户名或密码不能为空');
        }
        $username = trim($post['username']);
        $rs = $this->Admin->get(['username' => $username]);
        if (empty($rs)){
            return $this->_errRet('用户名不存在');
        }
        $rs = $rs->toArray();
        $now = time();
        if (date('Y-m-d', $rs['login_time']) != date('Y-m-d', $now)){
            $login_num = 0;
        } else {
            $login_num = $rs['login_num'];
        }
        
        if ($login_num >= 30){
            return $this->_errRet('今天错误登陆次数过多, 禁止登陆', $rs['id']);
        }
        
        if (!$this->Admin->checkPass($post['password'], $rs)){
            $this->Admin->save(['login_num'=>$login_num], ['id'=>$rs['id']]);
            return $this->_errRet('密码不正确', $rs['id']);
        }
        
        if ($rs['status']!=1){
            return $this->_errRet('限制登录', $rs['id']);
        }
        
        return $this->_createLogin($rs);
    }
    
    public function noLogin() 
    {
        Session::clear();
        \app\admin\service\Redis::del(\app\admin\service\Redis::keys('menu:dks:' . date("Y-m-d") . ':session_id:' . session_id()));
        return $this->fetch();
    }
    
    private function _createLogin($user_info) 
    {
        if (empty($user_info) || empty($user_info['id'])) {
            return $this->_errRet('参数不正确, 请联系管理员');
        }
        $this->Admin->login($user_info['id']);
        
        $group = $this->Group->get(['id' => $user_info['group_id']])->toArray();
        $menuId= trim($group['menu_id']) != '' ? explode(',', $group['menu_id']) : $group['menu_id'];
        $user_info = array_merge($user_info, 
                array('group_id'=>$group['id'],'group_name'=>$group['name'],'menu_id'=>$menuId)
        );
        Session::set('admin', $user_info);
        $session_id = session_id();
        //return $this->success('登录成功',	'Index/index');
        
        // 手动记录日志
        $this->LogManage->write('', 0, 1);
        
        return $this->redirect('/Index/index');
    }
    
    private function _errRet($msg, $logAdminId = 0)
    {
        $this->assign('msg', $msg);
        $this->assign('username', Request::instance()->post('username', '', 'trim'));
    
        // 手动记录日志
        $this->LogManage->write($msg, 1, 1, $logAdminId);
        
        return $this->fetch('/login/nologin');
    }
    
}
