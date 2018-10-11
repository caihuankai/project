<?php
namespace app\admin\model;

use app\common\model\ModelBase;
use app\admin\controller\App;
use think\Config;
use think\Request;

class Group extends ModelBase
{
    public function insert($param)
    {
        try{
            $result =  $this->validate(true)->save($param);
            if(false === $result){
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            }else{

                return ['code' => 1, 'data' => '', 'msg' => '添加用户组成功'];
            }
        }catch( \PDOException $e){

            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    public function edit($param)
    {
        try{
            $result =  $this->validate(true)->save($param, ['id' => $param['id']]);
            if(false === $result){
                return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '编辑用户组成功'];
            }
        }catch( \PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    public function del($id)
    {
        try{
            $this->where("id in (".$id.")")->delete();
            return ['code' => 1, 'data' => '', 'msg' => '删除用户组成功'];

        }catch( \PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }


    public static function getUserGroupInfo($id)
    {
        return $result = db('group')->where('id ="'.$id.'"')->find();
    }


    /**
     * 获取角色的权限节点
     * @param $id
     * @return mixed
     */
    public static function getRuleById($id)
    {
        $res = self::field('menu_id')->where('id', $id)->find();

        return $res['menu_id'];
    }

    /**
     * 组权限提交
     * @param $nodeData
     */
    public function editAccess($nodeData)
    {
        try{
            $this->save($nodeData, ['id' => $nodeData['id']]);
            return ['code' => 1, 'data' => '', 'msg' => '分配权限成功'];

        }catch( \PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    /**
     * 获取人员组已分配的服务号
     */
    public static function getGroupPlatform($groupId)
    {
         $result = db('group_platform',config('bs_db_config'))->alias('a')
            ->field('a.platform_id,a.group_id,b.id,b.name')
            ->join('platform b','a.platform_id= b.id','left')
            ->where('a.group_id='.$groupId .' and b.id is not null and b.id != ""')
            ->select();
        return $result;
    }
}
