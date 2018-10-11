webpackJsonp([23],{

/***/ 1023:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.datetime-picker {\n  width: 6.6rem;\n  border-radius: 4px;\n  overflow: hidden;\n  z-index: 9999999;\n}\n.datetime-picker .picker-title {\n    background-image: -webkit-linear-gradient(-90deg, #ff5f5f, #c62f2f);\n    background-image: -webkit-linear-gradient(right, #ff5f5f, #c62f2f);\n    background-image: linear-gradient(-90deg, #ff5f5f, #c62f2f);\n    color: #fff;\n    padding: .36rem .45rem .33rem;\n}\n.datetime-picker .picker-title h6 {\n      font-size: .3rem;\n      line-height: 0.3rem;\n      margin-bottom: .2rem;\n}\n.datetime-picker .picker-title .time {\n      font-size: .52rem;\n      line-height: .52rem;\n}\n.datetime-picker .label {\n    border-bottom: 1px solid #e6e6e6;\n}\n.datetime-picker .label p {\n      -webkit-box-flex: 1;\n      -webkit-flex: 1;\n          -ms-flex: 1;\n              flex: 1;\n      text-align: center;\n      line-height: .98rem;\n}\n.datetime-picker .btns {\n    margin-top: 0.6rem;\n    padding: 0.1rem 0;\n    background: #c62f2f;\n}\n.datetime-picker .btns button {\n      padding: 0;\n      font-size: 0.36rem;\n      box-sizing: border-box;\n      height: .9rem;\n      -webkit-box-flex: 1;\n      -webkit-flex: 1;\n          -ms-flex: 1;\n              flex: 1;\n}\n.datetime-picker .btns .cancel-btn {\n      color: #fff;\n      border-right: 1px solid #e8e8e8;\n}\n.datetime-picker .btns .confirm-btn {\n      color: #fff;\n}\n.datetime-picker .picker-item {\n    font-size: .32rem;\n    color: #ccc;\n    padding: 0;\n}\n.datetime-picker .picker-item.picker-selected {\n      position: relative;\n      color: #333;\n}\n.datetime-picker .picker-slot:before, .datetime-picker .picker-slot:after {\n    content: '';\n    position: absolute;\n    width: 0.74rem;\n    height: 1px;\n    background-color: #c62f2f;\n    left: 50%;\n    top: 50%;\n    margin-left: -.37rem;\n}\n.datetime-picker .picker-slot:before {\n    margin-top: -0.35rem;\n}\n.datetime-picker .picker-slot:after {\n    margin-top: .295rem;\n}\n.datetime-picker .picker-center-highlight {\n    display: none;\n}\n", ""]);

// exports


/***/ }),

/***/ 1107:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1291)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(943),
  /* template */
  __webpack_require__(1181),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\subcomponents\\redpacket\\datepicker.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] datepicker.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-69cc04b0", Component.options)
  } else {
    hotAPI.reload("data-v-69cc04b0", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 1120:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "send-redpacket"
  }, [_c('div', {
    staticClass: "tabber",
    class: {
      left: _vm.mode == 1, right: _vm.mode == 2
    }
  }, [_c('button', {
    on: {
      "click": function($event) {
        _vm.mode = 1
      }
    }
  }, [_vm._v("随机红包")]), _vm._v(" "), _c('button', {
    on: {
      "click": function($event) {
        _vm.mode = 2
      }
    }
  }, [_vm._v("固定红包")])]), _vm._v(" "), _c('div', {
    staticClass: "request-text"
  }, [_c('a', {
    staticClass: "mint-cell mint-field"
  }, [_c('div', {
    staticClass: "mint-cell-left"
  }), _vm._v(" "), _c('div', {
    staticClass: "mint-cell-wrapper"
  }, [_vm._m(0), _vm._v(" "), _c('div', {
    staticClass: "mint-cell-value"
  }, [_c('input', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.text),
      expression: "text"
    }],
    staticClass: "mint-field-core",
    attrs: {
      "placeholder": "如：抢红包就是King of 手气",
      "type": "text",
      "maxlength": "30"
    },
    domProps: {
      "value": (_vm.text)
    },
    on: {
      "input": function($event) {
        if ($event.target.composing) { return; }
        _vm.text = $event.target.value
      }
    }
  }), _vm._v(" "), _vm._m(1), _vm._v(" "), _vm._m(2), _vm._v(" "), _c('div', {
    staticClass: "mint-field-other"
  })])]), _vm._v(" "), _c('div', {
    staticClass: "mint-cell-right"
  })]), _vm._v(" "), _c('p', [_vm._v("小伙伴需回复口令抢红包")])]), _vm._v(" "), _c('div', {
    staticClass: "details"
  }, [_c('a', {
    staticClass: "mint-cell mint-field"
  }, [_c('div', {
    staticClass: "mint-cell-left"
  }), _vm._v(" "), _c('div', {
    staticClass: "mint-cell-wrapper"
  }, [_vm._m(3), _vm._v(" "), _c('div', {
    staticClass: "mint-cell-value"
  }, [_c('input', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.count),
      expression: "count"
    }],
    staticClass: "mint-field-core",
    attrs: {
      "type": "tel"
    },
    domProps: {
      "value": (_vm.count)
    },
    on: {
      "input": function($event) {
        if ($event.target.composing) { return; }
        _vm.count = $event.target.value
      }
    }
  }), _vm._v(" "), (_vm.countC == false) ? _c('div', {
    staticClass: "mint-field-clear"
  }, [_c('i', {
    staticClass: "mintui mintui-field-error",
    on: {
      "click": _vm.countF
    }
  })]) : _vm._e(), _vm._v(" "), _vm._m(4), _vm._v(" "), _vm._m(5)])])]), _vm._v(" "), _c('a', {
    staticClass: "mint-cell mint-field"
  }, [_c('div', {
    staticClass: "mint-cell-left"
  }), _vm._v(" "), _c('div', {
    staticClass: "mint-cell-wrapper"
  }, [_c('div', {
    staticClass: "mint-cell-title"
  }, [_c('span', {
    staticClass: "mint-cell-text"
  }, [_vm._v(_vm._s(_vm.mode == 1 ? '总额度' : '单个额度'))])]), _vm._v(" "), _c('div', {
    staticClass: "mint-cell-value"
  }, [_c('input', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.amount),
      expression: "amount"
    }],
    staticClass: "mint-field-core",
    attrs: {
      "placeholder": "输入数量",
      "type": "number"
    },
    domProps: {
      "value": _vm.amount,
      "value": (_vm.amount)
    },
    on: {
      "input": function($event) {
        if ($event.target.composing) { return; }
        _vm.amount = $event.target.value
      },
      "blur": function($event) {
        _vm.$forceUpdate()
      }
    }
  }), _vm._v(" "), (_vm.amountC == false) ? _c('div', {
    staticClass: "mint-field-clear"
  }, [_c('i', {
    staticClass: "mintui mintui-field-error",
    on: {
      "click": _vm.amountF
    }
  })]) : _vm._e(), _vm._v(" "), _vm._m(6), _vm._v(" "), _vm._m(7)])]), _vm._v(" "), _c('div', {
    staticClass: "mint-cell-right"
  })])]), _vm._v(" "), _c('div', {
    staticClass: "time-mode"
  }, [_c('mt-radio', {
    attrs: {
      "title": "开抢时间（非必选）",
      "options": _vm.options
    },
    model: {
      value: (_vm.timeMode),
      callback: function($$v) {
        _vm.timeMode = $$v
      },
      expression: "timeMode"
    }
  }), _vm._v(" "), (_vm.timeMode == 2) ? _c('div', {
    staticClass: "redpacket-time flex"
  }, [_c('a', {
    staticClass: "start-time",
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": function($event) {
        _vm.startdatepicker = true
      }
    }
  }, [_c('p', [_vm._v(_vm._s(_vm._f("formatDate")(_vm.startTime)))]), _vm._v(" "), _c('span', {
    staticClass: "clock-icon"
  })]), _vm._v(" "), _c('span'), _vm._v(" "), _c('a', {
    staticClass: "start-time",
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": function($event) {
        _vm.enddatepicker = true
      }
    }
  }, [_c('p', [_vm._v(_vm._s(_vm._f("formatDate")(_vm.endTime)))]), _vm._v(" "), _c('span', {
    staticClass: "clock-icon"
  })])]) : _vm._e()], 1), _vm._v(" "), _c('div', {
    staticClass: "send-btn"
  }, [_c('button', {
    on: {
      "click": _vm.sendRedpacket
    }
  }, [_vm._v("（总计：" + _vm._s(_vm.sum) + "）发送")])]), _vm._v(" "), _vm._m(8), _vm._v(" "), _c('datepicker', {
    attrs: {
      "time": _vm.startTime,
      "child-msg": "1"
    },
    on: {
      "confirm": _vm.startTimeConfirm,
      "touchmove": function($event) {
        $event.preventDefault();
      }
    },
    model: {
      value: (_vm.startdatepicker),
      callback: function($$v) {
        _vm.startdatepicker = $$v
      },
      expression: "startdatepicker"
    }
  }), _vm._v(" "), _c('datepicker', {
    attrs: {
      "time": _vm.endTime,
      "child-msg": "2"
    },
    on: {
      "confirm": _vm.endTimeConfirm,
      "touchmove": function($event) {
        $event.preventDefault();
      }
    },
    model: {
      value: (_vm.enddatepicker),
      callback: function($$v) {
        _vm.enddatepicker = $$v
      },
      expression: "enddatepicker"
    }
  })], 1)
},staticRenderFns: [function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "mint-cell-title"
  }, [_c('span', {
    staticClass: "mint-cell-text"
  }, [_vm._v("设置口令")])])
},function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "mint-field-clear",
    staticStyle: {
      "display": "none"
    }
  }, [_c('i', {
    staticClass: "mintui mintui-field-error"
  })])
},function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('span', {
    staticClass: "mint-field-state is-default"
  }, [_c('i', {
    staticClass: "mintui mintui-field-default"
  })])
},function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "mint-cell-title"
  }, [_c('span', {
    staticClass: "mint-cell-text"
  }, [_vm._v("红包个数")])])
},function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('span', {
    staticClass: "mint-field-state is-default"
  }, [_c('i', {
    staticClass: "mintui mintui-field-default"
  })])
},function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "mint-field-other"
  }, [_c('p', [_vm._v("个")])])
},function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('span', {
    staticClass: "mint-field-state is-default"
  }, [_c('i', {
    staticClass: "mintui mintui-field-default"
  })])
},function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "mint-field-other"
  }, [_c('p')])
},function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "info"
  }, [_c('h5', [_vm._v("说明：")]), _vm._v(" "), _c('p', [_vm._v("随机红包：抢红包前必须输入口令，抢到的红包为 随机额度；")]), _vm._v(" "), _c('p', [_vm._v("固定红包：抢红包前必须输入口令，抢到的红包为 固定额度。")])])
}]}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-0c3adadd", module.exports)
  }
}

