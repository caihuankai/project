webpackJsonp([90],{

/***/ 1110:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "live-send-link"
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
      "id": "course",
      "name": "options",
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
      "for": "view"
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
      "id": "view",
      "name": "options",
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
  }), _vm._v(" "), _c('p', [_vm._v("内参")])])]), _vm._v(" "), _c('div', {
    directives: [{
      name: "infinite-scroll",
      rawName: "v-infinite-scroll",
      value: (_vm.courseLoadMore),
      expression: "courseLoadMore"
    }],
    staticClass: "content",
    attrs: {
      "infinite-scroll-disabled": _vm.courseLoading,
      "infinite-scroll-distance": 50
    }
  }, [(_vm.options == 1) ? _c('div', {
    staticClass: "course-list"
  }, [_vm._l((_vm.courseList), function(item) {
    return _c('router-link', {
      key: item.id,
      staticClass: "item",
      attrs: {
        "to": '/personalCenter/course/' + item.id + '&' + _vm.userId
      }
    }, [_c('div', {
      staticClass: "media-left"
    }, [_c('img', {
      attrs: {
        "src": (item.process_src_img || item.src_img) + '?imageView2/1/w/200/h/200/interlace/1',
        "alt": ""
      }
    }), _vm._v(" "), _c('span', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (item.form == 3),
        expression: "item.form == 3"
      }],
      staticClass: "ppt-icon"
    }, [_vm._v("PPT")]), _vm._v(" "), _c('span', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (item.form == 2),
        expression: "item.form == 2"
      }],
      staticClass: "vedio-icon"
    })]), _vm._v(" "), _c('div', {
      staticClass: "media-right"
    }, [_c('h5', {
      staticClass: "title single-text"
    }, [_vm._v(_vm._s(item.class_name))]), _vm._v(" "), _c('div', {
      staticClass: "info"
    }, [_c('p', {
      staticClass: "watch-num"
    }, [_vm._v(_vm._s(item.study_num) + "人看过")]), _vm._v(" "), _c('p', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (item.type == 1),
        expression: "item.type == 1"
      }],
      staticClass: "datatime"
    }, [_vm._v(_vm._s(_vm._f("formatTime")(item.begin_time)))]), _vm._v(" "), _c('p', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (item.type == 2),
        expression: "item.type == 2"
      }],
      staticClass: "datatime"
    }, [_vm._v("已开课" + _vm._s(item.childCourseNum) + "节  预计更新" + _vm._s(item.plan_num) + "节课")])]), _vm._v(" "), _c('div', {
      staticClass: "bottom"
    }, [_c('p', {
      staticClass: "money"
    }, [_vm._v(_vm._s(item.level == 2 ? ('¥' + item.price) : ''))]), _vm._v(" "), _c('a', {
      staticClass: "send-btn",
      attrs: {
        "href": "javascript:;"
      },
      on: {
        "click": function($event) {
          $event.stopPropagation();
          _vm.sendCourse(item.id)
        }
      }
    }, [_vm._v("发送")])])])])
  }), _vm._v(" "), _c('nomore', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.courseEnd),
      expression: "courseEnd"
    }],
    attrs: {
      "text": "没有更多啦"
    }
  })], 2) : (_vm.options == 2) ? _c('div', {
    staticClass: "view-list"
  }, [_vm._l((_vm.viewList), function(item) {
    return _c('router-link', {
      key: item.id,
      staticClass: "item",
      attrs: {
        "to": ("/personalSpace/viewpointDetail/" + (item.id) + "&" + _vm.userId)
      }
    }, [_c('h5', {
      staticClass: "title",
      class: {
        pay: item.level == 1
      }
    }, [_vm._v(_vm._s(item.title))]), _vm._v(" "), _c('div', {
      staticClass: "bottom flex"
    }, [_c('p', {
      staticClass: "money"
    }, [_vm._v(_vm._s(item.level == 1 ? ("¥" + (item.price)) : ''))]), _vm._v(" "), _c('a', {
      staticClass: "send-btn",
      attrs: {
        "href": "javascript:;"
      },
      on: {
        "click": function($event) {
          $event.stopPropagation();
          _vm.sendView(item.id)
        }
      }
    }, [_vm._v("发送")])])])
  }), _vm._v(" "), _c('nomore', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.courseEnd),
      expression: "courseEnd"
    }],
    attrs: {
      "text": "没有更多啦"
    }
  })], 2) : _vm._e()])])
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-020defe0", module.exports)
  }
}

