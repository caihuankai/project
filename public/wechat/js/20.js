webpackJsonp([20],{

/***/ 1026:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n@charset \"UTF-8\";\n.lobby {\n  width: 100vw;\n  min-height: 100vh;\n  box-sizing: border-box;\n  background-color: #fff;\n  padding-bottom: 1.0rem;\n}\n.lobby .header {\n    border-bottom: 0.24rem solid #f5f7f8;\n    position: relative;\n    padding-bottom: 0.6rem;\n    background: #fff;\n}\n.lobby .header .toggleBtn {\n      position: absolute;\n      display: inline-block;\n      bottom: 3px;\n      font-size: 0.26rem;\n      color: #cf2f2f;\n      text-decoration: underline;\n      right: 0.3rem;\n}\n.lobby .header .toggleBtn.toggleItem {\n        bottom: 5px;\n        top: inherit;\n}\n.lobby .header .live-topic {\n      padding: .24rem;\n      background: #f5f7f8;\n}\n.lobby .header .live-topic div.block {\n        background: #fee7e7 url(\"/images/liveTitle-01.png\") no-repeat left top;\n        background-size: 1.32rem 100%;\n        padding-left: 1.32rem;\n        padding-right: .75rem;\n        border-radius: 4px;\n        height: 1rem;\n        overflow: hidden;\n        position: relative;\n}\n.lobby .header .live-topic div.block h4 {\n          margin-left: .2rem;\n          font-size: .3rem;\n          color: #c62f2f;\n          line-height: 1rem;\n}\n.lobby .header .live-topic div.block h4.line-1 {\n            line-height: 1rem;\n}\n.lobby .header .live-topic div.block h4.line-2 {\n            display: -webkit-box;\n            -webkit-box-orient: vertical;\n            -webkit-line-clamp: 2;\n            overflow: hidden;\n            margin-top: .1rem;\n            line-height: normal;\n}\n.lobby .header .live-topic div.block > span {\n          position: absolute;\n          top: 50%;\n          right: .3rem;\n          -webkit-transform: translateY(-50%);\n              -ms-transform: translateY(-50%);\n                  transform: translateY(-50%);\n          width: .15rem;\n          height: .26rem;\n          background: url(\"/images/3.0/icon-15.png\") no-repeat 100%/100%;\n}\n.lobby .liveTitleBox-comment {\n    width: 80%;\n    border-radius: 10px;\n}\n.lobby .liveTitleBox-comment .img {\n      width: 2.8rem;\n      margin: .8rem auto 0;\n      height: 2.8rem;\n      background-size: 100% auto;\n}\n.lobby .liveTitleBox-comment .buttom {\n      width: 100%;\n      background: #c62f2f;\n      height: 1rem;\n      border-radius: 0px 0px 10px 10px;\n}\n.lobby .liveTitleBox-comment .buttom a {\n        display: block;\n        width: 100%;\n        line-height: 1rem;\n        text-align: center;\n        color: #fff;\n}\n.lobby .liveTitleBox-comment h2 {\n      text-align: center;\n      color: #1c0808;\n      font-size: 16px;\n      font-weight: bold;\n}\n.lobby .liveTitleBox-comment h2 {\n      font-weight: normal;\n      margin: .48rem 0 .32rem;\n}\n.lobby .liveTitleBox-comment .class-name {\n      margin: .3rem 0 .3rem;\n}\n.lobby .liveTitleBox-comment .title {\n      border-bottom: 1px solid #eec0c0;\n}\n.lobby .liveTitleBox-comment .title input {\n        border: 0px;\n        border-shadow: 0;\n        width: 100%;\n        height: 35px;\n        text-align: center;\n        caret-color: #cd0000;\n}\n.lobby .liveTitleBox-comment p {\n      line-height: 30px;\n      text-align: center;\n      color: #888;\n}\n.lobby .line-3 {\n    overflow: hidden;\n    text-overflow: ellipsis;\n    display: -webkit-box;\n    -webkit-box-orient: vertical;\n    -webkit-line-clamp: 3;\n}\n.lobby .loading-page {\n    height: 40vh;\n    padding-top: 10vh;\n    box-sizing: border-box;\n}\n.lobby .noincomeList {\n    min-height: 30vh;\n    height: 50vh;\n    padding-top: 10vh;\n    box-sizing: border-box;\n}\n.lobby a {\n    display: block;\n}\n.lobby .lobby-h {\n    height: 1.5rem;\n    padding: 10px;\n    box-sizing: border-box;\n    width: 100%;\n    font-size: 0.26rem;\n}\n.lobby .lobby-h .item {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-align-content: center;\n          -ms-flex-line-pack: center;\n              align-content: center;\n}\n.lobby .lobby-h .item div {\n        -webkit-box-flex: 1.1rem;\n        -webkit-flex: 1.1rem 4.0rem;\n            -ms-flex: 1.1rem 4.0rem;\n                flex: 1.1rem 4.0rem;\n        -webkit-box-orient: horizontal;\n        -webkit-box-direction: normal;\n        -webkit-flex-direction: row;\n            -ms-flex-direction: row;\n                flex-direction: row;\n        -webkit-box-pack: center;\n        -webkit-justify-content: center;\n            -ms-flex-pack: center;\n                justify-content: center;\n}\n.lobby .lobby-h .mess h5 {\n      font-size: 0.28rem;\n      height: 0.4rem;\n      line-height: 0.4rem;\n      margin-top: .14rem;\n}\n.lobby .lobby-h .mess p {\n      font-size: 0.24rem;\n      height: 0.4rem;\n      line-height: 0.4rem;\n}\n.lobby .lobby-h .mess p span {\n        display: inline-block;\n        padding-left: 0.4rem;\n        height: 0.4rem;\n        line-height: 0.4rem;\n        vertical-align: middle;\n        color: #6A6969;\n}\n.lobby .lobby-h .mess .love {\n      margin-right: 0.2rem;\n      background: url(" + __webpack_require__(1070) + ") left center no-repeat;\n      background-size: 0.25rem auto;\n}\n.lobby .lobby-h .mess .popular {\n      background: url(" + __webpack_require__(1071) + ") left center no-repeat;\n      background-size: 0.2rem auto;\n}\n.lobby .lobby-h .avatar {\n      width: 1.1rem;\n      margin-right: 0.2rem;\n      height: 1.1rem;\n      border-radius: 50%;\n      text-align: center;\n      overflow: hidden;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n}\n.lobby .lobby-h .avatar img {\n        width: 100%;\n        height: 100%;\n}\n.lobby .lobby-h .follow {\n      position: absolute;\n      top: 0.4rem;\n      right: 0.4rem;\n      display: inline-block;\n      color: #FCF9F9;\n      line-height: 0.4rem;\n      font-size: .28rem;\n      height: 0.4rem;\n      border-radius: .08rem;\n      text-align: center;\n}\n.lobby .lobby-h .unfollow {\n      background-color: #cf2f2f;\n      color: #fff;\n      text-align: center;\n      background-size: 0.25rem 0.25rem;\n      padding: 2px .2rem;\n      border-radius: .3rem;\n}\n.lobby .lobby-h .following {\n      padding: 0 .1rem;\n      border-radius: .05rem;\n      color: #999;\n      margin-top: .14rem;\n}\n.lobby .intro {\n    padding: 0 0 10px;\n    /*border-top:.2rem solid #f5f7f8;*/\n    line-height: 0.4rem;\n    box-sizing: border-box;\n    max-height: 2.0rem;\n    padding-bottom: 0.1rem;\n    overflow: hidden;\n    position: relative;\n    box-sizing: border-box;\n    font-size: 0.26rem;\n}\n.lobby .intro .db.introBtn {\n      position: relative;\n}\n.lobby .intro.videoItem {\n      min-height: 4.4rem;\n}\n.lobby .intro.introItem {\n      max-height: 150rem;\n      height: auto;\n}\n.lobby .intro p {\n      text-indent: 0.52rem;\n}\n.lobby .intro .introBtn {\n      width: 100%;\n      height: 0.4rem;\n      line-height: .4rem;\n      padding-left: .2rem;\n      border-left: 3px solid #c62f2f;\n      margin: .2rem 0;\n}\n.lobby .intro .intro-content {\n      text-indent: 0.52rem;\n      padding: .2rem;\n      margin-bottom: .3rem;\n}\n.lobby .intro .explain {\n      height: auto;\n}\n.lobby .intro .explain img {\n        margin: 0.06rem 0;\n        width: 100%;\n}\n.lobby .intro .video {\n      height: 160px;\n}\n.lobby .intro .video-intro {\n      padding: 0 .3rem;\n      border-bottom: .2rem solid #f4f6fc;\n}\n.lobby .intro .per-intro {\n      padding: 0 .3rem;\n}\n.lobby .list {\n    margin-bottom: -3px;\n    padding-bottom: 0.2rem;\n    box-sizing: border-box;\n    /* 列表 */\n}\n.lobby .list .mint-navbar {\n      border-bottom: 1px solid #f4f4f4;\n      position: relative;\n      box-sizing: border-box;\n}\n.lobby .list .mint-navbar.fixed {\n        position: fixed;\n        top: 0px;\n        width: 100%;\n        z-index: 111;\n        -webkit-transition: all .1s ease-in-out;\n        transition: all .1s ease-in-out;\n}\n.lobby .list .mint-navbar .mint-tab-item {\n        padding: 5px 0;\n        height: 0.7rem;\n}\n.lobby .list .mint-navbar .mint-tab-item span {\n          display: inline-block;\n          height: 0.7rem;\n          line-height: 0.7rem;\n          width: 100%;\n}\n.lobby .list .mint-navbar .is-selected .mint-tab-item-label {\n        color: #cf2f2f;\n}\n.lobby .list .mint-navbar .border-line {\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        width: 50%;\n        position: absolute;\n        -webkit-box-pack: center;\n        -webkit-justify-content: center;\n            -ms-flex-pack: center;\n                justify-content: center;\n        bottom: 0.08rem;\n        left: 0;\n        z-index: 111;\n        text-align: center;\n        height: 0.05rem;\n}\n.lobby .list .mint-navbar .border-line span {\n          display: inline-block;\n          width: 0.5rem;\n          border-radius: 0.2rem;\n          background-color: #cf2f2f;\n          height: 0.05rem;\n}\n.lobby .list .mint-tab-item-label {\n      font-size: 0.32rem;\n}\n.lobby .list .mint-navbar .mint-tab-item.is-selected {\n      border-bottom: none;\n      color: #5f86fd;\n}\n.lobby .list .list-course.mint-tab-container-item li {\n      padding: 0.3rem;\n      border-bottom: 1px solid #f4f4f4;\n      position: relative;\n}\n.lobby .list .list-course.mint-tab-container-item li h5 {\n        font-size: 0.32rem;\n        width: 99%;\n}\n.lobby .list .list-course.mint-tab-container-item li h5.the-top {\n          background: url(" + __webpack_require__(687) + ") no-repeat left top;\n          -webkit-background-size: 1.06rem auto;\n          text-indent: 1.1rem;\n          background-size: 1.06rem auto;\n}\n.lobby .list .list-course.mint-tab-container-item li p {\n        font-size: 0.24rem;\n        color: #a1aeb7;\n}\n.lobby .list .list-course.mint-tab-container-item li p span {\n          margin-right: 0.2rem;\n}\n.lobby .list .list-course.mint-tab-container-item li p .point:before {\n          content: \" \";\n          display: inline-block;\n          vertical-align: middle;\n          margin-top: -0.06rem;\n          width: 0.08rem;\n          height: .08rem;\n          border-radius: 100%;\n          margin-right: 0.2rem;\n          background-color: #b2b2b2;\n}\n.lobby .list .list-course.mint-tab-container-item a {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n}\n.lobby .list .list-course.mint-tab-container-item .img {\n      width: 2.64rem;\n      height: 1.5rem;\n      position: relative;\n      border-radius: 0.1rem;\n      margin-right: 0.2rem;\n}\n.lobby .list .list-course.mint-tab-container-item .img img {\n        width: 100%;\n        height: 100%;\n}\n.lobby .list .list-course.mint-tab-container-item .img .ppt-icon {\n        position: absolute;\n        bottom: 0rem;\n        right: 0rem;\n        border-radius: 4px;\n        padding: .06rem .12rem;\n        color: #fff;\n        height: .35rem;\n        line-height: .35rem;\n        font-size: 0.24rem;\n        background: rgba(0, 0, 0, 0.15);\n}\n.lobby .list .list-course.mint-tab-container-item .img .vedio-icon {\n        position: absolute;\n        bottom: 0rem;\n        right: 0rem;\n        padding: .08rem .16rem;\n        width: .35rem;\n        height: .25rem;\n        background: url(/images/3.0/video_icon.png) no-repeat center center rgba(0, 0, 0, 0.15);\n        background-size: .32rem auto;\n}\n.lobby .list .list-course.mint-tab-container-item .img .series-icon {\n        position: absolute;\n        top: 0;\n        left: 0;\n        color: #fff;\n        background: #c62f2f;\n        text-align: center;\n        width: 1rem;\n        height: .32rem;\n        line-height: .32rem;\n        font-size: .2rem;\n}\n.lobby .list .list-course.mint-tab-container-item .img .series-icon i {\n          display: inline-block;\n          -webkit-transform: scale(0.9);\n              -ms-transform: scale(0.9);\n                  transform: scale(0.9);\n}\n.lobby .list .list-course.mint-tab-container-item .item-list {\n      min-height: 1.5rem;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-orient: vertical;\n      -webkit-box-direction: normal;\n      -webkit-flex-direction: column;\n          -ms-flex-direction: column;\n              flex-direction: column;\n      -webkit-box-pack: justify;\n      -webkit-justify-content: space-between;\n          -ms-flex-pack: justify;\n              justify-content: space-between;\n      line-height: 1;\n      -webkit-box-flex: 1;\n      -webkit-flex: 1;\n          -ms-flex: 1;\n              flex: 1;\n}\n.lobby .list .list-course.mint-tab-container-item .item-list h5 {\n        font-size: 0.32rem;\n        color: #333333;\n        line-height: 0.38rem;\n}\n.lobby .list .list-course.mint-tab-container-item .item-list .name {\n        font-size: 0.24rem;\n        color: #888;\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-pack: justify;\n        -webkit-justify-content: space-between;\n            -ms-flex-pack: justify;\n                justify-content: space-between;\n        height: 0.34rem;\n        line-height: 0.34rem;\n}\n.lobby .list .list-course.mint-tab-container-item .item-list .name .time {\n          text-align: center;\n          white-space: nowrap;\n          margin-left: 0.2rem;\n}\n.lobby .list .list-course.mint-tab-container-item .item-list .name .price {\n          background: url(\"/images/3.0/gift-icon.png\") no-repeat left center;\n          color: #c62f2f;\n          padding-left: 0.25rem;\n          background-size: 0.2rem auto;\n}\n.lobby .list .list-course.mint-tab-container-item .item-list .name .secret {\n          background: url(\"/images/3.0/secret-icon.png\") no-repeat left center;\n          color: #8f2fc6;\n          padding-left: 0.25rem;\n          background-size: 0.2rem auto;\n}\n.lobby .list .list-course.mint-tab-container-item .item-list .name .time:before {\n          content: \" \";\n          display: inline-block;\n          vertical-align: middle;\n          margin-top: -0.06rem;\n          width: 0.08rem;\n          height: .08rem;\n          border-radius: 100%;\n          margin-right: 0.2rem;\n          background-color: #b2b2b2;\n}\n.lobby .list .list-course.mint-tab-container-item .item-list .info {\n        font-size: 0.24rem;\n        color: #888;\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        position: relative;\n        -webkit-box-pack: justify;\n        -webkit-justify-content: space-between;\n            -ms-flex-pack: justify;\n                justify-content: space-between;\n}\n.lobby .list .list-course.mint-tab-container-item .item-list .info .time {\n          text-align: center;\n          -webkit-box-flex: 0;\n          -webkit-flex: none;\n              -ms-flex: none;\n                  flex: none;\n          white-space: nowrap;\n}\n.lobby .list .list-course.mint-tab-container-item .item-list .info .per {\n          background: url(\"/images/3.0/eye-icon.png\") no-repeat left center;\n          padding-left: 0.4rem;\n          background-size: 0.3rem auto;\n}\n.lobby .list .list-article.mint-tab-container-item li {\n      padding: 0.3rem 0.3rem;\n      border-bottom: 1px solid #ebebeb;\n      position: relative;\n}\n.lobby .list .list-article.mint-tab-container-item li h5 {\n        font-size: 0.32rem;\n        line-height: 1.4;\n}\n.lobby .list .list-article.mint-tab-container-item li h5 i {\n          display: inline-block;\n          width: 0.32rem;\n          height: 0.32rem;\n          vertical-align: middle;\n          background: url(" + __webpack_require__(688) + ") no-repeat;\n          background-size: 100%;\n          margin-left: 0.1rem;\n}\n.lobby .list .list-article .pic-null h1 {\n      color: #333333;\n      font-size: .34rem;\n      line-height: .5rem;\n      overflow: hidden;\n      text-overflow: ellipsis;\n      display: -webkit-box;\n      -webkit-box-orient: vertical;\n      -webkit-line-clamp: 2;\n}\n.lobby .list .list-article .pic-null h1 i.the-price {\n        display: inline-block;\n        width: .28rem;\n        height: .3rem;\n        vertical-align: middle;\n        margin-right: .1rem;\n        background: url(" + __webpack_require__(688) + ") no-repeat;\n        background-size: 100%;\n        margin-bottom: .04rem;\n}\n.lobby .list .list-article .pic-null h1 i.the-top {\n        display: inline-block;\n        width: 1.06rem;\n        vertical-align: middle;\n        height: .5rem;\n        margin-right: .1rem;\n        background: url(" + __webpack_require__(687) + ") no-repeat left top;\n        background-size: 1.06rem auto;\n}\n.lobby .list .list-article .pic-1 h1 {\n      overflow: hidden;\n      display: block;\n      color: #333333;\n      font-size: .34rem;\n      line-height: .5rem;\n      overflow: hidden;\n      text-overflow: ellipsis;\n      display: -webkit-box;\n      -webkit-box-orient: vertical;\n      -webkit-line-clamp: 3;\n}\n.lobby .list .list-article .pic-1 h1 i.the-price {\n        display: inline-block;\n        width: .3rem;\n        height: .3rem;\n        vertical-align: middle;\n        margin-right: .1rem;\n        background: url(" + __webpack_require__(688) + ") no-repeat;\n        background-size: 100%;\n        margin-bottom: .04rem;\n}\n.lobby .list .list-article .pic-1 h1 i.the-top {\n        display: inline-block;\n        width: 1.06rem;\n        vertical-align: middle;\n        margin-right: .1rem;\n        height: .5rem;\n        background: url(" + __webpack_require__(687) + ") no-repeat left top;\n        background-size: 1.06rem auto;\n}\n.lobby .list .list-article .pic-1 .img {\n      width: 2.24rem;\n      height: 1.48rem;\n      float: right;\n      margin-left: .3rem;\n      background-position: center center;\n      background-size: cover;\n}\n.lobby .list .list-article .pic-3 h1 {\n      overflow: hidden;\n      display: block;\n      color: #333333;\n      font-size: .34rem;\n      line-height: .5rem;\n      overflow: hidden;\n      text-overflow: ellipsis;\n      display: -webkit-box;\n      -webkit-box-orient: vertical;\n      -webkit-line-clamp: 2;\n}\n.lobby .list .list-article .pic-3 h1 i.the-price {\n        display: inline-block;\n        width: .3rem;\n        height: .3rem;\n        vertical-align: middle;\n        margin-right: .1rem;\n        background: url(" + __webpack_require__(688) + ") no-repeat;\n        background-size: 100%;\n        margin-bottom: .04rem;\n}\n.lobby .list .list-article .pic-3 h1 i.the-top {\n        display: inline-block;\n        width: 1.06rem;\n        vertical-align: middle;\n        margin-right: .1rem;\n        background: url(" + __webpack_require__(687) + ") no-repeat left top;\n        -webkit-background-size: 1.06rem auto;\n        height: .5rem;\n        background-size: 1.06rem auto;\n}\n.lobby .list .list-article .pic-3 section {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      margin-top: .15rem;\n}\n.lobby .list .list-article .pic-3 div {\n      -webkit-box-flex: 1;\n      -webkit-flex: 1;\n          -ms-flex: 1;\n              flex: 1;\n      width: 2.24rem;\n      height: 1.48rem;\n      background-image: url(\"http://oqt46pvmm.bkt.clouddn.com/FhNk3SB06ulQDeZG88TdidSkHEre\");\n      background-position: center;\n      background-size: 100%;\n}\n.lobby .list .list-article .pic-3 div:nth-child(2) {\n        margin: 0 .12rem;\n}\n.lobby .list .mess-box {\n      color: #a3b0b9;\n      font-size: .24rem;\n      margin-top: .3rem;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n}\n.lobby .list .mess-box .left {\n        display: inline-block;\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        width: 100%;\n        -webkit-box-pack: justify;\n        -webkit-justify-content: space-between;\n            -ms-flex-pack: justify;\n                justify-content: space-between;\n        -webkit-box-align: center;\n        -webkit-align-items: center;\n            -ms-flex-align: center;\n                align-items: center;\n}\n.lobby .list .mess-box .left .title {\n          display: -webkit-box;\n          display: -webkit-flex;\n          display: -ms-flexbox;\n          display: flex;\n          -webkit-box-orient: vertical;\n          -webkit-box-direction: normal;\n          -webkit-flex-direction: column;\n              -ms-flex-direction: column;\n                  flex-direction: column;\n          margin-left: .2rem;\n          height: .64rem;\n          -webkit-box-pack: justify;\n          -webkit-justify-content: space-between;\n              -ms-flex-pack: justify;\n                  justify-content: space-between;\n          padding-top: .1rem;\n          width: 100%;\n}\n.lobby .list .mess-box .left .title .see-item {\n            /*display:flex;*/\n            /*justify-content: space-between;*/\n            /*align-items: flex-end;*/\n            line-height: .4rem;\n}\n.lobby .list .mess-box .left .title .see-item i {\n              width: .4rem;\n              height: .4rem;\n              display: inline-block;\n              background: #000;\n              vertical-align: middle;\n              margin-left: .2rem;\n              margin-right: .1rem;\n}\n.lobby .list .mess-box .left .title .see-item .tag {\n              color: #bb7676;\n              margin-left: .1rem;\n}\n.lobby .list .mess-box .left .title .see-item p {\n              float: right;\n}\n.lobby .list .mess-box .left .title .see-item .see {\n              background: url(" + __webpack_require__(1072) + ") no-repeat center center;\n              background-size: .34rem auto;\n}\n.lobby .list .mess-box .left .title .see-item .zan {\n              background: url(" + __webpack_require__(1073) + ") no-repeat center center;\n              background-size: .3rem auto;\n}\n.lobby .list .mess-box .left .title .see-item span {\n              vertical-align: middle;\n              display: inline-block;\n}\n.lobby .list .mess-box .left img {\n          width: 0.64rem;\n          height: .64rem;\n          border-radius: 50%;\n}\n.lobby .list .mess-box .left i,\n        .lobby .list .mess-box .left span {\n          display: inline-block;\n          vertical-align: middle;\n}\n.lobby .mint-loadmore-bottom,\n  .lobby .mint-loadmore-top {\n    text-align: center;\n    height: 1.0rem;\n    line-height: 1.0rem;\n}\n.lobby .mint-loadmore-bottom span {\n    display: inline-block;\n    -webkit-transition: .2s linear;\n    transition: .2s linear;\n    vertical-align: middle;\n}\n.lobby .footer {\n    height: 0.98rem;\n    left: auto;\n    right: auto;\n    width: 100%;\n    color: #fff;\n    z-index: 111;\n    position: fixed;\n    font-size: 0.3rem;\n    text-align: center;\n    background-color: #cf2f2f;\n    font-size: 0.36rem;\n}\n.lobby .footer .mint-tab-item {\n      padding: 0.22rem 0;\n      height: 0.98rem;\n      box-sizing: border-box;\n}\n.lobby .footer .mint-tab-item:first-child .mint-tab-item-label {\n        border-right: 1px solid rgba(255, 255, 255, 0.5);\n}\n.lobby .footer.mint-tabbar {\n      display: block;\n      font-size: 0.32rem;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-pack: center;\n      -webkit-justify-content: center;\n          -ms-flex-pack: center;\n              justify-content: center;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n}\n.lobby .footer .mint-tab-item-label {\n      font-size: 0.32rem;\n      height: 0.54rem;\n      line-height: 0.54rem;\n}\n.lobby .footer .teacher {\n      width: 100%;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      height: 0.98rem;\n      line-height: 0.98rem;\n      padding: 0;\n}\n.lobby .footer .teacher .mint-tab-item {\n        padding: 0.14rem 0;\n        height: 0.98rem;\n        width: 50%;\n        padding: 0.22rem 0;\n}\n.lobby .footer .teacher .mint-tab-item-label {\n        color: #fff;\n}\n.lobby .footer .sprite:before {\n      display: none;\n}\n.lobby .tips {\n    height: 1rem;\n    line-height: 1rem;\n    text-align: center;\n    font-size: .24rem;\n    color: #b2b2b2;\n    background: #ffffff;\n}\n#videoPlayer {\n  height: 230px;\n}\n#videoPlayer embed {\n    margin-top: -25px;\n}\n", ""]);

