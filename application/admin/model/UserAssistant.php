<?php

namespace app\admin\model;


use app\common\model\ModelBs;

class UserAssistant extends ModelBs
{
    use \app\common\traits\MysqlTinyintModel;
    
    
    /**
     * 过滤没有绑定老师的用户
     *
     * @param array $assistantUserIds
     * @return array
     * @author aozhuochao
     */
    public function diffNoAssistant(array $assistantUserIds)
    {
        if (empty($assistantUserIds)) {
            return [];
        }
        
        return $this->where(['user_id' => ['in', $assistantUserIds]])->group('user_id')->fetchClass('\CollectionBase')
            ->field('count(user_id) num, user_id')->having('num > 0')->select()->diffData($assistantUserIds, 'user_id');
    }
    
}