<?php

namespace app\admin\model;


use app\common\model\ModelBs;

class CourseVideo extends ModelBs
{
    
    public function getRecord($courseId)
    {
        if (empty($courseId)) {
            return [];
        }
    
        $data = $this->where(['course_id' => $courseId])->field('video_pic_id, video_url_id')->find();
    
        return !empty($data) ? $data : [];
    }
    
    
    /**
     * 保存并插入数据
     *
     * @param $courseId
     * @param $videoPicId
     * @param $videoUrlId
     * @return bool|int|string
     * @author aozhuochao
     */
    public function saveRecord($courseId, $videoPicId, $videoUrlId)
    {
        if (empty($courseId)) {
            return false;
        }
        
        $data = $this->where(['course_id' => $courseId])->field('id')->find();
        $save = [
            'video_pic_id' => $videoPicId,
            'video_url_id' => $videoUrlId,
        ];
    
        if (empty($data)) { // 插入
            $data['id'] = $this->insertGetId(array_merge($save, [
                'course_id' => $courseId,
            ]));
        }else{
            $this->update($save, ['course_id' => $courseId]);
        }
        
        return $data['id'];
    }

}