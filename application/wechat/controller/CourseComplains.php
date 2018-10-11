<?php

namespace app\wechat\controller;

use app\wechat\model\CourseComplains as MCourseComplains;
use app\common\controller\JsonResult;
use think\controller\Rest;

class CourseComplains extends App
{
    /**
     * 保存课程投诉信息
     */
    public function saveComplain(){
		$m = new MCourseComplains();
        return $m->saveComplain();
    }

}