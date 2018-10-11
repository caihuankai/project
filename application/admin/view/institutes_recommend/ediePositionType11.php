<style>
    .row{
        margin: 8px 0;
        padding: 0;
    }
</style>


<form class="form form-horizontal" id="form-admin-add">

    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">名称：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text valid" placeholder="" name="adName" value="<{$data['adName']}>" id="adName">
            <br>
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">跳转类型：</label>
        <div class="formControls col-xs-8 col-sm-9">
        <select name="relevanceType" id="relevanceType" class="form-control form-select" >
            <{if $data['relevanceType'] eq 4}>
                <option selected="selected" value="4">专题课介绍页</option>
                <option value="9">系列课介绍页</option>
                <option value="10">特训班预告页</option>
                <option value="11">特训班详情页</option>
                <option value="12">特训班回顾页</option>
                <option value="13">视频</option>
            <{/if}>
            <{if $data['relevanceType'] eq 9}>
                <option value="4">专题课介绍页</option>
                <option selected="selected" value="9">系列课介绍页</option>
                <option value="10">特训班预告页</option>
                <option value="11">特训班详情页</option>
                <option value="12">特训班回顾页</option>
                <option value="13">视频</option>
            <{/if}>
            <{if $data['relevanceType'] eq 10}>
                <option value="4">专题课介绍页</option>
                <option value="9">系列课介绍页</option>
                <option selected="selected" value="10">特训班预告页</option>
                <option value="11">特训班详情页</option>
                <option value="12">特训班回顾页</option>
                <option value="13">视频</option>
            <{/if}>
            <{if $data['relevanceType'] eq 11}>
                <option value="4">专题课介绍页</option>
                <option value="9">系列课介绍页</option>
                <option value="10">特训班预告页</option>
                <option selected="selected" value="11">特训班详情页</option>
                <option value="12">特训班回顾页</option>
                <option value="13">视频</option>
            <{/if}>
            <{if $data['relevanceType'] eq 12}>
                <option value="4">专题课介绍页</option>
                <option value="9">系列课介绍页</option>
                <option value="10">特训班预告页</option>
                <option value="11">特训班详情页</option>
                <option selected="selected" value="12">特训班回顾页</option>
                <option value="13">视频</option>
            <{/if}>
            <{if $data['relevanceType'] eq 13}>
                <option value="4">专题课介绍页</option>
                <option value="9">系列课介绍页</option>
                <option value="10">特训班预告页</option>
                <option value="11">特训班详情页</option>
                <option value="12">特训班回顾页</option>
                <option selected="selected" value="13">视频</option>
            <{/if}>
        </select>
        </div>
    </div>

    <div class="row cl" id="adURL_div">
        <label class="form-label col-xs-4 col-sm-3">ID/链接：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text valid" name="adURL" value="<{$data['relevanceId']}>" id="adURL" placeholder="请输入跳转类型的ID（如跳转类型为链接，请输入链接地址）">
            <br>
            <small></small>
        </div>
    </div>  
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">图片（图片不能大于1024KB）：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <span class="btn-upload form-group">
            <input class="input-text upload-url" type="text" name="uploadfile" id="uploadfile" readonly  datatype="*" nullmsg="请添加附件！" style="width:200px">
            <a href="javascript:void();" class="btn btn-primary upload-btn"><i class="Hui-iconfont">&#xe642;</i> 上传</a>
            <input type="file" multiple name="file" id="file" class="input-file" onchange="uploadImg()">
            </span>
        </div>
    </div>

    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">图片预览：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <img src="<{$data['adFile']}>" id="showImage" name="showImage" alt="" height="200" width="200">
            <br>
        </div>
    </div>

    <div class="row cl" id='video_div' style="display: none;">
        <label class="form-label col-xs-4 col-sm-3">上传视频：</label>
        <div class="row cl">
        <div id="admin-qi-niu-upload-div-be-upload-del-1" style="position: relative;">
        <span id="admin-qi-niu-upload-div-be-upload-del-1-empty-span"></span>
        <video id="admin-qi-niu-upload-div-be-upload-del-1-video" src="<{$data['adURL']}>" width="150px" height="100px" preload="meta" controls="controls" 0="" class=""></video>
        <span>
        <span id="admin-qi-niu-upload-div-be-upload-del-1-upload-button" class="btn btn-primary upload-btn" style="width:100px"><i class="Hui-iconfont">&#xe642;</i>上传</span>
        </span>
        <span id="admin-qi-niu-upload-div-be-upload-del-1-del-button" class="c-blue pointer upload-a-btn hide-ele">删除</span>
        <div>
        <script src="/lib/plupload-2.3.1/js/moxie.min.js"></script>
        <script src="/lib/plupload-2.3.1/js/plupload.full.min.js"></script>
        <script src="/lib/qi-niu-sdk-1.0.22/dist/qiniu.min.js"></script>
        </div>
        <script>    var uploader1 = (new QiniuJsSDK()).uploader((function (){
        var load = 0;
    
    return $.extend({
        runtimes: 'html5,flash,html4',    //上传模式,依次退化
        domain: 'oqt46pvmm.bkt.clouddn.com',   //bucket 域名，下载资源时用到，**必需**
        get_new_uptoken: false,  //设置上传文件的时候是否每次都重新获取新的token，true可用于一个页面多个域上传
        
        container: '',           //上传区域DOM ID，默认是browser_button的父元素，
        browse_button: "", //上传选择的点选按钮，**必需**
        drop_element: '',        //拖曳上传区域元素的ID，拖曳文件或文件夹后可触发上传
        
        multi_selection: false,           // 一次选择多个上传
        max_file_size: '100mb',           //最大文件体积限制
        max_retries: 3,                   //上传失败最大重试次数
        dragdrop: true,                   //开启可拖曳上传
        chunk_size: '4mb',                //分块上传时，每片的体积
        
        uptoken_url: '/Index/getQiNiuUploadToken',
        flash_swf_url: '/lib/plupload-2.3.1/js/Moxie.swf',  //引入flash,相对路径
        auto_start: true,
          //x_vars : {
          //    查看自定义变量
          //    'time' : function(up,file) {
          //        var time = (new Date()).getTime();
          // do something with 'time'
          //        return time;
          //    },
          //    'size' : function(up,file) {
          //        var size = file.size;
          // do something with 'size'
          //        return size;
          //    }
          //},
          filters:{
            mime_types:[
                // {title : "Image files", extensions : "jpg,jpeg,gif,png"} // 限制图片格式
            ]
          },
        init: {
            FilesAdded: function(up, files) {
              plupload.each(files, function(file) {
                // 文件添加进队列后，处理相关的事情
              });
            },
            BeforeUpload: function(up, file) {
              // 每个文件上传前，处理相关的事情
              load = layer.load(1); // 等太久就关闭，否则无法操作界面
            },
            UploadProgress: function(up, file) {
              // 每个文件上传时，处理相关的事情
            },
            FileUploaded:(function (){
                return function(up, file, info) {
                    // 每个文件上传成功后，处理相关的事情
                    // 其中info.response是文件上传成功后，服务端返回的json，形式如：
                    // {
                    //    "hash": "Fh8xVqod2MQ1mocfI4S4KpRL6D98",
                    //    "key": "gogopher.jpg"
                    //  }
                    // 查看简单反馈
                    var domain = up.getOption('domain'),
                        container = up.getOption('container'),
                        res = JSON.parse(info.response);
                    
                    var sourceLink = 'http://' + domain +"/"+ res.key; //获取上传成功后的文件的Url
                    
                    var mainEle = $(container).find('#admin-qi-niu-upload-div-be-upload-del-1-video').attr('src', sourceLink).show();
                    
                    mainEle.data('key', res.key);
                    mainEle.data('size', file.size);
                    
                    $('#admin-qi-niu-upload-div-be-upload-del-1-empty-span').hide(); // 空提示文案隐藏
                    // $('#admin-qi-niu-upload-div-be-upload-del-1-del-button').show(); // 删除按钮显示
                    

                    
                    (function (res, mainEle){
                        var postData = {
                            hash: res.hash,
                            key: res.key,
                            size: mainEle.data('size'),
                            hashUnique: 0,
                            type: 8
                        };
                        
                        $.ajax({
                            type:"POST",
                            url:'/Index/uploadQiNiuUrl',
                            async: false,
                            data: postData,  
                            beforeSend:function(){
                                //jz = layer.load(0, {shade: false}); //0代表加载的风格，支持0-2
                            },
                            error: function(request) {
                                layer.close(jz);
                                layer.msg("网络错误!", "", "error");
                            },
                            success: function(data) {
                                mainEle.data('id', data['id']);
                                $("#videoUrl")[0].value=data.data.url;
                                if(postData.hashUnique) { // 可能会改变key和url
                                    mainEle.data('key', data['key']);
                                    mainEle.attr('src', data['url']);
                                }
                            }
                        });
                    })(res, mainEle);
                    layer.close(load);
                };
            })(),
            Error: function(up, err, errTip) {
              layer.close(load);
              //上传出错时，处理相关的事情
              if (err && err.code == -600){ // 文件过大
                  layer.msg('上传文件过大，限制：' + up.getOption('max_file_size'));
              }else if (err && err.code == -601){
                  layer.msg('上传文件格式不正确');
              }else{
                  layer.msg(errTip);
              }
            },
            UploadComplete: function() {
              //队列文件处理完毕后，处理相关的事情
              layer.close(load);
            },
            Key: function(up, file) {
              // 若想在前端对每个文件的key进行个性化处理，可以配置该函数
              // 该配置必须要在unique_names: false，save_key: false时才生效
              
                var arr = file.name.split('.').splice(-1);
                
                if (arr[0]){
                    return file.id + '.' + arr[0];
                }
            }
        }
    }, {"max_file_size":false,"chunk_size":false,"max_retries":10,"container":"admin-qi-niu-upload-div-be-upload-del-1","browse_button":"admin-qi-niu-upload-div-be-upload-del-1-upload-button","drop_element":"admin-qi-niu-upload-div-be-upload-del-1"});
})());    (function (){
        var rootDiv = $(uploader1.getOption('container'));
        
        // 删除按钮
        $('#' + rootDiv.attr('id') + '-del-button').click(function (){
            $('#admin-qi-niu-upload-div-be-upload-del-1-video').attr('src', '').data('id', '').data('key', '').data('size', '');
        });
    })()</script><div id="html5_1ccfs8u861hvl8n9l3h1q1l48o4_container" class="moxie-shim moxie-shim-html5" style="position: absolute; top: 2px; left: 88px; width: 28px; height: 16px; overflow: hidden; z-index: 0;"><input id="html5_1ccfs8u861hvl8n9l3h1q1l48o4" type="file" style="font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;" accept=""></div></div>    </div>
    </div>

    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">排序：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text valid" placeholder="" name="adSort" value="<{$data['adSort']}>" id="adSort">
            <br>
            <small>数值越小，越靠前</small>
        </div>
    </div>
     <br>

    <div class="row cl">
        <label class="form-label col-xs-3"><span class="c-red">*</span>状态：</label>
        <div class="formControls col-xs-8">
            <div class="radio-box">
                <{if $data['adStatus'] eq 1}>
                    <input type="radio" value="1" name="adStatus" id="adStatus"  checked>启用
                    <input type="radio" value="-1" name="adStatus" id="adStatus">停用
                <{/if}>
                <{if $data['adStatus'] eq -1}>
                    <input type="radio" value="1" name="adStatus" id="adStatus" >启用
                    <input type="radio" value="-1" name="adStatus" id="adStatus" checked>停用
                <{/if}>
            </div>
        </div>
    </div>
    
    <br>
    
    <div class="formControls col-xs-8 col-sm-9">
        <input type="hidden" class="input-text" value="<{$data['adFile']}>" id="adFile" name="adFile">
    </div>
    <div class="formControls col-xs-8 col-sm-9">
        <input type="hidden" class="input-text" value="<{$positionType}>" id="positionType" name="positionType">
    </div>
    <input type="hidden" class="input-text valid" placeholder="" name="baseFile" value="<{$data['adFile']}>" id="baseFile">

    <div class="formControls col-xs-8 col-sm-9">
        <input type="hidden" class="input-text" value="<{$data['adId']}>" id="id" name="id">
    </div>
    <input type="hidden" class="input-text valid" placeholder="" name="videoUrl" value="<{$data['adURL']}>" id="videoUrl">
    
    <div class="row cl">
        <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
            <input class="btn btn-primary" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
        </div>
    </div>
    
