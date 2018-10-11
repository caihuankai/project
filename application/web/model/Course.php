<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/5/2
 * Time: 16:05
 */

namespace app\web\model;


use app\common\model\ModelBs;

class Course extends ModelBs
{
    /**
     * 获取课程信息
     * @param $courseId
     * @param null $user_id
     * @return array|false|\PDOStatement|string|\think\Model
     */
        public function getCourseInfo($courseId,$user_id = null){
        $data = $this->alias('a')
            ->field('a.id,a.uid,a.live_id,a.class_name,a.price,a.level,a.teacher_name,a.lecturers,a.introduction_code_id,
		a.img,a.src_img,a.begin_time,a.invite_code,a.brief,a.preview,a.review,a.tags,a.status,a.open_status,a.detail_status,a.study_num,a.virtual_study_num,a.password,a.pid,
		a.type,a.plan_num,a.form,a.begin_enroll_time,a.end_enroll_time,
		l.name, l.focus_num,l.open_status as live_open_status,v.video_pic_id,v.video_url_id,
		l.img as live_img,c.name as cate_name,u.freeze,u.alias,u.intro,l.user_id as live_user_id,u.alias,u.head_add,q.qiniuKey as video_pic,a.virtual_num,a.online_num,a.origin_price,l.popular')
            ->join('live l','l.id = a.live_id','left')
            ->join('live_cate c','a.cate_id = c.id','left')
            ->join('user u','u.user_id = a.uid','left')
            ->join('course_video v','v.course_id ='.$courseId,'left')
            ->join('talk_qiniu_gallerys q','q.id = v.video_pic_id','left')
            ->where('a.id',$courseId)
            ->where('a.status','<>',5)
            ->find();
        return $data;
    }//end

    /**
     * 获取课程相关话题
     * @param $live_id
     * @param $id
     * @return array|false|\PDOStatement|string|\think\Collection
     */
    public function RelevantCourse($live_id,$id){
        $data = $this->alias('c')->field('c.id,c.live_id,c.class_name,c.src_img,c.study_num,c.virtual_study_num,c.price,c.begin_time,c.level,c.form,c.type as class_type,c.plan_num,u.head_add,u.alias,(select count(*) from talk_course ca where ca.pid = c.id and ca.status <> 5 and ca.open_status = 1) as update_num')
            ->join('user u','u.user_id = c.uid')
            ->where('c.live_id',$live_id)
            ->where('c.status <> 5')
            ->where('c.open_status = 1')
            ->where('c.pid = 0')
            ->where('c.id <>'.$id)
            ->where('c.type', '<>', 3)//不取特训班课程
            ->order('c.create_time','DESC')
            ->limit(10)
            ->select();
        if(!empty($data)){
            foreach ($data as $k => $v) {
                $v['src_img'] = \helper\UrlSys::handleIndexImg($v['src_img']);
                $v['begin_time'] = substr($v['begin_time'],0,-3);
                $v['price'] = floatval($v['price']);
                $v['study_num'] = intval($v['study_num']) + intval($v['virtual_study_num']);
                unset($v['virtual_study_num']);
            }
            return $data;
        }else{
            return array();
        }
    }

    public function getCatalog($pid)
    {
        $dataList = $this->where('status','<>',5)
            ->where(['open_status'=>1,'pid'=>$pid])
            ->field('class_name,uid,id,study_num,virtual_study_num,pid')->select();
        if (count($dataList)<1) return array();
        foreach ($dataList as $k =>$item){
            $item['study_num'] = intval($item['study_num']) + intval($item['virtual_study_num']);
            unset($item['virtual_study_num']);
        }
        return $dataList;
    }

}