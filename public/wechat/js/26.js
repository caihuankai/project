webpackJsonp([26],{

/***/ 1025:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n@charset \"UTF-8\";\n.mint-toast {\n  width: 2.4rem;\n  z-index: 2006;\n}\n.mint-toast .icon-success {\n    background: url(/images/successIon.png) center no-repeat;\n    width: 100%;\n    display: block;\n    height: 50px;\n    background-size: 50%;\n}\n.view-detail {\n  background-color: #fff;\n  box-sizing: border-box;\n  min-height: 100vh;\n}\n.view-detail .menu-mask {\n    position: fixed;\n    top: 0;\n    right: 0;\n    left: 0;\n    bottom: 0;\n    display: none;\n    z-index: 1;\n}\n.view-detail .comment {\n    padding: 0 .24rem;\n    border-top: .24rem solid #f5f7f8;\n}\n.view-detail .comment img {\n      width: 30px;\n      height: 30px;\n}\n.view-detail .comment .h5 {\n      height: 1rem;\n      line-height: 1rem;\n      background: url(\"/images/space/word_active.png\") left center no-repeat;\n      background-size: .33rem auto;\n      padding-left: .5rem;\n      border-bottom: 1px solid #f5f7f8;\n}\n.view-detail .comment .txt {\n      height: .7rem;\n      line-height: .7rem;\n      color: #666;\n      font-size: .24rem;\n      text-align: center;\n}\n.view-detail .comment .nocomment {\n      height: 50px;\n      line-height: 50px;\n      border-bottom: 1px solid #f5f7f8;\n      text-align: center;\n      color: #666;\n}\n.view-detail .comment .box {\n      padding: 0.34rem 0;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      border-bottom: 1px solid #ebebeb;\n}\n.view-detail .comment .box:first-child {\n        border-top: none;\n}\n.view-detail .comment .box.answer-comment-item {\n        position: relative;\n        padding: 0;\n        /* &:before {\r\n                            content: \"\";\r\n                            position: absolute;\r\n                            width: calc(100% - 1.2rem);\r\n                            height: 1px;\r\n                            top: 0;\r\n                            right: 0;\r\n                            background-color: #eee;\r\n                        }*/\n}\n.view-detail .comment .box.answer-comment-item > section {\n          margin: .14rem 0;\n          display: -webkit-box;\n          display: -webkit-flex;\n          display: -ms-flexbox;\n          display: flex;\n          width: 100%;\n          padding: .28rem 0;\n          background: #fbf7f7;\n}\n.view-detail .comment .box.answer-comment-item .left img {\n          display: none;\n}\n.view-detail .comment .box > section {\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        width: 100%;\n}\n.view-detail .comment .box .item-menu {\n        bottom: -0.72rem;\n        right: -0.14rem;\n        position: absolute;\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        border-radius: 0.08rem;\n        border: 1px solid #ddbbbb;\n        box-shadow: 0 0 0.3rem 0.04rem #eaeaea;\n        background-color: #fbf7f7;\n        -webkit-transform: scale(0, 0);\n            -ms-transform: scale(0, 0);\n                transform: scale(0, 0);\n        -webkit-transition: -webkit-transform 0.3s ease;\n        transition: -webkit-transform 0.3s ease;\n        transition: transform 0.3s ease;\n        transition: transform 0.3s ease, -webkit-transform 0.3s ease;\n        -webkit-transform-origin: 2.4rem -0.06rem;\n            -ms-transform-origin: 2.4rem -0.06rem;\n                transform-origin: 2.4rem -0.06rem;\n        z-index: 2;\n}\n.view-detail .comment .box .item-menu.active {\n          -webkit-transform: scale(1, 1);\n              -ms-transform: scale(1, 1);\n                  transform: scale(1, 1);\n}\n.view-detail .comment .box .item-menu:after {\n          content: \"\";\n          position: absolute;\n          width: 0.06rem;\n          height: 0.06rem;\n          -webkit-transform: rotate(45deg);\n              -ms-transform: rotate(45deg);\n                  transform: rotate(45deg);\n          border-width: 1px;\n          border-style: solid;\n          border-color: #ccc transparent transparent #ccc;\n          right: 0.22rem;\n          top: -0.06rem;\n          background-color: #fff;\n}\n.view-detail .comment .box .item-menu a {\n          text-align: center;\n          -webkit-box-flex: 1;\n          -webkit-flex: 1;\n              -ms-flex: 1;\n                  flex: 1;\n          display: block;\n          height: 0.62rem;\n          width: 0.9rem;\n          font-size: 0.26rem;\n          color: #bb7777;\n          line-height: 0.62rem;\n          box-sizing: border-box;\n          border-right: 1px solid #ddbbbb;\n}\n.view-detail .comment .box .item-menu a:last-child {\n            border-right: none;\n}\n.view-detail .comment .box .left {\n        width: .9rem;\n        margin-right: 0.24rem;\n        position: relative;\n}\n.view-detail .comment .box .left img {\n          border-radius: 50%;\n          width: 0.64rem;\n          height: 0.64rem;\n          margin-left: .14rem;\n}\n.view-detail .comment .box .left .avatar {\n          width: .91rem;\n          height: 0.91rem;\n          position: absolute;\n          margin-left: 0;\n          left: 0;\n          top: -0.16rem;\n          z-index: 200;\n}\n.view-detail .comment .box .right {\n        -webkit-box-flex: 1;\n        -webkit-flex: 1;\n            -ms-flex: 1;\n                flex: 1;\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        -webkit-box-orient: vertical;\n        -webkit-box-direction: normal;\n        -webkit-flex-direction: column;\n            -ms-flex-direction: column;\n                flex-direction: column;\n        -webkit-box-pack: justify;\n        -webkit-justify-content: space-between;\n            -ms-flex-pack: justify;\n                justify-content: space-between;\n}\n.view-detail .comment .box .right .top {\n          display: -webkit-box;\n          display: -webkit-flex;\n          display: -ms-flexbox;\n          display: flex;\n          -webkit-box-pack: justify;\n          -webkit-justify-content: space-between;\n              -ms-flex-pack: justify;\n                  justify-content: space-between;\n          margin-bottom: 0.1rem;\n}\n.view-detail .comment .box .right .top h5 {\n            color: #1c0808;\n            font-size: 0.3rem;\n}\n.view-detail .comment .box .right .top h5 span {\n              font-size: 0.26rem;\n              display: inline-block;\n              width: 1.28rem;\n              height: .38rem;\n              vertical-align: middle;\n              background-size: auto 100%;\n              background-repeat: no-repeat;\n}\n.view-detail .comment .box .right .top h5 span.teacher {\n                width: .64rem;\n}\n.view-detail .comment .box .right .top p {\n            font-size: 0.22rem;\n            color: #b2b2b2;\n            line-height: 1.2;\n}\n.view-detail .comment .box .right .top p > a {\n              float: right;\n              margin-top: .05rem;\n              margin-right: .2rem;\n              display: -webkit-box;\n              display: -webkit-flex;\n              display: -ms-flexbox;\n              display: flex;\n              box-sizing: border-box;\n              padding: 0 0.04rem;\n              -webkit-box-pack: justify;\n              -webkit-justify-content: space-between;\n                  -ms-flex-pack: justify;\n                      justify-content: space-between;\n              -webkit-box-align: center;\n              -webkit-align-items: center;\n                  -ms-flex-align: center;\n                      align-items: center;\n              width: 0.26rem;\n              height: 0.16rem;\n              margin-left: 0.15rem;\n              border-radius: 3px;\n              background-color: #e4e4e4;\n              position: relative;\n              z-index: 2;\n}\n.view-detail .comment .box .right .top p > a span {\n                position: absolute;\n                top: 0;\n                left: 0;\n                width: 100%;\n                height: 100%;\n                border-radius: 50%;\n                z-index: 2;\n}\n.view-detail .comment .box .right .top p > a i {\n                display: block;\n                width: 0.05rem;\n                height: 0.05rem;\n                background-color: #fff;\n                border-radius: 50%;\n}\n.view-detail .comment .box .right .bottom {\n          display: -webkit-box;\n          display: -webkit-flex;\n          display: -ms-flexbox;\n          display: flex;\n          padding-right: 0.2rem;\n}\n.view-detail .comment .box .right .bottom p {\n            -webkit-box-flex: 1;\n            -webkit-flex: 1;\n                -ms-flex: 1;\n                    flex: 1;\n            word-break: break-all;\n            font-size: 0.26rem;\n            color: #888;\n            line-height: .4rem;\n}\n.view-detail .comment .box .right .bottom p.color {\n              color: #bb7777;\n}\n.view-detail .comment-pop {\n    width: 85%;\n    border-radius: .1rem;\n}\n.view-detail .comment-pop .c-box {\n      padding: .3rem;\n}\n.view-detail .comment-pop textarea {\n      width: 100%;\n      border-radius: .1rem;\n      background: #fbf7f7;\n      padding: .24rem;\n      box-sizing: border-box;\n      line-height: 1.5;\n}\n.view-detail .comment-pop .msgbtns {\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n      height: 0.98rem;\n      line-height: 0.98rem;\n      background-color: #c62f2f;\n      -webkit-box-align: center;\n      -webkit-align-items: center;\n          -ms-flex-align: center;\n              align-items: center;\n      border-bottom-left-radius: .1rem;\n      border-bottom-right-radius: .1rem;\n}\n.view-detail .comment-pop .msgbtns a {\n        color: #fff;\n        font-size: 0.36rem;\n        height: 0.65rem;\n        line-height: 0.65rem;\n        width: 50%;\n        box-sizing: border-box;\n        text-align: center;\n}\n.view-detail .comment-pop .msgbtns a:first-child {\n          border-right: 1px solid #fff;\n}\n.view-detail footer {\n    position: fixed;\n    bottom: 0;\n    height: 1rem;\n    background: #d76e6e;\n    width: 100%;\n    font-size: .36rem;\n    color: #fff;\n    display: -webkit-box;\n    display: -webkit-flex;\n    display: -ms-flexbox;\n    display: flex;\n    z-index: 1111;\n    -webkit-box-pack: center;\n    -webkit-justify-content: center;\n        -ms-flex-pack: center;\n            justify-content: center;\n    -webkit-box-align: center;\n    -webkit-align-items: center;\n        -ms-flex-align: center;\n            align-items: center;\n}\n.view-detail footer a {\n      height: 100%;\n      line-height: 1rem;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n}\n.view-detail footer i {\n      height: 1rem;\n      width: .5rem;\n      background: url(\"/images/space/word_icon.png\") center 0.36rem no-repeat;\n      background-size: .33rem auto;\n}\n.view-detail .add-code {\n    padding: 0.24rem;\n}\n.view-detail .add-code img {\n      width: 100%;\n}\n.view-detail .other-views {\n    padding: 0 .26rem;\n    border-top: .24rem solid #f5f7f8;\n}\n.view-detail .other-views .title {\n      height: .7rem;\n      line-height: .7rem;\n      color: #1c0808;\n      font-size: .28rem;\n      font-weight: bold;\n}\n.view-detail .other-views .title p::before {\n        content: '';\n        display: inline-block;\n        width: .08rem;\n        height: .38rem;\n        background: #c62f2f;\n        border-radius: 50px;\n        vertical-align: middle;\n        margin-right: .2rem;\n}\n.view-detail .other-views ul li {\n      padding: .34rem 0;\n      border-bottom: 1px solid #e8e8e8;\n}\n.view-detail .other-views ul li section.pic-null h4 {\n        display: -webkit-box;\n        -webkit-box-orient: vertical;\n        -webkit-line-clamp: 2;\n        overflow: hidden;\n        color: #1c0808;\n        font-size: .32rem;\n        line-height: .5rem;\n}\n.view-detail .other-views ul li section.pic-null h4 span {\n          display: inline-block;\n          width: .3rem;\n          height: .3rem;\n          background: url(\"/images/3.0/icon-01.png\") no-repeat center center;\n          background-size: 100% 100%;\n          vertical-align: middle;\n          margin-right: .15rem;\n}\n.view-detail .other-views ul li section.pic-1 h4 {\n        color: #1c0808;\n        font-size: .32rem;\n        line-height: .5rem;\n        overflow: hidden;\n        text-overflow: ellipsis;\n        display: -webkit-box;\n        -webkit-box-orient: vertical;\n        -webkit-line-clamp: 3;\n}\n.view-detail .other-views ul li section.pic-1 h4 span {\n          display: inline-block;\n          width: .3rem;\n          height: .3rem;\n          background: url(\"/images/3.0/icon-01.png\") no-repeat center center;\n          background-size: 100% 100%;\n          vertical-align: middle;\n          margin-right: .15rem;\n}\n.view-detail .other-views ul li section.pic-1 > .img {\n        width: 2.26rem;\n        height: 1.48rem;\n        float: right;\n        margin-left: .3rem;\n        background-position: center center;\n        background-size: cover;\n        background-repeat: no-repeat;\n}\n.view-detail .other-views ul li section.pic-3 h4 {\n        display: -webkit-box;\n        -webkit-box-orient: vertical;\n        -webkit-line-clamp: 2;\n        overflow: hidden;\n        color: #1c0808;\n        font-size: .32rem;\n        line-height: .5rem;\n}\n.view-detail .other-views ul li section.pic-3 h4 span {\n          display: inline-block;\n          width: .3rem;\n          height: .3rem;\n          background: url(\"/images/3.0/icon-01.png\") no-repeat center center;\n          background-size: 100% 100%;\n          vertical-align: middle;\n          margin-right: .15rem;\n}\n.view-detail .other-views ul li section.pic-3 .img {\n        display: -webkit-box;\n        display: -webkit-flex;\n        display: -ms-flexbox;\n        display: flex;\n        margin-top: .3rem;\n}\n.view-detail .other-views ul li section.pic-3 .img div {\n          -webkit-box-flex: 1;\n          -webkit-flex: 1;\n              -ms-flex: 1;\n                  flex: 1;\n          height: 1.5rem;\n          background: #cccccc;\n          background-position: center center;\n          background-size: cover;\n          background-repeat: no-repeat;\n}\n.view-detail .other-views ul li section.pic-3 .img div:nth-child(2) {\n            margin: 0 .16rem;\n}\n.view-detail .other-views ul li .info {\n        margin-top: .26rem;\n        font-size: .24rem;\n        color: #b2b2b2;\n}\n.view-detail .other-views ul li .info img {\n          float: left;\n          width: .64rem;\n          height: .64rem;\n          border-radius: 50%;\n          margin-right: .15rem;\n}\n.view-detail .other-views ul li .info .info-right p {\n          margin-bottom: .1rem;\n}\n.view-detail .other-views ul li .info .info-right .tag {\n          color: #bb7676;\n          margin-left: .18rem;\n          display: inline-block;\n}\n.view-detail .other-views ul li .info .info-right .num {\n          float: right;\n}\n.view-detail .other-views ul li .info .info-right .num i {\n            width: .32rem;\n            height: .32rem;\n            display: inline-block;\n            vertical-align: middle;\n            margin-right: .08rem;\n            margin-left: .24rem;\n}\n.view-detail .other-views ul li .info .info-right .num i:nth-child(1) {\n              background: url(\"/images/3.0/icon-03.png\") no-repeat center center;\n              background-size: 100% 80%;\n}\n.view-detail .other-views ul li .info .info-right .num i:nth-child(3) {\n              background: url(\"/images/3.0/icon-04.png\") no-repeat center center;\n              background-size: 100% 100%;\n}\n.view-detail .other-views ul li .info .info-right .num span {\n            vertical-align: middle;\n}\n.view-detail .click-use {\n    position: fixed;\n    top: 40vh;\n    text-align: center;\n    z-index: 2015;\n    width: 100%;\n}\n.view-detail .click-use a {\n      float: right;\n}\n.view-detail .click-use img {\n      width: 0.7rem;\n      height: 0.7rem;\n      display: block;\n      margin: auto;\n}\n.view-detail .click-use span {\n      display: inline-block;\n      background-color: #f7ac54;\n      padding: 0 0.2rem;\n      border-radius: 0.1rem;\n      height: 0.5rem;\n      line-height: 0.5rem;\n      color: #fff;\n      font-size: 0.24rem;\n}\n.view-detail header {\n    padding: 0.46rem .24rem;\n}\n.view-detail header h5 {\n      font-size: 0.4rem;\n      line-height: .6rem;\n      color: #1c0808;\n      font-weight: bold;\n}\n.view-detail header p {\n      margin-top: 0.26rem;\n      font-size: 0.24rem;\n      color: #acb7c0;\n      height: 0.7rem;\n      line-height: 0.7rem;\n}\n.view-detail header p .icon {\n        display: inline-block;\n        width: 0.6rem;\n        height: 0.6rem;\n        border-radius: 100%;\n        background-size: 100% 100%;\n        background-position: center center;\n        vertical-align: middle;\n        margin-right: 0.1rem;\n        background-repeat: no-repeat;\n}\n.view-detail header p .name {\n        color: #888888;\n        display: inline-block;\n        vertical-align: middle;\n        max-width: 35vw;\n}\n.view-detail header p .time {\n        display: inline-block;\n        margin-left: 0.1rem;\n        vertical-align: middle;\n        height: 0.7rem;\n        line-height: 0.7rem;\n        color: #b2b2b2;\n}\n.view-detail header p .tag {\n        display: inline-block;\n        margin-left: 0.1rem;\n        vertical-align: middle;\n        height: 0.7rem;\n        line-height: 0.7rem;\n        color: #bb7676;\n}\n.view-detail header p .seen {\n        float: right;\n        padding-left: 0.4rem;\n        background: url(" + __webpack_require__(1069) + ") left center no-repeat;\n        background-size: 0.32rem auto;\n        color: #b2b2b2;\n        font-size: .24rem;\n}\n.view-detail .lead {\n    margin: 0 0.24rem;\n    padding: 0.24rem;\n    border-radius: 0.1rem;\n    min-height: 0.4rem;\n    font-size: 0.32rem;\n    position: relative;\n    line-height: 1.4;\n    background-color: #f5f7f8;\n    border: 1px solid #ededed;\n}\n.view-detail .lead p {\n      text-indent: 0.9rem;\n      color: #888888;\n      font-size: 0.28rem;\n      line-height: .42rem;\n}\n.view-detail .lead span {\n      position: absolute;\n      color: #888;\n      font-size: .28rem;\n}\n.view-detail .content {\n    padding: 0.3rem 0;\n    position: relative;\n    color: #333;\n    font-size: 0.26rem;\n    line-height: 1.7;\n    background: #ffffff;\n}\n.view-detail .content * {\n      color: #333;\n}\n.view-detail .content .content-item {\n      padding: 0 0.3rem;\n      overflow: hidden;\n}\n.view-detail .content .content-item p {\n        font-size: 0.28rem;\n        color: #333;\n        margin-top: .2rem;\n        line-height: .56rem;\n}\n.view-detail .content .content-item p img {\n          width: 100%;\n}\n.view-detail .content .content-item p span {\n          color: #333 !important;\n}\n.view-detail .content .content-item p:first-child {\n          margin-top: 0;\n}\n.view-detail .content .content-item img {\n        margin-top: 0.2rem;\n        margin-bottom: .2rem;\n        width: -webkit-calc(100vw - 0.6rem);\n        width: calc(100vw - 0.6rem);\n}\n.view-detail .content .over {\n      height: 4.0rem;\n}\n.view-detail .content .overpage-item {\n      width: 100%;\n      position: absolute;\n      height: 4rem;\n      bottom: 0;\n}\n.view-detail .content .overpage {\n      width: 100%;\n      position: absolute;\n      bottom: -0.2rem;\n      background: url(/images/space/overpage.png) center center no-repeat;\n      background-size: 100% auto;\n      padding: .8rem 0;\n}\n.view-detail .content .buy-line {\n      text-align: center;\n      position: relative;\n      font-size: 0.3rem;\n      height: 0.6rem;\n      line-height: 0.6rem;\n      color: #888888;\n      margin-top: .2rem;\n}\n.view-detail .content .buy-line:after, .view-detail .content .buy-line:before {\n        content: '';\n        display: inline-block;\n        width: 20%;\n        height: 1px;\n        top: 0.28rem;\n        background: #E9E4E4;\n}\n.view-detail .content .buy-line:before {\n        position: absolute;\n        left: 0.4rem;\n}\n.view-detail .content .buy-line:after {\n        position: absolute;\n        right: 0.4rem;\n}\n.view-detail .content .buy {\n      display: block;\n      margin: auto;\n      width: 4.7rem;\n      text-align: center;\n      height: .9rem;\n      line-height: .9rem;\n      color: #fff;\n      background: #c62f2f;\n      border-radius: 50px;\n      font-size: .36rem;\n}\n.view-detail .content .buy span {\n        color: #ffffff;\n}\n.view-detail .content .buy span::before {\n          content: '';\n          display: inline-block;\n          width: .32rem;\n          height: .32rem;\n          background: url(\"/images/view-gift-icon.png\") no-repeat center center;\n          background-size: 100% 100%;\n          margin-right: .1rem;\n}\n.view-detail .content .buy del {\n        font-size: .28rem;\n        color: #ffffff;\n        margin-left: .1rem;\n}\n.view-detail .recommend {\n    padding: 0.3rem;\n    margin-top: 0.4rem;\n}\n.view-detail .recommend a {\n      display: block;\n      text-decoration: none;\n      margin-bottom: 0.3rem;\n      color: #6c90fd;\n}\n.view-detail .recommend a:hover,\n    .view-detail .recommend a:active,\n    .view-detail .recommend a:visited {\n      color: #4760D1;\n}\n.view-detail .gray {\n    background: #dddddd !important;\n}\n.view-detail .color-blue {\n    color: #5f86fc;\n}\n.view-detail .buy-way-popup {\n    width: 100%;\n}\n.view-detail .buy-way-popup .title {\n      height: 1rem;\n      line-height: 1rem;\n      text-align: center;\n      font-size: .32rem;\n      color: #1c0808;\n      border-bottom: 1px solid #e8e8e8;\n      position: relative;\n}\n.view-detail .buy-way-popup .title span {\n        float: right;\n        width: 1rem;\n        height: 1rem;\n        background: url(\"/images/cha.png\") no-repeat center center;\n        background-size: .3rem .3rem;\n        position: absolute;\n        top: 0;\n        right: 0;\n}\n.view-detail .buy-way-popup main {\n      padding: .22rem 0;\n      display: -webkit-box;\n      display: -webkit-flex;\n      display: -ms-flexbox;\n      display: flex;\n}\n.view-detail .buy-way-popup main > div {\n        -webkit-box-flex: 1;\n        -webkit-flex: 1;\n            -ms-flex: 1;\n                flex: 1;\n        text-align: center;\n        padding-top: .24rem;\n}\n.view-detail .buy-way-popup main > div img {\n          width: 1.8rem;\n          height: 1.8rem;\n}\n.view-detail .buy-way-popup main > div h3 {\n          font-size: .32rem;\n          color: #353535;\n          margin: .16rem 0;\n}\n.view-detail .buy-way-popup main > div h4 {\n          font-size: .24rem;\n          color: #c62f2f;\n}\n.view-detail .buy-way-popup main > div h4 span::before {\n            content: '';\n            display: inline-block;\n            width: .28rem;\n            height: .3rem;\n            background: url(/images/3.0/gift-icon.png) no-repeat center center;\n            background-size: 100% 100%;\n            margin-right: .1rem;\n            vertical-align: sub;\n}\n.view-detail .buy-way-popup main > div h4 del {\n            font-size: .22rem;\n            color: #353535;\n            margin-left: .1rem;\n}\n.view-detail .buy-way-popup main > div button {\n          border: none;\n          background: #c62f2f;\n          color: #ffffff;\n          width: 1.12rem;\n          height: .5rem;\n          border-radius: 50px;\n          font-size: .28rem;\n          margin: .22rem 0;\n          position: relative;\n}\n.view-detail .buy-way-popup main > div p {\n          font-size: .24rem;\n          color: #b2b2b2;\n}\n.view-detail .buy-way-popup main > div:last-child {\n          border-left: 1px solid #e8e8e8;\n}\n.view-detail .buy-way-popup main > div.wrap-pay button::before {\n          content: '\\63A8\\8350';\n          background: #ffa00a;\n          color: #ffffff;\n          font-size: .2rem;\n          padding: .04rem .08rem;\n          border-bottom-right-radius: 60px;\n          border-top-left-radius: 60px;\n          border-top-right-radius: 60px;\n          position: absolute;\n          top: -.18rem;\n          right: -.4rem;\n}\n.view-detail .buy-confirm-popup {\n    width: 100%;\n}\n.view-detail .buy-confirm-popup .title {\n      height: 1rem;\n      line-height: 1rem;\n      text-align: center;\n      font-size: .32rem;\n      color: #1c0808;\n      border-bottom: 1px solid #e8e8e8;\n      position: relative;\n}\n.view-detail .buy-confirm-popup .title span {\n        float: right;\n        width: 1rem;\n        height: 1rem;\n        background: url(\"/images/cha.png\") no-repeat center center;\n        background-size: .3rem .3rem;\n        position: absolute;\n        top: 0;\n        right: 0;\n}\n.view-detail .buy-confirm-popup main {\n      text-align: center;\n}\n.view-detail .buy-confirm-popup main img {\n        width: 1.8rem;\n        height: 1.8rem;\n        margin-top: .56rem;\n}\n.view-detail .buy-confirm-popup main h3 {\n        font-size: .32rem;\n        color: #353535;\n        margin: .16rem 0;\n}\n.view-detail .buy-confirm-popup main h4 {\n        font-size: .24rem;\n        color: #c62f2f;\n}\n.view-detail .buy-confirm-popup main h4 span::before {\n          content: '';\n          display: inline-block;\n          width: .28rem;\n          height: .3rem;\n          background: url(/images/3.0/gift-icon.png) no-repeat center center;\n          background-size: 100% 100%;\n          margin-right: .1rem;\n          vertical-align: sub;\n}\n.view-detail .buy-confirm-popup main h4 del {\n          font-size: .22rem;\n          color: #353535;\n          margin-left: .1rem;\n}\n.view-detail .buy-confirm-popup main > p {\n        font-size: .24rem;\n        color: #b2b2b2;\n        margin-top: .1rem;\n}\n.view-detail .buy-confirm-popup main .choose {\n        color: #888888;\n        font-size: .28rem;\n        margin: .4rem 0;\n}\n.view-detail .buy-confirm-popup main .choose a {\n          color: #bb7676;\n}\n.view-detail .buy-confirm-popup main .choose.un-check p::before {\n          content: '';\n          display: inline-block;\n          width: .32rem;\n          height: .32rem;\n          background: url(\"/images/radio-default.png\") no-repeat;\n          background-size: 100% 100%;\n          vertical-align: middle;\n          margin-right: .1rem;\n}\n.view-detail .buy-confirm-popup main .choose.is-check p::before {\n          content: '';\n          display: inline-block;\n          width: .32rem;\n          height: .32rem;\n          background: url(\"/images/radio-active-red.png\") no-repeat;\n          background-size: 100% 100%;\n          vertical-align: middle;\n          margin-right: .1rem;\n}\n.view-detail .buy-confirm-popup main button {\n        width: 100%;\n        height: 1rem;\n        text-align: center;\n        background: #c62f2f;\n        color: #ffffff;\n        font-size: .36rem;\n        border: none;\n}\n.view-detail .buy-confirm-popup main button.gray {\n          background: #888 !important;\n}\n.view-detail .tips {\n    height: 1.1rem;\n    line-height: 1.1rem;\n    text-align: center;\n    font-size: .24rem;\n    color: #b2b2b2;\n}\n.view-detail .favour-btn {\n    position: fixed;\n    right: 0;\n    top: 2.8rem;\n    width: .8rem;\n    height: .8rem;\n    background: url(\"/images/3.0/zan-btn-default.png\") no-repeat;\n    background-size: 100% 100%;\n    padding-left: .8rem;\n    z-index: 11;\n}\n.view-detail .favour-btn p {\n      color: #353535;\n      font-size: .2rem;\n      text-align: center;\n      margin-right: .14rem;\n      margin-bottom: .06rem;\n}\n.view-detail .favour-btn p:first-child {\n        margin-top: 14%;\n}\n.view-detail .favour-btn.click p {\n      color: #c62f2f;\n}\n", ""]);

