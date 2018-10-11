<link rel="stylesheet" href="/lib/webuploader/webuploader.css" />
<script type="text/javascript" src="/lib/uploadify/jquery.uploadify.min.js"></script>
<script type="text/javascript" src="/lib/webuploader/webuploader.js"></script>
<script type="text/javascript" src="/lib/My97DatePicker/WdatePicker.js"></script>
<article class="page-container">
    <form class="form form-horizontal" id="form-admin-add">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>商户订单号：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="third_order_no" name="third_order_no" maxlength="20">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>购买用户ID：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="user_id" name="user_id" maxlength="20">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>购买课程ID：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="class_id" name="class_id" maxlength="20">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>购买时间：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss'})" id="create_time" name="create_time" class="input-text Wdate" value="" style="width:200px;">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>金额：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="amount" name="amount" maxlength="20">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>支付方式：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <select name="pay_type" id="pay_type" class="form-control form-select" >
                    <option value="2">微信支付</option>
                    <option value="1">支付宝支付</option>
                    <option value="3">银联支付</option>
                </select>
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
</article>

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
                var url = "./addArtificialPay";
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

                    }
                });
            }
        });
    });
</script>
