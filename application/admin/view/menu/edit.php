<article class="page-container">
    <form class="form form-horizontal" id="form-admin-add">
        <input type="hidden" class="input-text" value="<{$menuInfo.id}>" placeholder="" id="id" name="id">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>父级菜单：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <span class="select-box">
                <select class="select" name="pid" id="pid" size="1">
                    <option value="0">顶级菜单</option>
                     <{if !empty($node)}>
                         <{foreach name="node" item="vo"}>
                            <option value="<{$vo.id}>" <{if $menuInfo.pid eq $vo.id}>selected<{/if}>><{$vo.name}></option>
                    <{/foreach}>
                    <{/if}>
                </select>
                </span>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>菜单名称：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<{$menuInfo.name}>" placeholder="" id="name" name="name">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>url：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" autocomplete="off" value="<{$menuInfo.url}>" placeholder="menu/index" id="url" name="url">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>排序：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<{$menuInfo.sort}>" placeholder="" id="sort" name="sort">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>状态：</label>
            <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                <div class="check-box">
                    <{if $menuInfo.hide eq 0}>
                    <input checked type="checkbox" id="checkbox-1" name="hide">
                    <{else}>
                    <input type="checkbox" id="checkbox-1" name="hide">
                    <{/if}>
                    <label class="line-h" for="checkbox-1">显示/隐藏</label>
                </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>图标类名：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input value="<{if $menuInfo.icon==""}>Hui-iconfont-home<{else}><{$menuInfo.icon}><{/if}>" type="text" class="input-text" placeholder="请输入字体图标类名（详情见：hui-iconfont）" name="icon" id="icon">
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
                var url = "./edit";
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
