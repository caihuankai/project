<script type="text/javascript" src="/lib/bootstrap-suggest/bootstrap-suggest.js"></script>

<link rel="stylesheet" href="/lib/uploadify/uploadify.css"/>
<script type="text/javascript" src="/lib/uploadify/jquery.uploadify.min.js"></script>

<article style="margin-left: -76px;">
    <form action="" method="post" class="form form-horizontal" id="form-add"
          style="padding: 0px 15px;max-width:800px;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" id="form_table">

            <input type="text" class="input-text" style="width: 516px;" id="id" name="id" value="<{$data[0]['group_id']}>" hidden/>

            <tr>
                <td width="25%" height="30" align="right"><span class="c-red">*</span>群名：</td>
                <td width="75%">
                    <input type="text" class="input-text" style="width: 516px;" id="group_name" name="group_name" value="<{$data[0]['name']}>"/>
                </td>
            </tr>

            <tr>
                <td height="10" colspan="2"></td>
            </tr>

            <tr>
                <td width="25%" height="30" align="right"><span class="c-red">*</span>群说明：</td>
                <td width="75%">
                    <textarea class="form-control" rows="3" style="width: 516px;" id="group_desc" name="group_desc"><{$data[0]['remark']}></textarea>
                </td>
            </tr>

            <tr>
                <td height="10" colspan="2"></td>
            </tr>

            <tr>
                <td width="25%" height="30" align="right"><span class="c-red">*</span>群主id：</td>

                <td width="75%">
                    <input type="text" class="input-text" style="width: 516px;" id="user_id" name="user_id"/>
                </td>
            </tr>

            <tr>
                <td height="10" colspan="2"></td>
            </tr>

            <tr>
                <td width="25%" height="30" align="right"><span class="c-red"></span>群图标：</td>
                <td width="75%">
                    <div>
                        <div id="imgPicker"></div>
                    </div>
                    <div style="margin-top: 5px;position: absolute;top: 180px;left: 264px;">
                        <input readonly type="text" class="input-text" style="width: 384px;" id="tmp_group_icon" name="tmp_group_icon" value="<{:config('PIC_DOMAIN').$data[0]['icon']}>"/>
                        <input hidden type="text" class="input-text" style="width: 384px;" id="group_icon" name="group_icon" value="<{$data[0]['icon']}>"/>
                    </div>
                </td>
            </tr>

            <tr>
                <td height="10" colspan="2"></td>
            </tr>

            <tr>
                <td width="25%" height="30" align="right"><span class="c-red">*</span>显示在广场：</td>
                <td width="75%">
                    <{if $data[0]['show_square'] eq 1}>
                    <input checked type="checkbox" id="show_square" name="show_square">
                    <{else}>
                    <input type="checkbox" id="show_square" name="show_square">
                    <{/if}>
                    <label for="show_square">显示/不显示</label>
                </td>
            </tr>

            <tr>
                <td height="10" colspan="2"></td>
            </tr>

        </table>

        <div style="margin-left: 109px;margin-bottom: 26px;">
            <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
            <input class="btn btn-danger radius" type="button" value="&nbsp;&nbsp;取消&nbsp;&nbsp;"onclick="layer_close()"/></td>
        </div>
    </form>
</article>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
    var g_articleNum = 0;

$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});

	$("#form-add").validate({
		rules:{
            group_name:{
				required:true
			},
            group_desc:{
                required:true
            }
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			$.ajax({
				type:"POST",
				url:'./edit',
				data:$('#form-add').serializeArray(),// 你的formid
				async: false,
				beforeSend:function(){
					jz = layer.load(0, {shade: false}); //0代表加载的风格，支持0-2
				},
				error: function(request) {
					layer.close(jz);
					layer.msg("网络错误!", "", "error");
				},
				success: function(data) {
					//关闭加载层
					layer.close(jz);
					if(data.code == 0){
						layer.msg(data.msg, "", "success");
						var index = parent.layer.getFrameIndex(window.name);
						parent.$("button[name='refresh']").click();
						parent.layer.close(index);
					}else{
						layer.msg(data.msg, "", "error");
					}

				}
			});
		}
	});
});
    //上传图片
    $("#imgPicker").uploadify({
        'fileSizeLimit': '6000KB',
        //"height"          : 30,
        "swf": "/lib/uploadify/uploadify.swf",
        "fileObjName": "file",
        "formData":{ 'is_thum': 1,"width":320,"height":320 },
        "buttonText": "上传图片",
        "uploader": "<{$Think.config.UPLOAD_URL}>",
        //"width"           : 120,
        'removeTimeout': 1,
        'fileTypeExts': '*.jpg;*.png;*.jpeg;*.gif;',
        "onUploadSuccess": uploadPicture,
        'onFallback': function () {
            alert('未检测到兼容版本的Flash.');
        }
    });
    function uploadPicture(file, data) {
        var data = $.parseJSON(data);
        console.log(data);
        var src = '';
        if (data.code==0) {
            data = data.data.file;
            var imgSrc = "";
            if(data.thum!=undefined)
            {
                imgSrc = data.path +"?thum="+data.thum+"&thumWidth="+data.thumWidth+"&thumHeight="+data.thumHeight+"&path="+data.path+
                    "&with="+data.with+"&high="+data.high
            }
            else
            {
                imgSrc = data.path +"?thum=no";//没有缩略图
            }

            $("#tmp_group_icon").val("<{:config('PIC_DOMAIN')}>"+imgSrc);
            $("#group_icon").val(imgSrc);
            src = data.url || '<{$Think.config.PIC_DOMAIN}>' + data.path;
        }
        else
        {
            layer.msg("上传失败，请检查文件大小以及类型");
        }
    }

</script>