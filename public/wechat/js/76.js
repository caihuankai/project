webpackJsonp([76],{

/***/ 1125:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('article', {
    staticClass: "settings"
  }, [(_vm.data.class_type != 2) ? _c('div', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (!_vm.showCourseIntroduce),
      expression: "!showCourseIntroduce"
    }],
    staticClass: "courseSettings",
    style: ({
      paddingBottom: _vm.paddingBottom + 'px',
      overflow: _vm.showCourseIntroduce ? 'visible' : 'hidden'
    })
  }, [_c('section', {
    staticClass: "header-bg"
  }, [_c('img', {
    attrs: {
      "src": _vm.src_img,
      "alt": ""
    }
  }), _vm._v(" "), _c('div', {
    on: {
      "click": function($event) {
        _vm.setBg(true)
      }
    }
  }, [_vm._v("点击修改封面海报")]), _vm._v(" "), (!_vm.mobile) ? _c('input', {
    staticClass: "iconpc",
    attrs: {
      "type": "file",
      "accept": "image/gif,image/jpeg,image/jpg,image/png,image/svg"
    },
    on: {
      "change": _vm.changeIcon
    }
  }) : _vm._e()]), _vm._v(" "), _c('section', {
    staticClass: "class-name",
    staticStyle: {
      "margin-bottom": "0"
    }
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
    staticClass: "class-name"
  }, [_c('p', [_vm._v("课程分类")]), _vm._v(" "), _c('input', {
    staticStyle: {
      "color": "#b2b2b2",
      "background-color": "#fff"
    },
    attrs: {
      "type": "text",
      "placeholder": "请输入直播课程名称",
      "readonly": "",
      "unselectable": "on",
      "disabled": ""
    },
    domProps: {
      "value": _vm.data.tag
    }
  })]), _vm._v(" "), _c('section', {
    staticClass: "class-time"
  }, [_c('div', {
    staticClass: "time"
  }, [_c('p', [_vm._v("主讲人")]), _vm._v(" "), _c('div', {
    on: {
      "click": _vm.setHost
    }
  }, [_vm._v(_vm._s(_vm.courseHost == '' ? '未填写' : _vm.courseHost.length > 6 ? _vm.courseHost.substr(0, 6) + '...' : _vm.courseHost))])]), _vm._v(" "), _c('div', {
    staticClass: "time"
  }, [_c('p', [_vm._v("主讲人介绍")]), _vm._v(" "), _c('div', {
    on: {
      "click": _vm.setHostInfo
    }
  }, [_vm._v(_vm._s(_vm.courseHostInfo == '' ? '未填写' : '已填写'))])])]), _vm._v(" "), _c('section', {
    staticClass: "class-time"
  }, [_c('div', {
    staticClass: "arrow"
  }, [_c('p', [_vm._v("课程介绍")]), _vm._v(" "), _c('div', {
    on: {
      "click": _vm.setLiveIntro
    }
  }, [_vm._v(_vm._s((_vm.liveintro == '' || _vm.data.img_brief == []) ? '未填写' : '已填写'))])])]), _vm._v(" "), (_vm.data.level == 1) ? _c('section', {
    staticClass: "class-time"
  }, [_c('div', {
    staticClass: "time"
  }, [_c('p', [_vm._v("修改课程密码")]), _vm._v(" "), _c('div', {
    on: {
      "click": _vm.setPwd
    }
  }, [_vm._v(_vm._s(_vm.coursePwd))])])]) : _vm._e(), _vm._v(" "), (_vm.data.form == 2) ? _c('section', {
    staticClass: "class-video"
  }, [_c('p', [_vm._v("设置播放器默认图")]), _vm._v(" "), _c('section', {
    staticClass: "upload-btn",
    on: {
      "click": function($event) {
        _vm.setBg(false)
      }
    }
  }, [_c('div', {
    staticClass: "left"
  }, [_c('img', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.player_img),
      expression: "player_img"
    }],
    attrs: {
      "src": _vm.player_img,
      "alt": ""
    }
  })]), _vm._v(" "), _vm._m(0)])]) : _vm._e(), _vm._v(" "), (_vm.data.form == 2) ? _c('section', {
    staticClass: "class-video-stream"
  }, [_c('p', [_vm._v("直播流地址")]), _vm._v(" "), _c('h4', [_vm._v(_vm._s(_vm.data.push_url))]), _vm._v(" "), _c('h5', [_vm._v("复制本直播流地址配置到PC录屏软件即可实现在线直播")])]) : _vm._e(), _vm._v(" "), _c('div', {
    staticClass: "btns"
  }, [_c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": _vm.deleteCourse
    }
  }, [_vm._v("删除")]), _vm._v(" "), _c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": _vm.send
    }
  }, [_vm._v("确定")])])]) : _c('main', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (!_vm.showCourseIntroduce),
      expression: "!showCourseIntroduce"
    }],
    staticClass: "series-course-setting"
  }, [(_vm.showMain) ? [_c('section', {
    staticClass: "header-bg"
  }, [_c('img', {
    attrs: {
      "src": _vm.src_img,
      "alt": ""
    }
  }), _vm._v(" "), _c('div', {
    on: {
      "click": function($event) {
        _vm.setBg(true)
      }
    }
  }, [_vm._v("点击修改封面海报")]), _vm._v(" "), (!_vm.mobile) ? _c('input', {
    staticClass: "iconpc",
    attrs: {
      "type": "file",
      "accept": "image/gif,image/jpeg,image/jpg,image/png,image/svg"
    },
    on: {
      "change": _vm.changeIcon
    }
  }) : _vm._e()]), _vm._v(" "), _c('section', {
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
    staticClass: "class-time"
  }, [_c('section', [_c('p', [_vm._v("系列课分类")]), _vm._v(" "), _c('div', {
    staticStyle: {
      "color": "#b2b2b2"
    }
  }, [_vm._v(_vm._s(_vm.data.tag))])]), _vm._v(" "), _c('section', {
    staticClass: "time"
  }, [_c('p', [_vm._v("课程计划")]), _vm._v(" "), _c('div', {
    on: {
      "click": function($event) {
        _vm.isShowPlan = true;
        _vm.tmpNum = _vm.data.plan_num
      }
    }
  }, [_vm._v(_vm._s(_vm.courseNum != '' ? _vm.courseNum + '节' : '未填写'))])])]), _vm._v(" "), _c('section', {
    staticClass: "class-time"
  }, [_c('section', {
    staticClass: "time"
  }, [_c('p', [_vm._v("主讲人")]), _vm._v(" "), _c('div', {
    on: {
      "click": _vm.setHost
    }
  }, [_vm._v(_vm._s(_vm.courseHost == '' ? '未填写' : _vm.courseHost.length > 6 ? _vm.courseHost.substr(0, 6) + '...' : _vm.courseHost))])]), _vm._v(" "), _c('section', {
    staticClass: "time"
  }, [_c('p', [_vm._v("主讲人介绍")]), _vm._v(" "), _c('div', {
    on: {
      "click": _vm.setHostInfo
    }
  }, [_vm._v(_vm._s(_vm.courseHostInfo == '' ? '未填写' : '已填写'))])])]), _vm._v(" "), _c('section', {
    staticClass: "class-time"
  }, [_c('section', {
    staticClass: "arrow"
  }, [_c('p', [_vm._v("系列课介绍")]), _vm._v(" "), _c('div', {
    on: {
      "click": _vm.setLiveIntro
    }
  }, [_vm._v(_vm._s((_vm.liveintro == '' || _vm.data.img_brief == []) ? '未填写' : '已填写'))])])]), _vm._v(" "), (_vm.data.level == 2) ? _c('section', {
    staticClass: "class-price"
  }, [_c('p', [_vm._v("课程价格")]), _vm._v(" "), _c('section', [_c('input', {
    directives: [{
      name: "model",
      rawName: "v-model.number",
      value: (_vm.coursePrice),
      expression: "coursePrice",
      modifiers: {
        "number": true
      }
    }],
    attrs: {
      "type": "number"
    },
    domProps: {
      "value": (_vm.coursePrice)
    },
    on: {
      "input": function($event) {
        if ($event.target.composing) { return; }
        _vm.coursePrice = _vm._n($event.target.value)
      },
      "blur": function($event) {
        _vm.$forceUpdate()
      }
    }
  }), _vm._v(" "), _c('i')])]) : _vm._e(), _vm._v(" "), (_vm.data.level == 0) ? _c('section', {
    staticClass: "class-time"
  }, [_c('section', [_c('p', [_vm._v("课程价格")]), _vm._v(" "), _c('div', {
    staticStyle: {
      "color": "#b2b2b2"
    }
  }, [_vm._v("免费")])])]) : _vm._e(), _vm._v(" "), _c('section', {
    staticClass: "class-sort",
    on: {
      "click": _vm.setSort
    }
  }, [_c('mt-cell', {
    attrs: {
      "title": "修改课程排序",
      "is-link": ""
    }
  })], 1)] : _vm._e(), _vm._v(" "), _c('div', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.data.identity == 1),
      expression: "data.identity == 1"
    }],
    staticClass: "save-btn",
    on: {
      "click": _vm.send
    }
  }, [_vm._v("保存")]), _vm._v(" "), _c('div', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.data.isAssistant == 1),
      expression: "data.isAssistant == 1"
    }],
    staticClass: "save-btn-assi"
  }, [_c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": _vm.closeCourse
    }
  }, [_vm._v("禁用")]), _vm._v(" "), _c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": _vm.send
    }
  }, [_vm._v("保存")])]), _vm._v(" "), (false) ? _c('header', [_c('section', {
    on: {
      "click": function($event) {
        _vm.setBg(true)
      }
    }
  }, [_c('img', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.src_img != ''),
      expression: "src_img != ''"
    }],
    attrs: {
      "src": _vm.src_img,
      "alt": ""
    }
  }), _vm._v(" "), _c('p', [_vm._v("点击修改图片")]), _vm._v(" "), (!_vm.mobile) ? _c('input', {
    staticClass: "iconpc",
    attrs: {
      "type": "file",
      "accept": "image/gif,image/jpeg,image/jpg,image/png,image/svg"
    },
    on: {
      "change": _vm.changeIcon
    }
  }) : _vm._e()])]) : _vm._e(), _vm._v(" "), (false) ? _c('article', {
    staticClass: "setting"
  }, [_c('section', {
    on: {
      "click": _vm.setName
    }
  }, [_c('mt-cell', {
    attrs: {
      "title": "系列课名称",
      "is-link": "",
      "value": _vm.courseName.length > 8 ? _vm.courseName.substr(0, 7) + '...' : _vm.courseName
    }
  })], 1), _vm._v(" "), _c('section', [_c('mt-cell', {
    attrs: {
      "title": "系列课分类",
      "value": _vm.data.tag
    }
  })], 1), _vm._v(" "), _c('section', {
    on: {
      "click": function($event) {
        _vm.isShowPlan = true;
        _vm.tmpNum = _vm.data.plan_num
      }
    }
  }, [_c('mt-cell', {
    attrs: {
      "title": "课程计划",
      "is-link": "",
      "value": _vm.courseNum != '' ? _vm.courseNum + '节' : '未设置'
    }
  })], 1), _vm._v(" "), _c('section', {
    on: {
      "click": _vm.setLiveIntro
    }
  }, [_c('mt-cell', {
    attrs: {
      "title": "系列课介绍",
      "is-link": "",
      "value": (_vm.liveintro == '' || _vm.data.img_brief == []) ? '未设置' : '已设置'
    }
  })], 1), _vm._v(" "), _c('section', {
    on: {
      "click": _vm.setHost
    }
  }, [_c('mt-cell', {
    attrs: {
      "title": "填写主讲人",
      "is-link": "",
      "value": _vm.courseHost == '' ? '未设置' : _vm.courseHost.length > 6 ? _vm.courseHost.substr(0, 6) + '...' : _vm.courseHost
    }
  })], 1), _vm._v(" "), _c('section', {
    on: {
      "click": _vm.setHostInfo
    }
  }, [_c('mt-cell', {
    attrs: {
      "title": "主讲人介绍",
      "is-link": "",
      "value": _vm.courseHostInfo == '' ? '未设置' : '已设置'
    }
  })], 1), _vm._v(" "), _c('section', {
    on: {
      "click": _vm.setSort
    }
  }, [_c('mt-cell', {
    attrs: {
      "title": "课程排序",
      "is-link": ""
    }
  })], 1), _vm._v(" "), _c('section', [_c('mt-cell', {
    attrs: {
      "title": "收费类型",
      "value": _vm.data.level == 0 ? '免费' : '固定收费'
    }
  })], 1), _vm._v(" "), _c('div', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.data.level == 2),
      expression: "data.level == 2"
    }],
    staticClass: "set-price"
  }, [_c('input', {
    directives: [{
      name: "model",
      rawName: "v-model.number",
      value: (_vm.coursePrice),
      expression: "coursePrice",
      modifiers: {
        "number": true
      }
    }],
    attrs: {
      "type": "number"
    },
    domProps: {
      "value": (_vm.coursePrice)
    },
    on: {
      "input": function($event) {
        if ($event.target.composing) { return; }
        _vm.coursePrice = _vm._n($event.target.value)
      },
      "blur": function($event) {
        _vm.$forceUpdate()
      }
    }
  }), _vm._v(" "), _c('i')])]) : _vm._e()], 2), _vm._v(" "), _c('div', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.showCourseIntroduce),
      expression: "showCourseIntroduce"
    }],
    staticClass: "courseIntroduce",
    style: ({
      'min-height': _vm.clientHeight
    })
  }, [_c('section', {
    staticClass: "intro-word"
  }, [_c('p', [_vm._v("课程介绍")]), _vm._v(" "), _c('textarea', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.textTmp),
      expression: "textTmp"
    }],
    attrs: {
      "placeholder": "请输入课程介绍",
      "rows": "6"
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
  })]), _vm._v(" "), _c('section', {
    staticClass: "intro-container"
  }, [_c('p', {
    staticClass: "title"
  }, [_vm._v("介绍图片")]), _vm._v(" "), _vm._l((_vm.img_brief), function(item, index) {
    return _c('div', {
      key: item.src,
      staticClass: "info"
    }, [_c('img', {
      attrs: {
        "src": _vm.previewImgs[index],
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
        "input": function($event) {
          if ($event.target.composing) { return; }
          item.explain = $event.target.value
        }
      }
    }), _vm._v(" "), _c('span', {
      staticClass: "tick sprite",
      on: {
        "click": function($event) {
          _vm.deleteImgBrief(index)
        }
      }
    })])
  }), _vm._v(" "), _c('section', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.img_brief.length < 6),
      expression: "img_brief.length<6"
    }],
    staticClass: "upload-btn",
    on: {
      "click": _vm.uploadImgBrief
    }
  }, [_c('div', {
    staticClass: "left"
  }), _vm._v(" "), _vm._m(1), _vm._v(" "), (!_vm.mobile) ? _c('input', {
    staticClass: "imgpc",
    attrs: {
      "type": "file",
      "multiple": "",
      "accept": "image/gif,image/jpeg,image/jpg,image/png,image/svg"
    },
    on: {
      "change": _vm.onFileChange
    }
  }) : _vm._e()])], 2), _vm._v(" "), _c('div', {
    staticClass: "btns"
  }, [_c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": _vm.cancelCourseIntro
    }
  }, [_vm._v("取消")]), _vm._v(" "), _c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": _vm.changeCourseIntro
    }
  }, [_vm._v("保存")])])]), _vm._v(" "), _c('mt-popup', {
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
      value: (_vm.showpwdtext),
      callback: function($$v) {
        _vm.showpwdtext = $$v
      },
      expression: "showpwdtext"
    }
  }, [_c('div', {
    staticClass: "msgbox"
  }, [_c('div', {
    staticClass: "title"
  }, [_vm._v("修改密码")]), _vm._v(" "), _c('div', {
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
      "maxlength": "4"
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
        _vm.showpwdtext = false
      }
    }
  }, [_vm._v("取消")]), _vm._v(" "), _c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": _vm.changePwd
    }
  }, [_vm._v("确定")])])])]), _vm._v(" "), _c('mt-popup', {
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
  }, [_vm._v("填写主讲人")]), _vm._v(" "), _c('div', {
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
      "placeholder": "请填写主讲人和嘉宾讲师名字"
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
  }, [_vm._v(_vm._s(_vm.data.class_type == 2 ? '主讲人介绍' : '主讲人及嘉宾介绍'))]), _vm._v(" "), _c('div', {
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
      "placeholder": "请填写主讲人及嘉宾的介绍信息"
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
  }, [_vm._v("确定")])], 1)]), _vm._v(" "), _c('section', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.showSetSort),
      expression: "showSetSort"
    }],
    staticClass: "set-sort",
    style: ({
      'min-height': _vm.clientHeight
    })
  }, [_vm._m(2), _vm._v(" "), _c('ul', {
    staticClass: "sub-list"
  }, _vm._l((_vm.sortList), function(item, index) {
    return _c('li', {
      key: index,
      staticClass: "clearfix"
    }, [_c('img', {
      attrs: {
        "src": item.src_img,
        "alt": "课程图片"
      }
    }), _vm._v(" "), _c('section', [_c('h4', [_vm._v(_vm._s(item.class_name))]), _vm._v(" "), _c('input', {
      directives: [{
        name: "number-only",
        rawName: "v-number-only"
      }, {
        name: "model",
        rawName: "v-model",
        value: (_vm.class_sort[index].sort),
        expression: "class_sort[index].sort"
      }],
      attrs: {
        "type": "tel",
        "maxlength": "3"
      },
      domProps: {
        "value": (_vm.class_sort[index].sort)
      },
      on: {
        "focus": function($event) {
          _vm.inputFocus($event)
        },
        "blur": function($event) {
          _vm.inputBlur($event)
        },
        "change": _vm.changeSort,
        "input": function($event) {
          if ($event.target.composing) { return; }
          _vm.class_sort[index].sort = $event.target.value
        }
      }
    })])])
  })), _vm._v(" "), _c('section', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.sortList.length == 0),
      expression: "sortList.length == 0"
    }],
    staticClass: "null"
  }, [_c('h4', [_vm._v("请先创建子课程~")])]), _vm._v(" "), _c('nomore', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.sortList.length != 0),
      expression: "sortList.length != 0"
    }],
    attrs: {
      "text": "没有更多啦"
    }
  }), _vm._v(" "), _c('div', {
    staticClass: "save-btn",
    on: {
      "click": _vm.saveSort
    }
  }, [_vm._v("保存")])], 1)], 1)
},staticRenderFns: [function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "right"
  }, [_c('h4', [_vm._v("点击上传图片")]), _vm._v(" "), _c('p', [_vm._v("图片尺寸:1280×720像素")])])
},function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "right"
  }, [_c('h4', [_vm._v("点击上传图片")]), _vm._v(" "), _c('p', [_vm._v("按上传顺序显示，最多6张")]), _vm._v(" "), _c('p', [_vm._v("建议尺寸:750×1334像素")])])
},function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('header', [_c('p', [_vm._v("在框内输入数字顺序，数字最大最靠前，数字为0时则 按创建时间最早的课程排最前。")])])
}]}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-10b53f23", module.exports)
  }
}

