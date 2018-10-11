webpackJsonp([10],{

/***/ 1079:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "/images/indistinct_bg2.jpg";

/***/ }),

/***/ 1138:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('main', {
    staticClass: "publicOnlive-main"
  }, [_c('div', {
    staticClass: "publicOnlivePage"
  }, [_c('section', {
    staticStyle: {
      "position": "fixed",
      "top": "0",
      "width": "100%",
      "z-index": "111"
    }
  }, [_c('div', {
    staticClass: "video"
  }, [_c('div', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.isVideoBution == 0),
      expression: "isVideoBution==0"
    }],
    staticClass: "videoDom"
  }, [_c('div', {
    attrs: {
      "id": "videoPlayer"
    }
  })]), _vm._v(" "), _c('span', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.videoPoster && !_vm.videonth),
      expression: "videoPoster&&!videonth"
    }],
    staticClass: "tip"
  }, [_vm._v("今日直播尚未开始")]), _vm._v(" "), [_c('img', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (!_vm.videonth),
      expression: "!videonth"
    }],
    attrs: {
      "src": _vm.playerOptions
    }
  }), _vm._v(" "), (_vm.videonth && _vm.videoPoster) ? _c('div', {
    attrs: {
      "id": "videoPlayer1"
    }
  }) : _vm._e()]], 2), _vm._v(" "), _c('ul', {
    staticClass: "top-tab"
  }, [_c('span', {
    staticClass: "btn",
    class: {
      active: _vm.tabShow == true
    },
    on: {
      "click": function($event) {
        _vm.tabShow = true
      }
    }
  }, [_vm._v("互动")]), _vm._v(" "), _c('router-link', {
    attrs: {
      "to": '/invitecard/' + 9999 + '/' + '1' + '/2'
    }
  }, [_c('span', {
    staticClass: "inter-btn pull-right"
  }, [_vm._v("邀请")])]), _vm._v(" "), _c('span', {
    staticClass: "btn pull-right",
    class: {
      active: _vm.tabShow == false
    },
    on: {
      "click": function($event) {
        _vm.tabShow = false
      }
    }
  }, [_vm._v("课程表")])], 1)]), _vm._v(" "), _c('section', {
    staticClass: "box-center"
  }, [_c('div', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.tabShow == true),
      expression: "tabShow == true"
    }]
  }, [
    [_c('div', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (_vm.teacherData != ''),
        expression: "teacherData != ''"
      }],
      ref: "topHeader",
      staticClass: "top-header",
      on: {
        "click": _vm.behaviorRecord
      }
    }, [_c('router-link', {
      ref: "header",
      staticClass: "header flex",
      attrs: {
        "to": '/live/' + _vm.teacherData.user_id + '&' + _vm.userId
      }
    }, [_c('span', {
      staticClass: "head-add",
      style: ({
        'background-image': 'url(' + _vm.teacherData.head_add + ')'
      })
    }), _vm._v(" "), _c('div', {
      staticClass: "box"
    }, [_c('div', {
      staticClass: "head-title flex"
    }, [_c('div', {
      staticClass: "author"
    }, [_c('span', {
      staticClass: "name text-ell"
    }, [_vm._v(_vm._s(_vm.teacherData.alias))])])]), _vm._v(" "), _c('div', {
      staticClass: "nums"
    }, [_c('span', [_vm._v("粉丝:")]), _c('span', {
      staticClass: "hot-num"
    }, [_vm._v(_vm._s(_vm.teacherData.focus_num || 0))]), _vm._v(" "), _c('span', [_vm._v("在线人数:")]), _c('span', {
      staticClass: "like-num"
    }, [_vm._v(_vm._s(_vm.studentNum))])])])]), _vm._v(" "), (_vm.teacherData.user_id != _vm.userId) ? _c('a', {
      class: [_vm.teacherData.isFocus == 1 ? 'following' : 'unfollow', 'follow'],
      attrs: {
        "href": "javascript:;"
      },
      on: {
        "click": _vm.toFocus
      }
    }, [_vm._v("\n                            " + _vm._s(_vm.teacherData.isFocus == 1 ? '已关注' : '关注') + " ")]) : _vm._e(), _vm._v(" "), (_vm.isShowGify) ? _c('gift', {
      attrs: {
        "liveData": _vm.liveData,
        "PayType": _vm.PayType,
        "isLink": _vm.isLink
      }
    }) : _vm._e()], 1), _vm._v(" "), _c('div', {
      staticClass: "comment-room",
      class: {
        noplay: _vm.teacherData == ''
      }
    }, [_c('div', {
      staticClass: "comment-list"
    }, [(_vm.tipShow == true) ? _c('div', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (_vm.teacherData.class_name != '' && _vm.teacherData != ''),
        expression: "teacherData.class_name != ''&& teacherData != ''"
      }],
      staticClass: "tip"
    }, [_vm._v("\n                                主题：" + _vm._s(_vm.teacherData.class_name) + "\n                            ")]) : _vm._e(), _vm._v(" "), _c('div', {
      staticClass: "boxs",
      attrs: {
        "id": "main"
      }
    }, [_c('scroller', {
      ref: "myPubicOnlive",
      attrs: {
        "on-refresh": _vm.loadTop,
        "refresh-text": "请点击历史记录页查看更多内容",
        "refresh-layer-color": "#c62f2f"
      }
    }, [_vm._l((_vm.comments), function(item) {
      return _c('div', {
        key: item.time,
        staticClass: "box",
        class: {
          'answer-comment-item': item.mastermsgId != undefined
        }
      }, [(item.type == 11) ? [_c('div', {
        staticClass: "reward-msg"
      }, [_c('p', [_c('span', {
        staticClass: "icon"
      }), _vm._v(_vm._s(_vm._f("limit")(JSON.parse(item.content).srcname, 5)) + " 赠予了 " + _vm._s(_vm._f("limit")(JSON.parse(item.content).toname, 5)) + "\n                                                     \n                                                    "), _c('span', {
        staticClass: "money"
      }, [_vm._v(_vm._s(JSON.parse(item.content).gifname))]), _vm._v(" "), _c('span', [_vm._v("X" + _vm._s(JSON.parse(item.content).gifcount))])])])] : (item.type == 12 || item.type == 1) ? [_c('section', [_c('h5', [_c('span', {
        staticClass: "name",
        class: {
          yellow: (_vm.teacherData.user_id == item.userId) || item.userType == 1
        }
      }, [_vm._v(_vm._s(item.name))]), _vm._v(" "), (item.forbidState == 1 & _vm.teacherData.isadmin == 1) ? _c('span', {
        staticClass: "forbid"
      }, [_vm._v("(禁言)")]) : _vm._e(), _vm._v(" "), (_vm.teacherData.user_id == item.userId) ? _c('span', {
        staticClass: "teacher"
      }) : (item.userType == 1) ? _c('span', {
        staticClass: "ass"
      }) : _vm._e(), _vm._v(" "), _c('span', {
        staticClass: "time"
      }, [_vm._v(_vm._s(item.time))]), _vm._v(" "), (_vm.teacherData.isadmin == 1 && _vm.userId != item.userId) ? _c('a', {
        staticClass: "comment-extra",
        attrs: {
          "href": "javascript:;"
        }
      }, [_c('span', {
        on: {
          "click": _vm.toggleCommentMenu
        }
      }), _vm._v(" "), _c('i'), _vm._v(" "), _c('i'), _vm._v(" "), _c('i'), _vm._v(" "), _c('div', {
        staticClass: "item-menu"
      }, [_c('a', {
        attrs: {
          "href": "javascript:;"
        },
        on: {
          "click": function($event) {
            _vm.delComment(item.msgId)
          }
        }
      }, [_vm._v("删除")]), _vm._v(" "), (item.forbidState == 1) ? _c('a', {
        staticClass: "gray",
        attrs: {
          "href": "javascript:;"
        },
        on: {
          "click": _vm.forbidCommented
        }
      }, [_vm._v("禁言")]) : _c('a', {
        attrs: {
          "href": "javascript:;"
        },
        on: {
          "click": function($event) {
            _vm.forbidComment(item.userId)
          }
        }
      }, [_vm._v("禁言")])])]) : _vm._e()]), _vm._v(" "), _c('div', {
        staticClass: "item"
      }, [(item.type == 12) ? [_c('img', {
        attrs: {
          "src": 'http://os700oap7.bkt.clouddn.com/' + item.content.path
        },
        on: {
          "click": function($event) {
            _vm.preview('http://os700oap7.bkt.clouddn.com/' + item.content.path)
          }
        }
      })] : [_c('img', {
        attrs: {
          "src": item.content
        },
        on: {
          "click": function($event) {
            _vm.preview(item.content)
          }
        }
      })]], 2)])] : (item.type == 2 || item.type == 0) ? [_c('section', [_c('h5', [_c('span', {
        staticClass: "name",
        class: {
          yellow: (_vm.teacherData.user_id == item.userId) || item.userType == 1
        }
      }, [_vm._v(_vm._s(item.name))]), _vm._v(" "), (item.forbidState == 1 & _vm.teacherData.isadmin == 1) ? _c('span', {
        staticClass: "forbid"
      }, [_vm._v("(禁言)")]) : _vm._e(), _vm._v(" "), (_vm.teacherData.user_id == item.userId) ? _c('span', {
        staticClass: "teacher"
      }) : (item.userType == 1) ? _c('span', {
        staticClass: "ass"
      }) : _vm._e(), _vm._v(" "), _c('span', {
        staticClass: "time"
      }, [_vm._v(_vm._s(item.time))]), _vm._v(" "), (_vm.teacherData.isadmin == 1 && _vm.userId != item.userId) ? _c('a', {
        staticClass: "comment-extra",
        attrs: {
          "href": "javascript:;"
        }
      }, [_c('span', {
        on: {
          "click": _vm.toggleCommentMenu
        }
      }), _vm._v(" "), _c('i'), _vm._v(" "), _c('i'), _vm._v(" "), _c('i'), _vm._v(" "), _c('div', {
        staticClass: "item-menu"
      }, [_c('a', {
        attrs: {
          "href": "javascript:;"
        },
        on: {
          "click": function($event) {
            _vm.delComment(item.msgId)
          }
        }
      }, [_vm._v("删除")]), _vm._v(" "), (item.forbidState == 1) ? _c('a', {
        staticClass: "gray",
        attrs: {
          "href": "javascript:;"
        },
        on: {
          "click": _vm.forbidCommented
        }
      }, [_vm._v("禁言")]) : _c('a', {
        attrs: {
          "href": "javascript:;"
        },
        on: {
          "click": function($event) {
            _vm.forbidComment(item.userId)
          }
        }
      }, [_vm._v("禁言")])])]) : _vm._e()]), _vm._v(" "), _c('div', {
        staticClass: "item"
      }, [(item.content.indexOf('[-') >= 0) ? [_vm._l((_vm.getEmojiData), function(data, index) {
        return [(item.content.indexOf(data.expression_number) >= 0) ? [_c('img', {
          staticStyle: {
            "width": "1.63rem",
            "height": "1.1rem"
          },
          attrs: {
            "src": data.qiniuImg
          }
        })] : _vm._e()]
      })] : [_c('p', [_vm._v("\n                                                            " + _vm._s(item.content))])]], 2)])] : (item.type == 9) ? [_c('section', [_c('h5', [_c('span', {
        staticClass: "name",
        class: {
          yellow: (_vm.teacherData.user_id == item.userId) || item.userType == 1
        }
      }, [_vm._v(_vm._s(item.name))]), _vm._v(" "), (item.forbidState == 1 & _vm.teacherData.isadmin == 1) ? _c('span', {
        staticClass: "forbid"
      }, [_vm._v("(禁言)")]) : _vm._e(), _vm._v(" "), (_vm.teacherData.user_id == item.userId) ? _c('span', {
        staticClass: "teacher"
      }) : (item.userType == 1) ? _c('span', {
        staticClass: "ass"
      }) : _vm._e(), _vm._v(" "), _c('span', {
        staticClass: "time"
      }, [_vm._v(_vm._s(item.time))]), _vm._v(" "), (_vm.teacherData.isadmin == 1 && _vm.userId != item.userId) ? _c('a', {
        staticClass: "comment-extra",
        attrs: {
          "href": "javascript:;"
        }
      }, [_c('span', {
        on: {
          "click": _vm.toggleCommentMenu
        }
      }), _vm._v(" "), _c('i'), _vm._v(" "), _c('i'), _vm._v(" "), _c('i'), _vm._v(" "), _c('div', {
        staticClass: "item-menu"
      }, [_c('a', {
        attrs: {
          "href": "javascript:;"
        },
        on: {
          "click": function($event) {
            _vm.delComment(item.msgId)
          }
        }
      }, [_vm._v("删除")]), _vm._v(" "), (item.forbidState == 1) ? _c('a', {
        staticClass: "gray",
        attrs: {
          "href": "javascript:;"
        },
        on: {
          "click": _vm.forbidCommented
        }
      }, [_vm._v("禁言")]) : _c('a', {
        attrs: {
          "href": "javascript:;"
        },
        on: {
          "click": function($event) {
            _vm.forbidComment(item.userId)
          }
        }
      }, [_vm._v("禁言")])])]) : _vm._e()]), _vm._v(" "), _c('div', {
        staticClass: "item"
      }, [_c('a', {
        attrs: {
          "href": "javascript:;"
        },
        on: {
          "click": function($event) {
            _vm.cupLink(item.content, _vm.userId)
          }
        }
      }, [_c('div', {
        staticClass: "linkBox"
      }, [_c('div', {
        staticClass: "img"
      }, [_c('img', {
        attrs: {
          "src": item.content.src_img != null ? item.content.src_img : '../images/column/defaultCover.png'
        }
      })]), _vm._v(" "), _c('div', {
        staticClass: "text"
      }, [_c('h2', [_vm._v(" " + _vm._s(item.content.class_name))]), _vm._v(" "), _c('span', [_vm._v("来源：" + _vm._s(item.content.alias))]), _vm._v(" "), _c('p', {
        domProps: {
          "innerHTML": _vm._s('摘要：' + item.content.abstract)
        }
      })])])])])])] : _vm._e()], 2)
    }), _vm._v(" "), _c('p', {
      staticClass: "txt"
    }, [_vm._v("以上观点仅供参考，不构成投资建议")]), _vm._v(" "), _c('div', {
      ref: "mask",
      staticClass: "menu-mask",
      on: {
        "click": function($event) {
          $event.stopPropagation();
          _vm.cancalCommentMenu($event)
        }
      }
    })], 2)], 1)]), _vm._v(" "), _c('footer', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (_vm.teacherData != ''),
        expression: "teacherData != ''"
      }],
      attrs: {
        "id": "footer"
      }
    }, [(_vm.isUserTypeAssistant == 1) ? [_c('div', {
      staticClass: "nav"
    }, [_c('a', {
      staticClass: "text-btn",
      class: {
        'active': _vm.isNav == 1
      },
      attrs: {
        "href": "javascript:;"
      },
      on: {
        "click": function($event) {
          _vm.tabberClick(1)
        }
      }
    }, [_c('span', {
      staticClass: "sprite"
    }, [_vm._v("文字")])]), _vm._v(" "), _c('a', {
      staticClass: "image-btn",
      class: {
        'active': _vm.isNav == 2
      },
      attrs: {
        "href": "javascript:;"
      },
      on: {
        "click": function($event) {
          _vm.tabberClick(2)
        }
      }
    }, [_c('span', {
      staticClass: "sprite"
    }, [_vm._v("图片")]), _vm._v(" "), (!_vm.isWeiXin) ? _c('input', {
      attrs: {
        "type": "file",
        "accept": "image/gif,image/jpeg,image/jpg,image/png,image/svg"
      },
      on: {
        "change": _vm.pcSendPic
      }
    }) : _vm._e()]), _vm._v(" "), _c('a', {
      staticClass: "text-emo",
      class: {
        'active': _vm.isNav == 3
      },
      attrs: {
        "href": "javascript:;"
      },
      on: {
        "click": function($event) {
          _vm.tabberClick(3)
        }
      }
    }, [_c('span', {
      staticClass: "sprite"
    }, [_vm._v("表情包")])])]), _vm._v(" "), (_vm.isNav == 1) ? [_c('div', {
      staticClass: "bottom-submit"
    }, [(_vm.isWeiXin) ? _c('textarea', {
      directives: [{
        name: "model",
        rawName: "v-model",
        value: (_vm.commentText),
        expression: "commentText"
      }],
      staticClass: "comment-input",
      class: {
        blue: _vm.commentText.trim() == '', 'line-1': _vm.commentText.length <= 16, 'line-2': _vm.commentText.length > 16 && _vm.commentText.length <= 32, 'line-3': _vm.commentText.length > 32 && _vm.commentText.length <= 48, 'line-4': _vm.commentText.length > 48 && _vm.commentText.length <= 64, 'line-5': _vm.commentText.length > 64
      },
      attrs: {
        "type": "text",
        "placeholder": "和老师聊聊吧~",
        "id": "comment-input"
      },
      domProps: {
        "value": (_vm.commentText)
      },
      on: {
        "focus": _vm.focus,
        "blur": _vm.focus,
        "click": function($event) {
          _vm.bindScrollFun(this)
        },
        "input": function($event) {
          if ($event.target.composing) { return; }
          _vm.commentText = $event.target.value
        }
      }
    }) : _c('textarea', {
      directives: [{
        name: "model",
        rawName: "v-model",
        value: (_vm.commentText),
        expression: "commentText"
      }],
      staticClass: "comment-input",
      class: {
        blue: _vm.commentText.trim() == '', 'pc-textarea': _vm.commentText.length > 30
      },
      attrs: {
        "placeholder": "和老师聊聊吧~"
      },
      domProps: {
        "value": (_vm.commentText)
      },
      on: {
        "keyup": function($event) {
          if (!('button' in $event) && _vm._k($event.keyCode, "enter", 13)) { return null; }
          _vm.sendComment($event)
        },
        "click": function($event) {
          _vm.bindScrollFun(this)
        },
        "focus": _vm.focus,
        "input": function($event) {
          if ($event.target.composing) { return; }
          _vm.commentText = $event.target.value
        }
      }
    }), _vm._v(" "), _c('div', {
      staticClass: "comment-mask",
      on: {
        "click": _vm.commentmasktap
      }
    }), _vm._v(" "), _c('input', {
      class: {
        'active': _vm.commentText.length
      },
      attrs: {
        "type": "button",
        "value": "发送"
      },
      on: {
        "mousedown": _vm.sendComment
      }
    })])] : _vm._e()] : [_c('div', {
      staticClass: "bottom-submit"
    }, [(_vm.isWeiXin) ? _c('textarea', {
      directives: [{
        name: "model",
        rawName: "v-model",
        value: (_vm.commentText),
        expression: "commentText"
      }],
      staticClass: "comment-input",
      class: {
        blue: _vm.commentText.trim() == '', 'line-1': _vm.commentText.length <= 16, 'line-2': _vm.commentText.length > 16 && _vm.commentText.length <= 32, 'line-3': _vm.commentText.length > 32 && _vm.commentText.length <= 48, 'line-4': _vm.commentText.length > 48 && _vm.commentText.length <= 64, 'line-5': _vm.commentText.length > 64
      },
      attrs: {
        "type": "text",
        "placeholder": "和老师聊聊吧~",
        "id": "comment-input"
      },
      domProps: {
        "value": (_vm.commentText)
      },
      on: {
        "focus": _vm.focus,
        "click": function($event) {
          _vm.bindScrollFun(this)
        },
        "input": function($event) {
          if ($event.target.composing) { return; }
          _vm.commentText = $event.target.value
        }
      }
    }) : _c('textarea', {
      directives: [{
        name: "model",
        rawName: "v-model",
        value: (_vm.commentText),
        expression: "commentText"
      }],
      staticClass: "comment-input",
      class: {
        blue: _vm.commentText.trim() == '', 'pc-textarea': _vm.commentText.length > 30
      },
      attrs: {
        "placeholder": "和老师聊聊吧~"
      },
      domProps: {
        "value": (_vm.commentText)
      },
      on: {
        "keyup": function($event) {
          if (!('button' in $event) && _vm._k($event.keyCode, "enter", 13)) { return null; }
          _vm.sendComment($event)
        },
        "click": function($event) {
          _vm.bindScrollFun(this)
        },
        "focus": _vm.focus,
        "input": function($event) {
          if ($event.target.composing) { return; }
          _vm.commentText = $event.target.value
        }
      }
    }), _vm._v(" "), _c('div', {
      staticClass: "comment-mask",
      on: {
        "click": _vm.commentmasktap
      }
    }), _vm._v(" "), _c('div', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (_vm.isEm == true),
        expression: "isEm==true"
      }],
      staticClass: "expression",
      staticStyle: {
        "margin-right": "10px"
      }
    }, [_c('img', {
      staticStyle: {
        "width": ".66rem",
        "height": ".66rem"
      },
      attrs: {
        "src": "/images/live/expression_image_button.png"
      },
      on: {
        "click": function($event) {
          _vm.emClick(0)
        }
      }
    })]), _vm._v(" "), _c('div', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (_vm.isEm == false),
        expression: "isEm==false"
      }],
      staticClass: "keyboard",
      staticStyle: {
        "margin-right": "10px"
      }
    }, [_c('img', {
      staticStyle: {
        "width": ".66rem",
        "height": ".66rem"
      },
      attrs: {
        "src": "/images/live/keyboard_button.png"
      },
      on: {
        "click": function($event) {
          _vm.emClick(1)
        }
      }
    })]), _vm._v(" "), _c('input', {
      class: {
        'active': _vm.commentText.length
      },
      attrs: {
        "type": "button",
        "value": "发送"
      },
      on: {
        "mousedown": _vm.sendComment
      }
    }), _vm._v(" "), _c('emoji', {
      attrs: {
        "isEmojiBox": _vm.isEmojiBox,
        "userId": _vm.userId,
        "liveId": _vm.courseId,
        "type": 0
      },
      on: {
        "EmojiData": _vm.getEmoji,
        "showeditMask": _vm.cancelNav
      }
    })], 1)], _vm._v(" "), _c('div', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (_vm.isNav != 0),
        expression: "isNav!=0"
      }],
      staticClass: "content-mask",
      on: {
        "click": _vm.cancelNav
      }
    }), _vm._v(" "), (_vm.isNav == 3) ? [_c('div', {
      staticClass: "bottom-submit"
    }, [_c('emoji', {
      attrs: {
        "isEmojiBox": _vm.isEmojiBox,
        "userId": _vm.userId,
        "liveId": _vm.courseId,
        "type": 0
      },
      on: {
        "EmojiData": _vm.getEmoji,
        "showeditMask": _vm.cancelNav
      }
    })], 1)] : _vm._e()], 2)])]
  ], 2), _vm._v(" "), _c('div', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.tabShow == false),
      expression: "tabShow == false"
    }],
    staticClass: "timetable"
  }, [_c('ul', _vm._l((_vm.courseTable), function(item) {
    return _c('li', [_c('div', {
      staticClass: "left-box"
    }, [_c('img', {
      attrs: {
        "src": item.head_add,
        "alt": ""
      }
    }), _vm._v(" "), _c('div', [_c('h4', [_c('span', [_vm._v("#" + _vm._s(item.classification))]), _vm._v(_vm._s(item.cate_name) + "\n                                ")]), _vm._v(" "), _c('h5', [_vm._v("\n                                    " + _vm._s(item.class_name) + "\n                                ")]), _vm._v(" "), _c('p', [_c('span', [_vm._v("讲师：" + _vm._s(item.alias))]), _vm._v(" "), _c('span', [_vm._v(_vm._s(item.time))])])])]), _vm._v(" "), _c('div', {
      staticClass: "right-box"
    }, [(item.status == 1) ? [_vm._m(0, true)] : (item.status == 2) ? [_c('span', {
      staticClass: "ing"
    }, [_c('i'), _vm._v("正在直播")])] : (item.status == 3) ? [_c('span', {
      staticClass: "ed"
    }, [_c('i'), _vm._v("直播结束")])] : _vm._e()], 2)])
  }))])]), _vm._v(" "), _c('div', {
    staticClass: "mask",
    attrs: {
      "hidden": !_vm.showFinishMode
    },
    on: {
      "click": function($event) {
        _vm.showFinishMode = false
      }
    }
  }), _vm._v(" "), _c('div', {
    staticClass: "finish-mode",
    class: {
      active: _vm.showFinishMode
    }
  }, [_c('h5', [_vm._v("结束直播")]), _vm._v(" "), _c('p', [_vm._v("1.结束直播后，您将只能参与讨论")]), _vm._v(" "), _c('p', [_vm._v("2.结束直播后，嘉宾讲师将不能继续发言")]), _vm._v(" "), _c('p', [_vm._v("3.若课程开始前结束直播，将影响您的教学效果")]), _vm._v(" "), _c('div', {
    staticClass: "btns"
  }, [_c('button', {
    staticClass: "cancel-btn",
    on: {
      "click": function($event) {
        _vm.showFinishMode = false
      }
    }
  }, [_vm._v("取消")]), _vm._v(" "), _c('button', {
    staticClass: "confirm-btn",
    on: {
      "click": _vm.finishCourse
    }
  }, [_vm._v("我要结束")])])])]), _vm._v(" "), (_vm.closePop) ? _c('div', {
    staticClass: "liveTitleBox-comment mint-popup ",
    staticStyle: {
      "z-index": "2004"
    }
  }, [_c('div', {
    staticClass: "content"
  }, [_c('p', [_c('img', {
    staticClass: "img",
    attrs: {
      "src": _vm.codeImg
    }
  })]), _vm._v(" "), _c('h2', [_vm._v("长按关注大策略公众号")]), _vm._v(" "), _c('P', {
    staticClass: "class-name"
  }, [_vm._v("\n                关注可收到最新投资动态\n            ")])], 1), _vm._v(" "), _c('div', {
    staticClass: "buttom "
  }, [_c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": function($event) {
        _vm.closePop = false
      }
    }
  }, [_vm._v("关闭")])])]) : _vm._e(), _vm._v(" "), (_vm.closePop) ? _c('div', {
    staticClass: "v-modal",
    staticStyle: {
      "z-index": "2002"
    }
  }) : _vm._e(), _vm._v(" "), _c('mt-popup', {
    staticClass: "vip-animate-popup",
    attrs: {
      "popup-transition": "popup-fade"
    },
    model: {
      value: (_vm.showVipAnimate),
      callback: function($$v) {
        _vm.showVipAnimate = $$v
      },
      expression: "showVipAnimate"
    }
  }, [_c('main', [_c('section', {
    staticClass: "bg"
  }), _vm._v(" "), _c('img', {
    staticClass: "vip-bg",
    attrs: {
      "src": '/images/vip/vip-animate-gif-' + _vm.userLevel + '.gif',
      "alt": ""
    }
  }), _vm._v(" "), _c('section', {
    staticClass: "head-add",
    class: {
      'vip-5-6': _vm.userLevel == 5 || _vm.userLevel == 6, 'vip-7-8': _vm.userLevel == 7 || _vm.userLevel == 8
    },
    style: ({
      'background-image': 'url(' + _vm.userAvatar + ')'
    })
  })])])], 1)
},staticRenderFns: [function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('span', {
    staticClass: "es"
  }, [_c('i'), _vm._v("即将开始")])
}]}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-23938919", module.exports)
  }
}

/***/ }),

