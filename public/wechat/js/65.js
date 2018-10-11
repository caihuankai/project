webpackJsonp([65],{

/***/ 1129:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "live-recommend"
  }, [_c('div', {
    staticClass: "nav-tabber",
    class: {
      left: _vm.options == 1, right: _vm.options == 2
    }
  }, [_c('label', {
    attrs: {
      "for": "course"
    }
  }, [_c('input', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.options),
      expression: "options"
    }],
    attrs: {
      "type": "radio",
      "name": "nav",
      "id": "course",
      "value": "1"
    },
    domProps: {
      "checked": _vm.options == 1,
      "checked": _vm._q(_vm.options, "1")
    },
    on: {
      "__c": function($event) {
        _vm.options = "1"
      }
    }
  }), _vm._v(" "), _c('p', [_vm._v("课程")])]), _vm._v(" "), _c('label', {
    attrs: {
      "for": "viewpoint"
    }
  }, [_c('input', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.options),
      expression: "options"
    }],
    attrs: {
      "type": "radio",
      "name": "nav",
      "id": "viewpoint",
      "value": "2"
    },
    domProps: {
      "checked": _vm.options == 2,
      "checked": _vm._q(_vm.options, "2")
    },
    on: {
      "__c": function($event) {
        _vm.options = "2"
      }
    }
  }), _vm._v(" "), _c('p', [_vm._v("观点")])])]), _vm._v(" "), _c('div', {
    staticClass: "content-container",
    class: {
      'course-container': _vm.options == 1, 'view-container': _vm.options == 2
    }
  }, [(_vm.options == 1) ? _c('div', {
    directives: [{
      name: "infinite-scroll",
      rawName: "v-infinite-scroll",
      value: (_vm.courseLoadMore),
      expression: "courseLoadMore"
    }],
    staticClass: "course-list",
    attrs: {
      "infinite-scroll-disabled": _vm.courseLoading,
      "infinite-scroll-distance": 291
    }
  }, [_vm._l((_vm.courseList), function(item) {
    return _c('router-link', {
      key: item.id,
      staticClass: "course",
      attrs: {
        "to": ("/personalCenter/course/" + (item.id) + "&" + _vm.userInfoid)
      }
    }, [_c('div', {
      staticClass: "left"
    }, [_c('img', {
      attrs: {
        "src": (item.process_src_img || item.src_img) + '?imageView2/2/w/200',
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
    }, [_vm._v("系列课")]), _vm._v(" "), _c('span', {
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
    }, [_c('h5', [_vm._v(_vm._s(item.class_name))]), _vm._v(" "), _c('div', {
      staticClass: "num clearfix"
    }, [_c('h4', [_vm._v(_vm._s(item.study_num) + "人学过")]), _vm._v(" "), _c('p', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (item.type == 2),
        expression: "item.type == 2"
      }]
    }, [_vm._v("已更新" + _vm._s(item.admire_num) + "节 | 共" + _vm._s(item.plan_num) + "节")])]), _vm._v(" "), _c('div', {
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
  }), _vm._v(" "), (_vm.loaded && _vm.courseList.length == 0) ? _c('p', {
    staticClass: "nocontenttext"
  }, [_vm._v("暂无记录")]) : _vm._e()], 2) : (_vm.options == 2) ? _c('div', {
    directives: [{
      name: "infinite-scroll",
      rawName: "v-infinite-scroll",
      value: (_vm.viewLoadMore),
      expression: "viewLoadMore"
    }],
    staticClass: "view-list",
    attrs: {
      "infinite-scroll-disabled": _vm.viewLoading,
      "infinite-scroll-distance": 291
    }
  }, [(_vm.viewList.length > 0) ? _vm._l((_vm.viewList), function(item) {
    return _c('router-link', {
      key: item,
      staticClass: "view-item",
      class: {
        hot: item.top_status == 1, 'no-picture': item.imageList.length == 0, 'picture-1': item.imageList.length > 0 && item.imageList.length < 3, 'picture-3': item.imageList.length >= 3
      },
      attrs: {
        "to": '/personalSpace/viewpointDetail/' + item.id + '&' + _vm.userInfoid
      }
    }, [_c('div', {
      staticClass: "view-layer"
    }, [(item.imageList.length == 0) ? [_c('h5', {
      staticClass: "double-text",
      class: {
        pay: item.level == 1
      }
    }, [_vm._v(_vm._s(item.title))])] : (item.imageList.length > 0 && item.imageList.length < 3) ? [_c('div', {
      staticClass: "view-top flex"
    }, [_c('h5', {
      staticClass: "single-text",
      class: {
        pay: item.level == 1
      }
    }, [_vm._v(_vm._s(item.title))]), _vm._v(" "), _c('div', {
      staticClass: "img",
      style: ({
        'background-image': ("url('" + (item.imageList[0]) + "?imageView2/2/w/200')")
      })
    })])] : [_c('h5', {
      staticClass: "double-text",
      class: {
        pay: item.level == 1
      }
    }, [_vm._v(_vm._s(item.title))]), _vm._v(" "), _c('div', {
      staticClass: "img-box flex"
    }, _vm._l((3), function(i) {
      return _c('div', {
        key: i,
        staticClass: "img",
        style: ({
          'background-image': ("url('" + (item.imageList[i-1]) + "?imageView2/2/w/200')")
        })
      })
    }))], _vm._v(" "), _c('section', {
      staticClass: "info"
    }, [_c('img', {
      attrs: {
        "src": item.head_add,
        "alt": "头像"
      }
    }), _vm._v(" "), _c('section', {
      staticClass: "info-right"
    }, [_c('p', [_vm._v(_vm._s(item.alias))]), _vm._v(" "), _c('div', [_c('span', [_vm._v(_vm._s(_vm._f("formatTime")(item.publish_time)))]), _vm._v(" "), _c('span', {
      staticClass: "tag"
    }, [_vm._v(_vm._s(item.title_cate))]), _vm._v(" "), _c('div', {
      staticClass: "num"
    }, [_c('i'), _c('span', [_vm._v(_vm._s(item.study_num))]), _vm._v(" "), _c('i'), _c('span', [_vm._v(_vm._s(item.like_num))])])])])])], 2)])
  }) : _vm._e(), _vm._v(" "), (_vm.loaded && _vm.viewList.length == 0) ? _c('p', {
    staticClass: "nocontenttext"
  }, [_vm._v("暂无记录")]) : _vm._e()], 2) : _vm._e()])])
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-1167ff3c", module.exports)
  }
}

/***/ }),

