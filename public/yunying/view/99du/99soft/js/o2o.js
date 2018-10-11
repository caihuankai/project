
$(window).bind('scroll', function(e){
    var maintop=$('#blockl02').offset().top,
        relatedtop=$('#related-tell').offset().top,
        _scrolltop=$(window).scrollTop();
    if(_scrolltop >= maintop && _scrolltop < relatedtop ){
        $("#sidemenu").stop().fadeIn(400);
    }else{
        $("#sidemenu").stop().fadeOut(400);
    }
})

$(function(){
    var sidemenu = $("#sidemenu a");
    var move=true;

    sidemenu.click(function(){
        var id = $(this).attr("href");
        if(move){
            move=!move;
            $('html,body').animate({scrollTop: $(id).offset().top + "px"},1000,function(){ move=true;});
        }
        return false;
    });
    $(window).bind('scroll', function(e){
        var _scrolltop=$(window).scrollTop();
        var _headerTop = _scrolltop+30;
        var _colTitBarId = "div1";
        $(".colTitBar").each(function(){
            var offset = $(this).offset();
            if(_headerTop >= offset.top) {
                _colTitBarId = $(this).attr('id');
            }
        });

//下面 添加事件 方法
        if(!$(".b2b-button a[href=#"+_colTitBarId+"]").hasClass('on')) {
            $(".b2b-button a").removeClass('on');
            $(".b2b-button a[href=#"+_colTitBarId+"]").addClass('on');
        }

    });
});