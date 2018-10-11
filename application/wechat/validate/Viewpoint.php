<?php
namespace app\wechat\validate;

class Viewpoint extends \app\common\validate\ValidateBase
{
	protected $rule = [
			'title' => 'require|min:4|max:30',
			'lead' => 'max:200',
			'content' => 'require|min:1',
			'level' => 'in:0,1',
			'price' => 'float',
			'status' => 'in:0,1,2',
			'viewpointId' => 'number|>:0',
			'topStatus' => 'in:0,1',
			'receiverType' => 'in:1,2',
			'receiverId' => 'number|>:0',
			'columnId'=>'require',
			'coverUrl'=>'require'
	];
	
	protected $scene = [
			'create' => ['title', 'lead', 'content', 'level', 'price', 'status', 'columnId'],
			'updateViewPointTopStatus' => [
					'viewpointId' => 'require|number|>:0',
					'topStatus' => 'require|in:0,1',
			],
			'setViewpointStatus' => [
					'viewpointId' => 'require|number|>:0',
					'status' => 'require|in:1,2',
			],
			'update' => ['viewpointId' => 'require|number|>:0', 'title', 'lead', 'content', 'level', 'price', 'status'],
			'sendViewpointToLive' => [
					'viewpointId' => 'require|number|>:0',
					'senderId' => 'require|number|>:0',
					'receiverType' => 'require|in:1,2',
					'receiverId' => 'requireIf:receiverType,2|number|>:0',
			],
			'getViewpointRecommend'=>[
					'receiverType' => 'require|in:1,2',
					'receiverId' => 'requireIf:receiverType,2|number|>:0',
			],
	];
	
	protected $message = [
			'receiverId.requireIf' => 'receiverType=2时，:attribute不能为空',
	];
	
}