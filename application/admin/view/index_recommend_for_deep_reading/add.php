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

<script>
	window['adminTableConfig'] = {
        onLoadSuccess: function (){

         	// 操作上的深度阅读按钮
            $('.action-select-deep-reading').click(function (){
                var e = $(this)
                var viewpointId = e.data('id');

				if(confirm('确认推荐ID为' + viewpointId + '的记录到深度阅读？')){
					var localSuccess = function(e){
						if(e.code == 200){
							layer.msg(e.data);
						}else{
							layer.msg(e.msg);
						}
						
                    };
                
	                var option = {
	                		url: "<{:url('addIndexRecommendForDeepReading')}>",
	                		success: localSuccess
		                };
	                requestAjax({
	                	viewpointId: viewpointId,
	                }, option);
				}
                
            });

        }
    };
</script>