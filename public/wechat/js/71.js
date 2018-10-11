webpackJsonp([71],{

/***/ 1111:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "liveSetting-container",
    style: ({
      paddingBottom: _vm.paddingBottom + 'px'
    })
  }, [_c('div', {
    staticClass: "liveSetting"
  }, [_c('section', {
    staticClass: "set-head-img"
  }, [_c('img', {
    attrs: {
      "src": _vm.myicon == '' ? _vm.myimg : _vm.myicon,
      "alt": ""
    }
  }), _vm._v(" "), _c('h3', {
    on: {
      "click": _vm.chooseIcon
    }
  }, [_vm._v("点击修改头像")]), _vm._v(" "), (!_vm.ismobile) ? _c('input', {
    staticClass: "iconpc",
    attrs: {
      "type": "file",
      "accept": "image/gif,image/jpeg,image/jpg,image/png,image/svg"
    },
    on: {
      "change": _vm.chooseIconPc
    }
  }) : _vm._e()]), _vm._v(" "), _c('section', {
    staticClass: "set-name"
  }, [_c('p', [_vm._v("名字")]), _vm._v(" "), _c('input', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.name),
      expression: "name"
    }],
    attrs: {
      "type": "text",
      "placeholder": "请输入名字"
    },
    domProps: {
      "value": (_vm.name)
    },
    on: {
      "input": function($event) {
        if ($event.target.composing) { return; }
        _vm.name = $event.target.value
      }
    }
  })]), _vm._v(" "), _c('section', {
    staticClass: "set-name"
  }, [_c('p', [_vm._v("用户ID")]), _vm._v(" "), _c('input', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.userId),
      expression: "userId"
    }],
    attrs: {
      "type": "text",
      "readonly": ""
    },
    domProps: {
      "value": (_vm.userId)
    },
    on: {
      "input": function($event) {
        if ($event.target.composing) { return; }
        _vm.userId = $event.target.value
      }
    }
  })]), _vm._v(" "), (_vm.type == 2) ? _c('section', {
    staticClass: "set-intro"
  }, [_c('p', [_vm._v("我的介绍")]), _vm._v(" "), _c('div', {
    staticClass: "block"
  }, [_c('textarea', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.textTmp),
      expression: "textTmp"
    }],
    attrs: {
      "rows": "4",
      "placeholder": "请输入个人介绍"
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
  })])]) : _vm._e(), _vm._v(" "), _c('div', {
    staticClass: "settings"
  }, [(_vm.type == 2) ? _c('div', {
    staticClass: "liveIntroduce"
  }, [_c('div', {
    staticClass: "liveIntroContainer"
  }, [_c('p', {
    staticClass: "title"
  }, [_vm._v("介绍图片")]), _vm._v(" "), _vm._l((_vm.contentsData.imgData), function(item, index) {
    return _c('div', {
      key: item.src,
      staticClass: "info"
    }, [_c('img', {
      attrs: {
        "src": _vm.previewImg[index],
        "width": "100",
        "alt": ""
      },
      on: {
        "click": _vm.imgAmplify
      }
    }), _vm._v(" "), _c('textarea', {
      directives: [{
        name: "model",
        rawName: "v-model",
        value: (item.explain),
        expression: "item.explain"
      }],
      attrs: {
        "placeholder": "请填写图片说明"
      },
      domProps: {
        "value": (item.explain)
      },
      on: {
        "keyup": function($event) {
          _vm.formatExplain(item)
        },
        "input": function($event) {
          if ($event.target.composing) { return; }
          item.explain = $event.target.value
        }
      }
    }), _vm._v(" "), _c('span', {
      staticClass: "tick sprite",
      on: {
        "click": function($event) {
          _vm.deleteImgIntro(index)
        }
      }
    })])
  }), _vm._v(" "), _c('section', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.contentsData.imgData.length < 6),
      expression: "contentsData.imgData.length<6"
    }],
    staticClass: "upload-btn",
    on: {
      "click": _vm.uploadIntroduce
    }
  }, [_c('div', {
    staticClass: "left"
  }), _vm._v(" "), _vm._m(0), _vm._v(" "), (!_vm.ismobile) ? _c('input', {
    staticClass: "imgpc",
    attrs: {
      "type": "file",
      "multiple": "",
      "accept": "image/gif,image/jpeg,image/jpg,image/png,image/svg"
    },
    on: {
      "change": _vm.onFileChange
    }
  }) : _vm._e()])], 2)]) : _vm._e()]), _vm._v(" "), _c('div', {
    staticClass: "submit-btn"
  }, [_c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": _vm.submit
    }
  }, [_vm._v("保存")])]), _vm._v(" "), _c('mt-popup', {
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
  }, [_vm._v("\n                        名字\n                    ")]), _vm._v(" "), _c('div', {
    staticClass: "msgcontent"
  }, [_c('textarea', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.myname),
      expression: "myname"
    }],
    attrs: {
      "autofocus": ""
    },
    domProps: {
      "value": (_vm.myname)
    },
    on: {
      "input": function($event) {
        if ($event.target.composing) { return; }
        _vm.myname = $event.target.value
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
    staticClass: "popup",
    attrs: {
      "popup-transition": "popup-fade"
    },
    model: {
      value: (_vm.showicon),
      callback: function($$v) {
        _vm.showicon = $$v
      },
      expression: "showicon"
    }
  }, [_c('div', {
    staticClass: "msgbox"
  }, [_c('div', {
    staticClass: "title"
  }, [_vm._v("\n                        修改头像\n                    ")]), _vm._v(" "), _c('div', {
    staticClass: "msgcontent"
  }, [_c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": _vm.chooseIcon
    }
  }, [_c('img', {
    attrs: {
      "src": _vm.myicon == '' ? _vm.myimg : _vm.myicon,
      "width": "124",
      "height": "124",
      "alt": ""
    }
  }), _vm._v(" "), _c('p', {
    staticClass: "chooseImg"
  }, [_vm._v("点击选择图片")]), _vm._v(" "), (!_vm.ismobile) ? _c('input', {
    staticClass: "iconpc",
    attrs: {
      "type": "file",
      "accept": "image/gif,image/jpeg,image/jpg,image/png,image/svg"
    },
    on: {
      "change": _vm.chooseIconPc
    }
  }) : _vm._e()])]), _vm._v(" "), _c('div', {
    staticClass: "msgbtns"
  }, [_c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": _vm.cancelicon
    }
  }, [_vm._v("取消")]), _vm._v(" "), _c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": _vm.ensure
    }
  }, [_vm._v("确定")])])])])], 1)])
},staticRenderFns: [function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "right"
  }, [_c('h4', [_vm._v("点击上传图片")]), _vm._v(" "), _c('p', [_vm._v("按上传顺序显示，最多6张")]), _vm._v(" "), _c('p', [_vm._v("建议尺寸:750×1334像素")])])
}]}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-02c1aa9a", module.exports)
  }
}

