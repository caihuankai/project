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
<{eq name="type" value="0"}>
	<input type="text" class="input-text" placeholder="请输入系列课名称" id="search-series-course-name" name="series-course-name"/>
	<input type="text" class="input-text" placeholder="请输入子课程名称" id="search-course-name" name="course-name"/>
<{else/}>
	<input type="text" class="input-text" placeholder="请输入课程名称" id="search-course-name" name="course-name"/>
<{/eq}>
<select title="状态" name="" id="search-status" class="form-control form-select">
    <{option data="$searchStatusArr" notHeader="true"}>
</select>
<{date_range title="听课"}>
<input type="submit" value="搜索" class="btn btn-success radius submit_query"/>
</div>


<script>
window['adminTableConfig'] = {
	onLoadSuccess: function (){
		
		// 写回访
		$('.action-log').click(function (){
			var e = $(this);
			
			layer_show('写回访', '<{:url("createReturnVisitLog")}>' + '?userId=' + e.data('userId') + '&type=' + e.data('type') + '&courseId=' + e.data('courseId'), 780, 350);
		});
			
		//发送消息
		$('.action-send-message').click(function (){
			var e = $(this);
			
			layer_show('发送消息', '<{:url("sendMessage")}>' + '?userId=' + e.data('userId'), 780, 350);
		});

		// 预设回访
		$('.action-set-visit_schedule').click(function (){
			var e = $(this);
			
			layer_show('预设回访', '<{:url("setVisitSchedule")}>' + '?userId=' + e.data('userId') + '&courseId=' + e.data('courseId') + '&type=' + e.data('type'), 500, 300);
		});

		//取消预设
		$('.action-del-visit_schedule').click(function (){
			var e = $(this);
			requestAjax({
				userId: e.data('userId'),
				courseId: e.data('courseId'),
				type: e.data('type')
            }, {
            	url: "<{:url('delVisitSchedule')}>",
                success: function(e){
                     if (e.code == 200) {
                    	 layer.msg(e.data);
                    	 setTimeout(function(){
                          	adminTableRefresh();
 	                     }, 1000);
                     }else {
                         layer.msg(e.msg);
                     }
                }
            });
		});
					
	}
};
window['adminTableQueryParams'] = function (){
	return {
		seriesCourseName: $('#search-series-course-name').val(),
		courseName: $('#search-course-name').val(),
		status: $('#search-status').val(),
		dateMin: $('#search-dateMin').val(),
		dateMax: $('#search-dateMax').val(),
		tabName1: "<{$Think.get.tabName1??''}>",
		tabName2: "<{$Think.get.tabName2??''}>"
	};
};

$(document).on('click', ".submit_query", function(){
	var status = $('#search-status').val();
	var dateMin = $('#search-dateMin').val();
	var dateMax = $('#search-dateMax').val();
	if(status == 0 && (dateMin != '' || dateMax != '')){
		layer.msg('选择状态为未听课时，不能同时选择听课时间范围');
        return;
	}
	adminTableRefresh();
});



</script>