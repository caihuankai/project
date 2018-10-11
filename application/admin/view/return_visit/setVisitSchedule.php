<style>
    .row{
        margin: 8px 0;
        padding: 0;
    }
</style>

<form action="#" method="post" enctype="multipart/form-data" id="form">
	<div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">回访日期：</label>
        <div class="formControls col-xs-8 col-sm-9">
        	<input type="text" onfocus="WdatePicker({minDate:'%y-%M-%d'})" id="preset_time" class="input-text Wdate" style="width:120px;">
        </div>
    </div>
	
	<br>
    <div class="row cl">
        <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
            <input class="btn btn-primary" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;" >
        </div>
    </div>

</form>


<script>

	$('#form').validate({
        rules:{
        	"preset_time":{
                required:true,
            },
        },
        messages:{
        	"preset_time": '请选择预设日期',
        },
        onkeyup:false, // 在 keyup 时验证
        submitHandler:function (form){
            requestAjax({
            	presetTime: $('#preset_time').val(),
            }, {
            	url: "#",
                success: function(e){
                     if (e.code == 200) {
                    	 layer.msg(e.data);
                         setTimeout(function(){
                         	window.parent.adminTableRefresh();
                         	layer_close();
	                     }, 1000);
                     }else {
                         layer.msg(e.msg);
                     }
                }
            });
            
        }
    });

</script>