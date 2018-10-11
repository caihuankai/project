webpackJsonp([46],{

/***/ 1017:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n@charset \"UTF-8\";\n.live-tab {\n  background: #F5F7F8;\n}\n.live-tab .swiper-container {\n    padding-top: .5rem;\n    width: 90%;\n    height: 2.3rem;\n    margin: 0 auto;\n    text-align: center;\n    position: inherit;\n}\n.live-tab .swiper-container .swiper-slide {\n      text-align: center;\n}\n.live-tab .swiper-pagination-bullet {\n    width: .15rem;\n    height: .15rem;\n    border-radius: 100%;\n    background-color: white;\n    opacity: 0.5;\n    margin-right: 0;\n}\n.live-tab .swiper-pagination-bullet:last-child {\n      margin-right: .24rem;\n}\n.live-tab .swiper-pagination-bullet.swiper-pagination-bullet-active {\n    background-color: #fff;\n    width: .21rem;\n    border-radius: 10px;\n    opacity: 1;\n}\n.live-tab .swiper-pagination {\n    bottom: .5rem;\n}\n.live-tab .hotImg {\n    height: auto;\n    margin: 0 auto;\n}\n.live-tab .hotImg p img {\n      width: 1.2rem;\n      height: 1.2rem;\n      border-radius: 100%;\n}\n.live-tab .hotImg span {\n      display: block;\n      font-size: .24rem;\n      text-align: center;\n      padding-top: .12rem;\n      color: #FFFFFF;\n}\n.live-tab header {\n    width: 100%;\n    height: 2.8rem;\n    position: relative;\n    overflow: hidden;\n}\n.live-tab header.header1 {\n      background: url(\"/images/live-tab/Livebeijing-ben.png\") no-repeat;\n      background-size: 100% 100%;\n}\n.live-tab header.header2 {\n      background: url(\"/images/live-tab/live-tab-header-02.png\") no-repeat;\n      background-size: 100% 100%;\n}\n.live-tab header.header3 {\n      background: url(\"/images/live-tab/live-tab-header-03.png\") no-repeat;\n      background-size: 100% 100%;\n}\n.live-tab header nav {\n      margin: 2.75rem 1.1rem 0 1.1rem;\n}\n.live-tab header .mint-navbar {\n      width: 100%;\n      position: relative;\n      background: rgba(255, 255, 255, 0);\n}\n.live-tab header .mint-navbar::after {\n        content: '';\n        display: block;\n        width: 0.68rem;\n        height: 0.04rem;\n        background: #fefefe;\n        margin: 0 auto;\n        position: absolute;\n        bottom: .14rem;\n        border-radius: .2rem;\n        -webkit-transition: left .3s ease;\n        transition: left .3s ease;\n        -webkit-transform: translateX(-50%);\n            -ms-transform: translateX(-50%);\n                transform: translateX(-50%);\n}\n.live-tab header .mint-navbar.selected1::after {\n        left: 16.6666%;\n}\n.live-tab header .mint-navbar.selected2::after {\n        left: 50%;\n}\n.live-tab header .mint-navbar.selected3::after {\n        left: 83.3333%;\n}\n.live-tab header .mint-navbar .mint-tab-item-label {\n        font-size: 0.32rem;\n        color: #333;\n        text-align: center;\n}\n.live-tab header .mint-navbar .mint-tab-item-label span {\n          display: block;\n          height: 0.92rem;\n          line-height: 0.92rem;\n          color: #ffbdbd;\n          font-size: .32rem;\n}\n.live-tab header .mint-navbar .mint-tab-item {\n        padding: 0;\n        text-align: center;\n}\n.live-tab header .mint-navbar .mint-tab-item.is-selected {\n        border: none;\n}\n.live-tab header .mint-navbar .mint-tab-item.is-selected .mint-tab-item-label span {\n          color: #fff !important;\n          margin-bottom: 0;\n}\n.live-tab .content {\n    margin-top: -.4rem;\n}\n.live-tab .article .live-list {\n    padding: 0 .24rem;\n    margin-bottom: 1rem;\n}\n.live-tab .article .live-list li {\n      padding: .3rem .26rem .3rem 0;\n      background: #ffffff;\n      margin-bottom: .24rem;\n      border: 1px solid #ededed;\n}\n.live-tab .article .live-list li:last-child {\n        margin-bottom: 0;\n}\n.live-tab .article .live-list li .info-left {\n        float: left;\n        margin-right: .24rem;\n}\n.live-tab .article .live-list li .info-left span {\n          display: inline-block;\n          width: .5rem;\n          height: .5rem;\n          background: #888888;\n          color: #fff;\n          font-weight: bold;\n          border-radius: 50%;\n          line-height: .5rem;\n          text-align: center;\n          vertical-align: middle;\n}\n.live-tab .article .live-list li .info-left span.margin {\n            margin: 0 .05rem;\n}\n.live-tab .article .live-list li .info-left img {\n          width: 1rem;\n          height: 1rem;\n          border-radius: 50%;\n          margin-left: .26rem;\n          margin-right: .26rem;\n}\n.live-tab .article .live-list li .info-left p {\n          font-size: .24rem;\n          color: #888;\n          text-align: center;\n          padding-top: .08rem;\n          width: 1.4rem;\n}\n.live-tab .article .live-list li .info-right .top {\n        position: relative;\n        margin-bottom: .15rem;\n}\n.live-tab .article .live-list li .info-right .top h4 {\n          font-size: .28rem;\n          color: #1c0808;\n          padding-right: .62rem;\n          overflow: hidden;\n          /*超出部分隐藏*/\n          white-space: nowrap;\n          /*不换行*/\n          text-overflow: ellipsis;\n          /*超出部分文字以...显示*/\n          font-weight: bold;\n          margin-bottom: .1rem;\n          min-height: .32rem;\n          line-height: 1.5em;\n}\n.live-tab .article .live-list li .info-right .top img {\n          position: absolute;\n          top: 0;\n          right: .2rem;\n          width: .3rem;\n}\n.live-tab .article .live-list li .info-right .top .online i {\n          display: inline-block;\n          vertical-align: middle;\n          background: #000;\n          margin-right: .08rem;\n}\n.live-tab .article .live-list li .info-right .top .online i:nth-child(1) {\n          width: .21rem;\n          height: .24rem;\n          background: url(\"/images/live-tab/icon-02.png\") no-repeat center center;\n          background-size: 100% 100%;\n}\n.live-tab .article .live-list li .info-right .top .online i:nth-child(3) {\n          width: .27rem;\n          height: .22rem;\n          background: url(\"/images/live-tab/zaixianren-ben.png\") no-repeat center center;\n          background-size: 100% 100%;\n}\n.live-tab .article .live-list li .info-right .top .online span {\n          font-size: .24rem;\n          color: #888888;\n          margin-right: .3rem;\n}\n.live-tab .article .live-list li .info-right .top .zan i {\n          display: inline-block;\n          width: .22rem;\n          height: .24rem;\n          vertical-align: middle;\n          background: #000;\n          margin-right: .08rem;\n}\n.live-tab .article .live-list li .info-right .top .zan i:nth-child(1) {\n          background: url(\"/images/live-tab/icon-03.png\") no-repeat center center;\n          background-size: 100% 100%;\n}\n.live-tab .article .live-list li .info-right .top .zan span {\n          font-size: .24rem;\n          color: #888888;\n          margin-right: .34rem;\n}\n.live-tab .article .live-list li .info-right .top .button {\n          position: absolute;\n          top: 0.1rem;\n          right: 0;\n          width: 1.1rem;\n          padding: .1rem 0;\n          border-radius: 50px;\n          text-align: center;\n          color: #ffffff;\n          font-size: .28rem;\n          font-weight: bold;\n          border: none;\n}\n.live-tab .article .live-list li .info-right .top .button.no-focus {\n            background: #c62f2f;\n            /*box-shadow: 0px 0px 10px #fc8c8c;*/\n}\n.live-tab .article .live-list li .info-right .top .button.is-focus {\n            background: #888888;\n}\n.live-tab .article .live-list li .info-right .live-title {\n        position: relative;\n        background-color: #FAF7F5;\n        padding-right: .6rem;\n        margin-left: 1.76rem;\n        color: #878787;\n        font-size: .24rem;\n        padding-left: .14rem;\n        line-height: .7rem;\n        height: .7rem;\n        border-left: 2px solid #FF1010;\n        overflow: hidden;\n        text-overflow: ellipsis;\n        white-space: nowrap;\n}\n.live-tab .article .live-list li .info-right .live-title::after {\n          content: '';\n          width: .32rem;\n          height: .32rem;\n          position: absolute;\n          top: .19rem;\n          right: .14rem;\n          background: url(\"/images/live-tab/qianwang-ben.png\") center center;\n          background-size: 100% 100%;\n}\n.live-tab .article .live-list li .info-right .live-title img {\n          width: 1rem;\n          margin-top: -.08rem;\n          margin-right: .12rem;\n}\n.live-tab .article .live-list li .info-right p {\n        font-size: .24rem;\n        color: #888888;\n        line-height: .34rem;\n        overflow: hidden;\n        text-overflow: ellipsis;\n        white-space: nowrap;\n        margin-bottom: .05rem;\n}\n.live-tab .loading-ico {\n    display: -webkit-box;\n    display: -webkit-flex;\n    display: -ms-flexbox;\n    display: flex;\n    -webkit-box-align: center;\n    -webkit-align-items: center;\n        -ms-flex-align: center;\n            align-items: center;\n    -webkit-box-pack: center;\n    -webkit-justify-content: center;\n        -ms-flex-pack: center;\n            justify-content: center;\n    color: #b2b2b2;\n    line-height: 40px;\n    font-size: 14px;\n}\n.live-tab .loading-ico span:first-child {\n      margin-right: 5px;\n}\n.live-tab .tips {\n    height: .6rem;\n    line-height: .6rem;\n    text-align: center;\n    font-size: .24rem;\n    color: #b2b2b2;\n}\n.live-tab .s-font {\n    font-size: .24rem;\n}\n", ""]);

