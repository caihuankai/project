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
	<button class="btn btn-primary" id="table-button-add"> 新增 </button>
    <button class="btn btn-primary" id="table-button-del"> 删除 </button>
</div>

<div id="table-search-html">
    <input type="text" class="input-text" placeholder="作者" id="search-user-name" name="user-name"/>
    <input type="text" class="input-text" placeholder="主题名称" id="search-title" name="title"/>
    <{date_range title="发布"}>
    <input type="submit" value="搜索" class="btn btn-success radius" onclick="adminTableRefresh()" />
</div>

<script>

    window['adminTableConfig'] = {
        onLoadSuccess: function (){

        	// 操作上的编辑按钮
            $('.action-edit').click(function (){
                var e = $(this);
                var index = layer.open({
            		type: 2,
            		title: '编辑',
            		content: '<{:url("edit")}>' + '?id=' + e.data('id')
            	});
            	layer.full(index);
            });
            // 设置为草稿或者发布状态
            $('.action-change').click(function (){
                var e = $(this);
                layer.confirm('确认改变该专题当前状态？',function(index){
                    $.ajax({
                        type: 'POST',
                        url: "./change",
                        data:{
                            id:e.data('id'),
                            status:e.data('status'),
                        },// 参数
                        async: false,
                        dataType: 'json',
                        success: function(data){
                            layer.msg(data.data.msg,{icon:1,time:1000});
                            setTimeout(window.location.reload(),1500);
                        },
                        error:function(data) {
                            console.log(data.data.msg);
                            setTimeout(window.location.reload(),1500);
                        },
                    });
                });
            });

            // 操作上的删除按钮
            $('.action-delete').click(function (){
                var e = $(this)
                var viewpointId = e.data('id');

				if(confirm('确认删除ID为' + viewpointId + '的记录？')){
					var localSuccess = function(){
						$('.btn[name=refresh]').click();
                    };
                
	                var option = {
	                		url: "/viewpoint/changeStatus",
	                		localSuccess: localSuccess
		                };
					changeStatus(viewpointId, 2, option);
				}
                
            });

        }
    };
    window['adminTableQueryParams'] = function (){
        return {
        	userName: $('#search-user-name').val(),
        	title: $('#search-title').val(),
            dateMin: $('#search-dateMin').val(),
            dateMax: $('#search-dateMax').val(),
            tabName1: "<{$Think.get.tabName1??''}>",
            tabName2: "<{$Think.get.tabName2??''}>"
        };
    };

    $(function () {
        // 批量删除按钮
        $('#table-button-del').click(function () {
            var tr = $('input[name="btSelectItem"]:checked').parent().parent(),
                changeStatusEle = tr.find('.action-delete'),
                ids = [];

            changeStatusEle.map(function (){
                var e = $(this);

                ids.push(e.data('id'));
            });

            var localSuccess = function(){
            	$('.btn[name=refresh]').click();
            };
            var option = {
            		url: "/viewpoint/changeStatus",
            		localSuccess: localSuccess
                };
            ids.length > 0 && changeStatus(ids, 2, option);
        });
        
        $('#table-button-add').click(function (){
        	var index = layer.open({
        		type: 2,
        		title: '新增',
        		content: '<{:url("add")}>'
        	});
        	layer.full(index);
        });
        
        
        
    });

    function changeStatus(ids, status, option){
        requestAjax({
            ids: ids,
            status: status
        }, option);
    }

    


</script>
