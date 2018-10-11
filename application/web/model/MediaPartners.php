<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/4/18
 * Time: 16:05
 */

namespace app\web\model;



use app\common\model\ModelBs;

class MediaPartners extends ModelBs
{

    /**
     * 获取媒体数据根据类型不同获取对应数据
     * @param int $type
     * @param $field
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getBlogrollData($type=1,$field)
    {
       $result = self::where('type',$type)->field($field)->select();
        if (count($result)>0){
            $data = $result;
        }else{
            $data = '暂无数据';
        }
        return $data;
    }

}