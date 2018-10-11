webpackJsonp([81],{

/***/ 1013:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.system {\n  height: 100%;\n  display: -webkit-box;\n  display: -webkit-flex;\n  display: -ms-flexbox;\n  display: flex;\n}\n.system .sidebar {\n    width: 244px;\n    min-width: 244px;\n    height: 100%;\n    background-color: #061223;\n    color: #fff;\n    font-size: 20px;\n    line-height: 48px;\n}\n.system .sidebar .logo {\n      height: 110px;\n      background: url(\"/images/system-logo.png\") no-repeat center center;\n}\n.system .sidebar .tabber a {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n      -webkit-box-pack: center;\n      -webkit-justify-content: center;\n          -ms-flex-pack: center;\n              justify-content: center;\n}\n.system .sidebar .tabber a.active {\n        background-color: #0e4e7f;\n}\n.system .sidebar .tabber a .sprite {\n        margin-right: 10px;\n}\n.system .sidebar .tabber a .sprite:before {\n          display: inline-block;\n          width: 22px;\n          height: 20px;\n          background-position: 0 -453px;\n          -webkit-transform: none;\n              -ms-transform: none;\n                  transform: none;\n}\n.system .content {\n    background-color: #f1f1f1;\n    display: -webkit-box;\n    display: -webkit-flex;\n    display: -ms-flexbox;\n    display: flex;\n    -webkit-box-orient: vertical;\n    -webkit-box-direction: normal;\n    -webkit-flex-direction: column;\n        -ms-flex-direction: column;\n            flex-direction: column;\n    -webkit-box-flex: 1;\n    -webkit-flex: 1;\n        -ms-flex: 1;\n            flex: 1;\n    overflow-y: hidden;\n    min-width: 900px;\n}\n.system .content .header {\n      background-color: #fff;\n      height: 100px;\n      margin-bottom: 10px;\n}\n.system .content .header .userinfo {\n        margin-top: 28px;\n        margin-right: 96px;\n        float: right;\n        height: 44px;\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-align: center;\n        -webkit-align-items: center;\n            -ms-flex-align: center;\n                align-items: center;\n        position: relative;\n}\n.system .content .header .userinfo .user-options {\n          padding-top: 5px;\n          display: none;\n          position: absolute;\n          bottom: 0;\n          right: 8px;\n          -webkit-transform: translate(50%, 100%);\n              -ms-transform: translate(50%, 100%);\n                  transform: translate(50%, 100%);\n}\n.system .content .header .userinfo .user-options li a {\n            font-size: 16px;\n            color: #5f86fd;\n            padding: 5px 12px;\n            border: 1px solid #e5e5e5;\n            border-radius: 5px;\n            background-color: #f6fbfe;\n            white-space: nowrap;\n}\n.system .content .header .userinfo .user-options li a.sprite:before {\n              width: 20px;\n              height: 20px;\n              background-position: -117px -148px;\n              margin-right: 8px;\n              -webkit-transform: none;\n                  -ms-transform: none;\n                      transform: none;\n}\n.system .content .header .userinfo:hover .user-options {\n          display: block;\n}\n.system .content .header .userinfo img {\n          border-radius: 50%;\n          position: absolute;\n          top: 0;\n          left: 0;\n          -webkit-transform: translateX(-100%);\n              -ms-transform: translateX(-100%);\n                  transform: translateX(-100%);\n}\n.system .content .header .userinfo span {\n          margin-left: 20px;\n          margin-right: 20px;\n          font-size: 20px;\n          color: #666;\n}\n.system .content .header .userinfo .down-arrow {\n          display: inline-block;\n          width: 16px;\n          height: 10px;\n}\n.system .content .header .userinfo .down-arrow s {\n            display: block;\n            width: 0;\n            height: 0;\n            border-width: 10px 8px;\n            border-style: solid;\n            border-color: #999999 transparent transparent transparent;\n}\n.system .content .main-content {\n      background-color: #fff;\n      margin-left: 10px;\n      -webkit-box-flex: 1;\n      -webkit-flex: 1;\n          -ms-flex: 1;\n              flex: 1;\n}\n", ""]);

// exports


/***/ }),

/***/ 1171:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "system"
  }, [_c('div', {
    staticClass: "sidebar"
  }, [_c('div', {
    staticClass: "logo"
  }), _vm._v(" "), _c('div', {
    staticClass: "tabber"
  }, [_c('ul', [_c('li', [_c('router-link', {
    staticClass: "active",
    attrs: {
      "to": "/"
    }
  }, [_c('span', {
    staticClass: "sprite"
  }), _vm._v("我的直播间\n                    ")])], 1)])])]), _vm._v(" "), _c('div', {
    staticClass: "content"
  }, [_c('div', {
    staticClass: "header"
  }, [_c('div', {
    staticClass: "userinfo"
  }, [_c('img', {
    attrs: {
      "src": "/images/1.jpg",
      "width": "44",
      "height": "44",
      "alt": ""
    }
  }), _vm._v(" "), _c('span', [_vm._v(_vm._s(_vm.$store.state.userInfo.username))]), _vm._v(" "), _vm._m(0), _vm._v(" "), _vm._m(1)])]), _vm._v(" "), _c('router-view', {
    staticClass: "main-content",
    attrs: {
      "type": _vm.type
    }
  })], 1)])
},staticRenderFns: [function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('i', {
    staticClass: "down-arrow"
  }, [_c('s')])
},function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('ul', {
    staticClass: "user-options"
  }, [_c('li', [_c('a', {
    staticClass: "sprite",
    attrs: {
      "href": "javascript:;"
    }
  }, [_vm._v("退出登录")])])])
}]}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-55b30e9a", module.exports)
  }
}

/***/ }),

/***/ 1281:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(1013);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("14c884ac", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-55b30e9a\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./system.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-55b30e9a\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./system.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 457:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1281)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(882),
  /* template */
  __webpack_require__(1171),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\other\\system.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] system.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-55b30e9a", Component.options)
  } else {
    hotAPI.reload("data-v-55b30e9a", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 882:
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
    data: function data() {
        return {};
    },

    computed: {
        type: function type() {
            return this.$store.state.userInfo.type;
        }
    },
    created: function created() {
        if (this.$store.state.isWeiXin) {
            this.$router.replace('/personalCenter');
        }
        // this.$emit('hideTabber')
        this.$store.commit('hideTabber');
    }
};

/***/ })

});