webpackJsonp([25],{

/***/ 1074:
/***/ (function(module, exports) {

module.exports = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAACr0lEQVRIib3XwWtcRRwH8M8uS3w0KVUpBHqwYIo5iQi5eMhJcmtu+y7tqWi8iVBoL+I/0II3EVKhJ3OZSyX1lItQ8NRDQS/VUqhVIbQgMWt2iVg9zGx8Wd/Oe4HFLzyYN7/v/L4z8+b3m9/rDPt9LXAK61jDCl7H6WTbx2Pcxw62ixAOmhx2GoQXcR0fYKHNDDHAJm4UIexOI3UzDjbwEFdPICpxr+LhqCw3ppHqVjyH27h0ArEctnClCOGw2jm54jncnaGo5OvuqCzncsK3xQM0a6wl37XCG/IrHbYQGGVsl6rffCy8iJuZQZ+Ih+azDOdzzOPjDOfmqCwXq8LXcSYz4Cle4CNs19i/xodFCC8SdxrOJC2dYb9/CrvyIfMb3hHDax738HayPcBqEcJgVJbL+BavZnwNsNgVM1JTnL6SVnUWf+AifsavuJhEzyZOTlTSWu9pf4qXcAfvJsF1KEL4ZVSWLyXbUktfa10x9zbhJ3yF5xhnnAfpkfqeJ86TFv5WOsN+/3f/Jvw6DHBOvAz+gyKEY++jslwQdyTnc7/bQIAC5xs4VbyWxuRwujPs9/9u6XCv0v4Oq6l9D29WbLmwPELXlC2cwF+tptaeu98TL/G3MqRDcUU/1BmLEFar76OyfEPckbk6fsLjrlg55PAnnjVwqngmTjaH+z2xXHkvQ5rH9/ix0vcI78OoLL/AhYrtguaEtNMTc++ggXwuPWO8XGmvyH+qSQyw3cWBWCP9X9gsQjgY3043HA+XJixMaTdhL2kdXYu7uHYCB0viLm1qn5/h2rjynCz2vjTbequKrSKEy+OXyZrrinjKZ42d5PsIk8KH4l27NUPRLfHOPhbbvRriIS7jG7EOa5V7a7AnftNbdcbcn8QtLONTMfbaYpDGLE8TpfnfaYyZ/7T9A8XSs/2fiMnQAAAAAElFTkSuQmCC"

/***/ }),

/***/ 1156:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('main', {
    staticClass: "pointManage"
  }, [_c('header', {
    staticClass: "clearfix"
  }, [_c('p', [_vm._v("共"), _c('span', [_vm._v(_vm._s(_vm.totalNum))]), _vm._v("篇")]), _vm._v(" "), _c('div', {
    staticClass: "pull-right"
  }, [_vm._l((_vm.tagText), function(tagName) {
    return _c('span', [_vm._v(_vm._s(tagName))])
  }), _vm._v(" "), _c('span', {
    on: {
      "click": function($event) {
        _vm.showFilterSheet = true
      }
    }
  }, [_vm._v("筛选")])], 2)]), _vm._v(" "), _c('ul', {
    directives: [{
      name: "infinite-scroll",
      rawName: "v-infinite-scroll",
      value: (_vm.loadMore),
      expression: "loadMore"
    }],
    staticClass: "point-list",
    attrs: {
      "infinite-scroll-disabled": "loading",
      "infinite-scroll-distance": "10",
      "infinite-scroll-immediate-check": "false"
    }
  }, [_vm._l((_vm.pointList.viewpointList), function(item) {
    return _c('li', {
      class: {
        'set-top': item.top_status == 1
      }
    }, [_c('router-link', _vm._b({}, 'router-link', {
      to: "/column/detail/" + item.id
    }), [_c('h3', {
      class: {
        'the-top': item.top_status
      }
    }, [_vm._v(_vm._s(item.title))])]), _vm._v(" "), _c('section', {
      staticClass: "clearfix"
    }, [_c('div', {
      staticClass: "l-part"
    }, [_c('span', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (item.price != 0),
        expression: "item.price != 0"
      }]
    }, [_vm._v(_vm._s(item.price))]), _vm._v(" "), _c('span', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (item.status === 0),
        expression: "item.status === 0"
      }]
    }, [_vm._v("草稿")])]), _vm._v(" "), _c('div', {
      staticClass: "r-part"
    }, [_c('span', {
      staticClass: "per"
    }, [_vm._v(_vm._s(item.study_num) + "人看过")]), _vm._v(" "), _c('span', [_vm._v(_vm._s(_vm._f("yearTime")(item.publish_time)))]), _vm._v(" "), _c('button', {
      on: {
        "click": function($event) {
          _vm.operateClick(item.id, item.status, item.top_status)
        }
      }
    }, [_vm._v("操作")])])])], 1)
  }), _vm._v(" "), _c('nodata', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.pointList.viewpointList.length == 0),
      expression: "pointList.viewpointList.length == 0"
    }]
  })], 2), _vm._v(" "), _c('mt-actionsheet', {
    staticClass: "filter-sheet",
    attrs: {
      "actions": _vm.filterSheetMenu,
      "cancel-text": ""
    },
    model: {
      value: (_vm.showFilterSheet),
      callback: function($$v) {
        _vm.showFilterSheet = $$v
      },
      expression: "showFilterSheet"
    }
  }), _vm._v(" "), _c('mt-actionsheet', {
    staticClass: "operate-sheet",
    attrs: {
      "actions": _vm.OperateSheetMenu,
      "cancel-text": ""
    },
    model: {
      value: (_vm.showOperateSheet),
      callback: function($$v) {
        _vm.showOperateSheet = $$v
      },
      expression: "showOperateSheet"
    }
  }), _vm._v(" "), _c('mt-actionsheet', {
    staticClass: "operate-sheet",
    attrs: {
      "actions": _vm.publishedOperateSheetMenu,
      "cancel-text": ""
    },
    model: {
      value: (_vm.showpublishedOperateSheet),
      callback: function($$v) {
        _vm.showpublishedOperateSheet = $$v
      },
      expression: "showpublishedOperateSheet"
    }
  }), _vm._v(" "), _c('mt-popup', {
    staticClass: "popup",
    attrs: {
      "popup-transition": "popup-fade"
    },
    model: {
      value: (_vm.showDelPopup),
      callback: function($$v) {
        _vm.showDelPopup = $$v
      },
      expression: "showDelPopup"
    }
  }, [_c('div', {
    staticClass: "msgbox"
  }, [_c('div', {
    staticClass: "mess"
  }, [_c('p', [_vm._v("删除后，不可恢复观点")]), _vm._v(" "), _c('p', [_vm._v("是否继续操作？")])]), _vm._v(" "), _c('div', {
    staticClass: "btn-group"
  }, [_c('mt-button', {
    attrs: {
      "size": "normal",
      "type": "default"
    },
    on: {
      "click": function($event) {
        _vm.showDelPopup = false
      }
    }
  }, [_vm._v("否")]), _vm._v(" "), _c('mt-button', {
    staticClass: "pull-right",
    attrs: {
      "size": "normal",
      "type": "danger"
    },
    on: {
      "click": _vm.delClick
    }
  }, [_vm._v("是")])], 1)])])], 1)
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-38025420", module.exports)
  }
}

