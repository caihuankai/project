webpackJsonp([61],{

/***/ 1132:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('main', {
    staticClass: "serverGift"
  }, [_c('mt-navbar', {
    staticClass: "page-part",
    model: {
      value: (_vm.selected),
      callback: function($$v) {
        _vm.selected = $$v
      },
      expression: "selected"
    }
  }, [_c('mt-tab-item', {
    attrs: {
      "id": "1"
    }
  }, [_c('span', {
    on: {
      "click": function($event) {
        _vm.tab(1)
      }
    }
  }, [_vm._v("Live直播")])]), _vm._v(" "), _c('mt-tab-item', {
    attrs: {
      "id": "2"
    }
  }, [_c('span', {
    on: {
      "click": function($event) {
        _vm.tab(2)
      }
    }
  }, [_vm._v("课程")])]), _vm._v(" "), _c('div', {
    staticClass: "border-line",
    style: ({
      'left': _vm.left
    })
  }, [_c('span')])], 1), _vm._v(" "), _c('article', {
    directives: [{
      name: "infinite-scroll",
      rawName: "v-infinite-scroll",
      value: (_vm.loadMore),
      expression: "loadMore"
    }],
    attrs: {
      "infinite-scroll-disabled": "loading",
      "infinite-scroll-distance": "50",
      "infinite-scroll-immediate-check": "false"
    }
  }, [_c('mt-tab-container', [(_vm.selected == '1') ? _c('mt-tab-container-item', [(_vm.loadedLevel == false) ? _c('loading') : (_vm.liveRecord.toString().length !== 0 && _vm.loadedLevel) ? [_c('div', {
    staticClass: "live-item"
  }, [_vm._l((_vm.liveRecord), function(itemss) {
    return _vm._l((itemss), function(items, key) {
      return _c('div', {
        staticClass: "item"
      }, [_c('h5', [_c('span', [_vm._v(_vm._s(items.date))])]), _vm._v(" "), _vm._l((items.list), function(item) {
        return _c('p', [_c('span', {
          staticClass: "icon"
        }), _vm._v(" "), _c('span', [_vm._v(_vm._s(item.alias.length > 4 ? item.alias.slice(0, 4) + '...' : item.alias))]), _vm._v(" "), _c('span', [_vm._v("赠与了")]), _vm._v(" "), _c('span', [_vm._v("我")]), _vm._v(" "), _c('span', [_vm._v(_vm._s(item.giftName))]), _vm._v(" "), _c('span', {
          staticClass: "income"
        }, [_vm._v(_vm._s(item.total_fee))])])
      })], 2)
    })
  })], 2), _vm._v(" "), _c('div', {
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
  })] : _c('noincome', {
    attrs: {
      "nochance": "noserverGift"
    }
  })], 2) : (_vm.selected == '2') ? _c('mt-tab-container-item', [(_vm.loadedLevel == false) ? _c('loading') : (_vm.courseData.length !== 0 && _vm.loadedLevel) ? [_vm._l((_vm.courseData), function(item) {
    return [_c('a', {
      attrs: {
        "href": "javascript:;"
      },
      on: {
        "click": function($event) {
          _vm.giftList(item.class_id, item.class_name)
        }
      }
    }, [_c('div', {
      staticClass: "media-box"
    }, [_c('div', {
      staticClass: "media-left"
    }, [_c('img', {
      attrs: {
        "src": item.src_img + '?imageView2/1/w/200/h/200/interlace/1',
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
      staticClass: "media-right"
    }, [_c('h5', [_vm._v(_vm._s(item.class_name))]), _vm._v(" "), _c('div', [_c('span', [_vm._v("收到礼物："), _c('i', [_vm._v(_vm._s(item.count) + "个")])]), _vm._v(" "), _c('p', [_vm._v("上课时间：" + _vm._s(_vm._f("yearTime")(item.begin_time)))])])])])])]
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
  })] : _c('noincome', {
    attrs: {
      "nochance": "noserverGift"
    }
  })], 2) : _vm._e()], 1), _vm._v(" "), _c('div', {
    staticClass: "gift-list",
    class: {
      active: _vm.popupVisible
    }
  }, [_c('h5', [_c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": function($event) {
        _vm.popupVisible = false
      }
    }
  }, [_vm._v("收起")]), _vm._v("\n                " + _vm._s(_vm.courseName) + "\n            ")]), _vm._v(" "), _c('div', {
    directives: [{
      name: "infinite-scroll",
      rawName: "v-infinite-scroll",
      value: (_vm.loadMoreChild),
      expression: "loadMoreChild"
    }],
    staticClass: "live-item",
    attrs: {
      "infinite-scroll-disabled": "loadingChild",
      "infinite-scroll-distance": "50",
      "infinite-scroll-immediate-check": "false"
    }
  }, [_vm._l((_vm.giftData), function(item) {
    return _c('p', [_c('span', {
      staticClass: "icon"
    }), _vm._v(" "), _c('span', [_vm._v(_vm._s(item.alias.length > 4 ? item.alias.slice(0, 4) + '...' : item.alias))]), _vm._v(" "), _c('span', [_vm._v("赠与了")]), _vm._v(" "), _c('span', [_vm._v("我")]), _vm._v(" "), _c('span', [_vm._v(_vm._s(item.giftName))]), _vm._v(" "), _c('span', {
      staticClass: "income"
    }, [_vm._v(_vm._s(item.total_fee))])])
  }), _vm._v(" "), _c('div', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.loadingChild && !_vm.isEndChild),
      expression: "loadingChild && !isEndChild"
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
      value: (_vm.isEndChild),
      expression: "isEndChild"
    }],
    attrs: {
      "text": "没有更多啦"
    }
  })], 2)])], 1)], 1)
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-15d30e50", module.exports)
  }
}

