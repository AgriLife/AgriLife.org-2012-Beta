<?php
/**
 * @package WordPress
 * @subpackage agrilifeorg
 * 
 */

define('MY_WORDPRESS_FOLDER',$_SERVER['DOCUMENT_ROOT']);
define('MY_THEME_FOLDER',str_replace("\\",'/',dirname(__FILE__)));
define('MY_THEME_PATH','/' . substr(MY_THEME_FOLDER,stripos(MY_THEME_FOLDER,'wp-content')));

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 584;

/**
 * Tell WordPress to run agrilifeorg_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'agrilifeorg_setup' );

if ( ! function_exists( 'agrilifeorg_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override agrilifeorg_setup() in a child theme, add your own agrilifeorg_setup to your child theme's
 * functions.php file.
 *
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links, and Post Formats.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since agrilifeorg 1.0
 */
function agrilifeorg_setup() {
	
	// Grab agrilifeorg's custom meta featured post fields functionality.
	require( dirname( __FILE__ ) . '/inc/custom-meta.php' );

	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'agrilifeorg' ) );
	register_nav_menu( 'top-header', __( 'Header Supporting Menu', 'agrilifeorg' ) );

	// This theme uses Featured Images (also known as post thumbnails)
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'feature-large', 680, 376, true );	
	add_image_size( 'feature-thumb', 86, 86, true );
	

	function load_js() {
	        // instruction to only load if it is not the admin area
		if ( !is_admin() ) {
			 
		// deregister swfobject js							
		wp_deregister_script('swfobject');
				
		// deregister l10n js			
		wp_deregister_script( 'l10n' );	
			
		// register jquery CDN				
		wp_deregister_script('jquery');
		wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"), true);		
	   	wp_enqueue_script('jquery');
	
		// Add Modernizr to theme. Custom build detects video, audio, flexbox, touch events and adds respond.js for media queries support in older browsers.
	   	wp_enqueue_script('modernizr',
	       	get_bloginfo('template_directory') . '/js/modernizr.custom.20917.js' , array('jquery'), '2.6.2', false);
							
	       // enqueue your compressed js in one file and add to bottom of document
	   	wp_enqueue_script('my_scripts',
	       	get_bloginfo('template_directory') . '/js/my_scripts.js', array('jquery'), '1.0', true);
	       
		       
		}	         
	}    
	add_action('init', 'load_js');
	
}
endif; // agrilifeorg_setup


/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function agrilifeorg_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'agrilifeorg_page_menu_args' );

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * To override this in a child theme, remove the filter and optionally add
 * your own function tied to the wp_page_menu_args filter hook.
 *
 * @since agriflex 1.0
 */
function agriflex_page_menu_args( $args ) {
     $args['show_home'] = true;
     return $args;
}
add_filter( 'wp_page_menu_args', 'agriflex_page_menu_args' );

function agriflex_nav_menu_args( $args = 'sf-menu' )
{
     $args['menu_class'] = 'sf-menu menu';
     return $args;
} // function
add_filter( 'wp_nav_menu_args', 'agriflex_nav_menu_args' );


/**
 * Register our sidebars and widgetized areas. Also register the default Epherma widget.
 *
 * @since agrilifeorg 1.0
 */
