webpackJsonp([35],{

/***/ 1037:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.interact-inf {\n  background-color: #fff;\n  padding: 0 0.24rem 1rem;\n  min-height: 80%;\n}\n.interact-inf h5 {\n    height: 0.6rem;\n    line-height: 0.6rem;\n    font-size: 0.32rem;\n}\n.interact-inf h5 span {\n      font-size: 0.24rem;\n      float: right;\n      color: #999;\n}\n.interact-inf .p {\n    font-size: 0.24rem;\n    line-height: 0.4rem;\n    background: #fbf7f7;\n    padding: .24rem;\n    color: #888;\n}\n.interact-inf .p span {\n      color: #cf2f2f;\n}\n.interact-inf a {\n    display: block;\n    padding: .55rem 0 .35rem;\n    border-bottom: 1px solid #efefef;\n}\n", ""]);

// exports


/***/ }),

/***/ 1195:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    directives: [{
      name: "infinite-scroll",
      rawName: "v-infinite-scroll",
      value: (_vm.loadMore),
      expression: "loadMore"
    }],
    staticClass: "interact-inf",
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
    }, [_c('h5', [_vm._v(_vm._s(item.title)), _c('span', [_vm._v(_vm._s(item.create_time))])]), _vm._v(" "), _c('div', {
      staticClass: "p",
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
     require("vue-hot-reload-api").rerender("data-v-79fefea1", module.exports)
  }
}

/***/ }),

/***/ 1305:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(1037);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("1fcee481", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-79fefea1\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./interactInformation.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-79fefea1\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./interactInformation.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 475:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1305)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(900),
  /* template */
  __webpack_require__(1195),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\personalCenter\\interactInformation.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] interactInformation.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-79fefea1", Component.options)
  } else {
    hotAPI.reload("data-v-79fefea1", Component.options)
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

/***/ 900:
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
    this.$store.commit("setTitle", "互动消息");
    this.getData();
  },

  methods: {
    getData: function getData() {
      var _this = this;

      var param = {
        type: 1,
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
            // res.data[0].link_info = 0

            if (JSON.parse(res.data[i].link_info) == 0) {
              res.data.splice(i, 1);
            }
            if (res.data[i].link == 6) {
              var link = JSON.parse(res.data[i].link_info).teacherId;
              res.data[i].link = "/live/" + link + "&" + _this.userId + "&1";
            } else if (res.data[i].link == 7) {
              var link = JSON.parse(res.data[i].link_info).courseId;
              if (JSON.parse(res.data[i].link_info).form == 3) {
                res.data[i].link = "/pptOnlive/" + link + "&1";
              } else {
                res.data[i].link = "/onlive/" + link + "&1";
              }
            } else if (res.data[i].link == 8 && res.data[i].link == 2) {
              var link = JSON.parse(res.data[i].link_info).courseId;
              res.data[i].link = "/personalCenter/course/" + link + "&" + _this.userId;
              break;
            } else if (res.data[i].link == 4) {
              var link = JSON.parse(res.data[i].link_info).viewpointId;
              res.data[i].link = "/personalSpace/viewpointDetail/" + link + "&" + _this.userId;
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