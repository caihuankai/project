<?php

namespace app\admin\controller;


class Config extends App
{
    
    /**
     * 使用教程页面
     *
     * @return mixed|\think\response\Json
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function helperUrl()
    {
        $model = new \app\common\model\Config();
        $key = \app\common\model\Config::HELPER_URL;
        
        if ($this->request->isPost()){ // 保存
            $this->validateByName('common.url');
            $url = $this->request->param('url', '');
            if (empty($url)) {
                return $this->errSysJson('地址不能为空');
            }
            
            $model->setConfig($key, $url);
            
            return $this->sucSysJson(1);
        }else{ // 显示页面
            $val = $model->getConfig($key);
            
            $this->assign('helperUrl', $val);
            $this->assign('addMenuUrl', url('WeChat/addMenu', '', false, \helper\UrlSys::getWxHost()));
            return $this->fetch();
        }
    }
    
}