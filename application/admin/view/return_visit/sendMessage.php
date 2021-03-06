<style>
    .row{
        margin: 8px 0;
        padding: 0;
    }
    #content {
    	width: 735px; 
    	height: 200px;
    	resize:none;
    }
</style>

<form action="#" method="post" enctype="multipart/form-data" id="form">
	<div class="row cl">
        <div class="formControls col-xs-12 col-sm-12">
            <textarea class="input-text valid" placeholder="请输入消息推送内容" name="content" id="content"></textarea>
            <small>仅用户在大策略公众号活动48小时内有效</small>
        </div>
    </div>
	
	<br>
    <div class="row cl">
        <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
        	<input class="btn btn-primary cancel" type="button" value="&nbsp;&nbsp;关闭&nbsp;&nbsp;">
            <input class="btn btn-primary" type="submit" value="&nbsp;&nbsp;推送&nbsp;&nbsp;" style="margin-left: 100px;">
        </div>
    </div>

</form>


<script>

	$('#form').validate({
        rules:{
        	content:{
                required:true,
            },
        },
        messages:{
        	content: '请输入推送内容',
        },
        onkeyup:false, // 在 keyup 时验证
        submitHandler:function (form){

            var content = $('#content').val();
			var url = '';
            requestAjax({
            	content: $('#content').val(),
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

    $(".cancel").click(function (){
    	layer_close();
    });
</script>