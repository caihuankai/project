<?php

namespace app\wechat\traits;


trait HelperCommon
{
    
    
    
    /**
     * 处理大于9999+
     *
     * @param $num
     * @return string
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function handlePopularityNum($num)
    {
        return $num > 9999 ? '9999+' : $num;
    }
    
    
    /**
     * 处理显示的时间格式
     *
     * @param     $date
     * @param int $type
     * @return string
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function disDate($date, $type = 1)
    {
        if (empty($date)) {
            return '';
        }
        
        $text = '';
        $date = is_numeric($date)?'@' . $date:$date;
        $dateTime = new \DateTime($date);
        
        
        if ($type === 1){
            $text = $dateTime->format('m-d H:i');
        }else if ($type === 2){
            $text = $dateTime->format('Y-m-d H:i');
        }
        
        return $text;
    }
    
    
    
    
    
    
    /**
     * 处理价格显示
     *
     * @param $price
     * @return string
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function disPrice($price, $default = '')
    {
        return $price > 0 ? number_format($price, 2, '.', '') : $default;
    }
    
}