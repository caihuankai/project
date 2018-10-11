<?php

namespace app\admin\model;



class Live extends \app\common\model\Live
{
    
    
    /**
     * 过滤掉创建直播间的用户
     *
     * @param array $userIds
     * @return array
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function diffLiveUserIds(array $userIds)
    {
        if (empty($userIds)) {
            return [];
        }
        
        $liveUserIds = $this->where(['user_id' => ['in', $userIds]])->column('user_id');
        
        return array_diff($userIds, $liveUserIds);
    }
    
    
    
    /**
     * 更新直播间分类
     *
     * @param $liveId
     * @param $cateId
     * @return bool|mixed
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function updateLiveCate($liveId, $cateId)
    {
        if (empty($liveId) || empty($cateId)) {
            return false;
        }
        
        return $this->update(['cid' => $cateId], ['id' => $liveId]);
    }
    
    

    

    
    
    
    

    
    
    /**
     * 根据直播间id获取直播间课程数
     *
     * @param        $liveId
     * @param string $field
     * @return array|false|\PDOStatement|string|\think\Model
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function getLiveCourseNum($liveId, $field = '')
    {
        if (empty($liveId)) {
            return [];
        }
        
        $field = empty($field) ? 'count(c.id) courseNum' : $field;
        return $this->joinCourse()->where(['l.id' => $liveId])->alias('l')
            ->group('l.id')
            ->field($field)->find();
    }
    
    
    /**
     * live和course进行group，排除删除的课程
     *
     * @param array $liveIds
     * @param       $field
     * @param       $key
     * @return array
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function getLiveGroupCourse(array $liveIds, $field, $key)
    {
        if (empty($liveIds)) {
            return [];
        }
        
        return $this->where(['l.id' => ['in', $liveIds]])->alias('l')
            ->join('course c', 'c.live_id = l.id and c.status <> 5')
            ->fetchClass('\CollectionBase')
            ->group('l.id')
            ->field($field)
            ->select()
            ->column(null, $key);
    }
    
    
    /**
     * 统计多个直播间的收益，直播间收益不包括粉丝的分成收益
     *
     * @param array  $liveIds
     * @param string $field
     * @return array
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function sumLiveIncome(array $liveIds, $field = '')
    {
        if (empty($liveIds)) {
            return [];
        }
        
        $field = empty($field) ? 'c.live_id, sum(rl.available_amount) money' : $field;
        /** @var \app\admin\model\Course $model */
        $model = model('course');
        return $model->where(['c.live_id' => ['in', $liveIds]])->alias('c')->field($field)
            ->join('rcb_log rl', 'rl.class_id = c.id and rl.type = "class_income" and rl.dataFlag = 1')
            ->fetchClass('\CollectionBase')
            ->group('c.live_id')
            ->select()
            ->column(null, 'live_id');
    }
    
    /**
     * @inheritdoc
     */
    public function closeStatus($ids, $status = 2, $operateId = 0)
    {
        if (empty($operateId)) {
            $operateId = \app\admin\model\Admin::getCurrentAdminId();
        }
        
        return parent::closeStatus($ids, $status, $operateId);
    }
    
    
    public function getRoomRedisKey($id)
    {
        return 'room_userids:' . $id;
    }
    
    
    /**
     * 根据类型获取id
     *
     * @param $id
     * @param $type
     * @return int
     * @author aozhuochao
     */
    public function getRoomIdByType($id, $type)
    {
        if ($type === 'course'){ // 课程
            return $id;
        }else if ($type === 'live'){
            return 1000000000 + $id;
        }
    }
    
}