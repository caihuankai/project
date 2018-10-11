<article class="page-container">
    <form class="form form-horizontal" id="form-admin-add">
        <input type="hidden" class="input-text" value="<{$data.id}>" placeholder="" id="id" name="id">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>用户名：</label>
            <div class="formControls col-xs-8 col-sm-9">
            	<{$username}>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>金额：</label>
            <div class="formControls col-xs-8 col-sm-9">
            	<{$data.money}>
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>申请时间：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <{$data.create_time}>
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>备注：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <textarea rows="5" style="width:100%;" name="common"><{$data.common}></textarea>
            </div>
        </div>
        
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>推送消息：</label>
            <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                <div class="check-box">
                    <input type="checkbox" name="is_push" id="is_push" checked="checked">
                </div>
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
                var url = "./refusesDone";
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
                        if(data.code == 1){
                            layer.msg(data.msg, "", "success");
                            var index = parent.layer.getFrameIndex(window.name);
                            parent.$table.bootstrapTable('refresh');
                            parent.layer.close(index);
                            /*
                            setTimeout(function(){
                                var index = parent.layer.getFrameIndex(window.name);
                                parent.$table.bootstrapTable('refresh');
                                parent.layer.close(index);
                            },500)
                            */
                        }else{
                            layer.msg(data.msg, "", "error");

                        }

                    }
                });
            }
        });
    });
</script>