// exports


/***/ }),

/***/ 1070:
/***/ (function(module, exports) {

module.exports = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABUAAAAYCAYAAAAVibZIAAABrklEQVQ4jZ3VP0gXcRjH8dfvl1QGRkQOEWqgVNikQxJRuVko5FK0BAkF7RENUdDQIBG0NPSHhoYgApEMRHIwxCHoDw1B5aREc6DVkGjD9y7ivO/d/fzAwfF9ns/7Ho57Pldbmr4ool24jGF0YQUf8RQP8TtmrEWgJxPzjojvK4Ywn1es55ydwEQBEPZhDu1VoFvxAJsKgKlacbcK9AzaKgBTDaOzDDrQABBqeZ4sdG+DUOgog/7ZAHSdJwv9tAHoOk8W+rxB4E9MlkFnMN0A9A5+lEFhBIsVgJO4lVfIg37DYbyOwNZwG1dwIK+hKedsO67jUAQ6jqt4h23oxmrRpD34gEtojkx5UwiTHuzH2aJJ+/AKLZmeBdzHF3wWkunxf/VreIHlLLRDSKYsEE7hGE4L6dQlvKJU3fiePGweb1LoPSF18rQs7PdgpC4Zpje5dtfRX2J4hPOYKuhJNYuhOs6VNPZjLOkrWoxZIeCX6jhSYYKjuCB8TjG9xC/CJ7WnAhTe4mBB/V+tCcexswJ0DjeS+xU8EWJvBJuz0PcVJ4UteCZsXPonHRUWojdt+gsUCU3YAVsepQAAAABJRU5ErkJggg=="

/***/ }),

