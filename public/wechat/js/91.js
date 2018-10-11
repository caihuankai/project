webpackJsonp([91],{

/***/ 1003:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.live-tab {\n  background: #f6f8f9;\n}\n.live-tab header {\n    width: 100%;\n    height: 4.6rem;\n    position: relative;\n    overflow: hidden;\n}\n.live-tab header.header1 {\n      background: url(\"/images/live-tab/live-tab-header-01.png\") no-repeat;\n      background-size: 100% 100%;\n}\n.live-tab header.header2 {\n      background: url(\"/images/live-tab/live-tab-header-02.png\") no-repeat;\n      background-size: 100% 100%;\n}\n.live-tab header.header3 {\n      background: url(\"/images/live-tab/live-tab-header-03.png\") no-repeat;\n      background-size: 100% 100%;\n}\n.live-tab header nav {\n      margin: 2.75rem 1.1rem 0 1.1rem;\n}\n.live-tab header .mint-navbar {\n      width: 100%;\n      position: relative;\n      background: rgba(255, 255, 255, 0);\n}\n.live-tab header .mint-navbar::after {\n        content: '';\n        display: block;\n        width: 0.68rem;\n        height: 0.04rem;\n        background: #fefefe;\n        margin: 0 auto;\n        position: absolute;\n        bottom: .14rem;\n        border-radius: .2rem;\n        -webkit-transition: left .3s ease;\n        transition: left .3s ease;\n        -webkit-transform: translateX(-50%);\n            -ms-transform: translateX(-50%);\n                transform: translateX(-50%);\n}\n.live-tab header .mint-navbar.selected1::after {\n        left: 16.6666%;\n}\n.live-tab header .mint-navbar.selected2::after {\n        left: 50%;\n}\n.live-tab header .mint-navbar.selected3::after {\n        left: 83.3333%;\n}\n.live-tab header .mint-navbar .mint-tab-item-label {\n        font-size: 0.32rem;\n        color: #333;\n        text-align: center;\n}\n.live-tab header .mint-navbar .mint-tab-item-label span {\n          display: block;\n          height: 0.92rem;\n          line-height: 0.92rem;\n          color: #ffbdbd;\n          font-size: .32rem;\n}\n.live-tab header .mint-navbar .mint-tab-item {\n        padding: 0;\n        text-align: center;\n}\n.live-tab header .mint-navbar .mint-tab-item.is-selected {\n        border: none;\n}\n.live-tab header .mint-navbar .mint-tab-item.is-selected .mint-tab-item-label span {\n          color: #fff !important;\n          margin-bottom: 0;\n}\n.live-tab .content {\n    margin-top: -.92rem;\n}\n.live-tab .article .live-list {\n    padding: 0 .24rem;\n    margin-bottom: 1rem;\n}\n.live-tab .article .live-list li {\n      padding: .2rem;\n      background: #ffffff;\n      margin-bottom: .2rem;\n      border: 1px solid #ededed;\n}\n.live-tab .article .live-list li:last-child {\n        margin-bottom: 0;\n}\n.live-tab .article .live-list li .info-left {\n        float: left;\n        padding-bottom: 0.7rem;\n}\n.live-tab .article .live-list li .info-left span {\n          display: inline-block;\n          width: .5rem;\n          height: .5rem;\n          background: #888888;\n          color: #fff;\n          font-weight: bold;\n          border-radius: 50%;\n          line-height: .5rem;\n          text-align: center;\n          vertical-align: middle;\n}\n.live-tab .article .live-list li .info-left span.margin {\n            margin: 0 .05rem;\n}\n.live-tab .article .live-list li .info-left span.top-1 {\n            width: .58rem;\n            height: .64rem;\n            background: url(\"/images/live-tab/top-01.png\") no-repeat top center;\n            background-size: 100% 100%;\n            border-radius: 0;\n}\n.live-tab .article .live-list li .info-left span.top-2 {\n            width: .58rem;\n            height: .64rem;\n            background: url(\"/images/live-tab/top-02.png\") no-repeat top center;\n            background-size: 100% 100%;\n            border-radius: 0;\n}\n.live-tab .article .live-list li .info-left span.top-3 {\n            width: .58rem;\n            height: .64rem;\n            background: url(\"/images/live-tab/top-03.png\") no-repeat top center;\n            background-size: 100% 100%;\n            border-radius: 0;\n}\n.live-tab .article .live-list li .info-left img {\n          width: .8rem;\n          height: .8rem;\n          border-radius: 50%;\n          margin-left: .2rem;\n          margin-right: .16rem;\n}\n.live-tab .article .live-list li .info-right .top {\n        position: relative;\n        margin-bottom: .15rem;\n}\n.live-tab .article .live-list li .info-right .top h4 {\n          font-size: .28rem;\n          color: #1c0808;\n}\n.live-tab .article .live-list li .info-right .top .online i {\n          display: inline-block;\n          vertical-align: middle;\n          background: #000;\n          margin-right: .08rem;\n}\n.live-tab .article .live-list li .info-right .top .online i:nth-child(1) {\n          width: .21rem;\n          height: .24rem;\n          background: url(\"/images/live-tab/icon-01.png\") no-repeat center center;\n          background-size: 100% 100%;\n}\n.live-tab .article .live-list li .info-right .top .online i:nth-child(3) {\n          width: .22rem;\n          height: .24rem;\n          background: url(\"/images/live-tab/icon-02.png\") no-repeat center center;\n          background-size: 100% 100%;\n}\n.live-tab .article .live-list li .info-right .top .online span {\n          font-size: .24rem;\n          color: #888888;\n          margin-right: .34rem;\n}\n.live-tab .article .live-list li .info-right .top .zan i {\n          display: inline-block;\n          width: .22rem;\n          height: .24rem;\n          vertical-align: middle;\n          background: #000;\n          margin-right: .08rem;\n}\n.live-tab .article .live-list li .info-right .top .zan i:nth-child(1) {\n          background: url(\"/images/live-tab/icon-03.png\") no-repeat center center;\n          background-size: 100% 100%;\n}\n.live-tab .article .live-list li .info-right .top .zan span {\n          font-size: .24rem;\n          color: #888888;\n          margin-right: .34rem;\n}\n.live-tab .article .live-list li .info-right .top .button {\n          position: absolute;\n          top: 0.1rem;\n          right: 0;\n          width: 1.1rem;\n          padding: .1rem 0;\n          border-radius: 50px;\n          text-align: center;\n          color: #ffffff;\n          font-size: .28rem;\n          font-weight: bold;\n          border: none;\n}\n.live-tab .article .live-list li .info-right .top .button.no-focus {\n            background: #c62f2f;\n            /*box-shadow: 0px 0px 10px #fc8c8c;*/\n}\n.live-tab .article .live-list li .info-right .top .button.is-focus {\n            background: #888888;\n}\n.live-tab .article .live-list li .info-right p {\n        font-size: .24rem;\n        color: #888888;\n        line-height: .34rem;\n        overflow: hidden;\n        text-overflow: ellipsis;\n        white-space: nowrap;\n        margin-bottom: .05rem;\n}\n.live-tab .loading-ico {\n    display: -webkit-box;\n    display: -webkit-flex;\n    display: -ms-flexbox;\n    display: flex;\n    -webkit-box-align: center;\n    -webkit-align-items: center;\n        -ms-flex-align: center;\n            align-items: center;\n    -webkit-box-pack: center;\n    -webkit-justify-content: center;\n        -ms-flex-pack: center;\n            justify-content: center;\n    color: #b2b2b2;\n    line-height: 40px;\n    font-size: 14px;\n}\n.live-tab .loading-ico span:first-child {\n      margin-right: 5px;\n}\n.live-tab .tips {\n    height: .6rem;\n    line-height: .6rem;\n    text-align: center;\n    font-size: .24rem;\n    color: #b2b2b2;\n}\n.live-tab .s-font {\n    font-size: .24rem;\n}\n", ""]);

// exports


/***/ }),

/***/ 1161:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('main', {
    staticClass: "live-tab"
  }, [_c('header', {
    staticClass: "header1",
    class: {
      'header1': _vm.selected == 1, 'header2': _vm.selected == 2, 'header3': _vm.selected == 3
    }
  }, [_c('nav', [_c('mt-navbar', {
    class: {
      'selected1': _vm.selected == 1, 'selected2': _vm.selected == 2, 'selected3': _vm.selected == 3
    },
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
        _vm.getListData(3)
      }
    }
  }, [_vm._v("在线人数")])]), _vm._v(" "), _c('mt-tab-item', {
    attrs: {
      "id": "2"
    }
  }, [_c('span', {
    on: {
      "click": function($event) {
        _vm.getListData(2)
      }
    }
  }, [_vm._v("礼物最多")])]), _vm._v(" "), _c('mt-tab-item', {
    attrs: {
      "id": "3"
    }
  }, [_c('span', {
    on: {
      "click": function($event) {
        _vm.getListData(1)
      }
    }
  }, [_vm._v("人气热门")])])], 1)], 1)]), _vm._v(" "), _c('main', {
    directives: [{
      name: "infinite-scroll",
      rawName: "v-infinite-scroll",
      value: (_vm.loadMore),
      expression: "loadMore"
    }],
    staticClass: "content",
    attrs: {
      "infinite-scroll-disabled": "loading",
      "infinite-scroll-distance": "250",
      "infinite-scroll-immediate-check": "false"
    }
  }, [_c('mt-tab-container', {
    model: {
      value: (_vm.selected),
      callback: function($$v) {
        _vm.selected = $$v
      },
      expression: "selected"
    }
  }, [_c('mt-tab-container-item', {
    attrs: {
      "id": "1"
    }
  }, [_c('article', {
    staticClass: "article"
  }, [_c('ul', {
    staticClass: "live-list"
  }, [_vm._l((_vm.listData), function(item, index) {
    return _c('li', [_c('router-link', {
      attrs: {
        "to": ("/personalSpace/lobbyPage/" + (item.user_id) + "/" + _vm.userId)
      }
    }, [_c('div', {
      staticClass: "info-left"
    }, [_c('span', {
      class: {
        'top-1': index == 0, 'top-2': index == 1, 'top-3': index == 2, 's-font': index > 98, 'margin': index > 2
      }
    }, [_vm._v("\n                                        " + _vm._s(index > 2 ? (index > 999 ? '999' : index + 1) : '') + "\n                                    ")]), _vm._v(" "), _c('img', {
      attrs: {
        "src": item.head_add,
        "alt": "头像"
      }
    })]), _vm._v(" "), _c('section', {
      staticClass: "info-right"
    }, [_c('div', {
      staticClass: "top"
    }, [_c('h4', [_vm._v(_vm._s(item.alias.length > 10 ? item.alias.substr(0, 9) + '...' : item.alias))]), _vm._v(" "), _c('div', {
      staticClass: "online"
    }, [_c('i'), _c('span', [_vm._v(_vm._s(item.popular))]), _vm._v(" "), _c('i'), _c('span', [_vm._v(_vm._s(item.focus_num))])]), _vm._v(" "), _c('span', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (_vm.userId != item.user_id),
        expression: "userId != item.user_id"
      }],
      staticClass: "button",
      class: {
        'is-focus': item.is_focus == 1, 'no-focus': item.is_focus == 0
      },
      on: {
        "click": function($event) {
          $event.stopPropagation();
          $event.preventDefault();
          _vm.focusClick(item)
        }
      }
    }, [_vm._v("\n                                            " + _vm._s(item.is_focus == 1 ? "已关注" : "关注") + "\n                                        ")])]), _vm._v(" "), _c('p', [_vm._v("当前主题：" + _vm._s(item.theme ? item.theme : item.alias + '的直播间'))]), _vm._v(" "), _c('p', [_vm._v("在线人数：" + _vm._s(item.online_num) + "人")])])])], 1)
  }), _vm._v(" "), _c('div', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.loading && !_vm.isEnd),
      expression: "loading && !isEnd"
    }],
    staticClass: "loading-ico"
  }, [_c('mt-spinner', {
    attrs: {
      "type": "fading-circle",
      "size": 18
    }
  }), _vm._v(" "), _c('span', [_vm._v("正在加载")])], 1), _vm._v(" "), _c('section', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.isEnd),
      expression: "isEnd"
    }],
    staticClass: "tips"
  }, [_vm._v("\n                            以上观点仅供参考，不构成投资建议\n                        ")]), _vm._v(" "), _c('nomore', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.isEnd),
      expression: "isEnd"
    }],
    attrs: {
      "text": "没有更多啦"
    }
  })], 2)])]), _vm._v(" "), _c('mt-tab-container-item', {
    attrs: {
      "id": "2"
    }
  }, [_c('article', {
    staticClass: "article"
  }, [_c('ul', {
    staticClass: "live-list"
  }, [_vm._l((_vm.listData), function(item, index) {
    return _c('li', [_c('router-link', {
      attrs: {
        "to": ("/personalSpace/lobbyPage/" + (item.user_id) + "/" + _vm.userId)
      }
    }, [_c('div', {
      staticClass: "info-left"
    }, [_c('span', {
      class: {
        'top-1': index == 0, 'top-2': index == 1, 'top-3': index == 2, 's-font': index > 98, 'margin': index > 2
      }
    }, [_vm._v("\n                                        " + _vm._s(index > 2 ? (index > 999 ? '999' : index + 1) : '') + "\n                                    ")]), _vm._v(" "), _c('img', {
      attrs: {
        "src": item.head_add,
        "alt": "头像"
      }
    })]), _vm._v(" "), _c('section', {
      staticClass: "info-right"
    }, [_c('div', {
      staticClass: "top"
    }, [_c('h4', [_vm._v(_vm._s(item.alias.length > 10 ? item.alias.substr(0, 9) + '...' : item.alias))]), _vm._v(" "), _c('div', {
      staticClass: "zan"
    }, [_c('i'), _c('span', [_vm._v(_vm._s(item.admire_num))])]), _vm._v(" "), _c('span', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (_vm.userId != item.user_id),
        expression: "userId != item.user_id"
      }],
      staticClass: "button",
      class: {
        'is-focus': item.is_focus == 1, 'no-focus': item.is_focus == 0
      },
      on: {
        "click": function($event) {
          $event.stopPropagation();
          $event.preventDefault();
          _vm.focusClick(item)
        }
      }
    }, [_vm._v("\n                                            " + _vm._s(item.is_focus == 1 ? "已关注" : "关注") + "\n                                        ")])]), _vm._v(" "), _c('p', [_vm._v("当前主题：" + _vm._s(item.theme ? item.theme : item.alias + '的直播间'))]), _vm._v(" "), _c('p', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (item.latest_gift_name),
        expression: "item.latest_gift_name"
      }]
    }, [_vm._v("最近收到：" + _vm._s(item.latest_gift_name))])])])], 1)
  }), _vm._v(" "), _c('div', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.loading && !_vm.isEnd),
      expression: "loading && !isEnd"
    }],
    staticClass: "loading-ico"
  }, [_c('mt-spinner', {
    attrs: {
      "type": "fading-circle",
      "size": 18
    }
  }), _vm._v(" "), _c('span', [_vm._v("正在加载")])], 1), _vm._v(" "), _c('section', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.isEnd),
      expression: "isEnd"
    }],
    staticClass: "tips"
  }, [_vm._v("\n                            以上观点仅供参考，不构成投资建议\n                        ")]), _vm._v(" "), _c('nomore', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.isEnd),
      expression: "isEnd"
    }],
    attrs: {
      "text": "没有更多啦"
    }
  })], 2)])]), _vm._v(" "), _c('mt-tab-container-item', {
    attrs: {
      "id": "3"
    }
  }, [_c('article', {
    staticClass: "article"
  }, [_c('ul', {
    staticClass: "live-list"
  }, [_vm._l((_vm.listData), function(item, index) {
    return _c('li', [_c('router-link', {
      attrs: {
        "to": ("/personalSpace/lobbyPage/" + (item.user_id) + "/" + _vm.userId)
      }
    }, [_c('div', {
      staticClass: "info-left"
    }, [_c('span', {
      class: {
        'top-1': index == 0, 'top-2': index == 1, 'top-3': index == 2, 's-font': index > 98, 'margin': index > 2
      }
    }, [_vm._v("\n                                        " + _vm._s(index > 2 ? (index > 999 ? '999' : index + 1) : '') + "\n                                    ")]), _vm._v(" "), _c('img', {
      attrs: {
        "src": item.head_add,
        "alt": "头像"
      }
    })]), _vm._v(" "), _c('section', {
      staticClass: "info-right"
    }, [_c('div', {
      staticClass: "top"
    }, [_c('h4', [_vm._v(_vm._s(item.alias.length > 10 ? item.alias.substr(0, 9) + '...' : item.alias))]), _vm._v(" "), _c('div', {
      staticClass: "online"
    }, [_c('i'), _c('span', [_vm._v(_vm._s(item.popular))]), _vm._v(" "), _c('i'), _c('span', [_vm._v(_vm._s(item.focus_num))])]), _vm._v(" "), _c('span', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (_vm.userId != item.user_id),
        expression: "userId != item.user_id"
      }],
      staticClass: "button",
      class: {
        'is-focus': item.is_focus == 1, 'no-focus': item.is_focus == 0
      },
      on: {
        "click": function($event) {
          $event.stopPropagation();
          $event.preventDefault();
          _vm.focusClick(item)
        }
      }
    }, [_vm._v("\n                                            " + _vm._s(item.is_focus == 1 ? "已关注" : "关注") + "\n                                        ")])]), _vm._v(" "), _c('p', [_vm._v("当前主题：" + _vm._s(item.theme ? item.theme : item.alias + '的直播间'))]), _vm._v(" "), _c('p', [_vm._v("今日发布：" + _vm._s(item.publish_num) + "条内容")])])])], 1)
  }), _vm._v(" "), _c('div', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.loading && !_vm.isEnd),
      expression: "loading && !isEnd"
    }],
    staticClass: "loading-ico"
  }, [_c('mt-spinner', {
    attrs: {
      "type": "fading-circle",
      "size": 18
    }
  }), _vm._v(" "), _c('span', [_vm._v("正在加载")])], 1), _vm._v(" "), _c('section', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.isEnd),
      expression: "isEnd"
    }],
    staticClass: "tips"
  }, [_vm._v("\n                            以上观点仅供参考，不构成投资建议\n                        ")]), _vm._v(" "), _c('nomore', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.isEnd),
      expression: "isEnd"
    }],
    attrs: {
      "text": "没有更多啦"
    }
  })], 2)])])], 1)], 1)])
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-45c7260d", module.exports)
  }
}

