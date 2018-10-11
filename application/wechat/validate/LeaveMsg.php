<?php

namespace app\wechat\validate;

/**
 * 留言验证类
 * Class LeaveMsg
 * @package app\wechat\validate
 * Fashion:
 */
class LeaveMsg extends \app\common\validate\ValidateBase
{
    protected $rule = [
        'type' => 'in:1,2',
        'id' => 'require',
        'leaveId' => 'require',
        'userId' => 'require',
        'groupid' => 'require',
        'content' => 'require',
        'teacherId' => 'require',
    ];

    protected $message = [
        'type.require' => '必须提供留言列表类型(type)',
        'id.require' => '必须提供课程ID OR 观点ID(id)',
        'userId.require' => '必须提供用户ID(userId)',
        'leaveId.require' => '必须提供留言ID(leaveId)',
    ];

    public $scene = [
        'getLeaveMsgListByType' => ['type', 'id'],
        'addLeaveMsg' => ['userId', 'type', 'id', 'content', 'teacherId'],
        'editLeaveMsg' => ['leaveId', 'content', 'teacherId'],
        'delLeaveMsg' => ['leaveId'],
    ];
}