<?php

namespace app\wechat\validate;


class Index extends \app\common\validate\ValidateBase
{
    protected $rule = [
        'type' => 'in:1,2',
        'lastId' => 'number',
    ];
    
    protected $scene = [
        'courseList' => ['type', 'lastId', 'page'],
    	'getIndexRecommendForCourseTab'=>['type'=>'require|in:6,7']
    ];
}