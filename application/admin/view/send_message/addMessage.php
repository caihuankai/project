<link rel="stylesheet" href="/lib/webuploader/webuploader.css" />
<script type="text/javascript" src="/lib/uploadify/jquery.uploadify.min.js"></script>
<script type="text/javascript" src="/lib/webuploader/webuploader.js"></script>
<script type="text/javascript" src="/lib/My97DatePicker/WdatePicker.js"></script>
<article class="page-container">
    <form class="form form-horizontal" id="form-admin-add">

        <input type="hidden" class="input-text valid" placeholder="" name="baseFile" value="" id="baseFile">

        <input type="hidden" class="input-text valid" placeholder="" name="count" value="" id="count">

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>推送类型：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <label><input name="type" type="radio" value="0" style="width:30px;" onchange="click_type(0)"/>文字消息 </label> 
                <!-- <label><input name="type" type="radio" value="1" style="width:30px;" onchange="click_type(1)"/>图片消息 </label>  -->
                <label><input name="type" type="radio" value="2" style="width:30px;" onchange="click_type(2)"/>图文消息 </label> 
            </div>
        </div>

        <div class="row cl" id="send_count_div" style="display:none">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>推送数量：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <label><input name="send_count" type="radio" value="1" style="width:30px;" onchange="click_send_count(1)" checked="checked" />单篇 </label> 
                <label><input name="send_count" type="radio" value="2" style="width:30px;" onchange="click_send_count(2)"/>多篇 </label> 
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>目标用户：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <label onclick="click_push_target(0)"><input name="push_target" type="radio" value="0" style="width:30px;"/>全部用户 </label> 

                <label><input name="push_target" type="radio" value="1" style="width:30px;" onclick="click_push_target(1)"/>局部用户 </label> 

                <label id="push_target_c" style="display:none">
                <p><input type="radio" value="1" name="push_target_c"/>付费</p>
                <p><input type="radio" value="2" name="push_target_c"/>未付费</p></label> 

                <label  onclick="click_push_target(0)"><input name="push_target" type="radio" value="3" style="width:30px;"/>独立用户 </label> 
                <label><input type="text" class="input-text" value="" placeholder="用户id" id="user_id" name="user_id"></label> 
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>推送时间：</label>
                <label><input name="push_type" type="radio" value="1" style="width:30px;" onclick="click_push_type(0)"/>立即推送 </label> 
                <label><input name="push_type" type="radio" value="2" style="width:30px;" onclick="click_push_type(1)"/>定时推送 </label>
            </div>
        </div>

        <div class="row cl" id="push_time_div" style="display:none">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>选择推送时间：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss'})" id="push_time" name="push_time" class="input-text Wdate" value="" style="width:200px;">
            </div>
        </div>

        <div class="row cl" id="title_div" style="display:none">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>标题：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="title" name="title" maxlength="20">
            </div>
        </div>

        <div class="row cl" id="img_div" style="display:none">
            <label class="form-label col-xs-4 col-sm-3">上传图片：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <span class="btn-upload form-group">
                <input class="input-text upload-url" type="text" name="uploadfile" id="uploadfile" readonly  datatype="*" nullmsg="请添加附件！" style="width:200px">
                <a href="javascript:void();" class="btn btn-primary upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>
                <input type="file" multiple name="file" id="file" class="input-file" onchange="imgChange(event,0)">
                </span>
                <label>（建议尺寸：900*500 图片不能大于1024K）</label>
            </div>
        </div>

        <div class="row cl" id="showImage_div" style="display:none">
            <label class="form-label col-xs-4 col-sm-3">图片预览：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <img src="" id="showImage" name="showImage" alt="" height="200" width="200">
                <br>
            </div>
        </div>

        <div class="row cl" id="content_div" style="display:">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>内容：</label>
            <div class="formControls col-xs-8 col-sm-9">

                <input class="btn btn-success" onclick="add_url()" type="button" value="添加超链接">

                <textarea class="textarea" id="content" name="content" maxlength="500"></textarea>
            </div>
        </div>

        <div class="row cl" id="jump_type_id" style="display:none">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>url：</label>
                <label><input name="jump_type" type="radio" value="0" style="width:30px;" onclick="click_jump_type()"/>链接 </label> 
                <label><input name="jump_type" type="radio" value="1" style="width:30px;" onclick="click_jump_type()"/>课程ID </label> 
                <label><input name="jump_type" type="radio" value="2" style="width:30px;" onclick="click_jump_type()"/>观点ID </label> 
            </div>
        </div>

        <div class="row cl" id="jump_text" style="display:none">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span></label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="请输入跳转的链接或ID" id="jump_url" name="jump_url">
            </div>
        </div>

        <div class="row cl" id="content_list" style="display:none">
            
        </div>

        <div class="row cl" id="add_article" style="display:none" align="center">
            <div class="formControls col-xs-8 col-sm-9">
                <input class="btn btn-success" onclick="add_article()" type="button" value="&nbsp;&nbsp;+新增图文&nbsp;&nbsp;">
            </div>
        </div>


        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
                <button onclick="yulan()" type="button" class="btn btn-success">　预览　</button>
            </div>
        </div>
    </form>
