<?php

namespace app\wechat\controller;


class Test extends App
{
    protected $noLoginAction = [
        'testQuit',
    ];
    
    
    protected $loginNoAjaxAction = [
        'test',
        'post',
    ];
    
    
    protected function _initialize()
    {
        if (!$this->ifTest()){
            $this->abortError('非test环境', 'error');
        }
        
        parent::_initialize();
    }
    
    
    /*******
     *
     * 调试代码
     *
     * 退出登录 http://test.talk.99cj.com.cn/User/testQuit
     * php控制网页跳转 http://test.talk.99cj.com.cn/User/test
     * 个人中心ajax接口 http://test.talk.99cj.com.cn/User/
     *
     *******/
    
    protected function ifTest()
    {
        return false !== strpos($this->request->host(), 'test') ||
            false !== strpos($this->request->host(), 'dev') ||
            in_array($this->request->ip(), config('test_controller_pass_ip'));
    }
    
    
    /**
     * 数据页|登录页
     * 
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function test()
    {
        if (!$this->ifTest()){
            return;
        }
        
        $app = $this->getWeChatClass();
//        \think\Session::delete('weChat_user');exit;
        
        $oauth = $app->oauth;
        
        
        $user = $app->getOauthData();
        
        dump($user);
        dump($app->user->get($user->getId()));
        dump(\think\Session::get());
    }
    

    
    
    /**
     * 模拟post的ajax提交页面
     * 
     * @return mixed
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function post()
    {
        return $this->fetch();
    }
    
    
    /**
     * 退出
     * 
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function testQuit()
    {
        if (!$this->ifTest()){
            return;
        }
        
        \think\Session::clear();
    }
    
    
    /**
     * 重新创建微信账号
     *
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function recreateToWeChat()
    {
        $userId = $this->getUserId();
        $tlModel = new \app\wechat\model\ThirdLogin();
        // 目前只修改union_id，open_id，pc_open_id，open_id用于连表会出现查找到非当前账号和多条记录
        $tlModel->update(['union_id' => '1', 'open_id' => 1, 'pc_open_id' => 1, 'login_tel' => ''], ['user_id' => $userId, 'type' => 3]);
        $this->testQuit();
        
        echo '已重新创建微信账号';
    }
    
    
    
    
    public function uploadFile()
    {
        $app = \WeChat\app::instance();
        
        $jsConfig = $app['config']['jssdk'];
        $this->assign('weChatConfig', $app->js->config($jsConfig['apps'], $jsConfig['debug'], $jsConfig['beta'], $jsConfig['json']));
        
        return $this->fetch();
    }
    
    
}