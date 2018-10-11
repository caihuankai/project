<?php

namespace app\wechat\traits;

/**
 * Class contentsData
 *
 * @property \think\Request request
 * @package app\wechat\traits
 */
trait contentsData
{
    
    /**
     * 处理介绍图
     *
     * @param \app\common\model\ModelBs $model
     * @param                           $id
     * @return bool|int
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function contentsData(\app\common\model\ModelBs $model, $field, $id, $type = 1)
    {
        $contentsData = $this->request->post('contentsData/a', []);
    
        if (!empty($contentsData)) {
            $model->data($field, !empty($contentsData['content']) ? (new \voku\helper\AntiXSS())->xss_clean($contentsData['content']) : '');
        
            // 保存直播间介绍图
            /** @var \app\common\model\LiveImg $liveImgModel */
            $liveImgModel = model('common/LiveImg');
            if (!$liveImgModel->saveImg(
                $id,
                isset($contentsData['imgData']) ? (array)$contentsData['imgData'] : [],
                $type
            )) {
                return \app\common\controller\JsonResult::ERR_SAVE_ERROR;
            }
        }
        
        return true;
    }
    
}