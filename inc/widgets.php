<?php
/**
 * Makes a custom Widget for displaying Aside, Link, Status, and Quote Posts available with flexopotamus
 *
 * Learn more: http://codex.wordpress.org/Widgets_API#Developing_Widgets
 *
 * @package WordPress
 * @subpackage flexopotamus
 * 
 */
class flexopotamus_Ephemera_Widget extends WP_Widget {

	/**
	 * Constructor
	 *
	 * @return void
	 **/
	function flexopotamus_Ephemera_Widget() {
		$widget_ops = array( 'classname' => 'widget_flexopotamus_ephemera', 'description' => __( 'Use this widget to list your recent Aside, Status, Quote, and Link posts', 'flexopotamus' ) );
		$this->WP_Widget( 'widget_flexopotamus_ephemera', __( 'flexopotamus Ephemera', 'flexopotamus' ), $widget_ops );
		$this->alt_option_name = 'widget_flexopotamus_ephemera';

		add_action( 'save_post', array(&$this, 'flush_widget_cache' ) );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache' ) );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache' ) );
	}

	/**
	 * Outputs the HTML for this widget.
	 *
	 * @param array An array of standard parameters for widgets in this theme
	 * @param array An array of settings for this widget instance
	 * @return void Echoes it's output
	 **/
	function widget( $args, $instance ) {
		$cache = wp_cache_get( 'widget_flexopotamus_ephemera', 'widget' );

		if ( !is_array( $cache ) )
			$cache = array();

		if ( ! isset( $args['widget_id'] ) )
			$args['widget_id'] = null;

		if ( isset( $cache[$args['widget_id']] ) ) {
			echo $cache[$args['widget_id']];
			return;
		}

		ob_start();
		extract( $args, EXTR_SKIP );

		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Ephemera', 'flexopotamus' ) : $instance['title'], $instance, $this->id_base);

		if ( ! isset( $instance['number'] ) )
			$instance['number'] = '10';

		if ( ! $number = absint( $instance['number'] ) )
 			$number = 10;

		$ephemera_args = array(
			'order' => 'DESC',
			'posts_per_page' => $number,
			'no_found_rows' => true,
			'post_status' => 'publish',
			'post__not_in' => get_option( 'sticky_posts' ),
			'tax_query' => array(
				array(
					'taxonomy' => 'post_format',
					'terms' => array( 'post-format-aside', 'post-format-link', 'post-format-status', 'post-format-quote' ),
					'field' => 'slug',
					'operator' => 'IN',
				),
			),
		);
		$ephemera = new WP_Query( $ephemera_args );

		if ( $ephemera->have_posts() ) :

		echo $before_widget;
		echo $before_title;
		echo $title; // Can set this with a widget option, or omit altogether
		echo $after_title;

		?>
		<ol>
		<?php while ( $ephemera->have_posts() ) : $ephemera->the_post(); ?>

			<?php if ( 'link' != get_post_format() ) : ?>

			<li class="widget-entry-title">
				<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'flexopotamus' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
				<span class="comments-link">
					<?php comments_popup_link( __( '0 <span class="reply">comments &rarr;</span>', 'flexopotamus' ), __( '1 <span class="reply">comment &rarr;</span>', 'flexopotamus' ), __( '% <span class="reply">comments &rarr;</span>', 'flexopotamus' ) ); ?>
				</span>
			</li>

			<?php else : ?>

			<li class="widget-entry-title">
				<?php
					// Grab first link from the post content. If none found, use the post permalink as fallback.
					$link_url = flexopotamus_url_grabber();

					if ( empty( $link_url ) )
						$link_url = get_permalink();
				?>
				<a href="<?php echo esc_url( $link_url ); ?>" title="<?php printf( esc_attr__( 'Link to %s', 'flexopotamus' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?>&nbsp;<span>&rarr;</span></a>
				<span class="comments-link">
					<?php comments_popup_link( __( '0 <span class="reply">comments &rarr;</span>', 'flexopotamus' ), __( '1 <span class="reply">comment &rarr;</span>', 'flexopotamus' ), __( '% <span class="reply">comments &rarr;</span>', 'flexopotamus' ) ); ?>
				</span>
			</li>

			<?php endif; ?>

		<?php endwhile; ?>
		</ol>
		<?php

		echo $after_widget;

		// Reset the post globals as this query will have stomped on it
		wp_reset_postdata();

		// end check for ephemeral posts
		endif;

		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set( 'widget_flexopotamus_ephemera', $cache, 'widget' );
	}

	/**
	 * Deals with the settings when they are saved by the admin. Here is
	 * where any validation should be dealt with.
	 **/
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['number'] = (int) $new_instance['number'];
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset( $alloptions['widget_flexopotamus_ephemera'] ) )
			delete_option( 'widget_flexopotamus_ephemera' );

		return $instance;
	}

	function flush_widget_cache() {
		wp_cache_delete( 'widget_flexopotamus_ephemera', 'widget' );
	}

	/**
	 * Displays the form for this widget on the Widgets page of the WP Admin area.
	 **/
	function form( $instance ) {
		$title = isset( $instance['title']) ? esc_attr( $instance['title'] ) : '';
		$number = isset( $instance['number'] ) ? absint( $instance['number'] ) : 10;
?>
			<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'flexopotamus' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>

			<p><label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php _e( 'Number of posts to show:', 'flexopotamus' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" size="3" /></p>
		<?php
	}
}

