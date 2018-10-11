<?php

namespace app\wechat\model;


use app\common\model\ModelBs;

class UserJoin extends ModelBs
{
    public function joinClass($user_id,$id){
    	$where['user_id'] = $user_id;
        $where['course_id'] = $id;
        $is_exist = $this->where($where)->find();
        if(empty($is_exist)){
            $this->insert($where);
        }
    }
    
}