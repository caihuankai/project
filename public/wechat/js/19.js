webpackJsonp([19],{

/***/ 1151:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('main', {
    staticClass: "train-course"
  }, [(_vm.bannerData.length > 0) ? _c('section', {
    staticClass: "top-banner"
  }, [
    [_c('swiper', {
      ref: "mySwiper",
      attrs: {
        "options": _vm.topBannerSwiperOption
      }
    }, [_vm._l((_vm.bannerData), function(item) {
      return _c('swiper-slide', {
        key: item.id
      }, [_c('div', {
        staticClass: "hotImg"
      }, [_c('a', {
        attrs: {
          "href": "javascript:;"
        }
      }, [_c('p', {
        style: ({
          'background-image': 'url(' + item.imgUrl + ')'
        }),
        on: {
          "click": function($event) {
            _vm.bannerClick(item)
          }
        }
      })])])])
    }), _vm._v(" "), _c('div', {
      staticClass: "swiper-pagination",
      slot: "pagination"
    })], 2)]
  ], 2) : _vm._e(), _vm._v(" "), (_vm.newestData.length > 0) ? _c('section', {
    staticClass: "part-newest"
  }, [_vm._m(0), _vm._v(" "), _c('course-progress', {
    attrs: {
      "listData": _vm.newestData
    }
  })], 1) : _vm._e(), _vm._v(" "), (_vm.reviewData.length > 0) ? _c('section', {
    staticClass: "part-newest"
  }, [_vm._m(1), _vm._v(" "), _c('course-card', {
    directives: [{
      name: "infinite-scroll",
      rawName: "v-infinite-scroll",
      value: (_vm.loadMore),
      expression: "loadMore"
    }],
    attrs: {
      "listData": _vm.reviewData,
      "infinite-scroll-disabled": "loading",
      "infinite-scroll-distance": "250",
      "infinite-scroll-immediate-check": "false"
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
  })], 1) : _vm._e()])
},staticRenderFns: [function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "part-title"
  }, [_c('p', [_vm._v("最新")])])
},function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "part-title"
  }, [_c('p', [_vm._v("回顾")])])
}]}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-324b43f4", module.exports)
  }
}

/***/ }),

/***/ 1262:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(993);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("242ccea8", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-324b43f4\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./trainCourseList.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-324b43f4\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./trainCourseList.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 418:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1262)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(841),
  /* template */
  __webpack_require__(1151),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\college\\trainCourseList.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] trainCourseList.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-324b43f4", Component.options)
  } else {
    hotAPI.reload("data-v-324b43f4", Component.options)
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

/***/ 796:
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

exports.default = {
    props: ['listData'],
    methods: {
        cardClick: function cardClick(url) {
            window.location = url;
        }
    }
};

/***/ }),

/***/ 797:
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
//
//

exports.default = {
  props: ["listData"],
  methods: {
    timePast: function timePast(endTime) {
      //判断报名截止时间是否已过
      var now = new Date();
      var time = new Date(endTime.split("-").join("/"));
      if (time < now) {
        return true;
      } else {
        return false;
      }
    },
    computedPercent: function computedPercent(num, total) {
      var per = "";
      if (num != null && total != null) {
        if (num > total) {
          per = 100;
        } else {
          per = (num / total * 100).toString().substr(0, 2);
        }
        return per;
      } else {
        return 100;
      }
    },
    computedTime: function computedTime(time) {
      //2018-12-12 转换为 2018.12.12
      return time.substr(0, 10).split("-").join(".");
    },
    jumpClick: function jumpClick(url, endTime) {
      window.location = url;
      /*if(!this.timePast(endTime)){//报名时间未过时跳转
                  }*/
    }
  }
};

/***/ }),

