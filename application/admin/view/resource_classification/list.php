<div class="page-container">
	<form class="form form-horizontal" id="form-article-add" action="/ResourceClassification/index" method="post">
	<div class="text-c">
	    <span class="select-box inline">
		   <input type="text" name="resourceClassificationName" id="" placeholder="分类名称" style="width:250px" class="input-text">
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
	   <span class="l"><a href="/ResourceClassification/toAdd" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i>新增</a></span>
	   <span class="r">共有数据：<strong><{$count}></strong> 条</span>
	   <div style="clear:both"></div>
	</div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort" id="table-list">
			<thead>
				<tr class="text-c">					
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="30">序号</th>
					<th width="30">ID</th>
					<th width="80">名称</th>
					<th width="80">描述</th>
					<th width="80">操作人</th>
					<th width="75">操作</th>
				</tr>
			</thead>
			<tbody>
				<{volist name='list' id='vo' key="k"}>
				<tr class="text-c">
				  <td><input type="checkbox" value="<{$vo.resourceClassificationId}>" name="table-checkbox"></td>
				  <td><{$k}></td>
				  <td><{$vo.resourceClassificationId}></td>
				  <td><{$vo.resourceClassificationName}></td>
				  <td><{$vo.resourceClassificationDescription}></td>
				  <td><{$vo.operatorName}></td>
				  <td class="f-14 td-manage">
					  <a style="text-decoration:none" class="ml-5" onClick="article_edit('资源分类修改','/ResourceClassification/toEdit?id=<{$vo.resourceClassificationId}>')" href="javascript:;" title="修改"><i class="Hui-iconfont">&#xe6df;</i></a> 
					  <a style="text-decoration:none" class="ml-5" onClick="article_del(this,'<{$vo.resourceClassificationId}>')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>
				  </td>
				</tr>
			    <{/volist}>
			</tbody>
		</table>
	</div>
</div>
<{$list->render()}>

<script type="text/javascript" src="__ROOT__/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="__ROOT__/lib/datatables/DataTables-1.10.15/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="__ROOT__/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="__ROOT__/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
var table = $('#table-list');
table.on('draw.dt', function () {

    $('#del-multi').click(function (){
        var checkboxList = $('input[name="table-checkbox"]:checked'),
            ids = [];

        checkboxList.map(function (index, ele, data){
            ids.push(ele.value);
        });

        article_del(null, ids);
    });
}).on('preInit.dt', function (event, settings) {
}).dataTable({
	"sorting": [[ 1, "asc" ]],//默认第几个排序
	"stateSave": false,//状态保存
	"paging": true, // 是否开启分页
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
	  {"orderable":false,"aTargets":[0,6]}// 不参与排序的列
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
function article_del(obj,ids){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '/ResourceClassification/del',
            data: {ids: ids},
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
			},
		});		
	});
}
</script> 
