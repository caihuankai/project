import clientClass from './clientClass.js'
import socketClient from './socketClient.js'
const subcmd = {};
subcmd[3] = pingRes;
subcmd[2002] = onLogin; //登录房间成功
subcmd[2006] = addUserListInfo;
subcmd[2008] = addUserInfo;
subcmd[2009] = onRoomPubMicState; //麦状态
subcmd[2012] = RoomUserExitNoty; //用户离开房间
subcmd[2015] = RoomKickoutUserNoty; //用户踢出房间
subcmd[2018] = vChatNotify; //聊天信息、喝彩
// subcmd[2028] = addRoomNoticeinfo;  //弃用
subcmd[2022] = TradeGiftRecord; //赠送礼物通知
subcmd[2029] = RoomOPStatusNotify; //设置公聊状态
subcmd[2033] = SetMicStateNotify; //下麦
subcmd[2052] = ForbidUserChatNotify;
subcmd[2085] = RoborTeacherIdNoty;
subcmd[2093] = RoomAndSubRoomIdNotify; //上麦
subcmd[2096] = RoomUserExitNoty; //用户退出
subcmd[2141] = AskQuestionResp; //提问回应
subcmd[2145] = TeacherGiftListResp; //加载贡献周榜
subcmd[2146] = HistoricalRecordHeader; //加载历史战绩
subcmd[2148] = VipUserNoty; //用户VIP信息
subcmd[2150] = RoomNoticeInfoNotify; //欢迎词
subcmd[2166] = VIPCourseStateNoty; //VIP课程状态变更通知
// subcmd[3011] = VoiceSendSuccsee //语音消息发送成功
// subcmd[3012] = ReturnVoice //接收到语音消息
subcmd[21016] = VisitorUserLogonErr; //用户登录失败
subcmd[21017] = VisitorUserLogonSuccess; //用户登录成功
subcmd[26004] = HandOutUpDate; //添加讲义
subcmd[26008] = NoticeMsgNoty; //房间公告、微博推送等
subcmd[3017] = HisMessage; //接收历史消息
subcmd[370] = function () {} //

subcmd[5] = ErrCodeResp; //错误应答

subcmd[2001] = onErrorMsg;

export default subcmd
var html_fz = {}; //房主
var html_zb = {}; // 转播员
var html_yyh = {}; //运营号
var html_gl = {}; // 管理
var html_js = {}; // 讲师
var html_tyh = {}; //体验号
var html_regUser = {}; //注册用户
var html_user = {}; // 游客
var html_zl = {}; //助理
var html_kf = {}; //客服
var html_other = {}; //其他
var html_all = {}; //全部

var classList, micUerid = 0;

function onLogin(data) { //2002
    var header = new clientClass.ClientHeader();
    // header.data = new AfterJoinRoomReq();
    header.length = 18;
    header.subcmd = 2136;
    header.maincmd = 105;
    header.data.userid = data.userid;
    header.data.vcbid = data.vcbid;
    // $(".user_nk").html(Number(data.nk) / 1000);
    socketClient.ws.send(JSON.stringify(header));
    // html_all["user" + userid] = data;
    console.log(data)
};

function addUserListInfo(data) { //2006
    delete data["count"];
    for (var obj in data) {
        addUserInfo(data[obj]);
    }
    InfoRoomAccord(roomid);
};

function onRoomPubMicState(data) { //2009
    // var data = data[1];
    // $("#userList li").removeClass("on");
    // if (data.userid > 0) {
    //     micUerid = data.userid;
    //     $("#user" + micUerid).addClass("on");
};


function RoomUserExitNoty(data) { //2012  2096
    $("#user" + data.userid).remove();
    delete html_all["user" + data.userid];
    $("#onlineNum").html("（" + getArrayCount(html_all) + "）");
};

function RoomKickoutUserNoty(data) { //2015
    if (userid == data.toid) {
        $("#live-content-video").html("");
        alert("该账号已经登陆");
    }
    $("#user" + data.toid).remove();
    delete html_all["user" + data.toid];
    $("#onlineNum").html("（" + getArrayCount(html_all) + "）");
};


var chatList = {};

// chatList.public = '<div class="one-chat"><div class="one-title"><div style="background-image:url({3})" class="name">我：</div><div class="to">对</div><div class="name clickName" userid="{0}">{1}</div></div><div class="one-content"><span>{2}</span></div></div>';


chatList.public = '<div class="one-chat"><div class="one-title"><div class="name clickName" style="background-image:url({0})" userid="{1}" onclick="locateUser({1})">{2}：</div></div><div class="one-content"><span>{3}</span></div></div>';

chatList.private = '<div class="one-chat"><div class="one-title"><div class="name clickName" style="background-image:url({0})" userid="{1}" onclick="locateUser({1})">{2}：</div><div class="to">对</div><div class="name clickName" style="background-image:url({3})" userid="{4}">{5}</div></div><div class="one-content"><span>{6}</span></div></div>';

