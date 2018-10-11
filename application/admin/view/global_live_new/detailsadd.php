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
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>讲师ID：</label>
            <div class="formControls col-xs-4 col-sm-6">
                <{eq name="$data['type']" value="2"}>
                <input type="hidden" class="input-text" value="<{$data['cid']}>" id="cid" name="cid" >
                <input type="hidden" class="input-text" value="<{$data['user_id']}>" id="user_id" name="user_id" >
                <input type="hidden" class="input-text" value="<{$data['teacher_name']}>" id="teacher_name" name="teacher_name" >
                <input type="text" class="input-text" value="<{$data['user_id']}>" disabled="disabled">
                <span>(<{$data['teacher_name']}> ID:<{$data['user_id']}>)</span>
                <{else/}>
                <input type="text" class="input-text" value="" placeholder="请输入关联id，关联讲师" required="required" id="user_id" name="user_id">
<!--                <span>(可输入讲师部分昵称后离开焦点进行模糊搜索讲师ID)</span>-->
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
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>分类：</label>
            <div class="formControls col-xs-4 col-sm-4">
                <select id="classification" name="classification">
                    <{eq name="$data['type']" value="2"}>
                    <option value="<{$data['classification']}>"><{$data['classification']}></option>
                    <option value="专场">专场</option>
                    <option value="实盘">实盘</option>
                    <{else/}>
                    <option value="0">请选择</option>
                    <option value="专场">专场</option>
                    <option value="实盘">实盘</option>
                    <{/eq}>
                </select>
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>课程栏目：</label>
            <div class="formControls col-xs-4 col-sm-6">
                <input type="text" class="input-text" <{if condition="$data['type'] == 2"}> value="<{$data['cate_name']}>"<{/if}> required="required"  placeholder="课程栏目" id="cate_name" name="cate_name">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>主题：</label>
            <div class="formControls col-xs-4 col-sm-6">
                <input type="text" class="input-text" <{if condition="$data['type'] == 2"}> value="<{$data['class_name']}>"<{/if}> required="required"  placeholder="课程名称/主题" id="class_name" name="class_name" maxlength="30">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>直播时间：</label>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>日期：</label>
            <div class="formControls col-xs-4 col-sm-6">
                <input class="Wdate" type="text"  id="dayTime"  required="required" name="dayTime" <{if condition="$data['type'] == 2"}> value="<{$data['dayTime']}>"<{/if}>  placeholder="直播时间" onfocus="WdatePicker({minDate: 'dateMin',dateFmt: 'yyyy-MM-dd' })" style="width:180px;"/>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>开始：</label>
            <div class="formControls col-xs-4 col-sm-6">
                <input type="text" class="input-text" <{if condition="$data['type'] == 2"}> value="<{$data['startTime']}>"<{/if}> required="required"  placeholder="开始" id="startTime" name="startTime">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>结束：</label>
            <div class="formControls col-xs-4 col-sm-6">
                <input type="text" class="input-text" <{if condition="$data['type'] == 2"}> value="<{$data['endTime']}>"<{/if}> required="required"  placeholder="结束" id="endTime" name="endTime">
            </div>
        </div>

<!--        <div class="row cl">-->
<!--            <label class="form-label col-xs-3"><span class="c-red">*</span>密码：</label>-->
<!--            <div class="formControls col-xs-8">-->
<!--                <div class="radio-box">-->
<!--                    <input type="radio" id="pass" name="pass" class="pass" value="1"-->
<!--                    <{if condition="$data['type'] == 1 ||$data['type'] == 2 && $data['password'] == ''"}> checked <{/if}>-->
<!--                    <{if condition="$data['type'] == 2 && $data['password'] != ''"}> checked <{/if}>>-->
<!--                    <label for="status">无</label>-->
<!--                </div>-->
<!--                <div class="radio-box">-->
<!--                    <input type="radio" id="pass" name="pass" class="pass" value="2" <{if condition="$data['type'] == 2 && $data['password'] != ''"}> checked <{/if}>>-->
<!--                    <label for="status">有</label>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="row cl" id="passshow">-->
<!--            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>密码：</label>-->
<!--            <div class="formControls col-xs-4 col-sm-6">-->
<!--                <input type="number" maxlength="4" style="width: 100%" class="input-text" id="password" name="password"  <{if condition="$data['type'] == 2"}> value="<{$data['password']}>"<{/if}>  placeholder="密码">-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="row cl" id="adaptshow">-->
<!--            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>适用的平台：</label>-->
<!--            <div class="formControls col-xs-4 col-sm-6">-->
<!--                <{if condition="$data['type'] == 2 && $data['password'] == ''||$data['type'] == 1"}>-->
<!--                    <label ><input type="checkbox"  checked="checked" name="adapt" value="1"><label>公众号</label></label>-->
<!--                    <label ><input type="checkbox"  checked="checked" name="adapt" value="2"><label >小程序</label></label>-->
<!--                    <label ><input type="checkbox"  checked="checked" name="adapt" value="3"><label >移动端（IOS/Android）</label></label>-->
<!--                <{else\}>-->
<!--                    <label ><input type="checkbox" <{if condition="$data['adaptData']['weixin'] == true"}> checked="checked"<{/if}> name="adapt" value="1"><label>公众号</label></label>-->
<!--                    <label ><input type="checkbox" <{if condition="$data['adaptData']['applet'] == true"}> checked="checked"<{/if}> name="adapt" value="2"><label >小程序</label></label>-->
<!--                    <label ><input type="checkbox" <{if condition="$data['adaptData']['mobile'] == true"}> checked="checked"<{/if}> name="adapt" value="3"><label >移动端（IOS/Android）</label></label>-->
<!--                <{/if}>-->
<!--            </div>-->
<!--        </div>-->

        <div class="row cl">
            <div class="col-xs-8 col-sm-3 col-xs-offset-3 col-sm-offset-3">
                <input class="btn btn-primary radius" style="margin: auto" type="submit" value="&nbsp;&nbsp;确定&nbsp;&nbsp;">
            </div>
        </div>
    </form>
