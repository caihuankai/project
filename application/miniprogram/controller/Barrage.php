<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/6/23
 * Time: 10:51
 */

namespace app\miniprogram\controller;


class Barrage extends App
{
    protected $noLoginAction = [
        'getBarrage',
    ];
    /**
     * 获取弹幕条
     * @return \think\response\Json
     */
    public function getBarrage()
    {
        $model =new \app\wechat\model\Barrage();
        $result = $model->where('status',1)->field('id,content,type')->select();
        if ($result){
            return $this->sucSysJson($result);
        }else{
            return $this->errSysJson('暂无弹幕！');
        }
    }
}