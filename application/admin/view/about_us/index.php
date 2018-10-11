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
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><h3 style="font-weight: bold;">关于我们</h3>
    </div>
    <form class="form form-horizontal" id="form-admin-add" style="border-radius:2em;box-shadow: 3px 0px 7px #3BABD4;padding-top: 1em;">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>公司简介：</label>
            <div class="formControls col-xs-4 col-sm-6">
                <input type="hidden" value="<{$info.id}>" id="id" name="id">
                <td colspan="2">
                    <link href="__ROOT__/lib/qiniu_ueditor_1.4.3-master/themes/default/css/ueditor.css" type="text/css" rel="stylesheet">
                    <script type="text/javascript" charset="utf-8" src="__ROOT__/lib/qiniu_ueditor_1.4.3-master/ueditor.config.js"></script>
                    <script type="text/javascript" charset="utf-8" src="__ROOT__/lib/qiniu_ueditor_1.4.3-master/ueditor.all.min.js"> </script>
                    <script type="text/javascript" charset="utf-8" src="__ROOT__/lib/qiniu_ueditor_1.4.3-master/lang/zh-cn/zh-cn.js"></script>
                    <script type="text/javascript" charset="utf-8" src="__ROOT__/lib/qiniu_ueditor_1.4.3-master/lang/en/en.js"></script>
                    <script type="text/javascript">
                        var ue = UE.getEditor('editor',{
                            toolbars: [
                                [
                                    'source',
                                    'undo', //撤销
                                    'redo', //重做
                                    'bold', //加粗
                                    'indent', //首行缩进
                                    'italic', //斜体
                                    'underline', //下划线
                                    'strikethrough', //删除线
                                    'subscript', //下标
                                    'fontborder', //字符边框
                                    'superscript', //上标
                                    'formatmatch', //格式刷
                                    'horizontal', //分隔线
                                    'removeformat', //清除格式
                                    'time', //时间
                                    'date', //日期
                                    'customstyle', //自定义标题
                                    'fontfamily', //字体
                                    'fontsize', //字号
                                    'paragraph', //段落格式
                                    'forecolor', //字体颜色
                                    'backcolor', //背景色
                                    'insertimage', //多图上传
                                    'link', //超链接
                                    'justifyleft', //居左对齐
                                    'justifyright', //居右对齐
                                    'justifycenter', //居中对齐
                                    'justifyjustify', //两端对齐
                                    'insertorderedlist', //有序列表
                                    'insertunorderedlist', //无序列表
                                    'directionalityltr', //从左向右输入
                                    'directionalityrtl', //从右向左输入
                                    'rowspacingtop', //段前距
                                    'rowspacingbottom', //段后距
                                    'lineheight', //行间距
                                    'edittip ', //编辑提示
                                    'autotypeset', //自动排版
                                    'touppercase', //字母大写
                                    'tolowercase', //字母小写
                                    'cleardoc', //清空文档
                                    'fullscreen', //全屏
                                ]
                            ],
                            autoHeightEnabled: false,
                            autoFloatEnabled: true
                        });
                    </script>
                    <script id="editor" type="text/plain" style="width:100%;height:200px;"><{$info.profile}></script></td>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>公司历程：</label>
            <div class="col-xs-6 col-sm-2">
            <img src="<{$info.development}>" id="developmentimg" style="width: 100%;height: 120px;">
            </div>
            <a class="upload">&nbsp;&nbsp;上传&nbsp;&nbsp;
                <input type="file" multiple  id="file" style="color: #0e90d2"   onchange="imgChange(event)">
            </a>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>平台特色：</label>
            <div class="col-xs-6 col-sm-2">
                <img src="<{$info.features}>" id="featuresimg" style="width: 100%;height: 120px;">
            </div>
            <a class="upload">&nbsp;&nbsp;上传&nbsp;&nbsp;
                <input type="file" multiple  id="file" style="color: #0e90d2"   onchange="imgChange2(event)">
            </a>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-black" style="font-weight: bold;font-size: 2rem;">联系我们：</span></label>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>客服QQ：</label>
            <div class="formControls col-xs-4 col-sm-6">
                <input type="number" class="input-text" required="required" value="<{$info.QQ}>" placeholder="客服QQ" id="QQ" name="QQ" style="width:100%;">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-black" style="font-weight: bold;font-size: 2rem;">地图：</span></label>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>公司名：</label>
            <div class="formControls col-xs-4 col-sm-6">
                <input type="text" class="input-text" required="required" value="<{$info.company_name}>" placeholder="公司名" id="company_name" name="company_name">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>地址：</label>
            <div class="formControls col-xs-4 col-sm-6">
                <input type="text" class="input-text" required="required" value="<{$info.address}>" placeholder="地址" id="address" name="address">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>电话：</label>
            <div class="formControls col-xs-4 col-sm-6">
                <input type="text" class="input-text" required="required" value="<{$info.telephone}>" placeholder="电话" id="telephone" name="telephone">
            </div>
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
    ue.render( 'editorValue' );
    var developmentimg = null, featuresimg = null;
    //公司历程
    function imgChange(e) {
        var dom =$("input[id^='file']")[0];
        var reader = new FileReader();
        reader.onload = (function (file) {
            return function (e) {
                $("#developmentimg").attr("src",this.result);
                developmentimg = this.result;
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
                $("#featuresimg").attr("src",this.result);
                featuresimg = this.result;
            };
        })(e.target.files[0]);
        reader.readAsDataURL(e.target.files[0]);
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
                postdata.push({name: "development", value:developmentimg});
                postdata.push({name: "features", value:featuresimg});
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
