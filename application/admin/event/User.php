<?php

namespace app\admin\event;


class User extends EventApp
{
    use \app\admin\traits\ChangeStatusEvent;
    
    public $userIds = []; // 非实例化对象，改为static
    
    
    protected $messageTemplate = "您的账号已被禁用\n您可在大策略公众号回复昵称+解禁，来申请解禁以及了解原因。";
    
    /**
     * Course constructor.
     */
    public function __construct()
    {
        $this->statusValue = 1;
        $this->statusKey = 'freeze';
    }
    
    
    
    public function after_update($model)
    {
        /** @var \app\admin\model\User $model */
        if (!$model->getNumRows()) {
            return;
        }
        
        // 更新成功
        
        $data = $model->handleSaveFuncOfData();
    
        if (isset($data['data']['is_assistant']) && !empty($data['where']['user_id'])) { // 更新助教字段
            if (is_array($data['where']['user_id']) && isset($data['where']['user_id'][1]) && is_array($data['where']['user_id'][1])) { // in设置
                foreach ($data['where']['user_id'][1] as $item) {
                    $model->handleSessionUserDataKeyMap(
                        $item, true
                    );
                }
            }else{
                $model->handleSessionUserDataKeyMap(
                    $data['where']['user_id'], true
                );
            }
        }
    }
    
    
    protected function statusDataFunc()
    {
        $ids = $this->userIds;
        if (empty($ids)) {
            return [];
        }
        
        $result = [];
        // 处理关闭消息推送
        $whereId = ['in', (array)$ids];
        /** @var \app\admin\model\User $model */
        $model = model('User');
        $data = $model->where(['u.user_id' => $whereId, $this->statusKey => 0])->field('tl.open_id')->alias('u')
            ->join('third_login tl', 'tl.user_id = u.user_id')
            ->select();
            
        foreach ($data as $val) {
            $result[$val['open_id']] = new \EasyWeChat\Message\Text(['content' => $this->messageTemplate]);
        }
        
        return $result;
    }
    
    
}