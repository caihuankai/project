<link rel="stylesheet" href="/lib/webuploader/webuploader.css" />
<script type="text/javascript" src="/lib/uploadify/jquery.uploadify.min.js"></script>
<script type="text/javascript" src="/lib/webuploader/webuploader.js"></script>
<script type="text/javascript" src="/lib/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="/lib/jquery-zclip-master/jquery.zclip.js"></script>
<style>
    #copy_data{
        border: #31b0d5 solid 1px;
        overflow: hidden;
        padding: 0;
        margin: 0;
    }
</style>
<article class="page-container">
    <form class="form form-horizontal" id="form-admin-add">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>复制链接：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <textarea rows="6" cols="38" disabled="disabled" id="copy_data">
                    <{$dataCopy}>
                </textarea>
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-3 col-xs-offset-3 col-sm-offset-3">
                <input class="btn btn-primary" id="copy_button" style="margin: auto" type="button" value="&nbsp;&nbsp;确认复制&nbsp;&nbsp;">
            </div>
        </div>
    </form>
</article>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
    $(function (){
        //复制链接
        $('#copy_button').zclip({
            path: '/lib/jquery-zclip-master/ZeroClipboard.swf',
            copy: function(){//复制内容
                return $.trim($('#copy_data').text());
            },
            afterCopy: function(){//复制成功
                layer.msg('复制成功!');
                setTimeout(function(){
                    layer_close();
                },1000)
            }
        });
    });
</script>
