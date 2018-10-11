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
    th[data-field=returnVisitLog]{
    	width: 500px;
    }
</style>

<div id="table-search-html">
    <input type="text" class="input-text" placeholder="昵称" id="search-user-name" name="user-name"/>
    <input type="text" class="input-text" placeholder="手机" id="search-tel" name="tel"/>
    <{date_range title="预设回访"}>
    <select title="回访状态" name="" id="search-status" class="form-control form-select">
        <{option data="$searchStatusArr" notHeader="true"}>
    </select>
    <input type="submit" value="搜索" class="btn btn-success radius" onclick="adminTableRefresh()" />
</div>


<script>
	window['adminTableConfig'] = {
        onLoadSuccess: function (){

         	// 写回访
            $('.action-log').click(function (){
                var e = $(this);

                layer_show('写回访', '<{:url("createReturnVisitLog")}>' + '?userId=' + e.data('userId') + '&type=' + e.data('type') + '&courseId=' + e.data('courseId') + '&isSchedule=1', 780, 350);
            });

         	// 查看日志
            $('.action-query-log').click(function (){
                var e = $(this);
				
                layer_show('查看日志', '<{:url("queryReturnVisitLog")}>' + '?userId=' + e.data('userId') + '&type=' + e.data('type'), 1000, 600);
            });

            //发送消息
            $('.action-send-message').click(function (){
                var e = $(this);

                layer_show('发送消息', '<{:url("sendMessage")}>' + '?userId=' + e.data('userId'), 780, 350);
            });

        }
    };
    window['adminTableQueryParams'] = function (){
        return {
        	userName: $('#search-user-name').val(),
        	tel: $('#search-tel').val(),
            dateMin: $('#search-dateMin').val(),
            dateMax: $('#search-dateMax').val(),
            status: $('#search-status').val(),
            tabName1: "<{$Think.get.tabName1??''}>",
            tabName2: "<{$Think.get.tabName2??''}>"
        };
    };



</script>