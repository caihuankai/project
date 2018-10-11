webpackJsonp([70],{

/***/ 1050:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.info-center[data-v-bd5f1a92] {\n  padding: 0 .24rem;\n  background-color: #fff;\n  height: 100%;\n}\n.info-center a[data-v-bd5f1a92] {\n    display: -webkit-box;\n    display: -webkit-flex;\n    display: -ms-flexbox;\n    display: flex;\n    height: 1.58rem;\n    padding: .36rem 0;\n    box-sizing: border-box;\n    -webkit-box-orient: horizontal;\n    -webkit-box-direction: normal;\n    -webkit-flex-direction: row;\n        -ms-flex-direction: row;\n            flex-direction: row;\n    border-bottom: 1px solid #efefef;\n    position: relative;\n}\n.info-center a:last-child .system-h[data-v-bd5f1a92] {\n      border: 1px solid #a6741d;\n      color: #a6741d;\n}\n.info-center a .mint-badge[data-v-bd5f1a92] {\n      position: absolute;\n      top: .28rem;\n      left: .8rem;\n      border-radius: 100%;\n      width: .3rem;\n      height: .3rem;\n      line-height: .3rem;\n      font-size: 12px;\n      padding: 0;\n}\n.info-center a .mint-badge i[data-v-bd5f1a92] {\n        font-size: 12px;\n        -webkit-transform: scale(0.75);\n            -ms-transform: scale(0.75);\n                transform: scale(0.75);\n}\n.info-center a div[data-v-bd5f1a92] {\n      -webkit-box-flex: .86rem;\n      -webkit-flex: .86rem auto;\n          -ms-flex: .86rem auto;\n              flex: .86rem auto;\n}\n.info-center a .system-h[data-v-bd5f1a92] {\n      height: .86rem;\n      -webkit-flex-shrink: 0;\n          -ms-flex-negative: 0;\n              flex-shrink: 0;\n      width: .86rem;\n      border: 1px solid #cf2f2f;\n      color: #cf2f2f;\n      border-radius: .1rem;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n      text-align: center;\n      font-size: .28rem;\n      margin-right: .4rem;\n      line-height: .36rem;\n      letter-spacing: 0.05rem;\n}\n.info-center a .system-txt[data-v-bd5f1a92] {\n      font-size: .3rem;\n      line-height: .43rem;\n}\n", ""]);

// exports


/***/ }),

/***/ 1209:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "info-center"
  }, [_c('router-link', {
    attrs: {
      "to": "/personalCenter/systemInformation"
    }
  }, [_c('div', {
    staticClass: "system-h"
  }, [_vm._v("系统消息")]), _vm._v(" "), _c('mt-badge', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.systemData.msgNum != undefined),
      expression: "systemData.msgNum != undefined"
    }],
    attrs: {
      "type": "error"
    }
  }, [_c('i', [_vm._v(_vm._s(_vm.systemNum))])]), _vm._v(" "), _c('div', {
    staticClass: "system-txt two-line"
  }, [_vm._v(_vm._s(_vm.lead))])], 1), _vm._v(" "), _c('router-link', {
    attrs: {
      "to": "/personalCenter/interactInformation"
    }
  }, [_c('div', {
    staticClass: "system-h"
  }, [_vm._v("互动消息")]), _vm._v(" "), _c('mt-badge', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.InteractiveData.msgNum != undefined),
      expression: "InteractiveData.msgNum != undefined"
    }],
    attrs: {
      "type": "error"
    }
  }, [_c('i', [_vm._v(_vm._s(_vm.InteraNum))])]), _vm._v(" "), _c('div', {
    staticClass: "system-txt two-line"
  }, [_vm._v(_vm._s(_vm.lead1))])], 1)], 1)
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-bd5f1a92", module.exports)
  }
}

/***/ }),

/***/ 1318:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(1050);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("230153d8", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-bd5f1a92\",\"scoped\":true,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./information.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-bd5f1a92\",\"scoped\":true,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./information.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 474:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1318)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(899),
  /* template */
  __webpack_require__(1209),
  /* styles */
  injectStyle,
  /* scopeId */
  "data-v-bd5f1a92",
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\personalCenter\\information.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] information.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-bd5f1a92", Component.options)
  } else {
    hotAPI.reload("data-v-bd5f1a92", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 899:
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
        return {
            data: [], //总的消息
            systemData: [], //系统消息
            InteractiveData: [], //互动消息
            systemNum: "", //未读条数
            InteraNum: "", //未读条数
            lead: "",
            lead1: ""
        };
    },

    computed: {
        userId: function userId() {
            return this.$store.state.userInfo.user_id;
        }
    },
    created: function created() {
        this.$store.commit("setTitle", "消息中心");
        this.getData();
    },

    methods: {
        getData: function getData() {
            var _this = this;

            this.$http.get(this.hostUrl + "/Message/getMessageStatistics").then(function (res) {
                res = res.body;
                if (res.code == 200) {
                    _this.data = res.data;

                    for (var i = 0; _this.data.length > i; i++) {
                        if (_this.data[i] != "") {
                            _this.data[i] = _this.data[i] || [];
                            if (_this.data[i].type == 0) {
                                _this.systemData = _this.data[i];
                                _this.lead = _this.systemData.lead;
                            } else if (_this.data[i].type == 1) {
                                _this.InteractiveData = _this.data[i];
                                _this.lead1 = _this.InteractiveData.lead;
                            }
                        }
                    }

                    if (_this.systemData == "") {
                        _this.lead = "暂无系统消息";
                    }
                    if (_this.InteractiveData == "") {
                        _this.lead1 = "暂无互动消息";
                    }
                    if (_this.systemData.msgNum != undefined) {
                        _this.systemNum = _this.systemData.msgNum;
                    }
                    if (_this.InteractiveData.msgNum != undefined) {
                        _this.InteraNum = _this.InteractiveData.msgNum;
                    }
                } else {
                    console.log(res);
                }
            });
        }
    }
};

/***/ })

});