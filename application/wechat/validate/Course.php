<?php

namespace app\wechat\validate;


use app\common\controller\JsonResult;

class Course extends \app\common\validate\ValidateBase
{
    protected $rule = [
        'name' => 'require|noEmoJi|max:25',
        'cate' => 'require|number|>:0',
        'level' => 'in:0,1,2',
        'password' => 'max:4|alphaNum',
        'price' => 'float',
        'courseId' => 'require|number|>:0',
        'type' => 'require|number|>:0',
    	'receiverType' => 'in:1,2',
    	'receiverId' => 'number|>:0',
    ];
    
    protected $scene = [
        'create' => ['name', 'level', 'password', 'price'],
        'changeMyCourseByType' => ['courseId', 'type'],
    	'getCourseRecommend'=>[
    			'receiverType' => 'require|in:1,2',
    			'receiverId' => 'requireIf:receiverType,2|number|>:0',
    	],
    ];
    
    
    protected $message = [
        'minNowDate'   => JsonResult::ERR_NOT_MIN_NOW,
    	'receiverId.requireIf' => 'receiverType=2时，:attribute不能为空',
    ];
    
    
    protected $attributeMeanMap = [
        'name' => '课程名称',
    ];
}