/***/ }),

/***/ 1224:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(953);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("7d5c0e77", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-02c1aa9a\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./info.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-02c1aa9a\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./info.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 473:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1224)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(898),
  /* template */
  __webpack_require__(1111),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\personalCenter\\info.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] info.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-02c1aa9a", Component.options)
  } else {
    hotAPI.reload("data-v-02c1aa9a", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 898:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function(NProgress) {

Object.defineProperty(exports, "__esModule", {
	value: true
});

var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };

var _mintUi = __webpack_require__(54);

var _vuex = __webpack_require__(70);

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; } //
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

// import { MessageBox, Toast, Indicator } from 'mint-ui'


exports.default = {
	props: ["qiniuDomain"],
	computed: (0, _vuex.mapState)({
		isWeiXin: function isWeiXin(state) {
			return state.isWeiXin;
		},
		type: function type(state) {
			return state.userInfo.type;
		},
		sdkdata: function sdkdata(state) {
			return state.sdkdata;
		},
		userId: function userId(state) {
			return state.userInfo.user_id;
		},
		iconSrc: function iconSrc(state) {
			return state.userInfo.img;
		},
		username: function username(state) {
			return state.userInfo.username;
		}
	}),
	data: function data() {
		var _ref;

		return _ref = {
			showLiveIntroduce: true,
			shownametext: false,
			showicon: false,
			textTmp: "",
			name: this.username,
			changebg: false,
			changeicon: false,
			getLiveIntroInfo: false,
			data: {},
			myname: "",
			myicon: "",
			myiconPc: "",
			myimg: this.iconSrc,
			contentsData: {
				content: "",
				imgData: []
			},
			images: {
				localId: "", //本地选择图片id
				serverId: "", //上传返回服务端id
				downloadId: "" //下载返回本地id
			},
			icons: {
				localId: "", //本地选择图片id
				serverId: "", //上传返回服务端id
				downloadId: "" //下载返回本地id
			},
			introImgs: {
				localId: [], //本地选择图片id
				serverId: [], //上传返回服务端id
				downloadId: [] //下载返回本地id
			},
			previewImg: [], //图片介绍src
			tapsave: false,
			paddingBottom: 50,
			i: 0, //上传第几张图
			ismobile: true,
			img_7: []
		}, _defineProperty(_ref, "images", ""), _defineProperty(_ref, "token", ""), _defineProperty(_ref, "showUrl", "http://oqt46pvmm.bkt.clouddn.com/"), _defineProperty(_ref, "submitFlag", false), _defineProperty(_ref, "isHasKeyWord", false), _ref;
	},
	created: function created() {
		var _this = this;

		this.$store.commit("setTitle", "修改我的介绍");
		this.$store.dispatch("getUserInfo", function (res) {
			_this.getLiveIntroData(_this.userId);
			_this.name = _this.username;
			_this.myimg = _this.iconSrc;
		});
		if (this.isWeiXin) {
			// alert("手机端");
			this.ismobile = true;
		} else {
			// alert("pc端");
			this.ismobile = false;
		}
		NProgress.start();
		// this.getSignPackage()
		// this.getData()
		// this.getLiveIntroData(userId)

		this.$store.commit("hideTabber");
	},
	mounted: function mounted() {
		// if (!this.ismobile && this.qiniuDomain) {
		// 	this.uploadBg();
		// }
		// if (this.$refs.bg && this.bgSrc != "") {
		// 	this.$refs.bg.style.backgroundImage = "url('" + this.bgSrc + "')";
		// 	// alert(this.$refs.bg.style.backgroundImage)
		// }
	},
	destroyed: function destroyed() {
		this.showLiveIntroduce = false;
		// Indicator.close()
		NProgress.done();
	},
	beforeRouteLeave: function beforeRouteLeave(to, from, next) {
		if (this.isHasKeyWord) {
			(0, _mintUi.Toast)('您的资料含有敏感词，请修改');
		} else {
			next();
		}
	},

	methods: {
		//图片放大
		imgAmplify: function imgAmplify(e) {

			wx.previewImage({
				current: e.target.src,
				urls: this.previewImg
			});
		},

		//上传到七牛
		update: function update(e, images, bool) {
			var _this2 = this;

			var file = e;
			var d = new Date();
			var type = file.name.split(".");
			console.log(type);
			var tokenParem = {
				putPolicy: '{"name":"$(fname)","size":"$(fsize)","w":"$(imageInfo.width)","h":"$(imageInfo.height)","hash":"$(etag)"}',
				key: "orderReview/" + d.getFullYear() + "/" + (d.getMonth() + 1) + "/" + d.getDate() + "/" + d.valueOf() + "." + type[type.length - 1],
				bucket: "http://oqt46pvmm.bkt.clouddn.com" //七牛的地址，这个是你自己配置的（变量）
			};
			var param = new FormData(); //创建form对象
			param.append("chunk", "0"); //断点传输
			param.append("chunks", "1");
			param.append("file", file, file.name);
			console.log(param.get("file")); //FormData私有类对象，访问不到，可以通过get判断值是否传进去
			var config = {
				headers: { "Content-Type": "multipart/form-data" }
			};
			//先从自己的服务端拿到token
			this.$http.post(this.hostUrl + "/Index/getUploadToken", {
				emulateJSON: true
			}).then(function (response) {
				_this2.token = response.body.data;
				param.append("token", _this2.token);

				_this2.uploading(param, file.name, images, bool); //然后将参数上传七牛
				return;
			});
		},
		uploading: function uploading(param, pathName, images, bool) {
			var _this3 = this;

			this.$http.post("http://up-z2.qiniu.com", param, {
				emulateJSON: true
			}).then(function (response) {
				console.log('response.data', response.data);
				if (bool) {
					_this3.myicon = _this3.showUrl + response.data.key;
					console.log('images', images);
				} else {
					var localArr = images.map(function (val, index, arr) {
						return arr[index].localSrc;
					});
					if (!~localArr.indexOf(pathName)) {
						images.push({
							src: _this3.showUrl + response.data.key,
							explain: "",
							type: 2
						});
					} else {
						(0, _mintUi.Toast)("图片重复啦");
					}
				}
			});
		},
		onFileChange: function onFileChange(e) {
			if (window.FileReader) {
				var files = e.target.files;
				this.img_7.push(e.target.files);
				if (!files.length || this.previewImg.length + files.length > 6) {
					(0, _mintUi.Toast)("图片不能超过六张");
					return;
				}
				this.createImage(files);
				for (var i = 0; i < files.length; i++) {
					var imgReg = /\.(gif|jpg|jpeg|png|GIF|JPG|PNG)$/;
					if (imgReg.test(files[0].name)) {
						this.update(files[i], this.contentsData.imgData);
					} else {
						(0, _mintUi.Toast)('请上传图片');
					}
				}
			}
		},
		createImage: function createImage(file) {
			if (typeof FileReader === "undefined") {
				(0, _mintUi.Toast)("您的浏览器不支持图片上传，请升级您的浏览器");
				return false;
			}
			var image = new Image();
			var vm = this;
			var leng = file.length;
			for (var i = 0; i < leng; i++) {
				var reader = new FileReader();
				reader.readAsDataURL(file[i]);
				reader.onload = function (e) {
					//   vm.contentsData.imgData.push({
					//     src: e.target.result,
					//     explain: "",
					//     type: 1
					//   });
					vm.previewImg.push(e.target.result);
					console.log(vm.previewImg);
				};
			}
		},
		clone: function clone(myObj) {
			if ((typeof myObj === "undefined" ? "undefined" : _typeof(myObj)) != "object") return myObj;
			if (myObj == null) return myObj;
			var myNewObj = new Object();
			for (var i in myObj) {
				myNewObj[i] = this.clone(myObj[i]);
			}return myNewObj;
		},

		//修改头像
		chooseIcon: function chooseIcon() {
			var _this4 = this;

			wx.chooseImage({
				count: 1, // 默认9
				sizeType: ["original", "compressed"], // 可以指定是原图还是压缩图，默认二者都有
				sourceType: ["album", "camera"], // 可以指定来源是相册还是相机，默认二者都有
				success: function success(res) {
					_this4.icons.localId = res.localIds[0]; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
					// alert('已选择 ' + res.localIds.length + ' 张图片');
					// alert(this.icons.localId);
					// //更新头像
					// this.$store.dispatch('getUserInfo', (res, commit) => {
					//     commit('setUserInfo', { key: 'img', val: this.icons.localId  })
					// })
					_this4.myicon = _this4.icons.localId;
					_this4.uploadImage(_this4.icons);
				}
			});
		},
		chooseIconPc: function chooseIconPc(e) {
			if (window.FileReader) {
				var file = e.target.files;
				var image = new Image();
				var vm = this;
				vm.myiconPc = file[0];
				var reader = new FileReader();
				reader.readAsDataURL(file[0]);
				reader.onload = function (e) {
					// vm.myicon = e.target.result;
					var imgReg = /\.(gif|jpg|jpeg|png|GIF|JPG|PNG)$/;
					if (imgReg.test(file[0].name)) {
						vm.update(file[0], vm.myicon, true);
					} else {
						(0, _mintUi.Toast)('请上传图片');
					}
				};
			}
		},

		//pc端修改头像 end、

		getUserInfo: function getUserInfo() {
			var _this5 = this;

			// 获取用户数据
			this.$http.get(this.hostUrl + "/User/", { loginRedirectUrl: location.href }, { emulateJSON: true }).then(function (res) {
				if (res.body.code == 200) {
					// 登录成功
					_this5.$store.commit("updateUserInfo", res.body.data);
					_this5.iconSrc = res.body.data.img;
				}
			});
		},

		//取消更改图片
		cancelicon: function cancelicon() {
			this.showicon = false;
			//this.getUserInfo()
			//this.myimg = this.iconSrc
			//this.changeicon = false
			this.myicon = "";
			// this.myimg = ""
			if (!this.ismobile) {
				this.icons.localId.length = 0;
			}

			this.icons.serverId.length = 0;
			this.icons.downloadId.length = 0;
		},

		//确定更改图片
		ensure: function ensure() {
			if (!this.ismobile) {
				// this.update(this.myiconPc, this.myicon, true);
				this.myimg = this.myicon;
			}

			this.showicon = false;

			//this.changeicon = true
		},
		setLiveName: function setLiveName() {
			this.myname = this.name;
			this.shownametext = true;
		},

		// 更改名字
		changeName: function changeName() {
			if (this.name.trim() == "" || this.name.length == "") {
				(0, _mintUi.Toast)("请输入用户名称");
			} else if (this.name.length > 10) {
				(0, _mintUi.Toast)("名字不得超过10个字符");
			} else {
				//更改名字
				this.name = this.myname;
				this.shownametext = false;
			}
		},

		//获取介绍数据
		getLiveIntroData: function getLiveIntroData(userId) {
			var _this6 = this;

			NProgress.start();
			this.$http.post(this.hostUrl + "/User/getUserLiveInfoByUserId", { userId: userId }, { emulateJSON: true }).then(function (res) {
				var data = res.body.data;
				if (res.body.code == 200) {
					_this6.contentsData.content = data.content;
					_this6.textTmp = data.content;

					data.imgList.forEach(function (val) {
						_this6.contentsData.imgData.push({
							src: val.src,
							explain: val.explain,
							type: 2
						});
						_this6.previewImg.push(val.src);
					});
				}
				// Indicator.close()
				NProgress.done();
			});
		},
		showLiveIntro: function showLiveIntro() {
			var _this7 = this;

			this.showLiveIntroduce = true;
			this.textTmp = this.contentsData.content;
			if (this.getLiveIntroInfo) {
				this.getLiveIntroInfo = false;
				// Indicator.open()
				this.$store.dispatch("getUserInfo", function (res) {
					_this7.getLiveIntroData(userId);
				});
			}
		},

		// saveSome() {
		//   this.showLiveIntroduce = false;
		//   this.contentsData.content = this.textTmp;
		//   if (!this.data.contentsData) {
		//     if (
		//       this.contentsData.content.trim() == "" &&
		//       this.contentsData.imgData.length == 0
		//     ) {
		//       return;
		//     } else {
		//       this.data.contentsData = {};
		//     }
		//   }
		//   this.data.contentsData.content = this.contentsData.content;
		//   this.data.contentsData.imgData = [];
		//   this.contentsData.imgData.forEach(val => {
		//     this.data.contentsData.imgData.push(this.clone(val));
		//   });
		// },
		cancelSome: function cancelSome() {
			this.showLiveIntroduce = false;
			this.getLiveIntroInfo = true;
		},
		submit: function submit() {
			var _this8 = this;

			if (this.submitFlag) {
				return;
			}
			this.data = {};

			if (!this.ismobile) {
				this.data.url = this.myimg;
			} else {
				this.data.url = this.icons.serverId;
			}
			if (this.name.trim() == "" || this.name.length == "") {
				(0, _mintUi.Toast)("请输入用户名称");
			} else if (this.name.length > 10) {
				(0, _mintUi.Toast)("名字不得超过10个字符");
			} else {
				this.data.name = this.name;
			}
			if (this.type == 2) {
				this.contentsData.content = this.textTmp;

				// if (this.contentsData.content.trim() == '') {
				//     Toast({
				//         message: '简介不能为空哦',
				//         duration: 1000
				//     })
				//     return
				// } else {
				this.data.contentsData = {};
				// }
				// for(var i = 0; i < this.img_7.length; i++){
				//     this.update(this.img_7[i])
				// }
				this.data.contentsData.content = this.contentsData.content;
				this.data.contentsData.imgData = [];
				this.contentsData.imgData.forEach(function (val) {
					_this8.data.contentsData.imgData.push(_this8.clone(val));
				});
			}

			this.$http.post(this.hostUrl + "User/saveUserData", this.data, {
				emulateJSON: true
			}).then(function (res) {
				if (res.body.code == 200) {
					_this8.submitFlag = true;
					_this8.isHasKeyWord = false;
					(0, _mintUi.Toast)({
						message: "保存成功",
						duration: 500
					});
					_this8.$store.dispatch("getUserInfo", function (res, commit) {
						commit("setUserInfo", { key: "username", val: _this8.name });
						commit("setUserInfo", { key: "img", val: _this8.myimg });
					});
					setTimeout(function () {
						_this8.$router.push("/personalCenter");
					}, 800);
				} else if (res.body.code == -18005) {
					_this8.isHasKeyWord = true;
					(0, _mintUi.Toast)({
						message: res.body.msg,
						duration: 1000
					});
				} else {
					_this8.submitFlag = false;
					(0, _mintUi.Toast)({
						message: res.body.msg,
						duration: 1000
					});
				}
			}, function (err) {
				_this8.submitFlag = false;
				document.body.innerHTML = JSON.stringify(err.body);
			});
		},
		upload: function upload(obj) {
			var _this9 = this;

			if (Array.isArray(obj.localId)) {
				this.i = 0;
				this.uploads(obj);
			} else {
				wx.uploadImage({
					localId: obj.localId,
					success: function success(res) {
						obj.serverId = res.serverId;
						if (obj === _this9.images) {
							_this9.changebg = true;
							// alert('点击了上传背景按钮')
						} else {
							_this9.changeicon = true;
							// alert('点击了上传图标按钮')
						}
						var u = navigator.userAgent;
						var isAndroid = u.indexOf("Android") > -1 || u.indexOf("Adr") > -1; //android终端
						var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端
						wx.getLocalImgData({
							localId: obj.localId, // 图片的localID
							success: function success(res) {
								// localData是图片的base64数据，可以用img标签显示
								if (obj === _this9.images) {
									_this9.changebg = true;
									if (isAndroid) {
										// this.bgSrc = 'data:image/jpeg;base64,' + res.localData
										_this9.bgSrc = obj.localId;
									} else if (isiOS) {
										_this9.bgSrc = res.localData;
									}
									// alert(this.bgSrc)
									// this.$refs.bg.style.backgroundImage = 'url("' + this.bgSrc + '")'
								} else {
									_this9.changeicon = true;
									if (isAndroid) {
										// this.iconSrc = 'data:image/jpeg;base64,' + res.localData
										// this.$store.dispatch('getUserInfo', (res, commit) => {
										//     commit('setUserInfo', { key: 'img', val: obj.localId })
										// })
										_this9.myicon = obj.localId;
									} else if (isiOS) {
										// this.$store.dispatch('getUserInfo', (res, commit) => {
										//     commit('setUserInfo', { key: 'img', val: obj.localId })
										// })
										_this9.myicon = res.localData;
									}
								}
							},
							fail: function fail(err) {
								// alert(JSON.stringify(err))
							}
						});
					},
					fail: function fail(res) {}
				});
			}
		},
		uploads: function uploads(obj) {
			var _this10 = this;

			//上传多张图片
			wx.uploadImage({
				localId: obj.localId[this.i],
				success: function success(res) {
					obj.serverId.push(res.serverId);
					var u = navigator.userAgent;
					var isAndroid = u.indexOf("Android") > -1 || u.indexOf("Adr") > -1; //android终端
					var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端

					if (isiOS) {
						// this.previewImg.push('data:image/jpeg;base64,' + res.localData)
						// alert(obj.localId[this.i])

						wx.getLocalImgData({
							localId: obj.localId[_this10.i], // 图片的localID
							success: function success(res) {
								// this.previewImg.push('data:image/png;base64,' + res.localData)// localData是图片的base64数据，可以用img标签显示
								_this10.previewImg.push(res.localData); // localData是图片的base64数据，可以用img标签显示
							}
						});
					} else {
						_this10.previewImg.push(obj.localId[_this10.i]);
					}
					// alert(this.i + 1)
					_this10.contentsData.imgData.push({
						src: res.serverId,
						explain: "",
						type: 1
					});
					_this10.i++;
					if (_this10.i < obj.localId.length) {
						_this10.uploads(obj);
					}
				},
				fail: function fail(res) {
					// alert(JSON.stringify(res))
				}
			});
		},
		uploadImage: function uploadImage(obj) {
			if (!Array.isArray(obj.serverId)) {
				obj.serverId = "";
			}
			this.upload(obj);
		},
		uploadIntroduce: function uploadIntroduce() {
			var _this11 = this;

			this.introImgs.localId = [];
			wx.chooseImage({
				count: 6 - this.contentsData.imgData.length, // 默认9
				sizeType: ["original", "compressed"], // 可以指定是原图还是压缩图，默认二者都有
				sourceType: ["album", "camera"], // 可以指定来源是相册还是相机，默认二者都有
				success: function success(res) {
					_this11.introImgs.localId = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
					// alert('已选择 ' + res.localIds.length + ' 张图片');
					// alert(this.introImgs.localId);
					_this11.uploadImage(_this11.introImgs);
					// ws.send(123123);
				}
			});
		},
		deleteImgIntro: function deleteImgIntro(i) {
			if (this.contentsData.imgData[i].type == 1) {
				var count = -1;
				for (var j = 0; j < i + 1; j++) {
					if (this.contentsData.imgData[j].type == 1) {
						count++;
					}
				}
				this.introImgs.localId.splice(count, 1);
				this.introImgs.serverId.splice(count, 1);
			}
			this.contentsData.imgData.splice(i, 1);
			this.previewImg.splice(i, 1);
		},
		formatExplain: function formatExplain(item) {
			item.explain = item.explain.replace(/[\uD83C|\uD83D|\uD83E][\uDC00-\uDFFF][\u200D|\uFE0F]|[\uD83C|\uD83D|\uD83E][\uDC00-\uDFFF]|[0-9|*|#]\uFE0F\u20E3|[0-9|#]\u20E3|[\u203C-\u3299]\uFE0F\u200D|[\u203C-\u3299]\uFE0F|[\u2122-\u2B55]|\u303D|[\A9|\AE]\u3030|\uA9|\uAE|\u3030/gi, "");
		}
	},
	watch: {
		textTmp: function textTmp(val) {
			this.textTmp = val.replace(/[\uD83C|\uD83D|\uD83E][\uDC00-\uDFFF][\u200D|\uFE0F]|[\uD83C|\uD83D|\uD83E][\uDC00-\uDFFF]|[0-9|*|#]\uFE0F\u20E3|[0-9|#]\u20E3|[\u203C-\u3299]\uFE0F\u200D|[\u203C-\u3299]\uFE0F|[\u2122-\u2B55]|\u303D|[\A9|\AE]\u3030|\uA9|\uAE|\u3030/gi, "");
		},
		myname: function myname(val) {
			this.myname = val.replace(/[\uD83C|\uD83D|\uD83E][\uDC00-\uDFFF][\u200D|\uFE0F]|[\uD83C|\uD83D|\uD83E][\uDC00-\uDFFF]|[0-9|*|#]\uFE0F\u20E3|[0-9|#]\u20E3|[\u203C-\u3299]\uFE0F\u200D|[\u203C-\u3299]\uFE0F|[\u2122-\u2B55]|\u303D|[\A9|\AE]\u3030|\uA9|\uAE|\u3030/gi, "");
		},
		qiniuDomain: function qiniuDomain(val) {
			if (val) {
				this.uploadBg();
			}
		}
	}
};
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(99)))

/***/ }),

/***/ 953:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.liveSetting-container {\n  min-height: 100%;\n  display: -webkit-box;\n  display: -webkit-flex;\n  display: -ms-flexbox;\n  display: flex;\n  -webkit-box-orient: vertical;\n  -webkit-box-direction: normal;\n  -webkit-flex-direction: column;\n      -ms-flex-direction: column;\n          flex-direction: column;\n  box-sizing: border-box;\n  -moz-box-sizing: border-box;\n  /* Firefox */\n  -webkit-box-sizing: border-box;\n  /* Safari */\n  background-color: #F5F7F8;\n  padding-bottom: 1.7rem;\n  position: relative;\n  overflow-x: hidden;\n}\n.liveSetting {\n  height: 100%;\n  background-color: #fff;\n  -webkit-box-flex: 1;\n  -webkit-flex: 1;\n      -ms-flex: 1;\n          flex: 1;\n}\n.liveSetting ::-webkit-input-placeholder {\n    color: #888888;\n    font-size: .32rem;\n}\n.liveSetting input {\n    color: #353535;\n}\n.liveSetting textarea {\n    color: #353535;\n}\n.liveSetting .set-head-img {\n    text-align: center;\n    border-bottom: .24rem solid #F5F7F8;\n    position: relative;\n}\n.liveSetting .set-head-img input {\n      width: 100%;\n      height: 1rem;\n      position: absolute;\n      left: 0;\n      bottom: 0;\n      opacity: 0;\n}\n.liveSetting .set-head-img img {\n      width: 1.3rem;\n      height: 1.3rem;\n      border-radius: 50%;\n      margin-top: .4rem;\n}\n.liveSetting .set-head-img h3 {\n      font-size: .32rem;\n      color: #c62f2f;\n      margin: .32rem 0;\n}\n.liveSetting .set-name {\n    padding: .24rem;\n    color: #353535;\n    border-bottom: .24rem solid #F5F7F8;\n}\n.liveSetting .set-name p {\n      font-size: .24rem;\n}\n.liveSetting .set-name input {\n      font-size: .32rem;\n      color: #353535;\n      margin-top: .3rem;\n      margin-bottom: .1rem;\n      padding-left: .24rem;\n}\n.liveSetting .set-intro {\n    padding: .4rem .24rem;\n    color: #353535;\n    border-bottom: .24rem solid #F5F7F8;\n}\n.liveSetting .set-intro p {\n      font-size: .24rem;\n}\n.liveSetting .set-intro .block {\n      padding: 0 .24rem;\n      margin-top: .24rem;\n}\n.liveSetting .set-intro .block textarea {\n        width: 100%;\n        resize: none;\n        line-height: .38rem;\n}\n.liveSetting .bg {\n    background-size: cover;\n    background-position: center top;\n    background-repeat: no-repeat;\n    position: relative;\n    height: 3.08rem;\n    margin-bottom: 0.3rem;\n}\n.liveSetting .bg a {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-orient: vertical;\n      -webkit-box-direction: normal;\n      -webkit-flex-direction: column;\n          -ms-flex-direction: column;\n              flex-direction: column;\n      text-align: center;\n      color: #fff;\n      background-color: rgba(0, 0, 0, 0.4);\n      border-radius: 5px;\n      font-size: 0.36rem;\n      position: absolute;\n      bottom: 0.16rem;\n      left: 50%;\n      -webkit-transform: translateX(-50%);\n          -ms-transform: translateX(-50%);\n              transform: translateX(-50%);\n      padding: 0.28rem 0;\n}\n.liveSetting .bg a p {\n        line-height: 0.36rem;\n        margin-bottom: 0.16rem;\n}\n.liveSetting .bg a span {\n        font-size: 0.2rem;\n        white-space: nowrap;\n}\n.liveSetting .settings {\n    background: #F5F7F8;\n    /*.mint-cell {\n                font-size: 0.32rem;\n                height: 1.1rem;\n                border-bottom: 1px solid #f0f0f0;\n                &:last-child {\n                    background-image: none;\n                }\n            }\n            .mint-cell-title {\n                color: #666;\n            }\n            .mint-cell-wrapper {\n                background-image: none;\n                height: 1.1rem;\n                img {\n                    width: 0.76rem;\n                    height: 0.76rem;\n                    border-radius: 0.1rem;\n                }\n                .icon-size-info {\n                    margin-right: 0.2rem;\n                }\n            }*/\n}\n.liveSetting .settings .liveIntroduce {\n      width: 100%;\n      box-sizing: border-box;\n      -moz-box-sizing: border-box;\n      /* Firefox */\n      -webkit-box-sizing: border-box;\n      /* Safari */\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-orient: vertical;\n      -webkit-box-direction: normal;\n      -webkit-flex-direction: column;\n          -ms-flex-direction: column;\n              flex-direction: column;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n      z-index: 1000;\n      background-color: #F5F7F8;\n      /*textarea {\n                    resize: none;\n                    width: 100%;\n                    display: block;\n                    box-sizing: border-box;\n                    color: #666;\n                }*/\n      /*.upload {\n\t\t\t\t\tmargin-top: 0.3rem;\n\t\t\t\t\tposition:relative;\n                }*/\n      /*.upload a {\n                    display: block;\n                    width: 100%;\n                    background-color: #fff;\n                    text-align: center;\n                    padding-bottom: 0.3rem;\n                    p:first-child {\n                        font-size: 0.32rem;\n                        color: #333;\n                        display: flex;\n                        justify-content: center;\n                        align-items: center;\n                        line-height: 0.88rem;\n                        span {\n                            line-height: 1;\n                            &:before {\n                                width: 0.72rem;\n\t\t\t\t\t\t\t\theight: 0.72rem;\n\t\t\t\t\t\t\t\t!*background-position: -9.4rem -2.2rem;*!\n                                background: url(\"/images/12-1.png\") no-repeat;\n                                -webkit-background-size: 100% 100%;\n                                background-size: 100% 100%;\n\t\t\t\t\t\t\t\tmargin-right:-.1rem;\n                            }\n                        }\n                    }\n                    p:last-child {\n                        font-size: 0.26rem;\n                        color: #999;\n                        line-height: 1.5;\n                    }\n\t\t\t\t}*/\n}\n.liveSetting .settings .liveIntroduce .liveIntroContainer {\n        -webkit-box-flex: 1;\n        -webkit-flex: 1;\n            -ms-flex: 1;\n                flex: 1;\n        width: 100%;\n        /*& > textarea {\n                        height: 3.2rem;\n                        padding: 0.24rem;\n                        font-size: 0.32rem;\n                        color: #666;\n                        margin-bottom: 0.3rem;\n                        margin-top: 0.3rem;\n                    }*/\n}\n.liveSetting .settings .liveIntroduce .title {\n        font-size: .24rem;\n        color: #353535;\n        padding: .4rem .24rem .16rem .24rem;\n        background: #ffffff;\n}\n.liveSetting .settings .liveIntroduce .info {\n        background-color: #fff;\n        padding: 0 .48rem;\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-align: center;\n        -webkit-align-items: center;\n            -ms-flex-align: center;\n                align-items: center;\n        position: relative;\n        padding-bottom: .24rem;\n}\n.liveSetting .settings .liveIntroduce .info span {\n          position: absolute;\n          top: 0;\n          left: 2.72rem;\n          width: 0.36rem;\n          height: 0.36rem;\n          background: url(\"/images/3.0/close-01.png\") no-repeat center center;\n          background-size: 100% 100%;\n}\n.liveSetting .settings .liveIntroduce .info img {\n          width: 2.6rem;\n          height: 1.46rem;\n          margin-right: 0.24rem;\n}\n.liveSetting .settings .liveIntroduce .info textarea {\n          -webkit-box-flex: 1;\n          -webkit-flex: 1;\n              -ms-flex: 1;\n                  flex: 1;\n          height: 1.46rem;\n          resize: none;\n          padding: 0;\n}\n.liveSetting .settings .liveIntroduce .upload-btn {\n        background: #ffffff;\n        padding-left: .48rem;\n        padding-bottom: .4rem;\n        min-height: 1.46rem;\n        overflow: hidden;\n        margin-bottom: .24rem;\n        position: relative;\n}\n.liveSetting .settings .liveIntroduce .upload-btn .left {\n          width: 2.6rem;\n          height: 1.46rem;\n          margin-right: 0.24rem;\n          float: left;\n          background: #f5f7f8 url(\"/images/12-2.png\") no-repeat center center;\n          background-size: .34rem .32rem;\n}\n.liveSetting .settings .liveIntroduce .upload-btn .right h4 {\n          color: #c62f2f;\n          font-size: .32rem;\n          margin-bottom: .1rem;\n          margin-top: .2rem;\n}\n.liveSetting .settings .liveIntroduce .upload-btn .right p {\n          font-size: .24rem;\n          color: #b2b2b2;\n          line-height: .3rem;\n}\n.liveSetting .settings .liveIntroduce .imgpc {\n        position: absolute;\n        top: 0;\n        height: 100%;\n        width: 100%;\n        opacity: 0;\n        left: 0;\n}\n.liveSetting .settings .liveIntroduce .btn {\n        width: 80%;\n        height: 1.6rem;\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-pack: justify;\n        -webkit-justify-content: space-between;\n            -ms-flex-pack: justify;\n                justify-content: space-between;\n        box-sizing: border-box;\n        padding-top: 0.3rem;\n}\n.liveSetting .settings .liveIntroduce .btn a {\n          display: block;\n          line-height: 0.9rem;\n          font-size: 0.36rem;\n          width: 45%;\n          height: 0.9rem;\n          text-align: center;\n          border-radius: 0.16rem;\n}\n.liveSetting .settings .liveIntroduce .btn a:first-child {\n            box-sizing: border-box;\n            border: 1px solid #b2b2b2;\n            color: #999999;\n}\n.liveSetting .settings .liveIntroduce .btn a:last-child {\n            background-color: #cf2f2f;\n            color: #fff;\n}\n.liveSetting .submit-btn {\n    position: fixed;\n    width: 100%;\n    bottom: 0px;\n    left: 50%;\n    -webkit-transform: translateX(-50%);\n        -ms-transform: translateX(-50%);\n            transform: translateX(-50%);\n}\n.liveSetting .submit-btn a {\n      display: block;\n      height: 1rem;\n      line-height: 1rem;\n      color: #fff;\n      text-align: center;\n      font-size: 0.36rem;\n      width: 100%;\n      background-color: #cf2f2f;\n}\n.liveSetting .popup {\n    width: 85%;\n    border-radius: 0.06rem;\n    overflow: hidden;\n    background-color: #fff;\n}\n.liveSetting .popup .title {\n      padding-top: 0.3rem;\n      font-size: 0.32rem;\n      color: #333;\n      text-align: center;\n}\n.liveSetting .popup .msgcontent {\n      padding: 0.2rem 0.4rem 0.3rem;\n      min-height: 0.72rem;\n      position: relative;\n}\n.liveSetting .popup .msgcontent img {\n        border-radius: 0.16rem;\n        overflow: hidden;\n}\n.liveSetting .popup .msgcontent a {\n        display: block;\n        text-align: center;\n}\n.liveSetting .popup .msgcontent textarea {\n        background-color: #f0f0f0;\n        border-radius: 0.16rem;\n        padding: 0.3rem 0.28rem;\n        box-sizing: border-box;\n        height: 2.5rem;\n        color: #666;\n        font-size: 0.3rem;\n        resize: none;\n        width: 100%;\n}\n.liveSetting .popup .iconpc {\n      position: absolute;\n      bottom: 0;\n      height: 0.88rem;\n      width: 100%;\n      opacity: 0;\n      left: 0;\n}\n.liveSetting .popup .chooseImg {\n      color: #cf2f2f;\n      margin-top: 0.2rem;\n}\n.liveSetting .popup .msgbtns {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      height: 66px;\n      line-height: 0.98rem;\n}\n.liveSetting .popup .msgbtns a {\n        border-radius: 5px;\n        height: 0.98rem;\n        font-size: 0.36rem;\n        line-height: 0.98rem;\n        width: 45%;\n        box-sizing: border-box;\n        text-align: center;\n}\n.liveSetting .popup .msgbtns a:first-child {\n          margin-left: 0.4rem;\n          margin-right: 0.28rem;\n          color: #999;\n          border: 1px solid #b2b2b2;\n}\n.liveSetting .popup .msgbtns a:last-child {\n          color: #fff;\n          background-color: #cf2f2f;\n          margin-left: 0.28rem;\n          margin-right: 0.4rem;\n}\n.mint-toast {\n  z-index: 9999;\n}\n", ""]);

// exports


/***/ })

});