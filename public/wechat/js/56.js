webpackJsonp([56],{

/***/ 1047:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n@charset \"UTF-8\";\n.genius {\n  background: #fff;\n  /*.fans-list {\n        > li {\n            display: flex !important;\n            padding: .3rem .3rem .3rem 0;\n            border-bottom: 1px solid #eeeeee;\n            &:last-child {\n                border: none;\n            }\n            > div {\n                flex: 2;\n                text-align: center;\n                font-size: .32rem;\n                color: #919fac;\n                font-weight: bold;\n                span {\n                    display: inline-block;\n                    margin-top: 50%;\n                    transform: translateY(-36%);\n                }\n            }\n            > section {\n                flex: 20;\n                img {\n                    float: left;\n                    -webkit-border-radius: 50%;\n                    -moz-border-radius: 50%;\n                    border-radius: 50%;\n                    width: .8rem;\n                    height: .8rem;\n                    margin-right: .2rem;\n                }\n                h1 {\n                    font-size: .3rem;\n                    color: #333;\n                    max-width: 75%;\n                    margin-top: 0.04rem;\n                }\n                .fans {\n                    > i {\n                        display: inline-block;\n                        width: 0.28rem;\n                        height: 0.28rem;\n                        background: #000;\n                        margin-right: 0.1rem;\n                        vertical-align: middle;\n                    }\n                    > i:nth-child(1) {\n                        background: url(../assets/images/live-02.png) no-repeat top right;\n                        -webkit-background-size: 75%;\n                        background-size: 75%;\n                    }\n                    > i:nth-child(3) {\n                        background: url(../assets/images/fans-icon.png) no-repeat;\n                        -webkit-background-size: 100%;\n                        background-size: 100%;\n                    }\n                    > span {\n                        color: #919eae;\n                        font-size: .24rem;\n                        margin-right: .2rem;\n                    }\n                }\n                button {\n                    width: 1.2rem;\n                    border: none;\n                    background: #fff;\n                    color: #e6e6e6;\n                    line-height: 0.52rem;\n                    border-radius: 0.08rem;\n                    font-size: 0.28rem;\n                    float: right;\n                    margin-top: -0.68rem;\n                    &.no-focus {\n                        background: #ffffff;\n                        color: #5f86fd;\n                        font-weight: bold;\n                        background: url(/images/index/focus.png) left center no-repeat;\n                        background-size: 0.24rem 0.24rem;\n                        padding-left: 0.22rem;\n                    }\n                }\n                > span {\n                    display: inline-block;\n                    border: none;\n                    background: #fff;\n                    color: #999;\n                    line-height: .52rem;\n                    border-radius: 0.08rem;\n                    font-size: .28rem;\n                    float: right;\n                    margin-top: -0.68rem;\n                    text-align: center;\n                    max-height: 0.56rem;\n                    padding: 0 .2rem;\n                    &.no-focus {\n                        background: #ffffff;\n                        color: #5f86fd;\n                        font-weight: bold;\n                        background: url(/images/index/focus.png) left center no-repeat;\n                        background-size: 0.24rem 0.24rem;\n                        padding-left: 0.32rem;\n                    }\n                }\n            }\n        }\n    }\n    .newest-join {\n        li.newest-item {\n            padding: .3rem;\n            border-bottom: 1px solid #ebebeb;\n            &.newest {\n                background: url('../assets/images/new-icon.png') no-repeat top left;\n                -webkit-background-size: .6rem .6rem;\n                background-size: .6rem .6rem;\n            }\n            img {\n                width: 1.1rem;\n                height: 1.1rem;\n                border-radius: 50%;\n                margin-right: .2rem;\n                float: left;\n            }\n            div {\n                overflow: hidden;\n                h2 {\n                    font-size: .32rem;\n                    color: #333333;\n                    margin-top: .1rem;\n                    margin-bottom: .2rem;\n                    span {\n                        float: right;\n                        color: #e6e6e6;\n                        font-size: .28rem;\n                        &.no-focus {\n                            color: #5f86fd;\n                            background: url(/images/index/focus.png) left center no-repeat;\n                            background-size: 0.25rem 0.25rem;\n                            padding-left: 0.34rem;\n                            font-weight: bold;\n                        }\n                    }\n                }\n                p {\n                    color: #919fac;\n                    font-size: .26rem;\n                    overflow: hidden; //超出的文本隐藏\n                    text-overflow: ellipsis; //溢出用省略号显示\n                    white-space: nowrap; //溢出不换行\n                }\n            }\n        }\n    }*/\n}\n.genius .mint-navbar {\n    margin: 0 auto;\n}\n.genius .mint-navbar::after {\n      content: '';\n      display: block;\n      width: 0.68rem;\n      height: 0.04rem;\n      background: #c62f2f;\n      margin: 0 auto;\n      position: absolute;\n      bottom: .14rem;\n      border-radius: .2rem;\n      -webkit-transition: left .3s ease;\n      transition: left .3s ease;\n      -webkit-transform: translateX(-50%);\n          -ms-transform: translateX(-50%);\n              transform: translateX(-50%);\n}\n.genius .mint-navbar.selected1::after {\n      left: 25%;\n}\n.genius .mint-navbar.selected2::after {\n      left: 75%;\n}\n.genius .mint-navbar .mint-tab-item-label {\n      font-size: 0.32rem;\n      /*line-height: .6;*/\n      color: #333;\n}\n.genius .mint-navbar .mint-tab-item-label span {\n        display: block;\n        height: 0.92rem;\n        line-height: 0.92rem;\n}\n.genius .mint-navbar .mint-tab-item {\n      padding: 0;\n}\n.genius .mint-navbar .mint-tab-item.is-selected {\n      border: none;\n}\n.genius .mint-navbar .mint-tab-item.is-selected .mint-tab-item-label {\n        color: #c62f2f !important;\n        margin-bottom: 0;\n        font-size: .32rem;\n}\n.genius .tab-article {\n    margin-top: .9rem;\n}\n.genius .tab-article .live-list {\n      padding: .24rem;\n      margin-bottom: 1rem;\n      background: #f5f7f8;\n}\n.genius .tab-article .live-list li {\n        padding: .24rem;\n        background: #ffffff;\n        margin-bottom: .2rem;\n        border: 1px solid #ededed;\n}\n.genius .tab-article .live-list li:last-child {\n          margin-bottom: 0;\n}\n.genius .tab-article .live-list li .info-left {\n          float: left;\n          padding-bottom: 0.7rem;\n}\n.genius .tab-article .live-list li .info-left span {\n            display: inline-block;\n            width: .5rem;\n            height: .5rem;\n            background: #888888;\n            color: #fff;\n            font-weight: bold;\n            border-radius: 50%;\n            line-height: .5rem;\n            text-align: center;\n            vertical-align: middle;\n}\n.genius .tab-article .live-list li .info-left span.margin {\n              margin: 0 .05rem;\n}\n.genius .tab-article .live-list li .info-left span.top-1 {\n              width: .58rem;\n              height: .64rem;\n              background: url(\"/images/live-tab/top-01.png\") no-repeat center center;\n              background-size: 100% 100%;\n              border-radius: 0;\n}\n.genius .tab-article .live-list li .info-left span.top-2 {\n              width: .58rem;\n              height: .64rem;\n              background: url(\"/images/live-tab/top-02.png\") no-repeat center center;\n              background-size: 100% 100%;\n              border-radius: 0;\n}\n.genius .tab-article .live-list li .info-left span.top-3 {\n              width: .58rem;\n              height: .64rem;\n              background: url(\"/images/live-tab/top-03.png\") no-repeat center center;\n              background-size: 100% 100%;\n              border-radius: 0;\n}\n.genius .tab-article .live-list li .info-left img {\n            width: .8rem;\n            height: .8rem;\n            border-radius: 50%;\n            margin-left: .1rem;\n            margin-right: .16rem;\n}\n.genius .tab-article .live-list li .info-right .top {\n          position: relative;\n          margin-bottom: .15rem;\n}\n.genius .tab-article .live-list li .info-right .top h4 {\n            font-size: .28rem;\n            color: #1c0808;\n}\n.genius .tab-article .live-list li .info-right .top .online i {\n            display: inline-block;\n            vertical-align: middle;\n            background: #000;\n            margin-right: .08rem;\n}\n.genius .tab-article .live-list li .info-right .top .online i:nth-child(1) {\n            width: .21rem;\n            height: .24rem;\n            background: url(\"/images/live-tab/icon-01.png\") no-repeat center center;\n            background-size: 96% 100%;\n}\n.genius .tab-article .live-list li .info-right .top .online i:nth-child(3) {\n            width: .22rem;\n            height: .24rem;\n            background: url(\"/images/live-tab/icon-02.png\") no-repeat center center;\n            background-size: 100% 100%;\n}\n.genius .tab-article .live-list li .info-right .top .online span {\n            font-size: .24rem;\n            color: #888888;\n            margin-right: .34rem;\n}\n.genius .tab-article .live-list li .info-right .top .zan i {\n            display: inline-block;\n            width: .24rem;\n            height: .28rem;\n            vertical-align: middle;\n            background: #000;\n            margin-right: .08rem;\n}\n.genius .tab-article .live-list li .info-right .top .zan i:nth-child(1) {\n            background: url(\"/images/live-tab/icon-03.png\") no-repeat center center;\n            background-size: 106% 100%;\n}\n.genius .tab-article .live-list li .info-right .top .zan span {\n            font-size: .24rem;\n            color: #888888;\n            margin-right: .34rem;\n}\n.genius .tab-article .live-list li .info-right .top .button {\n            position: absolute;\n            top: 0.1rem;\n            right: 0;\n            width: 1.1rem;\n            padding: .1rem 0;\n            border-radius: 50px;\n            text-align: center;\n            color: #ffffff;\n            font-size: .28rem;\n            font-weight: bold;\n            border: none;\n}\n.genius .tab-article .live-list li .info-right .top .button.no-focus {\n              background: #c62f2f;\n              /*box-shadow: 0px 0px 10px #fc8c8c;*/\n}\n.genius .tab-article .live-list li .info-right .top .button.is-focus {\n              background: #888888;\n}\n.genius .tab-article .live-list li .info-right p {\n          font-size: .24rem;\n          color: #888888;\n          line-height: .34rem;\n          overflow: hidden;\n          text-overflow: ellipsis;\n          white-space: nowrap;\n          margin-bottom: .05rem;\n}\n.genius .loading-ico {\n    display: -webkit-box;\n    display: -webkit-flex;\n    display: -ms-flexbox;\n    display: flex;\n    -webkit-box-align: center;\n    -webkit-align-items: center;\n        -ms-flex-align: center;\n            align-items: center;\n    -webkit-box-pack: center;\n    -webkit-justify-content: center;\n        -ms-flex-pack: center;\n            justify-content: center;\n    color: #b2b2b2;\n    line-height: 40px;\n    font-size: 14px;\n    margin-bottom: 0;\n}\n.genius .loading-ico span:first-child {\n      margin-right: 5px;\n}\n.genius .tips {\n    height: .6rem;\n    line-height: .6rem;\n    text-align: center;\n    font-size: .24rem;\n    color: #b2b2b2;\n}\n.genius .s-font {\n    font-size: .24rem;\n}\n", ""]);