/***/ 1071:
/***/ (function(module, exports) {

module.exports = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABUAAAAYCAYAAAAVibZIAAABr0lEQVQ4ja3VTYhPURjH8c+9ZCKFsvGavJTSKNkxCZGFJUrIgiavhWyws5EyLExM1mrKwt/Cgq2NTE1JNkoWFmzYeMnLNBqLc67+TnPuvWY8m9Pz/J7zPc8957nnFF9O92uwPpzCFbxsSoayRc4b7MdzDGDW/4B+j+MMnMdjzJsudEnib8M9FNOB7srEDk0VOhfnMtrZqUAL3MHSjL4B8/8FWuAWDjQsurgttAd3caIGWNkYTmJHd3BmkrQQD4SGbwPciZv4ie0YSStdg2ctgVVBt4X+nYNHWNYNXY0nWNUSmBYECzBUCT3oYFFm8oTQBU9bLLQbm0r0ozeT9A37cByzW0DhaImDGfEX9uJ+9FvdUNhSYn1GvC5sfmU34kJNtjzX/D9wLYm9wIUW0LFSuC9TG8HHSeIDuNoAHS39/YmVfaqZdAkPa/ShUvgjvibCippJExjMaKPolHiHYzG5sl6srAF/mCT2Xnh2xquDGhYu3c/RL3CxBrou8V9hq3g+3ac/LLRXJ1Z9BJsz0MNxHBe2byNeV2LaUm+xB2txWWih9I3qE/Z8MFZ8Rvjz/thv1ClMFRrc+dkAAAAASUVORK5CYII="

/***/ }),

