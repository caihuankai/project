webpackJsonp([94],{

/***/ 1022:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.union-pay {\n  height: 100%;\n}\n.union-pay.pb {\n    padding-bottom: 2rem;\n}\n.union-pay .col-red {\n    color: #C62F2F;\n}\n.union-pay .info {\n    overflow: hidden;\n}\n.union-pay .info ul {\n      margin-top: .24rem;\n      background: #ffffff;\n      padding: 0 .24rem;\n}\n.union-pay .info ul li {\n        font-size: .3rem;\n        color: #353535;\n        line-height: 1.1rem;\n        border-bottom: 1px solid #F2F2F2;\n        padding: 0 .24rem;\n}\n.union-pay .info ul li p {\n          float: right;\n}\n.union-pay .set-info {\n    margin-top: .24rem;\n    background: #ffffff;\n}\n.union-pay .set-info.mb {\n      margin-bottom: 2rem;\n}\n.union-pay .set-info ul {\n      padding: 0 .24rem;\n}\n.union-pay .set-info ul li {\n        padding: 0 .24rem;\n        height: 1.1rem;\n        line-height: 1.1rem;\n        border-bottom: 1px solid #F2F2F2;\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        font-size: .3rem;\n        color: #353535;\n        box-sizing: border-box;\n}\n.union-pay .set-info ul li span {\n          margin-right: .24rem;\n          display: inline-block;\n          width: 1.4rem;\n}\n.union-pay .set-info ul li input {\n          text-align: right;\n          color: #353535;\n          display: block;\n          width: 5rem;\n          float: right;\n}\n.union-pay footer {\n    background: #C62F2F;\n    color: #ffffff;\n    width: 100%;\n    height: 1rem;\n    position: fixed;\n    bottom: 0;\n    font-size: .36rem;\n    text-align: center;\n    line-height: 1rem;\n}\n", ""]);

// exports


/***/ }),

/***/ 1180:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('main', {
    staticClass: "union-pay"
  }, [
    [_c('section', {
      staticClass: "info"
    }, [_c('ul', [_c('li', [_c('span', [_vm._v("商品名称")]), _vm._v(" "), _c('p', [_vm._v(_vm._s(_vm.detail.class_name))])]), _vm._v(" "), _c('li', [_c('span', [_vm._v("支付金额")]), _vm._v(" "), _c('p', {
      staticClass: "col-red"
    }, [_vm._v(_vm._s(_vm.detail.price) + "元")])])])]), _vm._v(" "), _c('section', {
      staticClass: "set-info",
      class: {
        'mb': _vm.isFocus
      }
    }, [_c('ul', [_c('li', {
      staticClass: "clearfix"
    }, [_c('span', [_vm._v("银行卡号")]), _vm._v(" "), _c('input', {
      directives: [{
        name: "model",
        rawName: "v-model",
        value: (_vm.cardText),
        expression: "cardText"
      }],
      attrs: {
        "type": "number",
        "placeholder": "请输入"
      },
      domProps: {
        "value": (_vm.cardText)
      },
      on: {
        "focus": _vm.inpFocus,
        "input": function($event) {
          if ($event.target.composing) { return; }
          _vm.cardText = $event.target.value
        },
        "blur": function($event) {
          _vm.$forceUpdate()
        }
      }
    })]), _vm._v(" "), _c('li', {
      staticClass: "clearfix"
    }, [_c('span', [_vm._v("姓名")]), _vm._v(" "), _c('input', {
      directives: [{
        name: "model",
        rawName: "v-model",
        value: (_vm.nameText),
        expression: "nameText"
      }],
      attrs: {
        "type": "text",
        "placeholder": "请输入"
      },
      domProps: {
        "value": (_vm.nameText)
      },
      on: {
        "focus": _vm.inpFocus,
        "input": function($event) {
          if ($event.target.composing) { return; }
          _vm.nameText = $event.target.value
        }
      }
    })]), _vm._v(" "), _c('li', {
      staticClass: "clearfix"
    }, [_c('span', [_vm._v("身份证号")]), _vm._v(" "), _c('input', {
      directives: [{
        name: "model",
        rawName: "v-model",
        value: (_vm.idText),
        expression: "idText"
      }],
      attrs: {
        "type": "text",
        "placeholder": "请输入"
      },
      domProps: {
        "value": (_vm.idText)
      },
      on: {
        "focus": _vm.inpFocus,
        "input": function($event) {
          if ($event.target.composing) { return; }
          _vm.idText = $event.target.value
        }
      }
    })])])]), _vm._v(" "), _c('footer', [_c('div', {
      staticClass: "btn",
      on: {
        "click": _vm.nextFn
      }
    }, [_vm._v("下一步")])])], _vm._v(" "), _c('div', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (false),
        expression: "false"
      }],
      staticClass: "payHtml",
      domProps: {
        "innerHTML": _vm._s(_vm.LLPayHtml)
      }
    })
  ], 2)
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-66f8f48e", module.exports)
  }
}

