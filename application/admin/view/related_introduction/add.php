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
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>标题：</label>
            <div class="formControls col-xs-4 col-sm-6">
                <input type="text" class="input-text" value="" placeholder="标题" id="title" name="title" maxlength="30">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>Icon：</label>
            <div class="formControls col-xs-4 col-sm-2">
                <img src="http://oqt46pvmm.bkt.clouddn.com/Ft56ta8EDC03VFYIHzFuSjcv5E5_" id="showimg"style="width: 60px;height: 60px;border: 0 solid #000">
            </div>
            <div class="formControls col-xs-4 col-sm-2">
                <a class="upload">上传
                    <input type="file" multiple  name="file" id="file" style="color: #0e90d2"   onchange="imgChange(event)">
                </a>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>二维码：</label>
            <div class="formControls col-xs-4 col-sm-2">
                <img src="http://oqt46pvmm.bkt.clouddn.com/Ft56ta8EDC03VFYIHzFuSjcv5E5_" id="showimg2"style="width: 60px;height: 60px;border: 0 solid #000">
            </div>
            <div class="formControls col-xs-4 col-sm-2">
                <a class="upload">上传
                    <input type="file" multiple  name="file" id="file" style="color: #0e90d2"   onchange="imgChange2(event)">
                </a>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>内容描述：</label>
            <div class="formControls col-xs-4 col-sm-9">
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
                    <script id="editor" type="text/plain" style="width:100%;height:200px;"></script></td>
            </div>
        </div>

        <div class="row cl">
            <div class="col-xs-8 col-sm-3 col-xs-offset-3 col-sm-offset-3">
                <input class="btn btn-primary radius" style="margin: auto" type="submit" value="&nbsp;&nbsp;新增&nbsp;&nbsp;">
            </div>
            <div class="col-xs-8 col-sm-3">
                <input class="btn btn-danger radius" style="margin: auto" id="reset"  type="button" value="&nbsp;&nbsp;重置&nbsp;&nbsp;">
            </div>
        </div>
    </form>
</article>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
    var postimg = null;
    var postimg2 = null;
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
    function imgChange2(e) {
        console.info(e.target.files[0]);//图片文件
        var dom =$("input[id^='file']")[0];
        console.info(dom.value);//这个是文件的路径 C:\fakepath\icon (5).png
        var reader = new FileReader();
        reader.onload = (function (file) {
            return function (e) {
                // $("#showimgpath").attr("value",dom.value);
                $("#showimg2").attr("src",this.result);
                postimg2 = this.result;
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
                postdata.push({name: "icon", value:postimg});
                postdata.push({name: "qr_code", value:postimg2});
                var url = "./add";
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
                        }//end
                    }
                });
            }
        });
    });
</script>
