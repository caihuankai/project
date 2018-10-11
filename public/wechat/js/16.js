webpackJsonp([16],{

/***/ 1117:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('main', {
    staticClass: "periodical"
  }, [_c('div', {
    staticClass: "nav"
  }, [_c('ul', [_c('li', {
    class: {
      active: _vm.tabShow == 0
    },
    on: {
      "click": function($event) {
        _vm.navLink(0)
      }
    }
  }, [_vm._v("精选"), _c('span')]), _vm._v(" "), _c('li', {
    class: {
      active: _vm.tabShow == 1
    },
    on: {
      "click": function($event) {
        _vm.navLink(1)
      }
    }
  }, [_vm._v("付费"), _c('span')]), _vm._v(" "), _c('li', {
    class: {
      active: _vm.tabShow == 2
    },
    on: {
      "click": function($event) {
        _vm.navLink(2)
      }
    }
  }, [_vm._v("栏目推荐"), _c('span')])])]), _vm._v(" "), (_vm.tabShow == 0) ? [(_vm.getShowlist) ? _c('ListM', {
    directives: [{
      name: "infinite-scroll",
      rawName: "v-infinite-scroll",
      value: (_vm.loadMore),
      expression: "loadMore"
    }],
    ref: "child",
    attrs: {
      "viewPointList": _vm.viewPointList,
      "columnId": _vm.columnId,
      "infinite-scroll-disabled": "loading",
      "infinite-scroll-distance": "250",
      "infinite-scroll-immediate-check": "false"
    }
  }) : _c('nodata', {
    attrs: {
      "nochance": "nocontent"
    }
  }), _vm._v(" "), _c('div', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.loading && !_vm.isEnd),
      expression: "loading && !isEnd"
    }],
    staticClass: "loading-ico"
  }, [_c('mt-spinner', {
    attrs: {
      "type": "fading-circle",
      "size": 18
    }
  }), _vm._v(" "), _c('span', [_vm._v("正在加载")])], 1), _vm._v(" "), _c('nomore', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.isEnd),
      expression: "isEnd"
    }],
    attrs: {
      "text": "没有更多啦"
    }
  })] : _vm._e(), _vm._v(" "), (_vm.tabShow == 1) ? [(_vm.viewPointList.length) ? _c('ListM', {
    directives: [{
      name: "infinite-scroll",
      rawName: "v-infinite-scroll",
      value: (_vm.loadMore),
      expression: "loadMore"
    }],
    ref: "child",
    attrs: {
      "viewPointList": _vm.viewPointList,
      "columnId": _vm.columnId,
      "infinite-scroll-disabled": "loading",
      "infinite-scroll-distance": "250",
      "infinite-scroll-immediate-check": "false"
    }
  }) : _c('nodata', {
    attrs: {
      "nochance": "nocontent"
    }
  }), _vm._v(" "), _c('div', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.loading && !_vm.isEnd),
      expression: "loading && !isEnd"
    }],
    staticClass: "loading-ico"
  }, [_c('mt-spinner', {
    attrs: {
      "type": "fading-circle",
      "size": 18
    }
  }), _vm._v(" "), _c('span', [_vm._v("正在加载")])], 1), _vm._v(" "), _c('nomore', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.isEnd),
      expression: "isEnd"
    }],
    attrs: {
      "text": "没有更多啦"
    }
  })] : _vm._e(), _vm._v(" "), (_vm.tabShow == 2) ? [_c('ul', {
    staticClass: "recommend"
  }, _vm._l((_vm.ColumnList), function(item, index) {
    return _c('li', {
      style: ({
        'background': ("url('" + (item.pic) + "') center center no-repeat"),
        'background-size': 'auto 100%'
      })
    }, [_c('div', {
      staticClass: "bg",
      on: {
        "click": function($event) {
          _vm.columnLink(item)
        }
      }
    }, [_c('h2', [_vm._v(_vm._s(item.name))]), _vm._v(" "), _c('p', [_vm._v(_vm._s(item.focusNum) + "关注")]), _vm._v(" "), _c('p', [_vm._v(_vm._s(item.readNum) + "阅读")]), _vm._v(" "), (item.isFocus) ? _c('img', {
      attrs: {
        "src": "/images/column/guanzhu-ben2.png"
      },
      on: {
        "click": function($event) {
          $event.stopPropagation();
          _vm.addColumnFocus(item)
        }
      }
    }) : _c('img', {
      attrs: {
        "src": "/images/column/guanzhu-ben1.png"
      },
      on: {
        "click": function($event) {
          $event.stopPropagation();
          _vm.addColumnFocus(item)
        }
      }
    })])])
  }))] : _vm._e(), _vm._v(" "), (_vm.columnData.level == 1 && _vm.columnData.isBuy == false) ? _c('chargeM', {
    attrs: {
      "routeType": _vm.columnId,
      "chargeData": _vm.chargeData,
      "showBuyPopup": _vm.showBuyPopup,
      "typeText": '订阅# ' + _vm.columnData.name,
      "columnId": _vm.columnId,
      "Articles": 0,
      "islevel": _vm.columnData.level
    },
    on: {
      "BuyPopup": _vm.BuyPopupFun,
      "isBuy": _vm.isBuyFun
    }
  }) : _vm._e(), _vm._v(" "), _c('footer', {
    staticClass: "footer"
  }), _vm._v(" "), _c('Qrcode')], 2)
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-069f9d42", module.exports)
  }
}

