<?php

namespace app\admin\validate;

use think\Validate;

/**
 * 菜单数据验证
 * Class Menu
 * @package app\admin\validate
 */
class Menu extends Validate
{

    /**
     * 验证规则
     * @var array
     */
    protected $rule = [
        ['name', 'unique:menu', '菜单名已经存在'],
        ['name', 'require', '菜单名不能为空'],
        ['sort', 'require', '排序不能为空'],
    ];

}