// exports


/***/ }),

/***/ 1206:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('main', {
    staticClass: "genius"
  }, [_c('mt-navbar', {
    class: {
      'selected1': _vm.selected == 2, 'selected2': _vm.selected == 1
    },
    attrs: {
      "fixed": ""
    },
    model: {
      value: (_vm.selected),
      callback: function($$v) {
        _vm.selected = $$v
      },
      expression: "selected"
    }
  }, [_c('mt-tab-item', {
    attrs: {
      "id": "2"
    }
  }, [_c('span', {
    on: {
      "click": function($event) {
        _vm.getListData(2)
      }
    }
  }, [_vm._v("在线人数")])]), _vm._v(" "), _c('mt-tab-item', {
    attrs: {
      "id": "1"
    }
  }, [_c('span', {
    on: {
      "click": function($event) {
        _vm.getListData(1)
      }
    }
  }, [_vm._v("粉丝最多")])])], 1), _vm._v(" "), _c('main', {
    directives: [{
      name: "infinite-scroll",
      rawName: "v-infinite-scroll",
      value: (_vm.loadMore),
      expression: "loadMore"
    }],
    attrs: {
      "infinite-scroll-disabled": "loading",
      "infinite-scroll-distance": "50",
      "infinite-scroll-immediate-check": "false"
    }
  }, [_c('mt-tab-container', {
    model: {
      value: (_vm.selected),
      callback: function($$v) {
        _vm.selected = $$v
      },
      expression: "selected"
    }
  }, [_c('mt-tab-container-item', {
    attrs: {
      "id": "1"
    }
  }, [_c('article', {
    staticClass: "tab-article"
  }, [_c('ul', {
    staticClass: "live-list"
  }, [_vm._l((_vm.listData), function(item, index) {
    return _c('li', [_c('router-link', {
      attrs: {
        "to": ("/personalSpace/lobbyPage/" + (item.user_id) + "/" + _vm.userId)
      }
    }, [_c('div', {
      staticClass: "info-left"
    }, [_c('span', {
      class: {
        'top-1': index == 0, 'top-2': index == 1, 'top-3': index == 2, 's-font': index > 98, 'margin': index > 2
      }
    }, [_vm._v(_vm._s(index > 2 ? index + 1 : ''))]), _vm._v(" "), _c('img', {
      attrs: {
        "src": item.head_add,
        "alt": "头像"
      }
    })]), _vm._v(" "), _c('section', {
      staticClass: "info-right"
    }, [_c('div', {
      staticClass: "top"
    }, [_c('h4', [_vm._v(_vm._s(item.alias.length > 10 ? item.alias.substr(0, 9) + '...' : item.alias))]), _vm._v(" "), _c('div', {
      staticClass: "online"
    }, [_c('i'), _c('span', [_vm._v(_vm._s(item.popular))]), _vm._v(" "), _c('i'), _c('span', [_vm._v(_vm._s(item.focus_num))])]), _vm._v(" "), _c('span', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (_vm.userId != item.user_id),
        expression: "userId != item.user_id"
      }],
      staticClass: "button",
      class: {
        'is-focus': item.is_focus == 1, 'no-focus': item.is_focus == 0
      },
      on: {
        "click": function($event) {
          $event.stopPropagation();
          $event.preventDefault();
          _vm.focusClick(item)
        }
      }
    }, [_vm._v("\n                                            " + _vm._s(item.is_focus == 1 ? "已关注" : "关注") + "\n                                        ")])]), _vm._v(" "), _c('p', [_vm._v("擅长：" + _vm._s(item.specialty))]), _vm._v(" "), _c('p', [_vm._v("简介：" + _vm._s(item.brief))])])])], 1)
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
  }), _vm._v(" "), _c('span', [_vm._v("正在加载")])], 1), _vm._v(" "), _c('section', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.isEnd),
      expression: "isEnd"
    }],
    staticClass: "tips"
  }, [_vm._v("\n                            以上观点仅供参考，不构成投资建议\n                        ")]), _vm._v(" "), _c('nomore', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.isEnd),
      expression: "isEnd"
    }],
    attrs: {
      "text": "没有更多啦"
    }
  })], 2)])]), _vm._v(" "), _c('mt-tab-container-item', {
    attrs: {
      "id": "2"
    }
  }, [_c('article', {
    staticClass: "tab-article"
  }, [_c('ul', {
    staticClass: "live-list"
  }, [_vm._l((_vm.listData), function(item, index) {
    return _c('li', [_c('router-link', {
      attrs: {
        "to": ("/personalSpace/lobbyPage/" + (item.user_id) + "/" + _vm.userId)
      }
    }, [_c('div', {
      staticClass: "info-left"
    }, [_c('span', {
      class: {
        'top-1': index == 0, 'top-2': index == 1, 'top-3': index == 2, 's-font': index > 98, 'margin': index > 2
      }
    }, [_vm._v(_vm._s(index > 2 ? index + 1 : ''))]), _vm._v(" "), _c('img', {
      attrs: {
        "src": item.head_add,
        "alt": "头像"
      }
    })]), _vm._v(" "), _c('section', {
      staticClass: "info-right"
    }, [_c('div', {
      staticClass: "top"
    }, [_c('h4', [_vm._v(_vm._s(item.alias.length > 10 ? item.alias.substr(0, 9) + '...' : item.alias))]), _vm._v(" "), _c('div', {
      staticClass: "online"
    }, [_c('i'), _c('span', [_vm._v(_vm._s(item.popular))]), _vm._v(" "), _c('i'), _c('span', [_vm._v(_vm._s(item.focus_num))])]), _vm._v(" "), _c('span', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (_vm.userId != item.user_id),
        expression: "userId != item.user_id"
      }],
      staticClass: "button",
      class: {
        'is-focus': item.is_focus == 1, 'no-focus': item.is_focus == 0
      },
      on: {
        "click": function($event) {
          $event.stopPropagation();
          $event.preventDefault();
          _vm.focusClick(item)
        }
      }
    }, [_vm._v("\n                                            " + _vm._s(item.is_focus == 1 ? "已关注" : "关注") + "\n                                        ")])]), _vm._v(" "), _c('p', [_vm._v("当前主题：" + _vm._s(item.theme))]), _vm._v(" "), _c('p', [_vm._v("当前在线：" + _vm._s(item.online_num) + "人")])])])], 1)
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
  }), _vm._v(" "), _c('span', [_vm._v("正在加载")])], 1), _vm._v(" "), _c('section', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.isEnd),
      expression: "isEnd"
    }],
    staticClass: "tips"
  }, [_vm._v("\n                            以上观点仅供参考，不构成投资建议\n                        ")]), _vm._v(" "), _c('nomore', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.isEnd),
      expression: "isEnd"
    }],
    attrs: {
      "text": "没有更多啦"
    }
  })], 2)])])], 1)], 1)], 1)
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-a97d1714", module.exports)
  }
}

