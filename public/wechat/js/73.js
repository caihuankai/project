webpackJsonp([73],{

/***/ 1112:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('main', {
    staticClass: "series-course"
  }, [_c('header', [_c('section', {
    class: {
      'is-img': _vm.bgSrc != ''
    },
    on: {
      "click": _vm.setCover
    }
  }, [_c('span', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.bgSrc == ''),
      expression: "bgSrc == ''"
    }]
  }), _vm._v(" "), _c('h4', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.bgSrc == ''),
      expression: "bgSrc == ''"
    }]
  }, [_vm._v("上传系列课封面")]), _vm._v(" "), _c('p', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.bgSrc == ''),
      expression: "bgSrc == ''"
    }]
  }, [_vm._v("图片尺寸：750×422像素")]), _vm._v(" "), _c('img', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.bgSrc != ''),
      expression: "bgSrc != ''"
    }],
    attrs: {
      "src": _vm.bgSrc,
      "alt": "上传系列课封面"
    }
  })])]), _vm._v(" "), _c('section', {
    staticClass: "class-name"
  }, [_c('p', [_vm._v("系列课名称")]), _vm._v(" "), _c('input', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.courseName),
      expression: "courseName"
    }],
    attrs: {
      "type": "text",
      "placeholder": "请输入系列课名字"
    },
    domProps: {
      "value": (_vm.courseName)
    },
    on: {
      "input": function($event) {
        if ($event.target.composing) { return; }
        _vm.courseName = $event.target.value
      }
    }
  })]), _vm._v(" "), _c('section', {
    staticClass: "class-time"
  }, [_c('section', {
    staticClass: "time"
  }, [_c('p', [_vm._v("系列课分类")]), _vm._v(" "), _c('div', {
    on: {
      "click": function($event) {
        _vm.isShowPicker = true
      }
    }
  }, [_vm._v(_vm._s(_vm.courseKind ? _vm.courseKind : '未设置'))])]), _vm._v(" "), _c('section', {
    staticClass: "time"
  }, [_c('p', [_vm._v("课程计划")]), _vm._v(" "), _c('div', {
    on: {
      "click": function($event) {
        _vm.isShowPlan = true
      }
    }
  }, [_vm._v(_vm._s(_vm.courseNum ? _vm.courseNum + '节' : '未填写'))])]), _vm._v(" "), (_vm.isAssistant == 1) ? _c('section', {
    staticClass: "time"
  }, [_c('p', [_vm._v("指定老师")]), _vm._v(" "), _c('div', {
    on: {
      "click": function($event) {
        _vm.getTeacher(1)
      }
    }
  }, [_vm._v("\n                " + _vm._s(_vm.teacher == "" ? '未选择老师' : _vm.teacher.username) + "\n                "), (_vm.isDel == true) ? _c('i', {
    staticClass: "mintui mintui-field-error",
    on: {
      "click": function($event) {
        $event.stopPropagation();
        _vm.isDelFun($event)
      }
    }
  }) : _vm._e()])]) : _vm._e()]), _vm._v(" "), _c('div', {
    staticClass: "course-type"
  }, [_c('ul', {
    staticClass: "choose clearfix"
  }, [_c('li', [_c('div', {
    class: {
      active: _vm.tmpFee == 0
    },
    on: {
      "click": function($event) {
        _vm.tmpFee = 0
      }
    }
  }, [_c('p', [_vm._v("免费公开")])]), _vm._v(" "), _c('input', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.tmpFee),
      expression: "tmpFee"
    }],
    attrs: {
      "type": "radio",
      "name": "course-type",
      "value": "0"
    },
    domProps: {
      "checked": _vm._q(_vm.tmpFee, "0")
    },
    on: {
      "__c": function($event) {
        _vm.tmpFee = "0"
      }
    }
  })]), _vm._v(" "), _c('li', [_c('div', {
    class: {
      active: _vm.tmpFee == 2
    },
    on: {
      "click": function($event) {
        _vm.tmpFee = 2
      }
    }
  }, [_c('p', [_vm._v("固定收费")])]), _vm._v(" "), _c('input', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.tmpFee),
      expression: "tmpFee"
    }],
    attrs: {
      "type": "radio",
      "name": "course-type",
      "value": "2"
    },
    domProps: {
      "checked": _vm._q(_vm.tmpFee, "2")
    },
    on: {
      "__c": function($event) {
        _vm.tmpFee = "2"
      }
    }
  })])]), _vm._v(" "), _c('ul', {
    staticClass: "extra"
  }, [_c('li', {
    class: {
      active: _vm.tmpFee == 0
    }
  }, [_vm._v("\n                所有人都能收听到直播\n            ")]), _vm._v(" "), _c('li', {
    class: {
      active: _vm.tmpFee == 2
    }
  }, [_c('div', {
    staticClass: "bottom"
  }, [_c('section', [_c('span', {
    staticClass: "pre"
  }, [_vm._v("优惠价")]), _vm._v(" "), _c('input', {
    directives: [{
      name: "model",
      rawName: "v-model.number",
      value: (_vm.coursePrice),
      expression: "coursePrice",
      modifiers: {
        "number": true
      }
    }],
    ref: "priceInput",
    attrs: {
      "type": "number",
      "placeholder": "最少为1"
    },
    domProps: {
      "value": (_vm.coursePrice)
    },
    on: {
      "focus": _vm.priceFocus,
      "blur": [_vm.priceBlur, function($event) {
        _vm.$forceUpdate()
      }],
      "input": function($event) {
        if ($event.target.composing) { return; }
        _vm.coursePrice = _vm._n($event.target.value)
      }
    }
  }), _vm._v(" "), _c('span', {
    staticClass: "red"
  })]), _vm._v(" "), _c('section', [_c('span', {
    staticClass: "pre"
  }, [_vm._v("原价")]), _vm._v(" "), _c('input', {
    directives: [{
      name: "model",
      rawName: "v-model.number",
      value: (_vm.originPrice),
      expression: "originPrice",
      modifiers: {
        "number": true
      }
    }],
    ref: "priceInput",
    attrs: {
      "type": "number",
      "placeholder": "不填或为0不展示此项"
    },
    domProps: {
      "value": (_vm.originPrice)
    },
    on: {
      "focus": _vm.priceFocus,
      "blur": [_vm.priceBlur, function($event) {
        _vm.$forceUpdate()
      }],
      "input": function($event) {
        if ($event.target.composing) { return; }
        _vm.originPrice = _vm._n($event.target.value)
      }
    }
  }), _vm._v(" "), _c('span', {
    staticClass: "red"
  })])]), _vm._v(" "), _c('p', [_vm._v("提示：原价可不设置，若设置请比优惠价高。")])])])]), _vm._v(" "), _c('button', {
    staticClass: "save-btn",
    on: {
      "click": _vm.createFn
    }
  }, [_vm._v("保存并创建")]), _vm._v(" "), _c('mt-popup', {
    staticClass: "courseType",
    attrs: {
      "popup-transition": "popup-fade"
    },
    model: {
      value: (_vm.isShowPicker),
      callback: function($$v) {
        _vm.isShowPicker = $$v
      },
      expression: "isShowPicker"
    }
  }, [_c('div', {
    staticClass: "type-title"
  }, [_vm._v("课程分类")]), _vm._v(" "), _c('ul', _vm._l((_vm.courseAction), function(item, i) {
    return _c('li', {
      key: item.id
    }, [_c('label', {
      attrs: {
        "for": 'type' + item.id
      }
    }, [_c('p', [_vm._v(_vm._s(item.name))]), _vm._v(" "), _c('input', {
      attrs: {
        "type": "radio",
        "name": "coursetype",
        "id": 'type' + item.id
      },
      domProps: {
        "checked": _vm.tmpId == item.id
      },
      on: {
        "change": function($event) {
          _vm.setType(item)
        }
      }
    }), _vm._v(" "), _c('span', {
      staticClass: "tick sprite"
    })])])
  })), _vm._v(" "), _c('a', {
    staticClass: "confirm-btn",
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": _vm.confirmType
    }
  }, [_vm._v("确定")])]), _vm._v(" "), _c('mt-popup', {
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
    staticClass: "select-box",
    staticStyle: {
      "top": "20%",
      "background-color": "transparent"
    },
    attrs: {
      "popup-transition": "popup-fade",
      "position": "bottom"
    },
    model: {
      value: (_vm.popupVisibleteacher),
      callback: function($$v) {
        _vm.popupVisibleteacher = $$v
      },
      expression: "popupVisibleteacher"
    }
  }, [_c('div', {
    staticClass: "header"
  }, [_c('button', {
    on: {
      "click": function($event) {
        _vm.popupVisibleteacher = false;
        _vm.teachershow = false;
        if (_vm.teacher == '') {
          _vm.isDel = false
        } else {
          _vm.isDel = true
        }
      }
    }
  }, [_vm._v("完成指定")])]), _vm._v(" "), _c('div', {
    directives: [{
      name: "infinite-scroll",
      rawName: "v-infinite-scroll",
      value: (_vm.teacherLoadMore),
      expression: "teacherLoadMore"
    }],
    staticClass: "tag-list",
    attrs: {
      "infinite-scroll-disabled": _vm.teacherLoading,
      "infinite-scroll-distance": "50",
      "infinite-scroll-immediate-check": "false"
    }
  }, [(_vm.teachershow && _vm.userIdList.length > 0) ? _vm._l((_vm.userIdList), function(item) {
    return _c('label', {
      key: item.user_id
    }, [_c('span', {
      staticClass: "img",
      style: ({
        'background-image': 'url(' + item.pic + ')'
      })
    }), _vm._v(" "), _c('p', [_vm._v(_vm._s(item.username))]), _vm._v(" "), _c('input', {
      directives: [{
        name: "model",
        rawName: "v-model",
        value: (_vm.teacher),
        expression: "teacher"
      }],
      attrs: {
        "type": "radio",
        "name": item.username
      },
      domProps: {
        "value": item,
        "checked": _vm._q(_vm.teacher, item)
      },
      on: {
        "__c": function($event) {
          _vm.teacher = item
        }
      }
    }), _vm._v(" "), _c('span', {
      staticClass: "icon"
    })])
  }) : (_vm.userIdList.length == 0 && _vm.teachershow) ? _c('p', [_vm._v(" 您绑定的老师已被禁用，暂无可指定老师 ")]) : _vm._e(), _vm._v(" "), _c('div', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.teacherLoading && !_vm.teacherEnd),
      expression: "teacherLoading && ! teacherEnd"
    }],
    staticClass: "loading-ico"
  }, [_c('mt-spinner', {
    attrs: {
      "type": "fading-circle",
      "size": 18
    }
  }), _vm._v(" "), _c('span', [_vm._v("正在加载")])], 1)], 2)])], 1)
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-034fc3d3", module.exports)
  }
}

