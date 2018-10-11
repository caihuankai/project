webpackJsonp([79],{

/***/ 1133:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('main', {
    staticClass: "card-pay"
  }, [_c('header', [_c('span', [_vm._v("充值")]), _vm._v(" "), _c('i', {
    staticClass: "pull-right"
  }, [_vm._v(_vm._s(this.money) + "元")])]), _vm._v(" "), _c('section', {
    staticClass: "set-info"
  }, [_vm._m(0), _vm._v(" "), _c('input', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.card_no),
      expression: "card_no"
    }],
    attrs: {
      "type": "number",
      "placeholder": "输入银行卡账户号码"
    },
    domProps: {
      "value": (_vm.card_no)
    },
    on: {
      "input": function($event) {
        if ($event.target.composing) { return; }
        _vm.card_no = $event.target.value
      },
      "blur": function($event) {
        _vm.$forceUpdate()
      }
    }
  })]), _vm._v(" "), _c('section', {
    staticClass: "set-info",
    staticStyle: {
      "margin-bottom": "0"
    }
  }, [_vm._m(1), _vm._v(" "), _c('input', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.acct_name),
      expression: "acct_name"
    }],
    attrs: {
      "type": "text",
      "placeholder": "填写身份证上的真实姓名"
    },
    domProps: {
      "value": (_vm.acct_name)
    },
    on: {
      "input": function($event) {
        if ($event.target.composing) { return; }
        _vm.acct_name = $event.target.value
      }
    }
  })]), _vm._v(" "), _c('section', {
    staticClass: "set-info"
  }, [_vm._m(2), _vm._v(" "), _c('input', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.id_no),
      expression: "id_no"
    }],
    attrs: {
      "type": "text",
      "placeholder": "完整填写身份证号码"
    },
    domProps: {
      "value": (_vm.id_no)
    },
    on: {
      "input": function($event) {
        if ($event.target.composing) { return; }
        _vm.id_no = $event.target.value
      }
    }
  })]), _vm._v(" "), _c('div', {
    staticClass: "choose",
    class: {
      'un-check': !_vm.checkedState, 'is-check': _vm.checkedState
    },
    on: {
      "click": function($event) {
        $event.stopPropagation();
        _vm.checkedState = !_vm.checkedState
      }
    }
  }, [_c('p', [_vm._v("我同意"), _c('router-link', {
    attrs: {
      "to": "/payProtocol"
    }
  }, [_vm._v("《支付服务协议》")])], 1)]), _vm._v(" "), _c('button', {
    class: {
      'active': _vm.checkedState
    },
    attrs: {
      "disabled": "true"
    },
    on: {
      "click": function($event) {
        _vm.cardPay()
      }
    }
  }, [_vm._v("确认支付")]), _vm._v(" "), _c('div', {
    staticClass: "PayHtml",
    domProps: {
      "innerHTML": _vm._s(_vm.payHtml)
    }
  })])
},staticRenderFns: [function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "title"
  }, [_c('span', [_vm._v("银行卡号")])])
},function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "title"
  }, [_c('span', [_vm._v("持卡人姓名")])])
},function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "title"
  }, [_c('span', [_vm._v("身份证号码")])])
}]}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-16ba8c83", module.exports)
  }
}

/***/ }),

