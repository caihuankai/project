webpackJsonp([38],{

/***/ 1005:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.tabList .course-item {\n  padding: .32rem .24rem;\n  display: -webkit-box;\n  display: -webkit-flex;\n  display: -ms-flexbox;\n  display: flex;\n  border-bottom: 1px solid #e8e8e8;\n  line-height: 1;\n}\n.tabList .course-item .left {\n    /*overflow: hidden;*/\n    margin-right: .16rem;\n    position: relative;\n    float: left;\n    min-width: 2.6rem;\n}\n.tabList .course-item .left img {\n      width: 2.6rem;\n      height: 1.46rem;\n      min-width: 2rem;\n}\n.tabList .course-item .left span.series {\n      position: absolute;\n      top: 0;\n      left: 0;\n      width: .76rem;\n      height: .3rem;\n      font-size: .2rem;\n      color: #ffffff;\n      background: url(\"/images/college/Sign_xilie_ben.png\") no-repeat center center;\n      background-size: 100% 100%;\n}\n.tabList .course-item .left span.ppt {\n      position: absolute;\n      bottom: 0;\n      right: 0;\n      width: .6rem;\n      height: .4rem;\n      background: rgba(0, 0, 0, 0.3);\n      text-align: center;\n      line-height: .4rem;\n      color: #ffffff;\n      font-size: .2rem;\n}\n.tabList .course-item .left span.video {\n      position: absolute;\n      bottom: 0;\n      right: 0;\n      width: .6rem;\n      height: .4rem;\n      background: rgba(0, 0, 0, 0.3) url(\"/images/3.0/video_icon.png\") no-repeat center center;\n      background-size: 60%;\n}\n.tabList .course-item .right {\n    position: relative;\n    width: 100%;\n}\n.tabList .course-item .right > h5 {\n      font-size: .32rem;\n      line-height: 0.4rem;\n      height: 0.8rem;\n      color: #353535;\n      text-overflow: ellipsis;\n      display: -webkit-box;\n      -webkit-box-orient: vertical;\n      -webkit-line-clamp: 2;\n      overflow: hidden;\n}\n.tabList .course-item .right > h5 .top {\n        display: inline-block;\n        width: .66rem;\n        height: .32rem;\n        background: url(\"/images/college/zhiding_ben.png\") no-repeat;\n        background-size: 100% 100%;\n        vertical-align: middle;\n        margin-right: .1rem;\n        margin-top: -.08rem;\n}\n.tabList .course-item .right .num {\n      color: #888888;\n      font-size: .24rem;\n      margin: .1rem 0;\n}\n.tabList .course-item .right .num h4 {\n        float: left;\n        padding-left: .3rem;\n        background: url(\"/images/3.0/icon-03.png\") no-repeat left center;\n        background-size: .26rem .2rem;\n}\n.tabList .course-item .right .num p {\n        float: right;\n}\n.tabList .course-item .right .name {\n      color: #888888;\n      font-size: .24rem;\n}\n.tabList .course-item .right .name h4 {\n        float: left;\n        font-size: .2rem;\n}\n.tabList .course-item .right .name p {\n        float: right;\n        font-size: .24rem;\n}\n.tabList .course-item .right .name p.price {\n          color: #ff3229;\n          padding-left: .3rem;\n          background: url(\"/images/college/icon_youhuijiage_ben.png\") no-repeat left center;\n          background-size: .2rem .22rem;\n}\n.tabList .course-item .right .name p.lock {\n          color: #ff3229;\n          padding-left: .3rem;\n          background: url(\"/images/college/icon_simikecheng_ben.png\") no-repeat left center;\n          background-size: .18rem .22rem;\n}\n", ""]);

// exports


/***/ }),

/***/ 1099:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1273)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(935),
  /* template */
  __webpack_require__(1163),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\subcomponents\\course\\tabList.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] tabList.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-4861755d", Component.options)
  } else {
    hotAPI.reload("data-v-4861755d", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 1119:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('main', {
    staticClass: "seriesLesson"
  }, [_c('section', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.bannerData.length > 0),
      expression: "bannerData.length>0"
    }],
    staticClass: "top-banner"
  }, [_c('mt-swipe', {
    attrs: {
      "auto": 3000,
      "options": _vm.topBannerSwiperOption
    }
  }, _vm._l((_vm.bannerData), function(item) {
    return _c('mt-swipe-item', {
      key: item.adId
    }, [_c('a', {
      style: ({
        'background-image': ("url('" + (item.imgUrl) + "')")
      }),
      attrs: {
        "href": "javascript:;"
      },
      on: {
        "click": function($event) {
          _vm.bannerClick(item)
        }
      }
    })])
  }))], 1), _vm._v(" "), (_vm.siftData.length != 0) ? _c('section', {
    staticClass: "sift-course"
  }, [_vm._m(0), _vm._v(" "), [_c('tabList', {
    attrs: {
      "siftData": _vm.siftData
    }
  })]], 2) : _vm._e(), _vm._v(" "), _c('div', {
    staticClass: "line"
  }), _vm._v(" "), _c('section', {
    staticClass: "seriesType"
  }, [_c('ul', {
    staticClass: "page-part",
    attrs: {
      "id": "ul"
    },
    model: {
      value: (_vm.selected),
      callback: function($$v) {
        _vm.selected = $$v
      },
      expression: "selected"
    }
  }, [_c('li', [_c('span', {
    class: {
      active: _vm.selected == 1
    },
    on: {
      "click": _vm.lef
    }
  }, [_vm._v("精品课")])]), _vm._v(" "), _c('li', [_c('span', {
    class: {
      active: _vm.selected == 2
    },
    on: {
      "click": _vm.lef
    }
  }, [_vm._v("基础课")])]), _vm._v(" "), _c('li', [_c('span', {
    class: {
      active: _vm.selected == 3
    },
    on: {
      "click": _vm.lef
    }
  }, [_vm._v("高级课")])])]), _vm._v(" "), _c('div', {
    staticClass: "box"
  }, [(_vm.selected == 1) ? [_c('tabList', {
    directives: [{
      name: "infinite-scroll",
      rawName: "v-infinite-scroll",
      value: (_vm.loadMore),
      expression: "loadMore"
    }],
    attrs: {
      "siftData": _vm.fineSeriesList,
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
  }), _vm._v(" "), _c('span', [_vm._v("正在加载")])], 1), _vm._v(" "), (_vm.fineSeriesList.length == 0) ? [_c('p', {
    staticClass: "noText"
  }, [_vm._v("暂无课程")])] : [_c('nomore', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.isEnd),
      expression: "isEnd"
    }],
    attrs: {
      "text": "没有更多啦"
    }
  })]] : _vm._e(), _vm._v(" "), (_vm.selected == 2) ? [_c('tabList', {
    directives: [{
      name: "infinite-scroll",
      rawName: "v-infinite-scroll",
      value: (_vm.loadMore),
      expression: "loadMore"
    }],
    attrs: {
      "siftData": _vm.fineSeriesList,
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
  }), _vm._v(" "), _c('span', [_vm._v("正在加载")])], 1), _vm._v(" "), (_vm.fineSeriesList.length == 0) ? [_c('p', {
    staticClass: "noText"
  }, [_vm._v("暂无课程")])] : [_c('nomore', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.isEnd),
      expression: "isEnd"
    }],
    attrs: {
      "text": "没有更多啦"
    }
  })]] : _vm._e(), _vm._v(" "), (_vm.selected == 3) ? [_c('tabList', {
    directives: [{
      name: "infinite-scroll",
      rawName: "v-infinite-scroll",
      value: (_vm.loadMore),
      expression: "loadMore"
    }],
    attrs: {
      "siftData": _vm.fineSeriesList,
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
  }), _vm._v(" "), _c('span', [_vm._v("正在加载")])], 1), _vm._v(" "), (_vm.fineSeriesList.length == 0) ? [_c('p', {
    staticClass: "noText"
  }, [_vm._v("暂无课程")])] : [_c('nomore', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.isEnd),
      expression: "isEnd"
    }],
    attrs: {
      "text": "没有更多啦"
    }
  })]] : _vm._e()], 2)])])
},staticRenderFns: [function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "title"
  }, [_c('i', [_vm._v("推荐")])])
}]}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-0ae75d6e", module.exports)
  }
}