/***/ }),

/***/ 1230:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(959);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("e3d508a4", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-069f9d42\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./realDisk.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-069f9d42\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./realDisk.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 422:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1230)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(845),
  /* template */
  __webpack_require__(1117),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\column\\realDisk.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] realDisk.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-069f9d42", Component.options)
  } else {
    hotAPI.reload("data-v-069f9d42", Component.options)
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

/***/ 798:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


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
//
//
//
//
//
//

exports.default = {
	props: ['viewPointList', 'columnId'],
	data: function data() {
		return {
			adList: [], //广告数据
			hasAd: false,
			adIndex: '1' //广告的位置
		};
	},

	computed: (0, _vuex.mapState)({
		userId: function userId(state) {
			return state.userInfo.user_id;
		}
	}),
	methods: {
		setZan: function setZan(item) {
			this.$http.get("Viewpoint/setlikeNumIncById", {
				params: { viewpointId: item.id }
			}).then(function (res) {
				if (res.body.code == 200) {
					item.isread = true;
					item.like_num = item.like_num + 1;
				} else {
					(0, _mintUi.Toast)({
						message: '今天你已经点赞了哦',
						duration: 800
					});
				}
			});
		},
		jumpRoute: function jumpRoute(type, id, url, name) {
			var jump_url = '';
			switch (type) {//type 1：栏目，2：公共直播间，3全部课程列表，4免费课程，5收费课程，6单次课，7系列课，8讲师，9外部url
				//跳转指定栏目
				case 1:
					if (name == '实盘观点') {
						jump_url = "/realDisk/" + id + "/0"; //实盘观点
					} else {
						jump_url = "/periodical/" + id;
					}
					break;
				case 2:
					jump_url = "/publicOnlive";
					break;
				case 3:
					jump_url = "/recommend/courseClass/-1/" + this.userId;
					break;
				case 4:
					jump_url = "/recommend/courseClass/0/" + this.userId;
					break;
				case 5:
					jump_url = "/recommend/courseClass/2/" + this.userId;
					break;
				case 6:
					jump_url = "/personalCenter/course/" + id + "&" + this.userId;
					break;
				case 7:
					jump_url = "/personalCenter/course/" + id + "&" + this.userId;
					break;
				case 8:
					jump_url = "/personalSpace/lobbyPage/" + id + "/" + this.userId;
					break;
				case 9:
					jump_url = url;
					break;

				default:
					break;
			}
			this.$router.push(jump_url);
		},
		computeTime: function computeTime(pTime) {
			//计算时间差
			var minute = 1000 * 60;
			var hour = minute * 60;
			var day = hour * 24;
			var now = new Date();
			var pStamp = new Date(pTime.split('-').join('/'));
			var diffValue = now - pStamp;
			var minDiff = diffValue / minute; //分钟差
			var hourDiff = diffValue / hour; //小时差
			var timeText = '';
			if (now.toLocaleDateString() == pStamp.toLocaleDateString()) {
				//是否今天
				if (minDiff <= 30) {
					if (parseInt(minDiff) < 1) {
						timeText = "1\u5206\u949F\u524D";
					} else {
						timeText = parseInt(minDiff) + "\u5206\u949F\u524D";
					}
				} else if (minDiff > 30 && minDiff < 60) {
					timeText = '1小时前';
				} else if (minDiff >= 60 && minDiff < 120) {
					timeText = '2小时前';
				} else if (hourDiff > 2 && hourDiff < 24) {
					timeText = pTime.substr(11, 5);
				}
			} else {
				timeText = pTime.substr(5, 5);
			}
			return timeText;
		},
		getGeneralizelist: function getGeneralizelist() {
			var _this = this;

			this.$http.post('/GeneralizeManage/getGeneralizelist', { id: this.columnId }, { emulateJSON: true }).then(function (res) {
				if (res.body.code == 200) {
					_this.hasAd = true;
					_this.adList = res.body.data[0];
					var data = res.body.data[0];
					_this.adIndex = data.column_place;
					if (data.column_place - 1 > _this.viewPointList.length) {
						_this.adIndex = _this.viewPointList.length - 1;
					} else {
						_this.adIndex = data.column_place - 2;
					}
				} else {
					_this.hasAd = false;
				}
			});
		}
	}
};

/***/ }),

