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
    <input type="text" class="input-text" placeholder="作者" id="search-user-name" name="user-name"/>
    <input type="text" class="input-text" placeholder="标题" id="search-title" name="title"/>
    <select title="栏目" name="" id="search-column" class="form-control form-select">
        <{option data="$searchColumnArr" notHeader="true"}>
    </select>
    <{date_range title="发布"}>
    <select title="类型" name="" id="search-level" class="form-control form-select">
        <{option data="$searchLevelArr" notHeader="true"}>
    </select>
    
    <input type="submit" value="搜索" class="btn btn-success radius" onclick="adminTableRefresh()" />
</div>

<script>
	window['adminTableConfig'] = {
        onLoadSuccess: function (){

         	// 操作上的深度阅读按钮
            $('.action-select-choice-viewpoint').click(function (){
                var e = $(this)
                var viewpointId = e.data('id');

				if(confirm('确认推荐ID为' + viewpointId + '的记录到每日精选？')){
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
	                		url: "<{:url('addIndexRecommendForChoiceViewpoint')}>",
	                		success: localSuccess
		                };
	                requestAjax({
	                	viewpointId: viewpointId,
	                	indexRecommendId: <{$indexRecommendId}>
	                }, option);
				}
                
            });

        }
    };

	window['adminTableQueryParams'] = function (){
        return {
        	userName: $('#search-user-name').val(),
        	title: $('#search-title').val(),
        	column: $('#search-column').val(),
            dateMin: $('#search-dateMin').val(),
            dateMax: $('#search-dateMax').val(),
            level: $('#search-level').val(),
            indexRecommendId: <{$indexRecommendId}>,
            viewpointId: <{$viewpointId}>,
            tabName1: "<{$Think.get.tabName1??''}>",
            tabName2: "<{$Think.get.tabName2??''}>"
        };
    };
</script>