/***/ }),

/***/ 1163:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "tabList"
  }, _vm._l((_vm.siftData), function(item, index) {
    return _c('a', {
      key: item.id,
      staticClass: "course-item",
      on: {
        "click": function($event) {
          _vm.bannerClick(item.jumpUrl)
        }
      }
    }, [_c('div', {
      staticClass: "left"
    }, [_c('img', {
      attrs: {
        "src": item.imgUrl,
        "alt": ""
      }
    }), _vm._v(" "), _c('span', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (item.type == 2),
        expression: "item.type == 2"
      }],
      staticClass: "series"
    }), _vm._v(" "), _c('span', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (item.form == 3),
        expression: "item.form == 3"
      }],
      staticClass: "ppt"
    }, [_vm._v("PPT")]), _vm._v(" "), _c('span', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (item.form == 2),
        expression: "item.form == 2"
      }],
      staticClass: "video"
    })]), _vm._v(" "), _c('div', {
      staticClass: "right"
    }, [_c('h5', [(item.isTop) ? _c('span', {
      staticClass: "top"
    }) : _vm._e(), _vm._v("\n                " + _vm._s(item.title) + "\n            ")]), _vm._v(" "), _c('div', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (item.relevanceType != 7),
        expression: " item.relevanceType!=7"
      }],
      staticClass: "num clearfix"
    }, [_c('h4', [_vm._v(_vm._s(item.study_total) + "人学过")]), _vm._v(" "), _c('p', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (item.type == 2),
        expression: "item.type == 2"
      }]
    }, [_vm._v("已更新" + _vm._s(item.update_total) + "节 | 共" + _vm._s(item.plan_num) + "节")])]), _vm._v(" "), _c('div', {
      staticClass: "name clearfix"
    }, [_c('h4', [_vm._v(_vm._s(item.alias))]), _vm._v(" "), _c('p', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (item.level == 2),
        expression: "item.level == 2"
      }],
      staticClass: "price"
    }, [_vm._v(_vm._s(item.price))]), _vm._v(" "), _c('p', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (item.level == 1),
        expression: "item.level == 1"
      }],
      staticClass: "lock"
    }, [_vm._v("私密课程")])])])])
  }))
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-4861755d", module.exports)
  }
}

