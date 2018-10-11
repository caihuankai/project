<?php

namespace app\admin\model;


class Course extends \app\common\model\Course
{

    protected $levelText = [
        0 => '免费公开',
        1 => '加密',
        2 => '收费',
    ];
    
    protected $typeText = [
    		1=>"专题课程",
    		2=>"系列课程",
    		3=>"特训课"
    ];


    /**
     * 获取直播类型的文案
     *
     * @return array
     */
    public function getLevelText($level)
    {
        return !is_null($level) ? getDataByKey($this->levelText, $level, 0) : $this->levelText;
    }
    
    /**
     * 获取课程类型
     * @param unknown $type
     * @return string[]|mixed|array|\ArrayAccess
     */
    public function getTypeText($type)
    {
    	return !is_null($type) ? getDataByKey($this->typeText, $type, 1) : $this->typeText;
    }


    /**
     * @inheritdoc
     */
    public function closeStatus($ids, $status = 2, $operateId = 0)
    {
        if (empty($operateId)) {
            $operateId = \app\admin\model\Admin::getCurrentAdminId();
        }

        return parent::closeStatus($ids, $status, $operateId);
    }

    /**
     * 获取课程信息
     * @name  getCourseInfo
     * @param $courseId
     * @param string $field
     * @return array|false|\PDOStatement|string|\think\Model
     * @author Lizhijian
     */
    public function getCourseInfo($courseId, $field = '*')
    {
        return $this->where('id', $courseId)->field($field)->find();
    }

}