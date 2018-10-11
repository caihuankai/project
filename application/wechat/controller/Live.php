<?php

namespace app\wechat\controller;
use app\admin\service\Redis;


/**
 * 直播间
 *
 * @property \app\wechat\model\Live live
 * @package app\wechat\controller
 */
class Live extends App
{
    
    use \app\wechat\traits\Live,
        \app\wechat\traits\LiveImg,
        \app\wechat\traits\contentsData;
    
    
    protected $loginNoAjaxAction = [
        'menuGoLive', // 页面跳转
    ];

    protected $noLoginAction = [
        'videoStream',//视频流配置
        'getTheme',
        'setTheme',
        'checkPassword',
    ];


    /**
     * 检查直播间密码
     * @param null $liveID
     * @param null $password
     * @param null $device
     * @return \think\response\Json
     */
    public function checkPassword($liveID=null,$password=null)
    {
        if (empty($liveID)) return $this->errSysJson('填写直播间ID!');
        $model = new \app\wechat\model\Live();
        $liveData = $model->where('id',$liveID)->field('id,user_id,password,adapt')->find();
        $userID = $this->getUserId();
        $flag = false;
        $val = base64_encode($liveID.'-'.$userID.'-'.$liveData['password']);
        if (empty($password)) return $this->errSysJson('校验密码不能为空!');
        if ($liveData['password'] == $password){
            $flag =true;
        }
        if ($flag){
            //保存到redis服务器
            Redis::hashSet('LiveCheckPass',$val,$val);
            return $this->sucSysJson(['returnCode'=>4200,'checkStatus'=>true],'验证通过！');
        }else{
            return $this->errSysJson(['returnCode'=>4400,'checkStatus'=>false],'密码验证失败!');
        }
    }
    
    
    /**
     * 设置首页
     *
     * @return \think\response\Json
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function setupIndex()
    {
        $this->liveFieldTrait = 'id, name, img, background_img, open_status';
        $liveData = $this->getLiveDataTrait();
        
        
        return $this->sucSysJson([
            'backgroundImg' => $liveData['background_img'],
            'img' => $liveData['img'],
            'name' => $liveData['name'],
            'id' => $liveData['id'],
        ]);
    }
    
    
    /**
     * 直播间详情页
     *
     * @return mixed
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function setupContent()
    {
        $this->liveFieldTrait = 'id, content';
        $liveData = $this->getLiveDataTrait();
        
        return $this->setupContentTrait($liveData['id'], $liveData['content']);
    }
    
    
    
    
    
    /**
     * 保存直播间设置
     *
     * @return \think\response\Json
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function setupSave()
    {
        $this->filterRepeatPost();
        $this->liveFieldTrait = 'id, open_status';
        $liveData = $this->getLiveDataTrait();
        
        $this->validateByName();
    
        $picClass = \Qiniu::instance();
        $this->saveWhere('name');
        // 背景图
        $this->saveWhere('backgroundImg', '', 'background_img', function ($img) use($picClass){
            return $picClass->getWeChatImg($img);
        });
        // 直播间图标, 不能设置会默认图
        $this->saveWhere('img', '', 'img', function ($img) use($picClass){
            return $picClass->getWeChatImg($img, 100, 100);
        });
    
    
        $contentsDataResult = $this->contentsData($this->live, 'content', $liveData['id'], 1);
        if ($contentsDataResult !== true) {
            return $this->errSysJson($contentsDataResult);
        }
        
        
        $save = $this->live->getData();
        $this->live->update($save, ['id' => $liveData['id']]);
        
        return $this->sucSysJson(1);
    }
    
    
    /**
     * 保存数据
     *
     * @param $key
     * @param $default
     * @param $whereKey
     * @return mixed
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function saveWhere($key, $default = '', $whereKey = null, \Closure $filter = null)
    {
        if (is_null($filter)){
            $filter = function ($data){return $data;};
        }
        $data = $filter($this->request->post($key, $default));
    
        if (!empty($data)) {
            $whereKey = is_null($whereKey) ? $key : $whereKey;
            $this->live->data($whereKey, $data) ;
        }
        
        return $data;
    }
    
    
    /**
     * 菜单上的我的直播间
     * 1. 创建过直播间时，点击进入直播间页面
     * 2.未创建直播间时，点击进入创建直播间页面
     *
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function menuGoLive()
    {
        $userId = $this->getUserId();
        $num = (new \app\wechat\model\Live())->countUserLiveNum($userId);
        
        $this->redirect($num?'/#/personalCenter/liveroom/0':'/#/personalCenter/createLive');
    }

    /**
     * 获取相应直播间/课程的推流拉流地址
     * @name  videoStream
     * @param int $id   直播间ID/课程ID
     * @return \think\response\Json
     * @author Lizhijian
     */
    public function videoStream($id = 601){
        $tem = config('video_stream');
        return $this->sucJson(array_map(function ($v) use($id){
            return sprintf($v, $id);
        }, $tem));
    }


    /**
     * 获取直播间主题接口
     * @name  getTheme
     * @param int id 直播间ID
     * @return \think\response\Json
     * @author Lizhijian
     */
    public function getTheme(){
        $id = input('id');
        $theme = (new \app\wechat\model\Live())->getTheme($id);
        return $this->successJson($theme);
    }

    /**
     * 设置直播间主题名接口
     * @name  setTheme
     * @param int id 直播间ID
     * @param int theme 直播间主题名
     * @return \think\response\Json
     */
    public function setTheme(){
        $id = input('id');
        $theme = input('theme');
        if(!$id || !$theme) return $this->errorJson(\app\common\controller\JsonResult::ERR_PARAMETER);

        $theme = (new \app\wechat\model\Live())->setTheme($id, $theme);
        return $this->successJson($theme);
    }
    
    /**
     * 检查讲师动态
     * @return \think\response\Json
     * @author liujuneng
     */
    public function checkTeacherDynamic() {
        $teacherId = $this->request->param('teacherId/d', 0);
        if ($teacherId > 0) {
            $HomeRecordModel = new \app\wechat\model\HomeRecord();
            $userId = $this->getUserId();
            $retult = $HomeRecordModel->checkTeacherDynamic($teacherId, $userId);
            if ($retult['code'] == 1) {
                return $this->errSysJson($retult['msg']);
            }elseif ($retult['code'] == 0) {
                if (empty($retult['data'])) {
                    return $this->errSysJson($retult['msg']);
                }else {
                    $courseId = $retult['data']['room_id'];
                    $courseModel = new \app\wechat\model\Course();
                    $courseInfo = $courseModel->where('id', $courseId)->field('class_name,level,form,src_img')->find();
                    $data = [];
                    if (!empty($courseInfo)) {
                        $data['courseId'] = $courseId;
                        $data['className'] = $courseInfo['class_name'];
                        $data['level'] = $courseInfo['level'];
                        $data['form'] = $courseInfo['form'];
                        $data['srcImg'] = \helper\UrlSys::handleCourseBackImg($courseInfo['src_img']);
                    }
                    return $this->sucSysJson($data);
                }
            }
        }else {
            $this->errSysJson('teacherId参数有误');
        }
    }
    /**
     * 返回公共直播间推拉流地址，推流状态
     * @return [array] 
     */
    public function liveStream(){
        $data['push_url'] = config('push_url')."1_1000009999?user=99cj&passwd=hc992017win";
        $data['pull_url'] = config('pull_url')."1_1000009999/playlist.m3u8";
        $LiveStateModel = new \app\wechat\model\LiveState();
        $data['state'] = $LiveStateModel->getState($groupid = 1000009999);
        return $this->sucSysJson($data);
    }

}