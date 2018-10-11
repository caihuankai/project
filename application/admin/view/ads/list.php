<div class="page-container">
<!--	
	<form class="form form-horizontal" id="form-article-add" action="/Ads/index" method="post">
		<div class="text-c">
			<input type="text" placeholder="开始时间" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="logmin" class="input-text Wdate" name="create_time_min" style="width:120px;">
			-
			<input type="text" placeholder="结束时间" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d' })" id="logmax" class="input-text Wdate" name="create_time_max" style="width:120px;">
			
			<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
		</div>
	</form>
	-->
	<div class="cl pd-5 bg-1 bk-gray mt-20">
	   <span class="l">
			<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont"></i> 批量删除</a>
			<a href="/Ads/toAdd" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i>新增</a>
	    </span>
	   <span class="r">共有数据：<strong><{$count}></strong> 条</span>
	   <div style="clear:both"></div>
	</div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
				<tr class="text-c">					
					<th width="25"><input type="checkbox" name="btSelectAll" value=""></th>
					<th width="60">序号</th>
					<th width="60">ID</th>
					<th width="80">名称</th>
					<!--
					<th width="80">广告开始日期</th>
					<th width="80">广告结束日期</th>
					-->
					<th width="75">图标</th>
					<th width="60">点击数</th>
					<th width="60">排序号</th>
					<th width="60">操作人</th>
					<th width="60">状态</th>
					<th width="120">操作</th>
						
				</tr>
			</thead>
			<tbody>
				<{volist name='list' id='vo' key="k"}>
				<tr class="text-c">
				  <td><input data-index="<{$vo.adId}>" type="checkbox"  value="<{$vo.adId}>" name="btSelectItem"></td>
				  <td><{$k}></td>
				  <td><{$vo.adId}></td>
				  <td><{$vo.adName}></td>
				  <!--
				  <td><{$vo.adStartDate}></td>
				  <td><{$vo.adEndDate}></td>
				  -->
				  <td>
					<div id="prvid" style="min-height:30px;">
					<!--
					  <img src="__ROOT__/<{$vo.adFile}>">
					  -->
					   <img src="<{$vo.adFile}>" style="width: 180px;height: 60px;">
					</div>
				  </td>
				  <td><{$vo.adClickNum}></td>
				  <td><{$vo.adSort}></td>
				  <td><{$vo.operatorName}></td>
					<{switch name="$vo.adStatus"}>
						<{case value="1"}><td class="adTd" style="color: rgb(90, 152, 222);">已启用</td><{/case}>
						<{case value="-1"}><td class="adTd" style="color: #dd514c;">已停用</td><{/case}>
					 <{/switch}>
				  <td class="f-14 td-manage">	  
					  <a style="text-decoration:none" class="ml-5" onClick="article_edit('广告编辑','/Ads/toEdit?id=<{$vo.adId}>')" href="javascript:;" title="修改"><i class="Hui-iconfont">&#xe6df;</i></a> 
					  <a style="text-decoration:none" class="ml-5" onClick="article_del(this,'<{$vo.adId}>')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>
					  <{switch name="$vo.adStatus"}>
						<{case value="1"}><a style="text-decoration:none;color: #dd514c;"  onClick="ad_stop(this,'<{$vo.adId}>')" href="javascript:;" title="停用">停用</a><{/case}>
						<{case value="-1"}><a class="c-primary" onClick="ad_start(this,<{$vo.adId}>)" href="javascript:;" title="启用">启用</a><{/case}>
					 <{/switch}>
				  </td>
				</tr>
			    <{/volist}>
			</tbody>
		</table>
	</div>
</div>
<{$list->render()}>
<script type="text/javascript" src="__ROOT__/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="__ROOT__/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="__ROOT__/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="__ROOT__/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript"> 
$('.table-sort').dataTable({
	"aaSorting": [[ 1, "asc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"pading":false,
	"aoColumnDefs": [
	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
	  {"orderable":false,"aTargets":[0,8]}// 不参与排序的列
	]
});

/*资讯-添加*/
function article_add(title,url,w,h){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*资讯-编辑*/
function article_edit(title,url,id,w,h){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*资讯-删除*/
function article_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'GET',
			url: '/Ads/del?id='+id,
			dataType: 'json',
			success: function(data){
				console.log(data);
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}

/*广告-停用*/
function ad_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		$.ajax({
			type: 'GET',
			url: '/Ads/adStop?id='+id,
			dataType: 'json',
			success: function(data){
				console.log(data);
				//$(obj).parents("tr").remove();
				$(obj).text('启用');
				$(obj).attr("onClick","ad_start(this,"+id+")");
				$(obj).attr("style","");
				
				$(obj).parents("tr").children(".adTd").text('已停用').attr("style","color: #dd514c;");
				layer.msg('已停用!',{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}

/*广告-启用*/
function ad_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		$.ajax({
			type: 'GET',
			url: '/Ads/adStart?id='+id,
			dataType: 'json',
			success: function(data){
				console.log(data);
				//$(obj).parents("tr").remove();
				$(obj).text('停用');
				$(obj).attr("onClick","ad_stop(this,"+id+")");
				$(obj).attr("style","text-decoration:none;color: #dd514c;");
				$(obj).parents("tr").children(".adTd").text('已启用').attr("style","color: rgb(90, 152, 222);");
				layer.msg('已启用!',{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}

//批量删除 
function datadel(){
	if(confirm('确定要删除所选吗?')){ 
		var checks = $("input[name='btSelectItem']:checked");
		if(checks.length == 0){ alert('未选中任何项！');}
		//将获取的值存入数组   
		var checkData = new Array();
		checks.each(function(){ 
		checkData.push($(this).val()); 
		});
		
		$.get("/Ads/deleteBatch",{Check:checkData.toString()},function(data,status){
			//alert("Data: " + data + "nStatus: " + status);
			alert(data);
			window.location.reload();
		});
		
		// var test = checkData.toString();
		// alert(test);
	}
}
</script> 