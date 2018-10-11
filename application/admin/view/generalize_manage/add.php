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
    #file2{
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
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>广告组合名称：</label>
            <div class="formControls col-xs-4 col-sm-6">
                <input type="text" class="input-text" required="required" value="" placeholder="" id="ad_group_name" name="ad_group_name" maxlength="30">
            </div>
        </div>
        <div class="addlist">
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>所属栏目：</label>
                <div class="formControls col-xs-8 col-sm-6">
                    <div class="row" style="margin-top: 0;">
                        <div class="formControls col-xs-4 col-sm-4">
                            <select id="affiliation_column" name="affiliation_column">
                                <{volist name="column" id="vo"}>
                                <option value="<{$vo.id}>"><{$vo.name}></option>
                                <{/volist}>
                            </select>
                        </div>
                        <div class="formControls col-xs-8 col-sm-8">
                            <div class="row" style="margin-top: 0;">
                                <label class="formControls col-xs-6 col-sm-8"style="padding: 0;text-align: right"><span class="c-red">*</span>栏目位置：固定在第</label>
                                <div class="formControls col-xs-3 col-sm-3">
                                    <input type="number" required="required" style="height:25px;padding:0;width: 100%;" class="input-text" value="" placeholder="" id="column_place" name="column_place" maxlength="3">
                                </div>
                                <label class="formControls col-xs-1 col-sm-1"style="padding: 0;">条</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row cl">
            <div class="form-label col-xs-4 col-sm-3">
                <input class="btn btn-primary" id="addcolumn"  style="margin: auto;width: 70%;" type="button" value="&nbsp;&nbsp;+增加所属栏目&nbsp;&nbsp;">
            </div>

        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>状态：</label>
            <div class="formControls col-xs-4 col-sm-4">
                <input type="radio"  value="1" checked="checked"  id="status" name="status">启用
            </div>
            <div class="formControls col-xs-4 col-sm-4">
                <input type="radio"  value="2"  id="status" name="status">禁用
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-10 col-sm-10">
                <hr style="width: 100%;height: 2px;background-color: #0c0c0c">
            </label>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span style="font-weight: bold;font-size: 3rem;color: #0c0c0c">广告1</span></label>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>标题：</label>
            <div class="formControls col-xs-4 col-sm-6">
                <input required="required" type="text" class="input-text" value="" placeholder="" id="title1" name="title1" maxlength="30">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>封面图：</label>
            <div class="formControls col-xs-4 col-sm-2">
                <a class="upload">选择文件
                    <input type="file" multiple  name="file" id="file" style="color: #0e90d2"   onchange="imgChange(event)">
                </a>
            </div>
            <img src="http://oqt46pvmm.bkt.clouddn.com/Ft56ta8EDC03VFYIHzFuSjcv5E5_" id="showimg1" style="width: 80px;height: 80px;">（图片不能大于1024KB）
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>跳转类型：</label>
            <div class="formControls col-xs-3 col-sm-4">
                <select id="ad_target_type1" name="ad_target_type1">
                    <{volist name="type" id="vo"}>
                    <option value="<{$vo.type}>"><{$vo.name}></option>
                    <{/volist}>
                </select>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>跳转ID/链接：</label>
            <div class="formControls col-xs-4 col-sm-6">
                <input required="required" type="text" class="input-text" value="" placeholder="" id="ad_target_id1" name="ad_target_id1" maxlength="255">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span style="font-weight: bold;font-size: 3rem;color: #0c0c0c">广告2</span></label>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>标题：</label>
            <div class="formControls col-xs-4 col-sm-6">
                <input required="required" type="text" class="input-text" value="" placeholder="" id="title2" name="title2" maxlength="30">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>封面图：</label>
            <div class="formControls col-xs-4 col-sm-2">
                <a class="upload">选择文件
                    <input type="file" multiple  name="file2" id="file2" style="color: #0e90d2"   onchange="imgChange2(event)">
                </a>
            </div>
            <img src="http://oqt46pvmm.bkt.clouddn.com/Ft56ta8EDC03VFYIHzFuSjcv5E5_" id="showimg2" style="width: 80px;height: 80px;">（图片不能大于1024KB）
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>跳转类型：</label>
            <div class="formControls col-xs-3 col-sm-4">
                <select id="ad_target_type2" name="ad_target_type2">
                    <{volist name="type" id="vo"}>
                    <option value="<{$vo.type}>"><{$vo.name}></option>
                    <{/volist}>
                </select>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>跳转ID/链接：</label>
            <div class="formControls col-xs-4 col-sm-6">
                <input required="required" type="text" class="input-text" value="" placeholder="" id="ad_target_id2" name="ad_target_id2" maxlength="255">
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" style="margin: auto" type="submit" value="&nbsp;&nbsp;新增&nbsp;&nbsp;">
            </div>
        </div>
    </form>
