<?php

namespace app\wechat\validate;


class Live extends \app\common\validate\ValidateBase
{
    protected $rule = [
        'name' => 'min:1|max:25',
        'contentsData' => 'array',
    ];
    
    protected $scene = [
        'setupSave' => ['name', 'contentsData'],
    ];
}