/***/ }),

/***/ 1223:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(952);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("53e82fed", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-020defe0\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./sendLink.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-020defe0\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./sendLink.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 444:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1223)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(869),
  /* template */
  __webpack_require__(1110),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\live\\sendLink.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] sendLink.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-020defe0", Component.options)
  } else {
    hotAPI.reload("data-v-020defe0", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 869:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _mintUi = __webpack_require__(54);

var _nomore = __webpack_require__(135);

var _nomore2 = _interopRequireDefault(_nomore);

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

exports.default = {
    data: function data() {
        return {
            options: '1',
            courseList: [],
            viewList: [],
            courseLoading: true,
            courseEnd: false,
            viewLoading: true,
            viewEnd: false,
            coursePage: 1,
            viewPage: 1
        };
    },

    computed: {
        userId: function userId() {
            return this.$store.state.userInfo.user_id;
        }
    },
    created: function created() {
        this.$store.commit('hideTabber');
        this.$store.commit('setTitle', '发送链接至Live直播');
        this.$store.dispatch('getUserInfo', function (res) {
            /*if (this.userId != this.$route.params.id) {
                this.$router.replace('/live/' + this.userId + '&' + this.userId);
            }*/
        });
        this.getCourseList();
    },

    filters: {
        formatTime: function formatTime(timeStr) {
            return timeStr.substr(5, 11);
        }
    },
    methods: {
        courseLoadMore: function courseLoadMore() {
            if (this.courseEnd || this.courseLoading) {
                return;
            }
            // this.courseLoading = true;
            if (this.options == '1') {

                this.coursePage++;
                this.getCourseList();
            } else {

                this.viewPage++;
                this.getViewList(false);
            }
        },
        getCourseList: function getCourseList(flag) {
            var _this = this;

            if (flag === true) {
                this.courseLoading = true;
                this.courseList = [];
                this.coursePage = 1;
                this.courseEnd = false;
            }
            this.getLiveCourseList(this.$route.params.id, this.coursePage, function (res) {
                _this.courseList = _this.courseList.concat(res.data);
                _this.courseLoading = false;
                if (res.data && res.data.length < 10) {
                    _this.courseEnd = true;
                }
            }, 'id desc', 1);
        },
        sendCourse: function sendCourse(id) {
            var _this2 = this;

            //发送课程到live直播
            this.$http.get('/LiveDetails/sendCourse', { params: { senderId: this.userId, user_id: this.$store.state.userInfo.user_id, courseId: id, receiverType: 1 } }).then(function (res) {
                console.log(res.body);
                if (res.body.code == 0) {
                    (0, _mintUi.Toast)({
                        message: '链接发送成功',
                        duration: 1500
                    });
                    setTimeout(function () {
                        _this2.$router.push('/live/' + _this2.$route.params.id + '&' + _this2.userId);
                    }, 1600);
                }
            });
        },
        sendView: function sendView(id) {
            var _this3 = this;

            //发送观点到live直播
            this.$http.get('/Viewpoint/sendViewpointToLive', { params: { viewpointId: id, receiverType: 1, senderId: this.userId } }).then(function (res) {
                if (res.body.code == 200) {
                    (0, _mintUi.Toast)({
                        message: '链接发送成功',
                        duration: 1500
                    });
                    setTimeout(function () {
                        _this3.$router.push('/live/' + _this3.$route.params.id + '&' + _this3.userId);
                    }, 1600);
                }
            });
            /*this.$http.get(`/Viewpoint/sendViewpointToLive?viewpointId=${id}&receiverType=1`).then(res => {
                 console.log(res.body);
              });*/
        },
        getViewList: function getViewList(flag) {
            var _this4 = this;

            if (flag === true) {
                this.copurseLoading = true;
                this.viewList = [];
                this.viewPage = 1;
                this.courseEnd = false;
                this.getLiveViewList(this.$route.params.id, this.viewPage, function (res) {
                    console.log(res);
                    _this4.viewList = _this4.viewList.concat(res.data.viewpointList);
                    _this4.courseLoading = false;
                    if (res.data.viewpointList && res.data.viewpointList.length < 15) {
                        _this4.courseEnd = true;
                    }
                }, '1');
            } else {
                this.getLiveViewList(this.$route.params.id, this.viewPage, function (res) {
                    console.log(res);
                    _this4.viewList = _this4.viewList.concat(res.data.viewpointList);
                    _this4.courseLoading = false;
                    if (res.data.viewpointList && res.data.viewpointList.length < 15) {
                        _this4.courseEnd = true;
                    }
                }, '1');
            }
        }
    },
    watch: {
        options: function options(val) {
            if (val == 1) {
                // this.courseEnd = false;
                this.getCourseList(true);
            } else if (val == 2) {
                // this.courseEnd = false;
                this.getViewList(true);
            }
        }
    },
    components: {
        nomore: _nomore2.default
    }
};

/***/ }),

