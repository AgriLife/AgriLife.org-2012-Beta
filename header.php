<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage agrilifeorg
 * @since agrilifeorg 1.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<!-- Mobile viewport optimized: j.mp/bplateviewport -->
<meta name="viewport" content="width=device-width,initial-scale=1">
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'agrilifeorg' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>?19" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>

<![endif]-->
<!-- <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/ie8.css" /> -->
<!--  -->

<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
	<!-- Hook up TypeKit-->
	<script type="text/javascript">
	  (function() {
	    var config = {
	      kitId: 'uqw5svf',
	      scriptTimeout: 3000
	    };
	    var h=document.getElementsByTagName("html")[0];h.className+=" wf-loading";var t=setTimeout(function(){h.className=h.className.replace(/(\s|^)wf-loading(\s|$)/g," ");h.className+=" wf-inactive"},config.scriptTimeout);var tk=document.createElement("script"),d=false;tk.src='//use.typekit.net/'+config.kitId+'.js';tk.type="text/javascript";tk.async="true";tk.onload=tk.onreadystatechange=function(){var a=this.readyState;if(d||a&&a!="complete"&&a!="loaded")return;d=true;clearTimeout(t);try{Typekit.load(config)}catch(b){}};var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(tk,s)
	  })();
	</script>
	
	<!-- Hook up FitVids-->
	<script type="text/javascript">	
		$(window).load(function() {
			$(".footer-info-container,.entry-content").fitVids();
		});
	</script>
</head>

<body <?php body_class(); ?>>

<div id="drop-section-nav"> 		
	<div id="drop-nav" class="wrap">
		<ul class="drop-nav-list">			
			<?php 
				wp_nav_menu( array( 
					'container_class' => 'align-right', 
					'theme_location' => 'top-header',
					'container' => '', 
					'items_wrap' => '%3$s',
					'depth' => '1' ) 
				); ?>				
</ul>		
	</div><!-- #drop-nav -->	
</div><!-- #drop-section-nav -->

<div id="page" class="hfeed">		
	<div class='wrap clearfix'>
	<header id="header">
		<h1 class="site-title one-of-3 ir"><a href="<?php echo site_url('/') ?>">AgriLife.org</a></h1>
	
		<nav class="off-canvas-nav-links">
			<ul>
				<li class="menu-item"><a class="menu-button" href="#menu">Menu</a></li>
				<?php if ( !is_front_page() ) : ?>			
					<li class="agency-item"><a class="agency-button" href="#agency-nav">Agencies</a></li>
				<?php endif; ?>
			</ul>
		</nav>
	</header>
	<div id="main-search">
		<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
	         <input type="text" value="" name="s" class="s" onfocus="" onblur="" />
	         <input type="submit" class="searchsubmit" value="Go" />
	    </form>
	</div>
	<nav id="access" role="navigation">		
	  <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
		<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'agriflex' ); ?>"><?php _e( 'Skip to content', 'agriflex' ); ?></a></div>
		
		<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>

		<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>  
		
	</nav><!-- .access -->
