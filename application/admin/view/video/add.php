<style>
    .row{
        margin: 8px 0;
        padding: 0;
    }
    .input-short{
    	width: 120px;
    }
    .form-select{
    	width: auto;
    }
    .image-tips{
    	margin: 15px;
    	color: red;
    }
    /*上传*/
    .upload {
        padding: 5px 8px;
        height: 30px;
        line-height: 30px;
        position: relative;
        text-decoration: none;
        color: #fff;
        border-radius: 0.5rem;
        background-color: #428bca;
    }
    .upload:hover{
        text-decoration: none;
        color: #fffdef;
    }
    #file{
        position: absolute;
        overflow: hidden;
        right: 0;
        top: 0;
        opacity: 0;
        width: 6.5rem;
    }
</style>


<form class="form form-horizontal" id="form-admin-add">
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>视频标题：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text valid" placeholder="" autoComplete="Off" name="title" value="" id="title">
        </div>
    </div>
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>视频封面图：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <img src="http://oqt46pvmm.bkt.clouddn.com/Ft56ta8EDC03VFYIHzFuSjcv5E5_" id="showimg" style="width: 60px;height: 60px;border: 0 solid #000">
            <a class="upload">上传
                <input type="file" multiple  name="file" id="file" style="color: #0e90d2"   onchange="imgChange(event)">
            </a>
        </div>
    </div>
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>所属老师：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text valid" placeholder="填写老师ID" autoComplete="Off" name="userId" value="" id="userId">
        </div>
    </div>
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>视频上传：</label>
        <div class="formControls col-xs-8 col-sm-9">
        	<?php echo \qiNiu\QiNiuHtml::instance()->getVideoHtml('')?>
        	<small class="image-tips">(支持MP4格式，大小不超过100M)</small>
        </div>
    </div>
    
    <div class="row cl">
        <label class="form-label col-xs-3"><span class="c-red">*</span>状态：</label>
        <div class="formControls col-xs-8">
            <div class="radio-box">
                <input name="status" type="radio" id="status" value="1" checked>
                <label for="status">启用</label>
            </div>
            <div class="radio-box">
                <input type="radio" id="status" name="status" value="2" >
                <label for="status">停用</label>
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

	//图片上传
	function imgChange(e) {
	    //console.info(e.target.files[0]);//图片文件
	    var dom =$("input[id^='file']")[0];
	   // console.info(dom.value);//这个是文件的路径 C:\fakepath\icon (5).png
	    var reader = new FileReader();
	    reader.onload = (function (file) {
	        return function (e) {
	            // $("#showimgpath").attr("value",dom.value);
	            $("#showimg").attr("src",this.result);
	            var postimg = this.result;
	            uploadImg(postimg);
	        };
	    })(e.target.files[0]);
	    reader.readAsDataURL(e.target.files[0]);
	}

	function uploadImg(img) {
		$.ajax({
            type: 'POST',
            url: "<{:url('uploadImg')}>",
            data:{
                img:img,
            },// 参数
            async: false,
            dataType: 'json',
            success: function(e){
                if (e.code == 200) {
                	layer.msg('提交成功');
                	$("#showimg").attr("src",e.data);
                }else {
                    layer.msg(e.msg);
                }
            },
            error:function(e) {
                layer.msg(e.msg);
            },
        });
        layer.closeAll('dialog');
    }

    $(function(){

        $("#form-admin-add").validate({
            rules:{
                "title":{
                	required:true,
                },
                "file":{
                	required:true,
                },
                "userId":{
                	required:true,
                    digits: true
                },
            },
            onkeyup:false,
            success:"valid",
            submitHandler:function(form){
				var coverPC = $("#showimg").attr("src");
				var video = $("#admin-qi-niu-upload-div-be-upload-del-1-video").attr("src");
				console.log(coverPC);
				if(coverPC == '' || coverPC == 'http://oqt46pvmm.bkt.clouddn.com/Ft56ta8EDC03VFYIHzFuSjcv5E5_'){
					layer.msg("请选择视频封面图");
					return;
				}else if(video == '') {
					layer.msg("请选择视频文件");
					return;
				}
                
            	$(form).ajaxSubmit({
            		type:"POST",
            		url:"./add",
            		data:{coverPC:coverPC, video:video},
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
                            setTimeout(function(){
                            	window.parent.adminTableRefresh();
                            	layer_close();
	                         }, 1000);
                        }else {
                            layer.msg(e.msg);
                        }
	                }
                });
            }
        });
    });
</script>