/***/ }),

/***/ 1181:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('mt-popup', {
    staticClass: "datetime-picker",
    attrs: {
      "popup-transition": "popup-fade"
    },
    model: {
      value: (_vm.datepicker),
      callback: function($$v) {
        _vm.datepicker = $$v
      },
      expression: "datepicker"
    }
  }, [_c('div', {
    staticClass: "picker-title"
  }, [(_vm.childMsg == 1) ? _c('h6', [_vm._v("选择开始时间")]) : _c('h6', [_vm._v("选择结束时间")]), _vm._v(" "), _c('p', {
    staticClass: "time"
  }, [_vm._v(_vm._s(_vm.tmpTime[0]) + "年" + _vm._s(_vm.tmpTime[1]) + "月" + _vm._s(_vm.tmpTime[2]) + "日 " + _vm._s(_vm.tmpTime[3]) + ":" + _vm._s(_vm.tmpTime[4]))])]), _vm._v(" "), _c('div', {
    staticClass: "label flex"
  }, [_c('p', [_vm._v("年")]), _vm._v(" "), _c('p', [_vm._v("月")]), _vm._v(" "), _c('p', [_vm._v("日")]), _vm._v(" "), _c('p', [_vm._v("时")]), _vm._v(" "), _c('p', [_vm._v("分")])]), _vm._v(" "), _c('mt-picker', {
    attrs: {
      "slots": _vm.slots
    },
    on: {
      "change": _vm.onValuesChange
    }
  }), _vm._v(" "), _c('div', {
    staticClass: "btns flex"
  }, [_c('button', {
    staticClass: "cancel-btn",
    on: {
      "click": function($event) {
        _vm.datepicker = false
      }
    }
  }, [_vm._v("取消")]), _vm._v(" "), _c('button', {
    staticClass: "confirm-btn",
    on: {
      "click": _vm.confirm
    }
  }, [_vm._v("确定")])])], 1)
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-69cc04b0", module.exports)
  }
}

/***/ }),

