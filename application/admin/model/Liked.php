<?php

namespace app\admin\model;


use app\common\model\ModelBs;

class Liked extends ModelBs
{
    
    /**
     * 统计一个直播间的点赞数
     *
     * @param array $liveIds
     * @return array
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function countByLiveIds(array $liveIds)
    {
        if (empty($liveIds)) {
            return [];
        }
        
        return $this->where(['live_id' => ['in', $liveIds]])->field('sum(number) num, live_id')->group('live_id')
            ->fetchClass('\CollectionBase')->select()->column('num', 'live_id');
    }
    
}