/***/ 1246:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(975);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("36911fa5", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-16ba8c83\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./cardPay.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-16ba8c83\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./cardPay.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 460:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1246)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(885),
  /* template */
  __webpack_require__(1133),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\personalCenter\\cardPay.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] cardPay.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-16ba8c83", Component.options)
  } else {
    hotAPI.reload("data-v-16ba8c83", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 885:
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
            checkedState: true, //是否选中课程购买协议
            money: this.$route.params.money, //充值金额
            id_no: '', //身份证号码
            card_no: '', //银行卡卡号
            acct_name: '', //持卡人姓名
            payHtml: '', //支付html
            referrerRouter: '',
            return_url: ''

        };
    },
    created: function created() {
        this.$store.commit("setTitle", "充值");
        this.$store.commit("hideTabber");
        this.referrerRouter = sessionStorage.getItem("referrer");
        if (this.referrerRouter.indexOf('/sendRedpacket') != -1) {
            this.return_url = '#' + this.referrerRouter;
        } else {
            this.return_url = "";
        }
    },

    methods: {
        cardPay: function cardPay() {
            var _this = this;

            //绑定银行卡支付

            if (this.checkedState == false) {
                (0, _mintUi.Toast)({
                    message: '请先同意支付协议！',
                    duration: 2000
                });
                return;
            } else if (this.card_no == '' || this.validateAndCacheCardInfo(this.card_no) == false) {
                (0, _mintUi.Toast)({
                    message: '请输入正确的银行卡账户号码！',
                    duration: 2000
                });
                return;
            } else if (this.acct_name == '') {
                (0, _mintUi.Toast)({
                    message: '持卡人姓名不能为空！',
                    duration: 2000
                });
                return;
            } else if (this.isChinaName(this.acct_name) == false) {
                (0, _mintUi.Toast)({
                    message: '持卡人姓名只能为中文汉字！',
                    duration: 2000
                });
                return;
            } else if (this.IdentityCodeValid(this.id_no) == false) {
                return;
            } else {
                this.$http.post('/LLpay/pay', {
                    id_no: this.id_no,
                    card_no: this.card_no,
                    acct_name: this.acct_name,
                    amount: this.money,
                    no_agree: '',
                    return_url: this.return_url
                }, { emulateJSON: true }).then(function (res) {
                    console.log(res.body.data);
                    sessionStorage.setItem("pay", true);
                    if (res.body.code == 0) {
                        (0, _mintUi.Toast)({
                            message: res.body.msg,
                            duration: 1000
                        });
                    } else {
                        _this.payHtml = res.body.data;
                        $('body').append(_this.payHtml);
                        $("#llpaysubmit   input[type=submit]").click();
                        // this.cardPay()
                        //$('body').html(res.body.data)
                    }
                });
            }
        },
        validateAndCacheCardInfo: function validateAndCacheCardInfo(bankno) {
            //银行卡验证
            var lastNum = bankno.substr(bankno.length - 1, 1); //取出最后一位（与luhn进行比较）
            var first15Num = bankno.substr(0, bankno.length - 1); //前15或18位
            var newArr = new Array();
            for (var i = first15Num.length - 1; i > -1; i--) {
                //前15或18位倒序存进数组
                newArr.push(first15Num.substr(i, 1));
            }
            var arrJiShu = new Array(); //奇数位*2的积 <9
            var arrJiShu2 = new Array(); //奇数位*2的积 >9

            var arrOuShu = new Array(); //偶数位数组
            for (var j = 0; j < newArr.length; j++) {
                if ((j + 1) % 2 == 1) {
                    //奇数位
                    if (parseInt(newArr[j]) * 2 < 9) arrJiShu.push(parseInt(newArr[j]) * 2);else arrJiShu2.push(parseInt(newArr[j]) * 2);
                } else //偶数位
                    arrOuShu.push(newArr[j]);
            }

            var jishu_child1 = new Array(); //奇数位*2 >9 的分割之后的数组个位数
            var jishu_child2 = new Array(); //奇数位*2 >9 的分割之后的数组十位数
            for (var h = 0; h < arrJiShu2.length; h++) {
                jishu_child1.push(parseInt(arrJiShu2[h]) % 10);
                jishu_child2.push(parseInt(arrJiShu2[h]) / 10);
            }

            var sumJiShu = 0; //奇数位*2 < 9 的数组之和
            var sumOuShu = 0; //偶数位数组之和
            var sumJiShuChild1 = 0; //奇数位*2 >9 的分割之后的数组个位数之和
            var sumJiShuChild2 = 0; //奇数位*2 >9 的分割之后的数组十位数之和
            var sumTotal = 0;
            for (var m = 0; m < arrJiShu.length; m++) {
                sumJiShu = sumJiShu + parseInt(arrJiShu[m]);
            }

            for (var n = 0; n < arrOuShu.length; n++) {
                sumOuShu = sumOuShu + parseInt(arrOuShu[n]);
            }

            for (var p = 0; p < jishu_child1.length; p++) {
                sumJiShuChild1 = sumJiShuChild1 + parseInt(jishu_child1[p]);
                sumJiShuChild2 = sumJiShuChild2 + parseInt(jishu_child2[p]);
            }
            //计算总和
            sumTotal = parseInt(sumJiShu) + parseInt(sumOuShu) + parseInt(sumJiShuChild1) + parseInt(sumJiShuChild2);

            //计算luhn值
            var k = parseInt(sumTotal) % 10 == 0 ? 10 : parseInt(sumTotal) % 10;
            var luhn = 10 - k;

            if (lastNum == luhn) {
                //$("#banknoInfo").html("luhn验证通过");
                return true;
            } else {
                // $("#banknoInfo").html("银行卡号必须符合luhn校验");
                return false;
            }
        },
        isClickButton: function isClickButton() {
            //验证是否都填写
            if (this.acct_name != '' && this.card_no != '' && this.id_no != '') {
                $('.card-pay button').attr('disabled', false);
            } else {
                $('.card-pay button').attr('disabled', true);
            }
        },
        isChinaName: function isChinaName(name) {
            // 验证中文名称
            var pattern = /^[\u4E00-\u9FA5]{1,6}$/;
            return pattern.test(name);
        },
        IdentityCodeValid: function IdentityCodeValid(code) {
            //身份证号码验证
            var city = { 11: "北京", 12: "天津", 13: "河北", 14: "山西", 15: "内蒙古", 21: "辽宁", 22: "吉林", 23: "黑龙江 ", 31: "上海", 32: "江苏", 33: "浙江", 34: "安徽", 35: "福建", 36: "江西", 37: "山东", 41: "河南", 42: "湖北 ", 43: "湖南", 44: "广东", 45: "广西", 46: "海南", 50: "重庆", 51: "四川", 52: "贵州", 53: "云南", 54: "西藏 ", 61: "陕西", 62: "甘肃", 63: "青海", 64: "宁夏", 65: "新疆", 71: "台湾", 81: "香港", 82: "澳门", 91: "国外 " };
            var tip = "";
            var pass = true;

            if (!/(^\d{15}$)|(^\d{17}([0-9]|X)$)/.test(code)) {
                tip = "身份证号格式错误";
                pass = false;
            }

            if (!city[code.substr(0, 2)]) {
                tip = "身份证号地址编码错误";
                pass = false;
            } else {
                //18位身份证需要验证最后一位校验位
                if (code.length == 18) {
                    code = code.split('');
                    //∑(ai×Wi)(mod 11)
                    //加权因子
                    var factor = [7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2];
                    //校验位
                    var parity = [1, 0, 'X', 9, 8, 7, 6, 5, 4, 3, 2];
                    var sum = 0;
                    var ai = 0;
                    var wi = 0;
                    for (var i = 0; i < 17; i++) {
                        ai = code[i];
                        wi = factor[i];
                        sum += ai * wi;
                    }
                    var last = parity[sum % 11];
                    if (parity[sum % 11] != code[17]) {
                        tip = "身份证号校验位错误";
                        pass = false;
                    }
                }
            }
            if (!pass) alert(tip);
            return pass;
        }
    },
    watch: {
        acct_name: function acct_name(val) {
            this.isClickButton();
        },
        card_no: function card_no(val) {
            this.isClickButton();
        },
        id_no: function id_no(val) {
            this.isClickButton();
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
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(49)))

