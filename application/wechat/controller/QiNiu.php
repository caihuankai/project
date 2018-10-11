<?php

namespace app\wechat\controller;

use app\wechat\model\AccessToken as AccessToken;
use app\wechat\model\QiniuGallerys as QiniuGallerys;
use app\common\controller\JsonResult;
use think\Db;

use Qiniu\Auth;
use Qiniu\Storage\BucketManager;
use Qiniu\Storage\UploadManager;

class QiNiu extends App
{
    protected $noLoginAction = [
        'pictureList',
        'uploadPicture',
        'uploadPictureFromWeixin',
        'upToken',
        'curlGet',
        'request_by_curl',
        'uploadFromPc',
        'uploadAudioPc',
        'uploadLocalPc',
    ];

   /**
     * 云存储下的所有图片
     * @return mixed
     */
    public function pictureList()
    {

        $auth = \Qiniu::instance()->getAuth();
        $bucketMgr = new BucketManager($auth);

        // 要列取的空间名称
		$bucket = \Qiniu::instance()->getBucket();
        // 要列取文件的公共前缀
        $prefix = '';
        // 上次列举返回的位置标记，作为本次列举的起点信息。
        $marker = '';
        // 本次列举的条目数
        //$limit = 3;

        // 列举文件
        $list = $bucketMgr->listFiles($bucket, $prefix, $marker);
        $list = array_filter($list);

		return WReturn("获取图片列表成功", 1 , $list);
    }

	//处理上传的主方法
    public function uploadPicture()
    {
    	$file = request()->file('fileList');
        //require_once APP_PATH . '/../vendor/autoload.php';


        // 构建鉴权对象
        $auth = \Qiniu::instance()->getAuth();

        // 要上传的空间
		$bucket = \Qiniu::instance()->getBucket();

        // 生成上传 Token
        $token = $auth->uploadToken($bucket);

        // 要上传文件的本地路径
        $filePath = $file->getRealPath();

        $ext = pathinfo($file->getInfo('name'), PATHINFO_EXTENSION);  //后缀

        // 上传到七牛后保存的文件名
        $key = substr(md5($file->getRealPath()) , 0, 5). date('YmdHis') . rand(0, 9999) . '.' . $ext;

        // 初始化 UploadManager 对象并进行文件的上传
        $uploadMgr = new UploadManager();

        // 调用 UploadManager 的 putFile 方法进行文件的上传
        list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
        if ($err !== null) {
            // var_dump($err);
			return WReturn("图片上传失败", -1 , $err);
        } else {
            // echo $bucket . '/' . $key;
			return WReturn("图片上传成功", 1 , $bucket . '/' . $key);
        }
    }

	//从微信服务器下载图片然后上传至七牛
    public function uploadPictureFromWeixin()
    {
		$userData = $this->getSessionUserData();
		$userId = $userData['user_id'];

		$img = input("img");
		$positionType = input("positionType");

		// 获取七牛的token

        // 构建鉴权对象
        $auth = \Qiniu::instance()->getAuth();

        // 要上传的空间
        //$bucket = config('BUCKET');
		$bucket = \Qiniu::instance()->getBucket();
		//$bucket = 'qianliao';
        // 生成上传 Token
        $upToken = $auth->uploadToken($bucket);

		// 获取微信的 access_token
        //$weixin_token = config('WEIXIN_TOKEN');
        // $appid = config('WEIXIN_APP_ID');
        // $secret = config('WEIXIN_APP_SECRET');
        // $url_get = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$secret;
        // $json=$this->curlGet($url_get);
        // $weixin_token =  json_decode($json);
        // $weixin_token=$weixin_token->access_token;
		/* $m = new AccessToken();
		$rs = $m->getAccessToken();
		$weixin_token = $rs; */
		//$weixin_token = "dZrSi8Vm1xkSGD2nK_MI25wOYw5ktw9JuZPaRLuEmZuex6e2z-huDDAZ1c2eVx55NpHAXEyyU2Nk_DkL-wNOXj3fuqvhcABjgJ-byiCAHZMnM8azjmRPtUbzPJmYX8OQYWHdAJACAL";
		//$rs = Db::connect('bs_db_config')->table('talk_access_token')->where('id',5)->column('access_token');
		$rs = Db::connect('bs_db_config')->table('talk_access_token')->limit(1)->column('access_token');
		$weixin_token = $rs[0];

		// 从微信服务器下载
        $str = "http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=".$weixin_token."&media_id=".$img;

		// 把从微信获得的数据用七牛上传到服务器上面
        $strr = file_get_contents($str);
        $fetch = base64_encode($strr);
        $imggg = $this->request_by_curl(\Qiniu::instance()->getPutB64Url(), $fetch, $upToken);
        $imgs = json_decode(trim($imggg),true);

		// 要上传文件的本地路径
        //$ext = pathinfo($imgs->getInfo('name'), PATHINFO_EXTENSION);  //后缀

        if (isset($imgs['error'])){ // 报错
            return WReturn($imgs['error'], -1);
        }

        $imgss = $imgs['hash'];

		$imgUrl = \Qiniu::instance()->handleQiNiuResultUrl($imgss).'?imageslim';

		$data['userId'] = $userId;
		$data['mediaId'] = $img;
		//$data['qiniuKey'] = $imgs['key'];
		$data['qiniuKey'] = $imgss;
		$data['positionType'] = $positionType;
		$data['qiniuImg'] = $imgUrl;
		$data['qiniuThumbs'] = '';
		$data['imgUrlDisplay'] = \Qiniu::instance()->handleQiNiuResultUrl($imgss);

		$m = new QiniuGallerys();
		//$rsNum = $m->save($data);
		$rsNum = Db::connect('bs_db_config')->execute('INSERT INTO `talk_qiniu_gallerys` (`userId`,`mediaId`,`qiniuKey`,`positionType`,`qiniuImg`,`qiniuThumbs`,`imgUrlDisplay`) VALUES (?,?,?,?,?,?,?)',[$data['userId'],$data['mediaId'],$data['qiniuKey'],$data['positionType'],$data['qiniuImg'],'',$data['imgUrlDisplay']]);

		if ($rsNum > 0) {
            // return ['status' => 1,'data' => '图片上传成功'];
			return WReturn('图片上传成功',$status = 1,$data);
        }
        // return ['status' => 0,'data' => '图片上传失败'];
		return WReturn('图片上传失败',$status = -1);
    }