/***/ }),

/***/ 1266:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(998);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("1175f32e", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-38025420\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./pointManage.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-38025420\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./pointManage.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 488:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1266)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(913),
  /* template */
  __webpack_require__(1156),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\personalCenter\\pointManage.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] pointManage.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-38025420", Component.options)
  } else {
    hotAPI.reload("data-v-38025420", Component.options)
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

/***/ 687:
/***/ (function(module, exports) {

module.exports = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGoAAAAoCAYAAAAWsW/wAAAD/0lEQVR4nO2ZP0gbURzHv5eenlTTNkpFH5EKtV7/SIWig4PDTXaqY4eAU6A3C1kdAtUhg5M0g7plKDhlKjjcIBQEKVKocFKpoJxtpZE2KAa07RBzXOJdvHv3tL70fbZc3r13vM/98r7vRXo/OPgHgmtP5F8/gMAfQhQnCFGcIERxghDFCUIUJwhRnCBEcYIQxQlCFCfItDc+evMGd0ZGAt/3c3UVG69e+W7fqqq4EY0GHqdkWShZlmefN1UVLYQAAI4tC0emiUPTrNvnraEhz+9Oi8UL7w8DtSgpcjXF2JtK1Z0gL3azWexks1XX2jUNvakUlDNBtZQsC9uZDAqG4fr9k/n5C8ctWRb283ns5XI4KRYDP7cX1KKCVMV1oC+dxt0XL6quHZomTotF+0VQCIE6O4v9fB6fp6aoxlEIQVzXEdM0bCSTzGRJrE/Pb/b34/7UFLbSaRxtbrLsuoqR9XUAwK+1NXxKJuu27dF1xHUdQPmN38lmsZ/PV7Vp1zTEdR2tqgoA2MvlsJ3JuI7pVq0KIWhVVXQnErb4MMJrYfr7dXt4GE8WFtA2MICBxUXcHh5m2T0VlTccKFfQx5cvz0kCgIJhYCOZtNcZ54T7oWRZKBgGPjn6qK3gMDAT1TE2hodzc5DPFv4bbW14ODeHjrExVkNQ0XMmCQC2M5m6P0UnxSK2HBXQSTnRB441rlKhYWEiqjuRQP/MDCLNzdWdNzejf2YG3YkEi2GoiGkagHI1/Vpbu7D9oWnaYYJlRYQlnChJwr3JSfSmUoBXCoxE0JtK4d7kJCBJoYYLikKIXeEHHknOjSNHzKZJnM57WEV2alFSUxMeTE+DTEz4ak8mJvBgehpSUxPtkIFxxvAgE/bTR+W5IUej6NF1W5RXzKfqm/bGzvFxSLKMH8vLAIBISwtio6Pn2h2srOD38TEAQJJldI6P49vSEu2w1LDc08QdKbLeeLs1yTAM1KK+LS1VTbjS1YXYu3fn2n15/Rqlr19ph2GG1ybXDZniJMRJwTCwncl4nozQQC2KB5wT1RJAlDOpnbpU4n4+j+8uER8or28sq7dCw4sqWRYUQhDTtHObVC8qSfHE4/yuZFm+EiRLGv70vLKgt6qqrwR3a2jIrqggSfGyaXhRzsNRdXa27gZUIQR96bT92W8FXgUNL6pyIg6UQ8Lj+Xn06HpVuFAIQXcigadv39rXWYeBsDT0GlWhcrbXl05DjkYvjNe72Sz2crmrejxf/BeigLKsI9NEXNfRfhYWaikYBvZyuSsPCn5g9jeH0tWFZy77qA/Pn1+LfVQttcHismI1K5j/HyW4HBo+TDQKQhQnCFGcIERxghDFCUIUJwhRnCBEcYIQxQl/Ad+bZBOBAJGDAAAAAElFTkSuQmCC"

/***/ }),

/***/ 913:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
				value: true
});

