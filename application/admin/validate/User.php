<?php

namespace app\admin\validate;


class User extends \app\common\validate\ValidateBase
{
    
    protected $rule = [
        'status' => 'require|in:1,0',
    ];
    
    protected $scene = [
        'changeStatus' => ['ids', 'status'],
    ];
    
}