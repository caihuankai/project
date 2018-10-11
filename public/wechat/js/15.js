webpackJsonp([15,93],{

/***/ 1102:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(938),
  /* template */
  __webpack_require__(1214),
  /* styles */
  null,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\subcomponents\\index\\router-click-link.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] router-click-link.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-ced853d0", Component.options)
  } else {
    hotAPI.reload("data-v-ced853d0", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 1122:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    ref: "body",
    staticClass: "dacelve-index"
  }, [
    [_c('div', {
      staticClass: "top"
    }, [_c('div', {
      staticClass: "gra"
    }, [_c('div', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (_vm.noticeData.length > 0),
        expression: "noticeData.length>0"
      }],
      staticClass: "notice flex"
    }, [_c('div', {
      staticClass: "tag"
    }), _vm._v(" "), _c('div', {
      staticClass: "item"
    }, [_c('div', {
      staticClass: "content"
    }, [_c('div', {
      staticClass: "notice-container flex"
    }, _vm._l((_vm.noticeData), function(item) {
      return _c('p', {
        key: item.id
      }, [_vm._v(_vm._s(item.title))])
    }))])])]), _vm._v(" "), _c('div', {
      staticClass: "top-banner"
    }, [(_vm.banner.length > 0) ? [_c('mt-swipe', {
      attrs: {
        "auto": 5000
      }
    }, _vm._l((_vm.banner), function(item) {
      return _c('mt-swipe-item', {
        key: item.adId
      }, [_c('div', {
        staticClass: "hotImg"
      }, [_c('a', {
        attrs: {
          "href": "javascript:;"
        }
      }, [_c('p', [_c('img', {
        attrs: {
          "src": ("" + (item.adFile))
        },
        on: {
          "click": function($event) {
            _vm.tapAd(item)
          }
        }
      })])])])])
    }))] : _vm._e()], 2)]), _vm._v(" "), _c('div', {
      staticClass: "homeNav"
    }, [(_vm.columnData.length > 0) ? [_c('section', {
      staticClass: "item item1"
    }, [_vm._l((_vm.headerarr.slice(0, 4)), function(item) {
      return [(item.target_id == 22) ? _c('router-link', {
        attrs: {
          "to": '/realDisk/' + item.target_id + '/0'
        }
      }, [_c('p', [_c('img', {
        attrs: {
          "src": item.logo_img
        }
      })]), _vm._v(" "), _c('span', [_vm._v(_vm._s(item.navigation_name))])]) : (item.target_id == 0) ? _c('router-link', {
        attrs: {
          "to": "/liveList"
        }
      }, [_c('p', [_c('img', {
        attrs: {
          "src": item.logo_img
        }
      })]), _vm._v(" "), _c('span', [_vm._v(_vm._s(item.navigation_name))])]) : (item.target_id == 1707556) ? _c('router-link', {
        attrs: {
          "to": "/collegeIndex"
        }
      }, [_c('p', [_c('img', {
        attrs: {
          "src": item.logo_img
        }
      })]), _vm._v(" "), _c('span', [_vm._v(_vm._s(item.navigation_name))])]) : _c('router-link', {
        attrs: {
          "to": '/periodical/' + item.target_id
        }
      }, [_c('p', [_c('img', {
        attrs: {
          "src": item.logo_img
        }
      })]), _vm._v(" "), _c('span', [_vm._v(_vm._s(item.navigation_name))])])]
    })], 2), _vm._v(" "), _c('section', {
      staticClass: "item"
    }, [_vm._l((_vm.headerarr.slice(4, 8)), function(item) {
      return [(item.target_id == 22) ? _c('router-link', {
        attrs: {
          "to": '/realDisk/' + item.target_id + '/0'
        }
      }, [_c('p', [_c('img', {
        attrs: {
          "src": item.logo_img
        }
      })]), _vm._v(" "), _c('span', [_vm._v(_vm._s(item.navigation_name))])]) : (item.target_id == 0) ? _c('router-link', {
        attrs: {
          "to": "/liveList"
        }
      }, [_c('p', [_c('img', {
        attrs: {
          "src": item.logo_img
        }
      })]), _vm._v(" "), _c('span', [_vm._v(_vm._s(item.navigation_name))])]) : (item.target_id == 1707556) ? _c('router-link', {
        attrs: {
          "to": "/collegeIndex"
        }
      }, [_c('p', [_c('img', {
        attrs: {
          "src": item.logo_img
        }
      })]), _vm._v(" "), _c('span', [_vm._v(_vm._s(item.navigation_name))])]) : _c('router-link', {
        attrs: {
          "to": '/periodical/' + item.target_id
        }
      }, [_c('p', [_c('img', {
        attrs: {
          "src": item.logo_img
        }
      })]), _vm._v(" "), _c('span', [_vm._v(_vm._s(item.navigation_name))])])]
    })], 2)] : _vm._e()], 2)]), _vm._v(" "), _c('div', {
      staticClass: "liveCourse"
    }, [_c('div', {
      staticClass: "courseBox"
    }, [(_vm.LiveToday.length > 0 || _vm.courseEnd) ? _c('div', {
      staticClass: "title"
    }, [_c('h5', [_vm._v("互动课堂")]), _vm._v(" "), (_vm.LiveToday.length > 0) ? [_c('ul', {
      staticClass: "img"
    }, [_vm._l((_vm.onlineHeadAddList), function(data, i) {
      return _c('li', [_c('img', {
        attrs: {
          "src": data
        }
      })])
    }), _vm._v(" "), _c('span', [_vm._v(_vm._s(_vm.LiveToday[0].online_num) + "人 在线")])], 2)] : _vm._e()], 2) : _vm._e(), _vm._v(" "), (_vm.courseEnd) ? [_c('div', {
      staticClass: "noCourse",
      class: {
        active: _vm.videonth
      }
    }, [_c('img', {
      attrs: {
        "src": _vm.courseEndImg
      }
    }), _vm._v(" "), (_vm.videonth) ? [_c('router-link', {
      staticClass: "img-mask",
      attrs: {
        "to": "/publicOnlive"
      }
    }, [_c('img', {
      attrs: {
        "src": "/images/index/bigplay_ben.png",
        "alt": ""
      }
    })])] : _vm._e()], 2)] : _c('swiper', {
      ref: "mySwiper5",
      attrs: {
        "options": _vm.courseSwiperOption
      },
      on: {
        "transitionEnd": _vm.slideChanged
      }
    }, _vm._l((_vm.LiveToday), function(item) {
      return _c('swiper-slide', {
        directives: [{
          name: "show",
          rawName: "v-show",
          value: (_vm.LiveToday.length != 0),
          expression: "LiveToday.length!=0"
        }],
        key: item.id
      }, [_c('div', {
        staticClass: "hotImg"
      }, [_c('router-link', {
        attrs: {
          "to": "/publicOnlive"
        }
      }, [_c('div', {
        staticClass: "list"
      }, [_c('section', {
        staticClass: "mask-block"
      }), _vm._v(" "), _c('main', {
        staticClass: "main"
      }, [_c('div', {
        staticClass: "teacher-pic"
      }, [_c('img', {
        attrs: {
          "src": _vm.getHeader(item.user_id, item.live_head_add)
        }
      }), _c('br')]), _vm._v(" "), _c('section', {
        staticClass: "info"
      }, [_c('h5', {
        staticClass: "cate"
      }, [_c('i', [_vm._v("#" + _vm._s(item.classification))]), _vm._v(_vm._s(item.cate_name))]), _vm._v(" "), _c('h1', {
        staticClass: "cour-name"
      }, [_vm._v(_vm._s(item.class_name))]), _vm._v(" "), _c('p', {
        staticClass: "time"
      }, [_vm._v("\n                                        直播时间:" + _vm._s(item.set_start_time.substring(11, 16)) + "-" + _vm._s(item.set_end_time.substring(11, 16)))])]), _vm._v(" "), _c('div', {
        staticClass: "footer"
      }, [_c('img', {
        staticClass: "head",
        attrs: {
          "src": item.head_add,
          "alt": ""
        }
      }), _vm._v(" "), _c('span', {
        staticClass: "teac-name"
      }, [_vm._v(_vm._s(item.alias))]), _vm._v(" "), [(item.state == 1) ? _c('img', {
        staticClass: "live-icon",
        attrs: {
          "src": "/images/index/live-icon02.png"
        }
      }) : (item.state == 2) ? _c('img', {
        staticClass: "live-icon",
        attrs: {
          "src": "/images/index/live-icon01.png"
        }
      }) : (item.state == 3) ? _c('img', {
        staticClass: "live-icon",
        attrs: {
          "src": "/images/index/live-icon03.png"
        }
      }) : _vm._e()], _vm._v(" "), [(item.state == 2) ? _c('img', {
        staticClass: "ing-gif",
        attrs: {
          "src": "/images/index/dadezhibozhong-ben.gif",
          "alt": ""
        }
      }) : _c('img', {
        staticClass: "ing-gif",
        attrs: {
          "src": "/images/index/hudong-weibofang-ben.png",
          "alt": ""
        }
      })]], 2)])])])], 1)])
    })), _vm._v(" "), _c('div', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: ((_vm.danmuData.length > 0 || _vm.danmuData2.length > 0)),
        expression: "(danmuData.length > 0 || danmuData2.length > 0) "
      }],
      staticClass: "barrage-box"
    }, [_c('danmu', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (_vm.danmuData.length > 0),
        expression: "danmuData.length > 0"
      }],
      ref: "barrage",
      staticClass: "barrage"
    }), _vm._v(" "), _c('danmu', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (_vm.danmuData2.length > 0),
        expression: "danmuData2.length > 0"
      }],
      ref: "barrage1",
      staticClass: "barrage1"
    })], 1)], 2)]), _vm._v(" "), (_vm.stockData.length > 0) ? _c('div', {
      staticClass: "chance-stock"
    }, [_vm._m(0), _vm._v(" "), _c('ul', _vm._l((_vm.stockData.slice(0, 4)), function(item) {
      return _c('li', [_c('a', {
        attrs: {
          "href": "javascript:;"
        }
      }, [_c('h4', [_vm._v(_vm._s(item.stock_name))]), _vm._v(" "), _c('p', [_vm._v(_vm._s(item.stock_num))]), _vm._v(" "), (item.type == 1) ? [_c('h5', [_vm._v("+" + _vm._s(item.pricechangeratio) + "%")])] : [_c('h5', {
        staticClass: "die"
      }, [_vm._v(_vm._s(item.pricechangeratio) + "%")])]], 2)])
    }))]) : _vm._e(), _vm._v(" "), (_vm.courseAd.length > 0) ? _c('div', {
      staticClass: "course-ad"
    }, [_c('mt-cell', {
      attrs: {
        "title": "99学院"
      }
    }, [_c('img', {
      attrs: {
        "src": "images/2.0/99xylm.png"
      },
      slot: "icon"
    })]), _vm._v(" "), _c('swiper', {
      attrs: {
        "options": _vm.swiperOptionAd
      }
    }, [_vm._l((_vm.courseAd), function(item) {
      return [_c('swiper-slide', [(item.target_type != 3) ? _c('router-link', {
        attrs: {
          "to": '/personalCenter/course/' + item.type_id + '&' + _vm.userId
        }
      }, [_c('img', {
        attrs: {
          "src": item.cover_img,
          "alt": ""
        }
      })]) : _c('router-link', {
        attrs: {
          "to": '/personalSpace/lobbyPage/' + item.type_id + '/' + _vm.userId
        }
      }, [_c('img', {
        attrs: {
          "src": item.cover_img,
          "alt": ""
        }
      })])], 1)]
    })], 2)], 1) : _vm._e(), _vm._v(" "), (_vm.reading.length > 0) ? _c('div', {
      staticClass: "reading"
    }, [_c('h5', {
      staticClass: "title"
    }, [_c('span', [_vm._v("深度阅读")]), _vm._v(" "), _c('router-link', {
      attrs: {
        "to": "/realDisk/22/0"
      }
    }, [_vm._v("\n                更多\n            ")])], 1), _vm._v(" "), _c('div', {
      staticClass: "list"
    }, [_vm._l((_vm.reading), function(item, index) {
      return [_c('div', {
        staticClass: "a"
      }, [_c('a', {
        key: item.type_id,
        staticClass: "picture-1",
        class: {
          hot: index == 0
        },
        attrs: {
          "href": "javascript:;"
        },
        on: {
          "click": function($event) {
            _vm.indexColumnLink(item)
          }
        }
      }, [_c('div', {
        staticClass: "reading-container"
      }, [_c('div', {
        staticClass: "picture-1-main flex"
      }, [_c('div', {
        staticClass: "item"
      }, [_c('h5', [(item.top_status == 1) ? _c('span', {
        staticClass: "top-status"
      }, [_c('small', [_vm._v("TOP")])]) : _vm._e(), (item.cateName != '' && item.cateName != null) ? _c('span', {
        staticClass: "cate"
      }, [_vm._v(_vm._s(item.cateName))]) : _vm._e(), (item.level == 1) ? _c('i') : _vm._e(), _vm._v(" "), _c('h6', [_vm._v(_vm._s(item.title))])]), _vm._v(" "), _c('p', [_vm._v(_vm._s(item.lead))])]), _vm._v(" "), (item.coverPic != null && item.coverPic != '') ? [(item.coverPic.indexOf('http') != -1) ? _c('div', {
        staticClass: "img",
        style: ({
          'background-image': ("url('" + (item.coverPic) + "')")
        })
      }) : _c('div', {
        staticClass: "img",
        style: ({
          'background-image': 'url(http://os700oap7.bkt.clouddn.com/' + item.coverPic + ')'
        })
      })] : [_c('div', {
        staticClass: "img",
        staticStyle: {
          "background-image": "url('/images/column/defaultCover.png')"
        }
      })]], 2)])]), _vm._v(" "), _c('div', {
        staticClass: "bottom-info flex"
      }, [_c('div', {
        staticClass: "author flex"
      }, [_c('p', {
        staticClass: "time"
      }, [_vm._v(_vm._s(_vm.computeTime(item.publish_time)))]), _vm._v(" "), _c('span', [_vm._v("来自")]), _vm._v(" "), _c('p', {
        staticClass: "name single-text"
      }, [_vm._v("\n                                " + _vm._s(item.alias.length > 5 ? item.alias.slice(0, 5) : item.alias))]), _vm._v(" "), (item.title_cate.length > 0 && item.title_cate[0] != '') ? _vm._l((item.title_cate.slice(0, 2)), function(list) {
        return (list != '') ? _c('p', {
          staticClass: "title-cate"
        }, [_c('span', [_vm._v(_vm._s(list.length > 4 ? list.slice(0, 4) : list))])]) : _vm._e()
      }) : _vm._e()], 2), _vm._v(" "), _c('div', {
        staticClass: "bottom-right flex"
      }, [_c('div', {
        staticClass: "watch-nums flex"
      }, [_c('span', {
        staticClass: "watch-icon"
      }), _vm._v(" "), _c('span', [_vm._v(_vm._s(item.study_num > 9999 ? '9999+' : item.study_num))])]), _vm._v(" "), _c('div', {
        staticClass: "like-nums flex",
        class: {
          'active': item.isread
        }
      }, [_c('span', {
        staticClass: "like-icon"
      }), _vm._v(" "), _c('span', [_vm._v(_vm._s(item.like_num > 9999 ? '9999+' : item.like_num))])])])])])]
    }), _vm._v(" "), (_vm.readingmore) ? _c('div', {
      staticClass: "loadmore",
      on: {
        "click": _vm.getMoreReading
      }
    }, [_c('p', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (!_vm.readingloading),
        expression: "!readingloading"
      }]
    }, [_vm._v("点击加载更多"), _c('i')]), _vm._v(" "), _c('span', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (_vm.readingloading),
        expression: "readingloading"
      }]
    }, [_c('mt-spinner', {
      attrs: {
        "type": "fading-circle",
        "size": 18
      }
    }), _vm._v(" "), _c('span', [_vm._v("正在加载")])], 1)]) : _vm._e()], 2)]) : _vm._e(), _vm._v(" "), (_vm.columnData.length > 0) ? _c('div', {
      staticClass: "column-com"
    }, [_vm._m(1), _vm._v(" "), _c('swiper', {
      attrs: {
        "options": _vm.columnswiperOption
      }
    }, [_vm._l((_vm.columnData), function(item) {
      return [_c('swiper-slide', [_c('div', {
        staticClass: "item",
        style: ({
          'background-image': 'url(' + item.pic + ')'
        })
      }, [_c('div', {
        staticClass: "list"
      }, [(item.name != '实盘观点') ? _c('router-link', {
        attrs: {
          "to": '/periodical/' + item.columnId
        }
      }, [_c('h4', [_vm._v(_vm._s(item.name))]), _vm._v(" "), _c('h5', [_vm._v(_vm._s(item.focusNum) + "关注")]), _vm._v(" "), _c('p', {
        staticClass: "p1"
      }, [_vm._v(_vm._s(item.readNum) + "阅读")])]) : _c('router-link', {
        attrs: {
          "to": '/realDisk/' + item.columnId + '/0'
        }
      }, [_c('h4', [_vm._v(_vm._s(item.name))]), _vm._v(" "), _c('h5', [_vm._v(_vm._s(item.focusNum) + "关注")]), _vm._v(" "), _c('p', {
        staticClass: "p1"
      }, [_vm._v(_vm._s(item.readNum) + "阅读")])]), _vm._v(" "), _c('span', {
        class: {
          'active': item.isFocus
        },
        on: {
          "click": function($event) {
            _vm.toFocus(item)
          }
        }
      })], 1)])])]
    }), _vm._v(" "), _c('div', {
      staticClass: "swiper-pagination",
      slot: "pagination"
    })], 2)], 1) : _vm._e(), _vm._v(" "), (_vm.isFirstEnter) ? _c('mt-popup', {
      staticClass: "index-modal",
      attrs: {
        "popup-transition": "popup-fade"
      },
      model: {
        value: (_vm.isFirstEnter),
        callback: function($$v) {
          _vm.isFirstEnter = $$v
        },
        expression: "isFirstEnter"
      }
    }, [_c('button', {
      on: {
        "click": function($event) {
          _vm.isFirstEnter = false
        }
      }
    }), _vm._v(" "), _c('mt-swipe', {
      attrs: {
        "auto": 3000
      }
    }, [_c('mt-swipe-item', [_c('a', {
      attrs: {
        "href": "#/introduce"
      }
    }, [_c('img', {
      attrs: {
        "src": "/images/index/index_pop_up_1.png"
      }
    })])]), _vm._v(" "), _c('mt-swipe-item', [_c('a', {
      attrs: {
        "href": "#/introduce"
      }
    }, [_c('img', {
      attrs: {
        "src": "/images/index/index_pop_up_2.png"
      }
    })])]), _vm._v(" "), _c('mt-swipe-item', [_c('a', {
      attrs: {
        "href": "#/introduce"
      }
    }, [_c('img', {
      attrs: {
        "src": "/images/index/index_pop_up_3.png"
      }
    })])])], 1)], 1) : _vm._e(), _vm._v(" "), _c('Qrcode'), _vm._v(" "), (_vm.LiveToday.length > 0 || _vm.courseEnd) ? _c('div', {
      staticClass: "fontBottom"
    }, [_c('p', [_vm._v("以上观点仅供参考，不构成投资建议")])]) : _vm._e()]
  ], 2)
},staticRenderFns: [function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('h5', {
    staticClass: "title"
  }, [_c('span', [_vm._v("智能选股")]), _vm._v(" "), _c('p', [_c('span', [_vm._v("AI过滤")]), _vm._v(" "), _c('span', [_vm._v("锁定牛股")])])])
},function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('h5', [_vm._v("\n            栏目推荐\n            "), _c('span')])
}]}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-0ec83e80", module.exports)
  }
}

