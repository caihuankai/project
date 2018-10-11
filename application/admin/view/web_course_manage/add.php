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
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>课程名称：</label>
            <div class="formControls col-xs-4 col-sm-6">
                <input type="text" class="input-text" value="" required="required"  placeholder="课程名称" id="class_name" name="class_name" maxlength="30">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>创建人：</label>
            <div class="formControls col-xs-4 col-sm-6">
                <input type="hidden" value="<{$data.type}>" name="courseType">
                <{eq name="$data['type']" value="1"}>
                <input type="hidden" value="<{$data.pid}>" name="coursePid">
                <input type="hidden" class="input-text" value="<{$data['user_id']}>" id="uid" name="uid" maxlength="30">
                <span><{$data['alias']}> (ID:<{$data['user_id']}>)</span>
                <{else/}>
                <input type="hidden" value="0" name="coursePid">
                <input type="text" class="input-text" value="" placeholder="请输入关联id，关联讲师" required="required" id="uid" name="uid" maxlength="30">
                <span>(可输入讲师部分昵称后离开焦点进行模糊搜索讲师ID)</span>
                <{/eq}>
            </div>

        </div>
        <div class="row cl" id="isShow" style="display: none;">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>符合的用户：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <span id="seacerData"> </span>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>课程性质：</label>
            <div class="formControls col-xs-4 col-sm-4">
                <select id="level" name="level">
                    <{eq name="$data['type']" value="1"}>
                        <option value="0">免费公开</option>
                    <{else/}>
                        <option value="0">免费公开</option>
                        <option value="2">收费</option>
                    <{/eq}>
                </select>
            </div>
        </div>
        <div class="row cl" id="isfree" style="display: none;">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>优惠价(礼点)：</label>
            <div class="formControls col-xs-4 col-sm-3">
                <input type="number" style="width: 100%" class="input-text" value="" placeholder="最多保留两位小数" id="price" name="price" maxlength="30">
            </div>
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red"></span>原价(礼点)：</label>
            <div class="formControls col-xs-4 col-sm-3">
                <input type="number" class="input-text" style="width: 100%" value="" placeholder="最多保留两位小数" id="origin_price" name="origin_price" maxlength="30">
            </div>
        </div>
        <div  class="row cl" id="isPass" <{eq name="$data['type']" value="3"}> style="display: block;" <{else/}> style="display: none;"<{/eq}> >
        <label class="form-label col-xs-4 col-sm-3">
                <span>
                    <input name="isPass" type="checkbox" value="100" >
                </span>
            设置密码：
        </label>
        <div class="formControls col-xs-4 col-sm-4">
            <input type="password" class="input-text" value="" placeholder="请输入4位数英文和数字，部分大小写" id="password" name="password" maxlength="30">
        </div>
        （非必选，不填为空则不设密码）
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>上传封面（移动端）：</label>
            <div class="formControls col-xs-4 col-sm-5">
                <img src="http://oqt46pvmm.bkt.clouddn.com/FhPDicPP90HTbLd_vgudvfBc2mpZ" id="showimg"style="width: 300px;height: 120px;border: 0 solid #000">
            </div>
            <div class="formControls col-xs-4 col-sm-2">
                <a class="upload">上传
                    <input type="file" multiple  name="file" id="file" style="color: #0e90d2"   onchange="imgChange(event)">
                </a>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>上传封面（PC端）：</label>
            <div class="formControls col-xs-4 col-sm-5">
                <img src="http://oqt46pvmm.bkt.clouddn.com/FhPDicPP90HTbLd_vgudvfBc2mpZ" id="showimg2"style="width: 300px;height: 120px;border: 0 solid #000">
            </div>
            <div class="formControls col-xs-4 col-sm-2">
                <a class="upload">上传
                    <input type="file" multiple  name="file" id="file" style="color: #0e90d2"   onchange="imgChange2(event)">
                </a>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>直播时间：</label>
            <div class="formControls col-xs-4 col-sm-6">
                <input class="Wdate" type="text"  id="liveTime" required="required" name="begin_time"  placeholder="直播时间" onfocus="WdatePicker({minDate: 'dateMin',dateFmt: 'yyyy-MM-dd HH:mm' })" style="width:180px;"/>
            </div>
            <span> </span>
        </div>
        <div class="row cl" <{eq name="$data['type']" value="2"}>style="display: block;" <{else/}> style="display: none;"<{/eq}>>
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>课程安排：</label>
            <div class="formControls col-xs-4 col-sm-3">
                <input type="number" class="input-text " value=""  placeholder="请输入课程数" id="plan_num" name="plan_num" style="width: 100%">
            </div>
            <label style="margin-top: 3px;cursor: text;">节</label>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>状态：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <div class="radio-box">
                    <input name="open_status"  checked="checked" type="radio"  value="1" >
                    <label>启用</label>
                </div>
                <div class="radio-box">
                    <input type="radio"   name="open_status"  value="2">
                    <label>停用</label>
                </div>
            </div>
        </div>

        <div class="row cl">
            <div class="col-xs-8 col-sm-3 col-xs-offset-3 col-sm-offset-3">
                <input class="btn btn-primary radius" style="margin: auto" type="submit" value="&nbsp;&nbsp;创建&nbsp;&nbsp;">
            </div>
        </div>
    </form>
