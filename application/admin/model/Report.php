<?php

namespace app\admin\model;


use app\common\model\ModelBs;

class Report extends ModelBs
{
    
    
    public $statusHtml = [
        1 => '<span class="c-red">未处理</span>',
        2 => '<span class="c-green">已忽略</span>',
        3 => '<span>已处理</span>',
    ];
    
}