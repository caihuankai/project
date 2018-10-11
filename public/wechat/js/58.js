webpackJsonp([58],{

/***/ 1027:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.zIndex {\n  z-index: 9999;\n}\n.user-manage-num {\n  min-height: 100%;\n  box-sizing: border-box;\n  box-sizing: border-box;\n}\n.user-manage-num .cancel-container {\n    width: 100%;\n    padding: 0 0.6rem;\n    box-sizing: border-box;\n    background-color: transparent;\n    border-radius: 10px;\n}\n.user-manage-num .cancel-container .cancel-modal {\n      background-color: #fff;\n      border-radius: 3px;\n}\n.user-manage-num .cancel-container .cancel-modal ul li {\n        line-height: 1rem;\n        height: 1rem;\n        padding: 0rem 0.42rem 0rem;\n}\n.user-manage-num .cancel-container .cancel-modal ul li span {\n          float: left;\n}\n.user-manage-num .cancel-container .cancel-modal ul li .mint-switch {\n          padding-top: 0.18rem;\n          float: right;\n}\n.user-manage-num .cancel-container .cancel-modal ul li .mint-switch .mint-switch-input:checked + .mint-switch-core {\n            border-color: #bb7676;\n            background-color: #bb7676;\n}\n.user-manage-num .cancel-container .cancel-modal h2 {\n        margin-bottom: 0.1rem;\n        font-size: 0.34rem;\n        color: #999;\n        text-align: left;\n        background: #f2f2f2;\n        height: 0.8rem;\n        line-height: 0.8rem;\n        border-radius: 10px 10px 0 0;\n        text-indent: 0.42rem;\n}\n.user-manage-num .cancel-container .cancel-modal .btns {\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-pack: justify;\n        -webkit-justify-content: space-between;\n            -ms-flex-pack: justify;\n                justify-content: space-between;\n        padding: 0.3rem 0.42rem 0.42rem;\n}\n.user-manage-num .cancel-container .cancel-modal .btns button {\n          font-size: 0.36rem;\n          border-radius: 3px;\n          box-sizing: border-box;\n          border: none;\n          height: 0.9rem;\n          padding: 0;\n          /* flex: 1;*/\n}\n.user-manage-num .cancel-container .cancel-modal .btns .confirm-btn {\n          line-height: 0.9rem;\n          background-color: transparent;\n          color: #999;\n          border: 1px solid #999;\n          width: 2.8rem;\n          margin: 0px auto;\n}\n.user-manage-num.nocontentclass {\n    display: -webkit-box;\n    display: -webkit-flex;\n    display: -ms-flexbox;\n    display: flex;\n    -webkit-box-align: center;\n    -webkit-align-items: center;\n        -ms-flex-align: center;\n            align-items: center;\n    -webkit-box-pack: center;\n    -webkit-justify-content: center;\n        -ms-flex-pack: center;\n            justify-content: center;\n}\n.user-manage-num.nocontentclass .nocontentinfo {\n      font-size: 14px;\n      color: #b2b2b2;\n}\n.user-manage-num .list {\n    background-color: #fff;\n    height: auto;\n    overflow: hidden;\n}\n.user-manage-num .list .listLi {\n      height: 55px;\n      overflow: hidden;\n      margin: 0  10px;\n      border-bottom: 1px solid #f0f0f0;\n}\n.user-manage-num .list .listLi span {\n        width: 10%;\n        float: left;\n        display: block;\n        font-size: 16px;\n        padding-top: 15px;\n}\n.user-manage-num .list .item {\n      height: 55px;\n      line-height: 55px;\n      width: 90%;\n      float: left;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n      position: relative;\n}\n.user-manage-num .list .item:last-of-type {\n        border-bottom: none;\n}\n.user-manage-num .list .item img {\n        border-radius: 50%;\n        width: 38px;\n        height: 38px;\n        margin-right: 15px;\n        float: left;\n        margin-top: 10px;\n}\n.user-manage-num .list .item p {\n        font-size: 15px;\n        color: #333;\n        float: left;\n        width: 50%;\n}\n", ""]);

// exports


/***/ }),

/***/ 1185:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    directives: [{
      name: "infinite-scroll",
      rawName: "v-infinite-scroll",
      value: (_vm.loadMore),
      expression: "loadMore"
    }],
    staticClass: "user-manage-num",
    class: {
      nocontentclass: _vm.data.length == 0
    },
    attrs: {
      "infinite-scroll-disabled": _vm.loading,
      "infinite-scroll-distance": "50",
      "infinite-scroll-immediate-check": "false"
    }
  }, [(_vm.data.length > 0) ? _c('div', {
    staticClass: "list"
  }, [_vm._l((_vm.data), function(item) {
    return _c('div', {
      staticClass: "listLi"
    }, [_c('router-link', {
      key: item.user_id,
      staticClass: "item",
      attrs: {
        "to": '/personalSpace/lobbyPage/' + item.user_id + '/' + _vm.userId
      }
    }, [_c('img', {
      staticClass: "avatar",
      attrs: {
        "src": item.pic
      }
    }), _vm._v(" "), _c('p', {
      staticClass: "user-name"
    }, [_vm._v(_vm._s(item.username))])]), _vm._v(" "), _c('span', {
      on: {
        "click": function($event) {
          _vm.AuthorityModify(item.user_id)
        }
      }
    }, [_vm._v("···")])], 1)
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
  })], 2) : _c('p', {
    staticClass: "nocontentinfo"
  }, [_vm._v("暂无记录")]), _vm._v(" "), _c('mt-popup', {
    staticClass: "cancel-container",
    attrs: {
      "popup-transition": "popup-fade"
    },
    model: {
      value: (_vm.popupSetUp),
      callback: function($$v) {
        _vm.popupSetUp = $$v
      },
      expression: "popupSetUp"
    }
  }, [_c('div', {
    staticClass: "cancel-modal"
  }, [_c('h2', [_vm._v("设置")]), _vm._v(" "), _c('ul', [_c('li', [_c('span', [_vm._v("Live直播间权限")]), _vm._v(" "), _c('mt-switch', {
    on: {
      "change": function($event) {
        _vm.TeacherPermissionsFun('live')
      }
    },
    model: {
      value: (_vm.liveVal),
      callback: function($$v) {
        _vm.liveVal = $$v
      },
      expression: "liveVal"
    }
  })], 1), _vm._v(" "), _c('li', [_c('span', [_vm._v("课程直播间权限 ")]), _vm._v(" "), _c('mt-switch', {
    on: {
      "change": function($event) {
        _vm.TeacherPermissionsFun('course')
      }
    },
    model: {
      value: (_vm.courseVal),
      callback: function($$v) {
        _vm.courseVal = $$v
      },
      expression: "courseVal"
    }
  })], 1), _vm._v(" "), _c('li', [_c('span', [_vm._v("发布观点权限 ")]), _vm._v(" "), _c('mt-switch', {
    on: {
      "change": function($event) {
        _vm.TeacherPermissionsFun('viewpoint')
      }
    },
    model: {
      value: (_vm.viewVal),
      callback: function($$v) {
        _vm.viewVal = $$v
      },
      expression: "viewVal"
    }
  })], 1)]), _vm._v(" "), _c('div', {
    staticClass: "btns"
  }, [_c('button', {
    staticClass: "confirm-btn",
    on: {
      "click": function($event) {
        _vm.popupSetUp = false
      }
    }
  }, [_vm._v("确定")])])])])], 1)
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-6ec6415f", module.exports)
  }
}

