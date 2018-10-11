<div class="page-container">
	<form class="form form-horizontal" id="form-article-add" action="/PayOrder/index" method="post">
	<div class="text-c">
	 <span class="select-box inline">
		<input type="text" name="order_no" id="order_no" placeholder="流水号" style="width:250px" class="input-text">
		<input type="text" name="course_name" id="course_name" placeholder="课程名称" style="width:250px" class="input-text">
		</span> 日期范围：
		<input type="text" placeholder="开始时间" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="logmin" class="input-text Wdate" name="create_time_min" style="width:120px;">
		-
		<input type="text" placeholder="结束时间" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d' })" id="logmax" class="input-text Wdate" name="create_time_max" style="width:120px;">
		
		<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
	</div>
	
	<div class="cl pd-5 bg-1 bk-gray mt-20">
	   <span class="r">共有数据：<strong><{$count}></strong> 条</span>
	   <div style="clear:both"></div>
	</div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
				<tr class="text-c">
					<!--
					<th width="25"><input type="checkbox" name="" value=""></th>
					-->
					<th width="30">序号</th>
					<th width="20">ID</th>
					<th width="40">流水号</th>
					<th width="40">创建时间</th>
					<th width="50">课程名称</th>
					<th width="25">实际支付金额</th>
					<th width="30">支付方式</th>
					<!--
					<th width="30">卡别</th>
					-->
					<th width="30">昵称</th>
					<!--
					<th width="30">备注</th>
					<th width="30">操作</th>
					-->
				</tr>
			</thead>
			<tbody>
				<{volist name='list' id='vo' key="k"}>
				<tr class="text-c">
				<!--
				  <td><input type="checkbox" value="" name=""></td>
				  -->
				  <td><{$k}></td>
				  <td><{$vo.id}></td>
				  <td><{$vo.order_no}></td>
				  <td><{$vo.create_time}></td>
				  <td><{$vo.class_name}></td>
				  <td><{$vo.total_fee}></td>
				  <td>
					  <{switch name="$vo.pay_type"}>
						<{case value="1"}>支付宝<{/case}>
						<{case value="2"}>微信<{/case}>
						<{case value="3"}>银联<{/case}>
						<{case value="4"}>苹果<{/case}>
						<{case value="5"}>人工充值<{/case}>
						<{case value="6"}>微信零钱<{/case}>
						<{default /}>其他
					  <{/switch}>
				  </td>
				  <!--
				  <td>暂缺</td>
				  -->
				 
				  <td><{$vo.alias}></td>
				   <!--
				  <{empty name="$vo.remark"}>
				     <td>暂无备注</td>
					<{else /}>
					<td><{$vo.remark}></td>
					<{/empty}>
					
				  
				  <td class="f-14 td-manage">					  
					  <a style="text-decoration:none" class="ml-5" onClick="article_edit('备注','/PayOrder/toEdit?id=<{$vo.id}>')" href="javascript:;" title="备注"><i class="Hui-iconfont">&#xe6df;</i></a> 
				  </td>
				  -->
				</tr>
			    <{/volist}>
			</tbody>
		</table>
	</div>
</div>
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="__ROOT__/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="__ROOT__/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="__ROOT__/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="__ROOT__/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
$('.table-sort').dataTable({
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"pading":false,
	"aoColumnDefs": [
	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
	  {"orderable":false,"aTargets":[0,7]}// 不参与排序的列
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
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}
</script>
