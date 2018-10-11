<div class="panel panel-default">
	<div class="panel-header">广告新增</div>
	<div class="panel-body">
		<form action="/ads/add"" method="post" enctype="multipart/form-data" class="form form-horizontal responsive" id="demoform">
			<div class="row cl">
				<label class="form-label col-xs-3">广告标题：</label>
				<div class="formControls col-xs-8">
					<input type="text" class="input-text" placeholder="2~16个字符，字母/中文/数字/下划线" name="adName" id="adName" autocomplete="off">
				</div>
			</div>
			
			<div class="row cl">
				<label class="form-label col-xs-3">广告图片：</label>
                <div class="formControls col-xs-8">
					<span class="btn-upload form-group">
                        <input class="input-text upload-url" type="text" name="uploadfile-2" id="uploadfile-2" readonly
                               datatype="*" nullmsg="请添加附件！" style="width:200px">
                            
                        <a href="javascript:void();" class="btn btn-primary upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>
                        <input type="file" multiple name="file" class="input-file" onchange="previewImage(this, 'prvid')">
					</span>
                    <span>&emsp;（尺寸：750 * 236   大小：1M以下）</span>
					
					<!--
					<label class="form-label col-xs-4 col-sm-2">图片预览：</label>
					-->
					<div id="prvid" class="formControls col-xs-8 col-sm-9" style="display:none;">
						<img src=""  style="width: 180px;height: 60px;" class="img-responsive" alt="广告图片">
					</div>

                </div>
			</div>
			
			
			<div class="row cl">
				<label class="form-label col-xs-3">广告网址：</label>
				<div class="formControls col-xs-8">
					<input type="text" class="input-text" placeholder="http://" name="adURL" id="adURL" datatype="url" nullmsg="网址不能为空">
				</div>
			</div>
			<!--
			<div class="row cl">
				<label class="form-label col-xs-3">生效开始时间：</label>
				<div class="formControls col-xs-8">
					<input type="text"  placeholder="生效开始时间" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="logmin" class="input-text Wdate" name="adStartDate" style="width:120px;">
				</div>
			</div>
			
			<div class="row cl">
				<label class="form-label col-xs-3">生效结束时间：</label>
				<div class="formControls col-xs-8">
					<input type="text" placeholder="生效结束时间" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d' })" id="logmax" class="input-text Wdate" name="adEndDate" style="width:120px;">
				</div>
			</div>
-->
			<div class="row cl">
				<label class="form-label col-xs-3">排序号：</label>
				<div class="formControls col-xs-8">
					<input type="text" class="input-text" autocomplete="off" placeholder="整数" name="adSort" id="adSort">
				</div>
			</div>
			<!--
			<div class="row cl">
				<label class="form-label col-xs-3">备注：</label>
				<div class="formControls col-xs-8">
					<textarea cols="" rows="" class="textarea" name="remark" id="remark"  placeholder="说点什么...最少输入10个字符"></textarea>
				</div>
			</div>
			-->
			<div class="row cl">
				<label class="form-label col-xs-3"><span class="c-red">*</span>状态：</label>
				<div class="formControls col-xs-8">
					<div class="radio-box">
						<input name="adStatus" type="radio" id="adStatus-1" value="1" checked>
						<label for="adStatus-1">启用</label>
					</div>
					<div class="radio-box">
						<input type="radio" id="adStatus-2" name="adStatus" value="-1">
						<label for="adStatus-2">禁用</label>
					</div>
				</div>
			</div>
			
			<div class="row cl">
				<div class="col-xs-8 col-xs-offset-3">
					<input class="btn btn-primary" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
				</div>
			</div>
		</form>
	</div>
</div>

<!--普通弹出层-->
<div id="modal-demo" class="modal fade middle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content radius">
			<div class="modal-header">
				<h3 class="modal-title">对话框标题</h3>
				<a class="close" data-dismiss="modal" aria-hidden="true" href="javascript:void();">×</a>
			</div>
			<div class="modal-body">
				<p>对话框内容…</p>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary">确定</button>
				<button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="__ROOT__/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="__ROOT__/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="__ROOT__/lib/jquery.SuperSlide/2.1.1/jquery.SuperSlide.min.js"></script>
<script type="text/javascript" src="__ROOT__/lib/jquery.validation/1.14.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="__ROOT__/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="__ROOT__/lib/jquery.validation/1.14.0/messages_zh.min.js"></script>
<script>
	$("#demoform").validate({
	rules:{
		adName:{
			required:true,
			minlength:2,
			maxlength:16
		},
		adURL:{
			required:true,
			url:true,
		},
		adStartDate:{
			required:true,
			date:true
		},
		adEndDate:{
			required:true,
			date:true
			
		},
		adSort:{
			required:true,
			digits:true
		},
		remark:{
			maxlength:500,
		}
	},
	onkeyup:false,
	focusCleanup:true,
	success:"valid",
	submitHandler:function(form){
		$("#modal-shenqing-success").modal("show");
		$(form).ajaxSubmit();
	}
});
</script>

<!--
<form id="adsForm" action="/ads/add" enctype="multipart/form-data" method="post">
<table class='talk-form talk-box-top'>   
       <tr>
          <th>广告标题<font color='red'>*</font>：</th>
          <td>
            <input type="text" id="adName" name="adName" value='' class="ipt" />
          </td>
       </tr>
	   
	   <tr>
          <th>广告图片<font color='red'>*</font>：</th>
          <td>
			 <input id="files" type="file" name="file" onchange="previewImage(this, 'prvid')" multiple="multiple">
          </td>
       </tr>
	   
	   <tr>
          <th>图片预览：</th>
          <td>
　　         <div id="prvid"></div> 
          </td>
       </tr>
	   
	   <tr>
          <th>广告网址<font color='red'>*</font>：</th>
          <td>
            <input type="text" id="adURL" name="adURL" value='' class="ipt" />
          </td>
       </tr>
	   
	   <tr>
          <th>广告开始时间<font color='red'>*</font>：</th>
          <td>
            <input type="text" id="adStartDate" name="adStartDate" value='' class="ipt" />
          </td>
       </tr>
	   
       <tr>
          <th>广告结束时间<font color='red'>*</font>：</th>
          <td>
            <input type="text" id="adEndDate" name="adEndDate" value='' class="ipt" />
          </td>
       </tr>
	   
       <tr>
          <th>广告排序号<font color='red'> </font>：</th>
          <td>
            <input type='text' id='adSort' name="adSort" value='' class='ipt' maxLength='10'/>
          </td>
       </tr>
	      
  <tr>
     <td colspan='2' align='center'>
       <input type="hidden" name="Id" id="adId" class="ipt" value="" />
       <input type="submit" value="提交" class='btn btn-blue' />
       <input type="button" onclick="layer_close();" class='btn' value="返回" />
     </td>
  </tr>
</table>
</form>
-->
<script>
function previewImage(file, prvid) {
    // file：file控件 
    // prvid: 图片预览容器 
    var tip = "Expect jpg or png or gif!"; // 设定提示信息 
    var filters = {
        "jpeg": "/9j/4",
        "gif": "R0lGOD",
        "png": "iVBORw"
    }
    var prvbox = document.getElementById(prvid);
	prvbox.style.display="block";
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