/***/ }),

/***/ 1214:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": _vm.tapClick
    }
  }, [_vm._t("default")], 2)
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-ced853d0", module.exports)
  }
}

/***/ }),

/***/ 1235:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(964);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("3cacc7e1", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-0ec83e80\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./index.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-0ec83e80\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./index.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 413:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(792)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(742),
  /* template */
  __webpack_require__(789),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\index\\danmu.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] danmu.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-295d8532", Component.options)
  } else {
    hotAPI.reload("data-v-295d8532", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 438:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1235)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(863),
  /* template */
  __webpack_require__(1122),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\index\\index.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] index.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-0ec83e80", Component.options)
  } else {
    hotAPI.reload("data-v-0ec83e80", Component.options)
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

/***/ 742:
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


var MAX_AMOUNT = 20;

var MIN_RUNNERS = 20;

var UNIT_PADDINGTOP = 15;

var UNIT_PADDINGLEFT = 20;

exports.default = {
	data: function data() {

		return {

			d: {

				square_high: 0,

				roads: 0,

				addRunners: 0

			},

			r: {

				init_all_road: [],

				all_road: [],

				map_road: {},

				runner_idx: []

			},

			glo: {

				screen_runners_max: 0,

				play_count: 0,

				runners_play_count: 0

			},

			help: {

				road_finish: {},

				road_finish_runner: {}

			},

			fail_queue: [],

			global_time_out: {}

		};
	},
	mounted: function mounted() {},

	methods: {
		_initBarriage: function _initBarriage(options) {
			var _this = this;

			this.d = Object.assign({}, this.d, options);

			this.d.square_high = parseFloat(getComputedStyle(this.d.square).height);

			this.d.roads = this.d.square_high / this.d.road_high >> 0;

			this.glo.screen_runners_max = this.d.roads * this.d.road_per_runner;

			for (var i = 0; i < this.d.roads; i++) {

				this.r.all_road[i] = {

					name: i,

					runner: {},

					amount: 0

				};

				this.r.init_all_road[i] = i;
			}

			if (this.d.show_lines) {

				var _lines = '';

				for (var k = 0; k < this.d.roads; k++) {

					_lines += '<div style="height: ' + this.d.road_high + 'px;border-bottom: 1px solid #000;box-sizing: border-box;"></div>';
				}

				document.getElementsByClassName('barrage_line')[0].innerHTML = _lines;
			}

			this.d.addRunners = this.d.runners;

			if (this.d.runners.length < MIN_RUNNERS) {

				this.d.addRunners = this.shuffle(this.d.runners.concat(this.d.runners, this.d.runners));
			}

			this.d.addRunners.forEach(function (unit, i) {

				_this.r.map_road[i] = unit;

				_this.r.runner_idx.push(i);
			});

			this.put_runner_to_road(-1, {});
		},
		getRandomInt: function getRandomInt(min, max) {

			return Math.floor(Math.random() * (max - min + 1) + min);
		},
		shuffle: function shuffle(arr) {

			var _arr = arr.slice();

			for (var i = 0; i < _arr.length; i++) {

				var j = this.getRandomInt(0, i);

				var t = _arr[i];

				_arr[i] = _arr[j];

				_arr[j] = t;
			}

			return _arr;
		},
		put_runner_to_road: function put_runner_to_road(roadName, aheadOption) {

			if (roadName == -1) {

				if (this.r.init_all_road.length) {

					this.match_road_to_runner(this.r.init_all_road[0]);

					this.r.init_all_road.splice(0, 1);

					this.put_runner_to_road(-1, {});
				}
			} else {

				this.match_road_to_runner(roadName, aheadOption);
			}
		},
		match_road_to_runner: function match_road_to_runner(roadName, aheadOption) {

			var road_data_idx = '';

			var roadDatas = this.r.all_road.filter(function (obj, i) {

				if (obj.name == roadName) {

					road_data_idx = i;

					return obj;
				}
			});

			if (roadDatas && roadDatas.length) {

				var road_data = roadDatas[0];

				if (road_data && road_data.amount >= 0) {

					var runner = this.get_runner();

					if (runner) {

						road_data.amount++;

						road_data.runner[runner.mapNumber] = runner.mapObj;

						if (road_data.amount >= this.d.road_per_runner) {

							this.help.road_finish[roadName] = road_data.amount;

							this.help.road_finish_runner[roadName] = Object.assign(true, {}, road_data.runner);

							this.r.all_road.splice(road_data_idx, 1);
						}

						this.go_run(roadName, runner.mapObj, aheadOption);
					} else {

						this.fail_queue.push({

							roadName: roadName,

							aheadOption: Object.assign(true, {}, aheadOption)

						});
					}
				}
			} else {

				this.fail_queue.push({

					roadName: roadName,

					aheadOption: Object.assign(true, {}, aheadOption)

				});
			}
		},
		get_runner: function get_runner() {

			var runner_idx = this.r.runner_idx;

			var runner_idx_length = runner_idx.length;

			if (runner_idx_length > 0) {

				this.glo.runners_play_count++;

				this.glo.play_count = this.glo.runners_play_count / (this.glo.screen_runners_max + 1) >> 0;

				var map_code = Math.random() * runner_idx_length >> 0;

				var map_number = runner_idx[map_code];

				var map_content = this.r.map_road[map_number];

				var runner = this.init_runner(map_number, map_content, this.d.square.querySelector('.unit[has_finish="true"]'));

				this.r.runner_idx.splice(map_code, 1);

				return runner;
			} else {

				return null;
			}
		},
		init_runner: function init_runner(mapNumber, mapContent, $replace) {
			var _this2 = this;

			var _$div = void 0;

			if (!$replace) {

				_$div = document.createElement('div');

				_$div.addEventListener('webkitAnimationEnd', function (ev) {

					_this2.run_finish(ev);
				});

				_$div.addEventListener('click', function (ev) {

					_this2.$emit('runClick', ev.target);
				});

				this.d.square.appendChild(_$div);
			} else {

				_$div = $replace;
			}

			_$div.setAttribute('class', 'unit');

			_$div.setAttribute('has_finish', 'false');

			_$div.setAttribute('map_number', mapNumber);

			_$div.setAttribute('length', mapContent.split('').length);

			_$div.innerHTML = mapContent;

			if (_$div.nodeType == 1) {

				_$div.setAttribute('width', parseFloat(window.getComputedStyle(_$div).width) + UNIT_PADDINGLEFT * 2);

				_$div.setAttribute('height', parseFloat(window.getComputedStyle(_$div).height) + UNIT_PADDINGTOP * 2);
			}

			return {

				mapNumber: mapNumber,

				mapObj: _$div

			};
		},
		go_run: function go_run(roadName, $runner, aheadOption) {
			var _this3 = this;

			var delay = 0;

			if (this.d.road_per_runner < MAX_AMOUNT) {

				delay = 1 / Math.sqrt(this.d.road_per_runner) * (.5 + (this.glo.play_count > 2 ? 1 : Math.min(Math.random(), .5)) * (Math.abs(Math.sin(roadName)) * 2 + Math.random() * 6));
			}

			var text_length = $runner.getAttribute('length');

			var duration = Math.floor(8 + Math.abs(Math.cos(roadName)) * Math.max(text_length, 4) + Math.random() * Math.max(text_length * 1.5, 10));

			if (this.d.duration) {

				duration = this.d.duration;
			}
			$runner.style.color = this.d.colorArr[Math.floor(Math.random() * this.d.colorArr.length)];
			$runner.style.fontSize = this.d.fontSize;
			$runner.style.fontWeight = this.d.fontWeight;
			if (this.d.road_padding) {

				$runner.style.top = this.d.road_padding + roadName % this.d.roads * this.d.road_high + 'px';
			} else {

				$runner.style.top = 8 + roadName % this.d.roads * this.d.road_high + Math.sin(Math.random() * 50) * 10 + 'px';
			}

			var width = parseFloat(window.getComputedStyle(this.d.square).width);

			var distance = parseFloat($runner.getAttribute('width'));

			try {

				if (aheadOption.leafTime) {

					var realLeafTime = aheadOption.leafTime - parseFloat(delay);

					if (realLeafTime > 0) {

						var maxSpeed = width / realLeafTime;

						var maxDuration = (distance + width) / maxSpeed;

						duration = Math.max(parseFloat(duration), maxDuration);
					}
				}
			} catch (e) {

				aheadOption = { leafTime: 0 };
			}

			$runner.style.animationDelay = delay + 's';

			$runner.style.webkitAnimationDelay = delay + 's';

			$runner.style.animationDuration = duration + 's';

			$runner.style.webkitAnimationDuration = duration + 's';

			var _className = 'unit danmu_unit ';

			if (this.glo.play_count == 0) {

				_className += 'danmu_unit_half';
			} else {

				_className += 'danmu_unit_all';
			}

			$runner.setAttribute('class', _className);

			$runner.setAttribute('road_name', roadName);

			delay = parseFloat(delay);

			duration = parseFloat(duration);

			var speed = (distance + width) / duration;

			var shown_time = distance / speed;

			var next_delay = 0;

			if (this.d.road_per_runner < MAX_AMOUNT) {

				next_delay = (delay + shown_time + (duration - shown_time) / this.d.road_per_runner) * 1000;

				aheadOption.leafTime = duration - shown_time - (duration - shown_time) / this.d.road_per_runner;
			} else {

				next_delay = (delay + shown_time) * 1000;

				aheadOption.leafTime = duration - shown_time;
			}

			(function ($runner, roadName, next_delay, aheadOption) {

				if (!window.paused) {

					var fun = function fun() {

						_this3.put_runner_to_road(roadName, aheadOption);
					};

					var _timeout = setTimeout(function () {

						delete _this3.global_time_out[_timeout];

						fun();
					}, next_delay);

					_this3.global_time_out[_timeout] = {

						currentTime: +new Date(),

						delay: next_delay,

						fun: fun

					};
				}
			})($runner, roadName, next_delay, Object.assign(true, {}, aheadOption));
		},
		run_finish: function run_finish(ev) {

			var _$target = ev.target;

			var map_number = _$target.getAttribute('map_number'),
			    road_name = _$target.getAttribute('road_name');

			_$target.setAttribute('has_finish', 'true');

			var temp_road = this.r.all_road.filter(function (obj, i) {

				if (obj.name == road_name) {

					return obj;
				}
			});

			if (temp_road.length) {

				temp_road[0].amount--;

				delete temp_road[0].runner[map_number];
			} else {

				this.r.all_road.push({

					name: road_name,

					runner: this.help.road_finish_runner[road_name],

					amount: this.help.road_finish[road_name] - 1

				});

				delete this.help.road_finish_runner[road_name];
			}

			_$target.className = 'unit';

			_$target.style.transform = 'translate3d(0, 0, 0)';

			_$target.style.webkitTransform = 'translate3d(0, 0, 0)';

			this.r.runner_idx.push(map_number);

			var fail_unit = this.fail_queue.shift();

			if (fail_unit) {

				this.put_runner_to_road(fail_unit.roadName, fail_unit.aheadOption);
			}
		}
	}

};

/***/ }),

