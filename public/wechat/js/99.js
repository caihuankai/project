webpackJsonp([99],{

/***/ 1217:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c("div")
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-dfa1ea2e", module.exports)
  }
}

/***/ }),

/***/ 436:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(861),
  /* template */
  __webpack_require__(1217),
  /* styles */
  null,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\index\\back.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] back.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-dfa1ea2e", Component.options)
  } else {
    hotAPI.reload("data-v-dfa1ea2e", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 861:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
//
//

exports.default = {
    data: function data() {
        return {
            path: ''
        };
    },
    created: function created() {
        this.$store.commit("hideTabber");
        this.$store.commit("setTitle", "大策略登陆");
        var ua = navigator.userAgent;
        var ipad = ua.match(/(iPad).*OS\s([\d_]+)/),
            isIphone = !ipad && ua.match(/(iPhone\sOS)\s([\d_]+)/),
            isAndroid = ua.match(/(Android)\s+([\d.]+)/),
            isMobile = isIphone || isAndroid;
        //判断  

        if (this.getCookie("pclogin") == 0 && this.getCookie('fromhttp') == 1) {

            if (this.getCookie("fromPath").indexOf('from') < 0 || window.location.href.indexOf('?123') > 0) {

                if (this.getCookie("fromPath") == window.location.href) {
                    this.$router.replace('/index/1');
                } else {
                    window.location.href = this.getCookie("fromPath");
                }
            }
        } else {

            this.$router.replace('/index/1');
            this.setCookie("pclogin", 0);
        }
        // 
        // if(this.getCookie('isShareLink')==0){
        //     var params =this.getCookie('shareLinkId');
        //     if(params=='' || params=='undefined' || params==undefined){
        //         this.$router.replace('/index/1');
        //         return;
        //     }
        //     var paramsLink =params.replace(/-/g,'/');
        //     this.setCookie('shareLink', '/'+paramsLink);
        //     var _this =this;
        //   setTimeout(function () {
        //         var shareLink  =_this.getCookie("shareLink");
        //         console.log('12222222222222222222')
        //         console.log(shareLink)
        //         _this.$router.push(shareLink);
        //     },1000);
        // }else{
        //     this.$router.replace('/index/1');
        // }
    },

    methods: {
        //设置cookie
        setCookie: function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
            var expires = "expires=" + d.toUTCString();
            // console.info(cname + "=" + cvalue + "; " + expires);
            document.cookie = cname + "=" + cvalue + "; " + expires;
            // console.info(document.cookie);
        },
        //获取cookie
        getCookie: function getCookie(cname) {
            var name = cname + "=";
            var ca = document.cookie.split(";");
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == " ") {
                    c = c.substring(1);
                }if (c.indexOf(name) != -1) return c.substring(name.length, c.length);
            }
            return "";
        }
    }
};

/***/ })

});