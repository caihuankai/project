<?php
namespace app\admin\controller;

use think\Request;
use think\Session;
use think\App as Application;


/**
 * 菜单管理控制器
 * Class Menu
 * @package app\admin\controller
 * @author zhengkejian
 * @time 20161021 18:49
 */
class Menu extends App
{
    private static $rule_out_cls = [
        'Index', 'Login', 'Error', 'App'
    ];

    private static $rule_out_action = [];
    
    /**
     * 菜单列表
     *
     */
    public function index()
    {
        if(request()->isAjax()){

            $param = input('param.');

            //$limit = $param['pageSize'];
            //$offset = ($param['pageNumber'] - 1) * $limit;

            $where = [];
            $order = '';
            if (isset($param['searchText']) && !empty($param['searchText'])) {
                $where['username'] = ['like', '%' . $param['searchText'] . '%'];
            }
            if (isset($param['orderName']) && isset($param['order'])) {
                $order = $param['orderName']." ".$param['order'];
            }
            $selectResult = \app\admin\model\Menu::getMenu('',$order);

            foreach($selectResult as $key=>$vo){

                $selectResult[$key]['hide'] = $vo['hide'] == 0 ? '<font class="hint-green">显示</font>' : '<font class="hint-red">隐藏</font>';

                $operate = [
                    //'添加子菜单' => url(request()->controller().'/add', ['pid' => $vo['id']]),
                    '编辑' => "javascript:edit(".$vo['id'].")",
                    '删除' => "javascript:del('".$vo['id']."')"
                ];

                $selectResult[$key]['operate'] = self::showOperate($operate);

            }

            $return['rows'] = $selectResult;

            return $this->ret($return,'',true);
        }
        //;$this->assign('list',$menuList);
        return $this->fetch();
    }
    /**
     * 添加菜单
     * @hide
     * @return mixed|\think\response\Json
     */
    public function add()
    {
        if(request()->isPost()){
            $param = input('post.');
            $param['hide'] = isset($param['hide']) ? 0 : 1;
            $status        = isset($param['build']) ? true : false;
            $objModel      = new \app\admin\model\Menu();
            $flag          = $objModel->insert($param);
            //检测是否是二级菜单
            $twoMenu       = $param['pid'] == 0 ? false : \app\admin\model\Menu::checkMenuLevel($param['pid']);
            //添加菜单成功后调用生成资源 二级菜单才可生成资源
            if($flag['code'] == 1 && $status && $twoMenu)
            {
                $module = Request::instance()->module();
                $c = Application::$namespace . '\\' . ($module ? $module . '\\' : '') .'controller'.'\\'. $param['url'];
                $this->e($c, $flag['data']);
            }
            return $this->ret([], $flag['msg']);
        }
        $typeId = input("param.pid",0);
        $this->assign([
            'node'       => \app\admin\model\Menu::getMenu(),
            'pid'        => $typeId,
        ]);
        return $this->fetch();
    }

    /**
     * 编辑菜单
     * @hide
     * @return mixed|\think\response\Json
     */
    public function edit()
    {
        if(request()->isPost()){

            $param = input('post.');
            $param['hide'] = isset($param['hide']) ? 0 : 1;
            $objModel      = new \app\admin\model\Menu();
            $flag          = $objModel->edit($param);

            return $this->ret([], $flag['msg']);
        }
        $id = input('param.id');
        $menuInfo = \app\admin\model\Menu::getMenuInfo($id);
        //dump($menuInfo);
        $this->assign('menuInfo',   $menuInfo);
        $this->assign([
            'node'       => \app\admin\model\Menu::getMenu(),
        ]);
        return $this->fetch();
    }

    /**
     * 删除菜单
     * @hide
     * @return \think\response\Json
     */
    public function del()
    {
        $id = input('param.id');

        $objModel = new \app\admin\model\Menu();
        $flag = $objModel->del($id);
        return $this->ret([], $flag['msg']);
    }

    public function aaa()
    {
        echo '11';
    }

    /**
     * 生产资源与目录
     * @ignore
     */
    public function build() 
    {
        if (Session::get('admin.username') != 'admin') {
            //@todo
        }
        $id  = input('param.id');
        $url = input('param.url');
        $pid = input('param.pid');
        if($pid == 0 || !\app\admin\model\Menu::checkMenuLevel($pid))
        {
            return $this->erret(-1,'请选择二级菜单');
        }
        $module = Request::instance()->module();
        $file = \Fso::instance()->fileList(APP_PATH.$module.DS.'controller');
        
        foreach ($file as $f){
            if (strpos($f, '.php') === false) continue;
             
            $class = basename($f, '.php');
            if (in_array($class, self::$rule_out_cls)) continue;
            
            $c = Application::$namespace . '\\' . ($module ? $module . '\\' : '') .'controller'.'\\'. $url;
            $this->e($c, $id);
        }
        return $this->ret([],'生成完成');
    }
    
    /**
     * 清空资源与目录
     * @ignore
     */
    public function clear()
    {
        //@todo
    }

    /**
     * 生成菜单权限
     * @param $c
     * @param bool $pid
     * @ignore
     */
    private function e($c, $pid=false)
    {
        $re = new \ReflectionClass($c);
        $methods = $re->getMethods();

        $data = [];
        !$pid && $pid = rand(1000, 9999);
        foreach ($methods as $reflectionMethod){
            if (!$reflectionMethod->isPublic() || $reflectionMethod->name[0] == '_') {
                continue;
            }
            $action = basename($reflectionMethod->class).'/'.$reflectionMethod->name;
            if (in_array($action, self::$rule_out_action)) {
                continue;
            }
            if ($this->Menu->get(['url'=>$action])) {
                continue;
            }
            $comment = $reflectionMethod->getDocComment();
            //读取注释标签 @ignore 忽略生成
            if(preg_match('/@ignore/i',$comment)){
                continue;
            }
            $hide = 0;
            //读取注释标签 @hide 隐藏菜单
            if(preg_match('/@hide/i',$comment)){
                $hide = 1;
            }
            $desc = substr($comment, 0, strpos($comment.'@','@'));
            $desc = trim(str_replace(array('/**','*/','*','\r'), '', $desc));
            $data[] = [
                'pid' => $pid,
                'name' => $desc,
                'url' => $action,
                'sort' => 99,
                'access' => 0,
                'hide' => $hide,
            ];
        }
        $this->Menu->saveAll($data);
    }
}