// exports


/***/ }),

/***/ 1175:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('main', {
    staticClass: "live-tab"
  }, [_c('header', {
    staticClass: "header1",
    class: {
      'header1': _vm.selected == 1, 'header2': _vm.selected == 2, 'header3': _vm.selected == 3
    }
  }, [_c('swiper', {
    ref: "mySwiper1",
    attrs: {
      "options": _vm.SwiperOption
    }
  }, [_vm._l((_vm.liveTeacher), function(item) {
    return _c('swiper-slide', {
      key: item.adId
    }, [_c('div', {
      staticClass: "hotImg"
    }, [_c('router-link', {
      attrs: {
        "to": ("/live/" + (item.user_id) + "&" + _vm.userId)
      }
    }, [_c('p', [_c('img', {
      attrs: {
        "src": ("" + (item.head_add))
      }
    })]), _vm._v(" "), _c('span', [_vm._v(_vm._s(item.alias.length > 5 ? item.alias.substr(0, 5) : item.alias))])])], 1)])
  }), _vm._v(" "), _c('div', {
    staticClass: "swiper-pagination",
    slot: "pagination"
  })], 2)], 1), _vm._v(" "), _c('main', {
    directives: [{
      name: "infinite-scroll",
      rawName: "v-infinite-scroll",
      value: (_vm.loadMore),
      expression: "loadMore"
    }],
    staticClass: "content",
    attrs: {
      "infinite-scroll-disabled": "loading",
      "infinite-scroll-distance": "250",
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
    staticClass: "article"
  }, [_c('ul', {
    staticClass: "live-list"
  }, [_vm._l((_vm.listData), function(item, index) {
    return _c('li', [_c('router-link', {
      attrs: {
        "to": ("/live/" + (item.user_id) + "&" + _vm.userId + "&1")
      }
    }, [_c('div', {
      staticClass: "info-left"
    }, [_c('img', {
      attrs: {
        "src": item.head_add,
        "alt": "头像"
      }
    }), _vm._v(" "), _c('p', [_vm._v(_vm._s(item.alias))])]), _vm._v(" "), _c('section', {
      staticClass: "info-right"
    }, [_c('div', {
      staticClass: "top"
    }, [_c('h4', [_vm._v(_vm._s(item.theme || ((item.alias) + "的直播间")))]), _vm._v(" "), _c('div', {
      staticClass: "online"
    }, [_c('i'), _c('span', [_vm._v(_vm._s(item.focus_num) + "人")]), _vm._v(" "), _c('i'), _c('span', [_vm._v(_vm._s(item.onlineNum) + "人")])]), _vm._v(" "), (item.isLiving == 1) ? [_c('img', {
      attrs: {
        "src": "images/live-tab/zaibozhong-ben.gif"
      }
    })] : [_c('img', {
      attrs: {
        "src": "images/live-tab/weizhibo-ben.png"
      }
    })]], 2), _vm._v(" "), _c('router-link', {
      attrs: {
        "to": item.today_reference_id ? ("/column/detail/" + (item.today_reference_id)) : ("/live/" + (item.user_id) + "&" + _vm.userId)
      }
    }, [_c('div', {
      staticClass: "live-title"
    }, [_c('img', {
      attrs: {
        "src": "/images/live-tab/neicanwenzi-ben.png",
        "alt": ""
      }
    }), _vm._v("\n                                            " + _vm._s(item.today_reference) + "\n                                        ")])])], 1)])], 1)
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
  })], 2)])])], 1)], 1)])
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-5c475418", module.exports)
  }
}

