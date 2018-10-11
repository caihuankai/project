import clientClass from './clientClass.js'
import socketClient from './socketClient.js'
export default {
    // 图片接口
    // 拍照、本地选图
    images: {
        localId: [], //本地选择图片id
        serverId: [], //上传返回服务端id
        downloadId: [] //下载返回本地id
    },
    // 语音接口
    voice: {
        localId: '',
        serverId: '',
        downloadId: ''
    },
    //调用手机相册/拍照接口
    // document.querySelector('#chooseImage').onclick = function () {
    chooseImage() {
        wx.chooseImage({
            count: 1, // 默认9
            sizeType: ['original', 'compressed'], // 可以指定是原图还是压缩图，默认二者都有
            sourceType: ['album', 'camera'], // 可以指定来源是相册还是相机，默认二者都有
            success: (res) => {
                this.images.localId = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
                // alert('已选择 ' + res.localIds.length + ' 张图片');
                // alert(this.images.localId);
                socketClient.ws.send(123123);
            }
        });
    },
    // };

    //上传图片（支持多图上传）
    // document.querySelector('#uploadImage').onclick = function () {
    uploadImage() {
        if (this.images.localId.length == 0) {
            // alert('请先使用 chooseImage 接口选择图片');
            return;
        }
        var i = 0,
            length = this.images.localId.length;
        this.images.serverId = [];

        function upload() {
            wx.uploadImage({
                localId: this.images.localId[i],
                success: (res) => {
                    i++;
                    // alert('已上传：' + i + '/' + length);
                    this.images.serverId.push(res.serverId);
                    // alert(this.images.serverId);
                    // alert('http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=' + accessToken + '&media_id=' + this.images.serverId);
                    // console.log('http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=' + accessToken + '&media_id=' + this.images.serverId);
                    // document.getElementById("text").appendChild(document.createElement('pre')).innerHTML = 'http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=' + accessToken + '&media_id=' + this.images.serverId;
                    socketClient.ws.send('http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=' + accessToken + '&media_id=' + this.images.serverId);
                    if (i < length) {
                        upload();
                    }
                },
                fail: function(res) {
                    // alert(JSON.stringify(res));
                }
            });
        }
        upload();
    },
    // };


    //下载图片 （支持多图下载）
    // document.querySelector('#downloadImage').onclick = function () {
    downloadImage() {
        if (this.images.serverId.length === 0) {
            // alert('请先使用 uploadImage 上传图片');
            return;
        }
        var i = 0,
            length = this.images.serverId.length;
        this.images.localId = [];

        function download() {
            wx.downloadImage({
                serverId: this.images.serverId[i],
                success: function(res) {
                    i++;
                    // alert('已下载：' + i + '/' + length);
                    this.images.downloadId.push(res.localId);
                    // alert(this.images.downloadId);
                    if (i < length) {
                        download();
                    }
                }
            });
        }
        download();
    },
    // };

    //预览图片(待编写)


    //开始语音
    // document.querySelector('#startRecord').onclick = function () {
    startRecord() {
        wx.startRecord({
            cancel: function() {
                // alert('用户拒绝授权语音');
            }
        });
    },
    // };

    //停止语音
    // document.querySelector('#stopRecord').onclick = function () {
    stopRecord() {
        wx.stopRecord({
            success: function(res) {
                this.voice.localId = res.localId;
            },
            fail: function(res) {
                // alert(JSON.stringify(res));
            }
        });
    },
    // };

    watchRecord() {
        //监听语音自动停止（到一分钟自动停止）
        wx.onVoiceRecordEnd({
            complete: function(res) {
                this.voice.localId = res.localId;
                // alert('语音时间已超过一分钟');
            }
        });
    },


    //上传语音
    // document.querySelector('#uploadVoice').onclick = function(){
    uploadVoice() {
        if (this.voice.localId == '') {
            // alert('请先上传一段语音');
            return;
        }
        wx.uploadVoice({
            localId: this.voice.localId,
            success: function(res) {
                // alert('上传语音成功');
                this.voice.serverId = res.serverId;
                // console.log('http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=' + accessToken + '&media_id=' + this.voice.serverId);
                // document.getElementById("text").appendChild(document.createElement('pre')).innerHTML = 'http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=' + accessToken + '&media_id=' + this.voice.serverId;
                // socketClient.ws.send('http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=' + accessToken + '&media_id=' + this.voice.serverId);
            }
        });
    },
    // };

    //下载语音
    // document.querySelector('#downloadVoice').onclick = function(){
    downloadVoice() {
        if (this.voice.serverId == '') {
            // alert('请先上传一段语音');
            return;
        }
        wx.downloadVoice({
            serverId: this.voice.serverId,
            success: function() {
                // alert('下载语音成功');
                this.voice.downloadId = res.localId;
            }
        });
    },
    // };

    //播放语音
    // document.querySelector('#playVoice').onclick = function(){
    playVoice() {
        if (this.voice.localId == '') {
            // alert('请先录制一段语音');
            return;
        }
        wx.playVoice({
            localId: this.voice.localId
        });
    },
    // };

    //暂停播放语音
    // document.querySelector('#pauseVoice').onclick = function(){
    pauseVoice() {
        wx.pauseVoice({
            localId: this.voice.localId
        });
    },
    // };

    //停止播放语音
    // document.querySelector('#stopVoice').onclick = function(){
    stopVoice() {
        wx.stopVoice({
            localId: this.voice.localId
        });
    },
    // };
    watchVoiceEnd() {
        //监听语音播放停止
        wx.onVoicePlayEnd({
            complete: (res) => {
                // alert('语音播放结束');
            }
        });
    },

    //2000 加入房间调用
    joinRoom(user_id, course_id) {
        // alert('请求加入房间');
        const Create_ClientHeader = new clientClass.ClientHeader();
        const Create_ClientJoinRoomReq = new clientClass.ClientJoinRoomReq();
        Create_ClientHeader.subcmd = 2000;
        Create_ClientJoinRoomReq.userid = user_id;
        Create_ClientJoinRoomReq.vcbid = course_id;
        Create_ClientHeader.data = Create_ClientJoinRoomReq;
        socketClient.ws.send(JSON.stringify(Create_ClientHeader));
        console.log("ClientJoinRoomReq");
    },
    //2010 离开房间调用
    leaveRoom(user_id, course_id) {
        // alert('离开房间');
        var Create_ClientHeader = new clientClass.ClientHeader();
        var Create_CMDUserExitRoomInfo = new clientClass.CMDUserExitRoomInfo();
        Create_ClientHeader.subcmd = 2010;
        Create_CMDUserExitRoomInfo.userid = user_id;
        Create_CMDUserExitRoomInfo.vcbid = course_id;
        Create_ClientHeader.data = Create_CMDUserExitRoomInfo;
        socketClient.ws.send(JSON.stringify(Create_ClientHeader));
        console.log("ClientleaveRoomReq");
    },

    //发送文字聊天消息调用
    sendMessage(user_id, course_id, text, msgType, extendType, mastermsgId) {
        // alert('发送文字消息');
        const timestamp = new Date();
        const Create_ClientHeader = new clientClass.ClientHeader();
        const Create_GroupMsgReq = new clientClass.GroupMsgReq();
        const Create_RoomChatMsg = new clientClass.RoomChatMsg();
        const Create_srcuser = new clientClass.UserInfoReq();
        Create_srcuser.userId = +user_id;
        // Create_srcuser.userType = +userType ;//公共直播间管理员 0 为不是 2为 管理员
        Create_RoomChatMsg.srcUser = Create_srcuser; //消息发起者
        Create_RoomChatMsg.content = text;
        Create_RoomChatMsg.msgTime = parseInt(timestamp.getTime() / 1000); //聊天时间 精确到秒
        Create_RoomChatMsg.msgTimeStr = this.format(timestamp);
        Create_RoomChatMsg.msgType = msgType || 0; ///消息类型 0文字 1图片 2语音
        Create_RoomChatMsg.extendType = extendType; //是否為重點
        Create_GroupMsgReq.groupId = +course_id; //房间id（课程id）
        if (typeof mastermsgId == 'number' || typeof mastermsgId == 'string') {
            Create_RoomChatMsg.mastermsgId = parseInt(mastermsgId);
        } //上墙
        Create_GroupMsgReq.msg = Create_RoomChatMsg; //聊天信息
        Create_ClientHeader.subcmd = 3010; //上墙 

        Create_ClientHeader.data = Create_GroupMsgReq;
        socketClient.ws.send(JSON.stringify(Create_ClientHeader));
        console.log("sendMessage");
    },

    //发送图片消息调用
    sendImagea(user_id, course_id, media_id, isPC) {
        // alert('发送图片消息');
        const timestamp = new Date();
        const Create_ClientHeader = new clientClass.ClientHeader();
        const Create_GroupMsgReq = new clientClass.GroupMsgReq();
        const Create_RoomChatMsg = new clientClass.RoomChatMsg();
        const Create_srcuser = new clientClass.UserInfoReq();
        Create_srcuser.userId = +user_id;
        Create_RoomChatMsg.srcUser = Create_srcuser; //消息发起者
        // alert(Create_RoomChatMsg.content)
        Create_RoomChatMsg.msgTime = timestamp.getTime() / 1000; //聊天时间 精确到秒
        Create_RoomChatMsg.msgTimeStr = this.format(timestamp);
        /*Create_RoomChatMsg.content = 'media_id=' + media_id;
        Create_RoomChatMsg.msgType = 1; //消息类型 0文字 1微信图片 2语音 12PC图片*/
        if (isPC) { //PC端上传
            Create_RoomChatMsg.content = media_id;
            Create_RoomChatMsg.msgType = 12; //消息类型 0文字 1微信图片 2语音 12PC图片
        } else { //微信端上传
            Create_RoomChatMsg.content = 'media_id=' + media_id;
            Create_RoomChatMsg.msgType = 1; //消息类型 0文字 1微信图片 2语音 12PC图片
        }
        Create_GroupMsgReq.groupId = +course_id; //房间id（课程id）
        Create_GroupMsgReq.msg = Create_RoomChatMsg; //聊天信息
        Create_ClientHeader.subcmd = 3010;
        Create_ClientHeader.data = Create_GroupMsgReq;
        socketClient.ws.send(JSON.stringify(Create_ClientHeader));
        console.log("sendImage");
    },
    //PC发送语音消息调用  13
    sendVoicePC(user_id, course_id, media_id, length, msgType) {

        const timestamp = new Date();
        const Create_ClientHeader = new clientClass.ClientHeader();
        const Create_GroupMsgReq = new clientClass.GroupMsgReq();
        const Create_RoomChatMsg = new clientClass.RoomChatMsg();
        const Create_srcuser = new clientClass.UserInfoReq();
        Create_srcuser.userId = user_id;
        Create_RoomChatMsg.srcUser = Create_srcuser; //消息发起者
        Create_RoomChatMsg.content = JSON.stringify({
            localpath: '',
            duration: length,
            path: media_id
        });
        Create_RoomChatMsg.mediaLength = +length;
        Create_RoomChatMsg.msgTime = timestamp.getTime() / 1000; //聊天时间 精确到秒
        Create_RoomChatMsg.msgTimeStr = this.format(timestamp); //聊天时间 精确到秒
        Create_RoomChatMsg.msgType = msgType; //消息类型  0文字 1图片 2语音  13 pc语音 12pc图片
        Create_GroupMsgReq.groupId = +course_id; //房间id（课程id）
        Create_GroupMsgReq.msg = Create_RoomChatMsg; //聊天信息
        Create_ClientHeader.subcmd = 3010;
        Create_ClientHeader.data = Create_GroupMsgReq;
        console.log(socketClient.ws)
        socketClient.ws.send(JSON.stringify(Create_ClientHeader));
        console.log("sendVoice");
    },
    //发送语音消息调用
    sendVoice(user_id, course_id, media_id, length, msgType, picmediaid, extendType) {
        const timestamp = new Date();
        const Create_ClientHeader = new clientClass.ClientHeader();
        const Create_GroupMsgReq = new clientClass.GroupMsgReq();
        const Create_RoomChatMsg = new clientClass.RoomChatMsg();
        const Create_srcuser = new clientClass.UserInfoReq();
        Create_srcuser.userId = user_id;
        Create_RoomChatMsg.srcUser = Create_srcuser; //消息发起者
        if (msgType == 16) {
            // Create_RoomChatMsg.content = JSON.stringify({ "media_id": media_id, "picmediaid": picmediaid });
            Create_RoomChatMsg.content = "media_id=" + media_id + "&&" + "picmediaid=" + picmediaid;
        } else {
            Create_RoomChatMsg.content = media_id;
        }
        Create_RoomChatMsg.extendType = extendType; //是否為重點
        Create_RoomChatMsg.mediaLength = +length;
        Create_RoomChatMsg.msgTime = parseInt(timestamp.getTime() / 1000); //聊天时间 精确到秒
        Create_RoomChatMsg.msgTimeStr = this.format(timestamp); //聊天时间 精确到秒
        Create_RoomChatMsg.msgType = msgType; //消息类型  0文字 1图片 2语音  13 pc语音 12pc图片
        Create_GroupMsgReq.groupId = +course_id; //房间id（课程id）
        Create_GroupMsgReq.msg = Create_RoomChatMsg; //聊天信息
        Create_ClientHeader.subcmd = 3010;
        Create_ClientHeader.data = Create_GroupMsgReq;
        console.log(socketClient.ws)
        socketClient.ws.send(JSON.stringify(Create_ClientHeader));
        console.log("sendVoice");
    },
    //发红包
    sendRedpacket(user_id, course_id, mode, packetNum, money, message, startTime, endTime) {
        const Create_ClientHeader = new clientClass.ClientHeader();
        const Create_CMDSendRedPacketReq = new clientClass.CMDSendRedPacketReq();
        Create_CMDSendRedPacketReq.userID = +user_id;
        Create_CMDSendRedPacketReq.groupID = +course_id;
        Create_CMDSendRedPacketReq.packetType = +mode;
        Create_CMDSendRedPacketReq.packetNum = +packetNum;
        if (mode == 5 || mode == 9) {
            Create_CMDSendRedPacketReq.packetMoney = parseFloat(money);
        } else if (mode == 6 || mode == 10) {
            Create_CMDSendRedPacketReq.perPacketMoney = parseFloat(money);
        }
        Create_CMDSendRedPacketReq.message = message;
        if (mode == 9 || mode == 10) {
            Create_CMDSendRedPacketReq.fixtime = +startTime;
            Create_CMDSendRedPacketReq.invalidTime = +endTime;
        }
        Create_ClientHeader.data = Create_CMDSendRedPacketReq;
        Create_ClientHeader.subcmd = 4000;
        socketClient.ws.send(JSON.stringify(Create_ClientHeader));
    },
    //抢红包
    takeRedpacket(user_id, course_id, packet_id, message) {
        const Create_ClientHeader = new clientClass.ClientHeader();
        const Create_CMDTakeRedPacketReq = new clientClass.CMDTakeRedPacketReq();
        Create_CMDTakeRedPacketReq.userID = +user_id;
        Create_CMDTakeRedPacketReq.groupID = +course_id;
        Create_CMDTakeRedPacketReq.packetID = +packet_id;
        Create_CMDTakeRedPacketReq.message = message;
        Create_ClientHeader.data = Create_CMDTakeRedPacketReq;
        Create_ClientHeader.subcmd = 4004;
        socketClient.ws.send(JSON.stringify(Create_ClientHeader));
    },
    //禁言调用
    forbidUserChat(user_id, course_id, status, toid) { // status 1为禁言，0为解禁
        const Create_ClientHeader = new clientClass.ClientHeader();
        const Create_ForbidUserChatReq = new clientClass.ForbidUserChatReq();
        Create_ForbidUserChatReq.userid = +user_id;
        Create_ForbidUserChatReq.toid = +toid || 0;
        Create_ForbidUserChatReq.groupid = +course_id;
        Create_ForbidUserChatReq.status = status;
        Create_ClientHeader.subcmd = 2215;
        Create_ClientHeader.data = Create_ForbidUserChatReq;
        socketClient.ws.send(JSON.stringify(Create_ClientHeader));
    },
    //结束直播调用
    overLive(user_id, course_id) {
        const Create_ClientHeader = new clientClass.ClientHeader();
        const Create_OverLiveReqReq = new clientClass.OverLiveReq();
        Create_OverLiveReqReq.userid = +user_id;
        Create_OverLiveReqReq.groupid = +course_id;
        Create_ClientHeader.subcmd = 2217;
        Create_ClientHeader.data = Create_OverLiveReqReq;
        socketClient.ws.send(JSON.stringify(Create_ClientHeader));
    },
    //请求历史消息时调用
    getMsgHis(user_id, course_id, msgId, all, allHistory, count, querytime) {
        const Create_ClientHeader = new clientClass.ClientHeader();
        const Create_GroupMsgHisReq = new clientClass.GroupMsgHisReq();
        Create_GroupMsgHisReq.userId = user_id;
        Create_GroupMsgHisReq.groupId = +course_id;
        Create_GroupMsgHisReq.forward = all;
        Create_GroupMsgHisReq.queryTime = querytime;
        Create_GroupMsgHisReq.msgId = msgId ? +msgId : 0;
        Create_GroupMsgHisReq.count = allHistory ? 0 : (count || 10);
        Create_ClientHeader.subcmd = 3016;
        Create_ClientHeader.data = Create_GroupMsgHisReq;
        socketClient.ws.send(JSON.stringify(Create_ClientHeader));
    },
    //发送聊天室文字聊天消息调用 
    sendTalkMessage(user_id, course_id, content, msgType, mastermsgId, answer_user_id) {
        // alert('发送聊天室文字消息');
        const timestamp = new Date().getTime() / 1000;
        const Create_ClientHeader = new clientClass.ClientHeader();
        const Create_GroupMsgReq = new clientClass.GroupMsgReq();
        const Create_RoomChatMsg = new clientClass.RoomChatMsg();
        const Create_srcuser = new clientClass.UserInfoReq();
        Create_srcuser.userId = +user_id;
        const Create_dstuser = new clientClass.UserInfoReq();
        if (typeof answer_user_id == 'number') {
            Create_dstuser.userId = answer_user_id;
        } else {
            Create_dstuser.userId = 1;
        }
        Create_RoomChatMsg.srcUser = Create_srcuser; //消息发起者
        Create_RoomChatMsg.dstUser = Create_dstuser
        Create_RoomChatMsg.content = content;
        Create_RoomChatMsg.msgTime = parseInt(timestamp); //聊天时间 精确到秒
        Create_RoomChatMsg.msgType = msgType || 0; //消息类型  0文字
        if (typeof mastermsgId == 'number' || typeof mastermsgId == 'string') {
            Create_RoomChatMsg.mastermsgId = parseInt(mastermsgId);
        }
        Create_GroupMsgReq.groupId = +course_id; //房间id（课程id）
        Create_GroupMsgReq.msg = Create_RoomChatMsg; //聊天信息
        Create_ClientHeader.subcmd = 3020;
        Create_ClientHeader.data = Create_GroupMsgReq;
        socketClient.ws.send(JSON.stringify(Create_ClientHeader));
        console.log("sendTalkMessage");
    },
    //请求聊天室历史消息时调用
    getTalkMsgHis(user_id, course_id, msgId) {
        const Create_ClientHeader = new clientClass.ClientHeader();
        const Create_GroupMsgHisReq = new clientClass.GroupMsgHisReq();
        Create_GroupMsgHisReq.userId = +user_id;
        Create_GroupMsgHisReq.groupId = +course_id;
        Create_GroupMsgHisReq.forward = true;
        Create_GroupMsgHisReq.msgId = msgId ? +msgId : 0;
        Create_GroupMsgHisReq.count = 20;
        Create_ClientHeader.subcmd = 3026;
        Create_ClientHeader.data = Create_GroupMsgHisReq;
        console.log("Create_getTalkMsgHis");
        socketClient.ws.send(JSON.stringify(Create_ClientHeader));
    },
    //请求下一条未读消息请求
    NextReadMsg(userId, roomId, msgId) {
        const Create_ClientHeader = new clientClass.ClientHeader();
        const Create_GroupMsgHisReq = new clientClass.GroupMsgHisReq();
        Create_GroupMsgHisReq.userId = +userId;
        Create_GroupMsgHisReq.roomId = +roomId;
        Create_GroupMsgHisReq.msgId = msgId ? +msgId : 0;
        Create_ClientHeader.subcmd = 3056;
        Create_ClientHeader.data = Create_GroupMsgHisReq;
        console.log("Create_getTalkMsgHis");
        socketClient.ws.send(JSON.stringify(Create_ClientHeader));
    },

    format(obj) {
        function f(num) {
            return num > 9 ? num + '' : '0' + num
        }
        return obj.getFullYear() + '-' + f(obj.getMonth() + 1) + '-' + f(obj.getDate()) + ' ' + f(obj.getHours()) + ':' + f(obj.getMinutes()) + ':' + f(obj.getSeconds())
    }
}