</article>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
    var postimg = null,postimg2 = null,addUrl='<{:url("CourseManage/add")}>',
        checkUrl = '<{:url("CourseManage/ajaxSearchUser")}>',courseType = "<{$data['type']}>";

    //图片上传
    function imgChange(e) {
       // console.info(e.target.files[0]);//图片文件
        var dom =$("input[id^='file']")[0];
      //  console.info(dom.value);//这个是文件的路径 C:\fakepath\icon (5).png
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
      //  console.info(e.target.files[0]);//图片文件
        var dom =$("input[id^='file']")[0];
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
                var level =   $("#level option:selected").val(),origin_price= $("#origin_price").val(),price= $("#price").val();
                if (parseInt(level) != 0){
                    if(origin_price.length<1 || price.length<1){
                        layer.alert("课程价格为必填项", {
                            icon: 1,
                            skin: 'layer-ext-moon', //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
                            time:2000,
                            btn: [ '知道了']
                        });
                        return;
                    }
                }
                var postdata = $('#form-admin-add').serializeArray();
                postdata.push({name: "src_img", value:postimg});
                postdata.push({name: "src_pc_img", value:postimg2});
                if(postimg == null || postimg2 == null)
                {
                    layer.alert("课程封面未上传！", {
                        icon: 1,
                        skin: 'layer-ext-moon', //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
                        time:2000,
                        btn: [ '知道了']
                    });
                    return;
                }
                var url = addUrl;
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

    /**
     * 搜索讲师信息
     **/
    $("#uid").blur(function(){
       var search = $("#uid").val();
        var ex = /^\d+$/;
       if (search.length >0 && search.length <7 && !ex.test(search)){
           $.ajax({
               type:"POST",
               url:checkUrl,
               data:{
                   search:search,
               },// 参数
               async: false,
               error: function(request) {
                   layer.close(jz);
                   layer.msg("网络错误!", "", "error");
               },
               success: function(data) {

                       $("#isShow").css('display','block');
                       var html = "";
                       $.each(data.data, function(i,vo){
                           if(((parseInt(i)+1) % 2) == 0){
                               html += '<span>'+(i+1)+ '、'+ vo.alias+'(ID:'+ vo.user_id+')</span><br/>';
                           }else{
                               html += '<span>'+(i+1)+ '、'+ vo.alias+'(ID:'+ vo.user_id+')</span>\t&nbsp;\t&nbsp;';
                           }
                       });
                       $('#seacerData').html(html)
               }
           });//
       }else{
           $("#isShow").css('display','none');
       }
    });
    /**
     * 课程性质为收费时必须出现礼点输入框
     */
    $('#level').change(function(){
        var level =   $("#level option:selected").val();
        if (parseInt(level) != 0){
            $("#isfree").css('display','block');
            $("#isPass").css('display','none');
        }else{
            $("#isfree").css('display','none');
            if (courseType == 3){
                $("#isPass").css('display','block');
            }
        }
    })
</script>
