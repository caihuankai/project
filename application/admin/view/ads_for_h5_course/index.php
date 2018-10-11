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
    <button class="btn btn-primary" id="table-button-del"> 移除 </button>
    <button class="btn btn-primary" id="table-button-dis"> 停用 </button>
    <button class="btn btn-primary" id="table-button-open"> 启用 </button>
</div>

<script>
	var columnStatusHtml = <{$columnStatusHtml|json_encode}>;
	var actionStatusHtml = <{$actionStatusHtml|json_encode}>;
	var statusMap = {1: '-1', '-1': 1};
	
    window['adminTableConfig'] = {
        onLoadSuccess: function (){

            // 操作上的删除按钮
            $('.action-delete').click(function (){
                var e = $(this)
                var id = e.data('id');

				if(confirm('确认删除ID为' + id + '的记录？')){
					var localSuccess = function(){
						$('.btn[name=refresh]').click();
                    };
                
	                var option = {
	                		url: "<{:url('deleteAds')}>",
	                		localSuccess: localSuccess
		                };
					deleteAds(id, option);
				}
                
            });

            //操作上的启用/停用按钮
            $('.open-status').click(function (){
            	var e = $(this)
                var id = e.data('id');
                var status = e.data('status');

				var localSuccess = function(){
                    layer.msg('修改成功');
                    e.parents('tr').children('td').eq(8).html(columnStatusHtml[status]);
					e.data('status', statusMap[status]);
                    e.html(actionStatusHtml[status]);
                };
                
	            var option = {
	                url: "<{:url('changeStatus')}>",
	                localSuccess: localSuccess
		        };
	            changeStatus(id, status, option);
            });

         	// 操作上的编辑按钮
            $('.action-edit').click(function (){
                var e = $(this);

                layer_show('编辑', '<{:url("edit")}>' + '?id=' + e.data('id'), 800, 600);
            });

        }
    };

    $(function () {
        // 批量移除按钮
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
            	url: "<{:url('deleteAds')}>",
            	localSuccess: localSuccess
            };
            ids.length > 0 && deleteAds(ids, option);
        });

        // 批量启用/停用按钮
        $('#table-button-dis, #table-button-open').click(function () {
        	var tr = $('input[name="btSelectItem"]:checked').parent().parent(),
            changeStatusEle = tr.find('.open-status'),
            status = $(this).is('#table-button-open') ? 1 : -1,
            ids = [];

        	changeStatusEle.map(function (){
                var e = $(this);
                if(e.data('status') == status){
                	ids.push(e.data('id'));
                }
            });
        	var localSuccess = function(){
        		layer.msg('修改成功');
        		for (key in ids){
        			$('.open-status[data-id=' + ids[key] +']').parents('tr').children('td').eq(8).html(columnStatusHtml[status]);
	            	$('.open-status[data-id=' + ids[key] +']').data('status', statusMap[status]).html(actionStatusHtml[status]);
        		}
            };

            var option = {
            	url: "<{:url('changeStatus')}>",
            	localSuccess: localSuccess
           	};

            ids.length > 0 && changeStatus(ids, status, option);
        });

        $('#table-button-add').click(function (){
            var e = $(this);

            layer_show('新增', '<{:url("add")}>' + '?type=<{$type}>', 800, 600);
        });
        
    });

    function deleteAds(ids, option){
        requestAjax({
            ids: ids,
        }, option);
    }

    function changeStatus(ids, status, option){
        requestAjax({
            ids: ids,
            status: status
        }, option);
    }

</script>
