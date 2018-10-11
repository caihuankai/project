<article>
	<form action="" method="post" class="form form-horizontal" id="form-member-add" style="width: 770px;padding: 0px 15px;">
		<div class="row cl">
			<label for="username" class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="name" name="name">
			</div>
		</div>
		<div class="row cl">
			<label for="email" class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>AppId：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="" name="app_id" id="app_id">
			</div>
		</div>
		<div class="row cl">
			<label for="password"  class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>AppSecret：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="" name="app_secret" id="app_secret">
			</div>
		</div>
		<div class="row cl">
			<label for="password"  class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>原始ID：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="" name="source_id" id="source_id">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>状态：</label>
			<div class="formControls col-xs-8 col-sm-9 skin-minimal">
				<div class="check-box">
					<input type="checkbox" id="status" name="status" checked><label for="status">启用/禁用</label>
					<label for="status">&nbsp;</label>
				</div>
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
</article>

<!--请在下方写此页面业务相关的脚本--> 
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-member-add").validate({
		rules:{
			name:{
				required:true,
			},
			app_id:{
				required:true,
			},
			app_secret:{
				required:true,
			},
			source_id:{
				required:true,
			},
			
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			var url = "./add";
			var jz;
			$.ajax({
				type:"POST",
				url:url,
				data:$('#form-member-add').serializeArray(),// 你的formid
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
						parent.$table.bootstrapTable('refresh');
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