/***/ }),

/***/ 1290:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(1022);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("1127c1be", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-66f8f48e\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./unionPay.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-66f8f48e\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./unionPay.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 434:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1290)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(859),
  /* template */
  __webpack_require__(1180),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\dacelueMini\\unionPay.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] unionPay.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-66f8f48e", Component.options)
  } else {
    hotAPI.reload("data-v-66f8f48e", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 859:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function($) {

Object.defineProperty(exports, "__esModule", {
    value: true
});

var _mintUi = __webpack_require__(54);

var _vuex = __webpack_require__(70);

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
            cardText: '', //银行卡号
            nameText: '', //姓名
            idText: '', //身份证号
            courseId: this.$route.params.courseId,
            LLPayHtml: '',
            detail: '', //课程详情
            isFocus: false
        };
    },
    created: function created() {
        var _this = this;

        this.$store.commit('hideTabber');
        this.$store.commit('setTitle', '银联支付');
        this.$store.dispatch("getUserInfo", function (res) {
            _this.getDetail();
        });
    },

    computed: (0, _vuex.mapState)({
        userId: function userId(state) {
            return state.userInfo.user_id;
        }
    }),
    methods: {
        inpFocus: function inpFocus() {
            this.isFocus = true;
        },
        nextFn: function nextFn() {
            var _this2 = this;

            this.isFocus = false;
            var cardText = this.cardText; //银行卡号
            var nameText = this.nameText; //姓名
            var idText = this.idText; //身份证号
            var numReg = /^\d*$/;
            var nameReg = /^[\u4e00-\u9fa5]{2,4}$/; //姓名正则
            var idCardReg = /(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/; //身份证正则
            var params = {
                card_no: cardText,
                acct_name: nameText,
                id_no: idText,
                class_id: this.courseId
            };
            if (cardText.trim() == '' || cardText.length < 16 || cardText.length > 19 || !numReg.exec(cardText)) {
                (0, _mintUi.Toast)('请输入正确的银行卡号');
                return;
            } else if (!nameReg.exec(nameText)) {
                (0, _mintUi.Toast)('请输入正确的姓名');
                return;
            } else if (!idCardReg.exec(idText)) {
                (0, _mintUi.Toast)('请输入正确的身份证号');
                return;
            }
            this.$http.post('/H5Pay/LLpay', params, { emulateJSON: true }).then(function (res) {
                if (res.body.code == 0) {
                    (0, _mintUi.Toast)(res.body.msg);
                } else {
                    _this2.LLPayHtml = res.body.data;
                    $('body').append(_this2.LLPayHtml);
                    $("#llpaysubmit   input[type=submit]").click();
                }
            });
        },

        /*
        * 获取课程详情
        * */
        getDetail: function getDetail() {
            var _this3 = this;

            this.$http.post(this.hostUrl + "/CourseDetails/details", { user_id: this.userId, id: this.courseId }, { emulateJSON: true }).then(function (res) {
                if (res.body.code == -16006) {
                    //课程不存在
                    _this3.$router.replace("/nodata");
                }
                _this3.detail = res.body.data;
            });
        }
    }
};
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(49)))

/***/ })

});