/***/ 807:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.listM .new-list {\n  padding: 0 .24rem;\n}\n.listM .new-list .ad {\n    width: 100%;\n    height: auto;\n    overflow: hidden;\n    margin-bottom: .24rem;\n    margin-top: .24rem;\n}\n.listM .new-list .ad a {\n      width: 48%;\n      float: left;\n      display: block;\n      height: auto;\n      overflow: hidden;\n      margin-right: 4%;\n}\n.listM .new-list .ad a img {\n        width: 100%;\n}\n.listM .new-list .ad a:last-child {\n      margin-right: 0;\n}\n.listM .new-list li {\n    padding: .32rem 0;\n    border-bottom: 1px solid #e8e8e8;\n}\n.listM .new-list li .content {\n      overflow: hidden;\n}\n.listM .new-list li .content .pic {\n        width: 2rem;\n        height: 1.46rem;\n        float: right;\n        margin-left: .24rem;\n        background: #888888;\n        -webkit-background-size: 100% 100%;\n        background-position: center center;\n        background-size: cover;\n}\n.listM .new-list li .content .des h1 {\n        font-size: .32rem;\n        color: #1c0808;\n        display: -webkit-box;\n        -webkit-box-orient: vertical;\n        -webkit-line-clamp: 2;\n        overflow: hidden;\n        font-weight: bold;\n        line-height: 1.5em;\n}\n.listM .new-list li .content .des h1 .only {\n          font-size: .24rem;\n          background: #ffffff;\n          color: #FF3229;\n          border: 1px solid #FF3229;\n          border-radius: 20px;\n          padding: .02rem .15rem;\n          margin-right: .06rem;\n}\n.listM .new-list li .content .des h1 .top {\n          font-size: .24rem;\n          background: #FF3229;\n          color: #fff;\n          border: 1px solid #FF3229;\n          border-radius: 20px;\n          padding: .02rem .15rem;\n          margin-right: .06rem;\n}\n.listM .new-list li .content .des h1 .lock {\n          display: inline-block;\n          width: .25rem;\n          height: .31rem;\n          background: url(\"/images/2.0/suoicon.png\") no-repeat center center;\n          -webkit-background-size: 100% 100%;\n          vertical-align: middle;\n          background-size: 100% 100%;\n}\n.listM .new-list li .content .des > div {\n        position: relative;\n}\n.listM .new-list li .content .des > div p {\n          font-size: .24rem;\n          color: #888888;\n          margin-bottom: .1rem;\n          margin-top: .1rem;\n          display: -webkit-box;\n          -webkit-box-orient: vertical;\n          -webkit-line-clamp: 2;\n          overflow: hidden;\n          line-height: .34rem;\n          min-height: .68rem;\n}\n.listM .new-list li .content .des > div .line {\n          width: -webkit-calc(100% - 2.24rem);\n          width: calc(100% - 2.24rem);\n          height: 1px;\n          background: #e8e8e8;\n}\n.listM .new-list li .explain {\n      font-size: .24rem;\n      color: #b2b2b2;\n      margin-top: .24rem;\n}\n.listM .new-list li .explain > p {\n        float: left;\n}\n.listM .new-list li .explain > p i {\n          color: #bb7676;\n}\n.listM .new-list li .explain > p .tag {\n          color: #bb7676;\n          background: #F2F2F2;\n          padding: .05rem .2rem;\n          border-radius: 20px;\n          margin-left: .24rem;\n}\n.listM .new-list li .explain .num {\n        float: right;\n}\n.listM .new-list li .explain .num span {\n          margin-left: .24rem;\n}\n.listM .new-list li .explain .num span::before {\n            content: '';\n            display: inline-block;\n            vertical-align: bottom;\n            margin-right: .08rem;\n}\n.listM .new-list li .explain .num span.read::before {\n            width: .32rem;\n            height: .22rem;\n            background: url(\"/images/column/icons8-Eye-100.png\") no-repeat center center;\n            background-size: 100% 100%;\n}\n.listM .new-list li .explain .num span.zan::before {\n            width: .26rem;\n            height: .28rem;\n            background: url(\"/images/column/nrxq_zan3.png\") no-repeat center center;\n            background-size: 100% 100%;\n}\n.listM .new-list li .explain .num span.zan.active {\n            color: #c62f2f;\n}\n.listM .new-list li .explain .num span.zan.active::before {\n              background: url(\"/images/column/item_like_icon_two_yx.png\") no-repeat center center;\n              background-size: 100% 100%;\n}\n", ""]);

// exports


/***/ }),

