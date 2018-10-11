<style>
    .row{
        margin: 0;
    }
</style>


<form action="#" id="cate-form" method="post" class="form form-horizontal">
    <input type="hidden" name="id" id="cate-id" value="<{$Think.get.id??'0'}>" />
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">类别：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <{$firstCate}>
        </div>
    </div>
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">标签名称：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" title="标签名称" name="cate-name" id="cate-name" value="" autocomplete="Off" size=48/>
        </div>
    </div>

    <div class="row cl">
        <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
            <input class="btn btn-primary radius" type="submit" value="提交">
        </div>
    </div>
    
</form>

<script>
    
    $(function () {
        $('#cate-form').validate({
            rules:{
                'cate-name':{
                    required:true
                }
            },
            messages:{
                'cate-name': '类别名称不能为空'
            },
            onkeyup:false, // 在 keyup 时验证
            submitHandler:function (form,event){
                event.preventDefault();

                requestAjax({
                    id: $('#cate-id').val(),
                    secondCateName: $('#cate-name').val() || '',
                }, {
                    success: function(data){
                        jsonData = getJsonData(data);
                        if (jsonData) {
                            layer.msg('提交成功');

                            if (window.parent != window && window.parent.hasOwnProperty('adminTableRefresh')){ // 刷新表格
                                window.parent.adminTableRefresh();
                            }

                            layer_close();
                        }else if(data.msg){
                            layer.msg(data.msg);
                        }
                    }
                });
            }
        });
        
    });
    
</script>