webpackJsonp([34],{

/***/ 1039:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.myincome {\n  height: 100%;\n  display: -webkit-box;\n  display: -webkit-flex;\n  display: -ms-flexbox;\n  display: flex;\n  -webkit-box-orient: vertical;\n  -webkit-box-direction: normal;\n  -webkit-flex-direction: column;\n      -ms-flex-direction: column;\n          flex-direction: column;\n  background-color: #f4f6fc;\n}\n.myincome .tab {\n    background-repeat: no-repeat;\n}\n.myincome .calc {\n    background-color: #fff;\n}\n.myincome .calc p {\n      padding-left: 0.3rem;\n      padding-right: 0.3rem;\n      line-height: 0.9rem;\n      color: #666666;\n      font-size: 0.32rem;\n}\n.myincome .calc p span {\n        font-size: 0.48rem;\n        color: #333333;\n}\n.myincome .calc p.total {\n        border-bottom: 1px solid #f0f0f0;\n}\n.myincome .calc .cantake {\n      position: relative;\n}\n.myincome .calc .cantake span {\n        color: #fb4040;\n}\n.myincome .calc .cantake a {\n        display: block;\n        position: absolute;\n        right: 0.3rem;\n        top: 50%;\n        -webkit-transform: translateY(-50%);\n            -ms-transform: translateY(-50%);\n                transform: translateY(-50%);\n        height: 0.5rem;\n        line-height: 0.5rem;\n        padding: 0 0.2rem;\n        color: #fff;\n        background-color: #5f86fd;\n        border-radius: 0.06rem;\n}\n.myincome .txt a {\n    color: #5f86fd;\n}\n.myincome .info {\n    padding-left: 0.3rem;\n    line-height: 0.44rem;\n    color: #b2b2b2;\n    font-size: 0.26rem;\n    padding: 0.2rem 0.3rem;\n}\n.myincome .info a {\n      color: #5f86fd;\n}\n.myincome .mint-cell {\n    height: 0.9rem;\n    line-height: 0.9rem;\n    min-height: auto;\n    width: 100%;\n    font-size: 0.32rem;\n    color: #666;\n    /*margin-bottom: 8px;*/\n}\n.myincome .mint-cell:last-child {\n      background-image: none;\n}\n.myincome .mint-cell .mint-cell-wrapper {\n      background-image: none;\n      height: 0.9rem;\n      line-height: 0.9rem;\n      padding-left: 0.3rem;\n}\n.myincome .nav {\n    background-color: #fff;\n    line-height: 0.9rem;\n    color: #999999;\n    font-size: 0.32rem;\n    position: relative;\n}\n.myincome .nav a {\n      line-height: 0.9rem;\n      text-align: center;\n}\n.myincome .nav.student.right:before {\n      left: 50%;\n}\n.myincome .nav.left .single {\n      color: #5f86fd;\n}\n.myincome .nav.right .divide {\n      color: #5f86fd;\n}\n.myincome .nav.right:before {\n      left: 75%;\n}\n.myincome .content {\n    padding: 0.16rem 0.3rem;\n    box-sizing: border-box;\n    -webkit-box-flex: 1;\n    -webkit-flex: 1;\n        -ms-flex: 1;\n            flex: 1;\n    display: -webkit-box;\n    display: -webkit-flex;\n    display: -ms-flexbox;\n    display: flex;\n    -webkit-box-orient: vertical;\n    -webkit-box-direction: normal;\n    -webkit-flex-direction: column;\n        -ms-flex-direction: column;\n            flex-direction: column;\n    overflow: hidden;\n}\n.myincome .content > div {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-orient: vertical;\n      -webkit-box-direction: normal;\n      -webkit-flex-direction: column;\n          -ms-flex-direction: column;\n              flex-direction: column;\n}\n.myincome .content .item-container {\n      -webkit-box-flex: 1;\n      -webkit-flex: 1;\n          -ms-flex: 1;\n              flex: 1;\n      overflow: auto;\n      -webkit-overflow-scrolling: touch;\n}\n.myincome .content .total {\n      background-color: #fff;\n      border-radius: 0.1rem;\n      line-height: 0.9rem;\n      text-align: center;\n      font-size: 0.32rem;\n      color: #666;\n      margin-bottom: 0.16rem;\n}\n.myincome .content .total span {\n        color: #fb4040;\n}\n.myincome .content .left .item {\n      background-color: #fff;\n      border-radius: 0.1rem;\n      margin-bottom: 0.16rem;\n}\n.myincome .content .left .item .title {\n        font-size: 0.32rem;\n        color: #666;\n        padding: 0 0.3rem;\n        border-bottom: 1px solid #f0f0f0;\n        line-height: 0.9rem;\n        height: 0.9rem;\n}\n.myincome .content .left .item .body {\n        padding: 0.16rem 0.3rem;\n        font-size: 0.28rem;\n        color: #999;\n        line-height: 0.5rem;\n}\n.myincome .content .right .item {\n      border-radius: 5px;\n      background-color: #fff;\n      font-size: 0.28rem;\n      color: #999;\n      line-height: 0.5rem;\n      padding: 0.16rem 0.3rem;\n      margin-bottom: 0.16rem;\n}\n.myincome .content .right .item .top {\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-pack: justify;\n        -webkit-justify-content: space-between;\n            -ms-flex-pack: justify;\n                justify-content: space-between;\n        margin-right: 0.1rem;\n}\n.myincome .content .right .item .top .single-text {\n          -webkit-box-flex: 1;\n          -webkit-flex: 1;\n              -ms-flex: 1;\n                  flex: 1;\n}\n.myincome .popup {\n    width: 85%;\n    border-radius: 3px;\n    overflow: hidden;\n    background-color: #fff;\n}\n.myincome .popup .title {\n      padding-top: 0.3rem;\n      font-size: 0.32rem;\n      color: #333;\n      text-align: center;\n}\n.myincome .popup .msgcontent {\n      padding: 0.2rem 0.4rem 0.3rem;\n      min-height: 0.72rem;\n      position: relative;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n}\n.myincome .popup .msgcontent p {\n        -webkit-box-flex: 1;\n        -webkit-flex: 1;\n            -ms-flex: 1;\n                flex: 1;\n        text-align: center;\n}\n.myincome .popup .msgcontent p span {\n          font-size: 0.26rem;\n          color: #999;\n}\n.myincome .popup .msgcontent input {\n        -webkit-box-flex: 1;\n        -webkit-flex: 1;\n            -ms-flex: 1;\n                flex: 1;\n}\n.myincome .popup .msgbtns {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      height: 1.32rem;\n      line-height: 0.9rem;\n}\n.myincome .popup .msgbtns a {\n        border-radius: 0.1rem;\n        height: 0.9rem;\n        font-size: 0.36rem;\n        line-height: 0.9rem;\n        width: 45%;\n        box-sizing: border-box;\n        text-align: center;\n}\n.myincome .popup .msgbtns a:first-child {\n          margin-left: 0.4rem;\n          margin-right: 0.28rem;\n          color: #999;\n          border: 1px solid #b2b2b2;\n}\n.myincome .popup .msgbtns a:last-child {\n          color: #fff;\n          background-color: #5f86fd;\n          margin-left: 0.28rem;\n          margin-right: 0.4rem;\n}\n.myincome .popup .msgbtns #success-btn {\n        margin: 0 auto;\n}\n.myincome .txt {\n    padding: 0.2rem 0.3rem;\n    color: #a7a7a8;\n}\n.myincome .txt h5 {\n      font-size: 0.28rem;\n      height: 0.6rem;\n}\n.myincome .txt p {\n      font-size: 0.26rem;\n      line-height: 1.5;\n}\n.mint-toast {\n  z-index: 9999;\n}\n", ""]);

// exports


/***/ }),

/***/ 1198:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "myincome"
  }, [_c('div', {
    staticClass: "calc"
  }, [_c('p', {
    staticClass: "total"
  }, [_vm._v("总收益（）：\n            "), _c('span', [_vm._v(_vm._s(_vm.totalincome) + " ")])]), _vm._v(" "), _c('p', {
    staticClass: "total"
  }, [_vm._v("总收益（元）：\n            "), _c('span', [_vm._v(_vm._s(_vm.totalincome) + " 元")])]), _vm._v(" "), _c('p', {
    staticClass: "cantake"
  }, [_vm._v("可提现金额（元）：\n            "), _c('span', [_vm._v(_vm._s(_vm.cantakeincome) + " 元")]), _vm._v(" "), _c('a', {
    staticClass: "take-btn",
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": _vm.takecash
    }
  }, [_vm._v("提现")])])]), _vm._v(" "), _vm._m(0), _vm._v(" "), _c('mt-cell', {
    staticStyle: {
      "margin-bottom": "8px"
    },
    attrs: {
      "title": "提现明细",
      "to": "/personalCenter/myincome/details",
      "is-link": ""
    }
  }), _vm._v(" "), _c('div', {
    staticClass: "nav",
    class: {
      left: _vm.left, right: !_vm.left, student: _vm.type == 2
    }
  }, [(_vm.type == 2) ? _c('cell', {
    attrs: {
      "title": "我的空间收益",
      "path": "/personalCenter/mySpaceIncome",
      "is-link": "",
      "icon": "icon-income"
    },
    on: {
      "click": function($event) {
        _vm.left = true
      }
    }
  }) : _vm._e(), _vm._v(" "), _c('cell', {
    attrs: {
      "title": "分成收益",
      "path": "/personalCenter/myDivideIncome",
      "is-link": "",
      "icon": "icon-divide"
    },
    on: {
      "click": function($event) {
        _vm.left = false
      }
    }
  })], 1), _vm._v(" "), _vm._m(1), _vm._v(" "), _c('mt-popup', {
    staticClass: "popup",
    attrs: {
      "popup-transition": "popup-fade"
    },
    model: {
      value: (_vm.applysuccess),
      callback: function($$v) {
        _vm.applysuccess = $$v
      },
      expression: "applysuccess"
    }
  }, [_c('div', {
    staticClass: "msgbox"
  }, [_c('div', {
    staticClass: "title"
  }, [_vm._v("\n                    提现申请提交成功\n                ")]), _vm._v(" "), _c('div', {
    staticClass: "msgcontent"
  }, [_c('p', [_vm._v("提现：" + _vm._s(_vm.takemoney) + "元\n                        "), _c('br'), _vm._v(" "), _c('span', [_vm._v("已经提交微信审核")])])]), _vm._v(" "), _c('div', {
    staticClass: "msgbtns"
  }, [_c('a', {
    attrs: {
      "href": "javascript:;",
      "id": "success-btn"
    },
    on: {
      "click": function($event) {
        _vm.applysuccess = false
      }
    }
  }, [_vm._v("确定")])])])])], 1)
},staticRenderFns: [function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "info"
  }, [_c('p', [_vm._v("收益满1元才可以申请提现。每笔提现上限1000元，每日上限2万元。如需了解详细规则，请点击\n            "), _c('a', {
    attrs: {
      "href": "https://mp.weixin.qq.com/s?__biz=MzIxMTgwODE0Mw==&mid=2247484242&idx=4&sn=632a401693a65a688f460a8b0b95bb8f&scene=19#wechat_redirect"
    }
  }, [_vm._v("《提现与费用》")])])])
},function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "txt"
  }, [_c('h5', [_vm._v("温馨提示")]), _vm._v(" "), _c('p', [_vm._v("1.总收益是您的收益的总和，不包括您的充值总收益等于“我的空间收益”＋“分成收益”;")]), _vm._v(" "), _c('p', [_vm._v("2.1个＝1元;")]), _vm._v(" "), _c('p', [_vm._v("3.可提现金额等于“总收益金额”－“已提现金额”;")]), _vm._v(" "), _c('p', [_vm._v("4.我的空间收益包括：课程收益、观点收益、Live直播送礼和课程送礼;")]), _vm._v(" "), _c('p', [_vm._v("5.分成收益包括；课程分成、观点分成、Live 直播送礼分成和课程送礼分成;")]), _vm._v(" "), _c('p', [_vm._v("6.如需了解详情规则，请到公众号－快速上手－"), _c('a', {
    attrs: {
      "href": "https://mp.weixin.qq.com/s?__biz=MzIxMTgwODE0Mw==&mid=2247484215&idx=5&sn=604cd9776a406f406b3a05b88f972b9c&scene=19#wechat_redirect"
    }
  }, [_vm._v("《 收益与分成 》")])])])
}]}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-806d4b4c", module.exports)
  }
}

