$(document).ready(function(){
    jQuery.jqtab = function(tabtit, tab_conbox, shijian) {
        var isScroll = false;
        if (isScroll) {
            return;
        }
        isScrolls = true;
        $(tab_conbox).find("li").hide();
        $(tabtit).find("li:first").addClass("current").show();
        $(tab_conbox).find("li:first").show();

        $(tabtit).find("li").bind(shijian,
            function(e) {
                e.preventDefault();
                $(this).addClass("current").siblings("li").removeClass("current");
                var activeindex = $(tabtit).find("li").index(this);
                $(tab_conbox).children().eq(activeindex).stop().fadeIn(500).siblings().hide();
                isScrolls = false;
                return false;
            });

    };

    /*调用方法如下：*/
    $.jqtab("#tabs", "#tab_conbox", "click");
    $.jqtab("#tabs2", "#tab_conbox2", "mouseenter");

    $("#aboutmenu").css({
        "display": "none"
    });
    $(window).bind('scroll',
        function(e) {
            var maintop = $('#aboutblock01').offset().top,
                _scrolltop = $(window).scrollTop();
            if (_scrolltop >= maintop) {
                $("#aboutmenu").fadeIn(400);
            } else {
                $("#aboutmenu").fadeOut(400);
            }
        });

    var sidemenu = $("#aboutmenu a");
    var move = true;

    sidemenu.click(function() {
        var id = $(this).attr("href");
        if (move) {
            move = !move;
            $('html,body').animate({
                    scrollTop: $(id).offset().top + "px"
                },
                1000,
                function() {
                    move = true;
                });
        }
        return false;
    });

    $(window).bind('scroll',
        function(e) {
            var _scrolltop = $(window).scrollTop();
            var _headerTop = _scrolltop + 30;
            var _colTitBarId = "aboutblock01";
            $(".aboutcolTitBar").each(function() {
                var offset = $(this).offset();
                if (_headerTop >= offset.top) {
                    _colTitBarId = $(this).attr('id');
                }
            });

            //下面 添加事件 方法
            if (!$(".aboutus a[href=#" + _colTitBarId + "]").hasClass('on')) {
                $(".aboutus a").removeClass('on');
                $(".aboutus a[href=#" + _colTitBarId + "]").addClass('on');
            }

        });

    //关于我们弹框
    $(".designer").colorbox({
        rel: 'designer'
    });
    $(".marketing").colorbox({
        rel: 'marketing'
    });
    $(".research").colorbox({
        rel: 'research'
    });
    $(".seo").colorbox({
        rel: 'seo'
    });
    $(".designer2").colorbox({
        rel: 'designer2'
    });
    $(".marketing2").colorbox({
        rel: 'marketing2'
    });
    $(".research2").colorbox({
        rel: 'research2'
    });
    $(".seo2").colorbox({
        rel: 'seo2'
    });
});