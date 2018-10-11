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
					<input id="files" type="file" name="file" onchange="previewImage(this, 'prvid')" multiple="multiple">
				</div>
			</div>
		</div>
		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">图片预览：</label>
			<div id="prvid" class="formControls col-xs-8 col-sm-9">
				<{if ($data['adFile']!='')}>
				<img src="__ROOT__/<{$data['adFile']}>" class="img-responsive" alt="广告图片">
				<{/if}>
			</div>
		</div>
		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">广告网址：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<{$data['adURL']}>" placeholder="" id="adURL" name="adURL">
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">评论开始日期：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" value="<{$data['adStartDate']}>" onfocus="WdatePicker({ dateFmt:'yyyy-MM-dd HH:mm:ss',maxDate:'#F{$dp.$D(\'commentdatemax\')||\'%y-%M-%d\'}' })" id="adStartDate" name="adStartDate" class="input-text Wdate">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">评论结束日期：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" value="<{$data['adEndDate']}>" onfocus="WdatePicker({ dateFmt:'yyyy-MM-dd HH:mm:ss',minDate:'#F{$dp.$D(\'commentdatemin\')}' })" id="adEndDate" name="adEndDate" class="input-text Wdate">
			</div>
		</div>
		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">排序值：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<{$data['adSort']}>" placeholder="" id="adSort" name="adSort">
			</div>
		</div>

		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
			<!--
				<button onClick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存并提交审核</button>
				<button onClick="article_save();" class="btn btn-secondary radius" type="button"><i class="Hui-iconfont">&#xe632;</i> 保存草稿</button>
				<button onClick="removeIframe();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
				-->
				
				<input type="hidden" name="Id" id="adId" class="ipt" value="<{$data['adId']+0}>" />
			    <input type="submit" class="btn btn-primary radius" value="提交" class='btn btn-blue' />
			    <input type="button" class="btn btn-default radius" onclick="javascript:history.go(-1)" class='btn' value="返回" />
			</div>
		</div>
	</form>
</article>
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="__ROOT__/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="__ROOT__/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="__ROOT__/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="__ROOT__/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript" src="__ROOT__/lib/webuploader/0.1.5/webuploader.min.js"></script> 
<script type="text/javascript" src="__ROOT__/lib/ueditor/1.4.3/ueditor.config.js"></script> 
<script type="text/javascript" src="__ROOT__/lib/ueditor/1.4.3/ueditor.all.min.js"> </script> 
<script type="text/javascript" src="__ROOT__/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	//表单验证
	$("#form-article-add").validate({
		rules:{
			adName:{
				required:true,
			},
			// file:{
				// required:true,
			// },
			// adURL:{
				// required:true,
			// },
			adStartDate:{
				required:true,
			},
			adEndDate:{
				required:true,
			},
			adSort:{
				required:true,
			},
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			$(form).ajaxSubmit();
			var index = parent.layer.getFrameIndex(window.name);
			parent.$('.layui-layer-close1').click();
			parent.layer.close(index);
		}
	});
	
	$list = $("#fileList"),
	$btn = $("#btn-star"),
	state = "pending",
	uploader;

	var uploader = WebUploader.create({
		auto: true,
		swf: 'lib/webuploader/0.1.5/Uploader.swf',
	
		// 文件接收服务端。
		server: 'fileupload.php',
	
		// 选择文件的按钮。可选。
		// 内部根据当前运行是创建，可能是input元素，也可能是flash.
		pick: '#filePicker',
	
		// 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
		resize: false,
		// 只允许选择图片文件。
		accept: {
			title: 'Images',
			extensions: 'gif,jpg,jpeg,bmp,png',
			mimeTypes: 'image/*'
		}
	});
	uploader.on( 'fileQueued', function( file ) {
		var $li = $(
			'<div id="' + file.id + '" class="item">' +
				'<div class="pic-box"><img></div>'+
				'<div class="info">' + file.name + '</div>' +
				'<p class="state">等待上传...</p>'+
			'</div>'
		),
		$img = $li.find('img');
		$list.append( $li );
	
		// 创建缩略图
		// 如果为非图片文件，可以不用调用此方法。
		// thumbnailWidth x thumbnailHeight 为 100 x 100
		uploader.makeThumb( file, function( error, src ) {
			if ( error ) {
				$img.replaceWith('<span>不能预览</span>');
				return;
			}
	
			$img.attr( 'src', src );
		}, thumbnailWidth, thumbnailHeight );
	});
	// 文件上传过程中创建进度条实时显示。
	uploader.on( 'uploadProgress', function( file, percentage ) {
		var $li = $( '#'+file.id ),
			$percent = $li.find('.progress-box .sr-only');
	
		// 避免重复创建
		if ( !$percent.length ) {
			$percent = $('<div class="progress-box"><span class="progress-bar radius"><span class="sr-only" style="width:0%"></span></span></div>').appendTo( $li ).find('.sr-only');
		}
		$li.find(".state").text("上传中");
		$percent.css( 'width', percentage * 100 + '%' );
	});
	
	// 文件上传成功，给item添加成功class, 用样式标记上传成功。
	uploader.on( 'uploadSuccess', function( file ) {
		$( '#'+file.id ).addClass('upload-state-success').find(".state").text("已上传");
	});
	
	// 文件上传失败，显示上传出错。
	uploader.on( 'uploadError', function( file ) {
		$( '#'+file.id ).addClass('upload-state-error').find(".state").text("上传出错");
	});
	
	// 完成上传完了，成功或者失败，先删除进度条。
	uploader.on( 'uploadComplete', function( file ) {
		$( '#'+file.id ).find('.progress-box').fadeOut();
	});
	uploader.on('all', function (type) {
        if (type === 'startUpload') {
            state = 'uploading';
        } else if (type === 'stopUpload') {
            state = 'paused';
        } else if (type === 'uploadFinished') {
            state = 'done';
        }

        if (state === 'uploading') {
            $btn.text('暂停上传');
        } else {
            $btn.text('开始上传');
        }
    });

    $btn.on('click', function () {
        if (state === 'uploading') {
            uploader.stop();
        } else {
            uploader.upload();
        }
    });
	
	var ue = UE.getEditor('editor');
	
});
</script>
<!--/请在上方写此页面业务相关的脚本-->

