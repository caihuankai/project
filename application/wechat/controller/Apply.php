<?php

namespace app\wechat\controller;


class Apply extends App
{
    use \app\wechat\traits\Verify;
    
    
    /**
     * 直播间申请和流量主申请
     *
     * @param     $phone
     * @param     $code
     * @param     $content
     * @param int $type 1为流量主申请，2为直播间申请
     * @return string|\think\response\Json
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function create($phone, $code, $content, $type = 1)
    {
        $this->filterRepeatPost();
        if (!WIsPhone($phone) || empty($code) || !in_array($type, [1, 2]) || !$this->request->isPost()){
            return $this->errSysJson('申请错误');
        }
        
        $time = time();
        $sessionCode = session($this->getVerifyTypeKey($type, $phone));
        if(!$sessionCode || $time > floatval(session($this->getVerifyTypeTimeKey($type, $phone)))+10*60){
            return $this->errSysJson('请输入正确的验证码！');
        }
        
        if ($this->getUserLevel() != 1){
            return $this->errSysJson('当前身份非学生身份');
        }
        
        $userId = $this->getUserId();
        
    
        if ($sessionCode == $code) {
            

            $model = new \app\wechat\model\Apply();
            $applyData = $model->where(['type_id' => $userId, 'type' => ['in', [1, 2]]])->field('id, type, status')->find();
            if (empty($applyData)) { // 插入
                $model->insert([
                    'type' => $type,
                    'type_id' => $userId,
                    'status' => 1,
                    'phone' => $phone,
                    'content' => $content,
                ]);
            }else if($applyData['status'] == 3){ // 已拒绝，则允许继续申请
                $model->update([
                    'type' => $type,
                    'status' => 1,
                    'phone' => $phone,
                    'content' => $content,
                    'update_time' => date('Y-m-d H:i:s'),
                    'remark' => '', // 产品说每次都清空备注
                ], ['id' => $applyData['id']]);
            }else{
                return $this->errSysJson('重复申请');
            }

            return $this->sucSysJson(1);
        }else{
            return $this->errSysJson('请输入正确的验证码!');
        }
    }
    
}