<?php

namespace app\admin\validate;


class LiveCate extends \app\common\validate\ValidateBase
{
    
    protected $rule = [
        'status' => 'require|in:1,2',
    ];
    
    protected $scene = [
        'delCate' => ['ids'],
        'changeStatus' => ['ids', 'status'],
    ];
    
}