function vChatNotify(data) { //2018

    var srcalias = "我",
        toalias;
    if (data.srcid == userid) {
        srcalias = "我";
    } else {
        srcalias = data.srcalias
    }
    var srcviplevel = getHeadaddr(data.srcuserlevel);
    var toviplevel = getHeadaddr(data.touserlevel);
    if (data.toid == userid) {
        toalias = "我";
    } else {
        toalias = data.toalias;
    }
    var content = SetContentImg(data.content);
    // var content = control.
    (data.content);
    if (data.msgtype == 0) { //公聊
        // chat.rePrompt(0, chat.rePromptNb);
        //过滤3S内同用户同信息
        var res = data.srcid + '&&' + content;
        if ((res != '' && last_msg != '') && res == last_msg) {
            //不发送
        } else {
            last_msg = res;
            $("#public-chat").append($.format(chatList.public, srcviplevel, data.srcid, srcalias, content));
            $(".public-chat-null").hide();
            //调用聊天滚动条到底
            control.scrollLow(0);
        }

    } else if (data.msgtype == 15 || data.msgtype == 1) { //私聊
        // chat.rePrompt(1, chat.rePromptNb);
        $("#private-chat").append($.format(chatList.private, srcviplevel, data.srcid, srcalias, toviplevel, data.toid, toalias, content));
        $(".private-chat-null").hide();
        //调用聊天滚动条到底
        control.scrollLow(1);
    }
};

//点击聊天区用户昵称定位用户
function locateUser(userid) {
    var userPlaceSUB = 0;
    var totalHeight = parseInt($("#userList li").height() + 14);

    if ($("#user" + userid).length > 0) {
        $("#user" + userid).addClass("current-contextmenu").siblings().removeClass("current-contextmenu");
        $("#userList li.current-contextmenu").each(function (index, element) {
            userPlaceSUB = $(this).index();
        });
        //滚动条定位用户位置
        $(".sidebar-top-list").scrollTop(totalHeight * userPlaceSUB, 0);
    }
}

function SetMicStateNotify(data) { //2033
    if (roomid == data.vcbid) {
        $("#userList li").removeClass("on");
        $("#live-content-video").html("");
        if (data.micstate == 0) {} else if (data.micstate == 1) {
            var mdata = [];
            mdata[1] = function () {
                this.userid = 0;
            }
            mdata[1].userid = data.toid;
            onRoomPubMicState(mdata);
        }
    }
};

function RoborTeacherIdNoty(data) { //2085
    for (var p in data) {
        html_all["user" + data[p].roborid].useralias = data[p].teacheralias;
        if (micUerid == data[p].roborid) {
            $("user" + data[p].roborid).addClass("on");
        }
        $("#user" + data[p].roborid + " .name").html(data[p].teacheralias);
    }
};

function RoomAndSubRoomIdNotify(data) {
    if (isvip == 1) {
        if (html_all['user' + userid].userviplevel >= 1 && html_all['user' + userid].userviplevel >= vipsortid) {
            setVideo(roomid, "");
        } else {
            $("#live-content-video").html("");
            noOpenVip();
        }
    } else {
        setVideo(roomid, "");
    }
};

function onErrorMsg(data) {
    if (data.errid == 201) {
        layer.prompt({
            title: '请输入房间密码，并确认',
            formType: 1 //prompt风格，支持0-2
        }, function (pass) {
            const JoinRoomReq = new clientClass.ClientHeader();
            JoinRoomReq.data = new clientClass.ClientJoinRoomReq();
            JoinRoomReq.maincmd = 105;
            JoinRoomReq.subcmd = 2000;
            JoinRoomReq.length = 293;
            JoinRoomReq.data.userid = userid;
            JoinRoomReq.data.vcbid = roomid;
            JoinRoomReq.data.cuserpwd = cuserpwd;
            JoinRoomReq.data.cMacAddr = mac;
            JoinRoomReq.data.croompwd = pass;
            console.log(JSON.stringify(JoinRoomReq));
            socketClient.ws.send(JSON.stringify(JoinRoomReq));
            layer.closeAll();
        });
    } else {

    }
};

