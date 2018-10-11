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
    
    <input type="text" class="input-text" placeholder="用户名" id="search-username" name="username"/>
    
    <{date_range title=""}>
    
    <select title="结果" name="" id="search-status" class="form-control form-select">
        <{option data="$searchStatus" notHeader="true"}>
    </select>
    
    <input type="submit" value="搜索" class="btn btn-success radius" onclick="adminTableRefresh()" />
    
</div>



<script>

    window['adminTableQueryParams'] = function (){
        return {
            username: $('#search-username').val(),
            dateMin: $('#search-dateMin').val(),
            dateMax: $('#search-dateMax').val(),
            status: $('#search-status').val(),
            tabName1: "<{$Think.get.tabName1??''}>",
            tabName2: "<{$Think.get.tabName2??''}>"
        };
    };
    
</script>


