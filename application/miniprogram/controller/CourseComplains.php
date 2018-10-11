<?php

namespace app\miniprogram\controller;

use app\wechat\model\CourseComplains as MCourseComplains;

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