<link rel="stylesheet" href="/lib/webuploader/webuploader.css" />
<script type="text/javascript" src="/lib/uploadify/jquery.uploadify.min.js"></script>
<script type="text/javascript" src="/lib/webuploader/webuploader.js"></script>
<script type="text/javascript" src="/lib/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="/lib/jquery-zclip-master/jquery.zclip.js"></script>
<style>
    .row{
        margin: 8px 0;
        padding: 0;
    }
    .tips{
    	color:blue;
    }
</style>
<article class="page-container">
    <form class="form form-horizontal" id="form-admin-add">
        <div class="row cl">
        	<textarea rows="2" cols="65" disabled="disabled" id="copy_data" style="resize:none"><{$linkUrl}></textarea>
            <br><br>
            <span class="tips">
		            说明：<br>
			1、将复制本直播流地址配置到PC录屏软件即可实现在线直播；<br>
			2、本直播流地址已保存，您可到本课程详情页中查看
			</span>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-3 col-xs-offset-3 col-sm-offset-3">
                <input class="btn btn-primary" id="copy_button" style="margin: auto" type="button" value="&nbsp;&nbsp;复制地址&nbsp;&nbsp;">
                <input class="btn btn-primary" id="close_button" style="margin: auto" type="button" value="&nbsp;&nbsp;确认&nbsp;&nbsp;">
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
                	window.parent.parent.adminTableRefresh();
        			window.parent.layer_close();
                },1000)
            }
        });

		$("#close_button").click(function (){
            window.parent.parent.adminTableRefresh();
			window.parent.layer_close();
		});

        
    });
</script>
