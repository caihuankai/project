<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/7/9
 * Time: 16:58
 */

namespace app\web\controller;


class Live extends App
{
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