/***/ 1242:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(971);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("67eb1d85", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-1167ff3c\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./onliveRecommend.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-1167ff3c\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./onliveRecommend.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 484:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1242)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(909),
  /* template */
  __webpack_require__(1129),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\personalCenter\\onliveRecommend.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] onliveRecommend.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-1167ff3c", Component.options)
  } else {
    hotAPI.reload("data-v-1167ff3c", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 909:
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
            options: '1', //选项，1为课程，2为观点
            coursePage: 1,
            courseList: [],
            courseLoading: true,
            courseEnd: false,
            viewList: [],
            viewLoading: true,
            viewEnd: false,
            viewPage: 1,
            loaded: false,
            courseId: this.$route.params.courseId
        };
    },

    computed: {
        userInfoid: function userInfoid() {
            return this.$store.state.userInfo.user_id;
        }
    },
    created: function created() {
        this.$store.commit('setTitle', '推荐区');
        this.$store.commit('hideTabber');
        this.getCourseList();
        this.getData();
    },

    filters: {
        formatTime: function formatTime(timeStr) {
            return timeStr.substr(5, 11);
        }
    },
    methods: {
        getData: function getData() {
            var _this = this;

            this.$http.get('/User/getUserLiveInfoByUserId/userId/' + this.$route.params.id).then(function (res) {
                wx.ready(function () {
                    //分享为直播间页面链接
                    _this.wxShare({
                        title: '我发现了一位很有料的投资大咖',
                        desc: '点击进入，与大咖近一步交流',
                        imgUrl: res.body.data.pic || '/images/default/userDefault.png',
                        link: window.location.origin + '/#/live/' + _this.$route.params.id + '&' + _this.userInfoid
                    });
                });
                wx.error();
            });
        },
        getCourseList: function getCourseList(flag) {
            var _this2 = this;

            if (flag) {
                this.courseList = [];
                this.coursePage = 1;
                this.courseLoading = true;
                this.courseEnd = false;
            }
            this.$http.post('/Course/getCourseRecommend', { userId: this.$route.params.id, pageNo: this.coursePage, perPage: 10, receiverType: 2, receiverId: this.courseId }, { emulateJSON: true }).then(function (res) {
                if (res.body.code == 200) {
                    _this2.loaded = true;
                    res = res.body;
                    _this2.courseList = _this2.courseList.concat(res.data);
                    _this2.courseLoading = false;
                    if (res.data && res.data.length < 10) {
                        _this2.courseEnd = true;
                    }
                }
            });
            // this.getLiveCourseList(this.$route.params.id, this.coursePage, res => {
            //     this.courseList = this.courseList.concat(res.data);
            //     this.courseLoading = false;
            //     if (res.data && res.data.length < 10) {
            //         this.courseEnd = true;
            //     }
            // });
        },
        getViewList: function getViewList(flag) {
            var _this3 = this;

            //获取观点列表
            if (flag) {
                this.viewList = [];
                this.viewPage = 1;
                this.viewLoading = true;
                this.viewEnd = false;
            }
            this.$http.post('/Viewpoint/getViewpointRecommend', { userId: this.$route.params.id, pageNo: this.viewPage, perPage: 10, isUserInfo: true, statusIn: '1', isImageInfo: true, receiverType: 2, receiverId: this.courseId }, { emulateJSON: true }).then(function (res) {
                if (res.body.code == 200) {
                    _this3.loaded = true;
                    res.body.data.forEach(function (val) {
                        val.head_add = val.head_add || '/images/default/userDefault.png';
                    });
                    _this3.viewList = _this3.viewList.concat(res.body.data);
                    _this3.viewLoading = false;
                    if (res.body.data && res.body.data.length < 10) {
                        _this3.viewEnd = true;
                    }
                }
            });
        },
        courseLoadMore: function courseLoadMore() {
            if (this.courseEnd || this.courseLoading) {
                return;
            }
            this.courseLoading = true;
            this.coursePage++;
            this.getCourseList();
        },
        viewLoadMore: function viewLoadMore() {
            if (this.viewEnd || this.viewLoading) {
                return;
            }
            this.viewLoading = true;
            this.viewPage++;
            this.getViewList();
        }
    },
    watch: {
        options: function options(val) {
            this.loaded = false;
            if (val == 1) {
                this.getCourseList(true);
            } else if (val == 2) {
                this.getViewList(true);
            }
        }
    }
};

