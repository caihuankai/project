<?php
/** @var \app\admin\model\Sign $signModel */
$signModel = model('admin/Sign');
list($informationSignData, ) = $signModel->getAdminSignData();
unset($signModel);
?>
<style>
    #search_information_tags-children-show-button{
        position: absolute; cursor: pointer; top: 0;right: 0;
        color: #3071a9;
    }
    #search_information_tags-children{
        position: absolute; width: 550px; text-align: left; z-index: 20; height: 25px;
        background: #bcbcbc;
    }
</style>
<{// 搜索时的标签选择}>
标签类别：
<div class="inline-block" style="position: relative">
    <span>
        <select class="form-control" id="search_information_tags" title="请选择标签"
                style="width: 250px;display: inline-block;height: 31px;line-height: 30px;font-size: 13px;padding: 0px 7px 3px 7px;">
            <option value="0" selected="">请选择标签</option>
            
            
            <{volist name="$informationSignData" id="item"}>
            
            <option value="<{$item['id']}>"><{$item['name']}></option>
            
            <{/volist}>
        </select>
    </span>
    <div id="search_information_tags-children">
        <div id="search_information_tags-children-content" style="width: 500px;">
            
        </div>
        <div id="search_information_tags-children-show-button">展开全部</div>
    </div>
</div>


<script>


    (function (){
        var tagsJson = JSON.parse('<{$informationSignData|json_encode}>'),
            childrenDiv = $('#search_information_tags-children'),
            childrenContentDiv = $('#search_information_tags-children-content'),
            childrenButton = $('#search_information_tags-children-show-button');
        
        // 不知为何不能修改style
        childrenDiv.hide();
        childrenButton.hide();
        
        $('#search_information_tags').change(function (){
            var e = $(this),
                val = e.val();

            if (val && tagsJson.hasOwnProperty(val)) {
                childrenDiv.show();
                var temp = '',
                    html = '';
                for (var i in tagsJson[val]['children']){
                    if (tagsJson[val]['children'].hasOwnProperty(i)) {
                        temp = tagsJson[val]['children'][i];
                        html += '<label><input type="checkbox" name="information_sign" value="'+temp['id']+'">'+temp['name']+' &nbsp;</label>';
                    }
                }

                childrenContentDiv.html(html);
                if (childrenContentDiv.height() > 25) {
                    childrenDiv.get(0).style.overflow = 'hidden';
                    childrenButton.show();
                }else{
                    childrenButton.hide();
                }
            }else{
                childrenDiv.hide();
                childrenContentDiv.html('');
            }
        });

        childrenButton.click(function (){
            if (childrenContentDiv.height() > 25 && !childrenContentDiv.data('show')) {
                childrenContentDiv.data('show', true);
                childrenDiv.height('auto');
            }else{
                childrenContentDiv.data('show', false);
                childrenDiv.height('25');
            }
        });
    })();
    
    
    function getInformationTagsChildren(){
        var tags = [];
        $('#search_information_tags-children').find(':checkbox:checked').each(function (){
            tags.push($(this).val());
        });
        
        return tags;
    }
    
</script>

