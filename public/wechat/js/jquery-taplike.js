
(function ($) {
	$.extend({
		tipsBox: function (options) {
			options = $.extend({
				obj: null,  //jq对象，要在那个html标签上显示
				str: "+1",  //字符串，要显示的内容;也可以传一段html，如: "<b style='font-family:Microsoft YaHei;'>+1</b>"
				startSize: "12px",  //动画开始的文字大小
				endSize: "26px",    //动画结束的文字大小
				interval: 600,  //动画时间间隔
				color: "red",    //文字颜色
				callback: function () { }    //回调函数
			}, options);
			$("body").append("<span class='num'>" + options.str + "</span>");
			var box = $(".num");
			// var left = options.obj.offset().left + options.obj.width() / 2;
			var left = options.obj.offset().left + options.obj.width() / 2;
			// var top = options.obj.offset().top - options.obj.height();
			var top = options.obj.offset().top - options.obj.height() / 2;
			//alert(left)
            var ua = window.navigator.userAgent.toLowerCase();
            var mLeft ='';
			if (ua.match(/MicroMessenger/i) == 'micromessenger') {
                left = left+'px';
                mLeft =0;
            } else {
            	left ="50%";
                mLeft ='230px';
            }


			box.css({
				"position": "absolute",
				"left": left,
				"top": top + "px",
				"z-index": 9999,
				"margin-left":mLeft,
				"font-size": options.startSize,
				"line-height": options.endSize,
				"font-weight": options.fontWeight,
				"color": options.color
			});
			box.animate({
				"font-size": options.endSize,
				"opacity": "0",
				"top": top - parseInt(options.endSize) + "px"
			}, options.interval, function () {
				box.remove();
				options.callback();
			});
		}
	});
})(jQuery);
  
// function niceIn(prop){
// 	prop.find('i').addClass('niceIn');
// 	setTimeout(function(){
// 		prop.find('i').removeClass('niceIn');	
// 	},1000);		
// }