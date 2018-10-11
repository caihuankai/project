webpackJsonp([68],{

/***/ 1044:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.liveroom {\n  min-height: 100%;\n  background-color: #f0f0f0;\n  padding-bottom: 58px;\n  box-sizing: border-box;\n  width: 100%;\n  overflow-x: hidden;\n}\n.liveroom.nocontentclass {\n    display: -webkit-box;\n    display: -webkit-flex;\n    display: -ms-flexbox;\n    display: flex;\n    -webkit-box-orient: vertical;\n    -webkit-box-direction: normal;\n    -webkit-flex-direction: column;\n        -ms-flex-direction: column;\n            flex-direction: column;\n}\n.liveroom.nocontentclass > .course {\n      -webkit-box-flex: 1;\n      -webkit-flex: 1;\n          -ms-flex: 1;\n              flex: 1;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-orient: vertical;\n      -webkit-box-direction: normal;\n      -webkit-flex-direction: column;\n          -ms-flex-direction: column;\n              flex-direction: column;\n}\n.liveroom.nocontentclass .course-content {\n      -webkit-box-flex: 1;\n      -webkit-flex: 1;\n          -ms-flex: 1;\n              flex: 1;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-orient: vertical;\n      -webkit-box-direction: normal;\n      -webkit-flex-direction: column;\n          -ms-flex-direction: column;\n              flex-direction: column;\n      background-color: #f0f0f0;\n}\n.liveroom.nocontentclass .course-content > div {\n        -webkit-box-flex: 1;\n        -webkit-flex: 1;\n            -ms-flex: 1;\n                flex: 1;\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-align: center;\n        -webkit-align-items: center;\n            -ms-flex-align: center;\n                align-items: center;\n        -webkit-box-pack: center;\n        -webkit-justify-content: center;\n            -ms-flex-pack: center;\n                justify-content: center;\n}\n.liveroom .course-content .nocontentinfo {\n    font-size: 14px;\n    color: #b2b2b2;\n    line-height: 16px;\n    text-align: center;\n    background-color: #f0f0f0;\n}\n.liveroom .top-banner {\n    height: 154px;\n    position: relative;\n    background-color: #fff;\n    background-size: cover;\n    background-repeat: no-repeat;\n    position: relative;\n}\n.liveroom .top-banner:before {\n      content: '';\n      background-color: rgba(0, 0, 0, 0.2);\n      position: absolute;\n      top: 0;\n      left: 0;\n      width: 100%;\n      height: 100%;\n}\n.liveroom .top-banner .invite-card {\n      position: absolute;\n      line-height: 24px;\n      font-size: 16px;\n      padding: 0 10px;\n      background-color: rgba(0, 0, 0, 0.3);\n      color: #fff;\n      border-radius: 12px;\n      top: 15px;\n      right: 15px;\n      z-index: 20;\n}\n.liveroom .top-banner .media-box {\n      position: relative;\n      z-index: 10;\n}\n.liveroom .top-banner.teacher .media-box {\n      position: absolute;\n      left: 15px;\n      bottom: 15px;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      height: 66px;\n}\n.liveroom .top-banner.teacher .media-left {\n      width: 66px;\n      height: 66px;\n      margin-right: 16px;\n}\n.liveroom .top-banner.teacher .media-left img {\n        width: 100%;\n        height: 100%;\n        border-radius: 5px;\n}\n.liveroom .top-banner.teacher .media-middle {\n      line-height: 1;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-orient: vertical;\n      -webkit-box-direction: normal;\n      -webkit-flex-direction: column;\n          -ms-flex-direction: column;\n              flex-direction: column;\n      -webkit-box-pack: justify;\n      -webkit-justify-content: space-between;\n          -ms-flex-pack: justify;\n              justify-content: space-between;\n}\n.liveroom .top-banner.teacher .media-middle h5 {\n        font-size: 16px;\n        color: #fff;\n}\n.liveroom .top-banner.teacher .media-middle p {\n        font-size: 13px;\n        color: rgba(255, 255, 255, 0.8);\n}\n.liveroom .top-banner.teacher .media-right {\n      position: relative;\n      margin-left: 18px;\n}\n.liveroom .top-banner.teacher .media-right a {\n        position: absolute;\n        left: 0;\n        bottom: 0;\n        line-height: 21px;\n        color: #fff;\n        font-size: 13px;\n        background-color: #fb4040;\n        border-radius: 3px;\n        width: 46px;\n        text-align: center;\n}\n.liveroom .top-banner.student {\n      padding-top: 16px;\n      height: 138px;\n      position: relative;\n}\n.liveroom .top-banner.student .media-left {\n        width: 66px;\n        height: 66px;\n        margin: 0 auto;\n        margin-bottom: 18px;\n}\n.liveroom .top-banner.student .media-left img {\n          width: 100%;\n          height: 100%;\n          border-radius: 5px;\n}\n.liveroom .top-banner.student .media-middle {\n        text-align: center;\n        line-height: 1;\n}\n.liveroom .top-banner.student .media-middle h5 {\n          color: #fff;\n          font-size: 16px;\n          margin-bottom: 12px;\n}\n.liveroom .top-banner.student .media-middle p {\n          font-size: 13px;\n          color: rgba(255, 255, 255, 0.8);\n}\n.liveroom .top-banner.student .media-right {\n        position: absolute;\n        bottom: -4px;\n        left: 50%;\n        margin-left: 50px;\n}\n.liveroom .top-banner.student .media-right a {\n          color: #fff;\n          height: 21px;\n          display: block;\n          line-height: 21px;\n          padding: 0 10px;\n          background-color: #fb4040;\n          border-radius: 3px;\n          font-size: 13px;\n}\n.liveroom .top-banner.student .media-right a.focused {\n            background-color: #999;\n}\n.liveroom .create-course {\n    background-color: #fff;\n    padding: 15px;\n}\n.liveroom .create-course a {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-pack: center;\n      -webkit-justify-content: center;\n          -ms-flex-pack: center;\n              justify-content: center;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n      line-height: 41px;\n      background-color: #5f86fd;\n      border-radius: 20.5px;\n      color: #fff;\n}\n.liveroom .create-course a span {\n        display: inline-block;\n        width: 16px;\n        height: 16px;\n        background-color: #fff;\n        border-radius: 50%;\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-align: center;\n        -webkit-align-items: center;\n            -ms-flex-align: center;\n                align-items: center;\n        -webkit-box-pack: center;\n        -webkit-justify-content: center;\n            -ms-flex-pack: center;\n                justify-content: center;\n        margin-right: 5px;\n        position: relative;\n}\n.liveroom .create-course a span.sprite:before {\n          position: absolute;\n          top: 0;\n          left: 0;\n          -webkit-transform: scale(0.5) translate(-4px, -4px);\n              -ms-transform: scale(0.5) translate(-4px, -4px);\n                  transform: scale(0.5) translate(-4px, -4px);\n          width: 20px;\n          height: 20px;\n          background-position: -110px -238px;\n}\n.liveroom .course {\n    margin-top: 10px;\n    background-color: #fff;\n}\n.liveroom .course-nav {\n    border-bottom: 1px solid #ebebeb;\n    display: -webkit-box;\n    display: -webkit-flex;\n    display: -ms-flexbox;\n    display: flex;\n    text-align: center;\n    line-height: 40px;\n    padding-bottom: 5px;\n    position: relative;\n}\n.liveroom .course-nav.left .lesson,\n    .liveroom .course-nav.right .introduce {\n      color: #5f86fd;\n}\n.liveroom .course-nav a {\n      -webkit-box-flex: 1;\n      -webkit-flex: 1;\n          -ms-flex: 1;\n              flex: 1;\n      font-size: 16px;\n}\n.liveroom .course-nav:before {\n      content: '';\n      position: absolute;\n      width: 17px;\n      height: 3px;\n      border-radius: 2px;\n      background-color: #5f86fd;\n      bottom: 3px;\n      -webkit-transform: translateX(-50%);\n          -ms-transform: translateX(-50%);\n              transform: translateX(-50%);\n      -webkit-transition: left .2s ease-in-out;\n      transition: left .2s ease-in-out;\n}\n.liveroom .course-nav.left:before {\n      left: 25%;\n}\n.liveroom .course-nav.right:before {\n      left: 75%;\n}\n.liveroom .course-list a {\n    display: block;\n    width: 100%;\n    padding-left: 15px;\n    box-sizing: border-box;\n}\n.liveroom .course-list a .media-box {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n      padding: 15px 15px 15px 0;\n      height: 66px;\n      border-bottom: 1px solid #ebebeb;\n}\n.liveroom .course-list a .media-box .media-left {\n        width: 66px;\n        height: 66px;\n        margin-right: 15px;\n}\n.liveroom .course-list a .media-box .media-left img {\n          width: 100%;\n          height: 100%;\n          border-radius: 5px;\n}\n.liveroom .course-list a .media-box .media-right {\n        -webkit-box-flex: 1;\n        -webkit-flex: 1;\n            -ms-flex: 1;\n                flex: 1;\n        height: 100%;\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-orient: vertical;\n        -webkit-box-direction: normal;\n        -webkit-flex-direction: column;\n            -ms-flex-direction: column;\n                flex-direction: column;\n        -webkit-box-pack: justify;\n        -webkit-justify-content: space-between;\n            -ms-flex-pack: justify;\n                justify-content: space-between;\n}\n.liveroom .course-list a .media-box .media-right h5 {\n          line-height: 22px;\n          font-size: 17px;\n          color: #333;\n}\n.liveroom .course-list a .media-box .media-right p {\n          display: -webkit-box;\n          display: -webkit-flex;\n          display: -ms-flexbox;\n          display: flex;\n          line-height: 13px;\n          font-size: 13px;\n          color: #b2b2b2;\n          -webkit-box-pack: justify;\n          -webkit-justify-content: space-between;\n              -ms-flex-pack: justify;\n                  justify-content: space-between;\n}\n.liveroom .course-list a .media-box .media-right p span {\n            -webkit-box-flex: 1;\n            -webkit-flex: 1;\n                -ms-flex: 1;\n                    flex: 1;\n}\n.liveroom .course-list a .media-box .media-right p span.date {\n              -webkit-box-flex: 0;\n              -webkit-flex: none;\n                  -ms-flex: none;\n                      flex: none;\n              white-space: nowrap;\n}\n.liveroom .course-list a .media-box .media-right p span:last-child {\n              text-align: right;\n}\n.liveroom .course-list a .media-box .media-right .pwd {\n          color: #f5ac20;\n}\n.liveroom .course-list a .media-box .media-right .charge {\n          color: red;\n}\n.liveroom .course-list a .media-box .media-right .price {\n          color: #ff1700;\n}\n.liveroom .liveroom-introduce h6,\n  .liveroom .liveroom-introduce p {\n    padding: 0px 11px;\n}\n.liveroom .liveroom-introduce h6 {\n    line-height: 36px;\n    font-size: 17px;\n    color: #666;\n}\n.liveroom .liveroom-introduce p {\n    font-size: 15px;\n    line-height: 24px;\n    color: #999;\n}\n.liveroom .liveroom-introduce img {\n    width: 100%;\n}\n", ""]);

// exports


/***/ }),

/***/ 1203:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return (_vm.finish) ? _c('div', {
    staticClass: "liveroom",
    class: {
      nocontentclass: _vm.courseNavClass == 'left' ? (_vm.courseList.length == 0) : (!_vm.data.content && _vm.img_brief.length == 0)
    }
  }, [_c('div', {
    ref: "bg",
    staticClass: "top-banner",
    class: {
      teacher: _vm.host, student: !_vm.host
    },
    style: ({
      backgroundImage: 'url(' + _vm.data.background_img + ')'
    })
  }, [_c('div', {
    staticClass: "media-box"
  }, [_c('div', {
    staticClass: "media-left"
  }, [_c('img', {
    attrs: {
      "src": _vm.data.img,
      "alt": ""
    }
  })]), _vm._v(" "), _c('div', {
    staticClass: "media-middle"
  }, [_c('h5', [_vm._v(_vm._s(_vm.data.name))]), _vm._v(" "), _c('p', [_vm._v("关注人数" + _vm._s(_vm.data.focus_num))]), _vm._v(" "), (_vm.host) ? _c('p', [_vm._v("邀请人数" + _vm._s(_vm.data.fansCount))]) : _vm._e()]), _vm._v(" "), _c('div', {
    staticClass: "media-right"
  }, [(_vm.host) ? _c('router-link', {
    staticClass: "invite",
    attrs: {
      "to": '/invitecard/' + _vm.data.id + '/0/2'
    }
  }, [_vm._v("邀请")]) : _c('a', {
    class: {
      focused: _vm.data.isFocus == 1
    },
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": _vm.toFocus
    }
  }, [_vm._v(_vm._s(_vm.data.isFocus == 1 ? '已关注' : '关注'))])], 1)]), _vm._v(" "), (!_vm.host) ? _c('router-link', {
    staticClass: "invite-card",
    attrs: {
      "to": '/invitecard/' + _vm.$route.params.id + '/0/2'
    }
  }, [_vm._v("邀请卡")]) : _vm._e()], 1), _vm._v(" "), (_vm.host) ? _c('div', {
    staticClass: "create-course"
  }, [_c('router-link', {
    attrs: {
      "to": '/personalCenter/createCourse/' + _vm.data.id
    }
  }, [_c('span', {
    staticClass: "sprite"
  }), _vm._v("新建课程")])], 1) : _vm._e(), _vm._v(" "), _c('div', {
    staticClass: "course"
  }, [_c('div', {
    staticClass: "course-nav",
    class: _vm.courseNavClass
  }, [_c('a', {
    staticClass: "lesson",
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": function($event) {
        _vm.nav('left')
      }
    }
  }, [_vm._v("课程")]), _vm._v(" "), _c('a', {
    staticClass: "introduce",
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": function($event) {
        _vm.nav('right')
      }
    }
  }, [_vm._v("介绍")])]), _vm._v(" "), (_vm.courseFinish) ? _c('div', {
    staticClass: "course-content"
  }, [_c('div', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.courseNavClass == 'left'),
      expression: "courseNavClass=='left'"
    }],
    staticClass: "course-list"
  }, [_c('ul', _vm._l((_vm.courseList), function(item) {
    return _c('li', {
      key: item.id
    }, [_c('router-link', {
      attrs: {
        "to": '/personalCenter/course/' + item.id + '&' + _vm.userId
      }
    }, [_c('div', {
      staticClass: "media-box"
    }, [_c('div', {
      staticClass: "media-left"
    }, [_c('img', {
      attrs: {
        "src": item.process_src_img + '?imageView2/1/w/200/h/200/interlace/1',
        "alt": ""
      }
    })]), _vm._v(" "), _c('div', {
      staticClass: "media-right"
    }, [_c('h5', {
      staticClass: "double-text"
    }, [_vm._v(_vm._s(item.class_name))]), _vm._v(" "), _c('p', [_c('span', {
      staticClass: "number"
    }, [_vm._v(_vm._s(item.study_num) + "人次")]), _vm._v(" "), _c('span', {
      staticClass: "date"
    }, [_vm._v(_vm._s(item.begin_time.slice(0, -3)))]), _vm._v(" "), _c('span', {
      class: {
        free: item.level == 0, pwd: item.level == 1, charge: item.level == 2
      }
    }, [_vm._v(_vm._s(item.level == 0 ? '免费' : (item.level == 1 ? '加密' : ('¥' + item.price))))])])])])])], 1)
  })), _vm._v(" "), (_vm.courseList.length > 0) ? [_c('nomore', {
    attrs: {
      "text": "没有更多啦"
    }
  })] : [_c('p', {
    staticClass: "nocontentinfo"
  }, [_vm._v(_vm._s(_vm.host ? '您还没有创建课程，赶快去创建吧' : '暂无课程'))])]], 2), _vm._v(" "), _c('div', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.courseNavClass == 'right'),
      expression: "courseNavClass=='right'"
    }],
    staticClass: "liveroom-introduce",
    style: ({
      padding: ((_vm.data.content || _vm.img_brief.length > 0) ? '10px' : '0px') + ' 0px'
    })
  }, [(_vm.data.content) ? [_c('h6', [_vm._v("直播间介绍：")]), _vm._v(" "), _c('p', [_vm._v(_vm._s(_vm.data.content))])] : _vm._e(), _vm._v(" "), _vm._l((_vm.img_brief), function(item) {
    return [_c('img', {
      key: item.src,
      attrs: {
        "src": item.src,
        "alt": ""
      }
    }), _vm._v(" "), _c('p', {
      key: item.src
    }, [_vm._v(_vm._s(item.explain))])]
  }), _vm._v(" "), (!_vm.data.content && _vm.img_brief.length == 0) ? [_c('p', {
    staticClass: "nocontentinfo"
  }, [_vm._v(_vm._s(_vm.host ? '您还没有填写介绍，赶快去填写吧' : '暂无介绍'))])] : _vm._e()], 2)]) : _vm._e()])]) : _vm._e()
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-95a92268", module.exports)
  }
}

