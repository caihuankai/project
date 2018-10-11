<?php

namespace app\admin\traits;


trait userNav
{
    
    /**
     * 处理头部的用户nav
     *
     * @param      $userId
     * @param      $str
     * @param bool $bool 1为返回userData, 2为返回html， 3为返回没有style的html
     * @return array|string|mixed
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function userNav($userId, $str, $bool = 1)
    {
        /** @var \app\admin\model\User $model */
        $model = model('User');
        
        $userData = getDataByKey($model->getUserColumn((array)$userId, 'user_id, alias, user_level'), $userId, []);
    
        if (empty($userData)) {
            return $bool != 1 ? '' : [];
        }
        
    
        $style = \helper\Html::createElement('style')->text(<<<style
#flow-user-div {
        background: #ccc;
        font-weight: bold;
        position: absolute;
        top : 55px;
        left: 20px;
    }
    .page-container{
        margin-top: 50px;
    }
style
        );
        $text = ($userData['user_level'] == 3 ?'流量主':'会员') . "：{$userData['alias']}（ID：{$userData['user_id']}）";
        $text .= is_callable($str) ? $str($userData) : $str;
        $str = \helper\Html::createElement('div')->id('flow-user-div')->text($text);
        
        switch ($bool){
            case 1:
                $this->addTableOtherHtml($style);
                $this->addTableOtherHtml($str);
                
                return $userData;
                break;
            case 2: // 返回html
                return $style . $str;
                break;
            case 3:
                return $str;
                break;
            
        }

        return $userData;
    }
    
}