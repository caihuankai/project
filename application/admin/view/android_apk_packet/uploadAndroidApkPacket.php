<style>
	.row{
		margin: 8px 0;
		padding: 0;
	}
	.input-short{
		width: 120px;
	}
	.tips{
		margin: 15px;
		color: red;
	}
</style>

<form class="form form-horizontal" id="form-admin-add">
	<div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>安卓APK：</label>
        <div class="formControls col-xs-8 col-sm-9">
        	<!-- 
            <span class="btn-upload">
            <input class="input-text upload-url" type="text" name="uploadfile" id="uploadfile" readonly  datatype="*" nullmsg="请添加附件！" style="width:300px">
            <a href="javascript:void();" class="btn btn-primary upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>
            <input type="file" multiple name="file" id="file" class="input-file" >
            </span>
             -->
            <?php echo \qiNiu\QiNiuHtml::instance()->getAndroidApkUploadHtml('');?>
            <small class="tips">（由于网络原因可能会出现上传失败的情况，请多次尝试直到出现文件名后，确认无误再提交）</small>
        </div>
    </div>
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>版本：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text valid input-short" placeholder="" autoComplete="Off" name="version" value="" id="version">
            <small class="tips">（apk版本号参考：v1.0.1）</small>
            <br>
        </div>
    </div>
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>更新内容：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <textarea cols="50" rows="10" name="content" id="content"  placeholder=""></textarea>
        </div>
    </div>
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>是否强制更新：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <div class="radio-box">
                <input type="radio" id="compulsion" name="compulsion" value="0" checked>
                <label for="status">否</label>
            </div>
            <div class="radio-box">
                <input type="radio" id="compulsion" name="compulsion" value="1">
                <label for="status">是</label>
            </div>
        </div>
    </div>

	<br>
    <div class="row cl">
        <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
            <input class="btn btn-primary" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
        </div>
    </div>
</form>

<script type="text/javascript" src="__ROOT__/static/h-ui/js/H-ui.min.js"></script> 
<script>
$(function(){

	jQuery.validator.addMethod("check-file", function(value, element, param) {
        return this.optional(element) || checkFileName(value);
    }, $.validator.format("文件名不能包含中文"));

	function checkFileName(input) { 
		var reg = new RegExp("[\\u4E00-\\u9FFF]+","g");
		if (reg.test(input)) { 
		  return false; 
		} else { 
		  return true; 
		} 
	}

    $("#form-admin-add").validate({
        rules:{
            "uploadfile":{
            	required:true,
            	'check-file': true
            },
            "version":{
            	required:true,
            },
            "content":{
            	required:true,
            }
        },
        onkeyup:false,
        success:"valid",
        submitHandler:function(form){
        	$(form).ajaxSubmit({
        		type:"POST",
        		url:"#",
        		data:{
					"link":$(".showfileUrl").data("link"),
					"key":$(".showfileUrl").data("key")
                },
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
        			if (e.code == 200) {
                        layer.msg(e.data);
                    }else {
                        layer.msg(e.msg);
                    }
                }
            });
        }
    });
});


</script>