<article class="page-container">
	<form class="form form-horizontal" id="form-article-add" action="/Ads/edit" enctype="multipart/form-data" method="post">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>广告标题：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<{$data['adName']}>" placeholder="" id="adName" name="adName">
			</div>
		</div>
		<!--
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">广告图片：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<div class="uploader-thum-container">
					<div id="fileList" class="uploader-list"></div>
					<div id="filePicker">选择图片</div>
					<button id="btn-star" class="btn btn-default btn-uploadstar radius ml-10">开始上传</button>
				</div>
			</div>
		</div>
		-->
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">广告图片：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<div class="uploader-thum-container">
					<input id="files" type="file" style="display: inline-block;" name="file" onchange="previewImage(this, 'prvid')" multiple="multiple">
                    <span>&emsp;（尺寸：750 * 236   大小：1M以下）</span>
				</div>
			</div>
		</div>
		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">图片预览：</label>
			<div id="prvid" class="formControls col-xs-8 col-sm-9">
				<{if ($data['adFile']!='')}>
				<img src="<{$data['adFile']}>"  style="width: 180px;height: 60px;" class="img-responsive" alt="广告图片">
				<{/if}>
			</div>
		</div>
		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">广告网址：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<{$data['adURL']}>" placeholder="http://" id="adURL" name="adURL">
			</div>
		</div>
<!--
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">评论开始日期：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text"  value="<{$data['adStartDate']}>" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="logmin" class="input-text Wdate" name="adStartDate" style="width:120px;">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">评论结束日期：</label>
			<div class="formControls col-xs-8 col-sm-9">
			    <input type="text" value="<{$data['adEndDate']}>" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d' })" id="logmax" class="input-text Wdate" name="adEndDate" style="width:120px;">
			</div>
		</div>
		-->
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">排序值：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<{$data['adSort']}>" placeholder="" id="adSort" name="adSort">
			</div>
		</div>
		<!--
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">备注：</label>
			<div class="formControls col-xs-8 col-sm-9">
					<textarea cols="" rows="" class="textarea" name="remark" id="remark"  placeholder="说点什么...最少输入10个字符"><{$data['remark']}></textarea>
			</div>
		</div>
		-->
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>状态：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<div class="radio-box">
					<input name="adStatus" type="radio" id="adStatus-1" value="1" <{eq name="$data['adStatus']" value="1" }>checked<{/eq}>>
					<label for="adStatus-1">启用</label>
				</div>
				<div class="radio-box">
					<input type="radio" id="adStatus-2" name="adStatus" value="-1" <{eq name="$data['adStatus']" value="-1" }>checked<{/eq}>>
					<label for="adStatus-2">禁用</label>
				</div>
			</div>
		</div>

		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<input type="hidden" name="Id" id="adId" class="ipt" value="<{$data['adId']+0}>" />
			    <input type="submit" class="btn btn-primary radius" value="提交" class='btn btn-blue' />
			    <input type="button" class="btn btn-default radius" onclick="layer_close();" class='btn' value="返回" />
			</div>
		</div>
	</form>
</article>
<!--请在下方写此页面业务相关的脚本-->

<script type="text/javascript" src="__ROOT__/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="__ROOT__/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__ROOT__/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="__ROOT__/lib/jquery.SuperSlide/2.1.1/jquery.SuperSlide.min.js"></script>
<script type="text/javascript" src="__ROOT__/lib/jquery.validation/1.14.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="__ROOT__/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="__ROOT__/lib/jquery.validation/1.14.0/messages_zh.min.js"></script>
<script type="text/javascript">	
$(function() {
    //表单验证
    $("#form-article-add").validate({
        rules: {
            adName: {
                required: true,
                minlength: 2,
                maxlength: 16
            },
            adURL: {
                required: true,
                url: true,
            },
            adStartDate: {
                required: true,
                date: true
            },
            adEndDate: {
                required: true,
                date: true
            },
            adSort: {
                required: true,
                digits: true
            },
            // remark:{
            // maxlength:500,
            // }
            adStatus: {
                required: true
            }
        },
        onkeyup: false,
        focusCleanup: true,
        success: "valid",
        submitHandler: function (form) {
            form.submit();
            parent.location.reload();
        }
    });
});
</script>

<script>
function previewImage(file, prvid) {
   /* file：file控件 
	* prvid: 图片预览容器 
	*/
    var tip = "Expect jpg or png or gif!"; // 设定提示信息 
    var filters = {
        "jpeg": "/9j/4",
        "gif": "R0lGOD",
        "png": "iVBORw"
    }
    var prvbox = document.getElementById(prvid);
    prvbox.innerHTML = "";
    if (window.FileReader) { // html5方案 
        for (var i = 0,
        f; f = file.files[i]; i++) {
            var fr = new FileReader();
            fr.onload = function(e) {
                var src = e.target.result;
                if (!validateImg(src)) {
                    alert(tip)
                } else {
                    showPrvImg(src);
                }
            }
            fr.readAsDataURL(f);
        }
    } else { // 降级处理
        if (!/\.jpg$|\.png$|\.gif$/i.test(file.value)) {
            alert(tip);
        } else {
            showPrvImg(file.value);
        }
    }

    function validateImg(data) {
        var pos = data.indexOf(",") + 1;
        for (var e in filters) {
            if (data.indexOf(filters[e]) === pos) {
                return e;
            }
        }
        return null;
    }

    function showPrvImg(src) {
        var img = document.createElement("img");
        img.src = src;
        prvbox.appendChild(img);
    }
}
</script>
