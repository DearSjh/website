/**
 * base
 */
define(function(require) {
	var navbool=true;
	var $ = require('$');
	var responsive = require('responsive');
	var type = responsive.getType();//console.log(type);

	//responsive.respImg('img[data-fullsrc]');


	/*nav*/
	var navIndex=$(".nav .child").index($(".nav .child.on"));
	isIE();
    boolrespimg();
	navTopAn(navIndex);
	boolwapbanner();
	//boolwapus();
	booltie();
	boolwapscreen();
	boolwapnav(navIndex,navbool);
	boolpark();
	$(window).resize(function(){
        boolrespimg();
		booltie();
		boolwapbanner();
		//boolwapus();
		boolwapscreen();
		boolpark();
	});
	
	// 导航
	$(".nav_transform1 li").hover(function(){
		$(this).children(".childContent").stop().show().animate({height: 350},400);	
	},function(){
		$(this).children(".childContent").stop().hide().animate({height: 0},400);	
	});

	// 手机导航
	var navBool=false,navTimeout;
	$(".wapNavBtn").unbind("click").bind("click",function(){
		console.log(12);
		if(!navBool){
			$(".nav_transform1").show().removeClass("out").addClass("in");
			setTimeout(function(){$(".wapNavBtn").addClass("on")},200);
			clearTimeout(navTimeout);
			navBool=true;
		}else{
			$(".nav_transform1").removeClass("in").addClass("out");
			setTimeout(function(){$(".wapNavBtn").removeClass("on")},700);
			navTimeout = setTimeout(function(){$(".nav_transform1").hide();},1000);
			navBool=false;
		}
	});

	// 产品遮罩
 	$(".i-prorec").hover(function(){
        var _this = $(this);
        _this.find(".bg").stop().animate({top : 0}, 600)
        _this.find(".bg-text").stop().animate({left : 0}, 800)
        // _this.find(".num").stop().animate({left : 0}, 800)
        // _this.find(".line").stop().animate({left : 0}, 800)
        // _this.find(".button").stop().animate({left : 70}, 800)
    }, function(){
        var _this = $(this);
        _this.find(".bg").stop().animate({top : 270}, 800)
        _this.find(".bg-text").stop().animate({left : -100 + '%'}, 600)
        // _this.find(".num").stop().animate({left : -100 + '%'}, 600)
        // _this.find(".line").stop().animate({left : -100 + '%'}, 600)
        // _this.find(".button").stop().animate({left : -91}, 600)        
    })

	
	//TOP
	var floatBool=true;
	var scrollTop=$(this).scrollTop();
	$(window).scroll(function(){
		if($(this).scrollTop()>=400){
			if(!floatBool){
				$(".top").fadeIn(500);
				floatBool=true;
			}
		}else{
			if(floatBool){
				$(".top").fadeOut(500);
				floatBool=false;
			}
		}
	});
	
	//TOP
	$(".top").click(function(){
		$('body,html').animate({scrollTop:0},500);
	});

    //招聘
    $(".subNav").click(function(){
        $(this).toggleClass("on").siblings(".subNav").removeClass("on")
        $(this).toggleClass("open").siblings(".subNav").removeClass("open")
        // 修改数字控制速度， slideUp(500)控制卷起速度
        $(this).next(".navContent").slideToggle(500).siblings(".navContent").slideUp(500);
    })
    
    //新闻打开
    $(".iconDetail").click(function(){
        $(this).parent().toggleClass("on").siblings("li").removeClass("on")
        $(this).parent().toggleClass("open").siblings("li").removeClass("open")
        // 修改数字控制速度， slideUp(500)控制卷起速度
        $(this).parent().next(".licont").slideToggle(500).siblings(".licont").slideUp(500);
    })
    $(".new-box li.open").next(".licont").slideToggle(500).siblings(".licont").slideUp(500);

	//新闻页
	$(".check_moblie").click(function(){
      if($('.check_moblie').find('.isj').hasClass('isj_hover')){
        $('.isj').removeClass('isj_hover');
        $('.mobile_qrview').hide(500)
      }else{
        $('.isj').addClass('isj_hover');
        $('.mobile_qrview').show(500)
      }
    })
	
	//禁止图片右键
	document.oncontextmenu = function(e){
		if($(e.target).is('img')){
			e.preventDefault();
		}
	}

	// 手机二级导航
	$(".prod-slide .cate-box h3").click(function() {
        if ($(this).siblings('ul').is(':hidden')) {
            $(".m-ins-blackbg").show();
            $(".prod-slide .cate-box ul").slideUp();
            $(this).siblings('ul').slideDown();
        }else{
            $(".m-ins-blackbg").hide();
            $(this).siblings('ul').slideUp();
        }
    });
	
	/*scroll*/
	var initTop = 0;
	var scrollBool=false;
	var barH = $('.bar').height();
	var logoH = $('.logo').height();
	var navH  = $('.nav').height();
	
	$(window).scroll(function(){
		if($(this).scrollTop()>=10){
			//$('.bar').hide();
		}else{
			//$('.bar').show();
		}

		// if(type=='Mobile'){
		// 	if($(this).scrollTop() > initTop){
		// 		$(".logo").stop(false,false).animate({"height":"0px"},400);
		// 	}else {
		// 		$(".logo").stop(false,false).animate({"height":logoH},400);
		// 	}
		// 	initTop = $(this).scrollTop();
		// }

		// if($(this).scrollTop()>=120){
		// 	if(!scrollBool){
		// 		$(".bar").stop(false,false).animate({"height":"0px"},400);
		// 		$(".logo").stop(false,false).animate({"height":"0px"},400);
		// 		$(".header .nav").stop(false,false).animate({"height":"50px"},200);
		// 		$(".header .nav li.child").stop(false,false).animate({"height":"50px"},200).css({"line-height":"50px"});
		// 		$(".header .nav li.child.navChildSearch").stop(false,false).css({"line-height":"20px"});
		// 		$(".header .nav li.child.navChildSearch .seachIcon").css({"margin-top":"33px"});
		// 		$(".header .nav li.child .childContent").css("top","50px");
		// 		$(".header .headerLogo").stop(false,false).animate({"top":"4px"},200);
		// 		//$(".nbanner").css({'padding':'70px 0 0 0'});
		// 		scrollBool=true;
		// 	}
		// }else{
		// 	if(scrollBool){
		// 		$(".bar").stop(false,false).animate({"height":barH},400);
		// 		$(".logo").stop(false,false).animate({"height":logoH},400);
		// 		$(".header .nav").stop(false,false).animate({"height":navH},200);
		// 		$(".header .nav li.child").stop(false,false).animate({"height":navH},200).css({"line-height":"50px"});
		// 		$(".header .nav li.child.navChildSearch").stop(false,false).css({"line-height":"20px"});
		// 		$(".header .nav li.child.navChildSearch .seachIcon").css({"margin-top":"53px"});
		// 		$(".header .nav li.child .childContent").css("top","60px");
		// 		$(".header .headerLogo").stop(false,false).animate({"top":"38px"},200);
		// 		scrollBool=false;
		// 	}
		// }
		
	});

	function isIE() { 
	    if (!!window.ActiveXObject || "ActiveXObject" in window){
	    	$('html').addClass('isIE');
	    	return true;  
	    }else{
	    	return false;  
		}
	}

	/*banner*/
	function boolwapbanner(){
		if(type!='Mobile' && $('.js-banner').length){
			var screenWidth=$(window).width();
			var ratio = 1900/500;
			var banheight = screenWidth/ratio;
			$('.indexbanner').height(banheight);
			// var ratio2 = 1900/440;
			// var banheight2 = screenWidth/ratio2;
			// $('.nbanner').height(banheight2);
		}
	}

	/*park*/
	function boolpark(){
		var headheight = $('.header').height(),
			footheight = $('footer').height(),
			screenWidth=$(window).width(),
			screenHeight=$(window).height();
		var parkheight = screenHeight-headheight-80;
		if(parkheight<430){
			parkheight = 430;
		}
		$('#map').height(parkheight);
	}

    /*水平垂直居中*/
    function boolrespimg(){
	  $('.js-respimg').each(function(i){
	  	var ratioW = $(this).attr("data-ratioW"),
	  		ratioH = $(this).attr("data-ratioH"),
	  		fludwth = $(this).parent().width();
	  	var ratio = ratioW/ratioH;
	    $(this).width(parseInt(fludwth));
	    $(this).height(parseInt(fludwth/ratio));
	  
	    var isFirefox = navigator.userAgent.toUpperCase().indexOf("FIREFOX")>0?true:false;
	    // if(isFirefox){
	    //     $(this).find('img').width(fludwth*0.8);
	    // }
	   });
    }
    
	/*about*/
	function boolwapus(){
		var usheight = $('.about-box img').height();
		var Theight = $('.about-box h2').height();
		var Mheight = $('.about-box a').height();
		$('.about-box').height(usheight);
		$('.about-box p').height(usheight-140-Theight-Mheight-60);
	}

	/*tie*/
	function booltie(){
		var tieW = $('.tie').width();
		$('.tie').height(tieW);
	}

	/*screen*/
	function boolwapscreen(){
		var screenWidth=$(window).width();
		if(screenWidth>=1200){
			navbool=true;
		}else if(screenWidth>=1024&&screenWidth<1200){
			navbool=true;
		}else if(screenWidth>=640&&screenWidth<1024){
			navbool=true; //false
		}else if(screenWidth>=320&&screenWidth<640){
			navbool=false;
		}
	}
	
	/*nav*/
	function boolwapnav(navIndex,navbool){
		//不是小屏幕
		if(navbool){
			$(".nav").show();
			$(".nav li.child").unbind("click").bind("mouseover",function(){
				navIndex=$(".nav li.child").index($(this));
				navTopAn(navIndex);
				$(this).find(".childContent").show();
				$.each($(this).find(".childContent .childContentLi"),function(i,n){
					var stime=0.5+0.1*i;
					anClasAdd($(".nav .child:eq("+navIndex+") .childContent .childContentLi:eq("+i+")"),"rightOpacityShow",stime+"s","0s","ease-in-out","both");
				});
			}).bind("mouseleave",function(){
				var navIndex=$(".nav .child").index($(".nav .child.on"));
				navTopAn(navIndex);
				$(this).find(".childContent").hide();
			});
		}else{
			$(".nav").hide();
			$(".wapNavBtn").unbind("click").bind("click",function(){
				//$(".nav").toggleClass('on');
				$(".nav").stop(false,true).fadeToggle(500);
			});
			$(".nav li.child").unbind("mouseover mouseleave").bind("click",function(){
				$(this).find(".childContent").stop(false,true).slideToggle(500);
			});
		}
	}
	/*vedioPlay*/
	function vedioPlay(src){
		$(".vedioContent iframe").attr("src",src);
		$(".vedioHide").fadeIn(500);
		$(".vedioContent").delay(100).fadeIn(500);
	}
	function vedioPlayClose(){
		$(".vedioContent iframe").attr("src","");
		$(".vedioHide").delay(100).fadeOut(500);
		$(".vedioContent").fadeOut(500);
	}
	/*nav top*/
	function navTopAn(index){
		var navW=$(".nav .child.on").width();
		$(".navTop").css({
			"width":navW,
			"display":"block",
			"left":navW*index
		});
	}
	/*animateClassAdd*/
	function anClasAdd(e,keyframes,stime,dtime,an,status){
		$(e).css({
			"animation":keyframes+" "+stime+" "+an+" "+dtime+" "+status,
			"-moz-animation":keyframes+" "+stime+" "+an+" "+dtime+" "+status,
			"-webkit-animation":keyframes+" "+stime+" "+an+" "+dtime+" "+status,
			"-o-animation":keyframes+" "+stime+" "+an+" "+dtime+" "+status,
		});
	}
	/*cutString*/
	function cutString(str, len) {
		if(str.length*2 <= len) {
			return str;
		}
		var strlen = 0;
		var s = "";
		for(var i = 0;i < str.length; i++) {
			s = s + str.charAt(i);
			if (str.charCodeAt(i) > 128) {
				strlen = strlen + 2;
				if(strlen >= len){
					return s.substring(0,s.length-1) + "...";
				}
			} else {
				strlen = strlen + 1;
				if(strlen >= len){
					return s.substring(0,s.length-2) + "...";
				}
			}
		}
		return s;
	}
	function setCookie(s, v) {
		var expires = new Date();
		//alert(s+"-"+v);
		expires.setTime(expires.getTime() + 365 * 24 * 60 * 60 * 1000);
		document.cookie = s + "=" + escape(v) + "; expires=" + expires.toGMTString();
	}

	function getCookie(s) {
		var aCookie = document.cookie.split("; ");
		for (var i = 0; i < aCookie.length; i++) {
			var aCrumb = aCookie[i].split("=");
			if (s == aCrumb[0]) {
				return unescape(aCrumb[1])
			}
		}
	}
	
	//语言版本
	var getLang = function () {
		str = location.href.split("?")[1];
		if (str != null) {
			var parameters = str.split("&");
			for (var i = 0; i < parameters.length; i++) {
				paraName = parameters[i].split("=")[0];
				paraValue = parameters[i].split("=")[1];
				setCookie(paraName, paraValue);
			}
		}
		var language = document.getElementById('lang').value; //jQuery("#lang").val();
		var lang = getCookie("language");
		if (lang != null && lang != "") {

		} else {
			/*  if (language.indexOf('en') > -1) {
			   // document.location.href = 'http://en.jerei.com';
			    // alert(1);
			     }
			  else if (language.indexOf('zh') > -1) { 
			    //alert(2);
			  }
			 else{
			   //document.location.href = 'http://en.jerei.com'; 
			// alert(3);
			  }*/
		}
	}

});
















