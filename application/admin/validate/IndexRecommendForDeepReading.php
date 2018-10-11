<?php
namespace app\admin\validate;

class IndexRecommendForDeepReading extends \app\common\validate\ValidateBase
{
	protected $rule = [
			'type' => 'require|in:1,2,3,4,5',
			'typeId' => 'require|number',
			'status' => 'in:1,2',
			'topStatus' => 'in:0,1',
			'sort' => 'require|min:1',
	];
	
	protected $scene = [
			'changeStatus' => ['ids', 'status'],
			'changeTopStatus' => ['ids', 'topStatus'],
	];
	
}