<script>
/*
function selecttime(flag){
    if(flag==1){
        var endTime = $("#countTimeend").val();
        if(endTime != ""){
            WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',maxDate:endTime})}else{
            WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'})}
    }else{
        var startTime = $("#countTimestart").val();
        if(startTime != ""){
            WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',minDate:startTime})}else{
            WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'})}
    }
 }
 */
</script>
<!--
<form id="AdsForm" action="/Ads/edit" enctype="multipart/form-data" method="post">
<table class='talk-form talk-box-top'>   
	   <tr>
          <th>广告标题<font color='red'>*</font>：</th>
          <td>
            <input type="text" id="adName" name="adName" value="<{$data['adName']}>" class="ipt" />
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
            <div id="prvid" style="min-height:30px;">
              <{if ($data['adFile']!='')}>
              <img src="__ROOT__/<{$data['adFile']}>">
              <{/if}>
            </div>
          </td>
       </tr>
	   
	   <tr>
          <th>广告网址<font color='red'>*</font>：</th>
          <td>
            <input type="text" id="adURL" name="adURL" value="<{$data['adURL']}>" class="ipt" />
          </td>
       </tr>
	   
	   <tr>
          <th>广告开始时间<font color='red'>*</font>：</th>
          <td>
			<input type="text" name="adStartDate" id="adStartDate" onfocus="selecttime(1)" value="<{$data['adStartDate']}>" size="17" class="date" readonly>
          </td>
       </tr>
	   
       <tr>
          <th>广告结束时间<font color='red'>*</font>：</th>
          <td>
			<input type="text" name="adEndDate" id="adEndDate" onfocus="selecttime(2)" value="<{$data['adEndDate']}>" size="17"  class="date" readonly>
          </td>
       </tr>
	   
       <tr>
          <th>广告排序号<font color='red'> </font>：</th>
          <td>
            <input type='text' id='adSort' name="adSort" value="<{$data['adSort']}>" class='ipt' maxLength='10'/>
          </td>
       </tr>  
  <tr>
     <td colspan='2' align='center'>
       <input type="hidden" name="Id" id="adId" class="ipt" value="<{$data['adId']+0}>" />
       <input type="submit" value="提交" class='btn btn-blue' />
       <input type="button" onclick="javascript:history.go(-1)" class='btn' value="返回" />
     </td>
  </tr>
</table>
</form>
-->
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
