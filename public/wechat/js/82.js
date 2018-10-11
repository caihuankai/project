webpackJsonp([82],{

/***/ 1137:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "report"
  }, [_c('mt-radio', {
    attrs: {
      "title": "请选择举报原因",
      "options": _vm.options
    },
    model: {
      value: (_vm.value),
      callback: function($$v) {
        _vm.value = $$v
      },
      expression: "value"
    }
  }), _vm._v(" "), _c('div', {
    staticClass: "text"
  }, [_c('textarea', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.value == 8),
      expression: "value==8"
    }, {
      name: "model",
      rawName: "v-model",
      value: (_vm.otherReport),
      expression: "otherReport"
    }],
    domProps: {
      "value": (_vm.otherReport)
    },
    on: {
      "input": function($event) {
        if ($event.target.composing) { return; }
        _vm.otherReport = $event.target.value
      }
    }
  })]), _vm._v(" "), _c('div', {
    staticClass: "submit-btn"
  }, [_c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": _vm.submit
    }
  }, [_vm._v("提交")])])], 1)
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-21f35138", module.exports)
  }
}

/***/ }),

/***/ 1250:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(979);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("4a0a06a6", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-21f35138\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./report.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-21f35138\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./report.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 455:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1250)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(880),
  /* template */
  __webpack_require__(1137),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\other\\report.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] report.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-21f35138", Component.options)
  } else {
    hotAPI.reload("data-v-21f35138", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 880:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function($) {

Object.defineProperty(exports, "__esModule", {
    value: true
});

var _mintUi = __webpack_require__(54);

exports.default = {
    data: function data() {
        return {
            options: [{
                label: '欺诈（未开课、内容虚假等）',
                value: '1'
            }, {
                label: '色情',
                value: '2'
            }, {
                label: '诱导行为',
                value: '3'
            }, {
                label: '不实信息',
                value: '4'
            }, {
                label: '违法犯罪',
                value: '5'
            }, {
                label: '骚扰',
                value: '6'
            }, {
                label: '侵犯（冒充他人，盗版课程，侵犯名誉等）',
                value: '7'
            }, {
                label: '其他',
                value: '8'
            }],
            value: '1',
            otherReport: ''
        };
    },
    created: function created() {
        this.$store.commit('setTitle', '投诉');
        this.$store.commit('hideTabber');
    },

    methods: {
        submit: function submit() {
            var _this = this;

            if (this.value == '8' && this.otherReport.trim() == '') {
                (0, _mintUi.Toast)({
                    message: '请填写具体描述',
                    duration: 1000
                });
            } else {
                //提交投诉
                var data = { courseId: +this.$route.params.courseId, complainType: +this.value };
                if (this.value == 8) {
                    data.complainContent = this.otherReport;
                }
                this.$http.post('/CourseComplains/saveComplain', data, { emulateJSON: true }).then(function (res) {
                    var result = JSON.parse(res.body);
                    console.log(result);
                    if (result.status == 1) {
                        // 成功弹出框
                        (0, _mintUi.MessageBox)({
                            title: '投诉提交成功',
                            message: '感谢您的投诉，我们已收到您的投诉<br>我们将会对投诉内容进行核实，并且处理',
                            confirmButtonClass: 'report-btn',
                            closeOnClickModal: false
                        });
                        $('.mint-msgbox-confirm').click(function () {
                            _this.$router.go(-1);
                        });
                    } else {
                        (0, _mintUi.Toast)({
                            message: result.msg,
                            duration: 1000
                        });
                        if (result.msg == "该课程已进行了投诉,请勿重提提交投诉信息") {
                            setTimeout(function () {
                                _this.$router.go(-1);
                            }, 1000);
                        }
                    }
                });
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(49)))

/***/ }),

/***/ 979:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.report .mint-radiolist-title {\n  margin: 0;\n  background-color: #f0f0f0;\n  font-size: 16px;\n  color: #666;\n  padding-left: 15px;\n  line-height: 39px;\n}\n.report .mint-cell:last-child,\n.report .mint-cell-wrapper {\n  background-image: none;\n}\n.report .mint-cell {\n  min-height: auto;\n  height: 38px;\n  line-height: 38px;\n  font-size: 14px;\n  color: #999;\n  border-bottom: 1px solid #f0f0f0;\n}\n.report .mint-cell:last-of-type {\n    border-bottom: none;\n}\n.report .mint-cell .mint-radiolist-label {\n    padding: 0;\n}\n.report .mint-cell .mint-cell-wrapper {\n    height: 38px;\n    line-height: 38px;\n}\n.report .mint-cell .mint-radio-label {\n    font-size: 14px;\n}\n.report .mint-cell .mint-radio-core {\n    width: 16px;\n    height: 16px;\n}\n.report .mint-cell .mint-radio-core:after {\n      top: 3px;\n      left: 3px;\n}\n.report .text {\n  padding: 0 15px;\n  margin-top: 10px;\n}\n.report .text textarea {\n    width: 100%;\n    box-sizing: border-box;\n    background-color: #f0f0f0;\n    resize: none;\n    border-radius: 5px;\n    height: 107px;\n    padding: 8px 15px;\n    font-size: 16px;\n    color: #666;\n}\n.report .submit-btn a {\n  display: block;\n  margin: 10px auto 0 auto;\n  width: 124px;\n  text-align: center;\n  line-height: 45px;\n  color: #fff;\n  background-color: #5f86fd;\n  border-radius: 5px;\n}\n.mint-msgbox .mint-msgbox-content {\n  border-bottom: none;\n}\n.mint-msgbox .mint-msgbox-title {\n  font-weight: normal;\n  color: #333;\n  font-size: 16px;\n}\n.mint-msgbox .mint-msgbox-btns {\n  height: 66px;\n  line-height: 45px;\n}\n.mint-msgbox .mint-msgbox-message {\n  line-height: 23px;\n}\n.mint-msgbox .mint-msgbox-btn {\n  border-radius: 5px;\n  height: 45px;\n  border-right: none;\n  font-size: 18px;\n}\n.mint-msgbox .mint-msgbox-btn:first-child {\n    margin-left: 20px;\n    margin-right: 14px;\n}\n.mint-msgbox .mint-msgbox-btn:last-child {\n    margin-left: 14px;\n    margin-right: 20px;\n}\n.mint-msgbox .mint-msgbox-cancel {\n  color: #999999;\n  border: 1px solid #b2b2b2;\n}\n.mint-msgbox .mint-msgbox-confirm {\n  color: #fff;\n  background-color: #5f86fd;\n}\n.mint-msgbox .mint-msgbox-btns .report-btn {\n  width: 124px;\n  -webkit-box-flex: 0;\n  -webkit-flex: none;\n      -ms-flex: none;\n          flex: none;\n  margin: 15px auto 0 auto;\n}\n", ""]);

// exports


/***/ })

});