/***/ 816:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(830)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(798),
  /* template */
  __webpack_require__(824),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\subcomponents\\column\\list.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] list.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-35d6f629", Component.options)
  } else {
    hotAPI.reload("data-v-35d6f629", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 824:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "listM"
  }, [_c('ul', {
    staticClass: "new-list"
  }, [_vm._l((_vm.viewPointList), function(item, index) {
    return [_c('li', [_c('router-link', {
      attrs: {
        "to": ("/column/detail/" + (item.id))
      }
    }, [_c('section', {
      staticClass: "content"
    }, [(item.coverPic) ? [(item.coverPic.indexOf('http') == 0) ? [_c('div', {
      staticClass: "pic",
      style: ({
        'background-image': 'url(' + item.coverPic + ')'
      })
    })] : [_c('div', {
      staticClass: "pic",
      style: ({
        'background-image': 'url(http://os700oap7.bkt.clouddn.com/' + item.coverPic + ')'
      })
    })]] : [_c('div', {
      staticClass: "pic",
      staticStyle: {
        "background-image": "url('/images/column/defaultCover.png')"
      }
    })], _vm._v(" "), _c('div', {
      staticClass: "des"
    }, [_c('h1', [(item.column_top_status == 1) ? _c('span', {
      staticClass: "top"
    }, [_vm._v("TOP")]) : _vm._e(), _vm._v(" "), _c('span', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (item.cateName),
        expression: "item.cateName"
      }],
      staticClass: "only"
    }, [_vm._v(_vm._s(item.cateName))]), _vm._v(" "), (item.level == 1) ? _c('span', {
      staticClass: "lock"
    }) : _vm._e(), _vm._v("\n                                " + _vm._s(item.title) + "\n                            ")]), _vm._v(" "), _c('div', [_c('p', [_vm._v(_vm._s(item.lead))])])])], 2), _vm._v(" "), _c('section', {
      staticClass: "explain clearfix"
    }, [_c('p', [_vm._v("\n                            " + _vm._s(_vm.computeTime(item.publish_time)) + "  来自 "), _c('i', [_vm._v(_vm._s(item.alias || item.author))]), _vm._v(" "), _vm._l((item.title_cate), function(data, indexs) {
      return _c('span', {
        directives: [{
          name: "show",
          rawName: "v-show",
          value: (data != ''),
          expression: "data != ''"
        }],
        staticClass: "tag"
      }, [_vm._v(_vm._s(data))])
    })], 2), _vm._v(" "), _c('div', {
      staticClass: "num"
    }, [_c('span', {
      staticClass: "read"
    }, [_vm._v(_vm._s(item.study_num + item.virtual_study_num))]), _vm._v(" "), _c('span', {
      staticClass: "zan",
      class: {
        'active': item.isread || item.isLike
      }
    }, [_vm._v(_vm._s(item.like_num + item.virtual_like_num))])])])])], 1), _vm._v(" "), (_vm.hasAd && (index == _vm.adIndex)) ? _c('div', {
      staticClass: "ad"
    }, [_c('a', {
      attrs: {
        "href": "javascript:;"
      },
      on: {
        "click": function($event) {
          _vm.jumpRoute(_vm.adList.ad_target_type1, _vm.adList.ad_target_id1, _vm.adList.ad_target_url1, _vm.adList.ad_target_type_name1)
        }
      }
    }, [_c('img', {
      attrs: {
        "src": _vm.adList.ad_img1
      }
    })]), _vm._v(" "), _c('a', {
      attrs: {
        "href": "javascript:;"
      },
      on: {
        "click": function($event) {
          _vm.jumpRoute(_vm.adList.ad_target_type2, _vm.adList.ad_target_id2, _vm.adList.ad_target_url2, _vm.adList.ad_target_type_name2)
        }
      }
    }, [_c('img', {
      attrs: {
        "src": _vm.adList.ad_img2
      }
    })])]) : _vm._e()]
  })], 2)])
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-35d6f629", module.exports)
  }
}

