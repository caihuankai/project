<style>
    .row{
        margin: 8px 0;
        padding: 0;
    }
    
</style>

<form action="#" method="post" enctype="multipart/form-data" id="form">
	<div class="row cl">
        <h3 class="form-label col-xs-12 col-sm-12 text-center">设置虚拟礼点</h3>
    </div>
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3 text-right" style=" font-size:20px;">虚拟礼点:</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text valid" id="virtual-account-balance" name="virtual-account-balance" autocomplete="Off" value="">
        </div>
    </div>
    
    <div class="row cl">
        <label class="form-label col-xs-12 col-sm-12 text-danger">（虚拟礼点仅用于测试，如不需要请务必留空！   虚拟礼点不能转换为收益，不参与讲师和流量主的收益/分成。）</label>
    </div>

	<div class="row cl">
        <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
            <input class="btn btn-primary" type="submit" value="&nbsp;&nbsp;确认&nbsp;&nbsp;">
        </div>
    </div>
</form>

<script>

	jQuery.validator.addMethod("check-number", function(value, element, param) {
	    return this.optional(element) || ( value > 0 ? (value >= 0.01 && value <= 9999999.99) : (false) );
	}, $.validator.format("限制7位整数，2位小数"));

	$('#form').validate({
        rules:{
        	"virtual-account-balance":{
                required:true,
                number: true,
            	'check-number': true
            },
        },
        messages:{
        	"virtual-account-balance": {
                required: '请输入虚拟礼点',
                min: '输入有误'
            },
        },
        onkeyup:false,
        success:"valid",
        submitHandler:function (form){
			var virtualAccountBalance = $('#virtual-account-balance').val();
            requestAjax({
                virtualAccountBalance: virtualAccountBalance,
            }, {
                success: function(e){
                	 if (e.code == 200) {
                         layer.msg(e.data);
                         window.parent.document.getElementById("account-balance").innerHTML = parseFloat(virtualAccountBalance).toFixed(2);
                         setTimeout("layer_close();", 1000);
                     }else {
                         layer.msg(e.msg);
                     }
                }
            });
            
        },
    });
    
</script>