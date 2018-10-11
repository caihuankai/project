<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2017/5/22
 * Time: 15:39
 */

namespace app\wechat\controller;


use think\Config;
use app\common\model\QrCode;

class WeChat extends App
{
    
    /**
     * @var \WeChat\app
     */
    protected $app;
    
    
    /**
     * 不登录
     *
     * @var array
     */
    protected $noLoginAction = [
        'server',
        'addMenu',
    ];
    
    
    public function index()
    {
        //获得参数 signature nonce token timestamp echostr
        $nonce = $_GET['nonce'];
        $token = 'weixin';
        $timestamp = $_GET['timestamp'];
        $echostr = $_GET['echostr'];
        $signature = $_GET['signature'];
        //形成数组，然后按字典序排序
        $array = array();
        $array = array($nonce, $timestamp, $token);
        sort($array);
        //拼接成字符串,sha1加密 ，然后与signature进行校验
        $str = sha1(implode($array));
        if ($str == $signature && $echostr) {
            //第一次接入weixin api接口的时候
            echo $echostr;
            exit;
        } else {
            $this->resultMsg();
        }
    }
    
    
    /**
     * 接入配置
     *
     * @return string
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function server()
    {
        $this->app = \WeChat\app::weChatInstance();
        $app = $this->app;
        $server = $app->server;
        $server->setMessageHandler(function ($message){
            return $this->messageHandler($message);
        });
    
        $response = $server->serve();
        
        if ($this->request->get('echostr')){ // 首次接入时，添加菜单
            $this->addMenu(false);
        }
        return $response->getContent();
    }
    
    
    protected function messageHandler($message)
    {
        $msg = null;
        switch ($message->MsgType){
            case 'event': // '收到事件消息'
                $msg = $this->eventMsg($message);
                break;
            case 'text': // 收到文字消息
                break;
            case 'image': // 收到图片消息
                break;
            case 'voice': // 收到语音消息
                break;
            case 'video': // 收到视频消息
                break;
            case 'location': // 收到坐标消息
                break;
            case 'link': // 收到链接消息
                break;
            // ... 其它消息
            default: // 收到其它消息
                break;
        }
        
        return $msg;
    }
    
    
    /**
     * 事件消息处理
     *
     * @param $message
     * @return null
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function eventMsg($message)
    {
        //\think\Log::write('event response => ' . $message, 'message');
        $msg = null;
        switch (strtolower($message->Event)) {
            case 'subscribe':
                $EventKey = $message->EventKey;
                if(!empty($EventKey)){ // 扫码关注
                    $this->handleEventUserData($message); // 检测创建用户
                    
                    $QrCodeModel = new QrCode();
                    $FromUserName = $message->FromUserName;
                    $EventKey = substr($EventKey,8);
                    $welcome = $QrCodeModel->welcomeNews($FromUserName);
                    // $QrCodeModel->welcome($FromUserName);
                    $msg = $QrCodeModel->HandleEvent($EventKey,$FromUserName,time());
                    
                }else{ // 关注
                    // 异步检测创建用户
                    \think\Hook::add('response_end', function () use($message){
                        $this->handleEventUserData($message);
                    });
                    
                    $QrCodeModel = new QrCode();
                    $FromUserName = $message->FromUserName;
                    $QrCodeModel->welcomeNews($FromUserName);
                    $msg = null;
                }
                break;

            case 'unsubscribe': // 取消关注
            	$FromUserName = $message->FromUserName;//openId
            	/** @var \app\wechat\model\ThirdLogin $loginModel */
            	$loginModel = model('ThirdLogin');
            	$loginModel->update([
                    'register_time'=>'',
                    'update_time'=>date('Y-m-d H:i:s')
                ], ['open_id'=>$FromUserName]);//清空关注时间
                break;
            case 'scan': // 扫码
                //获取微信返回二维码id
                $EventKey = $message->EventKey;
                $FromUserName = $message->FromUserName;
                $CreateTime = $message->CreateTime;
                $QrCodeModel = new QrCode();
                $msg = $QrCodeModel->HandleEvent($EventKey,$FromUserName,$CreateTime);
                break;
    