/***/ 1251:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(980);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("34708c3d", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-23938919\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./publicOnlive.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-23938919\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./publicOnlive.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 490:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1251)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(915),
  /* template */
  __webpack_require__(1138),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\personalCenter\\publicOnlive.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] publicOnlive.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-23938919", Component.options)
  } else {
    hotAPI.reload("data-v-23938919", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 516:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(519);
if(typeof content === 'string') content = [[module.i, content, '']];
// Prepare cssTransformation
var transform;

var options = {}
options.transform = transform
// add the styles to the DOM
var update = __webpack_require__(412)(content, options);
if(content.locals) module.exports = content.locals;
// Hot Module Replacement
if(false) {
	// When the styles change, update the <style> tags
	if(!content.locals) {
		module.hot.accept("!!../../../css-loader/index.js??ref--3-2!./swiper.min.css", function() {
			var newContent = require("!!../../../css-loader/index.js??ref--3-2!./swiper.min.css");
			if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
			update(newContent);
		});
	}
	// When the module is disposed, remove the <style> tags
	module.hot.dispose(function() { update(); });
}

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

/***/ 519:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, ".swiper-container{margin:0 auto;position:relative;overflow:hidden;list-style:none;padding:0;z-index:1}.swiper-container-no-flexbox .swiper-slide{float:left}.swiper-container-vertical>.swiper-wrapper{-webkit-box-orient:vertical;-webkit-box-direction:normal;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column}.swiper-wrapper{position:relative;width:100%;height:100%;z-index:1;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-transition-property:-webkit-transform;transition-property:-webkit-transform;-o-transition-property:transform;transition-property:transform;transition-property:transform,-webkit-transform;-webkit-box-sizing:content-box;box-sizing:content-box}.swiper-container-android .swiper-slide,.swiper-wrapper{-webkit-transform:translateZ(0);transform:translateZ(0)}.swiper-container-multirow>.swiper-wrapper{-webkit-flex-wrap:wrap;-ms-flex-wrap:wrap;flex-wrap:wrap}.swiper-container-free-mode>.swiper-wrapper{-webkit-transition-timing-function:ease-out;-o-transition-timing-function:ease-out;transition-timing-function:ease-out;margin:0 auto}.swiper-slide{-webkit-flex-shrink:0;-ms-flex-negative:0;flex-shrink:0;width:100%;height:100%;position:relative;-webkit-transition-property:-webkit-transform;transition-property:-webkit-transform;-o-transition-property:transform;transition-property:transform;transition-property:transform,-webkit-transform}.swiper-invisible-blank-slide{visibility:hidden}.swiper-container-autoheight,.swiper-container-autoheight .swiper-slide{height:auto}.swiper-container-autoheight .swiper-wrapper{-webkit-box-align:start;-webkit-align-items:flex-start;-ms-flex-align:start;align-items:flex-start;-webkit-transition-property:height,-webkit-transform;transition-property:height,-webkit-transform;-o-transition-property:transform,height;transition-property:transform,height;transition-property:transform,height,-webkit-transform}.swiper-container-3d{-webkit-perspective:1200px;perspective:1200px}.swiper-container-3d .swiper-cube-shadow,.swiper-container-3d .swiper-slide,.swiper-container-3d .swiper-slide-shadow-bottom,.swiper-container-3d .swiper-slide-shadow-left,.swiper-container-3d .swiper-slide-shadow-right,.swiper-container-3d .swiper-slide-shadow-top,.swiper-container-3d .swiper-wrapper{-webkit-transform-style:preserve-3d;transform-style:preserve-3d}.swiper-container-3d .swiper-slide-shadow-bottom,.swiper-container-3d .swiper-slide-shadow-left,.swiper-container-3d .swiper-slide-shadow-right,.swiper-container-3d .swiper-slide-shadow-top{position:absolute;left:0;top:0;width:100%;height:100%;pointer-events:none;z-index:10}.swiper-container-3d .swiper-slide-shadow-left{background-image:-webkit-gradient(linear,right top,left top,from(rgba(0,0,0,.5)),to(transparent));background-image:-webkit-linear-gradient(right,rgba(0,0,0,.5),transparent);background-image:-o-linear-gradient(right,rgba(0,0,0,.5),transparent);background-image:linear-gradient(270deg,rgba(0,0,0,.5),transparent)}.swiper-container-3d .swiper-slide-shadow-right{background-image:-webkit-gradient(linear,left top,right top,from(rgba(0,0,0,.5)),to(transparent));background-image:-webkit-linear-gradient(left,rgba(0,0,0,.5),transparent);background-image:-o-linear-gradient(left,rgba(0,0,0,.5),transparent);background-image:linear-gradient(90deg,rgba(0,0,0,.5),transparent)}.swiper-container-3d .swiper-slide-shadow-top{background-image:-webkit-gradient(linear,left bottom,left top,from(rgba(0,0,0,.5)),to(transparent));background-image:-webkit-linear-gradient(bottom,rgba(0,0,0,.5),transparent);background-image:-o-linear-gradient(bottom,rgba(0,0,0,.5),transparent);background-image:linear-gradient(0deg,rgba(0,0,0,.5),transparent)}.swiper-container-3d .swiper-slide-shadow-bottom{background-image:-webkit-gradient(linear,left top,left bottom,from(rgba(0,0,0,.5)),to(transparent));background-image:-webkit-linear-gradient(top,rgba(0,0,0,.5),transparent);background-image:-o-linear-gradient(top,rgba(0,0,0,.5),transparent);background-image:linear-gradient(180deg,rgba(0,0,0,.5),transparent)}.swiper-container-wp8-horizontal,.swiper-container-wp8-horizontal>.swiper-wrapper{-ms-touch-action:pan-y;touch-action:pan-y}.swiper-container-wp8-vertical,.swiper-container-wp8-vertical>.swiper-wrapper{-ms-touch-action:pan-x;touch-action:pan-x}.swiper-button-next,.swiper-button-prev{position:absolute;top:50%;width:27px;height:44px;margin-top:-22px;z-index:10;cursor:pointer;background-size:27px 44px;background-position:50%;background-repeat:no-repeat}.swiper-button-next.swiper-button-disabled,.swiper-button-prev.swiper-button-disabled{opacity:.35;cursor:auto;pointer-events:none}.swiper-button-prev,.swiper-container-rtl .swiper-button-next{background-image:url(\"data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 27 44'%3E%3Cpath d='M0 22L22 0l2.1 2.1L4.2 22l19.9 19.9L22 44 0 22z' fill='%23007aff'/%3E%3C/svg%3E\");left:10px;right:auto}.swiper-button-next,.swiper-container-rtl .swiper-button-prev{background-image:url(\"data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 27 44'%3E%3Cpath d='M27 22L5 44l-2.1-2.1L22.8 22 2.9 2.1 5 0l22 22z' fill='%23007aff'/%3E%3C/svg%3E\");right:10px;left:auto}.swiper-button-prev.swiper-button-white,.swiper-container-rtl .swiper-button-next.swiper-button-white{background-image:url(\"data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 27 44'%3E%3Cpath d='M0 22L22 0l2.1 2.1L4.2 22l19.9 19.9L22 44 0 22z' fill='%23fff'/%3E%3C/svg%3E\")}.swiper-button-next.swiper-button-white,.swiper-container-rtl .swiper-button-prev.swiper-button-white{background-image:url(\"data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 27 44'%3E%3Cpath d='M27 22L5 44l-2.1-2.1L22.8 22 2.9 2.1 5 0l22 22z' fill='%23fff'/%3E%3C/svg%3E\")}.swiper-button-prev.swiper-button-black,.swiper-container-rtl .swiper-button-next.swiper-button-black{background-image:url(\"data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 27 44'%3E%3Cpath d='M0 22L22 0l2.1 2.1L4.2 22l19.9 19.9L22 44 0 22z'/%3E%3C/svg%3E\")}.swiper-button-next.swiper-button-black,.swiper-container-rtl .swiper-button-prev.swiper-button-black{background-image:url(\"data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 27 44'%3E%3Cpath d='M27 22L5 44l-2.1-2.1L22.8 22 2.9 2.1 5 0l22 22z'/%3E%3C/svg%3E\")}.swiper-button-lock{display:none}.swiper-pagination{position:absolute;text-align:center;-webkit-transition:opacity .3s;-o-transition:.3s opacity;transition:opacity .3s;-webkit-transform:translateZ(0);transform:translateZ(0);z-index:10}.swiper-pagination.swiper-pagination-hidden{opacity:0}.swiper-container-horizontal>.swiper-pagination-bullets,.swiper-pagination-custom,.swiper-pagination-fraction{bottom:10px;left:0;width:100%}.swiper-pagination-bullets-dynamic{overflow:hidden;font-size:0}.swiper-pagination-bullets-dynamic .swiper-pagination-bullet{-webkit-transform:scale(.33);-ms-transform:scale(.33);transform:scale(.33);position:relative}.swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active,.swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active-main{-webkit-transform:scale(1);-ms-transform:scale(1);transform:scale(1)}.swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active-prev{-webkit-transform:scale(.66);-ms-transform:scale(.66);transform:scale(.66)}.swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active-prev-prev{-webkit-transform:scale(.33);-ms-transform:scale(.33);transform:scale(.33)}.swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active-next{-webkit-transform:scale(.66);-ms-transform:scale(.66);transform:scale(.66)}.swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active-next-next{-webkit-transform:scale(.33);-ms-transform:scale(.33);transform:scale(.33)}.swiper-pagination-bullet{width:8px;height:8px;display:inline-block;border-radius:100%;background:#000;opacity:.2}button.swiper-pagination-bullet{border:none;margin:0;padding:0;-webkit-box-shadow:none;box-shadow:none;-webkit-appearance:none;-moz-appearance:none;appearance:none}.swiper-pagination-clickable .swiper-pagination-bullet{cursor:pointer}.swiper-pagination-bullet-active{opacity:1;background:#007aff}.swiper-container-vertical>.swiper-pagination-bullets{right:10px;top:50%;-webkit-transform:translate3d(0,-50%,0);transform:translate3d(0,-50%,0)}.swiper-container-vertical>.swiper-pagination-bullets .swiper-pagination-bullet{margin:6px 0;display:block}.swiper-container-vertical>.swiper-pagination-bullets.swiper-pagination-bullets-dynamic{top:50%;-webkit-transform:translateY(-50%);-ms-transform:translateY(-50%);transform:translateY(-50%);width:8px}.swiper-container-vertical>.swiper-pagination-bullets.swiper-pagination-bullets-dynamic .swiper-pagination-bullet{display:inline-block;-webkit-transition:top .2s,-webkit-transform .2s;transition:top .2s,-webkit-transform .2s;-o-transition:.2s transform,.2s top;transition:transform .2s,top .2s;transition:transform .2s,top .2s,-webkit-transform .2s}.swiper-container-horizontal>.swiper-pagination-bullets .swiper-pagination-bullet{margin:0 4px}.swiper-container-horizontal>.swiper-pagination-bullets.swiper-pagination-bullets-dynamic{left:50%;-webkit-transform:translateX(-50%);-ms-transform:translateX(-50%);transform:translateX(-50%);white-space:nowrap}.swiper-container-horizontal>.swiper-pagination-bullets.swiper-pagination-bullets-dynamic .swiper-pagination-bullet{-webkit-transition:left .2s,-webkit-transform .2s;transition:left .2s,-webkit-transform .2s;-o-transition:.2s transform,.2s left;transition:transform .2s,left .2s;transition:transform .2s,left .2s,-webkit-transform .2s}.swiper-container-horizontal.swiper-container-rtl>.swiper-pagination-bullets-dynamic .swiper-pagination-bullet{-webkit-transition:right .2s,-webkit-transform .2s;transition:right .2s,-webkit-transform .2s;-o-transition:.2s transform,.2s right;transition:transform .2s,right .2s;transition:transform .2s,right .2s,-webkit-transform .2s}.swiper-pagination-progressbar{background:rgba(0,0,0,.25);position:absolute}.swiper-pagination-progressbar .swiper-pagination-progressbar-fill{background:#007aff;position:absolute;left:0;top:0;width:100%;height:100%;-webkit-transform:scale(0);-ms-transform:scale(0);transform:scale(0);-webkit-transform-origin:left top;-ms-transform-origin:left top;transform-origin:left top}.swiper-container-rtl .swiper-pagination-progressbar .swiper-pagination-progressbar-fill{-webkit-transform-origin:right top;-ms-transform-origin:right top;transform-origin:right top}.swiper-container-horizontal>.swiper-pagination-progressbar,.swiper-container-vertical>.swiper-pagination-progressbar.swiper-pagination-progressbar-opposite{width:100%;height:4px;left:0;top:0}.swiper-container-horizontal>.swiper-pagination-progressbar.swiper-pagination-progressbar-opposite,.swiper-container-vertical>.swiper-pagination-progressbar{width:4px;height:100%;left:0;top:0}.swiper-pagination-white .swiper-pagination-bullet-active{background:#fff}.swiper-pagination-progressbar.swiper-pagination-white{background:hsla(0,0%,100%,.25)}.swiper-pagination-progressbar.swiper-pagination-white .swiper-pagination-progressbar-fill{background:#fff}.swiper-pagination-black .swiper-pagination-bullet-active{background:#000}.swiper-pagination-progressbar.swiper-pagination-black{background:rgba(0,0,0,.25)}.swiper-pagination-progressbar.swiper-pagination-black .swiper-pagination-progressbar-fill{background:#000}.swiper-pagination-lock{display:none}.swiper-scrollbar{border-radius:10px;position:relative;-ms-touch-action:none;background:rgba(0,0,0,.1)}.swiper-container-horizontal>.swiper-scrollbar{position:absolute;left:1%;bottom:3px;z-index:50;height:5px;width:98%}.swiper-container-vertical>.swiper-scrollbar{position:absolute;right:3px;top:1%;z-index:50;width:5px;height:98%}.swiper-scrollbar-drag{height:100%;width:100%;position:relative;background:rgba(0,0,0,.5);border-radius:10px;left:0;top:0}.swiper-scrollbar-cursor-drag{cursor:move}.swiper-scrollbar-lock{display:none}.swiper-zoom-container{width:100%;height:100%;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;text-align:center}.swiper-zoom-container>canvas,.swiper-zoom-container>img,.swiper-zoom-container>svg{max-width:100%;max-height:100%;-o-object-fit:contain;object-fit:contain}.swiper-slide-zoomed{cursor:move}.swiper-lazy-preloader{width:42px;height:42px;position:absolute;left:50%;top:50%;margin-left:-21px;margin-top:-21px;z-index:10;-webkit-transform-origin:50%;-ms-transform-origin:50%;transform-origin:50%;-webkit-animation:swiper-preloader-spin 1s steps(12) infinite;animation:swiper-preloader-spin 1s steps(12) infinite}.swiper-lazy-preloader:after{display:block;content:\"\";width:100%;height:100%;background-image:url(\"data:image/svg+xml;charset=utf-8,%3Csvg viewBox='0 0 120 120' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpath id='a' stroke='%236c6c6c' stroke-width='11' stroke-linecap='round' d='M60 7v20'/%3E%3C/defs%3E%3Cuse xlink:href='%23a' opacity='.27'/%3E%3Cuse xlink:href='%23a' opacity='.27' transform='rotate(30 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.27' transform='rotate(60 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.27' transform='rotate(90 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.27' transform='rotate(120 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.27' transform='rotate(150 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.37' transform='rotate(180 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.46' transform='rotate(210 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.56' transform='rotate(240 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.66' transform='rotate(270 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.75' transform='rotate(300 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.85' transform='rotate(330 60 60)'/%3E%3C/svg%3E\");background-position:50%;background-size:100%;background-repeat:no-repeat}.swiper-lazy-preloader-white:after{background-image:url(\"data:image/svg+xml;charset=utf-8,%3Csvg viewBox='0 0 120 120' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpath id='a' stroke='%23fff' stroke-width='11' stroke-linecap='round' d='M60 7v20'/%3E%3C/defs%3E%3Cuse xlink:href='%23a' opacity='.27'/%3E%3Cuse xlink:href='%23a' opacity='.27' transform='rotate(30 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.27' transform='rotate(60 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.27' transform='rotate(90 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.27' transform='rotate(120 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.27' transform='rotate(150 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.37' transform='rotate(180 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.46' transform='rotate(210 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.56' transform='rotate(240 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.66' transform='rotate(270 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.75' transform='rotate(300 60 60)'/%3E%3Cuse xlink:href='%23a' opacity='.85' transform='rotate(330 60 60)'/%3E%3C/svg%3E\")}@-webkit-keyframes swiper-preloader-spin{to{-webkit-transform:rotate(1turn);transform:rotate(1turn)}}@keyframes swiper-preloader-spin{to{-webkit-transform:rotate(1turn);transform:rotate(1turn)}}.swiper-container .swiper-notification{position:absolute;left:0;top:0;pointer-events:none;opacity:0;z-index:-1000}.swiper-container-fade.swiper-container-free-mode .swiper-slide{-webkit-transition-timing-function:ease-out;-o-transition-timing-function:ease-out;transition-timing-function:ease-out}.swiper-container-fade .swiper-slide{pointer-events:none;-webkit-transition-property:opacity;-o-transition-property:opacity;transition-property:opacity}.swiper-container-fade .swiper-slide .swiper-slide{pointer-events:none}.swiper-container-fade .swiper-slide-active,.swiper-container-fade .swiper-slide-active .swiper-slide-active{pointer-events:auto}.swiper-container-cube{overflow:visible}.swiper-container-cube .swiper-slide{pointer-events:none;-webkit-backface-visibility:hidden;backface-visibility:hidden;z-index:1;visibility:hidden;-webkit-transform-origin:0 0;-ms-transform-origin:0 0;transform-origin:0 0;width:100%;height:100%}.swiper-container-cube .swiper-slide .swiper-slide{pointer-events:none}.swiper-container-cube.swiper-container-rtl .swiper-slide{-webkit-transform-origin:100% 0;-ms-transform-origin:100% 0;transform-origin:100% 0}.swiper-container-cube .swiper-slide-active,.swiper-container-cube .swiper-slide-active .swiper-slide-active{pointer-events:auto}.swiper-container-cube .swiper-slide-active,.swiper-container-cube .swiper-slide-next,.swiper-container-cube .swiper-slide-next+.swiper-slide,.swiper-container-cube .swiper-slide-prev{pointer-events:auto;visibility:visible}.swiper-container-cube .swiper-slide-shadow-bottom,.swiper-container-cube .swiper-slide-shadow-left,.swiper-container-cube .swiper-slide-shadow-right,.swiper-container-cube .swiper-slide-shadow-top{z-index:0;-webkit-backface-visibility:hidden;backface-visibility:hidden}.swiper-container-cube .swiper-cube-shadow{position:absolute;left:0;bottom:0;width:100%;height:100%;background:#000;opacity:.6;-webkit-filter:blur(50px);filter:blur(50px);z-index:0}.swiper-container-flip{overflow:visible}.swiper-container-flip .swiper-slide{pointer-events:none;-webkit-backface-visibility:hidden;backface-visibility:hidden;z-index:1}.swiper-container-flip .swiper-slide .swiper-slide{pointer-events:none}.swiper-container-flip .swiper-slide-active,.swiper-container-flip .swiper-slide-active .swiper-slide-active{pointer-events:auto}.swiper-container-flip .swiper-slide-shadow-bottom,.swiper-container-flip .swiper-slide-shadow-left,.swiper-container-flip .swiper-slide-shadow-right,.swiper-container-flip .swiper-slide-shadow-top{z-index:0;-webkit-backface-visibility:hidden;backface-visibility:hidden}.swiper-container-coverflow .swiper-wrapper{-ms-perspective:1200px}", ""]);

// exports


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

/***/ 535:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


// Copyright: Hiroshi Ichikawa <http://gimite.net/en/>
// License: New BSD License
// Reference: http://dev.w3.org/html5/websockets/
// Reference: http://tools.ietf.org/html/rfc6455

(function () {

  if (window.WEB_SOCKET_FORCE_FLASH) {
    // Keeps going.
  } else if (window.WebSocket) {
    return;
  } else if (window.MozWebSocket) {
    // Firefox.
    window.WebSocket = MozWebSocket;
    return;
  }

  var logger;
  if (window.WEB_SOCKET_LOGGER) {
    logger = WEB_SOCKET_LOGGER;
  } else if (window.console && window.console.log && window.console.error) {
    // In some environment, console is defined but console.log or console.error is missing.
    logger = window.console;
  } else {
    logger = { log: function log() {}, error: function error() {} };
  }

  // swfobject.hasFlashPlayerVersion("10.0.0") doesn't work with Gnash.
  if (swfobject.getFlashPlayerVersion().major < 10) {
    logger.error("Flash Player >= 10.0.0 is required.");
    return;
  }
  if (location.protocol == "file:") {
    logger.error("WARNING: web-socket-js doesn't work in file:///... URL " + "unless you set Flash Security Settings properly. " + "Open the page via Web server i.e. http://...");
  }

  /**
   * Our own implementation of WebSocket class using Flash.
   * @param {string} url
   * @param {array or string} protocols
   * @param {string} proxyHost
   * @param {int} proxyPort
   * @param {string} headers
   */
  window.WebSocket = function (url, protocols, proxyHost, proxyPort, headers) {
    var self = this;
    self.__id = WebSocket.__nextId++;
    WebSocket.__instances[self.__id] = self;
    self.readyState = WebSocket.CONNECTING;
    self.bufferedAmount = 0;
    self.__events = {};
    if (!protocols) {
      protocols = [];
    } else if (typeof protocols == "string") {
      protocols = [protocols];
    }
    // Uses setTimeout() to make sure __createFlash() runs after the caller sets ws.onopen etc.
    // Otherwise, when onopen fires immediately, onopen is called before it is set.
    self.__createTask = setTimeout(function () {
      WebSocket.__addTask(function () {
        self.__createTask = null;
        WebSocket.__flash.create(self.__id, url, protocols, proxyHost || null, proxyPort || 0, headers || null);
      });
    }, 0);
  };

  /**
   * Send data to the web socket.
   * @param {string} data  The data to send to the socket.
   * @return {boolean}  True for success, false for failure.
   */
  WebSocket.prototype.send = function (data) {
    if (this.readyState == WebSocket.CONNECTING) {
      throw "INVALID_STATE_ERR: Web Socket connection has not been established";
    }
    // We use encodeURIComponent() here, because FABridge doesn't work if
    // the argument includes some characters. We don't use escape() here
    // because of this:
    // https://developer.mozilla.org/en/Core_JavaScript_1.5_Guide/Functions#escape_and_unescape_Functions
    // But it looks decodeURIComponent(encodeURIComponent(s)) doesn't
    // preserve all Unicode characters either e.g. "\uffff" in Firefox.
    // Note by wtritch: Hopefully this will not be necessary using ExternalInterface.  Will require
    // additional testing.
    var result = WebSocket.__flash.send(this.__id, encodeURIComponent(data));
    if (result < 0) {
      // success
      return true;
    } else {
      this.bufferedAmount += result;
      return false;
    }
  };

  /**
   * Close this web socket gracefully.
   */
  WebSocket.prototype.close = function () {
    if (this.__createTask) {
      clearTimeout(this.__createTask);
      this.__createTask = null;
      this.readyState = WebSocket.CLOSED;
      return;
    }
    if (this.readyState == WebSocket.CLOSED || this.readyState == WebSocket.CLOSING) {
      return;
    }
    this.readyState = WebSocket.CLOSING;
    WebSocket.__flash.close(this.__id);
  };

  /**
   * Implementation of {@link <a href="http://www.w3.org/TR/DOM-Level-2-Events/events.html#Events-registration">DOM 2 EventTarget Interface</a>}
   *
   * @param {string} type
   * @param {function} listener
   * @param {boolean} useCapture
   * @return void
   */
  WebSocket.prototype.addEventListener = function (type, listener, useCapture) {
    if (!(type in this.__events)) {
      this.__events[type] = [];
    }
    this.__events[type].push(listener);
  };

  /**
   * Implementation of {@link <a href="http://www.w3.org/TR/DOM-Level-2-Events/events.html#Events-registration">DOM 2 EventTarget Interface</a>}
   *
   * @param {string} type
   * @param {function} listener
   * @param {boolean} useCapture
   * @return void
   */
  WebSocket.prototype.removeEventListener = function (type, listener, useCapture) {
    if (!(type in this.__events)) return;
    var events = this.__events[type];
    for (var i = events.length - 1; i >= 0; --i) {
      if (events[i] === listener) {
        events.splice(i, 1);
        break;
      }
    }
  };

  /**
   * Implementation of {@link <a href="http://www.w3.org/TR/DOM-Level-2-Events/events.html#Events-registration">DOM 2 EventTarget Interface</a>}
   *
   * @param {Event} event
   * @return void
   */
  WebSocket.prototype.dispatchEvent = function (event) {
    var events = this.__events[event.type] || [];
    for (var i = 0; i < events.length; ++i) {
      events[i](event);
    }
    var handler = this["on" + event.type];
    if (handler) handler.apply(this, [event]);
  };

  /**
   * Handles an event from Flash.
   * @param {Object} flashEvent
   */
  WebSocket.prototype.__handleEvent = function (flashEvent) {

    if ("readyState" in flashEvent) {
      this.readyState = flashEvent.readyState;
    }
    if ("protocol" in flashEvent) {
      this.protocol = flashEvent.protocol;
    }

    var jsEvent;
    if (flashEvent.type == "open" || flashEvent.type == "error") {
      jsEvent = this.__createSimpleEvent(flashEvent.type);
    } else if (flashEvent.type == "close") {
      jsEvent = this.__createSimpleEvent("close");
      jsEvent.wasClean = flashEvent.wasClean ? true : false;
      jsEvent.code = flashEvent.code;
      jsEvent.reason = flashEvent.reason;
    } else if (flashEvent.type == "message") {
      var data = decodeURIComponent(flashEvent.message);
      jsEvent = this.__createMessageEvent("message", data);
    } else {
      throw "unknown event type: " + flashEvent.type;
    }

    this.dispatchEvent(jsEvent);
  };

  WebSocket.prototype.__createSimpleEvent = function (type) {
    if (document.createEvent && window.Event) {
      var event = document.createEvent("Event");
      event.initEvent(type, false, false);
      return event;
    } else {
      return { type: type, bubbles: false, cancelable: false };
    }
  };

  WebSocket.prototype.__createMessageEvent = function (type, data) {
    if (window.MessageEvent && typeof MessageEvent == "function" && !window.opera) {
      return new MessageEvent("message", {
        "view": window,
        "bubbles": false,
        "cancelable": false,
        "data": data
      });
    } else if (document.createEvent && window.MessageEvent && !window.opera) {
      var event = document.createEvent("MessageEvent");
      event.initMessageEvent("message", false, false, data, null, null, window, null);
      return event;
    } else {
      // Old IE and Opera, the latter one truncates the data parameter after any 0x00 bytes.
      return { type: type, data: data, bubbles: false, cancelable: false };
    }
  };

  /**
   * Define the WebSocket readyState enumeration.
   */
  WebSocket.CONNECTING = 0;
  WebSocket.OPEN = 1;
  WebSocket.CLOSING = 2;
  WebSocket.CLOSED = 3;

  // Field to check implementation of WebSocket.
  WebSocket.__isFlashImplementation = true;
  WebSocket.__initialized = false;
  WebSocket.__flash = null;
  WebSocket.__instances = {};
  WebSocket.__tasks = [];
  WebSocket.__nextId = 0;

  /**
   * Load a new flash security policy file.
   * @param {string} url
   */
  WebSocket.loadFlashPolicyFile = function (url) {
    WebSocket.__addTask(function () {
      WebSocket.__flash.loadManualPolicyFile(url);
    });
  };

  /**
   * Loads WebSocketMain.swf and creates WebSocketMain object in Flash.
   */
  WebSocket.__initialize = function () {

    if (WebSocket.__initialized) return;
    WebSocket.__initialized = true;

    if (WebSocket.__swfLocation) {
      // For backword compatibility.
      window.WEB_SOCKET_SWF_LOCATION = WebSocket.__swfLocation;
    }
    if (!window.WEB_SOCKET_SWF_LOCATION) {
      logger.error("[WebSocket] set WEB_SOCKET_SWF_LOCATION to location of WebSocketMain.swf");
      return;
    }
    if (!window.WEB_SOCKET_SUPPRESS_CROSS_DOMAIN_SWF_ERROR && !WEB_SOCKET_SWF_LOCATION.match(/(^|\/)WebSocketMainInsecure\.swf(\?.*)?$/) && WEB_SOCKET_SWF_LOCATION.match(/^\w+:\/\/([^\/]+)/)) {
      var swfHost = RegExp.$1;
      if (location.host != swfHost) {
        logger.error("[WebSocket] You must host HTML and WebSocketMain.swf in the same host " + "('" + location.host + "' != '" + swfHost + "'). " + "See also 'How to host HTML file and SWF file in different domains' section " + "in README.md. If you use WebSocketMainInsecure.swf, you can suppress this message " + "by WEB_SOCKET_SUPPRESS_CROSS_DOMAIN_SWF_ERROR = true;");
      }
    }
    var container = document.createElement("div");
    container.id = "webSocketContainer";
    // Hides Flash box. We cannot use display: none or visibility: hidden because it prevents
    // Flash from loading at least in IE. So we move it out of the screen at (-100, -100).
    // But this even doesn't work with Flash Lite (e.g. in Droid Incredible). So with Flash
    // Lite, we put it at (0, 0). This shows 1x1 box visible at left-top corner but this is
    // the best we can do as far as we know now.
    container.style.position = "absolute";
    if (WebSocket.__isFlashLite()) {
      container.style.left = "0px";
      container.style.top = "0px";
    } else {
      container.style.left = "-100px";
      container.style.top = "-100px";
    }
    var holder = document.createElement("div");
    holder.id = "webSocketFlash";
    container.appendChild(holder);
    document.body.appendChild(container);
    // See this article for hasPriority:
    // http://help.adobe.com/en_US/as3/mobile/WS4bebcd66a74275c36cfb8137124318eebc6-7ffd.html
    swfobject.embedSWF(WEB_SOCKET_SWF_LOCATION, "webSocketFlash", "1" /* width */
    , "1" /* height */
    , "10.0.0" /* SWF version */
    , null, null, { hasPriority: true, swliveconnect: true, allowScriptAccess: "always" }, null, function (e) {
      if (!e.success) {
        logger.error("[WebSocket] swfobject.embedSWF failed");
      }
    });
  };

  /**
   * Called by Flash to notify JS that it's fully loaded and ready
   * for communication.
   */
  WebSocket.__onFlashInitialized = function () {
    // We need to set a timeout here to avoid round-trip calls
    // to flash during the initialization process.
    setTimeout(function () {
      WebSocket.__flash = document.getElementById("webSocketFlash");
      WebSocket.__flash.setCallerUrl(location.href);
      WebSocket.__flash.setDebug(!!window.WEB_SOCKET_DEBUG);
      for (var i = 0; i < WebSocket.__tasks.length; ++i) {
        WebSocket.__tasks[i]();
      }
      WebSocket.__tasks = [];
    }, 0);
  };

  /**
   * Called by Flash to notify WebSockets events are fired.
   */
  WebSocket.__onFlashEvent = function () {
    setTimeout(function () {
      try {
        // Gets events using receiveEvents() instead of getting it from event object
        // of Flash event. This is to make sure to keep message order.
        // It seems sometimes Flash events don't arrive in the same order as they are sent.
        var events = WebSocket.__flash.receiveEvents();
        for (var i = 0; i < events.length; ++i) {
          WebSocket.__instances[events[i].webSocketId].__handleEvent(events[i]);
        }
      } catch (e) {
        logger.error(e);
      }
    }, 0);
    return true;
  };

  // Called by Flash.
  WebSocket.__log = function (message) {
    logger.log(decodeURIComponent(message));
  };

  // Called by Flash.
  WebSocket.__error = function (message) {
    logger.error(decodeURIComponent(message));
  };

  WebSocket.__addTask = function (task) {
    if (WebSocket.__flash) {
      task();
    } else {
      WebSocket.__tasks.push(task);
    }
  };

  /**
   * Test if the browser is running flash lite.
   * @return {boolean} True if flash lite is running, false otherwise.
   */
  WebSocket.__isFlashLite = function () {
    if (!window.navigator || !window.navigator.mimeTypes) {
      return false;
    }
    var mimeType = window.navigator.mimeTypes["application/x-shockwave-flash"];
    if (!mimeType || !mimeType.enabledPlugin || !mimeType.enabledPlugin.filename) {
      return false;
    }
    return mimeType.enabledPlugin.filename.match(/flashlite/i) ? true : false;
  };

  if (!window.WEB_SOCKET_DISABLE_AUTO_INITIALIZATION) {
    // NOTE:
    //   This fires immediately if web_socket.js is dynamically loaded after
    //   the document is loaded.
    swfobject.addDomLoadEvent(function () {
      WebSocket.__initialize();
    });
  }
})();

/***/ }),

/***/ 548:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function($) {

Object.defineProperty(exports, "__esModule", {
    value: true
});

var _mintUi = __webpack_require__(54);

var _vuex = __webpack_require__(70);

var _vueAwesomeSwiper = __webpack_require__(136);

var _wxfunction = __webpack_require__(517);

var _wxfunction2 = _interopRequireDefault(_wxfunction);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

__webpack_require__(516); //
//
//
//
//
//
//
//
//
//
//
//
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
    props: ['isEmojiBox', 'userId', 'liveId', 'type'],
    data: function data() {
        return {
            isEmojiData: [], //表情數據
            expressionNumber: [], //表情码
            emSwiperOption: {
                slidesPerGroup: 4,
                loopFillGroupWithBlank: true,
                slidesPerView: 4,
                slidesPerColumn: 2,
                slidesPerColumnFill: 'row',
                notNextTick: true,
                pagination: {
                    el: '.swiper-pagination'

                }

            }
        };
    },

    computed: (0, _vuex.mapState)({
        swiper: function swiper() {
            return this.$refs.mySwiperq.swiper;
        }
    }),
    created: function created() {
        this.getEmoji();
    },

    methods: {
        getEmoji: function getEmoji() {
            var _this2 = this;

            this.$http.get('/Expression/getExpressionList').then(function (res) {
                if (res.body.code == 200) {
                    _this2.isEmojiData = res.body.data;
                    var _this = _this2;
                    $.each(_this2.isEmojiData, function (index, item) {
                        _this.expressionNumber.push(item.expression_number);
                    });
                    _this2.$emit('EmojiData', _this2.isEmojiData);
                }
            });
        },
        emojiSave: function emojiSave(number) {
            if (this.type == 0) {
                //講師發送
                _wxfunction2.default.sendMessage(+this.userId, +this.liveId, number, 0, 0);
                this.$emit('showeditMask');
            } else {
                _mintUi.Indicator.open();
                _wxfunction2.default.sendTalkMessage(+this.userId, +this.liveId, number);
                setTimeout(function () {
                    _mintUi.Indicator.close();
                    (0, _mintUi.Toast)({
                        message: '留言成功',
                        iconClass: 'icon icon-success',
                        duration: 3000
                    });
                }, 2000);
            }

            this.$emit('isEmojiBoxFun', false);
        }
    },
    components: {
        swiper: _vueAwesomeSwiper.swiper,
        swiperSlide: _vueAwesomeSwiper.swiperSlide
    }
};
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(49)))

