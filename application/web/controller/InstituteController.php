<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/8/21
 * Time: 11:06
 */

namespace app\web\controller;


use app\admin\model\Ads;

class InstituteController extends App
{
    /**
     * 获取99学院顶部banner
     */
    public function fetchTopBanner()
    {
        $model = new Ads();
        $field = "adId,adFile,adName,adURL,adSort,relevanceType,relevanceId";
        $data = $model->where(['positionType'=>24,'adStatus'=>1])->field($field)->limit(5)->select();
        return $this->sucSysJson($data,'Success');
    }

    /**
     * 获取讲师banner
     */
    public function fetchTeacherBanner()
    {
        $model = new Ads();
        $videoModel = new \app\web\model\Video();
        $field = "adId,adFile,adName,adURL,adSort,relevanceType,relevanceId,createTime";
        $datas = $model->where(['positionType'=>26,'adStatus'=>1])
            ->field($field)->select();
        $result = [];
        foreach ($datas as $data){
            $videoData = $videoModel->where(['uid'=>$data['relevanceId'],'open_status'=>1])->field('id,uid,title,cover_pc_url,video_url,create_time')->order('create_time desc')->find();
            $data['video'] = empty($videoData) ? ['id'=>'','title'=>'暂无标题','create_time'=>'0000-00-00 00:00:00']:$videoData;
            $result[] = $data;
        }
        return $this->sucSysJson($result,'Success');
    }

}