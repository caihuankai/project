webpackJsonp([6],{

/***/ 1105:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1265)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(941),
  /* template */
  __webpack_require__(1155),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\subcomponents\\onlive\\pptEdit.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] pptEdit.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-3622cfd8", Component.options)
  } else {
    hotAPI.reload("data-v-3622cfd8", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 1106:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(942),
  /* template */
  __webpack_require__(1197),
  /* styles */
  null,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\subcomponents\\onlive\\vue-pattern-input.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] vue-pattern-input.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-7b1d6200", Component.options)
  } else {
    hotAPI.reload("data-v-7b1d6200", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 1114:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('main', {
    staticClass: "onlive-main"
  }, [(_vm.loginS == false) ? _c('loading') : _c('div', {
    staticClass: "onlivepage"
  }, [_c('div', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.swipeShow),
      expression: "swipeShow"
    }],
    staticClass: "swipe"
  }, [(_vm.load3017 == false) ? [_c('div', {
    staticClass: "notimage"
  }, [_c('mt-spinner', {
    attrs: {
      "size": 20,
      "type": "fading-circle"
    }
  })], 1)] : _vm._e(), _vm._v(" "), (_vm.banner.length == 0 && _vm.userId == _vm.onliveData.uid && _vm.load3017 == true) ? [_c('div', {
    staticClass: "noimage"
  })] : _vm._e(), _vm._v(" "), (_vm.banner.length == 0 && _vm.userId != _vm.onliveData.uid && _vm.load3017 == true) ? [_c('div', {
    staticClass: "notimage"
  }, [_vm._v("当前暂无课件")])] : _vm._e(), _vm._v(" "), [_c('swiper', {
    ref: "Swiper",
    attrs: {
      "options": _vm.swiperOption
    }
  }, [_vm._l((_vm.banner), function(item) {
    return _c('swiper-slide', {
      key: item.picId,
      attrs: {
        "data-key": item.picId
      }
    }, [_c('a', {
      style: ({
        'background-image': ("url('" + (item.picurl) + "')")
      }),
      attrs: {
        "href": "javascript:;"
      },
      on: {
        "click": function($event) {
          _vm.imgBig(item.picurl)
        }
      }
    })])
  }), _vm._v(" "), _c('div', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.banner.length != 0),
      expression: "banner.length != 0 "
    }],
    staticClass: "swiper-pagination",
    slot: "pagination"
  })], 2)]], 2), _vm._v(" "), _c('div', {
    ref: "topHeader",
    staticClass: "top-header"
  }, [_c('router-link', {
    ref: "header",
    staticClass: "header flex",
    attrs: {
      "to": ("/live/" + (_vm.onliveData.uid) + "&" + _vm.userId)
    }
  }, [_c('span', {
    staticClass: "head-add",
    style: ({
      'background-image': 'url(' + _vm.onliveData.head_add + ')'
    })
  }), _vm._v(" "), _c('div', {
    staticClass: "box"
  }, [_c('div', {
    staticClass: "head-title flex"
  }, [_c('div', {
    staticClass: "author"
  }, [_c('span', {
    staticClass: "name text-ell"
  }, [_vm._v(_vm._s(_vm.onliveData.alias))])])]), _vm._v(" "), _c('div', {
    staticClass: "nums"
  }, [_c('span', {
    staticClass: "like-num"
  }, [_vm._v(_vm._s(_vm.onliveData.focus_num || 0))])])])]), _vm._v(" "), _c('a', {
    staticClass: "toggle-btn",
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": _vm.swipeToggle
    }
  }, [_vm._v(_vm._s(_vm.swipeText))]), _vm._v(" "), _c('router-link', {
    staticClass: "go-invite-card",
    attrs: {
      "to": '/invitecard/' + _vm.onliveData.live_id + '/' + _vm.$route.params.courseId + '/1'
    }
  }, [_vm._v("邀请\n            ")]), _vm._v(" "), (!_vm.isOfficials) ? [(_vm.isShowGify) ? _c('gift', {
    attrs: {
      "liveData": _vm.liveData,
      "PayType": _vm.PayType,
      "isLink": _vm.isLink
    }
  }) : _vm._e()] : _vm._e()], 2), _vm._v(" "), _c('div', {
    ref: "body",
    staticClass: "onlivepage-container",
    class: {
      's-mb': _vm.msgs.length < 5
    },
    style: ({
      overflow: _vm.showCommentRoom ? 'hidden' : 'auto'
    })
  }, [_c('scroller', {
    ref: "myscroller",
    staticClass: "main",
    attrs: {
      "on-refresh": _vm.loadTop,
      "on-infinite": _vm.loadMore,
      "refresh-text": "下拉加载已读消息",
      "no-data-text": " "
    }
  }, [_vm._l((_vm.msgs), function(item) {
    return _c('msg', {
      key: item.host,
      ref: "msg",
      refInFor: true,
      attrs: {
        "userType": item.userType,
        "type": item.type,
        "host": item.host,
        "name": item.name,
        "avatar": item.avatar,
        "content": item.content,
        "msgId": item.msgId,
        "teacherId": item.teacherId,
        "extendType": item.extendType || 0,
        "time": item.time,
        "noconnectText": _vm.noconnectText,
        "local": item.local || false,
        "duration": item.duration || 0,
        "nowPlayLocalId": _vm.nowPlayLocalId,
        "idType": item.idType,
        "ppt": true,
        "picmediaid": item.picmediaid,
        "isAssistant": _vm.onliveData.isAssistant,
        "userhost": _vm.hostId == _vm.userId ? 1 : 0,
        "unReadMsgId": _vm.unReadMsgId,
        "liveStatusEnd": _vm.liveStatusEnd,
        "getEmojiData": _vm.getEmojiData
      },
      on: {
        "setNowPlayLocalId": _vm.setNowPlayLocalId,
        "rewardClick": _vm.rewardClick,
        "takePacket": _vm.answerRedPacketFun,
        "bindPic": _vm.bindPic,
        "showMsgMask": _vm.showMsgMask
      }
    })
  }), _vm._v(" "), _c('div', {
    staticClass: "msg-mask",
    class: {
      show: _vm.isShowMsgMask
    },
    on: {
      "click": _vm.cancelMsgMask
    }
  }), _vm._v(" "), (_vm.msgs.length >= 5) ? _c('section', {
    staticClass: "tips"
  }, [_c('span', [_vm._v("以上观点仅供参考，不构成投资建议")])]) : _vm._e(), _vm._v(" "), (_vm.liveStatusEnd) ? _c('div', {
    staticClass: "end-info"
  }, [_c('router-link', {
    attrs: {
      "to": ("/personalSpace/lobbyPage/" + (_vm.onliveData.uid) + "/" + _vm.userId)
    }
  }, [_vm._v("\n                        直播已经结束，\n                        "), _c('span', [_vm._v("点击关注直播间留意最新直播")])])], 1) : _vm._e()], 2)], 1), _vm._v(" "), _c('mt-popup', {
    staticClass: "comment-room",
    attrs: {
      "position": "bottom"
    },
    model: {
      value: (_vm.showCommentRoom),
      callback: function($$v) {
        _vm.showCommentRoom = $$v
      },
      expression: "showCommentRoom"
    }
  }, [_c('div', {
    staticClass: "top"
  }, [_c('div', {
    staticClass: "back-btn",
    on: {
      "click": function($event) {
        _vm.showCommentRoom = false
      }
    }
  }, [_vm._v("回到直播")])]), _vm._v(" "), _c('div', {
    staticClass: "comment-list"
  }, [_c('div', {
    staticClass: "comment-title",
    class: {
      left: _vm.chatroomOptions == 1, right: _vm.chatroomOptions == 2
    }
  }, [_c('label', {
    attrs: {
      "for": "chatroom-btn"
    }
  }, [_c('input', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.chatroomOptions),
      expression: "chatroomOptions"
    }],
    attrs: {
      "type": "radio",
      "name": "chatroomtype",
      "value": "1",
      "id": "chatroom-btn"
    },
    domProps: {
      "checked": _vm.chatroomOptions == 1,
      "checked": _vm._q(_vm.chatroomOptions, "1")
    },
    on: {
      "__c": function($event) {
        _vm.chatroomOptions = "1"
      }
    }
  }), _vm._v(" "), _c('p', [_vm._v("聊天室")])]), _vm._v(" "), _c('label', {
    attrs: {
      "for": "rank-form-btn"
    }
  }, [_c('input', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.chatroomOptions),
      expression: "chatroomOptions"
    }],
    attrs: {
      "type": "radio",
      "name": "chatroomtype",
      "value": "2",
      "id": "rank-form-btn"
    },
    domProps: {
      "checked": _vm.chatroomOptions == 2,
      "checked": _vm._q(_vm.chatroomOptions, "2")
    },
    on: {
      "__c": function($event) {
        _vm.chatroomOptions = "2"
      }
    }
  }), _vm._v(" "), _c('p', [_vm._v("赠送排行榜")])])]), _vm._v(" "), _c('div', {
    directives: [{
      name: "infinite-scroll",
      rawName: "v-infinite-scroll",
      value: (_vm.commentLoadMore),
      expression: "commentLoadMore"
    }, {
      name: "show",
      rawName: "v-show",
      value: (_vm.chatroomOptions == 1),
      expression: "chatroomOptions==1"
    }],
    staticClass: "boxs",
    attrs: {
      "infinite-scroll-disabled": _vm.commentLoading,
      "infinite-scroll-distance": 30
    }
  }, [_vm._l((_vm.comments), function(item) {
    return _c('div', {
      key: item.time,
      staticClass: "box",
      class: {
        'answer-comment-item': item.mastermsgId != undefined
      }
    }, [_c('section', [_c('div', {
      staticClass: "left"
    }, [_c('img', {
      attrs: {
        "src": item.avatar,
        "alt": ""
      },
      on: {
        "error": function($event) {
          _vm.errorLoadImg(item)
        }
      }
    })]), _vm._v(" "), _c('div', {
      staticClass: "right"
    }, [_c('div', {
      staticClass: "top"
    }, [_c('h5', [_c('i', [_vm._v(_vm._s(item.name))]), _vm._v(" "), _c('span', {
      class: {
        host: item.type == 0, guest: item.type == 1, ass: item.isAssistant == 1
      }
    }), _vm._v("\n                                        " + _vm._s(item.mastermsgId != undefined ? (item.isAssistant ? ' 回复' : '回复') : '') + "\n                                    ")]), _vm._v(" "), _c('p', [_vm._v("\n                                        " + _vm._s(item.time) + "\n                                        "), ((_vm.userId == _vm.hostId || _vm.onliveData.isAssistant == 1) && item.mastermsgId == undefined) ? _c('a', {
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
    }, [_vm._v("删除")]), _vm._v(" "), (item.isAssistant != 1) ? _c('a', {
      attrs: {
        "href": "javascript:;"
      },
      on: {
        "click": function($event) {
          _vm.forbidComment(item.userId)
        }
      }
    }, [_vm._v("禁言")]) : _vm._e(), _vm._v(" "), _c('a', {
      attrs: {
        "href": "javascript:;"
      },
      on: {
        "click": function($event) {
          _vm.answerCommentFun(item)
        }
      }
    }, [_vm._v("回复")])])]) : _vm._e()])]), _vm._v(" "), _c('div', {
      staticClass: "bottom"
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
    })] : [_c('p', [_vm._v(_vm._s(item.content))])]], 2)])])])
  }), _vm._v(" "), _c('div', {
    ref: "mask",
    staticClass: "menu-mask",
    on: {
      "click": function($event) {
        $event.stopPropagation();
        _vm.cancalCommentMenu($event)
      }
    }
  })], 2), _vm._v(" "), _c('div', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.chatroomOptions == 2),
      expression: "chatroomOptions==2"
    }, {
      name: "infinite-scroll",
      rawName: "v-infinite-scroll",
      value: (_vm.rewardLoadMore),
      expression: "rewardLoadMore"
    }],
    staticClass: "rank-box",
    attrs: {
      "infinite-scroll-disabled": _vm.rewardLoading,
      "infinite-scroll-distance": 1050
    }
  }, [_c('header'), _vm._v(" "), _c('ul', {
    staticClass: "rank-list"
  }, _vm._l((_vm.rewardList), function(item, index) {
    return _c('li', [_c('span', {
      class: {
        'top-1': index == 0, 'top-2': index == 1, 'top-3': index == 2
      }
    }, [_vm._v(_vm._s(index > 2 ? index + 1 : ''))]), _vm._v(" "), _c('img', {
      attrs: {
        "src": item.head_add,
        "alt": ""
      }
    }), _vm._v(" "), _c('i', [_vm._v(_vm._s(item.alias.length > 7 ? item.alias.substr(0, 6) + '...' : item.alias))]), _vm._v(" "), _c('p', {
      class: {
        'top': index < 3
      }
    }, [_vm._v(_vm._s(item.total) + "礼点")])])
  })), _vm._v(" "), (_vm.rewardList.length == 0) ? _c('p', {
    staticClass: "norank"
  }, [_vm._v("暂无赠送排行")]) : _vm._e()])]), _vm._v(" "), _c('div', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.chatroomOptions == 1),
      expression: "chatroomOptions==1"
    }],
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
      "placeholder": "发表评论"
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
      "placeholder": "发表评论"
    },
    domProps: {
      "value": (_vm.commentText)
    },
    on: {
      "keyup": function($event) {
        if (!('button' in $event) && _vm._k($event.keyCode, "enter", 13)) { return null; }
        _vm.sendComment($event)
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
    staticClass: "expression"
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
    staticClass: "keyboard"
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
      blue: _vm.commentText.trim() != ''
    },
    attrs: {
      "type": "button",
      "value": "发送"
    },
    on: {
      "click": _vm.sendComment
    }
  })]), _vm._v(" "), _c('emoji', {
    attrs: {
      "isEmojiBox": _vm.isEmojiBox,
      "userId": _vm.userId,
      "liveId": _vm.courseId,
      "type": 1
    },
    on: {
      "EmojiData": _vm.getEmoji
    }
  })], 1), _vm._v(" "), _c('div', {
    staticClass: "mask",
    attrs: {
      "hidden": !_vm.showForbiddenMode
    },
    on: {
      "click": function($event) {
        _vm.showForbiddenMode = false
      }
    }
  }), _vm._v(" "), _c('div', {
    staticClass: "forbidden-mode",
    class: {
      active: _vm.showForbiddenMode
    }
  }, [_c('div', {
    staticClass: "content"
  }, [_c('h5', [_vm._v("禁言")]), _vm._v(" "), _c('p', [_vm._v("开启后，粉丝将不可发言")]), _vm._v(" "), _c('div', {
    staticClass: "mtSwitch"
  }, [_c('mt-switch', {
    on: {
      "change": _vm.change
    },
    model: {
      value: (_vm.forbiddenMode),
      callback: function($$v) {
        _vm.forbiddenMode = $$v
      },
      expression: "forbiddenMode"
    }
  }), _vm._v(" "), (_vm.forbiddenMode) ? _c('span', {
    staticClass: "on"
  }, [_vm._v("关")]) : _c('span', {
    staticClass: "off"
  }, [_vm._v("开")])], 1)]), _vm._v(" "), _c('button', {
    on: {
      "click": function($event) {
        _vm.showForbiddenMode = false
      }
    }
  }, [_vm._v("确定")])]), _vm._v(" "), _c('div', {
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
  }, [_vm._v("我要结束")])])]), _vm._v(" "), _c('div', {
    staticClass: "mask",
    attrs: {
      "hidden": !_vm.showCloseOnLiveMode
    },
    on: {
      "click": function($event) {
        _vm.showCloseOnLiveMode = false
      }
    }
  }), _vm._v(" "), _c('div', {
    staticClass: "forbidden-mode closeOnLive-mode",
    class: {
      active: _vm.showCloseOnLiveMode
    }
  }, [_c('div', {
    staticClass: "content"
  }, [_c('h5', [_vm._v("当前直播间权限")]), _vm._v(" "), _c('p', [_vm._v("关闭后，老师在当前直播间不可进行任何操作")]), _vm._v(" "), _c('div', {
    staticClass: "mtSwitch"
  }, [_c('mt-switch', {
    on: {
      "change": _vm.closeOnLivechange
    },
    model: {
      value: (_vm.closeOnLiveMode),
      callback: function($$v) {
        _vm.closeOnLiveMode = $$v
      },
      expression: "closeOnLiveMode"
    }
  }), _vm._v(" "), (_vm.forbiddenMode) ? _c('span', {
    staticClass: "on"
  }, [_vm._v("关")]) : _c('span', {
    staticClass: "off"
  }, [_vm._v("开")])], 1)]), _vm._v(" "), _c('button', {
    on: {
      "click": function($event) {
        _vm.showCloseOnLiveMode = false
      }
    }
  }, [_vm._v("确定")])]), _vm._v(" "), _c('mt-popup', {
    staticClass: "drop-record",
    attrs: {
      "popup-transition": "popup-fade"
    },
    model: {
      value: (_vm.dropRecord),
      callback: function($$v) {
        _vm.dropRecord = $$v
      },
      expression: "dropRecord"
    }
  }, [_c('div', {
    staticClass: "msgbox"
  }, [_c('div', {
    staticClass: "msgcontent"
  }, [_c('p', [_vm._v("是否取消当前录音？")])]), _vm._v(" "), _c('div', {
    staticClass: "msgbtns"
  }, [_c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": function($event) {
        _vm.dropRecord = false
      }
    }
  }, [_vm._v("否")]), _vm._v(" "), _c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": _vm.dropRecording
    }
  }, [_vm._v("是")])])])]), _vm._v(" "), (!_vm.isOfficials) ? [_c('div', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (!_vm.showCommentRoom),
      expression: "!showCommentRoom"
    }],
    ref: "tabber",
    staticClass: "bottom-tabber"
  }, [_c('a', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (!_vm.showCommentSW),
      expression: "!showCommentSW"
    }],
    staticClass: "mini-comment",
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": function($event) {
        _vm.showCommentRoomClick(1)
      }
    }
  }, [_c('div', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.showMini),
      expression: "showMini"
    }],
    staticClass: "list",
    attrs: {
      "id": "mini-comment-list"
    }
  }, [(_vm.comments.length >= 3) ? _vm._l((3), function(i) {
    return _c('div', {
      key: i,
      staticClass: "item"
    }, [_c('section', [(_vm.comments[i - 1].content.indexOf('[-') >= 0) ? [_vm._l((_vm.getEmojiData), function(data, index) {
      return [(_vm.comments[i - 1].content.indexOf(data.expression_number) >= 0) ? [_c('p', [_vm._v("[" + _vm._s(_vm.$limit(data.name, 9)) + "]")])] : _vm._e()]
    })] : [_c('p', [_vm._v(_vm._s(_vm._f("formatComment")((_vm.comments[i - 1] ? _vm.comments[i - 1].content : ''))))])], _vm._v(" "), _c('img', {
      staticClass: "avatar",
      attrs: {
        "width": "25",
        "height": "25",
        "src": _vm.comments[i - 1] ? _vm.comments[i - 1].avatar : '',
        "alt": ""
      }
    })], 2)])
  }) : _vm._e(), _vm._v(" "), (_vm.comments.length < 3) ? _vm._l((_vm.comments), function(item) {
    return _c('div', {
      key: item.time,
      staticClass: "item"
    }, [_c('section', [(item.content.indexOf('[-') >= 0) ? [_vm._l((_vm.getEmojiData), function(data, index) {
      return [(item.content.indexOf(data.expression_number) >= 0) ? [_c('p', [_vm._v("[" + _vm._s(_vm.$limit(data.name, 9)) + "]")])] : _vm._e()]
    })] : [_c('p', [_vm._v(_vm._s(_vm._f("formatComment")(item.content)))])], _vm._v(" "), _c('img', {
      staticClass: "avatar",
      attrs: {
        "width": "25",
        "height": "25",
        "src": item.avatar,
        "alt": ""
      }
    })], 2)])
  }) : _vm._e()], 2), _vm._v(" "), _c('div', {
    staticClass: "mini-container"
  }, [_c('div', {
    staticClass: "mini-comment-btn"
  }, [_c('div', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.showMini),
      expression: "showMini"
    }],
    staticClass: "number flex"
  }, [_c('span'), _vm._v(_vm._s(_vm.studentNum) + "人\n                        ")]), _vm._v(" "), _c('div', {
    staticClass: "toggle",
    on: {
      "click": function($event) {
        $event.stopPropagation();
        _vm.showMini = !_vm.showMini
      }
    }
  }, [_vm._v(_vm._s(_vm.showMini ? '关' : '开'))])])])]), _vm._v(" "), (_vm.msgs.length < 5) ? _c('section', {
    staticClass: "tips"
  }, [_c('span', [_vm._v("以上观点仅供参考，不构成投资建议")])]) : _vm._e(), _vm._v(" "), ((_vm.type != 2 || _vm.onliveData.isAssistant == 1) && !_vm.liveStatusEnd) ? _c('div', {
    staticClass: "nav"
  }, [_c('a', {
    staticClass: "audio-btn",
    class: {
      'active': _vm.tabberActive == 1
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
  }, [_vm._v("语音")])]), _vm._v(" "), _c('a', {
    staticClass: "text-btn",
    class: {
      'active': _vm.tabberActive == 2
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
  }, [_vm._v("文字")])]), _vm._v(" "), _c('a', {
    staticClass: "image-btn",
    class: {
      'active': _vm.tabberActive == 3
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
  }, [_vm._v("图片")]), _vm._v(" "), (!_vm.isWeiXin) ? _c('input', {
    attrs: {
      "type": "file",
      "accept": "image/gif,image/jpeg,image/jpg,image/png,image/svg"
    },
    on: {
      "change": _vm.pcSendPic
    }
  }) : _vm._e()]), _vm._v(" "), (_vm.hostId == _vm.userId) ? _c('a', {
    staticClass: "ppt-btn",
    class: {
      'active': _vm.showedit == true
    },
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": function($event) {
        _vm.tabberClick(5)
      }
    }
  }, [_c('span', {
    staticClass: "sprite"
  }, [_vm._v("课件")])]) : _vm._e(), _vm._v(" "), (_vm.type != 2 || _vm.onliveData.isAssistant == 1) ? _c('a', {
    staticClass: "operate-btn",
    class: {
      'active': _vm.tabberActive == 4
    },
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": function($event) {
        _vm.tabberClick(4)
      }
    }
  }, [_c('span', {
    staticClass: "sprite"
  }, [_vm._v("操作")])]) : _vm._e()]) : _vm._e(), _vm._v(" "), ((_vm.type != 2 || _vm.onliveData.isAssistant == 1) && !_vm.liveStatusEnd) ? _c('div', {
    staticClass: "content"
  }, [_c('div', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.tabberActive != 0),
      expression: "tabberActive!=0"
    }],
    staticClass: "content-mask",
    on: {
      "click": _vm.cancelMask
    }
  }), _vm._v(" "), _c('div', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.tabberActive == 1),
      expression: "tabberActive==1"
    }],
    staticClass: "audio-content"
  }, [_c('h5', [_vm._v("录制语音"), _c('span', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.isRecording == 0),
      expression: "isRecording==0"
    }],
    staticClass: "cancle-audio",
    on: {
      "click": function($event) {
        _vm.tabberClick(1)
      }
    }
  })]), _vm._v(" "), _c('div', {
    staticClass: "audio-box"
  }, [((_vm.onliveData.isAssistant == 1 || _vm.type == 0) && !_vm.liveStatusEnd) ? _c('div', {
    staticClass: "concentrateBox",
    class: {
      'concentrate': _vm.isConcentrate == 0, 'concentrateActive': _vm.isConcentrate == 1
    },
    on: {
      "click": _vm.concentrate
    }
  }, [_c('span', [_c('i')]), _vm._v(" 重点\n                        ")]) : _vm._e(), _vm._v(" "), _c('p', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.isRecording == 0),
      expression: "isRecording==0"
    }]
  }, [_vm._v("点击一下录音")]), _vm._v(" "), _c('p', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.isRecording != 0),
      expression: "isRecording!=0"
    }]
  }, [_vm._v(_vm._s(_vm.recordingDuration) + "S/59S")]), _vm._v(" "), _c('div', {
    staticClass: "btn",
    class: {
      active: _vm.isRecording != 0
    },
    on: {
      "click": _vm.recording
    }
  }, [(_vm.isRecording == 0) ? void 0 : (_vm.isRecording == 1) ? [_c('span', {
    staticClass: "pause-icon"
  })] : [_vm._v("点击发送")]], 2), _vm._v(" "), _c('a', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.isRecording != 0),
      expression: "isRecording!=0"
    }],
    staticClass: "cancel-btn",
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": _vm.cancelRecord
    }
  }, [_vm._v("重录")])])]), _vm._v(" "), _c('div', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.tabberActive == 2),
      expression: "tabberActive==2"
    }],
    staticClass: "text-content"
  }, [(_vm.isWeiXin && _vm.isMobile) ? _c('textarea', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.text),
      expression: "text"
    }],
    staticClass: "text-input",
    class: {
      blue: _vm.text.trim() == '', 'line-1': _vm.text.length <= 16, 'line-2': _vm.text.length > 16 && _vm.text.length <= 32, 'line-3': _vm.text.length > 32 && _vm.text.length <= 48, 'line-4': _vm.text.length > 48 && _vm.text.length <= 64, 'line-5': _vm.text.length > 64
    },
    attrs: {
      "type": "text",
      "placeholder": "发送文字"
    },
    domProps: {
      "value": (_vm.text)
    },
    on: {
      "focus": _vm.focusSendText,
      "input": function($event) {
        if ($event.target.composing) { return; }
        _vm.text = $event.target.value
      }
    }
  }) : _c('textarea', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.text),
      expression: "text"
    }],
    staticClass: "text-input ",
    class: {
      'blue': _vm.text.trim() == '', 'pc-textarea': _vm.text.length > 30
    },
    attrs: {
      "placeholder": "发送文字"
    },
    domProps: {
      "value": (_vm.text)
    },
    on: {
      "keyup": function($event) {
        if (!('button' in $event) && _vm._k($event.keyCode, "enter", 13)) { return null; }
        _vm.sendText($event)
      },
      "input": function($event) {
        if ($event.target.composing) { return; }
        _vm.text = $event.target.value
      }
    }
  }), _vm._v(" "), ((_vm.type == 0 || _vm.onliveData.isAssistant == 1) && !_vm.liveStatusEnd) ? _c('div', {
    staticClass: "concentrateBox",
    class: {
      'concentrate': _vm.isConcentrate == 0, 'concentrateActive': _vm.isConcentrate == 1
    },
    on: {
      "click": _vm.concentrate
    }
  }, [_c('span', [_c('i')]), _vm._v("\n                        重点\n                    ")]) : _vm._e(), _vm._v(" "), _c('div', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.isEm == true),
      expression: "isEm==true"
    }],
    staticClass: "expression"
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
    staticClass: "keyboard"
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
      blue: _vm.text.trim() != ''
    },
    attrs: {
      "type": "button",
      "value": "发送"
    },
    on: {
      "click": _vm.sendText
    }
  })]), _vm._v(" "), (_vm.type != 2 || _vm.onliveData.isAssistant == 1) ? _c('div', {
    staticClass: "operate-content",
    class: {
      'operate-content-mini': _vm.type == 1
    }
  }, [_c('mt-popup', {
    attrs: {
      "position": "bottom"
    },
    model: {
      value: (_vm.popupVisible),
      callback: function($$v) {
        _vm.popupVisible = $$v
      },
      expression: "popupVisible"
    }
  }, [(_vm.type != 1) ? [_c('router-link', {
    attrs: {
      "to": '/invitecard/' + _vm.onliveData.live_id + '/' + _vm.$route.params.courseId + '/3'
    }
  }, [_c('span'), _vm._v(" "), _c('p', [_vm._v("邀请讲师")])]), _vm._v(" "), _c('router-link', {
    attrs: {
      "to": '/invitecard/' + _vm.onliveData.live_id + '/' + _vm.$route.params.courseId + '/1'
    }
  }, [_c('span'), _vm._v(" "), _c('p', [_vm._v("邀请粉丝")])]), _vm._v(" "), _c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": function($event) {
        _vm.showForbiddenMode = true
      }
    }
  }, [_c('span'), _vm._v(" "), _c('p', [_vm._v("禁言模式")])]), _vm._v(" "), _c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": function($event) {
        _vm.showFinishMode = true
      }
    }
  }, [_c('span'), _vm._v(" "), _c('p', [_vm._v("结束直播")])]), _vm._v(" "), _c('router-link', {
    attrs: {
      "to": '/onLiveSendLink/' + _vm.onliveData.uid + '/' + _vm.$route.params.courseId
    }
  }, [_c('span'), _vm._v(" "), _c('p', [_vm._v("发送链接")])])] : _vm._e(), _vm._v(" "), (_vm.userInfo.isVest == false) ? _c('router-link', {
    staticClass: "send-packet-btn",
    attrs: {
      "to": '/sendRedpacket/' + _vm.$route.params.courseId
    }
  }, [_c('span'), _vm._v(" "), _c('p', [_vm._v("礼点红包")])]) : _vm._e(), _vm._v(" "), (_vm.onliveData.isAssistant == 1) ? _c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": function($event) {
        _vm.showCloseOnLiveMode = true
      }
    }
  }, [_c('span'), _vm._v(" "), _c('p', [_vm._v("禁用该直播间")])]) : _vm._e()], 2)], 1) : _vm._e()]) : _c('div', {
    staticClass: "bottom-text",
    class: {
      'fixed': _vm.isFocus
    }
  }, [(_vm.isWeiXin) ? _c('textarea', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.commentText),
      expression: "commentText"
    }],
    staticClass: "comment-input new-comment-input",
    class: {
      blue: _vm.commentText.trim() == '', 'long-comment-input': _vm.isFocus, 'line-1': _vm.commentText.length <= 16, 'line-2': _vm.commentText.length > 16 && _vm.commentText.length <= 32, 'line-3': _vm.commentText.length > 32 && _vm.commentText.length <= 48, 'line-4': _vm.commentText.length > 48 && _vm.commentText.length <= 64, 'line-5': _vm.commentText.length > 64
    },
    attrs: {
      "type": "text",
      "placeholder": "发表评论"
    },
    domProps: {
      "value": (_vm.commentText)
    },
    on: {
      "click": function($event) {
        _vm.bindScrollFun(this)
      },
      "focus": _vm.focus,
      "blur": _vm.loseFocus,
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
    staticClass: "comment-input new-comment-input",
    class: {
      blue: _vm.commentText.trim() == '', 'long-comment-input': _vm.isFocus, 'pc-textarea': _vm.commentText.length > 30
    },
    attrs: {
      "placeholder": "发表评论"
    },
    domProps: {
      "value": (_vm.commentText)
    },
    on: {
      "click": function($event) {
        _vm.bindScrollFun(this)
      },
      "keyup": function($event) {
        if (!('button' in $event) && _vm._k($event.keyCode, "enter", 13)) { return null; }
        _vm.sendComment($event)
      },
      "focus": _vm.focus,
      "blur": _vm.loseFocus,
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
  })]), _vm._v(" "), (!_vm.isFocus) ? _c('div', {
    staticClass: "state-one"
  }, [_c('div', {
    staticClass: "tap-aid",
    on: {
      "click": _vm.getUserAid
    }
  }, [_c('div', {
    staticClass: "pic"
  })])]) : _vm._e(), _vm._v(" "), (_vm.isFocus) ? _c('div', {
    staticClass: "state-two"
  }, [_c('input', {
    class: {
      blue: _vm.commentText.trim() != ''
    },
    attrs: {
      "type": "button",
      "value": "发送"
    },
    on: {
      "click": function($event) {
        $event.stopPropagation();
        _vm.sendComment($event)
      }
    }
  })]) : _vm._e()])])] : _vm._e(), _vm._v(" "), ((_vm.type != 2 || _vm.onliveData.isAssistant == 1) && !_vm.liveStatusEnd) ? [_c('emoji', {
    attrs: {
      "isEmojiBox": _vm.isEmojiBox,
      "userId": _vm.userId,
      "liveId": _vm.courseId,
      "type": 0
    },
    on: {
      "EmojiData": _vm.getEmoji
    }
  })] : [_c('emoji', {
    attrs: {
      "isEmojiBox": _vm.isEmojiBox,
      "userId": _vm.userId,
      "liveId": _vm.courseId,
      "type": 1
    },
    on: {
      "EmojiData": _vm.getEmoji
    }
  })], _vm._v(" "), _c('mt-popup', {
    staticClass: "aid-box",
    attrs: {
      "popup-transition": "popup-fade"
    },
    model: {
      value: (_vm.aidShow),
      callback: function($$v) {
        _vm.aidShow = $$v
      },
      expression: "aidShow"
    }
  }, [_c('main', [_c('img', {
    attrs: {
      "src": _vm.aidCode,
      "alt": ""
    }
  }), _vm._v(" "), _c('h3', [_vm._v("长按添加助教")]), _vm._v(" "), _c('p', [_vm._v("可随时获得解答")])]), _vm._v(" "), _c('button', {
    staticClass: "close",
    on: {
      "click": function($event) {
        _vm.aidShow = false
      }
    }
  }, [_vm._v("关闭")])]), _vm._v(" "), _c('redpacket', {
    attrs: {
      "money": _vm.redpacketMoney
    },
    model: {
      value: (_vm.showRedPacket),
      callback: function($$v) {
        _vm.showRedPacket = $$v
      },
      expression: "showRedPacket"
    }
  }), _vm._v(" "), _c('mt-popup', {
    staticClass: "answer-popup",
    attrs: {
      "popup-transition": "popup-fade"
    },
    model: {
      value: (_vm.answerRedPacket),
      callback: function($$v) {
        _vm.answerRedPacket = $$v
      },
      expression: "answerRedPacket"
    }
  }, [_c('h5', [_vm._v("请输入红包口令")]), _vm._v(" "), _c('input', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.answerText),
      expression: "answerText"
    }],
    attrs: {
      "type": "text",
      "placeholder": "输入口令"
    },
    domProps: {
      "value": (_vm.answerText)
    },
    on: {
      "input": function($event) {
        if ($event.target.composing) { return; }
        _vm.answerText = $event.target.value
      }
    }
  }), _vm._v(" "), _c('button', {
    attrs: {
      "disabled": _vm.disabled
    },
    on: {
      "click": _vm.takeRedPacketFun
    }
  }, [_vm._v("抢红包！")]), _vm._v(" "), _c('a', {
    staticClass: "close-btn",
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": function($event) {
        _vm.answerRedPacket = false
      }
    }
  })]), _vm._v(" "), _c('mt-popup', {
    staticClass: "answer-comment",
    attrs: {
      "popup-transition": "popup-fade"
    },
    model: {
      value: (_vm.answerComment),
      callback: function($$v) {
        _vm.answerComment = $$v
      },
      expression: "answerComment"
    }
  }, [_c('div', {
    staticClass: "answer-comment-box"
  }, [_c('div', {
    staticClass: "wrapper"
  }, [_c('textarea', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.answerText),
      expression: "answerText"
    }],
    attrs: {
      "placeholder": ("回复" + (_vm.answerUserInfo.name) + ":")
    },
    domProps: {
      "value": (_vm.answerText)
    },
    on: {
      "input": function($event) {
        if ($event.target.composing) { return; }
        _vm.answerText = $event.target.value
      }
    }
  })]), _vm._v(" "), _c('label', [_c('input', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.goWall),
      expression: "goWall"
    }],
    attrs: {
      "type": "checkbox",
      "name": "wall"
    },
    domProps: {
      "checked": Array.isArray(_vm.goWall) ? _vm._i(_vm.goWall, null) > -1 : (_vm.goWall)
    },
    on: {
      "__c": function($event) {
        var $$a = _vm.goWall,
          $$el = $event.target,
          $$c = $$el.checked ? (true) : (false);
        if (Array.isArray($$a)) {
          var $$v = null,
            $$i = _vm._i($$a, $$v);
          if ($$c) {
            $$i < 0 && (_vm.goWall = $$a.concat($$v))
          } else {
            $$i > -1 && (_vm.goWall = $$a.slice(0, $$i).concat($$a.slice($$i + 1)))
          }
        } else {
          _vm.goWall = $$c
        }
      }
    }
  }), _vm._v(" "), _c('div', [_c('span'), _vm._v(" "), _c('p', [_vm._v("上墙")])])])]), _vm._v(" "), _c('div', {
    staticClass: "btns"
  }, [_c('a', {
    staticClass: "cancel-btn",
    attrs: {
      "href": " javascript:;"
    },
    on: {
      "click": function($event) {
        if (!('button' in $event) && _vm._k($event.keyCode, "top")) { return null; }
        _vm.cancelAnswerComment($event)
      }
    }
  }, [_vm._v("取消")]), _vm._v(" "), _c('a', {
    staticClass: "confirm-btn",
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": function($event) {
        if (!('button' in $event) && _vm._k($event.keyCode, "top")) { return null; }
        _vm.sendAnswerComment($event)
      }
    }
  }, [_vm._v("确定")])])]), _vm._v(" "), _c('Qrcode')], 2), _vm._v(" "), _c('pptEdit', {
    attrs: {
      "showedit": _vm.showedit
    },
    on: {
      "showeditMask": _vm.showeditMask
    }
  })], 1)
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-04383baa", module.exports)
  }
}