/***/ }),

/***/ 1245:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(974);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("e69b3bc6", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-15d30e50\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./serverGift.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-15d30e50\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./serverGift.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 492:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1245)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(917),
  /* template */
  __webpack_require__(1132),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\personalCenter\\serverGift.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] serverGift.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-15d30e50", Component.options)
  } else {
    hotAPI.reload("data-v-15d30e50", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 917:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
	value: true
});

var _nomore = __webpack_require__(135);

var _nomore2 = _interopRequireDefault(_nomore);

var _noincome = __webpack_require__(137);

var _noincome2 = _interopRequireDefault(_noincome);

var _mintUi = __webpack_require__(54);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

exports.default = {
	data: function data() {
		return {
			left: "", //tab设置
			courseData: "", //数据
			perPage: 10,
			selected: "1",
			listData: [],
			loading: false,
			loadedLevel: false, //ajax加载
			isEnd: false,
			params: {
				page: 1,
				type: 1
			},
			popupVisible: false, // 子礼物列表是否显示
			liveRecord: "",
			giftData: "", //子礼物
			loadingChild: false,
			isEndChild: false,
			pageNo: 1,
			class_id: "",
			courseName: ''
		};
	},


	computed: {
		userId: function userId() {
			return this.$store.state.userInfo.user_id;
		}
	},
	created: function created() {
		var _this = this;

		this.$store.commit("setTitle", "收到礼物");
		this.$store.dispatch("getUserInfo", function (res) {
			_this.getLive();
		});
	},

	methods: {
		//tab 切换

		tab: function tab(type) {
			this.loading = false;
			this.loadedLevel = false; //ajax加载
			this.isEnd = false;
			this.params.page = 1;
			if (type == 1) {
				this.selected = "1";
				this.getLive();

				this.left = "0%";
			} else {
				this.selected = "2";
				this.getCourseList(1);
				this.left = "50%";
			}
		},


		//获取礼物想详细数据
		giftList: function giftList(id, name) {
			var _this2 = this;

			this.popupVisible = true;
			this.pageNo = 1;
			this.loadingChild = false;
			this.isEndChild = false;
			this.class_id = id;
			this.courseName = name;
			this.$http.post(this.hostUrl + "/Income/classReceivingGift", { page: this.pageNo, class_id: id }, {
				emulateJSON: true
			}).then(function (res) {
				if (res.body.code == 200) {
					_this2.giftData = res.body.data || [];
					if (res.body.data.length < _this2.perPage) {
						_this2.loadingChild = true;
						_this2.isEndChild = true;
					}
				} else {
					(0, _mintUi.Toast)({
						message: res.body.msg,
						duration: 1000
					});
				}
			});
		},
		loadMoreChild: function loadMoreChild() {
			var _this3 = this;

			this.loadingChild = true;
			if (!this.isEndChild) {
				this.pageNo++;
				this.$http.post(this.hostUrl + "/Income/classReceivingGift", {
					page: this.pageNo,
					class_id: this.class_id
				}, {
					emulateJSON: true
				}).then(function (res) {
					if (res.body.code == 200) {
						setTimeout(function () {
							_this3.giftData = _this3.giftData.concat(res.body.data);
							if (res.body.data.length < _this3.perPage) {
								_this3.isEndChild = true;
							}
							_this3.loadingChild = false;
						}, 500);
					}
				});
			}
		},


		/*
          * 收到的礼物
          * @param  [type] $type 1：课程直播间 2：live直播间
          * @param  [type] $page 页码
          * @return [type]       [description]
          **/
		getCourseList: function getCourseList(level) {
			var _this4 = this;

			this.params.type = level;
			this.$http.post(this.hostUrl + "/Income/receivingGift", { page: 1, type: 1 }, {
				emulateJSON: true
			}).then(function (res) {
				if (res.body.code == 200) {
					_this4.courseData = res.body.data || [];
					_this4.loadedLevel = true;
					console.log("this.listData", _this4.listData);
					if (res.body.data.length < _this4.perPage) {
						_this4.loading = true;
						_this4.isEnd = true;
					}
				} else {
					(0, _mintUi.Toast)({
						message: res.body.msg,
						duration: 1000
					});
				}
			});
		},


		//live直播
		getLive: function getLive() {
			var _this5 = this;

			this.$http.post(this.hostUrl + "/Income/receivingGift", { page: 1, type: 2 }, { emulateJSON: true }).then(function (res) {
				if (res.body.code == 200) {
					_this5.liveRecord = [];
					_this5.liveRecord.push(res.body.data);
					_this5.loadedLevel = true;
					if (res.body.data.length < _this5.perPage) {
						_this5.loading = true;
						_this5.isEnd = true;
					}
				} else {
					// Toast({
					//   message: res.body.msg,
					//   duration: 1000
					// });
				}
			});
		},

		//加载
		loadMore: function loadMore() {
			var _this6 = this;

			this.loading = true;
			if (!this.isEnd) {
				this.params.page++;
				if (this.selected == "2") {
					this.params.type = 1;
					this.$http.post(this.hostUrl + "/Income/receivingGift", this.params, {
						emulateJSON: true
					}).then(function (res) {
						if (res.body.code == 200) {
							setTimeout(function () {
								_this6.courseData = _this6.courseData.concat(res.body.data);
								if (res.body.data.length < _this6.perPage) {
									_this6.isEnd = true;
								}
								_this6.loading = false;
							}, 500);
						}
					});
				} else {
					this.params.type = 2;
					this.$http.post(this.hostUrl + "/Income/receivingGift", this.params, {
						emulateJSON: true
					}).then(function (res) {
						if (res.body.code == 200) {
							_this6.liveRecord.push(res.body.data);
							if (res.body.data.toString().length < _this6.perPage) {
								_this6.isEnd = true;
							}
							_this6.loading = false;
						} else {
							(0, _mintUi.Toast)({
								message: res.body.msg,
								duration: 1000
							});
						}
					});
				}
			}
		}
	},
	components: {
		nomore: _nomore2.default,
		noincome: _noincome2.default
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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

/***/ 974:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.serverGift {\n  box-sizing: border-box;\n  padding-bottom: 1rem;\n  min-height: 100%;\n  background: #ffffff;\n}\n.serverGift .page-part {\n    height: 0.94rem;\n    border-bottom: 1px solid #ededed;\n    padding: 0;\n    position: fixed;\n    width: 100vw;\n    z-index: 111;\n}\n.serverGift .border-line {\n    display: -webkit-box;\n    display: -webkit-flex;\n    display: -ms-flexbox;\n    display: flex;\n    width: 50%;\n    position: absolute;\n    bottom: 0.08rem;\n    left: 0;\n    z-index: 111;\n    -webkit-box-pack: center;\n    -webkit-justify-content: center;\n        -ms-flex-pack: center;\n            justify-content: center;\n    text-align: center;\n}\n.serverGift .border-line span {\n      display: inline-block;\n      width: 0.5rem;\n      border-radius: 0.2rem;\n      background-color: #c62f2f;\n      height: 0.06rem;\n}\n.serverGift .mint-navbar {\n    position: fixed;\n    font-size: 0.32rem;\n    color: #666;\n}\n.serverGift .mint-navbar .mint-tab-item-label {\n      font-size: 0.32rem;\n}\n.serverGift .mint-navbar .mint-tab-item {\n      background-color: transparent;\n      padding: 5px 0;\n      height: 0.7rem;\n}\n.serverGift .mint-navbar .mint-tab-item span {\n        display: inline-block;\n        height: 0.7rem;\n        line-height: 0.7rem;\n        width: 100%;\n}\n.serverGift .mint-navbar .is-selected {\n      color: #c62f2f;\n}\n.serverGift .mint-navbar .is-selected span {\n        /* border-bottom: 2px solid rgb(95, 134, 253);*/\n}\n.serverGift .mint-tab-container {\n    padding-top: 0.94rem;\n    background-color: #fff;\n}\n.serverGift .mint-tab-container a {\n      display: block;\n      padding: 0 .24rem;\n      position: relative;\n      /*.media-box {\n                display: flex;\n                padding: .3rem .3rem .3rem 0;\n                border-bottom: 1px solid #f5f7f8;\n                .media-left {\n                    height: 1.5rem;\n                    width: 1.5rem;\n                    padding-right: .3rem;\n                    img {\n                        width: 100%;\n                        height: 100%;\n                        border-radius: 0.1rem;\n                    }\n                }\n                .media-right {\n                    flex: 1;\n                    height: 1.5rem;\n                    display: flex;\n                    flex-direction: column;\n                    justify-content: space-between;\n                    line-height: 1;\n\n                    h5 {\n                        font-size: 0.34rem;\n                        color: #545b63;\n                        height: 0.34rem;\n                        line-height: 0.38rem;\n                    }\n\n                    .name {\n                        span {\n                            font-size: 0.24rem;\n                            // border: 1px solid #ccc;\n                            color: #c62f2f;\n                            padding: 1px 3px;\n                            border-radius: 0.2rem;\n                        }\n                    }\n                    .info {\n                        font-size: 0.26rem;\n                        color: #545b63;\n                        display: flex;\n                        position: relative;\n\n                        .time {\n                            text-align: center;\n                            flex: none;\n                            white-space: nowrap;\n                        }\n                        .price {\n                            position: absolute;\n                            font-size: 0.24rem;\n                            right: 0;\n                            padding: 0.06rem 0.12rem;\n                            border-radius: 0.2rem;\n                            // border: 1px solid #e2e2e2;\n                            text-align: right;\n                            color: #c62f2f;\n                        }\n                    }\n                    .mess {\n                        font-size: .26rem;\n                        p {\n                            float: left;\n                            color: #545b63;\n                            line-height: .38rem;\n                            i {\n                                color: #c62f2f;\n                            }\n                        }\n                        h5 {\n                            float: right;\n                            color: #a1aeb7;\n                            font-size: .26rem;\n                        }\n                    }\n                }\n            }*/\n}\n.serverGift .mint-tab-container a .media-box {\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        padding: .36rem 0;\n        border-bottom: 1px solid #ebebeb;\n}\n.serverGift .mint-tab-container a .media-box .media-left {\n          height: .9rem;\n          width: 1.6rem;\n          padding-right: 0.2rem;\n          position: relative;\n}\n.serverGift .mint-tab-container a .media-box .media-left img {\n            width: 100%;\n            height: 100%;\n}\n.serverGift .mint-tab-container a .media-box .media-left span.series {\n            position: absolute;\n            top: 0;\n            left: 0;\n            font-size: .2rem;\n            color: #ffffff;\n            background: #c62f2f;\n            padding: .05rem .06rem;\n}\n.serverGift .mint-tab-container a .media-box .media-left span.ppt {\n            position: absolute;\n            bottom: 0;\n            right: .2rem;\n            width: .6rem;\n            height: .4rem;\n            background: rgba(0, 0, 0, 0.3);\n            text-align: center;\n            line-height: .4rem;\n            color: #ffffff;\n            font-size: .2rem;\n}\n.serverGift .mint-tab-container a .media-box .media-left span.video {\n            position: absolute;\n            bottom: 0;\n            right: .2rem;\n            width: .6rem;\n            height: .4rem;\n            background: rgba(0, 0, 0, 0.3) url(\"/images/3.0/video_icon.png\") no-repeat center center;\n            background-size: 60%;\n}\n.serverGift .mint-tab-container a .media-box .media-right {\n          -webkit-box-flex: 1;\n          -webkit-flex: 1;\n              -ms-flex: 1;\n                  flex: 1;\n          display: -webkit-box;\n          display: -webkit-flex;\n          display: -ms-flexbox;\n          display: flex;\n          -webkit-box-orient: vertical;\n          -webkit-box-direction: normal;\n          -webkit-flex-direction: column;\n              -ms-flex-direction: column;\n                  flex-direction: column;\n          -webkit-justify-content: space-around;\n              -ms-flex-pack: distribute;\n                  justify-content: space-around;\n          line-height: 1;\n}\n.serverGift .mint-tab-container a .media-box .media-right h5 {\n            font-size: 0.32rem;\n            color: #1c0808;\n            line-height: 0.38rem;\n            overflow: hidden;\n            text-overflow: ellipsis;\n            display: -webkit-box;\n            -webkit-box-orient: vertical;\n            -webkit-line-clamp: 1;\n            margin-bottom: .1rem;\n}\n.serverGift .mint-tab-container a .media-box .media-right > div {\n            font-size: .24rem;\n}\n.serverGift .mint-tab-container a .media-box .media-right > div span {\n              /*&::before{\n                                content: '';\n                                display: inline-block;\n                                width: 0.24rem;\n                                height: 0.24rem;\n                                vertical-align: middle;\n                                background: url(../assets/images/3.0/gift-icon.png) center center no-repeat;\n                                background-size: 100% 100%;\n                                margin-right: .05rem;\n                            }*/\n}\n.serverGift .mint-tab-container a .media-box .media-right > div span i {\n                vertical-align: middle;\n                color: #c62f2f;\n}\n.serverGift .mint-tab-container a .media-box .media-right > div p {\n              float: right;\n              color: #888888;\n}\n.serverGift .live-item {\n    background: #fff;\n    padding: 0 15px;\n    box-sizing: border-box;\n    width: 100vw;\n    color: #545b63;\n}\n.serverGift .live-item .item {\n      padding-top: 20px;\n}\n.serverGift .live-item h5 {\n      text-align: center;\n      font-size: 0.32rem;\n}\n.serverGift .live-item h5 span {\n        display: inline-block;\n        background: #e4e4e4;\n        padding: 0.1rem 0.2rem;\n        border-radius: 0.1rem;\n}\n.serverGift .live-item p {\n      background-color: #f5f7f8;\n      margin-top: 0.4rem;\n      border-radius: 0.1rem;\n      height: 0.7rem;\n      line-height: 0.7rem;\n      font-size: 0.28rem;\n      padding: 0 0.3rem;\n}\n.serverGift .live-item p span {\n        margin-left: 0.1rem;\n}\n.serverGift .live-item p .icon {\n        display: inline-block;\n        width: 0.24rem;\n        height: 0.7rem;\n        vertical-align: middle;\n        background: url(\"/images/3.0/icon-01.png\") left 0.17rem no-repeat;\n        background-size: 0.24rem auto;\n}\n.serverGift .live-item p .income {\n        margin-right: .1rem;\n        color: #c62f2f;\n}\n.serverGift .gift-list {\n    position: fixed;\n    top: 0;\n    background-color: #f4f6fc;\n    -webkit-transform: translateY(100%);\n        -ms-transform: translateY(100%);\n            transform: translateY(100%);\n    width: 100%;\n    height: 100%;\n    z-index: 2000;\n    display: -webkit-box;\n    display: -webkit-flex;\n    display: -ms-flexbox;\n    display: flex;\n    -webkit-box-orient: vertical;\n    -webkit-box-direction: normal;\n    -webkit-flex-direction: column;\n        -ms-flex-direction: column;\n            flex-direction: column;\n    font-size: 0.32rem;\n    color: #666;\n    -webkit-transition: -webkit-transform 0.3s ease;\n    transition: -webkit-transform 0.3s ease;\n    transition: transform 0.3s ease;\n    transition: transform 0.3s ease, -webkit-transform 0.3s ease;\n}\n.serverGift .gift-list.active {\n      -webkit-transform: translateY(0);\n          -ms-transform: translateY(0);\n              transform: translateY(0);\n}\n.serverGift .gift-list h5 {\n      height: 0.88rem;\n      position: relative;\n      line-height: 0.88rem;\n      background-color: #fff;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n      padding: 0 0.2rem;\n      text-align: center;\n      border-bottom: 1px solid #ededed;\n}\n.serverGift .gift-list h5 a {\n        font-size: 0.28rem;\n        left: 0.34rem;\n        position: absolute;\n        width: .9rem;\n        text-align: center;\n        background: url(\"/images/3.0/below.png\") left center no-repeat;\n        background-size: 0.26rem auto;\n        padding-left: 0.4rem;\n}\n", ""]);

// exports


/***/ })

});