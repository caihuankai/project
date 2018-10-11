webpackJsonp([22],{

/***/ 1007:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.columnDetail {\n  background: #fff;\n}\n.columnDetail a[target=_blank] {\n    display: inline;\n}\n.columnDetail .tips {\n    padding-top: .2rem;\n    padding-bottom: .4rem;\n}\n.columnDetail .tips p {\n      font-size: .2rem;\n      color: #b2b2b2;\n      text-align: center;\n}\n.columnDetail header {\n    padding: .5rem .24rem;\n}\n.columnDetail header h2 {\n      font-size: .4rem;\n      color: #1c0808;\n      font-weight: bold;\n}\n.columnDetail header > section {\n      padding-top: .24rem;\n      color: #878787;\n      font-size: .24rem;\n}\n.columnDetail header > section .number {\n        float: right;\n}\n.columnDetail header > section .number > span:first-child {\n          padding-left: .4rem;\n          background: url(\"/images/column/icons8-Eye-100.png\") no-repeat left center;\n          background-size: .32rem .22rem;\n          margin-right: .18rem;\n}\n.columnDetail header > section .number > span:last-child {\n          padding-left: .34rem;\n          background: url(\"/images/column/nrxq_zan3.png\") no-repeat left center;\n          background-size: .23rem .25rem;\n}\n.columnDetail .userInfo {\n    background-color: #f2f4f5;\n    width: auto;\n    padding: .16rem .24rem;\n}\n.columnDetail .userInfo .img {\n      float: left;\n      margin-right: .16rem;\n}\n.columnDetail .userInfo .img img {\n        width: 1.3rem;\n        height: 1.3rem;\n        border-radius: 100%;\n}\n.columnDetail .userInfo .title {\n      width: 60%;\n      float: left;\n}\n.columnDetail .userInfo .title h3 {\n        padding-top: .3rem;\n        color: #000000;\n        font-size: .28rem;\n        width: 100%;\n        overflow: hidden;\n        text-overflow: ellipsis;\n        white-space: nowrap;\n}\n.columnDetail .userInfo .title p {\n        color: #878787;\n        font-size: .24rem;\n        padding-top: .1rem;\n        width: 100%;\n        overflow: hidden;\n        text-overflow: ellipsis;\n        white-space: nowrap;\n}\n.columnDetail .userInfo .attention {\n      float: right;\n}\n.columnDetail .userInfo .attention img {\n        margin-top: .32rem;\n        width: .6rem;\n        height: .6rem;\n        float: right;\n        margin-right: .15rem;\n}\n.columnDetail .userInfo .attention p {\n        float: right;\n        padding-top: .36rem;\n        text-align: center;\n        color: #878787;\n        font-size: .24rem;\n}\n.columnDetail .userInfo .attention p span {\n          display: block;\n}\n.columnDetail .content {\n    color: #333;\n    font-size: .28rem;\n    line-height: .6rem;\n    padding: .24rem;\n    position: relative;\n}\n.columnDetail .content img {\n      max-width: 100%;\n}\n.columnDetail .content pre {\n      white-space: pre-wrap;\n      white-space: -moz-pre-wrap;\n      white-space: -pre-wrap;\n      white-space: -o-pre-wrap;\n      word-wrap: break-word;\n}\n.columnDetail .content .free {\n      /*  padding-bottom: 2.8rem;*/\n      min-height: .8rem;\n}\n.columnDetail .content .add-code img {\n      width: 100%;\n}\n.columnDetail .content .chargeBg {\n      position: absolute;\n      background: url(\"/images/column/chargeBg-02.png\") no-repeat top center;\n      background-size: 100% 100%;\n      width: 94%;\n      height: 2.39rem;\n      -webkit-transform: translateY(-57%);\n          -ms-transform: translateY(-57%);\n              transform: translateY(-57%);\n}\n.columnDetail .content .chargeBg p {\n        color: #c62f2f;\n        font-size: .28rem;\n        text-align: center;\n}\n.columnDetail .content .chargeBg p img {\n          width: .25rem;\n          padding-right: .14rem;\n}\n.columnDetail .content .zan-area {\n      margin-top: .8rem;\n}\n.columnDetail .content .zan-area .tip {\n        font-size: .2rem;\n        color: #b2b2b2;\n}\n.columnDetail .content .zan-area .btn {\n        width: 1.6rem;\n        height: 1.6rem;\n        margin: .6rem auto;\n        background: #FF3229;\n        border-radius: 50%;\n        text-align: center;\n        color: #fff;\n        line-height: 1em;\n        padding-top: .28rem;\n        box-sizing: border-box;\n}\n.columnDetail .content .zan-area .btn > span {\n          display: inline-block;\n          width: .4rem;\n          height: .42rem;\n          background: url(\"/images/college/nrxq_zan1.png\") no-repeat center center;\n          background-size: 100% 100%;\n}\n.columnDetail .content .zan-area .btn > span.active {\n            background: url(\"/images/college/nrxq_zan2.png\") no-repeat center center;\n            background-size: 100% 100%;\n}\n.columnDetail .content .zan-area .btn h5 {\n          font-size: .36rem;\n          margin-top: .14rem;\n}\n", ""]);

// exports


/***/ }),

/***/ 1165:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('main', {
    staticClass: "columnDetail"
  }, [_c('header', [_c('h2', [_vm._v(_vm._s(_vm.detailData.title))]), _vm._v(" "), _c('section', [_c('span', [_vm._v(_vm._s(_vm.detailData.publish_time))]), _vm._v(" "), _c('section', {
    staticClass: "number"
  }, [_c('span', [_vm._v(_vm._s(_vm.detailData.study_num + _vm.detailData.virtual_study_num))]), _vm._v(" "), _c('span', [_vm._v(_vm._s(_vm.detailData.like_num + _vm.detailData.virtual_like_num))])])])]), _vm._v(" "), _c('div', {
    staticClass: "userInfo clearfix"
  }, [_c('div', {
    staticClass: "img",
    on: {
      "click": function($event) {
        _vm.clickColumn(_vm.columnInfo.name, _vm.detailData.column_id)
      }
    }
  }, [(_vm.detailData.head_add) ? [_c('img', {
    attrs: {
      "src": ("" + (_vm.detailData.head_add))
    }
  })] : [_c('img', {
    attrs: {
      "src": "/images/index/dcl.png"
    }
  })]], 2), _vm._v(" "), _c('div', {
    staticClass: "title",
    on: {
      "click": function($event) {
        _vm.clickColumn(_vm.columnInfo.name, _vm.detailData.column_id)
      }
    }
  }, [_c('h3', [_vm._v(_vm._s(_vm.columnInfo.name))]), _vm._v(" "), _c('p', [_vm._v(_vm._s(_vm.columnInfo.lead))])]), _vm._v(" "), _c('div', {
    staticClass: "attention"
  }, [_c('p', [_c('span', [_vm._v(_vm._s(_vm.columnInfo.focusNum))]), _vm._v("\n                关注\n            ")]), _vm._v(" "), (_vm.userId != _vm.detailData.uid) ? [(_vm.isFocus) ? _c('img', {
    attrs: {
      "src": "/images/column/guanzhu-w.png"
    },
    on: {
      "click": _vm.addFocus
    }
  }) : _c('img', {
    attrs: {
      "src": "/images/2.0/follow_shine_button.gif"
    },
    on: {
      "click": _vm.addFocus
    }
  })] : _vm._e()], 2)]), _vm._v(" "), _c('div', {
    staticClass: "content",
    style: ({
      'margin-bottom': _vm.detailData.isBuy ? '0rem' : '1rem'
    })
  }, [_c('div', {
    staticClass: "free",
    style: ({
      'padding-bottom': _vm.isCharge ? '2.8rem' : '.3rem'
    }),
    domProps: {
      "innerHTML": _vm._s(_vm.detailData.content)
    }
  }), _vm._v(" "), (_vm.isCharge == false) ? _c('div', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.detailData.isBuy == 1),
      expression: "detailData.isBuy==1"
    }],
    staticClass: "charge",
    domProps: {
      "innerHTML": _vm._s(_vm.detailData.pay_content)
    }
  }) : _vm._e(), _vm._v(" "), (_vm.detailData.isBuy == 0) ? _c('div', {
    staticClass: "chargeBg",
    on: {
      "click": function($event) {
        _vm.Unlock()
      }
    }
  }) : _vm._e(), _vm._v(" "), (_vm.detailData.level == 0 || (_vm.detailData.level == 1 && _vm.detailData.isBuy == 1)) ? _c('section', {
    staticClass: "zan-area"
  }, [_c('p', {
    staticClass: "tip"
  }, [_vm._v("免责声明：本文内容仅供参考，不构成投资建议")]), _vm._v(" "), _c('div', {
    staticClass: "btn",
    on: {
      "click": _vm.setZan
    }
  }, [_c('span', {
    class: {
      'active': _vm.detailData.isZan || _vm.detailData.isLike
    }
  }), _vm._v(" "), _c('h5', [_vm._v(_vm._s(_vm.detailData.like_num + _vm.detailData.virtual_like_num))])])]) : _vm._e(), _vm._v(" "), (_vm.detailData.isBuy == 0) ? [_c('div', {
    staticClass: "add-code",
    style: ({
      'padding-top': _vm.detailData.isBuy ? '0px' : '60px',
      'padding-bottom': _vm.detailData.isBuy ? '0px' : '0rem'
    })
  }, [_c('img', {
    attrs: {
      "src": "/images/space/erweima_ben.png"
    }
  })])] : [_c('div', {
    staticClass: "add-code",
    staticStyle: {
      "margin-top": ".24rem"
    }
  }, [_c('img', {
    attrs: {
      "src": "/images/space/erweima_ben.png"
    }
  })])], _vm._v(" "), (false) ? _c('div', {
    staticClass: "tips"
  }, [_c('p', [_vm._v("以上观点仅供参考，不构成投资建议")])]) : _vm._e()], 2), _vm._v(" "), _c('Qrcode'), _vm._v(" "), (_vm.detailData.isBuy == 0) ? _c('chargeM', {
    attrs: {
      "routeType": _vm.routeType,
      "typeText": _vm.typeText,
      "chargeData": _vm.chargeData,
      "showBuyPopup": _vm.showBuyPopup,
      "Articles": _vm.detailData.price,
      "columnId": _vm.columnId,
      "islevel": _vm.columnInfo.level
    },
    on: {
      "BuyPopup": _vm.BuyPopupFun,
      "isBuy": _vm.isBuyFun
    }
  }) : _vm._e()], 1)
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-50b6e556", module.exports)
  }
}