/***/ }),

/***/ 1295:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(1027);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("e9cd4eba", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-6ec6415f\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./userManageTerchList.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-6ec6415f\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./userManageTerchList.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 498:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1295)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(923),
  /* template */
  __webpack_require__(1185),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\personalCenter\\userManageTerchList.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] userManageTerchList.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-6ec6415f", Component.options)
  } else {
    hotAPI.reload("data-v-6ec6415f", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 923:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function(NProgress, $) {

Object.defineProperty(exports, "__esModule", {
    value: true
});

var _nomore = __webpack_require__(135);

var _nomore2 = _interopRequireDefault(_nomore);

var _mintUi = __webpack_require__(54);

var _vuex = __webpack_require__(70);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

exports.default = {
    data: function data() {
        return {
            data: [],
            finish: false,
            page: 1,
            loading: true,
            isEnd: false,
            popupSetUp: false,
            liveVal: false, //live 权限
            courseVal: true, //课程权限
            viewVal: false, //观点权限
            TeacherId: "" //老师ID
        };
    },

    computed: (0, _vuex.mapState)({
        userId: function userId(state) {
            return state.userInfo.user_id;
        },
        //type: state => state.userInfo.type,
        sdkdata: function sdkdata(state) {
            return state.sdkdata;
        }
    }),
    components: {
        nomore: _nomore2.default
    },
    created: function created() {
        var _this = this;

        NProgress.start();
        this.$store.commit("setTitle", "老师管理");
        this.$store.commit("showTabber");
        if (this.$route.params.type == 1 && this.type == 1) {
            this.$router.replace("/personalCenter");
        }
        this.$store.dispatch("getUserInfo", function (res) {
            _this.getData();
        });
    },
    destroyed: function destroyed() {
        NProgress.done();
    },

    methods: {
        TeacherPermissionsFun: function TeacherPermissionsFun(type) {
            var _this2 = this;

            //助教修改老师权限
            var status = 1;
            if (type == "live") {
                if (this.liveVal == true) {
                    status = 1;
                } else {
                    status = 2;
                }
            }
            if (type == "course") {
                if (this.courseVal == true) {
                    status = 1;
                } else {
                    status = 2;
                }
            }
            if (type == "viewpoint") {
                console.log(this.liveVal);
                if (this.viewVal == true) {
                    status = 1;
                } else {
                    status = 2;
                }
            }
            //this.popupSetUp = false;
            this.$http.get("/User/setManagerTeacherPermissions?teacherId=" + this.TeacherId + "&type=" + type + "&status=" + status).then(function (res) {
                console.log(res.body);
                if (res.body.code != 200) {
                    (0, _mintUi.Toast)("设置老师权限失败");
                } else {
                    if (type == "live") {
                        if (_this2.liveVal == true) {
                            (0, _mintUi.Toast)({ message: "权限已开启", duration: 2000, className: 'zIndex' });
                        } else {
                            (0, _mintUi.Toast)({ message: "权限已关闭", duration: 2000, className: 'zIndex' });
                        }
                    } else if (type == "course") {
                        if (_this2.courseVal == true) {
                            (0, _mintUi.Toast)({ message: "权限已开启", duration: 2000, className: 'zIndex' });
                        } else {
                            (0, _mintUi.Toast)({ message: "权限已关闭", duration: 2000, className: 'zIndex' });
                        }
                    } else {
                        if (_this2.viewVal == true) {
                            (0, _mintUi.Toast)({ message: "权限已开启", duration: 2000, className: 'zIndex' });
                        } else {
                            (0, _mintUi.Toast)({ message: "权限已关闭", duration: 2000, className: 'zIndex' });
                        }
                    }
                }
            });
        },
        AuthorityModify: function AuthorityModify(id) {
            var _this3 = this;

            //获取老师权限
            this.$http.get("/User/getManagerTeacherPermissions?teacherId=" + id).then(function (res) {
                console.log(res.body);
                if (res.body.code == 200) {
                    _this3.TeacherId = id;
                    if (res.body.data.live == 1) {
                        _this3.liveVal = true;
                    } else {
                        _this3.liveVal = false;
                    }

                    if (res.body.data.course == 1) {
                        _this3.courseVal = true;
                    } else {
                        _this3.courseVal = false;
                    }

                    if (res.body.data.viewpoint == 1) {
                        _this3.viewVal = true;
                    } else {
                        _this3.viewVal = false;
                    }
                    _this3.popupSetUp = true;
                } else {
                    (0, _mintUi.Toast)("获取老师权限失败");
                }
            });
        },
        getData: function getData() {
            var _this4 = this;

            this.$http.get(this.hostUrl + "/User/getManagerTeacherList", {
                params: { page: this.page }
            }).then(function (res) {
                console.log(res.body);
                // Indicator.close()
                NProgress.done();
                if (res.body.code == 200) {
                    _this4.loading = false;
                    if (_this4.page == 1) {
                        _this4.data = res.body.data;
                    } else {
                        for (var item in res.body.data) {
                            _this4.data.push(res.body.data[item]);
                        }
                    }

                    if (res.body.data.length < 20) {
                        _this4.isEnd = true;
                        _this4.loading = true;
                    }

                    _this4.$nextTick(function () {
                        $("img").on("error", function () {
                            this.src = "/images/default/userDefault.png";
                        });
                    });
                    NProgress.done();
                    _this4.finish = true;
                }
                _this4.finish = true;
            });
        },
        loadMore: function loadMore() {
            var _this5 = this;

            if (this.isEnd || this.loading) {
                return;
            }
            this.loading = true;
            this.page++;
            setTimeout(function () {
                _this5.getData();
            }, 1000);
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(99), __webpack_require__(49)))

/***/ })

});