webpackJsonp([53],{

/***/ 1136:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "system-my-live"
  }, [(_vm.$store.state.userInfo.type == 1) ? _c('div', {
    staticClass: "live-info"
  }, [_c('img', {
    staticClass: "avatar",
    attrs: {
      "src": _vm.$store.state.userInfo.img,
      "alt": ""
    }
  }), _vm._v(" "), _vm._m(0), _vm._v(" "), _c('a', {
    staticClass: "goliveroom",
    attrs: {
      "href": "/"
    }
  }, [_vm._v("进入直播间")]), _vm._v(" "), _c('a', {
    staticClass: "copy-url",
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": _vm.copy
    }
  }, [_vm._v("复制且分享直播间")]), _vm._v(" "), _c('p', {
    ref: "url",
    staticClass: "url"
  }, [_vm._v("http://www.163.com")])]) : _c('div', {
    staticClass: "no-live"
  }, [_c('div', {
    staticClass: "title"
  }, [_c('span', [_vm._v("郭碧婷还没有创建直播间哦！")]), _vm._v(" "), _c('a', {
    attrs: {
      "href": "javascript:;"
    }
  }, [_vm._v("立即创建我的直播间")])]), _vm._v(" "), _c('div', {
    staticClass: "live-advantage"
  }, [_c('h2', [_vm._v("创建直播间能做什么：")]), _vm._v(" "), _c('p', [_vm._v("1、所有功能全部免费，永久免费。")]), _vm._v(" "), _c('p', [_vm._v("2、创建直播话题数量和嘉宾听众人数无上限。")]), _vm._v(" "), _c('p', [_vm._v("3、课程内容永久保存，随时回放。")]), _vm._v(" "), _c('p', [_vm._v("4、直播间可嵌入公众号，网站，方便传播。")]), _vm._v(" "), _c('p', [_vm._v("5、邀请卡分享课程到微信/QQ群、朋友圈、微博。")]), _vm._v(" "), _c('p', [_vm._v("6、提供加密收费、免费课程，拉粉还是收益任君选择。")])])])])
},staticRenderFns: [function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "info-text"
  }, [_c('h3', [_vm._v("股行天下")]), _vm._v(" "), _c('p', [_vm._v("关注人数：8991人")])])
}]}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-1fc1afd9", module.exports)
  }
}

/***/ }),

/***/ 1249:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(978);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("d9b3f252", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-1fc1afd9\",\"scoped\":false,\"hasInlineConfig\":true}!../../../node_modules/sass-loader/lib/loader.js!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./systemmylive.vue", function() {
     var newContent = require("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-1fc1afd9\",\"scoped\":false,\"hasInlineConfig\":true}!../../../node_modules/sass-loader/lib/loader.js!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./systemmylive.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 510:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1249)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(944),
  /* template */
  __webpack_require__(1136),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\subcomponents\\system\\systemmylive.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] systemmylive.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-1fc1afd9", Component.options)
  } else {
    hotAPI.reload("data-v-1fc1afd9", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 944:
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

exports.default = {
    methods: {
        copy: function copy() {
            window.getSelection().removeAllRanges();
            var range = document.createRange();
            range.selectNode(this.$refs.url);
            window.getSelection().addRange(range);
            document.execCommand('copy');
            window.getSelection().removeRange(range);
            this.$message({
                message: '已复制成功',
                type: 'success',
                duration: 2000
            });
        }
    }
};

/***/ }),

/***/ 978:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.system-my-live .live-info {\n  display: -webkit-box;\n  display: -webkit-flex;\n  display: -ms-flexbox;\n  display: flex;\n  padding-top: 30px;\n  padding-left: 50px;\n  height: 90px;\n  overflow-y: hidden;\n  -webkit-box-align: center;\n  -webkit-align-items: center;\n      -ms-flex-align: center;\n          align-items: center;\n}\n.system-my-live .live-info .avatar {\n    width: 90px;\n    height: 90px;\n    border-radius: 6px;\n    margin-right: 24px;\n}\n.system-my-live .live-info .info-text {\n    display: -webkit-box;\n    display: -webkit-flex;\n    display: -ms-flexbox;\n    display: flex;\n    -webkit-box-orient: vertical;\n    -webkit-box-direction: normal;\n    -webkit-flex-direction: column;\n        -ms-flex-direction: column;\n            flex-direction: column;\n    -webkit-box-pack: justify;\n    -webkit-justify-content: space-between;\n        -ms-flex-pack: justify;\n            justify-content: space-between;\n    margin-right: 90px;\n    height: 90px;\n}\n.system-my-live .live-info .info-text h3 {\n      font-size: 24px;\n      font-weight: normal;\n      color: #333;\n      line-height: 40px;\n}\n.system-my-live .live-info .info-text p {\n      font-size: 18px;\n      color: #666;\n      line-height: 30px;\n}\n.system-my-live .live-info .goliveroom,\n  .system-my-live .live-info .copy-url {\n    font-size: 18px;\n    color: #f52020;\n    line-height: 1;\n    padding: 9px;\n    border: 1px solid #f52020;\n    border-radius: 5px;\n    background-color: #fff8f8;\n}\n.system-my-live .live-info .copy-url {\n    color: #5f86fd;\n    border-color: #5f86fd;\n    background-color: #f4faff;\n    margin-left: 30px;\n    margin-right: 20px;\n}\n.system-my-live .live-info .url {\n    font-size: 18px;\n    color: #5f86fd;\n}\n.system-my-live .no-live {\n  padding-left: 50px;\n  padding-top: 57px;\n  font-size: 18px;\n  color: #333;\n}\n.system-my-live .no-live .title {\n    margin-bottom: 27px;\n}\n.system-my-live .no-live .title span {\n      line-height: 37px;\n      margin-right: 40px;\n}\n.system-my-live .no-live .title a {\n      display: inline-block;\n      color: #f52020;\n      border: 1px solid #f52020;\n      border-radius: 6px;\n      line-height: 1;\n      padding: 9px 8px;\n      background-color: #fff8f8;\n}\n.system-my-live .no-live .live-advantage h2 {\n    font-weight: normal;\n    font-size: 24px;\n    color: #333;\n    line-height: 42px;\n}\n.system-my-live .no-live .live-advantage p {\n    line-height: 36px;\n}\n.el-message {\n  min-width: auto;\n}\n", ""]);

// exports


/***/ })

});