/***/ }),

/***/ 1275:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(1007);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("49f16348", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-50b6e556\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./detail.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-50b6e556\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./detail.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 420:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1275)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(843),
  /* template */
  __webpack_require__(1165),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\column\\detail.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] detail.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-50b6e556", Component.options)
  } else {
    hotAPI.reload("data-v-50b6e556", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 520:
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

exports.default = {
    data: function data() {
        return {
            codeImg: "", //大策略二维码
            closePop: false //大策略二维码

        };
    },
    mounted: function mounted() {
        var _this = this;

        this.$store.dispatch("getUserInfo", function (res) {

            if (_this.isSubscribe == false) {
                if (_this.$route.query.shareId == 1) {
                    _this.getQrCode();
                }
            }
        });
    },

    computed: {
        isSubscribe: function isSubscribe() {
            return this.$store.state.userInfo.isSubscribe;
        }
    },
    methods: {
        /**
        * 获取公众号二维码
        * @return [type] [description]
        */
        getQrCode: function getQrCode() {
            var _this2 = this;

            this.$http.get("/Home/getQrCode").then(function (res) {
                _this2.codeImg = res.data.data;
                _this2.closePop = true;
                alert(ll);
            });
        }
    }
};

/***/ }),

/***/ 523:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.Qcode .liveTitleBox-comment {\n  width: 80%;\n  border-radius: 10px;\n}\n.Qcode .liveTitleBox-comment .img {\n    width: 2.8rem !important;\n    margin: 0.8rem auto 0;\n    height: 2.8rem !important;\n    background-size: 100% auto;\n}\n.Qcode .liveTitleBox-comment .buttom {\n    width: 100%;\n    background: #c62f2f;\n    height: 1rem;\n    border-radius: 0px 0px 10px 10px;\n}\n.Qcode .liveTitleBox-comment .buttom a {\n      display: block;\n      width: 100%;\n      line-height: 1rem;\n      text-align: center;\n      color: #fff;\n}\n.Qcode .liveTitleBox-comment h2 {\n    text-align: center;\n    color: #1c0808;\n    font-size: 16px;\n    font-weight: bold;\n}\n.Qcode .liveTitleBox-comment h2 {\n    font-weight: normal;\n    margin: 0.48rem 0 0.32rem;\n}\n.Qcode .liveTitleBox-comment .class-name {\n    margin: 0.3rem 0 0.3rem;\n}\n.Qcode .liveTitleBox-comment .title {\n    border-bottom: 1px solid #eec0c0;\n}\n.Qcode .liveTitleBox-comment .title input {\n      border: 0px;\n      border-shadow: 0;\n      width: 100%;\n      height: 35px;\n      text-align: center;\n      caret-color: #cd0000;\n}\n.Qcode .liveTitleBox-comment p {\n    line-height: 30px;\n    text-align: center;\n    color: #888;\n}\n", ""]);

// exports


/***/ }),

