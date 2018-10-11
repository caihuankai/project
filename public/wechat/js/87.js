webpackJsonp([87],{

/***/ 1130:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "forbidden"
  }, [(_vm.$route.params.status == 1) ? [_c('img', {
    attrs: {
      "src": "/images/forbidden.png",
      "width": "64",
      "alt": ""
    }
  }), _vm._v(" "), _c('p', [_vm._v("内容已被禁用")]), _vm._v(" "), _c('p', [_vm._v("2秒后跳转到首页，发现更多内容！")])] : [_c('img', {
    attrs: {
      "src": "/images/forbidden.png",
      "width": "64",
      "alt": ""
    }
  }), _vm._v(" "), _c('p', [_vm._v("您已经被禁用")]), _vm._v(" "), _c('p', [_vm._v("请在公众号回复申请解禁需求")])]], 2)
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-118cdf25", module.exports)
  }
}

/***/ }),

/***/ 1243:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(972);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("3033913e", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-118cdf25\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./forbidden.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-118cdf25\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./forbidden.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 447:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1243)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(872),
  /* template */
  __webpack_require__(1130),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\other\\forbidden.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] forbidden.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-118cdf25", Component.options)
  } else {
    hotAPI.reload("data-v-118cdf25", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 872:
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

exports.default = {
    computed: {
        userId: function userId() {
            return this.$store.state.userInfo.user_id;
        }
    },
    created: function created() {
        if (this.$route.params.status == 1) {
            this.$store.commit('showTabber');
        } else {
            this.$store.commit('hideTabber');
        }
        this.goIndex();
    },
    methods: {
        goIndex: function goIndex() {
            var _this = this;

            if (this.$route.params.status == 1) {
                setTimeout(function () {
                    _this.$router.push("/index/" + _this.userId);
                }, 2000);
            }
        }
    }

};

/***/ }),

/***/ 972:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.forbidden {\n  min-height: 100%;\n  background-color: #f0f0f0;\n  padding-top: 30%;\n  box-sizing: border-box;\n  display: -webkit-box;\n  display: -webkit-flex;\n  display: -ms-flexbox;\n  display: flex;\n  -webkit-box-orient: vertical;\n  -webkit-box-direction: normal;\n  -webkit-flex-direction: column;\n      -ms-flex-direction: column;\n          flex-direction: column;\n  -webkit-box-align: center;\n  -webkit-align-items: center;\n      -ms-flex-align: center;\n          align-items: center;\n  line-height: 32px;\n  font-size: 18px;\n  color: #b2b2b2;\n}\n.forbidden img {\n    margin-bottom: 8px;\n}\n", ""]);

// exports


/***/ })

});