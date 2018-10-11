<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/3/29
 * Time: 10:41
 */

namespace app\admin\model;

use app\common\model\ModelBs;
class NavigationLists extends ModelBs
{
    //根据id获取数据，可以筛选字段
    public function getID($id,$field=''){
        empty($field) ? $result = self::get($id):$result = self::where('id',$id)->field($field)->find();
        return $result;
    }
    //数据新增
    public function addData($data){
        $result = self::save($data);
        if ($result){
            return ['code'=>200,'msg'=>'新增成功！'];
        }else{
            return ['code'=>400,'msg'=>'新增失败！'];
        }
    }
    //编辑数据
    public function updateData($id,$data){
        $result = self::save($data,['id'=>$id]);
        if ($result){
            return ['code'=>200,'msg'=>'编辑成功！'];
        }else{
            return ['code'=>400,'msg'=>'编辑失败！'];
        }
    }
}