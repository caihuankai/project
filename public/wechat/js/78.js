webpackJsonp([78],{

/***/ 1051:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.collectLive {\n  min-height: 100%;\n  box-sizing: border-box;\n  padding-bottom: 58px;\n  -webkit-overflow-scrolling: touch;\n  background-color: #f4f6fc;\n  background-color: #fff;\n}\n.collectLive .mint-tab-container {\n    padding-top: .94rem;\n}\n.collectLive .page-part {\n    height: 0.94rem;\n    border-bottom: 1px solid #ededed;\n    padding: 0;\n    position: fixed;\n    width: 100vw;\n    z-index: 111;\n}\n.collectLive .mint-navbar {\n    position: fixed;\n    font-size: 0.32rem;\n    color: #666;\n    top: 0;\n}\n.collectLive .mint-navbar .mint-tab-item {\n      background-color: transparent;\n      padding: 5px 0;\n      height: 0.7rem;\n}\n.collectLive .mint-navbar .mint-tab-item span {\n        display: inline-block;\n        height: 0.7rem;\n        line-height: 0.7rem;\n        width: 100%;\n        font-size: .32rem;\n}\n.collectLive .mint-navbar .is-selected {\n      color: #c62f2f;\n}\n.collectLive .mint-navbar .is-selected span {\n        /* border-bottom: 2px solid rgb(95, 134, 253);*/\n}\n.collectLive .mint-navbar .border-line {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      width: 50%;\n      position: absolute;\n      bottom: 0.08rem;\n      left: 0;\n      z-index: 111;\n      -webkit-box-pack: center;\n      -webkit-justify-content: center;\n          -ms-flex-pack: center;\n              justify-content: center;\n      text-align: center;\n}\n.collectLive .mint-navbar .border-line span {\n        display: inline-block;\n        width: 0.5rem;\n        border-radius: 0.2rem;\n        background-color: #c62f2f;\n        height: 0.06rem;\n}\n.collectLive.nocontentclass {\n    display: -webkit-box;\n    display: -webkit-flex;\n    display: -ms-flexbox;\n    display: flex;\n    -webkit-box-orient: vertical;\n    -webkit-box-direction: normal;\n    -webkit-flex-direction: column;\n        -ms-flex-direction: column;\n            flex-direction: column;\n    -webkit-box-align: center;\n    -webkit-align-items: center;\n        -ms-flex-align: center;\n            align-items: center;\n    -webkit-box-pack: center;\n    -webkit-justify-content: center;\n        -ms-flex-pack: center;\n            justify-content: center;\n}\n.collectLive a {\n    position: relative;\n    display: block;\n    padding-left: 0.3rem;\n    height: 1.9rem;\n}\n.collectLive a .main {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n      box-sizing: border-box;\n      padding: 0.2rem 0.3rem 0.2rem 0;\n      border-bottom: 1px solid #ebebeb;\n}\n.collectLive a .main .left {\n        width: 1.3rem;\n        height: 1.3rem;\n        margin-right: 0.3rem;\n}\n.collectLive a .main .left img {\n          width: 100%;\n          height: 100%;\n          border-radius: 50%;\n}\n.collectLive a .main .right {\n        height: 1.3rem;\n        -webkit-box-flex: 1;\n        -webkit-flex: 1;\n            -ms-flex: 1;\n                flex: 1;\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-orient: vertical;\n        -webkit-box-direction: normal;\n        -webkit-flex-direction: column;\n            -ms-flex-direction: column;\n                flex-direction: column;\n        -webkit-justify-content: space-around;\n            -ms-flex-pack: distribute;\n                justify-content: space-around;\n}\n.collectLive a .main .right h5 {\n          color: #333333;\n          font-size: 0.32rem;\n}\n.collectLive a .main .right p {\n          color: #999999;\n          font-size: 0.28rem;\n}\n.collectLive .nocollectinfo {\n    font-size: 0.28rem;\n    color: #b2b2b2;\n    line-height: 51px;\n    text-align: center;\n}\n", ""]);

// exports


/***/ }),

/***/ 1210:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return (_vm.finish) ? _c('div', {
    staticClass: "collectLive",
    class: {
      nocontentclass: _vm.data.length == 0
    }
  }, [_c('mt-navbar', {
    staticClass: "page-part",
    model: {
      value: (_vm.selected),
      callback: function($$v) {
        _vm.selected = $$v
      },
      expression: "selected"
    }
  }, [_c('mt-tab-item', {
    attrs: {
      "id": "1"
    }
  }, [_c('span', {
    on: {
      "click": function($event) {
        _vm.lef(0)
      }
    }
  }, [_vm._v("讲师")])]), _vm._v(" "), _c('mt-tab-item', {
    attrs: {
      "id": "2"
    }
  }, [_c('span', {
    on: {
      "click": function($event) {
        _vm.lef(1)
      }
    }
  }, [_vm._v("栏目")])]), _vm._v(" "), _c('div', {
    staticClass: "border-line",
    style: ({
      'left': _vm.left
    })
  }, [_c('span')])], 1), _vm._v(" "), _c('mt-tab-container', [(_vm.selected == '1') ? _c('mt-tab-container-item', [_vm._l((_vm.data), function(item) {
    return _c('router-link', {
      key: item.live_id,
      attrs: {
        "to": '/live/' + item.userId + '&' + _vm.userInfoid + '&4'
      }
    }, [_c('div', {
      staticClass: "main"
    }, [_c('div', {
      staticClass: "left"
    }, [_c('img', {
      attrs: {
        "src": item.pic,
        "alt": ""
      }
    })]), _vm._v(" "), _c('div', {
      staticClass: "right"
    }, [_c('h5', [_vm._v(_vm._s(item.name))]), _vm._v(" "), _c('p', {
      staticClass: "single-text"
    }, [_vm._v(_vm._s(item.title))])])]), _vm._v(" "), _c('i', {
      staticClass: "mint-cell-allow-right"
    })])
  }), _vm._v(" "), (_vm.data.length > 0) ? [_c('nomore', {
    attrs: {
      "text": "没有更多啦"
    }
  })] : [_c('p', {
    staticClass: "nocollectinfo"
  }, [_vm._v("您还没有关注的人，赶快去关注吧")])]], 2) : _vm._e(), _vm._v(" "), (_vm.selected == '2') ? _c('mt-tab-container-item', [_vm._l((_vm.columnData), function(item) {
    return [(item.name == '实盘观点') ? _c('router-link', {
      key: item.live_id,
      attrs: {
        "to": '/realDisk/' + item.id + '/0'
      }
    }, [_c('div', {
      staticClass: "main"
    }, [_c('div', {
      staticClass: "left"
    }, [_c('img', {
      attrs: {
        "src": item.qiniuImg
      }
    })]), _vm._v(" "), _c('div', {
      staticClass: "right"
    }, [_c('h5', [_vm._v(_vm._s(item.name))]), _vm._v(" "), _c('p', {
      staticClass: "single-text"
    }, [_vm._v(_vm._s(item.lead))])])]), _vm._v(" "), _c('i', {
      staticClass: "mint-cell-allow-right"
    })]) : _c('router-link', {
      key: item.live_id,
      attrs: {
        "to": '/periodical/' + item.id
      }
    }, [_c('div', {
      staticClass: "main"
    }, [_c('div', {
      staticClass: "left"
    }, [_c('img', {
      attrs: {
        "src": item.qiniuImg
      }
    })]), _vm._v(" "), _c('div', {
      staticClass: "right"
    }, [_c('h5', [_vm._v(_vm._s(item.name))]), _vm._v(" "), _c('p', {
      staticClass: "single-text"
    }, [_vm._v(_vm._s(item.lead))])])]), _vm._v(" "), _c('i', {
      staticClass: "mint-cell-allow-right"
    })])]
  }), _vm._v(" "), (_vm.columnData.length > 0) ? [_c('nomore', {
    attrs: {
      "text": "没有更多啦"
    }
  })] : [_c('p', {
    staticClass: "nocollectinfo"
  }, [_vm._v("您还没有关注的栏目，赶快去关注吧")])]], 2) : _vm._e()], 1)], 1) : _vm._e()
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-c2386c7e", module.exports)
  }
}

