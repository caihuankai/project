<!--
<article class="page-container">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>提现单号：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<{$data['pdc_sn']}>" placeholder="" id="" name="">
			</div>
		</div>
		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">提现日期：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<{$data['pdc_add_time']}>" placeholder="" id="" name="">
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">提现人：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" value="<{$data['pdc_user_name']}>" placeholder="">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">提现金额：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" value="<{$data['pdc_amount']}>" placeholder="">
			</div>
		</div>
		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">手续费比例：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<{$data['pdc_fee_amount_ratio']}>" placeholder="" id="" name="">
			</div>
		</div>
		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">手续费：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<{$data['pdc_fee_amount']}>" placeholder="" id="" name="">
			</div>
		</div>
		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">到账金额：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<{$data['pdc_amount']-$data['pdc_fee_amount']}>" placeholder="" id="" name="">
			</div>
		</div>
		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">提现状态：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<{switch name="$data['pdc_payment_state']"}>
						<{case value="0"}><span class="label label-success radius">待审批</span><{/case}>
						<{case value="1"}><span class="label label-success radius">通过</span><{/case}>
						<{case value="2"}><span class="label label-success radius">拒绝</span><{/case}>
						<{case value="3"}><span class="label label-success radius">已汇款</span><{/case}>
						<{case value="4"}><span class="label label-success radius">已到帐</span><{/case}>
			    <{/switch}>
			</div>
		</div>
		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">备注：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<{$data['remark']}>" placeholder="" id="" name="">
			</div>
		</div>

		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
			    <input type="button" class="btn btn-default radius" onclick="layer_close();" class='btn' value="返回" />
			</div>
		</div>
</article>
-->



<div class="content">
	<table class="table table-striped">
	<thead>
	<tr>
		<th>
			标题
		</th>
		<th>
			内容
		</th>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td>
			提现单号
		</td>
		<td>
			<{$data['pdc_sn']}>
		</td>
	</tr>
	<tr>
		<td>
			提现日期
		</td>
		<td>
			<{$data['pdc_add_time']}>
		</td>
	</tr>
	<tr>
		<td>
			提现人
		</td>
		<td>
			<{$data['pdc_user_name']}>
		</td>
	</tr>
	<tr>
		<td>
			提现金额
		</td>
		<td>
			<{$data['pdc_amount']}>
		</td>
	</tr>
	<tr>
		<td>
			手续费比例
		</td>
		<td>
			<{$data['pdc_fee_amount_ratio']}>
		</td>
	</tr>
	<tr>
		<td>
			手续费
		</td>
		<td>
			<{$data['pdc_fee_amount']}>
		</td>
	</tr>
	<tr>
		<td>
			到账金额
		</td>
		<td>
			<{$data['pdc_amount']-$data['pdc_fee_amount']}>
		</td>
	</tr>
	<tr>
		<td>
			提现状态
		</td>
		<td>
			<{switch name="$data['pdc_payment_state']"}>
				<{case value="0"}><span class="label label-success radius">待审批</span><{/case}>
				<{case value="1"}><span class="label label-success radius">通过</span><{/case}>
				<{case value="2"}><span class="label label-success radius">拒绝</span><{/case}>
				<{case value="3"}><span class="label label-success radius">已汇款</span><{/case}>
				<{case value="4"}><span class="label label-success radius">已到帐</span><{/case}>
			<{/switch}>
		</td>
	</tr>
	<tr>
		<td>
			备注
		</td>
		<td>
			<{$data['remark']}>
		</td>
	</tr>

	</tbody>
	</table>

	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
			<input type="button" class="btn btn-default radius" onclick="layer_close();" class='btn' value="返回" />
		</div>
    </div>
</div>

