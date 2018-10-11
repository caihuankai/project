$(function () {
    // 主页
    const $nav = $('.nav');
    var mainSwiper = new Swiper('.main-container', {
        direction: 'vertical',
        mousewheelControl: true,
        slidesPerView: 'auto',
        onTransitionStart: function (swiper) {
            var index, $a = $('.nav .nav-right a');
            if (swiper.progress == 1) {
                swiper.activeIndex = swiper.slides.length - 1;
            }
            switch (swiper.activeIndex) {
                case 1:
                    index = 0;
                    break;
                case 2:
                    index = 1;
                    break;
                case 3:
                    index = 3;
                    break;
                default:
                    index = -1;
            }
            if (index >= 0) {
                $a.removeClass('active').eq(index).addClass('active');
            } else {
                $a.removeClass('active');
            }

        }
    });
    $('.intro-btn').click(function () {
        mainSwiper.slideTo(1);
    });
    $('.unique-btn').click(function () {
        mainSwiper.slideTo(2);
    });
    $('.contact-btn').click(function () {
        mainSwiper.slideTo(3);
    });
    // 开启轮播图
    var mySwiper = new Swiper('.swiper-container', {
        loop: true,
        autoplay: 2000
    });
    // 获取当前年份
    $('.now-year').text(new Date().getFullYear());
});