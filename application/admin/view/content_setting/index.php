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
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><h3 style="font-weight: bold;">网站常规项设置</h3>
    </div>
    <form class="form form-horizontal" id="form-admin-add" style="border-radius:2em;box-shadow: 3px 0px 7px #3BABD4;padding-top: 1em;">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>网站的标题：</label>
            <div class="formControls col-xs-4 col-sm-6">
                <input type="hidden" value="<{$info.id}>" id="id" name="id">
                <input type="text" class="input-text" value="<{$info.title}>" placeholder="网站的标题" required="required" id="title" name="title" maxlength="30">
            </div>
            标签只显示一行
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>SEO关键词：</label>
            <div class="formControls col-xs-4 col-sm-6">
                <input type="text" class="input-text" value="<{$info.SEO_antistop}>" placeholder="SEO关键词" required="required" id="SEO_antistop" name="SEO_antistop">
            </div>
            英文小写逗号隔开
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>网站LOGO：</label>
            <div class="formControls col-xs-4 col-sm-2">
                <a class="upload">选择文件
                    <input type="file" multiple  id="file" style="color: #0e90d2"   onchange="imgChange(event)">
                </a>
            </div>
            <img src="<{$info.logo_img}>" id="showimg" style="width: 80px;height: 80px;">
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>网站描述：</label>
            <div class="formControls col-xs-4 col-sm-6">
                <textarea name="describe" id="describe" required="required" style="width: 100%;height: 200px;"><{$info.describe}></textarea>
            </div>
        </div>

        <div class="row cl" style="padding-bottom: 5rem;">
            <div class="col-xs-8 col-sm-3 col-xs-offset-3 col-sm-offset-3">
                <input class="btn btn-primary radius" style="margin: auto" type="submit" value="&nbsp;&nbsp;保存更改&nbsp;&nbsp;">
            </div>
        </div>
    </form>
</article>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
    var postimg = null;
    //图片上传
    function imgChange(e) {
        var dom =$("input[id^='file']")[0];
        var reader = new FileReader();
        reader.onload = (function (file) {
            return function (e) {
                $("#showimg").attr("src",this.result);
                postimg = this.result;
            };
        })(e.target.files[0]);
        reader.readAsDataURL(e.target.files[0]);
    }
    //提交数据
    $(function(){
        $("#reset").click(function () {
            layer.confirm('确定要重置内容区域吗？',function(index){
                ue.setContent("");
                layer.closeAll('dialog');
            });
        });
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
                postdata.push({name: "logo_img", value:postimg});
                var url = "./edit";
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
                        if(data.data.code == 200){
                            layer.msg(data.data.msg, "", "success");
                            setTimeout(function(){
                                location.reload();
                            },500)
                        }else{
                            layer.alert(data.data.msg, {
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
