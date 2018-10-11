<?php

namespace app\admin\model;



class ThirdLogin extends \app\common\model\ThirdLogin
{
    
    /**
     * 获取微信关注时间
     *
     * @param array $userId
     * @return array
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function getWeChatRegisterDate(array $userId)
    {
        return $this->where(['user_id' => ['in', $userId], 'type' => 3])->column('register_time', 'user_id');
    }
    
}