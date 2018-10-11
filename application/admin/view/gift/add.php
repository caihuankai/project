<style>
    div.upload_div{width:60px;height:34px;border: 1px solid #ccc;color: #999; text-align: center;font-weight: bold;font-size: 30px;line-height: 34px;}
    div.upload_img{width:100px;height:60px;border: 1px solid #ccc;padding: 2px;overflow: hidden}
    div.upload_img img{max-width:960px;max-height:56px;display:block;margin: 0 auto;text-align: center;}
</style>    
<?php
    function getArrVal($arr, $key, $default='') {
            if (!is_array($arr) && !is_object($arr)) {
                    return $default;
            }
            if (isset($arr[$key])) {
                    return $arr[$key];
            }
            return $default;
    }
?>


<article class="page-container">
    <form class="form form-horizontal" id="form-category-add">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>礼物名称</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<{:getArrVal($gift_data, 'name', '')}>" placeholder="" name="name">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>所需礼点：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<{:getArrVal($gift_data, 'money', '')}>" placeholder="0.00" name="money">
                <span class="tips" style="color:green;">（精确到小数点后两位）</span>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>所属位置</label>
            <div class="formControls col-xs-8 col-sm-9">
                <span class="select-box">
                    <select class="select" name="position" size="1">
                        <{foreach name="gift_position" item="vo"}>
                            <{if condition='getArrVal($gift_data, "position") eq $key'}>    
                                <option value="<{$key}>" class="c_option_1" selected="selected"><{$vo}></option>
                            <{else /}>
                                <option value="<{$key}>" class="c_option_1"><{$vo}></option>
                            <{/if}>  
                        <{/foreach}>
                </select>
                </span>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>类型</label>
            <div class="formControls col-xs-8 col-sm-9">
                <span class="select-box">
                    <select class="select" name="type" size="1">
                        <{foreach name="gift_type" item="vo"}>
                            <{if condition='getArrVal($gift_data, "type") eq $key'}>    
                                <option value="<{$key}>" class="c_option_1" selected="selected"><{$vo}></option>
                            <{else /}>
                                <option value="<{$key}>" class="c_option_1"><{$vo}></option>
                            <{/if}> 
                        <{/foreach}>
                </select>
                </span>
            </div>
        </div>
     
		<div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>排序：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<{:getArrVal($gift_data, 'sort', '')}>" placeholder="排序" name="sort">
                <span class="tips" style="color:green;">（数值越小，越靠前）</span>
            </div>
        </div>
		
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>logo：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <div class="upload_div">+</div>
                <div class="upload_img  hidden"><img src="http://n.sinaimg.cn/news/20170524/dMt5-fyfkzht0345308.jpg"/></div>
                <input style="display:none;" type="file" class="input-text" name="" id="gift_img" />
                <input type="hidden" value="" name="img" id="logo"/>
            </div>
        </div>
        
        
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>状态：</label>
            <div class="formControls col-xs-8 col-sm-9">
                    <div class="radio-box">
                            <input name="status" id="adStatus-1" type="radio" <{if condition='getArrVal($gift_data, "status", 1) eq 1'}> checked="checked" <{/if}>  value="1" >
                            <label for="adStatus-1" >上架</label>
                    </div>
                    <div class="radio-box">
                            <input type="radio" id="adStatus-2"  name="status" <{if condition='getArrVal($gift_data, "status", 1) neq 1'}> checked="checked" <{/if}> value="2">
                            <label for="adStatus-2">下架</label>
                    </div>
            </div>
        </div>
        
        <input type="hidden" value="<{:getArrVal($gift_data, 'id', 0)}>" name="gift_id" />
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
            </div>
        </div>
    </form>
</article>

<script type="text/javascript">
    $(function(){
        //logo默认
        
        var log_data_src = "<{:getArrVal($gift_data, 'img')}>";
        
        if (log_data_src) {
            $('.upload_div').addClass('hidden');
            $('input[name="img"]').val(log_data_src);
            $('.upload_img').removeClass('hidden').find('img').attr('src', log_data_src);
        }
        //logo默认结束
        
         $('.upload_div,.upload_img').on('click', function(){
            $('#gift_img').trigger('click');
        });
    
        $('#gift_img').on('change', function(){
            if (typeof this.files[0] == undefined) {
                console.log('file undefined');
                return null;
            }
            console.log(this.files[0]);
            var formData = new FormData();
            formData.append("img",$("#gift_img")[0].files[0]);
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
                       //alert(returndata.key);
                       $('.upload_div').addClass('hidden');
                        $('input[name="img"]').val(returndata.key);
                        return $('.upload_img').removeClass('hidden').find('img').attr('src', returndata.key);
                    }  else {
                        return layer.msg(returndata.msg);
                    }
                 },  
                 error: function (errdata) {  
                     layer.msg(errdata);
                 }  
            });  
            
        });
        
        
        
        
        
        
        $("#form-category-add").on('submit',function(){
            $(this).find('[type="submit"]').attr('disabled');
            var data = $(this).serializeArray();
            $.ajax({
                url:"./add",
                data:data,
                type:"post",
                success:function(_data){
                    if (_data.status == 1) {
                        layer.msg('成功', "", "success");
                    } else {
                        layer.msg("更新失败联系管理员", "", "error");
                    }
                    
                    setTimeout(function(){
                                var index = parent.layer.getFrameIndex(window.name);
                        parent.$table.bootstrapTable('refresh');
                        parent.layer.close(index);
                    },500);
                },
                error:function(err) {
                    layer.msg("网络错误!", "", "error");
                },
                dataType:"json"
            });
            return false;
        });
    });
</script>

