<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/9/28
 * Time: 12:17
 */

namespace app\wechat\controller;


use app\admin\model\Ads;

class Slideshow extends App
{
    protected $noLoginAction = ['fetchSlideshow'];
    /**
     * 获取轮播图
     * 29：首页轮播图，30：月度轮播图，31:季度轮播图
     * @param $type
     */
    public function fetchSlideshow($type=29)
    {
        if (in_array($type,[29,30,31])){
            $model = new Ads();
            $dataList = $model->where([
                'positionType'=>$type,
                'adStatus'=>1,
                'dataFlag'=>1
            ])
            ->order('adSort')
            ->field('adId,adFile,adName,adURL,relevanceType,relevanceId')
            ->select();
            if ($dataList){
                return $this->sucSysJson($dataList);
            }else{
                return $this->errSysJson('暂无轮播图');
            }
        }else{
            return $this->errSysJson('参数范围不符合');
        }
    }

}