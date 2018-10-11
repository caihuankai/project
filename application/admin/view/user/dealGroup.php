<!--<article>
	<form action="" method="post" class="form form-horizontal" id="deal-group" style="padding: 0px 15px;">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>人员组：</label>
			<div class="formControls col-xs-8 col-sm-9 skin-minimal">
				<select class="form-control" name="group_id" id="group_id">
					<{volist name="groupInfo" id="vo"}>
					<option value="<{$vo.id}>"><{$vo.name}></option>
					<{/volist}>
				</select>
			</div>
		</div>
		<div class="row cl">
			<div>
				<span class="col-xs-offset-2">
					<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
				</span>

				<span>
					<input class="btn btn-danger radius" type="button" value="&nbsp;&nbsp;取消&nbsp;&nbsp;" onclick="layer_close()">
				</span>
			</div>
		</div>
	</form>
</article>-->

<article>
  <form action="" method="post" class="form form-horizontal" id="deal-group" style="padding: 0px 15px;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="10" colspan="2"></td>
      </tr>
      <tr>
      <tr>
        <td width="25%" height="30" align="right"><span class="c-red">*</span>人员组：</td>
        <td width="75%"><select class="form-control" name="group_id" id="group_id">
            <{volist name="groupInfo" id="vo"}>
            <option value="<{$vo.id}>"><{$vo.name}></option>
            <{/volist}>
          </select></td>
      </tr>
      <tr>
        <td height="20" colspan="2"></td>
      </tr>
      <tr>
        <td height="30" align="right">&nbsp;</td>
        <td><input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
          <input class="btn btn-danger radius" type="button" value="&nbsp;&nbsp;取消&nbsp;&nbsp;" onclick="layer_close()"></td>
      </tr>
    </table>
  </form>
</article>

<!--请在下方写此页面业务相关的脚本--> 
<script type="text/javascript">
$(function(){
	
	$("#deal-group").validate({
		rules:{
			username:{
				required:true,
				minlength:3,
				maxlength:30
			},
			email:{
				required:true,
				email:true,
			},
			password:{
				required:true,
				minlength:3,
				maxlength:30
			},
			
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			var data = $('#deal-group').serializeArray();
			data.push({"name":"ids","value":getQueryString('ids')});
			var url = "./dealGroup";
			var jz;
			$.ajax({
				type:"POST",
				url:url,
				data:data,// 你的formid
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

function getQueryString(name) {
	var reg = new RegExp('(^|&)' + name + '=([^&]*)(&|$)', 'i');
	var r = window.location.search.substr(1).match(reg);
	if (r != null) {
		return unescape(r[2]);
	}
	return null;
}
</script>