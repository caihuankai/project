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



<{empty name="$relevantId"}>
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
    <select title="是否精选" name="" id="search-type" class="form-control form-select">
        <{option data="$searchTypeArr" notHeader="true"}>
    </select>
    
    <input type="submit" value="搜索" class="btn btn-success radius" onclick="adminTableRefresh()" />
</div>
<{/empty}>


<script>

    window['adminTableConfig'] = {
        onLoadSuccess: function (){

        	// 操作上的编辑按钮
            $('.action-edit').click(function (){
                var e = $(this);

                layer_show('编辑', '<{:url("details")}>' + '?id=' + e.data('id'), 1300, 800);
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
	                		url: "<{:url('changeStatus')}>",
	                		localSuccess: localSuccess
		                };
					changeStatus(viewpointId, 2, option);
				}
                
            });

         	// 操作上的推荐按钮
            $('.action-recommend').click(function (){
                var e = $(this);

                layer_show('首页焦点', '<{:url("recommend")}>' + '?id=' + e.data('id'), 780, 350);
            });

            $('.action-refund').click(function (){
                var e = $(this),
                order_no = e.data('id');
                layer.confirm('确认屏蔽吗?', {icon: 3, title:'提示'},
                    function(index){
                        $.ajax({
                            type: 'POST',
                            url: '/PayOrder/refund?order_no='+order_no,
                            dataType: 'json',
                            success: function(data){
                                console.log(data);
                                if(data){
                                    layer.msg('屏蔽成功!');
                                    adminTableRefresh();
                                }else{
                                    layer.msg('屏蔽失败');
                                }
                            },
                            error:function(data) {
                                console.log(data.msg);
                            },
                        }); 
                    }
                );
            });

          //操作上的栏目置顶/取消置顶按钮
            $('.open-column-top-status').click(function (){
            	var e = $(this)
                var id = e.data('id');
                var columnTopStatus = e.data('column-top-status');

				var localSuccess = function(){
                    layer.msg('修改成功');
                    //按钮文案修改
                    if(columnTopStatus == 0) {
                    	e.data('column-top-status', 1);
                        e.html("置顶");
                    }else {
                    	e.data('column-top-status', 0);
                        e.html("<span class='c-red'>取消置顶</span>");
                    }
                };
                
	            var option = {
	                url: "<{:url('changeColumnTopStatus')}>",
	                localSuccess: localSuccess
		        };
	            changeColumnTopStatus(id, columnTopStatus, option);
            });

            //复制链接
            $('.action-copy-url').click(function (){
            	var id = $(this).data('id');
            	title = '复制链接';
                url = "./copy?viewpointId=" + id;
                w = '500';
                h = '240';
                layer_show(title, url, w, h);
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
            viewpointType: $('#search-type').val(),
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
            		url: "<{:url('changeStatus')}>",
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
    
    function changeColumnTopStatus(ids, columnTopStatus, option){
        requestAjax({
            ids: ids,
            columnTopStatus: columnTopStatus,
            columnId: <{$relevantId}>
        }, option);
    }


</script>