/**
 * Adds Social Media Widget
 *
 * Allows users to input usernames from various social media outlets
 */

class AgriLife_Social_Media_Icons extends WP_Widget {

  /**
   * Register widget with WordPress
   */
  public function __construct() {
    parent::__construct(
      'social_media', // Base ID
      'Social Media', // Name
      array('description' => __('Add social media icons', 'text_domain'), ) // Args
    );
  }

  /**
   * Front-end display of widget.
   *
   * @see WP_Widget::widget()
   *
   * @param array $args     Widget arguments.
   * @param array $instance Saved values from database.
   */
  public function widget( $args, $instance ) {
    extract( $args );
    $title = apply_filters( 'widget_title', $instance['title'] );

    echo $before_widget;
    if( ! empty( $title ) )
        echo $before_title . $title . $after_title;

    echo '<ul class="clearfix">';
    foreach( $instance['s'] as $key => $value ) {
      if( ! empty( $value ) ) {
        echo '<li class="social-media-item">';
        echo '<a class="' . $key . '" href="' . $this->socialUrl( $key, $value ) . '">' . $key . '</a>';
        echo '</li>';
      }
    }
    echo '</ul>';

    echo $after_widget;

  }

  private function socialUrl( $key, $value ) {
    switch($key) {
      case 'facebook' :
        $url = 'https://facebook.com/' . $value;
        return $url;
        break;
      case 'googleplus' :
        $url = 'https://plus.google.com/' . $value;
        return $url;
        break;
      case 'twitter' :
        $url = 'https://twitter.com/' . $value;
        return $url;
        break;
      case 'flickr' :
        $url = 'http://flickr.com/photos/' . $value;
        return $url;
        break;
      case 'youtube' :
        $url = 'http://youtube.com/user/' . $value;
        return $url;
        break;
      case 'rss' :
        return $value;
        break;
    }
  }

  /**
   * Sanitize widget form values as they are saved.
   *
   * @see WP_Widget::update()
   *
   * @param array $new_instance   Values just sent to be saved.
   * @param array $old_instance   Previously saved values from database.
   *
   * @return array Updated safe values to be saved.
   */
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = strip_tags( $new_instance['title'] );
    $instance['s']['facebook'] = strip_tags( $new_instance['facebook'] );
    $instance['s']['googleplus'] = strip_tags( $new_instance['googleplus'] );
    $instance['s']['twitter'] = strip_tags( $new_instance['twitter'] );
    $instance['s']['flickr'] = strip_tags( $new_instance['flickr'] );
    $instance['s']['youtube'] = strip_tags( $new_instance['youtube'] );
    $instance['s']['rss'] = strip_tags( $new_instance['rss'] );

