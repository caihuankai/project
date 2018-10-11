<?php

namespace app\admin\traits;

/**
 * yeMan产品的状态改变
 *
 * @package app\admin\traits
 */
trait Status
{
    protected $disable = ['value' => 2, 'title' => '禁用'];
    
    
    protected $able = ['value' => 1, 'title' => '启用'];
    
    
    /**
     * 状态在 操作栏的html
     *
     * @param  int|null $status
     * @return string|array
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function statusActionHtml($status)
    {
        $arr = [
            $this->able['value'] => "<span>{$this->disable['title']}</span>",
            $this->disable['value'] => "<span class='c-red'>{$this->able['title']}</span>",
        ];
    
        return $status === null ? $arr : getDataByKey($arr, $status, $this->able['value']);
    }
    
    
    /**
     * 状态在 状态栏的html
     *
     * @param  int|null $status
     * @return string|array
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function statusColumnHtml($status)
    {
        $arr = [
            $this->able['value'] => "<span>{$this->able['title']}</span>",
            $this->disable['value'] => "<span class='c-red'>{$this->disable['title']}</span>",
        ];
    
        return $status === null ? $arr : getDataByKey($arr, $status, $this->able['value']);
    }
    
    
    /**
     * 设置数据库状态值
     *
     * @param $able
     * @param $disable
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function setStatusValue($able, $disable)
    {
        $this->able['value'] = $able;
        $this->disable['value'] = $disable;
        
        return $this;
    }
    
    
    /**
     * 设置数据库状态值对应的文案
     *
     * @param $able
     * @param $disable
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function setStatusTitle($able, $disable)
    {
        $this->able['title'] = $able;
        $this->disable['title'] = $disable;
        
        return $this;
    }
    
    
    /**
     * 处理data-status，取反
     *
     * @param $status
     * @return mixed
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function getStatusHtmlDataAttr($status)
    {
        $arr = [$this->able['value'], $this->disable['value']];
        
        $key = array_search($status, $arr);
        
        return getDataByKey($arr, intval(!$key), 1);
    }
    
    
    /**
     * 搜索状态
     *
     * @param array|string $header
     * @return array
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function searchStatusArr($header = '')
    {
        $arr = [];
        if (is_array($header)) {
            $arr[$header['key']] = $header['value'];
        }else if (!empty($header)){
            $arr[0] = $header;
        }
        
        $arr[$this->able['value']] = $this->able['title'];
        $arr[$this->disable['value']] = $this->disable['title'];
        
        return $arr;
    }
    
}