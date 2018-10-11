<?php

namespace app\wechat\model;

use think\Db;
use app\wechat\model\User as MUser;

class Live extends \app\common\model\Live
{
    
    /**
     * 不考虑status的统计用户直播间数量
     *
     * @param $userId
     * @return int
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function countUserLiveNum($userId)
    {
        return $this->where(['user_id' => ['eq', $userId]])->count('id');
    }
    
    
    /**
     * 根据用户id和直播id获取数据
     *
     * @param $field
     * @param $userId
     * @param $liveId
     * @return array|false|\PDOStatement|string|\think\Model
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function getDataByLiveIdAndUser($field, $userId, $liveId = 0)
    {
        if (empty($userId)) {
            return [];
        }
        
        $where = ['user_id' => $userId];
        if (!empty($liveId)) { // 目前用户只有一个直播间
            $where['id'] = $liveId;
        }
        
        return $this->where($where)->field($field)->find();
    }

    public static function checkPass($liveID=10000,$field = 'id,adapt')
    {
        return self::where('id',$liveID)->field($field)->find();
    }
    
    /**
     * @inheritdoc
     */
    public function closeStatus($ids, $status = 2, $operateId = 0)
    {
        if (empty($operateId)) {
            /** @var \app\wechat\model\User $userModel */
            $userModel = model('User');
            $operateId = $userModel->getCurrentSessionUserId();
        }
        
        return parent::closeStatus($ids, $status, $operateId);
    }

    public function getTheme($ids){
        $theme = $this->where(['id' => ['in', $ids]])->value('theme');
        return $theme;
    }

    public function setTheme($id, $theme){
        $res = $this->update(['id'=>$id, 'theme' => $theme]);
        return $res;
    }
}