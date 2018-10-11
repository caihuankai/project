<?php

namespace app\admin\model;

class CommentAudi extends \app\common\model\CommentAudi
{
    public function closeStatus($ids, $status = 2, $operateId = 0)
    {
        if (empty($operateId)) {
            $operateId = \app\admin\model\Admin::getCurrentAdminId();
        }
        return parent::closeStatus($ids, $status, $operateId);
    }
}