/***/ }),

/***/ 830:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(807);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("5f6a8fae", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-35d6f629\",\"scoped\":false,\"hasInlineConfig\":true}!../../../node_modules/sass-loader/lib/loader.js!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./list.vue", function() {
     var newContent = require("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-35d6f629\",\"scoped\":false,\"hasInlineConfig\":true}!../../../node_modules/sass-loader/lib/loader.js!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./list.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 845:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function($) {

Object.defineProperty(exports, "__esModule", {
    value: true
});

var _mintUi = __webpack_require__(54);

var _list = __webpack_require__(816);

var _list2 = _interopRequireDefault(_list);

var _noincome = __webpack_require__(137);

var _noincome2 = _interopRequireDefault(_noincome);

var _QrCode = __webpack_require__(524);

var _QrCode2 = _interopRequireDefault(_QrCode);

var _nomore = __webpack_require__(135);

var _nomore2 = _interopRequireDefault(_nomore);

var _chargeM = __webpack_require__(787);

var _chargeM2 = _interopRequireDefault(_chargeM);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
            columnId: this.$route.params.type,
            tabShow: this.$route.params.tabId, //0精選 1付費 2欄目推薦
            columnData: '', //本栏目信息
            isFocus: '', //是否关注本栏目
            isAd: true, //是否显示广告位
            getShowlist: true, //默認加載
            listParams: {
                pageNo: 1,
                perPage: 10,
                isUserInfo: false,
                orderBy: 'column_top_status desc,cateName desc,publish_time desc,id desc', //'column_top_status desc,publish_time desc,id desc'
                status: 1, //已发布的观点，草稿状态不显示
                isImageInfo: true,
                isCate: true,
                excludeColumnId: 2
            },
            viewPointList: [], //列表数据
            ColumnList: [], //栏目推荐数据
            chargeData: [], //订阅数据
            showBuyPopup: false, //是否显示购买弹窗
            loading: false,
            isEnd: false
        };
    },

    computed: {
        userId: function userId() {
            return this.$store.state.userInfo.user_id;
        }
    },
    created: function created() {
        var _this = this;

        //this.listParams.pageNo=1;
        this.setCookie('isShareLink', 1);
        _mintUi.Indicator.open('加载中...');
        this.srcollToTop();
        this.$store.dispatch('getUserInfo', function (res) {
            _this.$store.commit("setTitle", "实盘观点");
            _this.getColumnById();
            _this.getViewPointList(parseInt(_this.tabShow) + 1);
            _this.getViewPointById();
            _this.setReadNumIncById();
            //                this.getGeneralizelist();
        });
    },
    mounted: function mounted() {

        window.addEventListener('scroll', this.handleScroll);
    },

    destroyed: function destroyed() {
        console.log("我已经离开了！");
        this.setCookie("isBack", 1);
    },
    methods: {
        isBuyFun: function isBuyFun(type) {
            console.log(type);
            this.columnData.isBuy = type;
            this.columnData.isBuy = type;
        },
        BuyPopupFun: function BuyPopupFun(type) {
            //订阅
            this.showBuyPopup = type;
        },
        setReadNumIncById: function setReadNumIncById() {
            //阅读数
            this.$http.post('/Column/setReadNumIncById', {
                columnId: this.columnId
            }, { emulateJSON: true }).then(function (res) {
                if (res.body.code == 0) {}
            });
        },
        config: function config() {
            var _this2 = this;

            wx.ready(function () {
                _this2.wxShare([{ //分享到朋友圈
                    title: _this2.columnData.name,
                    desc: _this2.columnData.lead,
                    imgUrl: _this2.columnData.pic,
                    link: window.location.origin + '/#/realDisk/' + _this2.columnId + '/0' + '?shareId=1'
                }, {
                    //分享给朋友
                    title: _this2.columnData.name,
                    desc: _this2.columnData.lead,
                    imgUrl: _this2.columnData.pic,
                    link: window.location.origin + '/#/realDisk/' + _this2.columnId + '/0' + '?shareId=1'
                }], function () {});
            });
        },
        navLink: function navLink(id) {
            //nav 栏目
            this.$router.push('/realDisk/' + this.columnId + '/' + id);
            this.tabShow = id;
            if (id != 2) {
                _mintUi.Indicator.open('加载中...');
            }
        },
        columnLink: function columnLink(item) {
            if (item.name == '实盘观点') {
                this.$router.push('/realDisk/' + item.columnId + "/0");
                this.tabShow = 0;
            } else {
                this.$router.push('/periodical/' + item.columnId);
            }
        },
        loadMore: function loadMore() {
            var _this3 = this;

            // 加載更多
            this.loading = true;
            if (this.getCookie('isBack') == 0) {
                this.setCookie("isBack", 1);
                return;
            }
            if (!this.isEnd) {
                this.listParams.pageNo++;
                console.log(this.listParams);
                setTimeout(function () {
                    _this3.$http.post(_this3.hostUrl + '/Viewpoint/getViewPointList', _this3.listParams, { emulateJSON: true }).then(function (res) {
                        if (res.body.code == 200) {
                            _this3.viewPointList = _this3.viewPointList.concat(res.body.data);
                            if (res.body.data.length < 10) {
                                _this3.isEnd = true;
                            }
                            _this3.loading = false;
                        }
                    });
                }, 1000);
            }
        },

        /*getGeneralizelist(){
            this.$http.post(this.hostUrl + '/GeneralizeManage/getGeneralizelist', {
                id: this.columnId,
            }, {emulateJSON: true}).then(res => {
                if (res.body.code == 200) {
                    console.log(res)
                }
            });
        },*/
        getViewPointById: function getViewPointById() {
            var _this4 = this;

            //栏目推荐
            this.$http.post(this.hostUrl + '/Column/getColumnList', {
                status: 1,
                recommendStatus: 0,
                excludeColumnId: 2
            }, { emulateJSON: true }).then(function (res) {
                if (res.body.code == 200) {
                    console.log(res);
                    _this4.ColumnList = res.body.data;
                    _mintUi.Indicator.close();
                }
            });
        },
        getViewPointList: function getViewPointList(type) {
            var _this5 = this;

            //获取观点列表
            if (type == 1) {
                //精选
                this.listParams.type = 2;
                this.listParams.pageNo = 1;
                delete this.listParams.level;
            } else if (type == 2) {
                this.listParams.level = 1;
                this.listParams.pageNo = 1;
                delete this.listParams.type;
            }
            this.$http.post(this.hostUrl + '/Viewpoint/getViewPointList', this.listParams, { emulateJSON: true }).then(function (res) {
                if (res.body.code == 200) {
                    _mintUi.Indicator.close();
                    _this5.viewPointList = res.body.data;
                    if (res.body.data.length < 9) {
                        _this5.loading = true;
                        _this5.isEnd = true;
                    }
                    if (res.body.data.length == 0) {
                        //無數據
                        _this5.getShowlist = false;
                    }
                    _this5.$refs.child.getGeneralizelist();
                    _this5.loading = false;
                    _this5.isEnd = false;
                }
            });
        },
        addColumnFocus: function addColumnFocus(item) {
            //关注、取消关注接口
            this.$http.post('/Focus/addFocus', {
                user_id: this.userId,
                live_id: item.columnId,
                type: item.isFocus == true ? 0 : 1,
                target: 2
            }, { emulateJSON: true }).then(function (res) {
                (0, _mintUi.Toast)('' + res.body.msg);
                if (res.body.code == 0) {
                    item.isFocus = item.isFocus == true ? false : true;
                }
            });
        },
        addFocus: function addFocus() {
            var _this6 = this;

            //关注、取消关注接口
            var type = this.isFocus ? '0' : '1';
            this.$http.post('/Focus/addFocus', {
                user_id: this.userId,
                live_id: this.columnId,
                type: type,
                target: 2
            }, { emulateJSON: true }).then(function (res) {
                (0, _mintUi.Toast)('' + res.body.msg);
                if (res.body.code == 0) {
                    _this6.isFocus = !_this6.isFocus;
                }
            });
        },
        getColumnById: function getColumnById() {
            var _this7 = this;

            //根据栏目id获取栏目信息
            this.$http.post('/Column/getColumnById', { columnId: this.columnId }, { emulateJSON: true }).then(function (res) {
                if (res.body.code == 200) {
                    _this7.columnData = res.body.data;
                    _this7.chargeData = res.body.data.cyclePriceInfo;
                    _this7.isFocus = res.body.data.isFocus;
                    _this7.config();

                    if (_this7.columnData.level == 1 && _this7.columnData.isBuy == false) {
                        _this7.$store.commit('hideTabber');
                    } else {
                        _this7.$store.commit('showTabber');
                    }
                }
            });
        },
        handleScroll: function handleScroll() {
            //监听滚动条滚动的位置
            var scrollTop = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;
            var header = $('.nav').height();
            if (scrollTop > header) {
                $('.nav').css({
                    'position': 'fixed',
                    'top': '0px'
                });
            } else {
                $('.nav').css({
                    'position': 'relative',
                    'top': '0'
                });
            }
        }
    },
    watch: {
        tabShow: function tabShow(val) {
            console.log(val);
            if (val == 0) {
                //精选
                this.listParams.pageNo = 1;
                this.getViewPointList(1);
                this.loading = false;
                this.isEnd = false;
            } else if (val == 1) {
                //付费
                this.listParams.pageNo = 1;
                this.getViewPointList(2);
                this.loading = false;
                this.isEnd = false;
            }
        }
    },
    components: {
        ListM: _list2.default,
        nodata: _noincome2.default,
        nomore: _nomore2.default,
        Qrcode: _QrCode2.default,
        chargeM: _chargeM2.default
    }

};
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(49)))

