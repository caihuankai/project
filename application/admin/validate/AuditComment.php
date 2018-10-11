<?php

namespace app\admin\validate;


class AuditComment extends \app\common\validate\ValidateBase
{
    
    protected $rule = [
        'status' => 'require|in:1,2',
    ];
    
    protected $scene = [
        'changeStatus' => ['ids', 'status'],
    ];
    
}