/***/ }),

/***/ 549:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function($) {

Object.defineProperty(exports, "__esModule", {
    value: true
});

var _vueAwesomeSwiper = __webpack_require__(136);

var _mintUi = __webpack_require__(54);

__webpack_require__(516); //
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
    props: ['vipMemberList', 'vipMemberTotal', 'isInIt'],
    data: function data() {
        return {
            VipSwiperOption: {
                // 所有配置均为可选（同Swiper配置）
                autoplay: 3000,
                speed: 800,
                loop: true,
                notNextTick: true,
                autoplayDisableOnInteraction: false,
                observer: true, //修改swiper自己或子元素时，自动初始化swiper
                observeParents: true ////修改swiper的父元素时，自动初始化swiper
            },
            isVipClick: false //是否展开会员坐席
            /*  vipMemberList:[],//vip 會員席位
              vipMemberTotal:0,//vip 会员总人数*/
        };
    },
    created: function created() {
        console.log(this.isInIt);
    },


    computed: {
        swiper: function swiper() {
            return this.$refs.mySwiper1.swiper;
        }
    },
    methods: {
        vipMemberClick: function vipMemberClick() {
            var _this = this;

            //vip  会员交互
            this.isVipClick = true;
            $('#vipMemberli').show();
            setTimeout(function () {
                $('#vipMemberli').removeClass('vipMember-opacity');
                _this.isVipClick = false;
                $('#vipMemberli').hide();
            }, 5000);
        },
        cancelVipClick: function cancelVipClick() {
            this.isVipClick = false;
            $('#vipMemberli').hide();
            console.log('quxiao');
        }
    },
    watch: {}
};
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(49)))

/***/ }),

/***/ 550:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.container .top-header .right-tabber a.vipMember {\n  background: #e3d09f;\n  position: relative;\n}\n.container .top-header .right-tabber a.vipMember i {\n    width: 10px;\n    height: 26px;\n    background: url(\"/images/vip/vip-ionic-left.png\") no-repeat;\n    background-size: 80%;\n    position: absolute;\n    left: -8px;\n    top: 28%;\n}\n.container .top-header .right-tabber a.vipMember .swiper-container {\n    width: 95%;\n    height: 95%;\n}\n.container .top-header .right-tabber a.vipMember .swiper-container .head {\n      margin-top: 20%;\n      width: 60%;\n      height: 60%;\n      border-radius: 50%;\n}\n.container .top-header .right-tabber a.vipMember .swiper-container .avatar {\n      position: absolute;\n      top: 0;\n      left: 0;\n      border-radius: 0;\n      z-index: 20;\n      width: 100%;\n      height: 100%;\n}\n.container .top-header .right-tabber a.vipMember .swiper-container p {\n      position: absolute;\n      bottom: 0.1rem;\n      z-index: 25;\n      right: 5px;\n      background: url(/images/vip/VIP-ben.png) no-repeat;\n      background-size: 100% 100%;\n      width: .25rem;\n      height: 0.29rem;\n      font-size: xx-small;\n      color: #fff280;\n      line-height: 0.3rem;\n}\n.container .top-header .right-tabber a.vipMember .vipMemberli {\n    width: 4rem;\n    position: absolute;\n    top: 0;\n    height: 100%;\n    background: #e3d09f;\n    right: 0rem;\n    border-radius: 2rem;\n    display: none;\n    z-index: 99;\n}\n.container .top-header .right-tabber a.vipMember .vipMemberli span {\n      line-height: 0.9rem;\n      display: block;\n      font-size: .22rem;\n      float: right;\n}\n.container .top-header .right-tabber a.vipMember .vipMemberli span b {\n        margin-left: 0.2rem;\n        background: url(\"/images/vip/shouqi-ben.png\") no-repeat;\n        width: 10px;\n        height: 18px;\n        display: block;\n        float: right;\n        margin-top: 0.25rem;\n        margin-right: 0.2rem;\n}\n.container .top-header .right-tabber a.vipMember .vipMemberli li {\n      width: 0.9rem;\n      height: 0.9rem;\n      float: left;\n      position: relative;\n}\n.container .top-header .right-tabber a.vipMember .vipMemberli li .head {\n        margin-top: 20%;\n        width: 60%;\n        height: 60%;\n        border-radius: 50%;\n}\n.container .top-header .right-tabber a.vipMember .vipMemberli li .avatar {\n        position: absolute;\n        top: 0;\n        left: 0;\n        border-radius: 0;\n        z-index: 20;\n        width: 100%;\n        height: 100%;\n}\n.container .top-header .right-tabber a.vipMember .vipMemberli li p {\n        position: absolute;\n        bottom: 0.1rem;\n        z-index: 25;\n        right: 10px;\n        background: url(/images/vip/VIP-ben.png) no-repeat;\n        background-size: 100% 100%;\n        width: .25rem;\n        height: 0.29rem;\n        font-size: xx-small;\n        color: #fff280;\n        line-height: 0.3rem;\n}\n.vipMember-opacity {\n  -webkit-animation: commentRooms 5s linear forwards;\n          animation: commentRooms 5s linear forwards;\n}\n@-webkit-keyframes commentRooms {\nfrom {\n    opacity: 1;\n}\nto {\n    opacity: 0;\n    display: none;\n}\n}\n@keyframes commentRooms {\nfrom {\n    opacity: 1;\n}\nto {\n    opacity: 0;\n    display: none;\n}\n}\n", ""]);

// exports


/***/ }),

/***/ 551:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.emoji {\n  position: absolute;\n  bottom: 0;\n  width: 100%;\n  overflow: hidden;\n}\n.emoji div, .emoji ul {\n    max-width: initial;\n}\n.emoji .emoji-container {\n    padding-top: .16rem;\n    height: 100%;\n}\n.emoji .emoji-container .swiper-container {\n      height: 4rem;\n      padding-left: 12px;\n}\n.emoji .emoji-container .swiper-container .swiper-wrapper {\n        position: initial;\n}\n.emoji .emoji-container .swiper-container .swiper-wrapper .swiper-slide {\n          height: 1.6rem;\n}\n.emoji .emoji-container .swiper-container .swiper-wrapper .swiper-slide a {\n            padding-right: 15%;\n            display: block;\n            width: 85%;\n            height: 1.6rem;\n}\n.emoji .emoji-container .swiper-container .swiper-wrapper .swiper-slide a .gift-img {\n              height: 1.1rem;\n}\n.emoji .emoji-container .swiper-container .swiper-wrapper .swiper-slide a .gift-img img {\n                width: 100%;\n                height: 100%;\n}\n.emoji .emoji-container .swiper-container .swiper-wrapper .swiper-slide a h4 {\n              padding-top: .16rem;\n              font-size: 0.20rem;\n              color: #333;\n              display: block;\n              text-align: center;\n              overflow: hidden;\n              white-space: nowrap;\n              text-overflow: ellipsis;\n}\n.emoji .emoji-container .swiper-container .swiper-pagination-bullet {\n        width: 4px;\n        height: 4px;\n        background: #888888;\n        opacity: .5;\n        margin: 0 3px;\n        border-radius: 3px;\n}\n.emoji .emoji-container .swiper-container .swiper-pagination-bullet-active {\n        background: #888888;\n        width: 7px;\n        border-radius: 3px;\n        opacity: 1;\n}\n.emoji .emoji-container .swiper-container .swiper-pagination-bullets {\n        bottom: 5px;\n}\n.emoji .emoji-container:after {\n      content: \"\";\n      display: block;\n      clear: both;\n}\n.emoji .reward {\n    position: relative;\n    width: 100%;\n    -webkit-transform: translateY(100%);\n        -ms-transform: translateY(100%);\n            transform: translateY(100%);\n    -webkit-transition: -webkit-transform 0.3s ease;\n    transition: -webkit-transform 0.3s ease;\n    transition: transform 0.3s ease;\n    transition: transform 0.3s ease, -webkit-transform 0.3s ease;\n    background: #ffffff;\n    z-index: 1000;\n}\n.emoji .reward.active {\n      -webkit-transform: translateY(0);\n          -ms-transform: translateY(0);\n              transform: translateY(0);\n}\n.emoji .reward article {\n      position: relative;\n}\n.emoji .reward h5 {\n      line-height: 1rem;\n      color: #1c0808;\n      font-size: 0.32rem;\n      padding-left: 0.24rem;\n      height: 1rem;\n      border-bottom: 1px solid #e8e8e8;\n      text-align: center;\n      position: relative;\n}\n.emoji .reward h5 span {\n        position: absolute;\n        top: 0;\n        right: 0;\n        width: 1rem;\n        height: 1rem;\n        background: url(\"/images/cha.png\") no-repeat center center;\n        background-size: 32% 32%;\n}\n.emoji .reward .reward-bottom a {\n      display: block;\n}\n.emoji .reward .reward-bottom a:first-child {\n      font-size: 0.24rem;\n      color: #888;\n      text-align: center;\n      padding-bottom: .16rem;\n      padding-top: .4rem;\n}\n.emoji .reward .reward-bottom a:last-child {\n      display: block;\n      background-color: #888;\n      color: #fff;\n      font-size: 0.32rem;\n      line-height: 1rem;\n      height: 1rem;\n      width: 100%;\n      text-align: center;\n}\n.emoji .reward .reward-bottom a:last-child.active {\n        background-color: #c62f2f;\n}\n", ""]);

// exports


/***/ }),

/***/ 552:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(557)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(548),
  /* template */
  __webpack_require__(555),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\subcomponents\\live\\em.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] em.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-1734cbc6", Component.options)
  } else {
    hotAPI.reload("data-v-1734cbc6", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 553:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(556)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(549),
  /* template */
  __webpack_require__(554),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\subcomponents\\live\\liveVipMember.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] liveVipMember.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-033637a6", Component.options)
  } else {
    hotAPI.reload("data-v-033637a6", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 554:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('a', {
    staticClass: "vipMember",
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": function($event) {
        _vm.vipMemberClick()
      }
    }
  }, [_c('i'), _vm._v(" "), _c('swiper', {
    ref: "mySwiper1",
    attrs: {
      "options": _vm.VipSwiperOption
    }
  }, _vm._l((_vm.vipMemberList), function(item) {
    return _c('swiper-slide', [_c('img', {
      staticClass: "head",
      attrs: {
        "src": item.head
      }
    }), _vm._v(" "), _c('img', {
      staticClass: "avatar",
      attrs: {
        "src": '/images/vip/vip' + item.vipLevel + '_avatar_bg.png'
      }
    }), _vm._v(" "), _c('p', [_vm._v(_vm._s(item.vipLevel))])])
  })), _vm._v(" "), _c('div', {
    staticClass: "vipMemberli",
    class: {
      'vipMember-opacity': _vm.isVipClick
    },
    attrs: {
      "id": "vipMemberli"
    }
  }, [_c('ul', _vm._l((_vm.vipMemberList), function(item, key) {
    return (key < 3) ? _c('li', [_c('img', {
      staticClass: "head",
      attrs: {
        "src": item.head
      }
    }), _vm._v(" "), _c('img', {
      staticClass: "avatar",
      attrs: {
        "src": '/images/vip/vip' + item.vipLevel + '_avatar_bg.png'
      }
    }), _vm._v(" "), _c('p', [_vm._v(_vm._s(item.vipLevel))])]) : _vm._e()
  })), _vm._v(" "), _c('span', {
    on: {
      "click": function($event) {
        $event.stopPropagation();
        _vm.cancelVipClick()
      }
    }
  }, [_vm._v(_vm._s(_vm.vipMemberTotal) + "人 "), _c('b')])])], 1)
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-033637a6", module.exports)
  }
}

/***/ }),

/***/ 555:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "emoji"
  }, [_c('div', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.isEmojiBox),
      expression: "isEmojiBox"
    }],
    staticClass: "reward active"
  }, [_c('div', {
    staticClass: "emoji-container"
  }, [_c('swiper', {
    ref: "mySwiperq",
    attrs: {
      "options": _vm.emSwiperOption
    }
  }, [_vm._l((_vm.isEmojiData), function(item) {
    return _c('swiper-slide', {
      key: item.id
    }, [_c('a', {
      attrs: {
        "href": "javascript:;"
      },
      on: {
        "click": function($event) {
          _vm.emojiSave(item.expression_number)
        }
      }
    }, [_c('div', {
      staticClass: "gift-img"
    }, [_c('img', {
      attrs: {
        "src": item.qiniuImg
      }
    })]), _vm._v(" "), _c('h4', [_vm._v(_vm._s(item.name))])])])
  }), _vm._v(" "), _c('div', {
    staticClass: "swiper-pagination",
    slot: "pagination"
  })], 2)], 1)])])
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-1734cbc6", module.exports)
  }
}

/***/ }),

/***/ 556:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(550);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("37a944ae", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-033637a6\",\"scoped\":false,\"hasInlineConfig\":true}!../../../node_modules/sass-loader/lib/loader.js!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./liveVipMember.vue", function() {
     var newContent = require("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-033637a6\",\"scoped\":false,\"hasInlineConfig\":true}!../../../node_modules/sass-loader/lib/loader.js!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./liveVipMember.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 557:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(551);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("31f1aa9c", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-1734cbc6\",\"scoped\":false,\"hasInlineConfig\":true}!../../../node_modules/sass-loader/lib/loader.js!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./em.vue", function() {
     var newContent = require("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-1734cbc6\",\"scoped\":false,\"hasInlineConfig\":true}!../../../node_modules/sass-loader/lib/loader.js!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./em.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 699:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function($) {

Object.defineProperty(exports, "__esModule", {
    value: true
});

var _vuex = __webpack_require__(70);

exports.default = {
    props: ['liveData', 'PayType', 'isLink'],
    data: function data() {
        return {
            gift: [], //赞赏礼物
            sendgiftbtn: true,
            payboxShow: false,
            remake: {}, //礼物
            disabled: false, // 送礼数量减
            giftNumber: 1, // 送礼数量
            giftAmount: "", //我的总值
            payAmount: "", //支付的金额
            showCodePayPopup: false, //是否显示扫描支付
            CodeIng: '' //微信二维码支付码
        };
    },
    created: function created() {
        this.getGiftBalance();
    },

    computed: (0, _vuex.mapState)({
        userId: function userId(state) {
            return state.userInfo.user_id;
        },
        isWeiXin: function isWeiXin(state) {
            return state.isWeiXin;
        }
    }),
    mounted: function mounted() {
        this.rewardClick();
    },

    methods: {
        WechatPay: function WechatPay(order_no, orderNoTime) {
            var _this2 = this;

            //訂單状态查询
            console.log('123456');
            this.$http.post(this.hostUrl + "/WechatPay/orderStatus", { order_no: order_no }, { emulateJSON: true }).then(function (res) {
                console.log(res);
                if (res.body.data == 1) {
                    //支付成功
                    _this2.showCodePayPopup = false;
                    clearInterval(orderNoTime);

                    _this2.getGiftBalance();
                    _this2.sendGift();
                }
            });
        },

        //支付
        toCharge: function toCharge(amount) {
            var _this3 = this;

            this.Countdown = 60;
            //充值
            var reg = /^[0-9]*[1-9][0-9]*$/;

            if (amount.length > 6) {
                //                Toast('应小于六位数');
                return;
            }
            if (amount > 0) {
                if (this.isWeiXin) {
                    this.$http.post(this.hostUrl + "/WechatPay/inpour", { user_id: this.userId, amount: amount }, { emulateJSON: true }).then(function (res) {
                        _this3.jsonstr = res.body;
                        console.log("setChargeNum", _this3.setChargeNum);
                        _this3.payAmount = amount;
                        _this3.callpay();
                    });
                } else {
                    //二维码支付
                    this.$http.post(this.hostUrl + "/WechatPay/native_pay", { user_id: this.userId, amount: amount }, { emulateJSON: true }).then(function (res) {
                        console.log(res.body.data);
                        _this3.CodeIng = res.body.data.qr_url;
                        _this3.showCodePayPopup = true;
                        var order_no = res.body.data.order_no;
                        var orderNoTime = setInterval(function (res) {
                            _this3.WechatPay(order_no, orderNoTime);
                        }, 2000);

                        var time = setInterval(function (res) {
                            if (_this3.Countdown == 0) {
                                _this3.showCodePayPopup = false;
                                clearInterval(orderNoTime);
                                clearInterval(time);
                            } else {
                                _this3.Countdown--;
                            }
                        }, 1000);
                    });
                }
            }
        },

        //微信支付
        jsApiCall: function jsApiCall() {
            var _this = this;
            WeixinJSBridge.invoke("getBrandWCPayRequest", JSON.parse(this.jsonstr), function (res) {

                WeixinJSBridge.log("res.err_msg", res.err_msg);
                if (res.err_msg == "get_brand_wcpay_request:ok") {
                    //支付成功
                    _this.showSetAmountPopup = false;
                    _this.getGiftBalance();
                    var giftpage = sessionStorage.getItem("giftpage"); //判断是否是从我的进来的
                    var referrer = sessionStorage.getItem("referrer");

                    // Toast({
                    //     //						        message: '充值成功,增加'+_this.payAmount+'',
                    //     message: `
                    //     已成功充值${_this.payAmount}
                    //     `,
                    //     duration: 2000
                    // });


                    // setTimeout(() => {
                    //     window.history.go(-1)
                    // }, 100)
                    _this.sendGift();
                }
                if (res.err_msg == "get_brand_wcpay_request:cancel") {
                    Toast({
                        //取消支付
                        message: "已取消充值",
                        duration: 2000
                    });
                }
                if (res.err_msg == "get_brand_wcpay_request:fail") {
                    Toast("支付失败");
                }
            });
        },
        callpay: function callpay() {
            if (typeof WeixinJSBridge == "undefined") {
                if (document.addEventListener) {
                    document.addEventListener("WeixinJSBridgeReady", this.jsApiCall, false);
                } else if (document.attachEvent) {
                    document.attachEvent("WeixinJSBridgeReady", this.jsApiCall);
                    document.attachEvent("onWeixinJSBridgeReady", this.jsApiCall);
                }
            } else {
                this.jsApiCall();
            }
        },
        getGiftBalance: function getGiftBalance() {
            var _this4 = this;

            //获取账户
            this.$http.get(this.hostUrl + "/User/getAccountBalance").then(function (res) {
                if (res.body.code == 200) {
                    _this4.giftAmount = res.body.data;
                }
            });
        },
        reduce: function reduce() {
            this.giftNumber--;
        },
        add: function add() {
            this.giftNumber++;
        },

        /**
         弹出赞赏框
         * */
        rewardClick: function rewardClick() {
            var _this5 = this;

            //弹出赞赏框
            // this.rewardVisible = true;
            this.$http.get('/gift/lists').then(function (res) {
                console.log('礼物', res.body);
                if (res.body.code == 0) {
                    _this5.gift = res.body.data.list;
                    console.log(_this5.gift);
                }
            });
        },

        /**
         赠送礼物
         * */
        sendReward: function sendReward(n) {
            // if (this.giftOptions == -1) {
            //     Toast({message: '请选择想要赠送的礼物', duration: 1000});
            //     return;
            // }
            this.$emit('getGiftBalance');
            this.$emit('getCourseTable');
            /*    this.getGiftBalance();
             this.getCourseTable();*/
            this.giftNumber = 1;
            var gift = this.gift;
            this.remake = {};
            this.num = 1;
            this.remake.giftId = gift[n].gift_id;
            this.remake.giftPrice = gift[n].gift_money;
            this.remake.giftName = gift[n].gift_name;
            this.remake.giftImg = gift[n].gift_img || '/images/1.9/xiaojiangpai-ben@2x.png';
            this.remake.courseId = this.courseId;
            this.remake.giftType = gift[n].gift_type;
            this.remake.type = '1';
            this.remake.content = '';
            this.remake.id = '';
            if (this.PayType == 6) {
                this.remake.courseId = this.liveData.id;
            }
            this.payboxShow = true;
            this.sendgiftbtn = true;
        },

        /**
         赠送礼物
         * */
        sendGift: function sendGift() {
            var _this6 = this;

            console.log('sendGift');
            console.log(this.PayType);
            if (this.remake == {}) {
                return;
            }
            this.payboxShow = false;
            var data = {
                user_id: this.userId,
                amount: this.remake.giftPrice,
                type: this.PayType, //3：live直播打赏 6：课程直播打赏  8：公共直播间送礼
                class_id: this.liveData.id,
                remark: JSON.stringify(this.remake),

                num: this.giftNumber
            };

            console.log(this.liveData);
            this.$http.post('/InpourPay/pay', data, { emulateJSON: true }).then(function (res) {
                // alert(JSON.stringify(res.body));
                if (res.body.code == 0) {
                    // this.rewardVisible = false;
                    // Toast('赠送成功');

                    _this6.getGiftBalance();
                    // this.remake={};
                } else {
                    //余额不足
                    if (_this6.isLink == 0) {
                        _this6.toCharge(_this6.remake.giftPrice * _this6.giftNumber - _this6.giftAmount);
                    } else {
                        _this6.$router.push({ path: '/giftBalance' });
                    }
                }
            });
        }
    },
    watch: {
        payboxShow: function payboxShow(val) {
            if (val == true) {
                //  this.videoPoster = true;
                //  this.isVideoBution = 1;
                //  $('.video').css('height',0);
                $('.video').css({ 'marginTop': '-110px' });
                $('.box-center').css({ 'marginTop': '-154px' });
            } else {
                //  this.isVideoBution = 0;
                //  this.videoPoster = false;
                //   $('.video').css('height','210px');
                // //  $('.box-center').css({'paddingTop':'254px','height':'calc(100vh - 255px)'});
                $('.video').css({ 'marginTop': '0' });
                $('.box-center').css({ 'marginTop': '0' });
            }
        },
        giftNumber: function giftNumber(val) {
            if (val == 0) {
                this.disabled = true;
            } else {
                this.disabled = false;
            }
            if (val > 999) {
                this.giftNumber = 999;
            }
        }
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
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(49)))

/***/ }),

/***/ 702:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.commonGift {\n  position: relative;\n}\n.right-tabber {\n  position: absolute;\n  right: .24rem;\n  bottom: -0.24rem;\n  -webkit-transform: translateY(100%);\n      -ms-transform: translateY(100%);\n          transform: translateY(100%);\n  z-index: 1;\n  display: -webkit-box;\n  display: -webkit-flex;\n  display: -ms-flexbox;\n  display: flex;\n  -webkit-box-orient: vertical;\n  -webkit-box-direction: normal;\n  -webkit-flex-direction: column;\n      -ms-flex-direction: column;\n          flex-direction: column;\n  -webkit-box-align: center;\n  -webkit-align-items: center;\n      -ms-flex-align: center;\n          align-items: center;\n  -webkit-box-pack: center;\n  -webkit-justify-content: center;\n      -ms-flex-pack: center;\n          justify-content: center;\n}\n.right-tabber p {\n    height: 1rem;\n    width: 1rem;\n    margin-bottom: 0.12rem;\n    text-align: center;\n    font-size: 0.18rem;\n    color: #c62f2f;\n    margin-bottom: 0.3rem;\n    box-sizing: border-box;\n    /*&.btn-6 {\n            span {\n                background: url(\"/images/1.9/666-ben@2x.png\") center no-repeat;\n                background-size: 0.5rem auto;\n\n            }\n        }\n        &.btn-18 {\n            span {\n                background: url(\"/images/1.9/jiangpai-ben@2x.png\") center no-repeat;\n                background-size: 0.5rem auto;\n\n            }\n        }\n        &.btn-52 {\n            span {\n                background: url(\"/images/1.9/jinniu-ben@2x.png\") center no-repeat;\n                background-size: 0.5rem auto;\n\n            }\n        }*/\n}\n.right-tabber p a {\n      width: 0.9rem;\n      height: 0.9rem;\n      display: inline-block;\n      background-color: #f2e2aa;\n      border-radius: 50%;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n      -webkit-box-pack: center;\n      -webkit-justify-content: center;\n          -ms-flex-pack: center;\n              justify-content: center;\n      margin-bottom: .05rem;\n}\n.right-tabber p a img {\n        width: 100%;\n        height: 100%;\n        border-radius: 50%;\n}\n.right-tabber p span {\n      width: 0.5rem;\n      display: inline-block;\n      border-radius: 100%;\n      height: 0.5rem;\n}\n.right-tabber p:last-child {\n      margin-bottom: 0;\n}\n.payboxs {\n  position: fixed;\n  top: 40%;\n  left: 50%;\n  z-index: 2017;\n  -webkit-transform: translate3d(-50%, -50%, 0);\n  transform: translate3d(-50%, -50%, 0);\n  background-color: #fff !important;\n  width: 80%;\n  border-radius: 3px;\n  padding: 0;\n  font-size: 0.32rem;\n  -webkit-user-select: none;\n  text-align: center;\n  -webkit-backface-visibility: hidden;\n  backface-visibility: hidden;\n  -webkit-transition: 0.2s;\n  transition: 0.2s;\n}\n.payboxs .num {\n    height: .6rem;\n    display: -webkit-box;\n    display: -webkit-flex;\n    display: -ms-flexbox;\n    display: flex;\n    -webkit-box-pack: center;\n    -webkit-justify-content: center;\n        -ms-flex-pack: center;\n            justify-content: center;\n    -webkit-box-align: center;\n    -webkit-align-items: center;\n        -ms-flex-align: center;\n            align-items: center;\n}\n.payboxs .num .add {\n      width: .59rem;\n      display: inline-block;\n      border: 1px solid #e8e8e8;\n      font-size: .4rem;\n      height: .6rem;\n      line-height: .4rem;\n      color: #c62f2f;\n      background: #ffffff;\n      border-radius: 0px 5px  5px  0px;\n      text-align: center;\n      padding: 0px;\n}\n.payboxs .num .add.reduce {\n        margin-left: .17rem;\n        border-radius: 5px 0px  0px  5px;\n}\n.payboxs .num input {\n      width: .8rem;\n      height: .6rem;\n      border-top: 1px solid #e8e8e8;\n      border-bottom: 1px solid #e8e8e8;\n      border-radius: 0;\n      box-sizing: border-box;\n      text-align: center;\n}\n.payboxs .item {\n    background: #f5f7f8;\n    padding: 0.6rem 0 0.24rem;\n}\n.payboxs .item h4 {\n      color: #c62f2f;\n      font-size: 0.28rem;\n      margin-top: 0.4rem;\n}\n.payboxs h5 {\n    font-size: 0.32rem;\n    color: #1c0808;\n    margin: 0.67rem 0 0.32rem;\n}\n.payboxs p {\n    font-size: 0.28rem;\n    color: #888;\n    margin-bottom: 0.67rem;\n}\n.payboxs p span {\n      margin-left: 0.2rem;\n}\n.payboxs .imgg {\n    display: inline-block;\n    width: 50%;\n    overflow: hidden;\n    height: 1.2rem;\n    background: url(/images/space/icon_course.png) top center no-repeat;\n    background-size: auto 100%;\n}\n.payboxs .btns {\n    background: #c62f2f;\n    height: auto;\n    overflow: hidden;\n    position: relative;\n    width: 100%;\n    padding: 0.2rem 0rem;\n    border-radius: 0 0 0.1rem 0.1rem;\n}\n.payboxs .btns a {\n      width: 49%;\n      float: left;\n      color: #fff;\n      height: 0.7rem;\n      line-height: 0.7rem;\n      text-align: center;\n      display: block;\n}\n.payboxs .btns a:first-child {\n      border-right: 1px solid #e8e8e8;\n}\n", ""]);

// exports


/***/ }),

/***/ 726:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(733)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(699),
  /* template */
  __webpack_require__(729),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\subcomponents\\live\\gift.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] gift.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-6637a136", Component.options)
  } else {
    hotAPI.reload("data-v-6637a136", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 729:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "commonGift"
  }, [(_vm.gift.length > 0) ? _c('div', {
    staticClass: "right-tabber"
  }, [_c('p', {
    staticClass: "btn-6"
  }, [_c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": function($event) {
        _vm.sendReward(0)
      }
    }
  }, [_c('img', {
    attrs: {
      "src": ((_vm.gift[0].gift_img) + "?imageView2/1/w/200/h/200/interlace/1"),
      "alt": ""
    }
  })]), _vm._v("\n            " + _vm._s(_vm.gift[0].gift_money) + "\n        ")]), _vm._v(" "), _c('p', {
    staticClass: "btn-18"
  }, [_c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": function($event) {
        _vm.sendReward(1)
      }
    }
  }, [_c('img', {
    attrs: {
      "src": ((_vm.gift[1].gift_img) + "?imageView2/1/w/200/h/200/interlace/1"),
      "alt": ""
    }
  })]), _vm._v("\n            " + _vm._s(_vm.gift[1].gift_money) + "\n        ")]), _vm._v(" "), _c('p', {
    staticClass: "btn-52"
  }, [_c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": function($event) {
        _vm.sendReward(2)
      }
    }
  }, [_c('img', {
    attrs: {
      "src": ((_vm.gift[2].gift_img) + "?imageView2/1/w/200/h/200/interlace/1"),
      "alt": ""
    }
  })]), _vm._v("\n            " + _vm._s(_vm.gift[2].gift_money) + "\n        ")])]) : _vm._e(), _vm._v(" "), _c('mt-popup', {
    staticClass: "payboxs",
    attrs: {
      "popup-transition": "popup-fade"
    },
    model: {
      value: (_vm.payboxShow),
      callback: function($$v) {
        _vm.payboxShow = $$v
      },
      expression: "payboxShow"
    }
  }, [_c('div', {
    staticClass: "item"
  }, [_c('div', {
    staticClass: "imgg",
    style: ({
      'background-image': 'url(' + _vm.remake.giftImg + ')'
    })
  }), _vm._v(" "), _c('h4', [_vm._v(_vm._s(_vm.remake.giftPrice))])]), _vm._v(" "), _c('h5', {
    staticClass: "num"
  }, [_vm._v("数量\n            "), _c('button', {
    staticClass: "reduce add",
    attrs: {
      "disabled": _vm.disabled
    },
    on: {
      "click": _vm.reduce
    }
  }, [_vm._v("-")]), _vm._v(" "), _c('input', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.giftNumber),
      expression: "giftNumber"
    }],
    attrs: {
      "type": "tel"
    },
    domProps: {
      "value": (_vm.giftNumber)
    },
    on: {
      "input": function($event) {
        if ($event.target.composing) { return; }
        _vm.giftNumber = $event.target.value
      }
    }
  }), _vm._v(" "), _c('button', {
    staticClass: "add",
    on: {
      "click": _vm.add
    }
  }, [_vm._v("+")])]), _vm._v(" "), _c('p', [_vm._v("我的余额:"), _c('span', [_vm._v(_vm._s(_vm.giftAmount))])]), _vm._v(" "), _c('div', {
    staticClass: "btns"
  }, [_c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": function($event) {
        _vm.payboxShow = false
      }
    }
  }, [_vm._v("取消")]), _vm._v(" "), _c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": _vm.sendGift
    }
  }, [_vm._v("立即赠送")])])]), _vm._v(" "), _c('mt-popup', {
    staticClass: "set-amount-popup",
    attrs: {
      "popup-transition": "popup-fade"
    },
    model: {
      value: (_vm.showCodePayPopup),
      callback: function($$v) {
        _vm.showCodePayPopup = $$v
      },
      expression: "showCodePayPopup"
    }
  }, [_c('article', [_c('h3', [_vm._v("使用微信扫码支付")]), _vm._v(" "), _c('section', [_c('img', {
    attrs: {
      "src": _vm.CodeIng
    }
  })])])])], 1)
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-6637a136", module.exports)
  }
}