/***/ 804:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.course-progress .progress-box[data-v-05421699] {\n  padding: 0 0.24rem;\n  background: #ffffff;\n}\n.course-progress .hotLearn-item[data-v-05421699] {\n  padding: 0.32rem 0;\n  border-bottom: 1px solid #e8e8e8;\n  width: 100%;\n  display: -webkit-box;\n  display: -webkit-flex;\n  display: -ms-flexbox;\n  display: flex;\n}\n.course-progress .hotLearn-item[data-v-05421699]:first-child {\n    padding-top: 0;\n}\n.course-progress .hotLearn-item[data-v-05421699]:last-child {\n    border-bottom: 1px solid #ffffff;\n}\n.course-progress .hotLearn-item .cover[data-v-05421699] {\n    -webkit-box-flex: 1;\n    -webkit-flex: 1;\n        -ms-flex: 1;\n            flex: 1;\n    max-width: 2rem;\n    display: inline-block;\n    height: 2.4rem;\n    background-image: url(\"/images/college/ceshitu.png\");\n    background-size: 100% 100%;\n    position: relative;\n    margin-right: 0.24rem;\n}\n.course-progress .hotLearn-item .cover p[data-v-05421699] {\n      width: 100%;\n      font-size: 0.24rem;\n      color: #ffffff;\n      text-align: center;\n      background: rgba(0, 0, 0, 0.5);\n      padding: 0.14rem 0;\n      position: absolute;\n      left: 0;\n      bottom: 0;\n}\n.course-progress .hotLearn-item .cover p .red[data-v-05421699] {\n        color: #ff3229;\n}\n.course-progress .hotLearn-item .info[data-v-05421699] {\n    width: -webkit-calc(100% - 2.24rem);\n    width: calc(100% - 2.24rem);\n    -webkit-box-flex: 1;\n    -webkit-flex: 1;\n        -ms-flex: 1;\n            flex: 1;\n}\n.course-progress .hotLearn-item .info h1[data-v-05421699] {\n      font-size: 0.32rem;\n      color: #353535;\n      display: -webkit-box;\n      -webkit-box-orient: vertical;\n      -webkit-line-clamp: 2;\n      overflow: hidden;\n      min-height: 0.72rem;\n}\n.course-progress .hotLearn-item .info h1 .hot-icon[data-v-05421699] {\n        display: inline-block;\n        width: 0.25rem;\n        height: 0.31rem;\n        background: url(\"/images/college/icon_hot_ben.png\") no-repeat center center;\n        background-size: 100% 100%;\n        vertical-align: middle;\n        margin-right: 0.12rem;\n        margin-top: -0.08rem;\n}\n.course-progress .hotLearn-item .info .plan[data-v-05421699] {\n      margin: 0.3rem 0;\n}\n.course-progress .hotLearn-item .info .plan .num[data-v-05421699] {\n        font-size: 0.24rem;\n        color: #ff3229;\n}\n.course-progress .hotLearn-item .info .plan .num p[data-v-05421699]:first-child {\n          /*float: left;*/\n}\n.course-progress .hotLearn-item .info .plan .num p[data-v-05421699]:last-child {\n          float: right;\n          margin-bottom: 0.12rem;\n}\n.course-progress .hotLearn-item .info .plan .bar[data-v-05421699] {\n        width: 100%;\n        height: 0.14rem;\n        background: #ffe5e5;\n        border-radius: 7px;\n        margin-top: 0.12rem;\n        position: relative;\n}\n.course-progress .hotLearn-item .info .plan .bar .active[data-v-05421699] {\n          position: absolute;\n          left: 0;\n          top: 0;\n          width: 80%;\n          height: 100%;\n          border-radius: 7px;\n          background: -webkit-linear-gradient(left, #ff1163, #ff1014);\n          background: linear-gradient(to right, #ff1163, #ff1014);\n}\n.course-progress .hotLearn-item .info .time[data-v-05421699] {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n}\n.course-progress .hotLearn-item .info .time > div[data-v-05421699] {\n        -webkit-box-flex: 1;\n        -webkit-flex: 1;\n            -ms-flex: 1;\n                flex: 1;\n        font-size: 0.24rem;\n}\n.course-progress .hotLearn-item .info .time > div p[data-v-05421699] {\n          color: #888888;\n          margin-bottom: 0.1rem;\n}\n.course-progress .hotLearn-item .info .time > div h5[data-v-05421699] {\n          color: #353535;\n}\n.course-progress .hotLearn-item .info .time > div .btn[data-v-05421699] {\n          width: 100%;\n          height: 0.6rem;\n          background: #888888;\n          color: #ffffff;\n          display: block;\n          line-height: 0.6rem;\n          text-align: center;\n}\n.course-progress .hotLearn-item .info .time > div .btn.active[data-v-05421699] {\n            background: #ff3229;\n}\n", ""]);

// exports


/***/ }),

