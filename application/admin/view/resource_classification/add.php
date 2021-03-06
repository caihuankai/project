﻿	<div class="panel panel-default">
		<div class="panel-header">资源分类新增</div>
		<div class="panel-body">
			<form action="/ResourceClassification/add" method="post" class="form form-horizontal responsive" id="demoform">
				<div class="row cl">
					<label class="form-label col-xs-3">资源分类名称：</label>
					<div class="formControls col-xs-8">
						<input type="text" class="input-text" placeholder="2~16个字符，字母/中文/数字/下划线" name="resourceClassificationName" id="resourceClassificationName" autocomplete="off">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-3">描述：</label>
					<div class="formControls col-xs-8">
					<!--
						<input type="text" class="input-text" placeholder="4~16个字符，字母/中文/数字/下划线" name="resourceClassificationDescription" id="resourceClassificationDescription">
						-->
						<textarea cols="50" rows="10" class="resourceClassificationDescription" name="resourceClassificationDescription"
                                  id="resourceClassificationDescription"  placeholder="说点什么...最少输入1个字符"></textarea>
					</div>
				</div>
				<!--
				<div class="row cl">
					<label class="form-label col-xs-3">资源分类代码：</label>
					<div class="formControls col-xs-8">
						<input type="text" class="input-text" autocomplete="off" placeholder="2~16个字符，字母/中文/数字/下划线" name="resourceClassificationCode" id="resourceClassificationCode">
					</div>
				</div>

				<div class="row cl">
					<label class="form-label col-xs-3">排序号：</label>
					<div class="formControls col-xs-8">
						<input type="text" class="input-text" autocomplete="off" placeholder="整数" name="resourceClassificationSort" id="resourceClassificationSort">
					</div>
				</div>
				
				<div class="row cl">
					<label class="form-label col-xs-3">备注：</label>
					<div class="formControls col-xs-8">
						<textarea cols="" rows="" class="textarea" name="remark" id="remark"  placeholder="说点什么...最少输入10个字符"></textarea>
					</div>
				</div>
				-->
				<div class="row cl">
					<div class="col-xs-8 col-xs-offset-3">
						<input class="btn btn-primary" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
					</div>
				</div>
			</form>
		</div>
	</div>
	
	<script>
		$("#demoform").validate({
		rules:{
			resourceClassificationName:{
				required:true,
				minlength:2,
				maxlength:16
			},
			resourceClassificationDescription:{
				required:true,
				minlength:1,
				maxlength:16
			}
			// resourceClassificationCode:{
				// required:true,
				// minlength:2,
				// maxlength:16
			// },
			// resourceClassificationSort:{
				// required:true,
				// digits:true
			// },
			// remark:{
				// maxlength:500,
			// }
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			$("#modal-shenqing-success").modal("show");
			$(form).ajaxSubmit();
		}
	});
	</script>


<!--
<form id="resourceClassificationForm" action="/ResourceClassification/add" method="post">
<table class='talk-form talk-box-top'>
       <tr>
          <th>资源分类名称<font color='red'>*</font>：</th>
          <td>
            <input type="text" id="resourceClassificationName" name="resourceClassificationName" value='' class="ipt" />
          </td>
       </tr>
	   <tr>
          <th>资源分类描述<font color='red'>*</font>：</th>
          <td>
            <input type="text" id="resourceClassificationDescription" name="resourceClassificationDescription" value='' class="ipt" />
          </td>
       </tr>
       <tr>
          <th>资源分类代码<font color='red'>*</font>：</th>
          <td>
            <input type="text" id="resourceClassificationCode" name="resourceClassificationCode" value='' class="ipt" />
          </td>
       </tr>
       <tr>
          <th>排序号<font color='red'> </font>：</th>
          <td>
            <input type='text' id='resourceClassificationSort' name="resourceClassificationSort" value='' class='ipt' maxLength='10'/>
          </td>
       </tr>
  
  <tr>
     <td colspan='2' align='center'>
       <input type="hidden" name="Id" id="resourceClassificationId" class="ipt" value="" />
       <input type="submit" value="提交" class='btn btn-blue' />
       <input type="button" onclick="javascript:history.go(-1)" class='btn' value="返回" />
     </td>
  </tr>
</table>
</form>
-->