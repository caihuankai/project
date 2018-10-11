webpackJsonp([83],{

/***/ 1035:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.redpacket-detail {\n  background-color: #fff;\n  min-height: 100%;\n}\n.redpacket-detail .header {\n    height: 6.55rem;\n    box-sizing: border-box;\n    padding-top: 1.27rem;\n    background: url(\"/images/redpacket/bg.png\") no-repeat center center/100% 100%;\n}\n.redpacket-detail .header .info {\n      -webkit-box-orient: vertical;\n      -webkit-box-direction: normal;\n      -webkit-flex-direction: column;\n          -ms-flex-direction: column;\n              flex-direction: column;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n      margin-bottom: .56rem;\n}\n.redpacket-detail .header .info .avatar {\n        width: 1.3rem;\n        height: 1.3rem;\n        border-radius: 50%;\n        background-size: contain;\n        background-position: center center;\n        margin-bottom: .26rem;\n}\n.redpacket-detail .header .info .author {\n        font-size: .32rem;\n        color: #fff;\n        line-height: .32rem;\n        margin-bottom: 0.25rem;\n}\n.redpacket-detail .header .info .type {\n        font-size: .28rem;\n        color: #a30c0c;\n        line-height: .28rem;\n}\n.redpacket-detail .header .num {\n      color: #ffed8b;\n      text-align: center;\n}\n.redpacket-detail .header .num h6 {\n        font-size: .28rem;\n        line-height: .28rem;\n        margin-bottom: .24rem;\n}\n.redpacket-detail .header .num p {\n        font-size: .6rem;\n        line-height: .6rem;\n}\n.redpacket-detail .list .title {\n    padding: 0 .25rem;\n    padding-top: .04rem;\n    box-sizing: border-box;\n    height: 0.5rem;\n    -webkit-box-pack: justify;\n    -webkit-justify-content: space-between;\n        -ms-flex-pack: justify;\n            justify-content: space-between;\n}\n.redpacket-detail .list .title p {\n      font-size: .24rem;\n      line-height: .28rem;\n      color: #929fa8;\n}\n.redpacket-detail .list .title a {\n      font-size: .28rem;\n      color: #bb7676;\n      line-height: .28rem;\n}\n.redpacket-detail .content .item {\n    -webkit-box-pack: justify;\n    -webkit-justify-content: space-between;\n        -ms-flex-pack: justify;\n            justify-content: space-between;\n    height: .96rem;\n    padding: 0.32rem 0.25rem;\n    border-bottom: 1px solid #ebebeb;\n}\n.redpacket-detail .content .left {\n    -webkit-box-align: center;\n    -webkit-align-items: center;\n        -ms-flex-align: center;\n            align-items: center;\n}\n.redpacket-detail .content .left .avatar {\n      background-size: contain;\n      background-position: center center;\n      border-radius: 50%;\n      width: .96rem;\n      height: .96rem;\n      margin-right: 0.25rem;\n}\n.redpacket-detail .content .left .item-info h5.name {\n      font-size: .28rem;\n      color: #545b63;\n      line-height: 0.28rem;\n      margin-bottom: .21rem;\n}\n.redpacket-detail .content .left .item-info .time {\n      font-size: .24rem;\n      color: #dadada;\n      line-height: .24rem;\n}\n.redpacket-detail .content .right {\n    padding-top: .12rem;\n    text-align: right;\n}\n.redpacket-detail .content .right .money {\n      font-size: .3rem;\n      color: #929fa8;\n      line-height: .3rem;\n}\n.redpacket-detail .content .right .best {\n      font-size: .24rem;\n      color: #fea128;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n      margin-top: 0.13rem;\n}\n.redpacket-detail .content .right .best:before {\n        content: '';\n        display: inline-block;\n        width: .43rem;\n        height: .31rem;\n        margin-right: .05rem;\n        background: url(\"/images/sprites.png\") no-repeat -2.15rem -0.75rem/7.5rem auto;\n}\n", ""]);

// exports


/***/ }),

/***/ 1193:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return (_vm.finished) ? _c('div', {
    staticClass: "redpacket-detail"
  }, [_c('div', {
    staticClass: "header"
  }, [_c('div', {
    staticClass: "info flex"
  }, [_c('div', {
    staticClass: "avatar",
    style: ({
      'background-image': ("url('" + (_vm.redpacketInfo.userInfo.head_add) + "')")
    })
  }), _vm._v(" "), _c('h5', {
    staticClass: "author"
  }, [_vm._v(_vm._s(_vm.redpacketInfo.userInfo.alias) + "的红包")]), _vm._v(" "), _c('p', {
    staticClass: "type"
  }, [_vm._v("口令红包-" + _vm._s((_vm.redpacketInfo.type == 5 || _vm.redpacketInfo.type == 9) ? '随机' : '固定') + "金额")])]), _vm._v(" "), (_vm.redpacketInfo.packet_num - _vm.redpacketInfo.take_num == 0) ? _c('div', {
    staticClass: "num"
  }, [_c('h6', [_vm._v("红包已被抢完")])]) : _c('div', {
    staticClass: "num"
  }, [_c('h6', [_vm._v("恭喜你抢到")]), _vm._v(" "), _c('p', [_vm._v(_vm._s(_vm.myTakeMoney / 100))])])]), _vm._v(" "), _c('div', {
    staticClass: "list"
  }, [_c('div', {
    staticClass: "title flex"
  }, [_c('p', [_vm._v(_vm._s(_vm.redpacketInfo.packet_num) + "个红包，还剩" + _vm._s(_vm.redpacketInfo.packet_num - _vm.redpacketInfo.take_num) + "个未领")]), _vm._v(" "), _c('router-link', {
    attrs: {
      "to": "/personalCenter/buyrecord/1"
    }
  }, [_vm._v("红包记录")])], 1), _vm._v(" "), _c('div', {
    staticClass: "content"
  }, _vm._l((_vm.list), function(item) {
    return _c('div', {
      key: item.id,
      staticClass: "item flex"
    }, [_c('div', {
      staticClass: "left flex"
    }, [_c('div', {
      staticClass: "avatar",
      style: ({
        'background-image': ("url('" + (item.userInfo.head_add) + "')")
      })
    }), _vm._v(" "), _c('div', {
      staticClass: "item-info"
    }, [_c('h5', {
      staticClass: "name"
    }, [_vm._v(_vm._s(item.userInfo.alias))]), _vm._v(" "), _c('p', {
      staticClass: "time"
    }, [_vm._v(_vm._s(_vm.timestampToDate('Y/m/d H:i', item.time)))])])]), _vm._v(" "), _c('div', {
      staticClass: "right"
    }, [_c('p', {
      staticClass: "money"
    }, [_vm._v(_vm._s(item.take_money / 100))]), _vm._v(" "), (_vm.redpacketInfo.packet_num - _vm.redpacketInfo.take_num == 0) ? _c('div', [(item.best && _vm.redpacketInfo.type != 6 && _vm.redpacketInfo.type != 10) ? _c('p', {
      staticClass: "best flex"
    }, [_vm._v("手气最佳")]) : _vm._e()]) : _vm._e()])])
  }))])]) : _vm._e()
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-78731ba6", module.exports)
  }
}

