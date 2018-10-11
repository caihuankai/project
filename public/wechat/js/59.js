webpackJsonp([59],{

/***/ 1043:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.user-manage-num {\n  min-height: 100%;\n  box-sizing: border-box;\n  background-color: #f0f0f0;\n  overflow: auto;\n  -webkit-overflow-scrolling: touch;\n}\n.user-manage-num.nocontentclass {\n    display: -webkit-box;\n    display: -webkit-flex;\n    display: -ms-flexbox;\n    display: flex;\n    -webkit-box-align: center;\n    -webkit-align-items: center;\n        -ms-flex-align: center;\n            align-items: center;\n    -webkit-box-pack: center;\n    -webkit-justify-content: center;\n        -ms-flex-pack: center;\n            justify-content: center;\n}\n.user-manage-num .list {\n    background-color: #fff;\n    padding-left: 13px;\n}\n.user-manage-num .list .item {\n      height: 55px;\n      line-height: 55px;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n      border-bottom: 1px solid #f0f0f0;\n}\n.user-manage-num .list .item:last-of-type {\n        border-bottom: none;\n}\n.user-manage-num .list .item img {\n        border-radius: 50%;\n        width: 38px;\n        height: 38px;\n        margin-right: 15px;\n}\n.user-manage-num .list .item p {\n        font-size: 15px;\n        color: #333;\n}\n.user-manage-num .tips {\n    height: 1.1rem;\n    line-height: 1.1rem;\n    text-align: center;\n    font-size: .24rem;\n    color: #b2b2b2;\n}\n.user-manage-num .nocontentinfo {\n    font-size: 14px;\n    color: #b2b2b2;\n    text-align: center;\n    line-height: 9rem;\n}\n", ""]);

// exports


/***/ }),

/***/ 1202:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.finish),
      expression: "finish"
    }, {
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
      "infinite-scroll-distance": 165
    }
  }, [(_vm.data.length > 0) ? _c('div', {
    staticClass: "list"
  }, [_vm._l((_vm.data), function(item) {
    return _c('div', {
      key: item.id,
      staticClass: "item"
    }, [_c('img', {
      staticClass: "avatar",
      attrs: {
        "src": item.pic
      }
    }), _vm._v(" "), _c('p', {
      staticClass: "user-name"
    }, [_vm._v(_vm._s(item.name))])])
  }), _vm._v(" "), _c('nomore', {
    attrs: {
      "text": "没有更多啦"
    }
  })], 2) : _c('p', {
    staticClass: "nocontentinfo"
  }, [_vm._v("暂无记录")])])
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-9083d5bc", module.exports)
  }
}

/***/ }),

/***/ 1311:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(1043);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("b19c2918", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-9083d5bc\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./userManageNums.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-9083d5bc\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./userManageNums.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 497:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1311)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(922),
  /* template */
  __webpack_require__(1202),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\personalCenter\\userManageNums.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] userManageNums.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-9083d5bc", Component.options)
  } else {
    hotAPI.reload("data-v-9083d5bc", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 922:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function(NProgress, $) {

Object.defineProperty(exports, "__esModule", {
    value: true
});

var _nomore = __webpack_require__(135);

var _nomore2 = _interopRequireDefault(_nomore);

var _vuex = __webpack_require__(70);

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

exports.default = {
    data: function data() {
        return {
            data: [],
            finish: false,
            page: 0,
            loading: false,
            isEnd: false
            // data: [{ src_img: '/images/1.jpg', name: '张三', user_id: 1706753 }, { src_img: '/images/1.jpg', name: '张三', user_id: 1706753 }]
        };
    },

    computed: (0, _vuex.mapState)({
        userId: function userId(state) {
            return state.userInfo.user_id;
        },
        type: function type(state) {
            return state.userInfo.type;
        },
        sdkdata: function sdkdata(state) {
            return state.sdkdata;
        }
    }),
    created: function created() {
        var _this = this;

        NProgress.start();
        this.$store.commit('setTitle', this.$route.params.type == 1 ? '关注人数' : '邀请人数');
        this.$store.commit('hideTabber');
        if (this.$route.params.type == 1 && this.type == 1) {
            this.$router.replace('/personalCenter');
        }
        this.$store.dispatch('getUserInfo', function (res) {
            _this.getData();
        });
    },
    destroyed: function destroyed() {
        NProgress.done();
    },

    methods: {
        getData: function getData() {
            var _this2 = this;

            this.$http.post(this.hostUrl + this.$route.params.type == 1 ? '/User/getFocusList' : '/User/getFansList', { listId: this.page, limit: 20, action: 1, isReal: true }, { emulateJSON: true }).then(function (res) {
                console.log(res.body);
                if (res.body.code == 200) {
                    var data = res.body.data;
                    for (var i = 0, len = data.length; i < len; i++) {
                        if (data[i].pic == '') {
                            data[i].pic = "/images/default/userDefault.png";
                        }
                    }
                    _this2.data = _this2.data.concat(data);
                    _this2.loading = false;
                    if (data.length < 20) {
                        _this2.isEnd = true;
                    }
                    _this2.$nextTick(function () {
                        $('img').on('error', function () {
                            this.src = "/images/default/userDefault.png";
                        });
                    });
                }
                NProgress.done();
                _this2.finish = true;
            });
        },
        loadMore: function loadMore() {
            if (this.data.length == 0 || this.isEnd || this.loading) {
                return;
            }
            this.loading = true;
            this.page++;
            this.getData();
        }
    },
    components: {
        nomore: _nomore2.default
    }
};
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(99), __webpack_require__(49)))

/***/ })

});