<?php

namespace app\admin\validate;


class ForegroundUser extends \app\common\validate\ValidateBase
{
    
    protected $rule = [
        'status' => 'require|in:1,0',
    ];
    
    protected $scene = [
        'changeFreeze' => ['ids', 'status'],
    ];
    
}