webpackJsonp([44],{

/***/ 1075:
/***/ (function(module, exports) {

module.exports = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAA/ElEQVRIibXX7wnDIBCH4bfSHTpD6BAlU2SILJIFMkSnCJ2iM3SLfoiBIP65u3h+VOFBvfuBt2VZnsAKTMAP3/EA3sAcIvoCtrjgiW7RWgP7Sb/A4Igf6BCtKbBf7+iIp+gI/EJc9MKzKEA4beqNF9EU7olX0RzcA2+iJfgKLkJrsAUXoy1Yg6tQCSzB1agUruEmFOAuhM/4AW1xXo1q4RyOBQX5VXcfWjh9U3PCaeBcIZkTTgqXqtccrxK41TImvAVL+1SN12BtOKjwEmxNJDGeg80xqMFT+Coqxs9wL1SEH3BvtIkHR7SKB/a/jBdawt8BmIGPI5riH2D+A842n+spMyA+AAAAAElFTkSuQmCC"

/***/ }),

/***/ 1077:
/***/ (function(module, exports) {

module.exports = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAADVElEQVRIicXXTWhdRRQH8F9fPswupgkupIsWRSkuXNzgUoRaCoYsXBTxo4EiTIKKEDCl7cpVTe2iCAWTcVHJQi1EsEpWimAWuulbC0JrFy7zYbooIYXqYubmXeN9eTci9A+PN3PvnPnPOXO+7qHFxUUNMIQJnMQ4jmI0v1vHXdzC91gJIWz32vBQD+JRzGEGw01OiC0s4EoIYf2/EE/hKg7n+Y6k0Sp+xVp+PobjeFGyyGB+voHZEMJSU+LBfOKzeb6Jj7GYx/9ACGF3HGMcwTTOYSQ/vo6ZEMJOVa5VQ7pcIb2BZzBfR1pziM0QwnyWuZEfn8VyjHGwurZvcnKyOv8Mr+Xxeczi/p79H8dbeBuvtNvtJ9vt9p2iKHYdqiiK+0VRLLfb7R2cwLM4UhTFzTqNpyqansflGqVO4/d8wHfwbh7fjjG+WmOBj3Cx1DzGOLWXeFRyJJKJ6kgn8FXWeANf4EvpCg5L5ny5C3lp9qsxxtEq8VwW3sR7NaR9uJbX/4RjeBNv4Gn8nN99GmPc6zfynuUB50riISlOSd67ViP4gpQ0Hkr3e6+i0QbO4K98iPEardfy3jATYxxqSSYcluK0W1Afy/+/4Y+aje9I2Usmr8Ni5hjGREsKelJy6BYyq/gRn9S9jDE+hSN5+mfdmhDCZuaAk/06plntQkrS8kQX0jHcxABuVzavw6pk4fGWdHekNHhQDGMFz0lmPBNCeLDP+pLjaEunytQ51X7oxzeS4z3A6RDCLz1kSo7ROtdviot4SfL010MI3x5EuCXVU1KVaYo+vJ/Hl0MIXzeUKznWWzphcPwAxE/oXNHnB5ArOe62pM6BVE+b4rHKeKfrqn+j5LjVUoktnRraC/eku32oksX2Q67VuzmjJYXDllSLpxsSb+AUTuWU2QTTmWMLKy1sSx0HqXNo6mQ/5F9P5CRzLk8XQgjbZThdkbQYkapQLwxIGkzHGAcarL+W997IXLtlcV3qNkgdyIUeG30gWWkhj7sixnhBp6uZLTvPagJZkhozuNSDfKzLuI70Up5er3ac/XvWzuSNJrPA81IR35tO5yuE8zWEY5J5S02/06n5eITt7SNr6PeauoolKcarnzAT+bcfGn3C7EdM8vbz+ND//NH2N7cPDjkdQdOVAAAAAElFTkSuQmCC"

/***/ }),

/***/ 1147:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('main', {
    staticClass: "gift-balance"
  }, [(!_vm.showBody) ? _c('loading') : _vm._e(), _vm._v(" "), (_vm.showBody) ? [_c('header', [_c('h3', [_vm._v("可用余额\n                "), _c('router-link', _vm._b({}, 'router-link', {
    to: '/giftBalanceDetail'
  }), [_c('span', [_vm._v("明细")])])], 1), _vm._v(" "), _c('h1', [_vm._v(_vm._s(_vm._f("toThousands")(_vm.giftAmount)))]), _vm._v(" "), _c('section', {
    on: {
      "click": function($event) {
        _vm.showExplainPopup = true
      }
    }
  }, [_c('span', [_vm._v("余额说明")]), _vm._v(" "), _c('i')])]), _vm._v(" "), _c('section', {
    staticClass: "recharge clearfix"
  }, [_c('section', [_vm._l((_vm.DefaultMountList), function(item, index) {
    return _c('div', {
      class: {
        maskIndex: index == _vm.indexNum
      },
      style: ({
        'background-image': 'url(' + item.image + ')'
      }),
      on: {
        "click": function($event) {
          _vm.clickItem(item.image, item.denomination, item.cost, index)
        }
      }
    }, [_c('h1', [_vm._v(_vm._s(item.denomination)), _c('span')]), _vm._v(" "), _c('p', [_c('i', [_vm._v(_vm._s(item.cost))]), _vm._v("元")])])
  }), _vm._v(" "), _c('div', {
    class: {
      maskIndex: _vm.indexNum == -1
    },
    style: ({
      'background-image': 'url(/images/2.0/wdzdy.png)'
    }),
    on: {
      "click": function($event) {
        _vm.otherchance = true;
        _vm.itemInfo.cost = _vm.setChargeNum;
        _vm.clickCharge = true;
        _vm.indexNum = -1
      }
    }
  }, [_c('h1', [_vm._v("自定义")]), _vm._v(" "), _vm._m(0)])], 2), _vm._v(" "), _c('div', {
    staticClass: "tocharge-b maskIndex",
    on: {
      "click": _vm.toChargeFun
    }
  }, [_vm._v("立即充值")])]), _vm._v(" "), _c('div', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.clickCharge),
      expression: "clickCharge"
    }],
    staticClass: "v-mask",
    on: {
      "click": _vm.clickChargeFun
    }
  }), _vm._v(" "), _c('p', {
    staticClass: "Remarks"
  }, [_vm._v("以上观点仅供参考，不构成投资建议")])] : _vm._e(), _vm._v(" "), _c('mt-popup', {
    staticClass: "explain-popup",
    attrs: {
      "popup-transition": "popup-fade"
    },
    model: {
      value: (_vm.showExplainPopup),
      callback: function($$v) {
        _vm.showExplainPopup = $$v
      },
      expression: "showExplainPopup"
    }
  }, [_c('main', [_c('h1', [_vm._v("余额说明")]), _vm._v(" "), _c('ul', [_c('li', [_c('h3', [_vm._v("什么是余额")]), _vm._v(" "), _c('p', [_vm._v("余额是由大策略平台推出的一种增值服务，可以用来支付大策略平台旗下业务的虚拟商品以及服务。")])]), _vm._v(" "), _c('li', [_c('h3', [_vm._v("如何获得余额")]), _vm._v(" "), _c('p', [_vm._v("通过充值获得。")])]), _vm._v(" "), _c('li', [_c('h3', [_vm._v("余额的用途")]), _vm._v(" "), _c('p', [_vm._v("余额仅能用于购买大策略平台直接运营的产品和服务，不能兑换现金，不能进行转账交易，不能兑换大策略平台体系外的产品和服务。")])])]), _vm._v(" "), _c('span', {
    staticClass: "close",
    on: {
      "click": function($event) {
        _vm.showExplainPopup = false
      }
    }
  })])]), _vm._v(" "), _c('mt-popup', {
    staticClass: "set-amount-popup",
    attrs: {
      "popup-transition": "popup-fade"
    },
    model: {
      value: (_vm.showSetAmountPopup),
      callback: function($$v) {
        _vm.showSetAmountPopup = $$v
      },
      expression: "showSetAmountPopup"
    }
  }, [_c('main', [_c('div', {
    staticClass: "info"
  }, [_c('div', {
    staticClass: "img",
    style: ({
      'background-image': 'url(/images/2.0/wdzdy.png)'
    })
  }, [_c('h3', [_vm._v("自定义")]), _vm._v(" "), _c('p', [_vm._v("自定义")])]), _vm._v(" "), _c('h4', [_vm._v("自定义充值数量")]), _vm._v(" "), _c('input', {
    directives: [{
      name: "number-only",
      rawName: "v-number-only"
    }, {
      name: "model",
      rawName: "v-model",
      value: (_vm.setChargeNum),
      expression: "setChargeNum"
    }],
    attrs: {
      "type": "tel",
      "maxlength": "6",
      "placeholder": "请输入"
    },
    domProps: {
      "value": (_vm.setChargeNum)
    },
    on: {
      "input": function($event) {
        if ($event.target.composing) { return; }
        _vm.setChargeNum = $event.target.value
      }
    }
  })]), _vm._v(" "), _c('div', {
    staticClass: "bottom-btn"
  }, [_c('div', {
    on: {
      "click": function($event) {
        _vm.showSetAmountPopup = false;
        _vm.setChargeNum = '';
      }
    }
  }, [_vm._v("取消")]), _vm._v(" "), _c('div', {
    on: {
      "click": function($event) {
        _vm.OtherRecharge()
      }
    }
  }, [_vm._v("充值")])])])]), _vm._v(" "), _c('mt-popup', {
    staticClass: "set-amount-popup",
    attrs: {
      "popup-transition": "popup-fade"
    },
    model: {
      value: (_vm.showCodePayPopup),
      callback: function($$v) {
        _vm.showCodePayPopup = $$v
      },
      expression: "showCodePayPopup"
    }
  }, [_c('article', [_c('h3', [_vm._v("使用微信扫码支付")]), _vm._v(" "), _c('section', [_c('img', {
    attrs: {
      "src": _vm.CodeIng
    }
  })])])]), _vm._v(" "), _c('mt-popup', {
    staticClass: "item-popup",
    attrs: {
      "popup-transition": "popup-fade"
    },
    model: {
      value: (_vm.showItemPopup),
      callback: function($$v) {
        _vm.showItemPopup = $$v
      },
      expression: "showItemPopup"
    }
  }, [_c('main', [_c('div', {
    staticClass: "info"
  }, [_c('div', {
    staticClass: "img",
    style: ({
      'background-image': 'url(' + _vm.itemInfo.image + ')'
    })
  }, [_c('h3', [_vm._v(_vm._s(_vm.itemInfo.denomination) + " "), _c('i')]), _vm._v(" "), _c('p', [_vm._v(_vm._s(_vm.itemInfo.cost) + "元")])]), _vm._v(" "), _c('h4', [_vm._v("充值数量")]), _vm._v(" "), _c('p', [_vm._v(_vm._s(_vm.itemInfo.cost))])]), _vm._v(" "), _c('div', {
    staticClass: "bottom-btn"
  }, [_c('div', {
    on: {
      "click": function($event) {
        _vm.showItemPopup = false;
        _vm.itemInfo = {}
      }
    }
  }, [_vm._v("取消")]), _vm._v(" "), _c('div', {
    on: {
      "click": function($event) {
        _vm.UserInfoIsMobile(0)
      }
    }
  }, [_vm._v("充值")])])])]), _vm._v(" "), _c('mt-popup', {
    staticClass: "pay-way-popup",
    attrs: {
      "position": "bottom",
      "popup-transition": "popup-fade"
    },
    model: {
      value: (_vm.showPayWayPopup),
      callback: function($$v) {
        _vm.showPayWayPopup = $$v
      },
      expression: "showPayWayPopup"
    }
  }, [_c('main', [_c('div', {
    staticClass: "title"
  }, [_vm._v("选择支付方式"), _c('span', {
    on: {
      "click": function($event) {
        _vm.showPayWayPopup = false
      }
    }
  })]), _vm._v(" "), _c('ul', [_c('li', {
    on: {
      "click": function($event) {
        _vm.toCharge(_vm.itemInfo.cost)
      }
    }
  }, [_vm._v("微信支付")])])])]), _vm._v(" "), _c('mt-popup', {
    staticClass: "courseBy",
    attrs: {
      "popup-transition": "popup-fade"
    },
    model: {
      value: (_vm.popupPhoneText),
      callback: function($$v) {
        _vm.popupPhoneText = $$v
      },
      expression: "popupPhoneText"
    }
  }, [_c('span', {
    staticClass: "close",
    on: {
      "click": function($event) {
        _vm.popupPhoneText = false
      }
    }
  }), _vm._v(" "), _c('h2', [_vm._v("绑定手机")]), _vm._v(" "), _c('p', [_vm._v("\n            为保障账户安全请先绑定手机号哦！\n        ")]), _vm._v(" "), _c('div', {
    staticClass: "button"
  }, [_c('button', {
    on: {
      "click": _vm.PhoneBoxFun
    }
  }, [_vm._v("去绑定手机")])])]), _vm._v(" "), _c('coursePhoneBox', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.popupPhoneBox),
      expression: "popupPhoneBox"
    }],
    attrs: {
      "popupPhoneBox": _vm.popupPhoneBox,
      "isGift": 1,
      "approach": 0
    },
    on: {
      "popupBox": _vm.popupPhoneBoxs
    }
  })], 2)
},staticRenderFns: [function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('p', [_c('i', [_vm._v("自定义")])])
}]}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-2daa95d2", module.exports)
  }
}

