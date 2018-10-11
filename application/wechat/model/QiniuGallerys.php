<?php

namespace app\wechat\model;



class QiniuGallerys extends \app\common\model\QiniuGallerys
{
    
    
    /**
     * 处理课程介绍音频链接的返回格式
     *
     * @param $id
     * @return mixed
     * @author aozhuochao
     */
    public function getVideoData($id)
    {
        // todo 等上线就删除，returnArray的处理，2018-01-02 10:46:47
        $request = request();
        $mobile = intval($request->header('mobile', 0));
    
        $isApp = in_array($mobile, [1, 2]);
        if (empty($id)) {
            return (new \helper\JsonEmptyObject())->returnArray(!$isApp);
        }
        
        $data = $this->where(['id' => ['eq', $id]])->field('mediaId, qiniuKey, videoTime')->find();
        
        if (empty($data)) {
            return (new \helper\JsonEmptyObject())->returnArray(!$isApp);
        }
        
        return [
            'videoTime' => $data['videoTime'],
            'state'     => !empty($data['qiniuKey']) ? 1 : 2, // 1为url地址，2为mediaId
            'url'       => !empty($data['qiniuKey']) ? $this->getUrlByKey($data['qiniuKey']) : $data['mediaId'],
        ];
    }
    
    
}