</article>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
    //图文数量
    var i = 0;
    //单篇多篇
    var send_count_value = 1;
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
                var url = "./addMessage";
                var jz;
                layer.confirm('确认推送吗?', {icon: 3, title:'提示'},
                function(index){
                $.ajax({
                    type:"POST",
                    url:url,
                    data:$('#form-admin-add').serializeArray(),// 你的formid
                    async: false,
                    beforeSend:function(){
                        jz = layer.load(0, {shade: false}); //0代表加载的风格，支持0-2
                    },
                    error: function(request) {
                        layer.close(jz);
                        layer.msg("网络错误!", "", "error");
                    },
                    success: function(data) {
                        // alert(data);
                        // console.log(data);
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
                );
            }
        });
    });

    //处理目标用户
    function click_push_target(is){
        //0显示 1隐藏
        if(is==1){
            $("#push_target_c").css('display','');
        }else{
            $("#push_target_c").css('display','none');
        }
    }
    //处理图片
    function imgChange(e,i) {
        //console.info(e.target.files[0]);//图片文件
        if(i>0){
            var dom =$("input[id^='file"+i+"']")[0];
        }else{
            var dom =$("input[id^='file']")[0];
        }
        //console.info(dom.value);//这个是文件的路径 C:\fakepath\icon (5).png
        //console.log(e.target.value);//这个也是文件的路径和上面的dom.value是一样的
        var reader = new FileReader();
        reader.onload = (function (file) {
            return function (e) {
                //console.info(this.result); //这个就是base64的数据了
                if(i>0){
                    var sss=$("#showImage"+i+"");
                }else{
                    var sss=$("#showImage");
                }
                
                // $("#showImage")[0].src=this.result;
                // $("#baseFile")[0].value=this.result;
                $.ajax({
                    type:"POST",
                    url:"./upImg",
                    data:{
                        'baseFile':this.result,
                    },// 你的formid
                    async: false,
                    beforeSend:function(){
                        jz = layer.load(0, {shade: false}); //0代表加载的风格，支持0-2
                    },
                    error: function(request) {
                        layer.close(jz);
                        layer.msg("网络错误!", "", "error");
                    },
                    success: function(data) {
                        layer.close(jz);
                        // alert(data);
                        console.log(data);
                        if(i>0){
                            $("#showImage"+i+"")[0].src = data;
                            $("#baseFile"+i+"")[0].value = data;
                        }else{
                            $("#showImage")[0].src = data;
                            $("#baseFile")[0].value = data;
                        }
                    }
                });
            };
        })(e.target.files[0]);
        reader.readAsDataURL(e.target.files[0]);
    }
    //处理跳转链接输入框
    function click_jump_type(){
        $("#jump_text").css('display','');
    }
    //处理推送时间
    function click_push_type(is){
        if(is==1){
            $("#push_time_div").css('display','');
        }else{
            $("#push_time_div").css('display','none');
        }
    }
    //处理选择推送类型
    function click_type(is){
        if(is==0){
            $("#title_div").css('display','none');
            $("#img_div").css('display','none');
            $("#showImage_div").css('display','none');
            $("#jump_type_id").css('display','none');
            $("#jump_text").css('display','none');
            $("#content_div").css('display','');
            $("#send_count_div").css('display','none');
            $("#add_article").css('display','none');
            $("#content_list").css('display','none');
        }
        if(is==1){
            $("#title_div").css('display','none');
            $("#img_div").css('display','');
            $("#showImage_div").css('display','');
            $("#jump_type_id").css('display','none');
            $("#jump_text").css('display','none');
            $("#content_div").css('display','none');
            $("#add_article").css('display','none');
        }
        if(is==2){
            $("#send_count_div").css('display','');
            if(send_count_value == 2){
                $("#title_div").css('display','none');
                $("#img_div").css('display','none');
                $("#showImage_div").css('display','none');
                $("#jump_type_id").css('display','none');
                $("#jump_text").css('display','none');
                $("#content_div").css('display','none');
                $("#content_list").css('display','');
            }else{
                $("#title_div").css('display','');
                $("#img_div").css('display','');
                $("#showImage_div").css('display','');
                $("#jump_type_id").css('display','');
                $("#jump_text").css('display','');
                $("#content_div").css('display','');
                $("#content_list").css('display','none');
            }
        }
    }
    //处理单篇图文、多篇图文
    function click_send_count(is){
        if(is == 1){
            send_count_value = 1;
            $("#title_div").css('display','');
            $("#img_div").css('display','');
            $("#showImage_div").css('display','');
            $("#jump_type_id").css('display','');
            $("#jump_text").css('display','');
            $("#jump_url").css('display','');
            $("#content_div").css('display','');
            $("#add_article").css('display','none');
            $("#content_list").css('display','none');
        }
        if(is == 2){
            send_count_value = 2;
            $("#title_div").css('display','none');
            $("#img_div").css('display','none');
            $("#showImage_div").css('display','none');
            $("#jump_type_id").css('display','none');
            $("#jump_text").css('display','none');
            $("#content_div").css('display','none');
            $("#add_article").css('display','');
            $("#content_list").css('display','');
            $("#jump_url").css('display','none');
        }
    }
    //新增图文
    function add_article(){
        i ++;
        $("#count")[0].value = i;
        if(i > 8){
            i --;
            $("#count")[0].value = i;
            layer.msg('图文数量超过8篇,不可新增啦');
            return;
        }
        //拼接html
        var html = '<div class="row cl">\
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>图文'+i+'：</label>\
        </div>';  
        html += '<div class="row cl" id="title_div'+i+'">\
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>标题：</label>\
            <div class="formControls col-xs-8 col-sm-9">\
                <input type="text" class="input-text" value="" placeholder="" id="title'+i+'" name="title'+i+'" maxlength="20">\
            </div>\
        </div>';
        html += '<div class="row cl" id="img_div">\
            <label class="form-label col-xs-4 col-sm-3">上传图片：</label>\
            <div class="formControls col-xs-8 col-sm-9">\
                <span class="btn-upload form-group">\
                <input class="input-text upload-url" type="text" name="uploadfile" id="uploadfile" readonly  datatype="*" nullmsg="请添加附件！" style="width:200px">\
                <a href="javascript:void();" class="btn btn-primary upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>\
                <input type="file" multiple name="file'+i+'" id="file'+i+'" class="input-file" onchange="imgChange(event,'+i+')">\
                </span>\
                <label>（建议尺寸：900*500 图片不能大于1024K）</label>\
            </div>\
        </div>';


        html += '<div class="row cl" id="showImage_div'+i+'" >\
            <label class="form-label col-xs-4 col-sm-3">图片预览：</label>\
            <div class="formControls col-xs-8 col-sm-9">\
                <img src="" id="showImage'+i+'" name="showImage'+i+'" alt="" height="200" width="200">\
                <br>\
            </div>\
        </div>';
        html += '<div class="row cl" id="content_div'+i+'" style="display:none">\
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>内容：</label>\
            <div class="formControls col-xs-8 col-sm-9">\
                <textarea class="textarea" name="content'+i+'" maxlength="500"></textarea>\
            </div>\
        </div>';
        html += '<div class="row cl" id="jump_type_id'+i+'" >\
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>url：</label>\
                <label><input name="jump_type'+i+'" type="radio" value="0" style="width:30px;" onclick="click_jump_type('+i+')"/>链接 </label> \
                <label><input name="jump_type'+i+'" type="radio" value="1" style="width:30px;" onclick="click_jump_type('+i+')"/>课程ID </label> \
                <label><input name="jump_type'+i+'" type="radio" value="2" style="width:30px;" onclick="click_jump_type('+i+')"/>观点ID </label> \
            </div>\
        </div>';
        html += '<div class="row cl" id="jump_text'+i+'" >\
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span></label>\
            <div class="formControls col-xs-8 col-sm-9">\
                <input type="text" class="input-text" value="" placeholder="请输入跳转的链接或ID" id="jump_url'+i+'" name="jump_url'+i+'">\
            </div>\
        </div>';
        html += '<input type="hidden" class="input-text valid" placeholder="" name="baseFile'+i+'" value="" id="baseFile'+i+'">';
        
        $('#content_list').append(html); 
    }
    //预览
    function yulan(){
        var url = "./yulan";
        var jz;
        $.ajax({
            type:"POST",
            url:url,
            data:$('#form-admin-add').serializeArray(),// 你的formid
            async: false,
            beforeSend:function(){
                jz = layer.load(0, {shade: false}); //0代表加载的风格，支持0-2
            },
            error: function(request) {
                layer.close(jz);
                layer.msg("网络错误!", "", "error");
            },
            success: function(data) {
                // alert(data);
                console.log(data);
                //关闭加载层
                layer.close(jz);
                if(data.status == 1){
                    send_url = "./sendYulan";
                    layer_show('发送预览', send_url + '?id=' + data.msg, 500, 300);
                }else{
                    layer.msg(data.msg, "", "error");
                }
            }
        });
    }
    //添加超链接
    function add_url(){
        layer.open({
            offset: 'auto',
            title: '添加超链接',
            content: '<div class="row cl">        <label class="form-label col-xs-4 col-sm-3">跳转类型：</label>        <div class="formControls col-xs-8 col-sm-9">        <select name="url_type" id="url_type" class="form-control form-select" >                  <option value="1">外链</option>            <option value="2">课程介绍页</option>            <option value="3">特训班预告页</option>            <option value="4">栏目</option>            <option value="5">观点详情页</option>            <option value="6">Live直播间</option>            <option value="7">公众直播间</option>        </select>        </div>    </div>    <div class="row cl">        <label class="form-label col-xs-4 col-sm-3">ID/链接：</label>        <div class="formControls col-xs-8 col-sm-9">            <input type="text" class="input-text valid" name="url_id" value="" id="url_id" placeholder="请输入跳转类型的ID（如跳转类型为链接，请输入链接地址）">            <br>            <small></small>        </div>    </div>        <div class="row cl">        <label class="form-label col-xs-4 col-sm-3">链接标题：</label>        <div class="formControls col-xs-8 col-sm-9">            <input type="text" class="input-text valid" placeholder="" name="url_title" value="" id="url_title">            <br>        </div>    </div>    <div class="row cl">        <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3"></div>    </div>',
            yes: function(index, layero){
                var url_type = document.getElementById("url_type").value;
                var url_id = document.getElementById("url_id").value;
                var url_title = document.getElementById("url_title").value;
                //do something
                $.ajax({  
                     url: './addUrl?url_type='+url_type+'&url_id='+url_id+'&url_title='+url_title ,  
                     type: 'Get',  
                     async: false,  
                     cache: false,  
                     contentType: false,  
                     processData: false,  
                     success: function (data) {
                        var ele = document.getElementById("content");
                        ele.value = ele.value + data;  
                        layer.close(index); //如果设定了yes回调，需进行手工关闭
                     },  
                     error: function (errdata) {  
                         layer.msg('添加失败');
                     }  
                });  
                
            }
        });  
    }
</script>
