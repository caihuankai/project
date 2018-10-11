<article class="page-container">
	<form class="form form-horizontal" id="form-article-add" action="/Badword/edit" enctype="multipart/form-data" method="post">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>敏感词：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<{$data['findpattern']}>" placeholder="" id="findpattern" name="findpattern">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>替换词：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<{$data['replacement']}>" placeholder="" id="replacement" name="replacement">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">排序值：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<{$data['sort']}>" placeholder="" id="sort" name="sort">
			</div>
		</div>
		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">备注：</label>
			<div class="formControls col-xs-8 col-sm-9">
					<textarea cols="" rows="" class="textarea" name="remark" id="remark"  placeholder=""><{$data['remark']}></textarea>
			</div>
		</div>

		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<input type="hidden" name="id" id="id" class="ipt" value="<{$data['id']+0}>" />
			    <input type="submit" class="btn btn-primary radius" value="提交" class='btn btn-blue' />
			    <input type="button" class="btn btn-default radius" onclick="layer_close();" class='btn' value="返回" />
			</div>
		</div>
	</form>
</article>
<!--请在下方写此页面业务相关的脚本-->

<script type="text/javascript" src="__ROOT__/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="__ROOT__/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="__ROOT__/lib/jquery.SuperSlide/2.1.1/jquery.SuperSlide.min.js"></script>
<script type="text/javascript" src="__ROOT__/lib/jquery.validation/1.14.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="__ROOT__/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="__ROOT__/lib/jquery.validation/1.14.0/messages_zh.min.js"></script>
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
			$(form).ajaxSubmit();
			var index = parent.layer.getFrameIndex(window.name);
			parent.$('.layui-layer-close1').click();
			parent.layer.close(index);
		}
	});
</script>