/***/ }),

/***/ 1155:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('main', {
    staticClass: "ppt-edit ",
    class: {
      active: _vm.showedit
    }
  }, [_c('h5', [_c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": _vm.closeBtn
    }
  }, [_vm._v("收起")]), _vm._v(" "), _c('a', {
    attrs: {
      "href": "javascript:;"
    }
  }, [_c('span', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.sortBtn == false),
      expression: "sortBtn==false"
    }],
    on: {
      "click": _vm.LoadMoreFun
    }
  }, [_vm._v("排序")]), _c('span', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.sortBtn == true),
      expression: "sortBtn==true"
    }],
    staticClass: "cancel-btn",
    on: {
      "click": _vm.cancelBtn
    }
  }, [_vm._v("取消")]), _c('span', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.sortBtn == true),
      expression: "sortBtn==true"
    }],
    on: {
      "click": _vm.setSort
    }
  }, [_vm._v("完成")])])]), _vm._v(" "), _c('div', {
    staticClass: "box"
  }, [(_vm.sortBtn == false) ? _c('p', {
    staticClass: "txt"
  }, [_vm._v("\n          上传完图片后，在主屏翻到指定图片进行录音，即可完成绑定，播放此语音时会\n          展示所绑定的图片。\n          ")]) : _c('p', {
    staticClass: "txt"
  }, [_vm._v("\n          填写图片序号，序号越大，越靠前(默认按上传顺序排)\n      ")]), _vm._v(" "), _c('section', {
    staticClass: "material"
  }, [_c('ul', {
    attrs: {
      "id": "ppt-edit"
    }
  }, _vm._l((_vm.previewImg), function(item, index) {
    return _c('li', [_c('div', {
      staticClass: "item img-box"
    }, [_c('span', [_vm._v("已发送")]), _vm._v(" "), _c('img', {
      attrs: {
        "src": item.imgUrl,
        "alt": ""
      }
    })]), _vm._v(" "), _c('div', {
      staticClass: "item box-r"
    }, [_c('pattern-input', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (_vm.sortBtn == true),
        expression: "sortBtn==true"
      }],
      attrs: {
        "maxlength": "2",
        "placeholder": "",
        "regExp": _vm.setting.regExp,
        "replacement": _vm.setting.replacement
      },
      on: {
        "input": _vm.handleInput,
        "change": _vm.handleChange
      },
      model: {
        value: (item.sort),
        callback: function($$v) {
          item.sort = $$v
        },
        expression: "item.sort"
      }
    }), _vm._v(" "), _c('span', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (_vm.sortBtn == false),
        expression: "sortBtn==false"
      }]
    }, [_vm._v(_vm._s(item.sort))]), _vm._v(" "), _c('span', {
      staticClass: "delete-btn",
      on: {
        "click": function($event) {
          _vm.deleteImgIntro(item.id, index)
        }
      }
    })], 1)])
  }))])]), _vm._v(" "), _c('footer', {
    staticClass: "submit-btn",
    on: {
      "click": _vm.uploadIntroduce
    }
  }, [_vm._v("\n        上传图片材料\n    ")])])
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-3622cfd8", module.exports)
  }
}

/***/ }),

/***/ 1197:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('input', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.val),
      expression: "val"
    }],
    ref: "input",
    staticClass: "inputP",
    attrs: {
      "type": "tel",
      "id": _vm.id
    },
    domProps: {
      "value": _vm.value,
      "value": (_vm.val)
    },
    on: {
      "input": [function($event) {
        if ($event.target.composing) { return; }
        _vm.val = $event.target.value
      }, function($event) {
        _vm.updateValue($event.target.value)
      }],
      "change": _vm.emitChange
    }
  })
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-7b1d6200", module.exports)
  }
}

/***/ }),

/***/ 1227:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(956);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("1036db50", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-04383baa\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./pptOnlive.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-04383baa\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./pptOnlive.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 1265:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(997);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("33f4460a", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-3622cfd8\",\"scoped\":false,\"hasInlineConfig\":true}!../../../node_modules/sass-loader/lib/loader.js!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./pptEdit.vue", function() {
     var newContent = require("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-3622cfd8\",\"scoped\":false,\"hasInlineConfig\":true}!../../../node_modules/sass-loader/lib/loader.js!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./pptEdit.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 489:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1227)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(914),
  /* template */
  __webpack_require__(1114),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\personalCenter\\pptOnlive.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] pptOnlive.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-04383baa", Component.options)
  } else {
    hotAPI.reload("data-v-04383baa", Component.options)
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

/***/ 520:
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

exports.default = {
    data: function data() {
        return {
            codeImg: "", //大策略二维码
            closePop: false //大策略二维码

        };
    },
    mounted: function mounted() {
        var _this = this;

        this.$store.dispatch("getUserInfo", function (res) {

            if (_this.isSubscribe == false) {
                if (_this.$route.query.shareId == 1) {
                    _this.getQrCode();
                }
            }
        });
    },

    computed: {
        isSubscribe: function isSubscribe() {
            return this.$store.state.userInfo.isSubscribe;
        }
    },
    methods: {
        /**
        * 获取公众号二维码
        * @return [type] [description]
        */
        getQrCode: function getQrCode() {
            var _this2 = this;

            this.$http.get("/Home/getQrCode").then(function (res) {
                _this2.codeImg = res.data.data;
                _this2.closePop = true;
                alert(ll);
            });
        }
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

/***/ 523:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.Qcode .liveTitleBox-comment {\n  width: 80%;\n  border-radius: 10px;\n}\n.Qcode .liveTitleBox-comment .img {\n    width: 2.8rem !important;\n    margin: 0.8rem auto 0;\n    height: 2.8rem !important;\n    background-size: 100% auto;\n}\n.Qcode .liveTitleBox-comment .buttom {\n    width: 100%;\n    background: #c62f2f;\n    height: 1rem;\n    border-radius: 0px 0px 10px 10px;\n}\n.Qcode .liveTitleBox-comment .buttom a {\n      display: block;\n      width: 100%;\n      line-height: 1rem;\n      text-align: center;\n      color: #fff;\n}\n.Qcode .liveTitleBox-comment h2 {\n    text-align: center;\n    color: #1c0808;\n    font-size: 16px;\n    font-weight: bold;\n}\n.Qcode .liveTitleBox-comment h2 {\n    font-weight: normal;\n    margin: 0.48rem 0 0.32rem;\n}\n.Qcode .liveTitleBox-comment .class-name {\n    margin: 0.3rem 0 0.3rem;\n}\n.Qcode .liveTitleBox-comment .title {\n    border-bottom: 1px solid #eec0c0;\n}\n.Qcode .liveTitleBox-comment .title input {\n      border: 0px;\n      border-shadow: 0;\n      width: 100%;\n      height: 35px;\n      text-align: center;\n      caret-color: #cd0000;\n}\n.Qcode .liveTitleBox-comment p {\n    line-height: 30px;\n    text-align: center;\n    color: #888;\n}\n", ""]);

// exports


/***/ }),

/***/ 524:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(526)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(520),
  /* template */
  __webpack_require__(525),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\subcomponents\\personalCenter\\QrCode.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] QrCode.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-14776c4c", Component.options)
  } else {
    hotAPI.reload("data-v-14776c4c", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 525:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "Qcode"
  }, [(_vm.closePop) ? _c('div', {
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
  }) : _vm._e()])
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-14776c4c", module.exports)
  }
}

/***/ }),

/***/ 526:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(523);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("03471fdc", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-14776c4c\",\"scoped\":false,\"hasInlineConfig\":true}!../../../node_modules/sass-loader/lib/loader.js!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./QrCode.vue", function() {
     var newContent = require("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-14776c4c\",\"scoped\":false,\"hasInlineConfig\":true}!../../../node_modules/sass-loader/lib/loader.js!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./QrCode.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

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

/***/ 700:
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

exports.default = {
    props: ['value', 'money'],
    data: function data() {
        return {
            showRedPacket: this.value
        };
    },

    watch: {
        value: function value(val) {
            this.showRedPacket = val;
        },
        showRedPacket: function showRedPacket(val) {
            this.$emit('input', val);
        }
    }
};

/***/ }),

/***/ 702:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.commonGift {\n  position: relative;\n}\n.right-tabber {\n  position: absolute;\n  right: .24rem;\n  bottom: -0.24rem;\n  -webkit-transform: translateY(100%);\n      -ms-transform: translateY(100%);\n          transform: translateY(100%);\n  z-index: 1;\n  display: -webkit-box;\n  display: -webkit-flex;\n  display: -ms-flexbox;\n  display: flex;\n  -webkit-box-orient: vertical;\n  -webkit-box-direction: normal;\n  -webkit-flex-direction: column;\n      -ms-flex-direction: column;\n          flex-direction: column;\n  -webkit-box-align: center;\n  -webkit-align-items: center;\n      -ms-flex-align: center;\n          align-items: center;\n  -webkit-box-pack: center;\n  -webkit-justify-content: center;\n      -ms-flex-pack: center;\n          justify-content: center;\n}\n.right-tabber p {\n    height: 1rem;\n    width: 1rem;\n    margin-bottom: 0.12rem;\n    text-align: center;\n    font-size: 0.18rem;\n    color: #c62f2f;\n    margin-bottom: 0.3rem;\n    box-sizing: border-box;\n    /*&.btn-6 {\n            span {\n                background: url(\"/images/1.9/666-ben@2x.png\") center no-repeat;\n                background-size: 0.5rem auto;\n\n            }\n        }\n        &.btn-18 {\n            span {\n                background: url(\"/images/1.9/jiangpai-ben@2x.png\") center no-repeat;\n                background-size: 0.5rem auto;\n\n            }\n        }\n        &.btn-52 {\n            span {\n                background: url(\"/images/1.9/jinniu-ben@2x.png\") center no-repeat;\n                background-size: 0.5rem auto;\n\n            }\n        }*/\n}\n.right-tabber p a {\n      width: 0.9rem;\n      height: 0.9rem;\n      display: inline-block;\n      background-color: #f2e2aa;\n      border-radius: 50%;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n      -webkit-box-pack: center;\n      -webkit-justify-content: center;\n          -ms-flex-pack: center;\n              justify-content: center;\n      margin-bottom: .05rem;\n}\n.right-tabber p a img {\n        width: 100%;\n        height: 100%;\n        border-radius: 50%;\n}\n.right-tabber p span {\n      width: 0.5rem;\n      display: inline-block;\n      border-radius: 100%;\n      height: 0.5rem;\n}\n.right-tabber p:last-child {\n      margin-bottom: 0;\n}\n.payboxs {\n  position: fixed;\n  top: 40%;\n  left: 50%;\n  z-index: 2017;\n  -webkit-transform: translate3d(-50%, -50%, 0);\n  transform: translate3d(-50%, -50%, 0);\n  background-color: #fff !important;\n  width: 80%;\n  border-radius: 3px;\n  padding: 0;\n  font-size: 0.32rem;\n  -webkit-user-select: none;\n  text-align: center;\n  -webkit-backface-visibility: hidden;\n  backface-visibility: hidden;\n  -webkit-transition: 0.2s;\n  transition: 0.2s;\n}\n.payboxs .num {\n    height: .6rem;\n    display: -webkit-box;\n    display: -webkit-flex;\n    display: -ms-flexbox;\n    display: flex;\n    -webkit-box-pack: center;\n    -webkit-justify-content: center;\n        -ms-flex-pack: center;\n            justify-content: center;\n    -webkit-box-align: center;\n    -webkit-align-items: center;\n        -ms-flex-align: center;\n            align-items: center;\n}\n.payboxs .num .add {\n      width: .59rem;\n      display: inline-block;\n      border: 1px solid #e8e8e8;\n      font-size: .4rem;\n      height: .6rem;\n      line-height: .4rem;\n      color: #c62f2f;\n      background: #ffffff;\n      border-radius: 0px 5px  5px  0px;\n      text-align: center;\n      padding: 0px;\n}\n.payboxs .num .add.reduce {\n        margin-left: .17rem;\n        border-radius: 5px 0px  0px  5px;\n}\n.payboxs .num input {\n      width: .8rem;\n      height: .6rem;\n      border-top: 1px solid #e8e8e8;\n      border-bottom: 1px solid #e8e8e8;\n      border-radius: 0;\n      box-sizing: border-box;\n      text-align: center;\n}\n.payboxs .item {\n    background: #f5f7f8;\n    padding: 0.6rem 0 0.24rem;\n}\n.payboxs .item h4 {\n      color: #c62f2f;\n      font-size: 0.28rem;\n      margin-top: 0.4rem;\n}\n.payboxs h5 {\n    font-size: 0.32rem;\n    color: #1c0808;\n    margin: 0.67rem 0 0.32rem;\n}\n.payboxs p {\n    font-size: 0.28rem;\n    color: #888;\n    margin-bottom: 0.67rem;\n}\n.payboxs p span {\n      margin-left: 0.2rem;\n}\n.payboxs .imgg {\n    display: inline-block;\n    width: 50%;\n    overflow: hidden;\n    height: 1.2rem;\n    background: url(/images/space/icon_course.png) top center no-repeat;\n    background-size: auto 100%;\n}\n.payboxs .btns {\n    background: #c62f2f;\n    height: auto;\n    overflow: hidden;\n    position: relative;\n    width: 100%;\n    padding: 0.2rem 0rem;\n    border-radius: 0 0 0.1rem 0.1rem;\n}\n.payboxs .btns a {\n      width: 49%;\n      float: left;\n      color: #fff;\n      height: 0.7rem;\n      line-height: 0.7rem;\n      text-align: center;\n      display: block;\n}\n.payboxs .btns a:first-child {\n      border-right: 1px solid #e8e8e8;\n}\n", ""]);

// exports


/***/ }),

/***/ 703:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.redpacket {\n  width: 5.57rem;\n  height: 6.96rem;\n  background: transparent;\n}\n.redpacket .bg {\n    position: absolute;\n    top: 0;\n    left: 0;\n    width: 100%;\n    height: 100%;\n}\n.redpacket .bg div {\n      position: absolute;\n      left: 50%;\n      -webkit-transform: translateX(-50%);\n          -ms-transform: translateX(-50%);\n              transform: translateX(-50%);\n}\n.redpacket .bg .background {\n      width: 5.57rem;\n      height: 6.96rem;\n      background: url(\"/images/live/material/02_bg.png\") no-repeat 0 0/100% auto;\n}\n.redpacket .bg .sun {\n      top: -1.1rem;\n      width: 6.71rem;\n      height: 6.71rem;\n      opacity: 0;\n      -webkit-transition: opacity .3s linear;\n      transition: opacity .3s linear;\n      background: url(\"/images/live/material/gold_light.png\") no-repeat 0 0/100% 100%;\n      -webkit-animation: sun 30s infinite linear alternate .5s;\n              animation: sun 30s infinite linear alternate .5s;\n}\n.redpacket .bg .gold-icon {\n      width: 5.57rem;\n      height: 1.75rem;\n      top: .78rem;\n      background: url(\"/images/live/material/gold_coin.png\") no-repeat 0 0/100% 100%;\n      -webkit-animation: goldIcon .5s linear;\n              animation: goldIcon .5s linear;\n}\n.redpacket .bg .bg-layout {\n      bottom: 0;\n      width: 5.57rem;\n      height: 4.83rem;\n      background: url(\"/images/live/material/01_bg.png\") no-repeat 0 0/100% 100%;\n}\n.redpacket .bg .fly-icon {\n      top: 2.67rem;\n      width: 6.28rem;\n      height: 4.64rem;\n      background: url(\"/images/live/material/gold_coin _fly.png\") no-repeat 0 0/100% 100%;\n      -webkit-animation: flyIcon .3s linear;\n              animation: flyIcon .3s linear;\n}\n.redpacket .content {\n    position: absolute;\n    bottom: 2.13rem;\n    left: 50%;\n    width: 100%;\n    -webkit-transform: translateX(-50%);\n        -ms-transform: translateX(-50%);\n            transform: translateX(-50%);\n    color: #ffed8b;\n    text-align: center;\n}\n.redpacket .content h6 {\n      line-height: 1em;\n      font-size: .28rem;\n      margin-bottom: 0.24rem;\n}\n.redpacket .content p {\n      line-height: 1em;\n      font-size: .6rem;\n}\n@-webkit-keyframes goldIcon {\n0% {\n    -webkit-transform: translate(-50%, 100%);\n            transform: translate(-50%, 100%);\n}\n100% {\n    -webkit-transform: translate(-50%, 0);\n            transform: translate(-50%, 0);\n}\n}\n@keyframes goldIcon {\n0% {\n    -webkit-transform: translate(-50%, 100%);\n            transform: translate(-50%, 100%);\n}\n100% {\n    -webkit-transform: translate(-50%, 0);\n            transform: translate(-50%, 0);\n}\n}\n@-webkit-keyframes sun {\n0% {\n    opacity: 1;\n    -webkit-transform: translateX(-50%) rotate(0);\n            transform: translateX(-50%) rotate(0);\n}\n100% {\n    opacity: 1;\n    -webkit-transform: translateX(-50%) rotate(360deg);\n            transform: translateX(-50%) rotate(360deg);\n}\n}\n@keyframes sun {\n0% {\n    opacity: 1;\n    -webkit-transform: translateX(-50%) rotate(0);\n            transform: translateX(-50%) rotate(0);\n}\n100% {\n    opacity: 1;\n    -webkit-transform: translateX(-50%) rotate(360deg);\n            transform: translateX(-50%) rotate(360deg);\n}\n}\n@-webkit-keyframes flyIcon {\n0% {\n    -webkit-transform: translateX(-50%) scale(0);\n            transform: translateX(-50%) scale(0);\n}\n100% {\n    -webkit-transform: translateX(-50%) scale(1);\n            transform: translateX(-50%) scale(1);\n}\n}\n@keyframes flyIcon {\n0% {\n    -webkit-transform: translateX(-50%) scale(0);\n            transform: translateX(-50%) scale(0);\n}\n100% {\n    -webkit-transform: translateX(-50%) scale(1);\n            transform: translateX(-50%) scale(1);\n}\n}\n", ""]);

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

/***/ 727:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(734)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(700),
  /* template */
  __webpack_require__(730),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\subcomponents\\live\\redpacket.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] redpacket.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-710d00f4", Component.options)
  } else {
    hotAPI.reload("data-v-710d00f4", Component.options)
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

/***/ 730:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('mt-popup', {
    staticClass: "redpacket",
    attrs: {
      "popup-transition": "popup-fade"
    },
    model: {
      value: (_vm.showRedPacket),
      callback: function($$v) {
        _vm.showRedPacket = $$v
      },
      expression: "showRedPacket"
    }
  }, [_c('div', {
    staticClass: "bg"
  }, [_c('div', {
    staticClass: "background"
  }), _vm._v(" "), _c('div', {
    staticClass: "sun"
  }), _vm._v(" "), _c('div', {
    staticClass: "gold-icon"
  }), _vm._v(" "), _c('div', {
    staticClass: "bg-layout"
  }), _vm._v(" "), _c('div', {
    staticClass: "fly-icon"
  })]), _vm._v(" "), _c('div', {
    staticClass: "content"
  }, [_c('h6', [_vm._v("恭喜你抢到")]), _vm._v(" "), _c('p', [_vm._v(_vm._s(_vm.money)), _c('br')])])])
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-710d00f4", module.exports)
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

/***/ 734:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(703);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("cae46544", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-710d00f4\",\"scoped\":false,\"hasInlineConfig\":true}!../../../node_modules/sass-loader/lib/loader.js!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./redpacket.vue", function() {
     var newContent = require("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-710d00f4\",\"scoped\":false,\"hasInlineConfig\":true}!../../../node_modules/sass-loader/lib/loader.js!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./redpacket.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 801:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function($) {

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

var _mintUi = __webpack_require__(54);

var _wxfunction = __webpack_require__(517);

var _wxfunction2 = _interopRequireDefault(_wxfunction);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

exports.default = {
    // props: ['host', 'type', 'name', 'avatar', 'content', 'time', 'noconnectText', 'local', 'duration'],//type 0是文字，1是图片，2是语音
    props: ['host', 'userType', 'type', 'name', 'avatar', 'content', 'time', 'noconnectText', 'local', 'duration', 'nowPlayLocalId', 'idType', 'msgId', "isAssistant", 'teacherId', 'ppt', "picmediaid", "userhost", "liveStatusEnd", 'extendType', 'unReadMsgId', 'isPage', 'getEmojiData'], //type 0为文本，1为图片，2为语音，4为红包，9为观点，10为课程，11为打赏记录，14为评论上墙   idType为用户身份
    data: function data() {
        return {
            audioState: 'unplay',
            audioTime: 0, //四舍五入音频时长
            audioTimeTotal: 0, //总时长
            // handle: false
            isPause: false,
            canplay: false,
            timeId: null,
            runTime: 0,
            contentObj: {},
            luckyNum: 0,
            contentApp: '', //app 图片地址
            LoadingTimes: 0, //
            isExpression: false //是否表情
        };
    },

    computed: {
        userId: function userId() {
            return this.$store.state.userInfo.user_id;
        },
        isWeiXin: function isWeiXin() {
            return this.$store.state.isWeiXin;
        }
    },
    created: function created() {
        if (this.type == 0) {
            this.isExpression = true;
            if (this.content.indexOf('[-') >= 0) {
                this.isExpression = false;
            }
        }

        //    this.audioTime = this.duration;
        if (this.type == 9 || this.type == 10 || this.type == 11) {
            this.isExpression = true;
            /*  this.contentObj = JSON.parse(this.content);
              console.log('type9Content',this.content);*/
        }
        /*
         console.log(this.content)*/
        if (this.type == 4) {
            this.isExpression = true;
            if (JSON.parse(this.content).luckyNum <= 99) {
                this.luckyNum = JSON.parse(this.content).luckyNum;
            } else {
                this.luckyNum = '99+';
            }
        }
        if (this.type == 7 || this.type == 14) {
            this.isExpression = true;
            if (_typeof(this.content) !== 'object') {
                this.contentObj = JSON.parse(this.content);
            } else {
                this.contentObj = this.content;
            }
        }
        if (this.type == 2 || this.type == 13 || this.type == 16) {
            this.isExpression = true;
            this.audioTime = this.duration;
        }
        if (this.type == 12) {
            //app图片兼容

            this.isExpression = true;

            var Obj = JSON.parse(this.content);

            this.contentApp = 'http://os700oap7.bkt.clouddn.com' + Obj.path;
            console.log(this.contentApp);
        }
    },
    mounted: function mounted() {
        var _this = this;

        console.log('liveStatusEnd');
        console.log(this.msgId);
        console.log(this.time);
        if (this.unReadMsgId >= this.msgId) {//已播放
            /*    console.log(this.msgId)
              console.log(this.unReadMsgId);*/
        } else {
            //未播放
            if (this.type == 2 || this.type == 13 || this.type == 16) {

                var $audios = $('audio');
                var dataMsgId = $audios[0].getAttribute('data-msgid');
                console.log(dataMsgId);
                console.log(this.msgId);
                if (this.msgId == dataMsgId) {
                    if (this.isPage == false) {
                        //是否加载更多
                        console.log('未播放');
                        // this.controller(this.unReadMsgId);
                    } else {
                        //$audios[0].pause();
                        this.audioState == 'unplay';
                        //this.controller(parseInt(1));
                        console.log('1111111111111111111111111111');
                        // $('.audio-controller')[0].removeClass('playVoice').addClass('pauseVoice');
                        //pauseVoice
                    }
                }
            }
        }
        if (this.$refs.img) {
            this.$refs.img.src = this.avatar || '/images/default/userDefault.png';
        }
        if (this.type == 2 || this.type == 16 || this.type == 13) {
            var $msg = $(this.$refs.msg);
            var audio = this.$refs.audio;
            var $msgPrevAll = $msg.prevAll();
            if (this.local) {
                this.audioTime = this.duration;
                this.audioTimeTotal = this.duration;
            } else {
                //连续播放语音
                $msgPrevAll.has('audio').eq(0).find('audio').on('ended', function () {
                    _this.audioState = 'to-pause';
                });
                audio.addEventListener('loadedmetadata', function () {
                    _this.audioTimeTotal = audio.duration;
                });
                // audio.addEventListener('loadeddata', () => {
                //     // alert('loadeddata')
                //     const audio = this.$refs.audio
                //     this.audioTimeTotal = audio.duration
                //     this.audioTime = Math.floor(audio.duration)
                //     // alert(audio.duration)
                //     // console.dir(this.$refs.audio)
                // })
                audio.addEventListener('canplay', function () {
                    _this.audioTimeTotal = audio.duration;
                    // this.audioTime = Math.round(audio.duration)
                    _this.canplay = true;
                });
                audio.addEventListener('canplaythrough', function () {
                    _this.audioTimeTotal = audio.duration;
                    _this.canplay = true;
                });
                audio.addEventListener('durationchange', function () {
                    _this.audioTimeTotal = audio.duration;
                });
                // audio.addEventListener('timeupdate', () => {
                //     this.rangeValue = (audio.currentTime / audio.duration) * 100
                // })
                audio.addEventListener('pause', function () {
                    if (_this.audioState != 'unplay') {
                        if (!_this.isPause) {
                            _this.audioState = 'played';
                        } else {
                            _this.isPause = false;
                        }
                    }
                });
                // audio.addEventListener('error', () => {
                //     Toast(this.noconnectText)
                //     // alert('error')
                // })
                // audio.addEventListener('abort', () => {
                //     // Toast(this.noconnectText)
                //     alert('abort')
                // })
                // audio.addEventListener('stalled', () => {
                //     // Toast(this.noconnectText)
                //     alert('stalled')
                // })
                audio.addEventListener('ended', function () {
                    _this.audioState = 'played';
                });
                // audio.muted = true
                // audio.play()
            }
        } else if (this.type == 1) {
            // this.$refs.picture.onload = () => {
            //     this.$refs.msg.scrollIntoView()
            // }
        }
    },
    beforeDestroy: function beforeDestroy() {
        if (this.$refs.audio) {
            this.$refs.audio.pause();
        }
    },

    methods: {
        extendTypeFun: function extendTypeFun(teacherId, msgId, extendType) {
            if (extendType == 0) {
                extendType = 1;
            } else {
                extendType = 0;
            }
            console.log(extendType);
            _wxfunction2.default.sendMessage(+teacherId, +this.$route.params.courseId, msgId + '', 17, extendType);
        },

        //撤回
        recall: function recall(teacherId, msgId) {
            if (this.recallStatus) {
                (0, _mintUi.Toast)({ message: '您的直播间已被禁用，不可操作', duration: 2000 });
                // alert(this.recall)
                return;
            }
            if (!msgId) {
                (0, _mintUi.Toast)({ message: '语音正在上传，请稍候', duratino: 1000 });
                return;
            }

            // console.log(this.$route.params.id.split('&')[0]);
            _wxfunction2.default.sendMessage(+teacherId, +this.$route.params.courseId, msgId + '', 8);
            var $btn = $(".recall-btn");
            $btn.css("z-index", "auto").find(".menu").removeClass("active");

            $('.menu').removeClass('active');
        },
        openMenu: function openMenu(e) {
            // if (this.recallStatus) {
            //     Toast({message: '您的直播间已被禁用，不可操作', duration: 2000});
            //     return
            // }

            if (!$(e.target).siblings('.menu').hasClass('active')) {
                $(e.target).siblings('.menu').addClass('active');
                $(e.target).parents('.msg').siblings().find('.recall-btn .menu').removeClass('active');
            } else {
                $(e.target).siblings('.menu').removeClass('active');
                $(e.target).parents('.msg').siblings().find('.recall-btn .menu').removeClass('active');
            }

            this.$emit('showMsgMask');
        },
        controller: function controller(msgId) {
            console.log(msgId);
            var $audios = $('audio');
            if (this.audioState == 'unplay' || this.audioState == 'to-play' || this.audioState == 'played') {
                this.audioState = 'to-pause';
                for (var i = 0; i < $audios.length; i++) {
                    if ($audios[i] != this.$refs.audio) {
                        $audios[i].pause();
                        $audios[i].currentTime = 0;
                    }
                }
            } else if (this.audioState == 'to-pause') {
                this.isPause = true;
                // this.picId = picId;
                // alert(picId)
                this.audioState = 'to-play';
            }
            _wxfunction2.default.NextReadMsg(this.userId, this.$route.params.courseId.split("&")[0], msgId - 1);
        },
        controller1: function controller1(picId, msgId) {
            var $audios = $('audio');
            this.picId = picId;
            if (this.audioState == 'unplay' || this.audioState == 'to-play' || this.audioState == 'played') {
                this.audioState = 'to-pause';

                for (var i = 0; i < $audios.length; i++) {
                    if ($audios[i] != this.$refs.audio) {
                        $audios[i].pause();
                        $audios[i].currentTime = 0;
                    }
                }
            } else if (this.audioState == 'to-pause') {
                this.isPause = true;
                this.picId = picId;
                // alert(picId)
                this.$emit('bindPic', this.picId);
                this.audioState = 'to-play';
            }
            _wxfunction2.default.NextReadMsg(this.userId, this.$route.params.courseId.split("&")[0], msgId - 1);
        },
        preview: function preview() {
            if (this.type == 1) {
                wx.previewImage({
                    current: this.content, // 当前显示图片的http链接
                    urls: [this.content] // 需要预览的图片http链接列表
                });
            } else if (this.type == 12) {
                wx.previewImage({
                    current: this.contentApp, // 当前显示图片的http链接
                    urls: [this.contentApp] // 需要预览的图片http链接列表
                });
            }
        },
        showReward: function showReward() {
            var res = {};
            switch (this.type) {
                case 0:
                    res.type = 1;
                    res.content = this.content;
                    res.id = 0;
                    break;
                case 1:
                    res.type = 2;
                    res.content = this.content;
                    res.id = 0;
                    break;
                case 2:
                    res.type = 3;
                    res.content = this.content;
                    res.id = 0;
                    break;
                case 16:
                    res.type = 3;
                    res.content = this.content;
                    res.id = 0;
                    break;
                case 4:
                    res.type = 6;
                    res.content = '';
                    res.id = +JSON.parse(this.content).packetID;
                    break;
                case 9:
                case 10:
                    res.type = this.type == 9 ? 5 : 4;
                    res.content = this.content.title;
                    res.id = this.content.numid || this.content.numId;
                    break;
                case 14:
                    res.type = 7;
                    res.content = '回复：' + this.contentObj.answerText;
                    res.id = 0;
                    break;
            }
            console.log(res);
            this.$emit('rewardClick', res);
        },
        formatTime: function formatTime(sec) {
            sec = Math.round(sec);
            //格式化时间
        },
        wxplayvoiceprogress: function wxplayvoiceprogress() {
            var _this2 = this;

            this.timeId = setInterval(function () {
                _this2.runTime++;
                // this.rangeValue = this.runTime / this.audioTimeTotal * 100
                if (_this2.runTime > _this2.audioTimeTotal) {
                    clearInterval(_this2.timeId);
                    // this.rangeValue = 0
                    _this2.runTime = 0;
                    _this2.audioState = 'played';
                }
            }, 1000);
        },
        takeRedpacket: function takeRedpacket() {
            this.$emit('takePacket', JSON.parse(this.content).packetID);
        }
    },
    watch: {
        audioState: function audioState(val) {
            var _this3 = this;

            if (this.$refs.audio) {
                var audio = this.$refs.audio;
                if (val == 'to-pause') {
                    console.log('pause');
                    // if (this.canplay === true) {
                    if (this.local && this.content.indexOf('http') == -1) {
                        if (this.nowPlayLocalId) {
                            wx.stopVoice({
                                localId: this.nowPlayLocalId
                            });
                        }
                        this.$emit('setNowPlayLocalId', this.content);
                        wx.playVoice({
                            localId: this.content
                        });
                        if (this.type == 16) {
                            this.picId = audio.getAttribute('data-id');
                            this.$emit('bindPic', this.picId);
                        }
                        this.wxplayvoiceprogress();
                    } else {

                        var msgIds = audio.getAttribute('data-msgId');
                        _wxfunction2.default.NextReadMsg(this.userId, this.$route.params.courseId.split("&")[0], msgIds - 1);

                        audio.play();
                        this.$emit('setNowPlayLocalId', '');
                        if (this.type == 16) {
                            this.picId = audio.getAttribute('data-id');
                            console.log(this.picId);
                            this.$emit('bindPic', this.picId);
                        }
                        WeixinJSBridge.invoke('getNetworkType', {}, function (e) {
                            audio.play();
                            if (_this3.type == 16) {
                                _this3.picId = audio.getAttribute('data-id');
                                _this3.$emit('bindPic', _this3.picId);
                            }
                            _this3.$emit('setNowPlayLocalId', '');
                        });
                    }
                    // } else {
                    //     Toast({ message: '网络不流畅，请稍后重试', duration: 1000 });
                    //     this.audioState = 'unplay';
                    // }
                } else if (val == 'to-play') {
                    if (this.local) {
                        wx.pauseVoice({
                            localId: this.content
                        });
                        clearInterval(this.timeId);
                    } else {
                        audio.pause();
                    }
                } else if (val == 'played') {
                    audio.pause();
                    audio.currentTime = 0;
                }
            }
        },
        canplay: function canplay(val) {
            var audio = this.$refs.audio;
            if (this.$refs.audio && this.audioState == 'to-pause' && val) {
                audio.play();
            }
        },
        nowPlayLocalId: function nowPlayLocalId(val) {
            if (this.local && this.content != val && this.audioState != 'unplay') {
                // wx.stopVoice({
                //     localId: this.content
                // })
                // this.rangeValue = 0
                this.runTime = 0;
                clearInterval(this.timeId);
                this.audioState = 'played';
            }
        }
    }
};
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(49)))

/***/ }),

