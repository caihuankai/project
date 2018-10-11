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
<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i>首页
    <span class="c-gray en">&gt;</span>
    <script>document.write('网站内容管理')</script>
    <span class="c-gray en">&gt;</span>
    <script>document.write(getQueryString('tabName2'))</script>
    <a class="btn btn-success radius r" style="line-height:1em;height: 2em;"
       href="javascript:location.replace(location.href);" title="刷新">
        <i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<article class="page-container">
    <form class="form form-horizontal" id="form-admin-add" >
        <div class="row cl">
            <label class="form-label col-xs-6 col-sm-2"><span style="font-weight: bold;">直播间资料</span>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-3 col-sm-3"><span class="c-red"></span>人均在线时长（分钟）：</label>
            <div class="formControls col-xs-3 col-sm-3">
                <span style="font-weight: bold;"><{$info['capita_time']}></span>
            </div>

            <label class="form-label col-xs-3 col-sm-1"><span class="c-red"></span>最高在线用户：</label>
            <div class="formControls col-xs-3 col-sm-3">
                <span style="font-weight: bold;"><{$info['max_total']}></span>
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-3 col-sm-3"><span class="c-red"></span>当前在线（真实）人数：</label>
            <div class="formControls col-xs-3 col-sm-3">
                <span style="font-weight: bold;"><{$info['online_num']}></span>
            </div>

            <label class="form-label col-xs-3 col-sm-1"><span class="c-red"></span>聊天室在线人数（虚拟）：</label>
            <div class="formControls col-xs-3 col-sm-3">
                <input type="number" class="input-text" required="required" value="<{$info['virtual_num']}>" placeholder="虚拟人数"  name="virtual_num" style="width: 100%">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-3 col-sm-3"><span class="c-red"></span>直播间链接：</label>
            <div class="formControls col-xs-6 col-sm-6">
                <span style="font-weight: bold;"><{$info['pull_url']}></span>
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>直播间封面图：</label>
            <div class="col-xs-6 col-sm-2">
            <img src="<{$info['live_cover']}>" class="showImg" id="live_cover" style="width: 100%;height: 100px;">
            </div>
            <a class="upload">&nbsp;&nbsp;上传&nbsp;&nbsp;
                <input type="file" multiple  id="file" style="color: #0e90d2"   onchange="imgChange(event)">
            </a>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>直播背景图：</label>
            <div class="col-xs-6 col-sm-2">
                <img src="<{$info['live_background']}>" class="showImg" id="live_background" style="width: 100%;height: 100px;">
            </div>
            <a class="upload">&nbsp;&nbsp;上传&nbsp;&nbsp;
                <input type="file" multiple  id="file" style="color: #0e90d2"   onchange="imgChange2(event)">
            </a>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>课程表（1188xp宽度   高不限）：</label>
            <div class="col-xs-6 col-sm-2">
                <img src="<{$info['course_table']}>" class="showImg" id="course_table" style="width: 100%;height: 100px;">
            </div>
            <a class="upload">&nbsp;&nbsp;上传&nbsp;&nbsp;
                <input type="file" multiple  id="file" style="color: #0e90d2"   onchange="imgChange3(event)">
            </a>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>免责（1188xp宽度   高不限）：</label>
            <div class="col-xs-6 col-sm-2">
                <img src="<{$info['disclaimer']}>" class="showImg" id="disclaimer" style="width: 100%;height: 100px;">
            </div>
            <a class="upload">&nbsp;&nbsp;上传&nbsp;&nbsp;
                <input type="file" multiple  id="file" style="color: #0e90d2"   onchange="imgChange4(event)">
            </a>
        </div>

        <div class="row cl" style="padding-bottom: 5rem;">
            <div class="col-xs-8 col-sm-3 col-xs-offset-3 col-sm-offset-3">
                <input class="btn btn-primary radius" style="margin: auto" type="submit" value="&nbsp;&nbsp;保存&nbsp;&nbsp;">
            </div>
        </div>
    </form>
</article>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
    var live_cover = null, live_background = null,course_table = null, disclaimer = null;
    //公司历程
    function imgChange(e) {
        var dom =$("input[id^='file']")[0];
        var reader = new FileReader();
        reader.onload = (function (file) {
            return function (e) {
                $("#live_cover").attr("src",this.result);
                live_cover = this.result;
            };
        })(e.target.files[0]);
        reader.readAsDataURL(e.target.files[0]);
    }
    //平台特色
    function imgChange2(e) {
        var dom =$("input[id^='file']")[0];
        var reader = new FileReader();
        reader.onload = (function (file) {
            return function (e) {
                $("#live_background").attr("src",this.result);
                live_background = this.result;
            };
        })(e.target.files[0]);
        reader.readAsDataURL(e.target.files[0]);
    }
    //平台特色
    function imgChange3(e) {
        var dom =$("input[id^='file']")[0];
        var reader = new FileReader();
        reader.onload = (function (file) {
            return function (e) {
                $("#course_table").attr("src",this.result);
                course_table = this.result;
            };
        })(e.target.files[0]);
        reader.readAsDataURL(e.target.files[0]);
    }
    //平台特色
    function imgChange4(e) {
        var dom =$("input[id^='file']")[0];
        var reader = new FileReader();
        reader.onload = (function (file) {
            return function (e) {
                $("#disclaimer").attr("src",this.result);
                disclaimer = this.result;
            };
        })(e.target.files[0]);
        reader.readAsDataURL(e.target.files[0]);
    }
    //显示大图
    function _showBig(src) {
        layer.ready(function (){
            layer.photos({
                photos:{
                    "title": "图片展示", //相册标题
                    "data": [   //相册包含的图片，数组格式
                        {
                            "alt": "图片展示",
                            "src": src, //原图地址
                            "thumb": src //缩略图地址
                        }
                    ]
                },
                closeBtn:2,
            });
        });
    }
    //提交数据
    $(function(){
        $(".showImg").click(function (event){
            target = $(event.target);
            var src= target.attr('src');
            _showBig(src);
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
                postdata.push({name: "live_cover", value:live_cover});
                postdata.push({name: "live_background", value:live_background});
                postdata.push({name: "course_table", value:course_table});
                postdata.push({name: "disclaimer", value:disclaimer});
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
                            layer.msg(data.msg, "", "success");
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
