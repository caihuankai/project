<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/8/24
 * Time: 15:19
 */

namespace app\jiahua\controller;


use app\admin\model\TeachJiahua;
use app\jiahua\model\UserJiahua;

class Lecturer extends App
{
    protected $noLoginAction = ['liveLecturer'];

    /**
     * 获取真在直播中的讲师
     */
    public function liveLecturer()
    {
        $model = new TeachJiahua();
        $LecturerInfo = $model->where(['live_status'=>1])->field('user_id,alias,head_add')->find();
        if ($LecturerInfo){
            $LecturerInfo['live_statua']=1;
            return $this->sucSysJson($LecturerInfo);
        }else{
            return $this->sucSysJson(['live_status'=>0],'当前无直播中的讲师');
        }

    }

}