



<article class="page-container">
    <form id="form-reply" class="form form-horizontal">
        <input type="hidden" value="<?=$pid?>" name="pid">
        <input type="hidden" value="<?=$groupid?>" name="groupid">
        <input type="hidden" value="<?=$uid?>" name="uid">
        <div class="row cl">
            <div class="formControls col-xs-8 col-sm-9">
                <textarea style="width: 500px;height:200px;" class="textarea" name="content" maxlength="500" minlength="4"></textarea>
            </div>
        </div>

        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
            </div>
        </div>
    </form>
</article>

<script>

    $("#form-reply").on('submit',function(){
        $(this).find('[type="submit"]').attr('disabled');
        var data = $(this).serializeArray();

        $.ajax({
            url:"./replyLeave",
            data:data,
            type:"post",
            success:function(_data){
                if (_data.status == 1) {
                    layer.msg('成功');

                    setTimeout(function(){
                        var index = parent.layer.getFrameIndex(window.name);
                        parent.location.reload();
                        parent.layer.close(index);
                    },500);

                } else {
                    layer.msg(_data.msg, "", "error");
                }
            },
            error:function(err) {
                layer.msg("网络错误!", "", "error");
            },
            dataType:"json"
        });
        return false;
    });


</script>