/***/ 1233:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(962);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("792a02d0", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-0c3adadd\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./sendRedpacket.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-0c3adadd\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./sendRedpacket.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 1291:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(1023);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("65b849ba", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-69cc04b0\",\"scoped\":false,\"hasInlineConfig\":true}!../../../node_modules/sass-loader/lib/loader.js!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./datepicker.vue", function() {
     var newContent = require("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-69cc04b0\",\"scoped\":false,\"hasInlineConfig\":true}!../../../node_modules/sass-loader/lib/loader.js!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./datepicker.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 456:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1233)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(881),
  /* template */
  __webpack_require__(1120),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\other\\sendRedpacket.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] sendRedpacket.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-0c3adadd", Component.options)
  } else {
    hotAPI.reload("data-v-0c3adadd", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 517:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _clientClass = __webpack_require__(521);

var _clientClass2 = _interopRequireDefault(_clientClass);

var _socketClient = __webpack_require__(522);

var _socketClient2 = _interopRequireDefault(_socketClient);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

exports.default = {
    // 图片接口
    // 拍照、本地选图
    images: {
        localId: [], //本地选择图片id
        serverId: [], //上传返回服务端id
        downloadId: [] //下载返回本地id
    },
    // 语音接口
    voice: {
        localId: '',
        serverId: '',
        downloadId: ''
    },
    //调用手机相册/拍照接口
    // document.querySelector('#chooseImage').onclick = function () {
    chooseImage: function chooseImage() {
        var _this = this;

        wx.chooseImage({
            count: 1, // 默认9
            sizeType: ['original', 'compressed'], // 可以指定是原图还是压缩图，默认二者都有
            sourceType: ['album', 'camera'], // 可以指定来源是相册还是相机，默认二者都有
            success: function success(res) {
                _this.images.localId = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
                // alert('已选择 ' + res.localIds.length + ' 张图片');
                // alert(this.images.localId);
                _socketClient2.default.ws.send(123123);
            }
        });
    },

    // };

    //上传图片（支持多图上传）
    // document.querySelector('#uploadImage').onclick = function () {
    uploadImage: function uploadImage() {
        if (this.images.localId.length == 0) {
            // alert('请先使用 chooseImage 接口选择图片');
            return;
        }
        var i = 0,
            length = this.images.localId.length;
        this.images.serverId = [];

        function upload() {
            var _this2 = this;

            wx.uploadImage({
                localId: this.images.localId[i],
                success: function success(res) {
                    i++;
                    // alert('已上传：' + i + '/' + length);
                    _this2.images.serverId.push(res.serverId);
                    // alert(this.images.serverId);
                    // alert('http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=' + accessToken + '&media_id=' + this.images.serverId);
                    // console.log('http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=' + accessToken + '&media_id=' + this.images.serverId);
                    // document.getElementById("text").appendChild(document.createElement('pre')).innerHTML = 'http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=' + accessToken + '&media_id=' + this.images.serverId;
                    _socketClient2.default.ws.send('http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=' + accessToken + '&media_id=' + _this2.images.serverId);
                    if (i < length) {
                        upload();
                    }
                },
                fail: function fail(res) {
                    // alert(JSON.stringify(res));
                }
            });
        }
        upload();
    },

    // };


    //下载图片 （支持多图下载）
    // document.querySelector('#downloadImage').onclick = function () {
    downloadImage: function downloadImage() {
        if (this.images.serverId.length === 0) {
            // alert('请先使用 uploadImage 上传图片');
            return;
        }
        var i = 0,
            length = this.images.serverId.length;
        this.images.localId = [];

        function download() {
            wx.downloadImage({
                serverId: this.images.serverId[i],
                success: function success(res) {
                    i++;
                    // alert('已下载：' + i + '/' + length);
                    this.images.downloadId.push(res.localId);
                    // alert(this.images.downloadId);
                    if (i < length) {
                        download();
                    }
                }
            });
        }
        download();
    },

    // };

    //预览图片(待编写)


    //开始语音
    // document.querySelector('#startRecord').onclick = function () {
    startRecord: function startRecord() {
        wx.startRecord({
            cancel: function cancel() {
                // alert('用户拒绝授权语音');
            }
        });
    },

    // };

    //停止语音
    // document.querySelector('#stopRecord').onclick = function () {
    stopRecord: function stopRecord() {
        wx.stopRecord({
            success: function success(res) {
                this.voice.localId = res.localId;
            },
            fail: function fail(res) {
                // alert(JSON.stringify(res));
            }
        });
    },

    // };

    watchRecord: function watchRecord() {
        //监听语音自动停止（到一分钟自动停止）
        wx.onVoiceRecordEnd({
            complete: function complete(res) {
                this.voice.localId = res.localId;
                // alert('语音时间已超过一分钟');
            }
        });
    },


    //上传语音
    // document.querySelector('#uploadVoice').onclick = function(){
    uploadVoice: function uploadVoice() {
        if (this.voice.localId == '') {
            // alert('请先上传一段语音');
            return;
        }
        wx.uploadVoice({
            localId: this.voice.localId,
            success: function success(res) {
                // alert('上传语音成功');
                this.voice.serverId = res.serverId;
                // console.log('http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=' + accessToken + '&media_id=' + this.voice.serverId);
                // document.getElementById("text").appendChild(document.createElement('pre')).innerHTML = 'http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=' + accessToken + '&media_id=' + this.voice.serverId;
                // socketClient.ws.send('http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=' + accessToken + '&media_id=' + this.voice.serverId);
            }
        });
    },

    // };

    //下载语音
    // document.querySelector('#downloadVoice').onclick = function(){
    downloadVoice: function downloadVoice() {
        if (this.voice.serverId == '') {
            // alert('请先上传一段语音');
            return;
        }
        wx.downloadVoice({
            serverId: this.voice.serverId,
            success: function success() {
                // alert('下载语音成功');
                this.voice.downloadId = res.localId;
            }
        });
    },

    // };

    //播放语音
    // document.querySelector('#playVoice').onclick = function(){
    playVoice: function playVoice() {
        if (this.voice.localId == '') {
            // alert('请先录制一段语音');
            return;
        }
        wx.playVoice({
            localId: this.voice.localId
        });
    },

    // };

    //暂停播放语音
    // document.querySelector('#pauseVoice').onclick = function(){
    pauseVoice: function pauseVoice() {
        wx.pauseVoice({
            localId: this.voice.localId
        });
    },

    // };

    //停止播放语音
    // document.querySelector('#stopVoice').onclick = function(){
    stopVoice: function stopVoice() {
        wx.stopVoice({
            localId: this.voice.localId
        });
    },

    // };
    watchVoiceEnd: function watchVoiceEnd() {
        //监听语音播放停止
        wx.onVoicePlayEnd({
            complete: function complete(res) {
                // alert('语音播放结束');
            }
        });
    },


    //2000 加入房间调用
    joinRoom: function joinRoom(user_id, course_id) {
        // alert('请求加入房间');
        var Create_ClientHeader = new _clientClass2.default.ClientHeader();
        var Create_ClientJoinRoomReq = new _clientClass2.default.ClientJoinRoomReq();
        Create_ClientHeader.subcmd = 2000;
        Create_ClientJoinRoomReq.userid = user_id;
        Create_ClientJoinRoomReq.vcbid = course_id;
        Create_ClientHeader.data = Create_ClientJoinRoomReq;
        _socketClient2.default.ws.send(JSON.stringify(Create_ClientHeader));
        console.log("ClientJoinRoomReq");
    },

    //2010 离开房间调用
    leaveRoom: function leaveRoom(user_id, course_id) {
        // alert('离开房间');
        var Create_ClientHeader = new _clientClass2.default.ClientHeader();
        var Create_CMDUserExitRoomInfo = new _clientClass2.default.CMDUserExitRoomInfo();
        Create_ClientHeader.subcmd = 2010;
        Create_CMDUserExitRoomInfo.userid = user_id;
        Create_CMDUserExitRoomInfo.vcbid = course_id;
        Create_ClientHeader.data = Create_CMDUserExitRoomInfo;
        _socketClient2.default.ws.send(JSON.stringify(Create_ClientHeader));
        console.log("ClientleaveRoomReq");
    },


    //发送文字聊天消息调用
    sendMessage: function sendMessage(user_id, course_id, text, msgType, extendType, mastermsgId) {
        // alert('发送文字消息');
        var timestamp = new Date();
        var Create_ClientHeader = new _clientClass2.default.ClientHeader();
        var Create_GroupMsgReq = new _clientClass2.default.GroupMsgReq();
        var Create_RoomChatMsg = new _clientClass2.default.RoomChatMsg();
        var Create_srcuser = new _clientClass2.default.UserInfoReq();
        Create_srcuser.userId = +user_id;
        // Create_srcuser.userType = +userType ;//公共直播间管理员 0 为不是 2为 管理员
        Create_RoomChatMsg.srcUser = Create_srcuser; //消息发起者
        Create_RoomChatMsg.content = text;
        Create_RoomChatMsg.msgTime = parseInt(timestamp.getTime() / 1000); //聊天时间 精确到秒
        Create_RoomChatMsg.msgTimeStr = this.format(timestamp);
        Create_RoomChatMsg.msgType = msgType || 0; ///消息类型 0文字 1图片 2语音
        Create_RoomChatMsg.extendType = extendType; //是否為重點
        Create_GroupMsgReq.groupId = +course_id; //房间id（课程id）
        if (typeof mastermsgId == 'number' || typeof mastermsgId == 'string') {
            Create_RoomChatMsg.mastermsgId = parseInt(mastermsgId);
        } //上墙
        Create_GroupMsgReq.msg = Create_RoomChatMsg; //聊天信息
        Create_ClientHeader.subcmd = 3010; //上墙 

        Create_ClientHeader.data = Create_GroupMsgReq;
        _socketClient2.default.ws.send(JSON.stringify(Create_ClientHeader));
        console.log("sendMessage");
    },


    //发送图片消息调用
    sendImagea: function sendImagea(user_id, course_id, media_id, isPC) {
        // alert('发送图片消息');
        var timestamp = new Date();
        var Create_ClientHeader = new _clientClass2.default.ClientHeader();
        var Create_GroupMsgReq = new _clientClass2.default.GroupMsgReq();
        var Create_RoomChatMsg = new _clientClass2.default.RoomChatMsg();
        var Create_srcuser = new _clientClass2.default.UserInfoReq();
        Create_srcuser.userId = +user_id;
        Create_RoomChatMsg.srcUser = Create_srcuser; //消息发起者
        // alert(Create_RoomChatMsg.content)
        Create_RoomChatMsg.msgTime = timestamp.getTime() / 1000; //聊天时间 精确到秒
        Create_RoomChatMsg.msgTimeStr = this.format(timestamp);
        /*Create_RoomChatMsg.content = 'media_id=' + media_id;
        Create_RoomChatMsg.msgType = 1; //消息类型 0文字 1微信图片 2语音 12PC图片*/
        if (isPC) {
            //PC端上传
            Create_RoomChatMsg.content = media_id;
            Create_RoomChatMsg.msgType = 12; //消息类型 0文字 1微信图片 2语音 12PC图片
        } else {
            //微信端上传
            Create_RoomChatMsg.content = 'media_id=' + media_id;
            Create_RoomChatMsg.msgType = 1; //消息类型 0文字 1微信图片 2语音 12PC图片
        }
        Create_GroupMsgReq.groupId = +course_id; //房间id（课程id）
        Create_GroupMsgReq.msg = Create_RoomChatMsg; //聊天信息
        Create_ClientHeader.subcmd = 3010;
        Create_ClientHeader.data = Create_GroupMsgReq;
        _socketClient2.default.ws.send(JSON.stringify(Create_ClientHeader));
        console.log("sendImage");
    },

    //PC发送语音消息调用  13
    sendVoicePC: function sendVoicePC(user_id, course_id, media_id, length, msgType) {

        var timestamp = new Date();
        var Create_ClientHeader = new _clientClass2.default.ClientHeader();
        var Create_GroupMsgReq = new _clientClass2.default.GroupMsgReq();
        var Create_RoomChatMsg = new _clientClass2.default.RoomChatMsg();
        var Create_srcuser = new _clientClass2.default.UserInfoReq();
        Create_srcuser.userId = user_id;
        Create_RoomChatMsg.srcUser = Create_srcuser; //消息发起者
        Create_RoomChatMsg.content = JSON.stringify({
            localpath: '',
            duration: length,
            path: media_id
        });
        Create_RoomChatMsg.mediaLength = +length;
        Create_RoomChatMsg.msgTime = timestamp.getTime() / 1000; //聊天时间 精确到秒
        Create_RoomChatMsg.msgTimeStr = this.format(timestamp); //聊天时间 精确到秒
        Create_RoomChatMsg.msgType = msgType; //消息类型  0文字 1图片 2语音  13 pc语音 12pc图片
        Create_GroupMsgReq.groupId = +course_id; //房间id（课程id）
        Create_GroupMsgReq.msg = Create_RoomChatMsg; //聊天信息
        Create_ClientHeader.subcmd = 3010;
        Create_ClientHeader.data = Create_GroupMsgReq;
        console.log(_socketClient2.default.ws);
        _socketClient2.default.ws.send(JSON.stringify(Create_ClientHeader));
        console.log("sendVoice");
    },

    //发送语音消息调用
    sendVoice: function sendVoice(user_id, course_id, media_id, length, msgType, picmediaid, extendType) {
        var timestamp = new Date();
        var Create_ClientHeader = new _clientClass2.default.ClientHeader();
        var Create_GroupMsgReq = new _clientClass2.default.GroupMsgReq();
        var Create_RoomChatMsg = new _clientClass2.default.RoomChatMsg();
        var Create_srcuser = new _clientClass2.default.UserInfoReq();
        Create_srcuser.userId = user_id;
        Create_RoomChatMsg.srcUser = Create_srcuser; //消息发起者
        if (msgType == 16) {
            // Create_RoomChatMsg.content = JSON.stringify({ "media_id": media_id, "picmediaid": picmediaid });
            Create_RoomChatMsg.content = "media_id=" + media_id + "&&" + "picmediaid=" + picmediaid;
        } else {
            Create_RoomChatMsg.content = media_id;
        }
        Create_RoomChatMsg.extendType = extendType; //是否為重點
        Create_RoomChatMsg.mediaLength = +length;
        Create_RoomChatMsg.msgTime = parseInt(timestamp.getTime() / 1000); //聊天时间 精确到秒
        Create_RoomChatMsg.msgTimeStr = this.format(timestamp); //聊天时间 精确到秒
        Create_RoomChatMsg.msgType = msgType; //消息类型  0文字 1图片 2语音  13 pc语音 12pc图片
        Create_GroupMsgReq.groupId = +course_id; //房间id（课程id）
        Create_GroupMsgReq.msg = Create_RoomChatMsg; //聊天信息
        Create_ClientHeader.subcmd = 3010;
        Create_ClientHeader.data = Create_GroupMsgReq;
        console.log(_socketClient2.default.ws);
        _socketClient2.default.ws.send(JSON.stringify(Create_ClientHeader));
        console.log("sendVoice");
    },

    //发红包
    sendRedpacket: function sendRedpacket(user_id, course_id, mode, packetNum, money, message, startTime, endTime) {
        var Create_ClientHeader = new _clientClass2.default.ClientHeader();
        var Create_CMDSendRedPacketReq = new _clientClass2.default.CMDSendRedPacketReq();
        Create_CMDSendRedPacketReq.userID = +user_id;
        Create_CMDSendRedPacketReq.groupID = +course_id;
        Create_CMDSendRedPacketReq.packetType = +mode;
        Create_CMDSendRedPacketReq.packetNum = +packetNum;
        if (mode == 5 || mode == 9) {
            Create_CMDSendRedPacketReq.packetMoney = parseFloat(money);
        } else if (mode == 6 || mode == 10) {
            Create_CMDSendRedPacketReq.perPacketMoney = parseFloat(money);
        }
        Create_CMDSendRedPacketReq.message = message;
        if (mode == 9 || mode == 10) {
            Create_CMDSendRedPacketReq.fixtime = +startTime;
            Create_CMDSendRedPacketReq.invalidTime = +endTime;
        }
        Create_ClientHeader.data = Create_CMDSendRedPacketReq;
        Create_ClientHeader.subcmd = 4000;
        _socketClient2.default.ws.send(JSON.stringify(Create_ClientHeader));
    },

    //抢红包
    takeRedpacket: function takeRedpacket(user_id, course_id, packet_id, message) {
        var Create_ClientHeader = new _clientClass2.default.ClientHeader();
        var Create_CMDTakeRedPacketReq = new _clientClass2.default.CMDTakeRedPacketReq();
        Create_CMDTakeRedPacketReq.userID = +user_id;
        Create_CMDTakeRedPacketReq.groupID = +course_id;
        Create_CMDTakeRedPacketReq.packetID = +packet_id;
        Create_CMDTakeRedPacketReq.message = message;
        Create_ClientHeader.data = Create_CMDTakeRedPacketReq;
        Create_ClientHeader.subcmd = 4004;
        _socketClient2.default.ws.send(JSON.stringify(Create_ClientHeader));
    },

    //禁言调用
    forbidUserChat: function forbidUserChat(user_id, course_id, status, toid) {
        // status 1为禁言，0为解禁
        var Create_ClientHeader = new _clientClass2.default.ClientHeader();
        var Create_ForbidUserChatReq = new _clientClass2.default.ForbidUserChatReq();
        Create_ForbidUserChatReq.userid = +user_id;
        Create_ForbidUserChatReq.toid = +toid || 0;
        Create_ForbidUserChatReq.groupid = +course_id;
        Create_ForbidUserChatReq.status = status;
        Create_ClientHeader.subcmd = 2215;
        Create_ClientHeader.data = Create_ForbidUserChatReq;
        _socketClient2.default.ws.send(JSON.stringify(Create_ClientHeader));
    },

    //结束直播调用
    overLive: function overLive(user_id, course_id) {
        var Create_ClientHeader = new _clientClass2.default.ClientHeader();
        var Create_OverLiveReqReq = new _clientClass2.default.OverLiveReq();
        Create_OverLiveReqReq.userid = +user_id;
        Create_OverLiveReqReq.groupid = +course_id;
        Create_ClientHeader.subcmd = 2217;
        Create_ClientHeader.data = Create_OverLiveReqReq;
        _socketClient2.default.ws.send(JSON.stringify(Create_ClientHeader));
    },

    //请求历史消息时调用
    getMsgHis: function getMsgHis(user_id, course_id, msgId, all, allHistory, count, querytime) {
        var Create_ClientHeader = new _clientClass2.default.ClientHeader();
        var Create_GroupMsgHisReq = new _clientClass2.default.GroupMsgHisReq();
        Create_GroupMsgHisReq.userId = user_id;
        Create_GroupMsgHisReq.groupId = +course_id;
        Create_GroupMsgHisReq.forward = all;
        Create_GroupMsgHisReq.queryTime = querytime;
        Create_GroupMsgHisReq.msgId = msgId ? +msgId : 0;
        Create_GroupMsgHisReq.count = allHistory ? 0 : count || 10;
        Create_ClientHeader.subcmd = 3016;
        Create_ClientHeader.data = Create_GroupMsgHisReq;
        _socketClient2.default.ws.send(JSON.stringify(Create_ClientHeader));
    },

    //发送聊天室文字聊天消息调用 
    sendTalkMessage: function sendTalkMessage(user_id, course_id, content, msgType, mastermsgId, answer_user_id) {
        // alert('发送聊天室文字消息');
        var timestamp = new Date().getTime() / 1000;
        var Create_ClientHeader = new _clientClass2.default.ClientHeader();
        var Create_GroupMsgReq = new _clientClass2.default.GroupMsgReq();
        var Create_RoomChatMsg = new _clientClass2.default.RoomChatMsg();
        var Create_srcuser = new _clientClass2.default.UserInfoReq();
        Create_srcuser.userId = +user_id;
        var Create_dstuser = new _clientClass2.default.UserInfoReq();
        if (typeof answer_user_id == 'number') {
            Create_dstuser.userId = answer_user_id;
        } else {
            Create_dstuser.userId = 1;
        }
        Create_RoomChatMsg.srcUser = Create_srcuser; //消息发起者
        Create_RoomChatMsg.dstUser = Create_dstuser;
        Create_RoomChatMsg.content = content;
        Create_RoomChatMsg.msgTime = parseInt(timestamp); //聊天时间 精确到秒
        Create_RoomChatMsg.msgType = msgType || 0; //消息类型  0文字
        if (typeof mastermsgId == 'number' || typeof mastermsgId == 'string') {
            Create_RoomChatMsg.mastermsgId = parseInt(mastermsgId);
        }
        Create_GroupMsgReq.groupId = +course_id; //房间id（课程id）
        Create_GroupMsgReq.msg = Create_RoomChatMsg; //聊天信息
        Create_ClientHeader.subcmd = 3020;
        Create_ClientHeader.data = Create_GroupMsgReq;
        _socketClient2.default.ws.send(JSON.stringify(Create_ClientHeader));
        console.log("sendTalkMessage");
    },

    //请求聊天室历史消息时调用
    getTalkMsgHis: function getTalkMsgHis(user_id, course_id, msgId) {
        var Create_ClientHeader = new _clientClass2.default.ClientHeader();
        var Create_GroupMsgHisReq = new _clientClass2.default.GroupMsgHisReq();
        Create_GroupMsgHisReq.userId = +user_id;
        Create_GroupMsgHisReq.groupId = +course_id;
        Create_GroupMsgHisReq.forward = true;
        Create_GroupMsgHisReq.msgId = msgId ? +msgId : 0;
        Create_GroupMsgHisReq.count = 20;
        Create_ClientHeader.subcmd = 3026;
        Create_ClientHeader.data = Create_GroupMsgHisReq;
        console.log("Create_getTalkMsgHis");
        _socketClient2.default.ws.send(JSON.stringify(Create_ClientHeader));
    },

    //请求下一条未读消息请求
    NextReadMsg: function NextReadMsg(userId, roomId, msgId) {
        var Create_ClientHeader = new _clientClass2.default.ClientHeader();
        var Create_GroupMsgHisReq = new _clientClass2.default.GroupMsgHisReq();
        Create_GroupMsgHisReq.userId = +userId;
        Create_GroupMsgHisReq.roomId = +roomId;
        Create_GroupMsgHisReq.msgId = msgId ? +msgId : 0;
        Create_ClientHeader.subcmd = 3056;
        Create_ClientHeader.data = Create_GroupMsgHisReq;
        console.log("Create_getTalkMsgHis");
        _socketClient2.default.ws.send(JSON.stringify(Create_ClientHeader));
    },
    format: function format(obj) {
        function f(num) {
            return num > 9 ? num + '' : '0' + num;
        }
        return obj.getFullYear() + '-' + f(obj.getMonth() + 1) + '-' + f(obj.getDate()) + ' ' + f(obj.getHours()) + ':' + f(obj.getMinutes()) + ':' + f(obj.getSeconds());
    }
};

/***/ }),

/***/ 521:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.default = {
    // JavaScript Document

    //say hello
    ClientHello: function ClientHello() {
        this.length = 18; //length 是整个数据包的长度 (size of COM_MSG_HEADER + size of CMDClientHello_t)
        this.version = 10; //版本号,当前为10
        this.subcmd = 1; //子命令：填：Sub_Vchat_ClientHello =1
        this.maincmd = 106; //主命令：填：MDM_Vchat_Gate   106
        this.checkcode = 0; //固定为0
        this.data = {
            "param1": 12, //填12
            "param2": 8, //填8
            "param3": 7, //填7
            "param4": 1 //填1
        };
    },
    ClientHeader: function ClientHeader() {
        this.length = 14, this.version = 10, this.checkcode = 0, this.maincmd = 106, this.subcmd = 21015, this.data = {};
    },

    //发送登录信息
    CMDUserLogonReq4: function CMDUserLogonReq4() {
        this.loginid = 0;
        this.token = "";
        //   this.patternLock = 3 
        this.platformType = 4;
        //    this.version = 5 
        //    this.serial = 6 
        //    this.mac = 7 
        this.mobile = 3;
        //    this.devicemodel = 9 
        //    this.deviceos = 10 
        //    this.hostdb = 11
    },

    //发送加入房间信息
    ClientJoinRoomReq: function ClientJoinRoomReq() {
        this.userid = 1706743;
        this.vcbid = 1;
        this.devtype = 3;
        this.time = 0;
        this.crc32 = 15;
        this.coremessagever = 10690001; //客户端内核版本
        this.cuserpwd = ""; //用户密码,没有就是游客
        this.croompwd = ""; //房间密码,可能有
        this.cSerial = ""; //uuid
        this.cMacAddr = ""; //客户端mac地址
        this.cIpAddr = ""; //客户端ip地址
        this.bloginSource = 0; //local 99 login or other platform login:0-local1-other platform
        this.reserve1 = 0;
        this.reserve2 = 0;
    },


    //发送退出房间信息
    CMDUserExitRoomInfo: function CMDUserExitRoomInfo() {
        this.userid = 0;
        this.vcbid = 0;
    },


    //发起新群组消息
    GroupMsgReq: function GroupMsgReq() {
        this.groupId; //群组id
        this.msg = {}; //聊天消息
    },


    //红包
    CMDSendRedPacketReq: function CMDSendRedPacketReq() {
        this.userID = 1; //用户ID
        this.groupID = 2; //群ID--直播间id
        this.packetType = 3; //红包类型 0:幸运弹 1:普天同庆弹 2:定向弹 3:照明弹 5:定时红包 6:定位红包  ----eCommandImmediatelyType   = 5--即时非定额    eCommandUniImmediatelyType   = 6 ;--即时定额eCommandFixTimeType   = 9;--定时非定额 
        //   eCommandUniFixTimeType   = 10;--定时定额 
        this.rangeType = 2; //领取范围类型 0:仅游客 1:仅成员 2:所有人-----2
        this.dstUserID = 0; //定向红包对象userid---0
        this.packetNum = 6; //红包个数
        // this.packetMoney    = 7;  //红包总金额(实际金额*100),只适用于随机手气红包
        // this.perPacketMoney  = 8;  //单个红包金额,只适用于定额红包(实际金额*100)
        this.message = 9; //红包留言
        // this.privateType    = 10;  //是否私聊红包--不用传
        // this.rangeGender = 11;  //性别领取范围--不用传
        // this.fixtime         = 12;   //定时时间--即时不用传
        // this.invalidTime     = 13;   //结束时间--即时不用传
        // this.longitude        =14;    //经度--不用传
        // this.latitude        =15;    //纬度--不用传
        // this.location        =16;    //红包位置--不用传
    },

    //抢红包
    CMDTakeRedPacketReq: function CMDTakeRedPacketReq() {
        this.userID = 1; //用户ID
        this.groupID = 2; //群ID
        this.packetID = 3; //红包ID
        // string  photoPath  = 4;  //照片红包图片地址(服务器不关注,客户端协议层需要)--不需要
        // double  longitude        =5;    //经度--不需要
        // double  latitude        =6;    //纬度--不需要
        this.message = 7; //红包留言--不需要
    },

    //聊天对象
    ChatObjReq: function ChatObjReq() {
        this.srcuser; //消息发起者
        this.dstuser; //聊天对象
    },
    UserInfoReq: function UserInfoReq() {
        this.userId;
        // this.userType = 0
    },


    //发送聊天消息
    RoomChatMsg: function RoomChatMsg() {
        this.srcUser = {};
        this.dstUser = {};
        this.msgId; //服务器msgid
        this.msgTime; //聊天时间
        this.msgType; //消息类型  1文字 2图片 3语音
        this.content; //聊天内容
        this.atList; //@人列表，0是所有人
        this.msgTimeStr = "2017-06-08 15:51:29"; //聊天时间字符串格式,客户端SDK填,服务端不填
        this.clientMSgId; //客户端msgid
        this.recall; //是否已撤回
        this.sendState; //发送状态：0 成功，1 发送中，2 发送失败（客户端自用）
    },


    //ping包 subcmd = 2
    ClientPing: function ClientPing() {
        this.userid;
        this.roomid;
    },
    Media_Content: function Media_Content() {
        this.url;
        this.media_id;
        this.accessToken;
    },


    //禁言用户请求
    ForbidUserChatReq: function ForbidUserChatReq() {
        // 2051 //禁言用户请求   length=33 -1全体
        this.groupid;
        this.userid;
        this.status;
    },


    //结束直播请求
    OverLiveReq: function OverLiveReq() {
        this.groupid;
        this.userid;
    },


    //历史消息请求
    GroupMsgHisReq: function GroupMsgHisReq() {
        this.userId; //请求发起者userid
        this.groupId; //群组id
        this.forward; //true 向前查找，false 向后查找
        this.msgId; //服务器msgid(请求该msgid之前（或之后）的聊天记录，填0则从最新的（最初的）聊天记录开始请求)
        this.count; //请求数量
    }
};

// typedef struct tag_COM_MSG_HEADER
// {
//   int32  length       //必须在这个位置
//   uint8  version      //版本号,当前为10
//   uint8  checkcode
//   uint16 maincmd     //主命令
//   uint16 subcmd      //子命令
//   char   content[0]  //内容
// }COM_MSG_HEADER

/***/ }),

