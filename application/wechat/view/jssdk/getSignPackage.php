<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<input class="loginTest-btn" type="button" value="登录测试" onclick="loginTest()">
<input class="loginTest-btn" type="button" value="进入房间测试" onclick="joinRoom()">
<input class="loginTest-btn" type="button" value="离开房间测试" onclick="leaveRoom()">
<input class="loginTest-btn" type="button" value="发送文字测试" onclick="sendMessage()">
<input class="loginTest-btn" type="button" value="发送图片测试" onclick="sendImagea()">
<input class="loginTest-btn" type="button" value="发送语音测试" onclick="sendVoice()">
<input class="forbidUserChat-btn" type="button" value="禁言用户测试" onclick="forbidUserChat()">
<input class="overLive-btn" type="button" value="结束直播测试" onclick="overLive()">
<input class="getMsgHis-btn" type="button" value="请求历史消息测试" onclick="getMsgHis()">
<input class="chooseImage" id="chooseImage" type="button" value="选择图片测试" onclick="chooseImage()">
<input class="image-btn" id="uploadImage" type="button" value="图片上传测试" onclick="uploadImage()">
<input class="download-btn" id="downloadImage" type="button" value="图片下载测试" onclick="downloadImage()">
<input class="voice-btn" id="startRecord" type="button" value="开始语音测试" onclick="startRecord()">
<input class="stopRecord-btn" id="stopRecord" type="button" value="停止语音测试" onclick="stopRecord()">
<input class="playVoice-btn" id="playVoice" type="button" value="播放语音测试" onclick="playVoice()">
<input class="uploadVoice-btn" id="uploadVoice" type="button" value="上传语音测试" onclick="uploadVoice()">
<input class="loginTest-btn" type="button" value="登录测试11" onclick="loginTest()">
<div class="text" id="text"></div>

<script type="text/javascript">
	var accessToken = '<?php echo $signPackage['accessToken']; ?>';
	var user_id = '<?php echo $signPackage['user_id']; ?>';
	var code = '<?php echo $signPackage['code']; ?>';
	var ws = {},setping;
</script>

<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
<script type="text/javascript" src="/js/live/clientClass.js"></script>
<script type="text/javascript" src="/js/live/web_socket.js"></script>
<script type="text/javascript" src="/js/live/socketClient.js"></script>
<script type="text/javascript" src="/js/live/wxjsConfig.js"></script>
<script type="text/javascript" src="/js/live/jquery.min.js"></script>
<script type="text/javascript" src="/js/live/wxfunction.js"></script>
<script type="text/javascript" src="/js/live/handlemsg.js"></script>

<script>
	// alert('<?php echo $signPackage['accessToken']; ?>');
	// alert("<{:session('user_id')}>");
	// alert(location.href.split('#')[0]);
	function loginTest(){
		connect();
	};
	// 图片接口
	// 拍照、本地选图
	wx.config({
	    debug: true, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
	    appId: '<?php echo $signPackage['appId']; ?>', // 必填，公众号的唯一标识
	    timestamp: '<?php echo $signPackage['timestamp']; ?>', // 必填，生成签名的时间戳
	    nonceStr: '<?php echo $signPackage['nonceStr']; ?>', // 必填，生成签名的随机串
	    signature: '<?php echo $signPackage['signature']; ?>',// 必填，签名，见附录1
	    jsApiList: ['chooseImage','uploadImage','downloadImage','startRecord','stopRecord','onVoiceRecordEnd','uploadVoice','downloadVoice','playVoice','pauseVoice','stopVoice','onVoicePlayEnd','onMenuShareTimeline','onMenuShareAppMessage'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
	});
	wx.ready(function(){
		wx.checkJsApi({
            jsApiList: [
                'onMenuShareTimeline','onMenuShareAppMessage',
            ]
        });
		//分享到朋友圈
		wx.onMenuShareTimeline({
		    title: '哈哈哈哈', // 分享标题
		    desc: '噢噢噢噢噢噢噢噢噢噢',
		    link: '', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
		    imgUrl: 'http://mpic.tiankong.com/377/e7b/377e7bdf4a40f8d65a657741cdf2260d/640.jpg?x-oss-process=image/resize,m_lfit,h_600,w_600/watermark,image_cXVhbmppbmcucG5n,t_90,g_ne,x_5,y_5', // 分享图标
		    success: function () { 
		        alert('成功分享到朋友圈');
		    },
		    cancel: function () { 
		        // 用户取消分享后执行的回调函数
		    }
		});
		//分享给好友
		wx.onMenuShareAppMessage({
		    title: '哈哈哈哈', // 分享标题
		    desc: '噢噢噢噢噢噢噢噢噢噢', // 分享描述
		    link: '', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
		    imgUrl: 'http://mpic.tiankong.com/377/e7b/377e7bdf4a40f8d65a657741cdf2260d/640.jpg?x-oss-process=image/resize,m_lfit,h_600,w_600/watermark,image_cXVhbmppbmcucG5n,t_90,g_ne,x_5,y_5', // 分享图标
		    type: '', // 分享类型,music、video或link，不填默认为link
		    dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
		    success: function () { 
		    	alert('成功分享给朋友');
		        // 用户确认分享后执行的回调函数
		    },
		    cancel: function () { 
		        // 用户取消分享后执行的回调函数
		    }
		});
	    // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready函数中。
	});
	wx.error(function(res){
		alert(res.errMsg);
	    // config信息验证失败会执行error函数，如签名过期导致验证失败，具体错误信息可以打开config的debug模式查看，也可以在返回的res参数中查看，对于SPA可以在这里更新签名。
	});
</script>