/***/ 1072:
/***/ (function(module, exports) {

module.exports = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAWCAYAAAChWZ5EAAACVElEQVRIibXWT2jPcRgH8Nd+SSslsxArhHJhiYgbza6LlJ2mlGxZzYWLHcbFfasRNYc5OSiGA0ZuNA7CgWKRNhPbtFK7cfh8xu/39fn+vr8dvOtzeJ7n/fzp+/l8n+epGxkZsUjsxW5sRkPUzeIDnuPZYoItqZG3FR1ox5YC7nvcwHW8KwpcKrAvRz/eoreG5CKnN/r0xxi5qPYF2nAJTQnbDB7jc5TX4wBWZng9OIJTSN51XgHn0ZfQ/8Q5DONHxrYCx3ARy8r0TbiNCzFuBVJXcC0n+QSaMZBILuoGImciYe+LsasWMIzjCed57MF4wpbFeOTOJ2zHY45kAZeFl57CGUwm9NvjyWISZ3NidcRcFQX0oCvHYRqDGd0ajOJVPKNYneEMCv0hha6YUwm7hN8lDw8TultoKZNboq4cv2JheejHrhLuVSHBp4y8TeiGWeyLtnIUvZm7JSwtIP1PLC3haAFpQ0Z+I93vn0ZbOTYVxG4vCfc0VIXUmtAdwqMyeVTonOWow8EqcYcwuvAXnPBv9QtoRHdG9zUGb46nFd8znG5/p2UWr2NOdWXjeKUwQFYlHOaF8ZvqBSmsE8ZzfcL2TZius1Q2ohnhdU8lnOoxpvhORc5YTvKpmONPf8i24nHswIuEc5PQdE5Lf9qGaHslPUFfxNgVv2ZdlY3oCk7m2GbxBB+jvBH7cwqDq+hMGartA524KYzRbONpwOEqvgt4Jozg+3mEoo3ogdDh2oSFYq6GpHOR2xZ9c5NT+054J55GYXbsxFqVS+kXvBQW0+ka4/oN08J7LM8Jy7sAAAAASUVORK5CYII="

/***/ }),

/***/ 1073:
/***/ (function(module, exports) {

module.exports = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABsAAAAbCAYAAACN1PRVAAAC1klEQVRIia3Wy2tcVRwH8E8uGR9UfJQ0ZZqAHay1Bh/To2G6EURXQYpFq+LCFwhW3HTpRtrof1AVFSpEKuKjUhxxXCQoBBdNhdM2YCRaqWJ8gGA2FZ2A0cW9g+n1TGca+oXhzD3f7/f3PfdczmOg2WzqA3fhXtyEGi5HG2exiJkY4xe9igz0CNuHZ1DvY0Cn8EaM8fWLDWvgNezsI6SMiGdjjCfKRJYQP4rj6wyCgLkQwiO9wvbinXWGlPFuCOHBbmE344NLFNTB0RDCjlTYR5c46H91B4v2Kdy4VpFlmbGxMaOjo2BpacnCwoLV1dWL0mB7COHJGONU580OlEbzd6PRmK3VaiqVikqlolarqdfr82tFIYSvyprx8fHPsFqqd4B8Gnfh+hJ5cGho6JbyfIyMjIxitnicrVar1bJmeHi4joOl7q0hhEaGibIBXyf6Olgq2h8voEn5JzLcliCex5FyZ7vdfg/3F497VlZWjiW8hwt/Gbdn2JIg7my1WlUcwjKW2+321MzMzAQ2FJoN09PT97Tb7amOBodarVYNdyRqbhloNpvzuDVBwkk8If+m7+PKhOZPPIwf8JbuO8/8YCHuhp2YvwCvGMDHPTTwV4afE8QCzvVRIIVzhb+MnzKcThCTuHadYdfgxUT/6QyfJohXcBU2yz98P1jGMK7Gywm+lWEO35eITfi1CNyIt3sEHYkxbiyCfin8a3E2xvhlZ7uaTBS4At/JT+rH5G+5H5/gRNHux+YY4+MhhH04U/jKmOT8k3oR27uM/AxeKgJ+xz/yre463IcXsK2LdzHGuIP/dn3YXQSmsE2+huA3/CFf3OXpSmF358/a8+wbPNCHeRO29hm0J8b4bSoMjuGhPor0g70xxvMO5NSF56j86ja3zpDjqMcYPywTgwkx+ULfhafxnP7ujSfxaozxzW6CbmEdHC5+DdxdhN6Ay7AiXxqn8HnqnljGv0UYyrY5ibxPAAAAAElFTkSuQmCC"

/***/ }),

