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
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>职位名称：</label>
            <div class="formControls col-xs-4 col-sm-6">
                <input type="hidden" id="id" name="id" value="<{$info.id}>">
                <input type="text" class="input-text" value="<{$info.position_name}>" placeholder="职位名称" required="required" id="position_name" name="position_name" maxlength="30">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>职位类别：</label>
            <div class="formControls col-xs-4 col-sm-6">
                <input type="text" class="input-text" value="<{$info.posttion_category}>" placeholder="职位类别" required="required" id="posttion_category" name="posttion_category" maxlength="30">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>最低学历：</label>
            <div class="formControls col-xs-4 col-sm-4">
                <select id="education" name="education">
                    <{volist name="education" id="vo"}>
                        <{if condition="($info.education == $vo.type)"}>
                        <option selected="selected" value="<{$vo.type}>"><{$vo.name}></option>
                        <{else /}>
                        <option value="<{$vo.type}>"><{$vo.name}></option>
                        <{/if}>
                    <{/volist}>
                </select>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>工作地点：</label>
            <div class="formControls col-xs-4 col-sm-6">
                <input type="text" class="input-text" value="<{$info.address}>" required="required" required="required" placeholder="工作地点" id="address" name="address" maxlength="80">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>工作年限：</label>
            <div class="formControls col-xs-4 col-sm-6">
                <input type="text" class="input-text" value="<{$info.working_years}>" placeholder="工作年限" required="required" id="working_years" name="working_years" maxlength="20">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>招聘人数：</label>
            <div class="formControls col-xs-4 col-sm-6">
                <input type="text" class="input-text" value="<{$info.recruitment_num}>" placeholder="招聘人数" required="required" id="recruitment_num" name="recruitment_num" maxlength="4">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>工作类别：</label>
            <div class="formControls col-xs-4 col-sm-6">
                <input type="text" class="input-text" value="<{$info.working_category}>" placeholder="工作类别" required="required" id="working_category" name="working_category" maxlength="30">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>内容：</label>
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
                    <script id="editor" type="text/plain" style="width:100%;height:200px;"><{$info.content}></script></td>
            </div>
        </div>


        <div class="row cl">
            <div class="col-xs-8 col-sm-3 col-xs-offset-3 col-sm-offset-3">
                <input class="btn btn-primary radius" style="margin: auto" type="submit" value="&nbsp;&nbsp;编辑&nbsp;&nbsp;">
            </div>
            <div class="col-xs-8 col-sm-3">
                <input class="btn btn-danger radius" style="margin: auto" id="reset"  type="button" value="&nbsp;&nbsp;重置&nbsp;&nbsp;">
            </div>
        </div>
    </form>
</article>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
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
                // var text = ue.getContent();
                var postdata = $('#form-admin-add').serializeArray();
                // postdata.push({name: "content", value:text});
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