/***/ }),

/***/ 1232:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(961);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("8e8a6402", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-0ae75d6e\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./seriesLesson.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-0ae75d6e\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./seriesLesson.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 1273:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(1005);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("f88226d8", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-4861755d\",\"scoped\":false,\"hasInlineConfig\":true}!../../../node_modules/sass-loader/lib/loader.js!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./tabList.vue", function() {
     var newContent = require("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-4861755d\",\"scoped\":false,\"hasInlineConfig\":true}!../../../node_modules/sass-loader/lib/loader.js!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./tabList.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 423:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1232)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(848),
  /* template */
  __webpack_require__(1119),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\course\\seriesLesson.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] seriesLesson.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-0ae75d6e", Component.options)
  } else {
    hotAPI.reload("data-v-0ae75d6e", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 848:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _vuex = __webpack_require__(70);

var _mintUi = __webpack_require__(54);

var _nomore = __webpack_require__(135);

var _nomore2 = _interopRequireDefault(_nomore);

var _tabList = __webpack_require__(1099);

var _tabList2 = _interopRequireDefault(_tabList);

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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
            sharelogo: '/images/college/logo.png', //分享logo
            topBannerSwiperOption: {
                //头部轮播
                // notNextTick: true,
                slidesPerView: 1,
                // centeredSlides: true,
                // initialSlide: 0,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false
                },

                speed: 300,
                // loop: false,

                pagination: {
                    el: ".swiper-pagination"
                    // clickable: true
                }
                // autoplayDisableOnInteraction: false
            },
            bannerData: [], //轮播图数据
            siftData: [], //推荐数据
            fineSeriesList: [], //列表数据
            selected: 1, //0精品课  1基础课 2高级课
            page: 1, //页码
            limit: 10, //
            loading: false,
            isEnd: false
        };
    },

    computed: (0, _vuex.mapState)({
        userId: function userId(state) {
            return state.userInfo.user_id;
        }
    }),
    created: function created() {
        this.$store.commit('setTitle', '系列课');
        this.$store.commit('hideTabber');
        this.getBannerData();
        this.getCourseList();
        this.getFineSeriesCourse();
        this.config();
    },

    methods: {
        config: function config() {
            var _this = this;

            wx.ready(function () {
                _this.wxShare([{ //分享到朋友圈
                    title: '99系列课',
                    desc: '理论分析+实战运用，构建专属您的操盘交易知识体系。',
                    imgUrl: window.location.origin + _this.sharelogo,
                    link: window.location.origin + '/#/seriesLesson?shareId=1'
                }, {
                    //分享给朋友

                    title: '99系列课',
                    desc: '理论分析+实战运用，构建专属您的操盘交易知识体系。',
                    imgUrl: window.location.origin + _this.sharelogo,
                    link: window.location.origin + '/#/seriesLesson?shareId=1'
                }], function () {});
            });
        },
        loadMore: function loadMore() {
            var _this2 = this;

            // 加載更多
            this.loading = true;
            if (!this.isEnd) {
                this.page++;
                this.limit = 10;
                setTimeout(function () {
                    _this2.getFineSeriesCourse();
                }, 1000);
            }
        },
        getFineSeriesCourse: function getFineSeriesCourse() {
            var _this3 = this;

            // 精品课 基础课 高级课  列表
            this.$http.get('/College/getFineSeriesCourse', {
                params: {
                    type: this.selected, // 1：精品课 2：基础课 3：高级课
                    page: this.page,
                    limit: this.limit
                }
            }).then(function (res) {
                console.log('系列课推荐', res.body);
                if (res.body.code == 200) {
                    _this3.fineSeriesList = _this3.fineSeriesList.concat(res.body.data);
                    console.log(_this3.fineSeriesList.length);

                    if (res.body.data.length < _this3.limit) {
                        _this3.loading = true;
                        _this3.isEnd = true;
                    } else {
                        _this3.loading = false;
                        _this3.isEnd = false;
                    }
                }
            });
        },
        getCourseList: function getCourseList() {
            var _this4 = this;

            //系列课推荐
            this.$http.get('/College/getCourseList', {
                params: {
                    type: 18 //10：99学院首页-最新，11：99学院首页-五分钟解盘，12：99学院首页-热门学习，13：99学院首页-本周热销，15：专题课列表-专题研究，16：专题课列表-回顾，18：系列课列表-推荐，21：特训班列表-最新，22：特训班列表-回顾'
                }
            }).then(function (res) {
                console.log('系列课推荐', res.body);
                if (res.body.code == 200) {
                    _this4.siftData = res.body.data;
                }
            });
        },
        getBannerData: function getBannerData() {
            var _this5 = this;

            //获取轮播图数据
            this.$http.get('/College/getBanner', {
                params: {
                    type: 17 //9：99学院banner,14：专题课列表-banner，17：系列课列表-banner，20：特训班列表-banner，
                }
            }).then(function (res) {
                console.log('轮播图', res.body);
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
                    console.log(res.body);
                }
            });
        },
        lef: function lef(e) {
            var selectText = e.target.firstChild.nodeValue;
            if (selectText == '精品课' && this.selected != 1) {
                this.selected = 1;
                this.page = 1;
                this.fineSeriesList = [];
                this.getFineSeriesCourse();
            } else if (selectText == '基础课' && this.selected != 2) {
                this.selected = 2;
                this.page = 1;
                this.fineSeriesList = [];
                this.getFineSeriesCourse();
            } else if (selectText == '高级课' && this.selected != 3) {
                this.selected = 3;
                this.page = 1;
                this.fineSeriesList = [];
                this.getFineSeriesCourse();
            }
        }
    },
    components: {
        nomore: _nomore2.default,
        tabList: _tabList2.default
    }
};

