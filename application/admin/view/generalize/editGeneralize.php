<style>
    .row{
        margin: 8px 0;
        padding: 0;
    }
</style>


<form class="form form-horizontal" id="form-admin-add">
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">推广标题：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text valid" placeholder="" name="title" value="<{$data['title']}>" id="title">
            <br>
        </div>
    </div>

    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">跳转类型：</label>
        <div class="formControls col-xs-8 col-sm-9">
        <select name="target_type" id="target_type" class="form-control form-select" >
            <{if $data['target_type'] eq 1}>
                <option selected="selected" value="1">课程</option>
                <option value="2">观点</option>
                <option value="3">外链</option>
                <option value="4">讲师介绍页</option>
            <{/if}>
            <{if $data['target_type'] eq 2}>
                <option value="1">课程</option>
                <option selected="selected"  value="2">观点</option>
                <option value="3">外链</option>
                <option value="4">讲师介绍页</option>
            <{/if}>
            <{if $data['target_type'] eq 3}>
                <option value="1">课程</option>
                <option value="2">观点</option>
                <option selected="selected" value="3">外链</option>
                <option value="4">讲师介绍页</option>
            <{/if}>
            <{if $data['target_type'] eq 4}>
                <option value="1">课程</option>
                <option value="2">观点</option>
                <option value="3">外链</option>
                <option selected="selected" value="4">讲师介绍页</option>
            <{/if}>
        </select>
        </div>
    </div>

    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">ID/链接：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text valid" name="type_id" value="<{$data['type_id']}>" id="type_id" placeholder="请输入跳转类型的ID（如跳转类型为链接，请输入链接地址）">
            <br>
            <small></small>
        </div>
    </div>


    <div class="row cl">
        <label class="form-label col-xs-3"><span class="c-red">*</span>状态：</label>
        <div class="formControls col-xs-8">
            <div class="radio-box">
                <select name="status" id="status" class="form-control form-select" >
                    <{if $data['status'] eq 1}>
                        <option selected="selected" value="1">启用</option>
                        <option value="2">禁用</option>
                    <{/if}>
                    <{if $data['status'] eq 2}>
                        <option value="1">启用</option>
                        <option selected="selected" value="2">禁用</option>
                    <{/if}>
                </select>
            </div>
        </div>
    </div>

    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">封面图片：</label>
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
            <img src="<{$data['cover_img']}>" id="showImage" name="showImage" alt="" height="200" width="200">
            <br>
        </div>
    </div>

    <input type="hidden" class="input-text valid" placeholder="" name="cover_img" value="<{$data['cover_img']}>" id="cover_img">
    
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
                        $("#cover_img")[0].value=returndata.key;
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