<link rel="stylesheet" href="/lib/webuploader/webuploader.css" />
<script type="text/javascript" src="/lib/uploadify/jquery.uploadify.min.js"></script>
<script type="text/javascript" src="/lib/webuploader/webuploader.js"></script>
<script type="text/javascript" src="/lib/My97DatePicker/WdatePicker.js"></script>
<style>
    .font_size{
        font-size: 1rem;
        padding: 0;
        margin: 0;
        display: block;
    }
</style>
<article class="page-container">
    <form class="form form-horizontal" id="form-admin-add">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>用户ID：</label>
            <label class="form-label col-xs-1 col-sm-1"></label>
            <div class="formControls col-xs-4 col-sm-3">
                <input type="hidden" class="input-text" value="<{$info.user_id}>"  id="userid" name="UserID">
                <input type="text" class="input-text" value="<{$info.user_id}>" disabled="disabled" maxlength="20">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="font_size">用户昵称：</span></label>
            <div  class="formControls col-xs-3 col-sm-2">
                <input type="hidden"  value="<{$info.alias}>" id="alias" name="alias">
                <span class="font_size"><{$info.alias}></span>
            </div>
            <label class="form-label col-xs-3 col-sm-2"><span class="font_size">属性：</span></label>
            <div class="formControls col-xs-4 col-sm-2">
                <input type="hidden"  value="<{$info.user_type}>" id="user_type" name="user_type">
                <span class="font_size"><{$info.user_type !=1 ? '马甲':'正式用户'}></span>
            </div>
        </div>
        <div class="row cl" style="margin-top: 5rem;">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>禁言时间：</label>
            <label class="form-label col-xs-1 col-sm-1"><input type="radio" checked="checked" name="time" value="dufault"></label>
            <div class="formControls col-xs-3 col-sm-3">
                <input type="text" class="input-text" placeholder="小时" id="wtime" name="wtime" maxlength="20">
            </div>
            <label><span class="c-blue"></span>小时</label>

        </div>
        <div class="row cl">
            <label class="form-label col-xs-2 col-sm-2"></label>
            <label class="form-label col-xs-3 col-sm-2"><input type="radio"  name="time" value="1"><label style="width:3.5rem;">1天</label></label>
            <label class="form-label col-xs-3 col-sm-2"><input type="radio"  name="time" value="7"><label style="width:3.5rem;">7天</label></label>
            <label class="form-label col-xs-3 col-sm-2"><input type="radio"  name="time" value="30"><label style="width:3.5rem;">30天</label></label>
            <label class="form-label col-xs-3 col-sm-2"><input type="radio"  name="time" value="90"><label style="width:3.5rem;">90天</label></label>
        </div>
        <div class="row cl" style="margin-bottom: 5rem;">
            <label class="form-label col-xs-2 col-sm-2"></label>
            <label class="form-label col-xs-3 col-sm-2"><input type="radio"  name="time" value="180"><label style="width:3.5rem;">180天</label></label>
            <label class="form-label col-xs-3 col-sm-2"><input type="radio"  name="time" value="365"><label style="width:3.5rem;">365天</label></label>
            <label class="form-label col-xs-3 col-sm-2"><input type="radio"  name="time" value="100000"><label style="width:3.5rem;">永久</label></label>
            <label class="form-label col-xs-3 col-sm-2"></label>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" style="margin: auto" type="submit" value="&nbsp;&nbsp;新增/编辑&nbsp;&nbsp;">
            </div>
        </div>
    </form>
</article>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
//提交数据
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
                var url = "./edit";
                var jz;
                $.ajax({
                    type:"POST",
                    url:url,
                    data:$('#form-admin-add').serializeArray(),// 你的formid
                    async: false,
                    // beforeSend:function(){
                    //     jz = layer.load(0, {shade: false}); //0代表加载的风格，支持0-2
                    // },
                    error: function(request) {
                        layer.close(jz);
                        layer.msg("网络错误!", "", "error");
                    },
                    success: function(data) {
                        //关闭加载层
                        // layer.close(jz);
                        if(data.data.code == 200){
                            layer.msg(data.msg, "", "success");
                            setTimeout(function(){
                                var index = parent.layer.getFrameIndex(window.name);
                                parent.$table.bootstrapTable('refresh');
                                parent.layer.close(index);
                            },500)
                            var index = parent.layer.getFrameIndex(window.name);
                            parent.layer.close(index);
                        }else{
                            layer.alert(data.msg, {
                                icon: 1,
                                skin: 'layer-ext-moon', //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
                                time:2000,
                                btn: [ '知道了']
                            })
                        }

                    }
                });
            }
        });
        //单选时间优化
        $(":radio").click(function(){
            //alert("您是..." + $(this).val());
            if($(this).val() != 'dufault')
            {
                $("#wtime").val('');
                $("#wtime").prop('disabled','disabled');
            }else{
                $("#wtime").removeProp("disabled")
            }
        });
    });
</script>