/***/ 522:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
	value: true
});

var _clientClass = __webpack_require__(521);

var _clientClass2 = _interopRequireDefault(_clientClass);

var _wxfunction = __webpack_require__(517);

var _wxfunction2 = _interopRequireDefault(_wxfunction);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

var messageList = [];
// import subcmd from './handlemsg.js'
exports.default = {
	ws: null,
	setping: null,
	//连接服务端
	connect: function connect(user_id, token, course_id, onmessage, onclose) {
		var _this = this;

		//创建websocket

		this.ws = new WebSocket('ws://' + web_socket_host + ':' + web_socket_port);
		// 测试环境
		// this.ws = new WebSocket('ws://210.56.212.27:6263')
		// 正式环境
		// this.ws = new WebSocket('ws://121.46.0.116:9263')
		//连接成功时调用
		this.ws.onopen = function () {
			var Create_ClientHello = new _clientClass2.default.ClientHello();
			_this.ws.send(JSON.stringify(Create_ClientHello));
			// alert('连接成功')
			var Create_ClientHeader = new _clientClass2.default.ClientHeader();
			var Create_CMDUserLogonReq4 = new _clientClass2.default.CMDUserLogonReq4();
			Create_CMDUserLogonReq4.loginid = +user_id;
			Create_CMDUserLogonReq4.token = token;
			Create_ClientHeader.data = Create_CMDUserLogonReq4;
			_this.ws.send(JSON.stringify(Create_ClientHeader));
			_this.setping = setInterval(function () {
				_this.sendPingClient(user_id, +course_id);
			}, 20000); //定时发送ping包 防止服务器断开连接
		};
		// 接受信息
		this.ws.onmessage = function (e) {
			//console.log('websocket-->e',e)
			_this.onmessage(e, +course_id, onmessage);
		};
		this.ws.onerror = this.onerror;
		this.ws.onclose = function (e) {
			_this.onclose(e, onclose);
		};
	},

	/**
  * 发送socket信息
  * @param {number} num 回调回来的指令
  * @param {function} fun 发送的具体信息
  * @param {function} callback 成功回调
  */
	send: function send(num, fun, callback) {
		if (typeof callback === 'function') {
			messageList[num] = callback;
		}
		if (typeof fun === 'function') {
			fun();
		}
	},

	//服务端发来消息时调用
	onmessage: function onmessage(e, course_id, fn) {
		var msg = JSON.parse(e.data);
		// console.log(msg)
		if (msg.subcmd == 21017) {
			_wxfunction2.default.joinRoom(msg.data.userid, +course_id);
		} else {
			// subcmd[msg.subcmd](msg.data) //调用对应函数
		}
		if (typeof messageList[msg.subcmd] === 'function') {
			messageList[msg.subcmd](msg);
		}
		if (fn) {
			fn(msg);
		}
		//alert(msg)
		// console.log(msg.data)
		return msg;
	},

	//连接错误时调用
	onerror: function onerror(e) {
		// alert('连接出错')
		console.log(e);
	},

	//连接关闭时调用
	onclose: function onclose(e, _onclose) {

		clearInterval(this.setping);
		console.log(e);
		if (_onclose) {
			_onclose();
		}
	},
	sendPingClient: function sendPingClient(user_id, course_id) {
		var clientPingResp = new _clientClass2.default.ClientHeader();
		clientPingResp.data = new _clientClass2.default.ClientPing();
		clientPingResp.subcmd = 2;
		clientPingResp.length = 22;
		clientPingResp.data.userid = +user_id;
		clientPingResp.data.roomid = +course_id;
		console.log(clientPingResp);
		this.ws.send(JSON.stringify(clientPingResp));
	}
};

