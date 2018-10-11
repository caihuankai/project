<article>
    <form action="" method="post" class="form form-horizontal" id="form-member-bind" style="width: 350px;padding: 0px 15px;">

        <div class="row cl">
            <label for="username" class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>用户ID：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="hidden" class="input-text" value="<{$id}>" name="id">
                <input type="text" class="input-text" value="<{$user_id}>" id="userid" name="userid" minlength="6" onkeyup="this.value=this.value.replace(/\D/g,'')">
            </div>
        </div>

        <div class="row cl">
            <div>
				<span class="col-xs-offset-2">
					<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
				</span>

                <span>
					<input class="btn btn-danger radius" type="button" value="&nbsp;&nbsp;取消&nbsp;&nbsp;" onclick="layer_close()">
				</span>
            </div>
        </div>
    </form>
</article>

<script>
    $("#form-member-bind").on('submit',function(){

        $(this).find('[type="submit"]').attr('disabled');
        var data = $(this).serializeArray();
        $.ajax({
            url:"./bind",
            data:data,
            type:"post",
            success:function(_data){
                if (_data.code == 0) {
//                     layer.msg('成功', "", "success");
//                     setTimeout(function(){
//                         var index = parent.layer.getFrameIndex(window.name);
//                         parent.layer.close(index);
//                     },1000);
                    window.parent.adminTableRefresh();
                    var index = parent.layer.getFrameIndex(window.name);
                    parent.layer.close(index);
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

