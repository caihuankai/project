<article class="page-container">
    <form class="form form-horizontal" id="form-admin-add">
        <input type="hidden" class="input-text" value="<{$appVersionInfo.id}>" placeholder="" id="id" name="id">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>版本号：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" readonly value="<{$appVersionInfo.version_code}>" placeholder="" id="version_code" name="version_code">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>版本名称：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" readonly value="<{$appVersionInfo.version_name}>" placeholder="" id="version_name" name="version_name">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>更新文案：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <textarea rows="5" style="width:100%;" name="description"><{$appVersionInfo.description}></textarea>
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>Android强制升级：</label>
            <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                <div class="check-box">
                    <{if $appVersionInfo.is_force eq 1}>
                    <input checked type="checkbox" id="checkbox-1" name="is_force">
                    <{else}>
                    <input type="checkbox" id="checkbox-1" name="is_force">
                    <{/if}>
                    <label class="line-h" for="checkbox-1">开启/不开启</label>
                </div>
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>IOS强制升级：</label>
            <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                <div class="check-box">
                    <{if $appVersionInfo.ios_is_force eq 1}>
                    <input checked type="checkbox" id="checkbox-2" name="ios_is_force">
                    <{else}>
                    <input type="checkbox" id="checkbox-2" name="ios_is_force">
                    <{/if}>
                    <label class="line-h" for="checkbox-2">开启/不开启</label>
                </div>
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>IOS忽略当前版本：</label>
            <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                <div class="check-box">
                    <{if $appVersionInfo.ios_is_ignore eq 1}>
                    <input checked type="checkbox" id="checkbox-3" name="ios_is_ignore">
                    <{else}>
                    <input type="checkbox" id="checkbox-3" name="ios_is_ignore">
                    <{/if}>
                    <label class="line-h" for="checkbox-3">忽略/不忽略</label>
                </div>
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>是否是测试版本：</label>
            <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                <div class="check-box">
                    <{if $appVersionInfo.ios_is_test eq 1}>
                    <input checked type="checkbox" id="checkbox-4" name="ios_is_test">
                    <{else}>
                    <input type="checkbox" id="checkbox-4" name="ios_is_test">
                    <{/if}>
                    <label class="line-h" for="checkbox-4">测试版/正式版</label>
                </div>
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>是否生效：</label>
            <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                <div class="check-box">
                    <{if $appVersionInfo.ios_is_effective eq 1}>
                    <input checked type="checkbox" id="checkbox-5" name="ios_is_effective">
                    <{else}>
                    <input type="checkbox" id="checkbox-5" name="ios_is_effective">
                    <{/if}>
                    <label class="line-h" for="checkbox-5">生效/不生效</label>
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
                var url = "./appVersionEdit";
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
