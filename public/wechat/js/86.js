webpackJsonp([86],{

/***/ 1020:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.login {\n  min-width: 619px;\n  display: -webkit-box;\n  display: -webkit-flex;\n  display: -ms-flexbox;\n  display: flex;\n  -webkit-box-align: center;\n  -webkit-align-items: center;\n      -ms-flex-align: center;\n          align-items: center;\n  -webkit-box-pack: center;\n  -webkit-justify-content: center;\n      -ms-flex-pack: center;\n          justify-content: center;\n  text-align: center;\n  font: 18px 'PingFangSC', 'Microsoft Yahei', SimSun, Helvetica, Arial, sans-serif;\n  font-weight: lighter;\n  height: 100%;\n  position: relative;\n  background: url(\"/images/bg.png\") no-repeat center center;\n  background-size: cover;\n  color: #333;\n}\n.login .login-container {\n    background-color: #fff;\n    border-radius: 12px;\n    padding: 37px;\n    width: 545px;\n}\n.login .login-container .top {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      height: 120px;\n      padding-bottom: 35px;\n      -webkit-box-pack: justify;\n      -webkit-justify-content: space-between;\n          -ms-flex-pack: justify;\n              justify-content: space-between;\n      border-bottom: 1px solid #e0dfde;\n}\n.login .login-container .top .left {\n        width: 120px;\n        height: 120px;\n        border-radius: 6px;\n        background: url(\"/images/logo.png\") no-repeat;\n        background-size: cover;\n}\n.login .login-container .top .right {\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-orient: vertical;\n        -webkit-box-direction: normal;\n        -webkit-flex-direction: column;\n            -ms-flex-direction: column;\n                flex-direction: column;\n        -webkit-justify-content: space-around;\n            -ms-flex-pack: distribute;\n                justify-content: space-around;\n        font-size: 30px;\n}\n.login .login-container .top .right h3 {\n          font-weight: lighter;\n}\n.login .login-container .bottom h4 {\n      line-height: 73px;\n      font-size: 24px;\n}\n.login .login-container .bottom .qrcode {\n      margin: 0 auto;\n      width: 228px;\n      height: 228px;\n      border: 1px solid #fff;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-pack: center;\n      -webkit-justify-content: center;\n          -ms-flex-pack: center;\n              justify-content: center;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n      margin-bottom: 20px;\n}\n.login .login-container .bottom .qrcode img {\n        width: 208px;\n        height: 208px;\n}\n.login .login-container .bottom p {\n      font-size: 18px;\n      line-height: 30px;\n}\n", ""]);

// exports


/***/ }),

/***/ 1178:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "login"
  }, [_c('div', {
    staticClass: "login-container"
  }, [_vm._m(0), _vm._v(" "), _c('div', {
    staticClass: "bottom"
  }, [_c('iframe', {
    attrs: {
      "src": _vm.loginUrl,
      "frameborder": "0",
      "scrolling": "no",
      "allowtransparency": "true",
      "width": "300px",
      "height": "400px"
    }
  })], 1)])])
},staticRenderFns: [function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "top"
  }, [_c('div', {
    staticClass: "left"
  }), _vm._v(" "), _c('div', {
    staticClass: "right"
  }, [_c('h3', [_vm._v("投资旅途与智者同行")]), _vm._v(" "), _c('p', [_vm._v("www.99cj.com.cn")])])])
}]}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-654aa495", module.exports)
  }
}

/***/ }),

/***/ 1288:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(1020);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("b47dba7a", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-654aa495\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./login.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-654aa495\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./login.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 450:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1288)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(875),
  /* template */
  __webpack_require__(1178),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\other\\login.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] login.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-654aa495", Component.options)
  } else {
    hotAPI.reload("data-v-654aa495", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 875:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function($) {

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

exports.default = {
    props: ['loginUrl'],
    created: function created() {
        console.log('54454544', this.$store);
        if (this.$store.state.isWeiXin) {
            this.$router.replace('/index');
        }
        if (this.$store.state.userInfo.user_id) {
            this.$router.replace('/index');
        }
        // this.$emit('hideTabber')
        this.$store.commit('hideTabber');
    },
    mounted: function mounted() {
        $('.login').css('min-height', $('.login-container').outerHeight());
    }
};
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(49)))

/***/ })

});