/***/ }),

/***/ 1307:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(1039);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("24c614db", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-806d4b4c\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./myincome.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-806d4b4c\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./myincome.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 481:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1307)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(906),
  /* template */
  __webpack_require__(1198),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\personalCenter\\myincome.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] myincome.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-806d4b4c", Component.options)
  } else {
    hotAPI.reload("data-v-806d4b4c", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 744:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
//
//
//
//
//

exports.default = {
    props: ['title', 'path', 'icon', 'value']
};

/***/ }),

/***/ 746:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.cell {\n  font-size: 0.32rem;\n  color: #666;\n  height: 1rem;\n  line-height: 1rem !important;\n  display: -webkit-box;\n  display: -webkit-flex;\n  display: -ms-flexbox;\n  display: flex;\n  min-height: 0.96rem;\n  -webkit-box-align: center;\n  -webkit-align-items: center;\n      -ms-flex-align: center;\n          align-items: center;\n  border-bottom: 1px solid #fff;\n  /*.mint-cell-wrapper .mint-cell-title span:first-child {\r\n                width: 0.6rem;\r\n                height: 55px;\r\n                background-color: #fff;\r\n                !*z-index: 11;*!\r\n            } */\n}\n.cell:last-child {\n    border-bottom: none;\n}\n.cell:before {\n    content: '';\n    display: inline-block;\n    position: absolute;\n    left: 0;\n    bottom: 0px;\n    height: .02rem;\n    z-index: 11;\n    width: 100%;\n    background-color: #f7f7f7;\n}\n.cell .mint-cell-text {\n    font-size: 0.32rem;\n    color: #353535;\n}\n.cell .mint-cell-value.is-link {\n    margin-right: 0.64rem;\n    font-size: 0.32rem;\n    color: #999;\n}\n.cell .tab {\n    display: -webkit-box;\n    display: -webkit-flex;\n    display: -ms-flexbox;\n    display: flex;\n    -webkit-box-pack: center;\n    -webkit-justify-content: center;\n        -ms-flex-pack: center;\n            justify-content: center;\n    -webkit-box-align: center;\n    -webkit-align-items: center;\n        -ms-flex-align: center;\n            align-items: center;\n}\n.cell .mint-cell-wrapper {\n    padding: 0;\n}\n.cell .mint-cell-wrapper .mint-cell-title {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n}\n.cell .mint-cell-wrapper .mint-cell-title span:first-child {\n        width: 0.6rem;\n        margin-right: .24rem;\n}\n.cell .mint-cell-allow-right:after {\n    right: 2px;\n    border-color: #888888;\n}\n.mint-cell {\n  min-height: 0.96rem;\n}\n", ""]);

// exports


/***/ }),

