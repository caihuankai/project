webpackJsonp([52],{

/***/ 1046:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.container {\n  height: 100%;\n  position: relative;\n  background: #f5f7f8;\n  width: 100vw;\n  max-width: 750px;\n  margin: 0 auto;\n  /*  -webkit-overflow-scrolling: touch;*/\n}\n.mint-navbar .mint-tab-item.is-selected {\n  border-bottom: none;\n}\n", ""]);

// exports


/***/ }),

/***/ 1205:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "container"
  })
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-a8ae4a2e", module.exports)
  }
}

/***/ }),

/***/ 1314:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(1046);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("385d1a03", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-a8ae4a2e\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./login.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-a8ae4a2e\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./login.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 512:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1314)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(946),
  /* template */
  __webpack_require__(1205),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\vote\\login.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] login.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-a8ae4a2e", Component.options)
  } else {
    hotAPI.reload("data-v-a8ae4a2e", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 946:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function($, NProgress) {

Object.defineProperty(exports, "__esModule", {
  value: true
});

var _vue = __webpack_require__(50);

var _vue2 = _interopRequireDefault(_vue);

var _vuex = __webpack_require__(70);

var _liveTab = __webpack_require__(140);

var _liveTab2 = _interopRequireDefault(_liveTab);

var _mintUi = __webpack_require__(54);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

// import tabbar from './subcomponents/tabbar.vue';
//
//
//
//
//

exports.default = {
  data: function data() {
    return {
      finish: true, // 是否读取数据完毕
      hostURL: "", // 根路径
      vueObj: new _vue2.default(),
      loginUrl: "",
      qiniuDomain: "",
      id: this.$route.query.id
    };
  },

  components: {
    tabbar: _liveTab2.default
  },
  computed: (0, _vuex.mapState)({
    isWeiXin: function isWeiXin(state) {
      return state.isWeiXin;
    },
    userInfo: function userInfo(state) {
      return state.userInfo;
    },
    pageTitle: function pageTitle(state) {
      return state.pageTitle;
    },
    isShowTabber: function isShowTabber(state) {
      return state.isShowTabber;
    }
  }),
  created: function created() {
    _mintUi.Indicator.open('巅峰对决登录...');
    this.$store.commit("hideTabber");
    this.$store.commit("setTitle", "巅峰对决投票H5");

    this.getLogin("http://tp.talk.99cj.com.cn/voteH5/index.html#/?id=" + this.id);
  },
  mounted: function mounted() {
    // 设置文本输入框获取焦点后移入视口

    $(document).on("focus", 'input[type="text"], textarea', function () {
      var _this = this;

      setTimeout(function () {
        _this.scrollIntoView();
      }, 0);
    });
  },
  destroyed: function destroyed() {
    // Indicator.close()
    NProgress.done();
  },

  methods: {
    getLogin: function getLogin(link) {
      var _this2 = this;

      this.$http.get(this.hostUrl + "/User/", { params: { loginRedirectUrl: link.toString(), synchroPage: 'http://tp.talk.99cj.com.cn/Contestant/index' } }).then(function (res) {
        // 未登录时跳转
        // alert('登陆前'+window.location.href)
        // this.finish = true
        console.log(res.body);
        //alert(window.location.hash)
        if (res.body.code == -5002) {
          // 登录失败跳转登录
          if (_this2.isWeiXin) {
            if (window.location.hash.indexOf("index") > 0) {
              _this2.setCookie("pclogin", 1);
            } else {
              _this2.setCookie("pclogin", 0);
            }

            window.location.href = res.body.data.url;

            // this.setCookie("index", 1);
            // if (window.location.hash != "#/back") {
            //   this.setCookie(
            //     "link",
            //     window.location.hash.substr(1, window.location.hash.length)
            //   );
            // }
            // return;
          } else {
            _this2.loginUrl = res.body.data.url;
            _mintUi.Indicator.close();
            _this2.$router.replace("/login");
            //  this.setCookie("pclogin", 1); 
            _this2.finish = true;
            return;
          }
        } else if (res.body.code == 200) {
          // 登录成功
          if (_this2.isWeiXin) {
            _this2.getSignPackage();
            _mintUi.Indicator.close();
          }
          // location.reload();
          // this.username = res.body.data.username;
          // this.userAvatar = res.body.data.img ? res.body.data.img : '/images/default/userDefault.png';
          var image = new Image();
          res.body.data.img = res.body.data.img || "/images/default/userDefault.png";
          image.src = res.body.data.img;
          image.onerror = function () {
            res.body.data.img = res.body.data.img || "/images/default/userDefault.png";
          };
          if (res.body.data.isHasKeyWord) {
            //资料包含敏感词
            (0, _mintUi.Toast)("网络超时");
            location.href = "http://tp.talk.99cj.com.cn/voteH5/index.html#/?id=" + _this2.id;
          }
        } else if (res.body.code == -5012 && res.body.msg == "用户被禁用") {
          // 用户被禁用时跳转
          if (_this2.isWeiXin) {
            _this2.getSignPackage();
            _mintUi.Indicator.close();
          }
        } else {
          console.log(res.body);
          (0, _mintUi.Toast)("网络超时");
          location.href = "http://tp.talk.99cj.com.cn/voteH5/index.html#/?id=" + _this2.id;
        }
      }, function (err) {
        // Indicator.close()
        _mintUi.Indicator.close();
        location.href = "http://tp.talk.99cj.com.cn/voteH5/index.html#/?id=" + _this2.id;
      });
    },
    getSignPackage: function getSignPackage() {
      var _this3 = this;

      // 获取微信jssdk数据
      this.$http.post(this.hostUrl + "/Jssdk/getSignPackage/", {
        user_id: this.userId || 0,
        url: location.href
      }, { emulateJSON: true }).then(function (res) {
        var data = res.body.data;
        if (data.appId) {
          // this.sdkdata = data;
          _this3.hostURL = res.body.data.url;
          _this3.$store.commit("setSdkData", data);

          //初始化wx sdk数据
          wx.config({
            debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
            appId: data.appId, // 必填，公众号的唯一标识
            timestamp: data.timestamp, // 必填，生成签名的时间戳
            nonceStr: data.nonceStr, // 必填，生成签名的随机串
            signature: data.signature, // 必填，签名，见附录1
            jsApiList: ["onMenuShareTimeline", "onMenuShareAppMessage", "onMenuShareQQ", "onMenuShareWeibo", "onMenuShareQZone", "startRecord", "stopRecord", "onVoiceRecordEnd", "playVoice", "pauseVoice", "stopVoice", "onVoicePlayEnd", "uploadVoice", "downloadVoice", "chooseImage", "previewImage", "uploadImage", "downloadImage", "translateVoice", "getNetworkType", "openLocation", "getLocation", "hideOptionMenu", "showOptionMenu", "hideMenuItems", "showMenuItems", "hideAllNonBaseMenuItem", "showAllNonBaseMenuItem", "closeWindow", "scanQRCode", "chooseWXPay", "openProductSpecificView", "addCard", "chooseCard", "openCard"] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
          });
        }
      });
    }
    // changeToTeacher() {// 创建直播间后，将用户状态转为1
    //     this.type = 1;
    // },
    // setTitle(title) {// 设置页面标题
    //     this.pageTitle = title;
    // }

  }
};
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(49), __webpack_require__(99)))

/***/ })

});