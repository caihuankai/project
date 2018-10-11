webpackJsonp([75],{

/***/ 1139:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    ref: "body",
    staticClass: "createCourse",
    style: ({
      'padding-bottom': _vm.bottomRelative ? '0px' : '50px'
    })
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
      "focus": function($event) {
        _vm.bottomFixed = true
      },
      "blur": function($event) {
        _vm.bottomFixed = false
      },
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
  }, [_vm._v(_vm._s(_vm.pickerValueFormat))])]), _vm._v(" "), _c('div', {
    staticClass: "time"
  }, [_c('p', [_vm._v("课程分类")]), _vm._v(" "), _c('div', {
    on: {
      "click": _vm.showPicker
    }
  }, [_vm._v(_vm._s(_vm.courseKind ? _vm.courseKind : '未选择分类'))])]), _vm._v(" "), (_vm.isAssistant == 1) ? _c('div', {
    staticClass: "time"
  }, [_c('p', [_vm._v("指定老师")]), _vm._v(" "), _c('div', {
    on: {
      "click": function($event) {
        _vm.getTerchList(1)
      }
    }
  }, [_vm._v("\n                " + _vm._s(_vm.chooseTeacherListText == "" ? '未选择老师' : _vm.chooseTeacherListText) + "\n                "), (_vm.isDel == true) ? _c('i', {
    staticClass: "mintui mintui-field-error",
    on: {
      "click": function($event) {
        $event.preventDefault();
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
      active: _vm.courseType == 0
    },
    on: {
      "click": function($event) {
        _vm.courseType = 0
      }
    }
  }, [_c('p', [_vm._v("免费公开")])]), _vm._v(" "), _c('input', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.courseType),
      expression: "courseType"
    }],
    attrs: {
      "type": "radio",
      "name": "course-type",
      "value": "0"
    },
    domProps: {
      "checked": _vm._q(_vm.courseType, "0")
    },
    on: {
      "__c": function($event) {
        _vm.courseType = "0"
      }
    }
  })]), _vm._v(" "), _c('li', [_c('div', {
    class: {
      active: _vm.courseType == 2
    },
    on: {
      "click": function($event) {
        _vm.courseType = 2
      }
    }
  }, [_c('p', [_vm._v("收费直播")])]), _vm._v(" "), _c('input', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.courseType),
      expression: "courseType"
    }],
    attrs: {
      "type": "radio",
      "name": "course-type",
      "value": "2"
    },
    domProps: {
      "checked": _vm._q(_vm.courseType, "2")
    },
    on: {
      "__c": function($event) {
        _vm.courseType = "2"
      }
    }
  })])]), _vm._v(" "), _c('ul', {
    staticClass: "extra"
  }, [_c('li', {
    class: {
      active: _vm.courseType == 0
    }
  }, [_vm._v("\n                所有人都能收听到直播\n            ")]), _vm._v(" "), _c('li', {
    staticClass: "pass",
    class: {
      active: _vm.courseType == 0
    }
  }, [_c('div', {
    staticClass: "bottom"
  }, [_c('span', [_vm._v("设置密码")]), _vm._v(" "), _c('input', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.password),
      expression: "password"
    }],
    attrs: {
      "type": "password",
      "placeholder": "请输入4位数英文和数字，不分大小写",
      "maxlength": "4"
    },
    domProps: {
      "value": (_vm.password)
    },
    on: {
      "input": function($event) {
        if ($event.target.composing) { return; }
        _vm.password = $event.target.value
      }
    }
  })]), _vm._v(" "), _c('P', [_vm._v("(如不需加密码，请不要填写此项。)")])], 1), _vm._v(" "), _c('li', {
    class: {
      active: _vm.courseType == 2
    }
  }, [_c('div', {
    staticClass: "bottom"
  }, [_c('section', [_c('span', {
    staticClass: "pre"
  }, [_vm._v("优惠价")]), _vm._v(" "), _c('input', {
    directives: [{
      name: "model",
      rawName: "v-model.number",
      value: (_vm.price),
      expression: "price",
      modifiers: {
        "number": true
      }
    }],
    attrs: {
      "type": "number",
      "placeholder": "最少为1"
    },
    domProps: {
      "value": (_vm.price)
    },
    on: {
      "input": function($event) {
        if ($event.target.composing) { return; }
        _vm.price = _vm._n($event.target.value)
      },
      "blur": function($event) {
        _vm.$forceUpdate()
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
    attrs: {
      "type": "number",
      "placeholder": "不填或为0不展示此项"
    },
    domProps: {
      "value": (_vm.originPrice)
    },
    on: {
      "input": function($event) {
        if ($event.target.composing) { return; }
        _vm.originPrice = _vm._n($event.target.value)
      },
      "blur": function($event) {
        _vm.$forceUpdate()
      }
    }
  }), _vm._v(" "), _c('span', {
    staticClass: "red"
  })])]), _vm._v(" "), _c('p', [_vm._v("提示：原价可不设置，若设置请比优惠价高。")])])])]), _vm._v(" "), _c('div', {
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
    staticClass: "teacher-container",
    attrs: {
      "position": "bottom",
      "popup-transition": "popup-fade"
    },
    model: {
      value: (_vm.isShowTeacherList),
      callback: function($$v) {
        _vm.isShowTeacherList = $$v
      },
      expression: "isShowTeacherList"
    }
  }, [_c('div', {
    staticClass: "header"
  }, [_c('button', {
    on: {
      "click": function($event) {
        _vm.TeacherFun()
      }
    }
  }, [_vm._v("完成指定")])]), _vm._v(" "), _c('div', {
    staticClass: "tag-list"
  }, [(_vm.teacherList.length > 0 && _vm.teachershow == true) ? _vm._l((_vm.teacherList), function(item) {
    return _c('label', {
      key: item.user_id
    }, [_c('img', {
      attrs: {
        "src": item.pic,
        "alt": ""
      }
    }), _vm._v(" "), _c('p', [_vm._v(_vm._s(item.username))]), _vm._v(" "), _c('input', {
      attrs: {
        "type": "radio",
        "name": "teacherId"
      },
      domProps: {
        "value": item.username + '&' + item.user_id
      },
      on: {
        "click": function($event) {
          _vm.setTypeTeacher(item)
        }
      }
    }), _vm._v(" "), _c('span', {
      staticClass: "icon"
    })])
  }) : (_vm.teacherList.length == 0 && _vm.teachershow == true) ? _c('p', [_vm._v(" 您绑定的老师已被禁用，暂无可指定老师 ")]) : _vm._e()], 2)]), _vm._v(" "), _c('div', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (!_vm.isWeiXin || !_vm.bottomFixed),
      expression: "!isWeiXin||!bottomFixed"
    }],
    staticClass: "text"
  }, [_vm._v("创建直播话题后，可以在直播间邀请其他嘉宾")]), _vm._v(" "), _c('div', {
    staticClass: "bottom",
    class: {
      relative: _vm.isWeiXin && _vm.bottomRelative
    }
  }, [_c('a', {
    staticClass: "save",
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": _vm.submit
    }
  }, [_vm._v("保存并创建")])]), _vm._v(" "), _c('mt-popup', {
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
  }, [_vm._v("课程分类")]), _vm._v(" "), _c('ul', _vm._l((_vm.actions), function(item, i) {
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
      "readonly": "readonly"
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
     require("vue-hot-reload-api").rerender("data-v-24b3dcbc", module.exports)
  }
}

/***/ }),

