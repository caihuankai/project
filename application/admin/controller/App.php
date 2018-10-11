<?php
namespace app\admin\controller;

use app\common\controller\ControllerBase;
use app\common\controller\JsonResult;
use think\Lang;
use think\Session;
use think\Request;

/**
 *
 * @property \app\admin\model\LogManage LogManage
 * @author scan<232832288@qq.com>
 *
 */
class App extends ControllerBase
{
    static $UNLIMIT = array(
        'login/nologin' => '未登录',
        'login/dologin' => '登录中',
        'login/checkpicone' => '校验码',
    );
    static $UNRANK = array(
        'login/nologin' => '未登录',
        'login/dologin' => '登录中',
        'index/index' => '主页'
    );
    
    protected $beforeActionList	= [
        '__before',
        '_init'
    ];
    
    const PASSWORD_KEY = '%$FD2gfv52';
    
    /**
     * 第三个tab名字
     *
     * @see application/admin/view/include/nav.php:5
     * @var string
     */
    protected $tabNameThirdly = '';
    
    /**
     * 在header.php最后加载文件
     *
     * @var string
     */
    private $headerBody = 'include/empty'; // 必须存在模板
    
    
    private $headerBodyHtml = null;
    
    
    protected function __before() 
    {
        $this->loadControllerLang(); // 加载控制器的语言包
        $this->_acl();
    }
    
    protected function _init() 
    {
    }
    
    protected function _acl() {
        if (!$this->_checkLogin()) {
            return $this->_noLogin();
        }
//        $this->_siderbar();
        if (!$this->_checkRank()) {
            $this->_noRank();
        }
    }
    
    protected function _checkLogin() 
    {
        if (in_array(strtolower($this->getControllerName() . '/' . Request::instance()->action()), array_flip(self::$UNLIMIT))) {
            return TRUE;
        }
        if (!Session::get('admin')) {
            return FALSE;
        }
        return TRUE;
    }
    
    protected function _checkRank() 
    {
        $request = Request::instance();
        $action = $this->getControllerName(). '/' . $request->action();
        if (in_array($action, array_flip(self::$UNRANK))) {
            return true;
        }
        $rs = $this->Menu->get(['url'=>$action]);
         
        if (empty($rs)) { // 无记录先允许访问
            return true;
        }
        $foo = Session::get('admin.menu_id');
        $menu_id = is_array($foo) ? $foo : explode(',', $foo);
    
        if (!in_array($rs['id'], $menu_id)) {
            //return false;
        }
        return true;
    }
    
    protected function _noLogin() 
    {
        Session::clear();
        echo "<script language=javascript>top.location.href='/login/nologin';</script>";
        exit;
    }
    
    protected function _noRank() 
    {
        return $this->fetch('norank');
    }
    
    
    /**
     * 用于第三个导航的url
     *
     * @param       $defaultTab1
     * @param       $defaultTab2
     * @param array ...$args
     * @return string
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function urlTab($defaultTab1, $defaultTab2, ...$args)
    {
        $defaultTab1 = $this->request->param('tabName1', $defaultTab1);
        $defaultTab2 = $this->request->param('tabName2', $defaultTab2);
        
        return url(...$args) . "?tabName1={$defaultTab1}&tabName2={$defaultTab2}";
    }
    
    

    /**
     * 加载模板输出
     * @access protected
     * @param string $template 模板文件名
     * @param array  $vars     模板输出变量
     * @param array  $replace  模板替换
     * @param array  $config   模板参数
     * @return mixed
     */
    protected function fetch($template = '', $vars = [], $replace = [], $config = [])
    {
        $this->LogManage->write();
        $this->assign('headerBody', $this->headerBody);
        $this->assign('thirdlyTabName', $this->tabNameThirdly);
        $this->assign('headerBodyHtml', $this->headerBodyHtml);
        
        return parent::fetch($template, $vars, $replace, $config);
    }
    
    /**
     * 加载当前控制的语言包
     */
    protected function loadControllerLang()
    {
        Lang::load(APP_PATH . $this->getModuleName() . DS . 'lang' . DS . $this->getControllerName() . EXT);
    }
    
    /**
     * 返回当前控制名称
     *
     * @return string
     */
    private function getControllerName()
    {
        return Request::instance()->controller();
    }

