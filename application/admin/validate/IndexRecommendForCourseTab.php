<?php
namespace app\admin\validate;

class IndexRecommendForCourseTab extends \app\common\validate\ValidateBase
{
	protected $rule = [
			'type' => 'require|in:6,7',
			'typeId' => 'require|number',
			'status' => 'in:1,2',
			'sort' => 'require|min:1',
	];
	
	protected $scene = [
			'changeStatus' => ['ids', 'status'],
	];
	
}