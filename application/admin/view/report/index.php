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
    <button class="btn btn-primary" id="table-button-ignore"> 忽略 </button>
</div>




<div id="table-search-html">
    <input type="text" class="input-text" placeholder="举报人" id="search-informer-name" name="informer-name"/>
    
    <{date_range title=""}>

    <select title="状态" name="" id="search-status" class="form-control form-select">
        <{option data="$statusHtml" notHeader="true"}>
    </select>
    
    <input type="submit" value="搜索" class="btn btn-success radius" onclick="adminTableRefresh()" />
</div>


<script>

    window['adminTableConfig'] = {
        onLoadSuccess: function (){
            
            // 忽略
            $('.action-status-ignore').click(function (){
                changeIgnoreStatus($(this).data('id'));
            });
            
        }
    };
    window['adminTableQueryParams'] = function (){
        return {
            informerName: $('#search-informer-name').val(),
            dateMin: $('#search-dateMin').val(),
            dateMax: $('#search-dateMax').val(),
            status: $('#search-status').val(),
            tabName1: "<{$Think.get.tabName1??''}>",
            tabName2: "<{$Think.get.tabName2??''}>"
        };
    };

    $(function () {
        // 多个忽略
        $('#table-button-ignore').click(function (){
            var ids = [];
            adminTableGetSelections(function (data){
                ids.push(data.ID);
            });

            changeIgnoreStatus(ids);
        });

    });

    function changeIgnoreStatus(ids){
        requestAjax({
            ids: ids
        }, {
            url: "<{:url('changeIgnoreStatus')}>",
            localSuccess: function (){
                adminTableRefresh()
            }
        });
    }



</script>