/***/ }),

/***/ 1303:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(1035);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("b290bf72", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-78731ba6\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./redpacketDetails.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-78731ba6\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./redpacketDetails.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 454:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1303)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(879),
  /* template */
  __webpack_require__(1193),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\other\\redpacketDetails.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] redpacketDetails.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-78731ba6", Component.options)
  } else {
    hotAPI.reload("data-v-78731ba6", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 879:
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

exports.default = {
    data: function data() {
        return {
            redpacketInfo: {},
            list: [],
            myTakeMoney: 0,
            finished: false
        };
    },
    created: function created() {
        var _this = this;

        this.$store.commit('hideTabber');
        this.$store.dispatch('getUserInfo', function (res) {
            _this.getData();
        });
    },

    methods: {
        getData: function getData() {
            var _this2 = this;

            this.$http.get('/RedpacketLog/getRedpacketLogInfoByPacketId', { params: { packetId: this.$route.params.packetId } }).then(function (res) {
                console.log('红包信息', res.body);
                var data = res.body.data;
                if (res.body.code == 200) {
                    _this2.finished = true;
                    _this2.redpacketInfo = data.redpacketInfo;
                    _this2.list = data.redpacketLogs;
                    var bestVal = 0;
                    data.redpacketLogs.forEach(function (val) {
                        if (_this2.$store.state.userInfo.user_id == val.userInfo.user_id) {
                            _this2.myTakeMoney = val.take_money;
                        }
                        bestVal = val.take_money > bestVal ? val.take_money : bestVal;
                    });
                    data.redpacketLogs.forEach(function (val) {
                        if (val.take_money == bestVal) {
                            val.best = true;
                        }
                    });
                }
            });
        }
    }
};

/***/ })

});