/***/ }),

/***/ 1259:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(989);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("6e7e655f", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-2daa95d2\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./giftBalance.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-2daa95d2\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./giftBalance.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 471:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1259)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(896),
  /* template */
  __webpack_require__(1147),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\personalCenter\\giftBalance.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] giftBalance.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-2daa95d2", Component.options)
  } else {
    hotAPI.reload("data-v-2daa95d2", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 896:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _vuex = __webpack_require__(70);

var _mintUi = __webpack_require__(54);

var _course = __webpack_require__(141);

var _course2 = _interopRequireDefault(_course);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

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
            popupPhoneBox: false, //绑定手机号
            otherchance: true,
            clickCharge: false,
            popupPhoneText: false, //绑定手机号提示框
            showExplainPopup: false, //是否显示说明弹窗
            showSetAmountPopup: false, //是否显示其他弹窗
            showCodePayPopup: false, //是否显示扫描支付
            giftAmount: "", //我的总值
            payAmount: "", //支付的金额
            DefaultMountList: [], //默认充值金额列表
            setChargeNum: 0, //自定义的金额
            showBody: false,
            CodeIng: '', //微信二维码支付码
            Countdown: 60, //倒计时
            showItemPopup: false,
            indexNum: -2,
            itemInfo: {}, //存放当前点击的面额信息
            showPayWayPopup: false //选择支付方式
        };
    },
    created: function created() {
        this.init();
        this.$store.commit("setTitle", "我的余额");
        this.$store.commit("hideTabber");
        this.reloadPage();
    },
    beforeRouteEnter: function beforeRouteEnter(to, from, next) {

        sessionStorage.setItem("referrer", from.path);

        next();
    },
    beforeRouteLeave: function beforeRouteLeave(to, from, next) {
        if (to.path.indexOf('/giftBalanceDetail') == -1) {
            sessionStorage.removeItem("giftpage");
        }

        next();
    },

    filters: {
        toThousands: function toThousands(money) {
            //
            if (money && money != null) {
                money = String(money);
                var left = money.split('.')[0],
                    right = money.split('.')[1];
                right = right ? right.length >= 2 ? '.' + right.substr(0, 2) : '.' + right + '0' : '.00';
                var temp = left.split('').reverse().join('').match(/(\d{1,3})/g);
                return (Number(money) < 0 ? "-" : "") + temp.join(',').split('').reverse().join('') + right;
            } else if (money === 0) {
                return '0.00';
            } else {
                return "";
            }
            return money;
        }
    },
    methods: {
        clickChargeFun: function clickChargeFun() {
            this.clickCharge = false;
        },
        toChargeFun: function toChargeFun() {
            if (this.clickCharge == false) {
                this.otherchance = true;
            }
            this.clickCharge = false;
            if (this.otherchance) {
                this.showSetAmountPopup = true;
            } else {
                this.UserInfoIsMobile(0);
            }
        },

        //判斷是否綁定手機號
        UserInfoIsMobile: function UserInfoIsMobile(is) {
            var _this2 = this;

            //0  定額充值   1其他充值  2立即充值
            this.clickCharge = false;
            this.$http.get('/UserInfo/isBinding').then(function (res) {
                if (res.body.code == 200) {

                    console.log(res);
                    if (res.body.data == 1) {
                        //未綁定手機號
                        _this2.popupPhoneText = true;
                        _this2.showSetAmountPopup = false;
                        if (is == 0) {
                            _this2.showItemPopup = false;
                        } else if (is == 1) {
                            _this2.showSetAmountPopup = false;
                        }
                    } else {
                        if (is == 0) {
                            // this.showPayWayPopup=true;
                            _mintUi.Indicator.open();

                            _this2.toCharge(_this2.itemInfo.cost);
                            _this2.showItemPopup = false;
                        } else if (is == 1) {
                            //其他充值
                            _this2.showSetAmountPopup = false;
                            // this.showPayWayPopup=true;
                            _this2.toCharge(_this2.itemInfo.cost);
                        } else {
                            console.log('liji');
                            _this2.showSetAmountPopup = false;

                            // this.showPayWayPopup =true;
                            _this2.toCharge(_this2.itemInfo.cost);
                        }
                    }
                }
            });
        },
        popupPhoneBoxs: function popupPhoneBoxs(data) {
            console.log(data);
            if (data == false) {
                this.popupPhoneBox = data;
            }
        },
        PhoneBoxFun: function PhoneBoxFun() {
            this.popupPhoneText = false;
            this.popupPhoneBox = true;
        },
        OtherRecharge: function OtherRecharge() {
            //其他充值
            console.log(this.setChargeNum);
            this.clickCharge = false;
            if (this.setChargeNum != '') {
                this.itemInfo.cost = this.setChargeNum;
                this.UserInfoIsMobile(2);
            } else {
                (0, _mintUi.Toast)({
                    message: "充值不能为空",
                    duration: 3000
                });
            }
        },
        cardPay: function cardPay(money) {
            var _this3 = this;

            //认证支付
            this.$http.get(this.hostUrl + "/LLpay/getBankList").then(function (res) {
                if (res.body.code == -16033) {
                    //未绑定银行卡  支付
                    console.log(money);
                    _this3.$router.replace('/cardPay/' + money);
                } else {
                    //已绑定  选择银行卡支付
                    _this3.$router.replace('/pickCardPay/' + money);
                }
            });
        },
        clickItem: function clickItem(img, denomination, cost, index) {
            this.itemInfo.image = img;
            this.itemInfo.denomination = denomination;
            this.itemInfo.cost = cost;
            this.otherchance = false;
            this.clickCharge = true;
            this.setChargeNum = 0;
            this.indexNum = index;

            // this.showItemPopup = true;
        },
        init: function init() {
            this.getGiftBalance();
            this.getDefaultMount();
        },
        toCharge: function toCharge(amount) {
            var _this4 = this;

            this.Countdown = 60;
            //充值
            var reg = /^[0-9]*[1-9][0-9]*$/;
            if (this.showSetAmountPopup == true && amount.toString().indexOf(".") > -1) {
                //!reg.test(amount)
                //                Toast('请勿输入小数');
                return;
            }
            if (amount.length > 6) {
                //                Toast('应小于六位数');
                return;
            }
            if (amount > 0) {
                if (this.isWeiXin) {
                    this.$http.post(this.hostUrl + "/WechatPay/inpour", { user_id: this.userId, amount: amount }, { emulateJSON: true }).then(function (res) {
                        _this4.jsonstr = res.body;
                        console.log("setChargeNum", _this4.setChargeNum);
                        _this4.payAmount = amount;
                        _this4.callpay();
                    });
                } else {
                    //二维码支付
                    this.$http.post(this.hostUrl + "/WechatPay/native_pay", { user_id: this.userId, amount: amount }, { emulateJSON: true }).then(function (res) {
                        console.log(res.body.data);
                        _this4.CodeIng = res.body.data.qr_url;
                        _this4.showCodePayPopup = true;
                        _mintUi.Indicator.close();
                        var order_no = res.body.data.order_no;
                        var orderNoTime = setInterval(function (res) {
                            _this4.WechatPay(order_no, orderNoTime);
                        }, 2000);

                        var time = setInterval(function (res) {
                            if (_this4.Countdown == 0) {
                                _this4.showCodePayPopup = false;
                                clearInterval(orderNoTime);
                                clearInterval(time);
                            } else {
                                _this4.Countdown--;
                            }
                        }, 1000);
                    });
                }
            }
        },
        WechatPay: function WechatPay(order_no, orderNoTime) {
            var _this5 = this;

            //訂單状态查询
            console.log('123456');
            this.$http.post(this.hostUrl + "/WechatPay/orderStatus", { order_no: order_no }, { emulateJSON: true }).then(function (res) {
                console.log(res);
                if (res.body.data == 1) {
                    //支付成功
                    _this5.showCodePayPopup = false;
                    _mintUi.Indicator.close();
                    clearInterval(orderNoTime);
                    _this5.showPayWayPopup = false;
                    _this5.getGiftBalance();
                }
            });
        },
        jsApiCall: function jsApiCall() {
            var _this = this;
            WeixinJSBridge.invoke("getBrandWCPayRequest", JSON.parse(this.jsonstr), function (res) {
                WeixinJSBridge.log("res.err_msg", res.err_msg);
                if (res.err_msg == "get_brand_wcpay_request:ok") {
                    //支付成功
                    _this.showSetAmountPopup = false;

                    setTimeout(function () {
                        _this.getGiftBalance();
                    }, 1000);

                    var giftpage = sessionStorage.getItem("giftpage"); //判断是否是从我的进来的
                    var referrer = sessionStorage.getItem("referrer");

                    if (referrer.indexOf('/personalCenter') != -1 || giftpage) {
                        //如果是从我的进来，就不返回前一页
                        (0, _mintUi.Toast)({
                            //						        message: '充值成功,增加'+_this.payAmount+'',
                            message: "\n                                    \u5DF2\u6210\u529F\u5145\u503C" + _this.payAmount + "\n                                    ",
                            duration: 2000
                        });
                        _this.showPayWayPopup = false;
                    } else {
                        (0, _mintUi.Toast)({
                            //						        message: '充值成功,增加'+_this.payAmount+'',
                            message: "\n                                    \u5DF2\u6210\u529F\u5145\u503C" + _this.payAmount + "\n                                    \u6B63\u8FD4\u56DE\u4E0A\u4E00\u9875\uFF0C\u8BF7\u7A0D\u5019\n                                    ",
                            duration: 2000
                        });
                        setTimeout(function () {
                            window.history.go(-1);
                        }, 100);
                    }
                }
                if (res.err_msg == "get_brand_wcpay_request:cancel") {
                    (0, _mintUi.Toast)({
                        //取消支付
                        message: "已取消充值",
                        duration: 2000
                    });
                }
                if (res.err_msg == "get_brand_wcpay_request:fail") {
                    (0, _mintUi.Toast)("支付失败");
                }
            });
        },
        callpay: function callpay() {
            if (typeof WeixinJSBridge == "undefined") {
                if (document.addEventListener) {
                    document.addEventListener("WeixinJSBridgeReady", this.jsApiCall, false);
                } else if (document.attachEvent) {
                    document.attachEvent("WeixinJSBridgeReady", this.jsApiCall);
                    document.attachEvent("onWeixinJSBridgeReady", this.jsApiCall);
                }
            } else {
                this.jsApiCall();
                _mintUi.Indicator.close();
            }
        },
        getGiftBalance: function getGiftBalance() {
            var _this6 = this;

            //获取账户
            this.$http.get(this.hostUrl + "/User/getAccountBalance").then(function (res) {
                if (res.body.code == 200) {
                    _this6.giftAmount = res.body.data;
                }
            });
        },
        getDefaultMount: function getDefaultMount() {
            var _this7 = this;

            //获取默认充值数额
            this.$http.get(this.hostUrl + "/Inpour/getInpourActive").then(function (res) {
                if (res.body.code == 200) {
                    _this7.showBody = true;
                    _this7.DefaultMountList = res.body.data;
                }
            });
        }
    },
    directives: {
        numberOnly: {
            //限制只能输入整数，不能输入小数
            bind: function bind(el) {

                el.handler = function () {
                    el.value = el.value.replace(/[^0-9]/g, "");
                };
                el.addEventListener("input", el.handler);
            },
            unbind: function unbind(el) {
                el.removeEventListener("input", el.handler);
            }
        }
    },
    components: {
        coursePhoneBox: _course2.default
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/***/ }),

