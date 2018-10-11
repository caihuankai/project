<!DOCTYPE HTML>
<html>
<body>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>

    <!--公用js -->
    <script type="text/javascript" src="/lib/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="/lib/layer/2.1/layer.js"></script>
    <script type="text/javascript" src="/lib/layer/2.1/extend/layer.ext.js"></script>
    <script type="text/javascript" src="/lib/icheck/jquery.icheck.min.js"></script>
    <script type="text/javascript" src="/lib/jquery.validation/1.14.0/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/lib/jquery.validation/1.14.0/validate-methods.js"></script>
    <script type="text/javascript" src="/lib/jquery.validation/1.14.0/messages_zh.min.js"></script>
    <script type="text/javascript" src="/static/h-ui/js/H-ui.js"></script>
    <script type="text/javascript" src="/static/h-ui.admin/js/H-ui.admin.js"></script>
    <script type="text/javascript" src="/lib/bootstrap3.3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/lib/bootstrap-table/bootstrap-table.js"></script>
    <script type="text/javascript" src="/lib/bootstrap-table/extensions/editable/bootstrap-table-editable.js"></script>
    <script type="text/javascript" src="/lib/bootstrap3-editable/js/bootstrap-editable.js"></script>
    <script type="text/javascript" src="/lib/bootstrap-table/bootstrap-table-zh-CN.js"></script>
    <script type="text/javascript" src="/lib/My97DatePicker/WdatePicker.js"></script>


    <!--[if lt IE 9]>
    <script type="text/javascript" src="/lib/html5.js"></script>
    <script type="text/javascript" src="/lib/respond.min.js"></script>
    <script type="text/javascript" src="/lib/PIE_IE678.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/static/h-ui/css/H-ui.min.css"/>
    <link rel="stylesheet" type="text/css" href="/static/h-ui.admin/css/H-ui.admin.css"/>
    <link rel="stylesheet" type="text/css" href="/lib/Hui-iconfont/1.0.8/iconfont.css"/>
    <link rel="stylesheet" type="text/css" href="/lib/icheck/icheck.css"/>
    <link rel="stylesheet" type="text/css" href="/static/h-ui.admin/skin/default/skin.css" id="skin"/>
    <link rel="stylesheet" type="text/css" href="/static/h-ui.admin/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="/lib/bootstrap3.3/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/lib/bootstrap3-editable/css/bootstrap-editable.css" />
    <link rel="stylesheet" type="text/css" href="/lib/bootstrap-table/bootstrap-table.css" />
    <link rel="stylesheet" type="text/css" href="/lib/bootstrap3-editable/assets/select2/select2.css" />

    <!--[if IE 6]>
    <script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js"></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title><?php echo isset($title) ? $title : '管理后台'; ?></title>

    <!--公用方法-->
    <script type="text/javascript">
        
        <{// 这是跨项目公用的js代码}>
        <{include file="../../application/common/static/common.js"}>
        
        $.fn.editable.defaults.mode = 'inline';
    </script>
</head>
<body>



<{$headerBodyHtml??''}>
<{include file="$headerBody"}>
