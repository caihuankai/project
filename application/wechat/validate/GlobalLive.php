<?php
namespace app\wechat\validate;

class GlobalLive extends \app\common\validate\ValidateBase
{
	protected $rule = [
			'classification'=>'require|in:专场,实盘',
			'cateName'=>'require|max:4',
			'className'=>'require|max:12',
			'startTime'=>'require|date',
			'endTime'=>'require|date',
	];
	
	protected $scene = [
			'create' => ['classification', 'cateName', 'className', 'startTime', 'endTime'],
			'edit' => ['id'=>'require|number|>:0', 'classification', 'cateName', 'className', 'startTime', 'endTime'],
	];
			
}