    return $instance;
  }

  /**
   * Back-end widget form
   *
   * @see WP_Widget::form()
   *
   * @param array $instance   Previously saved values from database
   */
  public function form( $instance ) {
    global $options;

    if ( isset( $instance['title'] ) ) {
      $title = $instance['title'];
    }
    else {
      $title = __( 'Social Media', 'text_domain' );
    }
    if ( isset( $instance['s']['facebook'] ) ) {
      $facebook = $instance['s']['facebook'];
    }
    if ( isset( $instance['s']['googleplus'] ) ) {
      $googleplus = $instance['s']['googleplus'];
    }
    if ( isset( $instance['s']['twitter'] ) ) {
      $twitter = $instance['s']['twitter'];
    }
    if ( isset( $instance['s']['flickr'] ) ) {
      $flickr = $instance['s']['flickr'];
    }
    if ( isset( $instance['s']['youtube'] ) ) {
      $youtube = $instance['s']['youtube'];
    }
    if ( empty( $instance['s']['rss'] ) ) {
      $rss = $options['feedBurner'];
    }
    else {
      $rss = $instance['s']['rss'];
    }
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <hr />
    <p>
      <label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'Facebook Username:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'googleplus' ); ?>"><?php _e( 'Google+ User Number:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'googleplus' ); ?>" name="<?php echo $this->get_field_name( 'googleplus' ); ?>" type="text" value="<?php echo esc_attr( $googleplus ); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e( 'Twitter Username:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" type="text" value="<?php echo esc_attr( $twitter ); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'flickr' ); ?>"><?php _e( 'Flickr Username:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'flickr' ); ?>" name="<?php echo $this->get_field_name( 'flickr' ); ?>" type="text" value="<?php echo esc_attr( $flickr ); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php _e( 'Youtube Username:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" type="text" value="<?php echo esc_attr( $youtube ); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'rss' ); ?>"><?php _e( 'RSS Feed URL:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'rss' ); ?>" name="<?php echo $this->get_field_name( 'rss' ); ?>" type="text" value="<?php echo esc_attr( $rss ); ?>" />
    </p>
    <?php
  }
} // class SocialMediaIcons

add_action('widgets_init', 'register_social_widget');
function register_social_widget() {
  register_widget('AgriLife_Social_Media_Icons');
}


/**
 * Widget: AgriLife Today Feeds
 * Three widgets in one with thoughtful defaults in case of absentee user.
 */

class Agrilife_Today_Widget_RSS extends WP_Widget {
	private $feeds = array(
						array('All AgriLife Today','http://today.agrilife.org/feed/'),
						array('College','http://today.agrilife.org/agency/college-of-agriculture-and-life-sciences/feed/'),
						array('Extension','http://today.agrilife.org/agency/texas-agrilife-extension-service/feed/'),
						array('Research','http://today.agrilife.org/agency/texas-agrilife-research/feed/'),
						array('TVMDL','http://today.agrilife.org/agency/texas-veterinary-medical-diagnostics-laboratory/feed/'),
						array('Category: Business &amp; Finance','http://today.agrilife.org/category/business/feed/'),
						array('Category: Environment','http://today.agrilife.org/category/environment/feed/'),
						array('Category: Farm &amp; Ranch','http://today.agrilife.org/category/farm-ranch/feed/'),
						array('Category: Lawn &amp; Garden','http://today.agrilife.org/category/lawn-garden/feed/'),
						array('Category: Life &amp; Health','http://today.agrilife.org/category/life-health/feed/'),
						array('Category: Science &amp; Tech','http://today.agrilife.org/category/science-and-technology/feed/'),
						array('Sub-Cat: 4-H','http://today.agrilife.org/tag/4h-youth/feed/'),
						array('Sub-Cat: AgriLife Personnel','http://today.agrilife.org/tag/personnel/feed/'),
						array('Sub-Cat: Gardening','http://today.agrilife.org/tag/gardening-landscaping/feed/'),
						array('Sub-Cat: Energy','http://today.agrilife.org/tag/biofuel-energy/feed/'),

					);

