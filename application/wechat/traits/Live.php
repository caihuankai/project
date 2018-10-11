<?php

namespace app\wechat\traits;


use app\common\controller\JsonResult;

/**
 * Class LiveData
 *
 * @property \app\wechat\model\Live live
 * @package app\wechat\traits
 */
trait Live
{
    
    protected $liveFieldTrait = '';
    
    
    /**
     * 根据get.id获取直播间数据，并处理错误
     *
     * @return array|false|\PDOStatement|string|\think\Model
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function getLiveDataTrait($userId = 0)
    {
//        $this->validateByName('common.id');
//        $liveId = $this->request->param('id/i', 0);
    
    
        $userId = $userId?:$this->getUserId();
        /** @var \app\wechat\model\Live $liveModel */
        $liveModel = $this->live;
        $liveData = $liveModel->getDataByLiveIdAndUser($this->liveFieldTrait, $userId);
    
        if (empty($liveData)) { // 不存在的直播间
            JsonResult::setMsgArgs(JsonResult::ERR_MSG_NOT_EXISTS, '直播间');
            abort($this->errSysJson(JsonResult::ERR_MSG_NOT_EXISTS)) ;
        }
        
        if (isset($liveData['open_status']) && $liveData['open_status'] == 2){ // 直播间被禁用
            abort($this->errSysJson(JsonResult::ERR_LIVE_DIS));
        }
        
        return $liveData;
    }
    
}