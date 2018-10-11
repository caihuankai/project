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
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>角色：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <select title="角色" name="" id="select-user-level" class="form-control form-select">
		        <{option data="$userLevelArr" notHeader="true" selected="$userLevel"}>
		    </select>
        </div>
    </div>
	
	<br>
    <div class="row cl">
        <div class="">
            <input class="btn btn-primary" type="submit" value="&nbsp;&nbsp;确认&nbsp;&nbsp;" style="margin-left: 100px;">
        	<input class="btn btn-primary cancel" type="button" value="&nbsp;&nbsp;关闭&nbsp;&nbsp;">
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

            requestAjax({
            	userLevel: $('#select-user-level').val(),
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