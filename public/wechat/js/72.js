webpackJsonp([72],{

/***/ 1134:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('main', {
    staticClass: "single-course"
  }, [_c('section', {
    staticClass: "class-way"
  }, [_c('h4', [_vm._v("创建什么形式的课程"), _c('span', {
    on: {
      "click": function($event) {
        _vm.isShowWay = true
      }
    }
  })]), _vm._v(" "), _c('ul', [_c('li', {
    class: {
      'active': _vm.courseWay == 1
    },
    on: {
      "click": function($event) {
        _vm.courseWay = 1
      }
    }
  }, [_c('span'), _vm._v(" "), _c('p', [_vm._v("图文语音直播")])]), _vm._v(" "), _c('li', {
    class: {
      'active': _vm.courseWay == 2
    },
    on: {
      "click": function($event) {
        _vm.courseWay = 2
      }
    }
  }, [_c('span'), _vm._v(" "), _c('p', [_vm._v("视频直播")])]), _vm._v(" "), _c('li', {
    class: {
      'active': _vm.courseWay == 3
    },
    on: {
      "click": function($event) {
        _vm.courseWay = 3
      }
    }
  }, [_c('span'), _vm._v(" "), _c('p', [_vm._v("PPT直播")])])])]), _vm._v(" "), _c('section', {
    staticClass: "class-name"
  }, [_c('p', [_vm._v("课程名称")]), _vm._v(" "), _c('input', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.courseName),
      expression: "courseName"
    }],
    attrs: {
      "type": "text",
      "placeholder": "请输入直播课程名称"
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
    staticClass: "class-time "
  }, [_c('div', {
    staticClass: "time"
  }, [_c('p', [_vm._v("直播开始时间")]), _vm._v(" "), _c('div', {
    on: {
      "click": _vm.showDatePicker
    }
  }, [_vm._v(_vm._s(_vm.pickerValueFormat))])])]), _vm._v(" "), _c('div', {
    staticClass: "save",
    on: {
      "click": _vm.createCourse
    }
  }, [_vm._v("保存并创建")]), _vm._v(" "), _c('div', {
    staticClass: "c-cell"
  }, [_c('mt-datetime-picker', {
    ref: "picker",
    attrs: {
      "type": "datetime",
      "startDate": new Date()
    },
    on: {
      "confirm": _vm.pickerConfirm
    },
    model: {
      value: (_vm.pickerValue),
      callback: function($$v) {
        _vm.pickerValue = $$v
      },
      expression: "pickerValue"
    }
  })], 1), _vm._v(" "), _c('mt-popup', {
    staticClass: "courseStream",
    attrs: {
      "popup-transition": "popup-fade"
    },
    model: {
      value: (_vm.isShowStream),
      callback: function($$v) {
        _vm.isShowStream = $$v
      },
      expression: "isShowStream"
    }
  }, [_c('div', {
    staticClass: "title"
  }, [_vm._v("直播流地址")]), _vm._v(" "), _c('p', {
    staticClass: "stream",
    attrs: {
      "id": "stream-text"
    }
  }, [_vm._v(_vm._s(_vm.streamUrl))]), _vm._v(" "), _c('input', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.streamUrl),
      expression: "streamUrl"
    }],
    attrs: {
      "type": "text",
      "id": "stream-input",
      "readonly": ""
    },
    domProps: {
      "value": (_vm.streamUrl)
    },
    on: {
      "input": function($event) {
        if ($event.target.composing) { return; }
        _vm.streamUrl = $event.target.value
      }
    }
  }), _vm._v(" "), _c('div', {
    staticClass: "explain"
  }, [_c('p', [_vm._v("说明：")]), _vm._v(" "), _c('p', [_vm._v("1、将复制本直播流地址配置到PC录屏软件即可实现在线直播；")]), _vm._v(" "), _c('p', [_vm._v("2、本直播流地址已保存，您可到本课程编辑页面中查看。")]), _vm._v(" "), _c('div', {
    staticClass: "btn-area"
  }, [_c('mt-button', {
    attrs: {
      "type": "default"
    },
    on: {
      "click": _vm.copyStream
    }
  }, [_vm._v("复制地址")]), _vm._v(" "), _c('mt-button', {
    attrs: {
      "type": "primary"
    },
    on: {
      "click": _vm.streamConfirm
    }
  }, [_vm._v("确定")])], 1)])]), _vm._v(" "), _c('mt-popup', {
    staticClass: "course-way-popup",
    attrs: {
      "popup-transition": "popup-fade"
    },
    model: {
      value: (_vm.isShowWay),
      callback: function($$v) {
        _vm.isShowWay = $$v
      },
      expression: "isShowWay"
    }
  }, [_c('ul', [_c('li', [_c('img', {
    attrs: {
      "src": "/images/3.0/class-default-active.png",
      "alt": ""
    }
  }), _vm._v(" "), _c('section', [_c('h4', [_vm._v("图文语音直播")]), _vm._v(" "), _c('p', [_vm._v("直播形式以图、文、语音为主")])])]), _vm._v(" "), _c('li', [_c('img', {
    attrs: {
      "src": "/images/3.0/class-video-active.png",
      "alt": ""
    }
  }), _vm._v(" "), _c('section', [_c('h4', [_vm._v("视频直播")]), _vm._v(" "), _c('p', [_vm._v("直播形式以现场视频为主，并支持图、文、语音")])])]), _vm._v(" "), _c('li', [_c('img', {
    attrs: {
      "src": "/images/3.0/class-ppt-active.png",
      "alt": ""
    }
  }), _vm._v(" "), _c('section', [_c('h4', [_vm._v("PPT直播")]), _vm._v(" "), _c('p', [_vm._v("直播形式以PPT直播形式，支持语音绑定图片")])])])]), _vm._v(" "), _c('section', {
    staticClass: "btn",
    on: {
      "click": function($event) {
        _vm.isShowWay = false
      }
    }
  }, [_vm._v("我知道了")])])], 1)
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-1799f864", module.exports)
  }
}