</article>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
    var postimg = null;
    var postimg2 = null;
    var counttype = 1;
    //图片上传
    function imgChange(e) {
       // console.log(e);
        //console.info(e.target.files[0]);//图片文件
        var dom =$("input[id^='file']")[0];
      //  console.info(dom.value);//这个是文件的路径 C:\fakepath\icon (5).png
        var reader = new FileReader();
        reader.onload = (function (file) {
            return function (e) {
                // $("#showimgpath").attr("value",dom.value);
                $("#showimg1").attr("src",this.result);
                postimg = this.result;
            };
        })(e.target.files[0]);
        reader.readAsDataURL(e.target.files[0]);
    }
    //图片上传
    function imgChange2(e) {
       // console.log(e);
       // console.info(e.target.files[0]);//图片文件
        var dom =$("input[id^='file2']")[0];
       // console.info(dom.value);//这个是文件的路径 C:\fakepath\icon (5).png
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
        $("#addcolumn").click(function(){
            counttype++
            var affiliation_column = 'affiliation_column'+counttype;
            var column_place = 'column_place'+counttype;
            $(".addlist").append(' <div class="row cl">\n' +
                '                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>所属栏目：</label>\n' +
                '                <div class="formControls col-xs-8 col-sm-6">\n' +
                '                    <div class="row" style="margin-top: 0;">\n' +
                '                        <div class="formControls col-xs-4 col-sm-4">\n' +
                '                            <select id='+affiliation_column+' name='+affiliation_column+'>\n' +
                '                                <{volist name="column" id="vo"}>\n' +
                '                                <option value="<{$vo.id}>"><{$vo.name}></option>\n' +
                '                                <{/volist}>\n' +
                '                            </select>\n' +
                '                        </div>\n' +
                '                        <div class="formControls col-xs-8 col-sm-8">\n' +
                '                            <div class="row" style="margin-top: 0;">\n' +
                '                                <label class="formControls col-xs-6 col-sm-8"style="padding: 0;text-align: right"><span class="c-red">*</span>栏目位置：固定在第</label>\n' +
                '                                <div class="formControls col-xs-3 col-sm-3">\n' +
                '                                    <input required="required" type="number" style="height:25px;padding:0;width: 100%;" class="input-text" value="" placeholder="" id='+column_place+' name='+column_place+' maxlength="3">\n' +
                '                                </div>\n' +
                '                                <label class="formControls col-xs-1 col-sm-1"style="padding: 0;">条</label>\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                    </div>\n' +
                '                </div>\n' +
                '            </div>');
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
                postdata.push({name: "ad_img1", value:postimg});
                postdata.push({name: "ad_img2", value:postimg2});
                // postdata.push({name: "affiliation_column", value:$("#affiliation_column_id").find("option:selected").text()});
                postdata.push({name: "ad_target_type_name1", value:$("#ad_target_type1").find("option:selected").text()});
                postdata.push({name: "ad_target_type_name2", value:$("#ad_target_type2").find("option:selected").text()});
                postdata.push({name: "typecount", value:counttype});
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
                                time:5000,
                                btn: [ '知道了']
                            })
                        }//end
                    }
                });
            }
        });
    });
</script>
