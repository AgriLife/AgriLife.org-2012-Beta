/* 
  * 1. Plugins
  * 2. Custom Scripts
*/

/*global jQuery */
/*! 
* FitVids 1.0
*
* Copyright 2011, Chris Coyier - http://css-tricks.com + Dave Rupert - http://daverupert.com
* Credit to Thierry Koblentz - http://www.alistapart.com/articles/creating-intrinsic-ratios-for-video/
* Released under the WTFPL license - http://sam.zoy.org/wtfpl/
*
* Date: Thu Sept 01 18:00:00 2011 -0500
*/

(function( $ ){

  $.fn.fitVids = function() {
    var div = document.createElement('div'),
        ref = document.getElementsByTagName('base')[0] || document.getElementsByTagName('script')[0];
        
  	div.className = 'fit-vids-style';
    div.innerHTML = '&shy;<style>         \
      .fluid-width-video-wrapper {        \
         width: 100%;                     \
         position: relative;              \
         padding: 0;                      \
      }                                   \
                                          \
      .fluid-width-video-wrapper iframe,  \
      .fluid-width-video-wrapper object,  \
      .fluid-width-video-wrapper embed {  \
         position: absolute;              \
         top: 0;                          \
         left: 0;                         \
         width: 100%;                     \
         height: 100%;                    \
      }                                   \
    </style>';
                      
    ref.parentNode.insertBefore(div,ref);
  
    return this.each(function(){
      var selectors = [
        "iframe[src^='http://player.vimeo.com']", 
        "iframe[src^='http://www.youtube.com']", 
        "iframe[src^='http://www.kickstarter.com']", 
        "object", 
        "embed"
      ];

      var $allVideos = $(this).find(selectors.join(','));
      
      $allVideos.each(function(){
        var $this = $(this), 
            height = this.tagName == 'OBJECT' ? $this.attr('height') : $this.height(),
            aspectRatio = height / $this.width();
        $this.wrap('<div class="fluid-width-video-wrapper" />').parent('.fluid-width-video-wrapper').css('padding-top', (aspectRatio * 100)+"%");
        $this.removeAttr('height').removeAttr('width');
      });
    });
  
  }
})( jQuery );


//  Patch for Mobile Safari's orientation change bug
//  Based on http://www.blog.highub.com/mobile-2/a-fix-for-iphone-viewport-scale-bug/
var viewport = $('meta[name="viewport"]');
var nua = navigator.userAgent;
if ((nua.match(/iPad/i)) || (nua.match(/iPhone/i)) || (nua.match(/iPod/i))) {
	viewport.attr('content', 'width=device-width, minimum-scale=1.0, maximum-scale=1.0');
	$('body')[0].addEventListener("gesturestart", gestureStart, false);
}	
function gestureStart() {
	viewport.attr('content', 'width=device-width, minimum-scale=0.25, maximum-scale=1.6');
}

/*
 * Superfish v1.4.8 - jQuery menu widget
 * Copyright (c) 2008 Joel Birch
 *
 * Dual licensed under the MIT and GPL licenses:
 * 	http://www.opensource.org/licenses/mit-license.php
 * 	http://www.gnu.org/licenses/gpl.html
 *
 * CHANGELOG: http://users.tpg.com.au/j_birch/plugins/superfish/changelog.txt
 */

;(function($){
	$.fn.superfish = function(op){

		var sf = $.fn.superfish,
			c = sf.c,
			$arrow = $(['<span class="',c.arrowClass,'"> &#187;</span>'].join('')),
			over = function(){
				var $$ = $(this), menu = getMenu($$);
				clearTimeout(menu.sfTimer);
				$$.showSuperfishUl().siblings().hideSuperfishUl();
			},
			out = function(){
				var $$ = $(this), menu = getMenu($$), o = sf.op;
				clearTimeout(menu.sfTimer);
				menu.sfTimer=setTimeout(function(){
					o.retainPath=($.inArray($$[0],o.$path)>-1);
					$$.hideSuperfishUl();
					if (o.$path.length && $$.parents(['li.',o.hoverClass].join('')).length<1){over.call(o.$path);}
				},o.delay);	
			},
			getMenu = function($menu){
				var menu = $menu.parents(['ul.',c.menuClass,':first'].join(''))[0];
				sf.op = sf.o[menu.serial];
				return menu;
			},
			addArrow = function($a){ $a.addClass(c.anchorClass).append($arrow.clone()); };

		return this.each(function() {
			var s = this.serial = sf.o.length;
			var o = $.extend({},sf.defaults,op);
			o.$path = $('li.'+o.pathClass,this).slice(0,o.pathLevels).each(function(){
				$(this).addClass([o.hoverClass,c.bcClass].join(' '))
					.filter('li:has(ul)').removeClass(o.pathClass);
			});
			sf.o[s] = sf.op = o;

			$('li:has(ul)',this)[($.fn.hoverIntent && !o.disableHI) ? 'hoverIntent' : 'hover'](over,out).each(function() {
				if (o.autoArrows) addArrow( $('>a:first-child',this) );
			})
			.not('.'+c.bcClass)
				.hideSuperfishUl();

			var $a = $('a',this);
			$a.each(function(i){
				var $li = $a.eq(i).parents('li');
				$a.eq(i).focus(function(){over.call($li);}).blur(function(){out.call($li);});
			});
			o.onInit.call(this);

		}).each(function() {
			var menuClasses = [c.menuClass];
			if (sf.op.dropShadows  && !($.browser.msie && $.browser.version < 7)) menuClasses.push(c.shadowClass);
			$(this).addClass(menuClasses.join(' '));
		});
	};

	var sf = $.fn.superfish;
	sf.o = [];
	sf.op = {};
	sf.IE7fix = function(){
		var o = sf.op;
		if ($.browser.msie && $.browser.version > 6 && o.dropShadows && o.animation.opacity!=undefined)
			this.toggleClass(sf.c.shadowClass+'-off');
		};
	sf.c = {
		bcClass     : 'sf-breadcrumb',
		menuClass   : 'sf-js-enabled',
		anchorClass : 'sf-with-ul',
		arrowClass  : 'sf-sub-indicator',
		shadowClass : 'sf-shadow'
	};
	sf.defaults = {
		hoverClass	: 'sfHover',
		pathClass	: 'overideThisToUse',
		pathLevels	: 1,
		delay		: 800,
		animation	: {opacity:'show'},
		speed		: 'normal',
		autoArrows	: true,
		dropShadows : true,
		disableHI	: false,		// true disables hoverIntent detection
		onInit		: function(){}, // callback functions
		onBeforeShow: function(){},
		onShow		: function(){},
		onHide		: function(){}
	};
	$.fn.extend({
		hideSuperfishUl : function(){
			var o = sf.op,
				not = (o.retainPath===true) ? o.$path : '';
			o.retainPath = false;
			var $ul = $(['li.',o.hoverClass].join(''),this).add(this).not(not).removeClass(o.hoverClass)
					.find('>ul').hide().css('visibility','hidden');
			o.onHide.call($ul);
			return this;
		},
		showSuperfishUl : function(){
			var o = sf.op,
				sh = sf.c.shadowClass+'-off',
				$ul = this.addClass(o.hoverClass)
					.find('>ul:hidden').css('visibility','visible');
			sf.IE7fix.call($ul);
			o.onBeforeShow.call($ul);
			$ul.animate(o.animation,o.speed,function(){ sf.IE7fix.call($ul); o.onShow.call($ul); });
			return this;
		}
	});

})(jQuery);



