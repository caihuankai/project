webpackJsonp([32],{

/***/ 1009:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.system-inf {\n  background-color: #fff;\n  padding: 0 0.24rem 1rem;\n  min-height: 80%;\n}\n.system-inf h5 {\n    height: 0.6rem;\n    line-height: 0.6rem;\n    font-size: 0.32rem;\n}\n.system-inf h5 span {\n      font-size: 0.24rem;\n      float: right;\n      color: #999;\n}\n.system-inf p {\n    font-size: 0.24rem;\n    line-height: 0.4rem;\n    color: #888;\n}\n.system-inf p span {\n      color: #cf2f2f;\n}\n.system-inf a {\n    display: block;\n    padding: 0.15rem 0 .24rem;\n    border-bottom: 1px solid #efefef;\n}\n", ""]);

// exports


/***/ }),

/***/ 1167:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    directives: [{
      name: "infinite-scroll",
      rawName: "v-infinite-scroll",
      value: (_vm.loadMore),
      expression: "loadMore"
    }],
    staticClass: "system-inf",
    attrs: {
      "infinite-scroll-disabled": "loading",
      "infinite-scroll-distance": "50",
      "infinite-scroll-immediate-check": "false"
    }
  }, [(_vm.data.length == 0 && _vm.loadedLevel == false) ? _c('loading') : (_vm.data.length !== 0 && _vm.loadedLevel) ? [_vm._l((_vm.data), function(item) {
    return [_c('router-link', {
      attrs: {
        "to": item.link
      }
    }, [_c('h5', [_vm._v(_vm._s(item.title)), _c('span', [_vm._v(_vm._s(item.create_time))])]), _vm._v(" "), _c('p', {
      domProps: {
        "innerHTML": _vm._s(item.content)
      }
    })])]
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
  })] : (_vm.data.length == 0 && _vm.loadedLevel) ? _c('nodata') : _vm._e()], 2)
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-52167248", module.exports)
  }
}

/***/ }),

/***/ 1277:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(1009);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("0a8dea6e", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-52167248\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./systemInformation.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-52167248\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./systemInformation.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 495:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1277)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(920),
  /* template */
  __webpack_require__(1167),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\personalCenter\\systemInformation.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] systemInformation.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-52167248", Component.options)
  } else {
    hotAPI.reload("data-v-52167248", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 534:
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

exports.default = {
    props: ['sdkdata']

};

/***/ }),

/***/ 536:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.nodataList {\n  min-height: 100%;\n  box-sizing: border-box;\n  padding-top: 40%;\n  text-align: center;\n  background: transparent;\n}\n.nodataList img {\n    margin-bottom: 21px;\n}\n.nodataList p {\n    font-size: 0.36rem;\n    color: #b2b2b2;\n}\n", ""]);

// exports


/***/ }),

/***/ 544:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(546)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(534),
  /* template */
  __webpack_require__(545),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\subcomponents\\personalCenter\\nodata.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] nodata.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-7fcd8477", Component.options)
  } else {
    hotAPI.reload("data-v-7fcd8477", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 545:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _vm._m(0)
},staticRenderFns: [function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "nodataList"
  }, [_c('img', {
    attrs: {
      "src": "/images/info.png",
      "width": "64",
      "alt": ""
    }
  }), _vm._v(" "), _c('p', [_vm._v("哦~没有数据呢！")])])
}]}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-7fcd8477", module.exports)
  }
}

/***/ }),

