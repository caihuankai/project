<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/5/2
 * Time: 15:27
 */

namespace app\web\controller;

use app\common\model\QiniuGallerys;
use app\wechat\model\Course;
use app\wechat\model\LiveFocus;
use app\common\controller\JsonResult;
use app\wechat\model\PayOrder;
use app\common\model\LiveImg;
use app\common\model\InvitationcardUser;
use app\wechat\model\ThirdLogin;
use app\wechat\model\UserJoin;
use app\wechat\model\UserAssistant;
use think\Session;

class CourseManage extends App
{
    /**
     * 课程或系列课的详情
     * @param  integer $user_id 用户id
     * @param  integer $id      课程id
     * @return mixed           [description]
     */
    public function details($id=null,$status=1){
        //验证客户端是否传课程ID
        if (empty($id))  return $this->errSysJson('课程ID不能为空！');
        $video_pic_img =null; //课程视频封面
        $video_url =null;//课程视频地址
        $popupWindow = 0;//是否弹出倒计时框 1弹 0不弹
        $windowTime = 0;//弹窗倒计时间
        $joinCourse = 0;//是否报名课程 1已报名 0未报名
        $loginStatus = $status;//用户当前是否登录
//        $pushUrl = '';//推流地址
        $CourseModel = new \app\web\model\Course();
        $qiniuModel = new QiniuGallerys();
        $courseInfo = $CourseModel->getCourseInfo($id);
        $checkStatus = 3;//加密课密码验证状态 （1：验证成功，2：验证失败或者验证失效了，3：无需验证）
        //判断课程是否已经开始
        if(strtotime($courseInfo['begin_time']) > time()){
            $popupWindow = 1;
            $windowTime = strtotime($courseInfo['begin_time']) - time();
        }

        //该用户其他课程
//        $RelevantCourse = $CourseModel->RelevantCourse($courseInfo['live_id'],$id);
        $college = new College();
        $RelevantCourse =  $college->getCourseList($type=23,1,20,0,2);
        //返回推流地址
        if($courseInfo['form'] == 2){
//            $pushUrlDetail = config('push_url')."%u_%u?user=99cj&passwd=hc992017win";
//            $pushUrl = sprintf($pushUrlDetail,$courseInfo['uid'],$id);
            $video_pic_img =$qiniuModel->getQiNiuUrl($courseInfo['video_pic_id']);
            $video_url =$qiniuModel->getQiNiuUrl($courseInfo['video_url_id']);
        }
        //判断报名是否截止
        $currentTime = date('Y-m-d H:i:s');
        $enroll_end_state = ($currentTime < $courseInfo['begin_enroll_time'] || $currentTime > $courseInfo['end_enroll_time']) ? 1 : 0;
        //判断用户是否已购买该课程
        $userBuyStatus = 0;//0未购买 1已购买
        if($courseInfo['level'] == 2){
            if ($loginStatus == 2){
                $user_id = $this->getUserId();
                $PayOrderModel = new PayOrder();
                $type = 1;
                if($courseInfo['pid'] != 0){
                    $class_id = $courseInfo['pid'];
                }else{
                    $class_id = $id;
                }
                //判读用户是否已参加该课程
                $UserJoinModel = new UserJoin();
                $join_status = $UserJoinModel->where('user_id',$user_id)->where('course_id',$id)->find();
                if(!empty($join_status)){
                    $joinCourse = 1;
                }
                //判断用户是否购买课程否则不反回视频地址
                $userBuyStatus = $PayOrderModel->isBuy($user_id, $type, $class_id);
                if ($user_id == $courseInfo['uid']) $userBuyStatus = 1;
                if ($userBuyStatus != 1){
                    $video_url = null;
                }
            }else{
                $userBuyStatus = 0;
                $video_url = null;
            }
        }elseif ($courseInfo['level'] == 1)
        {//加密课程密码校验不成功的情况不显示视频地址
            $flg = true;//是否检验密码开关
            if ($loginStatus == 2){
                $user_id = $this->getUserId();
                if ($user_id == $courseInfo['uid']) $flg = false;
            }
            if ($flg == true){
                if (Session::get('CheckPass') != session_id().'Success'.$id){
                    $video_url = null;
                }
                !empty(Session::get('CheckStatus'))? $checkStatus = Session::get('CheckStatus'):$checkStatus = 2;
            }else{
                $checkStatus = 3;//不用检验密码；
            }
        }//
        //获取图片介绍
        $LiveImgModel = new LiveImg();
        $LiveImgCondition['type'] = 2;
        $LiveImgCondition['type_id'] = $id;
        $img_brief = $LiveImgModel->field('src,explain')->where($LiveImgCondition)->select();
        //课程目录
        if ($courseInfo['pid'] != 0 ||$courseInfo['type']==2){
            $class_type = 2;//课程类型 1：专题课 2：系列课或系列课子课程
            $pid = $courseInfo['id'];
            if($courseInfo['pid'] != 0){
                $pid = $courseInfo['pid'];
                $courseInfo['price'] = $CourseModel->where('id',$courseInfo['pid'])->value('price');
                foreach ($RelevantCourse as $k => $v) {
                    $v['price'] = floatval($courseInfo['price']);
                }
            }
            $catalog = $CourseModel->getCatalog($pid);
        }else{
            $class_type = 1;//课程类型 1：专题课 2：系列课或系列课子课程
            $catalog= array();
        }
        //格式化数据返回
        $data = [
            "id" => $courseInfo['id'],//课程id
            'uid'=>$courseInfo['uid'],//讲师id
            'alias'=>$courseInfo['alias'],//讲师昵称
            "class_name" => $courseInfo['class_name'],//课程标题
            "src_img" => $courseInfo['src_img'],//课程封面图
            'class_video_pic'=>$video_pic_img,//课程视频封面图
            'class_video_url'=>$video_url,//课程视频地址
            'loginStatus'=>$loginStatus,//登录状态前端 （false没登陆，true已登录）
            'intro'=>$courseInfo['intro'],//讲师简介
            "price" => floatval($courseInfo['price']),//课程价格（礼点）
            "level" => $courseInfo['level'],//课程类型（0免费，1加密，2收费）
            'plan_num'=>$courseInfo['plan_num'],//计划课程数
            'haveCourseTotal'=>count($catalog),//已更新课程数
            "teacher_name" => $courseInfo['teacher_name'],//主讲人
//            "popupWindow" => $popupWindow,//是否弹出倒计时框 1弹 0不弹
//            "begin_time" => substr($courseInfo['begin_time'],0,16),//课程开始时间
            "begin_time_full" => $courseInfo['begin_time'],//课程开始时间Y-M-D
            "begin_enroll_time" => $courseInfo['begin_enroll_time'],//课程开始报名时间
            "end_enroll_time" => $courseInfo['end_enroll_time'],//课程结束报名时间
            "enroll_end_state" => $enroll_end_state,//报名是否截止：1为截止，0为未截止
            "study_num" => $courseInfo['study_num'] + $courseInfo['virtual_study_num'],//课程观看人数
            "lecturers" => $courseInfo['lecturers'],//主讲人介绍
            "brief" => $courseInfo['brief'],//课程简介
            "img_brief" => $img_brief,//课程图片、图片说明
            "userBuyStatus" => $userBuyStatus,//用户是否已购买该课程 0未购买 1已购买
            "freeze" => $courseInfo['freeze'],//课程主讲人是否被禁用
            "class_type" => $class_type,//课程类型 1：专题课 2：系列课或者系列课子课程
//            "form" => $courseInfo['form'],//'课程形式，1为图文语音（普通），2为视频直播，3为ppt直播'
            "head_add" => $courseInfo['head_add'],//用户id
            "pid" => $courseInfo['pid'],//上级id(系列课id)
            "player_img" => !empty($courseInfo['video_pic']) ? "http://oqt46pvmm.bkt.clouddn.com/".$courseInfo['video_pic'] : "",//播放器默认图片
//            "push_url" => $pushUrl, //课程推流地址
            'introductionUrl' => (new \app\wechat\model\QiniuGallerys())->getVideoData($courseInfo['introduction_code_id']), // 课程介绍视频
            "origin_price" => $courseInfo['origin_price'],//课程原价
//            "windowTime" => $windowTime,//弹窗倒计时间
            "join_course" => $joinCourse,//是否报名课程 1已报名 0未报名
            "checkPass" => $checkStatus,//加密课密码验证状态 （1：验证成功，2：验证失败或者验证失效了，3：无需验证）
            'catalog'=>$catalog,//目录
            "RelevantCourse" => $RelevantCourse,//直播间其他课程
        ];
        Session::set('CheckPass',false);
        Session::set('CheckStatus',2);
        return $this->successJson($data);
    }

