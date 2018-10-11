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

    <div class="formControls col-xs-8 col-sm-9">
        <input type="hidden" class="input-text" value="<{$data['adFile']}>" id="adFile" name="adFile">
    </div>

    <div class="formControls col-xs-8 col-sm-9">
        <input type="hidden" class="input-text" value="<{$positionType}>" id="positionType" name="positionType">
    </div>
    <{if $positionType neq 22}>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">跳转类型：</label>
        <div class="formControls col-xs-8 col-sm-9">
        <select name="relevanceType" id="relevanceType" class="form-control form-select" >
            <{if $data['relevanceType'] eq 7 && in_array($positionType,[9,14,17,20,24])}>
                <option selected="selected" value="7">外链</option>
                <option value="4">专题课介绍页</option>
                <option value="9">系列课介绍页</option>
                <option value="10">特训班预告页</option>
                <option value="6">讲师介绍页</option>
            <{/if}>
            <{if $data['relevanceType'] eq 4 && in_array($positionType,[9,14,17,20,24])}>
                <option value="7">外链</option>
                <option selected="selected" value="4">专题课介绍页</option>
                <option value="9">系列课介绍页</option>
                <option value="10">特训班预告页</option>
                <option value="6">讲师介绍页</option>
            <{/if}>
            <{if $data['relevanceType'] eq 9 && in_array($positionType,[9,14,17,20,24])}>
                <option value="7">外链</option>
                <option value="4">专题课介绍页</option>
                <option selected="selected" value="9">系列课介绍页</option>
                <option value="10">特训班预告页</option>
                <option value="6">讲师介绍页</option>
            <{/if}>
            <{if $data['relevanceType'] eq 10 && in_array($positionType,[9,14,17,20,24])}>
                <option value="7">外链</option>
                <option value="4">专题课介绍页</option>
                <option value="9">系列课介绍页</option>
                <option selected="selected" value="10">特训班预告页</option>
                <option value="6">讲师介绍页</option>
            <{/if}>
            <{if $data['relevanceType'] eq 6 && in_array($positionType,[9,14,17,20,24])}>
                <option value="7">外链</option>
                <option value="4">专题课介绍页</option>
                <option value="9">系列课介绍页</option>
                <option value="10">特训班预告页</option>
                <option selected="selected" value="6">讲师介绍页</option>
            <{/if}>
            <{if $data['relevanceType'] eq 4 && !in_array($positionType,[9,14,17,19,20,12,21,24])}>
                <option selected="selected" value="4">专题课介绍页</option>
                <option value="9">系列课介绍页</option>
                <option value="10">特训班预告页</option>
            <{/if}>
            <{if $data['relevanceType'] eq 9 && !in_array($positionType,[9,14,17,19,20,12,21,24]) }>
                <option value="4">专题课介绍页</option>
                <option selected="selected" value="9">系列课介绍页</option>
                <option value="10">特训班预告页</option>
            <{/if}>
            <{if $data['relevanceType'] eq 10 && !in_array($positionType,[9,14,17,19,20,12,21,24])}>
                <option value="4">专题课介绍页</option>
                <option value="9">系列课介绍页</option>
                <option selected="selected" value="10">特训班预告页</option>
            <{/if}>
            <{if $positionType eq 12}>
                <option value="10">特训班预告页</option>
            <{/if}>
            <{if $positionType eq 21 && $data['relevanceType'] eq 7}>
                <option selected="selected" value="7">外链</option>
                <option value="10">特训班预告页</option>
            <{/if}>
            <{if $positionType eq 21 && $data['relevanceType'] eq 10}>
                <option value="7">外链</option>
                <option selected="selected" value="10">特训班预告页</option>
            <{/if}>
            <{if $positionType eq 19}>
                <option selected="selected" value="9">系列课介绍页</option>
            <{/if}>
        </select>
        </div>
    </div>

    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">ID/链接：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text valid" name="adURL" value="<{$data['relevanceId']}>" id="adURL" placeholder="请输入跳转类型的ID（如跳转类型为链接，请输入链接地址）">
            <br>
            <small></small>
        </div>
    </div>
    <{/if}>

    <{if $positionType eq 13}>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">价格：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <p>原价：<span id="original_price"></span></p>
                <p>优惠价：<span id="concessional_rate"></span></p>
                <br>
                <small></small>
            </div>
        </div>
    <{/if}>



    <{if $positionType eq 19 && $data['remark'] eq 1}>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">推荐到栏目：</label>
            <div class="formControls col-xs-8 col-sm-9">
            <select name="remark" id="remark" class="form-control form-select" >
                <option value="0">请选择</option>
                <option selected="selected" value="1">精品</option>
                <option value="2">基础</option>
                <option value="3">高级</option>
            </select>
            </div>
        </div>
    <{/if}>

    <{if $positionType eq 19 && $data['remark'] eq 2}>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">推荐到栏目：</label>
            <div class="formControls col-xs-8 col-sm-9">
            <select name="remark" id="remark" class="form-control form-select" >
                <option value="0">请选择</option>
                <option value="1">精品</option>
                <option selected="selected" value="2">基础</option>
                <option value="3">高级</option>
            </select>
            </div>
        </div>
    <{/if}>

    <{if $positionType eq 19 && $data['remark'] eq 3}>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">推荐到栏目：</label>
            <div class="formControls col-xs-8 col-sm-9">
            <select name="remark" id="remark" class="form-control form-select" >
                <option value="0">请选择</option>
                <option value="1">精品</option>
                <option value="2">基础</option>
                <option selected="selected" value="3">高级</option>
            </select>
            </div>
        </div>
    <{/if}>

    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">图片（图片不能大于1024KB）：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <span class="btn-upload form-group">
            <input class="input-text upload-url" type="text" name="uploadfile" id="uploadfile" readonly  datatype="*" nullmsg="请添加附件！" style="width:200px">
            <a href="javascript:void();" class="btn btn-primary upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>
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

    <input type="hidden" class="input-text valid" placeholder="" name="baseFile" value="<{$data['adFile']}>" id="baseFile">

    <div class="formControls col-xs-8 col-sm-9">
        <input type="hidden" class="input-text" value="<{$data['adId']}>" id="id" name="id">
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
    <div class="row cl">
        <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
            <input class="btn btn-primary" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
        </div>
    </div>
    
</form>

<script>
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


    //isDisplayPrice == 13时显示原价 优惠价
    var isDisplayPrice = '<{$positionType}>';
    if(isDisplayPrice == 13){
        //改变原价、优惠价
        $('#adURL').on('change', function(){
            $.ajax({
                type:"GET",
                url:'/WebInstitutesRecommend/queryPrice?id='+document.getElementById("adURL").value,
                async: false,
                beforeSend:function(){
                    //jz = layer.load(0, {shade: false}); //0代表加载的风格，支持0-2
                },
                error: function(request) {
                    layer.close(jz);
                    layer.msg("网络错误!", "", "error");
                },
                success: function(data) {
                    $("#original_price").html(data.original_price); 
                    $("#concessional_rate").html(data.concessional_rate); 
                }
            });      
        });
        changePrice();
    }

    function changePrice(){
        $.ajax({
            type:"GET",
            url:'/WebInstitutesRecommend/queryPrice?id='+"<{$data['relevanceId']}>",
            async: false,
            beforeSend:function(){
            },
            error: function(request) {
                layer.close(jz);
                layer.msg("网络错误!", "", "error");
            },
            success: function(data) {
                $("#original_price").html(data.original_price); 
                $("#concessional_rate").html(data.concessional_rate); 
            }
        });  
    }

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