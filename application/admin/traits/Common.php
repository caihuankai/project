<?php

namespace app\admin\traits;



trait Common
{
    use \app\common\traits\Common;
  
    /**
     * 红色span
     *
     * @param $data
     * @return string
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function redSpan($data)
    {
        return "<span class='c-red'>{$data}</span>";
    }
    
    /**
     * 蓝色span
     *
     * @param $data
     * @return string
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function blueSpan($data)
    {
    	return "<span class='c-blue'>{$data}</span>";
    }
    
    
    /**
     * 获取一个课程数据并自动抛出
     *
     * @param $courseId
     * @param $field
     * @return array|false|\PDOStatement|string|\think\Model
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function getCourseResultAutoThrow($courseId, $field)
    {
        $courseId = intval($courseId);
        /** @var \app\admin\model\Course $model */
        $model = model('Course');
        $data = $model->where(['id' => ['eq', $courseId]])->field($field)->find();
        
        if (empty($data)){
            $this->abortError(\app\common\controller\JsonResult::ERR_COURSE_NOT_EXIST);
        }
        
        if (isset($data['status'])){
            if ($data['status'] == 5){
                $this->abortError(\app\common\controller\JsonResult::ERR_COURSE_DELETE);
            }
        }
        
        if (isset($data['open_status']) && $data['open_status'] == 2){
            $this->abortError(\app\common\controller\JsonResult::ERR_COURSE_DISABLE);
        }
        
        return $data;
    }
    
}