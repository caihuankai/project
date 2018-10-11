<article class="page-container">

    <input type="hidden" class="input-text" value="<{$id}>" id="id" name="id">
    <input type="hidden" class="input-text" value="<{$token}>" id="token" name="token">
    <input type="hidden" class="input-text" value="<{$key}>" id="key" name="key">
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>上传安装包：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="file" class="input-text" id="file" name="file">
        </div>
    </div>

    <div class="row cl" style="margin-top:15px;">
        <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
            <input class="btn btn-primary radius" id="btn_upload" type="submit" value="&nbsp;&nbsp;上传&nbsp;&nbsp;">
            <span id="progress" style="display:none" class="c-red">上传进度：</span>
        </div>
    </div>

</article>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
    $(document).ready(function () {
        var Qiniu_UploadUrl = "http://up.qiniu.com";
        $("#btn_upload").click(function () {
            //普通上传
            var Qiniu_upload = function (f, token, key) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', Qiniu_UploadUrl, true);
                var formData, startDate;
                formData = new FormData();
                if (key !== null && key !== undefined) formData.append('key', key);
                formData.append('token', token);
                formData.append('file', f);
                var taking;
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var nowDate = new Date().getTime();
                        taking = nowDate - startDate;
                        var x = (evt.loaded) / 1024;
                        var y = taking / 1000;
                        var uploadSpeed = (x / y);
                        var formatSpeed;
                        if (uploadSpeed > 1024) {
                            formatSpeed = (uploadSpeed / 1024).toFixed(2) + "Mb\/s";
                        } else {
                            formatSpeed = uploadSpeed.toFixed(2) + "Kb\/s";
                        }
                        var percentComplete = Math.round(evt.loaded * 100 / evt.total);
                        console && console.log(percentComplete, ",", formatSpeed);
                        $('#progress').html('上传进度：' + percentComplete);
                        if (percentComplete === 100) {
                            $('#progress').html('正在处理中，请勿关闭页面');
                        }
                    }
                }, false);

                xhr.onreadystatechange = function (response) {
                    var blkRet;
                    if (xhr.readyState == 4 && xhr.status == 200 && xhr.responseText != "") {
                        blkRet = JSON.parse(xhr.responseText);
                        $('#progress').html('上传完成，文件地址为：' + blkRet.data.name + '，三秒后自动关闭当前dialog！');
                        $('#btn_upload').attr("disabled", false);

                        setTimeout(function () {
                            var index = parent.layer.getFrameIndex(window.name); //获取窗口索引
                            parent.$('button[name=\'refresh\']').click();
                            parent.layer.close(index);
                        }, 3000);
                    } else if (xhr.status != 200 && xhr.responseText) {
                        blkRet = JSON.parse(xhr.responseText);
                        $('#progress').html('上传失败，' + blkRet.error);
                        $('#btn_upload').attr("disabled", false);
                    } else {

                    }
                };

                $('#btn_upload').attr("disabled", true);
                $('#progress').show();
                xhr.send(formData);
            };
            var token = $("#token").val();
            if ($("#file")[0].files.length > 0 && token != "") {
                Qiniu_upload($("#file")[0].files[0], token, $('#key').val());
            } else {
                console && console.log("form input error");
            }
        })
    });
</script>