var userStr = '<li id="{0}" class="{5}" sort_flag="{6}"><a href="javascript:;" class="clickName" userid="{4}"><i><img src="{1}"></i><span>{2}</span><img src="{3}"></a></li>';
//成员列表
function addUserInfo(obj) {
    console.log(obj);
    if (obj.userlevel < 2) obj.useralias = obj.useralias + obj.userid.toString().substr(6, 4);
    html_all["user" + obj.userid] = obj;
    if ($("#user" + obj.userid)) {
        $("#user" + obj.userid).remove();
    }

    if (obj.userstate == 1) {
        if (isvip == 1) {
            if (html_all['user' + userid].userviplevel >= 1 && html_all['user' + userid].userviplevel >= vipsortid) {
                setVideo(roomid, "");
            } else {
                $("#live-content-video").html("");
                noOpenVip();
            }
        } else {
            setVideo(roomid, "");
        }
    }

    var chead = obj.chead;
    if (chead == "") {
        chead = USER_HEAD_ADD;
    }
    levelimg = getHeadaddr(obj.userlevel);

    if (obj.userlevel == 2) {
        switch (obj.userviplevel) {
            case 2:
                levelimg = "/images/live/identityIcon/identityIcon11.png";
                break;
            case 1:
                levelimg = "/images/live/identityIcon/identityIcon10.png";
                break;
        }
    }


    if (obj.isTopList == 5) {
        $('#userList').prepend($.format(userStr, "user" + obj.userid, PIC_DOMAIN + chead, obj.useralias, HOME_DOMAIN + levelimg, obj.userid, obj.userlevel, obj.userlevel));
    } else {
        $('#userList').append($.format(userStr, "user" + obj.userid, PIC_DOMAIN + chead, obj.useralias, HOME_DOMAIN + levelimg, obj.userid, obj.userlevel, obj.userlevel));
    }
    var tem_count = getArrayCount(html_all);
    $("#onlineNum").html("（" + tem_count + "）");
    if (obj.bforbidchat == 1 && html_all['user' + userid].userlevel > 2) {
        addShutupIcon(obj.userid);
    }

    /*用户列表右键菜单*/
    //获取操作的用户id
    var contextMenuUserId = null;
    $('.sidebar-top-list li a').contextmenu(function () {
        contextMenuUserId = $(this).attr("userid");
        $(this).parent().addClass("current-contextmenu").siblings().removeClass("current-contextmenu");
    });

    $('.sidebar-top-list li a').click(function () {
        $(this).parent().addClass("current-contextmenu").siblings().removeClass("current-contextmenu");
    });

    var options = {
        items: [{
                text: '24小时禁言',
                onclick: function () {
                    ForbidUserChat(86400, Number(contextMenuUserId), 1);
                    // console.log(contextMenuUserId);
                    console.log("24小时禁言");
                }
            },
            {
                text: '永久禁言',
                onclick: function () {
                    ForbidUserChat(0, Number(contextMenuUserId), 1);
                    // console.log(contextMenuUserId)
                    console.log("永久禁言");
                }
            },
            {
                text: '解除禁言',
                onclick: function () {
                    ForbidUserChat(0, Number(contextMenuUserId), 0);
                    // console.log(contextMenuUserId)
                    console.log("解除禁言");
                }
            }
        ]
    }

    if (typeof (html_all["user" + userid]) == "undefined") html_all["user" + userid] = 0;
    if (typeof (html_all["user" + userid].userlevel) == "undefined") html_all["user" + userid].userlevel = 0;

    if (html_all["user" + userid].userlevel >= 3) {
        $('.sidebar-top-list li').not("#user" + userid).contextify(options);
    }
    /*用户列表右键菜单 end*/

    //规则排序
    Listsort();

    //绑定设置私聊对象
    control.setPrivateObject();
};

/*
 * 产生n个随机数函数
 * @param int type 生产方式[0包含字母，1不包含字母]
 * @return int res
 * */
function generateMixed(n, type) {
    var chars = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
    var chars1 = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
    var res = "";
    for (var i = 0; i < n; i++) {
        if (type == 0) {
            var id = Math.ceil(Math.random() * 35);
            res += chars[id];
        } else {
            var id = Math.floor(Math.random() * 10);
            res += chars1[id];
        }
    }
    return res;
}

function getHeadaddr(userlevel) {
    var levelimg;
    switch (userlevel) {
        case 8:
            levelimg = "/images/live/identityIcon/identityIcon1.png";
            break;
        case 7:
            levelimg = "/images/live/identityIcon/identityIcon3.png";
            break;
        case 6:
            levelimg = "/images/live/identityIcon/identityIcon5.png";
            break;
        case 5:
            levelimg = "/images/live/identityIcon/identityIcon3.png";
            break;
        case 4:
            levelimg = "/images/live/identityIcon/identityIcon4.png";
            break;
        case 3:
            levelimg = "/images/live/identityIcon/identityIcon9.png";
            break;
        case 2:
            levelimg = "/images/live/identityIcon/identityIcon8.png";
            break;
        case 1:
            levelimg = "/images/live/identityIcon/identityIcon7.png";
            break;
        default:
            levelimg = "/images/live/identityIcon/identityIcon7.png";
            break;
    }
    return levelimg;
}

function pingRes(data) {

};


$.format = function (source, params) {

    if (arguments.length == 1)
        return function () {
            var args = $.makeArray(arguments);
            args.unshift(source);
            return $.format.apply(this, args);
        };
    if (arguments.length > 2 && params.constructor != Array) {
        params = $.makeArray(arguments).slice(1);
    }
    if (params.constructor != Array) {
        params = [params];
    }
    $.each(params, function (i, n) {
        source = source.replace(new RegExp("\\{" + i + "\\}", "g"), n);
    });

    return source;
};

function SetContentImg(content) {
    var id = -1;
    var old = "";
    while (true) {
        id = content.indexOf("[$");

        if (id == -1)
            break;
        old = content.substring(id + 2, content.indexOf("$]"));
        content = content.replace("[$" + old + "$]", "<img src=\"/images/live/Face/" + old + ".gif\" />");
    }
    return content;
}