/***/ }),

/***/ 1247:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(976);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("9a520e38", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-1799f864\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./createSingleCourse.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-1799f864\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./createSingleCourse.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 469:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1247)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(894),
  /* template */
  __webpack_require__(1134),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\personalCenter\\createSingleCourse.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] createSingleCourse.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-1799f864", Component.options)
  } else {
    hotAPI.reload("data-v-1799f864", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 894:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function(NProgress, $) {

Object.defineProperty(exports, "__esModule", {
	value: true
});

var _vuex = __webpack_require__(70);

var _mintUi = __webpack_require__(54);

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
		userId: function userId(state) {
			return state.userInfo.user_id;
		}
	}),
	created: function created() {
		this.$store.commit('setTitle', '新建课程');
		this.$store.commit('hideTabber');
	},
	data: function data() {
		return {
			courseName: '',
			pickerValueFormat: this.timeFormat(new Date()),
			datetimepickershow: false,
			pickerValue: '',
			courseWay: 2, // 课程形式1为图文语音（普通），2为视频直播，3为ppt直播
			parentId: this.$route.params.parentId, //所属的系列课id
			newCourseId: '',
			isShowStream: false, //直播流弹窗
			streamUrl: '', //直播流地址
			creating: false, //控制保存按钮点击一次 true为不可点击 false为可点击
			isShowWay: false
		};
	},

	methods: {
		createCourse: function createCourse() {
			var _this = this;

			//保存并创建课程
			if (this.creating) {
				return;
			}
			if (this.courseName.trim() == "") {
				(0, _mintUi.Toast)('请输入课程名称');
			} else if (this.courseName.length > 25) {
				(0, _mintUi.Toast)('课程名称字数不得大于25');
			} else {
				NProgress.start();
				this.$http.post('/Course/create', {
					formatBool: 1,
					date: this.pickerValueFormat,
					type: 'single',
					pid: this.parentId,
					name: this.courseName,
					form: this.courseWay
				}, { emulateJSON: true }).then(function (res) {
					NProgress.done();
					if (res.body.code == 200) {
						_this.creating = true;
						var data = res.body.data;
						_this.newCourseId = data.courseId;
						(0, _mintUi.Toast)({ message: '创建课程成功', duration: 2000 });
						if (data.videoSteam != '') {
							_this.streamUrl = data.videoSteam;
							_this.isShowStream = true;
						} else {
							setTimeout(function () {
								//发布成功后，回到我的页面
								_this.$router.push('/personalCenter/course/' + data.courseId + '&' + _this.userId);
							}, 2000);
						}
					} else if (res.body.code == -5010) {
						(0, _mintUi.Toast)('课程开始时间有误或小于当前时间');
					} else {
						_mintUi.MessageBox.alert(res.body.msg).then(function (action) {
							console.log('2121');
							_this.isDelFun();
							_this.creating = false;
						});
						//Toast(res.body.msg);
					}
				});
			}
		},
		copyStream: function copyStream() {
			//复制地址流
			var userAgent = navigator.userAgent;
			if (userAgent.indexOf("Android") > -1 || userAgent.indexOf("Linux") > -1) {
				//android
				document.getElementById("stream-input").select();
				document.execCommand("copy", "false", null);
				(0, _mintUi.Toast)("已复制，快分享到微信群邀请好友吧。");
			} else {
				var range = document.createRange();
				range.selectNode(document.getElementById("stream-text"));

				var selection = window.getSelection();
				if (selection.rangeCount > 0) {
					selection.removeAllRanges();
				}
				selection.addRange(range);
				if (document.execCommand("copy", false, null)) {
					document.execCommand("copy", "false", null);
					(0, _mintUi.Toast)("已复制，快分享到微信群邀请好友吧。");
				} else {
					(0, _mintUi.Toast)("ios 10.0以下暂不支持复制哦");
				}
			}
		},
		streamConfirm: function streamConfirm() {
			this.isShowStream = false;
			this.$router.push('/personalCenter/course/' + this.newCourseId + '&' + this.userId);
		},
		showDatePicker: function showDatePicker(e) {
			var _this2 = this;

			e.target.blur();
			this.$refs.picker.open();
			this.datetimepickershow = true;
			document.body.addEventListener('touchmove', this.touchmove);
			$('.mint-datetime').parent().on('click', '.v-modal', function () {
				_this2.datetimepickershow = false;
				document.body.removeEventListener('touchmove', _this2.touchmove);
			});
		},
		pickerConfirm: function pickerConfirm(date) {
			this.datetimepickershow = false;
			this.pickerValueFormat = this.timeFormat(date);
			document.body.removeEventListener('touchmove', this.touchmove);
		},
		timeFormat: function timeFormat(date) {
			return date.getFullYear() + '-' + gt10(date.getMonth() + 1) + '-' + gt10(date.getDate()) + ' ' + gt10(date.getHours()) + ':' + gt10(date.getMinutes());
			function gt10(num) {
				return num > 9 ? num + '' : '0' + num;
			}
		}
	},
	watch: {
		courseName: function courseName(val) {
			var reg = /[^\d|\D|\W|A-z|\u4E00-\u9FFF]/ig; //汉字、数字、英文、标点（过滤表情）
			this.courseName = val.replace(reg, '');
		}
	}
};
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(99), __webpack_require__(49)))