/***/ }),

/***/ 1319:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(1051);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("3253bb82", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-c2386c7e\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./collectLive.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-c2386c7e\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./collectLive.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 461:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1319)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(886),
  /* template */
  __webpack_require__(1210),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\personalCenter\\collectLive.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] collectLive.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-c2386c7e", Component.options)
  } else {
    hotAPI.reload("data-v-c2386c7e", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 886:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function(NProgress) {

Object.defineProperty(exports, "__esModule", {
    value: true
});

var _nomore = __webpack_require__(135);

var _nomore2 = _interopRequireDefault(_nomore);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

exports.default = {
    data: function data() {
        return {
            data: [], //老师
            columnData: [], //栏目
            finish: false,
            selected: '1',
            left: "", //tab设置
            httpUrl: '' //链接地址
        };
    },

    computed: {
        sdkdata: function sdkdata() {
            return this.$store.state.sdkdata;
        },
        userInfoid: function userInfoid() {
            return this.$store.state.userInfo.user_id;
        }
    },
    created: function created() {
        // this.updateTitle('关注的直播间')
        this.$store.commit('setTitle', '我的关注');
        // if (this.sdkdata.appId) {
        //     this.defaultConfig(this.sdkdata, this)
        // }
        this.getData(1);
        this.getData(2);
        // Indicator.open()
        NProgress.start();
        // this.$emit('showTabber')
        this.$store.commit('showTabber');
    },
    destroyed: function destroyed() {
        // Indicator.close()
        NProgress.done();
    },

    methods: {
        /**
        * 获取用户关注live直播间、栏目列表
        * @param  [type] $target 1-live直播间  2-栏目
        * @return [array]         [description]
        */
        getData: function getData(num) {
            var _this = this;

            this.$http.get('/User/getUserFocusList', { params: { target: num } }).then(function (res) {
                console.log(res.body);
                NProgress.done();
                if (res.body.code == 200) {
                    if (num == 1) {
                        _this.data = res.body.data;
                    } else {
                        _this.columnData = res.body.data;
                    }
                }
                _this.finish = true;
            });
        },
        lef: function lef(num) {
            document.body.scrollTop = "0px";
            document.documentElement.scrollTop = "0px";
            if (num == 0) {
                this.selected = '1';
            } else {
                this.selected = '1';
            }
            this.left = num * 50 + '%';
        }
    },
    components: {
        nomore: _nomore2.default
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

// import { Indicator } from 'mint-ui'
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(99)))

/***/ })

});