// exports


/***/ }),

/***/ 1069:
/***/ (function(module, exports) {

module.exports = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAWCAYAAAChWZ5EAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTM4IDc5LjE1OTgyNCwgMjAxNi8wOS8xNC0wMTowOTowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTcgKFdpbmRvd3MpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjNBRUYxRTUxQ0VBQzExRTdCMjk5RkQ1MDlEMDkyOTIxIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjNBRUYxRTUyQ0VBQzExRTdCMjk5RkQ1MDlEMDkyOTIxIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6M0FFRjFFNEZDRUFDMTFFN0IyOTlGRDUwOUQwOTI5MjEiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6M0FFRjFFNTBDRUFDMTFFN0IyOTlGRDUwOUQwOTI5MjEiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz6rETNjAAACTUlEQVR42sSWP2hTURTGkyJBEMQYsLSBKiq4aBGLkk61RNdQEcwUISC1WKhLXZqhdnHRoQlEaUGHdupQ0FcdolHcDLGDNB0UNCjS2pAmkYDQrf2ufIHX67nvvZSCB36Qe/6/3PfOvX7LsnxtSgRcBKdAkLoG+AY+gkI7yQ549DsDEiAOTrv4fgULYB58cUvc4WI/DNLgM0h5KO6jT4oxaebY0z8QA49BWLDVwTvwk+seMAiOan5j4Dq4A6x2GrgPJgX9HzAB5sBvzXYE3AQPwCGbXj3ACzDFvK5b8MxQfA30goxQ3Eddhj5rgn2SuR0bUE+WFIK3wCVQ9vAOlOm7JdiSrCE28IRvuiTjYF3QnyO6KN97hlwJ1trVgHpZRgwBNZDVdJ0gD1aI+n1M88lyPkgywpp/G+jj52KSN4LuOYja1lHq7LLNxkyiavapBl657OkPbX2W01CXftr098FJXqoGAr7/JwHVwA0Xp+PaetUw7z/QZpeTLrnjHdynpw5OVwXdEHhrW+c5Oe3iB1cc8qqa+dZXcEvoviUhMKrpKkzeS1STm5rPqO201KXEmrvmwACoGgIegW5DopKgV74PDbmqrPXPIKrz7d4Qgg6Cooc9be17kTG6bLBGwzSK1WdzHiwLwWEOnbuGvzZI24rhBF1m7rLbaVjhjWcGDGs2dcpN82B5D75TfwJcdtjzWXC73fuACljkMRoRnvaah+0o8AjO7fVG9JoTLsYLRdND0SZ9Y4zN7cedcImEeHZcAF3apfQX+MSLac3rKNwRYACStXeSOuaKLAAAAABJRU5ErkJggg=="

/***/ }),

