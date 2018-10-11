<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/6/6
 * Time: 14:56
 */

namespace app\wechat\controller;


use app\admin\model\RelatedIntroduction;
use app\wechat\model\GlobalLive as MGlobalLive;
class GeneralizeLive extends App
{

    protected $noLoginAction = ['getGeneralizeLiveInfo','index'];

    public function index(){
        //定位到html的模板页
        return $this->fetch(APP_PATH.request()->module().'/view/generalize_live/index.html');
    }
    /**
     * 获取当前讲师信息
     */
    public function getGeneralizeLiveInfo()
    {
        $model = new MGlobalLive();
        $LiveStateModel = new \app\wechat\model\LiveState();
        $RelatedIntroduction = new RelatedIntroduction();
        $currTime = date('Y-m-d H:i:s');
        $checkTimestart = date('Y-m-d 9:00:00');
        $checkTimeend = date('Y-m-d 21:30:00');
        $ip = request()->ip();
        if(!empty($ip)){
            $model->db()
                ->table('talk_generalize_info')
                ->insert([
                    'address_ip'=>$ip,
                    'create_time'=>date('Y-m-d H:i:s')
                ]);
        }
        // $datelists = $model ->alias('gl')
        //     ->where('gl.set_start_time','<=',$currTime)
        //     ->where('gl.set_end_time','>=',$currTime)
        //     ->join('talk_live l','l.user_id = gl.user_id')
        //     ->join('talk_user u','gl.user_id = u.user_id')
        //     ->join('talk_live li','gl.pid = li.id')
        //     ->field('gl.id as courseId,gl.pid,gl.classification,gl.class_name,gl.cate_name,li.online_num,li.virtual_num,l.focus_num,u.head_add')
        //     ->select();
        $generalizeData = $RelatedIntroduction ->where('type',4)->field('id,icon,content,qr_code')->select();
        foreach ($generalizeData as $key => $item){
            if ($item['icon']!='right'){
                $generalizeData[$item['icon']]['imgSrc'] = $item['qr_code'];
                if (!empty($item['content'])){
                    $item['content'] = json_decode($item['content'],true);
                    $generalizeData[$item['icon']]['time'] = [
                        'start'=>$item['content']['starttime'],
                        'end'=>$item['content']['endtime']
                    ];
                }
            }
            if ($item['icon'] == 'right'){
                $generalizeData[$item['icon']][$item['content']] = ['imgSrc'=>$item['qr_code']];
            }
            unset($generalizeData[$key]);
        }


        if (isset($generalizeData['endplay'])){
            $hm = $generalizeData['endplay']['time'];
        }else{
            $hm = [
                'start'=>strtotime($currTime)+9999,
                'end'=>strtotime($currTime) - 9999,
            ];
        }

        if (strtotime($currTime) >= strtotime($checkTimestart)&& strtotime($currTime) <= strtotime($checkTimeend)){
            $status = $LiveStateModel->getState($groupid = 1000009999);
            $result=[
                'push_url' => config('push_url')."1_1000009999?user=99cj&passwd=hc992017win",
                'pull_url' => config('pull_url')."1_1000009999/playlist.m3u8",
                'generalizeData'=>$generalizeData,
                'Livestate' => $status == 2 ? 3 : 1 ,//推流状态 1：正在直播 2：没有直播 3未到19:00 推广页面播放默认图，不推流 4播放结束图片
            ];
            $msg = $status == 1 ? '正在直播':'播放默认图';
        }else{
            if(strtotime($currTime) < strtotime($checkTimestart)) $status = 3;
            if(strtotime($currTime) > strtotime($checkTimeend)) $status = 4;
            $result=[
                'push_url' => config('push_url')."1_1000009999?user=99cj&passwd=hc992017win",
                'pull_url' => config('pull_url')."1_1000009999/playlist.m3u8",
                'generalizeData'=>$generalizeData,
                'Livestate' => $status, //未到19:00 推广页面播放默认图，不推流！
            ];
            $msg = $status== 3 ? '09:00前播放默认图':'21:30后播放结束图';
        }
        return $this ->sucSysJson($result,$msg);
    }//end
}