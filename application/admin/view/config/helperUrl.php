<{include file="include/nav"}>



<div>
    <form action="#" class="form form-horizontal" method="post" id="form">
    
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>链接：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<{$helperUrl}>" placeholder="" id="url" name="url">
            </div>
        </div>
    
    
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
            </div>
        </div>
    </form>
</div>


<script>
    
    var form = $('#form');
    form.validate({
        rules:{
            url:{
                required: true,
                url: true
            }
        },
        onkeyup:false, // 在 keyup 时验证
        focusCleanup:true, // 如果是 true 那么当未通过验证的元素获得焦点时，移除错误提示。避免和 focusInvalid 一起用。
        submitHandler:function (form, event){
            event.preventDefault();
            
            requestAjax($(form));
            requestAjax({}, {
                url: "<{$addMenuUrl}>"
            }, true)
        }
    });
    
</script>