/***/ 1183:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    ref: "viewDetail",
    staticClass: "view-detail"
  }, [(_vm.loading == true) ? [_c('loading')] : [_c('header', {
    ref: "header"
  }, [_c('h5', [_vm._v(_vm._s(_vm.articleList.title) + " ")]), _vm._v(" "), _c('p', [_c('span', {
    staticClass: "icon",
    style: ({
      backgroundImage: 'url(' + _vm.articleList.head_add + ')'
    })
  }), _vm._v(" "), _c('span', {
    staticClass: "name text-ell"
  }, [_vm._v(_vm._s(_vm.articleList.alias))]), _vm._v(" "), _c('span', {
    staticClass: "time"
  }, [_vm._v(_vm._s(_vm._f("formatTime")(_vm.articleList.update_time)))]), _vm._v(" "), _c('span', {
    staticClass: "tag"
  }, [_vm._v(_vm._s(_vm.articleList.title_cate))]), _vm._v(" "), _c('span', {
    staticClass: "seen"
  }, [_vm._v(_vm._s(_vm.articleList.study_num))])])]), _vm._v(" "), _c('div', {
    staticClass: "lead"
  }, [_c('span', [_vm._v("导读:")]), _vm._v(" "), _c('p', [_vm._v(_vm._s(_vm.articleList.lead))])]), _vm._v(" "), _c('div', {
    staticClass: "content"
  }, [_c('div', {
    staticClass: "content-item",
    class: _vm.articleList.level == 0 || _vm.articleList.isBuy == 1 || _vm.userInfoId == _vm.articleList.uid ? '' : 'over',
    attrs: {
      "id": "content"
    },
    domProps: {
      "innerHTML": _vm._s(_vm.articleList.content)
    }
  }), _vm._v(" "), (_vm.articleList.uid != this.userInfoId) ? [_c('div', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.articleList.level == 1 && _vm.articleList.isBuy == 0),
      expression: "articleList.level == 1 && articleList.isBuy == 0 "
    }],
    staticClass: "overpage-item"
  }), _vm._v(" "), _c('div', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.articleList.level == 1 && _vm.articleList.isBuy == 0),
      expression: "articleList.level == 1 && articleList.isBuy == 0 "
    }],
    staticClass: "overpage"
  }, [_c('a', {
    staticClass: "buy",
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": _vm.msgOver
    }
  }, [_c('span', [_vm._v(_vm._s(_vm.articleList.price))]), _vm._v(" "), _c('del', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.articleList.original_price),
      expression: "articleList.original_price"
    }]
  }, [_vm._v(_vm._s(_vm.articleList.original_price))])]), _vm._v(" "), _c('p', {
    staticClass: "buy-line"
  }, [_vm._v("送礼可阅读全文")])])] : _vm._e()], 2), _vm._v(" "), _c('div', {
    staticClass: "add-code"
  }, [_c('img', {
    attrs: {
      "src": "/images/space/erweima_ben.png",
      "alt": ""
    }
  })]), _vm._v(" "), (_vm.recommendList.length != 0) ? _c('section', {
    staticClass: "other-views"
  }, [_c('div', {
    staticClass: "title"
  }, [_c('p', [_vm._v("猜您喜欢")])]), _vm._v(" "), _c('ul', _vm._l((_vm.recommendList), function(item) {
    return _c('li', {
      on: {
        "click": function($event) {
          _vm.recommend($event, item)
        }
      }
    }, [(item.imageList.length >= 1) ? _c('section', {
      staticClass: "pic-1 clearfix"
    }, [_c('div', {
      staticClass: "img",
      style: ({
        'background-image': 'url(' + item.imageList[0] + '?imageView2/2/w/200)'
      })
    }), _vm._v(" "), _c('h4', [_c('span', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (item.level == 1),
        expression: "item.level == 1"
      }]
    }), _vm._v(_vm._s(item.title))])]) : _c('section', {
      staticClass: "pic-null"
    }, [_c('h4', [_c('span', {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: (item.level == 1),
        expression: "item.level == 1"
      }]
    }), _vm._v(_vm._s(item.title))])]), _vm._v(" "), _c('section', {
      staticClass: "info"
    }, [_c('img', {
      attrs: {
        "src": _vm.articleList.head_add,
        "alt": "头像"
      }
    }), _vm._v(" "), _c('section', {
      staticClass: "info-right"
    }, [_c('p', [_vm._v(_vm._s(_vm.articleList.alias))]), _vm._v(" "), _c('div', [_c('span', [_vm._v(_vm._s(_vm._f("formatTime")(_vm.articleList.update_time)))]), _vm._v(" "), _c('span', {
      staticClass: "tag"
    }, [_vm._v(_vm._s(item.title_cate))]), _vm._v(" "), _c('div', {
      staticClass: "num"
    }, [_c('i'), _c('span', [_vm._v(_vm._s(item.study_num))])])])])])])
  }))]) : _vm._e(), _vm._v(" "), _c('section', {
    staticClass: "tips"
  }, [_vm._v("\n            以上观点仅供参考，不构成投资建议\n        ")])], _vm._v(" "), _c('div', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.medalShow),
      expression: "medalShow"
    }],
    staticClass: "v-modal",
    staticStyle: {
      "z-index": "2016"
    },
    on: {
      "click": _vm.msgPop
    }
  }), _vm._v(" "), (_vm.msgboxShow) ? _c('div', {
    staticClass: "mint-msgbox"
  }, [_c('div', {
    staticClass: "box"
  }, [_c('span', {
    staticClass: "img"
  }), _vm._v(" "), _c('h5', {
    staticClass: "class-name"
  }, [_vm._v(_vm._s(_vm.articleList.title))]), _vm._v(" "), _c('p', {
    staticClass: "brief"
  }, [_vm._v(_vm._s(_vm.articleList.price))]), _vm._v(" "), (_vm.checkedState) ? _c('span', {
    staticClass: "btn-icon",
    on: {
      "click": _vm.topaygift
    }
  }, [_vm._v("购买")]) : _vm._e(), _vm._v(" "), (!_vm.checkedState) ? _c('span', {
    staticClass: "btn-icon gray"
  }, [_vm._v("购买")]) : _vm._e(), _vm._v(" "), _c('span', {
    staticClass: "icon-cancel",
    on: {
      "click": _vm.msgPop
    }
  }), _vm._v(" "), _c('div', {
    staticClass: "hint"
  }, [_c('div', {
    staticClass: "hint-checkbox",
    on: {
      "click": function($event) {
        $event.stopPropagation();
        _vm.checkedState = !_vm.checkedState
      }
    }
  }, [(_vm.checkedState) ? _c('img', {
    attrs: {
      "src": "/images/select_frame.png",
      "alt": ""
    }
  }) : _vm._e()]), _vm._v(" "), _c('span', [_vm._v("我同意遵循 "), _c('router-link', {
    attrs: {
      "to": "/agreement"
    }
  }, [_c('span', {
    staticClass: "color-blue"
  }, [_vm._v("《大策略平台协议》")])])], 1)])])]) : _vm._e(), _vm._v(" "), (_vm.payboxShow) ? _c('LackGifts', {
    on: {
      "msgPop": _vm.msgPop
    }
  }) : _vm._e(), _vm._v(" "), _c('mt-popup', {
    staticClass: "buy-way-popup",
    attrs: {
      "position": "bottom",
      "popup-transition": "popup-fade"
    },
    model: {
      value: (_vm.showBuyWay),
      callback: function($$v) {
        _vm.showBuyWay = $$v
      },
      expression: "showBuyWay"
    }
  }, [_c('div', {
    staticClass: "title"
  }, [_vm._v("请选择送礼方式 "), _c('span', {
    on: {
      "click": function($event) {
        _vm.showBuyWay = false
      }
    }
  })]), _vm._v(" "), _c('main', [_c('div', [_c('img', {
    attrs: {
      "src": _vm.pointGiftInfo.img,
      "alt": ""
    }
  }), _vm._v(" "), _c('h3', [_vm._v(_vm._s(_vm.pointGiftInfo.name))]), _vm._v(" "), _c('h4', [_c('span', [_vm._v(_vm._s(_vm.articleList.price))]), _vm._v(" "), _c('del', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.articleList.original_price),
      expression: "articleList.original_price"
    }]
  }, [_vm._v(_vm._s(_vm.articleList.original_price))])]), _vm._v(" "), _c('button', {
    on: {
      "click": function($event) {
        _vm.sendClick(_vm.articleList.price, 2, _vm.viewpoint_id)
      }
    }
  }, [_vm._v("兑换")]), _vm._v(" "), _c('p', [_vm._v("单篇兑换，永久有效")])]), _vm._v(" "), _c('div', {
    staticClass: "wrap-pay"
  }, [_c('img', {
    attrs: {
      "src": _vm.weekGiftInfo.img,
      "alt": ""
    }
  }), _vm._v(" "), _c('h3', [_vm._v(_vm._s(_vm.weekGiftInfo.name))]), _vm._v(" "), _c('h4', [_c('span', [_vm._v(_vm._s(_vm.articleList.viewpointWeekPrice))])]), _vm._v(" "), _c('button', {
    on: {
      "click": function($event) {
        _vm.sendClick(_vm.articleList.viewpointWeekPrice, 7, _vm.articleList.uid)
      }
    }
  }, [_vm._v("兑换")]), _vm._v(" "), _c('p', [_vm._v("7天内可阅读该讲师发表的")]), _vm._v(" "), _c('p', [_vm._v("所有收费观点")])])])]), _vm._v(" "), _c('mt-popup', {
    staticClass: "buy-confirm-popup",
    attrs: {
      "position": "bottom",
      "popup-transition": "popup-fade"
    },
    model: {
      value: (_vm.showBuyConfirm),
      callback: function($$v) {
        _vm.showBuyConfirm = $$v
      },
      expression: "showBuyConfirm"
    }
  }, [_c('div', {
    staticClass: "title"
  }, [_vm._v("老师，您好！"), _c('span', {
    on: {
      "click": function($event) {
        _vm.showBuyConfirm = false
      }
    }
  })]), _vm._v(" "), _c('main', [_c('img', {
    attrs: {
      "src": _vm.confirmGiftInfo.img,
      "alt": ""
    }
  }), _vm._v(" "), _c('h3', [_vm._v(_vm._s(_vm.confirmGiftInfo.name))]), _vm._v(" "), _c('h4', [_c('span', [_vm._v(_vm._s(_vm.payAmount))]), _vm._v(" "), _c('del', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.articleList.original_price),
      expression: "articleList.original_price"
    }]
  }, [_vm._v(_vm._s(_vm.articleList.original_price))])]), _vm._v(" "), _c('p', [_vm._v("剩余：" + _vm._s(_vm.residue))]), _vm._v(" "), _c('div', {
    staticClass: "choose",
    class: {
      'un-check': !_vm.checkedState, 'is-check': _vm.checkedState
    },
    on: {
      "click": function($event) {
        $event.stopPropagation();
        _vm.checkedState = !_vm.checkedState
      }
    }
  }, [_c('p', [_vm._v("我同意遵循"), _c('router-link', {
    attrs: {
      "to": "/agreement"
    }
  }, [_vm._v("《大策略平台协议》")])], 1)]), _vm._v(" "), _c('button', {
    class: {
      'gray': !_vm.checkedState
    },
    on: {
      "click": function($event) {
        _vm.topaygift(_vm.payAmount, _vm.payType, _vm.payClassId)
      }
    }
  }, [_vm._v("确定赠送")])])]), _vm._v(" "), _c('mt-popup', {
    staticClass: "comment-pop",
    attrs: {
      "popup-transition": "popup-fade"
    },
    model: {
      value: (_vm.commentPop),
      callback: function($$v) {
        _vm.commentPop = $$v
      },
      expression: "commentPop"
    }
  }, [_c('div', {
    staticClass: "c-box"
  }, [(this.commentStatus == 0 || _vm.userId == _vm.articleList.uid || _vm.articleList.isAssistant == 1 || _vm.isVest == true) ? [_c('textarea', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.Ccontent),
      expression: "Ccontent"
    }],
    attrs: {
      "cols": "20",
      "rows": "7",
      "placeholder": "请输入您的留言~"
    },
    domProps: {
      "value": (_vm.Ccontent)
    },
    on: {
      "input": function($event) {
        if ($event.target.composing) { return; }
        _vm.Ccontent = $event.target.value
      }
    }
  })] : [_c('textarea', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.Ccontent),
      expression: "Ccontent"
    }],
    attrs: {
      "cols": "20",
      "rows": "7",
      "placeholder": "请输入您的留言内容，留言经审核后显示~"
    },
    domProps: {
      "value": (_vm.Ccontent)
    },
    on: {
      "input": function($event) {
        if ($event.target.composing) { return; }
        _vm.Ccontent = $event.target.value
      }
    }
  })]], 2), _vm._v(" "), _c('div', {
    staticClass: "msgbtns"
  }, [_c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": function($event) {
        _vm.commentPop = false;
        _vm.replyBool = false
      }
    }
  }, [_vm._v("取消")]), _vm._v(" "), (this.replyBool) ? _c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": function($event) {
        _vm.addComment(2)
      }
    }
  }, [_vm._v("确定")]) : _c('a', {
    attrs: {
      "href": "javascript:;"
    },
    on: {
      "click": function($event) {
        _vm.addComment(1)
      }
    }
  }, [_vm._v("确定")])])]), _vm._v(" "), _c('Qrcode'), _vm._v(" "), _c('div', {
    ref: "mask",
    staticClass: "menu-mask",
    on: {
      "click": function($event) {
        $event.stopPropagation();
        _vm.cancalCommentMenu($event)
      }
    }
  })], 2)
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-6b73ae7e", module.exports)
  }
}