/***/ 788:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(793)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(744),
  /* template */
  __webpack_require__(790),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\subcomponents\\personalCenter\\cell.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] cell.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-7326d26e", Component.options)
  } else {
    hotAPI.reload("data-v-7326d26e", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 790:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('mt-cell', {
    staticClass: "cell",
    attrs: {
      "title": _vm.title,
      "to": _vm.path,
      "is-link": "",
      "value": _vm.value || ''
    }
  }, [_c('span', {
    staticClass: "tab",
    class: _vm.icon,
    slot: "icon"
  })])
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-7326d26e", module.exports)
  }
}

/***/ }),

/***/ 793:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(746);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("589e48bc", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-7326d26e\",\"scoped\":false,\"hasInlineConfig\":true}!../../../node_modules/sass-loader/lib/loader.js!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./cell.vue", function() {
     var newContent = require("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-7326d26e\",\"scoped\":false,\"hasInlineConfig\":true}!../../../node_modules/sass-loader/lib/loader.js!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./cell.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 906:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function(NProgress) {

Object.defineProperty(exports, "__esModule", {
    value: true
});

var _mintUi = __webpack_require__(54);

var _cell = __webpack_require__(788);

var _cell2 = _interopRequireDefault(_cell);

var _nomore = __webpack_require__(135);

var _nomore2 = _interopRequireDefault(_nomore);

var _vuex = __webpack_require__(70);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

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
exports.default = {
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
            left: true,
            totalincome: "0.00",
            cantakeincome: "0.00",
            // showtakemoney: false,
            // totakemoney: '',
            applysuccess: false,
            temp: 0, //读取完毕变量
            courseList: [],
            courseTotal: "0.00",
            divideList: [],
            divideTotal: "0.00",
            maxCanTakeOnce: 1000,
            takemoney: 0, //本次提现金额
            singleFinish: false,
            divideFinish: false
        };
    },
    created: function created() {
        var _this = this;

        this.$store.commit('setTitle', '我的收益');
        this.$store.dispatch('getUserInfo', function (res) {
            _this.getData();
            _this.getCourseData();
        });
        if (this.type == 2) {
            this.left = false;
        }
        // Indicator.open()
        NProgress.start();
        // this.$emit('hideTabber')
        this.$store.commit('hideTabber');
    },
    destroyed: function destroyed() {
        // Indicator.close()
        NProgress.done();
    },

    methods: {
        getData: function getData() {
            var _this2 = this;

            this.$http.post(this.hostUrl + '/Income/userAccount', { user_id: this.userId }, { emulateJSON: true }).then(function (res) {
                _this2.temp++;
                if (res.body.code == 0) {
                    _this2.totalincome = res.body.data.income_total;
                    _this2.cantakeincome = res.body.data.income;
                }
            });
        },
        getCourseData: function getCourseData(fn) {
            var _this3 = this;

            if (this.type == 1) {
                this.$http.post(this.hostUrl + '/Income/classIncome', { user_id: this.userId }, { emulateJSON: true }).then(function (res) {
                    _this3.temp++;
                    console.log(res.body);
                    _this3.courseList = res.body.data.data;
                    _this3.courseTotal = res.body.data.total;
                    _this3.singleFinish = true;
                    if (fn) {
                        fn();
                    }
                });
            }
        },
        getDivideData: function getDivideData(fn) {
            var _this4 = this;

            this.$http.post(this.hostUrl + '/Income/income', { user_id: this.userId }, { emulateJSON: true }).then(function (res) {
                console.log(res.body);
                _this4.divideList = res.body.data.data;
                _this4.divideTotal = res.body.data.total;
                _this4.divideFinish = true;
                if (fn) {
                    fn();
                }
            });
        },
        takecash: function takecash() {
            var _this5 = this;

            if (this.cantakeincome < 1) {
                (0, _mintUi.Toast)('满1元才可提现');
            } else {
                this.takemoney = this.cantakeincome > this.maxCanTakeOnce ? this.maxCanTakeOnce : this.cantakeincome;
                this.$http.post(this.hostUrl + '/WechatCashout/prepare', { user_id: this.userId, amount: this.takemoney }, { emulateJSON: true }).then(function (res) {
                    console.log(res.body);
                    if (res.body.code == 0) {
                        _this5.applysuccess = true;
                        _this5.getData();
                        document.body.scrollTop = 0;
                    }
                });
            }
        }
    },
    components: {
        nomore: _nomore2.default,
        cell: _cell2.default
    },
    watch: {
        left: function left(val) {
            // Indicator.open()
            NProgress.start();
            if (val) {
                this.getCourseData(function () {
                    // Indicator.close()
                    NProgress.done();
                });
            } else {
                this.getDivideData(function () {
                    // Indicator.close()
                    NProgress.done();
                });
            }
        },
        temp: function temp(val) {
            if (val == 2) {
                // Indicator.close()
                NProgress.done();
            }
        },
        type: function type(val) {
            if (val == 2) {
                this.left = false;
            }
        }
    }
};
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(99)))

/***/ })

});