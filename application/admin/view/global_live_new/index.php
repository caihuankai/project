<style>
    .btn{
        margin: 0 10px;
    }
    .input-text{
        width: 200px;
    }
    .form-select{
        width: 250px;display: inline-block;height: 31px;line-height: 30px;font-size: 13px;padding: 0px 7px 3px 7px;
    }
</style>

<div id="table-button-html" class="hide">
    <button class="btn btn-primary" id="table-button-dis"> 禁用 </button>
    <button class="btn btn-primary" id="table-button-open"> 启用 </button>
</div>




<script>
    
    
    function loadClick(){
        $('.recommend-html').click(function () {
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
        
        
        // 操作上的状态按钮
        $('.open-status').click(function (){
            var e = $(this);
            console.log(e.data('ids'));
            try{
                changeStatus([e.data('ids')]);
            }catch (e){}
        });
    }
    

    var actionStatusHtml = <{$statusHtml|json_encode}>;
    var statusMap = {1: 2, 2: 1};
    window['adminTableConfig'] = {
        onLoadSuccess: loadClick,
        onToggle: loadClick
    };
    window['adminTableQueryParams'] = function (){
        return {
            username: $('#search-username').val(),
            dateMin: $('#search-dateMin').val(),
            dateMax: $('#search-dateMax').val(),
            openStatus: $('#search-live-open-status').val(),
            tabName1: "<{$Think.get.tabName1??''}>",
            tabName2: "<{$Think.get.tabName2??''}>"
        };
    };

    $(function () {
        
        // 禁用和启用按钮
        $('#table-button-dis, #table-button-open').click(function () {
            var status = $(this).is('#table-button-open') ? 1 : 2,
                ids = [];

            adminTableGetSelections(function (data){
                ids.push(data['id']);
            });

            if (ids.length > 0) {
                changeStatus(ids, status);
            }
        });

    });

    function changeStatus(ids, statusEle){
        var table = $('#userListTable');

        $.map(ids, function (val, key){
            var data = table.bootstrapTable('getRowByUniqueId', val),
                status = statusEle == null ? (statusEle = statusMap[data['status']]) : statusEle,
                tempEle = $('<div>'+data['action']+'</div>');

            tempEle.children('.open-status').html(actionStatusHtml[status]);
            data['action'] = tempEle.html();
            data['status'] = status;
            console.log(statusEle);
            table.bootstrapTable('updateRow', {
                index: data['num'],
                data:data
            });
        });

        loadClick();
        
        requestAjax({
            ids: ids,
            status: statusEle
        }, {
            url: "<{:url('changeStatus')}>",
            localSuccess: function (){
                adminTableRefresh();
            }
        })
    }

</script>
