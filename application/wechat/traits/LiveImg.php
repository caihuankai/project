<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2017/6/23
 * Time: 15:00
 */

namespace app\wechat\traits;


trait LiveImg
{
    
    /**
     * 详情页数据
     *
     * @param int $type
     * @return mixed
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function setupContentTrait($id, $content, $type = 1)
    {
        /** @var \app\common\model\LiveImg $model */
        $model = model('common/LiveImg');
        $imgData = $model->getImgList($id, $type);
        
        
        return $this->sucSysJson([
            'content' => $content,
            'id' => $id,
            'imgData' => $imgData,
        ]);
    }
    
    
}