/***/ }),

/***/ 959:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.periodical {\n  padding-bottom: .8rem;\n  background: #fff;\n}\n.periodical .headerDrift {\n    background: #fff;\n    display: none;\n    width: 90%;\n    padding: 0 5%;\n    top: 0;\n    z-index: 999;\n    padding-bottom: .16rem;\n}\n.periodical .headerDrift .left {\n      float: left;\n      width: 70%;\n}\n.periodical .headerDrift .left h2 {\n        font-size: .28rem;\n        color: #1c0808;\n        padding-top: .16rem;\n}\n.periodical .headerDrift .left p {\n        font-size: .24rem;\n        color: #888;\n        padding-top: .08rem;\n}\n.periodical .headerDrift .right {\n      float: right;\n      width: 28%;\n      padding-top: .16rem;\n      margin: 0 auto;\n      text-align: right;\n}\n.periodical .headerDrift .right button {\n        border: 0px;\n        background: #c62f2f;\n        color: #fff;\n        font-size: .28rem;\n        padding: 0 .2rem;\n        line-height: .5rem;\n        height: .5rem;\n        border-radius: .25rem;\n}\n.periodical .headerDrift .right button.is-focus {\n          background: #888888;\n}\n.periodical .recommend {\n    background: #fff;\n    padding: .24rem;\n    height: auto;\n    overflow: hidden;\n}\n.periodical .recommend li {\n      width: 48%;\n      float: left;\n      margin-right: 2.5%;\n      text-align: center;\n      height: 2.7rem;\n      border-radius: 8px;\n      border: 1px solid #e8e8e8;\n      color: #fff;\n      margin-bottom: .24rem;\n}\n.periodical .recommend li .bg {\n        background-color: rgba(0, 0, 0, 0.5);\n        border-radius: 8px;\n        width: 100%;\n        height: 100%;\n}\n.periodical .recommend li .bg h2 {\n          font-size: .32rem;\n          height: .77rem;\n          line-height: .77rem;\n          border-bottom: 1px solid #e8e8e8;\n          margin-bottom: .32rem;\n          font-weight: bold;\n}\n.periodical .recommend li .bg p {\n          font-size: .24rem;\n          padding-top: .05rem;\n}\n.periodical .recommend li .bg img {\n          width: .6rem;\n          height: .6rem;\n          padding-top: .20rem;\n}\n.periodical .recommend li:nth-of-type(even) {\n      margin-right: 0;\n}\n.periodical .nav {\n    width: 100%;\n    height: .88rem;\n    background: #fff;\n    z-index: 2;\n}\n.periodical .nav ul li {\n      width: 33.3%;\n      float: left;\n      text-align: center;\n      height: .88rem;\n      line-height: .88rem;\n      font-size: .32rem;\n      color: #1c0808;\n}\n.periodical .nav ul li.active {\n      color: #c62f2f;\n}\n.periodical .nav ul li.active span {\n        width: .68rem;\n        height: .04rem;\n        border-bottom: 2px;\n        display: block;\n        margin: 0 auto;\n        background-image: -webkit-linear-gradient(right, #ff1165 0%, #ff1010 100%);\n        background-image: linear-gradient(-90deg, #ff1165 0%, #ff1010 100%);\n}\n.periodical.padding-b {\n    padding-bottom: 1.16rem;\n}\n.periodical .header {\n    text-align: center;\n    background: url(\"/images/column/pig.jpg\") no-repeat center center;\n    background-size: cover;\n    color: #fff;\n    overflow: hidden;\n}\n.periodical .header .part {\n      width: 100%;\n      height: 100%;\n      background-color: rgba(0, 0, 0, 0.5);\n      overflow: hidden;\n}\n.periodical .header .part h1 {\n        font-size: .36rem;\n        margin: .44rem 0;\n}\n.periodical .header .part h4 {\n        font-size: .28rem;\n}\n.periodical .header .part p {\n        font-size: .24rem;\n        margin-top: .16rem;\n        margin-bottom: .23rem;\n}\n.periodical .header .part .focus-btn {\n        display: inline-block;\n        background: #c62f2f;\n        height: .5rem;\n        line-height: .5rem;\n        font-size: .28rem;\n        padding: 0 .2rem;\n        border-radius: 20px;\n        margin-bottom: .46rem;\n}\n.periodical .header .part .focus-btn.is-focus {\n          background: #888888;\n}\n", ""]);

// exports


/***/ })

});