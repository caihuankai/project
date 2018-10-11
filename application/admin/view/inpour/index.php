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
    <button class="btn btn-primary" id="table-button-dis"> 禁用 </button>
    <button class="btn btn-primary" id="table-button-open"> 启用 </button>
</div>

<div id="table-search-html">
    <input type="text" class="input-text" placeholder="金额" id="search-cost" name="cost"/>
    <select title="类型" name="" id="search-type" class="form-control form-select">
        <{option data="$searchTypeArr" notHeader="true"}>
    </select>
    <select title="状态" name="" id="search-status" class="form-control form-select">
        <{option data="$searchStatusArr" notHeader="true"}>
    </select>
    <{date_range title="创建"}>
    <input type="submit" value="搜索" class="btn btn-success radius" onclick="adminTableRefresh()" />
</div>


<script>
	var columnStatusHtml = <{$columnStatusHtml|json_encode}>;
	var actionStatusHtml = <{$actionStatusHtml|json_encode}>;
	var statusMap = {1: 2, 2: 1};
	
    window['adminTableConfig'] = {
    	pagination: false, // 不分页
        onLoadSuccess: function (){

            // 操作上的删除按钮
            $('.action-delete').click(function (){
                var e = $(this)
                var id = e.data('id');

				if(confirm('确认删除ID为' + id + '的记录？')){
					var localSuccess = function(data){
						layer.msg(data);
						e.parent().parent().remove();
                    };
                
	                var option = {
	                		url: "<{:url('delete')}>",
	                		localSuccess: localSuccess
		                };
					deleteInpour(id, option);
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

                layer_show('编辑', '<{:url("edit")}>' + '?id=' + e.data('id'), '', 510);
            });

            $('img').click(function(){
                var imageUrl = $(this).attr("src");
				var content = '<img src="'+imageUrl+'" />';
				var width = 'auto';
				var height = 'auto';
				if($(this)[0].naturalHeight) {
					if($(this)[0].naturalHeight > $(window).height() * 0.8){
						var windowHeight = $(window).height() * 0.8;
						proportion = windowHeight / $(this)[0].naturalHeight;
						height = windowHeight;
						width = $(this)[0].naturalWidth * proportion;
						content = '<img src="' + imageUrl + '" height="' + height + '" width="' + width + '"/>';
					}
				}
            	layer.open({
            		type: 1,
            		area: [width + 'px', height +'px'],
            		title: false,
            		shadeClose: true,
            		closeBtn: 0,
            		skin: 'layui-layer-nobg', //没有背景色
                    content: content
                });
            });

        }
    };
    window['adminTableQueryParams'] = function (){
        return {
        	cost: $('#search-cost').val(),
            dateMin: $('#search-dateMin').val(),
            dateMax: $('#search-dateMax').val(),
            type: $('#search-type').val(),
            status: $('#search-status').val(),
            tabName1: "<{$Think.get.tabName1??''}>",
            tabName2: "<{$Think.get.tabName2??''}>"
        };
    };

    $(function () {
        // 批量移除按钮
        $('#table-button-del').click(function () {
            var tr = $('input[name="btSelectItem"]:checked').parent().parent(),
                deleteEle = tr.find('.action-delete'),
                ids = [];

            deleteEle.map(function (){
                var e = $(this);

                ids.push(e.data('id'));
            });

            var localSuccess = function(e){
            	layer.msg(e);
            	for (key in ids){
            		$('.action-delete[data-id=' + ids[key] +']').parents('tr').remove();
            	}
            };
            var option = {
            	url: "<{:url('delete')}>",
            	localSuccess: localSuccess
            };
            ids.length > 0 && deleteInpour(ids, option);
        });

        // 批量启用/停用按钮
        $('#table-button-dis, #table-button-open').click(function () {
        	var tr = $('input[name="btSelectItem"]:checked').parent().parent(),
            changeStatusEle = tr.find('.open-status'),
            status = $(this).is('#table-button-open') ? 1 : 2,
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

            layer_show('新增', '<{:url("add")}>', '', 510);
        });

    });

    function deleteInpour(ids, option){
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
