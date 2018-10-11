webpackJsonp([12],{

/***/ 1012:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.periodical {\n  min-height: 100%;\n  background: #fff;\n  position: relative;\n}\n.periodical.padding-b {\n    padding-bottom: 1.16rem;\n}\n.periodical.is-fix {\n    padding-top: .88rem;\n}\n.periodical .header {\n    text-align: center;\n    background: url(\"/images/column/pig.jpg\") no-repeat center center;\n    background-size: cover;\n    color: #fff;\n    overflow: hidden;\n}\n.periodical .header .part {\n      width: 100%;\n      height: 100%;\n      background-color: rgba(0, 0, 0, 0.5);\n      overflow: hidden;\n}\n.periodical .header .part h1 {\n        font-size: .36rem;\n        margin: .44rem 0;\n}\n.periodical .header .part h4 {\n        font-size: .28rem;\n}\n.periodical .header .part p {\n        font-size: .24rem;\n        margin-top: .16rem;\n        margin-bottom: .23rem;\n}\n.periodical .header .focus-btn {\n      display: inline-block;\n      background: #c62f2f;\n      height: .5rem;\n      line-height: .5rem;\n      font-size: .28rem;\n      border-radius: 20px;\n      margin-bottom: .46rem;\n      min-width: 1.62rem;\n}\n.periodical .header .focus-btn.is-focus {\n        background: #888888;\n}\n.periodical .mini-header {\n    background: #fff;\n    display: block;\n    width: 100%;\n    padding: 0 5%;\n    top: 0;\n    left: 0;\n    z-index: 999;\n    position: fixed;\n    padding-bottom: .16rem;\n    box-sizing: border-box;\n}\n.periodical .mini-header .left {\n      float: left;\n      width: 70%;\n}\n.periodical .mini-header .left h2 {\n        font-size: .28rem;\n        color: #1c0808;\n        padding-top: .16rem;\n}\n.periodical .mini-header .left p {\n        font-size: .24rem;\n        color: #888;\n        padding-top: .08rem;\n}\n.periodical .mini-header .right {\n      float: right;\n      width: 28%;\n      padding-top: .16rem;\n      margin: 0 auto;\n      text-align: right;\n}\n.periodical .mini-header .right button {\n        border: 0px;\n        background: #c62f2f;\n        color: #fff;\n        font-size: .28rem;\n        padding: 0 .2rem;\n        line-height: .5rem;\n        height: .5rem;\n        /*line-height: .5rem;*/\n        border-radius: .25rem;\n}\n.periodical .mini-header .right button.is-focus {\n          background: #888888;\n}\n.periodical .stock-swiper {\n    padding: .16rem 0 .16rem .24rem;\n    background: #F5F7F8;\n}\n.periodical .stock-swiper .swiper-slide {\n      text-align: center;\n      width: 1.9rem !important;\n      background: #fff;\n      border: 1px solid #dbdbdb;\n      border-radius: 5px;\n      margin-right: .16rem;\n}\n.periodical .stock-swiper .swiper-slide h1 {\n        font-size: .28rem;\n        color: #1c0808;\n        padding: .24rem .1rem;\n        border-bottom: 1px solid #dbdbdb;\n        overflow: hidden;\n        -ms-text-overflow: ellipsis;\n        text-overflow: ellipsis;\n        white-space: nowrap;\n}\n.periodical .stock-swiper .swiper-slide h4 {\n        font-size: .24rem;\n        color: #c62f2f;\n        margin-top: .24rem;\n        margin-bottom: .16rem;\n}\n.periodical .stock-swiper .swiper-slide p {\n        font-size: .24rem;\n        color: #888888;\n        padding: 0 .24rem;\n        margin-bottom: .24rem;\n        display: -webkit-box;\n        -webkit-box-orient: vertical;\n        -webkit-line-clamp: 2;\n        overflow: hidden;\n        min-height: .54rem;\n}\n", ""]);

// exports


/***/ }),

/***/ 1170:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('main', {
    staticClass: "periodical",
    class: {
      'padding-b': _vm.columnData.level == 1, 'is-fix': _vm.isFix
    }
  }, [_c('header', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (!_vm.isFix),
      expression: "!isFix"
    }],
    staticClass: "header",
    style: ({
      'background-image': ("url('" + (_vm.columnData.pic) + "')")
    })
  }, [_c('div', {
    staticClass: "part"
  }, [_c('h1', [_vm._v("#" + _vm._s(_vm.columnData.name))]), _vm._v(" "), _c('h4', [_vm._v(_vm._s(_vm.columnData.lead))]), _vm._v(" "), _c('p', [_vm._v(_vm._s(_vm.columnData.focusNum) + "关注 | " + _vm._s(_vm.columnData.readNum) + "阅读")]), _vm._v(" "), _c('section', {
    staticClass: "focus-btn",
    class: {
      'is-focus': _vm.isFocus
    },
    on: {
      "click": _vm.addFocus
    }
  }, [_vm._v(_vm._s(_vm.isFocus ? '已关注' : '关注栏目'))])])]), _vm._v(" "), _c('header', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.isFix),
      expression: "isFix"
    }],
    staticClass: "mini-header clearfix"
  }, [_c('div', {
    staticClass: "left"
  }, [_c('h2', [_vm._v("#" + _vm._s(_vm.columnData.name))]), _vm._v(" "), _c('p', [_vm._v(_vm._s(_vm.columnData.lead))])]), _vm._v(" "), _c('div', {
    staticClass: "right"
  }, [_c('button', {
    class: {
      'is-focus': _vm.isFocus
    },
    attrs: {
      "type": "button"
    },
    on: {
      "click": _vm.addFocus
    }
  }, [_vm._v(_vm._s(_vm.isFocus ? '已关注' : '关注栏目') + "\n            ")])])]), _vm._v(" "), (_vm.columnData.name == '潜伏机会') ? _c('section', {
    staticClass: "stock-swiper"
  }, [_c('swiper', {
    ref: "mySwiper",
    attrs: {
      "options": _vm.SwiperOption
    }
  }, _vm._l((_vm.swiperList), function(item, index) {
    return _c('swiper-slide', [_c('router-link', {
      attrs: {
        "to": ("/column/detail/" + (item.id))
      }
    }, [_c('h1', [_vm._v(_vm._s(item.title))]), _vm._v(" "), _c('h4', [_vm._v(_vm._s(_vm.timeFn(item.start_time)))]), _vm._v(" "), _c('p', [_vm._v(_vm._s(item.lead))])])], 1)
  }))], 1) : _vm._e(), _vm._v(" "), [(_vm.getShowlist) ? _c('ListM', {
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
  })], _vm._v(" "), _c('Qrcode'), _vm._v(" "), (_vm.columnData.level == 1 && _vm.columnData.isBuy == false) ? _c('chargeM', {
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
  }) : _vm._e()], 2)
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-5528248a", module.exports)
  }
}

