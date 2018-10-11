<?php

namespace app\wechat\controller;

use app\common\controller\ControllerBase;
use think\config;
use app\common\controller\JsonResult;
use Thrift\Protocol\TBinaryProtocol;
use Thrift\ThriftStub\RPC_Group_Push\TChatSvrClient;
use Thrift\Transport\THttpClient;

require_once ROOT_PATH . 'extend/Thrift/ThriftStub/RPC_Group_Push/TPushMsg.php';

class QiniuNotify extends ControllerBase{
	public function index(){
		$data = json_decode(file_get_contents("php://input"), true);
		$logData = file_get_contents("php://input");
		\think\Log::write('QiniuNotify => ' . $logData, 'rpc');
		if(empty($data)){
			return null;
		}
		$key = $data['items'][0]['key'];
		$inputKey = $data['inputKey'];
		$code = $data['items'][0]['code'];
		//调用RPC通知c++     -开始
        try {
            $transport = new THttpClient(config('RPC_IP'), config('RPC_PORT'));
            $transport->setTimeoutSecs(30);
            $protocol = new TBinaryProtocol($transport);
            $client = new TChatSvrClient($protocol);

            $transport->open();//建立连接
            $client->handle_voice_callback($inputKey,$code,$key); //调用通知

            $transport->close();
        } catch (\Exception $e) {
            \think\Log::write('调用RPC失败:' . $e->getMessage(),'rpc');
            return $this->errorJson(JsonResult::ERR_RPC_ERROR);
            // return $this->errJson(['code' => 0, 'msg' => '调用RPC更新敏感词失败']);
        }
        //调用RPC通知c++     -结束
		// return $data['items'][0]['key'];
	}
}