/***/ 952:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.live-send-link {\n  min-height: 100%;\n  box-sizing: border-box;\n  padding-top: .9rem;\n  background-color: #fff;\n}\n.live-send-link .nav-tabber {\n    display: -webkit-box;\n    display: -webkit-flex;\n    display: -ms-flexbox;\n    display: flex;\n    border-bottom: 1px solid #ebebeb;\n    position: fixed;\n    top: 0;\n    width: 100%;\n    background-color: #fff;\n    z-index: 100;\n}\n.live-send-link .nav-tabber:before {\n      position: absolute;\n      content: '';\n      width: .68rem;\n      height: .04rem;\n      border-radius: .04rem;\n      background-color: #c62f2f;\n      bottom: .04rem;\n      -webkit-transform: translateX(-50%);\n          -ms-transform: translateX(-50%);\n              transform: translateX(-50%);\n      -webkit-transition: left .3s ease;\n      transition: left .3s ease;\n}\n.live-send-link .nav-tabber.left:before {\n      left: 25%;\n}\n.live-send-link .nav-tabber.right:before {\n      left: 75%;\n}\n.live-send-link .nav-tabber label {\n      -webkit-box-flex: 1;\n      -webkit-flex: 1;\n          -ms-flex: 1;\n              flex: 1;\n      height: .9rem;\n      line-height: .9rem;\n      text-align: center;\n      font-size: .32rem;\n      color: #666;\n}\n.live-send-link .nav-tabber label input {\n        display: none;\n}\n.live-send-link .nav-tabber label input:checked + p {\n          color: #c62f2f;\n}\n.live-send-link .content .course-list {\n    padding-left: .3rem;\n}\n.live-send-link .content .course-list .item {\n      padding: .3rem .3rem .3rem 0;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      height: 1.1rem;\n}\n.live-send-link .content .course-list .item .media-left {\n        height: 1.1rem;\n        width: 1.1rem;\n        margin-right: .3rem;\n        position: relative;\n}\n.live-send-link .content .course-list .item .media-left img {\n          width: 100%;\n          height: 100%;\n          border-radius: .08rem;\n}\n.live-send-link .content .course-list .item .media-left .ppt-icon {\n          position: absolute;\n          bottom: 0rem;\n          right: 0rem;\n          padding: .1rem .12rem;\n          color: #fff;\n          height: .35rem;\n          line-height: .35rem;\n          font-size: 12px;\n          background: rgba(0, 0, 0, 0.15);\n}\n.live-send-link .content .course-list .item .media-left .vedio-icon {\n          position: absolute;\n          bottom: 0rem;\n          right: 0rem;\n          padding: .1rem .16rem;\n          width: .35rem;\n          height: .25rem;\n          background: url(/images/3.0/video_icon.png) no-repeat center center rgba(0, 0, 0, 0.15);\n          background-size: .32rem auto;\n}\n.live-send-link .content .course-list .item .media-right {\n        -webkit-box-flex: 1;\n        -webkit-flex: 1;\n            -ms-flex: 1;\n                flex: 1;\n        line-height: 1;\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-orient: vertical;\n        -webkit-box-direction: normal;\n        -webkit-flex-direction: column;\n            -ms-flex-direction: column;\n                flex-direction: column;\n        -webkit-box-pack: justify;\n        -webkit-justify-content: space-between;\n            -ms-flex-pack: justify;\n                justify-content: space-between;\n}\n.live-send-link .content .course-list .item .media-right .title {\n          font-size: .32rem;\n          line-height: .32rem;\n          height: .32rem;\n          color: #545b63;\n}\n.live-send-link .content .course-list .item .media-right .info {\n          display: -webkit-box;\n          display: -webkit-flex;\n          display: -ms-flexbox;\n          display: flex;\n          -webkit-box-pack: justify;\n          -webkit-justify-content: space-between;\n              -ms-flex-pack: justify;\n                  justify-content: space-between;\n          font-size: .24rem;\n          color: #b2b2b2;\n}\n.live-send-link .content .course-list .item .media-right .bottom {\n          display: -webkit-box;\n          display: -webkit-flex;\n          display: -ms-flexbox;\n          display: flex;\n          -webkit-box-align: center;\n          -webkit-align-items: center;\n              -ms-flex-align: center;\n                  align-items: center;\n          -webkit-box-pack: justify;\n          -webkit-justify-content: space-between;\n              -ms-flex-pack: justify;\n                  justify-content: space-between;\n}\n.live-send-link .content .course-list .item .media-right .bottom .money {\n            font-size: .24rem;\n            color: #fb4040;\n}\n.live-send-link .content .course-list .item .media-right .bottom .send-btn {\n            display: block;\n            line-height: .38rem;\n            color: #c62f2f;\n            padding: 0 .18rem;\n            border: 1px solid #c62f2f;\n            border-radius: .04rem;\n            height: .38rem;\n            font-size: .24rem;\n}\n.live-send-link .content .view-list .item {\n    border-bottom: 1px solid #ebebeb;\n    padding: .3rem;\n    position: relative;\n    display: block;\n}\n.live-send-link .content .view-list .item .bottom {\n      -webkit-box-pack: justify;\n      -webkit-justify-content: space-between;\n          -ms-flex-pack: justify;\n              justify-content: space-between;\n}\n.live-send-link .content .view-list .item .title {\n      font-size: .32rem;\n      line-height: .46rem;\n      color: #545b63;\n      margin-bottom: .16rem;\n}\n.live-send-link .content .view-list .item .title.pay:after {\n        content: '';\n        display: inline-block;\n        width: .3rem;\n        height: .3rem;\n        background: url(\"/images/46.png\") no-repeat;\n        background-size: contain;\n}\n.live-send-link .content .view-list .item .money {\n      font-size: .24rem;\n      color: #c62f2f;\n}\n.live-send-link .content .view-list .item .send-btn {\n      height: .38rem;\n      line-height: .38rem;\n      border: 1px solid #c62f2f;\n      color: #c62f2f;\n      font-size: .24rem;\n      padding: 0 .18rem;\n      border-radius: .04rem;\n}\n", ""]);

// exports


/***/ })

});