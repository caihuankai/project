//连接服务端
function connect() {
	//创建websocket
	ws = new WebSocket('ws://121.40.165.18:8088');
	// ws = new WebSocket('ws://210.56.212.27:6263');
	//连接成功时调用
	ws.onopen = function(){
		alert('连接成功');
		var Create_ClientHello = new ClientHello();
		ws.send(JSON.stringify(Create_ClientHello));
		var Create_ClientHeader = new ClientHeader(); 
		var Create_CMDUserLogonReq4 = new CMDUserLogonReq4();
		Create_CMDUserLogonReq4.loginid = 1706742;
		Create_CMDUserLogonReq4.token = "9704fe145639862bf8947889a287745c";
		Create_ClientHeader.data = Create_CMDUserLogonReq4;
		console.log(123);
		ws.send(JSON.stringify(Create_ClientHeader));
		setping = setInterval("sendPingClient()", 60000);
	};
	ws.onmessage = onmessage;
	ws.onerror = onerror;
	ws.onclose = onclose;
}
//服务端发来消息时调用
function onmessage(e){
	// var msg = JSON.parse(e.data);
	// console.log(msg.subcmd);
	document.getElementById("text").appendChild(document.createElement('pre')).innerHTML = e;
	alert('有新消息');
	// window.subcmd[msg.subcmd](msg.data);
	console.log(e)
}
//连接错误时调用
function onerror(e){
	alert('连接出错');
	console.log(e);
}
//连接关闭时调用
function onclose(e){
	alert('连接关闭');
	console.log(e);
}
function sendPingClient() {
    var clientPingResp = new ClientHeader();
    clientPingResp.data = new ClientPing();
    clientPingResp.subcmd = 2;
    clientPingResp.length = 18;
    clientPingResp.data.userid = 1706742;
    clientPingResp.data.roomid = 1;
    console.log(clientPingResp);
    ws.send(JSON.stringify(clientPingResp));
};