/***/ 1184:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "lobby"
  }, [(_vm.loading) ? [_c('loading')] : [_c('div', {
    staticClass: "header",
    attrs: {
      "id": "header1"
    }
  }, [_c('div', {
    staticClass: "lobby-h"
  }, [_c('div', {
    staticClass: "item"
  }, [_c('div', {
    staticClass: "avatar"
  }, [_c('img', {
    attrs: {
      "src": _vm.headerData.pic,
      "alt": ""
    }
  })]), _vm._v(" "), _c('div', {
    staticClass: "mess"
  }, [_c('h5', [_vm._v(_vm._s(_vm.headerData.username))]), _vm._v(" "), _c('p', [_c('span', {
    staticClass: "love"
  }, [_vm._v(_vm._s(_vm.headerData.focusNum))])])])]), _vm._v(" "), (_vm.showFocus) ? _c('a', {
    class: [_vm.headerData.ifFocus == 1 ? 'following' : 'unfollow', 'follow'],
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": _vm.toFocus
    }
  }, [_vm._v("\n                    " + _vm._s(_vm.headerData.ifFocus == 1 ? '已关注' : '关注') + " ")]) : _vm._e()]), _vm._v(" "), _c('section', {
    staticClass: "live-topic"
  }, [_c('router-link', {
    attrs: {
      "to": '/live/' + _vm.headerData.userId + '&' + _vm.userInfoid
    }
  }, [_c('div', {
    staticClass: "block"
  }, [_c('h4', {
    class: {
      'line-2': _vm.headerData.theme && _vm.headerData.theme.length >= 13
    }
  }, [_vm._v(_vm._s(_vm.headerData.theme ? _vm.headerData.theme : _vm.headerData.username + '的直播间'))]), _vm._v(" "), _c('span')])])], 1), _vm._v(" "), (_vm.showbtn) ? _c('span', {
    staticClass: "toggleBtn",
    class: {
      toggleItem: _vm.autobool
    },
    on: {
      "click": _vm.toggleBtn
    }
  }, [_vm._v(_vm._s(_vm.toggle) + " ")]) : _vm._e(), _vm._v(" "), (_vm.instro) ? [_c('div', {
    staticClass: "intro",
    class: {
      introItem: _vm.autobool, 'videoItem': _vm.videoShow
    }
  }, [(_vm.videoShow) ? [_c('div', {
    staticClass: "video-intro"
  }, [_c('h5', {
    staticClass: "introBtn",
    class: {
      db: _vm.headerData.content == ''
    }
  }, [_vm._v("视频介绍")]), _vm._v(" "), _c('div', {
    attrs: {
      "id": "videoPlayer"
    }
  })])] : _vm._e(), _vm._v(" "), _c('div', {
    staticClass: "per-intro"
  }, [_c('h5', {
    staticClass: "introBtn",
    class: {
      db: _vm.headerData.content == ''
    }
  }, [_vm._v("TA的介绍")]), _vm._v(" "), _c('p', {
    ref: "p",
    staticClass: "intro-content",
    attrs: {
      "id": "p"
    }
  }, [_vm._v(_vm._s(_vm.headerData.content))]), _vm._v(" "), _c('div', {
    ref: "ex",
    staticClass: "explain",
    attrs: {
      "id": "explain"
    }
  }, [_vm._l((_vm.headerData.imgList), function(item) {
    return [_c('img', {
      attrs: {
        "src": item.src,
        "alt": ""
      }
    }), _vm._v(" "), _c('p', [_vm._v(_vm._s(item.explain))])]
  })], 2)])], 2)] : _vm._e()], 2), _vm._v(" "), _c('div', {
    staticClass: "list"
  }, [_c('div', {
    staticClass: "page-navbar"
  }, [_c('mt-navbar', {
    staticClass: "page-part",
    class: {
      fixed: _vm.scrollBool
    },
    model: {
      value: (_vm.selected),
      callback: function($$v) {
        _vm.selected = $$v
      },
      expression: "selected"
    }
  }, [_c('mt-tab-item', {
    attrs: {
      "id": "1"
    }
  }, [_c('span', {
    on: {
      "click": _vm.tab
    }
  }, [_vm._v("课程")])]), _vm._v(" "), _c('mt-tab-item', {
    attrs: {
      "id": "2"
    }
  }, [_c('span', {
    on: {
      "click": _vm.tab
    }
  }, [_vm._v("内参")])]), _vm._v(" "), _c('div', {
    staticClass: "border-line",
    style: ({
      'left': _vm.left
    })
  }, [_c('span')])], 1), _vm._v(" "), _c('mt-tab-container', [(_vm.selected == '1') ? [_c('mt-tab-container-item', {
    staticClass: "list-course",
    style: ({
      'backgroundColor': _vm.course.length !== 0 ? ' #fff' : 'transparent'
    })
  }, [(_vm.courseloading) ? [_c('loading')] : (_vm.course.length !== 0 && _vm.courseloading == false) ? [_c('mt-loadmore', {
    ref: "loadmore",
    attrs: {
      "bottom-method": _vm.courseBottom,
      "bottom-all-loaded": _vm.courseFinish,
      "bottomDistance": 20
    },
    on: {
      "bottom-status-change": _vm.handleBottomChange
    }
  }, [_c('ul', _vm._l((_vm.course), function(item) {
    return _c('li', {
      key: item.id
    }, [_c('router-link', {
      attrs: {
        "to": '/personalCenter/course/' + item.id + '&' + _vm.userInfoid
      }
    }, [_c('div', {
      staticClass: "img"
    }, [_c('img', {
      directives: [{
        name: "lazy",
        rawName: "v-lazy",
        value: (item.process_src_img + '?imageView2/2/w/200'),
        expression: "item.process_src_img + '?imageView2/2/w/200'"
      }]
    }), _vm._v(" "), _c('span', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (item.form == 3),
        expression: "item.form == 3"
      }],
      staticClass: "ppt-icon"
    }, [_vm._v("PPT")]), _vm._v(" "), _c('span', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (item.form == 2),
        expression: "item.form == 2"
      }],
      staticClass: "vedio-icon"
    }), _vm._v(" "), _c('span', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (item.type == 2),
        expression: "item.type == 2"
      }],
      staticClass: "series-icon"
    }, [_c('i', [_vm._v("系列课")])])]), _vm._v(" "), _c('div', {
      staticClass: "item-list"
    }, [_c('h5', {
      staticClass: "two-line",
      class: {
        'the-top': item.topBool
      }
    }, [_vm._v(_vm._s(item.class_name))]), _vm._v(" "), _c('p', {
      staticClass: "info"
    }, [_c('i', {
      staticClass: "per"
    }, [_vm._v(_vm._s(item.study_num) + "人学过")]), _vm._v(" "), _c('i', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (item.type == 2),
        expression: "item.type == 2"
      }]
    }, [_vm._v("已更新" + _vm._s(item.childCourseNum) + "节 | 共" + _vm._s(item.plan_num) + "节")])]), _vm._v(" "), _c('p', {
      staticClass: "name"
    }, [_c('span', {
      staticClass: "number"
    }, [_vm._v(_vm._s(item.lecturerName))]), _vm._v(" "), (item.level == 2) ? [(item.price != '') ? _c('span', {
      staticClass: "price"
    }, [_c('i', [_vm._v(_vm._s(item.price))])]) : _vm._e()] : _vm._e(), _vm._v(" "), (item.level == 1) ? [_c('span', {
      staticClass: "secret"
    }, [_c('i', [_vm._v("私密课程")])])] : _vm._e()], 2)])])], 1)
  })), _vm._v(" "), _c('div', {
    staticClass: "mint-loadmore-bottom",
    slot: "bottom"
  }, [_c('span', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.bottomStatus === 'loading'),
      expression: "bottomStatus === 'loading'"
    }]
  }, [_c('mt-spinner', {
    attrs: {
      "type": "fading-circle",
      "size": 18
    }
  }), _vm._v(" "), _c('span', [_vm._v("正在加载")])], 1)]), _vm._v(" "), _c('section', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.courseFinish),
      expression: "courseFinish"
    }],
    staticClass: "tips"
  }, [_vm._v("\n                                        以上观点仅供参考，不构成投资建议\n                                    ")]), _vm._v(" "), _c('nomore', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.courseFinish),
      expression: "courseFinish"
    }],
    attrs: {
      "text": "没有更多啦"
    }
  })], 1)] : (_vm.course.length == 0) ? _c('nodata', {
    attrs: {
      "nochance": "nocourse"
    }
  }) : _vm._e()], 2)] : [_c('mt-tab-container-item', {
    staticClass: "list-article",
    style: ({
      'backgroundColor': _vm.article.length !== 0 ? ' #fff' : 'transparent'
    })
  }, [(_vm.articleloading) ? [_c('loading')] : (_vm.article.length !== 0 && _vm.articleloading == false) ? [_c('mt-loadmore', {
    ref: "loadmoree",
    attrs: {
      "bottom-method": _vm.articleBottom,
      "bottom-all-loaded": _vm.articleFinish,
      "bottomDistance": 20
    },
    on: {
      "bottom-status-change": _vm.handleBottomChange
    }
  }, [_c('ul', _vm._l((_vm.article), function(item) {
    return _c('li', [_c('router-link', {
      key: item.id,
      attrs: {
        "to": '/personalSpace/viewpointDetail/' + item.id + '&' + _vm.userInfoid
      }
    }, [(item.imageList.length >= 1) ? _c('div', {
      staticClass: "pic-1 clearfix"
    }, [_c('div', {
      staticClass: "img",
      style: ({
        'background-image': 'url(' + item.imageList[0] + '?imageView2/2/w/200)'
      })
    }), _vm._v(" "), _c('h1', [_c('i', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (item.price > 0),
        expression: "item.price > 0"
      }],
      staticClass: "the-price"
    }), (item.top_status) ? _c('i', {
      staticClass: "the-top"
    }) : _vm._e(), _vm._v(_vm._s(item.title))])]) : _c('div', {
      staticClass: "pic-null"
    }, [_c('h1', [_c('i', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (item.price > 0),
        expression: "item.price > 0"
      }],
      staticClass: "the-price"
    }), (item.top_status) ? _c('i', {
      staticClass: "the-top"
    }) : _vm._e(), _vm._v(_vm._s(item.title))])]), _vm._v(" "), _c('div', {
      staticClass: "mess-box"
    }, [_c('section', {
      staticClass: "left"
    }, [_c('img', {
      attrs: {
        "src": _vm.headerData.pic,
        "alt": ""
      }
    }), _vm._v(" "), _c('div', {
      staticClass: "title"
    }, [_c('p', [_c('i', [_vm._v(_vm._s(_vm.headerData.username.length > 7 ? _vm.headerData.username.substr(0, 7) + '...' : _vm.headerData.username))])]), _vm._v(" "), _c('div', {
      staticClass: "see-item"
    }, [_c('span', [_vm._v(_vm._s(_vm._f("formatTime")(item.create_time)))]), _vm._v(" "), _c('span', {
      staticClass: "tag"
    }, [_vm._v(_vm._s(item.title_cate))]), _vm._v(" "), _c('p', [_c('i', {
      staticClass: "see"
    }), _c('span', [_vm._v(_vm._s(item.study_num))])])])])])])])], 1)
  })), _vm._v(" "), _c('div', {
    staticClass: "mint-loadmore-bottom",
    slot: "bottom"
  }, [_c('span', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.bottomStatus === 'loading'),
      expression: "bottomStatus === 'loading'"
    }]
  }, [_c('mt-spinner', {
    attrs: {
      "type": "fading-circle",
      "size": 18
    }
  }), _vm._v(" "), _c('span', [_vm._v("正在加载")])], 1)]), _vm._v(" "), _c('section', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.articleFinish),
      expression: "articleFinish"
    }],
    staticClass: "tips"
  }, [_vm._v("\n                                        以上观点仅供参考，不构成投资建议\n                                    ")]), _vm._v(" "), _c('nomore', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.articleFinish),
      expression: "articleFinish"
    }],
    attrs: {
      "text": "没有更多啦"
    }
  })], 1)] : (_vm.article.length == 0) ? _c('nodata', {
    attrs: {
      "nochance": "nopoint"
    }
  }) : _vm._e()], 2)]], 2)], 1)]), _vm._v(" "), _c('mt-tabbar', {
    ref: "DOM",
    staticClass: "footer",
    model: {
      value: (_vm.selected),
      callback: function($$v) {
        _vm.selected = $$v
      },
      expression: "selected"
    }
  }, [(_vm.userInfoid == this.userId && this.type == 2) ? _c('div', {
    staticClass: "teacher"
  }, [_c('a', {
    staticClass: "mint-tab-item",
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": function($event) {
        _vm.footerLink(3)
      }
    }
  }, [_c('div', {
    staticClass: "mint-tab-item-icon"
  }), _vm._v(" "), _c('div', {
    staticClass: "mint-tab-item-label"
  }, [_vm._v("\n                        进入我的\n                    ")])]), _vm._v(" "), _c('a', {
    staticClass: "mint-tab-item",
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": function($event) {
        _vm.footerLink(2)
      }
    }
  }, [_c('div', {
    staticClass: "mint-tab-item-icon"
  }), _vm._v(" "), _c('div', {
    staticClass: "mint-tab-item-label"
  }, [_vm._v("\n                        进入我的直播间\n                    ")])])]) : _c('div', {
    staticClass: "teacher"
  }, [_c('div', {
    staticClass: "teacher"
  }, [_c('a', {
    staticClass: "mint-tab-item",
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": function($event) {
        _vm.footerLink(1)
      }
    }
  }, [_c('div', {
    staticClass: "mint-tab-item-icon"
  }), _vm._v(" "), _c('div', {
    staticClass: "mint-tab-item-label"
  }, [_vm._v("\n                        首页\n                        ")])]), _vm._v(" "), _c('a', {
    staticClass: "mint-tab-item sprite personal",
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": function($event) {
        _vm.footerLink(2)
      }
    }
  }, [_c('div', {
    staticClass: "mint-tab-item-icon"
  }), _vm._v(" "), _c('div', {
    staticClass: "mint-tab-item-label"
  }, [_vm._v("\n                        TA的Live直播间\n                        ")])])])])])], _vm._v(" "), (_vm.closePop) ? _c('div', {
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
  }) : _vm._e()], 2)
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-6ccc36c7", module.exports)
  }
}