/***/ }),

/***/ 733:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(702);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("f9c16070", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-6637a136\",\"scoped\":false,\"hasInlineConfig\":true}!../../../node_modules/sass-loader/lib/loader.js!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./gift.vue", function() {
     var newContent = require("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-6637a136\",\"scoped\":false,\"hasInlineConfig\":true}!../../../node_modules/sass-loader/lib/loader.js!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./gift.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 915:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function($) {

Object.defineProperty(exports, "__esModule", {
  value: true
});

var _mintUi = __webpack_require__(54);

var _vuex = __webpack_require__(70);

var _nomore = __webpack_require__(135);

var _nomore2 = _interopRequireDefault(_nomore);

var _socketClient = __webpack_require__(522);

var _socketClient2 = _interopRequireDefault(_socketClient);

var _wxfunction = __webpack_require__(517);

var _wxfunction2 = _interopRequireDefault(_wxfunction);

var _liveVipMember = __webpack_require__(553);

var _liveVipMember2 = _interopRequireDefault(_liveVipMember);

var _LackGifts = __webpack_require__(138);

var _LackGifts2 = _interopRequireDefault(_LackGifts);

var _gift = __webpack_require__(726);

var _gift2 = _interopRequireDefault(_gift);

var _em = __webpack_require__(552);

var _em2 = _interopRequireDefault(_em);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

__webpack_require__(535);

// import { Toast, Indicator } from 'mint-ui'
exports.default = {
  data: function data() {
    var _ref;

    return _ref = {
      isNav: 0, //0 都不显示  1 显示输入框 2显示图片 3显示表情包
      getEmojiData: [],
      studentNum: 0, //在线人数
      isEm: true, //表情与键盘切换
      isEmojiBox: false, //是否显示表情
      //1.9 版本
      tabShow: true, //显示互动
      courseTable: [], //课程表
      teacherData: {}, //老师信息
      closePop: false,
      forbidId: "",
      codeImg: "", //二维码
      loginS: false, //房间是否登录成功
      Countdown: 60, //倒计时
      playVideo: "", //
      tipShow: false, //主题显示
      PayType: 8, //3：live直播打赏 6：课程直播打赏  8：公共直播间送礼
      giftSwiperOption: {
        width: window.innerWidth,
        pagination: ".swiper-pagination"
      },
      playerOptions: "../images/1.9/beijingtu-ben@2x.png", //视频默认地址
      isMsgId: false, //语音定位默认执行一次
      unReadMsgId: "", //語音msgId
      vipMemberList: [], //vip 會員席位
      vipMemberTotal: 0, //vip 会员总人数
      isConcentrate: 0, //消息類型是否為重點
      isVideo: false, //判断是否为录播
      isVideoBution: 1, //0視頻顯示 1視頻隱藏
      videoPoster: false, // false  不显示  true 显示
      // CourseLiveClassification: 1,//1为图文语言（普通），2为视频直播，3为ppt直播
      isPushFlow: true, //true 推流中 false：未推流
      isBrowser: false, //true 微信浏览器   false  其他
      disabled: true,
      msgs: [], //所有信息内容
      comments: [], //所有评论内容
      type: 2, // 0为老师，1为嘉宾，2为学生
      liveStatusEnd: false }, _defineProperty(_ref, "studentNum", 0), _defineProperty(_ref, "msgUrl", "http://file.api.weixin.qq.com/cgi-bin/media/get?"), _defineProperty(_ref, "popupVisible", false), _defineProperty(_ref, "liveData", {
      id: 1000009999
    }), _defineProperty(_ref, "bodyDOM", null), _defineProperty(_ref, "tabberDOM", null), _defineProperty(_ref, "onliveData", {}), _defineProperty(_ref, "showMini", true), _defineProperty(_ref, "showCommentSW", false), _defineProperty(_ref, "forbiddenMode", false), _defineProperty(_ref, "showForbiddenMode", false), _defineProperty(_ref, "showFinishMode", false), _defineProperty(_ref, "showCloseOnLiveMode", false), _defineProperty(_ref, "closeOnLiveMode", true), _defineProperty(_ref, "onLiveCourse", false), _defineProperty(_ref, "hostId", null), _defineProperty(_ref, "commentText", ""), _defineProperty(_ref, "text", ""), _defineProperty(_ref, "commentLastId", 0), _defineProperty(_ref, "loginSuccess", true), _defineProperty(_ref, "commentCount", 0), _defineProperty(_ref, "gotoTabNum", -1), _defineProperty(_ref, "reconnectId", null), _defineProperty(_ref, "noconnectText", "断网了，请稍后重试"), _defineProperty(_ref, "loading", false), _defineProperty(_ref, "commentLoading", false), _defineProperty(_ref, "isEnd", false), _defineProperty(_ref, "commentIsEnd", false), _defineProperty(_ref, "disconnect", false), _defineProperty(_ref, "canTap", true), _defineProperty(_ref, "nowPlayLocalId", ""), _defineProperty(_ref, "firstHostGetMsg", false), _defineProperty(_ref, "courseId", 1000009999), _defineProperty(_ref, "rewardList", []), _defineProperty(_ref, "rewardLoading", true), _defineProperty(_ref, "rewardPage", 1), _defineProperty(_ref, "rewardEnd", false), _defineProperty(_ref, "rewardVisible", false), _defineProperty(_ref, "gift", []), _defineProperty(_ref, "gifts", []), _defineProperty(_ref, "giftOptions", -1), _defineProperty(_ref, "rewardQue", []), _defineProperty(_ref, "rewardShowing", false), _defineProperty(_ref, "showRedPacket", false), _defineProperty(_ref, "redpacketMoney", 0), _defineProperty(_ref, "answerComment", false), _defineProperty(_ref, "answerUserInfo", {}), _defineProperty(_ref, "goWall", false), _defineProperty(_ref, "isFocus", false), _defineProperty(_ref, "aidCode", ""), _defineProperty(_ref, "qiNiuDomain", "http://oqt46pvmm.bkt.clouddn.com/"), _defineProperty(_ref, "pcImageUrl", ""), _defineProperty(_ref, "isMobile", "true"), _defineProperty(_ref, "localLoading", false), _defineProperty(_ref, "isrecord", false), _defineProperty(_ref, "isShowMsgMask", false), _defineProperty(_ref, "mainHeight", ""), _defineProperty(_ref, "bodyHeight", ""), _defineProperty(_ref, "loadingLive", false), _defineProperty(_ref, "fristData", false), _defineProperty(_ref, "vipLevel", 0), _defineProperty(_ref, "vipLevelUrl", "/images/vip/vip0_avatar_bg.png"), _defineProperty(_ref, "vipLevelT", "/images/vip/vip0_avatar_bg.png"), _defineProperty(_ref, "images", {
      localId: "",
      serverId: "",
      downloadId: ""
    }), _defineProperty(_ref, "live_state", 2), _defineProperty(_ref, "showVipAnimate", false), _defineProperty(_ref, "giftPageTotal", ""), _defineProperty(_ref, "isRefresh", false), _defineProperty(_ref, "userLevel", ""), _defineProperty(_ref, "isWap", false), _defineProperty(_ref, "isPages", false), _defineProperty(_ref, "maxL", ""), _defineProperty(_ref, "minL", ""), _defineProperty(_ref, "liveIsEnd", false), _defineProperty(_ref, "liveLoading", false), _defineProperty(_ref, "isloadTops", 0), _defineProperty(_ref, "isShowGify", true), _defineProperty(_ref, "isLink", 0), _defineProperty(_ref, "videonth", false), _defineProperty(_ref, "isUserTypeAssistant", 0), _defineProperty(_ref, "isLivePassWord", false), _defineProperty(_ref, "livePassWord", ""), _defineProperty(_ref, "idPasswordCorrect", false), _defineProperty(_ref, "idPasswordCorrectText", ""), _ref;
  },

  computed: (0, _vuex.mapState)({
    isWeiXin: function isWeiXin(state) {
      return state.isWeiXin;
    },
    userId: function userId(state) {
      return state.userInfo.user_id;
    },
    userAvatar: function userAvatar(state) {
      return state.userInfo.img;
    },
    username: function username(state) {
      return state.userInfo.username;
    },
    sdkdata: function sdkdata(state) {
      return state.sdkdata;
    },
    userInfo: function userInfo(state) {
      return state.userInfo;
    },
    userVip: function userVip(state) {
      return state.userInfo.vipLevel;
    },
    msgFirstId: function msgFirstId() {
      return this.msgs[0].msgId;
    },
    isSubscribe: function isSubscribe() {
      return this.$store.state.userInfo.isSubscribe;
    }
  }),
  destroyed: function destroyed() {
    _mintUi.Indicator.close();
  },
  updated: function updated() {
    /*this.$nextTick(()=>{
             this.mainHeight = this.$refs.main.height;
             this.bodyHeight = this.$refs.body.height;
             })*/
  },
  created: function created() {
    var _this2 = this;

    this.getAccountBalance();
    this.getCourseTable();

    this.getUserInfo();
    // wxfun.joinRoom(+this.userId, +this.courseId);
    this.$store.dispatch("getUserInfo", function (res) {
      _this2.$store.commit("setTitle", "公共直播间");
      // this.getData();

      //  this.rewardClick();
      _this2.getTeacherData();
      _this2.getGiftBalance();
      _this2.getBgRmg();
      _this2.tipShowFun();
      if (_this2.isSubscribe == false) {
        if (_this2.$route.query.shareId == 1) {
          _this2.getQrCode();
        }
      }
    });
    if (this.isWeiXin) {
      this.isBrowser = true;
    } else {
      this.isBrowser = false;
    }
    this.$store.commit("hideTabber");
    if (/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent) && this.isWeiXin) {
      this.isMobile = true;
    } else {
      this.isMobile = false;
    }
  },
  beforeDestroy: function beforeDestroy() {
    _wxfunction2.default.leaveRoom(+this.userId, +this.courseId);
    clearInterval(_socketClient2.default.setping);
    _socketClient2.default.ws.close();
  },
  mounted: function mounted() {
    if (!this.isWeiXin) {
      var $publicOnlivePage = $(".publicOnlivePage");
    }
    this.bodyDOM = this.$refs.body;
    this.tabberDOM = this.$refs.tabber;
  },

  filters: {
    formatComment: function formatComment(str) {
      return str.length > 10 ? str.substring(0, 10) + "..." : str;
    }
  },
  methods: {
    /**
     * 获取公众号二维码
     * @return [type] [description]
     */
    getQrCode: function getQrCode() {
      var _this3 = this;

      this.$http.get("/Home/getQrCode").then(function (res) {
        _this3.codeImg = res.data.data;
        _this3.closePop = true;
      });
    },
    checkPassword: function checkPassword() {
      var _this4 = this;

      //密码验证
      this.$http.post("/GlobalLive/checkPassword", {
        courseId: this.teacherData.courseId,
        password: this.livePassWord,
        device: "weixin"
      }, { emulateJSON: true }).then(function (res) {
        if (res.body.data.returnCode == 4200) {
          //正确
          _this4.isLivePassWord = false;
          _this4.isVideoBution = 0;
          _this4.getBgRmg();
        } else {
          _this4.idPasswordCorrect = true;
          _this4.idPasswordCorrectText = "密码错误";
        }
      });
    },
    clickLivePassWord: function clickLivePassWord(type) {
      //密码输入0 取消  1确定
      if (type == 1) {
        if (this.livePassWord == "") {
          console.log(this.livePassWord);
          this.idPasswordCorrect = true;
          this.idPasswordCorrectText = "请输入密码";
        } else {
          this.checkPassword();
        }
      } else {
        // $('body').css('overflow', 'auto');
        this.$router.go(-1);
      }
    },
    behaviorRecord: function behaviorRecord() {
      //进入直播间统计
      this.$http.get("/GlobalLive/behaviorRecord").then(function (res) {
        if (res.code == 200) {}
      });
    },
    preview: function preview(content) {
      console.log(content);
      wx.previewImage({
        current: content, // 当前显示图片的http链接
        urls: [content] // 需要预览的图片http链接列表
      });
    },
    cupLink: function cupLink(item, userId) {
      console.log(item);
      if (item.type == 1) {
        this.$router.replace("personalCenter/course/" + item.id + "&" + userId);
      } else if (item.type == 2) {
        this.$router.replace("column/detail/" + item.id);
      } else {
        this.$router.replace("specialTrainAdvance/" + item.id);
      }
    },
    cancelNav: function cancelNav() {
      //关闭显示导航
      this.isNav = 0;
      this.isEm = true;
      this.isEmojiBox = false;
    },
    tabberClick: function tabberClick(type) {
      var _this5 = this;

      if (type == 3) {
        this.emClick(0);
        this.isNav = type;
      } else if (type == 1) {
        this.isNav = type;
      } else if (type == 2) {
        //图片
        console.log("tupian");

        wx.chooseImage({
          count: 1, // 默认9
          sizeType: ["original", "compressed"], // 可以指定是原图还是压缩图，默认二者都有
          sourceType: ["album", "camera"], // 可以指定来源是相册还是相机，默认二者都有
          success: function success(res) {
            _this5.images.localId = res.localIds[0]; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片

            // alert(this.images.localId)
            // alert('已选择 ' + res.localIds.length + ' 张图片');
            // alert(this.images.localId);
            _this5.uploadImage();
            // ws.send(123123);
          }
        });
      }
    },
    upload: function upload() {
      var _this6 = this;

      wx.uploadImage({
        localId: this.images.localId,
        success: function success(res) {
          // i++;
          // alert('已上传：' + i + '/' + length);
          // arr.serverId.push(res.serverId);
          // alert(arr.serverId);
          // alert('http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=' + accessToken + '&media_id=' + arr.serverId);
          // console.log('http://file.api.weixin.qq.com/cgi-bin/media/get?access_token='+accessToken+'&media_id='+images.serverId);
          // console.log(arr.serverId);
          _this6.images.serverId = res.serverId;
          // document.write(res.serverId);
          // document.getElementById("text").appendChild(document.createElement('pre')).innerHTML = 'http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=' + accessToken + '&media_id=' + this.images.serverId;
          // ws.send('http://file.api.weixin.qq.com/cgi-bin/media/get?access_token='+accessToken+'&media_id='+images.serverId);
          // if (i < length) {
          //   upload();
          // }
          _wxfunction2.default.sendImagea(+_this6.userId, +_this6.courseId, _this6.images.serverId);
        },
        fail: function fail(res) {
          // alert(this.images.localId)
          // alert(JSON.stringify(res));
        }
      });
    },
    uploadImage: function uploadImage() {
      // if (arr.localId.length == 0) {
      //     alert('请先使用 chooseImage 接口选择图片');
      //     return;
      // }
      // var i = 0, length = arr.localId.length;
      // var length = arr.localId.length;
      this.images.serverId = "";
      this.upload();
    },
    getEmoji: function getEmoji(data) {
      console.log(data);
      this.getEmojiData = data;
    },
    emClick: function emClick(type) {
      //表情切換
      if (type == 0) {
        this.isEm = false;
        this.isEmojiBox = true;
        this.isNav = 3;
      } else {
        this.isEm = true;
        this.isEmojiBox = false;
      }
    },
    pcSendPic: function pcSendPic(ev) {
      var _this7 = this;

      if (window.FileReader) {
        var files = ev.target.files;
        var reader = new FileReader();
        reader.readAsDataURL(files[0]);
        reader.onload = function (e) {
          console.log("files[0]", files[0]);
          var imgReg = /\.(gif|jpg|jpeg|png|GIF|JPG|PNG)$/;
          if (imgReg.test(files[0].name)) {
            //匹配图片
            _this7.update(files[0], _this7.pcImageUrl, true);
          } else {
            (0, _mintUi.Toast)("请上传图片");
          }
          console.log("this.pcImageauarl", _this7.pcImageUrl);
        };
      }
    },

    // loadedHandler(event) { //播放器加载后会调用该函数
    //     // this.playVideo.player.addListener('time', this.tipShowFun); //监听播放时间,addListener是监听函数，需要传递二个参数，'time'是监听属性，这里是监听时间，timeHandler是监听接受的函数
    //     // event.addListener('play', this.tipShowFun()); //监听播放状态
    //     // event.addListener('paused', this.tipShowFun()); //监听播放状态
    //      event.addListener('clickEvent', this.ll()); //监听播放状态
    //     // player.addListener('full', fullHandler); //监听全屏切换
    //     // alert('kk')
    // },

    //显示主题
    tipShowFun: function tipShowFun() {
      var _this8 = this;

      this.tipShow = true;

      setTimeout(function () {
        _this8.tipShow = false;
        // this.playVideo.videoPlay()
      }, 2000);
    },

    //获取视频背景图
    getBgRmg: function getBgRmg() {
      var _this9 = this;

      this.$http.get("/GlobalLive/getBackgroundImg", { params: { id: 9999 } }).then(function (res) {
        if (res.body.code == 200) {
          _this9.playerOptions = res.body.data.picUrl; //|| "../images/1.9/beijingtu-ben@2x.png";;

          if (res.body.data.type == 2) {
            _this9.videonth = true; //显示非直播视频
            var videoObject = {
              container: "#videoPlayer1", //“#”代表容器的ID，“.”或“”代表容器的class
              variable: "player", //该属性必需设置，值等于下面的new chplayer()的对象
              autoplay: true, //自动播放
              live: true,
              // loaded: 'loadedHandler', //当播放器加载后执行的函数
              poster: _this9.playerOptions,
              video: res.body.data.videoUrl //'http://vjs.zencdn.net/v/oceans.mp4'//'' //视频地址
            };
            console.log(_this9.isVideoBution);
            setTimeout(function () {
              var player = new ckplayer(videoObject);
              // this.playVideo = new ckplayer(videoObject);
              //   player.videoPause()
              //    player.addVEvent('play', this.ll())
            }, 1000);
          }
          _this9.getData();
        }
      });
    },
    getGiftBalance: function getGiftBalance() {
      var _this10 = this;

      //获取账户
      this.$http.get(this.hostUrl + "/User/getAccountBalance").then(function (res) {
        if (res.body.code == 200) {
          _this10.giftAmount = res.body.data;
        }
      });
    },

    /**
             获取正在直播老师的信息
             * */
    getTeacherData: function getTeacherData() {
      var _this11 = this;

      this.$http.get("GlobalLive/getCurrentTeachInfo").then(function (res) {
        if (res.body.code == 200) {
          _this11.teacherData = res.body.data;
          //this.liveData = this.teacherData;

          //判斷是否需要密碼
          _this11.$store.commit("setTitle", _this11.teacherData.classification + "-" + _this11.$limit(_this11.teacherData.cate_name, 7));
        } else {
          _this11.teacherData = "";
          //  this.isVideoBution = 0;
        }
      });
    },


    /**
             关注或取消关注直播间
             * */
    toFocus: function toFocus() {
      var _this12 = this;

      //  type=1为关注 0为取消关注
      if (this.isSubscribe || this.isSubscribe == false && this.teacherData.isFocus == 1) {
        this.$http.post(this.hostUrl + "/Focus/addFocus", {
          user_id: this.userId,
          live_id: this.teacherData.id,
          type: this.teacherData.isFocus == 1 ? 0 : 1
        }, { emulateJSON: true }).then(function (res) {
          if (res.body.code == 0) {
            (0, _mintUi.Toast)({
              message: res.body.msg,
              duration: 800
            });
            _this12.teacherData.isFocus = _this12.teacherData.isFocus == 1 ? 0 : 1;
            // this.data.focus_num = res.body.data
          } else {
            (0, _mintUi.Toast)({
              message: res.body.msg,
              duration: 1000
            });
          }
        });
      } else {
        this.$http.get(this.hostUrl + "CreateQrCode/focus", {
          params: { teacherId: this.teacherData.user_id }
        }).then(function (res) {
          if (res.body.code == 200) {
            _this12.closePop = true;
            _this12.codeImg = res.body.data;
          } else {
            (0, _mintUi.Toast)("网络出错");
          }
        });
      }
    },

    /**
             获取课程表
             * */
    getCourseTable: function getCourseTable() {
      var _this13 = this;

      this.$http.get("GlobalLive/getGlobalLiveToday?isOnlineHeadAdd=true").then(function (res) {
        if (res.body.code == 200) {
          var liveDataId = "";

          $.each(res.body.data, function (i, item) {
            var start_time = item.set_start_time;
            var end_time = item.set_end_time;
            var timestamp2 = new Date(start_time.split("-").join("/")),
                timestamp3 = new Date(end_time.split("-").join("/")),
                timestamp1 = new Date();
            var s = timestamp2.getTime() - timestamp1.getTime();
            var e = timestamp3.getTime() - timestamp1.getTime();
            /*       console.log('s' + s);
                           console.log('e' + e);*/
            if (s > 0) {
              //   console.log('zhibo'+111);
              item.status = 1;
              return;
            } else if (s < 0 && e > 0) {
              item.status = 2;
              liveDataId = item;

              return;
            } else {
              item.status = 3;
              return;
            }
          });
          _this13.courseTable = res.body.data;
          _this13.liveData = liveDataId;
          //                         console.log(this.userId)
          console.log("this.liveData====", _this13.liveData);
          if (parseInt(_this13.userId) == parseInt(liveDataId.user_id)) {
            _this13.isShowGify = false;
          }

          var day = new Date().getDate();
          var month = new Date().getMonth() + 1;
          for (var i = 0; i < _this13.courseTable.length; i++) {
            var str = _this13.courseTable[i].set_start_time.split(" ");
            var m = str[0].split("-")[1];
            var d = str[0].split("-")[2];
            var str1 = _this13.courseTable[i].set_end_time.split(" ");
            var m1 = str1[0].split("-")[1];
            var d1 = str1[0].split("-")[2];

            if (m == month && d == day) {
              _this13.courseTable[i].time = str[1].slice(0, -3) + "-" + _this13.courseTable[i].set_end_time.split(" ")[1].slice(0, -3);
            } else {
              _this13.courseTable[i].time = m + "-" + d + " " + str[1].slice(0, -3) + "--" + m + "-" + d + " " + _this13.courseTable[i].set_start_time.split(" ")[1].slice(0, -3);
            }
            //console.log('输出' + this.courseTable[i].time)
          }
        }
      });
    },


    /**
             获取讲师vip
             * */
    getAccountBalance: function getAccountBalance() {
      var _this14 = this;

      this.$http.get("/User/getAccountBalance?format=2").then(function (res) {
        if (res.body.code == 200) {
          _this14.userLevel = res.body.data.currentVipLevel;
        }
      });
    },


    /**
             是否在视频直播
             * */
    isAidShow: function isAidShow() {
      console.log("live_state" + this.live_state);
      if (this.live_state == 1 || this.isVideo == true) {
        //直播中
        this.isVideoBution = 0;
        this.videoPoster = false;
      } else {
        //未直播
        this.videoPoster = true;
        this.isVideoBution = 1;
      }
      this.aidShow = false;
      $(".video").css("height", 210);
    },


    /**
             操作面板
             * */
    popupVisibleFun: function popupVisibleFun() {
      //操作面板
      this.popupVisible = false;
      this.videoPoster = false;
      /*  this.isVideoBution =0;
                 $('.video').css('height', 230)*/
      this.isAidShow();
    },


    /**
             评论框
             * */
    bindScrollFun: function bindScrollFun(this_) {
      // this.showCommentSW = true;
      // setTimeout(function () {
      //     this_.scrollIntoViewIfNeeded();
      // }, 500);// 弹出键盘后0.5秒 再隐藏，有的安卓手机反应慢
    },


    /**
             隐藏视频面板
             * */
    isVideoPlay: function isVideoPlay() {
      this.isVideoBution = 0;
      $(".video").css("height", 0);
    },


    /**
             获取用户数据
             * */
    getUserInfo: function getUserInfo() {
      var _this15 = this;

      // 获取用户数据
      this.$http.get(this.hostUrl + "/User/", {
        params: { loginRedirectUrl: location.href }
      }).then(function (res) {
        if (res.body.code == 200) {
          // 登录成功
          _this15.$store.commit("updateUserInfo", res.body.data);
        }
      });
    },

    /**
             返回最新一条
             * */
    // returnLast() {
    //     setTimeout(() => {
    //         document.getElementById("main")
    //         .lastElementChild.scrollIntoView();
    //         console.log(
    //         "lasthild",
    //         document.getElementById("main").lastElementChild
    //         );
    //     }, 100);
    // },
    /**
             取消回复
             * */
    cancelAnswerComment: function cancelAnswerComment() {
      this.answerComment = false;
      this.answerUserInfo = {};
    },

    /**
             评论
             * */
    answerCommentFun: function answerCommentFun(item) {
      if (this.onLiveCourse == true) {
        (0, _mintUi.Toast)({ message: "您的直播间已被禁用，不可操作", duration: 2000 });
        return;
      }
      if (this.forbiddenMode) {
        (0, _mintUi.Toast)("您已被禁言，24小时内不能发言");
        return;
      }
      this.answerUserInfo = item;
      this.answerComment = true;
      $(".item-menu").removeClass("active");
    },
    setNowPlayLocalId: function setNowPlayLocalId(localId) {
      this.nowPlayLocalId = localId;
    },


    /**
             设置
             * */
    config: function config() {
      var _this16 = this;

      wx.ready(function () {
        _this16.wxShare({
          title: _this16.teacherData.class_name,
          desc: "点击链接即可参加课程",
          imgUrl: _this16.teacherData.head_add,
          link: window.location.origin + "/#/publicOnlive" + "?shareId=1"
        });
      });
      wx.error();
    },
    returnLast: function returnLast() {
      var _this17 = this;

      // 回到底部

      var bodyH = $(".boxs").height();
      if (this.$refs.myPubicOnlive.scroller.__contentHeight > bodyH) {
        setTimeout(function () {
          var h = _this17.$refs.myPubicOnlive.scroller.__contentHeight;
          var bh = document.body.offsetHeight - document.body.scrollTop;
          console.log(h - bh);
          if (/(iPhone|iPad|iPod|iOS)/i.test(navigator.userAgent)) {
            _this17.$refs.myPubicOnlive.scrollTo(0, _this17.$refs.myPubicOnlive.scroller.__maxScrollTop, true);
          } else {
            // alert(this.$refs.myPubicOnlive.scroller.__contentHeight);
            // var w = document.documentElement.clientWidth;
            // console.log(bodyH + (h - bh));
            // console.log(this.$refs.myPubicOnlive.scroller.__maxScrollTop);

            // this.$refs.myPubicOnlive.scrollTo(
            //   0,
            //   this.$refs.myPubicOnlive.scroller.__maxScrollTop,
            //   true
            // );
            document.getElementsByClassName('txt')[0].previousElementSibling.scrollIntoView();
          }
        }, 500);
      }

      /*   console.log('回到底部')
                 console.log(this.$refs.myPubicOnlive.scroller.__maxScrollTop)
                 this.$refs.myPubicOnlive.scrollTo(0,this.$refs.myPubicOnlive.scroller.__maxScrollTop-window.innerHeight,true);
                 */
      // this.crollerBottom();
      //this.$refs.main.lastElementChild.scrollIntoView(false);
      this.showReturnBtn = false;
    },
    loadTop: function loadTop(done) {
      var _this18 = this;

      // 上啦加載歷史數據
      this.tipShowFun();
      if (this.liveIsEnd) {
        this.$refs.myPubicOnlive.finishInfinite(2);
        return;
      }
      if (this.liveLoading == false) {
        this.isloadTops = 1;
        setTimeout(function () {
          _this18.getHistory(_this18.minL, false, 10, true);
          done();
        }, 500);
        this.$refs.myPubicOnlive.finishInfinite(2);
      }
    },
    getHistory: function getHistory(msgId, isReadAll, count, isForward) {
      _wxfunction2.default.getMsgHis(+this.userId, +this.courseId, msgId, isForward, isReadAll, count);
      //  wxfun.getMsgHis(this.userId, this.courseId, this.commentLastId, 1, false, 20)
    },
    getNowFormatDate: function getNowFormatDate() {
      //獲取當天日期
      var date = new Date();
      var seperator1 = "-";
      var year = date.getFullYear();
      var month = date.getMonth() + 1;
      var strDate = date.getDate();
      if (month >= 1 && month <= 9) {
        month = "0" + month;
      }
      if (strDate >= 0 && strDate <= 9) {
        strDate = "0" + strDate;
      }
      var currentdate = year + seperator1 + month + seperator1 + strDate;
      //sevenDays
      return currentdate;
    },

    /**
             获取历史评论
             * */
    getCommentHistory: function getCommentHistory() {
      _mintUi.Indicator.open("加载中...");
      _wxfunction2.default.getMsgHis(this.userId, this.courseId, this.commentLastId, 1, false, 20);
    },

    /**
             没得到头像数据
             * */
    errorLoadImg: function errorLoadImg(item) {
      item.avatar = "/images/default/userDefault.png";
    },

    /**
             评论上拉更多
             * */
    commentLoadMore: function commentLoadMore() {
      if (this.disconnect) {
        (0, _mintUi.Toast)(this.noconnectText);
        return;
      }
      if (this.commentLoading || this.commentIsEnd) {
        return;
      }
      console.log("jiazaigengduo ");
      if (_socketClient2.default.ws) {
        _wxfunction2.default.getMsgHis(this.userId, this.courseId, this.maxL, 0, false, 20, -1);
        this.commentLoading = true;
        // this.getCommentHistory(this.maxL)
      }
    },


    /**
             websocket
             数据
             * */
    onmessage: function onmessage(msg) {
      var _this19 = this;

      var data = msg.data;
      console.log(msg);
      // alert(msg.subcmd);
      switch (msg.subcmd) {
        // case 2001://登录房间失败
        //     if (data.errInfo.errID == 1025) {
        //         wxfun.leaveRoom(+this.userId, +this.$route.params.courseId)
        //         this.loginSuccess = false
        //     }
        //     break
        case 2002:
          //登录房间成功
          // Toast({ message: '登录房间成功', duration: 1000 })
          console.log(2002);
          console.log(data);
          this.isUserTypeAssistant = data.userType;
          this.unReadMsgId = data.unReadMsgId;
          if (data.hasOwnProperty("liveUrl")) {
            //进入房间判断video
            this.videoPoster = false;
            this.isVideoBution = 0;
          } else {
            this.isPushFlow = false;
          }

          if (data.inroomstate != 10) {
            if (this.onliveData.isAssistant == 1) {
              this.type = 0;
            } else {
              this.type = 2;
            }
          } else if (this.type != 0) {
            this.type = 1;
          }
          setTimeout(function () {
            _this19.loginS = true; //登陆房间成功
          }, 2000);
          if (this.reconnectId) {
            clearInterval(this.reconnectId);
          }

          this.disconnect = false;
          clearInterval(this.reconnectId);
          this.loginSuccess = true;
          this.forbiddenMode = data.runstate == 1;
          if (this.reconnectId) {
            clearInterval(this.reconnectId);
            this.reconnectId = null;
          }

          this.fristData = true;
          this.getCommentHistory();
          window.onbeforeunload = function () {
            _wxfunction2.default.leaveRoom(+_this19.userId, +_this19.courseId);
          };

          break;
        case 2181:
          //进入房间人数统计
          this.studentNum = data.visitCount;
          break;
        case 2225:
          //
          if (data.type == 3 && data.status == 2) {
            //单个课程禁用
            this.showCloseOnLiveMode = false;
            this.popupVisible = false;
            this.onLiveCourse = true;
          }

          if (data.status && data.status == 2 && data.type == 2) {
            this.showCloseOnLiveMode = false;
            this.popupVisible = false;
          } else if (data.status && data.status == 1 && data.type == 2) {
            this.showCloseOnLiveMode = false;
            this.popupVisible = false;
            this.onLiveCourse = false;
          }
          break;
        case 2226:
          //直播通知
          this.videoPoster = false;
          this.isVideoBution = 0;
          this.videonth = false;
          this.getTeacherData();
          this.getCourseTable();
          break;
        case 2227:
          //直播结束通知
          this.videoPoster = true;
          this.isVideoBution = 1;
          this.videonth = false;
          this.getTeacherData();
          this.getCourseTable();
          var myVideo = document.getElementsByTagName("video")[0]; //获取视频video
          if (myVideo.paused) {
            myVideo.play();
          } else {
            myVideo.pause();
          }
          break;

        case 2216:
          //设置禁言
          this.forbidId = data.toid;
          // if (data.toid == this.userId  && data.status == 1) {
          //     this.forbiddenMode = true;
          // } else {
          //     this.forbiddenMode = false;
          // }
          break;
        case 2218:
          //结束直播成功
          console.log(msg);
          this.liveStatusEnd = true;
          this.showFinishMode = false;
          this.forbiddenMode = false;
          break;
        case 2224:
          //禁言发起者
          // if (data.errid == 2070) {
          //     Toast('该用户已被禁言，24小时内不得重复禁言');
          //     return;
          // }

          // if (data.toid == this.userId  && data.status == 1) {
          //      this.forbiddenMode = true;
          //     // Toast({message: '禁言成功', duration: 1000});
          // } else {
          //     // Toast({message: '取消禁言成功', duration: 1000});
          //     this.forbiddenMode = false;
          // }
          break;
        case 2231:
          //vip 會員席位
          this.vipMemberList = data.someVipUsers;
          this.vipMemberTotal = data.totalInRoomVipCount;
          console.log(this.vipMemberList);
          break;
        case 2181:
          //进入房间人数统计
          this.studentNum = data.visitCount;

          break;
        case 3012:
          _mintUi.Indicator.close();
          // this.commentText = '';
          console.log(data.msg);
          if (data.msg.content.indexOf("[-") >= 0) {
            this.isEmojiBox = false;
            this.isEm = true;
          }

          if (data.msg.msgType == 8) {
            // 删除
            this.comments.forEach(function (val, i) {
              if (val.msgId === parseInt(data.msg.content)) {
                _this19.comments.splice(i, 1);
                console.log(_this19.comments.length);
                $(".msg-mask").removeClass("show");
                $(".recall-btn .menu").removeClass("active");
                return true;
              }
            });
          } else if (data.msg.msgType == 9) {
            //链接
            this.comments.push({
              name: data.msg.srcUser.alias,
              avatar: data.msg.srcUser.head || "/images/default/userDefault.png",
              content: JSON.parse(data.msg.content),
              time: this.formatDate(new Date(data.msg.msgTime * 1000)),
              type: 9,
              userType: data.msg.srcUser.UserType,
              msgId: data.msg.msgId,
              userId: data.msg.srcUser.userId,
              mastermsgId: data.msg.mastermsgId,
              isAssistant: data.msg.srcUser.UserType,
              vipLevel: data.msg.srcUser.vipLevel || 0
            });
          } else {
            if (data.msg.msgType == 11) {
              //赞赏消息
              this.rewardQue.push(JSON.parse(data.msg.content));
              this.comments.push({
                name: data.msg.srcUser.alias,
                avatar: data.msg.srcUser.head || "/images/default/userDefault.png",
                content: data.msg.content,
                time: this.formatDate(new Date(data.msg.msgTime * 1000)),
                type: 11,
                msgId: data.msg.msgId,
                userId: data.msg.srcUser.userId,
                mastermsgId: data.msg.mastermsgId,
                isAssistant: data.msg.srcUser.UserType,
                vipLevel: data.msg.srcUser.vipLevel || 0
              });
              setTimeout(function () {
                _this19.returnLast();
              }, 500);
            } else if (data.msg.msgType == 1) {
              this.comments.push({
                name: data.msg.srcUser.alias,
                avatar: data.msg.srcUser.head || "/images/default/userDefault.png",
                content: data.msg.content,
                time: this.formatDate(new Date(data.msg.msgTime * 1000)),
                type: data.msg.msgType,
                userType: data.msg.srcUser.UserType,
                msgId: data.msg.msgId,
                userId: data.msg.srcUser.userId,
                mastermsgId: data.msg.mastermsgId,
                isAssistant: data.msg.srcUser.UserType,
                vipLevel: data.msg.srcUser.vipLevel || 0
              });
              setTimeout(function () {
                _this19.returnLast();
              }, 1000);
            } else {
              this.comments.push({
                name: data.msg.srcUser.alias,
                avatar: data.msg.srcUser.head || "/images/default/userDefault.png",
                content: data.msg.content,
                time: this.formatDate(new Date(data.msg.msgTime * 1000)),
                type: 0,
                userType: data.msg.srcUser.UserType,
                msgId: data.msg.msgId,
                userId: data.msg.srcUser.userId,
                mastermsgId: data.msg.mastermsgId,
                isAssistant: data.msg.srcUser.UserType,
                vipLevel: data.msg.srcUser.vipLevel || 0
              });
              setTimeout(function () {
                _this19.returnLast();
              }, 1000);
            }
          }

          setTimeout(function () {
            _this19.returnLast();
          }, 1000);

          break;
        case 3021:
          //发送评论成功
          // Toast('发送成功')
          this.answerComment = false;

          this.commentText = "";
          this.goWall = true;
          break;
        case 3022:
          //评论接收成功
          if (data.msg.msgType === 8) {
            this.comments.forEach(function (val, i) {
              console.log(i);
              if (i == 0) {
                _this19.comments = [];
                _wxfunction2.default.getTalkMsgHis(_this19.userId, _this19.courseId, 0);
              }
              if (val.msgId === parseInt(data.msg.content)) {
                _this19.comments.splice(i, 1);
                return true;
              }
            });
          } else {
            if (data.msg.mastermsgId == undefined) {
              this.comments.push({
                name: data.msg.srcUser.alias,
                avatar: data.msg.srcUser.head || "/images/default/userDefault.png",
                content: data.msg.content,
                time: this.formatDate(new Date(data.msg.msgTime * 1000)),
                type: data.msg.srcUser.roleType != 10 ? 2 : data.msg.srcUser.userId == this.hostId ? 0 : 1, //评论类型  0为老师  1为嘉宾  2为学生
                msgId: data.msg.msgId,
                userId: data.msg.srcUser.userId,
                mastermsgId: data.msg.mastermsgId,
                isAssistant: data.msg.srcUser.UserType,
                vipLevel: data.msg.srcUser.vipLevel || 0
              });
            } else {}
            this.commentCount++;
          }
          console.log("this.comment3022", this.comments);
          break;
        case 3017:
          //获取聊天室消息成功
          _mintUi.Indicator.close();
          if (data.msgs) {
            this.maxL = data.msgs[0].msgId;
            this.minL = data.msgs[data.msgs.length - 1].msgId;
            console.log(this.minL);
            console.log(this.maxL);
            for (var i = 0, len = data.msgs.length; i < len; i++) {
              if (data.msgs[i].msgType == 11) {
                this.comments.unshift({
                  type: data.msgs[i].msgType || 0,
                  content: data.msgs[i].content,
                  time: this.formatDate(new Date(data.msgs[i].msgTime * 1000)),
                  msgId: data.msgs[i].msgId,

                  duration: data.msgs[i].duration,
                  extendType: data.msgs[i].extendType
                });
              } else if (data.msgs[i].msgType == 9 || data.msgs[i].msgType == 12) {
                //链接   图片
                this.comments.unshift({
                  type: data.msgs[i].msgType || 0,
                  content: JSON.parse(data.msgs[i].content),
                  extendType: data.msgs[i].extendType,
                  time: this.formatDate(new Date(data.msgs[i].msgTime * 1000)),
                  userType: data.msgs[i].srcUser.UserType,
                  msgId: data.msgs[i].msgId,
                  forbidState: data.msgs[i].srcUser.forbidState,
                  userId: data.msgs[i].srcUser.userId != undefined ? data.msgs[i].srcUser.userId : 0,
                  name: data.msgs[i].srcUser ? data.msgs[i].srcUser.alias : undefined,
                  avatar: data.msgs[i].srcUser ? data.msgs[i].srcUser.head : undefined,
                  duration: data.msgs[i].duration,
                  host: this.hostId == (data.msgs[i].srcUser ? data.msgs[i].srcUser.userId : 0) || this.onliveData.isAssistant == 1 ? 1 : 0,
                  //			                            userType:data.msgs[i].srcUser.UserType //1是助教，0不是助教
                  isAssistant: data.msgs[i].srcUser ? data.msgs[i].srcUser.UserType == 1 : false
                });
              } else {
                this.comments.unshift({
                  type: data.msgs[i].msgType || 0,
                  content: data.msgs[i].content,
                  extendType: data.msgs[i].extendType,
                  time: this.formatDate(new Date(data.msgs[i].msgTime * 1000)),
                  userType: data.msgs[i].srcUser.UserType,
                  msgId: data.msgs[i].msgId,
                  forbidState: data.msgs[i].srcUser.forbidState,
                  userId: data.msgs[i].srcUser.userId != undefined ? data.msgs[i].srcUser.userId : 0,
                  name: data.msgs[i].srcUser ? data.msgs[i].srcUser.alias : undefined,
                  avatar: data.msgs[i].srcUser ? data.msgs[i].srcUser.head : undefined,
                  duration: data.msgs[i].duration,
                  host: this.hostId == (data.msgs[i].srcUser ? data.msgs[i].srcUser.userId : 0) || this.onliveData.isAssistant == 1 ? 1 : 0,
                  //			                            userType:data.msgs[i].srcUser.UserType //1是助教，0不是助教
                  isAssistant: data.msgs[i].srcUser ? data.msgs[i].srcUser.UserType == 1 : false
                });
              }

              this.commentLoading = false;
              if (this.isloadTops == 0) {
                //判斷是否上啦加載
                setTimeout(function () {
                  var mainHeight = $(".publicOnlivePage ").height() + 1500;
                  var body = $(".publicOnlive-main").height();
                  //  console.log(this.$refs.myPubicOnlive.scroller)

                  //this.$refs.myPubicOnlive.scrollTo(0, mainHeight, true);
                  _this19.$refs.myPubicOnlive.scrollTo(0, _this19.$refs.myPubicOnlive.scroller.__maxScrollTop, true);
                  var _this = _this19;
                  _this19.$refs.myPubicOnlive.touchEnd = function () {
                    // touch  滑动
                    this.scroller.doTouchEnd(1);
                    //console.log(this.scroller.__publish());
                    setTimeout(function () {
                      _this.$refs.myPubicOnlive.resize();
                    }, 600);
                    if (mainHeight > body) {
                      // 判断live  直播间消息数、
                      var th = this.scroller.__maxScrollTop - this.scroller.getValues().top;
                      if (th > 200) {
                        _this.showReturnBtn = true;
                      } else {
                        _this.showReturnBtn = false;
                      }
                    }
                  };
                }, 1020);
              }
            }
          }
          break;
      }
    },


    /**
             获取直播历史
             * */
    getData: function getData() {
      var _this20 = this;

      this.$http.post(this.hostUrl + "/Live/liveStream", { emulateJSON: true }).then(function (res) {
        _this20.onliveData = res.body.data;

        _this20.playerOptions = _this20.playerOptions || "../images/1.9/beijingtu-ben@2x.png";

        var videoObject = {
          container: "#videoPlayer", //“#”代表容器的ID，“.”或“”代表容器的class
          variable: "player", //该属性必需设置，值等于下面的new chplayer()的对象
          autoplay: true, //自动播放
          live: true,
          // loaded: 'loadedHandler', //当播放器加载后执行的函数
          poster: _this20.playerOptions,
          video: _this20.onliveData.pull_url //视频地址
        };
        console.log(_this20.isVideoBution);
        setTimeout(function () {
          var player = new ckplayer(videoObject);
          _this20.playVideo = new ckplayer(videoObject);
          //   player.videoPause()
          //    player.addVEvent('play', this.ll())
        }, 1000);

        // this.$nextTick(() => {

        // })
        if (_this20.onliveData.state == 1) {
          //正在直播
          _this20.isVideoBution = 0;
          _this20.videoPoster = false;
        } else {
          //图片
          _this20.isVideoBution = 1;
          _this20.videoPoster = true;
        }

        _this20.connect();
        _this20.$store.dispatch("getSdkData", function (res) {
          _this20.config();
        });
        // this.$refs.header.style.backgroundImage = "url('" + this.onliveData.src_img + "')"
      });
    },


    /**
             链接
             * */
    connect: function connect() {
      var _this21 = this;

      _socketClient2.default.connect(this.userId, this.onliveData.code ? this.onliveData.code : "", this.courseId, this.onmessage, function () {
        // alert('断开了')
        if (location.hash.indexOf("/onlive/") != -1) {
          (0, _mintUi.Toast)("网络中断，请稍后再试");
          console.log("重连中");
          //this.msgs =[];
          _this21.disconnect = true;
          if (_this21.reconnectId == null) {
            _this21.reconnectId = setInterval(function () {
              wx.getNetworkType({
                success: function success(res) {
                  console.log(res);
                  if (_this21.reconnectId != null) {
                    _this21.connect();
                  }
                  //alert(JSON.stringify(res)) // 返回网络类型2g，3g，4g，wifi
                  // if (res.errMsg == 'getNetworkType:fail') {
                  //     alert('等待联网')
                  //     const timeId = setInterval(() => {
                  //         wx.getNetworkType({
                  //             success: (res) => {
                  //                 console.log(res)
                  //                 // 返回网络类型2g，3g，4g，wifi
                  //                 if (res.errMsg != 'getNetworkType:fail') {
                  //                     alert('有网络了')
                  //                     clearInterval(timeId)
                  //                     this.connect()
                  //                 }
                  //             }
                  //         })
                  //     }, 500)
                  // }
                }
              });
            }, 1000);
          }
        }
      });
    },


    /**
             时间日期格式
             * */
    formatDate: function formatDate(obj) {
      function f(num) {
        return num > 9 ? num + "" : "0" + num;
      }

      return f(obj.getMonth() + 1) + "-" + f(obj.getDate()) + " " + f(obj.getHours()) + ":" + f(obj.getMinutes());
    },
    format: function format(obj) {
      function f(num) {
        return num > 9 ? num + "" : "0" + num;
      }

      return obj.getFullYear() + "-" + f(obj.getMonth() + 1) + "-" + f(obj.getDate()) + " " + f(obj.getHours()) + ":" + f(obj.getMinutes()) + ":" + f(obj.getSeconds());
    },


    /**
             取消屏障
             * */
    cancelMask: function cancelMask() {
      this.isEmojiBox = false;
      this.isEm = true;
      this.showCommentSW = false;

      this.isAidShow();
    },


    /**
             失去焦点
             * */
    loseFocus: function loseFocus() {
      var _this22 = this;

      setTimeout(function () {
        if (_this22.commentText.length <= 0) {
          _this22.isFocus = false;
        }
        _this22.showCommentSW = false;
      }, 100);
    },


    /**
             获取焦点
             * */
    focus: function focus(e) {
      var _this23 = this;

      // if (this.onLiveCourse == true) {
      //     e.target.blur();
      //     Toast({message: '您的直播间已被禁用，不可操作', duration: 2000});
      //     return;
      // }

      if (this.forbiddenMode) {
        e.target.blur();
        if (this.canTap) {
          this.canTap = false;
          setTimeout(function () {
            _this23.canTap = true;
          }, 3000);
          (0, _mintUi.Toast)("您已被禁言或讲师已启用禁言模式");
        }
      } else {
        // scroll(0, document.body.scrollHeight);
        // e.target.scrollIntoViewIfNeeded();
        // e.target.scrollIntoView();
        setTimeout(function () {
          _this23.isFocus = true;
        }, 100);
      }
    },
    commentmasktap: function commentmasktap(e) {
      e.target.previousElementSibling.blur();
    },


    /**
             发送评论
             * */
    sendComment: function sendComment(e) {
      // e.target.previousElementSibling.blur();
      this.$nextTick(function () {
        $('#comment-input').blur();
      });
      if (this.disconnect) {
        (0, _mintUi.Toast)(this.noconnectText);
        return;
      }
      if (this.commentText.trim() == "" || this.commentText.length == "") {
        (0, _mintUi.Toast)("评论为空哦");
      }
      if (this.commentText.trim() == "") {
        // e.target.previousElementSibling.focus();
      } else if (this.forbiddenMode) {
        (0, _mintUi.Toast)("您已被禁言或讲师已启用禁言模式");
      } else {
        this.showCommentSW = false;
        // Indicator.open();
        //发表评论
        if (this.teacherData.isadmin == 1) {
          _wxfunction2.default.sendMessage(this.userId, this.courseId, this.commentText.replace(/[\r\n]/g, "")); //管理员留言
        } else {
          _wxfunction2.default.sendMessage(this.userId, this.courseId, this.commentText.replace(/[\r\n]/g, ""));
        }
        this.isNav = 0;

        this.commentText = "";
        /*setTimeout(function () {
                     Indicator.close();
                     Toast({
                     message: '评论成功',
                     iconClass: 'icon icon-success',
                     duration: 3000
                     });
                     }, 2000);*/
      }
    },


    /**
             直播完成
             * */
    finishCourse: function finishCourse() {
      if (this.disconnect) {
        (0, _mintUi.Toast)(this.noconnectText);
        return;
      }
      _wxfunction2.default.overLive(this.userId, this.courseId);
    },


    /**
             操作
             * */
    toggleCommentMenu: function toggleCommentMenu(e) {
      var $target = $(e.target);
      this.$refs.mask.style.display = "block";
      $(".item-menu").removeClass("active");
      $target.siblings(".item-menu").toggleClass("active");
      // $target.find('.item-menu').addClass('active');
      // $target.find('.menu-mask').show();
    },


    /**
             删除评论
             * */
    delComment: function delComment(msgId) {
      var _this24 = this;

      //老师端删除用户评论
      // console.log(msgId);
      if (this.onLiveCourse == true) {
        (0, _mintUi.Toast)({ message: "您的直播间已被禁用，不可操作", duration: 2000 });
        return;
      }
      _mintUi.MessageBox.confirm("确定删除Ta的讨论吗？", "").then(function (action) {
        _wxfunction2.default.sendMessage(+_this24.userId, +_this24.courseId, msgId + "", 8);
        // wxfun.sendTalkMessage(+this.userId, +this.courseId, msgId + "", 8);
        // for (var i = 0; i < this.comments.length; i++) {
        // 	//删除整组评论
        // 	if (this.comments[i].mastermsgId == msgId) {
        // 		wxfun.sendTalkMessage(
        // 			+this.userId,
        // 			+this.courseId,
        // 			this.comments[i].msgId + "",
        //             8,
        //             this.comments[i].msgId + ""
        // 		);
        // 	}
        // }
      }, function (cancal) {});
      $(".item-menu").removeClass("active");
    },


    /**
             关闭操作
             * */
    cancalCommentMenu: function cancalCommentMenu(e) {
      var $target = $(e.target);
      $target.hide();
      $(".item-menu").removeClass("active");
    },


    /**
             禁止评论
             * */
    forbidCommented: function forbidCommented() {
      (0, _mintUi.Toast)("该用户已经被禁了哦");
      $(".item-menu").removeClass("active");
    },


    /**
             禁止评论
             * */
    forbidComment: function forbidComment(userId) {
      var _this25 = this;

      //单独禁言
      if (this.forbidId = userId) {
        _mintUi.MessageBox.confirm("确定禁止Ta讨论吗？", "").then(function (action) {
          _wxfunction2.default.forbidUserChat(+_this25.userId, +_this25.courseId, 1, +userId);
        }, function (cancel) {});
        $(".item-menu").removeClass("active");
      } else {
        (0, _mintUi.Toast)("该用户已经被禁言过");
      }
    },


    /**
             禁言与解禁
             * */
    change: function change() {
      if (this.disconnect) {
        (0, _mintUi.Toast)(this.noconnectText);
        return;
      }
      console.log("changed", this.forbiddenMode);
      _wxfunction2.default.forbidUserChat(this.userId, this.courseId, this.forbiddenMode ? 1 : 0);
    },


    /**
             助教禁用直播间
             * */
    closeOnLivechange: function closeOnLivechange() {
      //助教禁用直播间

      this.$http.get("/Course/assistantHandleCourseStatus", {
        params: {
          courseId: this.courseId,
          status: this.closeOnLiveMode ? 1 : 2
        }
      }).then(function (res) {
        if (res.body.code == 200) {
          console.log("禁用成功");
        }
      });
    },
    showCommentRoomClick: function showCommentRoomClick(numStr) {
      this.isVideoBution = 1;
      $(".video").css("height", 0);
      if (this.isRecording == 0) {} else {
        this.dropRecord = true;
        this.gotoTabNum = -1;
      }
    },
    showCommentRoomLive: function showCommentRoomLive() {
      //  回到直播

      this.showCommentSW = false;
      $(".video").css("height", 210);
      this.isAidShow();
    },

    //数字转数组
    lenFun: function lenFun(num) {
      var len = num.toString();
      var arr = len.split("");
      return arr;
    }
  },
  watch: {
    livePassWord: function livePassWord(val) {
      this.livePassWord = val.replace(/[^0-9.]/g, "");
    },
    comments: function comments(val) {
      //右下角评论区渐变效果
      console.log("comments", val);
      $("#mini-comment-list").addClass("list-opacity");
      setTimeout(function () {
        $("#mini-comment-list").removeClass("list-opacity");
      }, 10000);
    },
    payboxShow: function payboxShow(val) {
      if (val == true) {
        //  this.videoPoster = true;
        //  this.isVideoBution = 1;
        //  $('.video').css('height',0);
        $(".video").css({ marginTop: "-110px" });
        $(".box-center").css({ marginTop: "-154px" });
      } else {
        //  this.isVideoBution = 0;
        //  this.videoPoster = false;
        //   $('.video').css('height','210px');
        // //  $('.box-center').css({'paddingTop':'254px','height':'calc(100vh - 255px)'});
        $(".video").css({ marginTop: "0" });
        $(".box-center").css({ marginTop: "0" });
      }
    },
    changeHeight: function changeHeight(val) {
      var that = this;
      setTimeout(function () {
        if (that.windowInnerHeight <= that.changeHeight) {
          that.isFocus = false;
        } else {
          that.isFocus = true;
        }
      }, 300);
    },


    // answerText(s) {
    //     if (s.length > 0) {
    //         this.disabled = false;
    //     }

    //     var ranges = [
    //         '\ud83c[\udf00-\udfff]',
    //         '\ud83d[\udc00-\ude4f]',
    //         '\ud83d[\ude80-\udeff]'
    //     ];
    //     this.answerText = rs.replace(new RegExp(ranges.join('|'), 'g'), '');

    //     // console.log(this.answerText);
    // },

    rewardVisible: function rewardVisible(val) {
      if (val === false) {
        this.giftOptions = -1;
      }
    },
    rewardQue: function rewardQue(value) {
      console.log("this.rewardQue", value);
      if (!this.rewardShowing && value.length > 0) {
        var append = function append() {
          $header.append(template);
          for (var i = 0; i < arr.length; i++) {
            $(".reward-toast .num").append("<span class=\"nn\" style=\"background-image:url('/images/1.9/" + arr[i] + "_icon.png')\"></span>");
          }
          _setTimeout(function () {
            var $reward = $(".reward-toast:last-of-type");
            $reward.css("transform", "translateX(0px)");
            if (value.length > 1) {
              _setTimeout(function () {
                $reward.css("transform", "translateY(-100%)");
                _setTimeout(function () {
                  _animate($reward);
                }, 300);
              }, 300);
            } else {
              _setTimeout(function () {
                _animate($reward);
              }, 2000);
            }
          }, 10);
        };

        var _animate = function _animate($reward) {
          $reward.animate({ opacity: "0" }, function () {
            $(this).remove();
            value.shift();
            _this.rewardShowing = false;
          });
        };

        var $header = $(this.$refs.topHeader);
        this.rewardShowing = true;
        var _this = this;
        var _setTimeout = window.setTimeout;
        var arr = _this.lenFun(value[0].gifcount);
        var template = "<div class=\"reward-toast flex\">\n                    <div class=\"reward-avatar\" style=\"background-image:url('" + value[0].srcuserhead + "')\"></div>\n                    <div class=\"reward-content\">\n                        <h5>" + this.$limit(value[0].srcname, 6) + "</h5>\n                        <p>\u8D60\u4E88\u4E86</p>\n                    </div>\n                    <div class=\"reward-img\" style=\"background-image:url('" + value[0].gifpicture + "')\"></div>\n\n                    <div class=\"num\">\n                       <span class=\"mul\"></span>\n\n                    </div>\n\n                </div>";
        // 送礼数量
        for (var i = 0; i < arr.length; i++) {
          $(".reward-toast .num").append("<span class=\"nn\" style=\"background-image:url('/images/1.9/" + arr[i] + "_icon.png')\"></span>");
        }

        append();
      }
    }
  },
  components: {
    nomore: _nomore2.default,
    vipMember: _liveVipMember2.default,
    gift: _gift2.default,
    emoji: _em2.default
  }
};
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(49)))

