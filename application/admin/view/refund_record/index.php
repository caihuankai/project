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
	<button class="btn btn-primary" id="table-button-export"> 导出 </button>
</div>

<div id="table-search-html">
    <select title="课程类型" name="courseType" id="search-courseType" class="form-control form-select">
        <{option data="$searchCourseTypeArr" notHeader="true"}>
    </select>
    <input type="text" class="input-text" placeholder="用户昵称" id="search-userName" name="userName"/>
    <input type="text" class="input-text" placeholder="用户ID" id="search-userID" name="userID"/>
    <input type="text" class="input-text" placeholder="课程名称" id="search-courseName" name="courseName"/>
    <{date_range title="退款"}>
    <input type="submit" value="搜索" class="btn btn-success radius" onclick="adminTableRefresh()" />
</div>


<script>
	
    window['adminTableConfig'] = {
        onLoadSuccess: function (){
         	// 操作上的编辑按钮
            $('.action-remark').click(function (){
                var e = $(this);

                layer_show('备注', '<{:url("editRemark")}>' + '?id=' + e.data('id'), 780, 350);
            });

        }
    };
    window['adminTableQueryParams'] = function (){
        return {
        	courseType: $('#search-courseType').val(),
        	userName: $('#search-userName').val(),
        	userID: $('#search-userID').val(),
        	courseName: $('#search-courseName').val(),
            dateMin: $('#search-dateMin').val(),
            dateMax: $('#search-dateMax').val(),
            tabName1: "<{$Think.get.tabName1??''}>",
            tabName2: "<{$Think.get.tabName2??''}>"
        };
    };

    $(function () {
        $('#table-button-export').click(function (){
            var e = $(this);
            var courseType = $('#search-courseType').val();
        	var userName = $('#search-userName').val();
        	var userID = $('#search-userID').val();
        	var courseName = $('#search-courseName').val();
            var dateMin = $('#search-dateMin').val();
            var dateMax = $('#search-dateMax').val();
            var url = '/RefundRecord/exportExcel?courseType='+courseType+'&userName='+userName+'&userID='+userID+'&courseName='+courseName+'&dateMin='+dateMin+'&dateMax='+dateMax;
            layer.confirm('导出表格到本地',function(index){
                window.open(url);  
                layer.close(index);
            });
        });
        
    });

</script>
