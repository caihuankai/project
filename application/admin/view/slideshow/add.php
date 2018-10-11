<style>
    .row{
        margin: 8px 0;
        padding: 0;
    }
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

<form class="form form-horizontal" id="form-admin-add">

    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">名称：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="hidden" name="positionType" id="positionType" value="<{$positionType}>">
            <input type="text" class="input-text valid" placeholder="" name="adName" value="" id="adName" required="required">
        </div>
    </div>

    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">跳转类型：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <select name="relevanceType" id="relevanceType" class="form-control form-select" >
                <option value="14">讲师介绍页</option>
                <option value="15">月度课介绍页</option>
                <option value="16">季度课介绍页</option>
                <option value="17">私人定制页面</option>
            </select>
        </div>
    </div>

    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">ID/链接：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" required="required" class="input-text valid" name="adURL" value="0" id="adURL" placeholder="请输入跳转类型的ID（如跳转类型为链接，请输入链接地址）">
            <br>
            <small></small>
        </div>
    </div>

    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>图片：</label>
        <div class="formControls col-xs-4 col-sm-2">
            <img src="http://oqt46pvmm.bkt.clouddn.com/Ft56ta8EDC03VFYIHzFuSjcv5E5_" id="showimg"style="width: 60px;height: 60px;border: 0 solid #000">
        </div>
        <div class="formControls col-xs-4 col-sm-2">
            <a class="upload">上传
                <input type="file" multiple  name="file" id="file" style="color: #0e90d2"   onchange="imgChange(event)">
            </a>
        </div>
        （图片不能大于1024KB）
    </div>


    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">排序：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" required="required" class="input-text valid" placeholder="" name="adSort" value="99" id="adSort">
            <br>
            <small>数值越小，越靠前</small>
        </div>
    </div>
    <br>

    <div class="row cl">
        <label class="form-label col-xs-3"><span class="c-red">*</span>状态：</label>
        <div class="formControls col-xs-8">
            <div class="radio-box">
                <input name="adStatus" type="radio" id="aadStatus" value="1" checked>
                <label for="adStatus">启用</label>
            </div>
            <div class="radio-box">
                <input type="radio" id="adStatus" name="adStatus" value="-1">
                <label for="adStatus">停用</label>
            </div>
        </div>
    </div>

    <br>
    <div class="row cl">
        <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
            <input class="btn btn-primary" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
        </div>
    </div>

</form>

<script>
    var postimg = null;
    //图片上传
    function imgChange(e) {
        console.info(e.target.files[0]);//图片文件
        var dom =$("input[id^='file']")[0];
        console.info(dom.value);//这个是文件的路径 C:\fakepath\icon (5).png
        var reader = new FileReader();
        reader.onload = (function (file) {
            return function (e) {
                // $("#showimgpath").attr("value",dom.value);
                $("#showimg").attr("src",this.result);
                postimg = this.result;
            };
        })(e.target.files[0]);
        reader.readAsDataURL(e.target.files[0]);
    }

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
                var url = "#";
                var jz;
                var postdata = $('#form-admin-add').serializeArray();
                postdata.push({name: "adFile", value:postimg});
                $.ajax({
                    type:"POST",
                    url:url,
                    data:postdata,// 你的formid
                    async: false,
                    beforeSend:function(){
                        jz = layer.load(0, {shade: false}); //0代表加载的风格，支持0-2
                    },
                    error: function(request) {
                        layer.close(jz);
                        layer.msg("网络错误!", "", "error");
                    },
                    success: function(data) {
                        // layer.msg(data);
                        //关闭加载层
                        layer.close(jz);
                        if(data.status == 1){
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