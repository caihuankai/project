<?php
namespace app\admin\validate;

class Viewpoint extends \app\common\validate\ValidateBase
{
	protected $rule = [
			//'title' => 'require|min:5|max:30',
			'lead' => 'max:200',
			'content' => 'require|min:1',
			'level' => 'in:0,1',
			'price' => 'float',
			'status' => 'in:0,1,2',
			'columnTopStatus' => 'in:0,1',
			'columnId' => 'integer',
	];
	
	protected $scene = [
			'changeStatus' => ['ids', 'status'=>'require|in:1,2'],
			'details' => ['lead', 'content'],
			'add' => ['lead', 'content'],
			'changeColumnTopStatus' => ['ids', 'columnTopStatus', 'columnId'],
	];
	
}