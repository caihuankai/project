<div class="page-container">
	<form class="form form-horizontal" id="form-article-add" action="/Resource/index" method="post">
	<div class="text-c">
	 <span class="select-box inline">
		<select name="resourceClassificationId" class="select">
			<option value="">全部资源分类</option>
			<!--
			<{volist name='list' id='vo'}>
			<option value="<{$vo.resourceClassificationId}>"><{$vo.resourceClassificationName}></option>
			<{/volist}>
			-->
			<{volist name='resourceClassification' id='vo'}>
			<option value="<{$vo.resourceClassificationId}>"><{$vo.resourceClassificationName}></option>
			<{/volist}>
		</select>
		<select name="resourceType" class="select">
			<option value="">全部资源类型</option>
			<option value="0">图片</option>
			<option value="1">视频</option>
		</select>
	 </span> 
		<!--
		日期范围：
		<input type="text" placeholder="开始时间" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="logmin" class="input-text Wdate" name="create_time_min" style="width:120px;">
		-
		<input type="text" placeholder="结束时间" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d' })" id="logmax" class="input-text Wdate" name="create_time_max" style="width:120px;">
		-->
		<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
	</div>
	</form>
	
	<div class="cl pd-5 bg-1 bk-gray mt-20">
	   <span class="l"><a href="/Resource/toAdd" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i>新增</a></span>
	   <span class="r">共有数据：<strong><{$count}></strong> 条</span>
	   <div style="clear:both"></div>
	</div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
				<tr class="text-c">					
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="30">序号</th>
					<th width="30">ID</th>
					<th width="80">缩略图</th>
					<th width="30">资源分类</th>
					<th width="30">资源类型</th>
					<th width="75">图片提示文字</th>
					<!--
					<th width="60">有效日期</th>
					-->
					<th width="20">有效状态</th>
					<th width="40">操作人</th>
					<th width="80">操作</th>	
				</tr>
			</thead>
			<tbody>
				<{volist name='list' id='vo'  key="k"}>
				<tr class="text-c">
				  <td><input type="checkbox" value="<{$vo.resourceId}>" name=""></td>
				  <td><{$k}></td>
				  <td><{$vo.resourceId}></td>
				  <td>
					<div id="prvid" style="min-height:30px;">
					<!--
					  <img src="__ROOT__/<{$vo.resourceURL}>">
					  -->
					  <img src="<{$vo.resourceURL}>"  style="width: 180px;height: 60px;">
					</div>
				  </td>
				  <td><{$vo.resourceClassificationName}></td>
				  <td>
					<{switch name="$vo.resourceType"}>
						<{case value="0"}><span class="label radius">图片</span><{/case}>
						<{case value="1"}><span class="label radius">视频</span><{/case}>
					<{/switch}>
				  </td>
				  
				  <td><{$vo.resourceTip}></td>
				  <!--
				  <td><{$vo.resourceEndDate}></td>
				  -->
				  <td>
					<{switch name="$vo.dataFlag"}>
						<{case value="1"}><span class="label label-success radius">有效</span><{/case}>
						<{case value="-1"}><span class="label radius">已删除</span><{/case}>
					<{/switch}>
				  </td>
				  <td><{$vo.operatorName}></td>
				  <td class="f-14 td-manage">
					  <a style="text-decoration:none" class="ml-5" onClick="article_edit('资源修改','/Resource/toEdit?id=<{$vo.resourceId}>')" href="javascript:;" title="修改"><i class="Hui-iconfont">&#xe6df;</i></a> 
					  <a style="text-decoration:none" class="ml-5" onClick="article_del(this,'<{$vo.resourceId}>')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>
				  </td>
				</tr>
			    <{/volist}>
			</tbody>
		</table>
	</div>
</div>
<!--
<{$list->render()}>
-->

<script type="text/javascript" src="__ROOT__/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="__ROOT__/lib/datatables/DataTables-1.10.15/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="__ROOT__/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="__ROOT__/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
$('.table-sort').on('draw.dt', function () {

    $('#del-multi').click(function (){
        var checkboxList = $('input:checkbox:checked'),
            ids = [];

        checkboxList.map(function (index, ele, data){
            if (ele.value) {
                ids.push(ele.value);
            }
        });

        article_del(null, ids);
    });
}).dataTable({
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"paging": true,
    'language' : {
        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Chinese.json"
    },
    "infoCallback": function( settings, start, end, max, total, pre ) {
        if (total < 1){
            return '';
        }

        return '<button class="btn btn-primary radius" id="del-multi">删除</button> &emsp; 显示 '+start+' 到 '+end+' ，共 '+total+' 条';
    },
	"aoColumnDefs": [
	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
	  {"orderable":false,"aTargets":[0,9]}// 不参与排序的列
	]
});

/*添加*/
function article_add(title,url,w,h){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*编辑*/
function article_edit(title,url,id,w,h){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*删除*/
function article_del_func(obj, ids){
    $.ajax({
        type: 'POST',
        url: '/Resource/del',
        data: {
            ids: ids
        },
        dataType: 'json',
        success: function(data){
            if (obj) {
                $(obj).parents("tr").remove();
            }else{
                location.reload();
            }
            layer.msg('已删除!',{icon:1,time:1000});
        },
        error:function(data) {
            console.log(data.msg);
        }
    });
}
function article_del(obj,ids){
	layer.confirm('确认要删除吗？', function (){
        article_del_func(obj, ids);
    });
}
</script> 
