<style>
    .row{
        margin: 8px 0;
        padding: 0;
    }
</style>


<form action="#" method="post" id="form">
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">推荐到：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <span class="select-box">
                <select class="select valid" size="1" name="type" id="type">
                    <{option data="$selectArr" notHeader="true" disabledList="$disabledList"}>
                </select>
            </span>
        </div>
    </div>
    
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">排序：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text valid" placeholder="" name="sort" value="<{$Think.get.sort??1}>" id="sort">
            <br>
            <small>数值越小，越靠前</small>
        </div>
    </div>
    
    <br>
    <div class="row cl">
        <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
            <input class="btn btn-primary" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
        </div>
    </div>
    
</form>


<script>

    $('#form').validate({
        rules:{
            sort:{
                required:true,
                min: 1
            },
            type: {
                min: 1
            }
        },
        messages:{
            sort: {
                required: '请输入排序',
                min: '排序有误'
            },
            type: '请选择推荐位置'
        },
        onkeyup:false, // 在 keyup 时验证
        focusCleanup:true, // 如果是 true 那么当未通过验证的元素获得焦点时，移除错误提示。避免和 focusInvalid 一起用。
        submitHandler:function (form, event){
            event.preventDefault();

            requestAjax({
                id: "<{$id}>",
                idType: "<{$Think.get.idType??''}>", // 启用的类型，同时也是当前id的类型
                sort: $('#sort').val(),
                type: $('#type').val()
            }, {
                success: function(data){
                    jsonData = getJsonData(data);
                    if (jsonData) {
                        layer.msg('提交成功');

                        layer_close();
                    }else if(data.msg){
                        layer.msg(data.msg);
                    }
                }
            });
        },
        errorPlacement: function (error,element) {
            layer.msg(error.html());
        }
    });
    
</script>