<?php

namespace app\wechat\traits;


use think\Hook;

trait Course
{
    
    /**
     * 创建课程推送
     *
     * @param $name
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function createCoursePushMsg($courseId, $name, $teacherId = 0)
    {
        // 关注和购买通知，改用c++
//        $key = $this->getCourseCreatePushUserKey($courseId);
//        \CacheBase::set($key, $courseId, 60);
//        $func = \helper\CurlHelper::instance()->pushUrlOpen(
//            url('/Course/courseCreatePushUser', ['key' => $key], false, \helper\UrlSys::getWxHost())
//        );
//        $func instanceof \Closure && Hook::add('app_end', $func);
    
    
        
        
        // 微信推送
        \think\Hook::add('response_end', function ()use($courseId, $name, $teacherId){
            
            \CPlusPlusProtocol::instance()->callFunc('proc_sendNewCourseNotice', $courseId, false); // 写死false
            
            
            /** @var \app\wechat\model\Course $model */
            $model = model('Course');
            
            $courseData = $model->where(['id' => ['eq', $courseId]])->field('id, pid, type, plan_num')->find();
            if ($courseData['type'] == 2){
                $msg = \PushMsgTemp::instance()->getMsg(\PushMsgTemp::COURSE_SERIES_CREATE, [$name, $courseData['plan_num'], $model->getCourseUrl($courseId)]);
            }else{
                $msg = \PushMsgTemp::instance()->getMsg(\PushMsgTemp::COURSE_CREATE, [$name, $model->getCourseUrl($courseId)]);
            }
            
            // 通知老师
            \WeChat\app::staffMsg($msg, $this->getUserWeChatOpenId());
            // 通知助教
            if (!empty($teacherId)) {
                /** @var \app\wechat\model\ThirdLogin $loginModel */
                $loginModel = model('ThirdLogin');
                $teacherOpenId = getDataByKey($loginModel->getUserOpenId((array)$teacherId), $teacherId, '');
                \WeChat\app::staffMsg(\PushMsgTemp::instance()->getMsg($msg), $teacherOpenId);
            }
        });
    }
    
    
    protected function getCourseCreatePushUserKey($courseId = 0)
    {
        return \CacheBase::getCacheName(__METHOD__, $courseId, 'hook');
    }
    
}