/***/ }),

/***/ 971:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.live-recommend {\n  background-color: #fff;\n  min-height: 100%;\n}\n.live-recommend p.nocontenttext {\n    position: fixed;\n    top: 50%;\n    left: 50%;\n    -webkit-transform: translate(-50%, -50%);\n        -ms-transform: translate(-50%, -50%);\n            transform: translate(-50%, -50%);\n    background-color: transparent;\n    color: #999;\n    font-size: 15px;\n}\n.live-recommend .nav-tabber {\n    height: .9rem;\n    display: -webkit-box;\n    display: -webkit-flex;\n    display: -ms-flexbox;\n    display: flex;\n    position: relative;\n}\n.live-recommend .nav-tabber label {\n      -webkit-box-flex: 1;\n      -webkit-flex: 1;\n          -ms-flex: 1;\n              flex: 1;\n      height: 100%;\n}\n.live-recommend .nav-tabber label p {\n        text-align: center;\n        font-size: .32rem;\n        color: #666;\n        line-height: .9rem;\n}\n.live-recommend .nav-tabber label input {\n        display: none;\n}\n.live-recommend .nav-tabber label input:checked + p {\n          color: #c62f2f;\n}\n.live-recommend .nav-tabber:before {\n      content: '';\n      position: absolute;\n      width: .5rem;\n      height: .06rem;\n      background-color: #c62f2f;\n      border-radius: .04rem;\n      bottom: .04rem;\n      -webkit-transform: translateX(-50%);\n          -ms-transform: translateX(-50%);\n              transform: translateX(-50%);\n      -webkit-transition: left .3s ease;\n      transition: left .3s ease;\n}\n.live-recommend .nav-tabber.left:before {\n      left: 25%;\n}\n.live-recommend .nav-tabber.right:before {\n      left: 75%;\n}\n.live-recommend .content-container .view-list {\n    background-color: #fff;\n    box-sizing: border-box;\n    min-height: 100%;\n}\n.live-recommend .content-container .view-list.nocontentclass {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-pack: center;\n      -webkit-justify-content: center;\n          -ms-flex-pack: center;\n              justify-content: center;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n      background-color: #fff;\n}\n.live-recommend .content-container .view-list.nocontentclass p {\n        font-size: .28rem;\n        color: #666;\n}\n.live-recommend .content-container .view-list .view-item {\n      padding: 0 .3rem;\n      position: relative;\n      display: block;\n      overflow: hidden;\n}\n.live-recommend .content-container .view-list .view-item .img {\n        background-repeat: no-repeat;\n        background-position: center center;\n        background-size: cover;\n}\n.live-recommend .content-container .view-list .view-item h5 {\n        font-size: .32rem;\n        color: #1c0808;\n        line-height: .58rem;\n        -webkit-transform: translateY(-0.12rem);\n            -ms-transform: translateY(-0.12rem);\n                transform: translateY(-0.12rem);\n}\n.live-recommend .content-container .view-list .view-item h5.pay:before {\n          content: '';\n          display: inline-block;\n          width: .3rem;\n          height: .3rem;\n          margin-right: 0.05rem;\n          background: url(\"/images/3.0/gift-icon.png\") no-repeat 0 0/contain;\n}\n.live-recommend .content-container .view-list .view-item .view-layer {\n        padding: .4rem 0;\n        border-bottom: 1px solid #ebebeb;\n}\n.live-recommend .content-container .view-list .view-item.hot:before {\n        content: 'HOT';\n        line-height: .6rem;\n        position: absolute;\n        font-weight: bold;\n        width: .85rem;\n        height: .42rem;\n        background-color: #ff2727;\n        font-size: .18rem;\n        color: #ffffff;\n        -webkit-transform: translateX(50%) rotate(45deg);\n            -ms-transform: translateX(50%) rotate(45deg);\n                transform: translateX(50%) rotate(45deg);\n        -webkit-transform-origin: center top;\n            -ms-transform-origin: center top;\n                transform-origin: center top;\n        top: 0;\n        right: 0;\n        text-align: center;\n}\n.live-recommend .content-container .view-list .view-item.no-picture h5 {\n        margin-bottom: .12rem;\n}\n.live-recommend .content-container .view-list .view-item.picture-1 h5 {\n        -webkit-line-clamp: 3;\n        -webkit-box-flex: 1;\n        -webkit-flex: 1;\n            -ms-flex: 1;\n                flex: 1;\n}\n.live-recommend .content-container .view-list .view-item.picture-1 .view-top {\n        margin-bottom: .24rem;\n}\n.live-recommend .content-container .view-list .view-item.picture-1 .view-top .img {\n          width: 2.24rem;\n          min-width: 2.24rem;\n          margin-left: 0.35rem;\n          height: 1.48rem;\n}\n.live-recommend .content-container .view-list .view-item.picture-3 h5 {\n        margin-bottom: 0.12rem;\n}\n.live-recommend .content-container .view-list .view-item.picture-3 .img-box {\n        margin-bottom: 0.24rem;\n        -webkit-box-pack: justify;\n        -webkit-justify-content: space-between;\n            -ms-flex-pack: justify;\n                justify-content: space-between;\n}\n.live-recommend .content-container .view-list .view-item.picture-3 .img-box .img {\n          width: 2.23rem;\n          height: 1.48rem;\n}\n.live-recommend .content-container .view-list .view-item .info {\n        margin-top: .26rem;\n        font-size: .24rem;\n        color: #b2b2b2;\n}\n.live-recommend .content-container .view-list .view-item .info img {\n          float: left;\n          width: .64rem;\n          height: .64rem;\n          border-radius: 50%;\n          margin-right: .15rem;\n}\n.live-recommend .content-container .view-list .view-item .info .info-right p {\n          margin-bottom: .1rem;\n}\n.live-recommend .content-container .view-list .view-item .info .info-right .tag {\n          color: #bb7676;\n          margin-left: .18rem;\n          display: inline-block;\n}\n.live-recommend .content-container .view-list .view-item .info .info-right .num {\n          float: right;\n}\n.live-recommend .content-container .view-list .view-item .info .info-right .num i {\n            width: .32rem;\n            height: .32rem;\n            display: inline-block;\n            vertical-align: middle;\n            margin-right: .08rem;\n            margin-left: .24rem;\n}\n.live-recommend .content-container .view-list .view-item .info .info-right .num i:nth-child(1) {\n              background: url(\"/images/3.0/icon-03.png\") no-repeat center center;\n              background-size: 100% 80%;\n}\n.live-recommend .content-container .view-list .view-item .info .info-right .num i:nth-child(3) {\n              background: url(\"/images/3.0/icon-04.png\") no-repeat center center;\n              background-size: 100% 100%;\n}\n.live-recommend .content-container .view-list .view-item .info .info-right .num span {\n            vertical-align: middle;\n}\n.live-recommend .content-container.course-container {\n    padding: 0 .24rem;\n}\n.live-recommend .content-container .course {\n    padding: .32rem 0;\n    display: -webkit-box;\n    display: -webkit-flex;\n    display: -ms-flexbox;\n    display: flex;\n    border-bottom: 1px solid #ebebeb;\n    line-height: 1;\n}\n.live-recommend .content-container .course:last-child {\n      border-bottom: none;\n}\n.live-recommend .content-container .course .left {\n      /*overflow: hidden;*/\n      margin-right: .16rem;\n      position: relative;\n      float: left;\n}\n.live-recommend .content-container .course .left img {\n        width: 2.6rem;\n        height: 1.48rem;\n}\n.live-recommend .content-container .course .left span.series {\n        position: absolute;\n        top: 0;\n        left: 0;\n        font-size: .2rem;\n        color: #ffffff;\n        background: #c62f2f;\n        padding: .05rem .06rem;\n}\n.live-recommend .content-container .course .left span.ppt {\n        position: absolute;\n        bottom: 0;\n        right: 0;\n        width: .6rem;\n        height: .4rem;\n        background: rgba(0, 0, 0, 0.3);\n        text-align: center;\n        line-height: .4rem;\n        color: #ffffff;\n        font-size: .2rem;\n}\n.live-recommend .content-container .course .left span.video {\n        position: absolute;\n        bottom: 0;\n        right: 0;\n        width: .6rem;\n        height: .4rem;\n        background: rgba(0, 0, 0, 0.3) url(\"/images/3.0/video_icon.png\") no-repeat center center;\n        background-size: 60%;\n}\n.live-recommend .content-container .course .right {\n      position: relative;\n      width: 100%;\n}\n.live-recommend .content-container .course .right > h5 {\n        font-size: .32rem;\n        line-height: 0.4rem;\n        height: 0.8rem;\n        color: #1c0808;\n        text-overflow: ellipsis;\n        display: -webkit-box;\n        -webkit-box-orient: vertical;\n        -webkit-line-clamp: 2;\n}\n.live-recommend .content-container .course .right .num {\n        color: #888888;\n        font-size: .24rem;\n        margin: .1rem 0;\n}\n.live-recommend .content-container .course .right .num h4 {\n          float: left;\n          padding-left: .3rem;\n          background: url(\"/images/3.0/icon-03.png\") no-repeat left center;\n          background-size: .26rem .2rem;\n}\n.live-recommend .content-container .course .right .num p {\n          float: right;\n}\n.live-recommend .content-container .course .right .name {\n        color: #888888;\n        font-size: .24rem;\n}\n.live-recommend .content-container .course .right .name h4 {\n          float: left;\n}\n.live-recommend .content-container .course .right .name p {\n          float: right;\n}\n.live-recommend .content-container .course .right .name p.price {\n            color: #c62f2f;\n            padding-left: .3rem;\n            background: url(\"/images/3.0/gift-icon.png\") no-repeat left center;\n            background-size: .24rem .24rem;\n}\n.live-recommend .content-container .course .right .name p.lock {\n            color: #8f2fc6;\n            padding-left: .3rem;\n            background: url(\"/images/3.0/secret-icon.png\") no-repeat left center;\n            background-size: .24rem .24rem;\n}\n", ""]);

// exports


/***/ })

});