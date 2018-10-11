<?php

namespace app\wechat\model;



class ThirdLogin extends \app\common\model\ThirdLogin
{
    
    /**
     * 微信自动注册
     * 
     * @param $data
     * @return bool
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function updateInWeChat($data)
    {
        if (empty($data['user_id'])) {
            return false;
        }
        
        
        $bool = $this->where(['user_id' => $data['user_id']])->field('id')->find();
        
        if ($bool){ // 更新
            // 不更新部分字段
            $this->save([
                'open_id' => $data['open_id'],
                'token' => $data['token'],
                'alias' => $data['alias'],
                'update_time' => time(),
            ], ['user_id' => $data['user_id']]);
        }else{ // 插入
            $this->insert($data);
        }

        return true;
    }
    
    
    /**
     * 根据微信的open_id检测是否存在
     *
     * @param $openId
     * @return array|false|\PDOStatement|string|\think\Model
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function checkExistByWeChatOpenId($openId, $field = 'id')
    {
        if (empty($openId)) {
            return [];
        }
        
        return $this->where(['open_id' => $openId, 'type' => 3])->field($field)->find();
    }
    
    
    
    /**
     * 根据union_id检测是否存在
     *
     * @param $unionId
     * @return array|false|\PDOStatement|string|\think\Model
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function checkExistByWeChatUnionId($unionId, $field = 'id')
    {
        if (empty($unionId)) {
            return [];
        }
        
        return $this->where(['union_id' => $unionId])->field($field)->find();
    }
    
}