/***/ 1252:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(981);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("1333d3c9", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-24b3dcbc\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./createCourse.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-24b3dcbc\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./createCourse.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 466:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1252)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(891),
  /* template */
  __webpack_require__(1139),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\personalCenter\\createCourse.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] createCourse.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-24b3dcbc", Component.options)
  } else {
    hotAPI.reload("data-v-24b3dcbc", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 891:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function(NProgress, $) {

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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

// import { Indicator, Toast } from 'mint-ui'
exports.default = {
    computed: (0, _vuex.mapState)({
        isWeiXin: function isWeiXin(state) {
            return state.isWeiXin;
        },
        sdkdata: function sdkdata(state) {
            return state.sdkdata;
        },
        userId: function userId(state) {
            return state.userInfo.user_id;
        }
    }),
    data: function data() {
        return {
            courseName: '',
            pickerValue: '',
            courseKind: '',
            password: '',
            isDel: false, //
            price: null,
            courseKindId: null,
            courseType: 0,
            isShowPicker: false,
            pickerValueFormat: this.timeFormat(new Date()),
            actions: [], // 课程类型
            tmpId: null,
            tmpType: '',
            bottomRelative: false, //底部btn相对定位
            bottomFixed: false,
            creating: false,
            datetimepickershow: false,
            isShowTeacherList: false,
            teacherList: [], //老師列表
            chooseTeacherList: '', //老师绑定
            chooseTeacherListText: '', //老师名字
            chooseTeacherId: '', //老师Id
            isAssistant: this.$route.params.liveId.split('&')[1],
            courseWay: 2, // 课程形式1为图文语音（普通），2为视频直播，3为ppt直播
            isShowStream: false, //视频直播流弹窗
            streamUrl: 'rtmp://push.dks.dacelue.com.cn/live/100008?user=99cj&passwd=hc992017win', //视频直播流地址
            newCourseId: '',
            originPrice: null, //原价
            isShowWay: false, //课程形式弹窗
            teachershow: false
        };
    },
    created: function created() {
        console.log(this.$route.params.liveId.split('&')[0]);
        this.$store.commit('setTitle', '创建课程');
        this.getCourseKind();
        NProgress.start();
        this.$store.commit('hideTabber');
        //   this.getTerchList(true);
    },
    destroyed: function destroyed() {
        // Indicator.close()
        document.body.removeEventListener('touchmove', this.touchmove);
        NProgress.done();
    },
    mounted: function mounted() {
        var _this = this;

        $('.mint-datetime-action.mint-datetime-cancel').click(function () {
            _this.datetimepickershow = false;
        });
    },

    methods: {
        streamConfirm: function streamConfirm() {
            this.isShowStream = false;
            this.$router.push('/personalCenter/course/' + this.newCourseId + '&' + this.userId);
        },
        copyStream: function copyStream() {
            //复制地址流
            var userAgent = navigator.userAgent;
            if (userAgent.indexOf("Android") > -1 || userAgent.indexOf("Linux") > -1) {
                //android
                document.getElementById("stream-input").select();
                document.execCommand("copy", "false", null);
                (0, _mintUi.Toast)({
                    message: "链接已复制，请到PC直播软件上操作。",
                    duration: 1000
                });
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
                    (0, _mintUi.Toast)({
                        message: "链接已复制，请到PC直播软件上操作。",
                        duration: 1000
                    });
                } else {
                    (0, _mintUi.Toast)("ios 10.0以下暂不支持复制哦");
                }
            }
        },
        isDelFun: function isDelFun() {
            this.chooseTeacherListText = '';
            this.chooseTeacherId = '';
            this.isDel = false;
            this.teacherList = '';
        },
        getTerchList: function getTerchList() {
            var _this2 = this;

            //獲取老師列表
            this.isShowTeacherList = true;

            this.$http.get('/User/getManagerTeacherList?page=1').then(function (res) {
                console.log(res.body);
                // Indicator.close()
                NProgress.done();
                if (res.body.code == 200) {

                    _this2.teacherList = res.body.data;
                    _this2.teachershow = true;
                }
                _this2.finish = true;
            });
        },
        TeacherFun: function TeacherFun() {
            this.isShowTeacherList = false;
            console.log(this.chooseTeacherListText);
            this.teachershow = false;
            /*   
                 this.chooseTeacherListText = '';
                 this.chooseTeacherId ='';*/

            if (this.chooseTeacherListText == '') {
                this.isDel = false;
            } else {
                this.isDel = true;
            }
        },
        setTypeTeacher: function setTypeTeacher(val) {
            this.chooseTeacherListText = val.username;
            this.chooseTeacherId = val.user_id;
            this.checked = true;
        },
        touchmove: function touchmove(e) {
            e.preventDefault();
        },
        showDatePicker: function showDatePicker(e) {
            var _this3 = this;

            e.target.blur();
            this.$refs.picker.open();
            this.datetimepickershow = true;
            document.body.addEventListener('touchmove', this.touchmove);
            $('.mint-datetime').parent().on('click', '.v-modal', function () {
                _this3.datetimepickershow = false;
                document.body.removeEventListener('touchmove', _this3.touchmove);
            });
        },
        showPicker: function showPicker() {
            // if (e.target.classList.value.indexOf('mint-cell-mask') != -1) {
            this.isShowPicker = true;
            this.tmpId = this.courseKindId;
            this.tmpType = this.courseKind;
            // }
        },
        getCourseKind: function getCourseKind() {
            var _this4 = this;

            this.$http.get(this.hostUrl + '/Course/courseCate?id=2').then(function (res) {
                // Indicator.close()
                NProgress.done();
                if (res.body.code == 200) {
                    _this4.actions = res.body.data;
                } else if (res.body.code == -17007) {
                    _this4.$router.push('/personalCenter');
                }
            });
        },
        timeFormat: function timeFormat(date) {
            return date.getFullYear() + '-' + gt10(date.getMonth() + 1) + '-' + gt10(date.getDate()) + ' ' + gt10(date.getHours()) + ':' + gt10(date.getMinutes());
            function gt10(num) {
                return num > 9 ? num + '' : '0' + num;
            }
        },
        pickerConfirm: function pickerConfirm(date) {
            this.datetimepickershow = false;
            this.pickerValueFormat = this.timeFormat(date);
            document.body.removeEventListener('touchmove', this.touchmove);
        },
        setType: function setType(val) {
            this.tmpType = val.name;
            this.tmpId = val.id;
        },
        confirmType: function confirmType() {
            this.isShowPicker = false;
            this.courseKind = this.tmpType;
            this.courseKindId = this.tmpId;
        },
        enterPrice: function enterPrice(e) {
            if (e.target.value.indexOf('0') == 0) {
                e.target.value = '';
            }
        },
        submit: function submit() {
            var _this5 = this;

            // console.log(this.chooseTeacherListId);

            if (this.creating) {
                return;
            }
            if (this.courseType == 2) {
                if (this.originPrice != '') {
                    if (Number(this.originPrice) !== 0) {
                        if (this.originPrice == this.price) {
                            (0, _mintUi.Toast)("原价不能与优惠价相同，必须大于优惠价");
                            return;
                        }
                        if (this.originPrice < this.price) {
                            (0, _mintUi.Toast)("原价不能比优惠价低");
                            return;
                        }
                    }
                }
            }

            if (this.courseName.trim() == '') {
                (0, _mintUi.Toast)('请输入课程名称');
                // } else if (this.$bytesLength(this.courseName) > 50) {
            } else if (this.courseName.length > 25) {
                (0, _mintUi.Toast)('课程名称字数不得大于25');
            } else if (this.courseKind == '') {
                (0, _mintUi.Toast)('请选择课程分类');
            } else if (this.password != '' && !/^\w{4}$/.test(this.password)) {

                (0, _mintUi.Toast)({ message: '密码设置不符合要求', duration: 2000 });
            } else if (this.courseType == 2 && !this.price) {
                (0, _mintUi.Toast)('请设置收听费用');
            } else if (this.courseType == 2 && this.price < 1) {
                (0, _mintUi.Toast)('请设置优惠价');
            } else {
                if (this.password != '') {
                    this.courseType = 1;
                }
                console.log({
                    formatBool: 1,
                    liveId: this.$route.params.liveId.split('&')[0],
                    name: this.courseName,
                    date: this.pickerValueFormat,
                    cate: this.courseKindId,
                    level: this.courseType,
                    password: this.password,
                    price: this.price,
                    teacherId: this.chooseTeacherId,
                    form: this.courseWay,
                    originPrice: this.originPrice
                });
                _mintUi.Indicator.open();
                NProgress.start();
                this.$http.post(this.hostUrl + '/Course/create', {
                    formatBool: 1,
                    liveId: this.$route.params.liveId.split('&')[0],
                    name: this.courseName,
                    date: this.pickerValueFormat,
                    cate: this.courseKindId,
                    level: this.courseType,
                    password: this.password,
                    price: this.price,
                    teacherId: this.chooseTeacherId,
                    form: this.courseWay,
                    originPrice: this.originPrice
                }, { emulateJSON: true }).then(function (res) {
                    console.log(res.body);
                    NProgress.done();
                    setTimeout(function () {
                        _mintUi.Indicator.close();
                    }, 2000);
                    if (res.body.code == 200) {
                        console.log(_this5.courseType);
                        _this5.creating = true;
                        var data = res.body.data;
                        _this5.newCourseId = data.courseId;
                        (0, _mintUi.Toast)({ message: '创建课程成功', duration: 2000 });
                        if (data.videoSteam != '') {
                            _this5.streamUrl = data.videoSteam;
                            _this5.isShowStream = true;
                        } else {
                            setTimeout(function () {
                                //发布成功后，回到我的页面
                                _this5.$router.push('/personalCenter/course/' + data.courseId + '&' + _this5.userId);
                            }, 2000);
                        }
                    } else if (res.body.code == -5010) {
                        (0, _mintUi.Toast)('课程开始时间有误或小于当前时间');
                    } else {
                        _mintUi.MessageBox.alert(res.body.msg).then(function (action) {
                            console.log('2121');
                            _this5.isDelFun();
                            _this5.creating = false;
                        });
                        //Toast(res.body.msg);
                    }
                });
            }
        }
    },
    watch: {
        datetimepickershow: function datetimepickershow(val) {
            // this.$refs.body.style.overflow = val ? 'hidden' : 'auto';
            // this.$refs.body.style.height = val ? '100%' : 'auto';
        },
        price: function price(val, oldVal) {
            if (val >= 1000000) {
                this.price = oldVal;
            } else if (val < 1) {
                this.price = null;
            }
            var arr = (val + '').split('.');
            if (arr.length > 1 && arr[1].length > 2) {
                this.price = oldVal;
            }
        },
        originPrice: function originPrice(val, oldVal) {
            if (val >= 1000000) {
                this.originPrice = oldVal;
            } else if (val < 1) {
                this.originPrice = null;
            }
            console.log('length', oldVal.length);
            var arr1 = (val + '').split('.');
            if (arr1.length > 1 && arr1[1].length > 2) {
                this.originPrice = oldVal;
            }
        },
        courseName: function courseName(val) {
            this.courseName = val.replace(/[\uD83C|\uD83D|\uD83E][\uDC00-\uDFFF][\u200D|\uFE0F]|[\uD83C|\uD83D|\uD83E][\uDC00-\uDFFF]|[0-9|*|#]\uFE0F\u20E3|[0-9|#]\u20E3|[\u203C-\u3299]\uFE0F\u200D|[\u203C-\u3299]\uFE0F|[\u2122-\u2B55]|\u303D|[\A9|\AE]\u3030|\uA9|\uAE|\u3030/ig, '');
        }
    }
};
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(99), __webpack_require__(49)))

/***/ }),