</form>

<script>
    if("<{$data['relevanceType']}>" == 13){
        $("#video_div").css('display','block');
        $("#adURL_div").css('display','none');
        document.getElementById("adURL").value="";
    }else{
        $("#video_div").css('display','none');
        $("#adURL_div").css('display','block');
        document.getElementById("videoUrl").value="";
    }

    $('#file').on('change', function(){
        if (typeof this.files[0] == undefined) {
            console.log('file undefined');
            return null;
        }
        console.log(this.files[0]);
        var formData = new FormData();
        formData.append("img",$("#file")[0].files[0]);
        $.ajax({  
             url: '/Gift/img' ,  
             type: 'POST',  
             data: formData,  
             async: false,  
             cache: false,  
             contentType: false,  
             processData: false,  
             success: function (returndata) {
                if (returndata.code == 1) {
                    layer.msg('图片上传成功');
                    $("#showImage")[0].src=returndata.key;
                    $("#baseFile")[0].value=returndata.key;
                }  else {
                    return layer.msg(returndata.msg);
                }
             },  
             error: function (errdata) {  
                 layer.msg(errdata);
             }  
        });  
        
    });

    $('#relevanceType').change(function(){   
        var value=$(this).children('option:selected').val();//这就是selected的值
        if(value == 13){
            $("#video_div").css('display','block');
            $("#adURL_div").css('display','none');
        }else{
            $("#video_div").css('display','none');
            $("#adURL_div").css('display','block');
        }
    }) 


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