/***/ }),

/***/ 881:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _mintUi = __webpack_require__(54);

var _datepicker = __webpack_require__(1107);

var _datepicker2 = _interopRequireDefault(_datepicker);

var _socketClient = __webpack_require__(522);

var _socketClient2 = _interopRequireDefault(_socketClient);

var _wxfunction = __webpack_require__(517);

var _wxfunction2 = _interopRequireDefault(_wxfunction);

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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
            countC: true,
            amountC: true,
            val: '',
            mode: 1, //红包模式，1为随机红包，2为固定红包
            text: '',
            count: '', //红包个数
            amount: null, //红包金额
            timeMode: '1', //开抢模式，1为即时开抢，2为定时开抢
            options: [{
                label: '即时开抢',
                value: '1'
            }, {
                label: '定时开抢',
                value: '2'
            }],
            startTime: null,
            endTime: null,
            startdatepicker: false, //开始时间日期选择器
            enddatepicker: false, //结束时间日期选择器
            timemodetest: false

        };
    },

    computed: {
        sum: function sum() {
            return this.mode == 1 ? parseFloat(this.amount) || 0 : (parseFloat(this.amount) || 0) * (parseInt(this.count) || 0);
        },
        userId: function userId() {
            return this.$store.state.userInfo.user_id;
        }
    },
    filters: {
        formatDate: function formatDate(dateObj) {

            /*        var date = new Date(dateObj);
                       var y = date.getFullYear();
                       var m = date.getMonth() + 1;
                       m = m < 10 ? ('0' + m) : m;
                       var d = date.getDate();
                       d = d < 10 ? ('0' + d) : d;
                       var h = date.getHours();
                       h = h < 10 ? ('0' + h) : h;
                       var minute = date.getMinutes();
                       var second = date.getSeconds();
                       minute = minute < 10 ? ('0' + minute) : minute;
                       second = second < 10 ? ('0' + second) : second;
                       return y + '-' + m + '-' + d+' '+h+':'+minute;*/

            var hour = dateObj.getHours();
            hour = hour < 10 ? '0' + hour : hour;
            var minute = dateObj.getMinutes();
            minute = minute < 10 ? '0' + minute : minute;
            return dateObj.getFullYear() + '\u5E74' + (dateObj.getMonth() + 1) + '\u6708' + dateObj.getDate() + '\u65E5 ' + hour + ':' + minute;
        }
    },
    created: function created() {
        var _this = this;

        this.$store.commit('setTitle', '发红包');
        this.$store.commit('hideTabber');
        this.$store.dispatch('getUserInfo', function (res) {
            _this.connect();
        });
    },
    beforeRouteEnter: function beforeRouteEnter(to, from, next) {
        // 判断从哪里来的
        sessionStorage.setItem("referrer", from.path);
        if (from.path.indexOf('live') != -1) {
            sessionStorage.setItem("hisRouter", from.path);
        }

        next();
    },
    beforeRouteLeave: function beforeRouteLeave(to, from, next) {

        sessionStorage.removeItem("pay");

        next();
    },
    mounted: function mounted() {
        //  var packet1 = sessionStorage.getItem("packet"); 
        // this.mode = packet1.mode
        // this.count = packet1.count
        // this.amount = packet.amount
        // this.text = packet.text
        // this.startTime = packet.startTime
        // this.endTime = packet.endTime
        var referrer = sessionStorage.getItem("referrer");
        var pay = sessionStorage.getItem("pay");
        if (referrer.indexOf('/giftBalance') != -1 || referrer.indexOf('/cardPay') != -1 || referrer.indexOf('/pickCardPay') != -1 || referrer.indexOf('/') != -1 && pay) {
            this.timemodetest = false;
            this.mode = sessionStorage.getItem("mode");
            this.count = sessionStorage.getItem("count");
            this.timeMode = sessionStorage.getItem("timeMode");
            this.amount = sessionStorage.getItem("amount");
            this.text = sessionStorage.getItem("text");
            var startTimestr = sessionStorage.getItem("startTime");
            this.startTime = new Date(startTimestr);
            var endTimestr = sessionStorage.getItem("endTime");
            this.endTime = new Date(endTimestr);
            sessionStorage.removeItem("pay");
        } else {
            this.timemodetest = true;
        }
    },
    beforeDestroy: function beforeDestroy() {
        _wxfunction2.default.leaveRoom(+this.userId, +this.$route.params.courseId);
        clearInterval(_socketClient2.default.setping);
        _socketClient2.default.ws.close();
    },

    methods: {
        amountF: function amountF() {
            this.amount = ' ';
            this.val = ' ';
        },
        countF: function countF() {
            this.count = '';
        },
        startTimeConfirm: function startTimeConfirm(dateObj) {

            this.startTime = dateObj;
        },
        endTimeConfirm: function endTimeConfirm(dateObj) {

            this.endTime = dateObj;
        },
        connect: function connect() {
            _socketClient2.default.connect(+this.userId, '', +this.$route.params.courseId, this.onmessage);
        },
        onmessage: function onmessage(msg) {
            var _this2 = this;

            var data = msg.data;
            switch (msg.subcmd) {
                case 4001:
                    if (data.errInfo) {
                        switch (data.errInfo.errID) {
                            // errID
                            // ERR_CODE_REDPACKET_EXPIRE      = 2014,  //红包已过期
                            //   ERR_CODE_REDPACKET_HAS_NOLEFT    = 2015,  //红包已被抢完
                            //   ERR_CODE_REDPACKET_NOT_YOURS    = 2016,  //红包不是你的
                            //   ERR_CODE_REDPACKET_NOT_FOUND    = 2017,  //找不到该红包
                            //   ERR_CODE_REDPACKET_HAS_TAKEN    = 2018,  //该用户已经领过该红包
                            //   ERR_CODE_REDPACKET_TAKE        = 2019,  //用户领取红包失败
                            //   ERR_CODE_REDPACKET_CATCH      = 2020,  //用户抢红包失败
                            //   ERR_CODE_REDPACKET_SEND        = 2021,  //用户发红包失败
                            //   ERR_CODE_USER_NOT_IN_GROUP      = 2022,  //用户不属于该群
                            //   ERR_CODE_REDPACKET_NOT_NEED      = 2023,  //不需要红包
                            //   ERR_CODE_REDPACKET_NEED_PHOTO    = 2024,  //该红包需要用户拍照
                            //   ERR_CODE_REDPACKET_TO_SELF      = 2025, //定向红包不能发给自己
                            //   ERR_CODE_REDPACKET_MIN_AMOUNT_LIMIT = 2026, //每枚炮弹最小金额限制
                            //   ERR_CODE_REDPACKET_MAX_AMOUNT_LIMIT = 2027, //每枚炮弹最大金额限制
                            //   ERR_CODE_REDPACKET_NOT_YOURS_V2    = 2028,  //红包不属于你
                            //   ERR_CODE_REDPACKET_FIXTIME_TOOSMALL = 2029,  //定时红包的时间小于当前时间
                            //   ERR_CODE_REDPACKET_FIXTIME_NOT_SATRT = 2030,  //定时红包还没到开抢时间
                            //   ERRR_CODE_REDPACKET_VISITOR_RANGE_LIMIT = 2031,  //禁止游客围观时不能发仅游客可抢的炮弹
                            //   ERR_CODE_REDPACKET_ERR_LNG_LAT      = 2032,  //地点红包经纬度设置错误
                            //   ERR_CODE_REDPACKET_OUTOFF_LOCATION_RANGE= 2033,  //地点红包经纬度不在领取范围
                            //   ERR_CODE_REDPACKET_ERR_COMMAND = 2034,      //红包口令不对
                            case 2021:
                                (0, _mintUi.Toast)({ message: '最小值为1个', duration: 2000 });
                                break;
                            case 2026:
                                (0, _mintUi.Toast)({ message: '每个红包最小金额为1个', duration: 2000 });
                                break;
                            case 2029:
                                (0, _mintUi.Toast)({ message: '定时红包的时间不得小于当前时间', duration: 2000 });
                                break;
                            case 1014:
                                _mintUi.MessageBox.confirm('您的用光了，去充值一些吧！', '不足').then(function (action) {
                                    _this2.$router.push({ path: '/giftBalance' });
                                });
                                break;
                        }
                    } else {
                        var hisRouter = sessionStorage.getItem("hisRouter");
                        // this.$router.go(-1);
                        //跳转到直播页面
                        this.$router.push({ path: hisRouter });
                    }
            }
        },
        sendRedpacket: function sendRedpacket() {
            if (this.text.trim() == '') {
                (0, _mintUi.Toast)({ message: '请输入口令', duration: 1000 });
                return;
            }
            if (this.count == '' || this.amount == '') {
                (0, _mintUi.Toast)({ message: '红包未设置完整', duration: 1000 });
                return;
            }
            if (parseInt(this.count) > 1000) {
                (0, _mintUi.Toast)({ message: '红包个数上限为1000', duration: 1000 });
                return;
            }
            if (this.mode == 1 && parseFloat(this.amount) > 200000) {
                (0, _mintUi.Toast)({ message: '红包总额度不得超过200000', duration: 1000 });
                return;
            }
            if (this.mode == 2 && parseFloat(this.amount) > 1000) {
                (0, _mintUi.Toast)({ message: '红包单个额度不得超过1000', duration: 1000 });
                return;
            }

            if (this.mode == 2 && parseFloat(this.amount) == 0) {
                (0, _mintUi.Toast)({ message: '最小值为0.01', duration: 1000 });
                return;
            }

            var mode = 0;
            if (this.mode == 1) {
                //随机红包
                if (this.timeMode == 1) {
                    //随机即时开抢
                    mode = 5;
                } else {
                    //随机定时开抢
                    mode = 9;
                }
            } else {
                //固定红包
                if (this.timeMode == 1) {
                    //固定即时开抢
                    mode = 6;
                } else {
                    //固定定时开抢
                    mode = 10;
                }
            }
            if (this.timeMode == 2) {
                if (Math.round(this.startTime.getTime() / 1000) > Math.round(this.endTime.getTime() / 1000)) {
                    (0, _mintUi.Toast)({ message: '结束时间不能小于开始时间', duration: 1000 });
                    return;
                }
            }
            if (this.timeMode == 2) {
                _wxfunction2.default.sendRedpacket(this.userId, this.$route.params.courseId, mode, parseInt(this.count), parseFloat(this.amount) * 100, this.text, Math.round(this.startTime.getTime() / 1000), Math.round(this.endTime.getTime() / 1000));
            } else {
                _wxfunction2.default.sendRedpacket(this.userId, this.$route.params.courseId, mode, parseInt(this.count), parseFloat(this.amount) * 100, this.text);
            }

            // var    packet = {
            //         // mode:this.mode,
            //         count:this.count,
            //         amount:this.amount,
            //         text:this.text,
            //         startTime:this.startTime,
            //         endTime:this.endTime,

            //     }
            //     sessionStorage.setItem("packet", packet);
            // alert(packet.mode)
            sessionStorage.setItem("mode", this.mode);
            sessionStorage.setItem("count", this.count);
            sessionStorage.setItem("amount", this.amount);
            sessionStorage.setItem("timeMode", this.timeMode);
            sessionStorage.setItem("text", this.text);
            sessionStorage.setItem("startTime", this.startTime);
            sessionStorage.setItem("endTime", this.endTime);
            sessionStorage.setItem("startdatepicker", this.startdatepicker);
            sessionStorage.setItem("enddatepicker", this.enddatepicker);
        },
        clearNoNum: function clearNoNum(val) {
            //修复第一个字符是小数点 的情况.  
            if (val != '' && val.substr(0, 1) == '.') {
                val = "";
            }
            val = val.replace(/^0*(0\.|[1-9])/, '$1'); //解决 粘贴不生效  
            val = val.replace(/[^\d.]/g, ""); //清除“数字”和“.”以外的字符  
            // val = val.replace(/-/g,"");
            val = val.replace(/\.{2,}/g, "."); //只保留第一个. 清除多余的

            val = val.replace(".", "$#$").replace(/\./g, "").replace("$#$", ".");
            val = val.replace(/^(\-)*(\d+)\.(\d{1,2}).*$/, '$2.$3'); //只能输入两个小数       
            if (val.indexOf(".") < 0 && val != "") {
                //以上已经过滤，此处控制的是如果没有小数点，首位不能为类似于 01、02的金额  
                if (val.substr(0, 1) == '0' && val.length == 2) {
                    val = val.substr(1, val.length);
                }
            }
            var reg = /^[0-9]\d*(?:\.\d{1,2}|\d*)$/;
            if (reg.test(s) == false) {
                val = "";
            }
            return val;
        }
    },
    watch: {
        text: function text(s) {
            var pattern = new RegExp("[`~!@#$^&*()=|{}':;',\\[\\].<>/?~！@#￥……&*（）——|{}【】《》‘；：”“'。，、？%+_-]");
            var rs = "";
            for (var i = 0; i < s.length; i++) {
                rs = rs + s.substr(i, 1).replace(pattern, '');
            }
            var ranges = ['\uD83C[\uDF00-\uDFFF]', '\uD83D[\uDC00-\uDE4F]', '\uD83D[\uDE80-\uDEFF]'];
            this.text = rs.replace(new RegExp(ranges.join('|'), 'g'), '');
        },
        timeMode: function timeMode(val) {
            //及时开抢  默认时间
            if (val == 2 && !this.startTime && !this.endTime && this.timemodetest) {
                this.startTime = new Date();
                this.endTime = new Date(this.startTime.getTime() + 1 * 24 * 60 * 60 * 1000);
            }
        },
        count: function count(s) {
            this.countC = false;
            console.log(s);
            var rs = "";
            for (var i = 0; i < s.length; i++) {
                rs = rs + s.substr(i, 1).replace(/[^0-9]/g, '');
            }
            console.log(rs);
            this.count = rs;
            if (parseInt(s) > 100) {
                this.count = '100';
            }
            if (parseInt(s) == 0) {
                (0, _mintUi.Toast)({ message: '个数不能为0', duration: 1000 });
            }
        },
        amount: function amount(s, olds) {
            if (s > 0) {
                this.amountC = false;
            } else {
                this.amountC = true;
            }

            //console.log(s)

            // if(s == ""){
            //     this.val = ''
            //     alert('null'+this.val)
            // }else{
            //       this.val = this.clearNoNum(s)
            // }

            // var reg = /^[0-9]\d*(?:\.\d{1,2}|\d*)$/;

            var reg = /^(\d+(\.\d{0,2})?)$/g;
            s = s == null ? "" : s;
            olds = olds == null ? "" : olds;
            if (reg.test(s) && s.length != 10) {
                this.val = s;
            }
            if (s.indexOf(".") < 0 && olds.indexOf(".") < 0) {

                if (s == "") {
                    this.val = "&nbsp;";
                }
            }

            this.amount = this.val;
            console.log("s" + s + "this.amount" + this.amount);

            if (this.mode == 1) {
                //随机
                if (parseInt(this.amount) < 1) {
                    this.amount = 1;
                    (0, _mintUi.Toast)({ message: '最小值为1', duration: 1000 });
                }
            }
            if (parseInt(this.amount) > 200000) {
                this.amount = '200000';
            }
            // if (s == '') {
            //     this.amount = ''
            // }
            // if (this.mode == 1) {//随机
            //     if (parseInt(this.amount) < 0.01) {
            //         this.amount = '';
            //         Toast({ message: '最小值为1', duration: 1000 });
            //     }
            // } else {//固定

            //     console.log(s)
            //     if (this.amount== "0") {
            //         Toast({ message: '最小值为0.01', duration: 1000 });
            //     } else {
            //         if (s == '') {
            //             this.amount = ''
            //         }else{
            //             this.amount = this.val;
            //         }
            //     }
            // }
        }
    },
    components: {
        datepicker: _datepicker2.default
    }
};

