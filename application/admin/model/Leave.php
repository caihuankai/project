<?php

namespace app\admin\model;

class Leave extends \app\common\model\Leave
{
    public function closeStatus($ids, $status = 2, $operateId = 0)
    {
        if (empty($operateId)) {
            $operateId = \app\admin\model\Admin::getCurrentAdminId();
        }
        return parent::closeStatus($ids, $status, $operateId);
    }
}