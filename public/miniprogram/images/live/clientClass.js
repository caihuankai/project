export default { // JavaScript Document

    //say hello
    ClientHello() {
        this.length = 18 //length 是整个数据包的长度 (size of COM_MSG_HEADER + size of CMDClientHello_t)
        this.version = 10 //版本号,当前为10
        this.subcmd = 1 //子命令：填：Sub_Vchat_ClientHello =1
        this.maincmd = 106 //主命令：填：MDM_Vchat_Gate   106
        this.checkcode = 0 //固定为0
        this.data = {
            "param1": 12, //填12
            "param2": 8, //填8
            "param3": 7, //填7
            "param4": 1 //填1
        }
    },

    ClientHeader() {
        this.length = 14,
            this.version = 10,
            this.checkcode = 0,
            this.maincmd = 106,
            this.subcmd = 21015,
            this.data = {

            }
    },
    //发送登录信息
    CMDUserLogonReq4() {
        this.loginid = 0
        this.token = ""
        //   this.patternLock = 3 
        this.platformType = 4
        //    this.version = 5 
        //    this.serial = 6 
        //    this.mac = 7 
        this.mobile = 3
        //    this.devicemodel = 9 
        //    this.deviceos = 10 
        //    this.hostdb = 11
    },
    //发送加入房间信息
    ClientJoinRoomReq() {
        this.userid = 1706743
        this.vcbid = 1
        this.devtype = 3
        this.time = 0
        this.crc32 = 15
        this.coremessagever = 10690001 //客户端内核版本
        this.cuserpwd = "" //用户密码,没有就是游客
        this.croompwd = "" //房间密码,可能有
        this.cSerial = "" //uuid
        this.cMacAddr = "" //客户端mac地址
        this.cIpAddr = "" //客户端ip地址
        this.bloginSource = 0 //local 99 login or other platform login:0-local1-other platform
        this.reserve1 = 0
        this.reserve2 = 0
    },

    //发送退出房间信息
    CMDUserExitRoomInfo() {
        this.userid = 0
        this.vcbid = 0
    },

    //发起新群组消息
    GroupMsgReq() {
        this.groupId //群组id
        this.msg = {

        } //聊天消息
    },

    //红包
    CMDSendRedPacketReq()
    {
    this.userID      = 1;  //用户ID
    this.groupID      = 2;  //群ID--直播间id
    this.packetType  = 3;     //红包类型 0:幸运弹 1:普天同庆弹 2:定向弹 3:照明弹 5:定时红包 6:定位红包  ----eCommandImmediatelyType   = 5--即时非定额    eCommandUniImmediatelyType   = 6 ;--即时定额eCommandFixTimeType   = 9;--定时非定额 
//   eCommandUniFixTimeType   = 10;--定时定额 
    this.rangeType  = 2;   //领取范围类型 0:仅游客 1:仅成员 2:所有人-----2
    this.dstUserID    = 0;  //定向红包对象userid---0
    this.packetNum    = 6;  //红包个数
    // this.packetMoney    = 7;  //红包总金额(实际金额*100),只适用于随机手气红包
    // this.perPacketMoney  = 8;  //单个红包金额,只适用于定额红包(实际金额*100)
    this.message      = 9;  //红包留言
    // this.privateType    = 10;  //是否私聊红包--不用传
    // this.rangeGender = 11;  //性别领取范围--不用传
    // this.fixtime         = 12;   //定时时间--即时不用传
    // this.invalidTime     = 13;   //结束时间--即时不用传
    // this.longitude        =14;    //经度--不用传
    // this.latitude        =15;    //纬度--不用传
    // this.location        =16;    //红包位置--不用传
    },
    //抢红包
    CMDTakeRedPacketReq()
    {
    this.userID    = 1;  //用户ID
    this.groupID    = 2;  //群ID
    this.packetID  = 3;  //红包ID
    // string  photoPath  = 4;  //照片红包图片地址(服务器不关注,客户端协议层需要)--不需要
    // double  longitude        =5;    //经度--不需要
    // double  latitude        =6;    //纬度--不需要
    this.message      = 7;  //红包留言--不需要
    },
    //聊天对象
    ChatObjReq() {
        this.srcuser //消息发起者
        this.dstuser //聊天对象
    },

    UserInfoReq() {
        this.userId
        // this.userType = 0
    },

    //发送聊天消息
    RoomChatMsg() {
        this.srcUser = {}
        this.dstUser = {}
        this.msgId //服务器msgid
        this.msgTime //聊天时间
        this.msgType //消息类型  1文字 2图片 3语音
        this.content //聊天内容
        this.atList //@人列表，0是所有人
        this.msgTimeStr = "2017-06-08 15:51:29" //聊天时间字符串格式,客户端SDK填,服务端不填
        this.clientMSgId //客户端msgid
        this.recall //是否已撤回
        this.sendState //发送状态：0 成功，1 发送中，2 发送失败（客户端自用）
    },

    //ping包 subcmd = 2
    ClientPing() {
        this.userid
        this.roomid
    },

    Media_Content() {
        this.url
        this.media_id
        this.accessToken
    },

    //禁言用户请求
    ForbidUserChatReq() { // 2051 //禁言用户请求   length=33 -1全体
        this.groupid
        this.userid
        this.status
    },

    //结束直播请求
    OverLiveReq() {
        this.groupid
        this.userid
    },

    //历史消息请求
    GroupMsgHisReq() {
        this.userId //请求发起者userid
        this.groupId //群组id
        this.forward //true 向前查找，false 向后查找
        this.msgId //服务器msgid(请求该msgid之前（或之后）的聊天记录，填0则从最新的（最初的）聊天记录开始请求)
        this.count //请求数量
    }
}

// typedef struct tag_COM_MSG_HEADER
// {
//   int32  length       //必须在这个位置
//   uint8  version      //版本号,当前为10
//   uint8  checkcode
//   uint16 maincmd     //主命令
//   uint16 subcmd      //子命令
//   char   content[0]  //内容
// }COM_MSG_HEADER