/***/ }),

/***/ 1280:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(1012);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("c06c4050", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-5528248a\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./periodical.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-5528248a\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./periodical.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 421:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1280)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(844),
  /* template */
  __webpack_require__(1170),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\column\\periodical.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] periodical.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-5528248a", Component.options)
  } else {
    hotAPI.reload("data-v-5528248a", Component.options)
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

/***/ 844:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function($) {

Object.defineProperty(exports, "__esModule", {
  value: true
});

var _vuex = __webpack_require__(70);

var _mintUi = __webpack_require__(54);

var _noincome = __webpack_require__(137);

var _noincome2 = _interopRequireDefault(_noincome);

var _list = __webpack_require__(816);

var _list2 = _interopRequireDefault(_list);

var _vueAwesomeSwiper = __webpack_require__(136);

var _nomore = __webpack_require__(135);

var _nomore2 = _interopRequireDefault(_nomore);

var _QrCode = __webpack_require__(524);

var _QrCode2 = _interopRequireDefault(_QrCode);

var _chargeM = __webpack_require__(787);

var _chargeM2 = _interopRequireDefault(_chargeM);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

__webpack_require__(516); //
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
      columnId: this.$route.params.type, //4:早晚参,10:擒龙头,12:公告,14:潜伏机会,6:红鱼研报
      typeText: '',
      SwiperOption: {
        autoplay: false,
        speed: 300,
        slidesPerView: 'auto', /**/
        slidesPerGroup: 1
      },
      headerHeight: '',
      getShowlist: true, //默認加載
      isFix: '', //是否固定头部
      columnData: '', //本栏目信息
      isFocus: '', //是否关注本栏目
      isAd: false, //是否显示广告位
      chargeData: [], //订阅数据
      showBuyPopup: false, //是否显示购买弹窗
      listParams: {
        pageNo: 1,
        perPage: 10,
        isUserInfo: false,
        orderBy: 'column_top_status desc,cateName desc,publish_time desc,id desc',
        status: 1, //已发布的观点，草稿状态不显示
        isImageInfo: true,
        isCate: true
      },
      viewPointList: [], //列表数据
      swiperList: [], //轮播图数据 columnId = 14时

      loading: false,
      isEnd: false
    };
  },

  computed: {
    swiper: function swiper() {
      return this.$refs.mySwiper.swiper;
    },
    userId: function userId() {
      return this.$store.state.userInfo.user_id;
    }
  },
  destroyed: function destroyed() {
    console.log("我已经离开了！");
    this.setCookie("isBack", 0);
  },
  created: function created() {
    _mintUi.Indicator.open('加载中...');
    this.setCookie('isShareLink', 1);
    this.srcollToTop();
    this.$store.commit('hideTabber');
    this.getColumnById();
    this.getViewPointList();
    this.setReadNumIncById();
  },
  beforeRouteLeave: function beforeRouteLeave(to, from, next) {
    next();
  },

  methods: {
    setReadNumIncById: function setReadNumIncById() {
      //阅读数
      this.$http.post('/Column/setReadNumIncById', {
        columnId: this.columnId
      }, { emulateJSON: true }).then(function (res) {
        if (res.body.code == 0) {}
      });
    },
    isBuyFun: function isBuyFun(type) {
      console.log(type);
      this.columnData.isBuy = type;
      this.columnData.isBuy = type;
    },
    config: function config() {
      var _this = this;

      wx.ready(function () {
        _this.wxShare([{ //分享到朋友圈
          title: _this.columnData.name,
          desc: _this.columnData.lead,
          imgUrl: _this.columnData.pic,
          link: window.location.origin + '/#/periodical/' + _this.columnId + '?shareId=1'
        }, {
          //分享给朋友
          title: _this.columnData.name,
          desc: _this.columnData.lead,
          imgUrl: _this.columnData.pic,
          link: window.location.origin + '/#/periodical/' + _this.columnId + '?shareId=1'
        }], function () {});
      });
    },
    BuyPopupFun: function BuyPopupFun(type) {
      //订阅
      this.showBuyPopup = type;
    },
    timeFn: function timeFn(time) {
      //yy-mm-dd转成m月d日
      var strTime = time.substr(5, 5);
      strTime = strTime.split('-');
      for (var i = 0; i < strTime.length; i++) {
        if (strTime[i][0] == 0) {
          strTime[i] = strTime[i].replace(/0/g, '');
        }
      }
      var text = strTime[0] + "\u6708" + strTime[1] + "\u65E5";
      return text;
    },
    getViewPointList: function getViewPointList(type) {
      var _this2 = this;

      //获取观点列表
      if (type == 1) {
        //type 1:专题观点(轮播)
        this.listParams.pageNo = 1;
        this.listParams.perPage = 200;
        this.listParams.type = type;
        this.listParams.orderBy = 'start_time  asc,id desc';
      }
      this.listParams.column_id = this.columnId;

      this.$http.post(this.hostUrl + '/Viewpoint/getViewPointList', this.listParams, { emulateJSON: true }).then(function (res) {
        if (res.body.code == 200) {
          if (type) {
            _this2.swiperList = res.body.data;
          } else {
            _this2.viewPointList = res.body.data;
            _this2.$refs.child.getGeneralizelist();
            if (res.body.data.length == 0) {
              //無數據
              _this2.getShowlist = false;
            }
          }

          _mintUi.Indicator.close();
          console.log(res.body.data.length);
          if (res.body.data.length > 5) {
            window.addEventListener('scroll', _this2.scrollHandle);
            _this2.headerHeight = $('.header').height();
          }
          if (res.body.data.length < 9) {
            _this2.loading = true;
            _this2.isEnd = true;
          }
          _this2.loading = false;
          _this2.isEnd = false;
        }
      });
    },
    loadMore: function loadMore() {
      var _this3 = this;

      // 加載更多
      this.loading = true;
      if (!this.isEnd) {
        this.listParams.pageNo++;
        delete this.listParams.type;
        this.listParams.orderBy = 'column_top_status desc,cateName desc,publish_time desc,id desc';
        setTimeout(function () {
          _this3.$http.post(_this3.hostUrl + '/Viewpoint/getViewPointList', _this3.listParams, { emulateJSON: true }).then(function (res) {
            //console.log('this.params', this.params);
            if (res.body.code == 200) {
              _this3.viewPointList = _this3.viewPointList.concat(res.body.data);
              if (res.body.data.length < 10) {
                _this3.isEnd = true;
              }
              _this3.loading = false;
            }
          });
        }, 300);
      }
    },
    addFocus: function addFocus() {
      var _this4 = this;

      //关注、取消关注接口
      var type = this.isFocus ? '0' : '1'; //type    关注或取关 1关注 0取消关注
      this.$http.post('/Focus/addFocus', {
        user_id: this.userId,
        live_id: this.columnId,
        type: type,
        target: 2
      }, { emulateJSON: true }).then(function (res) {
        (0, _mintUi.Toast)("" + res.body.msg);
        if (res.body.code == 0) {
          _this4.isFocus = !_this4.isFocus;
        }
      });
    },
    getColumnById: function getColumnById() {
      var _this5 = this;

      //根据栏目id获取栏目信息
      this.$http.post('/Column/getColumnById', { columnId: this.columnId }, { emulateJSON: true }).then(function (res) {
        if (res.body.code == 200) {
          _this5.columnData = res.body.data;
          _this5.isFocus = res.body.data.isFocus;
          _this5.chargeData = res.body.data.cyclePriceInfo;
          _this5.$store.commit("setTitle", _this5.columnData.name);
          if (res.body.data.name == '潜伏机会') {
            _this5.getViewPointList(1);
          }
          _this5.config();
        }
      });
    },
    scrollHandle: function scrollHandle() {
      //是否固定头部
      var winScrollTop = document.body.scrollTop || document.documentElement.scrollTop || window.pageYOffset;
      if (winScrollTop > this.headerHeight) {
        this.isFix = true;
      } else {
        this.isFix = false;
      }
    }
  },
  watch: {
    $route: function $route(val) {
      //页面刷新，（改变路由参数时重新刷新数据）
      window.location.reload();
    }
  },
  components: {
    swiper: _vueAwesomeSwiper.swiper,
    chargeM: _chargeM2.default,
    nodata: _noincome2.default,
    ListM: _list2.default,
    nomore: _nomore2.default,
    Qrcode: _QrCode2.default
  }
};
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(49)))

/***/ })

});