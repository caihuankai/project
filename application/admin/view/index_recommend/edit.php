<style>
    .row{
        margin: 8px 0;
        padding: 0;
    }
</style>



<{$formHtml}>


<script>

    $('form').validate({
        rules:{
            "form-children-name":{
                required:true,
                maxlength: 200
            },
            "form-children-link": {
                required:true,
                url: true
            }
        },
        onkeyup:false, // 在 keyup 时验证
        focusCleanup:true, // 如果是 true 那么当未通过验证的元素获得焦点时，移除错误提示。避免和 focusInvalid 一起用。
        submitHandler:function (form, event){
            event.preventDefault();
            
            var img = $('#form-children-pic-img'),
                imgSrc = img.attr('src');
            
            if (img.length && !imgSrc){
                layer.msg('图片没有上传');
                return;
            }

            requestAjax({
                type: $('#form-children-type').val(),
                typeId: $('#form-children-type-id').val(),
                typeInc: $('#form-children-inc').val(),
                id: $('#form-children-id').val(),
                name: $('#form-children-name').val(),
                theme: $('#form-children-theme').val(),
                link: $('#form-children-link').val(),
                pic: imgSrc,
                sort: $('#form-children-sort').val(),
                status: $('input[name="form-children-radio-status[]"]:checked').val()
            }, {
                localSuccess: function(data){
                    setTimeout("layer_close();", 100);
                    window.parent.adminTableRefresh && window.parent.adminTableRefresh();
                }
            });
        },
        errorPlacement: function (error,element) {
            layer.msg(error.html());
        }
    });

</script>