/**
 * @method 获取时间
 * return 返回当前时间  格式 hh:mm:ss
 */
function getNowFormatDate(time) {
    var date = new Date();
    date.setTime(time * 1000);
    var seperator1 = ":";
    var year = date.getFullYear();
    var month = date.getMonth() + 1;
    var strDate = date.getDate();
    var hour = date.getHours();
    var minutes = date.getMinutes();
    var seconds = date.getSeconds();

    if (month >= 1 && month <= 9) {
        month = "0" + month;
    }
    if (strDate >= 0 && strDate <= 9) {
        strDate = "0" + strDate;
    }
    if (hour >= 0 && hour <= 9) {
        hour = "0" + hour;
    }
    if (minutes >= 0 && minutes <= 9) {
        minutes = "0" + minutes;
    }
    if (seconds >= 0 && seconds <= 9) {
        seconds = "0" + seconds;
    }
    var currentdate = hour + seperator1 + minutes;
    return currentdate;
}

/**
 * @method 上麦，加载flash
 * @param {Number} _roomid 转播房间id
 * @param {string} _teacher_name 讲师名
 */
function setVideo(_roomid, _teacher_name) {
    var isIE = !!ActiveXObject;
    var isIE6 = isIE && !XMLHttpRequest;
    var isIE8 = isIE && !!document.documentMode;
    var isIE7 = isIE && !isIE6 && !isIE8;

    if (isLive) {

    } else {

    }
    // var flashvars = {
    //     f: '/lib/ckplayer/m3u8.swf',
    //     a: 'http://pull.dks.dacelue.com.cn/live/'+_roomid+'/playlist.m3u8',
    //     c: 0,       //调用 ckplayer.js 配置播放器
    //     p: 1,       //自动播放视频
    //     s: 4,       //flash插件形式发送视频流地址给播放器进行播放
    //     lv: 1,      //注意，如果是直播，需设置lv:1
    //     i: '/lib/ckplayer/video-area-content-object-bg.png'
    // }
    //
    // var params = {bgcolor: '#FFF', allowFullScreen: true, allowScriptAccess: 'always', wmode: 'transparent'};
    // var support = ['all'];
    // CKobject.embed('/lib/ckplayer/ckplayer.swf', 'live-content-video', 'ckplayer_a1', '100%', '440', false, flashvars, params, support);



    var rtmpip = "pull.99ducaijing.cn"; //正式
    if (isIE) {
        var obj = '<OBJECT id="wblive" name="wblive" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="800" align="middle" height="440">' +
            '<PARAM name="movie" value="/static/Components/wbliveo_a.swf" /><PARAM name="quality" value="high" /><PARAM name="bgcolor" value="#ffffff" /><PARAM name="allowscriptaccess" value="always" /><PARAM name="allowfullscreen" value="true" /><PARAM name="hasPriority" value="true" /><PARAM name="wmode" value="Opaque" /><PARAM name="swliveconnect" value="true" />' +
            '<PARAM name="flashvars" value="teacher=0&kid=' + _roomid + '&subid=' + roomid + '&ui1=1&rtmpip=' + RTMPIP + '&kname=' + roomName + '&teachername=' + _teacher_name + '" /></OBJECT>';
        document.getElementById("live-content-video").innerHTML = obj;
    } else {
        var obj = "<object id=\"wblive\" name=\"wblive\" align=\"middle\" width=\"800\" height=\"440\" type=\"application/x-shockwave-flash\" data=\"/static/Components/wbliveo.swf\">" +
            "<param name=\"quality\" value=\"high\"><param name=\"bgcolor\" value=\"#ffffff\">" +
            "<param name=\"allowscriptaccess\" value=\"always\">" +
            "<param name=\"allowfullscreen\" value=\"true\">" +
            "<param name=\"hasPriority\" value=\"true\">" +
            "<param name=\"wmode\" value=\"Opaque\">" +
            "<param name=\"swliveconnect\" value=\"true\">" +
            "<param name=\"flashvars\" value=\"teacher=0&kid=" + _roomid + "&subid=" + roomid + "&ui1=1&rtmpip=" + RTMPIP + "&kname=" + roomName + "&teachername=" + _teacher_name + "\">" +
            "</object>";

        document.getElementById("live-content-video").innerHTML = obj;
    }
};


function getArrayCount(o) {
    var t = typeof o;
    if (t == 'string') {
        return o.length;
    } else if (t == 'object') {
        var n = 0;
        for (var i in o) {
            n++;
        }
        return n;
    }
    return false;
};

function VisitorUserLogonSuccess(data) {
    userid = data.userid;
    // html_all["user" + userid] = data;
    // setping = setInterval("sendPingClient()", 30000);
    // sendJoinRoom();
    alert(userid + '登录成功');
};

function VisitorUserLogonErr(data) {

};

/**
 * 加载贡献周榜
 */
function TeacherGiftListResp(data) {};

/**
 * 加载历史战绩
 */
function HistoricalRecordHeader(data) {};
/**
 * 添加讲义
 */
