<?php

namespace app\admin\validate;

use think\Validate;

/**
 * 公众平台数据验证
 * Class Menu
 * @package app\admin\validate
 */
class Platform extends Validate
{

    /**
     * 验证规则
     * @var array
     */
    protected $rule = [
        ['name', 'require', '菜单名不能为空'],
        ['app_id', 'require', 'AppId不能为空'],
        ['app_secret', 'require', 'AppSectet不能为空'],
    ];

}