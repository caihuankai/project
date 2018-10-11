{__NOLAYOUT__}
<{if !empty($menuList)}>
<{volist name="menuList" id="vo"}><dl id="menu-<{$vo.icon}>">
	<dt><i class="Hui-iconfont <{$vo.icon}>"></i> <{$vo.name}><i class="Hui-iconfont menu_dropdown-arrow">&#xe6d4;</i></dt>
	<dd>
		<ul>
			<{if !empty($vo['child'])}>
			<{volist name="vo.child" id="sub"}>
			<li><a _href="/<{$sub.url}>" data-title="<{$sub.name}>" href="javascript:void(0)"><{$sub.name}></a></li>
			<{/volist}>
			<{/if}>
		</ul>
	</dd>
</dl>
<{/volist}>
<{/if}>
<script type="text/javascript" src="/static/h-ui.admin/js/H-ui.admin.js"></script>