<div class="panel panel-default">
	<div class="panel-header">资源新增</div>
	<div class="panel-body">
		<form action="/Resource/add" method="post" enctype="multipart/form-data" class="form form-horizontal responsive" id="demoform">
			<div class="row cl">
                <label class="form-label col-xs-3">资源分类：</label>
				<div class="formControls col-xs-8">
					<span class="select-box">
						<select class="select" size="1" name="resourceClassificationId" datatype="*" nullmsg="请选择资源分类！" onchange="checkPicNumber()">
							<option value="" selected>请选择资源分类</option>
							 <{volist name='data' id='vo'}>
								<option  value="<{$vo.resourceClassificationId}>"><{$vo.resourceClassificationName}></option>
							 <{/volist}>
						</select>
					</span>
                    (<span style="color: red">提示：首页-精品课程模块固定图需删除旧的才能新增</span>)
				</div>
			</div>
			
			<div class="row cl">
				<label class="form-label col-xs-3">资源类型：</label>
				<div class="formControls col-xs-8">
					<span class="select-box">
						<select class="select" size="1" name="resourceType" datatype="*" nullmsg="请选择资源类型！">
							<option value="" selected>请选择资源类型</option>
							<option value="0">图片</option>
							<option value="1">视频</option>
						</select>
					</span>
				</div>
			</div>
			
			<div class="row cl">
				<label class="form-label col-xs-3">提示文字：</label>
				<div class="formControls col-xs-8">
					<input type="text" class="input-text" placeholder="2~16个字符，字母/中文/数字/下划线" name="resourceTip" id="resourceTip" autocomplete="off">
				</div>
			</div>
			<!--
			<div class="row cl">
				<label class="form-label col-xs-3">生效开始时间：</label>
				<div class="formControls col-xs-8">
					<input type="text"  placeholder="生效开始时间" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="logmin" class="input-text Wdate" name="resourceStartDate" style="width:120px;">
				</div>
			</div>
			
			<div class="row cl">
				<label class="form-label col-xs-3">生效结束时间：</label>
				<div class="formControls col-xs-8">
					<input type="text" placeholder="生效结束时间" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d' })" id="logmax" class="input-text Wdate" name="resourceEndDate" style="width:120px;">
				</div>
			</div>
			-->
			<!--
			<div class="row cl">
				<label class="form-label col-xs-3">排序号：</label>
				<div class="formControls col-xs-8">
					<input type="text" class="input-text" autocomplete="off" placeholder="整数" name="resourceSort" id="resourceSort">
				</div>
			</div>
			-->
			<div class="row cl">
				<label class="form-label col-xs-3">资源附件：</label>
				<div class="formControls col-xs-8">
					<span class="btn-upload form-group" style="width: 100%">
					<input class="input-text upload-url" type="text" name="uploadfile-2" id="uploadfile-2" readonly  datatype="*" nullmsg="请添加附件！" style="width:200px">
					<a href="javascript:void();" class="btn btn-primary upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>
					<input type="file" multiple name="file[]" class="input-file">
					</span>
				</div>
			</div>

            <div class="five-pic" style="display: none">
            <div class="row cl">
                <label class="form-label col-xs-3">资源附件2：</label>
                <div class="formControls col-xs-8">
					<span class="btn-upload form-group" style="width: 100%">
					<input class="input-text upload-url" type="text" name="uploadfile-3" id="uploadfile-3" readonly  datatype="*" nullmsg="请添加附件！" style="width:200px">
					<a href="javascript:void();" class="btn btn-primary upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>
					<input type="file" multiple name="file[]" class="input-file">
					</span>
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-3">资源附件3：</label>
                <div class="formControls col-xs-8">
					<span class="btn-upload form-group" style="width: 100%">
					<input class="input-text upload-url" type="text" name="uploadfile-4" id="uploadfile-4" readonly  datatype="*" nullmsg="请添加附件！" style="width:200px">
					<a href="javascript:void();" class="btn btn-primary upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>
					<input type="file" multiple name="file[]" class="input-file">
					</span>
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-3">资源附件4：</label>
                <div class="formControls col-xs-8">
					<span class="btn-upload form-group" style="width: 100%">
					<input class="input-text upload-url" type="text" name="uploadfile-5" id="uploadfile-5" readonly  datatype="*" nullmsg="请添加附件！" style="width:200px">
					<a href="javascript:void();" class="btn btn-primary upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>
					<input type="file" multiple name="file[]" class="input-file">
					</span>
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-3">资源附件5：</label>
                <div class="formControls col-xs-8">
					<span class="btn-upload form-group" style="width: 100%">
					<input class="input-text upload-url" type="text" name="uploadfile-6" id="uploadfile-6" readonly  datatype="*" nullmsg="请添加附件！" style="width:200px">
					<a href="javascript:void();" class="btn btn-primary upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>
					<input type="file" multiple name="file[]" class="input-file">
					</span>
                </div>
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
				<div class="col-xs-8 col-xs-offset-3">
					<input class="btn btn-primary" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
				</div>
			</div>
		</form>
	</div>
