<div class="page-container">
<!--
	<div class="text-c">
		<button onclick="removeIframe()" class="btn btn-primary radius">关闭选项卡</button>
	 <span class="select-box inline">
		<select name="" class="select">
			<option value="0">全部分类</option>
			<option value="1">分类一</option>
			<option value="2">分类二</option>
		</select>
		</span> 日期范围：
		<input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="logmin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d' })" id="logmax" class="input-text Wdate" style="width:120px;">
		<input type="text" name="" id="" placeholder=" 资讯名称" style="width:250px" class="input-text">
		<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜资讯</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" data-title="添加资讯" data-href="article-add.html" onclick="Hui_admin_tab(this)" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加资讯</a></span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
	-->
	
	<form class="form form-horizontal" id="form-article-add" action="/RcbLog/index" method="post">
	<div class="text-c">
	 <span class="select-box inline">
		<select name="type" class="select">
			<option value="">业务类别</option>
			<option value="order_pay">下单使用</option>
			<option value="commission">课程提成</option>
			<option value="withdraw">资金提现</option>
			<option value="withdraw_freeze">提现冻结</option>
			<option value="recharge">充值金额</option>
		</select>
		
		</span> 日期范围：
		<input type="text" placeholder="开始时间" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="logmin" class="input-text Wdate" name="create_time_min" style="width:120px;">
		-
		<input type="text" placeholder="结束时间" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d' })" id="logmax" class="input-text Wdate" name="create_time_max" style="width:120px;">
		<input type="text" name="user_name" id="order_no" placeholder="用户昵称" style="width:250px" class="input-text">
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
					<!-- <th width="25"><input type="checkbox" name="" value=""></th> -->
					<th width="5%">ID</th>
					<th width="12%">流水号</th>
					<th width="10%">创建时间</th>
					<th width="7%">用户昵称</th>
					<th width="5%">业务名称</th>
					<th width="16%">业务详情</th>
					<!-- <th width="9%">可用余额变更</th> -->
					<th width="9%">收入金额(单位:元)</th>
					<th width="9%">支出金额(单位:元)</th>
					<th width="9%">总收益(单位:元)</th>
					<th width="9%">可提现金额(单位:元)</th>
					<!-- <th width="60">冻结余额变更</th> -->
				</tr>
			</thead>
			<tbody>
				<{volist name='list' id='vo'}>
				<tr class="text-c">
				  <!-- <td><input type="checkbox" value="" name=""></td> -->
				  <td><{$vo.id}></td>
				  <td><{$vo.order_no}></td>
				  <td><{$vo.add_time}></td>
				  <!--
				  <td><{$vo.user_name}></td>
				  -->
				  <td><{$vo.alias}></td>
				  <td>
					<{switch name="$vo.type"}>
						<{case value="order_pay"}>下单使用<{/case}>
						<{case value="commission"}>课程提成<{/case}>
						<{case value="withdraw"}>资金提现<{/case}>
						<{case value="withdraw_freeze"}>提现冻结<{/case}>
						<{case value="recharge"}>充值金额<{/case}>
						<{case value="class_income"}>课程收益<{/case}>
						<{default /}>其他
					  <{/switch}>
				  </td>
				  <td><{$vo.description}></td>
				  <!-- <td><{$vo.available_amount}></td> -->
				  <td>
				  	<{switch name="$vo.type"}>
						<{case value="commission"}><{$vo.available_amount}><{/case}>
						<{case value="class_income"}><{$vo.available_amount}><{/case}>
						<{default /}>
					<{/switch}>
				  </td>
				  <td>
				  	<{switch name="$vo.type"}>
						<{case value="withdraw"}><{$vo.available_amount}><{/case}>
						<{default /}>
					<{/switch}>
				  </td>
				  <td><{$vo.income_total}></td>
				  <td><{$vo.income}></td>
				  <!-- <td><{$vo.freeze_amount}></td> -->
				</tr>
			    <{/volist}>
			</tbody>
		</table>
	</div>
</div>
<!--
<{$list->render()}>
-->
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="__ROOT__/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="__ROOT__/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="__ROOT__/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="__ROOT__/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
/* $(document).ready(function() {
    $('.table-sort').dataTable();
} ); */

$('.table-sort').dataTable({
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"pading":false,
	"aoColumnDefs": [
	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
	  {"orderable":false,"aTargets":[0]}// 不参与排序的列
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
