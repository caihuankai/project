webpackJsonp([69],{

/***/ 1154:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "liveSetting-container",
    style: ({
      paddingBottom: _vm.paddingBottom + 'px'
    })
  }, [_c('div', {
    staticClass: "liveSetting"
  }, [_c('div', {
    ref: "bg",
    staticClass: "bg",
    attrs: {
      "id": "uploadBg-container"
    }
  }, [_c('a', {
    attrs: {
      "href": "javascript:;",
      "id": "uploadBg"
    },
    on: {
      "click": _vm.changeBg
    }
  }, [_c('p', [_vm._v("替换背景海报")]), _vm._v(" "), _c('span', [_vm._v("（标准尺寸750×334，大小建议1M以下）")])])]), _vm._v(" "), _c('div', {
    staticClass: "settings"
  }, [_c('div', {
    on: {
      "click": function($event) {
        _vm.showicon = true
      }
    }
  }, [_c('mt-cell', {
    attrs: {
      "title": "直播间图标",
      "is-link": ""
    }
  }, [_c('span', {
    staticClass: "icon-size-info"
  }, [_vm._v("132×132")]), _vm._v(" "), _c('img', {
    attrs: {
      "src": _vm.iconSrc,
      "alt": ""
    }
  })])], 1), _vm._v(" "), _c('div', {
    on: {
      "click": _vm.setLiveName
    }
  }, [_c('mt-cell', {
    attrs: {
      "title": "直播间名称",
      "is-link": "",
      "value": _vm.data.name
    }
  })], 1), _vm._v(" "), _c('div', {
    on: {
      "click": _vm.showLiveIntro
    }
  }, [_c('mt-cell', {
    attrs: {
      "title": "直播间介绍",
      "is-link": ""
    }
  })], 1), _vm._v(" "), _c('div', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.showLiveIntroduce),
      expression: "showLiveIntroduce"
    }],
    staticClass: "liveIntroduce"
  }, [_c('div', {
    staticClass: "liveIntroContainer"
  }, [_c('textarea', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.textTmp),
      expression: "textTmp"
    }],
    attrs: {
      "placeholder": "请输入直播间介绍"
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
  }), _vm._v(" "), _vm._l((_vm.contentsData.imgData), function(item, index) {
    return _c('div', {
      key: item.src,
      staticClass: "info"
    }, [_c('img', {
      attrs: {
        "src": _vm.previewImg[index],
        "width": "100",
        "alt": ""
      }
    }), _vm._v(" "), _c('textarea', {
      directives: [{
        name: "model",
        rawName: "v-model",
        value: (item.explain),
        expression: "item.explain"
      }],
      attrs: {
        "placeholder": "填写说明"
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
  }), _vm._v(" "), _c('div', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.contentsData.imgData.length < 6),
      expression: "contentsData.imgData.length<6"
    }],
    staticClass: "upload"
  }, [_c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": _vm.uploadIntroduce
    }
  }, [_vm._m(0), _vm._v(" "), _c('p', [_vm._v("最多支持6张图片，标注尺寸750x308，大小1M以下，按上传的正序展示")])])])], 2), _vm._v(" "), _c('div', {
    staticClass: "btn"
  }, [_c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": _vm.cancelSome
    }
  }, [_vm._v("取消")]), _vm._v(" "), _c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": _vm.saveSome
    }
  }, [_vm._v("保存")])])]), _vm._v(" "), _c('div', [_c('mt-cell', {
    attrs: {
      "title": "直播间邀请卡",
      "is-link": "",
      "to": '/invitecard/' + _vm.data.id + '/0/2'
    }
  })], 1)]), _vm._v(" "), _c('div', {
    staticClass: "submit-btn"
  }, [_c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": _vm.submit
    }
  }, [_vm._v("保存并返回后台")])]), _vm._v(" "), _c('mt-popup', {
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
  }, [_vm._v("\n                    直播间名称\n                ")]), _vm._v(" "), _c('div', {
    staticClass: "msgcontent"
  }, [_c('textarea', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.textTmp),
      expression: "textTmp"
    }],
    attrs: {
      "autofocus": ""
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
  }, [_vm._v("\n                    直播间图标\n                ")]), _vm._v(" "), _c('div', {
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
      "src": _vm.iconSrc,
      "width": "124",
      "height": "124",
      "alt": ""
    }
  }), _vm._v(" "), _c('p', {
    staticClass: "chooseImg"
  }, [_vm._v("点击选择图片")])])]), _vm._v(" "), _c('div', {
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
      "click": function($event) {
        _vm.showicon = false
      }
    }
  }, [_vm._v("确定")])])])])], 1)])
},staticRenderFns: [function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('p', [_c('span', {
    staticClass: "sprite"
  }), _vm._v("上传图片")])
}]}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-35cd454f", module.exports)
  }
}

