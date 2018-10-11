<?php
namespace app\admin\model;

use app\common\model\ModelBase;
use app\admin\controller\App;
use think\Request;

class Admin extends ModelBase
{

    public function checkPass($password, $info) 
    {
        if ($info['password'] == md5($password.App::PASSWORD_KEY.$info['key'])){
            return true;
        }
        return false;
    }
    
    public function login($id) 
    {
        return $this->save(['last_visit'=>time(), 'ip'=>Request::instance()->ip()], $id);
    }

    /**
     * 插入用户信息
     * @param $param
     */
    public function insert($param)
    {
        try{
            if($param['password']==""||$param["password"]==null)
            {
                return ['code' => -1, 'data' => '', 'msg' => '密码不能为空'];
            }
            $result =  $this->validate(true)->save($param);
            if(false === $result){
                // 验证失败 输出错误信息
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            }else{

                return ['code' => 1, 'data' => '', 'msg' => '添加用户成功'];
            }
        }catch( \PDOException $e){

            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }
    /**
     * 编辑用户信息
     * @param $param
     */
    public function edit($param,$validate=true)
    {
        try{
            $result =  $this->validate($validate)->save($param, ['id' => $param['id']]);
            if(false === $result){
                // 验证失败 输出错误信息
                return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '编辑用户成功'];
            }
        }catch( \PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    /**
     * 删除用户
     * @param $id array|int
     * @return array
     */
    public function del($id)
    {
        try{
            $this->where("id in (".$id.")")->delete();
            return ['code' => 1, 'data' => '', 'msg' => '删除用户成功'];

        }catch( \PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    public function dealGroup($id,$groupId)
    {
        try{
            $this->where("id in (".$id.")")->update(['group_id' => $groupId]);
            return ['code' => 1, 'data' => '', 'msg' => '分配人员组成功'];

        }catch( \PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }
    
    /**
     * 获取用户信息详情，会根据$id类型返回一维数组或二维数组
     *
     * @param int|int[]   $id
     * @param null|string $field
     * @param string      $index  下标
     * @return array
     */
    public static function getUserInfo($id, $field = null, $index = '')
    {
        if (empty($id)) {
            return [];
        }
        
        $where = is_array($id) ? ['id' => ['in', $id]] : 'id ="' . $id . '"';
    
        $result = db('admin')->where($where)->field($field);
        $result = is_array($id) ? $result->select() : $result->find();
    
        return !empty($result) ? (is_array($id) ? array_column($result, null, $index) : $result) : [];
    }
    
    
    /**
     * 获取后台用户的名称
     *
     * @param array $ids
     * @return array
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function getAdminName(array $ids)
    {
        if (empty($ids)) {
            return [];
        }
        
        return $this->where(['id' => ['in', $ids]])->column('username', 'id');
    }
    
    
    /**
     * 获取后台用户的所属组名称
     *
     * @param array $ids
     * @return array
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function getAdminGroupName(array $ids)
    {
        if (empty($ids)) {
            return [];
        }
        
        // 不考虑group.status
        return $this->where(['a.id' => ['in', $ids]])->alias('a')->join('group g', 'g.id = a.group_id')
            ->field('g.name, a.id')
            ->fetchClass('\CollectionBase')->select()->column('name', 'id');
    }
    
    
    /**
     * 获取当前登录后台的用户id
     *
     * @return mixed
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public static function getCurrentAdminId()
    {
        return request()->session('admin.id');
    }
    
    
}