function agrilifeorg_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'agrilifeorg' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</div></aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3><div class="widget-wrap"><!-- fnord-->'
	) );

	register_sidebar( array(
		'name' => __( 'Home: Page Sidebar', 'agrilifeorg' ),
		'id' => 'home-widget-sidebar',
		'description' => __( 'The sidebar for the home page', 'agrilifeorg' ),
		'before_widget' => '<aside id="%1$s" class="widget home-sidebar %2$s">',
		'after_widget' => "</div></aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3><div class="widget-wrap">'
	) );

	register_sidebar( array(
		'name' => __( 'Home: Main Widget Area', 'agrilifeorg' ),
		'id' => 'home-widget-area',
		'description' => __( 'Main three-column widget area on home page.', 'agrilifeorg' ),
		'before_widget' => '<aside id="%1$s" class="%2$s widget home-widget-container one-of-3">',
		'after_widget' => "</div></aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3><div class="widget-wrap">'
	) );
	
	register_sidebar( array(
		'name' => __( 'Extension Landing Page: Main Widget Area', 'agrilifeorg' ),
		'id' => 'extension-widget-area',
		'description' => __( 'Main Widget Area on Extension Page', 'agrilifeorg' ),
		'before_widget' => '<aside id="%1$s" class="%2$s widget one-of-2">',
		'after_widget' => "</div></aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3><div class="widget-wrap">'
	) );
	
	//Extension
	register_sidebar(
	    array(
	      'id' => 'sidebar_extension',
	      'name' => 'Sidebar - Extension',
	      'description' => __( 'Sidebar Widget Area on Extension Pages', 'agrilifeorg' ),
		  'before_widget' => '<aside id="%1$s" class="%2$s widget interior-sidebar">',
		  'after_widget' => "</div></aside>",
		  'before_title' => '<h3 class="widget-title">',
		  'after_title' => '</h3><div class="widget-wrap">'
	    )
	);

	// Research
	register_sidebar(
	    array(
	      'id' => 'sidebar_research',
	      'name' => 'Sidebar - Research',
	      'description' => __('Sidebar Widget Area on Research pages'),
	      'before_widget' => '<aside id="%1$s" class="%2$s widget interior-sidebar">',
		  'after_widget' => "</div></aside>",
		  'before_title' => '<h3 class="widget-title">',
		  'after_title' => '</h3><div class="widget-wrap">'
	    )
	);

	  // College
	  register_sidebar(
	    array(
	      'id' => 'sidebar_college',
	      'name' => 'Sidebar - College',
	      'description' => __('Sidebar Widget Area on College pages'),
	      'before_widget' => '<aside id="%1$s" class="%2$s widget interior-sidebar">',
		  'after_widget' => "</div></aside>",
		  'before_title' => '<h3 class="widget-title">',
		  'after_title' => '</h3><div class="widget-wrap">'
	    )
	  );

	  // Forestry
	  register_sidebar(
	    array(
	      'id' => 'sidebar_forestry',
	      'name' => 'Sidebar - Forestry',
	      'description' => __('Sidebar Widget Area on Forestry pages'),
	      'before_widget' => '<aside id="%1$s" class="%2$s widget interior-sidebar">',
		  'after_widget' => "</div></aside>",
		  'before_title' => '<h3 class="widget-title">',
		  'after_title' => '</h3><div class="widget-wrap">'
	    )
	  );

	  // TVMDL 
	  register_sidebar(
	    array(
	      'id' => 'sidebar_tvmdl',
	      'name' => 'Sidebar - TVMDL',
	      'description' => __('Sidebar Widget Area on TVMDL pages'),
	      'before_widget' => '<aside id="%1$s" class="%2$s widget interior-sidebar">',
		  'after_widget' => "</div></aside>",
		  'before_title' => '<h3 class="widget-title">',
		  'after_title' => '</h3><div class="widget-wrap">'
	    )
	  );

}
add_action( 'widgets_init', 'agrilifeorg_widgets_init' );


/**
 * add classes to every even/odd widget
 * add class to every third widget
 */
function my_filter_dynamic_sidebar_params_even_odd($params){

    static $sidebar_widget_count = array();
    $sidebar_id = $params[0]["id"];
    if (! isset($sidebar_widget_count[$sidebar_id])){
        $sidebar_widget_count[$sidebar_id] = 0;
    }
    $before_widget = $params[0]['before_widget'];
    $class = $sidebar_widget_count[$sidebar_id] % 2 ? 
        "widget-odd" : "widget-even";
	$class .= ($sidebar_widget_count[$sidebar_id] + 1) % 3 ? 
        "" : "widget-3-col-end";
    //$class .= " widget-index-" . $sidebar_widget_count[$sidebar_id];
    //$class .= " widget-in-$sidebar_id";
    $before_widget = str_replace("class=\"", 
        "class=\"$class ", $before_widget);
    $params[0]['before_widget'] = $before_widget;
    $sidebar_widget_count[$sidebar_id]++;
    return $params;
}

