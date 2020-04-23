/**
 * 青峰响应式 index
 */
define(function(require) {
	var $ = require('$');
	var base = require('base');

    //require.async('widgets/jquery.nicescroll.min');
    require.async('widgets/device.min');
    require.async('/web/Templates/skin_cn/widgets/jquery.lazyload.min.js');

// 底部行销转换工具
require.async('/web/Templates/skin_cn/widgets/sellFootBar/sellFootBar');
// 手机端转换工具
require.async('/web/Templates/skin_cn/widgets/sellMobTool/marketing');

    //青峰响应式-banner
    require.async('/web/Templates/skin_cn/widgets/tslide/tslide.css',function(){
      $('.indexbanner').slide({
         wrap: 'ul',                //指定包裹元素
         cell: 'li',                //指定切换元素
         effect:'slide',            //切换效果，默认slide，可选/slide\fade\toggle
         speed:500,                 //切换速度
         start:0,                   //起始帧，默认0，即从第一张开始
         auto:true,                //自动播放
         pause:true,                //布尔值或jquery选择器，指定的jquery选择器将作为暂停按钮，暂停时添加'pause'类
         time:5e3,                  //自动播放间隔
         act:"mouseenter",          //导航按钮触发事件
         prev:null,                 //指定左箭头，默认无，自动添加'.arrs .arr_prev'
         next:null,                 //指定右箭头，默认无，自动添加'.arrs .arr_next'
         navs:'.slide_nav a',       //指定导航按钮，默认无，自动添加'.slide_nav'或使用$('.demo .slide_nav')
         imgattr: 'slide-src',      //按需加载图片的地址标签，注意不能与全局图片响应标签冲突(data-src)
         callback:function(a,b,c){},//回调，@param ($this,$b_,n) : 效果元素，切换元素，当前帧序号
         ext:function(a,b,c){},     //扩展，@param ($this,$b_,count) : 效果元素，切换元素，总帧数
         reload:false               //是否重载slide，修改配置并重载slide时该值必须为true
      });
    });

    //青峰响应式-马灯
    require.async('/web/Templates/skin_cn/widgets/jcarousel/jcarousel.css', function(jcarousel) {
        jcarousel('#jcarousel1', 4, 3, 1,2,3000,400,1);//客户案例
    })

    
    //青峰响应式-滚动
    require.async('/web/Templates/skin_cn/widgets/superslide.css',function(){
        $(".widget-notice").slider({mainCell:".bd ul",autoPlay:true,effect:"leftMarquee",interTime:50,trigger:"click"});
        $(".limiSlide").slider({ titCell:".hd a",mainCell:".bd ul",effect:"leftLoop",autoPlay:false,vis:1,scroll:1,easing:"easeInQuint"});
    });

    //移动端图片相册效果
    if($('.js-baguetteBox').length){
        $('.js-baguetteBox img').each(function(i){
            var imgsrc = $(this).attr('src');
            var imga   = "<a href='"+imgsrc+"' id='magnifier'></a>";
            $(this).wrap(function(){
              return imga
            });
        })
        require('/web/Templates/skin_cn/widgets/baguetteBox/baguetteBox.css');
        require.async('widgets/baguetteBox/baguetteBox',function(){
            baguetteBox.run('.baguetteBox',{animation: 'fadeIn',});
        });
    }

	

    //折叠式菜单
    if($('.js-accordion').length){
        require.async('/web/Templates/skin_cn/widgets/jquery/jquery-ui.js',function(){
            var icons = {
              header: "ui-icon-circle-arrow-e",
              activeHeader: "ui-icon-circle-arrow-s"
            };
            $( "#accordion" ).accordion({
                active: 0,
                collapsible: true,
                icons: icons,
                heightStyle: "content" 
            });
        });
    }

    //banner
    // require.async('widgets/swiper/swiper.min.js',function(){
    //    var mySwiper = new Swiper ('.swiper-container', {
    //     // Optional parameters
    //     direction: 'horizontal',
    //     loop: true,
        
    //     // If we need pagination
    //     pagination: '.swiper-pagination',
    //     paginationClickable: true,
        
    //     // Navigation arrows
    //     nextButton: '.swiper-button-next',
    //     prevButton: '.swiper-button-prev',

    //   })        
    // });

	

	//tab_link
	var $index_tab_list = $('.index_tab_list');
	$('.tab_link').find('li').click(function() {
		var _ajaxPage,
			i = $(this).index(),
			_ajaxAddr = './';
		$(this).addClass('cur').siblings().removeClass('cur');
		switch (i) {
			case 0:
				_ajaxPage = _ajaxAddr + 'ajax-i-intro.html';
				break;
			case 1:
				//_ajaxPage=_ajaxAddr+'ajax-i-brand.html';
				_ajaxPage = _ajaxAddr + 'ajax-i-culture.html';
				break;
			case 2:
				_ajaxPage = _ajaxAddr + 'ajax-i-corp.html';
				break;
			default:
				_ajaxPage = _ajaxAddr + 'ajax-i-intro.html';
		};
		$.ajax(_ajaxPage, {
			contentType: "html",
			success: function(html) {
				$index_tab_list.html(html)
			}
		})
	});
	$('.tab_link').find('li').eq(0).click();



	/* ---------------------------------------------------------- */
    /*                                                            */
    /* 加载动画                                                   */
    /* 使用wo.js                                                  */
    /*                                                            */
    /*                                                            */
    /*                                                            */
    /* - Time  : 2016.07.21                                       */
    /* - Author: BoBo                                             */
    /*                                                            */
    /* ---------------------------------------------------------- */

    require.async('/web/Templates/skin_cn/widgets/wow/wow.min.js',function(){
        new WOW().init();
    });


    function getWindowHeight() {
        var myWidth = 0, myHeight = 0;
        if( typeof( window.innerWidth ) == 'number' ) {
            //Non-IE
            myHeight = window.innerHeight;
        } else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {
            //IE 6+ in 'standards compliant mode'
            myHeight = document.documentElement.clientHeight;
        } else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
            //IE 4 compatible
            myHeight = document.body.clientHeight;
        }

        return myHeight
    }

    var scrollbool = false;
    function appearNum(){
        var element_offset = $('.section_about').offset(),
            element_top = element_offset.top;
            bottom_of_window = $(window).scrollTop() + getWindowHeight();
        var buffer = $('.section_about').outerHeight()/1;
        if( bottom_of_window > element_top + buffer) {
            if(!scrollbool){
                scrollbool = true;
                
                $(".num_conts .num_cont:eq(0) span").html(0);
                $(".num_conts .num_cont:eq(1) span").html(0);
                $(".num_conts .num_cont:eq(2) span").html(1000);
                $(".num_conts .num_cont:eq(3) span").html(0);
                var i1=0;
                var i2=800;
                var i3=1000;
                var i4=0;
                setTimeout(function(){
                    var child1=setInterval(function(){
                        ++i1;
                        if(i1>=106)clearInterval(child1);
                        $(".num_conts .num_cont:eq(0) span").html(i1);
                    },14);
                    var child2=setInterval(function(){
                        i2=i2+100;
                        if(i2>=9200)clearInterval(child2);
                        $(".num_conts .num_cont:eq(1) span").html(i2);
                    },16);
                    var child3=setInterval(function(){
                        i3=i3+100;
                        if(i3>=12000)clearInterval(child3);
                        $(".num_conts .num_cont:eq(2) span").html(i3);
                    },12);
                    var child4=setInterval(function(){
                        ++i4;
                        if(i4>=36)clearInterval(child4);
                        $(".num_conts .num_cont:eq(3) span").html(i4);
                    },20);
                },500);
                
            }
        }
    }

	$(function(){
		$('.opc0').animate({'opacity':'1'},'fast');
		$(".news-box").hover(function(){
			$(this).toggleClass('on');
		});
		
        if(!device.mobile() && !device.tablet()){
            /* Every time the window is scrolled ... */
            $(window).scroll( function() {
                if($('.section_about').offset()){
                    appearNum();
                }
            });
        }
	})
})