/***/ }),

/***/ 1225:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(954);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("69e2299a", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-034fc3d3\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./createSeriesCourse.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-034fc3d3\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./createSeriesCourse.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 468:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1225)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(893),
  /* template */
  __webpack_require__(1112),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\personalCenter\\createSeriesCourse.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] createSeriesCourse.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-034fc3d3", Component.options)
  } else {
    hotAPI.reload("data-v-034fc3d3", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 893:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function(NProgress) {

Object.defineProperty(exports, "__esModule", {
	value: true
});

var _mintUi = __webpack_require__(54);

var _vuex = __webpack_require__(70);

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
	computed: (0, _vuex.mapState)({
		isWeiXin: function isWeiXin(state) {
			return state.isWeiXin;
		},
		isAssistant: function isAssistant(state) {
			return state.userInfo.isAssistant;
		}
	}),
	created: function created() {
		this.$store.commit('setTitle', '填写系列课信息');
		this.$store.commit('hideTabber');
		this.getCourseKind();
		//			this.getTeacher();
	},
	data: function data() {
		return {
			courseAction: [], //课程分类列表(php)
			courseKind: '', //所选中的课程分类
			courseKindId: '', //所选中的课程分类id
			isShowPicker: false, //是否显示课程分类弹窗
			tmpId: '',
			tmpType: '',
			isShowPlan: false, //是否显示课程计划弹窗
			courseNum: '', //课程计划数量
			tmpNum: '',
			isShowFee: false, //是否显示课程收费弹窗
			tmpFee: 0,
			courseFee: "未设置", //收费类型
			courseName: '',
			coursePrice: null,
			localCover: { //封面图片的信息
				localId: "", //本地选择图片id
				serverId: "", //上传返回服务端id
				downloadId: "" //下载返回本地id
			},
			bgSrc: '', //封面预览地址
			popupVisibleteacher: false, // 讲师选择
			teacher: "",
			isDel: false,
			userIdList: [],
			teacherLoading: true,
			teacherPage: 1,
			teacherEnd: false,
			creating: false, //控制保存按钮点击一次 true为不可点击 false为可点击
			isPriceFocus: false,
			originPrice: null, //原价
			teachershow: false
		};
	},

	methods: {
		priceFocus: function priceFocus() {
			this.isPriceFocus = true;
			this.$refs.priceInput.scrollIntoView();
		},
		priceBlur: function priceBlur() {
			this.isPriceFocus = false;
		},
		setCover: function setCover() {
			var _this = this;

			//设置封面
			if (this.isWeiXin) {
				wx.chooseImage({ //微信拍照或从手机相册中选图
					count: 1, // 默认9
					sizeType: ["original", "compressed"], // 可以指定是原图还是压缩图，默认二者都有
					sourceType: ["album", "camera"], // 可以指定来源是相册还是相机，默认二者都有
					success: function success(res) {
						_this.localCover.localId = res.localIds[0]; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
						_this.uploadImage(_this.localCover);
					}
				});
			} else {
				(0, _mintUi.Toast)('请在微信中上传封面');
			}
		},
		uploadImage: function uploadImage(obj) {
			var _this2 = this;

			wx.uploadImage({ //微信上传图片
				localId: obj.localId, // 需要上传的图片的本地ID，由chooseImage接口获得
				isShowProgressTips: 1, // 默认为1，显示进度提示
				success: function success(res) {
					obj.serverId = res.serverId; // 返回图片的服务器端ID
					wx.getLocalImgData({ //微信获取本地图片,封面预览
						localId: obj.localId, // 图片的localID
						success: function success(res) {
							var u = navigator.userAgent;
							var isAndroid = u.indexOf("Android") > -1 || u.indexOf("Adr") > -1; //android终端
							var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端
							if (isAndroid) {
								_this2.bgSrc = obj.localId;
							} else if (isiOS) {
								_this2.bgSrc = res.localData;
							}
							(0, _mintUi.Toast)({
								message: "上传成功",
								duration: 1000
							});
						}
					});
				}
			});
		},
		isDelFun: function isDelFun() {
			this.teacher = '';
			this.isDel = false;
		},

		//获取指定老师
		getTeacher: function getTeacher(type) {
			var _this3 = this;

			this.popupVisibleteacher = true;
			this.$http.get("/User/getManagerTeacherList", {
				params: { page: this.teacherPage }
			}).then(function (res) {
				if (res.body.code == 200) {
					_this3.teacherLoading = false;
					if (type == 1) {
						_this3.userIdList = [];
						_this3.teacherPage = 1;
					}
					_this3.userIdList = _this3.userIdList.concat(res.body.data);
					_this3.teachershow = true;
					if (res.body.data.length < 20) {
						_this3.teacherEnd = true;
						_this3.teacherLoading = true;
					}
				}
			});
		},
		teacherLoadMore: function teacherLoadMore() {
			if (this.teacherEnd || this.teacherLoading) {
				return;
			}
			this.teacherLoading = true;
			this.teacherPage++;
			this.getTeacher();
		},
		showPicker: function showPicker() {
			this.isShowPicker = true;
		},
		setType: function setType(val) {
			//课程分类input change事件
			this.tmpType = val.name;
			this.tmpId = val.id;
		},
		confirmType: function confirmType() {
			//课程分类确定事件
			this.isShowPicker = false;
			this.courseKind = this.tmpType;
			this.courseKindId = this.tmpId;
		},
		confirmPlan: function confirmPlan() {
			//课程计划确定事件
			this.courseNum = this.tmpNum;
			this.isShowPlan = false;
		},
		confirmFee: function confirmFee() {
			this.isShowFee = false;
		},
		createFn: function createFn() {
			var _this4 = this;

			//创建课程
			if (this.creating) {
				return;
			}
			if (Number(this.originPrice) !== 0) {
				if (this.originPrice == this.coursePrice) {
					(0, _mintUi.Toast)("原价不能与优惠价相同，必须大于优惠价");
					return;
				}
				if (this.originPrice < this.coursePrice) {
					(0, _mintUi.Toast)("原价不能与优惠价低");
					return;
				}
			}

			if (this.courseName.trim() == '') {
				(0, _mintUi.Toast)('请输入课程名称');
			} else if (this.courseName.length < 4 || this.courseName.length > 25) {
				(0, _mintUi.Toast)({ message: '课程名字需在4-25个汉字之间。', duration: 2000 });
			} else if (this.courseKind == '') {
				(0, _mintUi.Toast)('请选择课程分类');
			} else if (this.tmpFee == 9) {
				(0, _mintUi.Toast)('请选择收费类型');
			} else if (this.tmpFee == 2 && !this.coursePrice) {
				(0, _mintUi.Toast)('请设置优惠价');
			} else if (this.tmpFee == 2 && this.coursePrice < 1) {
				(0, _mintUi.Toast)('系列课价格不能少于1');
			} else {
				this.$http.post('/Course/create', {
					type: 'series',
					name: this.courseName,
					cate: this.courseKindId,
					level: this.tmpFee,
					price: this.coursePrice,
					planNum: this.courseNum || 0,
					img: this.localCover.serverId,
					originPrice: this.originPrice,
					teacherId: this.teacher.user_id || ''
				}, { emulateJSON: true }).then(function (res) {
					if (res.body.code == 200) {
						_this4.creating = true;
						(0, _mintUi.Toast)({ message: '创建课程成功', duration: 2000 });
						setTimeout(function () {
							_this4.$router.push('/personalCenter/course/' + res.body.data);
						}, 2000);
					} else if (res.body.code == -5100) {
						_mintUi.MessageBox.alert(res.body.msg).then(function (action) {
							_this4.isDelFun();
							_this4.creating = false;
						});
					}
				});
			}
		},
		getCourseKind: function getCourseKind() {
			var _this5 = this;

			//获取课程分类
			this.$http.get(this.hostUrl + '/Course/courseCate?id=2').then(function (res) {
				NProgress.done();
				if (res.body.code == 200) {
					_this5.courseAction = res.body.data;
				} else if (res.body.code == -17007) {
					_this5.$router.push('/personalCenter');
				}
			});
		}
	},
	watch: {
		courseName: function courseName(val) {
			//禁止输入表情
			this.courseName = val.replace(/[\uD83C|\uD83D|\uD83E][\uDC00-\uDFFF][\u200D|\uFE0F]|[\uD83C|\uD83D|\uD83E][\uDC00-\uDFFF]|[0-9|*|#]\uFE0F\u20E3|[0-9|#]\u20E3|[\u203C-\u3299]\uFE0F\u200D|[\u203C-\u3299]\uFE0F|[\u2122-\u2B55]|\u303D|[\A9|\AE]\u3030|\uA9|\uAE|\u3030/ig, '');
		},
		tmpNum: function tmpNum(val) {
			//限制只能输入数字
			this.tmpNum = val.replace(/[^0-9]/ig, "");
		},
		coursePrice: function coursePrice(val, oldVal) {
			//固定设置最多六位数和两位小数\
			if (val >= 1000000) {
				this.coursePrice = oldVal;
			} else if (val < 1) {
				this.coursePrice = null;
			}
			var arr = (val + '').split('.');
			if (arr.length > 1 && arr[1].length > 2) {
				this.coursePrice = oldVal;
			}
		},
		originPrice: function originPrice(val, oldVal) {
			if (val >= 1000000) {
				this.originPrice = oldVal;
			} else if (val < 1) {
				this.originPrice = null;
			}
			var arr = (val + '').split('.');
			if (arr.length > 1 && arr[1].length > 2) {
				this.originPrice = oldVal;
			}
		}
	}
};
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(99)))

/***/ }),

