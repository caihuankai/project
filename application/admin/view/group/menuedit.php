<article>
	<form action="" method="post" class="form form-horizontal" id="form-member-edit" style="width: 770px;padding: 0px 15px;">
		<!-- 角色分配 -->
		<div class="zTreeDemoBackground left" id="role">
			<input type="hidden" id="nodeid" value="<{$groupId}>">
			<div class="form-group">
				<div class="col-sm-5 col-sm-offset-2">
					<ul id="treeType" class="ztree">

					</ul>
				</div>
			</div>
			<div style="clear:both;"></div>
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-4" style="margin-bottom: 15px">
					<input type="button" value="确认分配" class="btn btn-primary" id="postform"/>
				</div>
			</div>
		</div>
	</form>
</article>

<!--请在下方写此页面业务相关的脚本-->
<!--<link rel="stylesheet" href="/lib/zTree/v3/css/zTreeStyle/zTreeStyle.css" type="text/css">-->
<link rel="stylesheet" href="/lib/zTree/v3/css/metroStyle/metroStyle.css" type="text/css">
<script type="text/javascript" src="/lib/zTree/v3/js/jquery.ztree.core-3.5.js"></script>
<script type="text/javascript" src="/lib/zTree/v3/js/jquery.ztree.excheck-3.5.js"></script>
<script type="text/javascript" src="/lib/zTree/v3/js/jquery.ztree.exedit-3.5.js"></script>
<script type="text/javascript">
	var zNodes = <{$node}>;
$(function(){
	//设置zetree
	var setting = {
		check:{
			enable:true
		},
		data: {
			simpleData: {
				enable: true
			}
		}
	};

	$.fn.zTree.init($("#treeType"), setting, zNodes);
	var zTree = $.fn.zTree.getZTreeObj("treeType");
	zTree.expandAll(true);

	//确认分配权限
	$("#postform").click(function(){
		var zTree = $.fn.zTree.getZTreeObj("treeType");
		var nodes = zTree.getCheckedNodes(true);
		var NodeString = '';
		$.each(nodes, function (n, value) {
			if(n>0){
				NodeString += ',';
			}
			NodeString += value.id;
		});
		var id = $("#nodeid").val();
		//写入库
		$.post('./menuedit', { 'id' : id, 'rule' : NodeString}, function(res){
			if(res.code == 1){
				layer.msg(res.msg);
				setTimeout(function(){
					var index = parent.layer.getFrameIndex(window.name);
					parent.layer.close(index);
				},800);
			}else{
				layer.msg(res.msg);
			}
		}, 'json')
	})
});
</script>