    /**
     * 获取系列课子课程
     * @param  [type] $id 系列课id
     * @return [type]     [description]
     */
    public function cildCourse($id){
        $CourseModel = new Course();
        $dataList = $CourseModel->getChildCourse($id,0);
        return $this->sucSysJson($dataList);
    }


    /**
     * 讲师列表
     * @param int $page
     * @param int $size
     * @return \think\response\Json
     */
    public function teachList($page=1,$size=10)
    {
        $page <= 1 ? $curPage = 1:$curPage = trim(intval($page));
        $size < 1 ? $pageSize = 1:$pageSize = trim(intval($size));
        $startRow = ($curPage - 1) * $pageSize;
        $field = 'u.user_id,u.alias,u.head_add,u.intro,u.user_level';
        $model = new \app\web\model\User();
        $where['u.user_id'] = ['not in',[1736702,1736744]];
        $dataList = $model->where('u.user_level',2)->alias('u')
            ->join('talk_set_top s','u.user_id = s.target_id AND s.type = 2','left')
            ->join('talk_live l','l.user_id = u.user_id and l.open_status = 1')
            ->where('u.freeze = 0')
            ->where('u.dataFlag = 1')
            ->where($where)
            ->field($field)
            ->limit($startRow,$pageSize)
            ->order('s.sort','desc')
            ->select();
        return $this->sucSysJson($dataList);
    }//end

    /**
     * 课程密码校验
     * @param $id
     * @param $pass
     * @return \think\response\Json
     */
    public function checkPass($id=null,$pass=null)
    {
        if (empty($id)||empty($pass)) return $this->errSysJson('缺少必要参数');
        $model = new \app\web\model\Course();
        $courseInfo = $model->where(['id'=>$id,'level'=>1,'password'=>$pass])->find();
        Session::set('CheckPass',false);
        if (count($courseInfo)>0){
            Session::set('CheckPass',session_id().'Success'.$id);
            Session::set('CheckStatus',1);
            return $this->sucSysJson(['returnCode'=>4200,'checkStatus'=>true,'sessionID'=>session_id()],'Success Password!');
        }else{
            Session::set('CheckStatus',2);
            return $this->sucSysJson(['returnCode'=>4400,'checkStatus'=>false],'Password Fail!');
        }
    }//end
}