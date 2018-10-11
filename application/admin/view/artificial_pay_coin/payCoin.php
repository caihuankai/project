
<form class="form form-horizontal" id="form-admin-add">
    <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span></label>
            注意：此操作不可逆，请谨慎操作！
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>商户订单号：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text" value="" required="required" placeholder="" id="third_order_no" name="third_order_no" maxlength="20">
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>购买用户ID：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text" value="" required="required" placeholder="" id="user_id" name="user_id" maxlength="20">
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>充值金额：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="number" class="input-text" value="" required="required" placeholder="" id="amount" name="amount" maxlength="20" style="width: 100%;">
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>备注：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <textarea class="textarea" name="content" maxlength="500"></textarea>
        </div>
    </div>
    <div class="row cl">
        <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
            <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
        </div>
    </div>
</form>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
    $(function(){
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });

        $("#form-admin-add").validate({
            onkeyup:false,
            focusCleanup:true,
            success:"valid",
            submitHandler:function(form){
                var url = "./payCoin";
                var jz;
                $.ajax({
                    type:"POST",
                    url:url,
                    data:$('#form-admin-add').serializeArray(),// 你的formid
                    async: false,

                    error: function(request) {
                        layer.close(jz);
                        layer.msg("网络错误!", "", "error");
                    },
                    success: function(data) {
                        //关闭加载层
                        //layer.close(jz);
                        if(data.data.code == 200){
                            layer.msg(data.msg, "", "success");
                            setTimeout(function(){
                                if (window.parent != window && window.parent.hasOwnProperty('adminTableRefresh')){ // 刷新表格
                                    window.parent.adminTableRefresh();
                                }
                                layer_close();
                            },500)
                        }else{
                            layer.close(jz);
                            layer.alert(data.msg, {
                                icon: 1,
                                skin: 'layer-ext-moon', //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
                                time:2000,
                                btn: [ '知道了']
                            })
                        }//
                    }
                });
            }
        });
    });
</script>
