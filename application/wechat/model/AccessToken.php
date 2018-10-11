<?php
namespace app\wechat\model;

use app\common\model\ModelBs;
use think\Exception;

/**
 * 这表只有一条记录
 *
 * @author xiaok
 * @date 2017/06/03
 */
class AccessToken extends ModelBs{
    
    public static $updateBool = true;
    
	//access_token保存表
	public function getAccessToken()
    {
        $token = \WeChat\app::weChatInstance()->access_token->getToken();
        if (empty($token)) {
            $temp = $this->where(['id' => ['>', 0]])->field('id, access_token')->find();
            $token = !empty($temp['access_token']) ? $temp['access_token'] : '';
        }
        
        return $token;
    }
    
    
    /**
     * 更新access_token
     *
     * @param $accessToken
     * @param $expires
     * @return bool
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function upAccessToken($accessToken, $expires)
    {
        if (!self::$updateBool){ // 防止event导致的无限递归
            return true;
        }
        
        $data = $this->where(['id' => ['>', 0]])->field('id')->find();
        $save = [
            'access_token'        => $accessToken,
            'access_expires_time' => strlen($expires) === 10 ? $expires : (time() + $expires - 1500),
        ];
        
        if (!empty($data['id'])) { //
            $save['update_time'] = date('Y-m-d H:i:s');
            $this->update($save, ['id' => $data['id']]);
        } else {
            $this->insert($save);
        }
        
        return true;
    }
}