/***/ 524:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(526)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(520),
  /* template */
  __webpack_require__(525),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\subcomponents\\personalCenter\\QrCode.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] QrCode.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-14776c4c", Component.options)
  } else {
    hotAPI.reload("data-v-14776c4c", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 525:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "Qcode"
  }, [(_vm.closePop) ? _c('div', {
    staticClass: "liveTitleBox-comment mint-popup ",
    staticStyle: {
      "z-index": "2004"
    }
  }, [_c('div', {
    staticClass: "content"
  }, [_c('p', [_c('img', {
    staticClass: "img",
    attrs: {
      "src": _vm.codeImg
    }
  })]), _vm._v(" "), _c('h2', [_vm._v("长按关注大策略公众号")]), _vm._v(" "), _c('P', {
    staticClass: "class-name"
  }, [_vm._v("\n                关注可收到最新投资动态\n            ")])], 1), _vm._v(" "), _c('div', {
    staticClass: "buttom "
  }, [_c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": function($event) {
        _vm.closePop = false
      }
    }
  }, [_vm._v("关闭")])])]) : _vm._e(), _vm._v(" "), (_vm.closePop) ? _c('div', {
    staticClass: "v-modal",
    staticStyle: {
      "z-index": "2002"
    }
  }) : _vm._e()])
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-14776c4c", module.exports)
  }
}

