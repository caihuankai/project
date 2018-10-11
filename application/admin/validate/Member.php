<?php

namespace app\admin\validate;


use app\common\controller\JsonResult;
use app\common\validate\ValidateBase;

class Member extends ValidateBase
{
    protected $rule = [
        'tel'              => 'require', // 手机号
        'alias'            => 'require|max:30', // 昵称
        'grade'            => 'require', // 等级
        'gradeValidate'    => 'requireCallback:\app\admin\validate\Member::gradeValidate', // 等级，检测范围
        'passwordValidate' => 'requireCallback:\app\admin\validate\Member::passwordValidate', // 密码
        'name'             => 'max:30', // 姓名
        'reason'           => 'require|max:250', // 操作原因
    ];
    
    protected $scene = [
        'edit' => ['userId', 'alias', 'grade', 'gradeValidate',
            'passwordValidate', 'name', 'gender', 'reason'],
        'add' => ['tel.require', 'telExistsValidate', 'alias', 'grade', 'gradeValidate', 'passwordValidate', 'name', 'gender', 'reason'],
    ];
    
    
    protected $message = [
        'tel.requireCallback' => '手机号必须是数字',
        'gradeValidate'    => '参数错误',
        'passwordValidate' => '密码格式不正确(限6-16位)',
        'genderValidate'   => '参数错误',
    ];
    
    
    static public function gradeValidate($value, $data)
    {
        /** @var \app\common\model\User $model */
        $model = model('common/User');
        
        return isset($data['grade']) && array_key_exists($data['grade'], $model->getLiveGradeList()) ? '' : 'gradeValidate';
    }
    
    
    static public function passwordValidate($value, $data)
    {
        return isset($data['password']) && check_password($data['password']) ? '' : 'passwordValidate';
    }
    
    
    
}