    //获取七牛token
    public function upToken(){
        // 获取七牛的token       

        // 构建鉴权对象
        $auth = \Qiniu::instance()->getAuth();

        // 要上传的空间
        //$bucket = config('BUCKET');
        $bucket = \Qiniu::instance()->getBucket();
        // 生成上传 Token
        $upToken = $auth->uploadToken($bucket);
        return $upToken;
    }

	public function curlGet($url){
        $ch = curl_init();
        $header = "Accept-Charset: utf-8";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        //curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $temp = curl_exec($ch);
        return $temp;
    }

    /**
     * PC端保存七牛图片
     * @name  uploadFromPc
     * @return \think\response\Jsonp
     * AJAX调用参考：
     * data:{
        "img": {
            "hash":"Fh9IBPsdTYjCXqpAiEj7vl1zmm4k",
            "key":"o_1bt65jq48b911rotesibq8nprk.png"
        },
        "positionType":21
        },
        async: false,
        dataType: "jsonp",
        jsonp: "callback",//var_jsonp_handler
        jsonpCallback:"getResult",
     *  success: function(data) {}
     */
    public function uploadFromPc(){

        $userData = $this->getSessionUserData();
        $userId = $userData['user_id'];
//        $userId = 1706743;//测试ID
        $img = input("img/a");//七牛上传图片后返回的信息

        $positionType = input("positionType");//图片位置用途类型 0:用户中心 1:直播间 2:课程 3:banner_controller，4:课程介绍音频
        if(empty($img) || empty($positionType) || empty($userId)) return jsonp(['msg' => '缺少参数!', 'code' => 202],202,[],['var_jsonp_handler'=>'callback']);

        if(isset($img['hash'])){//单图片

            $data['userId'] = $userId;
            $data['mediaId'] = 0;//微信服务器图片编号，这里不需要
            $data['qiniuKey'] = $img['hash'];//七牛云存储图片hash
            $data['positionType'] = $positionType;
            $data['qiniuImg'] = \Qiniu::instance()->handleQiNiuResultUrl($img['hash']).'?imageslim';//大图
            $data['imgUrlDisplay'] = \Qiniu::instance()->handleQiNiuResultUrl($img['hash']);//显示用url

            $rsNum = Db::connect('bs_db_config')->execute('INSERT INTO `talk_qiniu_gallerys` (`userId`,`mediaId`,`qiniuKey`,`positionType`,`qiniuImg`,`qiniuThumbs`,`imgUrlDisplay`) VALUES (?,?,?,?,?,?,?)',[$data['userId'],$data['mediaId'],$data['qiniuKey'],$data['positionType'],$data['qiniuImg'],'',$data['imgUrlDisplay']]);

        }else if(isset($img[0])){//多图片

            foreach ($img as $v){
                $data = [
                    'userId' => $userId,
                    'mediaId' => 0,
                    'qiniuKey' => $v['hash'],
                    'positionType' => $positionType,
                    'qiniuImg' => \Qiniu::instance()->handleQiNiuResultUrl($v['hash']).'?imageslim',
                    'imgUrlDisplay' => \Qiniu::instance()->handleQiNiuResultUrl($v['hash'])
                ];
                $rsNum = Db::connect('bs_db_config')->execute('INSERT INTO `talk_qiniu_gallerys` (`userId`,`mediaId`,`qiniuKey`,`positionType`,`qiniuImg`,`qiniuThumbs`,`imgUrlDisplay`) VALUES (?,?,?,?,?,?,?)',[$data['userId'],$data['mediaId'],$data['qiniuKey'],$data['positionType'],$data['qiniuImg'],'',$data['imgUrlDisplay']]);
            }
        }

        if($rsNum){
            $code = 200;
            $back = ['msg' => '上传成功!', 'code' => $code];
        }else{
            $code = 201;
            $back = ['msg' => '上传失败!', 'code' => $code];
        }
        return jsonp($back,$code,[],['var_jsonp_handler'=>'callback']);
    }