/***/ }),

/***/ 943:
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

exports.default = {
    props: ['value', 'time', 'childMsg'],
    data: function data() {
        return {
            datepicker: this.value,
            nowTime: new Date(),
            tmpTime: [],
            slots: [{
                flex: 1,
                values: [],
                className: 'year'
            }, {
                flex: 1,
                values: [],
                className: 'month'
            }, {
                flex: 1,
                values: [],
                className: 'day'
            }, {
                flex: 1,
                values: [],
                className: 'hour'
            }, {
                flex: 1,
                values: [],
                className: 'minute'
            }]
        };
    },
    created: function created() {
        // this.setTime();
        console.log('this.time');
        console.log(this.time);
    },

    methods: {
        onValuesChange: function onValuesChange(picker, values) {
            this.tmpTime = values;
            var sumDay = 0;
            switch (+values[1]) {
                case 1:
                case 3:
                case 5:
                case 7:
                case 8:
                case 10:
                case 12:
                    sumDay = 31;break;
                case 4:
                case 6:
                case 9:
                case 11:
                    sumDay = 30;break;
                case 2:
                    var year = +values[0];
                    if (year % 4 == 0 && (year % 100 != 0 || year % 400 == 0)) {
                        sumDay = 29;
                    } else {
                        sumDay = 28;
                    }
            }
            var arr = [];
            for (var i = 0; i < sumDay; i++) {
                arr.push(i + 1 + '');
            }
            this.slots[2].values = arr;
        },
        setTime: function setTime() {
            console.log(this.time);
            var yearArr = [];
            for (var i = 0; i < 5; i++) {
                if (i == 0) {
                    yearArr[i] = this.nowTime.getFullYear() + '';
                } else {
                    yearArr[i] = +yearArr[i - 1] + 1 + '';
                }
                if (yearArr[i] == this.time.getFullYear()) {
                    this.slots[0].defaultIndex = i;
                }
            }
            this.slots[0].values = yearArr;

            var monthArr = [];
            for (var _i = 0; _i < 12; _i++) {
                monthArr.push(_i + 1 + '');
            }
            this.slots[1].defaultIndex = this.time.getMonth();
            this.slots[1].values = monthArr;

            var dayArr = [];
            var sumDay = 0;
            switch (this.time.getMonth() + 1) {
                case 1:
                case 3:
                case 5:
                case 7:
                case 8:
                case 10:
                case 12:
                    sumDay = 31;break;
                case 4:
                case 6:
                case 9:
                case 11:
                    sumDay = 30;break;
                case 2:
                    var year = this.time.getFullYear();
                    if (year % 4 == 0 && (year % 100 != 0 || year % 400 == 0)) {
                        sumDay = 29;
                    } else {
                        sumDay = 28;
                    }
            }
            for (var _i2 = 0; _i2 < sumDay; _i2++) {
                dayArr.push(_i2 + 1 + '');
            }
            this.slots[2].values = dayArr;
            this.slots[2].defaultIndex = this.time.getDate() - 1;

            var hourArr = [];
            for (var _i3 = 0; _i3 < 24; _i3++) {
                if (_i3 < 10) {
                    hourArr.push('0' + _i3);
                } else {
                    hourArr.push(_i3 + '');
                }
            }
            this.slots[3].defaultIndex = this.time.getHours();
            this.slots[3].values = hourArr;

            var mintueArr = [];
            for (var _i4 = 0; _i4 < 60; _i4++) {
                if (_i4 < 10) {
                    mintueArr.push('0' + _i4);
                } else {
                    mintueArr.push(_i4 + '');
                }
            }
            this.slots[4].defaultIndex = this.time.getMinutes();
            this.slots[4].values = mintueArr;
        },
        confirm: function confirm() {
            this.$emit('confirm', new Date(this.tmpTime[0] + '/' + this.tmpTime[1] + '/' + this.tmpTime[2] + ' ' + this.tmpTime[3] + ':' + this.tmpTime[4]));
            this.datepicker = false;
        }
    },
    watch: {
        datepicker: function datepicker(val) {
            this.$emit('input', val);
            if (!val) {
                this.setTime();
            }
        },
        value: function value(val) {
            this.datepicker = val;
        },
        time: function time(val) {
            if (val) {
                this.setTime();
            }
        }
    }
};

