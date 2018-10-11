<style>
    .row{
        margin: 8px 0;
        padding: 0;
    }
</style>


<form  class="form form-horizontal responsive" id="form-admin-add">
    
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">排序：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text valid" placeholder="" name="sort" value="1" id="sort">
            <br>
            <small>数值越小，越靠前</small>
        </div>
    </div>
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">资源附件：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <span class="btn-upload form-group">
            <input class="input-text upload-url" type="text" name="uploadfile" id="uploadfile" readonly  datatype="*" nullmsg="请添加附件！" style="width:200px">
            <a href="javascript:void();" class="btn btn-primary upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>
            <input type="file" multiple name="file" class="input-file">
            </span>
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
    $("#demoform").validate({
onkeyup:false,
focusCleanup:true,
success:"valid",
submitHandler:function(form){
    var url = "Ads/recommendHome" + '?id=' + '<{$id}>' + '&datatype=3';
    $.ajax({
        type:"POST",
        url:url,
        data:$('#form-admin-add').serializeArray(),// 你的formid
        async: false,
        beforeSend:function(){
            jz = layer.load(0, {shade: false}); //0代表加载的风格，支持0-2
        },
        error: function(request) {
            layer.close(jz);
            layer.msg("网络错误!", "", "error");
        },
        success: function(data) {
            //关闭加载层
            console.log(data);
        }
    });
}
});
</script>