<style>
    .btn{
        margin: 0 10px;
    }
    .input-text{
        width: 200px;
    }
</style>

<!--<div id="table-button-html" class="hide">-->
<!--    <button class="btn btn-primary" id="table-button-dis"> 禁用 </button>-->
<!--    <button class="btn btn-primary" id="table-button-open"> 启用 </button>-->
<!--</div>-->







<script>
    
    var actionStatusHtml = <{$freezeHtml|json_encode}>,
        statusMap = [1, 0];
    
    function loadClick(){
        $('.recommend-user-flow').click(function (){
            var e = $(this),
                disabledListStr = '',
                id = e.data('id'),
                disabledList = e.data('disabled-list');

            for (var i in disabledList){
                if (disabledList.hasOwnProperty(i)){
                    disabledListStr += '&disabledList[]=' + disabledList[i];
                }
            }
            
            layer_show('推荐', '<{:url("Course/recommend")}>' + '?id=' + id + '&idType=' + e.data('id-type') + disabledListStr, 500, 350)
        });
        
        
        $('.changeFreeze').click(function (){
            var e = $(this);

            changeFreeze([e.data('ids')]);
        });
    }
    
    window['adminTableConfig'] = {
        onLoadSuccess: loadClick,
        onToggle: loadClick
    };

    function _edit(id,sort) {
        layer.prompt({
            formType: 3,
            value: sort,
            title: '设置讲师排序',
            //area: ['800px', '350px'] //自定义文本域宽高
        }, function(value, index, elem){
            if (isNaN(value)){
                layer.alert('排序仅支持输入数字！(数值越大越靠前)'); //得到value
                layer.close(index);
            }else{
                layer.close(index);
                $.ajax({
                    type: 'POST',
                    url: '<{:url("LecturerList/edit")}>',
                    data:{
                        id:id,
                        sort:parseInt(value),
                    },// 参数
                    async: false,
                    dataType: 'json',
                    success: function(data){
                        if (data.data.code == 200){
                            setTimeout(window.location.reload(),1500);
                        }else {
                            layer.msg(data.msg,{icon:1,time:1000});
                        }
                    },
                    error:function(data) {
                        console.log(data.data.msg);
                        setTimeout(window.location.reload(),1500);
                    },
                });
            }
        });
    }

    
    $(function () {
        $('#table-button-dis, #table-button-open').click(function () {
            var status = $(this).is('#table-button-open') ? 0 : 1,
                ids = [];

            adminTableGetSelections(function (data){
                ids.push(data['id']);
            });

            ids.length > 0 && changeFreeze(ids, status);
        });

    });

    function changeFreeze(ids, statusEle){
        var table = $('#userListTable');

        $.map(ids, function (val, key){
            var data = table.bootstrapTable('getRowByUniqueId', val),
                status = statusEle == null ? (statusEle = statusMap[data['freeze']]) : statusEle,
                tempEle = $('<div>'+data['action']+'</div>');

            tempEle.children('.changeFreeze').html(actionStatusHtml[status]);
            data['action'] = tempEle.html();
            data['freeze'] = status;

            table.bootstrapTable('updateRow', {
                index: data['num'],
                data:data
            });
        });

        
        
        requestAjax({
            ids: ids,
            status: statusEle
        }, {
            url: "<{:url('changeFreeze')}>",
            localSuccess: function (){
                adminTableRefresh();
            }
        });


    }
    
</script>
