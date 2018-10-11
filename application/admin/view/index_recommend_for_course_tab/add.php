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
    <input type="text" class="input-text" placeholder="标题" id="search-class-name" name="className"/>
    <input type="submit" value="搜索" class="btn btn-success radius" onclick="adminTableRefresh()" />
</div>

<script>
	window['adminTableConfig'] = {
        onLoadSuccess: function (){

         	// 操作上的选择按钮
            $('.action-select-recommend').click(function (){
                var e = $(this)
                var selectId = e.data('id');

				if(confirm('确认新增ID为' + selectId + '的记录到推荐页？')){
					var localSuccess = function(e){
						if(e.code == 200){
							layer.msg(e.data);
						}else{
							layer.msg(e.msg);
						}
						
                    };
                
	                var option = {
	                		url: "<{:url('addIndexRecommend')}>/type/<{$type}>",
	                		success: localSuccess
		                };
	                requestAjax({
	                	selectId: selectId,
	                }, option);
				}
                
            });

        }
    };

	window['adminTableQueryParams'] = function (){
        return {
        	className: $('#search-class-name').val(),
        };
    };
</script>