/***/ }),

/***/ 526:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(523);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("03471fdc", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-14776c4c\",\"scoped\":false,\"hasInlineConfig\":true}!../../../node_modules/sass-loader/lib/loader.js!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./QrCode.vue", function() {
     var newContent = require("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-14776c4c\",\"scoped\":false,\"hasInlineConfig\":true}!../../../node_modules/sass-loader/lib/loader.js!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./QrCode.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 743:
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
    props: ['routeType', 'typeText', 'chargeData', 'showBuyPopup', 'Articles', 'columnId', 'islevel'],
    data: function data() {
        return {
            payClassId: this.$route.params.id, //购买栏目/观点ID
            id: this.$route.params.id,
            payAmount: 0, //支付的金额
            residue: '', //我的余额
            payType: 2, // 1：课程 2：观点 3：live直播打赏 6：课程直播打赏 7：购买观点包周服务 8：公共直播间送礼 9：订阅栏目
            dayNum: 0, //订阅天数
            dayNumT: '', //订阅天数
            dayText: '',
            saveT: 0,
            ArticlesNum: 0,
            saveAmount: '' //立省
        };
    },

    computed: (0, _vuex.mapState)({
        isWeiXin: function isWeiXin(state) {
            return state.isWeiXin;
        },
        userId: function userId(state) {
            return state.userInfo.user_id;
        },
        userInfoId: function userInfoId() {
            return this.$store.state.userInfo.user_id;
        },
        type: function type() {
            return this.$store.state.userInfo.type;
        },
        isVest: function isVest() {
            //判断马甲号
            return this.$store.state.userInfo.isVest;
        }
    }),
    created: function created() {
        var _this = this;

        this.$store.dispatch('getUserInfo', function (res) {
            _this.getGift();
            _this.payAmount = _this.Articles;
            var dayText = '';
            var saveT = 0;
            var Articles = 0;
            $.each(_this.chargeData, function (index, item) {
                dayText += item.days + '天/';
                saveT = item.save;
                if (index == 0) {
                    Articles = item.cost;
                }
            });
            _this.dayText = dayText;
            _this.dayText.substr(0, _this.dayText.length - 1);

            _this.saveT = saveT;
            if (_this.Articles == 0) {
                _this.ArticlesNum = Articles;
            } else {
                _this.ArticlesNum = _this.Articles;
            }
            if (_this.islevel == 1) {
                _this.selectPackage(0, _this.chargeData[0]);
            } else {
                _this.selectPackage(-1, _this.Articles);
            }
        });
    },

    methods: {
        clickBuyPopup: function clickBuyPopup(type) {
            //购买面板
            this.$emit('BuyPopup', type);
        },
        selectPackage: function selectPackage(index, item) {
            //选择套餐
            if (index == -1) {
                //单篇
                $('.actives').children().addClass('active');
                $('.noActives').children().removeClass('active');
                this.payAmount = item;
                this.saveAmount = item.save;
                this.payType = 2;
                this.payClassId = this.id;
                this.dayNumT = '单篇';
            } else {
                $('.noActives').children().removeClass('active').eq(index).addClass('active');
                $('.actives').children().removeClass('active');
                this.payAmount = item.cost;
                this.saveAmount = item.save;
                this.payType = 9;
                this.payClassId = this.columnId;
                this.dayNumT = item.days + '天';
                this.dayNum = item.days;
            }
        },

        //获取我的
        getGift: function getGift() {
            var _this2 = this;

            this.$http.get(this.hostUrl + '/User/getAccountBalance').then(function (res) {
                res = res.body;
                if (res.code == 200) {
                    _this2.residue = res.data;
                } else {
                    console.log(res);
                }
            });
        },
        linkRecharge: function linkRecharge() {
            //余额不足充值
            if (this.isWeiXin == false) {
                var u = navigator.userAgent;
                var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Adr') > -1; //android终端
                var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端
                if (isiOS || isAndroid) {
                    this.JsBridge.callHandler('recharge', {} //$class_type = 1;//课程类型 1：单课程 2：系列课  3：系列课子课程
                    , function (res) {
                        res = JSON.parse(res);
                        console.log(res);
                    });
                } else {
                    this.$router.replace({ path: '/giftBalance' });
                }
            } else {
                this.$router.replace({ path: '/giftBalance' });
            }
        },
        topaygift: function topaygift() {
            var _this3 = this;

            //购买
            if (this.dayNum == 0) {
                var data = {
                    user_id: this.userInfoId,
                    class_id: this.payClassId,
                    amount: this.payAmount,
                    type: this.payType
                };
            } else {
                var data = {
                    user_id: this.userInfoId,
                    class_id: this.payClassId,
                    amount: this.payAmount,
                    type: this.payType,
                    num: this.dayNum
                };
            }
            console.log(this.residue);
            if (this.residue >= this.payAmount) {
                this.$http.post(this.hostUrl + '/InpourPay/pay', data, { emulateJSON: true }).then(function (res) {
                    console.log(res.body);
                    if (res.body.code == 0) {
                        (0, _mintUi.MessageBox)('提示', '兑换成功');
                        _this3.clickBuyPopup(false);
                        _this3.$emit('isBuy', 1);
                    } else if (res.body.code == -16026) {
                        //余额不足
                        _this3.$router.push({ path: '/giftBalance' });
                    } else {
                        (0, _mintUi.MessageBox)('提示', res.body.msg);
                    }
                });
            } else {
                this.$router.push({ path: '/giftBalance' });
            }
        }
    }
};
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(49)))

