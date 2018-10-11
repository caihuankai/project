webpackJsonp([77],{

/***/ 1150:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('main', {
    staticClass: "series-course"
  }, [_vm._m(0), _vm._v(" "), _c('article', {
    staticClass: "setting"
  }, [_c('section', {
    on: {
      "click": _vm.setName
    }
  }, [_c('mt-cell', {
    attrs: {
      "title": "系列课名称",
      "is-link": "",
      "value": _vm.courseName
    }
  })], 1), _vm._v(" "), _c('section', [_c('mt-cell', {
    attrs: {
      "title": "系列课分类",
      "is-link": "",
      "value": _vm.courseKind
    }
  })], 1), _vm._v(" "), _c('section', {
    on: {
      "click": function($event) {
        _vm.isShowPlan = true
      }
    }
  }, [_c('mt-cell', {
    attrs: {
      "title": "课程计划",
      "is-link": "",
      "value": _vm.courseNum != '' ? _vm.courseNum + '节' : '未设置'
    }
  })], 1), _vm._v(" "), _c('section', [_c('mt-cell', {
    attrs: {
      "title": "系列课介绍",
      "is-link": ""
    }
  })], 1), _vm._v(" "), _c('section', {
    on: {
      "click": _vm.setHost
    }
  }, [_c('mt-cell', {
    attrs: {
      "title": "填写主讲人",
      "is-link": "",
      "value": _vm.mainName.length > 6 ? _vm.mainName.substr(0, 6) + '...' : _vm.mainName
    }
  })], 1), _vm._v(" "), _c('section', {
    on: {
      "click": _vm.setHostInfo
    }
  }, [_c('mt-cell', {
    attrs: {
      "title": "主讲人介绍",
      "is-link": ""
    }
  })], 1), _vm._v(" "), _c('section', [_c('mt-cell', {
    attrs: {
      "title": "课程排序",
      "is-link": ""
    }
  })], 1), _vm._v(" "), _c('section', [_c('mt-cell', {
    attrs: {
      "title": "收费类型",
      "is-link": "",
      "value": _vm.courseFee
    }
  })], 1)]), _vm._v(" "), _c('div', {
    staticClass: "save-btn"
  }, [_vm._v("保存")]), _vm._v(" "), _c('mt-popup', {
    staticClass: "popup",
    attrs: {
      "popup-transition": "popup-fade"
    },
    model: {
      value: (_vm.shownametext),
      callback: function($$v) {
        _vm.shownametext = $$v
      },
      expression: "shownametext"
    }
  }, [_c('div', {
    staticClass: "msgbox"
  }, [_c('div', {
    staticClass: "title"
  }, [_vm._v("\n                课程名称\n            ")]), _vm._v(" "), _c('div', {
    staticClass: "msgcontent"
  }, [_c('textarea', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.textTmp),
      expression: "textTmp"
    }],
    attrs: {
      "autofocus": "",
      "placeholder": "请输入课程名称"
    },
    domProps: {
      "value": (_vm.textTmp)
    },
    on: {
      "input": function($event) {
        if ($event.target.composing) { return; }
        _vm.textTmp = $event.target.value
      }
    }
  })]), _vm._v(" "), _c('div', {
    staticClass: "msgbtns"
  }, [_c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": function($event) {
        _vm.shownametext = false
      }
    }
  }, [_vm._v("取消")]), _vm._v(" "), _c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": _vm.changeName
    }
  }, [_vm._v("确定")])])])]), _vm._v(" "), _c('mt-popup', {
    staticClass: "coursePlan",
    attrs: {
      "popup-transition": "popup-fade"
    },
    model: {
      value: (_vm.isShowPlan),
      callback: function($$v) {
        _vm.isShowPlan = $$v
      },
      expression: "isShowPlan"
    }
  }, [_c('h4', [_vm._v("设置课程计划")]), _vm._v(" "), _c('section', {
    staticClass: "num"
  }, [_c('input', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.tmpNum),
      expression: "tmpNum"
    }],
    attrs: {
      "type": "tel",
      "maxlength": "6",
      "placeholder": "请输入课程数"
    },
    domProps: {
      "value": (_vm.tmpNum)
    },
    on: {
      "input": function($event) {
        if ($event.target.composing) { return; }
        _vm.tmpNum = $event.target.value
      }
    }
  }), _vm._v(" "), _c('i', [_vm._v("节")])]), _vm._v(" "), _c('div', {
    staticClass: "btn-area"
  }, [_c('mt-button', {
    attrs: {
      "type": "default"
    },
    on: {
      "click": function($event) {
        _vm.isShowPlan = false;
        _vm.tmpNum = ''
      }
    }
  }, [_vm._v("取消")]), _vm._v(" "), _c('mt-button', {
    attrs: {
      "type": "primary"
    },
    on: {
      "click": _vm.confirmPlan
    }
  }, [_vm._v("确定")])], 1)]), _vm._v(" "), _c('mt-popup', {
    staticClass: "popup",
    attrs: {
      "popup-transition": "popup-fade"
    },
    model: {
      value: (_vm.showhosttext),
      callback: function($$v) {
        _vm.showhosttext = $$v
      },
      expression: "showhosttext"
    }
  }, [_c('div', {
    staticClass: "msgbox"
  }, [_c('div', {
    staticClass: "title"
  }, [_vm._v("\n                填写主讲人\n            ")]), _vm._v(" "), _c('div', {
    staticClass: "msgcontent"
  }, [_c('textarea', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.textTmp),
      expression: "textTmp"
    }],
    attrs: {
      "autofocus": "",
      "placeholder": "请填写主讲人"
    },
    domProps: {
      "value": (_vm.textTmp)
    },
    on: {
      "input": function($event) {
        if ($event.target.composing) { return; }
        _vm.textTmp = $event.target.value
      }
    }
  })]), _vm._v(" "), _c('div', {
    staticClass: "msgbtns"
  }, [_c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": function($event) {
        _vm.showhosttext = false
      }
    }
  }, [_vm._v("取消")]), _vm._v(" "), _c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": _vm.changeHost
    }
  }, [_vm._v("确定")])])])]), _vm._v(" "), _c('mt-popup', {
    staticClass: "popup",
    attrs: {
      "popup-transition": "popup-fade"
    },
    model: {
      value: (_vm.showhostintrotext),
      callback: function($$v) {
        _vm.showhostintrotext = $$v
      },
      expression: "showhostintrotext"
    }
  }, [_c('div', {
    staticClass: "msgbox"
  }, [_c('div', {
    staticClass: "title"
  }, [_vm._v("\n                主讲人及嘉宾介绍\n            ")]), _vm._v(" "), _c('div', {
    staticClass: "msgcontent"
  }, [_c('textarea', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.textTmp),
      expression: "textTmp"
    }],
    attrs: {
      "autofocus": "",
      "placeholder": "请填写主讲人的介绍信息"
    },
    domProps: {
      "value": (_vm.textTmp)
    },
    on: {
      "input": function($event) {
        if ($event.target.composing) { return; }
        _vm.textTmp = $event.target.value
      }
    }
  })]), _vm._v(" "), _c('div', {
    staticClass: "msgbtns"
  }, [_c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": function($event) {
        _vm.showhostintrotext = false
      }
    }
  }, [_vm._v("取消")]), _vm._v(" "), _c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": _vm.changeHostInfo
    }
  }, [_vm._v("确定")])])])])], 1)
},staticRenderFns: [function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('header', [_c('section', [_c('p', [_vm._v("点击修改图片")])])])
}]}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-31063909", module.exports)
  }
}

