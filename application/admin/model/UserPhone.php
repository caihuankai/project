<?php

namespace app\admin\model;


class UserPhone extends \app\common\model\ModelBs
{
    
    
    /**
     * 保存绑定用户的手机号
     *
     * @param $userId
     * @param $type
     * @param $phone
     * @return bool
     * @author aozhuochao
     */
    public function savePhone($userId, $type, $phone)
    {
        if (empty($userId) || empty($type)) {
            return false;
        }
    
    
        $saveData = [
            'user_id' => $userId,
            'type' => $type,
            'phone' => $phone,
        ];
        
        $this->insert($saveData, true);
        
        return true;
    }
    
}