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





<div id="table-search-html">
    <input type="text" class="input-text" placeholder="被邀请人" id="search-name" name="search-name"/>
    
    <input type="text" onfocus="WdatePicker({maxDate:'#F{$dp.$D(\'dateMax\')||\'%y-%M-%d\'}'})" id="dateMin" placeholder="开始时间"
           class="input-text Wdate" style="width:120px;">-
    <input type="text" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'dateMin\')}'})" id="dateMax" placeholder="结束时间"
           class="input-text Wdate" style="width:120px;">

    
    <input type="submit" value="搜索" class="btn btn-success radius" onclick="adminTableRefresh()" />
</div>


<script>
    
    
    
    window['adminTableQueryParams'] = function (){
        return {
            username: $('#search-name').val(),
            name: $('#search-name').val(),
            dateMin: $('#search-dateMin').val(),
            dateMax: $('#search-dateMax').val(),
            cate: $('#search-live-cate').val(),
            tabName1: "<{$Think.get.tabName1??''}>",
            tabName2: "<{$Think.get.tabName2??''}>"
        };
    };


    function changeStatus(ids, statusEle){
        var table = $('#userListTable');

        $.map(ids, function (val, key){
            var data = table.bootstrapTable('getRowByUniqueId', val),
                status = statusEle == null ? (statusEle = statusMap[data['status']]) : statusEle,
                tempEle = $('<div>'+data['action']+'</div>');

            tempEle.children('.open-status').html(actionStatusHtml[status]);
            data['action'] = tempEle.html();
            data['status'] = status;

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
            url: "<{:url('changeStatus')}>"
        })
    }

</script>
