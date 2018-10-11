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
</style>


<form class="form form-horizontal" id="form-admin-add">
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>充值金额：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text valid input-short" placeholder="" autoComplete="Off" name="cost" value="" id="cost">
            <small>元（人民币，精确到小数点后两位）</small>
            <br>
        </div>
    </div>

    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>兑换礼点：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text valid input-short" placeholder="" autoComplete="Off" name="denomination" value="" id="denomination">
            <small>（换算成礼点的数量，精确到小数点后两位）</small>
            <br>
        </div>
    </div>
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">赠送礼点：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text valid input-short" placeholder="" autoComplete="Off" name="bonus" value="" id="bonus">
            <small>（返点赠送的礼点数量，精确到小数点后两位。不赠送为空。）</small>
            <br>
        </div>
    </div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>类型：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<select title="类型" name="type" id="select-type" class="form-control form-select">
		        <{option data="$typeArr" notHeader="true" selected=":1"}>
		    </select>
		</div>
	</div>
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>图片：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <span class="btn-upload form-group">
            <input class="input-text upload-url" type="text" name="uploadfile" id="uploadfile" readonly  datatype="*" nullmsg="请添加附件！" style="width:200px">
            <a href="javascript:void();" class="btn btn-primary upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>
            <input type="file" multiple name="file" id="file" class="input-file" onchange="imgChange(event)">
            </span>
            <small class="image-tips">（图片不能大于1024KB）</small>
        </div>
    </div>

    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">图片预览：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <img src="" id="showImage" name="showImage" alt="" height="200" width="200">
            <br>
        </div>
    </div>

    <br>

    <div class="row cl">
        <label class="form-label col-xs-3"><span class="c-red">*</span>状态：</label>
        <div class="formControls col-xs-8">
            <div class="radio-box">
                <input name="status" type="radio" id="status" value="1" checked>
                <label for="status">启用</label>
            </div>
            <div class="radio-box">
                <input type="radio" id="status" name="status" value="2">
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

    function imgChange(e) {
    	var tip = "仅支持jpg/png/gif的文件";
    	var filters = {
    	    "jpeg": "/9j/4",
    	    "gif": "R0lGOD",
    	    "png": "iVBORw"
    	};
    	var size = e.target.files[0].size/1024;//单位KB
    	if(size > 1024) {
    		alert("上传的文件大小不能超过1024KB！");
    	}
    	if (window.FileReader) { // html5方案 
        	console.log(e.target.files[0].size);
            var fr = new FileReader();
            fr.onload = function(e) {
                var src = e.target.result;
                if (!validateImg(src)) {
                    alert(tip)
                } else {
                   	$("#showImage")[0].src = src;
                }
            }
            fr.readAsDataURL(e.target.files[0]);
        } else { // 降级处理
            if (!/\.jpg$|\.png$|\.gif$/i.test(e.target.value)) {
                alert(tip);
            } else {
            	$("#showImage")[0].src = getImgSrc();
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

    	function getImgSrc() {
    		var url;
    		if (navigator.userAgent.indexOf("MSIE")>=1) { // IE
    			url = e.target.value;
    		} else if(navigator.userAgent.indexOf("Firefox")>0) { // Firefox
    			url = window.URL.createObjectURL(e.target.files.item(0));
    		} else if(navigator.userAgent.indexOf("Chrome")>0) { // Chrome
    			url = window.URL.createObjectURL(e.target.files.item(0));
    		}else {
    			url = window.URL.createObjectURL(e.target.files.item(0));
    		}
    		return url; 
    	}
        
    }


    $(function(){

		jQuery.validator.addMethod("check-number", function(value, element, param) {
	        return this.optional(element) || ( value > 0 ? (value >= 1 && value <= 999999.99) : (false) );
	    }, $.validator.format("限制6位整数，2位小数且大于等于1"));
		
        $("#form-admin-add").validate({
            rules:{
                "cost":{
                	required:true,
                	number: true,
                	'check-number': true
                },
                "denomination":{
                	required:true,
                	number: true,
                	'check-number': true
                },
                "bonus":{
                	number: true,
                	'check-number': true
                },
                "uploadfile":{
                	required:true,
                }
            },
            onkeyup:false,
            success:"valid",
            submitHandler:function(form){
            	var size = document.getElementById("file").files[0].size/1024;//单位KB
            	if(size > 1024) {
            		alert("上传的文件大小不能超过1024KB！");
            		return false;
            	}
            	$(form).ajaxSubmit({
            		type:"POST",
            		url:"./add",
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