/***/ }),

/***/ 1315:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(1047);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("4912858a", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-a97d1714\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./geniusTab.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-a97d1714\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./geniusTab.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 506:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1315)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(931),
  /* template */
  __webpack_require__(1206),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\recommend\\geniusTab.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] geniusTab.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-a97d1714", Component.options)
  } else {
    hotAPI.reload("data-v-a97d1714", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 931:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
	value: true
});

var _vuex = __webpack_require__(70);

var _mintUi = __webpack_require__(54);

var _nomore = __webpack_require__(135);

var _nomore2 = _interopRequireDefault(_nomore);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

exports.default = {
	computed: (0, _vuex.mapState)({
		userId: function userId(state) {
			return state.userInfo.user_id;
		}
	}),
	data: function data() {
		return {
			selected: '2',
			listData: [],
			fansList: [],
			loading: false,
			isEnd: false,
			params: {
				type: 2,
				user_id: '',
				page: 1
			}
		};
	},
	created: function created() {
		var _this = this;

		this.$store.commit('setTitle', '讲师大咖');
		this.$store.commit('showTabber');
		this.getListData(2);
		this.share_fansVisit();
		wx.ready(function () {
			//分享页面链接
			_this.wxShare({
				title: '最有料的投资大咖都在这里',
				desc: '点此进入与大咖交流',
				link: window.location.origin + '/#/geniusTab/' + _this.userId
			});
		});
		wx.error();
	},

	methods: {
		getListData: function getListData(type) {
			var _this2 = this;

			this.$store.dispatch('getUserInfo', function (res) {
				_this2.params = {
					type: type,
					user_id: res.user_id,
					page: 1
				};
				_this2.listData = [];
				console.log('getUserInfo--res', res);
				_this2.$http.post(_this2.hostUrl + '/Home/teacherList', _this2.params, { emulateJSON: true }).then(function (res) {
					if (res.body.code == 0) {
						if (res.body.data.length != 10) {
							_this2.isEnd = true;
							_this2.loading = true;
						}
						_this2.listData = res.body.data;
						/*if (this.params.type == 1) { //1：粉丝最多  2：最新入驻
      	this.listData = res.body.data;
      	this.fansList = res.body.data;
      }
      if (this.params.type == 2) {
      	this.listData = res.body.data;
      }*/
						_this2.loading = false;
					}
				});
			});
		},
		loadMore: function loadMore() {
			var _this3 = this;

			this.loading = true;
			console.log('this.params', this.params);
			if (!this.isEnd) {
				this.params.page++;
				setTimeout(function () {
					_this3.$http.post(_this3.hostUrl + '/Home/teacherList', _this3.params, { emulateJSON: true }).then(function (res) {
						if (res.body.code == 0) {
							_this3.listData = _this3.listData.concat(res.body.data);
							/*if (this.params.type == 1) {
       	this.fansList = this.fansList.concat(res.body.data);
       } else {
       	this.listData = this.listData.concat(res.body.data);
       }*/
							if (res.body.data.length < 10) {
								_this3.isEnd = true;
								_this3.loading = true;
							}
							_this3.loading = false;
						}
					});
				}, 600);
				console.log('enter loadMore');
			}
		},
		focusClick: function focusClick(item) {
			console.log('isFocus');

			this.$http.post(this.hostUrl + '/Focus/addFocus', {
				user_id: this.userId,
				live_id: item.live_id,
				type: item.is_focus == 1 ? 0 : 1
			}, { emulateJSON: true }).then(function (res) {
				if (res.body.code == 0) {
					(0, _mintUi.Toast)({
						message: res.body.msg,
						duration: 800
					});
					item.is_focus = item.is_focus == 1 ? 0 : 1;
				}
			});
		}
	},
	components: {
		nomore: _nomore2.default
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

/***/ })

});