/***/ 954:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.series-course {\n  background: #f0f0f0;\n  min-height: 100%;\n  padding-bottom: 1rem;\n  /*.name {\n        border-bottom: .32rem solid #f0f0f0;\n        .title {\n            color: #666666;\n            font-size: .32rem;\n            background: #f0f0f0;\n            height: .94rem;\n            line-height: .94rem;\n            padding: 0 .34rem;\n        }\n        input {\n            width: 100%;\n            font-size: .32rem;\n            padding-left: .3rem;\n            line-height: .98rem;\n            &::-webkit-input-placeholder {\n                font-size: 14px;\n                color: #b2b2b2;\n            }\n        }\n    }*/\n  /*.setting {\n        > section {\n            border-bottom: .1rem solid #f0f0f0;\n            &:last-child {\n                border-bottom: 1px solid #ebebeb;\n            }\n            .mint-cell {\n                height: inherit;\n                line-height: 1.12rem;\n                .mint-cell-wrapper {\n                    !*line-height:1.12rem;*!\n                    padding: 0 .3rem;\n                    color: #666666;\n                    font-size: .32rem;\n                }\n            }\n        }\n\n    }\n    .set-fee {\n        text-align: center;\n        padding: .24rem 0 1rem;\n        background: #ffffff;\n        section {\n            margin-bottom: .24rem;\n        }\n        span {\n            display: inline-block;\n            font-size: .32rem !* 32/100 *!\n        ;\n            color: #353535;\n            width: 1.1rem;\n        }\n        input {\n            width: 68%;\n            height: .62rem;\n            background: #f2f8fc;\n            color: #cf2f2f;\n            padding-left: .18rem;\n            line-height: .62rem;\n        }\n        i {\n            color: #fb4040;\n        }\n        p {\n            color: #c62f2f;\n            font-size: 0.28rem;\n\n            height: .5rem;\n            text-align: center;\n            width: 100%;\n            line-height: .5rem;\n        }\n    }*/\n  /*.courseFee {\n        width: 80%;\n        border-radius: 4px;\n        .type-title {\n            line-height: 45px;\n            border-bottom: 1px solid #f0f0f0;\n            text-align: center;\n        }\n        ul {\n            li {\n                height: .76rem;\n                line-height: .76rem;\n                padding: 0 .2rem;\n                color: #666666;\n                border-bottom: 1px solid #ebebeb;\n                div {\n                    span {\n                        float: right;\n                        width: .44rem;\n                        height: .44rem;\n                        &.active {\n                            background: url(/images/sprites.png) 0 0 no-repeat;\n                            background-size: 7.5rem auto;\n                            transform: none;\n                            width: .33rem;\n                            height: .3rem;\n                            background-position: -5.2rem -1.1rem;\n                            !*transform: scale(.5) translateY(50%);*!\n                            margin-top: .18rem;\n                        }\n                    }\n                }\n            }\n        }\n        .confirm-btn {\n            display: block;\n            width: 80%;\n            height: 35px;\n            border-radius: 5px;\n            color: #fff;\n            background-color: $mainColor;\n            margin: 15px auto;\n            line-height: 35px;\n            text-align: center;\n        }\n    }*/\n  /*.select-btn {\n        display: flex;\n        margin-top: 0.4rem;\n        padding-right: .3rem;\n        padding-bottom: 1.8rem;\n        .mintui-field-error {\n            padding-left: 10px;\n            float: right;\n            margin-right: 0.65rem;\n        }\n        .mint-button {\n            width: 2.2rem;\n            font-size: 0.3rem;\n            padding: 0;\n            height: 0.9rem;\n            line-height: 0.9rem;\n            background-color: transparent;\n            box-shadow: none;\n            tap-highlight-color: transparent;\n            -webkit-tap-highlight-color: transparent;\n            &:after {\n                background-color: transparent;\n            }\n        }\n        a {\n            width: 100%;\n            padding-left: 0.3rem;\n            height: 0.9rem;\n            line-height: 0.9rem;\n            box-shadow: 0 0 1px #ededed;\n            background: url(/images/add.png) 95% center no-repeat;\n            background-size: 0.3rem auto;\n            background-color: #fff;\n        }\n    }*/\n}\n.series-course.set-bottom {\n    margin-bottom: 50px;\n}\n.series-course header {\n    background: #ffffff;\n    margin-bottom: .24rem;\n}\n.series-course header section {\n      width: 100%;\n      border-radius: 4px;\n      position: relative;\n      text-align: center;\n      padding: 1.22rem 0;\n}\n.series-course header section span {\n        height: .68rem;\n        width: .9rem;\n        display: inline-block;\n        background: url(\"/images/3.0/xiangji.png\") no-repeat center center;\n        background-size: 100% 100%;\n}\n.series-course header section h4 {\n        font-size: .28rem;\n        color: #353535;\n        margin-top: .3rem;\n        margin-bottom: .16rem;\n}\n.series-course header section p {\n        font-size: .24rem;\n        color: #b2b2b2;\n}\n.series-course header .is-img {\n      padding: 0;\n      border: none !important;\n}\n.series-course header .is-img img {\n        width: 100%;\n        height: 100%;\n}\n.series-course .class-name {\n    background: #ffffff;\n    padding: .24rem .24rem 0 .24rem;\n    margin-bottom: .24rem;\n}\n.series-course .class-name p {\n      font-size: .24rem;\n      color: #353535;\n}\n.series-course .class-name input {\n      font-size: .32rem;\n      color: #353535;\n      border-bottom: 1px solid #e8e8e8;\n      width: 100%;\n      padding: .3rem .24rem;\n      box-sizing: border-box;\n}\n.series-course .class-name input::-webkit-input-placeholder {\n        color: #888888;\n        font-size: .32rem;\n}\n.series-course .class-time {\n    padding: 0 .24rem;\n    background: #ffffff;\n    overflow: hidden;\n    margin-bottom: .24rem;\n}\n.series-course .class-time p {\n      font-size: .24rem;\n      color: #353535;\n      margin-top: .24rem;\n}\n.series-course .class-time div {\n      width: 100%;\n      border-bottom: 1px solid #e8e8e8;\n      position: relative;\n      padding: .3rem 0 .3rem .24rem;\n      box-sizing: border-box;\n      font-size: .32rem;\n      color: #353535;\n}\n.series-course .class-time .time div::after {\n      content: '';\n      display: inline-block;\n      position: absolute;\n      top: .3rem;\n      right: .24rem;\n      width: .36rem;\n      height: .36rem;\n      background: url(\"/images/3.0/dajiahao.png\") no-repeat 100%/100%;\n}\n.series-course .class-time .arrow > p {\n      font-size: .24rem;\n      color: #353535;\n      margin-top: .24rem;\n}\n.series-course .class-time .arrow > div {\n      width: 100%;\n      border-bottom: 1px solid #e8e8e8;\n      position: relative;\n      padding: .3rem 0 .3rem .24rem;\n      box-sizing: border-box;\n      font-size: .32rem;\n      color: #353535;\n}\n.series-course .class-time .arrow > div::after {\n        content: '';\n        display: inline-block;\n        position: absolute;\n        top: .3rem;\n        right: .24rem;\n        width: .36rem;\n        height: .36rem;\n        background: url(\"/images/3.0/dajiahao.png\") no-repeat 100%/100%;\n}\n.series-course .class-time .mintui-field-error {\n      float: right;\n      margin-right: .96rem;\n}\n.series-course .course-type {\n    padding: .3rem .24rem .3rem .24rem;\n    background-color: #fff;\n    margin-bottom: .24rem;\n}\n.series-course .course-type h5 {\n      font-size: 16px;\n      line-height: 26px;\n      padding-left: 15px;\n      color: #666;\n}\n.series-course .course-type h5 span {\n        font-size: 13px;\n        color: #fb4040;\n}\n.series-course .course-type .choose {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-pack: center;\n      -webkit-justify-content: center;\n          -ms-flex-pack: center;\n              justify-content: center;\n}\n.series-course .course-type .choose li {\n      float: left;\n      text-align: center;\n      padding-top: 6px;\n      line-height: 1;\n      font-size: 16px;\n      color: #666;\n      position: relative;\n}\n.series-course .course-type .choose li + li {\n        margin-left: .4rem;\n}\n.series-course .course-type .choose li input[type=\"radio\"] {\n        display: none;\n}\n.series-course .course-type .choose li > div p::after {\n        content: '';\n        display: block;\n        width: 0.68rem;\n        height: 0.04rem;\n        background: #ffffff;\n        margin: .16rem auto;\n}\n.series-course .course-type .choose li div.active {\n        color: #c62f2f;\n}\n.series-course .course-type .choose li div.active p::after {\n          background: #c62f2f;\n}\n.series-course .course-type .choose li i {\n        display: inline-block;\n        width: 46px;\n        height: 46px;\n        border-radius: 50%;\n        background-color: #fff;\n        border: 2px solid #b2b2b2;\n        line-height: 46px;\n        color: #666;\n        font-size: 24px;\n        margin-bottom: 8px;\n}\n.series-course .course-type .choose li span {\n        position: absolute;\n        display: none;\n        background-color: #c62f2f;\n        border-radius: 50%;\n        top: 0;\n        left: 50%;\n        margin-left: 7px;\n}\n.series-course .course-type .choose li span.sprite:before {\n          width: 24px;\n          height: 17px;\n          background-position: -56px -150px;\n}\n.series-course .course-type .extra {\n      padding: 0;\n      position: relative;\n}\n.series-course .course-type .extra li {\n        display: none;\n        background-color: #fff;\n        border-radius: 5px;\n        box-sizing: border-box;\n}\n.series-course .course-type .extra li.active {\n        display: block;\n}\n.series-course .course-type .extra li.active .top {\n          height: 50%;\n          line-height: 45px;\n          font-size: 16px;\n          color: #666;\n}\n.series-course .course-type .extra li.active.pass .bottom {\n          -webkit-box-orient: horizontal;\n          -webkit-box-direction: normal;\n          -webkit-flex-direction: row;\n              -ms-flex-direction: row;\n                  flex-direction: row;\n}\n.series-course .course-type .extra li.active.pass .bottom span {\n            color: #333;\n}\n.series-course .course-type .extra li.active .bottom {\n          display: -webkit-box;\n          display: -webkit-flex;\n          display: -ms-flexbox;\n          display: flex;\n          -webkit-box-orient: vertical;\n          -webkit-box-direction: normal;\n          -webkit-flex-direction: column;\n              -ms-flex-direction: column;\n                  flex-direction: column;\n}\n.series-course .course-type .extra li.active .bottom section {\n            border-bottom: 1px solid #efefef;\n            padding: .24rem;\n}\n.series-course .course-type .extra li.active .bottom .pre {\n            display: inline-block;\n            font-size: 0.32rem;\n            color: #353535;\n            width: 1.1rem;\n}\n.series-course .course-type .extra li.active .bottom input {\n            height: 30px;\n            color: #c62f2f;\n            font-size: .32rem;\n            text-indent: 4px;\n            line-height: 30px;\n            margin-right: 5px;\n            width: 66%;\n}\n.series-course .course-type .extra li.active .bottom input::-webkit-input-placeholder {\n              color: #888888;\n              font-size: .28rem;\n}\n.series-course .course-type .extra li.active .bottom span {\n            color: #353535;\n            font-size: .32rem;\n            line-height: 32px;\n}\n.series-course .course-type .extra li.active .bottom span.red {\n              color: #c62f2f;\n              float: right;\n}\n.series-course .course-type .extra li.active:first-child {\n          height: 1rem;\n          line-height: 1rem;\n          padding: 0 15px;\n          color: #888;\n          font-size: .28rem;\n          background-color: #f5f7f8;\n          text-align: center;\n}\n.series-course .course-type .extra li.active:last-child p {\n          color: #b2b2b2;\n          font-size: 0.28rem;\n          height: .7rem;\n          text-align: center;\n          width: 100%;\n          line-height: .7rem;\n}\n.series-course .save-btn {\n    color: #ffffff;\n    height: .98rem;\n    line-height: .98rem;\n    font-size: .36rem;\n    background: #c62f2f;\n    width: 100%;\n    border: none;\n    position: fixed;\n    bottom: 0;\n}\n.series-course .courseType {\n    width: 80%;\n    text-align: center;\n    border-radius: 5px;\n}\n.series-course .courseType .type-title {\n      line-height: 45px;\n      border-bottom: 1px solid #f0f0f0;\n}\n.series-course .courseType ul {\n      max-height: 400px;\n      overflow: auto;\n      text-align: left;\n}\n.series-course .courseType ul li label {\n        display: block;\n        width: 100%;\n        border-bottom: 1px solid #f0f0f0;\n        color: #666;\n        line-height: 38px;\n        padding: 0 10px;\n        box-sizing: border-box;\n        position: relative;\n}\n.series-course .courseType ul li label span {\n          display: none;\n          position: absolute;\n          top: 50%;\n          -webkit-transform: translateY(-50%);\n              -ms-transform: translateY(-50%);\n                  transform: translateY(-50%);\n          right: 10px;\n}\n.series-course .courseType ul li label span.sprite:before {\n            background-size: 7.5rem auto;\n            -webkit-transform: none;\n                -ms-transform: none;\n                    transform: none;\n            width: .33rem;\n            height: .3rem;\n            background-position: -5.2rem -1.1rem;\n            margin-top: .18rem;\n}\n.series-course .courseType ul li label input[type=\"radio\"] {\n          display: none;\n}\n.series-course .courseType ul li label input[type=\"radio\"]:checked + span {\n            display: block;\n}\n.series-course .courseType .confirm-btn {\n      display: inline-block;\n      width: 80%;\n      height: 35px;\n      border-radius: 5px;\n      color: #fff;\n      background-color: #c62f2f;\n      margin: 15px 0;\n      line-height: 35px;\n}\n.series-course .coursePlan {\n    width: 76%;\n    border-radius: 4px;\n    padding: .32rem .44rem;\n}\n.series-course .coursePlan h4 {\n      font-size: .32rem;\n      text-align: center;\n      color: #333333;\n}\n.series-course .coursePlan .num {\n      text-align: center;\n      width: 100%;\n      height: .9rem;\n      border-radius: 4px;\n      background: #f0f0f0;\n      line-height: .9rem;\n      margin: .56rem 0;\n}\n.series-course .coursePlan .num input {\n        text-align: center;\n        font-size: .3rem;\n        width: 80%;\n        background: #f0f0f0;\n}\n.series-course .coursePlan .num input::-webkit-input-placeholder {\n          color: #666;\n}\n.series-course .coursePlan .btn-area button {\n      width: 44%;\n      height: .9rem;\n      line-height: .9rem;\n}\n.series-course .coursePlan .btn-area .mint-button--default {\n      color: #999 !important;\n      border-color: #999 !important;\n      background: #fff;\n}\n.series-course .coursePlan .btn-area .mint-button--primary {\n      float: right;\n      background: #c62f2f;\n}\n.series-course .select-box {\n    width: 100%;\n}\n.series-course .select-box .header {\n      height: 0.9rem;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      margin-bottom: 0.1rem;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n      -webkit-box-pack: justify;\n      -webkit-justify-content: space-between;\n          -ms-flex-pack: justify;\n              justify-content: space-between;\n      padding: 0 0.3rem;\n}\n.series-course .select-box .header button {\n        font-size: 0.28rem;\n        color: #fff;\n        line-height: 0.38rem;\n        padding: 0.16rem 1rem;\n        border: 1px solid #c62f2f;\n        background-color: #c62f2f;\n        border-radius: 0.4rem;\n        margin: auto;\n}\n.series-course .select-box .tag-list {\n      -webkit-box-flex: 1;\n      -webkit-flex: 1;\n          -ms-flex: 1;\n              flex: 1;\n      padding-left: 0.3rem;\n      padding-bottom: 1rem;\n      background-color: #fff;\n      height: 100%;\n      overflow-y: scroll;\n      box-sizing: border-box;\n}\n.series-course .select-box .tag-list p {\n        line-height: 5.5rem;\n        text-align: center;\n        color: #666;\n}\n.series-course .select-box .tag-list label {\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        height: 0.9rem;\n        -webkit-box-align: center;\n        -webkit-align-items: center;\n            -ms-flex-align: center;\n                align-items: center;\n        -webkit-box-pack: justify;\n        -webkit-justify-content: space-between;\n            -ms-flex-pack: justify;\n                justify-content: space-between;\n        padding-right: 0.6rem;\n        border-bottom: 1px solid #ebebeb;\n}\n.series-course .select-box .tag-list .img {\n        display: block;\n        width: 0.65rem;\n        height: 0.65rem;\n        border-radius: 100%;\n        background-position: left center;\n        background-size: 100% auto;\n}\n.series-course .select-box .tag-list .icon {\n        display: block;\n        box-sizing: border-box;\n        border: 1px solid #bbbbbb;\n        background-color: transparent;\n        width: 0.36rem;\n        height: 0.36rem;\n        border-radius: 2px;\n}\n.series-course .select-box .tag-list input[type=\"radio\"] {\n        display: none;\n}\n.series-course .select-box .tag-list input[type=\"radio\"]:checked + span {\n          background-color: #c62f2f;\n          display: -webkit-box;\n          display: -webkit-flex;\n          display: -ms-flexbox;\n          display: flex;\n          -webkit-box-pack: center;\n          -webkit-justify-content: center;\n              -ms-flex-pack: center;\n                  justify-content: center;\n          -webkit-box-align: center;\n          -webkit-align-items: center;\n              -ms-flex-align: center;\n                  align-items: center;\n          border: none;\n}\n.series-course .select-box .tag-list input[type=\"radio\"]:checked + span:before {\n            content: \"\";\n            display: block;\n            width: 0.28rem;\n            height: 0.2rem;\n            background: url(\"/images/35.png\") no-repeat;\n            background-size: 100% 100%;\n}\n.series-course input[type=radio] {\n    display: none;\n    opacity: 0;\n}\n", ""]);

// exports


/***/ })

});