webpackJsonp([0],{

/***/ "/+QB":
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "static/img/peitu1.jpg";

/***/ }),

/***/ "1AME":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "1mmi":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "1p1/":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/page/about/job.vue
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ var job = ({
  data: function data() {
    return {
      metaInfo: { //seo
        title: '',
        name: '',
        content: ''
      },
      job: []
    };
  },

  name: 'async',
  metaInfo: function metaInfo() {
    return {
      title: this.metaInfo.title,
      meta: [{
        name: this.metaInfo.name, //keyWords
        content: this.metaInfo.content
      }],
      link: [{ // set link
        rel: 'lexinamc',
        href: 'document.location.hostname'
      }]
    };
  },
  mounted: function mounted() {},
  created: function created() {
    this.getContentSetting();
    this.getJob();
    this.$nextTick(function () {
      window.scrollTo(0, 1);
      window.scrollTo(0, 0);
    });
  },

  methods: {
    getContentSetting: function getContentSetting() {
      var _this = this;

      //获取网站内容设置
      this.$request.get('/ContentManage/getContentSetting', '', function (res) {
        console.log(res);
        if (res.code == 200) {
          _this.metaInfo.title = res.data[0].title + '-招聘英才';
          _this.metaInfo.name = res.data[0].SEO_antistop;
          _this.metaInfo.content = res.data[0].describe;
        }
      });
    },
    getJob: function getJob() {
      var _this2 = this;

      //获取再招职位
      this.$request.get('/ContentManage/getRecruitment', {
        id: this.$route.params.id
      }, function (res) {
        if (res.code == 200) {
          _this2.job = res.data[0];
        }
      });
    }
  }

});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-5a319d66","hasScoped":false,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/page/about/job.vue
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('main',{staticClass:"jobBox"},[_c('header'),_vm._v(" "),_c('article',{staticClass:"box"},[_c('div',{staticClass:"title"},[_c('h2',[_vm._v(_vm._s(_vm.job.position_name))]),_vm._v(" "),_c('span',[_vm._v("发布时间："+_vm._s(_vm.job.create_time))])]),_vm._v(" "),_c('ul',{staticClass:"type"},[_c('li',[_vm._v("招聘类别：   "+_vm._s(_vm.job.posttion_category))]),_vm._v(" "),_c('li',[_vm._v("最低学历：  "+_vm._s(_vm.job.education))]),_vm._v(" "),_c('li',[_vm._v("工作地点：   "+_vm._s(_vm.job.address))]),_vm._v(" "),_c('li',[_vm._v("工作年限：  "+_vm._s(_vm.job.working_years))]),_vm._v(" "),_c('li',[_vm._v("招聘人数：   "+_vm._s(_vm.job.recruitment_num)+"人")]),_vm._v(" "),_c('li',[_vm._v("工作类型：   "+_vm._s(_vm.job.working_category))])]),_vm._v(" "),_c('div',{staticClass:"description",domProps:{"innerHTML":_vm._s(_vm.job.content)}}),_vm._v(" "),_vm._m(0)])])}
var staticRenderFns = [function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',{staticClass:"description"},[_c('h2',[_vm._v("投递邮箱："),_c('b',[_vm._v("teresa_hr@163.com.com")])])])}]
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ var about_job = (esExports);
// CONCATENATED MODULE: ./src/page/about/job.vue
function injectStyle (ssrContext) {
  __webpack_require__("8f+x")
}
var normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  job,
  about_job,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)

/* harmony default export */ var page_about_job = __webpack_exports__["default"] = (Component.exports);


/***/ }),

/***/ "23Wm":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "2Mih":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/components/index/aside1.vue
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ var aside1 = ({
  data: function data() {
    return {
      codeData: "",
      codeImg: "",
      activeTab: 1
    };
  },
  created: function created() {
    this.getcode();
  },

  methods: {
    clickShow: function clickShow(n) {
      if (n == 1) {
        this.codeImg = this.codeData.weixin.qr_code;
        this.activeTab = 1;
      } else if (n == 2) {
        this.codeImg = this.codeData.applet.qr_code;
        this.activeTab = 2;
      } else {
        this.codeImg = this.codeData.mobile.qr_code;
        this.activeTab = 3;
      }
    },
    getcode: function getcode() {
      var _this = this;

      /**
       * 获取微信 小程序 app下载二维码
       * @return [array] [description]
       */
      this.$request.get('/ContentManage/getQRCode', '', function (res) {
        _this.codeData = res.data;
        _this.$emit('evaluation', _this.codeData);
        if (_this.codeData.weixin != undefined) {
          _this.codeImg = _this.codeData.weixin.qr_code;
        }
      });
      /*this.$request.get("/Home/getQrcode", "", res => {
        this.codeData = res.data;
        this.codeImg = this.codeData.focus_qrcode;
      });*/
    }
  }
});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-13bf61ec","hasScoped":false,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/components/index/aside1.vue
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',{staticClass:"aside1"},[_c('ul',{staticClass:"tab1"},[_c('li',{class:{'active':_vm.activeTab == 1},on:{"mouseover":function($event){_vm.clickShow(1)},"click":function($event){_vm.clickShow(1)}}},[_c('p'),_vm._v(" "),_c('h6',[_vm._v("微信听课")])]),_vm._v(" "),_c('li',{class:{'active':_vm.activeTab == 2},on:{"mouseover":function($event){_vm.clickShow(2)},"click":function($event){_vm.clickShow(2)}}},[_c('p'),_vm._v(" "),_c('h6',[_vm._v("小程序听课")])]),_vm._v(" "),_c('li',{class:{'active':_vm.activeTab == 3},on:{"mouseover":function($event){_vm.clickShow(3)},"click":function($event){_vm.clickShow(3)}}},[_c('p'),_vm._v(" "),_c('h6',[_vm._v("客户端听课")])])]),_vm._v(" "),_vm._m(0),_vm._v(" "),_c('img',{staticClass:"img",attrs:{"src":_vm.codeImg,"alt":""}})])}
var staticRenderFns = [function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('ul',{staticClass:"tab2"},[_c('li',[_c('span',[_vm._v("最新最热")]),_vm._v(" "),_c('span',[_vm._v("股市资讯")])]),_vm._v(" "),_c('li',[_c('span',[_vm._v("订阅栏目")]),_vm._v(" "),_c('span',[_vm._v("效率阅读")])]),_vm._v(" "),_c('li',[_c('span',[_vm._v("订阅栏目")]),_vm._v(" "),_c('span',[_vm._v("效率阅读")])])])}]
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ var index_aside1 = (esExports);
// CONCATENATED MODULE: ./src/components/index/aside1.vue
function injectStyle (ssrContext) {
  __webpack_require__("gdUC")
}
var normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  aside1,
  index_aside1,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)

/* harmony default export */ var components_index_aside1 = __webpack_exports__["a"] = (Component.exports);


/***/ }),

/***/ "2Th5":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "4bsv":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";

// EXTERNAL MODULE: ./src/assets/images/1.1/imgbg.jpg
var imgbg = __webpack_require__("VrL8");
var imgbg_default = /*#__PURE__*/__webpack_require__.n(imgbg);

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/components/college/course-list.vue
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ var course_list = ({
  props: ['listData'],
  data: function data() {
    return {
      defaultCover: imgbg_default.a
    };
  }
});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-91ead686","hasScoped":false,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/components/college/course-list.vue
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('main',{staticClass:"course-list"},[_c('ul',{staticClass:"clearfix"},_vm._l((_vm.listData),function(item,index){return _c('li',{staticClass:"course-item"},[_c('a',{attrs:{"href":item.jumpUrl,"target":"_blank"}},[_c('img',{staticClass:"cover",attrs:{"src":item.src_pc_img?item.src_pc_img:_vm.defaultCover,"alt":""}}),_vm._v(" "),_c('section',{staticClass:"detail"},[_c('h4',[_vm._v(_vm._s(item.class_name))]),_vm._v(" "),_c('section',{staticClass:"num"},[(item.type == 3)?_c('span',[_vm._v(_vm._s(item.enroll_total)+"人已报名")]):_vm._e(),_vm._v(" "),(item.type != 3)?_c('span',[_vm._v(_vm._s(item.study_total)+"人已学习")]):_vm._e(),_vm._v(" "),(item.type == 2)?_c('h5',[_vm._v("已更新"+_vm._s(item.update_total)+"节 | 共"+_vm._s(item.plan_num)+"节 ")]):_vm._e()]),_vm._v(" "),_c('section',{staticClass:"info"},[_c('img',{attrs:{"src":item.head_add,"alt":""}}),_vm._v(" "),_c('span',[_vm._v(_vm._s(item.alias))]),_vm._v(" "),(item.level == 1)?_c('p',{staticClass:"lock"},[_vm._v("私密课程")]):_vm._e(),_vm._v(" "),(item.level == 2)?_c('p',{staticClass:"price"},[_vm._v(_vm._s(item.price))]):_vm._e()])])])])}))])}
var staticRenderFns = []
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ var college_course_list = (esExports);
// CONCATENATED MODULE: ./src/components/college/course-list.vue
function injectStyle (ssrContext) {
  __webpack_require__("tBsc")
}
var normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  course_list,
  college_course_list,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)

/* harmony default export */ var components_college_course_list = __webpack_exports__["a"] = (Component.exports);


/***/ }),

/***/ "5LIk":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "5RpU":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "6NzX":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "6U5z":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "6gf/":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "7HZ7":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "8/c5":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });

// EXTERNAL MODULE: ./node_modules/babel-runtime/regenerator/index.js
var regenerator = __webpack_require__("Xxa5");
var regenerator_default = /*#__PURE__*/__webpack_require__.n(regenerator);

// EXTERNAL MODULE: ./node_modules/babel-runtime/helpers/asyncToGenerator.js
var asyncToGenerator = __webpack_require__("exGp");
var asyncToGenerator_default = /*#__PURE__*/__webpack_require__.n(asyncToGenerator);

// EXTERNAL MODULE: ./src/components/column/list.vue + 2 modules
var list = __webpack_require__("mipW");

// EXTERNAL MODULE: ./src/components/index/aside1.vue + 2 modules
var aside1 = __webpack_require__("2Mih");

// EXTERNAL MODULE: ./node_modules/vue-awesome-swiper/dist/vue-awesome-swiper.js
var vue_awesome_swiper = __webpack_require__("7QTg");
var vue_awesome_swiper_default = /*#__PURE__*/__webpack_require__.n(vue_awesome_swiper);

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/components/index/interactCourse.vue
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ var interactCourse = ({
  data: function data() {
    return {
      courseOption: {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: false,
        pagination: {
          el: ".swiper-pagination",
          clickable: true
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev"
        }
      },
      LiveToday: [], //课程表
      onlineHeadAddList: [], //在线人数
      courseEnd: false, //是否结束
      courseEndImg: "", //课程表
      online_num: 0, //在线人数
      videoShow: false //是否显示视频
    };
  },
  created: function created() {
    this.getMyGlobalLive();
  },

  methods: {
    /*
     ** 互动课程
     */
    getMyGlobalLive: function getMyGlobalLive() {
      var _this = this;

      this.$request.get("/GlobalLive/getBackgroundImg", { id: 9999 }, function (res) {
        _this.courseEndImg = res.data.picUrl;
        _this.online_num = res.data.online_num;
        if (res.data.type != 1 && res.data.type != 4) {
          _this.getcourseTable();
        }
        if (res.data.type == 3 || res.data.type == 5) {
          _this.courseEnd = false;
        } else {
          _this.courseEnd = true;

          if (res.data.type == 2) {
            _this.videoShow = true;
          }
        }
      });
    },
    getcourseTable: function getcourseTable() {
      var _this2 = this;

      this.$request.get("/GlobalLive/getGlobalLiveToday", { isOnlineHeadAdd: true }, function (res) {
        var num = "";
        var numT = false;
        var zNum = false;
        var courseEnds = false;

        for (var i = 0; i < res.data.length; i++) {
          var start_time = res.data[i].set_start_time;
          var end_time = res.data[i].set_end_time;
          var timestamp2 = new Date(start_time.split("-").join("/")),
              timestamp3 = new Date(end_time.split("-").join("/")),
              timestamp1 = new Date();
          var s = timestamp2.getTime() - timestamp1.getTime();
          var e = timestamp3.getTime() - timestamp1.getTime();
          if (s > 0) {
            //即將開始
            res.data[i].state = 1;
            if (numT == false) {
              num = i;
              // console.log(num);
              numT = true;
            }
          } else if (s < 0 && e > 0) {
            //直播中

            res.data[i].state = 2;

            if (zNum == false) {
              num = i;

              zNum = true;
              numT = true;
            }
          } else {
            //直播結束
            res.data[i].state = 3;
          }
        }

        //未結束
        _this2.LiveToday = res.data;
        console.log("课程表", _this2.LiveToday);
        _this2.onlineHeadAddList = res.data[0].onlineHeadAddList;
        setTimeout(function () {
          _this2.$refs.mySwiper5.swiper.slideTo(num, 1000, false);
        }, 150);
      });
    }
  }
});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-4327da12","hasScoped":false,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/components/index/interactCourse.vue
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',{staticClass:"interact-course"},[_c('h5',{staticClass:"title"},[_c('img',{attrs:{"src":__webpack_require__("BgXs"),"alt":""}}),(!_vm.courseEnd)?_c('span',[_vm._v("在线人数"+_vm._s(_vm.online_num)+"人")]):_vm._e()]),_vm._v(" "),(_vm.courseEnd)?[(_vm.videoShow)?_c('div',{staticClass:"noCourse"},[_c('div',{staticClass:"img",style:({'background-image':("url('" + _vm.courseEndImg + "')")})},[_c('router-link',{staticClass:"btn",attrs:{"to":"/publicCourse","target":"_blank"}},[_c('img',{attrs:{"src":__webpack_require__("uHph"),"alt":""}})])],1),_vm._v(" "),_c('div',{staticClass:"txt"},[_c('h5',[_vm._v("直播尚未开始")]),_vm._v(" "),_c('p',[_vm._v("先看看"),_c('router-link',{attrs:{"to":"/publicCourse","target":"_blank"}},[_vm._v("精选视频")]),_vm._v("吧~")],1)])]):_c('div',{staticClass:"noCourse"},[_c('img',{staticClass:"posterImg",attrs:{"src":_vm.courseEndImg,"alt":""}})])]:[(_vm.LiveToday.length!=0)?_c('div',[_c('swiper',{ref:"mySwiper5",attrs:{"options":_vm.courseOption}},_vm._l((_vm.LiveToday),function(item){return _c('swiper-slide',{key:item.id},[_c('router-link',{attrs:{"to":"/publicCourse"}},[_c('div',{staticClass:"item item-l"},[_c('h5',[_c('span',[_vm._v("#"+_vm._s(item.classification))]),_vm._v(_vm._s(item.cate_name)+"\n                        ")]),_vm._v(" "),_c('h1',[_vm._v("\n                        "+_vm._s(item.class_name)+"\n                        ")]),_vm._v(" "),_c('h6',[_vm._v("直播时间："+_vm._s(item.set_start_time.substring(11, 16))+"-"+_vm._s(item.set_end_time.substring(11, 16)))]),_vm._v(" "),_c('div',{staticClass:"play-btn"},[(item.state==1)?_c('img',{staticClass:"img",attrs:{"src":__webpack_require__("NmNT"),"alt":""}}):(item.state==2)?_c('img',{staticClass:"img",attrs:{"src":__webpack_require__("F+0d"),"alt":""}}):_c('img',{staticClass:"img",attrs:{"src":__webpack_require__("ieIK"),"alt":""}}),_vm._v(" "),_c('p',[_c('img',{attrs:{"src":item.head_add,"alt":""}}),_vm._v("\n                        "+_vm._s(item.alias)+"\n                        ")])])]),_vm._v(" "),_c('div',{staticClass:"item item-r"},[_c('img',{attrs:{"src":item.live_head_add,"alt":""}})])])],1)})),_vm._v(" "),_c('div',{staticClass:"swiper-button-prev",attrs:{"slot":"button-prev"},slot:"button-prev"}),_vm._v(" "),_c('div',{staticClass:"swiper-button-next",attrs:{"slot":"button-next"},slot:"button-next"})],1):_c('div',{staticClass:"noCourse"},[_c('img',{staticClass:"posterImg",attrs:{"src":_vm.courseEndImg,"alt":""}})])]],2)}
var staticRenderFns = []
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ var index_interactCourse = (esExports);
// CONCATENATED MODULE: ./src/components/index/interactCourse.vue
function injectStyle (ssrContext) {
  __webpack_require__("1AME")
}
var normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  interactCourse,
  index_interactCourse,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)

/* harmony default export */ var components_index_interactCourse = (Component.exports);

// EXTERNAL MODULE: ./src/assets/images/1.0/userDefault.png
var userDefault = __webpack_require__("x+ic");
var userDefault_default = /*#__PURE__*/__webpack_require__.n(userDefault);

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/page/index.vue


//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

 //专栏
 //右边大策略
 //互动课堂

// import {swiper, swiperSlide} from "vue-awesome-swiper";
__webpack_require__("mgS3");

/* harmony default export */ var page = ({
  props: ["userInfoData"],
  data: function data() {
    return {
      tabActive: 0,

      headerOption: {
        //头部轮播图
        effect: "coverflow",
        coverflowEffect: {
          rotate: 0,
          stretch: 0,
          depth: 0,
          modifier: 1,
          slideShadows: false
        },
        autoplay: {
          delay: 5000,
          disableOnInteraction: false
        },
        // width: window.innerWidth,
        speed: 300,
        loop: true,
        fadeEffect: {
          crossFade: true
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true
        }
      },
      columnlist: "", //推荐
      viewpointList: [], //深度阅读数据
      bannerData: [], //轮播图
      tabList: [],
      subjectList: [], //专题页,
      cooList: [], //合作媒体
      subjectParams: {
        pageNo: 1,
        perPage: 6,
        isUserInfo: false,
        orderBy: "start_time  asc,id desc",
        type: 1,
        status: 1, //已发布的观点，草稿状态不显示
        isImageInfo: true,
        isCate: true,
        column_id: 14
      },
      ponitListParams: {
        pageNo: 1,
        perPage: 6,
        isUserInfo: false,
        orderBy: "column_top_status desc,publish_time desc,id desc",
        status: 1, //已发布的观点，草稿状态不显示
        isImageInfo: true,
        isCate: true,
        column_id: 4
      },
      ponitListParams1: {
        pageNo: 1,
        perPage: 6,
        orderBy: "id desc"
      },
      teacherList: [], //推荐讲师
      teacherOption: {
        //讲师推荐轮播图
        effect: "slide",
        fadeEffect: {
          crossFade: true
        },
        autoplay: {
          delay: 5000,
          disableOnInteraction: false
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true
        }
      },
      loaded: false,
      hasMore: true, //观点列表
      subjectMore: true, //潜伏机会
      isClick: false, //是否点击
      metaInfo: {
        //seo
        title: "",
        name: "",
        content: ""
      },
      name: "深度精选",
      evaluationImg: "",
      PlatformImg: "",
      windowPop: true //1.3提醒弹窗
    };
  },

  name: "async",
  metaInfo: function metaInfo() {
    return {
      title: this.metaInfo.title,
      meta: [{
        name: this.metaInfo.name, //keyWords
        content: this.metaInfo.content
      }],
      link: [{
        // set link
        rel: "lexinamc",
        href: "document.location.hostname"
      }]
    };
  },
  created: function created() {
    this.getContentSetting();
  },
  beforeRouteEnter: function beforeRouteEnter(to, from, next) {
    next(function (vm) {
      vm.getView();
      vm.getBanner();
      vm.getSubject();
      vm.getCoo();
      vm.getTab();
      vm.liveTeacherList();
      setTimeout(function () {
        vm.loaded = true;
      }, 500);
    });
  },

  methods: {
    getItem: function getItem(item) {
      var url;
      if (item.type == 12) {
        url = "/pointDetail/" + item.type_id;
      } else {
        if (item.courseType == 1) {
          url = "/specialCourseDetail/" + item.type_id;
        } else if (item.courseType == 2) {
          url = "/seriesCourseDetail/" + item.type_id;
        } else {
          url = "/trainingPrevue/" + item.type_id;
        }
      }
      return url;
    },
    evaluation: function evaluation(data) {
      this.evaluationImg = data.evaluation.qr_code;
      this.PlatformImg = data.index.qr_code;
    },
    getContentSetting: function getContentSetting() {
      var _this = this;

      //获取网站内容设置
      this.$request.get("/ContentManage/getContentSetting", "", function (res) {
        console.log(res);
        if (res.code == 200) {
          _this.metaInfo.title = res.data[0].title;
          _this.metaInfo.name = res.data[0].SEO_antistop;
          _this.metaInfo.content = res.data[0].describe;
        }
      });
    },
    liveTeacherList: function liveTeacherList() {
      var _this2 = this;

      //推荐讲师
      this.$request.get("/CourseManage/teachList", { page: 1, size: "24" }, function (res) {
        if (res.code == 200) {
          _this2.teacherList = res.data;
          _this2.teacherPageTotal = Math.ceil(res.data.length / 6);
        }
      });
    },

    /**
     * 切换
     *
     */
    tab: function tab(index, id, name) {
      if (this.tabActive != index) {
        this.tabActive = index;
        this.name = name;
        this.getViewPointList(id);
      }
    },
    getTab: function getTab() {
      var _this3 = this;

      this.$request.get("ContentManage/getWebColumns", "", function (res) {
        _this3.tabList = res.data;
        _this3.name = res.data[0].name;
        _this3.tabActive = 0;
        _this3.getViewPointList(res.data[0].id);
      });
    },

    /**
     * 合作媒体
     *
     */
    getCoo: function getCoo() {
      var _this4 = this;

      this.$request.get("ContentManage/getMediaData", { type: 1 }, function (res) {
        _this4.cooList = res.data;
      });
    },

    /**
     * 获取专题
     *
     */
    getSubject: function getSubject() {
      var _this5 = this;

      this.$request.get("/Viewpoint/getViewPointList", this.subjectParams, function (res) {
        _this5.subjectList = _this5.subjectList.concat(res.data);
        if (res.data.length < _this5.subjectParams.perPage) {
          _this5.subjectMore = false;
        }
        if (_this5.subjectParams.pageNo == 1) {
          _this5.loadMoreSu();
        }
      });
    },
    timeFn: function timeFn(time) {
      //yy-mm-dd转成m月d日
      if (time == undefined && time == null) {
        return false;
      }
      var strTime = time.substr(5, 5);
      strTime = strTime.split("-");
      for (var i = 0; i < strTime.length; i++) {
        if (strTime[i][0] == 0) {
          strTime[i] = strTime[i].replace(/0/g, "");
        }
      }
      var text = strTime[0] + "\u6708" + strTime[1] + "\u65E5";
      return text;
    },
    loadMoreSu: function loadMoreSu() {
      var _this6 = this;

      if (this.subjectMore) {
        this.subjectParams.pageNo++;
        setTimeout(function () {
          _this6.getSubject();
        }, 60);
      }
    },

    /**@augments
     * top
     *
     */
    getView: function getView() {
      var _this7 = this;

      return asyncToGenerator_default()( /*#__PURE__*/regenerator_default.a.mark(function _callee() {
        return regenerator_default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                _context.next = 2;
                return _this7.$request.get("IndexRecommend/getChoiceList", "", function (res) {
                  _this7.columnlist = res.data;
                });

              case 2:
              case "end":
                return _context.stop();
            }
          }
        }, _callee, _this7);
      }))();
    },

    /**@augments
     * banner
     *
     */
    getBanner: function getBanner() {
      var _this8 = this;

      return asyncToGenerator_default()( /*#__PURE__*/regenerator_default.a.mark(function _callee2() {
        return regenerator_default.a.wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                _context2.next = 2;
                return _this8.$request.get("Home/getHomeBanner", "", function (res) {
                  _this8.bannerData = res.data;
                });

              case 2:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2, _this8);
      }))();
    },
    getViewPointList: function getViewPointList(id) {
      var _this9 = this;

      //观点列表
      this.ponitListParams.pageNo = 1;
      this.ponitListParams.column_id = id;
      if (this.name == "深度精选") {
        this.ponitListParams1.pageNo = 1;
        this.$request.get("Viewpoint/getDeepChoiceViewpoint", this.ponitListParams1, function (res) {
          _this9.viewpointList = [];
          _this9.viewpointList = _this9.viewpointList.concat(res.data);
          _this9.hasMore = true;
          console.log(_this9.viewpointList.length);
          _this9.isClick = false;
          if (res.data.length < _this9.ponitListParams.perPage) {
            _this9.hasMore = false;
          }
        });
      } else {
        this.$request.get("/Viewpoint/getViewPointList", this.ponitListParams, function (res) {
          _this9.viewpointList = [];
          _this9.viewpointList = _this9.viewpointList.concat(res.data);
          _this9.hasMore = true;
          _this9.isClick = false;
          if (res.data.length < _this9.ponitListParams.perPage) {
            _this9.hasMore = false;
          }
        });
      }
    },
    loadMore: function loadMore() {
      var _this10 = this;

      if (this.hasMore) {
        this.isClick = true;

        setTimeout(function () {
          if (_this10.name == "深度精选") {
            _this10.ponitListParams1.pageNo++;
            _this10.$request.get("Viewpoint/getDeepChoiceViewpoint", _this10.ponitListParams1, function (res) {
              _this10.viewpointList = _this10.viewpointList.concat(res.data);
              _this10.isClick = false;
              if (res.data.length < _this10.ponitListParams1.perPage) {
                _this10.hasMore = false;
              }
            });
          } else {
            _this10.ponitListParams.pageNo++;
            _this10.$request.get("/Viewpoint/getViewPointList", _this10.ponitListParams, function (res) {
              _this10.viewpointList = _this10.viewpointList.concat(res.data);
              _this10.isClick = false;
              if (res.data.length < _this10.ponitListParams.perPage) {
                _this10.hasMore = false;
              }
            });
          }
        }, 100);
      }
    }
  },
  components: {
    viewlist: list["a" /* default */],
    aside1: aside1["a" /* default */],
    defaultAvatar: userDefault_default.a,
    interactCourse: components_index_interactCourse
  }
});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-2df8b524","hasScoped":false,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/page/index.vue
var page_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('main',{staticClass:"index"},[(_vm.loaded)?[_c('section',{staticClass:"center-box"},[_c('div',{staticClass:"main-box"},[_c('section',{staticClass:"left-box"},[_c('swiper',{staticClass:"top-banner",attrs:{"options":_vm.headerOption}},[_vm._l((_vm.bannerData),function(item){return [_c('swiper-slide',[_c('a',{attrs:{"href":("" + (item.adURL)),"target":"_blank"}},[_c('img',{attrs:{"src":item.adFile,"alt":""}})])])]}),_vm._v(" "),_c('div',{staticClass:"swiper-pagination",attrs:{"slot":"pagination"},slot:"pagination"})],2),_vm._v(" "),_c('div',{staticClass:"top-item"},[_vm._l((_vm.columnlist.slice(0,3)),function(item){return [_c('router-link',{style:({'background-image':("url('" + (item.coverPic) + "')")}),attrs:{"to":_vm.getItem(item),"id":"jingxuan"}},[_c('p',[_vm._v(_vm._s(item.title))])])]})],2),_vm._v(" "),_c('interactCourse'),_vm._v(" "),_c('nav',[_vm._l((_vm.tabList),function(item,index){return [_c('a',{class:{'active':index == _vm.tabActive },attrs:{"href":"javascript:;"},on:{"click":function($event){_vm.tab(index,item.id,item.name)}}},[_vm._v("\n                          "+_vm._s(item.name)+"\n                        ")])]})],2),_vm._v(" "),_c('div',[_c('div',[_vm._l((_vm.viewpointList),function(item){return [_c('viewlist',{attrs:{"pointlist":item}})]})],2),_vm._v(" "),_c('div',{directives:[{name:"show",rawName:"v-show",value:(_vm.hasMore),expression:"hasMore"}],staticClass:"loadmore",class:{active:_vm.isClick},on:{"click":_vm.loadMore}},[_c('span'),_vm._v("加载更多")])])],1),_vm._v(" "),_c('section',{staticClass:"right-box"},[_c('aside1',{on:{"evaluation":_vm.evaluation}}),_vm._v(" "),_c('section',{staticClass:"teacher-list"},[_vm._m(0),_vm._v(" "),_c('swiper',{staticClass:"teacher-swiper",attrs:{"options":_vm.teacherOption}},[_vm._l((_vm.teacherPageTotal),function(i){return [_c('swiper-slide',[_c('ul',{staticClass:"list clearfix"},_vm._l((_vm.teacherList),function(item,index){return _c('li',{directives:[{name:"show",rawName:"v-show",value:((index > 6*i-7 && index < 6*i)),expression:"(index > 6*i-7 && index < 6*i)"}]},[_c('router-link',{attrs:{"target":"_blank","to":("/teacherIntroduction/" + (item.user_id))}},[_c('img',{attrs:{"src":item.head_add?item.head_add:_vm.defaultAvatar,"alt":""}}),_vm._v(" "),_c('p',[_vm._v(_vm._s(item.alias))])])],1)}))])]}),_vm._v(" "),_c('div',{staticClass:"swiper-pagination",attrs:{"slot":"pagination"},slot:"pagination"})],2)],1),_vm._v(" "),_c('div',{staticClass:"aside2"},[_c('h5',[_vm._v("潜伏机会")]),_vm._v(" "),_c('ul',{staticClass:"clearfix"},_vm._l((_vm.subjectList),function(item){return _c('li',[_c('router-link',{attrs:{"to":'/pointDetail/'+ item.id}},[_c('h6',[_vm._v(_vm._s(item.title))]),_vm._v(" "),_c('div',[_c('span',[_vm._v(_vm._s(_vm.timeFn(item.start_time)))]),_vm._v(" "),_c('p',[_vm._v(_vm._s(item.lead))])])])],1)})),_vm._v(" "),_c('div',{directives:[{name:"show",rawName:"v-show",value:(_vm.subjectMore),expression:"subjectMore"}],staticClass:"loadmore",on:{"click":_vm.loadMoreSu}})])],1)])]),_vm._v(" "),_c('div',{staticClass:"footer-item"},[_c('div',[_c('h5',[_vm._v("平台特色")]),_vm._v(" "),_c('img',{attrs:{"src":_vm.PlatformImg,"alt":""}})])]),_vm._v(" "),(_vm.evaluationImg != null && _vm.evaluationImg != '')?_c('div',{staticClass:"footer-item student-comment"},[_c('div',[_c('h5',[_vm._v("学员评价")]),_vm._v(" "),_c('img',{attrs:{"src":_vm.evaluationImg,"alt":""}})])]):_vm._e(),_vm._v(" "),_c('div',{staticClass:"footer-media"},[_c('div',[_c('h5',[_vm._v("合作媒体")]),_vm._v(" "),_c('ul',{staticClass:"clearfix"},_vm._l((_vm.cooList),function(item){return _c('li',[_c('img',{attrs:{"src":item.path_url,"alt":""}})])}))])]),_vm._v(" "),(_vm.windowPop)?_c('div',{staticClass:"pop-window"},[_c('div',[_c('img',{attrs:{"src":__webpack_require__("/+QB"),"alt":""}}),_vm._v(" "),_c('p',{staticClass:"p1"},[_vm._v(" 本网站仅提供财经资讯、证券知识培训与教育的相关信息，不提供任何直接或间接的证券投资咨询或顾问服务。")]),_vm._v(" "),_c('p',[_vm._v("本网站提及、出现的相关证券知识培训讲师及其他员工，不提供任何涉及证券个股及其相关产品的投资分析、预测或操作建议；不辅助或促使他人作出任何具体投资决策；不开展任何形式的荐股活动、不代客理财、不实施任何承诺收益和收益分成的安排、不从事任何形式的证券投资咨询/顾问服务或证券经营业务。")]),_vm._v(" "),_c('span',{on:{"click":function($event){_vm.windowPop = false}}},[_vm._v("我知道了")])])]):_vm._e()]:_vm._e()],2)}
var page_staticRenderFns = [function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',{staticClass:"title"},[_c('p',[_vm._v("推荐讲师")])])}]
var page_esExports = { render: page_render, staticRenderFns: page_staticRenderFns }
/* harmony default export */ var selectortype_template_index_0_src_page = (page_esExports);
// CONCATENATED MODULE: ./src/page/index.vue
function page_injectStyle (ssrContext) {
  __webpack_require__("O2Um")
}
var page_normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var page___vue_template_functional__ = false
/* styles */
var page___vue_styles__ = page_injectStyle
/* scopeId */
var page___vue_scopeId__ = null
/* moduleIdentifier (server only) */
var page___vue_module_identifier__ = null
var page_Component = page_normalizeComponent(
  page,
  selectortype_template_index_0_src_page,
  page___vue_template_functional__,
  page___vue_styles__,
  page___vue_scopeId__,
  page___vue_module_identifier__
)

/* harmony default export */ var src_page = __webpack_exports__["default"] = (page_Component.exports);


/***/ }),

/***/ "8CXv":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });

// EXTERNAL MODULE: ./src/components/pointList/lock-popup.vue + 8 modules
var lock_popup = __webpack_require__("C5wJ");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/components/college/course-apply.vue
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ var course_apply = ({
  props: ['courseData'],
  data: function data() {
    return {
      showPopup: false,
      courseId: this.$route.params.courseId //课程id
    };
  },
  created: function created() {
    console.log(this.courseId);
  },

  methods: {
    getLogin: function getLogin() {
      var _this = this;

      this.checkWechatLoginIn(function (res) {
        if (res.code == -5002) {
          //未登录
          window.location.href = res.data.url;
        } else if (res.code == 200) {
          //已登录
          _this.showPopupFn();
          _this.setCookie('isRegister', res.data.isRegister);
        }
      });
    },
    timePast: function timePast(endTime) {
      //判断是否已到开课时间
      var now = new Date();
      var time = new Date(endTime.split('-').join('/'));
      if (time < now) {
        return true; //已到开课时间
      } else {
        return false; //未到开课时间
      }
    },
    showPopupFn: function showPopupFn() {
      this.showPopup = true;
      document.getElementsByTagName('body')[0].style.overflow = 'hidden';
    },
    closePopupFn: function closePopupFn() {
      this.showPopup = false;
      document.getElementsByTagName('body')[0].style.overflow = 'auto';
    }
  },
  components: {
    lockPopup: lock_popup["a" /* default */]
  }
});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-0a95cd5a","hasScoped":false,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/components/college/course-apply.vue
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('main',{staticClass:"course-apply"},[_c('section',{staticClass:"apply clearfix"},[_c('img',{staticClass:"cover",attrs:{"src":_vm.courseData.src_pc_img,"alt":""}}),_vm._v(" "),_c('section',{staticClass:"main"},[_c('h1',[_vm._v(_vm._s(_vm.courseData.class_name))]),_vm._v(" "),_c('p',[_vm._v("报名人数："+_vm._s(_vm.courseData.enroll_num)+"人")]),_vm._v(" "),_c('p',[_vm._v("截止："+_vm._s(_vm.courseData.end_enroll_time))]),_vm._v(" "),_c('p',[_vm._v("开课："+_vm._s(_vm.courseData.begin_time)+" 至 "+_vm._s(_vm.courseData.end_time))]),_vm._v(" "),_c('section',{staticClass:"apply-option"},[(_vm.courseData.level == 0)?_c('p',{staticStyle:{"padding-right":"16px"}},[_vm._v("免费课程")]):_vm._e(),_vm._v(" "),(_vm.courseData.level == 2)?_c('p',[_vm._v(_vm._s(_vm.courseData.price))]):_vm._e(),_vm._v(" "),(_vm.courseData.level == 2)?_c('del',[_vm._v("原价"+_vm._s(_vm.courseData.origin_price))]):_vm._e(),_vm._v(" "),(_vm.courseData.userBuyStatus==0&&_vm.courseData.join_course==0&&_vm.courseData.enroll_end_state==0)?_c('div',{staticClass:"btn default",on:{"click":function($event){_vm.getLogin()}}},[_vm._v("立即报名")]):_vm._e(),_vm._v(" "),(_vm.courseData.join_course==0&&_vm.courseData.enroll_end_state == 1)?_c('div',{staticClass:"btn"},[_vm._v("报名已截止")]):_vm._e(),_vm._v(" "),(_vm.courseData.userBuyStatus==1&&_vm.timePast(_vm.courseData.begin_time_full))?_c('div',{staticClass:"btn default",on:{"click":function($event){_vm.getLogin()}}},[_vm._v("课程已开启，点击进入>>")]):_vm._e(),_vm._v(" "),(_vm.courseData.userBuyStatus==1&&!_vm.timePast(_vm.courseData.begin_time_full))?_c('div',{staticClass:"btn"},[_vm._v("您已报名(请留意上课时间)")]):_vm._e()])])]),_vm._v(" "),(_vm.showPopup)?[_c('lock-popup',{attrs:{"type":3,"id":_vm.courseId},on:{"closePopup":_vm.closePopupFn}})]:_vm._e()],2)}
var staticRenderFns = []
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ var college_course_apply = (esExports);
// CONCATENATED MODULE: ./src/components/college/course-apply.vue
function injectStyle (ssrContext) {
  __webpack_require__("7HZ7")
}
var normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  course_apply,
  college_course_apply,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)

/* harmony default export */ var components_college_course_apply = (Component.exports);

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/page/college/trainingPrevue.vue
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//



/* harmony default export */ var trainingPrevue = ({
  data: function data() {
    return {
      courseDetail: '',
      prevueContent: '',
      userId: '',
      metaInfo: { //seo
        title: '',
        name: '',
        content: ''
      },
      noExist: false //true:课程不存在  false:课程存在
    };
  },

  name: 'async',
  metaInfo: function metaInfo() {
    return {
      title: this.metaInfo.title,
      meta: [{
        name: this.metaInfo.name, //keyWords
        content: this.metaInfo.content
      }],
      link: [{ // set link
        rel: 'lexinamc',
        href: 'document.location.hostname'
      }]
    };
  },
  created: function created() {
    this.getLogin();
    this.getContentSetting();
  },

  methods: {
    getContentSetting: function getContentSetting() {
      var _this = this;

      //获取网站内容设置
      this.$request.get('/ContentManage/getContentSetting', '', function (res) {
        console.log(res);
        if (res.code == 200) {
          _this.metaInfo.title = res.data[0].title + '-特训班预告';
          _this.metaInfo.name = res.data[0].SEO_antistop;
          _this.metaInfo.content = res.data[0].describe;
        }
      });
    },
    getLogin: function getLogin() {
      var _this2 = this;

      this.checkWechatLoginIn(function (res) {
        if (res.code == -5002) {
          //未登录
          _this2.userId = 2; //游客Id
        } else if (res.code == 200) {
          //已登录
          _this2.userId = res.data.userId;
        }
        _this2.getDetail();
      });
    },
    getDetail: function getDetail() {
      var _this3 = this;

      this.$request.post('/Course/details', { user_id: this.userId, id: this.$route.params.courseId }, function (res) {
        if (res.code == 0) {
          _this3.courseDetail = res.data;
          _this3.prevueContent = res.data.preview;
          _this3.noExist = false;
        } else if (res.code == -16006) {
          _this3.noExist = true;
        }
      });
    }
  },
  components: {
    courseApply: components_college_course_apply
  }
});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-7417d9bc","hasScoped":false,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/page/college/trainingPrevue.vue
var trainingPrevue_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('main',{staticClass:"training-prevue"},[_vm._m(0),_vm._v(" "),(!_vm.noExist)?_c('section',[_c('course-apply',{attrs:{"courseData":_vm.courseDetail}})],1):_vm._e(),_vm._v(" "),(!_vm.noExist)?_c('section',{staticClass:"content",domProps:{"innerHTML":_vm._s(_vm.prevueContent)}}):_vm._e(),_vm._v(" "),(_vm.noExist)?_c('div',{staticClass:"nosearch"},[_c('img',{attrs:{"src":__webpack_require__("Hp0k"),"alt":""}}),_vm._v(" "),_c('p',[_vm._v("课程不存在！")])]):_vm._e()])}
var trainingPrevue_staticRenderFns = [function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('header',{staticClass:"header"},[_c('p',[_vm._v("首页 > 99学院 > 特训课 > 课程详情")])])}]
var trainingPrevue_esExports = { render: trainingPrevue_render, staticRenderFns: trainingPrevue_staticRenderFns }
/* harmony default export */ var college_trainingPrevue = (trainingPrevue_esExports);
// CONCATENATED MODULE: ./src/page/college/trainingPrevue.vue
function trainingPrevue_injectStyle (ssrContext) {
  __webpack_require__("1mmi")
}
var trainingPrevue_normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var trainingPrevue___vue_template_functional__ = false
/* styles */
var trainingPrevue___vue_styles__ = trainingPrevue_injectStyle
/* scopeId */
var trainingPrevue___vue_scopeId__ = null
/* moduleIdentifier (server only) */
var trainingPrevue___vue_module_identifier__ = null
var trainingPrevue_Component = trainingPrevue_normalizeComponent(
  trainingPrevue,
  college_trainingPrevue,
  trainingPrevue___vue_template_functional__,
  trainingPrevue___vue_styles__,
  trainingPrevue___vue_scopeId__,
  trainingPrevue___vue_module_identifier__
)

/* harmony default export */ var page_college_trainingPrevue = __webpack_exports__["default"] = (trainingPrevue_Component.exports);


/***/ }),

/***/ "8f+x":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "AH1q":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "AQ5S":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";

// EXTERNAL MODULE: ./node_modules/vue-video-player/dist/vue-video-player.js
var vue_video_player = __webpack_require__("iqGf");
var vue_video_player_default = /*#__PURE__*/__webpack_require__.n(vue_video_player);

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/components/common/video.vue
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


__webpack_require__("g3Gj");
__webpack_require__("5LIk");
/* harmony default export */ var video = ({
  props: ["playerOptions"],
  data: function data() {
    return {
      //     playerOptions: {
      //       muted: false,
      //       sources: {
      //           type: '',
      //           src: '',
      //                type: "video/mp4",
      //            src: "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4",
      //           withCredentials: false
      //       },
      //       poster: "../images/videoBg.png",
      //       language: 'zh-CN',
      //       live: true,
      //       autoplay: false,
      //       width: '100%',
      //       height: 230
      //   },
    };
  },

  computed: {
    player: function player() {
      return this.$refs.videoPlayer.player;
    }
  },
  methods: {
    // listen event
    onPlayerPlay: function onPlayerPlay(player) {

      console.log("player play!", player);
    },
    onPlayerPause: function onPlayerPause(player) {
      console.log("player pause!", player);
    },
    onPlayerEnded: function onPlayerEnded(player) {
      console.log("player ended!", player);
    },
    onPlayerLoadeddata: function onPlayerLoadeddata(player) {
      console.log("player Loadeddata!", player);
    },
    onPlayerWaiting: function onPlayerWaiting(player) {
      console.log("player Waiting!", player);
    },
    onPlayerPlaying: function onPlayerPlaying(player) {
      console.log("player Playing!", player);
    },
    onPlayerTimeupdate: function onPlayerTimeupdate(player) {
      console.log("player Timeupdate!", player.currentTime());
    },
    onPlayerCanplay: function onPlayerCanplay(player) {
      console.log("player Canplay!", player);
    },
    onPlayerCanplaythrough: function onPlayerCanplaythrough(player) {
      console.log("player Canplaythrough!", player);
    },

    // or listen state event
    playerStateChanged: function playerStateChanged(playerCurrentState) {
      console.log("player current update state", playerCurrentState);
      // alert(playerCurrentState)
    },

    // player is ready
    playerReadied: function playerReadied(player) {
      // seek to 10s
      alert(player);
      player.currentTime(10);
      // console.log('example 01: the player is readied', player)
      console.log("the player is readied", player);
      // you can use it to do something...
    }
  }
});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-20e1a3b1","hasScoped":false,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/components/common/video.vue
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',{staticClass:"video"},[_c('div',{staticClass:"videoDom"},[_c('video-player',{ref:"videoPlayer",staticClass:"vjs-custom-skin",attrs:{"options":_vm.playerOptions,"playsinline":true},on:{"play":function($event){_vm.onPlayerPlay($event)},"pause":function($event){_vm.onPlayerPause($event)},"statechanged":function($event){_vm.playerStateChanged($event)}}})],1)])}
var staticRenderFns = []
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ var common_video = (esExports);
// CONCATENATED MODULE: ./src/components/common/video.vue
function injectStyle (ssrContext) {
  __webpack_require__("TzpM")
}
var normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  video,
  common_video,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)

/* harmony default export */ var components_common_video = __webpack_exports__["a"] = (Component.exports);


/***/ }),

/***/ "Anhg":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "BgXs":
/***/ (function(module, exports) {

module.exports = "data:image/png;base64,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"

/***/ }),

/***/ "C5wJ":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";

// EXTERNAL MODULE: ./node_modules/babel-runtime/regenerator/index.js
var regenerator = __webpack_require__("Xxa5");
var regenerator_default = /*#__PURE__*/__webpack_require__.n(regenerator);

// EXTERNAL MODULE: ./node_modules/babel-runtime/helpers/asyncToGenerator.js
var asyncToGenerator = __webpack_require__("exGp");
var asyncToGenerator_default = /*#__PURE__*/__webpack_require__.n(asyncToGenerator);

// CONCATENATED MODULE: ./node_modules/vue-qr/src/util.js
function toBoolean(val) {
  if (val === '') return val
  return val === 'true' || val == '1'
}

// EXTERNAL MODULE: ./node_modules/vue-qr/src/awesome-qr.js
var awesome_qr = __webpack_require__("SXdm");
var awesome_qr_default = /*#__PURE__*/__webpack_require__.n(awesome_qr);

// CONCATENATED MODULE: ./node_modules/vue-qr/src/imgLoaded.js
function imgLoaded(url) {
  return new Promise(function(resolve, reject) {
    if (url.slice(0, 4) == 'data') {
      var img = new Image()
      img.onload = function() {
        resolve(img)
      }
      img.onerror = function() {
        reject('Image load error')
      }
      img.src = url
      return
    }
    var xhr = new XMLHttpRequest()
    xhr.onload = function() {
      var newUrl = URL.createObjectURL(this.response)
      var img = new Image()
      img.onload = function() {
        resolve(img)
        URL.revokeObjectURL(newUrl)
      }
      img.onerror = function() {
        reject('Image load error')
      }
      img.src = newUrl
    }
    xhr.open('GET', url, true)
    xhr.responseType = 'blob'
    xhr.send()
  })
}
/* harmony default export */ var src_imgLoaded = (imgLoaded);

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-qr/src/vue-qr.js


var uuidv4 = __webpack_require__("DtRx");



/* harmony default export */ var vue_qr = ({
  props: {
    text: {
      type: String,
      required: true
    },
    qid: {
      type: String
    },
    size: {
      type: Number,
      default: 200
    },
    margin: {
      type: Number,
      default: 20
    },
    colorDark: {
      type: String,
      default: '#000000'
    },
    colorLight: {
      type: String,
      default: '#FFFFFF'
    },
    bgSrc: {
      type: String,
      default: undefined
    },
    backgroundDimming: {
      type: String,
      default: 'rgba(0,0,0,0)'
    },
    logoSrc: {
      type: String,
      default: undefined
    },
    logoScale: {
      type: Number,
      default: 0.2
    },
    logoMargin: {
      type: Number,
      default: 0
    },
    logoCornerRadius: {
      type: Number,
      default: 8
    },
    whiteMargin: {
      type: [Boolean, String],
      default: true
    },
    dotScale: {
      type: Number,
      default: 1
    },
    autoColor: {
      type: [Boolean, String],
      default: true
    },
    binarize: {
      type: [Boolean, String],
      default: false
    },
    binarizeThreshold: {
      type: Number,
      default: 128
    },
    callback: {
      type: Function,
      default: function _default() {
        return undefined;
      }
    },
    bindElement: {
      type: Boolean,
      default: true
    }
  },
  name: 'vue-qr',
  data: function data() {
    return {
      uuid: ''
    };
  },

  watch: {
    $props: {
      deep: true,
      handler: function handler() {
        this.main();
      }
    }
  },
  mounted: function mounted() {
    this.uuid = uuidv4();
    this.main();
  },

  methods: {
    main: function main() {
      var _this = this;

      return asyncToGenerator_default()( /*#__PURE__*/regenerator_default.a.mark(function _callee() {
        var that, bgImg, logoImg, img, _img;

        return regenerator_default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                that = _this;

                if (!(_this.bgSrc && _this.logoSrc)) {
                  _context.next = 10;
                  break;
                }

                _context.next = 4;
                return src_imgLoaded(_this.bgSrc);

              case 4:
                bgImg = _context.sent;
                _context.next = 7;
                return src_imgLoaded(_this.logoSrc);

              case 7:
                logoImg = _context.sent;

                _this.render(bgImg, logoImg);
                return _context.abrupt('return');

              case 10:
                if (!_this.bgSrc) {
                  _context.next = 16;
                  break;
                }

                _context.next = 13;
                return src_imgLoaded(_this.bgSrc);

              case 13:
                img = _context.sent;

                _this.render(img);
                return _context.abrupt('return');

              case 16:
                if (!_this.logoSrc) {
                  _context.next = 22;
                  break;
                }

                _context.next = 19;
                return src_imgLoaded(_this.logoSrc);

              case 19:
                _img = _context.sent;

                _this.render(undefined, _img);
                return _context.abrupt('return');

              case 22:

                setTimeout(function () {
                  that.render();
                }, 0);

              case 23:
              case 'end':
                return _context.stop();
            }
          }
        }, _callee, _this);
      }))();
    },
    render: function render(img, logoImg) {
      var that = this;
      new awesome_qr_default.a().create({
        text: that.text,
        size: that.size,
        margin: that.margin,
        colorDark: that.colorDark,
        colorLight: that.colorLight,
        backgroundImage: img,
        backgroundDimming: that.backgroundDimming,
        logoImage: logoImg,
        logoScale: that.logoScale,
        logoMargin: that.logoMargin,
        logoCornerRadius: that.logoCornerRadius,
        whiteMargin: toBoolean(that.whiteMargin),
        dotScale: that.dotScale,
        autoColor: toBoolean(that.autoColor),
        binarize: toBoolean(that.binarize),
        binarizeThreshold: that.binarizeThreshold,
        callback: function callback(dataURI) {
          that.callback && that.callback(dataURI, that.qid);
        },
        bindElement: that.bindElement ? that.uuid : undefined
      });
    }
  }
});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-6b291680","hasScoped":false,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./node_modules/vue-qr/src/vue-qr.vue
var vue_qr_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return (_vm.bindElement)?_c('div',[_c('img',_vm._b({},'img',{id:_vm.uuid},false))]):_vm._e()}
var staticRenderFns = []
var esExports = { render: vue_qr_render, staticRenderFns: staticRenderFns }
/* harmony default export */ var src_vue_qr = (esExports);
// CONCATENATED MODULE: ./node_modules/vue-qr/src/vue-qr.vue
var normalizeComponent = __webpack_require__("VU/8")
/* script */

/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  vue_qr,
  src_vue_qr,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)

/* harmony default export */ var vue_qr_src_vue_qr = (Component.exports);

// CONCATENATED MODULE: ./node_modules/vue-qr/src/main.js

/* harmony default export */ var src_main = (vue_qr_src_vue_qr);
// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/components/pointList/lock-popup.vue
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ var lock_popup = ({
  //type  0不生成二维码  1 课程  2观点详情
  props: ['type', 'id'],
  data: function data() {
    return {
      selected: 1,
      appCode: '', //app二维码
      wxCode: '', //公众号二维码
      qrLink: '', //link
      httpT: 'csgw.99cj.com.cn', //跳转域名
      isRegister: false //是否关注微信号
    };
  },
  created: function created() {
    console.log(this.type);
    console.log(this.id);
    console.log(document.domain);
    this.isRegister = this.getCookie('isRegister');
    console.log(this.isRegister);
    if (this.isRegister == 'true') {
      //已关注
      if (document.domain != this.httpT) {
        //正式
        this.httpT = 'wechat.99cj.com.cn';
      } else {
        this.httpT = 'test.talk.99cj.com.cn';
      }

      if (this.type == 1) {
        //type  [0不生成二维码  1 课程  2观点详情 3 特训班]
        this.qrLink = 'http://' + this.httpT + '/#/personalCenter/course/' + this.id;
      } else if (this.type == 3) {
        //特训班
        this.qrLink = 'http://' + this.httpT + '/#/specialTrainAdvance/' + this.id;
      } else if (this.type == 2) {
        //观点
        this.qrLink = 'http://' + this.httpT + '/#/column/detail/' + this.id;
        console.log(this.qrLink);
      } else {
        this.isRegister = 'false';
      }
    } else {
      //未关注
      console.log('未关注');
      if (this.type == 1 || this.type == 3) {
        this.CreateQrCode(1);
      } else if (this.type == 2) {
        this.CreateQrCode(8);
      } else {
        this.isRegister = 'false';
        this.getQRCode();
      }
    }
    this.getQRCode();
  },

  methods: {
    selectedFn: function selectedFn(i) {
      this.selected = i;
    },
    getQRCode: function getQRCode() {
      var _this = this;

      this.$request.get('/ContentManage/getQRCode', '', function (res) {
        _this.appCode = res.data.mobile.qr_code;
        _this.wxCode = res.data.weixin.qr_code;
      });
      /*this.$request.get('/Home/getQrcode', '', res => {
        if (res.code == 200) {
          this.appCode = res.data.appdownload_qrcode;
          this.wxCode =res.data.focus_qrcode;
        }
      })*/
    },
    CreateQrCode: function CreateQrCode(type) {
      var _this2 = this;

      this.$request.get('/CreateQrCode/index', {
        class_id: this.id,
        type: type
      }, function (res) {
        console.log(res);
        if (res.code == 200) {
          _this2.wxCode = res.data.qrcode;
        }
      });
    },
    close: function close() {
      this.$emit('closePopup', false);
    }
  },
  components: {
    VueQr: src_main
  }
});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-266d1ea8","hasScoped":true,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/components/pointList/lock-popup.vue
var lock_popup_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('main',{staticClass:"lock-popup"},[_c('div',{staticClass:"mask"}),_vm._v(" "),_c('div',{staticClass:"popup-wrap"},[_c('section',{staticClass:"popup"},[_c('div',{staticClass:"title"},[_vm._v("解锁对应栏目 "),_c('span',{staticClass:"close",on:{"click":_vm.close}})]),_vm._v(" "),_c('section',{staticClass:"buttons"},[_c('div',{staticClass:"btn",class:{'active':_vm.selected == 1},on:{"click":function($event){_vm.selectedFn(1)}}},[_c('span'),_vm._v("关注公众号")]),_vm._v(" "),_c('div',{staticClass:"btn",class:{'active':_vm.selected == 2},on:{"click":function($event){_vm.selectedFn(2)}}},[_c('span'),_vm._v("下载客户端")])]),_vm._v(" "),_c('section',{staticClass:"ewcode"},[(_vm.selected == 1)?[(_vm.isRegister=='true')?[_c('vue-qr',{staticClass:"codeQr",attrs:{"text":_vm.qrLink}})]:[_c('img',{attrs:{"src":_vm.wxCode,"alt":""}})],_vm._v(" "),_c('p',[_vm._v("(扫码关注“大策略公众号”进行解锁)")])]:[_c('img',{attrs:{"src":_vm.appCode,"alt":""}}),_vm._v(" "),_c('p',[_vm._v("(扫码下载“大策略app”进行解锁)")])]],2)])])])}
var lock_popup_staticRenderFns = []
var lock_popup_esExports = { render: lock_popup_render, staticRenderFns: lock_popup_staticRenderFns }
/* harmony default export */ var pointList_lock_popup = (lock_popup_esExports);
// CONCATENATED MODULE: ./src/components/pointList/lock-popup.vue
function injectStyle (ssrContext) {
  __webpack_require__("23Wm")
}
var lock_popup_normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var lock_popup___vue_template_functional__ = false
/* styles */
var lock_popup___vue_styles__ = injectStyle
/* scopeId */
var lock_popup___vue_scopeId__ = "data-v-266d1ea8"
/* moduleIdentifier (server only) */
var lock_popup___vue_module_identifier__ = null
var lock_popup_Component = lock_popup_normalizeComponent(
  lock_popup,
  pointList_lock_popup,
  lock_popup___vue_template_functional__,
  lock_popup___vue_styles__,
  lock_popup___vue_scopeId__,
  lock_popup___vue_module_identifier__
)

/* harmony default export */ var components_pointList_lock_popup = __webpack_exports__["a"] = (lock_popup_Component.exports);


/***/ }),

/***/ "DtRx":
/***/ (function(module, exports, __webpack_require__) {

var rng = __webpack_require__("i4uy");
var bytesToUuid = __webpack_require__("MAlW");

function v4(options, buf, offset) {
  var i = buf && offset || 0;

  if (typeof(options) == 'string') {
    buf = options === 'binary' ? new Array(16) : null;
    options = null;
  }
  options = options || {};

  var rnds = options.random || (options.rng || rng)();

  // Per 4.4, set bits for version and `clock_seq_hi_and_reserved`
  rnds[6] = (rnds[6] & 0x0f) | 0x40;
  rnds[8] = (rnds[8] & 0x3f) | 0x80;

  // Copy bytes to buffer, if provided
  if (buf) {
    for (var ii = 0; ii < 16; ++ii) {
      buf[i + ii] = rnds[ii];
    }
  }

  return buf || bytesToUuid(rnds);
}

module.exports = v4;


/***/ }),

/***/ "EP/e":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "Edi9":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "EqkN":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "F+0d":
/***/ (function(module, exports) {

module.exports = "data:image/png;base64,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"

/***/ }),

/***/ "FrpG":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "GbI1":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });

// EXTERNAL MODULE: ./src/components/column/list.vue + 2 modules
var list = __webpack_require__("mipW");

// EXTERNAL MODULE: ./src/components/index/aside1.vue + 2 modules
var aside1 = __webpack_require__("2Mih");

// EXTERNAL MODULE: ./src/components/college/course.vue + 2 modules
var course = __webpack_require__("T3yJ");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/page/searchPage.vue
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

 //专栏
 //右边大策略
 //右边大策略

// import {swiper, swiperSlide} from "vue-awesome-swiper";
__webpack_require__("mgS3");

/* harmony default export */ var searchPage = ({
  data: function data() {
    return {
      tabActive: 1,
      searchData: " ", //搜索关键词
      viewpointList: [], //观点
      courseList: [],
      teacherList: [],
      loaded: false,
      viewMore: true, //观点列表
      courseMore: true, //观点列表
      teacherMore: true, //观点列表
      viewisClick: false, //是否点击
      courseisClick: false, //是否点击
      teacherisClick: false, //是否点击
      viewPage: 1,
      coursePage: 1,
      teacherPage: 1,
      metaInfo: {
        //seo
        title: "",
        name: "",
        content: ""
      }
    };
  },

  name: "async",
  metaInfo: function metaInfo() {
    return {
      title: this.metaInfo.title,
      meta: [{
        name: this.metaInfo.name, //keyWords
        content: this.metaInfo.content
      }],
      link: [{
        // set link
        rel: "lexinamc",
        href: "document.location.hostname"
      }]
    };
  },
  created: function created() {
    this.getContentSetting();
  },
  beforeRouteEnter: function beforeRouteEnter(to, from, next) {
    next(function (vm) {
      if (sessionStorage.getItem("searchItem")) {
        vm.searchData = sessionStorage.getItem("searchItem");
        vm.getTab();
        sessionStorage.removeItem("searchItem");
      }

      setTimeout(function () {
        vm.loaded = true;
      }, 500);
    });
  },

  methods: {
    getContentSetting: function getContentSetting() {
      var _this = this;

      //获取网站内容设置
      this.$request.get("/ContentManage/getContentSetting", "", function (res) {
        console.log(res);
        if (res.code == 200) {
          _this.metaInfo.title = res.data[0].title + '-搜索';
          _this.metaInfo.name = res.data[0].SEO_antistop;
          _this.metaInfo.content = res.data[0].describe;
        }
      });
    },

    /**
     * 切换
     *
     */
    tab: function tab(index) {
      if (this.tabActive != index) {
        this.tabActive = index;
        // this.getViewPointList(id);
      }
    },
    getTab: function getTab() {
      if (this.searchData.trim() == "") {
        alert("请输入关键词");
        return false;
      }
      this.tabActive = 1;
      this.getViewPointList(this.searchData);
      this.getCourseList(this.searchData);
      this.getTeacherList(this.searchData);
    },
    timeFn: function timeFn(time) {
      //yy-mm-dd转成m月d日
      if (time == undefined && time == null) {
        return false;
      }
      var strTime = time.substr(5, 5);
      strTime = strTime.split("-");
      for (var i = 0; i < strTime.length; i++) {
        if (strTime[i][0] == 0) {
          strTime[i] = strTime[i].replace(/0/g, "");
        }
      }
      var text = strTime[0] + "\u6708" + strTime[1] + "\u65E5";
      return text;
    },


    /**@augments
     * 观点
     *
     */
    getViewPointList: function getViewPointList(search) {
      var _this2 = this;

      this.viewPage = 1;
      this.$request.get("/Search/Article", { search: search, size: 10, page: this.viewPage }, function (res) {
        _this2.viewpointList = [];
        _this2.viewpointList = res.data;
        _this2.viewMore = true;
        _this2.viewisClick = false;
        if (res.data.length < 10) {
          _this2.viewMore = false;
        }
      });
    },
    viewMoreFn: function viewMoreFn() {
      var _this3 = this;

      if (this.viewMore) {
        this.viewisClick = true;

        setTimeout(function () {
          _this3.viewPage++;
          _this3.$request.get("/Search/Article", {
            search: _this3.searchData,
            size: 10,
            page: _this3.viewPage
          }, function (res) {
            _this3.viewpointList = _this3.viewpointList.concat(res.data);
            _this3.viewisClick = false;
            if (res.data.length < 10) {
              _this3.viewMore = false;
            }
          });
        }, 100);
      }
    },


    /**@augments
     * 课程
     *
     */
    getCourseList: function getCourseList(search) {
      var _this4 = this;

      this.coursePage = 1;
      this.$request.get("/Search/className", { search: search, size: 9, page: this.coursePage }, function (res) {
        _this4.courseList = [];
        _this4.courseList = res.data;
        _this4.courseMore = true;
        _this4.courseisClick = false;
        if (res.data.length < 9) {
          _this4.courseMore = false;
        }
      });
    },
    courseMoreFn: function courseMoreFn() {
      var _this5 = this;

      if (this.courseMore) {
        this.courseisClick = true;

        setTimeout(function () {
          _this5.coursePage++;
          _this5.$request.get("/Search/className", {
            search: _this5.searchData,
            size: 9,
            page: _this5.coursePage
          }, function (res) {
            _this5.courseList = _this5.courseList.concat(res.data);
            _this5.courseisClick = false;
            if (res.data.length < 9) {
              _this5.courseMore = false;
            }
          });
        }, 100);
      }
    },


    /**@augments
     * 讲师
     *
     */
    getTeacherList: function getTeacherList(search) {
      var _this6 = this;

      //老师列表
      this.teacherPage = 1;
      this.$request.get("/Search/teachInfo", { search: search, size: 10, page: this.teacherPage }, function (res) {
        _this6.teacherList = [];
        _this6.teacherList = res.data;
        _this6.teacherMore = true;
        _this6.teacherisClick = false;
        if (res.data.length < 10) {
          _this6.teacherMore = false;
        }
      });
    },
    teacherMoreFn: function teacherMoreFn() {
      var _this7 = this;

      if (this.teacherMore) {
        this.teacherisClick = true;

        setTimeout(function () {
          _this7.teacherPage++;
          _this7.$request.get("/Search/className", {
            search: _this7.searchData,
            size: 10,
            page: _this7.teacherPage
          }, function (res) {
            _this7.teacherList = _this7.teacherList.concat(res.data);
            _this7.teacherisClick = false;
            if (res.data.length < 10) {
              _this7.teacherMore = false;
            }
          });
        }, 100);
      }
    }
  },

  components: {
    viewlist: list["a" /* default */],
    aside1: aside1["a" /* default */],
    courseItem: course["a" /* default */]
  }
});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-a6073774","hasScoped":false,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/page/searchPage.vue
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('main',{staticClass:"search-page"},[(_vm.loaded)?[_c('div',{staticClass:"search-item"},[_c('div',{staticClass:"item"},[_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.searchData),expression:"searchData"}],attrs:{"type":"search","placeholder":"请输入关键词"},domProps:{"value":(_vm.searchData)},on:{"keyup":function($event){if(!('button' in $event)&&_vm._k($event.keyCode,"enter",13,$event.key,"Enter")){ return null; }return _vm.getTab($event)},"input":function($event){if($event.target.composing){ return; }_vm.searchData=$event.target.value}}}),_vm._v(" "),_c('a',{attrs:{"href":"javascript:;"},on:{"click":_vm.getTab}},[_vm._v("搜索")])])]),_vm._v(" "),_c('section',{staticClass:"center-box"},[_c('nav',[_c('a',{class:{'active': _vm.tabActive == 1 },attrs:{"href":"javascript:;"},on:{"click":function($event){_vm.tab(1)}}},[_vm._v("\n                观点\n              ")]),_vm._v(" "),_c('a',{class:{'active': _vm.tabActive ==3 },attrs:{"href":"javascript:;"},on:{"click":function($event){_vm.tab(3)}}},[_vm._v("\n                讲师\n              ")])]),_vm._v(" "),_c('div',{staticClass:"main-box"},[_c('section',{staticClass:"left-box"},[(_vm.tabActive == 1)?_c('div',{staticClass:"view-item"},[(_vm.viewpointList.length > 0)?[_vm._l((_vm.viewpointList),function(item,index){return [_c('viewlist',{attrs:{"pointlist":item}})]}),_vm._v(" "),_c('div',{directives:[{name:"show",rawName:"v-show",value:(_vm.viewMore),expression:"viewMore"}],staticClass:"loadmore",class:{active:_vm.viewisClick},on:{"click":_vm.viewMoreFn}},[_c('span'),_vm._v("加载更多")])]:[_vm._m(0)]],2):_vm._e(),_vm._v(" "),(_vm.tabActive == 2)?_c('div',{staticClass:"course-item"},[(_vm.courseList.length > 0)?[_c('ul',{staticClass:"clearfix"},[_vm._l((_vm.courseList),function(item,index){return [_c('courseItem',{attrs:{"courseItem":item}})]})],2),_vm._v(" "),_c('div',{directives:[{name:"show",rawName:"v-show",value:(_vm.courseMore),expression:"courseMore"}],staticClass:"loadmore",class:{active:_vm.courseisClick},on:{"click":_vm.courseMoreFn}},[_c('span'),_vm._v("加载更多")])]:[_vm._m(1)]],2):_vm._e(),_vm._v(" "),(_vm.tabActive == 3)?_c('div',{staticClass:"teacher-item"},[_vm._l((_vm.teacherList),function(item,index){return (_vm.teacherList.length > 0)?[_c('router-link',{attrs:{"to":'/teacherIntroduction/' + item.user_id,"target":"_blank"}},[_c('img',{attrs:{"src":item.head_add,"alt":""}}),_vm._v(" "),_c('div',[_c('h5',[_vm._v(_vm._s(item.alias))]),_vm._v(" "),_c('p',[_vm._v("\n                                "+_vm._s(item.intro)+"\n                            ")]),_vm._v(" "),_c('h6',[_vm._v("查看更多")])])]),_vm._v(" "),_c('div',{directives:[{name:"show",rawName:"v-show",value:(_vm.teacherMore),expression:"teacherMore"}],staticClass:"loadmore",class:{active:_vm.teacherisClick},on:{"click":_vm.teacherMoreFn}},[_c('span'),_vm._v("加载更多")])]:[_vm._m(2)]})],2):_vm._e()]),_vm._v(" "),_c('section',{staticClass:"right-box"},[_c('aside1')],1)])])]:_vm._e()],2)}
var staticRenderFns = [function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',{staticClass:"nosearch"},[_c('img',{attrs:{"src":__webpack_require__("Hp0k"),"alt":""}}),_vm._v(" "),_c('p',[_vm._v("抱歉，未找到与关键词相关的内容")]),_vm._v(" "),_c('p',[_vm._v("\n                          请修改或者尝试其他关键词\n                        ")])])},function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',{staticClass:"nosearch"},[_c('img',{attrs:{"src":__webpack_require__("Hp0k"),"alt":""}}),_vm._v(" "),_c('p',[_vm._v("抱歉，未找到与关键词相关的内容")]),_vm._v(" "),_c('p',[_vm._v("\n                          请修改或者尝试其他关键词\n                        ")])])},function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',{staticClass:"nosearch"},[_c('img',{attrs:{"src":__webpack_require__("Hp0k"),"alt":""}}),_vm._v(" "),_c('p',[_vm._v("抱歉，未找到与关键词相关的内容")]),_vm._v(" "),_c('p',[_vm._v("\n                          请修改或者尝试其他关键词\n                        ")])])}]
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ var page_searchPage = (esExports);
// CONCATENATED MODULE: ./src/page/searchPage.vue
function injectStyle (ssrContext) {
  __webpack_require__("2Th5")
}
var normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  searchPage,
  page_searchPage,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)

/* harmony default export */ var src_page_searchPage = __webpack_exports__["default"] = (Component.exports);


/***/ }),

/***/ "H5cG":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "H6/b":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });

// EXTERNAL MODULE: ./src/components/pointList/lock-popup.vue + 8 modules
var lock_popup = __webpack_require__("C5wJ");

// EXTERNAL MODULE: ./node_modules/axios/index.js
var axios = __webpack_require__("mtWM");
var axios_default = /*#__PURE__*/__webpack_require__.n(axios);

// EXTERNAL MODULE: ./src/assets/images/default/dcl.png
var dcl = __webpack_require__("wiLd");
var dcl_default = /*#__PURE__*/__webpack_require__.n(dcl);

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/page/pointList/pointDetail.vue
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//




/* harmony default export */ var pointDetail = ({
  data: function data() {
    return {
      showPopup: false,
      pointId: this.$route.params.pointId,
      isFocus: 0,
      pointData: '',
      metaInfo: { //seo
        title: '',
        name: '',
        content: ''
      },
      isLoginFlag: false, //是否登录
      loginRes: '',
      defaultAvatar: dcl_default.a
    };
  },

  name: 'async',
  metaInfo: function metaInfo() {
    return {
      title: this.metaInfo.title,
      meta: [{
        name: this.metaInfo.name, //keyWords
        content: this.metaInfo.content
      }],
      link: [{ // set link
        rel: 'lexinamc',
        href: 'document.location.hostname'
      }]
    };
  },
  created: function created() {
    this.isLogin();

    this.$nextTick(function () {
      window.scrollTo(0, 1);
      window.scrollTo(0, 0);
    });
  },

  methods: {
    getContentSetting: function getContentSetting() {
      var _this = this;

      //获取网站内容设置
      this.$request.get('/ContentManage/getContentSetting', '', function (res) {
        console.log(res);
        if (res.code == 200) {
          _this.metaInfo.title = res.data[0].title + '-' + _this.pointData.title;
          _this.metaInfo.name = res.data[0].SEO_antistop;
          _this.metaInfo.content = res.data[0].describe;
        }
      });
    },

    /*addFocus(){
      let type = this.isFocus ? '0' : '1';//type    关注或取关 1关注 0取消关注
      this.$request.post('/Focus/addFocus',{
        user_id: 1706887,
        live_id: 4,
        type: type,
        target: 2
      },res=>{
        this.isFocus = !this.isFocus;
      })
    },*/
    isLogin: function isLogin() {
      var _this2 = this;

      //判斷是否登陸
      console.log('判斷是否登陸');
      var link = window.location.href;
      this.$request.get('/User/checkWechatLoginIn', { loginRedirectUrl: link }, function (res) {
        console.log(res);
        _this2.loginRes = res;
        if (res.code == -5002) {
          // 登录失败跳转登录

          _this2.setCookie('isLogin', 0);

          _this2.getViewPointById();
          _this2.isLoginFlag = false;
        } else if (res.code == 200) {
          // 登录成功
          console.log('已登陸');
          _this2.setCookie('isLogin', 1);
          _this2.setCookie('isRegister', res.data.isRegister);
          _this2.getViewPointById();
          _this2.isLoginFlag = true;
        }
      });
    },
    getViewPointById: function getViewPointById() {
      var _this3 = this;

      //获取观点详情
      var params = {
        viewpointId: this.$route.params.pointId,
        isColumn: true,
        isUserInfo: true,
        isRead: true
      };
      this.$request.get('/Viewpoint/getViewPointById', params, function (res) {
        if (res.code == 200) {
          _this3.pointData = res.data;
          _this3.getContentSetting();
        }
      });
    },
    showPopupFn: function showPopupFn() {
      //        this.isLogin();
      if (this.isLoginFlag) {
        this.showPopup = true;
        document.getElementsByTagName('body')[0].style.overflow = 'hidden';
      } else {
        window.location.href = this.loginRes.data.url;
      }
    },
    closePopupFn: function closePopupFn() {
      this.showPopup = false;
      document.getElementsByTagName('body')[0].style.overflow = 'auto';
    }
  },
  components: {
    lockPopup: lock_popup["a" /* default */]

  }
});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-4e16ba21","hasScoped":false,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/page/pointList/pointDetail.vue
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('main',{staticClass:"point-detail"},[_c('article',{staticClass:"article"},[_c('header',{staticClass:"header"},[_c('img',{staticClass:"avatar",attrs:{"src":_vm.pointData.head_add?_vm.pointData.head_add:_vm.defaultAvatar,"alt":""}}),_vm._v(" "),_c('div',{staticClass:"column"},[_c('p',[_vm._v(_vm._s(_vm.pointData.columnInfo.lead))])])]),_vm._v(" "),_c('section',{staticClass:"title"},[_c('h1',[_vm._v(_vm._s(_vm.pointData.title))]),_vm._v(" "),_c('p',[_vm._v(_vm._s(_vm.pointData.publish_time))])]),_vm._v(" "),_c('section',{staticClass:"content",domProps:{"innerHTML":_vm._s(_vm.pointData.content)}}),_vm._v(" "),(_vm.pointData.isBuy == 1)?_c('section',{staticClass:"content",domProps:{"innerHTML":_vm._s(_vm.pointData.pay_content)}}):_vm._e(),_vm._v(" "),(_vm.pointData.level == 1 && _vm.pointData.isBuy == 0)?_c('section',{staticClass:"open-lock"},[_c('div',{staticClass:"btn",on:{"click":_vm.showPopupFn}},[_c('span'),_vm._v("解锁全文")])]):_vm._e(),_vm._v(" "),_c('section',{staticClass:"ewcode"},[_c('img',{style:({'margin-top':_vm.pointData.level == 0?'80px':'0px'}),attrs:{"src":__webpack_require__("muw+"),"alt":""}}),_vm._v(" "),_c('p',[_vm._v("以上观点仅供参考，不构成投资建议")])])]),_vm._v(" "),(_vm.showPopup)?[_c('lock-popup',{attrs:{"type":2,"id":_vm.pointId},on:{"closePopup":_vm.closePopupFn}})]:_vm._e()],2)}
var staticRenderFns = []
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ var pointList_pointDetail = (esExports);
// CONCATENATED MODULE: ./src/page/pointList/pointDetail.vue
function injectStyle (ssrContext) {
  __webpack_require__("Anhg")
}
var normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  pointDetail,
  pointList_pointDetail,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)

/* harmony default export */ var page_pointList_pointDetail = __webpack_exports__["default"] = (Component.exports);


/***/ }),

/***/ "Hp0k":
/***/ (function(module, exports) {

module.exports = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJkAAACBCAYAAADT2RhMAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyhpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTMyIDc5LjE1OTI4NCwgMjAxNi8wNC8xOS0xMzoxMzo0MCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTUuNSAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6Qzk1ODQxMUY0NzZBMTFFOEJCRjg5NEJGNUU2RTk0NjAiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6Qzk1ODQxMjA0NzZBMTFFOEJCRjg5NEJGNUU2RTk0NjAiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpDOTU4NDExRDQ3NkExMUU4QkJGODk0QkY1RTZFOTQ2MCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpDOTU4NDExRTQ3NkExMUU4QkJGODk0QkY1RTZFOTQ2MCIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PkuhoT8AAA4aSURBVHja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"

/***/ }),

/***/ "ILbH":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/page/publicCourse.vue
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ var publicCourse = ({
  data: function data() {
    return {
      onliveData: [], //直播间信息
      teacherData: [], //老师信息
      currentTech: "",
      loaded: false, //刚进去
      onlinebtn: false, //是否在直播
      videoShow: false, //是否正在直播和显示视频
      playerOptions: {},
      metaInfo: {
        //seo
        title: "互动课堂",
        name: "直播",
        content: ""
      },
      online_num: 0 //在线人数
    };
  },

  name: "async",
  metaInfo: function metaInfo() {
    return {
      title: this.metaInfo.title,
      meta: [{
        name: this.metaInfo.name, //keyWords
        content: this.metaInfo.content
      }],
      link: [{
        // set link
        rel: "lexinamc",
        href: "document.location.hostname"
      }]
    };
  },


  components: {},
  created: function created() {
    this.getBgRmg();
  },
  mounted: function mounted() {
    this.$nextTick(function () {
      window.scroll(0, 0);
    });
  },

  methods: {
    //获取视频背景图
    getBgRmg: function getBgRmg() {
      var _this = this;

      //type为2和5时显示视频
      this.$request.get("/GlobalLive/getBackgroundImg", { id: 9999 }, function (res) {
        if (res.code == 200) {
          _this.online_num = res.data.online_num;
          _this.playerOptions.poster = res.data.picUrl || "/static/img/imgbg.jpg";
          if (res.data.type == 2) {
            //视频
            var videoObject = {
              container: "#videoplayer", //“#”代表容器的ID，“.”或“”代表容器的class
              variable: "player", //该属性必需设置，值等于下面的new chplayer()的对象
              autoplay: true, //自动播放
              // live: true,
              //loaded: 'loadedHandler', //当播放器加载后执行的函数
              poster: res.data.picUrl || "/static/img/imgbg.jpg",
              video: res.data.videoUrl //视频地址
            };

            setTimeout(function () {
              new ckplayer(videoObject);
            }, 1000);
            _this.videoShow = true;

            _this.loaded = true;
          } else if (res.data.type == 5) {
            //直播
            _this.onlinebtn = true;
            _this.getData();
            _this.getTeacher();
          } else {
            _this.loaded = true;
            _this.videoShow = false;
            // this.getData();
          }
        }
      });
    },
    getData: function getData() {
      var _this2 = this;

      this.$request.post("/Live/liveStream", "", function (res) {
        if (res.code == 200) {
          _this2.onliveData = res.data;
          _this2.playerOptions.poster = res.data.picUrl || "/static/img/imgbg.jpg"; //
          if (res.data.state == 1) {
            //表示有拉流
            var videoObject = {
              container: "#videoplayer", //“#”代表容器的ID，“.”或“”代表容器的class
              variable: "player", //该属性必需设置，值等于下面的new chplayer()的对象
              autoplay: true, //自动播放
              // live: true,
              //loaded: 'loadedHandler', //当播放器加载后执行的函数
              poster: res.data.picUrl || "/static/img/imgbg.jpg",
              video: res.data.pull_url //'http://live.hkstv.hk.lxdns.com/live/hks/playlist.m3u8'//视频地址
            };

            setTimeout(function () {
              new ckplayer(videoObject);
            }, 1000);

            _this2.videoShow = true;
          } else {
            // this.playerOptions.sources.src = "///";
            _this2.videoShow = false;
          }
          setTimeout(function () {
            _this2.loaded = true;
          }, 1000);
        }
      });
    },

    //获取老师信息
    getTeacher: function getTeacher() {
      var _this3 = this;

      this.$request.get("GlobalLive/getCurrentTeachInfo", "", function (res) {
        if (res.code == 200) {
          _this3.teacherData = res.data;
        } else {
          _this3.onlinebtn = false;
        }
      });
    }
  }
});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-35d99e46","hasScoped":false,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/page/publicCourse.vue
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',{staticClass:"container11"},[[_c('header',[_c('h5',{staticClass:"title"},[_c('img',{attrs:{"src":__webpack_require__("QlJf"),"alt":""}}),_vm._v(" "),_c('span',[_vm._v("在线人数"+_vm._s(_vm.online_num)+"人")])]),_vm._v(" "),(_vm.onlinebtn)?_c('div',{staticClass:"info"},[_c('h5',[_c('img',{attrs:{"src":_vm.teacherData.head_add,"alt":""}}),_vm._v(" "),_c('p',[_c('span',{staticClass:"span1"},[_vm._v(_vm._s(_vm.teacherData.alias))]),_vm._v(" "),_c('span',[_vm._v("粉丝"+_vm._s(_vm.teacherData.focus_num || 0)+"人")])])]),_vm._v(" "),_c('h6',{directives:[{name:"show",rawName:"v-show",value:(_vm.videoShow),expression:"videoShow"}]},[_c('img',{attrs:{"src":__webpack_require__("Wg0l"),"alt":""}})])]):_vm._e()]),_vm._v(" "),_c('div',{staticClass:"player"},[(_vm.videoShow)?[_c('div',{staticStyle:{"height":"678px"},attrs:{"id":"videoplayer"}})]:[_c('img',{attrs:{"src":_vm.playerOptions.poster,"alt":""}})]],2)]],2)}
var staticRenderFns = []
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ var page_publicCourse = (esExports);
// CONCATENATED MODULE: ./src/page/publicCourse.vue
function injectStyle (ssrContext) {
  __webpack_require__("pg7h")
}
var normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  publicCourse,
  page_publicCourse,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)

/* harmony default export */ var src_page_publicCourse = __webpack_exports__["default"] = (Component.exports);


/***/ }),

/***/ "IUgv":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/components/college/seriesCourseList.vue
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ var seriesCourseList = ({
  props: ['seriesCourseListData'],
  data: function data() {
    return {};
  },
  created: function created() {
    console.log(this.seriesCourseListData);
  },

  methods: {
    seriesClink: function seriesClink(item) {
      window.open = item.jumpUrl;
      /*if(item.type==2){//系列课
       // this.$router.push({path:'/seriesCourseDetail/'+item.id})
       }*/
    }
  }
});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-bc6889be","hasScoped":false,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/components/college/seriesCourseList.vue
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('main',_vm._l((_vm.seriesCourseListData),function(item,index){return _c('li',{staticClass:"series-course-box"},[_c('a',{attrs:{"href":item.jumpUrl,"target":"_blank"}},[_c('img',{attrs:{"src":item.imgUrl?item.imgUrl:'/static/img/imgbg.jpg',"alt":""}}),_vm._v(" "),_c('div',[_c('h5',[(item.type==1)?_c('span',[_vm._v("专题课")]):(item.type==2)?_c('span',[_vm._v("系列课")]):(item.type==3)?_c('span',[_vm._v("特训课")]):_vm._e(),_vm._v("\n          "+_vm._s(item.title)+"\n        ")]),_vm._v(" "),_c('div',{staticClass:"info"},[(item.type==3)?_c('span',[_vm._v(_vm._s(item.study_total)+"人已学习")]):_c('span',[_vm._v(_vm._s(item.study_total)+"人已报名")]),_vm._v(" "),(item.type==2)?[_c('span',{staticClass:"series"},[_vm._v("已更新"+_vm._s(item.update_total)+"节 | 共"+_vm._s(item.plan_num)+"节")])]:(item.type==3)?[_c('span',{staticClass:"enroll-time"},[_vm._v("截止时间：2018.03.28")])]:_vm._e()],2),_vm._v(" "),(item.type==3)?_c('p',[_c('span',{staticClass:"openTime"},[_vm._v("开课时间：2018.04.23")]),_vm._v(" "),(item.level==2)?_c('span',{staticClass:"price"},[_vm._v(_vm._s(item.price))]):(item.level==1)?_c('span',{staticClass:"encryption"},[_vm._v("私密课程")]):_vm._e()]):_c('p',[_c('img',{attrs:{"src":item.head_add}}),_vm._v(" "),_c('span',[_vm._v(_vm._s(item.alias))]),_vm._v(" "),(item.level==2)?_c('span',{staticClass:"price"},[_vm._v(_vm._s(item.price))]):(item.level==1)?_c('span',{staticClass:"encryption"},[_vm._v("私密课程")]):_vm._e()])])])])}))}
var staticRenderFns = []
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ var college_seriesCourseList = (esExports);
// CONCATENATED MODULE: ./src/components/college/seriesCourseList.vue
function injectStyle (ssrContext) {
  __webpack_require__("sNeY")
}
var normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  seriesCourseList,
  college_seriesCourseList,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)

/* harmony default export */ var components_college_seriesCourseList = (Component.exports);

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/page/college/seriesCourse.vue
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ var seriesCourse = ({
  data: function data() {
    return {
      hasMore: true, //
      noData: false,
      courseType: 0, //0全部课程 1精品课程  2 基础课程  3 高级课程
      seriesCourseListData: [], //推荐课程
      page: 1,
      getFineSeriesCourseDate: [],
      metInfoJson: {
        title: '',
        meta: [{
          name: '', //keyWords
          content: ''
        }],
        link: [{ // set link
          rel: '',
          href: ''
        }]
      }
    };
  },

  name: 'async',
  metaInfo: function metaInfo() {
    return this.metInfoJson;
  },
  created: function created() {
    var _this = this;

    this.getCourseList();
    this.getFineSeriesCourse(0);
    this.getContentSettingFun(function (res) {
      console.log(res);
      _this.metInfoJson = res;
    }, '系列课');
  },

  methods: {
    clickCourseType: function clickCourseType(type) {
      //课程切换
      this.page = 1;
      this.hasMore = true;
      this.noData = false;
      this.courseType = type;
      this.getFineSeriesCourseDate = [];
      this.getFineSeriesCourse(this.courseType);
    },
    loadMore: function loadMore() {
      this.page++;
      this.getFineSeriesCourse(this.courseType);
    },
    getCourseList: function getCourseList() {
      var _this2 = this;

      //推荐课程
      this.$request.get('/College/getCourseList', {
        type: 18 //系列课列表-推荐，
      }, function (res) {
        if (res.code == 200) {
          _this2.seriesCourseListData = res.data;
        }
      });
    },
    getFineSeriesCourse: function getFineSeriesCourse(type) {
      var _this3 = this;

      //课程列表
      this.$request.get('/College/getFineSeriesCourse', {
        type: type, //0：全部课程  1：精品课 2：基础课 3：高级课，
        page: this.page,
        limit: 9
      }, function (res) {
        if (res.code == 200) {
          _this3.getFineSeriesCourseDate = _this3.getFineSeriesCourseDate.concat(res.data);
          if (res.data.length < 9) {
            _this3.hasMore = false;
          }
          if (res.data.length == 0) {
            _this3.noData = true;
            _this3.hasMore = false;
          }
        }
      });
    }
  },
  components: {
    seriesCourseList: components_college_seriesCourseList
  }
});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-66c1d1c0","hasScoped":false,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/page/college/seriesCourse.vue
var seriesCourse_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('main',{staticClass:"series"},[(_vm.seriesCourseListData.length>0)?[_c('section',{staticClass:"part-title"},[_vm._v("推荐课程")]),_vm._v(" "),_c('ul',{staticClass:"Recommend clearfix"},[_c('seriesCourseList',{attrs:{"seriesCourseListData":_vm.seriesCourseListData}})],1)]:_vm._e(),_vm._v(" "),_c('article',{staticClass:"seriesCourseList clearfix"},[_c('section',{staticClass:"left"},[_c('ul',[_c('li',{class:{active:_vm.courseType==0},on:{"click":function($event){_vm.clickCourseType(0)}}},[_vm._v("全部课程")]),_vm._v(" "),_c('li',{class:{active:_vm.courseType==1},on:{"click":function($event){_vm.clickCourseType(1)}}},[_vm._v("精品课程")]),_vm._v(" "),_c('li',{class:{active:_vm.courseType==2},on:{"click":function($event){_vm.clickCourseType(2)}}},[_vm._v("基础课程")]),_vm._v(" "),_c('li',{class:{active:_vm.courseType==3},on:{"click":function($event){_vm.clickCourseType(3)}}},[_vm._v("高级课程")])])]),_vm._v(" "),_c('section',{staticClass:"right"},[(_vm.courseType==0)?[_c('ul',{staticClass:" clearfix"},[_c('seriesCourseList',{attrs:{"seriesCourseListData":_vm.getFineSeriesCourseDate}})],1)]:(_vm.courseType==1)?[_c('ul',{staticClass:" clearfix"},[_c('seriesCourseList',{attrs:{"seriesCourseListData":_vm.getFineSeriesCourseDate}})],1)]:(_vm.courseType==2)?[_c('ul',{staticClass:" clearfix"},[_c('seriesCourseList',{attrs:{"seriesCourseListData":_vm.getFineSeriesCourseDate}})],1)]:(_vm.courseType==3)?[_c('ul',{staticClass:" clearfix"},[_c('seriesCourseList',{attrs:{"seriesCourseListData":_vm.getFineSeriesCourseDate}})],1)]:_vm._e(),_vm._v(" "),(_vm.hasMore)?_c('section',{staticClass:"more-block"},[_c('section',{staticClass:"more",on:{"click":_vm.loadMore}},[_vm._v("加载更多")])]):_vm._e(),_vm._v(" "),(_vm.noData)?_c('div',{staticClass:"nosearch"},[_c('img',{attrs:{"src":__webpack_require__("Hp0k"),"alt":""}}),_vm._v(" "),_c('p',[_vm._v("哦~没有内容呢！")])]):_vm._e()],2)])],2)}
var seriesCourse_staticRenderFns = []
var seriesCourse_esExports = { render: seriesCourse_render, staticRenderFns: seriesCourse_staticRenderFns }
/* harmony default export */ var college_seriesCourse = (seriesCourse_esExports);
// CONCATENATED MODULE: ./src/page/college/seriesCourse.vue
function seriesCourse_injectStyle (ssrContext) {
  __webpack_require__("xp5q")
}
var seriesCourse_normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var seriesCourse___vue_template_functional__ = false
/* styles */
var seriesCourse___vue_styles__ = seriesCourse_injectStyle
/* scopeId */
var seriesCourse___vue_scopeId__ = null
/* moduleIdentifier (server only) */
var seriesCourse___vue_module_identifier__ = null
var seriesCourse_Component = seriesCourse_normalizeComponent(
  seriesCourse,
  college_seriesCourse,
  seriesCourse___vue_template_functional__,
  seriesCourse___vue_styles__,
  seriesCourse___vue_scopeId__,
  seriesCourse___vue_module_identifier__
)

/* harmony default export */ var page_college_seriesCourse = __webpack_exports__["default"] = (seriesCourse_Component.exports);


/***/ }),

/***/ "M0Pv":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "MAlW":
/***/ (function(module, exports) {

/**
 * Convert array of 16 byte values to UUID string format of the form:
 * XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX
 */
var byteToHex = [];
for (var i = 0; i < 256; ++i) {
  byteToHex[i] = (i + 0x100).toString(16).substr(1);
}

function bytesToUuid(buf, offset) {
  var i = offset || 0;
  var bth = byteToHex;
  // join used to fix memory issue caused by concatenation: https://bugs.chromium.org/p/v8/issues/detail?id=3175#c4
  return ([bth[buf[i++]], bth[buf[i++]], 
	bth[buf[i++]], bth[buf[i++]], '-',
	bth[buf[i++]], bth[buf[i++]], '-',
	bth[buf[i++]], bth[buf[i++]], '-',
	bth[buf[i++]], bth[buf[i++]], '-',
	bth[buf[i++]], bth[buf[i++]],
	bth[buf[i++]], bth[buf[i++]],
	bth[buf[i++]], bth[buf[i++]]]).join('');
}

module.exports = bytesToUuid;


/***/ }),

/***/ "NZMb":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "NmNT":
/***/ (function(module, exports) {

module.exports = "data:image/png;base64,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"

/***/ }),

/***/ "O2Um":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "OM+P":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/components/college/course-progress.vue
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ var course_progress = ({
  props: ['listData'],
  methods: {
    timePast: function timePast(endTime) {
      //判断报名截止时间是否已过
      var now = new Date();
      var time = new Date(endTime.split('-').join('/'));
      if (time < now) {
        return true;
      } else {
        return false;
      }
    },
    jumpClick: function jumpClick(url) {
      window.location = url;
    }
  }
});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-584511cc","hasScoped":false,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/components/college/course-progress.vue
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('main',{staticClass:"course-progress"},[_c('section',{staticClass:"hot-container"},_vm._l((_vm.listData),function(item,index){return _c('div',{staticClass:"hot-item clearfix"},[_c('img',{attrs:{"src":item.imgUrl,"alt":""}}),_vm._v(" "),_c('div',{staticClass:"detail"},[_c('h1',[_vm._v(_vm._s(item.class_name || item.title))]),_vm._v(" "),_c('div',{staticClass:"box"},[_c('p',{staticClass:"time"},[_vm._v("开课时间："+_vm._s(item.begin_time_ymd)+" 至 "+_vm._s(item.end_time_ymd))]),_vm._v(" "),_c('p',{staticClass:"time"},[_vm._v("截止时间："+_vm._s(item.end_enroll_time_ymd))]),_vm._v(" "),_c('div',{staticClass:"plan"},[_c('div',{staticClass:"num"},[_c('span',[_vm._v("招募人数："+_vm._s(item.enroll_max_num))]),_vm._v(" "),_c('p',[_vm._v("剩余："+_vm._s(100-item.enroll_percent)+"%")])]),_vm._v(" "),_c('div',{staticClass:"bar"},[_c('div',{staticClass:"active",style:({'width':item.enroll_percent+'%'})})])]),_vm._v(" "),_c('div',{staticClass:"handle"},[(item.level == 2)?_c('span',{staticClass:"price"},[_vm._v(_vm._s(item.price))]):_vm._e(),_vm._v(" "),(item.level == 0)?_c('span',{staticClass:"free"},[_vm._v("免费课程")]):_vm._e(),_vm._v(" "),_c('div',{staticClass:"btn",class:{'default':_vm.timePast(item.end_enroll_time)}},[_c('a',{attrs:{"href":item.jumpUrl,"target":"_blank"}},[_vm._v(_vm._s(_vm.timePast(item.end_enroll_time)?'报名截止':'立即报名'))])])])])])])}))])}
var staticRenderFns = []
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ var college_course_progress = (esExports);
// CONCATENATED MODULE: ./src/components/college/course-progress.vue
function injectStyle (ssrContext) {
  __webpack_require__("5RpU")
}
var normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  course_progress,
  college_course_progress,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)

/* harmony default export */ var components_college_course_progress = __webpack_exports__["a"] = (Component.exports);


/***/ }),

/***/ "PwjF":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });

// EXTERNAL MODULE: ./node_modules/babel-runtime/regenerator/index.js
var regenerator = __webpack_require__("Xxa5");
var regenerator_default = /*#__PURE__*/__webpack_require__.n(regenerator);

// EXTERNAL MODULE: ./node_modules/babel-runtime/helpers/asyncToGenerator.js
var asyncToGenerator = __webpack_require__("exGp");
var asyncToGenerator_default = /*#__PURE__*/__webpack_require__.n(asyncToGenerator);

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/page/college/collegeIndex.vue


//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

__webpack_require__("mgS3");

/* harmony default export */ var collegeIndex = ({
  data: function data() {
    return {
      bannerData: [],
      headerOption: {
        //头部轮播图
        effect: "coverflow",
        coverflowEffect: {
          rotate: 0,
          stretch: 0,
          depth: 0,
          modifier: 1,
          slideShadows: false
        },
        autoplay: {
          delay: 5000,
          disableOnInteraction: false
        },
        // width: window.innerWidth,
        speed: 300,
        loop: false,
        fadeEffect: {
          crossFade: true
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true
        }
      }
    };
  },
  created: function created() {
    this.routeBanner();
  },

  methods: {
    routeBanner: function routeBanner() {
      var name = this.$route.name;
      if (name === 'recommend') {
        this.getBanner(9);
      } else if (name === 'specialCourse') {
        this.getBanner(14);
      } else if (name === 'seriesCourse') {
        this.getBanner(17);
      } else if (name === 'trainingCourse') {
        this.getBanner(20);
      } else if (name === 'teachers') {
        this.getBanner(24);
      }
    },
    getBanner: function getBanner(type) {
      var _this = this;

      return asyncToGenerator_default()( /*#__PURE__*/regenerator_default.a.mark(function _callee() {
        return regenerator_default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                _context.next = 2;
                return _this.$request.get("/College/getBanner", { type: type }, function (res) {
                  _this.bannerData = res.data;
                });

              case 2:
              case "end":
                return _context.stop();
            }
          }
        }, _callee, _this);
      }))();
    }
  },
  watch: {
    $route: function $route(obj) {
      this.routeBanner();
    }
  },
  components: {}

});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-c170dfca","hasScoped":false,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/page/college/collegeIndex.vue
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',{staticClass:"collegeIndex"},[_c('section',{staticClass:"banner-box"},[_c('swiper',{staticClass:"top-banner",attrs:{"options":_vm.headerOption}},[_vm._l((_vm.bannerData),function(item){return [_c('swiper-slide',[_c('a',{attrs:{"href":("" + (item.jumpUrl)),"target":"_blank"}},[_c('img',{attrs:{"src":item.imgUrl,"alt":""}})])])]}),_vm._v(" "),_c('div',{staticClass:"swiper-pagination",attrs:{"slot":"pagination"},slot:"pagination"})],2)],1),_vm._v(" "),_c('ul',{staticClass:"college-tabber"},[_c('router-link',{attrs:{"to":{name:'recommend'},"tag":"li"}},[_vm._v("学院推荐")]),_vm._v(" "),_c('router-link',{attrs:{"to":{name:'specialCourse'},"tag":"li"}},[_vm._v("专题课")]),_vm._v(" "),_c('router-link',{attrs:{"to":{name:'seriesCourse'},"tag":"li"}},[_vm._v("系列课")]),_vm._v(" "),_c('router-link',{attrs:{"to":{name:'trainingCourse'},"tag":"li"}},[_vm._v("特训班")]),_vm._v(" "),_c('router-link',{attrs:{"to":{name:'teachers'},"tag":"li"}},[_vm._v("讲师列表")])],1),_vm._v(" "),_c('section',{staticClass:"index-main"},[_c('router-view')],1)])}
var staticRenderFns = []
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ var college_collegeIndex = (esExports);
// CONCATENATED MODULE: ./src/page/college/collegeIndex.vue
function injectStyle (ssrContext) {
  __webpack_require__("TGyq")
}
var normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  collegeIndex,
  college_collegeIndex,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)

/* harmony default export */ var page_college_collegeIndex = __webpack_exports__["default"] = (Component.exports);


/***/ }),

/***/ "QFIV":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });

// EXTERNAL MODULE: ./src/components/college/course.vue + 2 modules
var course = __webpack_require__("T3yJ");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/page/college/specialCourse.vue
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ var specialCourse = ({
  data: function data() {
    return {
      sujectList: [], //专题研究
      reviewList: [], //回顾
      hasMore: true, //观点列表
      isClick: false, //是否点击
      page: 1,
      metaInfo: {
        //seo
        title: "",
        name: "",
        content: ""
      }
    };
  },

  name: "async",
  metaInfo: function metaInfo() {
    return {
      title: this.metaInfo.title,
      meta: [{
        name: this.metaInfo.name, //keyWords
        content: this.metaInfo.content
      }],
      link: [{
        // set link
        rel: "lexinamc",
        href: "document.location.hostname"
      }]
    };
  },
  created: function created() {
    this.getSubjectList();
    this.getReviewList();
    this.getContentSetting();
  },

  methods: {
    getContentSetting: function getContentSetting() {
      var _this = this;

      //获取网站内容设置
      this.$request.get("/ContentManage/getContentSetting", "", function (res) {
        console.log(res);
        if (res.code == 200) {
          _this.metaInfo.title = res.data[0].title + "-专题课";
          _this.metaInfo.name = res.data[0].SEO_antistop;
          _this.metaInfo.content = res.data[0].describe;
        }
      });
    },

    /**@augments
     *专题研究
     *
     */
    getSubjectList: function getSubjectList() {
      var _this2 = this;

      this.$request.get("/College/getCourseList", { type: 15 }, function (res) {
        // this.viewpointList = [];
        _this2.sujectList = res.data;
      });
    },

    /**@augments
     *回顾
     *
     */
    getReviewList: function getReviewList() {
      var _this3 = this;

      this.$request.get("/College/getCourseList", { type: 16, page: this.page, limit: 10 }, function (res) {
        // this.viewpointList = [];
        _this3.reviewList = _this3.reviewList.concat(res.data);
        _this3.hasMore = true;
        _this3.isClick = false;
        if (res.data.length < 10) {
          _this3.hasMore = false;
        }
      });
    },
    loadMore: function loadMore() {
      var _this4 = this;

      if (this.hasMore) {
        this.isClick = true;

        setTimeout(function () {
          _this4.page++;
          _this4.getReviewList();
        }, 100);
      }
    }
  },
  components: {
    courseItem: course["a" /* default */]
  }
});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-406ec961","hasScoped":false,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/page/college/specialCourse.vue
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('main',{staticClass:"special-courses"},[(_vm.sujectList.length > 0)?_c('div',{staticClass:"item"},[_c('h5',{staticClass:"title"},[_vm._v("\n            专题研究\n        ")]),_vm._v(" "),_c('ul',{staticClass:"clearfix"},[_vm._l((_vm.sujectList),function(item){return [_c('courseItem',{attrs:{"courseItem":item}})]})],2)]):_vm._e(),_vm._v(" "),(_vm.reviewList.length > 0)?_c('div',{staticClass:"item1"},[_c('h5',{staticClass:"title"},[_vm._v("\n            回顾\n        ")]),_vm._v(" "),_c('ul',{staticClass:"clearfix"},_vm._l((_vm.reviewList),function(item){return _c('li',[_c('img',{attrs:{"src":item.imgUrl,"alt":""}}),_vm._v(" "),_c('section',[_c('h1',{staticClass:"name"},[_vm._v("\n            "+_vm._s(item.class_name)+"\n          ")]),_vm._v(" "),_c('section',{staticClass:"num"},[_c('span',[_vm._v(_vm._s(item.study_total)+"人学习")])]),_vm._v(" "),_c('section',{staticClass:"info"},[_c('img',{attrs:{"src":item.head_add,"alt":""}}),_vm._v(" "),_c('span',[_vm._v(_vm._s(item.alias))]),_vm._v(" "),_c('router-link',{attrs:{"to":'/specialCourseDetail/'+item.relevanceId,"target":"_blank"}},[_vm._v("立即回顾")])],1)])])})),_vm._v(" "),_c('div',{directives:[{name:"show",rawName:"v-show",value:(_vm.hasMore),expression:"hasMore"}],staticClass:"loadmore",class:{active:_vm.isClick},on:{"click":_vm.loadMore}},[_c('span'),_vm._v("加载更多")])]):_vm._e()])}
var staticRenderFns = []
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ var college_specialCourse = (esExports);
// CONCATENATED MODULE: ./src/page/college/specialCourse.vue
function injectStyle (ssrContext) {
  __webpack_require__("NZMb")
}
var normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  specialCourse,
  college_specialCourse,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)

/* harmony default export */ var page_college_specialCourse = __webpack_exports__["default"] = (Component.exports);


/***/ }),

/***/ "QlJf":
/***/ (function(module, exports) {

module.exports = "data:image/png;base64,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"

/***/ }),

/***/ "SXdm":
/***/ (function(module, exports, __webpack_require__) {

/**
 * @fileoverview
 * Awesome-qr.js
 *
 * @author Makito <sumimakito@hotmail.com>
 * @see <a href="https://www.keep.moe/" target="_blank">https://www.keep.moe/</a>
 * @see <a href="https://github.com/SumiMakito/Awesome-qr.js" target="_blank">https://github.com/SumiMakito/Awesome-qr.js</a>
 */
/**
 * @fileoverview
 * - Using the 'QRCode for Javascript library'
 * - Fixed dataset of 'QRCode for Javascript library' for support full-spec.
 * - this library has no dependencies.
 *
 * @author davidshimjs
 * @see <a href="http://www.d-project.com/" target="_blank">http://www.d-project.com/</a>
 * @see <a href="http://jeromeetienne.github.com/jquery-qrcode/" target="_blank">http://jeromeetienne.github.com/jquery-qrcode/</a>
 */
var AwesomeQRCode
;(function() {
  //---------------------------------------------------------------------
  // QRCode for JavaScript
  //
  // Copyright (c) 2009 Kazuhiko Arase
  //
  // URL: http://www.d-project.com/
  //
  // Licensed under the MIT license:
  //   http://www.opensource.org/licenses/mit-license.php
  //
  // The word "QR Code" is registered trademark of
  // DENSO WAVE INCORPORATED
  //   http://www.denso-wave.com/qrcode/faqpatent-e.html
  //
  //---------------------------------------------------------------------
  function QR8bitByte(data) {
    this.mode = QRMode.MODE_8BIT_BYTE
    this.data = data
    this.parsedData = []
    for (var i = 0, l = this.data.length; i < l; i++) {
      var byteArray = []
      var code = this.data.charCodeAt(i)
      if (code > 0x10000) {
        byteArray[0] = 0xf0 | ((code & 0x1c0000) >>> 18)
        byteArray[1] = 0x80 | ((code & 0x3f000) >>> 12)
        byteArray[2] = 0x80 | ((code & 0xfc0) >>> 6)
        byteArray[3] = 0x80 | (code & 0x3f)
      } else if (code > 0x800) {
        byteArray[0] = 0xe0 | ((code & 0xf000) >>> 12)
        byteArray[1] = 0x80 | ((code & 0xfc0) >>> 6)
        byteArray[2] = 0x80 | (code & 0x3f)
      } else if (code > 0x80) {
        byteArray[0] = 0xc0 | ((code & 0x7c0) >>> 6)
        byteArray[1] = 0x80 | (code & 0x3f)
      } else {
        byteArray[0] = code
      }
      this.parsedData.push(byteArray)
    }
    this.parsedData = Array.prototype.concat.apply([], this.parsedData)
    if (this.parsedData.length != this.data.length) {
      this.parsedData.unshift(191)
      this.parsedData.unshift(187)
      this.parsedData.unshift(239)
    }
  }

  QR8bitByte.prototype = {
    getLength: function(buffer) {
      return this.parsedData.length
    },
    write: function(buffer) {
      for (var i = 0, l = this.parsedData.length; i < l; i++) {
        buffer.put(this.parsedData[i], 8)
      }
    }
  }
  function QRCodeModel(typeNumber, errorCorrectLevel) {
    this.typeNumber = typeNumber
    this.errorCorrectLevel = errorCorrectLevel
    this.modules = null
    this.moduleCount = 0
    this.dataCache = null
    this.dataList = []
  }

  QRCodeModel.prototype = {
    addData: function(data) {
      var newData = new QR8bitByte(data)
      this.dataList.push(newData)
      this.dataCache = null
    },
    isDark: function(row, col) {
      if (
        row < 0 ||
        this.moduleCount <= row ||
        col < 0 ||
        this.moduleCount <= col
      ) {
        throw new Error(row + ',' + col)
      }
      return this.modules[row][col]
    },
    getModuleCount: function() {
      return this.moduleCount
    },
    make: function() {
      /////////////////////////////////////////////
      if (this.typeNumber < 1) {
        var typeNumber = 1
        for (typeNumber = 1; typeNumber < 40; typeNumber++) {
          var rsBlocks = QRRSBlock.getRSBlocks(
            typeNumber,
            this.errorCorrectLevel
          )

          var buffer = new QRBitBuffer()
          var totalDataCount = 0
          for (var i = 0; i < rsBlocks.length; i++) {
            totalDataCount += rsBlocks[i].dataCount
          }

          for (var i = 0; i < this.dataList.length; i++) {
            var data = this.dataList[i]
            buffer.put(data.mode, 4)
            buffer.put(
              data.getLength(),
              QRUtil.getLengthInBits(data.mode, typeNumber)
            )
            data.write(buffer)
          }
          if (buffer.getLengthInBits() <= totalDataCount * 8) break
        }
        this.typeNumber = typeNumber
      }
      /////////////////////////////////////////////
      this.makeImpl(!1, this.getBestMaskPattern())
    },
    makeImpl: function(test, maskPattern) {
      this.moduleCount = this.typeNumber * 4 + 17
      this.modules = new Array(this.moduleCount)
      for (var row = 0; row < this.moduleCount; row++) {
        this.modules[row] = new Array(this.moduleCount)
        for (var col = 0; col < this.moduleCount; col++) {
          this.modules[row][col] = null
        }
      }
      this.setupPositionProbePattern(0, 0)
      this.setupPositionProbePattern(this.moduleCount - 7, 0)
      this.setupPositionProbePattern(0, this.moduleCount - 7)
      this.setupPositionAdjustPattern()
      this.setupTimingPattern()
      this.setupTypeInfo(test, maskPattern)
      if (this.typeNumber >= 7) {
        this.setupTypeNumber(test)
      }
      if (this.dataCache == null) {
        this.dataCache = QRCodeModel.createData(
          this.typeNumber,
          this.errorCorrectLevel,
          this.dataList
        )
      }
      this.mapData(this.dataCache, maskPattern)
    },
    setupPositionProbePattern: function(row, col) {
      for (var r = -1; r <= 7; r++) {
        if (row + r <= -1 || this.moduleCount <= row + r) continue
        for (var c = -1; c <= 7; c++) {
          if (col + c <= -1 || this.moduleCount <= col + c) continue
          if (
            (0 <= r && r <= 6 && (c == 0 || c == 6)) ||
            (0 <= c && c <= 6 && (r == 0 || r == 6)) ||
            (2 <= r && r <= 4 && 2 <= c && c <= 4)
          ) {
            this.modules[row + r][col + c] = !0
          } else {
            this.modules[row + r][col + c] = !1
          }
        }
      }
    },
    getBestMaskPattern: function() {
      var minLostPoint = 0
      var pattern = 0
      for (var i = 0; i < 8; i++) {
        this.makeImpl(!0, i)
        var lostPoint = QRUtil.getLostPoint(this)
        if (i == 0 || minLostPoint > lostPoint) {
          minLostPoint = lostPoint
          pattern = i
        }
      }
      return pattern
    },
    createMovieClip: function(target_mc, instance_name, depth) {
      var qr_mc = target_mc.createEmptyMovieClip(instance_name, depth)
      var cs = 1
      this.make()
      for (var row = 0; row < this.modules.length; row++) {
        var y = row * cs
        for (var col = 0; col < this.modules[row].length; col++) {
          var x = col * cs
          var dark = this.modules[row][col]
          if (dark) {
            qr_mc.beginFill(0, 100)
            qr_mc.moveTo(x, y)
            qr_mc.lineTo(x + cs, y)
            qr_mc.lineTo(x + cs, y + cs)
            qr_mc.lineTo(x, y + cs)
            qr_mc.endFill()
          }
        }
      }
      return qr_mc
    },
    setupTimingPattern: function() {
      for (var r = 8; r < this.moduleCount - 8; r++) {
        if (this.modules[r][6] != null) {
          continue
        }
        this.modules[r][6] = r % 2 == 0
      }
      for (var c = 8; c < this.moduleCount - 8; c++) {
        if (this.modules[6][c] != null) {
          continue
        }
        this.modules[6][c] = c % 2 == 0
      }
    },
    setupPositionAdjustPattern: function() {
      var pos = QRUtil.getPatternPosition(this.typeNumber)
      for (var i = 0; i < pos.length; i++) {
        for (var j = 0; j < pos.length; j++) {
          var row = pos[i]
          var col = pos[j]
          if (this.modules[row][col] != null) {
            continue
          }
          for (var r = -2; r <= 2; r++) {
            for (var c = -2; c <= 2; c++) {
              if (
                r == -2 ||
                r == 2 ||
                c == -2 ||
                c == 2 ||
                (r == 0 && c == 0)
              ) {
                this.modules[row + r][col + c] = !0
              } else {
                this.modules[row + r][col + c] = !1
              }
            }
          }
        }
      }
    },
    setupTypeNumber: function(test) {
      var bits = QRUtil.getBCHTypeNumber(this.typeNumber)
      for (var i = 0; i < 18; i++) {
        var mod = !test && ((bits >> i) & 1) == 1
        this.modules[Math.floor(i / 3)][
          (i % 3) + this.moduleCount - 8 - 3
        ] = mod
      }
      for (var i = 0; i < 18; i++) {
        var mod = !test && ((bits >> i) & 1) == 1
        this.modules[(i % 3) + this.moduleCount - 8 - 3][
          Math.floor(i / 3)
        ] = mod
      }
    },
    setupTypeInfo: function(test, maskPattern) {
      var data = (this.errorCorrectLevel << 3) | maskPattern
      var bits = QRUtil.getBCHTypeInfo(data)
      for (var i = 0; i < 15; i++) {
        var mod = !test && ((bits >> i) & 1) == 1
        if (i < 6) {
          this.modules[i][8] = mod
        } else if (i < 8) {
          this.modules[i + 1][8] = mod
        } else {
          this.modules[this.moduleCount - 15 + i][8] = mod
        }
      }
      for (var i = 0; i < 15; i++) {
        var mod = !test && ((bits >> i) & 1) == 1
        if (i < 8) {
          this.modules[8][this.moduleCount - i - 1] = mod
        } else if (i < 9) {
          this.modules[8][15 - i - 1 + 1] = mod
        } else {
          this.modules[8][15 - i - 1] = mod
        }
      }
      this.modules[this.moduleCount - 8][8] = !test
    },
    mapData: function(data, maskPattern) {
      var inc = -1
      var row = this.moduleCount - 1
      var bitIndex = 7
      var byteIndex = 0
      for (var col = this.moduleCount - 1; col > 0; col -= 2) {
        if (col == 6) col--
        while (!0) {
          for (var c = 0; c < 2; c++) {
            if (this.modules[row][col - c] == null) {
              var dark = !1
              if (byteIndex < data.length) {
                dark = ((data[byteIndex] >>> bitIndex) & 1) == 1
              }
              var mask = QRUtil.getMask(maskPattern, row, col - c)
              if (mask) {
                dark = !dark
              }
              this.modules[row][col - c] = dark
              bitIndex--
              if (bitIndex == -1) {
                byteIndex++
                bitIndex = 7
              }
            }
          }
          row += inc
          if (row < 0 || this.moduleCount <= row) {
            row -= inc
            inc = -inc
            break
          }
        }
      }
    }
  }
  QRCodeModel.PAD0 = 0xec
  QRCodeModel.PAD1 = 0x11
  QRCodeModel.createData = function(typeNumber, errorCorrectLevel, dataList) {
    var rsBlocks = QRRSBlock.getRSBlocks(typeNumber, errorCorrectLevel)
    var buffer = new QRBitBuffer()
    for (var i = 0; i < dataList.length; i++) {
      var data = dataList[i]
      buffer.put(data.mode, 4)
      buffer.put(
        data.getLength(),
        QRUtil.getLengthInBits(data.mode, typeNumber)
      )
      data.write(buffer)
    }
    var totalDataCount = 0
    for (var i = 0; i < rsBlocks.length; i++) {
      totalDataCount += rsBlocks[i].dataCount
    }
    if (buffer.getLengthInBits() > totalDataCount * 8) {
      throw new Error(
        'code length overflow. (' +
          buffer.getLengthInBits() +
          '>' +
          totalDataCount * 8 +
          ')'
      )
    }
    if (buffer.getLengthInBits() + 4 <= totalDataCount * 8) {
      buffer.put(0, 4)
    }
    while (buffer.getLengthInBits() % 8 != 0) {
      buffer.putBit(!1)
    }
    while (!0) {
      if (buffer.getLengthInBits() >= totalDataCount * 8) {
        break
      }
      buffer.put(QRCodeModel.PAD0, 8)
      if (buffer.getLengthInBits() >= totalDataCount * 8) {
        break
      }
      buffer.put(QRCodeModel.PAD1, 8)
    }
    return QRCodeModel.createBytes(buffer, rsBlocks)
  }
  QRCodeModel.createBytes = function(buffer, rsBlocks) {
    var offset = 0
    var maxDcCount = 0
    var maxEcCount = 0
    var dcdata = new Array(rsBlocks.length)
    var ecdata = new Array(rsBlocks.length)
    for (var r = 0; r < rsBlocks.length; r++) {
      var dcCount = rsBlocks[r].dataCount
      var ecCount = rsBlocks[r].totalCount - dcCount
      maxDcCount = Math.max(maxDcCount, dcCount)
      maxEcCount = Math.max(maxEcCount, ecCount)
      dcdata[r] = new Array(dcCount)
      for (var i = 0; i < dcdata[r].length; i++) {
        dcdata[r][i] = 0xff & buffer.buffer[i + offset]
      }
      offset += dcCount
      var rsPoly = QRUtil.getErrorCorrectPolynomial(ecCount)
      var rawPoly = new QRPolynomial(dcdata[r], rsPoly.getLength() - 1)
      var modPoly = rawPoly.mod(rsPoly)
      ecdata[r] = new Array(rsPoly.getLength() - 1)
      for (var i = 0; i < ecdata[r].length; i++) {
        var modIndex = i + modPoly.getLength() - ecdata[r].length
        ecdata[r][i] = modIndex >= 0 ? modPoly.get(modIndex) : 0
      }
    }
    var totalCodeCount = 0
    for (var i = 0; i < rsBlocks.length; i++) {
      totalCodeCount += rsBlocks[i].totalCount
    }
    var data = new Array(totalCodeCount)
    var index = 0
    for (var i = 0; i < maxDcCount; i++) {
      for (var r = 0; r < rsBlocks.length; r++) {
        if (i < dcdata[r].length) {
          data[index++] = dcdata[r][i]
        }
      }
    }
    for (var i = 0; i < maxEcCount; i++) {
      for (var r = 0; r < rsBlocks.length; r++) {
        if (i < ecdata[r].length) {
          data[index++] = ecdata[r][i]
        }
      }
    }
    return data
  }
  var QRMode = {
    MODE_NUMBER: 1 << 0,
    MODE_ALPHA_NUM: 1 << 1,
    MODE_8BIT_BYTE: 1 << 2,
    MODE_KANJI: 1 << 3
  }
  var QRErrorCorrectLevel = { L: 1, M: 0, Q: 3, H: 2 }
  var QRMaskPattern = {
    PATTERN000: 0,
    PATTERN001: 1,
    PATTERN010: 2,
    PATTERN011: 3,
    PATTERN100: 4,
    PATTERN101: 5,
    PATTERN110: 6,
    PATTERN111: 7
  }
  var QRUtil = {
    PATTERN_POSITION_TABLE: [
      [],
      [6, 18],
      [6, 22],
      [6, 26],
      [6, 30],
      [6, 34],
      [6, 22, 38],
      [6, 24, 42],
      [6, 26, 46],
      [6, 28, 50],
      [6, 30, 54],
      [6, 32, 58],
      [6, 34, 62],
      [6, 26, 46, 66],
      [6, 26, 48, 70],
      [6, 26, 50, 74],
      [6, 30, 54, 78],
      [6, 30, 56, 82],
      [6, 30, 58, 86],
      [6, 34, 62, 90],
      [6, 28, 50, 72, 94],
      [6, 26, 50, 74, 98],
      [6, 30, 54, 78, 102],
      [6, 28, 54, 80, 106],
      [6, 32, 58, 84, 110],
      [6, 30, 58, 86, 114],
      [6, 34, 62, 90, 118],
      [6, 26, 50, 74, 98, 122],
      [6, 30, 54, 78, 102, 126],
      [6, 26, 52, 78, 104, 130],
      [6, 30, 56, 82, 108, 134],
      [6, 34, 60, 86, 112, 138],
      [6, 30, 58, 86, 114, 142],
      [6, 34, 62, 90, 118, 146],
      [6, 30, 54, 78, 102, 126, 150],
      [6, 24, 50, 76, 102, 128, 154],
      [6, 28, 54, 80, 106, 132, 158],
      [6, 32, 58, 84, 110, 136, 162],
      [6, 26, 54, 82, 110, 138, 166],
      [6, 30, 58, 86, 114, 142, 170]
    ],
    G15:
      (1 << 10) |
      (1 << 8) |
      (1 << 5) |
      (1 << 4) |
      (1 << 2) |
      (1 << 1) |
      (1 << 0),
    G18:
      (1 << 12) |
      (1 << 11) |
      (1 << 10) |
      (1 << 9) |
      (1 << 8) |
      (1 << 5) |
      (1 << 2) |
      (1 << 0),
    G15_MASK: (1 << 14) | (1 << 12) | (1 << 10) | (1 << 4) | (1 << 1),
    getBCHTypeInfo: function(data) {
      var d = data << 10
      while (QRUtil.getBCHDigit(d) - QRUtil.getBCHDigit(QRUtil.G15) >= 0) {
        d ^=
          QRUtil.G15 << (QRUtil.getBCHDigit(d) - QRUtil.getBCHDigit(QRUtil.G15))
      }
      return ((data << 10) | d) ^ QRUtil.G15_MASK
    },
    getBCHTypeNumber: function(data) {
      var d = data << 12
      while (QRUtil.getBCHDigit(d) - QRUtil.getBCHDigit(QRUtil.G18) >= 0) {
        d ^=
          QRUtil.G18 << (QRUtil.getBCHDigit(d) - QRUtil.getBCHDigit(QRUtil.G18))
      }
      return (data << 12) | d
    },
    getBCHDigit: function(data) {
      var digit = 0
      while (data != 0) {
        digit++
        data >>>= 1
      }
      return digit
    },
    getPatternPosition: function(typeNumber) {
      return QRUtil.PATTERN_POSITION_TABLE[typeNumber - 1]
    },
    getMask: function(maskPattern, i, j) {
      switch (maskPattern) {
        case QRMaskPattern.PATTERN000:
          return (i + j) % 2 == 0
        case QRMaskPattern.PATTERN001:
          return i % 2 == 0
        case QRMaskPattern.PATTERN010:
          return j % 3 == 0
        case QRMaskPattern.PATTERN011:
          return (i + j) % 3 == 0
        case QRMaskPattern.PATTERN100:
          return (Math.floor(i / 2) + Math.floor(j / 3)) % 2 == 0
        case QRMaskPattern.PATTERN101:
          return ((i * j) % 2) + ((i * j) % 3) == 0
        case QRMaskPattern.PATTERN110:
          return (((i * j) % 2) + ((i * j) % 3)) % 2 == 0
        case QRMaskPattern.PATTERN111:
          return (((i * j) % 3) + ((i + j) % 2)) % 2 == 0
        default:
          throw new Error('bad maskPattern:' + maskPattern)
      }
    },
    getErrorCorrectPolynomial: function(errorCorrectLength) {
      var a = new QRPolynomial([1], 0)
      for (var i = 0; i < errorCorrectLength; i++) {
        a = a.multiply(new QRPolynomial([1, QRMath.gexp(i)], 0))
      }
      return a
    },
    getLengthInBits: function(mode, type) {
      if (1 <= type && type < 10) {
        switch (mode) {
          case QRMode.MODE_NUMBER:
            return 10
          case QRMode.MODE_ALPHA_NUM:
            return 9
          case QRMode.MODE_8BIT_BYTE:
            return 8
          case QRMode.MODE_KANJI:
            return 8
          default:
            throw new Error('mode:' + mode)
        }
      } else if (type < 27) {
        switch (mode) {
          case QRMode.MODE_NUMBER:
            return 12
          case QRMode.MODE_ALPHA_NUM:
            return 11
          case QRMode.MODE_8BIT_BYTE:
            return 16
          case QRMode.MODE_KANJI:
            return 10
          default:
            throw new Error('mode:' + mode)
        }
      } else if (type < 41) {
        switch (mode) {
          case QRMode.MODE_NUMBER:
            return 14
          case QRMode.MODE_ALPHA_NUM:
            return 13
          case QRMode.MODE_8BIT_BYTE:
            return 16
          case QRMode.MODE_KANJI:
            return 12
          default:
            throw new Error('mode:' + mode)
        }
      } else {
        throw new Error('type:' + type)
      }
    },
    getLostPoint: function(qrCode) {
      var moduleCount = qrCode.getModuleCount()
      var lostPoint = 0
      for (var row = 0; row < moduleCount; row++) {
        for (var col = 0; col < moduleCount; col++) {
          var sameCount = 0
          var dark = qrCode.isDark(row, col)
          for (var r = -1; r <= 1; r++) {
            if (row + r < 0 || moduleCount <= row + r) {
              continue
            }
            for (var c = -1; c <= 1; c++) {
              if (col + c < 0 || moduleCount <= col + c) {
                continue
              }
              if (r == 0 && c == 0) {
                continue
              }
              if (dark == qrCode.isDark(row + r, col + c)) {
                sameCount++
              }
            }
          }
          if (sameCount > 5) {
            lostPoint += 3 + sameCount - 5
          }
        }
      }
      for (var row = 0; row < moduleCount - 1; row++) {
        for (var col = 0; col < moduleCount - 1; col++) {
          var count = 0
          if (qrCode.isDark(row, col)) count++
          if (qrCode.isDark(row + 1, col)) count++
          if (qrCode.isDark(row, col + 1)) count++
          if (qrCode.isDark(row + 1, col + 1)) count++
          if (count == 0 || count == 4) {
            lostPoint += 3
          }
        }
      }
      for (var row = 0; row < moduleCount; row++) {
        for (var col = 0; col < moduleCount - 6; col++) {
          if (
            qrCode.isDark(row, col) &&
            !qrCode.isDark(row, col + 1) &&
            qrCode.isDark(row, col + 2) &&
            qrCode.isDark(row, col + 3) &&
            qrCode.isDark(row, col + 4) &&
            !qrCode.isDark(row, col + 5) &&
            qrCode.isDark(row, col + 6)
          ) {
            lostPoint += 40
          }
        }
      }
      for (var col = 0; col < moduleCount; col++) {
        for (var row = 0; row < moduleCount - 6; row++) {
          if (
            qrCode.isDark(row, col) &&
            !qrCode.isDark(row + 1, col) &&
            qrCode.isDark(row + 2, col) &&
            qrCode.isDark(row + 3, col) &&
            qrCode.isDark(row + 4, col) &&
            !qrCode.isDark(row + 5, col) &&
            qrCode.isDark(row + 6, col)
          ) {
            lostPoint += 40
          }
        }
      }
      var darkCount = 0
      for (var col = 0; col < moduleCount; col++) {
        for (var row = 0; row < moduleCount; row++) {
          if (qrCode.isDark(row, col)) {
            darkCount++
          }
        }
      }
      var ratio =
        Math.abs((100 * darkCount) / moduleCount / moduleCount - 50) / 5
      lostPoint += ratio * 10
      return lostPoint
    }
  }
  var QRMath = {
    glog: function(n) {
      if (n < 1) {
        throw new Error('glog(' + n + ')')
      }
      return QRMath.LOG_TABLE[n]
    },
    gexp: function(n) {
      while (n < 0) {
        n += 255
      }
      while (n >= 256) {
        n -= 255
      }
      return QRMath.EXP_TABLE[n]
    },
    EXP_TABLE: new Array(256),
    LOG_TABLE: new Array(256)
  }
  for (var i = 0; i < 8; i++) {
    QRMath.EXP_TABLE[i] = 1 << i
  }
  for (var i = 8; i < 256; i++) {
    QRMath.EXP_TABLE[i] =
      QRMath.EXP_TABLE[i - 4] ^
      QRMath.EXP_TABLE[i - 5] ^
      QRMath.EXP_TABLE[i - 6] ^
      QRMath.EXP_TABLE[i - 8]
  }
  for (var i = 0; i < 255; i++) {
    QRMath.LOG_TABLE[QRMath.EXP_TABLE[i]] = i
  }
  function QRPolynomial(num, shift) {
    if (num.length == undefined) {
      throw new Error(num.length + '/' + shift)
    }
    var offset = 0
    while (offset < num.length && num[offset] == 0) {
      offset++
    }
    this.num = new Array(num.length - offset + shift)
    for (var i = 0; i < num.length - offset; i++) {
      this.num[i] = num[i + offset]
    }
  }

  QRPolynomial.prototype = {
    get: function(index) {
      return this.num[index]
    },
    getLength: function() {
      return this.num.length
    },
    multiply: function(e) {
      var num = new Array(this.getLength() + e.getLength() - 1)
      for (var i = 0; i < this.getLength(); i++) {
        for (var j = 0; j < e.getLength(); j++) {
          num[i + j] ^= QRMath.gexp(
            QRMath.glog(this.get(i)) + QRMath.glog(e.get(j))
          )
        }
      }
      return new QRPolynomial(num, 0)
    },
    mod: function(e) {
      if (this.getLength() - e.getLength() < 0) {
        return this
      }
      var ratio = QRMath.glog(this.get(0)) - QRMath.glog(e.get(0))
      var num = new Array(this.getLength())
      for (var i = 0; i < this.getLength(); i++) {
        num[i] = this.get(i)
      }
      for (var i = 0; i < e.getLength(); i++) {
        num[i] ^= QRMath.gexp(QRMath.glog(e.get(i)) + ratio)
      }
      return new QRPolynomial(num, 0).mod(e)
    }
  }
  function QRRSBlock(totalCount, dataCount) {
    this.totalCount = totalCount
    this.dataCount = dataCount
  }

  QRRSBlock.RS_BLOCK_TABLE = [
    [1, 26, 19],
    [1, 26, 16],
    [1, 26, 13],
    [1, 26, 9],
    [1, 44, 34],
    [1, 44, 28],
    [1, 44, 22],
    [1, 44, 16],
    [1, 70, 55],
    [1, 70, 44],
    [2, 35, 17],
    [2, 35, 13],
    [1, 100, 80],
    [2, 50, 32],
    [2, 50, 24],
    [4, 25, 9],
    [1, 134, 108],
    [2, 67, 43],
    [2, 33, 15, 2, 34, 16],
    [2, 33, 11, 2, 34, 12],
    [2, 86, 68],
    [4, 43, 27],
    [4, 43, 19],
    [4, 43, 15],
    [2, 98, 78],
    [4, 49, 31],
    [2, 32, 14, 4, 33, 15],
    [4, 39, 13, 1, 40, 14],
    [2, 121, 97],
    [2, 60, 38, 2, 61, 39],
    [4, 40, 18, 2, 41, 19],
    [4, 40, 14, 2, 41, 15],
    [2, 146, 116],
    [3, 58, 36, 2, 59, 37],
    [4, 36, 16, 4, 37, 17],
    [4, 36, 12, 4, 37, 13],
    [2, 86, 68, 2, 87, 69],
    [4, 69, 43, 1, 70, 44],
    [6, 43, 19, 2, 44, 20],
    [6, 43, 15, 2, 44, 16],
    [4, 101, 81],
    [1, 80, 50, 4, 81, 51],
    [4, 50, 22, 4, 51, 23],
    [3, 36, 12, 8, 37, 13],
    [2, 116, 92, 2, 117, 93],
    [6, 58, 36, 2, 59, 37],
    [4, 46, 20, 6, 47, 21],
    [7, 42, 14, 4, 43, 15],
    [4, 133, 107],
    [8, 59, 37, 1, 60, 38],
    [8, 44, 20, 4, 45, 21],
    [12, 33, 11, 4, 34, 12],
    [3, 145, 115, 1, 146, 116],
    [4, 64, 40, 5, 65, 41],
    [11, 36, 16, 5, 37, 17],
    [11, 36, 12, 5, 37, 13],
    [5, 109, 87, 1, 110, 88],
    [5, 65, 41, 5, 66, 42],
    [5, 54, 24, 7, 55, 25],
    [11, 36, 12],
    [5, 122, 98, 1, 123, 99],
    [7, 73, 45, 3, 74, 46],
    [15, 43, 19, 2, 44, 20],
    [3, 45, 15, 13, 46, 16],
    [1, 135, 107, 5, 136, 108],
    [10, 74, 46, 1, 75, 47],
    [1, 50, 22, 15, 51, 23],
    [2, 42, 14, 17, 43, 15],
    [5, 150, 120, 1, 151, 121],
    [9, 69, 43, 4, 70, 44],
    [17, 50, 22, 1, 51, 23],
    [2, 42, 14, 19, 43, 15],
    [3, 141, 113, 4, 142, 114],
    [3, 70, 44, 11, 71, 45],
    [17, 47, 21, 4, 48, 22],
    [9, 39, 13, 16, 40, 14],
    [3, 135, 107, 5, 136, 108],
    [3, 67, 41, 13, 68, 42],
    [15, 54, 24, 5, 55, 25],
    [15, 43, 15, 10, 44, 16],
    [4, 144, 116, 4, 145, 117],
    [17, 68, 42],
    [17, 50, 22, 6, 51, 23],
    [19, 46, 16, 6, 47, 17],
    [2, 139, 111, 7, 140, 112],
    [17, 74, 46],
    [7, 54, 24, 16, 55, 25],
    [34, 37, 13],
    [4, 151, 121, 5, 152, 122],
    [4, 75, 47, 14, 76, 48],
    [11, 54, 24, 14, 55, 25],
    [16, 45, 15, 14, 46, 16],
    [6, 147, 117, 4, 148, 118],
    [6, 73, 45, 14, 74, 46],
    [11, 54, 24, 16, 55, 25],
    [30, 46, 16, 2, 47, 17],
    [8, 132, 106, 4, 133, 107],
    [8, 75, 47, 13, 76, 48],
    [7, 54, 24, 22, 55, 25],
    [22, 45, 15, 13, 46, 16],
    [10, 142, 114, 2, 143, 115],
    [19, 74, 46, 4, 75, 47],
    [28, 50, 22, 6, 51, 23],
    [33, 46, 16, 4, 47, 17],
    [8, 152, 122, 4, 153, 123],
    [22, 73, 45, 3, 74, 46],
    [8, 53, 23, 26, 54, 24],
    [12, 45, 15, 28, 46, 16],
    [3, 147, 117, 10, 148, 118],
    [3, 73, 45, 23, 74, 46],
    [4, 54, 24, 31, 55, 25],
    [11, 45, 15, 31, 46, 16],
    [7, 146, 116, 7, 147, 117],
    [21, 73, 45, 7, 74, 46],
    [1, 53, 23, 37, 54, 24],
    [19, 45, 15, 26, 46, 16],
    [5, 145, 115, 10, 146, 116],
    [19, 75, 47, 10, 76, 48],
    [15, 54, 24, 25, 55, 25],
    [23, 45, 15, 25, 46, 16],
    [13, 145, 115, 3, 146, 116],
    [2, 74, 46, 29, 75, 47],
    [42, 54, 24, 1, 55, 25],
    [23, 45, 15, 28, 46, 16],
    [17, 145, 115],
    [10, 74, 46, 23, 75, 47],
    [10, 54, 24, 35, 55, 25],
    [19, 45, 15, 35, 46, 16],
    [17, 145, 115, 1, 146, 116],
    [14, 74, 46, 21, 75, 47],
    [29, 54, 24, 19, 55, 25],
    [11, 45, 15, 46, 46, 16],
    [13, 145, 115, 6, 146, 116],
    [14, 74, 46, 23, 75, 47],
    [44, 54, 24, 7, 55, 25],
    [59, 46, 16, 1, 47, 17],
    [12, 151, 121, 7, 152, 122],
    [12, 75, 47, 26, 76, 48],
    [39, 54, 24, 14, 55, 25],
    [22, 45, 15, 41, 46, 16],
    [6, 151, 121, 14, 152, 122],
    [6, 75, 47, 34, 76, 48],
    [46, 54, 24, 10, 55, 25],
    [2, 45, 15, 64, 46, 16],
    [17, 152, 122, 4, 153, 123],
    [29, 74, 46, 14, 75, 47],
    [49, 54, 24, 10, 55, 25],
    [24, 45, 15, 46, 46, 16],
    [4, 152, 122, 18, 153, 123],
    [13, 74, 46, 32, 75, 47],
    [48, 54, 24, 14, 55, 25],
    [42, 45, 15, 32, 46, 16],
    [20, 147, 117, 4, 148, 118],
    [40, 75, 47, 7, 76, 48],
    [43, 54, 24, 22, 55, 25],
    [10, 45, 15, 67, 46, 16],
    [19, 148, 118, 6, 149, 119],
    [18, 75, 47, 31, 76, 48],
    [34, 54, 24, 34, 55, 25],
    [20, 45, 15, 61, 46, 16]
  ]
  QRRSBlock.getRSBlocks = function(typeNumber, errorCorrectLevel) {
    var rsBlock = QRRSBlock.getRsBlockTable(typeNumber, errorCorrectLevel)
    if (rsBlock == undefined) {
      throw new Error(
        'bad rs block @ typeNumber:' +
          typeNumber +
          '/errorCorrectLevel:' +
          errorCorrectLevel
      )
    }
    var length = rsBlock.length / 3
    var list = []
    for (var i = 0; i < length; i++) {
      var count = rsBlock[i * 3 + 0]
      var totalCount = rsBlock[i * 3 + 1]
      var dataCount = rsBlock[i * 3 + 2]
      for (var j = 0; j < count; j++) {
        list.push(new QRRSBlock(totalCount, dataCount))
      }
    }
    return list
  }
  QRRSBlock.getRsBlockTable = function(typeNumber, errorCorrectLevel) {
    switch (errorCorrectLevel) {
      case QRErrorCorrectLevel.L:
        return QRRSBlock.RS_BLOCK_TABLE[(typeNumber - 1) * 4 + 0]
      case QRErrorCorrectLevel.M:
        return QRRSBlock.RS_BLOCK_TABLE[(typeNumber - 1) * 4 + 1]
      case QRErrorCorrectLevel.Q:
        return QRRSBlock.RS_BLOCK_TABLE[(typeNumber - 1) * 4 + 2]
      case QRErrorCorrectLevel.H:
        return QRRSBlock.RS_BLOCK_TABLE[(typeNumber - 1) * 4 + 3]
      default:
        return undefined
    }
  }
  function QRBitBuffer() {
    this.buffer = []
    this.length = 0
  }

  QRBitBuffer.prototype = {
    get: function(index) {
      var bufIndex = Math.floor(index / 8)
      return ((this.buffer[bufIndex] >>> (7 - (index % 8))) & 1) == 1
    },
    put: function(num, length) {
      for (var i = 0; i < length; i++) {
        this.putBit(((num >>> (length - i - 1)) & 1) == 1)
      }
    },
    getLengthInBits: function() {
      return this.length
    },
    putBit: function(bit) {
      var bufIndex = Math.floor(this.length / 8)
      if (this.buffer.length <= bufIndex) {
        this.buffer.push(0)
      }
      if (bit) {
        this.buffer[bufIndex] |= 0x80 >>> this.length % 8
      }
      this.length++
    }
  }
  var QRCodeLimitLength = [
    [17, 14, 11, 7],
    [32, 26, 20, 14],
    [53, 42, 32, 24],
    [78, 62, 46, 34],
    [106, 84, 60, 44],
    [134, 106, 74, 58],
    [154, 122, 86, 64],
    [192, 152, 108, 84],
    [230, 180, 130, 98],
    [271, 213, 151, 119],
    [321, 251, 177, 137],
    [367, 287, 203, 155],
    [425, 331, 241, 177],
    [458, 362, 258, 194],
    [520, 412, 292, 220],
    [586, 450, 322, 250],
    [644, 504, 364, 280],
    [718, 560, 394, 310],
    [792, 624, 442, 338],
    [858, 666, 482, 382],
    [929, 711, 509, 403],
    [1003, 779, 565, 439],
    [1091, 857, 611, 461],
    [1171, 911, 661, 511],
    [1273, 997, 715, 535],
    [1367, 1059, 751, 593],
    [1465, 1125, 805, 625],
    [1528, 1190, 868, 658],
    [1628, 1264, 908, 698],
    [1732, 1370, 982, 742],
    [1840, 1452, 1030, 790],
    [1952, 1538, 1112, 842],
    [2068, 1628, 1168, 898],
    [2188, 1722, 1228, 958],
    [2303, 1809, 1283, 983],
    [2431, 1911, 1351, 1051],
    [2563, 1989, 1423, 1093],
    [2699, 2099, 1499, 1139],
    [2809, 2213, 1579, 1219],
    [2953, 2331, 1663, 1273]
  ]

  function _isSupportCanvas() {
    return typeof CanvasRenderingContext2D != 'undefined'
  }

  var Drawing = !_isSupportCanvas()
    ? (function() {
        var Drawing = function(htOption) {
          this._htOption = htOption
        }

        Drawing.prototype.draw = function(oQRCode) {
          var _htOption = this._htOption
          var nCount = oQRCode.getModuleCount()
          var nWidth = Math.floor(_htOption.size / nCount)
          var nHeight = Math.floor(_htOption.size / nCount)
          var aHTML = ['<table style="border:0;border-collapse:collapse;">']

          for (var row = 0; row < nCount; row++) {
            aHTML.push('<tr>')

            for (var col = 0; col < nCount; col++) {
              aHTML.push(
                '<td style="border:0;border-collapse:collapse;padding:0;margin:0;width:' +
                  nWidth +
                  'px;height:' +
                  nHeight +
                  'px;background-color:' +
                  (oQRCode.isDark(row, col)
                    ? _htOption.colorDark
                    : _htOption.colorLight) +
                  ';"></td>'
              )
            }

            aHTML.push('</tr>')
          }

          aHTML.push('</table>')

          var nLeftMarginTable = (_htOption.size - elTable.offsetWidth) / 2
          var nTopMarginTable = (_htOption.size - elTable.offsetHeight) / 2

          if (nLeftMarginTable > 0 && nTopMarginTable > 0) {
            elTable.style.margin =
              nTopMarginTable + 'px ' + nLeftMarginTable + 'px'
          }
        }

        Drawing.prototype.clear = function() {}

        return Drawing
      })()
    : (function() {
        // Drawing in Canvas
        function _onMakeImage() {
          this._elImage.src = this._elCanvas.toDataURL('image/png')
          this._elImage.style.display = 'block'
          this._elCanvas.style.display = 'none'
        }

        function _safeSetDataURI(fSuccess, fFail) {
          var self = this
          self._fFail = fFail
          self._fSuccess = fSuccess

          // Check it just once
          if (self._bSupportDataURI === null) {
            var el = document.createElement('img')
            var fOnError = function() {
              self._bSupportDataURI = false

              if (self._fFail) {
                self._fFail.call(self)
              }
            }
            var fOnSuccess = function() {
              self._bSupportDataURI = true

              if (self._fSuccess) {
                self._fSuccess.call(self)
              }
            }

            el.onabort = fOnError
            el.onerror = fOnError
            el.onload = fOnSuccess
            el.src =
              'data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAHElEQVQI12P4//8/w38GIAXDIBKE0DHxgljNBAAO9TXL0Y4OHwAAAABJRU5ErkJggg==' // the Image contains 1px data.
            return
          } else if (self._bSupportDataURI === true && self._fSuccess) {
            self._fSuccess.call(self)
          } else if (self._bSupportDataURI === false && self._fFail) {
            self._fFail.call(self)
          }
        }

        var Drawing = function(htOption) {
          this._bIsPainted = false

          this._htOption = htOption
          this._elCanvas = document.createElement('canvas')
          this._elCanvas.width = htOption.size
          this._elCanvas.height = htOption.size
          this._oContext = this._elCanvas.getContext('2d')
          this._bIsPainted = false
          this._elImage = document.createElement('img')
          this._elImage.alt = 'Scan me!'
          this._elImage.style.display = 'none'
          this._bSupportDataURI = null
          this._callback = htOption.callback
          this._bindElement = htOption.bindElement
        }

        Drawing.prototype.draw = function(oQRCode) {
          var _elImage = this._elImage
          var _tCanvas = document.createElement('canvas')
          var _oContext = _tCanvas.getContext('2d')
          // var _oContext = this._oContext;
          var _htOption = this._htOption

          var nCount = oQRCode.getModuleCount()
          var rawSize = _htOption.size
          var rawMargin = _htOption.margin

          if (rawMargin < 0 || rawMargin * 2 >= rawSize) {
            rawMargin = 0
          }

          var margin = Math.ceil(rawMargin)

          var rawViewportSize = rawSize - 2 * rawMargin

          var whiteMargin = _htOption.whiteMargin
          var backgroundDimming = _htOption.backgroundDimming
          var rawWidth = rawViewportSize / nCount
          var rawHeight = rawWidth
          var nWidth = Math.ceil(rawWidth)
          var nHeight = nWidth
          var viewportSize = nWidth * nCount
          var size = viewportSize + 2 * margin

          _tCanvas.width = size
          _tCanvas.height = size

          // We've banned these naughty log outputs
          // console.log("rawSize=" + rawSize + ", drawSize=" + size);
          // console.log("rawViewportSize=" + rawViewportSize + ", drawViewportSize=" + viewportSize);
          // console.log("rawWidth=rawHeight=" + rawWidth + ", drawWidth=drawHeight=" + nWidth);

          var dotScale = _htOption.dotScale
          _elImage.style.display = 'none'
          this.clear()

          if (dotScale <= 0 || dotScale > 1) {
            dotScale = 0.35
          }

          _oContext.save()
          _oContext.translate(margin, margin)

          //_oContext.rect(whiteMargin ? 0 : -margin, whiteMargin ? 0 : -margin, size, size);
          //_oContext.fillStyle = "#ffffff";
          //_oContext.fill();

          var _bkgCanvas = document.createElement('canvas')
          _bkgCanvas.width = size
          _bkgCanvas.height = size
          var _bContext = _bkgCanvas.getContext('2d')

          var _maskCanvas = undefined
          var _mContext = undefined

          if (_htOption.backgroundImage !== undefined) {
            if (_htOption.autoColor) {
              var avgRGB = getAverageRGB(_htOption.backgroundImage)
              _htOption.colorDark =
                'rgb(' + avgRGB.r + ', ' + avgRGB.g + ', ' + avgRGB.b + ')'
            }

            if (_htOption.maskedDots) {
              _maskCanvas = document.createElement('canvas')
              _maskCanvas.width = size
              _maskCanvas.height = size
              _mContext = _maskCanvas.getContext('2d')
              /*
                     _mContext.drawImage(_htOption.backgroundImage,
                     0, 0, _htOption.backgroundImage.width, _htOption.backgroundImage.height,
                     whiteMargin ? 0 : -margin, whiteMargin ? 0 : -margin, whiteMargin ? viewportSize : size, whiteMargin ? viewportSize : size);
                     */
              _mContext.drawImage(
                _htOption.backgroundImage,
                0,
                0,
                _htOption.backgroundImage.width,
                _htOption.backgroundImage.height,
                0,
                0,
                size,
                size
              )

              _bContext.rect(0, 0, size, size)
              _bContext.fillStyle = '#ffffff'
              _bContext.fill()
            } else {
              /*
                     _bContext.drawImage(_htOption.backgroundImage,
                     0, 0, _htOption.backgroundImage.width, _htOption.backgroundImage.height,
                     whiteMargin ? 0 : -margin, whiteMargin ? 0 : -margin, whiteMargin ? viewportSize : size, whiteMargin ? viewportSize : size);
                     */
              _bContext.drawImage(
                _htOption.backgroundImage,
                0,
                0,
                _htOption.backgroundImage.width,
                _htOption.backgroundImage.height,
                0,
                0,
                size,
                size
              )
              _bContext.rect(0, 0, size, size)
              _bContext.fillStyle = backgroundDimming
              _bContext.fill()
            }
          } else {
            _bContext.rect(0, 0, size, size)
            _bContext.fillStyle = '#ffffff'
            _bContext.fill()
          }

          if (_htOption.binarize) {
            _htOption.colorDark = '#000000'
            _htOption.colorLight = '#FFFFFF'
          }

          var agnPatternCenter = QRUtil.getPatternPosition(oQRCode.typeNumber)

          var xyOffset = (1 - dotScale) * 0.5
          for (var row = 0; row < nCount; row++) {
            for (var col = 0; col < nCount; col++) {
              var bIsDark = oQRCode.isDark(row, col)

              // var isBlkPosCtr = ((col < 8 && (row < 8 || row >= nCount - 8)) || (col >= nCount - 8 && row < 8) || (col < nCount - 4 && col >= nCount - 4 - 5 && row < nCount - 4 && row >= nCount - 4 - 5));
              var isBlkPosCtr =
                (col < 8 && (row < 8 || row >= nCount - 8)) ||
                (col >= nCount - 8 && row < 8)
              var isBlkPos =
                (col < 7 && (row < 7 || row >= nCount - 7)) ||
                (col >= nCount - 7 && row < 7)
              var bProtected = row === 6 || col === 6 || isBlkPosCtr

              for (var i = 0; i < agnPatternCenter.length - 1; i++) {
                bProtected =
                  bProtected ||
                  (row >= agnPatternCenter[i] - 2 &&
                    row <= agnPatternCenter[i] + 2 &&
                    col >= agnPatternCenter[i] - 2 &&
                    col <= agnPatternCenter[i] + 2)
              }

              var nLeft = col * nWidth + (bProtected ? 0 : xyOffset * nWidth)
              var nTop = row * nHeight + (bProtected ? 0 : xyOffset * nHeight)
              _oContext.strokeStyle = bIsDark
                ? _htOption.colorDark
                : _htOption.colorLight
              _oContext.lineWidth = 0.5
              _oContext.fillStyle = bIsDark
                ? _htOption.colorDark
                : 'rgba(255, 255, 255, 0.6)' //_htOption.colorLight;
              if (agnPatternCenter.length === 0) {
                // if align pattern list is empty, then it means that we don't need to leave room for the align patterns
                if (!bProtected)
                  fillRect_(
                    _oContext,
                    nLeft,
                    nTop,
                    (bProtected ? (isBlkPosCtr ? 1 : 1) : dotScale) * nWidth,
                    (bProtected ? (isBlkPosCtr ? 1 : 1) : dotScale) * nHeight,
                    _maskCanvas,
                    bIsDark
                  )
              } else {
                var inAgnRange =
                  col < nCount - 4 &&
                  col >= nCount - 4 - 5 &&
                  row < nCount - 4 &&
                  row >= nCount - 4 - 5
                if (!bProtected && !inAgnRange)
                  fillRect_(
                    _oContext,
                    nLeft,
                    nTop,
                    (bProtected ? (isBlkPosCtr ? 1 : 1) : dotScale) * nWidth,
                    (bProtected ? (isBlkPosCtr ? 1 : 1) : dotScale) * nHeight,
                    _maskCanvas,
                    bIsDark
                  )
              }
            }
          }

          var protectorStyle = 'rgba(255, 255, 255, 0.6)'
          _oContext.fillStyle = protectorStyle
          /*
             fillRect_(_oContext, 0, 0, 8 * nWidth, 8 * nHeight, maskImg);
             fillRect_(_oContext, 0, (nCount - 8) * nHeight, 8 * nWidth, 8 * nHeight, maskImg);
             fillRect_(_oContext, (nCount - 8) * nWidth, 0, 8 * nWidth, 8 * nHeight, maskImg);
             fillRect_(_oContext, 8 * nWidth, 6 * nHeight, (nCount - 8 - 8) * nWidth, nHeight, maskImg);
             fillRect_(_oContext, 6 * nWidth, 8 * nHeight, nWidth, (nCount - 8 - 8) * nHeight, maskImg);
             */
          _oContext.fillRect(0, 0, 8 * nWidth, 8 * nHeight)
          _oContext.fillRect(0, (nCount - 8) * nHeight, 8 * nWidth, 8 * nHeight)
          _oContext.fillRect((nCount - 8) * nWidth, 0, 8 * nWidth, 8 * nHeight)
          _oContext.fillRect(
            8 * nWidth,
            6 * nHeight,
            (nCount - 8 - 8) * nWidth,
            nHeight
          )
          _oContext.fillRect(
            6 * nWidth,
            8 * nHeight,
            nWidth,
            (nCount - 8 - 8) * nHeight
          )

          var edgeCenter = agnPatternCenter[agnPatternCenter.length - 1]
          for (var i = 0; i < agnPatternCenter.length; i++) {
            for (var j = 0; j < agnPatternCenter.length; j++) {
              var agnX = agnPatternCenter[j]
              var agnY = agnPatternCenter[i]
              if (agnX === 6 && (agnY === 6 || agnY === edgeCenter)) {
                continue
              } else if (agnY === 6 && (agnX === 6 || agnX === edgeCenter)) {
                continue
              } else if (
                agnX !== 6 &&
                agnX !== edgeCenter &&
                agnY !== 6 &&
                agnY !== edgeCenter
              ) {
                drawAgnProtector(_oContext, agnX, agnY, nWidth, nHeight)
              } else {
                drawAgnProtector(_oContext, agnX, agnY, nWidth, nHeight)
              }
              // console.log("agnX=" + agnX + ", agnY=" + agnX);
            }
          }

          _oContext.fillStyle = _htOption.colorDark

          /*
             fillRect_(_oContext, 0, 0, 7 * nWidth, nHeight, _maskCanvas,true);
             fillRect_(_oContext, (nCount - 7) * nWidth, 0, 7 * nWidth, nHeight, _maskCanvas,true);
             fillRect_(_oContext, 0, 6 * nHeight, 7 * nWidth, nHeight, _maskCanvas,true);
             fillRect_(_oContext, (nCount - 7) * nWidth, 6 * nHeight, 7 * nWidth, nHeight, _maskCanvas,true);
             fillRect_(_oContext, 0, (nCount - 7) * nHeight, 7 * nWidth, nHeight, _maskCanvas,true);
             fillRect_(_oContext, 0, (nCount - 7 + 6) * nHeight, 7 * nWidth, nHeight, _maskCanvas,true);
             fillRect_(_oContext, 0, 0, nWidth, 7 * nHeight, _maskCanvas,true);
             fillRect_(_oContext, 6 * nWidth, 0, nWidth, 7 * nHeight, _maskCanvas,true);
             fillRect_(_oContext, (nCount - 7) * nWidth, 0, nWidth, 7 * nHeight, _maskCanvas,true);
             fillRect_(_oContext, (nCount - 7 + 6) * nWidth, 0, nWidth, 7 * nHeight, _maskCanvas,true);
             fillRect_(_oContext, 0, (nCount - 7) * nHeight, nWidth, 7 * nHeight, _maskCanvas,true);
             fillRect_(_oContext, 6 * nWidth, (nCount - 7) * nHeight, nWidth, 7 * nHeight, _maskCanvas,true);
             */

          _oContext.fillRect(0, 0, 7 * nWidth, nHeight)
          _oContext.fillRect((nCount - 7) * nWidth, 0, 7 * nWidth, nHeight)
          _oContext.fillRect(0, 6 * nHeight, 7 * nWidth, nHeight)
          _oContext.fillRect(
            (nCount - 7) * nWidth,
            6 * nHeight,
            7 * nWidth,
            nHeight
          )
          _oContext.fillRect(0, (nCount - 7) * nHeight, 7 * nWidth, nHeight)
          _oContext.fillRect(0, (nCount - 7 + 6) * nHeight, 7 * nWidth, nHeight)
          _oContext.fillRect(0, 0, nWidth, 7 * nHeight)
          _oContext.fillRect(6 * nWidth, 0, nWidth, 7 * nHeight)
          _oContext.fillRect((nCount - 7) * nWidth, 0, nWidth, 7 * nHeight)
          _oContext.fillRect((nCount - 7 + 6) * nWidth, 0, nWidth, 7 * nHeight)
          _oContext.fillRect(0, (nCount - 7) * nHeight, nWidth, 7 * nHeight)
          _oContext.fillRect(
            6 * nWidth,
            (nCount - 7) * nHeight,
            nWidth,
            7 * nHeight
          )

          _oContext.fillRect(2 * nWidth, 2 * nHeight, 3 * nWidth, 3 * nHeight)
          _oContext.fillRect(
            (nCount - 7 + 2) * nWidth,
            2 * nHeight,
            3 * nWidth,
            3 * nHeight
          )
          _oContext.fillRect(
            2 * nWidth,
            (nCount - 7 + 2) * nHeight,
            3 * nWidth,
            3 * nHeight
          )

          for (var i = 0; i < nCount - 8; i += 2) {
            _oContext.fillRect((8 + i) * nWidth, 6 * nHeight, nWidth, nHeight)
            _oContext.fillRect(6 * nWidth, (8 + i) * nHeight, nWidth, nHeight)
          }
          for (var i = 0; i < agnPatternCenter.length; i++) {
            for (var j = 0; j < agnPatternCenter.length; j++) {
              var agnX = agnPatternCenter[j]
              var agnY = agnPatternCenter[i]
              if (agnX === 6 && (agnY === 6 || agnY === edgeCenter)) {
                continue
              } else if (agnY === 6 && (agnX === 6 || agnX === edgeCenter)) {
                continue
              } else if (
                agnX !== 6 &&
                agnX !== edgeCenter &&
                agnY !== 6 &&
                agnY !== edgeCenter
              ) {
                _oContext.fillStyle = 'rgba(0, 0, 0, .2)'
                drawAgn(_oContext, agnX, agnY, nWidth, nHeight)
              } else {
                _oContext.fillStyle = _htOption.colorDark
                drawAgn(_oContext, agnX, agnY, nWidth, nHeight)
              }
            }
          }

          if (whiteMargin) {
            _oContext.fillStyle = '#FFFFFF'

            _oContext.fillRect(-margin, -margin, size, margin)
            _oContext.fillRect(-margin, viewportSize, size, margin)
            _oContext.fillRect(viewportSize, -margin, margin, size)
            _oContext.fillRect(-margin, -margin, margin, size)
          }

          if (_htOption.logoImage !== undefined) {
            var logoScale = _htOption.logoScale
            var logoMargin = _htOption.logoMargin
            var logoCornerRadius = _htOption.logoCornerRadius
            if (logoScale <= 0 || logoScale >= 1.0) {
              logoScale = 0.2
            }
            if (logoMargin < 0) {
              logoMargin = 0
            }
            if (logoCornerRadius < 0) {
              logoCornerRadius = 0
            }

            _oContext.restore()

            var logoSize = viewportSize * logoScale
            var x = 0.5 * (size - logoSize)
            var y = x

            _oContext.fillStyle = '#FFFFFF'
            _oContext.save()
            prepareRoundedCornerClip(
              _oContext,
              x - logoMargin,
              y - logoMargin,
              logoSize + 2 * logoMargin,
              logoSize + 2 * logoMargin,
              logoCornerRadius
            )
            _oContext.clip()
            _oContext.fill()
            _oContext.restore()

            _oContext.save()
            prepareRoundedCornerClip(
              _oContext,
              x,
              y,
              logoSize,
              logoSize,
              logoCornerRadius
            )
            _oContext.clip()
            _oContext.drawImage(_htOption.logoImage, x, y, logoSize, logoSize)
            _oContext.restore()
          }

          _bContext.drawImage(_tCanvas, 0, 0, size, size)
          _oContext.drawImage(_bkgCanvas, -margin, -margin, size, size)

          if (_htOption.binarize) {
            var pixels = _oContext.getImageData(0, 0, size, size)
            var threshold = 128
            if (
              parseInt(_htOption.binarizeThreshold) > 0 &&
              parseInt(_htOption.binarizeThreshold) < 255
            ) {
              threshold = parseInt(_htOption.binarizeThreshold)
            }
            for (var i = 0; i < pixels.data.length; i += 4) {
              var R = pixels.data[i] //R(0-255)
              var G = pixels.data[i + 1] //G(0-255)
              var B = pixels.data[i + 2] //G(0-255)
              var sum = rgb2gray(R, G, B)
              if (sum > threshold) {
                pixels.data[i] = 255
                pixels.data[i + 1] = 255
                pixels.data[i + 2] = 255
              } else {
                pixels.data[i] = 0
                pixels.data[i + 1] = 0
                pixels.data[i + 2] = 0
              }
            }
            _oContext.putImageData(pixels, 0, 0)
          }

          var _fCanvas = document.createElement('canvas')
          var _fContext = _fCanvas.getContext('2d')
          _fCanvas.width = rawSize
          _fCanvas.height = rawSize
          _fContext.drawImage(_tCanvas, 0, 0, rawSize, rawSize)
          this._elCanvas = _fCanvas

          this._bIsPainted = true
          if (this._callback !== undefined) {
            this._callback(this._elCanvas.toDataURL())
          }
          if (this._bindElement !== undefined) {
            try {
              var el = document.getElementById(this._bindElement)
              if (el.nodeName === 'IMG') {
                el.src = this._elCanvas.toDataURL()
              } else {
                var elStyle = el.style
                elStyle['background-image'] =
                  'url(' + this._elCanvas.toDataURL() + ')'
                elStyle['background-size'] = 'contain'
                elStyle['background-repeat'] = 'no-repeat'
              }
            } catch (e) {
              console.error(e)
            }
          }
        }

        Drawing.prototype.makeImage = function() {
          if (this._bIsPainted) {
            _safeSetDataURI.call(this, _onMakeImage)
          }
        }

        Drawing.prototype.isPainted = function() {
          return this._bIsPainted
        }

        Drawing.prototype.clear = function() {
          this._oContext.clearRect(
            0,
            0,
            this._elCanvas.width,
            this._elCanvas.height
          )
          this._bIsPainted = false
        }

        Drawing.prototype.round = function(nNumber) {
          if (!nNumber) {
            return nNumber
          }

          return Math.floor(nNumber * 1000) / 1000
        }

        return Drawing
      })()

  function prepareRoundedCornerClip(ctx, x, y, w, h, r) {
    ctx.beginPath()
    ctx.moveTo(x, y)
    ctx.arcTo(x + w, y, x + w, y + h, r)
    ctx.arcTo(x + w, y + h, x, y + h, r)
    ctx.arcTo(x, y + h, x, y, r)
    ctx.arcTo(x, y, x + w, y, r)
    ctx.closePath()
  }

  function rgb2gray(r, g, b) {
    return 0.3 * r + 0.59 * b + 0.11 * b
  }

  function fillRect_(canvas, x, y, w, h, maskSrc) {
    //console.log("maskSrc=" + maskSrc);
    if (maskSrc === undefined) {
      canvas.fillRect(x, y, w, h)
    } else {
      canvas.drawImage(maskSrc, x, y, w, h, x, y, w, h)
    }
  }

  function fillRect_(canvas, x, y, w, h, maskSrc, bDark) {
    //console.log("maskSrc=" + maskSrc);
    if (maskSrc === undefined) {
      canvas.fillRect(x, y, w, h)
    } else {
      canvas.drawImage(maskSrc, x, y, w, h, x, y, w, h)
      var fill_ = canvas.fillStyle
      canvas.fillStyle = bDark ? 'rgba(0, 0, 0, .5)' : 'rgba(255, 255, 255, .7)'
      canvas.fillRect(x, y, w, h)
      canvas.fillStyle = fill_
    }
  }

  function drawAgnProtector(context, centerX, centerY, nWidth, nHeight) {
    context.clearRect(
      (centerX - 2) * nWidth,
      (centerY - 2) * nHeight,
      5 * nWidth,
      5 * nHeight
    )
    context.fillRect(
      (centerX - 2) * nWidth,
      (centerY - 2) * nHeight,
      5 * nWidth,
      5 * nHeight
    )
  }

  function drawAgn(context, centerX, centerY, nWidth, nHeight) {
    context.fillRect(
      (centerX - 2) * nWidth,
      (centerY - 2) * nHeight,
      nWidth,
      4 * nHeight
    )
    context.fillRect(
      (centerX + 2) * nWidth,
      (centerY - 2 + 1) * nHeight,
      nWidth,
      4 * nHeight
    )
    context.fillRect(
      (centerX - 2 + 1) * nWidth,
      (centerY - 2) * nHeight,
      4 * nWidth,
      nHeight
    )
    context.fillRect(
      (centerX - 2) * nWidth,
      (centerY + 2) * nHeight,
      4 * nWidth,
      nHeight
    )
    context.fillRect(centerX * nWidth, centerY * nHeight, nWidth, nHeight)
  }

  function _getTypeNumber(sText, nCorrectLevel) {
    var nType = 1
    var length = _getUTF8Length(sText)

    for (var i = 0, len = QRCodeLimitLength.length; i <= len; i++) {
      var nLimit = 0

      switch (nCorrectLevel) {
        case QRErrorCorrectLevel.L:
          nLimit = QRCodeLimitLength[i][0]
          break
        case QRErrorCorrectLevel.M:
          nLimit = QRCodeLimitLength[i][1]
          break
        case QRErrorCorrectLevel.Q:
          nLimit = QRCodeLimitLength[i][2]
          break
        case QRErrorCorrectLevel.H:
          nLimit = QRCodeLimitLength[i][3]
          break
      }

      if (length <= nLimit) {
        break
      } else {
        nType++
      }
    }

    if (nType > QRCodeLimitLength.length) {
      throw new Error('Too long data')
    }

    return nType
  }

  function _getUTF8Length(sText) {
    var replacedText = encodeURI(sText)
      .toString()
      .replace(/\%[0-9a-fA-F]{2}/g, 'a')
    return replacedText.length + (replacedText.length != sText ? 3 : 0)
  }

  AwesomeQRCode = function() {}

  AwesomeQRCode.prototype.create = function(vOption) {
    this._htOption = {
      size: 800,
      margin: 20,
      typeNumber: 4,
      colorDark: '#000000',
      colorLight: '#ffffff',
      correctLevel: QRErrorCorrectLevel.M,
      backgroundImage: undefined,
      backgroundDimming: 'rgba(0,0,0,0)',
      logoImage: undefined,
      logoScale: 0.2,
      logoMargin: 6,
      logoCornerRadius: 8,
      whiteMargin: true,
      dotScale: 0.35,
      maskedDots: false,
      autoColor: true,
      binarize: false,
      binarizeThreshold: 128,
      callback: undefined,
      bindElement: undefined
    }

    if (typeof vOption === 'string') {
      vOption = {
        text: vOption
      }
    }

    if (vOption) {
      for (var i in vOption) {
        this._htOption[i] = vOption[i]
      }
    }

    if (this._htOption.useSVG) {
      Drawing = svgDrawer
    }

    this._oQRCode = null
    this._oDrawing = new Drawing(this._htOption)

    if (this._htOption.text) {
      this.makeCode(this._htOption.text)
    }
  }

  AwesomeQRCode.prototype.makeCode = function(sText) {
    //this._oQRCode = new QRCodeModel(_getTypeNumber(sText, this._htOption.correctLevel), this._htOption.correctLevel);
    this._oQRCode = new QRCodeModel(-1, this._htOption.correctLevel)
    this._oQRCode.addData(sText)
    this._oQRCode.make()
    this._oDrawing.draw(this._oQRCode)
    this.makeImage()
  }

  AwesomeQRCode.prototype.makeImage = function() {
    if (typeof this._oDrawing.makeImage == 'function') {
      this._oDrawing.makeImage()
    }
  }

  AwesomeQRCode.prototype.clear = function() {
    this._oDrawing.clear()
  }

  AwesomeQRCode.CorrectLevel = QRErrorCorrectLevel

  function getAverageRGB(imgEl) {
    var blockSize = 5,
      defaultRGB = {
        r: 0,
        g: 0,
        b: 0
      },
      canvas = document.createElement('canvas'),
      context = canvas.getContext && canvas.getContext('2d'),
      data,
      width,
      height,
      i = -4,
      length,
      rgb = {
        r: 0,
        g: 0,
        b: 0
      },
      count = 0

    if (!context) {
      return defaultRGB
    }

    height = canvas.height =
      imgEl.naturalHeight || imgEl.offsetHeight || imgEl.height
    width = canvas.width =
      imgEl.naturalWidth || imgEl.offsetWidth || imgEl.width

    context.drawImage(imgEl, 0, 0)

    try {
      data = context.getImageData(0, 0, width, height)
    } catch (e) {
      return defaultRGB
    }

    length = data.data.length

    while ((i += blockSize * 4) < length) {
      if (
        data.data[i] > 200 ||
        data.data[i + 1] > 200 ||
        data.data[i + 2] > 200
      )
        continue
      ++count
      rgb.r += data.data[i]
      rgb.g += data.data[i + 1]
      rgb.b += data.data[i + 2]
    }

    rgb.r = ~~(rgb.r / count)
    rgb.g = ~~(rgb.g / count)
    rgb.b = ~~(rgb.b / count)

    return rgb
  }
})()
;(function(window, factory) {
  if (true) {
    module.exports = factory
  } else if (typeof define === 'function' && define.amd) {
    define(factory)
  } else {
    window.eventUtil = factory()
  }
})(this, function() {
  return new AwesomeQRCode()
})


/***/ }),

/***/ "SldL":
/***/ (function(module, exports) {

/**
 * Copyright (c) 2014-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */

!(function(global) {
  "use strict";

  var Op = Object.prototype;
  var hasOwn = Op.hasOwnProperty;
  var undefined; // More compressible than void 0.
  var $Symbol = typeof Symbol === "function" ? Symbol : {};
  var iteratorSymbol = $Symbol.iterator || "@@iterator";
  var asyncIteratorSymbol = $Symbol.asyncIterator || "@@asyncIterator";
  var toStringTagSymbol = $Symbol.toStringTag || "@@toStringTag";

  var inModule = typeof module === "object";
  var runtime = global.regeneratorRuntime;
  if (runtime) {
    if (inModule) {
      // If regeneratorRuntime is defined globally and we're in a module,
      // make the exports object identical to regeneratorRuntime.
      module.exports = runtime;
    }
    // Don't bother evaluating the rest of this file if the runtime was
    // already defined globally.
    return;
  }

  // Define the runtime globally (as expected by generated code) as either
  // module.exports (if we're in a module) or a new, empty object.
  runtime = global.regeneratorRuntime = inModule ? module.exports : {};

  function wrap(innerFn, outerFn, self, tryLocsList) {
    // If outerFn provided and outerFn.prototype is a Generator, then outerFn.prototype instanceof Generator.
    var protoGenerator = outerFn && outerFn.prototype instanceof Generator ? outerFn : Generator;
    var generator = Object.create(protoGenerator.prototype);
    var context = new Context(tryLocsList || []);

    // The ._invoke method unifies the implementations of the .next,
    // .throw, and .return methods.
    generator._invoke = makeInvokeMethod(innerFn, self, context);

    return generator;
  }
  runtime.wrap = wrap;

  // Try/catch helper to minimize deoptimizations. Returns a completion
  // record like context.tryEntries[i].completion. This interface could
  // have been (and was previously) designed to take a closure to be
  // invoked without arguments, but in all the cases we care about we
  // already have an existing method we want to call, so there's no need
  // to create a new function object. We can even get away with assuming
  // the method takes exactly one argument, since that happens to be true
  // in every case, so we don't have to touch the arguments object. The
  // only additional allocation required is the completion record, which
  // has a stable shape and so hopefully should be cheap to allocate.
  function tryCatch(fn, obj, arg) {
    try {
      return { type: "normal", arg: fn.call(obj, arg) };
    } catch (err) {
      return { type: "throw", arg: err };
    }
  }

  var GenStateSuspendedStart = "suspendedStart";
  var GenStateSuspendedYield = "suspendedYield";
  var GenStateExecuting = "executing";
  var GenStateCompleted = "completed";

  // Returning this object from the innerFn has the same effect as
  // breaking out of the dispatch switch statement.
  var ContinueSentinel = {};

  // Dummy constructor functions that we use as the .constructor and
  // .constructor.prototype properties for functions that return Generator
  // objects. For full spec compliance, you may wish to configure your
  // minifier not to mangle the names of these two functions.
  function Generator() {}
  function GeneratorFunction() {}
  function GeneratorFunctionPrototype() {}

  // This is a polyfill for %IteratorPrototype% for environments that
  // don't natively support it.
  var IteratorPrototype = {};
  IteratorPrototype[iteratorSymbol] = function () {
    return this;
  };

  var getProto = Object.getPrototypeOf;
  var NativeIteratorPrototype = getProto && getProto(getProto(values([])));
  if (NativeIteratorPrototype &&
      NativeIteratorPrototype !== Op &&
      hasOwn.call(NativeIteratorPrototype, iteratorSymbol)) {
    // This environment has a native %IteratorPrototype%; use it instead
    // of the polyfill.
    IteratorPrototype = NativeIteratorPrototype;
  }

  var Gp = GeneratorFunctionPrototype.prototype =
    Generator.prototype = Object.create(IteratorPrototype);
  GeneratorFunction.prototype = Gp.constructor = GeneratorFunctionPrototype;
  GeneratorFunctionPrototype.constructor = GeneratorFunction;
  GeneratorFunctionPrototype[toStringTagSymbol] =
    GeneratorFunction.displayName = "GeneratorFunction";

  // Helper for defining the .next, .throw, and .return methods of the
  // Iterator interface in terms of a single ._invoke method.
  function defineIteratorMethods(prototype) {
    ["next", "throw", "return"].forEach(function(method) {
      prototype[method] = function(arg) {
        return this._invoke(method, arg);
      };
    });
  }

  runtime.isGeneratorFunction = function(genFun) {
    var ctor = typeof genFun === "function" && genFun.constructor;
    return ctor
      ? ctor === GeneratorFunction ||
        // For the native GeneratorFunction constructor, the best we can
        // do is to check its .name property.
        (ctor.displayName || ctor.name) === "GeneratorFunction"
      : false;
  };

  runtime.mark = function(genFun) {
    if (Object.setPrototypeOf) {
      Object.setPrototypeOf(genFun, GeneratorFunctionPrototype);
    } else {
      genFun.__proto__ = GeneratorFunctionPrototype;
      if (!(toStringTagSymbol in genFun)) {
        genFun[toStringTagSymbol] = "GeneratorFunction";
      }
    }
    genFun.prototype = Object.create(Gp);
    return genFun;
  };

  // Within the body of any async function, `await x` is transformed to
  // `yield regeneratorRuntime.awrap(x)`, so that the runtime can test
  // `hasOwn.call(value, "__await")` to determine if the yielded value is
  // meant to be awaited.
  runtime.awrap = function(arg) {
    return { __await: arg };
  };

  function AsyncIterator(generator) {
    function invoke(method, arg, resolve, reject) {
      var record = tryCatch(generator[method], generator, arg);
      if (record.type === "throw") {
        reject(record.arg);
      } else {
        var result = record.arg;
        var value = result.value;
        if (value &&
            typeof value === "object" &&
            hasOwn.call(value, "__await")) {
          return Promise.resolve(value.__await).then(function(value) {
            invoke("next", value, resolve, reject);
          }, function(err) {
            invoke("throw", err, resolve, reject);
          });
        }

        return Promise.resolve(value).then(function(unwrapped) {
          // When a yielded Promise is resolved, its final value becomes
          // the .value of the Promise<{value,done}> result for the
          // current iteration. If the Promise is rejected, however, the
          // result for this iteration will be rejected with the same
          // reason. Note that rejections of yielded Promises are not
          // thrown back into the generator function, as is the case
          // when an awaited Promise is rejected. This difference in
          // behavior between yield and await is important, because it
          // allows the consumer to decide what to do with the yielded
          // rejection (swallow it and continue, manually .throw it back
          // into the generator, abandon iteration, whatever). With
          // await, by contrast, there is no opportunity to examine the
          // rejection reason outside the generator function, so the
          // only option is to throw it from the await expression, and
          // let the generator function handle the exception.
          result.value = unwrapped;
          resolve(result);
        }, reject);
      }
    }

    var previousPromise;

    function enqueue(method, arg) {
      function callInvokeWithMethodAndArg() {
        return new Promise(function(resolve, reject) {
          invoke(method, arg, resolve, reject);
        });
      }

      return previousPromise =
        // If enqueue has been called before, then we want to wait until
        // all previous Promises have been resolved before calling invoke,
        // so that results are always delivered in the correct order. If
        // enqueue has not been called before, then it is important to
        // call invoke immediately, without waiting on a callback to fire,
        // so that the async generator function has the opportunity to do
        // any necessary setup in a predictable way. This predictability
        // is why the Promise constructor synchronously invokes its
        // executor callback, and why async functions synchronously
        // execute code before the first await. Since we implement simple
        // async functions in terms of async generators, it is especially
        // important to get this right, even though it requires care.
        previousPromise ? previousPromise.then(
          callInvokeWithMethodAndArg,
          // Avoid propagating failures to Promises returned by later
          // invocations of the iterator.
          callInvokeWithMethodAndArg
        ) : callInvokeWithMethodAndArg();
    }

    // Define the unified helper method that is used to implement .next,
    // .throw, and .return (see defineIteratorMethods).
    this._invoke = enqueue;
  }

  defineIteratorMethods(AsyncIterator.prototype);
  AsyncIterator.prototype[asyncIteratorSymbol] = function () {
    return this;
  };
  runtime.AsyncIterator = AsyncIterator;

  // Note that simple async functions are implemented on top of
  // AsyncIterator objects; they just return a Promise for the value of
  // the final result produced by the iterator.
  runtime.async = function(innerFn, outerFn, self, tryLocsList) {
    var iter = new AsyncIterator(
      wrap(innerFn, outerFn, self, tryLocsList)
    );

    return runtime.isGeneratorFunction(outerFn)
      ? iter // If outerFn is a generator, return the full iterator.
      : iter.next().then(function(result) {
          return result.done ? result.value : iter.next();
        });
  };

  function makeInvokeMethod(innerFn, self, context) {
    var state = GenStateSuspendedStart;

    return function invoke(method, arg) {
      if (state === GenStateExecuting) {
        throw new Error("Generator is already running");
      }

      if (state === GenStateCompleted) {
        if (method === "throw") {
          throw arg;
        }

        // Be forgiving, per 25.3.3.3.3 of the spec:
        // https://people.mozilla.org/~jorendorff/es6-draft.html#sec-generatorresume
        return doneResult();
      }

      context.method = method;
      context.arg = arg;

      while (true) {
        var delegate = context.delegate;
        if (delegate) {
          var delegateResult = maybeInvokeDelegate(delegate, context);
          if (delegateResult) {
            if (delegateResult === ContinueSentinel) continue;
            return delegateResult;
          }
        }

        if (context.method === "next") {
          // Setting context._sent for legacy support of Babel's
          // function.sent implementation.
          context.sent = context._sent = context.arg;

        } else if (context.method === "throw") {
          if (state === GenStateSuspendedStart) {
            state = GenStateCompleted;
            throw context.arg;
          }

          context.dispatchException(context.arg);

        } else if (context.method === "return") {
          context.abrupt("return", context.arg);
        }

        state = GenStateExecuting;

        var record = tryCatch(innerFn, self, context);
        if (record.type === "normal") {
          // If an exception is thrown from innerFn, we leave state ===
          // GenStateExecuting and loop back for another invocation.
          state = context.done
            ? GenStateCompleted
            : GenStateSuspendedYield;

          if (record.arg === ContinueSentinel) {
            continue;
          }

          return {
            value: record.arg,
            done: context.done
          };

        } else if (record.type === "throw") {
          state = GenStateCompleted;
          // Dispatch the exception by looping back around to the
          // context.dispatchException(context.arg) call above.
          context.method = "throw";
          context.arg = record.arg;
        }
      }
    };
  }

  // Call delegate.iterator[context.method](context.arg) and handle the
  // result, either by returning a { value, done } result from the
  // delegate iterator, or by modifying context.method and context.arg,
  // setting context.delegate to null, and returning the ContinueSentinel.
  function maybeInvokeDelegate(delegate, context) {
    var method = delegate.iterator[context.method];
    if (method === undefined) {
      // A .throw or .return when the delegate iterator has no .throw
      // method always terminates the yield* loop.
      context.delegate = null;

      if (context.method === "throw") {
        if (delegate.iterator.return) {
          // If the delegate iterator has a return method, give it a
          // chance to clean up.
          context.method = "return";
          context.arg = undefined;
          maybeInvokeDelegate(delegate, context);

          if (context.method === "throw") {
            // If maybeInvokeDelegate(context) changed context.method from
            // "return" to "throw", let that override the TypeError below.
            return ContinueSentinel;
          }
        }

        context.method = "throw";
        context.arg = new TypeError(
          "The iterator does not provide a 'throw' method");
      }

      return ContinueSentinel;
    }

    var record = tryCatch(method, delegate.iterator, context.arg);

    if (record.type === "throw") {
      context.method = "throw";
      context.arg = record.arg;
      context.delegate = null;
      return ContinueSentinel;
    }

    var info = record.arg;

    if (! info) {
      context.method = "throw";
      context.arg = new TypeError("iterator result is not an object");
      context.delegate = null;
      return ContinueSentinel;
    }

    if (info.done) {
      // Assign the result of the finished delegate to the temporary
      // variable specified by delegate.resultName (see delegateYield).
      context[delegate.resultName] = info.value;

      // Resume execution at the desired location (see delegateYield).
      context.next = delegate.nextLoc;

      // If context.method was "throw" but the delegate handled the
      // exception, let the outer generator proceed normally. If
      // context.method was "next", forget context.arg since it has been
      // "consumed" by the delegate iterator. If context.method was
      // "return", allow the original .return call to continue in the
      // outer generator.
      if (context.method !== "return") {
        context.method = "next";
        context.arg = undefined;
      }

    } else {
      // Re-yield the result returned by the delegate method.
      return info;
    }

    // The delegate iterator is finished, so forget it and continue with
    // the outer generator.
    context.delegate = null;
    return ContinueSentinel;
  }

  // Define Generator.prototype.{next,throw,return} in terms of the
  // unified ._invoke helper method.
  defineIteratorMethods(Gp);

  Gp[toStringTagSymbol] = "Generator";

  // A Generator should always return itself as the iterator object when the
  // @@iterator function is called on it. Some browsers' implementations of the
  // iterator prototype chain incorrectly implement this, causing the Generator
  // object to not be returned from this call. This ensures that doesn't happen.
  // See https://github.com/facebook/regenerator/issues/274 for more details.
  Gp[iteratorSymbol] = function() {
    return this;
  };

  Gp.toString = function() {
    return "[object Generator]";
  };

  function pushTryEntry(locs) {
    var entry = { tryLoc: locs[0] };

    if (1 in locs) {
      entry.catchLoc = locs[1];
    }

    if (2 in locs) {
      entry.finallyLoc = locs[2];
      entry.afterLoc = locs[3];
    }

    this.tryEntries.push(entry);
  }

  function resetTryEntry(entry) {
    var record = entry.completion || {};
    record.type = "normal";
    delete record.arg;
    entry.completion = record;
  }

  function Context(tryLocsList) {
    // The root entry object (effectively a try statement without a catch
    // or a finally block) gives us a place to store values thrown from
    // locations where there is no enclosing try statement.
    this.tryEntries = [{ tryLoc: "root" }];
    tryLocsList.forEach(pushTryEntry, this);
    this.reset(true);
  }

  runtime.keys = function(object) {
    var keys = [];
    for (var key in object) {
      keys.push(key);
    }
    keys.reverse();

    // Rather than returning an object with a next method, we keep
    // things simple and return the next function itself.
    return function next() {
      while (keys.length) {
        var key = keys.pop();
        if (key in object) {
          next.value = key;
          next.done = false;
          return next;
        }
      }

      // To avoid creating an additional object, we just hang the .value
      // and .done properties off the next function object itself. This
      // also ensures that the minifier will not anonymize the function.
      next.done = true;
      return next;
    };
  };

  function values(iterable) {
    if (iterable) {
      var iteratorMethod = iterable[iteratorSymbol];
      if (iteratorMethod) {
        return iteratorMethod.call(iterable);
      }

      if (typeof iterable.next === "function") {
        return iterable;
      }

      if (!isNaN(iterable.length)) {
        var i = -1, next = function next() {
          while (++i < iterable.length) {
            if (hasOwn.call(iterable, i)) {
              next.value = iterable[i];
              next.done = false;
              return next;
            }
          }

          next.value = undefined;
          next.done = true;

          return next;
        };

        return next.next = next;
      }
    }

    // Return an iterator with no values.
    return { next: doneResult };
  }
  runtime.values = values;

  function doneResult() {
    return { value: undefined, done: true };
  }

  Context.prototype = {
    constructor: Context,

    reset: function(skipTempReset) {
      this.prev = 0;
      this.next = 0;
      // Resetting context._sent for legacy support of Babel's
      // function.sent implementation.
      this.sent = this._sent = undefined;
      this.done = false;
      this.delegate = null;

      this.method = "next";
      this.arg = undefined;

      this.tryEntries.forEach(resetTryEntry);

      if (!skipTempReset) {
        for (var name in this) {
          // Not sure about the optimal order of these conditions:
          if (name.charAt(0) === "t" &&
              hasOwn.call(this, name) &&
              !isNaN(+name.slice(1))) {
            this[name] = undefined;
          }
        }
      }
    },

    stop: function() {
      this.done = true;

      var rootEntry = this.tryEntries[0];
      var rootRecord = rootEntry.completion;
      if (rootRecord.type === "throw") {
        throw rootRecord.arg;
      }

      return this.rval;
    },

    dispatchException: function(exception) {
      if (this.done) {
        throw exception;
      }

      var context = this;
      function handle(loc, caught) {
        record.type = "throw";
        record.arg = exception;
        context.next = loc;

        if (caught) {
          // If the dispatched exception was caught by a catch block,
          // then let that catch block handle the exception normally.
          context.method = "next";
          context.arg = undefined;
        }

        return !! caught;
      }

      for (var i = this.tryEntries.length - 1; i >= 0; --i) {
        var entry = this.tryEntries[i];
        var record = entry.completion;

        if (entry.tryLoc === "root") {
          // Exception thrown outside of any try block that could handle
          // it, so set the completion value of the entire function to
          // throw the exception.
          return handle("end");
        }

        if (entry.tryLoc <= this.prev) {
          var hasCatch = hasOwn.call(entry, "catchLoc");
          var hasFinally = hasOwn.call(entry, "finallyLoc");

          if (hasCatch && hasFinally) {
            if (this.prev < entry.catchLoc) {
              return handle(entry.catchLoc, true);
            } else if (this.prev < entry.finallyLoc) {
              return handle(entry.finallyLoc);
            }

          } else if (hasCatch) {
            if (this.prev < entry.catchLoc) {
              return handle(entry.catchLoc, true);
            }

          } else if (hasFinally) {
            if (this.prev < entry.finallyLoc) {
              return handle(entry.finallyLoc);
            }

          } else {
            throw new Error("try statement without catch or finally");
          }
        }
      }
    },

    abrupt: function(type, arg) {
      for (var i = this.tryEntries.length - 1; i >= 0; --i) {
        var entry = this.tryEntries[i];
        if (entry.tryLoc <= this.prev &&
            hasOwn.call(entry, "finallyLoc") &&
            this.prev < entry.finallyLoc) {
          var finallyEntry = entry;
          break;
        }
      }

      if (finallyEntry &&
          (type === "break" ||
           type === "continue") &&
          finallyEntry.tryLoc <= arg &&
          arg <= finallyEntry.finallyLoc) {
        // Ignore the finally entry if control is not jumping to a
        // location outside the try/catch block.
        finallyEntry = null;
      }

      var record = finallyEntry ? finallyEntry.completion : {};
      record.type = type;
      record.arg = arg;

      if (finallyEntry) {
        this.method = "next";
        this.next = finallyEntry.finallyLoc;
        return ContinueSentinel;
      }

      return this.complete(record);
    },

    complete: function(record, afterLoc) {
      if (record.type === "throw") {
        throw record.arg;
      }

      if (record.type === "break" ||
          record.type === "continue") {
        this.next = record.arg;
      } else if (record.type === "return") {
        this.rval = this.arg = record.arg;
        this.method = "return";
        this.next = "end";
      } else if (record.type === "normal" && afterLoc) {
        this.next = afterLoc;
      }

      return ContinueSentinel;
    },

    finish: function(finallyLoc) {
      for (var i = this.tryEntries.length - 1; i >= 0; --i) {
        var entry = this.tryEntries[i];
        if (entry.finallyLoc === finallyLoc) {
          this.complete(entry.completion, entry.afterLoc);
          resetTryEntry(entry);
          return ContinueSentinel;
        }
      }
    },

    "catch": function(tryLoc) {
      for (var i = this.tryEntries.length - 1; i >= 0; --i) {
        var entry = this.tryEntries[i];
        if (entry.tryLoc === tryLoc) {
          var record = entry.completion;
          if (record.type === "throw") {
            var thrown = record.arg;
            resetTryEntry(entry);
          }
          return thrown;
        }
      }

      // The context.catch method must only be called with a location
      // argument that corresponds to a known catch block.
      throw new Error("illegal catch attempt");
    },

    delegateYield: function(iterable, resultName, nextLoc) {
      this.delegate = {
        iterator: values(iterable),
        resultName: resultName,
        nextLoc: nextLoc
      };

      if (this.method === "next") {
        // Deliberately forget the last sent value so that we don't
        // accidentally pass it on to the delegate.
        this.arg = undefined;
      }

      return ContinueSentinel;
    }
  };
})(
  // In sloppy mode, unbound `this` refers to the global object, fallback to
  // Function constructor if we're in global strict mode. That is sadly a form
  // of indirect eval which violates Content Security Policy.
  (function() { return this })() || Function("return this")()
);


/***/ }),

/***/ "T3yJ":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";

// EXTERNAL MODULE: ./src/assets/images/1.1/imgbg.jpg
var imgbg = __webpack_require__("VrL8");
var imgbg_default = /*#__PURE__*/__webpack_require__.n(imgbg);

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/components/college/course.vue
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ var course = ({
  props: ["courseItem"],
  data: function data() {
    return {
      routeData: ''
    };
  },

  methods: {
    clickLink: function clickLink(item) {
      item.type = item.type ? item.type : item.class_type;
      item.id = item.relevanceId ? item.relevanceId : item.id;
      // if(item.jumpUrl){

      //   this.routeData = item.jumpUrl;
      // }else 
      if (item.type) {
        if (item.type == 1) {
          this.routeData = '/specialCourseDetail/' + item.id;
          //  var routeData = this.link(specialCourseDetail,item.id);
          //  alert(routeData.href)
          //  window.open(routeData.href, '_blank');
        } else if (item.type == 2) {
          this.routeData = '/seriesCourseDetail/' + item.id;
          //   var routeData = this.link('/seriesCourseDetail/',item.id);
          //  window.open(routeData.href, '_blank');
        } else {
          this.routeData = '/trainingPrevue/' + item.id;
          //   var routeData = this.link('/trainingPrevue/',item.id);
          //  window.open(routeData.href, '_blank');
        }
      } else {
        this.routeData = '/specialCourseDetail/' + item.id;
        //  var routeData = this.link(specialCourseDetail,item.id);
        // window.open(routeData.href, '_blank');
      }
      return this.routeData;
    },

    // link(path,id){
    //   let routeData = this.$router.resolve({
    //       name: 'specialCourseDetail',
    //       // query: params,
    //       params:{courseId:id}
    //     });
    //     return routeData;
    // },
    coverPic: function coverPic(coverUrl) {
      //封面图
      var url = '';
      if (coverUrl.imgUrl || coverUrl.src_img) {
        if (coverUrl.imgUrl) {
          url = coverUrl.imgUrl;
        } else {
          url = coverUrl.src_img;
        }
      } else {
        url = imgbg_default.a;
      }
      return url;
    }
  }
});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-2642e1fa","hasScoped":false,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/components/college/course.vue
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('li',{staticClass:"course-box"},[_c('router-link',{attrs:{"to":_vm.clickLink(_vm.courseItem),"target":"_blank"}},[_c('img',{attrs:{"src":_vm.coverPic(_vm.courseItem),"alt":""}}),_vm._v(" "),_c('div',[_c('h5',[(_vm.courseItem.relevanceType != 7)?[(_vm.courseItem.type == 1?_vm.courseItem.type == 1:_vm.courseItem.class_type == 1)?[_c('span',[_vm._v("专题课")])]:(_vm.courseItem.type == 2?_vm.courseItem.type == 2:_vm.courseItem.class_type == 2)?[_c('span',[_vm._v("系列课")])]:[_c('span',[_vm._v("特训课")])]]:_vm._e(),_vm._v("  \n                "+_vm._s(_vm.courseItem.class_name)+"\n            ")],2),_vm._v(" "),_c('h6',[_c('span',{staticClass:"num"},[_vm._v(_vm._s(_vm.courseItem.study_total!= undefined?_vm.courseItem.study_total:_vm.courseItem.study_num)+"学习")]),_vm._v(" "),(_vm.courseItem.type == 2?_vm.courseItem.type == 2:_vm.courseItem.class_type == 2)?_c('span',{staticClass:"serie"},[_vm._v("已更新"+_vm._s(_vm.courseItem.update_total != undefined?_vm.courseItem.update_total:_vm.courseItem.plan_num_total)+"节 | 共"+_vm._s(_vm.courseItem.plan_num)+"节")]):_vm._e()]),_vm._v(" "),_c('section',{staticClass:"info"},[_c('p',[_c('img',{attrs:{"src":_vm.courseItem.head_add,"alt":""}}),_vm._v(" "),_c('span',[_vm._v(_vm._s(_vm.courseItem.alias))])]),_vm._v(" "),(_vm.courseItem.level==2)?[(Number(_vm.courseItem.price) != 0)?_c('span',{staticClass:"price span"},[_vm._v(_vm._s(_vm.courseItem.price))]):_vm._e()]:_vm._e(),_vm._v(" "),(_vm.courseItem.level==1)?[_c('span',{staticClass:"simi span"},[_vm._v("私密课程")])]:_vm._e()],2)])])],1)}
var staticRenderFns = []
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ var college_course = (esExports);
// CONCATENATED MODULE: ./src/components/college/course.vue
function injectStyle (ssrContext) {
  __webpack_require__("TK+m")
}
var normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  course,
  college_course,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)

/* harmony default export */ var components_college_course = __webpack_exports__["a"] = (Component.exports);


/***/ }),

/***/ "TGyq":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "TK+m":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "TRz5":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/page/college/college99.vue
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

__webpack_require__("mgS3");
/* harmony default export */ var college99 = ({
  data: function data() {
    return {
      bannerData: [],
      headerOption: {
        //头部轮播图
        effect: "coverflow",
        coverflowEffect: {
          rotate: 0,
          stretch: 100,
          depth: 150,
          modifier: 2,
          slideShadows: false
        },
        autoplay: {
          delay: 5000,
          disableOnInteraction: false
        },
        // width: window.innerWidth,
        speed: 300,
        loop: false,
        fadeEffect: {
          crossFade: true
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true
        }
      },
      teacherList: '' //讲师列表
    };
  },
  created: function created() {
    this.getBanner();
    this.teacherBanner();
  },

  methods: {
    /*
    * 讲师列表
    * */
    teacherBanner: function teacherBanner() {
      var _this = this;

      this.$request.get('InstituteController/fetchTeacherBanner', '', function (res) {
        _this.teacherList = res.data;
      });
    },

    /*
    * 顶部banner
    * */
    getBanner: function getBanner() {
      var _this2 = this;

      //type: 9：99学院banner,14：专题课列表-banner，17：系列课列表-banner，20：特训班列表-banner，24：讲师介绍页列表-banner
      this.$request.get("InstituteController/fetchTopBanner", '', function (res) {
        _this2.bannerData = res.data;
      });
    }
  }
});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-19e7af10","hasScoped":false,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/page/college/college99.vue
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('main',{staticClass:"college-99"},[_c('section',{staticClass:"banner-box"},[_c('swiper',{staticClass:"top-banner",attrs:{"options":_vm.headerOption}},[_vm._l((_vm.bannerData),function(item){return [_c('swiper-slide',[_c('a',{attrs:{"href":("" + (item.adURL)),"target":"_blank"}},[_c('img',{attrs:{"src":item.adFile,"alt":""}})])])]}),_vm._v(" "),_c('div',{staticClass:"swiper-pagination",attrs:{"slot":"pagination"},slot:"pagination"})],2)],1),_vm._v(" "),_c('section',{staticClass:"vedio-dish"},[_c('router-link',{attrs:{"to":"/videoCommon/0"}},[_c('img',{attrs:{"src":__webpack_require__("W84B"),"alt":""}})])],1),_vm._v(" "),_c('section',{staticClass:"teacher-list clearfix"},_vm._l((_vm.teacherList),function(item){return _c('section',{staticClass:"item"},[_c('router-link',{attrs:{"to":("/teacherIntroduction/" + (item.relevanceId))}},[_c('img',{attrs:{"src":item.adFile,"alt":""}})]),_vm._v(" "),_c('div',{staticClass:"box"},[_c('router-link',{attrs:{"to":("/videoCommon/" + (item.video.id))}},[_c('h4',[_vm._v(_vm._s(item.video.title))])]),_vm._v(" "),_c('p',[_vm._v(_vm._s(item.video.create_time))])],1)],1)}))])}
var staticRenderFns = []
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ var college_college99 = (esExports);
// CONCATENATED MODULE: ./src/page/college/college99.vue
function injectStyle (ssrContext) {
  __webpack_require__("6gf/")
}
var normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  college99,
  college_college99,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)

/* harmony default export */ var page_college_college99 = __webpack_exports__["default"] = (Component.exports);


/***/ }),

/***/ "TzpM":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "VrL8":
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "static/img/imgbg.jpg";

/***/ }),

/***/ "W84B":
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "static/img/影音解盘.png";

/***/ }),

/***/ "WYcU":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "Wg0l":
/***/ (function(module, exports) {

module.exports = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAQCAYAAABpyU3qAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAdBJREFUeNq8VotxgzAMhTsWoCOwAivACHQEMkIYIYwQRkhGgBHCCGWEMgKVcs/tO9d2CaTRnQ7jjyw9faw4ctCyLJl8MvyOcRzP0T+R3OWaToVzc7/wr/sTOXh0HCzASp3smewNYkxLl6uMk/Ag8yX+2XhbGaW3ACC6r8e4VLkui7fQ2ZJxxHy/QuYHn994/xJ73GcQvFssyAwBV9u+vsK1GcY1EGzg9hzhN1jnJ3AoVH68SGg9QkdSvAeKSp+aH8IX/Ov3ZrxE45NwaiGuekTgguYLmv/WNbHQav7IpZMj1kvy0AS0KixXtLXmsZxr9iR14khKH11XyMsh450Ss8J8R6Ew7K1GaxWfoczZs55aBiq66oWW4nOianVA7D5N8TKwNw2s1VYi5UC1xVonoXGVkBrJM09FvA/sLT1VpSajZq3NmlD4/ww8NIdXIK4KjZ5Xrg7IH6iETeSN6GWIi9KNpzWYoVTmUbwgxcdnKW7X8d7DF7vmbnw5z2aw9+VOLKTagIFccfSRSRHPNVWjyRF6lUlQWt/TtI33/Fi2U0Yv5/JA/3Ezr6ZJWgcX1Nfkrj2xheRauicrLtaYTbmf8XSchjruCj0Jn8GLnU/IlwADAIXqAzWg/GgoAAAAAElFTkSuQmCC"

/***/ }),

/***/ "Xxa5":
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("jyFz");


/***/ }),

/***/ "YikS":
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "static/img/imgbg2.jpg";

/***/ }),

/***/ "ZOxn":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "ZzFC":
/***/ (function(module, exports) {

module.exports = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFYAAABCCAYAAADNESF6AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyFpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTQyIDc5LjE2MDkyNCwgMjAxNy8wNy8xMy0wMTowNjozOSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIChXaW5kb3dzKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDoxNjU3Mzk5NTUzNTgxMUU4ODk3QzlGMkE4Qzc2MjAyNiIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDoxNjU3Mzk5NjUzNTgxMUU4ODk3QzlGMkE4Qzc2MjAyNiI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjE2NTczOTkzNTM1ODExRTg4OTdDOUYyQThDNzYyMDI2IiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjE2NTczOTk0NTM1ODExRTg4OTdDOUYyQThDNzYyMDI2Ii8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+nBeDEAAADKBJREFUeNrsnH+QHEUVx9/rmdndu729kHBJjhiSIikxAsbEADFYiARTRoofpX9QqRIIP0qr/AGUWLGKUn4FUQEVtQipgqpYUYsqFPxHlCRoVArRQNACTIGSH5eYS8jlIJDc3f6YmW5f98zuzcxOz+7d7d5u4k3qZX7eTvdnv/P6vd7uwa2Ld8M4FoQ2XtZ9CUSry4B1gsUGHW/UIsZyvBWga4HFhP16thsBux6I9WxPKmAdWB3QuLXuXDOUGwctuBYJ53SAsQlPDpg1oOpA6kwHeLyVEAnHokDjLPZvV70C7LllWig4hvKg7pxZJ9SoMc02Nkm5OqUGjWu2g9fjtmXeDsFFHy426IvH4L5Z41uLwguu2YUDmz/cZR9Za/DipxHc+VSflFenqLm1t4Vb/7UVEyUB2Oey1B+HrAWbX5q98Q3/BEYA8z1zAIczIHqPAbw9HcSR6YnuTQcRazxFlfNBHxt3gyhQQ26fXtiX+ejg0981ReFG+hwWqChMLtjQPbmLmZ+/MeP2Ow5lrxgJ/JEY7KZPN0AMdRDgM7zK7aV1MQV4sKcCLK7dSHpKEv16kmKDai2bMaN4oGPp4FNPMmF/ss3CV2aI/A3nvPvAwoJxxjXvZpbl5cETHSAs1yNPimXdIyD6exRUsI0qV6bqfnn6xfS9czY9ZOXwGieb+tNuPvfONTvueCvBh1e5BJbgT0NAfTOXkFKZcNoN6ihdUbp4yeC6+2VZCymwDA4G48BoW9XheCcYjgFGugSGPEagjWD9HjR/Ovc7uceeTaFzM4LIWehctSh38PknLn5wUfmJ1bQrIZWzMSjWXDr49LkmL14Pbb4YYnjt4nfWnYcCDNsEs2iBQQplpFBWom2p3JGMB5jMLEP9VXHdilXs738xwF0ehiGmfbD70L2BL4DFAAYd2LiWv/JNSjut2H+dv9+2i0BVR2N64dVrCZolwZF/NUsmWBKyw4g7gklKNi0HLI6qbtbWo1+86Wy+/7eM2re4z7WYuzIGrNY3szrUWoFriNKl7QzUh0oOD4neyKUuI3BMKVZBHUmDKdcSLIE26bx5Tv7fnS+8tebhXnfwh/QJKX0KKrK+wIwEl1C53IyJ4+L8q/pWmXDnta9KRQWq/J+BM4+gWgQQfXPJDTACC6RaVc+b/ru59wsnfvN4OseX6dvxsHA1EYOIhmNmjdi1Cm5LCc4jQd0yG2B5l7e/4ziIR/oBDoyEoMoV/S/dQIoMqZHCPDVU5GMF7QsCjOtf/9b5y0s7N7Icm10n1CCvaGKCAahqbdaICkI+tqVQ5xPUzWcB5AIufiVF+RdQkHrDLhD78xWoHJmqIT3qKfKhSD6W0ePPaV+B3fDC2jXzxMG7sZul9O23FqyIBNAsADcxpY0mBsFwpHXL12aFoZYXOoZfPRPEN//jKxWVEVBwvEYLyMeyS/Y/duZFA099vdPKr8AsdkHXuHRiRrKgKNQxuwLWcrDlxz9u+fi0ClSOHlTpd+nRT8nHfkXfpgWXHti0mWUgR03wRKpi+iANP6vTNV5axepcQvuGWVKpCqgH1WUoFWvR448X7n/yVgY8N8bHXgfWrRER1JUgtI9idwzpoe54PwAXPR9LRr5VhllWtnTsgkblHglQtXFsUj8rgwZ83RNaNhylxN+tPk7H+KP9PtAyVFIsrW0vQaAwkWcblTFrsq6qrkdWo1Mak9K2SV36igBr9wJsJ3WOcM+2vwf8xjfpXMELtWSSAF5UwJkBMgmQGVcjuyIS1FrXLwhxf8ha7kj3E9x1+1X7IVCAUOGV8LMu4atVhllMKVZmXY7RUEGwOn45qfkLAiT0T7Zfw1WOg3z/yiVcBobbPLB1ZRK1erigXeGKcrEQA37W87UE1XBZQ8uNtboLa4HFOpTcRn0FZcDouwVPsQ4DJjOvBt8O6znHxgCvzeEGoFaiA6VYNglQ6268TppFIMb87u2nteQGSLEtaXRNOJkX1Km27G9V50tLxnExOEUWT7kYAQxKtVOKHbdyMRIlYDkEa5lbM+FUW3yl+tECihahZacSUxFUrtzG1imWwdQyBXYKbKvcqxDhbdG6IfOnXuNFQFGU4apOrynFTgTmaM4QzL28HZeZ+SmwE3AD5SRLbfvKZRzEQG7OrnYAO7aH5yIbYMsJgJ1DZMNkJI6dRTI6vtOlc/RxFzUp6hExcAPGZN832VPLvvxrh1kjrQIrxlYNf7mLQPYk/GmPvAabrtRwB6l3jNTKJdyX56/q//Gn1t/TP23eToeZhcZ9lfrjZp0XTqwJwElyBco4KZWRcekKFFiDbMf8yw5u/9BlP8mngd3y2o8+ceXRLddaIDobCDd0jtW4KDQUnIrtVF11XwfAOwnkBsjWiyZDDTRaPlzKZQsGB5eMI63pGocg26Ri5+Glt79w2/IH73o7M+vNcUKtNTunSrEiATCV0DpsiOKZobN/tQA+k4PkOQi8eVDL49AqftUzF9NHTZcU68GV/halSRXLAr1y+pK3r565+YHv7/veZy/hOz/P6gs9g+O2xtV4xU1i4Hmz+6W2jAhGwyvfBXAYsXpfJ5AOQZVmS2PSBJQIbokuLblgFr+x8M5n7u69bf17LHcw6R5csDxUT3OKm9wRApuk1MqHHcp+5HdNld+41AqjoZUP1eCC7ztt9VZSrG05YJscSoargBbLYAmyhFsUCIVnulfuvrpnw7dfZWc/O5pehJd3irmXITxVRws1LirQmfrAvtyFu4esnt+3V3IQgOy7gePps7b1nXb5HqlWCdckuBaBpX0JlGJBKNAfyOigWDZS7PD16ft/9rj7ufsKIjUYvIUr2NAv9q7cCNVzooSuoTeum32rbqZMdMaMGid7pHPRq2eM7DrPFKVe/XSn5luwGxtx9P55q+dff56/8QeOmS66DEq2CY60YgocxwAuR3Y7phory7k0JEBkpFwF7WVx7uHn7Y/9YUXnrpldmeLsAZix49EDV93zy76Ve+g8Befg+OYGLApbTaCrmh0Do6O3U76lyTJkHdIsnu86f+CJr+Tsw6u9H59bM4FO+EDVPyJ9PLXguRfnPvTY+5mZQyULikMdYJ/oAOdEJ7jHuoAfzwIOZQCHO9T0JObPQzAIrsFZaPiQCNzU8YGWAgov+WYHYAchCzMhlIijo25ks47C33pv3vCB4X9umTv0j9VZZ3CJwfOzqG7G5HoBo+iwzsFhc87rB7qv3Hag+4o9DlOPvGysHOlfUw6tXXDTNsWzLggVHVCoi0KNObBpbcq5IBAelwWBejsBuE6MSmPDLrNGg8UjkrdhdCgj9meX7iV73Fd1Well99HIUTTRL11VjGNFUSVSnF1ulPwIoET+VZpjuCoyELQtyqGXLCftyyFILlaPIASNaquUqWvEgpMVMKbBKg+ydQJ+1o4pgAgUIO7bbyTYyhNEgFwfrnpUZQJAbVdJRgGuH2LJxovU6pByORlI1aKvWkZuwMaQWFikrGNVbaxio3CjbsCB6kFhQai6OVBNA1sxVFlVyWXemlNYZbgKqpOyyR1YlCRQsiATBnILQC6CmRZg0RvMId2CAdVDVqMcnEjDlRh6mQGgUVeAgQrEDQIL3tQMgGWTBLasWkeqlk6oBIDgqrWBnloJpEPhFpc+1vLgKj8rYwpaK19rm6HGOwgW4toYjWJjXYEu84oDG1WqC6NTlljQB0Njh4DGlUspSaatUq1qm9wBXWFzT73SXHINbkcJeKakfKyg64HcAlL4xfzxs9GZQhBxByJwP10sG5oNbmr6CURChiViHLsRcQPBAk5UtVE1xDasssNFloVAuUJOmJENFm0TTIciBV6wSLUENuV3I/nTlZSvhfiR63FtDk9IEATU8YaNuJl3ToJaGdSe+NDIqEDEBLgKLD3qrkwCZMBPLsAhl8AtS7kB6QJUZJAtKKiQTxNYDM0sjHvK4u4Z94qU2N6tuNdy8DpCHlfjV4NqbbQrAE02UvF7pEq1PZzxMitSLadkQXQWlWoBspTTpjx3MNgdKmecGMaSEtbd0R10CdFjLBKSYZPUWku1QpeekTLd97PqTRq8Kz9aFwKMcl++uiTGXWGd94akvgJduIURNwCRjIRBeLpj3ZMeGgxWB7iyP2248rIdKL9s58h0zx3QMTHGdqCu93rVUmw05NBBPxleDyUWHgLx2gJA+Qaj2ce0n4/jLAvUCreiMS1GKhKdPo4QnlZe69uf7Beaha5dvBf4YlpvW1Z551ZTfu9KimOxRsVO6lfwEVSuKV/DYNdqvDBB8qh5hE6ml0Y27VdOs85KoabQOvD/9685NcdZERxPBSdraYcX8/5PgAEArbkhMftLzUYAAAAASUVORK5CYII="

/***/ }),

/***/ "a0jv":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/page/index/helpDetail.vue
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ var helpDetail = ({
  data: function data() {
    return {
      helpId: this.$route.params.helpId,
      content: '',
      title: '',
      metaInfo: { //seo
        title: '',
        name: '',
        content: ''
      }
    };
  },

  name: 'async',
  metaInfo: function metaInfo() {
    return {
      title: this.metaInfo.title,
      meta: [{
        name: this.metaInfo.name, //keyWords
        content: this.metaInfo.content
      }],
      link: [{ // set link
        rel: 'lexinamc',
        href: 'document.location.hostname'
      }]
    };
  },
  created: function created() {
    this.$nextTick(function () {
      window.scrollTo(0, 1);
      window.scrollTo(0, 0);
    });
    this.getContentList();
  },

  methods: {
    getContentSetting: function getContentSetting() {
      var _this = this;

      //获取网站内容设置
      this.$request.get('/ContentManage/getContentSetting', '', function (res) {
        console.log(res);
        if (res.code == 200) {
          _this.metaInfo.title = res.data[0].title + '-' + _this.title;
          _this.metaInfo.name = res.data[0].SEO_antistop;
          _this.metaInfo.content = res.data[0].describe;
        }
      });
    },
    getContentList: function getContentList() {
      var _this2 = this;

      //columns:第二列
      this.$request.post('ContentManage/getContentList', { id: this.helpId }, function (res) {
        if (res.code == 200) {
          _this2.content = res.data.content;
          _this2.title = res.data.title;
          _this2.getContentSetting();
        }
      });
    }
  }

});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-f713a5d4","hasScoped":false,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/page/index/helpDetail.vue
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('main',{staticClass:"help-detail"},[_c('article',{staticClass:"article"},[_c('section',{staticClass:"title"},[_c('h1',[_vm._v(_vm._s(_vm.title))])]),_vm._v(" "),_c('section',{staticClass:"content",domProps:{"innerHTML":_vm._s(_vm.content)}})])])}
var staticRenderFns = []
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ var index_helpDetail = (esExports);
// CONCATENATED MODULE: ./src/page/index/helpDetail.vue
function injectStyle (ssrContext) {
  __webpack_require__("M0Pv")
}
var normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  helpDetail,
  index_helpDetail,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)

/* harmony default export */ var page_index_helpDetail = __webpack_exports__["default"] = (Component.exports);


/***/ }),

/***/ "atAx":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });

// EXTERNAL MODULE: ./src/components/college/course-progress.vue + 2 modules
var course_progress = __webpack_require__("OM+P");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/page/college/trainingCourse.vue
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

__webpack_require__("mgS3");


/* harmony default export */ var trainingCourse = ({
  data: function data() {
    return {
      listData: [], //最新
      reviewData: [], //回顾
      reviewOption: {
        slidesPerView: 1,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev'
        }
      },
      metaInfo: { //seo
        title: '',
        name: '',
        content: ''
      }
    };
  },
  created: function created() {
    this.getContentSetting();
  },

  name: 'async',
  metaInfo: function metaInfo() {
    return {
      title: this.metaInfo.title,
      meta: [{
        name: this.metaInfo.name, //keyWords
        content: this.metaInfo.content
      }],
      link: [{ // set link
        rel: 'lexinamc',
        href: 'document.location.hostname'
      }]
    };
  },
  beforeRouteEnter: function beforeRouteEnter(to, from, next) {
    next(function (vm) {
      vm.getCourseList(21);
      vm.getCourseList(22);
    });
  },

  methods: {
    getContentSetting: function getContentSetting() {
      var _this = this;

      //获取网站内容设置
      this.$request.get('/ContentManage/getContentSetting', '', function (res) {
        console.log(res);
        if (res.code == 200) {
          _this.metaInfo.title = res.data[0].title + '-特训班';
          _this.metaInfo.name = res.data[0].SEO_antistop;
          _this.metaInfo.content = res.data[0].describe;
        }
      });
    },
    jumpClick: function jumpClick(url) {
      window.location = url;
    },
    getCourseList: function getCourseList(type) {
      var _this2 = this;

      //type 21：特训班列表-最新，22：特训班列表-回顾，
      this.$request.post('/College/getCourseList', { type: type }, function (res) {
        if (type == 21) {
          _this2.listData = res.data;
        } else if (type == 22) {
          _this2.reviewData = res.data;
        }
      });
    }
  },
  components: {
    courseProgress: course_progress["a" /* default */]
  }
});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-e5b5eb96","hasScoped":false,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/page/college/trainingCourse.vue
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('main',{staticClass:"training-course"},[_c('section',{staticClass:"listing"},[_c('course-progress',{attrs:{"listData":_vm.listData}})],1),_vm._v(" "),(_vm.reviewData.length>0)?_c('section',{staticClass:"review"},[_c('div',{staticClass:"part-title"},[_vm._v("精彩回顾")]),_vm._v(" "),_c('section',{staticClass:"review-swiper"},[_c('swiper',{staticClass:"review-banner",attrs:{"options":_vm.reviewOption}},[_vm._l((_vm.reviewData),function(item,index){return [_c('swiper-slide',[_c('img',{attrs:{"src":item.imgUrl,"alt":""}})])]})],2),_vm._v(" "),_c('div',{staticClass:"swiper-button-next"}),_vm._v(" "),_c('div',{staticClass:"swiper-button-prev"})],1)]):_vm._e()])}
var staticRenderFns = []
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ var college_trainingCourse = (esExports);
// CONCATENATED MODULE: ./src/page/college/trainingCourse.vue
function injectStyle (ssrContext) {
  __webpack_require__("sZ7p")
}
var normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  trainingCourse,
  college_trainingCourse,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)

/* harmony default export */ var page_college_trainingCourse = __webpack_exports__["default"] = (Component.exports);


/***/ }),

/***/ "bZO4":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/page/teacher/teacherIndex.vue
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ var teacherIndex = ({
  data: function data() {
    return {
      TeachList: [],
      page: 1,
      sw: true,
      metInfoJson: {
        title: '',
        meta: [{
          name: '', //keyWords
          content: ''
        }],
        link: [{ // set link
          rel: '',
          href: ''
        }]
      }
    };
  },

  name: 'async',
  metaInfo: function metaInfo() {
    return this.metInfoJson;
  },
  created: function created() {
    var _this2 = this;

    this.getTeachList();
    this.getContentSettingFun(function (res) {
      console.log(res);
      _this2.metInfoJson = res;
    }, '讲师列表');
    this.$nextTick(function () {
      window.scrollTo(0, 1);
      window.scrollTo(0, 0);
    });
  },
  mounted: function mounted() {
    var _this = this;
    window.addEventListener('scroll', function () {
      // 判断是否滚动到底部
      var scrollTop = window.pageYOffset; //滚动条距离顶部的高度
      var scrollHeight = document.body.clientHeight; //当前页面的总高度
      var clientHeight = document.documentElement.clientHeight; //当前可视的页面高度
      if (scrollTop + clientHeight >= scrollHeight - 300) {
        if (_this.sw == true) {
          _this.sw = false;
          _this.page++;
          _this.getTeachList();
        }
      }
    });
  },

  methods: {
    imgSrc: function imgSrc(url) {
      //图片是否被七牛压缩
      var imgUrl = '';
      if (url.indexOf('?') > 0) {
        imgUrl = url.split('?')[0];
      } else {
        imgUrl = url;
      }
      return imgUrl;
    },
    getTeachList: function getTeachList() {
      var _this3 = this;

      this.$request.get('/CourseManage/teachList', {
        page: this.page,
        size: 10
      }, function (res) {
        if (res.code == 200) {
          _this3.TeachList = _this3.TeachList.concat(res.data);
          _this3.sw = true;
          if (res.data.length < 10) {
            _this3.sw = false;
          }
        }
      });
    }
  }
});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-7044fdf5","hasScoped":false,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/page/teacher/teacherIndex.vue
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('main',{staticClass:"teachers"},[_c('article',{staticClass:"teacherList clearfix"},[_c('ul',_vm._l((_vm.TeachList),function(item,index){return _c('li',[_c('div',{staticClass:"img"},[_c('img',{attrs:{"src":_vm.imgSrc(item.head_add)}})]),_vm._v(" "),_c('div',{staticClass:"info"},[_c('h2',[_vm._v(_vm._s(item.alias))]),_vm._v(" "),_c('P',[_vm._v("\n            "+_vm._s(item.intro)+"\n          ")]),_vm._v(" "),_c('router-link',{attrs:{"to":'/teacherIntroduction/' +item.user_id,"target":"_blank"}},[_vm._v("\n            查看更多\n          ")])],1)])}))])])}
var staticRenderFns = []
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ var teacher_teacherIndex = (esExports);
// CONCATENATED MODULE: ./src/page/teacher/teacherIndex.vue
function injectStyle (ssrContext) {
  __webpack_require__("vi3a")
}
var normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  teacherIndex,
  teacher_teacherIndex,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)

/* harmony default export */ var page_teacher_teacherIndex = __webpack_exports__["default"] = (Component.exports);


/***/ }),

/***/ "dF6/":
/***/ (function(module, exports) {

module.exports = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAASCAYAAABB7B6eAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyhpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTMyIDc5LjE1OTI4NCwgMjAxNi8wNC8xOS0xMzoxMzo0MCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTUuNSAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6RjNCMEZCODI0MTQyMTFFODg1QUNGQzNDOTlFMTE4N0UiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6RjNCMEZCODM0MTQyMTFFODg1QUNGQzNDOTlFMTE4N0UiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpGM0IwRkI4MDQxNDIxMUU4ODVBQ0ZDM0M5OUUxMTg3RSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpGM0IwRkI4MTQxNDIxMUU4ODVBQ0ZDM0M5OUUxMTg3RSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PsRlxNwAAAHYSURBVHjarNRPSFRRFMfxN+Mf0oUaGkFi2EIhSmMWYkFQGwlzkdso0EWZkYVCIqW0qoiWaqJmfzQQIXARQcoQurU0tDQFo3W4aKEIqWl+j/wGHsPM3Ek98Jk3w3v3nnvevWcC8172Tc/zqmHXn97+xDF0YTjIRxrO4hvuInUPE6egSXOdR1aACuxGEfpxBlO4hun/nLwUfSjDBGqxENTNRVXRjBP4jCfISGLiA3iESSW5p7kW7GakAn8cxyuU4wfqMBZn8nPoRbEqt1XP+h8Ixhg0rxW0ogAfVfpB3zM5mtgSF+IBTkdPHq8Cf5zEAEL4hTvYRAeOYAY1usYMVwJPp+o+2nTiLP7iMR5iI9FgSxDgmolVR6KQ9iZFq/6SxOavWYJnfLmoRhtxDEq3RdlAx3MV6MZ72+S3+IcPeINDCQauOybPxWuM6tXuJBjHKfTgCuZwdRddfBnf9fpeogThyDFdQT0u4I8qGdERdMVRWykGteGV+idYjtUHYWV+oWR2rhu1sdFhY2+r4ir91ZRE72OiY1ql15aPT7iOr77+eK7msv64gXe76QPr3nbtiZX/FFto0Ykawi383kujWVxSNYf1e0nHetg1MNkEFnno1LtvUBJnbAswAF/jaAouPPqDAAAAAElFTkSuQmCC"

/***/ }),

/***/ "e8l8":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/components/college/introduce-teacher.vue
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ var introduce_teacher = ({
  props: ['intro', 'teacherId', 'alias', 'headAdd']
});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-1a575e0c","hasScoped":false,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/components/college/introduce-teacher.vue
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('section',{staticClass:"intro-teacher"},[_c('h5',{staticClass:"title"},[_vm._v("讲师介绍")]),_vm._v(" "),_c('section',{staticClass:"box-item"},[_c('img',{attrs:{"src":_vm.headAdd,"alt":""}}),_vm._v(" "),_c('h5',{staticClass:"name"},[_vm._v("\n            "+_vm._s(_vm.alias)+"\n        ")]),_vm._v(" "),_c('div',{staticClass:"item"},[_vm._v("\n         "+_vm._s(_vm.intro?_vm.intro:'暂无介绍')+"\n         ")]),_vm._v(" "),_c('router-link',{attrs:{"to":'/teacherIntroduction/' + _vm.teacherId}},[_vm._v("查看详细介绍>")])],1)])}
var staticRenderFns = []
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ var college_introduce_teacher = (esExports);
// CONCATENATED MODULE: ./src/components/college/introduce-teacher.vue
function injectStyle (ssrContext) {
  __webpack_require__("FrpG")
}
var normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  introduce_teacher,
  college_introduce_teacher,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)

/* harmony default export */ var components_college_introduce_teacher = __webpack_exports__["a"] = (Component.exports);


/***/ }),

/***/ "exGp":
/***/ (function(module, exports, __webpack_require__) {

"use strict";


exports.__esModule = true;

var _promise = __webpack_require__("//Fk");

var _promise2 = _interopRequireDefault(_promise);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

exports.default = function (fn) {
  return function () {
    var gen = fn.apply(this, arguments);
    return new _promise2.default(function (resolve, reject) {
      function step(key, arg) {
        try {
          var info = gen[key](arg);
          var value = info.value;
        } catch (error) {
          reject(error);
          return;
        }

        if (info.done) {
          resolve(value);
        } else {
          return _promise2.default.resolve(value).then(function (value) {
            step("next", value);
          }, function (err) {
            step("throw", err);
          });
        }
      }

      return step("next");
    });
  };
};

/***/ }),

/***/ "g3Gj":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "gdUC":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "hkeH":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });

// EXTERNAL MODULE: ./src/components/college/course-progress.vue + 2 modules
var course_progress = __webpack_require__("OM+P");

// EXTERNAL MODULE: ./src/components/college/course-list.vue + 2 modules
var course_list = __webpack_require__("4bsv");

// EXTERNAL MODULE: ./src/components/common/video.vue + 2 modules
var video = __webpack_require__("AQ5S");

// EXTERNAL MODULE: ./src/assets/images/default/imgbg2.jpg
var imgbg2 = __webpack_require__("YikS");
var imgbg2_default = /*#__PURE__*/__webpack_require__.n(imgbg2);

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/components/college/player-popup.vue
//
//
//
//
//
//
//
//
//
//
//
//
//
//



/* harmony default export */ var player_popup = ({
  props: ['videoUrl'],
  data: function data() {
    return {
      playerOptions: {
        muted: false,
        sources: {
          // type: '',
          // src: '',
          type: "video/mp4",
          src: "http://oqt46pvmm.bkt.clouddn.com/o_1c4c623e2ccsnbf17gtb0d14mfh.mp4",
          withCredentials: false
        },
        poster: imgbg2_default.a, //https://surmon-china.github.io/vue-quill-editor/static/images/surmon-6.jpg
        language: 'en',
        live: true,
        autoplay: false,
        width: '850px',
        height: '478px'
      }
    };
  },
  created: function created() {
    this.playerOptions.sources.src = this.videoUrl;
  },

  methods: {
    closeFn: function closeFn() {
      this.$emit('closePlayerPopup', false);
    }
  },
  components: {
    videoPlayer: video["a" /* default */]
  }
});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-08d152ae","hasScoped":false,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/components/college/player-popup.vue
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('main',{staticClass:"player-popup"},[_c('div',{staticClass:"mask"}),_vm._v(" "),_c('div',{staticClass:"popup-wrap"},[_c('section',{staticClass:"popup"},[_c('video-player',{attrs:{"playerOptions":_vm.playerOptions}}),_vm._v(" "),_c('section',{staticClass:"close",on:{"click":_vm.closeFn}})],1)])])}
var staticRenderFns = []
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ var college_player_popup = (esExports);
// CONCATENATED MODULE: ./src/components/college/player-popup.vue
function injectStyle (ssrContext) {
  __webpack_require__("6NzX")
}
var normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  player_popup,
  college_player_popup,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)

/* harmony default export */ var components_college_player_popup = (Component.exports);

// EXTERNAL MODULE: ./src/assets/images/1.1/imgbg.jpg
var imgbg = __webpack_require__("VrL8");
var imgbg_default = /*#__PURE__*/__webpack_require__.n(imgbg);

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/page/college/recommend.vue
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

__webpack_require__("mgS3");





/* harmony default export */ var recommend = ({
  data: function data() {
    return {
      analysisOption: { //头部轮播图
        slidesPerView: 2,
        spaceBetween: 14,
        navigation: {
          nextEl: '.swiper-button-next1',
          prevEl: '.swiper-button-prev1'
        }
      },
      hotSaleOption: {
        slidesPerView: 4,
        spaceBetween: 13.33,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev'
        }
      },
      hasMore: true,
      showPopup: false, //是否显示视频弹窗
      newestData: [], //最新课程
      analysisData: [], //五分钟解读
      hotLearnData: [], //热门学习
      hotSaleData: [], //本周热销
      fineCourseData: [], //精品课程
      videoUrl: '',
      fineParams: {
        page: 1,
        limit: 6
      },
      metaInfo: { //seo
        title: '',
        name: '',
        content: ''
      }
    };
  },

  name: 'async',
  metaInfo: function metaInfo() {
    return {
      title: this.metaInfo.title,
      meta: [{
        name: this.metaInfo.name, //keyWords
        content: this.metaInfo.content
      }],
      link: [{ // set link
        rel: 'lexinamc',
        href: 'document.location.hostname'
      }]
    };
  },
  created: function created() {
    this.getCourseList(10);
    this.getCourseList(11);
    this.getCourseList(12);
    this.getCourseList(13);
    this.getCollegeFineCourse();
    this.getContentSetting();
  },

  methods: {
    getContentSetting: function getContentSetting() {
      var _this = this;

      //获取网站内容设置
      this.$request.get('/ContentManage/getContentSetting', '', function (res) {
        console.log(res);
        if (res.code == 200) {
          _this.metaInfo.title = res.data[0].title + '-学院推荐';
          _this.metaInfo.name = res.data[0].SEO_antistop;
          _this.metaInfo.content = res.data[0].describe;
        }
      });
    },
    loadMore: function loadMore() {
      this.fineParams.page++;
      this.getCollegeFineCourse();
    },
    getCollegeFineCourse: function getCollegeFineCourse() {
      var _this2 = this;

      //精品课程
      this.$request.post('/College/getCollegeFineCourse', this.fineParams, function (res) {
        _this2.fineCourseData = _this2.fineCourseData.concat(res.data);
        if (res.data.length < _this2.fineParams.limit) {
          _this2.hasMore = false;
        } else {
          _this2.hasMore = true;
        }
      });
    },
    jumpClick: function jumpClick(url) {
      window.location = url;
    },
    getCourseList: function getCourseList(type) {
      var _this3 = this;

      //type10：99学院首页-最新，11：99学院首页-五分钟解盘，12：99学院首页-热门学习，13：99学院首页-本周热销，
      this.$request.post('/College/getCourseList', { type: type }, function (res) {
        if (type == 10) {
          _this3.newestData = res.data;
        } else if (type == 11) {
          _this3.analysisData = res.data;
        } else if (type == 12) {
          _this3.hotLearnData = res.data;
        } else if (type == 13) {
          _this3.hotSaleData = res.data;
        }
      });
    },
    showPopupFn: function showPopupFn(videoUrl) {
      this.showPopup = true;
      this.videoUrl = videoUrl;
      document.getElementsByTagName('body')[0].style.overflow = 'hidden';
    },
    closePopupFn: function closePopupFn() {
      this.showPopup = false;
      document.getElementsByTagName('body')[0].style.overflow = 'auto';
    }
  },
  components: {
    courseProgress: course_progress["a" /* default */],
    courseList: course_list["a" /* default */],
    playerPopup: components_college_player_popup
  }
});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-59bafc02","hasScoped":false,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/page/college/recommend.vue
var recommend_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('main',{staticClass:"recommend"},[(_vm.newestData.length>0)?_c('section',{staticClass:"newest-course"},[_c('section',{staticClass:"part-title"},[_vm._v("最新课程")]),_vm._v(" "),_c('ul',{staticClass:"clearfix"},_vm._l((_vm.newestData),function(item,index){return _c('li',{staticClass:"clearfix"},[_c('a',{attrs:{"href":item.jumpUrl,"target":"_blank"}},[_c('img',{staticClass:"cover",attrs:{"src":item.imgUrl,"alt":""}}),_vm._v(" "),_c('section',{staticClass:"bottom-part"},[_c('h1',{staticClass:"title"},[_c('span',{class:{'special-icon':item.type == 1,'series-icon':item.type == 2,'train-icon':item.type == 3}}),_vm._v("\n              "+_vm._s(item.class_name)+"\n            ")]),_vm._v(" "),_c('section',{staticClass:"num"},[(item.type == 3)?_c('span',[_vm._v(_vm._s(item.enroll_total)+"人已报名")]):_vm._e(),_vm._v(" "),(item.type != 3)?_c('span',[_vm._v(_vm._s(item.study_total)+"人已学习")]):_vm._e(),_vm._v(" "),(item.type == 2)?_c('h5',[_vm._v("已更新"+_vm._s(item.update_total)+"节 | 共"+_vm._s(item.plan_num)+"节 ")]):_vm._e()]),_vm._v(" "),_c('section',{staticClass:"info"},[_c('img',{attrs:{"src":item.head_add,"alt":""}}),_vm._v(" "),_c('span',[_vm._v(_vm._s(item.alias))]),_vm._v(" "),(item.level == 0)?_c('p',[_vm._v("免费课程")]):_vm._e(),_vm._v(" "),(item.level == 1)?_c('p',{staticClass:"lock"},[_vm._v("私密课程")]):_vm._e(),_vm._v(" "),(item.level == 2)?_c('p',{staticClass:"price"},[_vm._v(_vm._s(item.price))]):_vm._e()])])])])}))]):_vm._e(),_vm._v(" "),(_vm.analysisData.length>0)?_c('section',{staticClass:"part-analysis"},[_c('section',{staticClass:"banner-container"},[_c('swiper',{ref:"iiii",staticClass:"analysis-banner",attrs:{"options":_vm.analysisOption}},[_vm._l((_vm.analysisData),function(item,index){return [_c('swiper-slide',[_c('div',{staticClass:"img",on:{"click":function($event){_vm.showPopupFn(item.remark)}}},[_c('img',{attrs:{"src":item.imgUrl,"alt":""}})]),_vm._v(" "),_c('p',[_vm._v(_vm._s(item.title))])])]})],2),_vm._v(" "),_c('div',{staticClass:"swiper-button-next1"}),_vm._v(" "),_c('div',{staticClass:"swiper-button-prev1"})],1)]):_vm._e(),_vm._v(" "),(_vm.hotLearnData.length > 0)?_c('section',{staticClass:"part-hotLearn"},[_c('section',{staticClass:"part-title"},[_vm._v("热门学习")]),_vm._v(" "),_c('course-progress',{attrs:{"listData":_vm.hotLearnData}})],1):_vm._e(),_vm._v(" "),(_vm.hotSaleData.length>0)?_c('section',{staticClass:"part-hotSale"},[_c('section',{staticClass:"part-title"},[_vm._v("本周热销")]),_vm._v(" "),_c('div',{staticClass:"hotSale-swiper"},[_c('swiper',{staticClass:"hotSale-banner",attrs:{"options":_vm.hotSaleOption}},[_vm._l((_vm.hotSaleData),function(item,index){return [_c('swiper-slide',[_c('a',{attrs:{"href":item.jumpUrl,"target":"_blank"}},[_c('div',{staticClass:"img"},[_c('img',{attrs:{"src":item.imgUrl,"alt":""}})]),_vm._v(" "),_c('section',{staticClass:"info"},[_c('h4',[_vm._v(_vm._s(item.class_name))]),_vm._v(" "),_c('section',{staticClass:"price"},[(item.level == 0)?_c('span',{staticClass:"free"},[_vm._v("免费课程")]):_vm._e(),_vm._v(" "),(item.level == 1)?_c('span',{staticClass:"lock"},[_vm._v("私密课程")]):_vm._e(),_vm._v(" "),(item.level == 2)?_c('span',{staticClass:"price-icon"},[_vm._v(_vm._s(item.price))]):_vm._e(),_vm._v(" "),(item.origin_price && item.level == 2)?_c('p',{staticClass:"price-icon"},[_vm._v("原价："),_c('del',[_vm._v(_vm._s(item.origin_price))])]):_vm._e()])])])])]})],2),_vm._v(" "),_c('div',{staticClass:"swiper-button-next"}),_vm._v(" "),_c('div',{staticClass:"swiper-button-prev"})],1)]):_vm._e(),_vm._v(" "),(_vm.fineCourseData.length>0)?_c('section',{staticClass:"fine-course"},[_c('section',{staticClass:"part-title"},[_vm._v("精品课程")]),_vm._v(" "),_c('course-list',{attrs:{"listData":_vm.fineCourseData}})],1):_vm._e(),_vm._v(" "),(_vm.hasMore)?_c('section',{staticClass:"more-block"},[_c('section',{staticClass:"more",on:{"click":_vm.loadMore}},[_vm._v("加载更多")])]):_vm._e(),_vm._v(" "),(_vm.showPopup)?_c('player-popup',{attrs:{"videoUrl":_vm.videoUrl},on:{"closePlayerPopup":_vm.closePopupFn}}):_vm._e()],1)}
var recommend_staticRenderFns = []
var recommend_esExports = { render: recommend_render, staticRenderFns: recommend_staticRenderFns }
/* harmony default export */ var college_recommend = (recommend_esExports);
// CONCATENATED MODULE: ./src/page/college/recommend.vue
function recommend_injectStyle (ssrContext) {
  __webpack_require__("WYcU")
}
var recommend_normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var recommend___vue_template_functional__ = false
/* styles */
var recommend___vue_styles__ = recommend_injectStyle
/* scopeId */
var recommend___vue_scopeId__ = null
/* moduleIdentifier (server only) */
var recommend___vue_module_identifier__ = null
var recommend_Component = recommend_normalizeComponent(
  recommend,
  college_recommend,
  recommend___vue_template_functional__,
  recommend___vue_styles__,
  recommend___vue_scopeId__,
  recommend___vue_module_identifier__
)

/* harmony default export */ var page_college_recommend = __webpack_exports__["default"] = (recommend_Component.exports);


/***/ }),

/***/ "i4uy":
/***/ (function(module, exports) {

// Unique ID creation requires a high quality random # generator.  In the
// browser this is a little complicated due to unknown quality of Math.random()
// and inconsistent support for the `crypto` API.  We do the best we can via
// feature-detection

// getRandomValues needs to be invoked in a context where "this" is a Crypto
// implementation. Also, find the complete implementation of crypto on IE11.
var getRandomValues = (typeof(crypto) != 'undefined' && crypto.getRandomValues && crypto.getRandomValues.bind(crypto)) ||
                      (typeof(msCrypto) != 'undefined' && typeof window.msCrypto.getRandomValues == 'function' && msCrypto.getRandomValues.bind(msCrypto));

if (getRandomValues) {
  // WHATWG crypto RNG - http://wiki.whatwg.org/wiki/Crypto
  var rnds8 = new Uint8Array(16); // eslint-disable-line no-undef

  module.exports = function whatwgRNG() {
    getRandomValues(rnds8);
    return rnds8;
  };
} else {
  // Math.random()-based (RNG)
  //
  // If all else fails, use Math.random().  It's fast, but is of unspecified
  // quality.
  var rnds = new Array(16);

  module.exports = function mathRNG() {
    for (var i = 0, r; i < 16; i++) {
      if ((i & 0x03) === 0) r = Math.random() * 0x100000000;
      rnds[i] = r >>> ((i & 0x03) << 3) & 0xff;
    }

    return rnds;
  };
}


/***/ }),

/***/ "ieIK":
/***/ (function(module, exports) {

module.exports = "data:image/png;base64,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"

/***/ }),

/***/ "jXcB":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });

// EXTERNAL MODULE: ./src/components/college/introduce-course.vue + 2 modules
var introduce_course = __webpack_require__("yKMm");

// EXTERNAL MODULE: ./src/components/college/introduce-teacher.vue + 2 modules
var introduce_teacher = __webpack_require__("e8l8");

// EXTERNAL MODULE: ./src/components/college/course.vue + 2 modules
var course = __webpack_require__("T3yJ");

// EXTERNAL MODULE: ./src/components/pointList/lock-popup.vue + 8 modules
var lock_popup = __webpack_require__("C5wJ");

// EXTERNAL MODULE: ./node_modules/vue-video-player/dist/vue-video-player.js
var vue_video_player = __webpack_require__("iqGf");
var vue_video_player_default = /*#__PURE__*/__webpack_require__.n(vue_video_player);

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/components/common/seriesVideo.vue
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


__webpack_require__("g3Gj");
__webpack_require__("5LIk");
/* harmony default export */ var seriesVideo = ({
  props: ["playerOptions"],
  data: function data() {
    return {
      //     playerOptions: {
      //       muted: false,
      //       sources: {
      //           type: '',
      //           src: '',
      //                type: "video/mp4",
      //            src: "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4",
      //           withCredentials: false
      //       },
      //       poster: "../images/videoBg.png",
      //       language: 'zh-CN',
      //       live: true,
      //       autoplay: false,
      //       width: '100%',
      //       height: 230
      //   },
    };
  },

  computed: {
    player: function player() {
      return this.$refs.videoPlayer.player;
    }
  },
  methods: {
    // listen event
    onPlayerPlay: function onPlayerPlay(player) {

      console.log("player play!", player);
    },
    onPlayerPause: function onPlayerPause(player) {
      console.log("player pause!", player);
    },
    onPlayerEnded: function onPlayerEnded(player) {
      console.log("player ended!", player);
    },
    onPlayerLoadeddata: function onPlayerLoadeddata(player) {
      console.log("player Loadeddata!", player);
    },
    onPlayerWaiting: function onPlayerWaiting(player) {
      console.log("player Waiting!", player);
    },
    onPlayerPlaying: function onPlayerPlaying(player) {
      console.log("player Playing!", player);
    },
    onPlayerTimeupdate: function onPlayerTimeupdate(player) {
      console.log("player Timeupdate!", player.currentTime());
    },
    onPlayerCanplay: function onPlayerCanplay(player) {
      console.log("player Canplay!", player);
    },
    onPlayerCanplaythrough: function onPlayerCanplaythrough(player) {
      console.log("player Canplaythrough!", player);
    },

    // or listen state event
    playerStateChanged: function playerStateChanged(playerCurrentState) {
      console.log("player current update state", playerCurrentState);
    },

    // player is ready
    playerReadied: function playerReadied(player) {
      // seek to 10s
      alert(player);
      player.currentTime(10);
      // console.log('example 01: the player is readied', player)
      console.log("the player is readied", player);
      // you can use it to do something...
    }
  }
});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-7ed65f80","hasScoped":false,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/components/common/seriesVideo.vue
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',{staticClass:"video"},[_c('div',{staticClass:"videoDom"},[_c('video-player',{ref:"videoPlayer",staticClass:"vjs-custom-skin",attrs:{"options":_vm.playerOptions,"playsinline":true},on:{"play":function($event){_vm.onPlayerPlay($event)},"pause":function($event){_vm.onPlayerPause($event)},"statechanged":function($event){_vm.playerStateChanged($event)}}})],1)])}
var staticRenderFns = []
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ var common_seriesVideo = (esExports);
// CONCATENATED MODULE: ./src/components/common/seriesVideo.vue
function injectStyle (ssrContext) {
  __webpack_require__("EP/e")
}
var normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  seriesVideo,
  common_seriesVideo,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)

/* harmony default export */ var components_common_seriesVideo = (Component.exports);

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/page/college/seriesCourseDetail.vue
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

__webpack_require__("mgS3");






/* harmony default export */ var seriesCourseDetail = ({
  data: function data() {
    return {
      hotSaleOption: {
        slidesPerView: 4,
        // spaceBetween: 13.33,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev"
        }
      }, //相关课程轮播属性
      playerOptions: {
        muted: false,
        sources: {
          type: "video/mp4",
          src: "", //http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4
          withCredentials: false
        },
        poster: "", ///static/img/default-cover-04.png
        language: 'en',
        live: true,
        autoplay: false,
        width: '100%',
        height: 534
      },

      sujectList: [], //相关课程推荐
      status: 1, //是否登錄 1未登录 2登录
      details: [], //課程介紹數據
      isVideo: false, //是否顯示
      privacypop: false, //私密课弹窗
      paypop: false, //私密课弹窗
      moneypop: false, //付费弹窗
      playerType: 1, //无视频点击
      videoImg: '/static/img/imgbg.jpg', //默認背景圖
      metInfoJson: {
        title: '',
        meta: [{
          name: '', //keyWords
          content: ''
        }],
        link: [{ // set link
          rel: '',
          href: ''
        }]
      },
      userId: '', //用户id
      courseId: this.$route.params.courseId //课程id
    };
  },

  name: 'async',
  metaInfo: function metaInfo() {
    return this.metInfoJson;
  },
  created: function created() {
    var _this = this;

    console.log(this.courseId);
    this.checkWechatLoginIn(function (res) {
      console.log(res);
      if (res.code == 200) {
        _this.userId = res.data.userId;
        _this.status = 2;
        _this.setCookie('isRegister', res.data.isRegister);
        _this.CourseDetail();
      } else if (res.code == -5002) {
        _this.status = 1;
        //this.userId =1707148
        _this.CourseDetail();
      }
    });
    this.$nextTick(function () {
      window.scrollTo(0, 1);
      window.scrollTo(0, 0);
    });
  },

  methods: {
    clickPlayerType: function clickPlayerType() {
      var _this2 = this;

      //无视频点击播放
      this.checkWechatLoginIn(function (res) {
        console.log(res);
        if (res.code == 200) {
          _this2.status = 2;
          if (_this2.details.userBuyStatus == 1) {
            //已购买
            _this2.isVideo = true;
          } else {
            _this2.moneypop = true;
            document.getElementsByTagName("body")[0].style.overflow = "hidden";
          }
          _this2.playerType = 2;
        } else if (res.code == -5002) {
          _this2.status = 1;
          window.location.href = res.data.url;
        }
      });
    },
    CourseDetail: function CourseDetail() {
      var _this3 = this;

      //课程介绍
      this.$request.get("/CourseManage/details", { id: this.$route.params.courseId, status: this.status }, function (res) {
        _this3.details = res.data;
        console.log(_this3.details.catalog);
        _this3.getContentSettingFun(function (json) {
          _this3.metInfoJson = json;
        }, _this3.details.class_name);

        _this3.isVideo = true;
        _this3.getSubjectList();
      });
    },

    /**@augments
     *相关课程推荐
     *
     */
    getSubjectList: function getSubjectList() {
      var _this4 = this;

      this.$request.get("/College/getCourseList", { type: 23 }, function (res) {
        // this.viewpointList = [];
        _this4.sujectList = res.data;
      });
    },
    showPopupFn: function showPopupFn() {
      this.privacypop = true;
      document.getElementsByTagName("body")[0].style.overflow = "hidden";
    },
    closePopupFn: function closePopupFn() {
      this.privacypop = false;
      document.getElementsByTagName("body")[0].style.overflow = "auto";
    },
    purchaseFun: function purchaseFun() {
      var _this5 = this;

      //付费课程
      this.checkWechatLoginIn(function (res) {
        console.log(res);
        if (res.code == 200) {
          _this5.moneypop = true;
          document.getElementsByTagName("body")[0].style.overflow = "hidden";
        } else {
          window.location.href = res.data.url;
        }
      });
    },
    closePurchase: function closePurchase() {
      //关闭付费课程
      this.moneypop = false;
      document.getElementsByTagName("body")[0].style.overflow = "auto";
    }
  },
  watch: {
    '$route': function $route(to, from) {
      console.log(to);
      console.log(from);
      if (to.path != from.path) {
        location.reload();
      }
    },
    isVideo: function isVideo() {
      console.log(this.isVideo);
      if (this.isVideo) {
        if (this.details.class_video_url != null && this.details.class_video_url != '') {
          console.log(this.details.class_video_url);
          this.playerOptions.sources.src = this.details.class_video_url;
          this.playerOptions.poster = this.details.class_video_pic;
        } else {
          this.isVideo = false;
          if (!this.status && this.details.class_video_pic != null) {
            //未登陸
            this.videoImg = this.details.class_video_pic;
            console.log(this.videoImg);
          }
        }
      }
    }
  },
  components: {
    introduceA: introduce_course["a" /* default */],
    introduceB: introduce_teacher["a" /* default */],
    courseItem: course["a" /* default */],
    lockPopup: lock_popup["a" /* default */],
    videoM: components_common_seriesVideo
  }
});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-5873d96d","hasScoped":false,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/page/college/seriesCourseDetail.vue
var seriesCourseDetail_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('main',{staticClass:"series-detail"},[_c('div',{staticClass:"header"},[_c('div',{staticClass:"item-box"},[(_vm.isVideo)?[_c('videoM',{attrs:{"playerOptions":_vm.playerOptions}})]:[(_vm.details.pid==0)?[_c('div',{staticClass:"video"},[_c('img',{attrs:{"src":_vm.details.src_img}})])]:[_c('div',{staticClass:"video"},[_c('img',{attrs:{"src":_vm.videoImg}}),_vm._v(" "),_c('div',{staticClass:"playerBox"},[(_vm.playerType==1)?_c('span',{staticClass:"player",on:{"click":_vm.clickPlayerType}}):_c('span',{staticClass:"text"},[_c('img',{attrs:{"src":__webpack_require__("ZzFC"),"width":"86","height":"66"}}),_vm._v("\n                暂无视频内容\n              ")])])])]],_vm._v(" "),_c('div',{staticClass:"item-r"},[_c('div',{staticClass:"item"},[_c('h5',[_vm._v("\n            系列课程目录\n          ")]),_vm._v(" "),_c('p',[_vm._v("已更新"),_c('b',[_vm._v(_vm._s(_vm.details.haveCourseTotal))]),_vm._v("节 共"),_c('b',[_vm._v(_vm._s(_vm.details.plan_num))]),_vm._v("节")])]),_vm._v(" "),_c('ul',[_c('router-link',{attrs:{"to":'/seriesCourseDetail/'+_vm.details.id}},[_c('li',[_c('h5',{staticClass:"active"},[_vm._v("\n                "+_vm._s(_vm.details.class_name)+"\n              ")]),_vm._v(" "),_c('p',[_vm._v(_vm._s(_vm.details.study_num)+"人学习")])])]),_vm._v(" "),_vm._l((_vm.details.catalog),function(item,index){return [_c('router-link',{attrs:{"to":'/seriesCourseDetail/'+item.id}},[_c('li',[_c('h5',[_vm._v("\n                  "+_vm._s(item.class_name)+"\n                ")]),_vm._v(" "),_c('p',[_vm._v(_vm._s(item.study_num)+"人学习")])])])]})],2)])],2),_vm._v(" "),_c('div',{staticClass:"item-b"},[_c('div',[_c('h5',[_vm._v(_vm._s(_vm.details.class_name))]),_vm._v(" "),_c('p',[_vm._v(_vm._s(_vm.details.study_num)+"人学习")])]),_vm._v(" "),(_vm.details.level == 1|| (_vm.details.level == 2 && _vm.details.userBuyStatus == 0)  &&  _vm.userId !=_vm.details.uid   )?[_c('div',{staticClass:"item"},[(_vm.details.level == 1)?[_vm._m(0),_vm._v(" "),_c('a',{attrs:{"href":"javascript:;"},on:{"click":_vm.showPopupFn}},[_vm._v("输入密码")])]:_vm._e(),_vm._v(" "),(_vm.details.level == 2 && _vm.details.userBuyStatus == 0)?[_c('div',{staticClass:"pay"},[_c('h5',[_vm._v(_vm._s(_vm.details.price)),_c('s',[_vm._v("原价"+_vm._s(_vm.details.origin_price))])])]),_vm._v(" "),_c('a',{attrs:{"href":"javascript:;"},on:{"click":_vm.purchaseFun}},[_vm._v("购买课程")])]:_vm._e()],2)]:_vm._e()],2)]),_vm._v(" "),_c('section',{staticClass:"center-box"},[_c('div',{staticClass:"item-l"},[_c('nav',[_c('router-link',{attrs:{"to":"/"}},[_vm._v("首页")]),_vm._v("\n        >\n        "),_c('router-link',{attrs:{"to":"/collegeIndex"}},[_vm._v("99学院")]),_vm._v("\n        >\n        "),_c('router-link',{attrs:{"to":"/collegeIndex/seriesCourse"}},[_vm._v("系列课")]),_vm._v("\n        >"),_c('span',[_vm._v("课程详情")])],1),_vm._v(" "),_c('introduceA',{attrs:{"lecturers":_vm.details.lecturers,"brief":_vm.details.brief}})],1),_vm._v(" "),_c('aside',{staticClass:"item-r"},[_c('introduceB',{attrs:{"intro":_vm.details.intro,"teacherId":_vm.details.uid,"alias":_vm.details.alias,"headAdd":_vm.details.head_add}})],1)]),_vm._v(" "),(_vm.details.RelevantCourse.length > 0)?_c('section',{staticClass:"footer-item"},[_c('h5',[_vm._v("\n      相关课程\n    ")]),_vm._v(" "),_c('swiper',{attrs:{"options":_vm.hotSaleOption}},[_vm._l((_vm.details.RelevantCourse),function(item){return [_c('swiper-slide',[_c('courseItem',{attrs:{"courseItem":item}})],1)]})],2),_vm._v(" "),_c('div',{staticClass:"swiper-button-next"}),_vm._v(" "),_c('div',{staticClass:"swiper-button-prev"})],1):_vm._e(),_vm._v(" "),_c('div',{directives:[{name:"show",rawName:"v-show",value:(_vm.privacypop),expression:"privacypop"}],staticClass:"pop-mi"},[_c('div',{staticClass:"mask"}),_vm._v(" "),_c('h5',[_vm._v("解锁私密课程")]),_vm._v(" "),_c('div',[_c('input',{attrs:{"type":"text","name":"","id":"","placeholder":"请输入密码"}}),_vm._v(" "),_c('router-link',{attrs:{"to":""}},[_vm._v("\n        解锁\n      ")])],1),_vm._v(" "),_c('span',{on:{"click":_vm.closePopupFn}})]),_vm._v(" "),(_vm.privacypop)?[_c('lockPopup',{attrs:{"type":1,"id":_vm.courseId},on:{"closePopup":_vm.closePopupFn}})]:_vm._e(),_vm._v(" "),(_vm.moneypop)?[(_vm.details.level == 2 && _vm.details.userBuyStatus == 0)?_c('lockPopup',{attrs:{"type":1,"id":_vm.courseId},on:{"closePopup":_vm.closePurchase}}):_vm._e()]:_vm._e()],2)}
var seriesCourseDetail_staticRenderFns = [function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',{staticClass:"simi"},[_c('h5',[_vm._v("私密课程")]),_vm._v(" "),_c('p',[_vm._v("输入密码解锁后可学习")])])}]
var seriesCourseDetail_esExports = { render: seriesCourseDetail_render, staticRenderFns: seriesCourseDetail_staticRenderFns }
/* harmony default export */ var college_seriesCourseDetail = (seriesCourseDetail_esExports);
// CONCATENATED MODULE: ./src/page/college/seriesCourseDetail.vue
function seriesCourseDetail_injectStyle (ssrContext) {
  __webpack_require__("vEDX")
}
var seriesCourseDetail_normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var seriesCourseDetail___vue_template_functional__ = false
/* styles */
var seriesCourseDetail___vue_styles__ = seriesCourseDetail_injectStyle
/* scopeId */
var seriesCourseDetail___vue_scopeId__ = null
/* moduleIdentifier (server only) */
var seriesCourseDetail___vue_module_identifier__ = null
var seriesCourseDetail_Component = seriesCourseDetail_normalizeComponent(
  seriesCourseDetail,
  college_seriesCourseDetail,
  seriesCourseDetail___vue_template_functional__,
  seriesCourseDetail___vue_styles__,
  seriesCourseDetail___vue_scopeId__,
  seriesCourseDetail___vue_module_identifier__
)

/* harmony default export */ var page_college_seriesCourseDetail = __webpack_exports__["default"] = (seriesCourseDetail_Component.exports);


/***/ }),

/***/ "jdFQ":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });

// EXTERNAL MODULE: ./node_modules/vue-video-player/dist/vue-video-player.js
var vue_video_player = __webpack_require__("iqGf");
var vue_video_player_default = /*#__PURE__*/__webpack_require__.n(vue_video_player);

// EXTERNAL MODULE: ./src/components/pointList/lock-popup.vue + 8 modules
var lock_popup = __webpack_require__("C5wJ");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/page/college/videoCommon.vue
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


__webpack_require__("g3Gj");
__webpack_require__("5LIk");
__webpack_require__("mgS3");



/* harmony default export */ var videoCommon = ({
  data: function data() {
    return {
      videoId: this.$route.params.videoId, //视频id
      playerOptions: { //视频属性
        // muted: false,
        sources: {
          // type: '',
          // src: '',
          type: "video/mp4",
          src: "http://vjs.zencdn.net/v/oceans.mp4"
          // withCredentials: false
        },
        poster: "/static/img/imgbg.jpg", //https://surmon-china.github.io/vue-quill-editor/static/images/surmon-6.jpg
        language: "zh-CN",
        autoplay: false,
        width: "100%",
        height: 620
      },
      metaInfo: {
        //seo
        title: "",
        name: "",
        content: ""
      },
      realIndex: 0,
      videoList: [], //视频列表
      videoTitle: "", //正在播放的视频title
      videoBtn: false //是否选择了节目
    };
  },

  name: "async",
  metaInfo: function metaInfo() {
    return {
      title: this.metaInfo.title,
      meta: [{
        name: this.metaInfo.name, //keyWords
        content: this.metaInfo.content
      }],
      link: [{
        // set link
        rel: "lexinamc",
        href: "document.location.hostname"
      }]
    };
  },
  created: function created() {
    this.getContentSetting();
    this.getVideoList();
  },
  mounted: function mounted() {},

  computed: {
    player: function player() {
      return this.$refs.videoPlayer.player;
    }
  },
  methods: {
    onPlayerPlay: function onPlayerPlay(player) {
      console.log("player play!", player);
    },
    onPlayerPause: function onPlayerPause(player) {
      console.log("player pause!", player);
    },
    onPlayerEnded: function onPlayerEnded(player) {
      //视频播放完毕
      if (this.videoList.length - 1 > this.realIndex) {
        this.getVideoDetail(this.videoList[this.realIndex + 1].id, this.realIndex + 1); //播放视频
      } else {
        //当到最后一个时 跳转到第一条播放
        this.getVideoDetail(this.videoList[0].id, 0); //播放视频
        document.getElementsByClassName("swipe-box")[0].scrollTop = 0;
      }
    },
    getContentSetting: function getContentSetting() {
      var _this = this;

      //获取网站内容设置
      this.$request.get("/ContentManage/getContentSetting", "", function (res) {
        console.log(res);
        if (res.code == 200) {
          _this.metaInfo.title = res.data[0].title + "-专题课介绍";
          _this.metaInfo.name = res.data[0].SEO_antistop;
          _this.metaInfo.content = res.data[0].describe;
        }
      });
    },

    //获取节目列表
    getVideoList: function getVideoList() {
      var _this2 = this;

      this.$request.get("/Video/getVideoList", { orderBy: "id desc", status: 1 }, function (res) {
        // this.mySwiper.slideTo(9, 1000, false);
        _this2.videoList = res.data;

        _this2.videoTitle = res.data[0].title;
        for (var i = 0; _this2.videoList.length; i++) {
          if (_this2.videoId == _this2.videoList[i].id) {
            if (_this2.videoId != 0) {
              //立即播放视频
              _this2.getVideoDetail(_this2.videoId, i);
            }
          }
        }
      });
    },

    //点击获取节目
    getVideoDetail: function getVideoDetail(videoId, index) {
      var _this3 = this;

      this.$request.get("/Video/getVideoById", { videoId: videoId }, function (res) {
        _this3.videoBtn = true;
        _this3.realIndex = index;
        _this3.videoId = videoId;
        _this3.videoTitle = res.data.title;
        _this3.player.src(res.data.video_url);
        if (_this3.realIndex > 2) {
          document.getElementsByClassName("swipe-box")[0].scrollTop = (_this3.realIndex - 2) * 104; //滚动到
        }
        _this3.player.play();
      });
    }
  },
  watch: {
    "$route.path": function $routePath() {}
  },
  components: {
    lockPopup: lock_popup["a" /* default */]
  }
});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-de0f21f2","hasScoped":false,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/page/college/videoCommon.vue
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('main',{staticClass:"video-common"},[_c('div',[[_c('div',{staticClass:"header"},[_c('div',{staticClass:"item-box"},[_c('div',{staticClass:"video"},[_c('div',{staticClass:"videoDom"},[_c('video-player',{ref:"videoPlayer",staticClass:"vjs-custom-skin",attrs:{"options":_vm.playerOptions,"playsinline":true},on:{"play":function($event){_vm.onPlayerPlay($event)},"pause":function($event){_vm.onPlayerPause($event)},"ended":function($event){_vm.onPlayerEnded($event)}}})],1),_vm._v(" "),(!_vm.videoBtn)?_c('div',{staticClass:"video-mask"},[_vm._m(0)]):_vm._e()]),_vm._v(" "),_c('div',{staticClass:"item-r"},[_vm._m(1),_vm._v(" "),_c('div',{staticClass:"video-list"},[(_vm.videoList.length > 0)?_c('ul',{staticClass:"swipe-box",attrs:{"id":"sidebar"}},_vm._l((_vm.videoList),function(item,index){return _c('li',{key:item.id,staticClass:"swipe-item",class:{active:_vm.videoId == item.id},on:{"click":function($event){_vm.getVideoDetail(item.id,index)}}},[_c('img',{attrs:{"src":item.cover_pc_url,"alt":""}}),_vm._v(" "),_c('p',[_vm._v(_vm._s(item.title))])])})):_c('div',{staticClass:"nodata"},[_vm._v("\n                          暂时没有节目呢\n                      ")])])])]),_vm._v(" "),_c('h6',{staticClass:"title"},[_vm._v(_vm._s(_vm.videoTitle))])])]],2)])}
var staticRenderFns = [function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('p',[_c('span',[_vm._v("请在右侧节目列表选择节目")])])},function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',{staticClass:"item"},[_c('h5',[_vm._v("\n                      节目列表\n                  ")])])}]
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ var college_videoCommon = (esExports);
// CONCATENATED MODULE: ./src/page/college/videoCommon.vue
function injectStyle (ssrContext) {
  __webpack_require__("AH1q")
}
var normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  videoCommon,
  college_videoCommon,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)

/* harmony default export */ var page_college_videoCommon = __webpack_exports__["default"] = (Component.exports);


/***/ }),

/***/ "jyFz":
/***/ (function(module, exports, __webpack_require__) {

/**
 * Copyright (c) 2014-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */

// This method of obtaining a reference to the global object needs to be
// kept identical to the way it is obtained in runtime.js
var g = (function() { return this })() || Function("return this")();

// Use `getOwnPropertyNames` because not all browsers support calling
// `hasOwnProperty` on the global `self` object in a worker. See #183.
var hadRuntime = g.regeneratorRuntime &&
  Object.getOwnPropertyNames(g).indexOf("regeneratorRuntime") >= 0;

// Save the old regeneratorRuntime in case it needs to be restored later.
var oldRuntime = hadRuntime && g.regeneratorRuntime;

// Force reevalutation of runtime.js.
g.regeneratorRuntime = undefined;

module.exports = __webpack_require__("SldL");

if (hadRuntime) {
  // Restore the original runtime.
  g.regeneratorRuntime = oldRuntime;
} else {
  // Remove the global property added by runtime.js.
  try {
    delete g.regeneratorRuntime;
  } catch(e) {
    g.regeneratorRuntime = undefined;
  }
}


/***/ }),

/***/ "mEU3":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/page/about/about.vue
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

__webpack_require__("mgS3");
/* harmony default export */ var about = ({
  data: function data() {
    return {
      headerOption: { //头部轮播图
        slidesPerView: 4,
        spaceBetween: 48,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev'
        }
      },
      AboutUs: [], //公司信息
      honorsList: [], //荣誉资质
      jobList: [], //招聘列表
      Introduction: [], //相关介绍
      metaInfo: { //seo
        title: '',
        name: '',
        content: ''
      }
    };
  },

  name: 'async',
  metaInfo: function metaInfo() {
    return {
      title: this.metaInfo.title,
      meta: [{
        name: this.metaInfo.name, //keyWords
        content: this.metaInfo.content
      }],
      link: [{ // set link
        rel: 'lexinamc',
        href: 'document.location.hostname'
      }]
    };
  },
  mounted: function mounted() {
    this.getContentSetting();
    this.getJob();
    this.getHonors();
    this.getRelatedIntroduction();
    this.getAboutUs();
  },

  methods: {
    getAboutUs: function getAboutUs() {
      var _this = this;

      this.$request.get('/ContentManage/getAboutUs', {}, function (res) {
        console.log(res);
        _this.AboutUs = res.data;
        _this.initMap();
      });
    },
    getContentSetting: function getContentSetting() {
      var _this2 = this;

      //获取网站内容设置
      this.$request.get('/ContentManage/getContentSetting', '', function (res) {
        console.log(res);
        if (res.code == 200) {
          _this2.metaInfo.title = res.data[0].title + '-关于我们';
          _this2.metaInfo.name = res.data[0].SEO_antistop;
          _this2.metaInfo.content = res.data[0].describe;
        }
      });
    },
    getJob: function getJob() {
      var _this3 = this;

      //获取再招职位
      this.$request.get('/ContentManage/getRecruitment', '', function (res) {
        if (res.code == 200) {
          _this3.jobList = res.data;
        }
      });
    },
    getRelatedIntroduction: function getRelatedIntroduction() {
      var _this4 = this;

      //获取相关介绍
      this.$request.get('/ContentManage/getRelatedIntroduction', '', function (res) {
        if (res.code == 200) {
          _this4.Introduction = res.data;
        }
      });
    },
    getHonors: function getHonors() {
      var _this5 = this;

      //获取荣誉质证
      this.$request.get('/Home/getHonors', '', function (res) {
        if (res.code == 200) {
          _this5.honorsList = res.data;
        }
      });
    },

    //这几个地方加this
    initMap: function initMap() {
      this.createMap(); //创建地图
      this.setMapEvent(); //设置地图事件
      this.addMapControl(); //向地图添加控件
      this.addMarker(); //向地图中添加marker
    },
    createMap: function createMap() {
      var map = new BMap.Map("dituContent"); //在百度地图容器中创建一个地图
      var point = new BMap.Point(113.32113, 23.132749); //定义一个中心点坐标
      map.centerAndZoom(point, 18); //设定地图的中心点和坐标并将地图显示在地图容器中
      window.map = map; //将map变量存储在全局
    },
    setMapEvent: function setMapEvent() {
      map.enableDragging(); //启用地图拖拽事件，默认启用(可不写)
      map.enableScrollWheelZoom(); //启用地图滚轮放大缩小
      map.enableDoubleClickZoom(); //启用鼠标双击放大，默认启用(可不写)
      map.enableKeyboard(); //启用键盘上下左右键移动地图
    },
    addMapControl: function addMapControl() {
      //向地图中添加缩放控件
      var ctrl_nav = new BMap.NavigationControl({ anchor: BMAP_ANCHOR_TOP_LEFT, type: BMAP_NAVIGATION_CONTROL_LARGE });
      map.addControl(ctrl_nav);
      //向地图中添加缩略图控件
      var ctrl_ove = new BMap.OverviewMapControl({ anchor: BMAP_ANCHOR_BOTTOM_RIGHT, isOpen: 1 });
      map.addControl(ctrl_ove);
      //向地图中添加比例尺控件
      var ctrl_sca = new BMap.ScaleControl({ anchor: BMAP_ANCHOR_BOTTOM_LEFT });
      map.addControl(ctrl_sca);
    },

    //标注点数组
    //创建marker
    addMarker: function addMarker() {
      var markerArr = [{
        title: this.AboutUs.company_name,
        content: "地址：" + this.AboutUs.address + "<br/>电话：" + this.AboutUs.telephone,
        point: "113.32113|23.132749",
        isOpen: 1,
        icon: { w: 23, h: 25, l: 46, t: 21, x: 9, lb: 12 }
      }];
      for (var i = 0; i < markerArr.length; i++) {
        var json = markerArr[i];
        var p0 = json.point.split("|")[0];
        var p1 = json.point.split("|")[1];
        var point = new BMap.Point(p0, p1);
        //这个地方加this
        var iconImg = this.createIcon(json.icon);
        var marker = new BMap.Marker(point, { icon: iconImg });
        //这个地方加this
        var iw = this.createInfoWindow(i);
        var label = new BMap.Label(json.title, { "offset": new BMap.Size(json.icon.lb - json.icon.x + 10, -20) });
        marker.setLabel(label);
        map.addOverlay(marker);
        label.setStyle({
          borderColor: "#808080",
          color: "#333",
          cursor: "pointer"
        });
        var index = i;
        //这个地方加this
        var _iw = this.createInfoWindow(i);
        var _marker = marker;
        marker.addEventListener("click", function () {
          //这个地方加this
          this.openInfoWindow(_iw);
        });
        iw.addEventListener("open", function () {
          _marker.getLabel().hide();
        });
        _iw.addEventListener("close", function () {
          _marker.getLabel().show();
        });
        label.addEventListener("click", function () {
          _marker.openInfoWindow(_iw);
        });
        if (!!json.isOpen) {
          label.hide();
          _marker.openInfoWindow(_iw);
        }
      }
    },

    //创建InfoWindow
    createInfoWindow: function createInfoWindow(i) {
      //这个地方复制一下上面的var markerArr 不然会不显示报错
      var markerArr = [{
        title: this.AboutUs.company_name,
        content: "地址：" + this.AboutUs.address + "<br/>电话：" + this.AboutUs.telephone,
        point: "113.32113|23.132749",
        isOpen: 1,
        icon: { w: 23, h: 25, l: 46, t: 21, x: 9, lb: 12 }
      }];
      var json = markerArr[i];
      var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>" + json.content + "</div>");
      return iw;
    },

    //创建一个Icon
    createIcon: function createIcon(json) {
      //这个地方我是用本地图标图片的
      var tubiao = __webpack_require__("dF6/");
      var icon = new BMap.Icon(tubiao, new BMap.Size(json.w, json.h), {
        imageOffset: new BMap.Size(-json.l, -json.t),
        infoWindowOffset: new BMap.Size(json.lb + 5, 1),
        offset: new BMap.Size(json.x, json.h)
      });
      return icon;
    }
  }

});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-01e2a018","hasScoped":false,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/page/about/about.vue
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('main',{staticClass:"about"},[_vm._m(0),_vm._v(" "),_c('article',{staticClass:"main"},[_c('section',{staticClass:"info"},[_c('h2',[_vm._v("公司简介")]),_vm._v(" "),_c('div',{staticClass:"content"},[_c('p',{domProps:{"innerHTML":_vm._s(_vm.AboutUs.profile)}})])]),_vm._v(" "),_c('section',{staticClass:"course"},[_c('h2',[_vm._v("公司历程")]),_vm._v(" "),_c('img',{attrs:{"src":_vm.AboutUs.development}})])]),_vm._v(" "),_c('article',{staticClass:"features"},[_c('section',{staticClass:"main"},[_c('h2',[_vm._v("平台特色")]),_vm._v(" "),_c('img',{attrs:{"src":_vm.AboutUs.features}})])]),_vm._v(" "),_c('article',{staticClass:"main",staticStyle:{"padding-top":"90px"}},[_c('section',{staticClass:"code"},[_c('div',{staticClass:"line"}),_vm._v(" "),_c('div',{staticClass:"listCode"},[_c('ul',_vm._l((_vm.Introduction),function(item,index){return (index<2)?_c('li',[_c('div',{staticClass:"left"},[_c('div',{staticClass:"ionic"},[_c('img',{attrs:{"src":item.icon}})]),_vm._v(" "),_c('h2',[_vm._v("\n                "+_vm._s(item.title)+"\n                "),_c('p',[_vm._v("最新最热股市资讯")])]),_vm._v(" "),_c('div',{staticClass:"content",domProps:{"innerHTML":_vm._s(item.content)}})]),_vm._v(" "),_c('div',{staticClass:"right"},[_c('img',{attrs:{"src":item.qr_code}})])]):_vm._e()}))])]),_vm._v(" "),_c('section',{staticClass:"job"},[_c('h2',[_vm._v("招聘英才")]),_vm._v(" "),_c('div',{staticClass:"listJob"},[_c('ul',_vm._l((_vm.jobList),function(item){return _c('li',[_c('h3',[_vm._v(_vm._s(item.position_name))]),_vm._v(" "),_c('div',{staticClass:"bottom"},[_c('span',[_vm._v("地点："+_vm._s(item.address))]),_vm._v(" "),_c('router-link',{attrs:{"to":'/job/'+item.id}},[_vm._v("\n                马上加入\n              ")])],1)])}))])])]),_vm._v(" "),_c('article',{staticClass:"honor"},[_c('section',{staticClass:"swiperBox"},[_c('h2',[_vm._v("公司荣誉资质")]),_vm._v(" "),_c('swiper',{staticClass:"top-banner",attrs:{"options":_vm.headerOption}},_vm._l((_vm.honorsList),function(item){return _c('swiper-slide',{key:item.id},[_c('router-link',{attrs:{"to":""}},[_c('div',{staticClass:"img"},[_c('img',{attrs:{"src":("" + (item.img)),"alt":item.name}})]),_vm._v(" "),_c('p',[_vm._v(_vm._s(item.name))])])],1)})),_vm._v(" "),_c('div',{staticClass:"swiper-button-next"}),_vm._v(" "),_c('div',{staticClass:"swiper-button-prev"})],1)]),_vm._v(" "),_c('article',{staticClass:"contactBox"},[_c('section',{staticClass:"contact"},[_c('h2',[_vm._v("联系我们")]),_vm._v(" "),_c('div',{staticClass:"box"},[_c('div',{staticClass:"left"},[_c('h3',[_vm._v("广州总部")]),_vm._v(" "),_c('p',[_vm._v("地址: "+_vm._s(_vm.AboutUs.address))]),_vm._v(" "),_c('p',[_vm._v("电话： "+_vm._s(_vm.AboutUs.telephone))]),_vm._v(" "),_c('p',[_vm._v("客服QQ： "+_vm._s(_vm.AboutUs.QQ))]),_vm._v(" "),_c('h4',[_vm._v("商务合作")]),_vm._v(" "),_c('p',[_vm._v("电话： "+_vm._s(_vm.AboutUs.telephone))]),_vm._v(" "),_c('p',[_vm._v("QQ： "+_vm._s(_vm.AboutUs.QQ))])]),_vm._v(" "),_vm._m(1)])])])])}
var staticRenderFns = [function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('header',[_c('div',{staticClass:"main"},[_c('h2',[_vm._v("\n        关于我们\n        "),_c('p',[_vm._v("ABOUT")])])])])},function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',{staticClass:"right"},[_c('div',{staticStyle:{"width":"100%","height":"450px","border":"#ccc solid 1px"},attrs:{"id":"dituContent"}})])}]
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ var about_about = (esExports);
// CONCATENATED MODULE: ./src/page/about/about.vue
function injectStyle (ssrContext) {
  __webpack_require__("EqkN")
}
var normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  about,
  about_about,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)

/* harmony default export */ var page_about_about = __webpack_exports__["default"] = (Component.exports);


/***/ }),

/***/ "mF5b":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "mgS3":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "mipW":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";

// EXTERNAL MODULE: ./src/assets/images/1.1/imgbg.jpg
var imgbg = __webpack_require__("VrL8");
var imgbg_default = /*#__PURE__*/__webpack_require__.n(imgbg);

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/components/column/list.vue
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ var list = ({
  props: ['pointlist'],
  created: function created() {},

  methods: {
    coverPic: function coverPic(coverUrl) {
      //封面图
      var url = '';
      if (coverUrl !== null) {
        if (coverUrl.indexOf('http') < 0) {
          url = 'http://os700oap7.bkt.clouddn.com/' + coverUrl;
        } else {
          url = coverUrl;
        }
      } else {
        url = imgbg_default.a;
      }
      return url;
    },
    computeTime: function computeTime(pTime) {
      //计算时间差
      var minute = 1000 * 60;
      var hour = minute * 60;
      var day = hour * 24;
      var now = new Date();
      var year = new Date().getFullYear();
      var year1 = new Date(pTime).getFullYear();
      var pStamp = new Date(pTime.split('-').join('/'));
      var diffValue = now - pStamp;
      var minDiff = diffValue / minute; //分钟差
      var hourDiff = diffValue / hour; //小时差
      var timeText = '';
      if (now.toLocaleDateString() == pStamp.toLocaleDateString()) {
        //是否今天
        if (minDiff <= 30) {
          if (parseInt(minDiff) < 1) {
            timeText = '1\u5206\u949F\u524D';
          } else {
            timeText = parseInt(minDiff) + '\u5206\u949F\u524D';
          }
        } else if (minDiff > 30 && minDiff < 60) {
          timeText = '1小时前';
        } else if (minDiff >= 60 && minDiff < 120) {
          timeText = '2小时前';
        } else if (hourDiff > 2 && hourDiff < 24) {
          timeText = pTime.substr(11, 5);
        }
      } else if (year == year1) {
        timeText = pTime.substr(5, 5);
      } else {
        timeText = pTime.split(' ')[0];
      }
      return timeText;
    }
  }

});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-d6e0b196","hasScoped":false,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/components/column/list.vue
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',{staticClass:"list-main"},[_c('router-link',{attrs:{"to":'/pointDetail/'+ _vm.pointlist.id,"target":"_blank"}},[_c('img',{attrs:{"src":_vm.coverPic(_vm.pointlist.coverPic),"alt":""}}),_vm._v(" "),_c('div',[_c('h5',[(_vm.pointlist.column_top_status)?_c('span',{staticClass:"top"},[_vm._v("TOP")]):_vm._e(),_vm._v(" "),(_vm.pointlist.level)?_c('span',{staticClass:"lock"}):_vm._e(),_vm._v("\n                "+_vm._s(_vm.pointlist.title)+"\n            ")]),_vm._v(" "),_c('p',{staticClass:"p"},[_vm._v("\n                "+_vm._s(_vm.pointlist.lead)+"\n            ")]),_vm._v(" "),_c('h6',[_c('p',[_c('span',[_vm._v("\n                        "+_vm._s(_vm.computeTime(_vm.pointlist.publish_time))+"\n                    ")]),_vm._v(" "),_c('span',[_vm._v("来自 ")]),_c('span',{staticClass:"name"},[_vm._v(_vm._s(_vm.pointlist.alias != undefined?_vm.pointlist.alias:_vm.pointlist.author))])]),_vm._v(" "),(_vm.pointlist.title_cate != undefined)?_c('p',{staticClass:"cate"},_vm._l((_vm.pointlist.title_cate),function(tag,index){return _c('span',{directives:[{name:"show",rawName:"v-show",value:(tag),expression:"tag"}]},[_vm._v(_vm._s(tag))])})):_vm._e()])])])],1)}
var staticRenderFns = []
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ var column_list = (esExports);
// CONCATENATED MODULE: ./src/components/column/list.vue
function injectStyle (ssrContext) {
  __webpack_require__("H5cG")
}
var normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  list,
  column_list,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)

/* harmony default export */ var components_column_list = __webpack_exports__["a"] = (Component.exports);


/***/ }),

/***/ "muw+":
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "static/img/xq_saoma.png";

/***/ }),

/***/ "nIqy":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";

// EXTERNAL MODULE: ./src/assets/images/1.1/imgbg.jpg
var imgbg = __webpack_require__("VrL8");
var imgbg_default = /*#__PURE__*/__webpack_require__.n(imgbg);

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/components/pointList/list.vue
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ var list = ({
  props: ['viewPointList'],
  data: function data() {
    return {};
  },

  methods: {
    coverPic: function coverPic(coverUrl) {
      //封面图
      var url = '';
      if (coverUrl !== null) {
        if (coverUrl.indexOf('http') < 0) {
          url = 'http://os700oap7.bkt.clouddn.com/' + coverUrl;
        } else {
          url = coverUrl;
        }
      } else {
        url = imgbg_default.a;
      }
      return url;
    },
    computeTime: function computeTime(pTime) {
      //计算时间差
      var minute = 1000 * 60;
      var hour = minute * 60;
      var day = hour * 24;
      var now = new Date();
      var pStamp = new Date(pTime.split('-').join('/'));
      var diffValue = now - pStamp;
      var minDiff = diffValue / minute; //分钟差
      var hourDiff = diffValue / hour; //小时差
      var timeText = '';
      if (now.toLocaleDateString() == pStamp.toLocaleDateString()) {
        //是否今天
        if (minDiff <= 30) {
          if (parseInt(minDiff) < 1) {
            timeText = '1\u5206\u949F\u524D';
          } else {
            timeText = parseInt(minDiff) + '\u5206\u949F\u524D';
          }
        } else if (minDiff > 30 && minDiff < 60) {
          timeText = '1小时前';
        } else if (minDiff >= 60 && minDiff < 120) {
          timeText = '2小时前';
        } else if (hourDiff > 2 && hourDiff < 24) {
          timeText = pTime.substr(11, 5);
        }
      } else {
        timeText = pTime.substr(5, 5);
      }
      return timeText;
    }
  }
});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-baa58d12","hasScoped":true,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/components/pointList/list.vue
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('main',{staticClass:"view-list"},[_c('ul',_vm._l((_vm.viewPointList),function(item,index){return _c('li',{staticClass:"item clearfix"},[_c('router-link',{attrs:{"target":"_blank","to":("/pointDetail/" + (item.id))}},[_c('section',{staticClass:"pic"},[_c('img',{attrs:{"src":_vm.coverPic(item.coverPic),"alt":""}})]),_vm._v(" "),_c('section',{staticClass:"info"},[_c('h1',{staticClass:"title"},[(item.column_top_status)?_c('span',{staticClass:"top"},[_vm._v("TOP")]):_vm._e(),_vm._v(" "),(item.level)?_c('span',{staticClass:"lock"}):_vm._e(),_vm._v("\n            "+_vm._s(item.title)+"\n          ")]),_vm._v(" "),_c('p',{staticClass:"lead"},[_vm._v(_vm._s(item.lead))]),_vm._v(" "),_c('section',{staticClass:"source clearfix"},[_c('p',[_vm._v(_vm._s(_vm.computeTime(item.publish_time))+"  来自 "),_c('i',{staticClass:"red"},[_vm._v(_vm._s(item.alias?item.alias:item.author))])]),_vm._v(" "),_c('ul',{staticClass:"tag"},_vm._l((item.title_cate),function(tag,index){return _c('li',{directives:[{name:"show",rawName:"v-show",value:(tag),expression:"tag"}]},[_vm._v(_vm._s(tag))])}))])])])],1)}))])}
var staticRenderFns = []
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ var pointList_list = (esExports);
// CONCATENATED MODULE: ./src/components/pointList/list.vue
function injectStyle (ssrContext) {
  __webpack_require__("6U5z")
}
var normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = "data-v-baa58d12"
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  list,
  pointList_list,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)

/* harmony default export */ var components_pointList_list = __webpack_exports__["a"] = (Component.exports);


/***/ }),

/***/ "o3I3":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "p0Og":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });

// EXTERNAL MODULE: ./src/components/college/course-list.vue + 2 modules
var course_list = __webpack_require__("4bsv");

// EXTERNAL MODULE: ./src/components/pointList/list.vue + 2 modules
var list = __webpack_require__("nIqy");

// EXTERNAL MODULE: ./src/components/common/video.vue + 2 modules
var video = __webpack_require__("AQ5S");

// EXTERNAL MODULE: ./src/assets/images/1.1/imgbg.jpg
var imgbg = __webpack_require__("VrL8");
var imgbg_default = /*#__PURE__*/__webpack_require__.n(imgbg);

// EXTERNAL MODULE: ./src/assets/images/default/imgbg2.jpg
var imgbg2 = __webpack_require__("YikS");
var imgbg2_default = /*#__PURE__*/__webpack_require__.n(imgbg2);

// EXTERNAL MODULE: ./src/components/pointList/lock-popup.vue + 8 modules
var lock_popup = __webpack_require__("C5wJ");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/page/college/introduction.vue
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//








/* harmony default export */ var introduction = ({
  data: function data() {
    return {
      selected: 1,
      teacherId: this.$route.params.teacherId,
      viewPointList: [],
      playerOptions: {
        muted: false,
        sources: {
          // type: '',
          // src: '',
          type: "video/mp4",
          src: "http://oqt46pvmm.bkt.clouddn.com/o_1c4c623e2ccsnbf17gtb0d14mfh.mp4",
          withCredentials: false
        },
        poster: imgbg2_default.a, //https://surmon-china.github.io/vue-quill-editor/static/images/surmon-6.jpg
        language: 'en',
        live: true,
        autoplay: false,
        width: '850px',
        height: '478px'
      },
      teacherInfo: '', //讲师资料
      /*selfWords:'',//他的介绍
      selfVideo:'',//视频介绍
      courseList:[],
      pointList:[],
      defaultCover:defaultCover,
      courseParams:{
        userId:this.$route.params.teacherId,
        pageNo:1,
        perPage:6,
        statusIn: '0,1,4',
        pid: 0,
        open_status:1
      },
      pointParams:{
        userId: this.$route.params.teacherId,
        pageNo: 1,
        perPage: 10,
        orderBy: 'top_status desc,publish_time desc',
        status: 1,
        isImageInfo: true
      },
      isEnd:false, //是否有更多课程
      isEndPoint:false,//是否有更多观点*/
      metaInfo: { //seo
        title: '',
        name: '',
        content: ''
      },
      courseAd: '', //教学课程
      showPopup: false, //是否显示弹窗
      vedioList: "" //节目列表数据
    };
  },

  name: 'async',
  metaInfo: function metaInfo() {
    return {
      title: this.metaInfo.title,
      meta: [{
        name: this.metaInfo.name, //keyWords
        content: this.metaInfo.content
      }],
      link: [{ // set link
        rel: 'lexinamc',
        href: 'document.location.hostname'
      }]
    };
  },
  created: function created() {
    this.getUserLiveInfoByUserId();
    this.isLogin();
    this.getContentSetting();
    this.courseBanner();
    this.getVideoList();
    /*this.$nextTick(() => {
      window.scrollTo(0, 1);
      window.scrollTo(0, 0);
    })*/
  },

  methods: {
    /*
    * 获取视频列表
    * */
    getVideoList: function getVideoList() {
      var _this = this;

      this.$request.get('/Video/getVideoList', {
        field: null,
        pageNo: 1,
        perPage: 100,
        orderBy: 'id asc',
        uid: 1706865,
        status: 1,
        open_status: 1
      }, function (res) {
        _this.vedioList = res.data;
      });
    },

    /*
    * 判断是否登录
    * */
    getLogin: function getLogin() {
      var _this2 = this;

      this.checkWechatLoginIn(function (res) {
        if (res.code == -5002) {
          //未登录
          window.location.href = res.data.url;
        } else if (res.code == 200) {
          //已登录
          _this2.showPopupFn();
          _this2.setCookie('isRegister', res.data.isRegister);
        }
      });
    },

    /*
    弹窗开、关
    */
    showPopupFn: function showPopupFn() {
      this.showPopup = true;
      document.getElementsByTagName('body')[0].style.overflow = 'hidden';
    },
    closePopupFn: function closePopupFn() {
      this.showPopup = false;
      document.getElementsByTagName('body')[0].style.overflow = 'auto';
    },

    /*
    * 获取“教学课程”数据
    * */
    courseBanner: function courseBanner() {
      var _this3 = this;

      this.$request.get('College/getTeacherIntroductionCourseBanner', { userId: 1707556 }, function (res) {
        _this3.courseAd = res.data;
      });
    },
    courseJump: function courseJump(item) {
      var url = '';
      if (item.type == 1) {
        //专题课
        url = '/specialCourseDetail/' + item.id;
      } else if (item.type == 2) {
        //系列课
        url = '/seriesCourseDetail/' + item.id;
      }
      return url;
    },
    imgSrc: function imgSrc(url) {
      //图片是否被七牛压缩
      var imgUrl = '';
      if (url.indexOf('?') > 0) {
        imgUrl = url.split('?')[0]; //去除七牛图片后缀
      } else {
        imgUrl = url;
      }
      return imgUrl;
    },
    computeTime: function computeTime(pTime) {
      //计算时间差
      var minute = 1000 * 60;
      var hour = minute * 60;
      var day = hour * 24;
      var now = new Date();
      var pStamp = new Date(pTime.split('-').join('/'));
      var diffValue = now - pStamp;
      var minDiff = diffValue / minute; //分钟差
      var hourDiff = diffValue / hour; //小时差
      var timeText = '';
      if (now.toLocaleDateString() == pStamp.toLocaleDateString()) {
        //是否今天
        if (minDiff <= 30) {
          if (parseInt(minDiff) < 1) {
            timeText = '1\u5206\u949F\u524D';
          } else {
            timeText = parseInt(minDiff) + '\u5206\u949F\u524D';
          }
        } else if (minDiff > 30 && minDiff < 60) {
          timeText = '1小时前';
        } else if (minDiff >= 60 && minDiff < 120) {
          timeText = '2小时前';
        } else if (hourDiff > 2 && hourDiff < 24) {
          timeText = pTime.substr(11, 5);
        }
      } else {
        timeText = pTime.substr(5, 5);
      }
      return timeText;
    },
    getContentSetting: function getContentSetting() {
      var _this4 = this;

      //获取网站内容设置
      this.$request.get('/ContentManage/getContentSetting', '', function (res) {
        console.log(res);
        if (res.code == 200) {
          _this4.metaInfo.title = res.data[0].title + '-讲师介绍';
          _this4.metaInfo.name = res.data[0].SEO_antistop;
          _this4.metaInfo.content = res.data[0].describe;
        }
      });
    },
    pointLoadMore: function pointLoadMore() {
      if (!this.isEndPoint) {
        this.pointParams.pageNo++;
        this.getViewPointListByUserId();
      }
    },
    coverPic: function coverPic(coverUrl) {
      //封面图
      var url = '';
      if (coverUrl !== null) {
        if (coverUrl.indexOf('http') < 0) {
          url = 'http://os700oap7.bkt.clouddn.com/' + coverUrl;
        } else {
          url = coverUrl;
        }
      } else {
        url = imgbg_default.a;
      }
      return url;
    },
    isLogin: function isLogin() {
      var _this5 = this;

      //判斷是否登陸
      this.checkWechatLoginIn(function (res) {
        if (res.code == -5002) {
          // 登录失败跳转登录
          _this5.setCookie('isLogin', 0);
        } else if (res.code == 200) {
          // 登录成功
          console.log('已登陸');
          _this5.setCookie('isLogin', 1);
        }
        //          this.getCourseListByUserId();
        //          this.getViewPointListByUserId();
      });
    },
    getViewPointListByUserId: function getViewPointListByUserId() {
      var _this6 = this;

      //讲师个人观点
      this.$request.get('/Viewpoint/getViewPointListByUserId', this.pointParams, function (res) {
        _this6.pointList = _this6.pointList.concat(res.data.viewpointList);
        if (res.data.viewpointList.length < _this6.pointParams.perPage) {
          _this6.isEndPoint = true;
        } else {
          _this6.isEndPoint = false;
        }
      });
    },
    getCourseListByUserId: function getCourseListByUserId() {
      var _this7 = this;

      //讲师个人课程
      this.$request.get('/Course/getCourseListByUserId', this.courseParams, function (res) {
        _this7.courseList = _this7.courseList.concat(res.data);
        if (res.data.length < _this7.courseParams.perPage) {
          _this7.isEnd = true;
        } else {
          _this7.isEnd = false;
        }
      });
    },
    loadMore: function loadMore() {
      if (!this.isEnd) {
        this.courseParams.pageNo++;
        this.getCourseListByUserId();
      }
    },
    getUserLiveInfoByUserId: function getUserLiveInfoByUserId() {
      var _this8 = this;

      //讲师介绍头部信息
      this.$request.post('/User/getUserLiveInfoByUserId', { userId: this.teacherId }, function (res) {
        _this8.teacherInfo = res.data;
        _this8.selfWords = res.data.imgList;
        _this8.selfVideo = res.data.introductionUrl;
        _this8.playerOptions.sources.src = res.data.introductionUrl.url;
      });
    }
  },
  components: {
    courseList: course_list["a" /* default */],
    pointList: list["a" /* default */],
    videoPlayer: video["a" /* default */],
    lockPopup: lock_popup["a" /* default */]
  }
});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-b1c42f24","hasScoped":false,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/page/college/introduction.vue
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('main',{staticClass:"introduction"},[_c('section',{staticClass:"main clearfix"},[_c('section',{staticClass:"left-contanier"},[_c('header',{staticClass:"header clearfix"},[_c('div',{staticClass:"cover",style:({'background-image':("url(" + (_vm.imgSrc(_vm.teacherInfo.pic)) + ")")})}),_vm._v(" "),_c('section',{staticClass:"words"},[_c('h1',[_vm._v(_vm._s(_vm.teacherInfo.username))]),_vm._v(" "),_c('p'),_vm._v(" "),_c('h4',[_vm._v(_vm._s(_vm.teacherInfo.content))])])]),_vm._v(" "),_c('section',{staticClass:"course"},[_c('div',{staticClass:"self-title"},[_vm._v("教学课程")]),_vm._v(" "),_c('section',{staticClass:"course-item"},[_c('img',{attrs:{"src":_vm.courseAd.adFile,"alt":""}}),_vm._v(" "),_c('h4',[_vm._v(_vm._s(_vm.courseAd.adName))]),_vm._v(" "),_c('div',{staticClass:"bottom"},[(_vm.courseAd.price > 0)?_c('span',{staticClass:"price"},[_vm._v(_vm._s(_vm.courseAd.price))]):_vm._e(),_vm._v(" "),(_vm.courseAd.price == 0)?_c('span',{staticClass:"free"},[_vm._v("免费课程")]):_vm._e(),_vm._v(" "),_c('div',{staticClass:"btn",on:{"click":function($event){_vm.getLogin()}}},[_vm._v("我要报名")])])])])]),_vm._v(" "),_c('section',{staticClass:"right-contanier"},[_vm._m(0),_vm._v(" "),_c('ul',{staticClass:"item-list"},_vm._l((_vm.vedioList),function(item){return _c('li',[_c('router-link',{attrs:{"to":("/videoCommon/" + (item.id))}},[_c('img',{attrs:{"src":item.cover_pc_url,"alt":""}}),_vm._v(" "),_c('p',[_vm._v(_vm._s(item.title))])])],1)}))]),_vm._v(" "),(_vm.showPopup)?[_c('lock-popup',{attrs:{"type":1,"id":_vm.courseAd.relevanceId},on:{"closePopup":_vm.closePopupFn}})]:_vm._e()],2)])}
var staticRenderFns = [function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',{staticClass:"title"},[_c('p',[_vm._v("节目列表")])])}]
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ var college_introduction = (esExports);
// CONCATENATED MODULE: ./src/page/college/introduction.vue
function injectStyle (ssrContext) {
  __webpack_require__("o3I3")
}
var normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  introduction,
  college_introduction,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)

/* harmony default export */ var page_college_introduction = __webpack_exports__["default"] = (Component.exports);


/***/ }),

/***/ "pg7h":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "sNeY":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "sZ7p":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "tBMg":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });

// EXTERNAL MODULE: ./src/components/pointList/list.vue + 2 modules
var list = __webpack_require__("nIqy");

// EXTERNAL MODULE: ./src/components/pointList/lock-popup.vue + 8 modules
var lock_popup = __webpack_require__("C5wJ");

// EXTERNAL MODULE: ./src/assets/images/1.0/userDefault.png
var userDefault = __webpack_require__("x+ic");
var userDefault_default = /*#__PURE__*/__webpack_require__.n(userDefault);

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/page/pointList/pointList.vue
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//



__webpack_require__("mgS3");

/* harmony default export */ var pointList = ({
  created: function created() {
    this.getWebColumns();
    this.liveTeacherList();
    this.getGeneralize();
    this.getContentSetting();
  },
  data: function data() {
    return {
      showPopup: false,
      viewPointList: [], //观点列表
      teacherList: [], //推荐讲师
      teacherOption: { //讲师推荐轮播图
        effect: "slide",
        fadeEffect: {
          crossFade: true
        },
        autoplay: {
          delay: 3000
        },
        pagination: {
          el: ".swiper-pagination"
        }
      },
      adOption: {
        effect: "slide",
        fadeEffect: {
          crossFade: true
        },
        autoplay: {
          delay: 2000
        },
        pagination: {
          el: ".swiper-pagination"
        }
      },
      teacherPageTotal: '', //推荐讲师总页数
      ponitListParams: {
        pageNo: 1,
        perPage: 10,
        isUserInfo: false,
        orderBy: 'column_top_status desc,publish_time desc,id desc',
        status: 1, //已发布的观点，草稿状态不显示
        isImageInfo: true,
        isCate: true,
        column_id: ''
      },
      hasMore: true,
      defaultAvatar: userDefault_default.a,
      adList: [], //广告列表
      selected: 0,
      columnList: [],
      columnLevel: '', //栏目是否收费 0：免费；1：收费',
      metaInfo: { //seo
        title: '',
        name: '',
        content: ''
      }
    };
  },

  name: 'async',
  metaInfo: function metaInfo() {
    return {
      title: this.metaInfo.title,
      meta: [{
        name: this.metaInfo.name, //keyWords
        content: this.metaInfo.content
      }],
      link: [{ // set link
        rel: 'lexinamc',
        href: 'document.location.hostname'
      }]
    };
  },

  methods: {
    getContentSetting: function getContentSetting() {
      var _this = this;

      //获取网站内容设置
      this.$request.get('/ContentManage/getContentSetting', '', function (res) {
        console.log(res);
        if (res.code == 200) {
          _this.metaInfo.title = res.data[0].title + '-大策略观点';
          _this.metaInfo.name = res.data[0].SEO_antistop;
          _this.metaInfo.content = res.data[0].describe;
        }
      });
    },
    selectFn: function selectFn(i, item) {
      this.viewPointList = [];
      this.hasMore = true;
      this.selected = i;
      this.ponitListParams.column_id = item.id;
      this.columnLevel = item.level;
      this.ponitListParams.pageNo = 1;
      this.ponitListParams.perPage = 10;
      this.getViewPointList();
    },
    getGeneralize: function getGeneralize() {
      var _this2 = this;

      //获取广告推广
      this.$request.get('/Home/getGeneralize', '', function (res) {
        if (res.code == 200) {
          _this2.adList = res.data;
        }
      });
    },
    loadMore: function loadMore() {
      var _this3 = this;

      if (this.hasMore) {
        this.ponitListParams.pageNo++;
        setTimeout(function () {
          _this3.getViewPointList();
        }, 10);
      }
    },
    liveTeacherList: function liveTeacherList() {
      var _this4 = this;

      //推荐讲师
      this.$request.get('/CourseManage/teachList', { page: 1, size: '24' }, function (res) {
        if (res.code == 200) {
          _this4.teacherList = res.data;
          _this4.teacherPageTotal = Math.ceil(res.data.length / 6);
        }
      });
    },
    getViewPointList: function getViewPointList() {
      var _this5 = this;

      //观点列表
      this.$request.post('/Viewpoint/getViewPointList', this.ponitListParams, function (res) {
        if (res.code == 200) {
          _this5.viewPointList = _this5.viewPointList.concat(res.data);
          if (res.data.length < _this5.ponitListParams.perPage) {
            _this5.hasMore = false;
          }
        }
      });
    },
    getWebColumns: function getWebColumns() {
      var _this6 = this;

      //获取栏目列表
      this.$request.get("/ContentManage/getWebColumns", { type: true }, function (res) {
        _this6.columnList = res.data;
        _this6.ponitListParams.column_id = res.data[0].id;
        _this6.getViewPointList();
      });
    },
    showPopupFn: function showPopupFn() {
      var _this7 = this;

      //解锁栏目
      this.checkWechatLoginIn(function (res) {
        console.log(res);
        if (res.code == 200) {
          _this7.showPopup = true;
          document.getElementsByTagName('body')[0].style.overflow = 'hidden';
        } else {
          window.location.href = res.data.url;
        }
      });
    },
    closePopupFn: function closePopupFn() {
      this.showPopup = false;
      document.getElementsByTagName('body')[0].style.overflow = 'auto';
    }
  },
  components: {
    list: list["a" /* default */],
    lockPopup: lock_popup["a" /* default */]
  }
});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-7739b612","hasScoped":false,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/page/pointList/pointList.vue
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('main',{staticClass:"point-list"},[_c('article',{staticClass:"top-container clearfix"},[_c('section',{staticClass:"container-left"},[_c('section',{staticClass:"tab-list"},[_c('ul',{staticClass:"clearfix"},_vm._l((_vm.columnList),function(item,index){return _c('li',{class:{'active':index == _vm.selected},on:{"click":function($event){_vm.selectFn(index,item)}}},[_vm._v(_vm._s(item.name))])}))]),_vm._v(" "),_c('list',{attrs:{"viewPointList":_vm.viewPointList}}),_vm._v(" "),(_vm.hasMore)?_c('section',{staticClass:"more-block"},[_c('section',{staticClass:"more",on:{"click":_vm.loadMore}},[_vm._v("加载更多")])]):_vm._e()],1),_vm._v(" "),_c('section',{staticClass:"container-right"},[(_vm.columnLevel == 1)?_c('a',{staticClass:"locker",attrs:{"href":"javascript:;"},on:{"click":_vm.showPopupFn}},[_c('span'),_vm._v("解锁对应栏目\n      ")]):_vm._e(),_vm._v(" "),_c('section',{staticClass:"teacher-list"},[_vm._m(0),_vm._v(" "),_c('swiper',{staticClass:"teacher-swiper",attrs:{"options":_vm.teacherOption}},[_vm._l((_vm.teacherPageTotal),function(i){return [_c('swiper-slide',[_c('ul',{staticClass:"list clearfix"},_vm._l((_vm.teacherList),function(item,index){return _c('li',{directives:[{name:"show",rawName:"v-show",value:((index > 6*i-7 && index < 6*i)),expression:"(index > 6*i-7 && index < 6*i)"}]},[_c('router-link',{attrs:{"target":"_blank","to":("/teacherIntroduction/" + (item.user_id))}},[_c('img',{attrs:{"src":item.head_add?item.head_add:_vm.defaultAvatar,"alt":""}}),_vm._v(" "),_c('p',[_vm._v(_vm._s(item.alias))])])],1)}))])]}),_vm._v(" "),_c('div',{staticClass:"swiper-pagination",attrs:{"slot":"pagination"},slot:"pagination"})],2)],1),_vm._v(" "),_c('section',{staticClass:"ad-eare"},[_c('swiper',{staticClass:"teacher-swiper ad-swiper",attrs:{"options":_vm.adOption}},[_vm._l((_vm.adList),function(item,index){return [_c('swiper-slide',[_c('a',{attrs:{"href":item.url,"target":"_blank"}},[_c('div',{staticClass:"item"},[_c('img',{attrs:{"src":item.cover_img,"alt":""}})])])])]}),_vm._v(" "),_c('div',{staticClass:"swiper-pagination",attrs:{"slot":"pagination"},slot:"pagination"})],2)],1)])]),_vm._v(" "),(_vm.showPopup)?_c('lock-popup',{on:{"closePopup":_vm.closePopupFn}}):_vm._e()],1)}
var staticRenderFns = [function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',{staticClass:"title"},[_c('p',[_vm._v("推荐讲师")])])}]
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ var pointList_pointList = (esExports);
// CONCATENATED MODULE: ./src/page/pointList/pointList.vue
function injectStyle (ssrContext) {
  __webpack_require__("mF5b")
}
var normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  pointList,
  pointList_pointList,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)

/* harmony default export */ var page_pointList_pointList = __webpack_exports__["default"] = (Component.exports);


/***/ }),

/***/ "tBsc":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "uHph":
/***/ (function(module, exports) {

module.exports = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADoAAAA6CAYAAADhu0ooAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyhpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTMyIDc5LjE1OTI4NCwgMjAxNi8wNC8xOS0xMzoxMzo0MCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTUuNSAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6Q0MwMkIxMDM0NzY5MTFFOEJEOTBCQ0Y4RkFGRDQwNDkiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6Q0MwMkIxMDQ0NzY5MTFFOEJEOTBCQ0Y4RkFGRDQwNDkiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpDQzAyQjEwMTQ3NjkxMUU4QkQ5MEJDRjhGQUZENDA0OSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpDQzAyQjEwMjQ3NjkxMUU4QkQ5MEJDRjhGQUZENDA0OSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Psw/jfgAAATGSURBVHja3JvZbw1RHMenN7Qv99JK2qa0tNKqpeGhRBFiScSDF1drifgDVJtoSuyNFx7EFrxLEIl9i3hAhAQlttjq5oqlVcSlxUViSa7vT7/DZNzSO3NmuX7J56HLnHO+55yZOb9lMhKJhOaAZYKxYBwYAoaCgSAbhPg/cfAOPAePwT1wCVwFX1UPKEOhUBFRA2aD8SACLoK7IAraKOwD/78PrykCpWAkmATKwWVwGBwCnUpGJ0JtUgF2gffgBJgLsm20l802jrPNXezD1jjtXFwMDoAYWAfyFEyamTy2HWNfxW4KzQSrwFvQBEIOCDQTYl/S52qOwVGhZeA6OAVKXBBopoR93+RYHBE6C7wG9SDDA5E60ncdxxJWLbQWtILRHgo0M5pjqlUldC14CAb6SKROEWjhGG0JXQQiIN+HInXyuRCLrAqV/f8UFPpYpE4hxzo7VaGlvNkr00CkTiXft6U9FZoFbvDpqqUZ9Xz1ZJn/FkhyKmwEL8AOLf1MxtwOlv7rUF8CmkElvYp0tEJwA1SBJ/ovzSu6nrNiVeRM8BK8AvWglwdCZezbwYbuvJcy3sx2zq7y5DPabTDRg3tVNLwBQ5Ldo8vBTjrEVm2Q6edR4ALYAwpcXNU4tSw3r6jMQCfItTmTf7N3oAH0cmlV86gpZFzRMKMBMQdnuS/YAm6DyS6s6mtqChsfRvPAXpe21QhwHuwD/R3uS26Z+frWzeS2UuFAp2pxsMyKI91Dgty+WQG+b+7bfAhZtSDYCG6BaQ60/5HaxgYYkmz2+CU/HJwFBxgWVWkSPq0KMMwY8cmppoYrsJKxYRUm2spF6GDQ4qMjXJCnGgloz1DQXosuVJ58z3x4Zi0Dp8ERm9tZtA0QoTmMoPvVZoGHYI7F6yXSHxLvRdyXDEWDSjgoWA4zeRav/RJII/fL6iRm6iejOBM+frbPoM7itZK9iwe4h7N9LFKyasPAQbtCXyRxr/xg8v6bDqpBq412JC3ZHmASdpiPBMqxbQUPMmcUtCfaIhLquMPkqx9sPwNbKuNVknGPyIpe4cHeS3sAptJdVB2Uq/p5lqeL1EmXxgs3rRH0dtBN69DdtK884c9wcQUTdLxlW20G3xzqRzRdMx4Y5BG+0CWRclifAhYwNOqkLaS2X8GxHBZGOBkck9tjiYvBsVxqyjEGx+TQcBTUOrRNd9O53ga+u7RzRMsxTS/fMczACAZ9gwoD2LfABA8C2EFqqUgWwBbP/hxosDGLi7WudISekhijdVWDuW0N1HLv9776s+oj5lHFiSqKk2kwu2mSfdqqpWfKULedfBY8Mf4ymT8q77UCG26Rl1bH0NCmPx+J3af2Y/97al+nGrR1d6HPKGXNUbWd8ptoGpTfRO2U3+g0sWip6H8uqDJWe7T5sESurafVM6k0HGbtUZ0PRDpW9Gisc5AapJMeHSqK2XfKZaypxnWjhuzbdbBW+/0xgJMmfazRuspqmhk1iKbmWqgpNW9yqNQ8l22/YV+Wd5HqjweOgTkKPh6oYVvKPh5Q+TlIP+Y3w9zekhi6yCjjI63rc5AO8An0ZnpQElz5zJzpn4MM5fY8zKB1h4rBqRRqzndUkXJSQGFBQ/y2k8mjx5yQyxSp/AOfHwIMAFQVgy5nUDdQAAAAAElFTkSuQmCC"

/***/ }),

/***/ "vEDX":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "vi3a":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "wiLd":
/***/ (function(module, exports) {

module.exports = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAIAAAABc2X6AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyFpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTQyIDc5LjE2MDkyNCwgMjAxNy8wNy8xMy0wMTowNjozOSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIChXaW5kb3dzKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDowQTdENEZBNTM2NUExMUU4QjcyMDkxQ0M0RDc3QUNCMyIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDowQTdENEZBNjM2NUExMUU4QjcyMDkxQ0M0RDc3QUNCMyI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjBBN0Q0RkEzMzY1QTExRThCNzIwOTFDQzRENzdBQ0IzIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjBBN0Q0RkE0MzY1QTExRThCNzIwOTFDQzRENzdBQ0IzIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+GsXxOgAADJ1JREFUeNrsmwlwVOUd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"

/***/ }),

/***/ "wqpP":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });

// EXTERNAL MODULE: ./src/components/college/introduce-course.vue + 2 modules
var introduce_course = __webpack_require__("yKMm");

// EXTERNAL MODULE: ./src/components/college/introduce-teacher.vue + 2 modules
var introduce_teacher = __webpack_require__("e8l8");

// EXTERNAL MODULE: ./src/components/college/course.vue + 2 modules
var course = __webpack_require__("T3yJ");

// EXTERNAL MODULE: ./src/components/pointList/lock-popup.vue + 8 modules
var lock_popup = __webpack_require__("C5wJ");

// EXTERNAL MODULE: ./src/components/common/video.vue + 2 modules
var video = __webpack_require__("AQ5S");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/page/college/specialCourseDetail.vue
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

__webpack_require__("mgS3");





/* harmony default export */ var specialCourseDetail = ({
  data: function data() {
    return {
      courseId: this.$route.params.courseId,
      hotSaleOption: {
        slidesPerView: 4,
        // spaceBetween: 13.33,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev"
        }
      }, //相关课程轮播属性
      playerOptions: {
        // muted: false,
        sources: {
          // type: '',
          // src: '',
          type: "video/mp4",
          src: "http://vjs.zencdn.net/v/oceans.mp4"
          // withCredentials: false
        },
        poster: "/static/img/imgbg.jpg", //https://surmon-china.github.io/vue-quill-editor/static/images/surmon-6.jpg
        language: "zh-CN",
        // live: false,
        // techOrder: ['flash'],
        autoplay: false,
        width: "100%",
        height: 534
      },
      privacypop: false, //私密课弹窗
      paypop: false, //私密课弹窗
      moneypop: false, //付费弹窗
      sujectList: [], //相关课程推荐
      courseData: [],
      isLoginFlag: 1, //1没登录，2已登录
      loginRes: "",
      loaded: false,
      pass: "", //密码
      checkStatus: false,
      videoshow: false,
      videoPlay: true,
      privacySucc: false,
      metaInfo: {
        //seo
        title: "",
        name: "",
        content: ""
      },
      userId: '' //用户id
    };
  },

  name: "async",
  metaInfo: function metaInfo() {
    return {
      title: this.metaInfo.title,
      meta: [{
        name: this.metaInfo.name, //keyWords
        content: this.metaInfo.content
      }],
      link: [{
        // set link
        rel: "lexinamc",
        href: "document.location.hostname"
      }]
    };
  },
  created: function created() {
    this.isLogin();
    this.getContentSetting();
  },
  mounted: function mounted() {
    // this.getData();
  },

  computed: {
    player: function player() {
      return this.$refs.videoPlayer.player;
    }
  },
  methods: {
    getContentSetting: function getContentSetting() {
      var _this = this;

      //获取网站内容设置
      this.$request.get("/ContentManage/getContentSetting", "", function (res) {
        console.log(res);
        if (res.code == 200) {
          _this.metaInfo.title = res.data[0].title + "-专题课介绍";
          _this.metaInfo.name = res.data[0].SEO_antistop;
          _this.metaInfo.content = res.data[0].describe;
        }
      });
    },
    checkStatusFn: function checkStatusFn() {
      if (this.userId != this.courseData.uid) {
        if (this.courseData.level == 1) {
          this.privacypop = true;
        } else if (this.courseData.level == 2) {
          this.clickVideo();
        }
      }
      // }else{
      //      this.checkStatus = true;
      // }
    },
    clickVideo: function clickVideo() {
      if (this.isLoginFlag == 1) {
        window.location.href = this.loginRes.data.url;
      } else {
        if (this.courseData.level == 2 && this.courseData.userBuyStatus == 1) {
          this.checkStatus = true;
        } else {
          this.paypop = true;
        }
      }
    },
    isLogin: function isLogin() {
      var _this2 = this;

      //判斷是否登陸
      console.log("判斷是否登陸");
      window.scroll(0, 0);
      var link = window.location.href;
      this.$request.get("/User/checkWechatLoginIn", { loginRedirectUrl: link }, function (res) {
        console.log(res);
        _this2.loginRes = res;
        if (res.code == -5002) {
          // 登录失败跳转登录

          _this2.setCookie("isLogin", 0);

          _this2.isLoginFlag = 1;
          _this2.getData();
        } else if (res.code == 200) {
          // 登录成功
          console.log("已登陸");
          _this2.userId = res.data.userId;
          if (_this2.userId == _this2.courseData.uid) {
            _this2.checkStatus = true;
          }

          _this2.setCookie("isLogin", 1);

          _this2.isLoginFlag = 2;
          _this2.getData();
        }
      });
    },

    /**@augments
     *课程介绍
     *
     */
    getData: function getData() {
      var _this3 = this;

      this.$request.get("/CourseManage/details", { id: this.courseId, status: this.isLoginFlag }, function (res) {
        // this.viewpointList = [];
        _this3.courseData = res.data;

        if (_this3.courseData.level == 0 || _this3.courseData.level == 2 && _this3.courseData.userBuyStatus == 1) {
          _this3.checkStatus = true;
        }

        _this3.$nextTick(function () {
          if (res.data.class_video_pic != null && res.data.class_video_pic != "") {
            _this3.playerOptions.poster = res.data.class_video_pic;
          } else {
            _this3.playerOptions.poster = "/static/img/imgbg2.jpg";
            res.data.class_video_pic = "/static/img/imgbg2.jpg";
            if (res.data.level == 0 || res.data.userBuyStatus == 1 || _this3.privacySucc || _this3.userId == _this3.courseData.uid) {
              res.data.class_video_pic = "/static/img/imgbg.jpg";
            }
          }
          if (res.data.level == 0 || res.data.userBuyStatus == 1 || _this3.privacySucc || _this3.userId == _this3.courseData.uid) {
            _this3.videoPlay = false;
          }
          if (res.data.class_video_url != null && res.data.class_video_url != "") {
            _this3.playerOptions.sources.src = res.data.class_video_url;
            _this3.videoshow = true;
          } else {
            _this3.playerOptions.sources.src = "///";
          }
          // if(this.checkStatus){
          //       this.playerOptions.sources.src = 'http://oqt46pvmm.bkt.clouddn.com/lvEPC1VlY4ceaJt0LT3g_aAoKX_V';
          //   this.videoshow = true;
          // }
          // alert( this.videoshow)
          //'http://rtmp//live.hkstv.hk.lxdns.com/live/hks'
        });

        _this3.loaded = true;
      });
    },


    /**@augments
     *密码
     *
     */
    getcheck: function getcheck() {
      var _this4 = this;

      this.$request.get("/CourseManage/checkPass", { id: this.courseId, pass: this.pass }, function (res) {
        // this.viewpointList = [];
        if (res.data.checkStatus) {
          _this4.privacypop = false;
          _this4.checkStatus = true;

          _this4.getData();
          _this4.privacySucc = true;
          alert("解锁成功");
        } else {
          _this4.privacypop = false;
          alert("密码错误");
        }
      });
    },
    showPopupFn: function showPopupFn() {
      this.privacypop = true;
    },
    closePopupFn: function closePopupFn() {
      this.privacypop = false;
    },
    showPopupFn1: function showPopupFn1() {
      if (this.isLoginFlag == 1) {
        window.location.href = this.loginRes.data.url;
      } else {
        this.paypop = true;
      }
    },
    closePopupFn1: function closePopupFn1() {
      this.paypop = false;
    }
  },
  watch: {
    privacypop: function privacypop(val) {
      if (val) {
        document.getElementsByTagName("body")[0].style.overflowY = "hidden";
      } else {
        document.getElementsByTagName("body")[0].style.overflowY = "auto";
      }
    },
    paypop: function paypop(val) {
      if (val) {
        document.getElementsByTagName("body")[0].style.overflowY = "hidden";
      } else {
        document.getElementsByTagName("body")[0].style.overflowY = "auto";
      }
    },
    "$route.path": function $routePath() {
      this.courseId = this.$route.params.courseId;

      this.privacypop = false; //私密课弹窗
      this.paypop = false; //私密课弹窗
      this.loaded = false;
      this.pass = ""; //密码
      this.checkStatus = false;
      this.videoshow = false;
      this.videoPlay = true;
      this.privacySucc = false;
      this.userId = '';
      this.isLogin();
    }
  },
  components: {
    introduceA: introduce_course["a" /* default */],
    introduceB: introduce_teacher["a" /* default */],
    courseItem: course["a" /* default */],
    lockPopup: lock_popup["a" /* default */],
    videoM: video["a" /* default */]
  }
});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-96a1f2d8","hasScoped":false,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/page/college/specialCourseDetail.vue
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('main',{staticClass:"special-detail"},[_c('div',[(_vm.loaded)?[_c('div',{staticClass:"header"},[_c('div',{staticClass:"item-box"},[(_vm.videoshow)?_c('videoM',{attrs:{"playerOptions":_vm.playerOptions}}):_vm._e(),_vm._v(" "),_c('div',{directives:[{name:"show",rawName:"v-show",value:(!_vm.videoshow),expression:"!videoshow"}],staticClass:"videoImg",style:({'background-image':("url(" + (_vm.courseData.class_video_pic) + ")")})},[_c('img',{directives:[{name:"show",rawName:"v-show",value:(_vm.videoPlay),expression:"videoPlay"}],attrs:{"src":__webpack_require__("uHph"),"alt":""}}),_vm._v(" "),_c('p',{directives:[{name:"show",rawName:"v-show",value:(!_vm.videoPlay),expression:"!videoPlay"}]},[_c('span',[_vm._v("暂无视频内容")])])]),_vm._v(" "),_c('div',{directives:[{name:"show",rawName:"v-show",value:(!_vm.checkStatus),expression:"!checkStatus"}],staticClass:"video-mask",on:{"click":function($event){_vm.checkStatusFn()}}}),_vm._v(" "),_c('div',{staticClass:"item-r"},[_c('div',{staticClass:"item"},[_c('h5',[_vm._v("\n                      专题课程\n                  ")]),_vm._v(" "),_c('p',[_vm._v("开课："+_vm._s(_vm.courseData.begin_time_full.slice(0,-3)))])]),_vm._v(" "),_c('ul',[_c('li',[_c('h5',[_vm._v("\n                                "+_vm._s(_vm.courseData.class_name)+"\n                            ")]),_vm._v(" "),_c('p',[_vm._v(_vm._s(_vm.courseData.study_num)+"人学习")])])])])],1),_vm._v(" "),_c('div',{staticClass:"item-b"},[_c('div',[_c('h5',[_vm._v(_vm._s(_vm.courseData.class_name))]),_vm._v(" "),_c('p',[_vm._v(_vm._s(_vm.courseData.study_num)+"人学习")])]),_vm._v(" "),((_vm.courseData.level == 1 &&!_vm.privacySucc &&  _vm.userId !=_vm.courseData.uid)|| (_vm.courseData.level == 2 && _vm.courseData.userBuyStatus == 0 &&  _vm.userId !=_vm.courseData.uid) )?[_c('div',{staticClass:"item"},[(_vm.courseData.level == 1 && !_vm.privacySucc)?[_vm._m(0),_vm._v(" "),_c('a',{attrs:{"href":"javascript:;"},on:{"click":_vm.showPopupFn}},[_vm._v("输入密码")])]:_vm._e(),_vm._v(" "),(_vm.courseData.level == 2 && _vm.courseData.userBuyStatus == 0)?[_c('div',{staticClass:"pay"},[_c('h5',[_vm._v(_vm._s(_vm.courseData.price)),_c('s',[_vm._v("原价"+_vm._s(_vm.courseData.origin_price))])])]),_vm._v(" "),_c('a',{attrs:{"href":"javascript:;"},on:{"click":_vm.showPopupFn1}},[_vm._v("购买课程")])]:_vm._e()],2)]:_vm._e()],2)]),_vm._v(" "),_c('section',{staticClass:"center-box"},[_c('div',{staticClass:"item-l"},[_c('nav',[_c('router-link',{attrs:{"to":"/"}},[_vm._v("首页")]),_vm._v(" > "),_c('router-link',{attrs:{"to":"/collegeIndex"}},[_vm._v("99学院")]),_vm._v(" > "),_c('router-link',{attrs:{"to":"/collegeIndex/specialCourse"}},[_vm._v("专题课")]),_vm._v(" > "),_c('span',[_vm._v("课程详情")])],1),_vm._v(" "),_c('introduceA',{attrs:{"lecturers":_vm.courseData.lecturers,"brief":_vm.courseData.brief}})],1),_vm._v(" "),_c('aside',{staticClass:"item-r"},[_c('introduceB',{attrs:{"intro":_vm.courseData.intro,"teacherId":_vm.courseData.uid,"alias":_vm.courseData.alias,"headAdd":_vm.courseData.head_add}})],1)]),_vm._v(" "),(_vm.courseData.RelevantCourse.length > 0)?_c('section',{staticClass:"footer-item"},[_c('h5',[_vm._v("\n              相关课程\n          ")]),_vm._v(" "),_c('swiper',{attrs:{"options":_vm.hotSaleOption}},[_vm._l((_vm.courseData.RelevantCourse),function(item){return [_c('swiper-slide',[_c('courseItem',{attrs:{"courseItem":item}})],1)]})],2),_vm._v(" "),_c('div',{directives:[{name:"show",rawName:"v-show",value:(_vm.courseData.RelevantCourse.length > 4),expression:"courseData.RelevantCourse.length > 4"}],staticClass:"swiper-button-next"}),_vm._v(" "),_c('div',{directives:[{name:"show",rawName:"v-show",value:(_vm.courseData.RelevantCourse.length > 4),expression:"courseData.RelevantCourse.length > 4"}],staticClass:"swiper-button-prev"})],1):_vm._e(),_vm._v(" "),(_vm.courseData.level == 1)?_c('div',{directives:[{name:"show",rawName:"v-show",value:(_vm.privacypop),expression:"privacypop"}],staticClass:"pop-mi"},[_c('h5',[_vm._v("解锁私密课程")]),_vm._v(" "),_c('div',[_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.pass),expression:"pass"}],attrs:{"type":"text","name":"","id":"","placeholder":"请输入密码"},domProps:{"value":(_vm.pass)},on:{"keyup":function($event){if(!('button' in $event)&&_vm._k($event.keyCode,"enter",13,$event.key,"Enter")){ return null; }return _vm.getcheck($event)},"input":function($event){if($event.target.composing){ return; }_vm.pass=$event.target.value}}}),_vm._v(" "),_c('a',{attrs:{"href":"javascript:;"},on:{"click":_vm.getcheck}},[_vm._v("\n            解锁\n          ")])]),_vm._v(" "),_c('span',{on:{"click":_vm.closePopupFn}})]):_vm._e(),_vm._v(" "),_c('div',{directives:[{name:"show",rawName:"v-show",value:(_vm.privacypop),expression:"privacypop"}],staticClass:"mask"}),_vm._v(" "),(_vm.paypop)?[(_vm.courseData.level == 2 && _vm.courseData.userBuyStatus == 0)?_c('lockPopup',{attrs:{"type":1,"id":_vm.courseId},on:{"closePopup":_vm.closePopupFn1}}):_vm._e()]:_vm._e()]:_vm._e()],2)])}
var staticRenderFns = [function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',{staticClass:"simi"},[_c('h5',[_vm._v("私密课程")]),_vm._v(" "),_c('p',[_vm._v("输入密码解锁后可学习")])])}]
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ var college_specialCourseDetail = (esExports);
// CONCATENATED MODULE: ./src/page/college/specialCourseDetail.vue
function injectStyle (ssrContext) {
  __webpack_require__("Edi9")
}
var normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  specialCourseDetail,
  college_specialCourseDetail,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)

/* harmony default export */ var page_college_specialCourseDetail = __webpack_exports__["default"] = (Component.exports);


/***/ }),

/***/ "x+ic":
/***/ (function(module, exports) {

module.exports = "data:image/png;base64,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"

/***/ }),

/***/ "xp5q":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "yKMm":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/components/college/introduce-course.vue
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ var introduce_course = ({
  props: ['lecturers', 'brief']
});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-7b355671","hasScoped":false,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/components/college/introduce-course.vue
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',{staticClass:"intro-item"},[_c('h5',{staticClass:"title"},[_vm._v("\n        主讲人介绍\n    ")]),_vm._v(" "),_c('div',{staticClass:"item",domProps:{"innerHTML":_vm._s(_vm.lecturers?_vm.lecturers:'暂无介绍')}}),_vm._v(" "),_c('h5',{staticClass:"title"},[_vm._v("\n        课程介绍\n    ")]),_vm._v(" "),_c('div',{staticClass:"item",domProps:{"innerHTML":_vm._s(_vm.brief?_vm.brief:'暂无介绍')}})])}
var staticRenderFns = []
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ var college_introduce_course = (esExports);
// CONCATENATED MODULE: ./src/components/college/introduce-course.vue
function injectStyle (ssrContext) {
  __webpack_require__("ZOxn")
}
var normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  introduce_course,
  college_introduce_course,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)

/* harmony default export */ var components_college_introduce_course = __webpack_exports__["a"] = (Component.exports);


/***/ })

});