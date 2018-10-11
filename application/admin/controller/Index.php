<?php
namespace app\admin\controller;

use think\Session;

class Index extends App
{
    public function _empty($name) 
    {
        echo 'cant found method: '.$name;
    }
    
    public function index()
    {
        $group_id = Session::get('admin.group_id');
        $group = $this->Group->get(['id' => $group_id])->toArray();
        $menuIdArr= trim($group['menu_id']) != '' ? explode(',', $group['menu_id']) : $group['menu_id'];
        $id        = \app\admin\model\Menu::getShowMenuList($menuIdArr);
        $idArr     = array();
        if ($id)
        {
            foreach ($id as $k => $v)
            {
                $idArr[] = $v['id'];
            }
        }

        if (!($menuList = \app\admin\service\Redis::get('menu:dks:' . date("Y-m-d") . ':session_id:' . session_id())))
        {
            $menuList  = \app\admin\model\Menu::getMenuById(1,$menuIdArr);
            \app\admin\service\Redis::set('menu:dks:' . date("Y-m-d") . ':session_id:' . session_id(), json_encode($menuList), 86400);
        }
        else
        {
            $menuList = json_decode($menuList,true);
        }

//        $subscribeList  = \app\admin\model\Group::getGroupPlatform(Session::get('admin.group_id'));
        $this->assign('menuList',      $menuList);
//        $this->assign('subscribeList',      $subscribeList);
        $selectedSubscribe = Session::get('admin.platform');
        $this->assign('currentSubscribe',$selectedSubscribe!=null?$selectedSubscribe['name']:"未分配");
        $this->assign('topMenuList',   $id);
        $this->assign('userinfo',array('id'=>Session::get('admin.id'),
            'username'=>Session::get('admin.username'),
            'group_name'=>Session::get('admin.group_name')));

        return $this->fetch();
    }
    
    
    public function welcome()
    {
        return $this->fetch();
    }
    
    public function change()
    {
        $param = input('param.id',1);
        $menuIdStr = Session::get('admin.menu_id');
        $data  = \app\admin\model\Menu::getMenuById($param, $menuIdStr);
        $this->assign('menuList',   $data);
        $str   = $this->fetch();
        return $this->sucJson(['code'=>1,'data'=>$str,'msg'=>'success']);
    }
    
    
    /**
     * 获取七牛上传token
     *
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function getQiNiuUploadToken()
    {
        $bucket = $this->request->param('bucket', '');
        $class = new \Qiniu('', '', $bucket);
        $token = $class->getUploadToken();
    
        echo json_encode([
            'uptoken' => $token,
        ]);
        return;
    }
    
    
    /**
     * 上传七牛的key和hash到数据库中
     *
     * @param $key
     * @param $hash
     * @param $type
     * @return \think\response\Json
     * @author aozhuochao
     */
    public function uploadQiNiuUrl($key, $hash, $type, $size = '')
    {
        $type = intval($type);
        $hashUnique = $this->request->post('hashUnique/i', 0);
        $model = new \app\admin\model\QiniuGallerys();
    
        if (!empty($hashUnique)) { // 唯一hash处理
            if (empty($hash)) {
                return $this->errSysJson('hash必传');
            }
            
            $data = $model->getFieldByHash($type, $hash, 'id, qiniuKey');
    
            if (!empty($data)) {
                $id = $data['id'];
                $key = $data['qiniuKey'];
                goto returnData;
            }
        }
        
        $id = $model->insertGetId([
            'qiniuKey' => $key,
            'positionType' => $type,
            'hash' => $hash,
            'size' => $size,
        ]);
        
        returnData:;
        return $this->sucSysJson([
            'id' => $id,
            'url' => $model->getUrlByKey($key),
            'key' => $key,
        ]);
    }

}