/***/ }),

/***/ 1285:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(1017);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("0d22638c", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-5c475418\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./liveList.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-5c475418\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./liveList.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 442:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1285)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(867),
  /* template */
  __webpack_require__(1175),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\live\\liveList.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] liveList.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-5c475418", Component.options)
  } else {
    hotAPI.reload("data-v-5c475418", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 516:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(519);
if(typeof content === 'string') content = [[module.i, content, '']];
// Prepare cssTransformation
var transform;

var options = {}
options.transform = transform
// add the styles to the DOM
var update = __webpack_require__(412)(content, options);
if(content.locals) module.exports = content.locals;
// Hot Module Replacement
if(false) {
	// When the styles change, update the <style> tags
	if(!content.locals) {
		module.hot.accept("!!../../../css-loader/index.js??ref--3-2!./swiper.min.css", function() {
			var newContent = require("!!../../../css-loader/index.js??ref--3-2!./swiper.min.css");
			if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
			update(newContent);
		});
	}
	// When the module is disposed, remove the <style> tags
	module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 519:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, ".swiper-container{margin:0 auto;position:relative;overflow:hidden;list-style:none;padding:0;z-index:1}.swiper-container-no-flexbox .swiper-slide{float:left}.swiper-container-vertical>.swiper-wrapper{-webkit-box-orient:vertical;-webkit-box-direction:normal;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column}.swiper-wrapper{position:relative;width:100%;height:100%;z-index:1;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-transition-property:-webkit-transform;transition-property:-webkit-transform;-o-transition-property:transform;transition-property:transform;transition-property:transform,-webkit-transform;-webkit-box-sizing:content-box;box-sizing:content-box}.swiper-container-android .swiper-slide,.swiper-wrapper{-webkit-transform:translateZ(0);transform:translateZ(0)}.swiper-container-multirow>.swiper-wrapper{-webkit-flex-wrap:wrap;-ms-flex-wrap:wrap;flex-wrap:wrap}.swiper-container-free-mode>.swiper-wrapper{-webkit-transition-timing-function:ease-out;-o-transition-timing-function:ease-out;transition-timing-function:ease-out;margin:0 auto}.swiper-slide{-webkit-flex-shrink:0;-ms-flex-negative:0;flex-shrink:0;width:100%;height:100%;position:relative;-webkit-transition-property:-webkit-transform;transition-property:-webkit-transform;-o-transition-property:transform;transition-property:transform;transition-property:transform,-webkit-transform}.swiper-invisible-blank-slide{visibility:hidden}.swiper-container-autoheight,.swiper-container-autoheight .swiper-slide{height:auto}.swiper-container-autoheight .swiper-wrapper{-webkit-box-align:start;-webkit-align-items:flex-start;-ms-flex-align:start;align-items:flex-start;-webkit-transition-property:height,-webkit-transform;transition-property:height,-webkit-transform;-o-transition-property:transform,height;transition-property:transform,height;transition-property:transform,height,-webkit-transform}.swiper-container-3d{-webkit-perspective:1200px;perspective:1200px}.swiper-container-3d .swiper-cube-shadow,.swiper-container-3d .swiper-slide,.swiper-container-3d .swiper-slide-shadow-bottom,.swiper-container-3d .swiper-slide-shadow-left,.swiper-container-3d .swiper-slide-shadow-right,.swiper-container-3d .swiper-slide-shadow-top,.swiper-container-3d .swiper-wrapper{-webkit-transform-style:preserve-3d;transform-style:preserve-3d}.swiper-container-3d .swiper-slide-shadow-bottom,.swiper-container-3d .swiper-slide-shadow-left,.swiper-container-3d .swiper-slide-shadow-right,.swiper-container-3d .swiper-slide-shadow-top{position:absolute;left:0;top:0;width:100%;height:100%;pointer-events:none;z-index:10}.swiper-container-3d .swiper-slide-shadow-left{background-image:-webkit-gradient(linear,right top,left top,from(rgba(0,0,0,.5)),to(transparent));background-image:-webkit-linear-gradient(right,rgba(0,0,0,.5),transparent);background-image:-o-linear-gradient(right,rgba(0,0,0,.5),transparent);background-image:linear-gradient(270deg,rgba(0,0,0,.5),transparent)}.swiper-container-3d .swiper-slide-shadow-right{background-image:-webkit-gradient(linear,left top,right top,from(rgba(0,0,0,.5)),to(transparent));background-image:-webkit-linear-gradient(left,rgba(0,0,0,.5),transparent);background-image:-o-linear-gradient(left,rgba(0,0,0,.5),transparent);background-image:linear-gradient(90deg,rgba(0,0,0,.5),transparent)}.swiper-container-3d .swiper-slide-shadow-top{background-image:-webkit-gradient(linear,left bottom,left top,from(rgba(0,0,0,.5)),to(transparent));background-image:-webkit-linear-gradient(bottom,rgba(0,0,0,.5),transparent);background-image:-o-linear-gradient(bottom,rgba(0,0,0,.5),transparent);background-image:linear-gradient(0deg,rgba(0,0,0,.5),transparent)}.swiper-container-3d .swiper-slide-shadow-bottom{background-image:-webkit-gradient(linear,left top,left bottom,from(rgba(0,0,0,.5)),to(transparent));background-image:-webkit-linear-gradient(top,rgba(0,0,0,.5),transparent);background-image:-o-linear-gradient(top,rgba(0,0,0,.5),transparent);background-image:linear-gradient(180deg,rgba(0,0,0,.5),transparent)}.swiper-container-wp8-horizontal,.swiper-container-wp8-horizontal>.swiper-wrapper{-ms-touch-action:pan-y;touch-action:pan-y}.swiper-container-wp8-vertical,.swiper-container-wp8-vertical>.swiper-wrapper{-ms-touch-action:pan-x;touch-action:pan-x}.swiper-button-next,.swiper-button-prev{position:absolute;top:50%;width:27px;height:44px;margin-top:-22px;z-index:10;cursor:pointer;background-size:27px 44px;background-position:50%;background-repeat:no-repeat}.swiper-button-next.swiper-button-disabled,.swiper-button-prev.swiper-button-disabled{opacity:.35;cursor:auto;pointer-events:none}.swiper-button-prev,.swiper-container-rtl .swiper-button-next{background-image:url(\"data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 27 44'%3E%3Cpath d='M0 22L22 0l2.1 2.1L4.2 22l19.9 19.9L22 44 0 22z' fill='%23007aff'/%3E%3C/svg%3E\");left:10px;right:auto}.swiper-button-next,.swiper-container-rtl .swiper-button-prev{background-image:url(\"data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 27 44'%3E%3Cpath d='M27 22L5 44l-2.1-2.1L22.8 22 2.9 2.1 5 0l22 22z' fill='%23007aff'/%3E%3C/svg%3E\");right:10px;left:auto}.swiper-button-prev.swiper-button-white,.swiper-container-rtl .swiper-button-next.swiper-button-white{background-image:url(\"data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 27 44'%3E%3Cpath d='M0 22L22 0l2.1 2.1L4.2 22l19.9 19.9L22 44 0 22z' fill='%23fff'/%3E%3C/svg%3E\")}.swiper-button-next.swiper-button-white,.swiper-container-rtl .swiper-button-prev.swiper-button-white{background-image:url(\"data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 27 44'%3E%3Cpath d='M27 22L5 44l-2.1-2.1L22.8 22 2.9 2.1 5 0l22 22z' fill='%23fff'/%3E%3C/svg%3E\")}.swiper-button-prev.swiper-button-black,.swiper-container-rtl .swiper-button-next.swiper-button-black{background-image:url(\"data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 27 44'%3E%3Cpath d='M0 22L22 0l2.1 2.1L4.2 22l19.9 19.9L22 44 0 22z'/%3E%3C/svg%3E\")}.swiper-button-next.swiper-button-black,.swiper-container-rtl .swiper-button-prev.swiper-button-black{background-image:url(\"data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 27 44'%3E%3Cpath d='M27 22L5 44l-2.1-2.1L22.8 22 2.9 2.1 5 0l22 22z'/%3E%3C/svg%3E\")}.swiper-button-lock{display:none}.swiper-pagination{position:absolute;text-align:center;-webkit-transition:opacity .3s;-o-transition:.3s opacity;transition:opacity .3s;-webkit-transform:translateZ(0);transform:translateZ(0);z-index:10}.swiper-pagination.swiper-pagination-hidden{opacity:0}.swiper-container-horizontal>.swiper-pagination-bullets,.swiper-pagination-custom,.swiper-pagination-fraction{bottom:10px;left:0;width:100%}.swiper-pagination-bullets-dynamic{overflow:hidden;font-size:0}.swiper-pagination-bullets-dynamic .swiper-pagination-bullet{-webkit-transform:scale(.33);-ms-transform:scale(.33);transform:scale(.33);position:relative}.swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active,.swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active-main{-webkit-transform:scale(1);-ms-transform:scale(1);transform:scale(1)}.swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active-prev{-webkit-transform:scale(.66);-ms-transform:scale(.66);transform:scale(.66)}.swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active-prev-prev{-webkit-transform:scale(.33);-ms-transform:scale(.33);transform:scale(.33)}.swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active-next{-webkit-transform:scale(.66);-ms-transform:scale(.66);transform:scale(.66)}.swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active-next-next{-webkit-transform:scale(.33);-ms-transform:scale(.33);transform:scale(.33)}.swiper-pagination-bullet{width:8px;height:8px;display:inline-block;border-radius:100%;background:#000;opacity:.2}button.swiper-pagination-bullet{border:none;margin:0;padding:0;-webkit-box-shadow:none;box-shadow:none;-webkit-appearance:none;-moz-appearance:none;appearance:none}.swiper-pagination-clickable .swiper-pagination-bullet{cursor:pointer}.swiper-pagination-bullet-active{opacity:1;background:#007aff}.swiper-container-vertical>.swiper-pagination-bullets{right:10px;top:50%;-webkit-transform:translate3d(0,-50%,0);transform:translate3d(0,-50%,0)}.swiper-container-vertical>.swiper-pagination-bullets .swiper-pagination-bullet{margin:6px 0;display:block}.swiper-container-vertical>.swiper-pagination-bullets.swiper-pagination-bullets-dynamic{top:50%;-webkit-transform:translateY(-50%);-ms-transform:translateY(-50%);transform:translateY(-50%);width:8px}.swiper-container-vertical>.swiper-pagination-bullets.swiper-pagination-bullets-dynamic .swiper-pagination-bullet{display:inline-block;-webkit-transition:top .2s,-webkit-transform .2s;transition:top .2s,-webkit-transform .2s;-o-transition:.2s transform,.2s top;transition:transform .2s,top .2s;transition:transform .2s,top .2s,-webkit-transform .2s}.swiper-container-horizontal>.swiper-pagination-bullets .swiper-pagination-bullet{margin:0 4px}.swiper-container-horizontal>.swiper-pagination-bullets.swiper-pagination-bullets-dynamic{left:50%;-webkit-transform:translateX(-50%);-ms-transform:translateX(-50%);transform:translateX(-50%);white-space:nowrap}.swiper-container-horizontal>.swiper-pagination-bullets.swiper-pagination-bullets-dynamic .swiper-pagination-bullet{-webkit-transition:left .2s,-webkit-transform .2s;transition:left .2s,-webkit-transform .2s;-o-transition:.2s transform,.2s left;transition:transform .2s,left .2s;transition:transform .2s,left .2s,-webkit-transform .2s}.swiper-container-horizontal.swiper-container-rtl>.swiper-pagination-bullets-dynamic .swiper-pagination-bullet{-webkit-transition:right .2s,-webkit-transform .2s;transition:right .2s,-webkit-transform .2s;-o-transition:.2s transform,.2s right;transition:transform .2s,right .2s;transition:transform .2s,right .2s,-webkit-transform .2s}.swiper-pagination-progressbar{background:rgba(0,0,0,.25);position:absolute}.swiper-pagination-progressbar .swiper-pagination-progressbar-fill{background:#007aff;position:absolute;left:0;top:0;width:100%;height:100%;-webkit-transform:scale(0);-ms-transform:scale(0);transform:scale(0);-webkit-transform-origin:left top;-ms-transform-origin:left top;transform-origin:left top}.swiper-container-rtl .swiper-pagination-progressbar .swiper-pagination-progressbar-fill{-webkit-transform-origin:right top;-ms-transform-origin:right top;transform-origin:right top}.swiper-container-horizontal>.swiper-pagination-progressbar,.swiper-container-vertical>.swiper-pagination-progressbar.swiper-pagination-progressbar-opposite{width:100%;height:4px;left:0;top:0}.swiper-container-horizontal>.swiper-pagination-progressbar.swiper-pagination-progressbar-opposite,.swiper-container-vertical>.swiper-pagination-progressbar{width:4px;height:100%;left:0;top:0}.swiper-pagination-white .swiper-pagination-bullet-active{background:#fff}.swiper-pagination-progressbar.swiper-pagination-white{background:hsla(0,0%,100%,.25)}.swiper-pagination-progressbar.swiper-pagination-white .swiper-pagination-progressbar-fill{background:#fff}.swiper-pagination-black .swiper-pagination-bullet-active{background:#000}.swiper-pagination-progressbar.swiper-pagination-black{background:rgba(0,0,0,.25)}.swiper-pagination-progressbar.swiper-pagination-black .swiper-pagination-progressbar-fill{background:#000}.swiper-pagination-lock{display:none}.swiper-scrollbar{border-radius:10px;position:relative;-ms-touch-action:none;background:rgba(0,0,0,.1)}.swiper-container-horizontal>.swiper-scrollbar{position:absolute;left:1%;bottom:3px;z-index:50;height:5px;width:98%}.swiper-container-vertical>.swiper-scrollbar{position:absolute;right:3px;top:1%;z-index:50;width:5px;height:98%}.swiper-scrollbar-drag{height:100%;width:100%;position:relative;background:rgba(0,0,0,.5);border-radius:10px;left:0;top:0}.swiper-scrollbar-cursor-drag{cursor:move}.swiper-scrollbar-lock{display:none}.swiper-zoom-container{width:100%;height:100%;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;text-align:center}.swiper-zoom-container>canvas,.swiper-zoom-container>img,.swiper-zoom-container>svg{max-width:100%;max-height:100%;-o-object-fit:contain;object-fit:contain}.swiper-slide-zoomed{cursor:move}.swiper-lazy-preloader{width:42px;height:42px;position:absolute;left:50%;top:50%;margin-left:-21px;margin-top:-21px;z-index:10;-webkit-transform-origin:50%;-ms-transform-origin:50%;transform-origin:50%;-webkit-animation:swiper-preloader-spin 1s steps(12) infinite;animation:swiper-preloader-spin 1s steps(12) infinite}.swiper-lazy-preloader:after{display:block;content:\"\";width:100%;height:100%;background-image:url(\"data:image/svg+xml;charset=utf-8,%3Csvg viewBox='0 0 120 120' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpath id='a' stroke='%236c6c6c' stroke-width='11' stroke-linecap='round' d='M60 7v20'/%3E%3C/defs%3E%3Cuse xlink:href='%23a' opacity='.27'/%3E%3Cuse xlink:href='%23a' opacity='.27' transform='rotate(30 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.27' transform='rotate(60 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.27' transform='rotate(90 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.27' transform='rotate(120 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.27' transform='rotate(150 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.37' transform='rotate(180 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.46' transform='rotate(210 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.56' transform='rotate(240 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.66' transform='rotate(270 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.75' transform='rotate(300 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.85' transform='rotate(330 60 60)'/%3E%3C/svg%3E\");background-position:50%;background-size:100%;background-repeat:no-repeat}.swiper-lazy-preloader-white:after{background-image:url(\"data:image/svg+xml;charset=utf-8,%3Csvg viewBox='0 0 120 120' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpath id='a' stroke='%23fff' stroke-width='11' stroke-linecap='round' d='M60 7v20'/%3E%3C/defs%3E%3Cuse xlink:href='%23a' opacity='.27'/%3E%3Cuse xlink:href='%23a' opacity='.27' transform='rotate(30 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.27' transform='rotate(60 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.27' transform='rotate(90 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.27' transform='rotate(120 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.27' transform='rotate(150 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.37' transform='rotate(180 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.46' transform='rotate(210 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.56' transform='rotate(240 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.66' transform='rotate(270 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.75' transform='rotate(300 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.85' transform='rotate(330 60 60)'/%3E%3C/svg%3E\")}@-webkit-keyframes swiper-preloader-spin{to{-webkit-transform:rotate(1turn);transform:rotate(1turn)}}@keyframes swiper-preloader-spin{to{-webkit-transform:rotate(1turn);transform:rotate(1turn)}}.swiper-container .swiper-notification{position:absolute;left:0;top:0;pointer-events:none;opacity:0;z-index:-1000}.swiper-container-fade.swiper-container-free-mode .swiper-slide{-webkit-transition-timing-function:ease-out;-o-transition-timing-function:ease-out;transition-timing-function:ease-out}.swiper-container-fade .swiper-slide{pointer-events:none;-webkit-transition-property:opacity;-o-transition-property:opacity;transition-property:opacity}.swiper-container-fade .swiper-slide .swiper-slide{pointer-events:none}.swiper-container-fade .swiper-slide-active,.swiper-container-fade .swiper-slide-active .swiper-slide-active{pointer-events:auto}.swiper-container-cube{overflow:visible}.swiper-container-cube .swiper-slide{pointer-events:none;-webkit-backface-visibility:hidden;backface-visibility:hidden;z-index:1;visibility:hidden;-webkit-transform-origin:0 0;-ms-transform-origin:0 0;transform-origin:0 0;width:100%;height:100%}.swiper-container-cube .swiper-slide .swiper-slide{pointer-events:none}.swiper-container-cube.swiper-container-rtl .swiper-slide{-webkit-transform-origin:100% 0;-ms-transform-origin:100% 0;transform-origin:100% 0}.swiper-container-cube .swiper-slide-active,.swiper-container-cube .swiper-slide-active .swiper-slide-active{pointer-events:auto}.swiper-container-cube .swiper-slide-active,.swiper-container-cube .swiper-slide-next,.swiper-container-cube .swiper-slide-next+.swiper-slide,.swiper-container-cube .swiper-slide-prev{pointer-events:auto;visibility:visible}.swiper-container-cube .swiper-slide-shadow-bottom,.swiper-container-cube .swiper-slide-shadow-left,.swiper-container-cube .swiper-slide-shadow-right,.swiper-container-cube .swiper-slide-shadow-top{z-index:0;-webkit-backface-visibility:hidden;backface-visibility:hidden}.swiper-container-cube .swiper-cube-shadow{position:absolute;left:0;bottom:0;width:100%;height:100%;background:#000;opacity:.6;-webkit-filter:blur(50px);filter:blur(50px);z-index:0}.swiper-container-flip{overflow:visible}.swiper-container-flip .swiper-slide{pointer-events:none;-webkit-backface-visibility:hidden;backface-visibility:hidden;z-index:1}.swiper-container-flip .swiper-slide .swiper-slide{pointer-events:none}.swiper-container-flip .swiper-slide-active,.swiper-container-flip .swiper-slide-active .swiper-slide-active{pointer-events:auto}.swiper-container-flip .swiper-slide-shadow-bottom,.swiper-container-flip .swiper-slide-shadow-left,.swiper-container-flip .swiper-slide-shadow-right,.swiper-container-flip .swiper-slide-shadow-top{z-index:0;-webkit-backface-visibility:hidden;backface-visibility:hidden}.swiper-container-coverflow .swiper-wrapper{-ms-perspective:1200px}", ""]);

// exports


/***/ }),