/***/ }),

/***/ 976:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.single-course {\n  /*----------------------------------------*/\n}\n.single-course .class-way {\n    padding: .4rem .24rem;\n    background: #ffffff;\n    margin-bottom: .24rem;\n}\n.single-course .class-way h4 {\n      font-size: .36rem;\n      color: #353535;\n      text-align: center;\n      min-height: .44rem;\n}\n.single-course .class-way h4 span {\n        width: .44rem;\n        height: .44rem;\n        float: right;\n        background: url(\"/images/3.0/icon-16.png\") no-repeat 100%/100%;\n        margin-top: -2px;\n}\n.single-course .class-way ul {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      margin-top: .35rem;\n}\n.single-course .class-way ul li {\n        -webkit-box-flex: 1;\n        -webkit-flex: 1;\n            -ms-flex: 1;\n                flex: 1;\n        text-align: center;\n}\n.single-course .class-way ul li span {\n          display: inline-block;\n          width: .66rem;\n          height: .54rem;\n          margin-bottom: .24rem;\n}\n.single-course .class-way ul li p {\n          font-size: .24rem;\n          color: #888888;\n}\n.single-course .class-way ul li:nth-child(1) span {\n          background: url(\"/images/3.0/class-default.png\") no-repeat 100%/100%;\n}\n.single-course .class-way ul li:nth-child(2) span {\n          background: url(\"/images/3.0/class-video.png\") no-repeat 100%/100%;\n}\n.single-course .class-way ul li:nth-child(3) span {\n          background: url(\"/images/3.0/class-ppt.png\") no-repeat 100%/100%;\n}\n.single-course .class-way ul li:nth-child(1).active span {\n          background: url(\"/images/3.0/class-default-active.png\") no-repeat 100%/100%;\n}\n.single-course .class-way ul li:nth-child(1).active p {\n          color: #353535;\n}\n.single-course .class-way ul li:nth-child(2).active span {\n          background: url(\"/images/3.0/class-video-active.png\") no-repeat 100%/100%;\n}\n.single-course .class-way ul li:nth-child(2).active p {\n          color: #353535;\n}\n.single-course .class-way ul li:nth-child(3).active span {\n          background: url(\"/images/3.0/class-ppt-active.png\") no-repeat 100%/100%;\n}\n.single-course .class-way ul li:nth-child(3).active p {\n          color: #353535;\n}\n.single-course .course-way-popup {\n    width: 5.8rem;\n    border-radius: 4px;\n    background: #ffffff;\n}\n.single-course .course-way-popup ul {\n      padding-top: .48rem;\n      padding-left: .32rem;\n      padding-right: .48rem;\n      padding-bottom: .4rem;\n}\n.single-course .course-way-popup ul li {\n        margin-bottom: .5rem;\n}\n.single-course .course-way-popup ul li img {\n          float: left;\n          width: .66rem;\n          height: .54rem;\n          margin-right: .32rem;\n          margin-bottom: .4rem;\n}\n.single-course .course-way-popup ul li > section h4 {\n          color: #1c0808;\n          font-size: .32rem;\n          margin-bottom: .16rem;\n}\n.single-course .course-way-popup ul li > section p {\n          font-size: .24rem;\n          color: #888888;\n          line-height: .36rem;\n}\n.single-course .course-way-popup ul li:last-child {\n          margin-bottom: 0;\n}\n.single-course .course-way-popup .btn {\n      width: 100%;\n      height: 1rem;\n      line-height: 1rem;\n      background: #c62f2f;\n      color: #ffffff;\n      font-size: .36rem;\n      border-radius: 0 0 5px 5px;\n      text-align: center;\n}\n.single-course .class-name {\n    background: #ffffff;\n    padding: .24rem .24rem 0 .24rem;\n    margin-bottom: .24rem;\n}\n.single-course .class-name p {\n      font-size: .24rem;\n      color: #353535;\n}\n.single-course .class-name input {\n      font-size: .32rem;\n      color: #353535;\n      border-bottom: 1px solid #e8e8e8;\n      width: 100%;\n      padding: .3rem .24rem;\n      box-sizing: border-box;\n}\n.single-course .class-name input::-webkit-input-placeholder {\n        color: #888888;\n        font-size: .32rem;\n}\n.single-course .class-time {\n    padding: 0 .24rem;\n    background: #ffffff;\n    overflow: hidden;\n    margin-bottom: .24rem;\n}\n.single-course .class-time .time > p {\n      font-size: .24rem;\n      color: #353535;\n      margin-top: .24rem;\n}\n.single-course .class-time .time > div {\n      width: 100%;\n      border-bottom: 1px solid #e8e8e8;\n      position: relative;\n      padding: .3rem 0 .3rem .24rem;\n      box-sizing: border-box;\n      font-size: .32rem;\n      color: #353535;\n}\n.single-course .class-time .time > div::after {\n        content: '';\n        display: inline-block;\n        position: absolute;\n        top: .3rem;\n        right: .24rem;\n        width: .36rem;\n        height: .36rem;\n        background: url(\"/images/3.0/dajiahao.png\") no-repeat 100%/100%;\n}\n.single-course .mint-datetime-action {\n    color: #c62f2f;\n}\n.single-course .c-cell .title {\n    line-height: 47px;\n    padding-left: 15px;\n    color: #666;\n    font-size: 16px;\n}\n.single-course .c-cell input {\n    width: 100%;\n    box-sizing: border-box;\n    background-color: #fff;\n    display: block;\n    line-height: 16px;\n    color: #666;\n    padding: 20px 0 20px 15px;\n    font-size: 16px;\n}\n.single-course .c-cell input::-webkit-input-placeholder {\n      line-height: 16px;\n}\n.single-course .course-way .title {\n    line-height: 47px;\n    padding-left: 15px;\n    color: #666;\n    font-size: 16px;\n}\n.single-course .course-way ul li {\n    padding: .38rem .26rem;\n    border-bottom: 1px solid #ebebeb;\n    background: #ffffff;\n}\n.single-course .course-way ul li div h4 {\n      font-size: .32rem;\n      color: #666666;\n}\n.single-course .course-way ul li div h4 span {\n        display: inline-block;\n        width: .32rem;\n        height: .32rem;\n        background: url(\"/images/radio-default.png\") no-repeat center center;\n        background-size: 100% 100%;\n        vertical-align: middle;\n        margin-right: .26rem;\n}\n.single-course .course-way ul li div h4 span.active {\n          background: url(\"/images/radio-active-red.png\") no-repeat center center;\n          background-size: 100% 100%;\n}\n.single-course .course-way ul li div p {\n      padding-left: .58rem;\n      color: #b2b2b2;\n      font-size: .24rem;\n      margin-top: .12rem;\n}\n.single-course .course-way ul li input[type='radio'] {\n      display: none;\n}\n.single-course .save {\n    line-height: .98rem;\n    height: .98rem;\n    text-align: center;\n    color: #ffffff;\n    font-size: .36rem;\n    background: #c62f2f;\n    position: fixed;\n    /*left: 0;*/\n    bottom: 0;\n    width: 100%;\n}\n.single-course .courseStream {\n    width: 80%;\n    border-radius: 4px;\n    padding: 0 .24rem;\n}\n.single-course .courseStream .title {\n      font-size: .32rem;\n      line-height: .92rem;\n      color: #333333;\n      text-align: center;\n}\n.single-course .courseStream .stream {\n      padding: .2rem .24rem;\n      color: #c62f2f;\n      background: #f4f6fc;\n      border-radius: 3px;\n      font-size: .3rem;\n      line-height: .46rem;\n      text-decoration: underline;\n}\n.single-course .courseStream .explain {\n      padding: .14rem;\n}\n.single-course .courseStream .explain::-moz-selection {\n        background: #ffffff;\n}\n.single-course .courseStream .explain::selection {\n        background: #ffffff;\n}\n.single-course .courseStream .explain p {\n        color: #b2b2b2;\n        font-size: .24rem;\n        line-height: .34rem;\n}\n.single-course .courseStream .explain .btn-area {\n        margin-bottom: .24rem;\n        margin-top: .2rem;\n}\n.single-course .courseStream .explain .btn-area button {\n          width: 44%;\n          height: .9rem;\n          line-height: .9rem;\n}\n.single-course .courseStream .explain .btn-area .mint-button--default {\n          color: #999 !important;\n          border-color: #999 !important;\n          background: #fff;\n}\n.single-course .courseStream .explain .btn-area .mint-button--primary {\n          float: right;\n          background: #c62f2f;\n}\n.single-course .courseStream #stream-input {\n      z-index: -1000;\n      width: 1px;\n      height: 1px;\n      color: #fff;\n      display: none;\n}\n.single-course .courseStream #stream-input::-moz-selection {\n        background: #fff;\n}\n.single-course .courseStream #stream-input::selection {\n        background: #fff;\n}\n", ""]);

// exports


/***/ })

});