function HandOutUpDate(data) {};

/**
 * 欢迎词
 */
function RoomNoticeInfoNotify(data) { //2150
    var srcviplevel = "/images/live/identityIcon/identityIcon1.png";
    var srcid = data.userid;
    var srcalias = data.useralias;
    if (data.index == 2) {
        $("#public-chat").append($.format(chatList.public, srcviplevel, srcid, srcalias, data.content));
        $("#public-chat a").attr("target", "_blank");
        $(".public-chat-null").hide();
        control.scrollLow(0);
    }

};

/**
 * 赠送礼物通知
 * 2022
 */
function TradeGiftRecord(data) {

};

function ErrCodeResp(data) {
    if (data.errcode == 0) {
        switch (data.errsubcmd) {
            case 2147:
                SuccessAskOpp();
                break;
        }
    }
};

/**
 * 用户VIP信息
 * 2148
 */
function VipUserNoty(data) {};


function getTeacherInfo() {
    $.ajax({
        type: "POST",
        url: "/Expand/getTeacher",
        dataType: "json",
        data: {
            platform_id: platform_id
        },
        success: function (data) {
            if (data.code == 0) {
                var data = data.data;
                if (data == undefined || data == "") {

                } else {
                    $("#teacherName").html(data.expandTeacher);
                    $("#teacherBrief").html(data.teacherIntro);
                    $("#teacherWx").attr("src", data.QRCode);
                }
            }
        }
    });
};


//计算字符长度，一个中文等于两个英文字符
function strlen(str) {
    var len = 0;
    for (var i = 0; i < str.length; i++) {
        var c = str.charCodeAt(i);
        //单字节加1
        if ((c >= 0x0001 && c <= 0x007e) || (0xff60 <= c && c <= 0xff9f)) {
            len++;
        } else {
            len += 3; //2 - GBK形式，3 - UTF-8形式
        }
    }
    return len;
};


function AskQuestionResp() {

};

function getNotice() {
    $.ajax({
        type: "POST",
        url: "/Live/getNotice",
        dataType: "json",
        data: {
            platform_id: platform_id,
            roomid: roomid
        },
        success: function (data) {
            if (data.code == 0) {
                var data = data.data;
                for (var i = 0; i < data.length; i++) {
                    var entity = data[i];
                    var html = '<a target="_blank" class="hiSlider-item"';
                    if (entity.imageLink == "") {
                        html += ' href="javascript:;" ';
                    } else {
                        html += ' href="' + entity.imageLink + '" ';
                    }
                    if (entity.image != "") {
                        html += ' style="background-image:url(' + PIC_DOMAIN + entity.image + ')" ';
                    }
                    html += ' data-title="' + entity.notice + '"></a>';
                    $("#NoticeList").append(html);
                }
                //公告幻灯片
                $('.hiSlider1').hiSlider({
                    isFlexible: true,
                    mode: 'fade',
                    isSupportTouch: false,
                    isShowTitle: true,
                    isShowPage: false,
                    titleAttr: function (curIdx) {
                        var title = $(this).attr('data-title');
                        if (title == undefined) {
                            title = "";
                        }
                        $(".announcement-title").html("<span>公告  </span>" + title);
                    }

                });

            }
        }
    });

    $.ajax({
        type: "POST",
        url: "/Live/getNotice",
        dataType: "json",
        data: {
            platform_id: platform_id,
            roomid: roomid
        },
        success: function (data) {
            if (data.code == 0) {
                var data = data.data;
                for (var i = 0; i < data.length; i++) {
                    var entity = data[i];
                    var html = '<a target="_blank" class="hiSlider-item"';
                    if (entity.imageLink == "") {
                        html += ' href="javascript:;" ';
                    } else {
                        html += ' href="' + entity.imageLink + '" ';
                    }
                    if (entity.image != "") {
                        html += ' style="background-image:url(' + PIC_DOMAIN + entity.image + ')" ';
                    }
                    html += ' data-title="' + entity.notice + '"></a>';
                    $("#NoticeList").append(html);
                }
                //公告幻灯片
                $('.hiSlider1').hiSlider({
                    isFlexible: true,
                    mode: 'fade',
                    isSupportTouch: false,
                    isShowTitle: true,
                    isShowPage: false,
                    titleAttr: function (curIdx) {
                        var title = $(this).attr('data-title');
                        if (title == undefined) {
                            title = "";
                        }
                        $(".announcement-title").html("<span>公告  </span>" + title);
                    }

                });

            }
        }
    });
}


var DataMetaMinid = 0;