add_filter("dynamic_sidebar_params", "my_filter_dynamic_sidebar_params_even_odd");


/**
 * Display navigation to next/previous pages when applicable
 */
function agrilifeorg_content_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $nav_id; ?>">
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'agrilifeorg' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'agrilifeorg' ) ); ?></div>
		</nav><!-- #nav-above -->
	<?php endif;
}

/**
 * Return the URL for the first link found in the post content.
 *
 * @since agrilifeorg 1.0
 * @return string|bool URL or false when no link is present.
 */
function agrilifeorg_url_grabber() {
	if ( ! preg_match( '/<a\s[^>]*?href=[\'"](.+?)[\'"]/is', get_the_content(), $matches ) )
		return false;

	return esc_url_raw( $matches[1] );
}

/**
 * Count the number of footer sidebars to enable dynamic classes for the footer
 */
function agrilifeorg_footer_sidebar_class() {
	$count = 0;

	if ( is_active_sidebar( 'sidebar-3' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-4' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-5' ) )
		$count++;

	$class = '';

	switch ( $count ) {
		case '1':
			$class = 'one';
			break;
		case '2':
			$class = 'two';
			break;
		case '3':
			$class = 'three';
			break;
	}

	if ( $class )
		echo 'class="' . $class . '"';
}

if ( ! function_exists( 'agrilifeorg_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own agrilifeorg_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since agrilifeorg 1.0
 */
function agrilifeorg_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'agrilifeorg' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'agrilifeorg' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 68;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 39;

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s on %2$s <span class="says">said:</span>', 'agrilifeorg' ),
							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'agrilifeorg' ), get_comment_date(), get_comment_time() )
							)
						);
					?>

					<?php edit_comment_link( __( 'Edit', 'agrilifeorg' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'agrilifeorg' ); ?></em>
					<br />
				<?php endif; ?>

			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'agrilifeorg' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for agrilifeorg_comment()

if ( ! function_exists( 'agrilifeorg_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 * Create your own agrilifeorg_posted_on to override in a child theme
 *
 * @since agrilifeorg 1.0
 */
function agrilifeorg_posted_on() {
	printf( __( '<p class="post-date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></p>', 'agrilifeorg' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		sprintf( esc_attr__( 'View all posts by %s', 'agrilifeorg' ), get_the_author() ),
		esc_html( get_the_author() ),
		esc_html( get_the_author_meta( 'user_email' ) ),
		esc_html( get_the_author_meta( 'phone' ) )			
	);
}
endif;

/**
 * Adds two classes to the array of body classes.
 * The first is if the site has only had one author with published posts.
 * The second is if a singular post being displayed
 *
 * @since agrilifeorg 1.0
 */
function agrilifeorg_body_classes( $classes ) {
	if ( is_singular() && ! is_home() && ! is_page_template( 'showcase.php' ) && ! is_page_template( 'sidebar-page.php' ) )
		$classes[] = 'singular';

	return $classes;
}
add_filter( 'body_class', 'agrilifeorg_body_classes' );

/**
 * Category Loop function
 *
 * @return string|bool Category loop
 */
function cat_loop( $catClass ) {
	global $post, $do_not_duplicate;
	$cat_query = new WP_Query( 
	array(
		/*'meta_key' =>  'feature-homepage',
		'meta_value' => 1,*/
		'posts_per_page' => 1,
		'category_name' => $catClass,
		//'post__not_in' => $do_not_duplicate
		    )
	);
 		while ($cat_query->have_posts()) : $cat_query->the_post();
 		$do_not_duplicate[] = $post->ID; update_post_caches($posts);
 		?>
		<a class="mb-link cat-nav-post-link clearfix" href="<?php the_permalink();?>">				
			<?php
					if ( has_post_thumbnail() ) {
		  				the_post_thumbnail('feature-thumb'); 
					} else  { 
						echo '<img src="'.get_bloginfo("template_url").'/images/AgriLife-default-post-image.png" alt="AgriLife Logo" class="attachment-feature-thumb wp-post-image" title="AgriLife" />'; 
			}	?>
			<h2 class="mb-post-title cat-post-title"><?php the_title(); ?></h2>
		</a>
		<?php endwhile;  wp_reset_query();
	return true;
}

// Category navigation
function category_navigation_section() {
    do_action('category_navigation_section');
}

add_action('category_navigation_section','category_navigation',5);

function category_navigation() {
     	include(MY_THEME_FOLDER . '/category-navigation-section.php');
}


function dropdown_tag_cloud( $args = '' ) {
	$defaults = array(
		'smallest' => 8, 'largest' => 22, 'unit' => 'pt', 'number' => 45,
		'format' => 'flat', 'orderby' => 'name', 'order' => 'ASC',
		'exclude' => '', 'include' => ''
	);
	$args = wp_parse_args( $args, $defaults );

	$tags = get_tags( array_merge($args, array('orderby' => 'count', 'order' => 'DESC')) ); // Always query top tags

	if ( empty($tags) )
		return;

	$return = dropdown_generate_tag_cloud( $tags, $args ); // Here's where those top tags get sorted according to $args
	if ( is_wp_error( $return ) )
		return false;
	else
		echo apply_filters( 'dropdown_tag_cloud', $return, $args );
}

function dropdown_generate_tag_cloud( $tags, $args = '' ) {
	global $wp_rewrite;
	$defaults = array(
		'smallest' => 8, 'largest' => 22, 'unit' => 'pt', 'number' => 45,
		'format' => 'flat', 'orderby' => 'name', 'order' => 'ASC'
	);
	$args = wp_parse_args( $args, $defaults );
	extract($args);

	if ( !$tags )
		return;
	$counts = $tag_links = array();
	foreach ( (array) $tags as $tag ) {
		$counts[$tag->name] = $tag->count;
		$tag_links[$tag->name] = get_tag_link( $tag->term_id );
		if ( is_wp_error( $tag_links[$tag->name] ) )
			return $tag_links[$tag->name];
		$tag_ids[$tag->name] = $tag->term_id;
	}

	$min_count = min($counts);
	$spread = max($counts) - $min_count;
	if ( $spread <= 0 )
		$spread = 1;
	$font_spread = $largest - $smallest;
	if ( $font_spread <= 0 )
		$font_spread = 1;
	$font_step = $font_spread / $spread;

	// SQL cannot save you; this is a second (potentially different) sort on a subset of data.
	if ( 'name' == $orderby )
		uksort($counts, 'strnatcasecmp');
	else
		asort($counts);

	if ( 'DESC' == $order )
		$counts = array_reverse( $counts, true );

	$a = array();

	$rel = ( is_object($wp_rewrite) && $wp_rewrite->using_permalinks() ) ? ' rel="tag"' : '';

	foreach ( $counts as $tag => $count ) {
		$tag_id = $tag_ids[$tag];
		$tag_link = esc_url($tag_links[$tag]);
		$tag = str_replace(' ', '&nbsp;', esc_html( $tag ));
		$a[] = "\t<option value='$tag_link'>$tag</option>";
	}

	switch ( $format ) :
	case 'array' :
		$return =& $a;
		break;
	case 'list' :
		$return = "<ul class='wp-tag-cloud'>\n\t<li>";
		$return .= join("</li>\n\t<li>", $a);
		$return .= "</li>\n</ul>\n";
		break;
	default :
		$return = join("\n", $a);
		break;
	endswitch;

	return apply_filters( 'dropdown_generate_tag_cloud', $return, $tags, $args );
}

$includes_path = TEMPLATEPATH . '/inc/';
// Include custom widgets
require_once( $includes_path . 'widgets.php');
