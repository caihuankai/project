<div class="page-container">	
	<form class="form form-horizontal" id="form-article-add" action="/PdCash/index" method="post">
	<div class="text-c">
	 <span class="select-box inline">
		<select name="pdc_payment_state" class="select">
			<option value="">全部审批状态</option>
			<option value="0">待审批</option>
			<option value="1">通过</option>
			<option value="2">拒绝</option>
			<option value="3">已汇款</option>
			<option value="4">已到帐</option>
		</select>
		<input type="text" name="pdc_sn" id="pdc_sn" placeholder="提现单号" style="width:250px" class="input-text">
		<input type="text" name="pdc_user_name" id="pdc_user_name" placeholder="提现人" style="width:250px" class="input-text">
		</span> 日期范围：
		<input type="text" placeholder="开始时间" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="logmin" class="input-text Wdate" name="create_time_min" style="width:120px;">
		-
		<input type="text" placeholder="结束时间" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d' })" id="logmax" class="input-text Wdate" name="create_time_max" style="width:120px;">
		
		<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
	</div>
	</form>
	<div class="cl pd-5 bg-1 bk-gray mt-20">
	   <span class="r">共有数据：<strong><{$count}></strong> 条</span>
	   <div style="clear:both"></div>
	</div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
				<tr class="text-c">					
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="80">ID</th>
					<th width="80">提现单号</th>
					<th width="80">提现日期</th>
					<th width="80">提现人</th>
					<th width="75">提现金额</th>
					<th width="80">手续费比例</th>
					<th width="80">手续费</th>
					<th width="80">到账金额</th>
					<th width="80">提现状态</th>
					<th width="80">备注</th>
					<th width="20">操作</th>
						
				</tr>
			</thead>
			<tbody>
				<{volist name='list' id='vo'}>
				<tr class="text-c">
				  <td><input type="checkbox" value="" name=""></td>
				  <td><{$vo.pdc_id}></td>
				  <td><{$vo.pdc_sn}></td>
				  <td><{$vo.pdc_add_time}></td>
				  <td><{$vo.pdc_user_name}></td>
				  <td><{$vo.pdc_amount}></td>
				  <td><{$vo.pdc_fee_amount_ratio}></td>
				  <td><{$vo.pdc_fee_amount}></td>
				  <td><{$vo.pdc_amount-$vo.pdc_fee_amount}></td>
				  <td class="td-status">
					 <{switch name="$vo.pdc_payment_state"}>
						<{case value="0"}><span class="label label-success radius">待审批</span><{/case}>
						<{case value="1"}><span class="label label-success radius">通过</span><{/case}>
						<{case value="2"}><span class="label label-success radius">拒绝</span><{/case}>
						<{case value="3"}><span class="label label-success radius">已汇款</span><{/case}>
						<{case value="4"}><span class="label label-success radius">已到帐</span><{/case}>
					 <{/switch}>
				  </td>
				  <td><{$vo.remark}></td>
				  <td class="f-14 td-manage">
					  <{switch name="$vo.pdc_payment_state"}>
						<{case value="0"}><a style="text-decoration:none" onClick="article_shenhe(this,'<{$vo.pdc_id}>')" href="javascript:;" title="审核">审核</a><{/case}>
						<{case value="1"}><a class="c-primary" onClick="article_start(this,<{$vo.pdc_id}>)" href="javascript:;" title="汇款">汇款</a><{/case}>
						<{case value="2"}><a class="c-primary" onClick="article_shenqing(this,<{$vo.pdc_id}>)" href="javascript:;" title="再次审核提现">再次审核提现</a><{/case}>
						<{case value="2"}><a class="c-primary" href="javascript:;" title="申请已拒绝">申请已拒绝</a><{/case}>
						<{case value="3"}><a style="text-decoration:none" onClick="article_stop(this,<{$vo.pdc_id}>)" href="javascript:;" title="确认已到账">确认已到账</a><{/case}>
						<{case value="4"}><a style="text-decoration:none;color: #999;"  href="javascript:;" title="提现完成">提现完成</a><{/case}>
					 <{/switch}>
					  <a style="text-decoration:none;cursor:pointer" class="ml-5" onClick="article_edit('查看','/PdCash/toEdit','<{$vo.pdc_id}>')" href="javascript:;" title="查看">查看</a>
				  </td>
				</tr>
			    <{/volist}>
			</tbody>
		</table>
	</div>
</div>
<{$list->render()}>
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
		content: url+"?id="+id
	});
	layer.full(index);
}
/*资讯-删除*/
function article_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '/PdCash/del?id='+id,
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

/*资讯-审核*/
function article_shenhe(obj,id){
	layer.confirm('审核提现？', {
		btn: ['通过','不通过','取消'], 
		shade: false,
		closeBtn: 0
	},
	function(){
		$.ajax({
			type: 'POST',
			url: '/PdCash/changePaymentState?paymentState=1&id='+id,
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_start(this,<{$vo.pdc_id}>)" href="javascript:;" title="汇款">汇款</a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">审批通过</span>');
				$(obj).remove();
				layer.msg('已通过', {icon:6,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	},
	function(){
		$.ajax({
			type: 'POST',
			url: '/PdCash/changePaymentState?paymentState=0&id='+id,
			dataType: 'json',
			success: function(data){				
				$(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_shenqing(this,<{$vo.pdc_id}>)" href="javascript:;" title="再次审核提现">再次审核提现</a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-danger radius">未通过</span>');
				$(obj).remove();
				layer.msg('未通过', {icon:5,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});
	});
}

/*汇款*/
function article_start(obj,id){
	layer.confirm('确认要汇款吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '/PdCash/changePaymentState?paymentState=3&id='+id,
			dataType: 'json',
			success: function(data){				
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_stop(this,<{$vo.pdc_id}>)" href="javascript:;" title="确认已到账">确认已到账</a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已汇款</span>');
				$(obj).remove();
			    layer.msg('已汇款!',{icon: 6,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});	
	});
}
/*审核提现*/
function article_shenqing(obj,id){	
	$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_shenhe(this,<{$vo.pdc_id}>)" href="javascript:;" title="审核">审核</a>');
	$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">待审核</span>');
	$(obj).remove();
	
	layer.msg('已提交申请，耐心等待审核!', {icon: 1,time:2000});
}

/*确认已经到账*/
function article_stop(obj,id){
	layer.confirm('确认已经到账吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '/PdCash/changePaymentState?paymentState=4&id='+id,
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none;color: #999;"  href="javascript:;" title="提现完成">提现完成</a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已到账</span>');
				$(obj).remove();
				layer.msg('提现完成!',{icon: 5,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});
	});
}
</script> 
