<link rel="stylesheet" href="/lib/webuploader/webuploader.css" />
<script type="text/javascript" src="/lib/uploadify/jquery.uploadify.min.js"></script>
<script type="text/javascript" src="/lib/webuploader/webuploader.js"></script>
<script type="text/javascript" src="/lib/My97DatePicker/WdatePicker.js"></script>
<article class="page-container">
    <form class="form form-horizontal" id="form-admin-add">
        <input type="hidden" class="input-text" value="<{$data.id}>" placeholder="" id="id" name="id">
        
        <div class="row cl">
            <!-- <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>佣金设置：</label> -->
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>佣金算法：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="百分比" style="width:250px;">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>课程自卖佣金：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<{$data.platform_brokerage}>" placeholder="" id="platform_brokerage" name="platform_brokerage" style="width:250px;" maxlength="3">%
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>课程分销佣金：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<{$data.divide_brokerage}>" placeholder="" id="divide_brokerage" name="divide_brokerage" style="width:250px;" maxlength="3">%
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;保存&nbsp;&nbsp;">

            <input type="button" onclick="data_reset();" class='btn btn-primary radius' value="重置" />
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
            rules:{
                sort:{
                    required:true
                },
                adminRole:{
                    required:true
                },
            },
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
                        if(data.code == 0){
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
            }
        });
    });
    function data_reset(){
        $.ajax({
            type:"POST",
            url:'./reset',
            data:$('#form-admin-add').serializeArray(),// 你的formid
            async: false,
        });
        window.location.reload();
    };
</script>
