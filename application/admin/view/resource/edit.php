<div class="panel panel-default">
	<div class="panel-header">资源修改</div>
	<div class="panel-body">
		<form action="/Resource/edit" method="post" enctype="multipart/form-data" class="form form-horizontal responsive" id="demoform">
            <input type="hidden" name="remark" value="<?=$data['remark']?>">
			<div class="row cl">
				<label class="form-label col-xs-3">资源分类：</label>
				<div class="formControls col-xs-8">
					<span class="select-box">
					<select class="select" size="1" name="resourceClassificationId" datatype="*" nullmsg="请选择资源分类！">
						<option value="" selected>请选择资源分类</option>
						 <{volist name='datan' id='vo'}>
						 <{if ($data['resourceClassificationId']==$vo.resourceClassificationId)}>
							<option selected value="<{$vo.resourceClassificationId}>"><{$vo.resourceClassificationName}></option>
						 <{else /}>
							<option  value="<{$vo.resourceClassificationId}>"><{$vo.resourceClassificationName}></option>
						 <{/if}>
						 <{/volist}>
					</select>
					</span>
				</div>
			</div>
			
			<div class="row cl">
				<label class="form-label col-xs-3">资源类型：</label>
				<div class="formControls col-xs-8">
					<span class="select-box">
					<select class="select" size="1" name="resourceType" datatype="*" nullmsg="请选择资源类型！">
						<option value="" selected>请选择资源类型</option>
						<option <?=($data['resourceType']==0)?'selected':'';?> value="0">图片</option>
						<option <?=($data['resourceType']==1)?'selected':'';?> value="1">视频</option>
					</select>
					</span>
				</div>
			</div>
			
			<div class="row cl">
				<label class="form-label col-xs-3">提示文字：</label>
				<div class="formControls col-xs-8">
					<input type="text" class="input-text" value="<{$data['resourceTip']}>" placeholder="2~16个字符，字母/中文/数字/下划线" name="resourceTip" id="resourceTip" autocomplete="off">
				</div>
			</div>
			<!--
			<div class="row cl">
				<label class="form-label col-xs-3">生效开始时间：</label>
				<div class="formControls col-xs-8">
					<input type="text"  value="<{$data['resourceStartDate']}>" placeholder="生效开始时间" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="logmin" class="input-text Wdate" name="resourceStartDate" style="width:120px;">
				</div>
			</div>
			
			<div class="row cl">
				<label class="form-label col-xs-3">生效结束时间：</label>
				<div class="formControls col-xs-8">
					<input type="text" value="<{$data['resourceEndDate']}>" placeholder="生效结束时间" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d' })" id="logmax" class="input-text Wdate" name="resourceEndDate" style="width:120px;">
				</div>
			</div>
			-->

			
			<div class="row cl">
				<label class="form-label col-xs-3">资源附件：</label>
				<div class="formControls col-xs-8">
					<span class="btn-upload form-group" style="width: 100%">
					<input class="input-text upload-url" type="text" name="uploadfile-2" id="uploadfile-2" readonly  datatype="*" nullmsg="请添加附件！" style="width:200px">
					<a href="javascript:void();" class="btn btn-primary upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>
					<input type="file" multiple name="file" class="input-file">
					</span>
				</div>
			</div>
			
			<div class="row cl">
				<label class="form-label col-xs-3">预览图：</label>
				<div class="formControls col-xs-8">
					<{if ($data['resourceURL']!='')}>
					<!--
					  <img src="__ROOT__/<{$data['resourceURL']}>">
					  -->
					  <img src="<{$data['resourceURL']}>"  style="width: 180px;height: 60px;">
					<{/if}>
				</div>
			</div>
			

			<div class="row cl">
				<div class="col-xs-8 col-xs-offset-3">
					<input type="hidden" name="Id" id="resourceId" class="ipt" value="<{$data['resourceId']+0}>" />
					<input class="btn btn-primary" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
					<input type="button" onclick="layer_close();" class='btn' value="返回" />
				</div>
			</div>
		</form>
	</div>
</div>