/***/ }),

/***/ 1294:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(1026);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("6b86245e", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-6ccc36c7\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./lobbyPage.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-6ccc36c7\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./lobbyPage.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 499:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1294)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(924),
  /* template */
  __webpack_require__(1184),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\personalSpace\\lobbyPage.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] lobbyPage.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-6ccc36c7", Component.options)
  } else {
    hotAPI.reload("data-v-6ccc36c7", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 687:
/***/ (function(module, exports) {

module.exports = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGoAAAAoCAYAAAAWsW/wAAAD/0lEQVR4nO2ZP0gbURzHv5eenlTTNkpFH5EKtV7/SIWig4PDTXaqY4eAU6A3C1kdAtUhg5M0g7plKDhlKjjcIBQEKVKocFKpoJxtpZE2KAa07RBzXOJdvHv3tL70fbZc3r13vM/98r7vRXo/OPgHgmtP5F8/gMAfQhQnCFGcIERxghDFCUIUJwhRnCBEcYIQxQlCFCfItDc+evMGd0ZGAt/3c3UVG69e+W7fqqq4EY0GHqdkWShZlmefN1UVLYQAAI4tC0emiUPTrNvnraEhz+9Oi8UL7w8DtSgpcjXF2JtK1Z0gL3azWexks1XX2jUNvakUlDNBtZQsC9uZDAqG4fr9k/n5C8ctWRb283ns5XI4KRYDP7cX1KKCVMV1oC+dxt0XL6quHZomTotF+0VQCIE6O4v9fB6fp6aoxlEIQVzXEdM0bCSTzGRJrE/Pb/b34/7UFLbSaRxtbrLsuoqR9XUAwK+1NXxKJuu27dF1xHUdQPmN38lmsZ/PV7Vp1zTEdR2tqgoA2MvlsJ3JuI7pVq0KIWhVVXQnErb4MMJrYfr7dXt4GE8WFtA2MICBxUXcHh5m2T0VlTccKFfQx5cvz0kCgIJhYCOZtNcZ54T7oWRZKBgGPjn6qK3gMDAT1TE2hodzc5DPFv4bbW14ODeHjrExVkNQ0XMmCQC2M5m6P0UnxSK2HBXQSTnRB441rlKhYWEiqjuRQP/MDCLNzdWdNzejf2YG3YkEi2GoiGkagHI1/Vpbu7D9oWnaYYJlRYQlnChJwr3JSfSmUoBXCoxE0JtK4d7kJCBJoYYLikKIXeEHHknOjSNHzKZJnM57WEV2alFSUxMeTE+DTEz4ak8mJvBgehpSUxPtkIFxxvAgE/bTR+W5IUej6NF1W5RXzKfqm/bGzvFxSLKMH8vLAIBISwtio6Pn2h2srOD38TEAQJJldI6P49vSEu2w1LDc08QdKbLeeLs1yTAM1KK+LS1VTbjS1YXYu3fn2n15/Rqlr19ph2GG1ybXDZniJMRJwTCwncl4nozQQC2KB5wT1RJAlDOpnbpU4n4+j+8uER8or28sq7dCw4sqWRYUQhDTtHObVC8qSfHE4/yuZFm+EiRLGv70vLKgt6qqrwR3a2jIrqggSfGyaXhRzsNRdXa27gZUIQR96bT92W8FXgUNL6pyIg6UQ8Lj+Xn06HpVuFAIQXcigadv39rXWYeBsDT0GlWhcrbXl05DjkYvjNe72Sz2crmrejxf/BeigLKsI9NEXNfRfhYWaikYBvZyuSsPCn5g9jeH0tWFZy77qA/Pn1+LfVQttcHismI1K5j/HyW4HBo+TDQKQhQnCFGcIERxghDFCUIUJwhRnCBEcYIQxQl/Ad+bZBOBAJGDAAAAAElFTkSuQmCC"

/***/ }),

/***/ 688:
/***/ (function(module, exports) {

module.exports = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAAUCAYAAACAl21KAAAAw0lEQVQ4jd2TQQrCMBBFXyUH6FJ0LS6z7VrEfb1CL+EJiofQcxRK18UjWDxAt95ANxOYxTQGdFH8ECb5/+dnCEnWe4/CBjgDe1l3wEnmFv9oyxIAp0K2wA3IFXcEdjK3+AIYABZKrMXcACsZjXBTfB0266DQdgWMMiqlW/zBCrLwSuV1UCf1AiyBNXBVusW3Qcx676dODXhKzWMmFxMFhdT7t0FDgufjZSdjfkEOyBK9pi/8tZ91lPKOQidR3/wu+4+D3j8NJREUstEgAAAAAElFTkSuQmCC"

/***/ }),

/***/ 799:
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

exports.default = {
    props: ['isSubscribe', 'userId', 'liveId', 'ifFocus', 'teacherId'],
    data: function data() {
        return {
            closePop: false,
            codeImg: ""
        };
    },

    methods: {
        toFocus: function toFocus() {
            var _this = this;

            // 关注或取消关注直播间 type=1为关注 0为取消关注
            // if(this.isSubscribe || (this.isSubscribe == false && this.ifFocus == 1)){
            //     this.$http.post(this.hostUrl + '/Focus/addFocus', {
            //         user_id: this.userId,
            //         live_id: this.liveId,
            //         type: this.ifFocus == 1 ? 0 : 1
            //     }, {emulateJSON: true}).then(res => {
            //         if (res.body.code == 0) {
            //             Toast({
            //                 message: res.body.msg,
            //                 duration: 800
            //             })
            //             this.ifFocus = this.ifFocus == 1 ? 0 : 1
            //             // this.data.focus_num = res.body.data

            //         } else {
            //             Toast({
            //                 message: res.body.msg,
            //                 duration: 1000
            //             })
            //         }
            //     })
            // } else {
            this.$http.get(this.hostUrl + 'CreateQrCode/focus', { params: { teacherId: this.teacherId } }).then(function (res) {

                if (res.body.code == 200) {
                    _this.closePop = true;
                    _this.codeImg = res.body.data;
                } else {
                    Toast("网络出错");
                }
            });
            // }
        }
    }
};

/***/ }),