	function Agrilife_Today_Widget_RSS() {
		//Constructor
		$widget_ops = array('classname' => 'widget agrilifetoday', 'description' => 'Show the latest AgriLife Today updates.' );
		$this->WP_Widget('Agrilife_Today_Widget_RSS', 'AgriLife: Agrilife Today News Feed', $widget_ops);		
	}

	function widget($args, $instance) {
		// prints the widget
		if ( isset($instance['error']) && $instance['error'] )
			return;
		
		extract($args, EXTR_SKIP);	

 		// RSS Processing
 		$myfeeds 			= $this->feeds;
 		$feed_link_index	= (int) $instance['feed_link_index'];
 		$agrilife_feed_link = $myfeeds[$feed_link_index][1]; //'http://agrilife.org/today/feed/';
		$rss = fetch_feed($agrilife_feed_link);
		//$title = $instance['title'];
		
		$desc = '';
		
		if ( ! is_wp_error($rss) ) {
			//$agrilife_feed_title= esc_attr(strip_tags(@html_entity_decode($rss->get_title(), ENT_QUOTES, get_option('blog_charset'))));
			$title = apply_filters('widget_title', empty($instance['title']) ? __('AgriLife Today') : $instance['title'], $instance, $this->id_base);
			
			if ( empty($title) )
				$title = esc_html(strip_tags($rss->get_title()));
			$link = esc_url(strip_tags($rss->get_permalink()));
			while ( stristr($link, 'http') != $link )
				$link = substr($link, 1);
			$podcast_site_link = $link;
		}
		
		// show the widget
		echo $before_widget; ?>
		<div class="watchreadlisten-bg widget">
			<?php if ( $title ) echo $before_title . $title . $after_title; ?>
			<?php agrilife_widget_agrilifetoday_rss_output( $rss, $instance ); ?>		
		</div>
		<?php echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		//save the widget
		$instance = $old_instance;
		$instance['feed_link_index'] = strip_tags($new_instance['feed_link_index']);
		$instance['show_summary'] = strip_tags($new_instance['show_summary']);
		$instance['items'] = strip_tags($new_instance['items']);
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}

	function form($instance) {
		//widgetform in backend
		$instance 			= wp_parse_args( (array) $instance, array('items' => '5', 'feed_link_index' => '0', 'show_summary' => true) );
		
		$items  			= $instance['items'];
		$feed_link_index	= (int) $instance['feed_link_index'];
		$myfeed 			= $this->feeds;
		$show_summary   	= (int) $instance['show_summary'];
		
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('items'); ?>"><?php _e('How many items would you like to display?'); ?></label>
		<select id="<?php echo $this->get_field_id('items'); ?>" name="<?php echo $this->get_field_name('items'); ?>">
		<?php
				for ( $i = 1; $i <= 10; ++$i )
					echo "<option value='$i' " . ( $items == $i ? "selected='selected'" : '' ) . ">$i</option>";
		?>
		</select></p>
		<p><label for="<?php echo $this->get_field_id('feed_link_index'); ?>"><?php _e('What category do you want to display?'); ?></label>
		<select id="<?php echo $this->get_field_id('feed_link_index'); ?>" name="<?php echo $this->get_field_name('feed_link_index'); ?>">
		<?php			
			for ($i=0; $i<count($myfeed); $i++) {
				echo "<option value=\"".$i."\" " . ( $feed_link_index == $i ? "selected='selected'" : '' ) . ">".$myfeed[$i][0]."</option>";
			}
		?>
		</select></p>
	
		<p>
			<input id="<?php echo $this->get_field_id('show_summary'); ?>" name="<?php echo $this->get_field_name('show_summary'); ?>" type="checkbox" value="1" <?php checked( $show_summary ); ?> />
			<label for="<?php echo $this->get_field_id('show_summary'); ?>"><?php _e('Display article excerpts?'); ?></label>
		</p>
		<?php
	}

}

register_widget('Agrilife_Today_Widget_RSS');

