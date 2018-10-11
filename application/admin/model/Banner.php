<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/8/9
 * Time: 11:22
 */

namespace app\admin\model;


use app\common\model\ModelBs;

class Banner extends ModelBs
{
    protected $msg = '未定义类型';

    protected $datastatus = [
        '1' => ['name'=>'启用'],
        '2' => ['name'=>'禁用'],
    ];
    /**
     * 生成IMG表情内容
     * @param $src
     * @return string
     */
    public static function makeImg($src)
    {
        return "<img src='{$src}' onclick=\"_showBig('{$src}')\" style='width: 35px;height: 35px;margin:0 35%;'>";
    }

    /**
     * 获取$type类型数据的状态类型
     * @param $type
     * @param $key
     * @return string
     */
    public function getDataStatus($type,$key)
    {
        $type = "data".$type;
        $data = $this->$type;
        return isset($data[$key]) ? $data[$key]['name'] : $this->msg;
    }

}