function getRoomWeiboList(start) {
    $.ajax({
        type: "GET",
        url: "/weibolive/getRoomWeiboList",
        dataType: "json",
        data: {
            start: start,
            roomid: roomid
        },
        success: function (data) {
            if (data.code == 0) {
                DataMetaMinid = data.data.DataMeta.minid;
                var data = data.data.DataList;
                $("#RoomWeiboList").html("");
                for (var i = 0; i < data.length; i++) {
                    var entity = data[i];
                    var html = "";
                    html = '<div class="expert-opinion-one"><div class="expert-opinion-one-title"><div class="expert-opinion-one-title-icon"></div><div class="expert-opinion-one-title-avatar"><img src="' + entity.User_HeadImg + '" alt="' + entity.User_DisplayName + '"></div><div class="expert-opinion-one-title-right"><div class="expert-opinion-one-title-name">' + entity.User_DisplayName + '</div><div class="expert-opinion-one-title-date">' + entity.Weibo_Ctime + '</div></div></div><div class="expert-opinion-one-content">' + entity.Weibo_Content + '</div></div>';
                    $("#RoomWeiboList").append(html);
                }

                //设置图片点击放大查看功能
                $("#RoomWeiboList a[rel^='lightbox']").picbox({ /* Put custom options here */ }, null, function (el) {
                    return (this == el) || ((this.rel.length > 8) && (this.rel == el.rel));
                });
                var news = $(".tab-content-box-1 .expert-opinion-one-title-icon");
                news.eq(0).css("background-image", "url(/images/live/expert-opinion-one-title-icon.gif)");
                setTimeout(function () {
                    news.css("background-image", "url(/images/live/expert-opinion-one-title-icon2.png)");
                    news.eq(0).css("background-image", "url(/images/live/expert-opinion-one-title-icon3.png)");
                    news.eq(0).css("background-image", "url(/images/live/expert-opinion-one-title-icon3.png)");
                }, 3000);
            }
        }
    });
};

/*每10S查看是否有新观点*/
function getRoomWeiboList10(start) {
    $.ajax({
        type: "GET",
        url: "/weibolive/getRoomWeiboList",
        dataType: "json",
        data: {
            start: start,
            roomid: roomid
        },
        success: function (data) {
            if (data.code == 0) {
                DataMetaMinid = data.data.DataMeta.minid;
                var data = data.data.DataList;
                $("#RoomWeiboList").html("");

                //1.是否有新观点,有则刷新
                if (data.length != $("#RoomWeiboList").children('div').length) {

                    for (var i = 0; i < data.length; i++) {
                        var entity = data[i];
                        var html = "";
                        html = '<div class="expert-opinion-one"><div class="expert-opinion-one-title"><div class="expert-opinion-one-title-icon"></div><div class="expert-opinion-one-title-avatar"><img src="' + entity.User_HeadImg + '" alt="' + entity.User_DisplayName + '"></div><div class="expert-opinion-one-title-right"><div class="expert-opinion-one-title-name">' + entity.User_DisplayName + '</div><div class="expert-opinion-one-title-date">' + entity.Weibo_Ctime + '</div></div></div><div class="expert-opinion-one-content">' + entity.Weibo_Content + '</div></div>';
                        $("#RoomWeiboList").append(html);
                    }

                    //设置图片点击放大查看功能
                    $("#RoomWeiboList a[rel^='lightbox']").picbox({ /* Put custom options here */ }, null, function (el) {
                        return (this == el) || ((this.rel.length > 8) && (this.rel == el.rel));
                    });
                    var news = $(".tab-content-box-1 .expert-opinion-one-title-icon");
                    news.eq(0).css("background-image", "url(/images/live/expert-opinion-one-title-icon.gif)");
                    setTimeout(function () {
                        news.css("background-image", "url(/images/live/expert-opinion-one-title-icon2.png)");
                        news.eq(0).css("background-image", "url(/images/live/expert-opinion-one-title-icon3.png)");
                        news.eq(0).css("background-image", "url(/images/live/expert-opinion-one-title-icon3.png)");
                    }, 3000);

                }
            }
        }
    });
};

var isvip = 0;
var vipsortid = 0;
/**
 * VIP课程状态变更通知
 */
function VIPCourseStateNoty(data) {

    var begintime = new Date(data.begintime);
    var endtime = new Date(data.endtime);
    if (data.coursestate == 3) {
        isvip = data.isvip;
        vipsortid = data.sortid;
        $("#videoTime").html("时间：" + getNowFormatDate(data.begintime) + "-" + getNowFormatDate(data.endtime));
        $("#videoTitle").html("主题： " + data.title);
        $("#videoTeacher").html("主讲：" + data.teachername);

        if (isvip == 1) {
            if (html_all['user' + userid].userviplevel >= 1 && html_all['user' + userid].userviplevel >= vipsortid) {
                setVideo(roomid, "");
            } else {
                $("#live-content-video").html("");
                noOpenVip();
            }
        } else {
            setVideo(roomid, "");
        }

    } else if (data.coursestate == 4) {
        isvip = 0;
        vipsortid = 0;
        $("#videoTime").html("时间：");
        $("#videoTitle").html("主题： ");
        $("#videoTeacher").html("主讲：");
        setVideo(roomid, "");
    }
    // else if (data.coursestate == 2) {
    //     $("#videoTime").html("时间：" + getNowFormatDate(data.begintime) + "-" + getNowFormatDate(data.endtime));
    //     $("#videoTitle").html("主题： " + data.title);
    //     $("#videoTeacher").html("主讲：" + data.teachername);
    // }
    //1.弹窗提示，并刷新页面
    if (CourseTimer >= 1) {
        layer.confirm('课程更新了!', {
            btn: ['明白了']
        }, function () {
            layer.msg('自动更新中...', {
                icon: 1
            });
            location.reload();
        });
    } else {
        CourseTimer++;
    }
};

