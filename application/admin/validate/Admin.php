<?php

namespace app\admin\validate;

use think\Validate;

/**
 * 用户数据验证
 * Class Admin
 * @package app\admin\validate
 */
class Admin extends Validate
{
    /**
     * 验证规则
     * @var array
     */
    protected $rule = [
        ['username', 'unique:admin', '用户名已经存在'],
        ['username', 'require', '用户名不能为空'],
        ['email', 'unique:admin', '邮箱已经存在'],
        ['email', 'require', '邮箱不能为空'],
    ];

}