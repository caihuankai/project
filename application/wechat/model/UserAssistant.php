<?php

namespace app\wechat\model;


use app\common\model\ModelBs;

class UserAssistant extends ModelBs
{
    
    
    /**
     * 获取助教管理的老师
     *
     * @param $userId
     * @return array
     * @author aozhuochao
     */
    public function getUserManageTeacherList($userId, $page = 1, $num = 20, $order = 'id desc')
    {
        if (empty($userId)) {
            return [];
        }
        
        return $this->where(['ua.user_id' => ['eq', $userId]])->alias('ua')->field('ua.teacher_id')
            ->join('user u', 'u.user_id = ua.teacher_id and u.freeze = 0')
            ->order($order)->page($page, $num)->fetchClass('\CollectionBase')->select()->column('teacher_id');
    }
    
    
    /**
     * 检测助教是否可以管理这个讲师
     *
     * @param $userId
     * @param $teacherId
     * @return bool
     * @author aozhuochao
     */
    public function checkUserManageTeacher($userId, $teacherId)
    {
        if (empty($userId) || empty($teacherId)) {
            return false;
        }
        
        return !!$this->where(['user_id' => ['eq', $userId], 'teacher_id' => ['eq', $teacherId]])->field('id')->find();
    }
    
    
    /**
     * 获取助教下的老师数
     *
     * @param $userId
     * @return int
     * @author aozhuochao
     */
    public function countUserManageTeacher($userId)
    {
        if (empty($userId)) {
            return 0;
        }
        
        return $this->alias('a')
        ->join('user u','u.user_id = a.teacher_id and u.freeze = 0')
        ->where(['a.user_id' => ['eq', $userId]])
        ->count();
    }
    
}