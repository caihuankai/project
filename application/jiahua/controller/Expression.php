<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/4/11
 * Time: 11:08
 */

namespace app\jiahua\controller;


class Expression extends App
{
    protected  $noLoginAction =[
        'getExpressionList'
    ];

    public function getExpressionList()
    {
        $model = new \app\admin\model\Expression();
        $field = 'e.id,e.expression_number,e.name,e.type,e.sort,qi.qiniuImg';
        $result = $model->getExpressionData($field,2,null,2);
        if (!empty($result)){
            return $this->sucSysJson($result);
        }else{
            return $this->errSysJson('暂无表情');
        }
    }
}