/***/ 808:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.course-card[data-v-90582008] {\n  background: #FFFFFF;\n  padding: 0 .24rem .24rem .24rem;\n}\n.course-card .card-item[data-v-90582008] {\n    background: #F5F4F2;\n    margin-bottom: .24rem;\n    position: relative;\n}\n.course-card .card-item .cover[data-v-90582008] {\n      width: 100%;\n      /*height: 1.68rem;*/\n      position: relative;\n      background-image: url(\"/images/college/courseBg.png\");\n      background-repeat: no-repeat;\n      background-position: center center;\n      background-size: cover;\n}\n.course-card .card-item .cover img[data-v-90582008] {\n        width: 100%;\n}\n.course-card .card-item .cover h2[data-v-90582008] {\n        font-size: .32rem;\n        color: #fff;\n        padding-left: .24rem;\n        position: absolute;\n        left: 0;\n        bottom: .24rem;\n}\n.course-card .card-item .cover .tag[data-v-90582008] {\n        width: .79rem;\n        height: .79rem;\n        position: absolute;\n        top: 0;\n        right: 0;\n}\n.course-card .card-item .cover .tag.hot[data-v-90582008] {\n          background: url(\"/images/college/superscript_hot_ben.png\") no-repeat center center;\n          background-size: 100% 100%;\n}\n.course-card .card-item .cover .tag.prevue[data-v-90582008] {\n          background: url(\"/images/college/superscript_yugao_ben.png\") no-repeat center center;\n          background-size: 100% 100%;\n}\n.course-card .card-item .info[data-v-90582008] {\n      padding-left: .24rem;\n      line-height: .6rem;\n      height: .6rem;\n}\n.course-card .card-item .info .icon[data-v-90582008] {\n        width: .76rem;\n        height: .3rem;\n        display: inline-block;\n        vertical-align: middle;\n        background: #F5F4F2;\n        margin-right: .1rem;\n}\n.course-card .card-item .info .icon.special-icon[data-v-90582008] {\n          background: url(\"/images/college/Sign_zhuanti_ben.png\") no-repeat center center;\n          background-size: 100% 100%;\n}\n.course-card .card-item .info .icon.series-icon[data-v-90582008] {\n          background: url(\"/images/college/Sign_xilie_ben.png\") no-repeat center center;\n          background-size: 100% 100%;\n}\n.course-card .card-item .info .icon.train-icon[data-v-90582008] {\n          background: url(\"/images/college/Sign_texun_ben.png\") no-repeat center center;\n          background-size: 100% 100%;\n}\n.course-card .card-item .info p[data-v-90582008] {\n        display: inline-block;\n        font-size: .24rem;\n        color: #353535;\n}\n.course-card .card-item .info p span[data-v-90582008] {\n          margin-right: .16rem;\n}\n.course-card .card-item .info p .red[data-v-90582008] {\n          color: #ff3229;\n}\n", ""]);

// exports


/***/ }),

