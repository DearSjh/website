// JavaScript Document

/*! QTouch 
 *  2015-06-26 */
 define(function(require) {
	var $ = require('$');
	require('/Templates/skin_cn/widgets/sellMobTool/marketing.css');
	var a = $("#plugin-contact-ring"),
	    b = $("#ring-toggle-button"),
	    c = $("#ring-list");
	c.addClass("r" + Math.min(c.children().length, 5)), 
	b.on("click", function() {
	    return a.toggleClass("open"), !1
	})

	$(function(){
		if( $('#plugin-contact-ring2') && $('#plugin-contact-ring2').length ){
			if( parseInt( $('.widget-links').css('bottom') ) < 50 ){
				$('.widget-links').css('bottom', '60px');
			}
		}
	})
})