/**
 * Display the RSS feed from AgriLife Today and include image
 *
 * @since 2.5.0
 *
 * @param string|array|object $rss RSS url.
 * @param array $args Widget arguments.
 */
function agrilife_widget_agrilifetoday_rss_output( $rss, $args = array() ) {
	if ( is_string( $rss ) ) {
		$rss = fetch_feed($rss);
	} elseif ( is_array($rss) && isset($rss['url']) ) {
		$args = $rss;
		$rss = fetch_feed($rss['url']);
	} elseif ( !is_object($rss) ) {
		return;
	}

	if ( is_wp_error($rss) ) {
		if ( is_admin() || current_user_can('manage_options') )
			echo '<p>' . sprintf( __('<strong>RSS Error</strong>: %s'), $rss->get_error_message() ) . '</p>';
		return;
	}

	$default_args = array( 'items' => 5, 'feed_link_index' => 0, 'show_summary' => 0  );
	$args = wp_parse_args( $args, $default_args );
	extract( $args, EXTR_SKIP );

	$items = (int) $items;
	if ( $items < 1 || 20 < $items )
		$items = 10;
	$show_summary  = (int) $show_summary;

	if ( !$rss->get_item_quantity() ) {
		echo '<ul><li>' . __( 'An error has occurred; the feed is probably down. Try again later.' ) . '</li></ul>';
		$rss->__destruct();
		unset($rss);
		return;
	}

	echo '<ul>';
	foreach ( $rss->get_items(0, $items) as $item ) {
		$link = $item->get_link();
		while ( stristr($link, 'http') != $link )
			$link = substr($link, 1);
		$link = esc_url(strip_tags($link));
		$title = esc_attr(strip_tags($item->get_title()));
		if ( empty($title) )
			$title = __('Untitled');

		$desc = str_replace( array("\n", "\r"), ' ', esc_attr( strip_tags( @html_entity_decode( $item->get_description(), ENT_QUOTES, get_option('blog_charset') ) ) ) );
		//$desc = wp_html_excerpt( $desc, 360 );
		
		// Append ellipsis. Change existing [...] to [&hellip;].
		if ( '...' == substr( $desc, -3 ) )
			$desc = substr( $desc, 0, -5 ) . '&hellip;';
		elseif ( 'Read More...' == substr( $desc, -12 ) )
			$desc = substr( $desc, 0, -13 ).'&hellip;';

		$desc = trim(esc_html( $desc ));
		
		if ( $show_summary ) {
			$summary = "<p class='rss-excerpt'>$desc</p>";
		} else {
			$summary = '';
		}
		
		// default
		$image = '<img class="rssthumb" src="'.get_bloginfo('stylesheet_directory') . '/images/agrilifetodaythumb.jpg'.'" alt="'.$title.'" />';

		$date = $item->get_date( 'U' );
		if ( $date ) {
			$date = ' <span class="rss-date">' . date_i18n( 'M d', $date ) . '</span>';
		}

		// SimplePie Bug:
		// get_enclosures only returns one enclosure
		// http://tech.groups.yahoo.com/group/simplepie-support/message/2994	
		if ($enclosure = $item->get_enclosure()) {		
			if(	$enclosure->get_extension() == 'jpg' || $enclosure->get_extension() == 'png' || $enclosure->get_extension() == 'gif') {
			  	$image = '<img class="rssthumb" src="'.$enclosure->get_link().'" alt="'.$title.'" />';
			 } else {
			 	$image = '<img class="rssthumb" src="'.get_bloginfo('stylesheet_directory') . '/images/agrilifetodaythumb.jpg'.'" alt="'.$title.'" />';
			 }
		}
		
		// Link the image	
		$image = '<a class="rss-img-link" href="'.$link.'" >'.$image.'</a>';

	    echo "<li>".'<div class="rss-head"><div class="rss-img">' . $image . '</div><div class="rss-title"><a class="rss-title-link" href="'.$link.'" >'.$title."</a><br />{$date}</div></div><div class='rss-content'>{$summary}</div></li>";

	}
	echo '</ul>';
	$rss->__destruct();
	unset($rss);
}
?>