function NoticeMsgNoty(data) {
    console.log(data);
    var msg = JSON.parse(data.json);
    console.log(msg);
    if (msg.msgtype == "weibotip") {
        getRoomWeiboList(0);

    }
}

function InfoRoomAccord(roomid) {
    //进入弹出协议签署 2017.4.6
    if (g_have_login === 'true') {
        $.ajax({
            type: "GET",
            url: "/ratifyAccord/intoRoomAccord",
            dataType: "json",
            data: {
                roomid: roomid
            },
            success: function (str) {
                var str = str.data;
                if (str == 0) {
                    layer.open({
                        type: 2,
                        title: false,
                        closeBtn: false,
                        shadeClose: false,
                        scrollbar: true,
                        area: ['473px', '300px'],
                        anim: 2,
                        content: ['/RatifyAccord/roomindex', 'no']
                    });
                }
            }
        });
    }
}

var noOpenVipIndex;

function noOpenVip() {
    if (noOpenVipIndex == undefined) {
        noOpenVipIndex = layer.open({
            type: 1,
            title: false,
            closeBtn: false,
            skin: 'hint-window',
            area: ['416px', '240px'],
            content: $("#cancelOrder"),
            style: {
                "z-index": 99
            },
            btn: ["我是会员", "立即开通"],
            btn1: function (index) {
                if (g_have_login == "false") {
                    login();
                } else {

                }
                layer.close(index);
            },
            btn2: function (index) {
                if (g_have_login == "false") {
                    login();
                } else {
                    open("/Vip/index?platform_id=" + platform_id);
                }
                layer.close(index);
            }
        });
        $(".hint-window .iconfont-close").click(function () {
            layer.close(noOpenVipIndex);
            noOpenVipIndex = undefined;
        });
    }
}

/**
 * 2052 //禁言用户广播
 * @constructor
 */
function ForbidUserChatNotify(data) {
    var start = data.action; //---0是解禁  ---1是禁言
    var touserid = data.toid; //被禁言人user_id
    if (start == 1) {
        if ($("#userList li#user" + touserid + " a img.forbid").length < 1) {
            $("#userList li#user" + touserid + " a").append('<img class="forbid" style="margin-left:5px;" src="/images/live/identityIcon/identityIcon0.png">');
        }
    } else if (start == 0) {
        if ($("#userList li#user" + touserid + " a img.forbid").length >= 1) {
            $("#userList li#user" + touserid + " a img.forbid").remove();
        }
    }
}
//添加禁言图标
function addShutupIcon(userid) {
    if ($("#userList li#user" + userid + " a img.forbid").length < 1) {
        $("#userList li#user" + userid + " a").append('<img class="forbid" style="margin-left:5px;" src="/images/live/identityIcon/identityIcon0.png">');
    }
}

function ForbidUserChat(time, toid, action) {
    var header = new ClientHeader();
    header.data = new ForbidUserChatReq();
    header.length = 43;
    header.subcmd = 2051;
    header.maincmd = 105;
    header.data.srcid = userid;
    header.data.vcbid = roomid;
    header.data.toid = toid;
    header.data.ttime = time;
    header.data.action = action;
    socketClient.ws.send(JSON.stringify(header));
}

/**
 * 设置公聊（2029）
 * @param data
 * @constructor
 */
function RoomOPStatusNotify(data) {
    var opstate = data.opstate; //1--禁止公聊，0--取消禁止
}




function getRoomsId() {
    var url = 'http://www.djc688.com/live/getRelayInfo';

    $.ajax({
        type: "GET",
        url: url,
        dataType: "jsonp",
        data: {},
        success: function (data) {
            if (data.data.option == 'on') {
                if (data.data.status == 'on') {
                    if (roomid == 50010 || roomid == 50006 || roomid == 50011 || roomid == 50001) {
                        relayRoomid = roomid;
                    } else {
                        relayRoomid = data.data.nvcbid;
                    }
                    // Camouflage([], 'getInit');
                    getTeacherInfoNew(relayRoomid);
                    setVideo(relayRoomid);
                    //转播主讲信息获取
                    if (roomid && relayRoomid > 0 && roomid != relayRoomid) {
                        getLiveInfo();
                    }
                    //REDIS接口记录伪装用户
                    // if(data.data.nvcbid == roomid){

                    //1.初始化代发设置
                    // var initArr = new Array();
                    // setInterval(function () {
                    //     var tmp = 0;
                    //     for (var i in html_all) {
                    //         if(html_all[i]['userlevel'] == 1){
                    //             initArr = [
                    //                 roomid,
                    //                 html_all[i]['userid'],
                    //                 html_all[i]['useralias'],
                    //             ];
                    //             break;
                    //         }
                    //     }
                    //     Camouflage(initArr, 'init',[]);
                    // },20000);
                    // }
                }
            }
        }
    });

}