</article>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
    var postimg = null,
        checkUrl = '<{:url("CourseManage/ajaxSearchUser")}>',
        addUrl = '<{:url("GlobalLive/detailsadd")}>',
        checktimeurl = '<{:url("/GlobalLive/checktime")}>';

        $("#startTime").click(function (){
            var html = '<div id="showTime" style="margin: 0 1.2rem;">';
            var daytime = $('#dayTime').val();
            $.post(checktimeurl+"?checkday="+daytime, {}, function(data){
                $.each(data.data, function(i,vo){
                    if(vo.state == 0){
                        html += '<input class="btn btn-primary radius" style="margin:1px;width: 60px;" onclick="setStartTime(this.value)" type="button" value="&nbsp;'+vo.time+'&nbsp;&nbsp;">';
                    }else{
                        html += '<input class="btn btn-primary radius" disabled=disabled style="margin:1px;width: 60px;" type="button" value="&nbsp;'+vo.time+'&nbsp;&nbsp;">';
                    }
                });
                html += "</div>";
                layer.open({
                    type: 1,
                    content: html, //注意，如果str是object，那么需要字符拼接。
                    // success: function(layero, index){
                    //     // console.log(index);
                    // }
                });
                layer.config({
                    skin: 'demo-class', //默认皮肤
                    anim: 5,
                })
            });
        });
    $("#endTime").click(function (){
        var html = '<div id="showTime" style="margin: 0 1.2rem;">';
        var daytime = $('#dayTime').val();
        $.post(checktimeurl+"?checkday="+daytime, {}, function(data){
            $.each(data.data, function(i,vo){
                if(vo.state == 0){
                    html += '<input class="btn btn-primary radius" style="margin:1px;width: 60px;" onclick="setEndTime(this.value)" type="button" value="&nbsp;'+vo.time+'&nbsp;&nbsp;">';
                }else{
                    html += '<input class="btn btn-primary radius" disabled=disabled style="margin:1px;width: 60px;" type="button" value="&nbsp;'+vo.time+'&nbsp;&nbsp;">';
                }
            });
            html += "</div>";
                layer.open({
                type: 1,
                content: html, //注意，如果str是object，那么需要字符拼接。
                // success: function(layero, index){
                //     // console.log(index);
                // }
            });
            layer.config({
                skin: 'demo-class', //默认皮肤
                anim: 5,
            })
        });
    });

        function setStartTime(time) {
            $("#startTime").val($.trim(time));
            layer.close(layer.index); //再执行关闭
        }
    function setEndTime(time) {
        $("#endTime").val($.trim(time));
        layer.close(layer.index); //再执行关闭
    }
    function changeview(){
        var chenum = $("input[type=radio][name=pass]:checked").val();
        if (chenum == 1){
            $("#passshow").hide();
            $("#adaptshow").hide();
        }else{
            $("#passshow").show();
            $("#adaptshow").show();
        }
    }
    //提交数据
    $(function(){
        //ini初始化密码框
       changeview();
        //按钮状态改变
        $("input[type=radio][name=pass]").change(function (){
            changeview();
        });

        //提交表单
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
                var classification = $('#classification option:selected') .val();
                if (classification == 0){
                    layer.alert("请选择分类！", {
                        icon: 1,
                        skin: 'layer-ext-moon', //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
                        time:2000,
                        btn: [ '知道了']
                    });
                    return;
                }
                if(isNaN($("#user_id").val())){
                    layer.alert("用户ID必须是数字！", {
                        icon: 1,
                        skin: 'layer-ext-moon', //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
                        time:2000,
                        btn: [ '知道了']
                    });
                    return;
                }
                var postdata = $('#form-admin-add').serializeArray();
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
                            layer.msg(data.msg, "", "success");
                            setTimeout(function(){
                                if (window.parent != window && window.parent.hasOwnProperty('adminTableRefresh')){ // 刷新表格
                                    window.parent.adminTableRefresh();
                                }
                                layer_close();
                            },500)
                        }else{
                            layer.alert(data.msg, {
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

</script>
