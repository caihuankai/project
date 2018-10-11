<style>
    th[data-field="remark"]{
        width: 20%;
    }
</style>


<div class="hide-ele" id="confirm-button-html">
    <textarea class="textarea" id="confirm-button-html-remark"></textarea>
</div>

<script>
    window['adminTableConfig'] = {
        'onLoadSuccessAfterFuncName': 'confirmButton',
        'confirmButton': function (){
            var config = this;

            $('.<{$tableChangeTinyint}>').click(function (){
                var e = this,
                    id = $(this).data('id');
                layer.open({
                    title: '添加备注',
                    type: 1,
                    area:['500px', '200px'],
                    content: $('#confirm-button-html'),
                    btn: ['保存'],
                    yes: function(index, layero){
                        
                        requestAjax({
                            id: id,
                            remark: $('#confirm-button-html-remark').val()
                        }, {
                            url: '<{:url("saveRemark")}>'
                        });



                        config.onChangeStatusClickFunc.apply(e, []);
                        
                        //do something
                        layer.close(index); //如果设定了yes回调，需进行手工关闭
                    }
                });
            });
        }
    }
</script>


