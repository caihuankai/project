<style>
    .admin-table-search-input-text{
        width : 200px;
    }
    .admin-table-search-ele{
        margin-right: 1%;
    }
    .admin-table-search-input-select{
        width: 250px;display: inline-block;height: 31px;line-height: 30px;font-size: 13px;padding: 0px 7px 3px 7px;
    }
</style>

<{include file="include/nav"}>

<{include file="include/tableList"}>


<script>window['adminTableColumns'] = JSON.parse('<{$tableHeader|json_encode}>')</script>


<script>
    $(function (){
        // window['adminTableQueryParams']为函数

        (function () {
            if (!window['adminTableQueryParams'] && '<{$adminTableQueryParams?1:""}>') { // 使用php设置值
                window['adminTableQueryParams'] = function (){
                    return <?php if (isset($adminTableQueryParams)) echo \helper\Html::createElement()->jsObject((array)$adminTableQueryParams)?>;
                }
            }
        })();
        
        window['adminTableData'] = adminTable(window['adminTableColumns'], window['adminTableConfig'], window['adminTableQueryParams'])
    });
</script>




<{$tableOtherHtml}>