/***/ }),

/***/ 962:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.send-redpacket {\n  background: #f4f6fc;\n  overflow-x: hidden;\n}\n.send-redpacket button {\n    padding: 0;\n    border: none;\n    background-color: transparent;\n}\n.send-redpacket .mint-cell-wrapper {\n    background-image: none;\n}\n.send-redpacket a:active {\n    background-color: #fff;\n}\n.send-redpacket .mint-cell {\n    background-image: none;\n}\n.send-redpacket .mint-cell:last-child {\n      background-image: none;\n}\n.send-redpacket .tabber {\n    /*background-color: #fc3751;*/\n    background-image: -webkit-linear-gradient(-90deg, #ff5f5f, #c62f2f);\n    background-image: -webkit-linear-gradient(right, #ff5f5f, #c62f2f);\n    background-image: linear-gradient(-90deg, #ff5f5f, #c62f2f);\n    display: -webkit-box;\n    display: -webkit-flex;\n    display: -ms-flexbox;\n    display: flex;\n    position: relative;\n}\n.send-redpacket .tabber:before {\n      content: '';\n      position: absolute;\n      bottom: .04rem;\n      width: .65rem;\n      height: .06rem;\n      border-radius: .03rem;\n      background-color: #ffed8b;\n      -webkit-transform: translateX(-50%);\n          -ms-transform: translateX(-50%);\n              transform: translateX(-50%);\n      -webkit-transition: left .3s ease;\n      transition: left .3s ease;\n}\n.send-redpacket .tabber.left:before {\n      left: 25%;\n}\n.send-redpacket .tabber.left button:first-child {\n      color: #ffed8b;\n}\n.send-redpacket .tabber.right:before {\n      left: 75%;\n}\n.send-redpacket .tabber.right button:last-child {\n      color: #ffed8b;\n}\n.send-redpacket .tabber button {\n      font-size: .32rem;\n      color: #b91721;\n      -webkit-box-flex: 1;\n      -webkit-flex: 1;\n          -ms-flex: 1;\n              flex: 1;\n      height: 0.9rem;\n}\n.send-redpacket .tabber button.active {\n        color: #ffed8b;\n}\n.send-redpacket .mint-field {\n    border-bottom: 1px solid #f0f0f0;\n}\n.send-redpacket .mint-field:last-of-type {\n      border-bottom: none;\n}\n.send-redpacket .mint-field.mint-cell {\n      min-height: 1.1rem;\n}\n.send-redpacket .mint-field .mint-cell-title {\n      font-size: .34rem;\n      color: #333;\n      width: auto;\n      padding-right: 0.32rem;\n}\n.send-redpacket .mint-field .mint-field-core {\n      font-size: .34rem;\n      color: #333;\n      text-align: right;\n}\n.send-redpacket .mint-field .mint-field-other {\n      font-size: .34rem;\n      color: #333;\n      margin-left: 0.26rem;\n}\n.send-redpacket .mint-field .mint-cell-wrapper {\n      padding: 0 .3rem;\n}\n.send-redpacket .request-text p {\n    font-size: .28rem;\n    color: #999;\n    padding: 0 .3rem;\n    line-height: .28rem;\n    margin-top: .2rem;\n    margin-bottom: .45rem;\n}\n.send-redpacket .details {\n    margin-bottom: 0.24rem;\n}\n.send-redpacket .time-mode {\n    padding-bottom: .1rem;\n    background-color: #fff;\n    margin-bottom: .4rem;\n}\n.send-redpacket .time-mode .mint-radiolist-title {\n      color: #999;\n      font-size: .28rem;\n      background: #fff;\n      margin: 0;\n      line-height: .75rem;\n      padding: 0 .3rem;\n}\n.send-redpacket .time-mode .mint-cell {\n      min-height: .66rem;\n}\n.send-redpacket .time-mode .mint-cell-wrapper {\n      padding: 0 .3rem;\n}\n.send-redpacket .time-mode .mint-radio-core {\n      border-radius: .34rem;\n      border-color: #bbb;\n      position: relative;\n      width: .34rem;\n      height: .34rem;\n}\n.send-redpacket .time-mode .mint-radio-core:after {\n        content: none;\n}\n.send-redpacket .time-mode .mint-radio-label {\n      font-size: .32rem;\n      color: #333;\n}\n.send-redpacket .time-mode .mint-radio-input:checked + .mint-radio-core {\n      background-color: #bb7676;\n      border-color: #bb7676;\n}\n.send-redpacket .time-mode .mint-radio-input:checked + .mint-radio-core:before {\n        content: '';\n        position: absolute;\n        top: 50%;\n        left: 50%;\n        -webkit-transform: translate(-50%, -50%);\n            -ms-transform: translate(-50%, -50%);\n                transform: translate(-50%, -50%);\n        width: .28rem;\n        height: .2rem;\n        background: url(\"/images/38.png\") no-repeat;\n        background-size: 100% 100%;\n}\n.send-redpacket .time-mode .redpacket-time {\n      padding: 0 .3rem;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n}\n.send-redpacket .time-mode .redpacket-time > span {\n        display: block;\n        margin: 0 .06rem;\n        width: 0.18rem;\n        height: .03rem;\n        background-color: #666666;\n}\n.send-redpacket .time-mode .redpacket-time a {\n        border: 1px solid #e6e6e6;\n        border-radius: 5px;\n        white-space: nowrap;\n        height: .6rem;\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-align: center;\n        -webkit-align-items: center;\n            -ms-flex-align: center;\n                align-items: center;\n        font-size: .24rem;\n        color: #666;\n        line-height: .24rem;\n        padding: 0 .16rem;\n}\n.send-redpacket .time-mode .redpacket-time a span.clock-icon {\n          margin-left: 0.13rem;\n          display: inline-block;\n          width: .32rem;\n          height: .33rem;\n          background: url(\"/images/sprites.png\") no-repeat -0.34rem -4.21rem/7.5rem auto;\n}\n.send-redpacket .send-btn {\n    position: fixed;\n    bottom: 0;\n    width: 100%;\n}\n.send-redpacket .send-btn button {\n      padding: 0;\n      display: block;\n      background-color: #c62f2f;\n      height: 1rem;\n      color: #ffffff;\n      width: 100%;\n      font-size: 0.36rem;\n}\n.send-redpacket .info {\n    padding: 0 .3rem;\n}\n.send-redpacket .info h5 {\n      font-size: .34rem;\n      color: #666;\n      line-height: .72rem;\n}\n.send-redpacket .info p {\n      font-size: .28rem;\n      color: #999;\n      line-height: 0.45rem;\n}\n", ""]);

// exports


/***/ })

});