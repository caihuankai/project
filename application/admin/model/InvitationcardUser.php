<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/2/9
 * Time: 9:38
 */

namespace app\admin\model;


class InvitationcardUser extends \app\common\model\ModelBs
{
    
    
    /**
     * 判断用户是否为嘉宾
     *
     * @param $userId
     * @return bool
     * @author aozhuochao
     */
    public function ifHonoredGuest($userId)
    {
        if (empty($userId)) {
            return false;
        }
        
        return !!$this->where(['user_id' => $userId, 'type' => 2])->find();
    }
    
}