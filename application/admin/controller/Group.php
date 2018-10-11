<?php
namespace app\admin\controller;
use think\Db;
use think\Request;

class Group extends App
{
    public function _empty($name)
    {
        echo 'cant found method: '.$name;
    }

    /**
     * 用户组列表
     * @return mixed|\think\response\Json
     */
    public function index()
    {
        if(request()->isPost())
        {
            $request = Request::instance();
            $page = $request->post("pageNumber");
            $pageSize = $request->post("pageSize");
            $order = $request->post("order");
            $orderName = $request->post("orderName",'id');
            $name = "%".$request->post("name",'')."%";

            $countArr = Db::table(config('database.prefix').'group')->count();
            $returnArr = Db::table(config('database.prefix').'group')->alias('a')
                ->field('a.id,a.name,a.status')
                ->where('a.name like "'.$name.'"')
                ->limit((($page-1)*$pageSize),$pageSize)->order($orderName.' '.$order)
                ->select();

            foreach($returnArr as $key=>$data){
                $returnArr[$key]['status'] = $data['status'] == 1 ? '<font color="green">启用</font>' : '<font color="red">停用</font>';
                $operate = [
                    '编辑' => "javascript:group_edit(".$data['id'].")",
                    '删除' => "javascript:group_del('".$data['id']."')",
                    '权限分配' => "javascript:menu_edit('".$data['id']."')"
                ];

                $returnArr[$key]['operate'] = self::showOperate($operate);
            }

            $data = array('rows'=>$returnArr,'total'=>$countArr);
            return $this->ret($data,'',true);
        }
        return $this->fetch('grouplist');
    }

    /**
     * 增加用户组
     * @return mixed|\think\response\Json
     */
    public function Groupadd()
    {
        if(request()->isPost()){
            $this->groupValidateName();
            $param = input('post.');
            $param['menu_id'] = "";
            $param['status'] = isset($param['status']) ? 1 : 0;
            $objModel      = new \app\admin\model\Group();
            $flag          = $objModel->insert($param);
            return $this->ret([],$flag['msg']);
        }
        return $this->fetch();
    }

    /**
     * 编辑用户组
     * @return mixed|\think\response\Json
     * @hide
     */
    public function Groupedit()
    {
        if(request()->isPost()){
            $this->groupValidateName();
            $param = input('post.');
            $param['status'] = isset($param['status']) ? 1 : 0;
            $objModel      = new \app\admin\model\Group();
            $flag          = $objModel->edit($param);
            return $this->ret([],$flag['msg']);
        }
        $id = input('param.id');
        $GroupInfo = \app\admin\model\Group::getUserGroupInfo($id);
        $this->assign('groupInfo',   $GroupInfo);
        return $this->fetch();
    }
    
    
    protected function groupValidateName()
    {
        $name = $this->request->post('name', '');
    
        if (empty($name)) {
            abort($this->errSysJson('', '人员组名不能为空'));
        }
    }
    

    /**
     * 删除用户组 可批量
     * @return \think\response\Json
     * @hide
     */
    public function del()
    {
        $id = input('param.id');
        $objModel = new \app\admin\model\Group();
        $flag = $objModel->del($id);
        return $this->ret([],$flag['msg']);
    }


    /**
     * 权限分配
     * @hide
     */
    public function menuedit()
    {

        //分配新权限
        if(request()->isPost()){
            $param = input('post.');
            $doParam = [
                'id' => $param['id'],
                'menu_id' => $param['rule']
            ];
            $obj  = new \app\admin\model\Group();
            $flag = $obj->editAccess($doParam);
            return $this->ret([],$flag['msg']);
        }
        $param = input('param.');
        $nodeStr = \app\admin\model\Menu::getNodeInfo($param['id']);
        $this->assign('node',   $nodeStr);
        $this->assign('groupId',   $param['id']);
        return $this->fetch();
    }

    /**
     * 分配服务号
     * @return \think\response\Json
     */
    public function dealPlatform()
    {
        $param = input('post.');
        if(!isset($param['id']))
        {
            return $this->erret(0,isset($param['id'])?"请选择要分配服务号的人员组":"请选择要分配的服务号");
        }
        $tableName = config('bs_db_config.prefix').'group_platform';
        Db::connect('bs_db_config')->startTrans();
        try
        {
            Db::connect('bs_db_config')->execute('delete from '.$tableName.' where `group_id` = (?)',[$param['id']]);
            if(isset($param['platformIds']))
            {
                foreach ($param['platformIds'] as $key =>$platformId)
                {
                    Db::connect('bs_db_config')->execute('insert into '.$tableName.' (`group_id` ,`platform_id`) values (?, ?)',[$param['id'],$platformId]);
                }
            }
        }
        catch (\Exception $e)
        {
            Db::connect('bs_db_config')->rollback();
            return $this->erret(0,'异常，分配订阅号失败');
        }
        Db::connect('bs_db_config')->commit();
        return $this->ret([],isset($param['platformIds'])?"分配订阅号成功":'清空订阅号成功');
    }
}
