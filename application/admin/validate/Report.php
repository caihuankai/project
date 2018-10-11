<?php

namespace app\admin\validate;


class Report extends \app\common\validate\ValidateBase
{
    
    protected $rule = [
    ];
    
    protected $scene = [
        'changeIgnoreStatus' => ['ids'],
    ];
    
}