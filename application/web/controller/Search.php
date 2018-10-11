<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/5/2
 * Time: 16:02
 */

namespace app\web\controller;


use app\admin\model\QiniuGallerys;

class Search extends App
{
    /**
     * 搜索文章
     * @param null $name
     * @return \think\response\Json
     */
    public function Article($search=null,$page=1,$size=10)
    {
        $page <= 1 ? $curPage = 1:$curPage = trim(intval($page));
        $size < 1 ? $pageSize = 1:$pageSize = trim(intval($size));
        $startRow = ($curPage - 1) * $pageSize;
        $model = new \app\web\model\Viewpoint();
        $qiniu = new  QiniuGallerys();
        $Article=trim($search);
        if (empty($Article)){
            return $this->errSysJson('请输入搜索内容');
        }
        $field = 'v.id,v.cover_qiniu_id,v.cover_pc_qiniu_id,v.uid,v.title,v.lead,v.create_time,u.alias';
        $dataList = $model->where('v.status',1)->alias('v')
            ->join('talk_user u','v.uid = u.user_id')
            ->where('v.title|v.lead','like',"%$Article%")
            ->field($field)
            ->limit($startRow,$pageSize)
            ->select();
        if (count($dataList)<1) return $this->errSysJson(['returnCode'=>400],"暂无与{$Article}相关的文章！");
        $result = [];
        foreach ($dataList as $k => $item){
            $result[$k] = $item;
            if ($item['cover_pc_qiniu_id'] == 0) $item['cover_pc_qiniu_id'] = $item['cover_qiniu_id'];
            $result[$k]['coverPic'] = $qiniu->getQiNiuUrl($item['cover_pc_qiniu_id']);
            $validate = intval((strtotime(date('Y-m-d H:i:s')) - strtotime($item['create_time'])) / 60);
            if ( $validate > intval(1440)){
                $result[$k]['create_time'] = date('Y-m-d',strtotime($item['create_time']));
            }else{
                if ($validate > 60){
                    $result[$k]['create_time'] = intval($validate/60)."小时".intval($validate%60)."分钟前";
                }else{
                    $result[$k]['create_time'] = $validate ."分钟前";
                }
            }
            unset($result[$k]['cover_pc_qiniu_id']);
            unset($result[$k]['cover_qiniu_id']);
        }
        return $this->sucSysJson($result);
    }//end
    /**
     * 搜索课程
     * @param null $name
     * @return \think\response\Json
     */
    public function className($search=null,$page=1,$size=10)
    {
        $page <= 1 ? $curPage = 1:$curPage = trim(intval($page));
        $size < 1 ? $pageSize = 1:$pageSize = trim(intval($size));
        $startRow = ($curPage - 1) * $pageSize;
        $model = new \app\web\model\Course();
        $qiniu = new  QiniuGallerys();
        $Article=trim($search);
        if (empty($Article)){
            return $this->errSysJson('请输入搜索内容');
        }
        $field = 'c.id,c.uid,c.pid,c.class_name,c.src_img,c.price,c.type,c.level,c.study_num,c.plan_num,c.virtual_study_num,u.alias,u.head_add,v.video_pic_id,v.video_url_id';
        $dataList = $model->where(['c.status'=>['<>',5],'c.open_status'=>1,'pid'=>0])->alias('c')
            ->where('if(c.type = 1,c.form = 2,c.form = 1)')
            ->join('talk_user u','c.uid = u.user_id')
            ->join('talk_course_video v','c.id = v.course_id','left')
            ->where('c.class_name','like',"%$Article%")
            ->field($field)
            ->limit($startRow,$pageSize)
            ->select();
        if (count($dataList)<1) return $this->errSysJson(['returnCode'=>400],"暂无与{$Article}相关的课程");
        foreach ($dataList as $k=>$item){
            $result[$k] = $item;
            $result[$k]['video_pic_id'] = $qiniu->getQiNiuUrl($item['video_pic_id']);
            $result[$k]['video_url_id'] = $qiniu->getQiNiuUrl($item['video_url_id']);
            $result[$k]['study_num'] = $item['study_num'] + $item['virtual_study_num'];
            $result[$k]['plan_num_total'] = count($model->getCatalog($item['id']));
            $item['pid'] != 0 ? $result[$k]['isSubClass'] = true :$result[$k]['isSubClass']= false;
            unset($result[$k]['virtual_study_num']);
        }
        return $this->sucSysJson($dataList);
    }//end
    /**
     * 搜索课程
     * @param null $name
     * @return \think\response\Json
     */
    public function teachInfo($search=null,$page=1,$size=10)
    {
        $page <= 1 ? $curPage = 1:$curPage = trim(intval($page));
        $size < 1 ? $pageSize = 1:$pageSize = trim(intval($size));
        $startRow = ($curPage - 1) * $pageSize;
        $model = new \app\web\model\User();
        $name=trim($search);
        if (empty($name)){
            return $this->errSysJson('请输入搜索内容');
        }
        $field = 'user_id,alias,head_add,intro';
        $dataList = $model->where(['user_level'=>2])
            ->where('alias','like',"%$name%")
            ->field($field)
            ->limit($startRow,$pageSize)
            ->select();
        if (count($dataList)<1) return $this->errSysJson(['returnCode'=>400],"暂无与{$name}相关的课程");
        return $this->sucSysJson($dataList);
    }//end

}