/***/ 981:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.mint-toast {\n  z-index: 99999;\n}\n.createCourse {\n  min-height: 100%;\n  box-sizing: border-box;\n  background-color: #F5F7F8;\n  -webkit-box-sizing: border-box;\n  position: relative;\n  /*.course-way{\n        .title{\n            line-height: 47px;\n            padding-left: 15px;\n            color: #666;\n            font-size: 16px;\n        }\n        ul{\n            li{\n                padding:.38rem .26rem;\n                border-bottom: 1px solid #ebebeb;\n                background: #ffffff;\n                div{\n                    h4{\n                        font-size: .32rem;\n                        color: #666666;\n                        span{\n                            display: inline-block;\n                            width: .32rem;\n                            height: .32rem;\n                            background: url(\"/images/radio-default.png\") no-repeat center center;\n                            -webkit-background-size: 100% 100%;\n                            background-size: 100% 100%;\n                            vertical-align: middle;\n                            margin-right: .26rem;\n                            &.active{\n                                background: url(\"/images/radio-active-red.png\") no-repeat center center;\n                                -webkit-background-size: 100% 100%;\n                                background-size: 100% 100%;\n                            }\n                        }\n\n                    }\n                    p{\n                        padding-left:.58rem;\n                        color: #b2b2b2;\n                        font-size: .24rem;\n                        margin-top: .12rem;\n                    }\n                }\n                input[type='radio']{\n                    display: none;\n                }\n            }\n        }\n    }*/\n}\n.createCourse .class-way {\n    padding: .4rem .24rem;\n    background: #ffffff;\n    margin-bottom: .24rem;\n}\n.createCourse .class-way h4 {\n      font-size: .36rem;\n      color: #353535;\n      text-align: center;\n      min-height: .44rem;\n}\n.createCourse .class-way h4 span {\n        width: .44rem;\n        height: .44rem;\n        float: right;\n        background: url(\"/images/3.0/icon-16.png\") no-repeat 100%/100%;\n        margin-top: -2px;\n}\n.createCourse .class-way ul {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      margin-top: .35rem;\n}\n.createCourse .class-way ul li {\n        -webkit-box-flex: 1;\n        -webkit-flex: 1;\n            -ms-flex: 1;\n                flex: 1;\n        text-align: center;\n}\n.createCourse .class-way ul li span {\n          display: inline-block;\n          width: .66rem;\n          height: .54rem;\n          margin-bottom: .24rem;\n}\n.createCourse .class-way ul li p {\n          font-size: .24rem;\n          color: #888888;\n}\n.createCourse .class-way ul li:nth-child(1) span {\n          background: url(\"/images/3.0/class-default.png\") no-repeat 100%/100%;\n}\n.createCourse .class-way ul li:nth-child(2) span {\n          background: url(\"/images/3.0/class-video.png\") no-repeat 100%/100%;\n}\n.createCourse .class-way ul li:nth-child(3) span {\n          background: url(\"/images/3.0/class-ppt.png\") no-repeat 100%/100%;\n}\n.createCourse .class-way ul li:nth-child(1).active span {\n          background: url(\"/images/3.0/class-default-active.png\") no-repeat 100%/100%;\n}\n.createCourse .class-way ul li:nth-child(1).active p {\n          color: #353535;\n}\n.createCourse .class-way ul li:nth-child(2).active span {\n          background: url(\"/images/3.0/class-video-active.png\") no-repeat 100%/100%;\n}\n.createCourse .class-way ul li:nth-child(2).active p {\n          color: #353535;\n}\n.createCourse .class-way ul li:nth-child(3).active span {\n          background: url(\"/images/3.0/class-ppt-active.png\") no-repeat 100%/100%;\n}\n.createCourse .class-way ul li:nth-child(3).active p {\n          color: #353535;\n}\n.createCourse .course-way-popup {\n    width: 5.8rem;\n    border-radius: 4px;\n    background: #ffffff;\n}\n.createCourse .course-way-popup ul {\n      padding-top: .48rem;\n      padding-left: .32rem;\n      padding-right: .48rem;\n      padding-bottom: .4rem;\n}\n.createCourse .course-way-popup ul li {\n        margin-bottom: .5rem;\n}\n.createCourse .course-way-popup ul li img {\n          float: left;\n          width: .66rem;\n          height: .54rem;\n          margin-right: .32rem;\n          margin-bottom: .4rem;\n}\n.createCourse .course-way-popup ul li > section h4 {\n          color: #1c0808;\n          font-size: .32rem;\n          margin-bottom: .16rem;\n}\n.createCourse .course-way-popup ul li > section p {\n          font-size: .24rem;\n          color: #888888;\n          line-height: .36rem;\n}\n.createCourse .course-way-popup ul li:last-child {\n          margin-bottom: 0;\n}\n.createCourse .course-way-popup .btn {\n      width: 100%;\n      height: 1rem;\n      line-height: 1rem;\n      background: #c62f2f;\n      color: #ffffff;\n      font-size: .36rem;\n      border-radius: 0 0 5px 5px;\n      text-align: center;\n}\n.createCourse .class-name {\n    background: #ffffff;\n    padding: .24rem .24rem 0 .24rem;\n    margin-bottom: .24rem;\n}\n.createCourse .class-name p {\n      font-size: .24rem;\n      color: #353535;\n}\n.createCourse .class-name input {\n      font-size: .32rem;\n      color: #353535;\n      border-bottom: 1px solid #e8e8e8;\n      width: 100%;\n      padding: .3rem .24rem;\n      box-sizing: border-box;\n}\n.createCourse .class-name input::-webkit-input-placeholder {\n        color: #888888;\n        font-size: .32rem;\n}\n.createCourse .class-time {\n    padding: 0 .24rem;\n    background: #ffffff;\n    overflow: hidden;\n    margin-bottom: .24rem;\n}\n.createCourse .class-time .time > p {\n      font-size: .24rem;\n      color: #353535;\n      margin-top: .24rem;\n}\n.createCourse .class-time .time > div {\n      width: 100%;\n      border-bottom: 1px solid #e8e8e8;\n      position: relative;\n      padding: .3rem 0 .3rem .24rem;\n      box-sizing: border-box;\n      font-size: .32rem;\n      color: #353535;\n}\n.createCourse .class-time .time > div::after {\n        content: '';\n        display: inline-block;\n        position: absolute;\n        top: .3rem;\n        right: .24rem;\n        width: .36rem;\n        height: .36rem;\n        background: url(\"/images/3.0/dajiahao.png\") no-repeat 100%/100%;\n}\n.createCourse .class-time .mintui-field-error {\n      float: right;\n      margin-right: .96rem;\n}\n.createCourse .course-type {\n    margin-top: 6px;\n    padding: .3rem .24rem .24rem .24rem;\n    background-color: #fff;\n}\n.createCourse .course-type h5 {\n      font-size: 16px;\n      line-height: 26px;\n      padding-left: 15px;\n      color: #666;\n}\n.createCourse .course-type h5 span {\n        font-size: 13px;\n        color: #fb4040;\n}\n.createCourse .course-type .choose {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-pack: center;\n      -webkit-justify-content: center;\n          -ms-flex-pack: center;\n              justify-content: center;\n}\n.createCourse .course-type .choose li {\n      float: left;\n      text-align: center;\n      padding-top: 6px;\n      line-height: 1;\n      font-size: 16px;\n      color: #666;\n      position: relative;\n}\n.createCourse .course-type .choose li + li {\n        margin-left: .4rem;\n}\n.createCourse .course-type .choose li input[type=\"radio\"] {\n        display: none;\n}\n.createCourse .course-type .choose li > div p::after {\n        content: '';\n        display: block;\n        width: 0.68rem;\n        height: 0.04rem;\n        background: #ffffff;\n        margin: .16rem auto;\n}\n.createCourse .course-type .choose li div.active {\n        color: #c62f2f;\n}\n.createCourse .course-type .choose li div.active p::after {\n          background: #c62f2f;\n}\n.createCourse .course-type .choose li i {\n        display: inline-block;\n        width: 46px;\n        height: 46px;\n        border-radius: 50%;\n        background-color: #fff;\n        border: 2px solid #b2b2b2;\n        line-height: 46px;\n        color: #666;\n        font-size: 24px;\n        margin-bottom: 8px;\n}\n.createCourse .course-type .choose li span {\n        position: absolute;\n        display: none;\n        background-color: #c62f2f;\n        border-radius: 50%;\n        top: 0;\n        left: 50%;\n        margin-left: 7px;\n}\n.createCourse .course-type .choose li span.sprite:before {\n          width: 24px;\n          height: 17px;\n          background-position: -56px -150px;\n}\n.createCourse .course-type .extra {\n      padding: 0;\n      position: relative;\n}\n.createCourse .course-type .extra li {\n        display: none;\n        background-color: #fff;\n        border-radius: 5px;\n        box-sizing: border-box;\n}\n.createCourse .course-type .extra li.active {\n        display: block;\n}\n.createCourse .course-type .extra li.active .top {\n          height: 50%;\n          line-height: 45px;\n          font-size: 16px;\n          color: #666;\n}\n.createCourse .course-type .extra li.active.pass .bottom {\n          -webkit-box-orient: horizontal;\n          -webkit-box-direction: normal;\n          -webkit-flex-direction: row;\n              -ms-flex-direction: row;\n                  flex-direction: row;\n}\n.createCourse .course-type .extra li.active.pass .bottom span {\n            color: #333;\n}\n.createCourse .course-type .extra li.active p {\n          font-size: .24rem;\n          text-align: center;\n          color: #666;\n          line-height: 30px;\n}\n.createCourse .course-type .extra li.active .bottom {\n          display: -webkit-box;\n          display: -webkit-flex;\n          display: -ms-flexbox;\n          display: flex;\n          -webkit-box-orient: vertical;\n          -webkit-box-direction: normal;\n          -webkit-flex-direction: column;\n              -ms-flex-direction: column;\n                  flex-direction: column;\n}\n.createCourse .course-type .extra li.active .bottom section {\n            border-bottom: 1px solid #efefef;\n            padding: .24rem;\n}\n.createCourse .course-type .extra li.active .bottom .pre {\n            display: inline-block;\n            font-size: 0.32rem;\n            color: #353535;\n            width: 1.1rem;\n}\n.createCourse .course-type .extra li.active .bottom input {\n            height: 30px;\n            color: #c62f2f;\n            font-size: .32rem;\n            text-indent: 4px;\n            line-height: 30px;\n            margin-right: 5px;\n            width: 60%;\n}\n.createCourse .course-type .extra li.active .bottom input::-webkit-input-placeholder {\n              color: #888888;\n              font-size: .28rem;\n}\n.createCourse .course-type .extra li.active .bottom span {\n            color: #353535;\n            font-size: .32rem;\n            line-height: 32px;\n}\n.createCourse .course-type .extra li.active .bottom span.red {\n              color: #c62f2f;\n              float: right;\n}\n.createCourse .course-type .extra li.active:first-child {\n          height: 1rem;\n          line-height: 1rem;\n          padding: 0 15px;\n          color: #888;\n          font-size: .28rem;\n          background-color: #f5f7f8;\n          text-align: center;\n          margin-bottom: .24rem;\n}\n.createCourse .course-type .extra li.active:nth-child(2) {\n          padding-left: .24rem;\n}\n.createCourse .course-type .extra li.active:nth-child(2) span {\n            margin-right: .2rem;\n}\n.createCourse .course-type .extra li.active:nth-child(2) input {\n            width: 75%;\n}\n.createCourse .course-type .extra li.active:last-child p {\n          color: #c62f2f;\n          font-size: 0.28rem;\n          height: .5rem;\n          text-align: center;\n          width: 100%;\n          line-height: .7rem;\n}\n.createCourse .teacher-container {\n    background-color: transparent;\n    height: 50%;\n    width: 100%;\n}\n.createCourse .teacher-container.active {\n      -webkit-transform: translateY(0);\n          -ms-transform: translateY(0);\n              transform: translateY(0);\n}\n.createCourse .teacher-container .header {\n      height: .9rem;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n      margin-bottom: 0.1rem;\n      -webkit-box-pack: justify;\n      -webkit-justify-content: space-between;\n          -ms-flex-pack: justify;\n              justify-content: space-between;\n      /*position: fixed;\n            width: 100%;\n            top: -1.3rem;*/\n}\n.createCourse .teacher-container .header button {\n        font-size: .35rem;\n        color: #fff;\n        width: 2.5rem;\n        height: 0.8rem;\n        border: 1px solid #c62f2f;\n        background-color: #c62f2f;\n        border-radius: 30px;\n        margin: 0 auto;\n}\n.createCourse .teacher-container .tag-list {\n      -webkit-box-flex: 1;\n      -webkit-flex: 1;\n          -ms-flex: 1;\n              flex: 1;\n      overflow-x: hidden;\n      padding-left: .3rem;\n      overflow-y: scroll;\n      height: 100%;\n      background: #ffffff;\n}\n.createCourse .teacher-container .tag-list p {\n        line-height: 5.5rem;\n        text-align: center;\n        color: #666;\n}\n.createCourse .teacher-container .tag-list label {\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        height: 1.2rem;\n        -webkit-box-align: center;\n        -webkit-align-items: center;\n            -ms-flex-align: center;\n                align-items: center;\n        -webkit-box-pack: justify;\n        -webkit-justify-content: space-between;\n            -ms-flex-pack: justify;\n                justify-content: space-between;\n        padding-right: .6rem;\n        border-bottom: 1px solid #ebebeb;\n}\n.createCourse .teacher-container .tag-list label img {\n          width: 36px;\n          height: 36px;\n          border-radius: 36px;\n}\n.createCourse .teacher-container .tag-list label p {\n          width: 90%;\n          padding-left: 10px;\n}\n.createCourse .teacher-container .tag-list span {\n        display: block;\n        box-sizing: border-box;\n        border: 1px solid #bbbbbb;\n        background-color: transparent;\n        width: .36rem;\n        height: .36rem;\n        border-radius: 2px;\n}\n.createCourse .teacher-container .tag-list input[type=\"radio\"] {\n        display: none;\n}\n.createCourse .teacher-container .tag-list input[type=\"radio\"]:checked + span {\n          background-color: #c62f2f;\n          display: -webkit-box;\n          display: -webkit-flex;\n          display: -ms-flexbox;\n          display: flex;\n          -webkit-box-pack: center;\n          -webkit-justify-content: center;\n              -ms-flex-pack: center;\n                  justify-content: center;\n          -webkit-box-align: center;\n          -webkit-align-items: center;\n              -ms-flex-align: center;\n                  align-items: center;\n          border: none;\n}\n.createCourse .teacher-container .tag-list input[type=\"radio\"]:checked + span:before {\n            content: '';\n            display: block;\n            width: .28rem;\n            height: .2rem;\n            background: url(\"/images/35.png\") no-repeat;\n            background-size: 100% 100%;\n}\n.createCourse .text {\n    height: .5rem;\n    line-height: .5rem;\n    margin: 5px 0;\n    text-align: center;\n    color: #999;\n    font-size: .24rem;\n}\n.createCourse .mint-datetime-action {\n    color: #c62f2f;\n}\n.createCourse > .bottom {\n    position: fixed;\n    width: 100%;\n    bottom: 0;\n    left: 0;\n    text-align: center;\n    color: #b2b2b2;\n    font-size: 13px;\n}\n.createCourse > .bottom.relative {\n      position: relative;\n}\n.createCourse > .bottom.fixed {\n      position: fixed;\n}\n.createCourse > .bottom .save {\n      display: block;\n      width: 100%;\n      line-height: 48px;\n      color: #fff;\n      background-color: #c62f2f;\n      font-size: 18px;\n}\n.createCourse .courseType {\n    width: 80%;\n    text-align: center;\n    border-radius: 5px;\n}\n.createCourse .courseType .type-title {\n      line-height: 45px;\n      border-bottom: 1px solid #f0f0f0;\n}\n.createCourse .courseType ul {\n      max-height: 400px;\n      overflow: auto;\n      text-align: left;\n}\n.createCourse .courseType ul li label {\n        display: block;\n        width: 100%;\n        border-bottom: 1px solid #f0f0f0;\n        color: #666;\n        line-height: 35px;\n        padding: 0 10px;\n        box-sizing: border-box;\n        position: relative;\n}\n.createCourse .courseType ul li label span {\n          display: none;\n          position: absolute;\n          top: 50%;\n          -webkit-transform: translateY(-50%);\n              -ms-transform: translateY(-50%);\n                  transform: translateY(-50%);\n          right: 10px;\n}\n.createCourse .courseType ul li label span.sprite:before {\n            background-size: 7.5rem auto;\n            -webkit-transform: none;\n                -ms-transform: none;\n                    transform: none;\n            width: .33rem;\n            height: .3rem;\n            background-position: -5.2rem -1.1rem;\n            margin-top: .18rem;\n}\n.createCourse .courseType ul li label input[type=\"radio\"] {\n          display: none;\n}\n.createCourse .courseType ul li label input[type=\"radio\"]:checked + span {\n            display: block;\n}\n.createCourse .courseType .confirm-btn {\n      display: inline-block;\n      width: 80%;\n      height: 35px;\n      border-radius: 5px;\n      color: #fff;\n      background-color: #c62f2f;\n      margin: 15px 0;\n      line-height: 35px;\n}\n.createCourse .courseStream {\n    width: 80%;\n    border-radius: 4px;\n    padding: 0 .24rem;\n}\n.createCourse .courseStream .title {\n      font-size: .32rem;\n      line-height: .92rem;\n      color: #333333;\n      text-align: center;\n}\n.createCourse .courseStream .stream {\n      padding: .2rem .24rem;\n      color: #c62f2f;\n      background: #f4f6fc;\n      border-radius: 3px;\n      font-size: .3rem;\n      line-height: .46rem;\n      text-decoration: underline;\n}\n.createCourse .courseStream .explain {\n      padding: 0 .14rem .14rem .14rem;\n}\n.createCourse .courseStream .explain::-moz-selection {\n        background: #ffffff;\n}\n.createCourse .courseStream .explain::selection {\n        background: #ffffff;\n}\n.createCourse .courseStream .explain p {\n        color: #b2b2b2;\n        font-size: .24rem;\n        line-height: .34rem;\n}\n.createCourse .courseStream .explain .btn-area {\n        margin-bottom: .24rem;\n        margin-top: .2rem;\n}\n.createCourse .courseStream .explain .btn-area button {\n          width: 44%;\n          height: .9rem;\n          line-height: .9rem;\n}\n.createCourse .courseStream .explain .btn-area .mint-button--default {\n          color: #999 !important;\n          border-color: #999 !important;\n          background: #fff;\n}\n.createCourse .courseStream .explain .btn-area .mint-button--primary {\n          float: right;\n          background: #c62f2f;\n}\n.createCourse .courseStream #stream-input {\n      z-index: -1000;\n      width: 100px;\n      height: 1px;\n      color: #fff;\n      display: inline-block;\n}\n.createCourse .courseStream #stream-input::-moz-selection {\n        background: #fff;\n}\n.createCourse .courseStream #stream-input::selection {\n        background: #fff;\n}\n", ""]);

// exports


/***/ })

});