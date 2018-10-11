<link rel="stylesheet" href="/lib/webuploader/webuploader.css" />
<script type="text/javascript" src="/lib/uploadify/jquery.uploadify.min.js"></script>
<script type="text/javascript" src="/lib/webuploader/webuploader.js"></script>
<script type="text/javascript" src="/lib/My97DatePicker/WdatePicker.js"></script>
<style>
    .upload {
        padding: 5px 8px;
        height: 30px;
        line-height: 30px;
        position: relative;
        text-decoration: none;
        color: #fff;
        border-radius: 0.5rem;
        background-color: #428bca;
    }
    .upload:hover{
        text-decoration: none;
        color: #fffdef;
    }
    #file{
        position: absolute;
        overflow: hidden;
        right: 0;
        top: 0;
        opacity: 0;
        width: 6.5rem;
    }
</style>
<article class="page-container">
    <form class="form form-horizontal" id="form-admin-add">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>是否设置密码：</label>
            <input type="hidden" value="<{$info.id}>" name="id">
            <div class="formControls col-xs-4 col-sm-4">
                <input type="radio"  value="1" <{if condition="($info.adapt == 1)"}> checked="checked"  <{/if}> id="adapt" name="adapt">设置
            </div>
            <div class="formControls col-xs-4 col-sm-4">
                <input type="radio"  value="2" <{if condition="($info.adapt != 1)"}> checked="checked"  <{/if}> id="adapt" name="adapt">取消
            </div>
        </div>
        <div class="row cl" id="passbox">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>密码：</label>
            <div class="formControls col-xs-4 col-sm-6">
                 <input type="number" class="input-text" <{if condition="($info.adapt == 1)"}> value="<{$info.password}>"  <{else/}> value="" <{/if}> id="password" name="password" maxlength="4" style="width: 100%;">
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-3 col-xs-offset-3 col-sm-offset-3">
                <input class="btn btn-primary radius" style="margin: auto" type="submit" value="&nbsp;&nbsp;保存&nbsp;&nbsp;">
            </div>
        </div>
    </form>
</article>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
    var Type= $("input[name='adapt']:checked").val();
    ElementIsShow($("#passbox"),Type,true);

    /**
    * 状态改变事件
    **/
    $("input[name='adapt']").change(function (){
        Type=$("input[name='adapt']:checked").val();
        ElementIsShow($("#passbox"),Type,1);
    });
    function ElementIsShow(el,type,condition) {
        if(Type == condition){
            el.show();
        }else{
            el.hide();
        }
    }
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
                var postdata = $('#form-admin-add').serializeArray();
                var url = "./editPassword";
                var jz;
                $.ajax({
                    type:"POST",
                    url:url,
                    data:postdata,// 你的formid
                    async: false,
                    error: function(request) {
                        layer.close(jz);
                        layer.msg("网络错误!", "", "error");
                    },
                    success: function(data) {
                        //关闭加载层
                        //layer.close(jz);
                        if(data.code == 200){
                            layer.msg(data.msg, "", "success");
                            setTimeout(function(){
                                if (window.parent != window && window.parent.hasOwnProperty('adminTableRefresh')){ // 刷新表格
                                    window.parent.adminTableRefresh();
                                }
                                layer_close();
                            },500)
                        }else{
                            layer.alert(data.msg, {
                                icon: 1,
                                skin: 'layer-ext-moon', //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
                                time:2000,
                                btn: [ '知道了']
                            })
                        }//end
                    }
                });
            }
        });
    });
</script>
