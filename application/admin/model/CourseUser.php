<?php

namespace app\admin\model;


use app\common\model\ModelBs;

/**
 * 已改为hit_record表
 *
 * @package app\admin\model
 */
class CourseUser extends ModelBs
{
    
    
    /**
     * 统计多个用户参与课程数
     *
     * @param array $userIds
     * @return array
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function countUserInCourse(array $userIds)
    {
        if (empty($userIds)) {
            return [];
        }
        
        return $this->where(['userId' => ['in', $userIds], 'hitRecordType' => 1])->name('hit_record')->field('count(targetId) num, userId')->group('userId')
            ->fetchClass('\CollectionBase')->select()->column('num', 'userId');
    }
    //记录用户浏览记录
    public function save_history($user_id,$id){
        $where['user_id'] = $user_id;
        $where['course_id'] = $id;
        $is_exist = $this->where($where)->find();
        if(empty($is_exist)){
            $this->insert($where);
        }
    }
    
}