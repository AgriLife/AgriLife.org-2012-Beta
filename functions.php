<?php
/**
 * @package WordPress
 * @subpackage flexopotamus
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
 * Tell WordPress to run flexopotamus_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'flexopotamus_setup' );

if ( ! function_exists( 'flexopotamus_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override flexopotamus_setup() in a child theme, add your own flexopotamus_setup to your child theme's
 * functions.php file.
 *
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links, and Post Formats.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since flexopotamus 1.0
 */
function flexopotamus_setup() {
	
	// Grab flexopotamus's custom meta featured post fields functionality.
	require( dirname( __FILE__ ) . '/inc/custom-meta.php' );

	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'flexopotamus' ) );

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
	       	get_bloginfo('template_directory') . '/js/modernizr.js' , array('jquery'), '2.0.6', false);
							
	       // enqueue your compressed js in one file and add to bottom of document
	   	wp_enqueue_script('my_scripts',
	       	get_bloginfo('template_directory') . '/js/my_scripts.js', array('jquery'), '1.0', true);
	       
		       
		}	         
	}    
	add_action('init', 'load_js');
	
}
endif; // flexopotamus_setup


/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function flexopotamus_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'flexopotamus_page_menu_args' );

/**
 * Register our sidebars and widgetized areas. Also register the default Epherma widget.
 *
 * @since flexopotamus 1.0
 */
function flexopotamus_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'flexopotamus' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	) );

	register_sidebar( array(
		'name' => __( 'Home Page Sidebar', 'flexopotamus' ),
		'id' => 'home-widget-area',
		'description' => __( 'The sidebar for the home page', 'flexopotamus' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area One', 'flexopotamus' ),
		'id' => 'sidebar-3',
		'description' => __( 'An optional widget area for your site footer', 'flexopotamus' ),
		'before_widget' => '<aside id="%1$s" class="%2$s footer-info-container one-of-3"><div class="footer-info-wrap">',
		'after_widget' => "</div></aside>",
		'before_title' => '<h1 class="footer-info-title widget-title-remove">',
		'after_title' => '</h1>'
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area Two', 'flexopotamus' ),
		'id' => 'sidebar-4',
		'description' => __( 'An optional widget area for your site footer', 'flexopotamus' ),
		'before_widget' => '<aside id="%1$s" class="%2$s footer-info-container one-of-3"><div class="footer-info-wrap">',
		'after_widget' => "</div></aside>",
		'before_title' => '<h1 class="footer-info-title widget-title-remove">',
		'after_title' => '</h1>'
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area Three', 'flexopotamus' ),
		'id' => 'sidebar-5',
		'description' => __( 'An optional widget area for your site footer', 'flexopotamus' ),
		'before_widget' => '<aside id="%1$s" class="%2$s footer-info-container one-of-3 last"><div class="footer-info-wrap">',
		'after_widget' => "</div></aside>",
		'before_title' => '<h1 class="footer-info-title widget-title-remove">',
		'after_title' => '</h1>'
	) );
	
}
add_action( 'widgets_init', 'flexopotamus_widgets_init' );

/**
 * Display navigation to next/previous pages when applicable
 */
function flexopotamus_content_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $nav_id; ?>">
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'flexopotamus' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'flexopotamus' ) ); ?></div>
		</nav><!-- #nav-above -->
	<?php endif;
}

/**
 * Return the URL for the first link found in the post content.
 *
 * @since flexopotamus 1.0
 * @return string|bool URL or false when no link is present.
 */
function flexopotamus_url_grabber() {
	if ( ! preg_match( '/<a\s[^>]*?href=[\'"](.+?)[\'"]/is', get_the_content(), $matches ) )
		return false;

	return esc_url_raw( $matches[1] );
}

/**
 * Count the number of footer sidebars to enable dynamic classes for the footer
 */
function flexopotamus_footer_sidebar_class() {
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

if ( ! function_exists( 'flexopotamus_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own flexopotamus_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since flexopotamus 1.0
 */
function flexopotamus_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'flexopotamus' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'flexopotamus' ), '<span class="edit-link">', '</span>' ); ?></p>
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
						printf( __( '%1$s on %2$s <span class="says">said:</span>', 'flexopotamus' ),
							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'flexopotamus' ), get_comment_date(), get_comment_time() )
							)
						);
					?>

					<?php edit_comment_link( __( 'Edit', 'flexopotamus' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'flexopotamus' ); ?></em>
					<br />
				<?php endif; ?>

			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'flexopotamus' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for flexopotamus_comment()

if ( ! function_exists( 'flexopotamus_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 * Create your own flexopotamus_posted_on to override in a child theme
 *
 * @since flexopotamus 1.0
 */
function flexopotamus_posted_on() {
	printf( __( '<p class="post-date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></p>', 'flexopotamus' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		sprintf( esc_attr__( 'View all posts by %s', 'flexopotamus' ), get_the_author() ),
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
 * @since flexopotamus 1.0
 */
function flexopotamus_body_classes( $classes ) {
	if ( is_singular() && ! is_home() && ! is_page_template( 'showcase.php' ) && ! is_page_template( 'sidebar-page.php' ) )
		$classes[] = 'singular';

	return $classes;
}
add_filter( 'body_class', 'flexopotamus_body_classes' );

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

// Top of sidebar
function top_sidebar_section() {
    do_action('top_sidebar_section');
}

add_action('top_sidebar_section','top_sidebar',5);

function top_sidebar() {
     	include(MY_THEME_FOLDER . '/top-sidebar.php');
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

// Register sidebars for each branch of AgriLife */
// Extension
add_action( 'widgets_init', 'ag_register_sidebars');
function ag_register_sidebars() {
  
  //Extension
  register_sidebar(
    array(
      'id' => 'sidebar_extension',
      'name' => 'Sidebar - Extension',
      'description' => __('These widgets will only show on the Extension page'),
      'before_widget' => '<div id="%1#s" class="extension-widget">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
    )
  );

  // Research
  register_sidebar(
    array(
      'id' => 'sidebar_research',
      'name' => 'Sidebar - Research',
      'description' => __('These widgets will only show on the Research page'),
      'before_widget' => '<div id="%1#s" class="research-widget">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
    )
  );

  // College
  register_sidebar(
    array(
      'id' => 'sidebar_college',
      'name' => 'Sidebar - College',
      'description' => __('These widgets will only show on the College page'),
      'before_widget' => '<div id="%1#s" class="college-widget">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
    )
  );

  // Forestry
  register_sidebar(
    array(
      'id' => 'sidebar_forestry',
      'name' => 'Sidebar - Forestry',
      'description' => __('These widgets will only show on the Forestry page'),
      'before_widget' => '<div id="%1#s" class="forestry-widget">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
    )
  );

  // TVMDL 
  register_sidebar(
    array(
      'id' => 'sidebar_tvmdl',
      'name' => 'Sidebar - TVMDL',
      'description' => __('These widgets will only show on the TVMDL page'),
      'before_widget' => '<div id="%1#s" class="tvmdl-widget">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
    )
  );

}