/***/ }),

/***/ 747:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.chargeM .footer {\n  position: fixed;\n  bottom: 0;\n  left: 0;\n  width: 100%;\n  background: #fff;\n  min-height: 1.16rem;\n  padding: .24rem;\n  box-sizing: border-box;\n  box-shadow: 0px 0px 9px 0px #FBF4F4;\n}\n.chargeM .footer .main {\n    position: relative;\n}\n.chargeM .footer .main h3 {\n      font-size: .28rem;\n      color: #1c0808;\n      margin-bottom: .16rem;\n      font-weight: bold;\n}\n.chargeM .footer .main p {\n      font-size: .24rem;\n      color: #888888;\n}\n.chargeM .footer .main p span {\n        color: #c62f2f;\n}\n.chargeM .footer .main .btn {\n      position: absolute;\n      top: -.04rem;\n      right: 0;\n      background: #c62f2f;\n      color: #fff;\n      text-align: center;\n      padding: .1rem .5rem;\n      border-radius: 30px;\n}\n.chargeM .footer .main .btn h4 {\n        font-size: .36rem;\n}\n.chargeM .footer .main .btn h5 {\n        font-size: .24rem;\n}\n.chargeM .buy-popup {\n  width: 100%;\n}\n.chargeM .buy-popup .title {\n    height: 1rem;\n    line-height: 1rem;\n    color: #1c0808;\n    font-size: .32rem;\n    text-align: center;\n    position: relative;\n    border-bottom: 1px solid #e8e8e8;\n    font-weight: bold;\n}\n.chargeM .buy-popup .title .close {\n      position: absolute;\n      top: 0;\n      right: 0;\n      width: .74rem;\n      height: 100%;\n      background: url(\"/images/cha.png\") no-repeat center center;\n      background-size: .3rem .3rem;\n}\n.chargeM .buy-popup .price-list {\n    padding: .14rem .24rem .5rem .24rem;\n}\n.chargeM .buy-popup .price-list .Articles {\n      clear: both;\n      width: 100%;\n      height: auto;\n      display: block;\n      overflow: hidden;\n}\n.chargeM .buy-popup .price-list li {\n      width: 48.2%;\n      float: left;\n      padding: .32rem .24rem;\n      border: 1px solid #e8e8e8;\n      border-radius: 8px;\n      box-sizing: border-box;\n      margin-top: .24rem;\n}\n.chargeM .buy-popup .price-list li:nth-child(2n) {\n        margin-left: .24rem;\n}\n.chargeM .buy-popup .price-list li > div .icon {\n        width: .36rem;\n        height: .36rem;\n        display: inline-block;\n        background: url(\"/images/column/icon-04.png\") no-repeat center center;\n        background-size: 100% 100%;\n        vertical-align: bottom;\n}\n.chargeM .buy-popup .price-list li > div .day {\n        font-size: .32rem;\n        color: #1c0808;\n        margin-left: .12rem;\n        margin-right: .1rem;\n}\n.chargeM .buy-popup .price-list li > div .price {\n        font-size: .24rem;\n        color: #888888;\n}\n.chargeM .buy-popup .price-list li > h4 {\n        font-size: .36rem;\n        color: #c62f2f;\n        margin-top: .15rem;\n        padding-left: .54rem;\n}\n.chargeM .buy-popup .price-list li.active {\n      background: #ffefef;\n      border-color: #fcb4b4;\n}\n.chargeM .buy-popup .price-list li.active .icon {\n        background: url(\"/images/column/icon-05.png\") no-repeat center center;\n        background-size: 100% 100%;\n}\n.chargeM .buy-popup .push-tips {\n    border-bottom: 1px solid #e8e8e8;\n}\n.chargeM .buy-popup .push-tips .push-title {\n      font-size: .32rem;\n      color: #1c0808;\n      margin-left: .24rem;\n}\n.chargeM .buy-popup .push-tips .push-title::before {\n        content: '';\n        display: inline-block;\n        width: .08rem;\n        height: .36rem;\n        background: #FF1144;\n        vertical-align: bottom;\n        margin-right: .24rem;\n}\n.chargeM .buy-popup .push-tips .push-box {\n      margin-top: .42rem;\n      padding-left: .48rem;\n      margin-bottom: .27rem;\n      min-height: .4rem;\n}\n.chargeM .buy-popup .push-tips .push-box img {\n        float: left;\n        width: .8rem;\n        height: .8rem;\n        margin-right: .16rem;\n}\n.chargeM .buy-popup .push-tips .push-box > div h4 {\n        font-size: .28rem;\n        color: #1c0808;\n        margin-bottom: .16rem;\n}\n.chargeM .buy-popup .push-tips .push-box > div p {\n        font-size: .24rem;\n        color: #888888;\n}\n.chargeM .buy-popup .agree .file {\n    font-size: .24rem;\n    color: #888888;\n    padding-left: .48rem;\n    margin: .26rem 0;\n}\n.chargeM .buy-popup .agree .file span {\n      color: #c62f2f;\n}\n.chargeM .buy-popup .agree .box {\n    padding: .24rem;\n    position: relative;\n    margin-top: .14rem;\n}\n.chargeM .buy-popup .agree .box h4 {\n      font-size: .28rem;\n      color: #1c0808;\n      margin-bottom: .16rem;\n      font-weight: bold;\n}\n.chargeM .buy-popup .agree .box p {\n      font-size: .24rem;\n      color: #888888;\n}\n.chargeM .buy-popup .agree .box p span {\n        color: #c62f2f;\n}\n.chargeM .buy-popup .agree .box .button {\n      height: .88rem;\n      line-height: .88rem;\n      background: #c62f2f;\n      color: #fff;\n      position: absolute;\n      top: 0;\n      right: .24rem;\n      padding: 0 .3rem;\n      border-radius: 30px;\n}\n", ""]);

// exports


/***/ }),

