<?php

namespace app\wechat\controller;

use app\wechat\model\ThirdLogin as MThirdLogin;

class UserPhone extends App
{
    use \app\wechat\traits\Verify,
        \app\wechat\traits\Common;
    
    
    /**
     * 绑定用户手机号，根据产品想法用在各种业务上
     *
     * @param $type
     * @return \think\response\Json
     * @author aozhuochao
     */
    public function binding($type)
    {
        $type = intval($type);
        $this->checkVerifyByType($type);
        $phone = $this->request->param('phone', '');
    
        /** @var \app\wechat\model\UserPhone $model */
        $model = $this->getCurrentModel();
        $typeMapTinyint = $model->getMysqlTinyint('binding_type_map');
        $typeTinyint = $model->getMysqlTinyint('type');
        
        $saveType = $typeMapTinyint->get($type, '', \helper\Tinyint::VALUE);
        $userId = $this->getUserId();
    
        if (!$typeTinyint->existsValue($saveType)) { // 检测type
            return $this->errSysJson(\app\common\controller\JsonResult::ERR_PARAMETER);
        }
    
        if ($model->checkBinding($phone, $saveType, $userId)) {
            return $this->errSysJson('该手机号被绑定过');
        }
        
        $model->insert([
            'user_id' =>$userId,
            'type' => $saveType,
            'phone' => $phone,
        ]);
        
        //为微信账号关联上手机账号信息
        $thirdLoginModel = new MThirdLogin();
        $userId = $this->getUserId();
        $thirdLoginInfo = $thirdLoginModel->where('login_tel', $phone)->find();
        if (empty($thirdLoginInfo)) {
        	$thirdLoginModel->update(['login_tel'=>$phone], ['user_id' => $userId]);
        }
        
        $this->user->handleSessionUserDataKeyMap($userId, true);
        
        return $this->sucSysJson(1);
    }
    
}