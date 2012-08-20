var $footer = $('#footer'),
	$themeURL = $footer.data('theme'),	
	$currentPage = $footer.data('page'),
	loaded = 0;
	
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
						console.log($data);
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

// End Custom scripts

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

// Toggle for nav menu
$('#media-info-button').click(function() {	
	$('.for-media').toggleClass('active');			
});