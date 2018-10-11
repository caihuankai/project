<?php

namespace app\admin\traits;

/**
 * Class Course
 *
 * @property \think\Request request
 * @package app\admin\traits
 */
trait Course
{
    
    /**
     * 根据type处理课程列表的购买和参与搜索
     *
     * @param \app\admin\model\Course $model
     * @return \app\admin\model\Course
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function courseListHandleType($model)
    {
        $type = $this->request->param('type/i', 0);
        $userId = $this->request->param('userId/i', 0);
    
        if (!empty($type) && !empty($userId)) { // 1为购买课程数，2为参与课程数
            $where = [];
            
            switch ($type){
                case 1: // 当前用户的课程
                    $where['c.uid'] = $userId;
                    break;
                case 2: // 当前用户的课程
                    $where['po.user_id'] = $userId;
                    $model->join('pay_order po', 'po.class_id = c.id and po.type = 1 and po.state in (1,3,5)');
                    break;
                case 3: // 用户参与课程
                    $where['hr.userId'] = $userId;
                    $model->join('hit_record hr', 'hr.targetId = c.id and hr.hitRecordType = 1');
                    break;
                case 4: // 用户推荐的课程
                    $where['rl.user_id'] = $userId;
                    $model->join('recommend_log rl', 'rl.type = 1 and rl.target_id = c.id');
                    break;
                default:
                    $where = [];
            }
            $model->where($where);
        }
        
        return $model;
    }
    
}