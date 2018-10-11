<?php

namespace app\wechat\model;


use app\common\model\ModelBs;

class Apply extends ModelBs
{
    
    /**
     * 获取用户审核状态
     * 1为流量主，2为空间
     *
     * @param $userId
     * @return mixed
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function checkUserApplyStatus($userId)
    {
        return $this->where(['type_id' => $userId, 'type' => ['in', [1, 2]], 'status' => 1])->value('type');
    }
    
}