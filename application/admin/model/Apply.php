<?php

namespace app\admin\model;


use app\common\model\ModelBs;

class Apply extends ModelBs
{
    use \app\common\traits\MysqlTinyintModel;
    
    
    protected static $mysqlTinyintMap = [
        'status' => [
            1 => [
                'key' => 'check',
                'title' => '待审核',
            ],
            2 => [
                'key' => 'able',
                'title' => '已通过',
                'changeTinyint' => true, // 当前状态可被请求  @see \app\admin\traits\changeTinyintController::changeTinyint
                'changeTinyintTitle' => '通过', // @see \app\admin\traits\AdminTableToolbar::addChangeTinyintToolbarBtn
            ],
            3 => [
                'key' => 'disable',
                'title' => '已拒绝',
                'changeTinyint' => true,
                'changeTinyintTitle' => '拒绝',
            ],
        ],
        
        'type' => [
            1 => [ // 流量主
                'key' => 'flow',
                'typeIdIsUserId' => true,
            ],
            2 => [ // 空间
                'key' => 'live',
                'typeIdIsUserId' => true,
            ],
        ],
    ];
    
    
    
    /**
     * 获取状态文案
     *
     * @param $val
     * @return string
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function getStatusText($val)
    {
        return $this->getMysqlTinyint('status')->get($val);
    }
    
    
    /**
     * 获取状态列表
     *
     * @return array
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function getStatusList()
    {
        return $this->getMysqlTinyint('status')->getList();
    }
    
}