/***/ }),

/***/ 935:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _vuex = __webpack_require__(70);

exports.default = {
    props: ['siftData'],
    data: function data() {
        return {};
    },
    created: function created() {
        console.log(this.siftData);
    },

    computed: (0, _vuex.mapState)({
        userId: function userId(state) {
            return state.userInfo.user_id;
        },
        isWeiXin: function isWeiXin(state) {
            return state.isWeiXin;
        }
    }),
    methods: {
        bannerClick: function bannerClick(obj) {
            location.href = obj;
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

/***/ }),

/***/ 961:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.seriesLesson .line {\n  height: .24rem;\n  width: 100%;\n  clear: both;\n  background: #f5f7f8;\n}\n.seriesLesson .top-banner {\n  height: 3rem;\n  position: relative;\n}\n.seriesLesson .top-banner .mint-swipe-indicators {\n    width: 90%;\n    text-align: center;\n    bottom: 10px;\n}\n.seriesLesson .top-banner .mint-swipe-indicator {\n    width: .1rem;\n    height: .1rem;\n    border-radius: .1rem;\n    opacity: 1;\n    background-color: #888;\n}\n.seriesLesson .top-banner .mint-swipe-indicator.is-active {\n    background-color: #fff;\n    width: .16rem;\n    border-radius: 0.2rem;\n}\n.seriesLesson .top-banner .mint-swipe-item a {\n    display: block;\n    width: 100%;\n    height: 100%;\n    background-position: center bottom;\n    background-size: cover;\n    background-repeat: no-repeat;\n}\n.seriesLesson .sift-course {\n  background: #ffffff;\n  height: auto;\n  overflow: hidden;\n}\n.seriesLesson .sift-course .title {\n    padding: .29rem .24rem 0 .24rem;\n}\n.seriesLesson .sift-course .title i {\n      font-size: .28rem;\n      color: #1c0808;\n}\n.seriesLesson .sift-course .title i::before {\n        content: '';\n        display: inline-block;\n        width: .05rem;\n        height: .34rem;\n        background-color: #ff3229;\n        border-radius: 2px;\n        vertical-align: middle;\n        margin-right: .06rem;\n}\n.seriesLesson .sift-course .title span {\n      color: #bb7676;\n      float: right;\n      position: relative;\n      padding-right: .26rem;\n      font-size: .28rem;\n}\n.seriesLesson .sift-course .title span::after {\n        border: 1px solid #c8c8cd;\n        border-bottom-width: 0;\n        border-left-width: 0;\n        content: \" \";\n        top: 54%;\n        right: 0;\n        position: absolute;\n        width: .14rem;\n        height: .14rem;\n        -webkit-transform: translateY(-50%) rotate(45deg);\n            -ms-transform: translateY(-50%) rotate(45deg);\n                transform: translateY(-50%) rotate(45deg);\n}\n.seriesLesson .seriesType {\n  margin-bottom: .24rem;\n  background: #fff;\n  height: auto;\n  overflow: hidden;\n}\n.seriesLesson .seriesType .page-part {\n    border-bottom: 1px solid #f4f4f4;\n    font-size: 0.32rem;\n    background-color: #fff;\n}\n.seriesLesson .seriesType .page-part li {\n      background-color: transparent;\n      width: 33.33333%;\n      height: 0.94rem;\n      line-height: 0.94rem;\n      float: left;\n      text-align: center;\n}\n.seriesLesson .seriesType .page-part li span {\n        display: inline-block;\n        height: 0.7rem;\n        line-height: 0.7rem;\n        font-size: 0.32rem;\n        color: #333;\n}\n.seriesLesson .seriesType .page-part li span.active {\n          color: #c62f2f;\n          border-bottom: 2px solid #c62f2f;\n}\n.seriesLesson .seriesType .page-part li span:active, .seriesLesson .seriesType .page-part li span:hover {\n          background-color: transparent;\n}\n.seriesLesson .seriesType .page-part .is-selected {\n      color: #5f86fd;\n}\n.seriesLesson .seriesType .page-part .is-selected span {\n        /* border-bottom: 2px solid rgb(95, 134, 253);*/\n}\n.seriesLesson .seriesType .page-part .border-line {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      width: 25%;\n      position: absolute;\n      bottom: 0.08rem;\n      left: 0;\n      z-index: 111;\n      -webkit-box-pack: center;\n      -webkit-justify-content: center;\n          -ms-flex-pack: center;\n              justify-content: center;\n      text-align: center;\n}\n.seriesLesson .seriesType .page-part .border-line span {\n        display: inline-block;\n        width: 0.5rem;\n        border-radius: 2px;\n        background-color: #c62f2f;\n        height: 0.06rem;\n}\n.seriesLesson .seriesType .box {\n    background: #fff;\n}\n.seriesLesson .seriesType .box .noText {\n      text-align: center;\n      height: 40px;\n      line-height: 40px;\n      display: block;\n      clear: both;\n      font-size: 0.26rem;\n      color: #b2b2b2;\n}\n", ""]);

// exports


/***/ })

});