/***/ 989:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.mint-toast {\n  z-index: 9999;\n}\n.Remarks {\n  font-size: 0.18rem;\n  color: #b2b2b2;\n  text-align: center;\n  margin-top: .2rem;\n  padding-bottom: 0.24rem;\n}\n.courseBy {\n  width: 80%;\n  position: fixed;\n  background: url(\"/images/paypop_up_window_topphoto.png\") top center #fff no-repeat;\n  background-size: 100%;\n  padding-top: 3.5rem;\n  border-radius: 10px;\n  z-index: 110;\n}\n.courseBy h2 {\n    padding-top: 0.4rem;\n    text-align: center;\n    line-height: 40px;\n    color: #1c0808;\n    font-size: 18px;\n    font-weight: bold;\n}\n.courseBy p {\n    line-height: 25px;\n    padding: 10px 15px;\n    color: #888888;\n    text-align: center;\n    padding-bottom: 0.8rem;\n}\n.courseBy .close {\n    width: 0.42rem;\n    height: 0.42rem;\n    background: url(\"/images/guanbi_ben_icon.png\") no-repeat;\n    background-size: 100%;\n    position: absolute;\n    top: 5px;\n    right: 5px;\n}\n.courseBy .button {\n    border-radius: 0px 0px 10px 10px;\n    background: #c62f2f;\n    width: 100%;\n    height: 42px;\n    padding-top: 12px;\n}\n.courseBy .button button {\n      width: 100%;\n      line-height: 30px;\n      border: 0px;\n      background: none;\n      color: #fff;\n      font-size: 16px;\n}\n.gift-balance {\n  height: 100%;\n  background: #fff;\n}\n.gift-balance .v-mask {\n    position: fixed;\n    left: 0;\n    top: 0;\n    width: 100%;\n    height: 100%;\n    opacity: .5;\n    background: #000;\n    z-index: 11;\n}\n.gift-balance .tocharge-b {\n    position: relative;\n    width: 100%;\n    margin: .6rem auto 0;\n    color: #fff;\n    height: .88rem;\n    line-height: .88rem;\n    text-align: center;\n    background: url(\"/images/2.0/topup.png\") center center no-repeat;\n    background-size: 100% auto;\n}\n.gift-balance .maskIndex {\n    z-index: 12;\n}\n.gift-balance header {\n    color: #fff;\n    background: #37383b;\n    padding: 0.48rem 0 0;\n    height: 3.15rem;\n}\n.gift-balance header h3 {\n      font-size: 0.28rem;\n      padding-left: 0.32rem;\n      margin-bottom: 0.32rem;\n}\n.gift-balance header h3 span {\n        float: right;\n        font-size: 0.24rem;\n        padding: 0.1rem 0.32rem;\n        border-top-left-radius: 50px;\n        border-bottom-left-radius: 50px;\n        margin-top: -0.1rem;\n}\n.gift-balance header h1 {\n      font-weight: bold;\n      font-size: 1rem;\n      padding: 0 0.32rem;\n}\n.gift-balance header h1 i {\n        font-size: 0.36rem;\n        font-weight: normal;\n        vertical-align: baseline;\n        margin-left: 4px;\n}\n.gift-balance header section {\n      color: #b5b5b7;\n      font-size: 0.2rem;\n      float: left;\n      padding: 0 0.32rem;\n      margin-top: 0.48rem;\n}\n.gift-balance header section i {\n        display: inline-block;\n        width: 0.3rem;\n        height: 0.3rem;\n        background: url(" + __webpack_require__(1077) + ") no-repeat;\n        background-size: 100% 100%;\n        vertical-align: middle;\n}\n.gift-balance header section span {\n        vertical-align: middle;\n}\n.gift-balance .explain {\n    height: 1rem;\n    line-height: 1rem;\n    background: #ffffff;\n    position: absolute;\n    z-index: 9;\n    top: 3.3rem;\n    width: 90%;\n    left: 50%;\n    margin-left: -45%;\n    border-radius: 5px;\n}\n.gift-balance .explain .left {\n      color: #353535;\n      padding-left: 0.24rem;\n      float: left;\n}\n.gift-balance .explain .right {\n      float: right;\n      color: #bb7777;\n      padding-right: 0.44rem;\n}\n.gift-balance .explain .right::after {\n        border: 1px solid #c8c8cd;\n        border-bottom-width: 0;\n        border-left-width: 0;\n        content: \" \";\n        top: 54%;\n        position: absolute;\n        width: .16rem;\n        height: .16rem;\n        -webkit-transform: translateY(-50%) rotate(45deg);\n            -ms-transform: translateY(-50%) rotate(45deg);\n                transform: translateY(-50%) rotate(45deg);\n}\n.gift-balance .explain .right i {\n        color: #575757;\n}\n.gift-balance .explain div {\n      color: #f34a4a;\n      font-size: 0.34rem;\n      float: left;\n}\n.gift-balance .explain div span {\n        vertical-align: middle;\n}\n.gift-balance .recharge {\n    background-color: #fff;\n    padding: 0 0.3rem;\n    box-sizing: border-box;\n    display: block;\n    min-height: 65%;\n}\n.gift-balance .recharge section {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-flex-wrap: wrap;\n          -ms-flex-wrap: wrap;\n              flex-wrap: wrap;\n      width: 100%;\n}\n.gift-balance .recharge section > div {\n        width: -webkit-calc((100% - .9rem)/3);\n        width: calc((100% - .9rem)/3);\n        margin-top: .6rem;\n        background-size: 100% 100%;\n        border-radius: 3px;\n        height: 2.3rem;\n        box-sizing: border-box;\n        position: relative;\n}\n.gift-balance .recharge section > div:last-child h1 {\n          font-size: 0.36rem;\n}\n.gift-balance .recharge section > div h1 {\n          font-size: 0.52rem;\n          color: #ffed8b;\n          padding: 0.2rem 0;\n          line-height: 0.4rem;\n          text-align: center;\n}\n.gift-balance .recharge section > div h1 span {\n            font-size: 0.26rem;\n}\n.gift-balance .recharge section > div p {\n          bottom: 0.7rem;\n          width: 100%;\n          position: absolute;\n          font-size: .32rem;\n          text-align: center;\n          color: #fff;\n}\n.gift-balance .recharge section > div:nth-child(3n-1) {\n        margin-left: 0.45rem;\n        margin-right: 0.45rem;\n}\n.gift-balance .explain-popup {\n    width: 6.3rem;\n    border-radius: 5px;\n}\n.gift-balance .explain-popup main {\n      padding: .36rem .4rem .36rem .36rem;\n}\n.gift-balance .explain-popup h1 {\n      font-size: 0.34rem;\n      color: #353535;\n      text-align: center;\n      margin-bottom: .4rem;\n}\n.gift-balance .explain-popup ul li {\n      margin-bottom: .5rem;\n}\n.gift-balance .explain-popup ul li h3 {\n        color: #888;\n        font-size: 0.32rem;\n        margin-bottom: 0.18rem;\n}\n.gift-balance .explain-popup ul li h3:before {\n          content: \"\";\n          display: inline-block;\n          width: 6px;\n          height: 6px;\n          border-radius: 50%;\n          background: #c62f2f;\n          vertical-align: middle;\n          margin-right: 0.2rem;\n          margin-bottom: 0.03rem;\n}\n.gift-balance .explain-popup ul li p {\n        font-size: 0.28rem;\n        color: #b2b2b2;\n        line-height: 20px;\n}\n.gift-balance .explain-popup ul li:last-child {\n        margin-bottom: 0;\n}\n.gift-balance .explain-popup .close {\n      width: 0.6rem;\n      height: 0.6rem;\n      position: absolute;\n      top: 6px;\n      right: 6px;\n      background: url(" + __webpack_require__(1075) + ") no-repeat center center;\n      background-size: 60% 60%;\n}\n.gift-balance .set-amount-popup {\n    width: 5.4rem;\n    border-radius: 5px;\n    text-align: center;\n}\n.gift-balance .set-amount-popup main .info .img {\n      width: 2rem;\n      height: 2.3rem;\n      background: #fff;\n      background-size: 100% 100%;\n      display: inline-block;\n      margin-top: .6rem;\n      color: #ffffff;\n      position: relative;\n}\n.gift-balance .set-amount-popup main .info .img h3 {\n        font-size: .42rem;\n        text-align: center;\n        color: #ffed8b;\n        margin: .2rem;\n}\n.gift-balance .set-amount-popup main .info .img h3 i {\n          font-size: .24rem;\n}\n.gift-balance .set-amount-popup main .info .img p {\n        position: absolute;\n        bottom: .7rem;\n        width: 100%;\n        text-align: center;\n        font-size: .24rem;\n}\n.gift-balance .set-amount-popup main .info > h4 {\n      margin: .36rem 0;\n      font-size: .32rem;\n      color: #1c0808;\n}\n.gift-balance .set-amount-popup main .info input {\n      width: 3rem;\n      margin-bottom: .48rem;\n      color: #c62f2f;\n      text-align: center;\n      border-bottom: 1px solid #EDEDED;\n      padding-bottom: .16rem;\n      font-size: .32rem;\n}\n.gift-balance .set-amount-popup main .info input::-webkit-input-placeholder {\n        color: #888888;\n}\n.gift-balance .set-amount-popup main .bottom-btn {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      height: 1rem;\n      border-radius: 0 0 5px 5px;\n}\n.gift-balance .set-amount-popup main .bottom-btn > div {\n        -webkit-box-flex: 1;\n        -webkit-flex: 1;\n            -ms-flex: 1;\n                flex: 1;\n        color: #ffffff;\n        background: #c62f2f;\n        text-align: center;\n        line-height: 1rem;\n        font-size: .36rem;\n}\n.gift-balance .set-amount-popup main .bottom-btn > div:first-child {\n          border-bottom-left-radius: 5px;\n}\n.gift-balance .set-amount-popup main .bottom-btn > div:last-child {\n          border-bottom-right-radius: 5px;\n          position: relative;\n}\n.gift-balance .set-amount-popup main .bottom-btn > div:last-child::before {\n            content: '';\n            display: inline-block;\n            width: 1px;\n            height: .68rem;\n            background: #da9e9e;\n            position: absolute;\n            left: 0;\n            top: .16rem;\n}\n.gift-balance .font-13 {\n    font-size: 0.26rem !important;\n}\n.gift-balance .denomination {\n    margin-top: 40% !important;\n}\n.gift-balance .denomination i {\n      font-size: 0.36rem !important;\n}\n.gift-balance .item-popup {\n    width: 5.4rem;\n    border-radius: 5px;\n    text-align: center;\n}\n.gift-balance .item-popup main .info .img {\n      width: 2rem;\n      height: 2.3rem;\n      background: #fff;\n      background-size: 100% 100%;\n      display: inline-block;\n      margin-top: .6rem;\n      color: #ffffff;\n      position: relative;\n}\n.gift-balance .item-popup main .info .img h3 {\n        font-size: .42rem;\n        text-align: center;\n        margin: .2rem;\n        color: #ffed8b;\n}\n.gift-balance .item-popup main .info .img h3 i {\n          font-size: .24rem;\n}\n.gift-balance .item-popup main .info .img p {\n        position: absolute;\n        bottom: .7rem;\n        text-align: center;\n        width: 100%;\n        font-size: .24rem;\n}\n.gift-balance .item-popup main .info > h4 {\n      margin: .36rem 0;\n      font-size: .32rem;\n      color: #1c0808;\n}\n.gift-balance .item-popup main .info > p {\n      color: #c62f2f;\n      font-size: .32rem;\n      margin-bottom: .64rem;\n}\n.gift-balance .item-popup main .bottom-btn {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      height: 1rem;\n      border-radius: 0 0 5px 5px;\n}\n.gift-balance .item-popup main .bottom-btn > div {\n        -webkit-box-flex: 1;\n        -webkit-flex: 1;\n            -ms-flex: 1;\n                flex: 1;\n        color: #ffffff;\n        background: #c62f2f;\n        text-align: center;\n        line-height: 1rem;\n        font-size: .36rem;\n}\n.gift-balance .item-popup main .bottom-btn > div:first-child {\n          border-bottom-left-radius: 5px;\n}\n.gift-balance .item-popup main .bottom-btn > div:last-child {\n          border-bottom-right-radius: 5px;\n          position: relative;\n}\n.gift-balance .item-popup main .bottom-btn > div:last-child::before {\n            content: '';\n            display: inline-block;\n            width: 1px;\n            height: .68rem;\n            background: #da9e9e;\n            position: absolute;\n            left: 0;\n            top: .16rem;\n}\n.gift-balance .pay-way-popup {\n    width: 100%;\n}\n.gift-balance .pay-way-popup main .title {\n      height: 1rem;\n      line-height: 1rem;\n      position: relative;\n      color: #1c0808;\n      font-size: .32rem;\n      text-align: center;\n      border-bottom: 1px solid #e8e8e8;\n}\n.gift-balance .pay-way-popup main .title span {\n        width: .3rem;\n        height: .3rem;\n        position: absolute;\n        top: .35rem;\n        right: .24rem;\n        background: url(\"/images/cha.png\") no-repeat 100%/100%;\n}\n.gift-balance .pay-way-popup main ul {\n      padding: 0 .24rem;\n}\n.gift-balance .pay-way-popup main ul li {\n        height: 1rem;\n        line-height: 1rem;\n        border-bottom: 1px solid #e8e8e8;\n        color: #353535;\n        font-size: .32rem;\n        position: relative;\n}\n.gift-balance .pay-way-popup main ul li a {\n          width: 80%;\n          height: 100%;\n          display: inline-block;\n}\n.gift-balance .pay-way-popup main ul li::before {\n          content: '';\n          display: inline-block;\n          width: .46rem;\n          height: .46rem;\n          margin: 0 .24rem;\n          vertical-align: middle;\n}\n.gift-balance .pay-way-popup main ul li:nth-child(1)::before {\n          background: url(\"/images/3.0/wechat-icon.png\") no-repeat 100%/100%;\n}\n.gift-balance .pay-way-popup main ul li:nth-child(2)::before {\n          background: url(\"/images/3.0/bank-card-icon.png\") no-repeat 100%/100%;\n}\n.gift-balance .pay-way-popup main ul li:nth-child(3)::before {\n          background: url(\"/images/3.0/bank-card-icon.png\") no-repeat 100%/100%;\n}\n.gift-balance .pay-way-popup main ul li::after {\n          border: 1px solid #c8c8cd;\n          border-bottom-width: 0;\n          border-left-width: 0;\n          content: \" \";\n          top: 54%;\n          right: .24rem;\n          position: absolute;\n          width: .16rem;\n          height: .16rem;\n          -webkit-transform: translateY(-50%) rotate(45deg);\n              -ms-transform: translateY(-50%) rotate(45deg);\n                  transform: translateY(-50%) rotate(45deg);\n}\n.gift-balance .pay-way-popup main ul li:last-child {\n          border-bottom: none;\n}\n", ""]);

// exports


/***/ })

});