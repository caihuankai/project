<?php
namespace app\admin\validate;

class IndexRecommendForStarOwners extends \app\common\validate\ValidateBase
{
	protected $rule = [
			'type' => 'require|in:1,2,3,4,5',
			'typeId' => 'require|number',
			'status' => 'in:1,2',
			'sortaa' => 'require|min:1',
	];
	
	protected $scene = [
			'changeStatus' => ['idsa', 'status'],
	];
	
}