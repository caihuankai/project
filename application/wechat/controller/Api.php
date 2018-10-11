<?php


namespace app\wechat\controller;

use WeChat\cache;

class Api extends App
{
    protected $noLoginAction = [
        'cdnStart',
        'cdnEnd',
        'getStreamLog',
        'testStart',
        'testEnd',
    ];

    /**
     * 获取视频流日志
     * @name  cdnStart
     * @return \think\response\Json
     * @author Lizhijian
     */
    public function cdnStart(){
        $id = input('id');
        $log = input('log');

        if($log) \think\Cache::set('cdnStart:'.date('YmdH', time()), $id);

        $admireRpcC = new AdmireRpc();
        $admireRpcC->sendVideoStream($id, 1);

    }

    /**
     * 获取视频流日志
     * @name  getStreamLog
     * @return \think\response\Json
     * @author Lizhijian
     */
    public function getStreamLog(){
        return $this->sucJson([
            'start'=> \think\Cache::get('cdnStart:'.date('YmdH', time())),
            'end'=> \think\Cache::get('cdnEnd:'.date('YmdH', time())),
        ]);
    }
    /**
     * 获取视频断流通知
     * @name  cdnEnd
     * @return \think\response\Json
     * @author Lizhijian
     */
    public function cdnEnd(){
        $id = input('id');
        $log = input('log');

        if($log) \think\Cache::set('cdnEnd:'.date('YmdH', time()), $id);

        $admireRpcC = new AdmireRpc();
        $admireRpcC->sendVideoStream($id, 2);

    }
    //测试新的推拉流
    public function testStart($id){

        \think\Log::write('testStart:'.$id, 'rpc');

        $admireRpcC = new AdmireRpc();

        $admireRpcC->sendVideoStream($id, 1);

    }
    public function testEnd($id){

        \think\Log::write('testEnd:'.$id, 'rpc');

        $admireRpcC = new AdmireRpc();

        $admireRpcC->sendVideoStream($id, 2);

    }

}