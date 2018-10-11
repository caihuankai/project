<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/8/9
 * Time: 10:44
 */

namespace app\admin\controller;


use app\admin\model\LiveStatistics;
use app\admin\service\Redis;

class LiveRoom extends App
{
    //"http://pull.test.99cj.com.cn/live/1_1000009999/playlist.m3u8"
    protected $pullUrl = "http://pull.test.99cj.com.cn/live/1_%s/playlist.m3u8";
    protected $type = 1;
    protected $live_id = 1000010029;
    protected $liveID = 10029;
    protected $date = null;
    protected $redisDB = 'JiaHuaLiveDB';
    protected $defaultImg = 'http://oqt46pvmm.bkt.clouddn.com/FhPDicPP90HTbLd_vgudvfBc2mpZ';
    protected $path = "http://oqt46pvmm.bkt.clouddn.com/";
    /*
     * 获取指定redis key的值
     */
    private function hGet($key)
    {
        return Redis::hashGet($this->redisDB,$key);
    }

    /*
     * 获取指定哈希表的所有值
     */
    private function hAllGet($key)
    {
        return Redis::hashGet($key);
    }

    /*
     * 设置指定redis key的值
     */
    private function hSet($key,$value)
    {
       Redis::hashSet($this->redisDB,$key,$value);
    }
    /**
     * 数据格式化
     * @param $name
     * @param null $default
     * @return string
     */
    private function trimData($name,$default=null)
    {
        return trim(request()->param($name,$default));
    }

    /**
     * 上传图片私有类
     * @param $img
     * @return string
     */
    private function uploadImg($img)
    {
        //实例化ads共有类
        $AdsC = new \app\admin\controller\Ads();
        $imgs = $AdsC->uploadImg($img);
        $imgs = json_decode($imgs,true);
        $img = $this->path.$imgs['key'];
        //返回上传成功后的图片地址
        return $img;
    }
    /**
     * 直播间设置首页
     * @return mixed
     */
    public function index()
    {
        $this->date = date('Ymd',strtotime(20180317));
        $model = new \app\admin\model\Live();
        $statisticsModel = new LiveStatistics();
        $field = 'SUM(total) as totalsum';
        $liveField = 'online_num,virtual_num,max_online_num';
        $data = $model->where('id',$this->liveID)->field($liveField)->find();
        $total = $statisticsModel->where(['statistics_type'=>$this->type,'live_id'=>$this->live_id,'statistics_time'=>$this->date])->count();
        $statistics = $statisticsModel->where(['statistics_type'=>$this->type,'live_id'=>$this->live_id,'statistics_time'=>$this->date])->field($field)->find();
        $capita_time = empty($statistics['totalsum']) ? 0 : $statistics['totalsum'] / $total; //人均时长
        $redisData = $this->hAllGet($this->redisDB);
        if (!$redisData){
            //redis如无此key则创建并设置默认值
            $this->hSet('live_cover',$this->defaultImg);//直播间封面
            $this->hSet('live_background',$this->defaultImg);//直播背景
            $this->hSet('course_table',$this->defaultImg);//课程表
            $this->hSet('disclaimer',$this->defaultImg);//免责声明
        }
         $returnData = [
             'capita_time' =>$capita_time,
             'max_total' => $data['max_online_num'],
             'online_num' =>$data['online_num'],
             'virtual_num' =>$data['virtual_num'],
             'pull_url' => sprintf($this->pullUrl,$this->live_id)
         ];
        $returnData = array_merge($returnData,$redisData);

        $this->assign('info',$returnData);
        return $this->fetch();
    }//

    /**
     * 编辑
     * @return \think\response\Json
     */
    public function edit()
    {
        $model =new \app\admin\model\Live();
        $live_cover = $this->trimData('live_cover');
        $live_background = $this->trimData('live_background');
        $course_table = $this->trimData('course_table');
        $disclaimer = $this->trimData('disclaimer');
        $virtual_num = intval($this->trimData('virtual_num'));

        if ($virtual_num < 0) return $this->errSysJson('虚拟人数不能设置为负数');

        $result = $model->save(['virtual_num'=>$virtual_num],['id'=>$this->liveID]);
        if (!empty($live_cover)) $this->hSet('live_cover',$this->uploadImg($live_cover));
        if (!empty($live_background)) $this->hSet('live_background',$this->uploadImg($live_background));
        if (!empty($course_table)) $this->hSet('course_table',$this->uploadImg($course_table));
        if (!empty($disclaimer)) $this->hSet('disclaimer',$this->uploadImg($disclaimer));

        return $this->sucSysJson(['code'=>200,'updata_status'=>$result],'CHANGE SUCCESS!');
    }//end
}