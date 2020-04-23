/*
* responsive
*/
define(function(require, exports, module) {
   var $ = require('$');
	//require('./responsive.css');

	module.exports={
		getType:function(){
			var Type;
			if(window.getComputedStyle){
				var screenType=window.getComputedStyle(document.body, ":after").getPropertyValue("content");
				Type = /Pc/.test(screenType) ? 'Pc' : (/Pad/.test(screenType) ? 'Pad' : 'Mobile');
				}else{
					Type = 'Pc';
					}
		 	return Type;
		},
		respImg:function(imgDom){
			var $resImage = $(imgDom),
				 screenTypeCache,
				 screenType = (window.getComputedStyle) ? window.getComputedStyle(document.body, ":after").getPropertyValue("content") : 'Pc';
			 if (screenTypeCache !== screenType) {
				$resImage.each(function() {
					//适配图片
					if($(this).data('fullsrc')){
						var bigSrc=$(this).data('fullsrc'),
							src = bigSrc.replace(/\w+\.\w{3}$/, function(bigSrc){
								 return (/Pc/.test(screenType) || /Pad/.test(screenType) ) ? bigSrc : "small/"+bigSrc;
							 });
						$(this).attr('src',src);
					}else{
						//小屏幕隐藏图片(pc端反复执行)
						(/Pc/.test(screenType) || /Pad/.test(screenType) ) ? $(this).attr('src',$(this).attr('data-src')).show() : $(this).hide();
					}
				});
				screenTypeCache = screenType;
			};
		}//,
	}
})