/***/ 745:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.barrage_wrap {\n  position: relative;\n  width: 100%;\n  background: #f9f9f9;\n}\n.barrage_wrap .barrage_container {\n    position: absolute;\n    width: 100%;\n    height: 30px;\n    top: 0;\n    left: 0;\n}\n.barrage_wrap .unit {\n    position: absolute;\n    left: 200%;\n    display: table;\n    color: #126ae4;\n    font-size: .26rem;\n    background-color: #fff;\n    padding: .06rem .16rem;\n    border-radius: .2rem;\n}\n.barrage_wrap .danmu_unit {\n    left: 100%;\n    -webkit-transform: translate3d(0, 0, 0);\n            transform: translate3d(0, 0, 0);\n}\n.barrage_wrap .danmu_unit_all {\n    -webkit-animation: move 1s linear 5s;\n            animation: move 1s linear 5s;\n}\n.barrage_wrap .danmu_unit_half {\n    -webkit-animation: move_half 1s linear 5s;\n            animation: move_half 1s linear 5s;\n}\n@-webkit-keyframes move_half {\n0% {\n    -webkit-transform: translate3d(0, 0, 0);\n            transform: translate3d(0, 0, 0);\n}\n100% {\n    left: 0px;\n    -webkit-transform: translate3d(-100%, 0, 0);\n            transform: translate3d(-100%, 0, 0);\n}\n}\n@keyframes move_half {\n0% {\n    -webkit-transform: translate3d(0, 0, 0);\n            transform: translate3d(0, 0, 0);\n}\n100% {\n    left: 0px;\n    -webkit-transform: translate3d(-100%, 0, 0);\n            transform: translate3d(-100%, 0, 0);\n}\n}\n@-webkit-keyframes move {\n0% {\n    left: 100%;\n    -webkit-transform: translate3d(0, 0, 0);\n            transform: translate3d(0, 0, 0);\n}\n100% {\n    left: 0px;\n    -webkit-transform: translate3d(-100%, 0, 0);\n            transform: translate3d(-100%, 0, 0);\n}\n}\n@keyframes move {\n0% {\n    left: 100%;\n    -webkit-transform: translate3d(0, 0, 0);\n            transform: translate3d(0, 0, 0);\n}\n100% {\n    left: 0px;\n    -webkit-transform: translate3d(-100%, 0, 0);\n            transform: translate3d(-100%, 0, 0);\n}\n}\n", ""]);

// exports


/***/ }),

/***/ 789:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _vm._m(0)
},staticRenderFns: [function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "barrage_wrap"
  }, [_c('div', {
    staticClass: "barrage_line"
  }), _vm._v(" "), _c('div', {
    staticClass: "barrage_container"
  })])
}]}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-295d8532", module.exports)
  }
}

/***/ }),

