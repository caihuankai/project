<?php

namespace app\admin\traits;


trait ImgReset
{
    
    
    /**
     * 图片重置的html
     *
     * @param $imgSrc
     * @param array $srcArr
     * @return string
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
	protected function imgResetHtml($imgSrc, $srcArr, $height = '', $width = '')
    {
        $srcArr = json_encode((array)$srcArr);
        $id = uniqid('img-reset-html-');
        $parentId = $id . 'parent';
        $qiNiuHtml = \qiNiu\QiNiuHtml::instance();
        $config = $qiNiuHtml->setFilterImg()->setCurrentButton($parentId, [$id, $id . '-span-upload'], $parentId, $id)
            ->setJsOnFunc('FileUploaded', [$qiNiuHtml, 'jsOnFileUploaded'])->getQiNiuJsConfig();
        $qiNiuHtml->clear();
        
        $html = $qiNiuHtml->headerJs()->toString();
        $html .= "<div id='{$parentId}'>";
        $html .= "<img data-src='{$imgSrc}' src='{$imgSrc}' id='{$id}' height='{$height}' width='{$width}' />";
        $html .= "<span id='{$id}-span-reset' class='c-blue pointer'>&emsp;重置</span>";
        $html .= "<span id='{$id}-span-upload' class='c-blue pointer'>&emsp;上传</span>";
        $html .= <<<SCRIPT
<script>
(function (){
    var i = 0,
        imgJson = {$srcArr},
        imgLength = imgJson.length - 1;
    $('#{$id}-span-reset').click(function (){
        var img = $(this).parent().children('#{$id}');
        
        if (i > imgLength){
            i = 0;
        }
        
        img.attr('src', imgJson[i]);
        ++i;
    });

    (new QiniuJsSDK()).uploader({$config})
})()
</script>
SCRIPT;
    
        $html .= '</div>';
        
        return $html;
    }
    
}