/***/ 809:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.msg {\n  margin-top: .2rem;\n  padding: 0 .24rem;\n  line-height: 1;\n}\n.msg .sprite:before {\n    background-size: 7.5rem auto;\n    -webkit-transform: none;\n        -ms-transform: none;\n            transform: none;\n}\n.msg:first-child {\n    margin-top: 0;\n}\n.msg .msg-box {\n    display: -webkit-box;\n    display: -webkit-flex;\n    display: -ms-flexbox;\n    display: flex;\n}\n.msg .msg-box .avatar {\n      width: .8rem;\n      margin-right: .24rem;\n}\n.msg .msg-box .avatar img {\n        width: .8rem;\n        height: .8rem;\n        border-radius: 50%;\n}\n.msg .msg-box .avatar .reward-btn {\n        display: block;\n        margin: .1rem auto 0 auto;\n        width: .36rem;\n        height: .36rem;\n        border-radius: 50%;\n        background: #c62f2f url(\"/images/3.0/icon-02.png\") no-repeat center center/60% 60%;\n}\n.msg .msg-main {\n    -webkit-box-flex: 1;\n    -webkit-flex: 1;\n        -ms-flex: 1;\n            flex: 1;\n}\n.msg .msg-main .msg-name {\n      font-size: .26rem;\n      color: #737373;\n      margin-bottom: .2rem;\n}\n.msg .msg-main .msg-name p {\n        height: 25px;\n        line-height: 25px;\n        white-space: nowrap;\n}\n.msg .msg-main .msg-name p.name {\n          overflow: hidden;\n          text-overflow: ellipsis;\n}\n.msg .msg-main .msg-name p.msg-host {\n          color: #b2b2b2;\n}\n.msg .msg-main .msg-name p.msg-guest {\n          color: #b1840c;\n}\n.msg .msg-main .msg-name p.datatime {\n          font-size: .22rem;\n          color: #b2b2b2;\n          margin-left: .2rem;\n}\n.msg .msg-main .msg-name span {\n        margin-left: .2rem;\n}\n.msg .msg-main .msg-name span.msg-host {\n          display: inline-block;\n          width: .58rem;\n          height: .36rem;\n          background: url(\"/images/3.0/icon-05.png\") no-repeat top left/100% 100%;\n          vertical-align: middle;\n}\n.msg .msg-main .msg-name span.msg-guest {\n          display: inline-block;\n          width: .58rem;\n          height: .36rem;\n          background: url(\"/images/3.0/icon-12.png\") no-repeat top left/100% 100%;\n          vertical-align: middle;\n}\n.msg .msg-main .msg-name span.msg-ass {\n          display: inline-block;\n          width: .58rem;\n          height: .36rem;\n          background: url(\"/images/3.0/icon-06.png\") no-repeat top left/100% 100%;\n          vertical-align: middle;\n}\n.msg .msg-main .recall-btn {\n      position: relative;\n      margin-left: .12rem;\n      margin-top: .1rem;\n      border-radius: 3px;\n      width: .3rem;\n      min-width: .3rem;\n      height: .2rem;\n      box-sizing: border-box;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n      -webkit-justify-content: space-around;\n          -ms-flex-pack: distribute;\n              justify-content: space-around;\n      background-color: #e4e4e4;\n      padding: 0 .04rem;\n}\n.msg .msg-main .recall-btn span {\n        position: absolute;\n        width: 100%;\n        height: 100%;\n        border-radius: 50%;\n        top: 0;\n        left: 0;\n}\n.msg .msg-main .recall-btn i {\n        display: block;\n        width: .05rem;\n        height: .05rem;\n        background-color: #fff;\n        border-radius: 50%;\n}\n.msg .msg-main .recall-btn .menu {\n        position: absolute;\n        bottom: -.76rem;\n        left: 50%;\n        z-index: 2;\n        -webkit-transform: translateX(-50%) scale(0, 0);\n            -ms-transform: translateX(-50%) scale(0, 0);\n                transform: translateX(-50%) scale(0, 0);\n        width: auto;\n        height: .62rem;\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        border: 1px solid #d8b7b7;\n        border-radius: .08rem;\n        line-height: .62rem;\n        text-align: center;\n        font-size: .26rem;\n        color: #bb7777;\n        background-color: #fbf7f7;\n        -webkit-transform-origin: center top;\n            -ms-transform-origin: center top;\n                transform-origin: center top;\n        -webkit-transition: -webkit-transform .3s ease;\n        transition: -webkit-transform .3s ease;\n        transition: transform .3s ease;\n        transition: transform .3s ease, -webkit-transform .3s ease;\n}\n.msg .msg-main .recall-btn .menu.active {\n          -webkit-transform: translateX(-50%) scale(1, 1);\n              -ms-transform: translateX(-50%) scale(1, 1);\n                  transform: translateX(-50%) scale(1, 1);\n}\n.msg .msg-main .recall-btn .menu:before {\n          content: '';\n          position: absolute;\n          width: .06rem;\n          height: .06rem;\n          -webkit-transform: translateX(-50%) rotate(45deg);\n              -ms-transform: translateX(-50%) rotate(45deg);\n                  transform: translateX(-50%) rotate(45deg);\n          border-width: 1px;\n          border-style: solid;\n          border-color: #d8b7b7 transparent transparent #d8b7b7;\n          left: 50%;\n          top: -.06rem;\n          background-color: #fbf7f7;\n}\n.msg .msg-main .recall-btn .menu a {\n          text-align: center;\n          /*  flex: 1;*/\n          display: block;\n          height: 0.62rem;\n          font-size: 0.26rem;\n          color: #bb7777;\n          line-height: 0.62rem;\n          box-sizing: border-box;\n          border-right: 1px solid #ddbbbb;\n}\n.msg .msg-main .recall-btn .menu a:last-child {\n            border-right: none;\n}\n.msg .msg-main .msg-content {\n      max-width: 82%;\n      position: relative;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n}\n.msg .msg-main .msg-content .img {\n        max-width: inherit;\n}\n.msg .msg-main .msg-content.img-container {\n        display: block;\n}\n.msg .msg-main .msg-content.img-container:before {\n          content: none;\n}\n.msg .msg-main .msg-content.img-container img {\n          float: left;\n          margin-right: .15rem;\n}\n.msg .msg-main .msg-content .text {\n        position: relative;\n        display: inline-block;\n        background-color: #fff;\n        border-radius: 14px;\n        border: 1px solid #e8e8e8;\n        padding: .2rem;\n        font-size: .3rem;\n        color: #000;\n        word-break: break-all;\n        line-height: .38rem;\n        max-width: 100%;\n}\n.msg .msg-main .msg-content .text .img {\n          display: none;\n}\n.msg .msg-main .msg-content .FocusText {\n        border-radius: 0.24rem;\n        background: #ffe400;\n        padding: .2rem;\n        line-height: .5rem;\n        font-size: .3rem;\n        color: #353535;\n        display: inline-block;\n        max-width: 100%;\n        word-break: break-all;\n        position: relative;\n}\n.msg .msg-main .msg-content .FocusText .img {\n          background: url(\"/images/live/bubble_clip_icon.png\") no-repeat;\n          background-size: cover;\n          position: absolute;\n          bottom: 0.1rem;\n          right: -0.18rem;\n          width: 0.41rem;\n          height: 0.52rem;\n          display: block;\n}\n.msg .msg-main .msg-content img {\n        /* border-radius: 14px;*/\n        max-width: 3.4rem;\n        z-index: 1;\n        position: relative;\n}\n.msg .msg-main .msg-content .audioExtendType {\n        border: 1px solid #e2d2b0;\n        background-color: #fffbf0;\n}\n.msg .msg-main .msg-content .audioExtendType .img {\n          display: none;\n}\n.msg .msg-main .msg-content .noAudioExtendType {\n        background: #ffe400;\n}\n.msg .msg-main .msg-content .noAudioExtendType .img {\n          background: url(\"/images/live/bubble_clip_icon.png\") no-repeat;\n          background-size: cover;\n          position: absolute;\n          bottom: 0.1rem;\n          right: -0.18rem;\n          width: 0.41rem;\n          height: 0.52rem;\n          display: block;\n}\n.msg .msg-main .msg-content .msg-audio {\n        width: 3.6rem;\n        border-radius: 14px;\n        font-size: .26rem;\n        color: #fff;\n        height: .9rem;\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-pack: justify;\n        -webkit-justify-content: space-between;\n            -ms-flex-pack: justify;\n                justify-content: space-between;\n        -webkit-box-align: center;\n        -webkit-align-items: center;\n            -ms-flex-align: center;\n                align-items: center;\n        position: relative;\n        box-sizing: border-box;\n        padding-right: .24rem;\n        /*&:before {\n                    content: '';\n                    position: absolute;\n                    border-width: 1px;\n                    border-style: solid;\n                    border-color: transparent transparent #ccc #ccc;\n                    width: .1rem;\n                    height: .1rem;\n                    top: .24rem ;\n                    left: 0;\n                    background-color: #fff;\n                    transform: translateX(-50%) rotate(45deg);\n                }*/\n}\n.msg .msg-main .msg-content .msg-audio .audio-time {\n          position: absolute;\n          right: .56rem;\n          -webkit-transform: translateX(100%);\n              -ms-transform: translateX(100%);\n                  transform: translateX(100%);\n          color: #a6741d;\n          font-size: .32rem;\n          line-height: .9rem;\n}\n.msg .msg-main .msg-content .msg-audio.to-pause .audio-controller:before {\n          background-position: -0.72rem -0.8rem;\n}\n.msg .msg-main .msg-content .msg-audio.played .audio-extra {\n          right: -.52rem;\n          top: 50%;\n          -webkit-transform: translate(100%, -50%);\n              -ms-transform: translate(100%, -50%);\n                  transform: translate(100%, -50%);\n          width: .42rem;\n          height: .42rem;\n          border-radius: 50%;\n          background-color: #f9f9f9;\n          display: -webkit-box;\n          display: -webkit-flex;\n          display: -ms-flexbox;\n          display: flex;\n          -webkit-box-pack: center;\n          -webkit-justify-content: center;\n              -ms-flex-pack: center;\n                  justify-content: center;\n          -webkit-box-align: center;\n          -webkit-align-items: center;\n              -ms-flex-align: center;\n                  align-items: center;\n}\n.msg .msg-main .msg-content .msg-audio.played .audio-extra:before {\n            background-size: 7.5rem auto;\n            width: .35rem;\n            height: .21rem;\n            background-position: -.81rem -1.5rem;\n}\n.msg .msg-main .msg-content .msg-audio.unplay .audio-extra {\n          top: -.08rem;\n          right: -.08rem;\n}\n.msg .msg-main .msg-content .msg-audio.unplay .audio-extra:before {\n            content: '';\n            display: block;\n            width: .22rem;\n            height: .22rem;\n            border-radius: 50%;\n            background-color: #c62f2f;\n}\n.msg .msg-main .msg-content .msg-audio .audio-controller {\n          margin-left: .24rem;\n          width: .28rem;\n          height: .36rem;\n          background-repeat: no-repeat;\n          background-position: center center;\n          background-size: 100% 100%;\n}\n.msg .msg-main .msg-content .msg-audio .audio-progress {\n          -webkit-box-flex: 1;\n          -webkit-flex: 1;\n              -ms-flex: 1;\n                  flex: 1;\n          margin-right: 0.2rem;\n}\n.msg .msg-main .msg-content .msg-audio .audio-progress .mt-range-content {\n            margin-right: 0.24rem;\n}\n.msg .msg-main .msg-content .msg-audio .audio-progress .mt-range-runway {\n            border-top-color: #d8d8d8;\n            right: -12px;\n            border-radius: 3px;\n}\n.msg .msg-main .msg-content .msg-audio .audio-progress .mt-range-progress {\n            background-color: #007bda;\n            border-radius: 0.06rem 0 0 0.06rem;\n}\n.msg .msg-main .msg-content .msg-audio .audio-progress .mt-range-thumb {\n            width: 0.24rem;\n            height: 0.24rem;\n            top: 0.18rem;\n            position: relative;\n            z-index: 2;\n}\n.msg .msg-main .msg-content .msg-audio .audio-progress .mt-range-thumb:before {\n              content: '';\n              border-radius: 50%;\n              position: absolute;\n              z-index: 1;\n              background-color: rgba(255, 255, 255, 0.5);\n              width: 0.36rem;\n              height: 0.36rem;\n              top: 50%;\n              left: 50%;\n              -webkit-transform: translate(-50%, -50%);\n                  -ms-transform: translate(-50%, -50%);\n                      transform: translate(-50%, -50%);\n}\n.msg .msg-main .msg-content .msg-audio .audio-extra {\n          position: absolute;\n}\n.msg .msg-main .article,\n    .msg .msg-main .course {\n      padding: .2rem;\n      background-color: #fff;\n      border: 1px solid #e8e8e8;\n      border-radius: 14px;\n      display: block;\n      -webkit-box-flex: 1;\n      -webkit-flex: 1;\n          -ms-flex: 1;\n              flex: 1;\n}\n.msg .msg-main .article .title,\n      .msg .msg-main .course .title {\n        font-size: .3rem;\n        color: #545c65;\n        line-height: .38rem;\n        margin-bottom: 0.2rem;\n}\n.msg .msg-main .article .title.pay:before,\n        .msg .msg-main .course .title.pay:before {\n          content: '';\n          display: inline-block;\n          width: .3rem;\n          height: .3rem;\n          background: url(\"/images/3.0/icon-01.png\") no-repeat;\n          background-size: cover;\n          position: relative;\n          bottom: -.04rem;\n          margin-right: .1rem;\n}\n.msg .msg-main .article .content,\n      .msg .msg-main .course .content {\n        background: url(\"/images/live-12-1.png\") no-repeat;\n        background-size: auto 1.13rem;\n        padding-left: 1.06rem;\n        min-height: 1.14rem;\n}\n.msg .msg-main .article .content p,\n        .msg .msg-main .course .content p {\n          border: none;\n          border-radius: inherit;\n          padding: 0;\n          display: block;\n}\n.msg .msg-main .article .content .article-author,\n        .msg .msg-main .course .content .article-author {\n          line-height: 1;\n          color: #888;\n          font-size: .26rem;\n}\n.msg .msg-main .article .content .article-brief,\n        .msg .msg-main .course .content .article-brief {\n          -webkit-line-clamp: 3;\n          padding-left: .03rem;\n          line-height: .38rem;\n          font-size: .26rem;\n          color: #888;\n          margin-top: .08rem;\n}\n.msg .msg-main .article .content {\n      padding-left: 0;\n      background: none;\n      min-height: auto;\n}\n.msg .msg-main .article .content .article-brief {\n        padding-left: 0;\n}\n.msg .msg-main .article .content p {\n        padding: 0;\n        border: none;\n        border-radius: inherit;\n        display: block;\n}\n.msg .msg-main .course .content .article-author {\n      font-size: .3rem;\n}\n.msg .msg-main .msg-redpacket {\n      display: block;\n      width: 2.7rem;\n      height: 3.2rem;\n      background: url(\"/images/live-21.png\") no-repeat 0 0/100% 100%;\n      position: relative;\n}\n.msg .msg-main .msg-redpacket.all-taked {\n        background-image: url(\"/images/live-22.png\");\n}\n.msg .msg-main .msg-redpacket .orientation {\n        width: 100%;\n        position: absolute;\n        top: .8rem;\n        left: 0;\n        text-align: center;\n}\n.msg .msg-main .msg-redpacket .orientation .orientation-num {\n          display: inline-block;\n          width: 0.88rem;\n          height: .50rem;\n          line-height: .53rem;\n          text-align: center;\n          border-radius: 0.2rem;\n          color: #a6741d;\n}\n.msg .msg-main .answer-msg {\n      border: 1px solid #e8e8e8;\n      border-radius: 14px;\n      background-color: #fff;\n      font-size: 0.3rem;\n      line-height: .46rem;\n      overflow: hidden;\n}\n.msg .msg-main .answer-msg h5 {\n        color: #bb7777;\n        padding: 0.2rem;\n        border-bottom: 1px solid #e8e8e8;\n}\n.msg .msg-main .answer-msg p {\n        padding: 0.11rem 0.2rem;\n        color: #888;\n}\n.msg .msg-main .answer-msg p span {\n          color: #353535;\n}\n.msg .mt-range--disabled {\n    opacity: 1;\n}\n.msg .reward-msg,\n  .msg .redpacket-msg {\n    text-align: center;\n    position: relative;\n    height: .54rem;\n    margin-bottom: .2rem;\n}\n.msg .reward-msg p,\n    .msg .redpacket-msg p {\n      position: absolute;\n      top: 0;\n      left: 50%;\n      -webkit-transform: translateX(-50%);\n          -ms-transform: translateX(-50%);\n              transform: translateX(-50%);\n      padding: 0 .2rem;\n      white-space: nowrap;\n      font-size: .24rem;\n      color: #fff;\n      height: .52rem;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n      -webkit-box-pack: center;\n      -webkit-justify-content: center;\n          -ms-flex-pack: center;\n              justify-content: center;\n      background-color: #fadf4b;\n      border-radius: 50px;\n}\n.msg .reward-msg p .icon,\n      .msg .redpacket-msg p .icon {\n        display: inline-block;\n        width: .3rem;\n        height: .32rem;\n        background: url(\"/images/3.0/icon-01.png\") no-repeat;\n        background-size: cover;\n        margin-right: .12rem;\n}\n.msg .reward-msg p .money,\n      .msg .redpacket-msg p .money {\n        color: #c62f2f;\n}\n.msg .redpacket-msg p .icon {\n    width: .3rem;\n    height: .32rem;\n    background: url(\"/images/3.0/icon-07.png\") no-repeat center center/100% 100%;\n}\n.msg .playVoice {\n    background: url(\"/images/3.0/voice.gif\") no-repeat;\n}\n.msg .pauseVoice {\n    background: url(\"/images/3.0/audio-icon.png\") no-repeat;\n}\n", ""]);

// exports


/***/ }),

/***/ 819:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(832)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(801),
  /* template */
  __webpack_require__(826),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\subcomponents\\onlive\\msg.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] msg.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-b251978a", Component.options)
  } else {
    hotAPI.reload("data-v-b251978a", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 826:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    ref: "msg",
    staticClass: "msg"
  }, [(_vm.type == 11) ? [_c('div', {
    staticClass: "reward-msg"
  }, [_c('p', [_c('span', {
    staticClass: "icon"
  }), _vm._v(_vm._s(_vm.content.srcname) + " 赠予了 " + _vm._s(_vm.content.toname) + " \n                "), _c('span', {
    staticClass: "money"
  }, [_vm._v(_vm._s(_vm.content.gifname))]), _vm._v(" "), _c('span', [_vm._v(" X" + _vm._s(_vm.content.gifcount))])])])] : (_vm.type == 7) ? [_c('div', {
    staticClass: "redpacket-msg"
  }, [_c('p', [_c('span', {
    staticClass: "icon"
  }), _vm._v(_vm._s(_vm._f("limit")((_vm.contentObj.takeuser_alias || ''), 10)) + " 抢了 " + _vm._s(_vm._f("limit")((_vm.contentObj.alias ||
    ''), 10)) + " \n                "), _c('span', {
    staticClass: "money"
  }, [_vm._v("红包")])])])] : (_vm.type == 15) ? void 0 : [_c('div', {
    staticClass: "msg-box"
  }, [_c('div', {
    staticClass: "avatar"
  }, [_c('img', {
    ref: "img",
    attrs: {
      "src": "",
      "alt": ""
    }
  })]), _vm._v(" "), _c('div', {
    staticClass: "msg-main"
  }, [_c('div', {
    staticClass: "msg-main"
  }, [_c('div', {
    staticClass: "msg-name flex"
  }, [_c('p', {
    staticClass: "name"
  }, [_vm._v(_vm._s(_vm.name))]), _vm._v(" "), _c('span', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.idType != 2 && _vm.userType != 1 && _vm.host != 1),
      expression: "idType != 2 && userType != 1 && host!= 1"
    }],
    staticClass: "msg-guest"
  }), _vm._v(" "), _c('span', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.userType == 1 && _vm.host != 1),
      expression: "userType == 1 && host != 1"
    }],
    staticClass: "msg-ass"
  }), _vm._v(" "), _c('p', {
    staticClass: "datatime"
  }, [_vm._v(_vm._s(_vm.time))])]), _vm._v(" "), _c('div', {
    staticClass: "msg-content",
    class: {
      'img-container': _vm.type == 1 || _vm.type == 12
    }
  }, [(_vm.type == 0) ? _c('div', {
    class: {
      'text': _vm.extendType == 0, 'FocusText': _vm.extendType == 1
    },
    attrs: {
      "id": 'msgId' + _vm.msgId
    }
  }, [(_vm.content.indexOf('[-') >= 0) ? [_vm._l((_vm.getEmojiData), function(item, index) {
    return [(_vm.content.indexOf(item.expression_number) >= 0) ? [_c('img', {
      staticStyle: {
        "width": "1.63rem",
        "height": "1.1rem"
      },
      attrs: {
        "src": item.qiniuImg
      }
    })] : _vm._e()]
  })] : [_vm._v("\n                                " + _vm._s(_vm.content) + "\n                            ")], _vm._v(" "), _c('div', {
    staticClass: "img"
  })], 2) : (_vm.type == 1) ? [_c('img', {
    ref: "picture",
    class: {
      'img': !_vm.isWeiXin
    },
    attrs: {
      "id": 'msgId' + _vm.msgId,
      "src": _vm.content.indexOf('qq.com') == -1 ? (_vm.content + '?imageView2/2/w/400') : _vm.content,
      "alt": ""
    },
    on: {
      "click": _vm.preview
    }
  })] : (_vm.type == 12) ? [_c('img', {
    ref: "picture",
    class: {
      'img': !_vm.isWeiXin
    },
    attrs: {
      "id": 'msgId' + _vm.msgId,
      "src": _vm.contentApp
    },
    on: {
      "click": _vm.preview
    }
  })] : (_vm.type == 16) ? [(this.unReadMsgId >= this.msgId) ? _c('div', [_c('a', {
    staticClass: "msg-audio  played audioExtendType",
    class: [{
      'audioExtendType': _vm.extendType == 0,
      'noAudioExtendType': _vm.extendType == 1
    }, _vm.audioState],
    attrs: {
      "id": 'msgId' + _vm.msgId
    },
    on: {
      "click": function($event) {
        _vm.controller1(_vm.picmediaid, _vm.msgId + 1)
      }
    }
  }, [_c('div', {
    staticClass: "img"
  }), _vm._v(" "), _c('audio', {
    ref: "audio",
    attrs: {
      "data-id": _vm.picmediaid,
      "preload": "metadata",
      "hidden": "",
      "data-msgId": _vm.msgId,
      "src": _vm.content
    }
  }, [_vm._v("\n                                        Your browser does not support the audio element.您的浏览器不支持 audio 标签。\n                                        ")]), _vm._v(" "), _c('div', {
    class: ['audio-controller', {
      'playVoice': _vm.audioState == 'to-pause',
      'pauseVoice': _vm.audioState != 'to-pause'
    }]
  }), _vm._v(" "), _c('div', {
    staticClass: "audio-time"
  }, [_vm._v(_vm._s(_vm.duration) + "''")]), _vm._v(" "), (this.unReadMsgId >= this.msgId) ? _c('div', {
    staticClass: "audio-extra  sprite",
    class: {
      sprite: _vm.audioState == 'played'
    }
  }) : _c('div', {
    staticClass: "audio-extra",
    class: {
      sprite: _vm.audioState == 'played'
    }
  })])]) : _c('div', [_c('a', {
    staticClass: "msg-audio",
    class: [{
      'audioExtendType': _vm.extendType == 0,
      'noAudioExtendType': _vm.extendType == 1
    }, _vm.audioState],
    attrs: {
      "id": 'msgId' + _vm.msgId
    },
    on: {
      "click": function($event) {
        _vm.controller1(_vm.picmediaid, _vm.msgId + 1)
      }
    }
  }, [_c('div', {
    staticClass: "img"
  }), _vm._v(" "), _c('audio', {
    ref: "audio",
    attrs: {
      "data-id": _vm.picmediaid,
      "preload": "metadata",
      "hidden": "",
      "data-msgId": _vm.msgId,
      "src": _vm.content
    }
  }, [_vm._v("\n                                        Your browser does not support the audio element.您的浏览器不支持 audio 标签。\n                                        ")]), _vm._v(" "), _c('div', {
    class: ['audio-controller', {
      'playVoice': _vm.audioState == 'to-pause',
      'pauseVoice': _vm.audioState != 'to-pause'
    }]
  }), _vm._v(" "), _c('div', {
    staticClass: "audio-time"
  }, [_vm._v(_vm._s(_vm.duration) + "''")]), _vm._v(" "), (this.unReadMsgId >= this.msgId) ? _c('div', {
    staticClass: "audio-extra  sprite",
    class: {
      sprite: _vm.audioState == 'played'
    }
  }) : _c('div', {
    staticClass: "audio-extra",
    class: {
      sprite: _vm.audioState == 'played'
    }
  })])])] : (_vm.type == 2 || _vm.type == 13) ? [(this.unReadMsgId >= this.msgId) ? _c('div', [_c('a', {
    staticClass: "msg-audio  played audioExtendType",
    attrs: {
      "id": 'msgId' + _vm.msgId
    },
    on: {
      "click": function($event) {
        _vm.controller(_vm.msgId)
      }
    }
  }, [_c('div', {
    staticClass: "img"
  }), _vm._v(" "), _c('audio', {
    ref: "audio",
    attrs: {
      "preload": "metadata",
      "hidden": "",
      "src": _vm.content,
      "data-msgId": _vm.msgId
    }
  }, [_vm._v("\n                                        Your browser does not support the audio element.您的浏览器不支持 audio 标签。\n                                        ")]), _vm._v(" "), _c('div', {
    class: ['audio-controller', {
      'playVoice': _vm.audioState == 'to-pause',
      'pauseVoice': _vm.audioState != 'to-pause'
    }]
  }), _vm._v(" "), _c('div', {
    staticClass: "audio-time"
  }, [_vm._v(_vm._s(_vm.duration) + "''")]), _vm._v(" "), (this.unReadMsgId >= this.msgId) ? _c('div', {
    staticClass: "audio-extra  sprite",
    class: {
      sprite: _vm.audioState == 'played'
    }
  }) : _c('div', {
    staticClass: "audio-extra",
    class: {
      sprite: _vm.audioState == 'played'
    }
  })])]) : _c('div', [_c('a', {
    staticClass: "msg-audio ",
    class: [{
      'audioExtendType': _vm.extendType == 0,
      'noAudioExtendType': _vm.extendType == 1
    }, _vm.audioState],
    attrs: {
      "id": 'msgId' + _vm.msgId
    },
    on: {
      "click": function($event) {
        _vm.controller(_vm.msgId)
      }
    }
  }, [_c('div', {
    staticClass: "img"
  }), _vm._v(" "), _c('audio', {
    ref: "audio",
    attrs: {
      "preload": "metadata",
      "hidden": "",
      "src": _vm.content,
      "data-msgId": _vm.msgId
    }
  }, [_vm._v("\n                                        Your browser does not support the audio element.您的浏览器不支持 audio 标签。\n                                        ")]), _vm._v(" "), _c('div', {
    class: ['audio-controller', {
      'playVoice': _vm.audioState == 'to-pause',
      'pauseVoice': _vm.audioState != 'to-pause'
    }]
  }), _vm._v(" "), _c('div', {
    staticClass: "audio-time"
  }, [_vm._v(_vm._s(_vm.duration) + "''")]), _vm._v(" "), (this.unReadMsgId >= this.msgId) ? _c('div', {
    staticClass: "audio-extra  sprite",
    class: {
      sprite: _vm.audioState == 'played'
    }
  }) : _c('div', {
    staticClass: "audio-extra",
    class: {
      sprite: _vm.audioState == 'played'
    }
  })])])] : (_vm.type == 9) ? _c('router-link', {
    staticClass: "article",
    attrs: {
      "to": ("/personalSpace/viewpointDetail/" + (_vm.content.numid) + "&" + _vm.userId)
    }
  }, [_c('h5', {
    staticClass: "title double-text",
    class: {
      pay: _vm.content.btip == 1
    }
  }, [_vm._v(_vm._s(_vm.content.title))]), _vm._v(" "), _c('div', {
    staticClass: "content"
  }, [_c('p', {
    staticClass: "article-author"
  }, [_vm._v("来源：" + _vm._s(_vm.content.source))]), _vm._v(" "), _c('p', {
    staticClass: "article-brief single-text"
  }, [_vm._v("摘要：" + _vm._s(_vm._f("limit")(_vm.content.summary, 45)))])])]) : (_vm.type == 10) ? _c('router-link', {
    staticClass: "course",
    attrs: {
      "to": ("/personalCenter/course/" + (_vm.content.numId) + "&" + _vm.userId)
    }
  }, [_c('h5', {
    staticClass: "title double-text",
    class: {
      pay: _vm.content.btip == 1
    }
  }, [_vm._v(_vm._s(_vm.content.title))]), _vm._v(" "), _c('div', {
    staticClass: "content"
  }, [_c('p', {
    staticClass: "article-author"
  }, [_vm._v(_vm._s(_vm.content.source))]), _vm._v(" "), _c('p', {
    staticClass: "article-brief single-text"
  }, [_vm._v(_vm._s(_vm._f("limit")(_vm.content.summary, 45)))])])]) : (_vm.type == 14) ? _c('div', {
    staticClass: "answer-msg",
    attrs: {
      "id": 'msgId' + _vm.msgId
    }
  }, [_c('h5', [_vm._v("回复：" + _vm._s(_vm.contentObj.answerText))]), _vm._v(" "), _c('p', [_c('span', [_vm._v(_vm._s(_vm.contentObj.name) + "：")]), _vm._v(" "), (_vm.contentObj.text.indexOf('[-') >= 0) ? [_vm._l((_vm.getEmojiData), function(item, index) {
    return [(_vm.contentObj.text.indexOf(item.expression_number) >= 0) ? [_c('img', {
      staticStyle: {
        "width": "1.63rem",
        "height": "1.1rem"
      },
      attrs: {
        "src": item.qiniuImg
      }
    })] : _vm._e()]
  })] : [_vm._v("\n                                    " + _vm._s(_vm.contentObj.text) + "\n                                ")]], 2)]) : _vm._e(), _vm._v(" "), (_vm.type == 4) ? _c('a', {
    staticClass: "msg-redpacket",
    attrs: {
      "href": "javascript:;",
      "id": 'msgId' + _vm.msgId
    },
    on: {
      "click": _vm.takeRedpacket
    }
  }, [_c('div', {
    staticClass: "orientation"
  }, [_c('div', {
    staticClass: "orientation-num"
  }, [_vm._v(_vm._s(_vm.luckyNum))])])]) : _vm._e(), _vm._v(" "), ((_vm.isAssistant == 1 || _vm.idType == 0) && !_vm.liveStatusEnd) ? _c('a', {
    staticClass: "recall-btn",
    attrs: {
      "href": "javascript:;"
    }
  }, [_c('span', {
    on: {
      "click": _vm.openMenu
    }
  }), _vm._v(" "), _c('i'), _vm._v(" "), _c('i'), _vm._v(" "), _c('i'), _vm._v(" "), (_vm.type == 2 || _vm.type == 0 || _vm.type == 13 || _vm.type == 16) ? _c('div', {
    staticClass: "menu"
  }, [_c('a', {
    staticStyle: {
      "width": "0.9rem"
    },
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": function($event) {
        _vm.recall(_vm.teacherId, _vm.msgId)
      }
    }
  }, [_vm._v("撤回")]), _vm._v(" "), (_vm.extendType == 0) ? _c('a', {
    staticStyle: {
      "width": "0.9rem"
    },
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": function($event) {
        _vm.extendTypeFun(_vm.teacherId, _vm.msgId, _vm.extendType)
      }
    }
  }, [_vm._v("重点")]) : _c('a', {
    staticStyle: {
      "width": "1.3rem"
    },
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": function($event) {
        _vm.extendTypeFun(_vm.teacherId, _vm.msgId, _vm.extendType)
      }
    }
  }, [_vm._v("取消重点")])]) : _c('div', {
    staticClass: "menu"
  }, [_c('a', {
    staticStyle: {
      "width": "0.9rem"
    },
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": function($event) {
        _vm.recall(_vm.teacherId, _vm.msgId)
      }
    }
  }, [_vm._v("撤回")])])]) : _vm._e()], 2)])])])]], 2)
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-b251978a", module.exports)
  }
}

/***/ }),

