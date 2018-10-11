<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/3/30
 * Time: 15:02
 */

namespace app\wechat\controller;


class CourseAdvertising extends App
{
    protected $noLoginAction=['getAdvertising'];
    /**
     * 获取课程广告
     * @return \think\response\Json
     */
    public function getAdvertising()
    {
        $model =new \app\admin\model\CourseAdvertising();
        $datalists = $model
            ->where('status',1)
            ->field('id,cover_img,advertising_name,target_type,type_id')
            ->order('id desc')
            ->select();
        $result= [];
        foreach ($datalists as $datalist){
            if ($datalist['target_type'] == 3){
                $livemodel = new \app\wechat\model\Live();
                $liveID= $livemodel->where('user_id',$datalist['type_id'])->field('id,user_id')->find();
                $datalist['live_id']=$liveID['id'];
                $result[] = $datalist;
            }else{
                $datalist['live_id']=0;
                $result[] = $datalist;
            }
        }
        if ($result){
            return $this->sucSysJson($result);
        }else{
            return $this ->errSysJson('暂无数据！');
        }
    }
}