/***/ }),

/***/ 1293:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(1025);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("4a843bf1", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-6b73ae7e\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./viewpointDetail.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-6b73ae7e\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./viewpointDetail.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 500:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(1293)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(925),
  /* template */
  __webpack_require__(1183),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\personalSpace\\viewpointDetail.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] viewpointDetail.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-6b73ae7e", Component.options)
  } else {
    hotAPI.reload("data-v-6b73ae7e", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


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

/***/ 925:
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

var _LackGifts = __webpack_require__(138);

var _LackGifts2 = _interopRequireDefault(_LackGifts);

var _QrCode = __webpack_require__(524);

var _QrCode2 = _interopRequireDefault(_QrCode);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

exports.default = {
    computed: (0, _vuex.mapState)({
        isWeiXin: function isWeiXin(state) {
            return state.isWeiXin;
        },
        userId: function userId(state) {
            return state.userInfo.user_id;
        },
        userInfoId: function userInfoId() {
            return this.$store.state.userInfo.user_id;
        },
        type: function type() {
            return this.$store.state.userInfo.type;
        },
        isVest: function isVest() {
            //判断马甲号
            return this.$store.state.userInfo.isVest;
        }
    }),
    data: function data() {
        return {
            viewpoint_id: this.$route.params.viewpointId,
            userid: this.$route.params.share_userId,
            articleList: [],
            loading: true,
            jsonstr: '',
            viewId: '',
            param: '',
            bool: false,
            medalShow: false, //蒙版
            msgboxShow: false, //购买面板
            payboxShow: false, //充值面板
            residue: '', //剩余
            img: 'images/space/zan.png',
            imgPaths: [],
            checkedState: true,
            showBuyWay: false, //送礼方式弹窗
            showBuyConfirm: false, //确定送礼弹窗
            recommendList: [], //推荐列表数据
            payType: '', //2:购买观点 7::购买观点包周
            payAmount: '', //支付的金额
            payClassId: '', //购买观点使用观点id ，观点包周使用讲师id
            pointGiftInfo: { //观点的礼物信息
                img: '',
                name: ''
            },
            weekGiftInfo: { //包周的礼物信息
                img: '',
                name: ''
            },
            confirmGiftInfo: {}, //支付时的礼物信息
            zanBg: 'images/3.0/zan-btn-default.png', //赞按钮默认背景
            loading1: false,
            loadedLevel: false, //ajax加载
            isEnd: false,
            comments: [],
            page: 1,
            perPage: 100,
            commentPop: false, //留言弹窗
            Ccontent: "",
            pid: "", //父id
            replyBool: false,
            commentStatus: 0

        };
    },
    created: function created() {
        var _this2 = this;

        this.reloadPage();
        this.winToTop();
        this.$store.commit('setTitle', '观点正文');
        this.$store.commit('hideTabber');
        this.share_fansVisit();
        this.$store.dispatch('getUserInfo', function (res) {
            _this2.getViewData(_this2.viewpoint_id);
            _this2.getGift();
            _this2.getCommentStatus();
            _this2.getData();
        });
        if (location.href.indexOf('bind') != -1) {
            this.param = "isIndexRecommend:1";
            this.bool = true;
        }
    },
    mounted: function mounted() {},

    methods: {
        // 1/2
        handleBottomChange: function handleBottomChange(status) {
            this.bottomStatus = status;
        },
        cancalCommentMenu: function cancalCommentMenu(e) {
            var $target = $(e.target);
            $target.hide();
            $(".item-menu").removeClass("active");
        },
        toggleCommentMenu: function toggleCommentMenu(e) {
            var $target = $(e.target);
            this.$refs.mask.style.display = "block";
            $(".item-menu").removeClass("active");
            $target.siblings(".item-menu").toggleClass("active");

            // $target.find('.menu-mask').show();
        },

        // 点击留言btn
        commentFun: function commentFun() {
            var _this3 = this;

            var param = {
                userId: this.userId,
                teacherId: this.articleList.uid
            };
            this.$http.get(this.hostUrl + "/User/getGossip", { params: param }).then(function (res) {
                res = res.body;
                if (res.msg == 1) {
                    (0, _mintUi.Toast)('你已经被禁言了哦');
                } else {
                    _this3.commentPop = true;
                    _this3.Ccontent = "";
                }
            });
        },

        // 禁言
        forbidComment: function forbidComment(id) {
            var _this4 = this;

            var param = {
                userId: id,
                teacherId: this.articleList.uid
            };
            this.$http.get(this.hostUrl + "/User/getGossip", { params: param }).then(function (res) {
                res = res.body;
                if (res.msg == 1) {
                    (0, _mintUi.Toast)('该用户已被禁言，24小时内不得重复禁言');
                } else {
                    _this4.$http.get(_this4.hostUrl + "/User/setGossip", { params: param }).then(function (res) {
                        res = res.body;
                        if (res.code == 200) {
                            (0, _mintUi.Toast)(res.msg);
                            $(".item-menu").removeClass("active");
                            _this4.$refs.mask.style.display = "none";
                        } else {
                            (0, _mintUi.Toast)(res.msg);
                        }
                    });
                }
            });
        },


        //删除留言
        delectComment: function delectComment(id) {
            var _this5 = this;

            this.$http.get(this.hostUrl + "LeaveMsg/delLeaveMsg", { params: { leaveId: id } }).then(function (res) {
                res = res.body;
                $(".item-menu").removeClass("active");
                if (res.code == 0) {
                    _this5.getData();
                    (0, _mintUi.Toast)("删除留言成功");
                    $(".item-menu").removeClass("active");
                    _this5.$refs.mask.style.display = "none";
                } else {}
            });
        },

        //回复
        replyComment: function replyComment(id) {
            this.pid = id;
            this.commentPop = true;
            this.replyBool = true;
            this.Ccontent = "";
            $(".item-menu").removeClass("active");
            this.$refs.mask.style.display = "none";
        },
        addComment: function addComment(type) {
            var _this6 = this;

            if (this.Ccontent.trim() == "" || this.Ccontent.length == "") {
                (0, _mintUi.Toast)("留言不能为空哦");
                return false;
            }
            if (type == 1) {
                this.replyBool = false;
                var param = {
                    type: 2,
                    id: this.viewpoint_id,
                    content: this.Ccontent,
                    userId: this.userId,
                    teacherId: this.articleList.uid
                };
            } else {
                var param = {
                    type: 2,
                    id: this.viewpoint_id,
                    content: this.Ccontent,
                    userId: this.userId,
                    teacherId: this.articleList.uid,
                    pid: this.pid
                };
            }

            this.$http.get(this.hostUrl + "LeaveMsg/addLeaveMsg", { params: param }).then(function (res) {
                res = res.body;
                if (res.code == 0) {
                    _this6.getData();
                    _this6.commentPop = false;
                    _this6.Ccontent = "";
                    _this6.replyBool = false;
                    (0, _mintUi.Toast)({
                        message: '留言成功',
                        iconClass: 'icon icon-success',
                        duration: 1000
                    });
                    $(".item-menu").removeClass("active");
                    _this6.$refs.mask.style.display = "none";
                    console.log("留言成功" + res.data);
                    //滚动到所留言列表第一条
                    $('html, body').animate({
                        scrollTop: $(".comment h5").offset().top - 50
                    }, 100);
                } else {
                    (0, _mintUi.Toast)({
                        message: res.msg,
                        duration: 1000
                    });
                    _this6.commentPop = false;
                    _this6.Ccontent = "";
                    _this6.replyBool = false;
                }
            });
        },
        getCommentStatus: function getCommentStatus() {
            var _this7 = this;

            this.$http.get(this.hostUrl + "/LeaveMsg/getLeaveMsgStatus").then(function (res) {
                res = res.body;
                if (res.code == 200) {
                    _this7.commentStatus = res.data.viewPointStatus;
                }
            });
        },
        getData: function getData(bool) {
            var _this8 = this;

            if (bool != 1) {
                this.page = 1;
            }

            var param = {
                type: 2,
                pageNo: this.page,
                id: this.viewpoint_id,

                perPage: this.perPage
            };
            if (bool == 1) {
                param.pageNo = 1;
            }

            this.$http.get(this.hostUrl + "LeaveMsg/getLeaveMsgListByType", { params: param }).then(function (res) {
                res = res.body;
                if (res.code == 0) {
                    if (bool == 1) {
                        _this8.comments = _this8.comments.push(res.data);
                    } else {
                        _this8.comments = [];

                        _this8.comments = _this8.comments.concat(res.data);
                        console.log("留言" + _this8.comments);
                        if (res.data.length < _this8.perPage) {
                            _this8.isEnd = true;
                            _this8.loading1 = true;
                        }
                        _this8.loading1 = false;
                    }
                } else {}
            });
        },

        //加载
        loadMore: function loadMore() {
            var _this9 = this;

            this.loading1 = true;
            if (!this.isEnd) {
                this.page++;
                var param = {
                    type: 2,
                    pageNo: this.page,
                    id: this.viewpoint_id,

                    perPage: this.perPage
                };
                this.$http.get(this.hostUrl + "LeaveMsg/getLeaveMsgListByType", { params: param }).then(function (res) {
                    res = res.body;
                    if (res.code == 0) {
                        _this9.comments = _this9.comments.concat(res.data);
                        console.log("留言2");
                        self.$refs.loadmore.onBottomLoaded();
                        if (res.data.length < _this9.perPage) {
                            _this9.isEnd = true;
                            _this9.loading1 = true;
                        }
                        _this9.loading1 = false;
                    } else {}
                });
            }
        },
        linkRecharge: function linkRecharge() {
            //余额不足充值
            if (this.isWeiXin == false) {
                var u = navigator.userAgent;
                var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Adr') > -1; //android终端
                var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端
                if (isiOS || isAndroid) {
                    this.JsBridge.callHandler('recharge', {} //$class_type = 1;//课程类型 1：单课程 2：系列课  3：系列课子课程
                    , function (res) {
                        res = JSON.parse(res);
                        console.log(res);
                    });
                } else {
                    this.$router.replace({ path: '/giftBalance' });
                }
            } else {
                this.$router.replace({ path: '/giftBalance' });
            }
        },
        getGiftData: function getGiftData(price, bool) {
            var _this10 = this;

            //bool true:观点对应的礼物，false:包周对应的礼物
            this.$http.get('/Gift/payLists', { params: { price: price } }).then(function (res) {
                if (res.body.code == 0) {
                    if (bool) {
                        _this10.pointGiftInfo.img = res.body.data[0].img;
                        _this10.pointGiftInfo.name = res.body.data[0].name;
                    } else {
                        _this10.weekGiftInfo.img = res.body.data[0].img;
                        _this10.weekGiftInfo.name = res.body.data[0].name;
                    }
                }
            });
        },

        //购买面板打开
        msgOver: function msgOver() {
            /*this.msgboxShow = true
            this.medalShow = true*/
            document.body.style.overflowY = 'hidden';
            this.showBuyWay = true;
        },

        //购买面板关闭
        msgPop: function msgPop() {
            this.checkedState = true;
            this.msgboxShow = false;
            this.medalShow = false;
            this.payboxShow = false;
            document.body.style.overflowY = 'scroll';
        },
        sendClick: function sendClick(price, type, id) {
            this.showBuyConfirm = true;
            this.showBuyWay = false;
            this.payType = type;
            this.payAmount = price;
            this.payClassId = id;
            if (type == 2) {
                //观点
                this.confirmGiftInfo = this.pointGiftInfo;
            } else if (type == 7) {
                //包周
                this.confirmGiftInfo = this.weekGiftInfo;
            }
        },
        topaygift: function topaygift(payAmount, payType, payClassId) {
            var _this11 = this;

            if (!this.checkedState) {
                return;
            }
            if (this.residue >= payAmount) {
                this.$http.post(this.hostUrl + '/InpourPay/pay', {
                    user_id: this.userInfoId,
                    class_id: payClassId,
                    amount: payAmount,
                    type: payType,
                    remake: ''
                }, { emulateJSON: true }).then(function (res) {
                    if (res.body.code == 0) {
                        (0, _mintUi.Toast)({
                            message: '兑换成功',
                            duration: 800
                        });
                        _this11.msgPop();
                        _this11.bool = false;
                        _this11.getViewData(_this11.viewpoint_id);
                        _this11.showBuyConfirm = false;
                    } else {
                        (0, _mintUi.Toast)({
                            message: res.body.msg,
                            duration: 800
                        });
                    }
                });
            } else {
                //                    this.msgboxShow = false;
                this.payboxShow = true;
                this.medalShow = true;
            }
        },

        //获取我的
        getGift: function getGift() {
            var _this12 = this;

            this.$http.get(this.hostUrl + '/User/getAccountBalance').then(function (res) {
                res = res.body;
                if (res.code == 200) {
                    _this12.residue = res.data;
                } else {
                    console.log(res);
                }
            });
        },
        getViewData: function getViewData(viewpoint_id) {
            var _this13 = this;

            //获取观点数据
            this.$http.post(this.hostUrl + 'Viewpoint/getViewPointAndRecommendById', {
                viewpointId: viewpoint_id,
                isIndexRecommend: this.bool == true ? 1 : '',
                isUserInfo: true
            }, { emulateJSON: true }).then(function (res) {
                if (res.body.code == 200) {
                    _this13.winToTop();
                    _this13.getGiftData(res.data.data.price, true); //获取观点礼物的信息
                    _this13.getGiftData(res.data.data.viewpointWeekPrice, false); //获取观点包周礼物的信息
                    _this13.loading = false;
                    _this13.articleList = res.data.data;
                    _this13.recommendList = res.data.data.recommendList;
                    _this13.$store.dispatch('getSdkData', function (res) {
                        _this13.config();
                    });
                    if (_this13.articleList.lead.length > 200) {
                        //导语最多显示200个字
                        _this13.articleList.lead = _this13.articleList.lead.substr(0, 200) + '...';
                    } else if (_this13.articleList.lead == '') {
                        //没有导语时，截取正文内容
                        var content = _this13.articleList.content.replace(/<.*?>/ig, ""); //去除标签名
                        if (content.length > 200) {
                            _this13.articleList.lead = content.substr(0, 200) + '...';
                        } else {
                            _this13.articleList.lead = content;
                        }
                    }
                    //从富文本中提取图片
                    var reg = /<img [^>]*src=['"]([^'"]+)([^>]*>)/gi;

                    var tem;
                    while (tem = reg.exec(_this13.articleList.content)) {
                        _this13.imgPaths.push(tem[1]);
                    }
                    _this13.$nextTick(function () {
                        if (_this13.loading == false) {
                            var contentId = document.getElementById('content');

                            var imgs = contentId.querySelectorAll("img");
                            //点击预览
                            for (var i = 0; i < imgs.length; i++) {
                                var _this = _this13;
                                imgs[i].onclick = function (e) {
                                    wx.previewImage({
                                        current: e.target.src,
                                        urls: _this.imgPaths
                                    });
                                };
                            }
                        }
                    });
                } else {
                    (0, _mintUi.Toast)({
                        message: res.body.msg,
                        duration: 1000
                    });
                }

                if (_this13.bool = true) {
                    _this13.$router.replace('/personalSpace/viewpointDetail/' + viewpoint_id + '&' + _this13.userInfoId);
                } else {
                    _this13.$router.push('/personalSpace/viewpointDetail/' + viewpoint_id + '&' + _this13.userInfoId);
                }
                _this13.bool = false;
                _this13.param = '';
            });
        },
        config: function config() {
            var _this14 = this;

            wx.ready(function () {
                _this14.wxShare([{ //分享到朋友圈
                    title: _this14.articleList.title,
                    desc: _this14.articleList.lead,
                    imgUrl: _this14.articleList.head_add,
                    link: window.location.origin + '/#/personalSpace/viewpointDetail/' + _this14.$route.params.viewpointId + '&' + _this14.userInfoId
                }, {
                    //分享给朋友
                    imgUrl: _this14.articleList.head_add,
                    desc: _this14.articleList.lead,
                    title: _this14.articleList.title,
                    link: window.location.origin + '/#/personalSpace/viewpointDetail/' + _this14.$route.params.viewpointId + '&' + _this14.userInfoId
                }]);
            });
        },
        getlikeData: function getlikeData(viewpoint_id) {
            var _this15 = this;

            //获取观点数据
            this.$http.post(this.hostUrl + 'Viewpoint/setlikeNumIncById/viewpointId', { viewpointId: viewpoint_id }, { emulateJSON: true }).then(function (res) {
                if (res.body.code == 200) {
                    _this15.articleList.like_num = 1 + _this15.articleList.like_num;
                    _this15.img = 'images/space/zaned.png';
                    _this15.zanBg = 'images/3.0/zan-btn-gif.gif';
                    $('.favour-btn').addClass('click');
                } else if (res.body.msg == '记录失败，今天已记录过') {
                    //                    	this.zanBg = 'images/3.0/zan-btn-active.png';
                    //	                    $('.favour-btn').addClass('click');
                    (0, _mintUi.Toast)({
                        message: '你已支持过本观点',
                        duration: 1000
                    });
                }
            });
        },

        //推荐跳转链接
        recommend: function recommend(e, item) {
            this.viewId = item.id;
            this.viewpoint_id = this.viewId;
            this.imgPaths = [];
            this.getViewData(this.viewId);
            this.getData();
            this.getCommentStatus();
            this.zanBg = 'images/3.0/zan-btn-default.png';
            $('.favour-btn').removeClass('click');
            this.$router.push('/personalSpace/viewpointDetail/' + this.viewpoint_id + '&' + this.userInfoId);
        },

        //点击有用按钮
        clickUse: function clickUse(e) {
            this.getlikeData(this.viewpoint_id);
        },
        jsApiCall: function jsApiCall() {
            var _this = this;
            WeixinJSBridge.invoke('getBrandWCPayRequest', JSON.parse(this.jsonstr), function (res) {
                WeixinJSBridge.log('res.err_msg', res.err_msg);
                _this.msgPop();
                if (res.err_msg == 'get_brand_wcpay_request:ok') {

                    (0, _mintUi.Toast)('成功');
                }
                if (res.err_msg == 'get_brand_wcpay_request:cancel') {
                    (0, _mintUi.Toast)('取消支付'); //取消支付
                }
                if (res.err_msg == 'get_brand_wcpay_request:fail') {
                    (0, _mintUi.Toast)('支付失败');
                }
                // alert(res.err_code + res.err_desc + res.err_msg);
            });
        },
        callpay: function callpay() {
            if (typeof WeixinJSBridge == "undefined") {
                if (document.addEventListener) {
                    document.addEventListener('WeixinJSBridgeReady', this.jsApiCall, false);
                } else if (document.attachEvent) {
                    document.attachEvent('WeixinJSBridgeReady', this.jsApiCall);
                    document.attachEvent('onWeixinJSBridgeReady', this.jsApiCall);
                }
            } else {
                this.jsApiCall();
            }
        },
        topay: function topay(amount) {
            var _this16 = this;

            this.$http.post(this.hostUrl + '/WechatPay/inpour', {
                user_id: this.userInfoId,
                amount: amount
            }, { emulateJSON: true }).then(function (res) {
                console.log('res.body', res.body);
                _this16.jsonstr = res.body;

                _this16.callpay();
            });
        },
        pay: function pay(e) {
            var amount = e.target.getAttribute("data-num");
            console.log(amount);
            this.topay(amount);
        },
        winToTop: function winToTop() {
            /* this.$nextTick(() => {
                 this.$refs.header.scrollIntoView();
                })*/
        }
    },
    components: {
        nomore: _nomore2.default,
        LackGifts: _LackGifts2.default,
        Qrcode: _QrCode2.default

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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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