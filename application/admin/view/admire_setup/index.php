<article class="page-container">
	<form class="#form form-horizontal" id="form-admin-add">

		<div>
			<label ></label>
		</div>
		<?php foreach($data as $k => $v){ ?>
			<div class="row cl">
	            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span><{$v.admire_name}>：</label>
	            <div class="formControls col-xs-8 col-sm-9">
	            	<{if $v.open_status eq 1}>
		                <input type="radio" value="1" name="<{$v.id}>t" id="<{$v.id}>t"  checked>开启
	                	<input type="radio" value="2" name="<{$v.id}>t" id="<{$v.id}>t">关闭
	            	<{/if}>
	            	<{if $v.open_status eq 2}>
		                <input type="radio" value="1" name="<{$v.id}>t" id="<{$v.id}>t" >开启
	                	<input type="radio" value="2" name="<{$v.id}>t" id="<{$v.id}>t" checked>关闭
	            	<{/if}>
	            </div>
	        </div>
	        </br>
		<?php } ?>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">			
				<!-- <input type="hidden" name="Id" id="id" class="ipt" value="" /> -->
			    <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;保存&nbsp;&nbsp;">
			    <input type="button" onclick="initial_v();" class='btn btn-primary radius' value="重置" />
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
	$("#form-admin-add").validate({
        onkeyup:false,
        focusCleanup:true,
        success:"valid",
        submitHandler:function(form){
            var url = "./index";
            var jz;
            $.ajax({
                type:"POST",
                url:url,
                data:$('#form-admin-add').serializeArray(),// 你的formid
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
                    if(data.status == 1){
                        layer.msg(data.msg, "", "success");
                        setTimeout(function(){
                            var index = parent.layer.getFrameIndex(window.name);
                            parent.$table.bootstrapTable('refresh');
                            parent.layer.close(index);
                        },500)
                    }else{
                        layer.msg(data.msg, "", "error");

                    }
                    setTimeout(function(){
                        window.location.reload();
                    },500)
                }
            });
        }
	});
});
function initial_v(){
    $.ajax({
        type:"POST",
        url:'./reset',
        data:$('#form-admin-add').serializeArray(),// 你的formid
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
            if(data.status == 1){
                layer.msg(data.msg, "", "success");
                setTimeout(function(){
                    var index = parent.layer.getFrameIndex(window.name);
                    parent.$table.bootstrapTable('refresh');
                    parent.layer.close(index);
                },500)
            }else{
                layer.msg(data.msg, "", "error");

            }

        }
    });
    window.location.reload();
    };
</script>
<!--/请在上方写此页面业务相关的脚本-->

