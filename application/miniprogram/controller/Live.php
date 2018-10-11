<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/7/4
 * Time: 14:42
 */

namespace app\miniprogram\controller;


use app\admin\service\Redis;

class Live extends App
{
    protected $noLoginAction = [
        'checkPassword',
    ];
    /**
     * 检查直播间密码
     * @param null $liveID
     * @param null $password
     * @param null $device
     * @return \think\response\Json
     */
    public function checkPassword($liveID=null,$password=null)
    {
        if (empty($liveID)) return $this->errSysJson('填写直播间ID!');
        $model = new \app\wechat\model\Live();
        $liveData = $model->where('id',$liveID)->field('id,user_id,password,adapt')->find();
        $userID = $this->getUserId();
        $flag = false;
        $val = base64_encode($liveID.'-'.$userID.'-'.$liveData['password']);
        if (empty($password)) return $this->errSysJson('校验密码不能为空!');
        if ($liveData['password'] == $password){
            $flag =true;
        }
        if ($flag){
            //保存到redis服务器
            Redis::hashSet('LiveCheckPass',$val,$val);
            return $this->sucSysJson(['returnCode'=>4200,'checkStatus'=>true],'验证通过！');
        }else{
            return $this->errSysJson(['returnCode'=>4400,'checkStatus'=>false],'密码验证失败!');
        }
    }
}