/***/ 792:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(745);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("4385049c", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-295d8532\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./danmu.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-295d8532\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./danmu.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 863:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function($, NProgress) {

Object.defineProperty(exports, "__esModule", {
  value: true
});

var _vueAwesomeSwiper = __webpack_require__(136);

var _mintUi = __webpack_require__(54);

var _routerClickLink = __webpack_require__(1102);

var _routerClickLink2 = _interopRequireDefault(_routerClickLink);

var _QrCode = __webpack_require__(524);

var _QrCode2 = _interopRequireDefault(_QrCode);

var _danmu = __webpack_require__(413);

var _danmu2 = _interopRequireDefault(_danmu);

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

__webpack_require__(516); //点击之后执行tap事件后（同步），执行跳转
//弹幕
// import liveCourse from "../subcomponents/index/liveCourse.vue";
exports.default = {
  data: function data() {
    var _ref;

    return _ref = {
      headerarr: [],
      columnswiperOption: {
        //栏目推荐
        slidesPerView: 2.5,
        spaceBetween: 8
      },

      // topBannerSwiperOption: {
      //   //头部轮播
      //   notNextTick: true,
      //   slidesPerView: 1,
      //   // centeredSlides: true,
      //   // initialSlide: 1,
      //   autoplay: {
      //     delay: 100000,
      //     disableOnInteraction: false
      //   },

      //   speed: 300,
      //   loop: true,

      //   pagination: {
      //     el: ".swiper-pagination"
      //     // clickable: true
      //   }
      //   // autoplayDisableOnInteraction: false
      // },

      swiperOptionAd: {
        notNextTick: true,
        spaceBetween: 0,
        initialSlide: 1,
        speed: 300,
        autoplay: {
          delay: 2000,
          disableOnInteraction: false
        },
        slidesPerView: 1,
        // width: window.innerWidth,
        effect: "coverflow",
        centeredSlides: true,
        autoplayDisableOnInteraction: false,
        coverflowEffect: {
          rotate: 0, // 旋转的角度
          stretch: 0, // 拉伸   图片间左右的间距和密集度
          depth: 0, // 深度   切换图片间上下的间距和密集度
          modifier: 2, // 修正值 该值越大前面的效果越明显
          slideShadows: false // 页面阴影效果
        }
      },
      banner: [], //轮播图数据
      noticeData: [], //公告栏数据
      reading: [], //深度解读数据
      isFirstEnter: false, //是否首次进入首页
      showShake: true, //显示摇一摇按钮
      $document: null,
      scrollTop: null,
      timeId: 0,
      firstEmitScroll: true,
      flowIdentity: "", // 3为流量组 2为老师 1学生
      isFlowButton: false, //是否显示流量组按钮

      LiveToday: [], //課程表數據
      onlineHeadAddList: [], //在线人数
      courseEnd: false, //所有課結束
      courseEndImg: "", //結束后的背景圖
      columnData: [], //栏目信息
      stockData: [], //智能选股
      courseAd: [], //课程广告
      realDiskId: "", // 实盘观点id
      danmuData: [], //弹幕》实盘
      danmuData2: [], //弹幕》行业焦点
      courseSpwiperIndex: 0,
      courseNum: "",
      loaded: false
    }, _defineProperty(_ref, "danmuData", []), _defineProperty(_ref, "danmuData2", []), _defineProperty(_ref, "LiveToday", []), _defineProperty(_ref, "courseSwiperOption", {
      //互动课程
      notNextTick: true,
      spaceBetween: 0,
      // initialSlide:3,
      // width: window.innerWidth,
      speed: 300,
      effect: "coverflow",
      centeredSlides: true,
      autoplayDisableOnInteraction: false,
      coverflowEffect: {
        rotate: 0, // 旋转的角度
        stretch: 20, // 拉伸   图片间左右的间距和密集度
        depth: 0, // 深度   切换图片间上下的间距和密集度
        modifier: 1, // 修正值 该值越大前面的效果越明显
        slideShadows: false // 页面阴影效果
      }
    }), _defineProperty(_ref, "readingmore", true), _defineProperty(_ref, "readingloading", false), _defineProperty(_ref, "listParams", {
      //深度阅读加载更多参数
      pageNo: 0,
      perPage: 5,
      isUserInfo: false,
      orderBy: "publish_time desc,id desc", //'column_top_status desc,publish_time desc,id desc'
      status: 1, //已发布的观点，草稿状态不显示
      isImageInfo: true,
      isCate: true,
      excludeId: ""
    }), _defineProperty(_ref, "videonth", false), _ref;
  },

  computed: {
    userId: function userId() {
      this.flowIdentity = this.$store.state.userInfo.type;
      if (this.$store.state.userInfo.type == 1) {
        //如果是老师或流量主身份，要隐藏“我要加入”
        this.isFlowButton = true;
      } else {
        this.isFlowButton = false;
      }
      return this.$store.state.userInfo.user_id;
    },
    isSubscribe: function isSubscribe() {
      return this.$store.state.userInfo.isSubscribe;
    },
    swiper: function swiper() {
      return this.$refs.mySwiper1.swiper;
    } /*,
      courseSpwiperIndex(){
      return this.$refs.mySwiper5.swiper.activeIndex
            }*/

  },

  created: function created() {
    var _this2 = this;

    this.$store.commit("showTabber");
    this.$store.commit("setTitle", "首页");
    //this.share_fansVisit();
    // location.href = `http://test.talk.99cj.com.cn/#/personalCenter`;
    this.$store.dispatch("getUserInfo", function (res) {
      wx.ready(function () {
        _this2.wxShare({
          title: "大策略-专注于金融领域的投资教育平台",
          desc: "资深专家，老师，达人正在为您分享",
          link: window.location.origin + "/?&/#/index/" + _this2.userId + '?shareId=1'
        });
      });
    });
    this.$document = $(document);
    // this.$document.on("scroll", this.bodyScroll);

    sessionStorage.removeItem("onloadShake");
    // setTimeout(function() {
    //   // console.log(sessionStorage.scrollY);
    //   window.scroll(0, parseInt(sessionStorage.scrollY));
    //   sessionStorage.removeItem("scrollY");
    // }, 800);
  },

  //摇一摇兼容
  beforeRouteEnter: function beforeRouteEnter(to, from, next) {
    if (from.path.indexOf("shaking") !== -1) {
      sessionStorage.setItem("onloadShake", "1");
    }
    next(function (vm) {
      NProgress.start();
      vm.getAllData();
      // vm.getQrCode()
      //  setTimeout(() => {
      //     vm.loaded = true;
      // }, 200);
    });
  },

  // beforeRouteLeave(to, from, next) {
  //   let position = $(document).scrollTop();
  //   sessionStorage.setItem("scrollY", position);
  //   //this.$store.commit('SAVE_POSITION', position) //离开路由时把位置存起来
  //   next();
  // },
  destroyed: function destroyed() {
    // this.$document.off("scroll", this.bodyScroll);
    NProgress.done();
    this.setCookie("isShareLink", '', -1);
  },
  mounted: function mounted() {
    if (this.getCookie("link").indexOf("index") == 0) {
      this.$router.replace(this.getCookie("link"));
      this.setCookie("link", "0");
    }
  },

  methods: {

    /*
            ** 获取弹幕列表
            type 分类（1=》实盘 ，2=》行业焦点）
            */
    getHeader: function getHeader(uid, headAdd) {
      //获取老师头像
      var imgUrl = "";
      if (uid == "1706887") {
        imgUrl = "/images/teacherAvatar/1737056.png";
      } else if (uid == "1707284") {
        imgUrl = "/images/teacherAvatar/1707284.png";
      } else if (uid == "1707305") {
        imgUrl = "/images/teacherAvatar/1707305.png";
      } else if (uid == "1707308") {
        imgUrl = "/images/teacherAvatar/1707308.png";
      } else if (uid == "1737056") {
        imgUrl = "/images/teacherAvatar/1737056.png";
      } else if (uid == "1734866") {
        imgUrl = "/images/teacherAvatar/1734866.png";
      } else if (uid == "1735178") {
        imgUrl = "/images/teacherAvatar/1735178.png";
      } else if (uid == "1737290") {
        imgUrl = "/images/teacherAvatar/1737290.png";
      } else {
        imgUrl = headAdd;
      }
      return imgUrl;
    },
    slideChanged: function slideChanged() {
      var swiper = this.$refs.mySwiper5.swiper;
      var $maskBlockArr = $(".courseBox .swiper-slide .list .mask-block");
      var $teacherPicArr = $(".courseBox .swiper-slide .list .teacher-pic");
      for (var i = 0; i < $maskBlockArr.length; i++) {
        $maskBlockArr[i].className = "mask-block default";
        $teacherPicArr[i].className = "teacher-pic default";
      }
      $maskBlockArr[swiper.activeIndex].className = "mask-block active";
      $teacherPicArr[swiper.activeIndex].className = "teacher-pic active";
    },

    /*
            ** 获取弹幕列表
            type 分类（1=》实盘 ，2=》行业焦点）
            */
    getDanmu: function getDanmu() {
      var _this3 = this;

      this.$http.get("Barrage/getBarrage").then(function (res) {
        if (res.body.code == 200) {
          for (var i = 0; i < res.body.data.length; i++) {
            if (res.body.data[i].type == 1) {
              _this3.danmuData.push(res.body.data[i].content); //实盘
            } else {
              _this3.danmuData2.push(res.body.data[i].content); //行业焦点
            }
          }
          console.log(_this3.danmuData);
          _this3.$nextTick(function () {
            _this3.$refs.barrage._initBarriage({
              square: document.getElementsByClassName("barrage_container")[0], //容器

              road_high: 30, //行高

              road_padding: 12, //每行中是否固定边界距离，不传不固定

              road_per_runner: 15, //每行中最多的数量

              show_lines: false, //是否显示边界线条，作为参考

              colorArr: ["#f38f00", "#ff3229", "#126ae4", "9b40d8", "#8b531b", "#ff00ea", "#ff6600", "#d840ab"],
              fontSize: "12px",
              fontWeight: "400",
              duration: 4, //控制速度，最小为1，不传默认

              runners: _this3.danmuData
            });
            _this3.$refs.barrage1._initBarriage({
              square: document.getElementsByClassName("barrage_container")[1], //容器

              road_high: 30, //行高

              road_padding: 8, //每行中是否固定边界距离，不传不固定

              road_per_runner: 4, //每行中最多的数量

              show_lines: false, //是否显示边界线条，作为参考

              fontSize: "15px",
              fontWeight: "bold",
              colorArr: ["#f38f00", "#ff3229", "#126ae4", "9b40d8", "#8b531b", "#ff00ea", "#ff6600", "#d840ab"],

              duration: 8, //控制速度，最小为1，不传默认

              runners: _this3.danmuData2
            });
          });
        }
      });
    },

    /*
     ** 互动课程
     */
    getMyGlobalLive: function getMyGlobalLive() {
      var _this4 = this;

      this.$http.get("/GlobalLive/getBackgroundImg", { params: { id: 9999 } }).then(function (res) {
        _this4.courseEndImg = res.body.data.picUrl;
        // console.log(this.courseEndImg);
        if (res.body.data.type != 1 && res.body.data.type != 4) {
          _this4.getcourseTable();
        }
        if (res.body.data.type == 3 || res.body.data.type == 5) {
          _this4.courseEnd = false;
          setTimeout(function () {
            _this4.loaded = true;
            NProgress.done();
          }, 150);
        } else {
          _this4.courseEnd = true;
          if (res.body.data.type == 2) {
            _this4.videonth = true;
          }
          setTimeout(function () {
            _this4.loaded = true;
            NProgress.done();
          }, 150);
        }
      });
    },
    getcourseTable: function getcourseTable() {
      var _this5 = this;

      this.$http.get("/GlobalLive/getGlobalLiveToday", {
        params: { isOnlineHeadAdd: true }
      }).then(function (res) {
        // console.log(res.body);
        if (res.body.code == 200) {
          var num = "";
          var numT = false;
          var zNum = false;
          var courseEnds = false;

          $.each(res.body.data, function (i, item) {
            var start_time = item.set_start_time;
            var end_time = item.set_end_time;
            var timestamp2 = new Date(start_time.split("-").join("/")),
                timestamp3 = new Date(end_time.split("-").join("/")),
                timestamp1 = new Date();
            var s = timestamp2.getTime() - timestamp1.getTime();
            var e = timestamp3.getTime() - timestamp1.getTime();
            if (s > 0) {
              //即將開始
              item.state = 1;
              if (numT == false) {
                num = i;
                // console.log(num);
                numT = true;
              }

              return;
            } else if (s < 0 && e > 0) {
              //直播中

              item.state = 2;

              if (zNum == false) {
                num = i;
                // console.log(num);
                zNum = true;
                numT = true;
              }
              return;
            } else {
              //直播結束
              item.state = 3;

              return;
            }
          });
          // console.log(courseEnds);

          //未結束
          _this5.LiveToday = res.body.data;

          _this5.onlineHeadAddList = res.body.data[0].onlineHeadAddList;
          setTimeout(function () {
            _this5.loaded = true;
            NProgress.done();
          }, 150);
          _this5.$refs.mySwiper5.swiper.slideTo(num, 1000, false);
        } else {
          setTimeout(function () {
            _this5.loaded = true;
            NProgress.done();
          }, 150);
        }
      });
    },
    indexColumnLink: function indexColumnLink(item) {
      var id = item.type_id ? item.type_id : item.id;
      this.setCookie("indexLink", id);
      this.$router.push("/column/detail/" + id);
    },

    /*
            ** 获取智能选股
            */
    getStockData: function getStockData() {
      var _this6 = this;

      this.$http.get("IntelligentStock/getIntelligentStock").then(function (res) {
        if (res.body.code == 200) {
          _this6.stockData = res.body.data;
        }
      });
    },

    /*
            ** 点赞
            */
    setZan: function setZan(item) {
      this.$http.get("Viewpoint/setlikeNumIncById", {
        params: { viewpointId: item.type_id }
      }).then(function (res) {
        if (res.body.code == 200) {
          item.isread = true;
          item.like_num = item.like_num + 1;
        } else {
          (0, _mintUi.Toast)({
            message: "今天你已经点赞了哦",
            duration: 800
          });
        }
      });
    },

    /*
            ** 获取课程广告
            */
    getCourseAd: function getCourseAd() {
      var _this7 = this;

      this.$http.get("CourseAdvertising/getAdvertising").then(function (res) {
        if (res.body.code == 200) {
          _this7.courseAd = res.body.data;
        }
      });
    },


    /*
            ** 获取栏目推荐
            */
    getColumn: function getColumn() {
      var _this8 = this;

      this.$http.get("Column/getColumnList", {
        params: { excludeColumnId: 2 }
      }).then(function (res) {
        if (res.body.code == 200) {
          _this8.columnData = res.body.data;
        }
      });
    },

    // bodyScroll() {
    //   if (this.firstEmitScroll) {
    //     this.firstEmitScroll = false;
    //     return;
    //   }
    //   this.showShake = false;
    //   clearTimeout(this.timeId);
    //   this.scrollTop = this.$document.scrollTop();
    //   this.timeId = setTimeout(() => {
    //     if (this.scrollTop == this.$document.scrollTop()) {
    //       this.showShake = true;
    //     }
    //   }, 100);
    // },
    //摇一摇兼容
    onloadShake: function onloadShake() {
      sessionStorage.removeItem("onloadShake");
    },


    /*
            ** 是否首次进去首页
            */
    // isFirstTime() {
    // 	this.$http
    // 		.get("/Home/honeRecord", {params: {user_id: this.userId}})
    // 		.then(res => {
    // 			console.log("是否首次进入首页", res.body);
    // 			if (res.body.code == 0) {
    // 				this.isFirstEnter = true;
    // 			}
    // 		});
    // },

    /*
            ** 是否首次进去首页
            */

    getTab: function getTab() {
      var _this9 = this;

      this.$http.get("NavigationLists/getNavigationLists").then(function (res) {
        console.log("是否首次进入首页", res.body);
        if (res.body.code == 200) {
          _this9.headerarr = res.body.data;
        }
      });
    },

    /*
            ** 获取页面数据
            */
    getAllData: function getAllData() {
      this.getBannerData();
      this.getNoticeData();
      this.getTab();
      this.getMyGlobalLive();
      this.getDanmu();
      this.getStockData(); //智能选股
      this.getCourseAd(); //课程广告
      this.getColumn(); //获取推荐栏目

      //				this.getMyGlobalLive();
      this.getReading();

      this.$store.dispatch("getUserInfo", function (res) {
        // this.isFirstTime();
      });
      var _this = this;
      setTimeout(function () {
        _this.$nextTick(function () {
          window.scrollTo(0, 1);
          window.scrollTo(0, 0);
        });
      }, 100);
    },


    /*
            ** 获取首页轮播图数据
            */
    getBannerData: function getBannerData() {
      var _this10 = this;

      this.$http.get("/Home/getHomeBanner").then(function (res) {
        // console.log("轮播图", res.body);
        // console.log(res);
        if (res.body.code == 0 && Array.isArray(res.body.data)) {
          _this10.banner = res.body.data;
        }
      });
    },


    /*
            ** 记录点击轮播图
            */
    tapAd: function tapAd(item) {
      this.$http.get("/Home/homeBannerRecord", {
        params: { id: item.adId, user_id: this.userId }
      }).then(function (res) {
        // console.log("记录点击轮播图", res.body);
        window.location.href = item.adURL;
      });
    },


    /*
            ** 获取公告推荐数据
            */
    getNoticeData: function getNoticeData() {
      var _this11 = this;

      this.$http.get("/Home/notice").then(function (res) {
        // console.log("公告推荐", res.body);
        if (res.body.code == 0 && Array.isArray(res.body.data)) {
          _this11.noticeData = res.body.data;
          if (_this11.noticeData.length == 0) {
            $(".dacelve-index .navline").css({
              height: "1.6rem"
            });
            // $(".dacelve-index .homeNav").css({
            //   height: "1.6rem"
            // });
          }
          _this11.$nextTick(function () {
            var $content = $(".dacelve-index .notice .content");
            var length = $content.outerWidth();
            var $notice = $content.find("p");
            $notice.each(function (i, ele) {
              $(ele).width($(ele).width() + length);
            });
            $content.children().css("animation", "indexNoticeAnimation " + $notice.length * 10 + "s linear infinite");
          });
        }
      });
    },


    /*
            ** 获取深度解读
            */
    getReading: function getReading() {
      var _this12 = this;

      this.$http.get("/IndexRecommend/getViewpointList", { params: { limitNum: 10 } }).then(function (res) {
        // console.log("深度解读", res.body);
        _this12.listParams.excludeId = [];
        if (res.body.code == 200 && Array.isArray(res.body.data)) {
          res.body.data.forEach(function (val) {
            val.head_add = val.head_add || "/images/default/userDefault.png";
            _this12.listParams.excludeId.push(val.type_id);
          });
          _this12.listParams.excludeId = _this12.listParams.excludeId.join(",");
          _this12.reading = _this12.reading.concat(res.body.data);
          console.log(_this12.listParams.excludeId);
          for (var i = 0; i < 10; i++) {
            _this12.reading[i].isread = false;
          }
          console.log(_this12.reading[0]);
          _this12.load = true;
        }
      });
    },
    getMoreReading: function getMoreReading() {
      var _this13 = this;

      this.listParams.pageNo++;
      this.readingloading = true;
      setTimeout(function () {
        _this13.$http.get("/Viewpoint/getViewPointList", { params: _this13.listParams }).then(function (res) {
          // console.log("深度解读", res.body);
          if (res.body.code == 200 && Array.isArray(res.body.data)) {
            res.body.data.forEach(function (val) {
              val.head_add = val.head_add || "/images/default/userDefault.png";
            });
            _this13.reading = _this13.reading.concat(res.body.data);
            _this13.readingloading = false;
            for (var i = 0; res.body.data.length < 5; i++) {
              _this13.readingmore = false;
              // this.reading[i].isread = false;
            }
          }
        });
      }, 200);
    },
    computeTime: function computeTime(pTime) {
      //计算时间差
      var minute = 1000 * 60;
      var hour = minute * 60;
      var day = hour * 24;
      var now = new Date();
      var pStamp = new Date(pTime.split("-").join("/"));
      var diffValue = now - pStamp;
      var minDiff = diffValue / minute; //分钟差
      var hourDiff = diffValue / hour; //小时差
      var timeText = "";
      if (now.toLocaleDateString() == pStamp.toLocaleDateString()) {
        //是否今天
        if (minDiff <= 30) {
          if (parseInt(minDiff) < 1) {
            timeText = "1\u5206\u949F\u524D";
          } else {
            timeText = parseInt(minDiff) + "\u5206\u949F\u524D";
          }
        } else if (minDiff > 30 && minDiff < 60) {
          timeText = "1小时前";
        } else if (minDiff >= 60 && minDiff < 120) {
          timeText = "2小时前";
        } else if (hourDiff > 2 && hourDiff < 24) {
          timeText = pTime.split(" ")[1];
        }
      } else {
        timeText = pTime.split(" ")[0].slice(5);
      }
      return timeText;
    },

    /**
     * 关注 取消关注接口
     * @param integer $user_id 用户id
     * @param integer $live_id 根据target:   1-live直播间id  2-栏目id
     * @param integer $type    关注或取关 1关注 0取消关注
     * @param integer $target  关注目标 1-live直播间  2-栏目
     */
    toFocus: function toFocus(item) {
      this.$http.post("/Focus/addFocus", {
        user_id: this.userId,
        live_id: item.columnId,
        type: item.isFocus == true ? 0 : 1,
        target: 2
      }, { emulateJSON: true }).then(function (res) {
        if (res.body.code == 0) {
          (0, _mintUi.Toast)({
            message: res.body.msg,
            duration: 1000
          });
          item.isFocus = item.isFocus == true ? false : true;
        }
      });
    }
  },
  watch: {
    isFirstEnter: function isFirstEnter(val) {
      if (val) {
        this.$refs.body.style.overflow = "hidden";
        this.$refs.body.style.height = "100%";
        this.$refs.body.style.boxSizing = "border-box";
      } else {
        this.$refs.body.style.overflow = "";
        this.$refs.body.style.height = "";
        this.$refs.body.style.boxSizing = "";
      }
    }
  },
  components: {
    swiper: _vueAwesomeSwiper.swiper,
    swiperSlide: _vueAwesomeSwiper.swiperSlide,
    routerClickLink: _routerClickLink2.default,
    danmu: _danmu2.default,
    Qrcode: _QrCode2.default
    // liveCourse
  }
};
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(49), __webpack_require__(99)))