/***/ 832:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(809);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("779114ff", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-b251978a\",\"scoped\":false,\"hasInlineConfig\":true}!../../../node_modules/sass-loader/lib/loader.js!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./msg.vue", function() {
     var newContent = require("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-b251978a\",\"scoped\":false,\"hasInlineConfig\":true}!../../../node_modules/sass-loader/lib/loader.js!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./msg.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 914:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function($) {

Object.defineProperty(exports, "__esModule", {
    value: true
});

var _vueAwesomeSwiper = __webpack_require__(136);

var _mintUi = __webpack_require__(54);

var _vuex = __webpack_require__(70);

var _QrCode = __webpack_require__(524);

var _QrCode2 = _interopRequireDefault(_QrCode);

var _msg = __webpack_require__(819);

var _msg2 = _interopRequireDefault(_msg);

var _pptEdit = __webpack_require__(1105);

var _pptEdit2 = _interopRequireDefault(_pptEdit);

var _liveVipMember = __webpack_require__(553);

var _liveVipMember2 = _interopRequireDefault(_liveVipMember);

var _nomore = __webpack_require__(135);

var _nomore2 = _interopRequireDefault(_nomore);

var _socketClient = __webpack_require__(522);

var _socketClient2 = _interopRequireDefault(_socketClient);

var _wxfunction = __webpack_require__(517);

var _wxfunction2 = _interopRequireDefault(_wxfunction);

var _redpacket = __webpack_require__(727);

var _redpacket2 = _interopRequireDefault(_redpacket);

var _LackGifts = __webpack_require__(138);

var _LackGifts2 = _interopRequireDefault(_LackGifts);

var _gift = __webpack_require__(726);

var _gift2 = _interopRequireDefault(_gift);

var _em = __webpack_require__(552);

var _em2 = _interopRequireDefault(_em);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

__webpack_require__(516);
__webpack_require__(535);
// import { Toast, Indicator } from 'mint-ui'
//PPT编辑
exports.default = {
    data: function data() {
        return {
            getEmojiData: [],
            isEm: true, //表情与键盘切换
            isEmojiBox: false, //是否显示表情
            giftSwiperOption: {
                width: window.innerWidth,
                pagination: '.swiper-pagination'
            },
            PayType: 6, //3：live直播打赏 6：课程直播打赏  8：公共直播间送礼
            liveData: {
                id: this.$route.params.courseId.split("&")[0]
            },
            isMsgId: false, //語音定位默認只執行一次
            unReadMsgId: '', //語音msgId
            vipMemberList: [], //vip 會員席位
            vipMemberTotal: 0, //vip 会员总人数
            isConcentrate: 0, //消息類型是否為重點
            disabled: true,
            msgs: [], //所有信息内容
            comments: [], //所有评论内容
            type: 2, // 0为老师，1为嘉宾，2为学生
            isRecording: 0, // 0为初始状态，1为录音中状态，2为录音结束状态
            recordingDuration: 0, // 录音时长
            timeId: null, // 录音时长计时器id
            liveStatusEnd: false, //直播间是否结束
            tabberActive: 0, // 直播室下方tabber激活情况
            studentNum: 0,
            msgUrl: "http://file.api.weixin.qq.com/cgi-bin/media/get?",
            // sheetVisible: false,
            popupVisible: false, // 操作栏是否弹出
            dropRecord: false, // 抛弃录音确认弹框
            // actions: [{ name: '拍照' }, { name: '照片图片' }],
            bodyDOM: null,
            tabberDOM: null,
            onliveData: {},
            showMini: true, //是否显示最新评论框
            showCommentRoom: false, //显示聊天室
            forbiddenMode: false, //本地控制开启禁言模式变量
            // userForbiddenMode: false,//所有用户展示禁言模式变量
            showForbiddenMode: false, //显示禁言模式弹出框
            showFinishMode: false, //显示结束弹出框，
            showCloseOnLiveMode: false, //显示禁用该直播间弹出框
            closeOnLiveMode: true, //本地控制禁用直播间变量 true:开启 false:关闭直播间
            onLiveCourse: false, //单个课程是否禁用
            hostId: null,
            commentText: "",
            text: "",
            msgLastId: 0,
            commentLastId: 0,
            images: {
                localId: "",
                serverId: "",
                downloadId: ""
            },
            voice: {
                localId: "",
                serverId: "",
                downloadId: ""
            },
            loginSuccess: true, //是否登录成功
            commentCount: 0,
            // audioSrc: '',
            gotoTabNum: -1,
            reconnectId: null, //重连定时器id,
            noconnectText: "断网了，请稍后重试",
            loading: false,
            commentLoading: false,
            isEnd: false,
            commentIsEnd: false,
            disconnect: false, //是否断网
            canTap: true,
            nowPlayLocalId: "",
            firstHostGetMsg: false,
            courseId: this.$route.params.courseId.split("&")[0],
            chatroomOptions: "1", //1为聊天室，2为赞赏排行榜
            rewardList: [],
            rewardLoading: true,
            rewardPage: 1,
            rewardEnd: false,
            rewardVisible: false,
            payboxShow: false,
            gift: [], //赞赏礼物
            giftOptions: -1,
            rewardQue: [], //赞赏队列
            rewardShowing: false,
            showRedPacket: false,
            redpacketMoney: 0,
            answerRedPacket: false, //抢红包弹窗
            answerText: "", //抢红包口令回答
            nowTakingPacketId: 0, //当前红包ID
            answerComment: false, //回复评论弹出框
            answerUserInfo: {}, //回复的用户姓名
            goWall: false, //上墙
            aidShow: false,
            isFocus: false,
            showCommentSW: false, //顯示聊天記錄
            aidCode: "",
            qiNiuDomain: "http://oqt46pvmm.bkt.clouddn.com/",
            pcImageUrl: "",
            isMobile: "true", //是否移动端
            isrecord: false, //是否上传成功
            //3.0新加
            swipeShow: true, //ppt轮播图是否隐藏
            banner: [],
            swipeText: "收起",
            showedit: false, //是否编辑PPT上传图片资料
            introImgs: {
                localId: [], //本地选择图片id
                serverId: [], //上传返回服务端id
                downloadId: [] //下载返回本地id
            },
            previewImg: [], //图片介绍src
            picmediaid: "",
            swipeDom: "",
            picId: "", //点击时图片id
            localLoading: false, //本地是否加载，当为true是表示3012语音返回来了
            isShowMsgMask: false,
            loginS: false, //房间是否登录成功
            swiperOption: {
                autoplay: false,
                setWrapperSize: true,
                pagination: '.swiper-pagination',
                paginationClickable: true,
                paginationType: 'fraction',
                mousewheelControl: true,
                observeParents: true
            },
            swiperSlides: [1, 2, 3, 4, 5],
            load3017: false,
            showVipAnimate: false, //vip进场特效
            giftPageTotal: '', //送礼列表总页数
            isRefresh: false, //是否上拉加载已读消息
            userLevel: '',
            isShowGify: true, //是否顯示送禮
            isLink: 1, //0不跳轉  1跳轉
            isOfficials: false
        };
    },

    computed: {
        isWeiXin: function isWeiXin() {
            return this.$store.state.isWeiXin;
        },
        userId: function userId() {
            return this.$store.state.userInfo.user_id;
        },
        userAvatar: function userAvatar() {
            return this.$store.state.userInfo.img;
        },
        username: function username() {
            return this.$store.state.userInfo.username;
        },
        sdkdata: function sdkdata() {
            return this.$store.state.sdkdata;
        },
        userInfo: function userInfo() {
            return this.$store.state.userInfo;
        },
        mySwiper: function mySwiper() {
            return this.$refs.Swiper.swiper;
        },
        userVip: function userVip() {
            return this.$store.state.userInfo.vipLevel;
        },
        msgFirstId: function msgFirstId() {
            return this.msgs[0].msgId;
        }
    },

    created: function created() {
        var _this2 = this;

        this.setCookie('isShareLink', 1);
        this.getAccountBalance();
        if (this.$route.params.courseId.split("&")[1] == 1) {
            //默認打開留言板
            var router = setTimeout(function () {
                _this2.showCommentRoomClick('1');
                clearTimeout(router);
            }, 1000);
        }

        this.$store.dispatch("getUserInfo", function (res) {

            _this2.getData();
        });

        this.getUserInfo();
        this.$store.commit("hideTabber");
        if (/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent) && this.isWeiXin) {
            // alert("手机端");
            this.isMobile = true;
        } else {
            // alert("pc端");
            this.isMobile = false;
        }
    },
    beforeRouteEnter: function beforeRouteEnter(to, from, next) {
        if (from.path.indexOf("shaking") !== -1) {
            sessionStorage.setItem("onloadShake", "1");
        }
        next();
    },
    beforeDestroy: function beforeDestroy() {
        _wxfunction2.default.leaveRoom(+this.userId, +this.courseId);
        clearInterval(_socketClient2.default.setping);
        _socketClient2.default.ws.close();
    },
    mounted: function mounted() {
        if (!this.isWeiXin) {
            var $onlivepage = $(".onlivepage");
        }

        this.bodyDOM = this.$refs.body;
        this.tabberDOM = this.$refs.tabber;
        this.swipeDom = this.$refs.swipe;
    },
    destroyed: function destroyed() {
        _mintUi.Indicator.close();
        this.setCookie("isBack", 0);
    },

    filters: {
        formatComment: function formatComment(str) {
            return str.length > 10 ? str.substring(0, 10) + "..." : str;
        }
    },

    methods: {
        isOfficial: function isOfficial() {
            var _this3 = this;

            //是否官方账号
            this.$http.get('/CourseDetails/isOfficial?teacher_id=' + this.onliveData.uid).then(function (res) {
                console.log(res);
                if (res.body.code == 200) {
                    if (res.body.data) {
                        //官方账号
                        _this3.isOfficials = true;
                    } else {
                        _this3.isOfficials = false;
                    }
                }
            });
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
            } else {
                this.isEm = true;
                this.isEmojiBox = false;
            }
        },
        getAccountBalance: function getAccountBalance() {
            var _this4 = this;

            this.$http.get('/User/getAccountBalance?format=2').then(function (res) {
                if (res.body.code == 200) {
                    _this4.userLevel = res.body.data.currentVipLevel;
                }
            });
        },
        concentrate: function concentrate() {
            //选择重点标注
            if (this.isConcentrate) {
                this.isConcentrate = 0;
            } else {
                this.isConcentrate = 1;
            }
        },
        bindScrollFun: function bindScrollFun(this_) {
            this.showCommentSW = true;
            setTimeout(function () {
                this_.scrollIntoViewIfNeeded();
            }, 500); // 弹出键盘后0.5秒 再隐藏，有的安卓手机反应慢
        },


        /**
         * 3.0 新增方法
         *  **/
        /* ppt照片绑定 */
        bindPic: function bindPic(picId) {
            var length = $(".swiper-slide").length;

            for (var i = 0; i < length; i++) {
                var picmediaid = $(".swiper-container").find(".swiper-slide")[i].getAttribute("data-key");
                if (picId == picmediaid) {

                    this.mySwiper.slideTo(i, 1000, false); //切换到第一个slide，速度为1秒
                }
            }

            var newArr = this.banner.filter(function (item) {
                return item.picId == picId;
            });

            if (newArr.length == 0 || newArr == []) {

                this.mySwiper.slideTo(0, 1000, false); //切换到第一个slide，速度为1秒
            }
        },

        //数字转数组
        lenFun: function lenFun(num) {
            var len = num.toString();
            var arr = len.split('');
            return arr;
        },

        //获取picId

        getPicId: function getPicId() {
            var length = $(".swiper-container").find(".swiper-slide").length;
            this.picmediaid = $(".swiper-container .swiper-slide-active").attr("data-key");
            // for (var i = 0; i < length; i++) {
            // 	if (
            // 		$($(".swiper-container").find(".swiper-slide")[i]).hasClass("swiper-slide-active")
            // 	) {
            // 		this.picmediaid = $(".swiper-container")
            // 			.find(".swiper-slide")
            // 			[i].getAttribute("data-key");

            // 	}
            // }
            //   alert('ll'+  this.picmediaid)
        },


        /* 轮播图是否隐藏 */
        swipeToggle: function swipeToggle() {
            if (this.swipeShow == true) {
                this.swipeShow = false;
                this.swipeText = "展开";
            } else {
                this.swipeShow = true;
                this.swipeText = "收起";
            }
        },

        //关闭ppt编辑
        showeditMask: function showeditMask() {
            this.showedit = false;
        },


        //图片放大
        imgBig: function imgBig(img) {
            var imgPaths = [];
            for (var i = 0; i < this.banner.length; i++) {
                imgPaths.push(this.banner[i].picurl);
            }
            wx.previewImage({
                current: img,
                urls: imgPaths
            });
        },

        /**
         * 3.0 新增方法 end
         *  **/
        getUserInfo: function getUserInfo() {
            var _this5 = this;

            // 获取用户数据
            this.$http.get(this.hostUrl + '/User/', { params: { loginRedirectUrl: location.href } }).then(function (res) {
                if (res.body.code == 200) {
                    // 登录成功
                    _this5.$store.commit("updateUserInfo", res.body.data);
                }
            });
        },
        getUserAid: function getUserAid() {
            var _this6 = this;

            // 获取助教数据

            this.aidShow = true;
            this.$http.get(this.hostUrl + "/User/getUserAssistantQrCode", {
                params: { userId: this.hostId }
            }).then(function (res) {
                if (res.body.code == 200) {
                    _this6.aidCode = res.body.data || "/images/default_code.jpg";
                }
            });
        },
        returnLast: function returnLast() {
            setTimeout(function () {
                //	            console.log('-----------this.refs.msg--------',document.getElementById('main').lastElementChild);
                //	            this.$refs.main.lastElementChild.previousElementSibling.scrollIntoView();
                document.getElementById("main").lastElementChild.scrollIntoView();
            }, 100);
        },
        sendAnswerComment: function sendAnswerComment() {
            if (this.answerText.trim() == "") {
                (0, _mintUi.Toast)({ message: "请输入回复内容", duration: 1000 });
                return;
            }
            if (this.answerText.length > 100) {
                (0, _mintUi.Toast)({ message: "回复内容不得大于100个字", duration: 1000 });
                return;
            }
            _wxfunction2.default.sendTalkMessage(+this.userId, +this.courseId, this.answerText, 0, this.answerUserInfo.msgId, this.answerUserInfo.userId);
            if (this.goWall === true) {
                _wxfunction2.default.sendMessage(+this.userId, +this.courseId, JSON.stringify({
                    name: this.answerUserInfo.name,
                    text: this.answerUserInfo.content,
                    answerText: this.answerText
                }), 14, 0, this.answerUserInfo.msgId);
            }
        },
        cancelAnswerComment: function cancelAnswerComment() {
            this.answerComment = false;
            this.answerUserInfo = {};
        },
        answerRedPacketFun: function answerRedPacketFun(redpacketId) {
            this.nowTakingPacketId = redpacketId;
            _wxfunction2.default.takeRedpacket(this.userId, +this.courseId, this.nowTakingPacketId, "");
            _mintUi.Indicator.open();
            // this.answerRedPacket = true;
        },
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
        takeRedPacketFun: function takeRedPacketFun() {
            if (this.answerText == "") {
                (0, _mintUi.Toast)({ message: "请输入口令", duration: 1000 });
                this.disabled = true;
                return;
            }
            _wxfunction2.default.takeRedpacket(this.userId, +this.courseId, this.nowTakingPacketId, this.answerText);
        },
        setNowPlayLocalId: function setNowPlayLocalId(localId) {
            this.nowPlayLocalId = localId;
        },
        config: function config() {
            var _this7 = this;

            wx.ready(function () {
                _this7.wxShare({
                    title: _this7.onliveData.class_name,
                    desc: "点击链接即可参加课程",
                    imgUrl: _this7.onliveData.head_add,
                    link: window.location.origin + "/#/personalCenter/course/" + _this7.courseId + "&" + _this7.userId + '?shareId=1'
                });
                wx.onVoiceRecordEnd({
                    complete: function complete(res) {
                        if (_this7.voice.localId == "") {
                            _this7.voice.localId = res.localId;
                        }
                        clearInterval(_this7.timeId);
                        // alert('语音时间已超过一分钟');
                        _this7.isRecording = 2;
                    }
                });
            });
            wx.error();
        },
        showMsgMask: function showMsgMask() {
            // 撤回
            this.isShowMsgMask = true;
        },
        cancelMsgMask: function cancelMsgMask() {
            this.isShowMsgMask = false;
            var $btn = $(".recall-btn");
            $btn.css("z-index", "auto").find(".menu").removeClass("active");
        },
        getHistory: function getHistory(all) {
            _wxfunction2.default.getMsgHis(this.userId, this.courseId, all ? 0 : this.msgLastId, all ? true : false);

            //wxfun.getMsgHis(this.userId, this.courseId, all ? 0 : this.msgLastId, all ? true : false);
        },
        rewardClick: function rewardClick(remake) {
            var _this8 = this;

            //弹出赞赏框
            this.remake = remake;
            this.rewardVisible = true;
            this.$http.get("/gift/lists").then(function (res) {
                console.log("礼物", res.body);
                if (res.body.code == 0) {
                    _this8.gift = res.body.data;
                    _this8.giftPageTotal = Math.ceil(res.body.data.list.length / 6);
                }
            });
        },
        toggleCommentMenu: function toggleCommentMenu(e) {
            var $target = $(e.target);
            this.$refs.mask.style.display = "block";
            $(".item-menu").removeClass("active");
            $target.siblings(".item-menu").toggleClass("active");
            // $target.find('.item-menu').addClass('active');
            // $target.find('.menu-mask').show();
        },
        delComment: function delComment(msgId) {
            var _this9 = this;

            //老师端删除用户评论
            // console.log(msgId);
            // if (this.onLiveCourse == true) {
            // 	Toast({message: "您的直播间已被禁用，不可操作", duration: 2000});
            // 	return;
            // }
            _mintUi.MessageBox.confirm("确定删除Ta的讨论吗？", "").then(function (action) {
                _wxfunction2.default.sendTalkMessage(+_this9.userId, +_this9.courseId, msgId + "", 8);
                for (var i = 0; i < _this9.comments.length; i++) {
                    //删除整组评论
                    if (_this9.comments[i].mastermsgId == msgId) {
                        _wxfunction2.default.sendTalkMessage(+_this9.userId, +_this9.courseId, _this9.comments[i].msgId + "", 8, _this9.comments[i].msgId + "");
                    }
                }
            }, function (cancal) {});
            $(".item-menu").removeClass("active");
        },

        /*sendReward() {
         if (this.giftOptions == -1) {
         Toast({message: "请选择想要赠送的礼物", duration: 1000});
         return;
         }
         const gift = this.gift.list;
         this.remake.giftId = gift[this.giftOptions].gift_id;
         this.remake.giftPrice = gift[this.giftOptions].gift_money;
         this.remake.giftName = gift[this.giftOptions].gift_name;
         this.remake.giftImg = gift[this.giftOptions].gift_img;
         this.remake.courseId = this.courseId;
         this.remake.giftType = gift[this.giftOptions].gift_type;
         const data = {
         user_id: this.userId,
         amount: gift[this.giftOptions].gift_money,
         type: 6,
         class_id: parseInt(this.courseId),
         remark: JSON.stringify(this.remake)
         };
         // console.log('赞赏数据', data);
         // return;
         this.$http
         .post("/InpourPay/pay", data, {emulateJSON: true})
         .then(res => {
         // alert(JSON.stringify(res.body));
         if (res.body.code == 0) {
         this.rewardVisible = false;
         } else if (res.body.code == -16026) {
         //余额不足
         this.payboxShow = true;
         }
         });
         },*/
        cancalCommentMenu: function cancalCommentMenu(e) {
            var $target = $(e.target);
            $target.hide();
            $(".item-menu").removeClass("active");
        },
        forbidComment: function forbidComment(userId) {
            var _this10 = this;

            //单独禁言
            if (this.onLiveCourse == true) {
                (0, _mintUi.Toast)({ message: "您的直播间已被禁用，不可操作", duration: 2000 });
                return;
            }
            _mintUi.MessageBox.confirm("确定禁止Ta讨论吗？", "").then(function (action) {
                _wxfunction2.default.forbidUserChat(+_this10.hostId, +_this10.courseId, 1, +userId);
            }, function (cancel) {});
            $(".item-menu").removeClass("active");
        },
        getCommentHistory: function getCommentHistory() {
            _wxfunction2.default.getTalkMsgHis(this.userId, this.courseId, this.commentLastId);
        },
        errorLoadImg: function errorLoadImg(item) {
            item.avatar = "/images/default/userDefault.png";
        },
        loadTop: function loadTop(done) {
            var _this11 = this;

            //上拉加載更多
            console.log('loadTop');
            console.log(this.msgFirstId);
            setTimeout(function () {
                //this.getHistory(this.msgFirstId, false, 10, true);
                _this11.isRefresh = true;
                _wxfunction2.default.getMsgHis(+_this11.userId, _this11.courseId, _this11.msgFirstId, 1, false, 10, -1);
                done();
            }, 500);
            this.$refs.myscroller.finishInfinite(2);
        },
        loadMore: function loadMore(done) {
            if (this.disconnect) {
                (0, _mintUi.Toast)(this.noconnectText);
                return;
            }
            if (this.isEnd) {
                this.$refs.myscroller.finishInfinite(2);
                return;
            }
            /*this.loading = true;
             if (socketClient.ws) {
             this.getHistory(false);
             }*/
            if (this.loading == false) {
                console.log('loadMore');
                var self = this;
                var time = setTimeout(function () {
                    self.getHistory(false);
                    self.$refs.myscroller.resize();
                    // clearTimeout(time);
                    done();
                }, 1000);
                this.$refs.myscroller.finishInfinite(2);
            }
        },
        rewardLoadMore: function rewardLoadMore() {
            if (this.rewardEnd || this.rewardLoading) {
                return;
            }
            this.rewardLoading = true;
            this.rewardPage++;
            this.getRewardList();
        },
        getRewardList: function getRewardList(flag) {
            var _this12 = this;

            //获取赞赏排行榜，flag为true时，清空数据，重新获取
            if (flag) {
                this.rewardLoading = true;
                this.rewardEnd = false;
                this.rewardList = [];
                this.rewardPage = 1;
            }
            this.$http.get("/CourseDetails/admireRank", {
                params: {
                    user_id: this.teacherId,
                    page: this.rewardPage,
                    course_id: this.courseId
                }
            }).then(function (res) {
                console.log(res.body);
                _this12.rewardList = _this12.rewardList.concat(res.body.data);
                _this12.rewardLoading = false;
                if (res.body.data && res.body.data.length < 30) {
                    _this12.rewardEnd = true;
                }
            });
        },
        commentLoadMore: function commentLoadMore() {
            if (this.disconnect) {
                (0, _mintUi.Toast)(this.noconnectText);
                return;
            }
            if (this.commentLoading || this.commentIsEnd) {
                return;
            }
            this.commentLoading = true;
            if (_socketClient2.default.ws) {
                if (!this.isOfficials) {
                    this.getCommentHistory();
                }
            }
        },
        onmessage: function onmessage(msg) {
            var _this13 = this;

            var data = msg.data;
            console.log(msg);
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
                    this.unReadMsgId = data.unReadMsgId;
                    if (data.inroomstate != 10) {
                        if (this.onliveData.isAssistant == 1) {
                            this.type = 0;
                        } else {
                            this.type = 2;
                            this.noteTime();
                        }
                    } else if (this.type != 0) {
                        this.type = 1;
                    }
                    if (this.reconnectId) {
                        clearInterval(this.reconnectId);
                    }
                    setTimeout(function () {
                        _this13.loginS = true; //登陆房间成功
                    }, 2000);

                    this.disconnect = false;
                    clearInterval(this.reconnectId);
                    this.loginSuccess = true;
                    //this.forbiddenMode = data.runstate == 1;
                    /*   if (data.runstate && data.runstate == 1) {
                     Toast({ message: '已启用禁言模式', duration: 1000 });
                     }*/
                    // this.userForbiddenMode = this.forbiddenMode
                    // if (this.userForbiddenMode) {
                    //     Toast('已启用禁言模式')
                    // }
                    if (this.reconnectId) {
                        clearInterval(this.reconnectId);
                        this.reconnectId = null;
                    }
                    // if (this.forbiddenMode) {
                    //     Toast('已启用禁言模式')
                    // }
                    this.getHistory(false);
                    //this.getCommentHistory();
                    window.onbeforeunload = function () {
                        _wxfunction2.default.leaveRoom(+_this13.userId, +_this13.courseId);
                    };
                    break;
                case 2181:
                    //进入房间人数统计
                    this.studentNum = data.visitCount;
                    break;
                case 2225:
                    //
                    // if (data.status && data.status == 3 && data.runuserid == this.userId) {
                    if (data.status && data.status == 2 && data.type == 2) {
                        this.showCloseOnLiveMode = false;
                        this.popupVisible = false;
                        //this.onLiveCourse = true;

                        //   Toast({message: "权限已关闭", duration: 2000});
                        // } else if (data.status && data.status == 2 && data.runuserid == this.userId) {
                    } else if (data.status && data.status == 1 && data.type == 2) {
                        this.showCloseOnLiveMode = false;
                        this.popupVisible = false;
                        this.onLiveCourse = false;
                        //Toast({message: "权限已开启", duration: 2000});
                    }
                    break;
                case 2216:
                    //设置禁言
                    // this.userForbiddenMode = this.forbiddenMode
                    // if (this.type != 0) {
                    //     this.forbiddenMode = !this.forbiddenMode
                    // }
                    // if (this.forbiddenMode) {
                    //     Toast('已启用禁言模式')
                    // } else {
                    //     Toast('已恢复讨论')
                    // }
                    if (data.status && data.status == 1) {
                        this.forbiddenMode = true;
                    } else {
                        this.forbiddenMode = false;
                    }
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
                    if (data.errid == 2070) {
                        (0, _mintUi.Toast)("该用户已被禁言，24小时内不得重复禁言");
                        return;
                    }
                    // this.forbiddenMode = true;
                    if (data.status && data.status == 1) {
                        (0, _mintUi.Toast)({ message: "禁言成功", duration: 1000 });
                    } else {
                        (0, _mintUi.Toast)({ message: "取消禁言成功", duration: 1000 });
                    }
                    break;
                case 2231:
                    //vip 會員席位
                    this.vipMemberList = data.someVipUsers;
                    this.vipMemberTotal = data.totalInRoomVipCount;
                    console.log(this.vipMemberList);
                    break;
                case 3011:
                    //发送消息成功
                    // Toast('发送成功')
                    this.text = "";
                    break;
                case 3012:
                    //获取信息成功
                    // alert('获取消息成功')
                    if (data.msg.content.indexOf('[-') >= 0) {
                        this.isEmojiBox = false;
                        this.isEm = true;
                    }

                    this.showCommentSW = false;
                    if (this.localLoading == true) {
                        _mintUi.Indicator.close();
                    }
                    if (this.isEnd) {

                        if (data.msg.msgType == 15) {
                            //单个课程 禁用
                            var coursData = JSON.parse(data.msg.content);
                            if (coursData.status == 2) {
                                this.showCloseOnLiveMode = false;
                                this.popupVisible = false;
                                this.onLiveCourse = true;
                                (0, _mintUi.Toast)({ message: "您的直播间已被禁用，不可操作", duration: 2000 });
                            } else {
                                this.showCloseOnLiveMode = false;
                                this.popupVisible = false;
                                (0, _mintUi.Toast)({ message: "您的直播间已开启", duration: 2000 });
                            }
                            return;
                        }
                        if (data.msg.msgType === 8) {
                            // 撤回
                            this.msgs.forEach(function (val, i) {
                                if (val.msgId === parseInt(data.msg.content)) {
                                    _this13.msgs.splice(i, 1);
                                    console.log(_this13.msgs.length);
                                    $(".msg-mask").removeClass("show");
                                    $(".recall-btn .menu").removeClass("active");
                                    return true;
                                }
                            });
                        } else if (data.msg.msgType === 17) {
                            //重點
                            this.msgs.forEach(function (val, i) {
                                if (val.msgId === parseInt(data.msg.content)) {
                                    _this13.msgs[i].extendType = data.msg.extendType;
                                    //$(".msg-mask").removeClass("show");
                                    $(".recall-btn .menu").removeClass("active");
                                    return true;
                                }
                            });
                        } else {
                            //  if ( this.userId != data.msg.srcUser.userId) {/**/

                            if (data.msg.msgType == 11 || data.msg.msgType == 9 || data.msg.msgType == 10) {
                                this.msgs.push({
                                    type: data.msg.msgType ? data.msg.msgType : 0,
                                    host: this.hostId == data.msg.srcUser.userId ? 1 : 0,
                                    name: data.msg.srcUser.alias,
                                    avatar: data.msg.srcUser.head,
                                    msgId: data.msg.msgId,
                                    teacherId: data.msg.srcUser.userId,
                                    content: data.msg.msgType == 1 ? this.msgUrl + data.msg.content : JSON.parse(data.msg.content),
                                    time: this.formatDate(new Date(data.msg.msgTime * 1000)),
                                    duration: data.msg.mediaLength,
                                    idType: this.type, //用户身份
                                    extendType: data.msg.extendType,
                                    userType: data.msg.srcUser.UserType //1是助教，0不是助教
                                });
                            } else {
                                this.msgs.push({
                                    type: data.msg.msgType ? data.msg.msgType : 0,
                                    host: this.hostId == data.msg.srcUser.userId ? 1 : 0,
                                    name: data.msg.srcUser.alias,
                                    avatar: data.msg.srcUser.head,
                                    msgId: data.msg.msgId,
                                    extendType: data.msg.extendType,
                                    teacherId: data.msg.srcUser.userId,
                                    content: data.msg.msgType == 1 ? data.msg.content.indexOf("qq.com") == -1 ? data.msg.content : this.msgUrl + data.msg.content : data.msg.msgType == 16 ? JSON.parse(data.msg.content).media_id : data.msg.content,
                                    time: this.formatDate(new Date(data.msg.msgTime * 1000)),
                                    picmediaid: data.msg.msgType == 16 ? JSON.parse(data.msg.content).picmediaid : "",
                                    duration: data.msg.mediaLength,
                                    idType: this.type, //用户身份

                                    userType: data.msg.srcUser.UserType //1是助教，0不是助教
                                });

                                this.msgLastId = this.msgs.msgId;
                                console.log("3012======", this.msgs);
                            }
                            // }
                        }
                        if (data.msg.msgType == 11) {
                            //赞赏消息
                            this.rewardQue.push(JSON.parse(data.msg.content));
                        }

                        this.$nextTick(function () {
                            var lastElementChild = _this13.$refs.main.lastElementChild;
                            if ($(lastElementChild).find(".msg-content img")[0]) {
                                $(lastElementChild).find(".msg-content img")[0].onload = function () {
                                    lastElementChild.previousElementSibling.scrollIntoView();
                                };
                            }

                            lastElementChild.previousElementSibling.scrollIntoView();
                        });
                    } else if (this.type != 2) {
                        // to do
                        this.msgs.push({
                            type: data.msg.msgType ? data.msg.msgType : 0,
                            host: this.hostId == data.msg.srcUser.userId ? 1 : 0,
                            name: data.msg.srcUser.alias,
                            avatar: data.msg.srcUser.head,
                            //                                content: data.msg.msgType == 1 ? this.msgUrl + data.msg.content : data.msg.content,
                            content: data.msg.msgType == 1 ? data.msg.content.indexOf("qq.com") == -1 ? data.msg.content : this.msgUrl + data.msg.content : data.msg.msgType == 16 ? JSON.parse(data.msg.content).media_id : data.msg.content,
                            time: this.formatDate(new Date(data.msg.msgTime * 1000)),
                            extendType: data.msg.extendType,
                            picmediaid: data.msg.msgType == 16 ? JSON.parse(data.msg.content).picmediaid : "",
                            duration: data.msg.mediaLength,
                            idType: this.type, //用户身份
                            userType: data.msg.srcUser.UserType //1是助教，0不是助教
                        });
                        this.firstHostGetMsg = true;
                        // wxfun.getMsgHis(
                        //   this.userId,
                        //   this.$route.params.courseId,
                        //   data.msg.msgId,
                        //   true,
                        //   true
                        // );
                        if (data.msg.msgType != 8) {
                            this.$nextTick(function () {
                                var lastElementChild = _this13.$refs.main.lastElementChild;
                                if ($(lastElementChild).find(".msg-content img")[0]) {
                                    $(lastElementChild).find(".msg-content img")[0].onload = function () {
                                        lastElementChild.previousElementSibling.scrollIntoView();
                                    };
                                }

                                lastElementChild.previousElementSibling.scrollIntoView();
                            });
                        }
                        console.log("this.msgs3012++++", this.msgs);
                    }
                    setTimeout(function () {
                        _this13.returnLast(); //滚动到最底部
                    }, 10);
                    break;
                case 3017:
                    // 获取历史消息成功
                    //Toast({ message: '获取历史消息成功', duration: 1000 })
                    if (data.courseInfo != undefined) {
                        this.banner = JSON.parse(data.courseInfo).pics;
                    }
                    this.load3017 = true;
                    if (data.msgs) {
                        if (this.firstHostGetMsg) {
                            this.firstHostGetMsg = false;
                            console.log("historyData", data);
                            var tmpObj = this.msgs[this.msgs.length - 1];
                            this.msgs.length = 0;
                            this.msgs.push(tmpObj);
                            for (var _i = 0, _len = data.msgs.length; _i < _len; _i++) {
                                if (data.msgs[_i].msgType != 7) {
                                    this.msgs.unshift({
                                        type: data.msgs[_i].msgType ? data.msgs[_i].msgType : 0,
                                        host: this.hostId == data.msgs[_i].srcUser.userId ? 1 : 0,
                                        name: data.msgs[_i].srcUser.alias,
                                        msgId: data.msgs[_i].msgId,
                                        teacherId: data.msgs[_i].srcUser.userId,
                                        avatar: data.msgs[_i].srcUser.head,
                                        extendType: data.msgs[_i].extendType,
                                        content: data.msgs[_i].msgType == 16 ? JSON.parse(data.msgs[_i].content).media_id : data.msgs[_i].content,
                                        picmediaid: data.msgs[_i].msgType == 16 ? JSON.parse(data.msgs[_i].content).picmediaid : "",
                                        time: this.formatDate(new Date(data.msgs[_i].msgTime * 1000)),
                                        duration: data.msgs[_i].mediaLength,
                                        idType: this.type, //用户身份
                                        userType: data.msgs[_i].srcUser.UserType //1是助教，0不是助教
                                    });
                                } else {
                                    var _msgs$unshift;

                                    this.msgs.unshift((_msgs$unshift = {
                                        type: data.msgs[_i].msgType,
                                        msgId: data.msgs[_i].msgId,
                                        teacherId: data.msgs[_i].srcUser.userId,
                                        extendType: data.msgs[_i].extendType,
                                        picmediaid: data.msgs[_i].msgType == 16 ? JSON.parse(data.msgs[_i].content).picmediaid : "",
                                        content: data.msgs[_i].msgType == 16 ? JSON.parse(data.msgs[_i].content).media_id : data.msgs[_i].content
                                    }, _defineProperty(_msgs$unshift, 'msgId', data.msgs[_i].msgId), _defineProperty(_msgs$unshift, 'idType', this.type), _msgs$unshift));
                                }
                            }

                            this.$nextTick(function () {
                                var lastElementChild = _this13.$refs.main.lastElementChild;
                                if ($(lastElementChild).find(".msg-content img")[0]) {
                                    $(lastElementChild).find(".msg-content img")[0].onload = function () {
                                        lastElementChild.scrollIntoView();
                                    };
                                }
                                lastElementChild.scrollIntoView();
                            });
                            return;
                        }
                        console.log('8888888888');
                        //this.isEnd = true;
                        var index = this.msgs.length - 1;
                        for (var i = 0, len = data.msgs.length; i < len; i++) {
                            if (/^(9|10|11)$/.test(data.msgs[i].msgType + "")) {
                                if (data.msgs[i].msgType == 11) {
                                    this.msgs.splice(index + 1, 0, {
                                        type: data.msgs[i].msgType || 0,
                                        content: JSON.parse(data.msgs[i].content),
                                        picmediaid: data.msgs[i].msgType == 16 ? JSON.parse(data.msgs[i].content).picmediaid : "",
                                        time: this.formatDate(new Date(data.msgs[i].msgTime * 1000)),
                                        msgId: data.msgs[i].msgId,
                                        extendType: data.msgs[i].extendType,
                                        // teacherId: data.msgs[i].srcUser.userId,
                                        duration: data.msgs[i].duration
                                    });
                                } else {
                                    this.msgs.splice(index + 1, 0, {
                                        type: data.msgs[i].msgType || 0,
                                        content: data.msgs[i].msgType == 16 ? JSON.parse(data.msgs[i].content).media_id : JSON.parse(data.msgs[i].content),
                                        time: this.formatDate(new Date(data.msgs[i].msgTime * 1000)),
                                        msgId: data.msgs[i].msgId,
                                        extendType: data.msgs[i].extendType,
                                        teacherId: data.msgs[i].srcUser.userId,
                                        picmediaid: data.msgs[i].msgType == 16 ? JSON.parse(data.msgs[i].content).picmediaid : "",
                                        name: data.msgs[i].srcUser.alias,
                                        avatar: data.msgs[i].srcUser.head,
                                        duration: data.msgs[i].duration,
                                        host: this.hostId == data.msgs[i].srcUser.userId ? 1 : 0,
                                        userType: data.msgs[i].srcUser.UserType, //1是助教，0不是助教
                                        idType: this.type //用户身份
                                    });
                                }
                            } else {
                                if (this.isRefresh == true) {
                                    //是否为上拉加载已读消息
                                    if (data.msgs[i].msgType != 7) {
                                        this.msgs.unshift({
                                            type: data.msgs[i].msgType ? data.msgs[i].msgType : 0,
                                            host: this.hostId == data.msgs[i].srcUser.userId ? 1 : 0,
                                            name: data.msgs[i].srcUser.alias,
                                            avatar: data.msgs[i].srcUser.head,
                                            picmediaid: data.msgs[i].msgType == 16 ? JSON.parse(data.msgs[i].content).picmediaid : "",
                                            msgId: data.msgs[i].msgId,
                                            extendType: data.msgs[i].extendType,
                                            teacherId: data.msgs[i].srcUser.userId,
                                            content: data.msgs[i].msgType == 16 ? JSON.parse(data.msgs[i].content).media_id : data.msgs[i].content,
                                            time: this.formatDate(new Date(data.msgs[i].msgTime * 1000)),
                                            duration: data.msgs[i].mediaLength,
                                            idType: this.type, //用户身份
                                            userType: data.msgs[i].srcUser.UserType //1是助教，0不是助教
                                        });
                                    } else {
                                        this.msgs.unshift(_defineProperty({
                                            type: data.msgs[i].msgType,
                                            msgId: data.msgs[i].msgId,
                                            picmediaid: data.msgs[i].msgType == 16 ? JSON.parse(data.msgs[i].content).picmediaid : "",
                                            teacherId: data.msgs[i].srcUser.userId,
                                            content: data.msgs[i].msgType == 16 ? JSON.parse(data.msgs[i].content).media_id : data.msgs[i].content
                                        }, 'msgId', data.msgs[i].msgId));
                                    }
                                } else {
                                    if (data.msgs[i].msgType != 7) {
                                        this.msgs.splice(index + 1, 0, {
                                            type: data.msgs[i].msgType ? data.msgs[i].msgType : 0,
                                            host: this.hostId == data.msgs[i].srcUser.userId ? 1 : 0,
                                            name: data.msgs[i].srcUser.alias,
                                            avatar: data.msgs[i].srcUser.head,
                                            picmediaid: data.msgs[i].msgType == 16 ? JSON.parse(data.msgs[i].content).picmediaid : "",
                                            msgId: data.msgs[i].msgId,
                                            extendType: data.msgs[i].extendType,
                                            teacherId: data.msgs[i].srcUser.userId,
                                            content: data.msgs[i].msgType == 16 ? JSON.parse(data.msgs[i].content).media_id : data.msgs[i].content,
                                            time: this.formatDate(new Date(data.msgs[i].msgTime * 1000)),
                                            duration: data.msgs[i].mediaLength,
                                            idType: this.type, //用户身份
                                            userType: data.msgs[i].srcUser.UserType //1是助教，0不是助教
                                        });
                                    } else {
                                        this.msgs.splice(index + 1, 0, _defineProperty({
                                            type: data.msgs[i].msgType,
                                            msgId: data.msgs[i].msgId,
                                            picmediaid: data.msgs[i].msgType == 16 ? JSON.parse(data.msgs[i].content).picmediaid : "",
                                            teacherId: data.msgs[i].srcUser.userId,
                                            content: data.msgs[i].msgType == 16 ? JSON.parse(data.msgs[i].content).media_id : data.msgs[i].content
                                        }, 'msgId', data.msgs[i].msgId));
                                    }
                                }
                            }
                        }
                        this.msgLastId = data.msgs[0].msgId;
                        console.log("this.msgLastId", this.msgLastId);
                        this.loading = false;
                        if (data.msgs.length < 10) {
                            this.isEnd = true;
                        }
                        console.log("this.msgs3017", this.msgs);
                    } else {
                        this.isEnd = true;
                    }
                    /*	this.$nextTick(() => {
                     this.returnLast(); //页面滚动到最底部
                     });*/
                    /* if(this.isMsgId==false){
                     console.log('模拟滚动');
                     console.log(this.unReadMsgId)
                     var msgId =this.unReadMsgId-1
                     if(this.unReadMsgId!=''){
                     setTimeout(function () {
                     console.log(msgId)
                     var h5 =$("#msgId"+msgId).offset().top;
                     console.log(h5)
                     $('.onlivepage-container').scrollTop(h5);
                     },1500)
                     }
                     this.isMsgId =true;
                     }*/

                    break;
                case 3055:
                    //
                    if (data.optType != 2) {
                        this.banner = data.vecpics;
                        // for (var i = 0; i < this.banner.length; i++) {
                        // 	this.banner[i].picurl =
                        // 		"http://oqt46pvmm.bkt.clouddn.com/" + this.banner[i].picId;
                        // }
                    } else {
                        var cancelItem = data.vecpics;
                        for (var i = 0; i < this.banner.length; i++) {
                            var id = this.banner[i].picId;
                            if (id == cancelItem[0].picId) {
                                this.banner.splice(i, 1);
                            }
                        }
                    }
                    break;
                case 3021:
                    //发送评论成功
                    // Toast('发送成功')
                    this.answerComment = false;
                    this.answerText = "";
                    this.commentText = "";
                    this.goWall = true;
                    break;
                case 3022:
                    //评论接收成功
                    if (data.msg.content.indexOf('[-') >= 0) {
                        this.isEmojiBox = false;
                        this.isEm = true;
                    }
                    if (data.msg.msgType === 8) {
                        this.comments.forEach(function (val, i) {
                            if (val.msgId === parseInt(data.msg.content)) {
                                _this13.comments.splice(i, 1);
                                return true;
                            }
                        });
                    } else {
                        if (data.msg.mastermsgId == undefined) {
                            this.comments.unshift({
                                name: data.msg.srcUser.alias,
                                avatar: data.msg.srcUser.head || "/images/default/userDefault.png",
                                content: data.msg.content,
                                time: this.formatDate(new Date(data.msg.msgTime * 1000)),
                                type: data.msg.srcUser.roleType != 10 ? 2 : data.msg.srcUser.userId == this.hostId ? 0 : 1, //评论类型  0为老师  1为嘉宾  2为学生
                                msgId: data.msg.msgId,
                                userId: data.msg.srcUser.userId,
                                mastermsgId: data.msg.mastermsgId,
                                isAssistant: data.msg.srcUser.UserType
                            });
                        } else {
                            for (var _i2 = this.comments.length - 1; _i2 >= 0; _i2--) {
                                if (this.comments[_i2].mastermsgId == data.msg.mastermsgId || this.comments[_i2].msgId == data.msg.mastermsgId) {
                                    this.comments.splice(_i2 + 1, 0, {
                                        name: data.msg.srcUser.alias,
                                        avatar: data.msg.srcUser.head || "/images/default/userDefault.png",
                                        content: data.msg.content,
                                        time: this.formatDate(new Date(data.msg.msgTime * 1000)),
                                        type: data.msg.srcUser.roleType != 10 ? 2 : data.msg.srcUser.userId == this.hostId ? 0 : 1, //评论类型  0为老师  1为嘉宾  2为学生
                                        msgId: data.msg.msgId,
                                        userId: data.msg.srcUser.userId,
                                        mastermsgId: data.msg.mastermsgId,
                                        isAssistant: data.msg.srcUser.UserType == 1
                                    });
                                    break;
                                }
                            }
                        }
                        this.commentCount++;
                    }
                    console.log("this.comment3022", this.comments);
                    break;
                case 3027:
                    //获取聊天室消息成功
                    // console.log(msg)
                    this.commentCount = data.hisMsgCount ? data.hisMsgCount : 0;
                    if (data.msgs) {
                        for (var i = 0, len = data.msgs.length; i < len; i++) {
                            if (data.msgs[i].mastermsgId == undefined) {
                                this.comments.push({
                                    name: data.msgs[i].srcUser.alias,
                                    avatar: data.msgs[i].srcUser.head || "/images/default/userDefault.png",
                                    content: data.msgs[i].content,
                                    time: this.formatDate(new Date(data.msgs[i].msgTime * 1000)),
                                    type: data.msgs[i].srcUser.roleType != 10 ? 2 : data.msgs[i].srcUser.userId == this.hostId ? 0 : 1, //评论类型  0为老师  1为嘉宾  2为学生
                                    msgId: data.msgs[i].msgId,
                                    userId: data.msgs[i].srcUser.userId,
                                    mastermsgId: data.msgs[i].mastermsgId,
                                    isAssistant: data.msgs[i].srcUser.UserType
                                });
                            }
                        }
                        for (var _i3 = 0, _len2 = data.msgs.length; _i3 < _len2; _i3++) {
                            if (data.msgs[_i3].mastermsgId != undefined) {
                                for (var j = 0, length = this.comments.length; j < length; j++) {
                                    if (this.comments[j].msgId == data.msgs[_i3].mastermsgId) {
                                        this.comments.splice(j + 1, 0, {
                                            name: data.msgs[_i3].srcUser.alias,
                                            avatar: data.msgs[_i3].srcUser.head || "/images/default/userDefault.png",
                                            content: data.msgs[_i3].content,
                                            time: this.formatDate(new Date(data.msgs[_i3].msgTime * 1000)),
                                            type: data.msgs[_i3].srcUser.roleType != 10 ? 2 : data.msgs[_i3].srcUser.userId == this.hostId ? 0 : 1, //评论类型  0为老师  1为嘉宾  2为学生
                                            msgId: data.msgs[_i3].msgId,
                                            userId: data.msgs[_i3].srcUser.userId,
                                            mastermsgId: data.msgs[_i3].mastermsgId,
                                            isAssistant: data.msgs[_i3].srcUser.UserType == 1
                                        });
                                        break;
                                    }
                                }
                            }
                        }
                        this.commentLastId = data.msgs[data.msgs.length - 1].msgId;
                        this.commentLoading = false;
                        if (data.msgs.length < 20) {
                            this.commentIsEnd = true;
                        }
                        console.log("this.comments3027", this.comments);
                    } else {
                        this.commentIsEnd = true;
                    }
                    break;

                case 4005:
                    //抢红包反馈
                    _mintUi.Indicator.close();
                    if (data.errInfo) {
                        switch (data.errInfo.errID) {
                            case 2034:
                                if (this.answerRedPacket == true) {
                                    (0, _mintUi.Toast)({
                                        message: "口令错误，请重新输入~",
                                        duration: 1000,
                                        className: "redpacket-toast"
                                    });
                                    this.answerText = "";
                                } else {
                                    this.answerRedPacket = true;
                                }
                                this.disabled = true;
                                return;
                                break;
                            case 2030:
                                (0, _mintUi.Toast)({
                                    message: '\u5F00\u62A2\u65F6\u95F4\uFF1A' + this.timestampToDate("Y年m月d日 H:i", data.fixTime + ""),
                                    duration: 2000,
                                    className: "obtain-time-toast"
                                });
                                this.disabled = true;
                                return;
                                break;
                            case 2018:
                                this.$router.push("/redpacketDetails/" + this.nowTakingPacketId);
                                break;
                            case 2015:
                                this.$router.push("/redpacketDetails/" + this.nowTakingPacketId);
                                /*  Toast({ message: '红包已被抢完，请期待下一个~', duration: 1500 });*/
                                break;
                            case 2014:
                                (0, _mintUi.Toast)({ message: "本红包已过期了哦，请期待下一个~", duration: 1000 });
                                break;
                        }
                    } else {
                        this.answerRedPacket = false;
                        this.redpacketMoney = data.money / 100;
                        this.showRedPacket = true;
                        if (this.showRedPacket) {
                            setTimeout(function () {
                                _this13.showRedPacket = false;
                            }, 2000);
                        }
                    }
                    break;
            }
        },
        recordHistory: function recordHistory() {
            this.$http.post(this.hostUrl + "/CourseDetails/history", {
                user_id: this.userId,
                id: this.courseId
            }, { emulateJSON: true }).then(function (res) {
                console.log("/CourseDetails/history", res);
            });
        },
        getData: function getData() {
            var _this14 = this;

            this.$http.post(this.hostUrl + "/CourseDetails/liveing", {
                user_id: this.userId,
                id: this.courseId
            }, { emulateJSON: true }).then(function (res) {
                //                	alert(this.isWeiXin);
                _this14.onliveData = res.body.data;
                _this14.$store.dispatch("getSdkData", function (res) {
                    _this14.config();
                });
                _this14.isOfficial();
                if (parseInt(_this14.userId) == parseInt(_this14.onliveData.uid)) {
                    _this14.isShowGify = false;
                }
                _this14.hostId = _this14.onliveData.uid;
                _this14.onliveData.head_add = _this14.onliveData.head_add || "/images/default/userDefault.png";
                //vip进场特效
                /*if (res.body.data.popupWindow == 1) {//1弹 0不弹
                    if (this.userLevel != 0) {
                        setTimeout(() => {
                            this.showVipAnimate = true;
                        }, 400)
                        setTimeout(() => {
                            this.showVipAnimate = false;
                        }, 3400);
                    }
                }*/
                if (_this14.onliveData.open_status == 2 || _this14.onliveData.live_open_status == 2 || _this14.onliveData.freeze == 1) {
                    _this14.$router.replace("/forbidden/3");
                } else if (_this14.onliveData.status == 5) {
                    _this14.$router.replace("/personalCenter");
                }
                if (_this14.onliveData.isAssistant == 1) {
                    _this14.type = 0;
                }
                // this.updateTitle(this.$limit(this.onliveData.class_name, 7))
                _this14.$store.commit("setTitle", _this14.$limit(_this14.onliveData.class_name, 7));
                _this14.liveStatusEnd = _this14.onliveData.status == 4 ? true : false;
                if (_this14.hostId == _this14.userId) {
                    _this14.type = 0;
                } else {
                    _this14.recordHistory();
                }

                _this14.connect();

                setTimeout(function () {
                    _this14.loginS = true; //登陆房间成功
                }, 2000);
                // this.$refs.header.style.backgroundImage = "url('" + this.onliveData.src_img + "')"
            });
        },
        connect: function connect() {
            var _this15 = this;

            _socketClient2.default.connect(this.userId, this.onliveData.code ? this.onliveData.code : "", this.courseId, this.onmessage, function () {
                // alert('断开了')
                if (location.hash.indexOf("/pptOnlive/") != -1) {
                    (0, _mintUi.Toast)("网络中断，请稍后再试");
                    if (_this15.localLoading == true) {
                        _mintUi.Indicator.close();
                    }
                    console.log("重连中");
                    _this15.disconnect = true;
                    if (_this15.reconnectId == null) {
                        _this15.reconnectId = setInterval(function () {
                            wx.getNetworkType({
                                success: function success(res) {
                                    console.log(res);
                                    if (_this15.reconnectId != null) {
                                        _this15.connect();
                                    }
                                    // alert(JSON.stringify(res)) // 返回网络类型2g，3g，4g，wifi
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
        formatDate: function formatDate(obj) {
            function f(num) {
                return num > 9 ? num + "" : "0" + num;
            }

            return f(obj.getMonth() + 1) + "-" + f(obj.getDate()) + " " + f(obj.getHours()) + ":" + f(obj.getMinutes());
        },
        pcSendPic: function pcSendPic(ev) {
            var _this16 = this;

            if (window.FileReader) {
                var files = ev.target.files;
                var reader = new FileReader();
                reader.readAsDataURL(files[0]);
                reader.onload = function (e) {
                    console.log("files[0]", files[0]);
                    var imgReg = /\.(gif|jpg|jpeg|png|GIF|JPG|PNG)$/;
                    if (imgReg.test(files[0].name)) {
                        //匹配图片
                        _this16.update(files[0], _this16.pcImageUrl, true);
                        _this16.tabberActive = 0;
                    } else {
                        (0, _mintUi.Toast)("请上传图片");
                    }
                    console.log("this.pcImageauarl", _this16.pcImageUrl);
                };
            }
        },

        //上传到七牛
        update: function update(e, images, bool) {
            var _this17 = this;

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
            this.$http.post(this.hostUrl + "/Index/getUploadToken", { emulateJSON: true }).then(function (response) {
                _this17.token = response.body.data;
                param.append("token", _this17.token);
                _this17.uploading(param, file.name, images, bool); //然后将参数上传七牛
                return;
            });
        },
        uploading: function uploading(param, pathName, images, bool) {
            var _this18 = this;

            this.$http.post("http://up-z2.qiniu.com", param, { emulateJSON: true }).then(function (response) {
                console.log("response.data", response.data);
                if (bool) {
                    _this18.pcImageUrl = _this18.qiNiuDomain + response.data.key;
                    console.log("pcImageUrl", _this18.pcImageUrl);
                    //上传图片通知C++
                    _wxfunction2.default.sendImagea(_this18.userId, _this18.courseId, _this18.qiNiuDomain + response.data.key, true);
                } else {
                    var localArr = images.map(function (val, index, arr) {
                        return arr[index].localSrc;
                    });
                    if (!~localArr.indexOf(pathName)) {
                        images.push({
                            src: _this18.qiNiuDomain + response.data.key,
                            explain: "",
                            type: 2
                        });
                    } else {
                        (0, _mintUi.Toast)("图片重复啦");
                    }
                }
            });
        },
        tabberClick: function tabberClick(n) {
            var _this19 = this;

            if (this.onLiveCourse == true) {
                (0, _mintUi.Toast)({ message: "您的直播间已被禁用，不可操作", duration: 2000 });
                return;
            }
            if (this.tabberActive == 1 && n != 1 && this.isRecording != 0) {
                this.cancelRecord();
                this.gotoTabNum = 0;
                return;
            }
            if (n == 3) {
                // 图片操作
                this.tabberActive = 3;
                if (this.disconnect) {
                    (0, _mintUi.Toast)(this.noconnectText);
                    return;
                }
                console.log(this.isWeiXin);
                if (this.isWeiXin) {
                    wx.chooseImage({
                        count: 1, // 默认9
                        sizeType: ["original", "compressed"], // 可以指定是原图还是压缩图，默认二者都有
                        sourceType: ["album", "camera"], // 可以指定来源是相册还是相机，默认二者都有
                        success: function success(res) {
                            _this19.images.localId = res.localIds[0]; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
                            // alert(this.images.localId)
                            // alert('已选择 ' + res.localIds.length + ' 张图片');
                            // alert(this.images.localId);
                            _this19.uploadImage();
                            // ws.send(123123);
                            _this19.tabberActive = 0;
                        }
                    });
                }
                return;
            }

            if (n == 5) {
                this.tabberActive = 5;
                this.showedit = true;
            }
            if (this.tabberActive == n) {
                this.tabberActive = 0;
            } else {
                this.tabberActive = n;
                if (n == 4) {
                    this.tabberActive = 0;
                    this.popupVisible = true;
                }
            }
        },
        upload: function upload() {
            var _this20 = this;

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
                    _this20.images.serverId = res.serverId;
                    // document.getElementById("text").appendChild(document.createElement('pre')).innerHTML = 'http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=' + accessToken + '&media_id=' + this.images.serverId;
                    // ws.send('http://file.api.weixin.qq.com/cgi-bin/media/get?access_token='+accessToken+'&media_id='+images.serverId);
                    // if (i < length) {
                    //   upload();
                    // }
                    _wxfunction2.default.sendImagea(_this20.userId, _this20.courseId, _this20.images.serverId);
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

        // getSignPackage() {
        //     this.$http.post(this.hostUrl + '/Jssdk/getSignPackage/', { user_id: this.userId, url: location.href }, { emulateJSON: true }).then(res => {
        //         console.log(JSON.stringify(res.body))
        //         this.wxconfig(res.body.data)
        //         wx.onVoiceRecordEnd({
        //             complete: (res) => {
        //                 this.voice.localId = res.localId;
        //                 // alert('语音时间已超过一分钟');
        //                 this.isRecording = 2
        //             }
        //         })
        //     })
        // },
        cancelRecord: function cancelRecord() {
            this.dropRecord = true;
        },
        uploadVoice: function uploadVoice() {
            var _this21 = this;

            // if (this.voice.localId == '') {
            // alert('请先上传一段语音');
            //     return;
            // }
            wx.uploadVoice({
                localId: this.voice.localId.toString(),
                isShowProgressTips: 0, // 默认为1，显示进度提示
                success: function success(res) {
                    // alert('上传语音成功');
                    _this21.isrecord = true;
                    _this21.isRecording = 0;
                    _this21.voice.localId = "";
                    _this21.voice.serverId = res.serverId;
                    clearInterval(_this21.timeId);
                    // window.now = new Date()
                    _this21.localLoading = true;
                    _wxfunction2.default.sendVoice(_this21.userId, _this21.courseId, _this21.voice.serverId, _this21.recordingDuration, 16, _this21.picmediaid, _this21.isConcentrate);
                    _this21.isConcentrate = 0;
                    _this21.recordingDuration = 0;
                    _this21.tabberActive = 0;
                    _this21.showCommentSW = false;
                    // console.log('http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=' + accessToken + '&media_id=' + this.voice.serverId);
                    // document.getElementById("text").appendChild(document.createElement('pre')).innerHTML = 'http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=' + accessToken + '&media_id=' + this.voice.serverId;
                    // ws.send('http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=' + accessToken + '&media_id=' + this.voice.serverId);
                },
                fail: function fail(res) {
                    (0, _mintUi.Toast)({ message: "网络繁忙，上传失败", duration: 2000 });
                    _this21.isRecording = 0;
                    clearInterval(_this21.timeId);
                    _this21.recordingDuration = 0;
                    _mintUi.Indicator.close();
                }
            });
        },
        recording: function recording() {
            var _this22 = this;

            // 点击录音按钮
            //  var isAndroid = u.indexOf("Android") > -1 || u.indexOf("Adr") > -1; //android终端
            //  var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端
            var remouch = 0;

            this.getPicId();
            if (this.disconnect) {
                (0, _mintUi.Toast)(this.noconnectText);
                return;
            }
            if (this.isRecording == 0) {
                this.isrecord = false;
                remouch = 0;
                wx.startRecord({
                    success: function success() {
                        _this22.isRecording = 1;
                        _this22.timeId = setInterval(function () {
                            _this22.recordingDuration++;
                            if (_this22.recordingDuration == 59) {
                                clearInterval(_this22.timeId);
                                // this.isRecording = 2
                                wx.stopRecord({
                                    success: function success(res) {
                                        if (_this22.voice.localId == "") {
                                            _this22.voice.localId = res.localId;
                                        }
                                        clearInterval(_this22.timeId);
                                        _this22.isRecording = 2;
                                    },
                                    fail: function fail(res) {
                                        // alert(JSON.stringify(res));
                                    }
                                });
                            }
                        }, 1000);
                    },
                    cancel: function cancel() {
                        _this22.isRecording = 0;
                        clearInterval(_this22.timeId);
                        // alert('用户拒绝授权语音')
                        _this22.recordingDuration = 0;
                    }
                });
            } else if (this.isRecording == 1) {
                remouch++;
                if (remouch == 1) {
                    wx.stopRecord({
                        success: function success(res) {
                            if (_this22.voice.localId == "") {
                                _this22.voice.localId = res.localId;
                            }
                            clearInterval(_this22.timeId);
                            _this22.isRecording = 2;
                        },
                        fail: function fail(res) {
                            (0, _mintUi.Toast)({ message: "录制失败，请重试", duration: 2000 });
                            _this22.isRecording = 0;
                            clearInterval(_this22.timeId);
                            _this22.recordingDuration = 0;
                        }
                    });
                } else {
                    this.isRecording = 2;
                }
            } else {
                if (this.recordingDuration >= 1) {
                    clearInterval(this.timeId);

                    if (this.isEnd) {
                        // this.msgs.push({
                        //   host: this.onliveData.uid == this.userId ? 1 : 0, //this.type == 0 ? 1 : 0
                        //   type: 16, //ppt类型
                        //   idType: this.type,
                        //   name: this.username,
                        //   avatar: this.userAvatar,
                        //   local: true,
                        //   content: this.voice.localId.toString(),
                        //   time: this.format(new Date()),
                        //   duration: this.recordingDuration,
                        //   userType: this.onliveData.isAssistant,
                        //   picmediaid: this.picmediaid  //ppt 图片id
                        // });
                        // this.$nextTick(() => {
                        //   this.$refs.main.lastElementChild.scrollIntoView();
                        // });
                    }
                    _mintUi.Indicator.open();
                    this.uploadVoice();
                } else {
                    (0, _mintUi.Toast)({ message: "语音时长至少为1秒", duration: 1000 });
                    this.isRecording = 0;
                    clearInterval(this.timeId);
                    this.recordingDuration = 0;
                }
            }
        },
        format: function format(obj) {
            function f(num) {
                return num > 9 ? num + "" : "0" + num;
            }

            return obj.getFullYear() + "-" + f(obj.getMonth() + 1) + "-" + f(obj.getDate()) + " " + f(obj.getHours()) + ":" + f(obj.getMinutes()) + ":" + f(obj.getSeconds());
        },
        dropRecording: function dropRecording() {
            var _this23 = this;

            //抛弃录音
            wx.stopRecord({
                success: function success(res) {
                    clearInterval(_this23.timeId);
                    _this23.voice.localId = "";
                    _this23.isRecording = 0;
                    _this23.recordingDuration = 0;
                },
                fail: function fail(res) {
                    // alert(JSON.stringify(res));
                }
            });
            clearInterval(this.timeId);
            this.isRecording = 0;
            this.recordingDuration = 0;
            this.dropRecord = false;
            this.voice.localId = "";
            if (this.gotoTabNum != -1) {
                if (this.gotoTabNum == -2) {
                    this.tabberActive = 0;
                    this.showCommentRoom = true;
                } else {
                    // this.tabberClick(this.gotoTabNum)
                }
                this.gotoTabNum = -1;
            }
        },
        cancelMask: function cancelMask() {
            this.isEmojiBox = false;
            this.isEm = true;
            if (this.isRecording == 0) {
                this.tabberActive = 0;
            } else {
                this.dropRecord = true;
                this.gotoTabNum = 0;
            }
        },
        sendText: function sendText(e) {
            if (this.text.trim() == "") {
                e.target.previousElementSibling.focus();
            } /*else if (this.$bytesLength(this.text.trim()) > 200) {
              Toast({message: "文字字数不得大于100", duration: 1000});
              }*/else if (this.disconnect) {
                    (0, _mintUi.Toast)(this.noconnectText);
                } else {
                    _wxfunction2.default.sendMessage(this.userId, this.courseId, this.text.trim(), 0, this.isConcentrate);
                    this.isConcentrate = 0;
                }
        },
        focusSendText: function focusSendText(e) {
            e.target.scrollIntoView();
        },
        loseFocus: function loseFocus() {
            var _this24 = this;

            setTimeout(function () {
                if (_this24.commentText.length <= 0) {
                    _this24.isFocus = false;
                }
                _this24.showCommentSW = false;
            }, 100);
        },
        focus: function focus(e) {
            var _this25 = this;

            if (this.onLiveCourse == true) {
                e.target.blur();
                (0, _mintUi.Toast)({ message: "您的直播间已被禁用，不可操作", duration: 2000 });
                return;
            }
            if (this.forbiddenMode) {
                e.target.blur();
                if (this.canTap) {
                    this.canTap = false;
                    setTimeout(function () {
                        _this25.canTap = true;
                    }, 3000);
                    (0, _mintUi.Toast)("您已被禁言或讲师已启用禁言模式");
                }
            } else {
                scroll(0, document.body.scrollHeight);
                // e.target.scrollIntoViewIfNeeded()
                e.target.scrollIntoView();
                setTimeout(function () {

                    _this25.isFocus = true;
                }, 200);
            }
        },
        commentmasktap: function commentmasktap(e) {
            e.target.previousElementSibling.blur();
        },
        sendComment: function sendComment(e) {
            if (this.disconnect) {
                (0, _mintUi.Toast)(this.noconnectText);
                return;
            }
            if (this.commentText.trim() == "") {
                e.target.previousElementSibling.focus();
            } else if (this.forbiddenMode) {
                (0, _mintUi.Toast)("您已被禁言或讲师已启用禁言模式");
            } /*else if (this.$bytesLength(this.commentText.trim()) > 200) {
              Toast({message: "评论字数不得大于100", duration: 1000});
              }*/else {
                    this.showCommentSW = false;
                    this.isFocus = false;
                    _mintUi.Indicator.open();
                    //发表评论
                    _wxfunction2.default.sendTalkMessage(this.userId, this.courseId, this.commentText);
                    setTimeout(function () {
                        _mintUi.Indicator.close();
                        (0, _mintUi.Toast)({
                            message: '留言成功',
                            iconClass: 'icon icon-success',
                            duration: 3000
                        });
                    }, 2000);
                }
        },
        finishCourse: function finishCourse() {
            if (this.disconnect) {
                (0, _mintUi.Toast)(this.noconnectText);
                return;
            }
            _wxfunction2.default.overLive(this.userId, this.courseId);
        },
        noteTime: function noteTime() {
            /*this.$http
             .post(
             this.hostUrl + "/User/addHitRecord",
             {
             type: 1,
             id: +this.courseId
             },
             {emulateJSON: true}
             )
             .then(res => {
             console.log(JSON.parse(res.body));
             });*/
        },
        change: function change() {
            if (this.disconnect) {
                (0, _mintUi.Toast)(this.noconnectText);
                return;
            }
            console.log("changed", this.forbiddenMode);
            _wxfunction2.default.forbidUserChat(this.userId, this.courseId, this.forbiddenMode ? 1 : 0);
        },
        closeOnLivechange: function closeOnLivechange() {
            //助教禁用直播间
            console.log("closeOnLiveMode", this.closeOnLiveMode);
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
            if (this.isRecording == 0) {
                this.tabberActive = 0;
                this.chatroomOptions = numStr;
                this.showCommentRoom = true;
            } else {
                this.dropRecord = true;
                this.gotoTabNum = -1;
            }
            this.emClick(1);
        }
    },
    watch: {
        comments: function comments(val) {
            //右下角评论区渐变效果
            console.log('comments', val);
            $('#mini-comment-list').addClass('list-opacity');
            setTimeout(function () {
                $('#mini-comment-list').removeClass('list-opacity');
            }, 10000);
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
        answerText: function answerText(s) {
            if (s.length > 0) {
                this.disabled = false;
            }
            var pattern = new RegExp("[`~!@#$^&*()=|{}':;',\\[\\].<>/?~！@#￥……&*（）——|{}【】《》‘；：”“'。，、？%+_-]");
            var rs = "";
            for (var i = 0; i < s.length; i++) {
                rs = rs + s.substr(i, 1).replace(pattern, "");
            }

            var ranges = ['\uD83C[\uDF00-\uDFFF]', '\uD83D[\uDC00-\uDE4F]', '\uD83D[\uDE80-\uDEFF]'];
            this.answerText = rs.replace(new RegExp(ranges.join("|"), "g"), "");

            // console.log(this.answerText);
        },
        sheetVisible: function sheetVisible(val) {
            if (!val) {
                this.tabberActive = 0;
            }
        },
        popupVisible: function popupVisible(val) {
            if (!val) {
                this.tabberActive = 0;
            }
        },
        showCommentRoom: function showCommentRoom(val) {
            if (val) {
                this.getRewardList(true);
            }
        },
        rewardVisible: function rewardVisible(val) {
            if (val === false) {
                this.giftOptions = -1;
            }
        },
        rewardQue: function rewardQue(value) {
            console.log('this.rewardQue', value);
            if (!this.rewardShowing && value.length > 0) {
                var append = function append() {
                    $header.append(template);
                    for (var i = 0; i < arr.length; i++) {
                        $('.reward-toast .num').append('<span class="nn" style="background-image:url(\'/images/1.9/' + arr[i] + '_icon.png\')"></span>');
                    }
                    _setTimeout(function () {
                        var $reward = $('.reward-toast:last-of-type');
                        $reward.css('transform', 'translateX(0px)');
                        if (value.length > 1) {
                            _setTimeout(function () {
                                $reward.css('transform', 'translateY(-100%)');
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
                    $reward.animate({ 'opacity': '0' }, function () {
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
                var template = '<div class="reward-toast flex">\n                <div class="reward-avatar" style="background-image:url(\'' + value[0].srcuserhead + '\')"></div>\n                <div class="reward-content">\n                    <h5>' + this.$limit(value[0].srcname, 6) + '</h5>\n                    <p>\u8D60\u4E88\u4E86</p>\n                </div>\n                <div class="reward-img" style="background-image:url(\'' + value[0].gifpicture + '\')"></div>\n\n                <div class="num">\n                   <span class="mul"></span>\n\n                </div>\n\n            </div>';
                // 送礼数量
                for (var i = 0; i < arr.length; i++) {
                    $('.reward-toast .num').append('<span class="nn" style="background-image:url(\'/images/1.9/' + arr[i] + '_icon.png\')"></span>');
                }

                append();
            }
        },
        answerRedPacket: function answerRedPacket(val) {
            if (!val) {
                this.answerText = "";
            }
        },
        answerComment: function answerComment(val) {
            if (val == true) {
                this.answerText = "";
                this.goWall = true;
            }
        }
    },
    components: {
        msg: _msg2.default,
        nomore: _nomore2.default,
        redpacket: _redpacket2.default,
        swiper: _vueAwesomeSwiper.swiper,
        swiperSlide: _vueAwesomeSwiper.swiperSlide,
        pptEdit: _pptEdit2.default,
        vipMember: _liveVipMember2.default,
        LackGifts: _LackGifts2.default,
        gift: _gift2.default,
        emoji: _em2.default,
        Qrcode: _QrCode2.default
    }
};
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(49)))

/***/ }),

/***/ 941:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function($) {

Object.defineProperty(exports, "__esModule", {
  value: true
});

var _mintUi = __webpack_require__(54);

var _vuePatternInput = __webpack_require__(1106);

var _vuePatternInput2 = _interopRequireDefault(_vuePatternInput);

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

exports.default = {
  props: ["showedit"],

  data: function data() {
    return {
      introImgs: {
        localId: [], //本地选择图片id
        serverId: [], //上传返回服务端id
        downloadId: [] //下载返回本地id
      },
      setting: {
        regExp: /^[\D]*|\D*/g,
        replacement: '',
        val: '0'
      },
      previewImg: [], //图片介绍src
      i: 0, //上传第几张图
      num: [],
      sortBtn: false,
      sortNum: false,
      loaded: false,
      loading: false,
      load: false
    };
  },
  created: function created() {
    //    this.setImg();
    this.getImg();
  },
  mounted: function mounted() {
    var _this2 = this;

    this.$nextTick(function () {
      // $('*').not('.inputP').on('click', function() {
      //  $('.inputP').blur();
      //   });
      _this2.objBlurFun("input");
    });
  },

  methods: {
    handleInput: function handleInput() {},
    handleChange: function handleChange() {},
    LoadMoreFun: function LoadMoreFun() {
      this.sortBtn = true;
      this.objBlurFun("input");
    },


    //如果不是当前触摸点不在input上,那么都失去焦点
    objBlurFun: function objBlurFun(sDom, time) {
      var time = time || 300;
      //判断是否为苹果
      var isIPHONE = navigator.userAgent.toUpperCase().indexOf("IPHONE") != -1;
      var _this = this;
      if (isIPHONE) {

        _this.$nextTick(function () {
          var obj = document.querySelectorAll(sDom);

          for (var i = 0; i < obj.length; i++) {
            _this.objBlur(obj[i], time);
          }
        });
      }
    },

    // 元素失去焦点隐藏iphone的软键盘
    objBlur: function objBlur(sdom, time) {

      if (sdom) {

        sdom.addEventListener("focus", function () {
          document.addEventListener("touchend", docTouchend, false);
        }, false);
      } else {
        throw new Error("objBlur()没有找到元素");
      }
      var docTouchend = function docTouchend(event) {

        if (event.target != sdom) {
          setTimeout(function () {
            sdom.blur();
            document.removeEventListener('touchend', docTouchend, false);
          }, time);
        }
      };
    },
    openIndicatorWithText: function openIndicatorWithText() {
      _mintUi.Indicator.open('上传中');
      // setTimeout(() => Indicator.close(), 2000);
    },

    //关闭ppt编辑窗口
    closeBtn: function closeBtn() {
      this.showedit = false;
      this.$emit("showeditMask");
    },

    /*   微信端上传图片  */

    //上传多张图片
    uploads: function uploads(obj) {
      var _this3 = this;

      this.loading = true;
      this.openIndicatorWithText();
      wx.uploadImage({
        localId: obj.localId[this.i],
        isShowProgressTips: 0,
        success: function success(res) {
          obj.serverId.push(res.serverId);
          var u = navigator.userAgent;
          var isAndroid = u.indexOf("Android") > -1 || u.indexOf("Adr") > -1; //android终端
          var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端
          //   alert(res.serverId)
          if (isAndroid) {
            // this.previewImg.push('data:image/jpeg;base64,' + res.localData)
            // alert(obj.localId[this.i])
            // this.previewImg.push(obj.localId[this.i]);
          } else if (isiOS) {
            wx.getLocalImgData({
              localId: obj.localId[_this3.i], // 图片的localID
              success: function success(res) {
                // this.previewImg.push('data:image/png;base64,' + res.localData)// localData是图片的base64数据，可以用img标签显示
                // this.previewImg.push(res.localData); // localData是图片的base64数据，可以用img标签显示
              }
            });
          }

          _this3.i++;
          if (_this3.i < obj.localId.length) {
            _this3.uploads(obj);
          } else {
            _this3.setImg(obj.serverId); //上传图片
            _this3.loaded = true;
          }
        },
        fail: function fail(res) {
          alert(JSON.stringify(res));
        }
      });
    },


    // php接口- 获取图片
    setImg: function setImg(content) {
      var _this4 = this;

      this.$http.post(this.hostUrl + "/CourseDetails/pptCourseOperation", { id: this.$route.params.courseId, type: 1, content: content }, { emulateJSON: true }).then(function (res) {

        if (res.body.code == 200) {
          _this4.getImg();
        } else {
          _this4.loading = false;
          _this4.loaded = false;
          _mintUi.Indicator.close();
          (0, _mintUi.Toast)({ message: res.body.msg, duration: 1000 });
        }
      });
    },
    getImg: function getImg() {
      var _this5 = this;

      this.$http.post(this.hostUrl + "/CourseDetails/courseware", { id: this.$route.params.courseId }, { emulateJSON: true }).then(function (res) {
        if (res.body.code == 200) {
          // this.previewImg = []
          // for(var i = 0;)
          _this5.previewImg = res.body.data;

          setTimeout(function () {
            _mintUi.Indicator.close();
          }, 500);
          _this5.$nextTick(function () {
            setTimeout(function () {
              if (_this5.loaded == true) {
                document.getElementById("ppt-edit").lastElementChild.scrollIntoView(); //上传图片时滚动到最后一张
                $("body").scrollTop($("#ppt-edit").height() + 90 * _this5.i);
              }
              _this5.loaded = false;
            }, 1000);
          });

          _this5.loading = false;
        } else {
          _this5.loading = false;
          _this5.loaded = false;
          _mintUi.Indicator.close();
          (0, _mintUi.Toast)({ message: res.body.msg, duration: 1000 });
        }
      });
    },

    //取消排序按钮

    cancelBtn: function cancelBtn() {
      this.sortBtn = false;
      this.getImg();
    },


    //编辑排序

    setSort: function setSort() {
      var _this6 = this;

      this.sortBtn = false;
      var content = [];
      for (var i = this.previewImg.length - 1; i > -1; i--) {
        content[i] = {};
        content[i].id = this.previewImg[i].id;
        content[i].sort = this.previewImg[i].sort;
      }

      this.$http.post(this.hostUrl + "/CourseDetails/pptCourseOperation", { id: this.$route.params.courseId, type: 3, content: content }, { emulateJSON: true }).then(function (res) {
        if (res.body.code == 200) {
          _this6.getImg();
        }
      });
    },
    uploadImage: function uploadImage(obj) {
      if (!Array.isArray(obj.serverId)) {
        obj.serverId = "";
      }
      obj.serverId = [];
      if (Array.isArray(obj.localId)) {
        this.i = 0;
        this.uploads(obj);
      }
    },

    // 选择多张图片
    uploadIntroduce: function uploadIntroduce() {
      var _this7 = this;

      var len = 27 - this.previewImg.length;
      var count = 9;
      if (len > 9) {
        count = 9;
      } else if (len <= 0) {
        (0, _mintUi.Toast)({ message: "图片最多为27张，请删除后再上传", duration: 1000 });
        return false;
      } else {
        count = len;
      }
      this.i = 0;
      this.introImgs.serverId = [];
      this.introImgs.localId = [];
      wx.chooseImage({
        count: count, // 默认9
        sizeType: ["original", "compressed"], // 可以指定是原图还是压缩图，默认二者都有
        sourceType: ["album", "camera"], // 可以指定来源是相册还是相机，默认二者都有
        success: function success(res) {
          _this7.introImgs.localId = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
          // alert('已选择 ' + res.localIds.length + ' 张图片');
          // alert(this.introImgs.localId);
          _this7.uploadImage(_this7.introImgs);
          // ws.send(123123);
        },
        fail: function fail(res) {
          alert(JSON.stringify(res));
        }
      });
    },

    // 删除图片
    deleteImgIntro: function deleteImgIntro(i, index) {
      var _this8 = this;

      this.$http.post(this.hostUrl + "/CourseDetails/pptCourseOperation", { id: this.$route.params.courseId, type: 2, content: i }, { emulateJSON: true }).then(function (res) {
        if (res.body.code == 200) {
          //   this.previewImg.splice(index, 1);
          _this8.getImg();
        }
      });
    }

    /*   微信端上传图片  end */

  },

  components: {
    PatternInput: _vuePatternInput2.default
  },
  watch: {
    // countTotal: {
    //   handler(newValue, oldValue) {
    //     for (let i = 0; i < newValue.length; i++) {

    //           this.newValue[i].replace(/^[1-9]\d*$/g,'')
    //         // this.newValue[i].replace(/^\d[0-2]/g,'')
    //         // this.newValue[i].replace(/^[0-9]+$/g,'')
    //       if (oldValue[i] != newValue[i]) {

    //         if (newValue[i].length > 2) {
    //           this.previewImg[i].sort = newValue[i].substring(0, 2);
    //         }
    //       }

    //     }
    //   },
    //   deep: true
    // },

    showedit: function showedit(val) {
      if (val == true) {
        this.getImg();
      }
    }
  }
};
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(49)))

/***/ }),

/***/ 942:
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

exports.default = {
    mounted: function mounted() {
        this.updateValue(this.value);
    },

    name: 'vue-pattern-input',
    props: {
        value: {
            required: true,
            type: [Number, String]
        },
        // Using for: String.prototype.replace(regexp, replacement)
        regExp: {
            type: RegExp,
            default: null
        },
        // Using for: String.prototype.replace(regexp, replacement)
        replacement: {
            type: String,
            default: ''
        }
    },
    data: function data() {
        return {
            val: ''
        };
    },

    methods: {
        // format the value of input
        formatValue: function formatValue(val) {
            var formattedValue = val.toString().replace(this.regExp, this.replacement);
            return formattedValue;
        },

        // update the value of input
        updateValue: function updateValue(val) {
            var formattedValue = this.formatValue(val);
            this.val = formattedValue;
            this.emitInput(formattedValue);
        },

        // emit input event
        emitInput: function emitInput(val) {
            this.$emit('input', val);
        },

        // emit change event
        emitChange: function emitChange() {
            this.$emit('change', this.val);
        }
    },
    watch: {
        // watch value prop
        value: function value(val) {
            this.updateValue(val);
        }
    }
};

/***/ }),

/***/ 956:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.pb {\n  padding-bottom: 1.14rem !important;\n  box-sizing: border-box !important;\n}\n.onlive-main {\n  height: 100%;\n}\n.onlive-main .emoji {\n    position: relative;\n}\n.onlive-main .v-modal {\n    opacity: .6;\n}\n.onlive-main .vip-animate-popup {\n    width: 7.5rem;\n    height: 7.5rem;\n    max-width: 7.5rem;\n    background: rgba(255, 255, 255, 0);\n    -webkit-transform: translate3d(-50%, -70%, 0);\n            transform: translate3d(-50%, -70%, 0);\n}\n.onlive-main .vip-animate-popup main {\n      width: 100%;\n      height: 100%;\n      text-align: center;\n      position: relative;\n}\n.onlive-main .vip-animate-popup main .bg {\n        width: 100%;\n        height: 100%;\n        background: url(\"/images/vip/vip-animate-bg.png\") no-repeat center center;\n        background-size: 100% 100%;\n        -webkit-transform-origin: center center;\n            -ms-transform-origin: center center;\n                transform-origin: center center;\n        /**/\n        /*background-position-y: -32px;*/\n        -webkit-animation: rotateAnimation 6s linear alternate;\n                animation: rotateAnimation 6s linear alternate;\n}\n.onlive-main .vip-animate-popup main img.vip-bg {\n        width: 100%;\n        position: absolute;\n        top: 0;\n        left: 0;\n        z-index: 2;\n}\n.onlive-main .vip-animate-popup main .head-add {\n        display: inline-block;\n        width: 1.92rem;\n        height: 1.92rem;\n        background-image: url(\"/images/robot/hy9.jpg\");\n        background-repeat: no-repeat;\n        background-size: 100% 100%;\n        position: absolute;\n        top: 2.32rem;\n        left: 50%;\n        -webkit-transform: translateX(-50%);\n            -ms-transform: translateX(-50%);\n                transform: translateX(-50%);\n        border-radius: 50%;\n}\n.onlive-main .vip-animate-popup main .head-add.vip-5-6 {\n          top: 2.62rem;\n          -webkit-transform: translateX(-50%);\n              -ms-transform: translateX(-50%);\n                  transform: translateX(-50%);\n}\n.onlive-main .vip-animate-popup main .head-add.vip-7-8 {\n          top: 1.92rem;\n          -webkit-transform: translateX(-50%);\n              -ms-transform: translateX(-50%);\n                  transform: translateX(-50%);\n}\n@-webkit-keyframes rotateAnimation {\nfrom {\n    -webkit-transform: rotate(0);\n            transform: rotate(0);\n}\nto {\n    -webkit-transform: rotate(360deg);\n            transform: rotate(360deg);\n}\n}\n@keyframes rotateAnimation {\nfrom {\n    -webkit-transform: rotate(0);\n            transform: rotate(0);\n}\nto {\n    -webkit-transform: rotate(360deg);\n            transform: rotate(360deg);\n}\n}\n.swiper-pagination-bullet {\n  background: red;\n}\n.onlive-close {\n  min-height: 100%;\n  background: #ffffff;\n  text-align: center;\n}\n.onlive-close img {\n    width: 1.4rem;\n    height: 1.4rem;\n    margin-bottom: 0.66rem;\n    margin-top: 1.9rem;\n}\n.onlive-close p {\n    font-size: 20px;\n    color: #666666;\n}\n.onlivepage {\n  height: 100%;\n  overflow: hidden;\n  display: -webkit-box;\n  display: -webkit-flex;\n  display: -ms-flexbox;\n  display: flex;\n  -webkit-box-orient: vertical;\n  -webkit-box-direction: normal;\n  -webkit-flex-direction: column;\n      -ms-flex-direction: column;\n          flex-direction: column;\n}\n.onlivepage .swipe {\n    height: 3.5rem;\n    position: relative;\n    overflow: hidden;\n}\n.onlivepage .swipe .noimage {\n      background: url(\"/images/default/ppt-bgs.png\") center center no-repeat;\n      height: 100%;\n      background-size: 100% auto;\n}\n.onlivepage .swipe .notimage {\n      height: 100%;\n      background-color: rgba(0, 0, 0, 0.85);\n      line-height: 100%;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      color: #fff;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n      font-size: 0.32rem;\n      -webkit-box-pack: center;\n      -webkit-justify-content: center;\n          -ms-flex-pack: center;\n              justify-content: center;\n}\n.onlivepage .swipe .swiper-pagination-fraction {\n      position: absolute;\n      width: 0.84rem;\n      height: 0.4rem;\n      line-height: 0.4rem;\n      text-align: center;\n      left: 0.1rem;\n      border-radius: 0.08rem;\n      font-size: 0.2rem;\n      background-color: rgba(255, 255, 255, 0.45);\n      bottom: 0.2rem;\n      color: #fff;\n}\n.onlivepage .swipe a {\n      width: 100%;\n      display: block;\n      height: 100%;\n      background-color: rgba(0, 0, 0, 0.85);\n      background-repeat: no-repeat;\n      background-size: auto 100%;\n      background-position: center center;\n}\n.onlivepage .mint-swipe, .onlivepage .swiper-container {\n    height: 3.5rem;\n}\n.onlivepage .mint-swipe .mint-swipe-items-wrap, .onlivepage .mint-swipe .swiper-slide, .onlivepage .swiper-container .mint-swipe-items-wrap, .onlivepage .swiper-container .swiper-slide {\n      height: 100%;\n}\n.onlivepage input[type=\"file\"] {\n    position: absolute;\n    top: 0;\n    left: 0;\n    width: 100%;\n    height: 100%;\n    opacity: 0;\n}\n.onlivepage .sprite:before {\n    background-size: 7.5rem auto;\n    -webkit-transform: none;\n        -ms-transform: none;\n            transform: none;\n}\n.onlivepage .onlivepage-container {\n    -webkit-box-flex: 1;\n    -webkit-flex: 1;\n        -ms-flex: 1;\n            flex: 1;\n    /* -webkit-overflow-scrolling: touch;*/\n    background-color: #f5f7f8;\n    padding-bottom: 0.2rem;\n    position: relative;\n    z-index: 0;\n}\n.onlivepage .onlivepage-container ._v-content {\n      position: absolute;\n}\n.onlivepage .onlivepage-container ._v-content .loading-layer {\n        height: 0;\n}\n.onlivepage .top-header {\n    position: relative;\n}\n.onlivepage .top-header .toggle-btn {\n      position: absolute;\n      right: 1.8rem;\n      top: 0.25rem;\n      color: #c62f2f;\n      width: 1rem;\n      height: 0.5rem;\n      line-height: 0.5rem;\n      text-align: center;\n      font-size: 0.24rem;\n      border-radius: .30rem;\n      display: inline;\n      border: 1px solid #c62f2f;\n}\n.onlivepage .top-header .go-invite-card {\n      line-height: 0.8rem;\n      height: 0.8rem;\n      background: url(\"/images/3.0/invite-card.png\") 0.2rem center no-repeat;\n      background-size: 0.35rem auto;\n      position: absolute;\n      top: 0.15rem;\n      right: 0.1rem;\n      width: 1.5rem;\n      display: block;\n      font-size: 0.28rem;\n      padding: 0 0.16rem;\n      padding-left: 0.7rem;\n      border-left: 1px solid #eee;\n      color: #c62f2f;\n      box-sizing: border-box;\n      background-color: rgba(255, 255, 255, 0.4);\n}\n.onlivepage .top-header .right-tabber {\n      position: absolute;\n      right: .24rem;\n      bottom: -0.24rem;\n      -webkit-transform: translateY(100%);\n          -ms-transform: translateY(100%);\n              transform: translateY(100%);\n      z-index: 1;\n}\n.onlivepage .top-header .right-tabber a {\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-orient: vertical;\n        -webkit-box-direction: normal;\n        -webkit-flex-direction: column;\n            -ms-flex-direction: column;\n                flex-direction: column;\n        -webkit-box-align: center;\n        -webkit-align-items: center;\n            -ms-flex-align: center;\n                align-items: center;\n        -webkit-box-pack: center;\n        -webkit-justify-content: center;\n            -ms-flex-pack: center;\n                justify-content: center;\n        height: 0.9rem;\n        width: 0.9rem;\n        margin-bottom: 0.12rem;\n        text-align: center;\n        border-radius: 50%;\n        background-color: #f6f6f6;\n        font-size: 0.18rem;\n        color: #fff;\n        box-sizing: border-box;\n}\n.onlivepage .top-header .right-tabber a i {\n          display: block;\n          background-repeat: no-repeat;\n          background-size: cover;\n          margin-bottom: .06rem;\n}\n.onlivepage .top-header .right-tabber a.recommend-btn {\n          background: #dd9393;\n}\n.onlivepage .top-header .right-tabber a.recommend-btn i {\n            background-image: url(\"/images/3.0/icon-09.png\");\n            width: 0.4rem;\n            height: 0.4rem;\n}\n.onlivepage .top-header .right-tabber a.rank-btn {\n          background: #ddb693;\n}\n.onlivepage .top-header .right-tabber a.rank-btn i {\n            background-image: url(\"/images/3.0/icon-11.png\");\n            width: 0.4rem;\n            height: 0.4rem;\n}\n.onlivepage .top-header .right-tabber a:last-child {\n          margin-bottom: 0;\n}\n.onlivepage .top-header .reward-toast {\n      position: absolute;\n      left: 0;\n      z-index: 1;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n      height: 0.98rem;\n      border-radius: 0.49rem 0 0 0.49rem;\n      background-image: -webkit-linear-gradient(left, rgba(254, 70, 79, 0.9), rgba(254, 109, 116, 0.9), rgba(252, 160, 164, 0.5), rgba(252, 160, 164, 0));\n      background-image: linear-gradient(to right, rgba(254, 70, 79, 0.9), rgba(254, 109, 116, 0.9), rgba(252, 160, 164, 0.5), rgba(252, 160, 164, 0));\n      color: #fff;\n      padding-right: 1.1rem;\n      -webkit-transform: translateX(-100%);\n          -ms-transform: translateX(-100%);\n              transform: translateX(-100%);\n      -webkit-transition: -webkit-transform 0.3s ease;\n      transition: -webkit-transform 0.3s ease;\n      transition: transform 0.3s ease;\n      transition: transform 0.3s ease, -webkit-transform 0.3s ease;\n      margin-left: 0.1rem;\n}\n.onlivepage .top-header .reward-toast .num {\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n}\n.onlivepage .top-header .reward-toast .mul {\n        width: .44rem;\n        height: .45rem;\n        display: inline-block;\n        background: url(\"/images/1.9/multiplication_icon.png\") center no-repeat;\n        background-size: .44rem .45rem;\n        margin-left: .1rem;\n}\n.onlivepage .top-header .reward-toast .nn {\n        width: .56rem;\n        height: .63rem;\n        display: inline-block;\n        background-size: .56rem .63rem;\n}\n.onlivepage .top-header .reward-toast .reward-avatar {\n        width: 0.9rem;\n        height: 0.9rem;\n        margin-left: 0.04rem;\n        border-radius: 50%;\n        background-repeat: no-repeat;\n        background-size: cover;\n        background-position: center center;\n        margin-right: 0.24rem;\n}\n.onlivepage .top-header .reward-toast .reward-content {\n        white-space: nowrap;\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-orient: vertical;\n        -webkit-box-direction: normal;\n        -webkit-flex-direction: column;\n            -ms-flex-direction: column;\n                flex-direction: column;\n        -webkit-box-pack: justify;\n        -webkit-justify-content: space-between;\n            -ms-flex-pack: justify;\n                justify-content: space-between;\n        padding: 0.13rem 0;\n        height: 100%;\n        box-sizing: border-box;\n}\n.onlivepage .top-header .reward-toast .reward-content h5 {\n          font-size: 0.34rem;\n}\n.onlivepage .top-header .reward-toast .reward-content p {\n          font-size: 0.26rem;\n}\n.onlivepage .top-header .reward-toast .reward-img {\n        margin-left: 0.3rem;\n        width: 0.8rem;\n        height: 0.8rem;\n        border-radius: 0.1rem;\n        background-repeat: no-repeat;\n        background-size: cover;\n        background-position: center center;\n}\n.onlivepage .header {\n    padding: .15rem .24rem;\n    box-sizing: border-box;\n    background: #fff;\n    position: relative;\n}\n.onlivepage .header .head-add {\n      width: 0.8rem;\n      height: 0.8rem;\n      border-radius: 50%;\n      display: inline-block;\n      background-repeat: no-repeat;\n      background-size: 100% 100%;\n      background-position: center center;\n      margin-right: 0.16rem;\n}\n.onlivepage .header .box {\n      -webkit-box-flex: 1;\n      -webkit-flex: 1;\n          -ms-flex: 1;\n              flex: 1;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-orient: vertical;\n      -webkit-box-direction: normal;\n      -webkit-flex-direction: column;\n          -ms-flex-direction: column;\n              flex-direction: column;\n      -webkit-box-pack: justify;\n      -webkit-justify-content: space-between;\n          -ms-flex-pack: justify;\n              justify-content: space-between;\n}\n.onlivepage .header .head-title {\n      font-size: 0.32rem;\n      color: #1c0808;\n      line-height: 1;\n      height: 0.5rem;\n      -webkit-box-pack: justify;\n      -webkit-justify-content: space-between;\n          -ms-flex-pack: justify;\n              justify-content: space-between;\n}\n.onlivepage .header .nums {\n      font-size: .24rem;\n      color: #888888;\n}\n.onlivepage .header .nums .like-num:before {\n        content: \"\";\n        display: inline-block;\n        width: 0.22rem;\n        height: 0.24rem;\n        background: url(\"/images/3.0/fans-icon.png\") no-repeat;\n        background-size: 100% 100%;\n        margin-right: 0.08rem;\n}\n.onlivepage .header .nums .hot-num {\n        margin-right: 0.32rem;\n}\n.onlivepage .header .nums .hot-num:before {\n        content: \"\";\n        display: inline-block;\n        margin-right: 0.08rem;\n        width: 0.18rem;\n        height: 0.24rem;\n        background: url(\"/images/3.0/hot-icon.png\") no-repeat;\n        background-size: 100% 100%;\n}\n.onlivepage .header .name {\n      display: inline-block;\n      max-width: 33vw;\n      vertical-align: top;\n}\n.onlivepage .header p {\n      font-size: 0.26rem;\n      color: #999;\n      line-height: 0.3rem;\n}\n.onlivepage .header .info {\n      display: inline-block;\n      padding: 0 0.12rem;\n      height: 0.4rem;\n      vertical-align: top;\n      border-radius: 0.08rem;\n      margin-top: 0.08rem;\n      color: #c62f2f;\n      font-size: 0.2rem;\n      text-align: center;\n      line-height: 0.4rem;\n      margin-left: 0.06rem;\n      box-shadow: 0 0 0 2px #fff;\n}\n.onlivepage .main {\n    /* padding-top: 0.3rem;*/\n    -moz-user-select: -moz-none;\n    -moz-user-select: none;\n    -o-user-select: none;\n    -webkit-user-select: none;\n    -ms-user-select: none;\n    user-select: none;\n    -webkit-touch-callout: none;\n}\n.onlivepage .main .msg-mask {\n      display: none;\n      position: fixed;\n      top: 0;\n      right: 0;\n      left: 0;\n      bottom: 0;\n      z-index: 1;\n}\n.onlivepage .main .msg-mask.show {\n        display: block;\n}\n.onlivepage .main .end-info {\n      margin: 0.3rem 0;\n      background-color: transparent;\n      text-align: center;\n      font-size: 0.26rem;\n      color: #999;\n}\n.onlivepage .main .end-info span {\n        color: #c62f2f;\n}\n.onlivepage .bottom-tabber {\n    position: relative;\n    background-color: #fff;\n    width: 100%;\n    z-index: 1;\n}\n.onlivepage .bottom-tabber .nav {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      position: relative;\n      z-index: 10;\n}\n.onlivepage .bottom-tabber .nav a {\n        -webkit-box-flex: 1;\n        -webkit-flex: 1;\n            -ms-flex: 1;\n                flex: 1;\n        position: relative;\n        height: 1rem;\n        font-size: 0.36rem;\n        color: #333;\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-pack: center;\n        -webkit-justify-content: center;\n            -ms-flex-pack: center;\n                justify-content: center;\n        -webkit-box-align: center;\n        -webkit-align-items: center;\n            -ms-flex-align: center;\n                align-items: center;\n        border-left: 1px solid #e8e8e8;\n}\n.onlivepage .bottom-tabber .nav a:first-child {\n          border-left: none;\n}\n.onlivepage .bottom-tabber .nav a span {\n          position: relative;\n}\n.onlivepage .bottom-tabber .nav a span:before {\n            margin-right: 0.1rem;\n}\n.onlivepage .bottom-tabber .nav .audio-btn span:before {\n        width: 0.35rem;\n        height: 0.38rem;\n        background-position: -3.86rem -1.08rem;\n}\n.onlivepage .bottom-tabber .nav .text-btn span:before {\n        width: 0.36rem;\n        height: 0.36rem;\n        background-position: -0.37rem -1.11rem;\n}\n.onlivepage .bottom-tabber .nav .image-btn span:before {\n        width: 0.35rem;\n        height: 0.36rem;\n        background-position: -0.84rem -1.11rem;\n}\n.onlivepage .bottom-tabber .nav .ppt-btn span:before {\n        width: 0.35rem;\n        height: 0.36rem;\n        background-position: -3.05rem -1.11rem;\n}\n.onlivepage .bottom-tabber .nav .operate-btn span:before {\n        width: 0.36rem;\n        height: 0.36rem;\n        background-position: -1.27rem -1.11rem;\n}\n.onlivepage .bottom-tabber .nav a.active {\n        color: #333;\n}\n.onlivepage .bottom-tabber .nav a.active.audio-btn span:before {\n          background-position-x: -2.3rem;\n}\n.onlivepage .bottom-tabber .nav a.active.text-btn span:before {\n          background-position-x: -2.67rem;\n}\n.onlivepage .bottom-tabber .nav a.active.ppt-btn span:before {\n          background-position-x: -3.463rem;\n}\n.onlivepage .bottom-tabber .nav a.active.image-btn span:before {\n          background-position-x: -4.7rem;\n}\n.onlivepage .bottom-tabber .content-mask {\n      position: fixed;\n      top: 0;\n      right: 0;\n      left: 0;\n      bottom: 0;\n}\n.onlivepage .bottom-tabber .mint-popup {\n      width: 100%;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      height: 2.3rem;\n      background-color: #fff;\n}\n.onlivepage .bottom-tabber .mint-popup a {\n        -webkit-box-flex: 1;\n        -webkit-flex: 1;\n            -ms-flex: 1;\n                flex: 1;\n        text-align: center;\n        padding-top: 0.44rem;\n        line-height: 1;\n        font-size: 0.26rem;\n        color: #999;\n}\n.onlivepage .bottom-tabber .mint-popup a span {\n          display: block;\n          margin: 0 auto;\n          border-radius: 0.2rem;\n          width: 1rem;\n          height: 1rem;\n          box-sizing: border-box;\n          position: relative;\n          margin-bottom: 0.16rem;\n}\n.onlivepage .bottom-tabber .mint-popup a span:before {\n            content: \"\";\n            position: absolute;\n            top: 50%;\n            left: 50%;\n            display: inline-block;\n            -webkit-transform: translate(-50%, -50%);\n                -ms-transform: translate(-50%, -50%);\n                    transform: translate(-50%, -50%);\n            width: 1.24rem;\n            height: 1.3rem;\n}\n.onlivepage .bottom-tabber .mint-popup a:nth-child(1) span:before {\n          background: url(\"/images/live/jqjs@2x.png\") no-repeat center center;\n          background-size: 1rem auto;\n}\n.onlivepage .bottom-tabber .mint-popup a:nth-child(2) span:before {\n          background: url(\"/images/live/jqfs@2x.png\") no-repeat center center;\n          background-size: 1rem auto;\n}\n.onlivepage .bottom-tabber .mint-popup a:nth-child(3) span:before {\n          background: url(\"/images/live/jyms@2x.png\") no-repeat center center;\n          background-size: 1rem auto;\n}\n.onlivepage .bottom-tabber .mint-popup a:nth-child(4) span:before {\n          background: url(\"/images/live/jszb@2x.png\") no-repeat center center;\n          background-size: 1rem auto;\n}\n.onlivepage .bottom-tabber .audio-content {\n      height: 5.60rem;\n      text-align: center;\n      box-sizing: border-box;\n      font-size: 0.34rem;\n      color: #999;\n      line-height: 1;\n      width: 100%;\n      background: #fff;\n      position: fixed;\n      z-index: 11111;\n      bottom: 0;\n      left: 0;\n}\n.onlivepage .bottom-tabber .audio-content h5 {\n        height: 1rem;\n        line-height: 1rem;\n        border-bottom: 1px solid #e8e8e8;\n        color: #1c0808;\n        font-size: .32rem;\n}\n.onlivepage .bottom-tabber .audio-content .cancle-audio {\n        display: inline-block;\n        width: .35rem;\n        position: absolute;\n        right: .24rem;\n        height: 1rem;\n        background: url(\"/images/cha.png\") center center no-repeat;\n        background-size: 100% auto;\n}\n.onlivepage .bottom-tabber .audio-content .audio-box {\n        padding-top: .1rem;\n        position: relative;\n}\n.onlivepage .bottom-tabber .audio-content .audio-box .concentrateBox {\n          background: none;\n          border-left: 0;\n}\n.onlivepage .bottom-tabber .audio-content .btn {\n        width: 2.24rem;\n        height: 2.24rem;\n        margin: 0.32rem auto;\n        border: 0.04rem solid #dcdbdb;\n        border-radius: 50%;\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-pack: center;\n        -webkit-justify-content: center;\n            -ms-flex-pack: center;\n                justify-content: center;\n        -webkit-box-align: center;\n        -webkit-align-items: center;\n            -ms-flex-align: center;\n                align-items: center;\n        position: relative;\n        color: #fff;\n}\n.onlivepage .bottom-tabber .audio-content .btn .pause-icon {\n          width: 0.72rem;\n          height: 1rem;\n          display: -webkit-box;\n          display: -webkit-flex;\n          display: -ms-flexbox;\n          display: flex;\n          -webkit-box-pack: justify;\n          -webkit-justify-content: space-between;\n              -ms-flex-pack: justify;\n                  justify-content: space-between;\n}\n.onlivepage .bottom-tabber .audio-content .btn .pause-icon:before, .onlivepage .bottom-tabber .audio-content .btn .pause-icon:after {\n            content: \"\";\n            display: block;\n            width: 0.18rem;\n            height: 100%;\n            background-color: #fff;\n}\n.onlivepage .bottom-tabber .audio-content .btn:before {\n          content: \"\";\n          width: 2rem;\n          height: 2rem;\n          background-color: #c62f2f;\n          border-radius: 50%;\n          position: absolute;\n          left: 50%;\n          top: 50%;\n          -webkit-transform: translate(-50%, -50%);\n              -ms-transform: translate(-50%, -50%);\n                  transform: translate(-50%, -50%);\n          z-index: -1;\n}\n.onlivepage .bottom-tabber .audio-content .btn.active {\n          border-color: #c62f2f;\n}\n.onlivepage .bottom-tabber .audio-content .btn.active:before {\n            background-color: #c62f2f;\n}\n.onlivepage .bottom-tabber .audio-content .cancel-btn {\n        position: absolute;\n        padding: 0 0.16rem;\n        line-height: 0.5rem;\n        height: 0.48rem;\n        border-radius: 0.24rem;\n        border: 1px solid #c62f2f;\n        color: #c62f2f;\n        top: 0.4rem;\n        right: 0.4rem;\n        font-size: .28rem;\n}\n.onlivepage .bottom-tabber .text-content {\n      background-color: #fff;\n      border-top: 1px solid #ededed;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-align: end;\n      -webkit-align-items: flex-end;\n          -ms-flex-align: end;\n              align-items: flex-end;\n      box-sizing: border-box;\n      position: relative;\n      width: 100%;\n      padding: .1rem 0;\n}\n.onlivepage .bottom-tabber .text-content textarea {\n        resize: none;\n        height: 0.8rem;\n        line-height: 0.8rem;\n        font-size: 0.32rem;\n        box-sizing: border-box;\n        -webkit-box-flex: 4;\n        -webkit-flex: 4;\n            -ms-flex: 4;\n                flex: 4;\n        padding: 0 .1rem;\n        color: #353535;\n        background-color: #f5f7f8;\n        border-radius: 5px 0 0 5px;\n        margin-left: .16rem;\n        overflow: hidden;\n}\n.onlivepage .bottom-tabber .text-content textarea.blue {\n          color: #c62f2f;\n}\n.onlivepage .bottom-tabber .text-content textarea.text-input {\n        overflow: inherit;\n}\n.onlivepage .bottom-tabber .text-content textarea.text-input.line-1 {\n          height: 0.8rem;\n          line-height: .8rem;\n}\n.onlivepage .bottom-tabber .text-content textarea.text-input.line-2 {\n          height: 1.1rem;\n          line-height: .5rem;\n}\n.onlivepage .bottom-tabber .text-content textarea.text-input.line-3 {\n          height: 1.6rem;\n          line-height: .5rem;\n}\n.onlivepage .bottom-tabber .text-content textarea.text-input.line-4 {\n          height: 2.1rem;\n          line-height: .5rem;\n}\n.onlivepage .bottom-tabber .text-content textarea.text-input.line-5 {\n          height: 2.6rem;\n          line-height: .5rem;\n}\n.onlivepage .bottom-tabber .text-content input {\n        height: 0.8rem;\n        line-height: 0.8rem;\n        font-size: 0.32rem;\n        box-sizing: border-box;\n}\n.onlivepage .bottom-tabber .text-content input[type=\"text\"] {\n          height: .8rem;\n          line-height: .8rem;\n          text-indent: 0.1rem;\n          -webkit-box-flex: 4;\n          -webkit-flex: 4;\n              -ms-flex: 4;\n                  flex: 4;\n          border-radius: 5px;\n          color: #353535;\n          background-color: #f5f7f8;\n          overflow: hidden;\n          margin-left: .16rem;\n}\n.onlivepage .bottom-tabber .text-content input[type=\"text\"].blue {\n            color: #c62f2f;\n}\n.onlivepage .bottom-tabber .text-content input[type=\"button\"] {\n          -webkit-box-flex: 1;\n          -webkit-flex: 1;\n              -ms-flex: 1;\n                  flex: 1;\n          width: 1.4rem;\n          height: .66rem;\n          line-height: .66rem;\n          margin: 0 .16rem 0 .16rem;\n          border-radius: 50px;\n          background-color: #b2b2b2;\n          color: #fff;\n          margin-bottom: .06rem;\n}\n.onlivepage .bottom-tabber .text-content input[type=\"button\"].blue {\n            background-color: #c62f2f;\n}\n.onlivepage .bottom-tabber .fixed {\n      /*position: fixed !important;\n                bottom: 0;*/\n}\n.onlivepage .bottom-tabber .bottom-text {\n      width: 100%;\n      background-color: #fff;\n      position: relative;\n      box-sizing: border-box;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n}\n.onlivepage .bottom-tabber .bottom-text input[type=\"text\"]:focus + .comment-mask,\n      .onlivepage .bottom-tabber .bottom-text textarea:focus + .comment-mask {\n        display: block;\n}\n.onlivepage .bottom-tabber .bottom-text .comment-mask {\n        position: fixed;\n        top: 0;\n        right: 0;\n        left: 0;\n        bottom: 0;\n        display: none;\n}\n.onlivepage .bottom-tabber .bottom-text textarea {\n        line-height: 0.8rem;\n        resize: none;\n        font-size: 0.34rem;\n        height: 0.8rem;\n        text-indent: 0.08rem;\n        color: #353535;\n        width: 100%;\n        position: relative;\n        border-bottom: 1px solid   #dbdbdb;\n        z-index: 1;\n}\n.onlivepage .bottom-tabber .bottom-text textarea.blue {\n          color: #c62f2f;\n}\n.onlivepage .bottom-tabber .bottom-text textarea.pc-textarea {\n          height: inherit;\n          overflow: inherit;\n}\n.onlivepage .bottom-tabber .bottom-text textarea.comment-input {\n        overflow: inherit;\n        padding: 0;\n        -webkit-appearance: none;\n        border-radius: 0;\n}\n.onlivepage .bottom-tabber .bottom-text textarea.comment-input.line-1 {\n          height: 0.8rem;\n          line-height: .8rem;\n}\n.onlivepage .bottom-tabber .bottom-text textarea.comment-input.line-2 {\n          height: 1.1rem;\n          line-height: .5rem;\n}\n.onlivepage .bottom-tabber .bottom-text textarea.comment-input.line-3 {\n          height: 1.6rem;\n          line-height: .5rem;\n}\n.onlivepage .bottom-tabber .bottom-text textarea.comment-input.line-4 {\n          height: 2.1rem;\n          line-height: .5rem;\n}\n.onlivepage .bottom-tabber .bottom-text textarea.comment-input.line-5 {\n          height: 2.6rem;\n          line-height: .5rem;\n}\n.onlivepage .bottom-tabber .bottom-text .new-comment-input {\n        /*margin-top: 0 !important;*/\n        height: .8rem;\n        font-size: .32rem;\n        margin-left: .2rem;\n        margin-right: .2rem;\n}\n.onlivepage .bottom-tabber .bottom-text .long-comment-input {\n        -webkit-box-flex: 4;\n        -webkit-flex: 4;\n            -ms-flex: 4;\n                flex: 4;\n        border-bottom: 1px solid  #dbdbdb;\n        font-size: .32rem;\n        margin-top: .1rem;\n        margin-bottom: .1rem;\n}\n.onlivepage .bottom-tabber .bottom-text input {\n        font-size: 0.34rem;\n        height: 0.66rem;\n}\n.onlivepage .bottom-tabber .bottom-text input[type=\"text\"] {\n          margin-top: 0.24rem;\n          text-indent: 0.08rem;\n          border-radius: 5px;\n          color: #353535;\n          width: 100%;\n          position: relative;\n          z-index: 1;\n}\n.onlivepage .bottom-tabber .bottom-text input[type=\"text\"].blue {\n            color: #c62f2f;\n}\n.onlivepage .bottom-tabber .bottom-text input[type=\"button\"] {\n          position: absolute;\n          top: 0.24rem;\n          right: 0.24rem;\n          border-radius: 0 0.1rem 0.1rem 0;\n          width: 1.5rem;\n          background-color: #b2b2b2;\n          color: #fff;\n}\n.onlivepage .bottom-tabber .bottom-text input[type=\"button\"].blue {\n            background-color: #c62f2f;\n}\n.onlivepage .bottom-tabber .bottom-text .state-one {\n        display: -webkit-box;\n        display: -ms-flexbox;\n        display: -webkit-flex;\n        display: flex;\n        -webkit-box-align: center;\n            -ms-flex-align: center;\n                align-items: center;\n        -webkit-align-items: center;\n}\n.onlivepage .bottom-tabber .bottom-text .state-one .tap-aid {\n          width: .74rem;\n          height: 1rem;\n          overflow: hidden;\n}\n.onlivepage .bottom-tabber .bottom-text .state-one .tap-aid .pic {\n            width: .46rem;\n            height: .46rem;\n            background: url(\"/images/3.0/icon-14.png\") no-repeat center center;\n            background-size: cover;\n            -moz-background-size: cover;\n            -webkit-background-size: cover;\n            -o-background-size: cover;\n            background-position: center center;\n            margin: 0 auto;\n            margin-top: .27rem;\n            margin-right: .27rem;\n}\n.onlivepage .bottom-tabber .bottom-text .state-two {\n        -webkit-box-flex: 1;\n        -webkit-flex: 1;\n            -ms-flex: 1;\n                flex: 1;\n}\n.onlivepage .bottom-tabber .bottom-text .state-two input {\n          font-size: .32rem;\n          height: .66rem;\n}\n.onlivepage .bottom-tabber .bottom-text .state-two input[type=\"text\"] {\n            text-indent: .08rem;\n            border-radius: 5px;\n            color: #888;\n            position: relative;\n            z-index: 1;\n}\n.onlivepage .bottom-tabber .bottom-text .state-two input[type=\"text\"].blue {\n              color: #c62f2f;\n}\n.onlivepage .bottom-tabber .bottom-text .state-two input[type=\"button\"] {\n            position: absolute;\n            top: 0;\n            right: 0;\n            margin-top: .16rem;\n            margin-right: .16rem;\n            font-size: .32rem;\n            border-radius: 50px;\n            width: 1.2rem;\n            height: .66rem;\n            padding: 0;\n            background-color: #b2b2b2;\n            color: #fff;\n}\n.onlivepage .bottom-tabber .bottom-text .state-two input[type=\"button\"].blue {\n              background-color: #c62f2f;\n}\n.onlivepage .bottom-tabber .tips {\n      position: absolute;\n      top: -.6rem;\n      width: 100%;\n      line-height: .6rem;\n      height: .6rem;\n      background: #f5f7f8;\n      color: #b2b2b2;\n}\n.onlivepage .bottom-tabber .tips span {\n        display: inline-block;\n        font-size: .26rem;\n}\n.onlivepage .mini-comment {\n    position: absolute;\n    right: .3rem;\n    top: .64rem;\n    -webkit-transform: translateY(-100%);\n        -ms-transform: translateY(-100%);\n            transform: translateY(-100%);\n    margin-top: -0.8rem;\n    z-index: 10;\n}\n.onlivepage .mini-comment .list .item {\n      opacity: 0;\n      display: none;\n}\n.onlivepage .mini-comment .list-opacity .item {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-animation: commentRoom 10s linear forwards;\n              animation: commentRoom 10s linear forwards;\n}\n.onlivepage .mini-comment .item {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-pack: end;\n      -webkit-justify-content: flex-end;\n          -ms-flex-pack: end;\n              justify-content: flex-end;\n      margin-bottom: .1rem;\n}\n.onlivepage .mini-comment .item > section {\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        background: #f68f6b;\n        border-radius: 50px;\n}\n.onlivepage .mini-comment .item img {\n        border-radius: 50%;\n        width: .36rem;\n        height: .36rem;\n        border: 1px solid #ffffff;\n        margin: .06rem;\n}\n.onlivepage .mini-comment .item p {\n        white-space: nowrap;\n        border-radius: 0.1rem;\n        color: #fff;\n        font-size: 0.22rem;\n        min-height: 0.5rem;\n        box-sizing: border-box;\n        padding: 0.1rem 0.04rem .1rem .16rem;\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-align: center;\n        -webkit-align-items: center;\n            -ms-flex-align: center;\n                align-items: center;\n        -webkit-box-pack: center;\n        -webkit-justify-content: center;\n            -ms-flex-pack: center;\n                justify-content: center;\n        word-break: break-all;\n        position: relative;\n        /*&:before {\n                        content: '';\n                        position: absolute;\n                        top: .21rem;\n                        right: 0;\n                        transform: translateX(100%);\n                        width: 0;\n                        height: 0;\n                        border-style: solid;\n                        border-color: transparent transparent transparent rgba(0, 0, 0, .4);\n                        border-width: .04rem;\n                    }*/\n}\n.onlivepage .mini-comment .mini-container {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-pack: end;\n      -webkit-justify-content: flex-end;\n          -ms-flex-pack: end;\n              justify-content: flex-end;\n      background-color: transparent;\n}\n.onlivepage .mini-comment .mini-comment-btn {\n      height: 0.5rem;\n      border-radius: 0.26rem;\n      background-color: #f68f6b;\n      display: block;\n      line-height: 0.5rem;\n      font-size: 0.28rem;\n      color: #fff;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n      width: auto;\n}\n.onlivepage .mini-comment .mini-comment-btn .toggle {\n        width: 0.38rem;\n        height: 0.38rem;\n        background-color: rgba(255, 255, 255, 0.5);\n        box-sizing: border-box;\n        border-radius: 50%;\n        color: #fff;\n        text-align: center;\n        font-size: 0.26rem;\n        float: right;\n        margin: 0.06rem;\n        line-height: .36rem;\n}\n.onlivepage .mini-comment .mini-comment-btn .number {\n        /* flex: 1;*/\n        padding: 0 0.1rem 0 0.14rem;\n        -webkit-box-align: center;\n        -webkit-align-items: center;\n            -ms-flex-align: center;\n                align-items: center;\n        font-size: 0.24rem;\n        float: left;\n}\n.onlivepage .mini-comment .mini-comment-btn .number span {\n          width: 0.28rem;\n          height: 0.24rem;\n          display: block;\n          background: url(\"/images/live-18.png\") no-repeat center center/100% 100%;\n          margin-right: 0.12rem;\n}\n.onlivepage .comment-room {\n    width: 100%;\n    height: 100%;\n    background-color: transparent;\n    display: -webkit-box;\n    display: -webkit-flex;\n    display: -ms-flexbox;\n    display: flex;\n    -webkit-box-orient: vertical;\n    -webkit-box-direction: normal;\n    -webkit-flex-direction: column;\n        -ms-flex-direction: column;\n            flex-direction: column;\n    box-sizing: border-box;\n}\n.onlivepage .comment-room > .top {\n      height: 1.72rem;\n}\n.onlivepage .comment-room > .top .back-btn {\n        width: 2.1rem;\n        height: 0.66rem;\n        border-radius: 0.34rem;\n        background-color: #c62f2f;\n        color: #fff;\n        font-size: 0.32rem;\n        text-align: center;\n        line-height: 0.66rem;\n        margin: 0 auto;\n        margin-top: 0.52rem;\n}\n.onlivepage .comment-room .comment-list {\n      background-color: #fff;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-orient: vertical;\n      -webkit-box-direction: normal;\n      -webkit-flex-direction: column;\n          -ms-flex-direction: column;\n              flex-direction: column;\n      -webkit-box-flex: 1;\n      -webkit-flex: 1;\n          -ms-flex: 1;\n              flex: 1;\n      /*.rank-top {\n                    display: flex;\n                    align-items: flex-end;\n                    text-align: center;\n                    & > div {\n                        flex: 1;\n                        overflow: hidden;\n                        display: flex;\n                        flex-direction: column;\n                        align-items: center;\n                        justify-content: flex-end;\n                        background-color: #fff;\n                        padding-top: 0.32rem;\n                        padding-bottom: 0.48rem;\n                        .avatar {\n                            position: relative;\n                            width: 1.2rem;\n                            height: 1.2rem;\n                            margin-bottom: 0.5rem;\n                            &:after {\n                                right: -0.16rem;\n                                bottom: -0.16rem;\n                            }\n                        }\n                    }\n                    .name {\n                        margin-bottom: 0.24rem;\n                        white-space: nowrap;\n                        overflow: hidden;\n                        text-overflow: ellipsis;\n                        width: 95%;\n                    }\n                    .money {\n                        white-space: nowrap;\n                        overflow: hidden;\n                        text-overflow: ellipsis;\n                        width: 95%;\n                    }\n                    .rank1,\n                    .rank2,\n                    .rank3 {\n                        border-bottom: 1px solid #ebebeb;\n                    }\n                }\n                .rank-item {\n                    display: flex;\n                    background-color: #fff;\n                    border-bottom: 1px solid #ebebeb;\n                    padding: 0.22rem 0.28rem 0.22rem 0;\n                    justify-content: space-between;\n                    align-items: center;\n                    font-size: 0.34rem;\n                    color: #545b63;\n                    position: relative;\n                    .left {\n                        display: flex;\n                        align-items: center;\n                        flex: 1;\n                        overflow: hidden;\n                        margin-right: 0.1rem;\n                    }\n                    &:last-child {\n                        border-bottom: none;\n                        border-radius: 0 0 0.08rem 0.08rem;\n                    }\n                    .item-index {\n                        width: 0.8rem;\n                        text-align: center;\n                    }\n                    .avatar {\n                        height: 0.96rem;\n                        width: 0.96rem;\n                        margin-right: 0.24rem;\n                    }\n                    .name {\n                        overflow: hidden;\n                        text-overflow: ellipsis;\n                        white-space: nowrap;\n                        flex: 1;\n                    }\n                }*/\n}\n.onlivepage .comment-room .comment-list .comment-title {\n        height: .9rem;\n        font-size: .32rem;\n        color: #666;\n        text-align: left;\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-align: center;\n        -webkit-align-items: center;\n            -ms-flex-align: center;\n                align-items: center;\n        border-bottom: 1px solid #ebebeb;\n        position: relative;\n}\n.onlivepage .comment-room .comment-list .comment-title:before {\n          content: '';\n          position: absolute;\n          width: .5rem;\n          height: .06rem;\n          border-radius: .04rem;\n          background-color: #c62f2f;\n          bottom: .04rem;\n          -webkit-transform: translateX(-50%);\n              -ms-transform: translateX(-50%);\n                  transform: translateX(-50%);\n          -webkit-transition: left .3s ease;\n          transition: left .3s ease;\n}\n.onlivepage .comment-room .comment-list .comment-title.left:before {\n          left: 25%;\n}\n.onlivepage .comment-room .comment-list .comment-title.right:before {\n          left: 75%;\n}\n.onlivepage .comment-room .comment-list .comment-title label {\n          -webkit-box-flex: 1;\n          -webkit-flex: 1;\n              -ms-flex: 1;\n                  flex: 1;\n          height: 100%;\n          text-align: center;\n          line-height: .9rem;\n}\n.onlivepage .comment-room .comment-list .comment-title label input {\n            display: none;\n}\n.onlivepage .comment-room .comment-list .comment-title label input:checked + p {\n              color: #c62f2f;\n}\n.onlivepage .comment-room .comment-list .boxs {\n        -webkit-box-flex: 1;\n        -webkit-flex: 1;\n            -ms-flex: 1;\n                flex: 1;\n        overflow: auto;\n        -webkit-overflow-scrolling: touch;\n        padding: 0 .24rem;\n}\n.onlivepage .comment-room .comment-list .menu-mask {\n        position: fixed;\n        top: 0;\n        right: 0;\n        left: 0;\n        bottom: 0;\n        display: none;\n        z-index: 1;\n}\n.onlivepage .comment-room .comment-list .box {\n        padding: .34rem 0;\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        border-top: 1px solid #ebebeb;\n}\n.onlivepage .comment-room .comment-list .box:first-child {\n          border-top: none;\n}\n.onlivepage .comment-room .comment-list .box.answer-comment-item {\n          position: relative;\n          padding: 0;\n          /*&:before {\n                            content: '';\n                            position: absolute;\n                            width: calc(100% - 1.2rem);\n                            height: 1px;\n                            top: 0;\n                            right: 0;\n                            background-color: #eee;\n                        }*/\n}\n.onlivepage .comment-room .comment-list .box.answer-comment-item > section {\n            margin: .14rem 0;\n            display: -webkit-box;\n            display: -webkit-flex;\n            display: -ms-flexbox;\n            display: flex;\n            width: 100%;\n            padding: .28rem 0;\n            background: #fbf7f7;\n}\n.onlivepage .comment-room .comment-list .box.answer-comment-item .left img {\n            display: none;\n}\n.onlivepage .comment-room .comment-list .box > section {\n          display: -webkit-box;\n          display: -webkit-flex;\n          display: -ms-flexbox;\n          display: flex;\n          width: 100%;\n}\n.onlivepage .comment-room .comment-list .box .item-menu {\n          bottom: -0.72rem;\n          right: -0.14rem;\n          position: absolute;\n          display: -webkit-box;\n          display: -webkit-flex;\n          display: -ms-flexbox;\n          display: flex;\n          border-radius: 0.08rem;\n          border: 1px solid #ddbbbb;\n          box-shadow: 0 0 0.3rem 0.04rem #eaeaea;\n          background-color: #fbf7f7;\n          -webkit-transform: scale(0, 0);\n              -ms-transform: scale(0, 0);\n                  transform: scale(0, 0);\n          -webkit-transition: -webkit-transform 0.3s ease;\n          transition: -webkit-transform 0.3s ease;\n          transition: transform 0.3s ease;\n          transition: transform 0.3s ease, -webkit-transform 0.3s ease;\n          -webkit-transform-origin: 2.4rem -0.06rem;\n              -ms-transform-origin: 2.4rem -0.06rem;\n                  transform-origin: 2.4rem -0.06rem;\n          z-index: 2;\n}\n.onlivepage .comment-room .comment-list .box .item-menu.active {\n            -webkit-transform: scale(1, 1);\n                -ms-transform: scale(1, 1);\n                    transform: scale(1, 1);\n}\n.onlivepage .comment-room .comment-list .box .item-menu:after {\n            content: '';\n            position: absolute;\n            width: .06rem;\n            height: .06rem;\n            -webkit-transform: rotate(45deg);\n                -ms-transform: rotate(45deg);\n                    transform: rotate(45deg);\n            border-width: 1px;\n            border-style: solid;\n            border-color: #ccc transparent transparent #ccc;\n            right: .22rem;\n            top: -.06rem;\n            background-color: #fff;\n}\n.onlivepage .comment-room .comment-list .box .item-menu a {\n            text-align: center;\n            -webkit-box-flex: 1;\n            -webkit-flex: 1;\n                -ms-flex: 1;\n                    flex: 1;\n            display: block;\n            height: .62rem;\n            width: .9rem;\n            font-size: .26rem;\n            color: #bb7777;\n            line-height: .62rem;\n            box-sizing: border-box;\n            border-right: 1px solid #ddbbbb;\n}\n.onlivepage .comment-room .comment-list .box .item-menu a:last-child {\n              border-right: none;\n}\n.onlivepage .comment-room .comment-list .box .left {\n          width: .64rem;\n          margin-right: .24rem;\n}\n.onlivepage .comment-room .comment-list .box .left img {\n            border-radius: 50%;\n            width: 0.64rem;\n            height: 0.64rem;\n}\n.onlivepage .comment-room .comment-list .box .right {\n          -webkit-box-flex: 1;\n          -webkit-flex: 1;\n              -ms-flex: 1;\n                  flex: 1;\n          display: -webkit-box;\n          display: -webkit-flex;\n          display: -ms-flexbox;\n          display: flex;\n          -webkit-box-orient: vertical;\n          -webkit-box-direction: normal;\n          -webkit-flex-direction: column;\n              -ms-flex-direction: column;\n                  flex-direction: column;\n          -webkit-box-pack: justify;\n          -webkit-justify-content: space-between;\n              -ms-flex-pack: justify;\n                  justify-content: space-between;\n}\n.onlivepage .comment-room .comment-list .box .right .top {\n            display: -webkit-box;\n            display: -webkit-flex;\n            display: -ms-flexbox;\n            display: flex;\n            -webkit-box-pack: justify;\n            -webkit-justify-content: space-between;\n                -ms-flex-pack: justify;\n                    justify-content: space-between;\n            margin-bottom: .2rem;\n}\n.onlivepage .comment-room .comment-list .box .right .top h5 {\n              color: #1c0808;\n              font-size: .3rem;\n}\n.onlivepage .comment-room .comment-list .box .right .top h5 span {\n                font-size: 0.26rem;\n                display: inline-block;\n                width: .56rem;\n                height: .38rem;\n                vertical-align: middle;\n}\n.onlivepage .comment-room .comment-list .box .right .top h5 span.host {\n                  background: url(\"/images/3.0/icon-05.png\") no-repeat;\n                  background-size: 100% 100%;\n}\n.onlivepage .comment-room .comment-list .box .right .top h5 span.guest {\n                  background: url(\"/images/3.0/icon-12.png\") no-repeat;\n                  background-size: 100% 100%;\n}\n.onlivepage .comment-room .comment-list .box .right .top h5 span.ass {\n                  background: url(\"/images/3.0/icon-06.png\") no-repeat;\n                  background-size: 100% 100%;\n}\n.onlivepage .comment-room .comment-list .box .right .top p {\n              font-size: .22rem;\n              color: #dadada;\n              line-height: 1.2;\n}\n.onlivepage .comment-room .comment-list .box .right .top p > a {\n                float: right;\n                margin-top: .05rem;\n                margin-right: .2rem;\n                display: -webkit-box;\n                display: -webkit-flex;\n                display: -ms-flexbox;\n                display: flex;\n                box-sizing: border-box;\n                padding: 0 .04rem;\n                -webkit-box-pack: justify;\n                -webkit-justify-content: space-between;\n                    -ms-flex-pack: justify;\n                        justify-content: space-between;\n                -webkit-box-align: center;\n                -webkit-align-items: center;\n                    -ms-flex-align: center;\n                        align-items: center;\n                width: .26rem;\n                height: .16rem;\n                margin-left: .15rem;\n                border-radius: 3px;\n                background-color: #e4e4e4;\n                position: relative;\n                z-index: 2;\n}\n.onlivepage .comment-room .comment-list .box .right .top p > a span {\n                  position: absolute;\n                  top: 0;\n                  left: 0;\n                  width: 100%;\n                  height: 100%;\n                  border-radius: 50%;\n}\n.onlivepage .comment-room .comment-list .box .right .top p > a i {\n                  display: block;\n                  width: .05rem;\n                  height: .05rem;\n                  background-color: #fff;\n                  border-radius: 50%;\n}\n.onlivepage .comment-room .comment-list .box .right .bottom {\n            display: -webkit-box;\n            display: -webkit-flex;\n            display: -ms-flexbox;\n            display: flex;\n            padding-right: .2rem;\n}\n.onlivepage .comment-room .comment-list .box .right .bottom p {\n              -webkit-box-flex: 1;\n              -webkit-flex: 1;\n                  -ms-flex: 1;\n                      flex: 1;\n              word-break: break-all;\n              font-size: 0.26rem;\n              color: #888;\n              line-height: .4rem;\n}\n.onlivepage .comment-room .comment-list .box .right .bottom p.color {\n                color: #bb7777;\n}\n.onlivepage .comment-room .comment-list .rank-box {\n        -webkit-box-flex: 1;\n        -webkit-flex: 1;\n            -ms-flex: 1;\n                flex: 1;\n        background-color: #f5f7f8;\n        padding: 0;\n        line-height: 1;\n        position: relative;\n        overflow: auto;\n        /*.rank1 {\n                        border-radius: .08rem .08rem 0 0;\n                        padding-top: .63rem;\n                        box-shadow: 0 -.06rem 0 0 #ffcd55;\n                        .avatar {\n                            width: 1.4rem;\n                            height: 1.4rem;\n                            position: relative;\n                            margin-bottom: .4rem;\n                            img {\n                                position: relative;\n                                z-index: 1;\n                            }\n                            &:before {\n                                content: '';\n                                position: absolute;\n                                background: url('/images/live-07.png') no-repeat;\n                                background-size: contain;\n                                width: .72rem;\n                                height: .68rem;\n                                z-index: 0;\n                                top: -.3rem;\n                                left: -.12rem;\n                            }\n                            &:after {\n                                content: '';\n                                position: absolute;\n                                background: url('/images/live-08.png') no-repeat;\n                                background-size: contain;\n                                width: .43rem;\n                                height: .54rem;\n                                z-index: 1;\n                                right: -.08rem;\n                                bottom: -.08rem;\n                            }\n                        }\n                    }\n                    .rank2 {\n                        padding-top: .32rem;\n                        box-shadow: 0 -.06rem 0 0 #d3e1ea;\n                        border-radius: .08rem 0 0;\n                        position: relative;\n                        .avatar:after {\n                            content: '';\n                            position: absolute;\n                            background: url('/images/live-09.png') no-repeat;\n                            background-size: contain;\n                            width: .43rem;\n                            height: .54rem;\n                            z-index: 1;\n                        }\n                        &:before {\n                            content: '';\n                            position: absolute;\n                            top: 0;\n                            right: 0;\n                            width: .04rem;\n                            height: 100%;\n                            box-sizing: border-box;\n                            padding-bottom: 1.24rem;\n                            background-image: linear-gradient(to bottom left, #eee, #fff);\n                            background-repeat: no-repeat;\n                            background-origin: content-box;\n                        }\n                    }\n                    .rank3 {\n                        padding-top: .22rem;\n                        box-shadow: 0 -.06rem 0 0 #d69982;\n                        border-radius: 0 .08rem 0 0;\n                        position: relative;\n                        .avatar:after {\n                            content: '';\n                            position: absolute;\n                            background: url('/images/live-10.png') no-repeat;\n                            background-size: contain;\n                            width: .43rem;\n                            height: .54rem;\n                            z-index: 1;\n                        }\n                        &:before {\n                            content: '';\n                            position: absolute;\n                            top: 0;\n                            left: 0;\n                            width: .04rem;\n                            height: 100%;\n                            box-sizing: border-box;\n                            padding-bottom: 1.24rem;\n                            background-image: linear-gradient(to bottom right, #eee, #fff);\n                            background-repeat: no-repeat;\n                            background-origin: content-box;\n                        }\n                    }*/\n}\n.onlivepage .comment-room .comment-list .rank-box .norank {\n          position: absolute;\n          top: 50%;\n          left: 50%;\n          -webkit-transform: translate(-50%, -50%);\n              -ms-transform: translate(-50%, -50%);\n                  transform: translate(-50%, -50%);\n          font-size: .3rem;\n          color: #999999;\n}\n.onlivepage .comment-room .comment-list .rank-box .name {\n          font-size: .28rem;\n          color: #545b63;\n}\n.onlivepage .comment-room .comment-list .rank-box .money {\n          font-size: .3rem;\n          color: #f75454;\n}\n.onlivepage .comment-room .comment-list .rank-box .avatar img {\n          width: 100%;\n          height: 100%;\n          border-radius: 50%;\n}\n.onlivepage .comment-room .comment-list header {\n        width: 100%;\n        height: 2.42rem;\n        background: url(\"/images/3.0/rank-header.png\") no-repeat;\n        background-size: 100% 100%;\n}\n.onlivepage .comment-room .comment-list .rank-list {\n        padding: 0 .24rem;\n        margin-top: -.8rem;\n}\n.onlivepage .comment-room .comment-list .rank-list li {\n          padding: .24rem;\n          background: #ffffff;\n          border: 1px solid #ededed;\n          margin-bottom: .12rem;\n}\n.onlivepage .comment-room .comment-list .rank-list li > span {\n            display: inline-block;\n            width: .5rem;\n            height: .5rem;\n            color: #ffffff;\n            font-weight: bold;\n            background: #888888;\n            border-radius: 50%;\n            line-height: .5rem;\n            text-align: center;\n            vertical-align: middle;\n}\n.onlivepage .comment-room .comment-list .rank-list li > span.top-1 {\n              width: .6rem;\n              height: .66rem;\n              background: url(\"/images/live-tab/top-01.png\") no-repeat;\n              background-size: 100% 100%;\n              border-radius: 0;\n}\n.onlivepage .comment-room .comment-list .rank-list li > span.top-2 {\n              width: .6rem;\n              height: .66rem;\n              background: url(\"/images/live-tab/top-02.png\") no-repeat;\n              background-size: 100% 100%;\n              border-radius: 0;\n}\n.onlivepage .comment-room .comment-list .rank-list li > span.top-3 {\n              width: .6rem;\n              height: .66rem;\n              background: url(\"/images/live-tab/top-03.png\") no-repeat;\n              background-size: 100% 100%;\n              border-radius: 0;\n}\n.onlivepage .comment-room .comment-list .rank-list li > img {\n            width: .6rem;\n            height: .6rem;\n            border-radius: 50%;\n            vertical-align: middle;\n            margin: 0 .14rem;\n}\n.onlivepage .comment-room .comment-list .rank-list li > i {\n            font-size: .3rem;\n            color: #1c0808;\n}\n.onlivepage .comment-room .comment-list .rank-list li p {\n            float: right;\n            font-size: .32rem;\n            color: #353535;\n            margin-top: .15rem;\n}\n.onlivepage .comment-room .comment-list .rank-list li p.top {\n              color: #c62f2f;\n}\n.onlivepage .comment-room .bottom-submit {\n      width: 100%;\n      box-sizing: border-box;\n      border-top: 1px solid #ededed;\n      background-color: #fff;\n      position: relative;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-align: end;\n      -webkit-align-items: flex-end;\n          -ms-flex-align: end;\n              align-items: flex-end;\n      padding: .1rem 0;\n      /*input[type=\"text\"]:focus + .comment-mask,\n                textarea:focus + .comment-mask {\n                    display: block;\n                }*/\n}\n.onlivepage .comment-room .bottom-submit .comment-mask {\n        position: fixed;\n        top: 0;\n        right: 0;\n        left: 0;\n        bottom: 0;\n        display: none;\n}\n.onlivepage .comment-room .bottom-submit textarea {\n        line-height: 0.8rem;\n        resize: none;\n        height: 0.8rem;\n        font-size: 0.32rem;\n        margin-left: 0.16rem;\n        -webkit-box-flex: 4;\n        -webkit-flex: 4;\n            -ms-flex: 4;\n                flex: 4;\n        border-radius: 5px;\n        text-indent: 0.08rem;\n        color: #353535;\n        width: 100%;\n        border-bottom: 1px solid #dbdbdb;\n        position: relative;\n        z-index: 1;\n}\n.onlivepage .comment-room .bottom-submit textarea.blue {\n          color: #c62f2f;\n}\n.onlivepage .comment-room .bottom-submit textarea.pc-textarea {\n          height: inherit;\n          overflow: inherit;\n}\n.onlivepage .comment-room .bottom-submit textarea.comment-input {\n        overflow: inherit;\n        padding: 0;\n}\n.onlivepage .comment-room .bottom-submit textarea.comment-input.line-1 {\n          height: 0.8rem;\n          line-height: .8rem;\n}\n.onlivepage .comment-room .bottom-submit textarea.comment-input.line-2 {\n          height: 1.1rem;\n          line-height: .5rem;\n}\n.onlivepage .comment-room .bottom-submit textarea.comment-input.line-3 {\n          height: 1.6rem;\n          line-height: .5rem;\n}\n.onlivepage .comment-room .bottom-submit textarea.comment-input.line-4 {\n          height: 2.1rem;\n          line-height: .5rem;\n}\n.onlivepage .comment-room .bottom-submit textarea.comment-input.line-5 {\n          height: 2.6rem;\n          line-height: .5rem;\n}\n.onlivepage .comment-room .bottom-submit input {\n        height: 0.8rem;\n        font-size: 0.34rem;\n}\n.onlivepage .comment-room .bottom-submit input[type=\"text\"] {\n          margin-top: 0.1rem;\n          text-indent: 0.08rem;\n          -webkit-box-flex: 4;\n          -webkit-flex: 4;\n              -ms-flex: 4;\n                  flex: 4;\n          width: 100%;\n          position: relative;\n          z-index: 1;\n          line-height: 0.8rem;\n          background: #f5f7f8;\n          border-radius: 5px;\n          color: #353535;\n          margin-left: .16rem;\n}\n.onlivepage .comment-room .bottom-submit input[type=\"text\"].blue {\n            color: #c62f2f;\n}\n.onlivepage .comment-room .bottom-submit input[type=\"button\"] {\n          -webkit-box-flex: 1;\n          -webkit-flex: 1;\n              -ms-flex: 1;\n                  flex: 1;\n          width: 1.4rem;\n          height: .66rem;\n          border-radius: 50px;\n          font-size: .32rem;\n          margin: 0 .16rem 0 .16rem;\n          background-color: #b2b2b2;\n          color: #fff;\n          margin-bottom: .06rem;\n}\n.onlivepage .comment-room .bottom-submit input[type=\"button\"].blue {\n            background-color: #c62f2f;\n}\n.onlivepage .mask {\n    position: fixed;\n    top: 0;\n    right: 0;\n    left: 0;\n    bottom: 0;\n    background-color: rgba(0, 0, 0, 0.4);\n    z-index: 20;\n}\n.onlivepage .forbidden-mode {\n    z-index: 20;\n    position: fixed;\n    width: 5.8rem;\n    background-color: #fff;\n    border-radius: 0.1rem;\n    bottom: 0;\n    left: 50%;\n    -webkit-transform: translate(-50%, 100%);\n        -ms-transform: translate(-50%, 100%);\n            transform: translate(-50%, 100%);\n    text-align: center;\n    padding-top: 0.4rem;\n    z-index: 9999;\n    -webkit-transition: all 0.3s ease;\n    transition: all 0.3s ease;\n    height: auto;\n    overflow: hidden;\n}\n.onlivepage .forbidden-mode .mtSwitch {\n      position: relative;\n      height: 1rem;\n      width: 40%;\n      margin: 0 auto;\n      text-align: center;\n}\n.onlivepage .forbidden-mode .mtSwitch .on {\n        position: absolute;\n        top: .13rem;\n        right: .5rem;\n        color: #fff;\n}\n.onlivepage .forbidden-mode .mtSwitch .off {\n        position: absolute;\n        top: .13rem;\n        left: .5rem;\n        color: #fff;\n}\n.onlivepage .forbidden-mode .mint-switch-input:checked + .mint-switch-core {\n      background-color: #f9916d;\n      border-color: #f9916d;\n      width: 82px;\n}\n.onlivepage .forbidden-mode .mint-switch-input:checked + .mint-switch-core:after {\n      -webkit-transform: translateX(50px);\n      -ms-transform: translateX(50px);\n          transform: translateX(50px);\n}\n.onlivepage .forbidden-mode.active {\n      bottom: 50%;\n      -webkit-transform: translate(-50%, 50%);\n          -ms-transform: translate(-50%, 50%);\n              transform: translate(-50%, 50%);\n}\n.onlivepage .forbidden-mode h5 {\n      font-size: 0.34rem;\n      color: #333333;\n      line-height: 1;\n}\n.onlivepage .forbidden-mode p {\n      font-size: 0.32rem;\n      /* 16/50 */\n      color: #666;\n      line-height: 1.2rem;\n}\n.onlivepage .forbidden-mode .mint-switch {\n      -webkit-box-pack: center;\n      -webkit-justify-content: center;\n          -ms-flex-pack: center;\n              justify-content: center;\n      margin: 0 auto 0.42rem auto;\n      width: 100%;\n      position: relative;\n}\n.onlivepage .forbidden-mode button {\n      font-size: 0.36rem;\n      color: #fff;\n      background-color: #c62f2f;\n      line-height: 1rem;\n      width: 100%;\n      border: 0px;\n}\n.onlivepage .finish-mode {\n    position: fixed;\n    bottom: 0;\n    left: 50%;\n    -webkit-transform: translate(-50%, 100%);\n        -ms-transform: translate(-50%, 100%);\n            transform: translate(-50%, 100%);\n    width: 80%;\n    background-color: #fff;\n    border-radius: 0.1rem;\n    padding: 0.42rem 0.48rem;\n    -webkit-transition: all 0.3s ease;\n    transition: all 0.3s ease;\n    z-index: 9999;\n}\n.onlivepage .finish-mode h5 {\n      font-size: 0.34rem;\n      color: #333333;\n      line-height: 1;\n      margin-bottom: 0.36rem;\n      text-align: center;\n}\n.onlivepage .finish-mode p {\n      font-size: 0.32rem;\n      color: #666;\n      line-height: 0.46rem;\n      margin-bottom: 0.26rem;\n}\n.onlivepage .finish-mode.active {\n      bottom: 50%;\n      -webkit-transform: translate(-50%, 50%);\n          -ms-transform: translate(-50%, 50%);\n              transform: translate(-50%, 50%);\n}\n.onlivepage .finish-mode .btns {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-pack: justify;\n      -webkit-justify-content: space-between;\n          -ms-flex-pack: justify;\n              justify-content: space-between;\n}\n.onlivepage .finish-mode .btns button {\n        width: 45%;\n        line-height: 0.9rem;\n        box-sizing: border-box;\n        font-size: 0.36rem;\n        text-align: center;\n        border-radius: 0.1rem;\n}\n.onlivepage .finish-mode .btns .cancel-btn {\n        color: #999999;\n        border: 1px solid #b2b2b2;\n        background-color: #fff;\n}\n.onlivepage .finish-mode .btns .confirm-btn {\n        color: #fff;\n        background-color: #c62f2f;\n        border: none;\n}\n.onlivepage .drop-record {\n    width: 85%;\n    border-radius: 0.06rem;\n    overflow: hidden;\n    background-color: #fff;\n    display: block;\n    height: auto;\n}\n.onlivepage .drop-record .msgcontent {\n      padding: 0.2rem 0.4rem 0.3rem 0.4rem;\n      min-height: 0.72rem;\n      position: relative;\n      font-size: 0.4rem;\n      line-height: 0.6rem;\n      text-align: center;\n}\n.onlivepage .drop-record .msgbtns {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      height: 1.32rem;\n      line-height: 0.9rem;\n}\n.onlivepage .drop-record .msgbtns a {\n        border-radius: 0.1rem;\n        height: 0.9rem;\n        font-size: 0.36rem;\n        line-height: 0.9rem;\n        width: 45%;\n        box-sizing: border-box;\n        text-align: center;\n        padding-top: 0;\n}\n.onlivepage .drop-record .msgbtns a:first-child {\n          margin-left: 0.4rem;\n          margin-right: 0.28rem;\n          color: #999;\n          border: 1px solid #b2b2b2;\n}\n.onlivepage .drop-record .msgbtns a:last-child {\n          color: #fff;\n          background-color: #c62f2f;\n          margin-left: 0.28rem;\n          margin-right: 0.4rem;\n}\n.onlivepage .operate-content .mint-popup {\n    height: 4.2rem;\n    display: inherit;\n}\n.onlivepage .operate-content .mint-popup a {\n      width: 25%;\n      height: 1.42rem;\n      float: left;\n      -webkit-box-flex: 0;\n      -webkit-flex: none;\n          -ms-flex: none;\n              flex: none;\n}\n.onlivepage .operate-content .mint-popup a:nth-child(5) span:before {\n        width: 1.24rem;\n        height: 1.3rem;\n        background: url(\"/images/live/fslj@2x.png\") no-repeat center center;\n        background-size: 1rem auto;\n}\n.onlivepage .operate-content .mint-popup a:nth-child(7) span:before {\n        width: 1.24rem;\n        height: 1.3rem;\n        background: url(\"/images/live/jykc@2x.png\") no-repeat center center;\n        background-size: 1rem auto;\n}\n.onlivepage .operate-content .mint-popup a.send-packet-btn span:before {\n        width: 1.24rem;\n        height: 1.3rem;\n        background: url(\"/images/live/ldhb@2x.png\") no-repeat center center;\n        background-size: 1rem auto;\n}\n.onlivepage .operate-content-mini .mint-popup {\n    height: 2.2rem;\n}\n.onlivepage .reward-mask {\n    position: fixed;\n    top: 0;\n    right: 0;\n    left: 0;\n    bottom: 0;\n    z-index: 999;\n    background: rgba(0, 0, 0, 0.5);\n}\n.onlivepage .reward {\n    position: fixed;\n    bottom: 0;\n    width: 100%;\n    -webkit-transform: translateY(100%);\n        -ms-transform: translateY(100%);\n            transform: translateY(100%);\n    -webkit-transition: -webkit-transform 0.3s ease;\n    transition: -webkit-transform 0.3s ease;\n    transition: transform 0.3s ease;\n    transition: transform 0.3s ease, -webkit-transform 0.3s ease;\n    background: #ffffff;\n    z-index: 1000;\n}\n.onlivepage .reward.active {\n      -webkit-transform: translateY(0);\n          -ms-transform: translateY(0);\n              transform: translateY(0);\n}\n.onlivepage .reward article {\n      position: relative;\n}\n.onlivepage .reward h5 {\n      line-height: 1rem;\n      color: #1c0808;\n      font-size: 0.32rem;\n      padding-left: 0.24rem;\n      height: 1rem;\n      border-bottom: 1px solid #e8e8e8;\n      text-align: center;\n      position: relative;\n}\n.onlivepage .reward h5 span {\n        position: absolute;\n        top: 0;\n        right: 0;\n        width: 1rem;\n        height: 1rem;\n        background: url(\"/images/cha.png\") no-repeat center center;\n        background-size: 32% 32%;\n}\n.onlivepage .reward .gift-container .swiper-container {\n      height: 5rem;\n      position: initial;\n}\n.onlivepage .reward .gift-container .swiper-container .swiper-wrapper {\n        position: initial;\n}\n.onlivepage .reward .gift-container .swiper-container .swiper-wrapper .swiper-slide a {\n          display: -webkit-box;\n          display: -webkit-flex;\n          display: -ms-flexbox;\n          display: flex;\n          float: left;\n          -webkit-box-orient: vertical;\n          -webkit-box-direction: normal;\n          -webkit-flex-direction: column;\n              -ms-flex-direction: column;\n                  flex-direction: column;\n          -webkit-box-align: center;\n          -webkit-align-items: center;\n              -ms-flex-align: center;\n                  align-items: center;\n          overflow: hidden;\n          width: 33.33333%;\n          height: 2.5rem;\n          padding-top: 0.2rem;\n          box-sizing: border-box;\n          border-bottom: 1px solid #e8e8e8;\n          background-color: #f5f7f8;\n          position: relative;\n}\n.onlivepage .reward .gift-container .swiper-container .swiper-wrapper .swiper-slide a:nth-child(3n-1) {\n            border-right: 1px solid #e8e8e8;\n            border-left: 1px solid #e8e8e8;\n}\n.onlivepage .reward .gift-container .swiper-container .swiper-wrapper .swiper-slide a.active {\n            border: 0.02rem solid #ff9696;\n            padding-top: 0.16rem;\n}\n.onlivepage .reward .gift-container .swiper-container .swiper-wrapper .swiper-slide a.vip-icon {\n            background: #f5f7f8 url(\"/images/inviteCard/invitation_card_label_vip.png\") no-repeat top right;\n            background-size: .76rem .76rem;\n}\n.onlivepage .reward .gift-container .swiper-container .swiper-wrapper .swiper-slide a .tag {\n            width: .36rem;\n            height: .36rem;\n            position: absolute;\n            bottom: .08rem;\n            right: .08rem;\n            background: url(\"/images/3.0/icon-18.png\") no-repeat 100%/100%;\n}\n.onlivepage .reward .gift-container .swiper-container .swiper-wrapper .swiper-slide a .gift-img {\n            background-repeat: no-repeat;\n            background-size: cover;\n            background-position: center center;\n            border-radius: 0.1rem;\n            width: 1.2rem;\n            height: 1.2rem;\n            margin-bottom: 0.08rem;\n}\n.onlivepage .reward .gift-container .swiper-container .swiper-wrapper .swiper-slide a h4 {\n            font-size: 0.32rem;\n            line-height: 0.6rem;\n            color: #333;\n}\n.onlivepage .reward .gift-container .swiper-container .swiper-wrapper .swiper-slide a p {\n            font-size: 0.26rem;\n            color: #888;\n}\n.onlivepage .reward .gift-container .swiper-container .swiper-pagination-bullet {\n        width: 4px;\n        height: 4px;\n        background: #888888;\n        border-radius: 0;\n        opacity: 1;\n        margin: 0 3px;\n}\n.onlivepage .reward .gift-container .swiper-container .swiper-pagination-bullet-active {\n        background: #c62f2f;\n}\n.onlivepage .reward .gift-container .swiper-container .swiper-pagination-bullets {\n        bottom: 1.54rem;\n}\n.onlivepage .reward .gift-container:after {\n      content: \"\";\n      display: block;\n      clear: both;\n}\n.onlivepage .reward .reward-bottom a {\n      display: block;\n}\n.onlivepage .reward .reward-bottom a:first-child {\n      font-size: 0.24rem;\n      color: #888;\n      text-align: center;\n      padding-bottom: .16rem;\n      padding-top: .4rem;\n}\n.onlivepage .reward .reward-bottom a:last-child {\n      display: block;\n      background-color: #888;\n      color: #fff;\n      font-size: 0.32rem;\n      line-height: 1rem;\n      height: 1rem;\n      width: 100%;\n      text-align: center;\n}\n.onlivepage .reward .reward-bottom a:last-child.active {\n        background-color: #c62f2f;\n}\n.onlivepage .aid-box {\n    width: 5.8rem;\n    background-color: #ffffff;\n    border-radius: 8px;\n}\n.onlivepage .aid-box main {\n      text-align: center;\n}\n.onlivepage .aid-box main img {\n        width: 2.8rem;\n        height: 2.8rem;\n        margin-top: .8rem;\n        margin-bottom: .48rem;\n}\n.onlivepage .aid-box main h3 {\n        color: #1c0808;\n        font-size: .32rem;\n}\n.onlivepage .aid-box main p {\n        font-size: .28rem;\n        color: #888888;\n        margin-top: .32rem;\n        margin-bottom: .54rem;\n}\n.onlivepage .aid-box button.close {\n      width: 100%;\n      height: 1rem;\n      background: #c62f2f;\n      color: #ffffff;\n      font-size: .36rem;\n      border-radius: 0 0 8px 8px;\n      border: none;\n}\n.onlivepage .aid-box .aid-container {\n      background: #ffffff;\n      border-radius: 0.07rem;\n      box-sizing: border-box;\n      margin: 36% auto;\n      position: relative;\n}\n.onlivepage .aid-box .aid-container .pic {\n        width: 3.73rem;\n        height: 3.73rem;\n        margin: 0 auto;\n}\n.onlivepage .aid-box .aid-container .pic img {\n          width: 3.73rem;\n          height: 3.73rem;\n}\n.onlivepage .aid-box .aid-container .aid-word {\n        font-size: .36rem;\n        color: #666666;\n        text-align: center;\n        margin: 0.53rem 0 0 0;\n}\n.onlivepage .aid-box .icon-cancel {\n      position: absolute;\n      display: block;\n      top: 0.15rem;\n      right: 0.15rem;\n      height: 0.42rem;\n      width: 0.42rem;\n      background: url(/images/space/cancel.png) center center no-repeat;\n      background-size: 100% 100%;\n}\n.onlivepage .closeOnLive-mode {\n    width: 70%;\n    padding: 0;\n    padding-top: 0.4rem;\n}\n.onlivepage .closeOnLive-mode p {\n      line-height: inherit;\n      text-align: left;\n      margin: 0.25rem 0;\n      padding: 0 .5rem;\n}\n.onlivepage .closeOnLive-mode .mint-switch-input:checked + .mint-switch-core {\n      background-color: #f9916d;\n      border-color: #f9916d;\n      width: 82px;\n}\n.onlivepage .closeOnLive-mode .mint-switch-input:checked + .mint-switch-core:after {\n      -webkit-transform: translateX(50px);\n      -ms-transform: translateX(50px);\n          transform: translateX(50px);\n}\n.onlivepage .answer-popup {\n    width: 6.3rem;\n    border-radius: 0.06rem;\n    box-sizing: border-box;\n    padding: 0.32rem 0.43rem;\n    text-align: center;\n}\n.onlivepage .answer-popup h5 {\n      font-size: 0.32rem;\n      color: #333;\n      line-height: 0.32rem;\n      margin-bottom: 0.54rem;\n}\n.onlivepage .answer-popup input {\n      display: block;\n      height: 0.92rem;\n      line-height: 0.92rem;\n      border-radius: 0.92rem;\n      text-align: center;\n      width: 100%;\n      margin-bottom: 0.82rem;\n      background-color: #f0f0f0;\n      font-size: 0.3rem;\n      color: #666;\n}\n.onlivepage .answer-popup button {\n      display: block;\n      width: 100%;\n      height: 0.9rem;\n      font-size: 0.36rem;\n      color: #fff;\n      border: none;\n      background-color: #c62f2f;\n      border-radius: 0.9rem;\n}\n.onlivepage .answer-popup button:disabled {\n      opacity: 0.5;\n}\n.onlivepage .answer-popup a.close-btn {\n      position: absolute;\n      width: 0.42rem;\n      height: 0.42rem;\n      top: 0.12rem;\n      right: 0.12rem;\n      background: url(\"/images/sprites.png\") no-repeat -2.21rem 0/7.5rem auto;\n}\n.onlivepage .answer-comment {\n    width: 6.3rem;\n    border-radius: 4px;\n    box-sizing: border-box;\n    height: auto;\n    overflow: hidden;\n}\n.onlivepage .answer-comment .answer-comment-box {\n      padding: 0.24rem;\n}\n.onlivepage .answer-comment textarea {\n      resize: none;\n      background-color: #fbf7f7;\n      border-radius: 4px;\n      width: 100%;\n      box-sizing: border-box;\n      font-size: 0.3rem;\n      color: #666;\n      height: 3.02rem;\n      padding: 0.26rem 0.28rem;\n      margin-bottom: 0.3rem;\n}\n.onlivepage .answer-comment label {\n      margin-bottom: 0.36rem;\n      display: block;\n}\n.onlivepage .answer-comment label span {\n        border: 1px solid #bbbbbb;\n        display: block;\n        width: 0.36rem;\n        height: 0.36rem;\n        box-sizing: border-box;\n        border-radius: .36rem;\n        margin-right: 0.16rem;\n}\n.onlivepage .answer-comment label input[type=\"checkbox\"] {\n        display: none;\n}\n.onlivepage .answer-comment label div {\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-align: center;\n        -webkit-align-items: center;\n            -ms-flex-align: center;\n                align-items: center;\n}\n.onlivepage .answer-comment label input:checked + div span {\n        border: none;\n        background-color: #bb7676;\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-align: center;\n        -webkit-align-items: center;\n            -ms-flex-align: center;\n                align-items: center;\n        -webkit-box-pack: center;\n        -webkit-justify-content: center;\n            -ms-flex-pack: center;\n                justify-content: center;\n}\n.onlivepage .answer-comment label input:checked + div span:before {\n          content: \"\";\n          width: 0.28rem;\n          height: 0.2rem;\n          display: block;\n          background: url(\"/images/sprites.png\") no-repeat 0 -4.32rem/7.5rem auto;\n}\n.onlivepage .answer-comment label input:checked + div p {\n        color: #666;\n}\n.onlivepage .answer-comment label p {\n        font-size: 0.32rem;\n        color: #999;\n}\n.onlivepage .answer-comment .btns {\n      background: #c62f2f;\n      height: auto;\n      overflow: hidden;\n      padding: 0.2rem;\n}\n.onlivepage .answer-comment .btns a {\n        padding: 0;\n        width: 49%;\n        height: 0.8rem;\n        line-height: .8rem;\n        text-align: center;\n        display: block;\n        font-size: 0.36rem;\n        border: none;\n        float: left;\n}\n.onlivepage .answer-comment .btns a:first-child {\n        border-right: 1px solid #e8e8e8;\n}\n.onlivepage .answer-comment .btns .cancel-btn {\n        color: #fff;\n        background-color: transparent;\n}\n.onlivepage .answer-comment .btns .confirm-btn {\n        color: #fff;\n        background-color: #c62f2f;\n}\n.mint-toast {\n  z-index: 9999;\n}\n.mint-switch {\n  -webkit-box-pack: center;\n  -webkit-justify-content: center;\n      -ms-flex-pack: center;\n          justify-content: center;\n  margin: 0 auto 0.42rem auto;\n  width: 40%;\n  position: relative;\n}\n.finish-mode {\n  position: fixed;\n  bottom: 0;\n  left: 50%;\n  -webkit-transform: translate(-50%, 100%);\n      -ms-transform: translate(-50%, 100%);\n          transform: translate(-50%, 100%);\n  width: 80%;\n  background-color: #fff;\n  border-radius: 0.1rem;\n  padding: 0.42rem 0.48rem;\n  -webkit-transition: all 0.3s ease;\n  transition: all 0.3s ease;\n  z-index: 9999;\n}\n.finish-mode h5 {\n    font-size: 0.34rem;\n    color: #333333;\n    line-height: 1;\n    margin-bottom: 0.36rem;\n    text-align: center;\n}\n.finish-mode p {\n    font-size: 0.32rem;\n    color: #666;\n    line-height: 0.46rem;\n    margin-bottom: 0.26rem;\n}\n.finish-mode.active {\n    bottom: 50%;\n    -webkit-transform: translate(-50%, 50%);\n        -ms-transform: translate(-50%, 50%);\n            transform: translate(-50%, 50%);\n}\n.finish-mode .btns {\n    display: -webkit-box;\n    display: -webkit-flex;\n    display: -ms-flexbox;\n    display: flex;\n    -webkit-box-pack: justify;\n    -webkit-justify-content: space-between;\n        -ms-flex-pack: justify;\n            justify-content: space-between;\n}\n.finish-mode .btns button {\n      width: 45%;\n      line-height: 0.9rem;\n      box-sizing: border-box;\n      font-size: 0.36rem;\n      text-align: center;\n      border-radius: 0.1rem;\n}\n.finish-mode .btns .cancel-btn {\n      color: #999999;\n      border: 1px solid #b2b2b2;\n      background-color: #fff;\n}\n.finish-mode .btns .confirm-btn {\n      color: #fff;\n      background-color: #c62f2f;\n      border: none;\n}\n.drop-record {\n  width: 85%;\n  border-radius: 0.06rem;\n  overflow: hidden;\n  background-color: #fff;\n  display: block;\n  height: auto;\n}\n.drop-record .msgcontent {\n    padding: 0.2rem 0.4rem 0.3rem 0.4rem;\n    min-height: 0.72rem;\n    position: relative;\n    font-size: 0.4rem;\n    line-height: 0.6rem;\n    text-align: center;\n}\n.drop-record .msgbtns {\n    display: -webkit-box;\n    display: -webkit-flex;\n    display: -ms-flexbox;\n    display: flex;\n    height: 1.32rem;\n    line-height: 0.9rem;\n}\n.drop-record .msgbtns a {\n      border-radius: 0.1rem;\n      height: 0.9rem;\n      font-size: 0.36rem;\n      line-height: 0.9rem;\n      width: 45%;\n      box-sizing: border-box;\n      text-align: center;\n      padding-top: 0;\n}\n.drop-record .msgbtns a:first-child {\n        margin-left: 0.4rem;\n        margin-right: 0.28rem;\n        color: #999;\n        border: 1px solid #b2b2b2;\n}\n.drop-record .msgbtns a:last-child {\n        color: #fff;\n        background-color: #c62f2f;\n        margin-left: 0.28rem;\n        margin-right: 0.4rem;\n}\n.operate-content .mint-popup {\n  height: 4.2rem;\n  display: inherit;\n}\n.operate-content .mint-popup a {\n    width: 25%;\n    height: 1.42rem;\n    float: left;\n    -webkit-box-flex: 0;\n    -webkit-flex: none;\n        -ms-flex: none;\n            flex: none;\n}\n.operate-content .mint-popup a:nth-child(5) span:before {\n      width: 1.24rem;\n      height: 1.3rem;\n      background: url(\"/images/live-13.png\") no-repeat center center;\n      background-size: 50% 50%;\n}\n.operate-content .mint-popup a:nth-child(7) span:before {\n      width: 1.24rem;\n      height: 1.3rem;\n      background: url(\"/images/live-15icon.png\") no-repeat center center;\n      background-size: 50% 50%;\n}\n.operate-content .mint-popup a.send-packet-btn span:before {\n      content: \"\";\n      display: inline-block;\n      width: 0.54rem;\n      height: 0.62rem;\n      background: url(\"/images/sprites.png\") no-repeat -1.63rem 0/7.5rem auto;\n}\n.operate-content-mini .mint-popup {\n  height: 2.2rem;\n}\n\n/*.reward-mask {\n        position: fixed;\n        top: 0;\n        right: 0;\n        left: 0;\n        bottom: 0;\n        z-index: 999;\n    }\n\n    .reward {\n        position: fixed;\n        bottom: 0;\n        left: 0;\n        width: 100%;\n        transform: translateY(100%);\n        transition: transform 0.3s ease;\n        background: url(\"/images/live-20.png\") no-repeat (center center)/(100% 100%);\n        z-index: 1000;\n        &.active {\n            transform: translateY(0);\n        }\n        h5 {\n            line-height: 0.7rem;\n            color: #333;\n            font-size: 0.3rem;\n            padding-left: 0.24rem;\n            height: 0.7rem;\n            border-bottom: 1px solid #ebeded;\n        }\n        .gift-container {\n            a {\n                display: flex;\n                float: left;\n                flex-direction: column;\n                align-items: center;\n                overflow: hidden;\n                width: 33.33333%;\n                height: 2.5rem;\n                padding-top: 0.2rem;\n                box-sizing: border-box;\n                border-bottom: 1px solid #ebebeb;\n                &:nth-child(2),\n                &:nth-child(5) {\n                    border-right: 1px solid #ebebeb;\n                    border-left: 1px solid #ebebeb;\n                }\n                &.active {\n                    background-color: rgba(255, 255, 255, 0.5);\n                    border: 0.04rem solid #f3dbdd;\n                    padding-top: 0.16rem;\n                }\n                .gift-img {\n                    background-repeat: no-repeat;\n                    background-size: cover;\n                    background-position: center center;\n                    border-radius: 0.1rem;\n                    width: 1.2rem;\n                    height: 1.2rem;\n                    margin-bottom: 0.08rem;\n                }\n                h4 {\n                    font-size: 0.32rem;\n                    line-height: 0.6rem;\n                    color: #333;\n                }\n                p {\n                    font-size: 0.26rem;\n                    color: #888;\n                }\n            }\n            &:after {\n                content: \"\";\n                display: block;\n                clear: both;\n            }\n        }\n        .reward-bottom {\n            height: 0.98rem;\n            display: flex;\n            align-items: center;\n            justify-content: space-between;\n            padding: 0 0.24rem;\n            a:first-child {\n                line-height: 0.98rem;\n                font-size: 0.3rem;\n                color: #333;\n                span {\n                    color: #f75454;\n                }\n            }\n            a:last-child {\n                display: block;\n                background-color: #b2b2b2;\n                color: #fff;\n                font-size: 0.3rem;\n                line-height: 0.52rem;\n                height: 0.52rem;\n                width: 1.2rem;\n                text-align: center;\n                border-radius: 0.04rem;\n                &.active {\n                    background-color: #f75454;\n                }\n            }\n        }\n    }\n*/\n/*.aid-box {\n        width: 100%;\n        height: 100%;\n        padding: 0 0.85rem;\n        background-color: transparent;\n        .aid-container {\n            width: 7rem;\n            padding: 1.33rem 0;\n            background: #ffffff;\n            border-radius: 0.07rem;\n            box-sizing: border-box;\n            margin: 36% auto;\n            position: relative;\n            .pic {\n                width: 3.73rem;\n                height: 3.73rem;\n                margin: 0 auto;\n                img {\n                    width: 3.73rem;\n                    height: 3.73rem;\n                }\n            }\n            .aid-word {\n                font-size: 0.36rem;\n                color: #666666;\n                text-align: center;\n                margin: 0.53rem 0 0 0;\n            }\n        }\n        .icon-cancel {\n            position: absolute;\n            display: block;\n            top: 0.15rem;\n            right: 0.15rem;\n            height: 0.42rem;\n            width: 0.42rem;\n            background: url(/images/space/cancel.png) center center no-repeat;\n            background-size: 100% 100%;\n        }\n    }*/\n.paybox {\n  width: 100%;\n  box-sizing: border-box;\n  padding: 0 0.85rem;\n  background-color: transparent;\n}\n.paybox .pay-icon {\n    position: absolute;\n    width: 3.59rem;\n    height: 3.21rem;\n    background: url(\"/images/outofmoney.png\") no-repeat center center/100% 100%;\n    left: 50%;\n    top: -1.61rem;\n    -webkit-transform: translateX(-50%);\n        -ms-transform: translateX(-50%);\n            transform: translateX(-50%);\n}\n.paybox .pay-container {\n    background-color: #fff;\n    border-radius: 0.06rem;\n    text-align: center;\n    padding-top: 2.24rem;\n    padding-bottom: 0.6rem;\n    position: relative;\n}\n.paybox .pay-container h5 {\n      font-size: 0.36rem;\n      color: #333;\n      margin-bottom: 0.48rem;\n}\n.paybox .pay-container p {\n      color: #666;\n      font-size: 0.32rem;\n      margin-bottom: 0.58rem;\n}\n.paybox .pay-container a {\n      display: inline-block;\n      width: 2.48rem;\n      height: 0.8rem;\n      line-height: 0.8rem;\n      background-color: #f34a4a;\n      color: #fff;\n      font-size: 0.36rem;\n      border-radius: 0.06rem;\n}\n.paybox .pay-container .icon-cancel {\n      position: absolute;\n      display: block;\n      top: 0.15rem;\n      right: 0.15rem;\n      height: 0.42rem;\n      width: 0.42rem;\n      background: url(/images/space/cancel.png) center center no-repeat;\n      background-size: 100% 100%;\n}\n.closeOnLive-mode {\n  width: 70%;\n  padding: 0.4rem 0.5rem;\n}\n.closeOnLive-mode p {\n    line-height: inherit;\n    text-align: left;\n    margin: 0.25rem 0;\n}\n.closeOnLive-mode .mint-switch-input:checked + .mint-switch-core {\n    background-color: #4cd864;\n    border-color: #4cd864;\n}\n.answer-popup {\n  width: 6.3rem;\n  border-radius: 0.06rem;\n  box-sizing: border-box;\n  padding: 0.32rem 0.43rem;\n  text-align: center;\n}\n.answer-popup h5 {\n    font-size: 0.32rem;\n    color: #333;\n    line-height: 0.32rem;\n    margin-bottom: 0.54rem;\n}\n.answer-popup input {\n    display: block;\n    height: 0.92rem;\n    line-height: 0.92rem;\n    border-radius: 4px;\n    text-align: center;\n    width: 100%;\n    margin-bottom: 0.82rem;\n    background-color: #f0f0f0;\n    font-size: 0.3rem;\n    color: #666;\n}\n.answer-popup button {\n    display: block;\n    width: 100%;\n    height: 0.9rem;\n    font-size: 0.36rem;\n    color: #fff;\n    border: none;\n    background-color: #5f86fc;\n    border-radius: 4px;\n}\n.answer-popup button:disabled {\n    opacity: 0.5;\n}\n.answer-popup a.close-btn {\n    position: absolute;\n    width: 0.42rem;\n    height: 0.42rem;\n    top: 0.12rem;\n    right: 0.12rem;\n    background: url(\"/images/sprites.png\") no-repeat -2.21rem 0/7.5rem auto;\n}\n.answer-comment {\n  width: 6.3rem;\n  border-radius: 4px;\n  box-sizing: border-box;\n}\n.answer-comment textarea {\n    resize: none;\n    background-color: #f4f6fc;\n    border-radius: 4px;\n    width: 100%;\n    box-sizing: border-box;\n    font-size: 0.3rem;\n    color: #666;\n    height: 3.02rem;\n    padding: 0.26rem 0.28rem;\n    margin-bottom: 0.3rem;\n}\n.answer-comment label {\n    margin-bottom: 0.36rem;\n    display: block;\n}\n.answer-comment label span {\n      border: 1px solid #bbbbbb;\n      display: block;\n      width: 0.36rem;\n      height: 0.36rem;\n      box-sizing: border-box;\n      border-radius: 4px;\n      margin-right: 0.16rem;\n}\n.answer-comment label input[type=\"checkbox\"] {\n      display: none;\n}\n.answer-comment label div {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n}\n.answer-comment label input:checked + div span {\n      border: none;\n      background-color: #5f86fc;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n      -webkit-box-pack: center;\n      -webkit-justify-content: center;\n          -ms-flex-pack: center;\n              justify-content: center;\n}\n.answer-comment label input:checked + div span:before {\n        content: \"\";\n        width: 0.28rem;\n        height: 0.2rem;\n        display: block;\n        background: url(\"/images/sprites.png\") no-repeat 0 -4.32rem/7.5rem auto;\n}\n.answer-comment label input:checked + div p {\n      color: #666;\n}\n.answer-comment label p {\n      font-size: 0.32rem;\n      color: #999;\n}\n.answer-comment .btns {\n    display: -webkit-box;\n    display: -webkit-flex;\n    display: -ms-flexbox;\n    display: flex;\n    padding: 0 0.15rem;\n    -webkit-box-pack: justify;\n    -webkit-justify-content: space-between;\n        -ms-flex-pack: justify;\n            justify-content: space-between;\n}\n.answer-comment .btns button {\n      padding: 0;\n      box-sizing: border-box;\n      width: 2.48rem;\n      height: 0.9rem;\n      display: block;\n      border-radius: 4px;\n      font-size: 0.36rem;\n      border: none;\n}\n.answer-comment .btns .cancel-btn {\n      color: #999;\n      border: 1px solid #b2b2b2;\n      background-color: transparent;\n}\n.answer-comment .btns .confirm-btn {\n      color: #fff;\n      background-color: #c62f2f;\n}\n.mint-toast {\n  z-index: 9999;\n}\n.tips {\n  height: .6rem;\n  line-height: .6rem;\n  text-align: center;\n  color: #b2b2b2;\n}\n.tips span {\n    display: inline-block;\n    font-size: .26rem;\n}\n.s-mb {\n  margin-bottom: .6rem;\n}\n@-webkit-keyframes commentRoom {\n0% {\n    opacity: 1;\n    display: block;\n}\n90% {\n    opacity: 0.6;\n}\n100% {\n    opacity: 0;\n    display: none;\n}\n}\n@keyframes commentRoom {\n0% {\n    opacity: 1;\n    display: block;\n}\n90% {\n    opacity: 0.6;\n}\n100% {\n    opacity: 0;\n    display: none;\n}\n}\n.concentrate {\n  color: #888;\n}\n.concentrate span {\n    background: #888;\n    border: 0.08rem solid #f5f7f8;\n    box-shadow: 0 0 0 1px #888888;\n}\n.concentrateActive {\n  color: #c62f2f;\n}\n.concentrateActive span {\n    background: #c62f2f;\n    border: 0.08rem solid #f5f7f8;\n    box-shadow: 0 0 0 1px #c62f2f;\n}\n.concentrateBox {\n  background-color: #f5f7f8;\n  height: 0.8rem;\n  line-height: 0.8rem;\n  font-size: 0.32rem;\n  padding: 0px 0.24rem;\n  width: 1.12rem;\n  font-size: 0.28rem;\n  border-left: 1px solid #e8e8e8;\n}\n.concentrateBox span {\n    margin-top: 0.24rem;\n    margin-right: 0.16rem;\n    width: .2rem;\n    height: .2rem;\n    border-radius: 50%;\n    float: left;\n}\n.is-placemiddle {\n  width: 2.5rem;\n}\n.is-placemiddle .icon-success {\n    background: url(\"/images/live/icon-success.png\") center no-repeat;\n    width: 1rem;\n    height: 1rem;\n    background-size: 100%;\n    margin: 0 auto;\n}\n.mint-switch-core {\n  width: 82px;\n}\n.mint-switch-core:before {\n  width: 80px;\n  background: #fbb299;\n}\n.mint-switch-core:after {\n  opacity: 0.5;\n}\n", ""]);

// exports


/***/ }),

/***/ 997:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n@charset \"UTF-8\";\n.mint-indicator {\n  z-index: 111111111111;\n  top: 0;\n  position: fixed;\n}\n.ppt-edit {\n  position: fixed;\n  top: 0;\n  -webkit-overflow-scrolling: auto;\n  -webkit-transform: translateY(100%);\n      -ms-transform: translateY(100%);\n          transform: translateY(100%);\n  width: 100%;\n  height: 100%;\n  z-index: 2000;\n  background-color: #fff;\n  display: -webkit-box;\n  display: -webkit-flex;\n  display: -ms-flexbox;\n  display: flex;\n  -webkit-box-orient: vertical;\n  -webkit-box-direction: normal;\n  -webkit-flex-direction: column;\n      -ms-flex-direction: column;\n          flex-direction: column;\n  font-size: 0.32rem;\n  color: #666;\n  -webkit-transition: -webkit-transform 0.3s ease;\n  transition: -webkit-transform 0.3s ease;\n  transition: transform 0.3s ease;\n  transition: transform 0.3s ease, -webkit-transform 0.3s ease;\n}\n.ppt-edit .load {\n    height: 100%;\n    width: 100%;\n    position: fixed;\n    top: 0;\n    left: 0;\n    z-index: 11111111;\n    text-align: center;\n    display: -webkit-box;\n    display: -webkit-flex;\n    display: -ms-flexbox;\n    display: flex;\n}\n.ppt-edit .load p {\n      width: 1rem;\n      height: 1rem;\n      background: url(\"/images/3.0/load.gif\") center center no-repeat;\n      background-size: 0.81rem 0.83rem;\n      margin: auto;\n}\n.ppt-edit .box {\n    overflow-y: auto;\n    -webkit-overflow-scrolling: touch;\n    z-index: 11;\n    padding: 0.96rem 0 0.88rem;\n}\n.ppt-edit.active {\n    -webkit-transform: translateY(0);\n        -ms-transform: translateY(0);\n            transform: translateY(0);\n}\n.ppt-edit .mint-spinner-snake {\n    height: 0.5rem !important;\n    width: 0.5rem !important;\n}\n.ppt-edit .material {\n    padding: 0.2rem 0.32rem;\n    overflow: scroll;\n    -webkit-overflow-scrolling: touch;\n    /* 当手指从触摸屏上移开，滚动会立即停止 */\n}\n.ppt-edit .material li {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      height: 1.8rem;\n      margin-bottom: 0.25rem;\n}\n.ppt-edit .material li img {\n        height: 100%;\n        max-width: 100%;\n        max-height: 1.8rem;\n        display: block;\n        margin: auto;\n}\n.ppt-edit .material .box-r {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n      -webkit-justify-content: space-around;\n          -ms-flex-pack: distribute;\n              justify-content: space-around;\n}\n.ppt-edit .material .box-r input {\n        border: 1px solid #eee;\n        width: 1.6rem;\n        margin-left: 0.2rem;\n        padding: .2rem 0;\n        text-align: center;\n        color: #333;\n}\n.ppt-edit .material .delete-btn {\n      display: inline-block;\n      width: 0.5rem;\n      height: 0.46rem;\n      background: url(\"/images/3.0/delect_btn.png\") center center no-repeat;\n      background-size: 0.5rem 0.46rem;\n}\n.ppt-edit .material .img-box {\n      position: relative;\n      margin-right: 0.4rem;\n      -webkit-box-pack: center;\n      -webkit-justify-content: center;\n          -ms-flex-pack: center;\n              justify-content: center;\n      background: rgba(0, 0, 0, 0.85);\n}\n.ppt-edit .material .img-box span {\n        height: 0.4rem;\n        line-height: 0.4rem;\n        position: absolute;\n        right: 0.1rem;\n        bottom: 0.15rem;\n        color: #fff;\n        padding: 0 0.1rem;\n        font-size: 0.2rem;\n        border-radius: 0.012rem;\n        background-color: rgba(0, 0, 0, 0.4);\n}\n.ppt-edit .material .item {\n      -webkit-box-flex: 1;\n      -webkit-flex: 1;\n          -ms-flex: 1;\n              flex: 1;\n      width: 50%;\n}\n.ppt-edit h5 {\n    position: fixed;\n    top: 0;\n    height: 0.88rem;\n    display: -webkit-box;\n    display: -webkit-flex;\n    display: -ms-flexbox;\n    display: flex;\n    box-sizing: border-box;\n    width: 100%;\n    line-height: 0.88rem;\n    -webkit-box-align: center;\n    -webkit-align-items: center;\n        -ms-flex-align: center;\n            align-items: center;\n    padding: 0 0.2rem;\n    z-index: 111;\n    background: #fff;\n    border-bottom: 1px solid #ededed;\n}\n.ppt-edit h5 a {\n      -webkit-box-flex: 1;\n      -webkit-flex: 1;\n          -ms-flex: 1;\n              flex: 1;\n      font-size: 0.28rem;\n}\n.ppt-edit h5 a:nth-child(1) {\n        background: url(\"/images/3.0/below.png\") left center no-repeat;\n        background-size: 0.26rem auto;\n        padding-left: 0.4rem;\n        color: #c62f2f;\n}\n.ppt-edit h5 a:nth-child(2) {\n        text-align: right;\n        color: #c62f2f;\n        font-size: 0.26rem;\n}\n.ppt-edit h5 a:nth-child(2) span {\n          display: inline-block;\n          height: 0.44rem;\n          line-height: 0.44rem;\n          padding: 0 0.2rem;\n          border-radius: 0.5rem;\n          border: 1px solid #c62f2f;\n}\n.ppt-edit h5 a span.cancel-btn {\n        border: 1px solid #ccc;\n        color: #ccc;\n        margin-right: 0.2rem;\n}\n.ppt-edit .txt {\n    padding: 0.2rem 0.4rem;\n    line-height: 0.4rem;\n    font-size: 0.26rem;\n    color: #999;\n    border-bottom: 1px solid #ededed;\n}\n.ppt-edit .txt a {\n      color: #c62f2f;\n}\n.ppt-edit .submit-btn {\n    position: fixed;\n    width: 100%;\n    color: #fff;\n    background-color: #c62f2f;\n    bottom: 0;\n    height: 0.96rem;\n    text-align: center;\n    z-index: 111;\n    line-height: 0.96rem;\n}\n", ""]);

// exports


/***/ })

});