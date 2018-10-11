<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/8/10
 * Time: 11:30
 */

namespace app\jiahua\controller;


use app\admin\model\Banner;
use app\admin\model\Live;
use app\admin\service\Redis;

class BannerAndLive extends App
{
    protected $noLoginAction = [
        'fetchBannerAndLiveData'
    ];
    //拉流地址
//    protected $pullUrl = "http://pull.test.99cj.com.cn/live/1_%s/playlist.m3u8";
    protected $pullUrl = null;
    //c++房间号
    protected $live_id = 1000010029;
    protected $pull_id = '1_1000010029';
    //redis哈希表主键
    protected $redisDB = 'JiaHuaLiveDB';
    /**
     * 获取家华课堂的banner跟liveData
     */
    public function fetchBannerAndLiveData()
    {
        $this->pullUrl = config('video_stream.pull');
        $LiveModel = new Live();
        $LiveStateModel = new \app\wechat\model\LiveState();
        $liveField = 'online_num,virtual_num';
        $data['state'] = $LiveStateModel->getState($groupid = 1000010029);
        $live = $LiveModel->where('id','10029')->field($liveField)->find();
        $returnData = [
            'online_num'=>intval($live['online_num']) + intval($live['virtual_num']),
            'pull_url' => sprintf($this->pullUrl,$this->pull_id),
            'push_status' => $data['state'],
            'webSocket'  => config('SOCKET_CONFIG.WEB_SOCKET'),
        ];
        $redisData = $this->hAllGet($this->redisDB);
        $returnData = array_merge($returnData,$redisData);
        return $this->sucSysJson($returnData);
    }


    /**
     * 获取家华课堂的banner跟liveData
     */
    public function fetchWXBannerAndLiveData()
    {
        $this->pullUrl = config('video_stream.pull');
        $BannerModel = new Banner();
        $LiveModel = new Live();
        $LiveStateModel = new \app\wechat\model\LiveState();
        $liveField = 'online_num,virtual_num';
        $data['state'] = $LiveStateModel->getState($groupid = 1000010029);
        $banner = $BannerModel->where('status',1)->field('id,image,name')->select();
        $live = $LiveModel->where('id','10029')->field($liveField)->find();
        $returnData = [
            'banner'=>$banner,
            'online_num'=>intval($live['online_num']) + intval($live['virtual_num']),
            'pull_url' => sprintf($this->pullUrl,$this->pull_id),
            'push_status' => $data['state'],
        ];
        $redisData = $this->hAllGet($this->redisDB);
        $returnData = array_merge($returnData,$redisData);
        return $this->sucSysJson($returnData);
    }

    /*
     * 获取指定哈希表的所有值
     */
    private function hAllGet($key)
    {
        return Redis::hashGet($key);
    }
}