/***/ 810:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.liveTitleBox-comment {\n  width: 80%;\n  border-radius: 10px;\n}\n.liveTitleBox-comment .img {\n    width: 2.8rem;\n    margin: .8rem auto 0;\n    height: 2.8rem;\n    background-size: 100% auto;\n}\n.liveTitleBox-comment .buttom {\n    width: 100%;\n    background: #c62f2f;\n    height: 1rem;\n    border-radius: 0px 0px 10px 10px;\n}\n.liveTitleBox-comment .buttom a {\n      display: block;\n      width: 100%;\n      line-height: 1rem;\n      text-align: center;\n      color: #fff;\n}\n.liveTitleBox-comment h2 {\n    text-align: center;\n    color: #1c0808;\n    font-size: 16px;\n    font-weight: bold;\n}\n.liveTitleBox-comment h2 {\n    font-weight: normal;\n    margin: .48rem 0 .32rem;\n}\n.liveTitleBox-comment .class-name {\n    margin: .3rem 0 .3rem;\n}\n.liveTitleBox-comment .title {\n    border-bottom: 1px solid #eec0c0;\n}\n.liveTitleBox-comment .title input {\n      border: 0px;\n      border-shadow: 0;\n      width: 100%;\n      height: 35px;\n      text-align: center;\n      caret-color: #cd0000;\n}\n.liveTitleBox-comment p {\n    line-height: 30px;\n    text-align: center;\n    color: #888;\n}\n", ""]);

// exports


/***/ }),

/***/ 817:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(833)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(799),
  /* template */
  __webpack_require__(827),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\subcomponents\\index\\focus.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] focus.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-c00ce466", Component.options)
  } else {
    hotAPI.reload("data-v-c00ce466", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 827:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', [(_vm.closePop) ? _c('div', {
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
     require("vue-hot-reload-api").rerender("data-v-c00ce466", module.exports)
  }
}

/***/ }),

