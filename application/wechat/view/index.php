<!DOCTYPE html>
<html lang=zh-CN>

<head>
    <meta charset=UTF-8>
    <meta name=viewport content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
    <meta http-equiv=X-UA-Compatible content="ie=edge">
    <title>大策略</title>
    <style>
        html,
        body {
            width: 100%;  
  height: 100%;  
  margin: 0;  
  padding: 0;  
  position: relative;         }
  #app {  
  width: 100%;  
  height: 100%;  
  background: #fff;  
  overflow: scroll;  
  -webkit-overflow-scrolling: touch;  
  position: absolute;  
  left:0;  
  top:0;  
}  
    </style>
<link href='/css/bundle.css?version=<?php  echo  time();?>' rel=stylesheet>


</head>

<body>
    <div id=app></div>
    <script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
    <script>
        //获取随机socket
        "<?php $socket_array = ['WEB_SOCKET','WEB_SOCKET_1'];$web_socket = $socket_array[array_rand($socket_array,1)] ?>";
        var web_socket_host = "<{$Think.config.SOCKET_CONFIG[$web_socket]['host']}>";
        var web_socket_port = "<{$Think.config.SOCKET_CONFIG[$web_socket]['port']}>";
    </script>
<script type=text/javascript src=/js/FlashWavRecorder/jquery.min.js></script>
<script type=text/javascript src="/js/bundle.js?version=<?php  echo  time();?>"></script>
<script type=text/javascript src='/js/FlashWavRecorder/swfobject.js'></script>
<script type=text/javascript src="/js/FlashWavRecorder/recorder.js?version=<?php  echo time();?>"></script>

<script type="text/javascript" src="/js/ckplayer.min.js"></script>

    </body>

</html>