/***/ }),

/***/ 938:
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

exports.default = {
    props: ['to'],
    methods: {
        tapClick: function tapClick() {
            this.$emit('tap');
            this.$router.push(this.to);
        }
    }
};

/***/ }),

/***/ 964:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n@charset \"UTF-8\";\n.dacelve-index {\n  background: #f9f9f9;\n  min-height: 100vh;\n  padding-bottom: 49px;\n  box-sizing: border-box;\n  overflow-x: hidden;\n}\n.dacelve-index .barrage-box {\n    background: #f9f9f9;\n    padding-bottom: 6px;\n}\n.dacelve-index .barrage {\n    height: 30px;\n}\n.dacelve-index .barrage1 {\n    height: 40px;\n}\n.dacelve-index .top {\n    background: #fff;\n}\n.dacelve-index .column-com {\n    padding: 0 0 0.3rem 0.24rem;\n    margin-bottom: 0 !important;\n}\n.dacelve-index .column-com > h5 {\n      height: 0.8rem;\n      line-height: 0.8rem;\n      position: relative;\n      font-weight: bold;\n      color: #919599;\n      margin-bottom: 0.06rem;\n      padding-left: 0.16rem;\n      background: url(\"/images/2.0/lmtjlm.png\") left center no-repeat;\n      background-size: 0.05rem 0.34rem;\n}\n.dacelve-index .column-com > h5 > span {\n        display: inline-block;\n        position: absolute;\n        top: 0.15rem;\n        width: 0.45rem;\n        margin-left: 0.08rem;\n        height: 0.2rem;\n        background: url(\"/images/2.0/hot.png\") top center no-repeat;\n        background-size: cover;\n}\n.dacelve-index .column-com a {\n      text-align: center;\n      width: 100%;\n}\n.dacelve-index .column-com .swiper-slide {\n      width: 2.6rem;\n      height: 2.4rem;\n}\n.dacelve-index .column-com .swiper-slide .list {\n        width: 100%;\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-align: center;\n        -webkit-align-items: center;\n            -ms-flex-align: center;\n                align-items: center;\n        -webkit-box-orient: vertical;\n        -webkit-box-direction: normal;\n        -webkit-flex-direction: column;\n            -ms-flex-direction: column;\n                flex-direction: column;\n        height: 100%;\n        font-size: 0.24rem;\n        border-radius: 0.16rem;\n        background-color: rgba(0, 0, 0, 0.35);\n}\n.dacelve-index .column-com .swiper-slide .item {\n        width: 100%;\n        height: 100%;\n        background-size: cover;\n        background-position: center center;\n        background-repeat: no-repeat;\n        border: 1px solid #eee;\n        border-radius: 0.16rem;\n        color: #fff;\n}\n.dacelve-index .column-com .swiper-slide h4 {\n        margin: 0.2rem 0 0.16rem;\n        padding-bottom: 0.16rem;\n        font-size: 0.32rem;\n        font-weight: bold;\n        border-bottom: 1px solid rgba(232, 232, 232, 0.8);\n}\n.dacelve-index .column-com .swiper-slide h5 {\n        line-height: 0.3rem;\n}\n.dacelve-index .column-com .swiper-slide .p1 {\n        margin-bottom: 0.1rem;\n        line-height: 0.3rem;\n}\n.dacelve-index .column-com .swiper-slide span {\n        display: inline-block;\n        width: 0.54rem;\n        height: 0.54rem;\n        background: url(\"/images/2.0/concern_button_one_yx.png\") center no-repeat;\n        background-size: cover;\n}\n.dacelve-index .column-com .swiper-slide span.active {\n          background: url(\"/images/2.0/concern_button_two_yx.png\") center no-repeat;\n          background-size: cover;\n}\n.dacelve-index .chance-stock {\n    padding: 0 0.24rem;\n}\n.dacelve-index .chance-stock .title {\n      height: 0.8rem;\n      line-height: 0.8rem;\n      margin-bottom: 0.06rem;\n}\n.dacelve-index .chance-stock .title > span {\n        font-size: 0.34rem;\n        color: #919599;\n        padding-left: 0.6rem;\n        font-weight: bold;\n        background: url(\"/images/2.0/znxglm.png\") left center no-repeat;\n        background-size: 0.38rem 0.36rem;\n}\n.dacelve-index .chance-stock .title p {\n        float: right;\n        color: #888;\n        margin-top: 0.06rem;\n        font-size: 0.24rem;\n}\n.dacelve-index .chance-stock ul {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      height: 1.9rem;\n      padding-bottom: 0.3rem;\n      box-sizing: border-box;\n}\n.dacelve-index .chance-stock ul li {\n        width: -webkit-calc((100% - 0.6rem) / 4);\n        width: calc((100% - 0.6rem) / 4);\n        text-align: center;\n        height: 100%;\n}\n.dacelve-index .chance-stock ul li + li {\n          margin-left: 0.2rem;\n          margin-bottom: 0.24rem;\n}\n.dacelve-index .chance-stock ul li a {\n          display: block;\n          height: 100%;\n          border: 1px solid #dfdfdf;\n          border-radius: 0.1rem;\n}\n.dacelve-index .chance-stock ul li h4 {\n          font-size: 0.26rem;\n          margin: 0.2rem 0 0.12rem;\n          font-weight: bold;\n}\n.dacelve-index .chance-stock ul li p {\n          font-size: 0.24rem;\n          color: #999;\n          margin-bottom: 0.2rem;\n}\n.dacelve-index .chance-stock ul li h5 {\n          font-size: 0.32rem;\n          color: #ff0000;\n}\n.dacelve-index .chance-stock ul li h5.die {\n            color: #00ff4a;\n}\n.dacelve-index .course-ad {\n    padding: 0 0 0.24rem;\n    box-sizing: border-box;\n}\n.dacelve-index .course-ad .swiper-container {\n      height: 3.1rem;\n}\n.dacelve-index .course-ad .mint-cell {\n      padding: 0 0.24rem;\n      margin-bottom: 0.1rem;\n}\n.dacelve-index .course-ad h5 {\n      font-weight: bold;\n      padding: 0 0.24rem;\n}\n.dacelve-index .course-ad .swiper-container {\n      background: #fff;\n      /*  height: 3.1rem;\r\n      min-height: 140px;\r\n      max-height: 200px;*/\n      width: 100%;\n}\n.dacelve-index .course-ad .swiper-container a {\n        display: block;\n        width: 100%;\n        height: 100%;\n        width: 100%;\n        height: 100%;\n        background-position: center center;\n        background-size: cover;\n        background-repeat: no-repeat;\n        margin: 0 auto;\n        box-sizing: border-box;\n        overflow: hidden;\n}\n@media screen and (min-width: 320px) and (max-width: 375px) {\n.dacelve-index .course-ad .swiper-container .swiper-slide-prev a {\n          -webkit-transform-style: preserve-3d;\n                  transform-style: preserve-3d;\n          -webkit-transform: perspective(2rem) rotateX(0deg) rotateY(-32deg) scale(0.8) translateX(0.6rem) translateZ(-2rem);\n                  transform: perspective(2rem) rotateX(0deg) rotateY(-32deg) scale(0.8) translateX(0.6rem) translateZ(-2rem);\n}\n}\n@media screen and (min-width: 376px) and (max-width: 415px) {\n.dacelve-index .course-ad .swiper-container .swiper-slide-prev a {\n          -webkit-transform-style: preserve-3d;\n                  transform-style: preserve-3d;\n          -webkit-transform: perspective(2rem) rotateX(0deg) rotateY(-32deg) scale(0.78) translateX(0.55rem) translateZ(-2rem);\n                  transform: perspective(2rem) rotateX(0deg) rotateY(-32deg) scale(0.78) translateX(0.55rem) translateZ(-2rem);\n}\n}\n.dacelve-index .course-ad .swiper-container .swiper-slide-active a {\n        padding: 0 0.75rem;\n}\n@media screen and (min-width: 320px) and (max-width: 375px) {\n.dacelve-index .course-ad .swiper-container .swiper-slide-next a {\n          -webkit-transform-style: preserve-3d;\n                  transform-style: preserve-3d;\n          -webkit-transform: perspective(2rem) rotateX(0deg) rotateY(32deg) scale(0.8) translateX(-0.6rem) translateZ(-2rem);\n                  transform: perspective(2rem) rotateX(0deg) rotateY(32deg) scale(0.8) translateX(-0.6rem) translateZ(-2rem);\n}\n}\n@media screen and (min-width: 376px) and (max-width: 415px) {\n.dacelve-index .course-ad .swiper-container .swiper-slide-next a {\n          -webkit-transform-style: preserve-3d;\n                  transform-style: preserve-3d;\n          -webkit-transform: perspective(2rem) rotateX(0deg) rotateY(32deg) scale(0.78) translateX(-0.55rem) translateZ(-2rem);\n                  transform: perspective(2rem) rotateX(0deg) rotateY(32deg) scale(0.78) translateX(-0.55rem) translateZ(-2rem);\n}\n}\n.dacelve-index .course-ad .swiper-slide {\n      width: -webkit-calc(100% - 0.75rem);\n      width: calc(100% - 0.75rem);\n      box-sizing: border-box;\n      height: 100%;\n}\n.dacelve-index .course-ad img {\n      height: 100%;\n      width: 100%;\n      border-radius: 0.1rem;\n}\n.dacelve-index .liveTitleBox-comment {\n    width: 80%;\n    border-radius: 10px;\n}\n.dacelve-index .liveTitleBox-comment .img {\n      width: 2.8rem;\n      margin: 0.8rem auto 0;\n      height: 2.8rem;\n      background-size: 100% auto;\n}\n.dacelve-index .liveTitleBox-comment .buttom {\n      width: 100%;\n      background: #c62f2f;\n      height: 1rem;\n      border-radius: 0px 0px 10px 10px;\n}\n.dacelve-index .liveTitleBox-comment .buttom a {\n        display: block;\n        width: 100%;\n        line-height: 1rem;\n        text-align: center;\n        color: #fff;\n}\n.dacelve-index .liveTitleBox-comment h2 {\n      text-align: center;\n      color: #1c0808;\n      font-size: 16px;\n      font-weight: bold;\n}\n.dacelve-index .liveTitleBox-comment h2 {\n      font-weight: normal;\n      margin: 0.48rem 0 0.32rem;\n}\n.dacelve-index .liveTitleBox-comment .class-name {\n      margin: 0.3rem 0 0.3rem;\n}\n.dacelve-index .liveTitleBox-comment .title {\n      border-bottom: 1px solid #eec0c0;\n}\n.dacelve-index .liveTitleBox-comment .title input {\n        border: 0px;\n        border-shadow: 0;\n        width: 100%;\n        height: 35px;\n        text-align: center;\n        caret-color: #cd0000;\n}\n.dacelve-index .liveTitleBox-comment p {\n      line-height: 30px;\n      text-align: center;\n      color: #888;\n}\n.dacelve-index .fontBottom {\n    text-align: center;\n    width: 100%;\n    color: #b2b2b2;\n    font-size: 0.24rem;\n    background: #f9f9f9;\n    margin: 0.36rem 0;\n}\n.dacelve-index .liveCourse .courseBox {\n    margin-bottom: 0 !important;\n    background: #ffffff;\n}\n.dacelve-index .liveCourse .courseBox .noCourse {\n      padding: 0 0.24rem;\n      padding-bottom: 0.1rem;\n      position: relative;\n      min-height: 2.6rem;\n}\n.dacelve-index .liveCourse .courseBox .noCourse.active {\n        margin-top: .2rem;\n        margin-bottom: .2rem;\n        padding-bottom: 0;\n}\n.dacelve-index .liveCourse .courseBox .noCourse.active .img-mask {\n          min-height: 2.6rem;\n}\n.dacelve-index .liveCourse .courseBox .noCourse.active img {\n          width: 100%;\n          height: 100%;\n}\n.dacelve-index .liveCourse .courseBox .noCourse img {\n        width: 100%;\n}\n.dacelve-index .liveCourse .courseBox .noCourse .img-mask {\n        position: absolute;\n        min-height: 2.6rem;\n        top: 0;\n        width: -webkit-calc(100% - .48rem);\n        width: calc(100% - .48rem);\n        height: 100%;\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-align: center;\n        -webkit-align-items: center;\n            -ms-flex-align: center;\n                align-items: center;\n        -webkit-box-pack: center;\n        -webkit-justify-content: center;\n            -ms-flex-pack: center;\n                justify-content: center;\n        background: rgba(0, 0, 0, 0.3);\n}\n.dacelve-index .liveCourse .courseBox .noCourse .img-mask img {\n          width: .8rem;\n          height: .8rem;\n}\n.dacelve-index .liveCourse .courseBox .title {\n      font-size: 0.34rem;\n      padding: 0 0.24rem;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      height: 0.8rem;\n      position: relative;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n      -webkit-box-pack: justify;\n      -webkit-justify-content: space-between;\n          -ms-flex-pack: justify;\n              justify-content: space-between;\n}\n.dacelve-index .liveCourse .courseBox .title h5 {\n        font-weight: bold !important;\n        color: #919599;\n        font-size: 0.34rem;\n}\n.dacelve-index .liveCourse .courseBox .title h5::before {\n          content: \"\";\n          width: 0.34rem;\n          height: 0.41rem;\n          display: inline-block;\n          background: url(\"/images/2.0/hdktlm.png\") center center;\n          background-size: 100% 100%;\n          margin-right: 0.2rem;\n          vertical-align: bottom;\n}\n.dacelve-index .liveCourse .courseBox .title span {\n        font-size: 0.24rem;\n        color: #888888;\n}\n.dacelve-index .liveCourse .courseBox .title .img {\n        line-height: 100%;\n        position: absolute;\n        right: 0.24rem;\n        bottom: 0;\n}\n.dacelve-index .liveCourse .courseBox .title .img li {\n          float: left;\n          width: 0.36rem;\n          height: 0.36rem;\n          margin-right: 0.08rem;\n}\n.dacelve-index .liveCourse .courseBox .title .img li img {\n            width: 100%;\n            height: 100%;\n            border-radius: 50%;\n}\n.dacelve-index .liveCourse .courseBox .title .img span {\n          color: #888888;\n          padding-left: 0.09rem;\n}\n.dacelve-index .liveCourse .courseBox .hotImg {\n      position: relative;\n      width: 100%;\n      padding-top: 0.16rem;\n      margin-bottom: 0.24rem;\n}\n.dacelve-index .liveCourse .courseBox .hotImg a {\n        padding: 0px 15px;\n        width: auto;\n        display: block;\n}\n.dacelve-index .liveCourse .courseBox .hotImg a .list {\n          background-image: url(\"/images/index/beijingxian-ben.png\");\n          background-color: #f5f4f2;\n          background-position: left center;\n          background-repeat: no-repeat;\n          background-size: 100% 94%;\n          padding: 0.36rem 0 0rem 0.18rem;\n          height: auto;\n          overflow: hidden;\n          border-radius: 4px;\n          min-height: 2.3rem;\n          position: relative;\n}\n.dacelve-index .liveCourse .courseBox .hotImg a .list .mask-block {\n            width: 100%;\n            height: 100%;\n            position: absolute;\n            left: 100%;\n            top: 0;\n            background: #f5f4f2;\n}\n.dacelve-index .liveCourse .courseBox .hotImg a .list .mask-block.default {\n              left: 0;\n}\n.dacelve-index .liveCourse .courseBox .hotImg a .list .mask-block.active {\n              left: 100%;\n              -webkit-transition: all 1s ease;\n              transition: all 1s ease;\n}\n.dacelve-index .liveCourse .courseBox .hotImg a .list main.main {\n            position: absolute;\n            top: 0;\n            left: 0;\n            width: 100%;\n            padding: 0.36rem 0 0 0.18rem;\n            box-sizing: border-box;\n}\n.dacelve-index .liveCourse .courseBox .hotImg a .list .teacher-pic {\n            float: right;\n            width: 2.3rem;\n            height: 2.3rem;\n            opacity: 1;\n}\n.dacelve-index .liveCourse .courseBox .hotImg a .list .teacher-pic.default {\n              opacity: 0;\n}\n.dacelve-index .liveCourse .courseBox .hotImg a .list .teacher-pic.active {\n              opacity: 1;\n              -webkit-transition: all 0.3s ease;\n              transition: all 0.3s ease;\n}\n.dacelve-index .liveCourse .courseBox .hotImg a .list .teacher-pic img {\n              width: 100%;\n              height: 100%;\n}\n.dacelve-index .liveCourse .courseBox .hotImg a .list .info .cate {\n            font-size: 0.24rem;\n            color: #888888;\n            margin-bottom: 0.11rem;\n}\n.dacelve-index .liveCourse .courseBox .hotImg a .list .info .cate i {\n              color: #ff7615;\n              margin-right: 0.24rem;\n}\n.dacelve-index .liveCourse .courseBox .hotImg a .list .info .cour-name {\n            font-size: 0.32rem;\n            color: #353535;\n            margin-bottom: 0.23rem;\n            font-weight: bolder;\n}\n.dacelve-index .liveCourse .courseBox .hotImg a .list .info .time {\n            font-size: 0.24rem;\n            color: #888888;\n}\n.dacelve-index .liveCourse .courseBox .hotImg a .list .footer {\n            width: 100%;\n            height: 0.7rem;\n            position: absolute;\n            bottom: 0;\n            left: 0;\n            padding-left: 0.18rem;\n            padding-top: 0.1rem;\n            background: url(\"/images/index/xiamianbeijing-ben.png\") no-repeat left top;\n            background-size: 100% 100%;\n}\n.dacelve-index .liveCourse .courseBox .hotImg a .list .footer .head {\n              width: 0.6rem;\n              height: 0.6rem;\n              border-radius: 50%;\n}\n.dacelve-index .liveCourse .courseBox .hotImg a .list .footer .teac-name {\n              font-size: 0.28rem;\n              font-weight: bold;\n              color: #ffffff;\n              margin: 0 0.12rem;\n}\n.dacelve-index .liveCourse .courseBox .hotImg a .list .footer .live-icon {\n              width: 1.4rem;\n}\n.dacelve-index .liveCourse .courseBox .hotImg a .list .footer .ing-gif {\n              width: 0.76rem;\n              float: right;\n              margin-right: 0.88rem;\n              margin-top: 0.1rem;\n}\n.dacelve-index .notice {\n    width: 100%;\n    height: 0.6rem;\n    line-height: 0.6rem;\n    font-size: 0.28rem;\n    top: 0.28rem;\n    position: absolute;\n    padding: 0 0.24rem;\n    box-sizing: border-box;\n    z-index: 111;\n}\n.dacelve-index .notice .tag {\n      color: #fff;\n      font-weight: bold;\n      position: relative;\n      margin-right: 0.17rem;\n      background: url(\"/images/index/index_inform_icon.png\") center no-repeat;\n      background-size: auto 0.47rem;\n      width: 0.72rem;\n      text-align: center;\n}\n.dacelve-index .notice .item {\n      width: 100%;\n      overflow: hidden;\n      padding: 0 0.2rem;\n      background: rgba(0, 0, 0, 0.3);\n      box-sizing: border-box;\n      border-radius: 0.1rem;\n}\n.dacelve-index .notice .content {\n      position: relative;\n      height: 100%;\n      -webkit-box-flex: 1;\n      -webkit-flex: 1;\n          -ms-flex: 1;\n              flex: 1;\n      color: #fff;\n      overflow: hidden;\n}\n.dacelve-index .notice .content .notice-container {\n        position: absolute;\n        top: 0;\n        right: 0;\n        -webkit-transform: translateX(100%);\n            -ms-transform: translateX(100%);\n                transform: translateX(100%);\n}\n.dacelve-index .notice .content p {\n        position: relative;\n        white-space: nowrap;\n        font-size: 0.28rem;\n        color: #fff;\n}\n.dacelve-index .homeNav {\n    height: auto;\n    background: #fff;\n    margin-bottom: 0;\n    margin-top: 0.15rem;\n    padding: 0 0.16rem 0.3rem;\n    width: 100%;\n    box-sizing: border-box;\n}\n.dacelve-index .homeNav .item {\n      height: 1.6rem;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-pack: justify;\n      -webkit-justify-content: space-between;\n          -ms-flex-pack: justify;\n              justify-content: space-between;\n}\n.dacelve-index .homeNav .item.item1 {\n        border-bottom: 1px solid #f3f3f3;\n}\n.dacelve-index .homeNav a {\n      text-align: center;\n      height: 1rem;\n      margin-bottom: 0.2rem;\n      min-width: 20%;\n}\n.dacelve-index .homeNav a p {\n        height: 0.81rem;\n        padding-top: 10px;\n}\n.dacelve-index .homeNav a p img {\n          height: 100%;\n}\n.dacelve-index .homeNav a span {\n        display: block;\n        line-height: 0.5rem;\n        font-size: 0.26rem;\n        color: #1c0808;\n        font-family: \"\\5FAE\\8F6F\\96C5\\9ED1\", \"Helvetica Neue\", Helvetica, Arial, sans-serif;\n}\n.dacelve-index .v-modal {\n    background-color: #000;\n}\n.dacelve-index > div {\n    background-color: #fff;\n    margin-bottom: 0.24rem;\n}\n.dacelve-index .hot-icon {\n    display: inline-block;\n    width: 0.22rem;\n    height: 0.31rem;\n    background: url(\"/images/live-02.png\") no-repeat;\n    background-size: contain;\n    margin-right: 0.08rem;\n}\n.dacelve-index .p15 {\n    padding: 0 0.3rem;\n}\n.dacelve-index .swiper-container {\n    z-index: auto;\n}\n.dacelve-index .swiper-container .swiper-wrapper {\n      z-index: auto;\n      -webkit-perspective: 3000;\n      -webkit-backface-visibility: hidden;\n}\n.dacelve-index .mint-cell {\n    height: 0.8rem;\n    min-height: 0.8rem;\n    border-bottom: none !important;\n}\n.dacelve-index .mint-cell .mint-cell-title {\n      font-size: 0.34rem;\n      color: #919599;\n      /*font-weight: bold;*/\n      line-height: 0.28rem;\n}\n.dacelve-index .mint-cell .mint-cell-title img {\n        width: 0.41rem;\n        height: 0.31rem;\n        margin-top: -0.05rem;\n        margin-right: 0.16rem;\n}\n.dacelve-index .mint-cell .mint-cell-wrapper {\n      background-image: none;\n      /* padding: 0 .3rem;*/\n      padding: 0;\n      position: relative;\n      border-bottom: none !important;\n}\n.dacelve-index .mint-cell .mint-cell-wrapper .mint-cell-text {\n        vertical-align: baseline;\n        font-weight: bold;\n}\n.dacelve-index .mint-cell .mint-cell-value {\n      font-size: 0.28rem;\n      color: #a1adb8;\n      height: 45px;\n      line-height: 45px;\n}\n.dacelve-index .mint-cell .mint-cell-value span {\n        padding-right: 0.12rem;\n        color: #bb7676;\n        font-size: 0.25rem;\n}\n.dacelve-index .mint-cell .mint-cell-value.is-link {\n        margin-right: 0.4rem;\n}\n.dacelve-index .mint-cell:last-child {\n      background-image: none;\n}\n.dacelve-index .mint-cell .mint-cell-mask:after {\n      background-color: transparent !important;\n}\n.dacelve-index .top-banner {\n    height: 3.88rem;\n    position: relative;\n    margin: 0;\n}\n.dacelve-index .top-banner .mint-swipe {\n      height: 3.88rem;\n}\n.dacelve-index .top-banner .mint-swipe a p {\n        width: 100%;\n        height: 100%;\n}\n.dacelve-index .top-banner .mint-swipe a p img {\n          width: 100%;\n          height: 100%;\n}\n.dacelve-index .top-banner .hotImg {\n      height: 3.88rem;\n      position: relative;\n      width: 100%;\n      box-sizing: border-box;\n}\n.dacelve-index .top-banner .hotImg a p {\n        width: 100%;\n        height: 100%;\n}\n.dacelve-index .top-banner .hotImg a p img {\n          width: 100%;\n          height: 100%;\n}\n.dacelve-index .top-banner .swiper-pagination,\n    .dacelve-index .top-banner .mint-swipe-indicators {\n      text-align: center;\n      z-index: 5;\n      bottom: 0.24rem;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-pack: center;\n      -webkit-justify-content: center;\n          -ms-flex-pack: center;\n              justify-content: center;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n}\n.dacelve-index .top-banner .swiper-pagination-bullet,\n    .dacelve-index .top-banner .mint-swipe-indicator {\n      width: 0.1rem;\n      height: 0.1rem;\n      border-radius: 50%;\n      opacity: 1;\n      background-color: rgba(232, 232, 232, 0.6);\n      margin-right: 0;\n}\n.dacelve-index .top-banner .swiper-pagination-bullet:last-child,\n      .dacelve-index .top-banner .mint-swipe-indicator:last-child {\n        margin-right: 0.24rem;\n}\n.dacelve-index .top-banner .swiper-pagination-bullet.swiper-pagination-bullet-active,\n    .dacelve-index .top-banner .mint-swipe-indicator.is-active {\n      background-color: #fff !important;\n      width: 0.16rem;\n      height: 0.1rem;\n      border-radius: 0.2rem;\n}\n.dacelve-index .top-banner .swiper-container {\n      height: 3.88rem;\n      width: 100%;\n}\n.dacelve-index .top-banner .swiper-container a {\n        display: block;\n        width: auto;\n        height: 100%;\n        background-position: center center;\n        background-size: cover;\n        background-repeat: no-repeat;\n        margin: 0 auto;\n        overflow: hidden;\n        box-sizing: border-box;\n}\n.dacelve-index .top-banner .mint-swipe-item a {\n      display: block;\n      width: 100%;\n      height: 100%;\n      background-position: center center;\n      background-size: cover;\n      background-repeat: no-repeat;\n}\n.dacelve-index .hot-living a {\n    display: block;\n    position: relative;\n}\n.dacelve-index .hot-living > .flex:first-of-type {\n    border-bottom: 1px solid #fff;\n}\n.dacelve-index .hot-living > .flex a {\n    -webkit-box-flex: 1;\n    -webkit-flex: 1;\n        -ms-flex: 1;\n            flex: 1;\n    height: 2.5rem;\n    background-position: center center;\n    background-size: cover;\n    background-repeat: no-repeat;\n    color: #fff;\n}\n.dacelve-index .hot-living > .flex a:after {\n      content: \"\";\n      position: absolute;\n      top: 0;\n      right: 0;\n      width: 1px;\n      height: 100%;\n      background-color: #fff;\n}\n.dacelve-index .hot-living > .flex a:last-child:after {\n      content: none;\n}\n.dacelve-index .hot-living > .flex a .num {\n      position: absolute;\n      top: 0;\n      left: 0;\n      background-color: rgba(0, 0, 0, 0.4);\n      border-radius: 0 0.2rem 0.2rem 0;\n      height: 0.4rem;\n      font-size: 0.24rem;\n      line-height: 0.4rem;\n      padding: 0 0.16rem;\n}\n.dacelve-index .hot-living > .flex a .info {\n      position: absolute;\n      top: 0;\n      left: 0;\n      width: 100%;\n      height: 100%;\n      background-image: -webkit-linear-gradient(bottom, rgba(0, 0, 0, 0.3), transparent);\n      background-image: linear-gradient(to top, rgba(0, 0, 0, 0.3), transparent);\n      -webkit-box-orient: vertical;\n      -webkit-box-direction: normal;\n      -webkit-flex-direction: column;\n          -ms-flex-direction: column;\n              flex-direction: column;\n      -webkit-box-pack: end;\n      -webkit-justify-content: flex-end;\n          -ms-flex-pack: end;\n              justify-content: flex-end;\n      font-size: 0.24rem;\n      box-sizing: border-box;\n      padding: 0 0.16rem;\n}\n.dacelve-index .hot-living > .flex a .info .right {\n        -webkit-box-align: center;\n        -webkit-align-items: center;\n            -ms-flex-align: center;\n                align-items: center;\n        margin-bottom: 0.12rem;\n}\n.dacelve-index .hot-living > .flex a .info .left {\n        margin-bottom: 0.13rem;\n}\n.dacelve-index .hot-living > .flex .hot {\n    -webkit-box-flex: 2;\n    -webkit-flex: 2;\n        -ms-flex: 2;\n            flex: 2;\n    overflow: hidden;\n}\n.dacelve-index .hot-living .hot {\n    -webkit-box-flex: 2;\n    -webkit-flex: 2;\n        -ms-flex: 2;\n            flex: 2;\n}\n.dacelve-index .hot-living .hot .hot-layer {\n      position: absolute;\n      top: 0;\n      left: 0;\n      width: 100%;\n      height: 100%;\n      background-image: -webkit-linear-gradient(bottom, rgba(0, 0, 0, 0.5), transparent);\n      background-image: linear-gradient(to top, rgba(0, 0, 0, 0.5), transparent);\n      -webkit-box-orient: vertical;\n      -webkit-box-direction: normal;\n      -webkit-flex-direction: column;\n          -ms-flex-direction: column;\n              flex-direction: column;\n      -webkit-box-pack: end;\n      -webkit-justify-content: flex-end;\n          -ms-flex-pack: end;\n              justify-content: flex-end;\n      box-sizing: border-box;\n      padding-left: 0.16rem;\n      padding-right: 1.5rem;\n      font-size: 0.24rem;\n}\n.dacelve-index .hot-living .hot .hot-layer h5 {\n        font-size: 0.3rem;\n        margin-bottom: 0.16rem;\n}\n.dacelve-index .hot-living .hot .hot-layer .left {\n        margin-bottom: 0.11rem;\n}\n.dacelve-index .hot-living .hot .hot-layer .right {\n        margin-bottom: 0.14rem;\n        -webkit-box-align: center;\n        -webkit-align-items: center;\n            -ms-flex-align: center;\n                align-items: center;\n}\n.dacelve-index .hot-living .hot .icon {\n      position: absolute;\n      right: 0.57rem;\n      bottom: 0.16rem;\n}\n.dacelve-index .hot-living .hot .icon span {\n        display: block;\n        width: 0.44rem;\n        height: 0.46rem;\n        background: url(\"/images/index-tv.png\") no-repeat center/cover;\n}\n.dacelve-index .hot-living .hot .icon .fireworks {\n        position: absolute;\n        width: 2rem;\n        height: 4rem;\n        top: -4rem;\n        left: 50%;\n        -webkit-transform: translateX(-50%);\n            -ms-transform: translateX(-50%);\n                transform: translateX(-50%);\n        overflow: hidden;\n}\n.dacelve-index .hot-living .hot .icon i:not(:nth-of-type(3)) {\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-pack: center;\n        -webkit-justify-content: center;\n            -ms-flex-pack: center;\n                justify-content: center;\n        -webkit-box-align: center;\n        -webkit-align-items: center;\n            -ms-flex-align: center;\n                align-items: center;\n        width: 0.4rem;\n        height: 0.4rem;\n        border-radius: 50%;\n        bottom: -0.4rem;\n        left: 0.8rem;\n}\n.dacelve-index .hot-living .hot .icon i:not(:nth-of-type(3)) s {\n          display: block;\n}\n.dacelve-index .hot-living .hot .icon i {\n        position: absolute;\n}\n.dacelve-index .hot-living .hot .icon i:nth-of-type(1) {\n          background-color: #d7c184;\n          -webkit-animation: icon1 1s ease infinite;\n                  animation: icon1 1s ease infinite;\n}\n.dacelve-index .hot-living .hot .icon i:nth-of-type(1) s {\n            width: 0.23rem;\n            height: 0.22rem;\n            background: url(\"/images/index-hoticon-01.png\") no-repeat center/cover;\n}\n.dacelve-index .hot-living .hot .icon i:nth-of-type(2) {\n          background-color: #ff8915;\n          -webkit-animation: icon2 1s ease 0.3s infinite;\n                  animation: icon2 1s ease 0.3s infinite;\n}\n.dacelve-index .hot-living .hot .icon i:nth-of-type(2) s {\n            width: 0.2rem;\n            height: 0.19rem;\n            background: url(\"/images/index-hoticon-02.png\") no-repeat center/cover;\n}\n.dacelve-index .hot-living .hot .icon i:nth-of-type(3) {\n          display: block;\n          width: 0.44rem;\n          height: 0.44rem;\n          bottom: -0.44rem;\n          left: 0.78rem;\n          background: url(\"/images/index-hoticon-03.png\") no-repeat center/cover;\n          -webkit-animation: icon3 1s ease 0.6s infinite;\n                  animation: icon3 1s ease 0.6s infinite;\n}\n.dacelve-index .hot-living .hot .icon i:nth-of-type(4) {\n          background-color: #61f0c6;\n          -webkit-animation: icon4 1s ease 0.9s infinite;\n                  animation: icon4 1s ease 0.9s infinite;\n}\n.dacelve-index .hot-living .hot .icon i:nth-of-type(4) s {\n            width: 0.16rem;\n            height: 0.24rem;\n            background: url(\"/images/index-hoticon-04.png\") no-repeat center/cover;\n}\n.dacelve-index .hot-living .hot .icon i:nth-of-type(5) {\n          background-color: #3a64e1;\n          -webkit-animation: icon5 1s ease 1.2s infinite;\n                  animation: icon5 1s ease 1.2s infinite;\n}\n.dacelve-index .hot-living .hot .icon i:nth-of-type(5) s {\n            width: 0.22rem;\n            height: 0.22rem;\n            background: url(\"/images/index-hoticon-05.png\") no-repeat center/cover;\n}\n.dacelve-index .hot-living .hot-main {\n    height: 100%;\n}\n.dacelve-index .hot-living .hot-main p {\n      position: absolute;\n      top: 0;\n      left: 0;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n      font-size: 0.24rem;\n      background-color: #ff7d27;\n      height: 0.4rem;\n      border-radius: 0 0.2rem 0.2rem 0;\n      padding-right: 0.19rem;\n}\n.dacelve-index .hot-living .hot-main p:before {\n        content: \"\";\n        display: inline-block;\n        width: 0.1rem;\n        height: 0.1rem;\n        border-radius: 50%;\n        background-color: #fff;\n        margin-left: 0.12rem;\n        margin-right: 0.1rem;\n}\n.dacelve-index .invest-lesson .links {\n    border-top: 1px solid #eeeeee;\n    padding: 0.3rem 0.2rem;\n    height: 2.1rem;\n    color: #faeed0;\n    font-size: 0.42rem;\n    font-style: italic;\n}\n.dacelve-index .invest-lesson .links a {\n      border-radius: 4px;\n      -webkit-box-flex: 1;\n      -webkit-flex: 1;\n          -ms-flex: 1;\n              flex: 1;\n      box-sizing: border-box;\n      -webkit-box-pack: end;\n      -webkit-justify-content: flex-end;\n          -ms-flex-pack: end;\n              justify-content: flex-end;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n}\n.dacelve-index .invest-lesson .links .free-link {\n      background: url(\"/images/index-invest-01.png\") no-repeat center center/cover;\n      padding-right: 0.36rem;\n}\n.dacelve-index .invest-lesson .links div {\n      -webkit-box-flex: 1;\n      -webkit-flex: 1;\n          -ms-flex: 1;\n              flex: 1;\n      margin-left: 0.2rem;\n      -webkit-box-orient: vertical;\n      -webkit-box-direction: normal;\n      -webkit-flex-direction: column;\n          -ms-flex-direction: column;\n              flex-direction: column;\n}\n.dacelve-index .invest-lesson .links .charge-link {\n      margin-bottom: 0.2rem;\n      padding-right: 0.26rem;\n      background: url(\"/images/index-invest-02.png\") no-repeat center center/cover;\n}\n.dacelve-index .invest-lesson .links .secret-link {\n      padding-right: 0.26rem;\n      background: url(\"/images/index-invest-03.png\") no-repeat center center/cover;\n}\n.dacelve-index .reading {\n    margin: 0px;\n    margin-bottom: 0.24rem;\n}\n.dacelve-index .reading .loadmore {\n      height: 1rem;\n      line-height: 1rem;\n      text-align: center;\n}\n.dacelve-index .reading .loadmore p {\n        font-size: 0.24rem;\n        color: #888;\n}\n.dacelve-index .reading .loadmore p i {\n          width: 0.2rem;\n          height: 0.12rem;\n          margin-left: 0.1rem;\n          display: inline-block;\n          background: url(/images/index/Load_ben.png) center center no-repeat;\n          background-size: 100% auto;\n}\n.dacelve-index .reading .loadmore span {\n        display: inline-block;\n        -webkit-transition: 0.2s linear;\n        transition: 0.2s linear;\n        vertical-align: middle;\n        font-size: 0.24rem;\n        color: #888;\n}\n.dacelve-index .reading .mint-cell .mint-cell-title {\n      font-size: 0.34rem;\n      font-weight: bold;\n}\n.dacelve-index .reading .mint-cell .mint-cell-title img {\n        width: 0.44rem;\n        height: 0.27rem;\n        margin-right: 0.16rem;\n}\n.dacelve-index .reading > .title {\n      height: 0.8rem;\n      line-height: 0.8rem;\n      margin-bottom: 0.06rem;\n      padding: 0 0.24rem;\n}\n.dacelve-index .reading > .title > span {\n        font-size: 0.34rem;\n        color: #919599;\n        padding-left: 0.6rem;\n        font-weight: bold;\n        background: url(\"/images/2.0/sdydlm.png\") left center no-repeat;\n        background-size: 0.44rem 0.27rem;\n}\n.dacelve-index .reading > .title a {\n        float: right;\n        color: #888;\n        font-size: 0.24rem;\n        padding-right: 0.2rem;\n        color: #c62f2f;\n        background: url(\"/images/more_arrow_icon.png\") right center no-repeat;\n        background-size: 0.14rem auto;\n}\n.dacelve-index .reading .mint-cell-wrapper {\n      padding: 0 0.24rem;\n}\n.dacelve-index .reading .list {\n      margin-top: 0.12rem;\n      padding: 0 0.24rem;\n}\n.dacelve-index .reading .list .a {\n        display: block;\n        padding: 0.26rem 0 0.26rem;\n        border-bottom: 1px solid #ebebeb;\n        position: relative;\n        overflow: hidden;\n}\n.dacelve-index .reading .list .a:last-child {\n          border-bottom: none;\n}\n.dacelve-index .reading .list .a:first-child {\n          padding-top: 0;\n}\n.dacelve-index .reading .list .a .item {\n          margin-right: 0.24rem;\n}\n.dacelve-index .reading .list .a .item h6 {\n            display: inline;\n            max-height: 1rem;\n            -webkit-box-align: center;\n            -webkit-align-items: center;\n                -ms-flex-align: center;\n                    align-items: center;\n            overflow: hidden;\n            /* 超出部分隐藏 */\n            text-overflow: ellipsis;\n            -webkit-line-clamp: 2;\n            -webkit-box-orient: vertical;\n}\n.dacelve-index .reading .list .a .item p {\n            font-size: 0.24rem;\n            color: #888;\n            line-height: 1.4;\n            overflow: hidden;\n            text-overflow: ellipsis;\n            display: -webkit-box;\n            -webkit-line-clamp: 2;\n            -webkit-box-orient: vertical;\n}\n.dacelve-index .reading .list .a h5 {\n          font-size: 0.32rem;\n          margin-bottom: 0.2rem;\n          line-height: 0.5rem;\n          max-height: 1rem;\n          color: #353535;\n          overflow: hidden;\n          text-overflow: ellipsis;\n          display: -webkit-box;\n          -webkit-line-clamp: 2;\n          -webkit-box-orient: vertical;\n          padding-right: 0.1rem;\n}\n.dacelve-index .reading .list .a h5 > span {\n            text-align: center;\n            padding: 0.02rem 0.1rem;\n            background: #ff3229;\n            vertical-align: middle;\n            color: #fff;\n            -webkit-flex-shrink: 0;\n                -ms-flex-negative: 0;\n                    flex-shrink: 0;\n            font-size: 12px;\n            border-radius: 0.2rem;\n            box-sizing: border-box;\n}\n.dacelve-index .reading .list .a h5 > span + span {\n              margin-left: 0.14rem;\n}\n.dacelve-index .reading .list .a h5 > span + i {\n              margin-left: 0.14rem;\n}\n.dacelve-index .reading .list .a h5 .top-status {\n            border: 1px solid #ff3229;\n}\n.dacelve-index .reading .list .a h5 .top-status small {\n              display: inline-block;\n              -webkit-transform: scale(0.9);\n                  -ms-transform: scale(0.9);\n                      transform: scale(0.9);\n              font-size: 10px;\n}\n.dacelve-index .reading .list .a h5 .cate {\n            background: #fff;\n            color: #ff3229;\n            border: 1px solid #ff3229;\n}\n.dacelve-index .reading .list .a h5 > i {\n            display: inline-block;\n            width: 0.25rem;\n            height: 0.33rem;\n            -webkit-flex-shrink: 0;\n                -ms-flex-negative: 0;\n                    flex-shrink: 0;\n            vertical-align: middle;\n            background: #c62f2f;\n            background: url(\"/images/2.0/suoicon.png\") center no-repeat;\n            background-size: 100% auto;\n}\n.dacelve-index .reading .list .a .bottom-info {\n          -webkit-box-align: center;\n          -webkit-align-items: center;\n              -ms-flex-align: center;\n                  align-items: center;\n          -webkit-box-pack: justify;\n          -webkit-justify-content: space-between;\n              -ms-flex-pack: justify;\n                  justify-content: space-between;\n          font-size: 0.24rem;\n          height: 0.44rem;\n          line-height: 1;\n          color: #b2b2b2;\n          white-space: nowrap;\n          margin-top: 0.24rem;\n}\n.dacelve-index .reading .list .a .bottom-info .author {\n            -webkit-box-align: center;\n            -webkit-align-items: center;\n                -ms-flex-align: center;\n                    align-items: center;\n            max-width: 71vw;\n            overflow: hidden;\n            white-space: nowrap;\n            height: 0.5rem;\n            text-overflow: ellipsis;\n}\n.dacelve-index .reading .list .a .bottom-info .author .title-cate {\n              height: 0.38rem;\n              margin-right: 3px;\n              margin-bottom: 0.02rem;\n              line-height: 0.38rem;\n              padding: 0 0.2rem;\n              border-radius: 0.2rem;\n              color: #bb7676;\n              background-color: #f2f2f2;\n}\n.dacelve-index .reading .list .a .bottom-info .bottom-right {\n            -webkit-flex-shrink: 0;\n                -ms-flex-negative: 0;\n                    flex-shrink: 0;\n}\n.dacelve-index .reading .list .a .bottom-info .time {\n            margin-right: 0.16rem;\n}\n.dacelve-index .reading .list .a .bottom-info .name {\n            margin-right: 0.3rem;\n            margin-left: 0.16rem;\n            -webkit-flex-shrink: 0;\n                -ms-flex-negative: 0;\n                    flex-shrink: 0;\n            color: #bb7676;\n            padding: 0.06rem 0;\n}\n.dacelve-index .reading .list .a .bottom-info .watch-nums,\n          .dacelve-index .reading .list .a .bottom-info .like-nums {\n            -webkit-box-align: center;\n            -webkit-align-items: center;\n                -ms-flex-align: center;\n                    align-items: center;\n}\n.dacelve-index .reading .list .a .bottom-info .like-nums.active {\n            color: #c62f2f;\n}\n.dacelve-index .reading .list .a .bottom-info .like-nums.active .like-icon {\n              background: url(\"/images/2.0/item_like_icon_two_yx.png\") no-repeat center/cover;\n}\n.dacelve-index .reading .list .a .bottom-info .watch-nums {\n            margin-right: 0.24rem;\n}\n.dacelve-index .reading .list .a .bottom-info .watch-icon {\n            display: inline-block;\n            width: 0.32rem;\n            height: 0.22rem;\n            background: url(\"/images/column/icons8-Eye-100.png\") no-repeat center/cover;\n            margin-right: 0.1rem;\n}\n.dacelve-index .reading .list .a .bottom-info .like-icon {\n            display: inline-block;\n            width: 0.26rem;\n            margin-right: 0.1rem;\n            height: 0.28rem;\n            background: url(\"/images/2.0/item_like_icon_yx.png\") no-repeat center/cover;\n}\n.dacelve-index .reading .list .picture-3 h5 {\n        margin-bottom: 0.19rem;\n}\n.dacelve-index .reading .list .picture-3 .picture-container div {\n        -webkit-box-flex: 1;\n        -webkit-flex: 1;\n            -ms-flex: 1;\n                flex: 1;\n        background-repeat: no-repeat;\n        background-size: cover;\n        background-position: center center;\n        margin-right: 0.1rem;\n        height: 1.48rem;\n}\n.dacelve-index .reading .list .picture-3 .picture-container div:last-child {\n          margin-right: 0;\n}\n.dacelve-index .reading .list .picture-1 .picture-1-main .item {\n        width: -webkit-calc(100% - 2.3rem);\n        width: calc(100% - 2.3rem);\n}\n.dacelve-index .reading .list .picture-1 .picture-1-main .img {\n        display: block;\n        width: 2rem;\n        height: 1.46rem;\n        background-position: center center;\n        background-repeat: no-repeat;\n        background-size: cover;\n}\n.dacelve-index .shake-icon {\n    position: fixed;\n    right: 0.24rem;\n    bottom: 1.8rem;\n    margin-bottom: 0;\n    width: 100%;\n    background-color: transparent;\n    -webkit-transition: -webkit-transform 0.5s ease;\n    transition: -webkit-transform 0.5s ease;\n    transition: transform 0.5s ease;\n    transition: transform 0.5s ease, -webkit-transform 0.5s ease;\n    z-index: 999;\n}\n.dacelve-index .shake-icon.hide-icon {\n      -webkit-transform: translateX(100%);\n          -ms-transform: translateX(100%);\n              transform: translateX(100%);\n}\n.dacelve-index .shake-icon a {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      width: 1.33rem;\n      float: right;\n      height: 1.46rem;\n      overflow: hidden;\n      -webkit-box-pack: center;\n      -webkit-justify-content: center;\n          -ms-flex-pack: center;\n              justify-content: center;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n}\n.dacelve-index .shake-icon a span {\n        display: block;\n        width: 1.33rem;\n        height: 1.46rem;\n        background: url(\"/images/index-shake.png\") no-repeat center/cover;\n        -webkit-transform-origin: center center;\n            -ms-transform-origin: center center;\n                transform-origin: center center;\n        -webkit-animation: shakeAnimation 0.3s linear infinite alternate;\n                animation: shakeAnimation 0.3s linear infinite alternate;\n}\n.dacelve-index .index-modal {\n    width: 100%;\n    padding: 0 0.36rem;\n    box-sizing: border-box;\n    background-color: transparent;\n    margin-bottom: 0;\n}\n.dacelve-index .index-modal .mint-swipe {\n      height: 8.53rem;\n      overflow: auto;\n}\n.dacelve-index .index-modal .mint-swipe img {\n        width: 100%;\n}\n.dacelve-index .index-modal button {\n      position: absolute;\n      bottom: -1rem;\n      left: 50%;\n      margin-left: -0.3rem;\n      border: none;\n      padding: 0;\n      width: 0.6rem;\n      height: 0.6rem;\n      z-index: 9999;\n      background: url(\"/images/index-modalclose.png\") no-repeat center center/cover;\n}\n.dacelve-index .index-modal .layer {\n      height: 11rem;\n      position: relative;\n      background: url(\"/images/index-modal.png\") no-repeat center top/cover;\n}\n.dacelve-index .index-modal .layer a {\n        width: 5.82rem;\n        height: 0.88rem;\n        background: url(\"/images/index-modalbtn.png\") no-repeat center center/cover;\n        font-size: 0.4rem;\n        line-height: 0.88rem;\n        text-align: center;\n        font-weight: bold;\n        position: absolute;\n        bottom: 0.62rem;\n        left: 50%;\n        -webkit-transform: translateX(-50%);\n            -ms-transform: translateX(-50%);\n                transform: translateX(-50%);\n}\n@-webkit-keyframes shakeAnimation {\nfrom {\n    -webkit-transform: rotate(-10deg);\n            transform: rotate(-10deg);\n}\nto {\n    -webkit-transform: rotate(10deg);\n            transform: rotate(10deg);\n}\n}\n@keyframes shakeAnimation {\nfrom {\n    -webkit-transform: rotate(-10deg);\n            transform: rotate(-10deg);\n}\nto {\n    -webkit-transform: rotate(10deg);\n            transform: rotate(10deg);\n}\n}\n@-webkit-keyframes indexNoticeAnimation {\nfrom {\n    -webkit-transform: translateX(100%);\n            transform: translateX(100%);\n}\nto {\n    -webkit-transform: translateX(0);\n            transform: translateX(0);\n}\n}\n@keyframes indexNoticeAnimation {\nfrom {\n    -webkit-transform: translateX(100%);\n            transform: translateX(100%);\n}\nto {\n    -webkit-transform: translateX(0);\n            transform: translateX(0);\n}\n}\n@-webkit-keyframes icon1 {\n0% {\n    -webkit-transform: translate(0, 0) scale(0.5, 0.5);\n            transform: translate(0, 0) scale(0.5, 0.5);\n    opacity: 1;\n}\n60% {\n    opacity: 1;\n}\n100% {\n    -webkit-transform: translate(-0.1rem, -1.8rem) scale(1, 1);\n            transform: translate(-0.1rem, -1.8rem) scale(1, 1);\n    opacity: 0;\n}\n}\n@keyframes icon1 {\n0% {\n    -webkit-transform: translate(0, 0) scale(0.5, 0.5);\n            transform: translate(0, 0) scale(0.5, 0.5);\n    opacity: 1;\n}\n60% {\n    opacity: 1;\n}\n100% {\n    -webkit-transform: translate(-0.1rem, -1.8rem) scale(1, 1);\n            transform: translate(-0.1rem, -1.8rem) scale(1, 1);\n    opacity: 0;\n}\n}\n@-webkit-keyframes icon2 {\n0% {\n    -webkit-transform: translate(0, 0) scale(0.5, 0.5);\n            transform: translate(0, 0) scale(0.5, 0.5);\n    opacity: 1;\n}\n60% {\n    opacity: 1;\n}\n100% {\n    -webkit-transform: translate(-0.4rem, -1.8rem) scale(1, 1);\n            transform: translate(-0.4rem, -1.8rem) scale(1, 1);\n    opacity: 0;\n}\n}\n@keyframes icon2 {\n0% {\n    -webkit-transform: translate(0, 0) scale(0.5, 0.5);\n            transform: translate(0, 0) scale(0.5, 0.5);\n    opacity: 1;\n}\n60% {\n    opacity: 1;\n}\n100% {\n    -webkit-transform: translate(-0.4rem, -1.8rem) scale(1, 1);\n            transform: translate(-0.4rem, -1.8rem) scale(1, 1);\n    opacity: 0;\n}\n}\n@-webkit-keyframes icon3 {\n0% {\n    -webkit-transform: translate(0, 0) scale(0.5, 0.5);\n            transform: translate(0, 0) scale(0.5, 0.5);\n    opacity: 1;\n}\n60% {\n    opacity: 1;\n}\n100% {\n    -webkit-transform: translate(0.32rem, -1.8rem) scale(1, 1);\n            transform: translate(0.32rem, -1.8rem) scale(1, 1);\n    opacity: 0;\n}\n}\n@keyframes icon3 {\n0% {\n    -webkit-transform: translate(0, 0) scale(0.5, 0.5);\n            transform: translate(0, 0) scale(0.5, 0.5);\n    opacity: 1;\n}\n60% {\n    opacity: 1;\n}\n100% {\n    -webkit-transform: translate(0.32rem, -1.8rem) scale(1, 1);\n            transform: translate(0.32rem, -1.8rem) scale(1, 1);\n    opacity: 0;\n}\n}\n@-webkit-keyframes icon4 {\n0% {\n    -webkit-transform: translate(0, 0) scale(0.5, 0.5);\n            transform: translate(0, 0) scale(0.5, 0.5);\n    opacity: 1;\n}\n60% {\n    opacity: 1;\n}\n100% {\n    -webkit-transform: translate(-0.04rem, -1.8rem) scale(1, 1);\n            transform: translate(-0.04rem, -1.8rem) scale(1, 1);\n    opacity: 0;\n}\n}\n@keyframes icon4 {\n0% {\n    -webkit-transform: translate(0, 0) scale(0.5, 0.5);\n            transform: translate(0, 0) scale(0.5, 0.5);\n    opacity: 1;\n}\n60% {\n    opacity: 1;\n}\n100% {\n    -webkit-transform: translate(-0.04rem, -1.8rem) scale(1, 1);\n            transform: translate(-0.04rem, -1.8rem) scale(1, 1);\n    opacity: 0;\n}\n}\n@-webkit-keyframes icon5 {\n0% {\n    -webkit-transform: translate(0, 0) scale(0.5, 0.5);\n            transform: translate(0, 0) scale(0.5, 0.5);\n    opacity: 1;\n}\n60% {\n    opacity: 1;\n}\n100% {\n    -webkit-transform: translate(0.2rem, -1.8rem) scale(1, 1);\n            transform: translate(0.2rem, -1.8rem) scale(1, 1);\n    opacity: 0;\n}\n}\n@keyframes icon5 {\n0% {\n    -webkit-transform: translate(0, 0) scale(0.5, 0.5);\n            transform: translate(0, 0) scale(0.5, 0.5);\n    opacity: 1;\n}\n60% {\n    opacity: 1;\n}\n100% {\n    -webkit-transform: translate(0.2rem, -1.8rem) scale(1, 1);\n            transform: translate(0.2rem, -1.8rem) scale(1, 1);\n    opacity: 0;\n}\n}\n.swiper-container {\n  -webkit-overflow-scrolling: touch;\n}\n", ""]);

// exports


/***/ })

});