/***/ 833:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(810);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("ba819428", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-c00ce466\",\"scoped\":false,\"hasInlineConfig\":true}!../../../node_modules/sass-loader/lib/loader.js!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./focus.vue", function() {
     var newContent = require("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-c00ce466\",\"scoped\":false,\"hasInlineConfig\":true}!../../../node_modules/sass-loader/lib/loader.js!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./focus.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 924:
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

var _noincome = __webpack_require__(137);

var _noincome2 = _interopRequireDefault(_noincome);

var _focus = __webpack_require__(817);

var _focus2 = _interopRequireDefault(_focus);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

exports.default = {
	data: function data() {
		return {
			loading: true,
			courseloading: true,
			articleloading: true,
			data: {},
			headerData: {},
			selected: '1',
			userId: this.$route.params.userId,
			liveId: '',
			courseList: [],
			list: [],
			coursePage: 1,
			articlePage: 1,
			courseFinish: false,
			articleFinish: false,
			bottomStatus: '',
			bottomStatus1: '',
			course: [],
			article: [],
			toggle: "收起",
			height: '',
			autobool: true, //是否展开
			showbtn: false,
			showFocus: true,
			index: 0,
			instro: false,
			left: '',
			username: '',
			scrollBool: false,
			params: { //获取课程列表的参数
				live_id: this.liveId,
				perPage: 5,
				orderBy: 'top_status desc,publish_time desc'
			},
			videoShow: false,
			closePop: false,
			codeImg: ""
		};
	},

	computed: (0, _vuex.mapState)({
		isWeiXin: function isWeiXin(state) {
			return state.isWeiXin;
		},
		// userId: state => state.userInfo.user_id,
		type: function type() {
			return this.$store.state.userInfo.type;
		},
		userInfoid: function userInfoid() {
			return this.$store.state.userInfo.user_id;
		},
		isSubscribe: function isSubscribe() {
			return this.$store.state.userInfo.isSubscribe;
		}
	}),
	created: function created() {
		var _this2 = this;

		this.$store.commit('setTitle', '介绍页');
		this.$store.commit('hideTabber');
		this.share_fansVisit();
		this.$store.dispatch('getUserInfo', function (res) {
			_this2.getHeaderData(_this2.$route.params.userId);
			if (_this2.userInfoid == _this2.userId) {
				_this2.showFocus = false;
			}
			if (_this2.userInfoid == _this2.userId && _this2.type == 1) {
				_this2.$router.push('/index/0');
			}
			if (_this2.isSubscribe == false) {

				if (_this2.$route.query.shareId == 1) {
					_this2.getQrCode();
				}
			}
		});
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
		footerLink: function footerLink(type) {
			//底部导航
			var _this = this;
			var swT = function swT() {
				switch (type) {
					case 1:
						_this.$router.replace({ path: '/index/' + _this.userInfoid });
						break;
					case 2:
						_this.$router.replace({ path: '/live/' + _this.userId + '&' + _this.userInfoid });
						break;
					case 3:
						_this.$router.replace({ path: '/personalCenter' });
						break;
				}
			};
			swT();
		},
		toggleBtn: function toggleBtn() {
			if (this.autobool) {
				this.autobool = false;
				this.toggle = "展开";
			} else {
				this.autobool = true;
				this.toggle = "收起";
			}
		},
		scrollMethod: function scrollMethod() {
			//滚动到顶部
			var t = document.documentElement.scrollTop || document.body.scrollTop;
			var h = document.getElementById('header1').offsetHeight + 20;

			if (t > h) {
				this.scrollBool = true;
			} else {
				this.scrollBool = false;
			}
		},
		config: function config() {
			var _this4 = this;

			wx.ready(function () {
				//分享页面链接
				_this4.wxShare([{ //分享到朋友圈
					imgUrl: _this4.headerData.pic,
					title: '推荐你和我一起关注大咖:' + _this4.headerData.username,
					desc: _this4.headerData.content,
					link: window.location.origin + '/#/personalSpace/lobbyPage/' + _this4.$route.params.userId + '/' + _this4.userInfoid + '?shareId=1'
				}, {
					//分享给朋友
					imgUrl: _this4.headerData.pic,
					title: '推荐你和我一起关注大咖:' + _this4.headerData.username,
					link: window.location.origin + '/#/personalSpace/lobbyPage/' + _this4.$route.params.userId + '/' + _this4.userInfoid + '?shareId=1',
					desc: _this4.headerData.content
				}]);
			});
			wx.error();
		},
		getHeaderData: function getHeaderData(userId) {
			var _this5 = this;

			//获取头部数据
			this.$http.post(this.hostUrl + '/User/getUserLiveInfoByUserId', { userId: userId }, { emulateJSON: true }).then(function (res) {
				console.log(res.body);
				_this5.loading = false;
				_this5.headerData = res.body.data || [];
				if (!$.isEmptyObject(res.body.data.introductionUrl)) {
					_this5.videoShow = true;
					// this.autobool = false;
					// this.toggle = "展开"
					/*    this.playerOptions.sources.src = res.body.data.introductionUrl.url;
     */
					var videoObject = {
						container: '#videoPlayer', //“#”代表容器的ID，“.”或“”代表容器的class
						variable: 'player', //该属性必需设置，值等于下面的new chplayer()的对象
						//  autoplay: true,//自动播放
						poster: '../images/videoBg.png',
						video: res.body.data.introductionUrl.url //视频地址
					};
					setTimeout(function () {
						new ckplayer(videoObject);
					}, 1000);
				}
				_this5.liveId = _this5.headerData.liveId;
				_this5.getCourseData(1, 0);
				_this5.$store.dispatch('getSdkData', function (res) {
					_this5.config();
				});
				if (_this5.headerData.content == null) {
					_this5.headerData.content = '';
				}
				if (_this5.headerData.content.length > 120 || _this5.headerData.imgList.toString().length > 0) {
					_this5.showbtn = true;
				}
				if (_this5.headerData.content.length > 0 || _this5.headerData.imgList.toString().length > 0) {
					_this5.instro = true;
				}
				if (_this5.headerData.username.length > 10) {
					_this5.headerData.username = _this5.headerData.username.slice(0, 9) + '...';
				}

				console.log(_this5.liveId);
			});
		},
		handleBottomChange: function handleBottomChange(status) {
			this.bottomStatus = status;
		},
		getCourseData: function getCourseData(coursePage, type) {
			var _this6 = this;

			// 获取课程列表  type课程类型:0全部课程，1为单节课程，2为系列课程
			this.$store.dispatch('getUserInfo', function (res) {
				_this6.params.page = coursePage;
				_this6.params.live_id = _this6.liveId;
				_this6.params.type = type;
				_this6.$http.post(_this6.hostUrl + '/Course/getCourseListByLiveId', _this6.params, { emulateJSON: true }).then(function (res) {
					var self = _this6;
					self.courseList = res.data.data;
					self.courseloading = false;
					self.course = self.courseList;
					console.log(self.courseList.length);
					if (self.courseList.length < 5) {
						self.courseFinish = true;
					}
				});
			});
		},
		courseBottom: function courseBottom() {
			var _this7 = this;

			if (!this.courseFinish) {
				this.coursePage++;
				setTimeout(function () {
					_this7.$http.post(_this7.hostUrl + '/Course/getCourseListByLiveId', {
						live_id: _this7.liveId,
						page: _this7.coursePage,
						perPage: 10,
						orderBy: 'top_status desc,publish_time desc'
					}, { emulateJSON: true }).then(function (res) {
						var self = _this7;

						self.courseList = "";
						self.courseList = res.data.data;
						self.courseloading = false;
						for (var i = 0; i < self.courseList.length; i++) {
							self.course.push(self.courseList[i]);
						}
						self.$refs.loadmore.onBottomLoaded();
						self.isHaveMore(self.courseList.length !== 0, self.courseFinish);
						if (self.courseList.length < 5) {
							self.courseFinish = true;
						}
					});
				}, 1500);
			}
		},
		articleBottom: function articleBottom() {
			var _this8 = this;

			if (!this.articleFinish) {
				this.articlePage++;
				setTimeout(function () {
					_this8.$http.post(_this8.hostUrl + '/Viewpoint/getViewPointListByUserId/userId', {
						userId: _this8.userId,
						pageNo: _this8.articlePage,
						perPage: 10,
						orderBy: 'top_status desc,publish_time desc',
						status: 1,
						isImageInfo: true
					}, { emulateJSON: true }).then(function (res) {
						var self = _this8;

						self.articleList = res.body.data.viewpointList;
						// if (self.articlePage == 1) {
						// 	self.article = []
						// }
						self.articleloading = false;
						for (var i = 0; i < self.articleList.length; i++) {
							self.article.push(self.articleList[i]);
						}
						self.$refs.loadmoree.onBottomLoaded();
						self.isHaveMore(self.articleList.length !== 0, self.articleFinish);
						if (self.articleList.length < 10) {
							self.articleFinish = true;
						}
					});
				}, 1500);
			}
		},
		isHaveMore: function isHaveMore(bool, listType) {
			// 是否还有下一页，如果没有就禁止上拉刷新
			listType = true; //true是禁止上拉加载

			if (bool) {
				listType = false;
			}
		},
		getViewData: function getViewData(articlePage) {
			var _this9 = this;

			//获取观点数据

			this.$http.post(this.hostUrl + '/Viewpoint/getViewPointListByUserId/userId', {
				userId: this.userId,
				pageNo: articlePage,
				orderBy: 'top_status desc,publish_time desc',
				status: 1,
				perPage: 5,
				isImageInfo: true
			}, { emulateJSON: true }).then(function (res) {
				var self = _this9;

				self.articleList = res.body.data.viewpointList;
				self.article = self.articleList;
				self.articleloading = false;

				if (self.articleList.length < 5) {
					self.articleFinish = true;
				}
			});
		},
		tab: function tab(e) {
			var selectText = e.target.firstChild.nodeValue;
			// var rect = e.target.getBoundingClientRect()

			// this.left = rect.left + 'px'

			if (selectText == '课程') {
				//                this.index = 1;
				this.courseloading = true;
				this.bottomStatus = '';
				this.getCourseData(1, 0);
				this.left = "0";
			} else {
				//                this.index = 2;
				this.articleloading = true;
				this.bottomStatus = '';
				this.left = '50%';
				this.getViewData(1);
			}
		},
		toFocus: function toFocus() {
			var _this10 = this;

			// 关注或取消关注直播间 type=1为关注 0为取消关注
			if (this.isSubscribe || this.isSubscribe == false && this.headerData.ifFocus == 1) {
				this.$http.post(this.hostUrl + '/Focus/addFocus', {
					user_id: this.userInfoid,
					live_id: this.liveId,
					type: this.headerData.ifFocus == 1 ? 0 : 1
				}, { emulateJSON: true }).then(function (res) {
					if (res.body.code == 0) {
						(0, _mintUi.Toast)({
							message: res.body.msg,
							duration: 800
						});
						_this10.headerData.ifFocus = _this10.headerData.ifFocus == 1 ? 0 : 1;
						// this.data.focus_num = res.body.data
					} else {
						(0, _mintUi.Toast)({
							message: res.body.msg,
							duration: 1000
						});
					}
				});
			} else {
				this.$http.get(this.hostUrl + 'CreateQrCode/focus', { params: { teacherId: this.headerData.userId } }).then(function (res) {

					if (res.body.code == 200) {
						_this10.closePop = true;
						_this10.codeImg = res.body.data;
					} else {
						(0, _mintUi.Toast)("网络出错");
					}
				});
			}
		}
	},
	components: {
		nomore: _nomore2.default,
		nodata: _noincome2.default,
		//  vueVideo,
		focuspage: _focus2.default
	}

};
//import vueVideo from '../subcomponents/personalCenter/vueVideo.vue';
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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

/***/ })

});