/***/ }),

/***/ 1238:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(967);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("f8d0ba16", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-10b53f23\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./courseSettings.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-10b53f23\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./courseSettings.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 465:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1238)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(890),
  /* template */
  __webpack_require__(1125),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\personalCenter\\courseSettings.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] courseSettings.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-10b53f23", Component.options)
  } else {
    hotAPI.reload("data-v-10b53f23", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 890:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function(NProgress) {

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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

// import { Indicator, Toast, MessageBox } from 'mint-ui'


var _nomore = __webpack_require__(135);

var _nomore2 = _interopRequireDefault(_nomore);

var _mintUi = __webpack_require__(54);

var _vuex = __webpack_require__(70);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

exports.default = {
	computed: (0, _vuex.mapState)({
		isWeiXin: function isWeiXin(state) {
			return state.isWeiXin;
		},
		userId: function userId(state) {
			return state.userInfo.user_id;
		},
		sdkdata: function sdkdata(state) {
			return state.sdkdata;
		}
	}),
	data: function data() {
		return {
			showCourseIntroduce: false,
			courseName: "",
			coursePwd: "",
			courseHost: "",
			courseHostInfo: "",
			textTmp: "",
			shownametext: false,
			showpwdtext: false,
			showhosttext: false,
			showhostintrotext: false,
			src_img: "", //封面图片
			liveintro: "",
			// photoUrl: 'http://7xl9ui.com1.z0.glb.clouddn.com/',
			data: {},
			img_brief: [],
			images: {
				localId: "", //本地选择图片id
				serverId: "", //上传返回服务端id
				downloadId: "" //下载返回本地id
			},
			imgIntros: {
				localId: [], //本地选择图片id
				serverId: [], //上传返回服务端id
				downloadId: [] //下载返回本地id
			},
			previewImgs: [],
			paddingBottom: 100,
			i: 0, //上传第几张图
			mobile: true,
			token: "",
			showUrl: "http://oqt46pvmm.bkt.clouddn.com/",
			uploadingBg: 0, //上传背景图片，0为未点击过上传背景，1为点击过上传背景，但未上传完毕，2为已上传完毕
			player_img: '', //播放器默认图
			isShowPlan: false, //课程计划弹窗
			courseNum: '', //课程计划\
			tmpNum: '',
			showSetSort: false, //课程排序
			sortList: [], //课程排序列表
			class_sort: [],
			clientHeight: '',
			showMain: true, //控制设置列表展示与否，课程排序与系列课介绍时有用
			coursePrice: '' //系列课课程固定价格
		};
	},
	created: function created() {
		var _this = this;

		this.$store.commit("setTitle", "编辑课程");
		this.$store.dispatch("getUserInfo", function (res) {
			_this.getData();
			_this.getSortList();
		});
		if (this.isWeiXin) {
			console.log("手机端");
			this.mobile = true;
		} else {
			console.log("pc端");
			this.mobile = false;
		}
		NProgress.start();
		this.$store.commit("hideTabber");
	},
	updated: function updated() {
		// Indicator.close()
		NProgress.done();
	},
	destroyed: function destroyed() {
		// Indicator.close()
		NProgress.done();
	},

	methods: {
		closeCourse: function closeCourse() {
			var _this2 = this;

			//助教禁用课程
			this.$http.get('/Course/assistantHandleCourseStatus', {
				params: { courseId: this.data.id, status: 2 }
			}).then(function (res) {
				if (res.body.code == 200) {
					(0, _mintUi.Toast)('系列课已禁用');
					setTimeout(function () {
						_this2.$router.push('/personalCenter');
					}, 1000);
				}
			});
		},
		inputFocus: function inputFocus(e) {
			e.target.style.color = '#c62f2f';
			e.target.style.borderColor = '#c62f2f';
		},
		inputBlur: function inputBlur(e) {
			e.target.style.color = '#999';
			e.target.style.borderColor = '#ccc';
		},
		saveSort: function saveSort() {
			this.showSetSort = false;
			this.showMain = true;
			(0, _mintUi.Toast)('保存成功');
		},
		changeSort: function changeSort() {
			//				alert(this.class_sort);
		},
		setSort: function setSort() {
			this.showSetSort = true;
			this.showMain = false;
			document.getElementsByClassName('set-sort')[0].scrollTop = 0;
		},
		toTop: function toTop() {
			document.body.scrollTop = 0;
		},
		getSortList: function getSortList() {
			var _this3 = this;

			this.$http.post('/CourseDetails/cildCourse', { id: this.$route.params.classId }, { emulateJSON: true }).then(function (res) {
				if (res.body.code == 200) {
					_this3.sortList = res.body.data;
					for (var i = 0; i < _this3.sortList.length; i++) {
						//                        		this.class_sort.push(+this.sortList[i].sort);//初始化排序数组
						_this3.class_sort[i] = {};
						_this3.class_sort[i].id = _this3.sortList[i].id;
						_this3.class_sort[i].sort = _this3.sortList[i].sort;
					}
				}
			});
		},
		clone: function clone(myObj) {
			//复制对象
			if ((typeof myObj === "undefined" ? "undefined" : _typeof(myObj)) != "object") return myObj;
			if (myObj == null) return myObj;
			var myNewObj = new Object();
			for (var i in myObj) {
				myNewObj[i] = this.clone(myObj[i]);
			}return myNewObj;
		},

		// getSignPackage() {
		//   this.$http.post(this.hostUrl + '/Jssdk/getSignPackage/', { user_id: this.userId, url: location.hostname + '/' + location.hash }, { emulateJSON: true }).then(res => {
		//     console.log(res.body)
		//     this.wxconfig(res.body.data)
		//   })
		// },
		getData: function getData() {
			var _this4 = this;

			this.$http.post(this.hostUrl + "/CourseDetails/details", { user_id: this.userId, id: this.$route.params.classId }, { emulateJSON: true }).then(function (res) {
				var data = res.body.data;
				_this4.clientHeight = document.body.clientHeight + 'px';
				_this4.data = data;
				if (data.status == 5) {
					_this4.$router.push("/personalCenter");
				}
				if (_this4.data.open_status == 2) {
					_this4.$router.push("/forbidden/1");
				}
				_this4.src_img = data.src_img;
				for (var i = 0; i < data.img_brief.length; i++) {
					_this4.img_brief[i] = _this4.clone(data.img_brief[i]);
					_this4.previewImgs.push(data.img_brief[i].src);
				}
				// console.log(this.data)
				_this4.courseName = data.class_name;
				_this4.coursePwd = data.password;
				_this4.courseHost = data.teacher_name;
				_this4.courseHostInfo = data.lecturers;
				_this4.liveintro = data.brief;
				_this4.courseNum = data.plan_num;
				_this4.coursePrice = data.price;
				_this4.src_img = data.src_img;
				if (data.class_type == 2) {
					_this4.updateTitle('编辑系列课信息');
				}
			});
		},
		setBg: function setBg(isBg) {
			var _this5 = this;

			//isBg: true为封面图，false为默认播放器图片
			//设置背景
			wx.chooseImage({
				count: 1, // 默认9
				sizeType: ["original", "compressed"], // 可以指定是原图还是压缩图，默认二者都有
				sourceType: ["album", "camera"], // 可以指定来源是相册还是相机，默认二者都有
				success: function success(res) {
					_this5.uploadingBg = 1;
					_this5.images.localId = res.localIds[0]; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
					// alert('已选择 ' + res.localIds.length + ' 张图片');
					// alert(this.images.localId);
					_this5.uploadImage(_this5.images, 21, isBg);
					// ws.send(123123);
				}
			});
		},
		upload: function upload(obj, positionType, isBg) {
			var _this6 = this;

			if (Array.isArray(obj.serverId)) {
				// alert('上传了' + obj.localId.length + '张图片')
				this.i = 0;
				this.uploads(obj, positionType);
			} else {
				wx.uploadImage({
					localId: obj.localId,
					success: function success(res) {
						obj.serverId = res.serverId;
						// alert(res.serverId)
						_this6.$http.post(_this6.hostUrl + "/QiNiu/uploadPictureFromWeixin", { img: res.serverId, positionType: positionType }, { emulateJSON: true }).then(function (res) {
							// alert('post success ' + JSON.stringify(res.body))
							// alert(res.body)
							// try {
							if (isBg) {
								_this6.src_img = JSON.parse(res.body).data.imgUrlDisplay;
							} else {
								_this6.player_img = JSON.parse(res.body).data.imgUrlDisplay;
							}
							_this6.uploadingBg = 2;
							setTimeout(function () {
								(0, _mintUi.Toast)({
									message: "上传成功",
									duration: 1000
								});
							}, 100);
							// } catch (err) {
							// alert(err)
							// }
						}, function (err) {
							// document.body.innerHTML = err.body
						});
					},
					fail: function fail(res) {
						// alert('uploadImage fail');
					}
				});
			}
		},
		uploads: function uploads(obj, positionType) {
			var _this7 = this;

			//上传多张图片
			wx.uploadImage({
				localId: obj.localId[this.i],
				success: function success(res) {
					obj.serverId.push(res.serverId);
					_this7.i++;
					_this7.$http.post(_this7.hostUrl + "/QiNiu/uploadPictureFromWeixin", { img: res.serverId, positionType: positionType }, { emulateJSON: true }).then(function (res) {
						// alert(JSON.stringify(res.body))
						_this7.img_brief.push({
							src: JSON.parse(res.body).data.imgUrlDisplay,
							explain: ""
						});
						_this7.previewImgs.push(JSON.parse(res.body).data.imgUrlDisplay);
					}, function (err) {
						// document.body.innerHTML = err.body
					});
					if (_this7.i < obj.localId.length) {
						_this7.uploads(obj, positionType);
					} else {
						// alert('上传完毕')
					}
				},
				fail: function fail(res) {
					// alert(JSON.stringify(res));
				}
			});
		},
		uploadImage: function uploadImage(obj, positionType, isBg) {
			// if (arr.localId.length == 0) {
			//   alert('请先使用 chooseImage 接口选择图片');
			//   return;
			// }
			// var i = 0, length = arr.localId.length;
			// var length = arr.localId.length;
			if (Array.isArray(obj.serverId)) {
				// obj.serverId = [];
			} else {
				obj.serverId = "";
			}
			this.upload(obj, positionType, isBg);
		},


		/* ================ pc上传图片 ==================== */

		//上传到七牛
		update: function update(e, images, bool) {
			var _this8 = this;

			var file = e;
			var d = new Date();
			var type = file.name.split(".");
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
				_this8.token = response.body.data;
				param.append("token", _this8.token);

				_this8.uploading(param, file.name, images, bool); //然后将参数上传七牛
				return;
			});
		},
		uploading: function uploading(param, pathName, images, bool) {
			var _this9 = this;

			this.$http.post("http://up-z2.qiniu.com", param, {
				emulateJSON: true
			}).then(function (response) {
				console.log('response.data', response.data);
				if (bool) {
					_this9.src_img = _this9.showUrl + response.data.key;
					(0, _mintUi.Toast)("上传成功");
				} else {
					var localArr = images.map(function (val, index, arr) {
						return arr[index].localSrc;
					});
					if (!~localArr.indexOf(pathName)) {
						images.push({
							src: _this9.showUrl + response.data.key,
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
				var files = e.target.files || e.dataTransfer.files;
				if (!files.length || this.previewImgs.length + files.length > 6) {
					(0, _mintUi.Toast)("图片不能超过六张");
					return;
				}
				this.createImage(files);
				for (var i = 0; i < files.length; i++) {
					var imgReg = /\.(gif|jpg|jpeg|png|GIF|JPG|PNG)$/;
					if (imgReg.test(files[i].name)) {
						this.update(files[i], this.img_brief, false);
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
					vm.previewImgs.push(e.target.result);
					console.log(vm.previewImgs);
				};
			}
		},

		//上传到七牛
		changeIcon: function changeIcon(e) {
			if (window.FileReader) {
				var files = e.target.files || e.dataTransfer.files;
				if (!files.length || files.length > 2) {
					(0, _mintUi.Toast)("只能选择一张图片噢");
					return;
				}
				var imgReg = /\.(gif|jpg|jpeg|png|GIF|JPG|PNG)$/;
				if (imgReg.test(files[0].name)) {
					this.update(files[0], this.src_img, true);
				} else {
					(0, _mintUi.Toast)('请上传图片');
				}
			}
		},

		/* ================    pc上传图片end       ======================*/

		setName: function setName() {
			this.textTmp = this.courseName;
			this.shownametext = true;
		},
		setPwd: function setPwd() {
			this.textTmp = this.coursePwd;
			this.showpwdtext = true;
		},
		setHost: function setHost() {
			this.textTmp = this.courseHost;
			this.showhosttext = true;
		},
		setHostInfo: function setHostInfo() {
			this.textTmp = this.courseHostInfo;
			this.showhostintrotext = true;
		},
		setLiveIntro: function setLiveIntro() {
			this.showCourseIntroduce = true;
			this.textTmp = this.liveintro;
			this.showMain = false;
		},
		changeName: function changeName() {
			if (this.textTmp.trim() == "") {
				(0, _mintUi.Toast)({
					message: "请输入课程名称",
					duration: 2000
				});
			} else if (this.$bytesLength(this.textTmp) > 50) {
				(0, _mintUi.Toast)({
					message: "课程名称不得超过25个汉字",
					duration: 2000
				});
			} else {
				this.shownametext = false;
				this.courseName = this.textTmp;
			}
		},
		confirmPlan: function confirmPlan() {
			//课程计划确定事件
			this.courseNum = this.tmpNum;
			this.isShowPlan = false;
		},
		changePwd: function changePwd() {
			if (this.textTmp == "") {
				(0, _mintUi.Toast)({
					message: "请设定密码",
					duration: 2000
				});
			} else if (!/^\w{4}$/.test(this.textTmp)) {
				(0, _mintUi.Toast)({
					message: "密码设置不符合要求",
					duration: 2000
				});
			} else {
				this.showpwdtext = false;
				this.coursePwd = this.textTmp;
			}
		},
		changeHost: function changeHost() {
			if (this.$bytesLength(this.textTmp) > 80) {
				(0, _mintUi.Toast)("填写主讲人不得超过40个汉字");
			} else {
				this.courseHost = this.textTmp;
				this.showhosttext = false;
			}
		},
		changeHostInfo: function changeHostInfo() {
			if (this.$bytesLength(this.textTmp) > 400) {
				(0, _mintUi.Toast)("主讲人介绍不得超过200个汉字");
			} else {
				this.courseHostInfo = this.textTmp;
				this.showhostintrotext = false;
			}
		},
		deleteImgBrief: function deleteImgBrief(i) {
			this.img_brief.splice(i, 1);
			this.previewImgs.splice(i, 1);
		},
		changeCourseIntro: function changeCourseIntro() {
			this.liveintro = this.textTmp;
			this.showCourseIntroduce = false;
			this.showMain = true;
			this.data.img_brief = [];
			(0, _mintUi.Toast)("已保存");
			for (var i = 0; i < this.img_brief.length; i++) {
				this.data.img_brief[i] = this.clone(this.img_brief[i]);
			}
		},
		cancelCourseIntro: function cancelCourseIntro() {
			this.showCourseIntroduce = false;
			this.showMain = true;
			for (var i = 0; i < this.data.img_brief.length; i++) {
				this.img_brief[i] = this.clone(this.data.img_brief[i]);
			}
		},
		uploadImgBrief: function uploadImgBrief() {
			var _this10 = this;

			//上传图片介绍
			this.imgIntros.localId = [];
			wx.chooseImage({
				count: 6 - this.img_brief.length, // 默认9
				sizeType: ["original", "compressed"], // 可以指定是原图还是压缩图，默认二者都有
				sourceType: ["album", "camera"], // 可以指定来源是相册还是相机，默认二者都有
				success: function success(res) {
					_this10.imgIntros.localId = _this10.imgIntros.localId.concat(res.localIds); // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
					// alert('已选择 ' + res.localIds.length + ' 张图片');
					// alert(this.images.localId);
					_this10.uploadImage(_this10.imgIntros, 22 + _this10.previewImgs.length);
					// ws.send(123123);
				}
			});
		},
		deleteCourse: function deleteCourse() {
			var _this11 = this;

			_mintUi.MessageBox.confirm("删除课程后，将无法恢复课程信息。确定要删除课程么？", "删除课程").then(function (action) {
				_this11.$http.post(_this11.hostUrl + "/CourseDetails/deleteCourse", { id: _this11.data.id }, { emulateJSON: true }).then(function (res) {
					console.log(res.body);
					if (res.body.code == 0) {
						_this11.$router.replace("/personalCenter");
					}
				});
			}, function (cancel) {});
		},
		send: function send() {
			var _this12 = this;

			// if (this.images.serverId.length > 0) {
			//   this.$http.post(this.hostUrl + '/QiNiu/uploadPictureFromWeixin', { img: this.images.serverId, positionType: 21 }, { emulateJSON: true }).then(res => {
			//     // alert(JSON.stringify(res.body))
			//   }, err => {
			//     // alert(JSON.stringify(err.body))
			//     // document.body.innerHTML = JSON.stringify(err.body)
			//   })
			// }
			if (this.uploadingBg == 1) {
				(0, _mintUi.Toast)({ message: "正在替换中，请稍后点击保存", duration: 1500 });
				return;
			}
			if (this.data.level == 2 && this.coursePrice < 1) {
				(0, _mintUi.Toast)('请输入课程金额');
				return;
			}
			this.$http.post(this.hostUrl + "/CourseDetails/editCourse", {
				id: +this.$route.params.classId,
				src_img: this.src_img,
				class_name: this.courseName.trim(),
				password: this.coursePwd,
				teacher_name: this.courseHost,
				lecturers: this.courseHostInfo,
				brief: this.liveintro,
				img_brief: this.img_brief,
				player_img: this.player_img, //'http://oqt46pvmm.bkt.clouddn.com/FnmwR7OF0SjNqLyMlg4j2WjDrAsO'
				price: this.coursePrice,
				plan_num: this.courseNum,
				class_sort: this.class_sort
			}, { emulateJSON: true }).then(function (res) {
				console.log(res.body);
				if (res.body.code == 0) {
					_this12.$router.push("/personalCenter/course/" + _this12.data.id + "&" + _this12.userId);
				}
			});
		}
	},
	watch: {
		showCourseIntroduce: function showCourseIntroduce(val) {
			this.paddingBottom = val ? 0 : 100;
			if (val) {
				if (this.data.class_type == 1 || this.data.class_type == 3) {
					//单课程、子课程
					this.updateTitle('课程介绍');
				} else if (this.data.class_type == 2) {
					//系列课
					this.updateTitle('系列课介绍');
				}
			} else {
				this.updateTitle('编辑课程');
			}
		},
		showSetSort: function showSetSort(val) {
			this.updateTitle(val ? "系列课话题排序" : "编辑系列课信息");
		},
		textTmp: function textTmp(val) {
			/*this.textTmp = val.replace(
   	/[\uD83C|\uD83D|\uD83E][\uDC00-\uDFFF][\u200D|\uFE0F]|[\uD83C|\uD83D|\uD83E][\uDC00-\uDFFF]|[0-9|*|#]\uFE0F\u20E3|[0-9|#]\u20E3|[\u203C-\u3299]\uFE0F\u200D|[\u203C-\u3299]\uFE0F|[\u2122-\u2B55]|\u303D|[\A9|\AE]\u3030|\uA9|\uAE|\u3030/gi,
   	""
   );*/
			var reg = /[^\d|\D|\W|A-z|\u4E00-\u9FFF]/ig; //汉字、数字、英文、标点（实质上是过滤表情）
			this.textTmp = val.replace(reg, '');
		},
		tmpNum: function tmpNum(val) {
			//限制只能输入数字
			this.tmpNum = val.replace(/[^0-9]/ig, "");
		},
		coursePrice: function coursePrice(val, oldVal) {
			//固定设置最多六位数和两位小数
			if (val >= 1000000) {
				this.coursePrice = oldVal;
			} else if (val < 1) {
				this.coursePrice = null;
			}
			var arr = (val + '').split('.');
			if (arr.length > 1 && arr[1].length > 2) {
				this.coursePrice = oldVal;
			}
		}
		//       textTmp(val){
		// //    	this.textTmp = val.replace(/\W|[_]/ig,'');//输入框只能输入数字和字母
		//           this.textTmp = val.replace(/[^a-zA-Z0-9]/ig,'');//只能输入数字和字母
		//       }

	},
	directives: {
		numberOnly: {
			//限制只能输入整数，不能输入小数
			bind: function bind(el) {

				el.handler = function () {
					el.value = el.value.replace(/[^0-9]/g, "");
				};
				el.addEventListener("input", el.handler);
			},
			unbind: function unbind(el) {
				el.removeEventListener("input", el.handler);
			}
		}
	},
	components: {
		nomore: _nomore2.default
	}
};
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(99)))

/***/ }),

/***/ 967:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.courseSettings {\n  background-color: #F5F7F8;\n  min-height: 100%;\n  box-sizing: border-box;\n  -webkit-overflow-scrolling: touch;\n  padding-bottom: 2rem;\n  position: relative;\n  /*===================================================*/\n  /*.btns {\n            position: fixed;\n            width: 100%;\n            box-sizing: border-box;\n            padding: 5%;\n            left: 0;\n            bottom: 0;\n            height: 2rem;\n            display: flex;\n            justify-content: space-between;\n            background-color: #f0f0f0;\n            margin-bottom: 0;\n            a {\n                width: 45%;\n                text-align: center;\n                height: .94rem;\n                line-height: .9rem;\n                box-sizing: border-box;\n                font-size: .36rem;\n                border-radius: .1rem;\n                &:first-child {\n                    color: #999;\n                    border: 1px solid #b2b2b2;\n                }\n                &:last-child {\n                    color: #fff;\n                    background-color: #c62f2f;\n                }\n            }\n        }*/\n}\n.courseSettings .header-bg {\n    background: #ffffff;\n    margin-bottom: .24rem;\n    position: relative;\n}\n.courseSettings .header-bg img {\n      width: 100%;\n      height: 3.22rem;\n}\n.courseSettings .header-bg div {\n      height: 1rem;\n      line-height: 1rem;\n      font-size: .36rem;\n      color: #c62f2f;\n      text-align: center;\n}\n.courseSettings .header-bg input {\n      position: absolute;\n      bottom: 0;\n      left: 0;\n      width: 100%;\n      height: 1rem;\n      opacity: 0;\n}\n.courseSettings .class-name {\n    background: #ffffff;\n    padding: .24rem .24rem 0 .24rem;\n    margin-bottom: .24rem;\n}\n.courseSettings .class-name p {\n      font-size: .24rem;\n      color: #353535;\n}\n.courseSettings .class-name input {\n      font-size: .32rem;\n      color: #353535;\n      border-bottom: 1px solid #e8e8e8;\n      width: 100%;\n      padding: .3rem .24rem;\n      box-sizing: border-box;\n}\n.courseSettings .class-name input::-webkit-input-placeholder {\n        color: #888888;\n        font-size: .32rem;\n}\n.courseSettings .class-time {\n    padding: 0 .24rem;\n    background: #ffffff;\n    overflow: hidden;\n    margin-bottom: .24rem;\n}\n.courseSettings .class-time .time > p {\n      font-size: .24rem;\n      color: #353535;\n      margin-top: .24rem;\n}\n.courseSettings .class-time .time > div {\n      width: 100%;\n      border-bottom: 1px solid #e8e8e8;\n      position: relative;\n      padding: .3rem 0 .3rem .24rem;\n      box-sizing: border-box;\n      font-size: .32rem;\n      color: #353535;\n}\n.courseSettings .class-time .time > div::after {\n        content: '';\n        display: inline-block;\n        position: absolute;\n        top: .3rem;\n        right: .24rem;\n        width: .36rem;\n        height: .36rem;\n        background: url(\"/images/3.0/dajiahao.png\") no-repeat 100%/100%;\n}\n.courseSettings .class-time .arrow > p {\n      font-size: .24rem;\n      color: #353535;\n      margin-top: .24rem;\n}\n.courseSettings .class-time .arrow > div {\n      width: 100%;\n      border-bottom: 1px solid #e8e8e8;\n      position: relative;\n      padding: .3rem 0 .3rem .24rem;\n      box-sizing: border-box;\n      font-size: .32rem;\n      color: #353535;\n}\n.courseSettings .class-time .arrow > div::after {\n        content: '';\n        display: inline-block;\n        position: absolute;\n        top: .3rem;\n        right: .24rem;\n        width: .36rem;\n        height: .36rem;\n        background: url(\"/images/3.0/dajiahao.png\") no-repeat 100%/100%;\n}\n.courseSettings .class-video {\n    padding: 0 .24rem;\n    background: #ffffff;\n    overflow: hidden;\n    margin-bottom: .24rem;\n}\n.courseSettings .class-video > p {\n      font-size: .24rem;\n      color: #353535;\n      margin-top: .24rem;\n}\n.courseSettings .class-video .upload-btn {\n      background: #ffffff;\n      padding-left: .24rem;\n      padding-bottom: .38rem;\n      padding-top: .32rem;\n      min-height: 1.46rem;\n      overflow: hidden;\n}\n.courseSettings .class-video .upload-btn .left {\n        width: 2.6rem;\n        height: 1.46rem;\n        margin-right: 0.24rem;\n        float: left;\n        background: #f5f7f8 url(\"/images/12-2.png\") no-repeat center center;\n        background-size: .34rem .32rem;\n}\n.courseSettings .class-video .upload-btn .left img {\n          width: 2.6rem;\n          height: 1.46rem;\n}\n.courseSettings .class-video .upload-btn .right h4 {\n        color: #c62f2f;\n        font-size: .32rem;\n        margin-bottom: .1rem;\n        margin-top: .2rem;\n}\n.courseSettings .class-video .upload-btn .right p {\n        font-size: .24rem;\n        color: #b2b2b2;\n        line-height: .3rem;\n}\n.courseSettings .class-video-stream {\n    padding: .4rem .24rem;\n    background: #ffffff;\n    overflow: hidden;\n    margin-bottom: .24rem;\n}\n.courseSettings .class-video-stream > p {\n      font-size: .24rem;\n      color: #353535;\n}\n.courseSettings .class-video-stream > h4 {\n      font-size: .3rem;\n      color: #c62f2f;\n      margin: .24rem 0;\n      text-decoration: underline;\n      line-height: .4rem;\n}\n.courseSettings .class-video-stream > h5 {\n      font-size: .24rem;\n      color: #b2b2b2;\n}\n.courseSettings .btns {\n    position: fixed;\n    width: 100%;\n    box-sizing: border-box;\n    left: 0;\n    bottom: 0;\n    height: 1rem;\n    display: -webkit-box;\n    display: -webkit-flex;\n    display: -ms-flexbox;\n    display: flex;\n    -webkit-box-pack: justify;\n    -webkit-justify-content: space-between;\n        -ms-flex-pack: justify;\n            justify-content: space-between;\n    background-color: #f0f0f0;\n    margin-bottom: 0;\n    display: flex;\n    background: #c62f2f;\n}\n.courseSettings .btns a {\n      -webkit-box-flex: 1;\n      -webkit-flex: 1;\n          -ms-flex: 1;\n              flex: 1;\n      text-align: center;\n      height: 1rem;\n      line-height: 1rem;\n      box-sizing: border-box;\n      font-size: .36rem;\n      color: #ffffff;\n      position: relative;\n}\n.courseSettings .btns a:first-child::before {\n        content: '';\n        width: 1px;\n        height: .6rem;\n        background: #E7E6E6;\n        display: inline-block;\n        position: absolute;\n        right: 0;\n        top: .2rem;\n}\n.courseSettings .mint-cell:last-child,\n  .courseSettings .mint-cell-wrapper {\n    background-image: none;\n}\n.courseSettings > div {\n    margin-bottom: .3rem;\n}\n.courseSettings > div > div {\n      border-bottom: 1px solid #f0f0f0;\n}\n.courseSettings > div > div:last-child {\n        border-bottom: none;\n}\n.courseSettings .sprite:before {\n    background-size: 7.5rem auto;\n    -webkit-transform: none;\n        -ms-transform: none;\n            transform: none;\n}\n.courseSettings .set-bg {\n    position: relative;\n}\n.courseSettings .set-bg .iconpc {\n      position: absolute;\n      top: 0;\n      height: 0.88rem;\n      width: 100%;\n      opacity: 0;\n      left: 0;\n}\n.courseSettings .mint-cell {\n    height: 1.1rem;\n    font-size: .32rem;\n}\n.courseSettings .mint-cell .mint-cell-wrapper {\n      height: 1.1rem;\n      padding: 0 .3rem;\n}\n.courseSettings .mint-cell .mint-cell-title {\n      color: #666;\n      -webkit-box-flex: 0;\n      -webkit-flex: none;\n          -ms-flex: none;\n              flex: none;\n      min-width: 1.6rem;\n}\n.courseSettings .mint-cell .mint-cell-value {\n      color: #666;\n      -webkit-box-flex: 1;\n      -webkit-flex: 1;\n          -ms-flex: 1;\n              flex: 1;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-pack: end;\n      -webkit-justify-content: flex-end;\n          -ms-flex-pack: end;\n              justify-content: flex-end;\n}\n.courseSettings .course-type .mint-cell-value {\n    color: #666666;\n}\n.courseSettings .upload {\n    margin-top: .3rem;\n    position: relative;\n}\n.courseSettings .upload .imgpc {\n      position: absolute;\n      top: 0;\n      height: 0.88rem;\n      width: 100%;\n      opacity: 0;\n      left: 0;\n}\n.courseSettings .courseIntroduce {\n    position: absolute;\n    top: 0;\n    left: 0;\n    width: 100%;\n    min-height: 100%;\n    z-index: 1000;\n    background-color: #f0f0f0;\n    box-sizing: border-box;\n    margin-bottom: 0;\n    padding-bottom: 1.7rem;\n    overflow: auto;\n    -webkit-overflow-scrolling: touch;\n}\n.courseSettings .courseIntroduce textarea {\n      resize: none;\n      width: 100%;\n      display: block;\n      box-sizing: border-box;\n      color: #666;\n}\n.courseSettings .courseIntroduce > textarea {\n      height: 3.2rem;\n      padding: .24rem;\n      font-size: .32rem;\n      color: #666;\n      margin-bottom: .3rem;\n}\n.courseSettings .courseIntroduce .info {\n      background-color: #fff;\n      padding: .24rem;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n      margin-bottom: .1rem;\n      position: relative;\n}\n.courseSettings .courseIntroduce .info span {\n        position: absolute;\n        top: .1rem;\n        right: .1rem;\n        width: 0.72rem;\n        height: 0.38rem;\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-pack: center;\n        -webkit-justify-content: center;\n            -ms-flex-pack: center;\n                justify-content: center;\n        -webkit-box-align: center;\n        -webkit-align-items: center;\n            -ms-flex-align: center;\n                align-items: center;\n}\n.courseSettings .courseIntroduce .info span.sprite:before {\n          width: .38rem;\n          height: .38rem;\n          background-position: -0.78rem -3.01rem;\n}\n.courseSettings .courseIntroduce .info img {\n        width: 2.04rem;\n        height: 2.04rem;\n        border-radius: .16rem;\n        margin-right: .24rem;\n}\n.courseSettings .courseIntroduce .info textarea {\n        -webkit-box-flex: 1;\n        -webkit-flex: 1;\n            -ms-flex: 1;\n                flex: 1;\n        height: 2.04rem;\n}\n.courseSettings .courseIntroduce .upload a {\n      display: block;\n      width: 100%;\n      background-color: #000;\n      text-align: center;\n      padding-bottom: .3rem;\n}\n.courseSettings .courseIntroduce .upload a p:first-child {\n        font-size: .32rem;\n        color: #c62f2f;\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-pack: center;\n        -webkit-justify-content: center;\n            -ms-flex-pack: center;\n                justify-content: center;\n        -webkit-box-align: center;\n        -webkit-align-items: center;\n            -ms-flex-align: center;\n                align-items: center;\n        line-height: .88rem;\n}\n.courseSettings .courseIntroduce .upload a p:first-child span {\n          line-height: 1;\n}\n.courseSettings .courseIntroduce .upload a p:first-child span:before {\n            width: .38rem;\n            height: .38rem;\n            background-position: -4.7rem -1.1rem;\n}\n.courseSettings .courseIntroduce .upload a p:last-child {\n        font-size: .26rem;\n        color: #999;\n        line-height: 1;\n}\n.courseSettings .courseIntroduce .btn {\n      position: absolute;\n      bottom: .64rem;\n      left: 50%;\n      width: 80%;\n      -webkit-transform: translateX(-50%);\n          -ms-transform: translateX(-50%);\n              transform: translateX(-50%);\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-pack: justify;\n      -webkit-justify-content: space-between;\n          -ms-flex-pack: justify;\n              justify-content: space-between;\n      box-sizing: border-box;\n}\n.courseSettings .courseIntroduce .btn a {\n        display: block;\n        line-height: .9rem;\n        font-size: 36rem;\n        width: 45%;\n        text-align: center;\n        border-radius: .16rem;\n}\n.courseSettings .courseIntroduce .btn a:first-child {\n          box-sizing: border-box;\n          border: 1px solid #b2b2b2;\n          color: #999999;\n}\n.courseSettings .courseIntroduce .btn a:last-child {\n          background-color: #c62f2f;\n          color: #fff;\n}\n.courseSettings .popup {\n    width: 85%;\n    border-radius: 3px;\n    overflow: hidden;\n    background-color: #fff;\n}\n.courseSettings .popup .title {\n      padding-top: .3rem;\n      font-size: .32rem;\n      color: #333;\n      text-align: center;\n}\n.courseSettings .popup .msgcontent {\n      padding: .2rem .4rem .3rem;\n      min-height: .72rem;\n      position: relative;\n}\n.courseSettings .popup .msgcontent textarea {\n        background-color: #f0f0f0;\n        border-radius: .16rem;\n        padding: .3rem .28rem;\n        box-sizing: border-box;\n        height: 2.5rem;\n        color: #666;\n        font-size: .3rem;\n        resize: none;\n        width: 100%;\n}\n.courseSettings .popup .msgbtns {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      height: 1.32rem;\n      line-height: .9rem;\n}\n.courseSettings .popup .msgbtns a {\n        border-radius: .1rem;\n        height: .9rem;\n        font-size: .36rem;\n        line-height: .9rem;\n        width: 45%;\n        box-sizing: border-box;\n        text-align: center;\n}\n.courseSettings .popup .msgbtns a:first-child {\n          margin-left: .4rem;\n          margin-right: .28rem;\n          color: #999;\n          border: 1px solid #b2b2b2;\n}\n.courseSettings .popup .msgbtns a:last-child {\n          color: #fff;\n          background-color: #c62f2f;\n          margin-left: .28rem;\n          margin-right: .4rem;\n}\n.courseSettings .course-vedio {\n    background: #ffffff;\n}\n.courseSettings .course-vedio .word {\n      padding: 15px;\n}\n.courseSettings .course-vedio .word h2 {\n        font-size: .32rem;\n        color: #666666;\n}\n.courseSettings .course-vedio .word h5 {\n        color: #c62f2f;\n        font-size: .3rem;\n        text-decoration: underline;\n        margin: .2rem 0;\n}\n.courseSettings .course-vedio .word p {\n        color: #b2b2b2;\n        font-size: .24rem;\n}\n.series-course-setting {\n  position: relative;\n  padding-bottom: 1rem;\n  background: #F5F7F8;\n  /*=================================================*/\n}\n.series-course-setting .header-bg {\n    background: #ffffff;\n    margin-bottom: .24rem;\n    position: relative;\n}\n.series-course-setting .header-bg img {\n      width: 100%;\n      height: 3.22rem;\n}\n.series-course-setting .header-bg div {\n      height: 1rem;\n      line-height: 1rem;\n      font-size: .36rem;\n      color: #c62f2f;\n      text-align: center;\n}\n.series-course-setting .header-bg input {\n      position: absolute;\n      bottom: 0;\n      left: 0;\n      width: 100%;\n      height: 1rem;\n      opacity: 0;\n}\n.series-course-setting .class-name {\n    background: #ffffff;\n    padding: .24rem .24rem 0 .24rem;\n    margin-bottom: .24rem;\n}\n.series-course-setting .class-name p {\n      font-size: .24rem;\n      color: #353535;\n}\n.series-course-setting .class-name input {\n      font-size: .32rem;\n      color: #353535;\n      border-bottom: 1px solid #e8e8e8;\n      width: 100%;\n      padding: .3rem .24rem;\n      box-sizing: border-box;\n}\n.series-course-setting .class-name input::-webkit-input-placeholder {\n        color: #888888;\n        font-size: .32rem;\n}\n.series-course-setting .class-time {\n    padding: 0 .24rem;\n    background: #ffffff;\n    overflow: hidden;\n    margin-bottom: .24rem;\n}\n.series-course-setting .class-time p {\n      font-size: .24rem;\n      color: #353535;\n      margin-top: .24rem;\n}\n.series-course-setting .class-time div {\n      width: 100%;\n      border-bottom: 1px solid #e8e8e8;\n      position: relative;\n      padding: .3rem 0 .3rem .24rem;\n      box-sizing: border-box;\n      font-size: .32rem;\n      color: #353535;\n}\n.series-course-setting .class-time .time div::after {\n      content: '';\n      display: inline-block;\n      position: absolute;\n      top: .3rem;\n      right: .24rem;\n      width: .36rem;\n      height: .36rem;\n      background: url(\"/images/3.0/dajiahao.png\") no-repeat 100%/100%;\n}\n.series-course-setting .class-time .arrow > p {\n      font-size: .24rem;\n      color: #353535;\n      margin-top: .24rem;\n}\n.series-course-setting .class-time .arrow > div {\n      width: 100%;\n      border-bottom: 1px solid #e8e8e8;\n      position: relative;\n      padding: .3rem 0 .3rem .24rem;\n      box-sizing: border-box;\n      font-size: .32rem;\n      color: #353535;\n}\n.series-course-setting .class-time .arrow > div::after {\n        content: '';\n        display: inline-block;\n        position: absolute;\n        top: .3rem;\n        right: .24rem;\n        width: .36rem;\n        height: .36rem;\n        background: url(\"/images/3.0/dajiahao.png\") no-repeat 100%/100%;\n}\n.series-course-setting .class-price {\n    padding: 0 .24rem;\n    background: #ffffff;\n    overflow: hidden;\n    margin-bottom: .24rem;\n}\n.series-course-setting .class-price p {\n      font-size: .24rem;\n      color: #353535;\n      margin-top: .24rem;\n}\n.series-course-setting .class-price section {\n      padding: .3rem .24rem;\n      border-bottom: 1px solid #e8e8e8;\n}\n.series-course-setting .class-price input {\n      font-size: .32rem;\n      color: #353535;\n      box-sizing: border-box;\n}\n.series-course-setting .class-price i {\n      float: right;\n      font-size: .32rem;\n      color: #c62f2f;\n}\n.series-course-setting .class-sort {\n    color: #c62f2f;\n    margin-bottom: .24rem;\n}\n.series-course-setting .class-sort .mint-cell {\n      height: 1rem;\n      line-height: 1rem;\n}\n.series-course-setting .save-btn {\n    width: 100%;\n    height: 1rem;\n    background: #c62f2f;\n    color: #ffffff;\n    font-size: .32rem;\n    line-height: 1rem;\n    text-align: center;\n    position: fixed;\n    bottom: 0;\n    left: 0;\n}\n.series-course-setting .save-btn-assi {\n    width: 100%;\n    height: 1rem;\n    line-height: 1rem;\n    color: #ffffff;\n    text-align: center;\n    font-size: .32rem;\n    display: -webkit-box;\n    display: -webkit-flex;\n    display: -ms-flexbox;\n    display: flex;\n    position: fixed;\n    bottom: 0;\n    left: 0;\n}\n.series-course-setting .save-btn-assi > a:first-child {\n      background: #666666;\n      -webkit-box-flex: 1;\n      -webkit-flex: 1;\n          -ms-flex: 1;\n              flex: 1;\n}\n.series-course-setting .save-btn-assi > a:last-child {\n      background: #c62f2f;\n      -webkit-box-flex: 4;\n      -webkit-flex: 4;\n          -ms-flex: 4;\n              flex: 4;\n}\n.series-course-setting .sprite:before {\n    background-size: 7.5rem auto;\n    -webkit-transform: none;\n        -ms-transform: none;\n            transform: none;\n}\n.series-course-setting header {\n    padding: .44rem .4rem;\n    border-bottom: .2rem solid #f0f0f0;\n    position: relative;\n}\n.series-course-setting header .iconpc {\n      position: absolute;\n      bottom: 0;\n      height: 0.88rem;\n      width: 100%;\n      opacity: 0;\n      left: 0;\n}\n.series-course-setting header section {\n      width: 100%;\n      height: 2.14rem;\n      background: url(\"/images/series-herder.png\") no-repeat center center;\n      background-size: cover;\n      border-radius: 0.08rem;\n      position: relative;\n}\n.series-course-setting header section img {\n        border-radius: 0.08rem;\n        width: 100%;\n        height: 100%;\n}\n.series-course-setting header section p {\n        height: .62rem;\n        width: 100%;\n        line-height: .62rem;\n        font-size: .28rem;\n        color: #ffffff;\n        text-align: center;\n        background: rgba(0, 0, 0, 0.5);\n        position: absolute;\n        left: 0;\n        bottom: 0;\n        border-bottom-left-radius: 4px;\n        border-bottom-right-radius: 4px;\n}\n.series-course-setting .setting > section {\n    border-bottom: 1px solid #f0f0f0;\n}\n.series-course-setting .setting .mint-cell {\n    height: 1.12rem;\n    line-height: 1.12rem;\n    background-image: none;\n}\n.series-course-setting .setting .mint-cell .mint-cell-wrapper {\n      line-height: inherit;\n      padding: 0 .3rem;\n      color: #666666;\n      font-size: .32rem;\n      background-image: none;\n}\n.series-course-setting .set-price {\n    height: 1.1rem;\n    text-align: center;\n    color: #fb4040;\n    font-size: .3rem;\n    line-height: 1.1rem;\n}\n.series-course-setting .set-price input {\n      color: #fb4040;\n      text-align: center;\n      font-size: .3rem;\n      width: 2rem;\n      height: 1rem;\n}\n.settings {\n  background: #F5F7F8;\n  min-height: 100%;\n}\n.settings .sprite:before {\n    background-size: 7.5rem auto;\n    -webkit-transform: none;\n        -ms-transform: none;\n            transform: none;\n}\n.settings .popup {\n    width: 85%;\n    border-radius: 3px;\n    overflow: hidden;\n    background-color: #fff;\n}\n.settings .popup .title {\n      padding-top: .3rem;\n      font-size: .32rem;\n      color: #333;\n      text-align: center;\n}\n.settings .popup .msgcontent {\n      padding: .2rem .4rem .3rem;\n      min-height: .72rem;\n      position: relative;\n}\n.settings .popup .msgcontent textarea {\n        background-color: #f0f0f0;\n        border-radius: .16rem;\n        padding: .3rem  .28rem;\n        box-sizing: border-box;\n        height: 2.5rem;\n        color: #666;\n        font-size: .3rem;\n        resize: none;\n        width: 100%;\n}\n.settings .popup .msgbtns {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      height: 1.32rem;\n      line-height: .9rem;\n}\n.settings .popup .msgbtns a {\n        border-radius: .1rem;\n        height: .9rem;\n        font-size: .36rem;\n        line-height: .9rem;\n        width: 45%;\n        box-sizing: border-box;\n        text-align: center;\n}\n.settings .popup .msgbtns a:first-child {\n          margin-left: .4rem;\n          margin-right: .28rem;\n          color: #999;\n          border: 1px solid #b2b2b2;\n}\n.settings .popup .msgbtns a:last-child {\n          color: #fff;\n          background-color: #c62f2f;\n          margin-left: .28rem;\n          margin-right: .4rem;\n}\n.settings .coursePlan {\n    width: 76%;\n    border-radius: 0.08rem;\n    padding: .32rem .44rem;\n}\n.settings .coursePlan h4 {\n      font-size: .32rem;\n      text-align: center;\n      color: #333333;\n}\n.settings .coursePlan .num {\n      text-align: center;\n      width: 100%;\n      height: .9rem;\n      border-radius: 4px;\n      background: #f0f0f0;\n      line-height: .9rem;\n      margin: .56rem 0;\n}\n.settings .coursePlan .num input {\n        text-align: center;\n        font-size: .3rem;\n        width: 80%;\n        background: #f0f0f0;\n}\n.settings .coursePlan .num input::-webkit-input-placeholder {\n          color: #666;\n}\n.settings .coursePlan .btn-area button {\n      width: 44%;\n      height: .9rem;\n      line-height: .9rem;\n}\n.settings .coursePlan .btn-area .mint-button--default {\n      color: #999 !important;\n      border-color: #999 !important;\n      background: #fff;\n}\n.settings .coursePlan .btn-area .mint-button--primary {\n      float: right;\n      background: #c62f2f;\n}\n.settings .upload {\n    margin-top: 15px;\n    position: relative;\n}\n.settings .upload .imgpc {\n      position: absolute;\n      top: 0;\n      height: 0.88rem;\n      width: 100%;\n      opacity: 0;\n      left: 0;\n}\n.settings .courseIntroduce {\n    position: absolute;\n    top: 0;\n    left: 0;\n    width: 100%;\n    min-height: 100%;\n    z-index: 1000;\n    background-color: #F5F7F8;\n    box-sizing: border-box;\n    margin-bottom: 0;\n    padding-bottom: 1.7rem;\n    overflow: auto;\n    -webkit-overflow-scrolling: touch;\n    /*.upload a {\n                display: block;\n                width: 100%;\n                background-color: #fff;\n                text-align: center;\n                padding-bottom: .3rem;\n                p:first-child {\n                    font-size: .32rem;\n                    color: #333;\n                    display: flex;\n                    justify-content: center;\n                    align-items: center;\n                    line-height: .88rem;\n                    span {\n                        line-height: 1;\n                        &:before {\n                            width: .38rem;\n                            height: .38rem;\n                            background-position: -4.7rem -1.1rem;\n                        }\n                    }\n                }\n                p:last-child {\n                    font-size: .26rem;\n                    color: #999;\n                    line-height: 1;\n                }\n            }*/\n}\n.settings .courseIntroduce .intro-word {\n      background: #ffffff;\n      margin-bottom: .24rem;\n      padding: .4rem .24rem;\n}\n.settings .courseIntroduce .intro-word p {\n        font-size: .24rem;\n        color: #353535;\n}\n.settings .courseIntroduce .intro-word textarea {\n        padding: .3rem .24rem 0 .24rem;\n        width: 100%;\n        box-sizing: border-box;\n        resize: none;\n        font-size: .28rem;\n        color: #353535;\n}\n.settings .courseIntroduce .intro-word textarea ::-webkit-input-placeholder {\n          color: #888888;\n          font-size: .28rem;\n}\n.settings .courseIntroduce .intro-container {\n      -webkit-box-flex: 1;\n      -webkit-flex: 1;\n          -ms-flex: 1;\n              flex: 1;\n      width: 100%;\n}\n.settings .courseIntroduce .intro-container .title {\n        font-size: .24rem;\n        color: #353535;\n        padding: .4rem .24rem .16rem .24rem;\n        background: #ffffff;\n}\n.settings .courseIntroduce .intro-container .info {\n        background-color: #fff;\n        padding: 0 .48rem;\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-align: center;\n        -webkit-align-items: center;\n            -ms-flex-align: center;\n                align-items: center;\n        position: relative;\n        padding-bottom: .24rem;\n}\n.settings .courseIntroduce .intro-container .info span {\n          position: absolute;\n          top: 0;\n          left: 2.72rem;\n          width: 0.36rem;\n          height: 0.36rem;\n          background: url(\"/images/3.0/close-01.png\") no-repeat center center;\n          background-size: 100% 100%;\n}\n.settings .courseIntroduce .intro-container .info img {\n          width: 2.6rem;\n          height: 1.46rem;\n          margin-right: 0.24rem;\n}\n.settings .courseIntroduce .intro-container .info textarea {\n          -webkit-box-flex: 1;\n          -webkit-flex: 1;\n              -ms-flex: 1;\n                  flex: 1;\n          height: 1.46rem;\n          resize: none;\n          padding: 0;\n          font-size: .28rem;\n          color: #353535;\n}\n.settings .courseIntroduce .intro-container .info textarea ::-webkit-input-placeholder {\n            color: #888888;\n            font-size: .28rem;\n}\n.settings .courseIntroduce .intro-container .upload-btn {\n        background: #ffffff;\n        padding-left: .48rem;\n        padding-bottom: .4rem;\n        min-height: 1.46rem;\n        overflow: hidden;\n        margin-bottom: .24rem;\n        position: relative;\n}\n.settings .courseIntroduce .intro-container .upload-btn .left {\n          width: 2.6rem;\n          height: 1.46rem;\n          margin-right: 0.24rem;\n          float: left;\n          background: #f5f7f8 url(\"/images/12-2.png\") no-repeat center center;\n          background-size: .34rem .32rem;\n}\n.settings .courseIntroduce .intro-container .upload-btn .right h4 {\n          color: #c62f2f;\n          font-size: .32rem;\n          margin-bottom: .1rem;\n          margin-top: .2rem;\n}\n.settings .courseIntroduce .intro-container .upload-btn .right p {\n          font-size: .24rem;\n          color: #b2b2b2;\n          line-height: .3rem;\n}\n.settings .courseIntroduce .intro-container .upload-btn .imgpc {\n          position: absolute;\n          top: 0;\n          height: 100%;\n          width: 100%;\n          opacity: 0;\n          left: 0;\n}\n.settings .courseIntroduce .btns {\n      position: fixed;\n      width: 100%;\n      box-sizing: border-box;\n      left: 0;\n      bottom: 0;\n      height: 1rem;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-pack: justify;\n      -webkit-justify-content: space-between;\n          -ms-flex-pack: justify;\n              justify-content: space-between;\n      background-color: #f0f0f0;\n      margin-bottom: 0;\n      display: flex;\n      background: #c62f2f;\n}\n.settings .courseIntroduce .btns a {\n        -webkit-box-flex: 1;\n        -webkit-flex: 1;\n            -ms-flex: 1;\n                flex: 1;\n        text-align: center;\n        height: 1rem;\n        line-height: 1rem;\n        box-sizing: border-box;\n        font-size: .36rem;\n        color: #ffffff;\n        position: relative;\n}\n.settings .courseIntroduce .btns a:first-child::before {\n          content: '';\n          width: 1px;\n          height: .6rem;\n          background: #E7E6E6;\n          display: inline-block;\n          position: absolute;\n          right: 0;\n          top: .2rem;\n}\n.settings .courseIntroduce .btn {\n      position: absolute;\n      bottom: .64rem;\n      left: 50%;\n      width: 80%;\n      -webkit-transform: translateX(-50%);\n          -ms-transform: translateX(-50%);\n              transform: translateX(-50%);\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-pack: justify;\n      -webkit-justify-content: space-between;\n          -ms-flex-pack: justify;\n              justify-content: space-between;\n      box-sizing: border-box;\n}\n.settings .courseIntroduce .btn a {\n        display: block;\n        line-height: .9rem;\n        font-size: .36rem;\n        width: 45%;\n        text-align: center;\n        border-radius: 0.16rem;\n}\n.settings .courseIntroduce .btn a:first-child {\n          box-sizing: border-box;\n          border: 1px solid #b2b2b2;\n          color: #999999;\n}\n.settings .courseIntroduce .btn a:last-child {\n          background-color: #c62f2f;\n          color: #fff;\n}\n.settings .set-sort {\n    position: absolute;\n    top: 0;\n    left: 0;\n    width: 100%;\n    min-height: 100%;\n    z-index: 1000;\n    background-color: #f0f0f0;\n    box-sizing: border-box;\n    margin-bottom: 0;\n    padding-bottom: 1.1rem;\n    overflow: auto;\n    -webkit-overflow-scrolling: touch;\n}\n.settings .set-sort header {\n      padding: .26rem;\n      color: #666666;\n      font-size: .3rem;\n      line-height: .44rem;\n}\n.settings .set-sort .sub-list {\n      background: #ffffff;\n      padding-left: .26rem;\n}\n.settings .set-sort .sub-list li {\n        padding: .26rem .26rem .26rem 0;\n        border-bottom: 1px solid #ebebeb;\n}\n.settings .set-sort .sub-list li img {\n          float: left;\n          width: 1.1rem;\n          height: 1.1rem;\n          border-radius: 4px;\n          margin-right: .26rem;\n}\n.settings .set-sort .sub-list li > section {\n          display: -webkit-box;\n          display: -webkit-flex;\n          display: -ms-flexbox;\n          display: flex;\n          margin-top: .2rem;\n}\n.settings .set-sort .sub-list li > section h4 {\n            font-size: .32rem;\n            color: #333333;\n            -webkit-box-flex: 9;\n            -webkit-flex: 9;\n                -ms-flex: 9;\n                    flex: 9;\n            line-height: .64rem;\n            overflow: hidden;\n            white-space: nowrap;\n            text-overflow: ellipsis;\n}\n.settings .set-sort .sub-list li > section input {\n            -webkit-box-flex: 1;\n            -webkit-flex: 1;\n                -ms-flex: 1;\n                    flex: 1;\n            border: 1px solid #cccccc;\n            min-width: .8rem;\n            min-height: .6rem;\n            border-radius: 3px;\n            text-align: center;\n            color: #999;\n}\n.settings .set-sort .sub-list li > section input.focus {\n              color: #c62f2f;\n              border-color: #c62f2f;\n}\n.settings .set-sort .null h4 {\n      font-size: .34rem;\n      text-align: center;\n      padding: .8rem 0;\n      color: #666666;\n}\n.settings .set-sort .save-btn {\n      height: .98rem;\n      width: 100%;\n      position: fixed;\n      bottom: 0;\n      left: 0;\n      line-height: .98rem;\n      color: #ffffff;\n      background: #c62f2f;\n      text-align: center;\n      font-size: .32rem;\n}\n.mint-msgbox .liveicon img {\n  width: 2.48rem;\n  height: 2.48rem;\n  border-radius: .1rem;\n}\n.mint-msgbox .mint-msgbox-content {\n  border-bottom: none;\n}\n.mint-msgbox .mint-msgbox-title {\n  font-weight: normal;\n  color: #333;\n  font-size: .32rem;\n}\n.mint-msgbox .mint-msgbox-btns {\n  height: 1.32rem;\n  line-height: .9rem;\n}\n.mint-msgbox .mint-msgbox-btn {\n  border-radius: .1rem;\n  height: .9rem;\n  border-right: none;\n  font-size: .36rem;\n}\n.mint-msgbox .mint-msgbox-btn:first-child {\n    margin-left: .4rem;\n    margin-right: .28rem;\n}\n.mint-msgbox .mint-msgbox-btn:last-child {\n    margin-left: .28rem;\n    margin-right: .4rem;\n}\n.mint-msgbox .mint-msgbox-cancel {\n  color: #999999;\n  border: 1px solid #b2b2b2;\n}\n.mint-msgbox .mint-msgbox-confirm {\n  color: #fff;\n  background-color: #c62f2f;\n}\n.mint-toast {\n  z-index: 9999;\n}\n", ""]);

// exports


/***/ })

});