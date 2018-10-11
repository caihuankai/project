

<script>
    
    function loadClick(){
        $('.action-edit').click(function (){
            layer_show('编辑', "<{:url('edit')}>" + '/type/<{$getType}>/id/' + $(this).data('id') + '/theme/' + $(this).data('theme'), 720, 600)
        });
        

        $('.edit-inc, .edit-sort').change(function (){ // 修改百分比和排序
            var e = $(this);

            changeField(e.data('id'), e.val(), e.data('field'))
        });
        
        
        $('.action-del').click(function (){
            var e = $(this);
            
            del([e.data('ids')]);
        });
    }


    window['adminTableConfig'] = {
        onLoadSuccess: loadClick,
        onToggle: loadClick
    };
    
    
    
    $(function () {
        $('#admin-table-toolbar-del').click(function (){ // 移除
            var ids = [];

            adminTableGetSelections(function (data){
                ids.push(data['id']);
            });

            del(ids);
        });
        
        
        $('#admin-table-toolbar-add').click(function (){
            var url = "<{$addButtonUrl}>";
            url && layer_show('新增', url, 'max')
        });
    });
    
    
    function del(ids){
        if (ids.length < 1){
            return;
        }
        
        layer.confirm('确定删除吗？', function (){
            
            requestAjax({
                ids: ids
            }, {
                url: "<{:url('IndexRecommend/del')}>",
                localSuccess: function (){
                    adminTableRefresh();
                }
            });
        });
    }
    
    
    function changeField(id, value, field){
        
        requestAjax({
            id: id,
            field: field,
            value: value
        }, {
            url: "<{:url('IndexRecommend/changeField')}>"
        });
        
    }
    
</script>
