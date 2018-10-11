<!--<article>
  <form action="" method="post" class="form form-horizontal" id="form-password-change" style="padding: 0 15px;">
    <input type="hidden" class="input-text" value="<{$userInfo.id}>" placeholder="" id="id" name="id">
    <input type="hidden" class="input-text" value="<{$userInfo.key}>" placeholder="" id="key" name="key">
    <div class="row cl">
      <label for="password" class="form-label col-xs-4 col-sm-3">
        <span class="c-red">*</span>设置密码：</label>
      <div class="formControls col-xs-8 col-sm-9">
        <input type="password" class="input-text" placeholder="" name="password" id="password"></div>
    </div>
    <div class="row cl">
      <label for="password" class="form-label col-xs-4 col-sm-3">
        <span class="c-red">*</span>确认密码：</label>
      <div class="formControls col-xs-8 col-sm-9">
        <input type="password" class="input-text" placeholder="" name="confirm_password" id="confirm_password"></div>
    </div>
    <div class="row cl">
      <div style="text-align:center;">
        <span class="col-xs-offset-2" style="display:inline-block;">
          <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;"></span>
        <span>
          <input class="btn btn-danger radius" type="button" value="&nbsp;&nbsp;取消&nbsp;&nbsp;" onclick="layer_close()"></span>
      </div>
    </div>
  </form>
</article>-->

<article>
  <form action="" method="post" class="form form-horizontal" id="form-password-change" style="padding:0 15px;">
    <input type="hidden" class="input-text" value="<{$userInfo.id}>" placeholder="" id="id" name="id">
    <input type="hidden" class="input-text" value="<{$userInfo.key}>" placeholder="" id="key" name="key">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="10" colspan="2"></td>
      </tr>
      <tr>
      <tr>
        <td width="25%" height="30" align="right"><span class="c-red">*</span>设置密码：</td>
        <td width="75%"><div class="formControls"><input type="password" class="input-text" placeholder="" name="password" id="password" style="width:230px;"></div></td>
      </tr>
      <tr>
        <td height="20" colspan="2"></td>
      </tr>
      <tr>
        <td height="30" align="right"><span class="c-red">*</span>确认密码：</td>
        <td><div class="formControls"><input type="password" class="input-text" placeholder="" name="confirm_password" id="confirm_password" style="width:230px;"></div></td>
      </tr>
      <tr>
        <td height="20" colspan="2"></td>
      </tr>
      <tr>
        <td height="30" align="right">&nbsp;</td>
        <td>
        	<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
        	<{if condition="$isShowCancelBtn"}>
        	<input class="btn btn-danger radius" type="button" value="&nbsp;&nbsp;取消&nbsp;&nbsp;" onclick="layer_close()">
        	<{/if}>
        </td>
      </tr>
    </table>
  </form>
</article>

<!--请在下方写此页面业务相关的脚本--> 
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-password-change").validate({
		rules:{
			password:{
				required:true,
				minlength:3,
				maxlength:30,
				equalTo: "#confirm_password"
			},

			confirm_password:{
				required:true,
				minlength:3,
				maxlength:30,
				equalTo: "#password"
			},
			
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			var url = "./changepwd";
			var jz;
			$.ajax({
				type:"POST",
				url:url,
				data:$('#form-password-change').serializeArray(),// 你的formid
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
					if(data.code == 1){
						parent.layer.msg(data.msg, "", "success");
						var index = parent.layer.getFrameIndex(window.name);
						parent.layer.close(index);
					}else{
						layer.msg(data.msg, "", "error");
					}
				}
			});
		}
	});
});
</script>