<style>
    .row{
        margin: 8px 0;
        padding: 0;
    }
</style>


<form class="form form-horizontal" id="form-admin-add">
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">显示位置：</label>
        <div class="formControls col-xs-8 col-sm-9">
        <select name="type" id="type" class="form-control form-select" >
            <{if $data['type'] eq 1}>
                <option selected="selected" value="1">360</option>
                <option value="2">搜狗</option>
                <option value="3">百度</option>
            <{/if}>
            <{if $data['type'] eq 2}>
                <option value="1">360</option>
                <option selected="selected" value="2">搜狗</option>
                <option value="3">百度</option>
            <{/if}>
            <{if $data['type'] eq 3}>
                <option value="1">360</option>
                <option value="2">搜狗</option>
                <option selected="selected" value="3">百度</option>
            <{/if}>
            
        </select>
        </div>
    </div>

    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">标题：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text valid" placeholder="" name="wechatId" value="<{$data['wechatId']}>" id="wechatId">
            <br>
        </div>
    </div>

    <input type="hidden" class="input-text" value="<{$data['id']}>" id="id" name="id">

    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">图片（图片不能大于1024KB）：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <span class="btn-upload form-group">
            <input class="input-text upload-url" type="text" name="uploadfile" id="uploadfile" readonly  datatype="*" nullmsg="请添加附件！" style="width:200px">
            <a href="javascript:void();" class="btn btn-primary upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>
            <input type="file" multiple name="file" id="file" class="input-file" onchange="uploadImg()">
            </span>
        </div>
    </div>

    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">图片预览：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <img src="<{$data['qrcodeUrl']}>" id="showImage" name="showImage" alt="" height="200" width="200">
            <br>
        </div>
    </div>

    <input type="hidden" class="input-text valid" placeholder="" name="qrcodeUrl" value="<{$data['qrcodeUrl']}>" id="qrcodeUrl">
    
    <br>
    <div class="row cl">
        <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
            <input class="btn btn-primary" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
        </div>
    </div>
    
</form>

<script>
    $(function(){
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });

        $("#form-admin-add").validate({
            onkeyup:false,
            focusCleanup:true,
            success:"valid",
            submitHandler:function(form){
                var url = "#";
                var jz;
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
                        // layer.msg(data);
                        //关闭加载层
                        layer.close(jz);
                        if(data.status == 1){
                            layer.msg(data.msg, "", "success");
                            setTimeout(function(){
                                var index = parent.layer.getFrameIndex(window.name);
                                parent.$table.bootstrapTable('refresh');
                                parent.layer.close(index);
                            },500)
                        }else{
                            layer.msg(data.msg, "", "error");

                        }

                    }
                });
            }
        });

        $('#file').on('change', function(){
            if (typeof this.files[0] == undefined) {
                console.log('file undefined');
                return null;
            }
            console.log(this.files[0]);
            var formData = new FormData();
            formData.append("img",$("#file")[0].files[0]);
            $.ajax({  
                 url: '/Gift/img' ,  
                 type: 'POST',  
                 data: formData,  
                 async: false,  
                 cache: false,  
                 contentType: false,  
                 processData: false,  
                 success: function (returndata) {
                    if (returndata.code == 1) {
                        layer.msg('图片上传成功');
                        $("#showImage")[0].src=returndata.key;
                        $("#qrcodeUrl")[0].value=returndata.key;
                    }  else {
                        return layer.msg(returndata.msg);
                    }
                 },  
                 error: function (errdata) {  
                     layer.msg(errdata);
                 }  
            });  
            
        });
    });
</script>