    /**
     * 返回当前模块名称
     *
     * @return string
     */
    private function getModuleName()
    {
        return Request::instance()->module();
    }
    
    /**
     * 生成操作按钮
     *
     * @param array $operate 操作按钮数组
     * @ignore
     * @return string
     */
    public static function showOperate($operate = [])
    {
        if (empty($operate)) {
            return '';
        }
        $option = [];
        foreach ($operate as $key => $vo) {
            if (is_string($vo)) {
                $option[] = '<a href="' . $vo . '">' . $key . '</a>';
            } else if (is_array($vo)) {
                
                $attr = '';
                $notAttr = ['class' => 1, 'src' => 1,];
                foreach ($vo as $k => $item) {
                    if (isset($notAttr[$k])) {
                        continue;
                    }
    
                    $item = is_array($item) ? "='" . json_encode($item) . "' " : '="' . $item . '" ';
                    $attr .= $k . $item;
                }
                $vo['src'] = empty($vo['src']) ? 'javascript:void(0);' : $vo['src'];
                
                $option[] = '<a href="' . $vo['src'] . '" class="'.(isset($vo['class'])?$vo['class']:'').
                    '" '.$attr.' >' . $key . '</a>';
            }else if ($vo instanceof \helper\Html){
                $option[] = $vo;
            }
        }
        
        return join(' | ', $option);
    }

    /**
     * 校验传入的id串是否由,隔开的数字，即:1,2,3,4,5,6
     * @param $ids
     * @return bool
     */
    protected function validateIds($ids)
    {
        $arr = explode(",",$ids);
        foreach ($arr as $key => $id)
        {
            if(is_numeric($id))
            {
                continue;
            }
            else
            {
                return false;
            }
        }
        return implode(",",$arr);//避免以逗号开始或者以逗号结束
    }
    
    
    /**
     * 后台需要写入到log_manage中
     *
     * @param array  $data
     * @param string $msg
     * @param int    $code
     * @param array  $header
     * @param array  $options
     * @return \think\response\Json
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function sucJson(array $data = [], $msg = '', $code = 200, $header = [], $options = [])
    {
        $this->LogManage->write($msg); // 写入日志表
        
        return parent::sucJson($data, $msg, $code, $header, $options);
    }
    
    /**
     * 后台需要写入到log_manage中
     *
     * @param array  $data
     * @param string $msg
     * @param null   $code
     * @param array  $header
     * @param array  $options
     * @return \think\response\Json
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function errJson(array $data = [], $msg = '', $code = null, $header = [], $options = [])
    {
        $this->LogManage->write($msg, 1); // 写入日志表
    
        return parent::errJson($data, $msg, $code, $header, $options);
    }
    
    
    /**
     * 正确返回
     * @param array $data
     * @param string $msg
     * @param bool $only_data
     * @return \think\response\Json
     */
    protected function ret(array $data = [], $msg = '',$only_data=false)
    {
        $this->LogManage->write($msg); // 写入日志表

        if($only_data)
        {
            return json($data);
        }

        $content = [
            'code' => 0,
            'data' => $data,
            'msg'  => $msg,
        ];
        return json($content);
    }

    /**
     * 错误返回
     * @param $code
     * @param string $msg
     * @return \think\response\Json
     */
    protected function erret($code, $msg = '')
    {
        $this->LogManage->write($msg, 1); // 写入日志表
        $content = [
            'code' => $code,
            'data' => null,
            'msg'  => $msg ?: (isset(\C::$msg[$code]) ? \C::$msg[$code] : ''),
        ];
        return json($content);
    }
    
    
    
