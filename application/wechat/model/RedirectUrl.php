<?php

namespace app\wechat\model;


class RedirectUrl extends \app\common\model\RedirectUrl
{
    

    
    
    
    /**
     * 获取优课推荐  首页链接
     *
     * @return string
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public static function getCourseIndexUrl()
    {
        return self::urlFunc('/#/recommend');
    }
    
    
    /**
     * 获取首页链接
     *
     * @return string
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public static function getIndexUrl()
    {
        return self::urlFunc('/#/index/0');
    }
    
    
    
    /**
     * 获取流量主推送链接
     *
     * @param $userId
     * @return string
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public static function getFlowUserUrl($userId)
    {
        return self::urlFunc('/#/shareSupport/' . $userId);
    }
    
    
    /**
     * 我的购买记录
     *
     * @return string
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public static function getBuyRecordUrl()
    {
        return self::urlFunc('/#/personalCenter/buyrecord/0');
    }
    
    
    /**
     * 菜单的我的邀请卡
     *
     * @return string
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public static function getMenuInviteUserUrl()
    {
        return self::urlFunc('/#/invitefriend');
    }
    
    
    /**
     * 菜单的  申请流量主
     *
     * @return string
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public static function getMenuApplyFlowUserUrl()
    {
        return self::urlFunc('/#/personalCenter/createLive/1');
    }
    
    
    

    
    
}