/***/ }),

/***/ 1261:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(992);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("fbc4fd14", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-31063909\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./courseSeriesSetting.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-31063909\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./courseSeriesSetting.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 464:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1261)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(889),
  /* template */
  __webpack_require__(1150),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\personalCenter\\courseSeriesSetting.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] courseSeriesSetting.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-31063909", Component.options)
  } else {
    hotAPI.reload("data-v-31063909", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 889:
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
//
//
//
//
//
//
//
//
//
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
	created: function created() {
		this.$store.commit('setTitle', '编辑系列课信息');
		this.$store.commit('hideTabber');
	},
	data: function data() {
		return {
			courseName: '', //课程名称
			courseKind: '', //课程分类
			courseNum: '', //课程计划
			mainName: '', //主讲人、
			courseFee: '', //收费类型
			shownametext: false, //课程名称弹窗
			textTmp: '',
			tmpNum: '',
			isShowPlan: false, //课程计划弹窗
			showhosttext: false, //填写主讲人弹窗
			courseHostInfo: '', //主讲人介绍
			showhostintrotext: false, //主讲人介绍弹窗
			creating: false //控制保存按钮只能点击一次
		};
	},

	methods: {
		setName: function setName() {
			this.textTmp = this.courseName;
			this.shownametext = true;
		},
		changeName: function changeName() {
			this.courseName = this.textTmp;
			this.shownametext = false;
		},
		confirmPlan: function confirmPlan() {
			//课程计划确定事件
			this.courseNum = this.tmpNum;
			this.isShowPlan = false;
		},
		setHost: function setHost() {
			this.textTmp = this.courseHost;
			this.showhosttext = true;
		},
		changeHost: function changeHost() {
			if (this.$bytesLength(this.textTmp) > 80) {
				Toast("填写主讲人不得超过40个汉字");
			} else {
				this.mainName = this.textTmp;
				this.showhosttext = false;
			}
		},
		setHostInfo: function setHostInfo() {
			this.textTmp = this.courseHostInfo;
			this.showhostintrotext = true;
		},
		changeHostInfo: function changeHostInfo() {
			if (this.$bytesLength(this.textTmp) > 400) {
				Toast("主讲人介绍不得超过200个汉字");
			} else {
				this.courseHostInfo = this.textTmp;
				this.showhostintrotext = false;
			}
		}
	},
	wstch: {
		tmpNum: function tmpNum(val) {
			//限制只能输入数字
			this.tmpNum = val.replace(/[^0-9]/ig, "");
		}
	}
};

/***/ }),