/***/ }),

/***/ 975:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.PayHtml {\n  display: none;\n}\n.card-pay header {\n  color: #353535;\n  font-size: .32rem;\n  background: #ffffff;\n  padding: .42rem .24rem;\n  margin-bottom: .24rem;\n}\n.card-pay .set-info {\n  background: #ffffff;\n  padding: 0 .24rem;\n  margin-bottom: .24rem;\n}\n.card-pay .set-info .title {\n    padding-top: .24rem;\n    font-size: .24rem;\n}\n.card-pay .set-info .title span {\n      color: #353535;\n}\n.card-pay .set-info .title i {\n      float: right;\n      color: #888888;\n}\n.card-pay .set-info input {\n    border-bottom: 1px solid #e8e8e8;\n    padding: .32rem .24rem;\n    font-size: .32rem;\n    color: #353535;\n    box-sizing: border-box;\n    width: 100%;\n}\n.card-pay .set-info input::-webkit-input-placeholder {\n      color: #888888;\n      font-size: .32rem;\n}\n.card-pay .choose {\n  color: #888888;\n  font-size: .28rem;\n  background: #ffffff;\n  padding: .34rem .48rem;\n}\n.card-pay .choose a {\n    color: #bb7676;\n}\n.card-pay .choose.un-check p::before {\n    content: '';\n    display: inline-block;\n    width: .32rem;\n    height: .32rem;\n    background: url(\"/images/radio-default.png\") no-repeat;\n    background-size: 100% 100%;\n    vertical-align: middle;\n    margin-right: .24rem;\n}\n.card-pay .choose.is-check p::before {\n    content: '';\n    display: inline-block;\n    width: .32rem;\n    height: .32rem;\n    background: url(\"/images/radio-active-red.png\") no-repeat;\n    background-size: 100% 100%;\n    vertical-align: middle;\n    margin-right: .24rem;\n}\n.card-pay button {\n  height: 1rem;\n  line-height: 1rem;\n  background: #888;\n  color: #ffffff;\n  font-size: .36rem;\n  text-align: center;\n  position: fixed;\n  bottom: 0;\n  left: 0;\n  width: 100%;\n  border: 0;\n}\n.card-pay button.active {\n    background: #c62f2f;\n}\n.card-pay button:disabled {\n  background: #eec0c0;\n}\n#llpaysubmit {\n  display: none;\n}\n", ""]);

// exports


/***/ })

});