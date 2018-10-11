<?php

namespace app\admin\traits;


trait UserController
{
    
    
    /**
     * 控制检测用户
     *
     * @param $userId
     * @param $field
     * @return mixed
     * @author aozhuochao
     */
    protected function checkUser($userId, $field)
    {
        $userId = intval($userId);
        if (empty($userId)) {
            $this->abortError(\app\common\controller\JsonResult::ERR_USERINFO_NULL);
        }
    
        /** @var \app\admin\model\User $userModel */
        $userModel = model('User');
    
        $userData = getDataByKey($userModel->getUserColumn((array)$userId, $field), $userId, []);
    
        if (empty($userData)) { // 当前用户不存在
            return $this->errSysJson(\app\common\controller\JsonResult::ERR_USERINFO_NULL);
        }
        
        return $userData;
    }
    
}