/***/ 992:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.series-course {\n  background: #ffffff;\n  /*margin-bottom: 1.2rem;*/\n}\n.series-course header {\n    padding: .44rem .4rem;\n    border-bottom: .2rem solid #f0f0f0;\n}\n.series-course header section {\n      width: 100%;\n      height: 3.16rem;\n      background: url(\"/images/series-herder.png\") no-repeat center center;\n      background-size: cover;\n      border-radius: 4px;\n      position: relative;\n}\n.series-course header section p {\n        height: .62rem;\n        width: 100%;\n        line-height: .62rem;\n        font-size: .28rem;\n        color: #ffffff;\n        text-align: center;\n        background: rgba(0, 0, 0, 0.5);\n        position: absolute;\n        left: 0;\n        bottom: 0;\n        border-bottom-left-radius: 4px;\n        border-bottom-right-radius: 4px;\n}\n.series-course .setting .mint-cell {\n    height: 1.12rem;\n    line-height: 1.12rem;\n    border-bottom: 1px solid #ebebeb;\n}\n.series-course .setting .mint-cell .mint-cell-wrapper {\n      line-height: inherit;\n      padding: 0 .3rem;\n      color: #666666;\n      font-size: .32rem;\n}\n.series-course .save-btn {\n    width: 100%;\n    height: .98rem;\n    background: #5f86fc;\n    color: #ffffff;\n    font-size: .32rem;\n    line-height: .98rem;\n    text-align: center;\n    border-top: .14rem solid #f0f0f0;\n}\n.series-course .popup {\n    width: 85%;\n    border-radius: 3px;\n    overflow: hidden;\n    background-color: #fff;\n}\n.series-course .popup .title {\n      padding-top: 15px;\n      font-size: 16px;\n      color: #333;\n      text-align: center;\n}\n.series-course .popup .msgcontent {\n      padding: 10px 20px 15px 20px;\n      min-height: 36px;\n      position: relative;\n}\n.series-course .popup .msgcontent textarea {\n        background-color: #f0f0f0;\n        border-radius: 8px;\n        padding: 15px 14px;\n        box-sizing: border-box;\n        height: 125px;\n        color: #666;\n        font-size: 15px;\n        resize: none;\n        width: 100%;\n}\n.series-course .popup .msgbtns {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      height: 66px;\n      line-height: 45px;\n}\n.series-course .popup .msgbtns a {\n        border-radius: 5px;\n        height: 45px;\n        font-size: 18px;\n        line-height: 45px;\n        width: 45%;\n        box-sizing: border-box;\n        text-align: center;\n}\n.series-course .popup .msgbtns a:first-child {\n          margin-left: 20px;\n          margin-right: 14px;\n          color: #999;\n          border: 1px solid #b2b2b2;\n}\n.series-course .popup .msgbtns a:last-child {\n          color: #fff;\n          background-color: #5f86fd;\n          margin-left: 14px;\n          margin-right: 20px;\n}\n.series-course .coursePlan {\n    width: 76%;\n    border-radius: 4px;\n    padding: .32rem .44rem;\n}\n.series-course .coursePlan h4 {\n      font-size: .32rem;\n      text-align: center;\n      color: #333333;\n}\n.series-course .coursePlan .num {\n      text-align: center;\n      width: 100%;\n      height: .9rem;\n      border-radius: 4px;\n      background: #f0f0f0;\n      line-height: .9rem;\n      margin: .56rem 0;\n}\n.series-course .coursePlan .num input {\n        text-align: center;\n        font-size: .3rem;\n        width: 80%;\n        background: #f0f0f0;\n}\n.series-course .coursePlan .num input::-webkit-input-placeholder {\n          color: #666;\n}\n.series-course .coursePlan .btn-area button {\n      width: 44%;\n      height: .9rem;\n      line-height: .9rem;\n}\n.series-course .coursePlan .btn-area .mint-button--default {\n      color: #999 !important;\n      border-color: #999 !important;\n      background: #fff;\n}\n.series-course .coursePlan .btn-area .mint-button--primary {\n      float: right;\n      background: #5f86fc;\n}\n", ""]);

// exports


/***/ })

});