function Camouflage(initArr, type, msgdata) {
    if (type == 'init') var data = {
        "roomid": initArr[0],
        "userid": initArr[1],
        "useralias": initArr[2],
        "type": type,
        "flag": 'h5'
    };
    else if (type == 'getInit') var data = {
        "type": type,
        "flag": 'h5'
    };
    else if (type == 'addflag') var data = {
        "roomid": initArr[0],
        "srcid": initArr[1],
        "name": initArr[2],
        "type": type,
        "flag": 'h5'
    };
    else if (type == 'getCuserList') var data = {
        "type": type,
        "flag": 'h5'
    };
    $.ajax({
        type: "GET",
        url: "/Live/Camouflage",
        dataType: "json",
        data: data,
        success: function (data) {
            if (type == 'getInit' || type == 'init') {
                Cuserid = data[1];
            } else if (type == 'getCuserList') {
                CuserList = data;
                var field = [];
                var text = msgdata.content;
                for (var i in CuserList) {
                    for (var t in CuserList[i]) {
                        var toroomid = CuserList[i][t][0];
                        var toid = CuserList[i][t][1];
                        var name = CuserList[i][t][2];

                        if ($.inArray(toid, field) > -1) {

                        } else {
                            field.push(toid);
                            var send_data = new ClientHeader();
                            send_data.maincmd = 105;
                            send_data.subcmd = 2016;
                            send_data.length = 151 + 10 + strlen(text);
                            send_data.data = new RoomChatMsg();
                            send_data.data.msgtype = 15;
                            send_data.data.vcbid = toroomid;
                            send_data.data.vcbname = "大飞亲友团";
                            send_data.data.tocbname = "大飞亲友团";
                            send_data.data.srcid = msgdata.srcid;
                            send_data.data.srcuserlevel = 5;
                            send_data.data.textlen = strlen(text);
                            send_data.data.srcalias = msgdata.srcalias;
                            send_data.data.content = text;
                            send_data.data.toid = toid;
                            send_data.data.tocbid = toroomid;
                            send_data.data.toalias = '游客';
                            send_data.data.touserlevel = 1;
                            console.log(send_data);
                            socketClient.ws.send(JSON.stringify(send_data));
                        }
                    }
                }
            }
        }
    });
}


function getLiveInfo() {
    $.ajax({
        type: "GET",
        url: dacelveUrl + "/SyllabusData/getSyllabus",
        dataType: "jsonp",
        data: {
            "roomid": relayRoomid
        },
        success: function (data) {
            console.log(data);
            for (var i in data.data) {
                if (data.data[i].islive == 1) {
                    $("#videoTime").html("时间：" + data.data[i]['starthour'] + "-" + data.data[i]['endhour']);
                    $("#videoTitle").html("主题： " + data.data[i]['title']);
                    $("#videoTeacher").html("主讲：" + data.data[i]['teachername']);
                }
            }
        }
    });
}

function getTeacherInfoNew(roomid_new) {
    $.ajax({
        type: 'GET',
        url: dacelveUrl + "/SyllabusData/getTeacherInfo",
        data: {
            roomid: roomid_new
        },
        dataType: 'json',
        error: function () {
            console.log('数据出错！！')
        },
        success: function (back) {
            //添加讲师到列表
            if (back && back.data[0]) {
                relayUserId = back.data[0]['teacherInfo'].user_id;
            }
            if (back && back.data[0] && roomid != relayRoomid) {
                var data = back.data[0]['teacherInfo'];
                if (data['name'] && data['user_id'] && data['level']) {
                    relayUserId = data['user_id'];
                    var objt = new Object();
                    objt.bforbidchat = 0;
                    objt.chead = '/group1/M00/00/F4/KlE101hJI4eASKeIAAAnsv8LvEY429.png';
                    objt.cometime = 1495167346;
                    objt.devtype = 3;
                    objt.gender = 1;
                    objt.pubmicindex = -1;
                    objt.roomlevel = 0;
                    objt.useralias = data['name']; //名称
                    objt.userid = data['user_id']; //用户ID
                    objt.userlevel = data['level'];
                    objt.userstate = 0;
                    objt.usertype = 0;
                    objt.userviplevel = 0;
                    objt.vcbid = roomid; //房间号
                    objt.isTopList = data['level']; //是否顶置在用户列表
                    addUserInfo(objt);
                }
            }

        }
    });
}


function timetable_new() {
    timetable(relayRoomid);
}

function Listsort() {
    var back = [];
    $('#userList li').each(function (index) {
        back[index] = ($(this));
    })

    //规则排序
    back.sort(compare('sort_flag'));
    $('#userList').empty();
    for (var i in back) {
        $('#userList').append(back[i].context)
    }

}

function compare(property) {
    return function (a, b) {
        var value1 = parseInt(a.attr(property));
        var value2 = parseInt(b.attr(property));
        return value2 - value1;
    }
}

function HisMessage(data) {
    alert('历史消息');
    console.log(data);
}