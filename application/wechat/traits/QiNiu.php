<?php

namespace app\wechat\traits;

/**
 * 用于talk_qiniu_gallerys表
 *
 * @package app\wechat\traits
 */
trait QiNiu
{
    
    
    /**
     * 获取七牛的微信图片地址
     *
     * @param        $src
     * @param        $defaultUrl
     * @param string $width
     * @param string $height
     * @return string
     * @author aozhuochao
     */
    public function getImgSrc($src, $defaultUrl, $width = '', $height = '')
    {
        if (empty($src)) {
            return is_string($defaultUrl) ? $defaultUrl : (is_callable($defaultUrl) ? $defaultUrl() : $defaultUrl);
        }else{
            return \Qiniu::instance()->getWeChatImg($src, $width, $height);
        }
    }
    
    
    /**
     * 获取系列课的图片地址
     *
     * @param $src
     * @return string
     * @author aozhuochao
     */
    public function getSeriesCourseImgSrc($src)
    {
        return $this->getImgSrc($src, function (){
            return \helper\UrlSys::handleSeriesImg();
        }, 750, 216);
    }
    
}