/***/ }),

/***/ 980:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n@charset \"UTF-8\";\n.pb {\n  padding-bottom: 1.14rem !important;\n  box-sizing: border-box !important;\n}\n.container-class {\n  height: 100%;\n}\n.container-class .mint-indicator {\n    z-index: 1111;\n}\n.container-class .mint-indicator-wrapper {\n    z-index: 11111;\n    padding: 15px;\n}\n.publicOnlive-main {\n  height: 100%;\n}\n.publicOnlive-main .livePassWord {\n    width: 100%;\n    height: 100%;\n    position: absolute;\n    top: 0;\n    left: 0;\n    background: url(" + __webpack_require__(1079) + ") no-repeat;\n    background-size: cover;\n    z-index: 99999;\n}\n.publicOnlive-main .livePassWord .passWordBox {\n      width: 5.8rem;\n      height: 3.64rem;\n      margin: 0 auto;\n      background: #fff;\n      margin-top: 40%;\n      border-radius: 0.08rem;\n}\n.publicOnlive-main .livePassWord .passWordBox h2 {\n        padding-top: 0.64rem;\n        font-size: 0.32rem;\n        color: #1c0808;\n        text-align: center;\n}\n.publicOnlive-main .livePassWord .passWordBox input {\n        border: 0px;\n        border-bottom: 1px solid #dbdbdb;\n        height: 30px;\n        line-height: 30px;\n        width: 4.68rem;\n        margin: 0 auto;\n        margin-top: 0.41rem;\n        margin-left: 0.56rem;\n        text-align: center;\n        letter-spacing: 10px;\n}\n.publicOnlive-main .livePassWord .passWordBox .errorT {\n        text-align: center;\n        padding-top: 0.16rem;\n        color: #c62f2f;\n        font-size: 0.24rem;\n        padding-bottom: 0.39rem;\n        height: 0.13rem;\n}\n.publicOnlive-main .livePassWord .passWordBox .button {\n        height: 0.84rem;\n        background-color: #c62f2f;\n        border-radius: 0px 0px 8px 8px;\n        padding-top: 0.16rem;\n}\n.publicOnlive-main .livePassWord .passWordBox .button span {\n          border-right: 1px solid #fff;\n          height: 0.68rem;\n          line-height: 0.68rem;\n          display: block;\n          float: left;\n          width: 49%;\n          text-align: center;\n          color: #fff;\n          font-size: 0.36rem;\n}\n.publicOnlive-main .livePassWord .passWordBox .button span:nth-child(2) {\n          border-right: 0;\n}\n.publicOnlive-main .mint-popup {\n    z-index: 999999 !important;\n}\n.publicOnlive-main .v-modal {\n    opacity: 0.6;\n}\n.publicOnlive-main .box-center {\n    padding-top: 5.06rem;\n    height: -webkit-calc(100vh - 5.06rem);\n    height: calc(100vh - 5.06rem);\n}\n.publicOnlive-main .loading-page {\n    height: 100vh;\n}\n.publicOnlive-main .nodata {\n    text-align: center;\n    width: 100%;\n}\n.publicOnlive-main .nodata img {\n      width: 1.2rem;\n      height: 1.2rem;\n      margin: 1.79rem auto 0.79rem;\n}\n.publicOnlive-main .nodata h5 {\n      font-size: 0.4rem;\n      color: #888;\n      margin-bottom: 0.38rem;\n}\n.publicOnlive-main .nodata p {\n      font-size: 0.32rem;\n      color: #b2b2b2;\n}\n.publicOnlive-main .set-amount-popup {\n    width: 5.4rem;\n    border-radius: 5px;\n    text-align: center;\n}\n.publicOnlive-main .set-amount-popup main .info .img {\n      width: 3.02rem;\n      height: 1.9rem;\n      background: #fff;\n      background-size: 100% 100%;\n      display: inline-block;\n      margin-top: 0.6rem;\n      color: #ffffff;\n      position: relative;\n}\n.publicOnlive-main .set-amount-popup main .info .img h3 {\n        font-size: 0.42rem;\n        text-align: left;\n        margin: 0.2rem;\n}\n.publicOnlive-main .set-amount-popup main .info .img h3 i {\n          font-size: 0.24rem;\n}\n.publicOnlive-main .set-amount-popup main .info .img p {\n        position: absolute;\n        bottom: 0.2rem;\n        right: 0.2rem;\n        font-size: 0.24rem;\n}\n.publicOnlive-main .set-amount-popup main .info > h4 {\n      margin: 0.36rem 0;\n      font-size: 0.32rem;\n      color: #1c0808;\n}\n.publicOnlive-main .set-amount-popup main .info input {\n      width: 3rem;\n      margin-bottom: 0.48rem;\n      color: #c62f2f;\n      text-align: center;\n      border-bottom: 1px solid #ededed;\n      padding-bottom: 0.16rem;\n      font-size: 0.32rem;\n}\n.publicOnlive-main .set-amount-popup main .info input::-webkit-input-placeholder {\n        color: #888888;\n}\n.publicOnlive-main .set-amount-popup main .bottom-btn {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      height: 1rem;\n      border-radius: 0 0 5px 5px;\n}\n.publicOnlive-main .set-amount-popup main .bottom-btn > div {\n        -webkit-box-flex: 1;\n        -webkit-flex: 1;\n            -ms-flex: 1;\n                flex: 1;\n        color: #ffffff;\n        background: #c62f2f;\n        text-align: center;\n        line-height: 1rem;\n        font-size: 0.36rem;\n}\n.publicOnlive-main .set-amount-popup main .bottom-btn > div:first-child {\n          border-bottom-left-radius: 5px;\n}\n.publicOnlive-main .set-amount-popup main .bottom-btn > div:last-child {\n          border-bottom-right-radius: 5px;\n          position: relative;\n}\n.publicOnlive-main .set-amount-popup main .bottom-btn > div:last-child::before {\n            content: \"\";\n            display: inline-block;\n            width: 1px;\n            height: 0.68rem;\n            background: #da9e9e;\n            position: absolute;\n            left: 0;\n            top: 0.16rem;\n}\n.publicOnlive-main .top-tab {\n    background: #ffffff;\n    padding: 0.16rem 0.24rem;\n}\n.publicOnlive-main .top-tab span {\n      display: inline-block;\n      height: 0.5rem;\n      line-height: 0.5rem;\n      border: 1px solid #ebebeb;\n      border-radius: 5px;\n      width: 1.62rem;\n      text-align: center;\n}\n.publicOnlive-main .top-tab span.active {\n        background: #c62f2f;\n        color: #ffffff;\n        border-color: #c62f2f;\n        position: relative;\n}\n.publicOnlive-main .top-tab span.active::after {\n          content: \" \";\n          bottom: 0;\n          right: 50%;\n          position: absolute;\n          width: 0.16rem;\n          height: 0.16rem;\n          background: #ffffff;\n          -webkit-transform: translateY(90%) translateX(50%) rotate(45deg);\n              -ms-transform: translateY(90%) translateX(50%) rotate(45deg);\n                  transform: translateY(90%) translateX(50%) rotate(45deg);\n}\n.publicOnlive-main .top-tab .inter-btn {\n      margin-left: 0.31rem;\n}\n.publicOnlive-main .top-tab .inter-btn::before {\n        content: \"\";\n        display: inline-block;\n        width: 0.3rem;\n        height: 0.3rem;\n        background: url(\"/images/1.9/invite_icon.png\") center center no-repeat;\n        background-size: 100% 100%;\n        vertical-align: middle;\n        margin-right: 0.1rem;\n}\n.publicOnlive-main #footer {\n    position: fixed;\n    bottom: 0px;\n    width: 100%;\n    z-index: 1111;\n    background: #fff;\n    padding: 0.1rem;\n    border-top: 1px solid #f5f7f8;\n}\n.publicOnlive-main #footer .content-mask {\n      position: fixed;\n      top: 0;\n      right: 0;\n      left: 0;\n      bottom: 0;\n      width: 100%;\n      height: 100%;\n}\n.publicOnlive-main #footer .nav {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      position: relative;\n      z-index: 10;\n}\n.publicOnlive-main #footer .nav a {\n        -webkit-box-flex: 1;\n        -webkit-flex: 1;\n            -ms-flex: 1;\n                flex: 1;\n        position: relative;\n        height: 1rem;\n        font-size: 0.36rem;\n        color: #999999;\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-pack: center;\n        -webkit-justify-content: center;\n            -ms-flex-pack: center;\n                justify-content: center;\n        -webkit-box-align: center;\n        -webkit-align-items: center;\n            -ms-flex-align: center;\n                align-items: center;\n        border-left: 1px solid #e8e8e8;\n}\n.publicOnlive-main #footer .nav a:first-child {\n          border-left: none;\n}\n.publicOnlive-main #footer .nav a span {\n          position: relative;\n}\n.publicOnlive-main #footer .nav a span:before {\n            margin-right: 0.1rem;\n}\n.publicOnlive-main #footer .nav .audio-btn span:before {\n        width: 0.35rem;\n        height: 0.38rem;\n        background-position: -3.86rem -1.08rem;\n}\n.publicOnlive-main #footer .nav .text-emo span:before {\n        width: 0.4rem;\n        height: 0.4rem;\n        background-position: -5.57rem -1.11rem;\n}\n.publicOnlive-main #footer .nav .text-btn span:before {\n        width: 0.4rem;\n        height: 0.4rem;\n        background-position: -0.37rem -1.11rem;\n}\n.publicOnlive-main #footer .nav .image-btn span:before {\n        width: 0.4rem;\n        height: 0.4rem;\n        background-position: -0.84rem -1.11rem;\n}\n.publicOnlive-main #footer .nav .ppt-btn span:before {\n        width: 0.35rem;\n        height: 0.36rem;\n        background-position: -3.05rem -1.11rem;\n}\n.publicOnlive-main #footer .nav .operate-btn span:before {\n        width: 0.36rem;\n        height: 0.36rem;\n        background-position: -1.27rem -1.11rem;\n}\n.publicOnlive-main #footer .nav a.active {\n        color: #333;\n}\n.publicOnlive-main #footer .nav a.active.audio-btn span:before {\n          background-position-x: -2.3rem;\n}\n.publicOnlive-main #footer .nav a.active.text-btn span:before {\n          background-position-x: -2.67rem;\n}\n.publicOnlive-main #footer .nav a.active.ppt-btn span:before {\n          background-position-x: -3.463rem;\n}\n.publicOnlive-main #footer .nav a.active.image-btn span:before {\n          background-position-x: -4.7rem;\n}\n.publicOnlive-main #footer .nav a.active.image-btn span:before {\n          background-position-x: -4.73rem;\n}\n.publicOnlive-main #footer .nav a.active.text-emo span:before {\n          background-position-x: -6.05rem;\n}\n.publicOnlive-main #footer .bottom-submit {\n      width: 100%;\n      box-sizing: border-box;\n      background-color: #fff;\n      position: relative;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-align: end;\n      -webkit-align-items: flex-end;\n          -ms-flex-align: end;\n              align-items: flex-end;\n      /*   padding: 0.1rem 0;*/\n}\n.publicOnlive-main #footer .bottom-submit .comment-mask {\n        position: fixed;\n        top: 0;\n        right: 0;\n        left: 0;\n        bottom: 0;\n        display: none;\n}\n.publicOnlive-main #footer .bottom-submit textarea {\n        line-height: 0.8rem;\n        resize: none;\n        height: 0.8rem;\n        font-size: 0.32rem;\n        margin-left: 0.16rem;\n        -webkit-box-flex: 6;\n        -webkit-flex: 6;\n            -ms-flex: 6;\n                flex: 6;\n        text-indent: 0.08rem;\n        color: #353535;\n        width: 100%;\n        border-bottom: 1px solid #dbdbdb;\n        position: relative;\n        z-index: 1;\n}\n.publicOnlive-main #footer .bottom-submit textarea.blue {\n          color: #c62f2f;\n}\n.publicOnlive-main #footer .bottom-submit textarea.pc-textarea {\n          height: inherit;\n          overflow: inherit;\n}\n.publicOnlive-main #footer .bottom-submit textarea.comment-input {\n        overflow: inherit;\n        padding: 0;\n        -webkit-appearance: none;\n        border-radius: 0;\n}\n.publicOnlive-main #footer .bottom-submit textarea.comment-input.line-1 {\n          height: 0.8rem;\n          line-height: 0.8rem;\n}\n.publicOnlive-main #footer .bottom-submit textarea.comment-input.line-2 {\n          height: 1.1rem;\n          line-height: 0.5rem;\n}\n.publicOnlive-main #footer .bottom-submit textarea.comment-input.line-3 {\n          height: 1.6rem;\n          line-height: 0.5rem;\n}\n.publicOnlive-main #footer .bottom-submit textarea.comment-input.line-4 {\n          height: 2.1rem;\n          line-height: 0.5rem;\n}\n.publicOnlive-main #footer .bottom-submit textarea.comment-input.line-5 {\n          height: 2.6rem;\n          line-height: 0.5rem;\n}\n.publicOnlive-main #footer .bottom-submit input {\n        height: 0.8rem;\n        font-size: 0.34rem;\n}\n.publicOnlive-main #footer .bottom-submit input[type=\"text\"] {\n          margin-top: 0.1rem;\n          text-indent: 0.08rem;\n          -webkit-box-flex: 4;\n          -webkit-flex: 4;\n              -ms-flex: 4;\n                  flex: 4;\n          width: 100%;\n          position: relative;\n          z-index: 1;\n          line-height: 0.8rem;\n          background: #f5f7f8;\n          border-radius: 5px;\n          color: #353535;\n          margin-left: 0.16rem;\n}\n.publicOnlive-main #footer .bottom-submit input[type=\"text\"].blue {\n            color: #c62f2f;\n}\n.publicOnlive-main #footer .bottom-submit input[type=\"button\"] {\n          -webkit-box-flex: 1;\n          -webkit-flex: 1;\n              -ms-flex: 1;\n                  flex: 1;\n          width: 1.4rem;\n          height: 0.66rem;\n          z-index: 11;\n          border-radius: 50px;\n          font-size: 0.32rem;\n          margin: 0 0.16rem 0 0.16rem;\n          background-color: #fff;\n          color: #888;\n          margin-bottom: 0.06rem;\n}\n.publicOnlive-main #footer .bottom-submit input[type=\"button\"].active {\n            background-color: #c62f2f;\n            color: #ffffff;\n}\n.publicOnlive-main .liveTitleBox-comment {\n    width: 80%;\n    border-radius: 10px;\n}\n.publicOnlive-main .liveTitleBox-comment .img {\n      width: 2.8rem;\n      margin: 0.8rem auto 0;\n      height: 2.8rem;\n      background-size: 100% auto;\n}\n.publicOnlive-main .liveTitleBox-comment .buttom {\n      width: 100%;\n      background: #c62f2f;\n      height: 1rem;\n      border-radius: 0px 0px 10px 10px;\n}\n.publicOnlive-main .liveTitleBox-comment .buttom a {\n        display: block;\n        width: 100%;\n        line-height: 1rem;\n        text-align: center;\n        color: #fff;\n}\n.publicOnlive-main .liveTitleBox-comment h2 {\n      text-align: center;\n      color: #1c0808;\n      font-size: 16px;\n      font-weight: bold;\n}\n.publicOnlive-main .liveTitleBox-comment h2 {\n      font-weight: normal;\n      margin: 0.48rem 0 0.32rem;\n}\n.publicOnlive-main .liveTitleBox-comment .class-name {\n      margin: 0.3rem 0 0.3rem;\n}\n.publicOnlive-main .liveTitleBox-comment .title {\n      border-bottom: 1px solid #eec0c0;\n}\n.publicOnlive-main .liveTitleBox-comment .title input {\n        border: 0px;\n        border-shadow: 0;\n        width: 100%;\n        height: 35px;\n        text-align: center;\n        caret-color: #cd0000;\n}\n.publicOnlive-main .liveTitleBox-comment p {\n      line-height: 30px;\n      text-align: center;\n      color: #888;\n}\n.publicOnlive-main .timetable {\n    padding: 0.24rem;\n    height: -webkit-calc(100vh - 274px);\n    height: calc(100vh - 274px);\n    overflow: scroll;\n    padding-bottom: 0.2rem;\n    -webkit-overflow-scrolling: touch;\n}\n.publicOnlive-main .timetable li {\n      padding: 0.32rem 0.24rem;\n      background-color: #fff;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n      position: relative;\n      -webkit-box-pack: justify;\n      -webkit-justify-content: space-between;\n          -ms-flex-pack: justify;\n              justify-content: space-between;\n      border: 1px solid #ededed;\n      margin-bottom: 0.24rem;\n}\n.publicOnlive-main .timetable .left-box {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n}\n.publicOnlive-main .timetable .left-box img {\n        height: 0.68rem;\n        width: 0.68rem;\n        border-radius: 100%;\n        margin-right: 0.24rem;\n        margin-top: 0.2rem;\n}\n.publicOnlive-main .timetable .left-box h4 {\n        font-size: 0.24rem;\n        color: #1c0808;\n}\n.publicOnlive-main .timetable .left-box h4 span {\n          color: #ff7615;\n          margin-right: 0.1rem;\n}\n.publicOnlive-main .timetable .left-box h5 {\n        color: #353535;\n        font-size: 0.28rem;\n        margin: 0.14rem 0;\n}\n.publicOnlive-main .timetable .left-box p {\n        font-size: 0.24rem;\n        color: #888;\n}\n.publicOnlive-main .timetable .right-box {\n      position: absolute;\n      right: 0.24rem;\n}\n.publicOnlive-main .timetable .right-box span {\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        background-color: #ccc;\n        color: #fff;\n        height: 0.6rem;\n        line-height: 0.6rem;\n        padding: 0 0.19rem 0 0.14rem;\n        border-radius: 0.3rem;\n        -webkit-box-align: center;\n        -webkit-align-items: center;\n            -ms-flex-align: center;\n                align-items: center;\n        font-size: 0.26rem;\n}\n.publicOnlive-main .timetable .right-box span i {\n          width: 0.3rem;\n          height: 0.3rem;\n          margin-right: 0.1rem;\n          display: inline-block;\n}\n.publicOnlive-main .timetable .right-box span.ed {\n          background-color: #888;\n}\n.publicOnlive-main .timetable .right-box span.ed i {\n            background: url(\"/images/1.9/ggzbj_js.png\") center no-repeat;\n            background-size: 0.28rem 0.28rem;\n}\n.publicOnlive-main .timetable .right-box span.ing {\n          background-color: #c62f2f;\n}\n.publicOnlive-main .timetable .right-box span.ing i {\n            background: url(\"/images/1.9/ggzbj_zz.png\") center no-repeat;\n            background-size: 0.28rem 0.28rem;\n}\n.publicOnlive-main .timetable .right-box span.es {\n          background-color: #efc979;\n}\n.publicOnlive-main .timetable .right-box span.es i {\n            background: url(\"/images/1.9/ggzbj_zw.png\") center no-repeat;\n            background-size: 0.28rem 0.28rem;\n}\n.publicOnlive-main .vip-animate-popup {\n    width: 7.5rem;\n    height: 7.5rem;\n    max-width: 7.5rem;\n    background: rgba(255, 255, 255, 0);\n    -webkit-transform: translate3d(-50%, -70%, 0);\n            transform: translate3d(-50%, -70%, 0);\n}\n.publicOnlive-main .vip-animate-popup main {\n      width: 100%;\n      height: 100%;\n      text-align: center;\n      position: relative;\n}\n.publicOnlive-main .vip-animate-popup main .bg {\n        width: 100%;\n        height: 100%;\n        background: url(\"/images/vip/vip-animate-bg.png\") no-repeat center center;\n        background-size: 100% 100%;\n        -webkit-transform-origin: center center;\n            -ms-transform-origin: center center;\n                transform-origin: center center;\n        /**/\n        /*background-position-y: -32px;*/\n        -webkit-animation: rotateAnimation 6s linear alternate;\n                animation: rotateAnimation 6s linear alternate;\n}\n.publicOnlive-main .vip-animate-popup main img.vip-bg {\n        width: 100%;\n        position: absolute;\n        top: 0;\n        left: 0;\n        z-index: 2;\n}\n.publicOnlive-main .vip-animate-popup main .head-add {\n        display: inline-block;\n        width: 1.92rem;\n        height: 1.92rem;\n        background-image: url(\"/images/robot/hy9.jpg\");\n        background-repeat: no-repeat;\n        background-size: 100% 100%;\n        position: absolute;\n        top: 2.32rem;\n        left: 50%;\n        -webkit-transform: translateX(-50%);\n            -ms-transform: translateX(-50%);\n                transform: translateX(-50%);\n        border-radius: 50%;\n}\n.publicOnlive-main .vip-animate-popup main .head-add.vip-5-6 {\n          top: 2.62rem;\n          -webkit-transform: translateX(-50%);\n              -ms-transform: translateX(-50%);\n                  transform: translateX(-50%);\n}\n.publicOnlive-main .vip-animate-popup main .head-add.vip-7-8 {\n          top: 1.92rem;\n          -webkit-transform: translateX(-50%);\n              -ms-transform: translateX(-50%);\n                  transform: translateX(-50%);\n}\n@-webkit-keyframes rotateAnimation {\nfrom {\n    -webkit-transform: rotate(0);\n            transform: rotate(0);\n}\nto {\n    -webkit-transform: rotate(360deg);\n            transform: rotate(360deg);\n}\n}\n@keyframes rotateAnimation {\nfrom {\n    -webkit-transform: rotate(0);\n            transform: rotate(0);\n}\nto {\n    -webkit-transform: rotate(360deg);\n            transform: rotate(360deg);\n}\n}\n.publicOnlive-main .onlive-close {\n    min-height: 100%;\n    background: #ffffff;\n    text-align: center;\n}\n.publicOnlive-main .onlive-close img {\n      width: 1.4rem;\n      height: 1.4rem;\n      margin-bottom: 0.66rem;\n      margin-top: 1.9rem;\n}\n.publicOnlive-main .onlive-close p {\n      font-size: 20px;\n      color: #666666;\n}\n.publicOnlive-main .publicOnlivePage {\n    height: 100%;\n    overflow: hidden;\n}\n.publicOnlive-main .publicOnlivePage input[type=\"file\"] {\n      position: absolute;\n      top: 0;\n      left: 0;\n      width: 100%;\n      height: 100%;\n      opacity: 0;\n}\n.publicOnlive-main .publicOnlivePage .sprite:before {\n      background-size: 7.5rem auto;\n      -webkit-transform: none;\n          -ms-transform: none;\n              transform: none;\n}\n.publicOnlive-main .publicOnlivePage .publicOnlivePage-container {\n      -webkit-box-flex: 1;\n      -webkit-flex: 1;\n          -ms-flex: 1;\n              flex: 1;\n      /* -webkit-overflow-scrolling: touch;*/\n      background-color: #f5f7f8;\n      padding-bottom: 0.2rem;\n      /* 10/50 */\n      position: relative;\n      overflow: hidden;\n}\n.publicOnlive-main .publicOnlivePage .publicOnlivePage-container ._v-content {\n        position: absolute;\n        padding: 0 0.24rem;\n}\n.publicOnlive-main .publicOnlivePage .publicOnlivePage-container ._v-content .loading-layer {\n          height: 0;\n}\n.publicOnlive-main .publicOnlivePage .publicOnlivePage-container ._v-content .pull-to-refresh-layer {\n          padding-bottom: 20px;\n}\n.publicOnlive-main .publicOnlivePage .top-header {\n      position: fixed;\n      height: 1.1rem;\n      width: 100%;\n      z-index: 121;\n}\n.publicOnlive-main .publicOnlivePage .top-header .follow {\n        position: absolute;\n        top: 0.4rem;\n        right: 0.4rem;\n        display: inline-block;\n        color: #fcf9f9;\n        line-height: 0.4rem;\n        font-size: 0.28rem;\n        height: 0.4rem;\n        border-radius: 0.08rem;\n        text-align: center;\n}\n.publicOnlive-main .publicOnlivePage .top-header .unfollow {\n        background-color: #fff;\n        color: #c62f2f;\n        text-align: center;\n        top: 0.3rem;\n        padding: 2px 0.2rem;\n        border-radius: 0.3rem;\n        border: 1px solid #c62f2f;\n}\n.publicOnlive-main .publicOnlivePage .top-header .following {\n        position: absolute;\n        border-radius: 0.05rem;\n        color: #999;\n}\n.publicOnlive-main .publicOnlivePage .top-header .reward-toast {\n        min-width: 50vw;\n        max-width: 70vw;\n        left: 0;\n        bottom: -2.08rem;\n        z-index: 1111;\n        -webkit-box-align: center;\n        -webkit-align-items: center;\n            -ms-flex-align: center;\n                align-items: center;\n        height: 0.98rem;\n        border-radius: 0.49rem 0 0 0.49rem;\n        background-image: -webkit-linear-gradient(left, rgba(254, 70, 79, 0.9), rgba(254, 109, 116, 0.9), rgba(252, 160, 164, 0.5), rgba(252, 160, 164, 0));\n        background-image: linear-gradient(to right, rgba(254, 70, 79, 0.9), rgba(254, 109, 116, 0.9), rgba(252, 160, 164, 0.5), rgba(252, 160, 164, 0));\n        color: #fff;\n        padding-right: 1.1rem;\n        -webkit-transform: translateX(-100%);\n            -ms-transform: translateX(-100%);\n                transform: translateX(-100%);\n        -webkit-transition: -webkit-transform 0.3s ease;\n        transition: -webkit-transform 0.3s ease;\n        transition: transform 0.3s ease;\n        transition: transform 0.3s ease, -webkit-transform 0.3s ease;\n        margin-left: 0.1rem;\n}\n.publicOnlive-main .publicOnlivePage .top-header .reward-toast .num {\n          display: -webkit-box;\n          display: -webkit-flex;\n          display: -ms-flexbox;\n          display: flex;\n}\n.publicOnlive-main .publicOnlivePage .top-header .reward-toast .mul {\n          width: 0.44rem;\n          height: 0.45rem;\n          display: inline-block;\n          background: url(\"/images/1.9/multiplication_icon.png\") center no-repeat;\n          background-size: 0.44rem 0.45rem;\n          margin-left: 0.1rem;\n}\n.publicOnlive-main .publicOnlivePage .top-header .reward-toast .nn {\n          width: 0.56rem;\n          height: 0.63rem;\n          display: inline-block;\n          background-size: 0.56rem 0.63rem;\n}\n.publicOnlive-main .publicOnlivePage .top-header .reward-toast .reward-avatar {\n          width: 0.9rem;\n          height: 0.9rem;\n          margin-left: 0.04rem;\n          border-radius: 50%;\n          background-repeat: no-repeat;\n          background-size: cover;\n          background-position: center center;\n          margin-right: 0.16rem;\n}\n.publicOnlive-main .publicOnlivePage .top-header .reward-toast .reward-content {\n          white-space: nowrap;\n          display: -webkit-box;\n          display: -webkit-flex;\n          display: -ms-flexbox;\n          display: flex;\n          -webkit-box-orient: vertical;\n          -webkit-box-direction: normal;\n          -webkit-flex-direction: column;\n              -ms-flex-direction: column;\n                  flex-direction: column;\n          -webkit-box-pack: justify;\n          -webkit-justify-content: space-between;\n              -ms-flex-pack: justify;\n                  justify-content: space-between;\n          padding: 0.13rem 0;\n          height: 100%;\n          box-sizing: border-box;\n}\n.publicOnlive-main .publicOnlivePage .top-header .reward-toast .reward-content h5 {\n            font-size: 0.34rem;\n}\n.publicOnlive-main .publicOnlivePage .top-header .reward-toast .reward-content p {\n            font-size: 0.26rem;\n}\n.publicOnlive-main .publicOnlivePage .top-header .reward-toast .reward-img {\n          margin-left: 0.16rem;\n          width: 0.8rem;\n          height: 0.8rem;\n          border-radius: 0.1rem;\n          background-repeat: no-repeat;\n          background-size: cover;\n          background-position: center center;\n}\n.publicOnlive-main .publicOnlivePage .header {\n      padding: 0.15rem 0.24rem;\n      box-sizing: border-box;\n      background-color: #faf1eb;\n      position: relative;\n}\n.publicOnlive-main .publicOnlivePage .header .head-add {\n        width: 0.8rem;\n        height: 0.8rem;\n        border-radius: 50%;\n        display: inline-block;\n        background-repeat: no-repeat;\n        background-size: 100% 100%;\n        background-position: center center;\n        margin-right: 0.16rem;\n}\n.publicOnlive-main .publicOnlivePage .header .box {\n        -webkit-box-flex: 1;\n        -webkit-flex: 1;\n            -ms-flex: 1;\n                flex: 1;\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-orient: vertical;\n        -webkit-box-direction: normal;\n        -webkit-flex-direction: column;\n            -ms-flex-direction: column;\n                flex-direction: column;\n        -webkit-box-pack: justify;\n        -webkit-justify-content: space-between;\n            -ms-flex-pack: justify;\n                justify-content: space-between;\n}\n.publicOnlive-main .publicOnlivePage .header .nums {\n        font-size: 0.24rem;\n        color: #888888;\n}\n.publicOnlive-main .publicOnlivePage .header .nums .like-num {\n          margin-left: 0.05rem;\n}\n.publicOnlive-main .publicOnlivePage .header .nums .hot-num {\n          margin-right: 0.39rem;\n          margin-left: 0.05rem;\n}\n.publicOnlive-main .publicOnlivePage .header .head-title {\n        font-size: 0.28rem;\n        color: #1c0808;\n        height: 0.4rem;\n        line-height: 0.4rem;\n        -webkit-box-pack: justify;\n        -webkit-justify-content: space-between;\n            -ms-flex-pack: justify;\n                justify-content: space-between;\n}\n.publicOnlive-main .publicOnlivePage .header .name {\n        display: inline-block;\n        max-width: 33vw;\n        vertical-align: top;\n}\n.publicOnlive-main .publicOnlivePage .header p {\n        font-size: 0.26rem;\n        color: #999;\n        line-height: 0.3rem;\n}\n.publicOnlive-main .publicOnlivePage .header .info {\n        display: inline-block;\n        padding: 0 0.12rem;\n        height: 0.4rem;\n        vertical-align: top;\n        border-radius: 0.08rem;\n        margin-top: 0.08rem;\n        color: #c62f2f;\n        font-size: 0.2rem;\n        text-align: center;\n        line-height: 0.4rem;\n        margin-left: 0.06rem;\n        box-shadow: 0 0 0 2px #fff;\n}\n.publicOnlive-main .publicOnlivePage .main {\n      -moz-user-select: -moz-none;\n      -moz-user-select: none;\n      -o-user-select: none;\n      -webkit-user-select: none;\n      -ms-user-select: none;\n      user-select: none;\n      -webkit-touch-callout: none;\n}\n.publicOnlive-main .publicOnlivePage .main .msg-mask {\n        display: none;\n        position: fixed;\n        top: 0;\n        right: 0;\n        left: 0;\n        bottom: 0;\n        z-index: 1;\n}\n.publicOnlive-main .publicOnlivePage .main .msg-mask.show {\n          display: block;\n}\n.publicOnlive-main .publicOnlivePage .main .end-h {\n        height: 0.3rem;\n}\n.publicOnlive-main .publicOnlivePage .main .end-info {\n        margin: 0.3rem 0;\n        background-color: transparent;\n        text-align: center;\n        font-size: 0.26rem;\n        color: #999;\n}\n.publicOnlive-main .publicOnlivePage .main .end-info span {\n          color: #c62f2f;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber {\n      position: relative;\n      background-color: #fff;\n      width: 100%;\n      z-index: 1;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .nav {\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        position: relative;\n        z-index: 10;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .nav a {\n          -webkit-box-flex: 1;\n          -webkit-flex: 1;\n              -ms-flex: 1;\n                  flex: 1;\n          position: relative;\n          height: 1rem;\n          font-size: 0.36rem;\n          color: #999999;\n          display: -webkit-box;\n          display: -webkit-flex;\n          display: -ms-flexbox;\n          display: flex;\n          -webkit-box-pack: center;\n          -webkit-justify-content: center;\n              -ms-flex-pack: center;\n                  justify-content: center;\n          -webkit-box-align: center;\n          -webkit-align-items: center;\n              -ms-flex-align: center;\n                  align-items: center;\n          border-left: 1px solid #e8e8e8;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .nav a:first-child {\n            border-left: none;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .nav a span {\n            position: relative;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .nav a span:before {\n              margin-right: 0.1rem;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .nav .audio-btn span:before {\n          width: 0.35rem;\n          height: 0.38rem;\n          background-position: -3.86rem -1.08rem;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .nav .text-btn span:before {\n          width: 0.36rem;\n          height: 0.36rem;\n          background-position: -0.37rem -1.11rem;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .nav .image-btn span:before {\n          width: 0.35rem;\n          height: 0.36rem;\n          background-position: -0.84rem -1.11rem;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .nav .ppt-btn span:before {\n          width: 0.35rem;\n          height: 0.36rem;\n          background-position: -3.05rem -1.11rem;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .nav .operate-btn span:before {\n          width: 0.36rem;\n          height: 0.36rem;\n          background-position: -1.27rem -1.11rem;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .nav a.active {\n          color: #333;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .nav a.active.audio-btn span:before {\n            background-position-x: -2.3rem;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .nav a.active.text-btn span:before {\n            background-position-x: -2.67rem;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .nav a.active.ppt-btn span:before {\n            background-position-x: -3.463rem;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .nav a.active.image-btn span:before {\n            background-position-x: -4.7rem;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .mint-popup {\n        width: 100%;\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        height: 2.3rem;\n        z-index: 999999 !important;\n        background-color: #fff;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .mint-popup a {\n          -webkit-box-flex: 1;\n          -webkit-flex: 1;\n              -ms-flex: 1;\n                  flex: 1;\n          text-align: center;\n          padding-top: 0.44rem;\n          line-height: 1;\n          font-size: 0.26rem;\n          color: #999;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .mint-popup a span {\n            display: block;\n            margin: 0 auto;\n            border-radius: 0.2rem;\n            width: 1rem;\n            height: 1rem;\n            box-sizing: border-box;\n            position: relative;\n            margin-bottom: 0.16rem;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .mint-popup a span:before {\n              content: \"\";\n              position: absolute;\n              top: 50%;\n              left: 50%;\n              display: inline-block;\n              -webkit-transform: translate(-50%, -50%);\n                  -ms-transform: translate(-50%, -50%);\n                      transform: translate(-50%, -50%);\n              width: 1.24rem;\n              height: 1.3rem;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .mint-popup a:nth-child(1) span:before {\n            background: url(\"/images/live/jqjs@2x.png\") no-repeat center center;\n            background-size: 1rem auto;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .mint-popup a:nth-child(2) span:before {\n            background: url(\"/images/live/jqfs@2x.png\") no-repeat center center;\n            background-size: 1rem auto;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .mint-popup a:nth-child(3) span:before {\n            background: url(\"/images/live/jyms@2x.png\") no-repeat center center;\n            background-size: 1rem auto;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .mint-popup a:nth-child(4) span:before {\n            background: url(\"/images/live/jszb@2x.png\") no-repeat center center;\n            background-size: 1rem auto;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .audio-content {\n        height: 5.6rem;\n        text-align: center;\n        box-sizing: border-box;\n        font-size: 0.34rem;\n        color: #999;\n        line-height: 1;\n        width: 100%;\n        background: #fff;\n        position: fixed;\n        z-index: 11111;\n        bottom: 0;\n        left: 0;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .audio-content h5 {\n          height: 1rem;\n          line-height: 1rem;\n          border-bottom: 1px solid #e8e8e8;\n          color: #1c0808;\n          font-size: 0.32rem;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .audio-content .cancle-audio {\n          display: inline-block;\n          width: 0.35rem;\n          position: absolute;\n          right: 0.24rem;\n          height: 1rem;\n          background: url(\"/images/cha.png\") center center no-repeat;\n          background-size: 100% auto;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .audio-content .audio-box {\n          padding-top: 0.1rem;\n          position: relative;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .audio-content .audio-box .concentrateBox {\n            background: none;\n            border-left: 0;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .audio-content .btn {\n          width: 2.24rem;\n          height: 2.24rem;\n          margin: 0.32rem auto;\n          border: 0.04rem solid #dcdbdb;\n          border-radius: 50%;\n          display: -webkit-box;\n          display: -webkit-flex;\n          display: -ms-flexbox;\n          display: flex;\n          -webkit-box-pack: center;\n          -webkit-justify-content: center;\n              -ms-flex-pack: center;\n                  justify-content: center;\n          -webkit-box-align: center;\n          -webkit-align-items: center;\n              -ms-flex-align: center;\n                  align-items: center;\n          position: relative;\n          color: #fff;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .audio-content .btn .pause-icon {\n            width: 0.72rem;\n            height: 1rem;\n            display: -webkit-box;\n            display: -webkit-flex;\n            display: -ms-flexbox;\n            display: flex;\n            -webkit-box-pack: justify;\n            -webkit-justify-content: space-between;\n                -ms-flex-pack: justify;\n                    justify-content: space-between;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .audio-content .btn .pause-icon:before, .publicOnlive-main .publicOnlivePage .bottom-tabber .audio-content .btn .pause-icon:after {\n              content: \"\";\n              display: block;\n              width: 0.18rem;\n              height: 100%;\n              background-color: #fff;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .audio-content .btn:before {\n            content: \"\";\n            width: 2rem;\n            height: 2rem;\n            background-color: #c62f2f;\n            border-radius: 50%;\n            position: absolute;\n            left: 50%;\n            top: 50%;\n            -webkit-transform: translate(-50%, -50%);\n                -ms-transform: translate(-50%, -50%);\n                    transform: translate(-50%, -50%);\n            z-index: -1;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .audio-content .btn.active {\n            border-color: #c62f2f;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .audio-content .btn.active:before {\n              background-color: #c62f2f;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .audio-content .cancel-btn {\n          position: absolute;\n          padding: 0 0.16rem;\n          line-height: 0.5rem;\n          height: 0.48rem;\n          border-radius: 0.24rem;\n          border: 1px solid #c62f2f;\n          color: #c62f2f;\n          top: 0.4rem;\n          right: 0.4rem;\n          font-size: 0.28rem;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .text-content {\n        background-color: #fff;\n        border-top: 1px solid #ededed;\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-align: end;\n        -webkit-align-items: flex-end;\n            -ms-flex-align: end;\n                align-items: flex-end;\n        box-sizing: border-box;\n        position: relative;\n        width: 100%;\n        padding: 0.1rem 0;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .text-content textarea {\n          resize: none;\n          height: 0.8rem;\n          line-height: 0.8rem;\n          font-size: 0.32rem;\n          box-sizing: border-box;\n          padding: 0 0.1rem;\n          -webkit-box-flex: 4;\n          -webkit-flex: 4;\n              -ms-flex: 4;\n                  flex: 4;\n          color: #353535;\n          background-color: #f5f7f8;\n          border-radius: 5px 0 0 5px;\n          margin-left: 0.16rem;\n          overflow: hidden;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .text-content textarea.blue {\n            color: #c62f2f;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .text-content textarea.text-input {\n          overflow: inherit;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .text-content textarea.text-input.line-1 {\n            height: 0.8rem;\n            line-height: 0.8rem;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .text-content textarea.text-input.line-2 {\n            height: 1.1rem;\n            line-height: 0.5rem;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .text-content textarea.text-input.line-3 {\n            height: 1.6rem;\n            line-height: 0.5rem;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .text-content textarea.text-input.line-4 {\n            height: 2.1rem;\n            line-height: 0.5rem;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .text-content textarea.text-input.line-5 {\n            height: 2.6rem;\n            line-height: 0.5rem;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .text-content input {\n          height: 0.8rem;\n          line-height: 0.8rem;\n          font-size: 0.32rem;\n          box-sizing: border-box;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .text-content input[type=\"text\"] {\n            height: 0.8rem;\n            line-height: 0.8rem;\n            text-indent: 0.1rem;\n            -webkit-box-flex: 4;\n            -webkit-flex: 4;\n                -ms-flex: 4;\n                    flex: 4;\n            border-radius: 5px;\n            color: #353535;\n            background-color: #f5f7f8;\n            overflow: hidden;\n            margin-left: 0.16rem;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .text-content input[type=\"text\"].blue {\n              color: #c62f2f;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .text-content input[type=\"button\"] {\n            -webkit-box-flex: 1;\n            -webkit-flex: 1;\n                -ms-flex: 1;\n                    flex: 1;\n            width: 1.4rem;\n            height: 0.66rem;\n            line-height: 0.66rem;\n            margin: 0 0.16rem 0 0.16rem;\n            border-radius: 50px;\n            background-color: #b2b2b2;\n            color: #fff;\n            margin-bottom: 0.06rem;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .text-content input[type=\"button\"].blue {\n              background-color: #c62f2f;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .fixed {\n        /*position: fixed !important;*/\n        /*bottom: 0;*/\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .bottom-text {\n        width: 100%;\n        background-color: #fff;\n        position: relative;\n        box-sizing: border-box;\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-align: center;\n        -webkit-align-items: center;\n            -ms-flex-align: center;\n                align-items: center;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .bottom-text input[type=\"text\"]:focus + .comment-mask,\n        .publicOnlive-main .publicOnlivePage .bottom-tabber .bottom-text textarea:focus + .comment-mask {\n          display: block;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .bottom-text .comment-mask {\n          position: fixed;\n          top: 0;\n          right: 0;\n          left: 0;\n          bottom: 0;\n          display: none;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .bottom-text textarea {\n          line-height: 0.8rem;\n          resize: none;\n          font-size: 0.34rem;\n          height: 0.8rem;\n          text-indent: 0.08rem;\n          border-radius: 5px;\n          color: #353535;\n          background-color: #f5f7f8;\n          width: 100%;\n          position: relative;\n          z-index: 1;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .bottom-text textarea.blue {\n            color: #c62f2f;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .bottom-text textarea.pc-textarea {\n            height: inherit;\n            overflow: inherit;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .bottom-text textarea.comment-input {\n          overflow: inherit;\n          padding: 0;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .bottom-text textarea.comment-input.line-1 {\n            height: 0.8rem;\n            line-height: 0.8rem;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .bottom-text textarea.comment-input.line-2 {\n            height: 1.1rem;\n            line-height: 0.5rem;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .bottom-text textarea.comment-input.line-3 {\n            height: 1.6rem;\n            line-height: 0.5rem;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .bottom-text textarea.comment-input.line-4 {\n            height: 2.1rem;\n            line-height: 0.5rem;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .bottom-text textarea.comment-input.line-5 {\n            height: 2.6rem;\n            line-height: 0.5rem;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .bottom-text .new-comment-input {\n          /*margin-top: 0 !important;*/\n          background: #f5f7f8;\n          border-radius: 5px;\n          height: 0.8rem;\n          font-size: 0.32rem;\n          margin-left: 0.2rem;\n          margin-right: 0.2rem;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .bottom-text .long-comment-input {\n          -webkit-box-flex: 4;\n          -webkit-flex: 4;\n              -ms-flex: 4;\n                  flex: 4;\n          border-bottom: 1px solid #dbdbdb;\n          font-size: 0.32rem;\n          margin-top: 0.1rem;\n          margin-bottom: 0.1rem;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .bottom-text input {\n          font-size: 0.34rem;\n          height: 0.66rem;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .bottom-text input[type=\"text\"] {\n            margin-top: 0.24rem;\n            text-indent: 0.08rem;\n            border-radius: 5px;\n            color: #353535;\n            width: 100%;\n            position: relative;\n            z-index: 1;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .bottom-text input[type=\"text\"].blue {\n              color: #c62f2f;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .bottom-text input[type=\"button\"] {\n            position: absolute;\n            top: 0.24rem;\n            right: 0.24rem;\n            border-radius: 0 0.1rem 0.1rem 0;\n            width: 1.5rem;\n            background-color: #b2b2b2;\n            color: #fff;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .bottom-text input[type=\"button\"].blue {\n              background-color: #c62f2f;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .bottom-text .state-one {\n          display: -webkit-box;\n          display: -ms-flexbox;\n          display: -webkit-flex;\n          display: flex;\n          -webkit-box-align: center;\n              -ms-flex-align: center;\n                  align-items: center;\n          -webkit-align-items: center;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .bottom-text .state-one .tap-aid {\n            width: 0.74rem;\n            height: 1rem;\n            overflow: hidden;\n            border-left: 1px solid #e8e8e8;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .bottom-text .state-one .tap-aid .pic {\n              width: 0.46rem;\n              height: 0.46rem;\n              background: url(\"/images/3.0/icon-14.png\") no-repeat center center;\n              background-size: cover;\n              -moz-background-size: cover;\n              -webkit-background-size: cover;\n              -o-background-size: cover;\n              background-position: center center;\n              margin: 0 auto;\n              margin-top: 0.27rem;\n              margin-right: 0.27rem;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .bottom-text .state-two {\n          -webkit-box-flex: 1;\n          -webkit-flex: 1;\n              -ms-flex: 1;\n                  flex: 1;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .bottom-text .state-two input {\n            font-size: 0.32rem;\n            height: 0.66rem;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .bottom-text .state-two input[type=\"text\"] {\n              text-indent: 0.08rem;\n              border-radius: 5px;\n              color: #888;\n              position: relative;\n              z-index: 1;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .bottom-text .state-two input[type=\"text\"].blue {\n                color: #c62f2f;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .bottom-text .state-two input[type=\"button\"] {\n              position: absolute;\n              top: 0;\n              right: 0;\n              margin-top: 0.16rem;\n              margin-right: 0.16rem;\n              font-size: 0.32rem;\n              border-radius: 50px;\n              width: 1.4rem;\n              height: 0.66rem;\n              padding: 0;\n              background-color: #b2b2b2;\n              color: #fff;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .bottom-text .state-two input[type=\"button\"].blue {\n                background-color: #c62f2f;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .tips {\n        position: absolute;\n        top: -0.6rem;\n        width: 100%;\n        line-height: 0.6rem;\n        height: 0.6rem;\n        background: #f5f7f8;\n}\n.publicOnlive-main .publicOnlivePage .bottom-tabber .tips span {\n          display: inline-block;\n          font-size: 0.26rem;\n}\n.publicOnlive-main .publicOnlivePage .mini-comment {\n      position: absolute;\n      right: 0.3rem;\n      top: 0.64rem;\n      -webkit-transform: translateY(-100%);\n          -ms-transform: translateY(-100%);\n              transform: translateY(-100%);\n      margin-top: -0.8rem;\n      z-index: 10;\n}\n.publicOnlive-main .publicOnlivePage .mini-comment .list .item {\n        opacity: 0;\n        display: none;\n}\n.publicOnlive-main .publicOnlivePage .mini-comment .list-opacity .item {\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-animation: commentRoom 10s linear forwards;\n                animation: commentRoom 10s linear forwards;\n}\n.publicOnlive-main .publicOnlivePage .mini-comment .item {\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-pack: end;\n        -webkit-justify-content: flex-end;\n            -ms-flex-pack: end;\n                justify-content: flex-end;\n        margin-bottom: 0.1rem;\n}\n.publicOnlive-main .publicOnlivePage .mini-comment .item > section {\n          display: -webkit-box;\n          display: -webkit-flex;\n          display: -ms-flexbox;\n          display: flex;\n          background: #f68f6b;\n          border-radius: 50px;\n}\n.publicOnlive-main .publicOnlivePage .mini-comment .item img {\n          border-radius: 50%;\n          width: 0.36rem;\n          height: 0.36rem;\n          border: 1px solid #ffffff;\n          margin: 0.06rem;\n}\n.publicOnlive-main .publicOnlivePage .mini-comment .item p {\n          white-space: nowrap;\n          border-radius: 0.1rem;\n          color: #fff;\n          font-size: 0.22rem;\n          min-height: 0.5rem;\n          box-sizing: border-box;\n          padding: 0.1rem 0.04rem 0.1rem 0.16rem;\n          display: -webkit-box;\n          display: -webkit-flex;\n          display: -ms-flexbox;\n          display: flex;\n          -webkit-box-align: center;\n          -webkit-align-items: center;\n              -ms-flex-align: center;\n                  align-items: center;\n          -webkit-box-pack: center;\n          -webkit-justify-content: center;\n              -ms-flex-pack: center;\n                  justify-content: center;\n          word-break: break-all;\n          position: relative;\n}\n.publicOnlive-main .publicOnlivePage .mini-comment .mini-container {\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-pack: end;\n        -webkit-justify-content: flex-end;\n            -ms-flex-pack: end;\n                justify-content: flex-end;\n        background-color: transparent;\n}\n.publicOnlive-main .publicOnlivePage .mini-comment .mini-comment-btn {\n        height: 0.5rem;\n        border-radius: 0.26rem;\n        background-color: #f68f6b;\n        display: block;\n        line-height: 0.5rem;\n        font-size: 0.28rem;\n        color: #fff;\n        -webkit-box-align: center;\n        -webkit-align-items: center;\n            -ms-flex-align: center;\n                align-items: center;\n        width: auto;\n}\n.publicOnlive-main .publicOnlivePage .mini-comment .mini-comment-btn .toggle {\n          width: 0.38rem;\n          height: 0.38rem;\n          background-color: rgba(255, 255, 255, 0.5);\n          box-sizing: border-box;\n          border-radius: 50%;\n          color: #fff;\n          text-align: center;\n          font-size: 0.26rem;\n          float: right;\n          margin: 0.06rem;\n          line-height: 0.36rem;\n}\n.publicOnlive-main .publicOnlivePage .mini-comment .mini-comment-btn .number {\n          /* flex: 1;*/\n          padding: 0 0.1rem 0 0.14rem;\n          -webkit-box-align: center;\n          -webkit-align-items: center;\n              -ms-flex-align: center;\n                  align-items: center;\n          font-size: 0.24rem;\n          float: left;\n}\n.publicOnlive-main .publicOnlivePage .mini-comment .mini-comment-btn .number span {\n            width: 0.28rem;\n            height: 0.24rem;\n            display: block;\n            background: url(\"/images/live-18.png\") no-repeat center center/100% 100%;\n            margin-right: 0.12rem;\n}\n.publicOnlive-main .publicOnlivePage .comment-room {\n      width: 100%;\n      height: -webkit-calc(100vh - 5.06rem);\n      height: calc(100vh - 5.06rem);\n      background-color: transparent;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-orient: vertical;\n      -webkit-box-direction: normal;\n      -webkit-flex-direction: column;\n          -ms-flex-direction: column;\n              flex-direction: column;\n      box-sizing: border-box;\n      padding-bottom: 1rem;\n      padding-top: 1.1rem;\n      background: #ffffff;\n}\n.publicOnlive-main .publicOnlivePage .comment-room.noplay {\n        padding-top: 0;\n        padding-bottom: 0;\n}\n.publicOnlive-main .publicOnlivePage .comment-room > .top {\n        height: 1.72rem;\n}\n.publicOnlive-main .publicOnlivePage .comment-room > .top .back-btn {\n          width: 2.1rem;\n          height: 0.66rem;\n          border-radius: 0.34rem;\n          background-color: #c62f2f;\n          color: #fff;\n          font-size: 0.32rem;\n          text-align: center;\n          line-height: 0.66rem;\n          margin: 0 auto;\n          margin-top: 0.52rem;\n}\n.publicOnlive-main .publicOnlivePage .comment-room .comment-list {\n        background-color: #f5f7f8;\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-orient: vertical;\n        -webkit-box-direction: normal;\n        -webkit-flex-direction: column;\n            -ms-flex-direction: column;\n                flex-direction: column;\n        -webkit-box-flex: 1;\n        -webkit-flex: 1;\n            -ms-flex: 1;\n                flex: 1;\n        z-index: 1;\n        padding-top: 1.1rem;\n        padding: 0 0;\n}\n.publicOnlive-main .publicOnlivePage .comment-room .comment-list .tip {\n          position: absolute;\n          height: 0.8rem;\n          z-index: 111;\n          color: #ff5502;\n          width: 100vw;\n          background-color: #f5f7f8;\n          line-height: 0.8rem;\n          text-align: center;\n          padding: 0 0.24rem;\n}\n.publicOnlive-main .publicOnlivePage .comment-room .comment-list .boxs {\n          -webkit-box-flex: 1;\n          -webkit-flex: 1;\n              -ms-flex: 1;\n                  flex: 1;\n          -webkit-overflow-scrolling: touch;\n          overflow: hidden;\n          height: auto;\n          width: 100%;\n          position: relative;\n          padding: 0 0.24rem;\n          box-sizing: border-box;\n}\n.publicOnlive-main .publicOnlivePage .comment-room .comment-list ._v-content {\n          min-height: 100%;\n          padding: 0 0.24rem 0.6rem;\n          box-sizing: border-box;\n}\n.publicOnlive-main .publicOnlivePage .comment-room .comment-list ._v-content .pull-to-refresh-layer {\n            padding-bottom: 0.1rem;\n}\n.publicOnlive-main .publicOnlivePage .comment-room .comment-list .txt {\n          font-size: 0.24rem;\n          color: #b2b2b2;\n          text-align: center;\n          position: absolute;\n          bottom: 0;\n          width: 100%;\n          right: 0;\n          margin: 0 0 0.3rem;\n}\n.publicOnlive-main .publicOnlivePage .comment-room .comment-list .menu-mask {\n          position: fixed;\n          top: 0;\n          right: 0;\n          left: 0;\n          bottom: 0;\n          display: none;\n          z-index: 1;\n}\n.publicOnlive-main .publicOnlivePage .comment-room .comment-list .box {\n          padding: 0 0 0.29rem;\n          /* display: flex; */\n}\n.publicOnlive-main .publicOnlivePage .comment-room .comment-list .box:first-child {\n            padding-top: 0.29rem;\n}\n.publicOnlive-main .publicOnlivePage .comment-room .comment-list .box .forbid {\n            color: #f5ca00;\n            font-size: 0.26rem;\n}\n.publicOnlive-main .publicOnlivePage .comment-room .comment-list .box .time {\n            margin-left: 0.1rem;\n}\n.publicOnlive-main .publicOnlivePage .comment-room .comment-list .box .yellow {\n            color: #ff7615;\n}\n.publicOnlive-main .publicOnlivePage .comment-room .comment-list .box .item-menu {\n            bottom: -0.72rem;\n            left: -0.14rem;\n            position: absolute;\n            display: -webkit-box;\n            display: -webkit-flex;\n            display: -ms-flexbox;\n            display: flex;\n            border-radius: 0.08rem;\n            border: 1px solid #ddbbbb;\n            box-shadow: 0 0 0.3rem 0.04rem #eaeaea;\n            background-color: #fbf7f7;\n            -webkit-transform: scale(0, 0);\n                -ms-transform: scale(0, 0);\n                    transform: scale(0, 0);\n            -webkit-transition: -webkit-transform 0.3s ease;\n            transition: -webkit-transform 0.3s ease;\n            transition: transform 0.3s ease;\n            transition: transform 0.3s ease, -webkit-transform 0.3s ease;\n            -webkit-transform-origin: 2.4rem -0.06rem;\n                -ms-transform-origin: 2.4rem -0.06rem;\n                    transform-origin: 2.4rem -0.06rem;\n            z-index: 2;\n}\n.publicOnlive-main .publicOnlivePage .comment-room .comment-list .box .item-menu.active {\n              -webkit-transform: scale(1, 1);\n                  -ms-transform: scale(1, 1);\n                      transform: scale(1, 1);\n}\n.publicOnlive-main .publicOnlivePage .comment-room .comment-list .box .item-menu:after {\n              content: \"\";\n              position: absolute;\n              width: 0.06rem;\n              height: 0.06rem;\n              -webkit-transform: rotate(45deg);\n                  -ms-transform: rotate(45deg);\n                      transform: rotate(45deg);\n              border-width: 1px;\n              border-style: solid;\n              border-color: #ccc transparent transparent #ccc;\n              left: 0.22rem;\n              top: -0.06rem;\n              background-color: #fff;\n}\n.publicOnlive-main .publicOnlivePage .comment-room .comment-list .box .item-menu a {\n              text-align: center;\n              -webkit-box-flex: 1;\n              -webkit-flex: 1;\n                  -ms-flex: 1;\n                      flex: 1;\n              display: block;\n              height: 0.62rem;\n              position: relative;\n              width: 1rem;\n              font-size: 0.26rem;\n              color: #bb7777;\n              line-height: 0.62rem;\n              box-sizing: border-box;\n}\n.publicOnlive-main .publicOnlivePage .comment-room .comment-list .box .item-menu a.gray {\n                color: #adadad;\n}\n.publicOnlive-main .publicOnlivePage .comment-room .comment-list .box h5 {\n            font-size: 0.24rem;\n            color: #b2b2b2;\n            margin-bottom: 0.12rem;\n            display: -webkit-box;\n            display: -webkit-flex;\n            display: -ms-flexbox;\n            display: flex;\n}\n.publicOnlive-main .publicOnlivePage .comment-room .comment-list .box h5 .teacher {\n              width: 0.56rem;\n              height: 0.28rem;\n              background: url(\"/images/1.9/jiangshi-ben@2x.png\") center no-repeat;\n              background-size: 0.55rem 0.28rem;\n              margin-right: 0.1rem;\n}\n.publicOnlive-main .publicOnlivePage .comment-room .comment-list .box h5 .ass {\n              width: 0.56rem;\n              height: 0.28rem;\n              background: url(\"/images/1.9/zhuli-ben@2x.png\") center no-repeat;\n              background-size: 0.55rem 0.28rem;\n              margin-right: 0.1rem;\n}\n.publicOnlive-main .publicOnlivePage .comment-room .comment-list .box h5 .name {\n              margin-right: 0.1rem;\n}\n.publicOnlive-main .publicOnlivePage .comment-room .comment-list .box h5 > a {\n              margin-top: 0.05rem;\n              margin-right: 0.2rem;\n              display: -webkit-box;\n              display: -webkit-flex;\n              display: -ms-flexbox;\n              display: flex;\n              box-sizing: border-box;\n              padding: 0 0.04rem;\n              -webkit-box-pack: justify;\n              -webkit-justify-content: space-between;\n                  -ms-flex-pack: justify;\n                      justify-content: space-between;\n              -webkit-box-align: center;\n              -webkit-align-items: center;\n                  -ms-flex-align: center;\n                      align-items: center;\n              width: 0.26rem;\n              height: 0.16rem;\n              margin-left: 0.15rem;\n              border-radius: 3px;\n              background-color: #e4e4e4;\n              position: relative;\n              z-index: 2;\n}\n.publicOnlive-main .publicOnlivePage .comment-room .comment-list .box h5 > a span {\n                position: absolute;\n                top: 0;\n                left: 0;\n                width: 100%;\n                height: 100%;\n                border-radius: 50%;\n}\n.publicOnlive-main .publicOnlivePage .comment-room .comment-list .box h5 > a i {\n                display: block;\n                width: 0.05rem;\n                height: 0.05rem;\n                background-color: #fff;\n                border-radius: 50%;\n}\n.publicOnlive-main .publicOnlivePage .comment-room .comment-list .box .item {\n            padding-right: 1.2rem;\n}\n.publicOnlive-main .publicOnlivePage .comment-room .comment-list .box .item span,\n            .publicOnlive-main .publicOnlivePage .comment-room .comment-list .box .item p {\n              font-size: 0.28rem;\n}\n.publicOnlive-main .publicOnlivePage .comment-room .comment-list .box .item span {\n              color: #888;\n              display: inline;\n}\n.publicOnlive-main .publicOnlivePage .comment-room .comment-list .box .item p {\n              display: inline;\n              color: #1c0808;\n}\n.publicOnlive-main .publicOnlivePage .comment-room .comment-list .box .item img {\n              max-width: 30%;\n}\n.publicOnlive-main .publicOnlivePage .comment-room .comment-list .box .item .linkBox {\n              width: 5.2rem;\n              height: 1.4rem;\n              background-color: #ffffff;\n              border-radius: 0.1rem;\n              border: solid 1px #dbdbdb;\n              padding: 0.16rem 0.21rem;\n}\n.publicOnlive-main .publicOnlivePage .comment-room .comment-list .box .item .linkBox .img {\n                width: 1.9rem;\n                height: 100%;\n                float: left;\n}\n.publicOnlive-main .publicOnlivePage .comment-room .comment-list .box .item .linkBox .img img {\n                  width: 100%;\n                  height: 100%;\n                  max-width: 100%;\n}\n.publicOnlive-main .publicOnlivePage .comment-room .comment-list .box .item .linkBox .text {\n                float: left;\n                padding-left: 0.19rem;\n                width: 2.9rem;\n}\n.publicOnlive-main .publicOnlivePage .comment-room .comment-list .box .item .linkBox .text h2 {\n                  font-size: 0.24rem;\n                  color: #1c0808;\n                  padding-top: 0.02rem;\n                  overflow: hidden;\n                  /* 超出部分隐藏 */\n                  white-space: nowrap;\n                  /* 不换行 */\n                  text-overflow: ellipsis;\n                  /* 超出部分文字以...显示 */\n}\n.publicOnlive-main .publicOnlivePage .comment-room .comment-list .box .item .linkBox .text span {\n                  padding-top: 0.13rem;\n                  font-size: 0.18rem;\n                  color: #888888;\n                  padding-bottom: 0.11rem;\n                  display: block;\n}\n.publicOnlive-main .publicOnlivePage .comment-room .comment-list .box .item .linkBox .text p {\n                  font-size: 0.18rem;\n                  color: #888888;\n                  line-height: 0.26rem;\n                  overflow: hidden;\n                  text-overflow: ellipsis;\n                  display: -webkit-box;\n                  -webkit-line-clamp: 2;\n                  -webkit-box-orient: vertical;\n}\n.publicOnlive-main .publicOnlivePage .mask {\n      position: fixed;\n      top: 0;\n      right: 0;\n      left: 0;\n      bottom: 0;\n      background-color: rgba(0, 0, 0, 0.4);\n      z-index: 20;\n}\n.publicOnlive-main .publicOnlivePage .forbidden-mode {\n      z-index: 20;\n      position: fixed;\n      width: 5.8rem;\n      background-color: #fff;\n      border-radius: 0.2rem;\n      bottom: 0;\n      left: 50%;\n      -webkit-transform: translate(-50%, 100%);\n          -ms-transform: translate(-50%, 100%);\n              transform: translate(-50%, 100%);\n      text-align: center;\n      padding-top: 0.4rem;\n      z-index: 9999;\n      -webkit-transition: all 0.3s ease;\n      transition: all 0.3s ease;\n      height: auto;\n      overflow: hidden;\n}\n.publicOnlive-main .publicOnlivePage .forbidden-mode .mtSwitch {\n        position: relative;\n        height: 1rem;\n        width: 40%;\n        margin: 0 auto;\n        text-align: center;\n}\n.publicOnlive-main .publicOnlivePage .forbidden-mode .mtSwitch .on {\n          position: absolute;\n          top: 0.13rem;\n          right: 0.5rem;\n          color: #fff;\n}\n.publicOnlive-main .publicOnlivePage .forbidden-mode .mtSwitch .off {\n          position: absolute;\n          top: 0.13rem;\n          left: 0.5rem;\n          color: #fff;\n}\n.publicOnlive-main .publicOnlivePage .forbidden-mode .mint-switch-input:checked + .mint-switch-core {\n        background-color: #f9916d;\n        border-color: #f9916d;\n        width: 82px;\n}\n.publicOnlive-main .publicOnlivePage .forbidden-mode .mint-switch-input:checked + .mint-switch-core:after {\n        -webkit-transform: translateX(50px);\n        -ms-transform: translateX(50px);\n            transform: translateX(50px);\n}\n.publicOnlive-main .publicOnlivePage .forbidden-mode.active {\n        bottom: 50%;\n        -webkit-transform: translate(-50%, 50%);\n            -ms-transform: translate(-50%, 50%);\n                transform: translate(-50%, 50%);\n}\n.publicOnlive-main .publicOnlivePage .forbidden-mode h5 {\n        font-size: 0.32rem;\n        color: #1c0808;\n        line-height: 1;\n}\n.publicOnlive-main .publicOnlivePage .forbidden-mode p {\n        font-size: 0.32rem;\n        color: #888;\n        line-height: 1.2rem;\n}\n.publicOnlive-main .publicOnlivePage .forbidden-mode .mint-switch {\n        -webkit-box-pack: center;\n        -webkit-justify-content: center;\n            -ms-flex-pack: center;\n                justify-content: center;\n        margin: 0 auto 0.42rem auto;\n        width: 100%;\n        position: relative;\n}\n.publicOnlive-main .publicOnlivePage .forbidden-mode button {\n        font-size: 0.36rem;\n        color: #fff;\n        background-color: #c62f2f;\n        line-height: 1rem;\n        width: 100%;\n        border: 0px;\n}\n.publicOnlive-main .publicOnlivePage .finish-mode {\n      position: fixed;\n      bottom: 0;\n      left: 50%;\n      -webkit-transform: translate(-50%, 100%);\n          -ms-transform: translate(-50%, 100%);\n              transform: translate(-50%, 100%);\n      width: 80%;\n      background-color: #fff;\n      border-radius: 0.1rem;\n      padding: 0.42rem 0.48rem;\n      -webkit-transition: all 0.3s ease;\n      transition: all 0.3s ease;\n      z-index: 9999;\n}\n.publicOnlive-main .publicOnlivePage .finish-mode h5 {\n        font-size: 0.34rem;\n        color: #333333;\n        line-height: 1;\n        margin-bottom: 0.36rem;\n        text-align: center;\n}\n.publicOnlive-main .publicOnlivePage .finish-mode p {\n        font-size: 0.32rem;\n        color: #666;\n        line-height: 0.46rem;\n        margin-bottom: 0.26rem;\n}\n.publicOnlive-main .publicOnlivePage .finish-mode.active {\n        bottom: 50%;\n        -webkit-transform: translate(-50%, 50%);\n            -ms-transform: translate(-50%, 50%);\n                transform: translate(-50%, 50%);\n}\n.publicOnlive-main .publicOnlivePage .finish-mode .btns {\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-pack: justify;\n        -webkit-justify-content: space-between;\n            -ms-flex-pack: justify;\n                justify-content: space-between;\n}\n.publicOnlive-main .publicOnlivePage .finish-mode .btns button {\n          width: 45%;\n          line-height: 0.9rem;\n          box-sizing: border-box;\n          font-size: 0.36rem;\n          text-align: center;\n          border-radius: 0.1rem;\n}\n.publicOnlive-main .publicOnlivePage .finish-mode .btns .cancel-btn {\n          color: #999999;\n          border: 1px solid #b2b2b2;\n          background-color: #fff;\n}\n.publicOnlive-main .publicOnlivePage .finish-mode .btns .confirm-btn {\n          color: #fff;\n          background-color: #c62f2f;\n          border: none;\n}\n.publicOnlive-main .publicOnlivePage .drop-record {\n      width: 85%;\n      border-radius: 0.06rem;\n      overflow: hidden;\n      background-color: #fff;\n      display: block;\n      height: auto;\n}\n.publicOnlive-main .publicOnlivePage .drop-record .msgcontent {\n        padding: 0.2rem 0.4rem 0.3rem 0.4rem;\n        min-height: 0.72rem;\n        position: relative;\n        font-size: 0.4rem;\n        line-height: 0.6rem;\n        text-align: center;\n}\n.publicOnlive-main .publicOnlivePage .drop-record .msgbtns {\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        height: 1.32rem;\n        line-height: 0.9rem;\n}\n.publicOnlive-main .publicOnlivePage .drop-record .msgbtns a {\n          border-radius: 0.1rem;\n          height: 0.9rem;\n          font-size: 0.36rem;\n          line-height: 0.9rem;\n          width: 45%;\n          box-sizing: border-box;\n          text-align: center;\n          padding-top: 0;\n}\n.publicOnlive-main .publicOnlivePage .drop-record .msgbtns a:first-child {\n            margin-left: 0.4rem;\n            margin-right: 0.28rem;\n            color: #999;\n            border: 1px solid #b2b2b2;\n}\n.publicOnlive-main .publicOnlivePage .drop-record .msgbtns a:last-child {\n            color: #fff;\n            background-color: #c62f2f;\n            margin-left: 0.28rem;\n            margin-right: 0.4rem;\n}\n.publicOnlive-main .publicOnlivePage .operate-content .mint-popup {\n      height: 4.2rem;\n      display: inherit;\n}\n.publicOnlive-main .publicOnlivePage .operate-content .mint-popup a {\n        width: 25%;\n        height: 1.42rem;\n        float: left;\n        -webkit-box-flex: 0;\n        -webkit-flex: none;\n            -ms-flex: none;\n                flex: none;\n}\n.publicOnlive-main .publicOnlivePage .operate-content .mint-popup a:nth-child(5) span:before {\n          width: 1.24rem;\n          height: 1.3rem;\n          background: url(\"/images/live/fslj@2x.png\") no-repeat center center;\n          background-size: 1rem auto;\n}\n.publicOnlive-main .publicOnlivePage .operate-content .mint-popup a:nth-child(7) span:before {\n          width: 1.24rem;\n          height: 1.3rem;\n          background: url(\"/images/live/jykc@2x.png\") no-repeat center center;\n          background-size: 1rem auto;\n}\n.publicOnlive-main .publicOnlivePage .operate-content .mint-popup a.send-packet-btn span:before {\n          display: line-block;\n          width: 1.24rem;\n          height: 1.3rem;\n          background: url(\"/images/live/ldhb@2x.png\") no-repeat center center;\n          background-size: 1rem auto;\n}\n.publicOnlive-main .publicOnlivePage .operate-content-mini .mint-popup {\n      height: 2.2rem;\n}\n.publicOnlive-main .publicOnlivePage .reward-mask {\n      position: fixed;\n      top: 0;\n      right: 0;\n      left: 0;\n      bottom: 0;\n      z-index: 999;\n      background: rgba(0, 0, 0, 0.5);\n}\n.publicOnlive-main .publicOnlivePage .reward {\n      /* position: fixed;\r\n                  bottom: 0; */\n      width: 100%;\n      -webkit-transform: translateY(100%);\n          -ms-transform: translateY(100%);\n              transform: translateY(100%);\n      -webkit-transition: -webkit-transform 0.3s ease;\n      transition: -webkit-transform 0.3s ease;\n      transition: transform 0.3s ease;\n      transition: transform 0.3s ease, -webkit-transform 0.3s ease;\n      background: #ffffff;\n      z-index: 1000;\n}\n.publicOnlive-main .publicOnlivePage .reward.active {\n        -webkit-transform: translateY(0);\n            -ms-transform: translateY(0);\n                transform: translateY(0);\n}\n.publicOnlive-main .publicOnlivePage .reward article {\n        position: relative;\n}\n.publicOnlive-main .publicOnlivePage .reward h5 {\n        line-height: 1rem;\n        color: #1c0808;\n        font-size: 0.32rem;\n        padding-left: 0.24rem;\n        height: 1rem;\n        border-bottom: 1px solid #e8e8e8;\n        text-align: center;\n        position: relative;\n}\n.publicOnlive-main .publicOnlivePage .reward h5 span {\n          position: absolute;\n          top: 0;\n          right: 0;\n          width: 1rem;\n          height: 1rem;\n          background: url(\"/images/cha.png\") no-repeat center center;\n          background-size: 32% 32%;\n}\n.publicOnlive-main .publicOnlivePage .reward .gift-container .swiper-container {\n        height: 5rem;\n        position: initial;\n}\n.publicOnlive-main .publicOnlivePage .reward .gift-container .swiper-container .swiper-wrapper {\n          position: initial;\n}\n.publicOnlive-main .publicOnlivePage .reward .gift-container .swiper-container .swiper-wrapper .swiper-slide a {\n            display: -webkit-box;\n            display: -webkit-flex;\n            display: -ms-flexbox;\n            display: flex;\n            float: left;\n            -webkit-box-orient: vertical;\n            -webkit-box-direction: normal;\n            -webkit-flex-direction: column;\n                -ms-flex-direction: column;\n                    flex-direction: column;\n            -webkit-box-align: center;\n            -webkit-align-items: center;\n                -ms-flex-align: center;\n                    align-items: center;\n            overflow: hidden;\n            width: 33.33333%;\n            height: 2.5rem;\n            padding-top: 0.2rem;\n            box-sizing: border-box;\n            border-bottom: 1px solid #e8e8e8;\n            background-color: #f5f7f8;\n            position: relative;\n}\n.publicOnlive-main .publicOnlivePage .reward .gift-container .swiper-container .swiper-wrapper .swiper-slide a:nth-child(3n-1) {\n              border-right: 1px solid #e8e8e8;\n              border-left: 1px solid #e8e8e8;\n}\n.publicOnlive-main .publicOnlivePage .reward .gift-container .swiper-container .swiper-wrapper .swiper-slide a.active {\n              border: 0.02rem solid #ff9696;\n              padding-top: 0.16rem;\n}\n.publicOnlive-main .publicOnlivePage .reward .gift-container .swiper-container .swiper-wrapper .swiper-slide a.vip-icon {\n              background: #f5f7f8 url(\"/images/inviteCard/invitation_card_label_vip.png\") no-repeat top right;\n              background-size: 0.76rem 0.76rem;\n}\n.publicOnlive-main .publicOnlivePage .reward .gift-container .swiper-container .swiper-wrapper .swiper-slide a .tag {\n              width: 0.36rem;\n              height: 0.36rem;\n              position: absolute;\n              bottom: 0.08rem;\n              right: 0.08rem;\n              background: url(\"/images/3.0/icon-18.png\") no-repeat 100%/100%;\n}\n.publicOnlive-main .publicOnlivePage .reward .gift-container .swiper-container .swiper-wrapper .swiper-slide a .gift-img {\n              background-repeat: no-repeat;\n              background-size: cover;\n              background-position: center center;\n              border-radius: 0.1rem;\n              width: 1.2rem;\n              height: 1.2rem;\n              margin-bottom: 0.08rem;\n}\n.publicOnlive-main .publicOnlivePage .reward .gift-container .swiper-container .swiper-wrapper .swiper-slide a h4 {\n              font-size: 0.32rem;\n              line-height: 0.6rem;\n              color: #333;\n}\n.publicOnlive-main .publicOnlivePage .reward .gift-container .swiper-container .swiper-wrapper .swiper-slide a p {\n              font-size: 0.26rem;\n              color: #888;\n}\n.publicOnlive-main .publicOnlivePage .reward .gift-container .swiper-container .swiper-pagination-bullet {\n          width: 4px;\n          height: 4px;\n          background: #888888;\n          border-radius: 0;\n          opacity: 1;\n          margin: 0 3px;\n}\n.publicOnlive-main .publicOnlivePage .reward .gift-container .swiper-container .swiper-pagination-bullet-active {\n          background: #c62f2f;\n}\n.publicOnlive-main .publicOnlivePage .reward .gift-container .swiper-container .swiper-pagination-bullets {\n          bottom: 1.54rem;\n}\n.publicOnlive-main .publicOnlivePage .reward .gift-container:after {\n        content: \"\";\n        display: block;\n        clear: both;\n}\n.publicOnlive-main .publicOnlivePage .reward .reward-bottom a {\n        display: block;\n}\n.publicOnlive-main .publicOnlivePage .reward .reward-bottom a:first-child {\n        font-size: 0.24rem;\n        color: #888;\n        text-align: center;\n        padding-bottom: 0.16rem;\n        padding-top: 0.4rem;\n}\n.publicOnlive-main .publicOnlivePage .reward .reward-bottom a:last-child {\n        display: block;\n        background-color: #888;\n        color: #fff;\n        font-size: 0.32rem;\n        line-height: 1rem;\n        height: 1rem;\n        width: 100%;\n        text-align: center;\n}\n.publicOnlive-main .publicOnlivePage .reward .reward-bottom a:last-child.active {\n          background-color: #c62f2f;\n}\n.publicOnlive-main .publicOnlivePage .aid-box {\n      width: 5.8rem;\n      background-color: #ffffff;\n      border-radius: 8px;\n}\n.publicOnlive-main .publicOnlivePage .aid-box main {\n        text-align: center;\n}\n.publicOnlive-main .publicOnlivePage .aid-box main img {\n          width: 2.8rem;\n          height: 2.8rem;\n          margin-top: 0.8rem;\n          margin-bottom: 0.48rem;\n}\n.publicOnlive-main .publicOnlivePage .aid-box main h3 {\n          color: #1c0808;\n          font-size: 0.32rem;\n}\n.publicOnlive-main .publicOnlivePage .aid-box main p {\n          font-size: 0.28rem;\n          color: #888888;\n          margin-top: 0.32rem;\n          margin-bottom: 0.54rem;\n}\n.publicOnlive-main .publicOnlivePage .aid-box button.close {\n        width: 100%;\n        height: 1rem;\n        background: #c62f2f;\n        color: #ffffff;\n        font-size: 0.36rem;\n        border-radius: 0 0 8px 8px;\n        border: none;\n}\n.publicOnlive-main .publicOnlivePage .aid-box .aid-container {\n        background: #ffffff;\n        border-radius: 0.07rem;\n        box-sizing: border-box;\n        margin: 36% auto;\n        position: relative;\n}\n.publicOnlive-main .publicOnlivePage .aid-box .aid-container .pic {\n          width: 3.73rem;\n          height: 3.73rem;\n          margin: 0 auto;\n}\n.publicOnlive-main .publicOnlivePage .aid-box .aid-container .pic img {\n            width: 3.73rem;\n            height: 3.73rem;\n}\n.publicOnlive-main .publicOnlivePage .aid-box .aid-container .aid-word {\n          font-size: 0.36rem;\n          color: #666666;\n          text-align: center;\n          margin: 0.53rem 0 0 0;\n}\n.publicOnlive-main .publicOnlivePage .aid-box .icon-cancel {\n        position: absolute;\n        display: block;\n        top: 0.15rem;\n        right: 0.15rem;\n        height: 0.42rem;\n        width: 0.42rem;\n        background: url(/images/space/cancel.png) center center no-repeat;\n        background-size: 100% 100%;\n}\n.publicOnlive-main .publicOnlivePage .closeOnLive-mode {\n      width: 5.8rem;\n      padding: 0px;\n      padding-top: 0.4rem;\n}\n.publicOnlive-main .publicOnlivePage .closeOnLive-mode p {\n        line-height: inherit;\n        text-align: left;\n        margin: 0.25rem 0;\n        padding: 0 0.5rem;\n}\n.publicOnlive-main .publicOnlivePage .closeOnLive-mode .mint-switch-core {\n        width: 82px;\n}\n.publicOnlive-main .publicOnlivePage .closeOnLive-mode .mint-switch-core:before {\n        width: 80px;\n}\n.publicOnlive-main .publicOnlivePage .closeOnLive-mode .mint-switch-input:checked + .mint-switch-core {\n        background-color: #f9916d;\n        border-color: #f9916d;\n        width: 82px;\n}\n.publicOnlive-main .publicOnlivePage .closeOnLive-mode .mint-switch-input:checked + .mint-switch-core:after {\n        -webkit-transform: translateX(50px);\n        -ms-transform: translateX(50px);\n            transform: translateX(50px);\n}\n.publicOnlive-main .publicOnlivePage .answer-popup {\n      width: 6.3rem;\n      border-radius: 0.06rem;\n      box-sizing: border-box;\n      padding: 0.32rem 0.43rem;\n      text-align: center;\n}\n.publicOnlive-main .publicOnlivePage .answer-popup h5 {\n        font-size: 0.32rem;\n        color: #333;\n        line-height: 0.32rem;\n        margin-bottom: 0.54rem;\n}\n.publicOnlive-main .publicOnlivePage .answer-popup input {\n        display: block;\n        height: 0.92rem;\n        line-height: 0.92rem;\n        border-radius: 0.92rem;\n        text-align: center;\n        width: 100%;\n        margin-bottom: 0.82rem;\n        background-color: #f0f0f0;\n        font-size: 0.3rem;\n        color: #666;\n}\n.publicOnlive-main .publicOnlivePage .answer-popup button {\n        display: block;\n        width: 100%;\n        height: 0.9rem;\n        font-size: 0.36rem;\n        color: #fff;\n        border: none;\n        background-color: #c62f2f;\n        border-radius: 0.9rem;\n}\n.publicOnlive-main .publicOnlivePage .answer-popup button:disabled {\n        opacity: 0.5;\n}\n.publicOnlive-main .publicOnlivePage .answer-popup a.close-btn {\n        position: absolute;\n        width: 0.42rem;\n        height: 0.42rem;\n        top: 0.12rem;\n        right: 0.12rem;\n        background: url(\"/images/sprites.png\") no-repeat -2.21rem 0/7.5rem auto;\n}\n.publicOnlive-main .publicOnlivePage .answer-comment {\n      width: 6.3rem;\n      border-radius: 4px;\n      box-sizing: border-box;\n      height: auto;\n      overflow: hidden;\n}\n.publicOnlive-main .publicOnlivePage .answer-comment .answer-comment-box {\n        padding: 0.24rem;\n}\n.publicOnlive-main .publicOnlivePage .answer-comment textarea {\n        resize: none;\n        background-color: #fbf7f7;\n        border-radius: 4px;\n        width: 100%;\n        box-sizing: border-box;\n        font-size: 0.3rem;\n        color: #666;\n        height: 3.02rem;\n        padding: 0.26rem 0.28rem;\n        margin-bottom: 0.3rem;\n}\n.publicOnlive-main .publicOnlivePage .answer-comment label {\n        margin-bottom: 0.36rem;\n        display: block;\n}\n.publicOnlive-main .publicOnlivePage .answer-comment label span {\n          border: 1px solid #bbbbbb;\n          display: block;\n          width: 0.36rem;\n          height: 0.36rem;\n          box-sizing: border-box;\n          border-radius: 0.36rem;\n          margin-right: 0.16rem;\n}\n.publicOnlive-main .publicOnlivePage .answer-comment label input[type=\"checkbox\"] {\n          display: none;\n}\n.publicOnlive-main .publicOnlivePage .answer-comment label div {\n          display: -webkit-box;\n          display: -webkit-flex;\n          display: -ms-flexbox;\n          display: flex;\n          -webkit-box-align: center;\n          -webkit-align-items: center;\n              -ms-flex-align: center;\n                  align-items: center;\n}\n.publicOnlive-main .publicOnlivePage .answer-comment label input:checked + div span {\n          border: none;\n          background-color: #bb7676;\n          display: -webkit-box;\n          display: -webkit-flex;\n          display: -ms-flexbox;\n          display: flex;\n          -webkit-box-align: center;\n          -webkit-align-items: center;\n              -ms-flex-align: center;\n                  align-items: center;\n          -webkit-box-pack: center;\n          -webkit-justify-content: center;\n              -ms-flex-pack: center;\n                  justify-content: center;\n}\n.publicOnlive-main .publicOnlivePage .answer-comment label input:checked + div span:before {\n            content: \"\";\n            width: 0.28rem;\n            height: 0.2rem;\n            display: block;\n            background: url(\"/images/sprites.png\") no-repeat 0 -4.32rem/7.5rem auto;\n}\n.publicOnlive-main .publicOnlivePage .answer-comment label input:checked + div p {\n          color: #666;\n}\n.publicOnlive-main .publicOnlivePage .answer-comment label p {\n          font-size: 0.32rem;\n          color: #999;\n}\n.publicOnlive-main .publicOnlivePage .answer-comment .btns {\n        background: #c62f2f;\n        height: auto;\n        overflow: hidden;\n        padding: 0.2rem;\n}\n.publicOnlive-main .publicOnlivePage .answer-comment .btns a {\n          padding: 0;\n          width: 49%;\n          height: 0.8rem;\n          line-height: 0.8rem;\n          text-align: center;\n          display: block;\n          font-size: 0.36rem;\n          border: none;\n          float: left;\n}\n.publicOnlive-main .publicOnlivePage .answer-comment .btns a:first-child {\n          border-right: 1px solid #e8e8e8;\n}\n.publicOnlive-main .publicOnlivePage .answer-comment .btns .cancel-btn {\n          color: #fff;\n          background-color: transparent;\n}\n.publicOnlive-main .publicOnlivePage .answer-comment .btns .confirm-btn {\n          color: #fff;\n          background-color: #c62f2f;\n}\n.publicOnlive-main .mint-toast {\n    z-index: 9999;\n}\n.mint-switch {\n  -webkit-box-pack: center;\n  -webkit-justify-content: center;\n      -ms-flex-pack: center;\n          justify-content: center;\n  margin: 0 auto 0.42rem auto;\n  width: 100%;\n  position: relative;\n}\n.finish-mode {\n  position: fixed;\n  bottom: 0;\n  left: 50%;\n  -webkit-transform: translate(-50%, 100%);\n      -ms-transform: translate(-50%, 100%);\n          transform: translate(-50%, 100%);\n  width: 80%;\n  background-color: #fff;\n  border-radius: 0.1rem;\n  padding: 0.42rem 0.48rem;\n  -webkit-transition: all 0.3s ease;\n  transition: all 0.3s ease;\n  z-index: 9999;\n}\n.finish-mode h5 {\n    font-size: 0.34rem;\n    color: #333333;\n    line-height: 1;\n    margin-bottom: 0.36rem;\n    text-align: center;\n}\n.finish-mode p {\n    font-size: 0.32rem;\n    color: #666;\n    line-height: 0.46rem;\n    margin-bottom: 0.26rem;\n}\n.finish-mode.active {\n    bottom: 50%;\n    -webkit-transform: translate(-50%, 50%);\n        -ms-transform: translate(-50%, 50%);\n            transform: translate(-50%, 50%);\n}\n.finish-mode .btns {\n    display: -webkit-box;\n    display: -webkit-flex;\n    display: -ms-flexbox;\n    display: flex;\n    -webkit-box-pack: justify;\n    -webkit-justify-content: space-between;\n        -ms-flex-pack: justify;\n            justify-content: space-between;\n}\n.finish-mode .btns button {\n      width: 45%;\n      line-height: 0.9rem;\n      box-sizing: border-box;\n      font-size: 0.36rem;\n      text-align: center;\n      border-radius: 0.1rem;\n}\n.finish-mode .btns .cancel-btn {\n      color: #999999;\n      border: 1px solid #b2b2b2;\n      background-color: #fff;\n}\n.finish-mode .btns .confirm-btn {\n      color: #fff;\n      background-color: #c62f2f;\n      border: none;\n}\n.drop-record {\n  width: 85%;\n  border-radius: 0.06rem;\n  overflow: hidden;\n  background-color: #fff;\n  display: block;\n  height: auto;\n}\n.drop-record .msgcontent {\n    padding: 0.2rem 0.4rem 0.3rem 0.4rem;\n    min-height: 0.72rem;\n    position: relative;\n    font-size: 0.4rem;\n    line-height: 0.6rem;\n    text-align: center;\n}\n.drop-record .msgbtns {\n    display: -webkit-box;\n    display: -webkit-flex;\n    display: -ms-flexbox;\n    display: flex;\n    height: 1.32rem;\n    line-height: 0.9rem;\n}\n.drop-record .msgbtns a {\n      border-radius: 0.1rem;\n      height: 0.9rem;\n      font-size: 0.36rem;\n      line-height: 0.9rem;\n      width: 45%;\n      box-sizing: border-box;\n      text-align: center;\n      padding-top: 0;\n}\n.drop-record .msgbtns a:first-child {\n        margin-left: 0.4rem;\n        margin-right: 0.28rem;\n        color: #999;\n        border: 1px solid #b2b2b2;\n}\n.drop-record .msgbtns a:last-child {\n        color: #fff;\n        background-color: #c62f2f;\n        margin-left: 0.28rem;\n        margin-right: 0.4rem;\n}\n.operate-content .mint-popup {\n  height: 4.2rem;\n  display: inherit;\n}\n.operate-content .mint-popup a {\n    width: 25%;\n    height: 1.42rem;\n    float: left;\n    -webkit-box-flex: 0;\n    -webkit-flex: none;\n        -ms-flex: none;\n            flex: none;\n}\n.operate-content .mint-popup a:nth-child(5) span:before {\n      width: 1.24rem;\n      height: 1.3rem;\n      background: url(\"/images/live-13.png\") no-repeat center center;\n      background-size: 50% 50%;\n}\n.operate-content .mint-popup a:nth-child(7) span:before {\n      width: 1.24rem;\n      height: 1.3rem;\n      background: url(\"/images/live-15icon.png\") no-repeat center center;\n      background-size: 50% 50%;\n}\n.operate-content .mint-popup a.send-packet-btn span:before {\n      content: \"\";\n      display: inline-block;\n      width: 0.54rem;\n      height: 0.62rem;\n      background: url(\"/images/sprites.png\") no-repeat -1.63rem 0/7.5rem auto;\n}\n.operate-content-mini .mint-popup {\n  height: 2.2rem;\n}\n.closeOnLive-mode {\n  width: 70%;\n  padding: 0.4rem 0.5rem;\n}\n.closeOnLive-mode p {\n    line-height: inherit;\n    text-align: left;\n    margin: 0.25rem 0;\n}\n.closeOnLive-mode .mint-switch-input:checked + .mint-switch-core {\n    background-color: #4cd864;\n    border-color: #4cd864;\n}\n.answer-popup {\n  width: 6.3rem;\n  border-radius: 0.06rem;\n  box-sizing: border-box;\n  padding: 0.32rem 0.43rem;\n  text-align: center;\n}\n.answer-popup h5 {\n    font-size: 0.32rem;\n    color: #333;\n    line-height: 0.32rem;\n    margin-bottom: 0.54rem;\n}\n.answer-popup input {\n    display: block;\n    height: 0.92rem;\n    line-height: 0.92rem;\n    border-radius: 4px;\n    text-align: center;\n    width: 100%;\n    margin-bottom: 0.82rem;\n    background-color: #f0f0f0;\n    font-size: 0.3rem;\n    color: #666;\n}\n.answer-popup button {\n    display: block;\n    width: 100%;\n    height: 0.9rem;\n    font-size: 0.36rem;\n    color: #fff;\n    border: none;\n    background-color: #5f86fc;\n    border-radius: 4px;\n}\n.answer-popup button:disabled {\n    opacity: 0.5;\n}\n.answer-popup a.close-btn {\n    position: absolute;\n    width: 0.42rem;\n    height: 0.42rem;\n    top: 0.12rem;\n    right: 0.12rem;\n    background: url(\"/images/sprites.png\") no-repeat -2.21rem 0/7.5rem auto;\n}\n.answer-comment {\n  width: 6.3rem;\n  border-radius: 4px;\n  box-sizing: border-box;\n  height: auto;\n  overflow: hidden;\n}\n.answer-comment .answer-comment-box {\n    padding: 0.24rem;\n}\n.answer-comment textarea {\n    resize: none;\n    background-color: #fbf7f7;\n    border-radius: 4px;\n    width: 100%;\n    box-sizing: border-box;\n    font-size: 0.3rem;\n    color: #666;\n    height: 3.02rem;\n    padding: 0.26rem 0.28rem;\n    margin-bottom: 0.3rem;\n}\n.answer-comment label {\n    margin-bottom: 0.36rem;\n    display: block;\n}\n.answer-comment label span {\n      border: 1px solid #bbbbbb;\n      display: block;\n      width: 0.36rem;\n      height: 0.36rem;\n      box-sizing: border-box;\n      border-radius: 0.36rem;\n      margin-right: 0.16rem;\n}\n.answer-comment label input[type=\"checkbox\"] {\n      display: none;\n}\n.answer-comment label div {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n}\n.answer-comment label input:checked + div span {\n      border: none;\n      background-color: #bb7676;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n      -webkit-box-pack: center;\n      -webkit-justify-content: center;\n          -ms-flex-pack: center;\n              justify-content: center;\n}\n.answer-comment label input:checked + div span:before {\n        content: \"\";\n        width: 0.28rem;\n        height: 0.2rem;\n        display: block;\n        background: url(\"/images/sprites.png\") no-repeat 0 -4.32rem/7.5rem auto;\n}\n.answer-comment label input:checked + div p {\n      color: #666;\n}\n.answer-comment label p {\n      font-size: 0.32rem;\n      color: #999;\n}\n.answer-comment .btns {\n    background: #c62f2f;\n    height: auto;\n    overflow: hidden;\n    padding: 0.2rem;\n}\n.answer-comment .btns a {\n      padding: 0;\n      width: 49%;\n      height: 0.8rem;\n      line-height: 0.8rem;\n      text-align: center;\n      display: block;\n      font-size: 0.36rem;\n      border: none;\n      float: left;\n}\n.answer-comment .btns a:first-child {\n      border-right: 1px solid #e8e8e8;\n}\n.answer-comment .btns .cancel-btn {\n      color: #fff;\n      background-color: transparent;\n}\n.answer-comment .btns .confirm-btn {\n      color: #fff;\n      background-color: #c62f2f;\n}\n.mint-toast {\n  z-index: 9999;\n}\n.qcontainer {\n  position: relative;\n}\n.qcontainer #save_button {\n    position: absolute;\n    top: 0;\n    left: 0;\n}\n.qcontainer .recordingSave span {\n    display: block;\n    height: 100%;\n    line-height: 116px;\n}\n.qcontainer .save_bg {\n    width: 136px;\n    height: 100%;\n    display: block;\n    position: absolute;\n    top: 0;\n    left: 0;\n}\n.video {\n  position: relative;\n  z-index: 111;\n  width: 100%;\n  height: 4.2rem;\n}\n.video img {\n    width: 100%;\n    max-height: 100%;\n    vertical-align: middle;\n    display: inline-block;\n}\n.video .tip {\n    position: absolute;\n    right: 0.24rem;\n    bottom: 0.24rem;\n    color: #fff;\n    z-index: 111;\n    font-size: 0.24rem;\n    display: inline-block;\n    padding: 0.08rem 0.1rem;\n    background: rgba(0, 0, 0, 0.4);\n}\n.video .tip.tipshow {\n      top: 0;\n      width: 100%;\n      height: 0.5rem;\n      line-height: 0.5rem;\n      padding: 0 0.24rem;\n      left: 0;\n}\n.video .tip.tipshow:before {\n        content: \"\";\n        width: 0;\n}\n.video .tip:before {\n      content: \"\";\n      display: inline-block;\n      margin-right: 0.1rem;\n      width: 0.16rem;\n      height: 0.16rem;\n      border-radius: 50%;\n      background-color: #c62f2f;\n}\n.video .videoDom {\n    position: absolute;\n    z-index: 0;\n    left: 0;\n    top: 0px;\n    width: 100%;\n    display: block;\n}\n.video .videoDom object {\n      height: 100%;\n      display: block;\n}\n.video .live-lock {\n    position: absolute;\n    right: 10px;\n    top: 10px;\n    width: 24px;\n    height: 24px;\n    z-index: 999;\n}\n.tips {\n  height: 0.6rem;\n  line-height: 0.6rem;\n  text-align: center;\n  color: #b2b2b2;\n}\n.tips span {\n    display: inline-block;\n    font-size: 0.26rem;\n}\n.s-mb {\n  margin-bottom: 0.6rem;\n}\n@-webkit-keyframes commentRoom {\n0% {\n    opacity: 1;\n    display: block;\n}\n90% {\n    opacity: 0.6;\n}\n100% {\n    opacity: 0;\n    display: none;\n}\n}\n@keyframes commentRoom {\n0% {\n    opacity: 1;\n    display: block;\n}\n90% {\n    opacity: 0.6;\n}\n100% {\n    opacity: 0;\n    display: none;\n}\n}\n._v-content {\n  position: absolute;\n}\n.concentrate {\n  color: #888;\n}\n.concentrate span {\n    background: #888;\n    border: 0.08rem solid #f5f7f8;\n    box-shadow: 0 0 0 1px #888888;\n}\n.concentrateActive {\n  color: #c62f2f;\n}\n.concentrateActive span {\n    background: #c62f2f;\n    border: 0.08rem solid #f5f7f8;\n    box-shadow: 0 0 0 1px #c62f2f;\n}\n.concentrateBox {\n  background-color: #f5f7f8;\n  height: 0.8rem;\n  line-height: 0.8rem;\n  font-size: 0.32rem;\n  padding: 0px 0.24rem;\n  width: 1.12rem;\n  font-size: 0.28rem;\n  border-left: 1px solid #e8e8e8;\n}\n.concentrateBox span {\n    margin-top: 0.24rem;\n    margin-right: 0.16rem;\n    width: 0.2rem;\n    height: 0.2rem;\n    border-radius: 50%;\n    float: left;\n}\n.is-placemiddle {\n  width: 2.5rem;\n}\n.is-placemiddle .icon-success {\n    background: url(\"/images/live/icon-success.png\") center no-repeat;\n    width: 1rem;\n    height: 1rem;\n    background-size: 100%;\n    margin: 0 auto;\n}\n.mint-switch-core:after {\n  opacity: 0.5;\n}\n.mint-switch-core {\n  width: 82px;\n}\n.mint-switch-core:before {\n  width: 80px;\n}\n.mint-switch-core:before {\n  background: #fbb299;\n}\n#videoPlayer,\n#videoPlayer1 {\n  height: 4.2rem;\n  z-index: 111;\n}\nvideo {\n  background-color: transparent !important;\n  width: 0px;\n}\n.reward-msg,\n.redpacket-msg {\n  text-align: left;\n  position: relative;\n  height: 0.54rem;\n  width: auto;\n}\n.reward-msg p,\n  .redpacket-msg p {\n    position: absolute;\n    top: 0;\n    padding: 0 0.2rem;\n    white-space: nowrap;\n    font-size: 0.24rem;\n    color: #fff;\n    height: 0.52rem;\n    display: -webkit-box;\n    display: -webkit-flex;\n    display: -ms-flexbox;\n    display: flex;\n    -webkit-box-align: center;\n    -webkit-align-items: center;\n        -ms-flex-align: center;\n            align-items: center;\n    -webkit-box-pack: center;\n    -webkit-justify-content: center;\n        -ms-flex-pack: center;\n            justify-content: center;\n    background-color: #fadf4b;\n    border-radius: 50px;\n}\n.reward-msg p .icon,\n    .redpacket-msg p .icon {\n      display: inline-block;\n      width: 0.3rem;\n      height: 0.32rem;\n      background: url(\"/images/3.0/icon-01.png\") no-repeat;\n      background-size: cover;\n      margin-right: 0.12rem;\n}\n.reward-msg p .money,\n    .redpacket-msg p .money {\n      color: #c62f2f;\n      margin-right: 0.1rem;\n}\n", ""]);

// exports


/***/ })

});