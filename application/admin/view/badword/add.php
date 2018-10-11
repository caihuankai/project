<div class="panel panel-default">
<!--
	<div class="panel-header">新增</div>
	-->
	<div class="panel-body">
		<form action="/Badword/add"" method="post" enctype="multipart/form-data" class="form form-horizontal responsive" id="demoform">
			<div class="row cl">
				<label class="form-label col-xs-3">敏感词：</label>
				<div class="formControls col-xs-8">
					<input type="text" class="input-text" placeholder="2~16个字符，字母/中文/数字/下划线" name="findpattern" id="findpattern" autocomplete="off">
				</div>
			</div>
			
			<div class="row cl">
				<label class="form-label col-xs-3">替换词：</label>
				<div class="formControls col-xs-8">
					<input type="text" class="input-text" placeholder="2~16个字符，字母/中文/数字/下划线" name="replacement" id="replacement" autocomplete="off">
				</div>
			</div>
			
			<div class="row cl">
				<label class="form-label col-xs-3">排序号：</label>
				<div class="formControls col-xs-8">
					<input type="text" class="input-text" autocomplete="off" placeholder="整数" name="sort" id="sort">
				</div>
			</div>
			
			<div class="row cl">
				<label class="form-label col-xs-3">备注：</label>
				<div class="formControls col-xs-8">
					<textarea cols="" rows="" class="textarea" name="remark" id="remark"  placeholder=""></textarea>
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
		findpattern:{
			required:true,
			minlength:2,
			maxlength:16
		},
		replacement:{
			required:true,
			minlength:2,
			maxlength:16
		},
		sort:{
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