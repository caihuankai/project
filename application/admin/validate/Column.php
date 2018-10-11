<?php
namespace app\admin\validate;

class Column extends \app\common\validate\ValidateBase
{
	protected $rule = [
			'status' => 'in:1,2',
			'recommendStatus' => 'in:1,2',
			'sort' => 'require|min:1',
	];
	
	protected $scene = [
			'changeStatus' => ['ids', 'status'],
	];
	
}