/*
 * Begin Custom Scripts
 *
 */
// Variables for respond.js and slideshow
var $footer = $('#footer'),
	$themeURL = $footer.data('theme'),	
	$currentPage = $footer.data('page'),
	loaded = 0;

// Load respond.js if needed
/*
Modernizr.load([
  {
    // The test: does the browser understand Media Queries?
    test : Modernizr.mq('only all'),
    // If not, load the respond.js file
    nope : [''+$themeURL+'js/respond/respond.min.js', ''+$themeURL+'js/respond/respond.min.js']
  }
]);
*/

// Home slideshow
// ajaxLoop.js
jQuery(function($){
	var display = $('#feature-container').css('display');
	if (display == 'block') {
	    var page = 1;
	    var loading = true;
	    var $window = $(window);
	    var $content = $("#feature-container");
	    var load_posts = function(){
	            $.ajax({
	                type       : "GET",
	                data       : {numPosts : 3, pageNumber: page, metaKey : 'feature-homepage', metaValue : 1, categoryId : $currentPage },
	                dataType   : "html",
	                url        : ""+$themeURL+"slides.php",
	                success    : function(data){
	                    $data = $(data);
						// console.log($data);
	                    if($data.length){
	                        $data.hide();
	                        $content.append($data);
	                        $data.fadeIn(100, function(){
	                            $("#loading").remove();
								$('#slide1, #l1').attr("class", "active");
	                            loading = false;
	                        });
	                    } else {
	                        $("#loading").remove();
	                    }
	                },
	                error     : function(jqXHR, textStatus, errorThrown) {
	                    $("#loading").remove();
	                    console.log(jqXHR + " : " + textStatus + " : " + errorThrown);
	                }
	        });
	    }
    load_posts();
	getLinks();	
	}	
});

	// make a simple feature slideshow by adding a class name when mousehovered
	function addClass(obj) {		
		var currentId = obj.getAttribute("id");	
		var s1 = $('#slide1, #l1');
		var s2 = $('#slide2, #l2');
		var s3 = $('#slide3, #l3');

		var showS1 = function() {
			s1.attr("class", "active");
			s2.removeAttr("class", "active");						
			s3.removeAttr("class", "active");			
		}	
		var showS2 = function() {
			s1.removeAttr("class", "active");
			s2.attr("class", "active");					
			s3.removeAttr("class", "active");			
		}
		var showS3 = function() {
			s1.removeAttr("class", "active");
			s2.removeAttr("class", "active");						
			s3.attr("class", "active");				
		}
					
		if (currentId === "l1") {
			showS1();	
		}
		else if (currentId === "l2") {
			showS2();	
		}
		else {
			showS3();
		}

	}	
	// attach onclick events
	function getLinks() {	
		$('.featured-stories .mb-link').mouseenter(function(e) { 
			addClass(this);			
		});	
 	}	

/*
* End Slideshow
*/


/*
* Set up the superfish arguments for non-touch screens
*/
$( '.no-touch .menu-header .sf-menu' ).superfish( {
	delay: 200,   // 0.05 second delay on mouseout
	animation:   { opacity: 'show', height: 'show' },   // fade-in and slide-down animation
	speed: 250 // Dropdown our menu fast
} );

//background menu animation for non-touch screens
$('.no-touch .menu-header .sf-menu li').hover(function() {
	$(this).find('ul.sub-menu .menu-item a').stop(true, true)
	.css({
		right: "-15px",
		opacity: "0"
		})
	.animate({
		right: "0",
		opacity: "1",
		easing:"easeInExpo"
	},400);
}, function() {
	$(this).find('ul.sub-menu .menu-item a').stop(true, true)
	.css({
		right: "0",
		opacity: "1"
		})
	.animate({
		right: "-15px",
		opacity: "0",
		easing:"easeInExpo"
	},300);		
});		



// End Custom scripts