/***/ 787:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(794)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(743),
  /* template */
  __webpack_require__(791),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\subcomponents\\column\\chargeM.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] chargeM.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-c5401144", Component.options)
  } else {
    hotAPI.reload("data-v-c5401144", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 791:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('main', {
    staticClass: "chargeM"
  }, [_c('footer', {
    staticClass: "footer"
  }, [_c('div', {
    staticClass: "main"
  }, [_c('h3', [_vm._v("订阅  "), (_vm.islevel == 1) ? [_vm._v(_vm._s(_vm.dayText.substr(0, _vm.dayText.length - 1)))] : _vm._e()], 2), _vm._v(" "), _c('p', [_vm._v("省 "), _c('span', [_vm._v(_vm._s(_vm.saveT))])]), _vm._v(" "), _c('section', {
    staticClass: "btn",
    on: {
      "click": function($event) {
        _vm.clickBuyPopup(true)
      }
    }
  }, [_c('h4', [_vm._v("订阅")]), _vm._v(" "), _c('h5', [_vm._v(_vm._s(_vm.ArticlesNum) + "起")])])])]), _vm._v(" "), _c('mt-popup', {
    staticClass: "buy-popup",
    staticStyle: {
      "z-index": "100"
    },
    attrs: {
      "position": "bottom"
    },
    model: {
      value: (_vm.showBuyPopup),
      callback: function($$v) {
        _vm.showBuyPopup = $$v
      },
      expression: "showBuyPopup"
    }
  }, [_c('section', {
    staticClass: "main"
  }, [_c('div', {
    staticClass: "title"
  }, [_vm._v("\n                " + _vm._s(_vm.typeText) + " "), _c('span', {
    staticClass: "close",
    on: {
      "click": function($event) {
        _vm.clickBuyPopup(false)
      }
    }
  })]), _vm._v(" "), (_vm.routeType == 0) ? _c('ul', {
    staticClass: "price-list clearfix actives",
    staticStyle: {
      "padding-bottom": "10px"
    }
  }, [_c('li', {
    staticClass: "active",
    on: {
      "click": function($event) {
        _vm.selectPackage(-1, _vm.Articles)
      }
    }
  }, [_c('div', [_c('span', {
    staticClass: "icon"
  }), _vm._v(" "), _c('i', {
    staticClass: "day"
  }, [_vm._v("单篇")])]), _vm._v(" "), _c('h4', [_vm._v(_vm._s(_vm.Articles))])])]) : _vm._e(), _vm._v(" "), (_vm.islevel == 1) ? _c('ul', {
    staticClass: "price-list clearfix  noActives"
  }, _vm._l((_vm.chargeData), function(item, index) {
    return _c('li', {
      on: {
        "click": function($event) {
          _vm.selectPackage(index, item)
        }
      }
    }, [_c('div', [_c('span', {
      staticClass: "icon"
    }), _vm._v(" "), _c('i', {
      staticClass: "day"
    }, [_vm._v(_vm._s(item.days) + "天")]), _vm._v(" "), _c('i', {
      staticClass: "price"
    }, [_vm._v("立省" + _vm._s(item.save))])]), _vm._v(" "), _c('h4', [_vm._v(_vm._s(item.cost))])])
  })) : _vm._e(), _vm._v(" "), _c('div', {
    staticClass: "push-tips"
  }, [_c('h1', {
    staticClass: "push-title"
  }, [_vm._v("订阅特权")]), _vm._v(" "), _c('section', {
    staticClass: "push-box"
  }, [_c('img', {
    attrs: {
      "src": "/images/column/push_icon.png"
    }
  }), _vm._v(" "), _c('div', [_c('h4', [_vm._v("主题文章更新")]), _vm._v(" "), _c('p', [_vm._v("APP内实时推送提醒")])])])]), _vm._v(" "), _c('div', {
    staticClass: "agree"
  }, [_c('p', {
    staticClass: "file"
  }, [_vm._v("购买即表示同意"), _c('span', [_c('router-link', {
    attrs: {
      "to": "/agreement"
    }
  }, [_vm._v("《大策略栏目订阅协议》")])], 1)]), _vm._v(" "), _c('section', {
    staticClass: "box"
  }, [_c('h4', [_vm._v("订阅   "), _c('span', [_vm._v(_vm._s(_vm.dayNumT))])]), _vm._v(" "), _c('p', [_c('span', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.saveAmount),
      expression: "saveAmount"
    }]
  }, [_vm._v("省" + _vm._s(_vm.saveAmount))])]), _vm._v(" "), _c('div', {
    staticClass: "button",
    on: {
      "click": function($event) {
        _vm.topaygift()
      }
    }
  }, [_vm._v("确认订阅")])])])])])], 1)
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-c5401144", module.exports)
  }
}

