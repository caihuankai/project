<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/3/16
 * Time: 9:51
 */

namespace app\wechat\model;


use app\common\model\ModelBs;
use think\Db;

class GlobalLive extends ModelBs
{
    //添加
    public static function add($data){
        $Db = new self();
        $result = $Db -> allowField(true) -> save($data);
        if ($result){
            return true;
        }
    }
    public static function edit($data,$id){
        $Db = new self();
        $result = $Db -> allowField(true)->save($data,['id' =>$id]);
        if ($result){
            return true;
        }
    }

}