/***/ }),

/***/ 1271:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(1003);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("ae3f0aa2", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-45c7260d\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./liveListTab.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-45c7260d\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./liveListTab.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 443:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1271)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(868),
  /* template */
  __webpack_require__(1161),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\live\\liveListTab.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] liveListTab.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-45c7260d", Component.options)
  } else {
    hotAPI.reload("data-v-45c7260d", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 868:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
	value: true
});

var _nomore = __webpack_require__(135);

var _nomore2 = _interopRequireDefault(_nomore);

var _mintUi = __webpack_require__(54);

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

exports.default = {
	computed: (0, _vuex.mapState)({
		userId: function userId(state) {
			return state.userInfo.user_id;
		},
		isWeiXin: function isWeiXin(state) {
			return state.isWeiXin;
		}
	}),
	data: function data() {
		return {
			selected: '1',
			firstItem: '',
			listData: [],
			loading: false,
			params: {
				type: 1,
				user_id: '',
				page: 1
			},
			isEnd: false
		};
	},
	created: function created() {
		var _this = this;

		this.$store.commit('setTitle', 'Live直播');
		this.getListData(3);
		this.$store.commit('showTabber');
		this.share_fansVisit();

		wx.ready(function () {
			//分享页面链接
			_this.wxShare({
				title: '最有料的金融投资大咖都在这里',
				desc: '戳此进入',
				link: window.location.origin + '/#/liveTab/' + _this.userId
			});
		});
		wx.error();
	},
	beforeRouteEnter: function beforeRouteEnter(to, from, next) {
		if (from.path.indexOf('shaking') !== -1) {
			sessionStorage.setItem("onloadShake", "1");
		}
		next();
	},

	methods: {
		getListData: function getListData(type) {
			var _this2 = this;

			//type 1:人气值    2：赞赏次数  3：在线人数
			//            alert(this.isWeiXin);
			this.$store.dispatch('getUserInfo', function (res) {
				_this2.listData = [];
				_this2.firstItem = '';
				_this2.params = {
					type: type,
					user_id: _this2.userId,
					page: 1
				};
				_this2.$http.post(_this2.hostUrl + '/Home/popularLive', _this2.params, { emulateJSON: true }).then(function (res) {
					if (res.body.code == 0) {
						_this2.firstItem = res.body.data[0];
						//                        this.listData = res.body.data.splice(1, res.body.data.length);
						_this2.listData = res.body.data;
						if (res.body.data.length < 9) {
							_this2.loading = true;
							_this2.isEnd = true;
						}
						_this2.loading = false;
						_this2.isEnd = false;
						console.log('this.selected', _this2.selected);
					}
				});
			});
			document.body.scrollTop = 0;
		},
		loadMore: function loadMore() {
			var _this3 = this;

			this.loading = true;
			//              console.log('this.isEnd',this.isEnd);
			if (!this.isEnd) {
				this.params.page++;
				setTimeout(function () {
					_this3.$http.post(_this3.hostUrl + '/Home/popularLive', _this3.params, { emulateJSON: true }).then(function (res) {
						console.log('this.params', _this3.params);
						if (res.body.code == 0) {
							_this3.listData = _this3.listData.concat(res.body.data);
							if (res.body.data.length < 10) {
								_this3.isEnd = true;
							}
							_this3.loading = false;
						}
					});
				}, 1000);
			}
		},
		focusClick: function focusClick(item) {
			this.$http.post(this.hostUrl + '/Focus/addFocus', {
				user_id: this.userId,
				live_id: item.live_id,
				type: item.is_focus == 1 ? 0 : 1
			}, { emulateJSON: true }).then(function (res) {
				if (res.body.code == 0) {
					(0, _mintUi.Toast)({
						message: res.body.msg,
						duration: 800
					});
					item.is_focus = item.is_focus == 1 ? 0 : 1;
				}
			});
		}
	},
	components: {
		nomore: _nomore2.default
	}

};

/***/ })

});