</div>
	
<script type="text/javascript">


    function checkPicNumber() {
        if($("[name='resourceClassificationId'] option:selected").text().indexOf('精品课程模块') > -1){
            $('.five-pic').show();
        }else{
            $('.five-pic').hide();
        }
    }

$.validator.addMethod("checkPic", function(value, element) {
	var filepath=$("#uploadfile-2").val();
	//获得上传文件名
	var fileArr=filepath.split("\\");
	var fileTArr=fileArr[fileArr.length-1].toLowerCase().split(".");
	var filetype=fileTArr[fileTArr.length-1];
	//切割出后缀文件名
	if(filetype == "jpg" || filetype == "bmp" || filetype == "png" || filetype == "gif" || filetype == "jpg" || filetype == "jpeg"){
		return true;
	}else{
		return false;
	}
	
	var file_size = 0;
	if ( $.browser.msie) {
	  var img=new Image();
	  img.src=filepath;
	  while(true){
		  if(img.fileSize > 0){
			  if(img.fileSize>3*1024*1024){
				// alert("图片不大于100MB。");
				return false;
			  }
		  }
	  }
	} else {
	  file_size = this.files[0].size;
	  console.log(file_size/1024/1024 + " MB");
	  var size = file_size / 1024;
	  if(size > 10240){
		// alert("上传的文件大小不能超过10M！");
		return false;
	  }
	}
	return true;
}, "上传图片格式或者大小非法");


$("#demoform").validate({
rules:{
	resourceClassificationId:{
		required:true,
		digits:true
	},
	resourceType:{
		required:true,
		digits:true
	},
	file:{
		checkPic:true
	},
	resourceTip:{
		required:true,
		minlength:2,
		maxlength:16
	}
	// resourceStartDate:{
		// required:true,
		// date:true
	// },
	// resourceEndDate:{
		// required:true,
		// date:true
	// },
	// resourceSort:{
		// required:true,
		// digits:true
	// },
	// remark:{
		// maxlength:500,
	// }
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
<form id="resourceClassificationForm" action="/Resource/add" enctype="multipart/form-data" method="post">
<table class='page-container'>

       <tr>
          <th>资源分类<font color='red'>*</font>：</th>
          <td>
            <select id="resourceClassificationId" name="resourceClassificationId" class='ipt' maxLength='20'>
			  <option value="">-请选择-</option>
			   <{volist name='data' id='vo'}>
              <option  value="<{$vo.resourceClassificationId}>"><{$vo.resourceClassificationName}></option>
			   <{/volist}>
            </select>
          </td>
       </tr>

	   <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>资源分类：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<select id="resourceClassificationId" name="resourceClassificationId" class='ipt' maxLength='20'>
				  <option value="">-请选择-</option>
				   <{volist name='data' id='vo'}>
				  <option  value="<{$vo.resourceClassificationId}>"><{$vo.resourceClassificationName}></option>
				   <{/volist}>
				</select>
			</div>
		</div>
	   

	   
	   <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>类型：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<select id="resourceType" name="resourceType" class='ipt' maxLength='20'>
				  <option value="">-请选择-</option>
				  <option value="0">图片</option>
				  <option value="1">视频</option>
				</select>
			</div>
		</div>

	   <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>提示文字：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" id="resourceTip" name="resourceTip" value='' class="ipt" />
			</div>
		</div>

	    <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>生效开始时间：</label>
			<div class="formControls col-xs-8 col-sm-9">
			<input type="text" placeholder="生效开始时间" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="logmin" class="input-text Wdate" name="resourceStartDate" style="width:120px;">
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>生效结束时间：</label>
			<div class="formControls col-xs-8 col-sm-9">
			<input type="text" placeholder="生效结束时间" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d' })" id="logmax" class="input-text Wdate" name="resourceEndDate" style="width:120px;">
			</div>
		</div>

	    <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>排序号：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type='text' id='resourceSort' name="resourceSort" value='' class='ipt' maxLength='10'/>			
			</div>
		</div>

	    <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>图片：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input id="files" type="file" name="file" onchange="previewImage(this, 'prvid')" multiple="multiple">
				<div id="prvid">预览</div> 
			</div>
		</div>
	      
  <tr>
     <td colspan='2' align='center'>
       <input type="hidden" name="Id" id="adId" class="ipt" value="" />
       <input type="submit" value="提交" class='btn btn-blue' />
       <input type="button" onclick="layer_close();" class='btn' value="返回" />
     </td>
  </tr>
</table>
</form>

<script type="text/javascript" src="__ROOT__/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="__ROOT__/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="__ROOT__/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="__ROOT__/lib/laypage/1.2/laypage.js"></script>

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
-->