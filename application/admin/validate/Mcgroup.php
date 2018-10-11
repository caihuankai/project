<?php

namespace app\admin\validate;

use think\Validate;

/**
 * 群数据验证
 * Class Menu
 * @package app\admin\validate
 */
class Mcgroup extends Validate
{
    /**
     * 验证规则
     * @var array
     */
    protected $rule = [
        'name'    => 'require', // 群名
        'status'  => 'require|number|between:0,1',// 状态
    ];

    protected $message = [
        'status.number'   => '年龄必须是数字',
        'status.between'  => '年龄必须在1~120之间',
    ];

}