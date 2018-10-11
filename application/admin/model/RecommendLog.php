<?php

namespace app\admin\model;



class RecommendLog extends \app\common\model\RecommendLog
{
    
    
    /**
     * 根据用户id统计推荐次数
     *
     * @param $userId
     * @param int $type 1：课程；2：观点
     * @return int|mixed
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function countNumByUserId($userId, $type)
    {
        $this->alias('rl');
        if ($type == 1) {
        	//课程已删除的不统计
        	$this->join('talk_course c', 'c.id = rl.target_id')->where('c.status', '<>', 5);
        }elseif ($type == 2) {
        	//观点已删除的不统计
        	$this->join('talk_viewpoint v', 'v.id = rl.target_id')->where('v.status', '=', 1);
        }
        $data = $this->where(['rl.user_id' => $userId, 'rl.type' => $type])->field('count(rl.target_id) num')->find();
    
        return !empty($data['num']) ? $data['num'] : 0;
    }
    

    
    
    
    /**
     * 根据用户id统计推荐课程的进入数
     *
     * @param $userId
     * @param $type
     * @return int|mixed
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function countInNumByUserId($userId, $type)
    {
        $targetIds = $this->getRecommendByUserId($userId, $type);
        if (empty($targetIds)){
            return 0;
        }
    
        /** @var \app\common\model\HitRecord $hitModel */
        $hitModel = model('common/HitRecord');
        $data = $hitModel->where(['hitRecordType' => $type, 'targetId' => ['in', $targetIds]])->field('count(hitRecordId) num')->find();

        return !empty($data['num']) ? $data['num'] : 0;
    }
    
    
    
    /**
     * 根据用户id统计推荐课程的购买
     *
     * @param $userId
     * @param $type
     * @return int|mixed
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function countBuyNumByUserId($userId, $type, $field = 'count(id) num')
    {
        $targetIds = $this->getRecommendByUserId($userId, $type);
        if (empty($targetIds)){
            return 0;
        }
    
        /** @var \app\admin\model\PayOrder $hitModel */
        $hitModel = model('PayOrder');
        $data = $hitModel->where(['type' => $type, 'class_id' => ['in', $targetIds], 'state' => 1])->field($field)->find();

        return !empty($data['num']) ? $data['num'] : 0;
    }
    
    
}