/***/ }),

/***/ 1312:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(1044);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("fc0ad308", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-95a92268\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./liveroom.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-95a92268\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./liveroom.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 477:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1312)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(902),
  /* template */
  __webpack_require__(1203),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\personalCenter\\liveroom.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] liveroom.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-95a92268", Component.options)
  } else {
    hotAPI.reload("data-v-95a92268", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 902:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function(NProgress) {

Object.defineProperty(exports, "__esModule", {
    value: true
});

var _mintUi = __webpack_require__(54);

var _nomore = __webpack_require__(135);

var _nomore2 = _interopRequireDefault(_nomore);

var _vuex = __webpack_require__(70);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

exports.default = {
    props: ['vueObj'],
    computed: (0, _vuex.mapState)({
        userId: function userId(state) {
            return state.userInfo.user_id;
        },
        type: function type(state) {
            return state.userInfo.type;
        },
        sdkdata: function sdkdata(state) {
            return state.sdkdata;
        }
    }),
    data: function data() {
        return {
            courseNavClass: 'left',
            host: null,
            live_id: null, // 本直播间id
            data: {},
            courseList: [],
            img_brief: [],
            canlogin: true,
            finish: false,
            // finish: true,
            courseFinish: false
        };
    },

    components: {
        nomore: _nomore2.default
    },
    created: function created() {
        // this.$emit('hideTabber')
        this.$emit('hideTabber');
        if (location.href.indexOf('?') != -1) {
            location.replace('http://' + location.host + '/' + location.hash);
        }
        // this.$emit('showTabber')
        this.$store.commit('showTabber');
        if (this.userId) {
            if (this.$route.params.id == 0) {
                if (this.type == 1) {
                    this.host = true;
                    this.live_id = 0;
                } else {
                    this.$router.replace('/personalCenter/createLive');
                }
            } else {
                this.getCourseData(this.$route.params.id);
                this.live_id = this.$route.params.id;
            }
            this.getData(this.live_id ? this.live_id : 0);
        }
        if (this.sdkdata.appId) {
            this.config();
        }
        // Indicator.open()
        NProgress.start();
    },
    destroyed: function destroyed() {
        // Indicator.close()
        NProgress.done();
    },

    // mounted() {
    //     if (this.$refs.bg && this.data.background_img) {
    //         this.$refs.bg.style.backgroundImage = "url('" + this.data.background_img + "')"
    //     }
    // },
    methods: {
        config: function config() {
            var _this = this;

            var data = this.sdkdata;
            wx.config({
                debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
                appId: data.appId, // 必填，公众号的唯一标识
                timestamp: data.timestamp, // 必填，生成签名的时间戳
                nonceStr: data.nonceStr, // 必填，生成签名的随机串
                signature: data.signature, // 必填，签名，见附录1
                jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage', 'hideMenuItems', 'showMenuItems'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
            });
            wx.ready(function () {
                _this.hideMenuItems();
                //分享到朋友圈
                wx.onMenuShareTimeline({
                    imgUrl: _this.data.img,
                    title: '推荐你关注的直播间：' + _this.data.name
                });
                //分享给朋友
                wx.onMenuShareAppMessage({
                    imgUrl: _this.data.img,
                    title: _this.data.name,
                    desc: _this.data.content
                });
            });
            wx.error();
        },
        nav: function nav(val) {
            this.courseNavClass = val;
            // if (val == 'left') {

            // }
        },
        getCourseData: function getCourseData(liveId) {
            var _this2 = this;

            // 获取课程列表
            this.$http.post(this.hostUrl + '/Course/getCourseListByLiveId', { live_id: liveId }, { emulateJSON: true }).then(function (res) {
                console.log(res.body);
                // if (res.body.code = -5002 && this.canlogin) {
                //     this.canlogin = false
                //     location.href = res.body.data.url
                //     return
                // }
                _this2.courseList = JSON.parse(res.body).data || [];
                _this2.courseFinish = true;
            });
        },
        getData: function getData(live_id) {
            var _this3 = this;

            if (live_id == 0) {
                // 进入我的直播间
                this.$http.get(this.hostUrl + '/User/getUserLiveInfo').then(function (res) {
                    console.log(res.body);
                    // if (res.body.code = -5002 && this.canlogin) {
                    //     this.canlogin = false
                    //     location.href = res.body.data.url
                    //     return
                    // }
                    if (res.body.code == 200) {

                        _this3.$router.replace('/personalCenter/liveroom/' + res.body.live[0].id);
                        _this3.data = res.body.live[0];
                        _this3.$store.commit('setTitle', _this3.$limit(_this3.data.name, 7));
                        if (_this3.sdkdata.appId) {
                            _this3.config();
                        }
                        // location.hash = '#/personalCenter/liveroom/' + this.data.id
                        if (_this3.data.open_status == 2 || _this3.data.is_freeze == 1) {
                            _this3.$router.replace('/forbidden/1');
                        }
                        _this3.live_id = _this3.data.id;
                        // this.updateTitle(this.$limit(this.data.name, 7))
                        _this3.getImgBrief(_this3.live_id);
                        _this3.getCourseData(_this3.live_id);
                        // if (this.$refs.bg) {
                        //     this.$refs.bg.style.backgroundImage = "url('" + this.data.background_img + "')"
                        // }
                    }
                    _this3.finish = true;
                    // Indicator.close()
                    NProgress.done();
                });
            } else {
                // 进入别人的直播间
                this.$http.post(this.hostUrl + '/User/getUserLiveInfoByLiveId', { live_id: live_id }, { emulateJSON: true }).then(function (res) {
                    console.log(JSON.parse(res.body));
                    var body = JSON.parse(res.body);
                    // if (body.code = -5002 && this.canlogin) {
                    //     this.canlogin = false
                    //     location.href = body.data.url
                    //     return
                    // }
                    if (body.code == 200) {
                        _this3.data = body.live[0];
                        _this3.$store.commit('setTitle', _this3.$limit(_this3.data.name, 7));
                        if (_this3.sdkdata.appId) {
                            _this3.config();
                        }
                        if (_this3.userId) {
                            _this3.host = _this3.data.user_id == _this3.userId;
                        }
                        if (_this3.data.open_status == 2 || _this3.data.is_freeze == 1) {
                            _this3.$router.replace('/forbidden/1');
                        }
                        document.title = _this3.$limit(_this3.data.name, 7);
                        _this3.live_id = _this3.data.id;
                        // if (this.$refs.bg) {
                        //     this.$refs.bg.style.backgroundImage = "url('" + this.data.background_img + "')"
                        // }
                        _this3.finish = true;
                    }
                    // Indicator.close()
                    NProgress.done();
                });
                this.getImgBrief(live_id);
            }
        },
        getImgBrief: function getImgBrief(live_id) {
            var _this4 = this;

            this.$http.post(this.hostUrl + '/User/getLiveInfoByLiveId', { live_id: live_id }, { emulateJSON: true }).then(function (res) {
                console.log(res.body);
                var data = JSON.parse(res.body).data;
                if (data.code == 200) {
                    _this4.img_brief = data.live;
                }
            });
        },
        toFocus: function toFocus() {
            var _this5 = this;

            // 关注或取消关注直播间 type=1为关注 0为取消关注
            this.$http.post(this.hostUrl + '/Focus/addFocus', { user_id: this.userId, live_id: this.live_id, type: this.data.isFocus == 1 ? 0 : 1 }, { emulateJSON: true }).then(function (res) {
                if (res.body.code == 0) {
                    (0, _mintUi.Toast)({
                        message: res.body.msg,
                        duration: 1000
                    });
                    _this5.data.isFocus = _this5.data.isFocus == 1 ? 0 : 1;
                    _this5.data.focus_num = res.body.data;
                }
            });
        }
    },
    watch: {
        userId: function userId(val) {
            console.log('userId = ' + val, 'data.user_id = ' + this.data.user_id);
            if (val && this.data.user_id) {
                this.host = this.data.user_id == this.userId;
            }
            if (this.$route.params.id == 0) {
                if (this.type == 1) {
                    this.host = true;
                    this.live_id = 0;
                } else {
                    this.$router.replace('/personalCenter/createLive');
                }
            } else {
                this.getCourseData(this.$route.params.id);
                this.live_id = this.$route.params.id;
            }
            this.getData(this.live_id ? this.live_id : 0);
        },
        host: function host(val) {
            console.log('host change');
            if (val) {
                this.vueObj.$emit('setLiveHost');
            } else {
                this.vueObj.$emit('resetLiveHost');
            }
        },
        sdkdata: function sdkdata(val) {
            if (val.appId && this.data.user_id) {
                this.config();
            }
        }
    }
}; //
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

// import { Indicator, Toast } from 'mint-ui'
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(99)))

/***/ })

});