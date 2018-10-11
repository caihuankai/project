<?php

namespace app\wechat\controller;


class CronTask extends App
{
    
    
    /**
     * 更新ThirdLogin表的unionId
     * 用于处理open_id转union_id
     *
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function updateUnionId()
    {
        $model = new \app\wechat\model\ThirdLogin();
        
        $data = $model->where(['union_id' => '', 'type' => 3])->select();
        $app = \WeChat\app::instance();
        $save = [];
        
        foreach ($data as $datum) {
            $userData = $app->user->get($datum['open_id']);
            $save[] = [
                'id' => $datum['id'],
                'union_id' => $userData['unionid'],
            ];
        }
        
        $model->saveAll($save);
        
        dump($save);
    }
    
    
    /**
     * 微信公众号v1.3版本，更新邀请人
     *
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function updateInviteUserId()
    {
        $model = new \app\wechat\model\ThirdLogin();
        $data = $model->where(['tl.open_id' => ['<>', ''], 'u.invite_user_id' => ['eq', 0]])->alias('tl')
            ->join('user u', 'u.user_id = tl.user_id')->field('tl.open_id, u.user_id')
            ->fetchClass('\CollectionBase')->select()->column('open_id', 'user_id');
        
        $fansModel = new \app\common\model\Fans();
        $fansData = $fansModel->where(['open_id' => ['in', array_values($data)]])->column('invita_userid', 'open_id');
    
        foreach ($data as $userId => $openId) {
            if (!empty($fansData[$openId])) {
                $this->user->update(['invite_user_id' => $fansData[$openId]], ['user_id' => $userId, 'invite_user_id' => ['=', 0]]);
            }
        }
        
        dump('更新完毕');
    }
    
    
}