/***/ 546:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(536);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("029d8082", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-7fcd8477\",\"scoped\":false,\"hasInlineConfig\":true}!../../../node_modules/sass-loader/lib/loader.js!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./nodata.vue", function() {
     var newContent = require("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-7fcd8477\",\"scoped\":false,\"hasInlineConfig\":true}!../../../node_modules/sass-loader/lib/loader.js!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./nodata.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 920:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _nomore = __webpack_require__(135);

var _nomore2 = _interopRequireDefault(_nomore);

var _nodata = __webpack_require__(544);

var _nodata2 = _interopRequireDefault(_nodata);

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

exports.default = {
    data: function data() {
        return {
            data: [], //总的消息
            loading: false,
            isEnd: false,
            loadedLevel: false, //ajax加载
            page: 1
        };
    },

    components: {
        nomore: _nomore2.default,
        nodata: _nodata2.default
    },
    computed: {
        userId: function userId() {
            return this.$store.state.userInfo.user_id;
        }
    },
    created: function created() {
        this.$store.commit("setTitle", "系统消息");
        this.getData();
    },

    methods: {
        getData: function getData() {
            var _this = this;

            var param = {
                type: 0,
                page: this.page,
                perPage: 15
            };
            this.$http.get(this.hostUrl + "/Message/getMessageListByType", { params: param }).then(function (res) {
                res = res.body;
                if (res.code == 200) {

                    for (var i = 0; res.data.length > i; i++) {
                        res.data[i].content = res.data[i].content.replace(/\r\n/g, "</br>");
                        res.data[i].content = res.data[i].content.replace(/【/g, "<span>【");
                        res.data[i].content = res.data[i].content.replace(/】/g, "】</span>");
                        if (JSON.parse(res.data[i].link_info) == 0) {
                            res.data.splice(i, 1);
                        }
                        //1:课程详情页；2:系列课详情页；3:系列课-子课程详情页；4:观点详情页；5:讲师的Live直播间；6:讲师Live直播间的聊天室；7:讲师课程直播间的聊天室',8:课程留言
                        switch (res.data[i].link) {
                            case 1:
                                var link = JSON.parse(res.data[i].link_info).courseId;
                                if (JSON.parse(res.data[i].link_info).level == 0) {
                                    if (JSON.parse(res.data[i].link_info).form == 3) {
                                        res.data[i].link = "/pptOnlive/" + link;
                                    } else {
                                        res.data[i].link = "/onlive/" + link;
                                    }
                                } else {
                                    res.data[i].link = "/personalCenter/course/" + link + "&" + _this.userId;
                                }

                                break;
                            case 2:
                                var link = JSON.parse(res.data[i].link_info).courseId;
                                res.data[i].link = "/personalCenter/course/" + link + "&" + _this.userId;
                                break;
                            case 3:
                                var link = JSON.parse(res.data[i].link_info).courseId;
                                if (JSON.parse(res.data[i].link_info).level == 0) {
                                    if (JSON.parse(res.data[i].link_info).form == 3) {
                                        res.data[i].link = "/pptOnlive/" + link;
                                    } else {
                                        res.data[i].link = "/onlive/" + link;
                                    }
                                } else {
                                    res.data[i].link = "/personalCenter/course/" + link + "&" + _this.userId;
                                }
                                break;
                            case 4:
                                var link = JSON.parse(res.data[i].link_info).viewpointId;
                                res.data[i].link = "/column/detail/" + link + "&" + _this.userId;
                                break;
                            case 5:
                                var link = JSON.parse(res.data[i].link_info).teacherId;
                                res.data[i].link = "/live/" + link + "&" + _this.userId;
                                break;
                            case 6:
                                var link = JSON.parse(res.data[i].link_info).teacherId;
                                res.data[i].link = "/live/" + link + "&" + _this.userId + "&1";
                                break;
                            case 7:
                                var link = JSON.parse(res.data[i].link_info).courseId;
                                if (JSON.parse(res.data[i].link_info).form == 3) {
                                    res.data[i].link = "/pptOnlive/" + link + "&1";
                                } else {
                                    res.data[i].link = "/onlive/" + link + "&1";
                                }
                                break;
                            case 8:
                                var link = JSON.parse(res.data[i].link_info).courseId;
                                res.data[i].link = "/personalCenter/course/" + link + "&" + _this.userId;
                                break;
                            case 9:
                                //特训课详情页面
                                var link = JSON.parse(res.data[i].link_info).courseId;
                                res.data[i].link = "/course/specialOnlive/" + link;
                                break;
                            case 10:
                                //特训班预告页
                                var link = JSON.parse(res.data[i].link_info).courseId;
                                res.data[i].link = "/specialTrainAdvance/" + link;
                                break;
                        }
                    }
                    _this.data = _this.data.concat(res.data);
                    _this.loadedLevel = true;
                    if (res.data.length < 15) {
                        _this.isEnd = true;
                        _this.loading = true;
                    }
                    _this.loading = false;
                } else {
                    console.log(res);
                }
            });
        },

        //加载
        loadMore: function loadMore() {
            this.loading = true;
            if (!this.isEnd) {
                this.page++;
                this.getData();
            }
        }
    }
};

/***/ })

});