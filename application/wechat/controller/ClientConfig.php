<?php
namespace app\wechat\controller;

use app\common\controller\JsonResult;
use app\common\controller\ControllerBase;

class ClientConfig extends ControllerBase
{
    public function iOS()
    {

        // $clientType = request()->param('clientType');
        // $versionNumber = request()->param('versionNumber');
        $parameterName = request()->param('parameterName');

        if (in_array($parameterName, [300, 302, 303, 400, 401, 402, 403])) {
            return $this->successJson([]);
        }else{
            return $this->errorJson(JsonResult::ERR_NO_FORBIDDEN);
        }
    }

    /**
     * 广告页
     * [appAds description]
     * @return [type] [description]
     * type  资源类型:1图片 2视频
     * resource_url  资源URL
     * url 跳转url
     * seconds 停留时长 秒为单位
     */
    public function appAds(){
        $data['type'] = 1;
        $data['resource_url'] = config('WX_DOMAIN').'/images/aid.png';
        $data['url'] = config('WX_DOMAIN').'/images/aid.png';
        $data['seconds'] = 5;
        return $this->successJson($data);
    }

    /**
     * 检测版本是否强制更新
     * @return [type] [description]
     */
    public function updateVersion(){
        $versionNumber = request()->param('version');
        //ios当前最新版本号
        $iosVersion = '122';

        $data['version'] = '1.2.2';
        $data['releaseNotes'] = '更新日志';
        $data['currentVersionReleaseDate'] = date('Y-m-d H:i:s');
        if(empty($versionNumber)){
            $data['boolean'] = true;
        }else{
            $versionNumber = str_replace('.','',$versionNumber);
            if($versionNumber >= $iosVersion){
                $data['boolean'] = false;
            }else{
                $data['boolean'] = true;
            }
        }
        return $this->successJson($data);
    }
    /**
     * IOS审核
     * @return [type] [description]
     */
    public function examineState(){
        $version = request()->param('version');
        $versionArray = [100,101,102,103,104,105,106,122,123,230,240,241,260,261];
        if (in_array($version, $versionArray)) {
            $state = 1;
            return $this->sucSysJson($state);
        }else{
            $state = 0;
            return $this->sucSysJson($state);
        }
    }
}