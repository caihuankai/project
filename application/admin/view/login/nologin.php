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
<script type="text/javascript" src="lib/html5.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<script type="text/javascript" src="lib/PIE_IE678.js"></script>
<![endif]-->
<link href="/static/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="/static/h-ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css" />
<!--<link href="/static/h-ui.admin/css/style.css" rel="stylesheet" type="text/css" />-->
<link href="/lib/Hui-iconfont/1.0.7/iconfont.css" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>
    大策略-运营管理平台
</title>
<meta name="keywords" content="">
<meta name="description" content="">


<style>
    #loginform>.login-header{
        margin: 0;
        padding: 0;
        margin-top: -90px;
        margin-bottom: 90px;
        font-size: 29px;
        color: #FFFFFF;
    }
    .login-header-span{
        font-size: 32px;
        font-weight: bold;
        color: #333333;
    }
</style>
    
</head>

<body>
<div class="loginWraper">
    
    
    
  <div id="loginform" class="loginBox">

      <div class="row cl text-c login-header"><span class="login-header-span">大策略</span> 运营管理平台</div>
      
    <div class="row cl">
      <div class="formControls col-xs-8 col-xs-offset-3" id="hint-font"><?php echo $msg;?></div>
    </div>
    <form class="form form-horizontal" action="/login/dologin" method="post">
      <input type="hidden" id="submitted" name="submitted" value="true" />
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
        <div class="formControls col-xs-8">
          <input id="username" name="username" type="text" placeholder="账号" class="input-text size-L" value="<?php echo $username;?>">
        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
        <div class="formControls col-xs-8">
          <input id="password" name="password" type="password" placeholder="密码" class="input-text size-L">
        </div>
      </div>
      <!--       
        <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3"></div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3"></div>
      </div>
     <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input class="input-text size-L" type="text" placeholder="验证码" onblur="if(this.value==''){this.value='验证码:'}" onclick="if(this.value=='验证码:'){this.value='';}" value="验证码:" style="width:150px;">
          <img src="images/VerifyCode.aspx.png"> <a id="kanbuq" href="javascript:;">看不清，换一张</a> </div>
      </div>

      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <label for="online">
            <input type="checkbox" name="online" id="online" value="">
            使我保持登录状态</label>
        </div>
      </-->
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input name="" type="submit" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">　
            <input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
        </div>
      </div>
    </form>
  </div>
</div>
<div class="footer">版权所有 ©right 2010-2016 大策略 粤ICP备16047198号-1</div>
<script type="text/javascript" src="/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/static/h-ui/js/H-ui.js"></script>
<script>
$(document).on("submit",function(e){
	var username = $("#username").val();
	var password = $("#password").val();
	if(($.trim(username).length===0)||($.trim(password).length===0)){
		$("#hint-font").html("帐号或密码不正确");
		return false;
	}
});
</script>
</body>
</html>