<script type="text/javascript" src="__ROOT__/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="__ROOT__/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="__ROOT__/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="__ROOT__/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
$.validator.addMethod("checkPic", function(value, element) {
	var filepath=$("#uploadfile-2").val();
	if(typeOf(filepath)=="undefined"){
		return true
	}
	
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
    rules: {
        resourceClassificationId: {
            required: true,
            digits: true
        },
        resourceType: {
            required: true,
            digits: true
        },
        resourceTip: {
            required: true,
            minlength: 2,
            maxlength: 16
        },
        // resourceStartDate:{
        // required:true,
        // date:true
        // },
        file: {
            checkPic: true
        },
        // resourceEndDate:{
        // required:true,
        // date:true
        // },
    },
    onkeyup: false,
    focusCleanup: true,
    success: "valid",
    submitHandler: function (form) {
        $(form).ajaxSubmit();
    }
});
</script>

<!--
<form id="resourceClassificationForm" action="/Resource/edit" enctype="multipart/form-data" method="post">
<table class='talk-form talk-box-top'>
		<tr>
          <th width='150'>资源分类<font color='red'>*</font>：</th>
          <td>
            <select id="resourceClassificationId" name="resourceClassificationId" class='ipt' maxLength='20'>
			  <option value="">-请选择-</option>
			<{volist name='datan' id='vo'}>
			{if ($data['resourceClassificationId']!=$vo.resourceClassificationName)}
              <option  selected value="<{$vo.resourceClassificationId}>"><{$vo.resourceClassificationName}></option>
			{else /}
			  <option  value="<{$vo.resourceClassificationId}>"><{$vo.resourceClassificationName}></option>
			{/if}
			<{/volist}>
            </select>
          </td>
       </tr>


		<tr>
          <th width='150'>资源分类<font color='red'>*</font>：</th>
          <td>
            <select id="resourceType" name="resourceType" class='ipt' maxLength='20'>
              <option value="">-请选择-</option>
              <option <?=($data['resourceType']==1)?'selected':'';?> value="1">背景图</option>
			  <option <?=($data['resourceType']==2)?'selected':'';?> value="2">焦点图</option>
			  <option <?=($data['resourceType']==3)?'selected':'';?> value="3">缩略图</option>
			  <option <?=($data['resourceType']==4)?'selected':'';?> value="4">图标</option>
            </select>
          </td>
       </tr>
	   
       <tr>
          <th>提示文字<font color='red'>*</font>：</th>
          <td>
            <input type="text" id="resourceTip" name="resourceTip" value="<{$data['resourceTip']}>" class="ipt" />
          </td>
       </tr>
	   
	   <tr>
          <th>生效开始时间<font color='red'>*</font>：</th>
          <td>
            <input type="text" id="resourceStartDate" name="resourceStartDate" value="<{$data['resourceStartDate']}>" class="ipt" />
          </td>
       </tr>
	   
       <tr>
          <th>生效结束时间<font color='red'>*</font>：</th>
          <td>
            <input type="text" id="resourceEndDate" name="resourceEndDate" value="<{$data['resourceType']}>" class="ipt" />
          </td>
       </tr>
	   
       <tr>
          <th>排序号<font color='red'> </font>：</th>
          <td>
            <input type='text' id='resourceSort' name="resourceSort" value="<{$data['resourceSort']}>" class='ipt' maxLength='10'/>
          </td>
       </tr>
	   
	   <tr>
          <th>图片<font color='red'>*</font>：</th>
          <td>
			 <input id="files" type="file" name="file" onchange="previewImage(this, 'prvid')" multiple="multiple"> 
          </td>
       </tr>
	   
	   <tr>
          <th>预览图<font color='red'>  </font>：</th>
          <td>
            <div id="prvid" style="min-height:30px;">
              <{if ($data['resourceURL']!='')}>
              <img src="__ROOT__/<{$data['resourceURL']}>">
              <{/if}>
            </div>
          </td>
       </tr>
  
  <tr>
     <td colspan='2' align='center'>
       <input type="hidden" name="Id" id="resourceId" class="ipt" value="<{$data['resourceId']+0}>" />
       <input type="submit" value="提交" class='btn btn-blue' />
       <input type="button" onclick="layer_close();" class='btn' value="返回" />
     </td>
  </tr>
</table>
</form>
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