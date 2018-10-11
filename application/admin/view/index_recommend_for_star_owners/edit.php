<style>
    .row{
        margin: 8px 0;
        padding: 0;
    }
</style>


<form action="#" method="post" id="form">
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">名称：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <{$data['name']}>
        </div>
    </div>
    
<!--    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">链接：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <{$data['link']}>
        </div>
    </div>-->
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">人气增长率：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" style="width:40px;margin-right: 5px;" class="input-text valid" placeholder="" name="type_inc" value="<{$data['type_inc']}>" id="type_inc">%
        </div>
    </div>
    
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">排序：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text valid" placeholder="" name="sort" value="<{$data['sort']}>" id="sort">
            <br>
            <small>数值越小，越靠前</small>
        </div>
    </div>
    
    <div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>状态：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<div class="radio-box">
					<input type="radio" id="status-1" name="status" value="1" <{eq name="$data['status']" value="1" }>checked<{/eq}>>
					<label for="status-1">启用</label>
				</div>
				<div class="radio-box">
					<input type="radio" id="status-2" name="status" value="2" <{eq name="$data['status']" value="2" }>checked<{/eq}>>
					<label for="status-2">停用</label>
				</div>
			</div>
		</div>
    
    <br>
    <div class="row cl">
        <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
            <input class="btn btn-primary" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
        </div>
    </div>
    
</form>


<script>

    $('#form').validate({
        rules:{
            sort:{
                required:true,
                digits: true
            },
            status: {
            	required:true,
            }
        },
        messages:{
            sort: {
                required: '请输入排序',
                digits: '排序有误'
            },
            status: {
                required: '请选择状态',
            }
        },
        onkeyup:false, // 在 keyup 时验证
        focusCleanup:true, // 如果是 true 那么当未通过验证的元素获得焦点时，移除错误提示。避免和 focusInvalid 一起用。
        submitHandler:function (form, event){
            event.preventDefault();

            requestAjax({
                sort: $('#sort').val(),
                status: $('input[name=status]:checked').val(),
                type_inc:$('#type_inc').val()
            }, {
                success: function(data){
                    jsonData = getJsonData(data);
                    if (jsonData) {
                        layer.msg('提交成功');
                        setTimeout("layer_close();", 1000);
                        window.parent.adminTableRefresh();
                    }else if(data.msg){
                        layer.msg(data.msg);
                    }
                }
            });
        },
        errorPlacement: function (error,element) {
            layer.msg(error.html());
        }
    });
    
</script>