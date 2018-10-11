<style>
    .row{
        margin: 8px 0;
        padding: 0;
    }
    .input-short{
    	width: 120px;
    }
    .form-select{
    	width: auto;
    }
    .image-tips{
    	margin: 15px;
    	color: red;
    }
</style>


<form class="form form-horizontal" id="form-admin-add">
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>导航栏位置：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text valid" placeholder="" autoComplete="Off" name="navigationLocation" value="" id="navigation-location">
        </div>
    </div>
    
    <div class="row cl">
        <label class="form-label col-xs-3"><span class="c-red">*</span>导航栏类型：</label>
        <div class="formControls col-xs-8">
            <div class="radio-box">
                <input type="radio" id="navigation-type" name="navigationType" class="navigationType" value="0" checked>
                <label for="navigationType">公众号</label>
            </div>
            <div class="radio-box">
                <input type="radio" id="navigation-type" name="navigationType" class="navigationType" value="1">
                <label for="navigationType">官网</label>
            </div>
        </div>
    </div>
    
    <div class="row cl">
        <label class="form-label col-xs-3"><span class="c-red">*</span>状态：</label>
        <div class="formControls col-xs-8">
            <div class="radio-box">
                <input type="radio" id="status" name="status" class="status" value="1" checked>
                <label for="status">启用</label>
            </div>
            <div class="radio-box">
                <input type="radio" id="status" name="status" class="status" value="2" >
                <label for="status">停用</label>
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

<script type="text/javascript" src="__ROOT__/static/h-ui/js/H-ui.min.js"></script> 
<script>

    $(function(){

        $("#form-admin-add").validate({
            rules:{
                "navigationLocation":{
                	required:true,
                },
            },
            onkeyup:false,
            success:"valid",
            submitHandler:function(form){

            	requestAjax({
            		navigationLocation: $('#navigation-location').val(),
            		navigationType: $('.navigationType:checked').val(),
            		status: $('.status:checked').val(),
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
    });
</script>