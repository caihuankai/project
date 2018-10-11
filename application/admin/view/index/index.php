{__NOLAYOUT__}
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<LINK rel="Bookmark" href="../static/h-ui.admin/images/favicon.ico" >
<LINK rel="Shortcut Icon" href="../static/h-ui.admin/images/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/lib/html5.js"></script>
<script type="text/javascript" src="/lib/respond.min.js"></script>
<script type="text/javascript" src="/lib/PIE_IE678.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/lib/Hui-iconfont/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/lib/icheck/icheck.css" />
<link rel="stylesheet" type="text/css" href="/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>大咖社-后台管理系统</title>
<meta name="keywords" content="">
<meta name="description" content="">
</head>
<body>
<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
		<div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="javascript:void(0);"><img src="../static/h-ui.admin/images/d_logo.png" width="185" height="100"></a> <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="javascript:void(0);"><img src="../static/h-ui.admin/images/min_d_logo.png" width="110" height="70"></a> <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
			<nav class="nav navbar-nav">
				<ul class="cl main-menu">
					<{volist name="topMenuList" id="vo"}>
					<li class="top-menus-list <{if $vo.id==1}>current<{/if}>"><a href="javascript:changeMenu(<{$vo.id}>)" data-title="<{$vo.name}>"><i class="Hui-iconfont <{$vo.icon}> iconfont-size"></i><br><{$vo.name}></a></li>
					<{/volist}>
				</ul>
			</nav>

			<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
				<ul class="cl">
					<li><{$userinfo.group_name}></li>
					<li class="dropDown dropDown_hover"> <a href="#" class="dropDown_A"><{$userinfo.username}> <i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:changeInfo(<{$userinfo.id}>)">修改密码</a></li>
							<li><a href="<{:url('admin/login/nologin')}>">退出</a></li>
						</ul>
					</li>
<!--					<li id="Hui-msg"> <a href="#" title="消息"><span class="badge badge-danger">1</span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> </li>-->
<!--					<li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="设置"><i class="Hui-iconfont" style="font-size:18px">&#xe61d;</i></a>-->
						<!--<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:;" data-val="default" title="默认">默认</a></li>
						</ul>-->
					</li>
				</ul>
			</nav>
		</div>
	</div>
</header>
<aside class="Hui-aside" style="display: block;">
	<input runat="server" id="divScrollValue" type="hidden" value="" />
	<div class="menu_dropdown bk_2">
		<{if !empty($menuList)}>
		<{volist name="menuList" id="vo" key="key"}>
		<dl id="menu-<{$key}>">
			<dt><i class="Hui-iconfont <{$vo.icon}>"></i> <span><{$vo.name}></span><i class="Hui-iconfont menu_dropdown-arrow">&#xe6d4;</i></dt>
			<dd class="Hui-dd">
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
	</div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<section class="Hui-article-box">
	<div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
		<div class="Hui-tabNav-wp">
			<ul id="min_title_list" class="acrossTab cl">
				<li class="active"><span title="我的桌面" data-href="/index/welcome">我的桌面</span><em></em></li>
			</ul>
		</div>
		<div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a></div>
	</div>
	<div id="iframe_box" class="Hui-article">
		<div class="show_iframe">
			<div style="display:none" class="loading"></div>
			<iframe scrolling="yes" frameborder="0" src="/index/welcome"></iframe>
		</div>
	</div>
</section>
<script type="text/javascript" src="/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/static/h-ui.admin/js/H-ui.admin.js"></script> 
<script type="text/javascript">
/*资讯-添加*/
function article_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*图片-添加*/
function picture_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*产品-添加*/
function product_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*用户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*改变菜单项*/
function changeMenu(id)
{
	$.getJSON('/index/change', {'id' : id}, function(res){
		if(res.code == 1){
			$(".menu_dropdown").html($.trim(res.data));
		}
	});
}
/*修改个人信息*/
function changeInfo(id)
{
	var title = '修改密码';
	layer_show(title, '/user/changepwd?id='+id,'350','250');
}

//顶部导航高亮显示当前位置
$(document).on("click",".main-menu li",function(e){
	$(this).addClass("current").siblings().removeClass("current");
});

/*修改当前服务号*/
function changeSubscribe(id,name)
{
	$.getJSON('/index/setPlatform', {'id':id}, function(res){
		if(res.code == 1){
			$('#selectedSubscribe').html(name);
			layer.msg(res.msg, "", "success");
		}
		else
		{
			layer.msg(res.msg, "", "error");
		}
	});
}

//官网管理账号加载对应列表
$(function () {
    if("<{$topMenuList[0]['id']}>" != '1'){
    	changeMenu("<{$topMenuList[0]['id']}>");
    }
});
</script> 
</body>
</html>