/***/ 814:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(831)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(796),
  /* template */
  __webpack_require__(825),
  /* styles */
  injectStyle,
  /* scopeId */
  "data-v-90582008",
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\subcomponents\\college\\course-card.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] course-card.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-90582008", Component.options)
  } else {
    hotAPI.reload("data-v-90582008", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 815:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(828)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(797),
  /* template */
  __webpack_require__(821),
  /* styles */
  injectStyle,
  /* scopeId */
  "data-v-05421699",
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\subcomponents\\college\\course-progress.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] course-progress.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-05421699", Component.options)
  } else {
    hotAPI.reload("data-v-05421699", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 821:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('main', {
    staticClass: "course-progress"
  }, [_c('div', {
    staticClass: "progress-box"
  }, _vm._l((_vm.listData), function(item, index) {
    return _c('section', {
      staticClass: "hotLearn-item"
    }, [_c('section', {
      staticClass: "cover",
      style: ({
        'background-image': ("url(" + (item.imgUrl) + ")")
      })
    }, [_c('p', [_c('i', {
      staticClass: "red"
    }, [_vm._v(_vm._s(item.enroll_total))]), _vm._v(" 人报名")])]), _vm._v(" "), _c('section', {
      staticClass: "info"
    }, [_c('h1', [_c('span', {
      staticClass: "hot-icon"
    }), _vm._v(_vm._s(item.title))]), _vm._v(" "), _c('div', {
      staticClass: "plan"
    }, [_c('div', {
      staticClass: "num"
    }, [_c('span', [_vm._v("招募人数：" + _vm._s(item.enroll_max_num))]), _vm._v(" "), _c('p', [_vm._v("剩余：" + _vm._s(100 - item.enroll_percent) + "%")])]), _vm._v(" "), _c('div', {
      staticClass: "bar"
    }, [_c('div', {
      staticClass: "active",
      style: ({
        'width': item.enroll_percent + '%'
      })
    })])]), _vm._v(" "), _c('div', {
      staticClass: "time"
    }, [_c('div', [_c('p', [_vm._v("截止时间")]), _vm._v(" "), _c('h5', [_vm._v(_vm._s(_vm.computedTime(item.end_enroll_time)))])]), _vm._v(" "), _c('div', [_c('p', [_vm._v("开课时间")]), _vm._v(" "), _c('h5', [_vm._v(_vm._s(_vm.computedTime(item.begin_time)))])]), _vm._v(" "), _c('div', [_c('a', {
      staticClass: "btn",
      class: {
        'active': !_vm.timePast(item.end_enroll_time)
      },
      on: {
        "click": function($event) {
          _vm.jumpClick(item.jumpUrl, item.end_enroll_time)
        }
      }
    }, [_vm._v(_vm._s(_vm.timePast(item.end_enroll_time) ? '报名已截止' : '立即报名'))])])])])])
  }))])
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-05421699", module.exports)
  }
}

/***/ }),

/***/ 825:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('main', {
    staticClass: "course-card"
  }, _vm._l((_vm.listData), function(item, index) {
    return _c('section', {
      staticClass: "card-item",
      on: {
        "click": function($event) {
          _vm.cardClick(item.jumpUrl)
        }
      }
    }, [_c('div', {
      staticClass: "cover"
    }, [_c('img', {
      attrs: {
        "src": item.imgUrl,
        "alt": ""
      }
    })]), _vm._v(" "), (item.relevanceType != 7) ? _c('div', {
      staticClass: "info"
    }, [_c('span', {
      staticClass: "icon",
      class: {
        'special-icon': item.type == 1, 'series-icon': item.type == 2, 'train-icon': item.type == 3
      }
    }), _vm._v(" "), (item.type == 1) ? _c('P', [_c('i', {
      staticClass: "red"
    }, [_vm._v(_vm._s(item.study_total))]), _vm._v("人已学习")]) : (item.type == 2) ? _c('P', [_c('span', [_vm._v("已更新" + _vm._s(item.update_total) + "节|共" + _vm._s(item.plan_num) + "节")]), _c('i', {
      staticClass: "red"
    }, [_vm._v(_vm._s(item.study_total))]), _vm._v("人已学习")]) : (item.type == 3) ? _c('P', [_c('span', [_vm._v("开课时间：" + _vm._s(item.begin_time ? item.begin_time.substr(0, 10).split('-').join('.') : item.begin_time))]), _c('i', {
      staticClass: "red"
    }, [_vm._v(_vm._s(item.enroll_total))]), _vm._v("人已报名")]) : _vm._e()], 1) : _vm._e()])
  }))
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-90582008", module.exports)
  }
}

/***/ }),

