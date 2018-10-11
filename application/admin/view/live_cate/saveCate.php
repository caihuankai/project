<style>
    .row{
        margin: 0;
    }
</style>


<form action="#" id="cate-form" method="post" class="form form-horizontal">
    <input type="hidden" name="id" id="cate-id" value="<{$Think.get.id??'0'}>" />
    <div class="row cl <{$floorCateSelected && $notHide?'hide':''}>">
        <label class="form-label col-xs-4 col-sm-3">一级分类：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <select title="" name="parent-cate" id="parent-cate">
                <{option data="$floorCate" notHeader="true" selected="$floorCateSelected"}>
            </select>
        </div>
    </div>
    
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><{$childrenCateText}>：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" title="子分类" name="children-cate" id="children-cate" value="<{$data['name']??''}>" />
        </div>
    </div>
    

    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">状态：</label>
        <div class="radio-box">
            <input type="radio" id="able" value="1" class="cate-status" name="status" <?php echo isset($data['status']) && $data['status'] == 2 ?'':'checked';?> >
            <label for="able" class="">启用</label>
        </div>
        <div class="radio-box">
            <input type="radio" id="disable" value="2" class="cate-status" name="status" <?php echo isset($data['status']) && $data['status'] == 2 ?'checked':'';?> >
            <label for="disable" class="">禁用</label>
        </div>
    </div>


    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">排序：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" title="排序" name="sort" id="cate-sort" value="<{$data['sort']??'10'}>" />
            <br>
            <small>数值越小，越靠前</small>
        </div>
    </div>


    <div class="row cl">
        <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
            <input class="btn btn-primary radius" type="submit" value="提交">
        </div>
    </div>
    
</form>


<script>
    
    
    $(function () {
        $('#cate-form').validate({
            rules:{
                'children-cate':{
                    required:true
                }
            },
            messages:{
                'children-cate': '分类名称不能为空'
            },
            onkeyup:false, // 在 keyup 时验证
            focusCleanup:true, // 如果是 true 那么当未通过验证的元素获得焦点时，移除错误提示。避免和 focusInvalid 一起用。
            submitHandler:function (form,event){
                event.preventDefault();

                requestAjax({
                    id: $('#cate-id').val(),
                    parentCate: $('#parent-cate').val(),
                    cateName: $('#children-cate').val() || '',
                    status: $('.cate-status:checked').val(),
                    sort: $('#cate-sort').val()
                }, {
                    success: function(data){
                        jsonData = getJsonData(data);
                        if (jsonData) {
                            layer.msg('提交成功');

                            if (window.parent != window && window.parent.hasOwnProperty('adminTableRefresh')){ // 刷新表格
                                window.parent.adminTableRefresh();
                            }

                            layer_close();
                        }else if(data.msg){
                            layer.msg(data.msg);
                        }
                    }
                });
            }
        });
        
    });
    
</script>






