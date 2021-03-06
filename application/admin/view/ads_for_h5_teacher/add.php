<style>
    .row{
        margin: 8px 0;
        padding: 0;
    }
</style>


<form class="form form-horizontal" id="form-admin-add">
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">标题：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text valid" placeholder="" name="adName" value="" id="adName">
            <br>
        </div>
    </div>

    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">跳转类型：</label>
        <div class="formControls col-xs-8 col-sm-9">
        <select name="relevanceType" id="relevanceType" class="form-control form-select" >
            <option value="14">讲师介绍页</option>
            <option value="15">月度课介绍页</option>
            <option value="16">季度课介绍页</option>
            <option value="17">私人订制课页面</option>
        </select>
        </div>
    </div>

    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">ID/链接：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text valid" name="relevanceId" value="" id="relevanceId" placeholder="请输入跳转类型的ID（如跳转类型为链接，请输入链接地址）">
            <br>
            <small></small>
        </div>
    </div>


    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">状态：</label>
        <div class="formControls col-xs-8 col-sm-9">
        <select name="adStatus" id="adStatus" class="form-control form-select" >
            <option value="1">启用</option>
            <option value="-1">禁用</option>
        </select>
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
            <img src="" id="showImage" name="showImage" alt="" height="200" width="200">
            <br>
        </div>
    </div>

    <input type="hidden" class="input-text valid" placeholder="" name="cover_img" value="" id="cover_img">
    
    <br>
    <div class="row cl">
        <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
            <input class="btn btn-primary" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
        </div>
    </div>
    
</form>

<script>
    $(function(){
        
        $("#form-admin-add").validate({
        	rules:{
                "adName":{
                	required:true,
                },
                "relevanceId":{
                	required:true,
                },
                "uploadfile":{
                	required:true,
                },
            },
            onkeyup:false,
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
                    success: function(e) {
                        //关闭加载层
                        layer.close(jz);
                        if(e.code == 200){
                        	layer.msg(e.data);
                            setTimeout(function(){
                            	window.parent.adminTableRefresh();
                            	layer_close();
	                         }, 1000);
                        }else{
                            layer.msg(e.msg);
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