/***/ 828:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(804);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("06b8749d", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-05421699\",\"scoped\":true,\"hasInlineConfig\":true}!../../../node_modules/sass-loader/lib/loader.js!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./course-progress.vue", function() {
     var newContent = require("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-05421699\",\"scoped\":true,\"hasInlineConfig\":true}!../../../node_modules/sass-loader/lib/loader.js!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./course-progress.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 831:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(808);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("379df8dc", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-90582008\",\"scoped\":true,\"hasInlineConfig\":true}!../../../node_modules/sass-loader/lib/loader.js!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./course-card.vue", function() {
     var newContent = require("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-90582008\",\"scoped\":true,\"hasInlineConfig\":true}!../../../node_modules/sass-loader/lib/loader.js!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./course-card.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 841:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _vueAwesomeSwiper = __webpack_require__(136);

var _courseCard = __webpack_require__(814);

var _courseCard2 = _interopRequireDefault(_courseCard);

var _courseProgress = __webpack_require__(815);

var _courseProgress2 = _interopRequireDefault(_courseProgress);

var _nomore = __webpack_require__(135);

var _nomore2 = _interopRequireDefault(_nomore);

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

//    import {mapState} from 'vuex';
exports.default = {
    data: function data() {
        return {
            topBannerSwiperOption: {
                //头部轮播
                notNextTick: true,
                // spaceBetween: 0,
                slidesPerView: 1,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false
                },
                // width: window.innerWidth,
                speed: 300,
                loop: true,
                // effect: "coverflow",
                // centeredSlides: true,
                pagination: {
                    el: '.swiper-pagination'
                    // clickable: true
                }
                // autoplayDisableOnInteraction: false,
                // coverflow: {
                // 	// rotate: 50, // 旋转的角度
                // 	// stretch: 0, // 拉伸   图片间左右的间距和密集度
                // 	// depth: 0, // 深度   切换图片间上下的间距和密集度
                // 	// // modifier: 1, // 修正值 该值越大前面的效果越明显
                // 	// slideShadows: false // 页面阴影效果
                // 	rotate: 0, // 旋转的角度
                // 	stretch: 0, // 拉伸   图片间左右的间距和密集度
                // 	depth: 0, // 深度   切换图片间上下的间距和密集度
                // 	modifier: 1, // 修正值 该值越大前面的效果越明显
                // 	slideShadows: false // 页面阴影效果
                // }
            },
            bannerData: [],
            newestData: [],
            reviewData: [],
            params: {
                page: 1,
                limit: 10,
                type: 22
            },
            loading: false,
            isEnd: false,
            sharelogo: '/images/college/logo.png' //分享logo
        };
    },
    created: function created() {
        this.$store.commit('hideTabber');
        this.$store.commit('setTitle', '特训班');
        this.getBannerData();
        this.getNewestList();
        this.getReviewList();
        this.config();
    },

    methods: {
        config: function config() {
            var _this = this;

            wx.ready(function () {
                _this.wxShare([{ //分享到朋友圈
                    title: '99特训班',
                    desc: '实战特训+实时辅导，教您如何快速玩转股市。',
                    imgUrl: window.location.origin + _this.sharelogo,
                    link: window.location.origin + '/#/trainCourseList?shareId=1'
                }, {
                    //分享给朋友

                    title: '99特训班',
                    desc: '实战特训+实时辅导，教您如何快速玩转股市。',
                    imgUrl: window.location.origin + _this.sharelogo,
                    link: window.location.origin + '/#/trainCourseList?shareId=1'
                }], function () {});
            });
        },
        loadMore: function loadMore() {
            var _this2 = this;

            this.loading = true;
            if (!this.isEnd) {
                this.params.page++;
                setTimeout(function () {
                    _this2.getReviewList();
                }, 500);
            }
        },
        getReviewList: function getReviewList() {
            var _this3 = this;

            this.$http.post('/College/getCourseList', this.params, { emulateJSON: true }).then(function (res) {
                if (res.body.code == 200) {
                    _this3.reviewData = _this3.reviewData.concat(res.body.data);
                    _this3.loading = false;
                    if (res.body.data.length < _this3.params.limit) {
                        _this3.isEnd = true;
                        _this3.loading = true;
                    }
                }
            });
        },
        getNewestList: function getNewestList() {
            var _this4 = this;

            //type  10：99学院首页-最新，11：99学院首页-五分钟解盘，12：99学院首页-热门学习，13：99学院首页-本周热销，15：专题课列表-专题研究，16：专题课列表-回顾，18：系列课列表-推荐，21：特训班列表-最新，22：特训班列表-回顾',
            this.$http.post('/College/getCourseList', { type: 21 }, { emulateJSON: true }).then(function (res) {
                if (res.body.code == 200) {
                    _this4.newestData = res.body.data;
                }
            });
        },
        getBannerData: function getBannerData() {
            var _this5 = this;

            //获取轮播图数据
            this.$http.post('/College/getBanner', { type: 20 }, { emulateJSON: true }).then(function (res) {
                if (res.body.code == 200) {
                    _this5.bannerData = res.body.data;
                    _this5.$nextTick(function () {
                        window.scrollTo(0, 1);
                        window.scrollTo(0, 0);
                    });
                }
            });
        },
        bannerClick: function bannerClick(obj) {
            // 轮播图点击后记录点击情况后跳转

            this.$http.get(this.hostUrl + '/Index/addBannerNum/id/' + obj.id).then(function (res) {
                if (res.body.code == 200) {
                    location.href = obj.jumpUrl;
                } else {
                    location.href = obj.jumpUrl;
                }
            });
        }
    },
    components: {
        swiper: _vueAwesomeSwiper.swiper,
        swiperSlide: _vueAwesomeSwiper.swiperSlide,
        courseCard: _courseCard2.default,
        courseProgress: _courseProgress2.default,
        nomore: _nomore2.default
    }
};

/***/ }),

/***/ 993:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.train-course .top-banner {\n  height: 3rem;\n  position: relative;\n  margin: 0;\n}\n.train-course .top-banner .swiper-container {\n    height: 3rem;\n}\n.train-course .top-banner .hotImg {\n    height: 3rem;\n    position: relative;\n    width: 100%;\n    box-sizing: border-box;\n}\n.train-course .top-banner .hotImg a p {\n      width: 100%;\n      height: 100%;\n      background-size: 100% auto;\n      background-position: center bottom;\n}\n.train-course .top-banner .swiper-pagination {\n    text-align: center;\n    z-index: 5;\n    bottom: .24rem;\n    display: -webkit-box;\n    display: -webkit-flex;\n    display: -ms-flexbox;\n    display: flex;\n    -webkit-box-pack: center;\n    -webkit-justify-content: center;\n        -ms-flex-pack: center;\n            justify-content: center;\n    -webkit-box-align: center;\n    -webkit-align-items: center;\n        -ms-flex-align: center;\n            align-items: center;\n}\n.train-course .top-banner .swiper-pagination-bullet {\n    width: 0.1rem;\n    height: 0.1rem;\n    border-radius: 50%;\n    opacity: 1;\n    background-color: rgba(232, 232, 232, 0.6);\n    margin-right: 0;\n}\n.train-course .top-banner .swiper-pagination-bullet:last-child {\n      margin-right: 0.24rem;\n}\n.train-course .top-banner .swiper-pagination-bullet.swiper-pagination-bullet-active {\n    background-color: #fff;\n    width: 0.16rem;\n    height: 0.1rem;\n    border-radius: .2rem;\n}\n.train-course .top-banner .swiper-container {\n    height: 3rem;\n    width: 100%;\n}\n.train-course .top-banner .swiper-container a {\n      display: block;\n      width: auto;\n      height: 100%;\n      background-position: center bottom;\n      background-size: 100% auto;\n      background-repeat: no-repeat;\n      margin: 0 auto;\n      overflow: hidden;\n      box-sizing: border-box;\n}\n.train-course .top-banner .mint-swipe-indicators {\n    width: 90%;\n    text-align: right;\n    bottom: 15px;\n}\n.train-course .top-banner .mint-swipe-indicator {\n    width: 0.1rem;\n    height: 0.1rem;\n    border-radius: 0;\n    opacity: 1;\n    background-color: #888;\n}\n.train-course .top-banner .mint-swipe-indicator.is-active {\n    background-color: #c62f2f;\n    width: 0.1rem;\n}\n.train-course .top-banner .mint-swipe-item a {\n    display: block;\n    width: 100%;\n    height: 100%;\n    background-position: center center;\n    background-size: cover;\n    background-repeat: no-repeat;\n}\n.train-course .part-title {\n  line-height: .9rem;\n  height: .9rem;\n  padding: 0 .24rem;\n  font-size: .34rem;\n  color: #919599;\n  font-weight: bold;\n  background: #FFFFFF;\n}\n.train-course .part-title p {\n    padding-left: .17rem;\n    position: relative;\n}\n.train-course .part-title p::before {\n      content: '';\n      display: inline-block;\n      width: .05rem;\n      height: .34rem;\n      border-radius: 2px;\n      background: url(\"/images/college/seg_ben.png\") no-repeat center center;\n      background-size: 100% 100%;\n      position: absolute;\n      top: 34%;\n      left: 0;\n}\n.train-course .part-newest {\n  margin-bottom: .24rem;\n}\n", ""]);

// exports


/***/ })

});