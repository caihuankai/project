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
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">* </span>股票名称：</label>
            <div class="formControls col-xs-4 col-sm-4">
                <input type="hidden" value="<{$info.id}>" id="id" name="id">
                <input type="text" class="input-text" value="<{$info.stock_name}>" placeholder="输入股票名称" id="stock_name" name="stock_name" maxlength="80">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">* </span>股票编号：</label>
            <div class="formControls col-xs-4 col-sm-4">
                <input type="text" class="input-text" value="<{$info.stock_num}>" placeholder="输入股票编号" id="stock_num" name="stock_num" maxlength="80">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">* </span>涨跌幅：</label>
            <div class="formControls col-xs-4 col-sm-5">
                <input type="number" style="width: 78%" class="input-text" value="" placeholder="请输入数字，最多支持两位小数;上次涨跌幅为：<{$info.pricechangeratio}> " id="pricechangeratio" name="pricechangeratio" maxlength="80">
                <span style="display: inline-block">%</span>
            </div>
        </div>

        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" style="margin: auto" type="submit" value="&nbsp;&nbsp;编辑&nbsp;&nbsp;">
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
                    data:$("#form-admin-add").serializeArray(),// 你的formid
                    async: false,
                    error: function(request) {
                        layer.close(jz);
                        layer.msg("网络错误!", "", "error");
                    },
                    success: function(data) {
                        //关闭加载层
                        //layer.close(jz);
                        if(data.data.code == 200){
                            layer.msg(data.data.msg, "", "success");
                            setTimeout(function(){
                                if (window.parent != window && window.parent.hasOwnProperty('adminTableRefresh')){ // 刷新表格
                                    window.parent.adminTableRefresh();
                                }

                                layer_close();
                            },500)
                        }else{
                            layer.alert(data.data.msg, {
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
    });
</script>