var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; //
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

var _vuex = __webpack_require__(70);

var _mintUi = __webpack_require__(54);

var _nodata = __webpack_require__(544);

var _nodata2 = _interopRequireDefault(_nodata);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

exports.default = {
				computed: (0, _vuex.mapState)({
								userId: function userId(state) {
												return state.userInfo.user_id;
								}
				}),
				data: function data() {
								return {
												filterSheetMenu: [{ name: '全部', method: this.showAll }, { name: '状态' }, { name: '已发布', method: this.showPubliced }, { name: '草稿', method: this.showDraft }, { name: '类型' }, { name: '付费', method: this.showPay }, { name: '免费', method: this.showfree }],
												OperateSheetMenu: [{ name: '编辑', method: this.edit }, { name: '发布', method: this.setPubilc }, { name: '删除', method: this.remove }],
												publishedOperateSheetMenu: [
												//		            {name:'置顶',method:this.setTop},
												{ name: '删除', method: this.remove }],
												showFilterSheet: false, //是否显示筛选列表
												showOperateSheet: false, //是否显示操作列表
												showDelPopup: false, //是否显示删除弹窗
												showpublishedOperateSheet: false, //是否显示操作列表(已发布状态)
												pointList: '',
												totalNum: '', //观点总数
												topStatus: '', //置顶状态 0：非置顶；1: 置顶
												pointId: '', //当前观点ID
												pointStatus: '', //状态 0：草稿；1: 发布；2：删除
												level: '', //观点类型 0：免费；1：收费
												jsondata: '', //获取列表数据的参数
												tagText: ['全部'],
												newjsondata: '',
												defaultJson: {
																userId: '',
																perPage: 10,
																orderBy: 'top_status desc,id desc',
																pageNo: 1,
																statusIn: '0,1',
																isImageInfo: true,
																isAssistantDraft: true
												},
												loading: false //若为真，则无限滚动不会被触发
								};
				},
				created: function created() {
								this.$store.commit('setTitle', '观点管理');
								this.$store.commit('hideTabber');
								//        	this.initList();
								this.getFirstItem();
				},

				methods: {
								initList: function initList(json) {
												var _this = this;

												/*
            * json:用来拼接查询对象
            *
            * */

												this.$store.dispatch('getUserInfo', function (res) {
																/*拼接参数*/
																if ((typeof json === 'undefined' ? 'undefined' : _typeof(json)) === 'object') {
																				_this.extendObj(_this.defaultJson, json);
																}
																_this.defaultJson.userId = _this.userId;
																_this.defaultJson.pageNo = 1;
																_this.jsondata = _this.defaultJson;
																console.log('参数：', _this.jsondata);
																_this.$http.post(_this.hostUrl + '/Viewpoint/getViewPointListByUserId', _this.defaultJson, { emulateJSON: true }).then(function (res) {
																				var _data = res.body.data;
																				if (res.body.code === 200) {
																								_this.loading = false;
																								_this.pointList = _data;
																								_this.totalNum = _data.pagination.totalNum;
																				}
																});
												});
								},
								loadMore: function loadMore() {
												var _this2 = this;

												//下拉加载
												this.loading = true;
												this.jsondata.pageNo++;
												if (this.jsondata.pageNo <= this.pointList.pagination.totalPage) {
																//			        setTimeout(() => {
																this.$http.post(this.hostUrl + '/Viewpoint/getViewPointListByUserId', this.jsondata, { emulateJSON: true }).then(function (res) {
																				if (res.body.code === 200) {
																								_this2.pointList.viewpointList = _this2.pointList.viewpointList.concat(res.body.data.viewpointList);
																								_this2.loading = false;
																				}
																});
																//                    },1000)
												}
								},
								getFirstItem: function getFirstItem() {
												this.initList();
								},
								extendObj: function extendObj(target, source) {
												//对象拼接
												for (var obj in source) {
																target[obj] = source[obj];
												}
												return target;
								},
								operateClick: function operateClick(pointId, pointStatus, topStatus) {
												//pointStatus 0：草稿；1: 发布；2：删除
												//topStatus 0：非置顶；1: 置顶
												this.topStatus = topStatus;
												this.pointId = pointId;
												if (pointStatus === 1) {
																//已发布
																this.showpublishedOperateSheet = true;
												} else {
																this.showOperateSheet = true;
												}
												/*if(topStatus === 1){//已经置顶
             this.publishedOperateSheetMenu[0].name = '取消置顶';
            }else{
             this.publishedOperateSheetMenu[0].name = '置顶';
            }*/
												/*console.log('点击的观点ID',pointId);
            console.log('点击的观点状态',pointStatus);
            console.log('置顶',topStatus);
            console.log('this.jsondata',this.jsondata);*/
								},
								winReload: function winReload() {
												this.initList(this.jsondata);
												//	            window.location.reload();
								},
								showAll: function showAll() {
												this.tagText = ['全部'];
												delete this.defaultJson.level; //去除level的筛选
												this.initList({ //重新获取数据，页面不跳转
																userId: '',
																perPage: 10,
																orderBy: 'top_status desc,id desc',
																pageNo: 1,
																statusIn: '0,1'
												});
								},
								uptaglabel: function uptaglabel(type) {
												//type 1点击【状态】选项调用 2点击【类型】选择调用
												if (type === 1) {
																if (this.defaultJson.level !== 'undefined' && this.defaultJson.level === 1) {
																				this.tagText.splice(1, 0, '付费');
																} else if (this.defaultJson.level !== 'undefined' && this.defaultJson.level === 0) {
																				this.tagText.splice(1, 0, '免费');
																}
												} else if (type === 2) {
																if (this.defaultJson.status !== 'undefined' && this.defaultJson.statusIn == 1) {
																				this.tagText.splice(1, 0, '已发布');
																} else if (this.defaultJson.status !== 'undefined' && this.defaultJson.statusIn == 0) {
																				this.tagText.splice(1, 0, '草稿');
																}
												}
								},
								showPubliced: function showPubliced() {
												this.tagText = ['已发布'];
												this.uptaglabel(1);
												this.pointList = [];
												this.initList({ statusIn: 1 });
								},
								showDraft: function showDraft() {
												this.tagText = ['草稿'];
												this.uptaglabel(1);
												this.pointList = [];
												this.initList({ statusIn: 0 });
								},
								showPay: function showPay() {
												this.tagText = ['付费'];
												this.uptaglabel(2);
												this.pointList = [];
												this.initList({ level: 1 });
								},
								showfree: function showfree() {
												this.tagText = ['免费'];
												this.uptaglabel(2);
												this.pointList = [];
												this.initList({ level: 0 });
								},
								remove: function remove() {
												this.showDelPopup = true;
								},
								delClick: function delClick() {
												var _this3 = this;

												//删除观点
												this.$http.post(this.hostUrl + '/Viewpoint/setViewpointStatus', { viewpointId: this.pointId, status: 2 }, { emulateJSON: true }).then(function (res) {
																if (res.body.code === 200) {
																				//                        Toast('删除成功');
																				_this3.showDelPopup = false;
																				_this3.winReload();
																}
												});
								},
								setTop: function setTop() {
												var _this4 = this;

												var topStatus = '',
												    msg = '';
												if (this.topStatus === 0) {
																topStatus = 1;
																msg = '置顶成功';
												} else {
																topStatus = 0;
																msg = '取消置顶成功';
												}
												this.$http.post(this.hostUrl + '/Viewpoint/updateViewPointTopStatus', { viewpointId: this.pointId, topStatus: topStatus }, { emulateJSON: true }).then(function (res) {
																if (res.body.code === 200) {
																				(0, _mintUi.Toast)(msg);
																				console.log(res.body);
																				_this4.winReload();
																				_this4.srcollToTop();
																}
												});
								},
								setPubilc: function setPubilc() {
												var _this5 = this;

												//发布观点
												this.$http.post(this.hostUrl + '/Viewpoint/setViewpointStatus', { viewpointId: this.pointId, status: 1 }, { emulateJSON: true }).then(function (res) {
																if (res.body.code === 200) {
																				(0, _mintUi.Toast)('发布成功');
																				_this5.initList(_this5.jsondata);
																}
												});
								},
								edit: function edit() {
												//观点编辑
												this.$router.push('/sendView/' + this.pointId);
								}
				},
				components: {
								nodata: _nodata2.default
				}
};

