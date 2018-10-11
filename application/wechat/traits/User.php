<?php

namespace app\wechat\traits;


trait User
{
    
    
    /**
     * 获取用户直播间数据
     *
     * @return array|false|\PDOStatement|string|\think\Model
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function getLiveData($field = 'id', $abort = true)
    {
        /** @var \app\wechat\model\Live $liveModel */
        $liveModel = model('live');
        $liveData = $liveModel->getLiveDataByUserId($this->getUserId(), $field);
    
        if ($abort && empty($liveData['id'])) { // 直播间不存在
            $this->abortError($this->errSysJson(\app\common\controller\JsonResult::ERR_LIVE_NULL));
        }
        
        return $liveData;
    }
    
    
    
}