/***/ 867:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _data$computed$create;

var _nomore = __webpack_require__(135);

var _nomore2 = _interopRequireDefault(_nomore);

var _mintUi = __webpack_require__(54);

var _vuex = __webpack_require__(70);

var _vueAwesomeSwiper = __webpack_require__(136);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; } //
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

__webpack_require__(516);
exports.default = (_data$computed$create = {
    data: function data() {
        return {
            SwiperOption: {
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false
                },
                speed: 300,
                slidesPerGroup: 4,
                //  loop: true,
                loopFillGroupWithBlank: true,
                slidesPerView: '4',
                loopedSlides: 9
                /*onSlideChangeEnd: swiper=>{
                    //回调
                    console.log(112);
                    this.pagesTo =this.pagesTo+1;
                    if(this.isTeacherNum==false){
                        //this.liveTeacherList();
                    }
                }*/
            },
            selected: '1',
            firstItem: '',
            listData: [],
            loading: false,
            params: {
                page: 1
            },
            isEnd: false,
            userId: '',
            liveTeacher: [], //老師列表
            pagesTo: 1,
            isTeacherNum: false //是否老师数据
        };
    },

    computed: (0, _vuex.mapState)({
        userId: function userId(state) {
            return state.userInfo.user_id;
        },
        isWeiXin: function isWeiXin(state) {
            return state.isWeiXin;
        }
    }),
    created: function created() {
        var _this = this;

        this.listData = [];
        this.$store.commit('setTitle', 'Live直播');
        this.srcollToTop();
        this.liveTeacherList();
        this.getListData();
        this.$store.commit('showTabber');
        this.share_fansVisit();
        wx.ready(function () {
            //分享页面链接
            _this.wxShare({
                title: '最有料的金融投资大咖都在这里',
                desc: '戳此进入',
                link: window.location.origin + '/#/liveList/?shareId=1'
            });
        });
        wx.error();
    }
}, _defineProperty(_data$computed$create, 'computed', {
    swiper: function swiper() {
        return this.$refs.mySwiper1.swiper;
    }
}), _defineProperty(_data$computed$create, 'beforeRouteEnter', function beforeRouteEnter(to, from, next) {
    if (from.path.indexOf('shaking') !== -1) {
        sessionStorage.setItem("onloadShake", "1");
    }
    next();
}), _defineProperty(_data$computed$create, 'methods', {
    getListData: function getListData() {
        var _this2 = this;

        //默認加載
        this.$store.dispatch('getUserInfo', function (res) {
            console.log(res);
            _this2.userId = res.user_id;
            _this2.listData = [];
            _this2.firstItem = '';
            _this2.params = {
                page: 1,
                limit: 10
            };
            _this2.$http.post(_this2.hostUrl + '/Home/liveList', _this2.params, { emulateJSON: true }).then(function (res) {
                if (res.body.code == 200) {
                    _this2.firstItem = res.body.data[0];
                    //                        this.listData = res.body.data.splice(1, res.body.data.length);
                    _this2.listData = res.body.data;
                    console.log(_this2.listData);
                    if (res.body.data.length < 9) {
                        _this2.loading = true;
                        _this2.isEnd = true;
                    }
                    _this2.loading = false;
                    _this2.isEnd = false;
                    console.log('this.selected', _this2.selected);
                }
            });
        });
        document.body.scrollTop = 0;
    },
    loadMore: function loadMore() {
        var _this3 = this;

        // 加載更多
        this.loading = true;
        if (!this.isEnd) {
            this.params.page++;
            setTimeout(function () {
                _this3.$http.post(_this3.hostUrl + '/Home/liveList', _this3.params, { emulateJSON: true }).then(function (res) {
                    //console.log('this.params', this.params);
                    if (res.body.code == 200) {
                        if (_this3.params.page != 1) {
                            _this3.listData = _this3.listData.concat(res.body.data);
                        } else {
                            _this3.listData = res.body.data;
                        }
                        if (res.body.data.length < 10) {
                            _this3.isEnd = true;
                        }
                        _this3.loading = false;
                    }
                });
            }, 1000);
        }
    },
    liveTeacherList: function liveTeacherList() {
        var _this4 = this;

        // //直播平台讲师列表
        console.log(this.pagesTo);
        this.$http.post(this.hostUrl + '/Home/liveTeacherList', {
            page: this.pagesTo,
            limit: 9
        }, { emulateJSON: true }).then(function (res) {
            console.log(res);
            if (res.body.code == 200) {
                // this.liveTeacher = this.liveTeacher.concat(res.body.data);
                _this4.liveTeacher = res.body.data;
                _this4.$nextTick(function () {
                    window.scrollTo(0, 1);
                    window.scrollTo(0, 0);
                });
                console.log(res.body.data.length);
                if (res.body.data.length < 9) {
                    _this4.isTeacherNum = true;
                }
            }
        });
    }
}), _defineProperty(_data$computed$create, 'watch', {}), _defineProperty(_data$computed$create, 'components', {
    nomore: _nomore2.default,
    swiper: _vueAwesomeSwiper.swiper
}), _data$computed$create);

/***/ })

});