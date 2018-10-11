import clientClass from './clientClass.js'
// import subcmd from './handlemsg.js'
import wxfunction from './wxfunction.js'
const messageList = [];
export default {
	ws: null,
	setping: null,
	//连接服务端
	connect(user_id, token, course_id, onmessage, onclose) {
		//创建websocket
		this.ws = new WebSocket('ws://' + web_socket_host + ':' + web_socket_port)
		// 测试环境
		// this.ws = new WebSocket('ws://210.56.212.27:6263')
		// 正式环境
		// this.ws = new WebSocket('ws://121.46.0.116:9263')
		//连接成功时调用
		this.ws.onopen = () => {
			const Create_ClientHello = new clientClass.ClientHello()
			this.ws.send(JSON.stringify(Create_ClientHello))
			// alert('连接成功')
			const Create_ClientHeader = new clientClass.ClientHeader()
			const Create_CMDUserLogonReq4 = new clientClass.CMDUserLogonReq4()
			Create_CMDUserLogonReq4.loginid = +user_id
			Create_CMDUserLogonReq4.token = token
			Create_ClientHeader.data = Create_CMDUserLogonReq4
			this.ws.send(JSON.stringify(Create_ClientHeader))
			this.setping = setInterval(() => {
				this.sendPingClient(user_id, +course_id)
			}, 60000) //定时发送ping包 防止服务器断开连接
		}
		// 接受信息
		this.ws.onmessage = (e) => {
			//console.log('websocket-->e',e)
			this.onmessage(e, +course_id, onmessage)
		}
		this.ws.onerror = this.onerror
		this.ws.onclose = (e) => {
			this.onclose(e, onclose)
		}
	},
	/**
	 * 发送socket信息
	 * @param {number} num 回调回来的指令
	 * @param {function} fun 发送的具体信息
	 * @param {function} callback 成功回调
	 */
	send(num, fun, callback){
		if(typeof callback === 'function'){
			messageList[num] = callback;
		}
		if(typeof fun === 'function'){
			fun();
		}
	},
	//服务端发来消息时调用
	onmessage(e, course_id, fn) {
		const msg = JSON.parse(e.data)
		// console.log(msg)
		if (msg.subcmd == 21017) {
			wxfunction.joinRoom(msg.data.userid, +course_id)
		} else {
			// subcmd[msg.subcmd](msg.data) //调用对应函数
		}
		if(typeof messageList[msg.subcmd] === 'function'){
			messageList[msg.subcmd](msg);
		}
		if (fn) {
			fn(msg)
		}
		//alert(msg)
		// console.log(msg.data)
		return msg
	},
	//连接错误时调用
	onerror(e) {
		// alert('连接出错')
		console.log(e)
	},
	//连接关闭时调用
	onclose(e, onclose) {
		// alert('连接关闭')
		clearInterval(this.setping)
		console.log(e)
		if (onclose) {
			onclose()
		}
	},

	sendPingClient(user_id, course_id) {
		const clientPingResp = new clientClass.ClientHeader()
		clientPingResp.data = new clientClass.ClientPing()
		clientPingResp.subcmd = 2
		clientPingResp.length = 22
		clientPingResp.data.userid = +user_id
		clientPingResp.data.roomid = +course_id
		console.log(clientPingResp)
		this.ws.send(JSON.stringify(clientPingResp))
	}
}