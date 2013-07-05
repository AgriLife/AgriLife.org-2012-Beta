/* 
  * Custom Scripts For AgriLife.org Theme
*/
jQuery(document).ready(function() {

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
   * Begin Custom Scripts
   *
   */
  // Variables for respond.js and slideshow
  var $footer = $('#footer'),
    $themeURL = $footer.data('theme'),  
    $currentPage = $footer.data('page'),
    loaded = 0;

  // Load respond.js if needed
  Modernizr.load([
    {
      // The test: does the browser understand Media Queries?
      test : Modernizr.mq('only all'),
      // If not, load the respond.js file
      nope : ''+$themeURL+'js/respond/respond.min.js'
    }
  ]);




  /*
  * Set up the superfish arguments for non-touch screens
  */
  $( '.menu-header .sf-menu' ).superfish( {
    delay: 200,   // 0.05 second delay on mouseout
    animation:   { opacity: 'show', height: 'show' },   // fade-in and slide-down animation
    speed: 'fast', // Dropdown our menu fast
    disableHI: true // disable HoverIntent delay
  } );

//background menu animation for non-touch screens
/*
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
*/


	
	/*
	 * Fire Up Flexslider
	 */
	$('.feature-container').flexslider({
      animation: 'slide',
      controlsContainer: '.flex-container'
    });
	$('ul.slides').removeClass('invisible');
	/* End Flexslider invocation */


	// Toggle for nav menu	
	$('.menu-button').click(function() {
		$('#access, .searchform').slideToggle('medium');			
	});

	// Toggle click for sub-menus on touch screens
	$('.touch .sf-with-ul').click(function() {
		$(this).find('.sub-menu').hide.slideToggle('medium');
	});
	
	
  //set the initial values
  detector = jQuery('.js');
  compareWidth = detector.width();
  smallScreen = '1000';
	// Make sure the search shows up on the desktop
	// Credit: http://webdeveloper2.com/2011/06/trigger-javascript-on-css3-media-query-change/
    jQuery(window).resize(function(){
        //compare everytime the window resize event fires
        if(detector.width()!=compareWidth){

            //a change has occurred so update the comparison variable
            compareWidth = detector.width();

			if (compareWidth < smallScreen) {
				$("body").removeClass("two-column").addClass("one-column");
				$('#access, .searchform').hide();				
			}
			else {
				$("body").removeClass("one-column").addClass("two-column");	
				$('#access, .searchform').show();
			}

			if (compareWidth >= smallScreen) {
				$('#access, .searchform').show();
			}
        }
    });
	



});
// End Custom scripts