    /**
     * 处理搜索时间的结束时间
     *
     * @param        $date
     * @param string $format
     * @param bool|string $timeBool true为输出时间戳格式
     * @return int|string
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function getSearchDate($date, $action = 'end', $format = 'Y-m-d', $timeBool = true)
    {
        if (empty($date)) {
            return '';
        }
        
        $date = date_create_from_format($format, $date);
        
        if ($date) {
            if ($action === 'start') {
                $date->setTime(0, 0, 0);
            }else if ($action === 'end'){
                $date->setTime(23, 59, 59);
            }
            
            if ($timeBool === true) {
                return $date->getTimestamp();
            } elseif (is_string($timeBool)) {
                return $date->format($timeBool);
            }else{
                return $date->format('Y-m-d H:i:s');
            }
        } else {
            return '';
        }
    }
    
    
    /**
     * 隐藏nav
     *
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function hideNav()
    {
        $this->assign('isShowNav', 'hide');
    }
    
    
    
    
    /**
     * 设置headerBody
     *
     * @param string $headerBody
     */
    protected function setHeaderBody($headerBody)
    {
        $this->headerBody = $headerBody;
    }
    
    
    /**
     * 添加headerBody
     *
     * @param $headerBody
     * @return $this
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function addHeaderBody($headerBody, $top = false)
    {
        if ($this->headerBody !== 'include/empty') { // 少加载空模板
            $this->headerBody = $headerBody;
        }else if ($top){ // 优先加载
            $this->headerBody = "{$headerBody}," . $this->headerBody;
        }else{
            $this->headerBody .= ",{$headerBody}";
        }
    
        return $this;
    }
    
    
    /**
     * 添加body内容
     *
     * @param \helper\Html|string $element
     * @return $this
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function addHeaderBodyHtml($element)
    {
    
        if (is_null($this->headerBodyHtml)) {
            $this->headerBodyHtml = \helper\Html::createElement('div');
        }
        $this->headerBodyHtml->addElement($element);
        
        return $this;
    }
    
    
    /**
     * 添加七牛的文件上传
     *
     * @return $this
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function addQiNiuWebUploader()
    {
        static $bool = 0;
        if ($bool){
            return $this;
        }
        $bool = 1;
    
        $this->addHeaderBodyHtml(\helper\Html::createElement('script')->set('src', '/lib/qiniu-sdk-1.0.19/dist/qiniu.min.js'));
        // 2.1.1 - 2.1.9
        $this->addHeaderBodyHtml(\helper\Html::createElement('script')->set('src', 'https://cdn.staticfile.org/plupload/2.1.9/plupload.full.min.js'));
        
        // 官方推荐调试
//        $this->addHeaderBodyHtml(\helper\Html::createElement('script')->set('src', 'https://cdn.staticfile.org/plupload/2.1.9/moxie.js'));
//        $this->addHeaderBodyHtml(\helper\Html::createElement('script')->set('src', 'https://cdn.staticfile.org/plupload/2.1.9/plupload.dev.js'));

        
        return $this;
    }
    
    
    /**
     * @param array $config
     * @return array
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function handleQiNiuWebUploaderConfig($config = [])
    {
        return \helper\TempData::instance()->one(__METHOD__, function ($data)use($config){
            if (!empty($config)) {
                $data = array_merge($data, $config);
            }
    
            return !empty($data) ? $data : [];
        });
    }
    
    
    
    /**
     * 设置第三个tab的名字
     *
     * @param string $thirdlyTabName
     */
    protected function setTabNameThirdly($thirdlyTabName)
    {
        $this->tabNameThirdly = ' > ' . $thirdlyTabName;
    }
    
    
    /**
     * 获取后台用户的id
     *
     * @return mixed
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function getAdminId()
    {
        return \app\admin\model\Admin::getCurrentAdminId();
    }
    
    
    /**
     * 获取后台用户名
     *
     * @return mixed
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function getAdminName()
    {
        return $this->request->session('admin.username');
    }
    
    /**
     * 获取后台账号绑定的前台用户id
     * @return mixed|array
     */
    protected function getAdminBindUserId()
    {
    	return $this->request->session('admin.bind_user_id');
    }
    
    /**
     * 判断后台用户组ID是否与给定groupId的相同
     *	groupId=1为超级管理员
     * @return mixed
     * @author liujuneng
     */
    protected function checkAdminGroupId($groupId)
    {
    	return $this->request->session('admin.group_id') == $groupId;
    }
    
    /**
     * 列表显示图片
     *
     * @param        $src
     * @param string $title
     * @return string
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function getTableColumnImgHtml($src, $title = '', $width = '80px', $height = '80px')
    {
        $titleAlt = !empty($title) ? $title . '的图片' : '';
        return !empty($src)?"<img src='{$src}' alt='{$titleAlt}' title='{$title}' width='{$width}' height='{$height}' />":'';
    }
    
    
}