/***/ }),

/***/ 794:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(747);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("c7fbd528", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-c5401144\",\"scoped\":false,\"hasInlineConfig\":true}!../../../node_modules/sass-loader/lib/loader.js!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./chargeM.vue", function() {
     var newContent = require("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-c5401144\",\"scoped\":false,\"hasInlineConfig\":true}!../../../node_modules/sass-loader/lib/loader.js!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./chargeM.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 843:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _mintUi = __webpack_require__(54);

var _chargeM = __webpack_require__(787);

var _chargeM2 = _interopRequireDefault(_chargeM);

var _QrCode = __webpack_require__(524);

var _QrCode2 = _interopRequireDefault(_QrCode);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

exports.default = {
    data: function data() {
        return {
            id: this.$route.params.id,
            routeType: 0, //詳情
            typeText: '订阅文章',
            isCharge: false, //收費文章
            isChargeButton: false, //是否显示收费按钮
            detailData: [], //栏目详情
            chargeData: [], //订阅数据
            columnInfo: [],
            columnId: '', //栏目ID
            isFocus: '', //是否关注本栏目
            showBuyPopup: false, //是否显示购买弹窗
            fromColumnId: ''
        };
    },

    computed: {
        userId: function userId() {
            return this.$store.state.userInfo.user_id;
        }
    },
    updated: function updated() {
        //            window.scroll(0, 0);
    },
    created: function created() {
        this.setCookie('shareLinkId', '', -1);
        this.setCookie('shareLink', '', -1);
        this.setCookie('isShareLink', 2);
        this.$store.commit('hideTabber');
    },

    destroyed: function destroyed() {
        console.log("我已经离开了！");
        this.srcollToTop();
        this.setCookie('isShareLink', 2);
        this.setCookie("isBack", 0);
    },
    beforeRouteEnter: function beforeRouteEnter(to, from, next) {
        next(function (vm) {
            // 通过 `vm` 访问组件实例
            if (from.path.indexOf('/periodical/') != 0 || from.path.indexOf('/realDisk/') != 0) {
                vm.fromColumnId = from.params.type; //获取观点对应的栏目id
                vm.$store.dispatch('getUserInfo', function (res) {
                    vm.$store.commit("setTitle", "内容详情");
                    if (vm.getCookie('indexLink') == vm.id) {
                        vm.getViewPoint(1);
                    } else {
                        vm.getViewPoint();
                    }
                });
            }
        });
    },

    methods: {
        /*点赞*/
        setZan: function setZan() {
            var _this2 = this;

            this.$http.get("Viewpoint/setlikeNumIncById", {
                params: { viewpointId: this.detailData.id }
            }).then(function (res) {
                if (res.body.code == 200) {
                    _this2.detailData.isZan = true;
                    _this2.detailData.like_num = _this2.detailData.like_num + 1;
                } else {
                    (0, _mintUi.Toast)({
                        message: '今天你已经点赞了哦',
                        duration: 800
                    });
                }
            });
        },

        /*
        ** 返回该栏目首页
        */
        clickColumn: function clickColumn(name, id) {
            if (name == '实盘观点') {
                this.$router.push({ path: '/realDisk/' + id + '/' + 0 });
            } else {
                this.$router.push({ path: '/periodical/' + id });
            }
        },
        isBuyFun: function isBuyFun(type) {
            console.log(type);
            this.detailData.isBuy = type;
        },
        BuyPopupFun: function BuyPopupFun(type) {
            //订阅
            this.showBuyPopup = type;
        },
        addFocus: function addFocus() {
            var _this3 = this;

            //关注、取消关注接口
            //                let type = '';//type    关注或取关 1关注 0取消关注
            var type = this.isFocus ? '0' : '1';
            this.$http.post('/Focus/addFocus', {
                user_id: this.userId,
                live_id: this.columnId,
                type: type,
                target: 2
            }, { emulateJSON: true }).then(function (res) {
                (0, _mintUi.Toast)("" + res.body.msg);
                if (res.body.code == 0) {
                    _this3.isFocus = !_this3.isFocus;
                }
            });
        },
        config: function config() {
            var _this4 = this;

            if (this.detailData.head_add == '') {
                this.detailData.head_add = 'http://' + window.location.host + '/images/index/dcl.png';
            }
            var _this = this;
            wx.ready(function () {
                _this4.wxShare([{ //分享到朋友圈
                    title: _this4.detailData.title,
                    desc: _this4.detailData.lead,
                    imgUrl: _this4.detailData.head_add,
                    link: window.location.origin + '/#/column/detail/' + _this4.$route.params.id + '?shareId=1'
                }, {
                    //分享给朋友
                    imgUrl: _this4.detailData.head_add,
                    desc: _this4.detailData.lead,
                    title: _this4.detailData.title,
                    link: window.location.origin + '/#/column/detail/' + _this4.$route.params.id + '?shareId=1'
                }], function () {
                    _this.setShareNumIncById();
                });
            });
        },
        setShareNumIncById: function setShareNumIncById() {
            //分享記錄
            this.$http.get("/Viewpoint/setShareNumIncById", {
                params: {
                    viewpointId: this.$route.params.id
                }
            }).then(function (res) {
                console.log(res.body);
            });
        },
        Unlock: function Unlock() {
            //解鎖

            this.isCharge = false;

            this.isChargeButton = false;
            this.showBuyPopup = true;
        },
        getViewPoint: function getViewPoint(id) {
            var _this5 = this;

            //栏目详细
            var params = {
                viewpointId: this.$route.params.id,
                isColumn: true,
                isUserInfo: true,
                isRead: true,
                columnId: this.fromColumnId
            };
            if (id == 1) {
                params.isIndexRecommend = true;
            }
            this.$http.get("/Viewpoint/getViewPointById", {
                params: params
            }).then(function (res) {
                _this5.detailData = res.body.data;
                _this5.chargeData = res.body.data.columnInfo.cyclePriceInfo;
                _this5.columnInfo = res.body.data.columnInfo;
                _this5.columnId = res.body.data.column_id;
                _this5.isFocus = res.body.data.columnInfo.isFocus;
                if (_this5.userId == _this5.detailData.uid) {
                    //判断是否为讲师发布文章
                    _this5.detailData.isBuy = 1;
                }
                _this5.config();
                if (_this5.detailData.level == 0) {
                    //免费
                    _this5.isChargeButton = false;
                } else {
                    _this5.isChargeButton = true;
                }
            });
        }
    },
    components: {
        chargeM: _chargeM2.default,
        Qrcode: _QrCode2.default
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

/***/ })

});