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

<{eq name="type" value="0"}>
<div id="table-button-html" class="hide">
	<button class="btn btn-primary" id="table-button-add"> 新增 </button>
    <button class="btn btn-primary" id="table-button-del"> 移除 </button>
    <button class="btn btn-primary" id="table-button-dis"> 停用 </button>
    <button class="btn btn-primary" id="table-button-open"> 启用 </button>
</div>
<{/eq}>

<div id="table-search-html">
    <input type="text" class="input-text" placeholder="特训班名称" id="search-class-name" name="className"/>
    <input type="text" onfocus="WdatePicker({maxDate:'#F{$dp.$D(\'endEnrollTime\')||\'%y-%M-%d\'}'})" id="beginEnrollTime" placeholder="报名开始时间"
           class="input-text Wdate" style="width:120px;">-
    <input type="text" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'beginEnrollTime\')}'})" id="endEnrollTime" placeholder="报名结束时间"
           class="input-text Wdate" style="width:120px;">
    
    <input type="text" onfocus="WdatePicker({maxDate:'#F{$dp.$D(\'endTime\')||\'%y-%M-%d\'}'})" id="beginTime" placeholder="课程开始时间"
           class="input-text Wdate" style="width:120px;">-
    <input type="text" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'beginTime\')}'})" id="endTime" placeholder="课程结束时间"
           class="input-text Wdate" style="width:120px;">
    <select title="收费类型" name="" id="search-level" class="form-control form-select">
        <{option data="$searchLevelArr" notHeader="true"}>
    </select>
    <select title="状态" name="" id="search-open-status" class="form-control form-select">
        <{option data="$searchOpenStatusArr" notHeader="true"}>
    </select>
    
    <input type="submit" value="搜索" class="btn btn-success radius" onclick="adminTableRefresh()" />
</div>

<script>
	var columnStatusHtml = <{$columnStatusHtml|json_encode}>;
	var actionStatusHtml = <{$actionStatusHtml|json_encode}>;
	var statusMap = {1: 2, 2: 1};
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
	                		url: "<{:url('deleteCourse')}>",
	                		localSuccess: localSuccess
		                };
	                deleteCourse(id, option);
				}
                
            });

          	//操作上的启用/停用按钮
            $('.open-status').click(function (){
            	var e = $(this)
                var id = e.data('id');
                var status = e.data('status');

				var localSuccess = function(){
                    layer.msg('修改成功');
                    e.parents('tr').children('td').eq(13).html(columnStatusHtml[status]);
					e.data('status', statusMap[status]);
                    e.html(actionStatusHtml[status]);
                };
                
	            var option = {
	                url: "<{:url('changeStatus')}>",
	                localSuccess: localSuccess
		        };
	            changeStatus(id, status, option);
            });

        }
    };

    window['adminTableQueryParams'] = function (){
        return {
        	className: $('#search-class-name').val(),
        	beginEnrollTime: $('#beginEnrollTime').val(),
        	endEnrollTime: $('#endEnrollTime').val(),
        	beginTime: $('#beginTime').val(),
        	endTime: $('#endTime').val(),
        	level: $('#search-level').val(),
            status: $('#search-open-status').val(),
            tabName1: "<{$Think.get.tabName1??''}>",
            tabName2: "<{$Think.get.tabName2??''}>"
        };
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
            	url: "<{:url('deleteCourse')}>",
            	localSuccess: localSuccess
            };
            ids.length > 0 && deleteCourse(ids, option);
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
        			$('.open-status[data-id=' + ids[key] +']').parents('tr').children('td').eq(13).html(columnStatusHtml[status]);
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

            layer_show('新增', '<{:url("add")}>', 700, 800);
        });
        
    });

    function deleteCourse(ids, option){
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

    function _dataCopy(data){
        title = '复制链接';
        url = "<{:url('CourseManage/copy')}>?dataCopy="+ data +'&type=3';
        w = '500';
        h = '240';
        layer_show(title, url, w, h);
    }


</script>