            case 'click': // 点击事件，根据EventKey判断
                $msg = $this->eventClickMsg($message);
                break;
            default: // 收到其他事件消息
                $msg = "欢迎来到大策略。";
                break;
        }
        
        return $msg;
    }
    
    
    /**
     * click事件消息
     *
     * @param $message
     * @return null
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function eventClickMsg($message)
    {
        $msg = null;
        
        switch ($message->EventKey){
            case \WeChat\EventKey::MENU_CONTACT_US:
                // 发送消息
                $msg = \PushMsgTemp::instance()->getMsg(\PushMsgTemp::MENU_CONTACT_US);
                break;

            case \WeChat\EventKey::MENU_SMALL_PROGRAM:
                // 发送消息
                $msg = \PushMsgTemp::instance()->getMsg(\PushMsgTemp::MENU_SMALL_PROGRAM);
                break;

            case \WeChat\EventKey::MENU_CUSTOMER_SERVICE:
                // 发送消息
                $msg = \PushMsgTemp::instance()->getMsg(\PushMsgTemp::MENU_CUSTOMER_SERVICE);
                (new QrCode())->pusImageC($message->FromUserName);
                break;

            case \WeChat\EventKey::MENU_MATERIAL:
                // 发送图片+消息
                (new QrCode())->pusImage($message->FromUserName);
                $msg = \PushMsgTemp::instance()->getMsg(\PushMsgTemp::MENU_MATERIAL);
                break;

            default:
                break;
        }
        
        return $msg;
    }
    
    
    
    /**
     * 添加菜单
     *
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function addMenu($dump = true)
    {
        $app = \WeChat\app::weChatInstance();
        $urlFunc = function ($url){
            return url($url, '', false, true);
        };
    
        $menu = $app->menu;
        $buttons = [
            [
                'type' => 'view',
                'name' => '首页入口',
                "url"  => \app\wechat\model\RedirectUrl::getIndexUrl(),
            ],
            [   
                'type' => 'view',
                'name' => '视频入口',
                'url'  => config('WX_DOMAIN').'/#/publicOnlive',
            ],
            [
                'name' => '官订阅号',
                'sub_button' => [
                    // [
                    //     'type' => 'view',
                    //     'name' => '平台介绍',
                    //     'url'  => 'http://a2.rabbitpre.com/m/Iv6eUBeEa',
                    // ],
                    // [
                    //     'type' => 'view',
                    //     'name' => '讲师阵容',
                    //     'url'  => 'http://a3.rabbitpre.com/m/rIfe22G',
                    // ],
                    // [
                    //     'type' => 'view',
                    //     'name' => '使用教程',
                    //     'url'  => (new \app\common\model\Config())->getConfig(\app\common\model\Config::HELPER_URL, $urlFunc('/#/')),
                    // ],
                    // [
                    //     'type' => 'click',
                    //     'name' => '联系我们',
                    //     'key'  => \WeChat\EventKey::MENU_CONTACT_US,
                    // ],
                    [
                        'type' => 'click',
                        'name' => '订阅号',
                        'key'  => \WeChat\EventKey::MENU_MATERIAL,
                    ],
                    [
                        'type' => 'click',
                        'name' => '微客服',
                        'key'  => \WeChat\EventKey::MENU_CUSTOMER_SERVICE,
                    ],
                    [
                        'type' => 'view',
                        'name' => '下载APP',
                        'url'  => 'http://a.app.qq.com/o/simple.jsp?pkgname=cn.hctt.strategy',
                    ],
                ],
            ],
        ];
        try{
            $menu->add($buttons, []);
            $dump && dump($menu->current());
        }catch (\Exception $exception){
            \think\log::error('添加菜单失败，登录公众号即可解决。' . $exception->getMessage());
            $dump && dump('报错了');
        }
    }
    
    
    public function resultMsg()
    {
        
    }
    
    /**
     * 关注时检测用户，未创建即创建
     * 只用于微信
     *
     * @param $message
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function handleEventUserData($message)
    {
        static $bool = false;
        
        if ($bool){
            return;
        }
        $bool = true;
        
        $userModel = $this->user;
        /** @var \app\wechat\model\ThirdLogin $loginModel */
        $loginModel = model('ThirdLogin');
        /** @var \Overtrue\Socialite\User $userData */
        $userData = $this->app->user->get($message->FromUserName); // 获取用户详情
        $loginData = $loginModel->checkExistByWeChatUnionId($userData['unionid'], 'user_id, open_id, alias, register_time');
        if (empty($loginData)) { // 用户未注册
            
            if (!empty($userData)) { // 这是一个对象
                $loginData['user_id'] = $userModel->insertInWeChat($userData->toArray(), 'open_id'); // 没有浏览器标识，必须指定字段
            }
        }else{ // 更新open_id字段，关注不访问，所以要独立更新
            $save = [];
            if (empty($loginData['open_id'])) {
                $save['open_id'] = $userData['openid'];
            }
            if (empty($loginData['register_time']) || $loginData['register_time'] === '0000-00-00 00:00:00') {
                $save['register_time'] = date('Y-m-d H:i:s', $userData['subscribe_time']);
            }
    
            if (empty($loginData['alias'])) {
                $save['alias'] = $userData['nickname'];
            }
            
            if (!empty($save)){
                $save += ['update_time' => date('Y-m-d H:i:s')];
                $loginModel->update($save, ['user_id' => $loginData['user_id']]);
            }
            
            // 每次关注都会更新当前的用户名和头像
            $userModel->update($userModel->handleWeChatUserData($userData), ['user_id' => $loginData['user_id']]);
            // 通知c++服务端
            \CPlusPlusProtocol::instance()->callFunc('proc_reloadUserInfo', $loginData['user_id']);
            $userModel->handleSessionUserDataKeyMap($loginData['user_id'], true);
        }
    }
    
    
}