	public function request_by_curl($remote_server,$post_string,$upToken) {
      $headers = array();
      $headers[] = 'Content-Type:image/png';
      $headers[] = 'Authorization:UpToken '.$upToken;
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$remote_server);
      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_HTTPHEADER ,$headers);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
      curl_setopt($ch, CURLOPT_TIMEOUT, 30);
      $data = curl_exec($ch);
      curl_close($ch);

      return $data;
    }

    /**
     * PC端上传二进制语音wav文件
     * @name  uploadAudioPC
     * @author Lizhijian
     */
    public function uploadAudioPc(){

        $code = 201;
        $save_folder = RUNTIME_PATH.'/audio/';
        if(!file_exists($save_folder)) {
            if(!mkdir($save_folder)) {
                return jsonp(['msg' => "创建audio存储目录失败", 'code' => $code],$code,[],['var_jsonp_handler'=>'callback']);
            }
        }

        $key = 'filename';
        $tmp_name = $_FILES["upload_file"]["tmp_name"][$key];//上传文件名
        $upload_name = $_FILES["upload_file"]["name"][$key];//上传后保存名
        $type = $_FILES["upload_file"]["type"][$key];//上传类型
        $filename = "$save_folder/$upload_name";//上传后的地址

        if($type == 'audio/wav' && preg_match('/^[a-zA-Z0-9_\-]+\.wav$/', $upload_name) && valid_wav_file($tmp_name)) {
            $saved = move_uploaded_file($tmp_name, $filename) ? 1 : 0;//上传到本地
            if($saved){

                // 构建鉴权对象
                $auth = \Qiniu::instance()->getAuth();
                // 要上传的空间
                $bucket = \Qiniu::instance()->getBucket();
                // 生成上传 Token
                $token = $auth->uploadToken($bucket);
                // 上传到七牛后保存的文件名
                $key = substr(md5($filename) , 0, 5). date('YmdHis') . rand(0, 9999) . '.wav';
                // 初始化 UploadManager 对象并进行文件的上传
                $uploadMgr = new UploadManager();
                // 调用 UploadManager 的 putFile 方法进行文件的上传
                list($ret, $err) = $uploadMgr->putFile($token, $key, $filename);

                if ($err !== null) {
                    return $this->errSysJson($err, "上传失败" , 201);
                } else {
                    $ret['link'] = \Qiniu::instance()->getDomainList()[0] . '/' . $ret['key'];
                    unlink($filename);//删除原文件
                    return $this->sucSysJson($ret, "上传成功" , 200);
                }
            }else{
                return $this->errSysJson([], "文件保存失败" , 201);
            }
        }else{
            return $this->errSysJson([], "文件格式验证失败" , 201);
        }

    }

    /**
     * 上传本地文件到七牛(会删除原文件)
     * @name  uploadLocalPc
     * @param string $filePath 本地文件路径
     * @param string $ext   文件拓展名
     * @return \think\response\Json 上传云后返回信息
     * @author Lizhijian
     */
    public function uploadLocalPc($filePath = '', $ext = 'wav', $del = true){

        if(!$filePath) return $this->errSysJson([], "文件路径为空" , 201);

        // 构建鉴权对象
        $auth = \Qiniu::instance()->getAuth();
        // 要上传的空间
        $bucket = \Qiniu::instance()->getBucket();
        // 生成上传 Token
        $token = $auth->uploadToken($bucket);
        // 上传到七牛后保存的文件名
        $key = substr(md5($filePath) , 0, 5). date('YmdHis') . rand(0, 9999) . '.' . $ext;
        // 初始化 UploadManager 对象并进行文件的上传
        $uploadMgr = new UploadManager();
        // 调用 UploadManager 的 putFile 方法进行文件的上传
        list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);

        if ($err !== null) {
            return $this->errSysJson($err, "上传失败" , 201);
        } else {
            $ret['link'] = \Qiniu::instance()->getDomainList()[0] . '/' . $ret['key'];
            if($del) unlink($filePath);//删除原文件
            return $this->sucSysJson($ret, "上传成功" , 200);
        }
    }
}

/**
 *
 * 验证上传语言文件
 * @name  valid_wav_file
 * @param $file
 * @return bool
 * @author Lizhijian
 */
function valid_wav_file($file) {
    $handle = fopen($file, 'r');
    $header = fread($handle, 4);
    list($chunk_size) = array_values(unpack('V', fread($handle, 4)));
    $format = fread($handle, 4);
    fclose($handle);
    return $header == 'RIFF' && $format == 'WAVE' && $chunk_size == (filesize($file) - 8);
}