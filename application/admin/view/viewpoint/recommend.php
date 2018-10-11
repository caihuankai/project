<style>
    .row{
        margin: 8px 0;
        padding: 0;
    }
</style>


<form action="#" method="post" enctype="multipart/form-data" id="form">
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">推荐到：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <span class="select-box">
                <select class="select valid" size="1" name="type" id="type">
                    <{option data="$selectArr" notHeader="true" disabledList="$disabledList"}>
                </select>
            </span>
        </div>
    </div>
    
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">排序：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text valid" placeholder="" name="sort" value="1" id="sort">
            <br>
            <small>数值越小，越靠前</small>
        </div>
    </div>
    
    <!-- 
    <div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">资源附件：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<span class="btn-upload form-group">
			<input class="input-text upload-url" type="text" name="uploadfile" id="uploadfile" readonly  datatype="*" nullmsg="请添加附件！" style="width:200px">
			<a href="javascript:void();" class="btn btn-primary upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>
			<input type="file" multiple name="file" class="input-file">
			</span>
		</div>
	</div>
	 -->
    
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
                min: 1
            },
            type: {
                min: 1
            }
        },
        messages:{
            sort: {
                required: '请输入排序',
                min: '排序有误'
            },
            type: '请选择推荐位置'
        },
        onkeyup:false, // 在 keyup 时验证
        focusCleanup:true, // 如果是 true 那么当未通过验证的元素获得焦点时，移除错误提示。避免和 focusInvalid 一起用。
        submitHandler:function (form, event){
            event.preventDefault();

            var type = $('#type').val();
			var url = '';
            if(type == 1){
            	requestAjax({
                    id: "<{$id}>",
                    sort: $('#sort').val(),
                    type: 5
                }, {
                	url: "<{:url('Ads/saveToAds')}>",
                    success: function(e){
                        if (e.code == 0) {
                            layer.msg(e.msg);
                            setTimeout("layer_close();", 1000);
                        }else {
                            layer.msg(e.msg);
                        }
                    }
                });
            }else {
            	requestAjax({
                    id: "<{$id}>",
                    sort: $('#sort').val(),
                    type: type
                }, {
                    success: function(e){
                        if (e.code == 200) {
                            layer.msg(e.data);
                            setTimeout("layer_close();", 1000);
                        }else {
                            layer.msg(e.msg);
                        }
                    }
                });
            }
            
        },
        errorPlacement: function (error,element) {
            layer.msg(error.html());
        }
    });
</script>