/***/ }),

/***/ 998:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n@charset \"UTF-8\";\n.pointManage {\n  background: #fff;\n  min-height: 100%;\n}\n.pointManage header {\n    padding: .2rem .3rem;\n    border-bottom: 1px solid #ebebeb;\n}\n.pointManage header p {\n      font-size: .32rem;\n      color: #666666;\n      font-weight: bold;\n      float: left;\n      height: .48rem;\n      line-height: .48rem;\n}\n.pointManage header p span {\n        color: #cf2f2f;\n}\n.pointManage header div span {\n      display: inline-block;\n      border: 1px solid #a1aeb7;\n      border-radius: .25rem;\n      font-size: .28rem;\n      color: #a1aeb7;\n      padding: 3px .2rem;\n      color: #a1aeb7;\n      margin-left: 3px;\n}\n.pointManage header div span:last-child {\n      color: #cf2f2f;\n      border-color: #cf2f2f;\n}\n.pointManage .point-list li {\n    padding: 0.3rem;\n    border-bottom: 1px solid #ebebeb;\n}\n.pointManage .point-list li h3 {\n      color: #333;\n      font-size: .32rem;\n      line-height: .43rem;\n      /*超出多行省略*/\n      overflow: hidden;\n      text-overflow: ellipsis;\n      display: -webkit-box;\n      -webkit-line-clamp: 2;\n      -webkit-box-orient: vertical;\n}\n.pointManage .point-list li h3.the-top {\n        background: url(" + __webpack_require__(687) + ") no-repeat left top;\n        -webkit-background-size: 1.06rem auto;\n        text-indent: 1.1rem;\n        background-size: 1.06rem auto;\n}\n.pointManage .point-list li h3 span {\n        display: inline-block;\n        width: 0.3rem;\n        height: 0.3rem;\n        background: url(" + __webpack_require__(1074) + ") no-repeat center center;\n        background-size: 100%;\n        border-radius: 50%;\n}\n.pointManage .point-list li section {\n      font-size: 0.24rem;\n      margin-top: 0.2rem;\n}\n.pointManage .point-list li section .l-part {\n        float: left;\n        height: 0.48rem;\n        line-height: 0.48rem;\n}\n.pointManage .point-list li section .l-part span:first-child {\n          color: #cf2f2f;\n          background: url(\"/images/3.0/gift-icon.png\") no-repeat left center;\n          color: #c62f2f;\n          padding-left: 0.25rem;\n          background-size: 0.2rem auto;\n}\n.pointManage .point-list li section .l-part span:last-child {\n          color: #666666;\n}\n.pointManage .point-list li section .r-part {\n        float: right;\n        height: 0.48rem;\n        line-height: 0.48rem;\n        width: 66vw;\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-pack: justify;\n        -webkit-justify-content: space-between;\n            -ms-flex-pack: justify;\n                justify-content: space-between;\n}\n.pointManage .point-list li section .r-part span {\n          color: #888;\n          margin-left: 0.1rem;\n          vertical-align: middle;\n}\n.pointManage .point-list li section .r-part .per {\n          background: url(\"/images/3.0/eye-icon.png\") no-repeat left center;\n          padding-left: 0.4rem;\n          background-size: 0.3rem auto;\n}\n.pointManage .point-list li section .r-part button {\n          border: 1px solid #cf2f2f;\n          border-radius: .25rem;\n          font-size: .28rem;\n          background: #fff;\n          color: #cf2f2f;\n          padding: 3px .2rem;\n          margin-left: .3rem;\n          vertical-align: middle;\n}\n.pointManage .filter-sheet .mint-actionsheet-list .mint-actionsheet-listitem {\n    border-color: #ebebeb;\n    line-height: 50px;\n    height: 50px;\n}\n.pointManage .filter-sheet .mint-actionsheet-list .mint-actionsheet-listitem:nth-child(2),\n  .pointManage .filter-sheet .mint-actionsheet-list .mint-actionsheet-listitem:nth-child(5) {\n    text-align: left;\n    color: #545b63;\n    font-size: 15px;\n    line-height: 30px;\n    height: 30px;\n    background: #f4f6fc;\n    padding-left: 15px;\n}\n.pointManage .operate-sheet ul li.mint-actionsheet-listitem {\n    height: 50px;\n    line-height: 50px;\n    border-color: #f2f2f2;\n}\n.pointManage .operate-sheet ul li.mint-actionsheet-listitem:nth-child(3) {\n    border-top: 5px solid #f2f2f2;\n}\n.pointManage .popup {\n    width: 70%;\n    border-radius: 4px;\n    padding: 22px;\n}\n.pointManage .popup .mess {\n      text-align: center;\n      padding: 25px 0;\n      color: #333333;\n      font-size: 17px;\n}\n.pointManage .popup .btn-group button {\n      width: 44%;\n}\n.pointManage .page-infinite-loading {\n    text-align: center;\n}\n.pointManage .page-infinite-loading .mint-spinner-fading-circle {\n      margin: 0 auto;\n}\n", ""]);

// exports


/***/ })

});