/***/ }),

/***/ 1264:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(996);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("00cb30ad", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-35cd454f\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./liveSetting.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-35cd454f\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./liveSetting.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 476:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1264)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(901),
  /* template */
  __webpack_require__(1154),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\personalCenter\\liveSetting.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] liveSetting.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-35cd454f", Component.options)
  } else {
    hotAPI.reload("data-v-35cd454f", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 901:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function(NProgress, $) {

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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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


var _mintUi = __webpack_require__(54);

var _vuex = __webpack_require__(70);

exports.default = {
    props: ['qiniuDomain'],
    computed: (0, _vuex.mapState)({
        isWeiXin: function isWeiXin(state) {
            return state.isWeiXin;
        },
        type: function type(state) {
            return state.userInfo.type;
        },
        sdkdata: function sdkdata(state) {
            return state.sdkdata;
        }
    }),
    data: function data() {
        return {
            showLiveIntroduce: false,
            shownametext: false,
            showicon: false,
            textTmp: '',
            changebg: false,
            changeicon: false,
            getLiveIntroInfo: false,
            data: {},
            bgSrc: '', //背景图src
            iconSrc: '', //直播间图标src
            contentsData: {
                content: '',
                imgData: []
            },
            images: {
                localId: '', //本地选择图片id
                serverId: '', //上传返回服务端id
                downloadId: '' //下载返回本地id
            },
            icons: {
                localId: '', //本地选择图片id
                serverId: '', //上传返回服务端id
                downloadId: '' //下载返回本地id
            },
            introImgs: {
                localId: [], //本地选择图片id
                serverId: [], //上传返回服务端id
                downloadId: [] //下载返回本地id
            },
            previewImg: [], //图片介绍src
            tapsave: false,
            paddingBottom: 85,
            i: 0 //上传第几张图
        };
    },
    created: function created() {
        // this.updateTitle('直播间设置')
        this.$store.commit('setTitle', '直播间设置');
        if (this.type == 2) {
            // 未创建直播间的跳转回个人中心页面
            this.$router.push('/personalCenter');
        }
        //        if (this.sdkdata.appId) {
        //            this.wxconfig(this.sdkdata, this)
        //        }
        // Indicator.open()
        NProgress.start();
        // this.getSignPackage()
        this.getData();
        this.getLiveIntroData();
        // this.$emit('hideTabber')
        this.$store.commit('hideTabber');
    },
    mounted: function mounted() {
        if (!this.isWeiXin && this.qiniuDomain) {
            this.uploadBg();
        }
        if (this.$refs.bg && this.bgSrc != '') {
            this.$refs.bg.style.backgroundImage = "url('" + this.bgSrc + "')";
            // alert(this.$refs.bg.style.backgroundImage)
        }
    },
    destroyed: function destroyed() {
        this.showLiveIntroduce = false;
        // Indicator.close()
        NProgress.done();
    },

    methods: {
        // getSignPackage() {
        //     this.$http.post(this.hostUrl + '/Jssdk/getSignPackage/', { user_id: this.userId, url: location.hostname + '/' + location.hash }, { emulateJSON: true }).then(res => {
        //         console.log(res.body)
        //         this.wxconfig(res.body.data)
        //     })
        // },
        uploadBg: function uploadBg() {
            var _this = this;

            // let uptoken = ''
            // $.ajax({
            //     url: this.hostUrl + '/index/getUploadToken',
            //     async: false,
            //     success: res => {
            //         if (res.code == 200) {
            //             uptoken = res.data
            //         }
            //     }
            // })
            var uploader = Qiniu.uploader({
                runtimes: 'html5,flash,html4', // 上传模式，依次退化
                browse_button: 'uploadBg', // 上传选择的点选按钮，必需
                // 在初始化时，uptoken，uptoken_url，uptoken_func三个参数中必须有一个被设置
                // 切如果提供了多个，其优先级为uptoken > uptoken_url > uptoken_func
                // 其中uptoken是直接提供上传凭证，uptoken_url是提供了获取上传凭证的地址，如果需要定制获取uptoken的过程则可以设置uptoken_func
                // uptoken : '<Your upload token>', // uptoken是上传凭证，由其他程序生成
                // uptoken_url: '/uptoken',         // Ajax请求uptoken的Url，强烈建议设置（服务端提供）
                // uptoken_func: function(){    // 在需要获取uptoken时，该方法会被调用
                //    // do something
                //    return uptoken;
                // },
                uptoken_func: function uptoken_func() {
                    // 在需要获取uptoken时，该方法会被调用
                    var uptoken = '';
                    $.ajax({
                        url: _this.hostUrl + '/index/getUploadToken',
                        async: false,
                        success: function success(res) {
                            if (res.code == 200) {
                                uptoken = res.data;
                            }
                        }
                    });
                    return uptoken;
                },
                get_new_uptoken: true, // 设置上传文件的时候是否每次都重新获取新的uptoken
                // downtoken_url: '/downtoken',
                // Ajax请求downToken的Url，私有空间时使用，JS-SDK将向该地址POST文件的key和domain，服务端返回的JSON必须包含url字段，url值为该文件的下载地址
                // unique_names: true,              // 默认false，key为文件名。若开启该选项，JS-SDK会为每个文件自动生成key（文件名）
                // save_key: true,                  // 默认false。若在服务端生成uptoken的上传策略中指定了sava_key，则开启，SDK在前端将不对key进行任何处理
                domain: this.qiniuDomain, // bucket域名，下载资源时用到，必需
                container: 'uploadBg-container', // 上传区域DOM ID，默认是browser_button的父元素
                max_file_size: '100mb', // 最大文件体积限制
                flash_swf_url: '../assets/lib/plupload-3.1.0/js/Moxie.swf', //引入flash，相对路径
                max_retries: 1, // 上传失败最大重试次数
                dragdrop: true, // 开启可拖曳上传
                drop_element: 'uploadBg-container', // 拖曳上传区域元素的ID，拖曳文件或文件夹后可触发上传
                chunk_size: '4mb', // 分块上传时，每块的体积
                auto_start: true, // 选择文件后自动上传，若关闭需要自己绑定事件触发上传
                //x_vars : {
                //    查看自定义变量
                //    'time' : function(up,file) {
                //        var time = (new Date()).getTime();
                // do something with 'time'
                //        return time;
                //    },
                //    'size' : function(up,file) {
                //        var size = file.size;
                // do something with 'size'
                //        return size;
                //    }
                //},
                filters: {
                    mime_types: [{ title: 'Image files', extensions: 'jpg,jpeg,gif,png' }]
                },
                multi_selection: false,
                init: {
                    'FilesAdded': function FilesAdded(up, files) {
                        plupload.each(files, function (file) {
                            // 文件添加进队列后，处理相关的事情
                            console.log('FilesAdded');
                        });
                    },
                    'BeforeUpload': function BeforeUpload(up, file) {
                        // 每个文件上传前，处理相关的事情
                        console.log('BeforeUpload', up);
                    },
                    'UploadProgress': function UploadProgress(up, file) {
                        // 每个文件上传时，处理相关的事情
                        console.log('UploadProgress');
                    },
                    'FileUploaded': function FileUploaded(up, file, info) {
                        // 每个文件上传成功后，处理相关的事情
                        // 其中info是文件上传成功后，服务端返回的json，形式如：
                        // {
                        //    "hash": "Fh8xVqod2MQ1mocfI4S4KpRL6D98",
                        //    "key": "gogopher.jpg"
                        //  }
                        // 查看简单反馈
                        // var domain = up.getOption('domain');
                        // var res = parseJSON(info);
                        // var sourceLink = domain +"/"+ res.key; 获取上传成功后的文件的Url
                        console.log('FileUploaded');
                    },
                    'Error': function Error(up, err, errTip) {
                        //上传出错时，处理相关的事情
                        console.log('Error', err, errTip);
                    },
                    'UploadComplete': function UploadComplete() {
                        //队列文件处理完毕后，处理相关的事情
                        console.log('UploadComplete');
                    }
                    // 'Key': function (up, file) {
                    //     // 若想在前端对每个文件的key进行个性化处理，可以配置该函数
                    //     // 该配置必须要在unique_names: false，save_key: false时才生效
                    //     var key = "";
                    //     // do something with key here
                    //     return key
                    // }
                }
            });
            // domain为七牛空间对应的域名，选择某个空间后，可通过 空间设置->基本设置->域名设置 查看获取
            // uploader为一个plupload对象，继承了所有plupload的方法
        },
        getData: function getData() {
            var _this2 = this;

            this.$http.get(this.hostUrl + '/Live/setupIndex?id=2').then(function (res) {
                console.log(res.body);
                // Indicator.close()
                NProgress.done();
                if (res.body.code == 200) {
                    _this2.data = res.body.data;
                    _this2.bgSrc = _this2.data.backgroundImg;
                    if (_this2.$refs.bg) {
                        _this2.$refs.bg.style.backgroundImage = "url('" + _this2.bgSrc + "')";
                        // alert(this.$refs.bg.style.backgroundImage)
                    }
                    _this2.iconSrc = _this2.data.img;
                }
            });
        },
        clone: function clone(myObj) {
            if ((typeof myObj === 'undefined' ? 'undefined' : _typeof(myObj)) != 'object') return myObj;
            if (myObj == null) return myObj;
            var myNewObj = new Object();
            for (var i in myObj) {
                myNewObj[i] = this.clone(myObj[i]);
            }return myNewObj;
        },
        chooseIcon: function chooseIcon() {
            var _this3 = this;

            wx.chooseImage({
                count: 1, // 默认9
                sizeType: ['original', 'compressed'], // 可以指定是原图还是压缩图，默认二者都有
                sourceType: ['album', 'camera'], // 可以指定来源是相册还是相机，默认二者都有
                success: function success(res) {
                    _this3.icons.localId = res.localIds[0]; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
                    // alert('已选择 ' + res.localIds.length + ' 张图片');
                    // alert(this.icons.localId);
                    _this3.uploadImage(_this3.icons);
                    // ws.send(123123);
                }
            });
        },
        cancelicon: function cancelicon() {
            this.showicon = false;
            this.icons.localId.length = 0;
            this.icons.serverId.length = 0;
            this.icons.downloadId.length = 0;
        },
        setLiveName: function setLiveName() {
            this.textTmp = this.data.name;
            this.shownametext = true;
        },
        changeName: function changeName() {
            if (this.textTmp.trim() == '') {
                (0, _mintUi.Toast)('请输入直播间名称');
            } else if (this.$bytesLength(this.textTmp) > 50) {
                (0, _mintUi.Toast)('课程名称不得超过25个汉字');
            } else {
                this.shownametext = false;
                this.data.name = this.textTmp;
                console.log(this.data.name);
            }
        },
        getLiveIntroData: function getLiveIntroData() {
            var _this4 = this;

            NProgress.start();
            this.$http.get(this.hostUrl + '/Live/setupContent').then(function (res) {
                var data = res.body.data;
                if (res.body.code == 200) {
                    _this4.contentsData.content = data.content;
                    _this4.textTmp = data.content;
                    _this4.contentsData.imgData = [];
                    data.imgData.forEach(function (val) {
                        _this4.contentsData.imgData.push({
                            src: val.src,
                            explain: val.explain,
                            type: 2
                        });
                        _this4.previewImg.push(val.src);
                    });
                }
                // Indicator.close()
                NProgress.done();
            });
        },
        showLiveIntro: function showLiveIntro() {
            this.showLiveIntroduce = true;
            this.textTmp = this.contentsData.content;
            if (this.getLiveIntroInfo) {
                this.getLiveIntroInfo = false;
                // Indicator.open()
                this.getLiveIntroData();
            }
        },
        saveSome: function saveSome() {
            var _this5 = this;

            this.showLiveIntroduce = false;
            this.contentsData.content = this.textTmp;
            if (!this.data.contentsData) {
                if (this.contentsData.content.trim() == '' && this.contentsData.imgData.length == 0) {
                    return;
                } else {
                    this.data.contentsData = {};
                }
            }
            this.data.contentsData.content = this.contentsData.content;
            this.data.contentsData.imgData = [];
            this.contentsData.imgData.forEach(function (val) {
                _this5.data.contentsData.imgData.push(_this5.clone(val));
            });
        },
        cancelSome: function cancelSome() {
            this.showLiveIntroduce = false;
            this.getLiveIntroInfo = true;
        },
        submit: function submit() {
            var _this6 = this;

            if (this.tapsave) {
                return;
            }
            this.tapsave = true;
            if (this.changebg) {
                this.data.backgroundImg = this.images.serverId;
            } else {
                delete this.data.backgroundImg;
            }
            if (this.changeicon) {
                this.data.img = this.icons.serverId;
            } else {
                delete this.data.img;
            }
            this.data.contentsData = {};
            this.data.contentsData.content = this.contentsData.content;
            this.data.contentsData.imgData = [];
            this.contentsData.imgData.forEach(function (val) {
                _this6.data.contentsData.imgData.push(_this6.clone(val));
            });
            // alert(JSON.stringify(this.data))
            // this.$http.post(this.hostUrl + '/Live/setupSave', this.data, { emulateJSON: true }).then(res => {
            this.$http.post(this.hostUrl + '/Live/setupSave', this.data, { emulateJSON: true }).then(function (res) {
                // alert(this.data.backgroundImg)
                // alert('success ' + JSON.stringify(res.body))
                // document.body.innerHTML = this.data.img
                // alert(JSON.stringify(res.body))
                if (res.body.code == 200) {
                    _this6.$router.push('/personalCenter');
                }
            }, function (err) {
                // alert('error ' + JSON.stringify(err.body))
                document.body.innerHTML = JSON.stringify(err.body);
            });
        },
        changeBg: function changeBg() {
            var _this7 = this;

            if (this.isWeiXin) {
                wx.chooseImage({
                    count: 1, // 默认9
                    sizeType: ['original', 'compressed'], // 可以指定是原图还是压缩图，默认二者都有
                    sourceType: ['album', 'camera'], // 可以指定来源是相册还是相机，默认二者都有
                    success: function success(res) {
                        _this7.images.localId = res.localIds[0]; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
                        // alert('已选择 ' + res.localIds.length + ' 张图片');
                        // alert(this.images.localId);
                        _this7.uploadImage(_this7.images);
                        // ws.send(123123);
                    }
                });
            }
        },
        upload: function upload(obj) {
            var _this8 = this;

            if (Array.isArray(obj.localId)) {
                this.i = 0;
                this.uploads(obj);
            } else {
                wx.uploadImage({
                    localId: obj.localId,
                    success: function success(res) {
                        obj.serverId = res.serverId;
                        if (obj === _this8.images) {
                            _this8.changebg = true;
                            // alert('点击了上传背景按钮')
                        } else {
                            _this8.changeicon = true;
                            // alert('点击了上传图标按钮')
                        }
                        var u = navigator.userAgent;
                        var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Adr') > -1; //android终端
                        var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端
                        wx.getLocalImgData({
                            localId: obj.localId, // 图片的localID
                            success: function success(res) {
                                // localData是图片的base64数据，可以用img标签显示
                                if (obj === _this8.images) {
                                    _this8.changebg = true;
                                    if (isAndroid) {
                                        // this.bgSrc = 'data:image/jpeg;base64,' + res.localData
                                        _this8.bgSrc = obj.localId;
                                    } else if (isiOS) {
                                        _this8.bgSrc = res.localData;
                                    }
                                    // alert(this.bgSrc)
                                    // this.$refs.bg.style.backgroundImage = 'url("' + this.bgSrc + '")'
                                } else {
                                    _this8.changeicon = true;
                                    if (isAndroid) {
                                        // this.iconSrc = 'data:image/jpeg;base64,' + res.localData
                                        _this8.iconSrc = obj.localId;
                                    } else if (isiOS) {
                                        _this8.iconSrc = res.localData;
                                    }
                                }
                            },
                            fail: function fail(err) {
                                // alert(JSON.stringify(err))
                            }
                        });
                        // alert('mediaId=' + obj.serverId)
                        // this.$http.post(this.hostUrl + '/QiNiu/uploadPictureFromWeixin', { img: obj.serverId, positionType }, { emulateJSON: true }).then(res => {
                        //     alert(JSON.stringify(res.body))
                        //     document.body.innerHTML = JSON.stringify(res.body)
                        // }, err => {
                        //     alert(JSON.stringify(err.body))
                        //     document.body.innerHTML = err.body
                        // })
                        // i++;
                        // alert('已上传：' + i + '/' + length);
                        // arr.serverId.push(res.serverId);
                        // alert(arr.serverId);
                        // alert('http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=' + accessToken + '&media_id=' + arr.serverId);
                        // // console.log('http://file.api.weixin.qq.com/cgi-bin/media/get?access_token='+accessToken+'&media_id='+images.serverId);
                        // console.log(arr.serverId);
                        // document.getElementById("text").appendChild(document.createElement('pre')).innerHTML = 'http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=' + accessToken + '&media_id=' + this.images.serverId;
                        // ws.send('http://file.api.weixin.qq.com/cgi-bin/media/get?access_token='+accessToken+'&media_id='+images.serverId);
                        // if (i < length) {
                        //   upload();
                        // }
                    },
                    fail: function fail(res) {
                        // alert(JSON.stringify(res))
                    }
                });
            }
        },
        uploads: function uploads(obj) {
            var _this9 = this;

            //上传多张图片
            wx.uploadImage({
                localId: obj.localId[this.i],
                success: function success(res) {
                    obj.serverId.push(res.serverId);
                    var u = navigator.userAgent;
                    var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Adr') > -1; //android终端
                    var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端

                    if (isAndroid) {
                        // this.previewImg.push('data:image/jpeg;base64,' + res.localData)
                        // alert(obj.localId[this.i])
                        _this9.previewImg.push(obj.localId[_this9.i]);
                    } else if (isiOS) {
                        wx.getLocalImgData({
                            localId: obj.localId[_this9.i], // 图片的localID
                            success: function success(res) {
                                // this.previewImg.push('data:image/png;base64,' + res.localData)// localData是图片的base64数据，可以用img标签显示
                                _this9.previewImg.push(res.localData); // localData是图片的base64数据，可以用img标签显示
                            }
                        });
                    }
                    // alert(this.i + 1)
                    _this9.contentsData.imgData.push({
                        src: res.serverId,
                        explain: '',
                        type: 1
                    });
                    _this9.i++;
                    if (_this9.i < obj.localId.length) {
                        _this9.uploads(obj);
                    }
                    // this.$http.post(this.hostUrl + '/QiNiu/uploadPictureFromWeixin', { img: obj.serverId[i], positionType }, { emulateJSON: true }).then(res => {
                    //     alert(JSON.stringify(res.body))

                    // }, err => {
                    //     alert(JSON.stringify(err))
                    // })
                },
                fail: function fail(res) {
                    // alert(JSON.stringify(res))
                }
            });
        },
        uploadImage: function uploadImage(obj) {
            // if (arr.localId.length == 0) {
            //     alert('请先使用 chooseImage 接口选择图片');
            //     return;
            // }
            // var i = 0, length = arr.localId.length;
            // var length = arr.localId.length;
            if (!Array.isArray(obj.serverId)) {
                obj.serverId = '';
            }
            this.upload(obj);
        },
        uploadIntroduce: function uploadIntroduce() {
            var _this10 = this;

            this.introImgs.localId = [];
            wx.chooseImage({
                count: 6 - this.contentsData.imgData.length, // 默认9
                sizeType: ['original', 'compressed'], // 可以指定是原图还是压缩图，默认二者都有
                sourceType: ['album', 'camera'], // 可以指定来源是相册还是相机，默认二者都有
                success: function success(res) {
                    _this10.introImgs.localId = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
                    // alert('已选择 ' + res.localIds.length + ' 张图片');
                    // alert(this.introImgs.localId);
                    _this10.uploadImage(_this10.introImgs);
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
            item.explain = item.explain.replace(/[\uD83C|\uD83D|\uD83E][\uDC00-\uDFFF][\u200D|\uFE0F]|[\uD83C|\uD83D|\uD83E][\uDC00-\uDFFF]|[0-9|*|#]\uFE0F\u20E3|[0-9|#]\u20E3|[\u203C-\u3299]\uFE0F\u200D|[\u203C-\u3299]\uFE0F|[\u2122-\u2B55]|\u303D|[\A9|\AE]\u3030|\uA9|\uAE|\u3030/ig, '');
        }
    },
    watch: {
        bgSrc: function bgSrc(val) {
            if (this.$refs.bg && val != '') {
                // console.log(this.$refs.bg)
                this.$refs.bg.style.backgroundImage = 'url("' + val + '")';
            }
        },
        showLiveIntroduce: function showLiveIntroduce(val) {
            this.paddingBottom = val ? 0 : 85;
            this.updateTitle(val ? '直播间介绍' : '直播间设置');
        },
        textTmp: function textTmp(val) {
            this.textTmp = val.replace(/[\uD83C|\uD83D|\uD83E][\uDC00-\uDFFF][\u200D|\uFE0F]|[\uD83C|\uD83D|\uD83E][\uDC00-\uDFFF]|[0-9|*|#]\uFE0F\u20E3|[0-9|#]\u20E3|[\u203C-\u3299]\uFE0F\u200D|[\u203C-\u3299]\uFE0F|[\u2122-\u2B55]|\u303D|[\A9|\AE]\u3030|\uA9|\uAE|\u3030/ig, '');
        },
        qiniuDomain: function qiniuDomain(val) {
            if (val) {
                this.uploadBg();
            }
        }
    }
};
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(99), __webpack_require__(49)))

/***/ }),

/***/ 996:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.liveSetting-container {\n  min-height: 100%;\n  display: -webkit-box;\n  display: -webkit-flex;\n  display: -ms-flexbox;\n  display: flex;\n  -webkit-box-orient: vertical;\n  -webkit-box-direction: normal;\n  -webkit-flex-direction: column;\n      -ms-flex-direction: column;\n          flex-direction: column;\n  box-sizing: border-box;\n  padding-bottom: 85px;\n  position: relative;\n}\n.liveSetting {\n  height: 100%;\n  background-color: #fff;\n  -webkit-box-flex: 1;\n  -webkit-flex: 1;\n      -ms-flex: 1;\n          flex: 1;\n}\n.liveSetting .bg {\n    background-size: cover;\n    background-position: center top;\n    background-repeat: no-repeat;\n    position: relative;\n    height: 154px;\n    margin-bottom: 15px;\n}\n.liveSetting .bg a {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-orient: vertical;\n      -webkit-box-direction: normal;\n      -webkit-flex-direction: column;\n          -ms-flex-direction: column;\n              flex-direction: column;\n      padding: 0 10px;\n      text-align: center;\n      color: #fff;\n      background-color: rgba(0, 0, 0, 0.4);\n      border-radius: 5px;\n      font-size: 18px;\n      position: absolute;\n      bottom: 8px;\n      left: 50%;\n      -webkit-transform: translateX(-50%);\n          -ms-transform: translateX(-50%);\n              transform: translateX(-50%);\n      padding: 14px 0;\n}\n.liveSetting .bg a p {\n        line-height: 18px;\n        margin-bottom: 8px;\n}\n.liveSetting .bg a span {\n        font-size: 10px;\n        white-space: nowrap;\n}\n.liveSetting .settings .mint-cell {\n    font-size: 16px;\n    height: 55px;\n    border-bottom: 1px solid #f0f0f0;\n}\n.liveSetting .settings .mint-cell:last-child {\n      background-image: none;\n}\n.liveSetting .settings .mint-cell-title {\n    color: #666;\n}\n.liveSetting .settings .mint-cell-wrapper {\n    background-image: none;\n    height: 55px;\n}\n.liveSetting .settings .mint-cell-wrapper img {\n      width: 38px;\n      height: 38px;\n      border-radius: 5px;\n}\n.liveSetting .settings .mint-cell-wrapper .icon-size-info {\n      margin-right: 10px;\n}\n.liveSetting .settings .liveIntroduce {\n    position: absolute;\n    top: 0;\n    left: 0;\n    width: 100%;\n    min-height: 100%;\n    overflow-x: hidden;\n    box-sizing: border-box;\n    display: -webkit-box;\n    display: -webkit-flex;\n    display: -ms-flexbox;\n    display: flex;\n    -webkit-box-orient: vertical;\n    -webkit-box-direction: normal;\n    -webkit-flex-direction: column;\n        -ms-flex-direction: column;\n            flex-direction: column;\n    -webkit-box-align: center;\n    -webkit-align-items: center;\n        -ms-flex-align: center;\n            align-items: center;\n    z-index: 1000;\n    background-color: #f0f0f0;\n}\n.liveSetting .settings .liveIntroduce .liveIntroContainer {\n      -webkit-box-flex: 1;\n      -webkit-flex: 1;\n          -ms-flex: 1;\n              flex: 1;\n      width: 100%;\n}\n.liveSetting .settings .liveIntroduce .liveIntroContainer > textarea {\n        height: 160px;\n        padding: 12px;\n        font-size: 16px;\n        color: #666;\n        margin-bottom: 15px;\n}\n.liveSetting .settings .liveIntroduce textarea {\n      resize: none;\n      width: 100%;\n      display: block;\n      box-sizing: border-box;\n      color: #666;\n}\n.liveSetting .settings .liveIntroduce .upload {\n      margin-top: 15px;\n}\n.liveSetting .settings .liveIntroduce .info {\n      background-color: #fff;\n      padding: 12px;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n      position: relative;\n      margin-bottom: 5px;\n}\n.liveSetting .settings .liveIntroduce .info span {\n        position: absolute;\n        top: 1px;\n        right: -8px;\n        width: 38px;\n        height: 19px;\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-pack: center;\n        -webkit-justify-content: center;\n            -ms-flex-pack: center;\n                justify-content: center;\n        -webkit-box-align: center;\n        -webkit-align-items: center;\n            -ms-flex-align: center;\n                align-items: center;\n}\n.liveSetting .settings .liveIntroduce .info span.sprite:before {\n          width: 38px;\n          height: 38px;\n          background-position: -78px -301px;\n}\n.liveSetting .settings .liveIntroduce .info img {\n        width: 102px;\n        height: 102px;\n        border-radius: 8px;\n        margin-right: 12px;\n}\n.liveSetting .settings .liveIntroduce .info textarea {\n        -webkit-box-flex: 1;\n        -webkit-flex: 1;\n            -ms-flex: 1;\n                flex: 1;\n        height: 102px;\n}\n.liveSetting .settings .liveIntroduce .upload a {\n      display: block;\n      width: 100%;\n      background-color: #fff;\n      text-align: center;\n      padding-bottom: 15px;\n}\n.liveSetting .settings .liveIntroduce .upload a p:first-child {\n        font-size: 16px;\n        color: #5f86fd;\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-pack: center;\n        -webkit-justify-content: center;\n            -ms-flex-pack: center;\n                justify-content: center;\n        -webkit-box-align: center;\n        -webkit-align-items: center;\n            -ms-flex-align: center;\n                align-items: center;\n        line-height: 44px;\n}\n.liveSetting .settings .liveIntroduce .upload a p:first-child span {\n          line-height: 1;\n}\n.liveSetting .settings .liveIntroduce .upload a p:first-child span:before {\n            width: 35px;\n            height: 36px;\n            background-position: 0 -377px;\n}\n.liveSetting .settings .liveIntroduce .upload a p:last-child {\n        font-size: 13px;\n        color: #999;\n        line-height: 1;\n}\n.liveSetting .settings .liveIntroduce .btn {\n      width: 80%;\n      height: 80px;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-pack: justify;\n      -webkit-justify-content: space-between;\n          -ms-flex-pack: justify;\n              justify-content: space-between;\n      box-sizing: border-box;\n      padding-top: 15px;\n}\n.liveSetting .settings .liveIntroduce .btn a {\n        display: block;\n        line-height: 45px;\n        font-size: 18px;\n        width: 45%;\n        height: 45px;\n        text-align: center;\n        border-radius: 8px;\n}\n.liveSetting .settings .liveIntroduce .btn a:first-child {\n          box-sizing: border-box;\n          border: 1px solid #b2b2b2;\n          color: #999999;\n}\n.liveSetting .settings .liveIntroduce .btn a:last-child {\n          background-color: #5f86fd;\n          color: #fff;\n}\n.liveSetting .submit-btn {\n    position: absolute;\n    width: 189px;\n    bottom: 32px;\n    left: 50%;\n    -webkit-transform: translateX(-50%);\n        -ms-transform: translateX(-50%);\n            transform: translateX(-50%);\n}\n.liveSetting .submit-btn a {\n      display: block;\n      line-height: 45px;\n      color: #fff;\n      border-radius: 5px;\n      text-align: center;\n      font-size: 18px;\n      width: 100%;\n      background-color: #5f86fd;\n}\n.liveSetting .popup {\n    width: 85%;\n    border-radius: 3px;\n    overflow: hidden;\n    background-color: #fff;\n}\n.liveSetting .popup .title {\n      padding-top: 15px;\n      font-size: 16px;\n      color: #333;\n      text-align: center;\n}\n.liveSetting .popup .msgcontent {\n      padding: 10px 20px 15px 20px;\n      min-height: 36px;\n      position: relative;\n}\n.liveSetting .popup .msgcontent img {\n        border-radius: 8px;\n        overflow: hidden;\n}\n.liveSetting .popup .msgcontent a {\n        display: block;\n        text-align: center;\n}\n.liveSetting .popup .msgcontent textarea {\n        background-color: #f0f0f0;\n        border-radius: 8px;\n        padding: 15px 14px;\n        box-sizing: border-box;\n        height: 125px;\n        color: #666;\n        font-size: 15px;\n        resize: none;\n        width: 100%;\n}\n.liveSetting .popup .chooseImg {\n      color: #5f86fd;\n      margin-top: 10px;\n}\n.liveSetting .popup .msgbtns {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      height: 66px;\n      line-height: 45px;\n}\n.liveSetting .popup .msgbtns a {\n        border-radius: 5px;\n        height: 45px;\n        font-size: 18px;\n        line-height: 45px;\n        width: 45%;\n        box-sizing: border-box;\n        text-align: center;\n}\n.liveSetting .popup .msgbtns a:first-child {\n          margin-left: 20px;\n          margin-right: 14px;\n          color: #999;\n          border: 1px solid #b2b2b2;\n}\n.liveSetting .popup .msgbtns a:last-child {\n          color: #fff;\n          background-color: #5f86fd;\n          margin-left: 14px;\n          margin-right: 20px;\n}\n.mint-toast {\n  z-index: 9999;\n}\n", ""]);

// exports


/***/ })

});