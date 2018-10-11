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
    <input type="text" class="input-text" placeholder="课程名称" id="search-class-name" name="className"/>
    <input type="text" class="input-text" placeholder="作者" id="search-user-name" name="user-name"/>
    <select title="课程类型" name="" id="search-type" class="form-control form-select">
        <{option data="$searchTypeArr" notHeader="true"}>
    </select>
    <select title="类型" name="" id="search-level" class="form-control form-select">
        <{option data="$searchLevelArr" notHeader="true"}>
    </select>
    
    <input type="submit" value="搜索" class="btn btn-success radius" onclick="adminTableRefresh()" />
</div>

<script>
	window['adminTableConfig'] = {
        onLoadSuccess: function (){

         	// 操作上的深度阅读按钮
            $('.action-select-choice-course').click(function (){
                var e = $(this)
                var courseId = e.data('id');

				if(confirm('确认推荐ID为' + courseId + '的记录到每日精选？')){
					var localSuccess = function(e){
						if(e.code == 200){
							layer.msg(e.data);
							setTimeout("layer_close();", 1000);
	                        window.parent.adminTableRefresh();
						}else{
							layer.msg(e.msg);
						}
						
                    };
                
	                var option = {
	                		url: "<{:url('addIndexRecommendForChoiceCourse')}>",
	                		success: localSuccess
		                };
	                requestAjax({
	                	courseId: courseId,
	                	indexRecommendId: <{$indexRecommendId}>
	                }, option);
				}
                
            });

        }
    };

	window['adminTableQueryParams'] = function (){
        return {
        	userName: $('#search-user-name').val(),
        	className: $('#search-class-name').val(),
            type: $('#search-type').val(),
            level: $('#search-level').val(),
            indexRecommendId: <{$indexRecommendId}>,
            courseId: <{$courseId}>,
            tabName1: "<{$Think.get.tabName1??''}>",
            tabName2: "<{$Think.get.tabName2??''}>"
        };
    };
</script>